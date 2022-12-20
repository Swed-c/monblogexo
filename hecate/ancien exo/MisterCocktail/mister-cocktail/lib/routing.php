<?php

$routes = [
    'accueil'       => 'i,dex.php',
    'admin'         => 'back_office.php'

];

/**
 * Lance une redirection vers l'url fournie
 *
 * @param string $url destination
 * @return void
 */
function redirect(string $url)
{

    header('Location: ' . $url);
    die();
}
