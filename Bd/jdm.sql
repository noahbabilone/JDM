-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 18 Mars 2014 à 17:33
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `jdm`
--

-- --------------------------------------------------------

--
-- Structure de la table `bloc`
--

CREATE TABLE `bloc` (
  `bloc_id` int(11) NOT NULL AUTO_INCREMENT,
  `bloc_titre` varchar(250) CHARACTER SET utf8 NOT NULL,
  `bloc_contenu` text CHARACTER SET utf8 NOT NULL,
  `bloc_type` varchar(250) CHARACTER SET utf8 NOT NULL,
  `bloc_dateCreat` datetime NOT NULL,
  `bloc_dateModif` datetime NOT NULL,
  PRIMARY KEY (`bloc_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `bloc`
--

INSERT INTO `bloc` (`bloc_id`, `bloc_titre`, `bloc_contenu`, `bloc_type`, `bloc_dateCreat`, `bloc_dateModif`) VALUES
(1, 'Collectionnez les mots. Capturez-les ! Volez-les !', ' Collectionnez les mots. Capturez-les ! Volez-les ! Comment ça marche ? Qu''est-ce qu''on doit faire ? Un terme va vous être présenté ainsi qu''une consigne. Vous devez entrer autant de propositions que possible conformément à la consigne. Il s''agit souvent de fournir des termes que vous associez librement à celui présenté. Validez chaque proposition avec le bouton "Envoyer" ou avec la touche "Entrée". D''autres joueurs vont être confrontés au même terme. Vous gagnerez des crédits lorsque les termes que vous avez donnés correspondent à ceux des autres joueurs. Plus un terme est précis plus vous gagnerez de points, mais l''autre joueur y aura-t-il pensé ?\n\nPensez à lire la Charte de JeuxDeMots. ', '0', '2014-02-09 00:00:00', '2014-02-09 00:00:00'),
(2, 'Mission en cours', 'Hot proposée par kaput, il vous faut vous brûler les doigts avec 8 choses possiblement chaudes (mission jamais achevée) rien capturé... en 236j 22h 29min 23s ', '0', '2014-02-09 00:00:00', '2014-02-09 00:00:00'),
(3, 'Les mots du moment', '• serious game • relation dominant-dominé • rapport hiérarchique • faire avorter une couvée de singes • faire fort • vinaigrette • gourmette • façonner • Maurice Sendak • lamproies • disparu de longue date • cave (lieu) • Ohio • séquestration • récep', '0', '2014-02-09 00:00:00', '2014-02-09 00:00:00'),
(4, 'Mission en cours', 'Hot proposée par kaput, il vous faut vous brûler les doigts avec 8 choses possiblement chaudes (mission jamais achevée) rien capturé... en 236j 22h 29min 23s ', '0', '2014-02-09 00:00:00', '2014-02-09 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `Mot`
--

CREATE TABLE `Mot` (
  `mot_id` int(11) NOT NULL AUTO_INCREMENT,
  `mot_libelle` varchar(50) NOT NULL,
  `mot_categorie` int(11) NOT NULL DEFAULT '2' COMMENT '1: langue, 2:mots valide, 3:mots invalides',
  PRIMARY KEY (`mot_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Contenu de la table `Mot`
--

INSERT INTO `Mot` (`mot_id`, `mot_libelle`, `mot_categorie`) VALUES
(1, 'EN', 1),
(2, 'FR', 1),
(3, 'AR', 1),
(4, 'IT', 1),
(5, 'ES', 1),
(6, 'chat', 2),
(7, 'chien', 2),
(8, 'croquette', 2),
(9, 'travail', 2),
(10, 'bureau', 2),
(11, 'metier', 2),
(12, 'stylo', 2);

-- --------------------------------------------------------

--
-- Structure de la table `Relation`
--

CREATE TABLE `Relation` (
  `id_mot_1` int(11) NOT NULL,
  `id_mot_2` int(11) NOT NULL,
  `id_typeRelation` int(11) NOT NULL,
  `poids` int(11) NOT NULL,
  PRIMARY KEY (`id_mot_1`,`id_mot_2`),
  KEY `id_mot_2` (`id_mot_2`),
  KEY `id_mot_1` (`id_mot_1`),
  KEY `id_mot_1_2` (`id_mot_1`),
  KEY `id_mot_2_2` (`id_mot_2`),
  KEY `id_typeRelation` (`id_typeRelation`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `Relation`
--

INSERT INTO `Relation` (`id_mot_1`, `id_mot_2`, `id_typeRelation`, `poids`) VALUES
(2, 6, 2, 0),
(2, 7, 2, 0),
(2, 8, 2, 0),
(2, 9, 2, 0),
(2, 10, 2, 0),
(2, 11, 2, 0),
(2, 12, 2, 0),
(6, 7, 1, 2),
(6, 8, 1, 6),
(9, 7, 1, 1),
(9, 10, 1, 1);

-- --------------------------------------------------------

--
-- Structure de la table `TypeRelation`
--

CREATE TABLE `TypeRelation` (
  `id_typeRealtion` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_TypeRelation` varchar(50) NOT NULL,
  PRIMARY KEY (`id_typeRealtion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `TypeRelation`
--

INSERT INTO `TypeRelation` (`id_typeRealtion`, `libelle_TypeRelation`) VALUES
(1, 'associe'),
(2, 'langue');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_passe` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_score` int(11) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL DEFAULT '0',
  `user_dateCreat` datetime NOT NULL,
  `user_dateModif` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_passe`, `user_email`, `user_score`, `user_type`, `user_dateCreat`, `user_dateModif`) VALUES
(-1, 'yaya', '21232f297a57a5a743894a0e4a801fc3', 'admin@gmai.com', 0, 0, '2014-03-17 00:00:00', '2014-03-19 00:00:00'),
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3 ', 'jdm@mail.fr', 0, 0, '2014-02-05 00:00:00', '2014-02-05 00:00:00'),
(2, 'yann', '21232f297a57a5a743894a0e4a801fc3 ', 'yann@mail.fr', 0, 0, '2014-02-05 00:00:00', '2014-02-05 00:00:00'),
(3, 'test', 'test', 'test', 0, 0, '2014-02-25 23:56:20', '2014-02-25 23:56:20'),
(4, '', 'd41d8cd98f00b204e9800998ecf8427e', 'z@admin', 0, 0, '2014-03-01 12:53:41', '2014-03-01 12:53:41'),
(5, 'ar', 'cc8c0a97c2dfcd73caff160b65aa39e2', 'admin@r', 0, 0, '2014-03-01 12:55:05', '2014-03-01 12:55:05'),
(6, 'zaho ', 'ab4f63f9ac65152575886860dde480a1', 'admin@da.fr', 0, 0, '2014-03-01 13:09:51', '2014-03-01 13:09:51');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `Relation`
--
ALTER TABLE `Relation`
  ADD CONSTRAINT `Relation_ibfk_3` FOREIGN KEY (`id_typeRelation`) REFERENCES `TypeRelation` (`id_typeRealtion`),
  ADD CONSTRAINT `Relation_ibfk_1` FOREIGN KEY (`id_mot_1`) REFERENCES `Mot` (`mot_id`),
  ADD CONSTRAINT `Relation_ibfk_2` FOREIGN KEY (`id_mot_2`) REFERENCES `Mot` (`mot_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
