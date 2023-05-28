-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 11, 2023 at 11:55 PM
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
-- Database: `ic1`
--

-- --------------------------------------------------------

--
-- Table structure for table `claims`
--

DROP TABLE IF EXISTS `claims`;
CREATE TABLE IF NOT EXISTS `claims` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Claim_Amount` int NOT NULL,
  `Claim_Type` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL,
  `Damage` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Status` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL DEFAULT 'Pending',
  `Comments` mediumtext COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `claims`
--

INSERT INTO `claims` (`ID`, `Claim_Amount`, `Claim_Type`, `Damage`, `Status`, `Comments`) VALUES
(5, 2500000, 'Burglary&Theft', 'Full', 'Denied', 'price too high'),
(6, 99000, 'Road', 'Full', 'Approved', '');

-- --------------------------------------------------------

--
-- Table structure for table `credentials`
--

DROP TABLE IF EXISTS `credentials`;
CREATE TABLE IF NOT EXISTS `credentials` (
  `ID` int NOT NULL,
  `Username` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL DEFAULT '',
  `flag` int NOT NULL DEFAULT '0',
  `Dept` int NOT NULL,
  `PositionID` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `credentials`
--

INSERT INTO `credentials` (`ID`, `Username`, `Password`, `flag`, `Dept`, `PositionID`) VALUES
(1, 'John.Doe', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 1, 1, 0),
(2, 'Jane.Doe', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 2, 0),
(3, 'Michael.Scott', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 1, 1),
(4, 'Rissal.Hedna', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 3, 0),
(5, 'Anas.Hafedh', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 0, 0),
(6, 'Robil.Sabek', '7c4a8d09ca3762af61e59520943dc26494f8941b', 0, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
CREATE TABLE IF NOT EXISTS `employees` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Fname` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Lname` varchar(20) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Email` varchar(150) COLLATE utf8mb4_swedish_ci NOT NULL,
  `DeptID` varchar(5) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Manager` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`ID`, `Fname`, `Lname`, `Email`, `DeptID`, `Manager`) VALUES
(1, 'John', 'Doe', 'John.Doe@Ic1.com', '1', 'John Doe'),
(2, 'Jane', 'Doe', 'Jane.Doe@Ic1.com', '2', 'Jane Doe'),
(3, 'Michael', 'Scott', 'Michael.Scott@Ic1.com', '1', 'John Doe'),
(4, 'Rissal', 'Hedna', 'Rissal.Hedna@Ic1.com', '3', 'Rissal Hedna'),
(5, 'Anas', 'Hafedh', 'Anas.Hafedh@Ic1.com', '0', 'Anas Hafedh'),
(6, 'Robil', 'Sabek', 'Robil.Sabek@Ic1.com', '2', 'Jane Doe');

-- --------------------------------------------------------

--
-- Table structure for table `employee_account`
--

DROP TABLE IF EXISTS `employee_account`;
CREATE TABLE IF NOT EXISTS `employee_account` (
  `Employee_ID` int NOT NULL AUTO_INCREMENT,
  `Fname` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Lname` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Salary` int NOT NULL,
  `Advance` int NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `income`
--

DROP TABLE IF EXISTS `income`;
CREATE TABLE IF NOT EXISTS `income` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Amount_Recieved` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `income`
--

INSERT INTO `income` (`ID`, `Amount_Recieved`) VALUES
(5, 27000),
(6, 108900),
(7, 29940);

-- --------------------------------------------------------

--
-- Table structure for table `policies`
--

DROP TABLE IF EXISTS `policies`;
CREATE TABLE IF NOT EXISTS `policies` (
  `ID` int NOT NULL,
  `PolicyNumber` int NOT NULL,
  `Holder` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `PolicyEffectiveDate` date NOT NULL,
  `PolicyExpireDate` date NOT NULL,
  `TotalAmount` int NOT NULL,
  `Status` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci NOT NULL DEFAULT 'Pending',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `policies`
--

INSERT INTO `policies` (`ID`, `PolicyNumber`, `Holder`, `PolicyEffectiveDate`, `PolicyExpireDate`, `TotalAmount`, `Status`) VALUES
(2, 2, 'Lazo', '2023-05-04', '2023-05-15', 5040, 'Canceled'),
(4, 4, 'man', '2023-05-17', '2023-10-12', 14000, 'Flagged'),
(5, 5, 'Lau', '2023-05-11', '2023-10-11', 27000, 'Active'),
(6, 6, 'Gilbert Tekli', '2023-05-01', '2024-05-01', 108900, 'Active'),
(7, 7, 'Cristiano Ronaldo', '2023-05-03', '2025-05-11', 29940, 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `policy_details`
--

DROP TABLE IF EXISTS `policy_details`;
CREATE TABLE IF NOT EXISTS `policy_details` (
  `ID` int NOT NULL,
  `Vehicle_Type` varchar(100) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Number_Of_Units` int NOT NULL,
  `Policy_Type` varchar(1000) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Price_Per_Unit` int NOT NULL,
  `Percentage_Of_Permium` float NOT NULL,
  `Total_Perm` float NOT NULL,
  `Currency` varchar(10) COLLATE utf8mb4_swedish_ci DEFAULT 'Dollar',
  `Coverage_Per_Unit` float NOT NULL,
  `Third_Party_Coverage` float NOT NULL,
  `Coverage` int NOT NULL,
  `Manufacturer` varchar(50) COLLATE utf8mb4_swedish_ci NOT NULL,
  `Comments` varchar(10000) CHARACTER SET utf8mb4 COLLATE utf8mb4_swedish_ci DEFAULT '-',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `policy_details`
--

INSERT INTO `policy_details` (`ID`, `Vehicle_Type`, `Number_Of_Units`, `Policy_Type`, `Price_Per_Unit`, `Percentage_Of_Permium`, `Total_Perm`, `Currency`, `Coverage_Per_Unit`, `Third_Party_Coverage`, `Coverage`, `Manufacturer`, `Comments`) VALUES
(2, 'Sedan', 3, 'auto liability coverage', 30000, 5.6, 5040, 'Dollar', 90, 32400, 81000, 'Lexus', '-'),
(4, 'Sedan', 20, 'auto liability coverage', 20000, 3.5, 14000, 'Dollar', 90, 108000, 360000, 'BMW', 'sheesh'),
(5, 'Sedan', 20, 'auto liability coverage', 30000, 4.5, 27000, 'Dollar', 40, 48000, 240000, 'Fiat', '-'),
(6, 'SUV', 100, 'auto liability coverage', 33000, 3.3, 108900, 'Dollar', 80, 528000, 2640000, 'Tesla', '-'),
(7, 'SUV', 20, 'auto liability coverage', 30000, 4.99, 29940, 'Dollar', 80, 96000, 480000, 'Audi', 'review total amount fixed');

-- --------------------------------------------------------

--
-- Table structure for table `settlements`
--

DROP TABLE IF EXISTS `settlements`;
CREATE TABLE IF NOT EXISTS `settlements` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Amount_Paid` int NOT NULL,
  `Original_Coverage` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

--
-- Dumping data for table `settlements`
--

INSERT INTO `settlements` (`ID`, `Amount_Paid`, `Original_Coverage`) VALUES
(6, 99000, 2640000);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `claims`
--
ALTER TABLE `claims`
  ADD CONSTRAINT `claim_id` FOREIGN KEY (`ID`) REFERENCES `policies` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `claim_polic_detail` FOREIGN KEY (`ID`) REFERENCES `policy_details` (`ID`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `Employee_Credential_ID_fr` FOREIGN KEY (`ID`) REFERENCES `credentials` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `income`
--
ALTER TABLE `income`
  ADD CONSTRAINT `policy_income_id` FOREIGN KEY (`ID`) REFERENCES `policies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `policy_details`
--
ALTER TABLE `policy_details`
  ADD CONSTRAINT `Details_f` FOREIGN KEY (`ID`) REFERENCES `policies` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `settlements`
--
ALTER TABLE `settlements`
  ADD CONSTRAINT `policy_ID` FOREIGN KEY (`ID`) REFERENCES `claims` (`ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
