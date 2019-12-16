<?php

    class Tweet{
        public $id;
        public $text;
        public $username;
        public $url;
        public $embedding;

        public function __construct($id, $text, $username, $url, $embedding){
            
        }

        public function display(){
            print($this->embedding);
        }
    }

    function getTweets($token, $search_word, $n){

        $tweets = [];

        $api_endpoint = 'https://api.twitter.com/1.1/search/tweets.json?q='.$search_word.'&lang=fr&count=1&tweet_mode=extended';
        $br = curl_init($api_endpoint);
        curl_setopt($br, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token->access_token));
        curl_setopt($br, CURLOPT_RETURNTRANSFER, true);
        $data = json_decode(curl_exec($br));
        curl_close($br);
        $statuses = $data->statuses;
        if(count($statuses)!=0){
            for ($i=0; $i < count($statuses); $i++) { 
                $id = $data->statuses[$i]->id;
                $text = $data->statuses[$i]->full_text;
                $username = $data->statuses[$i]->user->screen_name;
                $url = 'https://twitter.com/'.$username.'/status/'.$id;
                $api_endpoint = 'https://publish.twitter.com/oembed?url='.$url.'';
                $br = curl_init($api_endpoint);
                curl_setopt($br, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token->access_token));
                curl_setopt($br, CURLOPT_RETURNTRANSFER, true);
                $data = json_decode(curl_exec($br));
                curl_close($br);
                $embedding = $data->html;
                $tweet = new Tweet($id, $text, $username, $url, $embedding);
                array_push($tweets, $tweet);
            }
            return $tweets;
            ?><script>
                // var id = "<?php print $this->id;?>";
                // var text = "<?php print $this->text;?>";
            </script><?php
        }
        else{
            return null;
            // $embedding = "<span> Erreur de connexion avec Twitter. Impossible de récupérer de tweets.</span>";
        }
    }

    function getBearerToken($key, $secret){
        $basic_credentials = base64_encode($key.':'.$secret);
        $tk = curl_init('https://api.twitter.com/oauth2/token');
        curl_setopt($tk, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$basic_credentials, 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8'));
        curl_setopt($tk, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($tk, CURLOPT_RETURNTRANSFER, true);
        $token = json_decode(curl_exec($tk));
        curl_close($tk);
        return $token;
    }

    $key = '1BNsXIWrP251ZUxMLiuNcmU3z';
    $secret = 'JwAJY0unL8g3QRNBpqVL6Kpr1oNPgR45H9YCjyUfGU699zmVqw';
    $token = getBearerToken($key,$secret);

    $tweets = getTweets($token,'depression',10);

    $tweet = $tweets[0];
    $tweet->display();
?>