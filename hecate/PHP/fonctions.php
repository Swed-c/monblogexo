<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php

    echo date('h-i-s, j-m-y, it is w Day'); 

    separation();

function separation(){

    echo "<hr><hr><hr>";
}

echo strlen("Kévin");

echo "<br />";
var_dump("Kévin");

$taille_psedo = strlen("K");

if($taille_psedo < 4 || $taille_psedo > 14){

echo "attention le psedo contient trop ou pas asser de caractère";


} else {
    echo "c\' est ok";
}

      
$couleur = rand(100000, 999999);
   
    echo '<hr><div style="width: 200px; height: 200px; background-color:#' . $couleur . '"></div>';
    

    $rgb1 = rand(0, 255);
    $rgb2 = rand(0, 255);
    $rgb3 = rand(0, 255);

    echo '<hr><div style="width: 200px; height: 200px; background-color: rgb(' . $rgb1 . ', ' . $rgb2 .', '. $rgb3 . ')"></div>';


    
    
   

       function dire_bonjour($name , $age){
           
         "Bonjour: " . $name . $age ;

       }
       echo dire_bonjour("Kévin" , 34 ) ;

      
       
       $heure = date('H');
      

        function dire_bonjour_heure($heure, $qui ='Admin'){

            if($heure > 4 && $heure < 19){
                echo "Bonjour" . $qui;

            }else{
                echo "Bonsoir" . $qui;
            }


        }
       echo dire_bonjour_heure("Kév");

       
       

    ?>

</body>
</html>