<?php
// 01 *** ICI : IL FAUT DÉMARRER LA SESSION (TOUJOURS)
session_start(); // INITIALISATION DE LA SESSION


// VARIABLES (PAS TOUCHE)
$message = ''; // <= MESSAGE À DESTINATION DE L'UTILISATEUR (PAS TOUCHE)

/***************************************************************************************
*                  02 - DEMANDE D'AJOUT D'UNE VARIABLE VIA LE FORMULAIRE               *
****************************************************************************************/

// SI $_POST['varName'] EST DÉFINI ET $_POST['varValue'] EST DÉFINI ALORS
if (isset($_POST['varName']) && isset($_POST['varValue']) ) {

    // RÉCUPÉRER $_POST['varName'] DANS UNE VARIABLE
    $varName = $_POST['varName'];

    // RÉCUPÉRER $_POST['varValue'] DANS UNE VARIABLE
    $varValue = $_POST['varValue'];

    // ENREGISTRER varValue EN SESSION (EN UTILISANT LE varName)
    $_SESSION[$varName] = $varValue;

    // CRÉER UN MESSAGE DE CONFIRMATION POUR L'UTILISATEUR
    $message = "La variable <strong>$varName</strong> a été ajoutée à la session, sa valeur est <strong>$varValue</strong>. Utilisez le même nom pour la modifier.";

} // FIN SI

/***************************************************************************************
*                      03 - DEMANDE DE VIDAGE COMPLET DE LA SESSION                    *
****************************************************************************************/

// SI $_GET['action'] EST DÉFINI ET ÉGAL À "destroy" ALORS
if(isset($_GET['action']) && $_GET['action'] == 'destroy') {

    // VIDER LA SESSION
    session_unset();

    // CRÉER UN MESSAGE DE CONFIRMATION POUR L'UTILISATEUR
    $message = "La session a été vidée. Elle existe toujours mais, puisqu'elle est vide, on considère que l'utilisateur est déconnecté.";

} // FIN SI

/***************************************************************************************
*                 04 - DEMANDE DE SUPPRESSION D'UNE VARIABLE DE SESSION                *
****************************************************************************************/

// SI $_GET['action'] EST DÉFINI ET ÉGAL À "remove" ET QUE $_GET['varName'] EST DÉFINIE ALORS
if(isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['varName'])) {

    // RÉCUPÉRER $_GET['varName'] DANS UNE VARIABLE
    $varName = $_GET['varName'];

    // SI LA VARIABLE DEMANDÉE EST BIEN DANS LA SESSION ALORS
    if(isset($_SESSION[$varName])) {

        // DÉTRUIRE LA VARIABLE DE SESSION
        unset($_SESSION[$varName]);

        // CRÉER UN MESSAGE DE CONFIRMATION POUR L'UTILISATEUR
        $message = "La variable <strong>$varName</strong> a été supprimée de la session.";

    } // FIN SI
} // FIN SI


// CHARGEMENT DU TEMPLATE (PAS TOUCHE)
require_once './templates/index.phtml';