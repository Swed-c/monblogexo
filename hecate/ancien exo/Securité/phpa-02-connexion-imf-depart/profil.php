<?php
// ICI, IL FAUT AUSSI DÉMARRER LA SESSION (ET OUI, SUR TOUTES LES PAGES)
session_start();
// ICI CHARGER LA DATABASE
require_once 'model/database.php';
// ICI CHARGER LE MODEL "users.model.php"
require_once 'model/users.model.php';
// CHARGEMENT DU FICHIER DE DEBUG POUR TESTS
require_once 'lib/debug.php';
// VARIABLES UTILISÉES PAR LE TEMPLATE (PAS TOUCHE)
$agent          = [];   // (PAS TOUCHE)
$firstname      = '';   // (PAS TOUCHE)
$lastname       = '';   // (PAS TOUCHE)
$email          = '';   // (PAS TOUCHE)
$description    = '';   // (PAS TOUCHE)
$actorFirstname = '';   // (PAS TOUCHE)
$actorLastname  = '';   // (PAS TOUCHE)
$actorBirthDate = '';   // (PAS TOUCHE)
$actorPhoto     = '';   // (PAAAAS TOOOUUUUUCHE !!!!)

// SI IL N'Y A PAS DE UID EN SESSION, RETOURNER À LA PAGE DE CONNEXION
if (!user_isConnected()) {
    // REDIRECTION VERS LA PAGE D'ACCUEIL
    header('location: index.php');
    die();
    // FIN SI
}


// RÉCUPÉRER L'UID EN SESSION
$uid = $_SESSION['uid'];

// ICI, DEMANDER AU MODEL 'USERS' DE NOUS DONNER TOUTES LES INFOS DE L'AGENT AVEC CET UID (LES CHARGER DANS $agent)
$agent = user_getUserById($uid);

// SI $agent N'EST PAS VIDE
if (!empty($agent)) {

    // CHARGER TOUTES LES VARIABLES (CI-DESSUS) AVEC LES BONNES DONNÉES AVANT DE LES ENVOYER AU TEMPLATE
    $$firstname          = $agent['firstname'];
    $lastname            = $agent['lastname'];
    $email               = $agent['email'];
    $description         = $agent['description'];
    $actorFirstname      = $agent['actor-firstname'];
    $actorLastname       = $agent['actor-lastname'];
    $actorBirthDate      = $agent['actor-birthdate'];
    $actorPhoto          = $agent['photo-filename'];

    // POUR LA DATE : CRÉER UNE DATE AVEC LA DATE ENREGISTRÉE EN BDD
    $date = date_create($agent['actor-birthdate']);
    // METTRE DANS $actorBirthDate LA FORMATÉE AU FORMAT JJ/MM/AAAA (NOTE : ÇA N'EXISTE PAS, ÇA, C'EST DU FRANÇAIS, CHERCHEZ DANS LA DOC)
    $actorBirthDate = date_format($date, "d/m/Y");
    // FIN SI
}
// CHARGEMENT DU TEMPLATE (PAS TOUCHE)
require_once 'templates/profil.phtml';
