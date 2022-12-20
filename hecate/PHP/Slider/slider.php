<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" media="screen" href="main.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="slider slider--image2">
            <div class="slider__before">
            <img src="assets/img/seine_0<?=$_GET['id']?>_av.jpg" alt="">
            </div>
            <div class="slider__separator"></div>
            <div class="slider__after">
                <img src="assets/img/seine_0<?=$_GET['id']?>_ap.jpg" alt="">
            </div>
            <input class="slider__range" type="range" min="0" max="100" value="50"/>
        </div>
    </div>

    

    

   
    <script  src="main.js"></script>
</body>
</html>