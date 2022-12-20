<?php include("header.php") ?>
<h1> Présentation de l'annonce </h1>

<?php 

      foreach($annonces as $annonce){
          ?>
         <h1><a href="index.php?&task=showid&id=<?= $annonce['id'];?>"> <?= $annonce['titre']; ?></a></h1> 
         <p> <?= $annonce['description']; ?></p>
       
<?php }?> 