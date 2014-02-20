-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Sam 15 Février 2014 à 14:41
-- Version du serveur: 5.5.29
-- Version de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

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
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_passe` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_email` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_nom` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_prenom` varchar(250) CHARACTER SET utf8 NOT NULL,
  `user_score` int(11) NOT NULL DEFAULT '0',
  `user_type` int(11) NOT NULL DEFAULT '0',
  `user_dateCreat` datetime NOT NULL,
  `user_dateUdp` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`user_id`, `user_login`, `user_passe`, `user_email`, `user_nom`, `user_prenom`, `user_score`, `user_type`, `user_dateCreat`, `user_dateUdp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3 ', 'jdm@mail.fr', 'admin', 'admin', 0, 0, '2014-02-05 00:00:00', '2014-02-05 00:00:00'),
(2, 'yann', '21232f297a57a5a743894a0e4a801fc3 ', 'yann@mail.fr', 'yann', 'yann', 0, 0, '2014-02-05 00:00:00', '2014-02-05 00:00:00');
