-- MySQL dump 10.19  Distrib 10.3.28-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: seminar
-- ------------------------------------------------------
-- Server version	10.3.28-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `announcesubtype`
--

DROP TABLE IF EXISTS `announcesubtype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcesubtype` (
  `category` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcesubtype`
--

LOCK TABLES `announcesubtype` WRITE;
/*!40000 ALTER TABLE `announcesubtype` DISABLE KEYS */;
INSERT INTO `announcesubtype` VALUES ('Awards','Best Presentation Award'),('Awards','Best Paper Award'),('Awards','Best Poster Award'),('Awards','Best Thesis Award'),('Closure','Closure of Fitness Center'),('Closure','Closure of Gate'),('Closure','Closure of Swimming Pool'),('Hospital Particulars','Vaccination'),('Hospital Particulars','Visiting Doctors'),('Hospital Particulars','Visiting Consultants'),('Announcement','Announcement of Quarters'),('Announcement','Condolence Message'),('Announcement','Death Message'),('Announcement','Disbursement of Salary'),('Announcement','Movie Schedule'),('Announcement','News Letter'),('Announcement','Appointment'),('Announcement','Extension of Headship'),('General','Book Publication'),('Announcement','Editorial Board Membership'),('General','Farewell Function'),('General','Fellowship'),('General','Invitation'),('General','Maintenance of Service'),('General','Permission'),('General','Pledge'),('General','Requirements'),('Awards','Journal publication'),('Awards','Honorary Award'),('Awards','Best Article Award'),('Awards','Prize'),('Awards','Recognition'),('Awards','Awards'),('Announcement','Maintenance'),('Announcement','Promotion');
/*!40000 ALTER TABLE `announcesubtype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `announcetype`
--

DROP TABLE IF EXISTS `announcetype`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `announcetype` (
  `type` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `announcetype`
--

LOCK TABLES `announcetype` WRITE;
/*!40000 ALTER TABLE `announcetype` DISABLE KEYS */;
INSERT INTO `announcetype` VALUES ('Announcement'),('Awards'),('Circular'),('Citation'),('Closure'),('General'),('ISO Feedback'),('Learn Hindi Word'),('Library'),('Security Regulation'),('Special Talk'),('Sports'),('Symposium'),('Hospital Particulars'),('Workshop'),('Others'),('Closed Holiday');
/*!40000 ALTER TABLE `announcetype` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminar`
--

DROP TABLE IF EXISTS `seminar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('seminar','announce','event') NOT NULL,
  `category` varchar(100) NOT NULL,
  `welcome` varchar(1000) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `speaker` varchar(100) DEFAULT NULL,
  `biography` varchar(1000) DEFAULT NULL,
  `affiliation` varchar(1000) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `reminder_date` varchar(100) DEFAULT NULL,
  `remindermail` varchar(10) NOT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `abstract` mediumtext DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `filename` varchar(100) NOT NULL,
  `filelocation` varchar(200) NOT NULL,
  `flag` varchar(2) NOT NULL,
  `modifiedtimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`(255))
) ENGINE=InnoDB AUTO_INCREMENT=7951 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar`
--

LOCK TABLES `seminar` WRITE;
/*!40000 ALTER TABLE `seminar` DISABLE KEYS */;
/*!40000 ALTER TABLE `seminar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminar1`
--

DROP TABLE IF EXISTS `seminar1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminar1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('seminar','announce','event') NOT NULL,
  `category` varchar(100) NOT NULL,
  `welcome` varchar(1000) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `speaker` varchar(100) DEFAULT NULL,
  `biography` varchar(1000) DEFAULT NULL,
  `affiliation` varchar(1000) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `abstract` mediumtext DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `filename` varchar(100) NOT NULL,
  `filelocation` varchar(200) NOT NULL,
  `modifiedtimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`(255))
) ENGINE=InnoDB AUTO_INCREMENT=8049 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminar1`
--

LOCK TABLES `seminar1` WRITE;
/*!40000 ALTER TABLE `seminar1` DISABLE KEYS */;
/*!40000 ALTER TABLE `seminar1` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminarorg`
--

DROP TABLE IF EXISTS `seminarorg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminarorg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `welcome` varchar(1000) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `speaker` varchar(1000) DEFAULT NULL,
  `biography` varchar(1000) DEFAULT NULL,
  `affiliation` varchar(1000) DEFAULT NULL,
  `department` varchar(1000) DEFAULT NULL,
  `date` varchar(1000) DEFAULT NULL,
  `reminder_date` varchar(1000) DEFAULT NULL,
  `remindermail` varchar(255) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `abstract` mediumtext DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `filename` varchar(255) DEFAULT NULL,
  `filelocation` varchar(255) DEFAULT NULL,
  `flag` int(11) DEFAULT NULL,
  `modifiedtimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(255) DEFAULT 'default_value',
  PRIMARY KEY (`id`),
  KEY `title` (`title`(255))
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminarorg`
--

LOCK TABLES `seminarorg` WRITE;
/*!40000 ALTER TABLE `seminarorg` DISABLE KEYS */;
INSERT INTO `seminarorg` VALUES (1,'seminar','Guest Lectures','NULL','test','test','test','test','test','2024/03/22 19:45','2024-03-22','','test','','test','test','test-web confernce link','','',1,'2024-03-22 09:12:09','Active'),(2,'','News Letter',NULL,'test',NULL,NULL,NULL,NULL,NULL,NULL,'Yes',NULL,'test','test','test','test',NULL,NULL,0,'2024-03-22 09:15:06','default_value'),(3,'','Others','test','test',NULL,NULL,NULL,NULL,'2024/03/22 20:30',NULL,NULL,'test','','tets','tets','','','',1,'2024-03-22 09:16:41','Active'),(4,'','Best Paper Award',NULL,'assss',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ss','ss','sss','',NULL,NULL,0,'2024-03-25 04:14:25','default_value'),(5,'','Circular',NULL,'swads',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sdasd','dsds','dsasd','ssa',NULL,NULL,0,'2024-03-25 09:21:59','default_value'),(6,'','Best Paper Award',NULL,'gg',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'iiooio','o','oiooi','oo',NULL,NULL,0,'2024-03-27 07:11:44','default_value');
/*!40000 ALTER TABLE `seminarorg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seminarorg1`
--

DROP TABLE IF EXISTS `seminarorg1`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seminarorg1` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) DEFAULT NULL,
  `category` varchar(100) NOT NULL,
  `welcome` varchar(1000) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `speaker` varchar(100) DEFAULT NULL,
  `biography` varchar(1000) DEFAULT NULL,
  `affiliation` varchar(1000) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `date` varchar(100) DEFAULT NULL,
  `reminder_date` varchar(100) DEFAULT NULL,
  `remindermail` varchar(255) DEFAULT NULL,
  `venue` varchar(100) DEFAULT NULL,
  `abstract` mediumtext DEFAULT NULL,
  `sender` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `others` varchar(100) DEFAULT NULL,
  `filename` varchar(100) NOT NULL,
  `filelocation` varchar(200) NOT NULL,
  `flag` int(11) DEFAULT 0,
  `modifiedtimestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `title` (`title`(255))
) ENGINE=InnoDB AUTO_INCREMENT=8003 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminarorg1`
--

LOCK TABLES `seminarorg1` WRITE;
/*!40000 ALTER TABLE `seminarorg1` DISABLE KEYS */;
INSERT INTO `seminarorg1` VALUES (8002,'','Muthamizhmandram','adsds','sdasd',NULL,NULL,NULL,NULL,'2023/12/26 15:00',NULL,'','ads','','aasas','saasas','sasa','','',0,'2023-12-25 23:26:22','Active');
/*!40000 ALTER TABLE `seminarorg1` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2024-03-28  8:00:02
