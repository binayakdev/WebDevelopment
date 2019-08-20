-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2019 at 04:58 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `itsolutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `Name` varchar(20) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Number` int(11) NOT NULL,
  `URL` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`Name`, `Address`, `Number`, `URL`) VALUES
('ITSolutions', 'Kamal Pokhari, Kathmandu', 4412586, 'www.itsolutions.com.np');

-- --------------------------------------------------------

--
-- Table structure for table `humanresource`
--

CREATE TABLE `humanresource` (
  `ID` varchar(10) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `humanresource`
--

INSERT INTO `humanresource` (`ID`, `NAME`) VALUES
('H012', 'Eva Chambers'),
('H123', 'Virginia Graves'),
('H029', 'Drew Fleming'),
('H476', 'Willard Benson'),
('H982', 'Everett Coleman');

-- --------------------------------------------------------

--
-- Table structure for table `marketing`
--

CREATE TABLE `marketing` (
  `ID` varchar(10) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `marketing`
--

INSERT INTO `marketing` (`ID`, `NAME`) VALUES
('M312', 'Inez Steele'),
('M012', 'Jody Williamson'),
('M123', 'Wesley Austin'),
('M120', 'Felix Burgees'),
('M033', 'Caleb Bailey');

-- --------------------------------------------------------

--
-- Table structure for table `mobiledepartment`
--

CREATE TABLE `mobiledepartment` (
  `ID` varchar(10) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `TeamLeader` varchar(20) DEFAULT NULL,
  `other` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mobiledepartment`
--

INSERT INTO `mobiledepartment` (`ID`, `NAME`, `TeamLeader`, `other`) VALUES
('MD123', 'Lewis Morris', 'Curtis Cobb', NULL),
('MD912', 'Toby Miller', 'Curtis Cobb', '(Designer)'),
('MD001', 'Lula Santos', 'Curtis Cobb', NULL),
('MD921', 'Kellie Johnson', 'Curtis Cobb', '(Tester)'),
('MD217', 'Pedro Francis', 'Curtis Cobb', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `research and development`
--

CREATE TABLE `research and development` (
  `ID` varchar(10) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `research and development`
--

INSERT INTO `research and development` (`ID`, `NAME`) VALUES
('A133', 'Hope Hart'),
('A123', 'Janice Ramirez'),
('A234', 'Sergio Myers'),
('A100', 'Gina Hoffman'),
('A012', 'Estelle King');

-- --------------------------------------------------------

--
-- Table structure for table `supervisor`
--

CREATE TABLE `supervisor` (
  `Name` varchar(50) NOT NULL,
  `Title` varchar(50) NOT NULL,
  `Phone` bigint(20) DEFAULT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supervisor`
--

INSERT INTO `supervisor` (`Name`, `Title`, `Phone`, `Email`) VALUES
('Leonardo Payne', 'CEO', 9801827569, 'payne@gmail.com'),
('Carl Henson', 'Managing Director', NULL, 'henson13@gmail.com'),
('Jensen Combs', 'Marketing Manager', 9821758691, 'combs_jensen@gmail.com'),
('Amiah Burton', 'Human Resource Manager', 9876475121, 'burton55amiah@gmail.com'),
('Alan Odonnell', 'Project Manager', NULL, 'i_alan10@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `webdepartment`
--

CREATE TABLE `webdepartment` (
  `ID` varchar(10) DEFAULT NULL,
  `NAME` varchar(50) DEFAULT NULL,
  `TeamLeader` varchar(50) DEFAULT NULL,
  `other` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `webdepartment`
--

INSERT INTO `webdepartment` (`ID`, `NAME`, `TeamLeader`, `other`) VALUES
('MD911', 'Jerry Lloyd', 'Suzanne Marshall', NULL),
('WD912', 'Donald Moody', 'Suzanne Marshall', NULL),
('WD012', 'Georgia Carter', 'Suzanne Marshall', '(Designer)'),
('WD210', 'Iris Reeves', 'Suzanne Marshall', NULL),
('WD010', 'Opal Lowe', 'Suzanne Marshall', '(Tester)');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
