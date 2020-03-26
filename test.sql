-- MySQL dump 10.13  Distrib 5.7.29, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: test
-- ------------------------------------------------------
-- Server version	5.7.29-0ubuntu0.18.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `email` varchar(320) DEFAULT NULL,
  `comment` varchar(500) DEFAULT NULL,
  `is_allow` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comments`
--

LOCK TABLES `comments` WRITE;
/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
INSERT INTO `comments` VALUES (1,'Nikola Tesla','nikolatesla@gmail.com','Ovi proizvodi su veoma zdravi. ','1'),(2,'Novak Djokovic','novakdjokovic@gmail.com','Koristim ove proizvode svakodnevno. ','1'),(9,'Igor','maksoldinjo8@gmail.com','Igor ostavio komentar.','1'),(10,'Test','test@gmail.com','Test comment for practice. ','1');
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(500) DEFAULT NULL,
  `image` varchar(125) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Lemon','The lemon, Citrus limon Osbeck, is a species of small evergreen tree in the flowering plant family Rutaceae, native to South Asia, primarily North eastern India.','limun.jpg'),(4,'Mandarin orange ','The mandarin orange, also known as the mandarin or mandarine, is a small citrus tree with fruit resembling other oranges, usually eaten plain or in fruit salads. ','mandarina.jpg'),(6,'Kaffir','Citrus hystrix, called the kaffir lime, makrut lime, Thai lime or Mauritius papeda, is a citrus fruit native to tropical Southeast Asia and southern China.','kaffir.jpeg'),(7,'Tangelo','The tangelo, Citrus Ã— tangelo, is a citrus fruit hybrid of a Citrus reticulata variety such as mandarin orange or a tangerine, and Citrus maxima variety, such as a pomelo or grapefruit.','tangelo.jpg'),(8,'Pomelo ','The pomelo, pummelo, or in scientific terms Citrus maxima or Citrus grandis, is the largest citrus fruit from the family Rutaceae and the principal ancestor of the grapefruit. ','pomelo.jpg'),(10,'Grapefruit','The grapefruit is a subtropical citrus tree known for its relatively large sour to semi-sweet, somewhat bitter fruit. Grapefruit is a citrus hybrid originating in Barbados','grejpfrut.jpeg'),(11,'Clementine','A clementine or easy peeler is a tangor, a citrus fruit hybrid between a willowleaf mandarin orange and a sweet orange, named for its late 19th-century discoverer.','klementine.jpeg'),(12,'Citron','The citron is a large fragrant citrus fruit with a thick rind. It is one of the original citrus fruits from which all other citrus types developed through natural hybrid speciation or artificial hybridization.','citron.jpg'),(14,'Yuzu','Yuzu is a citrus fruit and plant in the family Rutaceae. It is believed to have originated in central China as a hybrid of mandarin orange and the ichang papeda.','yuzu.jpg'),(15,'Kabosu','Kabosu is a citrus fruit of an evergreen broad-leaf tree in the family Rutaceae.','kabosu.jpg'),(16,'Lumia','The most known origin for the Lumia is from the Mediterranean basin. The Lumia is also classified as Citrus limon var. lumia by Swingle which places it under the taxonomy of lemon, and Citrus medica L. var. lumia, that suggests it is similar to citron.','lumia.jpg');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `is_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Makso','testtest',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-26 18:49:46
