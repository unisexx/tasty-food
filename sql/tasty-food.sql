/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50724
Source Host           : localhost:3306
Source Database       : tasty-food

Target Server Type    : MYSQL
Target Server Version : 50724
File Encoding         : 65001

Date: 2019-12-01 21:51:00
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
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of contacts
-- ----------------------------
INSERT INTO `contacts` VALUES ('1', '2019-11-09 09:02:55', '2019-11-30 12:01:19', '16th floor., SJ Infinite I 349, Chom Phon, Chatuchak Bangkok 10900', 'sales@chc.com', '02-014-1600', '#', '#');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of hilights
-- ----------------------------
INSERT INTO `hilights` VALUES ('1', '2019-11-30 11:41:24', '2019-11-30 11:41:24', null, 'title', '1575114084.jpeg', 'url', '1');
INSERT INTO `hilights` VALUES ('2', '2019-11-30 11:41:57', '2019-11-30 11:41:57', null, 'title2', '1575114117.jpeg', 'url2', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
INSERT INTO `migrations` VALUES ('11', '2019_11_26_161855_create_product_images_table', '8');
INSERT INTO `migrations` VALUES ('12', '2019_12_01_065818_create_vdos_table', '9');
INSERT INTO `migrations` VALUES ('13', '2019_12_01_121756_create_services_table', '10');

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
INSERT INTO `pages` VALUES ('1', '2019-11-07 14:16:22', '2019-12-01 09:37:18', 'เกี่ยวกับเรา', '<p><img style=\"margin-right: 20px; margin-left: 20px; float: left;\" src=\"http://tasty-food.test:8080/tinymce_file_manager/source/about/about3.jpg\" alt=\"\" width=\"400\" height=\"350\" /></p>\r\n<p>สินค้า มาตรฐานความปลอดภัย ความสะอาด</p>\r\n<p>กว่าจะมาเป็นแคปซูลในมือคุณ...</p>\r\n<p>ใส่ใจคุณภาพของสินค้า ตั้งแต่เริ่มค้นหาวัตถุดิบ เพื่อให้มั่นใจได้ว่า คุณได้บริโภคสิ่งที่ดีที่สุดจากเรา</p>\r\n<p>มาตรฐานในการผลิตที่มีความปลอดภัย และมีคุณภาพในระดับสากล ได้รับการตรวจสอบและประเมินผลโดยคณะกรรมการอาหารและยากระทรวงสาธารณสุข</p>\r\n<p>ISO 9001: 2015 มาตรฐานในการบริหารจัดการการให้ความสำคัญกับความต้องการของลูกค้ามีการควบคุมตรวจสอบและพัฒนาคุณภาพสินค้าก่อนส่งมอบอย่างมีนัยสำคัญ</p>\r\n<p>ISO 22716 (GMP ยุโรป) มาตรฐานที่ดีในการผลิตขั้นสูงเพื่อความปลอดภัยของผู้บริโภคตามกฎระเบียบของสหภาพยุโรปการควบคุมการจัดส่ง และคุณภาพของผลิตภัณฑ์ที่จะเข้ามาจำหน่ายในกลุ่มประเทศในยุโรปจะต้องผ่านมาตรฐานนี้</p>\r\n<p>วัตถุดิบที่ใช้ในการผลิตแต่ละครั้งถูกคัดสรรจากผู้จัดหา เพื่อคัดเลือกและสรรหาวัตถุดิบที่ดีที่สุด โดยมีทีมจัดหาวัตถุดิบออกเดินทางรอบโลก เพื่อให้มั่นใจว่าวัตถุดิบที่ใช้ในการผลิตมีคุณภาพและสามารถตรวจสอบได้จริง วัตถุดิบที่ได้จะถูกพัฒนาโดยการค้นคว้าวิจัยขั้นสูง และด้วยความทุ่มเทของทีมค้นคว้าวิจัย ทั้งผู้ชำนาญการทางด้านรักษาด้วยวิถีธรรมชาติ นักเคมี นักวิทยาศาสตร์ และเภสัชกรด้านการพัฒนาผลิตภัณฑ์ พวกเขาได้ทำการค้นคว้าโดยใช้ทฤษฎีความรู้เฉพาะทาง และการทดลองสูตรผลิตภัณฑ์ยาต่างๆ รวมถึงการตรวจสอบด้วยนวัตกรรมล่าสุด เกี่ยวกับธรรมชาติบำบัดที่เข้มงวดและครอบคลุม โดยได้รับการสนับสนุนจาก Therapeutic Goods Administration (TGA) ของกรมแพทย์กระทรวงสาธารณสุข ประเทศออสเตรเลีย ในขั้นตอนการประกันคุณภาพของแบลคมอร์สซึ่งทำให้ผู้บริโภคมั่นใจได้ว่า ผลิตภัณฑ์ทั้งหมด ของเราสามารถตอบโจทย์ความต้องการที่หลากหลายได้</p>', 'aboutus');
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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_categories__lft__rgt_parent_id_index` (`_lft`,`_rgt`,`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_categories
-- ----------------------------
INSERT INTO `product_categories` VALUES ('20', 'BEST SELLERS', '1', '2', null, null, '1', '2019-11-23 19:14:42', '2019-11-30 13:59:54', '2019-11-30 13:59:54');
INSERT INTO `product_categories` VALUES ('21', 'ผลิตภัณฑ์ดูแลผิวหน้า ผิวกาย', '17', '22', null, '1575121048.jpeg', '1', '2019-11-24 07:07:59', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('22', 'ผลิตภัณฑ์เครื่องมือแพทย์', '23', '24', null, '1575122444.jpeg', '1', '2019-11-24 07:08:14', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('26', 'ผลิตภัณฑ์อาหารเสริมเพื่อสุขภาพ', '1', '10', null, '1575121007.jpeg', '1', '2019-11-24 12:40:48', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('27', 'ผลิตภัณฑ์สมุนไพร', '11', '16', null, '1575121036.jpeg', '1', '2019-11-24 12:40:59', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('29', 'อาหารเสริมผู้ชาย', '2', '3', '26', null, '1', '2019-11-24 12:44:38', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('30', 'อาหารเสริมผู้หญิง', '4', '5', '26', null, '1', '2019-11-24 12:44:55', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('31', 'อาหารเสริมของเด็ก', '6', '7', '26', null, '1', '2019-11-24 12:45:09', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('32', 'อาหารเสริมอื่นๆ', '8', '9', '26', null, '1', '2019-11-24 12:45:22', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('33', 'ผลิตภัณฑ์สมุนไพรแบบรับประทาน', '14', '15', '27', null, '1', '2019-11-24 12:46:05', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('34', 'ผลิตภัณฑ์สมุนไพรใช้ภายนอก', '12', '13', '27', null, '1', '2019-11-24 12:46:15', '2019-11-30 15:23:24', null);
INSERT INTO `product_categories` VALUES ('35', 'ผลิตภัณฑ์ดูแลผิวหน้า', '18', '19', '21', null, '1', '2019-11-24 12:46:36', '2019-11-30 15:23:30', null);
INSERT INTO `product_categories` VALUES ('36', 'ผลิตภัณฑ์ดูแลผิวกาย', '20', '21', '21', null, '1', '2019-11-24 12:46:51', '2019-11-30 15:23:30', null);

-- ----------------------------
-- Table structure for product_images
-- ----------------------------
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE `product_images` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `product_item_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_images
-- ----------------------------
INSERT INTO `product_images` VALUES ('7', '2019-11-30 17:47:21', '2019-12-01 14:33:30', '22', '5de2ab2977574.jpeg', '0');
INSERT INTO `product_images` VALUES ('8', '2019-11-30 17:47:21', '2019-12-01 14:33:30', '22', '5de2ab298bc3b.jpeg', '1');
INSERT INTO `product_images` VALUES ('9', '2019-11-30 17:47:21', '2019-12-01 14:33:30', '22', '5de2ab299f2cd.jpeg', '2');

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
  `price` decimal(10,2) DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `product_category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of product_items
-- ----------------------------
INSERT INTO `product_items` VALUES ('22', '2019-11-18 07:24:34', '2019-11-30 17:54:39', null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('23', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('24', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('25', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('26', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('27', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('28', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('29', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('30', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('31', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');
INSERT INTO `product_items` VALUES ('32', null, null, null, 'Prof. Serena Mann', 'Soluta iusto maxime eos accusantium labore quo.', '<p>Cupiditate corrupti qui voluptatem eos quasi autem nam. Non ratione rem omnis pariatur et iusto nobis. Voluptate facere quaerat et doloremque perferendis vel. In in dolorum deserunt est at.</p>', '71', '690.00', '1', '36');

-- ----------------------------
-- Table structure for services
-- ----------------------------
DROP TABLE IF EXISTS `services`;
CREATE TABLE `services` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `detail_1` text COLLATE utf8mb4_unicode_ci,
  `detail_2` text COLLATE utf8mb4_unicode_ci,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of services
-- ----------------------------
INSERT INTO `services` VALUES ('1', '2019-12-01 12:43:33', '2019-12-01 12:44:44', null, 'บริการผลิตครบวงจร', '<p>รับผลิตเครื่องผลิตภัณฑ์อาหารเสริม นวัตกรรมใหม่ ไม่ซ้ำแบบใคร ภายใต้แบรนด์คุณ ได้รับการรับรองมาตรฐานการผลิตระดับสากล ISO 22716 จาก SGS และ ASEAN GMP ของกระทรวงสาธารณสุข</p>\r\n<div class=\"list-style03\">\r\n<ul>\r\n<li>ค่าพัฒนาสูตรผลิตภัณฑ์อาหารเสริม&nbsp;<span class=\"text-green\">5,000 บาท/ต่อสูตร</span></li>\r\n<li>ค่าจดแจ้ง อย.&nbsp;<span class=\"text-green\">2,000 บาท/ต่อสูตร</span></li>\r\n<li>ค่า Certificate of Free Sale&nbsp;<span class=\"text-green\">2,000 บาท/ต่อสูตร</span></li>\r\n<li>ค่าตรวจวิเคราะห์ผลิตภัณฑ์&nbsp;<span class=\"text-green\">(ตามเงื่อนไขบริษัท)</span></li>\r\n</ul>\r\n</div>', '<p>วัตถุดิบที่ใช้ในการผลิตแต่ละครั้งถูกคัดสรรจากผู้จัดหา เพื่อคัดเลือกและสรรหาวัตถุดิบที่ดีที่สุด โดยมีทีมจัดหาวัตถุดิบออกเดินทางรอบโลก เพื่อให้มั่นใจว่าวัตถุดิบที่ใช้ในการผลิตมีคุณภาพและสามารถตรวจสอบได้จริง วัตถุดิบที่ได้จะถูกพัฒนาโดยการค้นคว้าวิจัยขั้นสูง และด้วยความทุ่มเทของทีมค้นคว้าวิจัย ทั้งผู้ชำนาญการทางด้านรักษาด้วยวิถีธรรมชาติ นักเคมี นักวิทยาศาสตร์ และเภสัชกรด้านการพัฒนาผลิตภัณฑ์ พวกเขาได้ทำการค้นคว้าโดยใช้ทฤษฎีความรู้เฉพาะทาง และการทดลองสูตรผลิตภัณฑ์ยาต่างๆ รวมถึงการตรวจสอบด้วยนวัตกรรมล่าสุด เกี่ยวกับธรรมชาติบำบัดที่เข้มงวดและครอบคลุม โดยได้รับการสนับสนุนจาก Therapeutic Goods Administration (TGA) ของกรมแพทย์กระทรวงสาธารณสุข ประเทศออสเตรเลีย ในขั้นตอนการประกันคุณภาพของแบลคมอร์สซึ่งทำให้ผู้บริโภคมั่นใจได้ว่า ผลิตภัณฑ์ทั้งหมด ของเราสามารถตอบโจทย์ความต้องการที่หลากหลายได้</p>', '1575204283.jpeg', '1');
INSERT INTO `services` VALUES ('2', '2019-12-01 12:46:12', '2019-12-01 12:46:12', null, 'บริการขึ้นทะเบียนผลิตภัณฑ์', '<p>บริการขึ้นทะเบียนเอกสารที่เกี่ยวข้องกับการจัดจำหน่ายสินค้า ทั้งภายใน และต่างประเทศ อาทิ เอกสาร อย. กระทรวงสาธารณสุข เครื่องหมายการค้า, สิทธิบัตร, (Certificate Of Free Sale) Food And Drug Adminstration Ministry Of Public Health)</p>', '<p>บริการขึ้นทะเบียนเอกสารที่เกี่ยวข้องกับการจัดจำหน่ายสินค้า ทั้งภายใน และต่างประเทศ อาทิ เอกสาร อย. กระทรวงสาธารณสุข เครื่องหมายการค้า, สิทธิบัตร, (Certificate Of Free Sale) Food And Drug Adminstration Ministry Of Public Health)</p>', '1575204372.jpeg', '1');
INSERT INTO `services` VALUES ('3', '2019-12-01 12:48:23', '2019-12-01 12:48:23', null, 'บริการบรรจุสินค้า', '<p>บริการบรรจุสินค้า ด้วยกรรมวิธีที่ทันสมัย และปลอดภัย ได้รับการรับรองมาตรฐานสากล ASEAN GMP และ ISO 22716 บรรจุผลิตภัณฑ์ได้หลากหลายรูปแบบ เช่น บรรจุภัณฑ์แบบหลอด บรรจุภัณฑ์แบบขวด บรรจุภัณฑ์แบบซอง บรรจุภัณฑ์แบบกระปุก บรรจุผลิตภัณฑ์ด้วยวิธีอัดแก๊ส ฯลฯ</p>', '<p>บริการบรรจุสินค้า ด้วยกรรมวิธีที่ทันสมัย และปลอดภัย ได้รับการรับรองมาตรฐานสากล ASEAN GMP และ ISO 22716 บรรจุผลิตภัณฑ์ได้หลากหลายรูปแบบ เช่น บรรจุภัณฑ์แบบหลอด บรรจุภัณฑ์แบบขวด บรรจุภัณฑ์แบบซอง บรรจุภัณฑ์แบบกระปุก บรรจุผลิตภัณฑ์ด้วยวิธีอัดแก๊ส ฯลฯ</p>', '1575204503.jpeg', '1');

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
INSERT INTO `users` VALUES ('1', 'admin', 'admin@food.com', null, '$2y$10$ibBLtWD351lbH5CG1KyzeeFkKje/Xd0dS/eR/SmK0LXOiOUNnoH2q', 'fGL3HRzZSScAuQLHooBzguuXYQ2RBONFbWLnZBygHzxlxAmGEbqstpspeygl', '2019-11-04 06:26:35', '2019-11-04 06:26:35');

-- ----------------------------
-- Table structure for vdos
-- ----------------------------
DROP TABLE IF EXISTS `vdos`;
CREATE TABLE `vdos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of vdos
-- ----------------------------
INSERT INTO `vdos` VALUES ('1', '2019-12-01 07:31:31', '2019-12-01 11:47:47', null, 'ฟ้ามีตา', 'https://www.youtube.com/embed/V7TrAVE3iJs', '1');
INSERT INTO `vdos` VALUES ('2', '2019-12-01 11:48:27', '2019-12-01 11:48:27', null, 'ทำไมต้องกินอาหารเสริม ?', 'https://www.youtube.com/embed/wL5Jhpy7gCE', '1');
