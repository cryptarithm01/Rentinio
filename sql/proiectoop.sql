-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2021 at 01:36 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proiectoop`
--

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `model_name` varchar(1024) NOT NULL,
  `price_per_day` float NOT NULL,
  `features` varchar(1024) DEFAULT NULL,
  `rent_type` enum('car','boat') NOT NULL,
  `rent_length` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `model_name`, `price_per_day`, `features`, `rent_type`, `rent_length`) VALUES
(1, 'Audi R8', 24.99, 'Standard Pack', 'car', 7),
(2, 'Cruiser Boat', 34.99, 'Standard Pack', 'boat', 5),
(3, 'Fishing Boat', 15, 'Fishing Rod, bait and drinks.', 'boat', 3),
(4, 'Hummer Truck', 50, 'Standard Pack', 'car', 7);

-- --------------------------------------------------------

--
-- Table structure for table `rents`
--

CREATE TABLE `rents` (
  `id` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `id_offer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rent_number` int(11) NOT NULL DEFAULT 0,
  `PPD` int(11) NOT NULL DEFAULT 0,
  `role` enum('user','admin') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rents`
--
ALTER TABLE `rents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_offer` (`id_offer`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rents`
--
ALTER TABLE `rents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rents`
--
ALTER TABLE `rents`
  ADD CONSTRAINT `rents_ibfk_1` FOREIGN KEY (`id_offer`) REFERENCES `offers` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `rents_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
