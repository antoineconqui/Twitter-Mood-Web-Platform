function SaveUnlabelledTweet(id, text, username, time, embedding){
    db.collection('unlabelledTweets').doc(id).set( { text: text, username: username, time: time, embedding: embedding} );
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
    $('input[type=checkbox]').each(function () {
        $(this).prop('checked', false);
        $(this).prop('disabled', false);
    });
}

function SaveLabelledTweet(tweet){
    db.collection('labelledTweets').add({
        id: tweet['id'],
        text: tweet['text'],
        username: tweet['username'],
        time: tweet['time'],
        neutre: $('#neutre').is(':checked'),
        suicidaire: $('#suicidaire').is(':checked'),
        démotivé: $('#démotivé').is(':checked'),
        mélancolique: $('#mélancolique').is(':checked'),
        anxieux: $('#anxieux').is(':checked'),
        nostalgique: $('#nostalgique').is(':checked'),
        désespéré: $('#désespéré').is(':checked'),
        pessimiste: $('#pessimiste').is(':checked'),
        dévalorisé: $('#dévalorisé').is(':checked'),
        tristesse: $('#triste').is(':checked'),
        fatigué: $('#fatigué').is(':checked'),
        inutilité: $('#inutilité').is(':checked'),
        culpabilité: $('#culpabilité').is(':checked'),
        motivé: $('#motivé').is(':checked'),
        optimiste: $('#optimiste').is(':checked'),
        joyeux: $('#joyeux').is(':checked'),
        confiant: $('#confiant').is(':checked'),
        enthousiaste: $('#enthousiaste').is(':checked'),
    })
    .then(function() {
        db.collection('labelledTweets').doc('00000000').get().then(function(document) {
            db.collection('labelledTweets').doc('00000000').set({
                counter: document.data()['counter']+1,
            });
        });
        $.cookie('lastLabelledTweet', tweet['id'], { expires: 365 });
        NewTweet();
    });
}

