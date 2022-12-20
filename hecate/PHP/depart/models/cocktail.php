<?php
 function liste_cocktails(){

 $pdo=connexionMySql();
 $query= $pdo->query("SELECT cocktails.`name`,`description`,`image`,`families`.`name` as nom2,`active`,cocktails.id FROM `cocktails`
 INNER JOIN `families`
 ON `cocktails`.`id_family`=`families`.`id`");
// Ici se trouvent toutes les fonctions manipulant la base de données SQL et implémentant les fonctionnalités.

   $cocktails = $query->fetchAll(PDO::FETCH_ASSOC);

   return $cocktails;

 } 

 $_details = $_GET['cocktails'];
 function details_One(){

  $pdo=connexionMySql();
  $query= $pdo->prepare("SELECT mister_cocktail.cocktails.name AS Name, 
  mister_cocktail.families.name AS family,
  mister_cocktail.cocktails.description AS description, 
  mister_cocktail.cocktails.year AS Annee, 
  mister_cocktail.cocktails.price as Prix, 
  mister_cocktail.cocktails.id_cocktails
  FROM mister_cocktail.cocktails
  INNER JOIN mister_cocktail.families
  on mister_cocktail.cocktails.id_family = mister_cocktail.families.id_family
  WHERE mister_cocktail.cocktails.id_cocktails = ?");

  // Ici se trouvent toutes les fonctions manipulant la base de données SQL et implémentant les fonctionnalités.
   $query2->execute($_details);
    $cocktails = $query->fetch(PDO::FETCH_ASSOC);
  
    return $cocktails;

 }

 function delete_cocktail(){
  

 }