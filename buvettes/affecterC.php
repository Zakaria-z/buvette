<?php
	include('connect.php');
	include('menu.html');
	include('fonctions.php');

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

				$reponseC = $bdd->query("SELECT nomB, buvette.idB
										FROM buvette, estouverte
										WHERE buvette.idB=estouverte.idB
										AND buvette.idB NOT IN ('SELECT idB from estouverte')");
?>
	<body>
		<form action="affecterC2.php" method="post">
			<fieldset>
				<legend><b>Rendre une buvette ouverte</b></legend>
				<table>
					<tr>
						<td> Le match : </td>
						<td> <input type="hidden" name="id" value="<?php echo $idMat?>"><strong><?php echo $idMat?></strong> - ( <strong><?php echo $paysA;?></strong> VS <strong><?php echo $paysB;?></strong> )</td>
					</tr>

					<tr>
						<td>Buvette</td>
						<td><select name="buv">
<?php						
			while ($resultatC=$reponseC->fetch())
			{
?>
				<option value="<?php echo $resultatC['idB'];?>"><?php echo $resultatC['nomB'];?></option>
<?php
			}
?>
						</select></td>
					</tr>

					<tr>
						<td>Ouverte :</td>
						<td><input type="radio" name="ouv" id="ouv" value="oui" checked>Oui<input type="radio" name="ouv" id="ouv" value="non">Non</td>
					</tr>

					<tr>
						<td> <input type="submit" name="envoi" value="Affecter" /> </td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>