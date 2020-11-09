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

	$idMat = $_POST['mat'];
	$date_M = $_POST['dateM'];
	$paysA = $_POST['paysA'];
	$paysB = $_POST['paysB'];

	/*echo "$idMat";
	echo "<br>";
	echo "$date_M";
	echo "<br>";
	echo "$paysA";
	echo "<br>";
	echo "$paysB";*/

				$reponse = $bdd->query("SELECT *
										FROM matchs
										WHERE idM='$idMat'");

				$reponseB = $bdd->query("SELECT nomV, volontaire.idV
										FROM volontaire, estpresent, buvette
										WHERE volontaire.idV=estpresent.idV
										AND estpresent.idB=buvette.idB
										AND estpresent.idM='$idMat'");

				$reponseC = $bdd->query("SELECT nomB, buvette.idB
										FROM buvette, estouverte, matchs
										WHERE buvette.idB=estouverte.idB
										AND matchs.idM=estouverte.idM
										AND matchs.idM='$idMat'");
?>
	<body>
		<form action="affecterA2.php" method="post">
			<fieldset>
				<legend><b>Affecter un Volontaire en tant que Responsable d'une Buvette</b></legend>
				<table>
					<tr>
						<td> Le match : </td>
						<td> <input type="hidden" name="id" value="<?php echo $idMat?>"><strong><?php echo $idMat;?></strong> - ( <strong><?php echo $paysA;?></strong> VS <strong><?php echo $paysB;?></strong> )</td>
					</tr>

					<tr>
						<td>Volontaire</td>
						<td><select name="resp">
<?php						
			while ($resultatB=$reponseB->fetch()) 
			{
?>
				<option value="<?php echo $resultatB['idV'];?>"><?php echo $resultatB['nomV'];?></option>
<?php
			}
?>
						</select></td>
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
						<td> <input type="submit" name="envoi" value="Affecter" /> </td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>