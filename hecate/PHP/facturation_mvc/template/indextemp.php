<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:300,400">
    <link rel="stylesheet" href="css/orders.css">
    <title>Document</title>
</head>
<body>
<header class="jumbotron">
        <h1>Historique des commandes</h1>
        <hr>
        <p>Recherche une ou des commandes en fonction du client</p>
        <form action="index.php" method="POST">
            <div class="form-row">
                <div class="col-auto">
                    <input type="text" class="form-control" name="customerName" placeholder="Client">
                </div>
                <div class="col-auto">
                    <button type="submit" class="btn btn-primary">Rechercher</button>
                </div>
            </div>
        </form>
    </header>

    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th>Commande</th>
                <th>Client</th>
                <th>Date</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <!-- La variable $orders vient du programme index.php -->
            <?php foreach($orders as $order){ ?>
                <tr>
                    <td>
                        <!-- Génération d'un hyperlien menant vers le programme invoice.php -->
                        <a href="invoice.php?orderNumber=<?= $order['orderNumber'] ?>">
                            <?= $order['orderNumber'] ?>
                        </a>
                    </td>
                    <td><?= $order['customerName'] ?></td>
                    <td><?= $order['orderDate'] ?></td>
                    <td><?= $order['status'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>




    
</body>
</html>