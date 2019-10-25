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

    <h1>Twitter Mood Platform</h1>

    <div class="container">
        <div class="row">
            <div class="col-md-6" id="tweet">
                <?php
                    include 'get_tweet.php';
                ?>
            </div>
            <div class="col-md-6" id="evaluation">
                <form action="/action_page.php">
                    <fieldset>
                        <legend>Evaluation du tweet:</legend>
                        <label for="mood">Mood</label>
                        <input type="range" id="mood" name="mood" min="0" max="10">
                        <input type="submit" value="Envoyer">
                    </fieldset>
                </form>
            </div>
        </div>
    </div>

    <!-- <script src="script.js"></script> -->

</body>
</html>