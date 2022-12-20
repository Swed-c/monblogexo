<?php

require_once 'Angel.php';

abstract class Player
{

    protected $name;
    protected $pv;
    protected $attaque;

    public function __construct($name)
    {
        $this->name = $name;
        $this->pv = rand(200, 250);
    }

    // attaque
    public function attack($adversaire)
    {
        $pv = $adversaire->getPv();
        $pa =  rand(20, 30);
        $pv = $pv - $pa;
        $adversaire->setPv($pv);
        return "Le joueur attaque et inflige . $pa .  points de dégâts !";
    }

    public function getPv()
    {
        return $this->pv;
    }
    public function setPv($pv)
    {
        $this->pv = $pv;
    }
}
