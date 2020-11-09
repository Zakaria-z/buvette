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
<form action="insertion1.php" method="post">
	<fieldset>
		<legend>Ajout d'une Buvette</legend>
		<table>
			<tr>
				<td>Nom</td>
				<td><input type="text" name="nom" id="nom" placeholder="bsmey"></td>
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
				<td>N°Responsable</td>
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
				<td><input type="submit" name="envoi" value="Ajouter"></td>
			</tr>
		</table>
	</fieldset>
</form>
<?php

				$reponse = $bdd->query('SELECT nomB, emplacement, volontaire.nomV, idB, idV
										FROM buvette, volontaire
										WHERE volontaire.idV=buvette.responsable');
?>
	<center>
		<caption><h3>Liste des Buvettes</h3></caption>
			<table id="tableau">
				<tr>
					<th>Nom</th>
					<th></th>
					<th>Emplacement</th>
					<th></th>					
					<th>Responsable</th>
				</tr>
<?php
	while ($donnees = $reponse->fetch()) 
	{
?>
				<tr>
					<td><?php echo $donnees['nomB'];?></td>
					<td width="5%"></td>
					<td><?php echo $donnees['emplacement'];?></td>
					<td width="5%"></td>
					<td><?php echo $donnees['nomV'];?></td>
					<td>
						<form action="traitement_modBuv.php" method="post">
							<input type="hidden" name="idB" id="idB" value="<?php echo $donnees['idB'];?>">
							<input type="hidden" name="volontaire" id="volontaire" value="<?php echo $donnees['idV'];?>">
							<input type="hidden" name="buvette" id="buvette" value="<?php echo $donnees['nomB'];?>">
							<input type="submit" name="envoi" value="Modifier" />
						</form>
					</td>
					<td>
						<form action="traitement_supBuv.php" method="post">
							<input type="hidden" name="buv" id="buv" value="<?php echo $donnees['idB'];?>">
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