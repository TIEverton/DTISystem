-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jan-2020 às 10:20
-- Versão do servidor: 10.4.8-MariaDB
-- versão do PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dtisystem`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `agrupamento`
--

CREATE TABLE `agrupamento` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `agrupamento`
--

INSERT INTO `agrupamento` (`id`, `nome`) VALUES
(1, 'caixa de som'),
(2, 'cabo VGA'),
(3, 'adaptador');

-- --------------------------------------------------------

--
-- Estrutura da tabela `campus`
--

CREATE TABLE `campus` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `cnpj` varchar(200) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `campus`
--

INSERT INTO `campus` (`id`, `nome`, `cnpj`, `endereco`, `bairro`) VALUES
(4, 'clinica escola', '1123', 'Rua B', 'Centro'),
(5, 'sede', '123', 'Rua a', 'Centro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `idEndereco` int(11) NOT NULL,
  `setor` varchar(100) NOT NULL,
  `funcionario` int(100) NOT NULL,
  `mac` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`idEndereco`, `setor`, `funcionario`, `mac`) VALUES
(5, 'DTI', 0, 'ttt');

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipamento`
--

CREATE TABLE `equipamento` (
  `id` int(11) NOT NULL,
  `numeracao` varchar(100) NOT NULL,
  `agrupamento` int(11) NOT NULL,
  `campus` int(11) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `equipamento`
--

INSERT INTO `equipamento` (`id`, `numeracao`, `agrupamento`, `campus`, `descricao`, `situacao`) VALUES
(9, '2', 1, 4, 'descricao 2', 0),
(10, '3', 1, 5, '', 1),
(12, '44', 2, 4, '', 1),
(13, '9898', 1, 4, '', 1),
(14, '1', 1, 5, '', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `campus` int(11) NOT NULL,
  `sala` int(11) NOT NULL,
  `equipamento` int(11) DEFAULT NULL,
  `agrupamento` int(11) NOT NULL,
  `responsavel` int(11) NOT NULL,
  `data` date NOT NULL,
  `turno` varchar(30) NOT NULL,
  `horario` varchar(10) NOT NULL,
  `observacoes` varchar(300) NOT NULL,
  `situacao` varchar(200) NOT NULL,
  `comentario_funcionario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `reserva`
--

INSERT INTO `reserva` (`id`, `campus`, `sala`, `equipamento`, `agrupamento`, `responsavel`, `data`, `turno`, `horario`, `observacoes`, `situacao`, `comentario_funcionario`) VALUES
(14, 4, 3, 9898, 1, 13, '2019-12-19', 'Tarde', '012', '', 'Devolvido', ''),
(15, 4, 8, NULL, 2, 13, '2019-12-20', 'Manhã', '0', '', 'Não entregado', ''),
(16, 4, 3, NULL, 1, 13, '2019-12-20', 'Manhã', '012', '', 'Não entregado', ''),
(17, 5, 4, NULL, 1, 12, '2019-12-20', 'Manhã', '01234', '', 'Não entregado', ''),
(18, 4, 3, NULL, 2, 12, '2019-12-20', 'Tarde', '1', '', 'Não entregado', ''),
(19, 4, 3, NULL, 2, 12, '2019-12-20', 'Noite', '123', '', 'Não entregado', ''),
(20, 4, 3, NULL, 1, 13, '2019-12-20', 'Noite', '3', '', 'Não entregado', ''),
(21, 4, 3, NULL, 2, 13, '2020-01-06', 'Manhã', '01234', '', 'Não entregado', ''),
(22, 4, 8, 9898, 1, 12, '2020-01-06', 'Manhã', '0123', '', 'Devolvido com problema', 'Seu lixo  ');

-- --------------------------------------------------------

--
-- Estrutura da tabela `sala`
--

CREATE TABLE `sala` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `campus` int(11) NOT NULL,
  `situacao` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `sala`
--

INSERT INTO `sala` (`id`, `nome`, `campus`, `situacao`) VALUES
(2, 'sala1', 5, 0),
(3, 'sala2', 4, 1),
(4, 'sala1', 5, 1),
(8, 'Sala4', 4, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(3) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `nivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `email`, `cpf`, `nivel`) VALUES
(12, 'Ãlisson', 'alisson1', '1234', 'as119459@gmail.com', '12', 1),
(13, 'Everton', 'everton', '123', 'everton@gmail.com', '123', 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `agrupamento`
--
ALTER TABLE `agrupamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `campus`
--
ALTER TABLE `campus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `id_2` (`id`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`idEndereco`);

--
-- Índices para tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agrupamento` (`agrupamento`),
  ADD KEY `campus` (`campus`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campus` (`campus`),
  ADD KEY `sala` (`sala`),
  ADD KEY `responsavel` (`responsavel`),
  ADD KEY `agrupamento` (`agrupamento`);

--
-- Índices para tabela `sala`
--
ALTER TABLE `sala`
  ADD PRIMARY KEY (`id`),
  ADD KEY `campus` (`campus`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `agrupamento`
--
ALTER TABLE `agrupamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `campus`
--
ALTER TABLE `campus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `idEndereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `equipamento`
--
ALTER TABLE `equipamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `sala`
--
ALTER TABLE `sala`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `equipamento`
--
ALTER TABLE `equipamento`
  ADD CONSTRAINT `equipamento_ibfk_1` FOREIGN KEY (`agrupamento`) REFERENCES `agrupamento` (`id`),
  ADD CONSTRAINT `equipamento_ibfk_2` FOREIGN KEY (`campus`) REFERENCES `campus` (`id`);

--
-- Limitadores para a tabela `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`campus`) REFERENCES `campus` (`id`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`sala`) REFERENCES `sala` (`id`),
  ADD CONSTRAINT `reserva_ibfk_4` FOREIGN KEY (`responsavel`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `reserva_ibfk_5` FOREIGN KEY (`agrupamento`) REFERENCES `agrupamento` (`id`);

--
-- Limitadores para a tabela `sala`
--
ALTER TABLE `sala`
  ADD CONSTRAINT `sala_ibfk_1` FOREIGN KEY (`campus`) REFERENCES `campus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
