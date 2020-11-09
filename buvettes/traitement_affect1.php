<?php
	include('connect.php');
	include('menu.html');

	if (empty($_POST['volon'])
	|| empty($_POST['match'])
	|| empty($_POST['buv'])) 
	{
		echo 'Erreur de saisie. <a href="affectations.php">Accueil</a>';	
	}
	else
	{
		$volon=$_POST['volon'];
		$buv=$_POST['buv'];
		$match=$_POST['match'];

		$requete="INSERT INTO estouverte
					";
	}


?>