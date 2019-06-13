-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: Abr 19, 2019 as 05:45 PM
-- Versão do Servidor: 5.1.33
-- Versão do PHP: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `platnomads`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id_comment` int(100) NOT NULL,
  `id_discussion` int(100) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `attribution` varchar(30) NOT NULL,
  `occupation` varchar(30) NOT NULL,
  `date_time` date NOT NULL,
  `likes` int(100) DEFAULT NULL,
  `dislikes` int(100) DEFAULT NULL,
  `commentary` varchar(250) NOT NULL,
  PRIMARY KEY (`id_comment`),
  KEY `id_discussion` (`id_discussion`,`user_name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `comments`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `discussion`
--

CREATE TABLE IF NOT EXISTS `discussion` (
  `id_discussion` int(250) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `project_id` int(11) NOT NULL,
  `tag_topic` varchar(300) NOT NULL,
  `likes` int(100) DEFAULT NULL,
  `dislikes` int(100) DEFAULT NULL,
  `commentary` varchar(300) NOT NULL,
  `ammount_commentary` int(250) DEFAULT NULL,
  `image` geometry DEFAULT NULL,
  PRIMARY KEY (`id_discussion`),
  KEY `user_name` (`user_name`,`project_id`,`tag_topic`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `discussion`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `project_about`
--

CREATE TABLE IF NOT EXISTS `project_about` (
  `id_project` int(250) NOT NULL AUTO_INCREMENT,
  `name` varchar(350) DEFAULT NULL,
  `status` char(150) NOT NULL,
  `use_type` char(250) NOT NULL,
  `area` double DEFAULT NULL,
  `adress` varchar(350) NOT NULL,
  `city` char(150) NOT NULL,
  `state` char(150) NOT NULL,
  `country` char(150) NOT NULL,
  `begin_date` date DEFAULT NULL,
  `deadline_date` date DEFAULT NULL,
  `resp_client` char(150) DEFAULT NULL,
  `resp_architect` char(150) DEFAULT NULL,
  `resp_engineer` char(150) NOT NULL,
  `resp_constructor` char(150) NOT NULL,
  PRIMARY KEY (`id_project`),
  KEY `name` (`name`,`status`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Extraindo dados da tabela `project_about`
--


-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(250) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `adm_attribution` tinyint(1) NOT NULL,
  `mod_attribution` tinyint(1) DEFAULT NULL,
  `tech_attribution` tinyint(1) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `occupation` varchar(100) DEFAULT NULL,
  `cpf` int(11) NOT NULL,
  `cep` int(8) NOT NULL,
  PRIMARY KEY (`id_user`),
  KEY `id_user` (`id_user`),
  KEY `adm_attribution` (`adm_attribution`),
  KEY `mod_attribution` (`mod_attribution`),
  KEY `tech_attribution` (`tech_attribution`),
  KEY `email` (`email`),
  KEY `cpf` (`cpf`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `password`, `adm_attribution`, `mod_attribution`, `tech_attribution`, `name`, `email`, `occupation`, `cpf`, `cep`) VALUES
(1, 'teste', 'teste', 0, NULL, 0, 'teste', 'teste', 'teste', 11, 11);