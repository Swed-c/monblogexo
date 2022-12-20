<?php

$user = [
    'firstname' => 'Gabriel',
    'lastname' => 'Leroux',
    'city' => 'Paris',
    'zip' => '75007',
    'job' => 'Developper'
];

$user2 = [
    'firstname' => 'Jane',
    'lastname' => 'Doe',
    'city' => 'Los Angeles',
    'zip' => 'XXXXXX',
    'job' => 'Inconnu'
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau Associatif</title>
</head>

<body>
    <h1>Profil de l'utilisateur</h1>
    <h3>Nom&nbsp;: <?= $user2['lastname'] ?></h3>
    <h3>Prénom&nbsp;: <?= $user2['firstname'] ?></h3>
    <strong>Adresse&nbsp;: <?= $user2['city'] ?> (<?= $user2['zip'] ?>)</strong><br>
    <strong>Métier&nbsp;: <?= $user2['job'] ?></strong>
</body>

</html>