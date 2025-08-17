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
-- Table structure for table `performancereviews`
--

DROP TABLE IF EXISTS `performancereviews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `performancereviews` (
  `id` int NOT NULL AUTO_INCREMENT,
  `employeeId` int DEFAULT NULL,
  `reviewDate` date DEFAULT NULL,
  `rating` int DEFAULT NULL,
  `strengths` text,
  `areasForImprovement` text,
  `goals` text,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `performancereviews`
--

LOCK TABLES `performancereviews` WRITE;
/*!40000 ALTER TABLE `performancereviews` DISABLE KEYS */;
INSERT INTO `performancereviews` VALUES (4,2,'2025-07-27',3,'Strong communication skills','Time management under pressure','Improve leadership skills through training','Completed'),(5,4,'2025-07-27',2,'Reliable and punctual','Delegating tasks effectively','Earn an industry-recognized certification','Completed'),(6,5,'2025-07-27',3,'High attention to detail','Technical proficiency in key tools','Lead a team project from start to finish','Completed'),(7,6,'2025-07-27',3,'Takes initiative','Confidence during presentations','Strengthen data analysis abilities','Completed'),(8,7,'2025-07-27',4,'Team-oriented mindset','Handling constructive feedback','Enhance public speaking and presentation skills','Completed'),(9,8,'2025-07-27',5,'Adaptability in dynamic environments','Prioritizing workload','Increase involvement in company initiatives','Draft'),(10,9,'2025-07-27',5,'Problem-solving ability','Cross-department collaboration','Learn a new programming language or platform','Completed'),(11,10,'2025-07-27',3,'Strong work ethic','Written communication clarity','Build mentoring relationships with new hires','Completed'),(12,49,'2025-08-17',1,NULL,NULL,NULL,'Draft');
/*!40000 ALTER TABLE `performancereviews` ENABLE KEYS */;
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
