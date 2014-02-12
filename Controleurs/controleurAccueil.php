<?php

require_once 'Modeles/bloc.php';
require_once 'Vues/vue.php';

class ControleurAccueil {

  private $bloc;

  public function __construct() {
    $this->bloc = new Bloc();
  }

  // Affiche la liste des blocs
  public function accueil() {
    $blocs = $this->bloc->getBlocs();
    $vue = new Vue("Accueil");
    $vue->generer(array('blocs' => $blocs));
  }
  
/*
  public function accueil() {
	   $bloc= $this->bloc->getPermierBloc();
	   $vue = new Vue("Accueil");
       $vue->generer(array('bloc' => $bloc));;
  }
*/
  
  public function getIdblocPrecedent($idbloc)
  {
 	  return $this->bloc->blocPrecedent($idbloc);   
  }

  public function getIdbloSuivant($idbloc)
  {
 	  return $this->bloc->blocSuivant($idbloc);   
  }
  
}
