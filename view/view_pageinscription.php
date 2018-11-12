<body>
	<section>
		<div class="text">
			<form methode="get" action="index.php">
				<input type="hidden" name="page" value="inscriptionreussi">
				<label for="Pseudo">Votre pseudo :</label>
				<input type="text" name="pseudo" placeholder="Ex : Toto" size="30" maxlength="20"/>
				<label for="Password">Mot de passe :</label>
				<input type="password" name="password" size="30" maxlength="20"/>
				<label for="Password">Confirmation :</label>
				<input type="password" name="confirmation" size="30" maxlength="20"/>
				<label for="E-mail">E-mail :</label>
				<input type="e-mail" name="email" placeholder="Ex : dupont.dupond@blabla.fr"
				size="30" maxlength="30" />
				<input type="submit" value="Finaliser l'inscription">
			</form>
		</div>
	</section>
</body>