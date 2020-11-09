<?php
error_reporting(E_ALL & ~E_NOTICE);
try
    {
    	$bdd = new PDO('mysql:host=localhost;dbname=buv;charset=utf8', 'root', '');
    } catch(Exception $e) 
    	{
			die('Erreur : '.$e->getMessage());
		}

 ?>