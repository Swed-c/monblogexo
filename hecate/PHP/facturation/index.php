<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400">
<link rel="stylesheet" href="css/orders.css">
<?php
/**
 * 
 * Connexion à la B.D.
 * 
 */

$dsn      = 'mysql:dbname=classicmodels;host=localhost:3306';
$password = '';
$user     = 'root';
/* creation d'un objet PDO de connexion à la B.D */
$pdo = new PDO($dsn, $user, $password);
 
// variable query contenant la requete SQL
$query = $pdo->query("SELECT
orderNumber, 
customerName, 
orderDate, 
status
FROM orders
INNER JOIN customers
ON customers.customerNumber = orders.customerNumber
WHERE customerName LIKE '%Euro%'
ORDER BY orderDate DESC");

var_dump($query);
// Exécution de la requête

$orders = $query->fetchAll(PDO::FETCH_ASSOC);

?>


<table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Commande</th>
                <th>Client</th>
                <th>Date</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <!-- La variable $orders vient du programme index.php -->
            <?php foreach($orders as $order){ ?>
                <tr>
                    <td>
                        <!-- Génération d'un hyperlien menant vers le programme invoice.php -->
                        <a href="invoice.php?orderNumber=<?= $order['orderNumber'] ?>">
                            <?= $order['orderNumber'] ?>
                        </a>
                    </td>
                    <td><?= $order['customerName'] ?></td>
                    <td><?= $order['orderDate'] ?></td>
                    <td><?= $order['status'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

test