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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminarorg`
--

LOCK TABLES `seminarorg` WRITE;
/*!40000 ALTER TABLE `seminarorg` DISABLE KEYS */;
INSERT INTO `seminarorg` VALUES (1,'seminar','Guest Lectures','NULL','aas','Aas','aa','aS','AA','2024/01/31 14:00','2024-01-31','','aa','','sdSD','ssa','-web confernce link','seminar31-01-2024 04:52','10.24.8.213/mailinglist/upload/seminar31-01-2024 04:52',1,'2024-01-31 04:52:35','Active'),(2,'','Muthamizhmandram','dd','dcx',NULL,NULL,NULL,NULL,'2024/01/31 14:00',NULL,NULL,'dds','','dds','ddsds','','event31-01-2024 04:55','10.24.8.213/mailinglist/upload/event31-01-2024 04:55',NULL,'2024-01-30 23:25:25','Active'),(3,'seminar','Guest Lectures','NULL','aas','Aas','aa','aS','AA','2024/01/31 14:00','2024-01-31','','aa','','sdSD','ssa','-web confernce link','seminar31-01-2024 04:57','10.24.8.213/mailinglist/upload/seminar31-01-2024 04:57',1,'2024-01-31 04:57:36','Active'),(4,'','Closed Holiday',NULL,'ssw',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sdds','ass','sas','',NULL,NULL,0,'2024-01-31 04:58:13','default_value'),(5,'','Invitation',NULL,'ssa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ssd','ssd','sadsad','s',NULL,NULL,0,'2024-01-31 05:02:32','default_value'),(6,'','Closed Holiday',NULL,'assd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'sadds','sadas','sasad','',NULL,NULL,0,'2024-01-31 05:08:35','default_value'),(7,'','Closed Holiday',NULL,'AA',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'aa','aa','AA','',NULL,NULL,0,'2024-01-31 05:18:34','default_value'),(8,'','Circular',NULL,'assa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'aAS','Aa','ASas','',NULL,NULL,0,'2024-01-31 05:21:56','default_value'),(9,'','Best Poster Award',NULL,'zzx',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'zzx','zxz','xzxz','zxxz',NULL,NULL,0,'2024-01-31 09:04:04','default_value'),(10,'','Muthamizhmandram','saas','SAs',NULL,NULL,NULL,NULL,'2024/01/31 19:00',NULL,NULL,'asas','','asa','saas','','','',NULL,'2024-01-31 04:06:19','Active');
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

-- Dump completed on 2024-02-01  8:00:02
