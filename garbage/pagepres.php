

<body>
    <!--Titre-->
 <?php include("include/header.php"); ?>
    <?php
        $type = $_GET['type'];
        $requette='select p.* from products as p where p.type=?';
        $req = $bdd->prepare($requette); 
        $req->execute(array($type));
        $results = $req->fetchAll();

    ?>
    <section>
      <div class="pres">

          <?php foreach ($results as $key => $value) { ?>
            <figure>
              <a href="index.php?page=view/view_pageachat.php?id=<?php echo $value['id']; ?>"><img src="<?php echo $value['image']; ?>"><figcaption><?php echo $value['nom']; ?></figcaption></a>
            </figure>
          <?php } ?>

      </div>

    </section>



</body>