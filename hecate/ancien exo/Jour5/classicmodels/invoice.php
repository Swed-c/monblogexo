<?php
/************ CHARGEMENT DES DEPENDANCES *************/
require_once ('lib/debug.php');
require_once ('lib/tva.php');

/************ CHARGEMENT DU MODEL *******************/
require_once ('model/database.php');
require_once ('model/orders.php');
require_once ('model/customers.php');

/************ COEUR DU CONTROLEUR *******************/

if (isset($_GET['orderNumber'])){
    $orderNumber = $_GET['orderNumber'];

    // RÉCUPÈRE LES LIGNES DE LA COMMANDE
    $orderDetails = getOrderDetails($orderNumber);

    // RÉCUPÈRE LE MONTANT HT DE LA COMMANDE
    $HT  = getOrderTotalHT($orderNumber);
    $TVA = getTVAFromHT($HT);
    $TTC = getTTCFromHT($HT);

    // RÉCUPÈRE LES DONNÉES DU CLIENT
    $customerNumber = getCustomerNumberByOrderNumber($orderNumber);
    $customerDetails = getCustomerDetails($customerNumber);
}

/************ CHARGEMENT DE LA VUE ******************/
require_once ('vues/invoice.phtml');