-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Feb 2021 pada 05.17
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siadik_laravel8`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(25, '2014_10_12_000000_create_users_table', 1),
(26, '2014_10_12_100000_create_password_resets_table', 1),
(27, '2019_08_19_000000_create_failed_jobs_table', 1),
(28, '2020_12_26_071824_create_siswas_table', 1),
(29, '2021_01_23_065221_create_pegawai_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE `pegawai` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`id`, `name`, `user_id`, `agama`, `jenis_kelamin`, `alamat`, `avatar`, `nohp`, `created_at`, `updated_at`) VALUES
(1, 'userGuru', 3, 'Buddha', 'wanita', 'kp. durian 13b', '1909060402.jpg', '+1 (323) 814-1730', '2021-01-24 23:50:48', '2021-01-25 00:35:28'),
(2, 'Onie Moen', NULL, 'Hindu', 'pria', '435 Cecelia Brooks Suite 245\nLake Jakaylaborough, RI 20330', 'baseline_person_black_48dp.png', '978.589.7462', '2021-01-25 00:42:39', '2021-01-25 00:42:39'),
(3, 'Renee Klocko', NULL, 'katolik', 'pria', '5680 Hessel Pines Suite 140\nWest Lazaro, AR 24324-5505', 'baseline_person_black_48dp.png', '+1-579-922-8569', '2021-01-25 00:42:39', '2021-01-25 00:42:39'),
(4, 'Shad Armstrong', NULL, 'Hindu', 'pria', '72529 Schmeler Place\nRobelberg, ND 64274-9216', 'baseline_person_black_48dp.png', '+1 (507) 471-5822', '2021-01-25 00:42:39', '2021-01-25 00:42:39'),
(5, 'Dr. Gabriel Kozey', NULL, 'Kristen', 'wanita', '80005 Kuphal Causeway\nPort Kayliehaven, WV 91826-8657', 'baseline_person_black_48dp.png', '(971) 357-0181', '2021-01-25 00:42:39', '2021-01-25 00:42:39'),
(6, 'Katlynn Paucek', NULL, 'Budha', 'pria', '47698 Bryce Islands\nAnastasiamouth, NC 12862-6951', 'baseline_person_black_48dp.png', '+1 (669) 214-6335', '2021-01-25 00:42:39', '2021-01-25 00:42:39'),
(7, 'Prof. Troy Gottlieb', NULL, 'katolik', 'wanita', '5335 Ariane Point Suite 827\nMelisaville, NV 65013-4544', 'baseline_person_black_48dp.png', '827.656.5025', '2021-01-25 00:42:39', '2021-01-25 00:42:39'),
(8, 'Merle Schowalter', NULL, 'Islam', 'pria', '55300 Mireille Brook Apt. 964\nWest Stacy, KS 64107-5187', 'baseline_person_black_48dp.png', '+1-347-537-5719', '2021-01-25 00:42:39', '2021-01-25 00:42:39'),
(9, 'Kaia Walker', NULL, 'Hindu', 'wanita', '7321 Buckridge Cliffs\nKasandrafort, KS 80362-3200', 'baseline_person_black_48dp.png', '+1-846-245-1857', '2021-01-25 00:42:39', '2021-01-25 00:42:39'),
(10, 'Davon Mayert I', NULL, 'Hindu', 'wanita', '960 Schaefer Parkway\nPfeffermouth, RI 24980', 'baseline_person_black_48dp.png', '505.847.3852', '2021-01-25 00:42:39', '2021-01-25 00:42:39'),
(11, 'Ayden Mosciski', NULL, 'Kristen', 'wanita', '15461 Ezequiel Roads Suite 357\nLake Darius, IA 06646-1946', 'baseline_person_black_48dp.png', '(249) 893-5905', '2021-01-25 00:42:39', '2021-01-25 00:42:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswas`
--

CREATE TABLE `siswas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nohp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `siswas`
--

INSERT INTO `siswas` (`id`, `name`, `user_id`, `jenis_kelamin`, `agama`, `alamat`, `avatar`, `nohp`, `created_at`, `updated_at`) VALUES
(1, 'UserGuru', 1, 'wanita', 'Katolik', 'kp. durian 12b', '1355697653.jpg', '+1 (323) 814-1776', '2021-01-23 00:20:25', '2021-01-25 00:31:45'),
(2, 'Bertrand Mraz', NULL, 'pria', 'katolik', '23292 Greenholt Stream Suite 976\nLake Violetstad, HI 66224-8802', 'baseline_person_black_48dp.png', '1-347-263-3025', '2021-01-23 00:20:39', '2021-01-23 00:20:39'),
(3, 'Prof. Crawford Kuphal IV', NULL, 'pria', 'Hindu', '670 Emard Crescent\nStiedemannville, DE 21715', 'baseline_person_black_48dp.png', '(209) 781-3521', '2021-01-23 00:21:35', '2021-01-23 00:21:35'),
(4, 'Mekhi Bailey I', NULL, 'wanita', 'Kristen', '458 Noah Avenue Apt. 166\nWolfstad, CT 81991', 'baseline_person_black_48dp.png', '+15193905931', '2021-01-23 00:21:35', '2021-01-23 00:21:35'),
(5, 'Prof. Ronaldo Smith PhD', NULL, 'wanita', 'Budha', '862 Adele Curve Suite 138\nEast Fletcher, ND 94894', 'baseline_person_black_48dp.png', '552-472-4159', '2021-01-23 00:21:35', '2021-01-23 00:21:35'),
(6, 'Ricky Paucek', NULL, 'wanita', 'Islam', '74203 Jed Tunnel Suite 054\nBernhardbury, GA 31019', 'baseline_person_black_48dp.png', '(368) 737-9261', '2021-01-23 00:21:35', '2021-01-23 00:21:35'),
(7, 'Miss Brianne Streich', NULL, 'wanita', 'katolik', '62183 Alessandra Cliff\nGildaview, NM 72731-6492', 'baseline_person_black_48dp.png', '1-578-970-4197', '2021-01-23 00:21:35', '2021-01-23 00:21:35'),
(8, 'Kamren Durgan Sr.', NULL, 'wanita', 'Budha', '48662 Ledner Garden Apt. 485\nNew Efrainburgh, OR 62314', 'baseline_person_black_48dp.png', '1-804-725-8371', '2021-01-23 00:21:35', '2021-01-23 00:21:35'),
(9, 'Felicita Gutkowski', NULL, 'pria', 'Islam', '605 Rippin Harbor\r\nRocioside, AK 29122', 'baseline_person_black_48dp.png', '820-569-7551', '2021-01-23 00:21:35', '2021-01-23 00:43:42'),
(10, 'Allie Nienow', NULL, 'pria', 'Islam', '140 Nader Streets Apt. 702\nWest Kayli, DE 77722-8094', 'baseline_person_black_48dp.png', '+1-928-766-0614', '2021-01-23 00:21:35', '2021-01-23 00:21:35'),
(11, 'Ada Corkery PhD', NULL, 'wanita', 'Hindu', '2033 Beahan Extension Suite 109\r\nGilesland, TX 21013-6340', 'baseline_person_black_48dp.png', '+17903225476', '2021-01-23 00:21:35', '2021-01-23 00:44:05'),
(12, 'Dr. Johnpaul Steuber', NULL, 'pria', 'Kristen', '809 Tito Corners\nWest Alphonso, MN 65773', 'baseline_person_black_48dp.png', '+1-227-363-1215', '2021-01-23 00:21:35', '2021-01-23 00:21:35'),
(13, 'userTest', 2, 'pria', 'Islam', 'kp. durian 23', '746344707.jpg', '1-205-496-4503', '2021-01-23 00:45:36', '2021-01-23 00:50:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin', 'admin@test.com', NULL, '$2y$10$pmf0jtFeEgmLmPg8.yRu/uzeUcURjlawxPaISmc8eoZvuLqg9qyAa', 'fK5cAYxAsyeAc1fXuZrm35CoE1rcdX9toGazez9gyH70E8EZ04sDOp4Q8WPX', '2021-01-23 00:12:29', '2021-01-23 00:12:29'),
(2, 'userTest', 'siswa', 'user@test.com', NULL, '$2y$10$iKqCkVeUce0QmmNbvUGCyeZPN1JeNNRPWnfAtLmaqxv/FrnEj4g8a', 'y7up9BsEr4gfJUsO5n9L8bMms3NJWO6HLuz8AxehpeEwS4guqsbzn66WVA0t', '2021-01-23 00:45:36', '2021-01-23 00:45:36'),
(3, 'userTestGuru', 'guru', 'guru@test.com', NULL, '$2y$10$stGzO5CjIbL2NaRYqhdsnO4rgbTf./Ae6hZxnQt/M2OOXKZlricOe', '4u7hZTElV5S3Q5daIGc24OrBmIyfwZQS6vUrONguBkR1oufJGfS3L582ffoL', '2021-01-24 23:50:48', '2021-01-24 23:50:48');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pegawai_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswas_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `siswas`
--
ALTER TABLE `siswas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pegawai`
--
ALTER TABLE `pegawai`
  ADD CONSTRAINT `pegawai_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswas`
--
ALTER TABLE `siswas`
  ADD CONSTRAINT `siswas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
