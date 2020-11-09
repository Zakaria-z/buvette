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

	$id = $_POST['id'];
			
            $requete = "DELETE
						FROM volontaire  
						WHERE idV = $id";

			$resultat=$bdd->exec($requete);

		           if (!$resultat)
              		{
                		echo 'Problème en traitant la requête : '.$requete;
              		}
            		else
            		{
            			header("location: ajout_volontaire.php");
					}
?>