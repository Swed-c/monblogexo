<?php
require_once ('model/database.php');

/**
 * Trouve le nombre total de commandes
 */ 
function getOrdersCount():int{
    global $database;

    // Ecrit la requête SQL
    $SQL = 'SELECT COUNT(*) FROM `orders`';

    // Prepare la requête SQL
    $query = $database->prepare($SQL);

    // Execute la requête SQL
    $query->execute();

    // Récupère le résultat de la requête SQL
    $result = $query->fetchColumn();

    return $result;
}

/**
 * Donne la liste de toutes les commandes dans la BDD
 */
function getAllOrders():array{
    global $database;

    // Ecrit la requête SQL
    $SQL = 'SELECT `orderNumber`, `customerName`, `orderDate`, `status`
            FROM `orders`
            JOIN `customers` ON  `orders`.`customerNumber` = `customers`.`customerNumber`
            ORDER BY `orderDate` DESC;';
    
    // Prepare la requête SQL
    $query = $database->prepare($SQL);

    // Execute la requête SQL
    $query->execute();
    
    // Récupère le résultat de la requête SQL
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Donne la liste de toutes les commandes d'un client
 */
function getOrdersByCustomerName(string $customerName):array{
    global $database;

    // Ecrit la requête SQL
    $SQL = "SELECT `orderNumber`, `customerName`, `orderDate`, `status`
            FROM `orders`
            JOIN `customers` ON  `orders`.`customerNumber` = `customers`.`customerNumber`
            WHERE `customerName` LIKE :customerName
            ORDER BY `orderDate` DESC;";
    
    // Prepare la requête SQL
    $query = $database->prepare($SQL);

    // Execute la requête SQL
    $query->execute(
       [
        ':customerName' => "%$customerName%"
       ] 
    );
    
    // Récupère le résultat de la requête SQL
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/**
 * Donne les détails d'une commande par son numéro de commande
 * Attention ! Il faut aussi calcule le total de la ligne 
 */
function getOrderDetails(int $orderNumber):array{
    global $database;

    $SQL = 'SELECT `productName`, `products`.`productCode`, `quantityOrdered`, `priceEach`, ROUND(`priceEach`*`quantityOrdered`) AS `total`
            FROM `orderdetails` 
            JOIN `products` ON `orderdetails`.`productCode` =  `products`.`productCode`
            WHERE `orderNumber` = :orderNumber';

    // Prepare la requête SQL
    $query = $database->prepare($SQL);

    // Execute la requête SQL
    $query->execute([
        ':orderNumber' => $orderNumber
    ]);
        
    // Récupère le résultat de la requête SQL
    $result = $query->fetchAll(PDO::FETCH_ASSOC);

    return $result;
}

/** 
 * Donne le montant total HT d'une commande
 */
function getOrderTotalHT(int $orderNumber):float{
    global $database;

    $SQL = 'SELECT ROUND(SUM(`priceEach`*`quantityOrdered`), 2) AS `total`
            FROM `orderdetails` 
            WHERE `orderNumber` = :orderNumber';

    // Prepare la requête SQL
    $query = $database->prepare($SQL);

    // Execute la requête SQL
    $query->execute([
        ':orderNumber' => $orderNumber
    ]);
        
    // Récupère le résultat de la requête SQL
    $result = $query->fetchColumn();

    return $result;
}

/**
 * Donne le numéro du client à partir du numéro de commande
 */
function getCustomerNumberByOrderNumber(int $orderNumber):int{
    global $database;

    $SQL = 'SELECT `customerNumber`
            FROM `orders`
            WHERE `orderNumber` = :orderNumber';

    // Prepare la requête SQL
    $query = $database->prepare($SQL);

    // Execute la requête SQL
    $query->execute([
        ':orderNumber' => $orderNumber
    ]);
        
    // Récupère le résultat de la requête SQL
    $result = $query->fetchColumn();

    return $result;
}



