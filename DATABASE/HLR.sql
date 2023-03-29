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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hlr_equipments`
--

LOCK TABLES `hlr_equipments` WRITE;
/*!40000 ALTER TABLE `hlr_equipments` DISABLE KEYS */;
/*!40000 ALTER TABLE `hlr_equipments` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hlr_hospitals`
--

LOCK TABLES `hlr_hospitals` WRITE;
/*!40000 ALTER TABLE `hlr_hospitals` DISABLE KEYS */;
INSERT INTO `hlr_hospitals` VALUES (1,'DH-001','Chumbuni',1,0,'2023-03-23 13:08:12',0,'2023-03-23 13:08:12'),(2,'DH-002','Kinyasini',1,0,'2023-03-23 13:08:24',0,'2023-03-23 13:08:24');
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `hlr_report_status`
--

LOCK TABLES `hlr_report_status` WRITE;
/*!40000 ALTER TABLE `hlr_report_status` DISABLE KEYS */;
INSERT INTO `hlr_report_status` VALUES (1,'Pending',1,0,'2023-03-23 13:28:07',0,'2023-03-23 13:28:07');
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
INSERT INTO `hlr_users` VALUES (1,'Moza','mozasaid511@gmail.com','admin','19e8e9ed53ab349cf6207f0d42fe1f8a79012342f338942ec',1,NULL,'2023-03-23 12:32:33',NULL,'2023-03-23 12:32:33');
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

-- Dump completed on 2023-03-23 16:46:07
