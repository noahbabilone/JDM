<?php

require_once 'Modeles/mots.php';
require_once 'Vues/vue.php';

class ControleurAdmin extends Mots{
	private $mot;


	public function __construct(){
	  
	}

	public function ajout()
	{
	 $result=$this->listeLangues();
	 $result1[]=array();
	 $i=0;
	 while($row=$result->fetch()){
	 $result1[$i]['id']=$row['mot_id'];
	 $result1[$i]['langue']=$row['mot_libelle'];
	 $i++;
	 }
	
	 
	 $vue = new Vue("Ajout");
	 $vue->generer(array("result1"=>$result1));
	}
	

	public function mots()
	{
		if(!isset($_POST['txt'])){
			$vue = new Vue("Ajout");
			$vue->generer(array());
		}else
		{   
		    $langue=$_POST['langue'];
		
			$langue=explode(".",$langue);
			$idl=$langue[0];
			$l=$langue[1];
			
			
			$text=strtolower($_POST['txt']);
			$text=str_replace(",","\n",$text);
			
			$arr=explode("\n",$text);
			$arr1[]=array();
			for($i=0;$i<count($arr);$i++){
			$this->ajouterMot(trim($arr[$i]));
			$last=$this->lastId();
			$this->langueMot($last,$idl);
			$arr1[$i]['mot']=trim($arr[$i]);
			$arr1[$i]['id']=$last; 
			$arr1[$i]['langue']=$l;
		}

		$vue = new Vue("Resultat");
		$vue->generer(array("result"=>$arr1));
		
		}

	}

	public function gerer()
	{
	     
		if(isset($_POST['recherche'])&&!empty($_POST['recherche'])){
			$result=$this->listeDeMots(trim($_POST['recherche']),$_POST['rech']);
		  
		}else{
			$result=false;
		}

		if ($result){
			$arr[]=array();
			$i=0;
			while($row=$result->fetch())
			{   
				
				$result1=$this->langues($row['mot_id']);
			    
				$j=0;
				while($row1=$result1->fetch()){
				$arr[$i+$j]['id']=$row['mot_id'];
				$arr[$i+$j]['mot']=$row['mot_libelle'];
				$arr[$i+$j]['langue']=$row1['mot_libelle'];
				$j++;
				
				}
				
				if($j==0){
				$arr[$i]['id']=$row['mot_id'];
				$arr[$i]['mot']=$row['mot_libelle'];
				$arr[$i]['langue']="inconnue";
				}else $i=$i+$j-1;
				$i++;
			}

			$vue = new Vue("Resultat");
			if($i==0) $vue->generer(array());
			else
			$vue->generer(array("result"=>$arr));

		}else
		{
			$vue = new Vue("Resultat");
			$vue->generer(array());
		}



	}


	public function lien()
	{
		$mot=$_POST['mot1'];
		$id=$_POST['mot'];
		$this->liens($mot,$id);
	}
	
	public function liens($mot,$id)
	{
		$result=$this->listeLiens($id);
		
		if($result)
		{
			$arr[]=array();
			$i=0;
			while($row=$result->fetch())
			{
				$arr[$i]['idmot1']=$row['idmot1'];
				$arr[$i]['idmot2']=$row['idmot2'];
				$arr[$i]['mot1']=$row['mot1'];
				$arr[$i]['mot2']=$row['mot2'];
				$arr[$i]['type']=$row['type'];
				$arr[$i]['poid']=$row['poid'];
				$i++;
			}
			
			$vue = new Vue("liens");
			if($i==0)
				$vue->generer(array("mot"=>$mot,"id"=>$id));
			else 
				$vue->generer(array("result"=>$arr,"mot"=>$mot,"id"=>$id));
	
	
		}else
		{
			$vue = new Vue("liens");
			$vue->generer(array());
		}
	}
	
	
	public function ajouterLiens()
	{
		$id=$_POST['idm'];
		$mot=$_POST['mot'];
	
		if(!$idpartie=$this->mot->existPartie($id))
		{
			$idpartie=$this->mot->ajouterPartie($id);
		}

		$text=strtolower($_POST['txt']);
		$text=str_replace(",","\n",$text);
		$arr=explode("\n",$text);
	
		for($i=0;$i<count($arr);$i++){
			$this->mot->ajouterLien($idpartie,$arr[$i]);
		}
		$this->mot->liens($mot,$id);
	
	}

	public function listeMots()
	{
		//$result=$this->mot->listeDeMots();
		$arr=array("salah"=>"ok");
		echo json_encode($arr); 
		
	}

}

