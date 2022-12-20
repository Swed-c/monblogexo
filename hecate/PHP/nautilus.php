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
        
       for ($i=0; $i < 101; $i++) { 

           echo '<a href="http://localhost:8888/PHP/profil.php?pages=page'.$i.'">'.$i.'</a> ';
        }

    ?>

    
</body>
</html>