<?php

namespace  Application\LesAnimaux;
use Application\LesAnimaux\Animaux;

class Chien extends Animaux {

    public function crier(){

        echo "j'aboie";

    }

    public function manger(){

        echo "croquette";

    }
   
}


?>