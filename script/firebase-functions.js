function SaveUnlabelledTweet(id, text, username, time, embedding){
    db.collection('unlabelledTweets').doc(id).get().then(snap => {
        if(!snap.exists){
            db.collection('unlabelledTweets').doc(id).set( { text: text, username: username, time: time, embedding: embedding} );
            console.log(id);
        }
    });
}

function DisplayTweet(){
    $("#tweet").html(_tweet['embedding']);
}

function NewTweet(){
    var lastLabelledTweet = $.cookie('lastLabelledTweet') ;
    if(lastLabelledTweet==null){
        lastLabelledTweet = '0';
    }
    db.collection('unlabelledTweets').where('__name__', '>', lastLabelledTweet).orderBy('__name__').limit(1).get().then(function(querySnapshot) {
        querySnapshot.forEach(function(document) {
            _tweet = document.data(); 
            _tweet['id'] = document.id;
            DisplayTweet();
        });
    });
    $('.mood-button').each(function() {
        $(this).removeClass('disabled');
        $(this).removeClass('checked');
    });
}

function SaveLabelledTweet(tweet){
    db.collection('labelledTweets').add({
        id: tweet['id'],
        text: tweet['text'],
        username: tweet['username'],
        time: tweet['time'],
        neutre: $('#neutre').hasClass('checked'),
        suicidaire: $('#suicidaire').hasClass('checked'),
        démotivé: $('#démotivé').hasClass('checked'),
        mélancolique: $('#mélancolique').hasClass('checked'),
        anxieux: $('#anxieux').hasClass('checked'),
        nostalgique: $('#nostalgique').hasClass('checked'),
        désespéré: $('#désespéré').hasClass('checked'),
        pessimiste: $('#pessimiste').hasClass('checked'),
        dévalorisé: $('#dévalorisé').hasClass('checked'),
        tristesse: $('#triste').hasClass('checked'),
        fatigué: $('#fatigué').hasClass('checked'),
        inutilité: $('#inutilité').hasClass('checked'),
        culpabilité: $('#culpabilité').hasClass('checked'),
        motivé: $('#motivé').hasClass('checked'),
        optimiste: $('#optimiste').hasClass('checked'),
        joyeux: $('#joyeux').hasClass('checked'),
        confiant: $('#confiant').hasClass('checked'),
        enthousiaste: $('#enthousiaste').hasClass('checked'),
    })
    .then(function() {
        ChangeCounter('labelled',1);
        $.cookie('lastLabelledTweet', tweet['id'], { expires: 365 });

        if(Math.random()>0.9){
            db.collection('labelledTweets').doc(tweet['id']).get().then(function(document) {
                document.ref.delete();
            });
            ChangeCounter('unlabelled',-1);
        }
        NewTweet();
    });
}

function ChangeCounter(counter, n){
    db.collection('counters').doc(counter).get().then(function(document) {
        db.collection('counters').doc(counter).set({
            counter: document.data()['counter'] + n,
        });
    });
}

function UpdateCounter(){
    db.collection('unlabelledTweets').get().then(snap => {
        db.collection('counters').doc('unlabelled').set({
            counter: snap.size,
        });
    });
    db.collection('labelledTweets').get().then(snap => {
        db.collection('counters').doc('labelled').set({
            counter: snap.size,
        });
    });
}