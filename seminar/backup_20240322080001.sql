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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminarorg`
--

LOCK TABLES `seminarorg` WRITE;
/*!40000 ALTER TABLE `seminarorg` DISABLE KEYS */;
INSERT INTO `seminarorg` VALUES (1,'','Circular',NULL,'sasa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SASA','ssa','SSSA','SASA',NULL,NULL,0,'2024-02-15 05:25:14','default_value'),(2,'','Circular',NULL,'sasa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'SASA','ssa','SSSA','SASA',NULL,NULL,0,'2024-02-15 05:25:24','default_value'),(3,'','Circular',NULL,'sdsd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dsd','sdsd','dssd','',NULL,NULL,0,'2024-02-15 05:50:23','default_value'),(4,'','Circular',NULL,'sdsd',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dsd','sdsd','dssd','',NULL,NULL,0,'2024-02-15 05:50:35','default_value'),(5,'','Circular',NULL,'adfdfa',NULL,NULL,NULL,NULL,NULL,NULL,'Yes',NULL,'df','fadfd','afdfd','fdafd',NULL,NULL,0,'2024-03-01 06:33:44','default_value'),(6,'seminar','Research Scholar Seminars','NULL','ss','sAS','SAsa','saA','SAs','2024/03/21 20:00','2024-03-21','','sDSsa','','asAS','test@iitm.ac.in','ddsd-web confernce link','','',1,'2024-03-21 08:08:53','Active'),(7,'seminar','Research Scholar Seminars','NULL','ss','sAS','SAsa','saA','SAs','2024/03/21 20:00','2024-03-21','','sDSsa','','asAS','test@iitm.ac.in','ddsd-web confernce link','','',1,'2024-03-21 08:09:04','Active'),(8,'seminar','Research Scholar Seminars','NULL','ss','sAS','SAsa','saA','SAs','2024/03/21 20:00','2024-03-21','','sDSsa','','asAS','test@iitm.ac.in','ddsd-web confernce link','','',1,'2024-03-21 08:11:47','Active'),(9,'seminar','Research Scholar Seminars','NULL','ss','sAS','SAsa','saA','SAs','2024/03/21 20:00','2024-03-21','','sDSsa','','asAS','test@iitm.ac.in','ddsd-web confernce link','','',1,'2024-03-21 08:14:50','Active'),(10,'seminar','Research Scholar Seminars','NULL','ss','sAS','SAsa','saA','SAs','2024/03/21 20:00','2024-03-21','','sDSsa','','asAS','test@iitm.ac.in','ddsd-web confernce link','','',1,'2024-03-21 08:20:44','Active'),(11,'seminar','Research Scholar Seminars','NULL','ss','sAS','SAsa','saA','SAs','2024/03/21 20:00','2024-03-21','','sDSsa','','asAS','test@iitm.ac.in','ddsd-web confernce link','','',1,'2024-03-21 08:25:07','Active'),(12,'seminar','Research Scholar Seminars','NULL','ss','sAS','SAsa','saA','SAs','2024/03/21 20:00','2024-03-21','','sDSsa','','asAS','test@iitm.ac.in','ddsd-web confernce link','','',1,'2024-03-21 08:28:06','Active'),(13,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:30:06','Active'),(14,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:30:23','Active'),(15,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:34:04','Active'),(16,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:36:54','Active'),(17,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:37:40','Active'),(18,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:38:05','Active'),(19,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:38:36','Active'),(20,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:44:56','Active'),(21,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:45:51','Active'),(22,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:46:59','Active'),(23,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:49:07','Active'),(24,'seminar','Research Scholar Seminars','NULL','SAas','aSAsSAasa','SAS','saas','saAS','2024/03/21 16:00','2024-03-21','','ASAS','','aSsa','saas','-web confernce link','','',1,'2024-03-21 08:49:48','Active'),(25,'seminar','','NULL','','','','','','','1970-01-01','','','','','','-web confernce link','','',1,'2024-03-21 08:52:52','Active'),(26,'seminar','Guest Lectures','NULL','ewew','qewwe','wewqe','weqe','weqew','2024/03/21 18:00','2024-03-21','','wewe','','wewe','wewe','we-web confernce linkew','','',1,'2024-03-21 08:53:38','Active'),(27,'seminar','Guest Lectures','NULL','ewew','qewwe','wewqe','weqe','weqew','2024/03/21 18:00','2024-03-21','','wewe','','wewe','wewe','we-web confernce linkew','','',1,'2024-03-21 08:53:57','Active'),(28,'seminar','Guest Lectures','NULL','ewew','qewwe','wewqe','weqe','weqew','2024/03/21 18:00','2024-03-21','','wewe','','wewe','wewe','we-web confernce linkew','','',1,'2024-03-21 08:54:18','Active'),(29,'seminar','Guest Lectures','NULL','ewew','qewwe','wewqe','weqe','weqew','2024/03/21 18:00','2024-03-21','','wewe','','wewe','wewe','we-web confernce linkew','','',1,'2024-03-21 08:55:34','Active'),(30,'seminar','Guest Lectures','NULL','ewew','qewwe','wewqe','weqe','weqew','2024/03/21 18:00','2024-03-21','','wewe','','wewe','wewe','we-web confernce linkew','','',1,'2024-03-21 09:03:27','Active'),(31,'seminar','Research Proposal Seminars','NULL','aa','aa','QQ','QQ','AA','2024/03/21 19:00','2024-03-21','','AAA','','QQ','QQ','-web confernce link','','',1,'2024-03-21 09:10:59','Active'),(32,'seminar','Research Proposal Seminars','NULL','aa','aa','QQ','QQ','AA','2024/03/21 19:00','2024-03-21','','AAA','','QQ','QQ','-web confernce link','','',1,'2024-03-21 09:23:02','Active'),(33,'seminar','Guest Lectures','NULL','sadds','dssd','dssd','ds','dsds','2024/03/21 18:00','2024-03-21','','ee','','d','dsds','-web confernce link','','',1,'2024-03-21 09:26:38','Active'),(34,'seminar','Guest Lectures','NULL','sadds','dssd','dssd','ds','dsds','2024/03/21 18:00','2024-03-21','','ee','','d','dsds','-web confernce link','','',1,'2024-03-21 09:26:56','Active'),(35,'seminar','Guest Lectures','NULL','sadds','dssd','dssd','ds','dsds','2024/03/21 18:00','2024-03-21','','ee','','d','dsds','-web confernce link','','',1,'2024-03-21 09:31:34','Active'),(36,'seminar','Guest Lectures','NULL','sadds','dssd','dssd','ds','dsds','2024/03/21 18:00','2024-03-21','','ee','','d','dsds','-web confernce link','','',1,'2024-03-21 09:31:50','Active'),(37,'seminar','Technical Talk','NULL','dssd','dds','ded','ds','dssd','2024/03/21 19:00','2024-03-21','','eew','','ewe','ewew','-web confernce link','','',1,'2024-03-21 09:35:08','Active'),(38,'seminar','Technical Talk','NULL','dssd','dds','ded','ds','dssd','2024/03/21 19:00','2024-03-21','','eew','','ewe','ewew','-web confernce link','','',1,'2024-03-21 09:35:18','Active'),(39,'seminar','','NULL','','','','','','','1970-01-01','','','','','','-web confernce link','','',1,'2024-03-21 09:40:31','Active'),(40,'seminar','Guest Lectures','NULL','eqweqw','wwe','ewwe','q','wq','2024/03/15 17:00','2024-03-15','','qw','qw','qww','wq','-web confernce link','','',1,'2024-03-21 09:41:24','Active'),(41,'seminar','Guest Lectures','NULL','eqweqw','wwe','ewwe','q','wq','2024/03/15 17:00','2024-03-15','','qw','qw','qww','wq','-web confernce link','','',1,'2024-03-21 09:41:34','Active'),(42,'seminar','Research Scholar Seminars','NULL','dsds','dadas','saddsa','sd','dsasd','2024/03/21 19:00','2024-03-21','','sww','wsds','dsd','sdd','-web confernce link','','',1,'2024-03-21 09:48:57','Active'),(43,'seminar','Research Scholar Seminars','NULL','dsds','dadas','saddsa','sd','dsasd','2024/03/21 19:00','2024-03-21','','sww','wsds','dsd','sdd','-web confernce link','','',1,'2024-03-21 09:49:08','Active'),(44,'seminar','Research Scholar Seminars','NULL','dsds','dadas','saddsa','sd','dsasd','2024/03/21 19:00','2024-03-21','','sww','wsds','dsd','sdd','-web confernce link','','',1,'2024-03-21 09:52:41','Active'),(45,'seminar','Research Scholar Seminars','NULL','dsds','dadas','saddsa','sd','dsasd','2024/03/21 19:00','2024-03-21','','sww','wsds','dsd','sdd','-web confernce link','','',1,'2024-03-21 10:05:53','Active'),(46,'seminar','Research Scholar Seminars','NULL','dsds','dssad','sdsda','dsds','sds','2024/03/21 19:00','2024-03-21','yes','ddsd','sdsd','sdds','dsds','-web confernce link','','',1,'2024-03-21 10:06:40','Active'),(47,'','Best Paper Award',NULL,'sa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'dd','dsa','dsd','',NULL,NULL,0,'2024-03-21 10:20:13','default_value'),(48,'','Circular',NULL,'eder',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'rr','rer','rere','',NULL,NULL,0,'2024-03-21 10:21:20','default_value'),(49,'','Citation',NULL,'thyfdyt',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'ytyt','yty','ytyt','yty',NULL,NULL,0,'2024-03-21 10:23:53','default_value'),(50,'','Closure of Gate',NULL,'ewwe',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'weew','ew','ew','ewe',NULL,NULL,0,'2024-03-21 10:36:37','default_value'),(51,'','Invitation',NULL,'qwq',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wqw','wqqw','wqqw','',NULL,NULL,0,'2024-03-21 10:38:53','default_value'),(52,'','Citation',NULL,'cddf',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'df','fdfd','fddf','fddf',NULL,NULL,0,'2024-03-21 10:45:46','default_value'),(53,'','Best Article Award',NULL,'ssa',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'asa','asas','aa','',NULL,NULL,0,'2024-03-21 10:49:39','default_value'),(54,'','Shaastra','asa','saa',NULL,NULL,NULL,NULL,'2024/03/21 21:00',NULL,NULL,'sSA','','sad','sA','SA','','',NULL,'2024-03-21 05:33:46','Active'),(55,'','Shaastra','asa','saa',NULL,NULL,NULL,NULL,'2024/03/21 21:00',NULL,NULL,'sSA','','sad','sA','SA','','',NULL,'2024-03-21 05:33:56','Active'),(56,'','Classical Event','ddas','dsadsa',NULL,NULL,NULL,NULL,'2024/03/21 21:00',NULL,NULL,'sd','','dsds','ds','','','',NULL,'2024-03-21 05:43:19','Active'),(57,'','Classical Event','ddas','dsadsa',NULL,NULL,NULL,NULL,'2024/03/21 21:00',NULL,NULL,'sd','','dsds','ds','','','',NULL,'2024-03-21 05:43:30','Active'),(58,'','Closure of Gate',NULL,'wrqr',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'wr','ewrqr','rwqr','rwrw',NULL,NULL,0,'2024-03-21 11:14:41','default_value'),(59,'','Circular',NULL,'rre',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'rere','rere','wrre','',NULL,NULL,0,'2024-03-21 11:16:40','default_value');
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

-- Dump completed on 2024-03-22  8:00:01
