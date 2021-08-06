create database restoman;
USE `restoman`;

CREATE TABLE `pegawai` (
  `id_pegawai` VARCHAR(10) NOT NULL,
  `nama_pegawai` VARCHAR(50) DEFAULT NULL,
  `kategori_pegawai` VARCHAR(15) DEFAULT NULL,
  `password` VARCHAR(64) DEFAULT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=INNODB;

CREATE TABLE `kategori` (
  `id_kategori` VARCHAR(5) NOT NULL,
  `nama_kategori` VARCHAR(30) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=INNODB;


CREATE TABLE `meja` (
  `id_meja` INT NOT NULL AUTO_INCREMENT,
  `total_pelanggan` INT DEFAULT NULL,
  `status_ketersediaan` ENUM('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_meja`)
) ENGINE=INNODB;

CREATE TABLE `pesanan` (
  `id_pesanan` INT NOT NULL AUTO_INCREMENT,
  `id_pegawai` VARCHAR(10) DEFAULT NULL,
  `id_meja` INT DEFAULT NULL,
  `atas_nama` VARCHAR(50) DEFAULT NULL,
  `status_pesanan` ENUM('Y','N') DEFAULT NULL,
  `status_pembayaran` ENUM('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_pesanan`),
  KEY `FK_pesanan_1` (`id_pegawai`),
  KEY `FK_pesanan_2` (`id_meja`),
  CONSTRAINT `FK_pesanan_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pesanan_2` FOREIGN KEY (`id_meja`) REFERENCES `meja` (`id_meja`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE `menu` (
  `id_menu` VARCHAR(10) NOT NULL,
  `id_pegawai` VARCHAR(10) DEFAULT NULL,
  `id_kategori` VARCHAR(5) DEFAULT NULL,
  `nama_menu` VARCHAR(30) DEFAULT NULL,
  `gambar` VARCHAR(30) DEFAULT NULL,
  `harga_menu` INT DEFAULT NULL,
  `stok` INT DEFAULT NULL,
  `status` ENUM('Y','N') DEFAULT NULL,
  PRIMARY KEY (`id_menu`),
  KEY `FK_menu_1` (`id_pegawai`),
  KEY `FK_menu_2` (`id_kategori`),
  CONSTRAINT `FK_menu_1` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_menu_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;



DROP TABLE IF EXISTS `detail_pesanan`;

CREATE TABLE `detail_pesanan` (
  `id_pesanan` INT DEFAULT NULL,
  `id_menu` VARCHAR(10) DEFAULT NULL,
  `jumlah` INT DEFAULT NULL,
  `sub_total` INT DEFAULT NULL,
  KEY `FK_detail_pesanan_1` (`id_pesanan`),
  KEY `FK_detail_pesanan_2` (`id_menu`),
  CONSTRAINT `FK_detail_pesanan_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_detail_pesanan_2` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;


DROP TABLE IF EXISTS `kasir`;

CREATE TABLE `kasir` (
  `id_kasir` VARCHAR(10) DEFAULT NULL,
  `shift` VARCHAR(15) DEFAULT NULL,
  KEY `FK_kasir_1` (`id_kasir`),
  CONSTRAINT `FK_kasir_1` FOREIGN KEY (`id_kasir`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;


DROP TABLE IF EXISTS `koki`;

CREATE TABLE `koki` (
  `id_koki` VARCHAR(10) DEFAULT NULL,
  `keahlian` VARBINARY(20) DEFAULT NULL,
  KEY `FK_koki_1` (`id_koki`),
  CONSTRAINT `FK_koki_1` FOREIGN KEY (`id_koki`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE `owner` (
  `id_owner` VARCHAR(10) DEFAULT NULL,
  `lulusan` VARCHAR(30) DEFAULT NULL,
  KEY `FK_owner_1` (`id_owner`),
  CONSTRAINT `FK_owner_1` FOREIGN KEY (`id_owner`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE `pelayan` (
  `id_pelayan` VARCHAR(10) DEFAULT NULL,
  `bagian` VARCHAR(20) DEFAULT NULL,
  KEY `FK_pelayan_1` (`id_pelayan`),
  CONSTRAINT `FK_pelayan_1` FOREIGN KEY (`id_pelayan`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

CREATE TABLE `pembayaran` (
  `id_pesanan` INT DEFAULT NULL,
  `id_pegawai` VARCHAR(10) DEFAULT NULL,
  `total_transaksi` INT DEFAULT NULL,
  `tgl_transaksi` DATE DEFAULT NULL,
  KEY `FK_pembayaran_1` (`id_pesanan`),
  KEY `FK_pembayaran_2` (`id_pegawai`),
  CONSTRAINT `FK_pembayaran_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_pembayaran_2` FOREIGN KEY (`id_pegawai`) REFERENCES `pegawai` (`id_pegawai`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=INNODB;

INSERT INTO pegawai 
VALUES
('OW001','Reichan Muhammad Maulana','Owner','/cZeSt7jVVg='),
('KS001','Rizky Septiana Abdul Razak','Kasir','/cZeSt7jVVg='),
('KK001','Primarazaq N. P. H.','Koki','/cZeSt7jVVg='),
('PL001','Angga Cahya Abadi','Pelayan','/cZeSt7jVVg='),
('PL002','Ikhsan Nurul Rizki','Pelayan','/cZeSt7jVVg=');



