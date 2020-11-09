<?php
	include('menu.html');
	include('connect.php');
	include('fonctions.php');
/*Inclure le menu / les procédures...*/
	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}
?>
	<body>
		<center>
			<form name="x" action="accueil.php" method="post">
				<input type="submit" value="Retour">
			</form>
		</center>
		<section>
	<body>
		<center>
			<h2>Match</h2>

<?php
AfficheMatch();
?>
			</table>
		</center>
		</section>		
	</body>
</html>