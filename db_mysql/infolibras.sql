-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Abr-2019 às 19:36
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infolibras`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_01_22_011911_create_categories_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('servidor@ifsp.com', '$2y$10$ezngf1omjly1bLbtQ3MGfODgLu9LDTy84/ndKqDZBZzJstarO4256', '2019-04-09 18:38:27');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `user_type`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Cesar Cutolo', 'admin@ifsp.com', 'admin', '$2y$10$QOgpFrTboXc0uQTAF3opz.2vkjoYsjNhk.AQQ6PA.dP3Pc1Z83y0C', '1WVnuq4iWb84z4GkPd3BcXgTWCi8KqjHYm6OSDCvDSzi8GrWV708Zvu9xlm8', '2019-04-08 16:28:13', '2019-04-08 16:28:13'),
(2, 'Felipe Passada', 'servidor@ifsp.com', 'servidor', '$2y$10$QOgpFrTboXc0uQTAF3opz.2vkjoYsjNhk.AQQ6PA.dP3Pc1Z83y0C', 'GAjh62MRunT0vmR0Ni62G0MYxpWfv6SDGOqAvMsoxBikYLVOF5ARagfsy3nW', '2019-04-08 16:28:13', '2019-04-08 16:28:13'),
(3, 'Rodrigo Araujo', 'interprete@ifsp.com', 'interprete', '$2y$10$QOgpFrTboXc0uQTAF3opz.2vkjoYsjNhk.AQQ6PA.dP3Pc1Z83y0C', 'XYhX1oxKOwTgjAAxa3dlECat75EXIVVnVMnhnwTED89jJl8oCTPiP5bcZlPk', '2019-04-08 16:28:13', '2019-04-08 16:28:13'),
(4, 'Danilo Batista ', 'gestordepartemento@ifsp.com', 'gestordepartemento', '$2y$10$QOgpFrTboXc0uQTAF3opz.2vkjoYsjNhk.AQQ6PA.dP3Pc1Z83y0C', 'y2TEDPvLkAa3FmNwXW5xpvojDtkZxHeXHDjypSSTkntiMR81fBgt7vNCkTgN', '2019-04-08 16:28:13', '2019-04-08 16:28:13'),
(5, 'Denis Magno', 'audiovisual@ifsp.com', 'audiovisual', '$2y$10$QOgpFrTboXc0uQTAF3opz.2vkjoYsjNhk.AQQ6PA.dP3Pc1Z83y0C', NULL, '2019-04-08 16:28:13', '2019-04-08 16:28:13'),
(6, 'Mariana Silva', 'user@ifsp.com', 'user', '$2y$10$QOgpFrTboXc0uQTAF3opz.2vkjoYsjNhk.AQQ6PA.dP3Pc1Z83y0C', NULL, '2019-04-08 16:28:13', '2019-04-08 16:28:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
