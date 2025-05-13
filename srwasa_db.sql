-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2025 at 07:27 PM
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
-- Database: `srwasa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_info`
--

CREATE TABLE `login_info` (
  `ID` int(11) NOT NULL,
  `Usertype` varchar(50) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(20) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_info`
--

INSERT INTO `login_info` (`ID`, `Usertype`, `username`, `password`, `status`) VALUES
(1, 'Admin', 'jemuel.rivero', 'employee123', 1),
(3, 'Meter reader', 'moses.becerro', 'employee123', 1),
(4, 'Cashier', 'nathaniel.nocalan', 'employee123', 1),
(63, 'Consumer', 'jemuel.rivero', 'pass123', 1),
(64, 'Consumer', 'haidie.rivero', 'pass123', 1),
(65, 'Consumer', 'moses.becerro', 'pass123', 1),
(66, 'Consumer', 'jodie.rivero', 'pass123', 1),
(67, 'Consumer', 'joel.rivero', 'pass123', 1),
(69, 'Consumer', 'rey.paguia', 'pass123', 1),
(70, 'Consumer', 'kazuto.kirigaya', 'pass123', 1),
(71, 'Consumer', 'junbenjie.mar', 'pass123', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblarchive`
--

CREATE TABLE `tblarchive` (
  `id` int(11) NOT NULL,
  `meter_no` int(100) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `name_ex` varchar(10) NOT NULL,
  `Application_date` date NOT NULL DEFAULT current_timestamp(),
  `Connection_date` date NOT NULL,
  `status` int(11) NOT NULL,
  `tag_id` int(20) NOT NULL,
  `Brgy_ID` int(20) NOT NULL,
  `Purok_ID` int(20) NOT NULL,
  `Contact_Number` varchar(25) NOT NULL,
  `login_info_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblarchive`
--

INSERT INTO `tblarchive` (`id`, `meter_no`, `fname`, `mname`, `lname`, `name_ex`, `Application_date`, `Connection_date`, `status`, `tag_id`, `Brgy_ID`, `Purok_ID`, `Contact_Number`, `login_info_ID`) VALUES
(1, 1, 'Jemuel', '', 'Rivero', '', '2023-04-30', '0000-00-00', 1, 1, 1, 1, '09063545671', 63),
(7, 9, 'Rey', '', 'Paguia', '', '2023-04-30', '0000-00-00', 1, 1, 1, 2, '09062650698', 69);

-- --------------------------------------------------------

--
-- Table structure for table `tblbaranggay`
--

CREATE TABLE `tblbaranggay` (
  `ID` int(11) NOT NULL,
  `Baranggay_Name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbaranggay`
--

INSERT INTO `tblbaranggay` (`ID`, `Baranggay_Name`) VALUES
(1, 'San Roque, Mabini, Bohol');

-- --------------------------------------------------------

--
-- Table structure for table `tblbilling`
--

CREATE TABLE `tblbilling` (
  `ID` int(11) NOT NULL,
  `total_consumption` decimal(50,0) NOT NULL,
  `tblcubicrate_ID` int(11) NOT NULL,
  `Total_Payables` decimal(50,0) NOT NULL,
  `bill_status` varchar(11) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp(),
  `date_paid` date DEFAULT NULL,
  `payment` decimal(50,0) DEFAULT NULL,
  `tblconsumption_ID` int(20) NOT NULL,
  `tblconsumer_ID` int(11) NOT NULL,
  `tblmeter_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblbilling`
--

INSERT INTO `tblbilling` (`ID`, `total_consumption`, `tblcubicrate_ID`, `Total_Payables`, `bill_status`, `date`, `date_paid`, `payment`, `tblconsumption_ID`, `tblconsumer_ID`, `tblmeter_ID`) VALUES
(1, 10, 1, 100, 'Paid', '2023-04-23', '2023-01-23', 100, 2, 1, 1),
(2, 5, 2, 75, 'Paid', '2023-04-23', '2023-02-23', 75, 4, 1, 2),
(4, 5, 1, 50, 'Paid', '2023-05-23', '2023-04-23', 55, 5, 1, 1),
(5, 5, 1, 50, 'Paid', '2023-06-23', '2023-04-23', 50, 8, 3, 4),
(6, 5, 2, 75, 'Paid', '2023-05-23', '2023-03-23', 75, 9, 1, 2),
(7, 10, 2, 150, 'Paid', '2023-05-23', '2023-04-23', 150, 10, 2, 3),
(8, 5, 1, 50, 'Overdue', '2023-03-23', NULL, NULL, 11, 1, 1),
(9, 5, 2, 75, 'Overdue', '2023-03-25', NULL, NULL, 12, 1, 2),
(10, 5, 1, 50, 'Paid', '2023-05-29', '2023-04-29', 100, 18, 3, 4),
(11, 5, 1, 50, 'Overdue', '2023-03-30', NULL, NULL, 20, 9, 10),
(12, 5, 1, 50, 'Paid', '2023-05-01', '2023-05-01', 50, 22, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblconsumer`
--

CREATE TABLE `tblconsumer` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `mname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) NOT NULL,
  `name_ex` varchar(10) NOT NULL,
  `Brgy_ID` int(20) NOT NULL,
  `Purok_ID` int(20) NOT NULL,
  `Contact_Number` varchar(25) NOT NULL,
  `status` int(11) NOT NULL,
  `login_info_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblconsumer`
--

INSERT INTO `tblconsumer` (`id`, `fname`, `mname`, `lname`, `name_ex`, `Brgy_ID`, `Purok_ID`, `Contact_Number`, `status`, `login_info_ID`) VALUES
(1, 'Jemuel', NULL, 'Rivero', '', 1, 1, '09062650692', 1, 63),
(2, 'Haidie', '', 'Rivero', '', 1, 1, '09062650692', 1, 64),
(3, 'Moses', '', 'Becerro', '', 1, 2, '09696969696', 1, 65),
(4, 'Jodie', '', 'Rivero', '', 1, 1, '09062650691', 1, 66),
(5, 'Joel', '', 'Rivero', '', 1, 5, '09063545674', 1, 67),
(8, 'Kazuto', '', 'Kirigaya', '', 1, 5, '09063545676', 0, 70),
(9, 'Jun Benjie', 'A.', 'Mar', '', 1, 4, '09352116865', 1, 71);

-- --------------------------------------------------------

--
-- Table structure for table `tblconsumption`
--

CREATE TABLE `tblconsumption` (
  `ID` int(11) NOT NULL,
  `previous_read` decimal(50,0) NOT NULL,
  `present_read` decimal(50,0) NOT NULL,
  `tblcubicrate_ID` int(11) NOT NULL,
  `tblreading_ID` int(20) NOT NULL,
  `tblconsumer_ID` int(20) NOT NULL,
  `tblmeter_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblconsumption`
--

INSERT INTO `tblconsumption` (`ID`, `previous_read`, `present_read`, `tblcubicrate_ID`, `tblreading_ID`, `tblconsumer_ID`, `tblmeter_ID`) VALUES
(1, 0, 0, 1, 1, 1, 1),
(2, 0, 10, 1, 2, 1, 1),
(3, 0, 0, 2, 3, 1, 2),
(4, 0, 5, 2, 4, 1, 2),
(5, 10, 15, 1, 5, 1, 1),
(6, 0, 0, 2, 6, 2, 3),
(7, 0, 0, 1, 7, 3, 4),
(8, 0, 5, 1, 8, 3, 4),
(9, 5, 10, 2, 9, 1, 2),
(10, 0, 10, 2, 10, 2, 3),
(11, 15, 20, 1, 11, 1, 1),
(12, 10, 15, 2, 12, 1, 2),
(13, 0, 0, 2, 13, 4, 5),
(14, 0, 0, 2, 14, 5, 6),
(15, 0, 0, 1, 15, 6, 7),
(16, 0, 0, 2, 16, 7, 8),
(17, 0, 0, 1, 17, 7, 9),
(18, 5, 10, 1, 18, 3, 4),
(19, 0, 0, 1, 19, 9, 10),
(20, 0, 5, 1, 20, 9, 10),
(21, 0, 0, 2, 21, 2, 11),
(22, 10, 15, 1, 22, 3, 4),
(23, 0, 10, 1, 23, 11, 12);

-- --------------------------------------------------------

--
-- Table structure for table `tblcubicrate`
--

CREATE TABLE `tblcubicrate` (
  `ID` int(11) NOT NULL,
  `previous_rate` decimal(50,0) NOT NULL,
  `present_rate` decimal(50,0) NOT NULL,
  `Effectivity_Date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcubicrate`
--

INSERT INTO `tblcubicrate` (`ID`, `previous_rate`, `present_rate`, `Effectivity_Date`) VALUES
(1, 0, 10, '2023-03-30'),
(2, 0, 15, '2023-04-04');

-- --------------------------------------------------------

--
-- Table structure for table `tblemployee`
--

CREATE TABLE `tblemployee` (
  `ID` int(11) NOT NULL,
  `fname` varchar(45) NOT NULL,
  `mname` varchar(45) DEFAULT NULL,
  `lname` varchar(45) NOT NULL,
  `name_ex` varchar(45) DEFAULT NULL,
  `Purok_ID` int(11) NOT NULL,
  `Brgy_ID` int(20) NOT NULL,
  `Contact_Number` varchar(25) NOT NULL,
  `status` int(20) NOT NULL,
  `login_info_ID` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblemployee`
--

INSERT INTO `tblemployee` (`ID`, `fname`, `mname`, `lname`, `name_ex`, `Purok_ID`, `Brgy_ID`, `Contact_Number`, `status`, `login_info_ID`) VALUES
(1, 'Moses', '', 'Becerro', '', 2, 1, '09063545671', 1, 3),
(2, 'Nathaniel', '', 'Nocalan', '', 1, 1, '09062650691', 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tblexpenses`
--

CREATE TABLE `tblexpenses` (
  `ID` int(11) NOT NULL,
  `Description` varchar(100) NOT NULL,
  `UOM` varchar(45) NOT NULL,
  `qty` decimal(50,0) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblexpenses`
--

INSERT INTO `tblexpenses` (`ID`, `Description`, `UOM`, `qty`, `amount`, `date`) VALUES
(1, 'nails', 'kg', 1, 75, '2023-04-09'),
(2, 'tubo', 'meters', 12, 1000, '2023-02-09'),
(3, 'tubo', 'pcs', 1, 500, '2023-01-09'),
(4, 'tubo', 'meters', 12, 1000, '2023-03-09'),
(5, 'sealant', 'pcs', 1, 50, '2023-05-09');

-- --------------------------------------------------------

--
-- Table structure for table `tblmeter`
--

CREATE TABLE `tblmeter` (
  `ID` int(11) NOT NULL,
  `meter_no` varchar(100) NOT NULL,
  `type` varchar(45) NOT NULL,
  `status` int(11) NOT NULL,
  `tag` int(11) NOT NULL,
  `Brgy_ID` int(11) NOT NULL,
  `Purok_ID` int(11) NOT NULL,
  `Connection_Date` date NOT NULL DEFAULT current_timestamp(),
  `tblconsumer_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblmeter`
--

INSERT INTO `tblmeter` (`ID`, `meter_no`, `type`, `status`, `tag`, `Brgy_ID`, `Purok_ID`, `Connection_Date`, `tblconsumer_ID`) VALUES
(1, '001', '1', 1, 3, 1, 1, '2023-04-23', 1),
(2, '002', '2', 1, 3, 1, 4, '2023-04-23', 1),
(3, '003', '2', 1, 1, 1, 2, '2023-04-23', 2),
(4, '004', '1', 1, 1, 1, 3, '2023-04-23', 3),
(5, '006', '2', 1, 1, 1, 4, '2023-04-27', 4),
(6, '007', '2', 1, 1, 1, 4, '2023-04-27', 5),
(8, '009', '2', 1, 1, 1, 2, '2023-04-28', 7),
(9, '011', '1', 1, 1, 0, 0, '2023-04-29', 7),
(10, '100', '1', 1, 3, 1, 4, '2023-04-30', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tblpurok`
--

CREATE TABLE `tblpurok` (
  `ID` int(11) NOT NULL,
  `Purok` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblpurok`
--

INSERT INTO `tblpurok` (`ID`, `Purok`) VALUES
(1, 'Purok 1'),
(2, 'Purok 2'),
(3, 'Purok 3'),
(4, 'Purok 4'),
(5, 'Purok 5'),
(6, 'Purok 6'),
(7, 'Purok 7');

-- --------------------------------------------------------

--
-- Table structure for table `tblreading`
--

CREATE TABLE `tblreading` (
  `ID` int(11) NOT NULL,
  `tblmeter_ID` int(20) NOT NULL,
  `reading` int(55) NOT NULL,
  `read_date` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblreading`
--

INSERT INTO `tblreading` (`ID`, `tblmeter_ID`, `reading`, `read_date`) VALUES
(1, 1, 0, '2023-04-23'),
(2, 1, 10, '2023-05-23'),
(3, 2, 0, '2023-04-23'),
(4, 2, 5, '2023-05-23'),
(5, 1, 15, '2023-06-23'),
(6, 3, 0, '2023-04-23'),
(7, 4, 0, '2023-04-23'),
(8, 4, 5, '2023-05-23'),
(9, 2, 10, '2023-06-23'),
(10, 3, 10, '2023-05-23'),
(11, 1, 20, '2023-04-23'),
(12, 2, 15, '2023-04-25'),
(13, 5, 0, '2023-04-27'),
(14, 6, 0, '2023-04-27'),
(15, 7, 0, '2023-04-27'),
(16, 8, 0, '2023-04-28'),
(17, 9, 0, '2023-04-29'),
(18, 4, 10, '2023-05-30'),
(19, 10, 0, '2023-04-30'),
(20, 10, 5, '2023-04-30'),
(21, 11, 0, '2023-05-01'),
(22, 4, 15, '2023-05-01'),
(23, 12, 10, '2025-05-14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_info`
--
ALTER TABLE `login_info`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblarchive`
--
ALTER TABLE `tblarchive`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblbaranggay`
--
ALTER TABLE `tblbaranggay`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblbilling`
--
ALTER TABLE `tblbilling`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblconsumer`
--
ALTER TABLE `tblconsumer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login_info_ID` (`login_info_ID`);

--
-- Indexes for table `tblconsumption`
--
ALTER TABLE `tblconsumption`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblcubicrate`
--
ALTER TABLE `tblcubicrate`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblemployee`
--
ALTER TABLE `tblemployee`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblexpenses`
--
ALTER TABLE `tblexpenses`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblmeter`
--
ALTER TABLE `tblmeter`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblpurok`
--
ALTER TABLE `tblpurok`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tblreading`
--
ALTER TABLE `tblreading`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_info`
--
ALTER TABLE `login_info`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tblarchive`
--
ALTER TABLE `tblarchive`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tblbaranggay`
--
ALTER TABLE `tblbaranggay`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblbilling`
--
ALTER TABLE `tblbilling`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblconsumer`
--
ALTER TABLE `tblconsumer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblconsumption`
--
ALTER TABLE `tblconsumption`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tblcubicrate`
--
ALTER TABLE `tblcubicrate`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblemployee`
--
ALTER TABLE `tblemployee`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblexpenses`
--
ALTER TABLE `tblexpenses`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tblmeter`
--
ALTER TABLE `tblmeter`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblpurok`
--
ALTER TABLE `tblpurok`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblreading`
--
ALTER TABLE `tblreading`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
