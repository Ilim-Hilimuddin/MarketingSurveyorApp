-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 17, 2024 at 04:12 PM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u202225943_survey_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_barang` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`) VALUES
('BRG-001', 'KOPI ABC'),
('BRG-002', 'KOPI TOP'),
('BRG-003', 'SIRUP ABC'),
('BRG-004', 'SARIMI KARI AYAM'),
('BRG-005', 'GULA PASIR'),
('BRG-006', 'BERAS PANDAN WANGI'),
('BRG-007', 'KECAP ABC'),
('BRG-008', 'SAOS SAMBAL INDOFOOD '),
('BRG-009', 'INDOMIE KARI AYAM'),
('BRG-010', 'BERAS ROJO LELE'),
('BRG-011', 'INDOMIE SOTO AYAM'),
('BRG-012', 'INDOMIE GORENG DUO'),
('BRG-013', 'SARIMIE KARI AYAM'),
('BRG-014', 'SHAMPO EMERON'),
('BRG-015', 'SABUN LIFEBOY'),
('BRG-016', 'KOPI TORABIKA DUO'),
('BRG-017', 'MINYAK GORENG SEHAT'),
('BRG-018', 'MINYAK GORENG BIMOLI'),
('BRG-019', 'MINYAK GORENG SANIA'),
('BRG-020', 'LUWAK WHITE COFFE');

-- --------------------------------------------------------

--
-- Table structure for table `lokasi`
--

CREATE TABLE `lokasi` (
  `id_lokasi` varchar(10) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `lokasi`
--

INSERT INTO `lokasi` (`id_lokasi`, `nama_lokasi`) VALUES
('LOK-001', 'HARI-HARI JELAMBAR'),
('LOK-002', 'INDOMARET TEGAL ALUR 2'),
('LOK-003', 'ALFAMART KALIDERES 1'),
('LOK-004', 'ALFAMIDI PEKAYON TIMUR'),
('LOK-005', 'GIANT BINTARO'),
('LOK-007', 'RAMAYANA CENGKARENG'),
('LOK-008', 'MATAHARI CENGKARENG'),
('LOK-010', 'FRESHMART TEGAL ALUR 1');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `nama_role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `id_barang` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'TERHAPUS',
  `id_lokasi` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tgl_transaksi` varchar(25) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `isRepeatOrder` int(11) DEFAULT 0,
  `hasil_transaksi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_barang`, `id_lokasi`, `tgl_transaksi`, `jumlah`, `isRepeatOrder`, `hasil_transaksi`) VALUES
('TRS/SLS-001/0001', 'SLS-001', 'BRG-011', 'LOK-001', '2024-04-28', 200, 1, 'Transaksi OK'),
('TRS/SLS-001/0002', 'SLS-001', 'BRG-019', 'LOK-001', '2024-07-13', 500, 1, 'Surver dapat dilakukan dengan baik'),
('TRS/SLS-001/0003', 'SLS-001', 'BRG-005', 'LOK-002', '2024-04-05', 360, 1, ''),
('TRS/SLS-001/0004', 'SLS-001', 'BRG-004', 'LOK-003', '2024-04-12', 500, 0, ''),
('TRS/SLS-001/0005', 'SLS-001', 'BRG-020', 'LOK-003', '2024-04-19', 455, 1, ''),
('TRS/SLS-001/0006', 'SLS-001', 'BRG-011', 'LOK-005', '2024-04-19', 525, 1, ''),
('TRS/SLS-001/0007', 'SLS-001', 'BRG-004', 'LOK-004', '2024-04-25', 325, 1, ''),
('TRS/SLS-001/0008', 'SLS-001', 'BRG-016', 'LOK-003', '2024-07-12', 575, 1, ''),
('TRS/SLS-001/0009', 'SLS-001', 'BRG-016', 'LOK-002', '2024-04-20', 425, 1, 'Survey telah dilakukan dengan baik '),
('TRS/SLS-001/0010', 'SLS-001', 'BRG-005', 'LOK-002', '2024-04-23', 255, 1, ''),
('TRS/SLS-001/0011', 'SLS-001', 'BRG-015', 'LOK-005', '2024-07-13', 275, 1, ''),
('TRS/SLS-001/0013', 'SLS-001', 'BRG-017', 'LOK-003', '2024-04-20', 350, 1, ''),
('TRS/SLS-001/0021', 'SLS-001', 'BRG-014', 'LOK-003', '2024-04-27', 125, 1, ''),
('TRS/SLS-001/0025', 'SLS-001', 'BRG-019', 'LOK-003', '2024-05-04', 220, 1, ''),
('TRS/SLS-002/0002', 'SLS-002', 'BRG-004', 'LOK-004', '2024-04-19', 500, 1, ''),
('TRS/SLS-002/0003', 'SLS-002', 'BRG-015', 'LOK-005', '2024-04-20', 375, 1, ''),
('TRS/SLS-002/0004', 'SLS-002', 'BRG-010', 'LOK-005', '2024-07-12', 250, 0, 'Survey berhasil dilakukan'),
('TRS/SLS-002/0005', 'SLS-002', 'BRG-009', 'LOK-008', '2024-07-15', 650, 1, 'Transaksi berhasil'),
('TRS/SLS-002/0008', 'SLS-002', 'BRG-019', 'LOK-001', '2024-07-13', 800, 0, ''),
('TRS/SLS-002/0009', 'SLS-002', 'BRG-003', 'LOK-002', '2024-04-23', 550, 1, ''),
('TRS/SLS-002/0010', 'SLS-002', 'BRG-018', 'LOK-002', '2024-04-19', 125, 1, ''),
('TRS/SLS-003/0001', 'SLS-003', 'BRG-015', 'LOK-010', '2024-07-12', 250, 1, 'Survey berhasil dibuat'),
('TRS/SLS-003/0002', 'SLS-003', 'BRG-006', 'LOK-002', '2024-07-15', 650, 1, 'Transaksi ok'),
('TRS/SLS-003/0003', 'SLS-003', 'BRG-005', 'LOK-001', '2024-07-15', 255, 0, 'Transaksi sekali'),
('TRS/SLS-003/0004', 'SLS-003', 'BRG-009', 'LOK-003', '2024-07-12', 300, 1, ''),
('TRS/SLS-003/0006', 'SLS-003', 'BRG-014', 'LOK-003', '2024-07-05', 200, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` varchar(10) NOT NULL,
  `id_role` int(11) NOT NULL,
  `nama_lengkap` varchar(150) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `id_role`, `nama_lengkap`, `jenis_kelamin`, `tgl_lahir`, `alamat`, `telepon`, `email`, `password`, `foto`) VALUES
('ADM-001', 1, 'ILIM HILIMUDIN', 'Laki-laki', '1977-07-17', 'Jl. Permata, Jakarta Barat', '085714260617', 'hilimuddin@gmail.com', '$2y$10$xG2p8qEQeeAG2RY4IcAgbOSFiiP.j0UDv1S/APGZJAUgTiK.LR8ve', '1720797261_6c49e1ff8062cee222e5.jpg'),
('ADM-002', 1, 'FERRY ANDRIAWAN', 'Laki-laki', '2024-04-01', 'Jakarta', '085714260617', 'ferry@gmail.com', '$2y$10$PX9WW8yiPdgz3U2mPcZd8Ob3lBRZCmHGxbH9qRDOcJDEzn9kZhWgS', '1720802726_c0c37ac5efdef722d9b9.jpg'),
('ADM-003', 1, 'DICKY ALFIANSYAH', 'Laki-laki', '2024-07-13', 'Jl.tambun permata, bekasi utara', '081617698003', 'dicky@gmail.com', '$2y$10$04C0bMa6GAmonDzNr7uBDOhdDmZLIPPz8aYMCpNqakLYGa4hN3PjO', '1720847757_1cb1ee30b31cf377a31d.jpg'),
('SLS-001', 2, 'DESSY', 'Perempuan', '2024-04-19', 'Jl. Kopling Motor Karatanan', '9832738273282', 'dessy@gmail.com', '$2y$10$SRsQ7owhP9hQZ7gWe0/71eM92lgNjSlMaqYT5RjWvo8Kzqw.sQTPO', 'default.jpg'),
('SLS-002', 2, 'JAMAL', 'Perempuan', '2024-04-19', 'Jl. Kulit melinjo', '01212989424', 'jamal@gmail.com', '$2y$10$eyhf/r010KoUyhJniASQdO7Mjjf/47yhc.1BQmgQ7t8yEA1TCAj6i', 'default.jpg'),
('SLS-003', 2, 'ARDITA', 'Perempuan', '2024-07-07', 'Jl. Mampang Prapatan IX RT/RW 006/01 No. 43\r\nKel. tegal Parang\r\nKec. Mampang Prapatan\r\nJakarta Selatan\r\nDKI Jakarta', '1231313', 'sales@gmail.com', '$2y$10$Bi/Lbw3z6Ihf4O5bfPs7rOWAHpwGORU9WEcRTsLgwroG5kBX8SMyG', 'default.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_barang` (`id_barang`),
  ADD KEY `fk_lokasi` (`id_lokasi`),
  ADD KEY `fk_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
