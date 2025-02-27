-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2025 at 04:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolpack1`
--

-- --------------------------------------------------------

--
-- Table structure for table `sample_teacher_class_videos`
--

CREATE TABLE `sample_teacher_class_videos` (
  `teacher_class_videoid` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `classid` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `videoid` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `tid` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `lessonid` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `lessontopicid` varchar(500) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL COMMENT 'create time or shared time'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sample_teacher_class_videos`
--

INSERT INTO `sample_teacher_class_videos` (`teacher_class_videoid`, `classid`, `videoid`, `tid`, `lessonid`, `lessontopicid`, `create_time`) VALUES
('ddd444333', '033ee9424b92ce268fd42c4d2300f7b2', '121212121212', 'e5b532beee928df137ac793386cc7f3b', '5d191ce91b464f0f751f0cd7d442ffa0', '78396b699ff3e1bdaf84c8793dd98b3b', '2025-02-18 09:09:41'),
('sadiyaid123_fuck', '033ee9424b92ce268fd42c4d2300f7b2', 'sadiya123', 'e5b532beee928df137ac793386cc7f3b', '5d191ce91b464f0f751f0cd7d442ffa0', '78396b699ff3e1bdaf84c8793dd98b3b', '2025-02-18 09:09:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sample_teacher_class_videos`
--
ALTER TABLE `sample_teacher_class_videos`
  ADD PRIMARY KEY (`teacher_class_videoid`),
  ADD KEY `classid` (`classid`),
  ADD KEY `videoid` (`videoid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `lessonid` (`lessonid`),
  ADD KEY `lessontopicid` (`lessontopicid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
