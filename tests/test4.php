<?php
    require_once 'classes/Autoloader.php';
    require_once 'functions/functions.php';

    Autoloader::register();

    if (isset($_REQUEST['cardId'])) {
        // $cardObjectArray[$_POST['id']]->
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
        <!-- <link rel="stylesheet" href="styles/styleG.css"> -->
        <title>test de cartes</title>
        <style>
            .card {
                display: inline-block;
                border: 2px solid black;
                border-radius: 15px;
                margin: 2em;
                width: 8%;
                height: 300px;
                background: pink;
            }
        </style>
    </head>
    <body>
        <?php
            $cardObjectArray = [];
            for ($i = 0; $i < 2; ++$i) {
                $cardObjectArray[$i] = new Cards($i);
                $cardObjectArray[$i]->createACard();
            }
            foreach ($cardObjectArray as $k => $value) {

            }
            prp($cardObjectArray, '$cardObjectArray');
        
            vdp($_REQUEST, '$_REQUEST');
            if (isset($_POST['cardId'])) {
                echo 'OK COMPUTER<br>';
                vdp($cardObjectArray[$_POST['cardId']], '[1]');
            }
            // $card = new Cards;
            // $card->createACard(0, 'A') ;
        ?>
    </body>
</html>