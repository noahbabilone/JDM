<?php
include( "../config.php");
$erreur="Error ";
$succes="Success";
$champsVide="Empty";

if(isset($_POST['action']) && !empty($_POST['action'])){
	
	$action=$_POST['action'];

	if ($action=="session")
	{
		include("../Modeles/user.php");
		$user = new User();
		
		if (isset($_POST['methode']) && !empty($_POST['methode']))
		{
			$methode=$_POST['methode'];	
			if (isset($_POST['pseudo']) && !empty($_POST['pseudo'] ))
				$pseudo=htmlspecialchars($_POST['pseudo']);

			//Email
			if (isset($_POST['email']) && !empty($_POST['email']))
				$email=htmlspecialchars($_POST['email']);
				
			//Verification Méthode 		
			
			if($methode==="verificationLogin" && isset($pseudo))
			{
/* 				echo "verificationLogin"; */
				if ($user->userPseudoExiste($pseudo))
					echo  $erreur; 
				else
				 	echo  $succes;
				 								
			}else if($methode==="verificationEmail" && isset($email))
			{
/* 				echo "verificationEmail"; */
				if ($user->userEmailExiste($email))
					echo  $erreur; 
				else
				 	echo  $succes;
				 								
			}else
			{
				echo erreur;
			}
		
		}
	}else if ($action="jeu")
	{
		 
		require_once '../Modeles/partie.php';	
		require_once '../Modeles/mots.php';
		$score=0;
		$partie = new Partie();
		
		if (isset($_POST['methode']) && !empty($_POST['methode']))
		{
			$methode=$_POST['methode'];	
			
				if (isset($_POST['idMots']) && !empty($_POST['idMots']))
					$idMot=htmlspecialchars($_POST['idMots']);
				else
					$erreur.=" idMots ";
					
					
				if (isset($_POST['listesMots']) && !empty($_POST['listesMots']))
					$listesMots=explode(",",htmlspecialchars($_POST['listesMots']));
				else
					$erreur.=" listesMots ";


				if (isset($_POST['idJoueur']) && !empty($_POST['idJoueur']))
					$idJoueur=htmlspecialchars($_POST['idJoueur']);
				else
					$erreur.=" idJoueur ";
					
				if (isset($_POST['idPartie']) && !empty($_POST['idPartie']))
					$idPartie=htmlspecialchars($_POST['idPartie']);
				else
					$erreur.=" idPartie ";

			if ($methode=="resultatJeu")
			{
			
				if (isset($idMot) && isset($idJoueur) && isset($listesMots))
				{
				/***** Partie ****/
				
					if ($idMot != -1 && $idJoueur != -1)
					{
						
						if ($partie->jeuEncours($idJoueur,$idMot))
						{		
							//print_r($partie);
							foreach ($listesMots as $mot)
							{
								if (!empty($mot))
								{
									$score+=$partie->caluclScore($mot);		
								}
							}	
							
							$result = array('typeRetour' => $succes,
											'contenu' => "Vous avez gagné <span class='point'>".$score."</span> Points.",
											'idPartie' => $partie->getIdPartie(), 
											'idJoueur' => $partie->getIdJoueur(), 
											'score' => $partie->getScore(), 
											'niveau' => $partie->getNiveau()
										);
		 
							echo json_encode($result);
							
						}else
						{
							 echo $erreur;
						}	//echo $erreur. ' de Récupération de la partie encours';
					}else
					{	
						echo $erreur;				
						}
												
				}else{
					
					$result = array('typeRetour' => $champsVide, 'contenu' => "Vous n'avez rien proposé... je suis sûr que vous allez y arriver.", "champsVide" => $erreur);
					echo json_encode( $result);
				}  
				
					
			}else if ($methode=='btnSuivant' && isset($idPartie))
			{
				//if ( $partie->getPartiesByIdPartie($idPartie))
				//{
					 $partie->getMot()->motAleaPartie();
					$result= array("typeRetour"=> $succes,
									"contenu" =>"",
									"mot" => array("id"=> $partie->getMot()->getId(),
													"libelle"=>  $partie->getMot()->getLibelle())
									);
					
					
				//}else
				//	$result = array('typeRetour' => $succes,'contenu' => "Impossible de récupérer la partie");

							
				echo json_encode($result);	
			}else
			{
				echo json_encode(array('typeRetour' => $erreur, 'contenu' => "Methode inexistant"));
				
			}
			
			
		}else// methode
		{
			$result = array('typeRetour' => $erreur, 'contenu' => "Methode vide");
			echo json_encode( $result);
			
		}
	
			//echo 'test';
		
	}else {// Jeu
			//echo 'Erreur ations';
			echo $erreur;
	}
	
		
	
}// fin action
else
{
	echo 'Erreur';
	
}





// fin de la 