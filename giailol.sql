-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 21, 2020 lúc 10:28 AM
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
-- Cấu trúc bảng cho bảng `dois`
--

DROP TABLE IF EXISTS `dois`;
CREATE TABLE IF NOT EXISTS `dois` (
  `MaDoi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `TenDoi` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SLTV` int(11) NOT NULL,
  `Diem` int(11) NOT NULL,
  `TranThang` int(11) NOT NULL,
  `TranThua` int(11) NOT NULL,
  `MaGD` int(10) UNSIGNED NOT NULL,
  `img` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`MaDoi`),
  KEY `dois_magd_foreign` (`MaGD`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `dois`
--

INSERT INTO `dois` (`MaDoi`, `TenDoi`, `SLTV`, `Diem`, `TranThang`, `TranThua`, `MaGD`, `img`, `created_at`, `updated_at`) VALUES
(1, 'Anh không ngán ai', 5, 0, 0, 0, 11, 'anh_doi_tuyen_1607423200.jpg', '2020-12-08 03:26:40', '2020-12-08 03:26:40'),
(2, 'Không đối thủ', 5, 0, 0, 0, 11, 'giaidau1_1607434993.jpg', '2020-12-08 06:43:13', '2020-12-08 06:43:13'),
(3, 'Chim sẻ đi nắng', 5, 0, 0, 0, 1, 'bó hoa tình yêu_1607437254.jpg', '2020-12-08 07:20:54', '2020-12-08 07:20:54'),
(4, 'Con chim non', 4, 0, 0, 0, 1, 'giaidau2_1607437304.jpg', '2020-12-08 07:21:44', '2020-12-08 07:21:44'),
(6, 'giangnam', 5, 0, 0, 0, 11, 'anh_doi_tuyen.jpg', '2020-12-21 02:15:13', '2020-12-21 02:15:13'),
(7, 'Con chim non', 5, 0, 0, 0, 11, 'anh_doi_tuyen.jpg', '2020-12-21 02:15:22', '2020-12-21 02:15:22'),
(9, 'Anh không ngán ai', 5, 0, 0, 0, 11, 'anh_doi_tuyen.jpg', '2020-12-21 02:16:00', '2020-12-21 02:16:00');

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
(11, 'hoi tuyen phu dong', 5, '2020-12-11 00:49:00', '2020-12-13 00:49:00', 60, 1, '2020-12-07 08:34:20', '2020-12-07 10:49:04', 'giaidau1_1607363344.jpg'),
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
  `KQ1` int(11) NOT NULL,
  `KQ2` int(11) NOT NULL,
  `ThoiGian` datetime NOT NULL,
  `MaGD` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`MaLTD`),
  KEY `lichthidaus_magd_foreign` (`MaGD`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(10, '2020_12_21_085939_create_lichthidaus_table', 6);

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
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `thanhviens`
--

INSERT INTO `thanhviens` (`MaTV`, `TenTV`, `ViTri`, `MaDoi`, `created_at`, `updated_at`) VALUES
(18, 'Hoàng', 'Top', 1, '2020-12-21 01:47:02', '2020-12-21 03:18:07'),
(6, 'anh thanh nien', 'Mid', 1, '2020-12-10 20:59:29', '2020-12-21 03:18:07'),
(4, 'trung tran', 'ADC', 1, '2020-12-10 09:13:23', '2020-12-21 03:18:07'),
(7, 'trung thanh', 'Top', 2, '2020-12-11 00:20:31', '2020-12-21 03:18:07'),
(14, 'chau', 'Top', 1, '2020-12-21 01:25:22', '2020-12-21 03:18:07'),
(8, 'Hòa Thanh', 'Jungle', 2, '2020-12-11 00:20:46', '2020-12-21 03:18:07'),
(9, 'Sát thủ số 1', 'Mid', 2, '2020-12-11 00:20:54', '2020-12-21 03:18:07'),
(13, 'chau cho dien', 'Support', 2, '2020-12-17 02:37:42', '2020-12-21 03:18:07'),
(21, 'chau', 'Top', 6, '2020-12-21 03:17:40', '2020-12-21 03:18:07'),
(17, 'chau cho', 'Top', 2, '2020-12-21 01:26:03', '2020-12-21 03:18:07'),
(19, 'hoang anh', 'Top', 6, '2020-12-21 02:29:11', '2020-12-21 03:18:07'),
(20, 'trung', 'Mid', 6, '2020-12-21 02:31:30', '2020-12-21 03:18:07');

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
(1, 'p1280622', 'tranvanchau62015@gmail.com', '$2y$10$/ubvY.9J7QLOQeBPj4QO4.tXV8d7Ul1TkRgsq6WJU6RW1qbq.5k.a', 1, 'E4icWqvr1Cx2s3V42L7pvsHfIlEtYa7y8DCrEecjB4kIkFp78YqgicT2JhbN', '2020-12-04 09:31:47', '2020-12-04 09:31:47'),
(2, 'p1153947', 'tranvanhoang123@gmail.com', '$2y$10$vL.6lVGfUkpAmOdSRRQjrOhLAtg6H19MkDxGrpThaOtCmB.bjCAnW', 1, 'mCWdaMlH1uiupg8UpmQxiynhhdPvByhYWcGKDaerTHXymS9unsAmuYYTlCEE', '2020-12-21 02:37:52', '2020-12-21 02:37:52');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
