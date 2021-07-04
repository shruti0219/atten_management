-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2021 at 07:31 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance_sys`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `uid` varchar(255) NOT NULL,
  `sid` varchar(255) NOT NULL,
  `present` int(11) NOT NULL DEFAULT 0,
  `total` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`uid`, `sid`, `present`, `total`) VALUES
('CSE/OS101/1/2020/1', 'CSE/OS101/1', 2, 4),
('CSE/OS101/1/2020/2', 'CSE/OS101/1', 2, 4),
('CSE/OS101/1/2020/3', 'CSE/OS101/1', 3, 4),
('CSE/OS101/1/2020/4', 'CSE/OS101/1', 3, 4),
('CSE/OS101/1/2020/5', 'CSE/OS101/1', 3, 4),
('MEE/OS101/1/2020/1', 'MEE/OS101/1', 2, 3),
('MEE/OS101/1/2020/2', 'MEE/OS101/1', 2, 3),
('MEE/OS101/1/2020/3', 'MEE/OS101/1', 3, 3),
('MEE/OS101/1/2020/4', 'MEE/OS101/1', 2, 3),
('MEE/OS101/1/2020/5', 'MEE/OS101/1', 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_detail`
--

CREATE TABLE `student_detail` (
  `id` varchar(255) NOT NULL,
  `st_name` varchar(255) NOT NULL DEFAULT 'Anonymous'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student_detail`
--

INSERT INTO `student_detail` (`id`, `st_name`) VALUES
('CSE/2020/1', 'Aisha'),
('CSE/2020/2', 'Anonymous'),
('CSE/2020/3', 'Anonymous'),
('CSE/2020/4', 'Anonymous'),
('CSE/2020/5', 'Anonymous'),
('MEE/2020/1', 'Ram'),
('MEE/2020/2', 'Juhi'),
('MEE/2020/3', 'Zays'),
('MEE/2020/4', 'Anonymous'),
('MEE/2020/5', 'Anonymous');

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `sid` varchar(255) NOT NULL,
  `tid` int(11) NOT NULL,
  `sname` varchar(255) NOT NULL,
  `scode` varchar(255) NOT NULL,
  `sem` varchar(255) NOT NULL,
  `year` int(4) NOT NULL,
  `branch` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`sid`, `tid`, `sname`, `scode`, `sem`, `year`, `branch`) VALUES
('CSE/OS101/1', 1, 'Cyber Security', 'CSE/OS101', 'III', 2020, 'CSE'),
('MEE/OS101/1', 1, 'Operating System', 'MEE/OS101', 'III', 2020, 'MEE');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `tid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`tid`, `email`, `name`, `phone`, `password`) VALUES
(1, 'shruti@gmail.com', 'Shruti Kumari', '7903283866', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`uid`);

--
-- Indexes for table `student_detail`
--
ALTER TABLE `student_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`tid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
