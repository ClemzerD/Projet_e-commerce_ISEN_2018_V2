<?php 
$requette = 'insert into users(username, password, email) values (:username, :password, :email)';
$req = $bdd->prepare($requette);


function messageConnect ($data_requette) {
    $message = "Un problème est survenu lors de l'inscription, veuillez réessayer plus tard.";
    if (isset($_GET['pseudo']) AND isset($_GET['password']) AND isset($_GET['confirmation']) AND isset($_GET['email'])){
       	if ($_GET['password'] == $_GET['confirmation']){
      		  $data_requette->execute(array(
         	  'username' => $_GET['pseudo'],
            'password' => $_GET['password'],
        	  'email' => $_GET['email']));
        	  $message = "Inscription terminée, bienvenue sur le site de Rituel"/*, $_GET['pseudo']*/;
	    	}
    	  else{ $message =  "Validation du mot de passe incorrecte";}
    }           

    return $message;
}
?>