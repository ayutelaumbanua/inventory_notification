-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2023 at 11:33 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_inventori`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `kode_barang` varchar(20) NOT NULL,
  `kategori_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `stok` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT current_timestamp(),
  `tgl_edit` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `kategori_barang`, `nama_barang`, `stok`, `satuan`, `tgl_daftar`, `tgl_edit`) VALUES
(40, 'BRG33567785', 'Daging', 'Ikan Segar', 4, 'Kg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(41, 'BRG26516386', 'Buah', 'Pear Ausi', 13, 'Kg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(43, 'BRG24101381', 'Minuman', 'Aqua 500mil', 13, 'Pcs', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'BRG28231231', 'Buah', 'Jambu', 2, 'Pcs', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'BRG77025938', 'Buah', '9', 0, 'Pcs', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'BRG83799646', 'Daging', 'pol', 90, 'Kg', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(47, 'BRG36669550', 'Minuman', 'Bir', 2, 'Pcs', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(48, 'BRG1556032', 'Buah', '28478247', 91, 'Pcs', '2023-04-03 11:51:55', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama`, `email`, `telepon`, `alamat`, `tgl_daftar`) VALUES
(19, 'Kirana', 'kiran@gmail.com', '09723263263', 'Batam\r\n\r\n', '2023-04-03 11:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `data_usaha`
--

CREATE TABLE `data_usaha` (
  `id` int(11) NOT NULL,
  `nama_usaha` varchar(80) NOT NULL,
  `nama_pemilik` varchar(80) NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_usaha`
--

INSERT INTO `data_usaha` (`id`, `nama_usaha`, `nama_pemilik`, `no_telepon`, `alamat`) VALUES
(1, 'PT XYZ', 'Sanjaya Putra', '0812997645355', 'Jl. Raja Haji Fisabilillah, Century Park Blok C No. 5 & 6, Teluk Tering, Batam Kota\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `detail_penerimaan`
--

CREATE TABLE `detail_penerimaan` (
  `no_terima` varchar(25) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `tgl_expired` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_penerimaan`
--

INSERT INTO `detail_penerimaan` (`no_terima`, `nama_barang`, `jumlah`, `satuan`, `tgl_expired`) VALUES
('TR1680064242', 'Sapi', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680064242', 'Ikan Segar', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680064242', 'Pear Ausi', 10, 'Kg', '0000-00-00 00:00:00'),
('TR1680170526', 'Ikan Segar', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680170526', 'Aqua 500mil', 10, 'Pcs', '0000-00-00 00:00:00'),
('TR1680414572', 'Ikan Segar', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680414572', 'Pear Ausi', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680414834', 'Ikan Segar', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680414834', 'Pear Ausi', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680504086', 'Pear Ausi', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680504483', 'Pear Ausi', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680504625', 'Aqua 500mil', 1, 'Pcs', '0000-00-00 00:00:00'),
('TR1680504856', 'Aqua 500mil', 1, 'Pcs', '0000-00-00 00:00:00'),
('TR1680506485', 'Pear Ausi', 1, 'Kg', '2023-04-12 00:00:00'),
('TR1680506485', 'pol', 1, 'Kg', '2023-04-15 00:00:00'),
('TR1680506567', 'Pear Ausi', 1, 'Kg', '2023-04-05 00:00:00'),
('TR1680506621', 'Pear Ausi', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680506711', 'Pear Ausi', 1, 'Kg', '0000-00-00 00:00:00'),
('TR1680506901', 'Pear Ausi', 1, 'Kg', '2023-04-13 00:00:00'),
('TR1680508005', 'Jambu', 1, 'Pcs', '2023-04-03 00:00:00'),
('TR1680522359', 'Ikan Segar', 1, 'Kg', '2023-04-04 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengeluaran`
--

CREATE TABLE `detail_pengeluaran` (
  `no_keluar` varchar(25) NOT NULL,
  `nama_barang` varchar(80) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `satuan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_pengeluaran`
--

INSERT INTO `detail_pengeluaran` (`no_keluar`, `nama_barang`, `jumlah`, `satuan`) VALUES
('', 'Pear Ausi', 1, 'Kg');

-- --------------------------------------------------------

--
-- Table structure for table `penerimaan`
--

CREATE TABLE `penerimaan` (
  `id` int(11) NOT NULL,
  `no_terima` varchar(25) NOT NULL,
  `tgl_terima` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_supplier` varchar(80) NOT NULL,
  `nama_petugas` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penerimaan`
--

INSERT INTO `penerimaan` (`id`, `no_terima`, `tgl_terima`, `nama_supplier`, `nama_petugas`) VALUES
(54, 'TR1680506901', '2023-04-03 14:28:21', 'Budiman', 'Winner'),
(55, 'TR1680508005', '2023-04-03 14:46:45', 'Budiman', 'Winner'),
(56, 'TR1680522359', '2023-04-03 18:45:59', 'Budiman', 'Winner');

-- --------------------------------------------------------

--
-- Table structure for table `pengeluaran`
--

CREATE TABLE `pengeluaran` (
  `id` int(11) NOT NULL,
  `no_keluar` varchar(25) DEFAULT NULL,
  `tgl_keluar` datetime NOT NULL DEFAULT current_timestamp(),
  `nama_customer` varchar(80) NOT NULL,
  `nama_petugas` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(25) NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `satuan`, `tgl_daftar`) VALUES
(14, 'Pcs', '2023-04-03 12:07:24'),
(15, 'mil', '2023-04-03 12:07:30'),
(16, 'Pcs', '2023-04-03 12:07:38'),
(17, 'Kg', '2023-04-03 12:07:55'),
(18, 'Ons', '2023-04-03 12:08:11');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `nama` varchar(80) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `tgl_daftar` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id`, `nama`, `email`, `telepon`, `alamat`, `tgl_daftar`) VALUES
(9, 'Budiman', 'sfdsfs@gmail.com', '924729', 'snsjndjs', '2023-04-03 11:47:50');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(16) NOT NULL,
  `level` varchar(20) NOT NULL,
  `status` varchar(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `telepon`, `level`, `status`, `username`, `password`) VALUES
(1, 'Winner', 'winner@gmail.com', '0986512442', 'Manager', 'Aktif', 'win123', 'win123'),
(2, 'Melani', 'melani123@gmail.com', '0986512442', 'Purchasing', 'Aktif', 'melani123', 'melani123'),
(3, 'Kornel', 'kornel235@gmail.com', '3973753975', 'Staff Gudang', 'Tidak Aktif', 'kornel', '123459'),
(7, 'Gita', 'gita_gh@gmail.com', '09817267162', 'Manager', 'Aktif', 'gita_123', 'gita1234'),
(8, 'xckmksc', 'sdjndn@gmail.com', '24729742', 'Manager', 'Aktif', 'sjdnjsn', 'sdsss'),
(9, '34343', 'sds@njsdn', '3434', 'Purchasing', 'Tidak Aktif', '4343', '3434'),
(10, 'Staff Gudang1', '2424@gmail.vom', '2424', 'Staff Gudang', 'Aktif', 'Staff Gudang1', '12345'),
(11, 'tes124', '3243@gmail.vom', '3434', 'Manager', 'Tidak Aktif', 'rwrwr', 'erere');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_usaha`
--
ALTER TABLE `data_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerimaan`
--
ALTER TABLE `penerimaan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_terima` (`no_terima`);

--
-- Indexes for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `no_keluar` (`no_keluar`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `data_usaha`
--
ALTER TABLE `data_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `penerimaan`
--
ALTER TABLE `penerimaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pengeluaran`
--
ALTER TABLE `pengeluaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
