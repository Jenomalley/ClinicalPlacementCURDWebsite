CREATE DATABASE  IF NOT EXISTS `placement_fyp` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `placement_fyp`;
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
  `coordinator_phonenum` int(11) NOT NULL,
  `coordinator_email` varchar(45) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`coordinator_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coordinator`
--

LOCK TABLES `coordinator` WRITE;
/*!40000 ALTER TABLE `coordinator` DISABLE KEYS */;
INSERT INTO `coordinator` VALUES (0,'',0,NULL,NULL),(100,'Jennifer O Malley',61381111,'jenomalley@placement.ie',NULL),(101,'Jane Doe',868770333,'janedoe@placement.ie',NULL),(102,'Anne O Connor',555444,'anneoconnor@placement.ie',NULL),(103,'Joe Whelan',416789,'joewhelan@placement.ie',NULL),(104,'Tara Nash',312567,'taranash@placement.ie',NULL),(12345,'Alan Ryan',416258,'alan.ryan@placement.ie',NULL),(125478,'JennifeMcNamara',0,NULL,NULL),(258741,'Daraghfanning',0,NULL,NULL),(1245787,'con',0,NULL,NULL),(100243670,'Jen',0,NULL,NULL);
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
INSERT INTO `grades` VALUES (1,4001,'passes'),(2,4002,'fail'),(3,4004,'pass'),(4,4003,'pass');
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
INSERT INTO `login` VALUES (100,'45e5eccf2765a0b62cfecdcbec33cb0ccc0be6c7','coordinator'),(101,'45e5eccf2765a0b62cfecdcbec33cb0ccc0be6c7','coordinator'),(102,'45e5eccf2765a0b62cfecdcbec33cb0ccc0be6c7','coordinator'),(103,'45e5eccf2765a0b62cfecdcbec33cb0ccc0be6c7','coordinator'),(104,'45e5eccf2765a0b62cfecdcbec33cb0ccc0be6c7','coordinator'),(243670,'Pallasbeg1','student'),(1624679,'45e5eccf2765a0b62cfecdcbec33cb0ccc0be6c7','student');
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
  `placement_phonenum` varchar(45) DEFAULT NULL,
  `placement_gps_coordinates` decimal(10,0) DEFAULT NULL,
  `placement_status` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`placement_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `placements`
--

LOCK TABLES `placements` WRITE;
/*!40000 ALTER TABLE `placements` DISABLE KEYS */;
INSERT INTO `placements` VALUES (4001,'sports','santry sportclinic','santry rd, Dublin','santrysc@outlook.ie','254789',NULL,NULL),(4002,'orthopaedics','Croom hospital','croom co.limerick','croomhospital@uhl.ie','852147',NULL,NULL),(4003,'paediatrics','St Gabriels','dooradoyle co.limerick','stgabriels@outlook.ie','456321',NULL,NULL),(4004,'respiratory','St vincents ','merrion rd,dublin4','stvincents@outlook.ie','12638000',NULL,NULL),(4009,'jkhgjhg','v','jhv','jh','vjh',10,'v'),(4010,'sports','Bilboa Sports Clinic','Cappamore','bilboasc@outlook.ie','061381500',102,'pending');
/*!40000 ALTER TABLE `placements` ENABLE KEYS */;
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
  `student_grades_id` int(11) DEFAULT NULL,
  `coordinator_name` varchar(45) DEFAULT NULL,
  `placement_id` int(11) DEFAULT NULL,
  `placement_supervisor_id` int(11) DEFAULT NULL,
  `coordinator_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student`
--

LOCK TABLES `student` WRITE;
/*!40000 ALTER TABLE `student` DISABLE KEYS */;
INSERT INTO `student` VALUES (1624679,'sarah ryan',3,1,'jennifer o malley',4001,6001,100,1624679),(1624680,'Eric Moore',4,2,'jane doe',4002,6002,101,1624680),(1624681,'Hannah Dillion',1,3,'jennifer o malley',4004,6003,100,1624681);
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
INSERT INTO `supervisor` VALUES (6000,'Jennifer Greene','jengreene@uhl.ie','061987654'),(6001,'Sandra Quinn','sandraquinn@whitfieldclinic.ie','056982145'),(6002,'Colette Ryan','c.ryan@milford.ie','061419258'),(6003,'Eileen Tobin','eileentobin@galwayclinic.ie','04532169'),(6004,'Eddie O Malley','e.omalley@mercyhospital.ie','021951357');
/*!40000 ALTER TABLE `supervisor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'placement_fyp'
--
/*!50003 DROP PROCEDURE IF EXISTS `CreatePlacement` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `CreatePlacement`(
in _id int,
in _type VARCHAR(45),
in _name VARCHAR(45),
in _address VARCHAR(45),
in _email VARCHAR(45),
in _phonenum VARCHAR(45),
in _gps_coordinates decimal(10, 0),
in _status VARCHAR(45))
BEGIN
INSERT INTO `placement_fyp`.`placements`
(`placement_id`,
`placement_type`,
`placement_name`,
`placement_address`,
`placement_email`,
`placement_phonenum`,
`placement_gps_coordinates`,
`placement_status`)
VALUES
(_id,
_type,
_name,
_address,
_email,
_phonenum,
_gps_coordinates,
_status);
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `DeletePlacementById` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `DeletePlacementById`(In Id_ INT)
BEGIN

DELETE FROM `placement_fyp`.`placements`
WHERE `placement_id`=Id_;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetPlacementById` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPlacementById`(in Id_ int)
BEGIN
SELECT * FROM `placement_fyp`.`placements`
where `placement_id` = Id_;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `GetPlacements` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetPlacements`()
BEGIN
SELECT * 
FROM `placement_fyp`.`placements`;
END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `UpdatePlacement` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `UpdatePlacement`(
in _id int,
in _type VARCHAR(45),
in _name VARCHAR(45),
in _address VARCHAR(45),
in _email VARCHAR(45),
in _phonenum VARCHAR(45),
in _gps_coordinates decimal(10, 0),
in _status VARCHAR(45))
BEGIN



UPDATE `placement_fyp`.`placements`
SET

`placement_type` = in_type,
`placement_name` = in_name ,
`placement_address` = in_address,
`placement_email` = in_email ,
`placement_phonenum` = in_phonenum ,
`placement_gps_coordinates` = in_gps_coordinates ,
`placement_status` = in_status 
WHERE `placement_id` = _id;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-23 23:33:40
