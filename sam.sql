-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 07, 2022 at 09:35 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 7.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sam`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserv_id` int(11) NOT NULL,
  `f_name` text NOT NULL,
  `l_name` text NOT NULL,
  `num_guests` int(11) NOT NULL,
  `num_tables` int(11) NOT NULL,
  `rdate` date NOT NULL,
  `time_zone` text NOT NULL,
  `telephone` text NOT NULL,
  `comment` mediumtext NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserv_id`, `f_name`, `l_name`, `num_guests`, `num_tables`, `rdate`, `time_zone`, `telephone`, `comment`, `reg_date`, `user_fk`) VALUES
(74, 'Bill', 'Fotos', 6, 2, '2019-05-10', '12:00 - 16:00', '2129632123', '312312312', '2019-05-05 00:54:08', 28),
(75, 'Bill', 'Fotos', 6, 2, '2019-05-10', '16:00 - 20:00', '2109632123', '', '2019-05-05 00:54:40', 28),
(76, 'Bill', 'Fotos', 1, 1, '2019-05-24', '12:00 - 16:00', '2109632123', 'sfsdfsd', '2019-05-06 23:28:11', 28),
(77, 'Sarbajeet', 'Mandal', 4, 1, '2021-09-10', '12:00 - 16:00', '0406628349', 'sdf', '2021-09-09 01:21:50', 35),
(78, 'Sarbajeet', 'Mandal', 4, 1, '2021-09-04', '16:00 - 20:00', '0406628349', 'qwe', '2021-09-09 02:06:57', 35),
(80, 'Sarbajeet', 'Mandal', 4, 1, '2021-09-18', '12:00 - 16:00', '0406628349', '', '2021-09-16 02:38:37', 37),
(87, 'Sarbajeet', 'Mandal', 2, 1, '2021-10-16', '01:09', '0406628349', 'book', '2021-10-07 02:09:45', 46),
(89, 'Ranju', 'Gautam', 7, 3, '2022-04-24', '08:20', '0415141537', 'kjhkj', '2022-04-03 10:19:21', 38);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`) VALUES
(1),
(2),
(3);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `open_time` time NOT NULL DEFAULT '12:00:00',
  `close_time` time NOT NULL DEFAULT '00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `date`, `open_time`, `close_time`) VALUES
(6, '2019-05-15', '03:11:00', '11:11:00'),
(7, '2019-05-16', '01:00:00', '01:00:00'),
(8, '2019-05-18', '02:01:00', '15:00:00'),
(9, '2022-04-07', '12:41:00', '12:41:00'),
(10, '2022-04-13', '15:55:00', '15:55:00'),
(11, '2022-04-03', '03:58:00', '03:58:00');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `tables_id` int(11) NOT NULL,
  `t_date` date NOT NULL,
  `t_tables` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `uidUsers` tinytext NOT NULL,
  `emailUsers` tinytext NOT NULL,
  `pwdUsers` longtext NOT NULL,
  `reg_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `role_id` int(11) NOT NULL DEFAULT 1,
  `pin-point` varchar(255) NOT NULL DEFAULT '0',
  `prev-pin-point` varchar(255) NOT NULL DEFAULT '0',
  `gain-point` varchar(255) NOT NULL,
  `Address` varchar(255) NOT NULL DEFAULT '0',
  `phone` varchar(255) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `uidUsers`, `emailUsers`, `pwdUsers`, `reg_date`, `role_id`, `pin-point`, `prev-pin-point`, `gain-point`, `Address`, `phone`) VALUES
(26, 'kappa', 'kapa@in.com', '$2y$10$AXUubKPLqRUX1DeorQ3AGOsBey7oaSNPF892EUR96unf..h25rsYq', '2019-04-30 19:51:07', 1, '0', '0', '', '0', '0'),
(27, 'kappa1', 'ka11pa@in.com', '$2y$10$/VK5CmjZavvC4gdv3WFk5u.Th5luQTfpzigiYPSryoVdULSE57A.a', '2019-04-30 20:18:57', 1, '0', '0', '', '0', '0'),
(28, 'kappa2', 'kappa2@hotmail.com', '$2y$10$jfiG7gFvyQo..Cx1ZwktaOcs.83Zhsn0fkvq.9CvQCRA4Ognb/cBK', '2019-04-30 20:46:20', 1, '0', '0', '', '0', '0'),
(29, 'ddsa', 'kapa@in.comq', '$2y$10$sH8sr2sI//qD5bg/D/sGeuDYb3COyUEwvNCKTLBfWUitVi2s/Z0ZG', '2019-05-01 00:25:37', 1, '0', '0', '', '0', '0'),
(30, 'kappakeepo', '1kapa@in.com', '$2y$10$ONn5KIyEJ.iyFKQIZVHjiurhibs/udkh6W8BLqz1Anj/z9j2VbL6y', '2019-05-01 00:37:43', 1, '0', '0', '', '0', '0'),
(31, 'kappakeepo12', 'kap11a@in.com', '$2y$10$WZjlyFoTvyAy/loojjLiE.0Ekka5nwcfAUnwIGM2FaR0g11ieVjeq', '2019-05-02 21:54:09', 1, '0', '0', '', '0', '0'),
(32, 'fwtis', 'kappa1@in.gr', '$2y$10$3rZoKKI5idzOeRK.YUfcwe/7bL66dkU0o54w2uQ/PWpFPYR7T/Zk2', '2019-05-03 01:11:03', 1, '0', '0', '', '0', '0'),
(33, 'kopelitsoua', 'effgfdgfdg@hotmail.com', '$2y$10$Ha0vNgl399uQveyAsp.MyuKteq9ZXZRH1yZ7XY2KZXU1O0HiQ0.CK', '2019-05-03 18:05:05', 1, '0', '0', '', '0', '0'),
(34, 'lolas', 'lolas@in.gr', '$2y$10$Fgzedyphz9nYpLkXaGOc2u.K2SZby5m5t23Uo/3u/4kC8a6Uf9xTe', '2019-05-05 00:59:10', 1, '0', '0', '', '0', '0'),
(35, 'sarbajeetmandal4', 'sarbajeetmandal4@gmail.com', '$2y$10$fVUaJjL3Tj921xKmbCPtheu0vUo8H8W5m2aXr41TRrAK4QhUgxVP2', '2021-09-06 15:27:42', 2, '0', '0', '', '0', '0'),
(36, 'dip12345', 'dip@gmail.com', '$2y$10$tZ5Rwg0dXzkIdUgPS3CEheELyS/uEjonszGwetkOk2HH5PA13pok6', '2021-09-09 00:30:00', 1, '0', '0', '', '0', '0'),
(37, 'mandal', 'mandal@gmail.com', '$2y$10$yIxrKDqqeNc.h1DRPimnhOxFQWVhikAi3cQSkD8Ys4NhtNa.KBhOS', '2021-09-10 04:29:18', 1, '0', '0', '', '0', '0'),
(38, 'amol', 'amol1@gmail.com', '$2y$10$65ydf/DAg0YCMfo1NfNaoekkR/2c.lZqpUnrPcBhOuPF2FfUGyERK', '2021-09-16 08:38:14', 1, '98450', '98450', '3', '1234', '232323'),
(39, 'amol343', '3434@fdfd.com', '$2y$10$LxiNYg.w5IHZ7JdD2j42SelU/FweV/9SxkrZDTlWTjnJ49VEXFAdm', '2021-09-25 04:18:21', 1, '0', '0', '', '0', '0'),
(40, 'amolsdfsdfd', 'sdfsdfds@fdsfd.com', '$2y$10$qxAieE.Ok5FGenxv5z0zUOoVl5cOs3.ej2peCC7eT7djRdgUm.j8O', '2021-09-25 04:24:54', 1, '0', '0', '', '0', '0'),
(41, 'developers234', 'yousafsadiq444535@gmail.com', '$2y$10$gP94eMBXuC3VAfcsvapZjuGnx5are1p7UkNPQGLbKLsQ7kyUuNe26', '2021-09-26 10:45:12', 1, '1234567', '1234567', '5', 'Hiren road', '33445762'),
(42, 'abcdefghijkl', 'yskdeveloper62@gmail.com', '$2y$10$ZOzmVKtL814hYyCie8PVeOr6xdEkEW4w.5iaYEFo4b.Po2Y7.HESu', '2021-09-29 05:11:11', 2, '0', '0', '', 'Hiren road', '33445762'),
(43, 'sammandal', 'sam@gmail.com', '$2y$10$aetNVbN32a45QqdxyCHOfuGLSYCsc5vcMSkJc8k8DhP2pQTxKG.Ui', '2021-09-30 08:26:42', 1, '12345', '12345', '1', 'U11 1 Empress St, Hurstville', '0406628349'),
(44, 'book', 'book@gmail.com', '$2y$10$nshKaHBMMfakJrAbIVGR7OJnc17mTSiCTZ1YGX/0CEg5KHUYDybLq', '2021-09-30 08:36:58', 1, '12345', '12345', '1', 'newton', '123354'),
(45, 'qwertyuiop', 'qwertyuiop@gmail.com', '$2y$10$Qw32XY/OUjSc/lxB5Fn1l.C56a1oUwBxnwG6eR37747h4BLWyILyS', '2021-10-06 12:25:07', 1, '0', '0', '', 'U11 1 Empress St, Hurstville', '0406628349'),
(46, 'jack', 'jack@gmail.com', '$2y$10$uonB476PtBzS58A.iLdb7ehGnX0jaGMpT0MFY0ikX8nE7Nu6oNsnW', '2021-10-07 02:09:01', 1, '6789', '12345', '1', 'U11 1 Empress St, Hurstville', 'Notice:  Undefined index: phonex in C:\\xampp\\htdocs\\dip\\updated\\sarbajeet\\update.php on line 36'),
(47, 'Hrishav', 'hrishavsunar@gmail.com', '$2y$10$wCGASDFgwX25VnWr4H1.V.2S0du5GT7jbAKQHObisOCQMcy0V5Kui', '2021-10-15 09:44:39', 1, '0', '0', '', '1/39 the avenue, hurstville', '0426789752'),
(48, 'ashok123', 'ashok@gmail.com', '$2y$10$LVegF7Ud4QocnBXvr6AqYOgNyN9CbxPl8TLi7mNtEYL2Ydj7AEoXG', '2022-04-07 07:22:37', 1, '1234', '1234', '1', 'U11 1 Empress St, Hurstville', '0406628349');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserv_id`),
  ADD KEY `users_fk` (`user_fk`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`tables_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserv_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `tables_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `idusers` FOREIGN KEY (`user_fk`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`) ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
