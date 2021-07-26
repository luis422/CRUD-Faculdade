-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18-Jul-2021 às 06:41
-- Versão do servidor: 10.4.19-MariaDB
-- versão do PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `faculdade2`
--
CREATE DATABASE IF NOT EXISTS `faculdade` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `faculdade`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `IDADE` int(11) NOT NULL,
  `NOME_RESPONSAVEL` varchar(100) NOT NULL,
  `TELEFONE_RESPONSAVEL` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

CREATE TABLE `aula` (
  `ID` int(11) NOT NULL,
  `TITULO` varchar(30) NOT NULL,
  `DESCRICAO` varchar(300) NOT NULL,
  `ID_PROFESSOR` int(11) NOT NULL,
  `DATA_AULA` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `presenca_aula`
--

CREATE TABLE `presenca_aula` (
  `ID` int(11) NOT NULL,
  `ID_ALUNO` int(11) NOT NULL,
  `ID_AULA` int(11) NOT NULL,
  `PRESENTE` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE `professor` (
  `ID` int(11) NOT NULL,
  `NOME` varchar(100) NOT NULL,
  `CPF` varchar(14) NOT NULL,
  `TELEFONE` varchar(17) DEFAULT NULL,
  `IDADE` int(11) NOT NULL,
  `ATIVIDADE_RESPONSAVEL` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`ID`);

--
-- Índices para tabela `aula`
--
ALTER TABLE `aula`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_PROFESSOR` (`ID_PROFESSOR`);

--
-- Índices para tabela `presenca_aula`
--
ALTER TABLE `presenca_aula`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ID_AULA` (`ID_AULA`),
  ADD KEY `ID_ALUNO` (`ID_ALUNO`);

--
-- Índices para tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `CPF` (`CPF`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `aula`
--
ALTER TABLE `aula`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `presenca_aula`
--
ALTER TABLE `presenca_aula`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `aula_ibfk_1` FOREIGN KEY (`ID_PROFESSOR`) REFERENCES `professor` (`ID`);

--
-- Limitadores para a tabela `presenca_aula`
--
ALTER TABLE `presenca_aula`
  ADD CONSTRAINT `presenca_aula_ibfk_1` FOREIGN KEY (`ID_AULA`) REFERENCES `aula` (`ID`),
  ADD CONSTRAINT `presenca_aula_ibfk_2` FOREIGN KEY (`ID_ALUNO`) REFERENCES `aluno` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
