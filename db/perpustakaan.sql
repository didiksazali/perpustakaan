-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2018 at 03:00 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
`id` int(11) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `judul` varchar(55) NOT NULL,
  `pengarang` varchar(45) NOT NULL,
  `tahun` int(11) NOT NULL,
  `penerbit` varchar(45) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `kode_buku`, `judul`, `pengarang`, `tahun`, `penerbit`) VALUES
(2, 'abc123', 'Belajar', 'Didik', 2017, 'Bersama'),
(3, 'def456', 'Belajar Java', 'Sazali', 2017, 'Cetak Sendiri'),
(4, 'eee123', 'jago php haha', 'jarwo haha', 2014, 'rumah sendiri haha'),
(5, 'ijk123', 'jago web desain', 'Diki', 2014, 'Cetak Sendiri');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
`id` int(11) NOT NULL,
  `npm` varchar(15) NOT NULL,
  `nama_mahasiswa` varchar(45) NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `jurusan` varchar(25) NOT NULL,
  `foto_mahasiswa` varchar(55) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `npm`, `nama_mahasiswa`, `jenis_kelamin`, `jurusan`, `foto_mahasiswa`) VALUES
(1, '2147483647', 'Rahayu', 'Perempuan', 'Manajemen Informatika', 'android.jpeg'),
(4, '1610031802027', 'Didik Sazali', 'Laki-laki', 'Teknik Informatika', '04E3HNGAKH.jpg'),
(6, '1239876', 'Boy', 'Laki-laki', 'Teknik Informatika', 'atom.png');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
`id` int(11) NOT NULL,
  `npm` varchar(15) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `npm`, `kode_buku`, `tanggal_pinjam`, `tanggal_kembali`) VALUES
(2, '2147483647', 'abc123', '2018-01-06', '2018-01-13'),
(7, '1610031802027', 'def456', '2018-01-06', '2018-01-13'),
(8, '2147483647', 'def456', '2018-01-06', '2018-01-13'),
(10, '1610031802027', 'abc123', '2018-01-07', '2018-01-14'),
(11, '2147483647', 'abc123', '2018-01-25', '2018-02-01'),
(12, '1610031802027', 'eee123', '2018-01-07', '2018-01-14'),
(13, '2147483647', 'def456', '2018-01-07', '2018-01-14');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `foto` varchar(255) NOT NULL,
  `blokir` enum('y','n') NOT NULL DEFAULT 'n'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama_lengkap`, `username`, `password`, `email`, `level`, `foto`, `blokir`) VALUES
(1, 'didik sazali', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'didiksazali@gmail.com', 'admin', '1floresbajawa.jpg', 'n'),
(6, 'pegawai', 'pegawai', '047aeeb234644b9e2d4138ed3bc7976a', 'bro', 'user', '04E3HNGAKH.jpg', 'n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
