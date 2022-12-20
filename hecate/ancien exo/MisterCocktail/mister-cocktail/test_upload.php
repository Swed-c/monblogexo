<?php

/*********** CHARGEMENT DES LIBRAIRES ************** */
require_once 'lib/debug.php';

/*********** CHARGEMENT DU MODÈLE ************** */
require_once 'model/database.php';
require_once 'model/cocktails.php';




const DESTINATION_DIR = "images/cocktails/";
$message = '';
$messageType = 'danger';

// A-T-ON RECU UN FICHIER PAR UPLOAD ?
if (isset($_FILES['images'])) {

    // RECUPERATION DU NOM TEMPORAIRE
    $src = $_FILES['images']['tmp_name'];

    // CALCUL DU NOM DE FICHIER DE DESTINATION
    $to = DESTINATION_DIR . $_FILES['image']['name'];

    // TENTATIVE DE DEPLACEMENT DU FICHIER UPLOADE
    $success = move_uploaded_file($from, $to);

    // MESSAGE SELON REUSSITE OU ECHEC
    if ($success) {
        $message = 'Le fichier <strong>' . $_FILES['image']['name'] . '</strong> a bien été uploadé.';
    } else {
        $message = 'Une erreur s\'est produite lors de l\'envoie du fichier <strong>' . $_FILES['image']['name'] . '</strong>';
    }
}

d($_FILES);




require_once 'vues/test_upload.phtml';
