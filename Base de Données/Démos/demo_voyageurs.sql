-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  ven. 17 jan. 2020 à 10:44
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
-- Base de données :  `voyageurs`
--
CREATE DATABASE IF NOT EXISTS `voyageurs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `voyageurs`;

-- --------------------------------------------------------

--
-- Structure de la table `activite`
--

CREATE TABLE `activite` (
  `codeActivite` varchar(15) NOT NULL,
  `codeLogement` varchar(2) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `activite`
--

INSERT INTO `activite` (`codeActivite`, `codeLogement`, `description`) VALUES
('Piscine', 'ge', 'Nage loisir non encadrée'),
('Plongée', 'pi', 'Baptèmes et préparation des brevets'),
('Randonnée', 'ca', 'Sorties d\'une journée en groupe'),
('Ski', 'ge', 'Sur piste uniquement'),
('Voile', 'pi', 'Pratique du dériveur et du catamaran');

-- --------------------------------------------------------

--
-- Structure de la table `logement`
--

CREATE TABLE `logement` (
  `code` varchar(2) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `capacite` int(11) NOT NULL,
  `type` varchar(255) NOT NULL,
  `lieu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `logement`
--

INSERT INTO `logement` (`code`, `nom`, `capacite`, `type`, `lieu`) VALUES
('ca', 'Causses', 45, 'Auberge', 'Cévennes'),
('ge', 'Génépi', 134, 'Hôtel', 'Alpes'),
('pi', 'U Pinzutu', 10, 'Gîte', 'Corse'),
('ta', 'Tabriz', 34, 'Hôtel', 'Bretagne');

-- --------------------------------------------------------

--
-- Structure de la table `sejour`
--

CREATE TABLE `sejour` (
  `idSejour` int(11) NOT NULL,
  `idVoyageur` int(11) NOT NULL,
  `codeLogement` varchar(2) NOT NULL,
  `debut` int(11) NOT NULL,
  `fin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `sejour`
--

INSERT INTO `sejour` (`idSejour`, `idVoyageur`, `codeLogement`, `debut`, `fin`) VALUES
(1, 10, 'pi', 20, 20),
(2, 20, 'ta', 21, 22),
(3, 30, 'ge', 2, 3),
(4, 20, 'pi', 19, 23),
(5, 20, 'ge', 22, 24),
(6, 10, 'pi', 10, 12),
(7, 30, 'ca', 13, 18);

-- --------------------------------------------------------

--
-- Structure de la table `voyageur`
--

CREATE TABLE `voyageur` (
  `idVoyageur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `ville` varchar(255) NOT NULL,
  `region` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `voyageur`
--

INSERT INTO `voyageur` (`idVoyageur`, `nom`, `prenom`, `ville`, `region`) VALUES
(10, 'Fogg', 'Phileas', 'Ajaccio', 'Corse'),
(20, 'Bouvier', 'Nicolas', 'Aurillac', 'Auvergne'),
(30, 'David-Néel', 'Alexandra', 'Lhassa', 'Tibet'),
(40, 'Stevenson', 'Robert Louis', 'Vannes', 'Bretagne');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `activite`
--
ALTER TABLE `activite`
  ADD PRIMARY KEY (`codeActivite`,`codeLogement`),
  ADD KEY `codeLogement` (`codeLogement`);

--
-- Index pour la table `logement`
--
ALTER TABLE `logement`
  ADD PRIMARY KEY (`code`);

--
-- Index pour la table `sejour`
--
ALTER TABLE `sejour`
  ADD PRIMARY KEY (`idSejour`),
  ADD KEY `idVoyageur` (`idVoyageur`),
  ADD KEY `codeLogement` (`codeLogement`);

--
-- Index pour la table `voyageur`
--
ALTER TABLE `voyageur`
  ADD PRIMARY KEY (`idVoyageur`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `sejour`
--
ALTER TABLE `sejour`
  MODIFY `idSejour` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `activite`
--
ALTER TABLE `activite`
  ADD CONSTRAINT `activite_ibfk_1` FOREIGN KEY (`codeLogement`) REFERENCES `logement` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `sejour`
--
ALTER TABLE `sejour`
  ADD CONSTRAINT `sejour_ibfk_1` FOREIGN KEY (`idVoyageur`) REFERENCES `voyageur` (`idVoyageur`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `sejour_ibfk_2` FOREIGN KEY (`codeLogement`) REFERENCES `logement` (`code`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
