<?php
include "assets/lib/database.php";
include "assets/models/cocktails.php";
$cocktails = all_cocktails();
include "assets/templates/index.phtml";

?>