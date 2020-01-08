-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb2+deb7u8
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 07 Janvier 2020 à 13:51
-- Version du serveur: 5.5.55
-- Version de PHP: 5.4.45-0+deb7u8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `bugtracker`
--

-- --------------------------------------------------------

--
-- Structure de la table `mantis_project_table`
--

CREATE TABLE IF NOT EXISTS `mantis_project_table` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL DEFAULT '',
  `status` smallint(6) NOT NULL DEFAULT '10',
  `enabled` tinyint(4) NOT NULL DEFAULT '1',
  `view_state` smallint(6) NOT NULL DEFAULT '10',
  `access_min` smallint(6) NOT NULL DEFAULT '10',
  `file_path` varchar(250) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `category_id` int(10) unsigned NOT NULL DEFAULT '1',
  `inherit_global` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `idx_project_name` (`name`),
  KEY `idx_project_view` (`view_state`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Contenu de la table `mantis_project_table`
--

INSERT INTO `mantis_project_table` (`id`, `name`, `status`, `enabled`, `view_state`, `access_min`, `file_path`, `description`, `category_id`, `inherit_global`) VALUES
(2, 'Logiciel - Annuaire V3.1', 30, 1, 50, 10, '', '', 1, 0),
(3, 'Logiciel - Support Informatique', 30, 0, 50, 10, '', '', 1, 0),
(4, 'Logiciel - Galaxy', 30, 1, 50, 10, '', '', 1, 1),
(5, 'Logiciel - Ancien Inside ', 30, 0, 50, 10, '', '', 1, 0),
(6, 'Logiciel - Le Campus', 30, 1, 50, 10, '', '', 1, 0),
(7, 'Support - Messagerie', 30, 1, 50, 10, '', '', 1, 1),
(8, 'Logiciel TMC - Adhoc', 30, 0, 50, 10, '', '', 1, 0),
(9, 'Logiciel TMC - ASR', 30, 0, 50, 10, '', '', 1, 0),
(10, 'Logiciel TMC - BO', 30, 0, 50, 10, '', '', 1, 0),
(11, 'Logiciel - Stratégie Compétences', 30, 0, 50, 10, '', '', 1, 0),
(12, 'Logiciel TMC - Courrier', 30, 0, 50, 10, '', '', 1, 0),
(13, 'Logiciel - Action compétences', 30, 1, 50, 10, '', '', 1, 0),
(14, 'Logiciel TMC - Internet', 30, 0, 50, 10, '', '', 1, 0),
(15, 'Logiciel TMC - Observatoire', 30, 0, 50, 10, '', '', 1, 0),
(16, 'Logiciel TMC - OSE', 30, 0, 50, 10, '', '', 1, 0),
(17, 'Support - Logiciel', 30, 1, 50, 10, '', '', 1, 0),
(18, 'Support - Imprimante', 30, 1, 50, 10, '', '', 1, 0),
(19, 'Logiciel TMC - Ouest Alizee', 30, 0, 50, 10, '', '', 1, 0),
(20, 'Logiciel - Plateforme de certification', 30, 1, 50, 10, '', '', 1, 1),
(21, 'Logiciel TMC - PMQVision 5 Diplôme', 30, 0, 50, 10, '', '', 1, 1),
(22, 'Logiciel TMC - PMQVision 5 - CCSP', 30, 0, 50, 10, '', '', 1, 1),
(23, 'Support - Poste de travail', 30, 1, 50, 10, '', '', 1, 1),
(24, 'Logiciel - Inside V3', 30, 1, 50, 10, '', '', 1, 1),
(25, 'Logiciel - Référencement des acteurs', 10, 0, 50, 10, '', '', 1, 1),
(26, 'Logiciel - Déclaration de TVA', 30, 0, 50, 10, '', '', 1, 1),
(27, 'Logiciel - Orkestralia', 30, 0, 50, 10, '', '', 1, 1),
(28, 'Logiciel - Galaxy Client', 30, 1, 50, 10, '', '', 1, 1),
(29, 'Logiciel - Infopcalia', 30, 0, 50, 10, '', '', 1, 1),
(30, 'Logiciel - SAGE', 30, 1, 50, 10, '', 'Demandes pour problème d''accès au logiciel SAGE', 1, 0),
(31, 'Logiciel ME - Adhoc', 30, 0, 50, 10, '', '', 1, 1),
(32, 'Logiciel FJS - Adhoc', 30, 0, 50, 10, '', '', 1, 1),
(33, 'Logiciel - Wiki', 10, 1, 50, 10, '', '', 1, 1),
(34, 'Logiciel - Opcabox', 30, 1, 50, 10, '', '', 1, 1),
(35, 'Logiciel - GEFLOG', 30, 1, 50, 10, '', '', 1, 1),
(36, 'Logiciel - GED (Google drive)', 10, 1, 50, 10, '', '', 1, 1),
(37, 'Logiciel - Espace formation', 10, 1, 50, 10, '', '', 1, 1),
(38, 'Logiciel - Opcaged', 30, 0, 50, 10, '', '', 1, 1),
(39, 'Logiciel - Note de frais administrateurs', 30, 1, 50, 10, '', '', 1, 1),
(40, 'Support - Téléphone', 30, 1, 50, 10, '', '', 1, 1),
(41, 'Logiciel - Inside Administrateurs', 30, 1, 50, 10, '', '', 1, 1),
(42, 'Logiciel - BO', 10, 1, 50, 10, '', '', 1, 1),
(43, 'Services Généraux - Mogador', 10, 0, 50, 10, '', '', 1, 0),
(44, 'Services Généraux - Victoire', 30, 0, 50, 10, '', '', 1, 1),
(45, 'Logiciel - E-Congés / Cleemy', 30, 0, 50, 10, '', '', 1, 1),
(46, 'Support - Réservation de matériel / Réunion', 30, 1, 50, 10, '', '', 1, 1),
(48, 'Logiciel - CapRH', 10, 1, 50, 10, '', '', 1, 1),
(49, 'Logiciel - Galaxy (développement)', 10, 1, 50, 10, '', '', 1, 1),
(50, 'Logiciel - E-BV', 30, 0, 50, 10, '', '', 1, 1),
(51, 'Logiciel - Galaxy (enveloppe/opération)', 10, 1, 50, 10, '', 'demande de création d''opérations et d''enveloppes ', 1, 1),
(52, 'Logiciel - SVP infopcalia', 30, 0, 50, 10, '', '', 1, 1),
(53, 'Logiciel - Visioconférence', 30, 1, 50, 10, '', '', 1, 1),
(54, 'Logiciel - Pass Professionnel', 30, 0, 50, 10, '', '', 1, 1),
(55, 'Logiciel - Réservation déplacements', 30, 1, 50, 10, '', '', 1, 1),
(56, 'Support - Typo 3', 30, 0, 50, 10, '', '', 1, 1),
(57, 'Logiciel - Opcalia.com', 30, 0, 50, 10, '', '', 1, 1),
(58, 'Support - Plate-forme WEB', 50, 0, 50, 10, '', '', 1, 1),
(59, 'Reporting', 10, 0, 50, 10, '', 'Développement des états de reporting par la DSI', 1, 1),
(60, 'Logiciel - Mon Compte', 30, 1, 50, 10, '', '', 1, 1),
(61, 'Logiciel - Dataroom', 50, 1, 50, 10, '', '', 1, 1),
(62, 'Logiciel - Crossknowledge', 30, 0, 50, 10, '', '', 1, 1),
(63, 'Logiciel - Galaxy TMA', 30, 1, 50, 10, '', '', 1, 1),
(64, 'Logiciel - Forum Opcalia', 30, 1, 50, 10, '', '', 1, 1),
(65, 'Logiciel - Galaxy (env. Cofinanceurs)', 30, 1, 50, 10, '', '', 1, 1),
(66, 'Logiciel - Galaxy (E.D.I.)', 10, 1, 50, 10, '', '', 1, 1),
(67, 'Logiciel - Portail CPF', 30, 1, 50, 10, '', '', 1, 1),
(68, 'Logiciel - Webconférence', 30, 1, 50, 10, '', '', 1, 1),
(69, 'Fichiers Xml SEPA', 30, 1, 50, 10, '', '', 1, 0),
(70, 'Logiciel - Stratégie Compétences V2', 30, 1, 50, 10, '', '', 1, 1),
(71, 'Logiciel - Déclanet', 30, 1, 50, 10, '', 'Galaxy Collecte et Déclanet', 1, 1),
(72, 'Logiciel - Mediapprenant', 10, 0, 50, 10, '', '', 1, 1),
(73, 'Logiciel - BDES', 10, 1, 50, 10, '', '', 1, 1),
(74, 'Support - Achat de matériel informatique', 30, 1, 50, 10, '', '', 1, 1),
(75, 'Logiciel - Galaxy (Création OF) ', 30, 0, 50, 10, '', '', 1, 1),
(77, 'Logiciel - Réservation de salles', 30, 1, 50, 10, '', '', 1, 1),
(78, 'Logiciel - Espace OF', 30, 1, 50, 10, '', 'ESPACE OF pour les Organismes de Formation', 1, 1),
(79, 'Logiciel - E-Congés', 30, 1, 50, 10, '', '', 1, 1),
(80, 'Logiciel - Cleemy', 30, 1, 50, 10, '', '', 1, 1),
(81, 'Logiciel - Espace GDA', 30, 1, 50, 10, '', '', 1, 1),
(82, 'Demande d''accès AEF', 30, 1, 50, 10, '', '', 1, 1),
(83, 'Logiciel - Espace compétences', 30, 1, 50, 10, '', '', 1, 1),
(84, 'Logiciel - GEF', 30, 1, 50, 10, '', '', 1, 1),
(85, 'Logiciel - MY OPCO', 30, 1, 50, 10, '', '', 1, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
