/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50724
 Source Host           : localhost:3306
 Source Schema         : dev_vuexy_laravel

 Target Server Type    : MySQL
 Target Server Version : 50724
 File Encoding         : 65001

 Date: 09/08/2021 11:45:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for audits
-- ----------------------------
DROP TABLE IF EXISTS `audits`;
CREATE TABLE `audits`  (
  `id` int(36) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `old_values` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `new_values` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `ip_address` varchar(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `user_agent` varchar(1023) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `audits_auditable_type_auditable_id_index`(`auditable_type`, `auditable_id`) USING BTREE,
  INDEX `audits_user_id_user_type_index`(`user_id`, `user_type`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for channels
-- ----------------------------
DROP TABLE IF EXISTS `channels`;
CREATE TABLE `channels`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of channels
-- ----------------------------
INSERT INTO `channels` VALUES ('1', '1', 'PG', 'Channel PG', NULL, NULL, NULL, NULL);
INSERT INTO `channels` VALUES ('15bc27ef-e593-4780-95a9-d92d76dbff42', 'RE1', 'RECON', 'Recon', '2021-08-04 16:02:17', NULL, '2021-08-04 16:02:17', NULL);

-- ----------------------------
-- Table structure for component_details
-- ----------------------------
DROP TABLE IF EXISTS `component_details`;
CREATE TABLE `component_details`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `component_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `position` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for component_parameter_apis
-- ----------------------------
DROP TABLE IF EXISTS `component_parameter_apis`;
CREATE TABLE `component_parameter_apis`  (
  `component_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `value` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of component_parameter_apis
-- ----------------------------
INSERT INTO `component_parameter_apis` VALUES ('1', 'interval', 'YESTERDAY', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('2', 'interval', 'MONTH', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('3', 'interval', 'YEAR', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('1', 'merchantId', 'd_mega1c58-T09f-Ibe9-Bccd-S9b6cb88itec', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('2', 'merchantId', 'd_mega1c58-T09f-Ibe9-Bccd-S9b6cb88itec', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('3', 'merchantId', 'd_mega1c58-T09f-Ibe9-Bccd-S9b6cb88itec', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('4', 'merchantId', 'd_mega1c58-T09f-Ibe9-Bccd-S9b6cb88itec', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('5', 'merchantId', 'd_mega1c58-T09f-Ibe9-Bccd-S9b6cb88itec', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('6', 'merchantId', 'd_mega1c58-T09f-Ibe9-Bccd-S9b6cb88itec', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('10', 'merchantId', 'd_mega1c58-T09f-Ibe9-Bccd-S9b6cb88itec', NULL, NULL);
INSERT INTO `component_parameter_apis` VALUES ('7', 'merchantId', 'd_mega1c58-T09f-Ibe9-Bccd-S9b6cb88itec', NULL, NULL);

-- ----------------------------
-- Table structure for components
-- ----------------------------
DROP TABLE IF EXISTS `components`;
CREATE TABLE `components`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `type_desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `header` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `column_size` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `action` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `sequence` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of components
-- ----------------------------
INSERT INTO `components` VALUES ('1', '1', 'dashboard_pg_summary_satistic', 'json', 'custom::summary-detail', NULL, 'Yesterday Transaction is', '4', NULL, 1, NULL, NULL, NULL, NULL);
INSERT INTO `components` VALUES ('10', '2', 'dashboard_pg_summary_chart_weekly', 'json', 'default::chart-pie', NULL, 'Pie Summary', '6', NULL, 2, NULL, NULL, NULL, NULL);
INSERT INTO `components` VALUES ('2', '1', 'dashboard_pg_summary_satistic', 'json', 'custom::summary-detail', NULL, 'This Month Transaction is', '4', NULL, 2, NULL, NULL, NULL, NULL);
INSERT INTO `components` VALUES ('3', '1', 'dashboard_pg_summary_satistic', 'json', 'custom::summary-detail', NULL, 'This Year Transaction is', '4', NULL, 3, NULL, NULL, NULL, NULL);
INSERT INTO `components` VALUES ('4', '1', 'dashboard_pg_summary_chart_weekly', 'json', 'default::chart-line', 'datetime', 'Weekly History Transaction', '4', NULL, 4, NULL, NULL, NULL, NULL);
INSERT INTO `components` VALUES ('5', '1', 'dashboard_pg_summary_chart_monthly', 'json', 'default::chart-line', 'datetime', 'Monthly History Transaction', '4', NULL, 5, NULL, NULL, NULL, NULL);
INSERT INTO `components` VALUES ('6', '1', 'dashboard_pg_summary_chart_yearly', 'json', 'default::chart-line', 'category', 'Yearly History Transaction', '4', NULL, 6, NULL, NULL, NULL, NULL);
INSERT INTO `components` VALUES ('7', '1', 'dashboard_pg_summary_top', 'php', 'custom::top-three', NULL, 'Top Three List', '12', NULL, 7, NULL, NULL, NULL, NULL);
INSERT INTO `components` VALUES ('9', '2', '-', 'json', 'default::table', NULL, 'List Summary', '6', NULL, 1, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for failed_jobs
-- ----------------------------
DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE `failed_jobs`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `failed_jobs_uuid_unique`(`uuid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for merchants
-- ----------------------------
DROP TABLE IF EXISTS `merchants`;
CREATE TABLE `merchants`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `channel_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (1, '2014_10_12_000000_create_users_table', 1);
INSERT INTO `migrations` VALUES (2, '2014_10_12_100000_create_password_resets_table', 1);
INSERT INTO `migrations` VALUES (3, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO `migrations` VALUES (4, '2021_07_08_034400_create_permission_tables', 1);
INSERT INTO `migrations` VALUES (5, '2021_07_08_131947_userchange', 1);
INSERT INTO `migrations` VALUES (6, '2021_07_08_133414_userchange2', 1);
INSERT INTO `migrations` VALUES (7, '2021_07_21_024642_create_pages_table', 2);
INSERT INTO `migrations` VALUES (8, '2021_07_21_025153_create_audits_table', 2);
INSERT INTO `migrations` VALUES (9, '2021_07_21_042924_create_templates_table', 2);
INSERT INTO `migrations` VALUES (10, '2021_07_21_042935_create_template_details_table', 3);
INSERT INTO `migrations` VALUES (11, '2021_07_21_042949_create_merchants_table', 3);
INSERT INTO `migrations` VALUES (12, '2021_07_21_043032_create_channels_table', 3);
INSERT INTO `migrations` VALUES (13, '2021_07_21_084046_addonrole', 4);
INSERT INTO `migrations` VALUES (14, '2021_07_21_090242_create_components_table', 5);
INSERT INTO `migrations` VALUES (15, '2021_07_21_090640_create_component_details_table', 5);
INSERT INTO `migrations` VALUES (16, '2021_07_21_090809_create_role_has_templates_table', 5);
INSERT INTO `migrations` VALUES (17, '2021_07_21_092303_create_component_parameter_apis_table', 6);
INSERT INTO `migrations` VALUES (18, '2021_07_26_023525_paramter_api', 7);
INSERT INTO `migrations` VALUES (19, '2021_08_06_100156_update_component', 7);
INSERT INTO `migrations` VALUES (20, '2021_08_06_150618_change_data_type_all_table', 8);

-- ----------------------------
-- Table structure for model_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE `model_has_permissions`  (
  `permission_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_permissions_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for model_has_roles
-- ----------------------------
DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE `model_has_roles`  (
  `role_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`role_id`, `model_id`, `model_type`) USING BTREE,
  INDEX `model_has_roles_model_id_model_type_index`(`model_id`, `model_type`) USING BTREE,
  CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of model_has_roles
-- ----------------------------
INSERT INTO `model_has_roles` VALUES ('09b9afb7-850f-4471-a30c-303342efef59', 'App\\Models\\User', 'bd68286d-a631-4cf6-b5de-ddb217ebe074');
INSERT INTO `model_has_roles` VALUES ('ac11cd55-2897-4ce0-ae33-a107ea9e880a', 'App\\Models\\User', 'bd68286d-a631-4cf6-b5de-ddb217ebe074');
INSERT INTO `model_has_roles` VALUES ('9de0041f-fa8d-4d40-896b-e3234dc5ac42', 'App\\Models\\User', 'efc01a01-8ea7-4ab4-bf96-394d8e614732');
INSERT INTO `model_has_roles` VALUES ('ac11cd55-2897-4ce0-ae33-a107ea9e880a', 'App\\Models\\User', 'efc01a01-8ea7-4ab4-bf96-394d8e614732');

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', 'P1', NULL, 'Summary ', NULL, NULL, NULL, NULL);
INSERT INTO `pages` VALUES ('2', 'P2', NULL, 'View By Merchant', NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for password_resets
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets`  (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  INDEX `password_resets_email_index`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Table structure for permissions
-- ----------------------------
DROP TABLE IF EXISTS `permissions`;
CREATE TABLE `permissions`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `permissions_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of permissions
-- ----------------------------
INSERT INTO `permissions` VALUES ('04a086c8-b9e2-41e4-848b-4c705c631ff7', 'merchant.index', 'web', '2021-08-04 11:32:14', '2021-08-04 11:32:14');
INSERT INTO `permissions` VALUES ('15b50e25-1a1d-4bfc-aafb-17489ff01238', 'channel.delete', 'web', '2021-08-04 11:31:05', '2021-08-04 11:31:05');
INSERT INTO `permissions` VALUES ('15c87aa0-3a52-40ca-b61b-ccb08b0cd274', 'role.index', 'web', '2021-07-09 08:50:50', '2021-07-13 03:19:17');
INSERT INTO `permissions` VALUES ('16cb3bd2-f26a-47e9-a336-b5e08345e250', 'user.edit', 'web', '2021-07-09 08:50:50', '2021-07-09 08:50:50');
INSERT INTO `permissions` VALUES ('2bdb59cf-d48d-4761-aa01-6db2aec64446', 'permission.index', 'web', '2021-07-14 03:02:20', '2021-07-14 03:02:20');
INSERT INTO `permissions` VALUES ('31fc8b6f-6634-45a3-9fe3-aefad04cc486', 'user.create', 'web', '2021-07-09 08:50:50', '2021-07-09 08:50:50');
INSERT INTO `permissions` VALUES ('3516d6e1-e0bf-4f94-a09c-7e483ff6f435', 'component-template.delete', 'web', '2021-08-06 15:45:35', '2021-08-06 15:45:35');
INSERT INTO `permissions` VALUES ('3f394744-1c59-4fd3-aaa4-898f22735174', 'channel.edit', 'web', '2021-08-04 11:30:57', '2021-08-04 11:30:57');
INSERT INTO `permissions` VALUES ('47f96743-b204-4b23-a713-08b339546d7b', 'page-template.create', 'web', '2021-08-06 15:44:43', '2021-08-06 15:44:43');
INSERT INTO `permissions` VALUES ('4b114624-bf62-4391-b7a4-882ed36a1551', 'page-template.index', 'web', '2021-08-06 15:43:41', '2021-08-06 15:43:41');
INSERT INTO `permissions` VALUES ('4c45ffc0-03f4-4d0f-90c1-e9c062d67097', 'component-template.index', 'web', '2021-08-06 15:43:58', '2021-08-06 15:43:58');
INSERT INTO `permissions` VALUES ('5e7df13c-1637-4938-a2f2-a5da575e51e6', 'channel.create', 'web', '2021-08-04 11:31:42', '2021-08-04 11:31:42');
INSERT INTO `permissions` VALUES ('752747dc-ebdd-422e-b333-8fe52092632c', 'user.index', 'web', '2021-07-09 08:50:50', '2021-07-09 08:50:50');
INSERT INTO `permissions` VALUES ('7636fc3d-b567-4faf-92da-b461005687df', 'component-template.edit', 'web', '2021-08-06 15:45:16', '2021-08-06 15:45:16');
INSERT INTO `permissions` VALUES ('94ef3d6c-49f6-4871-b9cc-920136cc50b4', 'permission.delete', 'web', '2021-07-09 08:50:50', '2021-07-09 08:50:50');
INSERT INTO `permissions` VALUES ('9cc4bec0-97a6-4dc9-bc94-07e611ba7dab', 'permission.edit', 'web', '2021-07-09 08:50:50', '2021-07-09 08:50:50');
INSERT INTO `permissions` VALUES ('ad30bbd8-8a27-439b-98b6-0246f906c7db', 'page-template.edit', 'web', '2021-08-06 15:44:51', '2021-08-06 15:44:51');
INSERT INTO `permissions` VALUES ('b5cc6f14-4077-4258-930b-c4eb0cab0568', 'component-template.create', 'web', '2021-08-06 15:45:49', '2021-08-06 15:45:49');
INSERT INTO `permissions` VALUES ('b77f3f77-ff68-4b11-bf34-b85f0fd71c9b', 'role.create', 'web', '2021-07-14 03:26:30', '2021-07-14 03:26:30');
INSERT INTO `permissions` VALUES ('b79f4b1c-6701-4cad-98c2-0fe72add1e92', 'permission.create', 'web', '2021-07-15 07:14:20', '2021-07-15 07:14:20');
INSERT INTO `permissions` VALUES ('bf33d06c-f55c-41bf-8a99-af6854629598', 'role.delete', 'web', '2021-07-14 03:26:38', '2021-07-14 03:26:38');
INSERT INTO `permissions` VALUES ('d0a6b07e-a02f-4057-8111-2f26f726f321', 'user.delete', 'web', '2021-07-09 08:50:50', '2021-07-09 08:50:50');
INSERT INTO `permissions` VALUES ('ec66d399-9bfd-429b-81f9-4823f355f0a0', 'channel.index', 'web', '2021-08-04 11:30:46', '2021-08-04 11:30:46');
INSERT INTO `permissions` VALUES ('ef73c9ba-b6e2-4950-9db1-79d0d27f7487', 'role.edit', 'web', '2021-07-09 08:50:50', '2021-07-09 08:50:50');
INSERT INTO `permissions` VALUES ('f31a5399-a4a9-443b-bdb3-019f85dde3b3', 'page-template.delete', 'web', '2021-08-06 15:45:01', '2021-08-06 15:45:01');

-- ----------------------------
-- Table structure for role_has_permissions
-- ----------------------------
DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE `role_has_permissions`  (
  `permission_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`permission_id`, `role_id`) USING BTREE,
  INDEX `role_has_permissions_role_id_foreign`(`role_id`) USING BTREE,
  CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT,
  CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE RESTRICT
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_permissions
-- ----------------------------
INSERT INTO `role_has_permissions` VALUES ('752747dc-ebdd-422e-b333-8fe52092632c', '09b9afb7-850f-4471-a30c-303342efef59');
INSERT INTO `role_has_permissions` VALUES ('15c87aa0-3a52-40ca-b61b-ccb08b0cd274', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('16cb3bd2-f26a-47e9-a336-b5e08345e250', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('2bdb59cf-d48d-4761-aa01-6db2aec64446', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('31fc8b6f-6634-45a3-9fe3-aefad04cc486', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('752747dc-ebdd-422e-b333-8fe52092632c', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('94ef3d6c-49f6-4871-b9cc-920136cc50b4', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('9cc4bec0-97a6-4dc9-bc94-07e611ba7dab', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('b77f3f77-ff68-4b11-bf34-b85f0fd71c9b', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('b79f4b1c-6701-4cad-98c2-0fe72add1e92', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('bf33d06c-f55c-41bf-8a99-af6854629598', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('d0a6b07e-a02f-4057-8111-2f26f726f321', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('ef73c9ba-b6e2-4950-9db1-79d0d27f7487', '9de0041f-fa8d-4d40-896b-e3234dc5ac42');
INSERT INTO `role_has_permissions` VALUES ('04a086c8-b9e2-41e4-848b-4c705c631ff7', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('15b50e25-1a1d-4bfc-aafb-17489ff01238', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('15c87aa0-3a52-40ca-b61b-ccb08b0cd274', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('16cb3bd2-f26a-47e9-a336-b5e08345e250', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('2bdb59cf-d48d-4761-aa01-6db2aec64446', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('31fc8b6f-6634-45a3-9fe3-aefad04cc486', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('3516d6e1-e0bf-4f94-a09c-7e483ff6f435', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('3f394744-1c59-4fd3-aaa4-898f22735174', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('47f96743-b204-4b23-a713-08b339546d7b', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('4b114624-bf62-4391-b7a4-882ed36a1551', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('4c45ffc0-03f4-4d0f-90c1-e9c062d67097', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('5e7df13c-1637-4938-a2f2-a5da575e51e6', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('752747dc-ebdd-422e-b333-8fe52092632c', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('7636fc3d-b567-4faf-92da-b461005687df', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('94ef3d6c-49f6-4871-b9cc-920136cc50b4', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('9cc4bec0-97a6-4dc9-bc94-07e611ba7dab', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('ad30bbd8-8a27-439b-98b6-0246f906c7db', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('b5cc6f14-4077-4258-930b-c4eb0cab0568', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('b77f3f77-ff68-4b11-bf34-b85f0fd71c9b', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('b79f4b1c-6701-4cad-98c2-0fe72add1e92', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('bf33d06c-f55c-41bf-8a99-af6854629598', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('d0a6b07e-a02f-4057-8111-2f26f726f321', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('ec66d399-9bfd-429b-81f9-4823f355f0a0', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('ef73c9ba-b6e2-4950-9db1-79d0d27f7487', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');
INSERT INTO `role_has_permissions` VALUES ('f31a5399-a4a9-443b-bdb3-019f85dde3b3', 'ac11cd55-2897-4ce0-ae33-a107ea9e880a');

-- ----------------------------
-- Table structure for role_has_templates
-- ----------------------------
DROP TABLE IF EXISTS `role_has_templates`;
CREATE TABLE `role_has_templates`  (
  `template_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of role_has_templates
-- ----------------------------
INSERT INTO `role_has_templates` VALUES ('1', '09b9afb7-850f-4471-a30c-303342efef59', 1);
INSERT INTO `role_has_templates` VALUES ('2', '09b9afb7-850f-4471-a30c-303342efef59', 2);
INSERT INTO `role_has_templates` VALUES ('3', '09b9afb7-850f-4471-a30c-303342efef59', 3);
INSERT INTO `role_has_templates` VALUES ('4', '09b9afb7-850f-4471-a30c-303342efef59', 4);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `merchant_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `roles_name_guard_name_unique`(`name`, `guard_name`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('09b9afb7-850f-4471-a30c-303342efef59', '1', 'SPV-Transmart', 'web', '2021-07-21 09:54:00', '2021-07-21 09:54:00');
INSERT INTO `roles` VALUES ('9de0041f-fa8d-4d40-896b-e3234dc5ac42', NULL, 'SPV', 'web', '2021-07-09 09:07:09', '2021-07-09 09:07:09');
INSERT INTO `roles` VALUES ('ac11cd55-2897-4ce0-ae33-a107ea9e880a', NULL, 'super-admin', 'web', '2021-07-09 08:18:13', '2021-07-09 08:18:13');

-- ----------------------------
-- Table structure for template_details
-- ----------------------------
DROP TABLE IF EXISTS `template_details`;
CREATE TABLE `template_details`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `template_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sequence` int(11) NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of template_details
-- ----------------------------
INSERT INTO `template_details` VALUES ('1', '2', '1', 1, NULL, NULL, NULL, NULL);
INSERT INTO `template_details` VALUES ('2', '4', '2', 1, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for templates
-- ----------------------------
DROP TABLE IF EXISTS `templates`;
CREATE TABLE `templates`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL,
  `level` int(25) NULL DEFAULT NULL,
  `parent_id` int(11) NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of templates
-- ----------------------------
INSERT INTO `templates` VALUES ('1', 'PGIS', 'pie-chart', 'PGIS', 1, NULL, NULL, NULL, NULL, NULL);
INSERT INTO `templates` VALUES ('2', 'Summary', 'activity', 'Summary', 2, 1, NULL, NULL, NULL, NULL);
INSERT INTO `templates` VALUES ('3', 'Daily Transaction', 'circle', 'Daily Transaction', 2, 1, NULL, NULL, NULL, NULL);
INSERT INTO `templates` VALUES ('4', 'View By Merchant', NULL, 'View By Merchant', 3, 3, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp(0) NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `status` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `created_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `updated_by` char(36) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL COMMENT '(DC2Type:guid)',
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('bd68286d-a631-4cf6-b5de-ddb217ebe074', 'Farhan Riuzaki', 'farhan', 'superadmin@gmail.com', NULL, '$2y$10$wg92T4iOqkzLG5TtDXYjiOXP.VoFp3r9Ap8fL.BYCAobvCbpIjQMy', NULL, '1', '2021-07-09 02:44:21', NULL, '2021-07-09 02:44:21', NULL);
INSERT INTO `users` VALUES ('ca4250e0-b5ac-40a7-a8e1-a00f6c95f33a', 'amdhika', 'andhika', 'andhika@gmail.com', NULL, '$2y$10$OviS3fjfJgrM6Du11ayHUOKAY8LHIQNMWoqbXJBSS68lTyT539TIe', NULL, NULL, '2021-08-09 11:37:40', NULL, '2021-08-09 11:37:40', NULL);
INSERT INTO `users` VALUES ('efc01a01-8ea7-4ab4-bf96-394d8e614732', 'Farhan Riuzaki', 'farhanriuzaki', 'riuzakif@gmail.com', NULL, '$2y$10$If0wPRmuFR0kJq0U8psSN.dsN1yzNrf73EyoTBwfEUMLKnh8EFWQa', NULL, '1', '2021-07-13 14:11:27', NULL, '2021-07-13 14:15:32', NULL);

SET FOREIGN_KEY_CHECKS = 1;
