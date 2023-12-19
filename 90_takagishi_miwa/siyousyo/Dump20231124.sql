-- MySQL dump 10.13  Distrib 8.0.34, for Win64 (x86_64)
--
-- Host: localhost    Database: illustrator_web
-- ------------------------------------------------------
-- Server version	8.0.35

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
-- Table structure for table `business_field_info`
--

DROP TABLE IF EXISTS `business_field_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `business_field_info` (
  `business_field_id` int NOT NULL,
  `business_field_name` varchar(150) DEFAULT NULL,
  `registrant_name` varchar(150) DEFAULT NULL,
  `registrant_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `update_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`business_field_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `business_field_info`
--

LOCK TABLES `business_field_info` WRITE;
/*!40000 ALTER TABLE `business_field_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `business_field_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `illustrator_info`
--

DROP TABLE IF EXISTS `illustrator_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `illustrator_info` (
  `illustrator_id` int NOT NULL AUTO_INCREMENT,
  `illustrator_name` varchar(250) DEFAULT NULL,
  `profile_img` varchar(250) DEFAULT NULL,
  `age_flog` char(1) DEFAULT NULL,
  `sex` char(4) DEFAULT NULL,
  `business_field_id` int DEFAULT NULL,
  `self_intro` varchar(45) DEFAULT NULL,
  `member_id` int DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `delete_date` datetime DEFAULT NULL,
  `registrant_date` datetime DEFAULT NULL,
  `update_name` varchar(150) DEFAULT NULL,
  `delete_name` varchar(150) DEFAULT NULL,
  `registrant_name` varchar(150) DEFAULT NULL,
  `logic_delete_flag` char(1) DEFAULT NULL,
  PRIMARY KEY (`illustrator_id`),
  KEY `mamber_id_idx` (`member_id`),
  KEY `fk_illustrator_business_field` (`business_field_id`),
  CONSTRAINT `fk_illustrator_business_field` FOREIGN KEY (`business_field_id`) REFERENCES `business_field_info` (`business_field_id`),
  CONSTRAINT `illustrator_info_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_m` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `illustrator_info`
--

LOCK TABLES `illustrator_info` WRITE;
/*!40000 ALTER TABLE `illustrator_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `illustrator_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inquiry_info`
--

DROP TABLE IF EXISTS `inquiry_info`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `inquiry_info` (
  `inquiry_id` int NOT NULL AUTO_INCREMENT,
  `message` text,
  `member_id` int DEFAULT NULL,
  `registrant_name` varchar(255) DEFAULT NULL,
  `registrant_date` datetime DEFAULT NULL,
  `update_name` varchar(150) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`inquiry_id`),
  KEY `mamber_id` (`member_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inquiry_info`
--

LOCK TABLES `inquiry_info` WRITE;
/*!40000 ALTER TABLE `inquiry_info` DISABLE KEYS */;
/*!40000 ALTER TABLE `inquiry_info` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member_m`
--

DROP TABLE IF EXISTS `member_m`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member_m` (
  `member_id` int NOT NULL,
  `mail_address` varchar(150) DEFAULT NULL,
  `password` varchar(8) DEFAULT NULL,
  `address` varchar(150) DEFAULT NULL,
  `birth_data` date DEFAULT NULL,
  `phone_number` char(9) DEFAULT NULL,
  `update_date` timestamp NULL DEFAULT NULL,
  `registrant_date` timestamp NULL DEFAULT NULL,
  `deletion_date` timestamp NULL DEFAULT NULL,
  `logic_deletion_flag` char(1) DEFAULT NULL,
  `favorite_ckeck` varchar(250) DEFAULT NULL,
  `inquiry_id` int DEFAULT NULL,
  `member_name` varchar(150) DEFAULT NULL,
  `deletion_name` varchar(150) DEFAULT NULL,
  `update_name` varchar(150) DEFAULT NULL,
  `registrant_name` varchar(150) DEFAULT NULL,
  PRIMARY KEY (`member_id`),
  KEY `inquiry_id` (`inquiry_id`),
  CONSTRAINT `member_m_ibfk_1` FOREIGN KEY (`inquiry_id`) REFERENCES `inquiry_info` (`inquiry_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member_m`
--

LOCK TABLES `member_m` WRITE;
/*!40000 ALTER TABLE `member_m` DISABLE KEYS */;
/*!40000 ALTER TABLE `member_m` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-24 10:39:50
