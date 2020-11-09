<?php
	session_start();
	if (isset($_SESSION['mdp']))
	{
		include('menu2.html');
		include ('connexion_deconnexion.php');
	}
	else
	{
		include('menu.html');
		include ('connexion_deconnexion.php');
	}
?>