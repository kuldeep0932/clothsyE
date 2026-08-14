-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2026 at 02:05 AM
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
-- Database: `clothsy`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_add` varchar(150) NOT NULL,
  `password` varchar(255) NOT NULL,
  `agree` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email_add`, `password`, `agree`, `created_at`) VALUES
(1, 'Kuldeep', 'Kumar', 'admin123@gmail.com', '$2a$12$hIl8IVIrBPHHBzO0SAq/7.ZHjNsQT1eurwuk/zAnja.YnIpzV9k3C', 1, '2026-01-23 03:20:20'),
(2, 'Rahul', 'saini', 'rahulsaini82667@gmail.com', 'bASELINE@123', 0, '2026-01-23 10:19:24'),
(4, 'Sandeep', 'Kumar', 'sandy@gmail.com', 'Sandy@123', 0, '2026-02-23 05:35:44'),
(5, 'Nikhil', 'Thakur', 'nik@gmail.com', '123456', 0, '2026-02-23 06:39:57'),
(6, 'Rahul', 'R', 'rahul@gmail.com', 'Admin!123', 0, '2026-04-10 03:13:08'),
(9, 'Test', 'User', 'test123@gmail.com', 'Baseline@123', 0, '2026-06-25 09:54:05'),
(10, 'Ram', 'Kumar', 'ram123@gmail.com', 'Ram@123', 0, '2026-07-23 16:39:25'),
(11, 'vinit', 'sehgal', 'vinitweb5@gmail.com', '$2y$10$V2.iRqtD2ASNRDGrmK9VIe0zTL9V90//iDTqHY0FiPVxJv0N.ChJG', 0, '2026-08-05 23:49:45'),
(12, 'Raju', 'Dev', 'rajudev123@gmail.com', '$2y$10$cmrQ3u14dJrJmiUWo2ARu.Nt1El9sNk3Mk490I3UChPRFE7lsiFHy', 0, '2026-08-13 18:50:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_add` (`email_add`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
