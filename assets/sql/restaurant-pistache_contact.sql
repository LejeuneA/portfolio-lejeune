-- MySQL dump 10.13  Distrib 8.0.36, for Win64 (x86_64)
--
-- Host: localhost    Database: restaurant-pistache
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
  `firstname` varchar(45) NOT NULL,
  `lastname` varchar(45) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(150) DEFAULT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`idContact`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contact`
--

LOCK TABLES `contact` WRITE;
/*!40000 ALTER TABLE `contact` DISABLE KEYS */;
INSERT INTO `contact` VALUES (3,'Jane','Smith','jane.smith@example.com','555-5678','I would like to book a table for four on Saturday.'),(4,'Emily','Jones','emily.jones@example.com','555-8765','What are your opening hours on weekends?'),(5,'Michael','Brown','michael.brown@example.com','555-4321','Do you offer vegetarian options on your menu?'),(6,'Jessica','Williams','jessica.williams@example.com','555-3456','Can I host a private event at your restaurant?'),(7,'David','Taylor','david.taylor@example.com','555-6543','Is there a dress code for dining at your place?'),(8,'Sarah','Johnson','sarah.johnson@example.com','555-7890','Can I see the menu before making a reservation?'),(9,'Chris','Lee','chris.lee@example.com','555-0987','What safety measures are in place due to COVID-19?'),(10,'Amanda','Miller','amanda.miller@example.com','555-2345','Do you have any special offers for new customers?'),(11,'James','Davis','james.davis@example.com','555-6789','Are you hiring any staff at the moment?'),(12,'Olivia','Martinez','olivia.martinez@example.com','555-1239','Can you accommodate gluten-free diets?'),(13,'Daniel','Garcia','daniel.garcia@example.com','555-9876','What is your policy on bringing pets to the restaurant?'),(14,'Sophia','Anderson','sophia.anderson@example.com','555-5432','Is there a parking facility available nearby?'),(15,'Matthew','Hernandez','matthew.hernandez@example.com','555-6547','Do you provide any loyalty programs for frequent diners?'),(16,'Emma','Rodriguez','emma.rodriguez@example.com','555-7654','Can I pre-order food before arriving at the restaurant?'),(17,'Joshua','Martinez','joshua.martinez@example.com','555-0981','Is there an outdoor seating area available?'),(18,'Ava','Lopez','ava.lopez@example.com','555-1324','What are your most popular dishes?'),(19,'Benjamin','Gonzalez','benjamin.gonzalez@example.com','555-5643','Do you offer any discounts for large groups?'),(20,'Isabella','Wilson','isabella.wilson@example.com','555-8760','Can I get a gift card for your restaurant?'),(21,'Mason','Martinez','mason.martinez@example.com','555-3412','Do you have live music on weekends?'),(32,'Açelya','LEJEUNE','acelyalejeune@gmail.com','0493387729','hi hi hi ');
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

-- Dump completed on 2026-06-12  8:58:53
