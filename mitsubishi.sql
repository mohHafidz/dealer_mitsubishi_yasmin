-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2022 at 07:09 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitsubishi`
--

-- --------------------------------------------------------

--
-- Table structure for table `antri`
--

CREATE TABLE `antri` (
  `id` int(11) NOT NULL,
  `mobilmasuk` time NOT NULL,
  `antrian` int(11) NOT NULL,
  `plat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `data_rekap`
--

CREATE TABLE `data_rekap` (
  `id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `waktu_selesai` time NOT NULL,
  `note` text NOT NULL,
  `cuci` varchar(255) NOT NULL,
  `mobilmasuk` time NOT NULL,
  `antrian` int(11) NOT NULL,
  `plat` varchar(255) NOT NULL,
  `namaPE` varchar(255) NOT NULL,
  `namaSA` varchar(255) NOT NULL,
  `stall` varchar(255) NOT NULL,
  `estimasi` time NOT NULL,
  `pengerjaan` time NOT NULL,
  `stallin` time NOT NULL,
  `stallout` time NOT NULL,
  `FCin` time NOT NULL,
  `FCout` time NOT NULL,
  `cuciin` time NOT NULL,
  `cuciout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_rekap`
--

INSERT INTO `data_rekap` (`id`, `tanggal`, `waktu_selesai`, `note`, `cuci`, `mobilmasuk`, `antrian`, `plat`, `namaPE`, `namaSA`, `stall`, `estimasi`, `pengerjaan`, `stallin`, `stallout`, `FCin`, `FCout`, `cuciin`, `cuciout`) VALUES
(64, '2022-07-07', '13:29:00', '1.ganti oli', 'C', '13:01:00', 1, 'F1196DN', 'Andri Nurahman', 'Embib Muhammad Ishak', 'stall 8', '13:00:00', '00:25:00', '13:03:00', '13:20:00', '13:22:00', '13:25:00', '13:26:00', '13:28:00'),
(65, '2022-07-07', '13:33:00', '1.ganti oli', 'C', '13:02:00', 2, 'B1731KB', 'Ariswanto', 'Sarah', 'stall 10', '18:00:00', '00:12:00', '13:21:00', '13:22:00', '13:25:00', '13:26:00', '13:29:00', '13:33:00');

-- --------------------------------------------------------

--
-- Table structure for table `data_sementara`
--

CREATE TABLE `data_sementara` (
  `id` int(11) NOT NULL,
  `ket` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `jenis_service` varchar(100) NOT NULL,
  `cuci` varchar(255) NOT NULL,
  `status_car` varchar(255) NOT NULL,
  `mobilmasuk` time NOT NULL,
  `antrian` int(11) NOT NULL,
  `plat` varchar(255) NOT NULL,
  `namaPE` varchar(255) NOT NULL,
  `namaSA` varchar(255) NOT NULL,
  `stall` varchar(255) NOT NULL,
  `estimasi` time NOT NULL,
  `stallin` time NOT NULL,
  `stallout` time NOT NULL,
  `FCin` time NOT NULL,
  `FCout` time NOT NULL,
  `cuciin` time NOT NULL,
  `cuciout` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_sementara`
--

INSERT INTO `data_sementara` (`id`, `ket`, `note`, `jenis_service`, `cuci`, `status_car`, `mobilmasuk`, `antrian`, `plat`, `namaPE`, `namaSA`, `stall`, `estimasi`, `stallin`, `stallout`, `FCin`, `FCout`, `cuciin`, `cuciout`) VALUES
(125, 'Pending Final Checker', '1.ganti oli', 'SVC', 'C', 'pengerjaan telah selesai dari  stall 5', '10:35:00', 1, 'F 1196 DN', 'Ariswanto', 'Ridwan Firdaus Setiawan', 'stall 5', '12:00:00', '10:35:00', '10:35:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00'),
(126, 'Pending Final Checker', 'ganti oli', 'SVC', 'C', 'pengerjaan telah selesai dari  stall 6', '14:04:00', 1, 'f1196dn', 'Ariswanto', 'Embib Muhammad Ishak', 'stall 6', '16:00:00', '14:05:00', '14:05:00', '00:00:00', '00:00:00', '00:00:00', '00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `antri`
--
ALTER TABLE `antri`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rekap`
--
ALTER TABLE `data_rekap`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_sementara`
--
ALTER TABLE `data_sementara`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `antri`
--
ALTER TABLE `antri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `data_rekap`
--
ALTER TABLE `data_rekap`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `data_sementara`
--
ALTER TABLE `data_sementara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
