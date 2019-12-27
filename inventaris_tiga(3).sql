-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 27, 2019 at 08:42 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris_tiga`
--

-- --------------------------------------------------------

--
-- Table structure for table `activation`
--

CREATE TABLE `activation` (
  `id` int(11) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activation`
--

INSERT INTO `activation` (`id`, `active`) VALUES
(1, 'Y'),
(2, 'N');

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` int(11) NOT NULL,
  `barcode` varchar(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `merk` varchar(128) NOT NULL,
  `model` varchar(128) NOT NULL,
  `id_kondisi` int(11) NOT NULL,
  `id_lokasi` int(11) NOT NULL,
  `dtl_lokasi` text NOT NULL,
  `tgl_masuk` int(11) DEFAULT NULL,
  `sumber` varchar(128) NOT NULL,
  `gambar` varchar(128) DEFAULT NULL,
  `created` varchar(128) NOT NULL,
  `updated` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `barcode`, `nama_barang`, `merk`, `model`, `id_kondisi`, `id_lokasi`, `dtl_lokasi`, `tgl_masuk`, `sumber`, `gambar`, `created`, `updated`) VALUES
(39, 'A003', '1', 'ee', 'eee', 1, 39, 'ddd', NULL, 'dd', 'inventory-smkniu-191121-ca250ff032.png', '2019-10-20 07:47:13', '2019-11-21 08:54:06'),
(41, 'A004', '1', 'ss', 'ss', 1, 32, 'ss', NULL, 'ss', 'inventory-smkniu-191121-2f87498e52.png', '2019-10-20 09:30:44', '2019-11-21 07:55:43'),
(42, 'A005', '2', '-', 'Single', 2, 39, 's', NULL, 's', 'inventory-smkniu-191027-4793b5e72c.png', '2019-10-27 06:19:13', ''),
(43, 'A006', '3', '-', 'Sandaran belakang', 2, 40, 'b', NULL, 'f', 'inventory-smkniu-191121-3ee96a8636.png', '2019-11-21 07:57:19', '2019-11-21 08:53:31'),
(44, 'A002', '4', '-', 'a', 1, 31, 's', NULL, 'ss', 'inventory-smkniu-191121-f5026f61a5.png', '2019-11-21 07:58:15', '2019-11-21 08:53:00');

-- --------------------------------------------------------

--
-- Table structure for table `barang_kategori`
--

CREATE TABLE `barang_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_kategori`
--

INSERT INTO `barang_kategori` (`id`, `kategori`) VALUES
(1, 'Meja Siswa'),
(2, 'Meja Guru'),
(3, 'Kursi siswa'),
(4, 'Kursi guru');

-- --------------------------------------------------------

--
-- Table structure for table `barang_kondisi`
--

CREATE TABLE `barang_kondisi` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_kondisi`
--

INSERT INTO `barang_kondisi` (`id`, `kondisi`) VALUES
(1, 'Baru'),
(2, 'Rusak'),
(3, 'Perbaikan'),
(4, 'Tidak terpakai');

-- --------------------------------------------------------

--
-- Table structure for table `barang_lokasi`
--

CREATE TABLE `barang_lokasi` (
  `id` int(11) NOT NULL,
  `lokasi` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_lokasi`
--

INSERT INTO `barang_lokasi` (`id`, `lokasi`) VALUES
(31, 'Gudang Akuntansi'),
(32, 'Gudang INKA'),
(39, 'Gudang TKJ'),
(40, 'Gudang Multimedia'),
(41, 'Kelas XII TKJ 1'),
(42, 'Kelas XII TKJ 2'),
(43, 'Kelas XII AK 1');

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `color` varchar(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `title`, `note`, `color`, `date`) VALUES
(1, 'coba', 'coba', '-2121', '2019-11-06 10:23:02'),
(2, 'Ggg', 'ggg', '-2234644', '2019-11-06 14:34:55');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id` int(11) NOT NULL,
  `id_user_pjm` varchar(40) NOT NULL,
  `tgl_pinjam` datetime NOT NULL,
  `tgl_kembali` datetime NOT NULL,
  `id_user` varchar(128) NOT NULL,
  `id_barang` varchar(128) NOT NULL,
  `keperluan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `image` varchar(128) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `image`, `role_id`, `is_active`, `date_created`) VALUES
(21, 'Abdul Basyit A', 'aly', '$2y$10$2.lme21DHNSY5p0LibxkpefyKifXXX4QLhslQPcBUulb/ntcCzgm.', 'aku1.jpg', 1, 1, 1564976208),
(28, 'Admin', 'admin', '$2y$10$t/fwhVAMJJkeDXm7eh6eTuwdSHV7.kedFOuD3lH/ERpQn.ckwdWn2', 'default.png', 1, 1, 1570510553),
(39, 'Abdul Basyit Aly', 'abdul', '$2y$10$kjokf3RNPiA9SsNayANDru04hpEySgAyC7ZmcbG5B.f7bjClXV5jK', 'default.png', 2, 2, 1572057098);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 1),
(9, 1, 3),
(16, 2, 3),
(18, 3, 6),
(19, 2, 5),
(21, 1, 5),
(22, 2, 6),
(23, 1, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL,
  `ikon` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `ikon`) VALUES
(2, 'Admin', 'fas fa-fw fa-user'),
(3, 'User', 'fas fa-fw fa-user'),
(4, 'Menu', 'fas fa-fw fa-user'),
(5, 'Inventory', 'fas fa-fw fa-user'),
(6, 'Peminjaman', '');

-- --------------------------------------------------------

--
-- Table structure for table `user_p`
--

CREATE TABLE `user_p` (
  `id` int(11) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_p`
--

INSERT INTO `user_p` (`id`, `username`, `password`) VALUES
(1, 'abdul', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_pjm`
--

CREATE TABLE `user_pjm` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pjm`
--

INSERT INTO `user_pjm` (`id`, `name`, `username`, `password`) VALUES
(21, 'bima', 'bima', 'bima'),
(22, 'aku', 'aku', 'aku');

-- --------------------------------------------------------

--
-- Table structure for table `user_pjm_kategori`
--

CREATE TABLE `user_pjm_kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_pjm_kategori`
--

INSERT INTO `user_pjm_kategori` (`id`, `kategori`) VALUES
(1, 'hhh');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Administrator'),
(2, 'Member'),
(3, 'Kepala Sekolah');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(2, 3, 'My Profile', 'user', 'fas fa-fw fa-user', 1),
(4, 4, 'Menu', 'menu', 'fas fa-fw fa-folder', 1),
(5, 4, 'Submenu', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(11, 2, 'Role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(15, 5, 'Kelola Barang', 'barang', 'fas fa-fw fa-table', 1),
(16, 5, 'Kelola Lokasi', 'lokasi', 'fas fa-fw fa-map-marked', 1),
(19, 2, 'Kelola User', 'admin/kelolauser', 'fas fa-fw fa-users-cog', 1),
(22, 5, 'Kelola Kondisi', 'kondisi', 'fas fa-fw fa-cart-plus', 1),
(25, 5, 'Kategori', 'Kategori', 'fas fa-fw fa-dolly-flatbed', 1),
(26, 6, 'Kategori peminjam', 'user_kategori', 'fas fa-fw fa-school', 1),
(27, 6, 'Kelola Peminjam', 'user_pjm', 'fas fa-fw fa-user-tie', 1),
(28, 6, 'Peminjaman', 'peminjaman', 'fas fa-fw fa-shopping-cart', 1),
(29, 6, 'Pengembalian', 'peminjaman/pengembalian', 'fas fa-fw fa-shopping-cart', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activation`
--
ALTER TABLE `activation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `barcode` (`barcode`);

--
-- Indexes for table `barang_kategori`
--
ALTER TABLE `barang_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_kondisi`
--
ALTER TABLE `barang_kondisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_lokasi`
--
ALTER TABLE `barang_lokasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_p`
--
ALTER TABLE `user_p`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_pjm`
--
ALTER TABLE `user_pjm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_pjm_kategori`
--
ALTER TABLE `user_pjm_kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activation`
--
ALTER TABLE `activation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `barang_kategori`
--
ALTER TABLE `barang_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_kondisi`
--
ALTER TABLE `barang_kondisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `barang_lokasi`
--
ALTER TABLE `barang_lokasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_p`
--
ALTER TABLE `user_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_pjm`
--
ALTER TABLE `user_pjm`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_pjm_kategori`
--
ALTER TABLE `user_pjm_kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
