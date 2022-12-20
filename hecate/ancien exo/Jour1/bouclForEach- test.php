<?php
$moisAnnee = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

$joursSemaine = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

echo '<pre>';
print_r($moisAnnee);
echo '</pre>';



echo '<pre>';
print_r($joursSemaine);
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boucle For Each</title>
</head>

<body>

    <h2>Liste des mois de l'année :</h2>

    <ul>
        <?php foreach ($moisAnnee as $unSeulMois) : ?>
            <li>
                <?= $unSeulMois ?>
            </li>
        <?php endforeach; ?>
    </ul>


    <h2>Liste des jours de la semaine :</h2>

    <ul>
        <?php foreach ($joursSemaine as $unSeulJour) : ?>
            <li>
                <?= $unSeulJour ?>
            </li>
        <?php endforeach; ?>
    </ul>



</body>

</html>