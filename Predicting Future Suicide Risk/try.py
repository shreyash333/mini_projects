
import numpy as np
import pickle
from flask import Flask, request, render_template
import joblib
import math
import xlrd
import pandas as pd
import os

app = Flask(__name__)

@app.route("/")
def hello_world():
    return render_template('home.html')

@app.route("/option1")
def Option1():
    return render_template('option1.html')

@app.route("/option2")
def Option2():
    return render_template('option2.html')

@app.route("/option3")
def Option3():
    return render_template('option3.html')

@app.route("/option4")
def Option4():
    return render_template('option4.html')

@app.route("/allIndiaPrediction", methods=["POST", "GET"])
def allIndiaPredict():
    all_india_model_clone = joblib.load('main_model/All_India_count.pkl')
    male_model_clone = joblib.load('main_model/Male_model.pkl')
    female_india_model_clone = joblib.load('main_model/Female_model.pkl')
    age014_model_clone = joblib.load('main_model/0-14_model.pkl')
    age1529_model_clone = joblib.load('main_model/15-29_model.pkl')
    age3044_model_clone = joblib.load('main_model/30-44_model.pkl')
    age4559_model_clone = joblib.load('main_model/45-59_model.pkl')
    age60_model_clone = joblib.load('main_model/60+_model.pkl')
    predictedcount = all_india_model_clone.predict([[request.form['year']]])
    malecount = male_model_clone.predict([[request.form['year']]])
    femalecount = female_india_model_clone.predict([[request.form['year']]])
    age014count = age014_model_clone.predict([[request.form['year']]])
    age1529count = age1529_model_clone.predict([[request.form['year']]])
    age3044count = age3044_model_clone.predict([[request.form['year']]])
    age4559count = age4559_model_clone.predict([[request.form['year']]])
    age60count = age60_model_clone.predict([[request.form['year']]])
    return render_template('allIndiaResult.html',predicted_count=math.ceil(predictedcount[0][0]), 
                           female_predicted_count=math.ceil(femalecount[0][0]),
                           male_predicted_count=math.ceil(malecount[0][0]),
                           age014_predicted_count=math.ceil(age014count[0][0]),
                           age1529_predicted_count=math.ceil(age1529count[0][0]),
                           age3044_predicted_count=math.ceil(age3044count[0][0]),
                           age4559_predicted_count=math.ceil(age4559count[0][0]),
                           age60_predicted_count=math.ceil(age60count[0][0]),
                           accuracy= math.ceil(85.98))


@app.route("/statePrediction", methods=["POST", "GET"])
def statePredict():
    year = request.form['year']
    state = request.form['state']
    statecode= str(state)
    statename=""
    accuracy=""
    df = pd.read_excel('static/statescore.xlsx')
    for index,j in df.iterrows():
        if(str(j['code'])==statecode):
            statename = j['State']
            accuracy = j['Score Percent']
            break
    modelpath = "State models\\"+statename+"_model.pkl"
    state_model_clone = joblib.load(modelpath)
    statecount = state_model_clone.predict([[year]])
    return render_template('stateResult.html', state_prediction=math.ceil(statecount[0][0]), accuracy=math.ceil(float(accuracy)), statename=statename)

@app.route("/indivisualPrediction", methods=["POST", "GET"])
def indivisualPredict():
    age = int(request.form['age'])
    gender = int(request.form['gender'])
    state = int(request.form['state'])
    indivisual_model_clone = joblib.load('Indivisual Model/Decision_Tree_Gini.pkl')
    PredictionEncodedTendency = indivisual_model_clone.predict([[state, gender, age]])
    PredictionTendency =""
    if(PredictionEncodedTendency[0]==0):
        PredictionTendency="Low"
    elif(PredictionEncodedTendency[0]==1):
        PredictionTendency="High"
    return render_template('indivisualResult.html', tendency=PredictionTendency, accuracy=math.ceil(float(90.47)))

def Option4():
    return render_template('option4.html')

if __name__ == '__main__':
    app.run()