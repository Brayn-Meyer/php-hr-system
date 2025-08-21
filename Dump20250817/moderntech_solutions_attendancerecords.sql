-- MySQL dump 10.13  Distrib 8.0.43, for Win64 (x86_64)
--
-- Host: localhost    Database: moderntech_solutions
-- ------------------------------------------------------
-- Server version	8.0.43

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
-- Table structure for table `attendancerecords`
--

DROP TABLE IF EXISTS `attendancerecords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `attendancerecords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employeeId` int NOT NULL,
  `date` date NOT NULL,
  `status` enum('present','absent') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unique_attendance` (`employeeId`,`date`),
  CONSTRAINT `attendancerecords_ibfk_1` FOREIGN KEY (`employeeId`) REFERENCES `employeeinformation` (`employeeId`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `attendancerecords`
--

LOCK TABLES `attendancerecords` WRITE;
/*!40000 ALTER TABLE `attendancerecords` DISABLE KEYS */;
INSERT INTO `attendancerecords` VALUES (6,2,'2025-07-25','present'),(7,2,'2025-07-26','present'),(8,2,'2025-07-27','absent'),(9,2,'2025-07-28','present'),(10,2,'2025-07-29','present'),(16,4,'2025-07-25','absent'),(17,4,'2025-07-26','present'),(18,4,'2025-07-27','present'),(19,4,'2025-07-28','present'),(20,4,'2025-07-29','present'),(21,5,'2025-07-25','present'),(22,5,'2025-07-26','present'),(23,5,'2025-07-27','absent'),(24,5,'2025-07-28','present'),(25,5,'2025-07-29','present'),(26,6,'2025-07-25','present'),(27,6,'2025-07-26','present'),(28,6,'2025-07-27','absent'),(29,6,'2025-07-28','present'),(30,6,'2025-07-29','present'),(31,7,'2025-07-25','present'),(32,7,'2025-07-26','present'),(33,7,'2025-07-27','present'),(34,7,'2025-07-28','absent'),(35,7,'2025-07-29','present'),(36,8,'2025-07-25','present'),(37,8,'2025-07-26','absent'),(38,8,'2025-07-27','present'),(39,8,'2025-07-28','present'),(40,8,'2025-07-29','present'),(41,9,'2025-07-25','present'),(42,9,'2025-07-26','present'),(43,9,'2025-07-27','present'),(44,9,'2025-07-28','absent'),(45,9,'2025-07-29','present'),(46,10,'2025-07-25','present'),(47,10,'2025-07-26','present'),(48,10,'2025-07-27','absent'),(49,10,'2025-07-28','present'),(50,10,'2025-07-29','present');
/*!40000 ALTER TABLE `attendancerecords` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-08-17 20:03:20
