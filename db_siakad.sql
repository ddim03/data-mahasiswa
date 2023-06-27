-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 27, 2023 at 03:12 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `nim` varchar(10) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jen_kel` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `kode_prodi` varchar(10) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`nim`, `nama_lengkap`, `jen_kel`, `alamat`, `no_hp`, `kode_prodi`, `kelas`, `foto`) VALUES
('1234567891', 'Andi Susilo', 'Laki-Laki', 'Jl. Merdeka No. 10, Jakarta', '081234567890', '474010', '1-E', '64991a2085b04.jpg'),
('2231730060', 'Dimas Gilang Dwi Aji', 'Laki-Laki', 'Jl.Bok Brobos Ngadiluwih', '0856345860365', '474034', '1-E', '64996965abdb4.jpg'),
('2345678903', 'Budi Pratama', 'Laki-Laki', 'Jl. Pahlawan No. 15, Surabaya', '081345678912', '474028', '1-D', '64991a95eda29.jpg'),
('3456789125', 'Dedi Firmansyah', 'Laki-Laki', 'Jl. Veteran No. 8, Bandung', '081456789123', '474029', '1-A', '64991b273791b.jpg'),
('4567890127', 'Rudi Santoso', 'Laki-Laki', 'Jl. Sudirman No. 30, Jakarta', '081567890123', '474011', '1-C', '64991c2bc711c.jpg'),
('5678901239', 'Agus Priyanto', 'Laki-Laki', 'Jl. Diponegoro No. 18, Surabaya', '081678901234', '474020', '1-C', '649933129cac6.jpg'),
('6789123456', 'Siti Rahmawati', 'Perempuan', 'Jl. Ahmad Yani No. 25, Surabaya', '087891234567', '474010', '1-B', '64991b767a2e5.jpg'),
('7654321094', 'Rina Wijaya', 'Perempuan', 'Jl. Diponegoro No. 20, Yogyakarta', '087654321012', '474028', '1-E', '64991accc78f8.jpg'),
('7890123458', 'Ani Permata Sari', 'Perempuan', 'Jl. Gajah Mada No. 12, Yogyakarta', '087891234567', '474029', '1-B', '64992c8267eff.jpg'),
('8901234564', 'Rini Agustina', 'Perempuan', 'Jl. Cendrawasih No. 6, Bandung', '087890123456', '474034', '1-D', '649933592bf23.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE `prodi` (
  `kode_prodi` varchar(10) NOT NULL,
  `nama_prodi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`kode_prodi`, `nama_prodi`) VALUES
('474005', 'D-IV Teknik Informatika'),
('474010', 'D-IV Teknik Elektronika'),
('474011', 'D-IV Teknik Mesin Produksi dan Perawatan'),
('474020', 'D-IV Keuangan'),
('474028', 'D-III Akuntansi'),
('474029', 'D-III Teknik Mesin'),
('474034', 'D-III Manajemen Informatika');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD KEY `kode_prodi` (`kode_prodi`);

--
-- Indexes for table `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`kode_prodi`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_1` FOREIGN KEY (`kode_prodi`) REFERENCES `prodi` (`kode_prodi`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
