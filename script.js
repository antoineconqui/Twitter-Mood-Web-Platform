function GetTweet(url, key, secret){

    const http = new XMLHttpRequest();
    http.open("GET", 'https://publish.twitter.com/oembed?%20url='+url);
    http.send();
    http.onreadystatechange = (e) => {
        console.log(http.responseText)
    }
}

GetTweet('https://twitter.com/elonmusk/status/1187490060746182656')