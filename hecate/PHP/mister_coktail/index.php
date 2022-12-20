<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400">
    <link rel="stylesheet" href="order.css">
    <title>Docu</title>
</head>

<body>


    <form action="" method="POST">
        <div class="jumbotron">
            <input type="search" id="recherche" name="recherche">
            <button>Recherche</button>
        </div>
    </header>
    </form>  
    
    <?php
      
     if(isset($_POST['recherche'])){
        $search = $_POST['recherche'];

        echo "Votre recherche :" .htmlentities($_POST['recherche'], ENT_QUOTES). '<hr>';

       }else {

        echo "Veuillez relancer votre recherche!";

       }



      ?>
    
    
    
    <?php
/**
 * 
 * Connexion à la B.D.
 * 
 */

$dsn      = 'mysql:dbname=mister_cocktail;host=localhost:8889';
$password = 'root';
$user     = 'root';
/* creation d'un objet PDO de connexion à la B.D */
$pdo = new PDO($dsn, $user, $password);

// variable query contenant la requete SQL
$query = $pdo->prepare("

");

$query->execute(['%'. $search .'%']);


$orders = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<table class="table">
    <thead class="thead-dark">
        <tr>
            <th>Id</th>
            <th>Coktail</th>
            <th>Ingrédient</th>
            <th>Prix</th>
            <th>Année</th>
            <th>Actif</th>
        </tr>
    </thead>
    <tbody>
        <!-- La variable $orders vient du programme index.php -->
        <?php foreach($orders as $order){ ?>
            <tr>
                <td>
                    <!-- Génération d'un hyperlien menant vers le programme invoice.php -->
                    <a href="thevoice.php?orderNumber=<?= $order['Id'] ?>">
                        <?= $order['id'] ?>
                    </a>
                </td>
                <td><?= $order['coktail'] ?></td>
                <td><?= $order['ingrédient'] ?></td>
                <td><?= $order['prix'] ?></td>
                <td><?= $order['année'] ?></td>
                <td><?= $order['actif'] ?></td>
                
            </tr>
            <?php } ?>
        </tbody>
    </table>
    
</body>
</html>
    