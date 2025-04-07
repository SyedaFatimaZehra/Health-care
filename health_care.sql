-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2024 at 01:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `health_care`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) DEFAULT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `profile_pic`, `gender`, `email`, `phone`, `address`, `password`) VALUES
(1, 'admin', 'img/admin.jpg', 'male', 'admin@gmail.com', '0321456789', 'Clifton', '123');

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `appointment_id` int(11) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`appointment_id`, `doctor_id`, `patient_id`, `appointment_date`, `appointment_time`, `status`) VALUES
(1, 1, 1, '2024-09-26', '05:00:00', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`) VALUES
(1, 'Karachi'),
(2, 'Lahore'),
(3, 'Islamabad'),
(4, 'Rawalpindi '),
(5, 'Faisalabad '),
(6, 'Multan '),
(7, 'Peshawar '),
(8, 'Quetta '),
(9, 'Hyderabad '),
(10, 'Sialkot '),
(11, 'Bahawalpur '),
(12, 'Sheikhupura ');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(100) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `specialization` varchar(100) NOT NULL,
  `experience` int(11) DEFAULT NULL,
  `hospital_affiliation` varchar(100) DEFAULT NULL,
  `city_id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `available_days` varchar(255) NOT NULL,
  `available_time` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`doctor_id`, `doctor_name`, `profile_pic`, `gender`, `specialization`, `experience`, `hospital_affiliation`, `city_id`, `email`, `phone`, `address`, `available_days`, `available_time`, `password`) VALUES
(1, 'mubashir', 'appointment-image.jpg', 'male', 'ENT Department', 2, 'Aga Khan University Hospital (AKUH)', 1, 'mubashir@gmail.com', '0321456987', 'Clifton ', 'Tuesday,Thursday,Saturday', '5:00 PM - 7:00 PM', '123'),
(2, 'mustafa', 'author-image.jpg', 'male', 'Radiology', 5, 'Shaukat Khanum Memorial Cancer Hospital & Research Centre', 3, 'mustafa@gmail.com', '021654789', 'Clifton', 'Monday,Tuesday,Wednesday,Thursday,Friday', '9:00 AM - 11:00 AM', '123'),
(3, 'aqsa', 'doctor1.webp', 'female', 'Dental', 6, 'Pakistan Institute of Medical Sciences (PIMS)', 1, 'aqsa@gmail.com', '021547896', 'Clifton Karachi', 'Monday,Wednesday,Friday', '7:00 PM - 9:00 PM', '123');

-- --------------------------------------------------------

--
-- Table structure for table `medicalnews`
--

CREATE TABLE `medicalnews` (
  `news_id` int(11) NOT NULL,
  `med_image` varchar(255) NOT NULL,
  `news_title` varchar(100) NOT NULL,
  `news_content` text DEFAULT NULL,
  `publication_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medicalnews`
--

INSERT INTO `medicalnews` (`news_id`, `med_image`, `news_title`, `news_content`, `publication_date`) VALUES
(1, 'medd.jpg', 'Telemedicine Usage Surges: The Future of Patient Care?', 'A new report from the Health Information Management Association indicates that telemedicine visits have increased by over 200% in the last year. As healthcare providers adapt to new technologies, patients enjoy the convenience of virtual consultations. Experts believe that this trend could reshape healthcare delivery, improving access for underserved populations while maintaining quality of care.', '2024-09-24');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `patient_id` int(11) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(200) NOT NULL,
  `medical_history` text DEFAULT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`patient_id`, `patient_name`, `profile_pic`, `gender`, `email`, `phone`, `address`, `medical_history`, `password`) VALUES
(1, 'warda', '', 'female', 'warda@gmail.com', '0321456', 'DHA', NULL, '123'),
(2, 'anjali', '', 'male', 'anjali@gmail.com', '0321456987', 'DHA', NULL, '123');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `usertype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `username`, `email`, `usertype`) VALUES
(1, 'admin', 'admin@gmail.com', 'a'),
(2, 'mubashir', 'mubashir@gmail.com', 'd'),
(3, 'warda', 'warda@gmail.com', 'p'),
(4, 'mustafa', 'mustafa@gmail.com', 'd'),
(5, 'aqsa', 'aqsa@gmail.com', 'd'),
(6, 'anjali', 'anjali@gmail.com', 'p');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `doctor_id` (`doctor_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`doctor_id`),
  ADD KEY `city_id` (`city_id`);

--
-- Indexes for table `medicalnews`
--
ALTER TABLE `medicalnews`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`patient_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `medicalnews`
--
ALTER TABLE `medicalnews`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `patient_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
