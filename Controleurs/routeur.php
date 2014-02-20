<?php

require_once 'Controleurs/controleurAccueil.php';
require_once 'Vues/vue.php';

class Routeur {

  private $ctrlAccueil;
  private $ctrlConnexion;
  private $ctrl;
  private $erreur ="Oups, cette page n'est malheuresement pas disponible.";

  public function __construct() {
    $this->ctrlAccueil = new ControleurAccueil();
  }

  // Traite une requête entrante
  public function routerRequete() {
    try {
      if (isset($_GET['action']) && !empty($_GET['action']) ) 
      {
      
	      	if (isset($_GET['module']) && !empty($_GET['module']) && $_GET['module']=="utilisateur")
	      	{		include 'Controleurs/controleurSession.php';
		      		$this->ctrlConnexion = new ControleurSession();
		      		
		      	    if ( $_GET['action']=="connexion" ) // page connexion
		      	    {
		      	    	      		
				      		if (isset($_POST['login']) && isset($_POST['passe']) 
				      			&& !empty($_POST['login']) && ! empty($_POST['passe']))
					      	{
						      	
						      $login=mysql_real_escape_string($_POST['login']);
						      $passe=md5(mysql_real_escape_string($_POST['passe']));
						      $this->ctrlConnexion->connexionUtilisateur($login,$passe);
					      	}
					      	else
					      	{
						      $this->ctrlConnexion->formulaireDeConnexion();
			
					      	}
				      } else if ( $_GET['action']=="inscription" ) {
					      
					       $this->ctrlConnexion->formulaireDInscription();

				      } else {
					      
					      $this->erreurPage();					      
				      }	 			       
	       }else if ($_GET['action']=="autres" ){
	       		echo "a finir"; /***********FIFNINR*******/
	       }else{
		       $this->erreurPage();
	       	}
	      
	    } else {  // aucune action définie : affichage de l'accueil
        
        $this->ctrlAccueil->accueil();
      }
    }
    catch (Exception $e) {
      $this->erreurPage($e->getMessage());
    }
  }

  // Affiche une erreur
  private function erreurPage($msgErreur=null) {
    $vue = new Vue("Erreur");
    $vue->generer(array('msgErreur' => $msgErreur));
  }
}
