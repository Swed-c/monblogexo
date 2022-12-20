<?php
include "assets/lib/database.php";
include "assets/models/cocktails.php";
$famille_cocktails = all_families();

 if (!empty($_POST['name']) && !empty($_POST['description']) && !empty($_POST['anneeConception']) && !empty($_POST['prixMoyen'])){
     
     $img=$_FILES['formFile']['name'];
     $destination = __DIR__ . "assets/images";
     add_cocktails();
    
    header('Location: add_cocktails.php');
}; 
modify_category();

include "assets/templates/add_cocktail.phtml";



?>