-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 26, 2023 at 04:30 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aeni_kasir`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama`) VALUES
(1, 'Minuman'),
(2, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(11) NOT NULL,
  `nama_menu` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL,
  `gambar` text NOT NULL,
  `stock` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `nama_menu`, `harga`, `gambar`, `stock`, `kategori_id`) VALUES
(1, 'a', 23, '044788300_1649730758-shutterstock_2023551554.webp', 32, 2),
(3, 'a', 111, '3991499229.jpg', 111, 2),
(4, 'rerere', 222, 'dca21bf3-923c-486f-bc2e-a3dcd759b1df.jpeg', 111, 1),
(5, 'rerere', 222, '044788300_1649730758-shutterstock_2023551554.webp', 111, 2),
(6, 'rerere', 222, 'Homemade-Caramel-Frappe-with-Chocolate-Chips-500x500.png', 3, 2),
(7, 'rerere', 111, '3991499229.jpg', 111, 1),
(8, 'rerere', 111, 'dca21bf3-923c-486f-bc2e-a3dcd759b1df.jpeg', 3, 2),
(9, 'rerere', 222, 'download.jpg', 111, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pelayans`
--

CREATE TABLE `pelayans` (
  `id` int(11) NOT NULL,
  `pelayan_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelayans`
--

INSERT INTO `pelayans` (`id`, `pelayan_nama`) VALUES
(1, 'Tae Chun'),
(2, 'Jung Kuk');

-- --------------------------------------------------------

--
-- Table structure for table `pesanans`
--

CREATE TABLE `pesanans` (
  `id` int(11) NOT NULL,
  `nama_pelanggan` varchar(110) NOT NULL,
  `table_id` int(11) NOT NULL,
  `pelayan_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `total` int(50) NOT NULL,
  `bayar` enum('sudah','belum') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanans`
--

INSERT INTO `pesanans` (`id`, `nama_pelanggan`, `table_id`, `pelayan_id`, `tanggal`, `total`, `bayar`) VALUES
(12, 'bbbbb', 2, 1, '2023-02-26', 333, 'belum'),
(13, 'nasir', 1, 1, '2023-02-26', 222, 'belum');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_details`
--

CREATE TABLE `pesanan_details` (
  `id` int(11) NOT NULL,
  `pesanan_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan_details`
--

INSERT INTO `pesanan_details` (`id`, `pesanan_id`, `menu_id`, `jumlah`) VALUES
(12, 12, 4, 1),
(13, 12, 7, 1),
(14, 13, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `id` int(11) NOT NULL,
  `table_nama` varchar(100) NOT NULL,
  `status` enum('kosong','terisi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`id`, `table_nama`, `status`) VALUES
(1, '001', 'kosong'),
(2, '002', 'kosong');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `role` enum('admin','kasir') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Nabilah', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'Melodi', 'kasir', 'c7911af3adbd12a035b289556d96470a', 'kasir');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indexes for table `pelayans`
--
ALTER TABLE `pelayans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`table_id`,`pelayan_id`),
  ADD KEY `pelayan_id` (`pelayan_id`);

--
-- Indexes for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pesanan_id` (`pesanan_id`,`menu_id`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelayans`
--
ALTER TABLE `pelayans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pesanan_details`
--
ALTER TABLE `pesanan_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `menus`
--
ALTER TABLE `menus`
  ADD CONSTRAINT `menus_ibfk_1` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_ibfk_2` FOREIGN KEY (`pelayan_id`) REFERENCES `pelayans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pesanans_ibfk_3` FOREIGN KEY (`table_id`) REFERENCES `tables` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
