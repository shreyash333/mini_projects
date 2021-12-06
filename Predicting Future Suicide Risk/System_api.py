from flask import Flask, jsonify, request
import joblib
import math
# creating a Flask app
app = Flask(__name__)
  
# on the terminal type: curl http://127.0.0.1:5000/
# returns hello world when we use GET.
# returns the data that we send when we use POST.
@app.route('/', methods = ['GET', 'POST'])
def home():
    if(request.method == 'GET'):
  
        data = "hello world"
        return jsonify({'data': data})
  
  
# A simple function to calculate the square of a number
# the number to be squared is sent in the URL when we use GET
# on the terminal type: curl http://127.0.0.1:5000 / home / 10
# this returns 100 (square of 10)
@app.route('/home/<int:num>', methods = ['GET'])
def disp(num):
  
    return jsonify({'data': num**2})
  
@app.route('/users', methods = ['POST']) 
def new_user():
    topics = request.form.get('name')
    user_data = request.get_json() # 
    # add here the code to create the user
    res = {'status': 'ok', 'name':topics}
    return jsonify(res)
  
  
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
    predictedcount = all_india_model_clone.predict([[request.form.get['year']]])
    malecount = male_model_clone.predict([[request.form.get['year']]])
    femalecount = female_india_model_clone.predict([[request.form.get['year']]])
    age014count = age014_model_clone.predict([[request.form.get['year']]])
    age1529count = age1529_model_clone.predict([[request.form.get['year']]])
    age3044count = age3044_model_clone.predict([[request.form.get['year']]])
    age4559count = age4559_model_clone.predict([[request.form.get['year']]])
    age60count = age60_model_clone.predict([[request.form.get['year']]])
    res = {
        'predicted_count':math.ceil(predictedcount[0][0]), 
        'female_predicted_count':math.ceil(femalecount[0][0]),
        'male_predicted_count':math.ceil(malecount[0][0]),
        'age014_predicted_count':math.ceil(age014count[0][0]),
        'age1529_predicted_count':math.ceil(age1529count[0][0]),
        'age3044_predicted_count':math.ceil(age3044count[0][0]),
        'age4559_predicted_count':math.ceil(age4559count[0][0]),
        'age60_predicted_count':math.ceil(age60count[0][0]),
        'accuracy': math.ceil(85.98)
    }
    return jsonify(res)


@app.route("/statePrediction", methods=["POST", "GET"])
def statePredict():
    year = request.form.get['year']
    state = request.form.get['state']
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
    res={
        'state_prediction':math.ceil(statecount[0][0]), 
        'accuracy':math.ceil(float(accuracy)), 
        'statename':statename
    }
    return jsonify(res)

@app.route("/indivisualPrediction", methods=["POST", "GET"])
def indivisualPredict():
    age = int(request.form.get['age'])
    gender = int(request.form.get['gender'])
    state = int(request.form.get['state'])
    indivisual_model_clone = joblib.load('Indivisual Model/Decision_Tree_Gini.pkl')
    PredictionEncodedTendency = indivisual_model_clone.predict([[state, gender, age]])
    PredictionTendency =""
    if(PredictionEncodedTendency[0]==0):
        PredictionTendency="Low"
    elif(PredictionEncodedTendency[0]==1):
        PredictionTendency="High"
    res={
         'tendency':PredictionTendency, 
         'accuracy':math.ceil(float(90.47))
    }
    return jsonify(res)


# driver function
if __name__ == '__main__':
  
    app.run(debug = True)
    
    


    
    
    

