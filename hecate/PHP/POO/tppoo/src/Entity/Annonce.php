<?php

require_once(__DIR__.'/../Database.php');
class Annonce extends modele {

    public $pdo;
    protected $table="ads.annonces";

 
     function insert(){ 
        echo "testS";
        $titre=$_POST['titleAnnonce'];
        $message=$_POST['annonceContent'];
        $sql="INSERT INTO ads.annonces ( `description`, `titre`, `id_uti`) VALUES ( '$titre','$message',3)";
        // L'objet PDO qui préparer la requete 
        $stmt =  $this->pdo->prepare($sql);
        // Exececute
        $stmt->execute();
    }

    function delete(){
        echo "test1";
        $id=$_GET['id'];
        $sql="DELETE FROM ads.annonces WHERE id = $id";
        // L'objet PDO qui préparer la requete 
        $stmt =  $this->pdo->prepare($sql);
        // Exececute
        $stmt->execute();
    }

}