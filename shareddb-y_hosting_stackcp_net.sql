-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: shareddb-y.hosting.stackcp.net
-- Generation Time: Feb 16, 2021 at 04:38 PM
-- Server version: 10.4.14-MariaDB-log
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knightsofnigel-313539d3d9`
--
CREATE DATABASE IF NOT EXISTS `knightsofnigel-313539d3d9` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `knightsofnigel-313539d3d9`;

-- --------------------------------------------------------

--
-- Table structure for table `lnk_medicationBloodwork`
--

CREATE TABLE `lnk_medicationBloodwork` (
  `ID` int(11) NOT NULL,
  `medicationID` int(11) DEFAULT 0,
  `bloodworkID` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lnk_medicationBloodwork`
--

INSERT INTO `lnk_medicationBloodwork` (`ID`, `medicationID`, `bloodworkID`) VALUES
(1, 2, 4),
(2, 3, 13),
(3, 4, 24),
(4, 5, 12),
(5, 6, 8),
(6, 7, 14),
(7, 8, 20),
(8, 9, 12),
(9, 10, 13),
(10, 11, 10),
(11, 12, 12),
(12, 13, 13),
(13, 14, 8),
(14, 15, 6),
(15, 16, 19),
(16, 17, 17),
(17, 18, 15),
(18, 19, 14),
(19, 20, 7),
(20, 21, 19),
(21, 22, 21),
(22, 23, 12),
(23, 24, 17),
(24, 25, 16),
(25, 26, 14),
(26, 27, 24),
(27, 28, 6),
(28, 29, 6),
(29, 30, 15),
(30, 31, 17),
(31, 32, 24),
(32, 33, 2),
(33, 34, 15),
(34, 35, 17),
(35, 36, 8),
(36, 37, 24),
(37, 38, 23),
(38, 39, 14),
(39, 40, 9),
(40, 41, 10),
(41, 42, 21),
(42, 43, 7),
(43, 44, 18),
(44, 45, 1),
(45, 46, 2),
(46, 47, 5),
(47, 48, 13),
(48, 49, 9),
(49, 50, 3),
(50, 51, 8),
(51, 52, 21),
(52, 53, 6),
(53, 54, 22),
(54, 55, 5),
(55, 56, 10),
(56, 57, 1),
(57, 58, 2),
(58, 59, 7),
(59, 60, 7),
(60, 61, 13),
(61, 62, 4),
(62, 63, 4),
(63, 64, 22),
(64, 65, 15),
(65, 66, 7),
(66, 67, 5),
(67, 68, 6),
(68, 69, 10),
(69, 70, 11),
(70, 71, 7),
(71, 72, 14),
(72, 73, 20),
(73, 74, 10),
(74, 75, 11),
(75, 76, 11),
(76, 77, 16),
(77, 78, 8),
(78, 79, 8),
(79, 80, 2),
(80, 81, 3),
(81, 82, 1),
(82, 83, 6),
(83, 84, 15),
(84, 85, 13),
(85, 86, 6),
(86, 87, 2),
(87, 88, 1),
(88, 89, 13),
(89, 90, 16),
(90, 91, 18),
(91, 92, 3),
(92, 93, 24),
(93, 94, 3),
(94, 95, 23),
(95, 96, 14),
(96, 97, 1),
(97, 98, 6),
(98, 99, 8),
(99, 100, 11),
(100, 101, 21),
(101, 102, 19),
(102, 103, 16),
(103, 104, 7),
(104, 105, 11),
(105, 106, 17),
(106, 107, 4),
(107, 108, 6),
(108, 109, 12),
(109, 110, 6),
(110, 111, 11),
(111, 112, 9),
(112, 113, 12),
(113, 114, 23),
(114, 115, 24),
(115, 116, 23),
(116, 117, 11),
(117, 118, 18),
(118, 119, 15),
(119, 120, 18),
(120, 121, 15),
(121, 122, 22),
(122, 123, 9),
(123, 124, 11),
(124, 125, 1),
(125, 126, 15),
(126, 127, 9),
(127, 128, 10),
(128, 129, 2);

-- --------------------------------------------------------

--
-- Table structure for table `lnk_userHash`
--

CREATE TABLE `lnk_userHash` (
  `ID` int(11) NOT NULL,
  `userID` int(11) DEFAULT 0,
  `hashID` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lnk_userHash`
--

INSERT INTO `lnk_userHash` (`ID`, `userID`, `hashID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 3),
(4, 4, 4),
(6, 24, 8),
(7, 25, 9),
(12, 30, 14),
(13, 31, 15),
(14, 32, 16),
(15, 33, 17),
(16, 34, 18),
(17, 35, 19),
(18, 36, 20),
(19, 37, 21),
(20, 38, 22),
(21, 39, 23),
(22, 40, 24);

-- --------------------------------------------------------

--
-- Table structure for table `lnk_userPermission`
--

CREATE TABLE `lnk_userPermission` (
  `ID` int(11) NOT NULL,
  `userID` int(11) DEFAULT 0,
  `permissionID` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lnk_userPermission`
--

INSERT INTO `lnk_userPermission` (`ID`, `userID`, `permissionID`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 4, 1),
(19, 30, 2),
(20, 31, 2),
(12, 24, 2),
(13, 25, 2),
(21, 32, 1),
(22, 33, 2),
(23, 34, 2),
(24, 35, 2),
(25, 36, 2),
(26, 37, 2),
(27, 38, 1),
(28, 39, 2),
(29, 40, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_bloodwork`
--

CREATE TABLE `tbl_bloodwork` (
  `ID` int(11) NOT NULL,
  `methodCode` varchar(255) DEFAULT NULL,
  `methodName` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_bloodwork`
--

INSERT INTO `tbl_bloodwork` (`ID`, `methodCode`, `methodName`) VALUES
(1, 'Antipsychotic PHM', 'Antipsychotic Physical Health Monitoring including QRISK2'),
(2, 'Prolactin', 'Prolactin Concentration'),
(3, 'Opthalmology Review', 'Opthalmology Annual Review with Opthalmologist'),
(4, 'Inhaler Review', 'Asthma/COPD review'),
(5, 'HRT', 'Hormone Replacement Therapy Review'),
(6, 'FBC', 'Full Blood Count'),
(7, 'BP', 'Blood Pressure'),
(8, 'U&E', 'Urea and Electrolytes'),
(9, 'LFT', 'Liver Function Test'),
(10, 'Lipids', 'Lipid Profile\r\nLDL,HDL, Total cholesterol, Triglycerides'),
(11, 'HbA1c', 'HbA1c'),
(12, 'TFT', 'Thyroid Function Test'),
(13, 'ESP', 'Erythrocyte sedimentation rate'),
(14, 'CRP', 'C-Reactive Protein'),
(15, 'Lithium', 'Lithium test'),
(16, 'INR', 'INR Testing'),
(17, 'Height and weight', 'Height and weight'),
(18, 'Diabetes Review', 'Diabetes Annual Review'),
(19, 'Pill Check', 'Contraceptive Annual Review'),
(20, 'Anti-depressant Review', 'Anti-depressant Review'),
(21, 'Opiate Review', 'Opiate/analgesia review'),
(22, 'Methylphenidate monitoring', 'Methylphenidate physical health monitoring'),
(23, 'ACR', 'Albumin to Creatinine Ratio'),
(24, 'Urinalysis', 'Urinalysis for protein/blood');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_hashword`
--

CREATE TABLE `tbl_hashword` (
  `ID` int(11) NOT NULL,
  `hashword` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_hashword`
--

INSERT INTO `tbl_hashword` (`ID`, `hashword`) VALUES
(1, '$2y$10$U/y3U0Qs5qP02LVKFR9nMuzLtBOuzyBUivr.74.em51IE/rSQ4yYa'),
(2, '$2y$10$8Y1bHhDuZN5flfmGsjqRJeR2nNkyV6OA93ekox1SZUXRRq92TzaUS'),
(3, '$2y$10$8Agc22f2x0XnCSnDWmmIM.wYouG/iw/RAAxG0RgavNOm8wajxfX42'),
(4, '$2y$10$/vsVAhB7AO2MADDb/oG8k.qdWoJgJrZnfsEu60eD8SEDhJrbyVsgO'),
(8, '$2y$10$ryAPQd2IH3SLqdnOp.AvN.Uucb94uilMwXJ5x1P4AJxgZ.S5rEasy'),
(9, '$2y$10$nJ80Y7RJqvZOuIoSApMrAOIpk9wq1RDbViOaYkziWFfSZMU818E3K'),
(10, '$2y$10$/CW.U71BbpFDf3zmOAIAPecsMtOnbGkjlJsCv.tur.SJWj4rYiG5i'),
(11, '$2y$10$NYfnRbhwHxti1p1LcI36VuU7.C6dWiDta3ylW8TMJ/xD8pve5W.52'),
(12, '$2y$10$TqGKaCoHIIxH0KeuxmZRkOCUWFel7YwqZvCcsJrFyythleMnixeIq'),
(13, '$2y$10$yfIoASwLGthjkRXOK1BMMO5aKDBW.kNfx0TeJQdB4SnifgYf8wgNi'),
(14, '$2y$10$RRURV6HwB8hKrmZgIy2RKOwveDZAnh7pIs4uN.l3k2BSupcNNxGGa'),
(15, '$2y$10$zNBIM6Sw0ALbbSu8CMAa.ODdv8i2kzWAiu31oPCh7zIJsQkznn8.K'),
(16, '$2y$10$orVqxoSz/jPxFYyD8dHpKus2ledv9DABl8kGKX/IwjbOLhY/WGMx.'),
(17, '$2y$10$O.rYDi/JnEGtHIZrMUhkK.AEgT0HabjfEMMdTnozxBis18mDMZXKG'),
(18, '$2y$10$ggofYhYo66PpWwqUwDzhoO7HutqNy4OP/LA0qEDnErbJ5lP2UUu2K'),
(19, '$2y$10$mlWZWIol.a5jqVP.c4k.U.Sa1grDltsrrvNpYw7ydOERy7JMljfU.'),
(20, '$2y$10$J3geu/RNeIt9SQMlwptqoeaXcScouJf6yNC0kqW8HrDn8yynUbFv2'),
(21, '$2y$10$msy.OnREg5VIRkig5oYVK.KCEuJ0p4h0otgKWWuJwLPyQ/0COl84y'),
(22, '$2y$10$RQYN7I2W4N9b9f2avGie9.0wAnPb/4/1vhZ7oqwR0gRDySGvPf2.W'),
(23, '$2y$10$JsoIufmi8w8GMsn1ll1k2eFivT.I8uBy/v8RD4oliWgoxBjQvQUSe'),
(24, '$2y$10$IQDdWujBFfhHjKPkV9X16uZZtNmkHmnsZhgZjFDAPPfpPwy2g.kDW');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_medication`
--

CREATE TABLE `tbl_medication` (
  `ID` int(11) NOT NULL,
  `medicationName` varchar(255) DEFAULT NULL,
  `bloodWorkRestriction` tinyint(1) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_medication`
--

INSERT INTO `tbl_medication` (`ID`, `medicationName`, `bloodWorkRestriction`) VALUES
(1, 'Trandolapril', 2),
(2, 'Olanzapine', 2),
(3, 'Amiodarone', 2),
(4, 'Cariprazine', 2),
(5, 'Carbimazole', 0),
(6, 'digoxin', 0),
(7, 'Naproxen', 2),
(8, 'DOAC', 2),
(9, 'DMARDS', 3),
(10, 'Eplerenone', 2),
(11, 'Microgynon 30', 2),
(12, 'Lithium', 3),
(13, 'mesalazine', 2),
(14, 'memantine', 1),
(15, 'nitrofurantoin', 0),
(16, 'Ketoprofen', 2),
(17, 'D-penicillamine', 3),
(18, 'Phenytoin', 0),
(19, 'pioglitazone', 0),
(20, 'propythiouracil', 0),
(21, 'sirolimus', 0),
(22, 'spironolactone', 0),
(23, 'Fluvastatin', 2),
(24, 'Hydrocortisone', 2),
(25, 'Theophylline', 0),
(26, 'thyroxine', 0),
(27, 'valproate', 0),
(28, 'minocycline', 0),
(29, 'terbinafine', 3),
(30, 'Hydroxychloroquine', 2),
(31, 'Omeprazole', 1),
(32, 'Yasmin', 2),
(33, 'calcium', 0),
(34, 'vitamin d', 0),
(35, 'diuretics', 0),
(36, 'medikinet', 0),
(37, 'Mirtazapine', 2),
(38, 'Elleste-Duet Conti', 2),
(39, 'Azathioprine', 3),
(40, 'Citalopram', 2),
(41, 'Sertraline', 2),
(42, 'Dabigatran', 2),
(43, 'Aripiprazole', 2),
(44, 'Risperidone', 2),
(45, 'Oxycodone', 2),
(46, 'Codeine', 2),
(47, 'Alfentanyl', 2),
(48, 'Calcium Carbonate', 1),
(49, 'Indapamide', 2),
(50, 'Ibuprofen', 2),
(51, 'Felodipine', 2),
(52, 'Nimodipine', 2),
(53, 'Atenolol', 2),
(54, 'Bisoprolol', 0),
(55, 'Captopril', 0),
(56, 'Lisinopril', 2),
(57, 'Ramipril', 2),
(58, 'Mycophenolate', 3),
(59, 'Eprosartan', 2),
(60, 'Apixaban', 2),
(61, 'Edoxaban', 2),
(62, 'Quetiapine', 2),
(63, 'Amisulpride', 2),
(64, 'Mycophenolate', 3),
(65, 'Meloxicam', 2),
(66, 'Rigevidon', 2),
(67, 'Simvastatin', 2),
(68, 'Dihydrocodeine', 2),
(69, 'Diamorphine', 2),
(70, 'Tapentadol', 2),
(71, 'metformin', 3),
(72, 'Metformin', 2),
(73, 'Azathioprine', 3),
(74, 'Nicardipine', 2),
(75, 'Nebivolol', 2),
(76, 'Nimodipine', 2),
(77, 'Enalapril', 0),
(78, 'Candesartan', 2),
(79, 'Losartan', 2),
(80, 'Olmesartan', 2),
(81, 'Telisartan', 2),
(82, 'Valsartan', 2),
(83, 'Escitalopram', 2),
(84, 'Rivaroxaban', 2),
(85, 'Furosemide', 2),
(86, 'Etodolac', 2),
(87, 'Diclofenac', 2),
(88, 'Etoricoxib', 2),
(89, 'Loestrin', 2),
(90, 'Pravastatin', 0),
(91, 'Lansoprazole', 1),
(92, 'Aspirin', 1),
(93, 'Seretide Inhaler', 2),
(94, 'Fostair Inhaler', 2),
(95, 'desmopressin', 1),
(96, 'Carvedilol', 0),
(97, 'Methotrexate', 3),
(98, 'Tacrolimus', 3),
(99, 'Warfarin', 3),
(100, 'Bendroflumethiazide', 2),
(101, 'Indapamide', 2),
(102, 'Bumetanide', 2),
(103, 'Desogestrel', 2),
(104, 'Cilest', 2),
(105, 'Femoston Conti', 2),
(106, 'Rosuvastatin', 2),
(107, 'Atorvastatin', 2),
(108, 'Amlodipine', 2),
(109, 'Diltiazem', 2),
(110, 'Lacidipine', 2),
(111, 'Lercanidipine', 1),
(112, 'Nifedipine', 2),
(113, 'Verapamil', 0),
(114, 'Metoprolol', 2),
(115, 'Acebutolol', 2),
(116, 'Perindopril', 2),
(117, 'Dapsone', 3),
(118, 'Leflunomide', 3),
(119, 'Sulfasalazine', 3),
(120, 'Irbesartan', 2),
(121, 'Tridestra', 2),
(122, 'Morphine', 2),
(123, 'Fentanyl', 2),
(124, 'Tramadol', 2),
(125, 'Butrans', 2),
(126, 'Transited', 2),
(127, 'Prednisolone', 2),
(128, 'salbutamol inhaler', 2),
(129, 'Memantine', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patient`
--

CREATE TABLE `tbl_patient` (
  `NHSNumber` int(11) NOT NULL,
  `userID` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patient`
--

INSERT INTO `tbl_patient` (`NHSNumber`, `userID`) VALUES
(572381, 2),
(1234567890, 31),
(734567, 30),
(745721, 24),
(678346, 25),
(1337, 32),
(2147483647, 33),
(325987, 34),
(1234, 35),
(324, 36),
(123, 37),
(1, 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patientBloodwork`
--

CREATE TABLE `tbl_patientBloodwork` (
  `ID` int(11) NOT NULL,
  `patientID` int(11) DEFAULT 0,
  `bloodworkID` int(11) DEFAULT 0,
  `start` datetime DEFAULT NULL,
  `expire` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patientBloodwork`
--

INSERT INTO `tbl_patientBloodwork` (`ID`, `patientID`, `bloodworkID`, `start`, `expire`) VALUES
(38, 734567, 1, '2021-02-16 00:00:00', '2021-02-16 00:00:00'),
(36, 745721, 6, '2021-02-15 00:00:00', '2021-02-15 00:00:00'),
(47, 572381, 17, '2021-01-09 00:00:00', '2021-01-17 00:00:00'),
(53, 734567, 22, '2021-02-16 00:00:00', '2021-02-25 00:00:00'),
(35, 745721, 1, '2021-02-15 00:00:00', '2021-02-15 00:00:00'),
(45, 572381, 10, '2021-02-16 00:00:00', '2021-02-16 00:00:00'),
(46, 325987, 4, '2021-02-16 00:00:00', '2021-06-16 00:00:00'),
(52, 734567, 1, '2021-02-16 00:00:00', '2021-02-25 00:00:00'),
(44, 2147483647, 2, '2021-02-16 00:00:00', '2021-02-16 00:00:00'),
(54, 325987, 12, '2021-01-16 00:00:00', '2021-01-29 00:00:00'),
(51, 734567, 22, '2021-01-16 00:00:00', '2021-01-21 00:00:00'),
(55, 325987, 12, '2021-02-16 00:00:00', '2021-02-19 00:00:00'),
(39, 745721, 1, '2021-02-16 00:00:00', '2021-02-16 00:00:00'),
(40, 572381, 10, '2021-02-16 00:00:00', '2021-02-16 00:00:00'),
(41, 572381, 10, '2021-02-16 00:00:00', '2021-07-16 00:00:00'),
(42, 745721, 13, '2021-02-16 00:00:00', '2021-05-16 00:00:00'),
(43, 572381, 12, '2021-02-04 00:00:00', '2021-02-26 00:00:00'),
(37, 745721, 7, '2021-02-15 00:00:00', '2021-03-12 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_patientMedication`
--

CREATE TABLE `tbl_patientMedication` (
  `ID` int(11) NOT NULL,
  `patientID` int(11) DEFAULT 0,
  `medicationID` int(11) DEFAULT 0,
  `prescribed` datetime DEFAULT NULL,
  `collected` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_patientMedication`
--

INSERT INTO `tbl_patientMedication` (`ID`, `patientID`, `medicationID`, `prescribed`, `collected`) VALUES
(3, 24, 70, '2021-02-03 00:00:00', NULL),
(2, 24, 6, '2021-02-03 00:00:00', NULL),
(4, 745721, 1, '2021-02-16 00:00:00', NULL),
(5, 745721, 1, '2021-02-16 00:00:00', NULL),
(6, 745721, 9, '2021-02-16 00:00:00', NULL),
(7, 734567, 10, '2021-02-16 00:00:00', NULL),
(8, 734567, 15, '2021-02-16 00:00:00', NULL),
(9, 678346, 11, '2021-02-16 00:00:00', NULL),
(10, 745721, 12, '2021-02-17 00:00:00', NULL),
(11, 572381, 1, '2021-02-16 00:00:00', NULL),
(12, 572381, 32, '2021-02-16 00:00:00', '2021-02-16 00:00:00'),
(13, 572381, 23, '2021-02-16 00:00:00', '2021-02-16 01:22:06'),
(14, 1234567890, 1, '2021-02-16 00:00:00', NULL),
(15, 1234567890, 81, '2021-02-16 00:00:00', NULL),
(16, 1234567890, 122, '2021-02-16 00:00:00', NULL),
(17, 1234567890, 12, '2021-02-16 00:00:00', NULL),
(18, 1234567890, 12, '2021-02-16 00:00:00', NULL),
(19, 745721, 122, '2021-02-16 00:00:00', NULL),
(20, 572381, 122, '2021-02-16 00:00:00', NULL),
(21, 572381, 17, '2021-02-16 00:00:00', NULL),
(22, 572381, 26, '2021-02-16 00:00:00', NULL),
(23, 325987, 2, '2021-02-16 00:00:00', NULL),
(24, 325987, 122, '2021-02-16 00:00:00', NULL),
(25, 734567, 122, '2021-02-16 00:00:00', NULL),
(26, 325987, 12, '2021-02-16 00:00:00', '2021-02-16 16:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permission`
--

CREATE TABLE `tbl_permission` (
  `ID` int(11) NOT NULL,
  `tag` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_permission`
--

INSERT INTO `tbl_permission` (`ID`, `tag`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_prescriptionBarcode`
--

CREATE TABLE `tbl_prescriptionBarcode` (
  `ID` int(11) NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `prescriptionID` int(11) DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_username`
--

CREATE TABLE `tbl_username` (
  `ID` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `datecreated` int(11) DEFAULT 0,
  `email` varchar(255) DEFAULT NULL,
  `forename` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_username`
--

INSERT INTO `tbl_username` (`ID`, `username`, `datecreated`, `email`, `forename`, `surname`) VALUES
(1, 'joeymarrey', 1610636103, 'joey.marrey@gmail.com', 'JOEY', 'MARREY'),
(2, 'normaluser', 1611065224, 'normaluser@gmail.com', 'Normal', 'User'),
(3, 'mememan', 1611067159, 'isacbake@test.com', 'isac', 'bake'),
(4, 'Nathan Lewin', 1611067635, 'nathan.lewin1@gmail.com', 'Nathan', 'Lewin'),
(34, 'DemoTest', 1613485719, 'Demotest@gmail.com', 'Demo', 'Test'),
(30, 'abc', 1613395437, 'abc@abc.com', 'test', 'test'),
(31, 'testman', 1613397807, 'testuser@user.com', 'Test', 'User'),
(32, 'admin', 1613425360, 'admin@admin.co.uk', 'admin', 'admin'),
(33, 'mobiletest', 1613445946, 'mobiletest@test.com', 'Vlad', 'Jonas'),
(24, 'joebloggs', 1613134403, 'joe@bloggs.com', 'joe', 'bloggs'),
(25, 'a', 1613134481, 'a@a.com', 'a', 'a'),
(35, 'THISDOESN\'TWORK', 1613489029, 'THISDOESN\'TWORK@EMAIL.COM', 'THISDOESN\'TWORK', 'THISDOESN\'TWORK'),
(36, 'PLSWORKNOW', 1613489062, 'PLSWORKNOW@email.com', 'PLSWORKNOW', 'PLSWORKNOW'),
(37, 'FIXSITETEST', 1613489088, 'FIXSITETEST@email.com', 'FIXSITETEST', 'FIXSITETEST'),
(38, 'SALISU', 1613489147, 'SALISU@email.com', 'SALISU', 'SALISU'),
(39, 'INHALER', 1613489287, 'INHALER@email.com', 'INHALER', 'INHALER'),
(40, 'FIXFIXFIX', 1613489303, 'FIXFIXFIX@EMAIL.COM', 'FIXFIXFIX', 'FIXFIXFIX');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lnk_medicationBloodwork`
--
ALTER TABLE `lnk_medicationBloodwork`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `bloodworkID` (`bloodworkID`),
  ADD KEY `medicationID` (`medicationID`);

--
-- Indexes for table `lnk_userHash`
--
ALTER TABLE `lnk_userHash`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `hashID` (`hashID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `lnk_userPermission`
--
ALTER TABLE `lnk_userPermission`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `permissionID` (`permissionID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_bloodwork`
--
ALTER TABLE `tbl_bloodwork`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_hashword`
--
ALTER TABLE `tbl_hashword`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_medication`
--
ALTER TABLE `tbl_medication`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_patient`
--
ALTER TABLE `tbl_patient`
  ADD PRIMARY KEY (`NHSNumber`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tbl_patientBloodwork`
--
ALTER TABLE `tbl_patientBloodwork`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `bloodworkID` (`bloodworkID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `tbl_patientMedication`
--
ALTER TABLE `tbl_patientMedication`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `tbl_patientMedication_ID_uindex` (`ID`),
  ADD KEY `medicationID` (`medicationID`),
  ADD KEY `patientID` (`patientID`);

--
-- Indexes for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_prescriptionBarcode`
--
ALTER TABLE `tbl_prescriptionBarcode`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `barcode` (`barcode`),
  ADD KEY `prescriptionID` (`prescriptionID`);

--
-- Indexes for table `tbl_username`
--
ALTER TABLE `tbl_username`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lnk_medicationBloodwork`
--
ALTER TABLE `lnk_medicationBloodwork`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;

--
-- AUTO_INCREMENT for table `lnk_userHash`
--
ALTER TABLE `lnk_userHash`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `lnk_userPermission`
--
ALTER TABLE `lnk_userPermission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tbl_bloodwork`
--
ALTER TABLE `tbl_bloodwork`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_hashword`
--
ALTER TABLE `tbl_hashword`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tbl_medication`
--
ALTER TABLE `tbl_medication`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tbl_patientBloodwork`
--
ALTER TABLE `tbl_patientBloodwork`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `tbl_patientMedication`
--
ALTER TABLE `tbl_patientMedication`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_permission`
--
ALTER TABLE `tbl_permission`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_prescriptionBarcode`
--
ALTER TABLE `tbl_prescriptionBarcode`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_username`
--
ALTER TABLE `tbl_username`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
