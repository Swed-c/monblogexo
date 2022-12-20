<?php
      // ouverture php


      // liens utiles :
      //---------------
      // https://www.php.net/ // doc officielle
      // https://phptherightway.com/ // les bonnes pratiques php
      // https://www.php-fig.org/psr/ // Conventions d'écriture & bonnes pratiques

      // https://www.reddit.com/r/PHP/ // pour se tenir au courant.



      // fermeture php
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
      h2 { padding: 20px; background-color: #333; color: white; }
</style>
<h2>Base et syntaxe du langage</h2>
<body>
    ma page html !

    <?php
 
       $prenom="Yoel";
       echo $prenom;

       $age = 35;

       echo $age;

       echo "<br /> Je m'appelle ".$prenom." et j'ai ".$age." ans";

        echo " HELLO WORLD !";


        $ma_variable = 123;

        echo gettype($ma_variable); 

        $ma_variable = 'une chaine de caractères';
        echo gettype($ma_variable) . '<br>'; // string => une chaine de caractères
        // utilisation du point de concaténation (que l'on peut toujours traduire par "suivi de")


      $ma_variable = true; // ou TRUE ou false ou FALSE
      echo gettype($ma_variable) . '<br>'; // boolean (vrai / faux)

     $ma_variable = '123'; // ou "123"
      echo gettype($ma_variable) . '<br>'; // string => une chaine de caractères

      $ma_variable = 1.5;
      echo gettype($ma_variable) . '<br>';  // double => chiffre avec décimales
      // je met mes commentaires
      

      /*
      
      pluisieurs lignes ! 

      */
      echo "<hr>";


      $var1 = 'Bonjour';
      echo $var1 . ' à tous<br>'; // avec concaténation
      echo '$var1 à tous<br>'; // avec '' : souci la variable n'est pas reconnue
      echo "$var1 à tous<br>"; // avec "" : ok




      echo '<hr>';

      // Opérateur arithmétique
      $valeur1 = 10;
      $valeur2 = 5;

            // addition
            echo $valeur1 + $valeur2 . '<br>'; // affiche 15

            // soustraction
            echo $valeur1 - $valeur2 . '<br>'; // affiche 5
      
            // multiplication
            echo $valeur1 * $valeur2 . '<br>'; // affiche 50
      
            // division
            echo $valeur1 / $valeur2 . '<br>'; // affiche 2
      
            // modulo
            echo $valeur1 % $valeur2 . '<br>'; // affiche 0
      
            // puissance
            echo $valeur1 ** $valeur2 . '<br>'; // affiche 100000



    ?>


</body>
</html>