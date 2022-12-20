<?php

include "assets/lib/database.php";
include "assets/models/cocktails.php";

$famille_cocktails = all_families();

$cocktails = details_cocktails();

if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['anneeConception']) && !empty($_POST['prixMoyen'])){
edit_cocktails();
}

$modify_category = modify_category();
include "assets/templates/edit_cocktails.phtml";


?>