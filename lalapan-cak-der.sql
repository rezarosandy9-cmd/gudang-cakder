-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 11 Mar 2026 pada 07.13
-- Versi server: 8.0.30
-- Versi PHP: 8.3.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lalapan-cak-der`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE `items` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `stock` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `name`, `category`, `location`, `unit`, `stock`, `created_at`, `updated_at`) VALUES
(1, 'AYAM', 'AYAM', 'FREEZER', 'EKOR', 0, NULL, NULL),
(2, 'BEBEK', 'AYAM', 'FREEZER', 'EKOR', 0, NULL, NULL),
(3, 'BURUNG DARA', 'AYAM', 'FREEZER', 'EKOR', 0, NULL, NULL),
(4, 'AYAM KAMPUNG', 'AYAM', 'FREEZER', 'EKOR', 0, NULL, NULL),
(5, 'LELE', 'IKAN', 'FREEZER', 'EKOR', 0, NULL, NULL),
(6, 'GURAMI', 'IKAN', 'FREEZER', 'EKOR', 0, NULL, NULL),
(7, 'MUJAIR', 'IKAN', 'FREEZER', 'EKOR', 0, NULL, NULL),
(8, 'KAKAP PUTIH', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(9, 'KAKAP MERAH', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(10, 'KERAPU', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(11, 'DORANG', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(12, 'PATIN', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(13, 'BARONANG', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(14, 'KUWE', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(15, 'AYAM AYAM', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(16, 'KACI KACI', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(17, 'BARAKUDA', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(18, 'EKOR KUNING', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(19, 'KERANG HIJAU', 'SEAFOOD', 'GUDANG', 'KG', 0, NULL, NULL),
(20, 'KERANG DARA', 'SEAFOOD', 'GUDANG', 'KG', 1, NULL, '2026-02-27 06:02:52'),
(21, 'KERANG BAMBU', 'SEAFOOD', 'GUDANG', 'KG', 0, NULL, NULL),
(22, 'KERANG TAHU', 'SEAFOOD', 'GUDANG', 'KG', 0, NULL, NULL),
(23, 'KERANG SIMPING', 'SEAFOOD', 'GUDANG', 'KG', 0, NULL, NULL),
(24, 'CUMI CUMI', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(25, 'UDANG', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(26, 'KEPITING KECIL', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(27, 'KEPITING BESAR', 'SEAFOOD', 'FREEZER', 'KG', 0, NULL, NULL),
(28, 'KOBIS', 'SAYUR', 'DAPUR', 'KG', 0, NULL, NULL),
(29, 'TERONG', 'SAYUR', 'DAPUR', 'KG', 0, NULL, NULL),
(30, 'TIMUN', 'SAYUR', 'DAPUR', 'KG', 0, NULL, NULL),
(31, 'TAHU', 'SAYUR', 'GUDANG', 'PCS', 0, NULL, NULL),
(32, 'TEMPE', 'SAYUR', 'GUDANG', 'PCS', 0, NULL, NULL),
(33, 'KANGKUNG', 'SAYUR', 'DAPUR', 'IKAT', 0, NULL, NULL),
(34, 'TAOGE', 'SAYUR', 'DAPUR', 'KG', 0, NULL, NULL),
(35, 'GENJER', 'SAYUR', 'DAPUR', 'IKAT', 0, NULL, NULL),
(36, 'BABY BUNCIS', 'SAYUR', 'DAPUR', 'KG', 0, NULL, NULL),
(37, 'PAKCOY', 'SAYUR', 'DAPUR', 'KG', 0, NULL, NULL),
(38, 'WORTEL', 'SAYUR', 'DAPUR', 'KG', 0, NULL, NULL),
(39, 'CUMI ASIN', 'BUMBU', 'GUDANG', 'KG', 0, NULL, NULL),
(40, 'TELUR ASIN', 'BUMBU', 'GUDANG', 'BUTIR', 0, NULL, NULL),
(41, 'LOMBOK KECIL', 'BUMBU', 'DAPUR', 'KG', 0, NULL, NULL),
(42, 'LOMBOK LALAP', 'BUMBU', 'DAPUR', 'KG', 0, NULL, NULL),
(43, 'BAWANG MERAH', 'BUMBU', 'DAPUR', 'KG', 2, NULL, '2026-02-27 06:12:16'),
(44, 'BAWANG PUTIH', 'BUMBU', 'DAPUR', 'KG', 0, NULL, NULL),
(45, 'KRITING IJO', 'BUMBU', 'DAPUR', 'KG', 0, NULL, NULL),
(46, 'KRITING MERAH', 'BUMBU', 'DAPUR', 'KG', 0, NULL, NULL),
(47, 'TOMAT', 'BUMBU', 'DAPUR', 'KG', 0, NULL, NULL),
(48, 'GULA', 'BUMBU', 'GUDANG', 'KG', 0, NULL, NULL),
(49, 'GARAM KAPAL', 'BUMBU', 'GUDANG', 'PACK', 0, NULL, NULL),
(50, 'MEGGLE SACHET', 'BUMBU', 'GUDANG', 'SACHET', 0, NULL, NULL),
(51, 'ROYCO', 'BUMBU', 'GUDANG', 'PACK', 0, NULL, NULL),
(52, 'MICIN', 'BUMBU', 'GUDANG', 'PACK', 0, NULL, NULL),
(53, 'MENTE', 'BUMBU', 'GUDANG', 'KG', 0, NULL, NULL),
(54, 'WIJEN', 'BUMBU', 'GUDANG', 'KG', 0, NULL, NULL),
(55, 'TAUCO', 'BUMBU', 'GUDANG', 'BOTOL', 0, NULL, NULL),
(56, 'MINYAK WIJEN', 'BUMBU', 'GUDANG', 'BOTOL', 0, NULL, NULL),
(57, 'RAJA RASA', 'BUMBU', 'GUDANG', 'BOTOL', 0, NULL, NULL),
(58, 'KECAP IKAN', 'BUMBU', 'GUDANG', 'BOTOL', 0, NULL, NULL),
(59, 'TIRAM KALENG', 'BUMBU', 'GUDANG', 'KALENG', 0, NULL, NULL),
(60, 'SAOS INGGRIS', 'BUMBU', 'GUDANG', 'BOTOL', 0, NULL, NULL),
(61, 'TISSUE MEJA', 'LAINNYA', 'GUDANG', 'PACK', 0, NULL, NULL),
(62, 'DAUN PISANG', 'LAINNYA', 'GUDANG', 'IKAT', 0, NULL, NULL),
(63, 'KERTAS PRINT BESAR', 'LAINNYA', 'GUDANG', 'ROLL', 0, NULL, NULL),
(64, 'KERTAS PRINT KECIL', 'LAINNYA', 'GUDANG', 'ROLL', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_05_022343_create_items_table', 2),
(5, '2026_02_05_022354_create_transactions_table', 2),
(6, '2026_02_05_051024_rename_email_to_username_in_users_table', 3),
(7, '2026_02_05_051821_add_location_to_items_table', 4),
(8, '2026_02_12_064931_create_transaction_archives_table', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('F6kQzo1kmm47uvrO2jJuySkuX8baDA06gDJJHopH', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicUduWUx0dnhpUFVpWVp5VnpLUDBBR2M5ZW8yVGNPcU5mYmdXbEVYSCI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9tYW5hZ2U/dHlwZT1vdXQiO3M6NToicm91dGUiO3M6NjoibWFuYWdlIjt9czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mzt9', 1772422982),
('txbTghfWR7Ze6yf5Pojs505KGzLFfryl2OrpqA02', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/145.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiaEtZNFpzdFpGamVSOG96aVhpSHU3dGQ1OUlCTVE2cWpXUFZ0RkEyViI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjI6e3M6MzoidXJsIjtzOjI4OiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvcmVwb3J0IjtzOjU6InJvdXRlIjtzOjY6InJlcG9ydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjM7fQ==', 1773210480);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `type` enum('in','out') COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `item_id`, `type`, `quantity`, `date`, `created_at`, `updated_at`) VALUES
(1, 8, 'in', 15, '2026-02-12', '2026-02-11 17:46:17', '2026-02-11 17:46:17'),
(2, 8, 'out', 10, '2026-02-12', '2026-02-11 17:46:53', '2026-02-11 17:46:53'),
(3, 8, 'in', 20, '2026-02-12', '2026-02-11 17:47:18', '2026-02-11 17:47:18'),
(4, 11, 'in', 20, '2026-02-12', '2026-02-11 18:00:30', '2026-02-11 18:00:30'),
(5, 11, 'out', 10, '2026-02-12', '2026-02-11 18:00:51', '2026-02-11 18:00:51'),
(6, 13, 'in', 20, '2026-02-23', '2026-02-22 18:12:30', '2026-02-22 18:12:30'),
(7, 13, 'out', 15, '2026-02-23', '2026-02-22 18:12:58', '2026-02-22 18:12:58'),
(8, 8, 'in', 15, '2026-02-25', '2026-02-24 22:28:57', '2026-02-24 22:28:57'),
(9, 3, 'in', 5, '2026-02-27', '2026-02-27 03:47:58', '2026-02-27 03:47:58'),
(10, 20, 'in', 2, '2026-02-27', '2026-02-27 06:02:35', '2026-02-27 06:02:35'),
(11, 20, 'out', 1, '2026-02-27', '2026-02-27 06:02:52', '2026-02-27 06:02:52'),
(12, 43, 'in', 4, '2026-02-27', '2026-02-27 06:11:55', '2026-02-27 06:11:55'),
(13, 43, 'out', 2, '2026-02-27', '2026-02-27 06:12:16', '2026-02-27 06:12:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaction_archives`
--

CREATE TABLE `transaction_archives` (
  `id` bigint UNSIGNED NOT NULL,
  `item_id` bigint UNSIGNED NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL,
  `date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Cak Der', 'cakder', NULL, '$2y$12$zgolvPmOeAOh9Br1JxX6OeBOtRSnyY2SFGjBstBaA1CYFoYIAHE8m', NULL, '2026-02-04 22:12:33', '2026-02-19 20:07:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indeks untuk tabel `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_item_id_foreign` (`item_id`);

--
-- Indeks untuk tabel `transaction_archives`
--
ALTER TABLE `transaction_archives`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_archives_item_id_foreign` (`item_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `transaction_archives`
--
ALTER TABLE `transaction_archives`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaction_archives`
--
ALTER TABLE `transaction_archives`
  ADD CONSTRAINT `transaction_archives_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
