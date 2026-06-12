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
-- Table structure for table `starters`
--

DROP TABLE IF EXISTS `starters`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `starters` (
  `idStarter` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(250) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `content` longtext,
  `active` tinyint(1) DEFAULT '1',
  `idCategory` int DEFAULT '1',
  PRIMARY KEY (`idStarter`)
) ENGINE=InnoDB AUTO_INCREMENT=8004 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `starters`
--

LOCK TABLES `starters` WRITE;
/*!40000 ALTER TABLE `starters` DISABLE KEYS */;
INSERT INTO `starters` VALUES (1001,'uploads/starter-1.jpg','Scottish smoked label salmon',15.00,'Salmon filet, Kosher salt, Brown sugar, Olive oil','&lt;p&gt;Scottish smoked salmon is a premium delicacy known for its rich, smooth texture and distinctive, smoky flavor. Produced using traditional methods, the salmon is typically sourced from the cold, clean waters of Scotland, ensuring high quality and freshness. The fish is cured with a mixture of salt and sometimes sugar, then cold-smoked over oak wood, which imparts a delicate, smoky aroma without cooking the fish, preserving its tender texture. Scottish smoked salmon is often enjoyed thinly sliced on its own, or as part of dishes such as bagels with cream cheese, salads, or canap&amp;eacute;s. Its refined taste and luxurious texture make it a favorite choice for special occasions and gourmet dining.&lt;/p&gt;',1,1),(1002,'uploads/starter-2.jpg','Ravioli with tomato sauce and dill',13.00,'Ravolli, Tomato sauce, Dill, Olive oil','&lt;p&gt;Ravioli with tomato sauce and dill is a delightful dish that marries the comforting flavors of Italian cuisine with a fresh herbal twist. The ravioli, typically filled with ingredients like ricotta cheese, spinach, or meat, are cooked until tender and then smothered in a rich, savory tomato sauce. The tomato sauce is usually made from ripe tomatoes, garlic, onions, olive oil, and a blend of herbs and spices, simmered to perfection. Adding a sprinkle of fresh dill to the dish introduces a unique, aromatic flavor that complements the acidity of the tomatoes and the creamy filling of the ravioli. This dish can be garnished with grated Parmesan cheese and a drizzle of olive oil, making it a delicious and sophisticated meal for any occasion.&lt;/p&gt;',1,1),(1003,'uploads/starter-3.jpg','Tuna salad with tomatoes',15.00,'Tuna fish, Boiled egg, Tomatoes, Lemon','&lt;p&gt;Tuna salad with tomatoes is a refreshing and nutritious dish that combines the savory flavors of tuna with the bright, juicy taste of fresh tomatoes. Typically made with flaked canned or seared tuna, the salad often includes chopped tomatoes, crisp lettuce or mixed greens, and other vegetables like cucumbers, red onions, and bell peppers. It is usually dressed with a light vinaigrette made from olive oil, lemon juice, salt, and pepper, although variations can include herbs, capers, or a touch of mustard for added flavor. This versatile salad can be enjoyed on its own, as a filling for sandwiches, or as a topping for toasted bread, making it a perfect option for a healthy, satisfying meal any time of the day.&lt;/p&gt;',1,1),(1004,'uploads/starter-4.jpg','Shrimps in batter with sauce',17.00,'Shrimps, Fresh vegetable salad, Lemon, Sauce','&lt;p&gt;Shrimps in batter with sauce, often known as shrimp tempura or battered shrimp, is a delectable seafood dish that combines the delicate flavor of shrimp with a crispy, golden exterior. The shrimp are typically peeled and deveined before being dipped in a light, airy batter made from flour, eggs, and cold water or soda water. They are then deep-fried to perfection, resulting in a crunchy coating that encases the tender, juicy shrimp inside. This dish is often accompanied by a dipping sauce, such as a tangy cocktail sauce, sweet chili sauce, or a savory soy-based tempura sauce, which complements the rich flavor of the shrimp. Popular as an appetizer or main course, shrimps in batter are a crowd-pleaser and a staple in various cuisines around the world.&lt;/p&gt;',1,1),(1005,'uploads/starter-5.jpg','Fried squid',17.00,'Calamari, Fresh vegetable salad, Lemon, Sauce','&lt;p&gt;Fried squid, often referred to as calamari, is a popular dish enjoyed in many culinary traditions around the world. The squid is typically cleaned and cut into rings or strips, then lightly coated in a seasoned batter or flour mixture. It is quickly fried until golden and crispy, resulting in a tender and flavorful seafood delicacy. Frequently served with a variety of dipping sauces such as marinara, aioli, or tartar sauce, fried squid is a favorite appetizer or snack. Its crunchy texture and savory taste make it a delightful dish, perfect for sharing at gatherings or enjoying as a light meal.&lt;/p&gt;',1,1),(1006,'uploads/starter-6.jpg','Steak tartare',18.00,'Beef fillet, Shallots, Cornichons, Yolk egg','&lt;p&gt;Steak tartare is a dish of raw ground beef or finely chopped high-quality steak, traditionally seasoned with various ingredients to enhance its flavor. The dish often includes finely chopped onions, capers, pickles, and fresh herbs, mixed with seasonings such as Worcestershire sauce, mustard, and hot sauce. It is typically served with a raw egg yolk on top, adding richness and depth to the dish. Steak tartare is usually accompanied by toasted bread or fries and is prized for its fresh, bold taste and delicate texture. This classic dish, often found in French cuisine, highlights the quality and flavor of the beef, making it a favorite among meat enthusiasts.&lt;/p&gt;',1,1),(1007,'uploads/starter-7.jpg','Chicken liver pâté',13.00,'Chicken livers, Onion, Double cream, Toast','&lt;p&gt;Chicken liver p&amp;acirc;t&amp;eacute; is a luxurious and flavorful spread that is a staple in many culinary traditions, particularly French cuisine. Made from finely chopped or pureed chicken livers, this p&amp;acirc;t&amp;eacute; is typically combined with ingredients such as butter, cream, onions, garlic, and a splash of brandy or cognac for added richness. The mixture is then seasoned with herbs and spices, creating a smooth, creamy texture and a savory taste. Often served chilled, chicken liver p&amp;acirc;t&amp;eacute; is commonly enjoyed as an appetizer or hors d&#039;oeuvre, spread on toasted bread or crackers. Its delicate yet robust flavor makes it a sophisticated addition to any gourmet spread.&lt;/p&gt;',1,1),(1008,'uploads/starter-8.jpg','French onion',14.00,'Beef stock, Butter, Parsley','&lt;p&gt;French onion soup is a classic dish originating from France, celebrated for its rich and savory flavor. Traditionally, it is made with caramelized onions simmered in a beef or chicken broth, often infused with wine or brandy, which adds depth to its taste. The soup is typically topped with a slice of toasted baguette and a generous layer of melted Gruy&amp;egrave;re cheese, then broiled until bubbly and golden. This comforting, aromatic soup is a favorite in French cuisine and is enjoyed worldwide, especially as a warm and hearty meal during the colder months.&lt;/p&gt;',1,1);
/*!40000 ALTER TABLE `starters` ENABLE KEYS */;
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
