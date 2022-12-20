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
 
        <h1>COUCOUUUU JE VEROUILLE PAS MON CLAVIER n°<?= $num_order ?></h1>
        <hr>
        <p><< <a href="index.php">Retour à la page principale</a></p>
    </header>
    <hr>

     <section>
        
        <p><?= $customer['customerName'] ?></p>
        <p><?= $customer['contactLastName'] ?> <?= $customer['contactFirstName'] ?></p>
        <p><?= $customer['addressLine1'] ?></p>
        <p><?= $customer['addressLine2'] ?></p>
        <p><?= $customer['postalCode'] ?> <?= $customer['city'] ?></p>
        <p><?= $customer['country'] ?></p>
    </section>



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
    </body>
    </html>