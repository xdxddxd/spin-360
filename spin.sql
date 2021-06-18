-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jun-2021 às 20:15
-- Versão do servidor: 10.4.18-MariaDB
-- versão do PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `spin`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `access_level`
--

CREATE TABLE `access_level` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_bin NOT NULL,
  `description` varchar(8000) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `access_level`
--

INSERT INTO `access_level` (`id`, `title`, `description`) VALUES
(1, 'Administrador', ''),
(2, 'Funcionário', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `arquivos`
--

CREATE TABLE `arquivos` (
  `id` int(255) NOT NULL,
  `sequencia` int(11) NOT NULL,
  `url` varchar(8000) COLLATE utf8_bin NOT NULL,
  `nome` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `legenda` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `tipo_arquivo` tinyint(1) DEFAULT NULL,
  `id_produto` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `arquivos`
--

INSERT INTO `arquivos` (`id`, `sequencia`, `url`, `nome`, `legenda`, `tipo_arquivo`, `id_produto`) VALUES
(2, 0, 'https://localhost/spin-360/assets/uploads/images/2021/06/abe17fe4edbdd15eb09891d83dbd52d8c30f6fb08831e0f3ba4857ab9072a884.jpg', 'Teste', 'sub', NULL, 21),
(3, 1, 'https://localhost/spin-360/assets/uploads/images/2021/06/eab833f4068587e43ee5852f23a6cf44d9f1719cbda4b216111d0dbb162b1fc5.jpg', NULL, NULL, NULL, 21),
(4, 2, 'https://localhost/spin-360/assets/uploads/images/2021/06/74a9d2d03086da79342d48294a7213046a3032a208dc00f7b86f14ef73ba7c5e.png', NULL, NULL, NULL, 21),
(5, 3, 'https://localhost/spin-360/assets/uploads/images/2021/06/2cb900eafef564f3457cbc7e535631cb33424e820c0ac0a3d1227ea801b0c95b.jpg', NULL, NULL, NULL, 21),
(6, 4, 'https://localhost/spin-360/assets/uploads/images/2021/06/6822bf5776927560794bb0e09aa566a462949f8c23f86441f57381e2b9a5d895.png', NULL, NULL, NULL, 21),
(7, 5, 'https://localhost/spin-360/assets/uploads/images/2021/06/6c6f7922b058b95ab36b93848509f27e5b98ecb39d9bc1bb3c552499453cfa2a.jpg', NULL, NULL, NULL, 21),
(8, 6, 'https://localhost/spin-360/assets/uploads/images/2021/06/b8d74d4189dab3bde793de44eba50214a70705375a554acaf392648fd4c68a75.png', NULL, NULL, NULL, 21),
(9, 7, 'https://localhost/spin-360/assets/uploads/images/2021/06/e888d2d4899d5e10302546bce30cc235e766712a169e02c5e8f0e3a09bada42f.jpg', NULL, NULL, NULL, 21),
(10, 8, 'https://localhost/spin-360/assets/uploads/images/2021/06/b9f071dc3d4d6a21c8323363ee0a511ce134786286039de6601307e16aecb937.jpg', NULL, NULL, NULL, 21),
(11, 9, 'https://localhost/spin-360/assets/uploads/images/2021/06/4e3d11e005afd894a85dbca36b3487fcabbcba8668b676ac1d41b9c4ddaffde4.jpg', NULL, NULL, NULL, 21),
(12, 10, 'https://localhost/spin-360/assets/uploads/images/2021/06/27b1fe5ed0593a31e1fec8a46ee97644c5a14612e9d3e926067b7a6d26f9effe.png', NULL, NULL, NULL, 21),
(13, 11, 'https://localhost/spin-360/assets/uploads/images/2021/06/8e2a8d9ae834df96de1aa6119f0bea4cfea508ab82b77e97cb1b14cbd5e8ae0f.jpg', NULL, NULL, NULL, 21),
(14, 12, 'https://localhost/spin-360/assets/uploads/images/2021/06/e71e153d21a9cccf27153a4317e825cac50ccb846637aae274de7b7feb626e10.png', NULL, NULL, NULL, 21),
(15, 13, 'https://localhost/spin-360/assets/uploads/images/2021/06/95aeb95d7509a7b7b2aee5b93261620ffb621d562fdf75e166d347a8cdf050e7.jpg', NULL, NULL, NULL, 21),
(16, 14, 'https://localhost/spin-360/assets/uploads/images/2021/06/a84668c85f02daa77f3fb11caa97800e9e47a4f6f1d58994447cbf5061b4e521.png', NULL, NULL, NULL, 21),
(17, 15, 'https://localhost/spin-360/assets/uploads/images/2021/06/295238d06455328bc176a4825413ab7717a2b86eba0f6c73468d709cc43822bc.jpg', NULL, NULL, NULL, 21),
(18, 16, 'https://localhost/spin-360/assets/uploads/images/2021/06/9ecf626ceb984016ed58f1bacc6b0edcd1298ca33e71a6491c6a446c0168f901.png', NULL, NULL, NULL, 21),
(19, 17, 'https://localhost/spin-360/assets/uploads/images/2021/06/c3a71c123c65d4e747abd3be1dc842514324492c8406202aba4d0607bedf736e.jpg', NULL, NULL, NULL, 21),
(20, 18, 'https://localhost/spin-360/assets/uploads/images/2021/06/5230f73db9a673317da56a4d5e04e8a2ceddb13087591e8a63eb04869638e217.png', NULL, NULL, NULL, 21),
(21, 19, 'https://localhost/spin-360/assets/uploads/images/2021/06/8a34e8da8f159e9f3a98dbc24b5f54070084d67abb8e5930f6062ae73368dcdf.jpg', NULL, NULL, NULL, 21);

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `shop_uri` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `url_image` varchar(8000) COLLATE utf8_bin DEFAULT NULL,
  `razao_social` varchar(255) COLLATE utf8_bin NOT NULL,
  `cnpj` varchar(18) COLLATE utf8_bin NOT NULL,
  `cep` varchar(8) COLLATE utf8_bin NOT NULL,
  `logradouro` varchar(255) COLLATE utf8_bin NOT NULL,
  `nr_local` varchar(255) COLLATE utf8_bin NOT NULL,
  `complemento` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `bairro` varchar(255) COLLATE utf8_bin NOT NULL,
  `cidade` varchar(255) COLLATE utf8_bin NOT NULL,
  `uf` varchar(5) COLLATE utf8_bin NOT NULL,
  `cel_phone` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `send_mail` int(1) DEFAULT NULL,
  `use_term` int(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `delivery` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `shop_uri`, `url_image`, `razao_social`, `cnpj`, `cep`, `logradouro`, `nr_local`, `complemento`, `bairro`, `cidade`, `uf`, `cel_phone`, `email`, `send_mail`, `use_term`, `active`, `delivery`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, 'PSDev', '51.651.651/5165-16', '11730000', 'Rua Marcelo Batista', '548', '', 'Itaóca', 'Mongaguá', 'SP', '(13) 99205-4764', 'ytxd.gamer@gmail.com', 0, 1, 1, 0, '2021-05-31 23:36:58', '2021-05-31 23:36:58');

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(255) NOT NULL,
  `tipo_produto` int(1) DEFAULT NULL,
  `placa` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `renavam` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `chassi` varchar(21) COLLATE utf8_bin DEFAULT NULL,
  `id_usuario` int(255) NOT NULL,
  `status_registro` tinyint(1) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `tipo_produto`, `placa`, `renavam`, `chassi`, `id_usuario`, `status_registro`, `created_at`, `updated_at`) VALUES
(11, 1, 'ABC1234', '', '', 3, NULL, '2021-06-11 22:04:38', '2021-06-11 22:04:38'),
(12, 1, 'ABC1234', '', '', 3, NULL, '2021-06-11 22:09:53', '2021-06-11 22:09:53'),
(13, 1, 'ABC1234', '', '', 3, NULL, '2021-06-11 22:11:04', '2021-06-11 22:11:04'),
(14, 0, 'ABC1234', '', '', 3, NULL, '2021-06-11 22:11:07', '2021-06-11 22:11:07'),
(15, 1, 'ABC1234', '', '', 3, NULL, '2021-06-11 22:15:08', '2021-06-11 22:15:08'),
(16, 0, 'ABC1234', '', '', 3, NULL, '2021-06-11 22:15:20', '2021-06-11 22:15:20'),
(17, 1, 'ABC1234', '', '', 3, NULL, '2021-06-11 22:19:18', '2021-06-11 22:19:18'),
(18, 1, 'ABC1234', '', '', 3, NULL, '2021-06-14 23:40:52', '2021-06-14 23:40:52'),
(19, 0, 'ABC1234', '', '', 3, NULL, '2021-06-15 09:04:00', '2021-06-15 09:04:00'),
(20, 1, 'ABC1234', '', '', 3, NULL, '2021-06-15 23:53:39', '2021-06-15 23:53:39'),
(21, 0, 'ABC1234', '', '', 3, NULL, '2021-06-16 00:03:11', '2021-06-16 00:03:11'),
(22, 1, 'ABC1234', '', '', 3, NULL, '2021-06-17 23:03:06', '2021-06-17 23:03:06');

-- --------------------------------------------------------

--
-- Estrutura da tabela `system_users`
--

CREATE TABLE `system_users` (
  `id` int(11) NOT NULL,
  `fk_empresa` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `cel_phone` varchar(15) COLLATE utf8_bin NOT NULL,
  `email` varchar(255) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `access_level` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `system_users`
--

INSERT INTO `system_users` (`id`, `fk_empresa`, `name`, `cel_phone`, `email`, `password`, `access_level`, `active`, `created_at`, `updated_at`) VALUES
(3, 1, 'Derik', '123456789', 'ytxd.gamer@gmail.com', '$2y$10$uLCOmfqImgll96T2EFTfGeYion0TuhISl9mZAcjsUY0ZMPagQX89q', 1, 1, '2021-05-31 23:38:28', '2021-05-31 23:38:28');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) COLLATE utf8_bin NOT NULL,
  `email` varchar(40) COLLATE utf8_bin NOT NULL,
  `senha` varchar(255) COLLATE utf8_bin NOT NULL,
  `token` varchar(80) COLLATE utf8_bin DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `access_level`
--
ALTER TABLE `access_level`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_produto` (`id_produto`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Índices para tabela `system_users`
--
ALTER TABLE `system_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `access_level` (`access_level`),
  ADD KEY `fk_empresa` (`fk_empresa`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `access_level`
--
ALTER TABLE `access_level`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `arquivos`
--
ALTER TABLE `arquivos`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `system_users`
--
ALTER TABLE `system_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `arquivos`
--
ALTER TABLE `arquivos`
  ADD CONSTRAINT `arquivos_ibfk_1` FOREIGN KEY (`id_produto`) REFERENCES `produto` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `system_users` (`id`);

--
-- Limitadores para a tabela `system_users`
--
ALTER TABLE `system_users`
  ADD CONSTRAINT `fk_empresa` FOREIGN KEY (`fk_empresa`) REFERENCES `empresa` (`id`),
  ADD CONSTRAINT `system_users_ibfk_1` FOREIGN KEY (`access_level`) REFERENCES `access_level` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
