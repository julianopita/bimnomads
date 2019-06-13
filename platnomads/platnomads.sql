-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 19/04/2019 às 17:38
-- Versão do servidor: 5.5.42-log
-- Versão do PHP: 5.6.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `platnomads`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `comments`
--

CREATE TABLE `comments` (
  `id_comment` int(100) NOT NULL,
  `id_discussion` int(100) NOT NULL,
  `user_name` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `attribution` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` date NOT NULL,
  `likes` int(100) DEFAULT NULL,
  `dislikes` int(100) DEFAULT NULL,
  `commentary` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `comments`
--

INSERT INTO `comments` (`id_comment`, `id_discussion`, `user_name`, `attribution`, `occupation`, `date_time`, `likes`, `dislikes`, `commentary`) VALUES
(0, 0, 'teste', '', '', '0000-00-00', NULL, NULL, 'este é um teste');

-- --------------------------------------------------------

--
-- Estrutura para tabela `discussion`
--

CREATE TABLE `discussion` (
  `id_discussion` int(250) NOT NULL,
  `user_name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL,
  `project_id` int(11) NOT NULL,
  `tag_topic` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `likes` int(100) DEFAULT NULL,
  `dislikes` int(100) DEFAULT NULL,
  `commentary` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `ammount_subcomment` int(250) DEFAULT NULL,
  `image` geometry DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `list`
--

CREATE TABLE `list` (
  `id` int(11) NOT NULL,
  `details` text COLLATE utf8_unicode_ci NOT NULL,
  `date_posted` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `time_posted` time NOT NULL,
  `date_edited` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `time_edited` time NOT NULL,
  `public` varchar(5) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `project_about`
--

CREATE TABLE `project_about` (
  `id_project` int(250) NOT NULL,
  `name` varchar(350) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `use_type` char(250) COLLATE utf8_unicode_ci NOT NULL,
  `area` double DEFAULT NULL,
  `adress` varchar(350) COLLATE utf8_unicode_ci NOT NULL,
  `city` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `state` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `country` char(150) COLLATE utf8_unicode_ci NOT NULL,
  `begin_date` date NOT NULL,
  `deadline_date` date NOT NULL,
  `resp_client` char(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resp_architect` char(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resp_engineer` char(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `resp_constructor` char(150) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `users`
--

CREATE TABLE `users` (
  `id_user` int(250) NOT NULL,
  `user_name` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `adm_attribution` tinyint(1) NOT NULL,
  `mod_attribution` tinyint(1) DEFAULT NULL,
  `tech_attribution` tinyint(1) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `occupation` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cpf` int(30) NOT NULL,
  `cep` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Fazendo dump de dados para tabela `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `password`, `adm_attribution`, `mod_attribution`, `tech_attribution`, `name`, `email`, `occupation`, `cpf`, `cep`) VALUES
(2, 'teste2', 'a', 0, NULL, 0, '', 'a', 'a', 2321, 213),
(1, 'teste3', 'a', 0, NULL, 0, '', '', NULL, 0, 0);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_discussion` (`id_discussion`),
  ADD KEY `user_name` (`user_name`);

--
-- Índices de tabela `discussion`
--
ALTER TABLE `discussion`
  ADD PRIMARY KEY (`id_discussion`),
  ADD UNIQUE KEY `id_discussion_2` (`id_discussion`),
  ADD KEY `id_discussion` (`id_discussion`),
  ADD KEY `user_name` (`user_name`),
  ADD KEY `project_id` (`project_id`),
  ADD KEY `tag_version` (`tag_topic`(255));

--
-- Índices de tabela `list`
--
ALTER TABLE `list`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `project_about`
--
ALTER TABLE `project_about`
  ADD PRIMARY KEY (`id_project`),
  ADD UNIQUE KEY `id_project` (`id_project`) USING BTREE,
  ADD KEY `status` (`status`,`name`(255));

--
-- Índices de tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_name`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `cpf` (`cpf`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `id_user` (`id_user`),
  ADD KEY `user_name_2` (`user_name`),
  ADD KEY `mod_attribution` (`mod_attribution`),
  ADD KEY `tech_attribution` (`tech_attribution`),
  ADD KEY `adm_attribution` (`adm_attribution`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `discussion`
--
ALTER TABLE `discussion`
  MODIFY `id_discussion` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `list`
--
ALTER TABLE `list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `project_about`
--
ALTER TABLE `project_about`
  MODIFY `id_project` int(250) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
