<?php include("include/head.php"); ?>

<body>
    <?php include("include/header.php"); ?>
    <?php 
    $requette = 'insert into users(username, password, email) values (:username, :password, :email)';
    $req = $bdd->prepare($requette);
    ?>
	<section>
		<?php 
            if (isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['confirmation']) AND isset($_POST['email'])){
            	if ($_POST['password'] == $_POST['confirmation']){
            		$req->execute(array(
                	'username' => $_POST['pseudo'],
                	'password' => $_POST['password'],
                	'email' => $_POST['email']));
                	echo "Inscription terminée, bienvenue sur le site de Rituel, ", $_POST['pseudo'];
            	}
            	else{ echo "Validation du mot de passe incorrecte";}
                
        	}
        	else { echo "Un problème est survenu lors de l'inscription, veuillez réessayer plus tard.";}
        ?>
		

		
	</section>
		
	<?php include("include/footer.php"); ?>
</body>