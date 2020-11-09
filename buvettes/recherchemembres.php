<?php
	include ('connect.php');
	include('menu.html');
?>
<center>
	<h2>Rechercher un volontaire</h2>
</center>

<form action="resultatmembre.php" method="post">
	<fieldset>
		<legend><b>Formulaire de recherche</b></legend>
		<table>
			<tr>
				<td>Age Minimum :</td>
				<td><input type="number" name="agem" id="agem" min="15" max="99"></td>
			</tr>
			<tr>
				<td>Age Maximum :</td>
				<td><input type="number" name="ageM" id="ageM" min="15" max="99"></td>
			</tr>
			<tr>
				<td>Nom :</td>
				<td><input type="text" name="nom" id="nom" maxlength="50"></td>
			</tr>
			<tr>
				<td>Nombre minimal de participation :</td>
				<td><input type="number" name="part" id="part"></td>
			</tr>
			<tr>
				<td>Responsable :</td>
				<td><input type="radio" name="resp" id="resp" value="Non" checked>Non</td>
				<td><input type="radio" name="resp" id="resp" value="Oui">Oui</td>
			</tr>
			<tr>
				<td><input type="submit" name="envoi" value="Rechercher"></td>
			</tr>
		</table>
	</fieldset>
</form>