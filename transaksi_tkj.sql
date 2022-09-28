-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 04, 2021 at 10:55 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `transaksi.tkj`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbbaner`
--

CREATE TABLE `tbbaner` (
  `id` int(5) NOT NULL,
  `nama_file` text NOT NULL,
  `desc` text NOT NULL,
  `aktif` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbaner`
--

INSERT INTO `tbbaner` (`id`, `nama_file`, `desc`, `aktif`) VALUES
(1, 'banner.jpeg', 'Kejar misi emas', 'Y'),
(2, 'banner2.jpeg', 'Toko mart flash sale', 'N'),
(3, 'banner3.jpeg', 'Gadget on tuesday', 'Y'),
(4, 'banner4.jpeg', 'Locafellas', 'Y'),
(5, 'banner5.jpeg', 'Sportacular', 'N');

-- --------------------------------------------------------

--
-- Table structure for table `tbbarang`
--

CREATE TABLE `tbbarang` (
  `kodebarang` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis` varchar(100) NOT NULL,
  `merk` varchar(100) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jlh_stok` int(5) NOT NULL,
  `hargajual` double NOT NULL,
  `hargabeli` double NOT NULL,
  `ket` text NOT NULL,
  `image` text NOT NULL,
  `disc` double NOT NULL,
  `trending` enum('Y','N') NOT NULL,
  `poin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbarang`
--

INSERT INTO `tbbarang` (`kodebarang`, `nama`, `jenis`, `merk`, `satuan`, `jlh_stok`, `hargajual`, `hargabeli`, `ket`, `image`, `disc`, `trending`, `poin`) VALUES
('1000', 'Gelas', 'Kaca', 'AntiPecah', 'box', 58, 250000, 185000, 'isi 20 pcs', 'gelas.jpg', 5, 'Y', 10),
('2000', 'Piring', 'Keramik', 'CapAyam', 'box', 207, 180000, 138000, 'warna putih', 'piring.jpg', 3, 'N', 0),
('3000', 'Jam', 'Aksesoris', 'Rolex', 'pcs', 17, 50000000, 45000000, 'Edisi terbatas', 'jam.jpg', 10, 'Y', 50);

-- --------------------------------------------------------

--
-- Table structure for table `tbbeli`
--

CREATE TABLE `tbbeli` (
  `no` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `kodesup` varchar(20) NOT NULL,
  `kodeuser` varchar(20) NOT NULL,
  `subtotal` double NOT NULL,
  `disc` double NOT NULL,
  `pajak` double NOT NULL,
  `grand_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbeli`
--

INSERT INTO `tbbeli` (`no`, `tgl`, `kodesup`, `kodeuser`, `subtotal`, `disc`, `pajak`, `grand_total`) VALUES
('BL-1', '2020-12-16', 'SP-02', 'U-01', 276000, 27600, 12420, 260820),
('BL-2', '2020-12-02', 'SP-01', 'U-02', 225000000, 112500000, 11250000, 123750000);

-- --------------------------------------------------------

--
-- Table structure for table `tbbelidetil`
--

CREATE TABLE `tbbelidetil` (
  `no` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jlh` varchar(5) NOT NULL,
  `hargabeli` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbbelidetil`
--

INSERT INTO `tbbelidetil` (`no`, `kodebarang`, `jlh`, `hargabeli`, `total`) VALUES
('BL-1', 'B-2', '2', 138000, 276000),
('BL-2', 'B-3', '5', 45000000, 225000000),
('BL-2', 'B-1', '11', 185000, 2035000),
('1', '1000', '20', 1000000, 20000000),
('BL-1', 'B-2', '2', 138000, 276000),
('BL-2', 'B-3', '5', 45000000, 225000000),
('BL-2', 'B-1', '11', 185000, 2035000),
('1', '1000', '20', 1000000, 20000000),
('BL-1', 'B-2', '2', 138000, 276000),
('BL-2', 'B-3', '5', 45000000, 225000000),
('BL-2', 'B-1', '11', 185000, 2035000),
('1', '1000', '20', 1000000, 20000000);

-- --------------------------------------------------------

--
-- Table structure for table `tbhistori`
--

CREATE TABLE `tbhistori` (
  `id` int(5) NOT NULL,
  `kodeuser` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbhistori`
--

INSERT INTO `tbhistori` (`id`, `kodeuser`, `kodebarang`, `created_at`, `updated_at`) VALUES
(52, '1', '1000', '2021-02-02 08:38:03', '2021-02-02 08:38:03'),
(53, '1', '3000', '2021-02-02 08:38:50', '2021-02-02 08:38:50'),
(54, '1', '2000', '2021-02-02 08:38:58', '2021-02-02 08:38:58');

-- --------------------------------------------------------

--
-- Table structure for table `tbjual`
--

CREATE TABLE `tbjual` (
  `no` varchar(20) NOT NULL,
  `tgl` date NOT NULL,
  `kodeuser` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `subtotal` double NOT NULL,
  `ongkir` double NOT NULL,
  `grand_total` double NOT NULL,
  `namapenerima` varchar(100) NOT NULL,
  `notelp` varchar(25) NOT NULL,
  `provinsi` varchar(75) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `kodepos` varchar(10) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `metode` varchar(15) NOT NULL,
  `bukti` text NOT NULL,
  `poin` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbjual`
--

INSERT INTO `tbjual` (`no`, `tgl`, `kodeuser`, `kodebarang`, `subtotal`, `ongkir`, `grand_total`, `namapenerima`, `notelp`, `provinsi`, `kota`, `kodepos`, `alamat`, `metode`, `bukti`, `poin`) VALUES
('0001', '2021-02-04', '1', '1000', 500000, 0, 498000, '', '', '', '', '', '', '', '', 2000),
('0002', '2021-02-04', '1', '3000', 680000, 0, 678000, '', '', '', '', '', '', '', '', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `tbjualdetil`
--

CREATE TABLE `tbjualdetil` (
  `no` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jlh` int(5) NOT NULL,
  `hargajual` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbjualdetil`
--

INSERT INTO `tbjualdetil` (`no`, `kodebarang`, `jlh`, `hargajual`, `total`) VALUES
('0001', '1000', 2, 250000, 500000),
('0002', '2000', 1, 180000, 180000),
('0002', '1000', 2, 250000, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbpelanggan`
--

CREATE TABLE `tbpelanggan` (
  `kodepel` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbpelanggan`
--

INSERT INTO `tbpelanggan` (`kodepel`, `nama`, `alamat`, `telp`) VALUES
('P-1', 'Juju', 'Jl. Sui Raya Dalam', '084321'),
('P-2', 'Kelly', 'Jl. Soekarno', '092121');

-- --------------------------------------------------------

--
-- Table structure for table `tbsales`
--

CREATE TABLE `tbsales` (
  `kodesales` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbsales`
--

INSERT INTO `tbsales` (`kodesales`, `nama`, `alamat`, `telp`) VALUES
('S-01', 'Kitty', 'Jl. Sui Raya', '11897'),
('S-02', 'Ulala', 'Jl. Purnama', '98645');

-- --------------------------------------------------------

--
-- Table structure for table `tbsupplier`
--

CREATE TABLE `tbsupplier` (
  `kodesup` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `telp` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbsupplier`
--

INSERT INTO `tbsupplier` (`kodesup`, `nama`, `alamat`, `telp`) VALUES
('SP-01', 'Sherly', 'Jl. Sui Raya Dalam', '0812345'),
('SP-02', 'Jiqy', 'Jl. Purnama', '08121343'),
('SP-03', 'Exelle', 'Jl. Sui Raya Dalam', '0821570');

-- --------------------------------------------------------

--
-- Table structure for table `tbuser`
--

CREATE TABLE `tbuser` (
  `kodeuser` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `status` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `ket` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbuser`
--

INSERT INTO `tbuser` (`kodeuser`, `nama`, `status`, `pass`, `ket`) VALUES
('1', 'Beverly', 'wanita', '510f0c93d42644182815e1817d688dbd', '');

-- --------------------------------------------------------

--
-- Table structure for table `tempbelidetil`
--

CREATE TABLE `tempbelidetil` (
  `notemp` int(5) NOT NULL,
  `no` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jlh` int(5) NOT NULL,
  `hargabeli` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tempjualdetil`
--

CREATE TABLE `tempjualdetil` (
  `notemp` int(5) NOT NULL,
  `no` varchar(20) NOT NULL,
  `kodeuser` varchar(20) NOT NULL,
  `kodebarang` varchar(20) NOT NULL,
  `jlh` int(5) NOT NULL,
  `hargajual` double NOT NULL,
  `total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbbaner`
--
ALTER TABLE `tbbaner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbbarang`
--
ALTER TABLE `tbbarang`
  ADD PRIMARY KEY (`kodebarang`);

--
-- Indexes for table `tbbeli`
--
ALTER TABLE `tbbeli`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbhistori`
--
ALTER TABLE `tbhistori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbjual`
--
ALTER TABLE `tbjual`
  ADD PRIMARY KEY (`no`);

--
-- Indexes for table `tbpelanggan`
--
ALTER TABLE `tbpelanggan`
  ADD PRIMARY KEY (`kodepel`);

--
-- Indexes for table `tbsales`
--
ALTER TABLE `tbsales`
  ADD PRIMARY KEY (`kodesales`);

--
-- Indexes for table `tbsupplier`
--
ALTER TABLE `tbsupplier`
  ADD PRIMARY KEY (`kodesup`);

--
-- Indexes for table `tbuser`
--
ALTER TABLE `tbuser`
  ADD PRIMARY KEY (`kodeuser`);

--
-- Indexes for table `tempbelidetil`
--
ALTER TABLE `tempbelidetil`
  ADD PRIMARY KEY (`notemp`);

--
-- Indexes for table `tempjualdetil`
--
ALTER TABLE `tempjualdetil`
  ADD PRIMARY KEY (`notemp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbbaner`
--
ALTER TABLE `tbbaner`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbhistori`
--
ALTER TABLE `tbhistori`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `tempbelidetil`
--
ALTER TABLE `tempbelidetil`
  MODIFY `notemp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT for table `tempjualdetil`
--
ALTER TABLE `tempjualdetil`
  MODIFY `notemp` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=358;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
