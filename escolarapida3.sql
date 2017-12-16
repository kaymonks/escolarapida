-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.26-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.3.0.5107
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para escola_rapida_2
DROP DATABASE IF EXISTS `escola_rapida_2`;
CREATE DATABASE IF NOT EXISTS `escola_rapida_2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `escola_rapida_2`;

-- Copiando estrutura para tabela escola_rapida_2.alunos
DROP TABLE IF EXISTS `alunos`;
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
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.alunos: ~3 rows (aproximadamente)
DELETE FROM `alunos`;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` (`id`, `turma_id`, `telefone_id`, `escola_id`, `nome`, `data_nascimento`, `sexo`, `created_at`, `updated_at`) VALUES
	(12, 13, 135, 6, 'aluno 1', '2017-12-08', 'm', '2017-12-08 02:43:01', '2017-12-08 02:43:01'),
	(13, 13, 136, 6, 'aluno 2', '2017-12-08', 'm', '2017-12-08 02:43:51', '2017-12-08 02:45:42'),
	(14, 14, 136, 6, 'aluno 2', '2017-12-08', 'm', '2017-12-08 02:43:51', '2017-12-08 02:45:42');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.aluno_responsavel
DROP TABLE IF EXISTS `aluno_responsavel`;
CREATE TABLE IF NOT EXISTS `aluno_responsavel` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `aluno_id` int(10) unsigned DEFAULT NULL,
  `responsavel_id` int(10) unsigned,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `aluno_pai_aluno_id_foreign` (`aluno_id`),
  KEY `aluno_pai_pai_id_foreign` (`responsavel_id`),
  CONSTRAINT `aluno_pai_aluno_id_foreign` FOREIGN KEY (`aluno_id`) REFERENCES `alunos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `aluno_pai_pai_id_foreign` FOREIGN KEY (`responsavel_id`) REFERENCES `responsaveis` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.aluno_responsavel: ~2 rows (aproximadamente)
DELETE FROM `aluno_responsavel`;
/*!40000 ALTER TABLE `aluno_responsavel` DISABLE KEYS */;
INSERT INTO `aluno_responsavel` (`id`, `aluno_id`, `responsavel_id`, `created_at`, `updated_at`) VALUES
	(26, 12, 20, '2017-12-08 02:43:01', '2017-12-08 02:43:01'),
	(28, 13, 19, '2017-12-08 02:45:42', '2017-12-08 02:45:42');
/*!40000 ALTER TABLE `aluno_responsavel` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.escolas
DROP TABLE IF EXISTS `escolas`;
CREATE TABLE IF NOT EXISTS `escolas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_id` int(10) unsigned,
  `diretor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `numero` int(11) NOT NULL,
  `bairro` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `escolas_telefone_id_foreign` (`telefone_id`),
  CONSTRAINT `escolas_telefone_id_foreign` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.escolas: ~2 rows (aproximadamente)
DELETE FROM `escolas`;
/*!40000 ALTER TABLE `escolas` DISABLE KEYS */;
INSERT INTO `escolas` (`id`, `nome`, `telefone_id`, `diretor`, `email`, `endereco`, `cep`, `numero`, `bairro`, `estado`, `cidade`, `user_id`, `created_at`, `updated_at`) VALUES
	(6, 'escola 1', 93, 'teste', 'escola2@escola1.com', 'teste', 'tstewrwrw', 323, 'teste', 'teste', 'teste', 2, '2017-12-05 04:04:32', '2017-12-05 04:04:32'),
	(9, 'Escola 2', 132, 'Rafael Roberto', 'escola2@escola.com', 'Rua Otávio Cesário Pereira', '88309-320', 102, 'São Vicente', 'SC', 'Itajaí', 93, '2017-12-08 00:05:07', '2017-12-08 00:05:07');
/*!40000 ALTER TABLE `escolas` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.eventos
DROP TABLE IF EXISTS `eventos`;
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.eventos: ~4 rows (aproximadamente)
DELETE FROM `eventos`;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`id`, `titulo`, `descricao`, `date`, `time`, `created_at`, `updated_at`) VALUES
	(13, 'Título teste', 'tut', '2017-11-06', '17:52:00', '2017-11-06 19:52:08', '2017-11-06 19:52:08'),
	(15, 'Título teste', 'tut', '2017-11-06', '17:52:00', '2017-11-06 19:52:08', '2017-11-06 19:52:08'),
	(16, 'Título teste', 'tut', '2017-11-06', '17:52:00', '2017-11-06 19:52:08', '2017-11-06 19:52:08'),
	(18, 'Título teste', 'tut', '2017-11-06', '17:52:00', '2017-11-06 19:52:08', '2017-11-06 19:52:08');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.evento_paras
DROP TABLE IF EXISTS `evento_paras`;
CREATE TABLE IF NOT EXISTS `evento_paras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `evento_id` int(10) unsigned DEFAULT NULL,
  `escola_id` int(10) unsigned DEFAULT NULL,
  `turma_id` int(10) unsigned DEFAULT NULL,
  `pai_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evento_paras_evento_id_foreign` (`evento_id`),
  KEY `evento_paras_escola_id_foreign` (`escola_id`),
  KEY `evento_paras_turma_id_foreign` (`turma_id`),
  KEY `evento_paras_pai_id_foreign` (`pai_id`),
  CONSTRAINT `evento_paras_escola_id_foreign` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evento_paras_evento_id_foreign` FOREIGN KEY (`evento_id`) REFERENCES `eventos` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evento_paras_pai_id_foreign` FOREIGN KEY (`pai_id`) REFERENCES `responsaveis` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evento_paras_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.evento_paras: ~0 rows (aproximadamente)
DELETE FROM `evento_paras`;
/*!40000 ALTER TABLE `evento_paras` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento_paras` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.mensagem_destinatario
DROP TABLE IF EXISTS `mensagem_destinatario`;
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.mensagem_destinatario: ~18 rows (aproximadamente)
DELETE FROM `mensagem_destinatario`;
/*!40000 ALTER TABLE `mensagem_destinatario` DISABLE KEYS */;
INSERT INTO `mensagem_destinatario` (`id`, `mensagem_id`, `destinatario_id`, `destinatario_escola_id`, `destinatario_professor_id`, `destinatario_turma_id`, `tipo_destinatario`, `created_at`, `updated_at`) VALUES
	(2, 12, 16, NULL, NULL, NULL, 4, '2017-12-05 20:23:56', '2017-12-05 20:23:56'),
	(5, 14, 16, NULL, NULL, NULL, 4, '2017-12-05 20:27:31', '2017-12-05 20:27:31'),
	(12, 21, 19, NULL, NULL, NULL, 4, '2017-12-06 16:00:12', '2017-12-06 16:00:12'),
	(13, 22, 20, NULL, NULL, NULL, 4, '2017-12-06 18:01:48', '2017-12-06 18:01:48'),
	(16, 41, NULL, 6, NULL, NULL, 4, '2017-12-06 19:11:25', '2017-12-06 19:11:25'),
	(17, 42, NULL, 6, NULL, NULL, 4, '2017-12-06 19:52:13', '2017-12-06 19:52:13'),
	(18, 43, NULL, 6, NULL, NULL, 4, '2017-12-06 19:57:26', '2017-12-06 19:57:26'),
	(19, 44, NULL, 6, NULL, NULL, 4, '2017-12-07 18:38:47', '2017-12-07 18:38:47'),
	(27, 55, 19, NULL, NULL, NULL, 4, '2017-12-08 04:14:25', '2017-12-08 04:14:25'),
	(28, 55, 20, NULL, NULL, NULL, 4, '2017-12-08 04:14:26', '2017-12-08 04:14:26'),
	(29, 56, NULL, 6, NULL, NULL, 4, '2017-12-08 04:20:39', '2017-12-08 04:20:39'),
	(30, 66, NULL, NULL, NULL, NULL, NULL, '2017-12-08 06:56:38', '2017-12-08 06:56:38'),
	(31, 67, NULL, NULL, NULL, NULL, NULL, '2017-12-08 07:00:40', '2017-12-08 07:00:40'),
	(32, 68, NULL, NULL, NULL, 13, NULL, '2017-12-08 07:02:22', '2017-12-08 07:02:22'),
	(33, 69, NULL, NULL, NULL, 13, NULL, '2017-12-08 07:03:17', '2017-12-08 07:03:17'),
	(34, 69, NULL, NULL, NULL, 14, NULL, '2017-12-08 07:03:17', '2017-12-08 07:03:17'),
	(35, 70, NULL, NULL, NULL, 13, NULL, '2017-12-08 17:13:25', '2017-12-08 17:13:25'),
	(36, 70, NULL, NULL, NULL, 14, NULL, '2017-12-08 17:13:25', '2017-12-08 17:13:25');
/*!40000 ALTER TABLE `mensagem_destinatario` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.mensagens
DROP TABLE IF EXISTS `mensagens`;
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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_mensagens_responsaveis` (`remetente_responsavel_id`),
  KEY `FK_mensagens_professores` (`remetente_professor_id`),
  KEY `FK_mensagens_escolas` (`escola_id`),
  KEY `FK_mensagens_escolas_2` (`remetente_escola_id`),
  CONSTRAINT `FK_mensagens_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagens_escolas_2` FOREIGN KEY (`remetente_escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagens_professores` FOREIGN KEY (`remetente_professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_mensagens_responsaveis` FOREIGN KEY (`remetente_responsavel_id`) REFERENCES `responsaveis` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.mensagens: ~35 rows (aproximadamente)
DELETE FROM `mensagens`;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
INSERT INTO `mensagens` (`id`, `escola_id`, `remetente_escola_id`, `remetente_responsavel_id`, `remetente_professor_id`, `titulo`, `corpo`, `lido`, `data`, `tipo_remetente`, `created_at`, `updated_at`) VALUES
	(12, 6, 6, NULL, NULL, 'teste', 'fvbgfdcgggggdgs', 0, '2017-12-05 18:23:56', 2, '2017-12-05 20:23:56', '2017-12-05 20:23:56'),
	(13, 6, 6, NULL, NULL, 'teste', 'teste', 0, '2017-12-05 18:26:02', 2, '2017-12-05 20:26:02', '2017-12-05 20:26:02'),
	(14, 6, 6, NULL, NULL, 'titulo mensagem teste pais', 'ola mundo', 0, '2017-12-05 18:27:31', 2, '2017-12-05 20:27:31', '2017-12-05 20:27:31'),
	(21, 6, 6, NULL, NULL, 'Lorem ipsum dolor sit amet', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-12-06 14:00:12', 2, '2017-12-06 16:00:12', '2017-12-06 16:00:12'),
	(22, 6, 6, NULL, NULL, 'titulo mensagem fernando souza', 'teste', 0, '2017-12-06 16:01:48', 2, '2017-12-06 18:01:48', '2017-12-06 18:01:48'),
	(28, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 16:54:09', 0, '2017-12-06 18:54:09', '2017-12-06 18:54:09'),
	(29, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 16:55:37', 0, '2017-12-06 18:55:37', '2017-12-06 18:55:37'),
	(30, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 16:57:12', 0, '2017-12-06 18:57:12', '2017-12-06 18:57:12'),
	(31, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 16:58:04', 0, '2017-12-06 18:58:04', '2017-12-06 18:58:04'),
	(32, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:00:35', 0, '2017-12-06 19:00:35', '2017-12-06 19:00:35'),
	(33, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:02:11', 0, '2017-12-06 19:02:11', '2017-12-06 19:02:11'),
	(34, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:02:49', 0, '2017-12-06 19:02:49', '2017-12-06 19:02:49'),
	(35, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:03:38', 0, '2017-12-06 19:03:38', '2017-12-06 19:03:38'),
	(36, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:03:55', 0, '2017-12-06 19:03:55', '2017-12-06 19:03:55'),
	(37, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:04:09', 0, '2017-12-06 19:04:09', '2017-12-06 19:04:09'),
	(38, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:04:29', 0, '2017-12-06 19:04:29', '2017-12-06 19:04:29'),
	(39, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:04:40', 0, '2017-12-06 19:04:40', '2017-12-06 19:04:40'),
	(40, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:05:00', 0, '2017-12-06 19:05:00', '2017-12-06 19:05:00'),
	(41, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:11:25', 0, '2017-12-06 19:11:25', '2017-12-06 19:11:25'),
	(42, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:52:13', 0, '2017-12-06 19:52:13', '2017-12-06 19:52:13'),
	(43, 6, NULL, 20, NULL, 'teste', 'teste', 0, '2017-12-06 17:57:26', 0, '2017-12-06 19:57:26', '2017-12-06 19:57:26'),
	(44, 6, NULL, 19, NULL, 'Lorem ipsum dolor sit amet, ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-12-07 16:38:47', 0, '2017-12-07 18:38:47', '2017-12-07 18:38:47'),
	(48, 6, NULL, 19, NULL, 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-12-07 17:41:11', 0, '2017-12-07 19:41:11', '2017-12-07 19:41:11'),
	(49, 6, NULL, 19, NULL, 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-12-07 17:44:28', 0, '2017-12-07 19:44:28', '2017-12-07 19:44:28'),
	(50, 6, NULL, 19, NULL, 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-12-07 17:46:33', 0, '2017-12-07 19:46:33', '2017-12-07 19:46:33'),
	(53, 6, NULL, 19, NULL, 'Lorem ipsum dolor sit amet,', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 0, '2017-12-07 18:22:07', 0, '2017-12-07 20:22:07', '2017-12-07 20:22:07'),
	(55, 9, NULL, NULL, 24, 'titulo mensagem pai1 e fernando souza', 'teste', 0, '2017-12-08 02:14:25', 3, '2017-12-08 04:14:25', '2017-12-08 04:14:25'),
	(56, 6, NULL, 19, NULL, 'Lorem ipsum dolor sit amet,', 'ola mundo', 0, '2017-12-08 02:20:39', 0, '2017-12-08 04:20:39', '2017-12-08 04:20:39'),
	(64, 9, NULL, NULL, 24, 'tituulo turma', 'teste', 0, '2017-12-08 04:54:28', 0, '2017-12-08 06:54:28', '2017-12-08 06:54:28'),
	(65, 9, NULL, NULL, 24, 'tituulo turma', 'teste', 0, '2017-12-08 04:56:02', 0, '2017-12-08 06:56:02', '2017-12-08 06:56:02'),
	(66, 9, NULL, NULL, 24, 'tituulo turma', 'teste', 0, '2017-12-08 04:56:38', 0, '2017-12-08 06:56:38', '2017-12-08 06:56:38'),
	(67, 9, NULL, NULL, 24, 'teste', 'testes', 0, '2017-12-08 05:00:40', 0, '2017-12-08 07:00:40', '2017-12-08 07:00:40'),
	(68, 9, NULL, NULL, 24, 'teste', 'testes', 0, '2017-12-08 05:02:22', 0, '2017-12-08 07:02:22', '2017-12-08 07:02:22'),
	(69, 9, NULL, NULL, 24, 'ola teste', 'testes\r\noii', 0, '2017-12-08 05:03:17', 0, '2017-12-08 07:03:17', '2017-12-08 07:03:17'),
	(70, 9, NULL, NULL, 24, 'teste', 'teste', 0, '2017-12-08 15:13:25', 0, '2017-12-08 17:13:25', '2017-12-08 17:13:25');
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.migrations
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.migrations: ~18 rows (aproximadamente)
DELETE FROM `migrations`;
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
	(17, '2017_10_13_183827_create_telefone', 8),
	(18, '2017_10_13_211629_add_foreing_key_to_telefones_table2', 9),
	(19, '2017_11_06_043239_create_permissaos_table', 10),
	(20, '2017_04_03_181127_create_papels_table', 11),
	(21, '2017_11_11_195624_create_aluno_pai_table', 12);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.password_resets
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.password_resets: ~0 rows (aproximadamente)
DELETE FROM `password_resets`;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.professores
DROP TABLE IF EXISTS `professores`;
CREATE TABLE IF NOT EXISTS `professores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telefone_id` int(10) unsigned NOT NULL,
  `escola_id` int(10) unsigned NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nascimento` date NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `telefone_id` (`telefone_id`),
  KEY `FK_professores_escolas` (`escola_id`),
  CONSTRAINT `FK_professores_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_professores_telefones` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.professores: ~2 rows (aproximadamente)
DELETE FROM `professores`;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` (`id`, `telefone_id`, `escola_id`, `nome`, `data_nascimento`, `email`, `sexo`, `endereco`, `cep`, `numero`, `bairro`, `estado`, `cidade`, `user_id`, `created_at`, `updated_at`) VALUES
	(24, 134, 9, 'professor1', '2017-12-07', 'professor1@escola.com', 'm', 'Rua Otávio Cesário Pereira', '88309-301', '33', 'São Vicente', 'SC', 'Itajaí', 96, '2017-12-08 00:21:46', '2017-12-08 00:21:46'),
	(25, 137, 6, 'professor2', '2017-12-08', 'professor2@escola.com', 'm', 'Rua Otávio Cesário Pereira 1075, São Vicente', '88309-301', '55', 'São Vicente', 'SC', 'Itajaí', 97, '2017-12-08 02:47:29', '2017-12-08 02:47:29');
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.responsaveis
DROP TABLE IF EXISTS `responsaveis`;
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
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `telefone_id` (`telefone_id`),
  KEY `FK_responsaveis_escolas` (`escola_id`),
  CONSTRAINT `FK_responsaveis_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`),
  CONSTRAINT `pais_telefone_id_id_foreing` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.responsaveis: ~3 rows (aproximadamente)
DELETE FROM `responsaveis`;
/*!40000 ALTER TABLE `responsaveis` DISABLE KEYS */;
INSERT INTO `responsaveis` (`id`, `nome`, `sexo`, `data_nascimento`, `telefone_id`, `escola_id`, `email`, `endereco`, `cep`, `numero`, `bairro`, `estado`, `cidade`, `user_id`, `created_at`, `updated_at`) VALUES
	(16, 'teste', 'm', '2017-12-05', 115, 9, ' resp2@escola.com', 'fsd', '325', 323, 'gdg', 'gdgs', 'dfgdf', 18, '2017-12-05 18:30:47', '2017-12-05 18:30:47'),
	(19, 'pai1', 'm', '2017-12-05', 128, 6, 'pai1@pai.com', 'fb', '45', 4, 'h', 'h', 'h', 90, '2017-12-05 23:29:17', '2017-12-05 23:29:17'),
	(20, 'Fernando Souza', 'm', '2017-12-05', 129, 6, 'fernando@escola.com', 'Rua Otávio Cesário Pereira 1075, São Vicente', '88309-301', 44, 'São Vicente', 'SC', 'Itajaí', 91, '2017-12-06 17:58:05', '2017-12-06 17:58:05');
/*!40000 ALTER TABLE `responsaveis` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.telefones
DROP TABLE IF EXISTS `telefones`;
CREATE TABLE IF NOT EXISTS `telefones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=139 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.telefones: ~138 rows (aproximadamente)
DELETE FROM `telefones`;
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
	(27, '12123123123', '2017-11-03 12:21:43', '2017-11-03 12:21:43'),
	(28, '', '2017-11-03 12:22:30', '2017-11-03 12:22:30'),
	(29, '', '2017-11-03 12:24:53', '2017-11-03 12:24:53'),
	(30, '', '2017-11-03 12:28:35', '2017-11-03 12:28:35'),
	(31, '12312332', '2017-11-03 12:29:00', '2017-11-03 12:29:00'),
	(32, '12312332', '2017-11-03 12:29:41', '2017-11-03 12:29:41'),
	(33, '123456', '2017-11-03 12:32:52', '2017-11-03 12:32:52'),
	(34, '', '2017-11-03 12:35:08', '2017-11-03 12:35:08'),
	(35, '', '2017-11-03 12:37:50', '2017-11-03 12:37:50'),
	(36, '', '2017-11-03 12:38:26', '2017-11-03 12:38:26'),
	(37, '', '2017-11-03 12:41:11', '2017-11-03 12:41:11'),
	(38, '', '2017-11-03 12:42:06', '2017-11-03 12:42:06'),
	(39, '', '2017-11-03 12:42:10', '2017-11-03 12:42:10'),
	(40, '12318712', '2017-11-03 12:43:00', '2017-11-03 12:43:00'),
	(41, '', '2017-11-03 12:47:52', '2017-11-03 12:47:52'),
	(42, '12123123123', '2017-11-03 12:55:05', '2017-11-03 12:55:05'),
	(43, '212122212133', '2017-11-03 13:01:12', '2017-11-03 18:13:36'),
	(44, '987321789123', '2017-11-03 13:06:45', '2017-11-03 18:13:17'),
	(45, '12123123123', '2017-11-03 14:28:44', '2017-11-03 14:28:44'),
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
	(138, '', '2017-12-08 07:06:41', '2017-12-08 07:06:41');
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.turmas
DROP TABLE IF EXISTS `turmas`;
CREATE TABLE IF NOT EXISTS `turmas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `escola_id` int(10) unsigned NOT NULL,
  `ano` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_turmas_escolas` (`escola_id`),
  CONSTRAINT `FK_turmas_escolas` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.turmas: ~6 rows (aproximadamente)
DELETE FROM `turmas`;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` (`id`, `escola_id`, `ano`, `created_at`, `updated_at`) VALUES
	(12, 6, '103', '2017-12-05 06:28:26', '2017-12-05 06:28:26'),
	(13, 6, '101', '2017-12-08 02:41:13', '2017-12-08 02:41:13'),
	(14, 6, '102', '2017-12-08 02:56:04', '2017-12-08 02:56:04'),
	(15, 6, '104', '2017-12-08 02:56:04', '2017-12-08 02:56:04'),
	(16, 6, '201', '2017-12-08 13:55:45', '2017-12-08 13:55:45'),
	(17, 6, '101B', '2017-12-08 15:46:48', '2017-12-08 15:47:05');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.turma_professores
DROP TABLE IF EXISTS `turma_professores`;
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

-- Copiando dados para a tabela escola_rapida_2.turma_professores: ~6 rows (aproximadamente)
DELETE FROM `turma_professores`;
/*!40000 ALTER TABLE `turma_professores` DISABLE KEYS */;
INSERT INTO `turma_professores` (`turma_id`, `professor_id`, `created_at`, `updated_at`) VALUES
	(13, 24, '2017-12-08 02:41:13', '2017-12-08 02:41:13'),
	(14, 25, '2017-12-08 02:56:04', '2017-12-08 02:56:04'),
	(14, 24, '2017-12-08 02:41:13', '2017-12-08 02:41:13'),
	(16, 24, '2017-12-08 13:55:45', '2017-12-08 13:55:45'),
	(17, 24, '2017-12-08 15:47:16', '2017-12-08 15:47:16'),
	(17, 25, '2017-12-08 15:47:16', '2017-12-08 15:47:16');
/*!40000 ALTER TABLE `turma_professores` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `permission_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.users: ~8 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `permission_id`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@admin.com', '$2y$10$MQsV9QTERDOUFHK7dMGGq.am3GDR30NLuq3yj2mbPOVr0gxcR7M62', 1, 'aiWtSRkcpRtxZ7ex3VD5beiGURYQVRCsuCL9mmyNibbCyHKMpD0GHKChCr4W', '2017-09-25 23:48:05', '2017-12-07 18:40:31'),
	(2, 'escola', 'escola1@escola1.com', '$2y$10$KU2CXv0wr0VqYMlvni4s0eBGNI89uR1czHdLjr8hjxNMjJFK/EOF.', 2, '2nlX644vjfw1bV4IeF0uokFybTDVTHvdSUJ8OlrKbg4i7EFDPtimccL0b04J', '2017-11-08 19:10:49', '2017-12-08 17:36:12'),
	(77, 'Joaquim da Silva', ' joaquim@escola.com', '$2y$10$UjP9zqf8FYVskwoYtcwMRerGLUOoyrvXaAazpFgAdNetJakmEHC1W', 4, NULL, '2017-12-07 19:55:48', '2017-12-07 19:55:48'),
	(90, 'responsavel', 'pai1@pai.com', '$2y$10$3nc5SxwYsKrZbw7JRI.3lOzXbbBn8bjBER1tc3vFtP31h/EfhXgca', 4, 'en1b3vD5kaVze6g60Zl1UBR37O0zEiWyuEGtlauGPxnKfbbxtdH0v9egAfWf', '2017-12-05 23:29:16', '2017-12-08 17:10:09'),
	(91, 'Fernando Souza', 'fernando@escola.com', '$2y$10$OLsX35.SFlhQLgp5qxtQSOMeOYpvlWnPcVovseKRJvirrCLWgY3p.', 4, NULL, '2017-12-06 17:58:05', '2017-12-06 17:58:05'),
	(93, 'escola2', 'escola2@escola.com', '$2y$10$JdnSmvg.8qtdnWyA7TTm7eEDngCUOhBH01Z/IfP8c7cCsxuQQ.zSS', 2, 'SNj5W9Oka9l0P8k6OBNAvQTagMbo6cyt32mhrkBz0qI2PDaxTfO8Vt90Ra4x', '2017-12-08 00:05:07', '2017-12-08 02:18:57'),
	(96, 'professor1', 'professor1@escola.com', '$2y$10$xaWHzILNdDogkaOtxWlBRe1SyPSwM.mejQHBxTW3S7EcsYrjJJqlW', 3, 'PEg6A6zvn2IDEBAa3UtItV1fNjJjzR5k5Y9lGxzumcKil94lTGFEfjZJPpgM', '2017-12-08 00:21:45', '2017-12-08 17:36:40'),
	(97, 'professor2', 'professor2@escola.com', '$2y$10$/FIJ6qPEnTmITWeoVy18PO0bLJZ3E2Qg/FK3u099JiIVK8WuoB72i', 3, NULL, '2017-12-08 02:47:29', '2017-12-08 02:47:29');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
