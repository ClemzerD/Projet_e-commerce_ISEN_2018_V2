

<body>
    <?php
        $requette='select p.* from products as p where p.type = 1';
        $req = $bdd->prepare($requette); 
        $req->execute();
        $results = $req->fetchAll();
        //var_dump($results);
    ?>

	<section>
		<div class="pres">
			<figure>
          <a href="pagepres.php?type=1"><img id="photopres" src="image/sweatnoirml.jpg" alt="sweat" />
          <figcaption>SWEAT</figcaption></a>
    		</figure>
    		<figure>
    			<a href="pagepres.php?type=2"><img id="photopres" src="image/pullnoirml.jpg" alt="pull" />
   				<figcaption>PULL</figcaption></a>
   			</figure>
   			<figure>
    			<a href="pagepres.php?type=3"><img id="photopres" src="image/tshirtnoirmc.jpg" alt="tshirt" />
    			<figcaption>T-SHIRT</figcaption></a>
   			</figure>
		</div>
	</section>

</body>