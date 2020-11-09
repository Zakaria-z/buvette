<?php
	include ('connect.php');
	include ('menu2.html');

	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}

	$idVol = $_POST['id'];
	$nom = $_POST['nom']

?>
	<body>
		<form action="traitement_modVon2.php" method="post">
			<fieldset>
				<legend><b>Modification d'un Volontaire</b></legend>
				<table>
					<tr>
						<td> Vous modifiez le/la volontaire : </td>
						<td> <input type="hidden" name="id" id="id" value="<?php echo $idVol?>"><strong><?php echo $nom ?></strong></td>
					</tr>
					<tr>
						<td> Modifiez le nom : </td>
						<td> <input type="text" name="nomVol" id="nomVol" size="32" maxlength="20"> </td>
					</tr>
					<tr>
						<td> Modifiez la date de naissance : </td>
						<td> <input type="date" name="nais" id="nais"> </td>
					</tr>
					<tr>
						<td> <input type="submit" name="envoi" value="Modifier" /> </td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>