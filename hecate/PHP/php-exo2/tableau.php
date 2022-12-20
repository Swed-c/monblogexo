<style>
      h2 { padding: 20px; background-color: #333; color: white; }
</style>
<h2>Les tableaux de données array</h2>

<?php

// déclaration d'un tableau array
$nombre=array(1,3,4,4);
$tab = array('lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi', 'dimanche');

// pour rajouter :
$tab[] = 'janvier';
$tab[] = 'février';
echo $tab[3];

var_dump($tab);
echo "<hr>";
var_dump($nombre);

echo $tab[0];
echo $tab[1];
echo $tab[2];
echo $tab[3];
echo $tab[4];
echo $tab[5];



for ($i=0;$i<count($tab);$i++){
    echo $tab[$i] ."<hr>";
}

foreach($tab as $indice => $valeur) {

    echo $indice .  " - ".$valeur;
}


















?>
