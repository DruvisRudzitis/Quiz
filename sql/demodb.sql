-- MySQL dump 10.13  Distrib 8.0.30, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: draugiem
-- ------------------------------------------------------
-- Server version	8.0.30-0ubuntu0.22.04.1

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
-- Table structure for table `quiz_question_answers`
--

DROP TABLE IF EXISTS `quiz_question_answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_question_answers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `user_id` int NOT NULL,
  `is_valid_answer` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_question_answers`
--

LOCK TABLES `quiz_question_answers` WRITE;
/*!40000 ALTER TABLE `quiz_question_answers` DISABLE KEYS */;
/*!40000 ALTER TABLE `quiz_question_answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_question_options`
--

DROP TABLE IF EXISTS `quiz_question_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_question_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `question_id` int NOT NULL,
  `text` varchar(255) NOT NULL,
  `isValid` tinyint NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_question_options`
--

LOCK TABLES `quiz_question_options` WRITE;
/*!40000 ALTER TABLE `quiz_question_options` DISABLE KEYS */;
INSERT INTO `quiz_question_options` VALUES (1,1,'answer 1',1),(2,1,'answer 2',0),(3,2,'answer 3',0),(4,2,'answer 4',1),(5,3,'answer 5',0),(6,3,'answer 6',1),(7,4,'answer 7',0),(8,4,'answer 8',0),(9,4,'answer 9',1),(10,5,'answer 10',1),(11,5,'answer 11',0),(12,5,'answer 12',0),(13,6,'answer 13',1),(14,6,'answer 14',0),(15,6,'answer 15',0),(16,7,'answer 16',0),(17,7,'answer 17',0),(18,7,'answer 18',1),(19,7,'answer 19',0),(20,8,'answer 20',0),(21,8,'answer 21',0),(22,8,'answer 22',1),(23,9,'answer 23',0),(24,9,'answer 24',1),(25,10,'answer 25',0),(26,10,'answer 26',1),(27,11,'answer 27',0),(28,11,'answer 28',1),(29,12,'answer 29',1),(30,12,'answer 30',0),(31,12,'answer 31',0),(32,13,'answer 32',1),(33,13,'answer 33',0),(34,14,'answer 34',1),(35,14,'answer 35',0),(36,15,'answer 36',0),(37,15,'answer 37',1),(38,15,'answer 38',0),(39,16,'answer 39',1),(40,16,'answer 40',0),(41,16,'answer 42',0),(42,16,'answer 43',0),(43,17,'answer 44',1),(44,17,'answer 45',0),(45,18,'answer 46',0),(46,18,'answer 47',1),(47,19,'answer 48',0),(48,19,'answer 49',0),(49,19,'answer 50',1);
/*!40000 ALTER TABLE `quiz_question_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_questions`
--

DROP TABLE IF EXISTS `quiz_questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_questions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `topic_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_questions`
--

LOCK TABLES `quiz_questions` WRITE;
/*!40000 ALTER TABLE `quiz_questions` DISABLE KEYS */;
INSERT INTO `quiz_questions` VALUES (1,5,'qustion 1'),(2,5,'question 2'),(3,5,'question 3'),(4,3,'question 4'),(5,3,'question 5'),(6,3,'question 6'),(7,3,'question 7'),(8,4,'question 8'),(9,4,'question 9'),(10,4,'question 10'),(11,4,'question 11'),(12,4,'question 12'),(13,6,'question 13'),(14,6,'question 14'),(15,6,'question 15'),(16,6,'question 16'),(17,6,'question 17'),(18,6,'question 18');
/*!40000 ALTER TABLE `quiz_questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `quiz_topics`
--

DROP TABLE IF EXISTS `quiz_topics`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `quiz_topics` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `quiz_topics`
--

LOCK TABLES `quiz_topics` WRITE;
/*!40000 ALTER TABLE `quiz_topics` DISABLE KEYS */;
INSERT INTO `quiz_topics` VALUES (3,'Daba'),(4,'Teatris'),(5,'Auto'),(6,'Kosmoss');
/*!40000 ALTER TABLE `quiz_topics` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
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

-- Dump completed on 2022-08-29  3:01:32
