<?php
require_once('model/database.php');


/* Trouve le nombre total de commandes */
function getOrdersCount(){
global $database; 

/* Ecrit la requête SQL */
$SQL = 'SELECT COUNT(*) FROM `orders`';

/* Prépare la requête SQL */
$query = $database->prepare($SQL);

/* Execute la requête SQL */
$query->execute();

/* Récupère le résultat de la requête SQL */
$result = $query->fetchColumn();

return $result;
}


/* Donne la liste de toutes les commandes dans la BDD */
function getAllOrders(){
    global $database; 

/* Ecrit la requête SQL */
    $SQL = 'SELECT `orderNumber`, `customerName`, `orderDate`, `status`
            FROM `orders` 
            JOIN `customers` ON `orders`. `customerNumber` = `customers`.`customerNumber`
            ORDER BY `orderDate`DESC;';

    /* Prépare la requête SQL */
    $query = $database->prepare($SQL);

    /* Execute la requête SQL */
    $query->execute();

    /* Récupère le résultat de la requête SQL */
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/* Donne la liste de toutes les commandes d'un clients */
function getOrdersByCustomerName ($customerName){

}


/* Donne les détails d'une commande par ton numéro de commande */
function getOrderDetails ($orderNumber){

}