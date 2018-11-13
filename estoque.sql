-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Nov-2018 às 20:58
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
  `senha` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `admin`
--

INSERT INTO `admin` (`idadmin`, `usuario`, `senha`) VALUES
(1, 'Cristiano', 'cristiano');

-- --------------------------------------------------------

--
-- Estrutura da tabela `alocacao`
--

CREATE TABLE `alocacao` (
  `idalocacao` int(11) NOT NULL,
  `ferramenta` varchar(100) NOT NULL,
  `qnt` int(11) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `data_saida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `empresa` varchar(100) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `status_saida` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `alocacao`
--

INSERT INTO `alocacao` (`idalocacao`, `ferramenta`, `qnt`, `sigla`, `usuario`, `data_saida`, `empresa`, `setor`, `status_saida`) VALUES
(47, 'Marcio', 200, 'Und', 'Geraldo Rossi de Almeida', '2018-11-13 17:51:44', 'Nossa Fruta', 'ConstruÃ§Ã£o', 'Funcionando'),
(48, 'Marcio', 300, 'Und', 'JoÃ£o Bezerra Cardoso de Lima', '2018-11-13 17:52:19', 'AgriTech', 'PlantaÃ§Ã£o', 'Funcionando'),
(49, 'Marcio', 300, 'Und', 'JoÃ£o Bezerra Cardoso de Lima', '2018-11-13 17:55:43', 'AgriTech', 'PlantaÃ§Ã£o', 'Funcionando'),
(50, 'Marcio', 99, 'Und', 'Geraldo Rossi de Almeida', '2018-11-13 17:56:09', 'Nossa Fruta', 'ConstruÃ§Ã£o', 'Funcionando'),
(51, 'Marcio', 1, 'Und', 'Geraldo Rossi de Almeida', '2018-11-13 17:58:43', 'Nossa Fruta', 'ConstruÃ§Ã£o', 'Funcionando'),
(52, 'Lanche', 100, 'Und', '', '2018-11-13 18:00:56', '', '', 'Funcionando');

-- --------------------------------------------------------

--
-- Estrutura da tabela `ferramenta`
--

CREATE TABLE `ferramenta` (
  `idferramenta` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `qnt` int(11) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `situacao` int(1) NOT NULL,
  `status_saida` varchar(100) NOT NULL,
  `view` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `ferramenta`
--

INSERT INTO `ferramenta` (`idferramenta`, `nome`, `qnt`, `sigla`, `situacao`, `status_saida`, `view`) VALUES
(3, 'Maquita', 0, 'Und', 1, 'Funcionando', 3),
(4, 'Mangueira', 386, 'M', 1, 'Funcionando', 8),
(5, 'Mamaoa', 96, 'l', 1, 'Funcionando', 2),
(6, 'GilÃ³', 0, 'Und', 1, 'Funcionando', 3),
(7, 'Ionic', 330, 'L', 1, 'Funcionando', 4),
(8, 'VIROSE', 400, 'Und', 1, 'Funcionando', 2),
(9, 'Pindamanhangaba', 470, 'Und', 1, 'Funcionando', 3),
(10, 'Mastruz com leite', 200, 'L', 1, 'Funcionando', 1),
(11, 'Marcio', 0, 'Und', 1, 'Funcionando', 5),
(12, 'Lanche', 0, 'Und', 1, 'Funcionando', 1),
(13, 'Manga', 100, 'Und', 0, 'Funcionando', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `historico`
--

CREATE TABLE `historico` (
  `idalocacao` int(11) NOT NULL,
  `ferramenta` varchar(100) NOT NULL,
  `qnt` int(11) NOT NULL,
  `sigla` varchar(10) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `data_saida` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `empresa` varchar(100) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `status_saida` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `historico`
--

INSERT INTO `historico` (`idalocacao`, `ferramenta`, `qnt`, `sigla`, `usuario`, `data_saida`, `empresa`, `setor`, `status_saida`) VALUES
(45, 'Marcio', 200, 'Und', 'Geraldo Rossi de Almeida', '2018-11-13 17:51:44', 'Nossa Fruta', 'ConstruÃ§Ã£o', 'Funcionando'),
(46, 'Marcio', 300, 'Und', 'JoÃ£o Bezerra Cardoso de Lima', '2018-11-13 17:52:19', 'AgriTech', 'PlantaÃ§Ã£o', 'Funcionando'),
(47, 'Marcio', 300, 'Und', 'JoÃ£o Bezerra Cardoso de Lima', '2018-11-13 17:55:43', 'AgriTech', 'PlantaÃ§Ã£o', 'Funcionando'),
(48, 'Marcio', 99, 'Und', 'Geraldo Rossi de Almeida', '2018-11-13 17:56:09', 'Nossa Fruta', 'ConstruÃ§Ã£o', 'Funcionando'),
(49, 'Marcio', 1, 'Und', 'Geraldo Rossi de Almeida', '2018-11-13 17:58:43', 'Nossa Fruta', 'ConstruÃ§Ã£o', 'Funcionando'),
(50, 'Lanche', 100, 'Und', '', '2018-11-13 18:00:56', '', '', 'Funcionando');

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
(1, 'Geraldo Rossi de Almeida', 'Nossa Fruta', 'ConstruÃ§Ã£o'),
(2, 'Francisco Alves Marinho', 'Brisanet', 'Entrega'),
(3, 'JoÃ£o Bezerra Cardoso de Lima', 'AgriTech', 'PlantaÃ§Ã£o');

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
-- Indexes for table `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`idalocacao`);

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
  MODIFY `idadmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `alocacao`
--
ALTER TABLE `alocacao`
  MODIFY `idalocacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `ferramenta`
--
ALTER TABLE `ferramenta`
  MODIFY `idferramenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `historico`
--
ALTER TABLE `historico`
  MODIFY `idalocacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
