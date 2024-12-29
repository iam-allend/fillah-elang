-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Nov 2024 pada 17.33
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_commerce_fallah`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`) VALUES
(1, 2, 8, 4, '2024-11-10 06:40:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `levels`
--

CREATE TABLE `levels` (
  `levelid` int(11) NOT NULL,
  `levelnama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `levels`
--

INSERT INTO `levels` (`levelid`, `levelnama`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `image` varchar(10000) DEFAULT NULL,
  `seller_id` int(10) UNSIGNED ZEROFILL NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `stock`, `image`, `seller_id`, `created_at`, `updated_at`) VALUES
(1, 'Onde-Onde Ketawa Rasa Original', 'Rasa klasik dan autentik dari onde-onde ketawa yang menonjolkan aroma dan cita rasa kacang hijau yang khas. Lapisan luar yang renyah dengan isian yang lembut membuatnya sempurna untuk pencinta rasa tradisional.', '20000.00', 500, NULL, 0000000001, '2024-10-21 03:46:50', '2024-11-10 12:36:25'),
(2, 'Onde-Onde Ketawa Rasa Durian', 'Varian yang kaya akan aroma dan rasa buah durian, sangat cocok untuk penggemar durian. Rasanya unik dengan perpaduan manis dan gurih yang meninggalkan kesan mendalam di lidah.', '20000.00', 200, NULL, 0000000001, '2024-10-21 03:47:10', '2024-11-10 12:36:27'),
(3, 'Onde-Onde Ketawa Rasa Nangka', 'Onde-onde ketawa dengan cita rasa nangka ini menghadirkan aroma harum dan rasa manis yang khas dari buah nangka. Rasanya segar dan lezat, mengingatkan pada manisan nangka yang menyenangkan.\r\n', '20000.00', 200, NULL, 0000000001, '2024-10-27 18:49:09', '2024-11-10 12:36:29'),
(4, 'Onde-Onde Ketawa Rasa Stawberry', 'Varian yang manis dan sedikit asam dengan aroma stroberi yang segar. Memberikan sensasi rasa buah yang cerah dan menyegarkan, cocok untuk mereka yang menginginkan rasa onde-onde yang lebih ringan.\r\n', '20000.00', 200, NULL, 0000000001, '2024-11-04 05:54:41', '2024-11-10 12:36:31'),
(5, 'Onde-Onde Ketawa Rasa Melon', 'Rasa melon yang lembut dan manis memberikan keunikan tersendiri pada onde-onde ini. Aroma buah melon yang segar menambah pengalaman menikmati onde-onde dengan cita rasa buah tropis.', '20000.00', 200, NULL, 0000000001, '2024-11-04 06:08:48', '2024-11-10 12:36:33'),
(6, 'Onde-Onde Ketawa Rasa Pandan', 'Varian pandan memberikan rasa dan aroma yang wangi dan manis. Dengan warna hijau yang khas, rasa pandan ini mengingatkan pada kue tradisional dengan aroma pandan yang alami dan menenangkan.', '20000.00', 200, NULL, 0000000001, '2024-11-04 06:09:34', '2024-11-10 12:36:35'),
(7, 'Onde-Onde Ketawa Rasa Coklat', 'Onde-onde ketawa dengan isian coklat menawarkan rasa manis dan sedikit pahit yang menggugah selera. Cocok untuk penggemar coklat, karena rasanya yang kaya dan memanjakan lidah.', '20000.00', 200, NULL, 0000000001, '2024-11-04 06:10:10', '2024-11-10 12:36:38'),
(8, 'Onde-Onde Ketawa Rasa MixRasa', 'Paket Mix Rasa adalah pilihan sempurna bagi mereka yang ingin mencoba semua varian dalam satu kemasan. Setiap butir onde-onde memiliki rasa yang berbeda, memberikan pengalaman mencoba cita rasa yang beragam mulai dari yang klasik hingga buah dan coklat.', '20000.00', 200, NULL, 0000000001, '2024-11-04 06:11:11', '2024-11-10 12:36:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product_images`
--

INSERT INTO `product_images` (`id`, `product_id`, `image_url`, `created_at`) VALUES
(26, 2, 'dashboard_admin/uploads/product/1730992270_c98dab31a5baa119824a.png', '2024-11-07 22:11:10'),
(27, 3, 'dashboard_admin/uploads/product/1730992305_2ac606e555e5695000e7.png', '2024-11-07 22:11:45'),
(28, 4, 'dashboard_admin/uploads/product/1730992319_5e6191e41e3ca7a36553.png', '2024-11-07 22:11:59'),
(29, 5, 'dashboard_admin/uploads/product/1730992332_844ed8c273993f946ecb.png', '2024-11-07 22:12:12'),
(30, 6, 'dashboard_admin/uploads/product/1730992344_6740b6d3a57e180ae3da.png', '2024-11-07 22:12:24'),
(31, 7, 'dashboard_admin/uploads/product/1730992561_bb5c40e31c4e4750b0ee.png', '2024-11-07 22:16:01'),
(32, 1, 'dashboard_admin/uploads/product/1730992791_2812c79bec2ffb291a7a.png', '2024-11-07 22:19:51'),
(33, 8, 'dashboard_admin/uploads/product/1730993931_5e364e3e4ddb34244ca4.png', '2024-11-07 22:38:51');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `status` enum('Pending','Completed','Cancelled') NOT NULL DEFAULT 'Pending',
  `order_date` datetime DEFAULT current_timestamp(),
  `whatsapp_link` varchar(255) DEFAULT NULL,
  `admin_review` tinyint(1) DEFAULT 0,
  `bukti_tf` varchar(255) NOT NULL,
  `alamat_kirim` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `user_id`, `product_id`, `quantity`, `total_price`, `status`, `order_date`, `whatsapp_link`, `admin_review`, `bukti_tf`, `alamat_kirim`) VALUES
(27, 2, 4, 5, '100000.00', 'Cancelled', '2024-11-10 13:32:00', 'https://anur.com2', 0, '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `pass_confirm` varchar(255) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  `level_user_id` int(11) NOT NULL DEFAULT 2,
  `img_user` varchar(255) NOT NULL DEFAULT 'img/default.svg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `pass_confirm`, `phone_number`, `address`, `created_at`, `updated_at`, `level_user_id`, `img_user`) VALUES
(1, 'admin@gmail.com', 'anur_mustakim', '$2y$10$dhH46P943CbMFnybTo48WOAXcUiYg6o9wpVVkFnfjGxHhxyZGXdvW', '', '123245523456', 'kab. Batang', '2024-10-27 10:20:58', '2024-11-07 15:33:34', 1, 'img/img_users/672cddce0d175_IMG_20220821_132216-copy.png'),
(2, 'user1@gmail.com', 'user1', '$2y$10$Y.NcBLbsx.y4WApK.MOOn.IBD1PNbONarviGBj1ZkSAypSxHpk1mW', '', '085156292952', 'Jl. Poncowolo, Semarang Tengah, Jawa Tengah', '2024-11-07 15:39:36', '2024-11-07 15:39:36', 2, 'img/default.svg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `levels`
--
ALTER TABLE `levels`
  ADD PRIMARY KEY (`levelid`);

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_images_ibfk_1` (`product_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `levels`
--
ALTER TABLE `levels`
  MODIFY `levelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT untuk tabel `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
