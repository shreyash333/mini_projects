import os
import nltk
from nltk.tokenize import word_tokenize
from nltk.tokenize import sent_tokenize
from nltk.corpus import stopwords
import re
import math

path = 'C:/Users/Asus/OneDrive/Desktop/Sem 7/bdaproject/sample'

files = os.listdir(path)
fileclusters = []
clsutersim = []
thresholdsimarity = 35.00
stop_words = set(stopwords.words('english'))
punctuations = ['"', '.', '(', ')', ',', '?', ';', ':', "''", '``']


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


counter = 0
for i in range(0, len(files)):
    if files[i] != " ":
        # print(counter)
        tempclsuter = []
        tempclustersim = []
        tempclsuter.append(files[i])
        tempclustersim.append("Base file")
        f = open("sample/"+files[i], "r")
        database = f.read().replace("\n", " ")
        f.close()
        # files.remove(files[i])
        files[i] = " "
        tokens_database = word_tokenize(database)
        tokens_database = [token.lower() for token in tokens_database]
        filtered_tokens_database = [
            w for w in tokens_database if not w in stop_words and not w in punctuations]
        sent_database = sent_tokenize(database)
        for j in range(i, len(files)):
            if files[j] != " ":
                f2 = open("sample/"+files[j], "r")
                checkfile = f2.read().replace("\n", " ")
                f2.close()
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
                    tempclustersim.append(tempsim)
                    # files.remove(files[j])
                    files[j] = " "
        fileclusters.append(tempclsuter)
        clsutersim.append(tempclustersim)
        counter = counter+1

for i in range(0, len(fileclusters)):
    print("\t     Cluster "+str(i+1))
    print("Filename \t|\tPlagarism Percentage")
    for j in range(0, len(fileclusters[i])):
        print(str(fileclusters[i][j]) +
              "\t|\t" + str(clsutersim[i][j]))
    print("")
