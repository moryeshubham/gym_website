-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2021 at 03:20 PM
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
-- Database: `fitness`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_no` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`first`, `last`, `username`, `password`, `id_no`, `email`, `contact`, `photo`) VALUES
('Shubham', 'Morye', 'shubhammorye', '2002', 1, 'shubhammorye3@gmail.com', 9076011162, 'WhatsApp Image 2021-08-07 at 2.38.39 PM.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `feedback_comments`
--

CREATE TABLE `feedback_comments` (
  `name` varchar(100) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `feedback_comment` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback_comments`
--

INSERT INTO `feedback_comments` (`name`, `contact`, `email`, `feedback_comment`) VALUES
('vbnm', 6520, 'cvbnm', 'cvbnm'),
('suraj ', 8568912486, 'suraj@gmail.com', 'please send me information '),
('Shubham morye', 9562148566, 'shubham@gmail.com', 'good job....');

-- --------------------------------------------------------

--
-- Table structure for table `gym_members`
--

CREATE TABLE `gym_members` (
  `first` varchar(100) NOT NULL,
  `last` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_no` int(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` bigint(100) NOT NULL,
  `photo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gym_members`
--

INSERT INTO `gym_members` (`first`, `last`, `username`, `password`, `id_no`, `email`, `contact`, `photo`) VALUES
('aman', 'mane', 'aman25', '\r\n                            2001', 3, 'aman@gmail.com', 9584972315, 'user_logo.png'),
('avantika', 'mhadik', 'avantika_205', 'avantika', 25, 'avantika12@gmail.com', 8568912486, 'user_logo.png'),
('dipesh', 'morye', 'dipesh123', 'dipesh20', 52, 'dipeshmorye@gmail.com', 9562148566, 'user_logo.png'),
('ganesh', 'pawar', 'ganesh_23', 'ganesh@2020', 2, 'ganesh23@gmail.com', 8548965742, 'user_logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `p_id` int(100) NOT NULL,
  `amount` bigint(200) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `package` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`p_id`, `amount`, `description`, `package`) VALUES
(1, 5000, 'Basic Gym Package', 'Bronze Package'),
(2, 8000, 'Use weight training and cardio training..', 'Silver Package'),
(3, 14000, 'Only 100 seats are available', 'Gold Package'),
(4, 20000, 'Only 20 Seats are Available.', 'Platinum Package');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `fullname` text NOT NULL,
  `id_no` int(100) NOT NULL,
  `trainer` varchar(100) NOT NULL,
  `package` varchar(100) NOT NULL,
  `amount` int(100) NOT NULL,
  `payment_id` int(100) NOT NULL,
  `payment_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`fullname`, `id_no`, `trainer`, `package`, `amount`, `payment_id`, `payment_type`) VALUES
('Dipeh Rajaram Morye', 52, 'Ashok', 'Gold Package', 14000, 2147483647, 'Online'),
('Sai Gavade', 10, 'Suresh', 'Gold Package', 14000, 2147483647, 'Online');

-- --------------------------------------------------------

--
-- Table structure for table `trainer`
--

CREATE TABLE `trainer` (
  `id_no` int(100) NOT NULL,
  `first` varchar(20) NOT NULL,
  `last` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `timing` time NOT NULL,
  `status` varchar(10) NOT NULL,
  `level` varchar(100) NOT NULL,
  `department` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trainer`
--

INSERT INTO `trainer` (`id_no`, `first`, `last`, `email`, `timing`, `status`, `level`, `department`) VALUES
(1, 'Ankush', 'Asabe', 'ankush@gmail.com', '07:00:00', 'Available', 'Beginner', 'Upper Body'),
(3, 'Ashok', 'Dhamande', 'ashok3442@gmail.com', '12:10:00', 'Available', 'Advanced', 'Lower Body'),
(4, 'Suresh ', 'Chavan', 'suresh334@gmail.com', '07:00:00', 'Available', 'Intermediate', 'Upper Body'),
(2, 'ananya', 'chavan', 'chavan@gmail.com', '10:00:00', 'Available', 'Advanced', 'Upper Body');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `feedback_comments`
--
ALTER TABLE `feedback_comments`
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `gym_members`
--
ALTER TABLE `gym_members`
  ADD UNIQUE KEY `username` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
