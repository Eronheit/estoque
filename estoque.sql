-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 08-Nov-2018 às 19:15
-- Versão do servidor: 10.1.33-MariaDB
-- PHP Version: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estoque`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `admin`
--

CREATE TABLE `admin` (
  `idadmin` int(11) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`idadmin`, `usuario`, `senha`, `image`) VALUES
(1, 'Cristiano', 'cristiano', 'bbad900e63b410d0e85bfa715b2f49d0.gif'),
(2, 'Joseniltom', 'joseniltom', '77485cd6f1a72c981a46fa9527f38f60.gif');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alocacao`
--

CREATE TABLE `alocacao` (
  `idalocacao` int(11) NOT NULL,
  `ferramenta` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `data_saida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `empresa` varchar(100) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `status_saida` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alocacao`
--

INSERT INTO `alocacao` (`idalocacao`, `ferramenta`, `usuario`, `data_saida`, `empresa`, `setor`, `status_saida`) VALUES
(5, 'Martelo', 'Luis Gustavo Souza Maciel ', '2018-11-05 17:51:24', 'Nossa Fruta', 'Cozinha', 'Funcionando'),
(7, 'Maquita', 'Eronaldo Peixoto de Aquino ', '2018-11-08 17:31:43', 'Brisanet', 'ConstruÃ§Ã£o', 'Funcionando'),
(8, 'Vestido', 'Luis Gustavo Souza Maciel ', '2018-11-08 17:31:50', 'Nossa Fruta', 'Cozinha', 'Funcionando'),
(9, 'Geraldo Alckmin', 'Cristiano Benevides', '2018-11-08 17:33:17', 'AgriTech', 'GestÃ£o', 'Funcionando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ferramenta`
--

CREATE TABLE `ferramenta` (
  `idferramenta` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `situacao` int(1) NOT NULL,
  `status_saida` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ferramenta`
--

INSERT INTO `ferramenta` (`idferramenta`, `nome`, `situacao`, `status_saida`) VALUES
(6, 'Maquita', 1, 'Funcionando'),
(7, 'Vestido', 1, 'Funcionando'),
(8, 'Geraldo Alckmin', 1, 'Funcionando'),
(9, 'Serra Circular', 0, 'Funcionando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `setor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nome`, `empresa`, `setor`) VALUES
(1, 'Eronaldo Peixoto de Aquino ', 'Brisanet', 'ConstruÃ§Ã£o'),
(2, 'Luis Gustavo Souza Maciel ', 'Nossa Fruta', 'Cozinha'),
(3, 'Josimar Martins Pereira Junior', 'AgriTech', 'Agoador'),
(4, 'Josenildo Henrique Gurgel de Almeida', 'AgriTech', 'Engenharia'),
(5, 'Cristiano Benevides', 'AgriTech', 'GestÃ£o');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`idadmin`);

--
-- Indexes for table `alocacao`
--
ALTER TABLE `alocacao`
  ADD PRIMARY KEY (`idalocacao`);

--
-- Indexes for table `ferramenta`
--
ALTER TABLE `ferramenta`
  ADD PRIMARY KEY (`idferramenta`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alocacao`
--
ALTER TABLE `alocacao`
  MODIFY `idalocacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `ferramenta`
--
ALTER TABLE `ferramenta`
  MODIFY `idferramenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
