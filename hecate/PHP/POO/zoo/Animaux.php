<?php

namespace  Application\LesAnimaux;

abstract class Animaux {
    private $nom;
    private $famille;
    private$mange;
    private $cri;
    private $age;

    public function __construct($nom, $famille ,$mange,  $age){
        
        $this->setNom($nom);
        $this->famille=$famille;
        $this->mange=$mange;
        $this->setAge($age);  
    }

    abstract function manger();
    abstract function crier();
    
    /**
     * Get the value of age
     */ 
    public function getAge()
    {
        return $this->age;
    }
    
    /**
     * Set the value of age
     *
     * @return  self
     */ 
    public function setAge($age)
    {
        $this->age = $age;
        
        return $this;
    }
    
    
    /**
     * Get the value of mange
     */ 
    public function getMange()
    {
        return $this->mange;
    }
    
    /**
     * Set the value of mange
     *
     * @return  self
     */ 
    public function setMange($mange)
    {
        $this->mange = $mange;
        
        return $this;
    }
    
    /**
     * Get the value of famille
     */ 
    public function getFamille()
    {
        return $this->famille;
    }
    
    /**
     * Set the value of famille
     *
      
     * @return  self
     */ 
    public function setFamille($famille)
    {
        $this->famille = $famille;
        
        return $this;
    }
    
    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }
    
    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        if(strlen($nom)<15){
        $this->nom = $nom;
    }
        return $this;
    }
}



