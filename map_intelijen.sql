-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.6.12-MariaDB-0ubuntu0.22.04.1 - Ubuntu 22.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             12.4.0.6659
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table map_intelejen.app_login
DROP TABLE IF EXISTS `app_login`;
CREATE TABLE IF NOT EXISTS `app_login` (
  `id_login` int(222) NOT NULL AUTO_INCREMENT,
  `user_login` varchar(222) NOT NULL,
  `pass_login` varchar(222) NOT NULL,
  `real_name` varchar(222) NOT NULL,
  `type_login` varchar(222) NOT NULL,
  `status_login` enum('false','true') NOT NULL,
  `token_login` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`id_login`,`user_login`,`pass_login`,`real_name`,`type_login`,`status_login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table map_intelejen.app_login: ~1 rows (approximately)
DELETE FROM `app_login`;
INSERT INTO `app_login` (`id_login`, `user_login`, `pass_login`, `real_name`, `type_login`, `status_login`, `token_login`) VALUES
	(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Administrator', 'admin', 'true', 'test_token');

-- Dumping structure for table map_intelejen.dprd
DROP TABLE IF EXISTS `dprd`;
CREATE TABLE IF NOT EXISTS `dprd` (
  `id_dprd` int(222) NOT NULL AUTO_INCREMENT,
  `daerah` int(222) DEFAULT NULL,
  `PKB` varchar(222) DEFAULT NULL,
  `Gerindra` varchar(222) DEFAULT NULL,
  `PDIP` varchar(222) DEFAULT NULL,
  `Golkar` varchar(222) DEFAULT NULL,
  `NasDem` varchar(222) DEFAULT NULL,
  `Garuda` varchar(222) DEFAULT NULL,
  `Berkarya` varchar(222) DEFAULT NULL,
  `PKS` varchar(222) DEFAULT NULL,
  `Perindo` varchar(222) DEFAULT NULL,
  `PPP` varchar(222) DEFAULT NULL,
  `PSI` varchar(222) DEFAULT NULL,
  `PAN` varchar(222) DEFAULT NULL,
  `Hanura` varchar(222) DEFAULT NULL,
  `Demokrat` varchar(222) DEFAULT NULL,
  `PBB` varchar(222) DEFAULT NULL,
  `PKPI` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`id_dprd`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table map_intelejen.dprd: ~20 rows (approximately)
DELETE FROM `dprd`;
INSERT INTO `dprd` (`id_dprd`, `daerah`, `PKB`, `Gerindra`, `PDIP`, `Golkar`, `NasDem`, `Garuda`, `Berkarya`, `PKS`, `Perindo`, `PPP`, `PSI`, `PAN`, `Hanura`, `Demokrat`, `PBB`, `PKPI`) VALUES
	(1, 1, '962', '6623', '5717', '2270', '1236', '277', '374', '3237', '680', '1136', '465', '1454', '303', '2639', '211', '183'),
	(2, 2, '2752', '4836', '7310', '4643', '3956', '102', '546', '5471', '899', '326', '278', '6500', '110', '2071', '64', '41'),
	(3, 3, '2070', '2604', '6040', '4454', '4409', '186', '341', '2612', '2650', '3552', '353', '3636', '200', '1115', '45', '21'),
	(4, 4, '786', '2215', '2421', '1356', '4953', '80', '344', '4157', '395', '171', '193', '3862', '69', '2023', '35', '28'),
	(5, 5, '1590', '4771', '4881', '3432', '2789', '233', '253', '4602', '1104', '1202', '105', '3220', '224', '1890', '65', '96'),
	(6, 6, '1843', '3989', '5290', '2429', '6363', '239', '339', '3932', '1586', '735', '137', '4039', '155', '1471', '220', '70'),
	(7, 7, '955', '2960', '2209', '4592', '3176', '109', '763', '5833', '759', '1613', '308', '2572', '272', '3092', '244', '47'),
	(8, 8, '962', '2188', '4054', '2945', '4589', '53', '1057', '3540', '611', '1469', '457', '2000', '98', '1334', '235', '188'),
	(9, 9, '417', '1460', '3427', '1862', '1561', '42', '166', '2428', '901', '1793', '389', '1867', '123', '2294', '67', '34'),
	(10, 10, '1042', '3530', '5396', '1722', '2485', '192', '544', '4361', '2459', '579', '127', '1790', '193', '3095', '58', '100'),
	(11, 11, '2131', '1863', '2081', '1170', '1452', '285', '580', '1802', '886', '1030', '181', '1371', '1525', '1031', '106', '104'),
	(12, 12, '2250', '3390', '2447', '1113', '1686', '319', '748', '2286', '391', '1557', '403', '2324', '442', '760', '139', '531'),
	(13, 13, '2278', '4231', '2667', '1813', '2524', '609', '1187', '3126', '475', '415', '394', '2962', '642', '1578', '201', '106'),
	(14, 14, '1846', '1689', '3045', '1377', '1513', '131', '562', '2625', '1258', '913', '242', '4217', '869', '2586', '54', '208'),
	(15, 15, '1426', '3008', '2543', '1844', '1749', '63', '639', '3633', '517', '203', '142', '3343', '43', '922', '28', '43'),
	(16, 16, '766', '5776', '7955', '3124', '2806', '187', '494', '4029', '562', '723', '975', '1715', '194', '3422', '90', '230'),
	(18, 18, '406', '1289', '1979', '1343', '983', '60', '314', '1278', '418', '1101', '400', '1767', '170', '1260', '69', '53'),
	(19, 19, '2202', '4069', '4515', '2569', '2109', '113', '354', '2540', '821', '638', '692', '2780', '104', '2583', '31', '21'),
	(20, 20, '753', '4564', '4179', '1845', '965', '203', '212', '3776', '933', '283', '217', '2886', '186', '1624', '64', '29'),
	(23, 17, '1633', '2919', '7091', '2424', '3519', '133', '194', '2067', '2429', '455', '426', '3597', '315', '1535', '24', '16');

-- Dumping structure for table map_intelejen.kecamatan
DROP TABLE IF EXISTS `kecamatan`;
CREATE TABLE IF NOT EXISTS `kecamatan` (
  `id_daerah` int(222) NOT NULL AUTO_INCREMENT,
  `nama_daerah` varchar(222) DEFAULT NULL,
  `longitude` varchar(222) DEFAULT NULL,
  `latitude` varchar(222) DEFAULT NULL,
  `svg` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`id_daerah`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table map_intelejen.kecamatan: ~21 rows (approximately)
DELETE FROM `kecamatan`;
INSERT INTO `kecamatan` (`id_daerah`, `nama_daerah`, `longitude`, `latitude`, `svg`) VALUES
	(1, 'Kedaton', '-5.38', '105.26', NULL),
	(2, 'Kemiling', '-5.40', '105.19', NULL),
	(3, 'Panjang', '-5.47', '105.32', 'svg_187'),
	(4, 'Rajabasa', '-5.36', '105.22', NULL),
	(5, 'Sukabumi', '-5.39', '105.31', NULL),
	(6, 'Sukarame', '-5.36', '105.30', NULL),
	(7, 'Tanjung Karang Barat', '5.41778', '105.22945', NULL),
	(8, 'Tanjung Karang Pusat', '-5.41', '105.23', NULL),
	(9, 'Tanjung Karang Timur', '-5.41', '105.32', NULL),
	(10, 'Tanjung Senang', '-5.35', '105.25', NULL),
	(11, 'Telukbetung Barat', '-5.45', '105.23', NULL),
	(12, 'Telukbetung Selatan', '-5.44', '105.26', NULL),
	(13, 'Telukbetung Utara', '-5.43', '105.22', NULL),
	(14, 'Telukbetung Timur', '-5.48', '105.241', NULL),
	(15, 'Langkapura', '-5.39317', '105.22602', NULL),
	(16, 'Way Halim', '-5.39', '105.27', 'svg_187'),
	(17, 'Bumi Waras', '-5.44', '105.28', NULL),
	(18, 'Enggal', '-5.42', '105.257', NULL),
	(19, 'Kedamaian', '-5.41', '105.28', NULL),
	(20, 'Labuhan Ratu', '-5.37', '105.25', NULL);

-- Dumping structure for table map_intelejen.pemilu
DROP TABLE IF EXISTS `pemilu`;
CREATE TABLE IF NOT EXISTS `pemilu` (
  `id_pemilu` int(222) NOT NULL AUTO_INCREMENT,
  `jenis_pemilu` enum('1','2','3') DEFAULT NULL COMMENT '1(Presiden) 2(Kepala Daerah) 3(DPRD)',
  `nama_calon` varchar(222) DEFAULT NULL,
  `nama_wakil` varchar(222) DEFAULT NULL,
  `jumlah_suara` varchar(222) DEFAULT NULL,
  `dukungan_daerah_pemilihan` int(222) DEFAULT NULL COMMENT 'Relasi ke Tabel Daerah',
  `keterangan` varchar(222) DEFAULT NULL,
  PRIMARY KEY (`id_pemilu`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Dumping data for table map_intelejen.pemilu: ~16 rows (approximately)
DELETE FROM `pemilu`;
INSERT INTO `pemilu` (`id_pemilu`, `jenis_pemilu`, `nama_calon`, `nama_wakil`, `jumlah_suara`, `dukungan_daerah_pemilihan`, `keterangan`) VALUES
	(1, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '19970', 17, 'asd'),
	(2, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '6.146', 18, 'asd'),
	(3, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '13.797', 16, 'asd'),
	(4, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '12.245', 19, 'asd'),
	(5, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '16.659	', 1, NULL),
	(6, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '9.635', 2, 'asd'),
	(7, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '7.326', 20, 'asd'),
	(8, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '22.145', 15, 'asd'),
	(9, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '9.396', 3, 'asd'),
	(10, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '16.208', 4, 'asd'),
	(11, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', NULL, 5, 'asd'),
	(12, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', NULL, 6, 'asd'),
	(13, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', NULL, 7, 'asd'),
	(14, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '19970', 8, 'asd'),
	(15, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '19970', 9, 'asd'),
	(16, '1', 'Ir. H. JOKO WIDODO', 'Prof. Dr. (H.C) KH. MA\'RUF AMIN', '19970', 10, 'asd');

-- Dumping structure for table map_intelejen.pemilu_presiden
DROP TABLE IF EXISTS `pemilu_presiden`;
CREATE TABLE IF NOT EXISTS `pemilu_presiden` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jumlah_suara_1` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table map_intelejen.pemilu_presiden: ~0 rows (approximately)
DELETE FROM `pemilu_presiden`;

-- Dumping structure for table map_intelejen.penyelamatan_keuangan_negara
DROP TABLE IF EXISTS `penyelamatan_keuangan_negara`;
CREATE TABLE IF NOT EXISTS `penyelamatan_keuangan_negara` (
  `id_penyelamatan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_penyelamatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table map_intelejen.penyelamatan_keuangan_negara: ~0 rows (approximately)
DELETE FROM `penyelamatan_keuangan_negara`;

-- Dumping structure for table map_intelejen.penyuluhan_dan_penerangan_hukum
DROP TABLE IF EXISTS `penyuluhan_dan_penerangan_hukum`;
CREATE TABLE IF NOT EXISTS `penyuluhan_dan_penerangan_hukum` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table map_intelejen.penyuluhan_dan_penerangan_hukum: ~0 rows (approximately)
DELETE FROM `penyuluhan_dan_penerangan_hukum`;

-- Dumping structure for table map_intelejen.pilkada
DROP TABLE IF EXISTS `pilkada`;
CREATE TABLE IF NOT EXISTS `pilkada` (
  `id_pilkada` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_pilkada`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table map_intelejen.pilkada: ~0 rows (approximately)
DELETE FROM `pilkada`;

-- Dumping structure for table map_intelejen.politik
DROP TABLE IF EXISTS `politik`;
CREATE TABLE IF NOT EXISTS `politik` (
  `id_politik` int(11) NOT NULL AUTO_INCREMENT,
  `latitude` varchar(50) DEFAULT NULL,
  `longitude` varchar(50) DEFAULT NULL,
  `daerah` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_politik`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table map_intelejen.politik: ~1 rows (approximately)
DELETE FROM `politik`;
INSERT INTO `politik` (`id_politik`, `latitude`, `longitude`, `daerah`) VALUES
	(1, '5.41778', '105.22945', 7);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
