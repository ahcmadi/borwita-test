-- Valentina Studio --
-- MySQL dump --
-- ---------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
-- ---------------------------------------------------------


-- CREATE DATABASE "borwita" -------------------------------
CREATE DATABASE IF NOT EXISTS `borwita` CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `borwita`;
-- ---------------------------------------------------------


-- CREATE TABLE "detail_pembelian" -----------------------------
CREATE TABLE `detail_pembelian` ( 
	`kode_pembelian` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`kode_barang` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`harga_satuan` Double( 22, 0 ) NOT NULL,
	`jumlah` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `kode_pembelian`, `kode_barang` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "detail_penjualan" -----------------------------
CREATE TABLE `detail_penjualan` ( 
	`kode_penjualan` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`kode_barang` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`harga_satuan` Double( 22, 0 ) NOT NULL,
	`jumlah` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `kode_penjualan`, `kode_barang` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "master_barang" --------------------------------
CREATE TABLE `master_barang` ( 
	`kode_barang` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`nama_barang` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`deskripsi_barang` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`harga_satuan` Double( 22, 0 ) NOT NULL,
	`stok` Int( 11 ) NOT NULL,
	PRIMARY KEY ( `kode_barang` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "master_pelanggan" -----------------------------
CREATE TABLE `master_pelanggan` ( 
	`kode_pelanggan` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`nama_pelanggan` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`no_telp_pelanggan` VarChar( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`alamat_pelanggan` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `kode_pelanggan` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "master_supplier" ------------------------------
CREATE TABLE `master_supplier` ( 
	`kode_supplier` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`nama_supplier` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`no_telp_supplier` VarChar( 15 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`alamat_pelanggan` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `kode_supplier` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "master_user" ----------------------------------
CREATE TABLE `master_user` ( 
	`username` VarChar( 20 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`password` VarChar( 100 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`jabatan` VarChar( 30 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `username` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "pembelian" ------------------------------------
CREATE TABLE `pembelian` ( 
	`kode_pembelian` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`tanggal_pembelian` DateTime NOT NULL,
	`kode_supplier` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`total_biaya` Double( 22, 0 ) NOT NULL,
	`tanggal_dibuat` DateTime NOT NULL,
	`dibuat_oleh` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `kode_pembelian` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "penjualan" ------------------------------------
CREATE TABLE `penjualan` ( 
	`kode_penjualan` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`tanggal_penjualan` DateTime NOT NULL,
	`kode_pelanggan` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`total_biaya` Double( 22, 0 ) NOT NULL,
	`tanggal_dibuat` DateTime NOT NULL,
	`dibuat_oleh` VarChar( 50 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	PRIMARY KEY ( `kode_penjualan` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- CREATE TABLE "menu" -----------------------------------------
CREATE TABLE `menu` ( 
	`menu_id` Int( 11 ) AUTO_INCREMENT NOT NULL,
	`menu` Text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`menu_name` Char( 255 ) CHARACTER SET utf8 COLLATE utf8_general_ci NULL,
	PRIMARY KEY ( `menu_id` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB
AUTO_INCREMENT = 2;
-- -------------------------------------------------------------


-- CREATE TABLE "migration" ------------------------------------
CREATE TABLE `migration` ( 
	`version` VarChar( 180 ) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
	`apply_time` Int( 11 ) NULL,
	PRIMARY KEY ( `version` ) )
CHARACTER SET = utf8
COLLATE = utf8_general_ci
ENGINE = InnoDB;
-- -------------------------------------------------------------


-- Dump data of "detail_pembelian" -------------------------
-- ---------------------------------------------------------


-- Dump data of "detail_penjualan" -------------------------
-- ---------------------------------------------------------


-- Dump data of "master_barang" ----------------------------
INSERT INTO `master_barang`(`kode_barang`,`nama_barang`,`deskripsi_barang`,`harga_satuan`,`stok`) VALUES 
( '0002', 'Nama barang 2', 'Deskripsi 2', '20000', '90' ),
( '003', 'Nama barang 3', 'djflsafas', '1000', '10' ),
( '0111C', 'Nama Barang', 'Deskrikpsi', '10000', '10' );
-- ---------------------------------------------------------


-- Dump data of "master_pelanggan" -------------------------
INSERT INTO `master_pelanggan`(`kode_pelanggan`,`nama_pelanggan`,`no_telp_pelanggan`,`alamat_pelanggan`) VALUES 
( 'P001', 'Pelanggan 1', '4444', 'kljfshfal' ),
( 'P002', 'nama Pelanggan 2', '7777', 'dfasfa' );
-- ---------------------------------------------------------


-- Dump data of "master_supplier" --------------------------
INSERT INTO `master_supplier`(`kode_supplier`,`nama_supplier`,`no_telp_supplier`,`alamat_pelanggan`) VALUES 
( 'S001', 'Nama Supplier 1', '09999', 'alamat ' ),
( 'S002', 'Supplier 2', '09999', 'dsfsaf
' ),
( 'S003', 'Nama supplier 3', '99999', 'fks' ),
( 'S004', 'Nama supplier 4', '88888', 'lfjafa
' );
-- ---------------------------------------------------------


-- Dump data of "master_user" ------------------------------
INSERT INTO `master_user`(`username`,`password`,`jabatan`) VALUES 
( 'admin', 'admin', 'ADMINISTRATOR' ),
( 'fakturis', 'fakturis', 'FAKTURIS' ),
( 'log', 'log', 'LOGISTIK' );
-- ---------------------------------------------------------


-- Dump data of "pembelian" --------------------------------
-- ---------------------------------------------------------


-- Dump data of "penjualan" --------------------------------
-- ---------------------------------------------------------


-- Dump data of "menu" -------------------------------------
INSERT INTO `menu`(`menu_id`,`menu`,`menu_name`) VALUES 
( '0', '', NULL ),
( '1', 'menu1', 'menu-name' );
-- ---------------------------------------------------------


-- Dump data of "migration" --------------------------------
INSERT INTO `migration`(`version`,`apply_time`) VALUES 
( 'm000000_000000_base', '1557544082' ),
( 'm170101_000000_create_menu_table', '1557544085' ),
( 'm170101_000001_humanized_menu_name', '1557544086' );
-- ---------------------------------------------------------


-- CREATE INDEX "detail_pembelian_barang" ----------------------
CREATE INDEX `detail_pembelian_barang` USING BTREE ON `detail_pembelian`( `kode_barang` );
-- -------------------------------------------------------------


-- CREATE INDEX "detail_penjualan_barang" ----------------------
CREATE INDEX `detail_penjualan_barang` USING BTREE ON `detail_penjualan`( `kode_barang` );
-- -------------------------------------------------------------


-- CREATE INDEX "detail_pembelian" -----------------------------
CREATE INDEX `detail_pembelian` USING BTREE ON `pembelian`( `dibuat_oleh` );
-- -------------------------------------------------------------


-- CREATE INDEX "pembelian_supplier" ---------------------------
CREATE INDEX `pembelian_supplier` USING BTREE ON `pembelian`( `kode_supplier` );
-- -------------------------------------------------------------


-- CREATE INDEX "penjualan_pelanggan" --------------------------
CREATE INDEX `penjualan_pelanggan` USING BTREE ON `penjualan`( `kode_pelanggan` );
-- -------------------------------------------------------------


-- CREATE INDEX "penjualan_user" -------------------------------
CREATE INDEX `penjualan_user` USING BTREE ON `penjualan`( `dibuat_oleh` );
-- -------------------------------------------------------------


-- CREATE INDEX "unique-index-menu-menu_name" ------------------
CREATE INDEX `unique-index-menu-menu_name` USING BTREE ON `menu`( `menu_name` );
-- -------------------------------------------------------------


-- CREATE LINK "detail_pembelian_barang" -----------------------
ALTER TABLE `detail_pembelian`
	ADD CONSTRAINT `detail_pembelian_barang` FOREIGN KEY ( `kode_barang` )
	REFERENCES `master_barang`( `kode_barang` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "detail_pembelian_pembelian" --------------------
ALTER TABLE `detail_pembelian`
	ADD CONSTRAINT `detail_pembelian_pembelian` FOREIGN KEY ( `kode_pembelian` )
	REFERENCES `pembelian`( `kode_pembelian` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "detail_penjualan_barang" -----------------------
ALTER TABLE `detail_penjualan`
	ADD CONSTRAINT `detail_penjualan_barang` FOREIGN KEY ( `kode_barang` )
	REFERENCES `master_barang`( `kode_barang` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "detail_penjualan_penjualan" --------------------
ALTER TABLE `detail_penjualan`
	ADD CONSTRAINT `detail_penjualan_penjualan` FOREIGN KEY ( `kode_penjualan` )
	REFERENCES `penjualan`( `kode_penjualan` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "detail_pembelian" ------------------------------
ALTER TABLE `pembelian`
	ADD CONSTRAINT `detail_pembelian` FOREIGN KEY ( `dibuat_oleh` )
	REFERENCES `master_user`( `username` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "pembelian_supplier" ----------------------------
ALTER TABLE `pembelian`
	ADD CONSTRAINT `pembelian_supplier` FOREIGN KEY ( `kode_supplier` )
	REFERENCES `master_supplier`( `kode_supplier` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "penjualan_pelanggan" ---------------------------
ALTER TABLE `penjualan`
	ADD CONSTRAINT `penjualan_pelanggan` FOREIGN KEY ( `kode_pelanggan` )
	REFERENCES `master_pelanggan`( `kode_pelanggan` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


-- CREATE LINK "penjualan_user" --------------------------------
ALTER TABLE `penjualan`
	ADD CONSTRAINT `penjualan_user` FOREIGN KEY ( `dibuat_oleh` )
	REFERENCES `master_user`( `username` )
	ON DELETE Restrict
	ON UPDATE Restrict;
-- -------------------------------------------------------------


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
-- ---------------------------------------------------------


