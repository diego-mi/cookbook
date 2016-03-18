-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 17-Mar-2016 às 17:17
-- Versão do servidor: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `documentacao`
--
DROP TABLE IF EXISTS `post`;
DROP TABLE IF EXISTS `subcategoria`;
DROP TABLE IF EXISTS `categoria`;
DROP TABLE IF EXISTS `tipo`;
DROP TABLE IF EXISTS `user`;
DROP VIEW IF EXISTS `vwpost`;
DROP VIEW IF EXISTS `vwsubcategoria`;
DROP VIEW IF EXISTS `vwcategoria`;
DROP VIEW IF EXISTS `vwtipo`;
-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar (100) NOT NULL,
  `descricao` longtext NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`, `data_criacao`, `tipo_id`) VALUES
(1, 'Controller', 'Controller', '2016-03-15 14:56:50', 5),
(2, 'Service', 'Service', '2016-03-15 14:56:50', 5),
(3, 'Tipos', 'Tipos', '2016-03-16 14:41:59', 7),
(4, 'Categorias', 'Categorias', '2016-03-16 14:42:05', 7),
(5, 'Subcategorias', 'Subcategorias', '2016-03-16 14:41:50', 7);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `conteudo` longtext NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `subcategoria_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `titulo`, `conteudo`, `data_criacao`, `subcategoria_id`, `user_id`) VALUES
(1, 'Como usar', 'Como usar flexigrid', '2016-03-15 14:58:59', 1, 1),
(2, 'Como usar Flexigrid 2', 'Conteudo explicativo de como usar a segunda forma da flexigrid', '2016-03-16 12:31:08', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `categoria_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `nome`, `descricao`, `data_criacao`, `categoria_id`) VALUES
(1, 'Flexigrid', 'Flexigrid', '2016-03-15 14:57:41', 1),
(2, 'getParamFromRoute', 'getParamFromRoute', '2016-03-15 14:57:41', 1),
(3, 'Listar', 'Listar', '2016-03-16 14:43:34', 3),
(4, 'Criar', 'Criar', '2016-03-16 14:43:34', 3),
(10, 'Listar', 'Listar', '2016-03-16 14:54:44', 4),
(11, 'Criar', 'Criar', '2016-03-16 14:54:44', 4),
(12, 'Listar', 'Listar', '2016-03-16 14:55:02', 5),
(13, 'Criar', 'Criar', '2016-03-16 14:55:02', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`, `descricao`, `data_criacao`) VALUES
(5, 'Inepzend.doc', 'Inepzend.doc', '2016-03-17 15:50:42'),
(6, 'Gerador', 'Gerador', '2016-03-15 14:56:02'),
(7, 'Criar', 'Criar', '2016-03-15 17:41:51');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(40) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(255) NOT NULL,
  `picture` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `name`, `username`, `email`, `password`, `picture`) VALUES
(1, 'Diego Mi Campos', 'diegomi', 'diegomister@gmail.com', '1234', '560a914bb9ae5.jpg');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwpost`
--
CREATE TABLE IF NOT EXISTS `vwpost` (
`id_post` int(11)
,`titulo_post` varchar(100)
,`conteudo_post` longtext
,`data_criacao_post` timestamp
,`id_subcategoria` int(11)
,`descricao_subcategoria` varchar(100)
,`id_categoria` int(11)
,`descricao_categoria` varchar(100)
,`id_tipo` int(11)
,`descricao_tipo` varchar(100)
,`id_user` int(11)
,`nome_user` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwtipo`
--
CREATE TABLE IF NOT EXISTS `vwtipo` (
`id_tipo` int(11)
,`nome_tipo` varchar(100)
,`descricao_tipo` longtext
,`data_criacao_tipo` timestamp
,`qt_categoria` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwcategoria`
--
CREATE TABLE IF NOT EXISTS `vwcategoria` (
`id_categoria` int(11)
,`nome_categoria` varchar(100)
,`descricao_categoria` longtext
,`data_criacao_categoria` timestamp
,`qt_subcategoria` bigint(21)
,`id_tipo` int(11)
,`nome_tipo` varchar(100)
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `vwsubcategoria`
--
CREATE TABLE IF NOT EXISTS `vwsubcategoria` (
`id_subcategoria` int(11)
,`nome_subcategoria` varchar(100)
,`descricao_subcategoria` longtext
,`data_criacao_subcategoria` timestamp
,`qt_post` bigint(21)
,`id_categoria` int(11)
,`nome_categoria` varchar(100)
);

-- --------------------------------------------------------

--
-- Structure for view `vwpost`
--
DROP TABLE IF EXISTS `vwpost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwpost` AS select `post`.`id` AS `id_post`,`post`.`titulo` AS `titulo_post`,`post`.`conteudo` AS `conteudo_post`,`post`.`data_criacao` AS `data_criacao_post`,`subcategoria`.`id` AS `id_subcategoria`,`subcategoria`.`nome` AS `nome_subcategoria`,`categoria`.`id` AS `id_categoria`,`categoria`.`nome` AS `nome_categoria`,`tipo`.`id` AS `id_tipo`,`tipo`.`nome` AS `nome_tipo`,`user`.`id` AS `id_user`,`user`.`name` AS `nome_user` from ((((`post` left join `user` on((`post`.`user_id` = `user`.`id`))) left join `subcategoria` on((`post`.`subcategoria_id` = `subcategoria`.`id`))) left join `categoria` on((`subcategoria`.`categoria_id` = `categoria`.`id`))) left join `tipo` on((`categoria`.`tipo_id` = `tipo`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `vwtipo`
--
DROP TABLE IF EXISTS `vwtipo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtipo` AS select `tipo`.`id` AS `id_tipo`,`tipo`.`nome` AS `nome_tipo`,`tipo`.`data_criacao` AS `data_criacao_tipo`,count(`categoria`.`id`) AS `qt_categoria` from (`tipo` left join `categoria` on((`categoria`.`tipo_id` = `tipo`.`id`))) group by `tipo`.`id`;

--
-- Structure for view `vwcategoria`
--
DROP TABLE IF EXISTS `vwcategoria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwcategoria` AS select `categoria`.`id` AS `id_categoria`,`categoria`.`nome` AS `nome_categoria`,`categoria`.`data_criacao` AS `data_criacao_categoria`,count(`subcategoria`.`id`) AS `qt_subcategoria`, `tipo`.`id` AS `id_tipo`,`tipo`.`nome` AS `nome_tipo` from `categoria` left join `tipo` on `categoria`.`tipo_id` = `tipo`.`id` left join `subcategoria` on `categoria`.`id` = `subcategoria`.`categoria_id` group by `categoria`.`id`;

--
-- Structure for view `vwsubcategoria`
--
DROP TABLE IF EXISTS `vwsubcategoria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwsubcategoria` AS select `subcategoria`.`id` AS `id_subcategoria`,`subcategoria`.`nome` AS `nome_subcategoria`,`subcategoria`.`data_criacao` AS `data_criacao_subcategoria`,count(`post`.`id`) AS `qt_post`, `categoria`.`id` AS `id_categoria`,`categoria`.`nome` AS `nome_categoria` from `subcategoria` left join `categoria` on `subcategoria`.`categoria_id` = `categoria`.`id` left join `post` on `subcategoria`.`id` = `post`.`subcategoria_id` group by `subcategoria`.`id`;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_1` (`nome`,`tipo_id`), ADD KEY `tipo_id` (`tipo_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`), ADD KEY `subcategoria_id` (`subcategoria_id`), ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_1` (`nome`,`categoria_id`), ADD KEY `categoria_id` (`categoria_id`);

--
-- Indexes for table `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `unique_1` (`nome`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`), ADD UNIQUE KEY `email` (`email`), ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=93;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categoria`
--
ALTER TABLE `categoria`
ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`tipo_id`) REFERENCES `tipo` (`id`) ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `post`
--
ALTER TABLE `post`
ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `post_ibfk_2` FOREIGN KEY (`subcategoria_id`) REFERENCES `subcategoria` (`id`);

--
-- Limitadores para a tabela `subcategoria`
--
ALTER TABLE `subcategoria`
ADD CONSTRAINT `subcategoria_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
