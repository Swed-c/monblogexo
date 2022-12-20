<?php
/* Connexion à une base MySQL avec l'invocation de pilote */
$dsn = 'mysql:dbname=classicmodels;host=127.0.0.1;port=3306';
$user = 'root';
$password = '';

$database = new PDO($dsn, $user, $password);
