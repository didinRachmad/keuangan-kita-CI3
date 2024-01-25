/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 80030 (8.0.30)
 Source Host           : localhost:3306
 Source Schema         : buku_usaha

 Target Server Type    : MySQL
 Target Server Version : 80030 (8.0.30)
 File Encoding         : 65001

 Date: 23/01/2024 13:10:52
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for debit
-- ----------------------------
DROP TABLE IF EXISTS `debit`;
CREATE TABLE `debit`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_transaksi` decimal(10, 0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 43 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of debit
-- ----------------------------
INSERT INTO `debit` VALUES (36, 24, 'TES', '2024-01-22', 250000);
INSERT INTO `debit` VALUES (37, 24, 'MASUK', '2024-01-22', 10000);
INSERT INTO `debit` VALUES (40, 24, 'YA', '2024-01-22', 550000);
INSERT INTO `debit` VALUES (42, 24, 'KELUAR', '2024-01-23', 25000);

-- ----------------------------
-- Table structure for kredit
-- ----------------------------
DROP TABLE IF EXISTS `kredit`;
CREATE TABLE `kredit`  (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `keterangan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tanggal_transaksi` date NOT NULL,
  `total_transaksi` decimal(10, 0) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 44 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of kredit
-- ----------------------------
INSERT INTO `kredit` VALUES (43, 24, 'GAJIAN', '2024-01-23', 4500000);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id_username` int NOT NULL AUTO_INCREMENT,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `namaUsaha` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`id_username`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (23, 'firdaus', 'Firdaus Speaker', '$2y$10$HuBsAuA/bYgJ4zE2SfZTR.I1E8jOeAGKLUUU1qaCxRfc2sNBvbJK2');
INSERT INTO `user` VALUES (24, 'Rachmad', 'Rumah Tangga', '$2y$10$46v223uW2KvmSUsU6uVf6eGSmrur0Xxe49uK32b.w7jG9vO0xHjQG');

SET FOREIGN_KEY_CHECKS = 1;
