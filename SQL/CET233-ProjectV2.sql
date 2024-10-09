-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 05, 2023 at 10:55 AM
-- Server version: 10.3.28-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CET233-ProjectV2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Appointment`
--

CREATE TABLE `Appointment` (
  `AppointmentID` mediumint(9) NOT NULL,
  `A_Title` varchar(50) NOT NULL,
  `A_Start` datetime NOT NULL,
  `A_End` datetime NOT NULL,
  `A_BranchID` tinyint(4) NOT NULL,
  `A_VolunteerID` smallint(6) DEFAULT NULL,
  `A_ClientID` mediumint(9) DEFAULT NULL,
  `A_Note` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Appointment`
--

INSERT INTO `Appointment` (`AppointmentID`, `A_Title`, `A_Start`, `A_End`, `A_BranchID`, `A_VolunteerID`, `A_ClientID`, `A_Note`) VALUES
(1, 'test2', '2023-04-26 08:30:00', '2023-04-26 10:00:00', 1, 4, 17, 'test2'),
(2, 'ed2', '2023-04-07 00:00:00', '2023-04-08 00:00:00', 7, 21, 6, 'ed2'),
(3, 'test', '2023-04-07 00:00:00', '2023-04-08 00:00:00', 7, 17, 19, ''),
(4, 'test', '2023-04-07 00:00:00', '2023-04-08 00:00:00', 7, 21, 17, 'ed'),
(5, 'test', '2023-04-07 00:00:00', '2023-04-08 00:00:00', 7, 21, 6, ''),
(6, 'test2 ', '2023-04-13 00:00:00', '2023-04-14 00:00:00', 1, 4, 17, 'ed 1'),
(7, 'test2 ', '2023-04-13 00:00:00', '2023-04-14 00:00:00', 1, 4, 17, 'updated'),
(8, 'test2 ', '2023-04-13 00:00:00', '2023-04-14 00:00:00', 1, 4, 19, 'erewr'),
(9, 'test', '2023-04-08 00:00:00', '2023-04-09 00:00:00', 7, 5, 6, ''),
(10, 'test', '2023-04-08 00:00:00', '2023-04-09 00:00:00', 7, 5, 18, ''),
(11, '4', '2023-04-12 00:00:00', '2023-04-13 00:00:00', 7, 16, 6, ''),
(12, '4', '2023-04-12 00:00:00', '2023-04-13 00:00:00', 7, 16, 18, ''),
(13, 'test', '2023-04-11 00:00:00', '2023-04-12 00:00:00', 7, 21, 6, 'tt edit 3'),
(14, 'test 2', '2023-04-29 10:30:00', '2023-04-29 14:30:00', 2, 1, 18, 'test 2'),
(15, 'test', '2023-04-22 00:00:00', '2023-04-23 00:00:00', 7, 6, 6, 'test'),
(16, 'ss', '2023-04-10 00:00:00', '2023-04-11 00:00:00', 7, 4, 20, 'te'),
(17, 'test', '2023-04-16 10:00:00', '2023-04-16 11:30:00', 7, 3, 6, 'ewrwer'),
(18, 'Picking Package', '2023-05-01 14:00:00', '2023-05-01 14:15:00', 8, 1, 41, 'Bank Holiday'),
(19, 'tewst', '2023-05-10 00:00:00', '2023-05-11 00:00:00', 8, 6, 22, 'Collection'),
(20, 'Check', '2023-05-02 00:00:00', '2023-05-03 00:00:00', 8, 30, 28, 'collection'),
(21, 'Computer Booking', '2023-05-05 00:00:00', '2023-05-06 00:00:00', 7, 2, 38, 'Computer Booking\r\n'),
(22, 'parcel', '2023-05-19 15:00:00', '2023-05-19 16:00:00', 7, 1, 35, 'Meeting'),
(23, 'collection', '2023-05-11 00:00:00', '2023-05-12 00:00:00', 2, 1, 22, 'Computer Booking'),
(24, 'laptop', '2023-06-07 16:30:00', '2023-06-07 17:00:00', 1, 26, 41, 'laptop booking'),
(25, 'test', '2023-05-05 09:30:00', '2023-05-05 11:00:00', 1, 10, 35, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `Branch`
--

CREATE TABLE `Branch` (
  `BranchID` tinyint(4) NOT NULL,
  `B_Name` varchar(50) NOT NULL,
  `B_Building_No` varchar(20) NOT NULL,
  `B_Postcode` varchar(8) NOT NULL,
  `B_ManagerID` smallint(6) DEFAULT NULL,
  `B_Contact_No` varchar(11) DEFAULT NULL,
  `B_Email` varchar(50) DEFAULT NULL,
  `B_Active` tinyint(1) NOT NULL DEFAULT 1,
  `B_Parcel_Limit` tinyint(4) DEFAULT NULL,
  `B_Mon_Open` time DEFAULT NULL,
  `B_Mon_Close` time DEFAULT NULL,
  `B_Tue_Open` time DEFAULT NULL,
  `B_Tue_Close` time DEFAULT NULL,
  `B_Wed_Open` time DEFAULT NULL,
  `B_Wed_Close` time DEFAULT NULL,
  `B_Thu_Open` time DEFAULT NULL,
  `B_Thu_Close` time DEFAULT NULL,
  `B_Fri_Open` time DEFAULT NULL,
  `B_Fri_Close` time DEFAULT NULL,
  `B_Sat_Open` time DEFAULT NULL,
  `B_Sat_Close` time DEFAULT NULL,
  `B_Colour` varchar(7) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Branch`
--

INSERT INTO `Branch` (`BranchID`, `B_Name`, `B_Building_No`, `B_Postcode`, `B_ManagerID`, `B_Contact_No`, `B_Email`, `B_Active`, `B_Parcel_Limit`, `B_Mon_Open`, `B_Mon_Close`, `B_Tue_Open`, `B_Tue_Close`, `B_Wed_Open`, `B_Wed_Close`, `B_Thu_Open`, `B_Thu_Close`, `B_Fri_Open`, `B_Fri_Close`, `B_Sat_Open`, `B_Sat_Close`, `B_Colour`) VALUES
(1, 'St Georgeâ€™s Church', 'NA', 'NE38 9AH', 10, 'N/A', 'N/A', 1, NULL, '00:00:00', '00:00:00', '10:00:00', '11:30:00', '10:30:00', '14:30:00', '00:00:00', '00:00:00', '10:00:00', '11:30:00', '00:00:00', '00:00:00', '#98fb98'),
(2, 'Washington Community Furnishings', 'NA', 'NE38 8HZ', 10, 'NA', 'Branchone@WCFP.org.uk', 1, 0, '10:00:00', '14:00:00', '10:00:00', '14:00:00', '00:00:00', '00:00:00', '10:00:00', '14:00:00', '10:00:00', '14:00:00', '10:00:00', '13:00:00', '#B0E0E6'),
(7, 'Oxclose Church', 'NA', 'NE38 0LA', 1, 'NA', 'NA', 1, NULL, '09:30:00', '13:00:00', '09:30:00', '13:00:00', '00:00:00', '00:00:00', '09:30:00', '13:00:00', '09:30:00', '13:00:00', '00:00:00', '00:00:00', '#8FBC8F'),
(8, 'The Galleries', 'Unit O', 'NE38 7SD', 2, 'N/A', 'N/A', 1, NULL, '00:00:00', '00:00:00', '12:00:00', '15:00:00', '12:00:00', '15:00:00', '12:00:00', '15:00:00', '12:00:00', '15:00:00', '00:00:00', '00:00:00', '#87CEEB');

-- --------------------------------------------------------

--
-- Table structure for table `Client`
--

CREATE TABLE `Client` (
  `ClientID` mediumint(9) NOT NULL,
  `C_Password` varchar(30) DEFAULT NULL,
  `C_BranchID` tinyint(4) DEFAULT NULL,
  `C_Forenames` varchar(30) NOT NULL,
  `C_Surname` varchar(25) NOT NULL,
  `C_DOB` date NOT NULL,
  `C_House_No` varchar(20) NOT NULL,
  `C_Postcode` varchar(8) NOT NULL,
  `C_Contact_No` varchar(11) DEFAULT NULL,
  `C_Email` varchar(50) DEFAULT NULL,
  `C_Registered` date DEFAULT current_timestamp(),
  `C_Dependant_0_2` tinyint(4) NOT NULL,
  `C_Dependant_3_10` tinyint(4) NOT NULL,
  `C_Dependant_11_17` tinyint(4) NOT NULL,
  `C_Dependant_C18_25` tinyint(4) NOT NULL,
  `C_Dependant_A18_25` tinyint(4) NOT NULL,
  `C_Dependant_26_50` tinyint(4) NOT NULL,
  `C_Dependant_50_69` tinyint(4) NOT NULL,
  `C_Dependant_70` tinyint(4) NOT NULL,
  `C_Client_StatusID` tinyint(4) NOT NULL DEFAULT 1,
  `C_AssignedID` smallint(6) DEFAULT NULL,
  `C_Last_GDPR` date DEFAULT NULL,
  `C_Housing_StatusID` tinyint(4) NOT NULL,
  `C_Flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client`
--

INSERT INTO `Client` (`ClientID`, `C_Password`, `C_BranchID`, `C_Forenames`, `C_Surname`, `C_DOB`, `C_House_No`, `C_Postcode`, `C_Contact_No`, `C_Email`, `C_Registered`, `C_Dependant_0_2`, `C_Dependant_3_10`, `C_Dependant_11_17`, `C_Dependant_C18_25`, `C_Dependant_A18_25`, `C_Dependant_26_50`, `C_Dependant_50_69`, `C_Dependant_70`, `C_Client_StatusID`, `C_AssignedID`, `C_Last_GDPR`, `C_Housing_StatusID`, `C_Flag`) VALUES
(6, NULL, NULL, 'Mike', 'Yardly', '1997-01-25', '1', 'SA1 1AA', '511 1111', 'ClientOne@Email.com', '2023-03-01', 2, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 4, 0),
(8, NULL, NULL, 'Wagani', 'thargwa', '2023-03-03', '3', 'SC3 3CC', '533 3333', 'ClientThree@Email.com', '2023-03-08', 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, NULL, 3, 0),
(17, NULL, NULL, 'Rupert', 'Lebear', '1939-03-14', '1', 'SR3 3XN', '1', '1', '2014-05-15', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 2, 1),
(18, NULL, NULL, 'Bro', 'Tsihugwa', '2003-01-13', '37', 'SR4 6PL', '098765728', 'Bro2018@gmail.com', '2023-03-13', 1, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 1, 0),
(19, NULL, NULL, 'Ryan', 'Majanga', '2005-09-13', '20', 'SR4 6PL', '2345765', 'brav2018@gmail.com', '2023-03-13', 1, 1, 1, 0, 1, 1, 1, 1, 2, NULL, NULL, 2, 0),
(20, NULL, NULL, 'Lilly', 'Coates', '1975-02-14', '44', 'SR2 2LW', '44', '44', '2023-03-14', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 2, 0),
(22, NULL, NULL, 'Jamie', 'Smith', '1999-05-24', '45', 'SR4 pj7', '07654567654', 'jamie11@yahoo.com', '2023-03-15', 0, 0, 0, 0, 0, 2, 0, 0, 3, NULL, NULL, 1, 0),
(25, NULL, NULL, 'Karen', 'Ploute', '2002-05-15', '13', 'SR4 6PL', '123234543', 'tsihugwa2018@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 1, 0),
(26, NULL, NULL, 'Samantha', 'Thompson', '2001-09-27', '32', 'SR2 8JX', '07863200986', 'info.wickerworth@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 7, NULL, NULL, 1, 0),
(27, NULL, NULL, 'Luke', 'smith', '2023-03-08', '1', 'SA1 1AAa', '09898767876', 'ClientOne@Email.coma', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 2, 0),
(28, NULL, NULL, 'John', 'Clinton', '2002-05-15', '34', 'SR4 6PL', '345678765', 'tsihugwa2018@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 1, 0),
(29, NULL, NULL, 'Robert', 'jackington', '2000-04-04', '55', 'NE2 s45', '0898987899', 'bob100@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 1, 1),
(30, NULL, NULL, 'Razen', 'String', '2001-05-23', '66', 'SR5 ry6', '8798767898', 'razen.123@gmail.com', '2023-03-15', 2, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 2, 0),
(31, NULL, NULL, 'Dravid', 'Jain', '2002-04-13', '56', 'NE1 gy6', '09898787678', 'david.100@gmail.com', '2023-03-15', 2, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 2, 0),
(32, NULL, NULL, 'David', 'Smith', '2002-04-13', '56', 'NE1 gy6', '09898788987', 'David100@gmail.com', '2023-03-15', 2, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 2, 0),
(33, NULL, NULL, 'Winnie', 'Lepooh', '2000-03-09', 't3', 'SR4 6PL1', '0676', 'tsihugwa2018@gmail.com1', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 7, NULL, NULL, 1, 0),
(34, NULL, NULL, 'Kyle', 'Jhobs', '2001-02-27', 'ewrwer', 'NE24 7RJ', '7676', 'tsihugwa2018@gmail.com1', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 1, 0),
(35, NULL, NULL, 'Basil', 'Basket', '1986-05-16', '10', 'SR4 6PL', '098765567', 'klinewood@gmail.com', '2023-03-16', 0, 0, 1, 1, 0, 0, 0, 0, 2, NULL, NULL, 1, 0),
(36, NULL, NULL, 'Ty', 'Nicholls', '2001-10-02', '33 harton rise', 'NE34 6DY', '07963300182', 'taylor.nich@icloud.com', '2023-03-16', 0, 3, 1, 0, 0, 0, 0, 0, 1, NULL, NULL, 1, 0),
(37, NULL, NULL, 'jon', 'smith', '1999-10-02', '32', 'NE34 6DY', '0213323212', 'jon@email.com', '2023-03-16', 0, 1, 0, 1, 0, 0, 0, 0, 1, NULL, NULL, 1, 0),
(38, NULL, NULL, 'jack', 'jones', '1995-10-02', '33', 'NE33 6FL', '0982132323', 'jack@email.com', '2023-03-16', 0, 0, 1, 2, 0, 0, 0, 0, 2, NULL, NULL, 1, 0),
(39, NULL, NULL, 'jamie', 'peterson', '1992-10-10', '33', 'NE64 6dl', '0796763123', 'jamie@email.com', '2023-03-16', 0, 2, 0, 2, 0, 0, 0, 0, 2, NULL, NULL, 1, 0),
(40, NULL, NULL, 'Giggs', 'Majanga', '1987-05-03', '19', 'SR4 7LW', '0987678', 'n/a', '2023-05-02', 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 3, 0),
(41, NULL, NULL, 'Mary', 'Nyangari', '2000-05-31', '07', 'SR4 &LE', '345670987', 'tsihugwa2018@gmail.com', '2023-05-02', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 3, 0),
(42, NULL, NULL, 'Neesha', 'Neesahal', '2000-05-10', '14', 'SR6 0DD', '54345678', 'mileva2018@gmail.com', '2023-05-03', 1, 1, 0, 0, 1, 0, 0, 0, 1, NULL, NULL, 4, 0),
(43, NULL, NULL, 'James', 'Smith', '1990-10-02', '33', 'ne34 6dy', '07963399273', 'james@email.com', '2023-05-04', 0, 1, 0, 0, 1, 0, 0, 0, 2, NULL, NULL, 1, 0),
(44, NULL, NULL, 'Mike2', 'Yardly2', '1997-01-25', '1', 'SA1 1AA', '511 1111', 'ClientOne@Email.com', '2023-03-01', 2, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 4, 0),
(45, NULL, NULL, 'Wagani2', 'thargwa2', '2023-03-03', '3', 'SC3 3CC', '533 3333', 'ClientThree@Email.com', '2023-03-08', 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, NULL, 3, 0),
(46, NULL, NULL, 'Rupert2', 'Lebear2', '1939-03-14', '1', 'SC3 3da', '1', '1', '2014-05-15', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 2, 1),
(47, NULL, NULL, 'Bro2', 'Tsihugwa2', '2003-01-13', '37', 'SR4 6PL', '098765728', 'Bro2018@gmail.com', '2023-03-13', 1, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 1, 0),
(48, NULL, NULL, 'Ryan2', 'Majanga2', '2005-09-13', '20', 'SR4 6PL', '2345765', 'brav2018@gmail.com', '2023-03-13', 1, 1, 1, 0, 1, 1, 1, 1, 2, NULL, NULL, 2, 0),
(49, NULL, NULL, 'Lilly2', 'Coates2', '1975-02-14', '44', 'SR2 2lW', '44', '44', '2023-03-14', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 2, 0),
(50, NULL, NULL, 'Jamie2', 'Smith2', '1999-05-24', '45', 'SR4 pj7', '07654567654', 'jamie11@yahoo.com', '2023-03-15', 0, 0, 0, 0, 0, 2, 0, 0, 3, NULL, NULL, 1, 0),
(51, NULL, NULL, 'Karen2', 'Ploute2', '2002-05-15', '13', 'SR4 6PL', '123234543', 'tsihugwa2018@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 1, 0),
(52, NULL, NULL, 'Samantha2', 'Thompson2', '2001-09-27', '32', 'SR2 8JX', '07863200986', 'info.wickerworth@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 7, NULL, NULL, 1, 0),
(53, NULL, NULL, 'Luke2', 'smith2', '2023-03-08', '1', 'SA1 1AAa', '09898767876', 'ClientOne@Email.coma', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 2, 0),
(54, NULL, NULL, 'John2', 'Clinton2', '2002-05-15', '34', 'SR4 6PL', '345678765', 'tsihugwa2018@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 1, 0),
(55, NULL, NULL, 'Robert2', 'jackington2', '2000-04-04', '55', 'NE2 s45', '0898987899', 'bob100@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 1, 1),
(56, NULL, NULL, 'Razen2', 'String2', '2001-05-23', '66', 'SR5 ry6', '8798767898', 'razen.123@gmail.com', '2023-03-15', 2, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 2, 0),
(57, NULL, NULL, 'Dravid2', 'Jain2', '2002-04-13', '56', 'NE1 gy6', '09898787678', 'david.100@gmail.com', '2023-03-15', 2, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 2, 0),
(58, NULL, NULL, 'Wagani3', 'thargwa3', '2023-03-03', '3', 'SC3 3CC', '533 3333', 'ClientThree@Email.com', '2023-03-08', 3, 3, 3, 3, 3, 3, 3, 3, 3, NULL, NULL, 3, 0),
(59, NULL, NULL, 'Rupert3', 'Lebear3', '1939-03-14', '1', 'NE2 8WE', '1', '1', '2014-05-15', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 2, 1),
(60, NULL, NULL, 'Bro3', 'Tsihugwa3', '2003-01-13', '37', 'SR4 6PL', '098765728', 'Bro2018@gmail.com', '2023-03-13', 1, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 1, 0),
(61, NULL, NULL, 'Ryan3', 'Majanga3', '2005-09-13', '20', 'SR4 6PL', '2345765', 'brav2018@gmail.com', '2023-03-13', 1, 1, 1, 0, 1, 1, 1, 1, 2, NULL, NULL, 2, 0),
(62, NULL, NULL, 'Lilly3', 'Coates3', '1975-02-14', '44', 'SR4 3LE', '44', '44', '2023-03-14', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 2, 0),
(63, NULL, NULL, 'Jamie3', 'Smith3', '1999-05-24', '45', 'SR4 pj7', '07654567654', 'jamie11@yahoo.com', '2023-03-15', 0, 0, 0, 0, 0, 2, 0, 0, 3, NULL, NULL, 1, 0),
(64, NULL, NULL, 'Karen3', 'Ploute3', '2002-05-15', '13', 'SR4 6PL', '123234543', 'tsihugwa2018@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 1, 0),
(65, NULL, NULL, 'Samantha3', 'Thompson3', '2001-09-27', '32', 'SR2 8JX', '07863200986', 'info.wickerworth@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 7, NULL, NULL, 1, 0),
(66, NULL, NULL, 'Luke3', 'smith3', '2023-03-08', '1', 'SA1 1AAa', '09898767876', 'ClientOne@Email.coma', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 3, NULL, NULL, 2, 0),
(67, NULL, NULL, 'John3', 'Clinton3', '2002-05-15', '34', 'SR4 6PL', '345678765', 'tsihugwa2018@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 2, NULL, NULL, 1, 0),
(68, NULL, NULL, 'Robert3', 'jackington3', '2000-04-04', '55', 'NE2 s45', '0898987899', 'bob100@gmail.com', '2023-03-15', 0, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 1, 1),
(69, NULL, NULL, 'Razen3', 'String3', '2001-05-23', '66', 'SR5 ry6', '8798767898', 'razen.123@gmail.com', '2023-03-15', 2, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 2, 0),
(70, NULL, NULL, 'Dravid3', 'Jain3', '2002-04-13', '56', 'NE1 gy6', '09898787678', 'david.100@gmail.com', '2023-03-15', 2, 0, 0, 0, 0, 0, 0, 0, 1, NULL, NULL, 2, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Client_History`
--

CREATE TABLE `Client_History` (
  `Client_HistoryID` mediumint(9) NOT NULL,
  `Ch_ClientID` mediumint(9) NOT NULL,
  `Ch_VolunteerID` smallint(6) NOT NULL,
  `Ch_BranchID` tinyint(4) NOT NULL,
  `Ch_Date` datetime NOT NULL,
  `Ch_Notes` varchar(255) NOT NULL,
  `Ch_Flag` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client_History`
--

INSERT INTO `Client_History` (`Client_HistoryID`, `Ch_ClientID`, `Ch_VolunteerID`, `Ch_BranchID`, `Ch_Date`, `Ch_Notes`, `Ch_Flag`) VALUES
(1, 18, 4, 7, '2023-04-29 18:25:48', 'edd', 0),
(2, 29, 4, 7, '2023-04-30 00:03:00', 'cli', 0),
(5, 35, 4, 7, '2023-05-03 14:16:55', 'Blind in one eye, may need help on arrival.', 0),
(6, 43, 4, 7, '2023-05-04 09:22:26', 'need a wheelchair', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Client_Status`
--

CREATE TABLE `Client_Status` (
  `Client_StatusID` tinyint(4) NOT NULL,
  `Cs_Name` varchar(30) NOT NULL,
  `Cs_Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Client_Status`
--

INSERT INTO `Client_Status` (`Client_StatusID`, `Cs_Name`, `Cs_Active`) VALUES
(1, 'Pending', 1),
(2, 'Accepted', 1),
(3, 'Declined', 1),
(7, 'On Hold', 1),
(8, 'test', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Housing_Status`
--

CREATE TABLE `Housing_Status` (
  `Housing_StatusID` tinyint(4) NOT NULL,
  `Hs_Name` varchar(30) NOT NULL,
  `Hs_Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Housing_Status`
--

INSERT INTO `Housing_Status` (`Housing_StatusID`, `Hs_Name`, `Hs_Active`) VALUES
(1, 'Home Owner', 1),
(2, 'Renting', 1),
(3, 'Shelter', 1),
(4, 'Long Boat', 0),
(17, 'test', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Organisation`
--

CREATE TABLE `Organisation` (
  `OrganisationID` smallint(4) NOT NULL,
  `O_Name` varchar(30) NOT NULL,
  `O_Postcode` varchar(8) DEFAULT 'NA',
  `O_PIN` smallint(6) NOT NULL,
  `O_Active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Organisation`
--

INSERT INTO `Organisation` (`OrganisationID`, `O_Name`, `O_Postcode`, `O_PIN`, `O_Active`) VALUES
(1, 'University of Sunderland', 'NA', 3333, 1),
(6, 'HAPS', 'NA', 7738, 1),
(8, 'Christians Against Poverty', 'NA', 5276, 1),
(9, 'Holy Trinity Church', 'NA', 1112, 1),
(10, 'Gentoo', 'NA', 7063, 1),
(11, 'Sunderland Jobcentre', 'NA', 3917, 1),
(12, 'N.E.C.A.', 'NA', 9716, 1),
(13, 'The Cyrenians', 'NA', 4796, 1),
(14, 'W.W.I.N.', 'NA', 6241, 1),
(15, 'Greggs', 'NA', 6023, 0);

-- --------------------------------------------------------

--
-- Table structure for table `Parcel`
--

CREATE TABLE `Parcel` (
  `ParcelID` mediumint(9) NOT NULL,
  `P_Packaged` date NOT NULL DEFAULT current_timestamp(),
  `P_Collected` datetime DEFAULT NULL,
  `P_ClientID` mediumint(9) DEFAULT NULL,
  `P_BranchID` tinyint(4) DEFAULT NULL,
  `P_VolunteerID` smallint(6) DEFAULT NULL,
  `P_Notes` varchar(255) DEFAULT NULL,
  `P_Parcel_StatusID` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Parcel`
--

INSERT INTO `Parcel` (`ParcelID`, `P_Packaged`, `P_Collected`, `P_ClientID`, `P_BranchID`, `P_VolunteerID`, `P_Notes`, `P_Parcel_StatusID`) VALUES
(3, '2023-03-01', '2023-03-02 00:00:00', 22, 1, 13, '', 1),
(4, '2023-03-16', '2023-03-15 00:00:00', 17, 1, 22, '', 2),
(5, '2023-02-23', '2023-03-14 00:00:00', 19, 1, 16, '', 1),
(6, '2023-03-16', '2023-04-12 13:55:10', 36, 2, 10, 'really cool guy', 2),
(7, '2023-03-16', '2023-04-21 13:55:16', 37, 2, 21, '', 2),
(8, '2023-03-16', '2023-03-15 13:55:23', 38, 2, 5, '', 2),
(9, '2023-03-16', '2023-03-16 13:55:27', 38, 7, 21, '', 2),
(10, '2023-03-16', '2023-02-10 13:55:31', 38, 1, 19, 'new parcel', 2),
(11, '2023-03-16', '2023-03-16 00:00:00', 39, 1, 10, '1st package', 5),
(12, '2023-03-16', '2023-03-15 13:55:36', 39, 7, 21, '2nd parcel', 2),
(13, '2023-03-19', '2023-03-23 13:55:40', 17, 2, 5, '', 2),
(14, '2023-04-29', '2023-04-29 18:26:34', 18, 7, 4, 'test', 1),
(15, '2023-04-29', '2023-04-30 00:00:59', 17, 7, 4, 'cid', 1),
(16, '2023-04-29', '2023-04-30 00:02:45', 29, 7, 4, 'cli ', 1),
(17, '2023-05-03', '2023-05-03 14:11:50', 35, 1, 4, 'test', 1),
(18, '2023-05-03', '2023-05-03 14:41:17', 38, 1, 4, '', 1),
(19, '2023-05-03', '2023-05-03 14:57:25', 35, 7, 4, '', 1),
(20, '2023-05-03', '2023-05-03 14:57:44', 35, 7, 4, '', 1),
(21, '2023-05-03', '2023-05-03 14:57:52', 35, 2, 4, '4', 1),
(22, '2023-05-03', '2023-05-03 14:58:54', 35, 8, 4, '', 1),
(23, '2023-05-03', '2023-05-03 14:59:04', 35, 2, 4, '6', 1),
(24, '2023-05-03', '2023-05-03 14:59:19', 38, 1, 4, '5', 1),
(25, '2023-05-04', '2023-01-18 09:22:41', 43, 1, 4, '1st parcel', 1),
(26, '2023-05-04', '2023-05-04 11:35:06', 35, 1, 4, 'test', 1),
(27, '2023-05-04', '2023-04-12 11:35:48', 35, 1, 4, '', 1),
(28, '2023-05-04', '2023-05-04 12:21:35', 28, 1, 4, '', 1),
(29, '2023-05-04', '2023-04-27 12:21:40', 28, 7, 4, '', 1),
(30, '2023-05-04', '2022-03-25 12:55:10', 32, 1, 4, '', 1),
(31, '2023-05-04', '2022-10-21 12:55:22', 32, 8, 4, '', 1),
(32, '2023-05-04', '2022-10-14 12:55:32', 32, 1, 4, '', 1),
(33, '2023-03-01', '2022-03-02 00:00:00', 22, 1, 13, '', 1),
(34, '2023-03-16', '2022-03-15 00:00:00', 17, 1, 22, '', 2),
(35, '2023-02-23', '2023-05-02 16:04:35', 19, 1, 16, '', 1),
(36, '2023-03-16', '2022-04-12 13:55:10', 36, 2, 10, 'really cool guy', 2),
(37, '2023-03-16', '2023-04-21 13:55:16', 37, 2, 21, '', 2),
(38, '2022-03-16', '2023-03-15 13:55:23', 38, 2, 5, '', 2),
(39, '2023-03-16', '2022-03-16 13:55:27', 38, 7, 21, '', 2),
(40, '2023-03-16', '2022-02-10 13:55:31', 38, 1, 19, 'new parcel', 2),
(41, '2023-03-16', '2022-03-16 00:00:00', 39, 1, 10, '1st package', 5),
(42, '2023-03-16', '2022-03-15 13:55:36', 39, 7, 21, '2nd parcel', 2),
(43, '2023-03-19', '2022-03-23 13:55:40', 17, 2, 5, '', 2),
(44, '2023-04-29', '2023-01-04 21:18:55', 18, 7, 4, 'test', 1),
(45, '2023-04-29', '2022-04-30 00:00:59', 17, 7, 4, 'cid', 1),
(46, '2023-04-29', '2022-04-30 00:02:45', 29, 7, 4, 'cli ', 1),
(47, '2023-05-03', '2022-05-03 14:11:50', 35, 1, 4, 'test', 1),
(48, '2023-05-03', '2022-05-03 14:41:17', 38, 1, 4, '', 1),
(49, '2023-05-03', '2022-05-03 14:57:25', 35, 7, 4, '', 1),
(50, '2023-05-03', '2022-05-03 14:57:44', 35, 7, 4, '', 1),
(51, '2023-05-03', '2022-05-03 14:57:52', 35, 2, 4, '4', 1),
(52, '2023-05-03', '2022-05-03 14:58:54', 35, 8, 4, '', 1),
(53, '2023-05-03', '2022-05-03 14:59:04', 35, 2, 4, '6', 1),
(54, '2023-05-03', '2022-05-03 14:59:19', 38, 1, 4, '5', 1),
(55, '2023-05-04', '2022-05-04 09:22:41', 43, 1, 4, '1st parcel', 1),
(56, '2023-05-04', '2022-05-04 11:35:06', 35, 1, 4, 'test', 1),
(57, '2023-05-04', '2022-04-12 11:35:48', 35, 1, 4, '', 1),
(58, '2023-03-01', '2022-10-20 00:00:00', 22, 1, 13, '', 1),
(59, '2023-03-16', '2022-10-07 00:00:00', 17, 1, 22, '', 2),
(60, '2023-02-23', '2023-03-14 00:00:00', 19, 1, 16, '', 1),
(61, '2023-03-16', '2022-12-17 13:55:10', 36, 2, 10, 'really cool guy', 2),
(62, '2023-03-16', '2022-09-15 13:55:16', 37, 2, 21, '', 2),
(63, '2023-03-16', '2022-01-04 13:55:23', 38, 2, 5, '', 2),
(64, '2023-03-16', '2022-05-16 13:55:27', 38, 7, 21, '', 2),
(65, '2023-03-16', '2022-04-05 13:55:31', 38, 1, 19, 'new parcel', 2),
(66, '2022-01-04', '2023-03-16 00:00:00', 39, 1, 10, '1st package', 5),
(67, '2023-03-16', '2022-07-19 13:55:36', 39, 7, 21, '2nd parcel', 2),
(68, '2023-03-19', '2022-09-05 13:55:40', 17, 2, 5, '', 2),
(69, '2023-04-29', '2022-10-04 18:26:34', 18, 7, 4, 'test', 1),
(70, '2023-04-29', '2022-06-07 00:00:59', 17, 7, 4, 'cid', 1),
(71, '2023-04-29', '2023-04-30 00:02:45', 29, 7, 4, 'cli ', 1),
(72, '2023-05-03', '2022-04-04 14:11:50', 35, 1, 4, 'test', 1),
(73, '2023-05-03', '2022-06-13 14:41:17', 38, 1, 4, '', 1),
(74, '2023-05-03', '2023-01-16 14:57:25', 35, 7, 4, '', 1),
(75, '2023-05-03', '2022-07-05 14:57:44', 35, 7, 4, '', 1),
(76, '2023-05-03', '2022-04-18 14:57:52', 35, 2, 4, '4', 1),
(77, '2023-05-03', '2022-08-22 14:58:54', 35, 8, 4, '', 1),
(78, '2023-05-03', '2023-05-03 14:59:04', 35, 2, 4, '6', 1),
(79, '2023-05-03', '2022-01-10 14:59:19', 38, 1, 4, '5', 1),
(80, '2023-05-04', '2022-09-13 09:22:41', 43, 1, 4, '1st parcel', 1),
(81, '2023-05-04', '2022-10-20 11:35:06', 35, 1, 4, 'test', 1),
(82, '2023-05-04', '2022-05-16 11:35:48', 35, 1, 4, '', 1),
(83, '2023-05-04', '2022-03-22 12:21:35', 28, 1, 4, '', 1),
(84, '2023-05-04', '2022-09-12 12:21:40', 28, 7, 4, '', 1),
(85, '2023-05-04', '2021-10-11 12:55:10', 32, 1, 4, '', 1),
(86, '2023-05-04', '2022-10-21 12:55:22', 32, 8, 4, '', 1),
(87, '2023-05-04', '2022-10-14 12:55:32', 32, 1, 4, '', 1),
(88, '2023-03-01', '2022-03-02 00:00:00', 22, 1, 13, '', 1),
(89, '2023-03-16', '2022-03-15 00:00:00', 17, 1, 22, '', 2),
(90, '2023-02-23', '2023-05-02 16:04:35', 19, 1, 16, '', 1),
(91, '2022-03-01', '2022-10-20 00:00:00', 22, 1, 13, '', 1),
(92, '2022-03-16', '2022-10-07 00:00:00', 17, 1, 22, '', 2),
(93, '2022-02-23', '2022-03-14 00:00:00', 19, 1, 16, '', 1),
(94, '2022-03-16', '2022-12-17 13:55:10', 36, 2, 10, 'really cool guy', 2),
(95, '2022-03-16', '2022-09-15 13:55:16', 37, 2, 21, '', 2),
(96, '2022-03-16', '2022-01-04 13:55:23', 38, 2, 5, '', 2),
(97, '2022-03-16', '2022-05-16 13:55:27', 38, 7, 21, '', 2),
(98, '2022-03-16', '2022-04-05 13:55:31', 38, 1, 19, 'new parcel', 2),
(99, '2022-01-04', '2022-03-16 00:00:00', 39, 1, 10, '1st package', 5),
(100, '2022-03-16', '2022-07-19 13:55:36', 39, 7, 21, '2nd parcel', 2),
(101, '2022-03-19', '2022-09-05 13:55:40', 17, 2, 5, '', 2),
(102, '2022-04-29', '2022-10-04 18:26:34', 18, 7, 4, 'test', 1),
(103, '2022-04-29', '2022-06-07 00:00:59', 17, 7, 4, 'cid', 1),
(104, '2022-04-29', '2022-04-30 00:02:45', 29, 7, 4, 'cli ', 1),
(105, '2022-05-03', '2022-04-04 14:11:50', 35, 1, 4, 'test', 1),
(106, '2022-05-03', '2022-06-13 14:41:17', 38, 1, 4, '', 1),
(107, '2022-05-03', '2022-01-16 14:57:25', 35, 7, 4, '', 1),
(108, '2022-05-03', '2022-07-05 14:57:44', 35, 7, 4, '', 1),
(109, '2022-05-03', '2022-04-18 14:57:52', 35, 2, 4, '4', 1),
(110, '2022-05-03', '2022-08-22 14:58:54', 35, 8, 4, '', 1),
(111, '2022-05-03', '2022-05-03 14:59:04', 35, 2, 4, '6', 1),
(112, '2022-05-03', '2022-01-10 14:59:19', 38, 1, 4, '5', 1),
(113, '2022-05-04', '2022-09-13 09:22:41', 43, 1, 4, '1st parcel', 1),
(114, '2022-05-04', '2022-10-20 11:35:06', 35, 1, 4, 'test', 1),
(115, '2022-05-04', '2022-05-16 11:35:48', 35, 1, 4, '', 1),
(116, '2022-05-04', '2022-03-22 12:21:35', 28, 1, 4, '', 1),
(117, '2022-05-04', '2022-09-12 12:21:40', 28, 7, 4, '', 1),
(118, '2022-05-04', '2021-10-11 12:55:10', 32, 1, 4, '', 1),
(119, '2022-05-04', '2022-10-21 12:55:22', 32, 8, 4, '', 1),
(120, '2022-05-04', '2022-10-14 12:55:32', 32, 1, 4, '', 1),
(121, '2022-03-01', '2022-03-02 00:00:00', 22, 1, 13, '', 1),
(122, '2022-03-16', '2022-03-15 00:00:00', 17, 1, 22, '', 2),
(123, '2022-02-23', '2022-05-02 16:04:35', 19, 1, 16, '', 1),
(124, '2023-03-16', '2022-06-16 13:55:16', 37, 2, 21, '', 2),
(125, '2022-11-17', '2023-03-15 13:55:23', 38, 2, 5, '', 2),
(126, '2023-01-20', '2023-03-16 13:55:27', 38, 7, 21, '', 2),
(127, '2023-02-16', '2022-12-21 13:55:31', 38, 1, 19, 'new parcel', 2),
(128, '2022-04-14', '2023-03-16 00:00:00', 39, 1, 10, '1st package', 5),
(129, '2022-03-16', '2022-02-08 13:55:36', 39, 7, 21, '2nd parcel', 2),
(130, '2023-03-19', '2022-01-20 13:55:40', 17, 2, 5, '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `Parcel_Status`
--

CREATE TABLE `Parcel_Status` (
  `Parcel_StatusID` tinyint(4) NOT NULL,
  `Ps_Name` varchar(30) NOT NULL,
  `Ps_Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Parcel_Status`
--

INSERT INTO `Parcel_Status` (`Parcel_StatusID`, `Ps_Name`, `Ps_Active`) VALUES
(1, 'Processing', 1),
(2, 'Ready', 1),
(3, 'Damaged', 1),
(4, 'Overdue', 1),
(5, 'Collected', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Referral`
--

CREATE TABLE `Referral` (
  `ReferralID` mediumint(9) NOT NULL,
  `R_ClientID` mediumint(9) NOT NULL,
  `R_OrganisationID` smallint(6) NOT NULL,
  `R_Received` datetime NOT NULL DEFAULT current_timestamp(),
  `R_Processed` datetime DEFAULT NULL,
  `R_Referral_StatusID` tinyint(4) NOT NULL DEFAULT 1,
  `R_Processed_By` smallint(6) DEFAULT NULL,
  `R_Forenames` varchar(30) NOT NULL,
  `R_Surname` varchar(25) NOT NULL,
  `R_Contact_No` varchar(11) NOT NULL,
  `R_Email` varchar(50) DEFAULT NULL,
  `R_Notes` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Referral`
--

INSERT INTO `Referral` (`ReferralID`, `R_ClientID`, `R_OrganisationID`, `R_Received`, `R_Processed`, `R_Referral_StatusID`, `R_Processed_By`, `R_Forenames`, `R_Surname`, `R_Contact_No`, `R_Email`, `R_Notes`) VALUES
(10, 33, 1, '2023-03-15 23:21:44', NULL, 2, NULL, 'test', 'test', 'test', 'tsihugwa2018@gmail.com1', NULL),
(12, 35, 1, '2023-03-16 07:21:18', NULL, 1, NULL, 'Kusa', 'Eunice', '098765678', 'kusaeunice@gmail.com', NULL),
(13, 36, 8, '2023-03-16 11:24:06', NULL, 2, NULL, 'Taylor', 'Nicholls', '07963300182', 'taylor.nich@icloud.com', NULL),
(14, 37, 9, '2023-03-16 11:45:14', NULL, 2, NULL, 'John', 'Smith', '0213323212', 'jon@email.com', NULL),
(15, 38, 10, '2023-03-16 11:49:34', NULL, 2, NULL, 'jack', 'jones', '0982132323', 'jack@email.com', NULL),
(16, 39, 11, '2023-03-16 12:03:36', NULL, 2, NULL, 'Jamie', 'Peterson', '0796763123', 'jamie@email.com', NULL),
(17, 40, 1, '2023-05-02 12:11:16', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '37307553', 'tsihugwa2018@gmail.com', NULL),
(18, 41, 1, '2023-05-02 20:25:00', NULL, 3, NULL, 'Dorcas', 'Theuri', '098765678', 'info.wickerworth@gmail.com', NULL),
(19, 42, 1, '2023-05-03 23:18:55', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '09876543', 'tsihugwa2018@gmail.com', NULL),
(20, 43, 1, '2023-05-04 09:21:38', NULL, 1, NULL, 'Admin', '1', 'N/A', 'N/A', NULL),
(21, 6, 1, '2022-10-13 23:21:44', NULL, 2, NULL, 'test', 'test', 'test', 'tsihugwa2018@gmail.com1', NULL),
(22, 8, 1, '2022-08-16 07:21:18', NULL, 1, NULL, 'Kusa', 'Eunice', '098765678', 'kusaeunice@gmail.com', NULL),
(23, 17, 8, '2022-10-11 11:24:06', NULL, 2, NULL, 'Taylor', 'Nicholls', '07963300182', 'taylor.nich@icloud.com', NULL),
(24, 37, 9, '2022-08-24 11:45:14', NULL, 2, NULL, 'John', 'Smith', '0213323212', 'jon@email.com', NULL),
(25, 18, 10, '2022-09-06 11:49:34', NULL, 2, NULL, 'jack', 'jones', '0982132323', 'jack@email.com', NULL),
(26, 19, 11, '2022-08-15 12:03:36', NULL, 2, NULL, 'Jamie', 'Peterson', '0796763123', 'jamie@email.com', NULL),
(27, 20, 1, '2022-12-14 12:11:16', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '37307553', 'tsihugwa2018@gmail.com', NULL),
(28, 22, 1, '2022-11-07 20:25:00', NULL, 3, NULL, 'Dorcas', 'Theuri', '098765678', 'info.wickerworth@gmail.com', NULL),
(29, 25, 1, '2023-05-03 23:18:55', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '09876543', 'tsihugwa2018@gmail.com', NULL),
(30, 26, 1, '2022-04-11 09:21:38', NULL, 1, NULL, 'Admin', '1', 'N/A', 'N/A', NULL),
(31, 27, 1, '2023-03-15 23:21:44', NULL, 2, NULL, 'test', 'test', 'test', 'tsihugwa2018@gmail.com1', NULL),
(32, 28, 1, '2023-03-16 07:21:18', NULL, 1, NULL, 'Kusa', 'Eunice', '098765678', 'kusaeunice@gmail.com', NULL),
(33, 29, 8, '2023-03-16 11:24:06', NULL, 2, NULL, 'Taylor', 'Nicholls', '07963300182', 'taylor.nich@icloud.com', NULL),
(34, 30, 9, '2023-03-16 11:45:14', NULL, 2, NULL, 'John', 'Smith', '0213323212', 'jon@email.com', NULL),
(35, 31, 10, '2023-03-16 11:49:34', NULL, 2, NULL, 'jack', 'jones', '0982132323', 'jack@email.com', NULL),
(36, 32, 11, '2023-03-16 12:03:36', NULL, 2, NULL, 'Jamie', 'Peterson', '0796763123', 'jamie@email.com', NULL),
(37, 33, 1, '2023-05-02 12:11:16', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '37307553', 'tsihugwa2018@gmail.com', NULL),
(38, 34, 1, '2023-05-02 20:25:00', NULL, 3, NULL, 'Dorcas', 'Theuri', '098765678', 'info.wickerworth@gmail.com', NULL),
(39, 35, 1, '2023-05-03 23:18:55', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '09876543', 'tsihugwa2018@gmail.com', NULL),
(40, 36, 1, '2023-05-04 09:21:38', NULL, 1, NULL, 'Admin', '1', 'N/A', 'N/A', NULL),
(41, 37, 1, '2022-10-13 23:21:44', NULL, 2, NULL, 'test', 'test', 'test', 'tsihugwa2018@gmail.com1', NULL),
(42, 38, 1, '2022-08-16 07:21:18', NULL, 1, NULL, 'Kusa', 'Eunice', '098765678', 'kusaeunice@gmail.com', NULL),
(43, 39, 8, '2022-07-12 11:24:06', NULL, 2, NULL, 'Taylor', 'Nicholls', '07963300182', 'taylor.nich@icloud.com', NULL),
(44, 40, 9, '2022-05-25 11:45:14', NULL, 2, NULL, 'John', 'Smith', '0213323212', 'jon@email.com', NULL),
(45, 41, 10, '2022-04-13 11:49:34', NULL, 2, NULL, 'jack', 'jones', '0982132323', 'jack@email.com', NULL),
(46, 42, 11, '2022-08-15 12:03:36', NULL, 2, NULL, 'Jamie', 'Peterson', '0796763123', 'jamie@email.com', NULL),
(47, 43, 1, '2022-12-14 12:11:16', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '37307553', 'tsihugwa2018@gmail.com', NULL),
(48, 44, 1, '2022-11-07 20:25:00', NULL, 3, NULL, 'Dorcas', 'Theuri', '098765678', 'info.wickerworth@gmail.com', NULL),
(49, 45, 1, '2023-05-03 23:18:55', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '09876543', 'tsihugwa2018@gmail.com', NULL),
(50, 46, 1, '2022-04-11 09:21:38', NULL, 1, NULL, 'Admin', '1', 'N/A', 'N/A', NULL),
(51, 38, 10, '2022-01-05 11:49:34', NULL, 2, NULL, 'jack', 'jones', '0982132323', 'jack@email.com', NULL),
(52, 39, 11, '2022-02-09 12:03:36', NULL, 2, NULL, 'Jamie', 'Peterson', '0796763123', 'jamie@email.com', NULL),
(53, 40, 1, '2022-03-16 12:11:16', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '37307553', 'tsihugwa2018@gmail.com', NULL),
(54, 41, 1, '2022-04-12 20:25:00', NULL, 3, NULL, 'Dorcas', 'Theuri', '098765678', 'info.wickerworth@gmail.com', NULL),
(55, 42, 1, '2022-04-03 23:18:55', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '09876543', 'tsihugwa2018@gmail.com', NULL),
(56, 43, 1, '2022-06-04 09:21:38', NULL, 1, NULL, 'Admin', '1', 'N/A', 'N/A', NULL),
(57, 6, 1, '2022-06-13 23:21:44', NULL, 2, NULL, 'test', 'test', 'test', 'tsihugwa2018@gmail.com1', NULL),
(58, 8, 1, '2022-08-16 07:21:18', NULL, 1, NULL, 'Kusa', 'Eunice', '098765678', 'kusaeunice@gmail.com', NULL),
(59, 17, 8, '2022-09-11 11:24:06', NULL, 2, NULL, 'Taylor', 'Nicholls', '07963300182', 'taylor.nich@icloud.com', NULL),
(60, 39, 11, '2023-01-18 12:03:36', NULL, 2, NULL, 'Jamie', 'Peterson', '0796763123', 'jamie@email.com', NULL),
(61, 40, 1, '2023-02-16 12:11:16', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '37307553', 'tsihugwa2018@gmail.com', NULL),
(62, 41, 1, '2023-04-12 20:25:00', NULL, 3, NULL, 'Dorcas', 'Theuri', '098765678', 'info.wickerworth@gmail.com', NULL),
(63, 42, 1, '2022-11-09 23:18:55', NULL, 1, NULL, 'Ryan', 'Tsihugwa', '09876543', 'tsihugwa2018@gmail.com', NULL),
(64, 43, 1, '2023-01-11 09:21:38', NULL, 1, NULL, 'Admin', '1', 'N/A', 'N/A', NULL),
(65, 6, 1, '2023-02-16 23:21:44', NULL, 2, NULL, 'test', 'test', 'test', 'tsihugwa2018@gmail.com1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `Referral_Status`
--

CREATE TABLE `Referral_Status` (
  `Referral_StatusID` tinyint(4) NOT NULL,
  `Rs_Name` varchar(30) NOT NULL,
  `Rs_Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Referral_Status`
--

INSERT INTO `Referral_Status` (`Referral_StatusID`, `Rs_Name`, `Rs_Active`) VALUES
(1, 'Pending', 1),
(2, 'Accepted', 1),
(3, 'Declined', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Volunteer`
--

CREATE TABLE `Volunteer` (
  `VolunteerID` smallint(6) NOT NULL,
  `V_Password` varchar(256) DEFAULT NULL,
  `V_Forenames` varchar(30) NOT NULL,
  `V_Surname` varchar(25) NOT NULL,
  `V_Joined` date NOT NULL DEFAULT current_timestamp(),
  `V_BranchID` tinyint(4) DEFAULT 1,
  `V_Volunteer_RoleID` tinyint(4) NOT NULL DEFAULT 1,
  `V_Active` tinyint(1) NOT NULL DEFAULT 1,
  `V_UID` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Volunteer`
--

INSERT INTO `Volunteer` (`VolunteerID`, `V_Password`, `V_Forenames`, `V_Surname`, `V_Joined`, `V_BranchID`, `V_Volunteer_RoleID`, `V_Active`, `V_UID`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'Mary', 'Lynn', '2023-03-02', 1, 1, 1, '0000'),
(2, 'b59c67bf196a4758191e42f76670ceba', 'Volunteer', 'One', '2023-03-09', 2, 1, 1, '1111'),
(3, '934b535800b1cba8f96a5d72f72f1611', 'Trustee', 'One', '2023-05-05', 1, 3, 1, '2222'),
(4, '2be9bd7a3434f7038ca27d1918de58bd', 'Admin', '1', '2023-03-11', 1, 2, 1, '3333'),
(5, 'c81e728d9d4c2f636f067f89cc14862c', 'Jack', 'Jones', '2023-03-11', 1, 1, 0, '3434'),
(6, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'Kiera', 'Heslop', '2023-03-11', 1, 1, 1, '2531'),
(10, 'dc254496505c305efdfe11ecec8480b3', 'Ryan', 'Tsihugwa', '2023-03-13', 1, 1, 1, '6547'),
(11, 'c4ca4238a0b923820dcc509a6f75849b', 'Steven', 'Hawking', '2023-03-14', 2, 2, 1, '3137'),
(13, '48bb6e862e54f2a795ffc4e541caed4d', 'Mike', 'Tyson', '2023-03-15', 1, 1, 1, '7594'),
(16, 'c4ca4238a0b923820dcc509a6f75849b', 'Volunteer1', 'Two', '2023-03-02', 1, 1, 0, '3543'),
(17, '2be9bd7a3434f7038ca27d1918de58bd', 'Ian', 'Botham', '2023-03-15', 1, 1, 1, '1930'),
(19, '81dc9bdb52d04dc20036dbd8313ed055', 'Raymond', 'Bloom', '2023-03-15', 1, 1, 1, '7304'),
(20, '81dc9bdb52d04dc20036dbd8313ed055', 'Pep', 'Guard', '2023-03-15', 1, 1, 0, '3300'),
(21, '81dc9bdb52d04dc20036dbd8313ed055', 'Ray', 'Raymond', '2023-03-15', 1, 1, 1, '6562'),
(22, '48bb6e862e54f2a795ffc4e541caed4d', 'simple', 'simpler', '2023-03-15', 1, 1, 1, '1472'),
(23, '81dc9bdb52d04dc20036dbd8313ed055', 'Eunice', 'Kusa', '2023-03-15', 2, 2, 1, '1933'),
(26, '5f4dcc3b5aa765d61d8327deb882cf99', 'taylor', 'nicholls', '2023-03-16', 7, 1, 1, '6824'),
(30, 'b59c67bf196a4758191e42f76670ceba', 'Luka', 'Here', '2023-03-16', 7, 1, 1, '2694'),
(31, '81dc9bdb52d04dc20036dbd8313ed055', 'Lynn', 'Mumbi', '2023-03-19', 1, 1, 1, '3788'),
(32, 'd93591bdf7860e1e4ee2fca799911215', 'Prashant', 'Shrestha', '2023-04-27', 1, 1, 0, '4015'),
(33, '81dc9bdb52d04dc20036dbd8313ed055', 'Giggs', 'Majanga', '2023-05-02', 1, 1, 1, '6464'),
(34, '81dc9bdb52d04dc20036dbd8313ed055', 'Kile', 'Bro', '2023-05-02', 1, 1, 0, '1732'),
(35, '81dc9bdb52d04dc20036dbd8313ed055', 'Kile', 'Mendy', '2023-05-02', 1, 1, 0, '9648'),
(36, 'b59c67bf196a4758191e42f76670ceba', 'Mo', 'Salah', '2023-05-02', 1, 1, 0, '1997'),
(37, 'd41d8cd98f00b204e9800998ecf8427e', 'Catherine', 'TheGreat', '2023-05-02', 1, 1, 1, '1732'),
(38, 'd41d8cd98f00b204e9800998ecf8427e', 'Luka', 'There', '2023-05-02', 1, 1, 1, '1732'),
(40, '81dc9bdb52d04dc20036dbd8313ed055', 'Nikola', 'Tesla', '2023-05-03', 1, 1, 0, '3530'),
(41, '934b535800b1cba8f96a5d72f72f1611', 'Alex', 'Johns', '2023-05-03', 1, 1, 1, '6350'),
(42, '02ed812220b0705fabb868ddbf17ea20', 'Michael', 'Jackson', '2023-05-03', 1, 1, 1, '6749'),
(43, '5f4dcc3b5aa765d61d8327deb882cf99', 'jack', 'murray', '2023-05-04', 1, 1, 1, '8154');

-- --------------------------------------------------------

--
-- Table structure for table `Volunteer_Role`
--

CREATE TABLE `Volunteer_Role` (
  `Volunteer_RoleID` tinyint(4) NOT NULL,
  `Vr_Name` varchar(30) NOT NULL,
  `Vr_Reports` tinyint(4) NOT NULL DEFAULT 0,
  `Vr_Active` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `Volunteer_Role`
--

INSERT INTO `Volunteer_Role` (`Volunteer_RoleID`, `Vr_Name`, `Vr_Reports`, `Vr_Active`) VALUES
(1, 'Volunteer', 0, 1),
(2, 'Admin', 1, 1),
(3, 'Trustee', 1, 1),
(4, 'Developer', 0, 1),
(5, 'test', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD PRIMARY KEY (`AppointmentID`),
  ADD KEY `FK_Appointment_BranchID` (`A_BranchID`),
  ADD KEY `FK_Appointment_ClientID` (`A_ClientID`),
  ADD KEY `FK_Appointment_VolunteerID` (`A_VolunteerID`);

--
-- Indexes for table `Branch`
--
ALTER TABLE `Branch`
  ADD PRIMARY KEY (`BranchID`),
  ADD UNIQUE KEY `Branch_Name` (`B_Name`),
  ADD UNIQUE KEY `BranchID` (`BranchID`),
  ADD KEY `FK_Branch_VolunteerID` (`B_ManagerID`);

--
-- Indexes for table `Client`
--
ALTER TABLE `Client`
  ADD PRIMARY KEY (`ClientID`),
  ADD UNIQUE KEY `ClientID` (`ClientID`),
  ADD KEY `FK_Client_BranchID` (`C_BranchID`),
  ADD KEY `FK_Client_VolunteerID` (`C_AssignedID`),
  ADD KEY `FK_Housing_StatusID` (`C_Housing_StatusID`),
  ADD KEY `FK_Client_StatusID` (`C_Client_StatusID`);

--
-- Indexes for table `Client_History`
--
ALTER TABLE `Client_History`
  ADD PRIMARY KEY (`Client_HistoryID`),
  ADD KEY `Client_History_VolunteerID` (`Ch_VolunteerID`),
  ADD KEY `Client_History_BranchID` (`Ch_BranchID`),
  ADD KEY `Client_History_ClientID` (`Ch_ClientID`);

--
-- Indexes for table `Client_Status`
--
ALTER TABLE `Client_Status`
  ADD PRIMARY KEY (`Client_StatusID`),
  ADD UNIQUE KEY `Client_StatusID` (`Client_StatusID`),
  ADD UNIQUE KEY `Client_Status` (`Cs_Name`);

--
-- Indexes for table `Housing_Status`
--
ALTER TABLE `Housing_Status`
  ADD PRIMARY KEY (`Housing_StatusID`),
  ADD UNIQUE KEY `Housing_StatusID` (`Housing_StatusID`),
  ADD UNIQUE KEY `Housing_Status` (`Hs_Name`);

--
-- Indexes for table `Organisation`
--
ALTER TABLE `Organisation`
  ADD PRIMARY KEY (`OrganisationID`),
  ADD UNIQUE KEY `ReferrerID` (`OrganisationID`),
  ADD UNIQUE KEY `Organisation` (`O_Name`),
  ADD UNIQUE KEY `PIN` (`O_PIN`);

--
-- Indexes for table `Parcel`
--
ALTER TABLE `Parcel`
  ADD PRIMARY KEY (`ParcelID`),
  ADD KEY `FK_Package_BranchID` (`P_BranchID`),
  ADD KEY `FK_Package_ClientID` (`P_ClientID`),
  ADD KEY `FK_Package_VolunteerID` (`P_VolunteerID`),
  ADD KEY `FK_Package_StatusID` (`P_Parcel_StatusID`);

--
-- Indexes for table `Parcel_Status`
--
ALTER TABLE `Parcel_Status`
  ADD PRIMARY KEY (`Parcel_StatusID`),
  ADD UNIQUE KEY `Parcel_StatusID` (`Parcel_StatusID`),
  ADD UNIQUE KEY `Parcel_Status` (`Ps_Name`);

--
-- Indexes for table `Referral`
--
ALTER TABLE `Referral`
  ADD PRIMARY KEY (`ReferralID`),
  ADD UNIQUE KEY `ReferralID` (`ReferralID`),
  ADD KEY `FK_Referral_ClientID` (`R_ClientID`),
  ADD KEY `FK_Referral_Processed_ByID` (`R_Processed_By`),
  ADD KEY `FK_Referral_ReferrerID` (`R_OrganisationID`),
  ADD KEY `FK_Referral_StatusID` (`R_Referral_StatusID`);

--
-- Indexes for table `Referral_Status`
--
ALTER TABLE `Referral_Status`
  ADD PRIMARY KEY (`Referral_StatusID`),
  ADD UNIQUE KEY `Referral_StatusID` (`Referral_StatusID`),
  ADD UNIQUE KEY `Referral_Status` (`Rs_Name`);

--
-- Indexes for table `Volunteer`
--
ALTER TABLE `Volunteer`
  ADD PRIMARY KEY (`VolunteerID`),
  ADD KEY `FK_Volunteer_BranchID` (`V_BranchID`),
  ADD KEY `FK_Volunteer_Volunteer_RoleID` (`V_Volunteer_RoleID`);

--
-- Indexes for table `Volunteer_Role`
--
ALTER TABLE `Volunteer_Role`
  ADD PRIMARY KEY (`Volunteer_RoleID`),
  ADD UNIQUE KEY `RoleID` (`Volunteer_RoleID`),
  ADD UNIQUE KEY `Role` (`Vr_Name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Appointment`
--
ALTER TABLE `Appointment`
  MODIFY `AppointmentID` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `Branch`
--
ALTER TABLE `Branch`
  MODIFY `BranchID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Client`
--
ALTER TABLE `Client`
  MODIFY `ClientID` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `Client_History`
--
ALTER TABLE `Client_History`
  MODIFY `Client_HistoryID` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `Client_Status`
--
ALTER TABLE `Client_Status`
  MODIFY `Client_StatusID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Housing_Status`
--
ALTER TABLE `Housing_Status`
  MODIFY `Housing_StatusID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `Organisation`
--
ALTER TABLE `Organisation`
  MODIFY `OrganisationID` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `Parcel`
--
ALTER TABLE `Parcel`
  MODIFY `ParcelID` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT for table `Parcel_Status`
--
ALTER TABLE `Parcel_Status`
  MODIFY `Parcel_StatusID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `Referral`
--
ALTER TABLE `Referral`
  MODIFY `ReferralID` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `Referral_Status`
--
ALTER TABLE `Referral_Status`
  MODIFY `Referral_StatusID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Volunteer`
--
ALTER TABLE `Volunteer`
  MODIFY `VolunteerID` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `Volunteer_Role`
--
ALTER TABLE `Volunteer_Role`
  MODIFY `Volunteer_RoleID` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Appointment`
--
ALTER TABLE `Appointment`
  ADD CONSTRAINT `FK_Appointment_BranchID` FOREIGN KEY (`A_BranchID`) REFERENCES `Branch` (`BranchID`),
  ADD CONSTRAINT `FK_Appointment_ClientID` FOREIGN KEY (`A_ClientID`) REFERENCES `Client` (`ClientID`),
  ADD CONSTRAINT `FK_Appointment_VolunteerID` FOREIGN KEY (`A_VolunteerID`) REFERENCES `Volunteer` (`VolunteerID`);

--
-- Constraints for table `Branch`
--
ALTER TABLE `Branch`
  ADD CONSTRAINT `FK_Branch_VolunteerID` FOREIGN KEY (`B_ManagerID`) REFERENCES `Volunteer` (`VolunteerID`);

--
-- Constraints for table `Client`
--
ALTER TABLE `Client`
  ADD CONSTRAINT `FK_Client_BranchID` FOREIGN KEY (`C_BranchID`) REFERENCES `Branch` (`BranchID`),
  ADD CONSTRAINT `FK_Client_StatusID` FOREIGN KEY (`C_Client_StatusID`) REFERENCES `Client_Status` (`Client_StatusID`),
  ADD CONSTRAINT `FK_Client_VolunteerID` FOREIGN KEY (`C_AssignedID`) REFERENCES `Volunteer` (`VolunteerID`),
  ADD CONSTRAINT `FK_Housing_StatusID` FOREIGN KEY (`C_Housing_StatusID`) REFERENCES `Housing_Status` (`Housing_StatusID`);

--
-- Constraints for table `Client_History`
--
ALTER TABLE `Client_History`
  ADD CONSTRAINT `Client_History_BranchID` FOREIGN KEY (`Ch_BranchID`) REFERENCES `Branch` (`BranchID`),
  ADD CONSTRAINT `Client_History_ClientID` FOREIGN KEY (`Ch_ClientID`) REFERENCES `Client` (`ClientID`),
  ADD CONSTRAINT `Client_History_VolunteerID` FOREIGN KEY (`Ch_VolunteerID`) REFERENCES `Volunteer` (`VolunteerID`);

--
-- Constraints for table `Parcel`
--
ALTER TABLE `Parcel`
  ADD CONSTRAINT `FK_Package_BranchID` FOREIGN KEY (`P_BranchID`) REFERENCES `Branch` (`BranchID`),
  ADD CONSTRAINT `FK_Package_ClientID` FOREIGN KEY (`P_ClientID`) REFERENCES `Client` (`ClientID`),
  ADD CONSTRAINT `FK_Package_StatusID` FOREIGN KEY (`P_Parcel_StatusID`) REFERENCES `Parcel_Status` (`Parcel_StatusID`),
  ADD CONSTRAINT `FK_Package_VolunteerID` FOREIGN KEY (`P_VolunteerID`) REFERENCES `Volunteer` (`VolunteerID`);

--
-- Constraints for table `Referral`
--
ALTER TABLE `Referral`
  ADD CONSTRAINT `FK_Referral_ClientID` FOREIGN KEY (`R_ClientID`) REFERENCES `Client` (`ClientID`),
  ADD CONSTRAINT `FK_Referral_Processed_ByID` FOREIGN KEY (`R_Processed_By`) REFERENCES `Volunteer` (`VolunteerID`),
  ADD CONSTRAINT `FK_Referral_ReferrerID` FOREIGN KEY (`R_OrganisationID`) REFERENCES `Organisation` (`OrganisationID`),
  ADD CONSTRAINT `FK_Referral_StatusID` FOREIGN KEY (`R_Referral_StatusID`) REFERENCES `Referral_Status` (`Referral_StatusID`);

--
-- Constraints for table `Volunteer`
--
ALTER TABLE `Volunteer`
  ADD CONSTRAINT `FK_Volunteer_BranchID` FOREIGN KEY (`V_BranchID`) REFERENCES `Branch` (`BranchID`),
  ADD CONSTRAINT `FK_Volunteer_Volunteer_RoleID` FOREIGN KEY (`V_Volunteer_RoleID`) REFERENCES `Volunteer_Role` (`Volunteer_RoleID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
