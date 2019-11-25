/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : tasty-food

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-11-25 23:27:58
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for contacts
-- ----------------------------
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tel` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', '2019-11-09 09:02:55', '2019-11-09 02:21:53', 'ที่อยู่', 'อีเมล์', 'เบอร์โทรศัพท์');

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
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of hilights
-- ----------------------------
INSERT INTO `hilights` VALUES ('15', '2019-11-04 16:18:32', '2019-11-23 19:55:54', '2019-11-23 19:55:54', 'title', '1573095656.jpeg', 'url', '0');
INSERT INTO `hilights` VALUES ('16', '2019-11-04 13:28:09', '2019-11-23 19:59:44', '2019-11-23 19:59:44', 'title', '1573095741.jpeg', 'url', '0');
INSERT INTO `hilights` VALUES ('17', '2019-11-04 13:31:05', '2019-11-07 03:02:15', null, 'title', '1573095735.jpeg', 'url', '0');
INSERT INTO `hilights` VALUES ('18', '2019-11-04 13:31:47', '2019-11-07 03:02:09', null, 'title', '1573095728.jpeg', 'url', '1');
INSERT INTO `hilights` VALUES ('19', '2019-11-04 13:46:11', '2019-11-07 03:02:02', null, 'title', '1573095722.jpeg', 'url', '1');
INSERT INTO `hilights` VALUES ('20', '2019-11-04 14:17:19', '2019-11-07 03:49:14', null, 'title', '1573095711.jpeg', 'url', '1');

-- ----------------------------
-- Table structure for infos
-- ----------------------------
DROP TABLE IF EXISTS `infos`;
CREATE TABLE `infos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of infos
-- ----------------------------
INSERT INTO `infos` VALUES ('1', '2019-11-08 17:33:16', '2019-11-08 17:34:23', null, 'title', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img src=\"http://tasty-food.test:8080/tinymce_file_manager/source/demo/2.jpg\" alt=\"\" width=\"350\" height=\"350\" /></p>', '1573234396.jpeg', '1');

-- ----------------------------
-- Table structure for knowledges
-- ----------------------------
DROP TABLE IF EXISTS `knowledges`;
CREATE TABLE `knowledges` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of knowledges
-- ----------------------------
INSERT INTO `knowledges` VALUES ('1', '2019-11-08 17:33:16', '2019-11-08 18:08:38', null, 'title', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>\r\n<p><img src=\"http://tasty-food.test:8080/tinymce_file_manager/source/demo/2.jpg\" alt=\"\" width=\"350\" height=\"350\" /></p>', '1573236518.jpeg', '1');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('1', '2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2', '2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('3', '2019_08_19_000000_create_failed_jobs_table', '1');
INSERT INTO `migrations` VALUES ('4', '2019_11_04_075205_create_hilights_table', '2');
INSERT INTO `migrations` VALUES ('5', '2019_11_07_062051_create_pages_table', '3');
INSERT INTO `migrations` VALUES ('6', '2019_11_08_163054_create_infos_table', '4');
INSERT INTO `migrations` VALUES ('7', '2019_11_08_174932_create_knowledge_table', '5');
INSERT INTO `migrations` VALUES ('8', '2019_11_09_015155_create_contacts_table', '5');
INSERT INTO `migrations` VALUES ('9', '2019_11_14_090930_create_product_categories_table', '6');
INSERT INTO `migrations` VALUES ('10', '2019_11_25_151151_create_product_items_table', '7');

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail` text COLLATE utf8mb4_unicode_ci,
  `module` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', '2019-11-07 14:16:22', '2019-11-07 17:04:10', 'เกี่ยวกับเรา', '<p><img src=\"http://tasty-food.test:8080/tinymce_file_manager/source/demo/1.jpg\" alt=\"\" width=\"350\" height=\"350\" />&nbsp;lorem Ipsum</p>', 'aboutus');
INSERT INTO `pages` VALUES ('2', '2019-11-08 23:00:42', '2019-11-08 16:01:35', 'บริการของเรา', '<p><strong>Lorem Ipsum</strong>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>', 'service');
INSERT INTO `pages` VALUES ('3', '2019-11-09 00:06:28', '2019-11-09 00:06:30', 'วิธีสั่งซื้อและชำระเงิน', null, 'howtobuy');

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
-- Table structure for product_categories
-- ----------------------------
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE `product_categories` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `_lft` int(10) unsigned NOT NULL DEFAULT '0',
  `_rgt` int(10) unsigned NOT NULL DEFAULT '0',
  `parent_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES ('20', 'BEST SELLERS', '1', '2', null, '2019-11-23 19:14:42', '2019-11-24 13:39:35');
INSERT INTO `product_categories` VALUES ('21', 'ผลิตภัณฑ์ดูแลผิวหน้า ผิวกาย', '19', '24', null, '2019-11-24 07:07:59', '2019-11-25 15:02:51');
INSERT INTO `product_categories` VALUES ('22', 'ผลิตภัณฑ์เครื่องมือแพทย์', '25', '26', null, '2019-11-24 07:08:14', '2019-11-25 15:02:51');
INSERT INTO `product_categories` VALUES ('26', 'ผลิตภัณฑ์อาหารเสริมเพื่อสุขภาพ', '3', '12', null, '2019-11-24 12:40:48', '2019-11-25 13:57:16');
INSERT INTO `product_categories` VALUES ('27', 'ผลิตภัณฑ์สมุนไพร', '13', '18', null, '2019-11-24 12:40:59', '2019-11-25 13:58:43');
INSERT INTO `product_categories` VALUES ('29', 'อาหารเสริมผู้ชาย', '4', '5', '26', '2019-11-24 12:44:38', '2019-11-25 13:57:16');
INSERT INTO `product_categories` VALUES ('30', 'อาหารเสริมผู้หญิง', '6', '7', '26', '2019-11-24 12:44:55', '2019-11-25 13:57:16');
INSERT INTO `product_categories` VALUES ('31', 'อาหารเสริมของเด็ก', '8', '9', '26', '2019-11-24 12:45:09', '2019-11-25 13:57:16');
INSERT INTO `product_categories` VALUES ('32', 'อาหารเสริมอื่นๆ', '10', '11', '26', '2019-11-24 12:45:22', '2019-11-25 13:57:16');
INSERT INTO `product_categories` VALUES ('33', 'ผลิตภัณฑ์สมุนไพรแบบรับประทาน', '16', '17', '27', '2019-11-24 12:46:05', '2019-11-25 13:58:39');
INSERT INTO `product_categories` VALUES ('34', 'ผลิตภัณฑ์สมุนไพรใช้ภายนอก', '14', '15', '27', '2019-11-24 12:46:15', '2019-11-25 13:58:43');
INSERT INTO `product_categories` VALUES ('35', 'ผลิตภัณฑ์ดูแลผิวหน้า', '20', '21', '21', '2019-11-24 12:46:36', '2019-11-25 15:02:51');
INSERT INTO `product_categories` VALUES ('36', 'ผลิตภัณฑ์ดูแลผิวกาย', '22', '23', '21', '2019-11-24 12:46:51', '2019-11-25 15:02:51');

-- ----------------------------
-- Table structure for product_items
-- ----------------------------
DROP TABLE IF EXISTS `product_items`;
CREATE TABLE `product_items` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `brand` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `stock` int(11) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_items
-- ----------------------------
INSERT INTO `product_items` VALUES ('1', '2019-11-24 19:58:53', null, null, 'Everardo Herman', 'Animi nam quos quisquam culpa.', 'Tempore deserunt alias exercitationem voluptatibus. Asperiores error quae culpa amet qui aut. Consectetur non qui quas ipsum dolore inventore ut quasi. Eligendi qui eos aut voluptate atque.', '11', '1');
INSERT INTO `product_items` VALUES ('2', '2019-11-15 05:57:29', null, null, 'Manuel McGlynn', 'Eos rerum quis repellat facere sunt qui.', 'Quibusdam vel tenetur pariatur quia. Consequuntur labore praesentium et sit. Cum cupiditate labore nemo et praesentium ut expedita. Maiores quo at fugit eveniet facilis nostrum aut sint.', '3', '1');
INSERT INTO `product_items` VALUES ('3', '2019-11-13 18:54:52', null, null, 'Junius Predovic', 'Maxime voluptatem atque natus et deserunt quis quod.', 'Sunt qui doloremque illo assumenda tempora qui. Molestias repellendus aut fugiat non in. Quia suscipit explicabo soluta dolorem. Cum qui enim qui sint.', '78', '1');
INSERT INTO `product_items` VALUES ('4', '2019-11-19 05:56:52', null, null, 'Kiara Thiel', 'Tempora qui voluptatem aut ut minima sequi.', 'Ex aliquam velit laboriosam. Minima aspernatur dolor eligendi. Reiciendis magni quia ducimus magni occaecati est magni. Minus ad et deserunt accusantium.', '55', '1');
INSERT INTO `product_items` VALUES ('5', '2019-11-12 18:00:50', null, null, 'Marisa Pollich DVM', 'Distinctio perferendis et omnis optio.', 'Perferendis enim veniam aut inventore et quam. Totam et praesentium numquam laboriosam molestiae nesciunt. Soluta sunt illo aut. Consequatur minima nisi harum sint dolorem neque.', '64', '1');
INSERT INTO `product_items` VALUES ('6', '2019-11-15 22:40:59', null, null, 'Prof. Xavier Crona', 'Voluptatibus nihil quia dolor rerum quia est.', 'Quo est molestiae sint voluptas odio earum. Vel neque quidem facilis quos beatae fuga at. Sint quas provident magnam atque officia magni.', '67', '1');
INSERT INTO `product_items` VALUES ('7', '2019-11-03 18:24:09', null, null, 'Prof. Esmeralda Boehm DVM', 'Saepe nostrum consequuntur maiores esse vitae omnis.', 'Veniam nihil voluptatum maiores ut. Est harum aut provident quisquam architecto. Sint atque natus rerum id. Et et sit autem. Quo et nihil architecto. Ad vel libero qui soluta explicabo id.', '76', '1');
INSERT INTO `product_items` VALUES ('8', '2019-11-18 23:11:53', null, null, 'Madisen Labadie', 'Debitis natus id asperiores et dolorem numquam.', 'Quia enim est deleniti aut quam possimus. Corporis repellendus consequatur incidunt omnis placeat adipisci vel. Vel quaerat dolorem nostrum veritatis. Asperiores esse error eaque quasi perspiciatis.', '22', '1');
INSERT INTO `product_items` VALUES ('9', '2019-11-06 15:23:54', null, null, 'Geo Hegmann', 'Est ut accusantium odit laborum consequuntur.', 'Et fuga vero sed blanditiis optio omnis et. Provident saepe architecto pariatur dolorum qui laudantium. Consequatur id dolorum saepe esse eligendi et non.', '36', '1');
INSERT INTO `product_items` VALUES ('10', '2019-11-19 08:28:41', '2019-11-25 16:27:02', '2019-11-25 16:27:02', 'Velda Bashirian', 'Itaque similique iste ex hic sed aspernatur qui.', 'Nobis sequi est architecto ad officia adipisci sunt. Unde corporis vel sapiente sint. Sed debitis similique accusamus et omnis.', '70', '1');
INSERT INTO `product_items` VALUES ('11', '2019-11-03 08:14:27', '2019-11-25 16:26:55', '2019-11-25 16:26:55', 'Elda Spinka', 'Distinctio voluptatem dignissimos modi odit magnam fuga.', 'Reprehenderit accusamus aliquam assumenda exercitationem reiciendis. Consequatur unde error sed velit voluptas recusandae.', '5', '1');
INSERT INTO `product_items` VALUES ('12', '2019-11-24 23:48:45', '2019-11-25 16:26:53', '2019-11-25 16:26:53', 'Dr. Ronny Gutmann Jr.', 'Non omnis impedit delectus aperiam.', 'Nobis molestias repellat sit deserunt ut. Vero est et est voluptatem non doloremque natus. Magni corrupti sapiente est mollitia ea tempore molestiae.', '32', '1');
INSERT INTO `product_items` VALUES ('13', '2019-11-16 11:13:51', '2019-11-25 16:26:49', '2019-11-25 16:26:49', 'Thea Mraz', 'Porro qui at ex.', 'Qui ipsam aut sunt qui beatae sit magni dolor. Dicta blanditiis fugit inventore ut pariatur corrupti. Id molestiae vel et eligendi et. Reiciendis ratione ea odio ad voluptatibus.', '67', '1');
INSERT INTO `product_items` VALUES ('14', '2019-11-07 16:26:45', null, null, 'Mr. Madison Abshire IV', 'Aut omnis omnis et vitae.', 'Consequatur maiores omnis enim eveniet incidunt cupiditate. Ut id eveniet quisquam. Impedit et laudantium sapiente repellendus.', '42', '1');
INSERT INTO `product_items` VALUES ('15', '2019-11-16 09:24:24', null, null, 'Dr. Ludwig Koepp', 'Quo est officia neque quisquam omnis consequatur reprehenderit nulla.', 'Laborum quis quia rerum quis. Est veritatis amet delectus qui.', '47', '1');
INSERT INTO `product_items` VALUES ('16', '2019-11-18 04:55:58', null, null, 'Osvaldo Sporer', 'Illo eos fuga recusandae.', 'Inventore quasi eveniet quasi et. Voluptates totam at nisi et magnam magnam laudantium. Veniam voluptatem earum est minima omnis vitae nesciunt qui.', '14', '1');
INSERT INTO `product_items` VALUES ('17', '2019-10-29 01:45:36', null, null, 'Dr. Emilia Ruecker DDS', 'Sapiente adipisci accusamus incidunt eos porro possimus sed voluptas.', 'Autem repellat facilis rerum. Consequatur quibusdam quia cumque corrupti. Dicta nemo non dolorum ut sequi.', '65', '1');
INSERT INTO `product_items` VALUES ('18', '2019-11-20 22:13:47', null, null, 'Roscoe Sipes', 'Et cupiditate maiores praesentium est consequuntur.', 'Laboriosam culpa voluptatem eum sed consectetur necessitatibus. Exercitationem corrupti omnis aperiam dolor possimus quam ut. Impedit fugit repellendus dolor in voluptas.', '5', '1');
INSERT INTO `product_items` VALUES ('19', '2019-11-09 23:26:40', null, null, 'Reece Hoppe', 'Excepturi blanditiis vel totam qui veritatis quidem.', 'Maiores at accusantium suscipit placeat expedita. Nulla ipsam quisquam vel magnam et in nihil.', '29', '1');
INSERT INTO `product_items` VALUES ('20', '2019-11-17 15:13:57', null, null, 'Destiney Rippin', 'Accusantium maiores et rerum qui occaecati sed nostrum.', 'Exercitationem aut cupiditate ab aut autem quia repellendus. Repellat rerum qui consequatur esse sit sint. Amet ipsam non sit beatae et. Dolorum explicabo magni placeat.', '55', '1');
INSERT INTO `product_items` VALUES ('21', '2019-11-07 17:04:30', null, null, 'Norbert Brekke', 'Asperiores eum nulla ut dolorem molestiae ratione tempore.', 'Illum quia repudiandae odio molestiae molestias qui. Est qui odit placeat. Eaque et beatae non. Necessitatibus itaque velit modi.', '23', '1');
INSERT INTO `product_items` VALUES ('22', '2019-11-18 07:24:34', null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', 'Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.', '71', '1');

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
INSERT INTO `users` VALUES ('1', 'admin', 'admin@food.com', null, '$2y$10$ibBLtWD351lbH5CG1KyzeeFkKje/Xd0dS/eR/SmK0LXOiOUNnoH2q', 'wkNOi3A2KkX2WgHs5oexuGPRi3wDwodI2JG9IR0OKDlDdDtb0oETCCEHhKr1', '2019-11-04 06:26:35', '2019-11-04 06:26:35');
