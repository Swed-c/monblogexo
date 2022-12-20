<?php

/*********** CHARGEMENT DES LIBRAIRES ************** */
require_once 'lib/debug.php';

/*********** CHARGEMENT DU MODÈLE ************** */
require_once 'model/database.php';
require_once 'model/cocktails.php';
require_once 'model/families.php';

/*********** COEUR DU CONTROLEUR ************** */

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    // RÉCUPÈRE LES DETAILS DU COCKTAIL

    $cocktailById = getCocktailById($id);

    // RÉCUPÈRE LES INGREDIENTS DU COCKTAIL

}

// CHARGE LA LISTE DES FAMILLES
$families = getAllFamilies();
$familyById = getFamilyById($id);


/*********** CHARGEMENT DE LA VUE ************** */
require_once 'vues/edit_cocktail.phtml';
