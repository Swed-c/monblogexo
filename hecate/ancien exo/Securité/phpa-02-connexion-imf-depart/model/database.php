<?php


function connect()
{
    // Infos de connexion
    $dsn = 'mysql:dbname=imf;host=127.0.0.1;port=8889;charset=utf8';
    $user = 'root';
    $password = 'root';

    // on charge l'objet PDO dans $database
    $database = new PDO($dsn, $user, $password);
    return $database;
}
