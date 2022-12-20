<?php
require_once(__DIR__.'/../Controller/Controller.php');
require_once(__DIR__.'/../Entity/Modele.php');
require_once(__DIR__.'/../Entity/Annonce.php');

  class AnnonceController extends Controller {

    protected $annonce;
    protected $modele="Annonce()";

    function __construct()
    {
        $this->annonce=new Annonce();
    }

     // code de contrôle permettant d'afficher tout les annonces
    function index(){
        // Recuperer les annonces pour les afficher
 
        $annonces=$this->annonce->getAll_Annonce();
        // Affichage de la vue
        require_once(__DIR__.'/../../template/showads.php');
      }

      function getAnnonce(){
        // Recuperer les annonces pour les afficher
         $annonces=$this->annonce->getAnnonce($_GET['id']);
        // Affichage de la vue
        require_once(__DIR__.'/../../template/showads.php');
      }

    function addAnnonce(){
        require_once(__DIR__.'/../../template/add.php');
    }

    function saveAnnonce(){
        
         $annonce=$this->annonce->insert();
        $annonces=new Annonce();
        $annonces=$annonces->getAll_Annonce();
        // Affichage de la vue
        require_once(__DIR__.'/../../template/showads.php');

    }

    function delete(){
        $annonce=new Annonce();
        $annonce=$this->annonce->delete();
        $annonces=new Annonce();
        $annonces=$annonces->getAll_Annonce();
        // Affichage de la vue
        require_once(__DIR__.'/../../template/showads.php');

    }


  }

?>