
<?php
if (isset($_GET["Accepter"]) AND $_GET["Accepter"] == "Rechercher"){
	$_GET["recherche"] = htmlentities($_GET["recherche"]); /* empêche d'écrire n'importe quoi dans
	la barre de recherche */
	$recherche = $_GET["recherche"];
	$recherche = trim($recherche); // supprime espaces faits par l'utilisateur
	$recherche = strip_tags($recherche); // supprime les balises html
	
	if (isset($recherche)){
		$recherche = strtolower($recherche) /*permet de tout mettre en minuscule dans le cas où
		l'utilisateur met des majuscules*/
		$req = $bdd->prepare('SELECT * FROM products WHERE product_name = " ' .$recherche'"');
		$req -> execute();
		
		while($recherche = $req->fetch() ){
			echo '<a href= ' /* virer la guillemets avant et mettre le nom de la page produit concernée */ .$recherche['id'] . '">' .$recherche['nom'] .'</a>';
		}
	}
}

$id = $_GET['id'];

$sql = 'SELECT * FROM products WHERE id = '.(int) $_GET['id'];

$req = mysql_query($sql) or die('Erreur SQL !<br />'.$sql.'<br />'.mysql_error());

while($recherche = mysql_fetch_array($req)){
	echo $data['contenu'].'</a><br> </br>';
}

