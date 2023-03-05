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
    id int NOT NULL AUTO_INCREMENT,
    name varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO category (`name`) VALUES ('Bulbs');
INSERT INTO category (`name`) VALUES ('Bedding plant');
INSERT INTO category (`name`) VALUES ('Roses');

CREATE TABLE product (
  id char(3) NOT NULL,
  pdt_ref char(3) NOT NULL,
  name varchar(50) NOT NULL,
  pdt_prix decimal(5,2) NOT NULL,
  image varchar(50) NOT NULL,
  category char(3) NOT NULL,
  PRIMARY KEY  (pdt_ref),
  CONSTRAINT FK_ref FOREIGN KEY (category) REFERENCES category (cat_code)
) TYPE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO produit VALUES ('b01','3 bulbes de b�gonias',"5.00",'bulbes_begonia','bul');
INSERT INTO produit VALUES ('b02','10 bulbes de dahlias',"12.00",'bulbes_dahlia','bul');
INSERT INTO produit VALUES ('b03','50 gla�euls',"9.00",'bulbes_glaieul','bul');
INSERT INTO produit VALUES ('m01','Lot de 3 marguerites',"5.00",'massif_marguerite','mas');
INSERT INTO produit VALUES ('m02','Pour un bouquet de 6 pens�es',"6.00",'massif_pensee','mas');
INSERT INTO produit VALUES ('m03','M�lange vari� de 10 plantes � massif',"15.00",'massif_melange','mas');
INSERT INTO produit VALUES ('r01','1 pied sp�cial grandes fleurs',"20.00",'rosiers_gdefleur','ros');
INSERT INTO produit VALUES ('r02','Une vari�t� s�lectionn�e pour son parfum',"9.00",'rosiers_parfum','ros');
INSERT INTO produit VALUES ('r03','Rosier arbuste',"8.00",'rosiers_arbuste','ros');

--
-- Structure de la table `identification`
--
CREATE DATABASE `flower`;
USE `flower`;

CREATE TABLE IF NOT EXISTS `user` (
    `id` int NOT NULL AUTO_INCREMENT,
    `login` varchar(10) NOT NULL,
    `password` varchar(10) NOT NULL,
    `role` varchar(10) NOT NULL,
    CONSTRAINT `C1` PRIMARY KEY (`id`)
);

INSERT INTO `user` (`login`, `password`, `role`) VALUES
('test', 'test', 'ADMIN'),
('zouzou', 'zouzou', 'ADMIN');
