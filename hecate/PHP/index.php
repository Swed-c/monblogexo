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
            $prenom= "Kévin";
            $age= 34;

            echo "<br />je m'appel ".$prenom." et j'ai ".$age." ans";

            echo "<br />";


            $ma_variable = 123;

            echo gettype($ma_variable);

            $ma_variable = true;

            echo "<br / >";

            echo gettype($ma_variable);

            $ma_variable = 1.5;

            echo gettype($ma_variable);

            echo "<hr>";

            $var1 = 'Bonjour';

            echo $var1 . ' à tous<br>';


            echo "$var1 à tous<br>";



            $valeur1 = 10;
            $valeur2 = 5;

            echo $valeur1 % $valeur2 . '<br>';

            echo $valeur1 / $valeur2 . '<br>';



    ?>
</body>
</html>