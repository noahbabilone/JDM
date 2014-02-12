<?php


/* Variable globales essentielles */
define('ROOT', dirname(__FILE__)); // Chemin de la racine jusqu'au site (à utiliser pour les includes et requires)
define('ABSOLUTE_ROOT', 'http://localhost:8888/1-Projet/'); // Lien absolu de la racine du site (à utiliser pour les vues)
define('NOM_SITE', 'Projet L3');
	
/* Variables de connexion à la base de données */
define('DB_HOST', 'localhost'); //Hôte hébergeant le serveur
define('DB_NAME', 'jdm'); //Nom de la base de donnée
define('DB_USERNAME', 'root'); //Nom d'utilisateur de connexion à la base
define('DB_PASSWD', 'root'); //Password de connexion à la base
define('DB_CHARSET', 'utf8'); //Méthode d'encodage de la base

?>
