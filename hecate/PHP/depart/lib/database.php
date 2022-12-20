<?php

function connexionMySQL()
{
    // Création d'une fonction de connexion à MySQL.
    $dsn      = 'mysql:dbname=mister_cocktail2;host=localhost:8889';
    $password = 'root';
    $user     = 'root';
    /* creation d'un objet PDO de connexion à la B.D */
    $pdo = new PDO($dsn, $user, $password);

    return $pdo;
    // Cette fonction appelle PDO puis **renvoie** l'objet PDO représentant la connexion.
    // Cela permet alors aux autres fonctions de faires des requêtes SQL.
}