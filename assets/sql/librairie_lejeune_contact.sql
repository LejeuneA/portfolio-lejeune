-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: librairie_lejeune
-- ------------------------------------------------------
-- Server version	8.0.36

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
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `contact` (
  `idContact` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(150) DEFAULT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `message` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (4,'John','Doe','john.doe@example.com','123-456-7890','Interested in buying some books.'),(5,'Jane','Smith','jane.smith@example.com','234-567-8901','Looking for stationery supplies.'),(6,'Michael','Johnson','michael.johnson@example.com','345-678-9012','Can you recommend some gifts?'),(7,'Emily','Davis','emily.davis@example.com','456-789-0123','Do you have any book discounts?'),(8,'David','Brown','david.brown@example.com','567-890-1234','Need bulk order of pens.'),(9,'Sarah','Wilson','sarah.wilson@example.com','678-901-2345','Gift wrapping services available?'),(10,'Robert','Taylor','robert.taylor@example.com','789-012-3456','Inquiry about delivery times.'),(11,'Laura','Anderson','laura.anderson@example.com','890-123-4567','Suggestions for bestsellers?'),(12,'James','Thomas','james.thomas@example.com','901-234-5678','Do you sell bookmarks?'),(13,'Jessica','Moore','jessica.moore@example.com','012-345-6789','Looking for unique gift items.'),(14,'William','Jackson','william.jackson@example.com','123-456-7891','Interested in your stationery range.'),(15,'Sophia','Martin','sophia.martin@example.com','234-567-8902','Any offers on notebooks?'),(16,'Alexander','Lee','alexander.lee@example.com','345-678-9013','Can you personalize gifts?'),(17,'Olivia','Perez','olivia.perez@example.com','456-789-0124','Do you have gift cards?'),(18,'Daniel','Harris','daniel.harris@example.com','567-890-1235','Looking for art supplies.'),(19,'Mia','Clark','mia.clark@example.com','678-901-2346','Can I return a book?'),(20,'Henry','Lewis','henry.lewis@example.com','789-012-3457','What are your store hours?'),(21,'Isabella','Robinson','isabella.robinson@example.com','890-123-4568','Need help with an order.'),(22,'Noah','Walker','noah.walker@example.com','901-234-5679','Do you ship internationally?'),(23,'Mason','Young','mason.young@example.com','012-345-6780','Can you gift-wrap my order?');
/*!40000 ALTER TABLE `contact` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-12  8:58:52
