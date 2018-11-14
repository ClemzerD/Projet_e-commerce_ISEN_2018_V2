<header>
    <div class="menuCategory">
	   <a href="index.php?page=view_main"><img id="headerphoto" src="image/logorituelpetit.png" ></a>
    </div>

    <div class="menuCategory">
		<a id="headertitle" href="index.php?page=view_main">RITUEL</a>
    </div>

	<div class="menuCategory">
        <form method="get" action="index.php">
            <input type="hidden" name="page" value="pagerecherche">
            <input type="text" name="recherche" id="recherche" placeholder="recherche">
        	<input type="submit" value="Accepter"></div>
        </form>
    </div>   

	<div class="menuCategory">
		<a class="menu" href="index.php?page=main">Menu</a>
    </div>

    <?php 
    if (isset($_SESSION['id'])) { ?>

        <div class="menuCategory">
            <a class="menu" href="index.php?page=pagepanier">Panier</a>
        </div>
        <div class="menuCategory">
            <a class="menu" href="index.php?page=pagedeconnexion">Deconnexion</a>
        </div>

    <?php 
    }
    else { ?>

        <div class="menuCategory">
            <a class="menu" href="index.php?page=pageconnexion">Connexion</a>
        </div>

    <?php
    } ?>



    

</header>