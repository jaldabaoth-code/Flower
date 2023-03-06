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
    ref varchar(5) NOT NULL UNIQUE,
    name varchar(50) NOT NULL,
    PRIMARY KEY (id)
);

INSERT INTO category (`ref`, `name`) VALUES ('bul', 'Bulbs');
INSERT INTO category (`ref`, `name`) VALUES ('mas', 'Bedding plant');
INSERT INTO category (`ref`, `name`) VALUES ('ros', 'Roses');

---

CREATE TABLE IF NOT EXISTS `product` (
    id int NOT NULL AUTO_INCREMENT,
    ref varchar(5) NOT NULL UNIQUE,
    name varchar(50) NOT NULL,
    price decimal(5,2) NOT NULL,
    image varchar(50) NOT NULL,
    category_id int NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_category FOREIGN KEY (category_id) REFERENCES `category` (id)
);

INSERT INTO product (`ref`, `name`, `price`, `image`, `category_id`) VALUES ('bul01', '3 begonia bulbs', 5.00, 'begonia_bulbs', 'bul');
INSERT INTO product (`ref`, `name`, `price`, `image`, `category_id`) VALUES ('bul02', '10 dahlia bulbs', 12.00, 'dahlia_bulbs', 'bul');
INSERT INTO product (`ref`, `name`, `price`, `image`, `category_id`) VALUES ('bul03', '50 gladiolus bulbs', 9.00, 'gladiolus_bulbs', 'bul');
INSERT INTO product (`ref`, `name`, `price`, `image`, `category_id`) VALUES ('mas01', 'Set of 3 daisies', 5.00, 'massif_marguerite', 'mas');
INSERT INTO product (`ref`, `name`, `price`, `image`, `category_id`) VALUES ('mas02', 'Pour un bouquet de 6 pens�es', 6.00, 'massif_pensee', 'mas');
INSERT INTO product (`ref`, `name`, `price`, `image`, `category_id`) VALUES ('mas03', 'M�lange vari� de 10 plantes � massif', 15.00,'massif_melange', 'mas');
INSERT INTO product (`ref`, `name`, `price`, `image`, `category_id`) VALUES ('ros01', '1 pied sp�cial grandes fleurs', 20.00, 'rosiers_gdefleur', 'ros');
INSERT INTO product (`ref`, `name`, `price`, `image`, `category_id`) VALUES ('ros02', 'Une vari�t� s�lectionn�e pour son parfum', 9.00,'rosiers_parfum', 'ros');
INSERT INTO product (`ref`, `name`, `price`, `image`, `category_id`) VALUES ('ros03', 'Rosier arbuste', 8.00, 'rosiers_arbuste', 'ros');

--
-- Structure de la table `identification`
--
CREATE DATABASE `flower`;
USE `flower`;

CREATE TABLE IF NOT EXISTS `user` (
    `id` int NOT NULL AUTO_INCREMENT,
    `login` varchar(10) NOT NULL UNIQUE,
    `password` varchar(10) NOT NULL,
    `role` varchar(10) NOT NULL,
    CONSTRAINT `C1` PRIMARY KEY (`id`)
);

INSERT INTO `user` (`login`, `password`, `role`) VALUES
('test', 'test', 'ADMIN'),
('zouzou', 'zouzou', 'ADMIN');
