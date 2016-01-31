/*
Navicat MySQL Data Transfer

Source Server         : localhost 1.8.3
Source Server Version : 50614
Source Host           : localhost:3306
Source Database       : demo

Target Server Type    : MYSQL
Target Server Version : 50614
File Encoding         : 65001

Date: 2015-07-01 14:25:08
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT NULL,
  `role_id` int(10) unsigned DEFAULT NULL,
  `keyactive` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('13', 'thanhlong296', '$2y$10$QQmCK7gFJKht0y5moOy/cOfiQG.ma6BDthd4AYjYxiUEsdJ27wbyi', 'thanhlong29689@gmail.com', null, null, '1', '2', '34173cb38f', 'I4ZH4td9wEO8vS5UpTTgWezKIxn8j0JDqvGhtPDGXfrzkBNRd2hEWdvYiuEj', '2015-06-23 08:02:39', '2015-06-24 05:10:50');
INSERT INTO `users` VALUES ('14', '123', '123', '123', '123', '123', '123', '123', '123', '123', '0000-00-00 00:00:00', '0000-00-00 00:00:00');
