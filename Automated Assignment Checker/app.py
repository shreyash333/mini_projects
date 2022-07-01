
import numpy as np
import pickle
from flask import Flask, request, render_template
import joblib
import math
#import xlrd
#import pandas as pd
import os
import pdfplumber
import nltk
from nltk.tokenize import word_tokenize
from nltk.tokenize import sent_tokenize
from nltk.corpus import stopwords
import re
import math

app = Flask(__name__)


@app.route("/")
def hello_world():
    return render_template('home.html')


@app.route("/getresult", methods=["POST", "GET"])
def allIndiaPredict():
    path = request.form['path']
    files = list(os.listdir(path))
    fileclusters = []
    clsutersim = []
    thresholdsimarity = float(int(request.form['percentage']))
    stop_words = set(stopwords.words('english'))
    punctuations = ['"', '.', '(', ')', ',', '?', ';', ':', "''", '``']
    counter = 0
    for i in range(0, len(files)):
        if files[i] != " ":
            tempclsuter = []
            tempclustersim = []
            tempclsuter.append(files[i])
            database = ""
            with pdfplumber.open(path + files[i]) as pdf:
                totalpages = len(pdf.pages)
                for m in range(0, totalpages):
                    pageobj = pdf.pages[m]
                    database = database + pageobj.extract_text()
            database = database.replace('\n', ' ')
            tempclustersim.append("Base file")
            files[i] = " "
            tokens_database = word_tokenize(database)
            tokens_database = [token.lower() for token in tokens_database]
            filtered_tokens_database = [
                w for w in tokens_database if not w in stop_words and not w in punctuations]
            sent_database = sent_tokenize(database)

            for j in range(i, len(files)):
                if files[j] != " ":
                    checkfile = ""
                    with pdfplumber.open(path + files[j]) as pdf:
                        totalpages = len(pdf.pages)
                        for m in range(0, totalpages):
                            pageobj = pdf.pages[m]
                            checkfile = checkfile + pageobj.extract_text()
                    checkfile = checkfile.replace('\n', ' ')
                    tokens_checkfile = word_tokenize(checkfile)
                    tokens_checkfile = [token.lower()
                                        for token in tokens_checkfile]
                    filtered_tokens_checkfile = [
                        w for w in tokens_checkfile if not w in stop_words and not w in punctuations]
                    sent_checkfile = sent_tokenize(checkfile)
                    temp_word_sim = cosinesim(filtered_tokens_checkfile,
                                              filtered_tokens_database)
                    temp_sent_sim = cosinesim(sent_checkfile, sent_database)
                    # print(temp_sent_sim)
                    tempsim = (temp_word_sim+temp_sent_sim)/2
                    if tempsim >= thresholdsimarity:
                        tempclsuter.append(files[j])
                        tempclustersim.append(str(round(tempsim, 2)))
                        # files.remove(files[j])
                        files[j] = " "
            tempclsuterstr = "*".join(tempclsuter)
            fileclusters.append(tempclsuterstr)
            tempclustersimstr = "*".join(tempclustersim)
            clsutersim.append(tempclustersimstr)
            counter = counter+1
    return render_template('result2.html', path=path, thresholdsimarity=thresholdsimarity, result_list="@".join(fileclusters), percent_list="@".join(clsutersim))
    # return render_template('result.html', result_list=[['test1.pdf', 'test5.pdf'], ['test10.pdf', 'test2.pdf', 'test7.pdf'], ['test3.pdf', 'test4.pdf', 'test6.pdf'], ['test8.pdf'], ['test9.pdf']], percent_list=[['Base file', 63.8085550541834], ['Base file', 61.55399782338604, 78.40282350764247], ['Base file', 82.9251026980864, 64.45516621492203], ['Base file'], ['Base file']])


def cosinesim(queryWordList, databaseWordList):
    setOfUniqueWords = []
    matchPercentage = 0
    for word in queryWordList:
        if word not in setOfUniqueWords:
            setOfUniqueWords.append(word)
    for word in databaseWordList:
        if word not in setOfUniqueWords:
            setOfUniqueWords.append(word)

    queryTF = []
    databaseTF = []

    for word in setOfUniqueWords:
        queryTfCounter = 0
        databaseTfCounter = 0

        for word2 in queryWordList:
            if word == word2:
                queryTfCounter += 1
        queryTF.append(queryTfCounter)

        for word2 in databaseWordList:
            if word == word2:
                databaseTfCounter += 1
        databaseTF.append(databaseTfCounter)

    dotProduct = 0
    for i in range(len(queryTF)):
        dotProduct += queryTF[i]*databaseTF[i]

    queryVectorMagnitude = 0
    for i in range(len(queryTF)):
        queryVectorMagnitude += queryTF[i]**2
    queryVectorMagnitude = math.sqrt(queryVectorMagnitude)

    databaseVectorMagnitude = 0
    for i in range(len(databaseTF)):
        databaseVectorMagnitude += databaseTF[i]**2
    databaseVectorMagnitude = math.sqrt(databaseVectorMagnitude)

    matchPercentage = (float)(
        dotProduct / (queryVectorMagnitude * databaseVectorMagnitude))*100

    return matchPercentage


if __name__ == '__main__':
    app.run()


@app.route("/try", methods=["POST", "GET"])
def trytry():
    return True


# C:/Users/Asus/OneDrive/Desktop/NLP/samplepdf/Assignment_01/
