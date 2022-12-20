<!-- CONTROLLER -->
<?php
/************************* CHARGEMENT DU MODEL **************************/
// charger un fichier php :
require_once './model/apprenants_datas.php';

/************************ LE CODE DU CONTROLLER *************************/
echo '<pre>';
print_r($_POST);
echo '</pre>';

// SI L'ID EXISTE ON PEUT FAIRE LES MODIFS
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    // ESSAYER DE SAUVEGARDER LE FIRSTNAME
    if (isset($_POST['firstname'])) {

        // ON RECUPERE LE FIRSTNAME DANS LE FORMULAIRE
        $firstname =  $_POST['firstname'];

        // ON ENREGISTRE CE FIRSTNAME EN BASE DE DONNEE
        $apprenants[$id]['firstname'] = $firstname;
        //

    }

    if (isset($_POST['lastname'])) {
        $lastname =  $_POST['lastname'];
        $apprenants[$id]['lastname'] = $lastname;
    }

    if (isset($_POST['birthyear'])) {
        $birthyear =  $_POST['birthyear'];
        $apprenants[$id]['birthyear'] = $birthyear;
    }

    if (isset($_POST['birthcity'])) {
        $birthcity =  $_POST['birthcity'];
        $apprenants[$id]['birthcity'] = $birthcity;
    }

    if (isset($_POST['lovedmovie'])) {
        $lovedmovie =  $_POST['lovedmovie'];
        $apprenants[$id]['lovedmovie'] = $lovedmovie;
    }
    if (isset($_POST['lovedsong'])) {
        $lovedsong =  $_POST['lovedsong'];
        $apprenants[$id]['lovedsong'] = $lovedsong;
    }
    if (isset($_POST['lovedquote'])) {
        $lovedquote =  $_POST['lovedquote'];
        $apprenants[$id]['lovedquote'] = $lovedquote;
    }
}

/* 
if (isset($_POST['id'])) {
    $id = $_POST['id'];

    if (isset($_POST['lastname'])) {
        $lastname =  $_POST['lastname'];
        $apprenants[$id]['lastname'] = $lastname;
    }
}

if (isset($_POST['id'])) {
    $id = $_POST['id'];

    if (isset($_POST['birthyear'])) {
        $birthyear =  $_POST['birthyear'];
        $apprenants[$id]['birthyear'] = $birthyear;
    }
} */





// récupérer les ID avec $_GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $apprenant = $apprenants[$id];
}
/* echo '<pre>';
print_r($apprenant);
echo '</pre>'; */






/************************ CHARGEMENT DE LA VUE *************************/
require_once 'vues/edit_apprenant.phtml';
