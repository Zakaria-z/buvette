<?php
	session_start();
	unset($_SESSION['mdp']);
	header("location: accueil.php");
?>