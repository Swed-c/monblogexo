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
    var_dump($_POST);


    $pseudo = '';
    $nom = '';
    $prenom = '';
    $email = '';
    $mdp = '';
    $sexe = '';
    $ville = '';
    $cp = '';
    $adresse = '';
    
    if(
        isset($_POST['pseudo']) && 
        isset($_POST['nom']) && 
        isset($_POST['prenom']) && 
        isset($_POST['mdp']) && 
        isset($_POST['email']) && 
        isset($_POST['sexe']) && 
        isset($_POST['ville']) && 
        isset($_POST['cp']) && 
        isset($_POST['adresse'])) {  


        // variable de controle nous permettant de savoir s'il y a eu des erreurs dans nos traitements
        // on changera la valeur de cette variable uniquemennt dans les cas d'erreur
        $erreur = false;

        // trim() permet d'enlever les espaces en début et en fin de chaine.
        $pseudo = trim($_POST['pseudo']);
        $nom = trim($_POST['nom']);
        $prenom = trim($_POST['prenom']);
        $email = trim($_POST['email']);
        $mdp = trim($_POST['mdp']);
        $sexe = trim($_POST['sexe']);
        $ville = trim($_POST['ville']);
        $cp = trim($_POST['cp']);
        $adresse = trim($_POST['adresse']);


        $taille_pseudo = iconv_strlen($pseudo);
        if($taille_pseudo < 4 || $taille_pseudo > 14) {
            echo '<div class="alert alert-danger mb-3">Attention, <br>le pseudo doit avoir entre 4 et 14 caractères inclus</div>';
            // cas d'erreur
            $erreur=true;
            
        }

        if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo '<div class="alert alert-danger mb-3">Attention, <br>erreur sur le format du mail</div>';
            // cas d'erreur
            $erreur=true;
            
        }
    }

    if ($erreur==false){
        echo "OK ! ";
    }
    ?>
<div class="container">
                  <div class="row">
                        <div class="col-12 mt-5">
                              <form class="border p-3" method="post" action="">

                                    <div>

<div class="form-row">
 <div class="col-sm-6">
       <div class="form-group">
             <label for="pseudo">Pseudo</label>
             <input type="text" name="pseudo" id="pseudo" value="<?php echo $pseudo; ?>" class="form-control">
       </div>
       <div class="form-group">
             <label for="nom">Nom</label>
             <input type="text" name="nom" id="nom" value="<?php echo $nom; ?>" class="form-control">
       </div>
       <div class="form-group">
             <label for="prenom">Prénom</label>
             <input type="text" name="prenom" id="prenom" value="<?php echo $prenom; ?>" class="form-control">
       </div>
       <div class="form-group">
             <label for="mdp">Mot de passe</label>
             <input type="text" name="mdp" id="mdp" value="" class="form-control">
       </div>
       <div class="form-group">
             <label for="email">Email</label>
             <input type="text" name="email" id="email" value="<?php echo $email; ?>"  class="form-control">
       </div>
 </div>
<div class="col-sm-6">
       <div class="form-group">
             <label for="sexe">Sexe</label>
             <select name="sexe" id="sexe" value="" class="form-control">
                   <option value="m">homme</option>
                   <option value="f" <?php if($sexe == 'f') echo 'selected'; ?>  >femme</option>
             </select>
       </div>
       <div class="form-group">
             <label for="ville">Ville</label>
             <input type="text" name="ville" id="ville" value="<?php echo $ville; ?>"  class="form-control">
       </div>
       <div class="form-group">
             <label for="cp">Code postal</label>
             <input type="text" name="cp" id="cp" value="<?php echo $cp; ?>"   class="form-control">
       </div>
       <div class="form-group">
             <label for="adresse">Adresse</label>
             <textarea name="adresse" id="adresse" rows="1" class="form-control"> </textarea>
       </div>
       <div class="form-group">
             <label>&nbsp;</label>
             <input type="submit" id="inscription" value="Inscription" class="w-100 btn btn-success">
       </div>
 </div>
</body>
</html>


