<?php
require_once 'Vues/vue.php';
require_once "Modeles/user.php";		
require_once "Modeles/partie.php";		
require_once 'Modeles/mots.php';

class ControleurPartie {
	
  private $user;
  private $dataPartie;
  private $jeu;
  

	public function __construct() {
	    $this->user = new User();
	    $this->jeu = new Partie();
	    $this->dataPartie=array();
	}
	
	public function Jouer($id=0){
		$vue = new Vue("Jeu");
		if ($id !=0){
	    	$this->user->getDataUserByID($id);
	    	$this->dataPartie["user"]=$this->user;
	    }
	    
	    $this->dataPartie["jeu"]=$this->jeu;	    
	    $vue->generer($this->dataPartie);
	}
	

} // fin classe jeu