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

	$idBuv = $_POST['idb'];
			
	if (empty($_POST['nbuv'])
		|| empty($_POST['empl'])
		|| empty($_POST['resp']) ) 
	{
		echo 'Erreur de saisie. <a href="ajout_buvette.php">Accueil</a>';	
	}
		else
		{
			$nom_buv = $_POST['nbuv'];
			$lieu = $_POST['empl'];
			$nom = $_POST['resp'];

			echo "$nom_buv A";
			echo "<br>";
			echo "$lieu B";
			echo "<br>";
			echo "$nom";

					$requete = 'UPDATE buvette
								SET nomB = "$nom_buv", emplacement = "$lieu", responsable = "$nom"
								WHERE idB = "$idBuv"';

					$resultat=$bdd->query($requete);

		           if (!$resultat)
              		{
                		echo 'Problème en traitant la requête : '.$requete;
              		}
            		else
            		{
                	echo 'Buvette modifiée. <a href="ajout_buvette.php">Accueil</a>';
					}
          }
?>