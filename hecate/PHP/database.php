<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>
</head>
<body>
    
    
    <?php 

$dsn      = 'mysql:dbname=classicmodels;host=localhost:8889';
$password = 'root';
$user     = 'root';
/* creation d'un objet PDO de connexion à la B.D */
$pdo = new PDO($dsn, $user, $password);

// variable query contenant la requete SQL
$query = $pdo->prepare( 'SELECT orderNumber, orderDate,status,customers.customerName
FROM orders
INNER JOIN customers
ON customers.customerNumber = orders.customerNumber ');
$query->execute();
//var_dump($query);
// Exécution de la requête

$orders = $query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($orders);
?>
<table>
    <tr>
        <th>Commande</th>
        <th>Date</th>
        <th>Statut</th>
        <th>Client</th>
        
    </tr>
</thead>

<?php
foreach ($orders as $key => $value ) {
    echo "<tr>";
    echo  "<td>".$value['orderNumber']."</td> <td>" .$value['orderDate']. "</td> <td>" .$value['status']."</td> <td>".$value['customerName']."</td>";
}


?>

</body>
</html>
