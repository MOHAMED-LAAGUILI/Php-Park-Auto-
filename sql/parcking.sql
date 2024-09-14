-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3502
-- Généré le : dim. 04 juin 2023 à 19:07
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `parcking`
--

-- --------------------------------------------------------

--
-- Structure de la table `deleted_vehicules`
--

CREATE TABLE `deleted_vehicules` (
  `id` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `license_plate` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `observation` text NOT NULL,
  `date_supression` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `deleted_vehicules`
--

INSERT INTO `deleted_vehicules` (`id`, `brand`, `model`, `license_plate`, `color`, `observation`, `date_supression`) VALUES
(5, 'mercedis', 'honda', 'aa123', 'red', 'on', '2023-06-01 18:11:29'),
(6, 'aa', 'honda', 'ccc', '#FFD21E', 'aaa', '2023-06-01 18:20:18'),
(7, 'aa', 'bbb', 'ccc', '#FFD21E', 'ss', '2023-06-01 18:32:54'),
(8, 'aa', 'bbb', 'ccc', '#FFD21E', 'sss', '2023-06-01 19:42:49'),
(10, 'aa@hhhq.vom', 'honda', 'jgfgh', 'red', 'aaa', '2023-06-01 23:07:01'),
(9, 'aa', 'bbb@hhss.com', 'aa123', 'red', 'gg', '2023-06-02 10:27:19');

-- --------------------------------------------------------

--
-- Structure de la table `reserved`
--

CREATE TABLE `reserved` (
  `id_reseved` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `license_plate` varchar(200) NOT NULL,
  `date_reservation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `reserved_record`
--

CREATE TABLE `reserved_record` (
  `id_record` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `license_plate` varchar(200) NOT NULL,
  `date_reservation` datetime NOT NULL,
  `date_returning` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `reserved_record`
--

INSERT INTO `reserved_record` (`id_record`, `id_vehicule`, `brand`, `model`, `license_plate`, `date_reservation`, `date_returning`) VALUES
(1, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 20:49:13', '2023-06-01 21:16:52'),
(2, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 21:23:54', '2023-06-01 21:23:54'),
(3, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 21:23:55', '2023-06-01 21:23:56'),
(4, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 21:24:20', '2023-06-01 21:25:20'),
(5, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 21:25:43', '2023-06-01 21:26:06'),
(6, 10, 'aa@hhhq.vom', 'honda', 'jgfgh', '2023-06-01 21:35:34', '2023-06-01 21:36:01'),
(7, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 23:06:00', '2023-06-01 23:06:13'),
(8, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 23:32:50', '2023-06-01 23:33:31'),
(9, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 23:33:40', '2023-06-01 23:51:47'),
(10, 11, 'toyota', '2000', 'aabb1', '2023-06-02 10:27:38', '2023-06-02 10:27:58'),
(11, 11, 'toyota', '2000', 'aabb1', '2023-06-02 10:58:02', '2023-06-02 12:04:16'),
(12, 11, 'toyota', '2000', 'aabb1', '2023-06-04 16:01:01', '2023-06-04 16:01:03');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `typeUser` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `email`, `pass`, `typeUser`) VALUES
(1, 'Mohamed laaguili', 'admin@gmail.com', '2023', 'ADMIN'),
(2, 'user1', 'user@gmail.com', '0000', 'USER'),
(9, 'nnnn', 'pp@gmail.com', '123', 'USER');

-- --------------------------------------------------------

--
-- Structure de la table `vehicules`
--

CREATE TABLE `vehicules` (
  `id_vehicule` int(11) NOT NULL,
  `brand` varchar(150) NOT NULL,
  `model` varchar(150) NOT NULL,
  `license_plate` varchar(150) NOT NULL,
  `color` varchar(150) NOT NULL,
  `observation` text NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Déchargement des données de la table `vehicules`
--

INSERT INTO `vehicules` (`id_vehicule`, `brand`, `model`, `license_plate`, `color`, `observation`, `status`) VALUES
(11, 'toyota', '2000', 'aabb1', 'red', 'obs1', 'Available'),
(12, 'KATKAT', '2000', 'AXC222', 'RED', 'XHH', 'Available');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`id_reseved`);

--
-- Index pour la table `reserved_record`
--
ALTER TABLE `reserved_record`
  ADD PRIMARY KEY (`id_record`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id_vehicule`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `id_reseved` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `reserved_record`
--
ALTER TABLE `reserved_record`
  MODIFY `id_record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
