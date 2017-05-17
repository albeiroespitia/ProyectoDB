CREATE DATABASE  IF NOT EXISTS `database_project` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `database_project`;
-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: database_project
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ciudad`
--

LOCK TABLES `ciudad` WRITE;
/*!40000 ALTER TABLE `ciudad` DISABLE KEYS */;
INSERT INTO `ciudad` VALUES (1,'Santa Marta'),(2,'Barranquilla'),(3,'El Banco Magdalena');
/*!40000 ALTER TABLE `ciudad` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `telefono` mediumtext NOT NULL,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`idCliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Brayan Mayer Pimienta','3135793841','bramayer@gmail.com'),(2,'Nacho Vidal Caceres','3153452647','navica@gmail.com');
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
  CONSTRAINT `fk_Factura_has_Producto_Factura1` FOREIGN KEY (`Factura`) REFERENCES `factura` (`idFactura`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_has_Producto_Producto1` FOREIGN KEY (`Producto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `Producto_idProducto` int(11) NOT NULL,
  `FacturaCompra_idFacturaCompra` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `valor` int(11) NOT NULL,
  PRIMARY KEY (`Producto_idProducto`,`FacturaCompra_idFacturaCompra`),
  KEY `fk_Producto_has_FacturaCompra_FacturaCompra1_idx` (`FacturaCompra_idFacturaCompra`),
  KEY `fk_Producto_has_FacturaCompra_Producto1_idx` (`Producto_idProducto`),
  CONSTRAINT `fk_Producto_has_FacturaCompra_FacturaCompra1` FOREIGN KEY (`FacturaCompra_idFacturaCompra`) REFERENCES `facturacompra` (`idFacturaCompra`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producto_has_FacturaCompra_Producto1` FOREIGN KEY (`Producto_idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detallefaccompra`
--

LOCK TABLES `detallefaccompra` WRITE;
/*!40000 ALTER TABLE `detallefaccompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `detallefaccompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `detalleventaservicio`
--

DROP TABLE IF EXISTS `detalleventaservicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detalleventaservicio` (
  `FacturaServicio_idFacturaServicio` int(11) NOT NULL,
  `Servicio_idServicio` int(11) NOT NULL,
  `Horas` time NOT NULL,
  PRIMARY KEY (`FacturaServicio_idFacturaServicio`,`Servicio_idServicio`),
  KEY `fk_VentaServicio_has_Servicio_Servicio1_idx` (`Servicio_idServicio`),
  KEY `fk_VentaServicio_has_Servicio_VentaServicio1_idx` (`FacturaServicio_idFacturaServicio`),
  CONSTRAINT `fk_VentaServicio_has_Servicio_Servicio1` FOREIGN KEY (`Servicio_idServicio`) REFERENCES `servicio` (`idServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VentaServicio_has_Servicio_VentaServicio1` FOREIGN KEY (`FacturaServicio_idFacturaServicio`) REFERENCES `facturaservicio` (`idFacturaServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idFactura` int(11) NOT NULL,
  `Cliente` int(11) NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  `FormaPago` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idFactura`),
  KEY `fk_Factura_Cliente1_idx` (`Cliente`),
  KEY `fk_Factura_Usuario1_idx` (`Usuario_cc`),
  KEY `fk_Factura_FormaPago1_idx` (`FormaPago`),
  CONSTRAINT `fk_Factura_Cliente1` FOREIGN KEY (`Cliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_FormaPago1` FOREIGN KEY (`FormaPago`) REFERENCES `formapago` (`idFormaPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idFacturaCompra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  `Proovedor_idProovedor` int(11) NOT NULL,
  PRIMARY KEY (`idFacturaCompra`),
  KEY `fk_FacturaCompra_Usuario1_idx` (`Usuario_cc`),
  KEY `fk_FacturaCompra_Proovedor1_idx` (`Proovedor_idProovedor`),
  CONSTRAINT `fk_FacturaCompra_Proovedor1` FOREIGN KEY (`Proovedor_idProovedor`) REFERENCES `proovedor` (`idProovedor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_FacturaCompra_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idFacturaServicio` int(11) NOT NULL,
  `Cliente` int(11) NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  `FormaPago` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idFacturaServicio`),
  KEY `fk_VentaServicio_Cliente1_idx` (`Cliente`),
  KEY `fk_FacturaServicio_Usuario1_idx` (`Usuario_cc`),
  KEY `fk_FacturaServicio_FormaPago1_idx` (`FormaPago`),
  CONSTRAINT `fk_FacturaServicio_FormaPago1` FOREIGN KEY (`FormaPago`) REFERENCES `formapago` (`idFormaPago`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_FacturaServicio_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_VentaServicio_Cliente1` FOREIGN KEY (`Cliente`) REFERENCES `cliente` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idFormaPago` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  PRIMARY KEY (`idFormaPago`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `formapago`
--

LOCK TABLES `formapago` WRITE;
/*!40000 ALTER TABLE `formapago` DISABLE KEYS */;
INSERT INTO `formapago` VALUES (1,'contado'),(2,'Tarjeta credito'),(3,'Tarjeta debito');
/*!40000 ALTER TABLE `formapago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `imagenproducto`
--

DROP TABLE IF EXISTS `imagenproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `imagenproducto` (
  `idImagenProducto` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idProducto` int(11) NOT NULL,
  PRIMARY KEY (`idImagenProducto`,`idProducto`),
  KEY `fk_ImagenProducto_Producto1_idx` (`idProducto`),
  CONSTRAINT `fk_ImagenProducto_Producto1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idImagenProyecto` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  PRIMARY KEY (`idImagenProyecto`,`idProyecto`),
  KEY `fk_ImagenProyecto_Proyecto1_idx` (`idProyecto`),
  CONSTRAINT `fk_ImagenProyecto_Proyecto1` FOREIGN KEY (`idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION
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
  `idProducto` int(11) NOT NULL,
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
INSERT INTO `producto` VALUES (1,'Protoboard MB102','La protoboard MB102 es una herramienta que se usa comúnmente en el diseño y creación de prácticas de circuitos electrónicos, para llevar a cabo toda clase de montajes de tipo electrónico.',5),(2,'Arduino UNO R3 Compatible','La board Arduino UNO R3 es un módulo diseñado para el desarrollo práctico y eficaz de circuitos electrónicos, con un gran número de entradas y salidas analógicas y digitales (salidas de señal PWM), no necesita drivers para sistemas operativos Linux o Mac, es compatible con los diferentes módulos arduino permitiendo de forma fácil adaptar comunicación inalámbrica XBee, comunicación Ethernet, entre otras.',6);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proovedor`
--

DROP TABLE IF EXISTS `proovedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proovedor` (
  `idProovedor` int(11) NOT NULL,
  `nombre` varchar(35) NOT NULL,
  `email` varchar(80) NOT NULL,
  `telefono` double NOT NULL,
  `Ciudad` int(11) NOT NULL,
  `TipoProducto` int(11) NOT NULL,
  PRIMARY KEY (`idProovedor`),
  KEY `fk_Proovedor_Ciudad1_idx` (`Ciudad`),
  KEY `fk_Proovedor_TipoProducto1_idx` (`TipoProducto`),
  CONSTRAINT `fk_Proovedor_Ciudad1` FOREIGN KEY (`Ciudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proovedor_TipoProducto1` FOREIGN KEY (`TipoProducto`) REFERENCES `tipoproducto` (`idTipoProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proovedor`
--

LOCK TABLES `proovedor` WRITE;
/*!40000 ALTER TABLE `proovedor` DISABLE KEYS */;
INSERT INTO `proovedor` VALUES (1,'Ricardo Pelaez','ripe@gmail.com',3007414967,1,1),(2,'Ivan Bettin','ivansito@gmail.com',3014567565,2,2);
/*!40000 ALTER TABLE `proovedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proyecto`
--

DROP TABLE IF EXISTS `proyecto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `empresa` varchar(40) NOT NULL,
  `Usuario_cc` int(11) NOT NULL,
  PRIMARY KEY (`idProyecto`,`Usuario_cc`),
  KEY `fk_Proyecto_Usuario1_idx` (`Usuario_cc`),
  CONSTRAINT `fk_Proyecto_Usuario1` FOREIGN KEY (`Usuario_cc`) REFERENCES `usuario` (`cc`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proyecto`
--

LOCK TABLES `proyecto` WRITE;
/*!40000 ALTER TABLE `proyecto` DISABLE KEYS */;
INSERT INTO `proyecto` VALUES (1,'Software para manejo de inventario','WriteSoft',1082456723),(2,'Software de servicio turistico','Spitia corporation',1216975405);
/*!40000 ALTER TABLE `proyecto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `idServicio` int(11) NOT NULL,
  `precio` double NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `TipoServicio` int(11) NOT NULL,
  PRIMARY KEY (`idServicio`),
  KEY `fk_Servicio_TipoServicio1_idx` (`TipoServicio`),
  CONSTRAINT `fk_Servicio_TipoServicio1` FOREIGN KEY (`TipoServicio`) REFERENCES `tiposervicio` (`idTipoServicio`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (1,40,'Mantenimiento de pc','Se le limpia no sé',1),(2,40,'Mantenimiento de Software','Se le arregla no sé',1);
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipoproducto`
--

DROP TABLE IF EXISTS `tipoproducto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipoproducto` (
  `idTipoProducto` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idTipoProducto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipoproducto`
--

LOCK TABLES `tipoproducto` WRITE;
/*!40000 ALTER TABLE `tipoproducto` DISABLE KEYS */;
INSERT INTO `tipoproducto` VALUES (1,'Placa computadora'),(2,'Ordenadores');
/*!40000 ALTER TABLE `tipoproducto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiposervicio`
--

DROP TABLE IF EXISTS `tiposervicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tiposervicio` (
  `idTipoServicio` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`idTipoServicio`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiposervicio`
--

LOCK TABLES `tiposervicio` WRITE;
/*!40000 ALTER TABLE `tiposervicio` DISABLE KEYS */;
INSERT INTO `tiposervicio` VALUES (1,'Mantenimiento'),(2,'Llamada de atencion al cliente'),(3,'Chat virtual - Atencion al cliente');
/*!40000 ALTER TABLE `tiposervicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipousuario`
--

DROP TABLE IF EXISTS `tipousuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipousuario` (
  `idTipoUsuario` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
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
  `nombreUsuario` varchar(100) NOT NULL,
  `password` varchar(45) NOT NULL,
  `TipoUsuario` int(11) NOT NULL,
  `Ciudad` int(11) NOT NULL,
  PRIMARY KEY (`cc`),
  KEY `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario`),
  KEY `fk_Usuario_Ciudad1_idx` (`Ciudad`),
  CONSTRAINT `fk_Usuario_Ciudad1` FOREIGN KEY (`Ciudad`) REFERENCES `ciudad` (`idCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_TipoUsuario1` FOREIGN KEY (`TipoUsuario`) REFERENCES `tipousuario` (`idTipoUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT INTO `usuario` VALUES (1082456723,'David','Vargas Ramos','Masculino','Davara2308@gmail.com',19,'hardhome','123',1,1),(1216975405,'Jesus Antonio','Ramos Villamizar','Masculino','fotoramosltda1234@gmail.com',18,'jesusramosv','123',1,3);
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-17 17:03:20
