<?php
$type = $_GET['type'];
$requette='select p.* from products as p where p.type=?';
$req = $bdd->prepare($requette); 
$req->execute(array($type));
$results = $req->fetchAll();
?>