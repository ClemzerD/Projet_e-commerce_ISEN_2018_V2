<?php
if (isset($_GET['recherche'])&& !empty($_GET['recherche'])){
	$_GET["recherche"] = htmlentities($_GET["recherche"]); /* empêche d'écrire n'importe quoi dans
	la barre de recherche */
	$recherche = $_GET["recherche"];

	if (isset($recherche)){
		$req -> execute(array('%'.$recherche.'%'));
		$results= $req->fetchAll();
		$count = $req->rowCount();
		if ($count >= 1){
			echo "$count resultat(s) trouvé(s) pour $recherche";
	    	foreach ($results as $key => $value) { ?>
		        <figure>
		        <a href="index.php?page=pageachat&id=<?php echo $value['id']; ?>"><img src="<?php echo $value['image']; ?>"><figcaption><?php echo $value['nom']; ?></figcaption></a>
                <br/>
                <br/>
		        </figure>
	    	<?php 
			} 
		}

		else {
			echo "Aucun resultat trouvé pour $recherche";
		}
	}
}
?>
