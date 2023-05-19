-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2023 at 04:30 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `airline_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `reservationID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `fare_choice` varchar(20) NOT NULL,
  `departure_location` varchar(50) NOT NULL,
  `arrival_location` varchar(50) NOT NULL,
  `departure_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `adults` int(11) DEFAULT NULL,
  `children` int(11) DEFAULT NULL,
  `infants` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`reservationID`, `userID`, `fare_choice`, `departure_location`, `arrival_location`, `departure_date`, `return_date`, `adults`, `children`, `infants`) VALUES
(0, 1, 'ONE WAY', 'KIN', 'TEST', '2029-10-12', '2028-07-26', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `age` int(11) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `name`, `surname`, `email`, `phone_number`, `age`, `password`) VALUES
(1, 'Alisa', 'Qatipi', 'qatipi14@hotmail.com', '+38349482764', 21, '$2y$10$rPQJZBbNfZYWIZlt/OsAmuiv384fbuJweKuN3LBgdvC/iWbiesfT.'),
(6, 'Alisa', 'Qatipi', '', '+38349482764', 22, '$2y$10$sXpqQnqP.i3ZMv.BPEESPefo.gU.AfcruWo7/OWpT8VKI3XKRHoC.'),
(7, 'Alisa', 'Qatipi', '', '+38349482764', 22, '$2y$10$tSRxYeDo2omQOMyOXbjIC.qQTV1l3Az9PW6L7H9kTYjy1CmRRVCda'),
(8, 'Alisa', 'Qatipi', '', '+38349482764', 25, '$2y$10$ro95BdsdnzeFGTDIV99/q.3FOQZxzdc7qUf.YBsF8uwsSjz0Xo.Bm'),
(9, 'test', 'Qatipi', 'amr_travel@hotmail.com', '+38349482764', 24, '$2y$10$95a1zG2pqmyor3dDkQ6G2.XeIa4B/4DKzy54TxmG8r/xA.547ZMH.'),
(10, 'Alisa', 'Qatipi', 'qatipi15@hotmail.com', '+38349482764', 32, '$2y$10$rrMmNgmD9Ivax91UvVvevONvm8MqrEFtLJywjHcq80J8gpnwyUbKK'),
(11, 'darti', 'zalli', 'dz32@gmail.com', '+38349482764', 23, '$2y$10$INmvr1dd6F/MNBLdOhICYeiCVB6Ninf.XXOeCnExrbbF/j0QojBgq'),
(12, 'test', 'test', 'alisaq2@auk.org', '+38349482764', 26, '$2y$10$fNBN/ZsgfJ1303PFn1IoPujLF.rofiPhkIgv.y3MPyePtURcXshmS');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`reservationID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
