<?php
require_once 'Modeles/modele.php';

class Classement extends Modele {
	
	public function getClassement(){
		$sql = "SELECT id_partie, P.user_id, user_login, score FROM partie P INNER JOIN user U ON P.user_id=U.user_id ORDER BY score desc";
		$classes = $this->executerRequete($sql);
		return $classes;
	}

}
