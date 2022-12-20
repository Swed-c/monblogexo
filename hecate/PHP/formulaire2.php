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


    <title>Form2</title>
</head>
<body>
<!-- /*
      $pseudo type texte
      $nom type texte
      $prenom type texte
      $email type texte
      $mdp type texte
      $sexe
      $ville 
      $cp 
      $adresse *\ -->

    <form Method="GET" action=""> 
        <?php
           
          

         ?>
    <div class="form-group">
          <label for="pseudo">  Pseudo  </label>
          <input type="text" name="pseudo" id="pseudo"  class="form-control">
        <?php
         $pseudolenght = strlen($_GET['pseudo']);

         if($pseudolenght <= 4 || $pseudolenght >= 14){
        
            echo "Pseudo trop court ou trop long";
        
         }else{
        
            echo "Pseudo valide";
        
         }


           ?>
      </div>
      

    <div class="col-sm-6">
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom"  class="form-control">
        </div>
        <div class="form-group">
              <label for="prenom">Prenom</label>
              <input type="text" name="prenom" id="prenom"  class="form-control">
          </div>
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" name="email" id="email"  class="form-control">
         <?php $email = ($_GET['email']);

        if(filter_var($email, FILTER_VALIDATE_EMAIL)){

        echo "L'adresse e-mail est valide";

            }else{

        echo "L'adresse e-mail n'est pas valide";

            }
            ?>
      </div>
      <div class="form-group">
          <label for="mdp">Mot de passe</label>
          <input type="text" name="mdp" id="mdp"  class="form-control">
      </div>


    <div class="form-group">
            <label for="sexe">Sexe</label>
            <select name="sexe" id="sexe" value="" class="form-control">
                    <option value="m">homme</option>
                    <option value="f"  >femme</option>
            </select>
        </div>
    <div class="form-group">
        <label for="ville">Ville</label>
        <input type="text" name="ville" id="ville"  class="form-control">
    </div>
    <div class="form-group">
        <label for="cp">Code postal</label>
        <input type="text" name="cp" id="cp"  class="form-control">
    </div>
    <div class="form-group">
        <label for="adresse">Adresse</label>
        <textarea name="adresse" id="adresse" rows="1" class="form-control"> </textarea>
    </div>
    <div class="form-group">
        <label>&nbsp;</label>
        <input href="recup.php" type="submit" id="inscription" value="Inscription" class="w-100 btn btn-success">
    </div>

</div>
</form>
<?php

foreach($_GET as $indice => $valeur){

    echo $indice. " - " . $valeur.'<hr>';
    

}


?>

  



</body>
</html>