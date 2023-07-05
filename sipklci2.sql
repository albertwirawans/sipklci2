-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 13, 2023 at 12:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipklci2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_group`
--

CREATE TABLE `tb_group` (
  `group_id` int(11) NOT NULL,
  `group_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_group`
--

INSERT INTO `tb_group` (`group_id`, `group_name`) VALUES
(1, 'Administrator'),
(2, 'Guru');

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `siswa_id` int(11) NOT NULL,
  `siswa_nama` varchar(255) DEFAULT NULL,
  `siswa_kelas` varchar(255) DEFAULT NULL,
  `siswa_telepon` varchar(255) DEFAULT NULL,
  `siswa_alamat` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) NOT NULL,
  `alamat_perusahaan` text NOT NULL,
  `surat_permohonan` varchar(255) NOT NULL,
  `surat_balasan` varchar(255) NOT NULL,
  `siswa_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`siswa_id`, `siswa_nama`, `siswa_kelas`, `siswa_telepon`, `siswa_alamat`, `nama_perusahaan`, `alamat_perusahaan`, `surat_permohonan`, `surat_balasan`, `siswa_code`) VALUES
(7, 'Asep S', 'XI - MM1', '08123445', 'Jln. Jauush', 'PT. Batu Alam', 'Jl. Kauuaua', 'terkirim', 'diterima', 'HwwrgCE8VI0aGH0kaAyAua2qz0TS0Y'),
(8, 'Danang', 'XI - MM3', '08125656565656', 'Jln. Gunung Baba', 'PT. Kitakai', 'Jl. Kakakaka', 'terkirim', 'belum diterima', '9U2UhZFdOPo4v5pP4cAKhtzV79TvsP'),
(9, 'Gabaw', 'XI - MM2', '081336636373', 'Jl. Bunga haa', 'PT. Karya kasaj', 'Jl. Kaiauua', 'terkirim', 'diterima', 'un05G0qdRKXXpUGqIA8SvBwMN8BgSJ'),
(10, 'Anto Harto', 'XI - RPL2', '08123746473637', 'Jl. Kii Juah 12', 'PT Kreasi Kita', 'Jl. Kaiauua ', 'belum terkirim', 'belum diterima', 'isUbI8DYAXOa7kggYNsfjLFCr18N5g');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `active` enum('1','0') DEFAULT '1',
  `user_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama_lengkap`, `level`, `active`, `user_code`) VALUES
(1, 'admin', '$2y$10$ujgW/t6KYxOSrefg0UNeiOCF3VvSlBfzE4MXdhefNi8aBadKtXcLW', 'Administrator', 1, '1', '61lzstgb432utmwze5lh'),
(5, 'guru2', '$2y$10$AHLphS9ovj/i55/zHehOEOHeQMmSCjBigabzXIPMEaXuslpmB5TRa', 'Guru Dua', 2, '1', 'ixmH4UiVFebLh7D23pzxdqhE1hqJnz'),
(7, 'guru1', '$2y$10$Oc5QJuETsc/DRf350IuEL.oBzRJIw31dCP7MdvfRt8ALDWy01ZWwO', 'Guru Satu', 2, '1', 'wgnMYivQIlinY7be2qe6R5QZGvyXyM'),
(9, 'jaya', '$2y$10$78dZbIGvOMMsDlM3arK2NOC7J7V7A8cnSH6ScdCYDaALZI0yxb7Q6', 'Jaya Karta', 1, '1', 'wd5O7BSrAjKdPrRZYVMdQqsRaws62f');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_group`
--
ALTER TABLE `tb_group`
  ADD PRIMARY KEY (`group_id`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`siswa_id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `level` (`level`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_group`
--
ALTER TABLE `tb_group`
  MODIFY `group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `siswa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`level`) REFERENCES `tb_group` (`group_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
