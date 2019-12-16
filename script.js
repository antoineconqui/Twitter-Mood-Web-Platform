function RetrieveTweet(token, search_word){
    $.ajax({
        url: 'https://api.twitter.com/1.1/search/tweets.json?q='+search_word+'&lang=fr&count=1&tweet_mode=extended',
        headers: {
            'Authorization': 'Bearer '+token,
            'Access-Control-Allow-Origin' : '*',
        },
        method: 'GET',
        dataType: 'json',
        success: function(data){
            console.log('succes: '+json(data));
        },
        error: function(e){
            console.log('error: ');
        }
    });

    // curl_setopt($br, CURLOPT_RETURNTRANSFER, true);
    // $data = json_decode(curl_exec($br));
    // curl_close($br);
}

//RetrieveTweet(token,'depression');

var db = firebase.firestore();

console.log(id + ' - ' + text);

function AddTweet(text,note){
    db.collection("tweets").add({
        text: text,
        note: note,
    })
    .then(function(docRef) {
        console.log("Document written with ID: ", docRef.id);
    })
    .catch(function(error) {
        console.error("Error adding document: ", error);
    });
}

// function GetTweet(){
//     db.collection("tweets").get().then((querySnapshot) => {
//         querySnapshot.forEach((doc) => {
//             console.log(`${doc.id} => ${doc.data()}`);
//         });
//     });
// }

// AddTweet('test',10);
// GetTweet();