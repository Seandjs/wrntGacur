-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2025 at 02:20 PM
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
-- Database: `wrntgacur`
--

-- --------------------------------------------------------

--
-- Table structure for table `wrntadmin`
--

CREATE TABLE `wrntadmin` (
  `id` int(11) NOT NULL,
  `nama` varchar(16) NOT NULL,
  `password` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wrntadmin`
--

INSERT INTO `wrntadmin` (`id`, `nama`, `password`) VALUES
(1, 'wrntgacur', 'admin1234');

-- --------------------------------------------------------

--
-- Table structure for table `wrntuser`
--

CREATE TABLE `wrntuser` (
  `id` int(11) NOT NULL,
  `username` varchar(16) NOT NULL,
  `nik` int(16) NOT NULL,
  `phone` int(16) NOT NULL,
  `password` varchar(16) NOT NULL,
  `balance` decimal(20,0) NOT NULL,
  `usedbalance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wrntuser`
--

INSERT INTO `wrntuser` (`id`, `username`, `nik`, `phone`, `password`, `balance`, `usedbalance`) VALUES
(1, 'dano', 23456789, 4567890, 'akucintagendis', 20, 0),
(5, 'fanosigma', 213123, 123123123, 'akurindugendis', 20, 0),
(6, 'rafif', 1231231, 4567890, 'akucintakanaya', 20, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `wrntadmin`
--
ALTER TABLE `wrntadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wrntuser`
--
ALTER TABLE `wrntuser`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `wrntadmin`
--
ALTER TABLE `wrntadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `wrntuser`
--
ALTER TABLE `wrntuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
