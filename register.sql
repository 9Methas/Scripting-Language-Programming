-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2025 at 07:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `registerdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `ID` int(11) NOT NULL,
  `FirstName` varchar(50) DEFAULT NULL,
  `LastName` varchar(50) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Gender` enum('Male','Female') DEFAULT NULL,
  `Avatar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`ID`, `FirstName`, `LastName`, `Age`, `Gender`, `Avatar`) VALUES
(17, 'XX', '2', 14, 'Female', './avatar/avatar1.jpg'),
(20, 'Alice', 'Brown', 15, 'Male', './avatar/avatar3.jpg'),
(22, 'Methas', '2', 18, 'Female', './avatar/avatar4.jpg'),
(23, 'Methas', 'Brown', 18, 'Female', './avatar/avatar3.jpg'),
(24, 'Jay', 'Brown', 18, 'Male', './avatar/avatar3.jpg'),
(25, 'L', 'R', 18, 'Female', './avatar/avatar1.jpg'),
(26, 'Jeep', 'Brown', 18, 'Female', './avatar/avatar3.jpg'),
(27, 'Jeep', 'Brown', 18, 'Male', './avatar/avatar3.jpg'),
(28, 'Methas', '2', 18, 'Female', './avatar/avatar4.jpg'),
(29, 'เมธัส', 'โพยนอก', 11, 'Female', './avatar/avatar3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
