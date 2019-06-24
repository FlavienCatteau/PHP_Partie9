<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>TP Exercice 9 P9</title>
</head>
<body>
    <header>
            <div class="jumbotron text-center">
                <h1 class="display-3 text-center">Exercice 9 partie 9 TP</h1>
                <p class="lead text-center">Faire un formulaire avec deux listes déroulantes. La première sert à choisir le mois, et le deuxième permet d'avoir l'année.</p>
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
        <div class="text-center">    
            <?php
                // Tableaux représentant les valeurs des mois et des jours de la semaine
                $arrayOfMonths = array('', 'Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Aout','Septembre','Octobre','Novembre','Décembre');
                $arrayOfDay = array('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi','Dimanche');
                // $dayOfWeek vaudra entre 1 (Lundi) et 7 (Dimanche), on l'utilisera comme index pour $arrayOfDay
                $dayOfWeek = date("N", mktime(0, 0, 0, $_GET['month'], 1, $_GET['years']));
                // Mois et année choisi dans le formulaire
                $monthChosen = $_GET['month'];
                $yearChosen = $_GET['years'];
                $day = 0;
                // Nombre de jour pour le mois et l'année choisi (dans un if afin d'éviter une erreur)
                if (isset($monthChosen) && isset($yearChosen)) {
                    $numberOfDay = cal_days_in_month(CAL_GREGORIAN, $monthChosen, $yearChosen);
                }
            ?>
            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="get" class="mb-3">
                <!-- Label pour les différents mois -->
                <label for="month"></label>
                <select name="month" id="month">
                    <?php
                    // On parcours le tableau contenant les mois afin de remplir les <option>
                    foreach ($arrayOfMonths as $key => $value) { ?>
                        <option value="<?= $key ?>"><?= $value ?></option>
                    <?php } ?>
                </select>
                <!-- Label pour les années -->
                <label for="years"></label>
                <select name="years" id="years">
                        <option value=""></option>
                    <?php
                    // On boucle pour créer les <option> avec les différentes années
                    for ($i = 1901; $i <= 2019; $i++) { 
                    ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
                <p><input type="submit" value="GO !"></p>
            </form>
<!--                    <p>Mois choisi : <?= $_GET['month'] ?>, année choisi : <?= $_GET['years'] ?></p>
                    <p>Nombre de jour du mois de <?= $_GET['month'] ?> de l'année <?= $_GET['years'] ?> = <?= $numberOfDay ?></p>
                    <p>Index jour de la semaine = <?= $dayOfWeek ?></p>
                    <p>Ce mois commence un <?= $arrayOfDay[$dayOfWeek-1] ?></p>-->
            <p><b>Calendrier du mois de <?= $arrayOfMonths[$monthChosen+1] ?> <?= $yearChosen ?></b></p>
            <table class="table table-bordered justify-content-center">
                <thead class="thead-dark">
                    <tr>
                        <?php
                        // Boucle pour afficher tout les mois au haut du tableau
                        foreach ($arrayOfDay as $value) { ?>
                        <td><?= $value ?></td>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // $test sert à savoir si on a rencontré le jour de la semaine correspondant au jour 1
                    $test = false;
                    // Boucle pour 6 ligne de calendrier
                    for ($j = 1; $j <= 6; $j++) {
                        // Si le nombre de jour que l'on a renseigné est inférieur au nombre de jour du mois
                        if ($day < $numberOfDay){
                        ?>
                            <tr>
                            <?php
                            // Boucle pour les 7 colonnes du calendrier (de lundi à dimanche)
                            for ($i = 1; $i <= 7; $i++) {
                                // Si nous sommes dans la colonne correspondant au premier jour du mois ...
                                // .. ou que le test est vrai (que le premier jour a été rencontré) ...
                                // ... Et que nous n'avons pas dépassé le nombre de jour du mois
                                if(($i == $dayOfWeek || $test == true) && $day < $numberOfDay){
                                    // On passe le test à true : on a rencontré le premier jour
                                    $test = true;
                                    // On incrémente $day pour affiché (1, 2, 3, 4, 5, ...)
                                    $day++;
                                    ?>
                                    <!-- Puis on l'affiche -->
                                    <td><?=$day?></td>
                            <?php
                                // Sinon nous sommes soit avant le premier jour ou après le dernier jour du mois
                                } else {
                                    // Et on affiche un case grisée
                                    ?>
                                    <td class="bg-secondary"></td>
                                    <?php } } ?>
                            </tr>
                    <?php } } ?>
                </tbody>
            </table>
        </div>
  </div>
</body>
</html>