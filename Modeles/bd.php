<?php
abstract class BD {

	// Objet PDO d'accès à la BD
	private $bdd;
	
	
	// Exécute une requête SQL éventuellement paramétrée
	protected function executerRequete($sql, $params = null) {
		if ($params == null) {
			$resultat = $this->getBdd()->query($sql);    // exécution directe
		}
		else {
			$resultat = $this->getBdd()->prepare($sql);  // requête préparée
			$resultat->execute($params);
		}
		return $resultat;
	}
	
	// Renvoie un objet de connexion à la BD en initialisant la connexion au besoin

	protected function getBdd() {
		if ($this->bdd == null) {
			try{
				// Création de la connexion
				$this->bdd = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET,
				DB_USERNAME, DB_PASSWD);
			}
			catch(Exception $e)
			{
				echo 'Erreur : '.$e->getMessage().'<br />';
				echo 'N° : '.$e->getCode();
				exit();
			}
		}
		return $this->bdd;
	}
	
	
	public function dernierID()
	{
		 if ($this->bdd != null) {
		       return  $this->bdd->lastInsertId();
		        
		   }else
		   		return null;
		   
	}

	
}
