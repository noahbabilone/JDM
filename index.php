<?php
session_start();

require "config.php"; //Inclusion du fichier contenant les constantes indispensables au fonctionnement de l'application


if( isset( $_GET["controleur"] ) && isset( $_GET["action"] ) && !empty( $_GET["controleur"] ) && !empty( $_GET["action"] ) ){
	$controleurName = "controleur" . ucfirst($_GET["controleur"]);// Nom du contrôleur demandé
		if( file_exists("Controleurs/".$controleurName.'.php') ){ //Vérification: contrôleur demandé existe
		
			include "Controleurs/".$controleurName.'.php'; // Inclusion du contrôleur demandé
			$controleur = new $controleurName();// Instanciation du contrôleur demandé
			
			if( method_exists( $controleur , $_GET["action"] ) ){ // Vérification: la méthode demandée existe dans le contrôleur

				if( isset( $_GET["params"] ) && !empty( $_GET["params"] ) ){
					$controleur->$_GET["action"]( $_GET["params"] ); // Exécution de l'action demandée avec des paramètres
				}
				else{
					$controleur->$_GET["action"](); // Exécution de l'action demandée sans paramètres
				}
			}else
			{
				$erreur = "Impossible d'effectuer l'action demandée";
			}

		}else {
				$erreur="Oups, cette page n'est malheuresement pas disonible !!";			
		}	
}


if( empty( $_GET["controleur"] ) || empty( $_GET["action"] ) || !empty($erreur) ) {
	
	require_once 'Controleurs/controleurAccueil.php';
	 $ctrlAccueil = new ControleurAccueil();
	 
	 if( !empty($erreur))
		$ctrlAccueil->erreurPage($erreur); 
	 else 
	 	$ctrlAccueil->accueil();

}