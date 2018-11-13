<?php
$requette3='delete from order_products where order_id=1 and product_id=?';
$req3 = $bdd->prepare($requette3);
if (isset($_GET['id'])){
    $req3->execute(array($_GET['id']));
}

$requette='select p.* from order_products as p where p.order_id=1';
$req = $bdd->prepare($requette); 
$req->execute(array());
$results = $req->fetchAll();
//var_dump($results);

$requette2='select p.* from products as p where p.id=?';
$req2 = $bdd->prepare($requette2); 

function afficheproduit($data_requette, $valeur){
    $data_requette->execute(array($valeur['product_id']));
    $results = $data_requette->fetch();
    return $results;
}
            

?>