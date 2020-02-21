-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 21, 2020 at 01:04 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehicleregistration`
--

-- --------------------------------------------------------

--
-- Table structure for table `service_registration`
--

CREATE TABLE `service_registration` (
  `serviceId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `vehicleNumber` varchar(50) NOT NULL,
  `licenceNumber` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `timeSlot` varchar(50) NOT NULL,
  `vehicleIssue` text NOT NULL,
  `serviceCenter` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'pending',
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_registration`
--

INSERT INTO `service_registration` (`serviceId`, `userId`, `title`, `vehicleNumber`, `licenceNumber`, `date`, `timeSlot`, `vehicleIssue`, `serviceCenter`, `status`, `createdAt`) VALUES
(32, 9, 'Service 1', '123', '123', '2020-12-31', '10-11', 'break fail', 'Center 2', 'pending', '2020-02-21 11:29:57'),
(33, 9, 'Service 1 user', '7125', '8866', '2020-02-22', '9-10', 'break fail', 'Center 2', 'pending', '2020-02-21 11:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(20) NOT NULL,
  `phoneNumber` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `firstName`, `lastName`, `email`, `password`, `phoneNumber`) VALUES
(9, 'admin', 'admin', 'admin@admin.com', 'admin', '1234567890'),
(10, '', '', '', '', ''),
(11, '', '', '', '', ''),
(12, '', '', '', '', ''),
(13, 'user1', 'user1', 'user@user.com', '123', '01234567890');

-- --------------------------------------------------------

--
-- Table structure for table `user_addresses`
--

CREATE TABLE `user_addresses` (
  `addressId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `street` varchar(100) NOT NULL,
  `city` varchar(50) NOT NULL,
  `state` varchar(50) NOT NULL,
  `zipCode` varchar(20) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_addresses`
--

INSERT INTO `user_addresses` (`addressId`, `userId`, `street`, `city`, `state`, `zipCode`, `country`) VALUES
(3, 9, 'any', 'AMD', 'GUJ', '363650', 'IND'),
(4, 10, '', '', '', '', ''),
(5, 11, '', '', '', '', ''),
(6, 12, '', '', '', '', ''),
(7, 13, 'any', 'AMD', 'GUJ', '363650', 'India');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `service_registration`
--
ALTER TABLE `service_registration`
  ADD PRIMARY KEY (`serviceId`),
  ADD UNIQUE KEY `vehicleNumber` (`vehicleNumber`),
  ADD UNIQUE KEY `licenceNumber` (`licenceNumber`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD PRIMARY KEY (`addressId`),
  ADD KEY `userId` (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `service_registration`
--
ALTER TABLE `service_registration`
  MODIFY `serviceId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_addresses`
--
ALTER TABLE `user_addresses`
  MODIFY `addressId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `service_registration`
--
ALTER TABLE `service_registration`
  ADD CONSTRAINT `service_registration_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_addresses`
--
ALTER TABLE `user_addresses`
  ADD CONSTRAINT `user_addresses_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
