<?php

$user = [
    'firstname' => 'Gabriel',
    'lastname'  => 'Leroux',
    'city'      => 'Paris',
    'zip'       => '75007',
    'job'       => 'Developper'
];

$users = [
    0 => [
        'firstname' => 'Gabriel',
        'lastname'  => 'Leroux',
        'city'      => 'Paris',
        'zip'       => '75007',
        'job'       => 'Developper'
    ],
    1 => [
        'firstname' => 'John',
        'lastname'  => 'Doe',
        'city'      => 'Rouen',
        'zip'       => '76000',
        'job'       => 'Boulanger'
    ],
    2 => [
        'firstname' => 'Jean-Paul',
        'lastname'  => 'Belmondo',
        'city'      => 'Paris',
        'zip'       => '75006',
        'job'       => 'Comédien'
    ]
];

echo '<pre>';
print_r($users);
echo '</pre>';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table {
            margin: auto;
            width: 90%;
            border: 2px solid black;
        }

        th,
        td {
            text-align: center;
            width: 20%;
        }
    </style>
</head>

<body>
    <h1>Liste des utilisateurs</h1>

    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Ville</th>
                <th>C.P</th>
                <th>Métier</th>
            </tr>

        </thead>

        <tbody>
            <?php foreach ($users as $user) : ?>

                <tr>
                    <td><?= $user['firstname'] ?></td>
                    <td><?= $user['lastname'] ?></td>
                    <td><?= $user['city'] ?></td>
                    <td><?= $user['zip'] ?></td>
                    <td><?= $user['job'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>