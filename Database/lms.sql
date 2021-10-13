-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 08:36 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `author_name` varchar(255) NOT NULL,
  `publisher_name` varchar(255) NOT NULL,
  `no_of_copies` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `title`, `year`, `genre`, `author_name`, `publisher_name`, `no_of_copies`, `created_at`) VALUES
(1, 'Inferno2', 2010, 'Classic', 'Dan Brown', 'JK Rowling', 200, '2021-09-16 08:17:55'),
(2, 'Inferno', 2010, 'Classic', 'Dan Brown', 'JK Rowling', 200, '2021-09-16 08:17:55'),
(3, 'Inferno', 2010, 'Classic', 'Dan Brown', 'JK Rowling', 199, '2021-09-16 08:17:55');

-- --------------------------------------------------------

--
-- Table structure for table `borrow`
--

CREATE TABLE `borrow` (
  `borrow_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date DEFAULT NULL,
  `fine` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow`
--

INSERT INTO `borrow` (`borrow_id`, `book_id`, `member_id`, `issue_date`, `return_date`, `fine`, `created_at`) VALUES
(1, 1, 0, '0000-00-00', NULL, 100, '2021-09-25 06:38:45'),
(2, 1, 0, '0000-00-00', NULL, 100, '2021-09-25 06:38:45'),
(3, 1, 9, '2021-10-12', '2021-10-12', 0, '2021-10-12 14:04:13'),
(4, 1, 9, '2021-10-12', NULL, 0, '2021-10-12 15:26:53'),
(5, 3, 9, '2021-10-13', '2021-10-13', 0, '2021-10-13 05:03:19'),
(6, 3, 11, '2021-10-13', NULL, 0, '2021-10-13 06:29:57'),
(7, 3, 11, '2021-10-13', NULL, 0, '2021-10-13 06:31:14');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `member_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `member_type` varchar(255) NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`member_id`, `name`, `address`, `contact_no`, `member_type`, `expiry_date`, `created_at`, `username`, `password`) VALUES
(0, 'Zohaib', 'Johar Town', 900786012, 'Admin', '2021-09-28', '2021-09-28 08:21:12', 'zohaib', '123'),
(8, 'Zaid', 'Shadman', 2132342, 'Admin', '2021-09-29', '2021-09-28 12:06:59', 'Zaid', '123'),
(9, 'Raheel', 'Johar Town', 2132342, 'Member', '2021-10-13', '2021-10-12 08:30:10', 'raheel', '123'),
(10, 'Ali', 'Johar Town', 2147483647, 'Admin', '2021-10-15', '2021-10-13 06:28:56', 'ali', '123'),
(11, 'saad', 'test', 2132342, 'Member', '2021-10-15', '2021-10-13 06:29:31', 'saad', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `borrow`
--
ALTER TABLE `borrow`
  ADD PRIMARY KEY (`borrow_id`),
  ADD KEY `book_id` (`book_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`member_id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `borrow`
--
ALTER TABLE `borrow`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `borrow`
--
ALTER TABLE `borrow`
  ADD CONSTRAINT `book_id` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`),
  ADD CONSTRAINT `member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`member_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
