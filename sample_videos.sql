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
-- Table structure for table `sample_videos`
--

CREATE TABLE `sample_videos` (
  `videoid` varchar(500) NOT NULL,
  `videotopic` varchar(500) NOT NULL,
  `video_desc` varchar(50000) DEFAULT NULL,
  `owns` varchar(500) NOT NULL,
  `upload_time` datetime DEFAULT NULL,
  `filename` varchar(500) NOT NULL,
  `filesize` int(10) NOT NULL,
  `file_extension` varchar(5) NOT NULL,
  `filepath` varchar(500) NOT NULL,
  `subjectlistid` varchar(500) DEFAULT NULL,
  `subjectid` varchar(500) DEFAULT NULL,
  `lessonid` varchar(500) DEFAULT NULL,
  `lessontopicid` varchar(500) DEFAULT NULL,
  `tid` varchar(500) DEFAULT NULL,
  `classid` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sample_videos`
--

INSERT INTO `sample_videos` (`videoid`, `videotopic`, `video_desc`, `owns`, `upload_time`, `filename`, `filesize`, `file_extension`, `filepath`, `subjectlistid`, `subjectid`, `lessonid`, `lessontopicid`, `tid`, `classid`) VALUES
('121212121212', 'Wedding suite', 'I recently f started programming using Python. I have to write many functions and was wondering how I can incorporate a help or description text such that it appears in the object inspector of spyder when I call the function. In MatLab, this worked by putting commented text at the beginning of the function file. Is there a similar method in Python (using Spyder)?', 'e5b532beee928df137ac793386cc7f3b', '2025-02-26 23:02:28', 'xyz', 23, 'mp4', 'user_data/teacher/e5b532beee928df137ac793386cc7f3b/videos/xyz.mp4', '25', '8ad80f0e2bb2973c38bc43496da386c8', '5d191ce91b464f0f751f0cd7d442ffa0', '78396b699ff3e1bdaf84c8793dd98b3b', 'e5b532beee928df137ac793386cc7f3b', '033ee9424b92ce268fd42c4d2300f7b2'),
('sadiya123', 'Pascal', 'pascal tutorial', 'e5b532beee928df137ac793386cc7f3b', '2025-02-18 23:02:28', 'abc', 23, 'mp4', 'user_data/teacher/e5b532beee928df137ac793386cc7f3b/videos/abc.mp4', '25', '8ad80f0e2bb2973c38bc43496da386c8', '5d191ce91b464f0f751f0cd7d442ffa0', '78396b699ff3e1bdaf84c8793dd98b3b', 'e5b532beee928df137ac793386cc7f3b', '033ee9424b92ce268fd42c4d2300f7b2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sample_videos`
--
ALTER TABLE `sample_videos`
  ADD PRIMARY KEY (`videoid`),
  ADD KEY `tid` (`tid`),
  ADD KEY `lessontopicid` (`lessontopicid`),
  ADD KEY `lessonid` (`lessonid`),
  ADD KEY `subjectid` (`subjectid`),
  ADD KEY `subjectlistid` (`subjectlistid`),
  ADD KEY `classid` (`classid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
