-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 18, 2018 at 06:42 AM
-- Server version: 5.7.21
-- PHP Version: 5.6.35

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE SCHEMA qcm;
use qcm;
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `qcm`
--

-- --------------------------------------------------------

--
-- Table structure for table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `QCM` int(11) DEFAULT NULL,
  `question` int(11) DEFAULT NULL,
  `rmq` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `appartenir`
--

INSERT INTO `appartenir` (`id`, `QCM`, `question`, `rmq`) VALUES
(1, 1, 1, NULL),
(2, 1, 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `chapitre`
--

DROP TABLE IF EXISTS `chapitre`;
CREATE TABLE IF NOT EXISTS `chapitre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) NOT NULL,
  `rmq` varchar(45) DEFAULT NULL,
  `matiere` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chapitre`
--

INSERT INTO `chapitre` (`id`, `titre`, `rmq`, `matiere`) VALUES
(1, 'Chapitre 1', NULL, 1),
(2, 'Chapitre 1', NULL, 2),
(3, 'JavaScript', NULL, 1),
(4, 'PHP', 'Semestre 2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `etudier`
--

DROP TABLE IF EXISTS `etudier`;
CREATE TABLE IF NOT EXISTS `etudier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matiere` int(11) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  `rmq` varchar(45) DEFAULT NULL,
  `annee` year(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_etudier_user_idx` (`user`),
  KEY `fk_etudier_matiere_idx` (`matiere`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `etudier`
--

INSERT INTO `etudier` (`id`, `matiere`, `user`, `rmq`, `annee`) VALUES
(1, 1, 1, NULL, 2018),
(2, 1, 1, NULL, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `matiere`
--

DROP TABLE IF EXISTS `matiere`;
CREATE TABLE IF NOT EXISTS `matiere` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matiere`
--

INSERT INTO `matiere` (`id`, `nom`) VALUES
(1, 'Informatique'),
(2, 'Maths');

-- --------------------------------------------------------

--
-- Table structure for table `passer`
--

DROP TABLE IF EXISTS `passer`;
CREATE TABLE IF NOT EXISTS `passer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` int(11) DEFAULT NULL,
  `QCM` int(11) DEFAULT NULL,
  `dtPassage` date DEFAULT NULL,
  `note` int(11) DEFAULT NULL,
  `rmq` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `proposer`
--

DROP TABLE IF EXISTS `proposer`;
CREATE TABLE IF NOT EXISTS `proposer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` int(11) DEFAULT NULL,
  `reponse` int(11) DEFAULT NULL,
  `statut` enum('bonne','fausse') DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `proposer`
--

INSERT INTO `proposer` (`id`, `question`, `reponse`, `statut`) VALUES
(1, 1, 1, 'bonne'),
(2, 1, 2, 'fausse');

-- --------------------------------------------------------

--
-- Table structure for table `qcm`
--

DROP TABLE IF EXISTS `qcm`;
CREATE TABLE IF NOT EXISTS `qcm` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(45) DEFAULT NULL,
  `rmq` varchar(45) DEFAULT NULL,
  `chapitre` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `nom` (`nom`),
  UNIQUE KEY `nom_2` (`nom`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `qcm`
--

INSERT INTO `qcm` (`ID`, `nom`, `rmq`, `chapitre`) VALUES
(1, 'Oui ou non ou les deux ?', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

DROP TABLE IF EXISTS `question`;
CREATE TABLE IF NOT EXISTS `question` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(250) DEFAULT NULL,
  `rmq` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `question`, `rmq`) VALUES
(1, 'How do you count array elements?', NULL),
(2, 'Je suis une autre question ?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reponse`
--

DROP TABLE IF EXISTS `reponse`;
CREATE TABLE IF NOT EXISTS `reponse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reponse` varchar(245) DEFAULT NULL,
  `rmq` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reponse`
--

INSERT INTO `reponse` (`id`, `reponse`, `rmq`) VALUES
(1, 'An array is an indexed list of elements (n size)', NULL),
(2, 'count()', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pw` varchar(25) NOT NULL,
  `status` set('t','s') NOT NULL DEFAULT 's',
  `pic` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `pseudo`, `email`, `pw`, `status`,`pic`) VALUES
(1, 'beamop', 'beamop@pm.me', 'secret', 's','./pics/yumeko2.jpg'),
(2, 'jeanrandom', 'jrandom@exam.com', 'secret', 't','./pics/mp.jpg');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `etudier`
--
ALTER TABLE `etudier`
  ADD CONSTRAINT `fk_etudier_matiere` FOREIGN KEY (`matiere`) REFERENCES `matiere` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_etudier_user` FOREIGN KEY (`user`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
