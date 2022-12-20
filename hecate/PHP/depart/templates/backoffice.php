<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    
    <main>
        <!-- La variable $cocktails vient d'index.php qui a stocké les données de la base SQL dans cette variable -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Description</th>
                    <th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($cocktails as $cocktail): ?>
                    <tr>
                        <td><?= $cocktail['id'] ?></td>
                        <td><?= $cocktail['nom2'] ?></td>
                        <!-- Afin d'éviter une faille XSS la description est converti en texte non interprété par le navigateur web -->
                        <td><?= htmlentities($cocktail['description']) ?></td>
                        <td><a href="edition_cocktail.php?id=<?= $cocktail['id'] ?>">Edition</a></td>
                        <td><a href="suppression_cocktail.php?id=<?= $cocktail['id'] ?>">Suppression</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </main>
    </body>
    </html>