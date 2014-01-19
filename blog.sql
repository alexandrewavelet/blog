-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Lun 07 Octobre 2013 à 13:35
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `texte` text CHARACTER SET utf8 NOT NULL,
  `date` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `date`) VALUES
(1, 'Module PhP', 'fjdfhkdfhkfddfjksdfkjsdfjkdfjkdsjdsjkdjksdfkjsdfjsdfsfdjksdfsdfsdfkj\r\nsfdkfdsdfjksdfjsdfsdfjsdfhfdljopziefjkslfdjhsfhsflksdcnjbvdsbvbhxvv\r\nnvxcbvhgdfjsfghjsdgfjsdkjhfurigfjsdbckdhfgsjfjdhslfhdfgjgfjsdbhcdjg\r\nfjdsfjdgfydsgfjkdsgfhjbchjdhfuhsldjfhdjfgdsldfjdhgfjdlsfdhgsfhjsdf\r\ndbhdgvjdf', 0),
(2, 'Deuxieme article', 'ojkfsnvsbvjskdvbsvjksbvsbjvskbvssiefh\r\nfslkfjs sfjskfhey fbvxncvb vdjkbdf jskfgdvbdsfsjdkbf\r\nsfdkshfbvoi fsjfksnvbvhfjdoeziu\r\nfsjkdshfjnvc,vxvncx', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
