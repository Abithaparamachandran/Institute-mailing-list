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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seminarorg`
--

LOCK TABLES `seminarorg` WRITE;
/*!40000 ALTER TABLE `seminarorg` DISABLE KEYS */;
INSERT INTO `seminarorg` VALUES (1,'seminar','Colloquium','NULL','Uncovering the \'hidden\' structural order in dense liquids and glasses','Prof. Rajesh Ganapathy','Rajesh Ganapathy obtained his M.Sc. in Physics from IITM in 1999. He worked for a year in the Laundry Cleaning Department (fondly called \'Dhobi Ghat\' ) at the Hindustan Unilever Research Centre in Bangalore, where he worked on optimizing the formulation of Surf detergent. This is also where he gained his first formal exposure to soft matter. From 2000-2006, he was a Ph.D. student in Ajay Sood\'s lab at the Dept. of Phys. Indian Institute of Science, Bangalore. He was a postdoctoral fellow at Cornell from 2007-2009. He has been at JNCASR since 2009. Rajesh\'s research interests span colloidal and granular liquids, crystals, and glasses, active matter, shear-induced transitions, condensed matter on non-Euclidean surfaces, surface growth, and stochastic heat engines.','International Centre for Materials Science, Jawaharlal Nehru Centre for Advanced Scientific Research','Physics','2024/04/03 16:30','2024-04-03','','HSB 209 (Physics Seminar Hall)','The conventional wisdom is that liquids are completely disordered and lack nontrivial structure beyond nearest-neighbor distances. Using colloidal suspensions as a model system to probe the structure and dynamics of liquids and glasses in real space and at single-particle resolution, I will present experimental findings that upend this view and reveal that the structural order in these systems is, in fact, unusually rich. In the first part of my talk, I will briefly describe experiments where we will use machine-learning techniques to show that the structure hidden in a glass decides its stability against crystallization [1]. In the second part of my talk, using a recently introduced four-point correlation function, we will show that colloidal liquids have a highly nontrivial structure comprising alternating layers with icosahedral and dodecahedral order that grows with supercooling and governs the particle dynamics [2, 3].\r\n\r\n[1] D. Ganapathi, D. Chakraborti, A. K. Sood & R. Ganapathy, Nat. Phys. 17, 114 (2021)\r\n[2] N. Singh, Z. Zhang, A. K. Sood, W. Kob & R. Ganapathy, Proc. Natl. Acad. of Sci. U.S.A. 19, e2300923120 (2023)\r\n[3] K. Mishra, R. Ganapathy & W. Kob (manuscript in preparation, 2024)\r\n','Prabha Mandayam','prabhamd@physics.iitm.ac.in','Tea and Cake at 4:15pm!-web confernce link','','',1,'2024-04-03 06:12:38','Active'),(2,'seminar','Viva Voce','NULL','Page Curves, Black Hole Information Paradox and Self-supporting Wormholes in Various Spacetime Scenarios','Mr. ANKIT ANAND, (PH18D045)','PhD Scholar, Department of Physics, IIT Madras','Guide: Dr. PRASANTA KUMAR TRIPATHY ','Department of Physics, IIT Madras','2024/04/10 12:00','2024-04-10','yes','https://meet.google.com/jdu-dqub-ofr','This thesis examines the recent advancements in comprehending entanglement islands\r\nand the traversability of wormholes.\r\n\r\n\r\nIn the first part, we demonstrate the notion of an entanglement island and its consequences\r\nfor the black hole information paradox in various spacetime scenarios. The quantum\r\nextremal island method investigates the information paradox within lower-dimensional\r\nGaussâ€“Bonnet gravity, specifically focusing on a three-dimensional EGB black hole.\r\nAlso, we employ the island prescription to explore the information paradox within\r\nnon-AdS spacetime, specifically in the context of warped Anti-de Sitter black holes. We\r\nare examining eternal black holes which do not undergo evaporation. These black holes\r\nare connected to an external reservoir, facilitating the radiation reaching the boundary.\r\nThrough this process black holes can completely evaporate and disappear. The results\r\nindicate that initially, the entanglement entropy of Hawking radiation exhibits a linear\r\ngrowth with time, eventually becoming unbounded later. However, when accounting for\r\nthe emergence of an island later and just beyond the event horizon, the growth in the\r\nentanglement entropy of Hawking radiation stabilizes at a constant value. This constant\r\nvalue is precisely twice the Bekenstein-Hawking entropy. We also examine the Page time\r\nand the Scrambling time and their dependence on the Gauss-Bonnet coupling.\r\n\r\n\r\nIn the second part, we examine a quantum field propagating within a spacetime generated\r\nby a specific Z2 quotient of the BTZ black hole. We investigate how the presence of the\r\nmatter field influences the spacetime geometry, considering linear perturbations in the\r\nmetric. The exact computation of the expectation value of the stress-energy tensor is\r\nachievable by evaluating its pull-back onto the covering space. By selecting appropriate\r\nboundary conditions for the quantum field along a non-contractible cycle of the quotient\r\nmanifold, it becomes feasible to achieve a negative average energy along a null geodesic,\r\nforming a traversable wormhole.\r\n','HoD Office','phoffice@zmail.iitm.ac.in','-web confernce link','','',1,'2024-04-03 06:19:05','Active'),(3,'seminar','Research Proposal Seminars','NULL','\"Carbone [(L)2C(0)] Based Complexes Towards Dinitrogen Activation and Catalysisâ€','Ms. Madhuri Bhattacharya (CY21D094)','Ph.D Research Scholar, Department of Chemistry','Guide- Dr. Kartik Chandra Mondal, Department of Chemistry','Department of Chemistry','2024/04/08 15:00','2024-04-08','yes','CB310, Seminar Hall','Nitrogen fixation by the reduction of N2 to NH3 is a requisite transformation for life. This can be done on a vast scale by the industrial Haberâ€“Bosch (HB) process using Mittasch catalyst at very high temperature (300ËšC) and pressure (100 bar), but in nature by nitrogenase enzymes present in certain micro-organisms under ambient conditions. Researchers have attempted to mimic nitrogenase, but due to the complex mechanism of N2 activation and inertness of N2, have met with limited success[1]. \r\nFor N2 activation, metalâ€“N Ï€-backbonding plays a crucial role. Higher the electron density on the metal, higher will be the backbonding. In this regard, carbone [(L)2C(0)] having two lone pairs of electrons, is a strong Ïƒ- and Ï€-donor ligand enhancing the electron density on the metal. Now carbodiphosphorane (CDP) is a particular type of carbone where L = phosphine. Although there are several works on expensive late transition metal and coinage metal carbone complexes[2]; early transition metal (Fe, Co, Ni) complexes, which are comparably cheaper, remain challenging to synthesis due to instability. Here I will be proposing different CDP ligands based 3d-transition metal complexes which can be implemented for N2 binding as expected from the theoretical calculations done by our group. Such strong electron donor ligands can stabilise coordinatively unsaturated metal centers, promoting catalysis[3]. In this seminar, an extensive presentation of carbodiphosphorane chemistry and itâ€™s metal complexes synthesized to date will be discussed, followed by my work done and the future perspective.\r\n\r\nReferences:\r\n1.	Anderson, J. S.; Rittle, J.; Peters, J. C. Nature 2013, 501, 84-87.\r\n2.	Zhao, L.; Chai, C.; Petz, W. Frenking, G. Molecules 2020, 25, 4943.\r\n3.	Klein, M.; Sundermeyer, J. Organometallics, 2021, 40, 2090-2099.\r\n\r\n\r\n','CY Office','cyoffice@zmail.iitm.ac.in','ALL ARE WELCOME-web confernce link','','',1,'2024-04-03 07:16:47','Active'),(4,'seminar','Research Proposal Seminars','NULL','\"Organocatalytic Asymmetric Cascade Annulation: Expedient Approach towards Fused Carbocycles and Heterocyclesâ€','Ms. Swati Lekha Mondal (CY20D033)','Ph.D Research Scholar, Department of Chemistry','Guide-Prof. Md Mahiuddin Baidya, Department of Chemistry','Department of Chemistry','2024/04/08 16:00','2024-04-08','yes','CB310, Seminar Hall','The construction of carbonâˆ’carbon bonds, along with the creation of stereogenic carbon centers, is fundamental in organic synthesis and has provision to make optically active molecules, garnering increasing attention from the synthetic community.1-8 In this context, cascade annulation strategies are exceptionally valuable, endorsing sustainable organic synthesis by emphasizing step-economy and atom-economy principles. Over the past decade the research area involving organocatalytic cascade annulation has rapidly grown to become a third pillar of asymmetric catalysis standing next to metal and biocatalysis.4-7 In this seminar asymmetric organocascade annulation strategies, particularly those involving secondary amine-based catalysis, such as enamine catalysis and iminium catalysis, will be discussed.  Subsequently, a research proposal will be presented for future work.\r\n\r\nReferences:\r\n1)	Chauhan, P.; Mahajan, S.; Enders, D. Acc. Chem. Res. 2017, 50, 2809â€“2821.\r\n2)	Wang, N.; Wu, Z.; Wang, J.; Ullah, N.; Lu, Y.  J. Chem. Soc. Rev. 2021, 50, 9766â€“9793.\r\n3)	Volla, M.R.C.; Atoderesei, I.; Rueping, M.  Chem. Rev., 2014, 114, 2390âˆ’2431. \r\n4)	Halland, N.; Abruel, S.P.; Jorgensen, K.A.; Angew. Chem. Int. Ed. 2004, 43, 1272â€“1277.\r\n5)	Wang, C.; Mukanova, M.; Enders, D.; Chem. Commun. 2010, 46, 2447â€“2449.\r\n6)	Cassini, C.; Tian, X.; Adan, E.C.E.; Melchoirre. P. Chem. Commun. 2011, 47, 233â€“235.\r\n7)	Ramakrishna, I.; Ramaraju, P.; Baidya, M. Org. Lett. 2018, 20, 1023â€“1026. \r\n8)	 Mondal, S. L.; Bhajammanavar, V.; Ramakrishna, I.; Baidya, M. Chem. Commun. 2023, 59, 13211â€“13214.\r\n\r\n\r\n','CY Office','cyoffice@zmail.iitm.ac.in','ALL ARE WELCOME-web confernce link','','',1,'2024-04-03 07:33:55','Active'),(5,'seminar','Research Scholar Seminars','NULL','\"A comprehensive study of macroscopic pedestrian flow models with applications to flood and smoke - induced evacuation\"','Mr. Somnath Maity,  MA16D201','Research Scholar, Department of Mathematics, IITM.','DC Members: Dr. A. J. Shaiju / Dr. Y.V.S.S.Sanyasiraju / Dr. Kamaraj M (MM).\r\n Guide: Dr. S.Sundar \r\nCo - Guide: Dr. Joerg Kuhnert -(Germany)\r\nDC Chairperson: Dr. Vetrivel .V','DEPT. OF MATHEMATICS','2024/04/15 16:00','2024-04-15','yes','NAC 503, 5th Floor','','Maths Office','maoffice@iitm.ac.in','Research Colloquium (II-Seminar)-web confernce link','','',1,'2024-04-03 08:14:24','Active'),(6,'','Symposium',NULL,'The Inaugural Mobility Summit and Launch of Mobility and Intelligent Transportation Collaborative',NULL,NULL,NULL,NULL,NULL,NULL,'Yes',NULL,'The Inaugural Mobility Summit \r\n(Mobility and Intelligent Transportation [MInT] Collaborative)\r\nShri Neeraj Mittal IAS, Secretary, Department of Telecommunications, Government of India to be the Chief Guest\r\nProf. Mahesh Panchagnula, Dean (Alumni and Corporate Relations), IIT Madras to address the meeting\r\nTIME: 5 PM\r\nDAY & DATE: Thursday, 4th April 2024\r\nVENUE: TTJ Auditorium, ICSR Building, IIT Madras Campus\r\n\r\nWe look forward to your esteemed presence \r\n\r\nABOUT THE EVENT: MInT collaborative is a global initiative to build mobility digital infrastructure, an R&D portfolio and a skilled workforce to develop breakthrough mobility solutions to realize Sustainable Development Goals (SDG’s), such as Sustainable Transport, Accident Prevention and Energy Efficiency. \r\nThe MInT collaborative is based on the principle of “collaborate and compete” as we bring industry competitors, government agencies and academic innovators to the same table and co-create the mobility digital infrastructure (Bharat Multi-Modal Mobility Stack, BM3S) to enable holistic system solutions. \r\nThe inaugural summit will formally launch the MInT collaborative with keynotes from leading personalities such as Dr. Neeraj Mittal (Secretary, DoT), Prof. Chandra Bhat (UT Austin) and Prof. Hari Balakrishnan (MIT). Also, the summit will bring together industry, NGOs and academicians into a roundtable discussion on a) Mobility Challenges and SDG and b) Digital technologies for Mobility solutions. \r\n\r\nPlease register here: https://forms.gle/dzWRqiT9Um8Z8f1j9\r\n','Gitakrishnan Ramadurai','gitakrishnan@iitm.ac.in','',NULL,NULL,0,'2024-04-03 08:35:08','default_value'),(7,'seminar','Technical Talk','NULL','On travel behaviour modelling using emerging data sources and Casting a Long Shadow: The Role of Long Distance Travel in Carbon Emissions from Passenger Travel Passenger Travel','Charisma Choudhury and Zia Wadud','Charisma Choudhury is a Professor at the Institute for Transport Studies and School of Civil Engineering at the University of Leeds (UoL) where she leads the Choice Modelling Research Group. She also serves as the Deputy Director of the interdisciplinary Choice Modelling Centre, UoL.\r\n\r\nCharisma received her PhD from the Massachusetts Institute of Technology (MIT). In recognition of her doctoral research, she has received the Gordon Newell Best Dissertation Prize from the HKSTS and an Honourable Mention from the IATBR. Prior to joining UoL, she worked at the Bangladesh University of Engineering and Technology, MIT, RAND Europe and Cambridge Systematics. She has published over 70 papers on topics spanning driving behaviour, advanced choice modelling, machine learning, agent-based-modelling and transport issues in the global south. Her current research focuses on travel behaviour modelling using emerging big data sources. Research excellence in this area has enabled her to win the Facult','Institute for Transport Studies, Leeds','Civil Engineering','2024/04/04 11:30','2024-04-04','','Visweswaraya Seminar Hall BSB 368','','Gitakrishnan Ramadurai','gitakrishnan@iitm.ac.in','-web confernce link','','',1,'2024-04-03 08:44:06','Active'),(8,'','Citation',NULL,'trest',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'test','test','test','',NULL,NULL,0,'2024-04-03 11:09:03','default_value'),(9,'','Others',NULL,'Testing',NULL,NULL,NULL,NULL,NULL,NULL,'Yes',NULL,'Testing kindly ignore','Anandkumar S','sanand@iitm.ac.in','',NULL,NULL,0,'2024-04-03 11:13:45','default_value');
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

-- Dump completed on 2024-04-04  8:00:01
