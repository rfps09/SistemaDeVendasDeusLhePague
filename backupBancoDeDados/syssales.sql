-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29-Ago-2022 às 05:58
-- Versão do servidor: 10.4.24-MariaDB
-- versão do PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `syssales`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `detalhe_vendas`
--

CREATE TABLE `detalhe_vendas` (
  `codVenda` bigint(20) UNSIGNED NOT NULL,
  `codProduto` bigint(20) UNSIGNED NOT NULL,
  `qtdProduto` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `failed_jobs`
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
-- Estrutura da tabela `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2022_08_15_144245_create_produtos_table', 1),
(7, '2022_08_15_144548_create_vendas_table', 1),
(8, '2022_08_15_150350_create_detalhe_vendas_table', 1),
(9, '2022_08_15_155902_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `personal_access_tokens`
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
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `codProduto` bigint(20) UNSIGNED NOT NULL,
  `unidade` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `valorUnitario` decimal(8,2) NOT NULL,
  `estoqueMinimo` decimal(8,2) NOT NULL,
  `qtdEstoque` decimal(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`codProduto`, `unidade`, `descricao`, `valorUnitario`, `estoqueMinimo`, `qtdEstoque`) VALUES
(1, '1', 'Processador Intel Core i5-10400, Cache 12MB, 2.9GHz (4.3GHz Max Turbo), LGA 1200 - BX8070110400', '1049.99', '1.00', '5.00'),
(2, '1', 'Processador AMD Ryzen 5 5600X, 3.7GHz (4.6GHz Max Turbo), Cache 35MB, 6 Núcleos, 12 Threads, AM4 - 100-100000065BOX', '1289.99', '1.00', '5.00'),
(3, '1', 'Processador AMD Ryzen 7 5700X, Cache 36MB, 3.4GHz (4.6GHz Max Turbo), AM4, Sem Vídeo - 100-100000926WOF', '1689.99', '1.00', '5.00'),
(4, '1', 'Processador Intel Core i5-12400F, Cache 18MB, 2.5GHz (4.4GHz Max Turbo), LGA 1700 - BX8071512400F', '1159.99', '1.00', '5.00'),
(5, '1', 'Placa de Vídeo Galax NVIDIA RTX 2060 Plus (1-Click OC), 6GB GDDR6, LED, Ray Tracing - 26NRL7HP68CX', '1999.99', '1.00', '5.00'),
(6, '1', 'Placa de Vídeo Zotac NVIDIA GeForce RTX 3060 Ti Twin Edge LHR, 8GB, 14.0 Gbps, GDDR6, DLSS, Ray Tracing - ZT-A30610E-10MLHR', '2999.99', '1.00', '5.00'),
(7, '1', 'Placa de Vídeo Galax NVIDIA GeForce RTX 3070 EX, RGB, 8GB GDDR6X, LHR, DLSS, Ray Tracing - 37NSL6MD2VXI', '3999.99', '1.00', '5.00'),
(8, '1', 'Placa de Vídeo EVGA NVIDIA GeForce RTX 3080 FTW3 Ultra Gaming, 10GB GDDR6X, iCX3 Technology, ARGB, DLSS, Ray Tracing, LHR - 10G-P5-3897-KL', '5999.99', '1.00', '5.00'),
(9, '1', 'Fonte XPG Core Reactor, 650W, 80 Plus Gold Modular', '649.99', '1.00', '5.00'),
(10, '1', 'Fonte XPG Core Reactor, 750W, 80 Plus Gold Modular', '669.99', '1.00', '5.00'),
(11, '1', 'Fonte XPG Core Reactor, 850W, ATX, 80 Plus Gold Modular', '699.99', '1.00', '5.00'),
(12, '1', 'Memória Kingston Fury Beast, RGB, 8GB, 3200MHz, DDR4, CL16, Preto - KF432C16BBA/8', '289.99', '1.00', '5.00'),
(13, '1', 'Memória XPG Gammix D60G, RGB, 8GB, 3200MHz, DDR4, CL16, Cinza - AX4U32008G16A-ST60', '249.99', '1.00', '5.00'),
(14, '1', 'Placa-Mãe ASRock B450M Steel Legend, AMD AM4, mATX, DDR4 - 90-MXB9Y0-A0BAYZ', '799.99', '1.00', '5.00'),
(15, '1', 'Placa-Mãe Gigabyte B550M Aorus Elite, AMD AM4, Micro ATX, DDR4', '899.99', '1.00', '5.00'),
(16, '1', 'Placa-Mãe MSI B560M-A PRO, LGA 1200, Intel B560, MATX, DDR4', '519.99', '1.00', '5.00'),
(17, '1', 'Placa Mãe Gigabyte B660M Aorus PRO, Intel LGA 1700, mATX, DDR4, M.2 NVME - B660M AORUS PRO DDR4', '1219.99', '1.00', '5.00'),
(18, '1', 'SSD Adata XPG Spectrix S40G 1 TB, M.2, Leitura: 3500MB/s e Gravação: 3000MB/s - AS40G-1TT-C', '899.99', '1.00', '5.00'),
(19, '1', 'SSD XPG Spectrix S20G, 1 TB, M.2 2280,, PCIe Gen3x4, Leitura: 2500 MB/s e Gravação: 1800 MB/s, 3D NAND - ASPECTRIXS20G-1T-C', '789.99', '1.00', '5.00'),
(20, '1', 'SSD Corsair Force MP600 PRO XT, 1 TB, M.2 PCIe + NVMe, Leituras 7100MB/s e Gravações 5800MB/s - CSSD-F1000GBMP600PXT', '1289.99', '1.00', '5.00'),
(21, '1', 'Water Cooler Gamer Rise Mode, ARGB, Intel e AMD, 240mm, Preto - RM-WCB-04-ARGB', '449.99', '1.00', '5.00'),
(22, '1', 'Gabinete Gamer Corsair 4000D Airflow, Mid-Tower, ATX, Lateral em Vidro Temperado, Com FAN, Preto - CC-9011200-WW', '899.99', '1.00', '5.00'),
(23, '1', 'Gabinete Gamer Husky Gaming Polar, Branco - Mid Tower, ARGB com Fan, Porta lateral em Vidro Temperado - HGMC011', '469.99', '1.00', '5.00'),
(24, '1', 'Cooler para Processador Noctua, para AMD/Intel, FAN de 140mm, Marrom - NH-D15', '929.99', '1.00', '5.00'),
(25, '1', 'Cooler para Processador Gamer Rise Mode Z5, LED Rainbow, Intel e AMD, 90mm, Preto - RM-ACZ-Z5-RGB', '79.99', '1.00', '5.00'),
(26, '1', 'Cooler FAN Noctua 120mm, para PC, Marrom - NF-P12 PWM', '172.99', '1.00', '5.00'),
(27, '1', 'Monitor Gamer AOC 23.8 Full HD, 240Hz, 0.5ms, IPS, HDMI/DisplayPort, sRGB, FreeSync Premium, Ajuste de Altura, Preto - 24G2Z', '1929.99', '1.00', '5.00'),
(28, '1', 'Monitor Gamer Samsung Odyssey G3, 24 Full HD, 144Hz, 1ms, FreeSync Premium, HDMI/Displayport, Ajuste de altura, Preto - LF24G35TFWLXZD', '1399.99', '1.00', '5.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('4LoX3gxMa3YBmgPsNmqJfD1LAmptGRX1hW6C9uX4', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:103.0) Gecko/20100101 Firefox/103.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoibW5jTnVRaGF0eFF1Vjk0eWZtbkY5RVEyQzhoUnp3MTQzTXFpV2FCYSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NTI6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9yZXN1bHRzP3NlYXJjaD1tb25pdG9yJTIwMjQwaHoiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjM6InVybCI7YToxOntzOjg6ImludGVuZGVkIjtzOjMzOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvbWV1c1BlZGlkb3MiO31zOjQ6ImNhcnQiO2E6MDp7fX0=', 1661745312),
('N2ryUUFNZ7G8LK90SrCk67vtpIexJq41Go76QX9R', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.5112.102 Safari/537.36 Edg/104.0.1293.70', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiNk5GbkgzVmlrODFkN0FMZEtyUXM5STR1cVpwQzI5bHdhRDdTSjN6WiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1661742567);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `classe` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `vendas`
--

CREATE TABLE `vendas` (
  `codVenda` bigint(20) UNSIGNED NOT NULL,
  `codCliente` bigint(20) UNSIGNED NOT NULL,
  `dataVenda` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `detalhe_vendas`
--
ALTER TABLE `detalhe_vendas`
  ADD KEY `detalhe_vendas_codvenda_foreign` (`codVenda`),
  ADD KEY `detalhe_vendas_codproduto_foreign` (`codProduto`);

--
-- Índices para tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Índices para tabela `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Índices para tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Índices para tabela `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`codProduto`);

--
-- Índices para tabela `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Índices para tabela `vendas`
--
ALTER TABLE `vendas`
  ADD PRIMARY KEY (`codVenda`),
  ADD KEY `vendas_codcliente_foreign` (`codCliente`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `produtos`
--
ALTER TABLE `produtos`
  MODIFY `codProduto` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `vendas`
--
ALTER TABLE `vendas`
  MODIFY `codVenda` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `detalhe_vendas`
--
ALTER TABLE `detalhe_vendas`
  ADD CONSTRAINT `detalhe_vendas_codproduto_foreign` FOREIGN KEY (`codProduto`) REFERENCES `produtos` (`codProduto`),
  ADD CONSTRAINT `detalhe_vendas_codvenda_foreign` FOREIGN KEY (`codVenda`) REFERENCES `vendas` (`codVenda`);

--
-- Limitadores para a tabela `vendas`
--
ALTER TABLE `vendas`
  ADD CONSTRAINT `vendas_codcliente_foreign` FOREIGN KEY (`codCliente`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
