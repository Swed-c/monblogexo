<?php
// 01 *** ICI : IL FAUT DÉMARRER LA SESSION (TOUJOURS)
session_start([
    'cookie_lifetime' => 86400,
]);


// VARIABLES (PAS TOUCHE)
$message = ''; // <= MESSAGE À DESTINATION DE L'UTILISATEUR (PAS TOUCHE)

/***************************************************************************************
*                  02 - DEMANDE D'AJOUT D'UNE VARIABLE VIA LE FORMULAIRE               *
****************************************************************************************/

// SI $_POST['varName'] EST DÉFINI ET $_POST['varValue'] EST DÉFINI ALORS
    
      if(isset($_POST['varValue']) && isset($_POST['varName'])){
    // RÉCUPÉRER $_POST['varName'] DANS UNE VARIABLE
        $varName = $_POST['varName'];
    // RÉCUPÉRER $_POST['varValue'] DANS UNE VARIABLE
    $varValue = $_POST['varValue'];
    
    // ENREGISTRER varValue EN SESSION (EN UTILISANT LE varName)
         $_SESSION[$varName] = $varValue; 
      
  
    // CRÉER UN MESSAGE DE CONFIRMATION POUR L'UTILISATEUR
    $message = "Vous bien enregister $varName dans $varValue";
    var_dump($message);

// FIN SI
      }
/***************************************************************************************
*                      03 - DEMANDE DE VIDAGE COMPLET DE LA SESSION                    *
****************************************************************************************/

// SI $_GET['action'] EST DÉFINI ET ÉGAL À "destroy" ALORS
    if(isset($_GET['action']) && $_GET['action'] == "destroy"){
    // VIDER LA SESSION
     session_unset();
    
    // CRÉER UN MESSAGE DE CONFIRMATION POUR L'UTILISATEUR
    $message = 'Vous avez videz la session';

// FIN SI
    }
/***************************************************************************************
*                 04 - DEMANDE DE SUPPRESSION D'UNE VARIABLE DE SESSION                *
****************************************************************************************/

// SI $_GET['action'] EST DÉFINI ET ÉGAL À "remove" ET QUE $_GET['varName'] EST DÉFINIE ALORS
if(isset($_GET['action'])&& $_GET['action']== "remove" && isset($_GET['varName'])){
    // RÉCUPÉRER $_GET['varName'] DANS UNE VARIABLE
           $name = $_GET['varName'];

    // SI LA VARIABLE DEMANDÉE EST BIEN DANS LA SESSION ALORS
          if(isset($_SESSION[$name])){
        // DÉTRUIRE LA VARIABLE DE SESSION
        unset($_SESSION[$name]);
        

        
        // CRÉER UN MESSAGE DE CONFIRMATION POUR L'UTILISATEUR
        $message = "Vous avez bien détruit $name";

    // FIN SI
}
// FIN SI
}

// CHARGEMENT DU TEMPLATE (PAS TOUCHE)
require_once './templates/index.phtml';