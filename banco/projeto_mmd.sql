-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22/11/2022 às 02:18
-- Versão do servidor: 10.4.21-MariaDB
-- Versão do PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projeto_mmd`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alimentos`
--

CREATE TABLE `alimentos` (
  `nome` varchar(255) DEFAULT NULL,
  `idAlimento` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `alimentos`
--

INSERT INTO `alimentos` (`nome`, `idAlimento`, `updated_at`, `created_at`) VALUES
('grama', 1, '2022-11-21 01:15:38', '2022-11-11 22:27:15'),
('carne de vaca', 2, '2022-11-21 01:15:23', '2022-11-11 22:27:41'),
('carne de macaco', 3, '2022-11-13 04:34:29', '2022-11-13 04:34:29'),
('nozes', 5, '2022-11-21 04:22:40', '2022-11-21 04:22:40');

-- --------------------------------------------------------

--
-- Estrutura para tabela `animais`
--

CREATE TABLE `animais` (
  `idade` int(11) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `idAnimal` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `paisOrigem` varchar(255) DEFAULT NULL,
  `estadoOrigem` varchar(255) DEFAULT NULL,
  `fk_zoologico_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `especie` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `animais`
--

INSERT INTO `animais` (`idade`, `peso`, `idAnimal`, `nome`, `sexo`, `paisOrigem`, `estadoOrigem`, `fk_zoologico_id`, `updated_at`, `created_at`, `especie`) VALUES
(8, 25, 1, 'fofinha', 'macho', 'mongolia', 'olam bator', 1, '2022-11-21 00:33:18', '2022-11-21 01:17:25', 'ovelha'),
(8, 25, 2, 'malhado', 'macho', 'mongolia', 'olam bator', 1, '2022-11-21 06:02:11', '2022-11-21 06:02:11', 'cavalo');

-- --------------------------------------------------------

--
-- Estrutura para tabela `consumo_alimento`
--

CREATE TABLE `consumo_alimento` (
  `fk_animais_idAnimal` int(11) DEFAULT NULL,
  `fk_alimento_idAlimento` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `consumo_alimento`
--

INSERT INTO `consumo_alimento` (`fk_animais_idAnimal`, `fk_alimento_idAlimento`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-11-21 05:11:26', '2022-11-21 05:11:26'),
(2, 1, '2022-11-21 03:03:50', '2022-11-21 03:03:50'),
(1, 1, '2022-11-22 03:41:57', '2022-11-22 03:41:57'),
(1, 1, '2022-11-22 03:42:05', '2022-11-22 03:42:05'),
(1, 1, '2022-11-22 03:42:05', '2022-11-22 03:42:05'),
(1, 1, '2022-11-22 03:42:06', '2022-11-22 03:42:06'),
(1, 1, '2022-11-22 03:42:07', '2022-11-22 03:42:07'),
(1, 1, '2022-11-22 03:42:07', '2022-11-22 03:42:07'),
(1, 1, '2022-11-22 03:42:08', '2022-11-22 03:42:08'),
(1, 5, '2022-11-22 03:42:24', '2022-11-22 03:42:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `email` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` int(11) NOT NULL,
  `fk_zoologico_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `funcionarios`
--

INSERT INTO `funcionarios` (`email`, `nome`, `cpf`, `fk_zoologico_id`, `created_at`, `updated_at`) VALUES
('joao@gmail.com', 'joao', 121212, 1, '2022-11-20 22:44:39', '2022-11-13 15:53:24');

-- --------------------------------------------------------

--
-- Estrutura para tabela `jaula`
--

CREATE TABLE `jaula` (
  `numeroJaula` int(11) NOT NULL,
  `fk_animais_idAnimal` int(11) DEFAULT NULL,
  `fk_zoologico_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `jaula`
--

INSERT INTO `jaula` (`numeroJaula`, `fk_animais_idAnimal`, `fk_zoologico_id`, `created_at`, `updated_at`) VALUES
(10, 1, 1, '2022-11-21 03:39:52', '2022-11-21 03:39:52');

-- --------------------------------------------------------

--
-- Estrutura para tabela `zoologico`
--

CREATE TABLE `zoologico` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `zoologico`
--

INSERT INTO `zoologico` (`id`, `nome`, `endereco`, `updated_at`, `created_at`) VALUES
(1, 'zoologico de americana', 'Av. Brasil, 2525 - Jardim Ipiranga, Americana - SP, 13468-000', '2022-11-13 15:29:27', '2022-11-13 15:29:27');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`idAlimento`);

--
-- Índices de tabela `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`idAnimal`);

--
-- Índices de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices de tabela `jaula`
--
ALTER TABLE `jaula`
  ADD PRIMARY KEY (`numeroJaula`);

--
-- Índices de tabela `zoologico`
--
ALTER TABLE `zoologico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idAlimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `animais`
--
ALTER TABLE `animais`
  MODIFY `idAnimal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `zoologico`
--
ALTER TABLE `zoologico`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
