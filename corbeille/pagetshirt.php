<?php include("include/head.php"); ?>

<body>
    <!--Titre-->
 <?php include("include/header.php"); ?>
    <?php
        $requette='select p.* from products as p where p.type = 3';
        $req = $bdd->prepare($requette); 
        $req->execute();
        $results = $req->fetchAll();
        //var_dump($results);
    ?>
    <section>

      <div class="pres">

          <?php foreach ($results as $key => $value) { ?>
            <figure>
              <a href="pageachat.php?id=<?php echo $value['id']; ?>"><img src="<?php echo $value['image']; ?>"><figcaption><?php echo $value['nom']; ?></figcaption></a>
            </figure>
          <?php } ?>

      </div>

    </section>

<?php include("include/footer.php"); ?>

</body>
</html>