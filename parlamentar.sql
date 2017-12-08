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
CREATE DATABASE IF NOT EXISTS `escola_rapida_2` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `escola_rapida_2`;

-- Copiando estrutura para tabela escola_rapida_2.alunos
CREATE TABLE IF NOT EXISTS `alunos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `turma_id` int(10) unsigned NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pai_id` int(10) unsigned NOT NULL,
  `data_nascimento` date NOT NULL,
  `sexo` char(50) COLLATE utf8_unicode_ci NOT NULL,
  `telefone_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `alunos_turma_id_foreign` (`turma_id`),
  KEY `alunos_pai_id_foreign` (`pai_id`),
  KEY `alunos_telefone_id_foreign` (`telefone_id`),
  CONSTRAINT `alunos_pai_id_foreign` FOREIGN KEY (`pai_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE,
  CONSTRAINT `alunos_telefone_id_foreign` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE,
  CONSTRAINT `alunos_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.alunos: ~0 rows (aproximadamente)
DELETE FROM `alunos`;
/*!40000 ALTER TABLE `alunos` DISABLE KEYS */;
INSERT INTO `alunos` (`id`, `turma_id`, `nome`, `pai_id`, `data_nascimento`, `sexo`, `telefone_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 'alessandra', 1, '1993-06-20', 'm', 22, '2017-10-14 22:45:37', '2017-10-14 22:45:37');
/*!40000 ALTER TABLE `alunos` ENABLE KEYS */;

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `escolas_telefone_id_foreign` (`telefone_id`),
  CONSTRAINT `escolas_telefone_id_foreign` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.escolas: ~0 rows (aproximadamente)
DELETE FROM `escolas`;
/*!40000 ALTER TABLE `escolas` DISABLE KEYS */;
INSERT INTO `escolas` (`id`, `nome`, `telefone_id`, `diretor`, `email`, `endereco`, `cep`, `numero`, `bairro`, `estado`, `cidade`, `created_at`, `updated_at`) VALUES
	(1, 'Aníbal Cesar', 26, 'Roberto', 'kaymon.storino@gmail.com', 'Rua Otávio Cesário Pereira 1075, São Vicente', '88309-301', 255, 'São Vicente', 'SC', 'Itajaí', '2017-10-14 23:20:40', '2017-10-14 23:20:40');
/*!40000 ALTER TABLE `escolas` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.eventos
CREATE TABLE IF NOT EXISTS `eventos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.eventos: ~6 rows (aproximadamente)
DELETE FROM `eventos`;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` (`id`, `titulo`, `descricao`, `date`, `time`, `created_at`, `updated_at`) VALUES
	(4, 'evento convocando os pais', 'teste', '2017-11-10', '00:16:00', '2017-10-11 03:18:06', '2017-10-11 03:18:06'),
	(5, 'teste evento', 'teste\r\ndgsdgds\r\ndgdsgds\r\ngdsgf', '2017-10-18', '14:00:00', '2017-10-11 03:40:35', '2017-10-14 06:52:33'),
	(6, 'Reunião de Classe 2', 'test áção', '2017-10-21', '17:00:00', '2017-10-11 03:58:36', '2017-10-11 03:58:36'),
	(7, 'titulo teste turma evento', 'teste descricao evento turmas', '2017-10-25', '16:15:00', '2017-10-11 04:27:24', '2017-10-11 04:27:24'),
	(8, 'Reunião de Classe ', 'desc', '2017-10-16', '14:10:00', '2017-10-11 04:45:24', '2017-10-11 04:45:24'),
	(9, 'atividades', 'ewe', '2017-10-27', '03:00:00', '2017-10-14 06:00:05', '2017-10-14 06:00:05');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.evento_paras
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
  CONSTRAINT `evento_paras_pai_id_foreign` FOREIGN KEY (`pai_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE,
  CONSTRAINT `evento_paras_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.evento_paras: ~3 rows (aproximadamente)
DELETE FROM `evento_paras`;
/*!40000 ALTER TABLE `evento_paras` DISABLE KEYS */;
INSERT INTO `evento_paras` (`id`, `evento_id`, `escola_id`, `turma_id`, `pai_id`, `created_at`, `updated_at`) VALUES
	(11, 7, NULL, 1, NULL, '2017-10-11 04:27:24', '2017-10-11 04:27:24'),
	(12, 7, NULL, 2, NULL, '2017-10-11 04:27:24', '2017-10-11 04:27:24'),
	(13, 7, NULL, 3, NULL, '2017-10-11 04:27:24', '2017-10-11 04:27:24');
/*!40000 ALTER TABLE `evento_paras` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.mensagem_paras
CREATE TABLE IF NOT EXISTS `mensagem_paras` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `mensagem_id` int(10) unsigned DEFAULT NULL,
  `escola_id` int(10) unsigned DEFAULT NULL,
  `turma_id` int(10) unsigned DEFAULT NULL,
  `pai_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `mensagem_paras_mensagem_id_foreign` (`mensagem_id`),
  KEY `mensagem_paras_escola_id_foreign` (`escola_id`),
  KEY `mensagem_paras_turma_id_foreign` (`turma_id`),
  KEY `mensagem_paras_pai_id_foreign` (`pai_id`),
  CONSTRAINT `mensagem_paras_escola_id_foreign` FOREIGN KEY (`escola_id`) REFERENCES `escolas` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mensagem_paras_mensagem_id_foreign` FOREIGN KEY (`mensagem_id`) REFERENCES `mensagens` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mensagem_paras_pai_id_foreign` FOREIGN KEY (`pai_id`) REFERENCES `pais` (`id`) ON DELETE CASCADE,
  CONSTRAINT `mensagem_paras_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.mensagem_paras: ~3 rows (aproximadamente)
DELETE FROM `mensagem_paras`;
/*!40000 ALTER TABLE `mensagem_paras` DISABLE KEYS */;
INSERT INTO `mensagem_paras` (`id`, `mensagem_id`, `escola_id`, `turma_id`, `pai_id`, `created_at`, `updated_at`) VALUES
	(7, 7, NULL, 1, NULL, '2017-10-11 05:20:44', '2017-10-11 05:20:44'),
	(8, 7, NULL, 2, NULL, '2017-10-11 05:20:44', '2017-10-11 05:20:44'),
	(9, 7, NULL, 3, NULL, '2017-10-11 05:20:44', '2017-10-11 05:20:44');
/*!40000 ALTER TABLE `mensagem_paras` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.mensagens
CREATE TABLE IF NOT EXISTS `mensagens` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `corpo` text COLLATE utf8_unicode_ci NOT NULL,
  `lido` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.mensagens: ~5 rows (aproximadamente)
DELETE FROM `mensagens`;
/*!40000 ALTER TABLE `mensagens` DISABLE KEYS */;
INSERT INTO `mensagens` (`id`, `titulo`, `corpo`, `lido`, `created_at`, `updated_at`) VALUES
	(1, 'Título teste', '            <h1><u>Heading Of Message</u></h1>\r\n      <h4>Subheading</h4>\r\n      <p>But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain\r\n        was born and I will give you a complete account of the system, and expound the actual teachings\r\n        of the great explorer of the truth, the master-builder of human happiness. No one rejects,\r\n        dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know\r\n        how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again\r\n        is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain,\r\n        but because occasionally circumstances occur in which toil and pain can procure him some great\r\n        pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise,\r\n        except to obtain some advantage from it? But who has any right to find fault with a man who\r\n        chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that\r\n        produces no resultant pleasure? On the other hand, we denounce with righteous indignation and\r\n        dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so\r\n        blinded by desire, that they cannot foresee</p>\r\n      <ul>\r\n        <li>List item one</li>\r\n        <li>List item two</li>\r\n        <li>List item three</li>\r\n        <li>List item four</li>\r\n      </ul>\r\n      <p>Thank you,</p>\r\n      <p>John Doe</p>\r\n    ', 0, '2017-10-08 04:12:40', '2017-10-08 04:12:40'),
	(2, '', '', 0, '2017-10-08 04:55:22', '2017-10-08 04:55:22'),
	(3, '', '', 0, '2017-10-08 04:56:33', '2017-10-08 04:56:33'),
	(4, 'titulo teste escola', 'mensagem corpo escola', 0, '2017-10-08 04:59:18', '2017-10-08 04:59:18'),
	(5, 'ola escola ', 'testse', 0, '2017-10-08 05:00:39', '2017-10-08 05:00:39'),
	(6, 'teste', 'testes', 0, '2017-10-08 05:01:31', '2017-10-08 05:01:31'),
	(7, 'msg turma', 'teste', 0, '2017-10-11 05:20:44', '2017-10-11 05:20:44'),
	(8, 'teste', 'teste', 0, '2017-10-14 06:55:36', '2017-10-14 06:55:36');
/*!40000 ALTER TABLE `mensagens` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.migrations: ~12 rows (aproximadamente)
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
	(18, '2017_10_13_211629_add_foreing_key_to_telefones_table2', 9);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.pais
CREATE TABLE IF NOT EXISTS `pais` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `telefone_id` int(11) unsigned NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `telefone_id` (`telefone_id`),
  CONSTRAINT `pais_telefone_id_id_foreing` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.pais: ~1 rows (aproximadamente)
DELETE FROM `pais`;
/*!40000 ALTER TABLE `pais` DISABLE KEYS */;
INSERT INTO `pais` (`id`, `nome`, `sexo`, `data_nascimento`, `telefone_id`, `email`, `endereco`, `cep`, `numero`, `bairro`, `estado`, `cidade`, `created_at`, `updated_at`) VALUES
	(1, 'KAYMON KLEVERSON STORINO', 'm', '1993-06-20', 25, 'kaymon.storino@gmail.com', 'Rua Otávio Cesário Pereira 1075, São Vicente', '88309-301', 255, 'São Vicente', 'SC', 'Itajaí', '2017-10-14 21:45:10', '2017-10-14 23:13:57');
/*!40000 ALTER TABLE `pais` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.password_resets
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
CREATE TABLE IF NOT EXISTS `professores` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `telefone_id` int(10) unsigned NOT NULL,
  `data` date DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexo` char(1) COLLATE utf8_unicode_ci DEFAULT NULL,
  `endereco` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `numero` int(11) DEFAULT NULL,
  `bairro` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `estado` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `telefone_id` (`telefone_id`),
  CONSTRAINT `FK_professores_telefones` FOREIGN KEY (`telefone_id`) REFERENCES `telefones` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.professores: ~0 rows (aproximadamente)
DELETE FROM `professores`;
/*!40000 ALTER TABLE `professores` DISABLE KEYS */;
INSERT INTO `professores` (`id`, `nome`, `telefone_id`, `data`, `email`, `sexo`, `endereco`, `cep`, `numero`, `bairro`, `estado`, `cidade`, `created_at`, `updated_at`) VALUES
	(3, 'KAYMON KLEVERSON STORINO', 20, NULL, 'kaymon.storino@gmail.com', 'm', 'fcxdbfd', 'et4r', 255, 'bfb', 'fdbfd', 'fdbfd', '2017-10-14 22:34:01', '2017-10-14 22:34:01');
/*!40000 ALTER TABLE `professores` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.telefones
CREATE TABLE IF NOT EXISTS `telefones` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `telefone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.telefones: ~25 rows (aproximadamente)
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
	(26, '3645435344', '2017-10-14 23:20:40', '2017-10-14 23:20:40');
/*!40000 ALTER TABLE `telefones` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.turmas
CREATE TABLE IF NOT EXISTS `turmas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ano` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.turmas: ~2 rows (aproximadamente)
DELETE FROM `turmas`;
/*!40000 ALTER TABLE `turmas` DISABLE KEYS */;
INSERT INTO `turmas` (`id`, `ano`, `created_at`, `updated_at`) VALUES
	(1, 101, '2017-10-05 19:06:15', '2017-10-05 19:06:15'),
	(2, 102, '2017-10-05 19:06:29', '2017-10-05 19:06:29'),
	(3, 201, '2017-10-05 19:06:50', '2017-10-05 19:06:50');
/*!40000 ALTER TABLE `turmas` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.turma_professores
CREATE TABLE IF NOT EXISTS `turma_professores` (
  `turma_id` int(10) unsigned DEFAULT NULL,
  `professor_id` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `turma_professores_turma_id_foreign` (`turma_id`),
  KEY `turma_professores_professor_id_foreign` (`professor_id`),
  CONSTRAINT `turma_professores_professor_id_foreign` FOREIGN KEY (`professor_id`) REFERENCES `professores` (`id`) ON DELETE CASCADE,
  CONSTRAINT `turma_professores_turma_id_foreign` FOREIGN KEY (`turma_id`) REFERENCES `turmas` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.turma_professores: ~1 rows (aproximadamente)
DELETE FROM `turma_professores`;
/*!40000 ALTER TABLE `turma_professores` DISABLE KEYS */;
/*!40000 ALTER TABLE `turma_professores` ENABLE KEYS */;

-- Copiando estrutura para tabela escola_rapida_2.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Copiando dados para a tabela escola_rapida_2.users: ~0 rows (aproximadamente)
DELETE FROM `users`;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Admin', 'admin@admin.com', '$2y$10$MQsV9QTERDOUFHK7dMGGq.am3GDR30NLuq3yj2mbPOVr0gxcR7M62', 'ekX2UEC9VqVNOVIjOODjLKuJAfhCIGeJf2uyy5LV8RDu4PfTx0jLunlwFyud', '2017-09-25 23:48:05', '2017-09-25 23:55:41');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
