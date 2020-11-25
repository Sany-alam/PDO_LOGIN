-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2020 at 11:58 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pdo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `email`, `password`) VALUES
(1, 'momen', 'momen12', 'momen@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(2, 'messi', 'messi10', 'messi@test.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(3, 'Salim', 'salim12', 'Salim@abc.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(4, 'ronaldo', 'ronaldo7', 'cr7@rm.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(5, 'Ariful Isalm', 'ariful', 'ariful@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(6, 'kaka ', 'kaka', 'kaka@RM.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(7, 'luka', 'modric', 'modric@rm.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(8, 'eric lamela', 'lamela', 'lamela@spurs.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(9, 'Tanvir Ahsan', 'tanvir0705', 'tanvirtanim070501@gmail.com', '821259a7e59e30080c743bb7a0b889d4'),
(10, 'jawad', 'jawad', 'jawad@abc.com', '827ccb0eea8a706c4c34a16891f84e7b');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
