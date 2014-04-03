<?php
require_once 'bd.php';

/*

require_once 'bd.php';
require_once "../config.php";
*/



class Mots extends BD {
	
	private $id;
	private $libelle;
	private $categorie;
	private $nbProp;

	
	public function __construct(){
	
		$this->id=-1;
		$this->libelle="";
		$this->categorie=-1;
		$this->nbProp=-1;
	
	}
	
		
	public function initDonneesMot($valeurs=array())
	{
		if (!empty($valeurs))
			$this->hydrate($valeurs);
	}
	
	public function hydrate ($donnees)
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
	
	
	/************* Setter et getter ****/
	
	
	
	public function setId($id)
	{
		$this->id=$id;
		
	}
	public function setLibelle($libelle)
	{
		$this->libelle=$libelle;
		
	}
	
	public function setCategorie($categorie)
	{
		$this->categorie=$categorie;
	}
	
	public function setNbProp($nbProposition)
	{
		$this->nbProp=$nbProposition;
	}
	
	
	
		///////////////////////////////////
	
	public function getId()
	{
		return $this->id;	
	}
	
	public function getLibelle()
	{
		return $this->libelle;
		
	}
	
	public function getCategorie()
	{
		return $this->categorie;
		
	}
	public function getNbProp()
	{
		return $this->nbProp;
		
	}
	
	
	
	
	/************* METHODES ********************/
	public function ajouterMot($mot){

		$sql="INSERT INTO Mot SET mot_libelle=?, mot_categorie = 2";	
		return $this->executerRequete($sql,array($mot));
	}

	public function ajouterMotInvalide($mot){

		$sql="INSERT INTO Mot SET mot_libelle=?, mot_categorie = 3, nb_proposition = 0";	
		return $this->executerRequete($sql,array($mot));
	}

	public function langueMot($mot,$langue){
		$sql="INSERT INTO `relation`(`id_mot_1`, `id_mot_2`, `id_typeRelation`, `poids`) VALUES (?,?,2,0)";
		$arr=array($langue,$mot);
		$this->executerRequete($sql,$arr);
	}


	public function listeDeMots($par,$cat){
	
		$sql="	SELECT * FROM Mot WHERE (mot_categorie=?) AND	(mot_libelle like ?)";	
		if($par==null) {
		 	$par="*";
		 }
	
		$par=str_replace("*","%",$par);
		$arr=array($cat,$par);
		return $this->executerRequete($sql,$arr);
	}
	
	
	public function langues($id)
	{
	
		$sql="	SELECT mot_id,mot_libelle
				FROM Mot, Relation
				WHERE ( id_typeRelation =2 ) AND (id_mot_2=?)AND (mot_id=id_mot_1)";
		
		$arr=array($id);
		return $this->executerRequete($sql,$arr);
	}
	
	
	public function listeLangues()
	{
		$sql="select * from Mot where mot_categorie=1";
		return $this->executerRequete($sql,null);
	
	}
	
	
	public function listeLiens($id)
	{
		
		$sql="	SELECT mot1.mot_id 'idmot1',mot2.mot_id 'idmot2', mot1.mot_libelle 'mot1',mot2.mot_libelle 'mot2',
					typerelation.libelle_typeRelation 'type',relation.poids 'poid'  
				 FROM Mot as mot1,mot as mot2 , relation,typerelation 
				 WHERE 	(relation.id_mot_1=?)and
						(mot1.mot_id=relation.`id_mot_1`)and
						(mot2.mot_id=relation.id_mot_2)and
						(relation.id_typeRelation !=2)and
						(relation.id_typeRelation=typerelation.id_typeRealtion)";
		$arr=array($id);
		return $this->executerRequete($sql,$arr);
	
	}
	
	
	public function lastId()
	{
		 return $this->getBdd()->lastInsertId();
	}
	
	
	/*************** Fonctions Yannick ******************/
	
	public function estVide ()
	{
		return ($this->id===-1)? true :false;
	}

/* 	Permet de recupérer toutes les informations concernant le Mot grâce à son ID */
	public function getMotById($id)
	{
		
		$sql="SELECT mot_id as id,mot_libelle as libelle,mot_categorie as categorie, nb_proposition as nbProp FROM Mot WHERE mot_id=?";
		
			$mots = $this->executerRequete($sql, array($id));
			if ($mots->rowCount()== 1){
				$this->initDonneesMot($mots->fetch());			
				return  true;  
			}	
			else
				return false;
	}

	/* 	Permet de récuperer un mot par categorie */
	public function getMotByIdCategorie($id,$categorie=2)
	{
		$sql="SELECT mot_id as id,mot_libelle as libelle,mot_categorie as categorie, nb_proposition as nbProp FROM Mot WHERE mot_id=? AND mot_categorie=?";
		
		$mots = $this->executerRequete($sql, array($id,$categorie));
			if ($mots->rowCount()== 1){
			    	$this->initDonneesMot($mots->fetch());			
			    	return  true;  
			}	
			else
					return false;
		
	}
	
	/**** Récupère un mot grâce a son libellé ***/
	public function getMotByLibelle($mot)
	{
		$sql="SELECT mot_id as id,mot_libelle as libelle,mot_categorie as categorie, nb_proposition as nbProp FROM Mot WHERE mot_libelle=?";
		
		$mots = $this->executerRequete($sql, array($mot));
		if ($mots->rowCount()== 1){
			$this->initDonneesMot($mots->fetch());			
			return  true;  
		}	
		else
			return false;
	}


/* 	Permet de recupérer un mot aléatoirement*/
	public function motAleaPartie()
	{
		$sql="SELECT MAX(mot_id) FROM Mot";
		$result= $this->executerRequete($sql);
		
		$max = $result->fetch();
      
        do
        {
      	    $aleat=rand(0,$max[0]);
        	$bMot=$this->getMotByIdCategorie($aleat);
        }while (!$bMot);

	}
	
	
	
// à Vérifier encore 
/* 	On récupère le poids dans la table rélation  */
	public function getPoids ($idMotProp)
	{
		if (! $this->estVide())
		{		
			$sql='SELECT poids FROM Relation WHERE (id_mot_1 ="'.$this->id.'" AND id_mot_2="'.$idMotProp.'") OR (id_mot_1="'.$idMotProp.'" AND id_mot_2="'.$this->id.'")';
			$result= $this->executerRequete($sql);
			if ($result->rowCount()>= 1){
				$mot=$result->fetch();
				return $mot[0];
			}else
				return -12;
			
		}else
			return -11;	
	}
	

	
	// A definir la table nb_proposition dans la table de Mots
	public function ajouter ($mot,$categorie=2)
	{

		$sql="INSERT INTO Mot SET mot_libelle=?, mot_categorie =?, nb_proposition = 0";	
		$result=$this->executerRequete($sql,array($mot,$categorie));
		if ($this->dernierID()>0)
				return true; 
			else
				return false; 
	}
	
	
	// Pas fini
	public function miseAjourMot($lib,$categorie,$nbProp)
	{		
		$sql = 'UPDATE Mot SET mot_libelle="'.$lib.'", mot_categorie="'.$categorie.'", nb_proposition="'.$nbProp.'" WHERE mot_id="'.$this->id.'"';	
		/* 		echo $sql; */
		$result=$this->executerRequete($sql);
		if($result->rowCount()>0)
			return true; 
		else
			return false; 
	}
	
	
	
	public function miseAJourMotInvalide()
	{
		if (!$this->estVide())
		{
		
			$this->nbProp++;
/* 			echo '-------------------'.MaxPoids. '-------------------'; */
			if($this->nbProp>MaxProposition)
				return $this->miseAjourMot($this->libelle,CategorieMotValide,$this->nbProp);
			else
				return $this->miseAjourMot($this->libelle,CategorieMotInvalide,$this->nbProp);

		}else
			return false; 	
	}



	public function ajouterRelation ($idMot)
	{
		$sql='INSERT INTO Relation SET id_mot_1 ="'.$this->id.'", id_mot_2="'.$idMot.'" ,id_typeRelation="3"';
		$result=$this->executerRequete($sql);
		if($this->dernierID()>0)
			return $this->dernierID(); 
		else
			return -1; 
		
		
	}
	public function MajPoidsRelation($poids, $idMotProp)
	{
		 
		$sql = 'UPDATE Relation SET poids="'.$poids.'" WHERE (id_mot_1 ="'.$idMotProp.'" AND id_mot_2="'.$this->id.'") OR (id_mot_1="'.$this->id.'" AND id_mot_2="'.$idMotProp.'")';
		$result=$this->executerRequete($sql);
		if($result->rowCount()>0)
			return true; 
		else
			return false; 
	}
	
	

/*********** *+****/

	


}// fin de la classe 

	
	/*
echo 'main <br>';
	$mot= new Mots();
	
	//$mot->getMotById(6);
	//$mot->getMotByLibelle("chat");
	$mot->getMotByLibelle("chat");
	print_r($mot);
	$mot->miseAjourMot("chat",2,100);
	
*/
	/*
if ($mot->ajouter("programmer",3))
	{
		echo "ajouter";
	}else
		echo "non";
*/
		
	//$poids=$mot->getPoids(8);
	//printf($poids);
	
	
	
	/*
var_dump($mot->miseAjourMot(6,"test",2,3));
	
	echo 'tetete';
	
	$mot->getMotById(6);
	var_dump($mot);


	echo "<br> rechere Id d'un mot <br>";
	
	
	var_dump( $mot->getIdMot("testes"));
*/
	
	
	
	
	
	
	
	
	
	

	
	