/*
Navicat MySQL Data Transfer

Source Server         : localhost_xampp
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : laravel_permissions

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-03-21 12:38:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for clientes
-- ----------------------------
DROP TABLE IF EXISTS `clientes`;
CREATE TABLE `clientes` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of clientes
-- ----------------------------
INSERT INTO `clientes` VALUES ('1', 'test', '123456', '2017-02-15 16:50:27', '2017-02-15 16:50:27');
INSERT INTO `clientes` VALUES ('2', 'leo', '123456', '2017-02-15 16:50:39', '2017-02-15 16:50:39');

-- ----------------------------
-- Table structure for cuotas
-- ----------------------------
DROP TABLE IF EXISTS `cuotas`;
CREATE TABLE `cuotas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cuota` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of cuotas
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2017_02_09_123928_entrust_setup_tables', '1');
INSERT INTO `migrations` VALUES ('2017_02_10_151507_create_products_table', '1');
INSERT INTO `migrations` VALUES ('2017_02_15_154432_create_cuota_table', '1');
INSERT INTO `migrations` VALUES ('2017_02_15_160341_create_clientes_table', '1');

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('1', 'users', 'Users', 'Users', '2017-02-15 16:09:47', '2017-02-15 16:09:47');
INSERT INTO `permissions` VALUES ('2', 'create-user', 'Create Users', 'Cretae Users', '2017-02-15 16:09:47', '2017-02-15 16:09:47');
INSERT INTO `permissions` VALUES ('3', 'update-user', 'Update Users', 'Update Users', '2017-02-15 16:09:47', '2017-02-15 16:09:47');
INSERT INTO `permissions` VALUES ('4', 'delete-user', 'Delete Users', 'Delete Users', '2017-02-15 16:09:47', '2017-02-15 16:09:47');
INSERT INTO `permissions` VALUES ('5', 'read-user', 'Read User', 'Read User', '2017-02-16 16:03:12', '2017-02-16 16:03:12');

-- ----------------------------
-- Table structure for permission_role
-- ----------------------------
DROP TABLE IF EXISTS `permission_role`;
CREATE TABLE `permission_role` (
  `permission_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `permission_role_role_id_foreign` (`role_id`),
  CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of permission_role
-- ----------------------------
INSERT INTO `permission_role` VALUES ('2', '2');
INSERT INTO `permission_role` VALUES ('3', '2');
INSERT INTO `permission_role` VALUES ('4', '2');
INSERT INTO `permission_role` VALUES ('5', '2');

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'admin', 'Administrator', 'Administrator', '2017-02-15 16:09:47', '2017-02-15 16:09:47');
INSERT INTO `roles` VALUES ('2', 'user', 'User', 'User', '2017-02-15 16:09:47', '2017-02-15 16:09:47');
INSERT INTO `roles` VALUES ('3', 'owner', 'Owner', 'Owner', '2017-02-15 16:09:47', '2017-02-15 16:09:47');
INSERT INTO `roles` VALUES ('4', 'usuarios', null, null, '2017-02-16 16:05:47', '2017-02-16 16:05:47');
INSERT INTO `roles` VALUES ('5', 'clientes', null, null, '2017-02-16 16:07:41', '2017-02-16 16:07:41');
INSERT INTO `roles` VALUES ('6', 'default', 'Default', 'Default Role', '2017-03-15 11:44:58', '2017-03-15 11:44:58');

-- ----------------------------
-- Table structure for role_user
-- ----------------------------
DROP TABLE IF EXISTS `role_user`;
CREATE TABLE `role_user` (
  `user_id` int(10) unsigned NOT NULL,
  `role_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_id`,`role_id`),
  KEY `role_user_role_id_foreign` (`role_id`),
  CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of role_user
-- ----------------------------
INSERT INTO `role_user` VALUES ('1', '2');
INSERT INTO `role_user` VALUES ('1', '4');
INSERT INTO `role_user` VALUES ('1', '5');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'leonel', 'leonel.gonzalez@c3ntro.com', '$2y$10$cjc5liC7ilpTDwPmAXxx1utkrWNS29rpJZ0au.PgLNSQSUlUD9fKe', '7sZ5aMOeux85rjjbz2KELVeYq95FRQkKRWp9wdbmQFqWHrpUBIM3CBPQoIFs', '2017-02-15 16:09:47', '2017-03-16 16:02:30');
INSERT INTO `users` VALUES ('2', 'test', 'test@test.com', '', null, '2017-02-16 15:52:18', '2017-02-16 15:52:18');
INSERT INTO `users` VALUES ('14', 'Juan', 'juan.perez@test.com', '', null, '2017-02-24 16:41:25', '2017-02-24 16:41:25');
INSERT INTO `users` VALUES ('64', 'Mr. Ewell Stehr III', 'kuvalis.julie@example.com', '$2y$10$OBecUlf84fVnaaUosAPSveB.PbMRmVwf0SGD6zFnUYlOmTdtXvch2', 'OJeQCotFpx', '2017-02-24 16:48:43', '2017-02-24 16:48:43');
INSERT INTO `users` VALUES ('65', 'alejandra tapia miranda', 'dapira28@gmail.com', '$2y$10$G2oOAjSDi5qm0DVZh/2/p.VgF47xe382s6mJwGBmg3/K./fgb4MM6', 'z3TX3AwTl5ORKTbJ3xGzr36HHrVkDTE84C1aG4BAG4zkoMkM0aUApkYCNKXo', '2017-03-15 15:39:53', '2017-03-15 15:40:17');
INSERT INTO `users` VALUES ('70', 'Testi', 'testi@test.com', '', null, '2017-03-16 16:20:30', '2017-03-16 16:20:30');
