-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 07 déc. 2022 à 15:28
-- Version du serveur : 10.4.25-MariaDB
-- Version de PHP : 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `papeterie`
--
DROP DATABASE IF EXISTS `papeterie`;
CREATE DATABASE IF NOT EXISTS `papeterie` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `papeterie`;

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

CREATE TABLE `articles` (
  `id_art` int(11) NOT NULL,
  `code_art` varchar(10) NOT NULL,
  `libelle_art` varchar(255) NOT NULL,
  `prix_ht_art` float NOT NULL,
  `promo_art` tinyint(1) NOT NULL,
  `id_cat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id_art`, `code_art`, `libelle_art`, `prix_ht_art`, `promo_art`, `id_cat`) VALUES
(1, '0019', 'Classeur à anneaux', 3.5, 0, 2),
(2, '0010', 'Sous chemises', 1.45, 1, 2),
(3, '0003', 'Couvertures transparentes pour dossiers', 4.5, 0, 2),
(4, '0025', 'Stylos', 1.5, 1, 1),
(5, '0011', 'Gommes', 0.45, 0, 1),
(6, '0005', 'Boîte de 10 feutres', 4.25, 0, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `libelle_cat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`id_cat`, `libelle_cat`) VALUES
(1, 'Ecriture'),
(2, 'Papeterie'),
(3, 'Accessoire'),
(4, 'Livre'),
(5, 'Cadeaux');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nom_user` varchar(255) NOT NULL,
  `prenom_user` varchar(255) NOT NULL,
  `role_user` varchar(50) NOT NULL,
  `login_user` varchar(255) NOT NULL,
  `psw_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id_user`, `nom_user`, `prenom_user`, `role_user`, `login_user`, `psw_user`) VALUES
(1, 'gerant_01', 'prenom_g01', 'gerant', 'gerant@dwwm.fr', '$2y$10$cOugLd3EeQmYG7L5i7SnnO4uiurSRIVeAPeQ3PVWIhz5TFeUhkozy'),
(2, 'client_01', 'prenom_c01', 'client', 'client01@gmail.com', '$2y$10$T7RLoglwozSNBpZRzRY3Ve0XmQbYGpwpEQBXtN01H5A04KE8IW28.'),
(3, 'client_02', 'prenom_c02', 'client', 'client02@gmail.com', '$2y$10$VZDv8pu1.VjVx5JujuD4nujsizb0LzpUTpvv.f5elm6yA2xm3by4G'),
(4, 'client_03', 'prenom_c03', 'client', 'client03@gmail.com', '$2y$10$e66xar6tFCx5WjmaZGtCWOFaBo0xxNXKhUZGshMqrnkGSyy0FmeiC');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id_art`),
  ADD KEY `articles_categories_FK` (`id_cat`);

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `login_user` (`login_user`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `articles`
--
ALTER TABLE `articles`
  MODIFY `id_art` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_categories_FK` FOREIGN KEY (`id_cat`) REFERENCES `categories` (`id_cat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
