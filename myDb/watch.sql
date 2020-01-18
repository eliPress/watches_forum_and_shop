-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2020 at 03:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `watch`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `image` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cat_name`, `image`, `description`, `created_at`, `updated_at`) VALUES
(1, 'garmin', 'alogo.jpg', 'garmin content', '2019-12-03 16:46:45', '2019-12-03 14:46:45'),
(2, 'hublot', 'hlogo.png', 'hublot content', '2019-12-03 16:46:45', '2019-12-03 14:46:45'),
(3, 'rolex', 'rlogo.jpg', 'rolex category', '2019-12-29 10:43:03', '2019-12-29 08:43:03'),
(26, 'garmin', 'alogo.jpg', 'garmin content', '2019-12-03 16:46:45', '2019-12-03 14:46:45'),
(27, 'hublot', 'hlogo.png', 'hublot content', '2019-12-03 16:46:45', '2019-12-03 14:46:45'),
(28, 'rolex', 'rlogo.jpg', 'rolex category', '2019-12-29 10:43:03', '2019-12-29 08:43:03');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `subtotal` varchar(500) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `content`, `subtotal`, `created_at`, `updated_at`) VALUES
(1, 1, '{\"9\":{\"id\":9,\"name\":\"DATEJUST 41\",\"price\":41699,\"quantity\":1,\"attributes\":[],\"conditions\":[]},\"8\":{\"id\":8,\"name\":\"SKY-DWELLER\",\"price\":37695,\"quantity\":2,\"attributes\":[],\"conditions\":[]},\"7\":{\"id\":7,\"name\":\"DAY-DATE 40\",\"price\":10999,\"quantity\":2,\"attributes\":[],\"conditions\":[]}}', '139087', '2019-12-22 15:52:22', '2019-12-22 15:52:22'),
(3, 1, '{\"1\":{\"id\":1,\"name\":\"Fenix\",\"price\":599,\"quantity\":1,\"attributes\":[],\"conditions\":[]},\"2\":{\"id\":2,\"name\":\"Venu\",\"price\":299,\"quantity\":1,\"attributes\":[],\"conditions\":[]},\"3\":{\"id\":3,\"name\":\"Vivomove\",\"price\":249,\"quantity\":1,\"attributes\":[],\"conditions\":[]}}', '1147', '2019-12-22 16:06:24', '2019-12-22 16:06:24'),
(4, 1, '{\"9\":{\"id\":9,\"name\":\"DATEJUST 41\",\"price\":41699,\"quantity\":1,\"attributes\":[],\"conditions\":[]},\"8\":{\"id\":8,\"name\":\"SKY-DWELLER\",\"price\":37695,\"quantity\":2,\"attributes\":[],\"conditions\":[]},\"7\":{\"id\":7,\"name\":\"DAY-DATE 40\",\"price\":10999,\"quantity\":2,\"attributes\":[],\"conditions\":[]}}', '139087', '2019-12-22 15:52:22', '2019-12-22 15:52:22');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` int(11) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `page_name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `cat_id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `description` varchar(500) NOT NULL,
  `image` varchar(500) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `cat_id`, `name`, `description`, `image`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 'Fenix', 'Sapphire - Titanium with Ember Orange Band. Lorem Ipsum is simply dummy text', 'a1.png', 599, '2019-12-09 10:47:43', '2020-01-01 11:21:14'),
(2, 1, 'Venu', 'Slate Stainless Steel Bezel with Black Case and Silicone Band.Lorem Ipsum ', 'a2.jpg', 299, '2019-12-09 10:47:43', '2019-12-09 10:47:43'),
(3, 1, 'Vivomove', '24K Gold PVD Stainless Steel Case with White Italian Leather Band.Lorem Ipsum', 'a3.jpg', 249, '2019-12-09 10:50:33', '2019-12-09 10:50:33'),
(4, 2, 'HUBLOT', 'Classic Fusion Power Reserve 8 Days Titanium 45mm Men\'s Watch.Lorem Ipsum is ', 'h1.png', 8995, '2019-12-09 10:50:33', '2019-12-09 10:50:33'),
(5, 2, 'HUBLOT', 'Classic Fusion Ultra Thin Titanium Automatic White Dial Men\'s Watch.Lorem ', 'h2.png', 6995, '2019-12-09 10:52:53', '2019-12-09 10:52:53'),
(6, 2, 'HUBLOT', 'Classic Fusion Power Reserve 8 Days Titanium 45mm Men\'s Watch.Lorem Ipsum is.', 'h3.jpg', 7395, '2019-12-09 10:52:53', '2019-12-09 10:52:53'),
(7, 3, 'DAY-DATE 40', 'Oyster, 40 mm, yellow gold.Lorem Ipsum is simply dummy text of the printing.', 'r1.jpg', 10999, '2019-12-09 10:56:32', '2019-12-09 10:56:32'),
(8, 3, 'SKY-DWELLER', 'Oyster, 42 mm, Everose gold.Lorem Ipsum is simply dummy text of the printing.', 'r2.jpg', 37695, '2019-12-09 10:56:32', '2019-12-09 10:56:32'),
(9, 3, 'DATEJUST 41', 'Oyster, 41 mm, Oystersteel and yellow gold.Lorem Ipsum is simply dummy text.', 'r3.jpg', 41699, '2019-12-09 10:57:15', '2019-12-09 10:57:15'),
(10, 21, 'new new new', 'test test test test', 'r3.jpg', 5555, '2020-01-01 11:55:47', '2020-01-02 09:40:37'),
(12, 1, 'Fenix', 'Sapphire - Titanium with Ember Orange Band. Lorem Ipsum is simply dummy text', 'a1.png', 599, '2019-12-09 10:47:43', '2020-01-01 11:21:14'),
(13, 1, 'Venu', 'Slate Stainless Steel Bezel with Black Case and Silicone Band.Lorem Ipsum ', 'a2.jpg', 299, '2019-12-09 10:47:43', '2019-12-09 10:47:43'),
(14, 1, 'Vivomove', '24K Gold PVD Stainless Steel Case with White Italian Leather Band.Lorem Ipsum', 'a3.jpg', 249, '2019-12-09 10:50:33', '2019-12-09 10:50:33'),
(15, 2, 'HUBLOT', 'Classic Fusion Power Reserve 8 Days Titanium 45mm Men\'s Watch.Lorem Ipsum is ', 'h1.png', 8995, '2019-12-09 10:50:33', '2019-12-09 10:50:33'),
(16, 2, 'HUBLOT', 'Classic Fusion Ultra Thin Titanium Automatic White Dial Men\'s Watch.Lorem ', 'h2.png', 6995, '2019-12-09 10:52:53', '2019-12-09 10:52:53'),
(17, 2, 'HUBLOT', 'Classic Fusion Power Reserve 8 Days Titanium 45mm Men\'s Watch.Lorem Ipsum is.', 'h3.jpg\r\n', 7395, '2019-12-09 10:52:53', '2019-12-09 10:52:53'),
(18, 3, 'DAY-DATE 40', 'Oyster, 40 mm, yellow gold.Lorem Ipsum is simply dummy text of the printing.', 'r1.jpg', 10999, '2019-12-09 10:56:32', '2019-12-09 10:56:32'),
(19, 3, 'SKY-DWELLER', 'Oyster, 42 mm, Everose gold.Lorem Ipsum is simply dummy text of the printing.', 'r2.jpg', 37695, '2019-12-09 10:56:32', '2019-12-09 10:56:32'),
(20, 3, 'DATEJUST 41', 'Oyster, 41 mm, Oystersteel and yellow gold.Lorem Ipsum is simply dummy text.', 'r3.jpg', 41699, '2019-12-09 10:57:15', '2019-12-09 10:57:15'),
(21, 21, 'new new new', 'test test test test', 'r3.jpg', 5555, '2020-01-01 11:55:47', '2020-01-02 09:40:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(250) NOT NULL,
  `email` varchar(500) NOT NULL,
  `password` varchar(500) NOT NULL,
  `role` int(11) NOT NULL,
  `created_at` date NOT NULL DEFAULT current_timestamp(),
  `updated_at` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'eli', 'eli@gmail.com', '$2y$10$lXEdq/byFM8/aDwUmcjVle2UcxgjoUomiRfYDIWYQu2nuYdbxS3wO', 7, '0000-00-00', '0000-00-00'),
(2, 'admin', 'admin@gmail.com', '$2y$10$H/LCpbo3uheMwawWuqpYruepTxnlPVREBJwZ7OIDNE6OlldXo7TFC', 5, '2019-12-22', '2019-12-22'),
(4, 'rus', 'rus@gmail.com', '$2y$10$9RtRJkRkXANKjP/3yLN7Le9poS4FMquSgaxDkgHOWmTk0deyRnCUe', 5, '2019-12-22', '2019-12-22'),
(8, 'new user', 'new@gmail.com', '$2y$10$HAoP6BG9uRYJIm7BwWXV4OwZPGq1KObUq3HgczDG9RmB1adzNXAmC', 5, '2020-01-04', '2020-01-04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `page_name` (`page_name`),
  ADD UNIQUE KEY `url` (`url`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
