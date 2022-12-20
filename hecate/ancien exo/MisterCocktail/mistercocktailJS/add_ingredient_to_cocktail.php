<?php

/*********** CHARGEMENT DES LIBRAIRES ************** */
require_once 'lib/debug.php';
require_once 'lib/routing.php';

/*********** CHARGEMENT DU MODÈLE ************** */
require_once 'model/database.php';
require_once 'model/ingredients.php';

/*********** COEUR DU CONTROLEUR ************** */
$message     = '';
$messageType = 'danger';

d($_POST);

// SI ON A PAS REÇU D'ID => REDIRECTION
if (!isset($_GET['id'])) {
    redirect('index.php');
}
$id = $_GET['id'];

$ingredients = getAllIngredients();

// RECEPTION DU FORM
/* if (isset($_POST['name'])) {
} */

/*********** CHARGEMENT DE LA VUE ************** */
require_once 'vues/add_ingredient_to_cocktail.phtml';
