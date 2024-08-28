/*
 Navicat Premium Data Transfer

 Source Server         : LOCAL
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : erp

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 28/08/2024 13:52:24
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for erp_customer
-- ----------------------------
DROP TABLE IF EXISTS `erp_customer`;
CREATE TABLE `erp_customer`  (
  `id_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `alamat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga_paket_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `awal` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `akhir` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_berlangganan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_customer`) USING BTREE,
  INDEX `kategori`(`kategori` ASC) USING BTREE,
  CONSTRAINT `erp_customer_ibfk_1` FOREIGN KEY (`kategori`) REFERENCES `erp_kategori_customer` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of erp_customer
-- ----------------------------
INSERT INTO `erp_customer` VALUES ('043ed65f-29f8-11ef-b34f-9009dfabca9c', '2024044427-6a9f33286207dd81fb8083268f4104a9', 'Uli', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '2024-06-14', '0');
INSERT INTO `erp_customer` VALUES ('09fe8273-29f8-11ef-b34f-9009dfabca9c', '2024044436-a15f02243377ab231244f1e27bb69307', 'Muji', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '2024-06-14', '0');
INSERT INTO `erp_customer` VALUES ('121cc3de-29f8-11ef-b34f-9009dfabca9c', '2024044450-8f9407db8daea670a900ee6b1f9e36f8', 'Mas Bhe', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('1af68df7-29f8-11ef-b34f-9009dfabca9c', '2024044505-ff7d5e351bfd24294ccd713b86fef65c', 'Yorisa', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('1ffec37e-29f5-11ef-b34f-9009dfabca9c', '2024042345-e6d38e041b68e6c827c2277b93b4d77b', 'Sinta', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('22d57333-29f8-11ef-b34f-9009dfabca9c', '2024044518-70ec5cbf68b0a6a8162e44726e2d0f54', 'Wahyu Aji', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('2a564437-29f8-11ef-b34f-9009dfabca9c', '2024044531-722df3380aad8b74b31707285d35c263', 'Ray', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-03-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('2b8baa4d-29f5-11ef-b34f-9009dfabca9c', '2024042404-6df97ee93fc391a058f9943c61f30725', 'Yudi', '', '9b0eefaa-2651-11ef-af1e-9009dfabca9c', '0', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('3186ff6b-29f8-11ef-b34f-9009dfabca9c', '2024044543-b7fbd47212105b371a005d942ea55158', 'Alfian', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('335acc80-29f5-11ef-b34f-9009dfabca9c', '2024042417-a7b34646a69963454b0ca30172d86a13', 'Tutik', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('3dc1f345-29f5-11ef-b34f-9009dfabca9c', '2024042435-07fed4d283206291e1a16843d27fa896', 'Agus', '', 'c371633b-2651-11ef-af1e-9009dfabca9c', '100000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('46c496a4-29f5-11ef-b34f-9009dfabca9c', '2024042450-d0915f29056c0324d462584e2c36ce06', 'Rengga', 'Pedaran Kulon Kali ', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('47619e97-2d2f-11ef-a04b-9009dfabca9c', '2024065735-eb0565e89dc4ecdade78df75891f391a', 'tester', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-01-2024', '2024-06-27', '0');
INSERT INTO `erp_customer` VALUES ('493c46fa-29f8-11ef-b34f-9009dfabca9c', '2024044622-c8d3b22fd2f27d000be02b7dea91353a', 'putra', '', '9b0eefaa-2651-11ef-af1e-9009dfabca9c', '0', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('52469dc5-29f8-11ef-b34f-9009dfabca9c', '2024044638-65dce1dbcce4014302faaf44f359058a', 'Pedaran', '', '9b0eefaa-2651-11ef-af1e-9009dfabca9c', '0', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('785265a8-29f5-11ef-b34f-9009dfabca9c', '2024042613-4409f3493c8805c44effcaf5f93edfc6', 'Febri', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('82109a3d-29f5-11ef-b34f-9009dfabca9c', '2024042629-7bfd797672fd571bd4102580ec2c15a5', 'Sendy', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('8a6f2968-29f5-11ef-b34f-9009dfabca9c', '2024042643-b98032ec722d1852197c8ac3fc7e5b55', 'Suci', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('9405f454-29f5-11ef-b34f-9009dfabca9c', '2024042659-507804dd074867aedd9ad17bebc1a04f', 'Pandu', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('9d438037-29f5-11ef-b34f-9009dfabca9c', '2024042715-66c6d47c681749f45f5b3faf3bcabede', 'Dinda', '', 'c371633b-2651-11ef-af1e-9009dfabca9c', '100000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('a47eef9e-29f2-11ef-b34f-9009dfabca9c', '2024040559-dfc738f2e19e3d97ce0f93c4b6fe2124', 'Harmanto', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('a5d9c385-29f5-11ef-b34f-9009dfabca9c', '2024042729-7f4cfac150743bbc19365ebcce3ab143', 'Agil', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('ae61612a-29f5-11ef-b34f-9009dfabca9c', '2024042744-7b537ecc93e26145c5c54bd35c8e1d5a', 'Vina', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('b681c381-29f5-11ef-b34f-9009dfabca9c', '2024042757-14757239d5194502081de772da2383ea', 'Pak Imam', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('beeac185-29f5-11ef-b34f-9009dfabca9c', '2024042811-3e4064dedd1fb28e73d833f5f0cf1704', 'Langgeng', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('c621e0e0-29f5-11ef-b34f-9009dfabca9c', '2024042823-46a2bacf0909ac2feb3c1e5cedb26bd2', 'Supri', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('cc7ff6ba-29f5-11ef-b34f-9009dfabca9c', '2024042834-aaab6781d8adc34c51d5cd696c6a582e', 'Intan', '', 'c371633b-2651-11ef-af1e-9009dfabca9c', '100000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('d1241cf0-29f4-11ef-b34f-9009dfabca9c', '2024092132-4181e206c8c65516d143118db5ac1a64', 'Dadi', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('d47df3d8-29f5-11ef-b34f-9009dfabca9c', '2024042848-7e4a29d9fa3369f0171bc64a1fd7015a', 'Her Lele', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('de41e166-29f7-11ef-b34f-9009dfabca9c', '2024044323-61750334040c5574d6cbe314e6b60140', 'Yitno', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('f76ed3c7-29f7-11ef-b34f-9009dfabca9c', '2024044405-54a4b7aa19854918d8b3254e79837d1e', 'Pakde Ri', '', 'cac7abc6-2651-11ef-af1e-9009dfabca9c', '130000', '14-05-2024', '', '1');
INSERT INTO `erp_customer` VALUES ('f86aa154-29f1-11ef-b34f-9009dfabca9c', '2024040110-0fe0665b54d8c60bb2dfc422e4ca747f', 'Adin', 'Pedaran Kulon Kali', '9b0eefaa-2651-11ef-af1e-9009dfabca9c', '0', '14-05-2024', '', '1');

-- ----------------------------
-- Table structure for erp_jenis_payment
-- ----------------------------
DROP TABLE IF EXISTS `erp_jenis_payment`;
CREATE TABLE `erp_jenis_payment`  (
  `id_jenis_payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `jenis_payment` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  INDEX `id_jenis_payment`(`id_jenis_payment` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of erp_jenis_payment
-- ----------------------------
INSERT INTO `erp_jenis_payment` VALUES ('14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'Tunai');
INSERT INTO `erp_jenis_payment` VALUES ('1c611c23-2a24-11ef-b34f-9009dfabca9c', 'Transfer BANK');
INSERT INTO `erp_jenis_payment` VALUES ('2463f43c-2a24-11ef-b34f-9009dfabca9c', 'Transfer OVO');
INSERT INTO `erp_jenis_payment` VALUES ('2a6931b4-2a24-11ef-b34f-9009dfabca9c', 'Transfer ShopeePay');
INSERT INTO `erp_jenis_payment` VALUES ('2e1c4234-2a24-11ef-b34f-9009dfabca9c', 'Transfer Dana');
INSERT INTO `erp_jenis_payment` VALUES ('34fbef74-2a24-11ef-b34f-9009dfabca9c', 'Transfer Gopay');

-- ----------------------------
-- Table structure for erp_kategori_customer
-- ----------------------------
DROP TABLE IF EXISTS `erp_kategori_customer`;
CREATE TABLE `erp_kategori_customer`  (
  `id_kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `kategori` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  INDEX `id_kategori`(`id_kategori` ASC) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of erp_kategori_customer
-- ----------------------------
INSERT INTO `erp_kategori_customer` VALUES ('9b0eefaa-2651-11ef-af1e-9009dfabca9c', 'Free', '0', 'Titip Alat');
INSERT INTO `erp_kategori_customer` VALUES ('c371633b-2651-11ef-af1e-9009dfabca9c', 'Discount', '100000', 'Titip Alat');
INSERT INTO `erp_kategori_customer` VALUES ('cac7abc6-2651-11ef-af1e-9009dfabca9c', 'Regular', '130000', '');
INSERT INTO `erp_kategori_customer` VALUES ('0d470101-2997-11ef-a632-9009dfabca9c', 'NOT SET', '0', '');

-- ----------------------------
-- Table structure for erp_payment
-- ----------------------------
DROP TABLE IF EXISTS `erp_payment`;
CREATE TABLE `erp_payment`  (
  `id_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `id_customer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `periode_tagihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bulan_tagihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `tahun_tagihan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `harga_paket` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `metode_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `note` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `status_bayar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  INDEX `metode_bayar`(`metode_bayar` ASC) USING BTREE,
  CONSTRAINT `erp_payment_ibfk_1` FOREIGN KEY (`metode_bayar`) REFERENCES `erp_jenis_payment` (`id_jenis_payment`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of erp_payment
-- ----------------------------
INSERT INTO `erp_payment` VALUES ('470a5032-2a51-11ef-ab15-9009dfabca9c', '2024042450-d0915f29056c0324d462584e2c36ce06', 'Rengga', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'titip bapak dirumah', NULL, '2');
INSERT INTO `erp_payment` VALUES ('37c67b8d-2a56-11ef-ab15-9009dfabca9c', '2024040110-0fe0665b54d8c60bb2dfc422e4ca747f', 'Adin', 'Free', '31-05-2024', '05', '2024', '0', '0', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'free', NULL, '2');
INSERT INTO `erp_payment` VALUES ('214e313f-2a57-11ef-ab15-9009dfabca9c', '2024042659-507804dd074867aedd9ad17bebc1a04f', 'Pandu', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'titip bapak', NULL, '2');
INSERT INTO `erp_payment` VALUES ('38a31840-2a57-11ef-ab15-9009dfabca9c', '2024042729-7f4cfac150743bbc19365ebcce3ab143', 'Agil', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'titip mas dika', NULL, '2');
INSERT INTO `erp_payment` VALUES ('4ea689c9-2a57-11ef-ab15-9009dfabca9c', '2024042404-6df97ee93fc391a058f9943c61f30725', 'Yudi', 'Free', '31-05-2024', '05', '2024', '0', '0', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'free', NULL, '2');
INSERT INTO `erp_payment` VALUES ('82b112d9-2a59-11ef-ab15-9009dfabca9c', '2024044505-ff7d5e351bfd24294ccd713b86fef65c', 'Yorisa', 'Regular', '31-05-2024', '05', '2024', '130000', '0', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'free. kompensasi internet mati karena alat rusak', NULL, '2');
INSERT INTO `erp_payment` VALUES ('96102839-2adf-11ef-a405-9009dfabca9c', '2024042643-b98032ec722d1852197c8ac3fc7e5b55', 'Suci', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'diterima bapak dirumah', NULL, '2');
INSERT INTO `erp_payment` VALUES ('dc913c7e-2b0a-11ef-b18c-9009dfabca9c', '2024044518-70ec5cbf68b0a6a8162e44726e2d0f54', 'Wahyu Aji', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '1c611c23-2a24-11ef-b34f-9009dfabca9c', 'transfer ke BRI', NULL, '2');
INSERT INTO `erp_payment` VALUES ('03c072f4-2b0e-11ef-b18c-9009dfabca9c', '2024042834-aaab6781d8adc34c51d5cd696c6a582e', 'Intan', 'Discount', '31-05-2024', '05', '2024', '100000', '100000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'titip ibuk', NULL, '2');
INSERT INTO `erp_payment` VALUES ('34a96acb-2b0e-11ef-b18c-9009dfabca9c', '2024042629-7bfd797672fd571bd4102580ec2c15a5', 'Sendy', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'titip ibuk', NULL, '2');
INSERT INTO `erp_payment` VALUES ('4a8ec389-2b0e-11ef-b18c-9009dfabca9c', '2024042715-66c6d47c681749f45f5b3faf3bcabede', 'Dinda', 'Discount', '31-05-2024', '05', '2024', '100000', '100000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'titip ibuk', NULL, '2');
INSERT INTO `erp_payment` VALUES ('799c9aba-2b75-11ef-92ce-9009dfabca9c', '2024042757-14757239d5194502081de772da2383ea', 'Pak Imam', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'titip farid kulon kali', NULL, '2');
INSERT INTO `erp_payment` VALUES ('37f69558-2bed-11ef-9178-9009dfabca9c', '2024044622-c8d3b22fd2f27d000be02b7dea91353a', 'putra', 'Free', '31-05-2024', '05', '2024', '0', '0', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'free', NULL, '2');
INSERT INTO `erp_payment` VALUES ('217d3958-2bef-11ef-9178-9009dfabca9c', '2024044638-65dce1dbcce4014302faaf44f359058a', 'Pedaran', 'Free', '31-05-2024', '05', '2024', '0', '0', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'free', '16-06-2024 21:45:35', '2');
INSERT INTO `erp_payment` VALUES ('5634b4b6-2e16-11ef-9f9d-9009dfabca9c', '2024065735-eb0565e89dc4ecdade78df75891f391a', 'tester', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'aeeae', '19-06-2024 15:31:24', '-1');
INSERT INTO `erp_payment` VALUES ('8c0b5f5a-2f02-11ef-bc57-9009dfabca9c', '2024044450-8f9407db8daea670a900ee6b1f9e36f8', 'Mas Bhe', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'bayar langsung', '20-06-2024 19:42:10', '2');
INSERT INTO `erp_payment` VALUES ('5858df8f-2f14-11ef-bc57-9009dfabca9c', '2024042345-e6d38e041b68e6c827c2277b93b4d77b', 'Sinta', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'titip farid', '20-06-2024 21:49:26', '2');
INSERT INTO `erp_payment` VALUES ('67d611b9-2f14-11ef-bc57-9009dfabca9c', '2024042613-4409f3493c8805c44effcaf5f93edfc6', 'Febri', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'farid', '20-06-2024 21:49:50', '2');
INSERT INTO `erp_payment` VALUES ('700f3cfd-2f14-11ef-bc57-9009dfabca9c', '2024044405-54a4b7aa19854918d8b3254e79837d1e', 'Pakde Ri', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'farid', '20-06-2024 21:50:15', '2');
INSERT INTO `erp_payment` VALUES ('7a042d4a-2f14-11ef-bc57-9009dfabca9c', '2024042417-a7b34646a69963454b0ca30172d86a13', 'Tutik', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'parid\r\n', '20-06-2024 21:50:29', '2');
INSERT INTO `erp_payment` VALUES ('826ffb2d-2f14-11ef-bc57-9009dfabca9c', '2024040559-dfc738f2e19e3d97ce0f93c4b6fe2124', 'Harmanto', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '20-06-2024 21:50:46', '2');
INSERT INTO `erp_payment` VALUES ('88fbffbe-2f14-11ef-bc57-9009dfabca9c', '2024044323-61750334040c5574d6cbe314e6b60140', 'Yitno', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '20-06-2024 21:51:00', '2');
INSERT INTO `erp_payment` VALUES ('91151d49-2f14-11ef-bc57-9009dfabca9c', '2024042848-7e4a29d9fa3369f0171bc64a1fd7015a', 'Her Lele', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '20-06-2024 21:51:11', '2');
INSERT INTO `erp_payment` VALUES ('9bbe6003-2f14-11ef-bc57-9009dfabca9c', '2024042744-7b537ecc93e26145c5c54bd35c8e1d5a', 'Vina', 'Regular', '31-05-2024', '05', '2024', '130000', '110000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'bulan lalu ninggal 30rb', '20-06-2024 21:51:25', '2');
INSERT INTO `erp_payment` VALUES ('a7005841-2f14-11ef-bc57-9009dfabca9c', '2024092132-4181e206c8c65516d143118db5ac1a64', 'Dadi', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '20-06-2024 21:51:43', '2');
INSERT INTO `erp_payment` VALUES ('accbafcb-2f14-11ef-bc57-9009dfabca9c', '2024042823-46a2bacf0909ac2feb3c1e5cedb26bd2', 'Supri', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '20-06-2024 21:52:01', '2');
INSERT INTO `erp_payment` VALUES ('88fb9325-3060-11ef-b07d-9009dfabca9c', '2024065735-eb0565e89dc4ecdade78df75891f391a', 'tester', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'ccc', '22-06-2024 13:27:31', '-1');
INSERT INTO `erp_payment` VALUES ('1e31d626-3062-11ef-b07d-9009dfabca9c', '2024065735-eb0565e89dc4ecdade78df75891f391a', 'tester', 'Regular', '30-04-2024', '04', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', 'pp', '22-06-2024 13:38:45', '-1');
INSERT INTO `erp_payment` VALUES ('01b6c671-342d-11ef-b1ae-9009dfabca9c', '2024042435-07fed4d283206291e1a16843d27fa896', 'Agus', 'Discount', '31-05-2024', '05', '2024', '100000', '100000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '27-06-2024 09:28:44', '2');
INSERT INTO `erp_payment` VALUES ('a341e6df-348d-11ef-84d9-0a0027000005', '2024044531-722df3380aad8b74b31707285d35c263', 'Ray', 'Regular', '30-04-2024', '04', '2024', '130000', '130000', '1c611c23-2a24-11ef-b34f-9009dfabca9c', '', '27-06-2024 21:00:12', '2');
INSERT INTO `erp_payment` VALUES ('bd8df8ba-348d-11ef-84d9-0a0027000005', '2024044531-722df3380aad8b74b31707285d35c263', 'Ray', 'Regular', '31-03-2024', '03', '2024', '130000', '130000', '1c611c23-2a24-11ef-b34f-9009dfabca9c', '', '27-06-2024 21:01:02', '2');
INSERT INTO `erp_payment` VALUES ('d1878183-348d-11ef-84d9-0a0027000005', '2024044531-722df3380aad8b74b31707285d35c263', 'Ray', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '1c611c23-2a24-11ef-b34f-9009dfabca9c', '', '27-06-2024 21:01:24', '2');
INSERT INTO `erp_payment` VALUES ('847aedc3-3757-11ef-bed1-9009dfabca9c', '2024042811-3e4064dedd1fb28e73d833f5f0cf1704', 'Langgeng', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '1c611c23-2a24-11ef-b34f-9009dfabca9c', '', '01-07-2024 08:39:57', '2');
INSERT INTO `erp_payment` VALUES ('8ff2ef9e-3757-11ef-bed1-9009dfabca9c', '2024042811-3e4064dedd1fb28e73d833f5f0cf1704', 'Langgeng', 'Regular', '30-06-2024', '06', '2024', '130000', '130000', '1c611c23-2a24-11ef-b34f-9009dfabca9c', '', '01-07-2024 10:10:49', '2');
INSERT INTO `erp_payment` VALUES ('4264a3b5-3821-11ef-bcfb-9009dfabca9c', '2024044505-ff7d5e351bfd24294ccd713b86fef65c', 'Yorisa', 'Regular', '30-06-2024', '06', '2024', '130000', '130000', '1c611c23-2a24-11ef-b34f-9009dfabca9c', '', '02-07-2024 10:14:42', '2');
INSERT INTO `erp_payment` VALUES ('9ea1e04c-3823-11ef-bcfb-9009dfabca9c', '2024044622-c8d3b22fd2f27d000be02b7dea91353a', 'putra', 'Free', '30-06-2024', '06', '2024', '0', '0', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '02-07-2024 10:31:16', '2');
INSERT INTO `erp_payment` VALUES ('0ddd0087-3c3b-11ef-8bdf-9009dfabca9c', '2024042435-07fed4d283206291e1a16843d27fa896', 'Agus', 'Discount', '30-06-2024', '06', '2024', '100000', '100000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '07-07-2024 15:29:25', '2');
INSERT INTO `erp_payment` VALUES ('b48cbccb-641e-11ef-bfc2-0a0027000005', '2024044450-8f9407db8daea670a900ee6b1f9e36f8', 'Mas Bhe', 'Regular', '30-06-2024', '06', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 09:46:59', '2');
INSERT INTO `erp_payment` VALUES ('c19b1abf-641e-11ef-bfc2-0a0027000005', '2024044450-8f9407db8daea670a900ee6b1f9e36f8', 'Mas Bhe', 'Regular', '31-07-2024', '07', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 09:47:31', '2');
INSERT INTO `erp_payment` VALUES ('02e71bc3-641f-11ef-bfc2-0a0027000005', '2024044505-ff7d5e351bfd24294ccd713b86fef65c', 'Yorisa', 'Regular', '31-05-2024', '05', '2024', '130000', '130000', '34fbef74-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 09:47:53', '-1');
INSERT INTO `erp_payment` VALUES ('b3393dc5-641f-11ef-bfc2-0a0027000005', '2024044505-ff7d5e351bfd24294ccd713b86fef65c', 'Yorisa', 'Regular', '31-07-2024', '07', '2024', '130000', '130000', '34fbef74-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 09:49:42', '2');
INSERT INTO `erp_payment` VALUES ('62459338-6420-11ef-bfc2-0a0027000005', '2024042345-e6d38e041b68e6c827c2277b93b4d77b', 'Sinta', 'Regular', '30-06-2024', '06', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 09:59:19', '2');
INSERT INTO `erp_payment` VALUES ('68a94b35-6420-11ef-bfc2-0a0027000005', '2024042345-e6d38e041b68e6c827c2277b93b4d77b', 'Sinta', 'Regular', '31-07-2024', '07', '2024', '130000', '130000', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 09:59:32', '2');
INSERT INTO `erp_payment` VALUES ('a437fed6-6421-11ef-bfc2-0a0027000005', '2024042404-6df97ee93fc391a058f9943c61f30725', 'Yudi', 'Free', '30-06-2024', '06', '2024', '0', '0', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 09:59:42', '2');
INSERT INTO `erp_payment` VALUES ('ad229ea7-6421-11ef-bfc2-0a0027000005', '2024042404-6df97ee93fc391a058f9943c61f30725', 'Yudi', 'Free', '31-07-2024', '07', '2024', '0', '0', '14bcdb59-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 10:08:32', '2');
INSERT INTO `erp_payment` VALUES ('b4df47f6-6421-11ef-bfc2-0a0027000005', '2024044543-b7fbd47212105b371a005d942ea55158', 'Alfian', 'Regular', '30-06-2024', '06', '2024', '130000', '130000', '1c611c23-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 10:08:47', '2');
INSERT INTO `erp_payment` VALUES ('bd928313-6421-11ef-bfc2-0a0027000005', '2024044543-b7fbd47212105b371a005d942ea55158', 'Alfian', 'Regular', '31-07-2024', '07', '2024', '130000', '130000', '1c611c23-2a24-11ef-b34f-9009dfabca9c', '', '27-08-2024 10:09:00', '2');

-- ----------------------------
-- Table structure for erp_role
-- ----------------------------
DROP TABLE IF EXISTS `erp_role`;
CREATE TABLE `erp_role`  (
  `id_role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_role`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of erp_role
-- ----------------------------
INSERT INTO `erp_role` VALUES ('94868ac6-258e-11ef-916f-9009dfabca9c', 'Administrator');
INSERT INTO `erp_role` VALUES ('97b83ea9-258e-11ef-916f-9009dfabca9c', 'User');
INSERT INTO `erp_role` VALUES ('a53ee18e-258e-11ef-916f-9009dfabca9c', 'Developer');
INSERT INTO `erp_role` VALUES ('a7a123da-258e-11ef-916f-9009dfabca9c', 'Tester');
INSERT INTO `erp_role` VALUES ('aa197cc0-258e-11ef-916f-9009dfabca9c', 'Direktur');
INSERT INTO `erp_role` VALUES ('ad2b124b-258e-11ef-916f-9009dfabca9c', 'Kepala Cabang');

-- ----------------------------
-- Table structure for erp_sys
-- ----------------------------
DROP TABLE IF EXISTS `erp_sys`;
CREATE TABLE `erp_sys`  (
  `menu` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `deskripsi` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of erp_sys
-- ----------------------------
INSERT INTO `erp_sys` VALUES ('registrasi', NULL, '1');

-- ----------------------------
-- Table structure for erp_user
-- ----------------------------
DROP TABLE IF EXISTS `erp_user`;
CREATE TABLE `erp_user`  (
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `created_at` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `last_login` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `active` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id_user`) USING BTREE,
  INDEX `role`(`role` ASC) USING BTREE,
  CONSTRAINT `erp_user_ibfk_1` FOREIGN KEY (`role`) REFERENCES `erp_role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of erp_user
-- ----------------------------
INSERT INTO `erp_user` VALUES ('2024040110-0fe0665b54d8c60bb2dfc422e4ca747f', 'Adin', 'adin', '99b5fe17b083f5e10a6eb0c36e30d47a2d71e1e3469db505a903d1efbfc40e98', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:01:01', '14-06-2024 20:58:28', '1');
INSERT INTO `erp_user` VALUES ('2024040559-dfc738f2e19e3d97ce0f93c4b6fe2124', 'Harmanto', 'harmanto', 'bd3f0703a35a03b2f48d2e87ed02c10c5f36ef67c309c87427b126a5977d098b', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:04:38', '14-06-2024 09:12:54', '1');
INSERT INTO `erp_user` VALUES ('2024042345-e6d38e041b68e6c827c2277b93b4d77b', 'Sinta', 'sinta', 'a115c431b3a3646e3a91616972c5fcb0563225bdd756169d2b926f0a518a0a44', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:23:34', '', '1');
INSERT INTO `erp_user` VALUES ('2024042404-6df97ee93fc391a058f9943c61f30725', 'Yudi', 'yudi', '5c577a0914c58b4a25d1bb5efd528b4d61253fe1b0dca29333c6c2872dedf2df', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:23:45', '14-06-2024 21:06:21', '1');
INSERT INTO `erp_user` VALUES ('2024042417-a7b34646a69963454b0ca30172d86a13', 'Tutik', 'tutik', '2e1b5d92a962e8909bb68ee465be630cde834f4e7a1dbe82fa0f0947334e9933', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:24:04', '', '1');
INSERT INTO `erp_user` VALUES ('2024042435-07fed4d283206291e1a16843d27fa896', 'Agus', 'agus', '37d4cc4e380b9d4dc8c42ac018dec3c2f58e65b118ef75dadc2d1125857491f6', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:24:17', '16-06-2024 22:30:41', '1');
INSERT INTO `erp_user` VALUES ('2024042450-d0915f29056c0324d462584e2c36ce06', 'Rengga', 'rengga', '340a3d2291bd680213ff465e4ad015eabd0ea46e183002f4ddc16410ba044b02', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:24:35', '14-06-2024 19:13:55', '1');
INSERT INTO `erp_user` VALUES ('2024042613-4409f3493c8805c44effcaf5f93edfc6', 'Febri', 'febri', '8cd945d2e58307e66349ef46dc858f8f0ffab0c8f7cccbbe128751fdc77edb14', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:25:46', '', '1');
INSERT INTO `erp_user` VALUES ('2024042629-7bfd797672fd571bd4102580ec2c15a5', 'Sendy', 'sendy', '31f8e919bdc6f24397acf141575b4e546afd3abc271c6e3eb7526c3d852459f4', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:26:13', '15-06-2024 18:55:31', '1');
INSERT INTO `erp_user` VALUES ('2024042643-b98032ec722d1852197c8ac3fc7e5b55', 'Suci', 'suci', 'fa8dc1631474db6e55859ff0f844633dde653c47d84f90478ffd91895b380252', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:26:29', '15-06-2024 13:20:13', '1');
INSERT INTO `erp_user` VALUES ('2024042659-507804dd074867aedd9ad17bebc1a04f', 'Pandu', 'pandu', '7181d50443237d3df415d4cf18021f90e1b1b88319fb2509dc6f286f16c9c41e', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:26:43', '14-06-2024 21:05:01', '1');
INSERT INTO `erp_user` VALUES ('2024042715-66c6d47c681749f45f5b3faf3bcabede', 'Dinda', 'dinda', '0eba448ab71e1ef3aac8da84adf290dbff6ec7e725f20abdef2cd0d3f28e42f3', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:26:59', '15-06-2024 18:56:07', '1');
INSERT INTO `erp_user` VALUES ('2024042729-7f4cfac150743bbc19365ebcce3ab143', 'Agil', 'agil', '92062d93380188b1c5fc257df24ff0a8dbec47e444370569a6120e4b59a3813d', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:27:15', '14-06-2024 21:05:25', '1');
INSERT INTO `erp_user` VALUES ('2024042744-7b537ecc93e26145c5c54bd35c8e1d5a', 'Vina', 'vina', 'f2b4e30885acd4851a086df54b82bb2fb14298b5acdf5cb8dd1e8e55555a07e0', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:27:29', '', '1');
INSERT INTO `erp_user` VALUES ('2024042757-14757239d5194502081de772da2383ea', 'Pak Imam', 'imam', 'dbf5584beb6deac6a248b11a97b4043906882f30b66a0327a1b75123e7da6676', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:27:44', '16-06-2024 07:14:37', '1');
INSERT INTO `erp_user` VALUES ('2024042811-3e4064dedd1fb28e73d833f5f0cf1704', 'Langgeng', 'langgeng', '14e39e6dca15dc125f0e6f5af3fc0e8ffb0c33e23ddf97bae94c1853126cae4b', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:27:57', '', '1');
INSERT INTO `erp_user` VALUES ('2024042823-46a2bacf0909ac2feb3c1e5cedb26bd2', 'Supri', 'supri', '029c4c6893e344528e98f956176dd600e8941fb28b7db66b9ff753c4f7ba1f28', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:28:11', '', '1');
INSERT INTO `erp_user` VALUES ('2024042834-aaab6781d8adc34c51d5cd696c6a582e', 'Intan', 'intan', 'b0de07f4e4aaf0a41061465b9147ecf87623dfe7982e5eeff52970b773c5dd77', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:28:23', '15-06-2024 18:54:06', '1');
INSERT INTO `erp_user` VALUES ('2024042848-7e4a29d9fa3369f0171bc64a1fd7015a', 'Her Lele', 'her', '354cbfc814262a7a81d343f7d6ebc4adfb4266e5081a78f6a19ff16802dce8b2', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:28:34', '', '1');
INSERT INTO `erp_user` VALUES ('2024044323-61750334040c5574d6cbe314e6b60140', 'Yitno', 'yitno', '153787996fed984e6e35a769f1864f7641e94587fdc20981aa39d9a6237d5bac', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:43:01', '', '1');
INSERT INTO `erp_user` VALUES ('2024044405-54a4b7aa19854918d8b3254e79837d1e', 'Pakde Ri', 'ri', '396a14ab206e2b44e03c4e00393e948cce36a6b0f0d7489cb46d944b33ad51c8', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:43:23', '', '1');
INSERT INTO `erp_user` VALUES ('2024044427-6a9f33286207dd81fb8083268f4104a9', 'Uli', 'uli', 'ccd627796b7f79af9a8412492dbd12ef955f8b7b1ab441b59a440120a57cfa61', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:44:05', '', '1');
INSERT INTO `erp_user` VALUES ('2024044436-a15f02243377ab231244f1e27bb69307', 'Muji', 'muji', '02f3c8e9896c0ab95e98c3fce2a3e058a23b3904b6f1ec8460f1d329835aca11', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:44:27', '', '1');
INSERT INTO `erp_user` VALUES ('2024044450-8f9407db8daea670a900ee6b1f9e36f8', 'Mas Bhe', 'bhe', 'a7ce8c9231b280350df221392e10a4356cdf9f738fbced1827a719d0da5cf848', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:44:36', '20-06-2024 20:48:47', '1');
INSERT INTO `erp_user` VALUES ('2024044505-ff7d5e351bfd24294ccd713b86fef65c', 'Yorisa', 'yorisa', 'df6ef6cca0c8c3e179e5acff83a5fdafa98aff6093bfbf5f9322db4ed618069e', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:44:50', '14-06-2024 21:21:32', '1');
INSERT INTO `erp_user` VALUES ('2024044518-70ec5cbf68b0a6a8162e44726e2d0f54', 'Wahyu Aji', 'wahyu', '89a11ccd92c5f47728b86058ae8440d4f90fda5665c256cb5ff0af0244eb7140', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:45:05', '15-06-2024 18:31:29', '1');
INSERT INTO `erp_user` VALUES ('2024044531-722df3380aad8b74b31707285d35c263', 'Ray', 'ray', 'c04bc270f965db4d7ab365b3b865b743e35e13e295c7b15fb795e2a01d24a639', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:45:18', '', '1');
INSERT INTO `erp_user` VALUES ('2024044543-b7fbd47212105b371a005d942ea55158', 'Alfian', 'alfian', '82bd39df864bb7162b616f478d3f5fff9bef2941d27e2575b89dd17af6939355', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:45:31', '', '1');
INSERT INTO `erp_user` VALUES ('2024044622-c8d3b22fd2f27d000be02b7dea91353a', 'putra', 'putra', '9dc5c51e926d990d6ca268a03153114fa73d4f313135fd2e7336157f8915e72e', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:46:08', '02-07-2024 10:23:50', '1');
INSERT INTO `erp_user` VALUES ('2024044638-65dce1dbcce4014302faaf44f359058a', 'Pedaran', 'pedaran', '11142af6e1217a3dadaf148ba191a0c03ff0301e0badc315426c81703e8f9a5f', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:46:22', '16-06-2024 21:55:33', '1');
INSERT INTO `erp_user` VALUES ('2024065735-eb0565e89dc4ecdade78df75891f391a', 'tester', 'tester', '9bba5c53a0545e0c80184b946153c9f58387e3bd1d4ee35740f29ac2e718b019', '97b83ea9-258e-11ef-916f-9009dfabca9c', '18-06-2024 11:57:13', '22-06-2024 13:31:08', '1');
INSERT INTO `erp_user` VALUES ('2024092132-4181e206c8c65516d143118db5ac1a64', 'Dadi', 'dadi', '938e9e6fb55e6fcc18bec98ada49f0679446cd77c892e9fd884ba6c5a603246b', '97b83ea9-258e-11ef-916f-9009dfabca9c', '14-06-2024 09:21:23', '', '1');
INSERT INTO `erp_user` VALUES ('618ab35b-259d-11ef-9d8f-9009dfabca9c', 'Administrator', 'admin', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '94868ac6-258e-11ef-916f-9009dfabca9c', '08-06-2024 20:45:28', '27-08-2024 09:42:58', '1');

SET FOREIGN_KEY_CHECKS = 1;
