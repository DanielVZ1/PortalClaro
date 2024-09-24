-- MariaDB dump 10.19  Distrib 10.4.32-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: rrhh_lgb
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
-- Current Database: `rrhh_lgb`
--

CREATE DATABASE /*!32312 IF NOT EXISTS*/ `rrhh_lgb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `rrhh_lgb`;

--
-- Table structure for table `tbl_area`
--

DROP TABLE IF EXISTS `tbl_area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_area` (
  `ID_AREA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(25) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `BORRADO` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`ID_AREA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_area`
--

LOCK TABLES `tbl_area` WRITE;
/*!40000 ALTER TABLE `tbl_area` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bitacora`
--

DROP TABLE IF EXISTS `tbl_bitacora`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bitacora` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FECHA` datetime NOT NULL DEFAULT current_timestamp(),
  `ID_USUARIO` int(11) NOT NULL,
  `ID_OBJETO` int(11) NOT NULL,
  `ACCION` varchar(20) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `TIPO` tinyint(4) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ID`),
  KEY `fk_usuario_bitacora_idx` (`ID_USUARIO`),
  KEY `fk_objeto_bitacora_idx` (`ID_OBJETO`)
<<<<<<<< HEAD:backups/rrhh_lgb_2023-11-29_05.53.42.sql
) ENGINE=InnoDB AUTO_INCREMENT=88 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
========
) ENGINE=InnoDB AUTO_INCREMENT=131 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
>>>>>>>> aad25d1829d426bb6d9aa3d3b2b270b3ab405d46:backups/backupsrrhh_lgb_2023-11-29_09.53.08.sql
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bitacora`
--

LOCK TABLES `tbl_bitacora` WRITE;
/*!40000 ALTER TABLE `tbl_bitacora` DISABLE KEYS */;
<<<<<<<< HEAD:backups/rrhh_lgb_2023-11-29_05.53.42.sql
INSERT INTO `tbl_bitacora` VALUES (1,'2023-11-27 01:49:50',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE AREAS',1),(2,'2023-11-27 01:49:54',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE DEPARTAMENTOS',1),(3,'2023-11-27 01:49:56',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE TIPOS DE ESTUDIO',1),(4,'2023-11-27 01:49:59',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE POSTULANTES',1),(5,'2023-11-27 01:50:01',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE TIPOS DE POSTULACIONES',1),(6,'2023-11-27 02:18:49',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(7,'2023-11-27 02:19:05',1,1,'ACTUALIZACIÓN','SE HA ACTUALIZADO AL USUARIO ADMIN',1),(8,'2023-11-27 02:19:18',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(9,'2023-11-27 02:21:14',1,1,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA AL USUARIO JX',1),(10,'2023-11-27 02:21:29',1,1,'ACTUALIZACIÓN','SE HA ACTUALIZADO AL USUARIO JX',1),(11,'2023-11-27 02:21:49',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(12,'2023-11-27 02:23:06',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE SEXOS',1),(13,'2023-11-27 02:23:42',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(14,'2023-11-27 02:24:00',1,1,'ACTUALIZACIÓN','SE HA ACTUALIZADO AL USUARIO ADMIN',1),(15,'2023-11-27 02:24:11',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(16,'2023-11-27 02:24:53',1,1,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA AL USUARIO TEST',1),(17,'2023-11-27 05:22:35',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(18,'2023-11-27 05:35:39',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(19,'2023-11-26 23:31:15',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(20,'2023-11-26 23:31:30',1,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(21,'2023-11-26 23:31:34',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(22,'2023-11-26 23:31:38',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(23,'2023-11-26 23:32:34',1,1,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA AL USUARIO USERJX',1),(24,'2023-11-26 23:33:15',1,1,'ACTUALIZACIÓN','SE HA ACTUALIZADO AL USUARIO USERJX',1),(25,'2023-11-26 23:33:37',1,1,'ACTUALIZACIÓN','SE HA ACTUALIZADO AL USUARIO USERJX',1),(26,'2023-11-26 23:35:18',1,1,'DESACTIVAR','SE DESACTIVÓ AL USUARIO DEL ID 16',1),(27,'2023-11-26 23:35:53',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(28,'2023-11-26 23:35:59',1,1,'ACTUALIZACIÓN','SE HA ACTUALIZADO AL USUARIO TEST',1),(29,'2023-11-27 02:10:00',1,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(30,'2023-11-27 02:10:05',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(31,'2023-11-27 02:10:35',17,2,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA',1),(32,'2023-11-27 02:10:45',17,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(33,'2023-11-27 02:10:45',17,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE CONFIGURACIÓN DE PREGUNTAS SECRETAS',1),(34,'2023-11-27 02:11:12',17,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(35,'2023-11-27 02:11:24',1,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(36,'2023-11-27 02:11:28',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(37,'2023-11-27 02:16:09',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(38,'2023-11-27 02:21:52',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(39,'2023-11-27 02:22:01',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(40,'2023-11-27 02:22:55',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(41,'2023-11-27 02:23:03',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(42,'2023-11-27 02:23:14',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(43,'2023-11-27 02:23:24',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(44,'2023-11-27 02:23:55',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(45,'2023-11-27 02:28:05',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(46,'2023-11-27 02:29:24',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(47,'2023-11-27 02:29:46',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(48,'2023-11-27 02:32:13',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(49,'2023-11-27 02:32:18',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(50,'2023-11-27 02:32:26',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(51,'2023-11-27 02:37:27',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(52,'2023-11-27 02:37:38',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(53,'2023-11-27 02:41:26',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(54,'2023-11-27 02:42:26',1,1,'INGRESO','SE INGRESÓ A LA PANTALLA DE USUARIOS',1),(55,'2023-11-28 21:38:44',18,2,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA',1),(56,'2023-11-28 21:39:02',18,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(57,'2023-11-28 21:39:02',18,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE CONFIGURACIÓN DE PREGUNTAS SECRETAS',1),(58,'2023-11-28 21:44:35',19,2,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA',1),(59,'2023-11-28 21:44:43',19,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(60,'2023-11-28 21:44:43',19,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE CONFIGURACIÓN DE PREGUNTAS SECRETAS',1),(61,'2023-11-28 21:50:07',20,2,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA',1),(62,'2023-11-28 21:50:18',20,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(63,'2023-11-28 21:50:19',20,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE CONFIGURACIÓN DE PREGUNTAS SECRETAS',1),(64,'2023-11-28 21:57:04',20,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(65,'2023-11-28 21:57:11',18,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(66,'2023-11-28 21:57:50',21,2,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA',1),(67,'2023-11-28 21:58:04',23,2,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA',1),(68,'2023-11-28 21:58:13',23,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(69,'2023-11-28 21:58:13',23,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE CONFIGURACIÓN DE PREGUNTAS SECRETAS',1),(70,'2023-11-28 22:02:17',24,2,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA',1),(71,'2023-11-28 22:02:53',25,2,'REGISTRO','SE HA REGISTRADO EN EL SISTEMA',1),(72,'2023-11-28 22:03:43',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(73,'2023-11-28 22:03:43',25,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE CONFIGURACIÓN DE PREGUNTAS SECRETAS',1),(74,'2023-11-28 22:05:52',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(75,'2023-11-28 22:06:37',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(76,'2023-11-28 22:06:48',24,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(77,'2023-11-28 22:06:48',24,6,'INGRESO','SE INGRESÓ A LA PANTALLA DE CONFIGURACIÓN DE PREGUNTAS SECRETAS',1),(78,'2023-11-28 22:07:11',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(79,'2023-11-28 22:07:18',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(80,'2023-11-28 22:08:04',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(81,'2023-11-28 22:09:28',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(82,'2023-11-28 22:09:35',24,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(83,'2023-11-28 22:09:46',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(84,'2023-11-28 22:10:38',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(85,'2023-11-28 22:10:45',24,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(86,'2023-11-28 22:24:26',24,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(87,'2023-11-28 22:26:36',25,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1);
========
INSERT INTO `tbl_bitacora` VALUES (112,'2023-11-27 08:59:29',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(113,'2023-11-27 08:59:48',1,8,'ELIMINACION','SE ELIMINÓ EL RESPALDO: rrhh_lgb_2023-11-27_08.58.35.sql',1),(114,'2023-11-27 08:59:50',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(115,'2023-11-29 09:52:23',1,1,'INGRESO','HA INICIADO SESIÓN EN EL SISTEMA',1),(116,'2023-11-29 09:52:30',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(117,'2023-11-29 09:52:33',1,8,'ELIMINACION','SE ELIMINÓ EL RESPALDO: backupsrrhh_lgb_2023-11-29_00.35.13.sql',1),(118,'2023-11-29 09:52:35',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(119,'2023-11-29 09:52:38',1,8,'ELIMINACION','SE ELIMINÓ EL RESPALDO: backupsrrhh_lgb_2023-11-29_00.35.19.sql',1),(120,'2023-11-29 09:52:40',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(121,'2023-11-29 09:52:42',1,8,'ELIMINACION','SE ELIMINÓ EL RESPALDO: backupsrrhh_lgb_2023-11-29_01.09.36.sql',1),(122,'2023-11-29 09:52:44',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(123,'2023-11-29 09:52:50',1,8,'ELIMINACION','SE ELIMINÓ EL RESPALDO: rrhh_lgb_2023-11-27_08.59.52.sql',1),(124,'2023-11-29 09:52:53',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(125,'2023-11-29 09:52:54',1,8,'ELIMINACION','SE ELIMINÓ EL RESPALDO: rrhh_lgb_2023-11-28_23.13.20.sql',1),(126,'2023-11-29 09:52:56',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(127,'2023-11-29 09:52:59',1,8,'ELIMINACION','SE ELIMINÓ EL RESPALDO: backupsrrhh_lgb_2023-11-29_09.51.39.sql',1),(128,'2023-11-29 09:53:01',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1),(129,'2023-11-29 09:53:03',1,8,'ELIMINACION','SE ELIMINÓ EL RESPALDO: backupsrrhh_lgb_2023-11-29_01.58.07.sql',1),(130,'2023-11-29 09:53:05',1,8,'INGRESO','SE INGRESÓ A LA PANTALLA RESPALDO/RESTAURACION BD',1);
>>>>>>>> aad25d1829d426bb6d9aa3d3b2b270b3ab405d46:backups/backupsrrhh_lgb_2023-11-29_09.53.08.sql
/*!40000 ALTER TABLE `tbl_bitacora` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_candidato`
--

DROP TABLE IF EXISTS `tbl_candidato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_candidato` (
  `ID_CANDIDATO` int(11) NOT NULL DEFAULT 0,
  `NOMBRE` varchar(20) DEFAULT NULL,
  `APELLIDO` varchar(20) DEFAULT NULL,
  `IDENTIDAD` varchar(15) DEFAULT NULL,
  `CORREO` varchar(50) DEFAULT NULL,
  `FECHA_NACIMIENTO` date DEFAULT NULL,
  `TELEFONO` varchar(15) DEFAULT NULL,
  `SEXO` varchar(15) DEFAULT NULL,
  `ESTADO_CIVIL` varchar(15) DEFAULT NULL,
  `DIRECCION_DEP_MUN` varchar(50) DEFAULT NULL,
  `CURRICULUM` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`ID_CANDIDATO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_candidato`
--

LOCK TABLES `tbl_candidato` WRITE;
/*!40000 ALTER TABLE `tbl_candidato` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_candidato` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_candidato_rechazado`
--

DROP TABLE IF EXISTS `tbl_candidato_rechazado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_candidato_rechazado` (
  `ID_CANDIDATO` int(11) DEFAULT NULL,
  `ID_PLAZA` int(11) DEFAULT NULL,
  `FECHA` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_candidato_rechazado`
--

LOCK TABLES `tbl_candidato_rechazado` WRITE;
/*!40000 ALTER TABLE `tbl_candidato_rechazado` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_candidato_rechazado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cursos`
--

DROP TABLE IF EXISTS `tbl_cursos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_cursos` (
  `ID_CANDIDATO` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `DESCRIPCION` varchar(150) DEFAULT NULL,
  `FECHA` date NOT NULL,
  KEY `ID_CANDIDATO4` (`ID_CANDIDATO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cursos`
--

LOCK TABLES `tbl_cursos` WRITE;
/*!40000 ALTER TABLE `tbl_cursos` DISABLE KEYS */;
INSERT INTO `tbl_cursos` VALUES (13,'CURSO DE EXCEL AVANZADO','JKHKJHKJHKJ','2022-01-10');
/*!40000 ALTER TABLE `tbl_cursos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_departamento`
--

DROP TABLE IF EXISTS `tbl_departamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_departamento` (
  `ID_DEPARTAMENTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) NOT NULL,
  `BORRADO` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`ID_DEPARTAMENTO`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_departamento`
--

LOCK TABLES `tbl_departamento` WRITE;
/*!40000 ALTER TABLE `tbl_departamento` DISABLE KEYS */;
INSERT INTO `tbl_departamento` VALUES (1,'FRANCISCO MORAZAN',0);
/*!40000 ALTER TABLE `tbl_departamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estado`
--

DROP TABLE IF EXISTS `tbl_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estado` (
  `ID_ESTADO` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_ESTADO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estado`
--

LOCK TABLES `tbl_estado` WRITE;
/*!40000 ALTER TABLE `tbl_estado` DISABLE KEYS */;
INSERT INTO `tbl_estado` VALUES (1,'NUEVO'),(2,'ACTIVO'),(3,'BLOQUEADO'),(4,'INACTIVO');
/*!40000 ALTER TABLE `tbl_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estado_civil`
--

DROP TABLE IF EXISTS `tbl_estado_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estado_civil` (
  `CODIGO_ESTADO_CIVIL` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `BORRADO` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`CODIGO_ESTADO_CIVIL`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estado_civil`
--

LOCK TABLES `tbl_estado_civil` WRITE;
/*!40000 ALTER TABLE `tbl_estado_civil` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_estado_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_estudios`
--

DROP TABLE IF EXISTS `tbl_estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_estudios` (
  `ID_CANDIDATO` int(11) NOT NULL,
  `CODIGO_ESTUDIO` int(11) NOT NULL,
  `NOMBRE_CARRERA` varchar(50) DEFAULT NULL,
  `FECHA` date NOT NULL,
  `FLAT_COMPLETADO` varchar(15) DEFAULT NULL,
  KEY `ID_CANDIDATO` (`ID_CANDIDATO`),
  KEY `CODIGO_ESTUDIOS` (`CODIGO_ESTUDIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_estudios`
--

LOCK TABLES `tbl_estudios` WRITE;
/*!40000 ALTER TABLE `tbl_estudios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_evidencias_falta_sancion`
--

DROP TABLE IF EXISTS `tbl_evidencias_falta_sancion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_evidencias_falta_sancion` (
  `COD_EVIDENCIAS_FALTA_SANCION` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(25) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `PRECIO` decimal(8,2) NOT NULL DEFAULT 0.00,
  `COD_EMPLEADO` int(11) DEFAULT NULL,
  PRIMARY KEY (`COD_EVIDENCIAS_FALTA_SANCION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_evidencias_falta_sancion`
--

LOCK TABLES `tbl_evidencias_falta_sancion` WRITE;
/*!40000 ALTER TABLE `tbl_evidencias_falta_sancion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_evidencias_falta_sancion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_experiencia_laboral`
--

DROP TABLE IF EXISTS `tbl_experiencia_laboral`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_experiencia_laboral` (
  `ID_CANDIDATO` int(11) NOT NULL,
  `NOMBRE_EMPRESA` varchar(50) NOT NULL,
  `PUESTO` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(20) NOT NULL,
  `FECHA_INICO` date NOT NULL,
  `FECHA_FINAL` date NOT NULL,
  KEY `ID_CANDIDATO2` (`ID_CANDIDATO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_experiencia_laboral`
--

LOCK TABLES `tbl_experiencia_laboral` WRITE;
/*!40000 ALTER TABLE `tbl_experiencia_laboral` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_experiencia_laboral` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_falta_empleado`
--

DROP TABLE IF EXISTS `tbl_falta_empleado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_falta_empleado` (
  `COD_FALTA_EMPLEADO` int(11) NOT NULL AUTO_INCREMENT,
  `MOTIVO` varchar(60) NOT NULL,
  `FECHA` date NOT NULL,
  `COD_FALTA` int(11) NOT NULL,
  `COD_EMPLEADO` int(11) NOT NULL,
  PRIMARY KEY (`COD_FALTA_EMPLEADO`),
  KEY `COD_FALTA` (`COD_FALTA`),
  KEY `COD_EMPLEADO` (`COD_EMPLEADO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_falta_empleado`
--

LOCK TABLES `tbl_falta_empleado` WRITE;
/*!40000 ALTER TABLE `tbl_falta_empleado` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_falta_empleado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_falta_sancion`
--

DROP TABLE IF EXISTS `tbl_falta_sancion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_falta_sancion` (
  `COD_FALTA_SANCION` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(40) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `TIPO` enum('LEVE','GRAVE','MUY GRAVE') DEFAULT NULL,
  `BORRADO` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`COD_FALTA_SANCION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_falta_sancion`
--

LOCK TABLES `tbl_falta_sancion` WRITE;
/*!40000 ALTER TABLE `tbl_falta_sancion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_falta_sancion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_habilidades`
--

DROP TABLE IF EXISTS `tbl_habilidades`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_habilidades` (
  `ID_CANDIDATO` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL DEFAULT '',
  KEY `ID_CANDIDATO5` (`ID_CANDIDATO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_habilidades`
--

LOCK TABLES `tbl_habilidades` WRITE;
/*!40000 ALTER TABLE `tbl_habilidades` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_habilidades` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_historico_contraseña`
--

DROP TABLE IF EXISTS `tbl_historico_contraseña`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_historico_contraseña` (
  `ID_HISTORICO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_USUARIO` int(11) NOT NULL,
  `CONTRASEÑA` varchar(25) NOT NULL,
  PRIMARY KEY (`ID_HISTORICO`),
  KEY `ID_USUARIO` (`ID_USUARIO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_historico_contraseña`
--

LOCK TABLES `tbl_historico_contraseña` WRITE;
/*!40000 ALTER TABLE `tbl_historico_contraseña` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_historico_contraseña` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_liquidacion`
--

DROP TABLE IF EXISTS `tbl_liquidacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_liquidacion` (
  `ID_LIQUIDACION` int(11) NOT NULL AUTO_INCREMENT,
  `SUELDO_FINAL` decimal(12,2) NOT NULL DEFAULT 0.00,
  `EVIDENCIAS_FALTA_SANCION` varchar(60) DEFAULT NULL,
  `INGRESO` decimal(8,2) NOT NULL DEFAULT 0.00,
  `COD_EMPLEADO` int(11) NOT NULL,
  PRIMARY KEY (`ID_LIQUIDACION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_liquidacion`
--

LOCK TABLES `tbl_liquidacion` WRITE;
/*!40000 ALTER TABLE `tbl_liquidacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_liquidacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_municipio`
--

DROP TABLE IF EXISTS `tbl_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_municipio` (
  `ID_MUNICIPIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(30) NOT NULL,
  `ID_DEPARTAMENTO` int(11) NOT NULL,
  `BORRADO` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`ID_MUNICIPIO`),
  KEY `ID_DEPARTAMENTO` (`ID_DEPARTAMENTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_municipio`
--

LOCK TABLES `tbl_municipio` WRITE;
/*!40000 ALTER TABLE `tbl_municipio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_objetos`
--

DROP TABLE IF EXISTS `tbl_objetos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_objetos` (
  `ID_OBJETOS` int(11) NOT NULL AUTO_INCREMENT,
  `OBJETOS` varchar(50) NOT NULL,
  `TIPO_OBJETOS` varchar(25) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `CREADO_POR` varchar(25) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_OBJETOS`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_objetos`
--

LOCK TABLES `tbl_objetos` WRITE;
/*!40000 ALTER TABLE `tbl_objetos` DISABLE KEYS */;
INSERT INTO `tbl_objetos` VALUES (1,'USUARIOS','CRUD','PANTALLA DE USUARIOS',NULL,NULL,NULL,NULL),(2,'REGISTRO','nel','PANTALLA DE REGISTRO DE USUARIOS',NULL,NULL,NULL,NULL),(3,'ROLES','CRUD','PANTALLA DE MANTENIMIENTO DE ROLES',NULL,NULL,NULL,NULL),(4,'BITÁCORA','R','PANTALLA PARA VER LOS EVENTOS DEL SISTEMA',NULL,NULL,NULL,NULL),(5,'RECUPERACIÓN','nel','PANTALLAS DE EVENTOS DE RECUPERACIÓN',NULL,NULL,NULL,NULL),(6,'CONFIGURACIÓN DE PREGUNTAS','nel','PANTALLA PARA CONFIGURAR PREGUNTAS SECRETAS',NULL,NULL,NULL,NULL),(7,'LOGIN','R','PANTALLA PARA INICIAR SESIÓN',NULL,NULL,NULL,NULL),(8,'MIS PROCESOS','candidato','candidato',NULL,NULL,NULL,NULL),(9,'BOLSA DE TRABAJO','candidato','candidato',NULL,NULL,NULL,NULL),(10,'PERMISOS','admin','admin',NULL,NULL,NULL,NULL),(11,'RESPALDO','admin','admin',NULL,NULL,NULL,NULL),(12,'AREAS ','admin','admin',NULL,NULL,NULL,NULL),(13,'DEPARTAMENTO ','admin','admin',NULL,NULL,NULL,NULL),(14,'MUNICIPIOS ','admin','admin',NULL,NULL,NULL,NULL),(15,'ESTADO CIVIL','admin','admin',NULL,NULL,NULL,NULL),(16,'SEXO','admin','admin',NULL,NULL,NULL,NULL),(17,'TIPO ESTUDIO','admin','admin',NULL,NULL,NULL,NULL),(18,'PLAZAS','admin','admin',NULL,NULL,NULL,NULL),(19,'POSTULANTES','admin','admin',NULL,NULL,NULL,NULL),(20,'ESTADO POSTULANTE','admin','admin',NULL,NULL,NULL,NULL),(21,'CANDIDATOS RECHAZADOS','admin','admin',NULL,NULL,NULL,NULL),(22,'EMPLEADO','admin','admin',NULL,NULL,NULL,NULL),(23,'FALTAS Y SANCIONES','admin','admin',NULL,NULL,NULL,NULL),(24,'LIQUIDACIÓN ','admin','admin',NULL,NULL,NULL,NULL),(25,'EMPLEADO INACTIVO ','admin','admin',NULL,NULL,NULL,NULL),(26,'puestos','admin','admin',NULL,NULL,NULL,NULL),(27,'tipo falta','admin','admin',NULL,NULL,NULL,NULL),(28,'evidencia de faltas y sanciones','admin','admin',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_objetos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_parametro`
--

DROP TABLE IF EXISTS `tbl_parametro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_parametro` (
  `ID_PARAMETRO` int(11) NOT NULL AUTO_INCREMENT,
  `PARAMETROS` varchar(45) NOT NULL,
  `VALOR` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `FECHA_CREACION` datetime NOT NULL DEFAULT current_timestamp(),
  `FECHA_MODIFICACION` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID_PARAMETRO`),
  UNIQUE KEY `PARAMETROS_UNIQUE` (`PARAMETROS`),
  KEY `ID_USUARIO` (`ID_USUARIO`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_parametro`
--

LOCK TABLES `tbl_parametro` WRITE;
/*!40000 ALTER TABLE `tbl_parametro` DISABLE KEYS */;
INSERT INTO `tbl_parametro` VALUES (1,'ADMIN_SESION',24,1,'0000-00-00 00:00:00','0000-00-00 00:00:00'),(2,'ADMIN_INTENTOS',3,1,'2023-10-29 12:28:05','2023-10-29 12:28:05'),(3,'DIAS_VIGENCIA',360,1,'2023-10-29 12:28:05','2023-10-29 12:28:05'),(4,'ADMIN_PREGUNTAS',3,1,'2023-10-29 12:28:05','2023-10-29 12:28:05');
/*!40000 ALTER TABLE `tbl_parametro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_permisos`
--

DROP TABLE IF EXISTS `tbl_permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_permisos` (
  `ID_PERMISOS` int(11) NOT NULL AUTO_INCREMENT,
  `ID_ROL` int(11) NOT NULL,
  `ID_OBJETOS` int(11) NOT NULL,
  `C` tinyint(4) NOT NULL DEFAULT 0,
  `U` tinyint(4) NOT NULL DEFAULT 0,
  `R` tinyint(4) NOT NULL DEFAULT 0,
  `D` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`ID_PERMISOS`),
  KEY `ID_OBJETOS` (`ID_OBJETOS`),
  KEY `ID_ROL` (`ID_ROL`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_permisos`
--

LOCK TABLES `tbl_permisos` WRITE;
/*!40000 ALTER TABLE `tbl_permisos` DISABLE KEYS */;
INSERT INTO `tbl_permisos` VALUES (1,1,1,0,0,0,0),(2,1,3,0,0,0,0),(3,1,4,0,0,0,0),(4,1,8,0,0,0,0),(5,1,9,0,0,0,0),(6,1,10,0,0,0,0),(7,1,11,0,0,0,0),(8,1,12,0,0,0,0),(9,1,13,0,0,0,0),(10,1,14,0,0,0,0),(11,1,15,0,0,0,0),(12,1,16,0,0,0,0),(13,1,17,0,0,0,0),(14,1,18,0,0,0,0),(15,1,19,0,0,0,0),(16,1,20,0,0,0,0),(17,1,21,0,0,0,0),(18,1,22,0,0,0,0),(19,1,23,0,0,0,0),(20,1,24,0,0,0,0),(21,1,25,0,0,0,0);
/*!40000 ALTER TABLE `tbl_permisos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_plaza`
--

DROP TABLE IF EXISTS `tbl_plaza`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_plaza` (
  `ID_PLAZA` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(50) NOT NULL,
  `DESCRIPCION` varchar(200) NOT NULL,
  `REQUISITOS` varchar(300) DEFAULT NULL,
  `BENEFICIOS` varchar(300) DEFAULT NULL,
  `FECHA_LIMITE` date DEFAULT NULL,
  `ESTADO_PLAZA` enum('DESHABILITADA','HABILITADA') DEFAULT NULL,
  `ID_AREA` int(11) DEFAULT NULL,
  `BORRADO` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`ID_PLAZA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_plaza`
--

LOCK TABLES `tbl_plaza` WRITE;
/*!40000 ALTER TABLE `tbl_plaza` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_plaza` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_postulante`
--

DROP TABLE IF EXISTS `tbl_postulante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_postulante` (
  `ID_CANDIDATO` int(11) NOT NULL,
  `ID_TIPO_PLAZA` int(11) NOT NULL,
  `ID_ESTADO_POSTULACION` int(11) NOT NULL,
  `FECHA_INICIO` date NOT NULL,
  `FECHA_FINAL` date NOT NULL,
  KEY `ID_CANDIDATO3` (`ID_CANDIDATO`),
  KEY `ID_TIPO_PLAZA` (`ID_TIPO_PLAZA`),
  KEY `ID_ESTADO_POSTULACION` (`ID_ESTADO_POSTULACION`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_postulante`
--

LOCK TABLES `tbl_postulante` WRITE;
/*!40000 ALTER TABLE `tbl_postulante` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_postulante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_preguntas`
--

DROP TABLE IF EXISTS `tbl_preguntas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_preguntas` (
  `ID_PREGUNTA` int(11) NOT NULL AUTO_INCREMENT,
  `PREGUNTA` varchar(150) DEFAULT NULL,
  `FECHA_CREACION` date DEFAULT NULL,
  `CREADO_POR` varchar(25) DEFAULT NULL,
  `FECHA_MODIFICACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(25) DEFAULT NULL,
  PRIMARY KEY (`ID_PREGUNTA`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_preguntas`
--

LOCK TABLES `tbl_preguntas` WRITE;
/*!40000 ALTER TABLE `tbl_preguntas` DISABLE KEYS */;
INSERT INTO `tbl_preguntas` VALUES (1,'¿Cuál es tu color favorito?',NULL,NULL,NULL,NULL),(2,'¿Cuál es el nombre de tu mascota?',NULL,NULL,NULL,NULL),(3,'¿Cómo se llama tu mejor amigo?',NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_preguntas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_preguntas_usuario`
--

DROP TABLE IF EXISTS `tbl_preguntas_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_preguntas_usuario` (
  `ID_PREGUNTA_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `ID_PREGUNTA` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `RESPUESTA` varchar(200) NOT NULL,
  PRIMARY KEY (`ID_PREGUNTA_USUARIO`),
  KEY `ID_USUARIO` (`ID_USUARIO`),
  KEY `ID_PREGUNTA` (`ID_PREGUNTA`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_preguntas_usuario`
--

LOCK TABLES `tbl_preguntas_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_preguntas_usuario` DISABLE KEYS */;
INSERT INTO `tbl_preguntas_usuario` VALUES (1,1,17,'$2y$10$g1ROMyWpv4H9kz11AcIuZOr5p5CHR78WB7xMWE6jGfqVTTl0wGfcW'),(2,2,17,'$2y$10$ygU36OGDPf7qn2jf9WeT.u9S7zW.T4oMe.Li9n9Zp2GvxjdKLIN6K'),(3,3,17,'$2y$10$b9ij4LBcHlYxk6cX/Fo5lOclT7TFGhYArS87gZbNE17DzmWh9cAmu'),(4,1,18,'$2y$10$QTrPAI.gk84xmFPsc7c/.OBnVL9zZq.8m8NA68n5jEy1P2pJo8WNO'),(5,2,18,'$2y$10$d4eRRefrY50eLfkoi7pWqutqXe.Zj1nZ9eKulT3A6dIDGoK.QDMPO'),(6,3,18,'$2y$10$VkrWxKT/bDqg3yDt5oEaIenTKZz1xZIRAaBZlDloOLm32ypJWdE0m'),(7,1,19,'$2y$10$pWydgcUeLHYNEw8sB6LvDeqtQ2rqYipC/RVMC9wKYC8goumu3vThm'),(8,2,19,'$2y$10$OP7etJX/cIq6jko7FmU4E.b3kkY9pGsGTaz/bg5HY/l4jkTit3ssO'),(9,3,19,'$2y$10$IOWPUP.SW9A5SUhvkNyIN.kp9gFNCrhZ.Gh3VSdu0C.6bMTtNO192'),(10,1,20,'$2y$10$SUk7NJnRX8G4QzpoXQ6GDeBkvxVbt3qpVDdeCryBhjgn2zedFnXuC'),(11,2,20,'$2y$10$s.0rmOOSpVJG80suSLsiUOwLwuHfkiw2/AVhxtRrl7XsfnN/x7Dvq'),(12,3,20,'$2y$10$pDeRL37gZea0st0QO33rSeconthFjUWUKxXIxY5/6JnkdardEnP6.'),(13,1,23,'$2y$10$AHQw9ZrAUugn.p5hPZdPi.V8rlIKFgdP1u.LKGKt2L1VnC2o/SXMy'),(14,2,23,'$2y$10$yW9ocmTGubn5GxGIwiL8a.s76hWekCJzhiA42bWOhhtmxWQcOrUZC'),(15,3,23,'$2y$10$r7HKIUCOM.xAcd2SdZMykORaaVKr1MS7r4y/1Ndtdtewjji2vl2Bm'),(16,1,25,'$2y$10$zLYeq7mKGbkzJmadzpFYDOowNjPReJWz4nZV4dV6EbY2ykMXZ8vIe'),(17,2,25,'$2y$10$ojq7UvRG7/8POb09RIDo9ONAVS5.xubJJIqVxojRaV/gHjJ0Xm.ei'),(18,3,25,'$2y$10$Y0D2bvdBZtznzdsmNWGcu.Nkj8xekfyMqhfB8Eo9G2BLlviiZMoMC'),(19,1,24,'$2y$10$9YP/oeurNsPR/aMpDoNyxOEKOtJ2PG10R2d15OwbosRB.o74e5O7q'),(20,2,24,'$2y$10$m/10yT2Ub/8EL0CvWa2Ea.vm4d/7bQyeyrHil6rg05iOOmxSD5C.m'),(21,3,24,'$2y$10$GpvPW64Ilgn7eVwGeolLAuYcusU.NTFc.5CKfC6x2aYqs0eaI21aq');
/*!40000 ALTER TABLE `tbl_preguntas_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_puesto`
--

DROP TABLE IF EXISTS `tbl_puesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_puesto` (
  `ID_PUESTO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `SALARIO` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`ID_PUESTO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_puesto`
--

LOCK TABLES `tbl_puesto` WRITE;
/*!40000 ALTER TABLE `tbl_puesto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_puesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_roles`
--

DROP TABLE IF EXISTS `tbl_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ROL` varchar(25) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `FECHA_CREACION` datetime DEFAULT current_timestamp(),
  `CREADO_POR` varchar(25) DEFAULT NULL,
  `FECHA_MODIFICACION` datetime DEFAULT current_timestamp(),
  `MODIFICADO_POR` varchar(25) DEFAULT NULL,
  `ROL_EST` varchar(10) DEFAULT NULL,
  `R` int(11) NOT NULL,
  `W` int(11) NOT NULL,
  `U` int(11) NOT NULL,
  `D` int(11) NOT NULL,
  `permisos` text DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `nombre` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_roles`
--

LOCK TABLES `tbl_roles` WRITE;
/*!40000 ALTER TABLE `tbl_roles` DISABLE KEYS */;
INSERT INTO `tbl_roles` VALUES (1,'ADMINISTRADOR','FRRFRFR','2023-10-20 00:00:00','ADMIN','2023-10-20 00:00:00','ADMIN','1',1,1,1,1,'[\"Usuarios\",\"11\",\"Bitacora\",\"22\",\"Roles\",\"33\",\"Respaldo\",\"44\",\"Areas\",\"53\",\"Departamentos\",\"62\",\"Municipio\",\"71\",\"Estado Civil\",\"82\",\"Sexo\",\"93\",\"Tipo Estudio\",\"104\",\"Plazas\",\"113\",\"Postulantes\",\"122\",\"Estado Postulante\",\"131\",\"Candidatos Rechazados\",\"142\",\"Empleado\",\"153\",\"Faltas\",\"164\",\"Liquidaci\\u00f3n\",\"173\",\"Empleado Inactivo\",\"182\",\"Puestos\",\"191\",\"Tipos Falta\",\"202\",\"Evidencia Faltas\",\"213\"]',1,'ADMINISTRADOR'),(3,'TESTQ','TEST','2023-10-31 08:30:37','ADMIN','2023-10-31 08:30:37','ADMIN','0',1,1,1,1,'[\"Usuarios\",\"11\",\"Bitacora\",\"22\",\"Roles\",\"33\",\"Respaldo\",\"44\",\"Areas\",\"53\",\"Departamentos\",\"62\",\"Municipio\",\"71\",\"Estado Civil\",\"82\",\"Sexo\",\"93\",\"Tipo Estudio\",\"104\",\"Plazas\",\"113\",\"Postulantes\",\"122\",\"Estado Postulante\",\"131\",\"Candidatos Rechazados\",\"142\",\"Empleado\",\"153\",\"Faltas\",\"164\",\"Liquidaci\\u00f3n\",\"173\",\"Empleado Inactivo\",\"182\",\"Puestos\",\"191\",\"Tipos Falta\",\"202\",\"Evidencia Faltas\",\"213\"]',0,'TESTQ'),(4,'TESTONE','TEST3','2023-11-14 14:02:16',NULL,'2023-11-14 14:02:16',NULL,'0',0,0,0,0,'[\"Usuarios\",\"11\",\"Bitacora\",\"22\",\"Roles\",\"33\",\"Respaldo\",\"44\",\"Areas\",\"53\",\"Departamentos\",\"62\",\"Municipio\",\"71\",\"Estado Civil\",\"82\",\"Sexo\",\"93\",\"Tipo Estudio\",\"104\",\"Plazas\",\"113\",\"Postulantes\",\"122\",\"Estado Postulante\",\"131\",\"Candidatos Rechazados\",\"142\",\"Empleado\",\"153\",\"Faltas\",\"164\",\"Liquidaci\\u00f3n\",\"173\",\"Empleado Inactivo\",\"182\",\"Puestos\",\"191\",\"Tipos Falta\",\"202\",\"Evidencia Faltas\",\"213\"]',0,'TESTA'),(5,'TESTT','ADFASDFASDF','2023-11-14 14:08:49',NULL,'2023-11-14 14:08:49',NULL,'2',0,0,0,0,'[\"Usuarios\",\"11\",\"Bitacora\",\"22\",\"Roles\",\"33\",\"Respaldo\",\"44\",\"Areas\",\"53\",\"Departamentos\",\"62\",\"Municipio\",\"71\",\"Estado Civil\",\"82\",\"Sexo\",\"93\",\"Tipo Estudio\",\"104\",\"Plazas\",\"113\",\"Postulantes\",\"122\",\"Estado Postulante\",\"131\",\"Candidatos Rechazados\",\"142\",\"Empleado\",\"153\",\"Faltas\",\"164\",\"Liquidaci\\u00f3n\",\"173\",\"Empleado Inactivo\",\"182\",\"Puestos\",\"191\",\"Tipos Falta\",\"202\",\"Evidencia Faltas\",\"213\"]',1,'TESTZ'),(6,'ASDFASDF','ASDFASD','2023-11-23 08:25:50',NULL,'2023-11-23 08:25:50',NULL,'1',0,0,0,0,'[\"Usuarios\",\"11\",\"Bitacora\",\"22\",\"Roles\",\"33\",\"Respaldo\",\"44\",\"Areas\",\"53\",\"Departamentos\",\"62\",\"Municipio\",\"71\",\"Estado Civil\",\"82\",\"Sexo\",\"93\",\"Tipo Estudio\",\"104\",\"Plazas\",\"113\",\"Postulantes\",\"122\",\"Estado Postulante\",\"131\",\"Candidatos Rechazados\",\"142\",\"Empleado\",\"153\",\"Faltas\",\"164\",\"Liquidaci\\u00f3n\",\"173\",\"Empleado Inactivo\",\"182\",\"Puestos\",\"191\",\"Tipos Falta\",\"202\",\"Evidencia Faltas\",\"213\"]',1,'TESTR'),(12,'NEW','','2023-11-26 11:47:34',NULL,'2023-11-26 11:47:34',NULL,'1',0,0,0,0,'[\"Usuarios\",\"11\",\"13\",\"Bitacora\",\"22\",\"24\",\"Roles\",\"Respaldo\",\"Areas\",\"Departamentos\",\"Municipio\",\"Estado Civil\",\"Sexo\",\"Tipo Estudio\",\"Plazas\",\"Postulantes\",\"Estado Postulante\",\"Candidatos Rechazados\",\"Empleado\",\"Faltas\",\"Liquidaci\\u00f3n\",\"Empleado Inactivo\",\"Puestos\",\"Tipos Falta\",\"Evidencia Faltas\",\"211\",\"212\",\"213\",\"214\"]',1,'NEW'),(13,'QQ','','2023-11-26 14:11:22',NULL,'2023-11-26 14:11:22',NULL,'1',0,0,0,0,'[\"Usuarios\",\"Bitacora\",\"Roles\",\"Respaldo\",\"Areas\",\"Departamentos\",\"Municipio\",\"Estado Civil\",\"Sexo\",\"Tipo Estudio\",\"Plazas\",\"Postulantes\",\"Estado Postulante\",\"Candidatos Rechazados\",\"Empleado\",\"Faltas\",\"Liquidaci\\u00f3n\",\"Empleado Inactivo\",\"Puestos\",\"Tipos Falta\",\"Evidencia Faltas\"]',1,'QQ'),(14,'VENDEDOR','','2023-11-26 14:14:23',NULL,'2023-11-26 14:14:23',NULL,'1',0,0,0,0,'[\"Usuarios\",\"11\",\"12\",\"13\",\"14\",\"Bitacora\",\"Roles\",\"Respaldo\",\"Areas\",\"Departamentos\",\"Municipio\",\"Estado Civil\",\"Sexo\",\"Tipo Estudio\",\"Plazas\",\"Postulantes\",\"Estado Postulante\",\"Candidatos Rechazados\",\"Empleado\",\"Faltas\",\"Liquidaci\\u00f3n\",\"Empleado Inactivo\",\"Puestos\",\"Tipos Falta\",\"Evidencia Faltas\"]',1,'VENDEDOR'),(15,'ACESOR','','2023-11-26 16:05:09',NULL,'2023-11-26 16:05:09',NULL,'1',0,0,0,0,'[\"Usuarios\",\"11\",\"Bitacora\",\"22\",\"Roles\",\"33\",\"Respaldo\",\"44\",\"Areas\",\"53\",\"Departamentos\",\"62\",\"Municipio\",\"71\",\"Estado Civil\",\"82\",\"Sexo\",\"93\",\"Tipo Estudio\",\"104\",\"Plazas\",\"113\",\"Postulantes\",\"122\",\"Estado Postulante\",\"131\",\"Candidatos Rechazados\",\"142\",\"Empleado\",\"153\",\"Faltas\",\"164\",\"Liquidaci\\u00f3n\",\"173\",\"Empleado Inactivo\",\"182\",\"Puestos\",\"191\",\"Tipos Falta\",\"Evidencia Faltas\"]',1,'ACESOR'),(17,'JAJAJAJAJ','','2023-11-26 17:25:52',NULL,'2023-11-26 17:25:52',NULL,'1',0,0,0,0,'[\"Usuarios\",\"11\",\"12\",\"Bitacora\",\"22\",\"Roles\",\"Respaldo\",\"Areas\",\"Departamentos\",\"Municipio\",\"Estado Civil\",\"Sexo\",\"Tipo Estudio\",\"Plazas\",\"Postulantes\",\"Estado Postulante\",\"Candidatos Rechazados\",\"Empleado\",\"Faltas\",\"Liquidaci\\u00f3n\",\"Empleado Inactivo\",\"Puestos\",\"Tipos Falta\",\"Evidencia Faltas\"]',1,'JAJAJAJAJ');
/*!40000 ALTER TABLE `tbl_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_sexo`
--

DROP TABLE IF EXISTS `tbl_sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_sexo` (
  `ID_SEXO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) NOT NULL,
  `BORRADO` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`ID_SEXO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_sexo`
--

LOCK TABLES `tbl_sexo` WRITE;
/*!40000 ALTER TABLE `tbl_sexo` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_estudios`
--

DROP TABLE IF EXISTS `tbl_tipo_estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_estudios` (
  `CODIGO_ESTUDIOS` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE_TITULO` varchar(20) NOT NULL,
  `BORRADO` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`CODIGO_ESTUDIOS`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_estudios`
--

LOCK TABLES `tbl_tipo_estudios` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_estudios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tipo_estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tipo_postulacion`
--

DROP TABLE IF EXISTS `tbl_tipo_postulacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tipo_postulacion` (
  `ID_ESTADO_POSTULACION` int(11) NOT NULL AUTO_INCREMENT,
  `DESCRIPCION` varchar(20) NOT NULL,
  `MENSAJE_CORREO` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`ID_ESTADO_POSTULACION`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tipo_postulacion`
--

LOCK TABLES `tbl_tipo_postulacion` WRITE;
/*!40000 ALTER TABLE `tbl_tipo_postulacion` DISABLE KEYS */;
INSERT INTO `tbl_tipo_postulacion` VALUES (1,'ENVIADA','Tu solicitud a la plaza seleccionada ha sido recibida por la empresa. En los proximos días se te notificará el seguimiento del proceso.'),(2,'PRESELECCION','hkhjkjhkhjkhkjhkhkj'),(3,'EN ENTREVISTA','Actualmente has sido una de las personas seleccionadas para el proceso de entrevistas. En las proximas horas nos comunicaremos contigo y te daremos información del lugar y hora a la que te debes presentar para tu entrevista.'),(4,'CONTRATADA','¡Felicitaciones! Has sido elegido(a) para la plaza. En las proximas horas nos comunicaremos contigo para darte informacion sobre tus horarios de trabajo y otros detalles.'),(5,'RECHAZADA','Después de la revisión de tu postulacion hemos concluido que no cuentas con lo solicitado para aplicar a la plaza. Agradecemos que nos hayas elegido para postular a un trabajo.');
/*!40000 ALTER TABLE `tbl_tipo_postulacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuario`
--

DROP TABLE IF EXISTS `tbl_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuario` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NUM_IDENTIDAD` varchar(15) NOT NULL,
  `ID_CARGO` int(11) NOT NULL DEFAULT 0,
  `DIRECCION_1` varchar(100) NOT NULL,
  `USUARIO` varchar(20) NOT NULL,
  `NOMBRE_USUARIO` varchar(20) NOT NULL,
  `APELLIDO_USUARIO` varchar(20) NOT NULL,
  `ESTADO_USUARIO` int(11) NOT NULL DEFAULT 1,
  `CONTRASEÑA` varchar(200) NOT NULL,
  `id` int(11) NOT NULL DEFAULT 1,
  `FECHA_ULTIMA_CONEXION` date DEFAULT NULL,
  `PREGUNTAS_CONTESTADAS` int(11) NOT NULL DEFAULT 0,
  `FECHA_CREACION` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `CREADO_POR` varchar(25) DEFAULT ' ',
  `FECHA_MODIFICACION` date DEFAULT NULL,
  `MODIFICADO_POR` varchar(25) DEFAULT ' ',
  `PRIMER_INGRESO` date DEFAULT NULL,
  `FECHA_VENCIMIENTO` date DEFAULT NULL,
  `CORREO_ELECTRONICO` varchar(30) NOT NULL,
  `RESETEO_CLANZ` varchar(200) DEFAULT NULL,
  `BITACORA` int(11) DEFAULT NULL,
  `INTENTOS` int(11) DEFAULT 0,
  `AUTOREGISTRO` tinyint(4) DEFAULT 0,
  `EMPLEADO` tinyint(4) DEFAULT 0,
  PRIMARY KEY (`ID_USUARIO`),
  UNIQUE KEY `USUARIO_UNIQUE` (`USUARIO`),
  UNIQUE KEY `CORREO_ELECTRONICO_UNIQUE` (`CORREO_ELECTRONICO`),
  KEY `fk_usuario_estado_idx` (`ESTADO_USUARIO`),
  KEY `fk_usuario_roles` (`id`),
  CONSTRAINT `fk_usuario_roles` FOREIGN KEY (`id`) REFERENCES `tbl_roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuario`
--

LOCK TABLES `tbl_usuario` WRITE;
/*!40000 ALTER TABLE `tbl_usuario` DISABLE KEYS */;
INSERT INTO `tbl_usuario` VALUES (1,'0801-2000-17662',0,'HONDURAS','ADMIN','ADMIN','ADMIN',2,'$2y$10$4mETJJnK9Z7cYRdEKNLweudohZ4ljQPbCojc22p/1RVpf6jwDa60O',1,'2023-10-29',0,'2023-11-27 14:10:00','','2023-10-29','','2023-10-29','2023-12-02','admin.admin@gmail.com',NULL,0,0,0,0),(14,'2345234523452',0,'ESTO ES UNA DIRECCION','JX','JADER','MENJIVAR',1,'$2y$10$G0UqzwWRDCc4y9U7JPIliO8FVLlJK59Zk6FtWpqGXrXWWDUmYUVI2',14,NULL,0,'2023-11-27 07:21:29',' ',NULL,' ',NULL,'2024-11-21','JAD@GMAIL.COM',NULL,NULL,0,0,0),(15,'4532452345234',0,'ESTO ES UNA DIRECCIÓN','TEST','TEST','TEST',1,'$2y$10$jIYdMePeaqeKi3whvhjFdOz3qiNOPG/PjRC2rOs/ez7s/7UlSg.gu',12,NULL,0,'2023-11-27 11:35:59',' ',NULL,' ',NULL,'2024-11-21','TEST@JJ.COM',NULL,NULL,0,0,0),(16,'3245234523452',0,'ESTO NO ES UNA DIRECCIÓN','USERJX','USERJX','USERJX',4,'$2y$10$JjYXLT00yqQaYewx2aKMSOqfcQM6EpNq6Ympa9851bxg0t/COU6c.',12,NULL,0,'2023-11-27 11:35:17',' ',NULL,' ',NULL,'2024-11-21','USERJX@gmai.com',NULL,NULL,0,0,0),(17,'3847328432864',0,'432764327','EXE','EXE','EXE',2,'$2y$10$qnQma83vyl1Vo786hSzFKe4MErF7tomGozitlLRJeu3CQTkaoUBcu',1,NULL,0,'2023-11-27 14:10:59',' ',NULL,' ',NULL,'2024-11-21','exe@exe.exe',NULL,NULL,0,1,0),(18,'2384327473243',0,'WHRFIEKWUFBEW','ADMINDOS','ADMINDOS','ADMINDOS',2,'$2y$10$rtXHH13T6AnHoahHGhbZiuj74dRE8kNOYfCL4Q96pLH.LEEz/gk5a',1,NULL,0,'2023-11-29 09:39:27',' ',NULL,' ',NULL,'2024-11-23','admin@admin.admin',NULL,NULL,0,1,0),(19,'3242343232324',0,'EQWFEFEREW','ADMINTRES','ADMINTRES','ADMINTRES',2,'$2y$10$kvQ7W/HgxMrfyrdd6aY31.css46FEHjRMRk/2bsJIbXStAN4FMnPa',1,NULL,0,'2023-11-29 09:45:06',' ',NULL,' ',NULL,'2024-11-23','ADMINTRES@ADMINTRES.ADMINTRES',NULL,NULL,0,1,0),(20,'3412432432432',0,'FFEWFEW','ADMINONE','ADMINONE','ADMINONE',2,'$2y$10$IKukIJQ5.Vlg1zMQLgaqZeXhM0y4jiNj1QplYuuzqhJJtgWXdEAG6',1,NULL,0,'2023-11-29 09:50:52',' ',NULL,' ',NULL,'2024-11-23','ADMINONE@asd.fsa',NULL,NULL,0,0,0),(21,'4382478329478',0,'RKEW','DOS','DOS','DOS',1,'$2y$10$d84RN3MDLe1oCKZwJE5.6.O1UBejRDvcaI7NpFK.bnaQe.qcq8/ji',1,NULL,0,'2023-11-29 09:57:50',' ',NULL,' ',NULL,'2024-11-23','dos.dos@dos',NULL,NULL,0,1,0),(23,'4382478329478',0,'RKEW','DOSTRES','DOS','DOS',2,'$2y$10$MhOiNWSyilgzTTb/mYKbsOYbjzfqqzm97H36z964hmrXwJsmLqWgm',1,NULL,0,'2023-11-29 09:58:24',' ',NULL,' ',NULL,'2024-11-23','dos.dos@dos.com',NULL,NULL,0,1,0),(24,'4353454353454',0,'FGREWGRE','TR','TR','TR',2,'$2y$10$WuV1HJBMQZBzVyb0gbop2e0i2l31zQJDK4/2Keb7qKakvvL3JEJja',1,NULL,0,'2023-11-29 10:07:03',' ',NULL,' ',NULL,'2024-11-23','tr@tr.tr',NULL,NULL,0,1,1),(25,'5345435345435',0,'GRE','TE','TE','TE',2,'$2y$10$S.HX72aafct67zRUfBHgD.6ZbzsZK7TC0pl2DzYmt4740ozlWm.qy',1,NULL,0,'2023-11-29 10:03:52',' ',NULL,' ',NULL,'2024-11-23','te.te@te.yr',NULL,NULL,0,1,0);
/*!40000 ALTER TABLE `tbl_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_usuarios`
--

DROP TABLE IF EXISTS `tbl_usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_usuarios` (
  `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO` varchar(20) NOT NULL,
  `IDENTIDAD` varchar(15) NOT NULL,
  `CORREO` varchar(100) DEFAULT NULL,
  `FECHA_INGRESO` date NOT NULL,
  `ID_ESTADO` int(11) NOT NULL,
  `TELEFONO` varchar(15) NOT NULL,
  `ID_PUESTO` int(11) NOT NULL,
  `ID_AREA` int(11) NOT NULL,
  `ID_BITACORA` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_USUARIO`),
  KEY `ID_ESTADO` (`ID_ESTADO`),
  KEY `ID_PUESTO` (`ID_PUESTO`),
  KEY `ID_AREA` (`ID_AREA`),
  KEY `ID_BITACORA` (`ID_BITACORA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_usuarios`
--

LOCK TABLES `tbl_usuarios` WRITE;
/*!40000 ALTER TABLE `tbl_usuarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

<<<<<<<< HEAD:backups/rrhh_lgb_2023-11-29_05.53.42.sql
-- Dump completed on 2023-11-29  5:53:44
========
-- Dump completed on 2023-11-29  9:53:10
>>>>>>>> aad25d1829d426bb6d9aa3d3b2b270b3ab405d46:backups/backupsrrhh_lgb_2023-11-29_09.53.08.sql
