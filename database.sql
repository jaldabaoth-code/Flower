--
-- Base de données: `lafleurv2`
--
CREATE DATABASE `lafleurv2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lafleurv2`;

-- --------------------------------------------------------

--
-- Structure de la table `categorie`
--

CREATE TABLE IF NOT EXISTS `category` (
  `cat_code` char(3) NOT NULL DEFAULT '',
  `cat_libelle` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

