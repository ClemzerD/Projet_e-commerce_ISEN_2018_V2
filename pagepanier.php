<?php //include("include/head.php"); ?>

<body>
    <?php //include("include/header.php"); ?>
    <?php
        $requette='select p.* from order_products as p where p.order_id=1';
        $req = $bdd->prepare($requette); 
        $req->execute(array());
        $results = $req->fetchAll();
        //var_dump($results);
        $requette3='delete from order_products where order_id=1 and product_id=?';
        $req3 = $bdd->prepare($requette3);
        if (isset($_GET['id'])){
                $req3->execute(array($_GET['id']));
            }
    ?>

	<section>
		<?php 
        $total = 0;
		foreach ($results as $key => $value) { 
			$requette2='select p.* from products as p where p.id=?';

        	$req2 = $bdd->prepare($requette2); 
        	$req2->execute(array($value['product_id']));
        	$results2 = $req2->fetch();

            
        ?>
            <a href="index.php?page=pageachat?id=<?php echo $results2['id']; ?>"><img src="<?php echo $results2['image']; ?>"><figcaption><?php echo $results2['nom']; ?></figcaption></a>
            <div class="infoarticle">
            	Prix : <?php echo $results2['prix'];?><br>
            </div>

            <form>
                <input type="hidden" name="id" value=<?php echo $results2['id']?>>
                <input type="submit" value="Supprimer">
            </form>
            <?php 

            $total = $total + $results2['prix'];
            ?>
            <br> 

    	<?php 
    	}
    	?>
		<br>
        Prix total du panier : <?php echo $total; ?> €

	</section>
		
	<?php //include("include/footer.php"); ?>
</body>