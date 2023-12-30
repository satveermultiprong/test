-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2023 at 10:28 AM
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
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `username`, `email`, `password`) VALUES
(1, '$fullname', '$username', '$email', '$password'),
(2, 'satveer', 'satveer', 'satveermultiprong@gmail.com', '123'),
(3, 'satveer', 'kuldeep', 'satveermultiprong@gmail.com', '123'),
(4, 'himahshu', 'him', 'him@123', '123'),
(5, 'himahshu', 'himanshu', 'him@123', '1234'),
(6, '1213', 'satveer', 'satveer@12', 'wer'),
(10, '', 'adaD', 'idljek@g', 'DAs'),
(11, '', 'addddd', 'asd@df', 'fds');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `item` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `payment_mode` varchar(100) NOT NULL,
  `expanse_date` date NOT NULL,
  `added_on` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `expense`
--

INSERT INTO `expense` (`id`, `category`, `item`, `price`, `payment_mode`, `expanse_date`, `added_on`) VALUES
(1, 'Food', 'patashi', 20, '0', '2023-12-29', '2023-12-27'),
(2, 'Transportation', 'bus', 20, '0', '2023-12-26', '2023-12-27'),
(34, 'Health care', 'medicos', 24, 'CASH', '2023-12-27', '2023-12-28'),
(35, 'Health care', 'medicos', 24, 'CASH', '2023-12-27', '2023-12-28'),
(36, 'Fastion', 'oil', 50, 'UPI', '2023-11-28', '2023-12-28'),
(39, 'Stationery', 'bookes', 20, 'Net banking', '2023-12-16', '2023-12-28'),
(40, 'Transportation', 'bus', 50, 'CASH', '2023-12-29', '2023-12-29'),
(41, 'Fastion', 'bus', 20, 'Net banking', '2023-12-13', '2023-12-29'),
(42, '', '', 0, '', '0000-00-00', '2023-12-29');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense`
--
ALTER TABLE `expense`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
