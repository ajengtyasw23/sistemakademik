-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 24, 2024 at 10:12 PM
-- Server version: 10.6.17-MariaDB
-- PHP Version: 8.1.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `idicu_demo4`
--

-- --------------------------------------------------------

--
-- Table structure for table `absensi`
--

CREATE TABLE `absensi` (
  `id_absensi` int(11) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `kelas` varchar(32) NOT NULL,
  `hari_absen` varchar(32) NOT NULL,
  `tanggal_absen` varchar(32) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `kehadiran` varchar(32) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `absensi`
--

INSERT INTO `absensi` (`id_absensi`, `tahun_ajaran`, `kelas`, `hari_absen`, `tanggal_absen`, `nama_siswa`, `kehadiran`, `keterangan`) VALUES
(15, 2023, 'Paud B', 'Senin', '2023-10-16', 'Jihan nur fauziah', 'hadir', ''),
(16, 2023, 'Paud A', 'Senin', '2023-10-16', 'Natasa', 'hadir', ''),
(17, 2023, 'Paud A', 'Senin', '2023-10-16', 'Nadira assyafa nahilah', 'hadir', ''),
(18, 2023, 'Paud B', 'Senin', '2023-10-16', 'Naswa Aulia chita', 'hadir', ''),
(19, 2023, 'Paud A', 'Senin', '2023-10-16', 'Khayra ayunindya', 'hadir', ''),
(20, 2023, 'Paud A', 'Senin', '2023-10-16', 'Afrilia zayna Al mahren', 'hadir', ''),
(21, 2023, 'Paud A', 'Kamis', '2024-03-14', 'Rilo Abdul Rojak', 'hadir', ''),
(22, 2023, 'Paud A', 'Senin', '2024-03-04', 'Rilo Abdul Rojak', 'hadir', '');

-- --------------------------------------------------------

--
-- Table structure for table `detail_nilai`
--

CREATE TABLE `detail_nilai` (
  `id_detail_nilai` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL,
  `cpa` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_nilai`
--

INSERT INTO `detail_nilai` (`id_detail_nilai`, `id_nilai`, `cpa`) VALUES
(76, 31, 'bb'),
(77, 31, 'bb'),
(78, 31, 'mb'),
(79, 31, 'mb'),
(80, 31, 'mb'),
(81, 31, 'mb'),
(82, 31, 'mb'),
(83, 31, 'mb'),
(84, 31, 'mb'),
(85, 31, 'mb'),
(86, 31, 'bsh'),
(87, 31, 'bsh'),
(88, 31, 'bsh'),
(89, 31, 'bsh'),
(90, 31, 'bsb'),
(91, 31, 'bsb'),
(92, 31, 'bsb'),
(93, 31, 'bsb'),
(112, 33, 'bsh'),
(113, 33, 'bsb'),
(114, 33, 'bsb'),
(115, 33, 'bsh'),
(116, 33, 'bsb'),
(117, 33, 'bsh'),
(118, 33, 'bsb'),
(119, 33, 'bsh'),
(120, 33, 'bsh'),
(121, 33, 'bsb'),
(122, 33, 'bsh'),
(123, 33, 'bsh'),
(124, 33, 'bsb'),
(125, 33, 'bsh'),
(126, 33, 'bsh'),
(127, 33, 'bsh'),
(128, 33, 'bsb'),
(129, 33, 'bsh'),
(148, 35, 'bsh'),
(149, 35, 'bsh'),
(150, 35, 'bsb'),
(151, 35, 'bsh'),
(152, 35, 'bsb'),
(153, 35, 'bsb'),
(154, 35, 'bsb'),
(155, 35, 'bsb'),
(156, 35, 'bsb'),
(157, 35, 'bsb'),
(158, 35, 'bsh'),
(159, 35, 'bsb'),
(160, 35, 'bsb'),
(161, 35, 'bsb'),
(162, 35, 'bsb'),
(163, 35, 'bsb'),
(164, 35, 'bsb'),
(165, 35, 'bsb');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(32) NOT NULL,
  `jabatan` varchar(64) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `jenis_kelamin`, `jabatan`, `no_telp`, `alamat`, `keterangan`, `username`, `password`) VALUES
(1, 'Aman Rismawan', 'laki-laki', 'Kepala Sekolah', '087801456789', 'Dsn Pongporang, RT 013 RW 004, Ds Sindangrasa,Kwc Banjaranyar, Kab Ciamis ', '', 'guru125', '$2y$10$LNpHhM6g6RsZd.LG74HFlePkM0uuIk2Ta.NwttbnyK93Rmj8zgXs.'),
(4, 'Ade Nurtika,.S,E', 'laki-laki', 'Guru Membaca dan Menulis', '08570307375322', 'Dsn Entrong,RT 003 R1 010, Ds Sukasari, Kec Banjaranyar, Kab Ciamis', '', 'guru', '$2y$10$jmZdymgk4IOcBdlBTR8MnuTYtyHUHVM9jbq8qQfPqjIVOD5WpqaHe'),
(10, 'Surtini', 'perempuan', 'Guru ', '085861657277', 'dsn pongporang', '', 'guru3', '$2y$10$lwJMTGUEzpoQdSH9R3nx2OhVnFJx8k3bzZIs6q2zIxi.39yBWMwu.');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal_pelajaran` int(11) NOT NULL,
  `id_pelajaran` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `hari` varchar(64) NOT NULL,
  `jam_mulai` varchar(64) NOT NULL,
  `jam_selesai` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal_pelajaran`, `id_pelajaran`, `id_guru`, `hari`, `jam_mulai`, `jam_selesai`) VALUES
(10, 7, 4, 'Senin', '07:30', '08:00'),
(11, 8, 4, 'Senin', '08:00', '09:00'),
(13, 12, 4, 'Senin', '10:00', '10:30'),
(26, 12, 10, 'Selasa', '10:00', '10:30'),
(28, 11, 4, 'Rabu', '09:00', '10:00'),
(29, 12, 4, 'Rabu', '10:00', '10:30'),
(31, 14, 10, 'Selasa', '08:00', '09:00'),
(32, 11, 4, 'Senin', '09:00', '10:00'),
(33, 7, 10, 'Selasa', '07:30', '08:00'),
(34, 11, 10, 'Selasa', '09:00', '10:00'),
(35, 5, 4, 'Rabu', '08:00', '09:00'),
(36, 7, 4, 'Rabu', '07:30', '08:00'),
(37, 10, 10, 'Kamis', '08:00', '09:00'),
(38, 7, 10, 'Kamis', '07:30', '08:00'),
(39, 11, 10, 'Kamis', '09:00', '10:00'),
(40, 12, 10, 'Kamis', '10:00', '10:30'),
(41, 15, 4, 'Jumat', '08:00', '09:00');

-- --------------------------------------------------------

--
-- Table structure for table `kepsek`
--

CREATE TABLE `kepsek` (
  `id_kepsek` int(11) NOT NULL,
  `nama_kepsek` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(32) NOT NULL,
  `jabatan` varchar(64) NOT NULL,
  `no_telp` varchar(16) NOT NULL,
  `alamat` text NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kepsek`
--

INSERT INTO `kepsek` (`id_kepsek`, `nama_kepsek`, `jenis_kelamin`, `jabatan`, `no_telp`, `alamat`, `username`, `password`) VALUES
(1, 'Kepala Sekolah', 'laki-laki', 'Kepala Sekolah', '085703073753', 'PAUD DARUSHOWAAB', 'kepalasekolah', '$2y$10$kYj7cpOwHOq0nBltG/lOtufXh3KzLryMTxH6RlFsQtR4JhdPUNQZq');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_guru` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `semester` varchar(32) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `t_badan` int(11) NOT NULL,
  `b_badan` int(11) NOT NULL,
  `catatan_siswa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_guru`, `id_siswa`, `semester`, `tahun_ajaran`, `t_badan`, `b_badan`, `catatan_siswa`) VALUES
(31, 1, 16, '1', 2023, 120, 30, '<div>hallo</div>'),
(33, 4, 36, '2', 2023, 100, 22, ''),
(35, 4, 38, '1', 2023, 100, 25, '');

-- --------------------------------------------------------

--
-- Table structure for table `pelajaran`
--

CREATE TABLE `pelajaran` (
  `id_pelajaran` int(11) NOT NULL,
  `kode_pelajaran` varchar(16) NOT NULL,
  `pelajaran` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelajaran`
--

INSERT INTO `pelajaran` (`id_pelajaran`, `kode_pelajaran`, `pelajaran`) VALUES
(1, '13', 'Olahraga'),
(2, '07', 'Bahasa Indonesia'),
(3, '03', 'PPKN'),
(4, '0232', 'Membaca dan Menulis'),
(5, '005', 'Menggambar'),
(6, '001', 'Upacara'),
(7, '002', 'Senam Pagi'),
(8, '003', 'Agama'),
(9, '004', 'Menulis'),
(10, '006', 'Berhitung'),
(11, '007', 'Istirahat'),
(12, '008', 'Evaluasi &amp; Bermain'),
(13, '007', 'Study Banding'),
(14, '006', 'Mewarnai'),
(15, '08', 'Bernyanyi');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `tahun_ajaran` int(11) NOT NULL,
  `nama_siswa` varchar(128) NOT NULL,
  `jenis_kelamin` varchar(32) NOT NULL,
  `tempat_lahir` varchar(32) NOT NULL,
  `tanggal_lahir` varchar(32) NOT NULL,
  `agama` varchar(32) NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `jml_saudara` int(11) NOT NULL,
  `nama_ayah` varchar(128) NOT NULL,
  `nama_ibu` varchar(128) NOT NULL,
  `no_telp_ortu` varchar(15) NOT NULL,
  `alamat_ortu` text NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `tahun_ajaran`, `nama_siswa`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `anak_ke`, `jml_saudara`, `nama_ayah`, `nama_ibu`, `no_telp_ortu`, `alamat_ortu`, `username`, `password`, `foto`) VALUES
(16, 2023, 'Jihan nur fauziah', 'perempuan', 'Banjar', '2017-07-25', 'Islam', 1, 3, 'Dian rianto', 'Yayah', '081223027592', 'Pasiripis RT 09 RW 03', 'Jihan', '$2y$10$BvCLgEctl6e6RBl.ieBTSuT1dbNL3KpjLbfDXItaZGTjO7R5HtQsS', '982354bcd6501295e45d95578e8dbe94.jpg'),
(20, 2023, 'Natasa', 'perempuan', 'Ciamis', '2018-09-13', 'Islam', 3, 3, 'Parno', 'Iin', '085282914419', 'Dusun PONGPORANg RT 013 RW 04 kec.banjar anyar ', 'Natasa', '$2y$10$Jz2Wr9twsYa7ySKy24EkP.EGCtz/QUPkFPtkW6ZOlrpRgYhBEc7nK', '9e15d7f800eedcaa34a98f073d6514b0.jpg'),
(21, 2023, 'Nadira assyafa nahilah', 'perempuan', 'Ciamis', '2019-04-17', 'Islam', 2, 1, 'Deni', 'Nuryani', '081214196400', 'Dusun pasiripis rt09 RW 03 ,Sindangrasa kec Banjar anyar', 'Nadifa', '$2y$10$JgexsjeEIhlw01BlL3VV/eyQgvxXLo0D8x9yuEySu0H.Krw6FFc7W', '7f38ac4c2ba49ae1b7c371e606ab9c64.jpg'),
(22, 2023, 'Khayra ayunindya', 'perempuan', 'Ciamis', '2019-06-12', 'Islam', 2, 1, 'Aip priatna', 'Naimaful mufidah', '081312946574', 'Dsn pongporang RT 15 RW 04 Desa Sindangrasa kec Banjar anyar kab ciamis', 'Khayra', '$2y$10$NWie/vWEHyDOu/C26KZ..uLS3oi8joOgNrONsH9vuMOAK/Wd/r2VW', 'ee474bb80cd0aa00fc1016aa5739b097.jpg'),
(23, 2023, 'Afrilia zayna Al mahren', 'perempuan', 'Ciamis', '2019-04-03', 'Islam', 2, 1, 'Sudiro', 'Siti rohimah', '081220484015', 'Dsn pongporang RT 13 RW 04 desa sindangrasa kec banjaranyar kab ciamis', 'Afrilia', '$2y$10$I2gdQizhhBz9oz9fNgGWkuK8bG8WP8LJek4czw8ZjLSjJqhuuvhcK', 'f1007436996298dc57db90a7dd7cfb55.jpg'),
(26, 2023, 'Naswa Aulia chita', 'perempuan', 'Ciamis', '2017-10-25', 'Islam', 1, 0, 'Encep', 'Dede aroh', '081220940787', 'Dusun pongporang RT 13 RW 04 desa Sindang rasa kec.banjar anyar', 'Naswa', '$2y$10$SAySrmAVij0jeYN7iGZEjefqgvY/8K0dt2y2slxATc0smwJYtnSdK', 'f4efbf4800dec9b3c5f98dde9104ed4c.png'),
(27, 2023, 'Imam asahip', 'laki-laki', 'Ciamis', '2019-04-08', 'Islam', 3, 2, 'Ali mukti', 'Iin sartika', '083162311405', 'Dusun PONGPORANg RT 14 RW 04 Desa Sindang rasa kec.banjar anyar', 'Imam', '$2y$10$rDhMA2RYvmpWPPNiOMsglOxR5PqZTYRCQxXNAJ6n5WJ4upWPNM3dm', '5eee6d15df22bcedb8e3bb9e40050d7c.jpg'),
(28, 2023, 'Syaputra ardiansyah', 'laki-laki', 'Ciamis', '2018-10-13', 'Islam', 2, 1, 'Suherlan', 'Nina sutrisna', '081224919596', 'Dusun pasiripis RT 11 RW 03 desa Sindang rasa kec.banjar anyar', 'Putra', '$2y$10$5gll3thdNF3BV1EPddQt2esK8P1FOyhxmPNBsX1tiCXe.2r2E.l5y', ''),
(30, 2023, 'Syifa aditri', 'perempuan', 'Ciamis', '2017-10-20', 'Islam', 2, 1, 'Dede hermanto', 'Ai sumiati', '085846194128', 'Dusun PONGPORANg RT 12 RW 04, Desa sindang rasa kec.banjar anyar', 'Syifa', '$2y$10$85Hfrh.gwciZKQrzyKJ4keUEXml51NQDxN9jxp2Dit6qjDPdYSwVu', 'd412e2a3a43323db157e5365b42997ff.jpg'),
(31, 2023, 'Alya Aqila salbyyah', 'perempuan', 'Ciamis', '2018-01-12', 'Islam', 3, 2, 'Wildan MR', 'Maesaroh', '082318193404', 'Dusun pasiripis RT 10 RW 03 desa Sindang rasa, kec. Banjar anyar', 'Alya', '$2y$10$unIhFVGKvZhqoxck32yya.ENMlFf1TJRkUzhaveaQTfkOrWlKxdSq', 'e1cc60aabf0144405fbe9c7343cd481f.jpg'),
(32, 2023, 'Abil Rafa aditya', 'laki-laki', 'Ciamis', '2017-04-08', 'Islam', 1, 0, 'Nandar', 'Rosmiati', '085694431136', 'Dusun PONGPORANg RT 12 RW 04, Desa Sindang rasa ,kec.banjar anyar', 'Abil', '$2y$10$JJQl.rHQsxtpQpyVvBCoF.jj6Tqgwk.DvXlihCCx.mUdmHuuZUbHm', '53a08ce3735fe84ab60fc7bf57418b01.jpg'),
(33, 2023, 'Akhtar Fahri artanabil', 'laki-laki', 'Ciamis', '2018-08-16', 'Islam', 2, 1, 'Muah', 'Tusiah', '082320674320', 'Dusun pongporang RT 13,RW 04\r\nDesa Sindangrasa\r\nKec.banjar anyar', 'Akhtar', '$2y$10$huojzy55qYxMdNQbhQSf5uxyOyvKdrZIsQ0rqA5g6Do8OWOnJyswS', '61ee919292ac491bcb02f1a6e4ec5ae7.jpg'),
(34, 2023, 'Agus gunawan', 'laki-laki', 'Ciamis', '2017-08-04', 'Islam', 1, 0, 'Dadan mulyana', 'Siti patimah', '081288474919', 'Dusun pasiripis RT 09 RW 03 desa Sindang rasa,kec.banjar anyar', 'Agus', '$2y$10$dB6mdOWIxSfWbyZ1fnvrjO/k8ouSZKwinBdBaHVcyZitK7dJHubC2', ''),
(36, 2023, 'Naomi mizuki', 'perempuan', 'Tokyo', '2019-03-23', 'Islam', 1, 0, 'Yayan Maryanto', 'Ajeng Tyas Winarni', '089690670233', 'Dsn.Cigobang RT 010 RW 043,Desa Karngpaningal,KecPurwadadi, Kab Ciamis', 'naomi', '$2y$10$xrkeFpxBvAV6retJyX1Q0OzigjQGK2Yr9hLvqwTm6iHSPQjxHeye2', 'd72a040970324e48289807dc6595c04b.jpg'),
(38, 2023, 'Rilo Abdul Rojak', 'laki-laki', 'Ciamis', '2019-05-08', 'Islam', 1, 2, 'Suparyatno', 'Nuryani', '089678890798', 'pongporng', 'riloar', '$2y$10$2qQJJs7LyfUZsQi5V/61kuHBJ4iKwXkl81VZNpqG.ASar6ND1SpkS', '184f7b75dc0ef1a72fa9084d5713e9c4.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id_absensi`);

--
-- Indexes for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD PRIMARY KEY (`id_detail_nilai`),
  ADD KEY `id_nilai` (`id_nilai`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal_pelajaran`),
  ADD KEY `id_pelajaran` (`id_pelajaran`),
  ADD KEY `id_guru` (`id_guru`);

--
-- Indexes for table `kepsek`
--
ALTER TABLE `kepsek`
  ADD PRIMARY KEY (`id_kepsek`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `id_guru` (`id_guru`),
  ADD KEY `id_siswa` (`id_siswa`);

--
-- Indexes for table `pelajaran`
--
ALTER TABLE `pelajaran`
  ADD PRIMARY KEY (`id_pelajaran`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id_absensi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
  MODIFY `id_detail_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=166;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `kepsek`
--
ALTER TABLE `kepsek`
  MODIFY `id_kepsek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `pelajaran`
--
ALTER TABLE `pelajaran`
  MODIFY `id_pelajaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_nilai`
--
ALTER TABLE `detail_nilai`
  ADD CONSTRAINT `detail_nilai_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `nilai` (`id_nilai`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_1` FOREIGN KEY (`id_pelajaran`) REFERENCES `pelajaran` (`id_pelajaran`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jadwal_pelajaran_ibfk_2` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `nilai_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `nilai_ibfk_2` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
