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

 $addition = [3, 3, 5];

 function tab ($addition){

 $resultat= 0;

 for($i = 0; $i < count($addition) ; $i++){ 

    $resultat = $resultat + $addition[$i];
 
}
echo $resultat;
 }
 tab($addition);

 echo '<hr>';

foreach($addition as $indice => $valeur){

    echo $indice. " - " . $valeur;
}




?>
    
</body>
</html>