CREATE DATABASE  IF NOT EXISTS `database_project` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `database_project`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: localhost    Database: database_project
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.19-MariaDB

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
-- Table structure for table `Ciudad`
--

DROP TABLE IF EXISTS `Ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Ciudad` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ciudad`
--

LOCK TABLES `Ciudad` WRITE;
/*!40000 ALTER TABLE `Ciudad` DISABLE KEYS */;
INSERT INTO `Ciudad` VALUES (7,'123'),(8,'123'),(9,'Santa Marta');
/*!40000 ALTER TABLE `Ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cliente`
--

DROP TABLE IF EXISTS `Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `telefono` mediumtext NOT NULL,
  `email` varchar(80) NOT NULL,
  `Ciudad` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_Cliente_Ciudad1_idx` (`Ciudad`),
  CONSTRAINT `fk_Cliente_Ciudad1` FOREIGN KEY (`Ciudad`) REFERENCES `Ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente`
--

LOCK TABLES `Cliente` WRITE;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
INSERT INTO `Cliente` VALUES (1,'ddd','123','123@g.com',9),(2,'22222','2222','123@g.com',9),(3,'22222','2222','123@g.com',9),(4,'qqq','1111','123@g.com',9),(5,'qqq','1111','123@g.com',9),(6,'333','3333','123@g.com',7),(7,'1','1','123@g.com',9),(8,'3','3','123@g.com',7),(9,'123','3','33@GM.COM',9),(10,'33','33','33@GM.COM',9),(11,'33','3','33@GM.COM',9),(12,'3','3','33@GM.COM',8),(13,'2','2','33@GM.COM',8),(14,'3','3','33@GM.COM',7),(15,'22','22','123@g.com',9),(16,'22','2','123@g.com',7),(17,'2','2','123@g.com',8),(18,'3','3','33@GM.COM',7),(19,'2','2','33@GM.COM',7),(20,'1','1','123@g.com',7),(21,'2','2','123@g.com',8),(22,'2','2','2@g.com',7),(23,'as','1','1@g.com',7),(24,'as','1','1@g.com',7),(25,'asdasd','333','a@g.com',9),(26,'333','333','33@g.com',8),(27,'asd','1','1@g.com',8),(28,'2','2','2@g.com',9),(29,'2','2','2@G.COM',7),(30,'2','2','2@g.com',9),(31,'213','123','1@g.com',7),(32,'3','3','3@g.com',9),(33,'asd','1','1@g.com',7),(34,'1','1','1@g.com',7),(35,'1','1','1@g.com',7),(36,'123','321','32@g.com',7),(37,'1','1','1@g.com',9),(38,'1','1','1@g.com',8),(39,'1','1','1@g.com',9),(40,'123','312','3@g.com',8),(41,'123','312','3@g.com',7),(42,'123','312','3@g.com',7),(43,'23','3','3@g.com',9),(44,'23','3','3@g.com',8),(45,'123','321','3@g.com',9),(46,'12','2','2@g.com',9),(47,'13','32','a@g.com',8),(48,'asd','1','1@g.com',7),(49,'1','1','1@g.com',7),(50,'123','213','a@g.com',7),(51,'asd','12','a@g.com',7),(52,'asd','12','a@g.com',7),(53,'asd','1','a@g.com',7),(54,'asd','1','a@g.com',7),(55,'asd','1','a@g.com',7),(56,'asd','1','a@g.com',7),(57,'asd','1','a@g.com',7),(58,'asd','1','a@g.com',7),(59,'asd','1','a@g.com',7),(60,'asd','1','a@g.com',7),(61,'asd','1','a@g.com',7),(62,'asd','1','a@g.com',7),(63,'asd','1','a@g.com',7),(64,'asd','1','a@g.com',7),(65,'asd','1','a@g.com',7);
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DetalleFac`
--

DROP TABLE IF EXISTS `DetalleFac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DetalleFac` (
  `Factura` int(11) NOT NULL,
  `Producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`Factura`,`Producto`),
  KEY `fk_Factura_has_Producto_Producto1_idx` (`Producto`),
  KEY `fk_Factura_has_Producto_Factura1_idx` (`Factura`),
  CONSTRAINT `fk_Factura_has_Producto_Factura1` FOREIGN KEY (`Factura`) REFERENCES `Factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_has_Producto_Producto1` FOREIGN KEY (`Producto`) REFERENCES `Producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DetalleFac`
--

LOCK TABLES `DetalleFac` WRITE;
/*!40000 ALTER TABLE `DetalleFac` DISABLE KEYS */;
/*!40000 ALTER TABLE `DetalleFac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DetalleFacCompra`
--

DROP TABLE IF EXISTS `DetalleFacCompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DetalleFacCompra` (
  `Producto` int(11) NOT NULL,
  `FacturaCompra` int(11) NOT NULL,
  `cantidad` double DEFAULT NULL,
  `valor` int(11) NOT NULL,
  `activa` int(11) NOT NULL,
  PRIMARY KEY (`Producto`,`FacturaCompra`),
  KEY `fk_Producto_has_FacturaCompra_FacturaCompra1_idx` (`FacturaCompra`),
  KEY `fk_Producto_has_FacturaCompra_Producto1_idx` (`Producto`),
  CONSTRAINT `fk_Producto_has_FacturaCompra_FacturaCompra1` FOREIGN KEY (`FacturaCompra`) REFERENCES `FacturaCompra` (`idFacturaCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producto_has_FacturaCompra_Producto1` FOREIGN KEY (`Producto`) REFERENCES `Producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DetalleFacCompra`
--

LOCK TABLES `DetalleFacCompra` WRITE;
/*!40000 ALTER TABLE `DetalleFacCompra` DISABLE KEYS */;
INSERT INTO `DetalleFacCompra` VALUES (12,2,22,123,0),(13,2,NULL,123,0),(14,2,22,123,0),(15,2,117,123,1),(16,2,4,4,0);
/*!40000 ALTER TABLE `DetalleFacCompra` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `database_project`.`DetalleFacCompra_BEFORE_UPDATE` BEFORE UPDATE ON `DetalleFacCompra` FOR EACH ROW
BEGIN
	IF NEW.cantidad IS NULL THEN
		SET NEW.activa = 0;
	END IF;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `DetalleVentaServicio`
--

DROP TABLE IF EXISTS `DetalleVentaServicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DetalleVentaServicio` (
  `FacturaServicio` int(11) NOT NULL,
  `Servicio` int(11) NOT NULL,
  `Horas` time NOT NULL,
  PRIMARY KEY (`FacturaServicio`,`Servicio`),
  KEY `fk_VentaServicio_has_Servicio_Servicio1_idx` (`Servicio`),
  KEY `fk_VentaServicio_has_Servicio_VentaServicio1_idx` (`FacturaServicio`),
  CONSTRAINT `fk_VentaServicio_has_Servicio_Servicio1` FOREIGN KEY (`Servicio`) REFERENCES `Servicio` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VentaServicio_has_Servicio_VentaServicio1` FOREIGN KEY (`FacturaServicio`) REFERENCES `FacturaServicio` (`idFacturaServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DetalleVentaServicio`
--

LOCK TABLES `DetalleVentaServicio` WRITE;
/*!40000 ALTER TABLE `DetalleVentaServicio` DISABLE KEYS */;
INSERT INTO `DetalleVentaServicio` VALUES (3,1,'00:00:01'),(4,1,'00:00:01'),(5,1,'00:00:01'),(6,1,'00:00:01'),(7,1,'00:00:01'),(8,1,'00:00:01'),(9,1,'00:00:01'),(10,1,'00:00:01'),(11,1,'00:00:01'),(12,1,'00:00:01'),(13,1,'00:00:01'),(14,1,'00:00:01'),(15,1,'00:00:01');
/*!40000 ALTER TABLE `DetalleVentaServicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Factura`
--

DROP TABLE IF EXISTS `Factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Factura` (
  `idFactura` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente` int(11) NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  `FormaPago` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `fk_Factura_Cliente1_idx` (`Cliente`),
  KEY `fk_Factura_Usuario1_idx` (`Usuario_cc`),
  KEY `fk_Factura_FormaPago1_idx` (`FormaPago`),
  CONSTRAINT `fk_Factura_Cliente1` FOREIGN KEY (`Cliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_FormaPago1` FOREIGN KEY (`FormaPago`) REFERENCES `FormaPago` (`idFormaPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `Usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Factura`
--

LOCK TABLES `Factura` WRITE;
/*!40000 ALTER TABLE `Factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `Factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FacturaCompra`
--

DROP TABLE IF EXISTS `FacturaCompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FacturaCompra` (
  `idFacturaCompra` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  `Proovedor` int(11) NOT NULL,
  `FormaPago` int(11) NOT NULL,
  PRIMARY KEY (`idFacturaCompra`),
  KEY `fk_FacturaCompra_Usuario1_idx` (`Usuario_cc`),
  KEY `fk_FacturaCompra_Proovedor1_idx` (`Proovedor`),
  KEY `fk_FacturaCompra_FormaPago1_idx` (`FormaPago`),
  CONSTRAINT `fk_FacturaCompra_FormaPago1` FOREIGN KEY (`FormaPago`) REFERENCES `FormaPago` (`idFormaPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_FacturaCompra_Proovedor1` FOREIGN KEY (`Proovedor`) REFERENCES `Proovedor` (`idProovedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_FacturaCompra_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `Usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FacturaCompra`
--

LOCK TABLES `FacturaCompra` WRITE;
/*!40000 ALTER TABLE `FacturaCompra` DISABLE KEYS */;
INSERT INTO `FacturaCompra` VALUES (2,'0112-12-23',1,2,4);
/*!40000 ALTER TABLE `FacturaCompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FacturaServicio`
--

DROP TABLE IF EXISTS `FacturaServicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FacturaServicio` (
  `idFacturaServicio` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente` int(11) NOT NULL,
  `FormaPago` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idFacturaServicio`),
  KEY `fk_VentaServicio_Cliente1_idx` (`Cliente`),
  KEY `fk_FacturaServicio_FormaPago1_idx` (`FormaPago`),
  CONSTRAINT `fk_FacturaServicio_FormaPago1` FOREIGN KEY (`FormaPago`) REFERENCES `FormaPago` (`idFormaPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VentaServicio_Cliente1` FOREIGN KEY (`Cliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FacturaServicio`
--

LOCK TABLES `FacturaServicio` WRITE;
/*!40000 ALTER TABLE `FacturaServicio` DISABLE KEYS */;
INSERT INTO `FacturaServicio` VALUES (1,51,4,'2017-05-15'),(2,52,4,'2017-05-15'),(3,53,4,'2017-05-07'),(4,54,4,'2017-05-07'),(5,55,4,'2017-05-07'),(6,56,4,'2017-05-07'),(7,57,4,'2017-05-07'),(8,58,4,'2017-05-07'),(9,59,4,'2017-05-07'),(10,60,4,'2017-05-07'),(11,61,4,'2017-05-07'),(12,62,4,'2017-05-07'),(13,63,4,'2017-05-07'),(14,64,4,'2017-05-07'),(15,65,4,'2017-05-07');
/*!40000 ALTER TABLE `FacturaServicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FormaPago`
--

DROP TABLE IF EXISTS `FormaPago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FormaPago` (
  `idFormaPago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idFormaPago`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FormaPago`
--

LOCK TABLES `FormaPago` WRITE;
/*!40000 ALTER TABLE `FormaPago` DISABLE KEYS */;
INSERT INTO `FormaPago` VALUES (4,'asdasd');
/*!40000 ALTER TABLE `FormaPago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ImagenProducto`
--

DROP TABLE IF EXISTS `ImagenProducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ImagenProducto` (
  `idImagenProducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idImagenProducto`,`idProducto`),
  KEY `fk_ImagenProducto_Producto1_idx` (`idProducto`),
  CONSTRAINT `fk_ImagenProducto_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `Producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ImagenProducto`
--

LOCK TABLES `ImagenProducto` WRITE;
/*!40000 ALTER TABLE `ImagenProducto` DISABLE KEYS */;
INSERT INTO `ImagenProducto` VALUES (11,'Default','default.jpg',12),(12,'Default','default.jpg',13),(13,'Default','default.jpg',14),(14,'Default','default.jpg',15),(15,'Default','default.jpg',16);
/*!40000 ALTER TABLE `ImagenProducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ImagenProyecto`
--

DROP TABLE IF EXISTS `ImagenProyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ImagenProyecto` (
  `idImagenProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  PRIMARY KEY (`idImagenProyecto`,`idProyecto`),
  KEY `fk_ImagenProyecto_Proyecto1_idx` (`idProyecto`),
  CONSTRAINT `fk_ImagenProyecto_Proyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `Proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ImagenProyecto`
--

LOCK TABLES `ImagenProyecto` WRITE;
/*!40000 ALTER TABLE `ImagenProyecto` DISABLE KEYS */;
INSERT INTO `ImagenProyecto` VALUES (7,'Default','18012786_1277753058947355_1849897266_o.jpg',4);
/*!40000 ALTER TABLE `ImagenProyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto`
--

DROP TABLE IF EXISTS `Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto`
--

LOCK TABLES `Producto` WRITE;
/*!40000 ALTER TABLE `Producto` DISABLE KEYS */;
INSERT INTO `Producto` VALUES (12,'1','1',1),(13,'2','2',2),(14,'3','3',3),(15,'4','4',4),(16,'44','44',44);
/*!40000 ALTER TABLE `Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Proovedor`
--

DROP TABLE IF EXISTS `Proovedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Proovedor` (
  `idProovedor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(35) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefono` double NOT NULL,
  `Ciudad` int(11) NOT NULL,
  `TipoProducto` int(11) NOT NULL,
  PRIMARY KEY (`idProovedor`),
  KEY `fk_Proovedor_Ciudad1_idx` (`Ciudad`),
  KEY `fk_Proovedor_TipoProducto1_idx` (`TipoProducto`),
  CONSTRAINT `fk_Proovedor_Ciudad1` FOREIGN KEY (`Ciudad`) REFERENCES `Ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proovedor_TipoProducto1` FOREIGN KEY (`TipoProducto`) REFERENCES `TipoProducto` (`idTipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Proovedor`
--

LOCK TABLES `Proovedor` WRITE;
/*!40000 ALTER TABLE `Proovedor` DISABLE KEYS */;
INSERT INTO `Proovedor` VALUES (2,'33','33',33,7,1);
/*!40000 ALTER TABLE `Proovedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Proyecto`
--

DROP TABLE IF EXISTS `Proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `empresa` varchar(40) NOT NULL,
  `activa` int(11) NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  PRIMARY KEY (`idProyecto`,`Usuario_cc`),
  KEY `fk_Proyecto_Usuario1_idx` (`Usuario_cc`),
  CONSTRAINT `fk_Proyecto_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `Usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Proyecto`
--

LOCK TABLES `Proyecto` WRITE;
/*!40000 ALTER TABLE `Proyecto` DISABLE KEYS */;
INSERT INTO `Proyecto` VALUES (4,'asd','asd',1,1);
/*!40000 ALTER TABLE `Proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Servicio`
--

DROP TABLE IF EXISTS `Servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Servicio` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
  `precio` double NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `TipoServicio` int(11) NOT NULL,
  PRIMARY KEY (`idServicio`),
  KEY `fk_Servicio_TipoServicio1_idx` (`TipoServicio`),
  CONSTRAINT `fk_Servicio_TipoServicio1` FOREIGN KEY (`TipoServicio`) REFERENCES `TipoServicio` (`idTipoServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Servicio`
--

LOCK TABLES `Servicio` WRITE;
/*!40000 ALTER TABLE `Servicio` DISABLE KEYS */;
INSERT INTO `Servicio` VALUES (1,231,'Whatever','asdasd',1);
/*!40000 ALTER TABLE `Servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoProducto`
--

DROP TABLE IF EXISTS `TipoProducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoProducto` (
  `idTipoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idTipoProducto`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoProducto`
--

LOCK TABLES `TipoProducto` WRITE;
/*!40000 ALTER TABLE `TipoProducto` DISABLE KEYS */;
INSERT INTO `TipoProducto` VALUES (1,'Software'),(2,'Hardware');
/*!40000 ALTER TABLE `TipoProducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoServicio`
--

DROP TABLE IF EXISTS `TipoServicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoServicio` (
  `idTipoServicio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idTipoServicio`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoServicio`
--

LOCK TABLES `TipoServicio` WRITE;
/*!40000 ALTER TABLE `TipoServicio` DISABLE KEYS */;
INSERT INTO `TipoServicio` VALUES (1,'23123');
/*!40000 ALTER TABLE `TipoServicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Usuario` (
  `cc` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `edad` int(11) NOT NULL,
  `userName` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `TipoUsuario` int(11) NOT NULL,
  `Ciudad` int(11) NOT NULL,
  PRIMARY KEY (`cc`),
  KEY `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario`),
  KEY `fk_Usuario_Ciudad1_idx` (`Ciudad`),
  CONSTRAINT `fk_Usuario_Ciudad1` FOREIGN KEY (`Ciudad`) REFERENCES `Ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_TipoUsuario1` FOREIGN KEY (`TipoUsuario`) REFERENCES `TipoUsuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (1,'1','1','1','1',1,'1','1',1,7),(33,'ad','ad','ad','ad',1,'ad','ad',1,7),(12321,'admin','admin','admin','admin',0,'admin','admin',2,7),(123221,'admin','admin','admin','admin',12,'admin','admin',2,7);
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipousuario`
--

LOCK TABLES `tipousuario` WRITE;
/*!40000 ALTER TABLE `tipousuario` DISABLE KEYS */;
INSERT INTO `tipousuario` VALUES (1,'ingeniero'),(2,'administrador');
/*!40000 ALTER TABLE `tipousuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'database_project'
--

--
-- Dumping routines for database 'database_project'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-29 21:41:23
