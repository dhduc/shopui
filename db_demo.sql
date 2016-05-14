/*
Navicat MySQL Data Transfer

Source Server         : Localhost
Source Server Version : 50621
Source Host           : localhost:3306
Source Database       : db_demo

Target Server Type    : MYSQL
Target Server Version : 50621
File Encoding         : 65001

Date: 2015-07-24 09:42:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', 'MISC', '0', '2015-07-21 09:36:34', '2015-07-21 09:36:34');
INSERT INTO `category` VALUES ('26', 'COMPUTERS', '0', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `category` VALUES ('27', 'ACCESSORIES', '0', '2015-07-21 09:56:20', '2015-07-21 09:56:20');
INSERT INTO `category` VALUES ('28', 'DESKTOP', '26', '2015-07-21 09:39:10', '2015-07-21 09:39:10');
INSERT INTO `category` VALUES ('29', 'LAPTOPS AND TABLETS', '26', '2015-07-21 09:39:56', '2015-07-21 09:39:56');
INSERT INTO `category` VALUES ('30', 'TELEVISIONS', '0', '2015-07-21 09:40:50', '2015-07-21 09:40:50');
INSERT INTO `category` VALUES ('32', 'ULTRA HD', '30', '2015-07-21 09:47:46', '2015-07-21 09:47:46');
INSERT INTO `category` VALUES ('33', 'LCD', '30', '2015-07-21 09:48:03', '2015-07-21 09:48:03');
INSERT INTO `category` VALUES ('37', 'CELL PHONE', '0', '2015-07-21 09:49:26', '2015-07-21 09:49:26');
INSERT INTO `category` VALUES ('38', 'APPLE', '37', '2015-07-21 09:49:53', '2015-07-21 09:49:53');
INSERT INTO `category` VALUES ('39', 'ANDROID', '37', '2015-07-21 09:50:19', '2015-07-21 09:50:19');
INSERT INTO `category` VALUES ('40', 'WINDOWS', '37', '2015-07-21 09:50:37', '2015-07-21 09:50:37');
INSERT INTO `category` VALUES ('41', 'CAMERA', '0', '2015-07-21 09:50:56', '2015-07-21 09:50:56');
INSERT INTO `category` VALUES ('42', 'DIGITAL', '41', '2015-07-21 09:58:09', '2015-07-21 09:58:09');

-- ----------------------------
-- Table structure for `config`
-- ----------------------------
DROP TABLE IF EXISTS `config`;
CREATE TABLE `config` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `favicon` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `tax` double(4,2) NOT NULL,
  `ship` double(2,0) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of config
-- ----------------------------
INSERT INTO `config` VALUES ('1', 'METRONIC', 'images/img/1437453244logo-shop-green.png.png', 'images/img/1437453315favicon.ico.ico', 'huuduc.uneti@gmail.com', '(84) 04 456 789', '10.00', '5', '2015-07-21 11:35:15', '2015-07-21 11:35:15');

-- ----------------------------
-- Table structure for `customer`
-- ----------------------------
DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `telephone` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of customer
-- ----------------------------
INSERT INTO `customer` VALUES ('19', 'Đào Hữu Đức', 'huuduc.uneti@gmail.com', '01675942102', '54', 'HN', '2015-07-22 15:27:46', '2015-07-22 15:27:46');
INSERT INTO `customer` VALUES ('21', 'HD', 'huuduc.uneti@gmail.com', '01675942102', '54', 'HN', '2015-07-22 15:50:05', '2015-07-22 15:50:05');
INSERT INTO `customer` VALUES ('22', 'Micheal', 'micheal@gmail.com', '84123456789', '123 Baker Street', 'Lon Don', '2015-07-24 09:14:37', '2015-07-24 09:14:37');

-- ----------------------------
-- Table structure for `images`
-- ----------------------------
DROP TABLE IF EXISTS `images`;
CREATE TABLE `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `productID` int(11) DEFAULT NULL,
  `imageName` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `imageSrc` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `imageType` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of images
-- ----------------------------
INSERT INTO `images` VALUES ('32', null, 'sl-2.jpg', 'images/slider/1437445295sl-2.jpg.jpg', 'slider');
INSERT INTO `images` VALUES ('33', null, 'sl-3.jpg', 'images/slider/1437445295sl-3.jpg.jpg', 'slider');
INSERT INTO `images` VALUES ('34', null, 'sl-4.jpg', 'images/slider/1437445295sl-4.jpg.jpg', 'slider');
INSERT INTO `images` VALUES ('35', null, 'sl-5.jpg', 'images/slider/1437445295sl-5.jpg.jpg', 'slider');
INSERT INTO `images` VALUES ('36', '10', 'pd-24.jpg', 'images/product/1437463282pd-24.jpg.jpg', null);
INSERT INTO `images` VALUES ('37', '10', 'pd-24b.jpg', 'images/product/1437463282pd-24b.jpg.jpg', null);
INSERT INTO `images` VALUES ('38', '11', 'pd-23.jpg', 'images/product/1437463627pd-23.jpg.jpg', null);
INSERT INTO `images` VALUES ('39', '12', 'pd-26.jpg', 'images/product/1437463827pd-26.jpg.jpg', null);
INSERT INTO `images` VALUES ('40', '13', 'pd-25.jpg', 'images/product/1437463910pd-25.jpg.jpg', null);
INSERT INTO `images` VALUES ('41', '14', 'pd-27.jpg', 'images/product/1437463992pd-27.jpg.jpg', null);
INSERT INTO `images` VALUES ('42', '15', 'pd-7.jpg', 'images/product/1437464279pd-7.jpg.jpg', null);
INSERT INTO `images` VALUES ('43', '16', 'pd-1a.jpg', 'images/product/1437464387pd-1a.jpg.jpg', null);
INSERT INTO `images` VALUES ('44', '16', 'pd-1b.jpg', 'images/product/1437464387pd-1b.jpg.jpg', null);
INSERT INTO `images` VALUES ('45', '17', 'pd-3a.jpg', 'images/product/1437464474pd-3a.jpg.jpg', null);
INSERT INTO `images` VALUES ('46', '17', 'pd-3b.jpg', 'images/product/1437464474pd-3b.jpg.jpg', null);
INSERT INTO `images` VALUES ('47', '17', 'pd-3c.jpg', 'images/product/1437464474pd-3c.jpg.jpg', null);
INSERT INTO `images` VALUES ('48', '18', 'pd-4a.jpg', 'images/product/1437464539pd-4a.jpg.jpg', null);
INSERT INTO `images` VALUES ('49', '19', 'pd-6.jpg', 'images/product/1437464657pd-6.jpg.jpg', null);
INSERT INTO `images` VALUES ('50', '20', 'pd-45.jpg', 'images/product/1437464746pd-45.jpg.jpg', null);
INSERT INTO `images` VALUES ('51', '21', 'pd-58.jpg', 'images/product/1437464800pd-58.jpg.jpg', null);
INSERT INTO `images` VALUES ('52', '22', 'pd-59.jpg', 'images/product/1437464855pd-59.jpg.jpg', null);
INSERT INTO `images` VALUES ('53', '23', 'pd-60.jpg', 'images/product/1437464916pd-60.jpg.jpg', null);
INSERT INTO `images` VALUES ('54', '24', 'pd-61.jpg', 'images/product/1437464977pd-61.jpg.jpg', null);
INSERT INTO `images` VALUES ('55', '25', 'pd-18.jpg', 'images/product/1437535601pd-18.jpg.jpg', null);
INSERT INTO `images` VALUES ('56', '25', 'pd-19.jpg', 'images/product/1437535601pd-19.jpg.jpg', null);
INSERT INTO `images` VALUES ('57', '26', 'pd-16.jpg', 'images/product/1437535680pd-16.jpg.jpg', null);
INSERT INTO `images` VALUES ('58', '27', 'pd-39.jpg', 'images/product/1437535795pd-39.jpg.jpg', null);
INSERT INTO `images` VALUES ('59', '28', 'pd-42.jpg', 'images/product/1437535876pd-42.jpg.jpg', null);
INSERT INTO `images` VALUES ('60', '29', 'pd-44.jpg', 'images/product/1437535963pd-44.jpg.jpg', null);
INSERT INTO `images` VALUES ('61', '30', 'pd-21.jpg', 'images/product/1437536224pd-21.jpg.jpg', null);
INSERT INTO `images` VALUES ('62', '31', 'pd-22.jpg', 'images/product/1437536302pd-22.jpg.jpg', null);
INSERT INTO `images` VALUES ('63', '32', 'pd-17.jpg', 'images/product/1437536377pd-17.jpg.jpg', null);
INSERT INTO `images` VALUES ('64', '33', 'pd-40.jpg', 'images/product/1437536460pd-40.jpg.jpg', null);
INSERT INTO `images` VALUES ('65', '34', 'pd-41.jpg', 'images/product/1437536580pd-41.jpg.jpg', null);
INSERT INTO `images` VALUES ('66', '35', 'pd-37.jpg', 'images/product/1437536815pd-37.jpg.jpg', null);
INSERT INTO `images` VALUES ('67', '36', 'pd-38.jpg', 'images/product/1437536891pd-38.jpg.jpg', null);
INSERT INTO `images` VALUES ('68', '37', 'pd-34.jpg', 'images/product/1437536965pd-34.jpg.jpg', null);
INSERT INTO `images` VALUES ('69', '38', 'pd-35.jpg', 'images/product/1437537031pd-35.jpg.jpg', null);
INSERT INTO `images` VALUES ('70', '39', 'pd-36.jpg', 'images/product/1437537106pd-36.jpg.jpg', null);
INSERT INTO `images` VALUES ('71', '40', 'pd-5.jpg', 'images/product/1437537532pd-5.jpg.jpg', null);
INSERT INTO `images` VALUES ('72', '41', 'pd-33.jpg', 'images/product/1437537615pd-33.jpg.jpg', null);
INSERT INTO `images` VALUES ('73', '42', 'pd-29b.jpg', 'images/product/1437537690pd-29b.jpg.jpg', null);
INSERT INTO `images` VALUES ('74', '42', 'pd-30.jpg', 'images/product/1437537690pd-30.jpg.jpg', null);
INSERT INTO `images` VALUES ('75', '43', 'pd-28.jpg', 'images/product/1437537758pd-28.jpg.jpg', null);
INSERT INTO `images` VALUES ('76', '44', 'pd-29.jpg', 'images/product/1437537841pd-29.jpg.jpg', null);
INSERT INTO `images` VALUES ('77', '45', 'pd-32.jpg', 'images/product/1437537936pd-32.jpg.jpg', null);
INSERT INTO `images` VALUES ('78', '45', 'pd-32b.jpg', 'images/product/1437537936pd-32b.jpg.jpg', null);
INSERT INTO `images` VALUES ('79', '46', 'pd-12.jpg', 'images/product/1437538042pd-12.jpg.jpg', null);
INSERT INTO `images` VALUES ('80', '47', 'pd-11.jpg', 'images/product/1437538203pd-11.jpg.jpg', null);
INSERT INTO `images` VALUES ('81', '48', 'pd-9.jpg', 'images/product/1437538259pd-9.jpg.jpg', null);
INSERT INTO `images` VALUES ('82', '49', 'pd-46.jpg', 'images/product/1437538326pd-46.jpg.jpg', null);

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------

-- ----------------------------
-- Table structure for `orderdetail`
-- ----------------------------
DROP TABLE IF EXISTS `orderdetail`;
CREATE TABLE `orderdetail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `pName` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `pPrice` double NOT NULL,
  `pQty` int(7) NOT NULL,
  `total` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orderdetail
-- ----------------------------
INSERT INTO `orderdetail` VALUES ('10', '15', '11', 'Dell Vostro 220S Desktop', '45', '2', '90', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `orderdetail` VALUES ('12', '17', '48', 'Canon Digital Rebel XT DSLR', '399', '3', '1197', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `orderdetail` VALUES ('13', '18', '13', 'HP Desktop Core 2 Duo 3.00GHZ', '550', '3', '1650', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `orderdetail` VALUES ('14', '18', '48', 'Canon Digital Rebel XT DSLR', '399', '2', '798', '2015-07-21 09:37:53', '2015-07-21 09:37:53');

-- ----------------------------
-- Table structure for `orders`
-- ----------------------------
DROP TABLE IF EXISTS `orders`;
CREATE TABLE `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userID` int(11) NOT NULL,
  `customerID` int(11) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `total` double NOT NULL,
  `note` tinytext COLLATE utf8_unicode_ci,
  `status` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of orders
-- ----------------------------
INSERT INTO `orders` VALUES ('15', '72', '19', '2015-07-22 16:31:58', '104', 'Delivery', 'Cancelled', '2015-07-22 16:31:58', '2015-07-22 16:31:58');
INSERT INTO `orders` VALUES ('17', '72', '21', '2015-07-22 16:42:49', '1321.7', '', 'Cancelled', '2015-07-22 16:42:49', '2015-07-22 16:42:49');
INSERT INTO `orders` VALUES ('18', '0', '22', '2015-07-24 09:24:37', '2697.8', 'Delivery before 12.am, please!', 'Closed', '2015-07-24 09:24:37', '2015-07-24 09:24:37');

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', 'Page', '<h2><a target=\"\" rel=\"\">Corrupti quos dolores etquas</a></h2>At vero eos et accusamus et iusto odio dignissimos ducimus qui sint blanditiis prae sentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing condimentum eleifend enim a feugiat.<blockquote>Pellentesque ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante Integer posuere erat a ante.Someone famous&nbsp;Source Title</blockquote>At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.Culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero consectetur adipiscing elit magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat. Pellentesque viverra vehicula sem ut volutpat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut non libero magna. Sed et quam lacus. Fusce condimentum eleifend enim a feugiat.', '2015-07-22 12:27:51', '2015-07-22 12:27:51');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------
INSERT INTO `password_resets` VALUES ('huuduc.uneti@yahoo.com', 'f42c7849c337be2c7c1faf7c8311100ed69dd1ad470696a7cc9315dbc29ac95d', '2015-07-07 09:56:00', null);

-- ----------------------------
-- Table structure for `permission`
-- ----------------------------
DROP TABLE IF EXISTS `permission`;
CREATE TABLE `permission` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `route` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission
-- ----------------------------
INSERT INTO `permission` VALUES ('1', '1|/', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('2', '3|/', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('3', '4|/', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('4', '5|/', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('5', '1|home', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('6', '3|home', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('7', '4|home', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('8', '5|home', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('9', '1|index', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('10', '1|auth/login', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('11', '1|auth/logout', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('12', '1|auth/register', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('13', '1|auth/verify/{key}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('14', '1|password/email', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('15', '1|password/reset/{token}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('16', '1|password/reset', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('17', '1|account/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('18', '1|account/{id}/history', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('19', '1|account/{id}/update', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('20', '1|product/{id}/{name?}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('21', '1|category/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('22', '1|producer/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('23', '1|search', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('24', '1|cart/insert', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('25', '1|cart/view', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('26', '1|cart/updateCart', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('27', '1|cart/remove/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('28', '1|cart/empty', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('29', '1|cart/checkout', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('30', '1|admin/dashboard', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('31', '1|admin/users/getDataAjax', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('32', '1|admin/users', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('33', '1|admin/users/create', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('34', '1|admin/users/{id}/edit', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('35', '1|admin/users/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('36', '1|admin/users/{id}/del', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('37', '1|admin/role/getDataAjax', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('38', '1|admin/role', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('39', '1|admin/role/create', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('40', '1|admin/role/{id}/edit', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('41', '1|admin/role/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('42', '1|admin/role/{id}/del', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('43', '1|admin/permission/getDataAjax', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('44', '1|admin/permission', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('45', '1|admin/permission/create', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('46', '1|admin/permission/{id}/edit', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('47', '1|admin/permission/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('48', '1|admin/permission/{id}/del', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('49', '1|admin/category/getDataAjax', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('50', '1|admin/category', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('51', '1|admin/category/create', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('52', '1|admin/category/{id}/edit', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('53', '1|admin/category/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('54', '1|admin/category/{id}/del', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('55', '1|admin/category/{id}/index', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('56', '1|admin/category/list', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('57', '1|admin/product/getDataAjax', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('58', '1|admin/product', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('59', '1|admin/product/create', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('60', '1|admin/product/{id}/edit', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('61', '1|admin/product/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('62', '1|admin/product/{id}/del', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('63', '1|admin/product/stock', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('64', '1|admin/product/closed', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('65', '1|admin/producer/getDataAjax', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('66', '1|admin/producer', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('67', '1|admin/producer/create', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('68', '1|admin/producer/{id}/edit', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('69', '1|admin/producer/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('70', '1|admin/producer/{id}/del', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('71', '1|admin/producer/{id}/index', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('72', '1|admin/producer/list', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('73', '1|admin/order/getDataAjax', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('74', '1|admin/order', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('75', '1|admin/order/pending', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('76', '1|admin/order/on_hold', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('77', '1|admin/order/closed', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('78', '1|admin/order/cancelled', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('79', '1|admin/order/{id}/edit', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('80', '1|admin/order/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('81', '1|admin/order/{id}/invoice', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('82', '1|admin/order/{id}/del', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('83', '1|admin/images/{key}/getDataAjax', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('84', '1|admin/images/{key}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('85', '1|admin/images/{key}/create', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('86', '1|admin/images/{key}/edit/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('87', '1|admin/images/del/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('88', '1|admin/slider', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('89', '1|admin/slider/del/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('90', '1|admin/config', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('91', '1|admin/config/update', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('92', '1|admin/pages/getDataAjax', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('93', '1|admin/pages', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('94', '1|admin/pages/create', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('95', '1|admin/pages/{id}/edit', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('96', '1|admin/pages/{id}', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('97', '1|admin/pages/{id}/del', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('98', '1|admin/demo', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('99', '1|demo/{id}/page', '2015-07-21 09:37:53', '2015-07-21 09:37:53');
INSERT INTO `permission` VALUES ('100', '1|demo/image_upload', '2015-07-21 09:37:53', '2015-07-21 09:37:53');

-- ----------------------------
-- Table structure for `producer`
-- ----------------------------
DROP TABLE IF EXISTS `producer`;
CREATE TABLE `producer` (
  `id` tinyint(11) NOT NULL AUTO_INCREMENT,
  `producer` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `logo` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `information` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of producer
-- ----------------------------
INSERT INTO `producer` VALUES ('6', 'ACER', 'images/brands/1437642304acer.jpg.jpg', 'Fermentum, elit eget tincidunt condimentum', '2015-07-23 16:05:04', '2015-07-23 16:05:04');
INSERT INTO `producer` VALUES ('7', 'DELL', 'images/brands/1437656243dell.png.png', 'Auctor Phasellus lacinia fringilla euismod augue', '2015-07-23 19:57:23', '2015-07-23 19:57:23');
INSERT INTO `producer` VALUES ('8', 'HP', 'images/brands/1437656262hp.png.png', 'Curabitur interdum. Auctor Phasellus lacinia fringilla', '2015-07-23 19:57:42', '2015-07-23 19:57:42');
INSERT INTO `producer` VALUES ('9', 'LENOVO', 'images/brands/1437656284lenovo.jpg.jpg', 'Nulla consectetuer Aenean volutpat fames Sed.', '2015-07-23 19:58:04', '2015-07-23 19:58:04');
INSERT INTO `producer` VALUES ('10', 'LOGITECH', 'images/brands/1437656343logitech.jpg.jpg', 'Cras in mi at felis aliquet congue. ', '2015-07-23 19:59:03', '2015-07-23 19:59:03');
INSERT INTO `producer` VALUES ('11', 'SAMSUNG', 'images/brands/1437656370samsung.png.png', 'Donec eleifend, libero at sagittis mollis.', '2015-07-23 19:59:30', '2015-07-23 19:59:30');
INSERT INTO `producer` VALUES ('12', 'TABLETX', 'images/brands/1437656390Header-logo_small.jpg.jpg', 'Sagittis euismod lorem sodales consectetuer ', '2015-07-23 19:59:50', '2015-07-23 19:59:50');
INSERT INTO `producer` VALUES ('13', 'LG', 'images/brands/1437656539lg.jpg.jpg', 'Consectetur adipiscing elit. Vivamus magna. ', '2015-07-23 20:02:19', '2015-07-23 20:02:19');
INSERT INTO `producer` VALUES ('14', 'SONY', 'images/brands/1437656554sony.png.png', 'Praesent ut nibh eget dui bibendum porttitor.', '2015-07-23 20:02:34', '2015-07-23 20:02:34');
INSERT INTO `producer` VALUES ('15', 'NOKIA', 'images/brands/1437656522nokia.jpg.jpg', 'Proin Fusce lacinia Phasellus leo turpis Duis ', '2015-07-23 20:02:02', '2015-07-23 20:02:02');
INSERT INTO `producer` VALUES ('16', 'HTC', 'images/brands/1437656582htc.png.png', 'Pretium consequat justo orci Aliquam Curabitur', '2015-07-23 20:03:02', '2015-07-23 20:03:02');
INSERT INTO `producer` VALUES ('17', 'APPLE', 'images/brands/1437656602apple.png.png', 'Curabitur massa. Donec eleifend, libero at sagittis ', '2015-07-23 20:03:22', '2015-07-23 20:03:22');
INSERT INTO `producer` VALUES ('18', 'CANON', 'images/brands/1437656615canon.jpg.jpg', 'Pellentesque habitant morbi tristique senectus et netus ', '2015-07-23 20:03:35', '2015-07-23 20:03:35');

-- ----------------------------
-- Table structure for `product`
-- ----------------------------
DROP TABLE IF EXISTS `product`;
CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `thumbnail` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `category_id` tinyint(11) NOT NULL,
  `seller_id` tinyint(11) NOT NULL,
  `cost` double(11,2) NOT NULL,
  `price` double(11,2) NOT NULL,
  `producer` tinyint(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `information` text COLLATE utf8_unicode_ci NOT NULL,
  `number` int(11) NOT NULL,
  `purchase` int(11) NOT NULL DEFAULT '0',
  `status` int(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of product
-- ----------------------------
INSERT INTO `product` VALUES ('10', 'Acer DA220HQL', 'images/product/1437463282pd-24.jpg.jpg', '28', '72', '90.00', '100.00', '6', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><span><b>Additional features</b>\r\n  </span></h2><span>\r\n \r\n <span>\r\n  <span>\r\n  <b>Value 1</b>\r\n  </span>\r\n  <span>\r\n  Width\r\n  <br></span>\r\n </span>\r\n <span>\r\n  <span>\r\n  <b>Value 2</b>\r\n  </span>\r\n  <span>\r\n  Height\r\n  <br></span>\r\n </span>\r\n <span>\r\n  <span>\r\n  <b>Value 3</b>\r\n  </span>\r\n  <span>\r\n  Weight\r\n  <br></span>\r\n </span>\r\n <span>\r\n  <span>\r\n  <b>Value 4</b>\r\n  </span>\r\n  <span>\r\n  Material\r\n  <br></span>\r\n </span>\r\n <span>\r\n  <span>\r\n  <b>Value 5</b>\r\n  </span>\r\n  \r\n  Production\r\n  \r\n </span>\r\n</span>\r\n\r\n&nbsp;', '100', '0', '1', '2015-07-23 20:44:14', '2015-07-23 20:44:14');
INSERT INTO `product` VALUES ('11', 'Dell Vostro 220S Desktop', 'images/product/1437463627pd-23.jpg.jpg', '28', '72', '40.00', '45.00', '7', 'Sagittis euismod lorem sodales consectetuer orci turpis condimentum quis condimentum senectus. At ut urna convallis lacinia ac libero condimentum penatibus nisl Nullam. Pellentesque nec tempus porttitor et iaculis sem Morbi faucibus id nibh. Proin Fusce lacinia Phasellus leo turpis Duis Mauris egestas vitae Pellentesque. Accumsan mus Pellentesque et lacus vitae dui Curabitur et Curabitur interdum. Auctor Phasellus lacinia fringilla euismod augue nibh lorem laoreet habitasse ac. Eleifend platea condimentum.', '<h2><span><b>Additional features</b>\r\n  </span></h2><span>\r\n \r\n <span>\r\n  <span>\r\n  <b>Value 1</b>\r\n  </span>\r\n  <span>\r\n  Width\r\n  <br></span>\r\n </span>\r\n <span>\r\n  <span>\r\n  <b>Value 2</b>\r\n  </span>\r\n  <span>\r\n  Height\r\n  <br></span>\r\n </span>\r\n <span>\r\n  <span>\r\n  <b>Value 3</b>\r\n  </span>\r\n  <span>\r\n  Weight\r\n  <br></span>\r\n </span>\r\n <span>\r\n  <span>\r\n  <b>Value 4</b>\r\n  </span>\r\n  <span>\r\n  Material\r\n  <br></span>\r\n </span>\r\n <span>\r\n  <span>\r\n  <b>Value 5</b>\r\n  </span>\r\n  \r\n  Production\r\n  \r\n </span>\r\n</span>\r\n\r\n&nbsp;', '100', '0', '1', '2015-07-23 20:44:14', '2015-07-23 20:44:14');
INSERT INTO `product` VALUES ('12', 'Dell Optiplex 760 All-In-One', 'images/product/1437463827pd-26.jpg.jpg', '28', '72', '220.00', '250.00', '7', 'Sagittis euismod lorem sodales consectetuer orci turpis condimentum quis condimentum senectus. At ut urna convallis lacinia ac libero condimentum penatibus nisl Nullam. Pellentesque nec tempus porttitor et iaculis sem Morbi faucibus id nibh. Proin Fusce lacinia Phasellus leo turpis Duis Mauris egestas vitae Pellentesque. Accumsan mus Pellentesque et lacus vitae dui Curabitur et Curabitur interdum. Auctor Phasellus lacinia fringilla euismod augue nibh lorem laoreet habitasse ac. Eleifend platea condimentum.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '100', '0', '1', '2015-07-23 20:44:15', '2015-07-23 20:44:15');
INSERT INTO `product` VALUES ('13', 'HP Desktop Core 2 Duo 3.00GHZ', 'images/product/1437463910pd-25.jpg.jpg', '28', '72', '500.00', '550.00', '8', 'Sagittis euismod lorem sodales consectetuer orci turpis condimentum quis condimentum senectus. At ut urna convallis lacinia ac libero condimentum penatibus nisl Nullam. Pellentesque nec tempus porttitor et iaculis sem Morbi faucibus id nibh. Proin Fusce lacinia Phasellus leo turpis Duis Mauris egestas vitae Pellentesque. Accumsan mus Pellentesque et lacus vitae dui Curabitur et Curabitur interdum. Auctor Phasellus lacinia fringilla euismod augue nibh lorem laoreet habitasse ac. Eleifend platea condimentum.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '97', '3', '1', '2015-07-24 09:14:37', '2015-07-24 09:14:37');
INSERT INTO `product` VALUES ('14', 'Lenovo ThinkCentre M53', 'images/product/1437463992pd-27.jpg.jpg', '28', '72', '400.00', '450.00', '9', 'Quisque elit urna condimentum Aenean tempus wisi Maecenas sem adipiscing. Pretium consequat justo orci Aliquam Curabitur id habitant at lacinia Pellentesque. Nibh ante elit eu iaculis ac lacus urna dolor orci Suspendisse. Praesent Sed sit tellus Aenean nulla consectetuer Aenean volutpat fames Sed. Lorem netus Curabitur Pellentesque eu nibh mi a pellentesque et Vestibulum. Purus.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '100', '0', '1', '2015-07-23 20:44:15', '2015-07-23 20:44:15');
INSERT INTO `product` VALUES ('15', 'HP Stream', 'images/product/1437464279pd-7.jpg.jpg', '29', '72', '100.00', '120.00', '8', 'Ellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '100', '0', '1', '2015-07-23 20:44:16', '2015-07-23 20:44:16');
INSERT INTO `product` VALUES ('16', 'Samsung Galaxy Tab 4', 'images/product/1437464387pd-1a.jpg.jpg', '29', '72', '150.00', '170.00', '11', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '100', '0', '1', '2015-07-23 20:44:16', '2015-07-23 20:44:16');
INSERT INTO `product` VALUES ('17', 'HP 8 G2-1411', 'images/product/1437464474pd-3a.jpg.jpg', '29', '72', '90.00', '100.00', '8', 'Consectetur adipiscing elit. Vivamus magna. Cras in mi at felis aliquet congue. Ut a est eget ligula molestie gravida. Curabitur massa. Donec eleifend, libero at sagittis mollis, tellus est malesuada tellus, at luctus turpis elit sit amet quam. Vivamus pretium ornare est.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '50', '0', '1', '2015-07-23 20:44:16', '2015-07-23 20:44:16');
INSERT INTO `product` VALUES ('18', 'Dragon Touch® Y88X 7', 'images/product/1437464539pd-4a.jpg.jpg', '29', '72', '70.00', '80.00', '12', 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '50', '0', '1', '2015-07-23 20:44:16', '2015-07-23 20:44:16');
INSERT INTO `product` VALUES ('19', 'Monster 7', 'images/product/1437464657pd-6.jpg.jpg', '29', '72', '100.00', '120.00', '12', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '100', '0', '1', '2015-07-23 20:44:16', '2015-07-23 20:44:16');
INSERT INTO `product` VALUES ('20', 'Clear Case Protector', 'images/product/1437464746pd-45.jpg.jpg', '27', '72', '20.00', '30.00', '17', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '200', '0', '1', '2015-07-23 20:44:16', '2015-07-23 20:44:16');
INSERT INTO `product` VALUES ('21', 'Quirky Cordies Desktop Cable', 'images/product/1437464800pd-58.jpg.jpg', '27', '72', '20.00', '30.00', '11', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '200', '0', '1', '2015-07-23 20:44:17', '2015-07-23 20:44:17');
INSERT INTO `product` VALUES ('22', 'Wired Keyboard', 'images/product/1437464855pd-59.jpg.jpg', '27', '72', '30.00', '40.00', '10', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '150', '0', '1', '2015-07-23 20:44:17', '2015-07-23 20:44:17');
INSERT INTO `product` VALUES ('23', 'Logitech Wireless Wave Combo Mk550', 'images/product/1437464916pd-60.jpg.jpg', '27', '72', '50.00', '56.00', '10', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '150', '0', '1', '2015-07-23 20:44:17', '2015-07-23 20:44:17');
INSERT INTO `product` VALUES ('24', 'Logitech M570 Wireless Trackball', 'images/product/1437464977pd-61.jpg.jpg', '27', '72', '36.00', '41.00', '10', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '200', '0', '1', '2015-07-23 20:44:17', '2015-07-23 20:44:17');
INSERT INTO `product` VALUES ('25', 'LG Electronics 32LB560B 32-Inch', 'images/product/1437535601pd-18.jpg.jpg', '32', '72', '300.00', '335.00', '13', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '50', '0', '1', '2015-07-23 20:44:17', '2015-07-23 20:44:17');
INSERT INTO `product` VALUES ('26', 'LG Electronics 50PB6650', 'images/product/1437535680pd-16.jpg.jpg', '32', '72', '20.00', '25.00', '13', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '50', '0', '1', '2015-07-23 20:44:17', '2015-07-23 20:44:17');
INSERT INTO `product` VALUES ('27', 'Sony BRAVIA V-Series KDL-52V5100', 'images/product/1437535795pd-39.jpg.jpg', '32', '72', '700.00', '750.00', '14', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '50', '0', '1', '2015-07-23 20:44:18', '2015-07-23 20:44:17');
INSERT INTO `product` VALUES ('28', 'Samsung UN85S9 Framed', 'images/product/1437535876pd-42.jpg.jpg', '32', '72', '4000.00', '4200.00', '11', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '50', '0', '1', '2015-07-23 20:44:18', '2015-07-23 20:44:18');
INSERT INTO `product` VALUES ('29', 'Samsung UN60H7100', 'images/product/1437535963pd-44.jpg.jpg', '32', '72', '800.00', '870.00', '11', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '50', '0', '1', '2015-07-23 20:44:18', '2015-07-23 20:44:18');
INSERT INTO `product` VALUES ('30', 'Samsung PN58B650', 'images/product/1437536224pd-21.jpg.jpg', '33', '72', '700.00', '780.00', '11', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '70', '0', '1', '2015-07-23 20:44:18', '2015-07-23 20:44:18');
INSERT INTO `product` VALUES ('31', 'LG Electronics 60PB6900', 'images/product/1437536302pd-22.jpg.jpg', '33', '72', '1160.00', '1250.00', '13', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '70', '0', '1', '2015-07-23 20:44:18', '2015-07-23 20:44:18');
INSERT INTO `product` VALUES ('32', 'Samsung PN51F5300 51-Inch', 'images/product/1437536377pd-17.jpg.jpg', '33', '72', '500.00', '570.00', '11', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '70', '0', '1', '2015-07-23 20:44:19', '2015-07-23 20:44:19');
INSERT INTO `product` VALUES ('33', 'Sony Bravia L-Series KDL-32L5000', 'images/product/1437536460pd-40.jpg.jpg', '33', '72', '300.00', '350.00', '14', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '60', '0', '1', '2015-07-23 20:44:19', '2015-07-23 20:44:19');
INSERT INTO `product` VALUES ('34', 'Samsung UN105S9 Curved 105', 'images/product/1437536580pd-41.jpg.jpg', '33', '72', '1220.00', '1300.00', '11', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '60', '0', '1', '2015-07-23 20:44:19', '2015-07-23 20:44:19');
INSERT INTO `product` VALUES ('35', 'IPhone 4 32GB (Black)', 'images/product/1437536815pd-37.jpg.jpg', '38', '72', '100.00', '120.00', '17', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '150', '0', '1', '2015-07-23 20:44:19', '2015-07-23 20:44:19');
INSERT INTO `product` VALUES ('36', 'IPhone 5s 16GB', 'images/product/1437536891pd-38.jpg.jpg', '38', '72', '400.00', '470.00', '17', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '100', '0', '1', '2015-07-23 20:44:19', '2015-07-23 20:44:19');
INSERT INTO `product` VALUES ('37', 'Apple iPhone 5c', 'images/product/1437536965pd-34.jpg.jpg', '38', '72', '370.00', '420.00', '17', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '120', '0', '1', '2015-07-23 20:44:19', '2015-07-23 20:44:19');
INSERT INTO `product` VALUES ('38', 'Apple iPhone 6 Plus, Gold', 'images/product/1437537031pd-35.jpg.jpg', '38', '72', '500.00', '550.00', '17', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '120', '0', '1', '2015-07-23 20:44:20', '2015-07-23 20:44:20');
INSERT INTO `product` VALUES ('39', 'Apple iPhone 6, Silver', 'images/product/1437537106pd-36.jpg.jpg', '38', '72', '510.00', '570.00', '17', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '70', '0', '1', '2015-07-23 20:44:20', '2015-07-23 20:44:20');
INSERT INTO `product` VALUES ('40', 'Alldaymall® A88X 7', 'images/product/1437537532pd-5.jpg.jpg', '39', '72', '50.00', '60.00', '12', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '150', '0', '1', '2015-07-23 20:44:20', '2015-07-23 20:44:20');
INSERT INTO `product` VALUES ('41', 'LG Optimus Exceed 2', 'images/product/1437537615pd-33.jpg.jpg', '39', '72', '55.00', '65.00', '13', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '100', '0', '1', '2015-07-23 20:44:20', '2015-07-23 20:44:20');
INSERT INTO `product` VALUES ('42', 'Samsung Galaxy S4', 'images/product/1437537690pd-29b.jpg.jpg', '39', '72', '150.00', '200.00', '11', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '150', '0', '1', '2015-07-23 20:44:20', '2015-07-23 20:44:20');
INSERT INTO `product` VALUES ('43', 'Samsung Galaxy S5', 'images/product/1437537758pd-28.jpg.jpg', '39', '72', '200.00', '250.00', '11', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '100', '0', '1', '2015-07-23 20:44:21', '2015-07-23 20:44:21');
INSERT INTO `product` VALUES ('44', 'HTC Desire 510', 'images/product/1437537841pd-29.jpg.jpg', '39', '72', '100.00', '120.00', '16', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '110', '0', '1', '2015-07-23 20:44:21', '2015-07-23 20:44:21');
INSERT INTO `product` VALUES ('45', 'Nokia Lumia 520 GoPhone', 'images/product/1437537936pd-32.jpg.jpg', '40', '72', '120.00', '150.00', '15', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '130', '0', '1', '2015-07-23 20:44:21', '2015-07-23 20:44:21');
INSERT INTO `product` VALUES ('46', 'HD for Kindle Fire', 'images/product/1437538042pd-12.jpg.jpg', '42', '72', '20.00', '27.00', '18', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '50', '0', '1', '2015-07-23 20:44:21', '2015-07-23 20:44:21');
INSERT INTO `product` VALUES ('47', 'Canon EOS Rebel 2000 Silver', 'images/product/1437538203pd-11.jpg.jpg', '42', '72', '250.00', '299.00', '6', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '50', '0', '1', '2015-07-23 20:44:21', '2015-07-23 20:44:21');
INSERT INTO `product` VALUES ('48', 'Canon Digital Rebel XT DSLR', 'images/product/1437538259pd-9.jpg.jpg', '42', '72', '350.00', '399.00', '18', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '68', '2', '1', '2015-07-24 09:14:37', '2015-07-24 09:14:37');
INSERT INTO `product` VALUES ('49', 'Drift Timelapse', 'images/product/1437538326pd-46.jpg.jpg', '42', '72', '120.50', '150.99', '18', 'Vestibulum tortor quam, feugiat vitae, ultricies eget, tempor sit amet, ante. Donec eu libero sit amet quam egestas semper. Aenean ultricies mi vitae est. Mauris placerat eleifend leo. Quisque sit amet est et sapien ullamcorper pharetra. Vestibulum erat wisi, condimentum sed, commodo vitae, ornare sit amet, wisi. Aenean fermentum, elit eget tincidunt condimentum, eros ipsum rutrum orci, sagittis tempus lacus enim ac dui. Donec non enim in turpis pulvinar facilisis. Ut felis.', '<h2><b>Additional features</b></h2><span><b>Value 1</b>&nbsp;Width&nbsp;<br><b>Value 2</b>&nbsp;Height&nbsp;<br><b>Value 3</b>&nbsp;Weight&nbsp;<br><b>Value 4</b>&nbsp;Material&nbsp;<br><b>Value 5</b>&nbsp;Production&nbsp;</span>&nbsp;', '30', '0', '1', '2015-07-23 20:44:22', '2015-07-23 20:44:22');

-- ----------------------------
-- Table structure for `role`
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `role` int(1) NOT NULL,
  `role_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NOT NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`,`role_name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '0', 'Admin', '2015-07-03 13:29:46', '2015-07-03 13:29:46');
INSERT INTO `role` VALUES ('3', '2', 'Seller', '2015-07-16 15:11:22', '2015-07-16 15:11:22');
INSERT INTO `role` VALUES ('4', '1', 'Mod', '2015-07-16 15:11:18', '2015-07-16 15:11:18');
INSERT INTO `role` VALUES ('5', '3', 'Member', '2015-07-16 15:34:09', '2015-07-16 15:34:09');

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` text COLLATE utf8_unicode_ci,
  `status` tinyint(4) DEFAULT NULL,
  `role_id` int(1) unsigned DEFAULT NULL,
  `keyactive` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT '2015-07-21 09:37:53',
  `updated_at` timestamp NULL DEFAULT '2015-07-21 09:37:53',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('72', 'Huu Duc', '$2y$10$20Zg3ZwOj5pOBiTkpBQ2..b08aMlObRdE2fmcDSmkMsAmQZpm41rS', 'huuduc.uneti@gmail.com', '0123456789', 'images/avatar/1436625421bootstrap.jpg.jpg', '1', '1', 'giLTYhEuUX95kdxwGbakuD3kgTHf6eUeK3UCdLvXn308ZEcpofHQQjj7hNrbhuuduc.uneti@gmail.com', 'vUFJWddMq5LoA9PRKLw2zDRhAJWtZnU0HDiI6XoPMNwcKgxpnW6FTitKONR6', '2015-07-11 21:34:36', '2015-07-21 17:05:48');
INSERT INTO `users` VALUES ('73', 'Huu Duc', '$2y$10$FcH4YOnOISIlv9XF0fbrLePYOyWYQMUuebG5nI1rJM3wQUBCFCk5e', 'huuduc.uneti@yahoo.com', '01675942102', null, '1', '5', 'RbK7TwETYmW6AXweSrbx1Zpq1tC7RGvCnIHjJH5sXsGw7HYXDtmZjbTwkG15huuduc.uneti@yahoo.com', 'dYKyxefro6C98BVEC4KAlEA8dyaAYRWQkyIC29O9IeMjW8uvZuRn22njC1CQ', '2015-07-12 08:52:50', '2015-07-20 11:04:19');
