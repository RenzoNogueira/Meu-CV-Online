-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 10-Abr-2022 às 02:24
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 7.4.27

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
  `itemId` int(11) NOT NULL,
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
-- Estrutura da tabela `portifolio`
--

CREATE TABLE `portifolio` (
  `itemId` int(11) NOT NULL,
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
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(600) NOT NULL,
  `sessiontoken` varchar(300) NOT NULL,
  `dataatualizacaosessiontoken` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `password`, `sessiontoken`, `dataatualizacaosessiontoken`) VALUES
(1, 'renzo_nogueira', '$2y$10$snWJDs5b1tQRBeGbDIs9L.SpyuiyiO7ALDWjxz8TvAg4/5JpAtzr.', '$2y$10$WJVSD//FlAW/07BxxfDesuVs4JzZpKKHGxdhrcTSO.Xkd8w5Q3.O6', '06/03/2022 20:3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `views`
--

CREATE TABLE `views` (
  `id` int(11) NOT NULL,
  `ip` text DEFAULT NULL,
  `city` text DEFAULT NULL,
  `country` text DEFAULT NULL,
  `geonameId` int(11) DEFAULT NULL,
  `lat` double DEFAULT NULL,
  `lng` double DEFAULT NULL,
  `postalCode` text DEFAULT NULL,
  `region` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `views`
--

INSERT INTO `views` (`id`, `ip`, `city`, `country`, `geonameId`, `lat`, `lng`, `postalCode`, `region`) VALUES
(1, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District'),
(2, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District'),
(3, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District'),
(4, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District'),
(5, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District'),
(6, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District'),
(7, '187.121.146.215', 'Brasília', 'BR', 3469058, -15.77972, -47.92972, '', 'Federal District'),
(8, '187.121.146.215', '', '', 0, 0, 0, '', ''),
(9, '187.121.146.215', '', '', 0, 0, 0, '', ''),
(10, '187.121.146.215', '', '', 0, 0, 0, '', ''),
(11, '187.121.146.215', '', '', 0, 0, 0, '', ''),
(12, '187.121.146.215', '', '', 0, 0, 0, '', ''),
(13, '187.121.146.215', '', '', 0, 0, 0, '', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`itemId`);

--
-- Índices para tabela `portifolio`
--
ALTER TABLE `portifolio`
  ADD PRIMARY KEY (`itemId`);

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
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `portifolio`
--
ALTER TABLE `portifolio`
  MODIFY `itemId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `views`
--
ALTER TABLE `views`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
