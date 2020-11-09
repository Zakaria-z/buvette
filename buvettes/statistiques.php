<?php
	include('menu.html');
	include('connect.php');
?>
<body>
	<center>
		<h2>Statistiques</h2>
		<form action="resultatstats.php" method="post">
			<input type="hidden" name="id" value="1">
			<input type="submit" value="Afficher Top 5 Volontaires">
		</form>
	</center>
	<center>
		<form action="resultatstats.php" method="post">
			<input type="hidden" name="id2" value="2">
			<input type="submit" value="Afficher Top 5 Buvettes">
		</form>
	</center>
	<center>
		<form action="resultatstats.php" method="post">
			<input type="hidden" name="id3" value="3">
			<input type="submit" value="Afficher les statistiques des matchs">
		</form>
	</center>
</body>