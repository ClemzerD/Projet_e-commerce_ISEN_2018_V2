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

// TODO insert the start html envelope (<html><head>....</head><body>

// TODO using $page decide to include header.php
if(isset($_GET["page"])){$page = $_GET["page"];}
else{$page = 'null';}


switch($page){
	case"pagepres":
	include'action/action_pagepres.php';
	break;
	
	case"pageachat":
	include'action/action_pageachat.php';
	break;
	
	case"pageconnexion":
	include'action/action_pageconnexion.php';
	break;

	case"pagedeconnexion":
	include'action/action_pagedeconnexion.php';
	break;
	
	case"pageinscription":
	include'action/action_pageinscription.php';
	break;
	
	case"pagepanier":
	include'action/action_pagepanier.php';
	break;

	case"pagerecherche":
	include'action/action_recherche.php';
	break;
	
	default:
	include('action/action_main.php');
	break;
}
?>
<html> 
<header>
	<meta charset="utf-8">
	<title>Rituel.com</title>
    <link rel="stylesheet" href="css/main.css">
	<nav>
	  	<?php 
	  	//include'barre recherche/verif-form.php';
	  	include'include/header.php';
	  	include'include/nav2.php';
	  	?>
    </nav>
    <?php
    if (isset($_SESSION['id']) AND isset($_SESSION['username']))
	{
	    echo 'Bonjour ' . $_SESSION['username'];
	}
	?>
</header>
</html>

<?php
//TODO if 'view/'.$page'.php' exists then include it 
//(use file_exists($filename) function)
//else include 'view/main.php' (it has to exist)

switch($page){
	case"pagepres":
	include'view/view_pagepres.php';
	break;
	
	case"pageachat":
	include'view/view_pageachat.php';
	break;
	
	case"pageconnexion":
	include'view/view_connexion.php';
	break;

	case"pagedeconnexion":
	include'view/view_deconnexion.php';
	break;
	
	case"pageinscription":
	include'view/view_pageinscription.php';
	break;
	
	case"pagepanier":
	include'view/view_pagepanier.php';
	break;

	case"pagerecherche":
	include'view/view_recherche.php';
	break;
	
	default:
	include('view/view_main.php');
	break;
	
}

include'include/footer.php';
// TODO insert the end html envelope (</body></html>)
?>