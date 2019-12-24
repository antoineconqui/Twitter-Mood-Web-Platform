<?php
    
    function getBearerToken($key, $secret){
        $basic_credentials = base64_encode($key.':'.$secret);
        $tk = curl_init('https://api.twitter.com/oauth2/token');
        curl_setopt($tk, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$basic_credentials, 'Content-Type: application/x-www-form-urlencoded;charset=UTF-8'));
        curl_setopt($tk, CURLOPT_POSTFIELDS, 'grant_type=client_credentials');
        curl_setopt($tk, CURLOPT_RETURNTRANSFER, true);
        $token = json_decode(curl_exec($tk));
        curl_close($tk);
        return $token->access_token;
    }

    $key = '5DF8l8MzD3imbUS7cGoBF2i7P';
    $secret = 'qH0IbIuUBn9KeSNVjNN1ULrKWp210jHwBH7loVQNsmK09hOdkf';
    $token = getBearerToken($key,$secret);

?>