-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30-Out-2018 às 20:46
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
(16, 'PÃ¡', 'Eronaldo', '2018-10-26 19:31:07', 'Brisanet', 'Cozinha', 'Funcionando'),
(17, 'PÃ¡', 'Eronaldo', '2018-10-26 19:41:01', 'AgriTech', 'ConstruÃ§Ã£o', 'Funcionando');

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
(5, 'Martelo', 0, 'Funcionando'),
(6, 'Foice', 0, 'Defeituosa'),
(7, 'Maquita', 0, 'Defeituosa'),
(9, 'PÃ¡', 1, 'Funcionando'),
(11, 'Papel Aluminio', 0, 'Funcionando'),
(13, 'Caneta de Pescar', 0, 'Funcionando');

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
(10, 'Geraldo Alckmin', 'Brisanet', 'Furto Qualificado'),
(12, 'Eronaldo', 'Brisanet', 'Cozinha'),
(13, 'Gustavo', 'Brisanet', 'ConstruÃ§Ã£o'),
(14, 'Gabriel', 'AgriTech', 'GestÃ£o'),
(15, 'Joao', 'Brisanet', 'AdministraÃ§Ã£o'),
(16, 'Cristiano', 'Nossa Fruta', 'Garagem'),
(17, 'Elivam', 'Nossa Fruta', 'ConstruÃ§Ã£o');

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
  MODIFY `idalocacao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `ferramenta`
--
ALTER TABLE `ferramenta`
  MODIFY `idferramenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
