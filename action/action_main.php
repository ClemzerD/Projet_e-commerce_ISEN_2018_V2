<?php
    $requette='select p.* from products as p where p.type = 1';
    $req = $bdd->prepare($requette); 
    $req->execute();
    $results = $req->fetchAll();
    //var_dump($results);
?>