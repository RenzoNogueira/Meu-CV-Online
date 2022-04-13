-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 13-Abr-2022 às 23:04
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `u914795534_rzssn`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog`
--

CREATE TABLE `blog` (
  `itemId` int(11) NOT NULL COMMENT 'Publicações do blog.',
  `title` varchar(200) NOT NULL,
  `description` varchar(500) NOT NULL,
  `content` varchar(5000) NOT NULL,
  `srcImg` varchar(200) NOT NULL,
  `dataPublicacao` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `blog`
--

INSERT INTO `blog` (`itemId`, `title`, `description`, `content`, `srcImg`, `dataPublicacao`) VALUES
(1, 'Publicação 1', 'Teste', 'Teste', 'assets/content-blog/exemple-blog-image.jpg', '2021-11-02 16:23:54'),
(2, 'Publicação 2', 'Teste', 'Teste', 'assets/content-blog/exemple-blog-image.jpg', '2021-11-02 16:23:54'),
(3, 'Publicação 3', 'Teste', 'Teste', 'assets/content-blog/exemple-blog-image.jpg', '2021-11-02 16:23:54'),
(4, 'Publicação 4', 'Teste', 'Teste', 'assets/content-blog/exemple-blog-image.jpg', '2021-11-02 16:23:54'),
(5, 'Publição 5', 'Teste', 'Teste', 'assets/content-blog/exemple-blog-image.jpg', '2021-11-02 16:23:54'),
(6, 'Publicação 6', 'Teste', 'Teste', 'assets/content-blog/exemple-blog-image.jpg', '2021-11-02 16:23:54'),
(7, 'Publicação 7', 'Teste', 'Teste', 'assets/content-blog/exemple-blog-image.jpg', '2021-11-02 16:23:54'),
(8, 'Publição 8', 'Teste', 'Teste', 'assets/content-blog/exemple-blog-image.jpg', '2021-11-02 16:23:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL COMMENT 'Lista de clientes que preencheram o formulário de cadastro do orçamento.',
  `nome` text NOT NULL,
  `sobrenome` text NOT NULL,
  `email` text NOT NULL,
  `codigo_indicacao` text NOT NULL,
  `telefone` text NOT NULL,
  `bairro` text NOT NULL,
  `ciadade` text NOT NULL,
  `estado` text NOT NULL,
  `cep` text NOT NULL,
  `logradouro` text NOT NULL,
  `cpf` text DEFAULT NULL,
  `cnpj` text DEFAULT NULL,
  `tipo` text NOT NULL,
  `empresa_id` int(11) NOT NULL,
  `desconto_id` int(11) NOT NULL,
  `data_adesao` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `desconto`
--

CREATE TABLE `desconto` (
  `id` int(11) NOT NULL COMMENT 'Tabela de desconto para o cliente.',
  `nome` text NOT NULL,
  `descricao` text NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa_cliente`
--

CREATE TABLE `empresa_cliente` (
  `id` int(11) NOT NULL COMMENT 'Empresa do cliente.',
  `nome` text NOT NULL,
  `nome_representante` text NOT NULL,
  `cnpj` text NOT NULL,
  `email` text NOT NULL,
  `telefone` text NOT NULL,
  `bairro` text NOT NULL,
  `ciadade` text NOT NULL,
  `estado` text NOT NULL,
  `cep` text NOT NULL,
  `logradouro` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionalidades`
--

CREATE TABLE `funcionalidades` (
  `id` int(11) NOT NULL COMMENT 'Lista de funcionalidades para os sites dos clientes.',
  `nome` text NOT NULL,
  `descricao` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `portifolio`
--

CREATE TABLE `portifolio` (
  `itemId` int(11) NOT NULL COMMENT 'Lista dos meus portfolios.',
  `title` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `srcImg` varchar(200) NOT NULL,
  `data-cadastro` datetime NOT NULL,
  `linkProject` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `portifolio`
--

INSERT INTO `portifolio` (`itemId`, `title`, `description`, `srcImg`, `data-cadastro`, `linkProject`) VALUES
(1, 'Teste', 'teste', 'assets/img-portifolio/captura-bira-churrasqueiras.PNG', '2021-11-02 16:09:23', 'https://birachurrasqueiras.com.br');

-- --------------------------------------------------------

--
-- Estrutura da tabela `preco`
--

CREATE TABLE `preco` (
  `id` int(11) NOT NULL COMMENT 'Preços das funcionalidades.',
  `funcionalidade_id` int(11) NOT NULL,
  `preco` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL COMMENT 'Dados do site cliente.',
  `nome` text NOT NULL,
  `funcionalidades` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL COMMENT 'Usuários administradores do site.',
  `name` varchar(30) NOT NULL,
  `password` varchar(600) NOT NULL,
  `sessiontoken` varchar(300) NOT NULL COMMENT 'Token de seção. Usado para o lembrar de mim.',
  `dataatualizacaosessiontoken` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `sessiontoken`, `dataatualizacaosessiontoken`) VALUES
(1, 'renzo_nogueira', '$2y$10$snWJDs5b1tQRBeGbDIs9L.SpyuiyiO7ALDWjxz8TvAg4/5JpAtzr.', '$2y$10$Gv3Kurt./oOQ69ztAPfEjO0kUgoU4Bkj6Aa01F1jtvKVsoGB0Q0F.', '11/04/2022 16:5');

-- --------------------------------------------------------

--
-- Estrutura da tabela `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL COMMENT 'Histórioco de visualizações do site.',
  `ip` text NOT NULL COMMENT 'Necessário para obter a localização.',
  `city` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `geonameId` int(11) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `postalCode` text DEFAULT NULL,
  `region` text DEFAULT NULL,
  `data_entry` date NOT NULL DEFAULT current_timestamp() COMMENT 'Horário de entrada do dado.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `views`
--

INSERT INTO `views` (`id`, `ip`, `city`, `country`, `geonameId`, `lat`, `lng`, `postalCode`, `region`, `data_entry`) VALUES
(1, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(2, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(3, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(4, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(5, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(6, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(7, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(18, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(19, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(20, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(21, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(22, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(23, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(24, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(25, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(26, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(27, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(28, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(29, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(30, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(31, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(32, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(33, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(34, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(35, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(36, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(37, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(38, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(39, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(40, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(41, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(42, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(43, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(44, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(45, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(46, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(47, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(48, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(49, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(50, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(51, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(52, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(53, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(54, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(55, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(56, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(57, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(58, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-11'),
(59, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-12'),
(60, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-13'),
(61, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-13'),
(62, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-13'),
(63, '177.96.250.117', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District', '2022-04-13');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`itemId`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresaria_id` (`empresa_id`),
  ADD KEY `desconto_id` (`desconto_id`);

--
-- Índices para tabela `desconto`
--
ALTER TABLE `desconto`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa_cliente`
--
ALTER TABLE `empresa_cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionalidades`
--
ALTER TABLE `funcionalidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `portifolio`
--
ALTER TABLE `portifolio`
  ADD PRIMARY KEY (`itemId`);

--
-- Índices para tabela `preco`
--
ALTER TABLE `preco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcionalidade_id` (`funcionalidade_id`);

--
-- Índices para tabela `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `views`
--
ALTER TABLE `views`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `blog`
--
ALTER TABLE `blog`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Publicações do blog.', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Lista de clientes que preencheram o formulário de cadastro do orçamento.';

--
-- AUTO_INCREMENT de tabela `desconto`
--
ALTER TABLE `desconto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Tabela de desconto para o cliente.';

--
-- AUTO_INCREMENT de tabela `empresa_cliente`
--
ALTER TABLE `empresa_cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Empresa do cliente.';

--
-- AUTO_INCREMENT de tabela `funcionalidades`
--
ALTER TABLE `funcionalidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Lista de funcionalidades para os sites dos clientes.';

--
-- AUTO_INCREMENT de tabela `portifolio`
--
ALTER TABLE `portifolio`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Lista dos meus portfolios.', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `preco`
--
ALTER TABLE `preco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Preços das funcionalidades.';

--
-- AUTO_INCREMENT de tabela `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Dados do site cliente.';

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Usuários administradores do site.', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Histórioco de visualizações do site.', AUTO_INCREMENT=64;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresa_cliente` (`id`),
  ADD CONSTRAINT `cliente_ibfk_2` FOREIGN KEY (`desconto_id`) REFERENCES `desconto` (`id`);

--
-- Limitadores para a tabela `preco`
--
ALTER TABLE `preco`
  ADD CONSTRAINT `preco_ibfk_1` FOREIGN KEY (`funcionalidade_id`) REFERENCES `funcionalidades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
