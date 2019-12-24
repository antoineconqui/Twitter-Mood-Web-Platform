var firebaseConfig = {
    apiKey: "AIzaSyAOGe0tzWuVJi7UaNucVrvm8_b6grDABXY",
    authDomain: "twittermood-d450f.firebaseapp.com",
    databaseURL: "https://twittermood-d450f.firebaseio.com",
    projectId: "twittermood-d450f",
    storageBucket: "twittermood-d450f.appspot.com",
    messagingSenderId: "350701270055",
    appId: "1:350701270055:web:918d3145e1038f68a3ca02"
};

firebase.initializeApp(firebaseConfig);

var db = firebase.firestore();