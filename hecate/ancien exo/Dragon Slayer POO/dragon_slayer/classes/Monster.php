<?php

abstract class Monster
{

    protected $pv;
    protected $name;

    public function __construct()
    {
        $this->pv = rand(200, 250);
        $this->name = '';
    }

    public function attack($adversaire)
    {
        $pv = $adversaire->getPv();
        $pa = rand(20, 60);
        $pv = $pv - $pa;
        $adversaire->setPv($pv);

        return 'Le dragon attaque avec son souffle et inflige ' . $pa . ' point de degats';
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
