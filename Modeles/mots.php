<?php
require_once 'Modeles/bd.php';

class Mots extends BD {
	
	
	public function __construct(){
		
	}
	
	
	
	public function ajouterMot($mot)
	{
	 	$date= date('h:i:s');
	 	$sql="INSERT INTO `mot`( `mot_libelle`,`mot_codeLangue`,`mot_dateCreat`,`mot_dateModif`) VALUES (?,0,?,?)";
	 	$this->executerRequete($sql,array($mot,$date,$date));
	}
	
	
	public function listeDeMots($par)
	{
		$sql="select mot_id, mot_libelle  from mot where mot_libelle like ?";
		if($par==null)
		{	
			$par="*";
		}	
		$par=str_replace("*","%",$par);
		$arr=array($par);
		
		$result=$this->executerRequete($sql,$arr);
		return $result;
		
	}
	
	public function listeParties($id)
	{
		$sql="select partie.partie_id,partie.mot_id,partie.user_id,user.user_login,mot.mot_libelle from
		partie,mot,user where
		(partie.mot_id=mot.mot_id)and
		(user.user_id=partie.user_id)and
		(partie.mot_id=?)";
		
		$arr=array($id);
		$result=$this->executerRequete($sql,$arr);
		return $result;
		
	}
	
	
	public function ajouterLien($id,$mot)
	{	
		$sql="insert into relation VALUES(?,?)";
		$arr=array($id,$mot);
		$this->executerRequete($sql,$arr);
	}
	
	public function existPartie($id)
	{
		$sql="select partie_id from partie where mot_id=$id and user_id=-1 ";
		$arr=array($id);
		$result=$this->executerRequete($sql,$arr);
		$result=$result->fetch();
		if($result) 
			return $result['partie_id'];
		else 
			return false;	
	}
	
	
	
	public function ajouterPartie($id)
	{
		
		$req="INSERT INTO `partie`
		(`user_id`, `mot_id`, `score`)
		VALUES(-1,?,0)";
		$arr=array($id);
		
		$result=$this->executerRequete($req,$arr);
		return $this->existPartie($id);
		
	}
	
	
	
	public function lastId(){
		return $this->getBdd()->lastInsertId();
	}
	
}




