-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: sistema
-- ------------------------------------------------------
-- Server version	10.4.32-MariaDB

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
-- Current Database: `sistema`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `sistema` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `sistema`;

--
-- Table structure for table `asistencia`
--

DROP TABLE IF EXISTS `asistencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `asistencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(13) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `puesto` varchar(50) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `coordinador` varchar(50) NOT NULL,
  `hora_entrada` datetime NOT NULL,
  `hora_salida` datetime DEFAULT NULL,
  `foto` varchar(100) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` VALUES (2,1012,'0801-2021-98766','Claudia Maria','Giron Matute','Promotores','jjjjnkm','Norte','jhujhhuij','jhhjhihio','2024-10-10 08:40:00','2024-10-10 09:44:00','','Lat: 14.101207624110913, Lon: -87.18977139656884',1),(3,1015,'0988-7782-48282','Yugygygh','Uggyguhu','Promotores','jjjjnkm','Norte','jhujhhuij','jhhjhihio','2024-10-10 08:45:00','0000-00-00 00:00:00','','Lat: 14.101207624110913, Lon: -87.18977139656884',1),(5,1013,'0987-6273-73277','Blanca Maria','Gutierrez Perez','Promotores','jjjjnkm','Norte','jhujhhuij','jhhjhihio','2024-10-10 10:16:00','0000-00-00 00:00:00','','Lat: 14.101207624110913, Lon: -87.18977139656884',1),(6,1010,'0801-1992-08192','Alma Gissel','Carrasco Flores','Promotores','jjjjnkm','Centro Sur','jhujhhuij','ddddddddddddddd','2024-10-10 10:24:00','0000-00-00 00:00:00','','Lat: 14.101207624110913, Lon: -87.18977139656884',1),(9,1010,'0801-1992-08192','Alma Gissel','Carrasco Flores','Promotores','jjjjnkm','Occidente','jhujhhuij','ddddddddddddddd','2024-10-10 11:31:00','0000-00-00 00:00:00','','Lat: 14.101207624110913, Lon: -87.18977139656884',1),(11,1015,'0988-7782-48282','Yugygygh','Uggyguhu','Promotores','jjjjnkm','Norte','jhujhhuij','ddddddddddddddd','2024-10-11 15:49:00','0000-00-00 00:00:00','','Lat: 14.101208815485062, Lon: -87.18976896732751',1),(12,1015,'0988-7782-48282','Yugygygh','Uggyguhu','Promotores','jjjjnkm','Norte','jhujhhuij','ddddddddddddddd','2024-10-11 16:35:00','0000-00-00 00:00:00','','Lat: 14.101208815485062, Lon: -87.18976896732751',1),(13,1015,'0988-7782-48282','Yugygygh','Uggyguhu','Promotores','jjjjnkm','Norte','jhujhhuij','ddddddddddddddd','2024-10-11 16:48:00','0000-00-00 00:00:00','','Lat: 14.101208815485062, Lon: -87.18976896732751',1),(22,1014,'0801-1998-71234','Pedro Pablo','Zuniga Quiroz','Promotores','jjjjnkm','Centro Sur','jhujhhuij','ddddddddddddddd','2024-10-14 10:40:00','0000-00-00 00:00:00','','Lat: 14.101208630861906, Lon: -87.18977147829952',1),(28,1011,'0801-1987-87652','Marco Tulio','Espinoza Blandin','Promotores','jjjjnkm','Centro Sur','jhujhhuij','ddddddddddddddd','2024-10-14 13:57:00','0000-00-00 00:00:00','','Lat: 14.101208630861906, Lon: -87.18977147829952',1),(56,1010,'0801-1992-08192','Alma Gissel','Carrasco Flores','Promotores','dddddddddddddd','Occidente','ddddddddddd','dddddddddddd','2024-10-17 16:15:39','2024-10-17 16:16:14','','Lat: 14.0828, Lon: -87.2041',1),(57,1011,'0801-1987-87652','Marco Tulio','Espinoza Blandin','Promotores','wwwww','Centro Sur','ddddddddddd','dddddddddddd','2024-10-17 16:18:50','2024-10-17 16:19:31','','Lat: 14.0858, Lon: -87.203',1),(58,1012,'0801-2021-98766','Claudia Maria','Giron Matute','Promotores','dddddddddddddd','Norte','dddd','dddddddddddd','2024-10-17 16:24:26','2024-10-17 16:24:44','','Lat: 14.0828, Lon: -87.2041',1),(59,1013,'0987-6273-73277','Blanca Maria','Gutierrez Perez','Promotores','dasdsa','Norte','dsadasd','dddddddddddd','2024-10-17 16:25:39','2024-10-17 16:26:58','','Lat: 14.0826, Lon: -87.1674',1),(60,1014,'0801-1998-71234','Pedro Pablo','Zuniga Quiroz','Promotores','dddddddddddddd','Centro Sur','ddddddddddd','dddddddddddd','2024-10-17 16:29:08','2024-10-17 16:29:26','','Lat: 14.0858, Lon: -87.203',1),(61,1015,'0988-7782-48282','Yugygygh','Uggyguhu','Promotores','Hshw','Norte','Sbwbw','Benenw','2024-10-17 16:35:45','2024-10-17 16:36:46','','Nsbdb',1),(66,1014,'0801-1998-71234','Pedro Pablo','Zuniga Quiroz','Promotores','dddddddddddddd','Centro Sur','ddddddddddd','dddddddddddd','2024-10-18 11:14:53','2024-10-18 11:45:29','','Lat: 14.0828, Lon: -87.2041',1),(67,1013,'0987-6273-73277','Blanca Maria','Gutierrez Perez','Promotores','dddddddddddddd','Norte','ddddddddddd','dddddddddddd','2024-10-18 11:46:29','2024-10-18 11:55:03','','Lat: 14.0828, Lon: -87.2041',1),(70,1015,'0988-7782-48282','Yugygygh','Uggyguhu','Promotores','gfgf','Norte','ggfg','fggffgg','2024-10-18 14:30:59','2024-10-18 14:34:48','','fgfgfgfg',1),(71,1016,'0801-1999-88777','Eedrderd','Deded','Promotores','rrrrrrr','Norte','rrrrrr','rrrrrrrrrrr','2024-10-18 14:35:45','2024-10-18 14:46:25','','rrrrrrrrrr',1),(72,1012,'0801-2021-98766','Claudia Maria','Giron Matute','Promotores','dsdsds','Norte','dsdsdsd','sdsdsdsdsds','2024-10-18 15:22:54',NULL,'','czczxcxzczxcz',1),(73,1010,'0801-1992-08192','Alma Gissel','Carrasco Flores','Promotores','sasaS','Occidente','asASa','sASasa','2024-10-18 16:46:54',NULL,'default.png','SasaSasASas',1),(75,1011,'0801-1987-87652','Marco Tulio','Espinoza Blandin','Promotores','Ghh','Centro Sur','Vbbb','Vvvb','2024-10-18 16:52:04','2024-10-18 16:53:48','6712e69496977_17292918797408954536925788946893.jpg','Cvbbb',1),(79,1014,'0801-1998-71234','Pedro Pablo','Zuniga Quiroz','Promotores','wwqeqwewqee','Centro Sur','qweqweqwe','qweqweqweqw','2024-10-21 09:46:47',NULL,'671677674d0d1_forgot-password-frent-img.jpg','4R26+F3C, Tegucigalpa, Francisco MorazÃ¡n',1),(80,1015,'0988-7782-48282','Yugygygh','Uggyguhu','Promotores','wwqeqwewqee','Norte','qweqweqwe','qweqweqweqw','2024-10-21 10:06:02','2024-10-21 10:10:21','67167beaae3c6_6325247.jpg','4R26+F3C, Tegucigalpa, Francisco MorazÃ¡n',1),(86,1012,'0801-2021-98766','Claudia Maria','Giron Matute','Promotores','Hebebw','Norte','Bdndndn','Ndnwndd','2024-10-21 15:57:38',NULL,'6716ce529b26c_17295478015615281799936728878993.jpg','Jbwbsb',1),(91,1010,'0801-1992-08192','Alma Gissel','Carrasco Flores','Promotores','dddddddddddddd','Occidente','ddddddddddd','dddddddddddd','2024-10-21 16:23:14','2024-10-21 16:26:39','6716d452503f2_forgot-password-frent-img.jpg','Lat: 14.0828, Lon: -87.2041',1),(92,1012,'0801-2021-98766','Claudia Maria','Giron Matute','Promotores','dddddddddddddd','Norte','ddddddddddd','dddddddddddd','2024-10-22 08:16:50','2024-10-22 14:29:15','6717b3d2571f2_Claro-Logo.png','Lat: 14.0828, Lon: -87.2041',1),(93,1010,'0801-1992-08192','Alma Gissel','Carrasco Flores','Promotores','dddddddddddddd','Occidente','ddddddddddd','dddddddddddd','2024-10-22 09:56:36',NULL,'6717cb3471538_6325247.jpg','Lat: 14.101252, Lon: -87.189848',1),(94,1013,'0987-6273-73277','Blanca Maria','Gutierrez Perez','Promotores','ViralShower','Norte','Auronplays','DjMariio','2024-10-22 15:08:55',NULL,'67181467ef283_17296312540994365435416776569029.jpg','Lat: 14.1011709, Lon: -87.1899083',1),(95,1017,'0809-8877-77777','Hyugyfdwd','Wefewwdfw','Promotores','Viral','Norte','GymVirtual','Porcinos','2024-10-22 15:10:21',NULL,'671814bd3f234_Screenshot_20241021_165328_Instagram.jpg','Lat: 14.1011709, Lon: -87.1899083',1),(96,1014,'0801-1998-71234','Pedro Pablo','Zuniga Quiroz','Promotores','bmnnm','Centro Sur','bnnbvn','ncnccvc','2024-10-22 15:24:37','2024-10-22 15:26:11','67181815efa5e_forgot-password-frent-img.jpg','Lat: 14.0828, Lon: -87.2041',1);
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bitacora`
--

DROP TABLE IF EXISTS `bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bitacora` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FECHA` datetime NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_OBJETO` int(11) NOT NULL,
  `ACCION` varchar(20) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `TIPO` tinyint(4) DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_OBJETO` (`ID_OBJETO`),
  CONSTRAINT `bitacora_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `bitacora_ibfk_2` FOREIGN KEY (`ID_OBJETO`) REFERENCES `objetos` (`ID_OBJETOS`)
) ENGINE=InnoDB AUTO_INCREMENT=622 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bitacora`
--

LOCK TABLES `bitacora` WRITE;
/*!40000 ALTER TABLE `bitacora` DISABLE KEYS */;
INSERT INTO `bitacora` VALUES (1,'2025-01-06 16:02:13',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(2,'2025-01-06 16:02:32',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(402,'2025-01-06 16:25:07',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(403,'2025-01-08 09:52:16',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(404,'2025-01-08 09:56:05',1,2,'INGRESO','SE INGRESÓ A LA PANTALLA DE ASISTENCIAS',1),(405,'2025-01-08 09:56:09',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(406,'2025-01-08 10:00:16',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(407,'2025-01-08 10:02:19',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(408,'2025-01-08 10:02:39',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(409,'2025-01-08 10:03:49',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(410,'2025-01-08 10:04:04',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(411,'2025-01-08 10:05:23',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(412,'2025-01-08 10:05:33',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(413,'2025-01-08 10:09:41',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(414,'2025-01-08 10:09:59',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(415,'2025-01-08 10:11:37',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(416,'2025-01-08 10:13:13',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(417,'2025-01-08 10:13:23',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(418,'2025-01-08 10:13:58',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(419,'2025-01-08 10:14:00',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(420,'2025-01-08 10:14:25',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(421,'2025-01-08 10:14:42',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(422,'2025-01-08 10:14:46',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(423,'2025-01-08 10:15:37',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(424,'2025-01-08 10:15:56',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(425,'2025-01-08 10:18:53',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(426,'2025-01-08 10:19:55',8,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(427,'2025-01-08 10:20:03',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(428,'2025-01-08 10:20:13',8,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(429,'2025-01-08 10:20:23',8,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE PROMOTORES',1),(430,'2025-01-08 10:20:31',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(431,'2025-01-08 10:20:58',8,2,'INGRESO','SE INGRESÓ A LA PANTALLA DE ASISTENCIAS',1),(432,'2025-01-08 10:21:06',1,3,'INGRESO','SE INGRESÓ A LA PANTALLA ROLES',1),(433,'2025-01-08 10:21:08',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(434,'2025-01-08 10:21:17',1,3,'INGRESO','SE INGRESÓ A LA PANTALLA ROLES',1),(435,'2025-01-08 10:21:27',1,3,'INGRESO','SE INGRESÓ A LA PANTALLA ROLES',1),(436,'2025-01-08 10:21:31',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(437,'2025-01-08 10:21:58',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(438,'2025-01-08 10:22:20',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(439,'2025-01-08 10:28:40',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(440,'2025-01-08 10:40:52',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(441,'2025-01-08 10:46:38',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(442,'2025-01-08 10:51:17',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(443,'2025-01-08 10:51:26',8,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(444,'2025-01-08 10:51:29',8,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(445,'2025-01-08 10:51:41',8,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(446,'2025-01-08 10:59:32',8,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(447,'2025-01-08 10:59:35',8,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(448,'2025-01-08 11:00:03',8,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(449,'2025-01-08 11:12:39',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(450,'2025-01-08 11:15:08',1,2,'INGRESO','SE INGRESÓ A LA PANTALLA DE ASISTENCIAS',1),(451,'2025-01-08 11:15:30',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(452,'2025-01-08 11:15:36',1,2,'INGRESO','SE INGRESÓ A LA PANTALLA DE ASISTENCIAS',1),(453,'2025-01-08 11:15:52',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(454,'2025-01-08 11:23:33',1,2,'INGRESO','SE INGRESÓ A LA PANTALLA DE ASISTENCIAS',1),(455,'2025-01-08 11:24:05',1,2,'INGRESO','SE INGRESÓ A LA PANTALLA DE ASISTENCIAS',1),(456,'2025-01-08 11:24:12',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(457,'2025-01-08 11:28:16',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(458,'2025-01-08 11:28:21',1,2,'INGRESO','SE INGRESÓ A LA PANTALLA DE ASISTENCIAS',1),(459,'2025-01-08 11:28:32',1,2,'ELIMINACIÓN','SE ELIMINÓ LA ASISTENCIA CON ID 108',1),(460,'2025-01-08 11:28:37',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(461,'2025-01-08 11:30:01',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(462,'2025-01-08 11:30:08',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(463,'2025-01-08 11:45:24',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(464,'2025-01-08 12:02:00',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(465,'2025-01-08 12:02:08',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(467,'2025-01-08 12:02:14',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(468,'2025-01-08 12:02:18',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(469,'2025-01-08 12:02:51',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(470,'2025-01-08 12:02:55',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(471,'2025-01-08 12:03:01',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(472,'2025-01-08 12:03:04',1,5,'ELIMINACION','SE ELIMINÓ EL RESPALDO: Backupssistema_2025-01-08_12.02.56.sql',1),(473,'2025-01-08 12:03:07',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(474,'2025-01-08 12:03:10',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(475,'2025-01-08 12:05:32',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(476,'2025-01-08 12:05:37',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(477,'2025-01-08 12:06:05',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(478,'2025-01-08 12:06:33',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(479,'2025-01-08 12:06:44',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(480,'2025-01-08 12:06:48',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(481,'2025-01-08 12:07:20',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(482,'2025-01-08 12:07:26',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(483,'2025-01-08 12:07:30',1,5,'CREACIÓN','SE CREÓ EL RESPALDO:',1),(484,'2025-01-08 12:07:32',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(485,'2025-01-08 12:07:37',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(486,'2025-01-08 12:18:32',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(487,'2025-01-08 12:18:38',1,5,'CREACIÓN','SE CREÓ EL RESPALDO:',1),(488,'2025-01-08 12:18:40',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(489,'2025-01-08 12:18:44',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(490,'2025-01-08 12:20:47',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(491,'2025-01-08 12:20:55',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(492,'2025-01-08 12:21:02',1,5,'CREACIÓN','SE CREÓ EL RESPALDO:',1),(493,'2025-01-08 12:21:05',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(494,'2025-01-08 12:21:13',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(495,'2025-01-08 12:21:21',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(496,'2025-01-08 12:21:26',1,5,'ELIMINACION','SE ELIMINÓ EL RESPALDO: Backupssistema_2025-01-08_12.21.00.sql',1),(497,'2025-01-08 12:21:28',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(498,'2025-01-08 12:21:36',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(499,'2025-01-08 14:17:47',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(500,'2025-01-08 14:28:50',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(501,'2025-01-08 14:29:01',1,5,'CREACIÓN','SE CREÓ EL RESPALDO:',1),(502,'2025-01-08 14:29:03',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(503,'2025-01-08 14:29:08',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(504,'2025-01-08 14:29:19',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(505,'2025-01-08 14:29:50',1,5,'RESPALDO','SE RESPALDÓ EL SISTEMA',1),(506,'2025-01-08 14:29:59',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(507,'2025-01-08 14:31:51',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(508,'2025-01-08 14:31:54',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(509,'2025-01-08 14:32:22',1,1,'REGISTRO','SE REGISTRÓ EL USUARIO CON ID ',1),(510,'2025-01-08 14:32:28',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(511,'2025-01-08 14:32:36',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(512,'2025-01-08 15:37:22',1,5,'RESTAURACIÓN','SE RESTAURÓ EL SISTEMA: Backupssistema_2025-01-08_14.32.38.sql',1),(513,'2025-01-08 15:37:31',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(514,'2025-01-08 15:51:48',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(515,'2025-01-08 15:53:44',1,5,'RESTAURACIÓN','SE RESTAURÓ EL SISTEMA: Backupssistema_2025-01-08_15.51.50.sql',1),(516,'2025-01-08 15:53:54',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(517,'2025-01-08 16:08:41',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(518,'2025-01-08 16:09:19',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(519,'2025-01-08 16:27:49',1,5,'RESTAURACIÓN','SE RESTAURÓ EL SISTEMA: Backupssistema_2025-01-08_16.09.20.sql',1),(520,'2025-01-08 16:28:14',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(521,'2025-01-08 16:32:53',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(522,'2025-01-08 16:33:04',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(523,'2025-01-08 16:33:09',1,5,'CREACIÓN','SE CREÓ EL RESPALDO:',1),(524,'2025-01-08 16:33:11',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(525,'2025-01-08 16:33:23',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(526,'2025-01-08 16:37:39',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(527,'2025-01-08 16:37:44',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(528,'2025-01-08 16:37:48',1,5,'CREACIÓN','SE CREÓ EL RESPALDO: undefined',1),(529,'2025-01-08 16:37:51',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(530,'2025-01-08 16:38:01',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(531,'2025-01-08 16:43:28',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(532,'2025-01-08 16:43:32',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(533,'2025-01-08 16:44:20',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(534,'2025-01-08 16:47:30',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(535,'2025-01-08 16:47:59',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(536,'2025-01-08 16:48:10',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(537,'2025-01-08 16:48:13',1,5,'CREACIÓN','SE CREÓ EL RESPALDO: undefined',1),(538,'2025-01-08 16:48:15',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(539,'2025-01-08 16:48:20',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(540,'2025-01-08 16:48:23',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(541,'2025-01-09 10:50:36',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(542,'2025-01-09 10:50:57',1,3,'INGRESO','SE INGRESÓ A LA PANTALLA ROLES',1),(543,'2025-01-09 10:51:04',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(544,'2025-01-09 10:53:25',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(545,'2025-01-09 10:54:42',1,1,'MODIFICACIÓN','SE MODIFICÓ EL USUARIO CON ID 4',1),(546,'2025-01-09 10:54:50',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(547,'2025-01-09 10:55:18',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(548,'2025-01-09 11:00:35',1,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE PROMOTORES',1),(549,'2025-01-09 11:02:00',1,2,'INGRESO','SE INGRESÓ A LA PANTALLA DE ASISTENCIAS',1),(550,'2025-01-09 11:51:51',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(551,'2025-01-09 12:01:33',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(552,'2025-01-09 12:01:42',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(553,'2025-01-09 12:01:48',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(554,'2025-01-09 12:02:01',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(555,'2025-01-09 12:18:55',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(556,'2025-01-09 12:21:05',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(557,'2025-01-09 12:21:09',1,7,'MODIFICACIÓN','SE MODIFICÓ LA VENTA CON ID 1',1),(558,'2025-01-09 12:21:14',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(559,'2025-01-09 12:21:24',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(560,'2025-01-09 12:21:32',1,7,'MODIFICACIÓN','SE MODIFICÓ LA VENTA CON ID 4',1),(561,'2025-01-09 12:21:37',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(562,'2025-01-09 12:42:03',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(563,'2025-01-09 12:42:33',1,7,'REGISTRO','SE REGISTRÓ LA VENTA CON ID ',1),(564,'2025-01-09 12:42:45',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(565,'2025-01-09 12:43:02',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(566,'2025-01-09 12:44:59',1,7,'MODIFICACIÓN','SE MODIFICÓ LA VENTA CON ID 6',1),(567,'2025-01-09 12:45:02',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(568,'2025-01-09 12:45:08',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(569,'2025-01-09 12:46:24',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(570,'2025-01-09 12:46:35',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(571,'2025-01-09 12:46:40',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(572,'2025-01-09 12:46:43',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(573,'2025-01-09 14:21:10',1,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE PROMOTORES',1),(574,'2025-01-09 14:22:42',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(575,'2025-01-09 14:25:22',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(576,'2025-01-09 14:27:24',1,3,'INGRESO','SE INGRESÓ A LA PANTALLA ROLES',1),(577,'2025-01-09 14:27:38',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(578,'2025-01-09 14:41:45',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(579,'2025-01-09 14:41:53',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(580,'2025-01-09 14:42:28',1,7,'REGISTRO','SE REGISTRÓ LA VENTA CON ID ',1),(581,'2025-01-09 14:42:37',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(582,'2025-01-09 14:42:45',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(583,'2025-01-09 14:43:50',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(584,'2025-01-09 14:43:54',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(585,'2025-01-09 14:44:03',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(586,'2025-01-09 14:44:21',1,7,'REGISTRO','SE REGISTRÓ LA VENTA CON ID ',1),(587,'2025-01-09 14:44:26',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(588,'2025-01-09 14:44:30',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(589,'2025-01-09 14:44:43',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(590,'2025-01-09 14:44:50',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(591,'2025-01-09 14:45:02',1,7,'REGISTRO','SE REGISTRÓ LA VENTA CON ID ',1),(592,'2025-01-09 14:45:06',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(593,'2025-01-09 14:45:19',1,7,'INGRESO','SE INGRESÓ A LA PANTALLA DE VENTAS',1),(594,'2025-01-09 14:45:26',1,7,'ELIMINACIÓN','SE ELIMINÓ LA VENTA CON ID 9',1),(595,'2025-01-09 14:45:30',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(596,'2025-01-09 14:52:37',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(597,'2025-01-09 14:52:52',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(598,'2025-01-09 14:52:53',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(599,'2025-01-09 14:53:01',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(600,'2025-01-09 14:53:04',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(601,'2025-01-09 14:53:26',1,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE PROMOTORES',1),(602,'2025-01-09 14:53:29',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(603,'2025-01-09 14:58:31',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(604,'2025-01-09 15:00:15',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(605,'2025-01-09 15:07:01',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(606,'2025-01-09 15:07:24',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(607,'2025-01-09 15:08:33',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(608,'2025-01-09 15:08:55',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(609,'2025-01-09 15:33:33',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(610,'2025-01-09 15:34:48',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(611,'2025-01-09 15:36:42',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(612,'2025-01-09 15:36:51',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(613,'2025-01-09 15:36:55',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(614,'2025-01-09 15:37:04',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(615,'2025-01-09 15:37:13',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(616,'2025-01-09 15:37:15',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(617,'2025-01-09 15:37:18',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIO',1),(618,'2025-01-09 15:37:52',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(619,'2025-01-09 15:38:26',1,3,'INGRESO','SE INGRESÓ A LA PANTALLA ROLES',1),(620,'2025-01-09 15:38:29',1,4,'INGRESO','SE INGRESÓ A LA PANTALLA DE BITÁCORA',1),(621,'2025-01-09 15:42:18',1,5,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1);
/*!40000 ALTER TABLE `bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `caja`
--

DROP TABLE IF EXISTS `caja`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `caja` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `caja` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caja`
--

LOCK TABLES `caja` WRITE;
/*!40000 ALTER TABLE `caja` DISABLE KEYS */;
INSERT INTO `caja` VALUES (1,'General',1),(2,'Secundario',1);
/*!40000 ALTER TABLE `caja` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canal`
--

DROP TABLE IF EXISTS `canal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `canal` varchar(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_canal` (`canal`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canal`
--

LOCK TABLES `canal` WRITE;
/*!40000 ALTER TABLE `canal` DISABLE KEYS */;
INSERT INTO `canal` VALUES (1,'Masivo',1),(2,'Multimarca',1);
/*!40000 ALTER TABLE `canal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cargo`
--

DROP TABLE IF EXISTS `cargo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `cargo` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_cargo` (`cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cargo`
--

LOCK TABLES `cargo` WRITE;
/*!40000 ALTER TABLE `cargo` DISABLE KEYS */;
INSERT INTO `cargo` VALUES (1,'Promotores',1),(2,'Supervisor',1),(3,'Impulsador',1),(4,'Coordinador de proye',1),(5,'Backoffice',1);
/*!40000 ALTER TABLE `cargo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamento`
--

DROP TABLE IF EXISTS `departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `departamento` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_departamento` (`departamento`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamento`
--

LOCK TABLES `departamento` WRITE;
/*!40000 ALTER TABLE `departamento` DISABLE KEYS */;
INSERT INTO `departamento` VALUES (1,'Francisco Morazán',1),(2,'Choluteca',1),(3,'Atlántida',1),(4,'Colón',1),(5,'Comayagua',1),(6,'Copán',1),(7,'Cortés',1),(8,'El Paraíso',1),(9,'Gracias a Dios',1),(10,'Intibucá',1),(11,'Islas de la Bahía',1),(12,'La Paz',1),(13,'Lempira',1),(14,'Ocotepeque',1),(15,'Olancho',1),(16,'Santa Bárbara',1),(17,'Valle',1),(18,'Yoro',1);
/*!40000 ALTER TABLE `departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalle_permisos`
--

DROP TABLE IF EXISTS `detalle_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalle_permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_rol` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_permisos`
--

LOCK TABLES `detalle_permisos` WRITE;
/*!40000 ALTER TABLE `detalle_permisos` DISABLE KEYS */;
INSERT INTO `detalle_permisos` VALUES (1,1,1),(2,1,2),(3,1,3),(4,1,4),(5,1,5),(6,1,6),(115,5,3),(117,7,3),(118,8,3),(119,9,3),(124,6,5),(125,6,6),(143,10,1),(144,10,4),(145,10,5),(146,10,6),(147,2,1),(148,2,2),(149,2,3),(150,2,4),(151,2,5),(152,2,6),(153,3,3),(154,3,5);
/*!40000 ALTER TABLE `detalle_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estado_civil`
--

DROP TABLE IF EXISTS `estado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estado_civil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `estado_civil` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_estado_civil` (`estado_civil`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estado_civil`
--

LOCK TABLES `estado_civil` WRITE;
/*!40000 ALTER TABLE `estado_civil` DISABLE KEYS */;
INSERT INTO `estado_civil` VALUES (1,'Casado(a)',1),(2,'Unión Libre',1),(3,'Soltero(a)',1),(4,'Otros',1);
/*!40000 ALTER TABLE `estado_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `genero`
--

DROP TABLE IF EXISTS `genero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `genero` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `genero` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_genero` (`genero`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `genero`
--

LOCK TABLES `genero` WRITE;
/*!40000 ALTER TABLE `genero` DISABLE KEYS */;
INSERT INTO `genero` VALUES (1,'Femenino',1),(2,'Masculino',1);
/*!40000 ALTER TABLE `genero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `gerencia`
--

DROP TABLE IF EXISTS `gerencia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gerencia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gerencia` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_gerencia` (`gerencia`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gerencia`
--

LOCK TABLES `gerencia` WRITE;
/*!40000 ALTER TABLE `gerencia` DISABLE KEYS */;
INSERT INTO `gerencia` VALUES (1,'Distribución',1);
/*!40000 ALTER TABLE `gerencia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `modulo`
--

DROP TABLE IF EXISTS `modulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `modulo` (
  `idmodulo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idmodulo`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `modulo`
--

LOCK TABLES `modulo` WRITE;
/*!40000 ALTER TABLE `modulo` DISABLE KEYS */;
INSERT INTO `modulo` VALUES (1,'Dashboard','Dashboard',1),(2,'Usuarios','Datos de los usuarios',1),(3,'Roles','Datos de los roles',1),(4,'Permisos','Permisos de usuarios',1),(5,'Registro Promotores','Registros de promotores',1),(6,'Asistencia','Asistencia de promotores',1),(7,'Ventas','Ventas  de los promotores',1);
/*!40000 ALTER TABLE `modulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `municipio`
--

DROP TABLE IF EXISTS `municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `municipio` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_municipio` (`municipio`)
) ENGINE=InnoDB AUTO_INCREMENT=289 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `municipio`
--

LOCK TABLES `municipio` WRITE;
/*!40000 ALTER TABLE `municipio` DISABLE KEYS */;
INSERT INTO `municipio` VALUES (1,'Distrito Central',1),(2,'Alubarén',1),(3,'Cedros',1),(4,'Curarén',1),(5,'El Porvenir',1),(6,'Guaimaca',1),(7,'La Libertad',1),(8,'La Venta',1),(9,'Lepaterique',1),(10,'Maraita',1),(11,'Marale',1),(12,'Nueva Armenia',1),(13,'Ojojona',1),(14,'Orica',1),(15,'Reitoca',1),(16,'Sabanagrande',1),(17,'San Antonio de Orien',1),(18,'San Buenaventura',1),(19,'San Ignacio',1),(20,'San Juan de Flores',1),(21,'San Miguelito',1),(22,'Santa Ana',1),(23,'Santa Lucía',1),(24,'Talanga',1),(25,'Tatumbla',1),(26,'Valle de Ángeles',1),(27,'Villa de San Francis',1),(28,'Vallecillo',1),(29,'Gracias a Dios',1),(30,'Puerto Lempira',1),(31,'Brus Laguna',1),(32,'Ahuas',1),(33,'Juan Francisco Bulne',1),(34,'Villeda Morales',1),(35,'Wampusirpe',1),(36,'Intibucá',1),(37,'La Esperanza',1),(38,'Camasca',1),(39,'Colomoncagua',1),(40,'Concepción',1),(41,'Dolores',1),(42,'Jesús de Otoro',1),(43,'Magdalena',1),(44,'Masaguara',1),(45,'San Antonio',1),(46,'San Isidro',1),(47,'San Juan',1),(48,'San Marcos de la Sie',1),(50,'Yamaranguila',1),(51,'San Francisco de Opa',1),(52,'Roatán',1),(53,'Guanaja',1),(54,'José Santos Guardiol',1),(55,'Utila',1),(56,'La Paz',1),(57,'Aguanqueterique',1),(58,'Cabañas',1),(59,'Cane',1),(60,'Chinacla',1),(61,'Guajiquiro',1),(62,'Lauterique',1),(63,'Marcala',1),(64,'Mercedes de Oriente',1),(65,'Opatoro',1),(66,'San Antonio del Nort',1),(67,'San José',1),(68,'San Pedro de Tutule',1),(69,'Santa Elena',1),(70,'Santa María',1),(71,'Santiago de Puringla',1),(72,'Yarula',1),(73,'Gracias',1),(74,'Belén',1),(75,'Candelaria',1),(76,'Cololaca',1),(77,'Erandique',1),(78,'Gualcince',1),(79,'Guarita',1),(80,'La Campa',1),(81,'La Iguala',1),(82,'Las Flores',1),(83,'La Unión',1),(84,'La Virtud',1),(85,'Lepaera',1),(86,'Mapulaca',1),(87,'Piraera',1),(88,'San Andrés',1),(89,'San Francisco',1),(90,'San Juan Guarita',1),(91,'San Manuel Colohete',1),(92,'San Rafael',1),(93,'San Sebastián',1),(94,'Santa Cruz',1),(95,'Talgua',1),(96,'Tambla',1),(97,'Tomalá',1),(98,'Valladolid',1),(99,'Virginia',1),(100,'San Marcos de Caiquí',1),(101,'Belén Gualcho',1),(102,'Dolores Merendón',1),(103,'Fraternidad',1),(104,'La Encarnación',1),(105,'La Labor',1),(106,'Lucerna',1),(107,'San Fernando',1),(108,'San Francisco del Va',1),(109,'San Jorge',1),(110,'San Marcos',1),(111,'Santa Fe',1),(112,'Sensenti',1),(113,'Sinuapa',1),(114,'Juticalpa',1),(115,'Campamento',1),(116,'Catacamas',1),(117,'Concordia',1),(118,'Dulce Nombre de Culm',1),(119,'El Rosario',1),(120,'Esquipulas del Norte',1),(121,'Gualaco',1),(122,'Guarizama',1),(123,'Guata',1),(124,'Guayape',1),(125,'Jano',1),(126,'Mangulile',1),(127,'Manto',1),(128,'Salamá',1),(129,'San Esteban',1),(130,'San Francisco de Bec',1),(131,'San Francisco de la ',1),(132,'Santa María del Real',1),(133,'Silca',1),(134,'Yocón',1),(135,'Patuca',1),(136,'Arada',1),(137,'Atima',1),(138,'Azacualpa',1),(139,'Ceguaca',1),(140,'Concepción del Norte',1),(141,'Concepción del Sur',1),(142,'Chinda',1),(143,'El Níspero',1),(144,'Gualala',1),(145,'Ilama',1),(146,'Las Vegas',1),(147,'Macuelizo',1),(148,'Naranjito',1),(149,'Nuevo Celilac',1),(150,'Nueva Frontera',1),(151,'Petoa',1),(152,'Protección',1),(153,'Quimistán',1),(154,'San Francisco de Oju',1),(155,'San José de las Coli',1),(156,'San Luis',1),(157,'San Nicolás',1),(158,'San Pedro Zacapa',1),(159,'San Vicente Centenar',1),(160,'Santa Rita',1),(161,'Trinidad',1),(162,'Nacaome',1),(163,'Alianza',1),(164,'Amapala',1),(165,'Aramecina',1),(166,'Caridad',1),(167,'Goascorán',1),(168,'Langue',1),(169,'San Francisco de Cor',1),(170,'San Lorenzo',1),(171,'Arenal',1),(172,'El Negrito',1),(173,'El Progreso',1),(174,'Jocón',1),(175,'Morazán',1),(176,'Olanchito',1),(178,'Sulaco',1),(179,'Victoria',1),(180,'Yorito',1),(181,'La Ceiba',1),(182,'Tela',1),(183,'Jutiapa',1),(184,'La Masica',1),(186,'Arizona',1),(187,'Esparta',1),(188,'Choluteca',1),(189,'Apacilagua',1),(190,'Concepción de María',1),(191,'Duyure',1),(192,'El Corpus',1),(193,'El Triunfo',1),(194,'Marcovia',1),(195,'Morolica',1),(196,'Namasigüe',1),(197,'Orocuina',1),(198,'Pespire',1),(199,'San Antonio de Flore',1),(202,'San Marcos de Colón',1),(203,'Santa Ana de Yusguar',1),(204,'Trujillo',1),(205,'Balfate',1),(206,'Iriona',1),(207,'Limón',1),(208,'Sabá',1),(210,'Santa Rosa de Aguán',1),(211,'Sonaguera',1),(212,'Tocoa',1),(213,'Bonito Oriental',1),(214,'Comayagua',1),(215,'Ajuterique',1),(217,'Esquías',1),(218,'Humuya',1),(220,'Lamaní',1),(221,'La Trinidad',1),(222,'Lejamaní',1),(223,'Meámbar',1),(224,'Minas de Oro',1),(225,'Ojos de Agua',1),(226,'San Jerónimo',1),(227,'San José de Comayagu',1),(228,'San José del Potrero',1),(231,'Siguatepeque',1),(232,'Villa de San Antonio',1),(233,'Las Lajas',1),(234,'Taulabé',1),(235,'Santa Rosa de Copán',1),(238,'Copán Ruinas',1),(239,'Corquín',1),(240,'Cucuyagua',1),(242,'Dulce Nombre',1),(243,'El Paraíso',1),(244,'Florida',1),(245,'La Jigua',1),(247,'Nueva Arcadia',1),(248,'San Agustín',1),(252,'San Juan de Opoa',1),(254,'San Pedro',1),(256,'Trinidad de Copán',1),(257,'Veracruz',1),(258,'San Pedro Sula',1),(259,'Choloma',1),(260,'Omoa',1),(261,'Pimienta',1),(262,'Potrerillos',1),(263,'Puerto Cortés',1),(264,'San Antonio de Corté',1),(265,'San Francisco de Yoj',1),(266,'San Manuel',1),(267,'Santa Cruz de Yojoa',1),(268,'Villanueva',1),(269,'La Lima',1),(270,'Yuscarán',1),(271,'Alauca',1),(272,'Danlí',1),(274,'Güinope',1),(275,'Jacaleapa',1),(276,'Liure',1),(277,'Morocelí',1),(278,'Oropolí',1),(281,'San Lucas',1),(282,'San Matías',1),(283,'Soledad',1),(284,'Teupasenti',1),(285,'Texiguat',1),(286,'Vado Ancho',1),(287,'Yauyupe',1),(288,'Trojes',1);
/*!40000 ALTER TABLE `municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `objetos`
--

DROP TABLE IF EXISTS `objetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `objetos` (
  `ID_OBJETOS` int(11) NOT NULL AUTO_INCREMENT,
  `OBJETOS` varchar(50) NOT NULL,
  `TIPO_OBJETOS` varchar(25) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `CREADO_POR` varchar(25) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_OBJETOS`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `objetos`
--

LOCK TABLES `objetos` WRITE;
/*!40000 ALTER TABLE `objetos` DISABLE KEYS */;
INSERT INTO `objetos` VALUES (1,'USUARIOS','CRUD','PANTALLA DE USUARIOS',NULL,NULL,NULL,NULL),(2,'ASISTENCIA','ADF','PANTALLA DE ASISTENCIA DE PROMOTORES',NULL,NULL,NULL,NULL),(3,'ROLES','ERF','PANTALLA DE ROLES',NULL,NULL,NULL,NULL),(4,'BITÁCORA','RTG','PANTALLA PARA LOS EVENTOS DEL SISTEMA',NULL,NULL,NULL,NULL),(5,'RESPALDOS','GGG','PANTALLA DE LOS RESPLADOS',NULL,NULL,NULL,NULL),(6,'PROMOTORES','PRO','PANTALLA DE PROMOTORES',NULL,NULL,NULL,NULL),(7,'VENTAS','VTN','PANTALLA DE VENTAS DE PROMOTORES',NULL,NULL,NULL,NULL),(8,'INGRESO','ING','IINICIO DE SESION',NULL,NULL,NULL,NULL),(9,'SALIDA','SLD','CIEERRE DE SESION',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `objetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permiso_s`
--

DROP TABLE IF EXISTS `permiso_s`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permiso_s` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permiso` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `descripcion` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permiso_s`
--

LOCK TABLES `permiso_s` WRITE;
/*!40000 ALTER TABLE `permiso_s` DISABLE KEYS */;
INSERT INTO `permiso_s` VALUES (1,'Usuarios','Regristro de usuarios'),(2,'Roles','Asignacion de roles y permisos '),(3,'Respaldo','Respaldo de la base de datos del sistema'),(4,'Promotores','Vista de los promotores y gestiones'),(5,'Asistencia','Asistencia de los vendedores'),(6,'Ventas','Registro de las ventas');
/*!40000 ALTER TABLE `permiso_s` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `idpermiso` int(11) NOT NULL AUTO_INCREMENT,
  `rolid` int(11) NOT NULL,
  `moduloid` int(11) NOT NULL,
  `r` int(11) NOT NULL,
  `w` int(11) NOT NULL,
  `u` int(11) NOT NULL,
  `d` int(11) NOT NULL,
  PRIMARY KEY (`idpermiso`)
) ENGINE=InnoDB AUTO_INCREMENT=103 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (89,1,1,1,0,0,0),(90,1,2,0,0,0,0),(91,1,3,0,0,0,0),(92,1,4,0,0,1,0),(93,1,5,0,1,0,0),(94,1,6,0,0,0,0),(95,1,7,1,0,0,0),(96,3,1,0,1,0,0),(97,3,2,0,1,0,0),(98,3,3,0,1,1,0),(99,3,4,0,1,0,0),(100,3,5,1,0,0,0),(101,3,6,0,0,0,0),(102,3,7,0,1,0,0);
/*!40000 ALTER TABLE `permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promotores`
--

DROP TABLE IF EXISTS `promotores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promotores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` int(13) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `dni` varchar(15) NOT NULL,
  `telefono` varchar(8) NOT NULL,
  `direccion` text NOT NULL,
  `id_zona` int(50) NOT NULL,
  `id_departamento` int(50) NOT NULL,
  `id_municipio` int(50) NOT NULL,
  `id_gerencia` int(50) NOT NULL,
  `id_canal` int(50) NOT NULL,
  `id_proyecto` int(50) NOT NULL,
  `id_cargo` int(50) NOT NULL,
  `id_estado_civil` int(50) NOT NULL,
  `id_genero` int(50) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `cv` varchar(250) NOT NULL,
  `antecedentes` varchar(250) NOT NULL,
  `contrato` varchar(250) NOT NULL,
  `id_asistencia` int(50) NOT NULL,
  `id_ventas` int(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `fk_dni` (`dni`),
  KEY `id_zona` (`id_zona`),
  KEY `id_departamento` (`id_departamento`),
  KEY `id_municipio` (`id_municipio`),
  KEY `id_gerencia` (`id_gerencia`),
  KEY `id_canal` (`id_canal`),
  KEY `id_proyecto` (`id_proyecto`),
  KEY `id_cargo` (`id_cargo`),
  KEY `id_estado_civil` (`id_estado_civil`),
  KEY `id_genero` (`id_genero`),
  KEY `codigo` (`codigo`),
  KEY `codigo_2` (`codigo`),
  KEY `id_asistencia` (`id_asistencia`),
  KEY `id_ventas` (`id_ventas`),
  CONSTRAINT `promotores_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id`),
  CONSTRAINT `promotores_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`),
  CONSTRAINT `promotores_ibfk_3` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`),
  CONSTRAINT `promotores_ibfk_4` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`),
  CONSTRAINT `promotores_ibfk_5` FOREIGN KEY (`id_canal`) REFERENCES `canal` (`id`),
  CONSTRAINT `promotores_ibfk_6` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`),
  CONSTRAINT `promotores_ibfk_7` FOREIGN KEY (`id_estado_civil`) REFERENCES `estado_civil` (`id`),
  CONSTRAINT `promotores_ibfk_8` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`),
  CONSTRAINT `promotores_ibfk_9` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotores`
--

LOCK TABLES `promotores` WRITE;
/*!40000 ALTER TABLE `promotores` DISABLE KEYS */;
INSERT INTO `promotores` VALUES (1,1010,'Alma Gissel','Carrasco Flores','0801-1992-07788','99804912','San Carlos',2,1,1,1,1,2,2,1,1,'Ingeniero En Sistemas','20241203183136.png','','67572654a7fac-APZNZA~1.PDF','675751a00caea-educación para la salud.pdf',0,0,1),(2,1011,'Marco Tulio','Espinoza Blandin','0801-1987-87652','31827362','La Rosa',4,1,13,1,1,2,1,1,1,'Electricista','20241209172628.png','675765a07a0fe-Unidad 1 - Introducción a la matemática financiera.pdf','67571a3457222-Informeeducacion.pdf','6757300d7ee3d-TRABAJO INDIVIDUAL.pdf',0,0,1),(3,1012,'Claudia Maria','Giron Matute','0801-2021-98766','31283736','Kennedy',1,1,1,1,2,2,3,1,2,'Basica Noveno Grado','20241205230102.png','67575a0ab437c-Unidad 1 - Introducción a la matemática financiera.pdf','6752229e603f6-educación para la salud.pdf','',0,0,1),(4,1013,'Blanca Maria','Gutierrez Perez','0987-6273-73277','98765443','Residencial Las Uvas',1,1,1,1,2,2,1,2,1,'Bch','20241127180550.png','67475187a75b2-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf','67478a10a6c9a-APZNZA~1.PDF','',0,0,1),(5,1014,'Pedro Pablo','Zuniga Quiroz','0801-1998-71234','98787676','Barrio abajo',4,1,1,1,2,1,1,1,2,'Basica Septimo Grado','20240918190153.jpg','','6747495b7a2ab-APZNZA~1.PDF','',0,0,1),(6,1015,'Yugygygh','Uggyguhu','0988-7782-48282','87763638','bfggrfvbf',1,1,1,1,1,1,1,1,1,'Dfdsffdbvv ','20240918191919.jpg','6747492e47b84-educación para la salud.pdf','6747495677962-APZNZA~1.PDF','',0,0,1),(7,1016,'Eedrderd','Deded','0801-1999-88777','38193873','wededfe',1,15,1,1,1,1,3,1,1,'Efrefre','20241127172928.png','67489a095361d-TRABAJO INDIVIDUAL.pdf','','',0,0,1),(8,1018,'Alma Gissel','Carrasco Flores','0801-1992-08190','99804912','San Carlos',1,1,1,1,1,1,2,3,1,'Ingeniero En Sistemas','20241129184219.png','','','',0,0,1),(9,1017,'Hyugyfdwd','Wefewwdfw','0809-8877-77777','12312312','cfvdcvdv',1,1,1,1,1,1,1,1,1,'Dsfsdfcxv ','default.png','','','',0,0,1),(10,998989,'Dsfdfdf','Ggfgfd','2342-3423-43434','64653434','ftdgf',1,1,1,1,2,1,1,2,1,'Dgfe','default.png','674604212250c-guía eplsb cap 2.pdf','674604212251b-Unidad 1 - Introducción a la matemática financiera.pdf','6746042122520-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf',0,0,1),(11,1212121,'Sadasdsa','Dsadasdsadas','1212-1212-12121','21231321','sadasdsadas',5,3,16,1,2,2,3,2,2,'Dasdsadasdsadsa','default.png','','','',0,0,1),(34,101999,'Pedro Pablo','Zuniga Quiroz','0801-1998-71299','98787676','Barrio abajo',1,1,1,1,1,1,1,1,1,'Basica Septimo Grado','20241126182018.png','67460352db3a6-TRABAJO INDIVIDUAL.pdf','67460352db3b4-APZNZA~1.PDF','67460352db3b8-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf',0,0,1),(36,1040,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','0801-1987-8765','98765432','dwhy6ujhg',1,1,1,1,2,1,1,1,1,'Basica Septimo Grado','default.png','67460e7f8dea2-GUIA EPLSB 3.pdf','67460d89b53f9-APZNZA~1.PDF','67460d89b53fb-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf',0,0,1),(39,1060,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','0801-1987-876','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Basica Septimo Grado','20241127180849.png','67460e0d3c354-guia III.pdf','67460e0d3c35a-guía eplsb cap 2.pdf','67460e0d3c35b-GUIA EPLSB 3.pdf',0,0,1),(41,1080,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','0801-1987-854','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Basica Septimo Grado','20241126232716.png','67464b4471bd8-educación para la salud.pdf','67464b4471bdd-APZNZA~1.PDF','67464b4471bde-TRABAJO INDIVIDUAL.pdf',0,0,1),(43,1088,'Marco Tuliod','Function Btnverpromotorid Modo Documentg','0801-1998-90809','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Basica Septimo Grado','20241127165819.png','6747416773e80-educación para la salud.pdf','6747416773e84-APZNZA~1.PDF','674741e35244f-educación para la salud.pdf',0,0,1),(45,1077,'Marco Tuliod','Function Btnverpromotorid Modo Documentg','0801-1998-09890','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Basica Septimo Grado','20241127173230.png','67474bcf5c9b0-Unidad 1 - Introducción a la matemática financiera.pdf','','',0,0,1),(47,1000,'Marco Tuliod','Function Btnverpromotorid Modo Documentg','0801-1998-22233','98765432','dwhy6ujhg',1,1,1,1,1,1,2,1,1,'Basica Septimo Grado','20241127185623.png','67475d479e73a-Unidad 1 - Introducción a la matemática financiera.pdf','67475d479e73d-APZNZA~1.PDF','67475d479e73e-GUIA EPLSB 3.pdf',0,0,1),(49,199999,'Marco Tuliod','Function Btnverpromotorid Modo Documentg','0801-1998-76857','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Basica Septimo Grado','20241127211040.png','','','',0,0,1),(51,23321321,'Marco Tuliod','Function Btnverpromotorid Modo Documentg','0801-1998-77897','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Basica Septimo Grado','20241127214709.png','','','',0,0,1),(53,10105455,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','0801-1987-8734','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Basica Septimo Grado','default.png','','','',0,0,1),(55,10146556,'Marco Tuliod','Function Btnverpromotorid Modo Documentg','0801-1998-71796','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Basica Septimo Grado','20241127221245.png','67478b4db84da-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf','67478b4db84dc-educación para la salud.pdf','67478b4db84dd-TRABAJO INDIVIDUAL.pdf',0,0,1),(61,10133,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','0801-1987-87333','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Electricista','default.png','','','',0,0,1),(64,1013344,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','1212-1212-121','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Electricista','20241128173550.png','','','',0,0,1),(65,101355,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','1212-1212-12188','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Electricista','20241128182513.png','','','',0,0,1),(67,101358,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','1212-1212-764','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Electricista','default.png','6748ecd78a4a4-educación para la salud.pdf','6748ecd78a4aa-GUIA EPLSB 3.pdf','6748ecd78a4ab-APZNZA~1.PDF',0,0,1),(68,1767,'Alma Gissel','Carrasco Flores','0801-1992-0888','99804912','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','67464930477e9-guia eplsb cap 1.pdf','67464930477ee-educación para la salud.pdf','67464930477f0-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf',0,0,1),(69,18888,'Alma Gissel','Carrasco Flores','0801-1992-0756','99804912','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','67464930477e9-guia eplsb cap 1.pdf','67464930477ee-educación para la salud.pdf','67464930477f0-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf',0,0,1),(70,101322,'Alma Gissel','Carrasco Flores','1212-1212-12323','99804912','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','67464930477e9-guia eplsb cap 1.pdf','67464930477ee-educación para la salud.pdf','67464930477f0-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf',0,0,1),(74,1055,'Alma Gissel','Carrasco Flores','0801-1992-43242','99804912','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','','','',0,0,1),(76,106,'Alma Gissel','Carrasco Flores','0801-1992-43435','99804912','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','675725de96d38-educación para la salud.pdf','675723382b13b-APZNZA~1.PDF','674f31f77350b-guia eplsb cap 1.pdf',0,0,1),(77,10777,'Alma Gissel','Carrasco Flores','0801-1992-43777','99804912','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','','','',0,0,1),(79,10700,'Alma Gissel','Carrasco Flores','0801-1992-47697','99804912','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241203185212.png','674f488f71dec-guía eplsb cap 2.pdf','','',0,0,1),(81,65756,'Marco Tulio','Espinoza Blandin','6576-5756-765','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','','','',0,0,1),(82,1010999,'Marco Tulio','Espinoza Blandin','6576-5756-76598','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','','','',0,0,1),(83,1010333,'Marco Tulio','Espinoza Blandin','1212-1212-12787','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','','','',0,0,1),(84,1010455,'Marco Tulio','Espinoza Blandin','1212-1212-12333','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','default.png','','','',0,0,1),(85,101034,'Marco Tulio','Espinoza Blandin','1212-1212-12143','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241203222732.png','','','',0,0,1),(86,10344,'Alma Gissel','Carrasco Flores','0801-1992-0787','99804912','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241205231356.png','','','',0,0,1),(87,1010765,'Marco Tulio','Espinoza Blandin','6576-5756-7699','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241209162349.png','67570b8523b93-APZNZA~1.PDF','67570b8523b9e-educación para la salud.pdf','67570b8523ba2-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf',0,0,1),(88,1013332,'Marco Tulio','Espinoza Blandin','1212-1212-12342','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241209164539.png','675710a333ced-APZNZA~1.PDF','675710a333cf2-educación para la salud.pdf','675710a333cf3-GUIA EPLSB 3.pdf',0,0,1),(89,65654,'Marco Tulio','Espinoza Blandin','1212-1212-12435','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241209165951.png','675713f70479a-APZNZA~1.PDF','675713f7047c9-educación para la salud.pdf','675713f7047d5-GUIA EPLSB 3.pdf',0,0,1),(90,65654555,'Marco Tulio','Espinoza Blandin','5564-6546-54645','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241209170403.png','675714bd5a537-TRABAJO INDIVIDUAL.pdf','','',0,0,1),(91,101034888,'Marco Tulio','Espinoza Blandin','1212-1212-898','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241209170936.png','67571640592eb-Unidad 1 - Introducción a la matemática financiera.pdf','67571640592f5-PREGUNTAS DE EXÁMEN QUE CONTESTÉ MAL O SE REPITEN MUCHO XDXD.pdf','67571640592f7-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf',0,0,1),(92,1010434543,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','6643-6436-43','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Electricista','20241209220055.png','67575a87ebe2b-Unidad 1 - Introducción a la matemática financiera.pdf','67575a87ebe37-TRABAJO INDIVIDUAL.pdf','67575a87ebe39-PREGUNTAS DE EXÁMEN QUE CONTESTÉ MAL O SE REPITEN MUCHO XDXD.pdf',0,0,1),(93,2147483647,'Marco Tulio','Espinoza Blandin','1212-1212-19809','31827362','San Carlos',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241209231433.png','67576b1cc4544-educación para la salud.pdf','67576b1cc454c-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf','67576b1cc454e-Unidad 1 - Introducción a la matemática financiera.pdf',0,0,1),(94,1010778878,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','0801-1992-07665','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20241210222802.png','6758b34205f70-INTRODUCCIÓN A LA BIOQUÍMICA III PERÍODO 2024.pdf','6758b26253b0d-educación para la salud.pdf','6758b26253b10-GUIA EPLSB 3.pdf',0,0,1),(95,101023443,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','0801-1992-07233','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Electricista','20241212215535.png','675b4dc7edaa3-educación para la salud.pdf','','',0,0,1),(96,10104534,'Dfgrth Ethytyj Dty','Function Btnverpromotorid Modo Documentg','0801-1992-07565','98765432','dwhy6ujhg',1,1,1,1,1,1,1,1,1,'Ingeniero En Sistemas','20250106225826.png','677c527e36768-rep. _ guide _ biochem _ iii;iv (1).pdf','','',0,0,1);
/*!40000 ALTER TABLE `promotores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proyecto` varchar(20) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_proyecto` (`proyecto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (1,'Proyecto DOM',1),(2,'Pulperías',1);
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rol`
--

DROP TABLE IF EXISTS `rol`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rol` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombrerol` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
INSERT INTO `rol` VALUES (1,'Administrador',1),(2,'Gerente14',1),(3,'Subgerente',1),(4,'Jefe de area',1),(5,'Supervisor',1),(6,'BackOffice',1),(10,'Obrero',1);
/*!40000 ALTER TABLE `rol` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_rol` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `RESETEO_CLANZ` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_caja` (`id_rol`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','Super Administrador','$2y$10$v7puuRbixoKenVqSYb4QJOsyUaaO/eB7bDsCWMfFV5qla8AXlPjuu','portalclaro09@gmail.com',1,1,NULL),(2,'Marco','Marco','$2y$10$wo5usgMnPWrRFOeDMostpeN.tO4sh4T57RSMiKtc3jZhQ4NNr79Rm','yeseniablandin@gmail.com',9,1,NULL),(3,'Elisa','Elisa','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','elisa@gmail.com',4,1,''),(4,'Carlitos','Carlitos','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3','carlosvelasq88@gmail.com',2,1,''),(5,'Jorge','Jorge Palma','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4',NULL,2,1,''),(6,'Alejandro','Alejandro','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4','yeseniablandin@gmail.com',2,1,''),(7,'Ivis','Ivis','835d6dc88b708bc646d6db82c853ef4182fabbd4a8de59c213f2b5ab3ae7d9be','ivisherrera1234@gmail.com',5,1,''),(8,'Carlos','Carlos','$2y$10$cxif1jKNCpLWo1DHltdk7Or7QcfP1ctLGI5E74jkPK1ahYeavqyfa','Carlosvelasq88@gmail.com',3,1,'441732f66d640618d9b1ff16dde54d00'),(9,'Claro','Claro','$2y$10$v7puuRbixoKenVqSYb4QJOsyUaaO/eB7bDsCWMfFV5qla8AXlPjuu','portalclaro09@gmail.com',1,1,NULL),(10,'Yesenia','Yesenia Xiomara Espinoza Blandin','$2y$10$wo5usgMnPWrRFOeDMostpeN.tO4sh4T57RSMiKtc3jZhQ4NNr79Rm','yeseniablandin@gmail.com',3,1,NULL),(40,'Paul','Paul','$2y$10$/a3XcH5HtMcJNMFLkySCPObTj6NQQTGt6XURy0izbDo59DqIFntna','paul.antunez@claro.com.hn',2,1,NULL),(41,'Obrero','Obrero','$2y$10$li.bFXBnwd4qIpHAhiJJP.N.uwjQy2f8EVPaqm4rydLup8Pb0bO4K','obrero@claro.com.hn',10,1,NULL),(42,'Esclavo','Esclavo','$2y$10$J.GaSrJrjyoKQIziqw7Neu6U//tpe7HDfeNVK0n4hQSUBr2K.jyoq','esclavo@claro.com.hn',10,1,NULL),(46,'Claro5888777','Dfgrth Ethytyj Dty','$2y$10$1zJUJVne8KnvDVbTu.LBCeClChEZBehWL96BOxrbbp46rXW6tMH8K','yeseniablandin@gmail.com',2,1,NULL),(47,'admin77777','Uuuu','$2y$10$.oFt3IkZpjzVPoT3yF4oguMWydZqttQRa0YYV.PzoOLRVvckDb8Ri','yeseniablandin@gmail.com',3,1,NULL),(48,'admin3333','Dfgrth Ethytyj Dty','$2y$10$wXzBYQY9.WRCkIEngWa/9ecjY2IkGryZOfNKwjVjIaf5FOA8Hldiu','carlosvelasq88@gmail.com',6,1,NULL),(49,'admin77777333','Dfgrth Ethytyj Dty','$2y$10$N.91xYKYsxa5yVSckO2HveR1RHrIDTNNYK7XGWr2OQQVk9fTI9OBi','yeseniablandin@gmail.com',4,1,NULL),(50,'admin77777333qq','Dfgrth Ethytyj Dty','$2y$10$3/8Iv6WkRHEJbNniWGs06.xReNARmCbd.wXl8CJCiVxmcKGRvF/ny','yeseniablandin@gmail.com',3,1,NULL),(51,'admin77777333qqll','Dfgrth Ethytyj Dty','$2y$10$n8aSy6pIw3e3PRCcmsnhAeEH8UJKVBPjB2MLnmAA8koG56o7LqmN2','yeseniablandin@gmail.com',3,1,NULL),(52,'Carlos2323','Dfgrth Ethytyj Dty','$2y$10$wPChAiLQzbz95MEnxP7IKuRAw.GBgDEuAC6OXWB7SSS/b5hfOtxQa','yeseniablandin@gmail.com',2,1,NULL);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `telefono` varchar(11) NOT NULL,
  `medio` varchar(50) NOT NULL,
  `subgerente` varchar(50) NOT NULL,
  `coordinador` varchar(50) NOT NULL,
  `supervisor` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  `codigo` int(50) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `promotor` varchar(50) NOT NULL,
  `punto_venta` varchar(50) NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `distribuidor` varchar(50) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `producto` varchar(50) NOT NULL,
  `perfil_plan` varchar(50) NOT NULL,
  `tecnologia` varchar(50) NOT NULL,
  `centro_venta` varchar(50) NOT NULL,
  `canal_rediac` varchar(50) NOT NULL,
  `aliado` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'50489283880','USSD','CARLOS A. MURILLO','HANSEL B. ZEPEDA','SUSETH RODAS RAPALO','2024-10-08',9092,'801','JORGE ARIEL ORTEGA SEVILLA','GALLO MAS GALLO','LA PAZ','NORTE','DISMOH','BMP','PRE-PAGO','CLARO PP SMARTHPHONE II + 1','SIM-CARD','DISTRIBUIDORA DE MOVILES DE HO','CADENAS','DISMOH',1),(2,'50432486678','USSD','CARLOS A. MURIILO','HANSEL B. ZEPEDA','SUSETH RODAS RAPALO','2024-10-08',3048,'801','GLENDA SUYAPA VENTURA MEMBREDO','RADIO SHACK MALL CASCADAS','FRANCISCO MORAZÁN','CENTRO','CADENAS','Q105','PRE-PAGO','CLARO PP PDV','SIM-CARD','PROYECTO DOM','CADENAS','PROYECTO DOM',0),(3,'98987967890','Wqswqswqsa','Sssadxsadxd Wedw','Qwswqs','Sqdqwdwsd','2024-10-08',12313,'Lat: 14.101205842676837, Lon: -87.1897725072127','Weds','wesdewd2we','Fedewdew','Wedwerd','we34r','we3e','e3ewer','uuhuijiok','jiojokl','lklklñlkkj',',lñlñkñl,ñl','lkjjhnkj',0),(4,'98926261','Fsfsfs','Sfsf','Fsfsfsfs','Fsfsfsfsfs','2024-10-16',909200,'fsfsfsfsf','Sfsfsf','sfsfsf','Sfsf','Sfsfsf','fsfsf','sfsfsfs','fsfsfs','fsfsfsfs','fsfsfs','fsfsfsfss','fsfsfsf','sfsfsfsf',1),(5,'98926261','Fsfsfs','Sfsf','Fsfsfsfs','Fsfsfsfsfs','2024-10-22',9092,'fsfsfsfsf','Sfsfsf','sfsfsf','Sfsf','Sfsfsf','fsfsf','sfsfsfs','fsfsfs','fsfsfsfs','fsfsfs','fsfsfsfss','fsfsfsf','sfsfsfsf',1);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zona`
--

DROP TABLE IF EXISTS `zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `zona` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zona` varchar(25) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_zona` (`zona`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zona`
--

LOCK TABLES `zona` WRITE;
/*!40000 ALTER TABLE `zona` DISABLE KEYS */;
INSERT INTO `zona` VALUES (1,'Norte',1),(2,'Occidente',1),(3,'Litoral',1),(4,'Centro Sur',1),(5,'Sur Oriente',1);
/*!40000 ALTER TABLE `zona` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-01-09 15:42:26
