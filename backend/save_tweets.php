<script src="../script/firebase-app.js"></script>
<script src="../script/firebase-auth.js"></script>
<script src="../script/firebase-firestore.js"></script>
<script src="../script/firebase-config.js"></script>
<script src="../script/firebase-functions.js"></script>

<?php

    include('./token.php');

    function SaveUnlabelledTweet($token, $search_word, $n){
        $api_endpoint = 'https://api.twitter.com/1.1/search/tweets.json?q='.$search_word.'&lang=fr&count='.$n.'&tweet_mode=extended&include_entities=false';
        $br = curl_init($api_endpoint);
        curl_setopt($br, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token));
        curl_setopt($br, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($br));
        curl_close($br);
        $statuses = $data->statuses;
        foreach ($statuses as $status) {
            $id = $status->id;
            if(!isset($status->retweeted_status)){
                $text = str_replace("'","\'",preg_replace("#\n|\t|\r#","",$status->full_text));
                $username = $status->user->screen_name;
                $time = $status->created_at;
                $url = 'https://twitter.com/'.$username.'/status/'.$id;
                $api_endpoint = 'https://publish.twitter.com/oembed?url='.$url.'';
                $br = curl_init($api_endpoint);
                curl_setopt($br, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token));
                curl_setopt($br, CURLOPT_RETURNTRANSFER, true);
                $data = json_decode(curl_exec($br));
                curl_close($br);
                $embedding = str_replace('script','scr"+"ipt',str_replace('"','\"',preg_replace("#\n|\t|\r#","",$data->html)));
                ?><script>
                    SaveUnlabelledTweet('<?php print $id; ?>', '<?php print $text; ?>', '<?php print $username; ?>', '<?php print $time; ?>', "<?php print $embedding; ?>");
                </script><?php 
            }
        }
    }

    function MorningRoutine($token){
        SaveUnlabelledTweet($token, 'depression', 50);
        SaveUnlabelledTweet($token, 'suicide', 50);
        SaveUnlabelledTweet($token, 'bad%20mood', 50);
        SaveUnlabelledTweet($token, 'bad%20triste', 50);
        ?><script>UpdateCounter();</script><?php
    }

    MorningRoutine($token);
    
?>

<script>
    db.collection('unlabelledTweets').get().then(snap => {
        console.log(snap.size);
    });
    db.collection('labelledTweets').get().then(snap => {
        console.log(snap.size);
    });
</script>