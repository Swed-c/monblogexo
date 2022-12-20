<?php 
namespace  Application\LesAnimaux;
use Application\LesAnimaux\Animaux;

class Tigre extends Animaux {

    public function crier(){

        echo "je rugis";

    }

    public function manger(){

        echo "je mange des gazelles";

    }

}
?>