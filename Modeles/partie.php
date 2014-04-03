<?php
require_once  'bd.php';
require_once 'mots.php';

//	require_once 'Modeles/bd.php';	
//xxz	require_once 'Modeles/mots.php';
	/*
	
	// Pour le test
	require_once 'bd.php';
	require_once 'mots.php';
	require_once "../config.php";
	*/

class Partie extends BD {

	private $idPartie;
	private $idJoueur;
	private $score;
	private $niveau;
	private $mot;
	
	public function __construct() {
		$this->idPartie =-1;
		$this->idJoueur=-1;
		$this->niveau=0;
		$this->score =0;
		$this->mot= new Mots();

	}
	
	
	
	public function initDonneesPartie ($valeurs=array())
	{
		if (!empty($valeurs))
			$this->hydratePartie($valeurs);
	}
	
	public function hydratePartie ($donnees)
	{
		foreach ($donnees as $attribut => $valeur)
		{
		
			$methode='set'.ucfirst($attribut);
			if (is_callable(array($this,$methode)))
			{
				$this->$methode($valeur);
			}
		}
	
	}	
	
	public function setIdPartie($idPartie)
	{
		$this->idPartie=$idPartie;
	}	
	
	public function setIdJoueur($idJoueur)
	{
		$this->idJoueur=$idJoueur;
	}
	
	public function setScore($score)
	{
		$this->score=$score;
	}
	
	public function setNiveau($niveau)
	{
		$this->niveau=$niveau;
	}
	
	
	/***** Getter ***/
	public function getIdPartie ()
	{
		return $this->idPartie;
	}
	
	public function getIdJoueur ()
	{
		return $this->idJoueur;
	}	
		
	
	public function getScore()
	{
		return	$this->score;
	}
	
	public function getNiveau()
	{
		return	$this->niveau;
	}	
	
	public function getMot()
	{
		return $this->mot;
	}
		
	/****** ***************** Méthodes ***********************************/
	
	// Permet de vérifier si les valeurs des attributs ont été récupèrée
	public function estVide ()
	{
		return ($this->idPartie===-1 && $this->idJoueur== -1)? true :false;
	}

	
	
	public function creationPartie($id)
	{
		$sql="INSERT INTO Partie SET id_user=?";
		$result=$this->executerRequete($sql,array($id));
		if ($result->rowCount()== 1)
		{
			$this->getPartiesByIdUser($id);			
			return  true;  
		}else
			return false;
		
	}
	 	
	// Permet de récupérer la partie de l'utilisateur
	public function getPartiesByIdUser($id)
	{
		$sql="SELECT id_partie as idPartie, id_user AS idJoueur, 
			score, niveau FROM Partie WHERE id_user=?";
		$result=$this->executerRequete($sql,array($id));
		if ($result->rowCount()== 1){
			$this->initDonneesPartie($result->fetch());			
			return  true;  
		}	
		else
			return false;
		
	}	
	
	public function getPartiesByIdPartie($idPartie)
	{
		$sql="SELECT id_partie as idPartie, id_user AS idJoueur, 
			score, niveau FROM Partie WHERE id_partie=?";
		$result=$this->executerRequete($sql,array($idPartie));
		if ($result->rowCount()== 1){
			$this->initDonneesPartie($result->fetch());			
			return  true;  
		}	
		else
			return false;
		
	}
	
	// Permet sauvegarder la partie
	public function miseAjourPartie($score,$niveau)
	{	
	 	if (!$this->estVide())
	 	{	
			$sql = 'UPDATE Partie SET score="'.$score.'", niveau="'.$niveau.'" WHERE id_partie="'.$this->idPartie.'" AND id_user="'.$this->idJoueur.'"';	
			/* echo $sql; */
			$result=$this->executerRequete($sql);
			if($result->rowCount()>0)
				return true; 
		}
			return false; 
	}

	// Pas fini
	public function nouveauJeu($idUser=-1)
	{
		$this->mot->motAleaPartie();
		//$this->mot->getMotById(6);

		
		if ($idUser != -1)
		{
			if (!$this->getPartiesByIdUser($idUser))
			  $this->creationPartie($id);				
		}else 
		{
			echo "Cette partie sera sauvegardé car vous n'est pas connecté, Pour se connecter";
		}
	}
	
	
	
	public function jeuEncours($idJoueur=null,$idMot=null)
	{
		if ($idJoueur != null && $idMot !=null)
			return ($this->getPartiesByIdUser($idJoueur) && $this->mot->getMotById($idMot));
		else
			return false;
	}
	
	
	// Pas fini 
	public function caluclScore($motProp)
	{
		$poids=0;
		$motPropose = new Mots();
		$motPropose->getMotByLibelle($motProp);
		if ($motPropose->estVide())// id == -1
		{
			// on insert le mot dans la table Mot
			$motPropose->ajouter($motProp,CategorieMotInvalide); // Mot invalide
			
		}else if ($motPropose->getCategorie() == CategorieMotInvalide) //Mot invalide
		{
			$motPropose->miseAJourMotInvalide();
			
		}else if ($motPropose->getCategorie() == CategorieMotValide) //Mot valide
		{
				
			$poids=$motPropose->getPoids($this->mot->getID());
			
			if ($poids >=0)
			{							
						
				if ($poids<MaxPoids) //P
				{	
					$poids++;
					$this->score +=$poids;
				}else{
					$this->score+=max(1,(MaxPoids*2)-100);
				}
				
				$this->niveau+=1;
				$motPropose->MajPoidsRelation($poids, $this->mot->getID());	
				 $this->miseAjourPartie($this->score,$this->niveau);
				 return $poids;		
			}else 

				$motPropose->ajouterRelation ( $this->mot->getID());
				return 0;
			
		}else
		{
			return 0;
		}
				
	}
	
	
	
	
		
	
}// Fin Classe Jeu


//YAnn test
/*
	echo "Main <br> <br>";
	$jeu = new Partie ();
	
	echo "<br>-------------<br>";
	$jeu->getPartiesByIdUser(2);
	$jeu->getMot()->getMotById(6);
	
	print_r($jeu);
	echo "<br>-------------<br>";
	$jeu->nouveauJeu();
	echo "<br>-------------<br>";

	
	echo "getPartie <br> <br>";
	var_dump($jeu);


	echo "<br>------JEux-------<br>";
	echo "<br>------JEux-------<br>";
	echo "<br>------JEux-------<br>";
	if ($jeu->jeu ("chien"))
	{
		echo "<br>BIEN<br>";
	}else 
		echo "<br>FAIL<br>";
	echo "<br>---$$$$$$$$$$$$$$$$$$$$$$---Resultat--$$$$$$$$$$$$$$$$$$$$$-----<br>";
	
	return
	var_dump($jeu);
	


*/














