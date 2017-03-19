-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Jeu 16 Avril 2015 à 15:52
-- Version du serveur :  5.6.17
-- Version de PHP :  5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `sorbonnart`
--

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_peinture` int(11) NOT NULL,
  `email` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Contenu de la table `favoris`
--

INSERT INTO `favoris` (`id`, `id_peinture`, `email`) VALUES
(6, 12, 'marvin@marvin.com'),
(5, 5, 'marvin@marvin.com');

-- --------------------------------------------------------

--
-- Structure de la table `identifications`
--

CREATE TABLE IF NOT EXISTS `identifications` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `identifications`
--

INSERT INTO `identifications` (`id`, `login`, `password`) VALUES
(7, 'jean_delzennefr@msn.com', 'yeshua'),
(6, 'domiciladorer@gmail.com', 'yeshua'),
(8, 'ep@exagenie.fr', '1968de'),
(9, 'meghan@gmail.com', 'meghan'),
(10, 'camilledoublet@gmail.com', 'james'),
(11, 'yeshua@gmail.com', 'yeshua'),
(12, 'amaury@gmail.com', 'azert'),
(13, 'james@gmail.com', 'killbill'),
(14, 'marvin@marvin.com', 'yeshua');

-- --------------------------------------------------------

--
-- Structure de la table `peintures`
--

CREATE TABLE IF NOT EXISTS `peintures` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) NOT NULL,
  `nom_peintre` varchar(255) NOT NULL,
  `id_peintre` int(11) NOT NULL,
  `url_peintre` varchar(1000) NOT NULL,
  `url` varchar(1000) NOT NULL,
  `mouvement` varchar(255) NOT NULL,
  `theme` varchar(255) NOT NULL,
  `url_theme` varchar(1000) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `peintures`
--

INSERT INTO `peintures` (`id`, `nom`, `nom_peintre`, `id_peintre`, `url_peintre`, `url`, `mouvement`, `theme`, `url_theme`) VALUES
(1, 'La liberté guidant le peuple', 'Eugène Delacroix', 1, 'images/delacroix.jpg', 'images/liberte.jpg', 'Romantisme', 'Allegorie', 'images/allegorie.jpg'),
(2, 'La noce juive au maroc', 'Eugène Delacroix', 1, 'images/delacroix.jpg', 'images/lanocejuive.jpg', 'Romantisme', 'Orientalisme', 'images/orientalisme.jpg'),
(3, 'Lever de Lune', 'Gaspard David Friedrich', 2, 'images/friedrich.jpg', 'images/leverdelune.jpg', 'Romantisme', 'Paysage', 'images/paysage.jpg'),
(4, 'Le promeneur au-dessus de la mer de nuage', 'Gaspard David Friedrich', 2, 'images/friedrich.jpg', 'images/promeneur.jpg', 'Romantisme', 'Paysage', 'images/paysage.jpg'),
(5, 'Impression soleil levant', 'Claude Monet', 3, 'images/monet.jpg', 'images/impression.jpg', 'Impressionisme', 'Paysage', 'images/paysage.jpg'),
(6, 'Le pont Japonais', 'Claude Monet', 3, 'images/monet.jpg', 'images/pontjaponais.jpg', 'Impressionisme', 'Paysage', 'images/paysage.jpg'),
(7, 'L''église d''Auvers sur oise', 'Vincent Van-gogh', 4, 'images/vangogh.jpg', 'images/eglise.jpg', 'Impressionisme', 'Paysage', 'images/paysage.jpg'),
(8, 'Tournesols', 'Vincent Van-gogh', 4, 'images/vangogh.jpg', 'images/tournesol.jpg', 'Impressionisme', 'Nature Morte', 'images/naturemorte.jpg'),
(9, 'La tentation de saint-Antoine', 'Salvador Dali', 5, 'images/dali.jpg', 'images/animaux.jpg', 'Surrealisme', 'Allegorie', 'images/allegorie.jpg'),
(10, 'La persistance de la mémoire', 'Salvador Dali', 5, 'images/dali.jpg', 'images/montres.jpg', 'Surrealisme', 'Paysage', 'images/paysage.jpg'),
(11, 'Le fils de l''homme', 'René Magritte', 6, 'images/magritte.jpg', 'images/pomme.jpg', 'Surrealisme', 'Portrait', 'images/portrait.jpg'),
(12, 'La trahison des images', 'René Magritte', 6, 'images/magritte.jpg', 'images/pipe.jpg', 'Surrealisme', 'Nature Morte', 'images/naturemorte.jpg'),
(13, 'Portrait de Marie Walter', 'Pablo Picasso', 7, 'images/picasso.jpg', 'images/marie.jpg', 'Cubisme', 'Portrait', 'images/portrait.jpg'),
(14, 'Guernica', 'Pablo Picasso', 7, 'images/picasso.jpg', 'images/guernica.jpg', 'Cubisme', 'Historique', 'images/historique.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `pseudos`
--

CREATE TABLE IF NOT EXISTS `pseudos` (
  `email` varchar(50) NOT NULL,
  `pseudos` varchar(20) NOT NULL,
  `Lieu` varchar(1000) NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `pseudos`
--

INSERT INTO `pseudos` (`email`, `pseudos`, `Lieu`) VALUES
('domiciladorer@gmail.com', 'Martin','',''),
('jean_delzennefr@msn.com', 'Marth','' ,''),
('ep@exagenie.fr', 'Eric', '', ''),
('meghan@gmail.com', 'Meg', '', ''),
('camilledoublet@gmail.com', 'Camille', '', ''),
('amaury@gmail.com', 'Amaury', '', ''),
('yeshua@gmail.com', 'yeshua','',''),
('james@gmail.com', 'James', '', ''),
('marvin@marvin.com', 'Marvin', '', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
