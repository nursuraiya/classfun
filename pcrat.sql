-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2021 at 03:06 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pcrat`
--

-- --------------------------------------------------------

--
-- Table structure for table `attempt`
--

CREATE TABLE `attempt` (
  `attemptid` int(11) NOT NULL,
  `date` varchar(100) DEFAULT NULL,
  `emailid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `marka`
--

CREATE TABLE `marka` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `attemptid` varchar(40) DEFAULT NULL,
  `mark` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `markb`
--

CREATE TABLE `markb` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `attemptid` varchar(40) DEFAULT NULL,
  `mark` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `markc`
--

CREATE TABLE `markc` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `attemptid` varchar(40) DEFAULT NULL,
  `mark` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `markd`
--

CREATE TABLE `markd` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `attemptid` varchar(40) DEFAULT NULL,
  `mark` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `questiona`
--

CREATE TABLE `questiona` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `qnum` varchar(5) DEFAULT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer1` varchar(500) DEFAULT NULL,
  `answer2` varchar(500) DEFAULT NULL,
  `answer3` varchar(500) DEFAULT NULL,
  `answer4` varchar(500) DEFAULT NULL,
  `answer5` varchar(500) DEFAULT NULL,
  `mark1` varchar(5) DEFAULT NULL,
  `mark2` varchar(5) DEFAULT NULL,
  `mark3` varchar(5) DEFAULT NULL,
  `mark4` varchar(5) DEFAULT NULL,
  `mark5` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questiona`
--

INSERT INTO `questiona` (`auto_id`, `qnum`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `mark1`, `mark2`, `mark3`, `mark4`, `mark5`) VALUES
(1, '1', 'Muhammad membeli se_________ surat khabar di Kedai Buku Banggol.', 'keping', 'pucuk', 'helai', 'naskhah', '', '0', '0', '0', '1', ''),
(2, '2', 'Puan Khadijah membeli empat _____________ ayam di pasar untuk menjamu tetamu yang datang ke rumahnya.', 'buah', 'ekor', 'ketul', 'belah', '', '0', '1', '0', '0', ''),
(3, '3', 'Mak Limah telah membeli se_____________ permaidani di bandar.', 'lembar', 'helai', 'bidang', 'keping', '', '0', '0', '1', '0', ''),
(4, '4', 'Ayah saya mempunyai se _____________ senapang.', 'laras', 'pucuk', 'batang', 'buah', '', '1', '0', '0', '0', ''),
(5, '5', 'Emak membeli tiga ______________  jagung untuk direbus.', 'biji', 'ketul', 'tangkai', 'tongkol', '', '0', '0', '0', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `questionb`
--

CREATE TABLE `questionb` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `qnum` varchar(5) DEFAULT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer1` varchar(500) DEFAULT NULL,
  `answer2` varchar(500) DEFAULT NULL,
  `answer3` varchar(500) DEFAULT NULL,
  `answer4` varchar(500) DEFAULT NULL,
  `answer5` varchar(500) DEFAULT NULL,
  `mark1` varchar(5) DEFAULT NULL,
  `mark2` varchar(5) DEFAULT NULL,
  `mark3` varchar(5) DEFAULT NULL,
  `mark4` varchar(5) DEFAULT NULL,
  `mark5` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionb`
--

INSERT INTO `questionb` (`auto_id`, `qnum`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `mark1`, `mark2`, `mark3`, `mark4`, `mark5`) VALUES
(1, '1', '23 + 40 = ?', '43', '83', '77', '63', '', '0', '0', '0', '1', ''),
(2, '2', '56 - 19 = ?', '37', '17', '68', '13', '', '1', '0', '0', '0', ''),
(3, '3', '6 x 4 = ?', '21', '28', '24', '-24', '', '0', '0', '1', '0', ''),
(4, '4', '18 / 3 = ?', '4', '54', '6', '7', '', '0', '0', '1', '0', ''),
(5, '5', 'Julia is 12 years old. Her sister, Jasmine is half her age. How old is Jasmine 4 years later?', '6 years old', '10 years old', '12 years old', '9 years old', '', '0', '1', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `questionc`
--

CREATE TABLE `questionc` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `qnum` varchar(5) DEFAULT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer1` varchar(500) DEFAULT NULL,
  `answer2` varchar(500) DEFAULT NULL,
  `answer3` varchar(500) DEFAULT NULL,
  `answer4` varchar(500) DEFAULT NULL,
  `answer5` varchar(500) DEFAULT NULL,
  `mark1` varchar(5) DEFAULT NULL,
  `mark2` varchar(5) DEFAULT NULL,
  `mark3` varchar(5) DEFAULT NULL,
  `mark4` varchar(5) DEFAULT NULL,
  `mark5` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionc`
--

INSERT INTO `questionc` (`auto_id`, `qnum`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `mark1`, `mark2`, `mark3`, `mark4`, `mark5`) VALUES
(1, '1', 'Which animal lays eggs?', 'Dog', 'Cat', 'Duck', 'Sheep', '', '0', '0', '1', '0', ''),
(2, '2', 'A male cow is called?', 'Ox', 'Dog', 'Sheep', 'Monkey', '', '1', '0', '0', '0', ''),
(3, '3', 'All animals need food, air, and __ to survive.', 'House', 'Water', 'Chocolate', 'Fruits', '', '0', '1', '0', '0', ''),
(4, '4', 'Which one is a fur-bearing animal?', 'Hen', 'Crocodile', 'Tortoise', 'Cat', '', '0', '0', '0', '1', ''),
(5, '5', 'What is Earth’s only natural satellite?', 'Sun', 'Mars', 'Venus', 'Moon', '', '0', '0', '0', '1', '');

-- --------------------------------------------------------

--
-- Table structure for table `questiond`
--

CREATE TABLE `questiond` (
  `auto_id` int(10) UNSIGNED NOT NULL,
  `qnum` varchar(5) DEFAULT NULL,
  `question` varchar(1000) DEFAULT NULL,
  `answer1` varchar(500) DEFAULT NULL,
  `answer2` varchar(500) DEFAULT NULL,
  `answer3` varchar(500) DEFAULT NULL,
  `answer4` varchar(500) DEFAULT NULL,
  `answer5` varchar(500) DEFAULT NULL,
  `mark1` varchar(5) DEFAULT NULL,
  `mark2` varchar(5) DEFAULT NULL,
  `mark3` varchar(5) DEFAULT NULL,
  `mark4` varchar(5) DEFAULT NULL,
  `mark5` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questiond`
--

INSERT INTO `questiond` (`auto_id`, `qnum`, `question`, `answer1`, `answer2`, `answer3`, `answer4`, `answer5`, `mark1`, `mark2`, `mark3`, `mark4`, `mark5`) VALUES
(1, '1', 'My brother and ____ will go to the ball game.', 'I', 'me', 'mine', 'their', '', '1', '0', '0', '0', ''),
(2, '2', 'Hasanah is a mother of two. _________ love her children so much.', 'He', 'Me', 'Her', 'She', '', '0', '0', '0', '1', ''),
(3, '3', '________ is big and strong. What is it?', 'Bee', 'Ant', 'Elephant', 'Paper', '', '0', '0', '1', '0', ''),
(4, '4', 'Which one of these is correctly spelled?', 'Tabel', 'Turtoise', 'Trackmill', 'Niece', '', '0', '0', '0', '1', ''),
(5, '5', 'There is _________ water in the jug.', 'many', 'some', 'a few', 'a big of', '', '0', '1', '0', '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '$2y$10$1IQGnRYYp1KnFQGHg6LPH.1rSYgKSnegE9bVBjBMnV2ULNwDMweHC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attempt`
--
ALTER TABLE `attempt`
  ADD PRIMARY KEY (`attemptid`);

--
-- Indexes for table `marka`
--
ALTER TABLE `marka`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `markb`
--
ALTER TABLE `markb`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `markc`
--
ALTER TABLE `markc`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `markd`
--
ALTER TABLE `markd`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `questiona`
--
ALTER TABLE `questiona`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `questionb`
--
ALTER TABLE `questionb`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `questionc`
--
ALTER TABLE `questionc`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `questiond`
--
ALTER TABLE `questiond`
  ADD PRIMARY KEY (`auto_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attempt`
--
ALTER TABLE `attempt`
  MODIFY `attemptid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `marka`
--
ALTER TABLE `marka`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markb`
--
ALTER TABLE `markb`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markc`
--
ALTER TABLE `markc`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `markd`
--
ALTER TABLE `markd`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questiona`
--
ALTER TABLE `questiona`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questionb`
--
ALTER TABLE `questionb`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questionc`
--
ALTER TABLE `questionc`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `questiond`
--
ALTER TABLE `questiond`
  MODIFY `auto_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
