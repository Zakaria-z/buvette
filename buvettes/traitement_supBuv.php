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

	$idb = $_POST['buv'];

	echo $idb;
			
         $requete = "DELETE
					FROM buvette  
					WHERE idB = '$idb'";

			$resultat=$bdd->exec($requete);

		           if (!$resultat)
              		{
                		echo 'Problème en traitant la requête : '.$requete;
              		}
            		else
            		{
            			header("location: ajout_buvette.php");
					}
?>