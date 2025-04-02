-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: trabalhofinal
-- ------------------------------------------------------
-- Server version	5.5.5-10.4.32-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cargas`
--

DROP TABLE IF EXISTS `cargas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cargas` (
  `carga_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `descricao` varchar(255) DEFAULT NULL,
  `peso` decimal(10,2) DEFAULT NULL,
  `data_embarque` date DEFAULT NULL,
  `motorista_id` bigint(20) unsigned NOT NULL,
  `veiculo_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`carga_id`),
  KEY `cargas_motorista_id_foreign` (`motorista_id`),
  KEY `cargas_veiculo_id_foreign` (`veiculo_id`),
  CONSTRAINT `cargas_motorista_id_foreign` FOREIGN KEY (`motorista_id`) REFERENCES `motoristas` (`motorista_id`) ON DELETE CASCADE,
  CONSTRAINT `cargas_veiculo_id_foreign` FOREIGN KEY (`veiculo_id`) REFERENCES `veiculos` (`veiculo_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargas`
--

LOCK TABLES `cargas` WRITE;
/*!40000 ALTER TABLE `cargas` DISABLE KEYS */;
INSERT INTO `cargas` VALUES (12,'Carga de cigarros do Paraguai',3000.00,'2024-11-25',7,10,'2024-11-25 13:38:55','2025-04-01 20:01:23');
/*!40000 ALTER TABLE `cargas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-04-02 16:38:59
