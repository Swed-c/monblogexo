<?php

abstract class Monster
{

    protected $name;
    protected $pv;

    public function __construct()
    {
        $this->name = '';
        $this->pv = rand(200, 250);
    }



    public function attack($adversaire)
    {
        $pv = $adversaire->getPv();
        $pa =  rand(20, 30);
        $pv = $pv - $pa;
        $adversaire->setPv($pv);
        return "Le dragon attaque et inflige "
            . $pa . " points de dégâts !";
    }

    public function getPv()
    {
        return $this->pv;
    }
    public function setPv($pv)
    {
        $this->$pv = $pv;
    }
}
