-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 10, 2025 at 01:48 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dj`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

DROP TABLE IF EXISTS `administrator`;
CREATE TABLE IF NOT EXISTS `administrator` (
  `id` int NOT NULL AUTO_INCREMENT,
  `korisnicko_ime` varchar(50) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `korisnicko_ime`, `lozinka`) VALUES
(1, 'admin1', 'lozinka1'),
(2, 'admin2', 'lozinka2'),
(3, 'admin3', 'lozinka3'),
(4, 'admin4', 'lozinka4');

-- --------------------------------------------------------

--
-- Table structure for table `dogadjaji`
--

DROP TABLE IF EXISTS `dogadjaji`;
CREATE TABLE IF NOT EXISTS `dogadjaji` (
  `id_dogadjaja` int NOT NULL AUTO_INCREMENT,
  `naziv_dogadjaja` varchar(255) NOT NULL,
  `datum` date NOT NULL,
  `id_mjesta` int NOT NULL,
  PRIMARY KEY (`id_dogadjaja`),
  KEY `id_mjesta` (`id_mjesta`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `dogadjaji`
--

INSERT INTO `dogadjaji` (`id_dogadjaja`, `naziv_dogadjaja`, `datum`, `id_mjesta`) VALUES
(1, 'DJ Party u Beogradu', '2025-10-15', 1),
(2, 'EXIT Festival', '2025-10-20', 2),
(3, 'Summer Festival', '2025-03-12', 3);

-- --------------------------------------------------------

--
-- Table structure for table `korisnici`
--

DROP TABLE IF EXISTS `korisnici`;
CREATE TABLE IF NOT EXISTS `korisnici` (
  `id_korisnika` int NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) NOT NULL,
  `prezime` varchar(255) NOT NULL,
  `korisnicko_ime` varchar(255) NOT NULL,
  `lozinka` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id_korisnika`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `korisnici`
--

INSERT INTO `korisnici` (`id_korisnika`, `ime`, `prezime`, `korisnicko_ime`, `lozinka`, `email`) VALUES
(1, 'Marko', 'Marković', 'marko123', 'lozinka1', 'marko@gmail.com'),
(2, 'Ana', 'Antić', 'ana456', 'lozinka2', 'ana123@gmail.com'),
(14, 'eeeeeeeeee', 'drfg', 'rdgf', '123', 'fg@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mjesto`
--

DROP TABLE IF EXISTS `mjesto`;
CREATE TABLE IF NOT EXISTS `mjesto` (
  `id_mjesta` int NOT NULL AUTO_INCREMENT,
  `naziv_mjesta` varchar(255) NOT NULL,
  `postanski_broj` int NOT NULL,
  PRIMARY KEY (`id_mjesta`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `mjesto`
--

INSERT INTO `mjesto` (`id_mjesta`, `naziv_mjesta`, `postanski_broj`) VALUES
(1, 'Beograd', 11000),
(2, 'Novi Sad', 21000),
(3, 'Niš', 18000);

-- --------------------------------------------------------

--
-- Table structure for table `rezervacije`
--

DROP TABLE IF EXISTS `rezervacije`;
CREATE TABLE IF NOT EXISTS `rezervacije` (
  `id_rezervacije` int NOT NULL AUTO_INCREMENT,
  `datum_rezervacije` date NOT NULL,
  `id_korisnika` int NOT NULL,
  `id_dogadjaja` int NOT NULL,
  `id_mjesta` int NOT NULL,
  PRIMARY KEY (`id_rezervacije`),
  KEY `id_korisnika` (`id_korisnika`),
  KEY `id_dogadjaja` (`id_dogadjaja`),
  KEY `id_mjesta` (`id_mjesta`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `rezervacije`
--

INSERT INTO `rezervacije` (`id_rezervacije`, `datum_rezervacije`, `id_korisnika`, `id_dogadjaja`, `id_mjesta`) VALUES
(1, '2024-10-01', 1, 1, 1),
(2, '2024-10-02', 2, 2, 2),
(3, '2024-10-03', 3, 3, 3),
(5, '2025-08-13', 1, 1, 1),
(6, '2025-11-12', 2, 2, 3),
(9, '2024-10-03', 1, 2, 2),
(10, '2025-01-16', 1, 3, 1),
(11, '2025-01-24', 6, 1, 1),
(12, '2025-06-20', 1, 2, 2),
(13, '2025-01-20', 1, 1, 2),
(14, '2025-01-09', 12, 2, 1),
(15, '2025-01-06', 1, 2, 3),
(16, '2025-02-12', 1, 3, 3);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
