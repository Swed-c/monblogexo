<?php

// Chargement des autres programmes PHP dont on dépend.
include("lib/database.php");

// Récupération de tous les cocktails stockés en base de données
include("models/cocktail.php");
$cocktails=liste_cocktails();


// Chargement du template
include("templates/index.phtml");



//include("templates/backoffice.php");