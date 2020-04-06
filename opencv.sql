-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06-Abr-2020 às 02:51
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `opencv`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `reconhecimento`
--

CREATE TABLE `reconhecimento` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `imagem` longblob NOT NULL,
  `nome_img` varchar(255) NOT NULL,
  `tamanho` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `qt_rosto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reconhecimento`
--

INSERT INTO `reconhecimento` (`id`, `nome`, `sobrenome`, `imagem`, `nome_img`, `tamanho`, `tipo`, `status`, `qt_rosto`) VALUES
(2, 'Cristiano', 'Ronaldo', 0x433a78616d7070096d70706870343838432e746d70, 'ronaldo.jpg', '20671', 'image/jpeg', 'IMGRC', '1'),
(3, 'Neymar', 'Junior', 0x433a78616d7070096d70706870364546432e746d70, 'img-neymar-copa-do-mundo-2018.jpg', '124633', 'image/jpeg', 'IMGRC', '1'),
(4, 'Snarloff', 'Viado', 0x433a78616d7070096d70706870453934462e746d70, 'ezgif.com-webp-to-png.png', '321059', 'image/png', 'IMGRC', '1');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `reconhecimento`
--
ALTER TABLE `reconhecimento`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `reconhecimento`
--
ALTER TABLE `reconhecimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
