-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 30, 2023 at 08:40 AM
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
-- Database: `db_toko`
--

-- --------------------------------------------------------

--
-- Table structure for table `db_barang`
--

CREATE TABLE `db_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(128) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_barang`
--

INSERT INTO `db_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(2, 'Minyak', 'Minyak Goreng 2L', 'Sembako', 20000, 10, 'Minyak.jpeg'),
(3, 'Mie', 'Semua Varian Mie ', 'Sembako', 3000, 20, 'mie.jpeg'),
(4, 'Fanta', 'Fanta 2L', 'Minuman', 15000, 14, 'fanta.jpg'),
(5, 'Good Time', 'Biscuit Good Time', 'Makanan', 9000, 20, 'good_time.jpeg'),
(7, 'Beras', 'Beras 3Kg', 'Sembako', 20000, 20, 'beras3.jpeg'),
(8, 'Piattos', 'piattos besar', 'makanan', 11000, 30, 'piattos1.jpg'),
(9, 'Teh Pucuk', 'Botol', 'minuman', 5000, 50, 'teh_pucuk1.jpeg'),
(10, 'Telur', 'Telor 1Kg', 'Sembako', 14000, 50, 'Telur1.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `db_info`
--

CREATE TABLE `db_info` (
  `id` int(11) NOT NULL,
  `nama` varchar(70) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_info`
--

INSERT INTO `db_info` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Muhammad Farhan Ramdani', 'Margahayu', '2023-06-25 14:23:45', '2023-06-26 14:23:45'),
(2, 'budi', 'duren jaya', '2023-06-25 15:28:04', '2023-06-26 15:28:04'),
(3, '', '', '2023-06-26 13:50:12', '2023-06-27 13:50:12');

-- --------------------------------------------------------

--
-- Table structure for table `db_pesanan`
--

CREATE TABLE `db_pesanan` (
  `id` int(11) NOT NULL,
  `id_info` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(60) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_pesanan`
--

INSERT INTO `db_pesanan` (`id`, `id_info`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 4, 'Fanta', 1, 15000, ''),
(2, 1, 3, 'Mie', 1, 3000, ''),
(3, 1, 5, 'Good Time', 1, 9000, ''),
(4, 2, 4, 'Fanta', 1, 15000, ''),
(5, 2, 3, 'Mie', 1, 3000, ''),
(6, 2, 5, 'Good Time', 1, 9000, ''),
(7, 3, 4, 'Fanta', 1, 15000, '');

--
-- Triggers `db_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `db_pesanan` FOR EACH ROW BEGIN
	UPDATE db_barang set stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `db_user`
--

CREATE TABLE `db_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `db_user`
--

INSERT INTO `db_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'user', 'user', '123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(5, 'farhan ramdani', 'farhan.rmdni07@gmail.com', 'default.jpg', '$2y$10$OSk1YQS/pHQfDevfTjBpR.yTaXII6ZxiDs64CotPkloU6d9wVWywS', 1, 1, 1685942305),
(6, 'James', 'james@gmail.com', 'default.jpg', '$2y$10$86p7.gruShTxam4zNg.h4OxyU26PQX9kcc9iHpngFTcqj4e2EJlei', 2, 1, 1687194394),
(7, 'farhan', 'farhan.rmdni07@bsi.ac.id', 'default.jpg', '$2y$10$YJ4eysQdGyLFPxOU80VRnudW6L6rB6WwGV4MKbniAelfH8uNc4TaO', 2, 1, 1688106488);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `db_barang`
--
ALTER TABLE `db_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indexes for table `db_info`
--
ALTER TABLE `db_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_pesanan`
--
ALTER TABLE `db_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `db_user`
--
ALTER TABLE `db_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `db_barang`
--
ALTER TABLE `db_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `db_info`
--
ALTER TABLE `db_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `db_pesanan`
--
ALTER TABLE `db_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `db_user`
--
ALTER TABLE `db_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
