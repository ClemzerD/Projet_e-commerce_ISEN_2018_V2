<body>
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
            <?php infoproduct(); }?>
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