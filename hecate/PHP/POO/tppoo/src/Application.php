<?php 

class Application{
    public static function process(){

        // index.php?task=show par défaut
        // index.php?task=showid
        // http://localhost:8000/index.php?task=autre
        

        // Soit on veut afficher tout les annonces par défaut
        $task="show";


        // soit on veur afficher une seul annonce
        // index.php?task=showid&id=3
        if (!empty($_GET['task']))  $task=$_GET['task']; 

       
  
        echo $task;
        if ($task=="show"){
            require_once(__DIR__.'/../src/Controller/AnnonceController.php');
            $AnnonceController=new AnnonceController();
            $AnnonceController->index();
        }
        if ($task=="showid"){
            echo "je suis dans l'annonce";
            require_once(__DIR__.'/../src/Controller/AnnonceController.php');
            $AnnonceController=new AnnonceController();
            $AnnonceController->getAnnonce();
        }

        /*
 
        
      
        */

        /*
         Si je suis dans la tache add
        http://localhost:8000/index.php?task=add
        => Formualaire
         */
        if ($task=="add"){
            require_once(__DIR__.'/../src/Controller/AnnonceController.php');
            $AnnonceController=new AnnonceController();
            $AnnonceController->addAnnonce();
            
        } 

        /*
          Si je suis dans la tache add_annonce avec les données en POST
        http://localhost:8000/index.php?task=add
        => Formualaire
        on va lancer le controlleur correspondant au formulaire 1 nouveau , Le même
        Le contrôlleur il va lancer le modele 1 Annonce() 2 ->insert
        l'entité elle va se construit (BD) l'Insert -> insert($_POST['titre],$_POST['message])
        Renvoie une vue de redirection de liste des annonces 
         */
        if ($task=="add_annonce"){

         //   require_once(__DIR__.'/../template/showads.php');
         require_once(__DIR__.'/../src/Controller/AnnonceController.php');
         $AnnonceController=new AnnonceController();
         $AnnonceController->saveAnnonce();

        } 

        /*
        Routeur : si task = delete 
        Controlleur : delete appelle modele annonce => renvoie la vue des annonces
        Annonce : Supprime

        */

        if ($task=="delete"){

            require_once(__DIR__.'/../src/Controller/AnnonceController.php');
            $AnnonceController=new AnnonceController();
            $AnnonceController->delete();
        //    $AnnonceController=new AnnonceController();
        //    $AnnonceController->saveAnnonce();
   
           } 
   
        
 
    }
}