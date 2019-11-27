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
    <!-- Logo -->
    <image = />


    <!-- Barre de navigation -->
    <nav class="navbar">
      <div class="container-fluid">
        <div class="navbar-header col-md-2">
          <a class="navbar-brand" href="#">Twitter Mood Platform</a>
        </div>
        <ul class="nav navbar-nav col-md-8">
          <li><a href="index.php">Acceuil</a></li>
          <li><a href="projet.html">Projet</a></li>

        </ul>
        <div class="topnav col-md-2">
            <p>Nombre de tweets</p>
            <?php include 'get_compteur.php'; ?>
        </div>
      </div>
    </nav>
    

    <!-- Tweet + Explication du projet -->

    <div class="container">
        <div class="row">
            <div class="col-md-8" id="tweet">
                <h1> TROUVEZ-VOUS CE TWEET PLUTOT JOYEUX OU DEPRESSIF ?</h1>
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
