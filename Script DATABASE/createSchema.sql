-- MySQL Script generated by MySQL Workbench
-- Sun May 14 06:51:12 2017
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema database_project
-- -----------------------------------------------------
DROP SCHEMA IF EXISTS `database_project` ;

-- -----------------------------------------------------
-- Schema database_project
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `database_project` DEFAULT CHARACTER SET utf8 ;
USE `database_project` ;

-- -----------------------------------------------------
-- Table `database_project`.`TipoUsuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`TipoUsuario` ;

CREATE TABLE IF NOT EXISTS `database_project`.`TipoUsuario` (
  `idTipoUsuario` INT NOT NULL,
  `descripcion` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`idTipoUsuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`Ciudad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`Ciudad` ;

CREATE TABLE IF NOT EXISTS `database_project`.`Ciudad` (
  `idCiudad` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idCiudad`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`Usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`Usuario` ;

CREATE TABLE IF NOT EXISTS `database_project`.`Usuario` (
  `cc` INT NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `apellido` VARCHAR(30) NOT NULL,
  `sexo` VARCHAR(10) NOT NULL,
  `email` VARCHAR(40) NOT NULL,
  `edad` INT NOT NULL,
  `TipoUsuario` INT NOT NULL,
  `Ciudad` INT NOT NULL,
  PRIMARY KEY (`cc`),
  INDEX `fk_Usuario_TipoUsuario1_idx` (`TipoUsuario` ASC),
  INDEX `fk_Usuario_Ciudad1_idx` (`Ciudad` ASC),
  CONSTRAINT `fk_Usuario_TipoUsuario1`
    FOREIGN KEY (`TipoUsuario`)
    REFERENCES `database_project`.`TipoUsuario` (`idTipoUsuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Usuario_Ciudad1`
    FOREIGN KEY (`Ciudad`)
    REFERENCES `database_project`.`Ciudad` (`idCiudad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`Proyecto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`Proyecto` ;

CREATE TABLE IF NOT EXISTS `database_project`.`Proyecto` (
  `idProyecto` INT NOT NULL,
  `descripcion` TEXT NOT NULL,
  `empresa` VARCHAR(40) NOT NULL,
  `Usuario_cc` INT NOT NULL,
  PRIMARY KEY (`idProyecto`, `Usuario_cc`),
  INDEX `fk_Proyecto_Usuario1_idx` (`Usuario_cc` ASC),
  CONSTRAINT `fk_Proyecto_Usuario1`
    FOREIGN KEY (`Usuario_cc`)
    REFERENCES `database_project`.`Usuario` (`cc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`Producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`Producto` ;

CREATE TABLE IF NOT EXISTS `database_project`.`Producto` (
  `idProducto` INT NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `cantidad` INT NOT NULL,
  `Compra_Usuario_cc` MEDIUMTEXT NOT NULL,
  `Compra_Proovedor` INT NOT NULL,
  PRIMARY KEY (`idProducto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`Cliente`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`Cliente` ;

CREATE TABLE IF NOT EXISTS `database_project`.`Cliente` (
  `idCliente` INT NOT NULL,
  `nombre` VARCHAR(30) NOT NULL,
  `telefono` MEDIUMTEXT NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  PRIMARY KEY (`idCliente`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`ImagenProyecto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`ImagenProyecto` ;

CREATE TABLE IF NOT EXISTS `database_project`.`ImagenProyecto` (
  `idImagenProyecto` INT NOT NULL,
  `descripcion` VARCHAR(20) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `idProyecto` INT NOT NULL,
  PRIMARY KEY (`idImagenProyecto`, `idProyecto`),
  INDEX `fk_ImagenProyecto_Proyecto1_idx` (`idProyecto` ASC),
  CONSTRAINT `fk_ImagenProyecto_Proyecto1`
    FOREIGN KEY (`idProyecto`)
    REFERENCES `database_project`.`Proyecto` (`idProyecto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`ImagenProducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`ImagenProducto` ;

CREATE TABLE IF NOT EXISTS `database_project`.`ImagenProducto` (
  `idImagenProducto` INT NOT NULL,
  `descripcion` VARCHAR(20) NOT NULL,
  `imagen` VARCHAR(100) NOT NULL,
  `idProducto` INT NOT NULL,
  PRIMARY KEY (`idImagenProducto`, `idProducto`),
  INDEX `fk_ImagenProducto_Producto1_idx` (`idProducto` ASC),
  CONSTRAINT `fk_ImagenProducto_Producto1`
    FOREIGN KEY (`idProducto`)
    REFERENCES `database_project`.`Producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`FormaPago`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`FormaPago` ;

CREATE TABLE IF NOT EXISTS `database_project`.`FormaPago` (
  `idFormaPago` INT NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`idFormaPago`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`FacturaServicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`FacturaServicio` ;

CREATE TABLE IF NOT EXISTS `database_project`.`FacturaServicio` (
  `idFacturaServicio` INT NOT NULL,
  `Cliente` INT NOT NULL,
  `Usuario_cc` INT NOT NULL,
  `FormaPago` INT NOT NULL,
  `Fecha` DATE NOT NULL,
  PRIMARY KEY (`idFacturaServicio`),
  INDEX `fk_VentaServicio_Cliente1_idx` (`Cliente` ASC),
  INDEX `fk_FacturaServicio_Usuario1_idx` (`Usuario_cc` ASC),
  INDEX `fk_FacturaServicio_FormaPago1_idx` (`FormaPago` ASC),
  CONSTRAINT `fk_VentaServicio_Cliente1`
    FOREIGN KEY (`Cliente`)
    REFERENCES `database_project`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FacturaServicio_Usuario1`
    FOREIGN KEY (`Usuario_cc`)
    REFERENCES `database_project`.`Usuario` (`cc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_FacturaServicio_FormaPago1`
    FOREIGN KEY (`FormaPago`)
    REFERENCES `database_project`.`FormaPago` (`idFormaPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`TipoServicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`TipoServicio` ;

CREATE TABLE IF NOT EXISTS `database_project`.`TipoServicio` (
  `idTipoServicio` INT NOT NULL,
  `descripcion` TEXT NOT NULL,
  PRIMARY KEY (`idTipoServicio`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`Servicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`Servicio` ;

CREATE TABLE IF NOT EXISTS `database_project`.`Servicio` (
  `idServicio` INT NOT NULL,
  `precio` DOUBLE NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` TEXT NOT NULL,
  `TipoServicio` INT NOT NULL,
  PRIMARY KEY (`idServicio`),
  INDEX `fk_Servicio_TipoServicio1_idx` (`TipoServicio` ASC),
  CONSTRAINT `fk_Servicio_TipoServicio1`
    FOREIGN KEY (`TipoServicio`)
    REFERENCES `database_project`.`TipoServicio` (`idTipoServicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`Factura`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`Factura` ;

CREATE TABLE IF NOT EXISTS `database_project`.`Factura` (
  `idFactura` INT NOT NULL,
  `Cliente` INT NOT NULL,
  `Usuario_cc` INT NOT NULL,
  `FormaPago` INT NOT NULL,
  `fecha` DATE NOT NULL,
  PRIMARY KEY (`idFactura`),
  INDEX `fk_Factura_Cliente1_idx` (`Cliente` ASC),
  INDEX `fk_Factura_Usuario1_idx` (`Usuario_cc` ASC),
  INDEX `fk_Factura_FormaPago1_idx` (`FormaPago` ASC),
  CONSTRAINT `fk_Factura_Cliente1`
    FOREIGN KEY (`Cliente`)
    REFERENCES `database_project`.`Cliente` (`idCliente`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_Usuario1`
    FOREIGN KEY (`Usuario_cc`)
    REFERENCES `database_project`.`Usuario` (`cc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_FormaPago1`
    FOREIGN KEY (`FormaPago`)
    REFERENCES `database_project`.`FormaPago` (`idFormaPago`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`DetalleFac`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`DetalleFac` ;

CREATE TABLE IF NOT EXISTS `database_project`.`DetalleFac` (
  `Factura` INT NOT NULL,
  `Producto` INT NOT NULL,
  `cantidad` DOUBLE NOT NULL,
  `valor` INT NOT NULL,
  PRIMARY KEY (`Factura`, `Producto`),
  INDEX `fk_Factura_has_Producto_Producto1_idx` (`Producto` ASC),
  INDEX `fk_Factura_has_Producto_Factura1_idx` (`Factura` ASC),
  CONSTRAINT `fk_Factura_has_Producto_Factura1`
    FOREIGN KEY (`Factura`)
    REFERENCES `database_project`.`Factura` (`idFactura`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Factura_has_Producto_Producto1`
    FOREIGN KEY (`Producto`)
    REFERENCES `database_project`.`Producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`TipoProducto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`TipoProducto` ;

CREATE TABLE IF NOT EXISTS `database_project`.`TipoProducto` (
  `idTipoProducto` INT NOT NULL,
  `descripcion` TEXT NOT NULL,
  PRIMARY KEY (`idTipoProducto`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`Proovedor`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`Proovedor` ;

CREATE TABLE IF NOT EXISTS `database_project`.`Proovedor` (
  `idProovedor` INT NOT NULL,
  `nombre` VARCHAR(35) NOT NULL,
  `email` VARCHAR(80) NOT NULL,
  `telefono` DOUBLE NOT NULL,
  `Ciudad` INT NOT NULL,
  `TipoProducto` INT NOT NULL,
  PRIMARY KEY (`idProovedor`),
  INDEX `fk_Proovedor_Ciudad1_idx` (`Ciudad` ASC),
  INDEX `fk_Proovedor_TipoProducto1_idx` (`TipoProducto` ASC),
  CONSTRAINT `fk_Proovedor_Ciudad1`
    FOREIGN KEY (`Ciudad`)
    REFERENCES `database_project`.`Ciudad` (`idCiudad`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Proovedor_TipoProducto1`
    FOREIGN KEY (`TipoProducto`)
    REFERENCES `database_project`.`TipoProducto` (`idTipoProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`DetalleVentaServicio`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`DetalleVentaServicio` ;

CREATE TABLE IF NOT EXISTS `database_project`.`DetalleVentaServicio` (
  `FacturaServicio_idFacturaServicio` INT NOT NULL,
  `Servicio_idServicio` INT NOT NULL,
  `Horas` TIME NOT NULL,
  PRIMARY KEY (`FacturaServicio_idFacturaServicio`, `Servicio_idServicio`),
  INDEX `fk_VentaServicio_has_Servicio_Servicio1_idx` (`Servicio_idServicio` ASC),
  INDEX `fk_VentaServicio_has_Servicio_VentaServicio1_idx` (`FacturaServicio_idFacturaServicio` ASC),
  CONSTRAINT `fk_VentaServicio_has_Servicio_VentaServicio1`
    FOREIGN KEY (`FacturaServicio_idFacturaServicio`)
    REFERENCES `database_project`.`FacturaServicio` (`idFacturaServicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_VentaServicio_has_Servicio_Servicio1`
    FOREIGN KEY (`Servicio_idServicio`)
    REFERENCES `database_project`.`Servicio` (`idServicio`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`FacturaCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`FacturaCompra` ;

CREATE TABLE IF NOT EXISTS `database_project`.`FacturaCompra` (
  `idFacturaCompra` INT NOT NULL,
  `fecha` DATE NOT NULL,
  `Usuario_cc` INT NOT NULL,
  PRIMARY KEY (`idFacturaCompra`),
  INDEX `fk_FacturaCompra_Usuario1_idx` (`Usuario_cc` ASC),
  CONSTRAINT `fk_FacturaCompra_Usuario1`
    FOREIGN KEY (`Usuario_cc`)
    REFERENCES `database_project`.`Usuario` (`cc`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `database_project`.`DetalleFacCompra`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `database_project`.`DetalleFacCompra` ;

CREATE TABLE IF NOT EXISTS `database_project`.`DetalleFacCompra` (
  `Producto_idProducto` INT NOT NULL,
  `FacturaCompra_idFacturaCompra` INT NOT NULL,
  `cantidad` DOUBLE NOT NULL,
  `valor` INT NOT NULL,
  PRIMARY KEY (`Producto_idProducto`, `FacturaCompra_idFacturaCompra`),
  INDEX `fk_Producto_has_FacturaCompra_FacturaCompra1_idx` (`FacturaCompra_idFacturaCompra` ASC),
  INDEX `fk_Producto_has_FacturaCompra_Producto1_idx` (`Producto_idProducto` ASC),
  CONSTRAINT `fk_Producto_has_FacturaCompra_Producto1`
    FOREIGN KEY (`Producto_idProducto`)
    REFERENCES `database_project`.`Producto` (`idProducto`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Producto_has_FacturaCompra_FacturaCompra1`
    FOREIGN KEY (`FacturaCompra_idFacturaCompra`)
    REFERENCES `database_project`.`FacturaCompra` (`idFacturaCompra`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;