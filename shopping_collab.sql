-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2024 lúc 12:12 PM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopping_collab`
--
CREATE DATABASE IF NOT EXISTS `shopping_collab` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `shopping_collab`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `value` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `value`, `created_at`, `updated_at`) VALUES
(1, 'color', '#cb2a2a', '2024-01-07 02:57:05', '2024-01-07 02:57:05'),
(2, 'color', '#b23838', '2024-01-07 03:07:02', '2024-01-07 03:07:02'),
(3, 'color', '#95e137', '2024-01-07 03:07:10', '2024-01-07 03:07:10'),
(4, 'color', '#ffadad', '2024-01-07 03:07:16', '2024-01-07 03:07:16'),
(5, 'color', '#cc2828', '2024-01-07 03:07:26', '2024-01-07 03:07:26'),
(6, 'color', '#bfbbbb', '2024-01-07 03:07:33', '2024-01-07 03:07:33'),
(7, 'size', 'M', '2024-01-07 03:26:51', '2024-01-07 03:26:51'),
(8, 'size', 'S', '2024-01-07 03:26:58', '2024-01-07 03:26:58'),
(9, 'size', 'XL', '2024-01-07 03:27:08', '2024-01-07 03:27:08'),
(10, 'size', 'L', '2024-01-07 03:27:28', '2024-01-07 03:27:28'),
(11, 'size', 'XXL', '2024-01-07 03:27:36', '2024-01-07 03:27:36'),
(12, 'size', 'XXXL', '2024-01-07 03:27:47', '2024-01-07 04:44:52'),
(13, 'color', '#ff5c5c', '2024-01-07 03:30:31', '2024-01-07 03:30:31'),
(14, 'color', '#a6a6a6', '2024-01-07 03:30:41', '2024-01-07 03:30:41'),
(15, 'color', '#7b42ff', '2024-01-07 03:30:50', '2024-01-07 03:30:50'),
(16, 'color', '#fdbfbf', '2024-01-07 03:31:01', '2024-01-07 04:30:18'),
(17, 'color', '#c3a2a2', '2024-01-07 03:31:10', '2024-01-07 04:47:08'),
(18, 'color', '#fea4a4', '2024-01-07 04:47:01', '2024-01-07 04:47:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_attribute_id` int(11) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `parent_id`, `slug`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Áo phông', 0, 'ao-phong', '2023-08-30 13:08:20', '2023-08-30 13:08:20', NULL),
(2, 'Áo sweater', 0, 'ao-sweater', '2023-08-30 13:08:38', '2023-08-30 13:08:38', NULL),
(3, 'Áo Hoodie', 0, 'ao-hoodie', '2023-08-30 13:09:05', '2023-08-30 13:09:05', NULL),
(4, 'Áo Hoodie Colab', 3, 'ao-hoodie-colab', '2023-08-30 13:09:24', '2023-08-30 13:09:24', NULL),
(6, 'Áo phông polo', 1, 'ao-phong-polo', '2023-08-30 13:10:30', '2023-08-30 13:10:30', NULL),
(7, 'Quần kaki', 0, 'quan-kaki', '2023-08-30 13:11:20', '2023-08-30 13:11:20', NULL),
(8, 'Áo Hoodie Colab Limited', 4, 'ao-hoodie-colab-limited', '2023-08-31 11:15:28', '2023-08-31 11:15:28', NULL),
(10, 'Quần Short Kaki', 7, 'quan-short-kaki', '2023-09-04 03:21:51', '2023-09-04 03:22:04', '2023-09-04 03:22:04'),
(11, 'Hoodie nỉ bông', 4, 'hoodie-ni-bong', '2023-12-21 00:05:04', '2023-12-21 00:05:04', NULL),
(12, 'Áo hoodie nỉ bông dày', 11, 'ao-hoodie-ni-bong-day', '2023-12-21 00:06:31', '2023-12-21 00:06:31', NULL),
(13, 'Women', 0, 'women', '2024-01-23 18:48:27', '2024-01-23 18:48:27', NULL),
(14, 'Man', 0, 'man', '2024-01-23 18:48:39', '2024-01-23 18:48:39', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_bills`
--

CREATE TABLE `import_bills` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_money` decimal(15,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `import_bills`
--

INSERT INTO `import_bills` (`id`, `id_user`, `total_money`, `created_at`, `updated_at`) VALUES
(1, 1, '3660000', '2024-01-19 17:27:45', '2024-01-19 17:27:45'),
(2, 1, '3660000', '2024-01-19 17:27:51', '2024-01-19 17:27:51'),
(3, 1, '3000000', '2024-01-23 19:27:25', '2024-01-23 19:27:25'),
(4, 1, '3000000', '2024-01-23 20:12:49', '2024-01-23 20:12:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_details`
--

CREATE TABLE `import_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_import_bill` int(11) NOT NULL,
  `id_product_attribute` int(11) NOT NULL,
  `import_quantity` int(11) NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `import_details`
--

INSERT INTO `import_details` (`id`, `id_import_bill`, `id_product_attribute`, `import_quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 23, '140000', NULL, NULL),
(2, 1, 2, 1, '140000', NULL, NULL),
(3, 1, 2, 3, '100000', NULL, NULL),
(4, 2, 3, 23, '140000', NULL, NULL),
(5, 2, 2, 1, '140000', NULL, NULL),
(6, 2, 2, 3, '100000', NULL, NULL),
(7, 3, 5, 10, '100000', NULL, NULL),
(8, 3, 6, 20, '100000', NULL, NULL),
(9, 4, 4, 20, '100000', NULL, NULL),
(10, 4, 1, 10, '100000', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(191) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `menus`
--

INSERT INTO `menus` (`id`, `name`, `parent_id`, `created_at`, `updated_at`, `slug`, `deleted_at`) VALUES
(1, 'haha', 0, NULL, '2023-09-17 02:44:34', 'haha', '2023-09-17 02:44:34'),
(2, 'huhu', 1, NULL, '2023-09-28 06:10:42', '', '2023-09-28 06:10:42'),
(3, 'hehe', 2, NULL, '2023-09-17 02:44:36', '', '2023-09-17 02:44:36'),
(4, 'nono0', 1, NULL, '2023-12-10 13:47:37', 'nono0', '2023-12-10 13:47:37'),
(5, 'hoho\r\n', 0, NULL, '2023-09-17 02:44:38', '', '2023-09-17 02:44:38'),
(6, 'lulu\r\n', 0, NULL, '2023-09-17 02:44:41', '', '2023-09-17 02:44:41'),
(7, 'cucu', 5, NULL, '2023-09-28 06:10:45', '', '2023-09-28 06:10:45'),
(9, 'omo matic', 4, '2023-09-15 06:43:15', '2023-12-10 13:47:33', 'omo-matic', '2023-12-10 13:47:33'),
(10, 'Cửa hàng', 0, '2023-09-15 07:33:12', '2023-12-10 19:33:19', 'cua-hang', '2023-12-10 19:33:19'),
(11, 'Bài viết', 0, '2023-09-28 06:11:00', '2023-12-10 19:33:14', 'bai-viet', '2023-12-10 19:33:14'),
(12, 'Tin tức', 0, '2023-09-28 06:11:10', '2023-12-10 19:33:12', 'tin-tuc', '2023-12-10 19:33:12'),
(13, 'Giới thiệu', 0, '2023-09-28 06:11:19', '2023-12-10 19:33:09', 'gioi-thieu', '2023-12-10 19:33:09'),
(14, 'Sản phẩm', 0, '2023-09-28 06:11:29', '2023-09-28 06:11:29', 'san-pham', NULL),
(15, 'Sản phẩm', 0, '2023-09-28 06:11:38', '2023-09-28 06:11:53', 'san-pham', '2023-09-28 06:11:53'),
(16, 'Men', 0, '2023-12-25 13:44:08', '2023-12-25 13:44:08', 'men', NULL),
(17, 'Woman', 0, '2023-12-25 13:44:19', '2023-12-25 13:44:19', 'woman', NULL),
(18, 'News', 0, '2023-12-25 13:44:44', '2023-12-25 13:44:44', 'news', NULL),
(19, 'Shoes', 16, '2023-12-25 13:53:29', '2023-12-25 13:53:58', 'shoes', NULL),
(20, 'Bags', 17, '2023-12-25 13:53:45', '2023-12-25 13:53:45', 'bags', NULL),
(21, 'Sneaker', 19, '2023-12-25 13:54:33', '2023-12-25 13:54:33', 'sneaker', NULL),
(22, 'Clothing', 16, '2023-12-25 14:25:13', '2023-12-25 14:25:22', 'clothing', NULL),
(23, 'Bags', 16, '2023-12-25 15:15:54', '2023-12-25 15:15:54', 'bags', NULL),
(24, 'Boots', 19, '2023-12-25 15:16:21', '2023-12-25 15:16:21', 'boots', NULL),
(25, 'Adidas', 21, '2023-12-25 15:24:23', '2023-12-25 15:24:23', 'adidas', NULL),
(26, 'Nike', 21, '2023-12-25 15:24:34', '2023-12-25 15:24:34', 'nike', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_08_13_102528_create_categories_table', 1),
(6, '2023_09_03_172717_add_column_deleted_at_table_categories', 2),
(7, '2023_09_11_084344_create_menus_table', 3),
(8, '2023_09_15_141119_add_column_slug_to_menus_table', 4),
(9, '2023_09_17_094215_add_column_deleted_at_to_menus_table', 5),
(10, '2023_09_26_152505_create_products_table', 6),
(11, '2023_09_26_165512_create_product_images_table', 6),
(12, '2023_09_26_170311_create_tags_table', 6),
(13, '2023_09_26_170437_create_product_tags_table', 6),
(14, '2023_11_25_091005_add_feature_image_name_to_products_table', 7),
(16, '2023_11_25_192838_add_image_name_to_product_images_tables', 8),
(17, '2023_12_04_202244_add_column_deleted_at_to_product_images_table', 9),
(18, '2023_12_10_062136_add_column_deleted_at_to_products_table', 10),
(19, '2023_12_12_181104_create_sliders_table', 11),
(20, '2023_12_12_194938_add_column_deleted_at_to_sliders_table', 12),
(21, '2023_12_12_222855_create_settings_table', 13),
(22, '2023_12_13_031217_add_column_deleted_at_to_settings_table', 14),
(23, '2023_12_16_000631_create_permissions_table', 15),
(24, '2023_12_16_001448_create_user_role_table', 15),
(25, '2023_12_16_001548_create_permission_role_table', 15),
(26, '2023_12_16_165108_create_roles_table', 15),
(27, '2023_12_17_031726_add_column_deleted_at_to_users_table', 16),
(28, '2023_12_17_143427_add_column_deleted_at_to_roles_table', 17),
(29, '2023_12_17_154808_add_column_parent_id_to_permissions_table', 18),
(36, '2023_12_17_173440_add_column_key_code_to_permissions_table', 19),
(37, '2023_12_21_222957_add_column_views_to_products_table', 19),
(38, '2023_12_29_025222__add_column_additional_to_users_table', 19),
(39, '2024_01_07_084022_create_attributes_table', 20),
(46, '2024_01_07_114824_create_product_attributes_table', 21),
(50, '2024_01_17_152440_create_import_bills_table', 22),
(51, '2024_01_17_153440_create_import_details_table', 22),
(52, '2024_01_17_155050_add_column_sale_price_to_products_table', 22),
(53, '2024_01_18_190806_create_carts_table', 23),
(54, '2024_01_21_100335_create_orders_table', 24),
(55, '2024_01_21_185048_create_order_details_table', 25),
(60, '2024_01_23_165705_add_column_google_id_to_users_table', 26),
(61, '2024_01_23_181440_remove_sale_price_from_products', 27);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kind` int(11) NOT NULL,
  `id_customer` int(10) UNSIGNED DEFAULT NULL,
  `id_saler` int(10) UNSIGNED DEFAULT NULL,
  `total_money` decimal(15,0) DEFAULT NULL,
  `name` varchar(191) DEFAULT NULL,
  `email` varchar(191) DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `token` varchar(40) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `kind`, `id_customer`, `id_saler`, `total_money`, `name`, `email`, `phone`, `address`, `token`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, NULL, '31500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 0, '2024-01-21 13:16:58', '2024-01-21 13:16:58'),
(2, 4, NULL, 1, '31500000', 'Nguyễn Tiến Thiện', 'tienthien2806@gmail.com', '0896444902', 'hà đông', NULL, 1, '2024-01-21 13:58:06', '2024-01-22 23:12:24'),
(3, 3, NULL, 1, '31500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 1, '2024-01-21 14:04:23', '2024-01-23 20:13:24'),
(4, 1, NULL, NULL, '31500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 0, '2024-01-21 14:05:31', '2024-01-21 14:05:31'),
(5, 1, NULL, NULL, '3500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 0, '2024-01-21 21:37:18', '2024-01-21 21:37:18'),
(6, 1, NULL, NULL, '3500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 1, '2024-01-21 21:37:54', '2024-01-21 21:38:13'),
(7, 1, NULL, NULL, '10500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', 'Aeac1ipvVH1beSgIroAXows3OV0LuqmeEzVNYnU4', 0, '2024-01-22 03:45:19', '2024-01-22 03:45:19'),
(8, 1, NULL, NULL, '7000000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', 'JXsPL3cs5utpv6XfdHFAFFUVWXTVFNqtBXbtCg7s', 0, '2024-01-22 06:10:01', '2024-01-22 06:10:01'),
(9, 1, NULL, NULL, '7000000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', 'SbZaePns8aK0713WfMsOoVNHH8TvuxCuecW3fwQq', 0, '2024-01-22 06:12:30', '2024-01-22 06:12:30'),
(10, 1, NULL, NULL, '7000000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', 'ssPkQQsiv2sUBJxnSbCiRd6Unybup6RgHDUBYZvE', 0, '2024-01-22 06:13:10', '2024-01-22 06:13:10'),
(11, 1, NULL, NULL, '7000000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', 'EIcHPDonNXMPNXxvOvOnbRreGim6AAbegH8BXMBZ', 0, '2024-01-22 06:13:42', '2024-01-22 06:13:42'),
(12, 1, NULL, NULL, '7000000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', 'fU3fmNSBWEEKkOMZwHA8Df9RqubCiAUcYaTvIkD4', 0, '2024-01-22 06:14:17', '2024-01-22 06:14:17'),
(13, 1, NULL, NULL, '7000000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', 'qSzjF4q2Jz1XAXQAcUDo4EhZWKlpfBgUn2jXj5Kt', 0, '2024-01-22 06:16:27', '2024-01-22 06:16:27'),
(14, 1, NULL, NULL, '7000000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 1, '2024-01-22 06:20:45', '2024-01-22 06:21:07'),
(15, 1, NULL, NULL, '14000000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', 'JkDWTIIs34Y8GNDjBuMcTGCprLbgDcMHHlAOPfMI', 0, '2024-01-22 07:02:17', '2024-01-22 07:02:17'),
(16, 4, NULL, 1, '14000000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 1, '2024-01-22 07:03:49', '2024-01-22 22:59:52'),
(17, 1, NULL, NULL, '10500000', NULL, NULL, NULL, NULL, 'MCGzaxpIv2Xn3zell02UZMYr2ymUdHgmlmtmcld3', 0, '2024-01-22 22:19:28', '2024-01-22 22:19:28'),
(18, 1, NULL, NULL, '10500000', NULL, NULL, NULL, NULL, 'BL3V0xG17dfBmi9FUUbhikyTZWCIbmffdBW83o7T', 0, '2024-01-22 22:22:49', '2024-01-22 22:22:49'),
(19, 1, NULL, NULL, '10500000', NULL, NULL, NULL, NULL, '8X3WzuSypCD4i5KAjPXFilCEHhA8IVtGgsqGQmXW', 0, '2024-01-22 22:23:38', '2024-01-22 22:23:38'),
(20, 1, NULL, NULL, '10500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', '9Nxx0lIeciiaej1uIIrAcCunY9WmJ1wWaHJ19ejt', 0, '2024-01-22 22:23:46', '2024-01-22 22:23:46'),
(21, 3, NULL, 1, '10500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 1, '2024-01-22 22:23:53', '2024-01-22 23:01:57'),
(22, 1, NULL, NULL, '3500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 1, '2024-01-22 22:34:42', '2024-01-22 22:34:57'),
(23, 1, NULL, NULL, '3500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 1, '2024-01-22 22:37:39', '2024-01-22 22:37:49'),
(24, 2, NULL, 1, '59500000', 'Nguyễn Tiến Thiện', 'thien.tng04@gmail.com', '0896444902', 'hà đông', NULL, 1, '2024-01-23 20:05:26', '2024-01-23 20:12:59');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_attribute_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(15,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_attribute_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '3500000', 5, NULL, NULL),
(2, 1, 2, '3500000', 4, NULL, NULL),
(3, 2, 3, '3500000', 5, '2024-01-21 13:58:06', '2024-01-21 13:58:06'),
(4, 2, 2, '3500000', 4, '2024-01-21 13:58:06', '2024-01-21 13:58:06'),
(5, 3, 3, '3500000', 5, '2024-01-21 14:04:23', '2024-01-21 14:04:23'),
(6, 3, 2, '3500000', 4, '2024-01-21 14:04:23', '2024-01-21 14:04:23'),
(7, 4, 3, '3500000', 5, '2024-01-21 14:05:31', '2024-01-21 14:05:31'),
(8, 4, 2, '3500000', 4, '2024-01-21 14:05:31', '2024-01-21 14:05:31'),
(9, 5, 2, '3500000', 1, '2024-01-21 21:37:18', '2024-01-21 21:37:18'),
(10, 6, 2, '3500000', 1, '2024-01-21 21:37:54', '2024-01-21 21:37:54'),
(11, 7, 3, '3500000', 3, '2024-01-22 03:45:19', '2024-01-22 03:45:19'),
(12, 8, 3, '3500000', 1, '2024-01-22 06:10:01', '2024-01-22 06:10:01'),
(13, 8, 2, '3500000', 1, '2024-01-22 06:10:01', '2024-01-22 06:10:01'),
(14, 9, 3, '3500000', 1, '2024-01-22 06:12:30', '2024-01-22 06:12:30'),
(15, 9, 2, '3500000', 1, '2024-01-22 06:12:30', '2024-01-22 06:12:30'),
(16, 10, 3, '3500000', 1, '2024-01-22 06:13:10', '2024-01-22 06:13:10'),
(17, 10, 2, '3500000', 1, '2024-01-22 06:13:10', '2024-01-22 06:13:10'),
(18, 11, 3, '3500000', 1, '2024-01-22 06:13:42', '2024-01-22 06:13:42'),
(19, 11, 2, '3500000', 1, '2024-01-22 06:13:42', '2024-01-22 06:13:42'),
(20, 12, 3, '3500000', 1, '2024-01-22 06:14:17', '2024-01-22 06:14:17'),
(21, 12, 2, '3500000', 1, '2024-01-22 06:14:17', '2024-01-22 06:14:17'),
(22, 13, 3, '3500000', 1, '2024-01-22 06:16:27', '2024-01-22 06:16:27'),
(23, 13, 2, '3500000', 1, '2024-01-22 06:16:27', '2024-01-22 06:16:27'),
(24, 14, 3, '3500000', 1, '2024-01-22 06:20:45', '2024-01-22 06:20:45'),
(25, 14, 2, '3500000', 1, '2024-01-22 06:20:45', '2024-01-22 06:20:45'),
(26, 15, 3, '3500000', 3, '2024-01-22 07:02:17', '2024-01-22 07:02:17'),
(27, 15, 2, '3500000', 1, '2024-01-22 07:02:17', '2024-01-22 07:02:17'),
(28, 16, 3, '3500000', 3, '2024-01-22 07:03:49', '2024-01-22 07:03:49'),
(29, 16, 2, '3500000', 1, '2024-01-22 07:03:49', '2024-01-22 07:03:49'),
(30, 17, 3, '3500000', 2, '2024-01-22 22:19:28', '2024-01-22 22:19:28'),
(31, 17, 2, '3500000', 1, '2024-01-22 22:19:28', '2024-01-22 22:19:28'),
(32, 18, 3, '3500000', 2, '2024-01-22 22:22:49', '2024-01-22 22:22:49'),
(33, 18, 2, '3500000', 1, '2024-01-22 22:22:49', '2024-01-22 22:22:49'),
(34, 19, 3, '3500000', 2, '2024-01-22 22:23:38', '2024-01-22 22:23:38'),
(35, 19, 2, '3500000', 1, '2024-01-22 22:23:38', '2024-01-22 22:23:38'),
(36, 20, 3, '3500000', 2, '2024-01-22 22:23:46', '2024-01-22 22:23:46'),
(37, 20, 2, '3500000', 1, '2024-01-22 22:23:46', '2024-01-22 22:23:46'),
(38, 21, 3, '3500000', 2, '2024-01-22 22:23:53', '2024-01-22 22:23:53'),
(39, 21, 2, '3500000', 1, '2024-01-22 22:23:53', '2024-01-22 22:23:53'),
(40, 22, 3, '3500000', 1, '2024-01-22 22:34:42', '2024-01-22 22:34:42'),
(41, 23, 3, '3500000', 1, '2024-01-22 22:37:39', '2024-01-22 22:37:39'),
(42, 24, 3, '3500000', 10, '2024-01-23 20:05:26', '2024-01-23 20:05:26'),
(43, 24, 2, '3500000', 7, '2024-01-23 20:05:26', '2024-01-23 20:05:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(191) NOT NULL,
  `token` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int(11) NOT NULL DEFAULT 0,
  `key_code` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `parent_id`, `key_code`) VALUES
(1, 'Danh mục sản phẩm', 'Danh mục sản phẩm', NULL, '2023-12-28 20:04:29', 0, 'danh-muc-san-pham'),
(2, 'Danh sách danh mục', 'Danh sách danh mục', NULL, '2023-12-28 20:04:29', 1, 'danh-sach-danh-muc'),
(3, 'Thêm danh mục', 'Thêm danh mục', NULL, '2023-12-28 20:04:29', 1, 'them-danh-muc'),
(4, 'Sửa danh mục', 'Sửa danh mục', NULL, '2023-12-28 20:04:29', 1, 'sua-danh-muc'),
(5, 'Xóa danh mục', 'Xóa danh mục', NULL, '2023-12-28 20:04:29', 1, 'xoa-danh-muc'),
(6, 'Menu', 'Menu', NULL, '2023-12-28 20:04:29', 0, 'menu'),
(7, 'Danh sách Menu', 'Danh sách Menu', NULL, '2023-12-28 20:04:29', 6, 'danh-sach-menu'),
(8, 'Thêm Menu', 'Thêm Menu', NULL, '2023-12-28 20:04:29', 6, 'them-menu'),
(9, 'Sửa Menu', 'Sửa Menu', NULL, '2023-12-28 20:04:29', 6, 'sua-menu'),
(10, 'Xóa Menu', 'Xóa Menu', NULL, '2023-12-28 20:04:29', 6, 'xoa-menu'),
(11, 'Slider', 'Slider', NULL, '2023-12-28 20:04:29', 0, 'slider'),
(12, 'Danh sách Slider', 'Danh sách Slider', NULL, '2023-12-28 20:04:29', 11, 'danh-sach-slider'),
(13, 'Thêm Slider', 'Thêm Slider', NULL, '2023-12-28 20:04:29', 11, 'them-slider'),
(14, 'Sửa Slider', 'Sửa Slider', NULL, '2023-12-28 20:04:29', 11, 'sua-slider'),
(15, 'Xóa Slider', 'Xóa Slider', NULL, '2023-12-28 20:04:29', 11, 'xoa-slider'),
(16, 'Sản phẩm', 'Sản phẩm', NULL, '2023-12-28 20:04:29', 0, 'san-pham'),
(17, 'Danh sách sản phẩm', 'Danh sách sản phẩm', NULL, '2023-12-28 20:04:29', 16, 'danh-sach-san-pham'),
(18, 'Thêm sản phẩm', 'Thêm sản phẩm', NULL, '2023-12-28 20:04:29', 16, 'them-san-pham'),
(19, 'Sửa sản phẩm', 'Sửa sản phẩm', NULL, '2023-12-28 20:04:29', 16, 'sua-san-pham'),
(20, 'Xóa sản phẩm', 'Xóa sản phẩm', NULL, '2023-12-28 20:04:29', 16, 'xoa-san-pham'),
(21, 'Setting', 'Setting', NULL, '2023-12-28 20:04:29', 0, 'setting'),
(22, 'Danh sách Setting', 'Danh sách Setting', NULL, '2023-12-28 20:04:29', 21, 'danh-sach-setting'),
(23, 'Thêm Setting', 'Thêm Setting', NULL, '2023-12-28 20:04:29', 21, 'them-setting'),
(24, 'Sửa Setting', 'Sửa Setting', NULL, '2023-12-28 20:04:29', 21, 'sua-setting'),
(25, 'Xóa Setting', 'Xóa Setting', NULL, '2023-12-28 20:04:29', 21, 'xoa-setting'),
(26, 'User', 'User', NULL, '2023-12-28 20:04:29', 0, 'user'),
(27, 'Danh sách User', 'Danh sách User', NULL, '2023-12-28 20:04:29', 26, 'danh-sach-user'),
(28, 'Thêm User', 'Thêm User', NULL, '2023-12-28 20:04:29', 26, 'them-user'),
(29, 'Sửa User', 'Sửa User', NULL, '2023-12-28 20:04:29', 26, 'sua-user'),
(30, 'Xóa User', 'Xóa User', NULL, '2023-12-28 20:04:29', 26, 'xoa-user'),
(31, 'Role', 'Role', NULL, '2023-12-28 20:04:29', 0, 'role'),
(32, 'Danh sách Role', 'Danh sách Role', NULL, '2023-12-28 20:04:29', 31, 'danh-sach-role'),
(33, 'Thêm Role', 'Thêm Role', NULL, '2023-12-28 20:04:29', 31, 'them-role'),
(34, 'Sửa Role', 'Sửa Role', NULL, '2023-12-28 20:04:29', 31, 'sua-role'),
(35, 'Xóa Role', 'Xóa Role', NULL, '2023-12-28 20:04:29', 31, 'xoa-role'),
(36, 'Trang quản trị', 'Trang quản trị', '2023-12-24 21:31:05', '2023-12-28 20:04:29', 0, 'trang-quan-tri'),
(37, 'Truy cập trang quản trị', 'Truy cập trang quản trị', '2023-12-24 21:42:38', '2023-12-28 20:04:29', 36, 'truy-cap-trang-quan-tri');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `permission_role`
--

CREATE TABLE `permission_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(11) NOT NULL,
  `permission_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `permission_role`
--

INSERT INTO `permission_role` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
(30, 1, 3, NULL, NULL),
(31, 1, 4, NULL, NULL),
(33, 1, 7, NULL, NULL),
(34, 1, 8, NULL, NULL),
(35, 1, 9, NULL, NULL),
(36, 1, 10, NULL, NULL),
(37, 1, 12, NULL, NULL),
(38, 1, 13, NULL, NULL),
(39, 1, 14, NULL, NULL),
(40, 1, 15, NULL, NULL),
(41, 1, 17, NULL, NULL),
(42, 1, 18, NULL, NULL),
(43, 1, 19, NULL, NULL),
(44, 1, 20, NULL, NULL),
(45, 1, 22, NULL, NULL),
(46, 1, 23, NULL, NULL),
(47, 1, 24, NULL, NULL),
(48, 1, 25, NULL, NULL),
(49, 1, 27, NULL, NULL),
(50, 1, 28, NULL, NULL),
(51, 1, 29, NULL, NULL),
(52, 1, 30, NULL, NULL),
(53, 1, 32, NULL, NULL),
(54, 1, 33, NULL, NULL),
(55, 1, 34, NULL, NULL),
(56, 1, 35, NULL, NULL),
(57, 1, 2, NULL, NULL),
(62, 3, 7, NULL, NULL),
(63, 3, 8, NULL, NULL),
(64, 3, 9, NULL, NULL),
(66, 3, 12, NULL, NULL),
(67, 3, 13, NULL, NULL),
(68, 3, 14, NULL, NULL),
(70, 3, 17, NULL, NULL),
(71, 3, 18, NULL, NULL),
(72, 3, 19, NULL, NULL),
(74, 3, 22, NULL, NULL),
(75, 3, 23, NULL, NULL),
(76, 3, 24, NULL, NULL),
(82, 3, 2, NULL, NULL),
(83, 3, 3, NULL, NULL),
(84, 3, 4, NULL, NULL),
(86, 3, 27, NULL, NULL),
(90, 1, 37, NULL, NULL),
(91, 1, 5, NULL, NULL),
(92, 4, 17, NULL, NULL),
(93, 4, 18, NULL, NULL),
(94, 4, 19, NULL, NULL),
(95, 4, 20, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(191) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `price` varchar(191) NOT NULL,
  `feature_image_path` varchar(191) DEFAULT NULL,
  `feature_image_name` varchar(191) DEFAULT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `views_count` int(11) NOT NULL DEFAULT 1,
  `sale_price` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `feature_image_path`, `feature_image_name`, `content`, `user_id`, `category_id`, `created_at`, `updated_at`, `deleted_at`, `views_count`, `sale_price`) VALUES
(1, 'Giày thời trang cổ thấp', '249992', '/storage/product/1/re8PMy6j5OQbxQwCsQUA.jpg', 'product-9.jpg', '<pre id=\"sf-dump-33477835\" class=\"sf-dump\" tabindex=\"0\" data-indent-pad=\"  \"><strong>Quần kaki<em> ống </em></strong><em>rộng h&agrave;n quốc</em></pre>', 1, 7, '2023-11-25 11:19:46', '2023-12-12 19:02:07', '2023-12-12 19:02:07', 0, ''),
(2, 'Mũ lưỡi chai chốg nắng', '3245212', '/storage/product/1/9F4iJt0dHTEnaSRI3rPr.jpg', 'product-5.jpg', '<p>awefawefawefwaef</p>', 1, 4, '2023-11-25 13:51:25', '2023-12-12 19:02:03', '2023-12-12 19:02:03', 0, ''),
(3, 'Balo phiên bản giới hạn', '949999', '/storage/product/1/xRSHRE9EYhu07fKKMASo.jpg', 'man-1.jpg', '<p>awegwaeg</p>', 1, 4, '2023-11-25 13:52:40', '2023-12-12 19:01:56', '2023-12-12 19:01:56', 0, ''),
(4, 'Áo bomber gió', '949999', '/storage/product/1/2WLZCleZs7WkNWB9fvDM.jpg', 'man-large.jpg', '<p>efawegawegf</p>', 1, 3, '2023-11-25 13:53:36', '2023-12-12 19:01:54', '2023-12-12 19:01:54', 0, ''),
(5, 'áo thun cộc', '949999', '/storage/product/1/d2JFGHmkqCHBsyKOIG6I.jpg', 'insta-5.jpg', '<p>awfewaef</p>', 1, 6, '2023-11-25 13:54:44', '2023-12-12 18:29:14', '2023-12-12 18:29:14', 0, ''),
(6, 'Áo phao mùa đông', '949999', '/storage/product/1/IcTCNJXqHwge70YaNBkB.jpg', 'latest-3.jpg', '<p>awfewaef</p>', 1, 4, '2023-11-25 14:20:57', '2023-12-12 18:29:12', '2023-12-12 18:29:12', 0, ''),
(7, 'Nguyễn Tiến Thiện', '949999', '/storage/product/1/C0pj2BeLT6O4dq43EUQW.jpg', 'avata.jpg', '<p>rawsegserg</p>', 1, 4, '2023-11-26 07:51:14', '2023-12-10 00:04:45', '2023-12-10 00:04:45', 0, ''),
(8, 'Nguyễn Tiến Thiện', '949999', '/storage/product/1/0ppRxxlTPJOBcJ262YwI.jpg', 'avata.jpg', '<p>rawsegserg</p>', 1, 2, '2023-11-26 07:52:24', '2023-12-10 00:04:42', '2023-12-10 00:04:42', 0, ''),
(9, 'Nguyễn Tiến Thiện', '949999', '/storage/product/1/04qZUbvC3nGusDeHxkuA.jpg', 'avata.jpg', '<p>rawsegserg</p>', 1, 2, '2023-11-26 08:20:15', '2023-12-10 00:04:39', '2023-12-10 00:04:39', 0, ''),
(10, 'tienthien', '949999', NULL, NULL, '<p>awef</p>', 1, 3, '2023-11-26 08:21:07', '2023-12-10 00:04:34', '2023-12-10 00:04:34', 0, ''),
(11, 'Quần kaki', '949999', NULL, NULL, '<p>awef</p>', 1, 3, '2023-11-26 08:22:58', '2023-12-10 00:04:12', '2023-12-10 00:04:12', 0, ''),
(12, 'Nguyễn Tiến Thiện', '546', NULL, NULL, '<p>ăef</p>', 1, 7, '2023-12-01 13:52:43', '2023-12-10 00:04:05', '2023-12-10 00:04:05', 0, ''),
(13, 'tienthien', '949999', NULL, NULL, '', 1, 3, '2023-12-01 14:20:53', '2023-12-10 00:07:48', '2023-12-10 00:07:48', 0, ''),
(14, 'tienthien', '949999', NULL, NULL, '<p>;ioj;oij</p>', 1, 3, '2023-12-01 14:21:27', '2023-12-10 00:03:55', '2023-12-10 00:03:55', 0, ''),
(15, 'Quần kaki', '949999', NULL, NULL, '<p>sreg</p>', 1, 6, '2023-12-01 14:29:23', '2023-12-09 23:53:17', '2023-12-09 23:53:17', 0, ''),
(16, 'Quần kaki', '949999', NULL, NULL, '<p>sreg</p>', 1, 6, '2023-12-01 14:30:12', '2023-12-09 23:53:05', '2023-12-09 23:53:05', 0, ''),
(17, 'Quần túi box kaki', '1500000', '/storage/product/1/pKvRLp24FnYE6JXVpi2Z.jpg', 'vn-11134207-7qukw-ljzvmzbt1ghgdf.jpg', '<p>sản phẩm okela</p>', 1, 7, '2023-12-02 10:45:43', '2023-12-10 19:38:27', '2023-12-10 19:38:27', 0, ''),
(18, 'Áo khoác nỉ bông', '1,500,000', NULL, NULL, '<p>sản phẩm okela</p>', 1, 3, '2023-12-04 13:26:31', '2023-12-10 00:09:35', '2023-12-10 00:09:35', 0, ''),
(19, 'Áo nỉ cổ cao', '1500000', '/storage/product/1/TebD44b1PpHTSu8BlY2d.jpg', 'insta-6.jpg', '<p>sản phẩm okela</p>', 1, 3, '2023-12-04 13:27:36', '2023-12-12 18:29:11', '2023-12-12 18:29:11', 0, ''),
(20, 'Áo khoác nỉ bông', '1500000', '/storage/product/1/NRxgcNUuVGjflxn76FoA.jpg', 'insta-3.jpg', '<p>sản phẩm okela</p>', 1, 3, '2023-12-04 13:27:56', '2023-12-12 18:29:08', '2023-12-12 18:29:08', 0, ''),
(21, 'Nguyễn Tiến Thiện', '949999', NULL, NULL, '<p>awefawefawef</p>', 1, 4, '2023-12-10 09:34:43', '2023-12-10 10:36:52', '2023-12-10 10:36:52', 0, ''),
(22, 'tienthien', '949999', NULL, NULL, '<p>asdfsdaf</p>', 1, 4, '2023-12-10 10:36:40', '2023-12-10 10:36:45', '2023-12-10 10:36:45', 0, ''),
(23, 'Quần kaki', '949999', '/storage/product/1/KuO2XEB8Wcw4Yv4yqn2O.jpg', 'insta-4.jpg', '<p>jaweoifjawoi;ejf</p>', 1, 4, '2023-12-10 11:19:50', '2023-12-12 18:29:06', '2023-12-12 18:29:06', 0, ''),
(24, 'Áo khoác lông thú', '50000000', '/storage/product/1/HRvcidHX2g3o5OHCMguq.jpg', 'latest-2.jpg', '<p style=\"text-align: center;\"><strong>rất ấm</strong></p>', 1, 3, '2023-12-10 19:52:52', '2023-12-10 20:16:16', '2023-12-10 20:16:16', 0, ''),
(25, 'Áo khoác nỉ bông', '1500000', NULL, NULL, '<p>awefawef</p>', 1, 4, '2023-12-12 19:01:28', '2023-12-12 19:01:52', '2023-12-12 19:01:52', 0, ''),
(26, 'Áo thun cộc', '3500000', '/storage/product/1/CGO1KpdXVJU2oOZYaCHo.jpg', 'product-2.jpg', '<p>aewf</p>', 1, 3, '2023-12-12 19:01:44', '2024-01-20 16:37:33', NULL, 18, ''),
(27, 'Áo Phao Mùa Đông', '250000', '/storage/product/1/D1XlwsqFh0UBQJxjcwU1.jpg', 'latest-3.jpg', '<p>&aacute;o phao đẹp hihihi</p>', 1, 14, '2023-12-12 19:01:44', '2024-09-07 23:47:01', NULL, 1, ''),
(28, 'Áo len nỉ bông', '1500000', '/storage/product/1/UxmhQTfmiHx9XamhALxp.jpg', 'insta-3.jpg', '<p>&aacute;o lens nỉ b&ocirc;ng đẹp</p>', 1, 11, '2023-12-21 20:36:31', '2024-01-20 11:33:42', NULL, 7, ''),
(29, 'Quần kaki', '49999', '/storage/product/1/AAmVpfUvytdLGLOvAgrh.jpg', 'insta-4.jpg', '<p>okeee</p>', 1, 7, '2023-12-21 20:38:04', '2024-01-20 11:33:37', NULL, 2, ''),
(30, 'Áo len cổ cao', '1500000', '/storage/product/1/AQNHgQwmFmsc8WYdnsXF.jpg', 'banner-2.jpg', '<p>huhu</p>', 1, 13, '2023-12-21 20:38:52', '2024-08-09 10:30:17', NULL, 52, ''),
(31, 'Giày thời trang cổ thấp', '249992', '/storage/product/1/re8PMy6j5OQbxQwCsQUA.jpg', 'product-9.jpg', '<pre id=\"sf-dump-33477835\" class=\"sf-dump\" tabindex=\"0\" data-indent-pad=\" \"><strong>Quần kaki<em> ống </em></strong><em>rộng h&agrave;n quốc</em></pre>', 1, 7, '2023-11-25 11:19:56', '2023-12-12 19:02:03', '2023-12-12 19:02:07', 0, ''),
(32, 'Giày thời trang cổ thấp', '249992', '/storage/product/1/re8PMy6j5OQbxQwCsQUA.jpg', 'product-9.jpg', '<pre id=\"sf-dump-33477835\" class=\"sf-dump\" tabindex=\"0\" data-indent-pad=\" \"><strong>Quần kaki<em> ống </em></strong><em>rộng h&agrave;n quốc</em></pre>', 1, 7, '2023-11-25 11:19:46', '2023-12-12 19:02:06', '2023-12-12 19:02:07', 0, ''),
(33, 'Giày thời trang cổ thấp', '249992', '/storage/product/1/re8PMy6j5OQbxQwCsQUA.jpg', 'product-9.jpg', '<pre id=\"sf-dump-33477835\" class=\"sf-dump\" tabindex=\"0\" data-indent-pad=\" \"><strong>Quần kaki<em> ống </em></strong><em>rộng h&agrave;n quốc</em></pre>', 1, 7, '2023-11-25 11:19:51', '2023-12-12 19:02:23', '2023-12-12 19:02:07', 0, ''),
(34, 'Áo sơ mi thời trang', '3500000', '/storage/product/1/9ym4PwFFvMnyksjGNJiW.jpg', 'women-large.jpg', '<p>huhu</p>', 1, 13, '2023-12-21 20:38:32', '2024-08-10 10:39:12', NULL, 15, ''),
(35, 'Khăn quàng cổ', '4500000', '/storage/product/1/BiyXMev4FsSM56hVDOlt.jpg', 'product-4.jpg', '<p>huhu</p>', 1, 6, '2023-12-21 20:38:22', '2024-01-23 17:58:12', NULL, 39, ''),
(36, 'Áo len cổ cao', '3500000', '/storage/product/1/AQNHgQwmFmsc8WYdnsXF.jpg', 'banner-2.jpg', '<p>huhu</p>', 1, 6, '2023-12-21 20:38:12', '2024-01-20 11:44:53', NULL, 6, ''),
(37, 'Áo khoác bò', '3500000', '/storage/product/1/WXGu82XiaN669ImVSKKk.jpg', 'insta-1.jpg', '<table style=\"border-collapse: collapse; width: 100.068%; background-color: #ffffff; border-color: #FFFFFF;\" border=\"1\">\r\n<tbody>\r\n<tr>\r\n<td style=\"width: 48.0596%;\">\r\n<h3>Đa Dạng Về Kiểu D&aacute;ng v&agrave; M&agrave;u Sắc</h3>\r\n<ul>\r\n<li>Ch&uacute;ng t&ocirc;i mang đến cho bạn một loạt c&aacute;c kiểu d&aacute;ng đa dạng từ truyền thống đến hiện đại, từ những chiếc &aacute;o kho&aacute;c gi&oacute; d&aacute;ng d&agrave;i tới những mẫu ngắn thể thao. Bạn c&oacute; thể dễ d&agrave;ng t&igrave;m thấy chiếc &aacute;o ph&ugrave; hợp với phong c&aacute;ch ri&ecirc;ng của m&igrave;nh. Đồng thời, bảng m&agrave;u sắc đa dạng từ những gam m&agrave;u trung t&iacute;nh tới những t&ocirc;ng m&agrave;u tươi s&aacute;ng, gi&uacute;p bạn thể hiện sự s&aacute;ng tạo v&agrave; ấn tượng.</li>\r\n</ul>\r\n<p>phong c&aacute;ch h&agrave;ng đầu từ ch&uacute;ng t&ocirc;i!</p>\r\n</td>\r\n<td style=\"width: 48.0596%;\">\r\n<div><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"/storage/photos/1/man-3.jpg\" alt=\"\" width=\"347\" height=\"478\" /></div>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>', 1, 13, '2023-12-21 20:38:54', '2024-09-07 23:47:20', NULL, 267, ''),
(38, 'Balo chống nước', '3500000', '/storage/product/1/pP1ud6o6GfnQphGUox3l.jpg', 'product-7.jpg', '<p>huhu</p>', 11, 6, '2023-12-21 20:38:52', '2024-01-20 12:15:02', NULL, 8, ''),
(39, 'Quần kaki bò', '249999', '/storage/product//2SkosIevXB2bo6QUZLVD.jpg', 'insta-5.jpg', '<p>m&ocirc; tả sản phẩm</p>', 1, 14, '2024-01-23 19:21:13', '2024-01-23 19:25:11', NULL, 2, NULL),
(40, 'Áo thun polo kaki', '1500000', '/storage/product//W0YPbiBUt726MQNZRxrs.jpg', 'product-1.jpg', '<p>M&ocirc; tả sản phẩm</p>', 1, 14, '2024-01-23 19:23:01', '2024-09-07 23:47:07', NULL, 2, NULL),
(41, 'Quần kakiiii', '949999', '/storage/product//BRKnFLx928ZKWHvzSEtO.jpg', 'banner-3.jpg', '<p>M&ocirc; tả sản phẩm</p>', 1, 13, '2024-01-23 20:11:16', '2024-08-09 10:30:27', NULL, 2, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_attributes`
--

CREATE TABLE `product_attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `color_id` int(10) UNSIGNED NOT NULL,
  `size_id` int(10) UNSIGNED NOT NULL,
  `price` decimal(15,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `image` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_attributes`
--

INSERT INTO `product_attributes` (`id`, `product_id`, `color_id`, `size_id`, `price`, `quantity`, `image`, `created_at`, `updated_at`) VALUES
(1, 37, 1, 7, '3500000', 10, '/storage/product/1/BiyXMev4FsSM56hVDOlt.jpg', '2024-01-18 08:14:06', '2024-01-23 20:12:49'),
(2, 37, 4, 7, '250000', 25, '/storage/product/1/9ym4PwFFvMnyksjGNJiW.jpg', '2024-01-18 08:14:53', '2024-01-23 20:06:07'),
(3, 37, 1, 10, '3500000', 65, '/storage/product/1/9ym4PwFFvMnyksjGNJiW.jpg', '2024-01-18 08:22:35', '2024-01-23 20:06:07'),
(4, 37, 15, 12, '2500000', 20, '/storage/product/1/AQNHgQwmFmsc8WYdnsXF.jpg', '2024-01-19 17:25:48', '2024-01-23 20:12:49'),
(5, 30, 1, 7, '1500000', 10, '/storage/product/1WWN6CUojnoUFq8OmxD1.jpg', '2024-01-23 19:26:16', '2024-01-23 19:27:25'),
(6, 30, 15, 7, '1500000', 20, '/storage/product/1/BiyXMev4FsSM56hVDOlt.jpg', '2024-01-23 19:26:36', '2024-01-23 19:27:25');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image_path` varchar(191) DEFAULT NULL,
  `image_name` varchar(191) NOT NULL,
  `product_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_images`
--

INSERT INTO `product_images` (`id`, `image_path`, `image_name`, `product_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '/storage/product/1/WWgp4BsJovixaUXIdue6.jpg', 'linhxinhnhat2cut.jpg', 5, '2023-11-25 13:54:44', '2023-11-25 13:54:44', NULL),
(2, '/storage/product/1/yypXVxtIwutZxpCEFahj.jpg', 'linhxinhnhat2cut2.jpg', 5, '2023-11-25 13:54:44', '2023-11-25 13:54:44', NULL),
(3, '/storage/product/1/rbgMA2vT40qHw6ByuTCa.png', 'Untitled-1.png', 5, '2023-11-25 13:54:44', '2023-11-25 13:54:44', NULL),
(4, '/storage/product/1/ybGtXQmMiYNLEFOTu0my.jpg', 'linhxinhnhat2.jpg', 6, '2023-11-25 14:20:57', '2023-11-25 14:20:57', NULL),
(5, '/storage/product/1/tplYi1iRoXE7JKYRi9un.jpg', 'linhxinhnhat2cut.jpg', 6, '2023-11-25 14:20:57', '2023-11-25 14:20:57', NULL),
(6, '/storage/product/1/WYjxB2miabWlHKF9c5ZA.jpg', 'linhxinhnhat2cut2.jpg', 6, '2023-11-25 14:20:57', '2023-11-25 14:20:57', NULL),
(7, '/storage/product/1/IqupnceSZraDwRwUOak4.png', 'NBX_Snapshot_2023-09-11_15-16-21-819.png', 7, '2023-11-26 07:51:14', '2023-11-26 07:51:14', NULL),
(8, '/storage/product/1/pnBuOur6RMts6TAlrz4n.jpeg', 'PSFix_20221026_000704.jpeg', 7, '2023-11-26 07:51:14', '2023-11-26 07:51:14', NULL),
(9, '/storage/product/1/4Vsqvv4Y8ZXCTYyIbXzU.png', 'Untitled-1.png', 7, '2023-11-26 07:51:14', '2023-11-26 07:51:14', NULL),
(10, '/storage/product/1/tcVobJKGdcqwpvCxo7Vy.png', 'NBX_Snapshot_2023-09-11_15-16-21-819.png', 8, '2023-11-26 07:52:24', '2023-11-26 07:52:24', NULL),
(11, '/storage/product/1/OsKToYFO68lhviZUMieo.jpeg', 'PSFix_20221026_000704.jpeg', 8, '2023-11-26 07:52:24', '2023-11-26 07:52:24', NULL),
(12, '/storage/product/1/HaSyinbsXnT60OSkvY65.png', 'Untitled-1.png', 8, '2023-11-26 07:52:24', '2023-11-26 07:52:24', NULL),
(13, '/storage/product/1/X5cdS4ggXm822UC6ZdiY.png', 'NBX_Snapshot_2023-09-11_15-16-21-819.png', 9, '2023-11-26 08:20:15', '2023-11-26 08:20:15', NULL),
(14, '/storage/product/1/Mdc2yNRE6bKuiCyOY3e1.jpeg', 'PSFix_20221026_000704.jpeg', 9, '2023-11-26 08:20:15', '2023-11-26 08:20:15', NULL),
(15, '/storage/product/1/0lyCkl7ROufLQdZmJ5jr.png', 'Untitled-1.png', 9, '2023-11-26 08:20:15', '2023-11-26 08:20:15', NULL),
(16, '/storage/product/1/IdBh5vJ7Wox3Kxyieh9h.jpg', 'avata.jpg', 12, '2023-12-01 13:52:44', '2023-12-01 13:52:44', NULL),
(17, '/storage/product/1/kFgjDeeJtR7LEkZALBgy.jpg', 'vn-11134207-7qukw-ljzvmzbt5o6sbf.jpg', 17, '2023-12-02 10:45:43', '2023-12-02 10:45:43', NULL),
(18, '/storage/product/1/fYJHEIWUaaF0lTUmnNym.jpg', 'vn-11134207-7qukw-ljzvmzbt49mca5.jpg', 17, '2023-12-02 10:45:43', '2023-12-02 10:45:43', NULL),
(19, '/storage/product/1/EMs01JUZAxh2amQBRtWu.jpg', 'vn-11134207-7qukw-ljzvmzbtfi0ybf.jpg', 17, '2023-12-02 10:45:43', '2023-12-02 10:45:43', NULL),
(20, '/storage/product/1/KJX5EtBlew407lBlJtNC.jpeg', 'linhxinhnhatx4on.jpeg', 18, '2023-12-04 13:26:32', '2023-12-04 13:52:25', '2023-12-04 13:52:25'),
(21, '/storage/product/1/K1tlIqKCmI6Kik2OLDEX.jpeg', 'linhxinhnhatx4on.jpeg', 19, '2023-12-04 13:27:36', '2023-12-04 13:27:36', NULL),
(22, '/storage/product/1/mt7tvTmMl8Rurwt6s5V3.jpg', 'linhxinhnhat.jpg', 20, '2023-12-04 13:27:56', '2023-12-04 14:01:11', '2023-12-04 14:01:11'),
(23, '/storage/product/1/fPdhwzOL80T0oqLGExfI.jpg', 'linhxinhnhat2.jpg', 20, '2023-12-04 14:03:10', '2023-12-04 14:03:19', '2023-12-04 14:03:19'),
(24, '/storage/product/1/Bzcu5RYbBCTJRJBiNGmL.jpeg', 'linhxinhnhatx2.jpeg', 20, '2023-12-04 14:03:19', '2023-12-04 14:03:19', NULL),
(25, '/storage/product/1/ZJZqMipsjgUpRNahPO9H.jpg', 'man-large.jpg', 26, '2023-12-21 20:27:13', '2023-12-21 20:27:13', NULL),
(26, '/storage/product/1/VBP3j1CWnq8KulHlOaaC.jpg', 'product-3.jpg', 26, '2023-12-21 20:27:13', '2023-12-21 20:27:13', NULL),
(27, '/storage/product/1/FH1iOenqgXkA2bLTxYvj.jpg', 'product-8.jpg', 26, '2023-12-21 20:27:13', '2023-12-21 20:27:13', NULL),
(28, '/storage/product/1/HNrvRmgsgumt0L8QNLYR.jpg', 'insta-6.jpg', 28, '2023-12-21 20:36:31', '2023-12-21 20:36:31', NULL),
(29, '/storage/product/1/OLHWDiNfxts3co8dNH9M.jpg', 'product-6.jpg', 27, '2023-12-21 20:37:36', '2023-12-21 20:37:36', NULL),
(30, '/storage/product/1/qFls9XCDuKjkC40puzwc.jpg', 'product-8.jpg', 27, '2023-12-21 20:37:36', '2023-12-21 20:37:36', NULL),
(31, '/storage/product/1/GRSrtogHh4MuPKMlsCAW.jpg', 'insta-3.jpg', 30, '2023-12-21 20:39:03', '2023-12-21 20:39:03', NULL),
(32, '/storage/product/1/usXXA2mzTmWHwZ26Qsat.jpg', 'latest-1.jpg', 30, '2023-12-21 20:39:03', '2023-12-21 20:39:03', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tags`
--

CREATE TABLE `product_tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tags`
--

INSERT INTO `product_tags` (`id`, `product_id`, `tag_id`, `created_at`, `updated_at`) VALUES
(1, 7, 1, '2023-11-26 07:51:15', '2023-11-26 07:51:15'),
(2, 7, 2, '2023-11-26 07:51:15', '2023-11-26 07:51:15'),
(3, 8, 1, '2023-11-26 07:52:24', '2023-11-26 07:52:24'),
(4, 12, 3, '2023-12-01 13:52:44', '2023-12-01 13:52:44'),
(5, 14, 4, '2023-12-01 14:21:27', '2023-12-01 14:21:27'),
(6, 14, 1, '2023-12-01 14:21:27', '2023-12-01 14:21:27'),
(7, 14, 5, '2023-12-01 14:21:27', '2023-12-01 14:21:27'),
(8, 14, 6, '2023-12-01 14:21:27', '2023-12-01 14:21:27'),
(9, 15, 7, '2023-12-01 14:29:23', '2023-12-01 14:29:23'),
(10, 17, 8, '2023-12-02 10:45:44', '2023-12-02 10:45:44'),
(11, 17, 9, '2023-12-02 10:45:44', '2023-12-02 10:45:44'),
(12, 18, 8, '2023-12-04 13:26:32', '2023-12-04 13:26:32'),
(13, 18, 9, '2023-12-04 13:26:32', '2023-12-04 13:26:32'),
(14, 19, 8, '2023-12-04 13:27:36', '2023-12-04 13:27:36'),
(15, 19, 9, '2023-12-04 13:27:36', '2023-12-04 13:27:36'),
(16, 20, 8, '2023-12-04 13:27:56', '2023-12-04 13:27:56'),
(17, 20, 9, '2023-12-04 13:27:56', '2023-12-04 13:27:56'),
(18, 27, 10, '2023-12-16 21:36:19', '2023-12-16 21:36:19'),
(19, 27, 11, '2023-12-16 21:36:19', '2023-12-16 21:36:19'),
(20, 26, 12, '2023-12-21 20:27:13', '2023-12-21 20:27:13'),
(21, 26, 2, '2023-12-21 20:27:13', '2023-12-21 20:27:13'),
(22, 28, 12, '2023-12-21 20:36:31', '2023-12-21 20:36:31'),
(23, 28, 2, '2023-12-21 20:36:31', '2023-12-21 20:36:31'),
(25, 39, 13, '2024-01-23 19:21:13', '2024-01-23 19:21:13'),
(26, 40, 14, '2024-01-23 19:23:01', '2024-01-23 19:23:01'),
(27, 41, 1, '2024-01-23 20:11:16', '2024-01-23 20:11:16'),
(28, 41, 15, '2024-01-23 20:11:16', '2024-01-23 20:11:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `display_name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', '<p>Quản trị hệ thống</p>', NULL, '2023-12-22 14:15:49', NULL),
(2, 'guest', '<p>Kh&aacute;ch h&agrave;ng</p>', NULL, '2023-12-24 14:54:28', NULL),
(3, 'developer', '<p>Ph&aacute;t triển hệ thống</p>', NULL, '2023-12-22 19:13:11', NULL),
(4, 'content', '<p>Chỉnh sửa nội dung</p>', NULL, '2024-08-10 11:13:19', NULL),
(5, 'test', '<p>hehe</p>', '2023-12-22 14:07:06', '2023-12-22 14:07:06', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `config_key` varchar(191) NOT NULL,
  `config_value` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `config_key`, `config_value`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Nguyễn Tiến Thiện', '<p>awefawef</p>', '2023-12-12 20:14:28', '2023-12-12 20:14:43', '2023-12-12 20:14:43'),
(2, 'hihihi', 'hehe', '2023-12-12 21:19:25', '2023-12-12 21:20:30', '2023-12-12 21:20:30'),
(3, 'hehiew', 'ja;weoif', '2023-12-14 19:20:38', '2023-12-14 19:22:58', '0000-00-00 00:00:00'),
(4, 'auoywehfiaw', 'awef', '2023-12-14 19:24:52', '2023-12-14 19:24:56', '2023-12-14 19:24:56'),
(5, 'aweerte', 'aweerte', '2023-12-14 19:28:39', '2023-12-14 19:30:58', '2023-12-14 19:30:58'),
(6, 'auoywehfiaww', 'aweerte', '2023-12-14 19:31:22', '2023-12-14 19:31:33', '2023-12-14 19:31:33'),
(7, 'hehieww', 'awef', '2023-12-14 19:33:44', '2023-12-14 19:38:43', '2023-12-14 19:38:43'),
(8, 'hihihias', 'aweerte', '2023-12-14 19:40:25', '2023-12-14 19:40:31', '2023-12-14 19:40:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) NOT NULL,
  `description` varchar(191) NOT NULL,
  `image_name` varchar(191) NOT NULL,
  `image_path` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `sliders`
--

INSERT INTO `sliders` (`id`, `title`, `description`, `image_name`, `image_path`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'tienthien', '<p>awefwaef</p>', 'NBX_Snapshot_2023-09-11_15-16-21-819.png', '/storage/slider/1/iEWBLtBz3Duj8UDhMw01.png', '2023-12-12 12:16:49', '2023-12-12 14:57:36', '2023-12-12 14:57:36'),
(2, 'tienthien', '<p>awefwaef</p>', 'NBX_Snapshot_2023-09-11_15-16-21-819.png', '/storage/slider/1/kLPKD5kvXzsMhq05hsKz.png', '2023-12-12 12:20:24', '2023-12-12 12:56:07', '2023-12-12 12:56:07'),
(3, 'tienthien', '<p>awefwaef</p>', 'NBX_Snapshot_2023-09-11_15-16-21-819.png', '/storage/slider/1/be2eWdjDZrPt9MNYw24u.png', '2023-12-12 12:20:41', '2023-12-12 14:57:41', '2023-12-12 14:57:41'),
(4, 'tienthien', '<p>awef</p>', 'NBX_Snapshot_2023-09-11_15-16-21-819.png', '/storage/slider/1/ECN5j8ouIXtz94keteR1.png', '2023-12-12 12:20:51', '2023-12-12 14:57:39', '2023-12-12 14:57:39'),
(5, 'tienthien', '<p>awef</p>', 'NBX_Snapshot_2023-09-11_15-16-21-819.png', '/storage/slider/1/MTxG6qTMDXLOGIlQv0l5.png', '2023-12-12 12:21:44', '2023-12-12 14:57:43', '2023-12-12 14:57:43'),
(6, 'tienthien', '<p>aewf</p>', 'baitap.pptx', '/storage/slider/1/Gv4c91gqNrQAdFv08esH.pptx', '2023-12-12 12:33:46', '2023-12-12 12:56:03', '2023-12-12 12:56:03'),
(7, 'tienthien', '<p>gaawerg</p>', 'KTPP - Copy.pptx', '/storage/slider/1/awDU3tXrmtybCsZnwIh4.pptx', '2023-12-12 12:35:12', '2023-12-12 12:55:17', '2023-12-12 12:55:17'),
(8, 'Nguyễn Tiến Thiện', '<p>awefawef</p>', 'linhxinhnhat.jpg', '/storage/slider/1/M5Gt4Aa0U2RLKNsNwuBe.jpg', '2023-12-12 14:35:52', '2023-12-15 07:51:00', '2023-12-15 07:51:00'),
(9, 'tienthien3', '<p>wafwaeffweaw</p>', 'NBX_Snapshot_2023-09-11_15-16-21-819.png', '/storage/slider/1/DxJuhFv6f5bxYqSI5BCk.png', '2023-12-12 19:15:27', '2023-12-12 19:15:31', '2023-12-12 19:15:31'),
(10, 'Nguyễn Tiến Thiệnn', '<p>awefwaef</p>', 'linh.jpg', '/storage/slider/1/h8AuqKCzT7bvbw8SB8Zi.jpg', '2023-12-12 19:17:08', '2023-12-12 19:17:12', '2023-12-12 19:17:12'),
(11, 'Giảm giá lớn nhất cuối năm -50%: Mừng Xuân Mới!', '<p>Kh&aacute;m ph&aacute; ưu đ&atilde;i cuối năm với giảm gi&aacute; đến 50%! Mua sắm ngay để tận hưởng những sản phẩm hot nhất.</p>', 'hero-1.jpg', '/storage/slider/1/GqPPC5W8CW62MzIzBHOR.jpg', '2023-12-20 14:52:29', '2023-12-20 14:52:29', NULL),
(12, 'Làm Nóng Mùa Lạnh với Ưu Đãi Cuối Năm - Giảm Giá Đặc Biệt!', '<p>Kh&ocirc;ng gian ấm &aacute;p, gi&aacute; cả lạnh l&ugrave;ng. H&atilde;y nhanh tay đặt h&agrave;ng v&agrave; tận hưởng giảm gi&aacute; đặc biệt trong th&aacute;ng cuối năm</p>', 'sg-11134201-7qvey-ljhzxycu2wp69d.jpg', '/storage/slider//j2vRcC98RSNElasFV56D.jpg', '2023-12-20 14:54:04', '2024-08-10 10:35:43', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tags`
--

CREATE TABLE `tags` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tags`
--

INSERT INTO `tags` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'hehe', '2023-11-26 07:51:14', '2023-11-26 07:51:14'),
(2, 'huhu', '2023-11-26 07:51:15', '2023-11-26 07:51:15'),
(3, '324', '2023-12-01 13:52:44', '2023-12-01 13:52:44'),
(4, 'tag', '2023-12-01 14:20:53', '2023-12-01 14:20:53'),
(5, 'aw', '2023-12-01 14:20:53', '2023-12-01 14:20:53'),
(6, 'fu', '2023-12-01 14:20:53', '2023-12-01 14:20:53'),
(7, 'ret', '2023-12-01 14:29:23', '2023-12-01 14:29:23'),
(8, 'hoodie', '2023-12-02 10:45:43', '2023-12-02 10:45:43'),
(9, 'ao khoac', '2023-12-02 10:45:43', '2023-12-02 10:45:43'),
(10, 'fawef', '2023-12-16 21:36:19', '2023-12-16 21:36:19'),
(11, 'fwea', '2023-12-16 21:36:19', '2023-12-16 21:36:19'),
(12, 'hihi', '2023-12-21 20:27:13', '2023-12-21 20:27:13'),
(13, 'quần bò', '2024-01-23 19:21:13', '2024-01-23 19:21:13'),
(14, 'áo thun', '2024-01-23 19:23:01', '2024-01-23 19:23:01'),
(15, 'haha', '2024-01-23 20:11:16', '2024-01-23 20:11:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(191) DEFAULT NULL,
  `address` varchar(191) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `gender` tinyint(4) NOT NULL DEFAULT 0,
  `token` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `google_id` varchar(191) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `phone`, `address`, `birthday`, `gender`, `token`, `status`, `google_id`) VALUES
(1, 'Thiện', 'tienthien2806@gmail.com', NULL, '$2y$10$b2w0m0qYUlDByOvQjuKpmubxCKJRSfRkz3pXON2xMlA5ULdtNU2Qu', 'KpwXeIbh2JuuV1iE115YCPOqdnnu3O8OWdQllyNANKfNSj9RUFcWjYVsAoLJ', NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, 1, NULL),
(11, 'thien.tng04', 'thien.tng04@gmail.com', NULL, '$2y$10$b2w0m0qYUlDByOvQjuKpmubxCKJRSfRkz3pXON2xMlA5ULdtNU2Qu', 'ffgbfCsIqcovAk8fV3Rz15hIoC4CGrDngJEsRtly86xUFb1EKqUO7t3vMuxQ', '2023-12-16 14:25:11', '2023-12-16 14:25:11', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL),
(13, 'tienthien2806', 'thien.tng4@gmail.com', NULL, '$2y$10$b2w0m0qYUlDByOvQjuKpmubxCKJRSfRkz3pXON2xMlA5ULdtNU2Qu', 'CPPd1Wgd78DSf6UbWrWHtJ36HAlIqdmYTKuuIPZtX1FpwKJZv41FItHs6Kh2', '2023-12-16 14:31:22', '2023-12-16 14:31:22', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL),
(14, 'tienthien', 'hehe@gmail.com', NULL, '$2y$10$zVOJp.CPjVTO/jzXWKzsKeB4d05rTwN45MjkIT8KyttULh4NidNfi', NULL, '2023-12-16 20:06:53', '2023-12-16 20:18:52', '2023-12-16 20:18:52', NULL, NULL, NULL, 0, NULL, 1, NULL),
(22, 'Đức Minhh', 'tienthien0311@gmail.com', NULL, '$2y$10$1Yk6r6w4StUbjD9kefpVY.W0KHKHbeTs/czBSt9X8891MrYetQjXy', NULL, '2023-12-31 02:42:16', '2023-12-31 02:42:16', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL),
(23, 'Triệu', 'trieu1@gmail.com', NULL, '$2y$10$A.vGRqI6.XhDqnk3KmRcaORBJTFZrGcLZ9zq6YMwh5PTg7zE7kaYu', NULL, '2024-01-01 18:43:54', '2024-01-01 18:43:54', NULL, NULL, NULL, NULL, 0, '4QVV14ZFNY', 0, NULL),
(24, 'Nguyễn Tiến Thiện', 'shop2k4@gmail.com', NULL, '$2y$10$GfqD0kVedWKAA3zAHBlDXe/on1Ti.iO3x9dV9/LM6xb8dILqlb3Xy', 'Fdk6xf3jeccGk6itAbgz3LSIrEl8zobRpOtUv8Ilvh585FMpK0oRawyyD3IW', '2024-01-01 18:46:11', '2024-01-01 18:46:27', NULL, NULL, NULL, NULL, 0, 'NZTOL92NRK', 1, NULL),
(25, 'Nghiaaaa', 'vitarminlove01@gmail.com', NULL, '$2y$10$llgHvBwvJi4CVGQMt13kJuREGaUaBL2lJGgNA47OuaTREdJBcnT7u', NULL, '2024-01-12 02:27:33', '2024-01-12 02:27:33', NULL, NULL, NULL, NULL, 0, 'DCMRBCJFZZ', 0, NULL),
(26, 'Nghia', 'bomaychiuroiconcho@gmail.com', NULL, '$2y$10$TX0JyXXtwngFIIjdjc94xeKvkXERM7VxHOO8nQNAYOjtZHC1YuGcK', '1U3jTKXWOGHlBCvYWmFCXGnOkrDFzEEPRp2QrNr4sGmi5W8mXDEkWbDSYsBS', '2024-01-12 02:31:26', '2024-01-12 02:33:44', NULL, NULL, NULL, NULL, 0, NULL, 1, NULL),
(27, '佐藤さとう', 'shopthoitrang2k4@gmail.com', NULL, '$2y$10$SgApnSa.5nMPSh3vRtHnyu9rESiCGnXK4OM1NHqeYyoOA6MKFhjua', NULL, '2024-01-23 10:05:22', '2024-01-23 10:05:22', NULL, NULL, NULL, NULL, 0, NULL, 1, '110751521631015313131');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_role`
--

CREATE TABLE `user_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_role`
--

INSERT INTO `user_role` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(3, 14, 2, '2023-12-16 20:06:53', '2023-12-16 20:06:53'),
(7, 13, 2, '2023-12-24 14:58:02', '2023-12-24 14:58:02'),
(8, 11, 2, '2023-12-28 15:57:57', '2023-12-28 15:57:57'),
(10, 23, 2, '2024-01-01 18:43:54', '2024-01-01 18:43:54'),
(11, 24, 2, '2024-01-01 18:46:11', '2024-01-01 18:46:11'),
(14, 1, 1, '2024-01-01 19:22:23', '2024-01-01 19:22:23'),
(15, 25, 2, '2024-01-12 02:27:33', '2024-01-12 02:27:33'),
(16, 26, 2, '2024-01-12 02:31:26', '2024-01-12 02:31:26'),
(17, 27, 2, '2024-01-23 10:05:22', '2024-01-23 10:05:22'),
(18, 25, 1, '2024-01-23 20:08:42', '2024-01-23 20:08:42'),
(19, 26, 4, '2024-08-10 11:12:52', '2024-08-10 11:12:52');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `import_bills`
--
ALTER TABLE `import_bills`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `import_details`
--
ALTER TABLE `import_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- Chỉ mục cho bảng `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `import_bills`
--
ALTER TABLE `import_bills`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `import_details`
--
ALTER TABLE `import_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT cho bảng `permission_role`
--
ALTER TABLE `permission_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT cho bảng `product_attributes`
--
ALTER TABLE `product_attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `product_tags`
--
ALTER TABLE `product_tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tags`
--
ALTER TABLE `tags`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT cho bảng `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
