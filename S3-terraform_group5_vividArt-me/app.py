from flask import Flask, render_template, request, redirect, url_for
from werkzeug.utils import secure_filename
from PIL import Image, ImageEnhance, ImageFilter
import boto3
import io

app = Flask(__name__)

# Define the S3 bucket name
S3_BUCKET_NAME = 'mybucket-app'
ACCESS_KEY = 'AKIAXWTWKONYHWT4HHWZ'
SECRET_KEY = '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'
# Function to upload a file to S3
def upload_to_s3(file, filename):
    try:
        #s3 = boto3.client('s3')
        s3 = boto3.client('s3',
        aws_access_key_id=ACCESS_KEY,
        aws_secret_access_key=SECRET_KEY)
        s3.upload_fileobj(file, S3_BUCKET_NAME, filename)
    except Exception as e:
        print(f"Error uploading to S3: {e}")
        # Handle the error as needed
        # Example: raise e  # Reraise the exception for debugging

# Function to get a pre-signed URL for a file in S3
def get_s3_url(filename):
    try:
        s3 = boto3.client('s3',
        aws_access_key_id=ACCESS_KEY,
        aws_secret_access_key=SECRET_KEY)
        url = s3.generate_presigned_url('get_object', Params={'Bucket': S3_BUCKET_NAME, 'Key': filename})
        return url
    except Exception as e:
        print(f"Error generating S3 URL: {e}")
        # Handle the error as needed
        return None

# Function to process the uploaded image
def process_image(file):
    try:
        # Open the image using Pillow
        image = Image.open(file)

        # Example image enhancement: (same as before)
        # ...


        # Example image enhancement: Increase sharpness
        enhancer = ImageEnhance.Sharpness(image)
        sharpened_image = enhancer.enhance(1.5)  # Adjust the enhancement factor

        # Example image enhancement: Increase brightness
        enhancer = ImageEnhance.Brightness(sharpened_image)
        brightened_image = enhancer.enhance(1.2)  # Adjust the enhancement factor

        # Example image enhancement: Increase contrast
        enhancer = ImageEnhance.Contrast(brightened_image)
        contrasted_image = enhancer.enhance(1.2)  # Adjust the enhancement factor

        # Example image enhancement: Increase saturation
        enhancer = ImageEnhance.Color(contrasted_image)
        saturated_image = enhancer.enhance(1.2)  # Adjust the enhancement factor

        # Example image enhancement: Reduce noise
        denoised_image = saturated_image.filter(ImageFilter.SMOOTH)

        # Convert to RGB mode (removing alpha channel)
        rgb_image = denoised_image.convert("RGB")

        # Example image enhancement: Upscale resolution
        new_width = image.width * 2  # Adjust the desired new width
        new_height = image.height * 2  # Adjust the desired new height
        upscaled_image = rgb_image.resize((new_width, new_height), Image.LANCZOS)

        # Save the processed image to a BytesIO buffer
        processed_buffer = io.BytesIO()
        upscaled_image.save(processed_buffer, format='JPEG')
        processed_buffer.seek(0)
        return processed_buffer

    except Exception as e:
        print(f"Error processing image: {e}")
        # Handle the error as needed
        return None

# Routes...

@app.route('/')
def index():
    return render_template('index.html')



@app.route('/upload', methods=['POST'])
def upload_file():
    if 'photo' not in request.files:
        return redirect(url_for('index'))

    file = request.files['photo']

    if file.filename == '':
        return redirect(url_for('index'))

    if file:
        try:

            #Generate a new filename (you can customize this logic)
            new_filename = f"processed_{secure_filename(file.filename)}"

            ###### Upload the original image to S3 with the new filename
            ###upload_to_s3(file, new_filename)

            ###### Get a pre-signed URL for the uploaded image in S3
            ###uploaded_url = get_s3_url(new_filename)

            #####if uploaded_url:
                ###return render_template('result.html', uploaded_url=uploaded_url)


            # Process the uploaded image
            processed_bytes = process_image(file)

            if processed_bytes:
                # Upload the processed image to S3
                upload_to_s3(processed_bytes, new_filename)

                # Get a pre-signed URL for the processed image in S3
                processed_url = get_s3_url(new_filename)

                if processed_url:
                    return render_template('result.html', processed_url=processed_url)
        except Exception as e:
            print(f"Error processing/uploading image: {e}")

    return render_template('result.html', error_message='Error processing/uploading image.')

# ...

if __name__ == '__main__':
    app.run(debug=True)