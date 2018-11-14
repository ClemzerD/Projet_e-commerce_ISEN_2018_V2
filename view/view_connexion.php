<body>
	<?php 
	if (!isset($_SESSION['id'])){ ?>
		<section>
			<div class="text">
				<form method="get" action="index.php">
					<input type="hidden" name="page" value="pageconnexion">
					<label for="username">Pseudo :</label>
					<input type="text" name="username" id="username" size="30" maxlength="20"/>
					<label for="password">Mot de passe :</label>
					<input type="password" name="password" id="password" size="30" maxlength="20"/>
					<input type="submit" value="Connexion">
				</form>
			</div>
			<div>
				<p>Première connexion ?
				<a href="index.php?page=pageinscription">S'inscrire</a></p>
			</div>
		</section>
	<?php }  ?>
</body>