/*
Navicat MySQL Data Transfer

Source Server         : LOCAL
Source Server Version : 50617
Source Host           : 127.0.0.1:3306
Source Database       : rest

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2014-09-01 10:18:08
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for orders
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id_order` int(10) NOT NULL AUTO_INCREMENT,
  `id_sap_order` int(20) NOT NULL,
  `state` varchar(10) COLLATE utf8_bin NOT NULL,
  `details` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `date` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_order`),
  KEY `id_sap_order` (`id_sap_order`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('1', '5456456', 'yusfsdf', 'sdfsdfsdf', '2014-08-28 15:48:29');
INSERT INTO `orders` VALUES ('2', '54454546', 'asdadsadas', '', '2014-08-28 16:20:57');
INSERT INTO `orders` VALUES ('3', '54454546', '', '', '2014-08-28 16:22:17');
INSERT INTO `orders` VALUES ('4', '54454546', '', '', '2014-08-28 16:24:22');
INSERT INTO `orders` VALUES ('5', '54454546', 'ssdfdsfdsf', '', '2014-08-28 16:41:32');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id_user` int(255) NOT NULL AUTO_INCREMENT,
  `user` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'usuario1');
INSERT INTO `user` VALUES ('2', 'usuario2');
