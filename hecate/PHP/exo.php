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

//for($i = 0; $i < 10 ; $i++){ echo $i ;}; for($i = 0; $i < 100 ; $i++){ echo $i ;};

for($i = 0; $i < 100 ; $i++){ 
    if($i == 50){ 
        echo '<div style="color: red;"> '. $i . '</div>';
    }else{ 
        
        
        echo $i;
    }
}
echo '<hr>';

for($i = 0; $i < 100 ; $i++){ 
    if($i % 10 == 0){ 
        echo '<div style="color: red;"> '. $i . '</div>';
    }else{ 
        
        
        echo $i;
    }
}
echo '<hr>';


for($i = 0; $i < 100 ; $i++){ 
    if($i % 10 == 0){ 
        echo $i.' <br>';
    }else{ 
        
        
        echo $i;
    }
}


echo '<hr>';


function boucle($num){
    for($i = 0; $i < $num ; $i++){ 
        echo $i;

    
}
}
echo boucle(20);

echo '<hr>';


function boucle_2($num2){

    for($i = 0; $i < $num2 ; $i++){ 

        echo  "*";

}
}
echo boucle_2(5);

echo '<hr>';

function boucle_3($num3, $spe){

 for($i = 0; $i < $num3 ; $i++){
     
    echo $spe;

}

}
boucle_3( 20, "μ");
echo '<hr>';

function addition($nb, $nb2){
    $resultat=$nb+$nb2;

  echo $resultat;

}
echo addition(5, 6);

echo '<hr>';

function addition_2($nb3, $nb4){

    $resultat=$nb3+$nb4;
    return $resultat;
  
  }
  echo addition(10, 20);
  
  echo '<hr>';

function calcul ($number, $number2, $spe2){
      if($spe2 == "*"){

      $resultat = $number * $number2;

   echo $resultat;
      }

}
echo calcul(5, 5, "*");

echo '<hr>';


function accu($num5){
    $resultat3 = 0;

    for($i = 0; $i <= $num5 ; $i++){

        $resultat3= $resultat3+$i;
        
        
    }
    echo $resultat3;
}
accu(6);


?>

</body>
</html>