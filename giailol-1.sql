-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th1 06, 2021 lúc 04:39 AM
-- Phiên bản máy phục vụ: 5.7.26
-- Phiên bản PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `giailol`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bangxephangs`
--

DROP TABLE IF EXISTS `bangxephangs`;
CREATE TABLE IF NOT EXISTS `bangxephangs` (
  `MaBXH` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MaDoi` int(11) NOT NULL,
  `Diem` int(11) NOT NULL,
  `TranThang` int(11) DEFAULT NULL,
  `TranThua` int(11) DEFAULT NULL,
  `HieuSo` int(11) DEFAULT NULL,
  `MaGD` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`MaBXH`),
  KEY `bangxephangs_magd_foreign` (`MaGD`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `bangxephangs`
--

INSERT INTO `bangxephangs` (`MaBXH`, `MaDoi`, `Diem`, `TranThang`, `TranThua`, `HieuSo`, `MaGD`, `created_at`, `updated_at`) VALUES
(1, 24, 2, 2, 2, 2, 11, '2021-01-05 07:28:02', '2021-01-05 09:46:11'),
(2, 20, 2, 2, 2, 2, 11, '2021-01-05 07:28:02', '2021-01-05 09:46:11'),
(3, 21, 3, 3, 1, 2, 11, '2021-01-05 07:28:02', '2021-01-05 09:46:11'),
(4, 22, 1, 1, 3, -6, 11, '2021-01-05 07:28:02', '2021-01-05 09:46:11'),
(5, 23, 2, 2, 2, 0, 11, '2021-01-05 07:28:02', '2021-01-05 09:46:11');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `dois`
--

DROP TABLE IF EXISTS `dois`;
CREATE TABLE IF NOT EXISTS `dois` (
  `MaDoi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TenDoi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SLTV` int(11) NOT NULL,
  `MaGD` int(10) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`MaDoi`),
  KEY `dois_magd_foreign` (`MaGD`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dois`
--

INSERT INTO `dois` (`MaDoi`, `TenDoi`, `SLTV`, `MaGD`, `img`, `created_at`, `updated_at`) VALUES
(24, 'chamy my', 5, 11, 'anh_doi_tuyen.jpg', '2021-01-04 06:39:34', '2021-01-05 09:38:55'),
(3, 'Chim sẻ đi nắng', 5, 1, 'bó hoa tình yêu_1607437254.jpg', '2020-12-08 07:20:54', '2020-12-08 07:20:54'),
(20, 'Anh không ngán ai', 5, 11, 'anh_doi_tuyen.jpg', '2021-01-04 06:38:59', '2021-01-05 09:38:55'),
(21, 'Con chim non', 5, 11, 'anh_doi_tuyen.jpg', '2021-01-04 06:39:05', '2021-01-05 09:38:55'),
(22, 'lop CNTT', 5, 11, 'anh_doi_tuyen.jpg', '2021-01-04 06:39:12', '2021-01-05 09:38:55'),
(23, 'Không đối thủ', 5, 11, 'anh_doi_tuyen.jpg', '2021-01-04 06:39:16', '2021-01-05 09:38:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giaidaus`
--

DROP TABLE IF EXISTS `giaidaus`;
CREATE TABLE IF NOT EXISTS `giaidaus` (
  `MaGD` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TenGD` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SLdoi` int(11) NOT NULL,
  `TGBD` datetime DEFAULT NULL,
  `TGKT` datetime DEFAULT NULL,
  `SLve` int(11) NOT NULL,
  `MaUser` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`MaGD`),
  KEY `giaidaus_mauser_foreign` (`MaUser`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `giaidaus`
--

INSERT INTO `giaidaus` (`MaGD`, `TenGD`, `SLdoi`, `TGBD`, `TGKT`, `SLve`, `MaUser`, `created_at`, `updated_at`, `img`) VALUES
(1, 'hoi tuyen phu dong', 4, NULL, NULL, 20, 1, '2020-12-05 07:20:04', '2020-12-05 07:20:04', ''),
(2, 'hoi tuyen phu dong', 4, '2020-12-06 21:04:00', '2020-12-10 21:04:00', 20, 1, '2020-12-05 07:21:28', '2020-12-05 07:21:28', ''),
(3, 'hoi tuyen phu dong', 4, '2020-12-06 21:04:00', '2020-12-10 21:04:00', 20, 1, '2020-12-05 07:24:32', '2020-12-05 07:24:32', ''),
(4, 'giai dau mua xuan 2020', 4, '2020-12-05 21:33:00', '2020-12-12 21:33:00', 20, 1, '2020-12-05 07:33:56', '2020-12-05 07:33:56', ''),
(5, 'lien minh huyen thoai', 5, '2020-12-08 21:59:00', '2020-12-17 21:59:00', 100, 1, '2020-12-07 08:00:16', '2020-12-07 08:00:16', 'giaidau3_1607353216.jpg'),
(6, 'giai dau mua xuan 2020', 5, '2020-12-08 22:08:00', '2020-12-18 22:08:00', 120, 1, '2020-12-07 08:08:15', '2020-12-07 08:08:15', 'giaidau1_1607353695.jpg'),
(7, 'hoi tuyen phu dong', 4, '2020-12-07 22:20:00', '2020-12-10 22:20:00', 200, 1, '2020-12-07 08:20:40', '2020-12-07 08:20:40', 'giaidau2_1607354439.jpg'),
(8, 'hoi tuyen phu dong', 5, '2020-12-07 22:24:00', '2020-12-10 22:24:00', 21, 1, '2020-12-07 08:24:50', '2020-12-07 08:24:50', 'giaidau3_1607354690.jpg'),
(9, 'hoi tuyen phu dong', 5, '2020-12-09 22:28:00', '2020-12-12 22:28:00', 30, 1, '2020-12-07 08:28:23', '2020-12-07 08:28:23', 'giaidau3_1607354903.jpg'),
(10, 'giai dau mua xuan 2020', 5, '2020-12-09 22:32:00', '2020-12-19 22:32:00', 10, 1, '2020-12-07 08:32:13', '2020-12-07 08:32:13', 'giaidau1_1607355133.jpg'),
(11, 'hoi tuyen phu dong', 5, '2021-12-25 16:36:00', '2020-12-31 16:36:00', 60, 1, '2021-12-07 08:34:20', '2020-12-23 02:37:02', 'giaidau3.jpg'),
(12, 'hoi tuyen phu dong', 5, '2020-12-10 17:13:00', '2020-12-20 17:13:00', 12, 1, '2020-12-10 03:13:34', '2020-12-10 03:13:34', 'giaidau3.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichthidaus`
--

DROP TABLE IF EXISTS `lichthidaus`;
CREATE TABLE IF NOT EXISTS `lichthidaus` (
  `MaLTD` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `MaDoi1` int(11) NOT NULL,
  `MaDoi2` int(11) NOT NULL,
  `KQ1` int(11) DEFAULT NULL,
  `KQ2` int(11) DEFAULT NULL,
  `ThoiGian` datetime NOT NULL,
  `MaGD` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`MaLTD`),
  KEY `lichthidaus_magd_foreign` (`MaGD`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `lichthidaus`
--

INSERT INTO `lichthidaus` (`MaLTD`, `MaDoi1`, `MaDoi2`, `KQ1`, `KQ2`, `ThoiGian`, `MaGD`, `created_at`, `updated_at`) VALUES
(73, 22, 23, 2, 1, '2021-12-28 10:00:00', 11, '2021-01-05 07:28:02', '2021-01-05 09:38:33'),
(72, 21, 23, 2, 1, '2021-12-28 08:00:00', 11, '2021-01-05 07:28:02', '2021-01-05 08:18:12'),
(71, 20, 21, 3, 0, '2021-12-27 16:00:00', 11, '2021-01-05 07:28:02', '2021-01-05 08:18:12'),
(70, 24, 23, 1, 2, '2021-12-27 14:00:00', 11, '2021-01-05 07:28:02', '2021-01-05 08:18:12'),
(69, 21, 22, 3, 0, '2021-12-27 10:00:00', 11, '2021-01-05 07:28:02', '2021-01-05 08:18:12'),
(68, 20, 23, 1, 2, '2021-12-27 08:00:00', 11, '2021-01-05 07:28:02', '2021-01-05 08:18:12'),
(67, 20, 22, 2, 1, '2021-12-26 16:00:00', 11, '2021-01-05 07:28:02', '2021-01-05 08:18:12'),
(66, 24, 22, 3, 0, '2021-12-26 14:00:00', 11, '2021-01-05 07:28:02', '2021-01-05 08:18:12'),
(65, 24, 20, 2, 1, '2021-12-26 10:00:00', 11, '2021-01-05 07:28:02', '2021-01-05 09:13:35'),
(64, 24, 21, 1, 2, '2021-12-26 08:00:00', 11, '2021-01-05 07:28:01', '2021-01-05 08:18:12');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_12_05_064451_create_giaidaus_table', 2),
(5, '2020_12_05_093509_add_img_to_giaidaus', 3),
(7, '2020_12_08_035703_create_dois_table', 4),
(9, '2020_12_08_150748_create_thanh_viens_table', 5),
(10, '2020_12_21_085939_create_lichthidaus_table', 6),
(11, '2021_01_04_164353_create_bangxephangs_table', 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `thanhviens`
--

DROP TABLE IF EXISTS `thanhviens`;
CREATE TABLE IF NOT EXISTS `thanhviens` (
  `MaTV` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TenTV` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ViTri` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaDoi` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`MaTV`),
  KEY `thanhviens_madoi_foreign` (`MaDoi`)
) ENGINE=MyISAM AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhviens`
--

INSERT INTO `thanhviens` (`MaTV`, `TenTV`, `ViTri`, `MaDoi`, `created_at`, `updated_at`) VALUES
(88, 'nguyen5', 'Top', 23, '2021-01-04 06:44:15', '2021-01-05 03:19:25'),
(86, 'nguyen3', 'Top', 23, '2021-01-04 06:44:03', '2021-01-05 03:19:25'),
(87, 'nguyen4', 'Top', 23, '2021-01-04 06:44:08', '2021-01-05 03:19:25'),
(85, 'nguyen2', 'Top', 23, '2021-01-04 06:43:55', '2021-01-05 03:19:25'),
(84, 'nguyen1', 'Top', 23, '2021-01-04 06:43:49', '2021-01-05 03:19:25'),
(83, 'tuan3', 'Top', 22, '2021-01-04 06:43:36', '2021-01-05 03:19:25'),
(82, 'thanh3', 'Top', 21, '2021-01-04 06:43:20', '2021-01-05 03:19:25'),
(79, 'tuan2', 'Top', 22, '2021-01-04 06:42:13', '2021-01-05 03:19:25'),
(80, 'tuan4', 'Top', 22, '2021-01-04 06:42:24', '2021-01-05 03:19:25'),
(81, 'tuan5', 'Top', 22, '2021-01-04 06:42:29', '2021-01-05 03:19:25'),
(76, 'thanh4', 'Top', 21, '2021-01-04 06:41:41', '2021-01-05 03:19:25'),
(77, 'thanh5', 'Top', 21, '2021-01-04 06:41:49', '2021-01-05 03:19:25'),
(78, 'tuan1', 'Top', 22, '2021-01-04 06:42:02', '2021-01-05 03:19:25'),
(75, 'thanh2', 'Top', 21, '2021-01-04 06:41:22', '2021-01-05 03:19:25'),
(74, 'thanh1', 'Top', 21, '2021-01-04 06:41:05', '2021-01-05 03:19:25'),
(64, 'chau', 'Top', 24, '2021-01-04 06:39:50', '2021-01-05 03:19:25'),
(65, 'chau1', 'Top', 24, '2021-01-04 06:39:59', '2021-01-05 03:19:25'),
(66, 'chau2', 'Top', 24, '2021-01-04 06:40:04', '2021-01-05 03:19:25'),
(67, 'chau3', 'Top', 24, '2021-01-04 06:40:09', '2021-01-05 03:19:25'),
(68, 'chau4', 'Top', 24, '2021-01-04 06:40:13', '2021-01-05 03:19:25'),
(90, 'trung1', 'Top', 20, '2021-01-05 03:14:01', '2021-01-05 03:19:25'),
(70, 'trung2', 'Top', 20, '2021-01-04 06:40:37', '2021-01-05 03:19:25'),
(71, 'trung3', 'Top', 20, '2021-01-04 06:40:43', '2021-01-05 03:19:25'),
(96, 'trung5', 'Top', 20, '2021-01-05 03:41:09', '2021-01-05 03:41:09'),
(94, 'trung4', 'Top', 20, '2021-01-05 03:36:07', '2021-01-05 03:36:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `Username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quyen` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `Username`, `email`, `password`, `quyen`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'p1280622', 'tranvanchau62015@gmail.com', '$2y$10$/ubvY.9J7QLOQeBPj4QO4.tXV8d7Ul1TkRgsq6WJU6RW1qbq.5k.a', 1, 'Bfbd4IbXwAQAaiUoTzdwJyyjjHPeyeowlLssEbr2fv9A5JVrgxlhgWjOg8xP', '2020-12-04 09:31:47', '2020-12-04 09:31:47'),
(2, 'p1153947', 'tranvanhoang123@gmail.com', '$2y$10$vL.6lVGfUkpAmOdSRRQjrOhLAtg6H19MkDxGrpThaOtCmB.bjCAnW', 1, 'mCWdaMlH1uiupg8UpmQxiynhhdPvByhYWcGKDaerTHXymS9unsAmuYYTlCEE', '2020-12-21 02:37:52', '2020-12-21 02:37:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
