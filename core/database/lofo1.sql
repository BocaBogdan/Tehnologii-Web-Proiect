-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2017 at 11:32 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lofo`
--

-- --------------------------------------------------------

--
-- Table structure for table `categoris`
--

CREATE TABLE `categoris` (
  `Id_Categori` int(1) NOT NULL,
  `Type_Categori` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoris`
--

INSERT INTO `categoris` (`Id_Categori`, `Type_Categori`) VALUES
(0, 'Portofel'),
(1, 'Telefon'),
(2, 'Chei'),
(3, 'Acte'),
(5, 'Altceva');

-- --------------------------------------------------------

--
-- Table structure for table `lpost`
--

CREATE TABLE `lpost` (
  `lpost_id` int(35) NOT NULL,
  `image` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `type` int(1) DEFAULT NULL,
  `Id_Categori` int(1) NOT NULL,
  `Date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lpost`
--

INSERT INTO `lpost` (`lpost_id`, `image`, `description`, `type`, `Id_Categori`, `Date`) VALUES
(1, 'image1.jpg', 'Descriere1.', 0, 0, '2017-05-23 18:01:21'),
(9, 'image2.jpg', 'Descriere2.', 1, 1, '2017-05-24 07:01:21'),
(10, 'master.png', 'Descriere3.', 0, 2, '2017-05-25 18:03:54');

-- --------------------------------------------------------

--
-- Table structure for table `typeads`
--

CREATE TABLE `typeads` (
  `Id_Add` int(1) NOT NULL,
  `Type_Add` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `typeads`
--

INSERT INTO `typeads` (`Id_Add`, `Type_Add`) VALUES
(0, 'LOST'),
(1, 'FOUND');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  `email` varchar(1250) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `type` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `active`, `type`) VALUES
(1, 'Boca', '7c6a180b36896a0a8c02787eeafb0e4c', 'arsenie.v.boca@lumina.boss.com', 1, 1),
(3, 'Sergiu', '5f4dcc3b5aa765d61d8327deb882cf99', 'sergiu.v@yahoo.com', 1, 0),
(4, 'test', 'fcea920f7412b5da7be0cf42b8c93759', 'test@test.com', 0, 0),
(5, 'Madalina', '5f4dcc3b5aa765d61d8327deb882cf99', 'madalina.bo$$@compania.boss.com', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lpost`
--
ALTER TABLE `lpost`
  ADD PRIMARY KEY (`lpost_id`);

--
-- Indexes for table `typeads`
--
ALTER TABLE `typeads`
  ADD PRIMARY KEY (`Id_Add`),
  ADD UNIQUE KEY `Id_Ads` (`Id_Add`),
  ADD KEY `Id_Ads_2` (`Id_Add`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lpost`
--
ALTER TABLE `lpost`
  MODIFY `lpost_id` int(35) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
