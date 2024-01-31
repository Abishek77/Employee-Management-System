-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2024 at 07:48 PM
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
-- Database: `ndu`
--

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `name` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `tdate` varchar(100) DEFAULT NULL,
  `tmode` varchar(100) DEFAULT NULL,
  `tid` varchar(100) DEFAULT NULL,
  `id` int(200) NOT NULL,
  `role` varchar(100) NOT NULL,
  `userstatus` int(100) DEFAULT NULL,
  `bankname` varchar(100) NOT NULL,
  `account` int(255) NOT NULL,
  `ifsc` varchar(100) NOT NULL,
  `file1` varchar(255) DEFAULT NULL,
  `content1` varchar(255) DEFAULT NULL,
  `file2` varchar(255) DEFAULT NULL,
  `content2` varchar(255) DEFAULT NULL,
  `file3` varchar(255) DEFAULT NULL,
  `content3` varchar(255) DEFAULT NULL,
  `invested` varchar(100) NOT NULL,
  `aproved` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`name`, `lname`, `email`, `password`, `phone`, `tdate`, `tmode`, `tid`, `id`, `role`, `userstatus`, `bankname`, `account`, `ifsc`, `file1`, `content1`, `file2`, `content2`, `file3`, `content3`, `invested`, `aproved`) VALUES
('Super', 'Admin', 'superadmin', '35ec3ba6c0b063fb28342cc8b4700e59', '532135415', '4343', '4343', '4343', 19, 'admin', 0, '', 0, '', '', '', '', '', '', '', '', 1),
('', '', 'admin', '35ec3ba6c0b063fb28342cc8b4700e59', '', NULL, NULL, NULL, 74, 'admin', 0, '', 0, '', NULL, NULL, NULL, NULL, NULL, NULL, '', 1),
('Nookathoti', 'Abishek', 'test99@gmail.com', '35ec3ba6c0b063fb28342cc8b4700e59', '+917032327702', '2024-01-31', 'Yes', '112', 76, 'client', 0, 'Test Bank', 123, '1Ab33RFC', '_DSC9696.JPG', 'uploads/_DSC9696.JPG', NULL, NULL, NULL, NULL, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
