<?php
$requette3='delete from order_products where order_id= :order_id and product_id= :product_id';
$req3 = $bdd->prepare($requette3);
if (isset($_GET['id'])){
    $req3->execute(array(
    	'order_id' => $_SESSION['id'],
    	'product_id' => $_GET['id']));
}

$requette='select * from order_products where order_id=?';
$req = $bdd->prepare($requette); 
$req->execute(array($_SESSION['id']));
$results = $req->fetchALL();
//var_dump($results);

$requette2='select p.* from products as p where p.id=?';
$req2 = $bdd->prepare($requette2); 

function afficheproduit($data_requette, $valeur){
    $data_requette->execute(array($valeur['product_id']));
    $results = $data_requette->fetch();
    return $results;
}
            

?>