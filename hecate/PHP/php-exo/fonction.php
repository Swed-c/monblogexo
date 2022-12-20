<?php
echo date('d/m/Y à H:i:s') . '<hr>';

echo 'Nous sommes le ' . date('d') . ' du mois numéro ' . date('m') . ' et il est : ' . date('H:i') . '<hr>';

echo "<hr>";

// CREER UNE FONCTION QUI S APPELLE SEPARATION ET QUI FAIT 3 LIGNES SEPARATIONS
// DECLARATION

// APPEL
separation(); 

function separation() {
    echo "<hr><hr><hr>";
}
echo strlen("Yoel");
echo "<br />";
var_dump("Yoel");

$taille_pseudo=strlen("Y");
if($taille_pseudo < 4 || $taille_pseudo > 14) {
    echo '<div style="background-color: red; color: white; padding: 10px;">
    Attention,<br>Le pseudo doit avoir entre 4 et 14 caractères inclus.</div>';
} else {
    echo '<div style="background-color: green; color: white; padding: 10px;">Pseudo ok.</div>';
}

$couleur = rand(100000, 999999);
echo '<hr><div style="width: 200px; height: 200px; background-color: #' . $couleur . '"></div>';


echo  rand(1,100);

$rgb1 = rand(0, 255);
$rgb2 = rand(0, 255);
$rgb3 = rand(0, 255);


echo '<hr><div style="width: 200px; height: 200px;
 background-color: rgb(' . $rgb1 . ', ' . $rgb2 . ', ' . $rgb3 . ')"></div>';

/**
 * 1. CREEZ UNE FONCTION dire_bonjour qui prend en parametre une variable et qui retourne
 * Bonjour suivi de la variable
 * 
 * 1.1 creer une fonction presentation qui prend en parametre 2 variable et qui retourne
 * Bonjour suivi du prenom correspondant à la variable 1 et qui affiche ". j'ai " 
 * suivi de la variable variable suivi de " ans"
 * presentation("Yoel",35)
 * => Bonjour Yoel. J'ai 35 ans
 * 
 * 2. faire une fonction pour dire bonjour ou bonsoir selon l'heure de la journée.
 * Bonsoir si l'heure est entre 19 et 4 sinon bonjour 
 * La fonction prendra en parametre une variable qui sera affiché suite au bonjour / bonsoir.
 * 
 */ 

function dire_bonjour($prenom){
    echo "Bonjour ".$prenom;
}
dire_bonjour("Yoel");

function presentation($prenom, $age ){
    echo "Bonjour ".$prenom.". et j'ai ".$age. "ans";
}
presentation("Yoel",35);

/**
 * HEURE <= date 
 *     $heure = date('H');
 */

echo '<hr>';
function dire_bonjour_bonsoir2($qui="Admin"){
    $heure=date("H");
    echo $heure;
    echo gettype($heure); // string
    
    if($heure > 4 && $heure < 19) {
        echo "Bonjour ! ".$qui;
    }
    else {
        echo "Bonsoir !".$qui;
    }
}


dire_bonjour_bonsoir3();
echo '<hr>';

function dire_bonjour_bonsoir3($qui="Admin"){
    $heure=date("H");
    echo $heure;
    echo gettype($heure); // string

    $info="";
    
    if($heure > 4 && $heure < 19) {
        $info= "Bonjour ! ";
    }
    else {
        $info=  "Bonsoir !";
    }

    echo $info.$qui;
}




function dire_bonjour_bonsoir($qui = 'Admin') { // $qui = 'Admin' permet de donner une valeur par défaut et de l'argument facultatif.
    $heure = date('H');
    // echo $heure . '<br>';
    // echo gettype($heure); // string
    $debut = '';

    // if($heure =< 4 || $heure >= 19)
    if($heure > 4 && $heure < 19) {
          $debut = 'Bonjour';
    } else {
          $debut = 'Bonsoir';
    }
    return $debut . ' '. $qui . ', bienvenue sur notre site.<br>';

}
echo dire_bonjour_bonsoir("Yoel");
?>