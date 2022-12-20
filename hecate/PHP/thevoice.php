<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400">
    <link rel="stylesheet" href="order.css">
    <title>Document</title>
</head>
<body>
      
<?php

$dsn      = 'mysql:dbname=classicmodels;host=localhost:8889';
$password = 'root';
$user     = 'root';

$pdo = new PDO($dsn, $user, $password);



$num_order=$_GET['orderNumber'];

$query = $pdo->prepare("SELECT
customerName, 
contactFirstName, 
contactLastName, 
addressLine1, 
addressLine2, 
postalCode, 
city, 
country
FROM customers
INNER JOIN orders ON customers.customerNumber = orders.customerNumber
WHERE orderNumber = ?");
$query->execute([$num_order]);

$customer = $query->fetch(PDO::FETCH_ASSOC);

?>

<header class="jumbotron">
    <h1 >Bon de commande n°<?= $num_order ?></h1>
</header>

<?php 

foreach($customer as $value){ 
    
    echo $value.'<br>';
    
}

$query2 = $pdo->prepare("SELECT orderNumber ,priceEach , round((quantityOrdered * priceEach),2) AS TOTAL, quantityOrdered, productName 
FROM `orderdetails`
INNER JOIN products ON orderdetails.productCode = products.productCode
WHERE orderNumber LIKE ?


");

$query2->execute(['%'.$num_order.'%']);

$requete = $query2->fetchAll(PDO::FETCH_ASSOC);

$query3 = $pdo->prepare("SELECT SUM(quantityOrdered * priceEach) AS totalAmount FROM orderdetails WHERE
 orderNumber = ?");
$totalttc=$query3->fetch(PDO::FETCH_ASSOC);
$query3->execute([$num_order]);
?>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Commande</th>
            <th>Produit</th>
            <th>Quantité</th>
            <th>Prix Unitaire</th>
            <th>TOTAL</th>
        </tr>
    </thead>
    <tbody>
        <!-- La variable $orders vient du programme index.php -->
        <?php foreach($requete as $order){ ?>
            
            <tr>
                <td>
                    <!-- Génération d'un hyperlien menant vers le programme invoice.php -->
                    
                        <?= $order['orderNumber'] ?>
                    
                </td>
                <td><?= $order['productName'] ?></td>
                <td><?= $order['quantityOrdered'] ?></td>
                <td><?= $order['priceEach'] ?></td>
                <td><?= $order['TOTAL'] ?></td>
                
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th class="text-right" colspan="3">Montant HT</th>
                <th class="text-right"><?= $totalttc['totalAmount'] ?> $</th>
            </tr>
            <tr>
                <th class="text-right" colspan="3">TVA (20 %)</th>
                <th class="text-right"><?=   $totalttc['totalAmount'] * 0.20  ?> $</th>
            </tr>
            <tr>
                <th class="text-right" colspan="3">Montant TTC</th>
                <th class="text-right"><?=   $totalttc['totalAmount'] * 1.2   ?> $</th>
            </tr>
        </tfoot>
    </table>

</body>
</html>
