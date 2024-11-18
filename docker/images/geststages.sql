/*M!999999\- enable the sandbox mode */ 
-- MariaDB dump 10.19-11.5.2-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: bdd_geststages
-- ------------------------------------------------------
-- Server version	11.5.2-MariaDB-ubu2404

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*M!100616 SET @OLD_NOTE_VERBOSITY=@@NOTE_VERBOSITY, NOTE_VERBOSITY=0 */;

CREATE DATABASE bdd_geststages ;
USE bdd_geststages ;

--
-- Table structure for table `classe`
--

DROP TABLE IF EXISTS `classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classe` (
  `num_classe` int(32) NOT NULL AUTO_INCREMENT,
  `nom_classe` varchar(128) NOT NULL,
  PRIMARY KEY (`num_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classe`
--

LOCK TABLES `classe` WRITE;
/*!40000 ALTER TABLE `classe` DISABLE KEYS */;
INSERT INTO `classe` VALUES
(1,'SIO1-SLAM'),
(2,'SIO2-SLAM'),
(3,'CG1'),
(4,'CG2'),
(5,'AM1'),
(6,'AM2'),
(7,'NRC1'),
(8,'NRC2'),
(9,'SN1'),
(10,'SN2'),
(11,'SIO1-SISR'),
(12,'SIO2-SISR');
/*!40000 ALTER TABLE `classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `entreprise` (
  `num_entreprise` int(32) NOT NULL AUTO_INCREMENT,
  `raison_sociale` varchar(128) NOT NULL,
  `nom_contact` varchar(128) DEFAULT NULL,
  `nom_resp` varchar(128) DEFAULT NULL,
  `rue_entreprise` varchar(128) DEFAULT NULL,
  `cp_entreprise` int(32) DEFAULT NULL,
  `ville_entreprise` varchar(128) NOT NULL,
  `tel_entreprise` varchar(32) DEFAULT NULL,
  `fax_entreprise` varchar(32) DEFAULT NULL,
  `email_entreprise` varchar(128) DEFAULT NULL,
  `observation` text DEFAULT NULL,
  `site_entreprise` varchar(128) DEFAULT NULL,
  `niveau` varchar(32) NOT NULL,
  `en_activite` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`num_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `entreprise`
--

LOCK TABLES `entreprise` WRITE;
/*!40000 ALTER TABLE `entreprise` DISABLE KEYS */;
INSERT INTO `entreprise` VALUES
(1,'Webzine Maker (Campusplex)','Antoine Dupont','Antoine Dupont','12 Rue Général Fiorella',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','test@caca.fr',NULL,'http://www.wmaker.net/','BAC+1/BAC+2',1),
(2,'DuoApps (Campusplex)','Bernard Jean','Bernard Jean','12 Rue Général Fiorella',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.duoapps.com/','BAC+1/BAC+2',1),
(3,'Ollandini','Etienne Jacques','Gilbert Durand','1 Rue Paul Colonna d\'Istria',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.ollandini.fr/','BAC+2',1),
(4,'Conseil Départemental de la Corse du Sud','Juliette André','Juliette André','4 Cours Napoléon',20183,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.cg-corsedusud.fr','BAC+1/BAC+2',1),
(5,'Communauté d\'Agglomération du Pays Ajaccien (CAPA)','Pierre Paul','Pierre Paul','18 rue Comte de Marbeuf',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.ca-ajaccien.fr/','BAC+1/BAC+2',1),
(6,'Centre Hospitalier Miséricorde','Gerard Blanc',NULL,'Av Impératrice Eugénie',20303,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'Bac+1/Bac+2',1),
(7,'IPC - Informatique Professionnelle Corse','Elisabeth Dubreuil','Elisabeth Dubreuil','Parc San Lazaro - Av Napoléon III',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.ipc-corse.com','Bac+1/Bac+2',1),
(8,'La Poste - Centre financier d\'Ajaccio','Pierre Roger',NULL,'22 avenue du Colonel Colonna d\'Ornano',20090,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1/BAC+2',1),
(9,'Conseil Départemental de la Corse du Sud','Jacques Antoine',NULL,'8 Cours général Leclerc',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.cg-corsedusud.fr','BAC+1',1),
(10,'IRA de Bastia','Jean Lurat','Jean Lurat','Quai des Martyrs de la Libération',20200,'Bastia','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'https://www.ira-bastia.fr','BAC+1/BAC+2',1),
(11,'ARS - Agence Régionale de la Santé','Marie Gibe',NULL,'Route Saint-Joseph',20090,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.ars.corse.sante.fr/Internet.corse.0.html','BAC+1/BAC+2',1),
(12,'Lycée Montesoro','Alexandre Aed',NULL,'rue de la 4éme DMM',20200,'Bastia','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1/BAC+2',1),
(13,'Rectorat de Corse','Paule André','Le Recteur','Bd Pascal Rossini',20192,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.ac-corse.fr','BAC+1/BAC+2',1),
(14,'EDF - SEI Centre de Corse','Hugo Milau',NULL,'2 Avenue Impératrice Eugénie',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1/BAC+2',1),
(15,'France 3 Corse Via Stella','Jean Tele',NULL,'8 Rue André Touranjon',20700,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1/BAC+2',1),
(16,'CCI  Corse du Sud','Sophie Bato',NULL,'Gare maritime',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.2a.cci.fr','BAC+2',1),
(17,'Conseil Départemental de la Corse du Sud','Albert Dupont','Edith Robe','8 Cours général Leclerc',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.cg-corsedusud.fr','BAC+2',1),
(18,'SARL OCTAEDRA','Julie Resp','Julie Resp','Route du Vazzio pont du Ricanto',20090,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.aria-tourisme.com','BAC+1/BAC+2',1),
(19,'ESI-DGFIP d\'Ajaccio','Didier Tresor',NULL,'Immeuble Castellani Saint-Joseph',20090,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1/BAC+2',1),
(20,'Rocca Transport','Bruno Trans',NULL,'ZI Baleone',20501,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.rocca-transports.fr','BAC+1/BAC+2',1),
(21,'EDF Corse','Christophe Elec',NULL,'2 Avenue Impératrice',20174,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1',1),
(22,'PIC Informatique','Paul Pic','Paul Pic','Immeuble LOGOS, Avenue du mont Thabor',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1',1),
(23,'Servitec Calvi','Pierre Henriet',NULL,'Lieu-Dit Campo Longo, Route de Calenzana',20260,'Calvi','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1',1),
(24,'ARS - Agence Régionale de la Santé','Albert Mirou',NULL,'Route Saint-Joseph',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.ars.corse.sante.fr/Internet.corse.0.html','BAC+1',1),
(25,'Crédit Agricole','Paul Paul',NULL,'1 Avenue Napoléon III',20090,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1/BAC+2',1),
(26,'Raffalli Travaux Publics','Lucien Turin',NULL,'Zone Industrielle Caldaniccia',20167,'Sarrola-Carcopino','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,NULL,'BAC+1/BAC+2',1),
(27,'Centre Hospitalier de Bastia','Michel Oliver',NULL,'Bastia',20600,'Bastia','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.ch-bastia.fr/','BAC+1/BAC+2',1),
(28,'CTC - Collectivité Territoriale de Corse','Pierre Valert',NULL,'Service Recherche 22 cours Grandval',20187,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.corse.fr','BAC+1',1),
(29,'CTC - Collectivité Territoriale de Corse','Lucie Dupond',NULL,'Service SIG - 22 cours Grandval',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.corse.fr','BAC+1/BAC+2',1),
(30,'CTC - Collectivité Territoriale de Corse','Jean-Pierre Moulin',NULL,'DSI - 22 cours Grandval',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.corse.fr','BAC+1/BAC+2',1),
(31,'GIRTEC','Louise Map',NULL,'28 cours Grandval',20000,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.cg-corsedusud.fr/collectivite-departementale/ses-partenaires/le-girtec/','BAC+1/BAC+2',1),
(32,'SAGES Informatique','Alain Ged',NULL,'Lieu-dit Pernicaggio, ZA de la Caldaniccia',20167,'Sarrola-Carcopino','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.sages-informatique.com','BAC+1/BAC+2',1),
(33,'Nextiraone','Edouard Network',NULL,'Chemin de Pietralba',20090,'Ajaccio','01 02 03 04 05','01 02 03 04 05','contact@infos.fr',NULL,'http://www.nextiraone.fr/fr/home','BAC+1/BAC+2',1);
/*!40000 ALTER TABLE `entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `etudiant`
--

DROP TABLE IF EXISTS `etudiant`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `etudiant` (
  `num_etudiant` int(32) NOT NULL AUTO_INCREMENT,
  `nom_etudiant` varchar(64) NOT NULL,
  `prenom_etudiant` varchar(64) NOT NULL,
  `annee_obtention` year(4) DEFAULT NULL,
  `login_etudiant` varchar(8) NOT NULL,
  `mdp_etudiant` varchar(60) NOT NULL,
  `num_classe` int(32) NOT NULL,
  `en_activite` tinyint(1) NOT NULL DEFAULT 1,
  PRIMARY KEY (`num_etudiant`),
  KEY `num_classe` (`num_classe`),
  CONSTRAINT `etudiant_ibfk_1` FOREIGN KEY (`num_classe`) REFERENCES `classe` (`num_classe`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `etudiant`
--

LOCK TABLES `etudiant` WRITE;
/*!40000 ALTER TABLE `etudiant` DISABLE KEYS */;
INSERT INTO `etudiant` VALUES
(8,'Bentot','Pascal',NULL,'benpas01','$2y$10$gVn6/DVR0JiVPDqTp418bucY/oFd.oxHYGoLn4vlBcAZvtS0F.iSO',1,1),
(11,'Tusseau','Louis',NULL,'tuslou01','$2y$10$HandtWZ/Kc63JV..X9esp.4uWTOokD.MEUTShCSB1gKhsMmiD6pJa',2,1),
(12,'Finck','Jacques',NULL,'finjac01','$2y$10$eArF1nadAzsEWXkFm5USpej/7q1hffXdPbJeyyAU/GtzJop8ProCO',1,1),
(14,'Andre','David',NULL,'anddav01','$2y$10$nyYGl2NhhQb424q6Af4SWejsS/9IivWkO3m6G4c6QBH1BFXyPN5HC',2,1),
(15,'Bedos','Christian',NULL,'bedchr01','$2y$10$R6Fdkb/vBEf.lqXN7Twm0.GoJ6CISUxCzgv62.jnjuuvibSb5R1fO',2,1),
(16,'Cadic','Eric',NULL,'caderi01','$2y$10$sKLUEDlcQItEUkx18hULWO4rAuCad7m.kClS6NOVxol31Q08CRojq',3,1),
(17,'Desmarquest','Nathalie',NULL,'desnat01','$2y$10$ozAkQUY4AEXy5LYnWQGDTugYHTZ1TNSehs.qCxnMIaElZ2ANb67T6',3,1),
(18,'Desnost','Pierre',NULL,'despie01','$2y$10$A6OCvsBQP5QJzcWfCj5J/uUG4WAvx2EVHsaNMAEXjZRR0/k4.OMrK',4,1),
(19,'Eynde','Valérie',NULL,'eynval01','$2y$10$GHfg/12nDNPOncI3ullKhe1XtFf6v/sicBH/9jRkzsi4OUm.3kPXG',4,1),
(20,'Frémont','Fernande',NULL,'frefer01','$2y$10$MKj84NkYM5wiM/T1.mpby.0iv9D5ssylfDuI.TNjjyls/AjTSh5se',5,1),
(21,'Guest','Alain',NULL,'gueala01','$2y$10$nn8fYT43OYuyr4.G/HAM4u8lWfjEmfetzFX1u0vVYptOdsstDERwC',5,1),
(22,'Bioret','Luc',NULL,'bioluc01','$2y$10$aAEn857MKH5KtlmG0aEIF.vpRvwCz7uS4Q27lSoZMRau7TndAS7vu',6,1),
(23,'Bunisset','Denise',NULL,'bunden01','$2y$10$vYQaskAiE.k4Lk6fJhttVOoE2dv39y7lSHZK4EYhY220wNST.Sp3S',6,1),
(24,'Bunisset','Francis',NULL,'bunfra01','$2y$10$E1fA0052B2yjPNx.Tp/gPuUcdluFos859WrKI7VdOyhEa9XMgevkC',7,1),
(25,'Villechane','Louis',NULL,'villou01','$2y$10$tgIQ//zQpGJyCTisf9l8ReWCgX4RsD5b4kMNCDaLFe4yA6pO4ABSm',7,1),
(26,'De','Philippe',NULL,'de_phi01','$2y$10$sg1szZ0LCAiKSw.xR1EZf./5XnwarJLdLxybAFtVr5hDo46ZbUxMW',8,1),
(27,'Debelle','Michel',NULL,'debmic01','$2y$10$pRHF9qSndVp0suK6uJ4HaOepkxNpYEZuOBMCZaq9/pzh6CZZfvdNy',8,1),
(28,'Debelle','Jeanne',NULL,'debjea01','$2y$10$veG0hF1EYw0FgoO7KtSUkOje7gvZPp3PjvHDwfD.IF.VkO5Ytzku.',9,1),
(29,'Cottin','Vincenne',NULL,'cotvin01','$2y$10$LJuhO2ou7u3epUDn6qNdf.NnLh3pvX/xLBmQ4JokKUWvi95cRpY7e',9,1),
(30,'Charoze','Catherine',NULL,'chacat01','$2y$10$UwdnSiNf9NbeBRe5vOicUOMfE9OmOtXCfb.IOZojlUhTXzpBW/z6u',10,1),
(31,'Cacheux','Bernard',NULL,'cacber01','$2y$10$4TADQWL292iz7qT03sDDm.s0/AvZ8gTewJ0NgDazUkm3PqVeiLGO2',10,1),
(32,'Dupond','Jean',NULL,'dupjea01','$2y$10$Z1aay8QWDxbFMnlCqaalFe.V2kLhw3fs90Y1DYrux8PnX0UqL3f16',11,1),
(33,'Durand','Simon',NULL,'dursim01','$2y$10$MuieyPMwUhmqT3JVCLNYkOn1ltoGI22Pd1Dl9mQJosVsBDW/OPAym',11,1),
(34,'Leroy','Edouard',NULL,'leredo01','$2y$10$M14U7DGIcUawes/4KwSdfuXRW3f6/p/J3wMqVixi9O2GNFF.wsmjq',12,1),
(35,'Duval','Eric',NULL,'duveri01','$2y$10$J815nviu/0C6HeDuF9FLIeelANC.3NUs/qyonq2IDbzkCZLzj6ZXm',12,1);
/*!40000 ALTER TABLE `etudiant` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mission`
--

DROP TABLE IF EXISTS `mission`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mission` (
  `num_mission` int(32) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) NOT NULL,
  `num_stage` int(32) NOT NULL,
  PRIMARY KEY (`num_mission`),
  KEY `num_stage` (`num_stage`),
  CONSTRAINT `mission_ibfk_1` FOREIGN KEY (`num_stage`) REFERENCES `stage` (`num_stage`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mission`
--

LOCK TABLES `mission` WRITE;
/*!40000 ALTER TABLE `mission` DISABLE KEYS */;
INSERT INTO `mission` VALUES
(1,'Découverte de l\'entreprise',1),
(2,'Prise en main de l\'outil de versioning',1),
(3,'Développement d\'un plugin de type Wordpress pour le CMS de l\'entreprise',1),
(4,'Découverte de l\'entreprise',3),
(5,'Analyse et mise à jour de la documentation technique de l\'application \"appProj\"',3),
(6,'Découverte de l\'entreprise',5),
(7,'Prise en main de l\'API \"comJSON\"',5);
/*!40000 ALTER TABLE `mission` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `prof_classe`
--

DROP TABLE IF EXISTS `prof_classe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `prof_classe` (
  `num_prof` int(32) NOT NULL,
  `num_classe` int(32) NOT NULL,
  `est_prof_principal` tinyint(1) NOT NULL,
  PRIMARY KEY (`num_prof`,`num_classe`),
  KEY `num_classe` (`num_classe`),
  CONSTRAINT `prof_classe_ibfk_1` FOREIGN KEY (`num_prof`) REFERENCES `professeur` (`num_prof`),
  CONSTRAINT `prof_classe_ibfk_2` FOREIGN KEY (`num_classe`) REFERENCES `classe` (`num_classe`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `prof_classe`
--

LOCK TABLES `prof_classe` WRITE;
/*!40000 ALTER TABLE `prof_classe` DISABLE KEYS */;
INSERT INTO `prof_classe` VALUES
(1,1,1),
(1,2,0),
(2,1,0),
(2,2,1),
(3,1,0),
(3,2,0),
(5,3,1),
(5,4,0),
(6,3,0),
(6,4,1),
(7,3,0),
(7,4,0),
(8,5,1),
(8,6,0),
(9,5,0),
(9,6,1),
(10,5,0),
(10,6,0),
(11,7,1),
(11,8,0),
(12,7,0),
(12,8,1),
(13,7,0),
(13,8,0),
(14,9,1),
(14,10,0),
(15,9,0),
(15,10,1),
(16,9,0),
(16,10,0);
/*!40000 ALTER TABLE `prof_classe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `professeur` (
  `num_prof` int(32) NOT NULL AUTO_INCREMENT,
  `nom_prof` varchar(64) NOT NULL,
  `prenom_prof` varchar(64) NOT NULL,
  `login_prof` varchar(8) NOT NULL,
  `mdp_prof` varchar(60) NOT NULL,
  `email_prof` varchar(100) NOT NULL,
  PRIMARY KEY (`num_prof`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `professeur`
--

LOCK TABLES `professeur` WRITE;
/*!40000 ALTER TABLE `professeur` DISABLE KEYS */;
INSERT INTO `professeur` VALUES
(1,'Shavert','Anne-Lucie','shaann01','$2y$10$6V6rhN6F.OplFxUaUZdQbOjcs8PNrCmcOnup8wUG3QijC2DkBAR8W','shaann01@llb.fr'),
(2,'Gaudin','Jules','gaujul01','$2y$10$INytexAdxsj0Qs0Xa3BC6.EXVLddu1lsyr45DnK9WA30H3ull2vfi','gaujul01@llb.fr'),
(3,'Zerbib','Gilles','zergil01','$2y$10$2wdrjApcSO8RmH1Bpexyzu4PFNImgU7irMuSg2bbSxHs.C94xFxPe','zergil01@llb.fr'),
(5,'Di Conota','Prosper','di_pro01','$2y$10$8SUDX19jZNtrORA2cwkOnOKluqS7HNGNApvU4Kr37UnudZTFFjeFy','di_pro01@llb.fr'),
(6,'Ferdinand','Anne-Lucie','ferann01','$2y$10$KnMErt15U3lqDFtn2w4tjOEXPaFleDxJqiSvsuK2ScnP9MltH3od2','ferann01@llb.fr'),
(7,'Chamois','Andrew','chaand01','$2y$10$GOd8CH8HLkiXrDMBi8fFzeWmAZLy8zHNrgBIMiWalC5XR4V0i9DWi','chaand01@llb.fr'),
(8,'Lirevien','John','lirjoh01','$2y$10$VA8sm7NZROl61J9HGWwsNO4cpk8EyizE7LCc57OUyqUUQqTS9ssnW','lirjoh01@llb.fr'),
(9,'Fortin','François','forfra01','$2y$10$beg8ZjuVIxDFgIE3I3mh.uaG.qNe3wueLTtwFP2yil3/PUnUBR/36','forfra01@llb.fr'),
(10,'Segura','Irénée','segire01','$2y$10$tzMl4GhqI8NN426TQ4skDeJ8ZVnvUrqtCwdHFPF7OOfBKt5GO74yy','segire01@llb.fr'),
(11,'Pistache','Christophe','pischr01','$2y$10$eoKBS23MSisa7FtwK0u2Muh6MlMRSPbzRFlAZU2q2iEuvk70BkAZ2','pischr01@llb.fr'),
(12,'Cherioux','Aurèle','cheaur01','$2y$10$yZVPQezeVHZs.r8U5r8B7exvXndvcHL2PN7QV/HyFZrJ7AwGkBgEK','cheaur01@llb.fr'),
(13,'Certifat','Alice','cerali01','$2y$10$YK0bsFAPbPlJcU8Mp0Lr8O/96ljE527JL4afjmb5aqo3kgRtUGQgu','cerali01@llb.fr'),
(14,'Pastor','Camille','pascam01','$2y$10$vmusC2IbfiNAIxKTylEba.tav2oZPZJv0fgVJif5UFO/ziMH4uNm.','pascam01@llb.fr'),
(15,'Hansbern','Johnny','hanjoh01','$2y$10$vtrFipGxUHzrvBiGf0vLwuoXR9ch7bxtU2nWhurQuqIKb9ipCslaq','hanjoh01@llb.fr'),
(16,'Billahian','Andrée','biland01','$2y$10$fPyq4hAIul7tybTbKBJcauwmTYC4o273nscrKg/6t7CFQIx7dKVp.','biland01@llb.fr');
/*!40000 ALTER TABLE `professeur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `spec_entreprise`
--

DROP TABLE IF EXISTS `spec_entreprise`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `spec_entreprise` (
  `num_entreprise` int(32) NOT NULL,
  `num_spec` int(32) NOT NULL,
  PRIMARY KEY (`num_entreprise`,`num_spec`),
  KEY `num_spec` (`num_spec`),
  CONSTRAINT `spec_entreprise_ibfk_1` FOREIGN KEY (`num_entreprise`) REFERENCES `entreprise` (`num_entreprise`),
  CONSTRAINT `spec_entreprise_ibfk_2` FOREIGN KEY (`num_spec`) REFERENCES `specialite` (`num_spec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `spec_entreprise`
--

LOCK TABLES `spec_entreprise` WRITE;
/*!40000 ALTER TABLE `spec_entreprise` DISABLE KEYS */;
INSERT INTO `spec_entreprise` VALUES
(1,1),
(2,1),
(3,1),
(4,1),
(5,1),
(15,1),
(16,1),
(18,1),
(19,1),
(22,1),
(24,1),
(26,1),
(29,1),
(31,1),
(32,1),
(1,2),
(3,2),
(5,2),
(6,2),
(7,2),
(8,2),
(9,2),
(10,2),
(11,2),
(12,2),
(13,2),
(14,2),
(16,2),
(17,2),
(20,2),
(21,2),
(23,2),
(25,2),
(27,2),
(28,2),
(30,2),
(33,2);
/*!40000 ALTER TABLE `spec_entreprise` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `specialite`
--

DROP TABLE IF EXISTS `specialite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `specialite` (
  `num_spec` int(32) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(128) NOT NULL,
  PRIMARY KEY (`num_spec`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `specialite`
--

LOCK TABLES `specialite` WRITE;
/*!40000 ALTER TABLE `specialite` DISABLE KEYS */;
INSERT INTO `specialite` VALUES
(1,'SLAM'),
(2,'SISR'),
(3,'AM'),
(4,'SN'),
(5,'CG'),
(6,'NRC');
/*!40000 ALTER TABLE `specialite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `stage`
--

DROP TABLE IF EXISTS `stage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `stage` (
  `num_stage` int(32) NOT NULL AUTO_INCREMENT,
  `debut_stage` datetime NOT NULL,
  `fin_stage` datetime NOT NULL,
  `type_stage` varchar(128) DEFAULT NULL,
  `desc_projet` text DEFAULT NULL,
  `observation_stage` text DEFAULT NULL,
  `num_etudiant` int(32) NOT NULL,
  `num_prof` int(32) NOT NULL,
  `num_entreprise` int(32) NOT NULL,
  PRIMARY KEY (`num_stage`),
  KEY `num_etudiant` (`num_etudiant`),
  KEY `num_prof` (`num_prof`),
  KEY `num_entreprise` (`num_entreprise`),
  CONSTRAINT `stage_ibfk_1` FOREIGN KEY (`num_etudiant`) REFERENCES `etudiant` (`num_etudiant`),
  CONSTRAINT `stage_ibfk_2` FOREIGN KEY (`num_prof`) REFERENCES `professeur` (`num_prof`),
  CONSTRAINT `stage_ibfk_3` FOREIGN KEY (`num_entreprise`) REFERENCES `entreprise` (`num_entreprise`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `stage`
--

LOCK TABLES `stage` WRITE;
/*!40000 ALTER TABLE `stage` DISABLE KEYS */;
INSERT INTO `stage` VALUES
(1,'2015-07-13 00:00:00','2016-08-31 00:00:00','alternance','Apprentissage sur 1 ans.</br>\r\nParticipation aux différents projets de l\'entreprise.</br>\r\nDéveloppement et maintenance de plugins.',NULL,8,2,1),
(3,'2016-01-11 00:00:00','2016-02-19 00:00:00','stage','Mise à jour de la documentation des applications métiers de l\'entreprise.\r\nDéveloppement d\'un module d\'authentification.',NULL,11,1,4),
(5,'2017-01-08 00:00:00','2017-02-17 00:00:00','stage','Evolution de l\'application de gestion de projets utilisée par l\'entreprise.<br/>\r\nParticipation à l\'assistance utilisateur pour les divers logiciels développés en interne.',NULL,11,2,5);
/*!40000 ALTER TABLE `stage` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*M!100616 SET NOTE_VERBOSITY=@OLD_NOTE_VERBOSITY */;

-- Dump completed on 2024-11-11 11:21:10
