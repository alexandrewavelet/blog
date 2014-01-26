-- phpMyAdmin SQL Dump
-- version 4.0.3
-- http://www.phpmyadmin.net
--
-- Client: 127.0.0.1
-- Généré le: Dim 26 Janvier 2014 à 14:53
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.5.0

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
  `image` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `date`, `image`) VALUES
(1, 'Mon blog', 'Ce blog est issu d''un TP rÃ©alisÃ© lors de ma Licence.\r\n\r\ntechnologies : PHP, SQL, Smarty, Bootstrap', 1389785758, 0),
(3, 'Avancement', 'TODO\r\n-Tests \r\n\r\nDONE\r\n- Reprendre sources dans le dossier modulePHP\r\n- CrÃ©ation du dossier &quot;dev&quot; dans lequel la nouvelle version sera codÃ©e\r\n- Structure des contrÃ´leurs\r\n- Index fonctionnel\r\n- Affichage des articles avec pagination\r\n- SystÃ¨me d''identification avec sessions (avec cryptage MD5)\r\n- CrÃ©ation d''articles\r\n- Modification d''articles\r\n- Suppression d''articles\r\n- DÃ©tail d''un article\r\n- JS pour vÃ©rifier que tous les champs soient bien remplis\r\n- SystÃ¨me de recherche d''articles\r\n- Upload d''images JPEG, et redimensionnement (200px large)\r\n- SystÃ¨me de tag\r\n- Utilisation de Smarty (Framework MVC en PHP)', 1390743973, 1),
(6, 'Test de l''image', 'Article contenant une image.', 1390744003, 1),
(7, 'SystÃ¨me de tags', 'Le systÃ¨me de tags est en tests', 1390685320, 0),
(8, 'Test de smarty', 'tests des vues avec smarty', 1390744351, 1),
(10, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi.\r\nNam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non habent claritatem insitam; est usus legentis in iis qui facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius quod ii legunt saepius. Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram, anteposuerit litterarum formas humanitatis per seacula quarta decima et quinta decima.\r\nEodem modo typi, qui nunc nobis videntur parum clari, fiant sollemnes in futurum.', 1390744157, 0),
(11, 'Blog terminÃ©', 'Le dÃ©veloppement est terminÃ©!', 1390744366, 0);

-- --------------------------------------------------------

--
-- Structure de la table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `tags`
--

INSERT INTO `tags` (`id`, `tag`) VALUES
(1, 'test'),
(4, 'todo'),
(6, 'fin');

-- --------------------------------------------------------

--
-- Structure de la table `tagsarticles`
--

CREATE TABLE IF NOT EXISTS `tagsarticles` (
  `idArticle` int(11) NOT NULL,
  `idTag` int(11) NOT NULL,
  PRIMARY KEY (`idArticle`,`idTag`),
  KEY `idTag` (`idTag`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `tagsarticles`
--

INSERT INTO `tagsarticles` (`idArticle`, `idTag`) VALUES
(6, 1),
(7, 1),
(8, 1),
(3, 4),
(11, 6);

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

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `tagsarticles`
--
ALTER TABLE `tagsarticles`
  ADD CONSTRAINT `tagsarticles_ibfk_1` FOREIGN KEY (`idArticle`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tagsarticles_ibfk_2` FOREIGN KEY (`idTag`) REFERENCES `tags` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
