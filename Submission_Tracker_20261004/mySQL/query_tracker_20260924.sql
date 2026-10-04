-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 24, 2026 at 06:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `query_tracker_2026`
--

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `submissionDate` date NOT NULL,
  `agencyName` varchar(50) NOT NULL,
  `agentName` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `websiteAddress` varchar(50) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `response` varchar(50) DEFAULT NULL,
  `feedback` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`submissionDate`, `agencyName`, `agentName`, `emailAddress`, `websiteAddress`, `phoneNumber`, `response`, `feedback`) VALUES
('2026-09-24', 'Riptide Literary Agency', 'Nick Ryder', 'nryder@riptideliterary.com', 'riptideliterary.com', '555-555-5555', NULL, NULL),
('2026-09-16', 'Tucker Coastal Literary', 'Tucker Bastien', 'tbastien@tuckercoastalliterary.com', 'tuckercoastalliterary.com', '555-555-9999', 'yes', 'Please send me your manuscript.'),
('2026-09-30', 'Bookends Literary Agency', 'Robert Bastien', 'rob@bookendslit.com', 'bookendslit.com', '555-555-4444', 'yes', 'I love it! Please send me your manuscript as soon as possible! I can\'t wait to read it!');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
