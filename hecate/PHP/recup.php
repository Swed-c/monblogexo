<?php
/* var_dump($_POST);
echo $_POST['pseudo'];
echo $_POST['nom'];
echo $_POST['prenom'];
echo $_POST['email'];
echo $_POST['mdp'];
echo $_POST['sexe'];
echo $_POST['ville'];
echo $_POST['cp'];
echo $_POST['adresse']; */

foreach($_POST as $indice => $valeur){

    echo $indice. " - " . $valeur;
    trim($valeur);

}

//controle pseudo

$pseudolenght = strlen($_POST['pseudo']);

if($pseudolenght <= 4 || $pseudolenght >= 14){

    echo "Pseudo trop court ou trop long";

}else{

    echo "Pseudo valide";

}


// controle email

$email = ($_POST['email']);

  if(filter_var($email, FILTER_VALIDATE_EMAIL)){

    echo "L'adresse e-mail est valide";

  }else{

    echo "L'adresse e-mail n'est pas valide";

  }



?>