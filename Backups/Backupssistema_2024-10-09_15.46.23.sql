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
  `hora_salida` datetime NOT NULL,
  `foto` varchar(100) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `asistencia`
--

LOCK TABLES `asistencia` WRITE;
/*!40000 ALTER TABLE `asistencia` DISABLE KEYS */;
INSERT INTO `asistencia` VALUES (1,1010,'','Alma Gissel','Carrasco Flores','Promotores','jjjjnkm','Centro Sur','jhujhhuij','jhhjhihio','2024-10-08 16:41:00','2024-10-08 17:49:00','data:,','Lat: 14.10120904670874, Lon: -87.18976839468135',1);
/*!40000 ALTER TABLE `asistencia` ENABLE KEYS */;
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
  `id_usuario` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detalle_permisos`
--

LOCK TABLES `detalle_permisos` WRITE;
/*!40000 ALTER TABLE `detalle_permisos` DISABLE KEYS */;
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
-- Table structure for table `permisos`
--

DROP TABLE IF EXISTS `permisos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permiso` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permisos`
--

LOCK TABLES `permisos` WRITE;
/*!40000 ALTER TABLE `permisos` DISABLE KEYS */;
INSERT INTO `permisos` VALUES (1,'usuarios'),(2,'mantenimiento'),(3,'registrar_promotores'),(4,'perfil_promotor'),(5,'asistencia'),(6,'ventas'),(7,'geolocalizacion'),(8,'camara'),(9,'camara'),(10,'usuarios'),(11,'mantenimiento'),(12,'registrar_promotores'),(13,'perfil_promotor'),(14,'asistencia'),(15,'ventas'),(16,'geolocalizacion'),(17,'camara');
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
  `cv` varchar(50) NOT NULL,
  `antecedentes` varchar(50) NOT NULL,
  `contrato` varchar(50) NOT NULL,
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
  CONSTRAINT `promotores_ibfk_1` FOREIGN KEY (`id_zona`) REFERENCES `zona` (`id`),
  CONSTRAINT `promotores_ibfk_2` FOREIGN KEY (`id_municipio`) REFERENCES `municipio` (`id`),
  CONSTRAINT `promotores_ibfk_3` FOREIGN KEY (`id_departamento`) REFERENCES `departamento` (`id`),
  CONSTRAINT `promotores_ibfk_4` FOREIGN KEY (`id_gerencia`) REFERENCES `gerencia` (`id`),
  CONSTRAINT `promotores_ibfk_5` FOREIGN KEY (`id_canal`) REFERENCES `canal` (`id`),
  CONSTRAINT `promotores_ibfk_6` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id`),
  CONSTRAINT `promotores_ibfk_7` FOREIGN KEY (`id_estado_civil`) REFERENCES `estado_civil` (`id`),
  CONSTRAINT `promotores_ibfk_8` FOREIGN KEY (`id_cargo`) REFERENCES `cargo` (`id`),
  CONSTRAINT `promotores_ibfk_9` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promotores`
--

LOCK TABLES `promotores` WRITE;
/*!40000 ALTER TABLE `promotores` DISABLE KEYS */;
INSERT INTO `promotores` VALUES (1,1010,'Alma Gissel','Carrasco Flores','0801-1992-08192','99804912','San Carlos',4,1,1,1,2,2,1,3,1,'Ingeniero En Sistemas','default.png','','','',1),(2,1011,'Marco Tulio','Espinoza Blandin','0801-1987-87652','31827362','La Rosa',4,1,13,1,1,1,1,1,2,'Electricista','20240918191721.jpg','','','',1),(3,1012,'Claudia Maria','Giron Matute','0801-2021-98766','31283736','Kennedy',1,1,1,1,2,2,1,1,1,'Basica Noveno Grado','20240918191755.jpg','','','',1),(4,1013,'Blanca Maria','Gutierrez Perez','0987-6273-73277','98765443','Residencial Las Uvas',1,1,1,1,2,2,1,3,1,'Bch','default.png','','','',0),(5,1014,'Pedro Pablo','Zuniga Quiroz','0801-1998-71234','98787676','Barrio abajo',4,1,1,1,2,1,1,1,2,'Basica Septimo Grado','20240918190153.jpg','','','',1),(6,1015,'Yugygygh','Uggyguhu','0988-7782-48282','87763638','bfggrfvbf',1,1,1,1,1,1,1,1,1,'Dfdsffdbvv ','20240918191919.jpg','','','',1),(7,1016,'Eedrderd','Deded','0801-1999-88777','38193873','wededfe',1,1,1,1,1,1,1,1,1,'Efrefre','default.png','','','',1),(8,1018,'Alma Gissel','Carrasco Flores','0801-1992-08190','99804912','San Carlos',1,1,1,1,1,1,1,3,1,'Ingeniero En Sistemas','20240920195232.png','','','',1),(9,1017,'Hyugyfdwd','Wefewwdfw','0809-8877-77777','12312312','cfvdcvdv',1,1,1,1,1,1,1,1,1,'Dsfsdfcxv ','default.png','','','',1),(10,998989,'Dsfdfdf','Ggfgfd','2342-3423-43434','64653434','ftdgf',1,1,1,1,1,1,1,1,1,'Dgfe','default.png','','','',1);
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
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rol`
--

LOCK TABLES `rol` WRITE;
/*!40000 ALTER TABLE `rol` DISABLE KEYS */;
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
  `id_caja` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `RESETEO_CLANZ` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_caja` (`id_caja`),
  CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_caja`) REFERENCES `caja` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'admin','Yesenia Espinoza','$2y$10$0ooi9Fa0epyXQWbR0tCOx.os78oBB38n.LMF7h34hpRf5LF.460je','yeseniablandin@gmail.com',1,1,NULL),(2,'Marco','Marco','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,1,1,''),(3,'Elisa','Elisa','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,2,1,''),(4,'Mario','Mario','a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3',NULL,1,1,''),(5,'Jorge','Jorge Palma','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4',NULL,2,1,''),(6,'Alejandro','Alejandro','03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4',NULL,2,1,''),(7,'Josue','Josue','835d6dc88b708bc646d6db82c853ef4182fabbd4a8de59c213f2b5ab3ae7d9be','ivisherrera1234@gmail.com',2,1,''),(8,'Carlos','Carlos','7c35568033fc618ff5168d1f8a9dd26162afe6e93c3d0ffd5df1c366912b7799','Carlosvelasq88@gmail.com',1,1,'1f91764ef32142f0794230da11145570'),(9,'Claro','Claro','d0960501f8971be812f2e5494426e08cdbb2cbc3b3190ba60075f14b8da7178a','portalclaro09@gmail.com',1,1,'4716b7e9b17f5809e4cedd247b8462de'),(10,'Yesenia','Yesenia Xiomara Espinoza Blandin','$2y$10$0ooi9Fa0epyXQWbR0tCOx.os78oBB38n.LMF7h34hpRf5LF.460je','yeseniablandin@gmail.com',1,1,NULL);
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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'50489283880','USSD','CARLOS A. MURILLO','HANSEL B. ZEPEDA','SUSETH RODAS RAPALO','2024-10-08',9092,'801','JORGE ARIEL ORTEGA SEVILLA','GALLO MAS GALLO','LA PAZ','NORTE','DISMOH','Q105','PRE-PAGO','CLARO PP SMARTHPHONE II + 1','SIM-CARD','DISTRIBUIDORA DE MOVILES DE HO','CADENAS','DISMOH',1),(2,'50432486678','USSD','CARLOS A. MURIILO','HANSEL B. ZEPEDA','SUSETH RODAS RAPALO','2024-10-08',3048,'801','GLENDA SUYAPA VENTURA MEMBREDO','RADIO SHACK MALL CASCADAS','FRANCISCO MORAZÁN','CENTRO','CADENAS','Q105','PRE-PAGO','CLARO PP PDV','SIM-CARD','PROYECTO DOM','CADENAS','PROYECTO DOM',1),(3,'98987967890','Wqswqswqsa','Sssadxsadxd Wedw','Qwswqs','Sqdqwdwsd','2024-10-08',12313,'Lat: 14.101205842676837, Lon: -87.1897725072127','Weds','wesdewd2we','Fedewdew','Wedwerd','we34r','we3e','e3ewer','uuhuijiok','jiojokl','lklklñlkkj',',lñlñkñl,ñl','lkjjhnkj',0);
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

-- Dump completed on 2024-10-09 15:46:25
