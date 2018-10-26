<?php include("include/head.php"); ?>

<body>

<?php include("include/header.php"); ?>
    <?php
        $requette='select p.* from products as p where p.type = 2'; // <-- j'arrive pas a automatiser le truc pour que ca affiche l'article qui possede l'id sur lequel on a clic à la page precedente sur le site ...
        $req = $bdd->prepare($requette); 
        $req->execute();
        $results = $req->fetch();
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
            </table>
            <a href="pagepanier.php?id=<?php echo $results['id']; ?>"><input id ="button" type="button" value="Ajouter au panier"></tr></a>
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
</html>