<?php

function connexion_bd(){
$dsn      = 'mysql:dbname=mister_coktail;host=localhost:8889';
$password = 'root';
$user     = 'root';
/* creation d'un objet PDO de connexion à la B.D */
$pdo = new PDO($dsn, $user, $password);
return $pdo;
}

?>