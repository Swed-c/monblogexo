<?php 
function connexion_mysql(){
     $dsn='mysql:dbname=mister_cocktail2;host=localhost:8889';
     $user= 'root';
     $password='root';
     $pdo= new PDO($dsn, $user, $password);
     return $pdo;
    
}


?>