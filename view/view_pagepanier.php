<body>
    <section>
        <?php 
        $total = 0;
        foreach ($results as $key => $value) { 
            $results2 = afficheproduit($req2, $value);
        ?>
            <a href="index.php?page=pageachat&id=<?php echo $results2['id']; ?>"><img src="<?php echo $results2['image']; ?>"><figcaption><?php echo $results2['nom']; ?></figcaption></a>
            <div class="infoarticle">
                Prix : <?php echo $results2['prix'];?><br>
            </div>

            <form method="get" action="index.php">
                <input type="hidden" name="page" value="pagepanier">
                <input type="hidden" name="id" value=<?php echo $results2['id']?>>
                <input type="submit" value="Supprimer">
            </form>
            <?php $total = $total + $results2['prix']; ?>
            <br> 

        <?php } ?>

        <br>
        Prix total du panier : <?php echo $total; ?> €
    </section>
</body>