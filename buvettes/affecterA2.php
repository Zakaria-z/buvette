<?php
	include('connect.php');
	include('menu.html');
	include('fonctions.php');

	$idMat=$_POST['id'];
	$vol=$_POST['resp'];
	$buv=$_POST['buv'];

	/*echo $idMat;
	echo "<br>";
	echo $vol;
	echo "<br>";
	echo $buv;*/

	$requete="UPDATE buvette
				SET responsable='$vol'
				WHERE idB='$buv'";

		           if (!$resultat)
              		{
                		echo 'Problème en traitant la requête : '.$requete;
              		}
            		else
            		{
            			header("location: affectations.php");
					}
?>