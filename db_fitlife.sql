-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 11, 2026 at 04:32 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fitlife`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_nutrition`
--

CREATE TABLE `tb_nutrition` (
  `id_nutrition` int NOT NULL,
  `nama_makanan` varchar(50) NOT NULL,
  `kalori` int DEFAULT NULL,
  `protein` decimal(5,1) DEFAULT NULL,
  `karbohidrat` decimal(5,1) DEFAULT NULL,
  `lemak` decimal(5,1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemesanan`
--

CREATE TABLE `tb_pemesanan` (
  `id_pemesanan` int NOT NULL,
  `id_user` int NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `jumlah` int NOT NULL,
  `harga_satuan` int NOT NULL,
  `diskon` int DEFAULT '0',
  `total_bayar` int NOT NULL,
  `tgl_pesan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_progress`
--

CREATE TABLE `tb_progress` (
  `id_progress` int NOT NULL,
  `id_user` int NOT NULL,
  `tanggal` date NOT NULL,
  `berat_badan` decimal(5,2) DEFAULT NULL,
  `kalori_harian` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id_user` int NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_daftar` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_workout`
--

CREATE TABLE `tb_workout` (
  `id_workout` int NOT NULL,
  `nama_workout` varchar(50) NOT NULL,
  `kategori` varchar(30) DEFAULT NULL,
  `durasi` int DEFAULT NULL,
  `kalori_terbakar` int DEFAULT NULL,
  `deskripsi` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_workout_log`
--

CREATE TABLE `tb_workout_log` (
  `id_log` int NOT NULL,
  `id_user` int NOT NULL,
  `id_workout` int NOT NULL,
  `tanggal` date NOT NULL,
  `durasi_aktual` int DEFAULT NULL,
  `status` varchar(20) DEFAULT 'Selesai'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_nutrition`
--
ALTER TABLE `tb_nutrition`
  ADD PRIMARY KEY (`id_nutrition`);

--
-- Indexes for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `fk_pesan_user` (`id_user`);

--
-- Indexes for table `tb_progress`
--
ALTER TABLE `tb_progress`
  ADD PRIMARY KEY (`id_progress`),
  ADD KEY `fk_progress_user` (`id_user`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tb_workout`
--
ALTER TABLE `tb_workout`
  ADD PRIMARY KEY (`id_workout`);

--
-- Indexes for table `tb_workout_log`
--
ALTER TABLE `tb_workout_log`
  ADD PRIMARY KEY (`id_log`),
  ADD KEY `fk_log_user` (`id_user`),
  ADD KEY `fk_log_workout` (`id_workout`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_nutrition`
--
ALTER TABLE `tb_nutrition`
  MODIFY `id_nutrition` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  MODIFY `id_pemesanan` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_progress`
--
ALTER TABLE `tb_progress`
  MODIFY `id_progress` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_workout`
--
ALTER TABLE `tb_workout`
  MODIFY `id_workout` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_workout_log`
--
ALTER TABLE `tb_workout_log`
  MODIFY `id_log` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_pemesanan`
--
ALTER TABLE `tb_pemesanan`
  ADD CONSTRAINT `fk_pesan_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `tb_progress`
--
ALTER TABLE `tb_progress`
  ADD CONSTRAINT `fk_progress_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE;

--
-- Constraints for table `tb_workout_log`
--
ALTER TABLE `tb_workout_log`
  ADD CONSTRAINT `fk_log_user` FOREIGN KEY (`id_user`) REFERENCES `tb_users` (`id_user`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_log_workout` FOREIGN KEY (`id_workout`) REFERENCES `tb_workout` (`id_workout`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
