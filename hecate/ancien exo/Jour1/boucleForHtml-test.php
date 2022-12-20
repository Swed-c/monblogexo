<h2>Voici une boucle qui compte jusqu'à 100 de 10 en 10&nbsp;:</h2>

<ul>
    <?php for ($i = 0; $i <= 100; $i += 10) : ?>
        <li>
            La variable $i vaut <?php echo $i ?>
        </li>

    <?php endfor; ?>
</ul>

<h2>Voici un décompte de 1000 à 0, de 50 en 50&nbsp;:</h2>

<ul>
    <?php for ($i = 1000; $i >= 0; $i -= 50) : ?>
        <li>
            La variable $i vaut <?= $i ?>
        </li>

    <?php endfor; ?>
</ul>