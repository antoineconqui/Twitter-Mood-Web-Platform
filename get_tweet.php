<?php
    class Tweet{
        public $id;
        public $text;
        public $username;
        public $url;
        public $embedding;

        public function __construct($token, $search_word){
            $api_endpoint = 'https://api.twitter.com/1.1/search/tweets.json?q='.$search_word.'&lang=fr&count=1&tweet_mode=extended';
            $br = curl_init($api_endpoint);
            curl_setopt($br, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token->access_token));
            curl_setopt($br, CURLOPT_RETURNTRANSFER, true);
            $data = json_decode(curl_exec($br));
            curl_close($br);

            if(count($data->statuses)!=0){
                $this->id = $data->statuses[0]->id;
                $this->text = $data->statuses[0]->full_text;
                $this->username = $data->statuses[0]->user->screen_name;
                $this->url = 'https://twitter.com/'.$this->username.'/status/'.$this->id;
                $api_endpoint = 'https://publish.twitter.com/oembed?url='.$this->url.'';
                $br = curl_init($api_endpoint);
                curl_setopt($br, CURLOPT_HTTPHEADER, array('Authorization: Bearer '.$token->access_token));
                curl_setopt($br, CURLOPT_RETURNTRANSFER, true);
                $data = json_decode(curl_exec($br));
                curl_close($br);
                $this->embedding = $data->html;
                ?><script>
                    var id = "<?php print $this->id;?>";
                    var text = "<?php print $this->text;?>";
                </script><?php
            }
            else{
                $this->embedding = "<span> Erreur de connexion avec Twitter. Impossible de récupérer de tweets.</span>";
            }
        }

        public function display(){
            print($this->embedding);
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

    $tweet = new Tweet($token, 'depression');
    $tweet->display();
?>