-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Sam 25 Janvier 2014 à 20:37
-- Version du serveur: 5.5.27-log
-- Version de PHP: 5.4.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) CHARACTER SET utf8 NOT NULL,
  `texte` text CHARACTER SET utf8 NOT NULL,
  `date` int(11) NOT NULL,
  `image` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `date`, `image`) VALUES
(1, 'Mon blog', 'Ce blog est issu d''un TP rÃ©alisÃ© lors de ma Licence.\r\n\r\ntechnologies : PHP, SQL, Smarty, Bootstrap', 1389785758, 0),
(3, 'Avancement', 'TODO\r\n- SystÃ¨me de tag\r\n- Utilisation de Smarty (Framework MVC en PHP)\r\n\r\nDONE\r\n- Reprendre sources dans le dossier modulePHP\r\n- CrÃ©ation du dossier &quot;dev&quot; dans lequel la nouvelle version sera codÃ©e\r\n- Structure des contrÃ´leurs\r\n- Index fonctionnel\r\n- Affichage des articles avec pagination\r\n- SystÃ¨me d''identification avec sessions (avec cryptage MD5)\r\n- CrÃ©ation d''articles\r\n- Modification d''articles\r\n- Suppression d''articles\r\n- DÃ©tail d''un article\r\n- JS pour vÃ©rifier que tous les champs soient bien remplis\r\n- SystÃ¨me de recherche d''articles\r\n- Upload d''images JPEG, et redimensionnement (200px large)', 1390631193, 1),
(6, 'Test de l''image', 'Article contenant une image.', 1390630650, 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `mdp`) VALUES
(1, 'admin', 'ab4f63f9ac65152575886860dde480a1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
