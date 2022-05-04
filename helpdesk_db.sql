-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2021 at 12:55 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `helpdesk_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` varchar(70) NOT NULL,
  `nama_instansi` varchar(100) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `email`, `alamat`, `kontak`, `created_at`, `updated_at`) VALUES
('1c57d00a-690d-4f3d-a433-cdf9f4264039', 'PT. 4Life Indonesia Trading', 'indonesia@4life.com', 'Lt. 1', '084411223355', '2021-11-16 07:28:02', '2021-11-16 07:28:02'),
('5183f720-9017-43e8-9c43-cf7ad1b2cce7', 'PT. Media Fajar Koran', 'mediafajarkoran@gmail.com', 'Lt. 4', '-', '2021-10-31 19:06:52', '2021-10-31 19:06:52'),
('a93c373e-1849-4f3b-a9b6-9a39846f8e23', 'PT. Fajar Media Pendidikan', 'fajar_pendidikan.mks@yahoo.com', 'Lt. 4', '-', '2021-10-31 18:52:41', '2021-10-31 18:52:41'),
('b758c5b1-75b1-4405-bc95-cc279ece5dc9', 'PT. Fajar National Network', 'redaksifajaronline@gmail.com', 'Lt. 4', '-', '2021-10-31 19:06:06', '2021-10-31 19:06:06');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pengaduan`
--

CREATE TABLE `pengaduan` (
  `id_pengaduan` varchar(70) NOT NULL,
  `id_instansi` varchar(70) DEFAULT NULL,
  `id_teknisi` varchar(70) DEFAULT NULL,
  `tgl_pengaduan` date DEFAULT NULL,
  `judul_pengaduan` varchar(350) DEFAULT NULL,
  `isi_pengaduan` text DEFAULT NULL,
  `status_pengaduan` enum('Antrian','Proses','Selesai','Batal') DEFAULT 'Antrian',
  `bukti_proses` varchar(70) DEFAULT NULL,
  `bukti_selesai` varchar(70) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaduan`
--

INSERT INTO `pengaduan` (`id_pengaduan`, `id_instansi`, `id_teknisi`, `tgl_pengaduan`, `judul_pengaduan`, `isi_pengaduan`, `status_pengaduan`, `bukti_proses`, `bukti_selesai`, `created_at`, `updated_at`) VALUES
('76ffd77d-feda-44da-9370-8eade37e9515', '5183f720-9017-43e8-9c43-cf7ad1b2cce7', 'b7ab7a80-2af6-49d1-a20a-13ca68697d44', '2021-11-16', 'jaringan', 'tidak stabil dari 2hari yang lalu, mohon secepatnya', 'Selesai', 'ad6ba959-0a71-4472-a1b1-d6b935be02af.jpg', '52bb1a5c-7ab2-4037-a010-80589b02ba05.jpg', '2021-11-16 07:38:49', '2021-11-16 07:43:00'),
('9985e7bb-b6bc-4968-9775-f7502757152e', '5183f720-9017-43e8-9c43-cf7ad1b2cce7', '4285dbe3-c532-4e37-8840-fd60e2852e3a', '2021-11-09', 'test', 'test', 'Selesai', '52f9fd3c-9b5b-41c6-a2e8-05cd863e2f06.png', '57652e0a-f985-444f-b6f0-bd0c63c93e68.png', '2021-11-08 19:29:39', '2021-11-08 20:12:49'),
('a1297dc1-0175-480c-8a19-2453185592a5', '5183f720-9017-43e8-9c43-cf7ad1b2cce7', 'b7ab7a80-2af6-49d1-a20a-13ca68697d44', '2021-11-17', 'test2', 'gfxsfs', 'Selesai', '07800e59-3000-4140-9c89-5bfcf0a1c286.png', '20e6468b-2019-4847-a11e-242bfa76aced.png', '2021-11-16 19:50:52', '2021-11-16 19:52:02'),
('b4aab10a-8498-4589-b97a-a2922225e740', '5183f720-9017-43e8-9c43-cf7ad1b2cce7', 'b7ab7a80-2af6-49d1-a20a-13ca68697d44', '2021-11-10', 'test', 'test urin', 'Selesai', '95e958fa-efb7-470b-b807-8722ae63f436.png', 'bb5babd3-c959-47f6-ad8d-324e0a41e332.png', '2021-11-10 04:10:30', '2021-11-10 04:12:20');

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` varchar(70) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(150) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nama`, `alamat`, `kontak`, `email`, `created_at`, `updated_at`) VALUES
('064fbe51-8afa-47f8-9eb4-5acc0d8dc6b2', 'Asdar', '-', '083344556677', 'asdar@yahoo.com', '2021-10-31 21:11:15', '2021-10-31 21:11:15'),
('4285dbe3-c532-4e37-8840-fd60e2852e3a', 'Ardi', '-', '082233445566', 'ardi@gmail.com', '2021-10-31 21:10:53', '2021-10-31 21:10:53'),
('b7ab7a80-2af6-49d1-a20a-13ca68697d44', 'Muh. Gazali Muchtar', '-', '081122334455', 'gazalimuchtar@gmail.com', '2021-10-31 21:10:32', '2021-10-31 21:10:32');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` varchar(70) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_instansi` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(35) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe` enum('ADMIN','USER') COLLATE utf8mb4_unicode_ci DEFAULT 'USER',
  `foto` varchar(70) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `id_instansi`, `username`, `password`, `tipe`, `foto`, `created_at`, `updated_at`) VALUES
('17ae1c0e-a2ca-44ab-a6cd-7bf994b975aa', '5183f720-9017-43e8-9c43-cf7ad1b2cce7', 'mediafajarkoran', '$2y$10$AC.LF3q8VH9s/Thr7dL/m.8kcuJ7COzmS.eE.E7aSImFmJGTtYH5W', 'USER', '209cd7ec-c06e-4592-a4a2-8fd7649dc475.jpg', '2021-10-31 19:06:52', '2021-11-16 07:39:13'),
('5780b775-55dd-446c-bf5a-3ea0e06d99d0', 'a93c373e-1849-4f3b-a9b6-9a39846f8e23', 'fajarmpendidikan', '$2y$10$qmQA9x5CHkcyRmPcbQVuueK5XleyOpp8U3rN3YGz3Fbbx/E1TwESq', 'USER', NULL, '2021-10-31 18:52:41', '2021-10-31 18:52:41'),
('945fd0c9-cb65-4740-8b6c-fe838603a7d9', NULL, 'admin123', '$2y$10$TNk6QswvP16ZOgqazqT1kuijdFLfr2C6fx0s7jXP6QR/ji6Ex/uju', 'ADMIN', 'a2d22c0a-0db7-4c21-83b3-61ca2b20aaf2.png', '2021-10-31 17:53:48', '2021-11-16 07:32:52'),
('bdc5544f-33fd-4394-848d-1517cb2aad77', '1c57d00a-690d-4f3d-a433-cdf9f4264039', '4lifetradingid', '$2y$10$fv5QnosUmn/vzJK0gBXe7uyJ3Rpy4owq0RL8MGfDa3bqqkVXlGw4e', 'USER', NULL, '2021-11-16 07:28:03', '2021-11-16 07:28:03'),
('d07d7e41-1cff-4069-b038-d5fd0a735553', 'b758c5b1-75b1-4405-bc95-cc279ece5dc9', 'fnnmakassar', '$2y$10$naO5JorErCFl3ejwZvtl1eBf8mGa0G1cZRBhFs4ozAKsA8ydud/BS', 'USER', NULL, '2021-10-31 19:06:07', '2021-10-31 19:06:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

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
-- Indexes for table `pengaduan`
--
ALTER TABLE `pengaduan`
  ADD PRIMARY KEY (`id_pengaduan`),
  ADD KEY `id_instansi` (`id_instansi`),
  ADD KEY `id_teknisi` (`id_teknisi`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_instansi` (`id_instansi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
