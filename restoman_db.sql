/*
SQLyog Ultimate v12.5.1 (64 bit)
MySQL - 8.0.23 : Database - restoman_db
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`restoman_db` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;

USE `restoman_db`;

/*Table structure for table `detail_pesanan` */

DROP TABLE IF EXISTS `detail_pesanan`;

CREATE TABLE `detail_pesanan` (
  `id_pesanan` int DEFAULT NULL,
  `id_menu` varchar(10) DEFAULT NULL,
  `jumlah` int DEFAULT NULL,
  `sub_total` int DEFAULT NULL,
  KEY `FK_detail_pesanan_1` (`id_pesanan`),
  KEY `FK_detail_pesanan_2` (`id_menu`),
  CONSTRAINT `FK_detail_pesanan_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pesanan_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `detail_pesanan` */

/*Table structure for table `kasir` */

DROP TABLE IF EXISTS `kasir`;

CREATE TABLE `kasir` (
  `id_kasir` varchar(10) DEFAULT NULL,
  `shift` varchar(15) DEFAULT NULL,
  KEY `FK_kasir_1` (`id_kasir`),
  CONSTRAINT `FK_kasir_1` FOREIGN KEY (`id_kasir`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `kasir` */

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `kategori` */

/*Table structure for table `koki` */

DROP TABLE IF EXISTS `koki`;

CREATE TABLE `koki` (
  `id_koki` varchar(10) DEFAULT NULL,
  `keahlian` varbinary(20) DEFAULT NULL,
  KEY `FK_koki_1` (`id_koki`),
  CONSTRAINT `FK_koki_1` FOREIGN KEY (`id_koki`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `koki` */

/*Table structure for table `meja` */

DROP TABLE IF EXISTS `meja`;

CREATE TABLE `meja` (
  `id_meja` int NOT NULL AUTO_INCREMENT,
  `total_pelanggan` int DEFAULT NULL,
  `status_ketersediaan` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `meja` */

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id_menu` varchar(10) NOT NULL,
  `id_pegawai` varchar(10) DEFAULT NULL,
  `id_kategori` varchar(5) DEFAULT NULL,
  `nama_menu` varchar(30) DEFAULT NULL,
  `gambar` varchar(30) DEFAULT NULL,
  `harga_menu` int DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `persetujuan` enum('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `FK_menu_1` (`id_pegawai`),
  KEY `FK_menu_2` (`id_kategori`),
  CONSTRAINT `FK_menu_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_menu_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `menu` */

/*Table structure for table `owner` */

DROP TABLE IF EXISTS `owner`;

CREATE TABLE `owner` (
  `id_owner` varchar(10) DEFAULT NULL,
  `lulusan` varchar(30) DEFAULT NULL,
  KEY `FK_owner_1` (`id_owner`),
  CONSTRAINT `FK_owner_1` FOREIGN KEY (`id_owner`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `owner` */

/*Table structure for table `pegawai` */

DROP TABLE IF EXISTS `pegawai`;

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(10) NOT NULL,
  `nama_pegawai` varchar(50) DEFAULT NULL,
  `kategori_pegawai` varchar(15) DEFAULT NULL,
  `password` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pegawai` */

/*Table structure for table `pelayan` */

DROP TABLE IF EXISTS `pelayan`;

CREATE TABLE `pelayan` (
  `id_pelayan` varchar(10) DEFAULT NULL,
  `bagian` varchar(20) DEFAULT NULL,
  KEY `FK_pelayan_1` (`id_pelayan`),
  CONSTRAINT `FK_pelayan_1` FOREIGN KEY (`id_pelayan`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pelayan` */

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pesanan` int DEFAULT NULL,
  `id_pegawai` varchar(10) DEFAULT NULL,
  `total_transaksi` int DEFAULT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  KEY `FK_pembayaran_1` (`id_pesanan`),
  KEY `FK_pembayaran_2` (`id_pegawai`),
  CONSTRAINT `FK_pembayaran_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pembayaran_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pembayaran` */

/*Table structure for table `pesanan` */

DROP TABLE IF EXISTS `pesanan`;

CREATE TABLE `pesanan` (
  `id_pesanan` int NOT NULL AUTO_INCREMENT,
  `id_pegawai` varchar(10) DEFAULT NULL,
  `id_meja` int DEFAULT NULL,
  `atas_nama` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `FK_pesanan_1` (`id_pegawai`),
  KEY `FK_pesanan_2` (`id_meja`),
  CONSTRAINT `FK_pesanan_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pesanan_2` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

/*Data for the table `pesanan` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
