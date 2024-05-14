-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2024 at 01:50 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `finance`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill1`
--

CREATE TABLE `bill1` (
  `Bl_Bill_No` int(50) NOT NULL,
  `Bl_BillDate` date DEFAULT NULL,
  `Bl_CustomerId` int(50) DEFAULT NULL,
  `Bl_Gross` decimal(50,2) DEFAULT NULL,
  `Bl_DiscountPercentage` decimal(50,2) DEFAULT NULL,
  `Bl_GstPercentage` decimal(50,2) DEFAULT NULL,
  `Bl_Net` decimal(50,2) DEFAULT NULL,
  `Bl_DiscountPrice` decimal(50,2) DEFAULT NULL,
  `Bl_GSTPrice` decimal(50,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill1`
--

INSERT INTO `bill1` (`Bl_Bill_No`, `Bl_BillDate`, `Bl_CustomerId`, `Bl_Gross`, `Bl_DiscountPercentage`, `Bl_GstPercentage`, `Bl_Net`, `Bl_DiscountPrice`, `Bl_GSTPrice`) VALUES
(1, '2024-03-08', 1, 160.00, 2.09, 3.06, 161.45, 3.34, 4.79),
(2, '2024-03-14', 2, 260.00, 7.89, 7.63, 257.76, 20.51, 18.27),
(3, '2024-04-02', 3, 210.00, 56.00, 56.00, 144.14, 117.60, 51.74),
(4, '2024-03-08', 1, 140.00, 3.00, 3.00, 139.87, 4.20, 4.07),
(6, '2024-03-14', 1, 170.00, 2.99, 3.06, 169.96, 5.08, 5.05),
(7, '2024-02-08', 2, 270.00, 3.00, 3.00, 269.76, 8.10, 7.86),
(8, '2024-03-07', 3, 190.00, 4.00, 7.00, 195.17, 7.60, 12.77),
(10, '2024-04-15', 2, 60.00, 2.00, 4.00, 61.15, 1.20, 2.35),
(11, '2024-04-17', 3, 350.00, 2.00, 2.00, 349.86, 7.00, 6.86);

-- --------------------------------------------------------

--
-- Table structure for table `bill2`
--

CREATE TABLE `bill2` (
  `Bl2_Bl1_Bill_No` int(50) DEFAULT NULL,
  `Bl2_Bl1_BillDate` date DEFAULT NULL,
  `Bl_ItemNo` int(50) DEFAULT NULL,
  `Bl_Quantity` int(50) DEFAULT NULL,
  `Bl_Rate` int(50) DEFAULT NULL,
  `Bl_amount` decimal(50,2) DEFAULT NULL,
  `Bl_SLNo` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bill2`
--

INSERT INTO `bill2` (`Bl2_Bl1_Bill_No`, `Bl2_Bl1_BillDate`, `Bl_ItemNo`, `Bl_Quantity`, `Bl_Rate`, `Bl_amount`, `Bl_SLNo`) VALUES
(1, '2024-03-08', 1, 1, 90, 90.00, 1),
(1, '2024-03-08', 2, 1, 70, 70.00, 2),
(2, '2024-03-14', 1, 2, 90, 180.00, 1),
(2, '2024-03-14', 3, 2, 40, 80.00, 2),
(3, '2024-04-02', 2, 1, 70, 70.00, 1),
(3, '2024-04-02', 3, 1, 40, 40.00, 2),
(3, '2024-04-02', 5, 2, 50, 100.00, 3),
(4, '2024-03-08', 1, 1, 90, 90.00, 1),
(4, '2024-03-08', 5, 1, 50, 50.00, 0),
(6, '2024-03-14', 1, 1, 90, 90.00, 1),
(6, '2024-03-14', 2, 1, 70, 70.00, 2),
(6, '2024-03-14', 4, 1, 10, 10.00, 3),
(7, '2024-02-08', 1, 1, 90, 90.00, 1),
(7, '2024-02-08', 2, 1, 70, 70.00, 2),
(7, '2024-02-08', 3, 1, 40, 40.00, 3),
(7, '2024-02-08', 4, 2, 10, 20.00, 4),
(7, '2024-02-08', 5, 1, 50, 50.00, 5),
(8, '2024-03-07', 5, 3, 50, 150.00, 1),
(8, '2024-03-07', 3, 1, 40, 40.00, 2),
(11, '2024-04-17', 1, 1, 90, 90.00, 1),
(11, '2024-04-17', 2, 1, 70, 70.00, 2),
(11, '2024-04-17', 3, 2, 40, 80.00, 3),
(11, '2024-04-17', 4, 1, 10, 10.00, 4),
(11, '2024-04-17', 5, 2, 50, 100.00, 5),
(10, '2024-04-15', 4, 1, 10, 10.00, 1),
(10, '2024-04-15', 5, 1, 50, 50.00, 2);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cu_customerid` int(50) NOT NULL,
  `cu_fname` varchar(50) DEFAULT NULL,
  `cu_addr` varchar(50) DEFAULT NULL,
  `cu_doj` date DEFAULT NULL,
  `cu_deposite` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cu_customerid`, `cu_fname`, `cu_addr`, `cu_doj`, `cu_deposite`) VALUES
(1, 'test1', 'addr1', '2024-02-03', '50000'),
(2, 'test2', 'addr2', '2024-02-04', '9000'),
(3, 'test3', 'add3', '2024-02-22', '800');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `It_codeno` int(50) NOT NULL,
  `It_description` varchar(50) DEFAULT NULL,
  `It_rate` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`It_codeno`, `It_description`, `It_rate`) VALUES
(1, 'rice', '90'),
(2, 'dal', '70'),
(3, 'sabji', '40'),
(4, 'salad', '10'),
(5, 'gulab jamun', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill1`
--
ALTER TABLE `bill1`
  ADD PRIMARY KEY (`Bl_Bill_No`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cu_customerid`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`It_codeno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
