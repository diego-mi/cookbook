-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 18-Mar-2016 às 20:43
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

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `tipo_id` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`, `descricao`, `data_criacao`, `tipo_id`) VALUES
(1, 'Controller', 'Controller', '2016-03-15 14:56:50', 5),
(2, 'Service', 'Service', '2016-03-15 14:56:50', 5),
(9, 'Form', '', '2016-03-17 17:15:16', 5),
(10, 'Filter', '', '2016-03-17 17:15:16', 5),
(11, 'Entitys', 'Entitys', '2016-03-17 18:06:55', 5),
(12, 'Repository', '', '2016-03-17 17:15:34', 5),
(13, 'Javascript', '', '2016-03-17 17:15:44', 5);

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
  `user_id` int(11) NOT NULL,
  `codigo` longtext
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `titulo`, `conteudo`, `data_criacao`, `subcategoria_id`, `user_id`, `codigo`) VALUES
(1, 'Como usar', 'Como usar flexigrid', '2016-03-18 14:18:00', 1, 1, '/**\r\n     *\r\n     * Consulta ajax para para tabela de Categoria Item Estoque\r\n     *\r\n     * @author Igor Rotondo Bagliotti <igor.bagliotti@cast.com.br>\r\n     *\r\n     * @return mixed.\r\n     */\r\npublic function ajaxPaginatorAction()\r\n{\r\n  $arrCriteria = $this->prepareRequest(false, $this->getInfoAjaxPaginator(''arrCriteria''));\r\n\r\n  return parent::ajaxPaginatorAction(\r\n    null,\r\n    ''Gestao\\Service\\CategoriaItemEstoque'',\r\n    null,\r\n    null,\r\n    null,\r\n    true,\r\n    $arrCriteria,\r\n    ''findByPagedCategoriaItemEstoque''\r\n  );\r\n}'),
(2, 'Como usar Flexigrid 2', 'Conteudo explicativo de como usar a segunda forma da flexigrid', '2016-03-16 12:31:08', 1, 1, ''),
(5, 'Flexigrid3', 'sdfsdfs', '2016-03-18 13:48:46', 1, 1, ''),
(6, 'Frex4', 'Vish', '2016-03-18 13:49:37', 1, 1, ''),
(7, 'mudando a rota da flexigrid', 'Crie a função no seu js e seja feliz.', '2016-03-18 15:18:21', 1, 1, 'var CodigoZika = {\r\n  dudaFunction: function() {\r\n    console.log(''dudaEmo'');\r\n  }\r\n};'),
(8, 'Controller header', 'c', '2016-03-18 18:39:47', 17, 1, '<?php\r\n\r\nnamespace Gestao\\Controller;\r\n\r\nuse InepZend\\View\\View;\r\n\r\n/**\r\n * Controller CategoriaItemEstoque.\r\n *\r\n * @name CategoriaItemEstoque\r\n * @package Gestao\r\n * @subpackage Controller\r\n * @since 13/01/2016\r\n */\r\nclass CategoriaItemEstoqueController extends AbstractController\r\n{\r\n\r\n    /**\r\n     * Metodo construtor da classe\r\n     * CategoriaItemEstoqueController constructor.\r\n     * @author Igor Rotondo Bagliotti <igor.bagliotti@cast.com.br>\r\n     */\r\n    public function __construct()\r\n    {\r\n        $this->arrPk = array(''idCategoriaItemEstoque'');\r\n        $this->arrMethodPk = [''getIdCategoriaItemEstoque''];\r\n        $this->arrMethodPaging = [\r\n            ''getStatus'',\r\n            ''getNoCategoriaItemEstoque'',\r\n            ''getNomeTipoItemEstoque'',\r\n        ];\r\n    }\r\n'),
(9, 'Controller function index', 'cas', '2016-03-18 18:40:18', 17, 1, '\r\n    /**\r\n     * Action principal da controller.\r\n     * Tela para pesquisar categoriaItemEstoque\r\n     *\r\n     * @name indexAction\r\n     * @return View\r\n     * @author Igor Rotondo Bagliotti <igor.bagliotti@cast.com.br>\r\n     */\r\n    public function indexAction()\r\n    {\r\n        $formCategoriaItemEstoquePesquisar = $this->getForm(''Gestao\\Form\\CategoriaItemEstoquePesquisar'')->prepareElements();\r\n        $strTitle = ''Consultar Categoria de Item'';\r\n\r\n        return new View(compact(''strTitle'', ''formCategoriaItemEstoquePesquisar''));\r\n    }\r\n'),
(10, 'Controller footer', 'd', '2016-03-18 18:40:42', 17, 1, '}\r\n');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `nome`, `descricao`, `data_criacao`, `categoria_id`) VALUES
(1, 'Flexigrid', 'Flexigridzor', '2016-03-18 12:14:40', 1),
(2, 'getParamFromRoute', 'getParamFromRoute', '2016-03-15 14:57:41', 1),
(17, 'Gerar', 'Gerar', '2016-03-18 18:38:34', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` longtext NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo`
--

INSERT INTO `tipo` (`id`, `nome`, `descricao`, `data_criacao`) VALUES
(5, 'Inepzend.doc', 'Documentação e Gerador de código dos jhow de ARA. #chupaBSB', '2016-03-17 17:54:16');

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
-- Stand-in structure for view `vwpost`
--
CREATE TABLE IF NOT EXISTS `vwpost` (
`id_post` int(11)
,`titulo_post` varchar(100)
,`conteudo_post` longtext
,`codigo_post` longtext
,`data_criacao_post` timestamp
,`id_subcategoria` int(11)
,`nome_subcategoria` varchar(100)
,`descricao_subcategoria` longtext
,`data_criacao_subcategoria` timestamp
,`id_categoria` int(11)
,`nome_categoria` varchar(100)
,`descricao_categoria` longtext
,`data_criacao_categoria` timestamp
,`id_tipo` int(11)
,`nome_tipo` varchar(100)
,`descricao_tipo` longtext
,`data_criacao_tipo` timestamp
,`id_user` int(11)
,`nome_user` varchar(100)
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
-- Structure for view `vwcategoria`
--
DROP TABLE IF EXISTS `vwcategoria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwcategoria` AS select `categoria`.`id` AS `id_categoria`,`categoria`.`nome` AS `nome_categoria`,`categoria`.`descricao` AS `descricao_categoria`,`categoria`.`data_criacao` AS `data_criacao_categoria`,count(`subcategoria`.`id`) AS `qt_subcategoria`,`tipo`.`id` AS `id_tipo`,`tipo`.`nome` AS `nome_tipo` from ((`categoria` left join `tipo` on((`categoria`.`tipo_id` = `tipo`.`id`))) left join `subcategoria` on((`categoria`.`id` = `subcategoria`.`categoria_id`))) group by `categoria`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `vwpost`
--
DROP TABLE IF EXISTS `vwpost`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwpost` AS select `post`.`id` AS `id_post`,`post`.`titulo` AS `titulo_post`,`post`.`conteudo` AS `conteudo_post`,`post`.`codigo` AS `codigo_post`,`post`.`data_criacao` AS `data_criacao_post`,`subcategoria`.`id` AS `id_subcategoria`,`subcategoria`.`nome` AS `nome_subcategoria`,`subcategoria`.`descricao` AS `descricao_subcategoria`,`subcategoria`.`data_criacao` AS `data_criacao_subcategoria`,`categoria`.`id` AS `id_categoria`,`categoria`.`nome` AS `nome_categoria`,`categoria`.`descricao` AS `descricao_categoria`,`categoria`.`data_criacao` AS `data_criacao_categoria`,`tipo`.`id` AS `id_tipo`,`tipo`.`nome` AS `nome_tipo`,`tipo`.`descricao` AS `descricao_tipo`,`tipo`.`data_criacao` AS `data_criacao_tipo`,`user`.`id` AS `id_user`,`user`.`name` AS `nome_user` from ((((`post` left join `user` on((`post`.`user_id` = `user`.`id`))) left join `subcategoria` on((`post`.`subcategoria_id` = `subcategoria`.`id`))) left join `categoria` on((`subcategoria`.`categoria_id` = `categoria`.`id`))) left join `tipo` on((`categoria`.`tipo_id` = `tipo`.`id`)));

-- --------------------------------------------------------

--
-- Structure for view `vwsubcategoria`
--
DROP TABLE IF EXISTS `vwsubcategoria`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwsubcategoria` AS select `subcategoria`.`id` AS `id_subcategoria`,`subcategoria`.`nome` AS `nome_subcategoria`,`subcategoria`.`descricao` AS `descricao_subcategoria`,`subcategoria`.`data_criacao` AS `data_criacao_subcategoria`,count(`post`.`id`) AS `qt_post`,`categoria`.`id` AS `id_categoria`,`categoria`.`nome` AS `nome_categoria` from ((`subcategoria` left join `categoria` on((`subcategoria`.`categoria_id` = `categoria`.`id`))) left join `post` on((`subcategoria`.`id` = `post`.`subcategoria_id`))) group by `subcategoria`.`id`;

-- --------------------------------------------------------

--
-- Structure for view `vwtipo`
--
DROP TABLE IF EXISTS `vwtipo`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vwtipo` AS select `tipo`.`id` AS `id_tipo`,`tipo`.`nome` AS `nome_tipo`,`tipo`.`descricao` AS `descricao_tipo`,`tipo`.`data_criacao` AS `data_criacao_tipo`,count(`categoria`.`id`) AS `qt_categoria` from (`tipo` left join `categoria` on((`categoria`.`tipo_id` = `tipo`.`id`))) group by `tipo`.`id`;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=96;
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
