<html>
<?php
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
?>

<head>
	<meta charset="utf-8">
	<title>Rituel.com</title>
    <link rel="stylesheet" href="css/main.css">

</head>