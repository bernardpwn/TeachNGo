# API flask dalam python yang berfungsi untuk menerima input user id yang ingin diprediksi dari android app, kemudian mengirimnya pada AI Platform yang dijalankan pada google cloud
# Kemudian menerima dan menampilkannya dalam bentuk json response yang nantinya digunakan pada android app.

from flask import Flask,request,jsonify
import os
from google.api_core.client_options import ClientOptions
from googleapiclient import discovery
app = Flask(__name__)
@app.route('/')
def index():
    return "Teach N GO Recommendation Machine"
@app.route('/predict',methods=['POST'])
def predict():
    # Setup environment credentials (you'll need to change these)
    userid = request.form.get('userid')
    os.environ["GOOGLE_APPLICATION_CREDENTIALS"] = "delta-essence-349912-09595776bceb.json" # change for your GCP key
    PROJECT = "delta-essence-349912" # change for your GCP project
    REGION = "asia-southeast1" # change for your GCP region (where your model is hosted)

    endpoint = 'https://asia-southeast1-ml.googleapis.com/'
    client_options = ClientOptions(api_endpoint=endpoint)
    ml = discovery.build('ml', 'v1', client_options=client_options)

    request_body = { 'instances': [{"input_1": str(userid)}] }
    nrequest = ml.projects().predict(
        name='projects/delta-essence-349912/models/cobamodel/versions/versi4',
        body=request_body)

    response = nrequest.execute()
    return response
if __name__ == '__main__':
    app.run(debug=True)