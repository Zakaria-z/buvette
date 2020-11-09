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

	$idVol = $_POST['id'];
			
	if (empty($_POST['nomVol'])
		|| empty($_POST['nais']) ) 
	{
		echo 'Erreur de saisie. <a href="ajout_volontaire.php">Accueil</a>';	
	}
		else
		{
			$nom = $_POST['nomVol'];
			$date_naissance = $_POST['nais'];

					$requete ="UPDATE volontaire
								SET nomV = '$nom', naissance = '$date_naissance'
								WHERE idV = '$idVol'";

					$resultat=$bdd->exec($requete);

		           if (!$resultat)
              		{
                		echo 'Problème en traitant la requête : '.$requete;
              		}
            		else
            		{
                	echo 'Volontaire modifié(e). <a href="ajout_volontaire.php">Accueil</a>';
					}
          }
?>