<?php

class Wizard extends Player
{
    private $type;

    public function __construct($name)
    {
        $this->type = 'Magicien';

        parent::__construct($name);
    }

    public function presentation()
    {
        return "Lejoueur s'appel " . $this->name . ". 
        C'est un valeureux " . $this->_type .
            " possédant " . $this->_pv . " points de vie.";
    }
}
