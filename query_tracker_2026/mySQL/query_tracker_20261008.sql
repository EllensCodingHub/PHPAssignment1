-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 08, 2026 at 04:09 PM
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
-- Table structure for table `registrations`
--

CREATE TABLE `registrations` (
  `userID` int(4) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `failedAttempts` int(4) DEFAULT NULL,
  `lastFailedLogin` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registrations`
--

INSERT INTO `registrations` (`userID`, `username`, `password`, `emailAddress`, `failedAttempts`, `lastFailedLogin`) VALUES
(1, 'Ellen&Tucker', '$2y$10$MK.ewV/u9/UuiRZais20kO2Ih2wuqdCQCynI.Zp4ewgs1PZrWReYm', 'ellen@thewritestory.net', NULL, NULL),
(2, 'Ellen&Tucker', '$2y$10$zJ2p2Z4BR0EsWhFbgUOxOuP2TpZB138ByPMJUmYRLsacNR1TNxOKi', 'ellen@thewritestory.net', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status_types`
--

CREATE TABLE `status_types` (
  `statusID` int(11) NOT NULL,
  `statusType` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status_types`
--

INSERT INTO `status_types` (`statusID`, `statusType`) VALUES
(1, 'Waiting for response'),
(2, 'Partial manuscript requested'),
(3, 'Full manuscript requested'),
(4, 'Declined'),
(5, 'Offer of representation'),
(6, 'Withdrawn'),
(7, 'Being considered');

-- --------------------------------------------------------

--
-- Table structure for table `submissions`
--

CREATE TABLE `submissions` (
  `submissionID` int(11) NOT NULL,
  `submissionDate` date NOT NULL,
  `agencyName` varchar(50) NOT NULL,
  `imageName` varchar(50) DEFAULT NULL,
  `agentName` varchar(50) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `websiteAddress` varchar(50) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `feedback` varchar(250) DEFAULT NULL,
  `statusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `submissions`
--

INSERT INTO `submissions` (`submissionID`, `submissionDate`, `agencyName`, `imageName`, `agentName`, `emailAddress`, `websiteAddress`, `phoneNumber`, `feedback`, `statusID`) VALUES
(1, '2026-09-24', 'Riptide Literary Agency', 'nick_ryder_100.jpg', 'Nick Ryder', 'nryder@riptideliterary.com', 'riptideliterary.com', '555-555-5555', '', 5),
(2, '2026-09-16', 'Tucker Coastal Literary', 'Tucker_100.png', 'Tucker Bastien', 'tbastien@tuckercoastalliterary.com', 'tuckercoastalliterary.com', '555-555-9999', 'Please send me your manuscript.', 5),
(4, '2026-09-05', 'Bookends Literary Agency', 'placeholder_100.jpg', 'Cynthia Metafor', 'jburris@bookendslit.com', 'booksendliterary.com', '555-555-0101', 'Your beginning needs work. Please revise and resubmit.', 1),
(5, '2026-03-19', 'Bastien Agents Rock', 'placeholder_100.jpg', 'Jonathan Bastien', 'jbastien@bastienagentsrock.com', 'bastienagentsrock.com', '555-555-0202', 'I\'m looking forward to finding out what happens!', 1),
(6, '2025-04-06', 'Bastien Agents Rock', 'placeholder_100.jpg', 'Jonathan Bastien', 'jbastien@bastienagentsrock.com', 'bastienagentsrock.com', '555-555-0202', 'It\'s not quite ready yet, but feel free to R&R', 1),
(7, '2026-08-24', 'Tucker Coastal Literary', 'agent_Mom_100.JPG', 'Vivian Ramsay', 'vramsay@tuckercoastalliterary.com', 'tuckercoastalliterary.com', '555-555-9998', 'I love this story!', 1),
(10, '2025-10-22', 'Bookends Literary Agency', 'Michelle_agent_100.jpg', 'Michelle Hopkins', 'mhopkins@bookendslit.com', 'bookendslit.com', '555-555-9996', '', 1),
(11, '2026-09-30', 'Riptide Literary Agency', 'not_yet_named_100.png', 'Cody Frost', 'cfrost@riptideliterary.com', 'riptideliterary.com', '555-555-1111', 'I\'m looking forward to finding out what happens!', 3),
(12, '2025-10-22', 'Bastien Agents Rock', 'Robert_100.png', 'Robert Bastien', 'rbastien@bastienagentsrock.com', 'bastienagentsrock.com', '555-555-0100', 'I love it! Please send me your manuscript as soon as possible! I can\'t wait to read it!', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registrations`
--
ALTER TABLE `registrations`
  ADD PRIMARY KEY (`userID`);

--
-- Indexes for table `status_types`
--
ALTER TABLE `status_types`
  ADD PRIMARY KEY (`statusID`);

--
-- Indexes for table `submissions`
--
ALTER TABLE `submissions`
  ADD PRIMARY KEY (`submissionID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registrations`
--
ALTER TABLE `registrations`
  MODIFY `userID` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `status_types`
--
ALTER TABLE `status_types`
  MODIFY `statusID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `submissions`
--
ALTER TABLE `submissions`
  MODIFY `submissionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
