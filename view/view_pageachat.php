<body>
    <aside>
        <div id="info">
            Prix : <?php echo $results['prix']; ?> <br>
            Quantité : 
            <?php 
            if(isset($_SESSION['id'])){ ?>
                <form method="get" action="index.php">
                        <input type="hidden" name="page" value="pageachat">
                        <input type="hidden" name="order_id" value=<?php echo $_SESSION['id'] ?>>
                        <input type="hidden" name="product_id" value=<?php echo $id?>>
                        <input type="number" name="quantity" min="1" max="5">
                        <input type="hidden" name="unit_price" value=<?php echo $results['prix']?>><br>
                        <input type="submit" value="Ajouter au panier">
                </form>
            <?php 
            } 
            else { echo '<br/>'."\n"; echo "Vous devez être connecté pour pouvoir acheter des articles";}?>


            <?php infoproduct($req2);?>
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
</body>