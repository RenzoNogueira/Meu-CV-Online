Skip to content Search
or jump to … Pull requests Issues Marketplace Explore @RenzoNogueira RenzoNogueira / Meu - CV - Online Public Code Issues Pull requests Actions Projects Wiki Security Insights Settings Meu - CV - Online / backup - data - base / rzssn.sql @EvolueDEVs EvolueDEVs Adicionado contador de visualizações.Dashborad iniciado.Tentativa d … … Latest commit 16179e6 24 days ago History 2 contributors @RenzoNogueira @EvolueDEVs 160 lines (127 sloc) 4.45 KB -- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08-Mar-2022 às 22:21
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.3.31
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Extraindo dados da tabela `blog`
--
INSERT INTO
  `blog` (
    `itemId`,
    `title`,
    `description`,
    `content`,
    `srcImg`,
    `dataPublicacao`
  )
VALUES
  (
    1,
    'Publicação 1',
    'Teste',
    'Teste',
    'assets/content-blog/exemple-blog-image.jpg',
    '2021-11-02 16:23:54'
  ),
  (
    2,
    'Publicação 2',
    'Teste',
    'Teste',
    'assets/content-blog/exemple-blog-image.jpg',
    '2021-11-02 16:23:54'
  ),
  (
    3,
    'Publicação 3',
    'Teste',
    'Teste',
    'assets/content-blog/exemple-blog-image.jpg',
    '2021-11-02 16:23:54'
  ),
  (
    4,
    'Publicação 4',
    'Teste',
    'Teste',
    'assets/content-blog/exemple-blog-image.jpg',
    '2021-11-02 16:23:54'
  ),
  (
    5,
    'Publição 5',
    'Teste',
    'Teste',
    'assets/content-blog/exemple-blog-image.jpg',
    '2021-11-02 16:23:54'
  ),
  (
    6,
    'Publicação 6',
    'Teste',
    'Teste',
    'assets/content-blog/exemple-blog-image.jpg',
    '2021-11-02 16:23:54'
  ),
  (
    7,
    'Publicação 7',
    'Teste',
    'Teste',
    'assets/content-blog/exemple-blog-image.jpg',
    '2021-11-02 16:23:54'
  ),
  (
    8,
    'Publição 8',
    'Teste',
    'Teste',
    'assets/content-blog/exemple-blog-image.jpg',
    '2021-11-02 16:23:54'
  );

-- --------------------------------------------------------
--
-- Estrutura da tabela `info`
--
CREATE TABLE `info` (`visualizacoes` int(11) NOT NULL DEFAULT 0) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Extraindo dados da tabela `info`
--
INSERT INTO
  `info` (`visualizacoes`)
VALUES
  (36);

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Extraindo dados da tabela `portifolio`
--
INSERT INTO
  `portifolio` (
    `itemId`,
    `title`,
    `description`,
    `srcImg`,
    `data-cadastro`,
    `linkProject`
  )
VALUES
  (
    1,
    'Teste',
    'teste',
    'assets/img-portifolio/captura-bira-churrasqueiras.PNG',
    '2021-11-02 16:09:23',
    'https://birachurrasqueiras.com.br'
  );

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
) ENGINE = InnoDB DEFAULT CHARSET = utf8;

--
-- Extraindo dados da tabela `user`
--
INSERT INTO
  `user` (
    `id`,
    `name`,
    `password`,
    `sessiontoken`,
    `dataatualizacaosessiontoken`
  )
VALUES
  (
    1,
    'renzo_nogueira',
    '$2y$10$snWJDs5b1tQRBeGbDIs9L.SpyuiyiO7ALDWjxz8TvAg4/5JpAtzr.',
    '$2y$10$Sph3swi5PdpXdY5oN9T1JOTs0hmhQJtzhjPmFn/ikAFTvroXoP0Y.',
    '08/03/2022 09:1'
  );

--
-- Índices para tabelas despejadas
--
--
-- Índices para tabela `blog`
--
ALTER TABLE
  `blog`
ADD
  PRIMARY KEY (`itemId`);

--
-- Índices para tabela `portifolio`
--
ALTER TABLE
  `portifolio`
ADD
  PRIMARY KEY (`itemId`);

--
-- Índices para tabela `user`
--
ALTER TABLE
  `user`
ADD
  PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--
--
-- AUTO_INCREMENT de tabela `blog`
--
ALTER TABLE
  `blog`
MODIFY
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT de tabela `portifolio`
--
ALTER TABLE
  `portifolio`
MODIFY
  `itemId` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE
  `user`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 2;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;

© 2022 GitHub,
Inc.Terms Privacy Security Status Docs Contact GitHub Pricing API Training Blog About