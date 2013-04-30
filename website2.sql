-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 29, 2013 at 02:09 PM
-- Server version: 5.5.24
-- PHP Version: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `website2`
--

-- --------------------------------------------------------

--
-- Table structure for table `composant`
--

CREATE TABLE IF NOT EXISTS `composant` (
  `IDcomposant` int(10) NOT NULL AUTO_INCREMENT,
  `titrecomposant` varchar(30) NOT NULL,
  `versioncomposant` varchar(30) NOT NULL,
  `typecomposant` varchar(30) NOT NULL,
  `naturecomposant` varchar(30) NOT NULL,
  `licencecomposant` varchar(30) NOT NULL,
  `cout` varchar(10) NOT NULL,
  PRIMARY KEY (`IDcomposant`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `composant`
--

INSERT INTO `composant` (`IDcomposant`, `titrecomposant`, `versioncomposant`, `typecomposant`, `naturecomposant`, `licencecomposant`, `cout`) VALUES
(5, 'composant001', '1', 'Open source', 'exe', 'GPL', '100');

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE IF NOT EXISTS `produit` (
  `IDproduit` int(10) NOT NULL AUTO_INCREMENT,
  `titreproduit` varchar(30) NOT NULL,
  `clientproduit` varchar(30) NOT NULL,
  `versionproduit` int(10) DEFAULT NULL,
  `etatproduit` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`IDproduit`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`IDproduit`, `titreproduit`, `clientproduit`, `versionproduit`, `etatproduit`) VALUES
(15, 'Produit001', 'client001', 1, 'En Cours');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateurs`
--

CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `IDutilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `nomutilisateur` varchar(50) NOT NULL,
  `passutilisateur` varbinary(250) NOT NULL,
  `IDproduit` int(10) NOT NULL,
  PRIMARY KEY (`IDutilisateur`,`nomutilisateur`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `utilisateurs`
--

INSERT INTO `utilisateurs` (`IDutilisateur`, `nomutilisateur`, `passutilisateur`, `IDproduit`) VALUES
(1, 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', 0),
(2, 'responsable001', 'f34e88d83d25a207fd9267fb1bbcc54e854ed0361bb63eaf7a9c06ac1d308952', 0),
(3, 'responsable002', '9af15b336e6a9619928537df30b2e6a2376569fcf9d7e773eccede65606529a0', 0),
(4, 'responsable003', 'f2d81a260dea8a100dd517984e53c56a7523d96942a834b9cdc249bd4e8c7aa9', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
