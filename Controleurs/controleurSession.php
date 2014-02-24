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
    $result = $this->user->getUser($login, $passe);
    
    if (empty($result))
    {
	    $result="Echec";
    }else
    {
	  	 $this->user->initDonneeUser($result);
/* 	  	 $_SESSION['user']= serialize($this->user); // serialisation marche pas encore */
		  	 $_SESSION['user']= $this->user; // serialisation marche pas encore
    }
    $vue = new Vue("Connexion");
    $vue->generer(array('result' => $result));
  }
  
  //Permet d'appeler le formulaire d'inscription
  public function inscription()
  {
	$vue = new Vue("inscription");
    $vue->generer(array());

	  
  }
  


  
}
