-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2020 at 12:36 AM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ferme`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `nom`, `created_at`, `updated_at`) VALUES
(4, 'Fruits', NULL, NULL),
(5, 'cosmitiques', NULL, NULL),
(6, 'vegetables', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `commandes`
--

CREATE TABLE `commandes` (
  `id` int(10) NOT NULL,
  `nom` varchar(191) NOT NULL,
  `adress` varchar(191) NOT NULL,
  `panier` longtext NOT NULL,
  `payement_id` varchar(191) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `commandes`
--

INSERT INTO `commandes` (`id`, `nom`, `adress`, `panier`, `payement_id`, `date`) VALUES
(1, 'abdelhak sifi', 'meftah blida', 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:1:{i:2;a:6:{s:3:\"qty\";i:1;s:10:\"product_id\";s:1:\"2\";s:12:\"product_name\";s:6:\"tomate\";s:13:\"product_price\";i:200;s:13:\"product_image\";s:24:\"product-5_1597163443.jpg\";s:4:\"item\";O:8:\"stdClass\":8:{s:2:\"id\";i:2;s:11:\"nom_produit\";s:6:\"tomate\";s:4:\"prix\";i:200;s:9:\"categorie\";s:10:\"vegetables\";s:13:\"produit_image\";s:24:\"product-5_1597163443.jpg\";s:6:\"status\";s:2:\"on\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}}}s:14:\"total_quantity\";i:1;s:11:\"total_price\";i:200;}', 'ch_1HIynDB7oga629UELOaidGJa', '2020-08-22 16:02:54'),
(2, 'hafid sifi', 'trakiya meftah blida', 'O:8:\"App\\Cart\":3:{s:5:\"items\";a:2:{i:7;a:6:{s:3:\"qty\";i:1;s:10:\"product_id\";s:1:\"7\";s:12:\"product_name\";s:3:\"jus\";s:13:\"product_price\";i:200;s:13:\"product_image\";s:24:\"product-8_1597670777.jpg\";s:4:\"item\";O:8:\"stdClass\":8:{s:2:\"id\";i:7;s:11:\"nom_produit\";s:3:\"jus\";s:4:\"prix\";i:200;s:9:\"categorie\";s:12:\"alimentaires\";s:13:\"produit_image\";s:24:\"product-8_1597670777.jpg\";s:6:\"status\";s:2:\"on\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}}i:12;a:6:{s:3:\"qty\";i:1;s:10:\"product_id\";s:2:\"12\";s:12:\"product_name\";s:6:\"orange\";s:13:\"product_price\";i:250;s:13:\"product_image\";s:21:\"orange_1598097396.jpg\";s:4:\"item\";O:8:\"stdClass\":8:{s:2:\"id\";i:12;s:11:\"nom_produit\";s:6:\"orange\";s:4:\"prix\";i:250;s:9:\"categorie\";s:6:\"Fruits\";s:13:\"produit_image\";s:21:\"orange_1598097396.jpg\";s:6:\"status\";s:2:\"on\";s:10:\"created_at\";N;s:10:\"updated_at\";N;}}}s:14:\"total_quantity\";i:2;s:11:\"total_price\";i:450;}', 'ch_1HIzjGB7oga629UEXPP7jzTy', '2020-08-22 16:38:07');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_09_171133_create_categories_table', 1),
(8, '2020_08_09_181905_create_produits_table', 2),
(9, '2020_08_10_182537_create_sliders_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produits`
--

CREATE TABLE `produits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_produit` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prix` int(11) NOT NULL,
  `categorie` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `produit_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `produits`
--

INSERT INTO `produits` (`id`, `nom_produit`, `prix`, `categorie`, `produit_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Fraise', 150, 'Fruits', 'category-2_1597669443.jpg', 'off', NULL, NULL),
(2, 'tomate', 200, 'vegetables', 'product-5_1597163443.jpg', 'on', NULL, NULL),
(4, 'parfum', 105, 'cosmitiques', '513269_swatch_1597621568.webp', 'on', NULL, NULL),
(5, 'carote', 140, 'vegetables', 'product-7_1597171223.jpg', 'on', NULL, NULL),
(7, 'jus', 200, 'alimentaire', 'product-8_1597670777.jpg', 'on', NULL, NULL),
(9, 'maquiage', 2000, 'cosmitiques', 'maquiage_1597253858.jpg', 'on', NULL, NULL),
(11, 'chocolats', 400, 'alimentaire', 'Chocolate_(blue_background)_1597606952.jpg', 'on', NULL, NULL),
(12, 'orange', 250, 'Fruits', 'orange_1598097396.jpg', 'on', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `description_one` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description_two` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `description_one`, `description_two`, `slider_image`, `status`, `created_at`, `updated_at`) VALUES
(3, 'We serve Fresh Vegestables & Fruits', 'We deliver organic vegetables & fruits', 'category-1_1597671347.jpg', 'on', NULL, NULL),
(4, '100% Fresh & Organic Foods', 'We deliver organic vegetables & fruits', 'bg_2_1597166388.jpg', 'on', NULL, NULL),
(6, 'Welcome to Our World, We Glad to see you here!', 'Here You can shop as you want, be happy with us...', 'image_5_1597671830.jpg', 'on', NULL, NULL),
(7, 'Welcome to our store', 'We will serve you 24/24 & 7/7', 'about_1597675423.jpg', 'on', NULL, NULL),
(8, 'dsss', 'sssss', 'category-4_1597681935.jpg', 'on', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `commandes`
--
ALTER TABLE `commandes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `produits`
--
ALTER TABLE `produits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `commandes`
--
ALTER TABLE `commandes`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `produits`
--
ALTER TABLE `produits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
