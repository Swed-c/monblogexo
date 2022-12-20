<?php

/*********** CHARGEMENT DES LIBRAIRES ************** */
require_once 'lib/debug.php';
require_once 'lib/routing.php';
/*********** CHARGEMENT DU MODÈLE ************** */
require_once 'model/database.php';
require_once 'model/cocktails.php';
require_once 'model/ingredients.php';


/*********** COEUR DU CONTROLEUR ************** */

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $cocktailById = getCocktailById($id);
}

$id = $_GET['id'];

/* $id = intval($id); */

/* if (!$id) {
    redirect('index.php');
} */
// RÉCUPÈRE LES DETAILS DU COCKTAIL



/* if (empty($cocktailById)) {
    redirect('index.php');
} */

$ingredients = getIngredientsByCocktailId($id);

// RÉCUPÈRE LES INGREDIENTS DU COCKTAIL

// CHARGE LE DETAIL DU COCKTAIL


/*********** CHARGEMENT DE LA VUE ************** */
require_once 'vues/detail_cocktail.phtml';
