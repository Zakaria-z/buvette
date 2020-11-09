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

	if (empty($_POST['nom'])
	|| empty($_POST['empl']) 
	|| empty($_POST['resp']) )
	{
		echo 'Erreur de saisie. <a href="ajout_buvette.php">Réessayer</a>';
	}

		else
		{
			$nom=$_POST['nom'];
			$empl=$_POST['empl'];
			$resp=$_POST['resp'];

				$requete =  "INSERT INTO buvette (nomB, emplacement, responsable)
							VALUES ('$nom','$empl','$resp')";
			
					$resultat=$bdd->query($requete);

					if (!$resultat)
             			{
               				echo 'Problème en traitant la requête : '.$requete;
            			}
            				else
            					{
                				echo 'Nouvelle buvette enregistrée. <a href="ajout_buvette.php">Accueil.</a>';
					
								}
		}
}
?>