<?php
echo 'Voici deux tableaux : ';


$maVariableDeTexte = '';
const MA_CONSTANTE = '';

$maVar1 = 'Joe !';       // string
$maVar2 = false;    // booleen
$maVar3 = 0;        // integer (entier)
$maVar4 = 0.0;      // float (décimal, virgule flottante)
$maVar5 = [];       // Array (tableau)

$semaine = ['lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche'];

echo 'Avec var_dump :';
echo '<br>';

echo '<pre>';
var_dump($semaine);
echo '</pre>';

echo 'Avec print_r :';
echo '<br>';

echo '<pre>';
print_r($semaine);
echo '</pre>';
