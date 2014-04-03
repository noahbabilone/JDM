<?php

require_once 'Modeles/bloc.php';
require_once 'Vues/vue.php';
require_once ("Modeles/user.php");		
		
class ControleurAccueil {

  private $bloc;
  private $user;

  public function __construct() {
    $this->bloc = new Bloc();
    $this->user = new User();

  }

  // Affiche la liste des blocs
  public function accueil($id=0) {
    $blocs = $this->bloc->getBlocs();
    $vue = new Vue("Accueil");
    
    if ($id !=0){
    	$this->user->getDataUserByID($id);
    }
    $vue->generer(array('blocs' => $blocs,"user"=>$this->user));
  }
  
  public  function erreurPage($msgErreur=null) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }

  
}
