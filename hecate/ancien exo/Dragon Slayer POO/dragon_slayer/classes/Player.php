<?php

//definition de la classe abstraite
abstract class Player
{

    protected $name;
    protected $pv;

    public function __construct($name)
    {
        $this->name = $name;
        $this->pv = rand(200, 250);
    }

    //attaque a coder ici
    public function attack($adversaire)
    {
        $pv = $adversaire->getPv();
        $pa = rand(20, 60);
        $pv = $pv - $pa;
        $adversaire->setPv($pv);

        return 'Le joueur attaque avec excalibur et inflige ' . $pa . ' point de degats';
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
