<?php

require_once 'Modeles/user.php';
require_once 'Vues/vue.php';

class ControleurSession {

  private $user;

  public function __construct() {
    $this->user = new User();
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
	  	 $_SESSION['user']= serialize($this->user); // serialisation marche pas encore
    }
    $vue = new Vue("Connexion");
    $vue->generer(array('result' => $result));
  }
  
  //Permet d'appeler le formulaire d'inscription
  public function formulaireDInscription()
  {
	$vue = new Vue("inscription");
    $vue->generer(array());

	  
  }
  


  
}
