-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mar. 21 jan. 2020 à 08:08
-- Version du serveur :  10.3.16-MariaDB
-- Version de PHP :  7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `fruits`
--
CREATE DATABASE IF NOT EXISTS `fruits` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fruits`;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `IDFournisseur` int(2) NOT NULL,
  `RaisonSociale` varchar(36) DEFAULT NULL,
  `Profession` varchar(11) DEFAULT NULL,
  `Adresse` varchar(25) DEFAULT NULL,
  `CodePostal` int(4) DEFAULT NULL,
  `Ville` varchar(16) DEFAULT NULL,
  `Tel` int(7) DEFAULT NULL,
  `Fax` int(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`IDFournisseur`, `RaisonSociale`, `Profession`, `Adresse`, `CodePostal`, `Ville`, `Tel`, `Fax`) VALUES
(1, 'Ciccarelli Vincenzo', 'Cultivateur', 'rue des Délices 29', 1203, 'Genève', 3446858, NULL),
(2, 'Cudet Alexandre', 'Maraîcher', 'rte de Bossey 91', 1256, 'Troinex', 7843655, 7843703),
(3, 'Aux Quatre Saisons', 'Cultivateur', 'rue Cingria 71', 1202, 'Genève', 7330172, NULL),
(4, 'Ronin Primeurs SA', 'Maraîcher', 'rte de Base 74', 1258, 'Perly', 7712857, NULL),
(5, 'Finaz Roger SA', 'Cultivateur', 'rue Blavignac 19', 1227, 'Carouge', 3424920, 3426516),
(6, 'Leon Primeurs', 'Vendeur', 'ch. de la Bride 2', 1224, 'Chêne-Bougeries', 8600801, 8600804),
(7, 'Delavy Louis', 'Cultivateur', 'rte de Bossey 74', 1256, 'Troinex', 7843203, 7842327),
(8, 'Vuillod Pierre-André', 'Cultivateur', 'rte de Foliaz 46', 1257, 'Croix-de-Rozon', 7711943, 7714338),
(9, 'Goumaz SA', 'Vendeur', 'ch. des Bossonailles 21', 1222, 'Vésenaz', 7521756, NULL),
(10, 'Brasier François SA', 'Maraîcher', 'rue Blavignac 17', 1227, 'Carouge', 8274610, 3437141),
(11, 'Troller Heinz', 'Maraîcher', 'ch. d\'Archamps 36', 1257, 'Croix-de-Rozon', 7712224, NULL),
(12, 'Sobrino Jorge', 'Cultivateur', 'rue Vélodrome 2', 1205, 'Genève', 7813961, NULL),
(13, 'Mossière Gérard', 'Maraîcher', 'rte de Cornière 49', 1241, 'Puplinge', 3497582, NULL),
(14, 'Boehm Pierre', 'Vendeur', 'ch. du Creux-du-Cheval 11', 1212, 'Grand-Lancy', 7942846, NULL),
(15, 'Salagastronomie des Grands-Champs SA', 'Maraîcher', 'rte de la Galaise 62', 1232, 'Confignon', 7942053, NULL),
(16, 'Marché Rieu-Tour', 'Vendeur', 'ch. Bizot 4', 1208, 'Genève', 3460696, 3460063),
(17, 'Bravin Serge', 'Maraîcher', 'ch. des Verjus 93', 1212, 'Grand-Lancy', 7941391, NULL),
(18, 'Trembley et Burgermeister SA', 'Vendeur', 'rte des Jeunes 49', 1227, 'Carouge', 8200530, 3433132);

-- --------------------------------------------------------

--
-- Structure de la table `fruit`
--

CREATE TABLE `fruit` (
  `IDFruit` int(3) NOT NULL,
  `IDFournisseur` int(2) NOT NULL,
  `NomFruit` varchar(35) DEFAULT NULL,
  `IDGenre` int(11) NOT NULL,
  `IDPays` int(11) NOT NULL,
  `PrixKilo` decimal(17,15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fruit`
--

INSERT INTO `fruit` (`IDFruit`, `IDFournisseur`, `NomFruit`, `IDGenre`, `IDPays`, `PrixKilo`) VALUES
(1, 8, 'Madeleine blanche', 1, 1, '14.350000000000000'),
(2, 9, 'Brugnon violet', 1, 2, '27.400000000000000'),
(3, 13, 'Musquat-Robert', 2, 3, '19.900000000000000'),
(4, 10, 'Ambrette', 2, 4, '26.050000000000000'),
(5, 1, 'Petit abricot en Angoumois', 3, 5, '26.500000000000000'),
(6, 5, 'Francatu', 4, 4, '26.300000000000000'),
(7, 12, 'La Verte', 5, 3, '28.875000000000000'),
(8, 13, 'L\'Angélique', 5, 2, '12.600000000000000'),
(9, 13, 'Calville d\'Eté blanche et rouge', 4, 1, '26.550000000000000'),
(10, 16, 'Violette hâtive', 1, 1, '26.700000000000000'),
(11, 16, 'Bourdon', 2, 6, '23.150000000000000'),
(12, 1, 'Besi de la Motte', 2, 2, '26.850000000000000'),
(13, 17, 'Pêche-Alberge rouge', 1, 7, '20.000000000000000'),
(14, 16, 'Raisin de Corinthe', 6, 3, '25.250000000000000'),
(15, 15, 'Courpendu ou Pomme de Bardin', 4, 4, '16.000000000000000'),
(16, 17, 'Pomme-rose', 4, 8, '15.100000000000000'),
(17, 6, 'Pêche-cerise à chair blanche', 1, 7, '14.750000000000000'),
(18, 4, 'Verte-Longue', 2, 9, '8.650000000000000'),
(19, 7, 'Pucelle de Saintonge', 2, 3, '20.850000000000000'),
(20, 14, 'Bourdelais', 6, 9, '23.150000000000000'),
(21, 16, 'Beurré', 2, 8, '29.050000000000000'),
(22, 6, 'Cioutat', 6, 6, '28.450000000000000'),
(23, 9, 'Pucelle de Flandres', 2, 9, '19.250000000000000'),
(24, 2, 'Blanquette à longue queue', 2, 7, '25.600000000000000'),
(25, 12, 'Grosse jaune tardive', 1, 6, '13.300000000000000'),
(26, 12, 'Prune de Perdrigon violet', 7, 6, '13.150000000000000'),
(27, 18, 'Drue-permein d\'Angleterre', 4, 5, '14.450000000000000'),
(28, 11, 'Robine', 2, 1, '16.250000000000000'),
(29, 9, 'Cuisse-Madame', 2, 1, '9.600000000000000'),
(30, 15, 'Crassane', 2, 5, '22.200000000000000'),
(31, 16, 'Petite avant pêche blanche', 1, 2, '16.550000000000000'),
(32, 18, 'Satin-vert', 2, 7, '17.750000000000000'),
(33, 6, 'Amadotte', 2, 8, '7.150000000000000'),
(34, 4, 'Rouvezeau', 4, 1, '24.700000000000000'),
(35, 3, 'Reinette grise et blanche', 4, 3, '21.650000000000000'),
(36, 1, 'La Princesse', 2, 5, '21.850000000000000'),
(37, 14, 'Cerises-précoces', 8, 4, '16.950000000000000'),
(38, 8, 'Prune de Mirabelle', 7, 4, '18.250000000000000'),
(39, 1, 'Pêche de Pau', 1, 10, '26.200000000000000'),
(40, 17, 'Persique', 1, 2, '15.850000000000000'),
(41, 12, 'Chasselas', 6, 8, '19.350000000000000'),
(42, 5, 'Raisin précoce ou morillon noir', 6, 3, '17.900000000000000'),
(43, 4, 'Rambour', 4, 4, '11.350000000000000'),
(44, 10, 'La grosse violette', 5, 3, '9.922499999999999'),
(45, 1, 'Cousinotte', 4, 1, '13.600000000000000'),
(46, 17, 'Api', 4, 11, '9.800000000000001'),
(47, 6, 'Lansac', 2, 3, '9.350000000000000'),
(48, 9, 'Epine', 2, 6, '15.400000000000000'),
(49, 8, 'Bugi', 2, 8, '16.850000000000000'),
(50, 2, 'Pomme violette', 4, 7, '23.050000000000000'),
(51, 18, 'Musquat fleuri', 2, 3, '24.800000000000000'),
(52, 17, 'Colmar', 2, 8, '14.350000000000000'),
(53, 3, 'Petit-Blanquet', 2, 8, '8.600000000000000'),
(54, 2, 'Fenouillet ou Pomme d\'Anis', 4, 2, '14.000000000000000'),
(55, 13, 'Fondante de Brest', 2, 6, '20.500000000000000'),
(56, 18, 'Jerusalem', 4, 7, '5.600000000000000'),
(57, 5, 'Grosse-blanche', 5, 7, '28.822500000000000'),
(58, 4, 'Chataîgnier ou Martrange', 4, 9, '26.100000000000000'),
(59, 7, 'Petit Pavie-Alberge violet', 1, 2, '6.250000000000000'),
(60, 1, 'Guignes', 8, 11, '16.500000000000000'),
(61, 3, 'Mignonne', 1, 1, '15.100000000000000'),
(62, 6, 'Nivette', 1, 6, '24.300000000000000'),
(63, 12, 'La Noire', 5, 1, '6.982500000000000'),
(64, 16, 'Pêche royale', 1, 4, '16.300000000000000'),
(65, 4, 'Bourdin', 1, 2, '22.900000000000000'),
(66, 17, 'Bergamotte', 2, 7, '20.800000000000000'),
(67, 15, 'Pêche d\'Italie', 1, 2, '23.350000000000000'),
(68, 4, 'Poire de vigne ou de Demoiselle', 2, 5, '25.150000000000000'),
(69, 14, 'Saint-Lezin', 2, 7, '13.400000000000000'),
(70, 2, 'Messire Jean', 2, 10, '10.900000000000000'),
(71, 3, 'Petit-Musquat', 2, 2, '13.150000000000000'),
(72, 7, 'Calville d\'Automne', 4, 4, '18.400000000000000'),
(73, 4, 'Figue-Médot', 5, 9, '18.112500000000000'),
(74, 18, 'Bon-chrétien d\'Hyver', 2, 9, '12.100000000000000'),
(75, 14, 'Leschasserie', 2, 10, '27.150000000000000'),
(76, 10, 'Violette tardive', 1, 9, '21.900000000000000'),
(77, 14, 'Poire de Ronville', 2, 9, '14.850000000000000'),
(78, 8, 'Bigarreau', 8, 5, '28.100000000000000'),
(79, 12, 'Marquise', 2, 11, '14.100000000000000'),
(80, 15, 'cerises coulardes', 8, 1, '19.850000000000000'),
(81, 12, 'Portail', 2, 1, '8.699999999999999'),
(82, 17, 'Petite Bourjassotte', 5, 4, '30.292500000000000'),
(83, 2, 'Saint-Augustin', 2, 2, '19.650000000000000'),
(84, 15, 'pomme-figue', 4, 1, '26.250000000000000'),
(85, 11, 'Musquat-l\'Alleman', 2, 8, '8.650000000000000'),
(86, 9, 'Gros Pavie rouge de Pomponne', 1, 2, '23.350000000000000'),
(87, 4, 'Pêche de Troye', 1, 7, '21.900000000000000'),
(88, 7, 'Espargne', 2, 1, '22.050000000000000'),
(89, 12, 'La grosse jaune', 5, 8, '10.815000000000000'),
(90, 10, 'La Roche-courbon', 7, 5, '27.100000000000000'),
(91, 15, 'Grosse-Musc', 2, 4, '14.050000000000000'),
(92, 11, 'Rossane', 1, 11, '18.800000000000000'),
(93, 17, 'Prune d\'Abricot', 7, 4, '5.700000000000000'),
(94, 17, 'Belle-garde', 1, 6, '17.850000000000000'),
(95, 6, 'Rousselelt', 2, 6, '25.900000000000000'),
(96, 5, 'Pomme de glace', 4, 8, '13.050000000000000'),
(97, 16, 'Pêche cerise à chair jaune', 1, 5, '25.500000000000000'),
(98, 9, 'Pendar', 2, 9, '20.800000000000000'),
(99, 7, 'Rousseline', 2, 9, '20.300000000000000'),
(100, 1, 'Martin Sec', 2, 2, '21.050000000000000'),
(101, 17, 'Abricot ordinaire', 3, 4, '8.750000000000000'),
(102, 10, 'Petite blanche ou précoce', 5, 4, '11.287500000000000'),
(103, 2, 'L\'Admirable', 1, 1, '9.100000000000000'),
(104, 10, 'Poire d\'Ambre', 2, 8, '18.000000000000000'),
(105, 15, 'Pêche pourprée', 1, 2, '27.750000000000000'),
(106, 16, 'Madeleine rouge', 1, 11, '22.100000000000000'),
(107, 5, 'Petit-Oin', 2, 9, '20.000000000000000'),
(108, 3, 'Griotte', 8, 8, '13.000000000000000'),
(109, 18, 'Virgoulé', 2, 10, '25.250000000000000'),
(110, 13, 'Pêche-Alberge jaune et Petit Pavie', 1, 2, '24.100000000000000'),
(111, 17, 'Saint-Germain', 2, 6, '15.050000000000000'),
(112, 7, 'Amiré-roux', 2, 9, '24.350000000000000'),
(113, 7, 'Prune de Sainte-Catherine', 7, 11, '25.450000000000000'),
(114, 8, 'Cassolette', 2, 5, '14.950000000000000'),
(115, 8, 'Grosse Musquée de Coué', 2, 2, '23.000000000000000'),
(116, 7, 'Cerises à confire de Montmorency', 8, 7, '19.850000000000000'),
(117, 3, 'Poire Magdeleine', 2, 7, '26.600000000000000'),
(118, 15, 'La petite figue grise, ou Melete', 5, 8, '26.617500000000000'),
(119, 2, 'Poire sans peau', 2, 2, '18.500000000000000'),
(120, 13, 'Pomme d\'Etoile', 4, 3, '10.500000000000000'),
(121, 6, 'L\'impératrice', 7, 11, '8.949999999999999'),
(122, 7, 'Orange verte', 2, 1, '12.500000000000000'),
(123, 18, 'Abricot hâtif', 3, 8, '7.300000000000000'),
(124, 5, 'Sucré-vert', 2, 2, '6.450000000000000'),
(125, 11, 'Blanche d\'Andilly', 1, 6, '6.550000000000000'),
(126, 17, 'Pavie- Rossane', 1, 11, '29.600000000000000'),
(127, 1, 'Louise-Bonne', 2, 8, '21.500000000000000'),
(128, 12, 'Chevreuse', 1, 4, '24.100000000000000'),
(129, 14, 'Haute-Bonté ou blandilalie', 4, 8, '12.300000000000000'),
(130, 12, 'Gros-Blanquet', 2, 4, '8.850000000000000'),
(131, 7, 'Inconnue Chéneau', 2, 7, '8.900000000000000'),
(132, 12, 'Non commune des défunts', 2, 5, '29.450000000000000'),
(133, 2, 'Petit-bon', 4, 11, '10.000000000000000'),
(134, 2, 'Orgeran', 4, 4, '21.450000000000000'),
(135, 18, 'Pavie blanc', 1, 9, '8.199999999999999');

-- --------------------------------------------------------

--
-- Structure de la table `genre`
--

CREATE TABLE `genre` (
  `IDGenre` int(11) NOT NULL,
  `GenreFruit` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `genre`
--

INSERT INTO `genre` (`IDGenre`, `GenreFruit`) VALUES
(1, 'Pêche'),
(2, 'Poire'),
(3, 'Abricot'),
(4, 'Pomme'),
(5, 'Figue'),
(6, 'Raisin'),
(7, 'Prune'),
(8, 'Cerise');

-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE `pays` (
  `IDPays` int(11) NOT NULL,
  `NomPays` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `pays`
--

INSERT INTO `pays` (`IDPays`, `NomPays`) VALUES
(1, 'Birmanie'),
(2, 'Mexique'),
(3, 'Italie'),
(4, 'France'),
(5, 'Grande-Bretagne'),
(6, 'Espagne'),
(7, 'Belgique'),
(8, 'Portugal'),
(9, 'Chili'),
(10, 'Suisse'),
(11, 'Allemagne');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`IDFournisseur`);

--
-- Index pour la table `fruit`
--
ALTER TABLE `fruit`
  ADD PRIMARY KEY (`IDFruit`),
  ADD KEY `IDFournisseur` (`IDFournisseur`),
  ADD KEY `IDGenre` (`IDGenre`),
  ADD KEY `IDPays` (`IDPays`);

--
-- Index pour la table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`IDGenre`);

--
-- Index pour la table `pays`
--
ALTER TABLE `pays`
  ADD PRIMARY KEY (`IDPays`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `genre`
--
ALTER TABLE `genre`
  MODIFY `IDGenre` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT pour la table `pays`
--
ALTER TABLE `pays`
  MODIFY `IDPays` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `fruit`
--
ALTER TABLE `fruit`
  ADD CONSTRAINT `fruit_ibfk_1` FOREIGN KEY (`IDFournisseur`) REFERENCES `fournisseur` (`IDFournisseur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fruit_ibfk_2` FOREIGN KEY (`IDGenre`) REFERENCES `genre` (`idGenre`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fruit_ibfk_3` FOREIGN KEY (`IDPays`) REFERENCES `pays` (`IDPays`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
