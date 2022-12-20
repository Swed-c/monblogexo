<?php

/**
 * Donne les détails d'un client à partir du customer Number
 */
function getCustomerDetails(int $customerNumber):array{
    global $database;

    $SQL = 'SELECT * 
            FROM `customers`
            WHERE `customerNumber` = :customerNumber';

    // Prepare la requête SQL
    $query = $database->prepare($SQL);

    // Execute la requête SQL
    $query->execute([
        ':customerNumber' => $customerNumber
    ]);
        
    // Récupère le résultat de la requête SQL
    $result = $query->fetch(PDO::FETCH_ASSOC);
    unset($result['creditLimit']);
    unset($result['salesRepEmployeeNumber']);

    return $result;
}
