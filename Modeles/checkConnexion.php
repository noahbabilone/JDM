<?php
	require_once('config.php'); //contient les variables globals essentielles pour site
	
	if (isset($_SESSION['id']) && !empty($_SESSION['id'])){
		require_once ("Modeles/user.php"); // require_once inclure le fichier user.php si il n'est pas encore inclut 
		$user = new User();
		$user->getDataUserByID($_SESSION['id']);
	}

?>