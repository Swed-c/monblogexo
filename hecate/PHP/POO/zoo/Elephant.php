<?php

namespace Application\LesAnimaux;
use Application\LesAnimaux\Animaux;

 class Elephant extends Animaux{


  public function crier(){

    echo "j'elephante";

}

public function manger(){

    echo "je mange des arbres";

}

  /* private $trompe;

  public function __construct($nom,$age,$trompe){
    parent::__construct($nom,$age);
    $this->setTrompe($trompe);
  }

  /*
   * Get the value of trompe
  
  public function getTrompe()
  {
    return $this->trompe;
  }
 */ 
  /*
   * Set the value of trompe
   *
   * @return  self
   
  public function setTrompe($trompe)
  {
    $this->trompe = $trompe;

    return $this;
  } */

  
}

?>