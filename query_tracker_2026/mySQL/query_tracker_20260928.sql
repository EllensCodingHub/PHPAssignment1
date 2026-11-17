-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 28, 2026 at 05:49 PM
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
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submissionID` int(11) NOT NULL,
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
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submissionID`, `submissionDate`, `agencyName`, `agentName`, `emailAddress`, `websiteAddress`, `phoneNumber`, `response`, `feedback`) VALUES
(1, '2026-09-24', 'Riptide Literary Agency', 'Nick Ryder', 'nryder@riptideliterary.com', 'riptideliterary.com', '555-555-5555', NULL, NULL),
(2, '2026-09-16', 'Tucker Coastal Literary', 'Tucker Bastien', 'tbastien@tuckercoastalliterary.com', 'tuckercoastalliterary.com', '555-555-9999', 'yes', 'Please send me your manuscript.'),
(3, '2026-09-30', 'Bookends Literary Agency', 'Robert Bastien', 'rob@bookendslit.com', 'bookendslit.com', '555-555-4444', 'yes', 'I love it! Please send me your manuscript as soon as possible! I can\'t wait to read it!'),
(4, '2026-09-05', 'Bookends Literary Agency', 'James Burris', 'jburris@bookendslit.com', 'bookendslit.com', '555-555-0101', 'Decline', 'Your beginning needs work.'),
(5, '2026-03-19', 'Bastien Agents Rock', 'Jonathan Bastien', 'jbastien@bastienagentsrock.com', 'bastienagentsrock.com', '555-555-0202', 'Please send your manuscript', 'I\'m looking forward to finding out what happens!'),
(6, '2025-04-06', 'Bastien Agents Rock', 'Jonathan Bastien', 'jbastien@bastienagentsrock.com', 'bastienagentsrock.com', '555-555-0202', 'Decline', 'It\'s not quite ready yet, but feel free to R&R');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submissionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
