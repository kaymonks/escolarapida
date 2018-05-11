-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.31-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.5.0.5196
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para escola_rapida_2
CREATE DATABASE IF NOT EXISTS `escola_rapida_2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `escola_rapida_2`;

-- Copiando estrutura para tabela escola_rapida_2.alunos
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `turma_id` int(10) unsigned NOT NULL,
  `telefone_id` int(10) unsigned NOT NULL,
  `escola_id` int(10) unsigned NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alunos_telefone_id_foreign` (`telefone_id`),
  KEY `FK_alunos_escolas` (`escola_id`),
  KEY `alunos_turma_id_foreign` (`turma_id`),
  CONSTRAINT `FK_alunos_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`),
  CONSTRAINT `alunos_telefone_id_foreign` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `alunos_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.alunos: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` (`id`, `turma_id`, `telefone_id`, `escola_id`, `nome`, `data_nascimento`, `sexo`, `created_at`, `updated_at`) VALUES
	(19, 18, 177, 10, 'aluno teste', '2018-05-10', 'm', '2018-05-10 16:24:48', '2018-05-10 16:24:48');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.aluno_responsavel
CREATE TABLE IF NOT EXISTS `aluno_responsavel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aluno_id` int(10) unsigned DEFAULT NULL,
  `responsavel_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno_pai_aluno_id_foreign` (`aluno_id`),
  KEY `aluno_pai_pai_id_foreign` (`responsavel_id`),
  CONSTRAINT `aluno_pai_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `aluno_pai_pai_id_foreign` FOREIGN KEY (`responsavel_id`) REFERENCES `responsaveis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.aluno_responsavel: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `aluno_responsavel` DISABLE KEYS */;
INSERT INTO `aluno_responsavel` (`id`, `aluno_id`, `responsavel_id`, `created_at`, `updated_at`) VALUES
	(2, 19, 26, '2018-05-10 16:26:16', '2018-05-10 16:26:16'),
	(3, 19, 25, '2018-05-10 16:26:17', '2018-05-10 16:26:17');
/*!40000 ALTER TABLE `aluno_responsavel` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.cidades
CREATE TABLE IF NOT EXISTS `cidades` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_id` varchar(2) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=294 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.cidades: ~293 rows (aproximadamente)
/*!40000 ALTER TABLE `cidades` DISABLE KEYS */;
INSERT INTO `cidades` (`id`, `cidade`, `estado_id`) VALUES
	(1, 'Abdon Batista', '24'),
	(2, 'Abelardo Luz', '24'),
	(3, 'Agrolândia', '24'),
	(4, 'Agronômica', '24'),
	(5, 'Água Doce', '24'),
	(6, 'Águas de Chapecó', '24'),
	(7, 'Águas Frias', '24'),
	(8, 'Águas Mornas', '24'),
	(9, 'Alfredo Wagner', '24'),
	(10, 'Alto Bela Vista', '24'),
	(11, 'Anchieta', '24'),
	(12, 'Angelina', '24'),
	(13, 'Anita Garibaldi', '24'),
	(14, 'Anitápolis', '24'),
	(15, 'Antônio Carlos', '24'),
	(16, 'Apiúna', '24'),
	(17, 'Arabutã', '24'),
	(18, 'Araquari', '24'),
	(19, 'Araranguá', '24'),
	(20, 'Armazém', '24'),
	(21, 'Arroio Trinta', '24'),
	(22, 'Arvoredo', '24'),
	(23, 'Ascurra', '24'),
	(24, 'Atalanta', '24'),
	(25, 'Aurora', '24'),
	(26, 'Balneário Arroio do Silva', '24'),
	(27, 'Balneário Barra do Sul', '24'),
	(28, 'Balneário Camboriú', '24'),
	(29, 'Balneário Gaivota', '24'),
	(30, 'Bandeirante', '24'),
	(31, 'Barra Bonita', '24'),
	(32, 'Barra Velha', '24'),
	(33, 'Bela Vista do Toldo', '24'),
	(34, 'Belmonte', '24'),
	(35, 'Benedito Novo', '24'),
	(36, 'Biguaçu', '24'),
	(37, 'Blumenau', '24'),
	(38, 'Bocaina do Sul', '24'),
	(39, 'Bom Jardim da Serra', '24'),
	(40, 'Bom Jesus', '24'),
	(41, 'Bom Jesus do Oeste', '24'),
	(42, 'Bom Retiro', '24'),
	(43, 'Bombinhas', '24'),
	(44, 'Botuverá', '24'),
	(45, 'Braço do Norte', '24'),
	(46, 'Braço do Trombudo', '24'),
	(47, 'Brunópolis', '24'),
	(48, 'Brusque', '24'),
	(49, 'Caçador', '24'),
	(50, 'Caibi', '24'),
	(51, 'Calmon', '24'),
	(52, 'Camboriú', '24'),
	(53, 'Campo Alegre', '24'),
	(54, 'Campo Belo do Sul', '24'),
	(55, 'Campo Erê', '24'),
	(56, 'Campos Novos', '24'),
	(57, 'Canelinha', '24'),
	(58, 'Canoinhas', '24'),
	(59, 'Capão Alto', '24'),
	(60, 'Capinzal', '24'),
	(61, 'Capivari de Baixo', '24'),
	(62, 'Catanduvas', '24'),
	(63, 'Caxambu do Sul', '24'),
	(64, 'Celso Ramos', '24'),
	(65, 'Cerro Negro', '24'),
	(66, 'Chapadão do Lageado', '24'),
	(67, 'Chapecó', '24'),
	(68, 'Cocal do Sul', '24'),
	(69, 'Concórdia', '24'),
	(70, 'Cordilheira Alta', '24'),
	(71, 'Coronel Freitas', '24'),
	(72, 'Coronel Martins', '24'),
	(73, 'Correia Pinto', '24'),
	(74, 'Corupá', '24'),
	(75, 'Criciúma', '24'),
	(76, 'Cunha Porã', '24'),
	(77, 'Cunhataí', '24'),
	(78, 'Curitibanos', '24'),
	(79, 'Descanso', '24'),
	(80, 'Dionísio Cerqueira', '24'),
	(81, 'Dona Emma', '24'),
	(82, 'Doutor Pedrinho', '24'),
	(83, 'Entre Rios', '24'),
	(84, 'Ermo', '24'),
	(85, 'Erval Velho', '24'),
	(86, 'Faxinal dos Guedes', '24'),
	(87, 'Flor do Sertão', '24'),
	(88, 'Florianópolis', '24'),
	(89, 'Formosa do Sul', '24'),
	(90, 'Forquilhinha', '24'),
	(91, 'Fraiburgo', '24'),
	(92, 'Frei Rogério', '24'),
	(93, 'Galvão', '24'),
	(94, 'Garopaba', '24'),
	(95, 'Garuva', '24'),
	(96, 'Gaspar', '24'),
	(97, 'Governador Celso Ramos', '24'),
	(98, 'Grão Pará', '24'),
	(99, 'Gravatal', '24'),
	(100, 'Guabiruba', '24'),
	(101, 'Guaraciaba', '24'),
	(102, 'Guaramirim', '24'),
	(103, 'Guarujá do Sul', '24'),
	(104, 'Guatambú', '24'),
	(105, 'Herval d`Oeste', '24'),
	(106, 'Ibiam', '24'),
	(107, 'Ibicaré', '24'),
	(108, 'Ibirama', '24'),
	(109, 'Içara', '24'),
	(110, 'Ilhota', '24'),
	(111, 'Imaruí', '24'),
	(112, 'Imbituba', '24'),
	(113, 'Imbuia', '24'),
	(114, 'Indaial', '24'),
	(115, 'Iomerê', '24'),
	(116, 'Ipira', '24'),
	(117, 'Iporã do Oeste', '24'),
	(118, 'Ipuaçu', '24'),
	(119, 'Ipumirim', '24'),
	(120, 'Iraceminha', '24'),
	(121, 'Irani', '24'),
	(122, 'Irati', '24'),
	(123, 'Irineópolis', '24'),
	(124, 'Itá', '24'),
	(125, 'Itaiópolis', '24'),
	(126, 'Itajaí', '24'),
	(127, 'Itapema', '24'),
	(128, 'Itapiranga', '24'),
	(129, 'Itapoá', '24'),
	(130, 'Ituporanga', '24'),
	(131, 'Jaborá', '24'),
	(132, 'Jacinto Machado', '24'),
	(133, 'Jaguaruna', '24'),
	(134, 'Jaraguá do Sul', '24'),
	(135, 'Jardinópolis', '24'),
	(136, 'Joaçaba', '24'),
	(137, 'Joinville', '24'),
	(138, 'José Boiteux', '24'),
	(139, 'Jupiá', '24'),
	(140, 'Lacerdópolis', '24'),
	(141, 'Lages', '24'),
	(142, 'Laguna', '24'),
	(143, 'Lajeado Grande', '24'),
	(144, 'Laurentino', '24'),
	(145, 'Lauro Muller', '24'),
	(146, 'Lebon Régis', '24'),
	(147, 'Leoberto Leal', '24'),
	(148, 'Lindóia do Sul', '24'),
	(149, 'Lontras', '24'),
	(150, 'Luiz Alves', '24'),
	(151, 'Luzerna', '24'),
	(152, 'Macieira', '24'),
	(153, 'Mafra', '24'),
	(154, 'Major Gercino', '24'),
	(155, 'Major Vieira', '24'),
	(156, 'Maracajá', '24'),
	(157, 'Maravilha', '24'),
	(158, 'Marema', '24'),
	(159, 'Massaranduba', '24'),
	(160, 'Matos Costa', '24'),
	(161, 'Meleiro', '24'),
	(162, 'Mirim Doce', '24'),
	(163, 'Modelo', '24'),
	(164, 'Mondaí', '24'),
	(165, 'Monte Carlo', '24'),
	(166, 'Monte Castelo', '24'),
	(167, 'Morro da Fumaça', '24'),
	(168, 'Morro Grande', '24'),
	(169, 'Navegantes', '24'),
	(170, 'Nova Erechim', '24'),
	(171, 'Nova Itaberaba', '24'),
	(172, 'Nova Trento', '24'),
	(173, 'Nova Veneza', '24'),
	(174, 'Novo Horizonte', '24'),
	(175, 'Orleans', '24'),
	(176, 'Otacílio Costa', '24'),
	(177, 'Ouro', '24'),
	(178, 'Ouro Verde', '24'),
	(179, 'Paial', '24'),
	(180, 'Painel', '24'),
	(181, 'Palhoça', '24'),
	(182, 'Palma Sola', '24'),
	(183, 'Palmeira', '24'),
	(184, 'Palmitos', '24'),
	(185, 'Papanduva', '24'),
	(186, 'Paraíso', '24'),
	(187, 'Passo de Torres', '24'),
	(188, 'Passos Maia', '24'),
	(189, 'Paulo Lopes', '24'),
	(190, 'Pedras Grandes', '24'),
	(191, 'Penha', '24'),
	(192, 'Peritiba', '24'),
	(193, 'Petrolândia', '24'),
	(194, 'Piçarras', '24'),
	(195, 'Pinhalzinho', '24'),
	(196, 'Pinheiro Preto', '24'),
	(197, 'Piratuba', '24'),
	(198, 'Planalto Alegre', '24'),
	(199, 'Pomerode', '24'),
	(200, 'Ponte Alta', '24'),
	(201, 'Ponte Alta do Norte', '24'),
	(202, 'Ponte Serrada', '24'),
	(203, 'Porto Belo', '24'),
	(204, 'Porto União', '24'),
	(205, 'Pouso Redondo', '24'),
	(206, 'Praia Grande', '24'),
	(207, 'Presidente Castelo Branco', '24'),
	(208, 'Presidente Getúlio', '24'),
	(209, 'Presidente Nereu', '24'),
	(210, 'Princesa', '24'),
	(211, 'Quilombo', '24'),
	(212, 'Rancho Queimado', '24'),
	(213, 'Rio das Antas', '24'),
	(214, 'Rio do Campo', '24'),
	(215, 'Rio do Oeste', '24'),
	(216, 'Rio do Sul', '24'),
	(217, 'Rio dos Cedros', '24'),
	(218, 'Rio Fortuna', '24'),
	(219, 'Rio Negrinho', '24'),
	(220, 'Rio Rufino', '24'),
	(221, 'Riqueza', '24'),
	(222, 'Rodeio', '24'),
	(223, 'Romelândia', '24'),
	(224, 'Salete', '24'),
	(225, 'Saltinho', '24'),
	(226, 'Salto Veloso', '24'),
	(227, 'Sangão', '24'),
	(228, 'Santa Cecília', '24'),
	(229, 'Santa Helena', '24'),
	(230, 'Santa Rosa de Lima', '24'),
	(231, 'Santa Rosa do Sul', '24'),
	(232, 'Santa Terezinha', '24'),
	(233, 'Santa Terezinha do Progresso', '24'),
	(234, 'Santiago do Sul', '24'),
	(235, 'Santo Amaro da Imperatriz', '24'),
	(236, 'São Bento do Sul', '24'),
	(237, 'São Bernardino', '24'),
	(238, 'São Bonifácio', '24'),
	(239, 'São Carlos', '24'),
	(240, 'São Cristovão do Sul', '24'),
	(241, 'São Domingos', '24'),
	(242, 'São Francisco do Sul', '24'),
	(243, 'São João Batista', '24'),
	(244, 'São João do Itaperiú', '24'),
	(245, 'São João do Oeste', '24'),
	(246, 'São João do Sul', '24'),
	(247, 'São Joaquim', '24'),
	(248, 'São José', '24'),
	(249, 'São José do Cedro', '24'),
	(250, 'São José do Cerrito', '24'),
	(251, 'São Lourenço do Oeste', '24'),
	(252, 'São Ludgero', '24'),
	(253, 'São Martinho', '24'),
	(254, 'São Miguel da Boa Vista', '24'),
	(255, 'São Miguel do Oeste', '24'),
	(256, 'São Pedro de Alcântara', '24'),
	(257, 'Saudades', '24'),
	(258, 'Schroeder', '24'),
	(259, 'Seara', '24'),
	(260, 'Serra Alta', '24'),
	(261, 'Siderópolis', '24'),
	(262, 'Sombrio', '24'),
	(263, 'Sul Brasil', '24'),
	(264, 'Taió', '24'),
	(265, 'Tangará', '24'),
	(266, 'Tigrinhos', '24'),
	(267, 'Tijucas', '24'),
	(268, 'Timbé do Sul', '24'),
	(269, 'Timbó', '24'),
	(270, 'Timbó Grande', '24'),
	(271, 'Três Barras', '24'),
	(272, 'Treviso', '24'),
	(273, 'Treze de Maio', '24'),
	(274, 'Treze Tílias', '24'),
	(275, 'Trombudo Central', '24'),
	(276, 'Tubarão', '24'),
	(277, 'Tunápolis', '24'),
	(278, 'Turvo', '24'),
	(279, 'União do Oeste', '24'),
	(280, 'Urubici', '24'),
	(281, 'Urupema', '24'),
	(282, 'Urussanga', '24'),
	(283, 'Vargeão', '24'),
	(284, 'Vargem', '24'),
	(285, 'Vargem Bonita', '24'),
	(286, 'Vidal Ramos', '24'),
	(287, 'Videira', '24'),
	(288, 'Vitor Meireles', '24'),
	(289, 'Witmarsum', '24'),
	(290, 'Xanxerê', '24'),
	(291, 'Xavantina', '24'),
	(292, 'Xaxim', '24'),
	(293, 'Zortéa', '24');
/*!40000 ALTER TABLE `cidades` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.escolas
CREATE TABLE IF NOT EXISTS `escolas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_id` int(10) unsigned DEFAULT NULL,
  `diretor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `escolas_telefone_id_foreign` (`telefone_id`),
  KEY `FK_escolas_users` (`user_id`),
  CONSTRAINT `FK_escolas_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `escolas_telefone_id_foreign` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.escolas: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `escolas` DISABLE KEYS */;
INSERT INTO `escolas` (`id`, `nome`, `telefone_id`, `diretor`, `email`, `endereco`, `cep`, `numero`, `bairro`, `estado`, `cidade`, `user_id`, `created_at`, `updated_at`) VALUES
	(6, 'escola 1', 93, 'nome diretor', 'escola1@escola1.com', 'teste', 'tstewrwrw', 323, 'teste', 'teste', 'teste', 2, '2017-12-05 04:04:32', '2018-05-07 16:08:57'),
	(9, 'Escola 2', 132, 'Rafael Roberto', 'escola2@escola.com', 'Rua Otávio Cesário Pereira', '88309-320', 102, 'São Vicente', 'SC', 'Itajaí', 93, '2017-12-08 00:05:07', '2017-12-08 00:05:07'),
	(10, 'Aníbal Cesar', 139, 'Roberto', 'kaymonkks@hotmail.com', 'Estefano José Vanolli', '88300387', 1020, 'SÃO VICENTE', 'Santa Catarina', 'Itajaí', 98, '2018-04-20 18:35:08', '2018-04-24 03:08:17');
/*!40000 ALTER TABLE `escolas` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.estados
CREATE TABLE IF NOT EXISTS `estados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `estado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `sigla` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=COMPACT;

-- Copiando dados para a tabela escola_rapida_2.estados: ~27 rows (aproximadamente)
/*!40000 ALTER TABLE `estados` DISABLE KEYS */;
INSERT INTO `estados` (`id`, `estado`, `sigla`) VALUES
	(1, 'Acre', 'AC'),
	(2, 'Alagoas', 'AL'),
	(3, 'Amapá', 'AP'),
	(4, 'Amazonas', 'AM'),
	(5, 'Bahia', 'BA'),
	(6, 'Ceará', 'CE'),
	(7, 'Distrito Federal', 'DF'),
	(8, 'Espírito Santo', 'ES'),
	(9, 'Goiás', 'GO'),
	(10, 'Maranhão', 'MA'),
	(11, 'Mato Grosso', 'MT'),
	(12, 'Mato Grosso do Sul', 'MS'),
	(13, 'Minas Gerais', 'MG'),
	(14, 'Pará', 'PA'),
	(15, 'Paraíba', 'PB'),
	(16, 'Paraná', 'PR'),
	(17, 'Pernambuco', 'PE'),
	(18, 'Piauí', 'PI'),
	(19, 'Rio de Janeiro', 'RJ'),
	(20, 'Rio Grande do Norte', 'RN'),
	(21, 'Rio Grande do Sul', 'RS'),
	(22, 'Rondônia', 'RO'),
	(23, 'Roraima', 'RR'),
	(24, 'Santa Catarina', 'SC'),
	(25, 'São Paulo', 'SP'),
	(26, 'Sergipe', 'SE'),
	(27, 'Tocantins', 'TO');
/*!40000 ALTER TABLE `estados` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `escola_id` int(10) unsigned NOT NULL DEFAULT '0',
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_eventos_escolas` (`escola_id`),
  CONSTRAINT `FK_eventos_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.eventos: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`id`, `escola_id`, `titulo`, `descricao`, `date`, `time`, `created_at`, `updated_at`) VALUES
	(21, 10, 'evento teste 1', 'teste', '2018-05-06', '00:22:00', '2018-05-06 03:22:46', '2018-05-06 03:22:46'),
	(23, 10, 'evento para escola anibal cesar', 'testetsstew\r\n\r\nteste\r\ntestwe', '2018-05-06', '19:27:00', '2018-05-06 22:27:18', '2018-05-06 22:27:18'),
	(24, 10, 'tsetes teste', 'teste', '2018-05-07', '13:14:00', '2018-05-07 16:15:03', '2018-05-07 16:15:03'),
	(25, 10, 'evento teste', 'teste', '2018-05-10', '22:06:00', '2018-05-10 01:06:57', '2018-05-10 01:06:57'),
	(26, 10, 'evento teste2', 'teste', '2018-05-09', '22:10:00', '2018-05-10 01:10:56', '2018-05-10 01:10:56');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.eventos_confirmados
CREATE TABLE IF NOT EXISTS `eventos_confirmados` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned DEFAULT NULL,
  `responsavel_id` int(10) unsigned DEFAULT NULL,
  `confirmado` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `eventod_confirmados_evento_id_foreign` (`evento_id`),
  KEY `eventod_confirmados_responsavel_id_foreign` (`responsavel_id`),
  CONSTRAINT `eventod_confirmados_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `eventod_confirmados_responsavel_id_foreign` FOREIGN KEY (`responsavel_id`) REFERENCES `responsaveis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.eventos_confirmados: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `eventos_confirmados` DISABLE KEYS */;
INSERT INTO `eventos_confirmados` (`id`, `evento_id`, `responsavel_id`, `confirmado`, `created_at`, `updated_at`) VALUES
	(1, 25, 25, 0, '2018-05-10 01:06:57', '2018-05-10 01:06:57'),
	(2, 26, 25, 1, '2018-05-10 01:11:22', '2018-05-10 01:11:22');
/*!40000 ALTER TABLE `eventos_confirmados` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.evento_destinatario
CREATE TABLE IF NOT EXISTS `evento_destinatario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned DEFAULT NULL,
  `escola_id` int(10) unsigned DEFAULT NULL,
  `turma_id` int(10) unsigned DEFAULT NULL,
  `responsavel_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evento_paras_evento_id_foreign` (`evento_id`),
  KEY `evento_paras_escola_id_foreign` (`escola_id`),
  KEY `evento_paras_turma_id_foreign` (`turma_id`),
  KEY `evento_paras_pai_id_foreign` (`responsavel_id`),
  CONSTRAINT `evento_paras_escola_id_foreign` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evento_paras_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evento_paras_pai_id_foreign` FOREIGN KEY (`responsavel_id`) REFERENCES `responsaveis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evento_paras_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.evento_destinatario: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `evento_destinatario` DISABLE KEYS */;
INSERT INTO `evento_destinatario` (`id`, `evento_id`, `escola_id`, `turma_id`, `responsavel_id`, `created_at`, `updated_at`) VALUES
	(4, 23, 10, NULL, NULL, '2018-05-06 22:27:18', '2018-05-06 22:27:18'),
	(5, 25, NULL, NULL, 25, '2018-05-10 01:06:57', '2018-05-10 01:06:57'),
	(6, 26, 10, NULL, NULL, '2018-05-10 01:10:56', '2018-05-10 01:10:56');
/*!40000 ALTER TABLE `evento_destinatario` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.mensagem_destinatario
CREATE TABLE IF NOT EXISTS `mensagem_destinatario` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mensagem_id` int(10) unsigned NOT NULL,
  `destinatario_id` int(10) unsigned DEFAULT NULL,
  `destinatario_escola_id` int(10) unsigned DEFAULT NULL,
  `destinatario_professor_id` int(10) unsigned DEFAULT NULL,
  `destinatario_turma_id` int(10) unsigned DEFAULT NULL,
  `tipo_destinatario` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mensagem_destinatario_responsaveis` (`destinatario_id`),
  KEY `FK_mensagem_destinatario_escolas` (`destinatario_escola_id`),
  KEY `FK_mensagem_destinatario_mensagens` (`mensagem_id`),
  KEY `FK_mensagem_destinatario_professores` (`destinatario_professor_id`),
  KEY `FK_mensagem_destinatario_turmas` (`destinatario_turma_id`),
  CONSTRAINT `FK_mensagem_destinatario_escolas` FOREIGN KEY (`destinatario_escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagem_destinatario_mensagens` FOREIGN KEY (`mensagem_id`) REFERENCES `mensagens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagem_destinatario_professores` FOREIGN KEY (`destinatario_professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagem_destinatario_responsaveis` FOREIGN KEY (`destinatario_id`) REFERENCES `responsaveis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagem_destinatario_turmas` FOREIGN KEY (`destinatario_turma_id`) REFERENCES `turmas` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.mensagem_destinatario: ~32 rows (aproximadamente)
/*!40000 ALTER TABLE `mensagem_destinatario` DISABLE KEYS */;
INSERT INTO `mensagem_destinatario` (`id`, `mensagem_id`, `destinatario_id`, `destinatario_escola_id`, `destinatario_professor_id`, `destinatario_turma_id`, `tipo_destinatario`, `created_at`, `updated_at`) VALUES
	(44, 78, NULL, NULL, NULL, 12, NULL, '2018-04-05 00:20:34', '2018-04-05 00:20:34'),
	(45, 78, NULL, NULL, NULL, 13, NULL, '2018-04-05 00:20:34', '2018-04-05 00:20:34'),
	(46, 79, NULL, NULL, NULL, 12, NULL, '2018-04-05 00:23:00', '2018-04-05 00:23:00'),
	(47, 79, NULL, NULL, NULL, 13, NULL, '2018-04-05 00:23:00', '2018-04-05 00:23:00'),
	(48, 79, NULL, NULL, NULL, 14, NULL, '2018-04-05 00:23:00', '2018-04-05 00:23:00'),
	(49, 79, NULL, NULL, NULL, 15, NULL, '2018-04-05 00:23:00', '2018-04-05 00:23:00'),
	(50, 79, NULL, NULL, NULL, 16, NULL, '2018-04-05 00:23:00', '2018-04-05 00:23:00'),
	(51, 79, NULL, NULL, NULL, 17, NULL, '2018-04-05 00:23:00', '2018-04-05 00:23:00'),
	(52, 80, NULL, NULL, NULL, 12, NULL, '2018-04-10 19:33:41', '2018-04-10 19:33:41'),
	(53, 80, NULL, NULL, NULL, 13, NULL, '2018-04-10 19:33:41', '2018-04-10 19:33:41'),
	(54, 80, NULL, NULL, NULL, 14, NULL, '2018-04-10 19:33:41', '2018-04-10 19:33:41'),
	(55, 80, NULL, NULL, NULL, 15, NULL, '2018-04-10 19:33:41', '2018-04-10 19:33:41'),
	(56, 80, NULL, NULL, NULL, 16, NULL, '2018-04-10 19:33:41', '2018-04-10 19:33:41'),
	(57, 80, NULL, NULL, NULL, 17, NULL, '2018-04-10 19:33:41', '2018-04-10 19:33:41'),
	(74, 104, NULL, 6, NULL, NULL, 2, '2018-04-18 02:03:20', '2018-04-18 02:03:20'),
	(90, 127, NULL, 6, NULL, NULL, NULL, '2018-04-19 18:53:10', '2018-04-19 18:53:10'),
	(93, 130, NULL, 6, NULL, NULL, NULL, '2018-04-19 22:21:51', '2018-04-19 22:21:51'),
	(94, 131, NULL, 6, NULL, NULL, NULL, '2018-04-19 22:38:51', '2018-04-19 22:38:51'),
	(95, 132, NULL, 6, NULL, NULL, NULL, '2018-04-19 22:41:01', '2018-04-19 22:41:01'),
	(99, 136, NULL, 6, NULL, NULL, NULL, '2018-04-19 23:22:20', '2018-04-19 23:22:20'),
	(103, 140, NULL, NULL, NULL, 13, NULL, '2018-04-20 04:00:35', '2018-04-20 04:00:35'),
	(106, 152, NULL, 10, NULL, NULL, NULL, '2018-04-24 02:35:00', '2018-04-24 02:35:00'),
	(107, 153, NULL, 10, NULL, NULL, NULL, '2018-04-24 02:36:16', '2018-04-24 02:36:16'),
	(108, 154, NULL, 10, NULL, NULL, NULL, '2018-04-24 03:24:58', '2018-04-24 03:24:58'),
	(109, 155, NULL, 10, NULL, NULL, NULL, '2018-04-24 03:29:07', '2018-04-24 03:29:07'),
	(116, 164, NULL, NULL, NULL, 17, NULL, '2018-04-24 17:13:05', '2018-04-24 17:13:05'),
	(128, 182, NULL, NULL, NULL, 17, NULL, '2018-05-03 22:28:18', '2018-05-03 22:28:18'),
	(149, 206, 25, NULL, NULL, NULL, NULL, '2018-05-10 00:49:46', '2018-05-10 00:49:46'),
	(151, 208, NULL, 10, NULL, NULL, 4, '2018-05-10 00:53:33', '2018-05-10 00:53:33'),
	(152, 209, 26, NULL, NULL, NULL, NULL, '2018-05-10 16:13:37', '2018-05-10 16:13:37'),
	(153, 210, NULL, 10, NULL, NULL, 4, '2018-05-10 16:14:32', '2018-05-10 16:14:32'),
	(157, 213, NULL, 10, NULL, NULL, 4, '2018-05-11 01:47:43', '2018-05-11 01:47:43'),
	(158, 214, NULL, 10, NULL, NULL, 4, '2018-05-11 01:48:29', '2018-05-11 01:48:29'),
	(159, 215, NULL, 10, NULL, NULL, 4, '2018-05-11 01:50:26', '2018-05-11 01:50:26'),
	(160, 216, NULL, 10, NULL, NULL, 4, '2018-05-11 01:51:31', '2018-05-11 01:51:31');
/*!40000 ALTER TABLE `mensagem_destinatario` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.mensagens
CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `escola_id` int(10) unsigned NOT NULL DEFAULT '0',
  `remetente_escola_id` int(10) unsigned DEFAULT '0',
  `remetente_responsavel_id` int(10) unsigned DEFAULT '0',
  `remetente_professor_id` int(10) unsigned DEFAULT '0',
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `corpo` text COLLATE utf8_unicode_ci NOT NULL,
  `lido` tinyint(1) NOT NULL DEFAULT '0',
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_remetente` int(11) NOT NULL DEFAULT '0',
  `mensagem_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mensagens_responsaveis` (`remetente_responsavel_id`),
  KEY `FK_mensagens_professores` (`remetente_professor_id`),
  KEY `FK_mensagens_escolas` (`escola_id`),
  KEY `FK_mensagens_escolas_2` (`remetente_escola_id`),
  KEY `FK_mensagens_mensagens` (`mensagem_id`),
  CONSTRAINT `FK_mensagens_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagens_escolas_2` FOREIGN KEY (`remetente_escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagens_mensagens` FOREIGN KEY (`mensagem_id`) REFERENCES `mensagens` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagens_professores` FOREIGN KEY (`remetente_professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagens_responsaveis` FOREIGN KEY (`remetente_responsavel_id`) REFERENCES `responsaveis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.mensagens: ~72 rows (aproximadamente)
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
INSERT INTO `mensagens` (`id`, `escola_id`, `remetente_escola_id`, `remetente_responsavel_id`, `remetente_professor_id`, `titulo`, `corpo`, `lido`, `data`, `tipo_remetente`, `mensagem_id`, `created_at`, `updated_at`) VALUES
	(12, 6, 6, NULL, NULL, 'teste', 'fvbgfdcgggggdgs', 0, '2017-12-05 18:23:56', 2, NULL, '2017-12-05 20:23:56', '2017-12-05 20:23:56'),
	(13, 6, 6, NULL, NULL, 'teste', 'teste', 0, '2017-12-05 18:26:02', 2, NULL, '2017-12-05 20:26:02', '2017-12-05 20:26:02'),
	(14, 6, 6, NULL, NULL, 'titulo mensagem teste pais', 'ola mundo', 0, '2017-12-05 18:27:31', 2, NULL, '2017-12-05 20:27:31', '2017-12-05 20:27:31'),
	(21, 6, 6, NULL, NULL, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-12-06 14:00:12', 2, NULL, '2017-12-06 16:00:12', '2017-12-06 16:00:12'),
	(22, 6, 6, NULL, NULL, 'titulo mensagem fernando souza', 'teste', 0, '2017-12-06 16:01:48', 2, NULL, '2017-12-06 18:01:48', '2017-12-06 18:01:48'),
	(76, 6, 6, NULL, NULL, 'assunto', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras euismod varius dictum. Quisque dictum neque purus, vitae feugiat nisi posuere ut. Nam sit amet magna et lectus maximus consequat. Pellentesque convallis, diam interdum eleifend vestibulum, urna velit euismod mauris, ac ullamcorper nisi leo ut elit. Aliquam erat volutpat. Suspendisse potenti. Proin viverra, eros non dignissim efficitur, nibh dui lacinia mauris, in eleifend nisl nulla ac tortor. Proin a quam malesuada, iaculis eros a, pulvinar odio. Nulla tempus aliquam lectus, ut gravida risus consectetur sed. Donec ligula mauris, dapibus eu vulputate ac, mollis quis ex. Vestibulum iaculis, mauris malesuada sollicitudin mollis, lorem ante mollis ipsum, a dignissim orci erat eget libero. Sed at nisi posuere, malesuada erat malesuada, feugiat massa. ', 0, '2018-04-04 14:57:29', 2, NULL, '2018-04-04 17:57:29', '2018-04-04 17:57:29'),
	(78, 6, 6, NULL, NULL, 'assunto turma 103 101', 'descrição mensagem turmas assunto turma 103 101', 0, '2018-04-04 21:20:34', 0, NULL, '2018-04-05 00:20:34', '2018-04-05 00:20:34'),
	(79, 6, 6, NULL, NULL, 'assunto turma 103 101 102 104 201 101B', 'descrição mensagem para turma 103 101 102 104 201 101B', 0, '2018-04-04 21:23:00', 0, NULL, '2018-04-05 00:23:00', '2018-04-05 00:23:00'),
	(80, 6, 6, NULL, NULL, '123', '123\r\nteste', 0, '2018-04-10 16:33:40', 0, NULL, '2018-04-10 19:33:40', '2018-04-10 19:33:40'),
	(81, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 13:58:35', 2, NULL, '2018-04-17 16:58:35', '2018-04-17 16:58:35'),
	(82, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 14:20:02', 2, NULL, '2018-04-17 17:20:02', '2018-04-17 17:20:02'),
	(83, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 14:21:38', 2, NULL, '2018-04-17 17:21:38', '2018-04-17 17:21:38'),
	(84, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 14:26:39', 2, NULL, '2018-04-17 17:26:39', '2018-04-17 17:26:39'),
	(85, 6, 6, NULL, NULL, 'teste email', 'tezte', 0, '2018-04-17 14:32:02', 2, NULL, '2018-04-17 17:32:02', '2018-04-17 17:32:02'),
	(86, 6, 6, NULL, NULL, 'teste email', 'tezte', 0, '2018-04-17 14:34:26', 2, NULL, '2018-04-17 17:34:26', '2018-04-17 17:34:26'),
	(87, 6, 6, NULL, NULL, 'teste', 'teste', 0, '2018-04-17 14:35:17', 2, NULL, '2018-04-17 17:35:17', '2018-04-17 17:35:17'),
	(88, 6, 6, NULL, NULL, 'teste email', 'terste', 0, '2018-04-17 14:38:01', 2, NULL, '2018-04-17 17:38:01', '2018-04-17 17:38:01'),
	(89, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 14:52:43', 2, NULL, '2018-04-17 17:52:43', '2018-04-17 17:52:43'),
	(90, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 14:53:45', 2, NULL, '2018-04-17 17:53:45', '2018-04-17 17:53:45'),
	(91, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 14:54:11', 2, NULL, '2018-04-17 17:54:11', '2018-04-17 17:54:11'),
	(92, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 14:58:53', 2, NULL, '2018-04-17 17:58:53', '2018-04-17 17:58:53'),
	(93, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 15:01:03', 2, NULL, '2018-04-17 18:01:03', '2018-04-17 18:01:03'),
	(94, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 15:09:32', 2, NULL, '2018-04-17 18:09:32', '2018-04-17 18:09:32'),
	(95, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 15:10:19', 2, NULL, '2018-04-17 18:10:19', '2018-04-17 18:10:19'),
	(96, 6, 6, NULL, NULL, 'teste email', 'teste\r\n\r\nteste\r\n\r\nOla amiguinho', 0, '2018-04-17 15:19:50', 2, NULL, '2018-04-17 18:19:50', '2018-04-17 18:19:50'),
	(97, 6, 6, NULL, NULL, 'teste email', 'tezxt', 0, '2018-04-17 15:22:57', 2, NULL, '2018-04-17 18:22:57', '2018-04-17 18:22:57'),
	(98, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-17 15:25:39', 2, NULL, '2018-04-17 18:25:39', '2018-04-17 18:25:39'),
	(99, 6, 6, NULL, NULL, 'teste email', 'ola mundo', 0, '2018-04-17 15:37:35', 2, NULL, '2018-04-17 18:37:35', '2018-04-17 18:37:35'),
	(104, 6, 6, NULL, NULL, 'teste', 'teste', 0, '2018-04-17 23:03:20', 0, NULL, '2018-04-18 02:03:20', '2018-04-18 02:03:20'),
	(125, 6, 6, NULL, NULL, 'teste', 'teste', 0, '2018-04-19 01:45:20', 2, NULL, '2018-04-19 04:45:20', '2018-04-19 04:45:20'),
	(126, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-19 15:44:38', 2, NULL, '2018-04-19 18:44:38', '2018-04-19 18:44:38'),
	(127, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-19 15:53:09', 2, NULL, '2018-04-19 18:53:09', '2018-04-19 18:53:09'),
	(130, 6, 6, NULL, NULL, 'Olá pai1, como o senho vai? - novo teste com email', 'teste\r\n\r\ntste', 0, '2018-04-19 19:21:49', 2, NULL, '2018-04-19 22:21:49', '2018-04-19 22:21:49'),
	(131, 6, 6, NULL, NULL, 'teste email', 'eteszte', 0, '2018-04-19 19:38:50', 2, NULL, '2018-04-19 22:38:50', '2018-04-19 22:38:50'),
	(132, 6, 6, NULL, NULL, 'ola mundo', 'teste', 0, '2018-04-19 19:41:00', 2, NULL, '2018-04-19 22:41:00', '2018-04-19 22:41:00'),
	(136, 6, 6, NULL, NULL, 'agora uma nova mesagem para pai 1 para conferir email', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2018-04-19 20:22:17', 2, NULL, '2018-04-19 23:22:17', '2018-04-19 23:22:17'),
	(138, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-20 00:18:23', 0, 136, '2018-04-20 03:18:23', '2018-04-20 03:18:23'),
	(139, 6, 6, NULL, NULL, 'teste email', 'teste', 0, '2018-04-20 00:19:58', 0, 136, '2018-04-20 03:19:58', '2018-04-20 03:19:58'),
	(140, 6, 6, NULL, NULL, 'msg para a turma 101', 'msg para turma 101', 0, '2018-04-20 01:00:35', 0, NULL, '2018-04-20 04:00:35', '2018-04-20 04:00:35'),
	(144, 10, 10, NULL, NULL, 'texte', 'teste', 0, '2018-04-23 14:29:39', 2, NULL, '2018-04-23 17:29:39', '2018-04-23 17:29:39'),
	(145, 10, 10, NULL, NULL, 'texte', 'teste', 0, '2018-04-23 14:30:50', 2, NULL, '2018-04-23 17:30:50', '2018-04-23 17:30:50'),
	(146, 10, 10, NULL, NULL, 'texte', 'teste', 0, '2018-04-23 14:31:33', 2, NULL, '2018-04-23 17:31:33', '2018-04-23 17:31:33'),
	(147, 10, 10, NULL, NULL, 'teste', 'tests', 0, '2018-04-23 23:19:03', 2, NULL, '2018-04-24 02:19:03', '2018-04-24 02:19:03'),
	(148, 10, 10, NULL, NULL, 'teste', 'tests', 0, '2018-04-23 23:22:00', 2, NULL, '2018-04-24 02:22:00', '2018-04-24 02:22:00'),
	(149, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-23 23:31:56', 2, NULL, '2018-04-24 02:31:56', '2018-04-24 02:31:56'),
	(150, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-23 23:32:42', 2, NULL, '2018-04-24 02:32:42', '2018-04-24 02:32:42'),
	(151, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-23 23:34:14', 2, NULL, '2018-04-24 02:34:14', '2018-04-24 02:34:14'),
	(152, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-23 23:34:58', 2, NULL, '2018-04-24 02:34:58', '2018-04-24 02:34:58'),
	(153, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-23 23:36:15', 2, NULL, '2018-04-24 02:36:15', '2018-04-24 02:36:15'),
	(154, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-24 00:24:57', 2, NULL, '2018-04-24 03:24:57', '2018-04-24 03:24:57'),
	(155, 10, 10, NULL, NULL, 'teste email teste', 'teste tste\r\nteste', 0, '2018-04-24 00:29:06', 2, NULL, '2018-04-24 03:29:06', '2018-04-24 03:29:06'),
	(156, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-24 00:50:33', 2, NULL, '2018-04-24 03:50:33', '2018-04-24 03:50:33'),
	(157, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-24 00:50:42', 2, NULL, '2018-04-24 03:50:42', '2018-04-24 03:50:42'),
	(159, 10, 10, NULL, NULL, 'teste email', 'teste', 0, '2018-04-24 12:20:23', 2, NULL, '2018-04-24 15:20:23', '2018-04-24 15:20:23'),
	(160, 10, 10, NULL, NULL, 'teste email', 'teste', 0, '2018-04-24 12:20:37', 2, NULL, '2018-04-24 15:20:37', '2018-04-24 15:20:37'),
	(161, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-24 12:21:31', 2, NULL, '2018-04-24 15:21:31', '2018-04-24 15:21:31'),
	(162, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-24 12:23:24', 2, NULL, '2018-04-24 15:23:24', '2018-04-24 15:23:24'),
	(163, 10, 10, NULL, NULL, 'msg para resp1anibal e resp2anibal', 'teste\r\n\r\n\r\n\r\n\r\n\r\n\r\nteste', 0, '2018-04-24 12:54:33', 2, NULL, '2018-04-24 15:54:33', '2018-04-24 15:54:33'),
	(164, 10, 10, NULL, NULL, 'msg teste turma 101', 'teste\r\n\r\nteste', 0, '2018-04-24 14:13:05', 0, NULL, '2018-04-24 17:13:05', '2018-04-24 17:13:05'),
	(178, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-25 00:20:25', 2, NULL, '2018-04-25 03:20:25', '2018-04-25 03:20:25'),
	(179, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-04-25 00:20:53', 2, NULL, '2018-04-25 03:20:53', '2018-04-25 03:20:53'),
	(180, 10, 10, NULL, NULL, 'testte', 'teste', 0, '2018-04-25 00:36:11', 2, NULL, '2018-04-25 03:36:11', '2018-04-25 03:36:11'),
	(182, 10, 10, NULL, NULL, 'teste mensagem turma 101B', 'msg turma 101B', 0, '2018-05-03 19:28:18', 0, NULL, '2018-05-03 22:28:18', '2018-05-03 22:28:18'),
	(204, 10, 10, NULL, NULL, 'teste 2', 'teste', 0, '2018-05-07 13:12:35', 2, NULL, '2018-05-07 16:12:35', '2018-05-07 16:12:35'),
	(205, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-05-09 20:57:58', 2, NULL, '2018-05-09 23:57:58', '2018-05-09 23:57:58'),
	(206, 10, 10, NULL, NULL, 'teste msg', 'teste', 0, '2018-05-09 21:49:46', 2, NULL, '2018-05-10 00:49:46', '2018-05-10 00:49:46'),
	(207, 10, 10, NULL, NULL, 'teste', 'teste', 0, '2018-05-09 21:51:05', 2, NULL, '2018-05-10 00:51:05', '2018-05-10 00:51:05'),
	(208, 10, NULL, 25, NULL, 'teste escola', 'teste', 0, '2018-05-09 21:53:33', 0, NULL, '2018-05-10 00:53:33', '2018-05-10 00:53:33'),
	(209, 10, 10, NULL, NULL, 'teste123', 'teste', 0, '2018-05-10 13:13:37', 2, NULL, '2018-05-10 16:13:37', '2018-05-10 16:13:37'),
	(210, 10, NULL, 26, NULL, 'resop2 titulo', 'testew', 0, '2018-05-10 13:14:32', 0, 209, '2018-05-10 16:14:32', '2018-05-10 16:14:32'),
	(213, 10, NULL, 26, NULL, 'mensagem 1 teste volume', 'Teste\r\n\r\nteste', 0, '2018-05-10 22:47:43', 0, NULL, '2018-05-11 01:47:43', '2018-05-11 01:47:43'),
	(214, 10, NULL, 26, NULL, 'tste mensagem ', 'Teste\r\n\r\ntsetrste', 0, '2018-05-10 22:48:28', 0, NULL, '2018-05-11 01:48:28', '2018-05-11 01:48:28'),
	(215, 10, NULL, 26, NULL, 'Ola escola Anibal cesar', 'teste', 0, '2018-05-10 22:50:26', 0, NULL, '2018-05-11 01:50:26', '2018-05-11 01:50:26'),
	(216, 10, NULL, 26, NULL, 'teste msg', 'teste', 0, '2018-05-10 22:51:30', 0, NULL, '2018-05-11 01:51:30', '2018-05-11 01:51:30');
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.migrations: ~14 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2017_09_16_041238_create_escolas_table', 1),
	(4, '2017_09_16_202638_create_turmas_table', 1),
	(5, '2017_09_17_061134_create_pais_table', 1),
	(6, '2017_09_18_212310_create_professores_table', 1),
	(7, '2017_09_19_224202_create_turma_professor_table', 1),
	(8, '2017_10_05_193531_create_alunos_table', 2),
	(10, '2017_10_06_033035_create_alunos_table', 3),
	(11, '2017_10_07_032936_create_mensagems_table', 4),
	(13, '2017_10_07_034127_create_mensagem_paras_table', 5),
	(15, '2017_10_09_181431_create_eventos_table', 6),
	(16, '2017_10_09_182421_create_evento_paras_table', 7),
	(17, '2017_10_13_183827_create_telefone', 8);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.papeis
CREATE TABLE IF NOT EXISTS `papeis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.papeis: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `papeis` DISABLE KEYS */;
/*!40000 ALTER TABLE `papeis` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.papel_permissao
CREATE TABLE IF NOT EXISTS `papel_permissao` (
  `permissao_id` int(10) unsigned NOT NULL,
  `papel_id` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.papel_permissao: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `papel_permissao` DISABLE KEYS */;
/*!40000 ALTER TABLE `papel_permissao` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.professores
CREATE TABLE IF NOT EXISTS `professores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telefone_id` int(10) unsigned NOT NULL,
  `escola_id` int(10) unsigned NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `telefone_id` (`telefone_id`),
  KEY `FK_professores_escolas` (`escola_id`),
  KEY `FK_professores_users` (`user_id`),
  CONSTRAINT `FK_professores_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_professores_telefones` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_professores_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.professores: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` (`id`, `telefone_id`, `escola_id`, `nome`, `data_nascimento`, `email`, `sexo`, `endereco`, `cep`, `numero`, `bairro`, `estado`, `cidade`, `user_id`, `created_at`, `updated_at`) VALUES
	(35, 185, 10, 'teste', '2018-05-10', '', 'm', 'fdf', NULL, NULL, NULL, NULL, NULL, 129, '2018-05-10 19:08:34', '2018-05-10 19:08:34');
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.responsaveis
CREATE TABLE IF NOT EXISTS `responsaveis` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone_id` int(11) unsigned NOT NULL,
  `escola_id` int(10) unsigned NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade_id` int(11) unsigned DEFAULT NULL,
  `estado_id` int(11) unsigned DEFAULT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `telefone_id` (`telefone_id`),
  KEY `FK_responsaveis_escolas` (`escola_id`),
  KEY `FK_responsaveis_users` (`user_id`),
  KEY `FK_responsaveis_estados` (`estado_id`),
  KEY `FK_responsaveis_cidades` (`cidade_id`),
  CONSTRAINT `FK_responsaveis_cidades` FOREIGN KEY (`cidade_id`) REFERENCES `cidades` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_responsaveis_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`),
  CONSTRAINT `FK_responsaveis_estados` FOREIGN KEY (`estado_id`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_responsaveis_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `pais_telefone_id_id_foreing` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.responsaveis: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `responsaveis` DISABLE KEYS */;
INSERT INTO `responsaveis` (`id`, `nome`, `sexo`, `data_nascimento`, `telefone_id`, `escola_id`, `email`, `endereco`, `cep`, `numero`, `bairro`, `estado`, `cidade`, `cidade_id`, `estado_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(25, 'resp1', 'm', '2018-05-08', 170, 10, 'resp1@teste.com', 'gdsgd', '34t34', 32, 'GDS', 'DG', 'SG', NULL, NULL, 107, '2018-05-09 01:57:45', '2018-05-09 01:57:45'),
	(26, 'resp 2', 'm', '2018-05-10', 175, 10, 'resp1@escola.com', 'Estefano José Vanolli', '88300387', 33, 'São Vicente', NULL, NULL, NULL, NULL, 114, '2018-05-10 16:13:07', '2018-05-10 16:13:07'),
	(28, 'resp3', 'm', '2018-05-10', 186, 10, '', 'a', '1', NULL, NULL, NULL, NULL, NULL, NULL, 130, '2018-05-10 20:52:56', '2018-05-10 20:52:56'),
	(29, 'tst', 'm', '2018-05-10', 187, 10, '', '1', '1', NULL, NULL, NULL, NULL, NULL, NULL, 131, '2018-05-10 20:53:40', '2018-05-10 20:53:40');
/*!40000 ALTER TABLE `responsaveis` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.telefones
CREATE TABLE IF NOT EXISTS `telefones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=188 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.telefones: ~169 rows (aproximadamente)
/*!40000 ALTER TABLE `telefones` DISABLE KEYS */;
INSERT INTO `telefones` (`id`, `telefone`, `created_at`, `updated_at`) VALUES
	(1, '32432423', '2017-10-14 21:43:31', '2017-10-14 21:43:31'),
	(2, '32432423', '2017-10-14 21:44:54', '2017-10-14 21:44:54'),
	(3, '32432423', '2017-10-14 21:45:10', '2017-10-14 21:45:10'),
	(4, '32432423', '2017-10-14 21:55:09', '2017-10-14 21:55:09'),
	(5, '32432423', '2017-10-14 22:00:49', '2017-10-14 22:00:49'),
	(6, '32432423', '2017-10-14 22:01:15', '2017-10-14 22:01:15'),
	(7, '32432423', '2017-10-14 22:13:12', '2017-10-14 22:13:12'),
	(8, '32432423', '2017-10-14 22:13:17', '2017-10-14 22:13:17'),
	(9, '32432423', '2017-10-14 22:15:18', '2017-10-14 22:15:18'),
	(10, '32432423', '2017-10-14 22:16:48', '2017-10-14 22:16:48'),
	(11, '32432423', '2017-10-14 22:19:00', '2017-10-14 22:19:00'),
	(12, '', '2017-10-14 22:20:47', '2017-10-14 22:20:47'),
	(13, '32432423', '2017-10-14 22:21:06', '2017-10-14 22:21:06'),
	(14, '32432423', '2017-10-14 22:22:38', '2017-10-14 22:22:38'),
	(15, '32432423', '2017-10-14 22:25:08', '2017-10-14 22:25:08'),
	(16, '32432423', '2017-10-14 22:25:44', '2017-10-14 22:25:44'),
	(17, '32432423', '2017-10-14 22:26:51', '2017-10-14 22:26:51'),
	(18, '', '2017-10-14 22:31:17', '2017-10-14 22:31:17'),
	(19, '32432423', '2017-10-14 22:33:25', '2017-10-14 22:33:25'),
	(20, '32432423', '2017-10-14 22:34:01', '2017-10-14 22:34:01'),
	(21, '32432423', '2017-10-14 22:44:58', '2017-10-14 22:44:58'),
	(22, '32432423', '2017-10-14 22:45:37', '2017-10-14 22:45:37'),
	(23, '32432423', '2017-10-14 23:13:24', '2017-10-14 23:13:24'),
	(24, '32432423', '2017-10-14 23:13:38', '2017-10-14 23:13:38'),
	(25, '32432423', '2017-10-14 23:13:56', '2017-10-14 23:13:56'),
	(26, '3645435344', '2017-10-14 23:20:40', '2017-10-14 23:20:40'),
	(27, '12123123123', '2017-11-03 11:21:43', '2017-11-03 11:21:43'),
	(28, '', '2017-11-03 11:22:30', '2017-11-03 11:22:30'),
	(29, '', '2017-11-03 11:24:53', '2017-11-03 11:24:53'),
	(30, '', '2017-11-03 11:28:35', '2017-11-03 11:28:35'),
	(31, '12312332', '2017-11-03 11:29:00', '2017-11-03 11:29:00'),
	(32, '12312332', '2017-11-03 11:29:41', '2017-11-03 11:29:41'),
	(33, '123456', '2017-11-03 11:32:52', '2017-11-03 11:32:52'),
	(34, '', '2017-11-03 11:35:08', '2017-11-03 11:35:08'),
	(35, '', '2017-11-03 11:37:50', '2017-11-03 11:37:50'),
	(36, '', '2017-11-03 11:38:26', '2017-11-03 11:38:26'),
	(37, '', '2017-11-03 11:41:11', '2017-11-03 11:41:11'),
	(38, '', '2017-11-03 11:42:06', '2017-11-03 11:42:06'),
	(39, '', '2017-11-03 11:42:10', '2017-11-03 11:42:10'),
	(40, '12318712', '2017-11-03 11:43:00', '2017-11-03 11:43:00'),
	(41, '', '2017-11-03 11:47:52', '2017-11-03 11:47:52'),
	(42, '12123123123', '2017-11-03 11:55:05', '2017-11-03 11:55:05'),
	(43, '212122212133', '2017-11-03 12:01:12', '2017-11-03 17:13:36'),
	(44, '987321789123', '2017-11-03 12:06:45', '2017-11-03 17:13:17'),
	(45, '12123123123', '2017-11-03 13:28:44', '2017-11-03 13:28:44'),
	(46, '(23) 3434-23', '2017-11-05 14:21:24', '2017-11-17 16:36:28'),
	(47, '', '2017-11-05 18:15:49', '2017-11-05 18:15:49'),
	(48, '', '2017-11-05 18:16:00', '2017-11-05 18:16:00'),
	(49, '', '2017-11-05 18:16:10', '2017-11-05 18:16:10'),
	(50, '12123123123', '2017-11-05 22:47:29', '2017-11-05 22:47:29'),
	(51, '(34) 4343-24', '2017-11-06 02:47:45', '2017-11-17 17:11:24'),
	(52, '32432423', '2017-11-06 03:00:06', '2017-11-06 03:00:06'),
	(53, '32432423', '2017-11-06 03:00:29', '2017-11-06 03:00:29'),
	(54, '12123123123', '2017-11-06 03:00:58', '2017-11-06 03:00:58'),
	(55, '1221212', '2017-11-06 03:05:55', '2017-11-06 03:05:55'),
	(56, '4354232', '2017-11-06 03:06:18', '2017-11-06 03:06:18'),
	(57, '32222-44444', '2017-11-07 21:43:38', '2017-11-07 21:43:38'),
	(58, '3232', '2017-11-07 21:54:06', '2017-11-07 21:54:06'),
	(59, '343435', '2017-11-07 21:59:52', '2017-11-07 21:59:52'),
	(60, '33', '2017-11-07 22:01:56', '2017-11-07 22:01:56'),
	(61, '4334', '2017-11-08 19:10:49', '2017-11-08 19:10:49'),
	(62, 'fsdf', '2017-11-08 20:02:04', '2017-11-08 20:02:04'),
	(63, 'fsdf', '2017-11-08 20:03:16', '2017-11-08 20:03:16'),
	(64, 'fsdf', '2017-11-08 20:04:06', '2017-11-08 20:04:06'),
	(65, '2332332', '2017-11-09 17:59:56', '2017-11-09 17:59:56'),
	(66, '443e', '2017-11-11 20:09:25', '2017-11-11 20:09:25'),
	(67, '443e', '2017-11-11 20:12:56', '2017-11-11 20:12:56'),
	(68, '443e', '2017-11-11 20:13:47', '2017-11-11 20:13:47'),
	(69, '4343543', '2017-11-11 20:51:21', '2017-11-11 20:51:21'),
	(70, '(54) 6564-5', '2017-11-12 00:42:35', '2017-11-17 17:11:45'),
	(71, '443e', '2017-11-12 04:15:11', '2017-11-12 04:15:11'),
	(72, '() ', '2017-11-17 18:50:19', '2017-11-17 18:50:19'),
	(73, '(45) 4353-4543', '2017-11-17 18:51:40', '2017-11-17 18:59:57'),
	(74, '() 43-4332', '2017-11-20 02:42:08', '2017-11-20 02:42:08'),
	(75, '() 43-4332', '2017-11-20 02:47:29', '2017-11-20 02:47:29'),
	(76, '(34) 5643-5454', '2017-11-20 02:59:22', '2017-11-20 02:59:22'),
	(77, '(32) 5342-5234', '2017-11-20 03:11:09', '2017-11-20 03:11:09'),
	(78, '() 3233-2323', '2017-11-20 04:34:20', '2017-11-20 04:34:20'),
	(79, '', '2017-11-20 04:50:27', '2017-11-20 04:50:27'),
	(80, '', '2017-11-20 04:59:05', '2017-11-20 04:59:05'),
	(81, '(43) 5434-5345', '2017-11-20 05:03:12', '2017-11-20 05:03:12'),
	(82, '() ', '2017-11-20 05:45:00', '2017-11-20 05:45:00'),
	(83, '(32) 4324-23', '2017-11-21 16:22:03', '2017-11-21 16:22:03'),
	(84, '', '2017-11-21 17:17:45', '2017-11-21 17:17:45'),
	(85, '', '2017-11-21 17:18:17', '2017-11-21 17:18:17'),
	(86, '(56) 5456-4434', '2017-11-21 17:27:23', '2017-11-21 17:27:23'),
	(87, '(56) 5456-4434', '2017-11-21 17:28:24', '2017-11-21 17:28:24'),
	(88, '(32) 5345-2453', '2017-11-21 17:38:55', '2017-11-21 17:38:55'),
	(89, '(34) 5454-3', '2017-11-21 17:40:48', '2017-11-21 17:40:48'),
	(90, '', '2017-11-22 05:26:39', '2017-11-22 05:26:39'),
	(91, '', '2017-11-24 15:05:27', '2017-11-24 15:05:27'),
	(92, '', '2017-12-05 01:40:48', '2017-12-05 01:40:48'),
	(93, '() -4353', '2017-12-05 04:04:32', '2017-12-05 04:04:32'),
	(94, '(32) 4324-2343', '2017-12-05 04:15:48', '2017-12-05 04:15:48'),
	(95, '(32) 4324-1111', '2017-12-05 04:16:04', '2017-12-05 04:16:04'),
	(96, '(33) 3333-3333', '2017-12-05 04:21:03', '2017-12-05 04:21:03'),
	(97, '(34) 5454-3543', '2017-12-05 04:40:11', '2017-12-05 04:40:11'),
	(98, '(34) 5454-3543', '2017-12-05 05:41:51', '2017-12-05 05:41:51'),
	(99, '(34) 5454-3543', '2017-12-05 05:46:05', '2017-12-05 05:46:05'),
	(100, '(34) 5454-3543', '2017-12-05 05:48:47', '2017-12-05 05:48:47'),
	(101, '(46) 3454-3534', '2017-12-05 05:56:28', '2017-12-05 05:56:28'),
	(102, '(46) 3454-3534', '2017-12-05 05:59:56', '2017-12-05 05:59:56'),
	(103, '(46) 3454-3534', '2017-12-05 06:01:52', '2017-12-05 06:01:52'),
	(104, '(46) 3454-3534', '2017-12-05 06:02:42', '2017-12-05 06:02:42'),
	(105, '(46) 3454-3534', '2017-12-05 06:10:32', '2017-12-05 06:10:32'),
	(106, '(35) 4325-3232', '2017-12-05 06:12:43', '2017-12-05 06:12:43'),
	(107, '(35) 4325-3232', '2017-12-05 06:13:28', '2017-12-05 06:13:28'),
	(108, '(45) 3453-4334', '2017-12-05 06:35:52', '2017-12-05 06:35:52'),
	(109, '(45) 3453-4334', '2017-12-05 06:37:59', '2017-12-05 06:37:59'),
	(110, '(45) 3453-4334', '2017-12-05 06:38:28', '2017-12-05 06:38:28'),
	(111, '(43) 5345-3554', '2017-12-05 07:37:22', '2017-12-05 07:37:22'),
	(112, '(43) 5345-3554', '2017-12-05 07:38:41', '2017-12-05 07:38:41'),
	(113, '(23) 2232-3234', '2017-12-05 18:27:26', '2017-12-05 18:27:26'),
	(114, '(23) 2232-3234', '2017-12-05 18:30:02', '2017-12-05 18:30:02'),
	(115, '(23) 2232-3234', '2017-12-05 18:30:47', '2017-12-05 18:30:47'),
	(116, '(52) 4532-4324', '2017-12-05 18:34:04', '2017-12-05 18:34:04'),
	(117, '(32) 4532-5324', '2017-12-05 20:25:41', '2017-12-05 20:25:41'),
	(118, '(43) -4332', '2017-12-05 20:57:45', '2017-12-05 20:57:45'),
	(119, '(66) 6666-6666', '2017-12-05 21:02:47', '2017-12-07 22:24:54'),
	(120, '(34) -4334', '2017-12-05 21:05:12', '2017-12-05 21:05:12'),
	(121, '(35) 4353-4343', '2017-12-05 21:22:14', '2017-12-05 21:22:14'),
	(122, '(34) 534', '2017-12-05 21:26:03', '2017-12-05 21:26:03'),
	(123, '(34) 5454-3543', '2017-12-05 21:30:43', '2017-12-05 21:30:43'),
	(124, '(46) 3454-3534', '2017-12-05 22:45:03', '2017-12-05 22:45:03'),
	(125, '(45) 3434-5343', '2017-12-05 22:59:57', '2017-12-05 22:59:57'),
	(126, '(34) 332', '2017-12-05 23:01:49', '2017-12-05 23:01:49'),
	(127, '(33) 32', '2017-12-05 23:25:01', '2017-12-05 23:25:01'),
	(128, '(53) 4544-4443', '2017-12-05 23:29:16', '2017-12-05 23:29:16'),
	(129, '(34) 5454-3543', '2017-12-06 17:58:05', '2017-12-06 17:58:05'),
	(130, '(34) 5454-3543', '2017-12-07 19:55:48', '2017-12-07 19:55:48'),
	(131, '(44) 4343-4432', '2017-12-07 22:31:18', '2017-12-07 22:31:18'),
	(132, '(34) 5454-3543', '2017-12-08 00:05:07', '2017-12-08 00:05:07'),
	(133, '(34) 5454-3543', '2017-12-08 00:18:59', '2017-12-08 00:18:59'),
	(134, '(34) 5454-3543', '2017-12-08 00:21:46', '2017-12-08 00:21:46'),
	(135, '(34) 5454-3543', '2017-12-08 02:43:01', '2017-12-08 02:43:01'),
	(136, '(34) 5454-3543', '2017-12-08 02:43:51', '2017-12-08 02:43:51'),
	(137, '(34) 5454-3543', '2017-12-08 02:47:29', '2017-12-08 02:47:29'),
	(138, '', '2017-12-08 07:06:41', '2017-12-08 07:06:41'),
	(139, '(47) 3248-2022', '2018-04-20 18:35:08', '2018-04-20 18:35:08'),
	(140, '(22) 2222-2323', '2018-04-23 03:11:04', '2018-04-23 03:11:04'),
	(141, '(32) 5243-2443', '2018-04-23 14:47:10', '2018-04-23 14:47:10'),
	(142, '(47) 3248-2022', '2018-04-23 16:10:26', '2018-04-23 16:10:26'),
	(143, '(47) 3248-2022', '2018-04-23 16:13:41', '2018-04-23 16:13:41'),
	(144, '(47) 3248-2022', '2018-04-23 17:05:35', '2018-04-23 17:05:35'),
	(145, '(47) 3248-2022', '2018-04-23 17:07:44', '2018-04-23 17:07:44'),
	(146, '(47) 3248-2022', '2018-04-24 15:59:56', '2018-04-24 16:57:38'),
	(147, '(52) 2333-2889', '2018-04-24 16:00:27', '2018-04-24 16:55:14'),
	(148, '(47) 3248-5555', '2018-04-24 16:58:21', '2018-04-24 16:58:21'),
	(149, '(47) 3248-5555', '2018-04-24 17:56:43', '2018-04-24 17:56:43'),
	(150, '(43) 5453-4543', '2018-04-24 20:03:35', '2018-04-24 20:03:35'),
	(151, '(43) 5453-4543', '2018-04-24 20:06:31', '2018-04-24 20:06:31'),
	(152, '(43) 5453-4543', '2018-04-24 20:07:27', '2018-04-24 20:07:27'),
	(153, '(43) 5453-4543', '2018-04-24 20:07:44', '2018-04-24 20:07:44'),
	(154, '(22) 2233-0000', '2018-04-24 20:17:13', '2018-05-08 19:25:13'),
	(155, '(33) 2323-2323', '2018-05-04 03:10:50', '2018-05-04 03:10:50'),
	(156, '(43) 5453-4543', '2018-05-08 19:28:45', '2018-05-08 19:28:45'),
	(157, '(47) 3248-5555', '2018-05-08 19:43:59', '2018-05-08 19:43:59'),
	(158, '(47) 3248-5555', '2018-05-08 20:34:32', '2018-05-08 20:34:32'),
	(159, '(47) 3248-5555', '2018-05-08 20:45:48', '2018-05-08 20:45:48'),
	(160, '(47) 3248-5555', '2018-05-08 20:53:33', '2018-05-08 20:53:33'),
	(161, '(47) 3248-5555', '2018-05-08 20:54:38', '2018-05-08 20:54:38'),
	(162, '(47) 3248-5555', '2018-05-08 20:55:33', '2018-05-08 20:55:33'),
	(163, '(47) 3248-5555', '2018-05-08 20:56:48', '2018-05-08 20:56:48'),
	(164, '(47) 3248-2288', '2018-05-08 21:02:51', '2018-05-08 21:02:51'),
	(165, '(47) 3248-2288', '2018-05-08 21:03:47', '2018-05-08 21:03:47'),
	(166, '(47) 3248-2288', '2018-05-08 21:04:29', '2018-05-08 21:04:29'),
	(167, '(47) 3248-2288', '2018-05-08 21:05:04', '2018-05-08 21:05:04'),
	(168, '(47) 3248-2288', '2018-05-08 21:44:34', '2018-05-08 21:44:34'),
	(169, '(47) 3248-2288', '2018-05-08 21:45:08', '2018-05-08 21:45:08'),
	(170, '(33) 3232-3232', '2018-05-09 01:57:45', '2018-05-09 01:57:45'),
	(171, '(34) 2343-2423', '2018-05-09 23:53:58', '2018-05-09 23:53:58'),
	(172, '(34) 2343-2423', '2018-05-09 23:54:44', '2018-05-09 23:54:44'),
	(173, '(33) 3232-3232', '2018-05-10 00:54:42', '2018-05-10 00:54:42'),
	(174, '(33) 3232-3232', '2018-05-10 01:02:31', '2018-05-10 01:02:31'),
	(175, '(43) 2432-4323', '2018-05-10 16:13:07', '2018-05-10 16:13:07'),
	(176, '(47) 3248-2022', '2018-05-10 16:20:01', '2018-05-10 16:20:01'),
	(177, '(43) 5345-3544', '2018-05-10 16:24:48', '2018-05-10 16:24:48'),
	(178, '(32) 5342-5342', '2018-05-10 17:53:02', '2018-05-10 17:53:02'),
	(179, '(47) 3248-2022', '2018-05-10 18:09:56', '2018-05-10 18:09:56'),
	(180, '(46) 5-6546', '2018-05-10 18:20:37', '2018-05-10 18:20:37'),
	(181, '(66) 565', '2018-05-10 18:22:45', '2018-05-10 18:22:45'),
	(182, '(44) 4444-444', '2018-05-10 18:31:09', '2018-05-10 18:31:09'),
	(183, '(56) 544', '2018-05-10 18:37:34', '2018-05-10 18:37:34'),
	(184, '(33) 4-5354', '2018-05-10 19:03:17', '2018-05-10 19:03:17'),
	(185, '(34) 4544-4', '2018-05-10 19:08:34', '2018-05-10 19:08:34'),
	(186, '(21) 2122-2121', '2018-05-10 20:52:56', '2018-05-10 20:52:56'),
	(187, '(1', '2018-05-10 20:53:40', '2018-05-10 20:53:40');
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.turmas
CREATE TABLE IF NOT EXISTS `turmas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `escola_id` int(10) unsigned NOT NULL,
  `ano` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_turmas_escolas` (`escola_id`),
  CONSTRAINT `FK_turmas_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.turmas: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` (`id`, `escola_id`, `ano`, `created_at`, `updated_at`) VALUES
	(12, 6, '103', '2017-12-05 06:28:26', '2017-12-05 06:28:26'),
	(13, 6, '101', '2017-12-08 02:41:13', '2017-12-08 02:41:13'),
	(14, 6, '102', '2017-12-08 02:56:04', '2017-12-08 02:56:04'),
	(15, 6, '104', '2017-12-08 02:56:04', '2017-12-08 02:56:04'),
	(16, 6, '201', '2017-12-08 13:55:45', '2017-12-08 13:55:45'),
	(17, 10, '101B', '2017-12-08 15:46:48', '2017-12-08 15:47:05'),
	(18, 10, '101A', '2018-05-04 03:03:01', '2018-05-04 03:03:01');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.turma_professores
CREATE TABLE IF NOT EXISTS `turma_professores` (
  `turma_id` int(10) unsigned DEFAULT NULL,
  `professor_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `turma_professores_professor_id_foreign` (`professor_id`),
  KEY `turma_professores_turma_id_foreign` (`turma_id`),
  CONSTRAINT `turma_professores_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `turma_professores_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.turma_professores: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `turma_professores` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma_professores` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=132 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.users: ~21 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `login`, `password`, `permission_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@admin.com', '$2y$10$MQsV9QTERDOUFHK7dMGGq.am3GDR30NLuq3yj2mbPOVr0gxcR7M62', 1, 'lH95PbSoX81AFLBfZ6GYztEAaO9RPGdlJtXJbseVcv2DvE3Sw1Jo2w23XxiF', '2017-09-25 23:48:05', '2018-05-07 16:09:09'),
	(2, 'escola', 'escola1', '$2y$10$fBbexXdqMCZu.nxKPiVulOLCl6FQfZAwhGpVmwt0U6ZGbMF2nuYvG', 2, '2lsX7g0yFTKLTL36QUGt9zPKgLGVC4AOQudGKzC60xXCE1RvDbbazQMwIVZx', '2017-11-08 19:10:49', '2018-05-07 16:08:57'),
	(77, 'Joaquim da Silva', ' joaquim@escola.com', '$2y$10$UjP9zqf8FYVskwoYtcwMRerGLUOoyrvXaAazpFgAdNetJakmEHC1W', 4, NULL, '2017-12-07 19:55:48', '2017-12-07 19:55:48'),
	(90, 'responsavel', 'pai1@pai.com', '$2y$10$3nc5SxwYsKrZbw7JRI.3lOzXbbBn8bjBER1tc3vFtP31h/EfhXgca', 4, 'fmljndhAnHmG32VTOglrDovM8zZji2W248IS2evEODfzG9MGNPoszugewOOa', '2017-12-05 23:29:16', '2018-04-23 04:27:10'),
	(91, 'Fernando Souza', 'fernando@escola.com', '$2y$10$OLsX35.SFlhQLgp5qxtQSOMeOYpvlWnPcVovseKRJvirrCLWgY3p.', 4, 'WLy4SpHybMfIHIuIwRNtQE4EuuB4RJMaz0GHw4EHHwifG2zjuUYQeYW6n9gf', '2017-12-06 17:58:05', '2018-04-20 04:01:34'),
	(93, 'escola2', 'escola2@escola.com', '$2y$10$2rwJyWSwhPC0KDHP/nmGKu6ilUb1aBNHv0T5I4q5DJ5j2lKpPRIou', 2, 'JPRy9xEIj6HfxaQZN9GvHY4SyBNyFxwOoxEtPDkzr2aMNdhfj7MOppzkWJgZ', '2017-12-08 00:05:07', '2018-04-23 14:51:27'),
	(98, 'Aníbal Cesar', 'anibalcesar', '$2y$10$CWwoTCOwr/EMwPbaxMoKt.M9AZpcRovKnwRdgFRNFd5vdUDtNA5b6', 2, 'nRtS1L97cC4PWAFeJLdXzVEfhey7uNvNL7RTt9l3VLPrQ0BKA8M2YEqVMF5X', '2018-04-20 18:35:08', '2018-05-10 16:20:54'),
	(101, 'resp 1 anibaltexte', 'resp1anibal', '$2y$10$vwnbELhwuts2s5NSU/VZXeUdc/ZP6kbH95k65hg7daZyNi66rUJS6', 4, 'l6oV0PuvL1W2jUMYKEkFnBHn81cI3xtjzFl4eqttZwuH1vMGj1VS4RosL6mZ', '2018-04-23 16:10:26', '2018-05-08 19:44:00'),
	(102, 'resp 2 anibal', 'resp2anibal', '$2y$10$Bv8ioTmxCcC6TGBNshCqWO0GcIu9/SleQEkzVV9HQVzIOTbXBaQ.K', 4, 'Rtl6A2r4gk7qhXEs6lbGiHIch9uF2g6BXiMOtB5hV8ILqPVVGXQeSVTJQlYd', '2018-04-23 16:13:41', '2018-05-07 03:53:12'),
	(106, 'resp nome 1 anibal', 'respnome123', '$2y$10$TH3g5Tatqhs9abbvmBU1peguVeLjxdNODhLJIdfsfPkOmmzD5qA5S', 4, NULL, '2018-05-08 21:02:51', '2018-05-08 21:45:08'),
	(107, 'resp1', 'resp1', '$2y$10$pdPgKAUbDNyVy/MABKAih.d2z0JglQ5O0K2MKVhJv5N7RNWpb/z9m', 4, '8s67KWWlFcyTSY4Ec5CeRvMumyEHHellMKOl648HQYgbUIdkQyhH5JMLeNE4', '2018-05-09 01:57:45', '2018-05-10 16:27:54'),
	(108, 'resp2', 'resp2', '$2y$10$uG6UPGVDOC5lH.AL3nWoce7Pof0zp7p/PPwwtdxruHygDk58KDgu2', 4, NULL, '2018-05-09 23:53:58', '2018-05-09 23:54:44'),
	(109, 'resp3', 'resp3', '$2y$10$Ii7UhckbZv6yewSl3DFLqunxQadMpO9fnNbGYUitHhvBQk3DN1D/.', 4, NULL, '2018-05-10 00:54:42', '2018-05-10 00:54:42'),
	(112, 'resp3', 'resp4', '$2y$10$Xm3/vjHhz6gIYy.b1AkAPe5mg/y4SRDYvvPT0vMNzBxxzqYJILTwu', 4, NULL, '2018-05-10 01:02:31', '2018-05-10 01:02:31'),
	(114, 'resp 2', 'resp2anibal2', '$2y$10$fKHLGkf1xgD.PzJT1EU2BOV38qPOZrL6E.pR0jmjAJTRKJiJW8vua', 4, 'Ze9nvajAR4FA4Kc2NfRcVsghD7i8eSCjihB6up8ttWqGnGYSD41CQ7ONhwyE', '2018-05-10 16:13:07', '2018-05-10 16:14:45'),
	(116, 'professor3', 'professor3@escola.com', '$2y$10$akwERel.R5uDz52zyF7NDuwtCGa4ULI1O.Rg0CDWcCrzkjzQlwh82', 3, 'rZzoc7OeniRIOCUNHtJ7jdX7DRZrvfBPahcD5ns80KLt081nWG3BTEFXAS4y', '2018-05-10 16:20:01', '2018-05-10 16:23:42'),
	(118, 'resp3 ', 'resp3anibal', '$2y$10$V5oCdwzVJRVg8uriZjya0OZVWa.HvosSXXyoqdFzyFrsMGzNuAT4G', 4, NULL, '2018-05-10 17:53:02', '2018-05-10 17:53:02'),
	(122, 'ghfhg', 'ee32', '$2y$10$CjR/RXS/nrQ6.LNLckU./OjWncyQSEihHxdvXUFarfgNFMS2uJf4u', 3, NULL, '2018-05-10 18:22:45', '2018-05-10 18:22:45'),
	(125, 'p34', 'teste', '$2y$10$2la3vbB8IiKgqzViz/iyNudomsEqbaocq5z8/iO18aPS7iuw6bcju', 3, NULL, '2018-05-10 18:31:09', '2018-05-10 18:33:34'),
	(126, 'teste123', '', '$2y$10$FqvdL/hUu2.oSZ56dm8iXekQZZULb6Pyt8HzcfviYTvdgTtixLd1G', 3, NULL, '2018-05-10 18:37:34', '2018-05-10 18:37:34'),
	(127, 'teste', 'teste321', '$2y$10$KzC.2NzcjgAy4t6fZjOrnOwHZoGto0aYA4hZT0P0TWG4.VJBSyf5O', 3, NULL, '2018-05-10 19:03:17', '2018-05-10 19:03:17'),
	(129, 'teste', 'teste2', '$2y$10$HpBTSosfqTdOyd8BHneG3euqr8V6Y3.1ycNVrNjzWLd9b0KMK6V0K', 3, NULL, '2018-05-10 19:08:33', '2018-05-10 19:08:33'),
	(130, 'resp3', 'r3', '$2y$10$dU2h4/lYOg8lN7mkhbq1COS0zr21Mkp5sa8c5fLMrEBvY1MA.cSrG', 4, NULL, '2018-05-10 20:52:56', '2018-05-10 20:52:56'),
	(131, 'tst', 'teste4', '$2y$10$v3HbJwvxsoq/6tjBcRV5JuGxzo6mZyQ7RUHu4EsLNCBuBz0We7W9C', 4, NULL, '2018-05-10 20:53:40', '2018-05-10 20:53:40');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
