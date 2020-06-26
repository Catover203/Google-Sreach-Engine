-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql210.epizy.com
-- Generation Time: Jun 26, 2020 at 10:16 AM
-- Server version: 5.6.47-87.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_25690809_Catboo`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `ID` int(11) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `accounts`
--



-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `siteUrl` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imageUrl` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `alt` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL,
  `broken` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `ID` int(11) NOT NULL,
  `roleName` varchar(255) NOT NULL,
  `adc` int(11) NOT NULL COMMENT 'Admin Command',
  `roleLevels` int(11) NOT NULL,
  `Color` varchar(15) NOT NULL COMMENT 'Name Color',
  `uc` int(11) NOT NULL COMMENT 'Update Click from URL'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`ID`, `roleName`, `adc`, `roleLevels`, `Color`, `uc`) VALUES
(1, 'Adminstrator (DEVELOPER)', 1, 3, '#66ffff', 1),
(2, 'Member (NEWBIE)', 0, 0, '#ffffff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE `sites` (
  `id` int(11) NOT NULL,
  `url` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords` varchar(512) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `clicks` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sites`
--

-- --------------------------------------------------------

--
-- Table structure for table `urole`
--

CREATE TABLE `urole` (
  `ID` int(11) NOT NULL,
  `roleID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urole`
--

INSERT INTO `urole` (`ID`, `roleID`, `UserID`) VALUES
(1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sites`
--
ALTER TABLE `sites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `urole`
--
ALTER TABLE `urole`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2644;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sites`
--
ALTER TABLE `sites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=611;

--
-- AUTO_INCREMENT for table `urole`
--
ALTER TABLE `urole`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
