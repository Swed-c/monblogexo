<?php

require_once("index.php");

use Application\LesAnimaux\Tigre;
use Application\LesAnimaux\Poisson;
use Application\LesAnimaux\Vache;
use Application\LesAnimaux\Elephant;
use Application\LesAnimaux\Chien;
use Application\LesAnimaux\Zoo;

$t1 = new Tigre ("⛰Tiger 🐅 " , "carnivore🍖", "viande 🥩", 22);


$chien = new Chien ("Médor", "carnivore", "viande", 10);

$ele = new Elephant ("Dumbo", "Herbivore", "Arbre", 30);


$z= new Zoo();
$z->setLesAnimauxc($t1);
$z->setLesAnimauxc($chien);
$z->setLesAnimauxm($ele);

foreach($z->getLesAnimauxc() as $animauxcriant){

    echo $animauxcriant->crier();
    
}
?>
<hr>
<?php 

$m = new Zoo();
$m->setLesAnimauxm($t1);
$m->setLesAnimauxm($chien);
$m->setLesAnimauxm($ele);


foreach($m->getLesAnimauxm() as $animauxmangeant){

    echo $animauxmangeant->manger();
    
}

?>