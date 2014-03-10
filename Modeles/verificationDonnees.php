<?php
include( "../config.php");

if(isset($_POST['action']) && !empty($_POST['action'])){
	
	
	if($_POST['action']=='verificationLogin' && isset($_POST['login']) &&  !empty($_POST['login']))
	{
		include("user.php");
		$user= new User();
		$login =$_POST['login'];
		$result=$user->userExiste($login);
		
		if($result)
			echo 'succes';
		else	
			echo 'erreur';	
	}else
	{
		echo "action non trouvé";
	}
	
	
	
}// fin action
else
{
	echo 'Erreur';
	
}
