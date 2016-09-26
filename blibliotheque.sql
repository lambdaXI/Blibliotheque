-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 27 Septembre 2016 à 00:38
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `blibliotheque`
--

-- --------------------------------------------------------

--
-- Structure de la table `auteur`
--

CREATE TABLE IF NOT EXISTS `auteur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sexe` varchar(10) DEFAULT NULL,
  `nom` varchar(20) DEFAULT NULL,
  `prenom` varchar(20) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `image` varchar(550) DEFAULT NULL,
  `ville` varchar(35) DEFAULT NULL,
  `courant_literaire` varchar(30) DEFAULT NULL,
  `date_naissance` datetime DEFAULT NULL,
  `date_mort` datetime DEFAULT NULL,
  `biographie` text,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`),
  KEY `id_2` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `auteur`
--

INSERT INTO `auteur` (`id`, `sexe`, `nom`, `prenom`, `age`, `image`, `ville`, `courant_literaire`, `date_naissance`, `date_mort`, `biographie`, `created_at`, `updated_at`) VALUES
(2, 'homme', 'Yusuke', 'Murata', 38, 'https://myanimelist.cdn-dena.com/images/voiceactors/3/5939.jpg', 'Miyagi', 'Manga', '1978-07-14 00:00:00', '0001-11-30 00:00:00', 'Yusuke Murata (村田 雄介, Murata Yūsuke?), né le 4 juillet 1978 (38 ans) dans la préfecture de Miyagi au Japon, est un mangaka. Il est principalement connu pour avoir dessiné les mangas Eyeshield 21, en collaboration avec le scénariste Riichirō Inagaki, et One-Punch Man, en collaboration avec ONE, publié depuis le 14 juin 2012 dans le webmagazine Tonari no Young Jump de l''éditeur Shūeisha.', '2016-09-26 08:01:08', '2016-09-26 18:20:03'),
(3, 'homme', 'Hiromu', 'Arakawa', 43, 'https://arigatomg.com/wp-content/uploads/2015/07/khent-1.jpg', 'Tokachi', 'Manga', '1973-05-08 00:00:00', '0001-11-30 00:00:00', 'Hiromu Arakawa est une mangaka née le 8 mai 1973 à Makubetsu au Japon. Son manga le plus renommé, Fullmetal Alchemist, devint un succès international, étant l''un des premiers mangas à être adapté en deux anime différents', '2016-09-26 08:09:34', '2016-09-26 20:20:48'),
(4, 'homme', 'KeuKJin', 'Jeon', 48, 'https://upload.wikimedia.org/wikipedia/commons/2/23/Keuk-jin_Jeon_-_Japan_Expo_2011_-_P1190923.jpg', 'coree', 'Manga', '1968-04-25 00:00:00', '0000-00-00 00:00:00', 'Né en 1968, il a commencé sa carrière en tant que scénariste en 1990 avec « Byeorang » dans le magazine hebdomadaire coréen « Jougane manhwa ». C’est depuis 1994 qu’il écrit le scénario de la série Sabre et dragon ( plus de 54 tomes, toujours en cours en Corée), un des plus prolifiques manhwa de nos jours.', '2016-09-26 10:36:52', '2016-09-26 10:36:52'),
(7, 'homme', 'qzdqzd', 'qzdqzd', 25, 'http://static.fnac-static.com/multimedia/FR/images_produits/FR/Fnac.com/ZoomPE/6/5/8/9782723474856.jpg', 'Miyagi', 'Bandedessiner', '0101-01-01 00:00:00', '0101-01-01 00:00:00', 'zdad azd azd', '2016-09-26 20:39:08', '2016-09-26 20:39:08');

-- --------------------------------------------------------

--
-- Structure de la table `livre`
--

CREATE TABLE IF NOT EXISTS `livre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(40) NOT NULL,
  `prix` float NOT NULL,
  `numero_isbn` varchar(25) NOT NULL,
  `image` varchar(200) NOT NULL,
  `numero_ean` varchar(25) NOT NULL,
  `id_auteur` int(11) DEFAULT NULL,
  `maison_edition` varchar(30) NOT NULL,
  `date_parution` date NOT NULL,
  `magasin` varchar(30) NOT NULL,
  `version_numerique` tinyint(1) NOT NULL DEFAULT '0',
  `nombre_vue` int(11) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_auteur` (`id_auteur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Contenu de la table `livre`
--

INSERT INTO `livre` (`id`, `titre`, `prix`, `numero_isbn`, `image`, `numero_ean`, `id_auteur`, `maison_edition`, `date_parution`, `magasin`, `version_numerique`, `nombre_vue`, `created_at`, `updated_at`) VALUES
(1, 'One Punch Man', 7, '2368522255', 'http://static.fnac-static.com/multimedia/Images/FR/NR/9a/b7/73/7583642/1507-1.jpg', '978-2368522257', 2, 'Kurokawa Eds', '2016-01-14', 'Fnac', 1, 0, '2016-09-26 09:17:21', '2016-09-26 09:17:21'),
(2, 'Full Methal alchemist', 2, '2351420179', 'http://www.bedetheque.com/media/Couvertures/FullMetalAlchemist3_16112005.jpg', '978-2351420171', 3, 'Kurokawa Eds', '2005-08-01', 'Fnac', 0, 10, '2016-09-26 09:41:13', '2016-09-26 18:26:50'),
(4, 'The Breaker', 8.05, '2820900453', 'http://static.fnac-static.com/multimedia/Images/FR/NR/4f/1e/76/7741007/1507-1.jpg', '978-2820900456', 4, 'Booken Manga', '2016-10-13', 'Fnac', 0, 0, '2016-09-26 11:42:58', '2016-09-26 20:13:17'),
(8, 'Eye shield 21', 6.9, '2723474852', 'http://static.fnac-static.com/multimedia/FR/images_produits/FR/Fnac.com/ZoomPE/6/5/8/9782723474856.jpg', '978-2723474856', 2, 'Glenat', '2011-01-01', 'Fnac', 0, 23, '2016-09-26 14:53:53', '2016-09-26 16:48:26'),
(9, 'Arslan', 7.65, '2368521739', 'http://static.fnac-static.com/multimedia/Images/FR/NR/18/4e/67/6770200/1507-1.jpg', '978-2368521731', 3, 'Kurokawa Eds', '2015-06-24', 'Fnac', 0, 0, '2016-09-26 17:26:28', '2016-09-26 20:13:10'),
(10, 'Silver spoon', 6.8, '2368522603', 'http://static.fnac-static.com/multimedia/Images/FR/NR/5e/b4/75/7713886/1507-1.jpg', '978-2368522608', 3, 'Kurokawa Eds', '2016-04-14', 'Fnac', 0, 0, '2016-09-26 17:28:01', '2016-09-26 20:13:03');

-- --------------------------------------------------------

--
-- Structure de la table `test`
--

CREATE TABLE IF NOT EXISTS `test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(20) NOT NULL,
  `prenom` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `test`
--

INSERT INTO `test` (`id`, `nom`, `prenom`, `age`, `created_at`, `updated_at`) VALUES
(1, 'test', 'max', 18, '2016-09-26 07:24:22', '2016-09-26 07:24:22'),
(2, 'test', 'max', 18, '2016-09-26 07:45:28', '2016-09-26 07:45:28');

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `livre`
--
ALTER TABLE `livre`
  ADD CONSTRAINT `livre_ibfk_1` FOREIGN KEY (`id_auteur`) REFERENCES `auteur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
