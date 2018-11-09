<?php

//TODO start session


//TODO include database.php file
    //connecting to the BDD
    try 
    {
        $bdd = new PDO('mysql:host=localhost;dbname=dump;charset=utf8', 'root', '');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }

    session_start();


//TODO include checkUser.php file (pour plus tard quand client fini)

//TODO get page parameter ($_GET['page'] or $_POST['page']) and 
//assign it into $page variable



//if 'action/'.$page'.php' exists then include it 
//(use file_exists($filename) function)





// TODO insert the start html envelope (<html><head>....</head><body>

// TODO using $page decide to include header.php
?>
<html> 

<?php include('include/head.php');?>

<body>
<header>
	<?php include("include/header.php");?>
  <nav>
         
        <div class="menuCategory">
			<form action = "D:\wamp64\www\ProjetTechnoWeb\Projet_e-commerce_ISEN_2018_V2\verif-form.php" method = "get">
    		<input type="search" name="recherche" id="recherche" placeholder="recherche">
			<input type="submit" name="Accepter" value="Accepter">
			</form>
    	</div>
            
        <div class="menuCategory">
			<a href="index.php?page=main">Menu</a>
    	</div>

    	<div class="menuCategory">
    		<a href="index.php?page=pagepanier">Panier</a>
		</div>

    	<div class="menuCategory">
    		<a href="index.php?page=pageconnexion">Connexion</a>
		</div>

    </nav>
</header>
<?php include('include/footer.php')?>

<?php
//TODO if 'view/'.$page'.php' exists then include it 
//(use file_exists($filename) function)
//else include 'view/main.php' (it has to exist)

if(isset($_GET["page"])){
    
    $page = $_GET["page"];
	
	switch($page){
		case"pagepres":
		include'pagepres.php';
		break;
		
		case"pageachat":
		include'pageachat.php';
		break;
		
		case"pageconnexion":
		include'pageconnexion.php';
		break;
		
		case"pageinscription":
		include'pageinscription.php';
		break;
		
		case"inscriptionreussi":
		include'inscriptionreussi.php';
		break;
		
		case"pagepanier":
		include'pagepanier.php';
		break;
		
		default:
		include('main.php');
		
	}	
}

// if (isset($_GET['page']) && $_GET['page'] ='pagepres'){
	// include('pagepres.php');
	// }
//TODO mettre des else if pour les pages et un seul else pour revenir sur le main

// elseif (isset($_GET['page']) && $_GET['page'] ='pageachat'){
	// $_SESSION['index.php?page=pageachat'] = htmlentities($_GET['index.php?page=pageachat']);
// }
// elseif (isset($_GET['page']) && $_GET['page'] ='pageinscription'){
	// $_SESSION['index.php?page=pageinscription'] = htmlentities($_GET['index.php?page=pageinscription']);
// }
// elseif (isset($_GET['page']) && $_GET['page'] ='pageconnexion'){
	// $_SESSION['index.php?page=pageconnexion'] = htmlentities($_GET['index.php?page=pageconnexion']);
// }
// elseif (isset($_GET['page']) && $_GET['page'] = 'inscriptionreussi'){
	// $_SESSION['index.php?page=inscriptionreussi'] = htmlentities($_GET['index.php?page=inscriptionreussi']);
// }
// elseif (isset($_GET['page']) && $_GET['page'] = 'pagepanier'){
	// $_SESSION['index.php?page=pagepanier'] = htmlentities($_GET['index.php?page=pagepanier']);
// }
// else{
	// include('main.php');
// }

// pour les includes de pages, les écrire sous la forme index.php?page = "nom page"
// TODO insert the end html envelope (</body></html>)
?>
</body>
</html>