-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2019 at 05:13 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `name`, `brand`, `type`, `image`) VALUES
('KD001', 'Cangkul', 'Kubota', 'Alat Pertanian', '');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL,
  `isactive` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'y',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id`, `parent`, `name`, `description`, `link`, `icon`, `order`, `isactive`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 0, 'Master Data', 'Master Data', '', 'fa fa-folder', 1, 'y', 0, 0, NULL, NULL),
(2, 0, 'User Management', 'Management User', 'user', 'fa fa-folder', 1, 'y', 0, 0, NULL, NULL),
(3, 1, 'Menu', 'Management Menu', 'menu', 'fa fa-circle-o', 1, 'y', 0, 0, NULL, NULL),
(17, 0, 'Role', '', 'role', '', 0, 'y', 0, 0, NULL, NULL),
(18, 0, 'Barang', '', 'barang', '', 0, 'y', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isactive` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'y',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `name`, `description`, `isactive`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'administrator', 'y', 0, 0, NULL, NULL),
(2, 'staf', '', 'y', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_menu`
--

CREATE TABLE `role_has_menu` (
  `id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `create` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'n',
  `read` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'n',
  `update` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'n',
  `delete` char(1) COLLATE utf8mb4_unicode_ci DEFAULT 'n',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `role_has_menu`
--

INSERT INTO `role_has_menu` (`id`, `role_id`, `menu_id`, `create`, `read`, `update`, `delete`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(31, 1, 1, 'n', 'n', 'n', 'n', 0, 0, NULL, NULL),
(32, 1, 2, 'n', 'n', 'n', 'n', 0, 0, NULL, NULL),
(33, 1, 3, 'n', 'y', 'n', 'n', 0, 0, NULL, NULL),
(34, 2, 1, 'n', 'n', 'n', 'n', 0, 0, NULL, NULL),
(35, 2, 2, 'y', 'n', 'n', 'n', 0, 0, NULL, NULL),
(36, 2, 3, 'n', 'y', 'n', 'n', 0, 0, NULL, NULL),
(37, 2, 17, 'y', 'n', 'n', 'n', 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_id` int(11) UNSIGNED DEFAULT NULL,
  `isactive` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'y',
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci ROW_FORMAT=COMPACT;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `password`, `role_id`, `isactive`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 'administrator', 'admin', 'c7ad44cbad762a5da0a452f9e854fdc1e0e7a52a38015f23f3eab1d80b931dd472634dfac71cd34ebc35d16ab7fb8a90c81f975113d6c7538dc69dd8de9077ec', 1, 'y', 0, 0, NULL, NULL),
(2, 'sonif', 'sonif', 'd0b17957062e6691f7079e085eaabb01234cc22bda23e7326e1a335423d6521dbe342dea706ec57ada1eca113833e5589b6ab54a3e3cdf376b4afd1494b9b820', 2, 'y', 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `role_has_menu`
--
ALTER TABLE `role_has_menu`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `rolehasmenu_role_id_foreign` (`role_id`) USING BTREE,
  ADD KEY `rolehasmenu_menu_id_foreign` (`menu_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `role_id` (`role_id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `role_has_menu`
--
ALTER TABLE `role_has_menu`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_has_menu`
--
ALTER TABLE `role_has_menu`
  ADD CONSTRAINT `role_has_menu_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`),
  ADD CONSTRAINT `role_has_menu_ibfk_2` FOREIGN KEY (`menu_id`) REFERENCES `menu` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
