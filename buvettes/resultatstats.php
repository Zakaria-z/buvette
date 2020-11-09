
<?php
	error_reporting (E_ALL ^ E_NOTICE);
	include ('connect.php');
	include ('menu.html');
?>
		<center>
			<form name="x" action="statistiques.php" method="post">
				<input type="submit" value="Retour">
			</form>
		</center>
<?php
	include ('fonctions.php');
	
		$id=$_POST['id'];
		$id2=$_POST['id2'];
		$id3=$_POST['id3'];

	if ($id==1) 
	{
		AfficheVolontaire();
	}
	elseif ($id2==2) 
	{
		AfficheBuvette();
	}
	else
	{
		StatsMatch();
	}
?>
