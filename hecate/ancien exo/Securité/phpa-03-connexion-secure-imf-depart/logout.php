<?php
// MÊME ICI, IL FAUT AUSSI DÉMARRER LA SESSION
session_start();
// ICI CHARGER LE MODEL "users.model.php"
require_once './model/users.model.php';

// ICI DEMANDER AU MODÈLE DE DÉCONNECTER L'UTILISATEUR
user_disconnect();

// RENVOYER À LA PAGE D'ACCUEIL
header('Location:index.php');
