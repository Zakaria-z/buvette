<?php
session_start();

		if (empty($_SESSION['mdp'])) 
		{
			header("location: prive.php");
		}
		else
		{

	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}
			
	include('connect.php');
	include('menu2.html');

	if (empty($_POST['dateM'])
	|| empty($_POST['equipeA']) 
	|| empty($_POST['equipeB']) )
	{
		echo 'Erreur de saisie. <a href="ajout_match.php">Réessayer</a>';
	}

		else
		{
			$dateM=$_POST['dateM'];
			$eqA=$_POST['equipeA'];
			$eqB=$_POST['equipeB'];
	
				$requete =  "INSERT INTO matchs (dateM, eqA, eqB)
							VALUES ('$dateM','$eqA','$eqB')";
			
				$resultat=$bdd->query($requete);

					if (!$resultat)
             			{
               				echo 'Problème en traitant la requête : '.$requete;
            			}
            				else
            					{
                				echo 'Nouveau match enregistré. <a href="ajout_match.php">Accueil.</a>';
					
								}
			}
}
?>