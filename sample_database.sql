-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 15, 2022 at 04:27 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sample_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `delivery_info`
--

CREATE TABLE `delivery_info` (
  `trackingID` int(5) NOT NULL,
  `sname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `saddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `rname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `raddress` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `amount` int(4) NOT NULL,
  `payment` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('Preparing for Delivery','On Route','Delivered') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Preparing for Delivery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `delivery_info`
--

INSERT INTO `delivery_info` (`trackingID`, `sname`, `saddress`, `rname`, `raddress`, `item`, `amount`, `payment`, `status`) VALUES
(1, 'Josh', 'Josh\'s Sample Address, Sample Address', 'Josh the Receiver', 'Sample Address, 0001', 'Calligraphy Pen', 52, 'Cash On Delivery', 'On Route'),
(2, 'Sample Sender', 'Sample Sender Address 0089', 'Sample Receiver', 'Sample Address 0002, Sample', 'Pink Nail Polish', 3, 'Credit/Debit', 'Preparing for Delivery'),
(3, 'Sample Sending Sender', 'Sample Address 0123, Sample City', 'adsfadfadf', 'Sample Address Sample Address 007', 'Iron Wrench', 2, 'Credit/Debit', 'On Route'),
(5, 'Joshii', 'Tangub City', 'Ann Marie', 'Cagayan de Oro', 'Violet Feather', 4, 'Credit/Debit', 'Preparing for Delivery'),
(6, 'Rico Angelo Alcontin', 'Ozamiz City', 'Joniz Allen Sumpay', 'Tangub City', 'Pokemon Cards', 10, 'Credit/Debit', 'On Route'),
(7, 'Sample Name Sample', 'Sample Address, Sample Street', 'Name Sample Receiver', 'Tangub City, Misamis Occidental', 'Packet of Lemon Seeds', 5, 'Credit/Debit', 'On Route'),
(8, 'Kathleen', 'Tiaman, Misamis Occidental', 'Sergio', 'Tinago, Ozamiz City', 'Yellow Lemon Tree', 2, 'PayMaya', 'Delivered'),
(9, 'Katrina', 'Mantic, Tangub City', 'Jerica ', 'Talisay, Ozamiz City, Misamis Occidental', 'Paintbrush Set', 4, 'PayMaya', 'On Route'),
(10, 'Lou Majerly', 'Polao, Tangub City', 'Lodrigruito', 'Tangub City', 'Wedding Ring', 2, 'Cash On Delivery', 'Preparing for Delivery'),
(11, 'Ian', 'Panalsalan', 'Alisna', 'Bonifacio, Misamis Ocidental', 'RGX', 2, 'Cash On Delivery', 'Preparing for Delivery'),
(15, 'Tia', 'Ozamiz City', 'Calog', 'Ozamiz City', 'Package1', 1, 'Cash On Delivery', 'On Route'),
(16, 'Lorem ipsum', 'Lorem ipsum', 'Lorem ipsum', 'Lorem ipsum', 'Lorem ipsum dolor en matee', 2, 'Cash On Delivery', 'On Route');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(3) NOT NULL,
  `u_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `f_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `l_name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
  `age` int(2) NOT NULL,
  `gender` enum('Male','Female') CHARACTER SET utf8mb4 NOT NULL,
  `usertype` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `u_name`, `password`, `f_name`, `l_name`, `age`, `gender`, `usertype`) VALUES
(1, 'joshii', 'joshii', 'Joshua', 'Vicente', 21, 'Male', 'Admin'),
(2, 'yanroy', 'yanroy', 'Ian Roy', 'Alisna', 21, 'Male', 'User'),
(3, 'jonic123', 'jonic123', 'Jonic Allen', 'Sumpay', 35, 'Male', 'User'),
(4, 'rico321', 'rico321', 'Rico Angelo', 'Alcontin', 20, 'Male', 'User'),
(5, 'tia', 'tia', 'Michael Ervin', 'Tia', 21, 'Male', 'User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `delivery_info`
--
ALTER TABLE `delivery_info`
  ADD PRIMARY KEY (`trackingID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_name` (`u_name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `delivery_info`
--
ALTER TABLE `delivery_info`
  MODIFY `trackingID` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
