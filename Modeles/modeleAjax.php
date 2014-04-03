<?php

include ("../config.php");
include ("../Modeles/bd.php");

class Mots extends BD {

	public function __construct(){

	}
	
	public function supprimerMot($param)
	{
	
	    
		$sql="DELETE FROM `mot` WHERE `mot_id`=?";
		$arr=array($param);
		
		$result=$this->executerRequete($sql,$arr);
		$arr1=array("ok"=>"0");
		
		if($result) {
			$arr1['ok']="1";
		}
	
		echo json_encode($arr1);
		
	
	}
	
	public function modifier($param,$param1){
	
		$sql="update `mot` SET `mot_libelle`=?  where `mot_id`=?";
		
		$arr=array($param,$param1);
		$result=$this->executerRequete($sql,$arr);
		$arr1=array("ok"=>"0");
		if($result) $arr1['ok']='1';
		echo json_encode($arr1);
	
	
	}
	
	
	public function valider($id){
	
	$sql="update `mot` SET `mot_categorie`=2  where `mot_id`=?";
		
		$arr=array($id);
		$result=$this->executerRequete($sql,$arr);
		$arr1=array("ok"=>"0");
		if($result) $arr1['ok']='1';
		echo json_encode($arr1);
	
	}
	
	public function refuser($id){
	
	
	
	$sql="update `mot` SET `mot_categorie`=3  where `mot_id`=?";
		
		$arr=array($id);
		$result=$this->executerRequete($sql,$arr);
		$arr1=array("ok"=>"0");
		if($result) $arr1['ok']='1';
		echo json_encode($arr1);
	
	
	}
	
	
	public function listeMots($par,$cat){
	
		$sql="select mot_id, mot_libelle  from mot where mot_libelle like ? and `mot_categorie`=?";
		$par=str_replace("*","%",$par);
		$arr=array($par);
		$result=$this->executerRequete($sql,$arr);
		echo json_encode($result->fetchAll());
	}
	
	
	public function a_valider(){
		
		$sql="select * from mot where `mot_categorie`=4";
		$arr=array($id);
		$result=$this->executerRequete($sql,$arr);
		echo json_encode($result->fetchAll());	
	}
	
	
}
	
	
$control=new Mots();
	$method=$_POST['method'];
	if(isset($_POST['params'])&&isset($_POST['params1'])){
	$params=$_POST['params'];
	$params1=$_POST['params1'];
	$control->$method($params,$params1);
	}
	else if(isset($_POST['params'])){
	$params=$_POST['params'];
	
	$control->$method($params);
	
	}
	else $control->$method(null);

	
	
	?>
	
	
	
	
	
	
	
	
