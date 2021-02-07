<?php
    session_start();

    require_once 'functions/functions.php';
    require_once 'classes/Autoloader.php';
    
    Autoloader::register();
    // vdp($_REQUEST, '$_REQUEST');
    
    $game = unserialize($_SESSION['game']);
    unset($_SESSION['game']);

    if (isset($_POST['cardId'])) {
        $game->setActualTurn($_POST['cardId']);
        // sleep(.5);
        if (!$game->pTurnExists()) {
            $game->setPreviousTurn($_POST['cardId']);
            // $_SESSION['game'] = serialize($game);
            // header("Location: game.php");
            // return;
        }
        else {
            $game->comparison();
            // $_SESSION['game'] = serialize($game);
            // header("Location: game.php");
            // return;
            // sleep(2);
        }
    } 
    // $_SESSION['game'] = serialize($game);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="styles/styleG.css">
    <title>game</title>
</head>
<body>
    <header>
        <ul>
            <li><a href="index.php">index</a></li>
            <li><a href="playing.php">Jeu</a></li>
            <li><a href="deconnexion.php">Deconnexion</a></li>
        </ul>
    </header>
    <?= $game->printScore(); ?>
    <!-- DEBUB -->
    <?= $game->printPairs(); ?>

    <article class="game flex d-flex justify-content-around">
        <?php
            if (!$game->stopGame()) {
                echo $game->printCard();
            }
            else {
                echo 'YOU WIN!';
            }
            // sleep(2);

        ?>
    </article>
</body>
</html>
<?php
    vdp($game, '$game');
    $_SESSION['game'] = serialize($game);
    vdp($_REQUEST, '$_REQUEST');
?>