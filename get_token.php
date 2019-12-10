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

    $key = '1BNsXIWrP251ZUxMLiuNcmU3z';
    $secret = 'JwAJY0unL8g3QRNBpqVL6Kpr1oNPgR45H9YCjyUfGU699zmVqw';
    $token = getBearerToken($key,$secret);
?>

<script>
    var token = "<?php print $token; ?>" ;
</script>