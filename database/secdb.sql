-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2022 at 04:34 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `secdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cattb`
--

CREATE TABLE `cattb` (
  `catId` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cattb`
--

INSERT INTO `cattb` (`catId`, `category`) VALUES
(3, 'Sabotage'),
(4, 'Corruption'),
(5, 'Terrorism'),
(6, 'Sex Scandal'),
(11, 'Robbery'),
(12, 'Treason'),
(13, 'Greed'),
(14, 'War'),
(15, 'Rape'),
(16, 'Bribery'),
(17, 'Defilement'),
(18, 'Theft'),
(19, 'Murder'),
(20, 'Killing'),
(21, 'Molester'),
(22, 'Fraud'),
(23, 'Insults'),
(24, 'Violence'),
(25, 'Organized Crime');

-- --------------------------------------------------------

--
-- Table structure for table `employeetb`
--

CREATE TABLE `employeetb` (
  `employeeId` int(11) NOT NULL,
  `joinDate` date NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `photo` blob NOT NULL,
  `phone` varchar(15) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `address` varchar(30) NOT NULL,
  `username` varchar(20) NOT NULL,
  `pass` varchar(200) NOT NULL,
  `status` varchar(8) NOT NULL DEFAULT 'Inactive',
  `regemployId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employeetb`
--

INSERT INTO `employeetb` (`employeeId`, `joinDate`, `employee_name`, `photo`, `phone`, `gender`, `address`, `username`, `pass`, `status`, `regemployId`) VALUES
(12, '2020-06-08', 'Staff One', 0x50415353504f5254312e706e67, '2334', 'Male', 'Classified', 'staff', '$2y$10$90REYwV7zAwMOK1asjItHu.DyhkNR9LSoSPQYfYGbUywRSkrSjaku', 'Active', 6);

-- --------------------------------------------------------

--
-- Table structure for table `gendertb`
--

CREATE TABLE `gendertb` (
  `genderId` int(11) NOT NULL,
  `gender` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gendertb`
--

INSERT INTO `gendertb` (`genderId`, `gender`) VALUES
(1, 'Male'),
(2, 'Female'),
(3, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `historytb`
--

CREATE TABLE `historytb` (
  `historyId` int(11) NOT NULL,
  `employeeId` int(11) NOT NULL,
  `activity` varchar(50) NOT NULL,
  `schedule` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `historytb`
--

INSERT INTO `historytb` (`historyId`, `employeeId`, `activity`, `schedule`) VALUES
(120, 12, 'logged into the system', '2020-07-24 16:39:29'),
(121, 12, 'updated POI information', '2020-07-24 16:53:45'),
(122, 12, 'updated POI information', '2020-07-24 16:59:31'),
(123, 12, 'updated POI information', '2020-07-24 16:59:52'),
(124, 12, 'logged into the system', '2020-07-25 13:06:16'),
(125, 12, 'added new category', '2020-07-25 13:18:17'),
(126, 12, 'added new POI', '2020-07-25 14:35:31'),
(127, 12, 'updated POI information', '2020-07-25 14:37:53'),
(128, 12, 'updated POI information', '2020-07-25 14:39:10'),
(129, 12, 'updated POI information', '2020-07-25 14:47:57'),
(130, 12, 'logged out of the system', '2020-07-25 14:49:14'),
(131, 12, 'logged into the system', '2020-07-25 15:04:02'),
(132, 12, 'updated POI information', '2020-07-25 15:07:04'),
(133, 12, 'updated POI information', '2020-07-25 15:08:22'),
(134, 12, 'updated POI information', '2020-07-25 15:10:47'),
(135, 12, 'logged out of the system', '2020-07-25 15:39:03'),
(136, 12, 'logged into the system', '2022-03-05 14:43:55'),
(137, 12, 'logged into the system', '2022-03-06 15:35:51'),
(138, 12, 'logged out of the system', '2022-03-06 17:18:19'),
(139, 12, 'logged into the system', '2022-03-06 17:18:41'),
(140, 12, 'logged out of the system', '2022-03-06 17:18:43'),
(141, 12, 'logged into the system', '2022-03-06 17:23:00'),
(142, 12, 'logged out of the system', '2022-03-06 17:28:58'),
(143, 12, 'logged into the system', '2022-03-06 18:10:52'),
(144, 12, 'updated POI information', '2022-03-06 18:16:47'),
(145, 12, 'logged out of the system', '2022-03-06 18:18:15'),
(146, 12, 'logged into the system', '2022-03-06 18:18:56'),
(147, 12, 'logged out of the system', '2022-03-06 18:20:23'),
(148, 12, 'logged into the system', '2022-03-06 18:21:45'),
(149, 12, 'updated POI information', '2022-03-06 18:23:59'),
(150, 12, 'updated POI information', '2022-03-06 18:24:48'),
(151, 12, 'updated POI information', '2022-03-06 18:26:26'),
(152, 12, 'updated POI information', '2022-03-06 18:27:26'),
(153, 12, 'logged out of the system', '2022-03-06 18:28:30'),
(154, 12, 'logged into the system', '2022-03-06 18:33:14');

-- --------------------------------------------------------

--
-- Table structure for table `managetb`
--

CREATE TABLE `managetb` (
  `manId` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `managetb`
--

INSERT INTO `managetb` (`manId`, `username`, `password`) VALUES
(1, 'boss', 'boss'),
(2, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `poitb`
--

CREATE TABLE `poitb` (
  `poiId` int(11) NOT NULL,
  `regdate` datetime NOT NULL,
  `poi_name` varchar(50) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `address` varchar(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `gender` enum('Male','Female','Other') NOT NULL,
  `photo` blob NOT NULL,
  `bio` varchar(800) NOT NULL,
  `employeeId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `poitb`
--

INSERT INTO `poitb` (`poiId`, `regdate`, `poi_name`, `nickname`, `address`, `occupation`, `gender`, `photo`, `bio`, `employeeId`) VALUES
(31, '2020-06-15 12:48:11', 'POI name', 'POI nickname', 'Thailand', 'Student', 'Male', 0x64656661756c742e706e67, 'Stole a bag', 12),
(34, '2020-06-29 12:39:52', 'POI3 Name', 'Poi3 nickname', 'DRC', 'None', 'Male', 0x64656661756c742e706e67, 'He is a minute from the police station', 12),
(35, '2020-07-21 13:11:57', 'POI1 Name', 'kenet', 'Kenya', 'Unemployeed', 'Male', 0x64656661756c742e706e67, 'Known for theft and violence. Punched his mom a couple of times.', 12),
(38, '2020-07-25 14:35:31', 'POI2 Name', 'POI2 Nickname', 'Tanzania', 'Robber', 'Female', 0x6a75646974682e6a7067, 'She has been using sedatives to sedate men and steal their properties.\r\nShe targets men from different professions such as lawyers, bankers, journalists, medics and businessmen. She is part of a big group including ladies from Nigeria and other neighbouring countries. During her arrests, the police recovered flat screens, woofer, bedsheets, laptop and other items from her home.She was arrested from Kyengera, a township in Kampala.', 12);

-- --------------------------------------------------------

--
-- Table structure for table `relationtb1`
--

CREATE TABLE `relationtb1` (
  `rId` int(11) NOT NULL,
  `catId` int(11) NOT NULL,
  `poiId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `relationtb1`
--

INSERT INTO `relationtb1` (`rId`, `catId`, `poiId`) VALUES
(39, 18, 31),
(40, 18, 34),
(41, 18, 35),
(42, 11, 38),
(43, 18, 38),
(44, 0, 38),
(45, 0, 38),
(46, 0, 38),
(47, 0, 38),
(48, 16, 35),
(49, 0, 31),
(50, 0, 35),
(51, 0, 38),
(52, 0, 34);

-- --------------------------------------------------------

--
-- Table structure for table `statustb`
--

CREATE TABLE `statustb` (
  `statusId` int(11) NOT NULL,
  `status` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statustb`
--

INSERT INTO `statustb` (`statusId`, `status`) VALUES
(1, 'Active'),
(2, 'Inactive');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cattb`
--
ALTER TABLE `cattb`
  ADD PRIMARY KEY (`catId`);

--
-- Indexes for table `employeetb`
--
ALTER TABLE `employeetb`
  ADD PRIMARY KEY (`employeeId`);

--
-- Indexes for table `gendertb`
--
ALTER TABLE `gendertb`
  ADD PRIMARY KEY (`genderId`);

--
-- Indexes for table `historytb`
--
ALTER TABLE `historytb`
  ADD PRIMARY KEY (`historyId`);

--
-- Indexes for table `managetb`
--
ALTER TABLE `managetb`
  ADD PRIMARY KEY (`manId`);

--
-- Indexes for table `poitb`
--
ALTER TABLE `poitb`
  ADD PRIMARY KEY (`poiId`);

--
-- Indexes for table `relationtb1`
--
ALTER TABLE `relationtb1`
  ADD PRIMARY KEY (`rId`);

--
-- Indexes for table `statustb`
--
ALTER TABLE `statustb`
  ADD PRIMARY KEY (`statusId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cattb`
--
ALTER TABLE `cattb`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `employeetb`
--
ALTER TABLE `employeetb`
  MODIFY `employeeId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gendertb`
--
ALTER TABLE `gendertb`
  MODIFY `genderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `historytb`
--
ALTER TABLE `historytb`
  MODIFY `historyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `managetb`
--
ALTER TABLE `managetb`
  MODIFY `manId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `poitb`
--
ALTER TABLE `poitb`
  MODIFY `poiId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `relationtb1`
--
ALTER TABLE `relationtb1`
  MODIFY `rId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `statustb`
--
ALTER TABLE `statustb`
  MODIFY `statusId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
