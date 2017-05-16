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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Ciudad`
--

LOCK TABLES `Ciudad` WRITE;
/*!40000 ALTER TABLE `Ciudad` DISABLE KEYS */;
INSERT INTO `Ciudad` VALUES (1,'SANTA MARTA');
/*!40000 ALTER TABLE `Ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cliente`
--

DROP TABLE IF EXISTS `Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` mediumtext NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente`
--

LOCK TABLES `Cliente` WRITE;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
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
  `Producto_idProducto` int(11) NOT NULL,
  `FacturaCompra_idFacturaCompra` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`Producto_idProducto`,`FacturaCompra_idFacturaCompra`),
  KEY `fk_Producto_has_FacturaCompra_FacturaCompra1_idx` (`FacturaCompra_idFacturaCompra`),
  KEY `fk_Producto_has_FacturaCompra_Producto1_idx` (`Producto_idProducto`),
  CONSTRAINT `fk_Producto_has_FacturaCompra_FacturaCompra1` FOREIGN KEY (`FacturaCompra_idFacturaCompra`) REFERENCES `FacturaCompra` (`idFacturaCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producto_has_FacturaCompra_Producto1` FOREIGN KEY (`Producto_idProducto`) REFERENCES `Producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DetalleFacCompra`
--

LOCK TABLES `DetalleFacCompra` WRITE;
/*!40000 ALTER TABLE `DetalleFacCompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `DetalleFacCompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `DetalleVentaServicio`
--

DROP TABLE IF EXISTS `DetalleVentaServicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `DetalleVentaServicio` (
  `FacturaServicio_idFacturaServicio` int(11) NOT NULL,
  `Servicio_idServicio` int(11) NOT NULL,
  `Horas` time NOT NULL,
  PRIMARY KEY (`FacturaServicio_idFacturaServicio`,`Servicio_idServicio`),
  KEY `fk_VentaServicio_has_Servicio_Servicio1_idx` (`Servicio_idServicio`),
  KEY `fk_VentaServicio_has_Servicio_VentaServicio1_idx` (`FacturaServicio_idFacturaServicio`),
  CONSTRAINT `fk_VentaServicio_has_Servicio_Servicio1` FOREIGN KEY (`Servicio_idServicio`) REFERENCES `Servicio` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VentaServicio_has_Servicio_VentaServicio1` FOREIGN KEY (`FacturaServicio_idFacturaServicio`) REFERENCES `FacturaServicio` (`idFacturaServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `DetalleVentaServicio`
--

LOCK TABLES `DetalleVentaServicio` WRITE;
/*!40000 ALTER TABLE `DetalleVentaServicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `DetalleVentaServicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Factura`
--

DROP TABLE IF EXISTS `Factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Factura` (
  `idFactura` int(11) NOT NULL,
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
  `idFacturaCompra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  PRIMARY KEY (`idFacturaCompra`),
  KEY `fk_FacturaCompra_Usuario1_idx` (`Usuario_cc`),
  CONSTRAINT `fk_FacturaCompra_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `Usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FacturaCompra`
--

LOCK TABLES `FacturaCompra` WRITE;
/*!40000 ALTER TABLE `FacturaCompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `FacturaCompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FacturaServicio`
--

DROP TABLE IF EXISTS `FacturaServicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FacturaServicio` (
  `idFacturaServicio` int(11) NOT NULL,
  `Cliente` int(11) NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  `FormaPago` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idFacturaServicio`),
  KEY `fk_VentaServicio_Cliente1_idx` (`Cliente`),
  KEY `fk_FacturaServicio_Usuario1_idx` (`Usuario_cc`),
  KEY `fk_FacturaServicio_FormaPago1_idx` (`FormaPago`),
  CONSTRAINT `fk_FacturaServicio_FormaPago1` FOREIGN KEY (`FormaPago`) REFERENCES `FormaPago` (`idFormaPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_FacturaServicio_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `Usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VentaServicio_Cliente1` FOREIGN KEY (`Cliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FacturaServicio`
--

LOCK TABLES `FacturaServicio` WRITE;
/*!40000 ALTER TABLE `FacturaServicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `FacturaServicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `FormaPago`
--

DROP TABLE IF EXISTS `FormaPago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `FormaPago` (
  `idFormaPago` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idFormaPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `FormaPago`
--

LOCK TABLES `FormaPago` WRITE;
/*!40000 ALTER TABLE `FormaPago` DISABLE KEYS */;
/*!40000 ALTER TABLE `FormaPago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ImagenProducto`
--

DROP TABLE IF EXISTS `ImagenProducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ImagenProducto` (
  `idImagenProducto` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idImagenProducto`,`idProducto`),
  KEY `fk_ImagenProducto_Producto1_idx` (`idProducto`),
  CONSTRAINT `fk_ImagenProducto_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `Producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ImagenProducto`
--

LOCK TABLES `ImagenProducto` WRITE;
/*!40000 ALTER TABLE `ImagenProducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `ImagenProducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ImagenProyecto`
--

DROP TABLE IF EXISTS `ImagenProyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ImagenProyecto` (
  `idImagenProyecto` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  PRIMARY KEY (`idImagenProyecto`,`idProyecto`),
  KEY `fk_ImagenProyecto_Proyecto1_idx` (`idProyecto`),
  CONSTRAINT `fk_ImagenProyecto_Proyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `Proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ImagenProyecto`
--

LOCK TABLES `ImagenProyecto` WRITE;
/*!40000 ALTER TABLE `ImagenProyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `ImagenProyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Producto`
--

DROP TABLE IF EXISTS `Producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `Compra_Usuario_cc` mediumtext NOT NULL,
  `Compra_Proovedor` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Producto`
--

LOCK TABLES `Producto` WRITE;
/*!40000 ALTER TABLE `Producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `Producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Proovedor`
--

DROP TABLE IF EXISTS `Proovedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Proovedor` (
  `idProovedor` int(11) NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Proovedor`
--

LOCK TABLES `Proovedor` WRITE;
/*!40000 ALTER TABLE `Proovedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `Proovedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Proyecto`
--

DROP TABLE IF EXISTS `Proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Proyecto` (
  `idProyecto` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `empresa` varchar(40) NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  PRIMARY KEY (`idProyecto`,`Usuario_cc`),
  KEY `fk_Proyecto_Usuario1_idx` (`Usuario_cc`),
  CONSTRAINT `fk_Proyecto_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `Usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Proyecto`
--

LOCK TABLES `Proyecto` WRITE;
/*!40000 ALTER TABLE `Proyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `Proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Servicio`
--

DROP TABLE IF EXISTS `Servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Servicio` (
  `idServicio` int(11) NOT NULL,
  `precio` double NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `TipoServicio` int(11) NOT NULL,
  PRIMARY KEY (`idServicio`),
  KEY `fk_Servicio_TipoServicio1_idx` (`TipoServicio`),
  CONSTRAINT `fk_Servicio_TipoServicio1` FOREIGN KEY (`TipoServicio`) REFERENCES `TipoServicio` (`idTipoServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Servicio`
--

LOCK TABLES `Servicio` WRITE;
/*!40000 ALTER TABLE `Servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `Servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoProducto`
--

DROP TABLE IF EXISTS `TipoProducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoProducto` (
  `idTipoProducto` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idTipoProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoProducto`
--

LOCK TABLES `TipoProducto` WRITE;
/*!40000 ALTER TABLE `TipoProducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `TipoProducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoServicio`
--

DROP TABLE IF EXISTS `TipoServicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoServicio` (
  `idTipoServicio` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idTipoServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoServicio`
--

LOCK TABLES `TipoServicio` WRITE;
/*!40000 ALTER TABLE `TipoServicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `TipoServicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `TipoUsuario`
--

DROP TABLE IF EXISTS `TipoUsuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `TipoUsuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `TipoUsuario`
--

LOCK TABLES `TipoUsuario` WRITE;
/*!40000 ALTER TABLE `TipoUsuario` DISABLE KEYS */;
INSERT INTO `TipoUsuario` VALUES (1,'Ingeniero'),(2,'Administrador');
/*!40000 ALTER TABLE `TipoUsuario` ENABLE KEYS */;
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
  `nombreUsuario` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
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
INSERT INTO `Usuario` VALUES (9911212,'Albeiro','Espitia','Hombre','albeiroespitiasierra@gmail.com',17,'123','123',1,1);
/*!40000 ALTER TABLE `Usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-16 17:48:10
