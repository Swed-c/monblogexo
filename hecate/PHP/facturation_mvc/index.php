<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400">
<link rel="stylesheet" href="css/orders.css">



    
<?php
/**
 * 
 * Connexion à la B.D.
 * 
 */

include('lib/database.php');
$pdo = connexion_bd();
 
// variable query contenant la requete SQL

if (isset($_POST['customerName'])){
    $name=$_POST['customerName'];
    $query = $pdo->prepare("SELECT orderNumber,customerName, 
    orderDate, 
    status
    FROM orders
    INNER JOIN customers
    ON customers.customerNumber = orders.customerNumber 
    WHERE customerName LIKE ?
    ORDER BY orderDate DESC");
    $query->execute([ '%' . $name . '%' ]);
}
else {
    $query = $pdo->prepare("SELECT orderNumber,customerName, 
    orderDate, 
    status
    FROM orders
    INNER JOIN customers
    ON customers.customerNumber = orders.customerNumber
    /* WHERE customerName LIKE '%Euro%'*/
    ORDER BY orderDate DESC");
    $query->execute();
}

//var_dump($query);
// Exécution de la requête

$orders = $query->fetchAll(PDO::FETCH_ASSOC);

include('template/indextemp.php');

?>

