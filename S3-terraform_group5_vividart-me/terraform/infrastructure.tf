# Define provider and region
provider "aws" {
  region = "us-east-1" # Change this to your desired region
}


# Create an SSH key pair
#resource "aws_key_pair" "my_key_app" {
  #key_name = "my-key-app" # Replace with your desired key pair name
  #public_key = file("files/mykey-app.pem")
#}

# Create a VPC
resource "aws_vpc" "my_vpc" {
  cidr_block = "10.0.0.0/16"
  enable_dns_support = true
  enable_dns_hostnames = true

  tags = {
    Name = "my_vpc"
  }
}

# Create an internet gateway
resource "aws_internet_gateway" "my_igw" {
  vpc_id = aws_vpc.my_vpc.id

  tags = {
    Name = "my_igw"
  }
}

# Create a subnet
resource "aws_subnet" "my_subnet" {
  vpc_id                  = aws_vpc.my_vpc.id
  cidr_block              = "10.0.1.0/24"
  availability_zone       = "us-east-1a" # Changeable to your desired availability zone

  map_public_ip_on_launch = true

  tags = {
    Name = "my_subnet"
  }
}

# Create a security group for the EC2 instance
resource "aws_security_group" "my_security_group" {
  vpc_id = aws_vpc.my_vpc.id

  egress {
    from_port   = 0
    to_port     = 0
    protocol    = "-1"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    from_port   = 80
    to_port     = 80
    protocol    = "tcp"
    cidr_blocks = ["0.0.0.0/0"]
  }

  ingress {
    cidr_blocks = [
      "0.0.0.0/0"
    ]
from_port = 22
    to_port = 22
    protocol = "tcp"
  }

  tags = {
    Name = "my_security_group"
  }
}


resource "aws_route_table_association" "my_subnet_association" {
  subnet_id      = aws_subnet.my_subnet.id
  route_table_id = aws_route_table.my_route_table.id
}

resource "aws_route_table" "my_route_table" {
  vpc_id = aws_vpc.my_vpc.id

  route {
    cidr_block = "0.0.0.0/0"
    gateway_id = aws_internet_gateway.my_igw.id
  }
}


# Create an S3 bucket
resource "aws_s3_bucket" "my_s3_bucket" {
  bucket = "mybucket-app" # Changeable this to your desired bucket name
  tags = {
    Name = "mybucket-app"
  }
}

resource "aws_s3_bucket_public_access_block" "my_s3_bucket" {
  bucket = aws_s3_bucket.my_s3_bucket.id

  block_public_acls       = false
  block_public_policy     = false
  ignore_public_acls      = false
  restrict_public_buckets = false
}

# Create an EC2 instance
resource "aws_instance" "my_instance" {
  ami                    = "ami-00b8917ae86a424c9" # Amazon Linux 2 AMI, change to the desired AMI
  instance_type          = "t2.micro" # Change this to your desired instance type
  key_name               = "app-image-kp" # Change this to your key pair name

  vpc_security_group_ids = [aws_security_group.my_security_group.id]
  subnet_id              = aws_subnet.my_subnet.id

  user_data = <<-EOF
              #!/bin/bash
              yum update -y 
              amazon-linux-extras install docker 
              service docker start
              sudo usermod -a -G docker ec2-user
              sudo docker pull jeanpierrecaleb/azubi-labs:vivid-app
              docker run -d -p 80:5000 jeanpierrecaleb/azubi-labs:vivid-app
              EOF

  tags = {
    Name = "my_instance"
  }
}

output "public_ip" {
  value = aws_instance.my_instance.public_ip
}

