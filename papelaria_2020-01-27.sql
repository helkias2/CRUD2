# ************************************************************
# Sequel Pro SQL dump
# Versão 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.25)
# Base de Dados: papelaria
# Tempo de Geração: 2020-01-27 03:44:21 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela tbproduto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbproduto`;

CREATE TABLE `tbproduto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `descricao` varchar(500) DEFAULT NULL,
  `preco` float(10,0) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbproduto` WRITE;
/*!40000 ALTER TABLE `tbproduto` DISABLE KEYS */;

INSERT INTO `tbproduto` (`id`, `nome`, `descricao`, `preco`, `user_id`)
VALUES
	(1,'Lapis','Lapis preto',10,1),
	(2,'Marcos Maciel da Silva Oliveira Marcos','teste',15000,1),
	(3,'qweqweqwe','qweqweqwe',15000,1),
	(4,NULL,NULL,NULL,1);

/*!40000 ALTER TABLE `tbproduto` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela tbusers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `tbusers`;

CREATE TABLE `tbusers` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `senha` varchar(36) DEFAULT NULL,
  `token` varchar(36) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `tbusers` WRITE;
/*!40000 ALTER TABLE `tbusers` DISABLE KEYS */;

INSERT INTO `tbusers` (`id`, `nome`, `email`, `senha`, `token`)
VALUES
	(1,'Antônio Silva Oliveira','t@t.com','202cb962ac59075b964b07152d234b70',NULL),
	(2,'marcos maciel','m@m.com','202cb962ac59075b964b07152d234b70',NULL),
	(3,'Samplemed e-ducar','admin@empresa123.com.br','202cb962ac59075b964b07152d234b70',NULL),
	(4,'Samplemed e-ducar','admin@empresa123.com.br','202cb962ac59075b964b07152d234b70',NULL),
	(5,'Samplemed e-ducar','admin@empresa123.com.br','202cb962ac59075b964b07152d234b70',NULL),
	(6,'marcos maciel da silva oliveira','a@a.com','e10adc3949ba59abbe56e057f20f883e',NULL);

/*!40000 ALTER TABLE `tbusers` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
