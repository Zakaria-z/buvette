<?php
session_start();

		if (empty($_SESSION['mdp'])) 
		{
			header("location: prive.php");
		}
		else
		{
	include('connect.php');
	include('menu2.html');

	    try
    	{
    		$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    	} catch(Exception $e) 
    		{
				die('Erreur : '.$e->getMessage());
			}

	if (empty($_POST['nom'])
	|| empty($_POST['age']) )
	{
		echo 'Erreur de saisie. <a href="ajout_volontaire.php">Réessayer</a>';
	}

		else
		{
			$nomV=$_POST['nom'];
			$date_naissance=$_POST['age'];

				$requete="INSERT INTO volontaire (nomV, naissance)
									VALUES ('$nomV','$date_naissance')";

						$resultat=$bdd->exec($requete);

					if (!$resultat)
             			{
               				echo 'Problème en traitant la requête : '.$requete;
            			}
            				else
            					{
                				echo 'Nouveau volontaire enregistré. <a href="ajout_volontaire.php">Accueil.</a>';
					
								}
				}
}
?>