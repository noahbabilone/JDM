<?php

require_once 'Modeles/bd.php';

class Bloc extends BD {

	// Renvoie la liste des blocs
	public function getBlocs() {
		$sql ='SELECT bloc_id as id, bloc_titre as titre, bloc_contenu as contenu, bloc_type as type, bloc_dateCreat as dateCreation, bloc_dateModif as dateModif '.
			  'FROM bloc '.
			  'WHERE bloc_type="0" '.
			  'ORDER BY bloc_id ASC Limit 0,3';
		$blocs = $this->executerRequete($sql);
		return $blocs;
	}
	
	// Renvoie les informations sur un blocs
	public function getBloc($idBloc) {
		$sql =	'SELECT bloc_id as id, bloc_titre as titre, bloc_contenu as contenu, bloc_type as type, bloc_dateCreat as dateCreation, bloc_dateModif as dateModif '.
				'FROM bloc '.'WHERE bloc_id=?';
		$bloc = $this->executerRequete($sql, array($idbloc));
		if ($bloc->rowCount() == 1)
			return $bloc->fetch();  // Accès à la première ligne de résultat
		else
			throw new Exception("Aucun bloc ne correspond à l'identifiant '$idBloc'");
	}
	
	public function getPermierBloc() {
		$sql =	'SELECT bloc_id as id, bloc_titre as titre, bloc_contenu as contenu, bloc_type as type, bloc_dateCreat as dateCreation, bloc_dateModif as dateModif '.
				'FROM bloc WHERE bloc_type="0" LIMIT 1';
		$bloc = $this->executerRequete($sql);
		if ($bloc->rowCount() == 1)
			return $bloc->fetch();  // Accès à la première ligne de résultat
		else
			throw new Exception("Aucun bloc ne correspond à l'identifiant '$idBloc'");
	}
	
	public function blocPrecedent($idbloc) {
		$sql =	'SELECT bloc_id as id, bloc_titre as titre, bloc_contenu as contenu, bloc_type as type, bloc_dateCreat as dateCreation, bloc_dateModif as dateModif '.
				'FROM bloc WHERE bloc_type="0" AND WHERE bloc_id<? LIMIT 1';
		$bloc = $this->executerRequete($sql, array($idbloc));
		if ($bloc->rowCount() == 1)
			return $bloc->fetch();  // Accès à la première ligne de résultat
		else
			return 0;
	}

	public function blocSuivant($idbloc) {
		$sql =	'SELECT bloc_id as id, bloc_titre as titre, bloc_contenu as contenu, bloc_type as type, bloc_dateCreat as dateCreation, bloc_dateModif as dateModif '.
				'FROM bloc WHERE bloc_type="0" AND WHERE bloc_id>? LIMIT 1';
		$bloc = $this->executerRequete($sql, array($idbloc));
		if ($bloc->rowCount() == 1)
			return $bloc->fetch();  // Accès à la première ligne de résultat
		else
			return 0;
	}
	
	
	
	
	
	
    
}
