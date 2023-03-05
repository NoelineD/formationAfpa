-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  Dim 19 jan. 2020 à 22:12
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
-- Base de données :  `celebrites`
--
CREATE DATABASE IF NOT EXISTS `celebrites` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `celebrites`;

-- --------------------------------------------------------

--
-- Structure de la table `celebrite`
--

CREATE TABLE `celebrite` (
  `IDCeleb` int(3) NOT NULL,
  `civilite` varchar(12) DEFAULT NULL,
  `nom` varchar(11) DEFAULT NULL,
  `prenom` varchar(10) DEFAULT NULL,
  `activite` varchar(9) DEFAULT NULL,
  `paysOrigine` varchar(24) DEFAULT NULL,
  `etatCivil` varchar(12) DEFAULT NULL,
  `decede` varchar(1) DEFAULT NULL,
  `dateNaiss` date DEFAULT NULL,
  `remarque` varchar(90) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `celebrite`
--

INSERT INTO `celebrite` (`IDCeleb`, `civilite`, `nom`, `prenom`, `activite`, `paysOrigine`, `etatCivil`, `decede`, `dateNaiss`, `remarque`) VALUES
(7, 'Monsieur', 'Lhermitte', 'Thierry', 'Cinéma', 'France', 'Marié(e)', NULL, '1960-06-15', '\"le dîner de con\"'),
(8, 'Monsieur', 'Ford', 'Harison', 'Cinéma', 'Etats-Unis', 'Marié(e)', NULL, '1950-12-25', NULL),
(9, 'Monsieur', 'Luchini', 'Fabrice', 'Cinéma', 'France', 'Marié(e)', NULL, '1953-06-01', NULL),
(10, 'Monsieur', 'Stallone', 'Silvester', 'Cinéma', 'Etats-Unis', 'Marié(e)', NULL, '1951-02-14', 'tres costaud'),
(11, 'Monsieur', 'Sirven', 'Alfred', 'Affaires', 'France', 'Marié(e)', NULL, '1938-04-25', NULL),
(13, 'Madame', 'Dion', 'Céline', 'Chanson', 'Canada', 'Marié(e)', NULL, '1966-02-15', 'Très bonne chanteuse'),
(14, 'Monsieur', 'Dave', NULL, 'Chanson', 'Maroc', 'Marié(e)', NULL, '1955-04-02', 'Plus très à la mode !'),
(15, 'Madame', 'Bouquet', 'Carole', 'Cinéma', 'France', 'Marié(e)', NULL, '1950-12-18', NULL),
(18, 'Madame', 'Laure', 'Carole', 'Chanson', 'Canada', 'Marié(e)', NULL, '1945-02-10', 'très Chanel'),
(19, 'Monsieur', 'Zinedine', 'Zidane', 'Sport', 'France', 'Marié(e)', NULL, '1970-07-02', 'On est les champions !!!'),
(20, 'Monsieur', 'Mac Cartney', 'Paul', 'Chanson', 'Royaume-Uni', 'Marié(e)', NULL, '1943-11-14', NULL),
(22, 'Monsieur', 'Gates', 'Bill', 'Affaires', 'Etats-Unis', 'Divorcé(e)', NULL, '1949-02-25', 'Homme d\'affaires très riche'),
(23, 'Monsieur', 'Clinton', 'Bill', 'Politique', 'Etats-Unis', 'Marié(e)', NULL, '1939-01-03', 'Un ancien Président'),
(25, 'Monsieur', 'Gibson', 'Mel', 'Cinéma', 'Etats-Unis', 'Marié(e)', NULL, '1960-05-25', 'A joué dans le film Tequila Sunrise'),
(26, 'Monsieur', 'Benigni', 'Roberto', 'Cinéma', 'Italie', 'Marié(e)', NULL, '1953-05-17', NULL),
(27, 'Madame', 'Goya', 'Chantal', 'Chanson', 'France', 'Marié(e)', NULL, '1942-06-10', 'Rien à dire'),
(28, 'Monsieur', 'Rosset', 'Marc', 'Sport', 'Suisse', 'Célibataire', NULL, '1974-12-31', 'Un sportif Genevois'),
(29, 'Monsieur', 'Hardi', 'Lorel', 'Cinéma', 'Etats-Unis', 'Marié(e)', '1', '1910-02-10', 'comique silencieux'),
(30, 'Monsieur', 'Neplaz', 'Bernard', 'Affaires', 'France', 'Marié(e)', NULL, '1950-12-12', 'Maire de Sciez - Fr'),
(31, 'Monsieur', 'Bonaparte', 'Napoléon', 'Politique', 'France', 'Marié(e)', '1', '1769-08-15', 'Il est Corse en fait'),
(32, 'Mademoiselle', 'Spears', 'Britney', 'Chanson', 'Etats-Unis', 'Célibataire', NULL, '1980-05-02', NULL),
(35, 'Monsieur', 'Brel', 'Jacques', 'Chanson', 'Belgique', NULL, '1', '1928-02-14', NULL),
(36, 'Monsieur', 'Lennon', 'John', 'Chanson', 'Royaume-Uni', 'Marié(e)', '1', '1949-08-04', 'Imagine, Stand by Me, etc'),
(38, 'Monsieur', 'Brassens', 'Georges', 'Chanson', 'France', 'Marié(e)', '1', '1931-08-01', 'Un des plus grands poêtes de tous les temps.Il à notamment chanté \"Les copains d\'abord\"'),
(40, 'Monsieur', 'Merckx', 'Eddy', 'Sport', 'Belgique', 'Marié(e)', NULL, '1941-05-04', NULL),
(44, 'Monsieur', 'Balladur', 'Edouard', 'Politique', 'France', 'Marié(e)', NULL, '1930-07-04', NULL),
(47, 'Monsieur', 'Borg', 'Björn', 'Sport', 'Suède', 'Divorcé(e)', NULL, '1956-08-15', 'Retraité'),
(48, 'Madame', 'Brigitte', 'Bardot', 'Cinéma', 'France', 'Divorcé(e)', NULL, '1935-06-15', NULL),
(49, 'Monsieur', 'Bush', 'Georges', 'Politique', 'Etats-Unis', 'Marié(e)', NULL, '1946-07-06', 'En devenir!?'),
(50, 'Monsieur', 'Cabrel', 'Francis', 'Chanson', 'France', 'Marié(e)', NULL, '1960-10-07', NULL),
(52, 'Monsieur', 'Chaplin', 'Charlie', 'Cinéma', 'Etats-Unis', 'Marié(e)', '1', '1923-11-17', 'Meilleur acteur \"muet\"'),
(55, 'Monsieur', 'Coluche', NULL, 'Autre', 'France', 'Célibataire', '1', '1960-05-28', 'Le comique le plus drôle du monde'),
(58, 'Monsieur', 'Depardieu', 'Gérard', 'Cinéma', 'France', 'Marié(e)', NULL, '1948-12-27', 'Beaucoup de bons films'),
(60, 'Madame', 'Folly', 'Liane', 'Chanson', 'France', 'Célibataire', NULL, '1960-06-04', NULL),
(62, 'Monsieur', 'Gorbatchev', 'Michael', 'Politique', 'Russie (Fédération de)', 'Célibataire', NULL, '1930-09-25', NULL),
(63, 'Monsieur', 'Indurain', 'Miguel', 'Sport', 'Espagne', 'Marié(e)', NULL, '1972-02-29', NULL),
(65, 'Monsieur', 'Le Gaulois', 'Astérix', 'Autre', 'France', 'Célibataire', NULL, '1950-01-01', NULL),
(68, 'Monsieur', 'Michel', 'Piccoli', 'Cinéma', 'France', 'Célibataire', NULL, '1930-02-05', NULL),
(69, 'Monsieur', 'Mitterand', 'François', 'Politique', 'France', 'Marié(e)', '1', '1912-12-12', 'Ancien Président Français'),
(70, 'Mademoiselle', 'Monroe', 'Marilyn', 'Cinéma', 'Etats-Unis', 'Célibataire', '1', '1935-09-12', 'Fausse-blonde'),
(71, 'Monsieur', 'Nastase', 'Illie', 'Sport', 'Etats-Unis', 'Célibataire', NULL, '1963-05-30', NULL),
(72, 'Monsieur', 'Pacino', 'Al', 'Cinéma', 'Saint-Marin', 'Marié(e)', NULL, '1950-06-15', 'Acteur de cinéma de très bon niveau'),
(73, 'Monsieur', 'Picasso', 'Pablo', 'Arts', 'Espagne', 'Marié(e)', '1', '1900-06-05', NULL),
(74, 'Monsieur', 'Reno', 'Jean', 'Cinéma', 'France', 'Marié(e)', NULL, '1948-07-30', 'En attente de son prochain film'),
(75, 'Mademoiselle', 'Roberts', 'Julia', 'Cinéma', 'France', 'Célibataire', NULL, '1975-08-12', 'Actrice de cinéma des années 2000'),
(77, 'Monsieur', 'Sampras', 'Pete', 'Sport', 'Etats-Unis', 'Célibataire', NULL, '1965-01-25', 'Meilleur joueur de tennis'),
(78, 'Monsieur', 'Simon', 'Michel', 'Cinéma', 'Suisse', 'Célibataire', '1', '1895-04-09', NULL),
(80, 'Monsieur', 'Stenmark', 'Ingemar', 'Sport', 'Suède', 'Marié(e)', NULL, '1956-03-21', NULL),
(81, 'Madame', 'Stone', 'Sharon', 'Cinéma', 'Allemagne', 'Célibataire', NULL, '1972-06-30', NULL),
(82, 'Monsieur', 'Tapie', 'Bernard', 'Affaires', 'France', 'Marié(e)', NULL, '1947-08-03', 'Il a été présent dans beaucoup de domaines différents'),
(83, 'Madame', 'Thatcher', 'Margareth', 'Politique', 'Royaume-Uni', 'Marié(e)', NULL, '1925-10-13', 'La dame de fer!'),
(84, 'Monsieur', 'Tomba', 'Alberto', 'Sport', 'Italie', 'Célibataire', NULL, '1965-12-15', 'Champion International de ski haut niveau en compétition'),
(86, 'Monsieur', 'Willis', 'Bruce', 'Cinéma', 'Etats-Unis', 'Divorcé(e)', NULL, '1955-03-19', NULL),
(94, 'Monsieur', 'Blanc', 'Michel', 'Cinéma', 'France', 'Célibataire', NULL, '1954-06-23', 'Les bronzés, l\'équipe du splendid'),
(95, 'Madame', 'Marceau', 'Sophie', 'Cinéma', 'France', 'Marié(e)', NULL, '1966-11-17', NULL),
(96, 'Monsieur', 'Jones', 'Tommy Lee', 'Chanson', 'Etats-Unis', 'Marié(e)', NULL, '1946-05-16', NULL),
(97, 'Monsieur', 'Chirac', 'Jacques', 'Politique', 'France', 'Marié(e)', NULL, '1932-11-29', 'Président'),
(99, 'Monsieur', 'Weissmuller', 'Johny', 'Sport', NULL, 'Célibataire', '1', '1928-01-17', 'incarnait Tarzan à l\'écran'),
(101, 'Madame', 'Balasko', 'Josiane', 'Cinéma', 'France', 'Célibataire', NULL, '1951-06-23', NULL),
(103, 'Madame', 'Horner', 'Yvette', 'Chanson', 'France', 'Divorcé(e)', NULL, '1922-09-22', NULL),
(104, 'Monsieur', 'Halliday', 'Johnny', 'Chanson', 'France', 'Marié(e)', NULL, '1943-06-15', NULL),
(105, 'Monsieur', 'Noir', 'Michel', 'Politique', 'Açores (Portugal)', 'Marié(e)', '1', '1957-06-15', NULL),
(106, 'Monsieur', 'Snipes', 'Wesley', 'Chanson', 'Etats-Unis', 'Marié(e)', NULL, '1961-11-28', NULL),
(109, 'Monsieur', 'Woods', 'Tiger', 'Sport', 'Etats-Unis', 'Célibataire', NULL, '1976-08-19', 'Le plus grand golfeur de tous les temps !!!!!!!!!!!'),
(110, 'Madame', 'De palmas', NULL, 'Chanson', NULL, 'Célibataire', NULL, NULL, NULL),
(111, 'Monsieur', 'Hakkinen', 'Mika', 'Sport', 'Finlande', 'Marié(e)', NULL, '1952-01-17', 'Pilote de F1 chez McLaren'),
(112, 'Monsieur', 'Pitt', 'Brad', 'Cinéma', 'Etats-Unis', 'Marié(e)', NULL, NULL, NULL),
(113, 'Monsieur', 'Bigard', 'Jean-Marie', 'Autre', 'France', 'Marié(e)', NULL, NULL, NULL),
(114, 'Monsieur', 'Bourvil', NULL, 'Cinéma', 'France', 'Marié(e)', '1', '1929-03-02', NULL),
(116, 'Mademoiselle', 'Lopez', 'Jennifer', 'Chanson', NULL, 'Célibataire', NULL, NULL, 'Latine'),
(117, 'Monsieur', 'Schumacher', 'Michael', 'Sport', 'Allemagne', 'Célibataire', NULL, NULL, NULL),
(118, 'Monsieur', 'De Funès', 'Louis', 'Cinéma', 'France', 'Marié(e)', '1', '1921-05-01', NULL),
(119, 'Madame', 'Anderson', 'Pamela', 'Cinéma', 'Etats-Unis', 'Marié(e)', NULL, '1970-02-21', NULL),
(121, 'Mademoiselle', 'Mauresmo', 'Amélie', 'Sport', 'France', 'Célibataire', NULL, '1979-10-21', 'Une joueuse de tennis hors normes'),
(123, 'Mademoiselle', 'Britney', 'Spears', 'Chanson', 'Etats-Unis', 'Célibataire', NULL, NULL, 'Jeune'),
(124, 'Mademoiselle', 'Adjani', 'Isabelle', 'Cinéma', 'France', 'Célibataire', NULL, NULL, 'La Boum'),
(126, 'Mademoiselle', 'Hingis', 'Martina', 'Sport', 'Suisse', 'Célibataire', NULL, '1980-12-13', NULL),
(127, 'Monsieur', 'Douillet', 'David', 'Sport', 'France', 'Marié(e)', NULL, NULL, NULL),
(129, 'Monsieur', 'Bonaly', 'Surya', 'Sport', 'France', 'Célibataire', NULL, NULL, NULL),
(130, 'Monsieur', 'Fernandel', NULL, 'Cinéma', 'France', 'Marié(e)', '1', '0000-00-00', 'La vache et le prisonnier'),
(131, 'Monsieur', 'Alési', 'Jean', 'Sport', 'Bolivie', 'Célibataire', NULL, '1956-03-21', NULL),
(132, 'Mademoiselle', 'Ledoyen', 'Virginie', 'Cinéma', 'France', 'Célibataire', NULL, NULL, 'dernier film en date : L\'amour !'),
(134, 'Madame', 'Zeta-Jones', 'Cathy', 'Cinéma', 'Algérie', 'Marié(e)', NULL, '1969-09-25', NULL),
(135, 'Monsieur', 'Lagaf', 'Vincent', 'Autre', 'France', 'Marié(e)', NULL, '1963-06-06', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `celebrite`
--
ALTER TABLE `celebrite`
  ADD PRIMARY KEY (`IDCeleb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
