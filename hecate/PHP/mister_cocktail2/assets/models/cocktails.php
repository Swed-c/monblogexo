<?php

function all_cocktails(){
     
    $pdo= connexion_mysql();

    $query= $pdo->prepare("SELECT cocktails.id , cocktails.description , cocktails.image , cocktails.name , families.name AS type_alcool FROM cocktails INNER JOIN families ON families.id = cocktails.id_family");

    $query->execute();

    $cocktails= $query->fetchAll(PDO::FETCH_ASSOC);

    return $cocktails;
}

function details_cocktails(){
    $id = $_GET['id'];
    $pdo= connexion_mysql();

    $query2= $pdo->prepare("SELECT cocktails.id , cocktails.description , cocktails.image , cocktails.name , cocktails.price, cocktails.year ,cocktails.id_family, families.name AS type_alcool FROM cocktails INNER JOIN families ON families.id = cocktails.id_family WHERE cocktails.id= ?");
    $query2->execute([$id]);
    $cocktails= $query2->fetch(PDO::FETCH_ASSOC);

 

    return $cocktails;
    
}

function ingredients(){

    $id = $_GET['id'];
    $pdo= connexion_mysql();
    $query6= $pdo->prepare("SELECT  ingredients.name
    FROM cocktails_ingredients
    INNER JOIN ingredients
    ON cocktails_ingredients.id_ingredient = ingredients.id
    WHERE cocktails_ingredients.id_cocktail = ? ");
    $query6->execute([$id]);

    $ingredient= $query6->fetchAll(PDO::FETCH_ASSOC);
    return $ingredient ;

}

function add_cocktails(){

    $name= $_POST['name'];
    $description= $_POST['description'];
    $price = $_POST['prixMoyen'];
    $year = $_POST['anneeConception'];
    $idfam = $_POST['idFamille'];
    $img = $_FILES['formFile']['name'];
    $tmpName = $_FILES['formFile']['tmp_name']; 

    $pdo= connexion_mysql();

    $query3= $pdo->prepare("INSERT INTO `cocktails`(cocktails.id ,cocktails.name ,cocktails.description ,  cocktails.price, cocktails.year , cocktails.id_family, cocktails.active, cocktails.image ) VALUES ( NULL, ?, ? , ? , ? , ?, '1', ?)");

    $query3->execute([$name , $description , $price, $year, $idfam , $img]);
     move_uploaded_file($tmpName , "assets/images/".$img );

}


 function edit_cocktails(){

    $id= $_GET['id'];
    $name= $_POST['name'];
    $description= $_POST['description'];
    $price = $_POST['prixMoyen'];
    $year = $_POST['anneeConception'];
    $idfam = $_POST['idFamille'];
   
    
    $pdo= connexion_mysql();

    $query5= $pdo->prepare("UPDATE `cocktails` SET `name` = ?, `description` = ?, `price` = ?, `year` = ?, id_family = ? WHERE `cocktails`.`id` = ? ");
    $query5->execute([$name , $description , $price, $year ,  $idfam, $id ]);

 }   

function delete_cocktails(){

    $pdo= connexion_mysql();

    $query3= $pdo->prepare("DELETE FROM cocktails WHERE `cocktails`.`id` = ? ");
    $query3->execute($_GET['id']);
    
}

function all_families(){
    $pdo= connexion_mysql();

    $query4= $pdo->prepare("SELECT * FROM `families` ");
    $query4->execute();

    $famille_cocktails= $query4->fetchAll(PDO::FETCH_ASSOC);

    return $famille_cocktails;
}

function modify_category(){   

    $pdo= connexion_mysql();
    $query7= $pdo->prepare("UPDATE `cocktails` SET `id_family` = '2', ' WHERE `cocktails`.`id`; ");
    $query7->execute();

    $modify_category= $query7->fetchAll(PDO::FETCH_ASSOC);

   return $modify_category;

}

?>