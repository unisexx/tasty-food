/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : tasty-food

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-11-04 21:48:15
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of failed_jobs
-- ----------------------------

-- ----------------------------
-- Table structure for hilights
-- ----------------------------
DROP TABLE IF EXISTS `hilights`;
CREATE TABLE `hilights` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of hilights
-- ----------------------------
INSERT INTO `hilights` VALUES ('1', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('2', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('3', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('4', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('5', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('6', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('7', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('11', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('13', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('14', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('15', '2019-11-04 16:18:32', '2019-11-04 16:18:34', 'title', 'image', 'url', null);
INSERT INTO `hilights` VALUES ('16', '2019-11-04 13:28:09', '2019-11-04 13:28:09', 'title', '1572874089.jpeg', 'url', null);
INSERT INTO `hilights` VALUES ('17', '2019-11-04 13:31:05', '2019-11-04 13:31:05', 'title', '1572874265.jpeg', 'url', null);
INSERT INTO `hilights` VALUES ('18', '2019-11-04 13:31:47', '2019-11-04 13:31:47', 'title', '1572874307.jpeg', 'url', null);
INSERT INTO `hilights` VALUES ('19', '2019-11-04 13:46:11', '2019-11-04 13:46:11', 'title', '1572875171.jpeg', 'url', null);
INSERT INTO `hilights` VALUES ('20', '2019-11-04 14:17:19', '2019-11-04 14:17:19', 'title', '1572877039.jpeg', 'url', null);

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_11_04_075205_create_hilights_table', '2');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'admin', 'admin@food.com', null, '$2y$10$ibBLtWD351lbH5CG1KyzeeFkKje/Xd0dS/eR/SmK0LXOiOUNnoH2q', 'sPQfWyQFYWM9sgIqrNKvkysslE5Jp9RsjRY43nAVDmpIH9FpkMsRlyx4eGcv', '2019-11-04 06:26:35', '2019-11-04 06:26:35');
