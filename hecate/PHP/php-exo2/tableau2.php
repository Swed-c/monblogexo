<?php
// autre façon de déclarer un tableau array
$autre_tab[] = 'pommes';
$autre_tab[] = 'poires';
$autre_tab[] = 'cerises';
$autre_tab[] = 'ananas';
$autre_tab[] = 'kiwis';
$autre_tab[] = 'fraises';
//var_dump($autre_tab);



$infos_membre = array('pseudo' => 'admin', 'mdp' => 'soleil',
 'mail' => 'admin@mail.fr');
 var_dump($infos_membre);

 foreach ($infos_membre as $key => $value){
    echo $key. " ".$value."<hr>";
 }


 $tableau_nombre=[12,343,34,45];

$resultat=0;
 foreach ($tableau_nombre as $key => $value){
    $resultat=$resultat+$value;
 }
 echo $resultat;

 function accumulation_t($tab){
    $resultat=0;
    foreach ($tab as $key => $value){
        $resultat=$resultat+$value;
    }
    echo $resultat;
 }

 /**
  * afficher page 1 2 3 .... 1000
  * quand on clique sur 1 on affiche page 1
  * quand on clique sur 2 on affiche page 2
  */

  
?>

<a href = "profil.php?nom=yoel">monprofil</a>
