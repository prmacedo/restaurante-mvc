-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 01-Mar-2021 às 20:28
-- Versão do servidor: 10.1.36-MariaDB
-- versão do PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_restaurante`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `bebida`
--

CREATE TABLE `bebida` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `fornecedor` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `bebida`
--

INSERT INTO `bebida` (`id`, `nome`, `preco`, `fornecedor`) VALUES
(1, 'Coca-Cola 1L', '4.50', 'Coca-Cola'),
(2, 'GuaranÃ¡ Antarctica 1L', '3.50', 'GuaranÃ¡ Antarctica'),
(3, 'GuaranÃ¡ Antarctica 2L', '6.00', 'GuaranÃ¡ Antarctica'),
(4, 'Fanta Laranja 1L', '3.50', 'Fanta'),
(7, 'Coca-Cola 2L', '8.50', 'Coca-Cola'),
(9, 'Ãgua', '2.00', 'Ãgua');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` char(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bonus` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `cpf`, `bonus`) VALUES
(1, 'Jayme AntÃ´nio', 'jayme@gmail.com', '12345678910', '3.47'),
(5, 'Joao', 'joao@gmail.com', '12345678911', '0.00'),
(6, 'Ana ', 'ana@gmail.com', '12345678920', '5.26'),
(11, 'Clara', 'clara@gmail.com', '12345678900', '0.00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `comida`
--

CREATE TABLE `comida` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `preco` decimal(5,2) NOT NULL,
  `descricao` tinytext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `comida`
--

INSERT INTO `comida` (`id`, `nome`, `preco`, `descricao`) VALUES
(1, 'MacarrÃ£o', '16.90', 'MacarrÃ£o temperado ao alho e Ã³leo'),
(2, 'Misto', '5.90', 'PÃ£o, queijo e presunto'),
(3, 'Batata Frita', '11.90', 'Batata frita');

-- --------------------------------------------------------

--
-- Estrutura da tabela `conta`
--

CREATE TABLE `conta` (
  `id` int(11) NOT NULL,
  `mesa` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `valor_total` decimal(6,2) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `status` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `conta`
--

INSERT INTO `conta` (`id`, `mesa`, `cliente_id`, `valor_total`, `data`, `hora`, `status`) VALUES
(8, 4, 1, '42.30', '2020-12-01', '11:30:00', 'Pago'),
(10, 4, 1, '37.30', '2020-12-01', '17:26:00', 'Pago'),
(12, 5, 5, '66.20', '2020-12-02', '09:45:00', 'Pago'),
(14, 8, 5, '44.30', '2020-12-02', '09:58:00', 'Pago'),
(15, 8, 5, '0.00', '2020-12-02', '09:59:00', 'Em preparo'),
(20, 9, 1, '30.30', '2020-12-02', '11:42:00', 'Pago'),
(21, 9, 1, '24.27', '2020-12-02', '12:15:00', 'Pago'),
(25, 3, 1, '0.00', '2020-12-03', '08:45:00', 'Aberta'),
(26, 9, 6, '31.80', '2020-12-02', '10:55:00', 'Pago'),
(27, 9, 6, '61.52', '2020-12-03', '10:59:00', 'Pago'),
(28, 9, 6, '0.00', '2020-12-03', '11:02:00', 'Pronto'),
(29, 8, 6, '52.60', '2020-12-03', '11:02:00', 'Pago'),
(30, 8, 6, '0.00', '2020-12-03', '11:03:00', 'Em preparo'),
(34, 8, 6, '0.00', '2020-12-03', '11:15:00', 'Em preparo'),
(35, 8, 6, '0.00', '2020-12-03', '11:16:00', 'Em preparo'),
(36, 4, 1, '80.07', '2020-12-08', '12:25:00', 'Pago'),
(39, 4, 1, '42.70', '2020-12-08', '20:05:00', 'Pago'),
(40, 3, 1, '34.70', '2020-12-08', '20:17:00', 'Pago'),
(41, 3, 1, '0.00', '2020-12-08', '20:17:00', 'Aberta'),
(42, 3, 1, '0.00', '2020-12-08', '20:18:00', 'Em preparo'),
(43, 8, 1, '0.00', '2021-03-01', '16:27:00', 'Aberta');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cozinheiro`
--

CREATE TABLE `cozinheiro` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `cozinheiro`
--

INSERT INTO `cozinheiro` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Paulo MacÃªdo', 'paulo@gmail.com', '123'),
(5, 'MÃ¡rcia', 'marcia@gmail.com', '123');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gerente`
--

CREATE TABLE `gerente` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `senha` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `gerente`
--

INSERT INTO `gerente` (`id`, `nome`, `email`, `senha`) VALUES
(1, 'Pedro Lima', 'pedrolim@gmail.com', 'admin');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) NOT NULL,
  `conta_id` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id`, `conta_id`, `data`) VALUES
(1, 8, '2020-12-01'),
(2, 12, '2020-12-02'),
(3, 14, '2020-12-02'),
(4, 10, '2020-12-02'),
(5, 18, '2020-12-02'),
(6, 20, '2020-12-02'),
(7, 21, '2020-12-03'),
(8, 26, '2020-12-03'),
(9, 27, '2020-12-03'),
(10, 29, '2020-12-03'),
(11, 36, '2020-12-08'),
(12, 39, '2020-12-09'),
(13, 40, '2020-12-09');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pedido`
--

CREATE TABLE `pedido` (
  `id` int(11) NOT NULL,
  `produto_id` int(11) NOT NULL,
  `produto_qtd` int(11) NOT NULL,
  `produto_tipo` char(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conta_id` int(11) NOT NULL,
  `valor_parcial` decimal(6,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `pedido`
--

INSERT INTO `pedido` (`id`, `produto_id`, `produto_qtd`, `produto_tipo`, `conta_id`, `valor_parcial`) VALUES
(11, 1, 2, 'comida', 8, '33.80'),
(12, 1, 1, 'bebida', 8, '8.50'),
(19, 1, 2, 'comida', 10, '33.80'),
(20, 2, 1, 'bebida', 10, '3.50'),
(21, 1, 3, 'comida', 12, '50.70'),
(22, 1, 1, 'bebida', 12, '8.50'),
(23, 2, 1, 'bebida', 12, '3.50'),
(24, 3, 1, 'bebida', 12, '3.50'),
(25, 1, 2, 'comida', 14, '33.80'),
(26, 3, 1, 'bebida', 14, '3.50'),
(27, 4, 2, 'bebida', 14, '7.00'),
(28, 1, 2, 'comida', 15, '33.80'),
(29, 4, 2, 'bebida', 15, '7.00'),
(33, 1, 1, 'comida', 20, '16.90'),
(34, 2, 1, 'comida', 20, '5.90'),
(35, 1, 1, 'bebida', 20, '4.50'),
(36, 3, 1, 'bebida', 20, '6.00'),
(37, 1, 1, 'comida', 21, '16.90'),
(38, 2, 1, 'comida', 21, '5.90'),
(39, 1, 1, 'bebida', 21, '4.50'),
(40, 1, 1, 'comida', 26, '16.90'),
(41, 2, 1, 'comida', 26, '5.90'),
(42, 1, 2, 'bebida', 26, '9.00'),
(43, 1, 2, 'comida', 27, '33.80'),
(44, 2, 1, 'comida', 27, '5.90'),
(45, 1, 1, 'bebida', 27, '4.50'),
(46, 2, 1, 'bebida', 27, '3.50'),
(47, 7, 2, 'bebida', 27, '17.00'),
(48, 1, 2, 'comida', 28, '33.80'),
(49, 2, 1, 'comida', 28, '5.90'),
(50, 2, 1, 'bebida', 28, '3.50'),
(51, 1, 2, 'comida', 29, '33.80'),
(52, 2, 2, 'comida', 29, '11.80'),
(53, 2, 2, 'bebida', 29, '7.00'),
(54, 1, 2, 'comida', 30, '33.80'),
(55, 2, 2, 'comida', 30, '11.80'),
(56, 1, 1, 'comida', 34, '16.90'),
(57, 2, 1, 'comida', 34, '5.90'),
(58, 1, 1, 'comida', 35, '16.90'),
(59, 2, 1, 'comida', 35, '5.90'),
(60, 1, 1, 'comida', 36, '16.90'),
(61, 2, 1, 'comida', 36, '5.90'),
(62, 3, 1, 'comida', 36, '11.90'),
(63, 1, 1, 'bebida', 36, '4.50'),
(64, 2, 1, 'bebida', 36, '3.50'),
(65, 3, 1, 'bebida', 36, '6.00'),
(66, 1, 2, 'comida', 36, '33.80'),
(67, 1, 1, 'comida', 39, '16.90'),
(68, 2, 1, 'comida', 39, '5.90'),
(69, 3, 1, 'comida', 39, '11.90'),
(70, 1, 1, 'bebida', 39, '4.50'),
(71, 2, 1, 'bebida', 39, '3.50'),
(74, 1, 1, 'comida', 40, '16.90'),
(75, 2, 1, 'comida', 40, '5.90'),
(76, 3, 1, 'comida', 40, '11.90'),
(77, 1, 1, 'comida', 42, '16.90');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bebida`
--
ALTER TABLE `bebida`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `comida`
--
ALTER TABLE `comida`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conta`
--
ALTER TABLE `conta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_id` (`cliente_id`) USING BTREE;

--
-- Indexes for table `cozinheiro`
--
ALTER TABLE `cozinheiro`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `gerente`
--
ALTER TABLE `gerente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conta_id` (`conta_id`);

--
-- Indexes for table `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conta_id` (`conta_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bebida`
--
ALTER TABLE `bebida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comida`
--
ALTER TABLE `comida`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `conta`
--
ALTER TABLE `conta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `cozinheiro`
--
ALTER TABLE `cozinheiro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gerente`
--
ALTER TABLE `gerente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pedido`
--
ALTER TABLE `pedido`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `conta`
--
ALTER TABLE `conta`
  ADD CONSTRAINT `conta_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD CONSTRAINT `pagamento_ibfk_1` FOREIGN KEY (`conta_id`) REFERENCES `conta` (`id`);

--
-- Limitadores para a tabela `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`conta_id`) REFERENCES `conta` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
