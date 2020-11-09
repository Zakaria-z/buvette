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

	$idMat = $_POST['id'];
			
	if ( empty($_POST['dateM'])
		|| empty($_POST['eqA'])
		|| empty($_POST['eqB'])
		|| empty($_POST['scoreA'])
		|| empty($_POST['scoreB']) ) 
	{
		echo 'Erreur de saisie. <a href="ajout_match.php">Accueil</a>';	
	}
		else
		{
			$Mdate = $_POST['dateM'];
			$eqA = $_POST['eqA'];
			$eqB = $_POST['eqB'];
			$SA = $_POST['scoreA'];
			$SB = $_POST['scoreB'];

					$requete = "UPDATE matchs
								SET dateM = '$Mdate', eqA = '$eqA', eqB = '$eqB', scoreA = '$SA', scoreB = '$SB'
								WHERE idM = '$idMat'";

					$resultat=$bdd->exec($requete);

		           if (!$resultat)
              		{
                		echo 'Problème en traitant la requête : '.$requete;
              		}
            		else
            		{
                	echo 'Match modifié. <a href="ajout_match.php">Accueil</a>';
					}
          }
?>