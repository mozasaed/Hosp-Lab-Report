-- MySQL dump 10.13  Distrib 8.0.29, for Linux (x86_64)
--
-- Host: localhost    Database: HLR
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

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
-- Table structure for table `hlr_equipments`
--

DROP TABLE IF EXISTS `hlr_equipments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hlr_equipments` (
  `equipmentId` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `description` varchar(200) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `fromDate` date DEFAULT NULL,
  `toDate` date DEFAULT NULL,
  `timeline` varchar(200) DEFAULT NULL,
  `createdBy` int DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` int DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`equipmentId`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hlr_equipments`
--

LOCK TABLES `hlr_equipments` WRITE;
/*!40000 ALTER TABLE `hlr_equipments` DISABLE KEYS */;
INSERT INTO `hlr_equipments` VALUES (1,'Generators','For electricity emergency',1,'2023-02-27','2023-04-08','',1,'2023-03-24 07:05:43',1,'2023-03-24 07:05:43'),(2,'Medicine','For providing to patients',1,'2023-02-26','2023-03-08','',1,'2023-03-24 07:07:47',1,'2023-03-24 07:07:47'),(3,'Defibrillator','None',1,'2023-03-06','2023-04-21','',1,'2023-03-24 07:14:14',1,'2023-03-24 07:14:14'),(4,'Patient monitors','None',1,'2023-03-04','2023-04-03','',1,'2023-03-24 07:15:09',1,'2023-03-24 07:15:09'),(5,'Mobile operating light','None',1,'2023-03-07','2023-04-07','',0,'2023-03-24 07:27:06',0,'2023-03-24 07:27:06');
/*!40000 ALTER TABLE `hlr_equipments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hlr_equiptReport`
--

DROP TABLE IF EXISTS `hlr_equiptReport`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hlr_equiptReport` (
  `eqReptId` int NOT NULL AUTO_INCREMENT,
  `hospId` int DEFAULT NULL,
  `equipId` int DEFAULT NULL,
  `statusId` int DEFAULT NULL,
  `createdBy` int DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` int DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`eqReptId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hlr_equiptReport`
--

LOCK TABLES `hlr_equiptReport` WRITE;
/*!40000 ALTER TABLE `hlr_equiptReport` DISABLE KEYS */;
INSERT INTO `hlr_equiptReport` VALUES (1,1,1,3,1,'2023-03-28 05:31:32',1,'2023-03-28 05:31:32'),(2,1,2,1,1,'2023-03-28 05:31:32',1,'2023-03-28 05:31:32'),(3,1,3,1,1,'2023-03-28 05:31:32',1,'2023-03-28 05:31:32'),(4,1,4,2,1,'2023-03-28 05:31:32',1,'2023-03-28 05:31:32'),(5,1,5,2,1,'2023-03-28 05:31:32',1,'2023-03-28 05:31:32'),(6,4,1,2,1,'2023-03-28 05:32:20',1,'2023-03-28 05:32:20'),(7,4,2,1,1,'2023-03-28 05:32:20',1,'2023-03-28 05:32:20'),(8,4,3,2,1,'2023-03-28 05:32:20',1,'2023-03-28 05:32:20'),(9,4,4,2,1,'2023-03-28 05:32:20',1,'2023-03-28 05:32:20'),(10,4,5,2,1,'2023-03-28 05:32:20',1,'2023-03-28 05:32:20');
/*!40000 ALTER TABLE `hlr_equiptReport` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hlr_hospitals`
--

DROP TABLE IF EXISTS `hlr_hospitals`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hlr_hospitals` (
  `hospId` int NOT NULL AUTO_INCREMENT,
  `regNo` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `createdBy` int DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` int DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`hospId`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hlr_hospitals`
--

LOCK TABLES `hlr_hospitals` WRITE;
/*!40000 ALTER TABLE `hlr_hospitals` DISABLE KEYS */;
INSERT INTO `hlr_hospitals` VALUES (1,'DH-001','Chumbuni',1,0,'2023-03-23 13:08:12',0,'2023-03-23 13:08:12'),(2,'DH-002','Kinyasini',1,0,'2023-03-23 13:08:24',0,'2023-03-23 13:08:24'),(3,'DH-003','Mbuzini',1,1,'2023-03-24 07:23:59',0,'2023-03-24 07:23:59'),(4,'DH-004','Magogoni',1,0,'2023-03-24 07:24:10',0,'2023-03-24 07:24:10');
/*!40000 ALTER TABLE `hlr_hospitals` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hlr_report_status`
--

DROP TABLE IF EXISTS `hlr_report_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hlr_report_status` (
  `statusId` int NOT NULL AUTO_INCREMENT,
  `statusName` varchar(100) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `createdBy` int DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` int DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`statusId`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hlr_report_status`
--

LOCK TABLES `hlr_report_status` WRITE;
/*!40000 ALTER TABLE `hlr_report_status` DISABLE KEYS */;
INSERT INTO `hlr_report_status` VALUES (1,'Pending',1,0,'2023-03-23 13:28:07',0,'2023-03-23 13:28:07'),(2,'Unknown',1,1,'2023-03-24 07:13:16',1,'2023-03-24 07:13:16'),(3,'Stopped',1,1,'2023-03-24 07:13:33',1,'2023-03-24 07:13:33');
/*!40000 ALTER TABLE `hlr_report_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `hlr_users`
--

DROP TABLE IF EXISTS `hlr_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `hlr_users` (
  `userId` int NOT NULL AUTO_INCREMENT,
  `userName` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `role` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `createdBy` int DEFAULT NULL,
  `createdDate` datetime DEFAULT NULL,
  `modifiedBy` int DEFAULT NULL,
  `modifiedDate` datetime DEFAULT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hlr_users`
--

LOCK TABLES `hlr_users` WRITE;
/*!40000 ALTER TABLE `hlr_users` DISABLE KEYS */;
INSERT INTO `hlr_users` VALUES (1,'Moza','mozasaid511@gmail.com','admin','c51759f0b085cc8bcd0bce2ec2818849c13f57bd25366a5d9',1,NULL,'2023-03-23 12:32:33',NULL,'2023-03-23 12:32:33');
/*!40000 ALTER TABLE `hlr_users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-29 13:36:37
