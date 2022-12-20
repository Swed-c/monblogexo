<?php
require_once(__DIR__.'/../Entity/Modele.php');
require_once(__DIR__.'/../Entity/Annonce.php');
abstract class Controller {
    
    private $annonce;

    function __construct()
    {
        
        $this->annonce=new Annonce();

    }
}