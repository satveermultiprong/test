-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2024 at 11:59 AM
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
  `password` varchar(50) NOT NULL
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
(11, '', 'addddd', 'asd@df', 'fds'),
(12, 'satveer', 'satveer', 'satveermultiprong@gmail.com', '202cb962ac59075b964b'),
(13, 'satveer', 'satveer', 'satveermultiprong@gmail.com', '$2y$10$cPm3p3HuACfhd'),
(14, 'satveer', 'satveer', 'satveermultiprong@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(100) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `category_name`) VALUES
(1, 'Food'),
(2, 'Transportation'),
(3, 'Fashion'),
(4, 'Stationery'),
(5, 'Groceries'),
(6, 'Health care'),
(7, 'Electronics'),
(8, 'EMI'),
(9, 'Rent'),
(10, 'Internet'),
(11, 'Entertainment'),
(12, 'Cellphone'),
(13, 'Education'),
(15, 'investment'),
(16, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `expense`
--

CREATE TABLE `expense` (
  `id` int(10) NOT NULL,
  `category` int(50) NOT NULL,
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
(1, 1, 'patashi', 20, '0', '2023-12-29', '2023-12-27'),
(2, 2, 'bus', 20, '0', '2023-12-26', '2023-12-27'),
(34, 6, 'medicos', 24, 'CASH', '2023-12-27', '2023-12-28'),
(35, 6, 'medicos', 24, 'CASH', '2023-12-27', '2023-12-28'),
(36, 5, 'oil', 50, 'UPI', '2023-11-28', '2023-12-28'),
(39, 4, 'bookes', 20, 'Net banking', '2023-12-16', '2023-12-28'),
(40, 2, 'bus', 50, 'CASH', '2023-12-29', '2023-12-29'),
(41, 2, 'bus', 20, 'Net banking', '2023-12-13', '2023-12-29'),
(43, 4, 'Daal', 50, 'CASH', '2024-01-04', '2024-01-04'),
(44, 3, 'shempu', 20, 'UPI', '2024-01-05', '2024-01-05'),
(45, 2, 'petrol', 550, 'UPI', '2024-01-03', '2024-01-05'),
(46, 1, 'patashi', 20, 'CASH', '2024-01-11', '2024-01-12'),
(48, 2, 'bike service', 461, 'UPI', '2024-01-13', '2024-01-16'),
(49, 15, 'equity', 2000, 'UPI', '2024-01-30', '2024-01-30');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `expense`
--
ALTER TABLE `expense`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
