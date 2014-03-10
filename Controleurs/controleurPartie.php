<?php
require_once 'Modeles/jeu.php';
require_once 'Vues/vue.php';

class ControleurPartie {
	

	public function __construct() {
	
	}
	
	public function Jouer(){
		$vue = new Vue("Jeu");
	    $vue->generer(array());
	}
	

} // fin classe jeu