-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: project
-- ------------------------------------------------------
-- Server version	8.0.21-0ubuntu0.20.04.4

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tblCustomers`
--

DROP TABLE IF EXISTS `tblCustomers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblCustomers` (
  `customer_id` int NOT NULL AUTO_INCREMENT,
  `email` varchar(20) NOT NULL,
  `first_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) DEFAULT NULL,
  `contact_number` varchar(10) DEFAULT NULL,
  `address` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `postal_code` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`customer_id`),
  KEY `email_fk` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblCustomers`
--

LOCK TABLES `tblCustomers` WRITE;
/*!40000 ALTER TABLE `tblCustomers` DISABLE KEYS */;
INSERT INTO `tblCustomers` VALUES (1,'aaa@gmail.com','bbb','bbb','1111111111','bbb','bbb','ON','bbbbbb'),(2,'bbb@gmail.com','bbb','bbb','1231231234','bbb','bbb','ON','bbbbbb'),(3,'fff@gmail.com',NULL,NULL,'2222222222',NULL,NULL,NULL,NULL),(4,'ccc@gmail.com','ccc','ccc','3333213214','ccc','ccc','ON','cccccc'),(5,'ddd@gmail.com','ddd','ddd','4444444444','ddd street','ddd','ON','d3d3d3'),(6,'eee@gmail.com','eee','eee','5555555555','eee street ave','eeee','ON','e4e5e5'),(7,'ggg@gmail.com',NULL,NULL,'1231231234',NULL,NULL,NULL,NULL),(8,'hhh@gmail.com','John','Smith','5555555555','20 Street ave','London','ON','3e4w5r');
/*!40000 ALTER TABLE `tblCustomers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblOrders`
--

DROP TABLE IF EXISTS `tblOrders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblOrders` (
  `Orders_ID` int NOT NULL AUTO_INCREMENT,
  `email` varchar(20) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Orders_ID`),
  KEY `email` (`email`),
  CONSTRAINT `tblOrders_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tblCustomers` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblOrders`
--

LOCK TABLES `tblOrders` WRITE;
/*!40000 ALTER TABLE `tblOrders` DISABLE KEYS */;
INSERT INTO `tblOrders` VALUES (1,'aaa@gmail.com','Wednesday 25 November 2020 20:29:49'),(2,'aaa@gmail.com','Wednesday 25 November 2020 20:30:01'),(3,NULL,'Thursday 26 November 2020 00:36:51'),(4,'aaa@gmail.com','Thursday 26 November 2020 00:37:15'),(5,'aaa@gmail.com','Thursday 26 November 2020 10:57:58'),(6,'aaa@gmail.com','Thursday 26 November 2020 11:17:22'),(7,'aaa@gmail.com','Thursday 26 November 2020 12:20:17'),(8,'aaa@gmail.com','Thursday 26 November 2020 12:20:20'),(9,'aaa@gmail.com','Thursday 26 November 2020 12:20:24'),(10,'aaa@gmail.com','Thursday 26 November 2020 12:24:08'),(11,'bbb@gmail.com','Friday 27 November 2020 12:14:11'),(12,'bbb@gmail.com','Friday 27 November 2020 12:14:27'),(13,'bbb@gmail.com','Friday 27 November 2020 12:19:22'),(14,'aaa@gmail.com','Friday 27 November 2020 13:17:34'),(15,'aaa@gmail.com','Friday 27 November 2020 13:17:53'),(16,'aaa@gmail.com','Friday 27 November 2020 13:48:59'),(17,'aaa@gmail.com','Saturday 28 November 2020 02:14:52'),(18,'ccc@gmail.com','Saturday 28 November 2020 02:32:20'),(19,'ccc@gmail.com','Saturday 28 November 2020 02:32:33'),(20,'ccc@gmail.com','Saturday 28 November 2020 02:47:10'),(21,'ccc@gmail.com','Saturday 28 November 2020 02:48:09'),(22,'ddd@gmail.com','Saturday 28 November 2020 09:21:58'),(23,'ddd@gmail.com','Saturday 28 November 2020 09:22:12'),(24,'eee@gmail.com','Saturday 28 November 2020 09:26:19'),(25,'eee@gmail.com','Saturday 28 November 2020 09:26:30'),(26,'eee@gmail.com','Saturday 28 November 2020 09:27:20'),(27,'eee@gmail.com','Saturday 28 November 2020 09:37:31'),(28,'hhh@gmail.com','Saturday 28 November 2020 10:13:24'),(29,'hhh@gmail.com','Saturday 28 November 2020 10:13:34'),(30,'hhh@gmail.com','Saturday 28 November 2020 10:15:27'),(31,'hhh@gmail.com','Saturday 28 November 2020 10:19:11'),(32,'hhh@gmail.com','Saturday 28 November 2020 10:20:08'),(33,'hhh@gmail.com','Saturday 28 November 2020 10:20:37'),(34,'hhh@gmail.com','Saturday 28 November 2020 10:20:55'),(35,'hhh@gmail.com','Saturday 28 November 2020 10:22:03');
/*!40000 ALTER TABLE `tblOrders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblPizza`
--

DROP TABLE IF EXISTS `tblPizza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblPizza` (
  `Pizza_ID` int NOT NULL AUTO_INCREMENT,
  `dough` varchar(20) DEFAULT NULL,
  `cheese` varchar(20) DEFAULT NULL,
  `sauce` varchar(20) DEFAULT NULL,
  `toppings` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`Pizza_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblPizza`
--

LOCK TABLES `tblPizza` WRITE;
/*!40000 ALTER TABLE `tblPizza` DISABLE KEYS */;
INSERT INTO `tblPizza` VALUES (1,'regular','mozzarella','marinara','pepperoni,salami,bacon,ham,beef'),(2,'thin','cheddar','barbecue','tomato,broccoli,olive,mushroom,pineapple'),(3,'thick','gouda','garlic','pepperoni,bacon,beef,broccoli,mushroom'),(4,'regular','mozzarella','marinara','ham,broccoli,pineapple'),(5,'thin','gouda','garlic','pepperoni,olive,pineapple'),(6,'thick','gouda','marinara','broccoli,olive,mushroom'),(7,'thick','mozzarella','marinara','salami,bacon,beef'),(8,'regular','gouda','garlic','beef,broccoli,mushroom,pineapple'),(9,'regular','mozzarella','marinara','pepperoni,salami'),(10,'thick','cheddar','marinara','ham,beef'),(11,'thin','gouda','garlic','beef,broccoli,olive,mushroom,pineapple'),(12,'thin','mozzarella','garlic','salami,tomato,mushroom,pineapple'),(13,'regular','mozzarella','garlic','ham,tomato,olive,pineapple'),(14,'regular','mozzarella','barbecue','salami,broccoli,pineapple'),(15,'thick','gouda','barbecue','pepperoni'),(16,'thick','gouda','marinara','salami'),(17,'thick','mozzarella','garlic','salami,bacon,beef'),(18,'thin','mozzarella','garlic','olive,pineapple'),(19,'thick','mozzarella','barbecue','pepperoni');
/*!40000 ALTER TABLE `tblPizza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblPizzaOrders`
--

DROP TABLE IF EXISTS `tblPizzaOrders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblPizzaOrders` (
  `PizzaOrders_ID` int NOT NULL AUTO_INCREMENT,
  `Orders_ID` int NOT NULL,
  `Pizza_ID` int NOT NULL,
  PRIMARY KEY (`PizzaOrders_ID`),
  KEY `Orders_ID` (`Orders_ID`),
  KEY `Pizza_ID` (`Pizza_ID`),
  CONSTRAINT `tblPizzaOrders_ibfk_1` FOREIGN KEY (`Orders_ID`) REFERENCES `tblOrders` (`Orders_ID`),
  CONSTRAINT `tblPizzaOrders_ibfk_2` FOREIGN KEY (`Pizza_ID`) REFERENCES `tblPizza` (`Pizza_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblPizzaOrders`
--

LOCK TABLES `tblPizzaOrders` WRITE;
/*!40000 ALTER TABLE `tblPizzaOrders` DISABLE KEYS */;
INSERT INTO `tblPizzaOrders` VALUES (1,1,1),(2,2,2),(3,3,1),(4,4,1),(5,5,3),(6,7,1),(7,8,2),(8,9,2),(9,10,2),(10,11,4),(11,12,5),(12,13,6),(13,14,7),(14,15,8),(15,16,9),(16,17,10),(17,18,11),(18,19,12),(19,20,11),(20,21,11),(21,22,13),(22,23,14),(23,24,15),(24,25,16),(25,26,15),(26,27,16),(27,28,17),(28,29,18),(29,30,18),(30,31,19),(31,32,19),(32,33,18),(33,34,18),(34,35,18);
/*!40000 ALTER TABLE `tblPizzaOrders` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-11-28 10:38:16
