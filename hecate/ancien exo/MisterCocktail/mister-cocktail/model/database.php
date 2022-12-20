<?php


function databaseConnect()
{
    $dsn = 'mysql:dbname=mister_cocktail;host=127.0.0.1;port=8889';
    $user = 'root';
    $password = 'root';

    $database = new PDO($dsn, $user, $password);
    return $database;
}
