<?php
// require_once("Application\Lesanimaux\Poisson.php");
spl_autoload_register(function ($class) {
    
     // ON ECLATE LE NAMESPACE POUR EN DÉDUIRE LE CHEMIN VERS LE FICHIER
     $parts = explode('\\', $class);

     // CONSTRUCTION DU CHEMIN
     $path = '';
     for($i=0; $i < count($parts)-1; $i++){
         $path .= ucfirst(strtolower($parts[$i])) . '/';
     }
 
     // AJOUT DU NOM DE FICHIER DE LA CLASSE EN FIN DE CHEMIN 
     $path .= $parts[count($parts)-1] . '.php';

    // CHARGEMENT DU FICHIER
    require_once $parts[count($parts)-1].".php";

});
?>