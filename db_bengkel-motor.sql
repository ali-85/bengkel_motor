-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2020 pada 09.03
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_bengkel-motor`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(8, '2020_02_21_061050_create_users_table', 1),
(9, '2020_03_01_031212_create_transactions_table', 1),
(10, '2020_03_01_031344_create_parts_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `parts`
--

CREATE TABLE `parts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `parts`
--

INSERT INTO `parts` (`id`, `created_at`, `updated_at`, `title`, `price`) VALUES
(1, '2020-03-01 04:16:13', '2020-03-01 04:16:13', 'Oli Spx', 45000),
(2, '2020-03-01 04:17:03', '2020-03-01 04:17:03', 'Oli Mpx', 55000),
(3, '2020-03-01 04:17:44', '2020-03-09 05:37:04', 'kampas rem', 26500),
(4, '2020-03-02 00:44:50', '2020-03-09 02:29:58', 'Soft Breaker', 80000),
(7, '2020-03-09 02:30:23', '2020-03-09 02:34:25', 'Lampu Belakang', 8000),
(8, '2020-03-09 05:37:29', '2020-03-09 05:37:29', 'Rantai', 65000),
(9, '2020-03-09 05:38:02', '2020-03-09 05:38:02', 'Kampas Kopling', 148000),
(10, '2020-03-09 05:38:58', '2020-03-09 05:38:58', 'Sokbreker Belakang', 180000),
(11, '2020-03-09 05:40:21', '2020-03-10 05:30:39', 'Lampu Sen Depan', 51000),
(12, '2020-03-09 05:40:55', '2020-03-09 05:40:55', 'Busi', 16000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `serial` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `part` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `created_at`, `updated_at`, `order_id`, `customer`, `serial`, `type`, `part`) VALUES
(6, '2020-03-08 15:19:36', '2020-03-08 15:19:36', '5e650d08a06e5', 'Nahdi', 'T 4643 GZ', 'Vario', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":1:{s:8:\"\0*\0items\";a:2:{i:0;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:4:\"part\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:7:\"id_part\";i:2;s:10:\"created_at\";s:19:\"2020-03-01 11:17:03\";s:10:\"updated_at\";s:19:\"2020-03-01 11:17:03\";s:5:\"title\";s:7:\"Oli Mpx\";s:5:\"price\";i:55000;}s:11:\"\0*\0original\";a:5:{s:7:\"id_part\";i:2;s:10:\"created_at\";s:19:\"2020-03-01 11:17:03\";s:10:\"updated_at\";s:19:\"2020-03-01 11:17:03\";s:5:\"title\";s:7:\"Oli Mpx\";s:5:\"price\";i:55000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:4:\"part\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:7:\"id_part\";i:4;s:10:\"created_at\";s:19:\"2020-03-02 07:44:50\";s:10:\"updated_at\";s:19:\"2020-03-02 07:44:50\";s:5:\"title\";s:12:\"Soft Breaker\";s:5:\"price\";i:80000;}s:11:\"\0*\0original\";a:5:{s:7:\"id_part\";i:4;s:10:\"created_at\";s:19:\"2020-03-02 07:44:50\";s:10:\"updated_at\";s:19:\"2020-03-02 07:44:50\";s:5:\"title\";s:12:\"Soft Breaker\";s:5:\"price\";i:80000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}'),
(7, '2020-03-10 02:08:15', '2020-03-10 05:31:10', '5e66f68f7b28d', 'Ayuni', 'T 3535 FD', 'Beat', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":1:{s:8:\"\0*\0items\";a:2:{i:0;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:5:\"title\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:1;s:10:\"created_at\";s:19:\"2020-03-01 11:16:13\";s:10:\"updated_at\";s:19:\"2020-03-01 11:16:13\";s:5:\"title\";s:7:\"Oli Spx\";s:5:\"price\";i:45000;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:1;s:10:\"created_at\";s:19:\"2020-03-01 11:16:13\";s:10:\"updated_at\";s:19:\"2020-03-01 11:16:13\";s:5:\"title\";s:7:\"Oli Spx\";s:5:\"price\";i:45000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:5:\"title\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:11;s:10:\"created_at\";s:19:\"2020-03-09 12:40:21\";s:10:\"updated_at\";s:19:\"2020-03-10 12:30:39\";s:5:\"title\";s:15:\"Lampu Sen Depan\";s:5:\"price\";i:51000;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:11;s:10:\"created_at\";s:19:\"2020-03-09 12:40:21\";s:10:\"updated_at\";s:19:\"2020-03-10 12:30:39\";s:5:\"title\";s:15:\"Lampu Sen Depan\";s:5:\"price\";i:51000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}'),
(10, '2020-03-10 07:31:51', '2020-03-10 07:31:51', '5e67426714f4c', 'Hani', 'T1234', 'Supra X', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":1:{s:8:\"\0*\0items\";a:2:{i:0;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:5:\"title\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:1;s:10:\"created_at\";s:19:\"2020-03-01 11:16:13\";s:10:\"updated_at\";s:19:\"2020-03-01 11:16:13\";s:5:\"title\";s:7:\"Oli Spx\";s:5:\"price\";i:45000;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:1;s:10:\"created_at\";s:19:\"2020-03-01 11:16:13\";s:10:\"updated_at\";s:19:\"2020-03-01 11:16:13\";s:5:\"title\";s:7:\"Oli Spx\";s:5:\"price\";i:45000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:5:\"title\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:3;s:10:\"created_at\";s:19:\"2020-03-01 11:17:44\";s:10:\"updated_at\";s:19:\"2020-03-09 12:37:04\";s:5:\"title\";s:10:\"kampas rem\";s:5:\"price\";i:26500;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:3;s:10:\"created_at\";s:19:\"2020-03-01 11:17:44\";s:10:\"updated_at\";s:19:\"2020-03-09 12:37:04\";s:5:\"title\";s:10:\"kampas rem\";s:5:\"price\";i:26500;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}'),
(11, '2020-03-10 07:44:14', '2020-03-10 07:44:14', '5e67454eb3b7e', 'Hani', 'T 3128', 'Beat', 'O:39:\"Illuminate\\Database\\Eloquent\\Collection\":1:{s:8:\"\0*\0items\";a:5:{i:0;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:5:\"title\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:2;s:10:\"created_at\";s:19:\"2020-03-01 11:17:03\";s:10:\"updated_at\";s:19:\"2020-03-01 11:17:03\";s:5:\"title\";s:7:\"Oli Mpx\";s:5:\"price\";i:55000;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:2;s:10:\"created_at\";s:19:\"2020-03-01 11:17:03\";s:10:\"updated_at\";s:19:\"2020-03-01 11:17:03\";s:5:\"title\";s:7:\"Oli Mpx\";s:5:\"price\";i:55000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:1;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:5:\"title\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:3;s:10:\"created_at\";s:19:\"2020-03-01 11:17:44\";s:10:\"updated_at\";s:19:\"2020-03-09 12:37:04\";s:5:\"title\";s:10:\"kampas rem\";s:5:\"price\";i:26500;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:3;s:10:\"created_at\";s:19:\"2020-03-01 11:17:44\";s:10:\"updated_at\";s:19:\"2020-03-09 12:37:04\";s:5:\"title\";s:10:\"kampas rem\";s:5:\"price\";i:26500;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:2;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:5:\"title\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2020-03-09 09:30:23\";s:10:\"updated_at\";s:19:\"2020-03-09 09:34:25\";s:5:\"title\";s:14:\"Lampu Belakang\";s:5:\"price\";i:8000;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:7;s:10:\"created_at\";s:19:\"2020-03-09 09:30:23\";s:10:\"updated_at\";s:19:\"2020-03-09 09:34:25\";s:5:\"title\";s:14:\"Lampu Belakang\";s:5:\"price\";i:8000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:3;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:5:\"title\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:8;s:10:\"created_at\";s:19:\"2020-03-09 12:37:29\";s:10:\"updated_at\";s:19:\"2020-03-09 12:37:29\";s:5:\"title\";s:6:\"Rantai\";s:5:\"price\";i:65000;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:8;s:10:\"created_at\";s:19:\"2020-03-09 12:37:29\";s:10:\"updated_at\";s:19:\"2020-03-09 12:37:29\";s:5:\"title\";s:6:\"Rantai\";s:5:\"price\";i:65000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}i:4;O:8:\"App\\Part\":26:{s:11:\"\0*\0fillable\";a:2:{i:0;s:5:\"title\";i:1;s:5:\"price\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:8:\"\0*\0table\";s:5:\"parts\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:5:{s:2:\"id\";i:12;s:10:\"created_at\";s:19:\"2020-03-09 12:40:55\";s:10:\"updated_at\";s:19:\"2020-03-09 12:40:55\";s:5:\"title\";s:4:\"Busi\";s:5:\"price\";i:16000;}s:11:\"\0*\0original\";a:5:{s:2:\"id\";i:12;s:10:\"created_at\";s:19:\"2020-03-09 12:40:55\";s:10:\"updated_at\";s:19:\"2020-03-09 12:40:55\";s:5:\"title\";s:4:\"Busi\";s:5:\"price\";i:16000;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:8:\"\0*\0dates\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:10:\"timestamps\";b:1;s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}}}}');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `trx`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `trx` (
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `created_at`, `updated_at`, `name`, `profile`, `username`, `password`, `role`) VALUES
(1, '2020-03-09 01:29:43', '2020-03-09 01:29:47', 'Ali Davit', '1583033147.jpg', 'admin', '$2y$12$ZLj/sLFS81yfurvdSoDmyuf60V8LO.zlgqwXwLvtD5T7zQBMUhLH6', 1),
(2, '2020-03-01 03:25:47', '2020-03-01 03:25:47', 'Ali Davit', '1583033147.jpg', 'alidavit', '$2y$10$7alBa8Sc7T.uJTkRAclNGeJoLPv4L5MFGWOrzdarWYI25vBleKg1q', 0),
(3, '2020-03-01 03:27:04', '2020-03-09 05:28:32', 'Ayuni Puji Lestari', '1583731712.jpg', 'ayuni', '$2y$10$0k6NtaPCh9vxPWiqiKTaU.5tbaUe072U/Uoh92FAt6SW2fQ3zSM6i', 0),
(4, '2020-03-10 07:08:41', '2020-03-10 07:08:41', 'Imas Hamidah', '1583824121.jpg', 'Imas', '$2y$10$wezwkPL9hePG.IIxuY/pKOQiwok0z2PDCkvFBiz2fZSUUa76NA7Zq', 0),
(5, '2020-03-10 07:30:13', '2020-03-10 07:30:13', 'Sefina titi aisa', '1583825413.png', 'sefina', '$2y$10$UZRyjc.j3XWc1vefOGs0JOj5NrDsJ8PibL2xB6eBm4gH6MgzYkFZu', 0),
(6, '2020-03-10 07:49:41', '2020-03-10 07:49:41', 'Zaki', '1583826581.jpg', 'Zacky Azmi', '$2y$10$1AGdCWflvcy4Cbg8WQbpzuoEIHi8Ud0v9GrqcXnPoTICyN3QcBB5.', 0);

-- --------------------------------------------------------

--
-- Struktur untuk view `trx`
--
DROP TABLE IF EXISTS `trx`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `trx`  AS  (select `transactions`.`id` AS `id`,`transactions`.`customer` AS `customer`,`transactions`.`created_at` AS `created_at`,`transactions`.`updated_at` AS `updated_at`,`transactions`.`serial` AS `SERIAL`,`transactions`.`type` AS `TYPE`,`parts`.`title` AS `title`,`parts`.`price` AS `price` from (`transactions` join `parts`) where (`parts`.`id_part` = `transactions`.`part`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `parts`
--
ALTER TABLE `parts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `parts`
--
ALTER TABLE `parts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
