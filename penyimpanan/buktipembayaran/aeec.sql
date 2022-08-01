/*
SQLyog Professional v12.5.1 (64 bit)
MySQL - 10.4.16-MariaDB : Database - aeec
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`aeec` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `aeec`;

/*Table structure for table `batch_program` */

DROP TABLE IF EXISTS `batch_program`;

CREATE TABLE `batch_program` (
  `ID_BATCH` char(10) NOT NULL,
  `ID_PROGRAM` char(10) NOT NULL,
  `NAMA_CLASS` varchar(255) NOT NULL,
  `TGL_MULAI` date NOT NULL,
  `TGL_BERAKHIR` date DEFAULT NULL,
  `BATCH` int(11) DEFAULT NULL,
  `STATUS` char(1) NOT NULL DEFAULT '1',
  `WAKTU_MULAI` time DEFAULT NULL,
  `WAKTU_BERAKHIR` time DEFAULT NULL,
  `IMAGE` text DEFAULT NULL,
  PRIMARY KEY (`ID_BATCH`),
  KEY `fk_batch_program` (`ID_PROGRAM`),
  CONSTRAINT `fk_batch_program` FOREIGN KEY (`ID_PROGRAM`) REFERENCES `program` (`ID_PROGRAM`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `batch_program` */

insert  into `batch_program`(`ID_BATCH`,`ID_PROGRAM`,`NAMA_CLASS`,`TGL_MULAI`,`TGL_BERAKHIR`,`BATCH`,`STATUS`,`WAKTU_MULAI`,`WAKTU_BERAKHIR`,`IMAGE`) values 
('DL001','DL','DIGITAL LEADERSHIP BATCH 1','2022-04-28','2022-04-28',1,'1',NULL,NULL,NULL),
('FFNF001','FFNF','FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER BATCH 1','2022-04-28','2022-04-28',1,'1',NULL,NULL,NULL),
('SMA','ET','Strategic Management Accounting : Cost and Value - Virtual','2021-03-13',NULL,NULL,'1','09:30:00','10:30:00','register (3).png');

/*Table structure for table `cashback` */

DROP TABLE IF EXISTS `cashback`;

CREATE TABLE `cashback` (
  `ID_CASHBACK` char(8) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `NOMINAL` int(11) NOT NULL,
  `KADALUWARSA` date NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_CASHBACK`),
  KEY `fk_user` (`ID_USER`),
  CONSTRAINT `fk_user` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `cashback` */

/*Table structure for table `client` */

DROP TABLE IF EXISTS `client`;

CREATE TABLE `client` (
  `ID_CLIENT` char(10) NOT NULL,
  `ID_USER` char(10) NOT NULL,
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
  `CREATED_AT` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_CLIENT`),
  KEY `FK_MEMILIKI_AKUN` (`ID_USER`),
  CONSTRAINT `FK_MEMILIKI_AKUN` FOREIGN KEY (`ID_USER`) REFERENCES `user` (`ID_USER`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `client` */

insert  into `client`(`ID_CLIENT`,`ID_USER`,`NAMA`,`JK`,`NO_TELP`,`NPWP`,`ALAMAT_NPWP`,`ALAMAT_RUMAH`,`INSTANSI`,`JABATAN`,`BERKAS_NPWP`,`ALUMNI`,`CREATED_AT`) values 
('PS04220001','US04220001','Hamimma','1','085706568677','123456789','Jl.Joyooboyo','Jl.Pattimura','Unair','dekan','login (3).png','1','2022-04-21'),
('PS05220001','US04220003','Hamimma Talita Aulia','1','085706568677','Logo Unair.png','JL JOYOBOYO 89','JL JOYOBOYO 89','unair','dosen','Logo Unair.png','1','2022-05-19'),
('PS05220002','US05220001','tes1','0','123','ttd pras.png','asd','asd','unair','dosen','ttd pras.png','0','2022-05-19'),
('PS05220003','US05220002','tes2','0','123','Mahatma Wasi.png','asd','asd','unair','dosen','Mahatma Wasi.png','1','2022-05-19'),
('PS05220004','US05220003','tes3','0','123','ttd hasbi-01.png','asd','asd','unair','dosen','ttd hasbi-01.png','0','2022-05-19');

/*Table structure for table `detail_program` */

DROP TABLE IF EXISTS `detail_program`;

CREATE TABLE `detail_program` (
  `ID_DETAIL` char(4) NOT NULL,
  `ID_PROGRAM` char(10) NOT NULL,
  `ID_JADWAL` char(3) NOT NULL,
  PRIMARY KEY (`ID_DETAIL`),
  KEY `fk_program` (`ID_PROGRAM`),
  KEY `fk_jadwal` (`ID_JADWAL`),
  CONSTRAINT `fk_jadwal` FOREIGN KEY (`ID_JADWAL`) REFERENCES `jadwal` (`ID_JADWAL`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_program` FOREIGN KEY (`ID_PROGRAM`) REFERENCES `program` (`ID_PROGRAM`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_program` */

insert  into `detail_program`(`ID_DETAIL`,`ID_PROGRAM`,`ID_JADWAL`) values 
('DJ01','DL','J03'),
('DJ02','DL','J01'),
('DJ03','FFNF','J01'),
('DJ04','FFNF','J03');

/*Table structure for table `diskon` */

DROP TABLE IF EXISTS `diskon`;

CREATE TABLE `diskon` (
  `ID_DISKON` char(3) NOT NULL,
  `NAMA_DISKON` varchar(50) NOT NULL,
  `PERSENTASE` int(11) NOT NULL,
  `BENTUK` varchar(255) NOT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  PRIMARY KEY (`ID_DISKON`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `diskon` */

insert  into `diskon`(`ID_DISKON`,`NAMA_DISKON`,`PERSENTASE`,`BENTUK`,`DESKRIPSI`) values 
('D01','Voucher 5%',5,'voucher',NULL),
('D02','Cashback 10%',10,'cashback',NULL),
('D03','Cashback 5% ',5,'cashback','\r\n   \r\n ');

/*Table structure for table `hari` */

DROP TABLE IF EXISTS `hari`;

CREATE TABLE `hari` (
  `ID_HARI` char(2) NOT NULL,
  `NAMA_HARI` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_HARI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `hari` */

insert  into `hari`(`ID_HARI`,`NAMA_HARI`) values 
('H1','SENIN'),
('H2','SELASA'),
('H3','RABU'),
('H4','KAMIS'),
('H5','JUMAT'),
('H6','SABTU'),
('H7','MINGGU');

/*Table structure for table `histori` */

DROP TABLE IF EXISTS `histori`;

CREATE TABLE `histori` (
  `ID_HISTORI` char(10) NOT NULL,
  `ID_CLIENT` char(10) NOT NULL,
  `ID_PENDAFTARAN` char(10) NOT NULL,
  `CREATED_AT` datetime NOT NULL DEFAULT current_timestamp(),
  `STATUS` char(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID_HISTORI`),
  KEY `fk_histori_client` (`ID_CLIENT`),
  KEY `fk_histori` (`ID_PENDAFTARAN`),
  CONSTRAINT `fk_histori` FOREIGN KEY (`ID_PENDAFTARAN`) REFERENCES `pendaftaran` (`ID_PENDAFTARAN`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_histori_client` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `histori` */

/*Table structure for table `jadwal` */

DROP TABLE IF EXISTS `jadwal`;

CREATE TABLE `jadwal` (
  `ID_JADWAL` char(3) NOT NULL,
  `ID_HARI` char(3) NOT NULL,
  `ID_WAKTU` char(3) NOT NULL,
  PRIMARY KEY (`ID_JADWAL`),
  KEY `fk_hari` (`ID_HARI`),
  KEY `fk_waktu` (`ID_WAKTU`),
  CONSTRAINT `fk_hari` FOREIGN KEY (`ID_HARI`) REFERENCES `hari` (`ID_HARI`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_waktu` FOREIGN KEY (`ID_WAKTU`) REFERENCES `waktu` (`ID_WAKTU`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `jadwal` */

insert  into `jadwal`(`ID_JADWAL`,`ID_HARI`,`ID_WAKTU`) values 
('J01','H2','T01'),
('J02','H3','T02'),
('J03','H4','T01'),
('J04','H5','T02'),
('J05','H6','T03'),
('J06','H1','T02'),
('J07','H1','T01');

/*Table structure for table `kategori_program` */

DROP TABLE IF EXISTS `kategori_program`;

CREATE TABLE `kategori_program` (
  `ID_KATEGORI` char(5) NOT NULL,
  `NAMA_KATEGORI` varchar(255) NOT NULL,
  PRIMARY KEY (`ID_KATEGORI`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori_program` */

insert  into `kategori_program`(`ID_KATEGORI`,`NAMA_KATEGORI`) values 
('IHT','In House Training'),
('NRC','Non-Regular Class'),
('RC','Regular Class');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `ID_PEMBAYARAN` char(10) NOT NULL,
  `ID_PENDAFTARAN` char(10) NOT NULL,
  `TGL_PEMBAYARAN` date NOT NULL,
  `NOMINAL` int(11) NOT NULL,
  `BUKTI` varchar(1024) NOT NULL,
  `STATUS` char(1) NOT NULL,
  PRIMARY KEY (`ID_PEMBAYARAN`),
  KEY `FK_HARUS_MELAKUKAN` (`ID_PENDAFTARAN`),
  CONSTRAINT `FK_HARUS_MELAKUKAN` FOREIGN KEY (`ID_PENDAFTARAN`) REFERENCES `pendaftaran` (`ID_PENDAFTARAN`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pembayaran` */

/*Table structure for table `pendaftaran` */

DROP TABLE IF EXISTS `pendaftaran`;

CREATE TABLE `pendaftaran` (
  `ID_PENDAFTARAN` char(10) NOT NULL,
  `ID_BATCH` char(10) NOT NULL,
  `ID_CLIENT` char(10) NOT NULL,
  `ID_DISKON` char(3) DEFAULT NULL,
  `TGL_PENDAFTARAN` date NOT NULL,
  `TAGIHAN` int(11) NOT NULL,
  `STATUS` char(1) NOT NULL,
  `VIRTUAL_ACC` varchar(1024) DEFAULT NULL,
  PRIMARY KEY (`ID_PENDAFTARAN`),
  KEY `FK_MELAKUKAN` (`ID_CLIENT`),
  KEY `FK_MEMILIH` (`ID_BATCH`),
  KEY `FK_MENDAPATKAN` (`ID_DISKON`),
  CONSTRAINT `FK_MELAKUKAN` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_MENDAPATKAN` FOREIGN KEY (`ID_DISKON`) REFERENCES `diskon` (`ID_DISKON`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_batch` FOREIGN KEY (`ID_BATCH`) REFERENCES `batch_program` (`ID_BATCH`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `pendaftaran` */

/*Table structure for table `penyimpanan` */

DROP TABLE IF EXISTS `penyimpanan`;

CREATE TABLE `penyimpanan` (
  `ID_PENYIMPANAN` int(11) NOT NULL AUTO_INCREMENT,
  `ID_CLIENT` char(10) NOT NULL,
  `IG` varchar(255) DEFAULT NULL,
  `TWITTER` varchar(255) DEFAULT NULL,
  `FACEBOOK` varchar(255) DEFAULT NULL,
  `YOUTUBE` varchar(255) DEFAULT NULL,
  `LINKEDIN` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`ID_PENYIMPANAN`),
  KEY `fk_client_sosmed` (`ID_CLIENT`),
  CONSTRAINT `fk_client_sosmed` FOREIGN KEY (`ID_CLIENT`) REFERENCES `client` (`ID_CLIENT`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `penyimpanan` */

/*Table structure for table `program` */

DROP TABLE IF EXISTS `program`;

CREATE TABLE `program` (
  `ID_PROGRAM` char(10) NOT NULL,
  `ID_KATEGORI` char(5) NOT NULL,
  `NAMA_PROGRAM` varchar(255) NOT NULL,
  `INDIVIDU` int(11) DEFAULT NULL,
  `KOLEKTIF` int(11) DEFAULT NULL,
  `KORPORAT` int(11) DEFAULT NULL,
  `DESKRIPSI` text DEFAULT NULL,
  `SESI` int(11) DEFAULT NULL,
  `KUOTA` int(11) DEFAULT NULL,
  `IMAGE` text DEFAULT NULL,
  PRIMARY KEY (`ID_PROGRAM`),
  KEY `FK_TERDIRI_ATAS` (`ID_KATEGORI`),
  CONSTRAINT `FK_TERDIRI_ATAS` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori_program` (`ID_KATEGORI`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `program` */

insert  into `program`(`ID_PROGRAM`,`ID_KATEGORI`,`NAMA_PROGRAM`,`INDIVIDU`,`KOLEKTIF`,`KORPORAT`,`DESKRIPSI`,`SESI`,`KUOTA`,`IMAGE`) values 
('DL','RC','DIGITAL LEADERSHIP',2220000,2220000,1554000,'a',7,20,'register (3).png'),
('EI','NRC','EXECUTIVE INSIGHTS',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
('ET','NRC','EXECUTIVE TALK',NULL,NULL,NULL,NULL,NULL,NULL,NULL),
('FFNF','RC','FINANCE ACCOUNTING FOR NON-FINANCIAL MANAGER',2220000,1776000,1243200,'ll',7,20,'landing page (2).png');

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `ID_USER` char(10) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL,
  `ROLE` char(10) NOT NULL,
  `CREATED_AT` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_USER`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `user` */

insert  into `user`(`ID_USER`,`EMAIL`,`PASSWORD`,`ROLE`,`CREATED_AT`) values 
('US04220001','talitaaulia91@gmail.com','$2y$10$Hu/PE92imsnKcUTgwW5ltexcSk3e5fi4ib9l5JKRoFaxp74tvIJ4y','user','2022-04-21'),
('US04220002','administrator@gmail.com','$2y$10$TcJZVrSGSfk8sbD.WOarCegkAwH19FekodVP1YSSbcIGR7mrP.Bx.','admin','2022-04-21'),
('US04220003','lia@gmail.com','$2y$10$TphVcH0NwdbJbL20JP3Mz.FL8jUkt294sxfSbR5QIWdTr3DvxLdAi','user','2022-04-28'),
('US05220001','tes1@gmail.com','$2y$10$1mAiOsGoPObZN7ND2YPPBOECk7lSEsqsCK57y8bJZF2qVeV0YU0wC','user','2022-05-12'),
('US05220002','tes2@gmail.com','$2y$10$mpomsPTll7hVg.oeN6QfB.zApN4bF9bA02B7lq7zTKtXn4ktyH0VG','user','2022-05-12'),
('US05220003','tes3@gmail.com','$2y$10$zgJc0HXYvj2SN3AHhOGNN.SjFKbS2diOOxOAFEfaKajTsKeYH1Gte','user','2022-05-12');

/*Table structure for table `waktu` */

DROP TABLE IF EXISTS `waktu`;

CREATE TABLE `waktu` (
  `ID_WAKTU` char(3) NOT NULL,
  `WAKTU_MULAI` time NOT NULL,
  `WAKTU_BERAKHIR` time NOT NULL,
  PRIMARY KEY (`ID_WAKTU`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `waktu` */

insert  into `waktu`(`ID_WAKTU`,`WAKTU_MULAI`,`WAKTU_BERAKHIR`) values 
('T01','18:30:00','20:30:00'),
('T02','10:00:00','12:00:00'),
('T03','09:00:00','16:00:00');

/* Trigger structure for table `cashback` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_cashback` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_cashback` BEFORE INSERT ON `cashback` FOR EACH ROW 
BEGIN 
	SET NEW.ID_CASHBACK = CONCAT('C',DATE_FORMAT(NEW.CREATED_AT, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_CASHBACK,6,3)AS INT) 
	FROM cashback
	WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
	ORDER BY ID_CASHBACK DESC 
	LIMIT 1),0)+1),3,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `client` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_client` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_client` BEFORE INSERT ON `client` FOR EACH ROW 
BEGIN 
	SET NEW.ID_CLIENT = CONCAT('PS',DATE_FORMAT(NEW.CREATED_AT, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_CLIENT,7,4)AS INT) 
	FROM client
	WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
	ORDER BY ID_CLIENT DESC 
	LIMIT 1),0)+1),4,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `detail_program` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_detail_program` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_detail_program` BEFORE INSERT ON `detail_program` FOR EACH ROW 
BEGIN
	SET NEW.ID_DETAIL = CONCAT('DJ',LPAD((
	IFNULL((SELECT CAST(SUBSTR(ID_DETAIL,3,4)AS INT) 
	FROM detail_program
	ORDER BY ID_DETAIL DESC 
	LIMIT 1),0)+1),2,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `diskon` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_diskon` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_diskon` BEFORE INSERT ON `diskon` FOR EACH ROW 
BEGIN
	SET NEW.ID_DISKON = CONCAT('D',LPAD((
	IFNULL((SELECT CAST(SUBSTR(ID_DISKON,2,3)AS INT) 
	FROM diskon
	ORDER BY ID_DISKON DESC 
	LIMIT 1),0)+1),2,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `histori` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_histori` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_histori` BEFORE INSERT ON `histori` FOR EACH ROW 
BEGIN 
	SET NEW.ID_HISTORI = CONCAT('HS',DATE_FORMAT(NEW.CREATED_AT, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_HISTORI,7,4)AS INT) 
	FROM histori
	WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
	ORDER BY ID_HISTORI DESC 
	LIMIT 1),0)+1),4,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `jadwal` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_jadwal` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_jadwal` BEFORE INSERT ON `jadwal` FOR EACH ROW 
BEGIN
	SET NEW.ID_JADWAL = CONCAT('J',LPAD((
	IFNULL((SELECT CAST(SUBSTR(ID_JADWAL,2,3)AS INT) 
	FROM jadwal
	ORDER BY ID_JADWAL DESC 
	LIMIT 1),0)+1),2,"0"));
END */$$


DELIMITER ;

/* Trigger structure for table `pembayaran` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_pembayaran` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_pembayaran` BEFORE INSERT ON `pembayaran` FOR EACH ROW 
BEGIN 
	SET NEW.ID_PEMBAYARAN = CONCAT('PAY',DATE_FORMAT(NEW.TGL_PEMBAYARAN, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_PEMBAYARAN,8,3)AS INT) 
	FROM pembayaran
	WHERE  DATE_FORMAT(TGL_PEMBAYARAN, "%m") = DATE_FORMAT(NEW.TGL_PEMBAYARAN, "%m")
	ORDER BY ID_PEMBAYARAN DESC 
	LIMIT 1),0)+1),3,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `pendaftaran` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_pendaftaran` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_pendaftaran` BEFORE INSERT ON `pendaftaran` FOR EACH ROW 
BEGIN 
	SET NEW.ID_PENDAFTARAN = CONCAT('REG',DATE_FORMAT(NEW.TGL_PENDAFTARAN, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_PENDAFTARAN,8,3)AS INT) 
	FROM pendaftaran
	WHERE  DATE_FORMAT(TGL_PENDAFTARAN, "%m") = DATE_FORMAT(NEW.TGL_PENDAFTARAN,"%m")
	ORDER BY ID_PENDAFTARAN DESC 
	LIMIT 1),0)+1),3,"0")); 
END */$$


DELIMITER ;

/* Trigger structure for table `user` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `before_insert_user` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `before_insert_user` BEFORE INSERT ON `user` FOR EACH ROW 
BEGIN 
	SET NEW.ID_USER = CONCAT('US',DATE_FORMAT(NEW.CREATED_AT, "%m"),
	CAST(SUBSTR(YEAR(SYSDATE()),3,4)AS INT),
	LPAD((IFNULL((SELECT CAST(SUBSTR(ID_USER,7,4)AS INT) 
	FROM USER
	WHERE DATE_FORMAT(CREATED_AT,"%m") = DATE_FORMAT(NEW.CREATED_AT,"%m")
	ORDER BY ID_USER DESC 
	LIMIT 1),0)+1),4,"0")); 
END */$$


DELIMITER ;

/* Function  structure for function  `cashback10` */

/*!50003 DROP FUNCTION IF EXISTS `cashback10` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `cashback10`(id VARCHAR(10)) RETURNS int(11)
BEGIN
DECLARE hitung INT;
SELECT INDIVIDU * 10/100 INTO hitung
FROM program
WHERE ID_PROGRAM = id;
RETURN hitung;
END */$$
DELIMITER ;

/* Function  structure for function  `cashback5` */

/*!50003 DROP FUNCTION IF EXISTS `cashback5` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `cashback5`(id VARCHAR(10)) RETURNS int(11)
BEGIN
DECLARE hitung INT;
SELECT INDIVIDU * 5/100 INTO hitung
FROM program
WHERE ID_PROGRAM = id;
RETURN hitung;
END */$$
DELIMITER ;

/* Function  structure for function  `voucher5` */

/*!50003 DROP FUNCTION IF EXISTS `voucher5` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `voucher5`(id VARCHAR(10)) RETURNS int(11)
BEGIN
DECLARE hitung INT;
SELECT INDIVIDU - (INDIVIDU * 5/100) INTO hitung
FROM program
WHERE ID_PROGRAM = id;
RETURN hitung;
END */$$
DELIMITER ;

/*Table structure for table `full_program` */

DROP TABLE IF EXISTS `full_program`;

/*!50001 DROP VIEW IF EXISTS `full_program` */;
/*!50001 DROP TABLE IF EXISTS `full_program` */;

/*!50001 CREATE TABLE  `full_program`(
 `ID_PROGRAM` char(10) ,
 `ID_KATEGORI` char(5) ,
 `NAMA_PROGRAM` varchar(255) ,
 `INDIVIDU` int(11) ,
 `KOLEKTIF` int(11) ,
 `KORPORAT` int(11) ,
 `DESKRIPSI` text ,
 `SESI` int(11) ,
 `KUOTA` int(11) ,
 `IMAGE` text ,
 `NAMA_HARI` varchar(255) ,
 `WAKTU_MULAI` time ,
 `WAKTU_BERAKHIR` time 
)*/;

/*Table structure for table `peserta` */

DROP TABLE IF EXISTS `peserta`;

/*!50001 DROP VIEW IF EXISTS `peserta` */;
/*!50001 DROP TABLE IF EXISTS `peserta` */;

/*!50001 CREATE TABLE  `peserta`(
 `ID_CLIENT` char(10) ,
 `ID_USER` char(10) ,
 `NAMA` varchar(255) ,
 `JK` char(1) ,
 `NO_TELP` varchar(14) ,
 `NPWP` varchar(17) ,
 `ALAMAT_NPWP` varchar(255) ,
 `ALAMAT_RUMAH` varchar(255) ,
 `INSTANSI` varchar(255) ,
 `JABATAN` varchar(255) ,
 `BERKAS_NPWP` varchar(255) ,
 `ALUMNI` char(1) ,
 `CREATED_AT` date ,
 `EMAIL` varchar(255) 
)*/;

/*View structure for view full_program */

/*!50001 DROP TABLE IF EXISTS `full_program` */;
/*!50001 DROP VIEW IF EXISTS `full_program` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `full_program` AS select `p`.`ID_PROGRAM` AS `ID_PROGRAM`,`p`.`ID_KATEGORI` AS `ID_KATEGORI`,`p`.`NAMA_PROGRAM` AS `NAMA_PROGRAM`,`p`.`INDIVIDU` AS `INDIVIDU`,`p`.`KOLEKTIF` AS `KOLEKTIF`,`p`.`KORPORAT` AS `KORPORAT`,`p`.`DESKRIPSI` AS `DESKRIPSI`,`p`.`SESI` AS `SESI`,`p`.`KUOTA` AS `KUOTA`,`p`.`IMAGE` AS `IMAGE`,`h`.`NAMA_HARI` AS `NAMA_HARI`,`w`.`WAKTU_MULAI` AS `WAKTU_MULAI`,`w`.`WAKTU_BERAKHIR` AS `WAKTU_BERAKHIR` from ((((`program` `p` join `detail_program` `d` on(`d`.`ID_PROGRAM` = `p`.`ID_PROGRAM`)) join `jadwal` `j` on(`d`.`ID_JADWAL` = `j`.`ID_JADWAL`)) join `hari` `h` on(`j`.`ID_HARI` = `h`.`ID_HARI`)) join `waktu` `w` on(`j`.`ID_WAKTU` = `w`.`ID_WAKTU`)) */;

/*View structure for view peserta */

/*!50001 DROP TABLE IF EXISTS `peserta` */;
/*!50001 DROP VIEW IF EXISTS `peserta` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `peserta` AS select `c`.`ID_CLIENT` AS `ID_CLIENT`,`c`.`ID_USER` AS `ID_USER`,`c`.`NAMA` AS `NAMA`,`c`.`JK` AS `JK`,`c`.`NO_TELP` AS `NO_TELP`,`c`.`NPWP` AS `NPWP`,`c`.`ALAMAT_NPWP` AS `ALAMAT_NPWP`,`c`.`ALAMAT_RUMAH` AS `ALAMAT_RUMAH`,`c`.`INSTANSI` AS `INSTANSI`,`c`.`JABATAN` AS `JABATAN`,`c`.`BERKAS_NPWP` AS `BERKAS_NPWP`,`c`.`ALUMNI` AS `ALUMNI`,`c`.`CREATED_AT` AS `CREATED_AT`,`u`.`EMAIL` AS `EMAIL` from (`user` `u` join `client` `c` on(`u`.`ID_USER` = `c`.`ID_USER`)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
