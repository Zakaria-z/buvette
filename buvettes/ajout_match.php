<?php
session_start();

		if (empty($_SESSION['mdp'])) 
		{
			header("location: prive.php");
		}
		else
		{
	include('menu2.html');
	include('connect.php');

	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}
?>

<form action="insertion2.php" method="post">
	<fieldset>
		<legend>Ajout d'un Match</legend>
		<table>
			<tr>
				<td>Date du Match</td>
				<td><input type="date" name="dateM" id="dateM"></td>
			</tr>
			<tr>
				<td>Equipe A</td>
				<td><select name="equipeA" id="equipeA">
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
				<td>Equipe B</td>
				<td><select name="equipeB" id="equipeB">
<?php
			$resultat = $bdd->query('SELECT idE, pays
									FROM equipe');

		while ($ligne = $resultat->fetch()) 
		{
?>
			<option value="<?php echo $ligne['idE'];?>"><?php echo $ligne['pays'];?></option>
<?php
		}
?>

			<tr>
				<td><input type="submit" name="envoi" value="Ajouter"></td>
			</tr>
		</table>
	</fieldset>
</form>
<?php
	$requete=$bdd->query("SELECT idM, drapeau, pays, scoreA, eqA
		FROM equipe, matchs
		WHERE matchs.eqA = equipe.idE");



	$req=$bdd->query("SELECT idM, drapeau, pays, scoreB, eqB
		FROM equipe, matchs
		 WHERE matchs.eqB = equipe.idE");

	$req2=$bdd->query("SELECT DATE_FORMAT (dateM,'%d/%m/%Y') as dm
						FROM matchs");
?>
	<center>
		<caption><h3>Listes des matchs</h3></caption>
			<table id="tableau">
				<tr>
					<th>Date</th>
					<th width="10%"></th>
					<th>Equipe A</th>
					<th width="10%">VS</th>
					<th>Equipe B</th>
					<th>Score Final</th>
				</tr>
<?php
	while ($ligne=$requete->fetch())
		{
			$lig=$req->fetch();
			$lig2=$req2->fetch();
?>
				<tr>
					<td><?=$lig2['dm'];?></td>
					<td></td>
					<td><img src="<?php echo $ligne['drapeau'];?>" height="15%"> - <?php echo $ligne['pays'];?></td>
					<td></td>
					<td><img src="<?php echo $lig['drapeau'];?>" height="15%"> - <?php echo $lig['pays'];?></td>
					<td align="center"><?php echo $ligne['scoreA'];?> - <?php echo $lig['scoreB'];?></td>
					<td>
						<form action="traitement_modMat.php" method="post">
							<input type="hidden" name="dateM" id="dateM" value="<?php echo $lig2['dm'];?>">
							<input type="hidden" name="paysA" id="paysA" value="<?php echo $ligne['pays'];?>">
							<input type="hidden" name="paysB" id="paysB" value="<?php echo $lig['pays'];?>">
							<input type="hidden" name="id" value="<?php echo $lig['idM'];?>">
							<input type="submit" name="envoi" value="Modifier" />
						</form>
					</td>
					<td>
						<form action="traitement_supMat.php" method="post">
							<input type="hidden" name="id" id="id" value="<?php echo $lig['idM'];?>">
							<input type="submit" name="envoi" value="Supprimer" />
						</form>
					</td>
				</tr>

<?php
		}
?>
			</table>
		</center>
	</fieldset>
</form>
<?php
}
?>