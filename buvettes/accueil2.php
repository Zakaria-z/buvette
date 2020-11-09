<?php
session_start();

		if (empty($_SESSION['mdp'])) 
		{
			header("location: prive.php");
		}
		else
		{
	include('menu2.html');
?>
	<body>
		<center>
			<h2>Bienvenue Administrateur.</h2>
		</center>
	</body>
</html>
<?php
}
?>