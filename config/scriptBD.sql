-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15-Out-2021 às 04:11
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `shows`
--
CREATE DATABASE IF NOT EXISTS `shows` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `shows`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `enderecos`
--

CREATE TABLE `enderecos` (
  `id_endereco` int(11) NOT NULL,
  `rua` varchar(100) DEFAULT NULL,
  `bairro` varchar(30) DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `cidade` varchar(35) DEFAULT NULL,
  `estado` varchar(30) DEFAULT NULL,
  `UF` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ingressos`
--

CREATE TABLE `ingressos` (
  `id_ingresso` int(11) NOT NULL,
  `id_show` int(11) NOT NULL,
  `setor` varchar(20) DEFAULT NULL,
  `valor` double DEFAULT NULL,
  `meia` tinyint(1) DEFAULT NULL,
  `numero_do_ingresso` int(11) DEFAULT NULL,
  `mesa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `shows`
--

CREATE TABLE `shows` (
  `id_show` int(11) NOT NULL,
  `id_endereco` int(11) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  `cantor_banda` varchar(100) DEFAULT NULL,
  `capacidade_total` int(11) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data_do_show` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `enderecos`
--
ALTER TABLE `enderecos`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `ingressos`
--
ALTER TABLE `ingressos`
  ADD PRIMARY KEY (`id_ingresso`),
  ADD KEY `tb_ingressos_id_show` (`id_show`);

--
-- Índices para tabela `shows`
--
ALTER TABLE `shows`
  ADD PRIMARY KEY (`id_show`),
  ADD KEY `tb_shows_id_endereco` (`id_endereco`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `enderecos`
--
ALTER TABLE `enderecos`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `ingressos`
--
ALTER TABLE `ingressos`
  MODIFY `id_ingresso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `shows`
--
ALTER TABLE `shows`
  MODIFY `id_show` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `ingressos`
--
ALTER TABLE `ingressos`
  ADD CONSTRAINT `tb_ingressos_id_show` FOREIGN KEY (`id_show`) REFERENCES `shows` (`id_show`);

--
-- Limitadores para a tabela `shows`
--
ALTER TABLE `shows`
  ADD CONSTRAINT `tb_shows_id_endereco` FOREIGN KEY (`id_endereco`) REFERENCES `enderecos` (`id_endereco`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
