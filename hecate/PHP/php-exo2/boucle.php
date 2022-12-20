<?php

// boucle
$debut=5;
$fin=11;
/*
for( $i = $debut ; $i <$fin ; $i++   ){
    echo $i;
}
*/

function boucle($fin_){
    for( $i = 0 ; $i <$fin_ ; $i++   ){
        echo $i;
    }
}

function boucle2($fin_){
    for( $i = 0 ; $i <$fin_ ; $i++   ){
        echo "*";
    }
}

function boucle3($fin,$caractere){
    for( $i = 0 ; $i <$fin ; $i++   ){
        echo $caractere;
    }
} 

function addition ( $a, $b){
    $resultat=$a+$b;
    echo $resultat;
}
function addition2 ( $a, $b){
    $resultat=$a+$b;
    return $resultat;
}
 


function calculer($a , $b , $operateur){
    if ($operateur=="+"){
    $resultat=$a + $b;
    }
    if ($operateur=="-"){
        $resultat=$a - $b;
    }
    if ($operateur=="*"){
        $resultat=$a * $b;
    }
    if ($operateur=="/"){
        $resultat=$a / $b;
    }
    echo $resultat;
}

function calculer2($a , $b , $operateur){
    if ($operateur=="+"){
    $resultat=$a + $b;
    }
    if ($operateur=="-"){
        $resultat=$a - $b;
    }
    if ($operateur=="*"){
        $resultat=$a * $b;
    }
    if ($operateur=="/"){
        $resultat=$a / $b;
    }
    return $resultat;
}
function ispostive($a){
    if ($a > 0){
        echo 'positif';
    }
    else {
        echo "negatif";
    }
}
function ispair($a){
    if ($a % 2 == 0){
        echo 'pair';
    }
    else {
        echo "impair";
    }
}
 
function grand($a , $b ){
    if( $a > $b ){
   echo  $a." est le plus grand";
    }
    else {
        echo  $b." est le plus grand";

    }
}

function petit($a , $b ){
    if( $a < $b ){
   echo  $a." est le plus petit";
    }
    else {
        echo  $b." est le plus petit"; 
    }
}

// accumulation


function accumulation($nb){
    $resultat=0;
    for ($i = 0; $i <= $nb; $i++){
        $resultat=$resultat+$i;
    
    }  
    echo $resultat;
}
accumulation(100);
/*
scope variable / tableau addition



calculer(2,2,"/")
boucle(100);
boucle(5);
boucle(3);
boucle2(5);
echo addition2(3,4);
boucle3(50,"?");
 addition(3,3); 

 * EXO1 : Creer une fonction qui s'appelle boucle et qui prend un parametre
 *  numerique
 * la fonction va afficher les nombre de 0 au parametre entré.
 * 
 *  * EXO2 : Creer une fonction qui s'appelle boucle2 et qui prend un parametre 
 * numerique
 * la fonction va afficher le caractere "*" autant de fois que le parametre
 * .EX: boucle2(3)
 *   => ***
 * 
 *   Exo 3 : : Creer une fonction qui s'appelle boucle3 et qui prend un parametre numerique
 * et un caractere special
 * la fonction va afficher le caractere special autant de fois que le parametre numerique
 * .EX: boucle2(3,"!")
 *   => !!!
 * 
 *  *   Exo 4 : : Creer une fonction qui s'appelle addition et qui prend deux parametre numerique
 * et affiche le resultat de l'addtiion de ces nombres
 * addition(3,3)
 *   => 6
 * 
 * Exo 5 : Identique au 4 qui renvoie le resultat
 * 
 * Exo 6 :   Creer une fonction qui s'appelle calcul et qui prend  parametre deux
 * nombres et un opérateurs
 * et renvoie le resultat des nombres
 * calcul(3,3,"*")
 * => 9
 * 
 * Exo 7 : creer une fonction qui s'appelle ispositive et qui prend en parametre
 * un nombre . et qui renvoie si ce nombre est positif ou négatif
 * 
 * 
 * Exo  8: creer une fonction qui s'appelle ispair et qui prend en parametre
 * un nombre . et qui renvoie si ce nombre est pair ou impair
 * 
 * 
 * Exo 9 : creer une fonction qui s'appelle grand et qui prend en parametre
 * deux nombre . et qui renvoie le nombre le plus grand
 * 
 * Exo 10 : creer une fonction qui s'appelle grand et qui prend en parametre
 * deux nombre . et qui renvoie le nombre le plus petit
 * 
 * 
 * Accumulation
 *  * Exo 11 : creer une fonction qui s'appelle accumulation 
 * prend en parametre un nombre 
 * et qui renvoie la somme des nombres jusqu'a ce nombre
 * Ex: accumulation(3)
 * => 6
 * (1+2+3)=6
 * 
 * TABLEAU / SCOPE / POST GET
 * 
 */
?>