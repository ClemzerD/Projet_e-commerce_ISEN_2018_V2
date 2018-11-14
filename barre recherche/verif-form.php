<?php
if (isset($_GET['recherche'])&& !empty($_GET['recherche'])){
	$_GET["recherche"] = htmlentities($_GET["recherche"]); /* empêche d'écrire n'importe quoi dans
	la barre de recherche */
	$recherche = $_GET["recherche"];
	//$recherche = trim($recherche); // supprime espaces faits par l'utilisateur
	//$recherche = strip_tags($recherche); // supprime les balises html
	
	if (isset($recherche)){
		//$recherche = strtolower($recherche) 
		/*permet de tout mettre en minuscule dans le cas où
		l'utilisateur met des majuscules*/
		$requette = 'select * from products where nom like ?';
 
		$req = $bdd->prepare($requette);
		$req -> execute(array('%'.$recherche.'%'));
		$resultat= $req->fetchAll();

		$count = $req->rowCount();
		if ($count >= 1){
			echo "$count resultat(s) trouvé(s) pour $recherche";
			foreach ($resultat as $key => $value) {
				echo $value['nom'];
			}
		}

		}
		else {
			echo "Aucun resultat trouvé pour $recherche";
		}

}

