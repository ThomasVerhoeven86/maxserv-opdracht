-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2019 at 09:26 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maxserv_opdracht`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_08_10_192509_create_users_table', 1),
(2, '2019_08_12_104152_create_to_do_items', 1);

-- --------------------------------------------------------

--
-- Table structure for table `to_do_items`
--

CREATE TABLE `to_do_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `edit_date` datetime NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `finished` tinyint(1) NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `to_do_items`
--

INSERT INTO `to_do_items` (`id`, `name`, `content`, `edit_date`, `start_date`, `end_date`, `finished`, `author`, `user_id`) VALUES
(1, 'Plunderen', 'De schatkist plunderen', '2013-06-15 20:30:00', '1995-05-13', '2020-01-01', 1, 'Bob', 1),
(2, 'Varen', 'Varen naar de schatkist', '2019-01-30 05:30:00', '1988-11-28', '2003-02-18', 1, 'Bob', 1),
(3, 'Schatkist opgraven', 'De grote schatkist vol met geld opgraven', '2016-06-15 18:03:23', '2006-10-09', '2021-12-12', 1, 'Bob', 1),
(4, 'Aanvallen', 'Het aanvallen van de vijand', '1992-02-07 06:38:42', '2011-07-12', '2018-09-24', 0, 'Bob', 1),
(5, 'Boodschappen', 'Een piraat heeft ook boodschappen nodig', '2010-12-10 07:34:51', '2009-03-14', '2009-04-14', 1, 'Bob', 1),
(6, 'Winterslaap', 'Een winterslaap om energie te besparen', '2019-08-11 12:12:12', '2020-06-09', '2030-08-13', 1, 'Bob', 1),
(7, 'Mars verkennen', 'Verkennen van de oppervlakte van mars', '1966-11-28 10:30:00', '1965-04-11', '1971-06-15', 1, 'Lisa', 2),
(8, 'Pluto verkennen', 'Een tunnel graven naar de kern van pluto', '1981-01-02 09:30:00', '1975-07-12', '1979-09-24', 0, 'Lisa', 2),
(9, 'Wereld veroveren', 'Alleen tijdens een volle maan', '2021-04-06 12:12:12', '2019-03-09', '2023-08-21', 1, 'Lisa', 2),
(10, 'Plasmareactor uitvinden', 'Plasmareactor uitvinden om mobiele telefoons mee op te laden', '1993-02-07 15:15:00', '1999-12-12', '2001-11-03', 1, 'Lisa', 2),
(11, 'Slapen', 'Iedereen wordt moe', '2019-08-25 22:19:53', '2019-08-14', '2019-08-24', 1, 'Lisa', 2);

--
-- Triggers `to_do_items`
--
DELIMITER $$
CREATE TRIGGER `before_update_to_do_items` BEFORE UPDATE ON `to_do_items` FOR EACH ROW BEGIN
				SET NEW.edit_date = NOW();
			END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Bob', 'test@test.nl', '$2y$10$T9qcqTaHxBUe5nrAH05zfeLtLXYvGFx0gPjRxBXN0u5iYHzc2MAOy', NULL, NULL, NULL),
(2, 'Lisa', 'email@email.nl', '$2y$10$u5jZE94zlo4qJzVBpkqkqeMADjyoISAuJYfHokIjiPN7H4TJmJlba', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `to_do_items`
--
ALTER TABLE `to_do_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `to_do_items_user_id_index` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `to_do_items`
--
ALTER TABLE `to_do_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `to_do_items`
--
ALTER TABLE `to_do_items`
  ADD CONSTRAINT `to_do_items_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
