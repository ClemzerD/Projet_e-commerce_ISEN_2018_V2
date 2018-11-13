<section>
	<div class="pres">
	    <?php foreach ($results as $key => $value) { ?>
	        <figure>
	        <a href="index.php?page=pageachat&id=<?php echo $value['id']; ?>"><img src="<?php echo $value['image']; ?>"><figcaption><?php echo $value['nom']; ?></figcaption></a>
	        </figure>
	    <?php } ?>
	</div>
</section>