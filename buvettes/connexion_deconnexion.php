<?php

	if (isset($_SESSION['mdp']))
	{
		include('form_deconnexion.html');
	}
	else
	{
		include('form_connexion.html');
	}
?> 