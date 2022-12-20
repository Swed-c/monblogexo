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
    <title>Document</title>
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
                              
                              // on vérifie le contenu de $_GET
                              // echo '<pre>'; print_r($_GET); echo '</pre>';

                              // Afficher la saisie du formulaire lors de la validation proprement avec un echo
                              // exemple : Votre recherche : ...
var_dump($_POST);
                              if(isset($_POST['recherche'])) {
                                    echo 'Votre recherche : ' . htmlentities($_POST['recherche'], ENT_QUOTES) . '<hr>';
                                    // le htmlentites() permet de transformer certains caractères en entités html
                                    // https://alexandre.alapetite.fr/doc-alex/alx_special.html
                                    // Pour éviter les injections XSS 
                                    // https://fr.wikipedia.org/wiki/Cross-site_scripting
                              } else {
                                    echo 'Veuillez lancer votre recherche !';
                              }

                              

                              ?>
                        </div>
                  </div>
            </div>            
      </div>
</body>
</html>