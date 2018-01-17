-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09-Set-2017 às 23:39
-- Versão do servidor: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `manifestacao`
--
CREATE DATABASE IF NOT EXISTS `manifestacao` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `manifestacao`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `acessos`
--

CREATE TABLE `acessos` (
  `id` int(11) NOT NULL,
  `data_acesso` date NOT NULL,
  `sistema` varchar(50) NOT NULL,
  `qtde` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acessos`
--

INSERT INTO `acessos` (`id`, `data_acesso`, `sistema`, `qtde`) VALUES
(1, '2017-09-09', 'WINNT', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `autores` varchar(100) DEFAULT NULL,
  `localizacao` varchar(100) DEFAULT NULL,
  `resumo` text NOT NULL,
  `caracteristicas` varchar(200) DEFAULT NULL,
  `coordenador` varchar(100) DEFAULT NULL,
  `local_ensaio` varchar(100) DEFAULT NULL,
  `ponto_cultura` varchar(100) DEFAULT NULL,
  `informacoes` varchar(200) DEFAULT NULL,
  `usuario` int(11) DEFAULT NULL,
  `data_pub` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `data_inicio`, `data_fim`, `autores`, `localizacao`, `resumo`, `caracteristicas`, `coordenador`, `local_ensaio`, `ponto_cultura`, `informacoes`, `usuario`, `data_pub`) VALUES
(2, 'Carnaval Mineiro', '2017-09-08', '2017-09-10', 'Eu ', 'Belo Horizonte - MG', 'Acontece em Fevereiro', 'Muitas caracerÃ­sticas', 'Marco', 'Lugar Nenhum', 'Belo Horizonte', 'Gerais', 1, '2017-09-09'),
(3, 'Janeiro Ardente', '2017-09-02', '2017-09-04', 'jjjj', 'jjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjjj', 'jjjjjjjjjjjjjjjjjjjj', 1, '2017-09-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `img`
--

CREATE TABLE `img` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `endereco` varchar(100) NOT NULL,
  `ex` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `img`
--

INSERT INTO `img` (`id`, `nome`, `endereco`, `ex`) VALUES
(1, '150499199159b45af739fda.jpg', 'imagens/150499199159b45af739fda.jpg', 2),
(2, '150499205259b45b348fe0d.jpg', 'imagens/150499205259b45b348fe0d.jpg', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `nascimento` date DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nivel` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

create table mensagens(
	id int auto_increment primary key,
    nome varchar(50),
    email varchar(50),
    mensagem text
);

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `sobrenome`, `nascimento`, `email`, `senha`) VALUES
(1, 'Marco', 'A. Almeida', '1997-10-03', 'marco@gmail.com', '0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acessos`
--
ALTER TABLE `acessos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`);

--
-- Indexes for table `img`
--
ALTER TABLE `img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ex` (`ex`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acessos`
--
ALTER TABLE `acessos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `img`
--
ALTER TABLE `img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `img`
--
ALTER TABLE `img`
  ADD CONSTRAINT `img_ibfk_1` FOREIGN KEY (`ex`) REFERENCES `eventos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
