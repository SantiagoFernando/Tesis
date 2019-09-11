/*
SQLyog Professional v13.1.1 (64 bit)
MySQL - 10.3.16-MariaDB : Database - dbprestamos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbprestamos` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `dbprestamos`;

/*Table structure for table `categoria` */

DROP TABLE IF EXISTS `categoria`;

CREATE TABLE `categoria` (
  `idcategoria` int(11) NOT NULL AUTO_INCREMENT,
  `nombrecategoria` varchar(100) NOT NULL,
  `estadocategoria` varchar(45) NOT NULL,
  PRIMARY KEY (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `categoria` */

insert  into `categoria`(`idcategoria`,`nombrecategoria`,`estadocategoria`) values 
(1,'PORTATIL','A'),
(2,'PROYECTOR','A');

/*Table structure for table `cuenta` */

DROP TABLE IF EXISTS `cuenta`;

CREATE TABLE `cuenta` (
  `idcuenta` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `clave` varchar(45) NOT NULL,
  `estadocuenta` varchar(45) NOT NULL,
  `personaid` int(11) NOT NULL,
  PRIMARY KEY (`idcuenta`),
  KEY `FK_cuenta_persona` (`personaid`),
  CONSTRAINT `FK_cuenta_persona` FOREIGN KEY (`personaid`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `cuenta` */

insert  into `cuenta`(`idcuenta`,`usuario`,`clave`,`estadocuenta`,`personaid`) values 
(1,1105153801,'8e56306048b3e21dd50be3cb04d7a4365a738fdd','A',1),
(2,1150314183,'da39a3ee5e6b4b0d3255bfef95601890afd80709','A',2);

/*Table structure for table `detalleprestamo` */

DROP TABLE IF EXISTS `detalleprestamo`;

CREATE TABLE `detalleprestamo` (
  `iddetalle` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `numeroequipo` int(11) NOT NULL,
  `equipoid` int(11) NOT NULL,
  KEY `FK_detalle_prestamo` (`iddetalle`),
  KEY `FK_detalle_equipo` (`equipoid`),
  CONSTRAINT `FK_detalle_equipo` FOREIGN KEY (`equipoid`) REFERENCES `equipo` (`idequipo`),
  CONSTRAINT `FK_detalle_prestamo` FOREIGN KEY (`iddetalle`) REFERENCES `prestamo` (`idprestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `detalleprestamo` */

/*Table structure for table `devolucion` */

DROP TABLE IF EXISTS `devolucion`;

CREATE TABLE `devolucion` (
  `iddevolucion` int(11) NOT NULL AUTO_INCREMENT,
  `fechadevolucion` date NOT NULL,
  `observacion` varchar(500) NOT NULL,
  `prestamoid` int(11) NOT NULL,
  PRIMARY KEY (`iddevolucion`),
  KEY `FK_devolucion_prestamo` (`prestamoid`),
  CONSTRAINT `FK_devolucion_prestamo` FOREIGN KEY (`prestamoid`) REFERENCES `prestamo` (`idprestamo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `devolucion` */

/*Table structure for table `equipo` */

DROP TABLE IF EXISTS `equipo`;

CREATE TABLE `equipo` (
  `idequipo` int(11) NOT NULL AUTO_INCREMENT,
  `adquisicion` varchar(100) NOT NULL,
  `serie` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `fechacompra` date NOT NULL,
  `fechabaja` date NOT NULL,
  `estadoprestamo` varchar(45) NOT NULL,
  `estadoequipo` varchar(45) NOT NULL,
  `categoriaid` int(11) NOT NULL,
  PRIMARY KEY (`idequipo`),
  KEY `FK_equipo_categoria` (`categoriaid`),
  CONSTRAINT `FK_equipo_categoria` FOREIGN KEY (`categoriaid`) REFERENCES `categoria` (`idcategoria`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `equipo` */

insert  into `equipo`(`idequipo`,`adquisicion`,`serie`,`marca`,`modelo`,`numero`,`ubicacion`,`fechacompra`,`fechabaja`,`estadoprestamo`,`estadoequipo`,`categoriaid`) values 
(1,'BBBBB',22,'DDD','RR44',2,'ADASD','2019-08-01','2019-08-01','D','A',1),
(2,'QWE',1123,'RVF','QWE',1,'XCV','2019-08-01','2019-08-01','D','A',1),
(3,'COMPRA',4581,'EPSON','WHITE',1,'LABORATORIO DISEÑO','2019-08-01','2019-08-01','D','A',2);

/*Table structure for table `persona` */

DROP TABLE IF EXISTS `persona`;

CREATE TABLE `persona` (
  `idpersona` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `direccion` varchar(500) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `cargo` varchar(45) NOT NULL,
  `rol` varchar(45) NOT NULL,
  `estadopersona` varchar(45) NOT NULL,
  PRIMARY KEY (`idpersona`,`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `persona` */

insert  into `persona`(`idpersona`,`cedula`,`apellido`,`nombre`,`direccion`,`telefono`,`email`,`cargo`,`rol`,`estadopersona`) values 
(1,1105153801,'CORREA VASQUEZ','SANTIAGO FERNANDO','LOJA',2103991,'santyfercova33@gmail.com','DOCENTE','ADMIN','A'),
(2,1150314183,'AGUILAR CABRERA','NATHALY DEL CISNE','LOJA',1234,'nathy@gmail.com','DOCENTE','ADMIN','I');

/*Table structure for table `prestamo` */

DROP TABLE IF EXISTS `prestamo`;

CREATE TABLE `prestamo` (
  `idprestamo` int(11) NOT NULL AUTO_INCREMENT,
  `persona` int(11) NOT NULL,
  `apellidoper` varchar(100) NOT NULL,
  `nombreper` varchar(100) NOT NULL,
  `fechaprestamo` date NOT NULL,
  `idper` int(11) NOT NULL,
  PRIMARY KEY (`idprestamo`),
  KEY `FK_prestamo_persona` (`idper`),
  CONSTRAINT `FK_prestamo_persona` FOREIGN KEY (`idper`) REFERENCES `persona` (`idpersona`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `prestamo` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
