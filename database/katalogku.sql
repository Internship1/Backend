-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 31, 2017 at 04:58 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katalogku`
--

-- --------------------------------------------------------

--
-- Table structure for table `katalog`
--

CREATE TABLE `katalog` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kondisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gambar` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telpon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pemilik_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kategori_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `katalog`
--

INSERT INTO `katalog` (`id`, `judul`, `deskripsi`, `harga`, `kondisi`, `gambar`, `lokasi`, `email`, `telpon`, `pemilik_id`, `created_at`, `updated_at`, `kategori_id`) VALUES
(1, 'Samsung Galaxy J5 Pro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', '3499000', 'Baru', 'samsung-galaxy-j5-pro.jpg', 'Bandung', 'cs@gmail.com', '0761-12192', 1, '2017-08-24 17:00:00', '2017-08-29 00:19:09', 1),
(2, 'Samsung Galaxy A5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', '4999000', 'Baru', 'Samsung-Galaxy-A5-2017.jpg', 'Medan', 'cs@gmail.com', '021-09876', 1, '2017-08-24 17:00:00', NULL, 1),
(3, 'Samsung Galaxy A7', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', '5999000', 'Baru', 'Samsung-Galaxy-A7-2017.jpg', 'Bandung', 'cs@gmail.com', '021-987632', 1, '2017-08-24 17:00:00', NULL, 1),
(5, 'Xiaomi Redmi Note 3 Pro', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', '2300000', 'Baru', 'redmi-note-3-pro.jpg', 'Bandung', 'cs@gmail.com', '021-98763', 1, '2017-08-27 23:50:21', '2017-08-27 23:50:21', 1),
(8, 'Xiaomi Mi 5s Plus (128GB)', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', '6100000', 'Baru', 'xiaomi-mi-5s-plus-33-1485158930.jpg', 'Bandung', 'xiaomi@gmail.com', '021-98763', 1, '2017-08-28 00:01:48', '2017-08-28 00:01:48', 1),
(9, 'Oppo F3 Plus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', '6499000', 'Baru', 'oppo-f3-plus-1-36-1491209782.jpg', 'Bandung', 'oppo@gmail.com', '021-98763', 1, '2017-08-28 00:04:48', '2017-08-28 00:04:48', 1),
(10, 'Apple iPhone SE 16 GB', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris', '6850000', 'Baru', 'appleiphone-se-press-2-56-1462778573.gif', 'Bandung', 'apple@gmail.com', '021-98763', 2, '2017-08-28 02:04:42', '2017-08-28 02:04:42', 1),
(17, 'ASUS A43SD-VX053D', 'Spesifikasi ASUS A43SD-VX053D didukung oleh Processor Intel Dual Core B960 2.20Ghz, Intel HM65 Mobile Chipset, RAM 2GB DDR3 dan Grafis Nvidia GT610M 2GB.', '5000000', 'Baru', 'asus-a43sd-vx053d_enl.jpg', 'Bandung', 'asus@gmail.com', '021-98763', 1, '2017-08-29 03:09:54', '2017-08-29 03:09:54', 3),
(18, 'HP Pavilion 24 All-in-One', 'Gather around and experience the power of your family\'s new centerpiece. The HP Pavilion All-In-One brings style and performance to the center of your home.', '15000000', 'Baru', 'FangioPavAIO_Bigscreen1.jpg', 'Bandung', 'hp@gmail.com', '021-98763', 1, '2017-08-29 03:16:57', '2017-08-29 03:16:57', 4),
(19, 'ASUS ZenPad Theater', 'ASUS ZenPad Theater merupakan paket hiburan tablet yang hadir bersama produk ASUS Audio Cover. Dengan layar Tru2Life dan suara surround sinematik 5.1.', '2999000', 'Baru', 'asus.jpg', 'Bandung', 'asus@gmail.com', '021-98763', 1, '2017-08-29 03:19:40', '2017-08-29 03:19:40', 2);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Smartphone', NULL, NULL),
(2, 'Tablet', NULL, NULL),
(3, 'Laptop', NULL, NULL),
(4, 'PC Desktop', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2017_08_25_075652_create_katalog_table', 1),
(4, '2017_08_25_080226_create_kategori_table', 1),
(5, '2017_08_25_080524_add_kategoriid_ke_katalog_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rizki Fadillah', 'rizki1144089@gmail.com', '$2y$10$FJvs4WnY8xQmeedEpjjywuCgYcKjjGcmWnbWW37GBOcsWlApJxPMu', 'pEF9KAe1ayEfJoJTVjqA7Wj5QCPJM2XFFAy5PuortUwNnZP479v3hEvAMtm3', '2017-08-28 00:48:51', '2017-08-28 00:48:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `katalog`
--
ALTER TABLE `katalog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `katalog_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `katalog`
--
ALTER TABLE `katalog`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `katalog`
--
ALTER TABLE `katalog`
  ADD CONSTRAINT `katalog_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategori` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
