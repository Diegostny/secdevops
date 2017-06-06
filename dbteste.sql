-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 24/03/2017 às 02:14
-- Versão do servidor: 10.1.19-MariaDB
-- Versão do PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbteste`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `paciente`
--

CREATE TABLE `paciente` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `nascimento` date DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `dtEntrada` date DEFAULT NULL,
  `telRes` varchar(12) DEFAULT NULL,
  `telCel` varchar(12) DEFAULT NULL,
  `telCom` varchar(12) DEFAULT NULL,
  `telAd` varchar(12) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `numero` varchar(12) DEFAULT NULL,
  `cidade` varchar(30) DEFAULT NULL,
  `estado` varchar(12) DEFAULT NULL,
  `info` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `paciente`
--

INSERT INTO `paciente` (`id`, `nome`, `nascimento`, `sexo`, `dtEntrada`, `telRes`, `telCel`, `telCom`, `telAd`, `email`, `endereco`, `numero`, `cidade`, `estado`, `info`) VALUES
(4, 'Paulo da Silveira', '1965-03-02', 'Masculino', '2017-03-01', '5135900000', '51991776371', '', '', 'paulo@email.com', 'Rua SÃ£o JoÃ£o', '600', 'SÃ£o Leopoldo', 'RS', 'Texto com acentuaÃ§Ã£o.'),
(7, 'Joao', '1978-04-24', 'Masculino', '2017-03-07', '5135745454', '', '', '', '', 'rua ', '444', 'SÃ£o Leopoldo', 'RS', 'texto para informaÃ§Ã£o');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tbImagens`
--

CREATE TABLE `tbImagens` (
  `id` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `url` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `tbImagens`
--

INSERT INTO `tbImagens` (`id`, `nome`, `url`) VALUES
(1, 'imagem1', 'https://unsplash.it/0/0?image=12'),
(2, 'imagem2', 'https://unsplash.it/0/0?image=13'),
(3, 'imagem3', 'https://unsplash.it/0/0?image=14'),
(4, 'imagem4', 'https://unsplash.it/0/0?image=15');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(40) NOT NULL,
  `funcao` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `senha`, `funcao`) VALUES
(1, 'Diego', 'diego@segapp', '8354336224c63279aadd00a9621757ef4fdf31fc', 0),
(2, 'Fernando', 'fernando@segapp', 'ec3e661d7bc7bfbf5334e7dfad309f947dace5f7', 1),
(3, 'Jean', 'jean@segapp', '51f8b1fa9b424745378826727452997ee2a7c3d7', 2),
(4, 'Filipe', 'filipe@segapp', '083492e00133365f6cb687f28d18f33c902ff499', 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tbImagens`
--
ALTER TABLE `tbImagens`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `paciente`
--
ALTER TABLE `paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de tabela `tbImagens`
--
ALTER TABLE `tbImagens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
