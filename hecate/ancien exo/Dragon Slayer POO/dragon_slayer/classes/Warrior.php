<?php

require_once 'Player.php';

//extension de la classe abstraite
class Warrior extends Player
{

    private $type;

    public function __construct($name)
    {
        $this->type = 'Guerrier';
        //appel du constructeur de la classe parente
        parent::__construct($name);
    }

    public function presentation()
    {
        return 'Il se nomme ' . $this->name . '. C\'est un valeureux ' . $this->type . ' possédant ' . $this->pv . ' points de vie...';
    }
}
