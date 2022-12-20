<?php
/************ CHARGEMENT DES DEPENDANCES *************/
require_once ('lib/debug.php');

/************ CHARGEMENT DU MODEL *******************/
require_once ('model/database.php');
require_once ('model/orders.php');

/************ COEUR DU CONTROLEUR *******************/

// VÉRIFIER SI ON A RECÛ LE CUSTOMERNAME PAR FORMULAIRE
if(isset($_POST['customerName'])) {

    // SI OUI ON LE RÉCUPÈRE
    $customerName = $_POST['customerName'];
}

// RÉCUPÈRE LE NOMBRE TOTAL DE COMMANDES 
$nbOrders = getOrdersCount();

// SI ON A UN CUSTOMER NAME
if(isset($customerName)) {
    // ON CHARGE SEULEMENT LES COMMANDES DE CE(S) CLIENT(S)
    $orders = getOrdersByCustomerName($customerName);

} else {
    // CHARGE TOUTES LES COMMANDES
    $orders = getAllOrders(); 
}

/************ CHARGEMENT DE LA VUE ******************/
require_once ('vues/index.phtml');