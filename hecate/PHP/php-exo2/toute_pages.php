

LA PAGE A AFFICHE 

<?php 
if (isset($_GET['nb'])){
echo $_GET['nb']; 
}

?>
<br />
<?php

for ($i=1; $i<1000; $i++){
    echo "<a href='toute_pages.php?nb=$i'>".$i."<hr>";
}

?>
