-- MySQL dump 10.13  Distrib 8.0.33, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: itisdev_sql
-- ------------------------------------------------------
-- Server version	8.0.33

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
-- Table structure for table `dish`
--

DROP TABLE IF EXISTS `dish`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `dish` (
  `dishID` int NOT NULL AUTO_INCREMENT,
  `dishName` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`dishID`),
  UNIQUE KEY `dishID` (`dishID`)
) ENGINE=InnoDB AUTO_INCREMENT=1003 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dish`
--

LOCK TABLES `dish` WRITE;
/*!40000 ALTER TABLE `dish` DISABLE KEYS */;
INSERT INTO `dish` VALUES (1001,'Spaghetti',60,''),(1002,'Pizza',550,'');
/*!40000 ALTER TABLE `dish` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient`
--

DROP TABLE IF EXISTS `ingredient`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredient` (
  `ingredientID` int NOT NULL AUTO_INCREMENT,
  `ingredientName` varchar(45) COLLATE utf8mb4_general_ci NOT NULL,
  `quantity` float NOT NULL,
  `measurement` varchar(45) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `updatedBy` int DEFAULT NULL,
  PRIMARY KEY (`ingredientID`),
  UNIQUE KEY `ingredientID` (`ingredientID`)
) ENGINE=InnoDB AUTO_INCREMENT=2005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient`
--

LOCK TABLES `ingredient` WRITE;
/*!40000 ALTER TABLE `ingredient` DISABLE KEYS */;
INSERT INTO `ingredient` VALUES (2001,'Egg',20,NULL,NULL),(2002,'Hotdog',20,NULL,NULL),(2003,'Flour',20,NULL,NULL),(2004,'Ketchup',20,NULL,NULL);
/*!40000 ALTER TABLE `ingredient` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ingredient_transaction`
--

DROP TABLE IF EXISTS `ingredient_transaction`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ingredient_transaction` (
  `transactionID` int NOT NULL AUTO_INCREMENT,
  `ingredientID` int NOT NULL,
  `quantity` float NOT NULL,
  `boughtDate` date NOT NULL,
  `createdAt` datetime NOT NULL,
  `createBy` int DEFAULT NULL,
  PRIMARY KEY (`transactionID`),
  UNIQUE KEY `transactionID` (`transactionID`),
  KEY `fk_01` (`ingredientID`),
  CONSTRAINT `fk_01` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ingredient_transaction`
--

LOCK TABLES `ingredient_transaction` WRITE;
/*!40000 ALTER TABLE `ingredient_transaction` DISABLE KEYS */;
INSERT INTO `ingredient_transaction` VALUES (11,2001,4,'2023-06-12','2023-06-19 13:59:14',NULL),(12,2002,7,'2023-06-13','2023-06-19 13:59:14',NULL),(13,2003,3,'2023-06-13','2023-06-19 13:59:14',NULL),(14,2004,6,'2023-06-14','2023-06-19 13:59:14',NULL),(15,2003,8,'2023-06-14','2023-06-19 13:59:14',NULL),(16,2001,10,'2023-06-18','2023-06-19 13:58:33',NULL),(17,2002,10,'2023-06-18','2023-06-19 13:58:45',NULL),(18,2002,10,'2023-06-18','2023-06-19 13:58:54',NULL),(19,2004,10,'2023-06-18','2023-06-19 13:59:05',NULL),(20,2003,10,'2023-06-18','2023-06-19 13:59:14',NULL);
/*!40000 ALTER TABLE `ingredient_transaction` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_item`
--

DROP TABLE IF EXISTS `order_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_item` (
  `itemID` int NOT NULL AUTO_INCREMENT,
  `orderID` int DEFAULT NULL,
  `dishID` int DEFAULT NULL,
  `quantity` float DEFAULT NULL,
  PRIMARY KEY (`itemID`),
  KEY `order_item_ibfk_1` (`orderID`),
  KEY `order_item_ibfk_2` (`dishID`),
  CONSTRAINT `order_item_ibfk_1` FOREIGN KEY (`orderID`) REFERENCES `orders` (`orderID`),
  CONSTRAINT `order_item_ibfk_2` FOREIGN KEY (`dishID`) REFERENCES `dish` (`dishID`)
) ENGINE=InnoDB AUTO_INCREMENT=5010 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_item`
--

LOCK TABLES `order_item` WRITE;
/*!40000 ALTER TABLE `order_item` DISABLE KEYS */;
INSERT INTO `order_item` VALUES (5001,4001,1001,2),(5002,4002,1002,1),(5003,4003,1001,1),(5004,4003,1002,1),(5005,4004,1001,2),(5006,4005,1001,1),(5007,4005,1002,1),(5008,4006,1001,1),(5009,4007,1002,1);
/*!40000 ALTER TABLE `order_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `orderID` int NOT NULL AUTO_INCREMENT,
  `totalPrice` float NOT NULL,
  `creadtedBy` int DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  PRIMARY KEY (`orderID`),
  UNIQUE KEY `orderID` (`orderID`)
) ENGINE=InnoDB AUTO_INCREMENT=4008 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (4001,120,1,'2023-06-12 00:00:00'),(4002,550,1,'2023-06-12 00:00:00'),(4003,610,1,'2023-06-13 00:00:00'),(4004,120,1,'2023-06-13 00:00:00'),(4005,1220,1,'2023-06-14 00:00:00'),(4006,60,1,'2023-06-14 00:00:00'),(4007,550,1,'2023-06-14 00:00:00');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `recipe`
--

DROP TABLE IF EXISTS `recipe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `recipe` (
  `recipeID` int NOT NULL AUTO_INCREMENT,
  `dishID` int NOT NULL,
  `ingredientID` int NOT NULL,
  `quantity` float NOT NULL,
  PRIMARY KEY (`recipeID`),
  UNIQUE KEY `recipeID` (`recipeID`,`dishID`,`ingredientID`),
  KEY `fk01` (`ingredientID`),
  KEY `fk02` (`dishID`),
  CONSTRAINT `fk01` FOREIGN KEY (`ingredientID`) REFERENCES `ingredient` (`ingredientID`),
  CONSTRAINT `fk02` FOREIGN KEY (`dishID`) REFERENCES `dish` (`dishID`)
) ENGINE=InnoDB AUTO_INCREMENT=3005 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `recipe`
--

LOCK TABLES `recipe` WRITE;
/*!40000 ALTER TABLE `recipe` DISABLE KEYS */;
INSERT INTO `recipe` VALUES (3001,1001,2001,1),(3002,1002,2002,1),(3003,1001,2003,1),(3004,1002,2004,1);
/*!40000 ALTER TABLE `recipe` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-06-25  4:08:35
