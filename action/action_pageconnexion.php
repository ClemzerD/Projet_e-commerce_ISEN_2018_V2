<?php 
//  Récupération de l'utilisateur et de son pass hashé
if (isset($_GET['username'])){
    $username = $_GET['username'];
    $req = $bdd->prepare('SELECT id, password FROM users WHERE username = :username');
    $req->execute(array(
    'username' => $username));
    $resultat = $req->fetch();

    // Comparaison du pass envoyé via le formulaire avec la base
    $isPasswordCorrect = ($_GET['password'] == $resultat['password']);

    if (!$resultat)
    {
        echo 'Mauvais identifiant ou mot de passe !';
    }
    else
    {
        if ($isPasswordCorrect) {
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['username'] = $username;
            echo 'Vous êtes connecté !';
        }
        else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }
}


?>