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
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `reservations` (
  `idReservation` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `book_date` date NOT NULL,
  `book_time` time NOT NULL,
  `person` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`idReservation`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservations`
--

LOCK TABLES `reservations` WRITE;
/*!40000 ALTER TABLE `reservations` DISABLE KEYS */;
INSERT INTO `reservations` VALUES (13,'John Doe','john@example.com','1234567890','2024-06-12','18:00:00',4,'2024-06-10 09:45:31',1),(14,'Jane Smith','jane@example.com','9876543210','2024-06-13','19:00:00',2,'2024-06-09 11:37:25',1),(15,'Michael Brown','michael@example.com','5556667777','2024-06-14','20:00:00',3,'2024-06-13 10:57:31',0),(16,'Emily Johnson','emily@example.com','4443332222','2024-06-15','21:00:00',5,'2024-06-11 13:36:12',1),(17,'Alex Turner','alex@example.com','9998887777','2024-06-16','22:00:00',2,'2024-06-15 14:55:11',1),(18,'Sophia Garcia','sophia@example.com','1112223333','2024-06-17','18:30:00',3,'2024-06-15 16:45:21',0),(19,'William Wilson','william@example.com','4445556666','2024-06-18','19:30:00',4,'2024-06-17 18:03:33',1),(20,'Olivia Brown','olivia@example.com','7778889999','2024-06-19','20:30:00',2,'2024-06-16 05:36:23',1),(21,'James Martinez','james@example.com','2223334444','2024-06-20','21:30:00',3,'2024-06-19 20:50:25',0),(22,'Amelia Johnson','amelia@example.com','5554443333','2024-06-21','22:30:00',5,'2024-06-20 08:47:31',1),(23,'Michael Harris','michael@example.com','9991112222','2024-06-22','18:45:00',2,'2024-06-21 13:12:08',1),(24,'Emma Wilson','emma@example.com','6665554444','2024-06-23','19:45:00',3,'2023-06-21 07:37:45',0),(25,'Ethan Thomas','ethan@example.com','1112223333','2024-06-24','20:45:00',4,'2025-06-19 21:21:56',1),(26,'Isabella Anderson','isabella@example.com','3334445555','2024-06-25','21:45:00',2,'2024-06-24 04:45:22',1),(27,'Ava Jackson','ava@example.com','8889990000','2024-06-26','22:45:00',3,'2023-06-25 12:30:11',0),(28,'Noah White','noah@example.com','4445556666','2024-06-27','18:15:00',5,'2025-06-11 15:53:48',1),(29,'Sophia Brown','sophia@example.com','5556667777','2024-06-28','19:15:00',2,'2024-06-27 08:06:34',1),(30,'Benjamin Lee','benjamin@example.com','1112223333','2024-06-29','20:15:00',3,'2023-06-18 20:19:07',0),(31,'Mia Taylor','mia@example.com','4445556666','2024-06-30','21:15:00',4,'2025-06-27 05:41:59',1),(32,'Alexander Johnson','alexander@example.com','1112223333','2024-07-01','22:15:00',2,'2024-06-22 16:54:16',1),(76,'ACELYA PIERRE LEJEUNE','acelyalejeune@gmail.com','0493387729','2024-06-20','13:34:00',2,'2024-06-19 08:31:11',1),(77,'ACELYA LEJEUNE','acelyalejeune@gmail.com','0493387729','2024-06-20','12:00:00',1,'2024-06-19 08:32:01',1),(78,'ACELYA','acelyalejeune@gmail.com','0493387729','2024-06-26','14:00:00',3,'2024-06-25 16:07:19',1),(79,'AÇELYA LEJEUNE','sengulacelya@hotmail.com','05412200933','2024-06-20','20:09:00',4,'2024-06-25 16:07:42',1);
/*!40000 ALTER TABLE `reservations` ENABLE KEYS */;
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
