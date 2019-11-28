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
    

    <!-- Tweet + Explication du projet -->

    <div class="container">
        <div class="row">
            <div class="col-md-8" id="tweet">
                <?php
                    include 'get_tweet.php';
                ?>
                
            </div>


            <div class="col-md-4" id="evaluation">
            
            <form action="/action_page.php">
                    <fieldset>
                        <legend>Evaluation du tweet:</legend>
                        <label for="mood">Mood</label>
                        <input type="range" id="mood" name="mood" min="0" max="10">
                        <input type="submit" value="Envoyer"></br>
                        <label for="nom critere">Nom</label>
                        <input type="range" id="nomc" name="nomc" min="0" max="10">
                        <input type="submit" value="Envoyer"></br>
                    </fieldset>
            </form>
            </div>
        </div>
    </div>

    <!-- <script src="script.js"></script> -->

</body>
</html>
