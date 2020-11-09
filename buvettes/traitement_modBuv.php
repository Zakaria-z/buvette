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

	$nomBuv=$_POST['buvette'];
	$idBuv=$_POST['idB'];
	$nom=$_POST['volontaire'];

				$reponse = $bdd->query('SELECT nomB, emplacement, nomV, idB
										FROM buvette, volontaire
										WHERE buvette.idB=volontaire.idV');
?>
	<body>
		<form action="traitement_modBuv2.php" method="post">
			<fieldset>
				<legend><b>Modification d'une Buvette</b></legend>
				<table>
					<tr>
						<td> Vous modifiez la buvette : </td>
						<td> <input type="hidden" name="idb" id="idb" value="<?php echo $idBuv?>"><strong><?php echo $nomBuv ?></strong>
						</td>
					</tr>
					<tr>
						<td> Modifiez le nom : </td>
						<td> <input type="text" name="nbuv" id="nbuv" size="32" maxlength="20"> </td>
					</tr>
					<tr>
						<td>Emplacement</td>
						<td><select name="empl" id="empl">
<?php
						$resultatA = $bdd->query('SELECT *
												FROM buvette
												GROUP BY emplacement');

						while ($lignesA = $resultatA->fetch()) 
						{
?>
						<option value="<?php echo $lignesA['emplacement'];?>"><?php echo $lignesA['emplacement'];?></option>
<?php
						}
?>
						</select></td>
					</tr>
					<tr>
						<td> Modifiez le responsable : </td>
						<td><select name="resp" id="resp">
<?php
						$resultat = $bdd->query('SELECT nomV, idV
									FROM volontaire');

						while ($lignes = $resultat->fetch()) 
						{
?>
						<option value="<?php echo $lignes['idV'];?>"><?php echo $lignes['nomV'];?></option>
<?php
						}
?>
						</select></td>
					</tr>
					<tr>
						<td> <input type="submit" name="envoi" value="Modifier" /> </td>
					</tr>
				</table>
			</fieldset>
		</form>
	</body>
</html>