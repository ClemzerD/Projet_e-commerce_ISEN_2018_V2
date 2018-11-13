
<body>

    <?php 
    $requette = 'insert into users(username, password, email) values (:username, :password, :email)';
    $req = $bdd->prepare($requette);
    ?>
	<section>
		<?php 
            function messageConnect () {
                $message = "Un problème est survenu lors de l'inscription, veuillez réessayer plus tard.";
            if (isset($_POST['pseudo']) AND isset($_POST['password']) AND isset($_POST['confirmation']) AND isset($_POST['email'])){
            	if ($_POST['password'] == $_POST['confirmation']){
            		$req->execute(array(
                	'username' => $_POST['pseudo'],
                	'password' => $_POST['password'],
                	'email' => $_POST['email']));
                	$message = "Inscription terminée, bienvenue sur le site de Rituel, ", $_POST['pseudo'];
            	}
            	else{ $message =  "Validation du mot de passe incorrecte";}
                
        	}
            return $message;
        }
        ?>
        <?php echo messageConnect();?>

	</section>
		

</body>