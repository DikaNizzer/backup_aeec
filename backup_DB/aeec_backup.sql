-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2022 at 12:24 AM
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
-- Database: `aeec_backup`
--

DELIMITER $$
--
-- Functions
--
CREATE DEFINER=`root`@`localhost` FUNCTION `cashback10` (`id` VARCHAR(10)) RETURNS INT(11)  BEGIN
DECLARE hitung INT;
SELECT INDIVIDU * 10/100 INTO hitung
FROM program
WHERE ID_PROGRAM = id;
RETURN hitung;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `cashback5` (`id` VARCHAR(10)) RETURNS INT(11)  BEGIN
DECLARE hitung INT;
SELECT INDIVIDU * 5/100 INTO hitung
FROM program
WHERE ID_PROGRAM = id;
RETURN hitung;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `voucher5` (`id` VARCHAR(10)) RETURNS INT(11)  BEGIN
DECLARE hitung INT;
SELECT INDIVIDU - (INDIVIDU * 5/100) INTO hitung
FROM program
WHERE ID_PROGRAM = id;
RETURN hitung;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `batch_program`
--

CREATE TABLE `batch_program` (
  `ID_BATCH` char(10) NOT NULL,
  `ID_PROGRAM` char(10) NOT NULL,
  `NAMA_CLASS` varchar(255) NOT NULL,
  `TGL_MULAI` date NOT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  `BATCH` int(11) DEFAULT NULL,
  `KUOTA` int(11) DEFAULT NULL,
  `STATUS` char(1) NOT NULL DEFAULT '1',
  `WAKTU_MULAI` time DEFAULT NULL,
  `WAKTU_BERAKHIR` time DEFAULT NULL,
  `IMAGE` text DEFAULT NULL,
  `B_INDIVIDU` int(11) DEFAULT NULL,
  `B_KOLEKTIF` int(11) DEFAULT NULL,
  `B_KORPORAT` int(11) DEFAULT NULL,
  `B_PPN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `batch_program`
--

INSERT INTO `batch_program` (`ID_BATCH`, `ID_PROGRAM`, `NAMA_CLASS`, `TGL_MULAI`, `TGL_BERAKHIR`, `BATCH`, `KUOTA`, `STATUS`, `WAKTU_MULAI`, `WAKTU_BERAKHIR`, `IMAGE`, `B_INDIVIDU`, `B_KOLEKTIF`, `B_KORPORAT`, `B_PPN`) VALUES
('CEK1', 'CEK', 'PRACTICAL STATISTIC AND DATA ANALYSIS FOR BUSINESS BATCH 1', '2022-07-29', '2022-12-01', 1, 18, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('DL001', 'EIMLP', 'DIGITAL LEADERSHIP BATCH 1', '2022-04-28', '2022-07-29', 1, 10, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('FFNF001', 'FFNF', 'FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER BATCH 1', '2022-04-28', '2022-12-03', 1, 9, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('SFNOC', 'EI', 'Sustainable Finance - New Opportunities and Challenges', '2022-07-25', NULL, NULL, NULL, '1', '19:00:00', '21:01:00', 'usiness-people-meeting-discuss-situation-marketing.jpg', NULL, NULL, NULL, NULL),
('SMA', 'ET', 'Strategic Management Accounting : Cost and Value - Virtual', '2021-03-13', NULL, NULL, 20, '1', '08:47:00', '00:50:00', 'businesswoman-using-tablet-analysis-graph-company-finance-strategy-statistics-success-concept-planning-future-office-room.jpg', NULL, NULL, NULL, NULL),
('SMKBK1', 'SMKBK', 'SISTEM MANAJEMEN KOMPENSASI BERBASIS KINERJA BATCH 1', '2022-06-09', '2022-09-23', 1, 19, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cashback`
--

CREATE TABLE `cashback` (
  `ID_CASHBACK` int(11) NOT NULL,
  `ID_USER` int(11) DEFAULT NULL,
  `NOMINAL` int(11) NOT NULL,
  `KADALUWARSA` date NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cashback`
--

INSERT INTO `cashback` (`ID_CASHBACK`, `ID_USER`, `NOMINAL`, `KADALUWARSA`, `CREATED_AT`) VALUES
(1, 1, 133200, '2023-08-01', '2022-08-01 14:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `ID_CLIENT` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `NAMA` varchar(255) NOT NULL,
  `JK` char(1) NOT NULL,
  `NO_TELP` varchar(14) NOT NULL,
  `NPWP` varchar(17) NOT NULL,
  `ALAMAT_NPWP` varchar(255) NOT NULL,
  `ALAMAT_RUMAH` varchar(255) NOT NULL,
  `INSTANSI` varchar(255) DEFAULT NULL,
  `JABATAN` varchar(255) DEFAULT NULL,
  `BERKAS_NPWP` varchar(255) DEFAULT NULL,
  `ALUMNI` char(1) NOT NULL,
  `ID_FAKULTAS` char(3) DEFAULT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`ID_CLIENT`, `ID_USER`, `NAMA`, `JK`, `NO_TELP`, `NPWP`, `ALAMAT_NPWP`, `ALAMAT_RUMAH`, `INSTANSI`, `JABATAN`, `BERKAS_NPWP`, `ALUMNI`, `ID_FAKULTAS`, `CREATED_AT`) VALUES
(77, 1, 'Andika', '0', '1724940', '12345', 'Surabaya', 'Surabaya', 'Unair', 'Komisaris', '62e77b6ba42df.docx', '1', 'F02', '2022-08-01 14:06:19'),
(78, 24, 'Andikaaa', '0', '12345', '12345', 'Surabaya', 'Surabaya', 'Unair', 'Komisaris', '62e77ecd7ff80.docx', '0', NULL, '2022-08-01 14:20:45'),
(79, 9, 'Andika', '1', '12345', '12345', 'Surabaya', 'Surabaya', 'Unair', 'Manager', '62e77eeae6f8b.docx', '0', NULL, '2022-08-01 14:21:14'),
(80, 30, 'Andika', '0', '12345', '12345', 'Surabaya', 'Surabaya', 'Unair', 'Direksi', '62e77f0659122.docx', '0', NULL, '2022-08-01 14:21:42');

-- --------------------------------------------------------

--
-- Table structure for table `detail_program`
--

CREATE TABLE `detail_program` (
  `ID_DETAIL` int(11) NOT NULL,
  `ID_PROGRAM` char(10) NOT NULL,
  `ID_JADWAL` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_program`
--

INSERT INTO `detail_program` (`ID_DETAIL`, `ID_PROGRAM`, `ID_JADWAL`) VALUES
(4, 'FFNF', 4),
(21, 'CEK', 3);

-- --------------------------------------------------------

--
-- Table structure for table `diskon`
--

CREATE TABLE `diskon` (
  `ID_DISKON` int(11) NOT NULL,
  `NAMA_DISKON` varchar(255) NOT NULL,
  `PERSENTASE` int(11) NOT NULL,
  `BENTUK` varchar(255) NOT NULL,
  `KODE` varchar(255) DEFAULT NULL,
  `DESKRIPSI` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `diskon`
--

INSERT INTO `diskon` (`ID_DISKON`, `NAMA_DISKON`, `PERSENTASE`, `BENTUK`, `KODE`, `DESKRIPSI`) VALUES
(1, 'Mengajak tiga partisipan', 10, 'Cashback', NULL, NULL),
(2, 'Mengajak tiga partisipan (sebagai yang diajak)', 5, 'Voucher', NULL, NULL),
(3, 'Follow sosial media AEEC', 5, 'Cashback', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `fakultas`
--

CREATE TABLE `fakultas` (
  `ID_FAKULTAS` char(3) NOT NULL,
  `NAMA_FAKULTAS` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fakultas`
--

INSERT INTO `fakultas` (`ID_FAKULTAS`, `NAMA_FAKULTAS`) VALUES
('F01', 'FAKULTAS ILMU BUDAYA'),
('F02', 'FAKULTAS EKONOMI DAN BISNIS'),
('F03', 'FAKULTAS KEDOKTERAN'),
('F04', 'FAKULTAS KEDOKTERAN GIGI'),
('F05', 'FAKULTAS KEDOKTERAN HEWAN'),
('F06', 'FAKULTAS PERIKANAN DAN KELAUTAN'),
('F07', 'FAKULTAS PSIKOLOGI'),
('F08', 'FAKULTAS FARMASI'),
('F09', 'FAKULTAS KESEHATAN MASYARAKAT'),
('F10', 'FAKULTAS SAINS DAN TEKNOLOGI'),
('F11', 'FAKULTAS HUKUM'),
('F12', 'FAKULTAS KEPERAWATAN'),
('F13', 'FAKULTAS ILMU SOSIAL DAN POLITIK'),
('F14', 'FAKULTAS VOKASI'),
('F15', 'SEKOLAH PASCASARJANA'),
('F16', 'FAKULTAS TEKNOLOGI MAJU DAN MULTIDISIPLIN');

-- --------------------------------------------------------

--
-- Stand-in structure for view `full_program`
-- (See below for the actual view)
--
CREATE TABLE `full_program` (
`ID_PROGRAM` char(10)
,`ID_KATEGORI` char(5)
,`NAMA_PROGRAM` varchar(255)
,`INDIVIDU` int(11)
,`KOLEKTIF` int(11)
,`KORPORAT` int(11)
,`DESKRIPSI` text
,`SESI` int(11)
,`IMAGE` text
,`NAMA_HARI` varchar(255)
,`WAKTU_MULAI` time
,`WAKTU_BERAKHIR` time
);

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE `hari` (
  `ID_HARI` char(2) NOT NULL,
  `NAMA_HARI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`ID_HARI`, `NAMA_HARI`) VALUES
('H1', 'SENIN'),
('H2', 'SELASA'),
('H3', 'RABU'),
('H4', 'KAMIS'),
('H5', 'JUMAT'),
('H6', 'SABTU'),
('H7', 'MINGGU');

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `ID_HISTORI` int(11) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `ID_PENDAFTARAN` int(11) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp(),
  `STATUS` char(1) NOT NULL DEFAULT '0',
  `USERNAME_MOOC` varchar(255) DEFAULT NULL,
  `PASSWORD_MOOC` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`ID_HISTORI`, `ID_CLIENT`, `ID_PENDAFTARAN`, `CREATED_AT`, `STATUS`, `USERNAME_MOOC`, `PASSWORD_MOOC`) VALUES
(67, 77, 23, '2022-08-08 05:16:29', '0', NULL, NULL);

--
-- Triggers `histori`
--
DELIMITER $$
CREATE TRIGGER `after_insert_histori` AFTER INSERT ON `histori` FOR EACH ROW BEGIN 
declare id char(10);
SELECT p.ID_BATCH into id from pendaftaran p JOIN histori h
ON p.ID_PENDAFTARAN = new.ID_PENDAFTARAN
ORDER BY h.ID_HISTORI DESC LIMIT 1;
UPDATE batch_program
SET KUOTA = KUOTA - 1 
WHERE ID_BATCH = id; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `ID_JADWAL` int(11) NOT NULL,
  `ID_HARI` char(3) NOT NULL,
  `ID_WAKTU` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`ID_JADWAL`, `ID_HARI`, `ID_WAKTU`) VALUES
(3, 'H1', 1),
(4, 'H2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_program`
--

CREATE TABLE `kategori_program` (
  `ID_KATEGORI` char(5) NOT NULL,
  `NAMA_KATEGORI` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori_program`
--

INSERT INTO `kategori_program` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
('IHT', 'In House Training'),
('NRC', 'Non-Regular Class'),
('RC', 'Regular Class');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` int(11) NOT NULL,
  `ID_PENDAFTARAN` int(11) NOT NULL,
  `TGL_PEMBAYARAN` date NOT NULL,
  `NOMINAL` int(11) NOT NULL,
  `BUKTI` varchar(1024) NOT NULL,
  `STATUS` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `ID_PENDAFTARAN` int(11) NOT NULL,
  `ID_BATCH` char(10) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `ID_DISKON` int(11) DEFAULT NULL,
  `JENIS_PENDAFTARAN` varchar(30) DEFAULT NULL,
  `TGL_PENDAFTARAN` date NOT NULL,
  `HARGA_AWAL` int(11) DEFAULT NULL,
  `DISKON` int(11) DEFAULT NULL,
  `POTONGAN` int(11) DEFAULT NULL,
  `TAGIHAN` int(11) NOT NULL,
  `CASHBACK` int(11) DEFAULT NULL,
  `VIRTUAL_ACC` varchar(1024) DEFAULT NULL,
  `INVOICE` text DEFAULT NULL,
  `STATUS` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pendaftaran`
--

INSERT INTO `pendaftaran` (`ID_PENDAFTARAN`, `ID_BATCH`, `ID_CLIENT`, `ID_DISKON`, `JENIS_PENDAFTARAN`, `TGL_PENDAFTARAN`, `HARGA_AWAL`, `DISKON`, `POTONGAN`, `TAGIHAN`, `CASHBACK`, `VIRTUAL_ACC`, `INVOICE`, `STATUS`) VALUES
(23, 'CEK1', 77, 3, 'Individu : follow sosmed', '2022-08-08', 2220000, NULL, NULL, 2220000, 111000, '12345', '62f039e434fa7.png', '1');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `ID_NILAI` int(11) NOT NULL,
  `ID_HISTORI` int(11) NOT NULL,
  `NILAI` int(11) NOT NULL DEFAULT 0,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `penyimpanan`
--

CREATE TABLE `penyimpanan` (
  `ID_PENYIMPANAN` int(11) NOT NULL,
  `ID_CLIENT` int(11) NOT NULL,
  `BUKTI` varchar(255) DEFAULT NULL,
  `CREATED_AT` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyimpanan`
--

INSERT INTO `penyimpanan` (`ID_PENYIMPANAN`, `ID_CLIENT`, `BUKTI`, `CREATED_AT`) VALUES
(3, 77, '62f039a6767e3.png', '2022-08-08 05:16:06'),
(4, 77, '123', '2022-08-08 05:19:32');

-- --------------------------------------------------------

--
-- Stand-in structure for view `peserta`
-- (See below for the actual view)
--
CREATE TABLE `peserta` (
`ID_CLIENT` int(11)
,`ID_USER` int(11)
,`NAMA` varchar(255)
,`JK` char(1)
,`NO_TELP` varchar(14)
,`NPWP` varchar(17)
,`ALAMAT_NPWP` varchar(255)
,`ALAMAT_RUMAH` varchar(255)
,`INSTANSI` varchar(255)
,`JABATAN` varchar(255)
,`BERKAS_NPWP` varchar(255)
,`ALUMNI` char(1)
,`CREATED_AT` datetime
,`EMAIL` varchar(255)
,`AEEC_EMAIL` char(1)
,`AEEC_NEWSLETTER` char(1)
,`NAMA_FAKULTAS` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `ID_PROGRAM` char(10) NOT NULL,
  `ID_KATEGORI` char(5) NOT NULL,
  `NAMA_PROGRAM` varchar(255) NOT NULL,
  `INDIVIDU` int(11) DEFAULT NULL,
  `KOLEKTIF` int(11) DEFAULT NULL,
  `KORPORAT` int(11) DEFAULT NULL,
  `PPN` int(11) DEFAULT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  `SESI` int(11) DEFAULT NULL,
  `IMAGE` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`ID_PROGRAM`, `ID_KATEGORI`, `NAMA_PROGRAM`, `INDIVIDU`, `KOLEKTIF`, `KORPORAT`, `PPN`, `DESKRIPSI`, `SESI`, `IMAGE`) VALUES
('CEK', 'RC', 'PRACTICAL STATISTIC AND DATA ANALYSIS FOR BUSINESS', 2220000, 1776000, 1243200, 11, 'lorem', 7, 'accountant-calculating-profit-with-financial-analysis-graphs.jpg'),
('EI', 'NRC', 'Executive Insight', NULL, NULL, NULL, NULL, NULL, NULL, 'ei.PNG'),
('EIMLP', 'RC', 'PELATIHAN EXPORT IMPORT, MEKANISME LC DAN KEPABEANAN', 2464200, 2464200, 1724940, 11, 'Melalui Pelatihan ini, kami bertujuan agar para eksekutif ekspor impor untuk dibekali keterampilan pemahaman yang mendalam mengenai prosedur ekspor impor secara terpadu baik dari sisi Kepabeanan, Shipping dan Perbankan. Di akhir pelatihan, peserta akan semakin merasakan manfaat pelatihan dengan diberikan latihan pengisian dokumen ekspor – impor dengan benar serta permasalahan – permasalahan yang selama ini sering dialami dilapangan.', 7, 'businessmen-elegant-suits-business-meeting-discussing-new-project-office.jpg'),
('ET', 'NRC', 'Executive Talks', NULL, NULL, NULL, NULL, NULL, NULL, 'et.PNG'),
('FFNF', 'RC', 'FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER', 2220000, 1776000, 1554000, 11, 'ss', 7, 'business-plan.jpg'),
('SMKBK', 'RC', 'SISTEM MANAJEMEN KOMPENSASI BERBASIS KINERJA', 2664000, 1776000, 1554000, 11, 'Program ini berfokus pada peran sumber daya manusia dalam mengembangkan dan memelihara sistem manajemen kinerja, serta dapat meningkatkan pemahaman yang lebih dalam mengenai manajemen kinerja dan kompensasi, sehingga strategi bisnis dan tujuan perusahaan dapat terpenuhi.', 7, 'businesspeople-meeting-plan-analysis-graph-company-finance-strat.jpg'),
('WS', 'NRC', 'Workshop', NULL, NULL, NULL, NULL, NULL, NULL, 'ws.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `ID_USER` int(11) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` char(10) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp(),
  `AEEC_EMAIL` char(1) NOT NULL DEFAULT '0',
  `AEEC_NEWSLETTER` char(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID_USER`, `EMAIL`, `PASSWORD`, `ROLE`, `CREATED_AT`, `AEEC_EMAIL`, `AEEC_NEWSLETTER`) VALUES
(1, 'andika@gmail.com', '$2y$10$O2fmXU.F5NC75zYQWMEwbuE2/QAZDbS0TsXOTiU5i5R5pKy22Xsay', 'user', '2022-07-20 14:28:55', '0', '1'),
(4, 'administrator@gmail.com', '$2y$10$J/5kvmYg4kDmYqWKJLf.xuXD15b9naA9q5npI3gzkq3qjxGxMaqNe', 'admin', '2022-07-20 14:41:20', '0', '0'),
(9, 'lia@gmail.com', '$2y$10$qgzwugQs43PkwOCSJrouqOfBwufz8NzzILvpaziejohQY3lQNlGLC', 'user', '2022-07-26 16:36:21', '1', '1'),
(24, 'annisa@gmail.com', '$2y$10$bWdePmkXWvjMCweNcUaxju1LbWrVczX9vIiAUjZxUzuC6qj/JJBby', 'user', '2022-07-29 09:04:57', '0', '0'),
(30, 'mochamadbadowi@gmail.com', '$2y$10$GTKGvkJrp885gay0AANfB.uD/1fn.p2U3Sz8ITyG3fnBYkm7eQRWu', 'user', '2022-07-29 10:49:56', '1', '1'),
(86, 'keuangan@gmail.com', '$2y$10$J/5kvmYg4kDmYqWKJLf.xuXD15b9naA9q5npI3gzkq3qjxGxMaqNe', 'keuangan', '2022-08-08 05:24:18', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `waktu`
--

CREATE TABLE `waktu` (
  `ID_WAKTU` int(11) NOT NULL,
  `WAKTU_MULAI` time NOT NULL,
  `WAKTU_BERAKHIR` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `waktu`
--

INSERT INTO `waktu` (`ID_WAKTU`, `WAKTU_MULAI`, `WAKTU_BERAKHIR`) VALUES
(1, '18:30:00', '20:30:00'),
(2, '10:00:00', '12:00:00'),
(3, '09:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Structure for view `full_program`
--
DROP TABLE IF EXISTS `full_program`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `full_program`  AS SELECT `p`.`ID_PROGRAM` AS `ID_PROGRAM`, `p`.`ID_KATEGORI` AS `ID_KATEGORI`, `p`.`NAMA_PROGRAM` AS `NAMA_PROGRAM`, `p`.`INDIVIDU` AS `INDIVIDU`, `p`.`KOLEKTIF` AS `KOLEKTIF`, `p`.`KORPORAT` AS `KORPORAT`, `p`.`DESKRIPSI` AS `DESKRIPSI`, `p`.`SESI` AS `SESI`, `p`.`IMAGE` AS `IMAGE`, `h`.`NAMA_HARI` AS `NAMA_HARI`, `w`.`WAKTU_MULAI` AS `WAKTU_MULAI`, `w`.`WAKTU_BERAKHIR` AS `WAKTU_BERAKHIR` FROM ((((`program` `p` join `detail_program` `d` on(`d`.`ID_PROGRAM` = `p`.`ID_PROGRAM`)) join `jadwal` `j` on(`d`.`ID_JADWAL` = `j`.`ID_JADWAL`)) join `hari` `h` on(`j`.`ID_HARI` = `h`.`ID_HARI`)) join `waktu` `w` on(`j`.`ID_WAKTU` = `w`.`ID_WAKTU`))  ;

-- --------------------------------------------------------

--
-- Structure for view `peserta`
--
DROP TABLE IF EXISTS `peserta`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `peserta`  AS SELECT `c`.`ID_CLIENT` AS `ID_CLIENT`, `c`.`ID_USER` AS `ID_USER`, `c`.`NAMA` AS `NAMA`, `c`.`JK` AS `JK`, `c`.`NO_TELP` AS `NO_TELP`, `c`.`NPWP` AS `NPWP`, `c`.`ALAMAT_NPWP` AS `ALAMAT_NPWP`, `c`.`ALAMAT_RUMAH` AS `ALAMAT_RUMAH`, `c`.`INSTANSI` AS `INSTANSI`, `c`.`JABATAN` AS `JABATAN`, `c`.`BERKAS_NPWP` AS `BERKAS_NPWP`, `c`.`ALUMNI` AS `ALUMNI`, `c`.`CREATED_AT` AS `CREATED_AT`, `u`.`EMAIL` AS `EMAIL`, `u`.`AEEC_EMAIL` AS `AEEC_EMAIL`, `u`.`AEEC_NEWSLETTER` AS `AEEC_NEWSLETTER`, `f`.`NAMA_FAKULTAS` AS `NAMA_FAKULTAS` FROM ((`user` `u` join `client` `c` on(`u`.`ID_USER` = `c`.`ID_USER`)) join `fakultas` `f` on(`c`.`ID_FAKULTAS` = `f`.`ID_FAKULTAS`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch_program`
--
ALTER TABLE `batch_program`
  ADD PRIMARY KEY (`ID_BATCH`),
  ADD KEY `fk_batch_program` (`ID_PROGRAM`);

--
-- Indexes for table `cashback`
--
ALTER TABLE `cashback`
  ADD PRIMARY KEY (`ID_CASHBACK`),
  ADD KEY `fk_user` (`ID_USER`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`ID_CLIENT`),
  ADD KEY `FK_FAKULTAS` (`ID_FAKULTAS`),
  ADD KEY `FK_MEMILIKI_AKUN` (`ID_USER`);

--
-- Indexes for table `detail_program`
--
ALTER TABLE `detail_program`
  ADD PRIMARY KEY (`ID_DETAIL`),
  ADD KEY `fk_jadwal` (`ID_JADWAL`),
  ADD KEY `fk_program` (`ID_PROGRAM`);

--
-- Indexes for table `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`ID_DISKON`);

--
-- Indexes for table `fakultas`
--
ALTER TABLE `fakultas`
  ADD PRIMARY KEY (`ID_FAKULTAS`);

--
-- Indexes for table `hari`
--
ALTER TABLE `hari`
  ADD PRIMARY KEY (`ID_HARI`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`ID_HISTORI`),
  ADD KEY `fk_histori` (`ID_PENDAFTARAN`),
  ADD KEY `fk_histori_client` (`ID_CLIENT`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`ID_JADWAL`),
  ADD KEY `fk_hari` (`ID_HARI`),
  ADD KEY `fk_waktu` (`ID_WAKTU`);

--
-- Indexes for table `kategori_program`
--
ALTER TABLE `kategori_program`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`ID_PEMBAYARAN`),
  ADD KEY `FK_HARUS_MELAKUKAN` (`ID_PENDAFTARAN`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`ID_PENDAFTARAN`),
  ADD KEY `FK_MELAKUKAN` (`ID_CLIENT`),
  ADD KEY `FK_MENDAPATKAN` (`ID_DISKON`),
  ADD KEY `fk_batch` (`ID_BATCH`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`ID_NILAI`),
  ADD KEY `fk_histori_nilai` (`ID_HISTORI`);

--
-- Indexes for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD PRIMARY KEY (`ID_PENYIMPANAN`),
  ADD KEY `fk_client_sosmed` (`ID_CLIENT`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`ID_PROGRAM`),
  ADD KEY `FK_TERDIRI_ATAS` (`ID_KATEGORI`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `waktu`
--
ALTER TABLE `waktu`
  ADD PRIMARY KEY (`ID_WAKTU`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cashback`
--
ALTER TABLE `cashback`
  MODIFY `ID_CASHBACK` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `ID_CLIENT` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `detail_program`
--
ALTER TABLE `detail_program`
  MODIFY `ID_DETAIL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `diskon`
--
ALTER TABLE `diskon`
  MODIFY `ID_DISKON` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `ID_HISTORI` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `ID_JADWAL` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `ID_PEMBAYARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `ID_PENDAFTARAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `ID_NILAI` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  MODIFY `ID_PENYIMPANAN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `ID_USER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT for table `waktu`
--
ALTER TABLE `waktu`
  MODIFY `ID_WAKTU` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cashback`
--
ALTER TABLE `cashback`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `client`
--
ALTER TABLE `client`
  ADD CONSTRAINT `FK_FAKULTAS` FOREIGN KEY (`ID_FAKULTAS`) REFERENCES `fakultas` (`ID_FAKULTAS`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MEMILIKI_AKUN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_program`
--
ALTER TABLE `detail_program`
  ADD CONSTRAINT `fk_jadwal` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal` (`ID_JADWAL`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_program` FOREIGN KEY (`ID_PROGRAM`) REFERENCES `program` (`ID_PROGRAM`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `histori`
--
ALTER TABLE `histori`
  ADD CONSTRAINT `fk_histori` FOREIGN KEY (`ID_PENDAFTARAN`) REFERENCES `pendaftaran` (`ID_PENDAFTARAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_histori_client` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_hari` FOREIGN KEY (`ID_HARI`) REFERENCES `hari` (`ID_HARI`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_waktu` FOREIGN KEY (`ID_WAKTU`) REFERENCES `waktu` (`ID_WAKTU`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `FK_HARUS_MELAKUKAN` FOREIGN KEY (`ID_PENDAFTARAN`) REFERENCES `pendaftaran` (`ID_PENDAFTARAN`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_MENDAPATKAN` FOREIGN KEY (`ID_DISKON`) REFERENCES `diskon` (`ID_DISKON`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_batch` FOREIGN KEY (`ID_BATCH`) REFERENCES `batch_program` (`ID_BATCH`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD CONSTRAINT `fk_histori_nilai` FOREIGN KEY (`ID_HISTORI`) REFERENCES `histori` (`ID_HISTORI`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penyimpanan`
--
ALTER TABLE `penyimpanan`
  ADD CONSTRAINT `fk_client_sosmed` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
