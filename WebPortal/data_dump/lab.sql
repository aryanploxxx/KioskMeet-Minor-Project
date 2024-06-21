-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:8111
-- Generation Time: Mar 04, 2024 at 02:33 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lab`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'admin', 'pass');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `s_id` int(11) DEFAULT NULL,
  `day` date DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`s_id`, `day`, `subject`, `status`) VALUES
(1, '2024-03-03', 'Cloud Systems', '1'),
(2, '2024-03-03', 'Cloud Systems', '0'),
(7, '2024-03-03', 'Cloud Systems', '1'),
(8, '2024-03-03', 'Cloud Systems', '0'),
(16, '2024-03-03', 'Cloud Systems', '1'),
(21103251, '2024-03-03', 'Cloud Systems', '1'),
(3, '2024-03-04', 'Cloud Systems', '1'),
(9, '2024-03-04', 'Cloud Systems', '1'),
(3, '2024-03-03', 'Cloud Systems', '1'),
(9, '2024-03-03', 'Cloud Systems', '0');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phno` int(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dept` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `phno`, `password`, `dept`) VALUES
(1, 'Arpita Jadhav Bhatt', 99999999, 'pass', 'CSE'),
(2, 'Tribhuwan Kumar Tewari', 987654321, 'pass', 'ECE'),
(3, 'Monali', 123455432, 'pass', 'BIO'),
(4, 'Harleen Kaur', 2147483647, 'pass', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `faculty_subjects`
--

CREATE TABLE `faculty_subjects` (
  `f_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `batch` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `faculty_subjects`
--

INSERT INTO `faculty_subjects` (`f_id`, `subject`, `batch`) VALUES
(1, 'Cloud Systems', 'B14'),
(1, 'Cloud Systems', 'B15'),
(1, 'Cloud Systems', 'B11'),
(2, 'Nuclear Radiations', 'F1'),
(2, 'Nuclear Radiations', 'F2'),
(2, 'Nuclear Radiations', 'F8'),
(3, 'Data Mining', 'B1'),
(3, 'Data Mining', 'B2'),
(3, 'Data Mining', 'B15'),
(4, 'Literature', 'F2'),
(4, 'Literature', 'B14'),
(4, 'Literature', 'B15');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `s_id` int(11) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `grade` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`s_id`, `subject`, `semester`, `grade`) VALUES
(1, 'Cloud Systems', 6, 'B'),
(2, 'Cloud Systems', 6, 'D'),
(7, 'Cloud Systems', 6, 'B'),
(8, 'Cloud Systems', 6, 'B'),
(12, 'Literature', 6, 'B'),
(3, 'Nuclear Radiations', 6, 'C'),
(9, 'Nuclear Radiations', 6, 'B'),
(10, 'Nuclear Radiations', 6, 'A'),
(4, 'Nuclear Radiations', 6, 'A'),
(5, 'Nuclear Radiations', 6, 'B'),
(1, 'Data Mining', 6, 'B'),
(2, 'Data Mining', 6, 'D'),
(7, 'Data Mining', 6, 'B'),
(8, 'Data Mining', 6, 'B'),
(21103251, 'Cloud Systems', 6, 'F'),
(21103251, 'Data Mining', 6, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `semester` int(11) DEFAULT NULL,
  `batch` varchar(5) DEFAULT NULL,
  `course` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `dob`, `semester`, `batch`, `course`, `password`) VALUES
(1, 'Aryan Gupta', '2003-05-13', 6, 'B14', 'CSE', 'pass'),
(2, 'Pritpal Singh', '2012-05-17', 6, 'B14', 'CSE', 'pass'),
(3, 'Samarpit Kandhari', '2002-07-08', 6, 'B15', 'CSE', 'pass'),
(4, 'Dweep', '2003-04-26', 6, 'B2', 'CSE', 'pass'),
(5, 'Akshat', '2021-04-16', 6, 'B2', 'CSE', 'pass'),
(6, 'ansh', '2021-04-16', 6, 'B11', 'IT', 'pass'),
(7, 'vivek', '2021-04-16', 6, 'B14', 'IT', 'pass'),
(8, 'tanmay', '2021-04-16', 6, 'B14', 'IT', 'pass'),
(9, 'shahrukh', '2021-05-08', 6, 'B15', 'IT', 'pass'),
(11, 'shrinjal', '2021-04-16', 6, 'F2', 'BIO', 'pass'),
(12, 'sritama', '2021-04-16', 6, 'F8', 'BIO', 'pass'),
(13, 'pankaj', '0000-00-00', 6, 'A4', 'ECE', 'pass'),
(14, 'nitya', '2021-04-16', 6, 'A4', 'ECE', 'pass'),
(15, 'akshita', '2002-10-30', 6, 'A4', 'ECE', 'pass'),
(16, 'aryan', '2000-08-09', 6, 'b14', 'cse', 'pass'),
(17, 'manya', '2024-03-04', 6, 'B5', 'CSE', 'pass'),
(21103251, 'yasir khan', '2002-09-08', 6, 'B14', 'CSE', 'pass');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21103252;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
