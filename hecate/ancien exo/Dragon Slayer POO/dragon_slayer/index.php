<?php
// Chargement des classes dépendantes
require_once './classes/Game.php';

// A-t'on reçu un formulaire ?
if(empty($_POST) == true) {
    // Non, affichage du menu du jeu (formulaire start)
    require 'templates/menu.phtml';
}
else {
    // Oui, exécution du jeu
    if(isset($_POST['player-name']) && !empty($_POST['player-name'])){
        $playerName = $_POST['player-name'];
    }else{
        $playerName = 'Drax';
    }
    $playerType = $_POST['player-type'];
    if(isset($_POST['difficulty']) && !empty($_POST['difficulty'])){
        $difficulty = $_POST['difficulty'];
    }else{
        $difficulty = 'normal';
    }

    
    // Création du jeu avec les données du formulaire
    $game = new Game($playerName, $playerType, $difficulty);
    
    // Exécution du jeu, récupération de la liste des messages
    $game->startGame();

    // Récupération de l'image du vainqueur

    require_once 'templates/game-start.phtml';
}