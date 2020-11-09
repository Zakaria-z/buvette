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

	$idMat = $_POST['id'];
	$date_M = $_POST['dateM'];
	$paysA = $_POST['paysA'];
	$paysB = $_POST['paysB'];

				$reponse = $bdd->query('SELECT *
										FROM matchs
										WHERE idM = "$idMat"');
?>
	<body>
		<form action="traitement_modMat2.php" method="post">
			<fieldset>
				<legend><b>Modification d'un Match</b></legend>
				<table>
					<tr>
						<td> Vous modifiez le match : </td>
						<td> <input type="hidden" name="id" value="<?php echo $idMat?>"><strong><?php echo $idMat?></strong> - ( <strong><?php echo $paysA;?></strong> VS <strong><?php echo $paysB;?></strong> ) du <strong><?php echo $date_M;?></strong></td>
					</tr>
					<tr>
						<td> Modifiez la date : </td>
						<td><input type="date" name="dateM"></td>
					</tr>
					<tr>
						<td> Sélectionnez l'équipe 1 : </td>
						<td><select name="eqA" id="eqA">
<?php
				$resultat = $bdd->query('SELECT idE, pays
									FROM equipe');

		while ($lignes = $resultat->fetch()) 
		{
?>
			<option value="<?php echo $lignes['idE'];?>"><?php echo $lignes['pays'];?></option>
<?php
		}
?>
				</select></td>
					</tr>

					<tr>
						<td> Sélectionnez l'équipe 2 : </td>
				<td><select name="eqB" id="eqB">
<?php
			$resultat = $bdd->query('SELECT idE, pays
									FROM equipe');

		while ($lignes = $resultat->fetch()) 
		{
?>
			<option value="<?php echo $lignes['idE'];?>"><?php echo $lignes['pays'];?></option>
<?php
		}
?>
				</select></td>		
			</tr>

					<tr>
						<td> Modifiez le score de l'équipe 1 : </td>
						<td><input type="number" min="0" name="scoreA"></td>
					</tr>

					<tr>
						<td> Modifiez le score de l'équipe 2 : </td>
						<td><input type="number"  min="0" name="scoreB"></td>
					</tr>

					<tr>
						<td> <input type="submit" name="envoi" value="Modifier" /> </td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>