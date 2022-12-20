<?php

require_once('Database.php');

abstract class Model {

    protected $pdo; 

    function __construct(){
        // un objet de connexion PDO
        $this->pdo=DataBase::getPdo();
    }

    function getAll(){
      
        $sql=" select *   from $this->table ";
        // L'objet PDO qui préparer la requete 
        $stmt = $this->pdo->prepare($sql);
        // Exececute
        $stmt->execute();
        // Recupere les données
        $requete=$stmt->fetchAll(); 
        return $requete;
    }

    function getOne($id){
      
        $sql=" select *   from $this->table where id = ?";
        // L'objet PDO qui préparer la requete 
        $stmt = $this->pdo->prepare($sql);
        // Exececute
        $stmt->execute([$id]);
        // Recupere les données
        $requete=$stmt->fetch(); 
        return $requete;
    }

    function delete($id){
      
        $sql="DELETE FROM  $this->table WHERE  id = ?";
        // L'objet PDO qui préparer la requete 
        $stmt = $this->pdo->prepare($sql);
        // Exececute
        $stmt->execute([$id]); 
    }
}