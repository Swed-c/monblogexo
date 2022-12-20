<?php

$day = 'jeudi';

if ($day == 'vendredi') {
    echo 'C\'est bientôt le week-end ! <br>';
} else if ($day == 'samedi' || $day = 'dimanche') {
    echo 'Youhouu ! Apéro ! <br>';
} else {
    echo ' Le week-end est encore loin... <br>';
}


switch ($day) {
    case 'vendredi':
        echo 'C\'est bientôt le week-end ! <br>';
        break;

    case 'samedi':
    case 'dimanche':
        echo 'Youhouu ! Apéro !';
        break;
    default:
        echo 'Pffff ! Le week-end est encore loin... <br>';
        break;
}
