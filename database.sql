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
  `id` char(3) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO category VALUES ('bul','Bulbes');
INSERT INTO category VALUES ('mas','Plantes � massif');
INSERT INTO category VALUES ('ros','Rosiers');

CREATE TABLE product (
  id char(3) NOT NULL DEFAULT '',
  pdt_ref char(3) NOT NULL default '',
  name varchar(50) NOT NULL default '',
  pdt_prix decimal(5,2) NOT NULL default '0.00',
  image varchar(50) NOT NULL default '',
  category char(3) NOT NULL default '',
  PRIMARY KEY  (pdt_ref),
  CONSTRAINT FK_ref FOREIGN KEY (category) REFERENCES category (cat_code)
) TYPE=InnoDB DEFAULT CHARSET=latin1;