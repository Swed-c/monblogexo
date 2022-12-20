<?php include("header.php") ?>
 
<h1> Liste des annonces </h1>
 
<?php 

      foreach($annonces as $annonce){
          ?>
         <h1><a href="index.php?&task=showid&id=<?= $annonce['id'];?>"> <?= $annonce['titre']; ?></a></h1> 
         <p> <?= $annonce['description']; ?></p>
         <p> <a href="index.php?&task=delete&id=<?= $annonce['id'];?>"> Supprimer l'annonce</a></p>
       
<?php }?> 

 