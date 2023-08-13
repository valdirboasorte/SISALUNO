DROP DATABASE IF EXISTS sisaluno;

CREATE DATABASE sisaluno;

USE sisaluno;

-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Tempo de geração: 28/07/2023 às 01:11
-- Versão do servidor: 5.7.35
-- Versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sisaluno`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` smallint(6) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `idade` int(11) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `estatus` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `aluno`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `disciplina`
--

CREATE TABLE `disciplina` (
	`id` smallint(6) NOT NULL,
	`nomedisciplina` varchar(100) DEFAULT NULL,
	`ch` varchar(3) DEFAULT NULL,
	`semestre` varchar(5) DEFAULT NULL,
	idprofessor smallint 
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `disciplina`
--



-- --------------------------------------------------------

--
-- Estrutura para tabela `professor`
--

CREATE TABLE `professor` (
  `id` smallint(6) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `idade` smallint(6) DEFAULT NULL,
  `datanascimento` date DEFAULT NULL,
  `endereco` varchar(100) DEFAULT NULL,
  `estatus` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `professor`
--



--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `professor`
--
ALTER TABLE `professor`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE notaAluno(
	id smallint(6) primary key auto_increment,
    iddisciplina smallint(6) NOT NULL,
    idaluno smallint(6) NOT NULL,
    nota01 int,
    nota02 int,
    FOREIGN KEY (iddisciplina) REFERENCES disciplina(id) ON DELETE CASCADE,
	FOREIGN KEY (idaluno) REFERENCES aluno(id) ON DELETE CASCADE
);

INSERT INTO `disciplina` (`id`, `nomedisciplina`, `ch`, `semestre`) VALUES
(1, 'PSW1', '060', '2'),
(2, 'MATEMATICA', '070', '2');

INSERT INTO `aluno` (`id`, `nome`, `idade`, `datanascimento`, `endereco`, `estatus`) VALUES
(1, 'Valdir Neto', '18', '2005-07-02', 'Bairro Sandoval', '1'),
(2, 'Ezequiel', '17', '2006-10-04', 'Pindai', '0'),
(3, 'Victor Hugo', '18', '2004-11-08', 'Pilões', '1');

INSERT INTO `professor` (`id`, `nome`, `cpf`, `idade`, `datanascimento`, `endereco`, `estatus`) VALUES
(1, 'FABIO LIMA', '11111111111', 30, '2013-07-01', 'RUA DEZ DE NOVEMBRO, 23', 1),
(2, 'REINECHINI DA SILVA', '22222222222', 34, '1990-07-08', 'RUA DA GLOBO, 45', 0);

INSERT INTO `notaAluno` (`id`, `iddisciplina`, `idaluno`, `nota01`, `nota02`) VALUES
(1, 1, 2, 80, 50),
(2, 2, 2, 90, 70),
(3, 1, 3, 50, 70),
(4, 2, 3, 60, 40);