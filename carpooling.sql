-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : dim. 27 nov. 2022 à 19:36
-- Version du serveur : 8.0.26-0ubuntu0.20.04.2
-- Version de PHP : 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `carpooling`
--

-- --------------------------------------------------------

--
-- Structure de la table `ads`
--

CREATE TABLE `ads` (
  `idAd` int NOT NULL,
  `adTitle` varchar(255) NOT NULL,
  `idCar` int NOT NULL,
  `dateTime` date NOT NULL,
  `startPlace` varchar(75) NOT NULL,
  `endPlace` varchar(75) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `cars`
--

CREATE TABLE `cars` (
  `idCar` int NOT NULL,
  `brand` varchar(75) NOT NULL,
  `model` varchar(75) NOT NULL,
  `color` varchar(75) NOT NULL,
  `seats` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `cars`
--

INSERT INTO `cars` (`idCar`, `brand`, `model`, `color`, `seats`) VALUES
(1, 'Renault', 'Clio 3', 'Rouge', 5);

-- --------------------------------------------------------

--
-- Structure de la table `userAds`
--

CREATE TABLE `userAds` (
  `idUser` int NOT NULL,
  `idAd` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `userCars`
--

CREATE TABLE `userCars` (
  `idUser` int NOT NULL,
  `idCar` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `birthday` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `birthday`) VALUES
(1, 'Vincent', 'Godé', 'hello@vincentgo.fr', '1990-11-08 00:00:00'),
(2, 'Albert', 'Dupond', 'sonemail@gmail.com', '1985-11-08 00:00:00'),
(3, 'Thomas', 'Dumoulin', 'sonemail2@gmail.com', '1985-10-08 00:00:00');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `ads`
--
ALTER TABLE `ads`
  ADD PRIMARY KEY (`idAd`),
  ADD KEY `idCar` (`idCar`);

--
-- Index pour la table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`idCar`);

--
-- Index pour la table `userAds`
--
ALTER TABLE `userAds`
  ADD KEY `id_user_ad` (`idUser`),
  ADD KEY `id_ad` (`idAd`);

--
-- Index pour la table `userCars`
--
ALTER TABLE `userCars`
  ADD KEY `id_User_Car` (`idUser`),
  ADD KEY `id_Car` (`idCar`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `ads`
--
ALTER TABLE `ads`
  MODIFY `idAd` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `cars`
--
ALTER TABLE `cars`
  MODIFY `idCar` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `ads`
--
ALTER TABLE `ads`
  ADD CONSTRAINT `idCar` FOREIGN KEY (`idCar`) REFERENCES `cars` (`idCar`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `userAds`
--
ALTER TABLE `userAds`
  ADD CONSTRAINT `id_ad` FOREIGN KEY (`idAd`) REFERENCES `ads` (`idAd`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_user_ad` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Contraintes pour la table `userCars`
--
ALTER TABLE `userCars`
  ADD CONSTRAINT `id_Car` FOREIGN KEY (`idCar`) REFERENCES `cars` (`idCar`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `id_User_Car` FOREIGN KEY (`idUser`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
