-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: mvc
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `area`
--

DROP TABLE IF EXISTS `area`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code_ar` varchar(10) NOT NULL,
  `name_ar` varchar(50) NOT NULL,
  `description_ar` varchar(60) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `area`
--

LOCK TABLES `area` WRITE;
/*!40000 ALTER TABLE `area` DISABLE KEYS */;
/*!40000 ALTER TABLE `area` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `departamentos`
--

DROP TABLE IF EXISTS `departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `departamentos` (
  `idDepartamento` int(10) NOT NULL AUTO_INCREMENT,
  `codigoDepartamento` varchar(10) NOT NULL,
  `nombreDepartamento` varchar(30) NOT NULL,
  `description_dp` varchar(60) NOT NULL,
  `created_dp` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_dp` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`idDepartamento`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `departamentos`
--

LOCK TABLES `departamentos` WRITE;
/*!40000 ALTER TABLE `departamentos` DISABLE KEYS */;
INSERT INTO `departamentos` VALUES (1,'01S','Sistemas','Departamento Sistemas Atizapan','2022-05-06 18:52:51','2022-05-06 18:52:51'),(2,'02A','Almacen','Departamento Almacen Atizapan','2022-05-06 18:53:17','2022-05-06 18:53:17'),(3,'03J','Juridico','Departamento Juridico Almacen','2022-05-06 20:04:22','2022-05-06 20:04:22');
/*!40000 ALTER TABLE `departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `fechaNacimiento` date NOT NULL,
  `lugarNacimiento` varchar(50) NOT NULL,
  `edad` int(5) NOT NULL,
  `genero` varchar(15) NOT NULL,
  `nacionalidad` varchar(50) NOT NULL,
  `estadoCivil` varchar(30) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `numeroCartilla` int(25) NOT NULL,
  `numeroTelefonico` varchar(30) NOT NULL,
  `correo` varchar(40) NOT NULL,
  `direccion` varchar(60) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `codigoPostal` int(20) NOT NULL,
  `empresa` varchar(40) NOT NULL,
  `nss` int(20) NOT NULL,
  `nomina` varchar(10) NOT NULL,
  `departamento` int(3) NOT NULL,
  `puesto` varchar(30) NOT NULL,
  `fechaContratacion` date NOT NULL,
  `status` tinyint(1) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `nomina` (`nomina`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Victor Manuela','Vilchis Nando','2002-02-03','Tlalnepantla',20,'Femenino','Mexicana','Casado@','rfc','CURP',120,'557386433','Vic@vic','Chopo 30','Nicolas romero',54460,'Corrubox',2323,'1212',3,'Becario Programacion','2022-05-11',1,'2022-05-11 14:53:55','2022-05-12 17:54:53'),(2,'323','323','2002-02-23','',20,'Masculino','','Casado@','rfc','',110,'','','','',0,'',0,'1221',3,'rer','0000-00-00',0,'2022-05-11 17:58:18','2022-05-11 18:13:21'),(25,'Jorge ','Ramirez','1988-12-02','CDMX',33,'Masculino','MEXICANA','Casado@','rfc','',110,'','','','',0,'',0,'001',2,'Becario','0000-00-00',1,'2022-05-11 18:14:24','2022-05-12 18:52:38'),(27,'Marco','Gilberto','1998-09-01','',23,'Femenino','EstadoUnidense','Casado@','rrfcaaa','r',0,'','','','',0,'',0,'0002',2,'Sistemas','0000-00-00',0,'2022-05-11 18:16:06','2022-05-12 18:44:31'),(28,'Jairo','Gravioto','1986-01-14','Naucalpan de Juarez',36,'Masculino','','Casado@','RFC','CURP',1,'55565434','jairo@jairo','Atizapan','Atizapan',54438,'corrubox',2323,'00054',1,'Jefe','2022-05-11',1,'2022-05-11 18:35:43','2022-05-12 18:52:47');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-05-12 13:55:28
