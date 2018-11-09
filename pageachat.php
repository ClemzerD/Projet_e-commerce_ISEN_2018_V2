<?php include("include/head.php"); ?>

<body>

<?php include("include/header.php"); ?>
    <?php
        if (isset($_GET['id']))
        {
            $id = $_GET['id'];
        }
        else 
        {
            $id = $_GET['product_id'];
        }

        $requette='select p.* from products as p where p.id=?';
        $requette2 = 'insert into order_products(order_id, product_id, quantity, unit_price) values (:order_id, :product_id, :quantity, :unit_price)';
        $req = $bdd->prepare($requette); 
        $req2 = $bdd->prepare($requette2);
        $req->execute(array($id));
        $results = $req->fetch();
        //var_dump($results);
        
         
    ?>

    <aside>
        <div id="info">
            <table>
                <tr>
                    <th>
                        Prix :
                    </th>
                    <td>
                        <?php echo $results['prix']; ?>
                    </td>
                </tr>
                <tr>
                    <th>
                        Taille :
                    </th>
                    <td>
                        <?php echo $results['taille']; ?>
                    </td>
                </tr>
            </table>
            <form>
                    <input type="hidden" name="order_id" value="1"/>
                    <input type="hidden" name="product_id" value=<?php echo $id?>>
                    <input type="hidden" name="quantity" value="1">
                    <input type="hidden" name="unit_price" value=<?php echo $results['prix']?>>
                    <input type="submit" value="Ajouter au panier"/>
            </form>
            <?php 
            if (isset($_GET['order_id']) AND isset($_GET['product_id']) AND isset($_GET['quantity']) AND isset($_GET['unit_price'])){
                $req2->execute(array(
                'order_id' => $_GET['order_id'],
                'product_id' => $_GET['product_id'],
                'quantity' => $_GET['quantity'],
                'unit_price' => $_GET['unit_price']));
            }?>
        </div>
    </aside>

	<section>
		<article>
			<figure>
    			<img id="photopresachat" src="<?php echo $results['image']; ?>"/>
    			<figcaption><?php echo $results['nom']; ?></figcaption>
    		</figure>

            <h1>Descritpion</h1>
            <p>
                <?php echo $results['description']; ?>
            </p>
		</article>
	</section>

	<?php include("include/footer.php"); ?>

</body>