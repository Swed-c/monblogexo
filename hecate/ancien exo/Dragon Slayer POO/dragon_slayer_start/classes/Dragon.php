<?php

require_once 'Monster.php';

class Dragon extends Monster
{
    private $type;
    public function __construct()
    {

        $this->name = 'dragon squelette';
        parent::__construct();
    }


    public function presentation()
    {
        return "Face à lui se dresse un redoutable . $this->name . $this->type .
            possédant  . $this->pv .  points de vie.";
    }
}
