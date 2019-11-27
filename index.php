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
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">Twitter Mood Platform</a>
        </div>
        <ul class="nav navbar-nav">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">Acceuil</a></li>
          <li><a href="#">Projet</a></li>
        </ul>
      </div>
    </nav>

    <!-- Barre de recherche -->
    <div class="topnav">
      <input type="text" placeholder="Search..">
    </div>

    <!-- Tweet + Explication du projet -->

    <div class="container">
        <div class="row">
            <div class="col-md-8" id="tweet">
                <?php
                    include 'get_tweet.php';
                ?>
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


            <div class="col-md-4" id="evaluation">


                


            </div>
        </div>
    </div>

    <!-- <script src="script.js"></script> -->

</body>
</html>
