<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="style.css">
        <title>Exercice2P9</title>
    </head>
    <body>
        <header>
            <div class="jumbotron text-center">
                <h1 class="display-3 text-center">Exercice 2 partie 9</h1>
                <p class="lead text-center">Afficher la date courante en respectant la forme jj-mm-aa (ex : 16-05-16)</p>
            </div>
            <div class="container-fluid text-center">
                <a href="../exercice1P9/index.php"><button class="button">Exercice 1</button></a>
                <a href="../exercice2P9/index.php"><button class="button">Exercice 2</button></a>
                <a href="../exercice3P9/index.php"><button class="button">Exercice 3</button></a>
                <a href="../exercice4P9/index.php"><button class="button">Exercice 4</button></a>
                <a href="../exercice5P9/index.php"><button class="button">Exercice 5</button></a>
                <a href="../exercice6P9/index.php"><button class="button">Exercice 6</button></a>
                <a href="../exercice7P9/index.php"><button class="button">Exercice 7</button></a>
                <a href="../exercice8P9/index.php"><button class="button">Exercice 8</button></a>
                <a href="../exercice9P9/index.php"><button class="button">Exercice TP</button></a>
            </div>
        </header>
        <main>
            <div class="php text-center">
                <?php 
                //initialisation de la variable avec la fonction date() 
                    $today = date("j-m-y");
                    //affichage de la variable
                    echo $today;
                ?>
            </div>
        </main>
    </body>
</html>
