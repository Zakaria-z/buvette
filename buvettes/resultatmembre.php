<?php
	include ('connect.php');
	include ('fonctions.php');
	include ('menu.html');
	error_reporting (E_ALL ^ E_NOTICE);

	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}
/* -- Ajouter des valeurs par défaut
DFT Resp = Non
DFT Part == 0 -- */

		if (empty($_POST['nom'])) 
		{
			$nom='%';
		}
		else
		{
			$nom=$_POST['nom'];
		}
	
		if (empty($_POST['agem'])) 
		{
			$agem=16;
		}
		else
		{
			$agem=$_POST['agem'];
		}

		if (empty($_POST['ageM'])) 
		{
			$ageM=99;
		}
		else
		{
			$ageM=$_POST['ageM'];
		}

		if (empty($_POST['part'])) 
		{
			$part=0;
		}
		else
		{
			$part=$_POST['part'];
		}
		
		$resp=$_POST['resp'];	
		$max= date('Y') - $agem;
		$min= date('Y') - $ageM;

		if ($resp=='Oui') 
		{

/*
								SELECT nomV, naissance, count(distinct estpresent.idM) as nbpart
									FROM volontaire, estpresent
        							WHERE volontaire.idV=estpresent.idV
        							AND nomV LIKE '%'
        							AND year(naissance) BETWEEN 1900 AND 2050
        							GROUP BY nomV, naissance
        							HAVING nbpart >= 0
        							ORDER BY 1 ASC;
*/
			$requete=$bdd->query("SELECT nomV, naissance, count(distinct estpresent.idM) as nbpart
									FROM volontaire, estpresent, buvette
        							WHERE volontaire.idV=buvette.responsable
        							AND volontaire.idV=estpresent.idV
        							AND nomV LIKE '$nom'
        							AND year(naissance) BETWEEN '$min' AND '$max'
        							GROUP BY nomV, naissance
        							HAVING nbpart >= '$part'
        							ORDER BY 1 ASC");
		}
		else
		{
			$requete=$bdd->query("SELECT nomV, naissance, count(distinct estpresent.idM) as nbpart
									FROM volontaire, estpresent
        							WHERE volontaire.idV=estpresent.idV
        							AND nomV LIKE '$nom'
        							AND year(naissance) BETWEEN '$min' AND '$max'
        							GROUP BY nomV, naissance
        							HAVING nbpart >= '$part'
        							ORDER BY 1 ASC");			
		}
?>
	<center>
		<caption><h3>Recherche</h3></caption>
			<table id="tableau">
				<tr>
					<th>Nom</th>
					<th>Âge</th>
				</tr>
<?php
/*
	fetchAll = prendre tous les résultats d'un seul coup
*/
		while($ligne=$requete->fetch())
			{
				$date_naissance=$ligne['naissance'];
				$age=age($date_naissance);
?>
				<tr>
					<td align="center"><?php echo $ligne['nomV'];?></td>
					<td><?php echo $age;?></td>
				</tr>		
<?php 
			}
?>
			</table>
		</center>