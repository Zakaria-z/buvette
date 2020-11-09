<?php
	include('connect.php');
	include('menu.html');
	include('fonctions.php');

	$idMat=$_POST['id'];
	$vol=$_POST['vol'];
	$buv=$_POST['buv'];
	$deb=$_POST['deb'];
	$fin=$_POST['fin'];

	$requete="INSERT INTO estpresent (idV, idB, idM, hdeb, hfin)
				VALUES ('$vol', '$buv', '$idMat', '$deb', '$fin')";

		           if (!$resultat)
              		{
                		echo 'Problème en traitant la requête : '.$requete;
              		}
            		else
            		{
            			header("location: affectations.php");
					}
?>