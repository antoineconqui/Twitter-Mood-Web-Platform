function GetTweet(url){
    const Http = new XMLHttpRequest();
    Http.open("GET", 'https://publish.twitter.com/oembed?%20url='+url);
    Http.send();

    Http.onreadystatechange = (e) => {
        console.log(Http.responseText)
    }
}

GetTweet('https://twitter.com/elonmusk/status/1187490060746182656')