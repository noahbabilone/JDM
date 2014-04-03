<?php


/* Variable globales essentielles */
define('ROOT', dirname(__FILE__)); // Chemin de la racine jusqu'au site (à utiliser pour les includes et requires)
define('ABSOLUTE_ROOT', ''); // Lien absolu de la racine du site (à utiliser pour les vues)
define('NOM_SITE', 'Projet L3');
	
/* Variables de connexion à la base de données */
define('DB_HOST', 'localhost'); //Hôte hébergeant le serveur
define('DB_NAME', 'jdm'); //Nom de la base de donnée
define('DB_USERNAME', 'root'); //Nom d'utilisateur de connexion à la base
define('DB_PASSWD', 'root'); //Password de connexion à la base
define('DB_CHARSET', 'utf8'); //Méthode d'encodage de la base

// variable Mot
define('MaxPoids',50); // Pas maximum pour un mots
define('MaxProposition',10); // Pas maximum pour un mots
define('CategorieMotLangue',1); // Pas maximum pour un mots
define('CategorieMotValide',2); // Pas maximum pour un mots
define('CategorieMotInvalide',3); // Pas maximum pour un mots

define('CompteARebours',60); // Pas maximum pour un mots



?>
