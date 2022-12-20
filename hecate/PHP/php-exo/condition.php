<style>
      h2 { padding: 20px; background-color: #333; color: white; }
</style>
<h2>Les conditions</h2>


<?php

$a = 10;
$b = 5;
$c = 2;

// Conditions if elseif else
if($a > $b) {
    echo 'La valeur de la variable a est bien supérieure à la valeur de la variable b <br>'; // ok
} else {
    echo 'La valeur de la variable a n\'est pas supérieure à la valeur de la variable b <br>';
}

// autre écriture possible : (uniquement avec une seule instruction par cas proposé)
if($a > $b) 
      echo 'La valeur de la variable a est bien supérieure à la valeur de la variable b <br>'; // ok
else 
      echo 'La valeur de la variable a n\'est pas supérieure à la valeur de la variable b <br>';


// autre écriture possible : 
if($a > $b) :
    echo 'La valeur de la variable a est bien supérieure à la valeur de la variable b <br>'; // ok
else :
    echo 'La valeur de la variable a n\'est pas supérieure à la valeur de la variable b <br>';
endif;



//---------
echo '<hr>';


if($a == 9) {
    echo 'Réponse 1<br>';
} elseif($a != 10) {
    echo 'Réponse 2<br>';
} elseif($b == 10) {
    echo 'Réponse 3<br>';
} else { // jamais de parenthèse sur un else, représente toutes les autres possibilités.
    echo 'Réponse 4<br>';
}



echo '<hr>';
$var1 = 1; // type integer
$var2 = 1; // type string

if($var1 == $var2) {
    echo 'Les deux variables ont la même valeur !<br>'; // ok 
} else {
    echo 'Les valeurs sont différentes<br>';
}

// comparaison stricte (triple opérateur === ou !==)

if($var1 === $var2) {
    echo 'Les deux variables ont la même valeur et le même type !<br>'; // ok 
} else {
    echo 'Les valeurs et / ou les types sont différentes<br>';
}


//--------
// Les opérateurs de comparaison
/*
=     (ce n'est pas une comparaison, c'est une affectation)
==    est égal à (en terme de valeur uniquement)
!=    est différent de (en terme de valeur uniquement)
===   est strictement égal à (comparaison des valeurs ET des types)
!==   est strictement différent (comparaison des valeurs ET des types)
>     strictement supérieur à
>=    supérieur ou égal à
<     strictement inférieur à
<=    inférieur ou égal à 
*/
 $existe = 'un test sur l\'existence des variables<br>';
if(isset($existe)) { // si cette variable est définie
    echo $existe; // cette variable existe donc on l'affiche
}

$email = '';
if(empty($email)) {
      echo '<span style="color: red;">Attention, le mail est obligatoire</span><br>';
} else {
      echo 'le mail n\'est pas vide<br>';
}



// réponse de empty() : 
// la variable n'existe pas : on obtient true
// la variable existe mais est vide : on obtient true
// la variable existe et contient une valeur : on obtient false

// Nous devrons toujours tester l'existence des variables provenant d'actions utilisateur !

// écriture ternaire : 
// action (condition) ? ... if ... : ... else ...
echo (10 > 5) ? 'ok<br>' : 'nok<br>';



echo '<h2>Condition switch</h2>';
// autre façon de mettre en place une condition, nous proposons un ensemble de cas possible.
$couleur = 'jaune';

switch($couleur) {
      case 'bleu' : 
            echo 'Vous aimez le bleu<br>';
      break;
      case 'rouge' : 
            echo 'Vous aimez le rouge<br>';
      break;
      case 'vert' : 
        echo 'Vous aimez le vert<br>';
    break;
    case 'jaune' : 
        echo 'Vous aimez le jaune<br>';
    break;
      default : 
            echo 'Vous n\'aimez pas le bleu, le rouge et le vert<br>';
      break;
}


$couleur = 'jaune';

if($couleur == 'bleu') {
      echo 'Vous aimez le bleu<br>';
} elseif($couleur == 'rouge') {
      echo 'Vous aimez le rouge<br>';
} elseif($couleur == 'vert') {
      echo 'Vous aimez le vert<br>';
} else {
      echo 'Vous n\'aimez pas le bleu, le rouge et le vert<br>';
}


// Plusieurs conditions obligatoires : AND : &&
$a = 10;
$b = 5;
$c = 2;


// Plusieurs conditions obligatoires : AND : &&
if($a > $b AND $b > $c) {

    echo " a est > b et b > c.";
}

// l'une ou l'autre d'un ensemble de condition : OR : ||
if($a == 9 || $b == 5) {
    echo 'Ok pour au moins une des conditions<br>';
}









?>