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

$infos_membre = ['psedo' => 'admin', 'mdp' => 'soleil','mail' => 'admin@mail.fr'];

foreach($infos_membre as $key => $value){

    echo $key. " ".$value."<hr>";
}

?>
    
</body>
</html>

