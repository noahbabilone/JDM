<?php

require_once 'Modeles/Classement.php';
require_once 'Vues/vue.php';

class ControleurClassement {

	private $Classement;

	public function __construct() {
    	$this->Classement = new Classement();
 	}

	public function classer(){
		$classes = $this->Classement->getClassement();
		$vue = new Vue("classement");
	    $vue->generer(array('classes' => $classes));
	}
}

?>