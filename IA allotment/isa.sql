-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 01, 2023 at 08:36 PM
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
-- Database: `isa`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocated_rooms`
--

CREATE TABLE `allocated_rooms` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `room_number` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allocated_rooms`
--

INSERT INTO `allocated_rooms` (`usn`, `name`, `room_number`) VALUES
('4mh20is010', 'akshatha', '10'),
('4mh20is011', 'ananya', '10'),
('4mh20is012', 'amrutha', '10'),
('4mh20is013', 'bhavana', '10'),
('4mh20is014', 'bhoomika', '10'),
('4mh20is015', 'keerthana', '10'),
('4mh20is016', 'lisha', '10'),
('4mh20is017', 'bhavana', '10'),
('4mh20is020', 'poorvika', '10'),
('4mh21is001', 'a', '10'),
('4mh21is002', 'b', '10'),
('4mh21is003', 'c', '10'),
('4mh21is004', 'd', '10'),
('4mh21is005', 'e', '10'),
('4mh21is006', 'f', '10'),
('4mh21is007', 'g', '10'),
('4mh21is008', 'h', '10'),
('4mh21is011', 'amrutha', '10'),
('4mh20is054', 'neha', '12'),
('4mh20is062', 'prerana', '12'),
('4mh20is063', 'arthi', '12'),
('4mh20is064', 'gagana', '12'),
('4mh20is066', 'rithi', '12'),
('4mh20is067', 'darshini', '12'),
('4mh20is068', 'hema', '12'),
('4mh20is070', 'nanditha', '12'),
('4mh21is014', 'kavya', '12'),
('4mh21is020', 'nischitha', '12'),
('4mh21is054', 'neha', '12'),
('4mh21is055', 'prerana', '12'),
('4mh21is056', 'vinu', '12'),
('4mh21is060', 'srusti', '12'),
('4mh21is062', 'rakshitha', '12'),
('4mh21is111', 'sahana', '12');

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `room_number` varchar(255) NOT NULL,
  `room_capacity` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_number`, `room_capacity`) VALUES
('10', '18'),
('12', '16');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `usn` varchar(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `section` varchar(1) NOT NULL,
  `year` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`usn`, `name`, `section`, `year`) VALUES
('4mh20is010', 'akshatha', 'b', '3'),
('4mh20is011', 'ananya', 'b', '3'),
('4mh20is012', 'amrutha', 'b', '3'),
('4mh20is013', 'bhavana', 'b', '3'),
('4mh20is014', 'bhoomika', 'b', '3'),
('4mh20is015', 'keerthana', 'b', '3'),
('4mh20is016', 'lisha', 'b', '3'),
('4mh20is017', 'bhavana', 'b', '3'),
('4mh20is020', 'poorvika', 'b', '3'),
('4mh20is054', 'neha', 'a', '3'),
('4mh20is062', 'prerana', 'a', '3'),
('4mh20is063', 'arthi', 'a', '3'),
('4mh20is064', 'gagana', 'a', '3'),
('4mh20is066', 'rithi', 'a', '3'),
('4mh20is067', 'darshini', 'a', '3'),
('4mh20is068', 'hema', 'a', '3'),
('4mh20is070', 'nanditha', 'a', '3'),
('4mh21is001', 'a', 'b', '4'),
('4mh21is002', 'b', 'b', '4'),
('4mh21is003', 'c', 'b', '4'),
('4mh21is004', 'd', 'b', '4'),
('4mh21is005', 'e', 'b', '4'),
('4mh21is006', 'f', 'b', '4'),
('4mh21is007', 'g', 'b', '4'),
('4mh21is008', 'h', 'b', '4'),
('4mh21is011', 'amrutha', 'a', '4'),
('4mh21is014', 'kavya', 'a', '4'),
('4mh21is020', 'nischitha', 'a', '4'),
('4mh21is054', 'neha', 'a', '4'),
('4mh21is055', 'prerana', 'a', '4'),
('4mh21is056', 'vinu', 'a', '4'),
('4mh21is060', 'srusti', 'a', '4'),
('4mh21is062', 'rakshitha', 'a', '4'),
('4mh21is111', 'sahana', 'a', '4');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(6, 'ise', 'ise@gmail.com', 'fce14716ba676aee5589a2b09534b297'),
(7, 'student', 'stu@gmail.com', '4d643b1bd384922ca968749b93b81db5'),
(9, 'prerana', '4mh20is062@gmail.com', '25e7f1e705c2b4a3424a4b10872032c4'),
(10, 'iseg', 'sutu@gmail.comu', '4124bc0a9335c27f086f24ba207a4912'),
(11, 'neha', 'n@gmail.com', '7b8b965ad4bca0e41ab51de7b31363a1'),
(12, 'nehal', 'test@gmail.com', '3792bfd72c8a9071ac790a4b3b60d15a'),
(13, 'admin', 'admin@gmail.com', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocated_rooms`
--
ALTER TABLE `allocated_rooms`
  ADD KEY `pk_1` (`usn`),
  ADD KEY `pk_2` (`room_number`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD PRIMARY KEY (`room_number`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`usn`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `allocated_rooms`
--
ALTER TABLE `allocated_rooms`
  ADD CONSTRAINT `pk_1` FOREIGN KEY (`usn`) REFERENCES `student` (`usn`),
  ADD CONSTRAINT `pk_2` FOREIGN KEY (`room_number`) REFERENCES `room` (`room_number`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
