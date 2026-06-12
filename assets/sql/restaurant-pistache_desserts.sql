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
-- Table structure for table `desserts`
--

DROP TABLE IF EXISTS `desserts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `desserts` (
  `idDessert` int NOT NULL AUTO_INCREMENT,
  `image_url` varchar(250) DEFAULT NULL,
  `title` varchar(150) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `content` longtext,
  `active` tinyint(1) DEFAULT '1',
  `idCategory` int DEFAULT '3',
  PRIMARY KEY (`idDessert`)
) ENGINE=InnoDB AUTO_INCREMENT=8011 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `desserts`
--

LOCK TABLES `desserts` WRITE;
/*!40000 ALTER TABLE `desserts` DISABLE KEYS */;
INSERT INTO `desserts` VALUES (3001,'uploads/dessert-1.jpg','Crêpes suzette',12.00,'Flour, Milk, Granulated sugar, Orange Butter Sauce','&lt;div class=&quot;flex flex-grow flex-col max-w-full&quot;&gt;&lt;br /&gt;\r\n&lt;div class=&quot;min-h-[20px] text-message flex flex-col items-start whitespace-pre-wrap break-words [.text-message+&amp;amp;]:mt-5 juice:w-full juice:items-end overflow-x-auto gap-2&quot; dir=&quot;auto&quot; data-message-author-role=&quot;assistant&quot; data-message-id=&quot;d3a88159-245f-43d3-bc56-90a4b5a50cb3&quot;&gt;&lt;br /&gt;\r\n&lt;div class=&quot;flex w-full flex-col gap-1 juice:empty:hidden juice:first:pt-[3px]&quot;&gt;&lt;br /&gt;\r\n&lt;div class=&quot;markdown prose w-full break-words dark:prose-invert dark&quot;&gt;&lt;br /&gt;\r\n&lt;p&gt;Cr&amp;ecirc;pes Suzette is a decadent and flamboyant French dessert that combines thin pancakes with a luxurious orange-infused sauce. The cr&amp;ecirc;pes are made from a simple batter of flour, eggs, milk, and butter, cooked until golden and delicate. The sauce, known as the Suzette sauce, is made by caramelizing sugar with butter, then adding freshly squeezed orange juice, zest, and a splash of Grand Marnier or Cognac for a burst of flavor. Once the sauce is thickened and fragrant, the cr&amp;ecirc;pes are folded into quarters and briefly simmered in the sauce to soak up the orange-infused goodness. The dish is often flambeed tableside for added drama, with the flames caramelizing the sauce further and adding a touch of excitement to the presentation. Cr&amp;ecirc;pes Suzette are a timeless indulgence, perfect for impressing guests or treating yourself to a taste of French elegance.&lt;/p&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;\r\n&lt;/div&gt;',1,3),(3002,'uploads/dessert-2.jpg','Tarte tatin',13.00,'Flour, Apples, Sugar, Whipped cream','&lt;p&gt;Tarte Tatin is a classic French dessert celebrated for its simplicity and indulgent flavors. This upside-down caramelized apple tart features tender, caramel-coated apples nestled atop a buttery pastry crust. To make Tarte Tatin, apples are caramelized in butter and sugar until they turn golden and luscious, then arranged in a single layer in a skillet or baking dish. A layer of pastry dough is placed on top of the caramelized apples, and the tart is baked until the pastry is golden and crisp. Once baked, the tart is inverted onto a serving platter, revealing the beautiful caramelized apples glistening atop the flaky pastry. Tarte Tatin is best served warm with a dollop of whipped cream or a scoop of vanilla ice cream, making it a comforting and irresistible dessert that is perfect for any occasion.&lt;/p&gt;',1,3),(3003,'uploads/dessert-3.jpg','Floating islands',12.00,'Egg whites, Granulated sugar, Heavy cream, Dark chocolate','&lt;p&gt;Floating islands, or &amp;icirc;les flottantes in French, are a classic dessert known for their light and ethereal texture. This dessert consists of delicate clouds of meringue floating on a pool of creamy custard sauce. The meringues are made by whipping egg whites with sugar until stiff peaks form, then poaching them in simmering milk until they are light and fluffy. Once cooked, the meringues are gently lifted from the milk and placed atop a pool of chilled vanilla custard sauce. The contrast between the airy meringue and the creamy custard creates a delightful combination of textures, while the subtle sweetness of the meringue balances the richness of the custard. Floating islands are a timeless treat that is both elegant and comforting, perfect for rounding off a special meal or indulging in as a light and satisfying dessert.&lt;/p&gt;',1,3),(3004,'uploads/dessert-4.jpg','Hazelnut and crème fraîche meringues',15.00,'Raw hazelnuts, Egg whites, Crème fraiche, Granulated sugar','&lt;p&gt;Hazelnut and cr&amp;egrave;me fra&amp;icirc;che meringues are a delightful confection that combines the lightness of meringue with the rich flavors of hazelnuts and creamy cr&amp;egrave;me fra&amp;icirc;che. These delicate meringues are made by whipping egg whites with sugar until stiff peaks form, then folding in finely ground hazelnuts to add a nutty flavor and texture. The addition of cr&amp;egrave;me fra&amp;icirc;che to the meringue mixture adds a subtle tanginess and richness, balancing out the sweetness of the meringue. Once piped onto baking sheets and baked until crisp and golden, these hazelnut and cr&amp;egrave;me fra&amp;icirc;che meringues are a delightful treat that melts in the mouth, offering a harmonious blend of flavors and textures. They are perfect for serving as a light and elegant dessert or for indulging in with a cup of tea or coffee.&lt;/p&gt;',1,3),(3005,'uploads/dessert-5.jpg','Fresh raspberry tart',13.00,'Fresh raspberries, Raspberry jam, Fresh lemon juice, Vanilla ice cream','&lt;p&gt;A fresh raspberry tart is a delightful dessert that showcases the natural sweetness and vibrant color of ripe raspberries. This tart typically features a buttery and flaky pastry crust, baked until golden brown and crisp. The crust is then filled with a luscious pastry cream or almond frangipane filling, which provides a rich and creamy base for the raspberries. The fresh raspberries are arranged on top of the filling in a visually appealing pattern, creating a beautiful contrast against the creamy backdrop. Finally, the tart is often brushed with a glaze made from melted apricot jam or jelly to add shine and preserve the freshness of the raspberries. With its combination of buttery crust, creamy filling, and juicy raspberries, a fresh raspberry tart is a delightful dessert that is perfect for showcasing the bright flavors of summer.&lt;/p&gt;',1,3),(3006,'uploads/dessert-6.jpg','Raspberry macarons',12.00,'Raspberry jam, Almond flour, Confectioners\' sugar, Egg whites','&lt;p&gt;Raspberry macarons are a delightful French pastry known for their delicate almond meringue shells and flavorful raspberry filling. These bite-sized treats consist of two almond-based meringue cookies sandwiched together with a luscious raspberry filling. The meringue shells are crisp on the outside and chewy on the inside, with a subtle almond flavor that pairs perfectly with the tartness of the raspberry filling. The filling is typically made from fresh raspberries, sugar, and sometimes a splash of lemon juice, cooked down into a thick and flavorful jam-like consistency. The vibrant pink color of the raspberry filling adds a beautiful contrast to the pale meringue shells, making raspberry macarons not only delicious but also visually stunning. These elegant pastries are perfect for special occasions or as a sweet treat to enjoy with a cup of tea or coffee.&lt;/p&gt;',1,3),(3007,'uploads/dessert-7.jpg','Cream puffs with chocolate sauce',15.00,'Bittersweet chocolate, Flour, Heavy cream, Vanilla extract','&lt;p&gt;Cream puffs with chocolate sauce are a delightful dessert that combines light and airy pastry with decadent chocolate. The cream puffs, made from choux pastry, are baked until golden and crispy on the outside while remaining soft and hollow on the inside. They are then filled with a luscious vanilla pastry cream or whipped cream, adding a creamy and luxurious texture to each bite. To elevate the flavor even further, they are drizzled with a rich and velvety chocolate sauce made from melted chocolate, cream, and sometimes a splash of butter or liqueur for added richness. The combination of crisp pastry, creamy filling, and indulgent chocolate sauce creates a dessert that is both elegant and irresistible, perfect for satisfying any sweet craving.&lt;/p&gt;',1,3),(3008,'uploads/dessert-8.jpg','Crème caramel',12.00,'Heavy cream, Yolks, Milk, Vanilla bean','&lt;p&gt;Cr&amp;egrave;me caramel, also known as flan or caramel custard, is a classic French dessert loved for its silky-smooth texture and rich caramel flavor. To make cr&amp;egrave;me caramel, a creamy custard base is prepared with eggs, sugar, vanilla, and milk or cream, then poured into molds lined with caramelized sugar. The molds are then baked in a water bath until the custard sets and becomes firm. After chilling and firming in the refrigerator, the cr&amp;egrave;me caramels are inverted onto serving plates, revealing a beautiful layer of golden caramel sauce that coats the luscious custard. This elegant dessert is both luxurious and comforting, perfect for indulging in after a meal or for celebrating special occasions. Its delicate balance of sweetness and creaminess makes it a timeless favorite among dessert lovers worldwide.&lt;/p&gt;',1,3);
/*!40000 ALTER TABLE `desserts` ENABLE KEYS */;
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
