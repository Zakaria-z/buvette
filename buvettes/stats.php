<?php
	include ('connect.php');
	include ('menu.html');
	include('fonctions.php');

	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}

	$idM=$_POST['idm'];
	$requete=$bdd->query("SELECT nomB, emplacement, nomV, matchs.idM
						FROM buvette, matchs, volontaire, estouverte
						WHERE matchs.idM = '$idM'
						AND buvette.responsable=volontaire.idV
						AND buvette.idB=estouverte.idB
						AND estouverte.idM=matchs.idM
						ORDER BY matchs.idM ASC");

	$requeteB=$bdd->query("SELECT nomV, naissance, hdeb, hfin, nomB, matchs.idM
							FROM buvette, volontaire, estpresent, matchs
							WHERE matchs.idM = '$idM'
							AND buvette.idB=estpresent.idB
							AND estpresent.idM=matchs.idM
							AND volontaire.idV=estpresent.idV
							ORDER BY nomB ASC");
?>
			</table>
		</center>

		<center>
			<caption><h3>Listes des buvettes</h3></caption>
			<table id="tableau">
				<tr>
					<th>Buvette</th>
					<th>Emplaçement</th>
					<th>Responsable</th>
				</tr>
<?php
	while ($lig2=$requete->fetch())
		{
?>
				<tr>
					<td align="center"><?php echo $lig2['nomB'];?></td>
					<td align="center"><?php echo $lig2['emplacement'];?></td>
					<td align="center"><?php echo $lig2['nomV'];?></td>
				</tr>
<?php
		}

?>
			</table>
		</center>
			
		<center>
			<caption><h3>Listes des volontaires</h3></caption>
			<table id="tableau">
				<tr>
					<th>Buvette</th>
					<th>Nom</th>
					<th>Âge</th>
					<th>Heure début</th>
					<th>Heure fin</th>
				</tr>
<?php
	while ($lig3=$requeteB->fetch())
		{
			$date_naissance=$lig3['naissance'];
			$age=age($date_naissance);
?>
				<tr>
					<td align="center"><?=$lig3['nomB'];?></td>
					<td align="center"><?=$lig3['nomV'];?></td>
					<td align="center"><?php echo $age;?></td>
					<td align="center"><?=$lig3['hdeb'];?>h</td>
					<td align="center"><?=$lig3['hfin'];?>h</td>
				</tr>
	
<?php 
		}
?>
			</table>
		</center>