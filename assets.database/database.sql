-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: placement_fyp
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.36-MariaDB

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
-- Table structure for table `coordinator`
--

DROP TABLE IF EXISTS `coordinator`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coordinator` (
  `coordinator_id` int(11) NOT NULL,
  `coordinator_name` varchar(45) DEFAULT NULL,
  `coordinator_phonenum` int(11) DEFAULT NULL,
  `coordinator_email` varchar(45) DEFAULT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`coordinator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinator`
--

LOCK TABLES `coordinator` WRITE;
/*!40000 ALTER TABLE `coordinator` DISABLE KEYS */;
INSERT INTO `coordinator` VALUES (100,'Jennifer O Malley',61381111,'jenomalley@placement.ie','College0'),(101,'Jane Doe',868770333,'janedoe@placement.ie','College1'),(102,'Anne O Connor',555444,'anneoconnor@placement.ie','College2'),(103,'Joe Whelan',416789,'joewhelan@placement.ie','College3'),(104,'Tara Nash',312567,'taranash@placement.ie','College4');
/*!40000 ALTER TABLE `coordinator` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `grades`
--

DROP TABLE IF EXISTS `grades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `grades` (
  `student_grades_id` int(11) NOT NULL,
  `placement_id` int(11) DEFAULT NULL,
  `status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`student_grades_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `grades`
--

LOCK TABLES `grades` WRITE;
/*!40000 ALTER TABLE `grades` DISABLE KEYS */;
/*!40000 ALTER TABLE `grades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `user_id` int(11) NOT NULL,
  `password` varchar(45) DEFAULT NULL,
  `role` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (100,'College0','Coordinator'),(101,'College1','Coordinator');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `placements`
--

DROP TABLE IF EXISTS `placements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `placements` (
  `placement_id` int(11) NOT NULL,
  `placement_type` varchar(45) DEFAULT NULL,
  `placement_name` varchar(45) DEFAULT NULL,
  `placement_address` varchar(100) DEFAULT NULL,
  `placement_email` varchar(45) DEFAULT NULL,
  `placement_phonenum` int(11) DEFAULT NULL,
  `placement_gps_coordinates` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`placement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placements`
--

LOCK TABLES `placements` WRITE;
/*!40000 ALTER TABLE `placements` DISABLE KEYS */;
/*!40000 ALTER TABLE `placements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `repeat_placement`
--

DROP TABLE IF EXISTS `repeat_placement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repeat_placement` (
  `repeat_placement_id` int(11) NOT NULL,
  `placement_id` int(11) DEFAULT NULL,
  `supervisor_id` int(11) DEFAULT NULL,
  `date_of_placement` date DEFAULT NULL,
  PRIMARY KEY (`repeat_placement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repeat_placement`
--

LOCK TABLES `repeat_placement` WRITE;
/*!40000 ALTER TABLE `repeat_placement` DISABLE KEYS */;
INSERT INTO `repeat_placement` VALUES (2111,2001,201,'0000-00-00'),(2222,2000,200,'0000-00-00'),(2333,2000,200,'0000-00-00'),(2444,2004,204,'0000-00-00');
/*!40000 ALTER TABLE `repeat_placement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student`
--

DROP TABLE IF EXISTS `student`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `student_name` varchar(45) DEFAULT NULL,
  `student_year` int(11) DEFAULT NULL,
  `student_grades_id` int(11) NOT NULL,
  `placement_status` varchar(45) NOT NULL,
  `coordinator_name` varchar(45) NOT NULL,
  `placement_id` int(11) NOT NULL,
  `placement_supervisor_id` int(11) NOT NULL,
  `repeat_placement_id` int(11) NOT NULL,
  `coordinator_id` int(11) NOT NULL,
  PRIMARY KEY (`student_id`),
  KEY `placement_id_idx` (`placement_id`),
  KEY `placement_supervisor_id_idx` (`placement_supervisor_id`),
  KEY `repeat_placement_id_idx` (`repeat_placement_id`),
  KEY `coordinator_id_idx` (`coordinator_id`),
  KEY `student_grades_id_idx` (`student_grades_id`),
  CONSTRAINT `coordinator_id` FOREIGN KEY (`coordinator_id`) REFERENCES `coordinator` (`coordinator_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `placement_id` FOREIGN KEY (`placement_id`) REFERENCES `placements` (`placement_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `placement_supervisor_id` FOREIGN KEY (`placement_supervisor_id`) REFERENCES `supervisor` (`placement_supervisor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `repeat_placement_id` FOREIGN KEY (`repeat_placement_id`) REFERENCES `repeat_placement` (`repeat_placement_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `student_grades_id` FOREIGN KEY (`student_grades_id`) REFERENCES `grades` (`student_grades_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
/*!40000 ALTER TABLE `student` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supervisor`
--

DROP TABLE IF EXISTS `supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supervisor` (
  `placement_supervisor_id` int(11) NOT NULL,
  `placement_supervisor_name` varchar(45) DEFAULT NULL,
  `placement_email` varchar(45) DEFAULT NULL,
  `placement_phonenum` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`placement_supervisor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supervisor`
--

LOCK TABLES `supervisor` WRITE;
/*!40000 ALTER TABLE `supervisor` DISABLE KEYS */;
INSERT INTO `supervisor` VALUES (200,'Jennifer Greene','jengreene@uhl.ie','061987654'),(201,'Sandra Quinn','sandraquinn@whitfieldclinic.ie','056982145'),(202,'Colette Ryan','c.ryan@milford.ie','061419258'),(203,'Eileen Tobin','eileentobin@galwayclinic.ie','04532169'),(204,'Eddie O Malley','e.omalley@mercyhospital.ie','021951357');
/*!40000 ALTER TABLE `supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'placement_fyp'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-03-10 19:38:08
