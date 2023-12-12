-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 12, 2023 at 12:39 AM
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
-- Database: `PrimarySchool`
--

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `Class_ID` int(11) NOT NULL,
  `Class_name` varchar(10) DEFAULT NULL,
  `Pupils_num` int(11) DEFAULT NULL,
  `Teacher_name` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `classes`
--

INSERT INTO `classes` (`Class_ID`, `Class_name`, `Pupils_num`, `Teacher_name`) VALUES
(201, 'C', 10, 'Omar A');

-- --------------------------------------------------------

--
-- Table structure for table `Parents`
--

CREATE TABLE `Parents` (
  `Parent_ID` int(11) NOT NULL,
  `Parent_name` varchar(30) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Parents`
--

INSERT INTO `Parents` (`Parent_ID`, `Parent_name`, `Address`, `Email`) VALUES
(1, 'Jay', 'Trafford Park 4 Wharf End Manchester M17 1AB', 'jayjayjay@gmail.com'),
(123, 'PETER', 'M17 1BS', '1234567@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `pupils`
--

CREATE TABLE `pupils` (
  `Student_ID` int(11) NOT NULL,
  `Student_Fname` varchar(30) DEFAULT NULL,
  `Student_Lname` varchar(30) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Medicalinfo` varchar(100) DEFAULT NULL,
  `Class_ID` int(11) DEFAULT NULL,
  `Parents1` varchar(30) DEFAULT NULL,
  `Parents2` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pupils`
--

INSERT INTO `pupils` (`Student_ID`, `Student_Fname`, `Student_Lname`, `Address`, `Medicalinfo`, `Class_ID`, `Parents1`, `Parents2`) VALUES
(111, '222', '444', '333', '333', 201, 'Jay', 'Jay');

-- --------------------------------------------------------

--
-- Table structure for table `Teachers`
--

CREATE TABLE `Teachers` (
  `Teacher_ID` int(11) NOT NULL,
  `Teacher_name` varchar(30) DEFAULT NULL,
  `Address` varchar(100) DEFAULT NULL,
  `Phone` varchar(20) DEFAULT NULL,
  `Salary` int(11) DEFAULT NULL,
  `Background_info` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Teachers`
--

INSERT INTO `Teachers` (`Teacher_ID`, `Teacher_name`, `Address`, `Phone`, `Salary`, `Background_info`) VALUES
(1234, 'Omar A', 'Brian Statham Way Old Trafford Stretford Manchester M16 0PU', '7536282957', 3000, 'aaaaaaaaaaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`Class_ID`),
  ADD KEY `idx_teachername` (`Teacher_name`);

--
-- Indexes for table `Parents`
--
ALTER TABLE `Parents`
  ADD PRIMARY KEY (`Parent_ID`),
  ADD KEY `idx_parentname` (`Parent_name`);

--
-- Indexes for table `pupils`
--
ALTER TABLE `pupils`
  ADD PRIMARY KEY (`Student_ID`),
  ADD KEY `fk_class_id` (`Class_ID`),
  ADD KEY `idx_parent1` (`Parents1`),
  ADD KEY `idx_parent2` (`Parents2`);

--
-- Indexes for table `Teachers`
--
ALTER TABLE `Teachers`
  ADD PRIMARY KEY (`Teacher_ID`),
  ADD KEY `idx_teachername1` (`Teacher_name`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `classes`
--
ALTER TABLE `classes`
  ADD CONSTRAINT `fk_tea_name` FOREIGN KEY (`Teacher_name`) REFERENCES `teachers` (`Teacher_name`);

--
-- Constraints for table `pupils`
--
ALTER TABLE `pupils`
  ADD CONSTRAINT `fk_class_id` FOREIGN KEY (`Class_ID`) REFERENCES `classes` (`Class_ID`),
  ADD CONSTRAINT `fk_pa_name1` FOREIGN KEY (`Parents1`) REFERENCES `parents` (`Parent_name`),
  ADD CONSTRAINT `fk_pa_name2` FOREIGN KEY (`Parents2`) REFERENCES `parents` (`Parent_name`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
