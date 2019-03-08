-- MySQL dump 10.17  Distrib 10.3.13-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: d_employees
-- ------------------------------------------------------
-- Server version	10.3.13-MariaDB-1:10.3.13+maria~bionic-log

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
-- Table structure for table `department_employee`
--

DROP TABLE IF EXISTS `department_employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `department_employee_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `department_employee_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_employee`
--

LOCK TABLES `department_employee` WRITE;
/*!40000 ALTER TABLE `department_employee` DISABLE KEYS */;
INSERT INTO `department_employee` VALUES (1,10,1,'2005-10-02','3000-01-01'),(2,10,2,'2008-09-03','3000-01-01'),(3,9,3,'2008-01-03','3000-01-01'),(4,9,4,'2008-01-03','3000-01-01'),(5,9,5,'2009-01-09','3000-01-01'),(6,10,10,'2003-04-02','3000-01-01'),(7,10,11,'2008-10-30','3000-01-01'),(8,10,12,'2008-11-06','3000-01-01'),(9,10,13,'2006-11-06','3000-01-01'),(10,7,14,'2000-01-06','3000-01-01'),(11,7,15,'2000-01-06','3000-01-01');
/*!40000 ALTER TABLE `department_employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `department_manager`
--

DROP TABLE IF EXISTS `department_manager`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `department_manager` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `department_id` (`department_id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `department_manager_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE CASCADE,
  CONSTRAINT `department_manager_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `department_manager`
--

LOCK TABLES `department_manager` WRITE;
/*!40000 ALTER TABLE `department_manager` DISABLE KEYS */;
INSERT INTO `department_manager` VALUES (1,13,16,'2000-01-03','3000-01-01'),(2,13,17,'2000-01-03','3000-01-01'),(3,13,18,'2001-01-04','3000-01-01'),(4,13,19,'2007-01-04','3000-01-01'),(5,4,7,'2010-01-06','3000-01-01'),(6,4,30,'2005-01-06','3000-01-01'),(7,4,28,'2005-01-06','3000-01-01'),(8,4,17,'2000-01-03','3000-01-01');
/*!40000 ALTER TABLE `department_manager` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departments`
--

DROP TABLE IF EXISTS `departments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departments`
--

LOCK TABLES `departments` WRITE;
/*!40000 ALTER TABLE `departments` DISABLE KEYS */;
INSERT INTO `departments` VALUES (4,'Accounting'),(6,'Business Development'),(13,'Company Management'),(9,'Engineering'),(11,'Human Resources'),(3,'Legal'),(8,'Mobile Development'),(5,'Product Management'),(1,'Sales'),(7,'Software Development'),(12,'Support'),(2,'Training'),(10,'Web Development');
/*!40000 ALTER TABLE `departments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `employees`
--

DROP TABLE IF EXISTS `employees`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `birth_date` date NOT NULL,
  `first_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `hire_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employees`
--

LOCK TABLES `employees` WRITE;
/*!40000 ALTER TABLE `employees` DISABLE KEYS */;
INSERT INTO `employees` VALUES (1,'1991-11-08','Ode','Blaskett','M','2014-12-25'),(2,'1981-05-26','Row','Rengger','F','2008-11-02'),(3,'1981-12-31','Esther','Copcott','F','2008-07-26'),(4,'1984-10-06','Gearalt','Kersley','M','2018-12-01'),(5,'1994-03-04','Rodd','Fabry','M','2011-09-15'),(6,'1990-08-30','Blanca','Presnell','F','2009-08-22'),(7,'1982-04-23','Lucita','Corkitt','F','2005-09-13'),(8,'1993-06-06','Trumaine','Adamczewski','M','2001-04-04'),(9,'1995-09-04','Gael','Ayer','F','2005-06-26'),(10,'1972-05-25','Raoul','Fonquernie','M','2005-01-06'),(11,'1998-01-11','Morena','Penniell','F','2012-12-09'),(12,'1971-07-25','Gale','Pourvoieur','M','2002-05-07'),(13,'1979-03-17','Kary','D\'Alessio','F','2017-09-04'),(14,'1978-07-21','Joice','Lechmere','F','2013-11-29'),(15,'1972-10-14','Fawnia','Alliband','F','2006-02-22'),(16,'1971-10-14','Henriette','Durtnel','F','2002-02-10'),(17,'1991-12-22','Shirley','Dulling','F','2001-02-16'),(18,'1982-05-20','Hernando','Trowsdall','M','2005-12-29'),(19,'1999-12-29','Averil','Garvey','F','2005-08-18'),(20,'1989-12-14','Stephi','Ings','F','2004-05-28'),(21,'1988-08-03','Jacki','Eat','F','2011-11-04'),(22,'1988-04-21','Eliot','Cabera','M','2009-02-10'),(23,'1999-01-04','Agnella','Orts','F','2014-06-24'),(24,'1971-11-02','Josefa','Olliar','F','2015-12-19'),(25,'1979-11-24','Herminia','Betun','F','2016-04-06'),(26,'1974-11-11','Maxi','MacFadzan','F','2009-03-10'),(27,'1984-05-31','Sidney','Camoys','M','2009-01-11'),(28,'1977-04-29','Sallyann','Birchett','F','2014-12-14'),(29,'1992-09-03','Reagan','Tugman','M','2010-02-02'),(30,'1995-02-28','Chloris','Jevons','F','2018-05-10'),(31,'1998-12-04','Lou','Witterick','F','2017-02-18'),(32,'1979-07-05','Chrystal','Brech','F','2011-05-22'),(33,'1980-05-26','Cully','Repper','M','2009-08-23'),(34,'1974-05-02','Orelee','Cardozo','F','2000-06-28'),(35,'1974-05-23','Corette','Andren','F','2009-06-28'),(36,'1995-01-12','Sheppard','Niese','M','2014-06-02'),(37,'1976-10-18','Myron','Cockrell','M','2008-01-16'),(38,'1970-09-03','Roshelle','Outerbridge','F','2005-07-15'),(39,'1970-12-21','Thorvald','Beauchop','M','2013-12-30'),(40,'1976-08-08','Malachi','Phoebe','M','2003-10-13');
/*!40000 ALTER TABLE `employees` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `salaries`
--

DROP TABLE IF EXISTS `salaries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `salaries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `salary` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `salaries_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `salaries`
--

LOCK TABLES `salaries` WRITE;
/*!40000 ALTER TABLE `salaries` DISABLE KEYS */;
INSERT INTO `salaries` VALUES (1,16,50000,'2000-01-03','3000-01-01'),(2,17,26000,'2000-01-03','3000-01-01'),(3,18,22000,'2001-01-04','3000-01-01'),(4,19,15000,'2007-01-04','3000-01-01'),(5,7,10000,'2010-01-06','3000-01-01'),(6,30,8000,'2010-01-06','3000-01-01'),(7,28,7000,'2010-01-06','3000-01-01'),(8,17,7500,'2000-01-03','3000-01-01'),(9,1,9500,'2005-10-02','3000-01-01'),(10,2,5500,'2008-09-03','3000-01-01'),(11,3,6500,'2008-01-03','3000-01-01'),(12,4,4100,'2008-01-03','3000-01-01'),(13,5,4100,'2009-01-09','3000-01-01'),(14,10,6100,'2003-04-02','3000-01-01'),(15,11,3100,'2008-10-30','3000-01-01'),(16,12,5100,'2008-11-06','3000-01-01'),(17,13,4800,'2006-11-06','3000-01-01'),(18,14,6100,'2000-01-06','3000-01-01'),(19,15,3100,'2000-01-06','3000-01-01');
/*!40000 ALTER TABLE `salaries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `titles`
--

DROP TABLE IF EXISTS `titles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `titles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`),
  CONSTRAINT `titles_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `titles`
--

LOCK TABLES `titles` WRITE;
/*!40000 ALTER TABLE `titles` DISABLE KEYS */;
INSERT INTO `titles` VALUES (1,1,'Software Engineer I','2005-10-02','3000-01-01'),(2,2,'Software Engineer I','2008-09-03','3000-01-01'),(3,3,'Clinical Specialist','2008-01-03','3000-01-01'),(4,4,'Clinical Specialist','2007-01-03','3000-01-01'),(5,5,'Systems Administrator I','2005-01-06','3000-01-01'),(6,6,'Internal Auditor','2015-01-06','3000-01-01'),(7,7,'Accountant','2010-01-06','3000-01-01'),(8,8,'Sales Representative','2008-10-30','3000-01-01'),(9,9,'Executive Secretary','2003-09-21','3000-01-01'),(10,10,'Senior Web developer','2003-04-02','3000-01-01'),(11,11,'Junior Web developer','2008-10-30','3000-01-01'),(12,12,'Middle Web developer','2008-11-06','3000-01-01'),(13,13,'Junior developer','2006-11-06','3000-01-01'),(14,14,'Middle developer','2000-01-06','3000-01-01'),(15,15,'Senior developer','2004-01-06','3000-01-01'),(16,16,'Director','2000-01-03','3000-01-01'),(17,17,'Chief accountant','2000-01-03','3000-01-01'),(18,18,'Сhief manager','2001-01-04','3000-01-01'),(19,19,'Company manager','2007-01-04','3000-01-01'),(20,20,'Research Associate','2009-04-14','3000-01-01'),(21,21,'Product Management','2003-02-14','3000-01-01'),(22,22,'Senior Analyst','2001-01-19','3000-01-01'),(23,23,'Support Technician','2008-01-13','3000-01-01'),(24,24,'Quality Control','2003-01-13','3000-01-01'),(25,25,'Media Manager','2010-01-13','3000-01-01'),(26,26,'	Associate Professor','2004-01-06','3000-01-01'),(27,27,'Desktop Support Technician','2010-01-06','3000-01-01'),(28,28,'Senior Financial Analyst','2005-01-06','3000-01-01'),(29,29,'Computer Systems Analyst','2003-09-21','3000-01-01'),(30,30,'Account Executive','2005-01-06','3000-01-01');
/*!40000 ALTER TABLE `titles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'd_employees'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-05 21:31:52
