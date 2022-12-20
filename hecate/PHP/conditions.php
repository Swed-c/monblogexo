<?php

$a = 10;
$b = 5;
$c = 2;

if($a > $b){

    echo 'la valeur de la variable a est bien supérieur à la valeur de b';;
    
} else {

   echo  'la valeur de a est inférieur à b';
}
echo '<br>';

if($a > $b) :
    echo 'la valeur de a est supérieur à b';


else :

echo 'la valeur de a n\' est pas supérieur à n';



endif;

echo '<br>';

if($a == 10) 
echo 'repense 1<br>';

elseif($a != 5) 
    echo 'reponse2 <br>';

elseif($b == 2) 
    echo 'reponse3 <br>';

    else 
        echo 'reponse4';


echo '<hr>';

$var1 = 1;
$var2 = 1;

if($var1 == $var2)

echo 'les deux variables ont la même valeur';

else 

echo 'les valeurs et / ou sont différentes';


// test existance d'une variable

$existe = 'existe';

if(isset($existe))

echo $existe;

echo '<hr>';

$email = '';

if(empty($email))

echo 'il manque l\'email sombre incompétent';

else

echo $email;


echo '<hr>';

echo (10 > 5) ? 'ok<br>' : 'notok <br>' ;


$couleur = 'jaune';

if( $couleur == 'bleu'){


    echo 'vous aimez le bleu';
    
    
 }elseif($couleur == 'rouge'){
     echo 'vous aimez le rouge';
    
 
 }elseif($couleur == 'vert') { 

    echo 'Vous aimez le vert';
   
 }else{

    echo 'vous n\'avez pas de couleur';
}


echo '<hr>';

$a = 10;
$b = 5;
$c = 2;

if($a > $b AND $b > $c) {
    echo "a est > b et b > c.";
}

if($a > $b || $b > $c){

    echo "a est > b et b > c.";
}


?>