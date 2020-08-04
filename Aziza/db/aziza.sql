/*
 Navicat Premium Data Transfer

 Source Server         : baseprueba
 Source Server Type    : MySQL
 Source Server Version : 100139
 Source Host           : localhost:3306
 Source Schema         : aziza2

 Target Server Type    : MySQL
 Target Server Version : 100139
 File Encoding         : 65001

 Date: 04/08/2020 20:03:28
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for resetpwd
-- ----------------------------
DROP TABLE IF EXISTS `resetpwd`;
CREATE TABLE `resetpwd`  (
  `idPwdReset` int(11) NOT NULL AUTO_INCREMENT,
  `pwdResetMail` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pwdResetToken` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `pwdResetExpires` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`idPwdReset`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for tipoproductos
-- ----------------------------
DROP TABLE IF EXISTS `tipoproductos`;
CREATE TABLE `tipoproductos`  (
  `idTipo` int(5) NOT NULL,
  `descripcion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idTipo`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of tipoproductos
-- ----------------------------
INSERT INTO `tipoproductos` VALUES (1, 'Anillo');
INSERT INTO `tipoproductos` VALUES (2, 'Aro');
INSERT INTO `tipoproductos` VALUES (3, 'Collar');
INSERT INTO `tipoproductos` VALUES (4, 'Pulsera');
INSERT INTO `tipoproductos` VALUES (5, 'Panuelo');
INSERT INTO `tipoproductos` VALUES (6, 'Mochila');

-- ----------------------------
-- Table structure for productos
-- ----------------------------
DROP TABLE IF EXISTS `productos`;
CREATE TABLE `productos`  (
  `idProducto` int(5) NOT NULL AUTO_INCREMENT,
  `nproducto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `idTipo` int(5) NULL DEFAULT NULL,
  `img` longblob NOT NULL,
  `precio` decimal(10, 0) NULL DEFAULT NULL,
  `habilitado` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`idProducto`) USING BTREE,
  INDEX `fk_idTipo`(`idTipo`) USING BTREE,
  CONSTRAINT `fk_idTipo` FOREIGN KEY (`idTipo`) REFERENCES `tipoproductos` (`idTipo`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 25 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for usuarios
-- ----------------------------
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios`  (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `apellido` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefono` int(15) NOT NULL,
  `tipoUsuario` int(1) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `email`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of usuarios
-- ----------------------------
INSERT INTO `usuarios` VALUES (1, 'admi', 'admi', 'admi@admi.com', '60eb0f73e33ce3ffd4e51d974447db53', 11111111, 1);
INSERT INTO `usuarios` VALUES (2, 'usuario2', 'usuario2', 'usuario2@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1556324877, 2);

SET FOREIGN_KEY_CHECKS = 1;
