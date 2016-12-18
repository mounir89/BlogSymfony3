-- MySQL dump 10.14  Distrib 5.5.52-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: db_blog_hmin302
-- ------------------------------------------------------
-- Server version	5.5.52-MariaDB-1ubuntu0.14.04.1

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
-- Table structure for table `article`
--

DROP TABLE IF EXISTS `article`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `article`
--

LOCK TABLES `article` WRITE;
/*!40000 ALTER TABLE `article` DISABLE KEYS */;
INSERT INTO `article` VALUES (2,'Fedora 22, Dell XPS 13 & hibernation','<div class=\"post-excerpt\"><p>&lt;Off topic&gt;<em>Le Mac addict est quelqu\'un d\'irrationnel: pour lui il\nn\'existe rien de mieux qu\'un Mac ! Un Mac est compatible avec 100% du matériel\n(oui, le Mac addict ne sais pas qu\'on peut acheter des choses ailleurs ','','0000-00-00 00:00:00','2016-11-08 09:11:59'),(3,'Dell XPS (2015), carte Intel i915 et kernel >= 4.6','<div class=\"post-excerpt\"><p>Depuis le passage de <a href=\"https://getfedora.org/fr/\" hreflang=\"fr\" title=\"\" data-original-title=\"Choisissez la liberté. Choisissez Fedora.\">Fedora</a> au <a href=\"https://fr.wikipedia.org/wiki/Noyau_de_syst%C3%A8me_d%27exp','','0000-00-00 00:00:00','2016-11-08 09:16:12'),(4,'Certificat Let\'s Encrypt configuré au top','<div class=\"post-excerpt\"><p>Dernièrement j\'ai dû, pour le compte d\'un client, faire une étude pour rendre un site <a href=\"https://nakedsecurity.sophos.com/2016/06/17/apple-ios-to-require-https-for-apps-by-january/\" hreflang=\"en\" title=\"\" data-original-t','','0000-00-00 00:00:00','2016-11-08 09:18:34'),(8,'Angular 2 TS','Bla bla bla Blo Blo blo','Web','2016-11-10 16:01:47','2016-11-10 15:35:14');
/*!40000 ALTER TABLE `article` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-11-17 15:48:21
