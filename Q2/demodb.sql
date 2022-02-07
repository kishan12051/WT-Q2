-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 11:52 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demodb`
--

-- --------------------------------------------------------

--
-- Table structure for table `stud_master`
--

CREATE TABLE `stud_master` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `course` varchar(10) NOT NULL,
  `contact` bigint(20) NOT NULL,
  `gender` varchar(1) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `password` varchar(10) NOT NULL,
  `profile_pic` varchar(5000) NOT NULL,
  `status` varchar(10) NOT NULL,
  `semester` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_master`
--

INSERT INTO `stud_master` (`id`, `name`, `course`, `contact`, `gender`, `email_id`, `password`, `profile_pic`, `status`, `semester`) VALUES
(1, 'sam', 'Mca', 726727348, 'm', 'sam@gmail.com', '123123', '03NeD0y.jpg', 'active', 1),
(2, 'dk', 'Msc-IT', 346736578, 'm', 'dk@gmail.com', '212121', 'IMG_20200408_185534.jpg', 'deactive', 1),
(3, 'Mayank', 'Mca', 9809876787, 'm', 'mayankdu@gmail.com', 'J7lDyz', '5gUNQn0.jpg', 'active', 2),
(4, 'Jatin', 'Mca', 9878987889, 'm', 'j@gmail.com', 'RzlFcQ', 'payment.jpg', 'active', 1),
(5, 'Ramesh', 'Msc-IT', 9898789877, 'm', 'ramesh@gmail.com', 'ZuL2sN', 'IMG_20200326_155226.jpg', 'deactive', 2);

-- --------------------------------------------------------

--
-- Table structure for table `stud_result`
--

CREATE TABLE `stud_result` (
  `id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `sub_1` int(11) NOT NULL,
  `sub_2` int(11) NOT NULL,
  `sub_3` int(11) NOT NULL,
  `sub_4` int(11) NOT NULL,
  `sub_5` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `percentage` float(10,2) NOT NULL,
  `class` varchar(10) NOT NULL,
  `result` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stud_result`
--

INSERT INTO `stud_result` (`id`, `stud_id`, `semester`, `sub_1`, `sub_2`, `sub_3`, `sub_4`, `sub_5`, `total`, `percentage`, `class`, `result`) VALUES
(1, 1, 1, 70, 80, 60, 78, 98, 386, 77.00, 'B', 'Pass'),
(2, 2, 1, 54, 76, 56, 76, 45, 307, 61.00, 'C', 'Pass'),
(3, 3, 1, 78, 77, 54, 76, 45, 330, 66.00, 'C', 'Pass'),
(4, 3, 1, 78, 77, 54, 76, 45, 565, 67.00, 'C', 'Pass'),
(5, 1, 2, 78, 98, 67, 65, 76, 384, 76.80, 'B', 'Pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `stud_master`
--
ALTER TABLE `stud_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stud_result`
--
ALTER TABLE `stud_result`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stud_master`
--
ALTER TABLE `stud_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stud_result`
--
ALTER TABLE `stud_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
