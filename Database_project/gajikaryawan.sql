-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2024 pada 15.02
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gajikaryawan`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absensi`
--

CREATE TABLE `absensi` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_karyawan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hadir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alfa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `absensi`
--

INSERT INTO `absensi` (`id`, `nama_karyawan`, `jabatan`, `bulan`, `tahun`, `hadir`, `izin`, `alfa`, `created_at`, `updated_at`) VALUES
(1, 'Mahendra', 'Admin', 'Januari', '2021', '31', '0', '0', '2024-01-08 10:08:00', '2024-01-08 10:08:00'),
(2, 'Hardianti Ramli', 'Manager', 'Januari', '2024', '31', '0', '0', '2024-01-08 13:11:13', '2024-01-08 13:11:13'),
(3, 'Hardianti Ramli', 'Manager', 'Februari', '2024', '25', '3', '1', '2024-01-09 01:01:04', '2024-01-09 01:01:04'),
(4, 'Dimas', 'Front-end Developer', 'Januari', '2024', '31', '0', '0', '2024-01-09 11:35:26', '2024-01-09 11:35:26');

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
-- Struktur dari tabel `gaji`
--

CREATE TABLE `gaji` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bulan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahun` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_hadir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_gaji` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `gaji`
--

INSERT INTO `gaji` (`id`, `nama`, `jabatan`, `bulan`, `tahun`, `total_hadir`, `total_gaji`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Hardianti Ramli', 'Manager', 'Januari', '2024', '31', '7750000', 'Di Setujui', '2024-01-09 00:01:40', '2024-01-09 00:18:37'),
(10, 'Hardianti Ramli', 'Manager', 'Januari', '2024', '31', '7750000', 'Di Tolak', '2024-01-09 01:09:10', '2024-01-09 01:41:33'),
(11, 'Hardianti Ramli', 'Manager', 'Februari', '2024', '29', '6150000', 'Di Setujui', '2024-01-09 01:09:17', '2024-01-09 01:41:36'),
(12, 'Hardianti Ramli', 'Manager', 'Januari', '2024', '31', '7750000', 'Di Tolak', '2024-01-09 06:58:03', '2024-01-09 11:36:17'),
(13, 'Dimas', 'Front-end Developer', 'Januari', '2024', '31', '6200000', 'Di Setujui', '2024-01-09 11:36:02', '2024-01-09 11:36:18'),
(14, 'Hardianti Ramli', 'Manager', 'Februari', '2024', '29', '6150000', 'Di Setujui', '2024-01-10 03:55:08', '2024-01-10 03:55:45'),
(15, 'Hardianti Ramli', 'Manager', 'Januari', '2024', '31', '7750000', 'Di Setujui', '2024-01-11 00:56:52', '2024-01-11 00:59:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nominal_gaji` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `nama_jabatan`, `nominal_gaji`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 150000, '2024-01-08 09:54:23', '2024-01-08 09:54:23'),
(2, 'Data Analyst', 200000, '2024-01-08 09:55:10', '2024-01-08 09:55:51'),
(3, 'Manager', 250000, '2024-01-08 09:56:02', '2024-01-08 09:56:02'),
(4, 'Front-end Developer', 200000, '2024-01-08 09:56:16', '2024-01-08 09:56:16'),
(5, 'Back-end Developer', 230000, '2024-01-08 09:56:39', '2024-01-08 09:56:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgl_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rekening` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`id`, `nama`, `tempat_lahir`, `tgl_lahir`, `alamat`, `jabatan`, `no_rekening`, `created_at`, `updated_at`) VALUES
(1, 'Mahendra', 'Blitar', '2003-11-05', 'Blitar', 'Admin', 'BRI-12947192', '2024-01-08 09:59:08', '2024-01-08 09:59:08'),
(2, 'Hardianti Ramli', 'Noge', '2003-12-15', 'Blitar', 'Manager', 'BRI-18256825', '2024-01-08 10:45:54', '2024-01-08 10:45:54'),
(3, 'Dimas', 'Blitar', '2001-04-01', 'Wlingi', 'Front-end Developer', 'BRI-12846729', '2024-01-09 11:34:25', '2024-01-09 11:34:25'),
(4, 'Farel Agia', 'Blitar', '2002-06-27', 'Blitar', 'Data Analyst', 'BRI-17265290', '2024-01-11 00:30:40', '2024-01-11 00:30:40'),
(5, 'Cheryl Rio', 'Blitar', '2002-09-09', 'Blitar', 'Data Analyst', 'BRI-12561428', '2024-01-11 00:31:21', '2024-01-11 00:31:21'),
(6, 'Bayu Samudra', 'Blitar', '2001-03-14', 'Blitar', 'Data Analyst', 'BRI-19257491', '2024-01-11 00:31:57', '2024-01-11 00:31:57'),
(8, 'Admin', 'Blitar', '2024-01-11', 'Blitar', 'Admin', 'BRI-12345678', '2024-01-11 13:38:21', '2024-01-11 13:38:21');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_01_08_152442_table_karyawan', 2),
(6, '2024_01_08_152530_table_jabatan', 2),
(7, '2024_01_08_152556_table_absensi', 2),
(8, '2024_01_08_152610_table_gaji', 2),
(9, '2024_01_08_154443_table_gaji', 3);

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
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'mahendraadmin', 'Mahendra', 'mahendra@gmail.com', NULL, '$2y$12$P81aciNib0Cnf6RYnaiBU.zjIpwxsSyUEQRY95RMG58wVke6U6jUK', 'Admin', NULL, '2024-01-08 10:03:06', '2024-01-08 10:03:06'),
(3, 'hardiantiramli', 'Hardianti Ramli', 'hardianti@gmail.com', NULL, '$2y$12$1bzVDHMFXoQ2/Ms7NlVG7.5y1D035GJsLPdeR4okTcc9klYxDu.t2', 'Biasa', NULL, '2024-01-08 10:46:20', '2024-01-08 10:46:20'),
(4, 'dimasadi', 'Dimas', 'dimas@gmail.com', '2024-01-09 11:35:06', '$2y$12$k7KsMP9iUBxX1ROVuVHaEukRrnx/Aa2oiB0lfECld88/phVKotlzm', 'Biasa', NULL, '2024-01-09 11:35:06', '2024-01-09 11:35:06'),
(6, 'admin123', 'Admin', 'admin@gmail.com', '2024-01-11 13:38:49', '$2y$12$UMFqjKjBSc9FuC4SIsD74uA2DizkEl9qcaBd/kevaIP72aGdMP/XW', 'Admin', NULL, '2024-01-11 13:38:49', '2024-01-11 13:38:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `absensi`
--
ALTER TABLE `absensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `gaji`
--
ALTER TABLE `gaji`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
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
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- AUTO_INCREMENT untuk tabel `absensi`
--
ALTER TABLE `absensi`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `gaji`
--
ALTER TABLE `gaji`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
