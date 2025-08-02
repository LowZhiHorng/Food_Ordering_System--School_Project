-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 02, 2025 at 10:31 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spp_sateking`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `login_id` varchar(50) NOT NULL,
  `kata_laluan` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`login_id`, `kata_laluan`, `nama`) VALUES
('admin', '@9485_/4#', 'LOW ZHI HORNG'),
('staf1', '11111', 'Ali'),
('staf2', '22222', 'Kah Meng'),
('staf3', '33333', 'Muthu');

-- --------------------------------------------------------

--
-- Table structure for table `makanan`
--

CREATE TABLE `makanan` (
  `kodMakanan` varchar(3) NOT NULL,
  `makanan` varchar(255) NOT NULL,
  `harga` double NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `login_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `makanan`
--

INSERT INTO `makanan` (`kodMakanan`, `makanan`, `harga`, `gambar`, `login_id`) VALUES
('A01', 'Sate Ayam', 2, 'sateAyam.jpg', 'admin'),
('A02', 'Sate Kambing', 3, 'sateKambing.jpg', 'admin'),
('A03', 'Sate Lembu', 3, 'sateLembu.jpg', 'admin'),
('A04', 'Sate Ikan', 2, 'sateIkan.jpeg', 'admin'),
('A05', 'Sate Sotong', 3, 'sateSotong.jpg', 'admin'),
('A06', 'Sate Babi', 3, 'sateBabi.jpg', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `maklumat_pesanan`
--

CREATE TABLE `maklumat_pesanan` (
  `noPesanan` varchar(5) NOT NULL,
  `kodMakanan` varchar(3) NOT NULL,
  `kuantiti` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `maklumat_pesanan`
--

INSERT INTO `maklumat_pesanan` (`noPesanan`, `kodMakanan`, `kuantiti`) VALUES
('0001', 'A01', 5),
('0001', 'A02', 10),
('0002', 'A01', 13),
('0002', 'A06', 7),
('0003', 'A02', 6),
('0003', 'A04', 7),
('0004', 'A03', 6);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `noTelefon` varchar(12) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`noTelefon`, `nama`) VALUES
('011-11111111', 'Zhi Yang'),
('012-3456789', 'Jun Qi');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `noPesanan` varchar(5) NOT NULL,
  `tarikh` date NOT NULL,
  `noTelefon` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`noPesanan`, `tarikh`, `noTelefon`) VALUES
('0001', '2025-04-07', '011-11111111'),
('0002', '2025-08-02', '011-11111111'),
('0003', '2025-08-02', '012-3456789'),
('0004', '2025-08-02', '011-11111111');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `makanan`
--
ALTER TABLE `makanan`
  ADD PRIMARY KEY (`kodMakanan`),
  ADD KEY `login_id` (`login_id`);

--
-- Indexes for table `maklumat_pesanan`
--
ALTER TABLE `maklumat_pesanan`
  ADD UNIQUE KEY `noPesanan` (`noPesanan`,`kodMakanan`),
  ADD KEY `kodMakanan` (`kodMakanan`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`noTelefon`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`noPesanan`),
  ADD KEY `noTelefon` (`noTelefon`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `makanan`
--
ALTER TABLE `makanan`
  ADD CONSTRAINT `makanan_ibfk_1` FOREIGN KEY (`login_id`) REFERENCES `admin` (`login_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `maklumat_pesanan`
--
ALTER TABLE `maklumat_pesanan`
  ADD CONSTRAINT `maklumat_pesanan_ibfk_1` FOREIGN KEY (`noPesanan`) REFERENCES `pesanan` (`noPesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `maklumat_pesanan_ibfk_2` FOREIGN KEY (`kodMakanan`) REFERENCES `makanan` (`kodMakanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`noTelefon`) REFERENCES `pelanggan` (`noTelefon`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
