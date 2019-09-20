-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Sep 2019 pada 13.47
-- Versi server: 10.1.30-MariaDB
-- Versi PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ciblog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_sessions`
--

CREATE TABLE `log_sessions` (
  `id` bigint(200) NOT NULL,
  `sess_id` bigint(200) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_sessions`
--

INSERT INTO `log_sessions` (`id`, `sess_id`, `user_id`, `login_at`, `logout_at`) VALUES
(9, 9223372036854775807, 1, '2019-09-19 17:24:50', NULL),
(10, 9223372036854775807, 1, '2019-09-19 17:24:59', NULL),
(11, 9223372036854775807, 1, '2019-09-19 17:26:15', NULL),
(12, 9223372036854775807, 1, '2019-09-19 17:33:31', NULL),
(13, 9223372036854775807, 1, '2019-09-19 17:34:23', NULL),
(14, 9223372036854775807, 1, '2019-09-19 17:36:00', NULL),
(15, 9223372036854775807, 1, '2019-09-19 17:38:53', NULL),
(16, 190919054136, 1, '2019-09-19 17:41:36', NULL),
(17, 190919054215, 1, '2019-09-19 17:42:15', NULL),
(18, 190919054300, 1, '2019-09-19 17:43:00', NULL),
(19, 190919054414, 1, '2019-09-19 17:44:14', NULL),
(20, 190919054434, 1, '2019-09-19 17:44:34', NULL),
(21, 190919054532, 1, '2019-09-19 17:45:32', NULL),
(22, 190919054934, 1, '2019-09-19 17:49:34', NULL),
(23, 190919055005, 1, '2019-09-19 17:50:05', NULL),
(24, 190919055059, 1, '2019-09-19 17:50:59', NULL),
(25, 190919070447, 1, '2019-09-19 19:04:47', NULL),
(26, 200919033818, 1, '2019-09-20 03:38:18', NULL),
(27, 200919090730, 1, '2019-09-20 09:07:30', NULL),
(28, 200919092610, 1, '2019-09-20 09:26:10', NULL),
(29, 200919092747, 1, '2019-09-20 09:27:47', NULL),
(30, 200919092831, 1, '2019-09-20 09:28:31', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) NOT NULL,
  `author` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `published_at` datetime NOT NULL,
  `comment_count` int(10) NOT NULL,
  `status` varchar(20) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `likes` int(20) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `excerpt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `access_right` varchar(50) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `instagram`, `twitter`, `username`, `password`, `photo`, `access_right`) VALUES
(1, 'Super Admin', 'admin@qdevs.com', '@qdevs919', '@qdevs919', 'Qdevsadmin', '94b1e5a051b6afc774c080f8516b1629', NULL, 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `log_sessions`
--
ALTER TABLE `log_sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `author` (`author`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `instagram` (`instagram`),
  ADD UNIQUE KEY `twitter` (`twitter`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_sessions`
--
ALTER TABLE `log_sessions`
  MODIFY `id` bigint(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
