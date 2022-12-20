<?php
// ICI, IL FAUT AUSSI DÉMARRER LA SESSION
session_start();
// ICI CHARGER LA DATABASE
require_once './model/database.php';
// ICI CHARGER LE MODEL "users.model.php"
require_once './model/users.model.php';

// ON A BESOIN D'INITIALISER CES VARIABLES POUR NE PAS FAIRE PLANTER LE PHTML
$email      = ''; // INITIALISATION DE LA VARIABLE $email (PAS TOUCHE)
$password   = ''; // INITIALISATION DE LA VARIABLE $password (PAS TOUCHE)
$message    = ''; // INITIALISATION DU MESSAGE UTILISATEUR (PAS TOUCHE)

// SI $_POST['email'] ET $_POST['password'] SONT DÉFINIS ALORS
if(isset($_POST['email']) && isset($_POST['password'])){

    // RÉCUPÉRER $_POST['email'] DANS UNE VARIABLE
    $email = $_POST['email'];

    // RÉCUPÉRER $_POST['password'] DANS UNE VARIABLE
    $password = $_POST['password'];

    // DEMANDER AU MODEL "users" DE CONNECTER L'UTILISATEUR AVEC CET EMAIL ET CE MOT DE PASSE
    $uid = user_connect($email, $password);

    // SI LA RÉPONSE EST NULLE ALORS
    if (!$uid) {

        // ECRIRE UN MESSAGE DE MAUVAISE CONNECTION À L'UTILISATEUR
        $message = 'Erreur : identifiants de connexion incorrects.';
        
    } else { // SINON (L'UTILISATEUR EST CONNECTÉ)

        // REDIRECTION VERS LA PAGE DE PROFIL
        header('Location: profil.php');
        
        // TUER LE PROCESS (POUR NE PAS ENVOYER LE PHTML DE LA PAGE DE CONNEXION)
        die();

    } // FIN SI

} // FIN SI

// CHARGEMENT DU TEMPLATE (PAS TOUCHE)
require_once './templates/index.phtml';
