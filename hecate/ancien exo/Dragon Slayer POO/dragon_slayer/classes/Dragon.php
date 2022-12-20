<?php

require_once 'Monster.php';

class Dragon extends Monster
{

    public function __construct()
    {
        parent::__construct();
        $this->name = 'dragon squellette';
    }

    public function presentation()
    {
        return 'Face à lui se dresse le redoutable dragon squelette avec ' . $this->pv . ' points de vie';
    }
}
