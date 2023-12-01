-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Dec 01, 2023 at 04:49 AM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `game_session`
--

CREATE TABLE `game_session` (
  `session_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `games_played` int(11) DEFAULT NULL,
  `win` int(11) DEFAULT NULL,
  `loss` int(11) DEFAULT NULL,
  `draw` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `game_session`
--

INSERT INTO `game_session` (`session_id`, `user_id`, `game_name`, `games_played`, `win`, `loss`, `draw`) VALUES
(1, 1, 'Rock Paper Scissors', 30, 10, 10, 10),
(2, 3, 'Rock Paper Scissors', 15, 5, 5, 5),
(3, 5, 'Blackjack', 11, 1, 10, 0),
(4, 1, 'Blackjack', 10, 10, 0, 0),
(5, 3, 'Rock Paper Scissors', 15, 0, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`user_id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$T3Msew25JTImYks0kZOqNeUQjnoaY7QtAxcU8SNP.2tDiO8QM/Nca'),
(2, 'Bob', '$2y$10$sKOU7/UExeZvDEO8Q3qyz.xZsRMzJEzkBqfqAOa/iBd1vxPh0522a'),
(3, 'QWERTY', '$2y$10$ClqCA8auktB0qAiCAgQpe.HolQ4OrZhRvT2RwPXnfG7lWRv5xeuDK'),
(4, 'Yes', '$2y$10$9kDKZgpOzz0uJXreIwG8le7Db2bBmI2rSj3XiQn5Mu..iWXACSzte'),
(5, 'No', '$2y$10$ZZK3p.X5Wq8G7sNUTR4xJe.erXHBb6NX8UbgbbDF21zLJBkEaWTnC'),
(6, 'Maybe', '$2y$10$pBuSwE3sJUG/SGcjAmeu2.1UzgivJ/F2vjdoG6Xk/BxOI2iOw8fv6'),
(7, 'Kill', '$2y$10$0STeiidIAjh8NVeGcTmn0ekkyQtdNibQwgJkyryuM.yTUu/BnRukW'),
(8, 'anushka', '$2y$10$VTwExukbwT1nCKXMC8dbU.Lv2NcQDRoeYO5NMocf6J5a1I6M2Nsg2'),
(9, 'QWER', '$2y$10$RX6qvBt7dd6y07HXNpIAJ.FRJiEIqagWA9wA3Ol0vpXypqSLOA95m'),
(10, 'Work', '$2y$10$kZDlMZk3NWPFViyEjp2UEu/avxvB/jDXYdzTYCOVB/t4cm7l9ljze');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `score_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `games_played` int(11) DEFAULT NULL,
  `win` int(11) DEFAULT NULL,
  `loss` int(11) DEFAULT NULL,
  `draw` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`score_id`, `user_id`, `game_name`, `games_played`, `win`, `loss`, `draw`) VALUES
(1, 1, 'Rock Paper Scissors', 30, 10, 10, 10),
(2, 3, 'Rock Paper Scissors', 30, 5, 10, 15),
(3, 5, 'Blackjack', 11, 1, 10, 0),
(4, 2, 'Rock Paper Scissors', 25, 5, 0, 20);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `game_session`
--
ALTER TABLE `game_session`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`score_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `game_session`
--
ALTER TABLE `game_session`
  MODIFY `session_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `score_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `game_session`
--
ALTER TABLE `game_session`
  ADD CONSTRAINT `game_session_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);

--
-- Constraints for table `score`
--
ALTER TABLE `score`
  ADD CONSTRAINT `score_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `registration` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
