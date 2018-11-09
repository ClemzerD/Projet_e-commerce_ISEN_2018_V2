
<?php
if (isset($_GET['id'])){
    $id = $_GET['id'];
}
else {
    $id = $_GET['product_id'];
}

$requette='select p.* from products as p where p.id=?';
$requette2 = 'insert into order_products(order_id, product_id, quantity, unit_price) values (:order_id, :product_id, :quantity, :unit_price)';
$req = $bdd->prepare($requette); 
$req2 = $bdd->prepare($requette2);
$req->execute(array($id));
$results = $req->fetch();
?>

<?php 
function infoproduct(){
    if (isset($_GET['order_id']) AND isset($_GET['product_id']) AND isset($_GET['quantity']) AND isset($_GET['unit_price'])){
        $req2->execute(array(
        'order_id' => $_GET['order_id'],
        'product_id' => $_GET['product_id'],
        'quantity' => $_GET['quantity'],
        'unit_price' => $_GET['unit_price']));
    return ('order_id','product_id','quantity','unit_price');
}
}?>
