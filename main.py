
from flask import Flask,render_template,url_for,request
import os
import pickle
import numpy as np


load_model=open(os.path.join("static/winner_pred.pkl"),"rb")





app = Flask(__name__)

@app.route('/')
def index():
    return render_template("index.html")

@app.route('/predict',methods=['GET','POST'])
def predict():
    if request.method == 'POST':
        Team_1 = request.form['Team_1']
        Team_2 = request.form['Team_2']
        venue = request.form['venue']
        toss_win=request.form['toss_win']
        city=request.form['city']
        toss_dec=request.form['toss_dec']


        sample_data = [Team_1,Team_2,venue,toss_win,city,toss_dec]
        model=pickle.load(load_model)
        prediction=model.predict(np.array(sample_data).reshape(1,-1))
    return render_template('index.html',sample_data=sample_data,prediction=prediction)




if __name__ == '__main__':
    app.run(debug=True)


