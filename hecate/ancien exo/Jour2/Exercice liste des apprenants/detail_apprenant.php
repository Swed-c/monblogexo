<!-- CONTROLLER -->

<?php
/************************* CHARGEMENT DU MODEL **************************/
// charger un fichier php :
require_once './model/apprenants_datas.php';


/************************ LE CODE DU CONTROLLER *************************/

// récupérer les ID avec $_GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $apprenant = $apprenants[$id];
}
/* echo '<pre>';
print_r($apprenant);
echo '</pre>'; */
/************************ CHARGEMENT DE LA VUE *************************/
require_once 'vues/detail_apprenant.phtml';
