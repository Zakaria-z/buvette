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
	include('fonctions.php');

?>
<form action="insertion3.php" method="post">
	<fieldset>
		<legend>Ajout d'un Volontaire</legend>
		<table>
			<tr>
				<td>Nom</td>
				<td><input type="text" name="nom"></td>
			</tr>
			<tr>
				<td>Date de Naissance</td>
				<td><input type="date" name="age"></td>
			</tr>
			<tr>
				<td><input type="submit" name="envoi" value="Ajouter"></td>
			</tr>
		</table>
	</fieldset>
</form>

</form>
<?php

				$reponse = $bdd->query('SELECT *
										FROM volontaire');
?>
	<center>
		<caption><h3>Liste des Volontaires</h3></caption>
			<table id="tableau">
				<tr>
					<th>Nom</th>
					<th></th>
					<th>Age</th>
				</tr>
<?php
	while ($donnees = $reponse->fetch()) 
	{
?>
				<tr>
					<td><?php echo $donnees['nomV'];?></td>
					<td width="5%"></td>
					<td><?php 
						$date_naissance=$donnees['naissance'];
						$age = age($date_naissance);
						echo $age;?></td>
					<td>
						<form action="traitement_modVon.php" method="post">
							<input type="hidden" name="id" value="<?php echo $donnees['idV'];?>">
							<input type="hidden" name="nom" value="<?php echo $donnees['nomV'];?>">
							<input type="submit" name="envoi" value="Modifier" />
						</form>
					</td>
					<td>
						<form action="traitement_supVon.php" method="post">
							<input type="hidden" name="id" value="<?php echo $donnees['idV'];?>">
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