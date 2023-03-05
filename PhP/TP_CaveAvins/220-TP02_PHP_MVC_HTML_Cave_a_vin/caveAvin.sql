-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 25 nov. 2020 à 08:35
-- Version du serveur :  10.4.14-MariaDB
-- Version de PHP : 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `caveavin`
--
CREATE DATABASE IF NOT EXISTS `caveavin` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `caveavin`;

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(180) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `email`, `roles`, `password`) VALUES
(1, 'admin@dwwm.fr', 'ROLE_ADMIN', '$2y$10$YOwh4noGy3ET/zS1fIJ8g.X5p.kq42tyAQQhxE2/ZuiwjXqhiHfQ2'),
(2, 'client1@gmail.com', 'ROLE_CLIENT', '$2y$10$28ANoxJgaHJUKUqd2QgIMuYFlVpikKCQwxUEXL3hzbjqvkRj6blKa');

-- --------------------------------------------------------

--
-- Structure de la table `vin`
--

CREATE TABLE `vin` (
  `id` int(11) NOT NULL,
  `region` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cepage` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `milesime` int(11) NOT NULL,
  `robe` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `update_at` datetime DEFAULT NULL,
  `prix_ht` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `vin`
--

INSERT INTO `vin` (`id`, `region`, `cepage`, `milesime`, `robe`, `nom`, `image_name`, `update_at`, `prix_ht`) VALUES
(1, 'Bordeaux', 'gamay', 2018, 'rouge', 'Chateau la Pompe', 'bordeaux.png', '2019-07-18 07:21:40', 15.45),
(2, 'Anjou', 'gamay', 2011, 'blanc', 'Bonnezeaux', 'Jura.png', '2019-07-17 12:34:02', 8.9),
(3, 'Bordeaux', 'gamay', 2000, 'rouge', 'chateau', 'bordeaux.png', '2019-07-18 07:22:13', 10),
(4, 'Bordeaux', 'carbernet', 2009, 'rouge', 'chateau', 'bordeaux.png', '2019-07-17 15:02:02', 3.5),
(5, 'Bordeaux', 'carbernet', 2009, 'rouge', 'chataeu', 'bordeaux.png', NULL, 4.56),
(6, 'Bordeaux', 'carbernet', 2009, 'rouge', 'chateau', 'Jura.png', '2019-07-17 12:36:13', 25.78),
(7, 'Bordeaux', 'carbernet', 2009, 'rouge', 'chataeu', 'bordeaux.png', NULL, 56.2),
(8, 'Anjou', 'gamay', 1956, 'rouge', 'toto', 'anjou.png', NULL, 5.6);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_8D93D649E7927C74` (`email`);

--
-- Index pour la table `vin`
--
ALTER TABLE `vin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `vin`
--
ALTER TABLE `vin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
