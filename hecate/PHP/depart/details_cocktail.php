<?php

include("lib/database.php");

// Récupération de tous les cocktails stockés en base de données
include("models/cocktail.php");
$cocktails=liste_cocktails();


// Chargement du template
include("templates/details_cocktails.phtml");

// Chargement des autres programmes PHP dont on dépend.


// Récupération du cocktail stocké en base de données.


// Chargement du template