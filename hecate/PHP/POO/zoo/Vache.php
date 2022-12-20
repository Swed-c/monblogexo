<?php 
namespace Application\LesAnimaux;
use Application\LesAnimaux\Animaux;

class Vache extends Animaux implements Animalcrier{

    public function crier(){

        echo "je beugle";

    }

    public function manger(){

        echo "je mange de l'herbe";

    }
    
}
?>
