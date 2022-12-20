<?php

require_once 'Player.php';

//extension de la classe abstraite
class Angel extends Player
{

    private $type;

    public function __construct($name)
    {
        $this->type = 'ange';
        //appel du constructeur de la classe parente
        parent::__construct($name);
    }

    public function presentation()
    {
        return 'Il se nomme ' . $this->name . '. C\'est un ' . $this->type . ' tombé du ciel. Il posséde ' . $this->pv . ' points de vie...';
    }

    public function attack($adversaire)
    {
        $alea = rand(0, 10);
        if ($alea < 1) {
            return $this->attackFatal($adversaire);
        } else {
            return parent::attack($adversaire);
        }
    }

    public function attackFatal($adversaire)
    {
        $pv = $adversaire->getPv();
        $adversaire->setPv(0);

        return 'Oh mon dieu ! L\'ange a lancé son attaque fatale !!!';
    }
}
