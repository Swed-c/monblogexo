<?php

require_once(__DIR__.'/../Database.php');
class Categorie {

    public $pdo;

    function __construct()    {
        // un objet de connexion PDO
        $this->pdo=DataBase::getPdo();
    }

    function getAll_Annonce() {
        $sql=" select *   from ads.Categorie ";
        // L'objet PDO qui préparer la requete 
        $stmt = $this->pdo->prepare($sql);
        // Exececute
        $stmt->execute();
        // Recupere les données
        $annonces=$stmt->fetchAll(); 
        return $annonces;
    }

    function getAnnonce($id){ 
        $sql=" select *   from ads.users where id=$id ";
        // L'objet PDO qui préparer la requete 
        $stmt =  $this->pdo->prepare($sql);
        // Exececute
        $stmt->execute();
        // Recupere les données
        $annonces=$stmt->fetch(); 
        return $annonces;
    }

    function insert(){ 
        echo "testS";
        $titre=$_POST['titleAnnonce'];
        $message=$_POST['annonceContent'];
        $sql="INSERT INTO ads.users ( `description`, `titre`, `id_uti`) VALUES ( '$titre','$message',3)";
        // L'objet PDO qui préparer la requete 
        $stmt =  $this->pdo->prepare($sql);
        // Exececute
        $stmt->execute();
    }

    function delete(){
        echo "test1";
        $id=$_GET['id'];
        $sql="DELETE FROM ads.users WHERE id = $id";
        // L'objet PDO qui préparer la requete 
        $stmt =  $this->pdo->prepare($sql);
        // Exececute
        $stmt->execute();
    }

  /*

    function show(){
        
        $sql=" select *   from blogpoo.articles ";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $articles=$stmt->fetchAll();

        include "../template/articles/index.php";
    }

    function showbyid($id){
        
        $sql=" select *   from blogpoo.articles where id=$id ";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $articles=$stmt->fetchAll();

        include "../template/articles/index.php";
    }


    function delete($id){
        $sql=" DELETE FROM blogpoo.articles where id=$id ";
    
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(); 

        include "../template/articles/index.php";

    }
    */
}