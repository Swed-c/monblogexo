<?php

require_once("Families.php");
require_once('Database.php');
require_once('Cocktail.php');

 // connect to database
$mabase=DataBase::getPdo();
$f=new Families();
$families=$f->getAll();

var_dump($families);

// Get data from families

$c = new Cocktail();
$coktails=$c->getAll();
$coktail=$c->getOne(1);

var_dump($coktail);

?>