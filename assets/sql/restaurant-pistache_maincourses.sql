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
-- Table structure for table `maincourses`
--

DROP TABLE IF EXISTS `maincourses`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `maincourses` (
  `idMainCourse` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(250) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `content` longtext,
  `active` tinyint(1) DEFAULT '1',
  `idCategory` int DEFAULT '2',
  PRIMARY KEY (`idMainCourse`)
) ENGINE=InnoDB AUTO_INCREMENT=8003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maincourses`
--

LOCK TABLES `maincourses` WRITE;
/*!40000 ALTER TABLE `maincourses` DISABLE KEYS */;
INSERT INTO `maincourses` VALUES (2001,'uploads/main-1.jpg','Chicken confit with sauce vierge',24.00,'Chicken marylandst, Pommes puree, Garlic cloves, Sauce','&lt;p&gt;Chicken confit with sauce vierge is a delightful dish that combines the succulence of tender, slow-cooked chicken with the vibrant flavors of a classic French sauce. To prepare the chicken confit, chicken pieces are seasoned with salt, pepper, and herbs, then slowly cooked in rendered chicken fat until they are meltingly tender and infused with rich flavor. Meanwhile, the sauce vierge, which translates to &quot;green sauce,&quot; is made by combining diced tomatoes, fresh herbs such as basil and parsley, minced shallots, garlic, lemon juice, and olive oil. This bright and zesty sauce provides a refreshing contrast to the rich, savory chicken confit, adding a burst of freshness and acidity to each bite. The combination of tender chicken and vibrant sauce vierge creates a harmonious balance of flavors and textures, making this dish a true delight for the senses.&lt;/p&gt;',1,2),(2002,'uploads/main-2.jpg','Salmon steamed in paper parcels',24.00,'Ravolli, Tomato sauce, Dill, Olive oil','&lt;p&gt;Salmon steamed in paper parcels, also known as salmon en papillote, is a delicate and flavorful dish that highlights the natural taste of the fish while infusing it with aromatic herbs and spices. To prepare this dish, fresh salmon fillets are seasoned with salt, pepper, and a squeeze of lemon juice, then placed on a bed of thinly sliced vegetables such as onions, carrots, and zucchini. The fillets are sealed in parchment paper or aluminum foil parcels along with herbs like dill, parsley, or thyme, and a splash of white wine or broth to keep the fish moist during cooking. As the parcels are steamed in the oven, the salmon gently cooks to perfection, locking in its moisture and absorbing the fragrant flavors of the herbs and vegetables. The result is tender, flaky salmon with a subtle hint of citrus and herbs, making it a light and elegant meal that is as impressive as it is delicious.&lt;/p&gt;',1,2),(2003,'uploads/main-3.jpg','Slow-cooked boeuf bourguignon',25.00,'Chuck steak, Carrot, Garlic cloves, Potato','&lt;p&gt;Slow-cooked boeuf bourguignon is a quintessential French dish renowned for its rich, hearty flavors and tender, melt-in-your-mouth beef. This traditional recipe begins with succulent chunks of beef, typically from the shoulder or chuck, which are seared until golden brown to enhance their flavor. The beef is then slowly braised in a robust red wine sauce infused with aromatic vegetables such as onions, carrots, and garlic, along with fragrant herbs like thyme and bay leaves. The long, slow cooking process allows the flavors to meld together, resulting in a luscious, velvety sauce and meat that is incredibly tender. Boeuf bourguignon is a labor of love, requiring patience and attention to detail, but the end result is a sumptuous and satisfying dish that is perfect for a cozy evening meal or special occasion.&lt;/p&gt;',1,2),(2004,'uploads/main-4.jpg','Marseille-style shrimp stew',21.00,'Jumbo shrimp, Garlic cloves, Cayenne pepper, Basilic leaves','&lt;p&gt;Marseille-style shrimp stew is a tantalizing seafood dish inspired by the flavors of the Mediterranean coast. This hearty stew begins with a base of aromatic vegetables such as onions, garlic, and tomatoes, saut&amp;eacute;ed until tender and fragrant. To this, a medley of fresh seafood is added, including succulent shrimp, mussels, and sometimes fish fillets, simmered gently until cooked through and infused with the essence of the broth. The stew is elevated with a splash of white wine, a bouquet garni of herbs such as thyme and bay leaves, and a touch of saffron, which imparts a golden hue and subtle depth of flavor. Marseille-style shrimp stew is a celebration of the bountiful treasures of the sea, showcasing the vibrant colors and rich tastes of the Mediterranean culinary tradition. It&#039;s perfect for cozy gatherings or special occasions, served with crusty bread to soak up every last bit of the flavorful broth.&lt;/p&gt;',1,2),(2005,'uploads/main-5.jpg','Duck à l\'orange',32.00,'Pekin ducks, Oranges, Potatoes, White wine','&lt;p&gt;Duck &amp;agrave; l&#039;orange is a classic French dish renowned for its elegant blend of sweet and savory flavors. This dish features tender duck breast cooked to perfection and served with a luxurious orange sauce. The duck breast is typically seared until golden and crispy on the outside while remaining succulent and juicy on the inside. The orange sauce is made from a reduction of fresh orange juice, zest, sugar, vinegar, and often fortified with cognac or Grand Marnier for depth of flavor. The sauce is then poured over the sliced duck breast, imparting a delightful citrusy tang that perfectly complements the richness of the meat. Duck &amp;agrave; l&#039;orange is a timeless culinary masterpiece, sure to impress even the most discerning palates with its harmonious balance of flavors and exquisite presentation.&lt;/p&gt;',1,2),(2006,'uploads/main-6.jpg','Stuffed pork tenderloins with bacon',25.00,'Pork tenderloins, Breakfast sausage, Garlic cloves, Chopped thyme','&lt;p&gt;Stuffed pork tenderloins wrapped in bacon are a delectable combination of savory flavors and tender textures. This dish begins with succulent pork tenderloins, carefully sliced and filled with a flavorful stuffing mixture. Common fillings include a blend of herbs, breadcrumbs, garlic, and cheese, creating a burst of taste with every bite. To add an extra layer of richness and smokiness, the tenderloins are then wrapped in strips of bacon before being roasted to perfection. As the bacon cooks, it imparts its smoky essence into the pork, resulting in juicy, tender meat enveloped in a crispy, golden exterior. This dish is a true crowd-pleaser, perfect for special occasions or a comforting family meal.&lt;/p&gt;',1,2),(2007,'uploads/main-7.jpg','Strip steak frites with béarnaise butter',24.00,'Steaks, Potatoes, Béarnaise butter, White vinegar','&lt;p&gt;Strip steak frites with b&amp;eacute;arnaise butter is a luxurious and indulgent dish that combines the succulent flavor of strip steak with the crispiness of golden fries, topped with a decadent b&amp;eacute;arnaise butter sauce. The strip steak, known for its tender texture and robust beefy flavor, is typically seasoned with salt and pepper, then grilled or pan-seared to your desired level of doneness. The fries, often cut into thin strips and double-fried for extra crunchiness, provide the perfect accompaniment to the steak, adding a satisfying contrast in texture.&lt;/p&gt;',1,2),(2008,'uploads/main-8.jpg','Ratatouille',21.00,'Eggplants, Zucchini, Yellow onions, Red bell peppers','&lt;p&gt;Ratatouille is a classic French dish originating from the Provence region, renowned for its vibrant colors and rich flavors. Traditionally, it is a stewed vegetable medley consisting of eggplant, zucchini, bell peppers, tomatoes, onions, and garlic, all simmered together in olive oil until tender. The vegetables are often seasoned with a blend of aromatic herbs like thyme, basil, and oregano, adding depth and fragrance to the dish. Ratatouille can be served hot or cold and is versatile enough to be enjoyed as a main course, a side dish, or even as a topping for pasta or crusty bread. Its rustic charm and hearty taste make it a beloved dish both in France and around the world, perfect for showcasing the bounty of summer produce.&lt;/p&gt;',1,2);
/*!40000 ALTER TABLE `maincourses` ENABLE KEYS */;
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
