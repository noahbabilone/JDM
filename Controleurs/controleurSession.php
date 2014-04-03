<?php

require_once 'Modeles/user.php';
require_once 'Vues/vue.php';

class ControleurSession {

  private $user;

  public function __construct() {
    $this->user = new User();
  }
  
  
   public function connexion() {
    
    
	if (isset($_POST['login']) && isset($_POST['passe']) && !empty($_POST['login']) && ! empty($_POST['passe']))
	{
		$login=mysql_real_escape_string($_POST['login']);
		$passe=md5(mysql_real_escape_string($_POST['passe']));
		$this->connexionUtilisateur($login,$passe);
	}
	else
	{
		$this->formulaireDeConnexion();
	
	}
  }

  //Permet d'appeler le formulaire de connexion
  public function formulaireDeConnexion() {
    $vue = new Vue("Connexion");
    $vue->generer(array());
  }
  
  //Permet de vérifier la validiter de connexion
  public function connexionUtilisateur($login, $passe) {
    
    $result="";
    if ($this->user->getDataUserByLoginPasse ($login, $passe))
    {
	  	 $_SESSION['id']=$this->user->getId();
		  	 
    }else {
   		 $result="Echec";
    }
     
    $vue = new Vue("Connexion");
    $vue->generer(array('result' => $result));
  }
  
  //Permet d'appeler le formulaire d'inscription
  public function inscription()
  {
  	$result="";
  	// vérification champs est faite dans le javascript
    if (isset($_POST['inputPseudo']) && isset($_POST['inputPassword']) && isset($_POST['inputEmail']) &&
    	!empty($_POST['inputPseudo']) && !empty($_POST['inputPassword']) && !empty($_POST['inputEmail']))
  	{
  		
  		$login=mysql_real_escape_string($_POST['inputPseudo']);
  		$email=mysql_real_escape_string($_POST['inputEmail']);
  		$passe=mysql_real_escape_string($_POST['inputPassword']);
   		$result=$this->user->ajoutUser($login,$email,$passe);
   
  		//var_dump($result);
	  	
  	}
  	
	$vue = new Vue("inscription");
    $vue->generer(array('result' => $result));

	  
  }
  
}
