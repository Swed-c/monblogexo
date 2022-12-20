<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <title>Formu</title>

</head>
<body>
<div class="container">
    <div class="row">
            <div class="col-4 mx-auto mt-5">
                <form method="POST" action="" enctype="multipart/form-data" class="border p-3">
                        <div class="input-group">
                            <input type="text" name="recherche" id="recherche" class="form-control" value="">
                        </div>
                        <div class="input-group mt-3">
                            <input type="submit" name="rechercher" id="rechercher" value="Rechercher" class="w-100 btn btn-primary">
                        </div>
                </form>

                <hr>

                <div>
                        <h2>Résultat</h2>
                        <?php 

                           if(isset($_POST['recherche'])){
                            echo "Votre recherche :" .htmlentities($_POST['recherche'], ENT_QUOTES). '<hr>';

                           }else{

                            echo "Veuillez relancer votre recherche!";


                           };
                        ?>
                </div>
            </div>
    </div>            
</div>


    


</body>
</html>