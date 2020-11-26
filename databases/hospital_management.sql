-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2020 at 07:56 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_table`
--

CREATE TABLE `appointment_table` (
  `patient_name` varchar(25) NOT NULL,
  `appointed_doctor` varchar(25) NOT NULL,
  `doctor_id` varchar(25) NOT NULL,
  `date` date NOT NULL,
  `patient_id` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment_table`
--

INSERT INTO `appointment_table` (`patient_name`, `appointed_doctor`, `doctor_id`, `date`, `patient_id`) VALUES
('amit kumar', 'sumit sharmna', 'sumit903190@gmail.com', '2020-11-27', 'amit772492@gmail.com'),
('Anil singh', 'Sumit Kumar', 'sumit903190@gmail.com', '2020-10-31', 'anil123@gmail.com'),
('Anil singh', 'Sumit Kumar', 'sumit903190@gmail.com', '2020-11-24', 'anil123@gmail.com'),
('prateek singh', 'sumit sharmna', 'sumit903190@gmail.com', '2020-11-25', 'prateek123@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_table`
--

CREATE TABLE `doctor_table` (
  `name` varchar(25) NOT NULL,
  `doctor_id` varchar(25) NOT NULL,
  `mobile_no` bigint(13) NOT NULL,
  `specialization` varchar(25) NOT NULL,
  `consultation_fee` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor_table`
--

INSERT INTO `doctor_table` (`name`, `doctor_id`, `mobile_no`, `specialization`, `consultation_fee`) VALUES
('Aman kumar', 'aman123@gmail.com', 7845464665, 'heart', 455),
('sumit sharmna', 'sumit903190@gmail.com', 123433223, 'heart', 500);

-- --------------------------------------------------------

--
-- Table structure for table `password_table`
--

CREATE TABLE `password_table` (
  `identity` varchar(25) NOT NULL,
  `user_id` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `password_table`
--

INSERT INTO `password_table` (`identity`, `user_id`, `password`) VALUES
('admin', 'admin@gmail.com', '12345@'),
('doctor', 'aman123@gmail.com', 'aman123'),
('patient', 'prateek123@gmail.com', 'prateek123'),
('doctor', 'sumit903190@gmail.com', '903190');

-- --------------------------------------------------------

--
-- Table structure for table `patient_table`
--

CREATE TABLE `patient_table` (
  `name` varchar(25) NOT NULL,
  `patient_id` varchar(25) NOT NULL,
  `mobile_no` bigint(13) NOT NULL,
  `gender` varchar(13) NOT NULL,
  `age` int(3) NOT NULL,
  `address` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient_table`
--

INSERT INTO `patient_table` (`name`, `patient_id`, `mobile_no`, `gender`, `age`, `address`) VALUES
('prateek singh', 'prateek123@gmail.com', 1234321345, 'male', 23, 'sdasdasyudtasuydryausrdyuasd');

-- --------------------------------------------------------

--
-- Table structure for table `query_table`
--

CREATE TABLE `query_table` (
  `name` varchar(25) NOT NULL,
  `mobile` bigint(13) NOT NULL,
  `email` varchar(25) NOT NULL,
  `query` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `query_table`
--

INSERT INTO `query_table` (`name`, `mobile`, `email`, `query`) VALUES
('AMIT KUMAR', 8789530240, 'amit772492@gmail.com', 'quer1 1'),
('AMIT KUMAR', 5675444444, 'amit772492@gmail.com', 'ghgfjurtyutyuty'),
('Sumit Kumar', 8789530240, 'amit77245464642@gmail.com', 'hgfhgfhxdsfvdfdfvgdfbiyvgdfskfjcghkfxbjdgfjbvkjdhfbvxbvhibvxcbvxcmnbvxcvbxcvmxbchvbnxcvxchbvmxcnbvgfxdbvgxckbvxcmvbxcbvxc,kbvxkcbvgxdgkh ckngkdscjvbdf'),
('AMIT KUMAR', 7888888888, 'amit772492@gmail.com', 'xzckfgdsfidgsfis');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_table`
--
ALTER TABLE `appointment_table`
  ADD UNIQUE KEY `idx_table_ticket_code` (`patient_id`,`doctor_id`,`date`);

--
-- Indexes for table `doctor_table`
--
ALTER TABLE `doctor_table`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);

--
-- Indexes for table `password_table`
--
ALTER TABLE `password_table`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `patient_table`
--
ALTER TABLE `patient_table`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `mobile_no` (`mobile_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
