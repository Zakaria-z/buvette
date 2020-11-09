<?php
	include ('connect.php');
	include ('menu.html');
?>
		<center>
			<form name="x" action="affectations.php" method="post">
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
		matchA();
	}
	elseif ($id2==2) 
	{
	   matchB();
	}
	else
	{
		matchC();
	}
?>