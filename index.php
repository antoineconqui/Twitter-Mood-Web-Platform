<?php 
  require_once 'get_token.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Twitter Mood Platform</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>

<body>
    
  <div class="container" id="header">
      
    <div class="row">

      <div class="col-md-2">
        <img src="./files/twitter_mood_icon.png" alt="Icon Twitter Mood" class="logo">
      </div>

      <div class="col-md-10">
        <div class="row">
          <nav class="navbar">
            <div class="navbar-header col-md-5">
              <a class="navbar-brand title" href="index.php">Twitter Mood Platform</a>
            </div>
            <ul class="nav navbar-nav col-md-3">
              <li><a href="index.php">Acceuil</a></li>
              <li><a href="projet.html">Projet</a></li>
            </ul>
            <div class="topnav col-md-4">
              <p>Nombre de tweets</p>
              <?php include 'get_compteur.php'; ?>
            </div>
          </nav>
        </div>
        <div class="row">
          <h1> TROUVEZ-VOUS CE TWEET PLUTOT JOYEUX OU DEPRESSIF ?</h1>
        </div>
      </div>

    </div>

  </div>
    
  <div class="container">
    <div class="row">
      <div class="col-md-8" id="tweet">
        <?php
          //include 'get_tweet.php';
        ?>
      </div>
      <div class="col-md-4" id="evaluation">
        <form action="/action_page.php">
          <fieldset>
            <legend>Evaluation du tweet:</legend>
            <label for="note">Humeur du tweet (0 à 10)</label>
            <input type="range" id="note" name="note" min="0" max="10">
            <input type="submit" value="Envoyer"></br>
          </fieldset>
        </form>
      </div>
    </div>
  </div>


  <script src="https://www.gstatic.com/firebasejs/7.5.2/firebase-app.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.5.2/firebase-auth.js"></script>
  <script src="https://www.gstatic.com/firebasejs/7.5.2/firebase-firestore.js"></script>
  <script>
    var firebaseConfig = {
      apiKey: "AIzaSyAOGe0tzWuVJi7UaNucVrvm8_b6grDABXY",
      authDomain: "twittermood-d450f.firebaseapp.com",
      databaseURL: "https://twittermood-d450f.firebaseio.com",
      projectId: "twittermood-d450f",
      storageBucket: "twittermood-d450f.appspot.com",
      messagingSenderId: "350701270055",
      appId: "1:350701270055:web:918d3145e1038f68a3ca02"
    };
    firebase.initializeApp(firebaseConfig);
  </script>

  <script src="script.js"></script>

</body>

</html>
