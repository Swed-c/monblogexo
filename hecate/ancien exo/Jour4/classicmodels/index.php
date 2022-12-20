
<?php

/**** CHARGEMENT DES DEPENDANCE ****/
require_once('lib/debug.php');

/****** CHARGEMENT DU MODEL ********/
require_once('model/database.php');
require_once('model/orders.php');

/****** COEUR DU CONTROLEUR ********/
$nbOrders = getOrdersCount();

$orders = getAllOrders();

/****** CHARGEMENT DE LA VUE *******/
require_once('vues/index.phtml');
