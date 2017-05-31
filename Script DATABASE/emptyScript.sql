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
-- Table structure for table `ciudad`
--

DROP TABLE IF EXISTS `ciudad`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ciudad` (
  `idCiudad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idCiudad`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `telefono` mediumtext NOT NULL,
  `email` varchar(80) NOT NULL,
  `Ciudad` int(11) NOT NULL,
  PRIMARY KEY (`idCliente`),
  KEY `fk_Cliente_Ciudad1_idx` (`Ciudad`),
  CONSTRAINT `fk_Cliente_Ciudad1` FOREIGN KEY (`Ciudad`) REFERENCES `Ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallefac`
--

DROP TABLE IF EXISTS `detallefac`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallefac` (
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
-- Dumping data for table `detallefac`
--

LOCK TABLES `detallefac` WRITE;
/*!40000 ALTER TABLE `detallefac` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallefac` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detallefaccompra`
--

DROP TABLE IF EXISTS `detallefaccompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detallefaccompra` (
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
-- Dumping data for table `detallefaccompra`
--

LOCK TABLES `detallefaccompra` WRITE;
/*!40000 ALTER TABLE `detallefaccompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallefaccompra` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `database_project`.`DetalleFacCompra_BEFORE_UPDATE`
BEFORE UPDATE ON `database_project`.`DetalleFacCompra`
FOR EACH ROW
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
-- Table structure for table `detalleventaservicio`
--

DROP TABLE IF EXISTS `detalleventaservicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleventaservicio` (
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
-- Dumping data for table `detalleventaservicio`
--

LOCK TABLES `detalleventaservicio` WRITE;
/*!40000 ALTER TABLE `detalleventaservicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `detalleventaservicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
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
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturacompra`
--

DROP TABLE IF EXISTS `facturacompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturacompra` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturacompra`
--

LOCK TABLES `facturacompra` WRITE;
/*!40000 ALTER TABLE `facturacompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturacompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `facturaservicio`
--

DROP TABLE IF EXISTS `facturaservicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `facturaservicio` (
  `idFacturaServicio` int(11) NOT NULL AUTO_INCREMENT,
  `Cliente` int(11) NOT NULL,
  `FormaPago` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idFacturaServicio`),
  KEY `fk_VentaServicio_Cliente1_idx` (`Cliente`),
  KEY `fk_FacturaServicio_FormaPago1_idx` (`FormaPago`),
  CONSTRAINT `fk_FacturaServicio_FormaPago1` FOREIGN KEY (`FormaPago`) REFERENCES `FormaPago` (`idFormaPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VentaServicio_Cliente1` FOREIGN KEY (`Cliente`) REFERENCES `Cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `facturaservicio`
--

LOCK TABLES `facturaservicio` WRITE;
/*!40000 ALTER TABLE `facturaservicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `facturaservicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `formapago`
--

DROP TABLE IF EXISTS `formapago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `formapago` (
  `idFormaPago` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idFormaPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formapago`
--

LOCK TABLES `formapago` WRITE;
/*!40000 ALTER TABLE `formapago` DISABLE KEYS */;
/*!40000 ALTER TABLE `formapago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenproducto`
--

DROP TABLE IF EXISTS `imagenproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenproducto` (
  `idImagenProducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idImagenProducto`,`idProducto`),
  UNIQUE KEY `idProducto_UNIQUE` (`idProducto`),
  KEY `fk_ImagenProducto_Producto1_idx` (`idProducto`),
  CONSTRAINT `fk_ImagenProducto_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `Producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenproducto`
--

LOCK TABLES `imagenproducto` WRITE;
/*!40000 ALTER TABLE `imagenproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenproyecto`
--

DROP TABLE IF EXISTS `imagenproyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenproyecto` (
  `idImagenProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  PRIMARY KEY (`idImagenProyecto`,`idProyecto`),
  UNIQUE KEY `idProyecto_UNIQUE` (`idProyecto`),
  KEY `fk_ImagenProyecto_Proyecto1_idx` (`idProyecto`),
  CONSTRAINT `fk_ImagenProyecto_Proyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `Proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `imagenproyecto`
--

LOCK TABLES `imagenproyecto` WRITE;
/*!40000 ALTER TABLE `imagenproyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `imagenproyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proovedor`
--

DROP TABLE IF EXISTS `proovedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proovedor` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proovedor`
--

LOCK TABLES `proovedor` WRITE;
/*!40000 ALTER TABLE `proovedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `proovedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  `empresa` varchar(40) NOT NULL,
  `activa` int(11) NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  PRIMARY KEY (`idProyecto`,`Usuario_cc`),
  KEY `fk_Proyecto_Usuario1_idx` (`Usuario_cc`),
  CONSTRAINT `fk_Proyecto_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `Usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL AUTO_INCREMENT,
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
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoproducto` (
  `idTipoProducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idTipoProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
/*!40000 ALTER TABLE `tipoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposervicio`
--

DROP TABLE IF EXISTS `tiposervicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposervicio` (
  `idTipoServicio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idTipoServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposervicio`
--

LOCK TABLES `tiposervicio` WRITE;
/*!40000 ALTER TABLE `tiposervicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `tiposervicio` ENABLE KEYS */;
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
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
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
  CONSTRAINT `fk_Usuario_TipoUsuario1` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'database_project'
--

--
-- Dumping routines for database 'database_project'
--
/*!50003 DROP PROCEDURE IF EXISTS `generarFactura` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `generarFactura`(IN xFactura INT(11),IN xProducto INT(11))
BEGIN
	SELECT cliente.nombre as nombreC,cliente.email as emailC,usuario.nombre as nombreU,usuario.email as emailU,formapago.descripcion,producto.nombre as nombreP,detallefac.cantidad,detallefac.valor
					FROM detallefac
					INNER JOIN producto ON detallefac.producto = producto.idproducto
                    INNER JOIN factura ON detallefac.Factura = factura.idFactura
                    INNER JOIN cliente ON factura.Cliente = cliente.idCliente
                    INNER JOIN formapago ON factura.FormaPago = formapago.idFormapago
                    INNER JOIN usuario ON factura.Usuario_cc = usuario.cc WHERE detallefac.Factura = xFactura AND Producto = xProducto;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 DROP PROCEDURE IF EXISTS `generarFacturaServicio` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'STRICT_TRANS_TABLES,STRICT_ALL_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ALLOW_INVALID_DATES,ERROR_FOR_DIVISION_BY_ZERO,TRADITIONAL,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE DEFINER=`root`@`localhost` PROCEDURE `generarFacturaServicio`(IN xFacturaServicio INT(11),IN xServicio INT(11))
BEGIN

SELECT cliente.nombre as nombreC,cliente.email as emailC,formapago.descripcion,servicio.descripcion as nombreP,detalleventaservicio.horas
					FROM detalleventaservicio
					INNER JOIN servicio ON detalleventaservicio.Servicio = servicio.idServicio
                    INNER JOIN facturaServicio ON detalleventaservicio.FacturaServicio = facturaServicio.idFacturaServicio
                    INNER JOIN cliente ON facturaServicio.Cliente = cliente.idCliente
                    INNER JOIN formapago ON facturaServicio.FormaPago = formapago.idFormapago WHERE FacturaServicio = xFacturaServicio AND Servicio = xServicio;

END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-30 23:00:57
