<?php

// VARIABLES
$email      = '';
$password   = '';
$message    = '';

// SI IL Y'A UN EMAIL EN URL, ILFAUT LE RÉCUPÉRER POUR LE METTRE DANS LE CHAMP EMAIL
if (isset($_GET['email'])) {
    $email = htmlentities($_GET['email']);
}

// SI ON REÇOIT UNMOT DE PASSE, ON CONSIDÈRE QUE LA CONNEXION À FONCTIONNÉE
if (isset($_POST['password'])) {
    $message = "Félicitation, vous êtes connecté.";
}

// CHARGEMENT DU TEMPLATE
require_once './templates/index.phtml';
