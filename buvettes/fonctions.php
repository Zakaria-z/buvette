<?php
/* Fonction qui permet d'afficher les matchs */
function AfficheMatch()
{
	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}

		$requeteC = $bdd->query("SELECT count(distinct(estouverte.idB)) AS nbB
								FROM estouverte, matchs
								WHERE estouverte.idM = matchs.idM
								GROUP BY matchs.idM");

		$requeteD = $bdd->query("SELECT count(distinct(estpresent.idV)) AS nbV
								FROM matchs, estpresent
								WHERE estpresent.idM = matchs.idM
								GROUP BY matchs.idM");

	$requeteA=$bdd->query("SELECT drapeau, pays, scoreA, eqA, idM
							FROM equipe, matchs
							WHERE matchs.eqA = equipe.idE");

	$requeteB=$bdd->query("SELECT drapeau, pays, scoreB, eqB
							FROM equipe, matchs
							WHERE matchs.eqB = equipe.idE");	
?>
	<center>
		<caption><h3>Listes des matchs</h3></caption>
			<table id="tableau">
				<tr>
					<th>Equipe A</th>
					<th width="100px">VS</th>
					<th>Equipe B</th>
					<th>Score Final</th>
					<th></th>
					<th>Buvettes ouverte</th>
					<th>Volontaires présents</th>
				</tr>
<?php
	while($ligneA=$requeteA->fetch())
	{
		$ligneB=$requeteB->fetch();
		$ligneC=$requeteC->fetch();
		$ligneD=$requeteD->fetch();
?>
				<tr>
					<td><img src="<?php echo $ligneA['drapeau'];?>" height="15%"> - <?php echo $ligneA['pays'];?></td>
					<td></td>
					<td ><img src="<?php echo $ligneB['drapeau'];?>" height="15%"> - <?php echo $ligneB['pays'];?></td>
					<td align="center"><?php echo $ligneA['scoreA'];?> - <?php echo $ligneB['scoreB'];?></td>
					<td></td>
					<td align="center"><?php echo $ligneC['nbB']; ?></td>
					<td align="center"><?php echo $ligneD['nbV']; ?></td>
				</tr>
<?php
	}
}
?>
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php
function AfficheVolontaire()
{
	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}

	$requete = $bdd->query("SELECT count(distinct(estpresent.idM)) AS nbV, nomV, naissance 
							FROM volontaire, estpresent, matchs
        					WHERE estpresent.idM = matchs.idM
        					AND estpresent.idV = volontaire.idV
        					GROUP BY nomV
        					ORDER BY 1 DESC");
?>
	<center>
		<caption><h3>Top 5 des Volontaires</h3></caption>
			<table id="tableau">
				<tr>
					<th>Nom</th>
					<th>Âge</th>
					<th>Nombre de participations</th>
				</tr>
<?php
	for ($i=0; $i < 5; $i++) 
	{
		$ligne=$requete->fetch();
			$date_naissance = $ligne['naissance'];
			$age = age($date_naissance);

?>
				<tr>
					<td align="center"><?=$ligne['nomV'];?></td>
					<td align="center"><?php echo $age;?></td>
					<td align="center"><?=$ligne['nbV'];?></td>
				</tr>		
<?php
	}
}
?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php
function AfficheBuvette()
{
	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}

	$requete=$bdd->query("SELECT nomB, emplacement, count(distinct(estpresent.idV)) as nb
							FROM buvette, estouverte, estpresent
        					WHERE buvette.idB = estouverte.idB
        					AND estpresent.idB = estouverte.idB
        					GROUP BY estouverte.idB
        					ORDER BY 3 DESC");
?>
	<center>
		<caption><h3>Top 5 des Buvettes</h3></caption>
			<table id="tableau">
				<tr>
					<th>Nom</th>
					<th>Emplacement</th>
					<th>Nombre de volontaires</th>
				</tr>
<?php
	for ($cpt=0; $cpt < 5; $cpt++) 
	{
		$ligne=$requete->fetch();
?>
				<tr>
					<td align="center"><?=$ligne['nomB'];?></td>
					<td align="center"><?=$ligne['emplacement'];?></td>
					<td align="center"><?=$ligne['nb'];?></td>
			</tr>		
<?php 
	}
}
?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php
function StatsMatch()
{
	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}

	$requete=$bdd->query("SELECT idM, drapeau, pays, scoreA, eqA
		FROM equipe, matchs
		WHERE matchs.eqA = equipe.idE");

	$requeteB=$bdd->query("SELECT idM, drapeau, pays, scoreB, eqB
		FROM equipe, matchs
		 WHERE matchs.eqB = equipe.idE");
?>
	<center>
		<caption><h3>Statistiques des matchs</h3></caption>
			<table id="tableau">
				<tr>
					<th>Numéro Match</th>
					<th>Equipe A</th>
					<th>VS</th>
					<th>Equipe B</th>
					<th></th>
					<th></th>
				</tr>
<?php
	while ($ligne=$requete->fetch())
		{
			$lig=$requeteB->fetch()
?>
				<tr>
					<td align="center"><?=$ligne['idM'];?></td>
					<td><img src="<?=$ligne['drapeau'];?>" height="15%"> - <?=$ligne['pays'];?></td>
					<td align="center" width="20%"></td>
					<td><img src="<?=$lig['drapeau'];?>" height="15%"> - <?=$lig['pays'];?></td>
					<td><form name="x" action="stats.php" method="post">
						<input type="hidden" name="idm" id="idm" value="<?php echo $ligne['idM'];?>">
						<input type="submit" value="Voir statistiques">
						</form>
					</td>
				</tr>		
<?php
		}
}
?>

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php
function matchA()
{
	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}

	$requete=$bdd->query("SELECT idM, drapeau, pays, scoreA, eqA
		FROM equipe, matchs
		WHERE matchs.eqA = equipe.idE");

	$requeteB=$bdd->query("SELECT idM, drapeau, pays, scoreB, eqB
		FROM equipe, matchs
		 WHERE matchs.eqB = equipe.idE");
?>
	<center>
		<caption><h3>Listes des matchs</h3></caption>
			<table id="tableau">
				<tr>
					<th>Equipe A</th>
					<th width="10%">VS</th>
					<th>Equipe B</th>
					<th>Score Final</th>
				</tr>
<?php
	while ($ligne=$requete->fetch())
		{
			$lig=$requeteB->fetch();
?>
				<tr>
					<td><img src="<?=$ligne['drapeau'];?>" height="15%"> - <?=$ligne['pays'];?></td>
					<td></td>
					<td><img src="<?=$lig['drapeau'];?>" height="15%"> - <?=$lig['pays'];?></td>
					<td align="center"><?=$ligne['scoreA'];?> - <?=$lig['scoreB'];?></td>
					<td>
						<form action="affecterA.php" method="post">
							<input type="hidden" name="paysA" id="paysA" value="<?php echo $ligne['pays'];?>">
							<input type="hidden" name="paysB" id="paysB" value="<?php echo $lig['pays'];?>">
							<input type="hidden" name="mat" id="mat" value="<?php echo $ligne['idM'];?>">
							<input type="submit" name="envoi" value="Affecter" />
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

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php
function matchB()
{
	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}

	$requete=$bdd->query("SELECT idM, drapeau, pays, scoreA, eqA
		FROM equipe, matchs
		WHERE matchs.eqA = equipe.idE");

	$req=$bdd->query("SELECT idM, drapeau, pays, scoreB, eqB
		FROM equipe, matchs
		 WHERE matchs.eqB = equipe.idE");
?>
	<center>
		<caption><h3>Listes des matchs</h3></caption>
			<table id="tableau">
				<tr>
					<th>Equipe A</th>
					<th width="10%">VS</th>
					<th>Equipe B</th>
					<th>Score Final</th>
				</tr>
<?php
	while ($ligne=$requete->fetch())
		{
			$lig=$req->fetch();
?>
				<tr>
					<td><img src="<?=$ligne['drapeau'];?>" height="15%"> - <?=$ligne['pays'];?></td>
					<td></td>
					<td><img src="<?=$lig['drapeau'];?>" height="15%"> - <?=$lig['pays'];?></td>
					<td align="center"><?=$ligne['scoreA'];?> - <?=$lig['scoreB'];?></td>
					<td>
						<form action="affecterB.php" method="post">
							<input type="hidden" name="paysA" id="paysA" value="<?php echo $ligne['pays'];?>">
							<input type="hidden" name="paysB" id="paysB" value="<?php echo $lig['pays'];?>">
							<input type="hidden" name="id" value="<?php echo $lig['idM'];?>">
							<input type="submit" name="envoi" value="Affecter" />
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

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php
function matchC()
{

	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}
			
	$requete=$bdd->query("SELECT idM, drapeau, pays, scoreA, eqA
		FROM equipe, matchs
		WHERE matchs.eqA = equipe.idE");

	$req=$bdd->query("SELECT idM, drapeau, pays, scoreB, eqB
		FROM equipe, matchs
		 WHERE matchs.eqB = equipe.idE");

?>
	<center>
		<caption><h3>Listes des matchs</h3></caption>
			<table id="tableau">
				<tr>
					<th>Equipe A</th>
					<th width="10%">VS</th>
					<th>Equipe B</th>
					<th>Score Final</th>
				</tr>
<?php
	while ($ligne=$requete->fetch())
		{
			$lig=$req->fetch();
?>
				<tr>
					<td><img src="<?=$ligne['drapeau'];?>" height="15%"> - <?=$ligne['pays'];?></td>
					<td></td>
					<td><img src="<?=$lig['drapeau'];?>" height="15%"> - <?=$lig['pays'];?></td>
					<td align="center"><?=$ligne['scoreA'];?> - <?=$lig['scoreB'];?></td>
					<td>
						<form action="affecterC.php" method="post">
							<input type="hidden" name="paysA" id="paysA" value="<?php echo $ligne['pays'];?>">
							<input type="hidden" name="paysB" id="paysB" value="<?php echo $lig['pays'];?>">
							<input type="hidden" name="id" value="<?php echo $lig['idM'];?>">
							<input type="submit" name="envoi" value="Affecter" />
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

<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->
<!-- ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////// -->

<?php
function age($date_naissance)
{
    $age=0;
    $age = date('Y') - $date_naissance;
    if (date('md') < date('md', strtotime($date_naissance)))
    {
        return $age - 1;
    }
    return $age;
}
?>