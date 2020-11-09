<?php
	session_start();
	include('connect.php');

	$mdp = $_POST['mdp'];
	if ($mdp == 'admin') 
	{
		$_SESSION['mdp']=$mdp;
		header("location: accueil2.php");
	}
		else
		{
			include('menu.html');
			echo "<center>Mot de passe incorrect. <br /></center>";
			echo '<center><a href="prive.php" class="button"><h2>Veuillez réessayer</h2></a></center>';
			include('pied.html');
		}
?>