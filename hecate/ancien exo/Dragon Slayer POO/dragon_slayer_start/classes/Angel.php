<?php

class Angel extends Player
{
    private $_type;

    public function __construct($name)
    {
        $this->_type = 'Ange';
        parent::__construct($name);
    }

    public function presentation()
    {
        return "Le combattant se nomme $this->name.   
        C'est un $this->_type valeureux possédant $this->pv points de vie.";
    }
}
