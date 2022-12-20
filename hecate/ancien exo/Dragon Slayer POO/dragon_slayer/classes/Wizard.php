<?php

require_once 'Player.php';

//extension de la classe abstraite
class Wizard extends Player
{

    private $type;

    public function __construct($name)
    {
        $this->type = 'Magicien';
        //appel du constructeur de la classe parente
        parent::__construct($name);
    }

    public function presentation()
    {
        return $this->name . ', le célèbre ' . $this->type . ' s\'avance dans l\'arène avec' . $this->pv . ' points de vie...';
    }
}
