-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2024 at 02:53 PM
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
-- Database: `parcking`
--

-- --------------------------------------------------------

--
-- Table structure for table `deleted_users`
--

CREATE TABLE `deleted_users` (
  `id_deleted` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `typeUser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `deleted_vehicules`
--

CREATE TABLE `deleted_vehicules` (
  `id` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `license_plate` varchar(200) NOT NULL,
  `color` varchar(200) NOT NULL,
  `observation` text NOT NULL,
  `date_supression` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `deleted_vehicules`
--

INSERT INTO `deleted_vehicules` (`id`, `brand`, `model`, `license_plate`, `color`, `observation`, `date_supression`) VALUES
(5, 'mercedis', 'honda', 'aa123', 'red', 'on', '2023-06-01 18:11:29'),
(6, 'aa', 'honda', 'ccc', '#FFD21E', 'aaa', '2023-06-01 18:20:18'),
(7, 'aa', 'bbb', 'ccc', '#FFD21E', 'ss', '2023-06-01 18:32:54'),
(8, 'aa', 'bbb', 'ccc', '#FFD21E', 'sss', '2023-06-01 19:42:49'),
(10, 'aa@hhhq.vom', 'honda', 'jgfgh', 'red', 'aaa', '2023-06-01 23:07:01'),
(9, 'aa', 'bbb@hhss.com', 'aa123', 'red', 'gg', '2023-06-02 10:27:19');

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `id_reseved` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `license_plate` varchar(200) NOT NULL,
  `date_reservation` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`id_reseved`, `id_vehicule`, `brand`, `model`, `license_plate`, `date_reservation`) VALUES
(14, 12, 'KATKAT', '2000', 'AXC222', '2024-09-22 13:40:40');

-- --------------------------------------------------------

--
-- Table structure for table `reserved_record`
--

CREATE TABLE `reserved_record` (
  `id_record` int(11) NOT NULL,
  `id_vehicule` int(11) NOT NULL,
  `brand` varchar(200) NOT NULL,
  `model` varchar(200) NOT NULL,
  `license_plate` varchar(200) NOT NULL,
  `date_reservation` datetime NOT NULL,
  `date_returning` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `reserved_record`
--

INSERT INTO `reserved_record` (`id_record`, `id_vehicule`, `brand`, `model`, `license_plate`, `date_reservation`, `date_returning`) VALUES
(1, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 20:49:13', '2023-06-01 21:16:52'),
(2, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 21:23:54', '2023-06-01 21:23:54'),
(3, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 21:23:55', '2023-06-01 21:23:56'),
(4, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 21:24:20', '2023-06-01 21:25:20'),
(5, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 21:25:43', '2023-06-01 21:26:06'),
(6, 10, 'aa@hhhq.vom', 'honda', 'jgfgh', '2023-06-01 21:35:34', '2023-06-01 21:36:01'),
(7, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 23:06:00', '2023-06-01 23:06:13'),
(8, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 23:32:50', '2023-06-01 23:33:31'),
(9, 9, 'aa', 'bbb@hhss.com', 'aa123', '2023-06-01 23:33:40', '2023-06-01 23:51:47'),
(10, 11, 'toyota', '2000', 'aabb1', '2023-06-02 10:27:38', '2023-06-02 10:27:58'),
(11, 11, 'toyota', '2000', 'aabb1', '2023-06-02 10:58:02', '2023-06-02 12:04:16'),
(12, 11, 'toyota', '2000', 'aabb1', '2023-06-04 16:01:01', '2023-06-04 16:01:03'),
(13, 11, 'toyota', '2000', 'aabb1', '2024-09-22 13:24:52', '2024-09-22 13:24:55'),
(14, 11, 'toyota', '2000', 'aabb1', '2024-09-22 13:40:42', '2024-09-22 13:51:07');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `image` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `typeUser` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `image`, `name`, `email`, `pass`, `typeUser`) VALUES
(1, '', 'moha', 'admin@gmail.com', '0101', 'Administrator'),
(2, '', 'user01', 'user@gmail.com', '0101', 'USER'),
(3, './images/profile-img.png', 'laaguili', 'admin2@gmail.com', '0101', 'Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `vehicules`
--

CREATE TABLE `vehicules` (
  `id_vehicule` int(11) NOT NULL,
  `brand` varchar(150) NOT NULL,
  `model` varchar(150) NOT NULL,
  `license_plate` varchar(150) NOT NULL,
  `color` varchar(150) NOT NULL,
  `observation` text NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `vehicules`
--

INSERT INTO `vehicules` (`id_vehicule`, `brand`, `model`, `license_plate`, `color`, `observation`, `status`) VALUES
(11, 'toyota', '2000', 'aabb1', 'red', 'obs1', 'Available'),
(12, 'KATKAT', '2000', 'AXC222', 'RED', 'XHH', 'Unavailable');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deleted_users`
--
ALTER TABLE `deleted_users`
  ADD PRIMARY KEY (`id_deleted`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`id_reseved`);

--
-- Indexes for table `reserved_record`
--
ALTER TABLE `reserved_record`
  ADD PRIMARY KEY (`id_record`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicules`
--
ALTER TABLE `vehicules`
  ADD PRIMARY KEY (`id_vehicule`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deleted_users`
--
ALTER TABLE `deleted_users`
  MODIFY `id_deleted` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `id_reseved` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `reserved_record`
--
ALTER TABLE `reserved_record`
  MODIFY `id_record` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vehicules`
--
ALTER TABLE `vehicules`
  MODIFY `id_vehicule` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
