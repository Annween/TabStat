-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  ven. 17 jan. 2020 à 14:27
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `tabstat`
--

-- --------------------------------------------------------

--
-- Structure de la table `etat_support`
--

DROP TABLE IF EXISTS `etat_support`;
CREATE TABLE IF NOT EXISTS `etat_support` (
  `id` varchar(4) NOT NULL,
  `statut_support` int(3) NOT NULL,
  `libelle_support` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `etat_support`
--

INSERT INTO `etat_support` (`id`, `statut_support`, `libelle_support`) VALUES
('1', 10, 'nouveau'),
('2', 50, 'affecte'),
('3', 20, 'precisions requises'),
('4', 30, 'accepte'),
('5', 40, 'confirme'),
('6', 80, 'resolu'),
('7', 90, 'ferme');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
