-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 25, 2024 at 04:11 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `abc_lab`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `login_check` (IN `user_login` VARCHAR(100), `user_password` VARCHAR(100))   BEGIN
SELECT user_det.email, user_login.user_password , user_role.role_id , user_det.user_id FROM user_det INNER JOIN user_login ON user_det.user_id=user_login.user_id INNER JOIN user_role ON user_det.user_id=user_role.user_id  WHERE user_login.user_password=SHA(user_password) AND user_det.email=user_login  limit 1;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_ref_num` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `doctor_lname` varchar(50) NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `pat_queue_num` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_ref_num`, `patient_id`, `doctor_lname`, `test_type`, `pat_queue_num`, `appointment_date`, `price`) VALUES
(1, 5, 'Delmire', 'Platelets Test', 1, '2024-03-03', 3500),
(2, 5, 'Alban', 'Red Blood Cell Test', 1, '2024-03-11', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `doctor_info_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`doctor_info_id`, `user_id`, `specialization_id`) VALUES
(1, 1, 1),
(2, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `lab_report`
--

CREATE TABLE `lab_report` (
  `lab_report_id` int(11) NOT NULL,
  `appointment_ref_num` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `patient_fname` varchar(30) NOT NULL,
  `patient_lname` varchar(30) NOT NULL,
  `patient_dob` date NOT NULL,
  `technician_fname` varchar(30) NOT NULL,
  `technician_lname` varchar(30) NOT NULL,
  `doctor_lname` varchar(30) NOT NULL,
  `date_of_issue` date NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `test_result` float NOT NULL,
  `test_ref` varchar(100) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `lab_report`
--

INSERT INTO `lab_report` (`lab_report_id`, `appointment_ref_num`, `patient_id`, `patient_fname`, `patient_lname`, `patient_dob`, `technician_fname`, `technician_lname`, `doctor_lname`, `date_of_issue`, `test_type`, `test_result`, `test_ref`, `cost`) VALUES
(1, 2, 5, 'Holly', 'Palmer', '1971-08-09', 'Samantha', 'Riley', 'Alban', '2024-03-05', 'Red Blood Cell Test', 0.28, '0.2-4.6 mol', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `role_det`
--

CREATE TABLE `role_det` (
  `role_id` int(11) NOT NULL,
  `title` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `role_det`
--

INSERT INTO `role_det` (`role_id`, `title`) VALUES
(3, 'Doctor'),
(2, 'Technician'),
(1, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL,
  `patient_fname` varchar(50) NOT NULL,
  `patient_lname` varchar(50) NOT NULL,
  `patient_dob` date NOT NULL,
  `doctor_lname` varchar(50) NOT NULL,
  `doctor_specialization` varchar(100) NOT NULL,
  `test_type` varchar(100) NOT NULL,
  `appointment_date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sales_id`, `patient_fname`, `patient_lname`, `patient_dob`, `doctor_lname`, `doctor_specialization`, `test_type`, `appointment_date`, `price`) VALUES
(1, 'Holly', 'Palmer', '1971-08-09', 'Delmire', 'Endocrinologist', 'Platelets Test', '2024-03-03', 3500),
(2, 'Holly', 'Palmer', '1971-08-09', 'Alban', 'Dermatologist', 'Red Blood Cell Test', '2024-03-11', 1500);

-- --------------------------------------------------------

--
-- Table structure for table `specialization_det`
--

CREATE TABLE `specialization_det` (
  `specialization_id` int(11) NOT NULL,
  `specialization_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `specialization_det`
--

INSERT INTO `specialization_det` (`specialization_id`, `specialization_type`) VALUES
(1, 'Endocrinologist'),
(2, 'Hematologist'),
(3, 'Dermatologist');

-- --------------------------------------------------------

--
-- Table structure for table `test_specialization`
--

CREATE TABLE `test_specialization` (
  `test_specialization_id` int(11) NOT NULL,
  `specialization_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test_specialization`
--

INSERT INTO `test_specialization` (`test_specialization_id`, `specialization_id`, `type_id`) VALUES
(1, 1, 1),
(2, 1, 3),
(3, 3, 1),
(4, 3, 4),
(5, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `test_type`
--

CREATE TABLE `test_type` (
  `type_id` int(11) NOT NULL,
  `type_name` varchar(50) NOT NULL,
  `bio_ref` varchar(100) NOT NULL,
  `type_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `test_type`
--

INSERT INTO `test_type` (`type_id`, `type_name`, `bio_ref`, `type_price`) VALUES
(1, 'Red Blood Cell Test', '0.2-4.6 mol', 1500),
(2, 'White Blood Cell Test', '5000-50000 mol', 3000),
(3, 'Platelets Test', '0.2-5.7 mol', 3500),
(4, 'Lithium Test', '1.5-8.2 mol', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `user_det`
--

CREATE TABLE `user_det` (
  `user_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `fname` varchar(30) NOT NULL,
  `lname` varchar(30) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` char(1) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `address` varchar(50) NOT NULL,
  `city` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_det`
--

INSERT INTO `user_det` (`user_id`, `email`, `fname`, `lname`, `date_of_birth`, `gender`, `contact_no`, `address`, `city`) VALUES
(1, 'shyla1@gmail.com', 'Shyla', 'Delmire', '1995-04-01', 'F', '777123213', 'Addr', 'Colombo'),
(2, 'samantha447@gmail.com', 'Samantha', 'Riley', '1991-04-01', 'F', '717123213', 'Rocky Road drive', 'Colombo'),
(3, 'ashley8@gmail.com', 'Ashley', 'Alban', '1996-04-08', 'F', '777183213', 'Maine Drive', 'Colombo'),
(4, 'amanda88@gmail.com', 'Amanda', 'Kidman', '1988-04-01', 'F', '747123213', 'Palm Hills, Avenue', 'Kandy'),
(5, 's33549739@gmail.com', 'Holly', 'Palmer', '1971-08-09', 'F', '777523213', 'Palm Hills, Avenue', 'Kandy');

-- --------------------------------------------------------

--
-- Table structure for table `user_login`
--

CREATE TABLE `user_login` (
  `user_login_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_login`
--

INSERT INTO `user_login` (`user_login_id`, `user_id`, `user_password`) VALUES
(1, 1, 'ea2ed900d863f6d5572420e7c1fc63232f7d15dd'),
(2, 2, '1d6ad913c867dfb775c4c4eb5e7bfa49e629c529'),
(3, 3, '118ce55f90c348e5c99f95c62f765919e1cc60fb'),
(4, 4, 'b298f6cc6007ef00303331e93f6a7ca6e111d494'),
(5, 5, '3ded6c04c76b708ab4da6994eb42b233774a8395');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_role_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`user_role_id`, `user_id`, `role_id`) VALUES
(1, 1, 3),
(2, 2, 2),
(3, 3, 3),
(4, 4, 1),
(5, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_ref_num`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`doctor_info_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `lab_report`
--
ALTER TABLE `lab_report`
  ADD PRIMARY KEY (`lab_report_id`),
  ADD UNIQUE KEY `appointment_ref_num` (`appointment_ref_num`);

--
-- Indexes for table `role_det`
--
ALTER TABLE `role_det`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `title` (`title`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sales_id`);

--
-- Indexes for table `specialization_det`
--
ALTER TABLE `specialization_det`
  ADD PRIMARY KEY (`specialization_id`);

--
-- Indexes for table `test_specialization`
--
ALTER TABLE `test_specialization`
  ADD PRIMARY KEY (`test_specialization_id`),
  ADD KEY `specialization_id` (`specialization_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `test_type`
--
ALTER TABLE `test_type`
  ADD PRIMARY KEY (`type_id`),
  ADD UNIQUE KEY `type_name` (`type_name`);

--
-- Indexes for table `user_det`
--
ALTER TABLE `user_det`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact_no` (`contact_no`);

--
-- Indexes for table `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`user_login_id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`user_role_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_ref_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `doctor_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `lab_report`
--
ALTER TABLE `lab_report`
  MODIFY `lab_report_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role_det`
--
ALTER TABLE `role_det`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sales_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `specialization_det`
--
ALTER TABLE `specialization_det`
  MODIFY `specialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `test_specialization`
--
ALTER TABLE `test_specialization`
  MODIFY `test_specialization_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `test_type`
--
ALTER TABLE `test_type`
  MODIFY `type_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_det`
--
ALTER TABLE `user_det`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_login`
--
ALTER TABLE `user_login`
  MODIFY `user_login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `user_role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD CONSTRAINT `doctor_info_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_det` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `test_specialization`
--
ALTER TABLE `test_specialization`
  ADD CONSTRAINT `test_specialization_ibfk_1` FOREIGN KEY (`specialization_id`) REFERENCES `specialization_det` (`specialization_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `test_specialization_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `test_type` (`type_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_login`
--
ALTER TABLE `user_login`
  ADD CONSTRAINT `user_login_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_det` (`user_id`) ON DELETE CASCADE;

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_det` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `role_det` (`role_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
