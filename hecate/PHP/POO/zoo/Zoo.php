<?php

namespace Application\LesAnimaux;

class Zoo{

    private $lesanimauxc;
    
    /**
     * Get the value of lesanimauxc
     */ 
    public function getLesanimauxc()
    {
        return $this->lesanimauxc;
    }

    /**
     * Set the value of lesanimauxc
     *
     * @return  self
     */ 
    public function setLesanimauxc($lesanimauxc)
    {
        $this->lesanimauxc[]= $lesanimauxc;

        return $this;
    }

    
    private $lesanimauxm;
    
    /**
     * Get the value of lesanimauxm
     */ 
    public function getLesanimauxm()
    {
        return $this->lesanimauxm;
    }

    /**
     * Set the value of lesanimauxm
     *
     * @return  self
     */ 
    public function setLesanimauxm($lesanimauxm)
    {
        $this->lesanimauxm[]= $lesanimauxm;

        return $this;
    }
}




?>