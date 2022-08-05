-- MySQL dump 10.13  Distrib 8.0.30, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: ip_address_management
-- ------------------------------------------------------
-- Server version	8.0.30

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
-- Table structure for table `audits`
--

DROP TABLE IF EXISTS `audits`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `audits` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `event` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `auditable_id` bigint unsigned NOT NULL,
  `old_values` text COLLATE utf8mb4_unicode_ci,
  `new_values` text COLLATE utf8mb4_unicode_ci,
  `url` text COLLATE utf8mb4_unicode_ci,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` varchar(1023) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tags` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `audits_auditable_type_auditable_id_index` (`auditable_type`,`auditable_id`),
  KEY `audits_user_id_user_type_index` (`user_id`,`user_type`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `audits`
--

LOCK TABLES `audits` WRITE;
/*!40000 ALTER TABLE `audits` DISABLE KEYS */;
INSERT INTO `audits` VALUES (1,NULL,NULL,'created','App\\Models\\User',2,'[]','{\"name\":\"Test User 1\",\"email\":\"testuser1@gmail.com\",\"password\":\"$2y$10$vrydnAemuSQ3Eo07G4OjSuZT6kSL93pohRwO9WAlqRdlrA47WmVE2\",\"id\":2}','http://localhost:8000/api/register','172.22.0.1','PostmanRuntime/7.29.2',NULL,'2022-08-01 22:15:51','2022-08-01 22:15:51'),(2,'App\\Models\\User',1,'created','App\\Models\\IpAddress',1,'[]','{\"ip\":\"202.92.249.112\",\"label\":\"dfsdf\",\"id\":1}','http://localhost:8000/api/ip','172.22.0.1','PostmanRuntime/7.29.2',NULL,'2022-08-02 00:53:18','2022-08-02 00:53:18'),(3,'App\\Models\\User',1,'created','App\\Models\\IpAddress',2,'[]','{\"ip\":\"202.92.249.113\",\"label\":\"dfsdf\",\"id\":2}','http://localhost:8000/api/ip','172.22.0.1','PostmanRuntime/7.29.2',NULL,'2022-08-02 00:55:58','2022-08-02 00:55:58'),(4,'App\\Models\\User',1,'created','App\\Models\\IpAddress',4,'[]','{\"ip\":\"202.92.249.114\",\"label\":\"dfsdf\",\"id\":4}','http://localhost:8000/api/ip','172.22.0.1','PostmanRuntime/7.29.2',NULL,'2022-08-02 00:59:15','2022-08-02 00:59:15'),(5,'App\\Models\\User',1,'created','App\\Models\\IpAddress',5,'[]','{\"ip\":\"202.92.249.115\",\"label\":\"dfsdf\",\"id\":5}','http://localhost:8000/api/ip','172.22.0.1','PostmanRuntime/7.29.2',NULL,'2022-08-02 01:01:34','2022-08-02 01:01:34'),(6,'App\\Models\\User',1,'created','App\\Models\\IpAddress',7,'[]','{\"ip\":\"202.92.249.119\",\"label\":\"New Test Site\",\"id\":7}','http://localhost:8000/api/ip','172.22.0.1','PostmanRuntime/7.29.2',NULL,'2022-08-02 01:12:19','2022-08-02 01:12:19'),(7,'App\\Models\\User',1,'created','App\\Models\\IpAddress',8,'[]','{\"ip\":\"127.0.0.1\",\"label\":\"localhost\",\"id\":8}','http://localhost:8000/api/ip','172.22.0.1','PostmanRuntime/7.29.2',NULL,'2022-08-02 09:26:47','2022-08-02 09:26:47'),(8,'App\\Models\\User',1,'updated','App\\Models\\IpAddress',8,'{\"label\":\"local Server3\"}','{\"label\":\"local Server\"}','http://localhost:8000/api/ip/8','172.22.0.1','PostmanRuntime/7.29.2',NULL,'2022-08-02 09:30:56','2022-08-02 09:30:56'),(9,'App\\Models\\User',1,'updated','App\\Models\\IpAddress',5,'{\"label\":\"test.site.2\"}','{\"label\":\"test.site.1\"}','console','127.0.0.1','Symfony',NULL,'2022-08-02 09:34:43','2022-08-02 09:34:43'),(10,'App\\Models\\User',1,'created','App\\Models\\IpAddress',9,'[]','{\"ip\":\"2001:0db8:85a3:0000:0000:8a2e:0370:7334\",\"label\":\"ipv6 test\",\"id\":9}','http://localhost:8000/api/ip','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-03 21:23:37','2022-08-03 21:23:37'),(11,'App\\Models\\User',1,'created','App\\Models\\IpAddress',10,'[]','{\"ip\":\"192.36.35.244\",\"label\":\"au.com\",\"id\":10}','http://localhost:8000/api/ip','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-03 22:11:10','2022-08-03 22:11:10'),(12,'App\\Models\\User',1,'created','App\\Models\\IpAddress',11,'[]','{\"ip\":\"240.240.240.240\",\"label\":\"240 Server\",\"id\":11}','http://localhost:8000/api/ip','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-03 22:14:55','2022-08-03 22:14:55'),(13,'App\\Models\\User',1,'updated','App\\Models\\IpAddress',4,'{\"label\":\"dfsdf\"}','{\"label\":\"dps server\"}','http://localhost:8000/api/ip/4','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-03 23:52:41','2022-08-03 23:52:41'),(14,'App\\Models\\User',1,'updated','App\\Models\\IpAddress',1,'{\"label\":\"dfsdf\"}','{\"label\":\"DNS Server\"}','http://localhost:8000/api/ip/1','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-03 23:53:20','2022-08-03 23:53:20'),(15,'App\\Models\\User',1,'created','App\\Models\\IpAddress',12,'[]','{\"ip\":\"113.149.60.111\",\"label\":\"ISP\",\"id\":12}','http://localhost:8000/api/ip','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-04 00:05:08','2022-08-04 00:05:08'),(16,'App\\Models\\User',1,'created','App\\Models\\IpAddress',13,'[]','{\"ip\":\"8.8.8.8\",\"label\":\"dns.com\",\"id\":13}','http://localhost:8000/api/ip','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-04 00:07:40','2022-08-04 00:07:40'),(17,'App\\Models\\User',1,'created','App\\Models\\IpAddress',14,'[]','{\"ip\":\"105.105.105.105\",\"label\":\"google\",\"id\":14}','http://localhost:8000/api/ip','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-04 00:10:22','2022-08-04 00:10:22'),(18,'App\\Models\\User',1,'updated','App\\Models\\IpAddress',14,'{\"label\":\"google\"}','{\"label\":\"dngr.cc\"}','http://localhost:8000/api/ip/14','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-04 00:10:47','2022-08-04 00:10:47'),(19,'App\\Models\\User',1,'created','App\\Models\\IpAddress',15,'[]','{\"ip\":\"1.1.1.1\",\"label\":\"toast\",\"id\":15}','http://localhost:8000/api/ip','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-04 00:32:36','2022-08-04 00:32:36'),(20,'App\\Models\\User',1,'updated','App\\Models\\IpAddress',13,'{\"label\":\"dns.com\"}','{\"label\":\"gdns.com\"}','http://localhost:8000/api/ip/13','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-04 00:33:04','2022-08-04 00:33:04'),(21,NULL,NULL,'created','App\\Models\\User',3,'[]','{\"name\":\"John Doe\",\"email\":\"jd@gmail.com\",\"password\":\"$2y$10$Wi12FlhP1yPCDfinetQFneHU4ltEsqk\\/4S\\/hGEnK1FkIrflW5OYuW\",\"id\":3}','http://localhost:8000/api/register','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-04 00:41:13','2022-08-04 00:41:13'),(22,'App\\Models\\User',1,'created','App\\Models\\IpAddress',16,'[]','{\"ip\":\"111.111.111.111\",\"label\":\"load server\",\"id\":16}','http://localhost:8000/api/ip','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-04 01:31:51','2022-08-04 01:31:51'),(23,'App\\Models\\User',1,'updated','App\\Models\\IpAddress',2,'{\"label\":\"dfsdf\"}','{\"label\":\"donejob\"}','http://localhost:8000/api/ip/2','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/103.0.0.0 Safari/537.36',NULL,'2022-08-04 01:33:57','2022-08-04 01:33:57'),(24,NULL,NULL,'created','App\\Models\\User',4,'[]','{\"name\":\"Doe\",\"email\":\"doe@gmail.com\",\"password\":\"$2y$10$x.wo0eU1spTJs7x6WizypOH49gt2z0kJ5WGqI92ofrXBHOjTqrKsu\",\"id\":4}','http://localhost:8000/api/register','172.22.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36',NULL,'2022-08-04 07:08:01','2022-08-04 07:08:01'),(25,NULL,NULL,'created','App\\Models\\User',5,'[]','{\"name\":\"Test User 2\",\"email\":\"testuser2@gmail.com\",\"password\":\"$2y$10$PHEQ6.HHKESsUkBbwKFS.efRNCGdMQXyMrpSdsSHwK9MfA1TK163C\",\"id\":5}','http://localhost:8000/api/register','172.22.0.1','PostmanRuntime/7.29.2',NULL,'2022-08-04 14:53:42','2022-08-04 14:53:42');
/*!40000 ALTER TABLE `audits` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ip_addresses`
--

DROP TABLE IF EXISTS `ip_addresses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ip_addresses` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `ip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `label` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `ip_addresses_ip_unique` (`ip`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ip_addresses`
--

LOCK TABLES `ip_addresses` WRITE;
/*!40000 ALTER TABLE `ip_addresses` DISABLE KEYS */;
INSERT INTO `ip_addresses` VALUES (1,'202.92.249.112','DNS Server','2022-08-02 00:53:18','2022-08-03 23:53:20'),(2,'202.92.249.113','donejob','2022-08-02 00:55:58','2022-08-04 01:33:57'),(4,'202.92.249.114','dps server','2022-08-02 00:59:14','2022-08-03 23:52:41'),(5,'202.92.249.115','test.site.1','2022-08-02 01:01:34','2022-08-02 09:34:43'),(6,'202.92.249.111','Test IP 1','2022-08-02 01:04:15','2022-08-02 01:04:15'),(7,'202.92.249.119','BC Server3','2022-08-02 01:12:19','2022-08-02 09:24:45'),(8,'127.0.0.1','local Server','2022-08-02 09:26:47','2022-08-02 09:30:56'),(9,'2001:0db8:85a3:0000:0000:8a2e:0370:7334','ipv6 test','2022-08-03 21:23:37','2022-08-03 21:23:37'),(10,'192.36.35.244','au.com','2022-08-03 22:11:10','2022-08-03 22:11:10'),(11,'240.240.240.240','240 Server','2022-08-03 22:14:55','2022-08-03 22:14:55'),(12,'113.149.60.111','ISP','2022-08-04 00:05:08','2022-08-04 00:05:08'),(13,'8.8.8.8','gdns.com','2022-08-04 00:07:40','2022-08-04 00:33:04'),(14,'105.105.105.105','dngr.cc','2022-08-04 00:10:22','2022-08-04 00:10:47'),(15,'1.1.1.1','toast','2022-08-04 00:32:35','2022-08-04 00:32:35'),(16,'111.111.111.111','load server','2022-08-04 01:31:51','2022-08-04 01:31:51');
/*!40000 ALTER TABLE `ip_addresses` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2014_10_12_000000_create_users_table',1),(2,'2022_08_01_204140_create_audits_table',2),(3,'2022_08_01_235528_create_ip_addresses_table',3);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Unit Test User 1','unittest1@gmail.com','$2y$04$j7P.QGSQ6SxeMfg2jGCD0.ZwTik.TAfA6gC9nHJRKWEj4j3g5J72K',NULL,'2022-08-01 20:19:44','2022-08-01 20:19:44'),(2,'Test User 1','testuser1@gmail.com','$2y$10$vrydnAemuSQ3Eo07G4OjSuZT6kSL93pohRwO9WAlqRdlrA47WmVE2',NULL,'2022-08-01 22:15:51','2022-08-01 22:15:51'),(3,'John Doe','jd@gmail.com','$2y$10$Wi12FlhP1yPCDfinetQFneHU4ltEsqk/4S/hGEnK1FkIrflW5OYuW',NULL,'2022-08-04 00:41:13','2022-08-04 00:41:13'),(4,'Doe','doe@gmail.com','$2y$10$x.wo0eU1spTJs7x6WizypOH49gt2z0kJ5WGqI92ofrXBHOjTqrKsu',NULL,'2022-08-04 07:08:01','2022-08-04 07:08:01'),(5,'Test User 2','testuser2@gmail.com','$2y$10$PHEQ6.HHKESsUkBbwKFS.efRNCGdMQXyMrpSdsSHwK9MfA1TK163C',NULL,'2022-08-04 14:53:42','2022-08-04 14:53:42');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-08-06  1:42:02
