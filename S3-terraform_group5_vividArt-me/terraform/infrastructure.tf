# Define provider and region
provider "aws" {
  region = "us-east-1" # Change this to your desired region
}

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

  tags = {
    Name = "my_security_group"
  }
}

# Create an S3 bucket
resource "aws_s3_bucket" "my_s3_bucket" {
  bucket = "my-s3-app-bucket" # Changeable this to your desired bucket name
  tags = {
    Name = "my_s3_bucket"
  }
}

# Create an EC2 instance
resource "aws_instance" "my_instance" {
  ami                    = "ami-0c55b159cbfafe1f0" # Amazon Linux 2 AMI, change to the desired AMI
  instance_type          = "t2.micro" # Change this to your desired instance type
  key_name               = "my-app-key-pair" # Change this to your key pair name

  vpc_security_group_ids = [aws_security_group.my_security_group.id]
  subnet_id              = aws_subnet.my_subnet.id

  user_data = <<-EOF
              #!/bin/bash
              yum update -y 
              amazon-linux-extras install docker 
              service docker start 
              # docker run -d -p 80:80 my-docker-image 
              docker run -d -p 80:80 --name my_web_app my_docker_image
              EOF

  tags = {
    Name = "my_instance"
  }
}

