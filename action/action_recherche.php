<?php	
$requette = 'select * from products where nom like ?';
$req = $bdd->prepare($requette);
?>