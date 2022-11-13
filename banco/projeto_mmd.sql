-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Nov-2022 às 01:52
-- Versão do servidor: 10.4.25-MariaDB
-- versão do PHP: 8.1.10

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
-- Estrutura da tabela `alimentos`
--

CREATE TABLE `alimentos` (
  `nome` varchar(255) DEFAULT NULL,
  `idAlimento` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `alimentos`
--

INSERT INTO `alimentos` (`nome`, `idAlimento`, `updated_at`, `created_at`) VALUES
('fezes de pombo', 1, '2022-11-11 22:27:15', '2022-11-11 22:27:15'),
('carne humana', 2, '2022-11-11 22:27:41', '2022-11-11 22:27:41');

-- --------------------------------------------------------

--
-- Estrutura da tabela `animais`
--

CREATE TABLE `animais` (
  `idade` int(11) DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `idAnimal` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `sexo` varchar(255) DEFAULT NULL,
  `paisOrigem` varchar(255) DEFAULT NULL,
  `estadoOrigem` varchar(255) DEFAULT NULL,
  `fk_zoologico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `consumo_alimento`
--

CREATE TABLE `consumo_alimento` (
  `fk_animais_idAnimal` int(11) DEFAULT NULL,
  `fk_alimento_idAlimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `email` varchar(255) DEFAULT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `cpf` int(11) NOT NULL,
  `fk_zoologico_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `jaula`
--

CREATE TABLE `jaula` (
  `numeroJaula` int(11) NOT NULL,
  `fk_animais_idAnimal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `zoologico`
--

CREATE TABLE `zoologico` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`idAlimento`);

--
-- Índices para tabela `animais`
--
ALTER TABLE `animais`
  ADD PRIMARY KEY (`idAnimal`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`cpf`);

--
-- Índices para tabela `jaula`
--
ALTER TABLE `jaula`
  ADD PRIMARY KEY (`numeroJaula`);

--
-- Índices para tabela `zoologico`
--
ALTER TABLE `zoologico`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idAlimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
