<?php
	include('connect.php');
	include('menu.html');
	include('fonctions.php');

	$idMat=$_POST['id'];
	$buv=$_POST['buv'];
	$ouv=$_POST['ouv'];

	if ($ouv=="non") 
	{
		$requete="DELETE
				FROM estouverte
				WHERE idM='$idMat'
				AND idB='$buv'";
	}
	else
	{
		$requete="INSERT INTO estouverte (idB, idM)
				VALUES ($buv, $idMat)";
	}

	$resultat=$bdd->exec($requete);

		           if (!$resultat)
              		{
                		echo 'Problème en traitant la requête : '.$requete;
              		}
            		else
            		{
            			header("location: affectations.php");
					}
?>