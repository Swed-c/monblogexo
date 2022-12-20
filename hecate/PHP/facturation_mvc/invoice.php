<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bons de commande (classicmodels)</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/orders.css" rel="stylesheet">
</head>
<body class="container-fluid">
    <header class="jumbotron">
<?php 
$num_order=$_GET['orderNumber'];      
?>  
        <h1>Bon de commande n°<?= $num_order ?></h1>
        <hr>
        <p><< <a href="index.php">Retour à la page principale</a></p>
    </header>


<?php

include('lib/database.php');
$pdo = connexion_bd();

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
WHERE orderNumber = ? ");

$query->execute([$num_order]);

$customer = $query->fetch(PDO::FETCH_ASSOC);

?><hr>

     <section>
        
        <p><?= $customer['customerName'] ?></p>
        <p><?= $customer['contactLastName'] ?> <?= $customer['contactFirstName'] ?></p>
        <p><?= $customer['addressLine1'] ?></p>
        <p><?= $customer['addressLine2'] ?></p>
        <p><?= $customer['postalCode'] ?> <?= $customer['city'] ?></p>
        <p><?= $customer['country'] ?></p>
    </section>
<?php

$query2 = $pdo->prepare("
    SELECT
        orderNumber, 
        productName, 
        quantityOrdered, 
        priceEach, 
        (quantityOrdered * priceEach) AS totalPrice
    FROM orderDetails
    INNER JOIN products ON products.productCode = orderDetails.productCode
    WHERE orderNumber = ? ");
$query2->execute([$num_order]);
$orderDetails = $query2->fetchAll(PDO::FETCH_ASSOC);


$query3 = $pdo->prepare("SELECT 
SUM(quantityOrdered * priceEach) AS totalAmount FROM orderdetails WHERE
 orderNumber = ?");
$query3->execute([$num_order]);
$totalttc=$query3->fetch(PDO::FETCH_ASSOC);
var_dump($totalttc);



?>

<table class="table">
<thead class="thead-dark">
    <tr>
        <th>Produit</th>
        <th>Quantité</th>
        <th class="text-right">Prix Unitaire</th>
        <th class="text-right">Total</th>
    </tr>
</thead>
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
<tbody>
    
    <?php foreach($orderDetails as $orderDetail) { 
         ?>

         
        <tr>
            <td><?= $orderDetail['productName'] ?></td>
            <td><?= $orderDetail['quantityOrdered'] ?></td>
            <td class="text-right"><?= number_format($orderDetail['priceEach'], 2, ',', ' ') ?> $</td>
            <td class="text-right"><?= number_format($orderDetail['totalPrice'], 2, ',', ' ') ?> $</td>
        </tr>
    <?php }   ?>
</tbody>
</table>

