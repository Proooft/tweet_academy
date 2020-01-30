<?php
	require_once("include/application.php");
	//inclusion de fichier de configuration
	require_once("database/connexion.php");
	//on supprime les variables de session
	unset($_SESSION['pseudo']);
	
	//on redirige l'utilisateur sur la page d'accueil
	header('location:index.php');
?>