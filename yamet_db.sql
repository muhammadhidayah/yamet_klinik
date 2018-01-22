-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 22, 2018 at 10:39 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `yamet_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `id_client` int(11) NOT NULL,
  `nama_client` varchar(255) NOT NULL,
  `namapanggilan_client` varchar(100) NOT NULL,
  `tgllahir_client` date NOT NULL,
  `templahir_client` varchar(255) NOT NULL,
  `diagnosis_client` varchar(100) NOT NULL,
  `jk_client` enum('L','P') NOT NULL,
  `agama_client` enum('Islam','Kristen','Katholik','Budha','Hindu') NOT NULL,
  `goldarah_client` enum('A','B','AB','O') NOT NULL,
  `catatankhusus_client` text NOT NULL,
  `sekolah_client` varchar(100) NOT NULL,
  `nama_ayahclient` varchar(100) NOT NULL,
  `nama_ibuclient` varchar(100) NOT NULL,
  `alamat_client` varchar(255) NOT NULL,
  `notelp_client` varchar(12) NOT NULL,
  `email_client` varchar(255) NOT NULL,
  `password_client` varchar(255) NOT NULL,
  `status_client` enum('aktif','nonaktif') NOT NULL,
  `gambar_client` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`id_client`, `nama_client`, `namapanggilan_client`, `tgllahir_client`, `templahir_client`, `diagnosis_client`, `jk_client`, `agama_client`, `goldarah_client`, `catatankhusus_client`, `sekolah_client`, `nama_ayahclient`, `nama_ibuclient`, `alamat_client`, `notelp_client`, `email_client`, `password_client`, `status_client`, `gambar_client`) VALUES
(1, 'Khoironi', 'Bob', '1992-07-24', 'Madura', 'Sakit', 'L', 'Islam', 'A', '', 'Universitas Amikom', 'Abu Khoironi', 'Ummu Khoironi', '										Jalan Madura	\r\n									', '12345678', 'khoironi@gmail.com', 'z7O5LZyT', 'aktif', ''),
(3, 'qowi azmi', 'qowi', '1999-02-02', 'lombok', 'belum pendadaran', 'L', 'Islam', 'A', '', 'sma', 'aris', 'halimah', 'jl. sepakbola', '08765634788', 'qowiazmi@gmail.com', 'B7vEyix3', 'aktif', ''),
(4, 'alwi', 'alwi', '1999-02-02', 'lombok', 'sakit', 'L', 'Islam', 'A', '', 'smkn lombok', 'gilang', 'halimahtus', 'jl. kemari', '0877987457', 'alwi7928@students.amikom.ac.id', 'XkGZ1ZMz', 'aktif', 'logo_amikom_full_color.png'),
(5, 'Khoironi', 'Bob', '1992-07-24', 'Madura', 'Sakit', 'L', 'Islam', 'A', '', 'Universitas Amikom', 'Abu Khoironi', 'Ummu Khoironi', '                   Jalan Madura  \r\n                  ', '12345678', 'khoironi@gmail.com', 'z7O5LZyT', 'aktif', ''),
(6, 'qowi azmi', 'qowi', '1999-02-02', 'lombok', 'belum pendadaran', 'L', 'Islam', 'A', '', 'sma', 'aris', 'halimah', 'jl. sepakbola', '08765634788', 'qowiazmi@gmail.com', 'B7vEyix3', 'aktif', ''),
(7, 'alwi', 'alwi', '1999-02-02', 'lombok', 'sakit', 'L', 'Islam', 'A', '', 'smkn lombok', 'gilang', 'halimahtus', 'jl. kemari', '0877987457', 'alwi7928@students.amikom.ac.id', 'XkGZ1ZMz', 'aktif', ''),
(8, 'Khoironi', 'Bob', '1992-07-24', 'Madura', 'Sakit', 'L', 'Islam', 'A', '', 'Universitas Amikom', 'Abu Khoironi', 'Ummu Khoironi', '                   Jalan Madura  \r\n                  ', '12345678', 'khoironi@gmail.com', 'z7O5LZyT', 'aktif', ''),
(9, 'qowi azmi', 'qowi', '1999-02-02', 'lombok', 'belum pendadaran', 'L', 'Islam', 'A', '', 'sma', 'aris', 'halimah', 'jl. sepakbola', '08765634788', 'qowiazmi@gmail.com', 'B7vEyix3', 'aktif', ''),
(10, 'alwi', 'alwi', '1999-02-02', 'lombok', 'sakit', 'L', 'Islam', 'A', '', 'smkn lombok', 'gilang', 'halimahtus', 'jl. kemari', '0877987457', 'alwi7928@students.amikom.ac.id', 'XkGZ1ZMz', 'aktif', ''),
(11, 'Khoironi', 'Bob', '1992-07-24', 'Madura', 'Sakit', 'L', 'Islam', 'A', '', 'Universitas Amikom', 'Abu Khoironi', 'Ummu Khoironi', '                   Jalan Madura  \r\n                  ', '12345678', 'khoironi@gmail.com', 'z7O5LZyT', 'aktif', ''),
(12, 'qowi azmi', 'qowi', '1999-02-02', 'lombok', 'belum pendadaran', 'L', 'Islam', 'A', '', 'sma', 'aris', 'halimah', 'jl. sepakbola', '08765634788', 'qowiazmi@gmail.com', 'B7vEyix3', 'aktif', ''),
(13, 'alwi', 'alwi', '1999-02-02', 'lombok', 'sakit', 'L', 'Islam', 'A', '', 'smkn lombok', 'gilang', 'halimahtus', 'jl. kemari', '0877987457', 'alwi7928@students.amikom.ac.id', 'XkGZ1ZMz', 'aktif', ''),
(14, 'Khoironi', 'Bob', '1992-07-24', 'Madura', 'Sakit', 'L', 'Islam', 'A', '', 'Universitas Amikom', 'Abu Khoironi', 'Ummu Khoironi', '                   Jalan Madura  \r\n                  ', '12345678', 'khoironi@gmail.com', 'z7O5LZyT', 'aktif', ''),
(15, 'qowi azmi', 'qowi', '1999-02-02', 'lombok', 'belum pendadaran', 'L', 'Islam', 'A', '', 'sma', 'aris', 'halimah', 'jl. sepakbola', '08765634788', 'qowiazmi@gmail.com', 'B7vEyix3', 'aktif', ''),
(16, 'alwi', 'alwi', '1999-02-02', 'lombok', 'sakit', 'L', 'Islam', 'A', '', 'smkn lombok', 'gilang', 'halimahtus', 'jl. kemari', '0877987457', 'alwi7928@students.amikom.ac.id', 'XkGZ1ZMz', 'aktif', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_dokterterapis`
--

CREATE TABLE `tbl_dokterterapis` (
  `id_pegawai` int(11) NOT NULL,
  `id_jenisterapi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_fasilitas`
--

CREATE TABLE `tbl_fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `isi_fasilitas` text NOT NULL,
  `gambar_fasilitas` varchar(255) NOT NULL,
  `kategori_fasilitas` enum('utama','lain') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jenisterapi`
--

CREATE TABLE `tbl_jenisterapi` (
  `id_jenisterapi` int(11) NOT NULL,
  `jenis_terapi` varchar(100) NOT NULL,
  `biaya_terapi` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_jenisterapi`
--

INSERT INTO `tbl_jenisterapi` (`id_jenisterapi`, `jenis_terapi`, `biaya_terapi`) VALUES
(1, 'Terapi Biomedika', '123000.00'),
(2, 'Terapi Medikamentosa', '110000.00'),
(3, 'Terapi Kelainan', '123000.00'),
(4, 'Terapi Medikamentosa', '110000.00'),
(5, 'Terapi Biomedika', '123000.00'),
(6, 'Terapi Medikamentosa', '110000.00'),
(7, 'Terapi Biomedika', '123000.00'),
(8, 'Terapi Medikamentosa', '110000.00'),
(9, 'Terapi Biomedika', '123000.00'),
(10, 'Terapi Medikamentosa', '110000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kelasklinik`
--

CREATE TABLE `tbl_kelasklinik` (
  `id_kelasklinik` int(11) NOT NULL,
  `isi_kelasklinik` text NOT NULL,
  `gambar_kelasklinik` varchar(255) NOT NULL,
  `kategori_kelasklinik` enum('utama','lain') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_konfigurasi`
--

CREATE TABLE `tbl_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `urlweb_klinik` varchar(100) DEFAULT NULL,
  `email_klinik` varchar(100) DEFAULT NULL,
  `keyword_klinik` text,
  `deskripsi_klini` text,
  `koordinat_klinik` text,
  `metatext_klinik` text,
  `icon_klinik` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_layanan`
--

CREATE TABLE `tbl_layanan` (
  `id_layanan` int(11) NOT NULL,
  `isi_layanan` text NOT NULL,
  `gambar_layanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_loginpegawai`
--

CREATE TABLE `tbl_loginpegawai` (
  `username_pegawai` varchar(50) NOT NULL,
  `password_pegawai` varchar(255) NOT NULL,
  `level_login` varchar(10) NOT NULL,
  `lastlogin_pegawai` datetime DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_loginpegawai`
--

INSERT INTO `tbl_loginpegawai` (`username_pegawai`, `password_pegawai`, `level_login`, `lastlogin_pegawai`, `id_pegawai`) VALUES
('admin', 'jokoganteng', 'admin', NULL, 1),
('owneryamet', 'owneryamet', 'owner', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pegawai`
--

CREATE TABLE `tbl_pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `nama_pegawai` varchar(255) NOT NULL,
  `email_pegawai` varchar(255) NOT NULL,
  `nohp_pegawai` varchar(12) NOT NULL,
  `alamat_pegawai` varchar(255) NOT NULL,
  `ava_pegawai` varchar(255) DEFAULT NULL,
  `jk_pegawai` enum('L','P') NOT NULL,
  `tgllahir_pegawai` date DEFAULT NULL,
  `agama_pegawai` enum('Islam','Kristen','Katholik','Hindu','Budha') NOT NULL,
  `goldarah_pegawai` enum('A','B','AB','O') NOT NULL,
  `pendakhir_pegawai` varchar(255) NOT NULL,
  `spesialis_pegawai` varchar(255) NOT NULL,
  `panggilan_pegawai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pegawai`
--

INSERT INTO `tbl_pegawai` (`id_pegawai`, `nama_pegawai`, `email_pegawai`, `nohp_pegawai`, `alamat_pegawai`, `ava_pegawai`, `jk_pegawai`, `tgllahir_pegawai`, `agama_pegawai`, `goldarah_pegawai`, `pendakhir_pegawai`, `spesialis_pegawai`, `panggilan_pegawai`) VALUES
(1, 'Muhammad Hidayah', 'muhammad30hidayah696@gmail.com', '081949162028', 'Jalan Mancasan Indah 3 No 19 Condongcatur Depok Sleman', 'logo_amikom_full_color.png', 'L', NULL, 'Islam', 'A', '', '', ''),
(2, 'Khoironi', 'khoironi@gmail.com', '08121231', 'Jalan Madura', NULL, 'L', NULL, 'Islam', 'A', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_perkembanganclient`
--

CREATE TABLE `tbl_perkembanganclient` (
  `id_perkembanganclient` int(11) NOT NULL,
  `id_jenisterapi` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `laporan_perkembanganclient` text NOT NULL,
  `tanggal_perkembangan` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_perkembanganclient`
--

INSERT INTO `tbl_perkembanganclient` (`id_perkembanganclient`, `id_jenisterapi`, `id_client`, `id_pegawai`, `laporan_perkembanganclient`, `tanggal_perkembangan`) VALUES
(3, 3, 1, 1, 'sudah bisa membaca dan menulis', '2018-01-03'),
(4, 1, 1, 1, 'sudah bisa menulis', '2018-01-04'),
(5, 1, 1, 1, 'dfvsdvfd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id_post` int(11) NOT NULL,
  `judul_post` varchar(255) NOT NULL,
  `slug_post` varchar(255) NOT NULL,
  `deskripsi_post` varchar(255) NOT NULL,
  `isi_post` text NOT NULL,
  `tanggal_post` date NOT NULL,
  `gambar_post` varchar(255) DEFAULT NULL,
  `id_pegawai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id_post`, `judul_post`, `slug_post`, `deskripsi_post`, `isi_post`, `tanggal_post`, `gambar_post`, `id_pegawai`) VALUES
(1, 'Berita', 'berita', 'Berita itu memberikan informasi', '<p>Menulis blog memberika informasi terhadap pembaca</p>', '2017-12-29', 'fabian-irsara-92113.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_profilklinik`
--

CREATE TABLE `tbl_profilklinik` (
  `id_klinik` int(11) NOT NULL,
  `nama_klinik` varchar(100) NOT NULL,
  `tentang_klinik` text,
  `sejarah_klinik` text,
  `gambar_klinik` varchar(100) DEFAULT NULL,
  `alamat_klinik` varchar(255) DEFAULT NULL,
  `notelp_klinik` varchar(12) DEFAULT NULL,
  `info_klinik` varchar(900) DEFAULT NULL,
  `kurikulum_klinik` mediumtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_profilklinik`
--

INSERT INTO `tbl_profilklinik` (`id_klinik`, `nama_klinik`, `tentang_klinik`, `sejarah_klinik`, `gambar_klinik`, `alamat_klinik`, `notelp_klinik`, `info_klinik`, `kurikulum_klinik`) VALUES
(1, 'yamet', '<p>Yamet klinik adalah sebuah klinik untuk terapi anak anak yang memiliki cacat otak</p>', '<p>Banyaknya penyakit autis yang terjadi pada anak anak</p>', NULL, 'Jalan Ring Road Utara', '0824123123', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`id_client`);

--
-- Indexes for table `tbl_dokterterapis`
--
ALTER TABLE `tbl_dokterterapis`
  ADD PRIMARY KEY (`id_pegawai`,`id_jenisterapi`),
  ADD KEY `Fk_JenisTerapi` (`id_jenisterapi`);

--
-- Indexes for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_jenisterapi`
--
ALTER TABLE `tbl_jenisterapi`
  ADD PRIMARY KEY (`id_jenisterapi`);

--
-- Indexes for table `tbl_kelasklinik`
--
ALTER TABLE `tbl_kelasklinik`
  ADD PRIMARY KEY (`id_kelasklinik`);

--
-- Indexes for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  ADD PRIMARY KEY (`id_layanan`);

--
-- Indexes for table `tbl_loginpegawai`
--
ALTER TABLE `tbl_loginpegawai`
  ADD PRIMARY KEY (`username_pegawai`),
  ADD KEY `idPegawaiLogin` (`id_pegawai`);

--
-- Indexes for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `tbl_perkembanganclient`
--
ALTER TABLE `tbl_perkembanganclient`
  ADD PRIMARY KEY (`id_perkembanganclient`),
  ADD KEY `Fk_PerkembanganTerapi` (`id_jenisterapi`),
  ADD KEY `Fk_PerkembanganClient` (`id_client`),
  ADD KEY `FK_DokterTerapisClient` (`id_pegawai`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `FK_PegawaiPost` (`id_pegawai`);

--
-- Indexes for table `tbl_profilklinik`
--
ALTER TABLE `tbl_profilklinik`
  ADD PRIMARY KEY (`id_klinik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `tbl_fasilitas`
--
ALTER TABLE `tbl_fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_jenisterapi`
--
ALTER TABLE `tbl_jenisterapi`
  MODIFY `id_jenisterapi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_kelasklinik`
--
ALTER TABLE `tbl_kelasklinik`
  MODIFY `id_kelasklinik` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_konfigurasi`
--
ALTER TABLE `tbl_konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_layanan`
--
ALTER TABLE `tbl_layanan`
  MODIFY `id_layanan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_pegawai`
--
ALTER TABLE `tbl_pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_perkembanganclient`
--
ALTER TABLE `tbl_perkembanganclient`
  MODIFY `id_perkembanganclient` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_profilklinik`
--
ALTER TABLE `tbl_profilklinik`
  MODIFY `id_klinik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_dokterterapis`
--
ALTER TABLE `tbl_dokterterapis`
  ADD CONSTRAINT `FK_PegawaiTerapis` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`),
  ADD CONSTRAINT `Fk_JenisTerapi` FOREIGN KEY (`id_jenisterapi`) REFERENCES `tbl_jenisterapi` (`id_jenisterapi`);

--
-- Constraints for table `tbl_loginpegawai`
--
ALTER TABLE `tbl_loginpegawai`
  ADD CONSTRAINT `idPegawaiLogin` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`);

--
-- Constraints for table `tbl_perkembanganclient`
--
ALTER TABLE `tbl_perkembanganclient`
  ADD CONSTRAINT `FK_DokterTerapisClient` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`),
  ADD CONSTRAINT `Fk_PerkembanganClient` FOREIGN KEY (`id_client`) REFERENCES `tbl_client` (`id_client`),
  ADD CONSTRAINT `Fk_PerkembanganTerapi` FOREIGN KEY (`id_jenisterapi`) REFERENCES `tbl_jenisterapi` (`id_jenisterapi`);

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `FK_PegawaiPost` FOREIGN KEY (`id_pegawai`) REFERENCES `tbl_pegawai` (`id_pegawai`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
