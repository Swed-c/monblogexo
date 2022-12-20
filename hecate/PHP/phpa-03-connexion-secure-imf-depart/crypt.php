<?php

// VARIABLES NÉCESSAIRES PAS TOUCHE !!!!
$uncryptedPassword  = ''; // PAS TOUCHE
$cryptedPassword    = ''; // PAS TOUCHE
$salt               = ''; // PAS TOUCHE
$message            = ''; // PAS TOUCHE

// SI $_POST['password] EST DÉFINI
 if(isset($_POST['password'])){
    // RÉCUPÉRER LE MOT DE PASSE DU POST DANS UNE VARIABLE
    $password = $_POST['password'];
    
    
    // CRÉER UN SEL DE 12 OCTECTS ALÉATOIRES 
    $salt = random_bytes(12);
    
    // CONVERTIR LE SEL EN HEXADÉCIMALE (PLUS LISIBLE POUR NOUS HUMBLES HUMAINS)
    $salt= bin2hex($salt);
    
    // DEMANDER LE HASHAGE DU MOT DE PASSE ET RÉCUPÉRER LA VERSION CRYPTÉE DANS UNE VARIABLE
    $cryptedPassword = password_hash($password, PASSWORD_BCRYPT);
    
    // GÉNÉRER UN MESSAGE ($message) POUR AFFICHER LE MOT DE PASSE EN VERSION CRYPTÉE
    $message = 'vous avez crypté votre mot de passe :'. $cryptedPassword;
    
// FIN SI
 }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fomulaire de cryptage</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400">
</head>
<body>
    
    <header class="mb-5 p-5 bg-primary text-white rounded">
        <div class="container">
        <h1>Fomulaire de cryptage (<a href="readme.php" target="_blank" class="link-warning">lire l'énoncé</a>)</h1>
        <hr>
        <p>Utilisez le formulaire ci-dessous pour générer des versions cryptés de vos mots de passe.</p>
        </div>
    </header>

    <section id="crypt-form">
        <div class="container">
            <div class="row">

                <div class="col">
                    <?php if(isset($message) && $message != '') : ?>
                        <div class="alert alert-success" role="alert">
                            <?=$message?>
                        </div>
                    <?php endif; ?>   
                </div>            

                <div class="col-4 offset-4">
                    <div class="card p-2 bg-light">
                        <form action="" method="POST">
                            <p><strong>Saisissez le mot de passe à crypter</strong></p>
                            <div class="row mb-3">
                                <label for="password" class="col-4 col-form-label text-end">Mot de passe</label>
                                <div class="col-8">
                                    <input type="password" class="form-control"  name="password" id="password" value="<?=$uncryptedPassword?>">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col text-end">
                                    <input type="submit" class="btn btn-primary" value="Crypter">
                                </div>
                            </div>                            
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section> 

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/ffe3aa3664.js" crossorigin="anonymous"></script>
</body>
</html>