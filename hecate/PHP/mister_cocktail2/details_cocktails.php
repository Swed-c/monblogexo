<?php

include "assets/lib/database.php";
include "assets/models/cocktails.php";
$cocktails = details_cocktails();
$ingredient = ingredients();
include "assets/templates/details_cocktails.phtml";

?>