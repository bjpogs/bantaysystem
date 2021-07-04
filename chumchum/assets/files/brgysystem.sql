-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 10:12 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `brgysystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `blotter_tbl`
--

CREATE TABLE `blotter_tbl` (
  `num` int(11) NOT NULL,
  `blotter_complainant` varchar(50) NOT NULL,
  `blotter_defendant` varchar(50) NOT NULL,
  `blotter_type` varchar(15) NOT NULL,
  `blotter_date` datetime NOT NULL,
  `blotter_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blotter_tbl`
--

INSERT INTO `blotter_tbl` (`num`, `blotter_complainant`, `blotter_defendant`, `blotter_type`, `blotter_date`, `blotter_status`) VALUES
(1, 'Ritchelle Lope', 'Jessa Lope', 'Blotter', '2021-06-30 10:56:32', 'Settled'),
(2, 'John Patrick', 'Chumchum Lope', 'Incident', '2021-06-15 16:58:04', 'Settled'),
(3, 'Fiona Angela', 'Kryzha Ann', 'Blotter', '2021-06-30 18:25:00', 'Settled'),
(4, 'Bunny Saria', 'Mary Grace Tan', 'Incident', '2021-01-13 08:30:00', 'Settled'),
(5, 'Kristan Lope', 'Kryzha Lope', 'Blotter', '2021-06-30 18:31:00', 'Active'),
(6, 'Edwin Mariano', 'Karla Mabella', 'Blotter', '2021-07-01 08:47:00', 'Settled'),
(7, 'test', 'test', 'Blotter', '2021-07-02 20:22:00', 'Active'),
(8, 'Maria Maglado', 'Engelbert Sy', 'Blotter', '2021-06-15 20:30:00', 'Active'),
(9, 'Leah Montes', 'Allysa Cruz', 'Incident', '2021-07-03 00:30:00', 'Active'),
(10, 'Gliza Mendoza Labayna', 'Kaye Ann Lope Mendoza ', 'Incident', '2021-07-04 12:53:00', 'Settled'),
(11, 'Renz Hernandez ', 'Julie Ann Lope', 'Blotter', '2021-07-04 15:39:00', 'Settled');

-- --------------------------------------------------------

--
-- Table structure for table `covid_tbl`
--

CREATE TABLE `covid_tbl` (
  `num` int(11) NOT NULL,
  `covid_cases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `covid_tbl`
--

INSERT INTO `covid_tbl` (`num`, `covid_cases`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `official_tbl`
--

CREATE TABLE `official_tbl` (
  `num` int(11) NOT NULL,
  `official_name` varchar(50) NOT NULL,
  `official_chairmanship` varchar(50) NOT NULL,
  `official_position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `official_tbl`
--

INSERT INTO `official_tbl` (`num`, `official_name`, `official_chairmanship`, `official_position`) VALUES
(1, 'Renato L. Lope', '', 'Barangay Captain'),
(3, 'Dulce M. Loto', 'Appropriation', 'Kagawad'),
(4, 'Analiza Magaling', 'Education', 'Kagawad'),
(5, 'Rolly Milaya', 'Peace and Order ', 'Kagawad'),
(6, 'Andrew Mandron', 'Impra', 'Kagawad'),
(7, 'Emmalyn Lope', 'Committee on Health ', 'Kagawad'),
(8, 'Alan Makalood', 'Ordinance', 'Kagawad'),
(9, 'Kira Lineses', '', 'Kagawad'),
(10, 'Renalyn Bustamante', '', 'Secretary'),
(56, 'Maricel Maigting', '', 'Treasurer');

-- --------------------------------------------------------

--
-- Table structure for table `resident_tbl`
--

CREATE TABLE `resident_tbl` (
  `resident_number` int(11) NOT NULL,
  `resident_fname` varchar(30) NOT NULL,
  `resident_mname` varchar(30) NOT NULL,
  `resident_lname` varchar(30) NOT NULL,
  `resident_alias` varchar(50) NOT NULL,
  `resident_bday` date NOT NULL,
  `resident_gender` varchar(10) NOT NULL,
  `resident_sitio` varchar(20) NOT NULL,
  `resident_voterstatus` varchar(10) NOT NULL,
  `resident_civilstatus` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resident_tbl`
--

INSERT INTO `resident_tbl` (`resident_number`, `resident_fname`, `resident_mname`, `resident_lname`, `resident_alias`, `resident_bday`, `resident_gender`, `resident_sitio`, `resident_voterstatus`, `resident_civilstatus`) VALUES
(11, 'Agnes', 'Rivera', 'Shaw', 'Aggie', '1969-02-14', 'Female', 'Panugduan', 'Yes', 'Married'),
(12, 'John Fred ', 'Magboo', 'Lope', 'Awra', '2002-04-10', 'Male', 'Panugduan', 'Yes', 'Single'),
(13, 'Frennie Lyn', 'Magboo', 'Lope', 'Beng', '1999-05-26', 'Female', 'Badbad', 'Yes', 'Married'),
(14, 'Cristtle Kyle ', 'Dumagat', 'Corre', 'core', '2002-11-24', 'Female', 'Ingas', 'Yes', 'Single'),
(15, 'Marc Owen', 'Tan', 'Rocha', 'Owen', '2003-03-23', 'Male', 'Baliis', 'Yes', 'Single'),
(16, 'Kristine Kyle', 'Tan', 'Rocha', 'Kakay', '2002-01-22', 'Female', 'Bugo', 'Yes', 'Single'),
(17, 'John Denver ', 'Mendoza', 'Labayna', 'Denden', '2006-12-29', 'Male', 'Centro', 'No', 'Single'),
(18, 'Zyjohn', 'Mendoza', 'Labayna', 'zy', '2010-07-20', 'Male', 'Bugo', 'No', 'Single'),
(19, 'Nica', 'Rey', 'Mendoza ', 'Rags', '2010-04-18', 'Female', 'Ingas', 'No', 'Single'),
(20, 'Christian Jay', 'Magistrado', 'Maigting', 'chano', '1998-07-23', 'Male', 'Badbad', 'No', 'Single'),
(26, 'Kryzha Ann Junette', 'Lineses', 'Lope', 'Yzha', '2003-06-05', 'Female', 'Panugduan', 'No', 'Single'),
(29, 'Ariel Jr.', 'Talic', 'Atienza', 'bjpogs', '1998-08-26', 'Male', 'Centro', 'Yes', 'Single'),
(33, 'Kent Aldrin Jonathan ', 'Lineses ', 'Lope', 'tibhor', '1998-07-31', 'Male', 'Panugduan', 'Yes', 'Single'),
(35, 'Kristhan Amir Jinrex', 'Lineses ', 'Lope ', 'Hoots', '2005-11-29', 'Male', 'Panugduan', 'No', 'Single');

-- --------------------------------------------------------

--
-- Table structure for table `sitio_tbl`
--

CREATE TABLE `sitio_tbl` (
  `num` int(11) NOT NULL,
  `sitio_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sitio_tbl`
--

INSERT INTO `sitio_tbl` (`num`, `sitio_name`) VALUES
(1, 'Badbad'),
(2, 'Ingas'),
(3, 'Centro'),
(4, 'Panugduan'),
(5, 'Baliis'),
(6, 'Bugo');

-- --------------------------------------------------------

--
-- Table structure for table `skofficial_tbl`
--

CREATE TABLE `skofficial_tbl` (
  `num` int(11) NOT NULL,
  `skofficial_name` varchar(50) NOT NULL,
  `skofficial_chairmanship` varchar(50) NOT NULL,
  `skofficial_position` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `skofficial_tbl`
--

INSERT INTO `skofficial_tbl` (`num`, `skofficial_name`, `skofficial_chairmanship`, `skofficial_position`) VALUES
(3, 'Earl  Jay Muni', '', 'SK Chairman'),
(4, 'Millecent Amor Malimata', '', 'SK Kagawad'),
(5, 'Chona Marie Aroyo', '', 'SK Kagawad'),
(6, 'Arjhay Lope', '', 'SK Kagawad'),
(7, 'Romina Loto', '', 'SK Kagawad');

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `username`, `password`, `name`, `user_type`) VALUES
(1, 'admin', 'admin', 'ADMINISTRATOR', 'Admin'),
(2, 'test', 'test', 'TESTER', 'Admin'),
(5, 'yzha', 'yzha07', 'Kryzha Lope', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blotter_tbl`
--
ALTER TABLE `blotter_tbl`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `covid_tbl`
--
ALTER TABLE `covid_tbl`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `official_tbl`
--
ALTER TABLE `official_tbl`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `resident_tbl`
--
ALTER TABLE `resident_tbl`
  ADD PRIMARY KEY (`resident_number`);

--
-- Indexes for table `sitio_tbl`
--
ALTER TABLE `sitio_tbl`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `skofficial_tbl`
--
ALTER TABLE `skofficial_tbl`
  ADD PRIMARY KEY (`num`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blotter_tbl`
--
ALTER TABLE `blotter_tbl`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `covid_tbl`
--
ALTER TABLE `covid_tbl`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `official_tbl`
--
ALTER TABLE `official_tbl`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `resident_tbl`
--
ALTER TABLE `resident_tbl`
  MODIFY `resident_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sitio_tbl`
--
ALTER TABLE `sitio_tbl`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `skofficial_tbl`
--
ALTER TABLE `skofficial_tbl`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
