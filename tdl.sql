-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2021 at 11:06 AM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tdl`
--
CREATE DATABASE IF NOT EXISTS `tdl` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `tdl`;

-- --------------------------------------------------------

--
-- Table structure for table `tache`
--

DROP TABLE IF EXISTS `tache`;
CREATE TABLE IF NOT EXISTS `tache` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `utilisateur_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `date` text,
  `finish` text,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tache`
--

INSERT INTO `tache` (`id`, `utilisateur_id`, `description`, `date`, `finish`) VALUES
(64, 5, '5', '2021-05-07 13:01:29', NULL),
(60, 5, '1', '2021-05-07 13:01:17', '2021-05-07 13:05:28'),
(61, 5, '2', '2021-05-07 13:01:20', NULL),
(62, 5, '3', '2021-05-07 13:01:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(155) NOT NULL,
  `prenom` varchar(155) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(155) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'clerc', 'marie', 'marie.clerc@email.com', '$2y$10$c5Z92G3CwnqPDdFIcS8CKuWbIWlokFRcwDfSZNSvl.u1WJrQBeA8S'),
(2, 'lala', 'lala', 'lala', '$2y$10$LiU1GXLc7EICaYqLW8AyYeAUPG0D9BhQ92N4jeT8HiSFEhsGBQqPK'),
(3, 'momo', 'momo', 'moo', '$2y$10$UsYkuKWqlLUZ9NAAzh3i4uDXvXKaBYhLJscAO3EjHxHoYQ4.8tAym'),
(4, 'nono', 'nono', 'nono', '$2y$10$PBlBStL3B314tyhAIEc7DO19iOoSCmrFw15tLV1vLE/jKurFaEjFK'),
(5, 'lolo', 'lolo', 'lolo', '$2y$10$49LVF.8Nk/gt1qqutRuWLOX86hbZiRPmiEqWJxW3hI8CgGeetEhhq'),
(6, 'nana', 'nana', 'nana', '$2y$10$m3uQOvTq6mqA9k4CJRppLOU6186v7p2vShq8NqJnVQvNzjgwa8Zfq'),
(7, 'inin', 'nini', 'niin', '$2y$10$dVHvBrqsryvSdalFrCe7NeIc6Z1bD2.klyNFZtfb9OBPK35s12Zwu'),
(8, 'pop', 'pop', 'pop', '$2y$10$j4627DWQkpkBfy7HIKZJJ.TJrX4hejswfonRXq/4BdkZJsNJunNuO'),
(9, 'wqwq', 'wqwq', 'wqwq', '$2y$10$Cokii6g2/GQ9c3y9zc27NuAz.C9XY1zqqwvNoA7iZ0Eslpfr8Uy5C');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
