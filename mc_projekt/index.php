<?php

require('classes/Database.class.php');
require('classes/Knihy.class.php');


$lastKdb = Knihy::LoadLast5();

?>
<!doctype html>
<html lang="en">
    <head>
        <title>KDB</title>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" type="text/css" href="css/style.css" /> 
        <link href='http://fonts.googleapis.com/css?family=Oswald&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
   
    </head>
    <body>
        <header id="vrchol">        
            <a href="index.php"><img src="images/icones/book.png" width="100" height="80"/></a>
            <a href="index.php" id="nazevStranky">KnižníDB</a>
            <span id="menuNadpis">KdbMenu</span> 
            <nav>
                <ul id="samotneMenu">
                    <li><a href="knihy.php" class="posunoutDolu">Knihy</a></li>
                    <li><a href="autori.php" class="posunoutDolu">Autoři</a></li>
                </ul>
            </nav>
            <div class="dokoncitObtekani"></div>
        </header>      
            <h2>Nejnovější knihy v DB</h2>
            <div class="dokoncitObtekani"></div>
        </div>

        <div class="w3-container">
        <table class="w3-table-all w3-card-4">
            <tr><th>Název</th><th>Jazyk</th><th>Rok vydání</th><th>Autor</th></tr>
            <?php foreach($lastKdb as $Kdb){ ?>
            <tr><td><?php echo $Kdb->nazev; ?></td><td><?php echo $Kdb->jazyk; ?></td><td><?php echo $Kdb->rok_vydani; ?></td><td><?php echo $Kdb->jmeno; ?> <?php echo $Kdb->prijmeni; ?></td></tr>
            <?php } ?>
            </table> 
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>