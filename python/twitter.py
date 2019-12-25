import firebase_admin
from firebase_admin import credentials
from firebase_admin import firestore
import numpy as np

# cred = credentials.Certificate("C:/xampp/htdocs/twitter/python/serviceAccountKey.json")
# firebase_admin.initialize_app(cred)
# db = firestore.client()

def sigmoid(x):
    return round(1/(1+np.exp(-30*(x-0.25))),2)

def GetTweets():
    labelledTweets, ids, tweets, meanTweets = [],[],[],[]

    docs = db.collection('labelledTweets').stream()

    for doc in docs:
        labelledTweets.append(doc.to_dict())

    for labelledTweet in labelledTweets:
        if(labelledTweet['id'] not in ids):
            ids.append(labelledTweet['id'])
            tweets.append([])
        index = ids.index(labelledTweet['id'])
        tweets[index].append(labelledTweet)

    for tweet in tweets:

        meanTweet = {
            'id' : tweet[0]['id'],
            'text' : tweet[0]['text'],
            'username' : tweet[0]['username'],
            'time' : tweet[0]['time'],
            'nb_eval' : len(tweet),
            'neutre' : 0,
            'suicidaire' : 0,
            'démotivé' : 0,
            'mélancolique' : 0,
            'anxieux' : 0,
            'nostalgique' : 0,
            'désespéré' : 0,
            'pessimiste' : 0,
            'dévalorisé' : 0,
            'tristesse' : 0,
            'fatigué' : 0,
            'inutilité' : 0,
            'culpabilité' : 0,
            'motivé' : 0,
            'optimiste' : 0,
            'joyeux' : 0,
            'confiant' : 0,
            'enthousiaste' : 0,
        }

        for evaluation in tweet:
            meanTweet['neutre'] += evaluation['neutre']
            meanTweet['suicidaire'] += evaluation['suicidaire']
            meanTweet['démotivé'] += evaluation['démotivé']
            meanTweet['mélancolique'] += evaluation['mélancolique']
            meanTweet['anxieux'] += evaluation['anxieux']
            meanTweet['nostalgique'] += evaluation['nostalgique']
            meanTweet['désespéré'] += evaluation['désespéré']
            meanTweet['pessimiste'] += evaluation['pessimiste']
            meanTweet['dévalorisé'] += evaluation['dévalorisé']
            meanTweet['tristesse'] += evaluation['tristesse']
            meanTweet['fatigué'] += evaluation['fatigué']
            meanTweet['inutilité'] += evaluation['inutilité']
            meanTweet['culpabilité'] += evaluation['culpabilité']
            meanTweet['motivé'] += evaluation['motivé']
            meanTweet['optimiste'] += evaluation['optimiste']
            meanTweet['joyeux'] += evaluation['joyeux']
            meanTweet['confiant'] += evaluation['confiant']
            meanTweet['enthousiaste'] += evaluation['enthousiaste']

        n = len(tweet)

        meanTweet['neutre'] = sigmoid(meanTweet['neutre']/n)
        meanTweet['suicidaire'] = sigmoid(meanTweet['suicidaire']/n)
        meanTweet['démotivé'] = sigmoid(meanTweet['démotivé']/n)
        meanTweet['mélancolique'] = sigmoid(meanTweet['mélancolique']/n)
        meanTweet['anxieux'] = sigmoid(meanTweet['anxieux']/n)
        meanTweet['nostalgique'] = sigmoid(meanTweet['nostalgique']/n)
        meanTweet['désespéré'] = sigmoid(meanTweet['désespéré']/n)
        meanTweet['pessimiste'] = sigmoid(meanTweet['pessimiste']/n)
        meanTweet['dévalorisé'] = sigmoid(meanTweet['dévalorisé']/n)
        meanTweet['tristesse'] = sigmoid(meanTweet['tristesse']/n)
        meanTweet['fatigué'] = sigmoid(meanTweet['fatigué']/n)
        meanTweet['inutilité'] = sigmoid(meanTweet['inutilité']/n)
        meanTweet['culpabilité'] = sigmoid(meanTweet['culpabilité']/n)
        meanTweet['motivé'] = sigmoid(meanTweet['motivé']/n)
        meanTweet['optimiste'] = sigmoid(meanTweet['optimiste']/n)
        meanTweet['joyeux'] = sigmoid(meanTweet['joyeux']/n)
        meanTweet['confiant'] = sigmoid(meanTweet['confiant']/n)
        meanTweet['enthousiaste'] = sigmoid(meanTweet['enthousiaste']/n)

        meanTweets.append(meanTweet)

    print(str(len(meanTweets))+' tweets évalués');

    return meanTweets

tweets = GetTweets()