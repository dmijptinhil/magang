-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 19, 2018 at 06:53 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `disposisis`
--

CREATE TABLE `disposisis` (
  `id` int(10) UNSIGNED NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `catatan` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `batas_waktu` date NOT NULL,
  `sifat_disposisi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `inletter_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `disposisis`
--

INSERT INTO `disposisis` (`id`, `tujuan`, `catatan`, `batas_waktu`, `sifat_disposisi`, `created_at`, `updated_at`, `inletter_id`, `user_id`) VALUES
(17, 'new new', 'fs', '2018-10-17', 'Sangat penting sekali', '2018-10-16 10:08:39', '2018-10-16 10:08:39', 3, 1),
(19, 'four', 'sdf', '2018-10-19', 'sdf', '2018-10-19 07:31:25', '2018-10-19 07:31:25', 4, 2),
(21, 'fdsffff', 'sdf', '2018-10-01', 'sdf', '2018-10-19 09:20:09', '2018-10-19 09:20:22', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `inletters`
--

CREATE TABLE `inletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inletters`
--

INSERT INTO `inletters` (`id`, `no_surat`, `klasifikasi`, `asal`, `perihal`, `tujuan`, `detail_surat`, `petugas`, `filename`, `created_at`, `updated_at`, `user_id`, `date`) VALUES
(1, 'B/001/UND/TU/DINP/DNP/X/2018', 'Biasa', 'Dinasi Pendidikan', 'Undangan', 'Kepala BPS', 'ini merupakan surat undangan pada acara Ulang tahun dinas pendidikan ke-70 pada tanggal 20 Oktober 2018 pukul 08.00-12.00 bertempat di swiss bell', 'nofita', NULL, '2018-10-14 00:33:06', '2018-10-14 00:31:44', 3, '2018-10-14'),
(3, 'C/90/FST/UNJA/X/2018', 'Penting', 'Unja', 'Rapat', 'IPDS', 'rapat pada tanggal 20 Oktober 2018 di FST Unja', 'Muhammad', NULL, '2018-10-14 09:41:48', '2018-10-14 09:42:30', 3, '2018-10-14'),
(4, 'B/10/FPS/F/DS/X/2018', 'Penting', 'Presiden', 'undangan rapat edited', 'Kepala BPS', 'surat ini ditujukan untuk kepala dan berisi tentang rapat pada pukul 08.00 - 12.00 di istana merdeka\r\ndresscode batik dan rok', 'nof', 'Profile Photo_1539950512.jpg', '2018-10-15 19:10:00', '2018-10-19 05:01:52', 3, '2018-10-16'),
(6, 'baru buat masuk', 'Penting', 'abc', 'abc', 'Kepala', 'abc', 'abc', NULL, '2018-10-19 09:40:43', '2018-10-19 09:40:43', 8, '2018-10-19');

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
(3, '2018_10_13_133139_create_suratmasuks_table', 1),
(4, '2018_10_13_133421_create_suratkeluars_table', 1),
(5, '2018_10_13_133445_create_disposisis_table', 1),
(6, '2014_10_12_000000_create_users_table', 2),
(7, '2014_10_12_100000_create_password_resets_table', 2),
(8, '2018_10_13_235413_create_inletters_table', 2),
(9, '2018_10_13_235544_create_outletters_table', 2),
(10, '2018_10_13_235622_create_disposisis_table', 2),
(11, '2018_10_16_044100_add_user_id_to_inletters', 3),
(12, '2018_10_16_044312_add_inletter_id_to_disposisis', 3),
(13, '2018_10_16_044441_add_user_id_to_outletters', 3),
(14, '2018_10_16_124749_add_date_to_inletters', 4),
(15, '2018_10_16_125028_add_date_to_outletters', 4),
(16, '2018_10_16_134600_add_user_id_to_disposisis', 5);

-- --------------------------------------------------------

--
-- Table structure for table `outletters`
--

CREATE TABLE `outletters` (
  `id` int(10) UNSIGNED NOT NULL,
  `no_surat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `klasifikasi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perihal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tujuan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `detail_surat` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `petugas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `filename` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `outletters`
--

INSERT INTO `outletters` (`id`, `no_surat`, `klasifikasi`, `asal`, `perihal`, `tujuan`, `detail_surat`, `petugas`, `filename`, `created_at`, `updated_at`, `user_id`, `date`) VALUES
(1, 'B/002/BPS/X/2018', 'biasa edited again', 'IPDS', 'Permintaan Data', 'Kominfo', 'surat ini ditujukan untuk memperoleh permintaan data DDA 2018', 'Aan', NULL, '2018-10-14 19:13:35', '2018-10-19 05:34:09', 3, '2018-10-15'),
(3, 'keluar edit', 'Penting', 'sdf', 'sdf', 'Kepala', 'sdf', 'sdf', 'httpd-vhosts_1539953094.conf', '2018-10-19 05:39:54', '2018-10-19 05:45:12', 2, '2018-10-19'),
(4, 'outout ed', 'Penting', 'sdf', 'sdf', 'Kepala', 'sdf', 'sdf', 'Screen Shot 2018-09-16 at 10.16.53 AM_1539966411.png', '2018-10-19 09:24:20', '2018-10-19 09:26:51', 1, '2018-10-19');

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
  `role` tinyint(4) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@bps.go.id', '$2y$10$aDPQM7rq.UJTQo./zwXxseS/9qgRHDHaWTFV9dBHcHHTEn3I3qCvS', 1, 'mHPb1AMwJiQOmbMt5CHz0pLnN3jclkspTgNMCVYR6UJ1OiZ4WUMEq7cGvNlq', '2018-10-15 20:57:16', '2018-10-15 20:57:16'),
(2, 'Kepala BPS Edited', 'pimpinan@bps.go.id', '$2y$10$aDPQM7rq.UJTQo./zwXxseS/9qgRHDHaWTFV9dBHcHHTEn3I3qCvS', 2, '3niuGxvEKvw5FsnapuKuPlqd4uVJ1dhbjDz4CzEhD4h8pvjWN9jHmXIEEbwg', '2018-10-14 20:44:48', '2018-10-19 07:05:48'),
(3, 'kasubag. tu', 'tu@bps.go.id', '$2y$10$85Kd6i0zMd6s8fsAHBOPAuSFtTmCrp90qgH2yRdfjvnK25lL3ueQy', 3, 'XQ8Bh9zJZm40lOJzgFWvIxSdPX58tsxXBkGVpd3cf8TizbJbrzYhbtMCjH3Q', '2018-10-15 06:08:08', '2018-10-15 06:08:08'),
(8, 'nanana ee', 'yay2ya@fsdf', '$2y$10$w.uVrkRGkeRaC2/4PHUAm.s9ZxhnsIV.W8tSRvl6Hrzy6h.n0MQJ6', 1, NULL, '2018-10-19 09:28:44', '2018-10-19 09:29:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disposisis`
--
ALTER TABLE `disposisis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inletters`
--
ALTER TABLE `inletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `outletters`
--
ALTER TABLE `outletters`
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
-- AUTO_INCREMENT for table `disposisis`
--
ALTER TABLE `disposisis`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `inletters`
--
ALTER TABLE `inletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `outletters`
--
ALTER TABLE `outletters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
