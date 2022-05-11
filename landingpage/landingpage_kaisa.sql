-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 01-Jun-2021 às 01:08
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `landingpage_kaisa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `desenvolvedores`
--

DROP TABLE IF EXISTS `desenvolvedores`;
CREATE TABLE IF NOT EXISTS `desenvolvedores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `sexo` char(1) NOT NULL,
  `idade` int(3) NOT NULL,
  `hobby` varchar(150) NOT NULL,
  `datanascimento` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `tpusuario` char(1) NOT NULL COMMENT 'M = Master, G = Geral',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `desenvolvedores`
--

INSERT INTO `desenvolvedores` (`id`, `nome`, `sexo`, `idade`, `hobby`, `datanascimento`, `email`, `senha`, `tpusuario`) VALUES
(4, 'Benjamin Filipe Kauê Viana', 'M', 35, 'Cozinhar', '1986-05-31', 'benjaminfilipe@arysta.com.br', 'ben', 'G'),
(14, 'Elias Daniel Yuri da Cruz', 'M', 28, 'Escutar música', '1993-05-31', 'eliascruz@fepextrusao.com.br', '321', 'M'),
(13, 'Amandaa Fernanda Liz Almada', 'F', 30, 'Corrida', '1991-05-31', 'aamanda@gmail.com.br', '123', 'G');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
