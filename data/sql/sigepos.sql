/*
SQLyog Ultimate v8.54 
MySQL - 5.5.27 : Database - sigepos
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `adm_ma_contact` */

DROP TABLE IF EXISTS `adm_ma_contact`;

CREATE TABLE `adm_ma_contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `tipo_contacto` tinyint(1) NOT NULL DEFAULT '1',
  `id_tipo_identificacion` int(11) DEFAULT NULL,
  `numero_identificacion` varchar(128) DEFAULT NULL,
  `direccion` text,
  `telefonos` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `exonerado` tinyint(1) NOT NULL DEFAULT '0',
  `jubilado` tinyint(1) NOT NULL DEFAULT '0',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adm_ma_contact_1` (`id_tipo_identificacion`),
  CONSTRAINT `FK_adm_ma_contact_1` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `adm_ma_ident_t` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_contact` */

insert  into `adm_ma_contact`(`id`,`nombre`,`tipo_contacto`,`id_tipo_identificacion`,`numero_identificacion`,`direccion`,`telefonos`,`email`,`exonerado`,`jubilado`,`timestamp`) values (1,'Contacto de Prueba',1,1,'6545454545','54454jjhdfhj',NULL,NULL,1,0,'2013-01-21 18:00:38');

/*Table structure for table `adm_ma_contact_r` */

DROP TABLE IF EXISTS `adm_ma_contact_r`;

CREATE TABLE `adm_ma_contact_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_contacto` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adm_ma_contact_r_1` (`id_contacto`),
  KEY `FK_adm_ma_contact_r_2` (`id_tipo`),
  CONSTRAINT `FK_adm_ma_contact_r_1` FOREIGN KEY (`id_contacto`) REFERENCES `adm_ma_contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_adm_ma_contact_r_2` FOREIGN KEY (`id_tipo`) REFERENCES `adm_ma_contact_t` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_contact_r` */

/*Table structure for table `adm_ma_contact_t` */

DROP TABLE IF EXISTS `adm_ma_contact_t`;

CREATE TABLE `adm_ma_contact_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `modulo` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_contact_t` */

/*Table structure for table `adm_ma_docs_t` */

DROP TABLE IF EXISTS `adm_ma_docs_t`;

CREATE TABLE `adm_ma_docs_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID Principal de la Tabla',
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL COMMENT 'Descripción del Tipo de Documento',
  `modulo` int(11) NOT NULL COMMENT '1 Inventario, 2 Compras, 3 Ventas',
  `origen` varchar(50) DEFAULT NULL COMMENT 'ID de los tipo de Documentos desde donde se puede Importar',
  `tipo_fiscal` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indica a la Impresora Fiscal, le tipo de Documento Fiscal (No Fiscal=0, Factura=1, Nota de Débito=2, Nota de Crédito=3)',
  `afecta_cuentas` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indica si el Documento Afecta las Cuentas x Cobrar o x Pagar',
  `signo_cuentas` varchar(1) NOT NULL DEFAULT '+' COMMENT 'Indica como el Documento Afecta las Cuentas, si de la aumenta o disminuye',
  `contiene_renglones` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indica si el Documento Tiene Renglones de Inventario',
  `afecta_inventario` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indica si el Documento Afecta Inventario a Nivel de Existencias',
  `reserva_inventario` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Indica si el Documento Compromete la mercancia sin Afectar el Inventario Directamente',
  `signo_inventario` varchar(1) NOT NULL DEFAULT '+' COMMENT 'Indica el Signo de como afecta el Inventario',
  `id_cuenta` int(11) DEFAULT NULL COMMENT 'ID de la Cuenta Contable que Afecta el Renglón',
  `activo` tinyint(1) NOT NULL DEFAULT '1' COMMENT 'Indica si el Tipo e Docmento está Activo',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `documentos_tipo_idx1` (`modulo`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_docs_t` */

insert  into `adm_ma_docs_t`(`id`,`nombre`,`modulo`,`origen`,`tipo_fiscal`,`afecta_cuentas`,`signo_cuentas`,`contiene_renglones`,`afecta_inventario`,`reserva_inventario`,`signo_inventario`,`id_cuenta`,`activo`,`timestamp`) values (1,'FACTURA',2,NULL,0,1,'+',1,1,0,'+',NULL,1,'2012-06-08 19:30:01'),(2,'GASTOS',2,NULL,0,1,'+',0,0,0,'+',NULL,1,'2012-06-08 19:35:09'),(3,'FACTURA',3,'5,15',1,1,'+',1,1,0,'-',NULL,1,'2012-08-08 13:51:18'),(4,'FACTURA (MANUAL)',3,NULL,0,1,'+',0,0,0,'-',NULL,1,'2012-06-08 19:35:09'),(5,'COTIZACIÓN',3,NULL,0,0,'+',1,0,0,'-',NULL,1,'2012-06-08 19:35:09'),(6,'DEVOLUCIÓN',2,NULL,0,1,'-',1,1,0,'+',NULL,1,'2012-06-08 19:35:09'),(7,'DEVOLUCIÓN',3,NULL,3,1,'-',1,1,0,'+',NULL,1,'2012-07-16 14:23:27'),(8,'COMPRA DE ACTIVOS',2,NULL,0,1,'+',0,0,0,'+',NULL,1,'2012-06-11 13:33:59'),(9,'CONTRATO DE VENTA',3,'5,18',0,0,'+',1,1,0,'-',NULL,1,'2012-07-09 17:59:41'),(10,'NOTA DE CRÉDITO',2,NULL,0,1,'-',0,0,0,'+',NULL,1,'2012-06-08 19:35:09'),(11,'NOTA DE CRÉDITO',3,NULL,3,1,'-',0,0,0,'+',NULL,1,'2012-07-16 14:23:14'),(12,'NOTA DE DÉBITO',2,NULL,0,1,'+',0,0,0,'+',NULL,1,'2012-06-08 19:35:09'),(13,'NOTA DE DÉBITO',3,NULL,2,1,'+',0,0,0,'+',NULL,1,'2012-07-16 14:23:11'),(14,'ORDEN DE COMPRA',2,NULL,0,0,'+',1,0,0,'+',NULL,1,'2012-06-08 19:35:09'),(15,'NOTA DE ENTREGA',3,NULL,0,0,'+',1,1,0,'-',NULL,1,'2012-06-08 19:35:09'),(16,'PRESUPUESTO',2,NULL,0,1,'+',0,0,0,'+',NULL,1,'2012-06-08 19:35:09'),(17,'FACTURA',2,NULL,0,1,'+',0,0,0,'+',NULL,1,'2012-06-08 19:35:09'),(18,'RESERVA',3,'5',0,0,'+',1,1,0,'-',NULL,1,'2012-07-09 17:59:33'),(19,'ANTICIPO',2,NULL,0,1,'-',0,0,0,'+',NULL,1,'2012-06-26 17:26:52'),(20,'ANTICIPO',3,NULL,0,1,'-',0,0,0,'+',NULL,1,'2012-06-26 17:27:01'),(21,'CUOTA',3,'9,18',0,1,'+',0,0,0,'+',NULL,1,'2012-07-09 17:58:45'),(22,'CARTA PROMESA',3,'9,18',0,1,'+',0,0,0,'+',NULL,1,'2012-07-09 17:59:00');

/*Table structure for table `adm_ma_emp` */

DROP TABLE IF EXISTS `adm_ma_emp`;

CREATE TABLE `adm_ma_emp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_tipo_identificacion` int(11) DEFAULT NULL,
  `numero_identificacion` varchar(128) DEFAULT NULL,
  `id_principal` int(11) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adm_ma_emp_1` (`id_tipo_identificacion`),
  KEY `FK_adm_ma_emp_2` (`id_principal`),
  CONSTRAINT `FK_adm_ma_emp_1` FOREIGN KEY (`id_tipo_identificacion`) REFERENCES `adm_ma_ident_t` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_adm_ma_emp_2` FOREIGN KEY (`id_principal`) REFERENCES `adm_ma_emp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_emp` */

insert  into `adm_ma_emp`(`id`,`nombre`,`id_tipo_identificacion`,`numero_identificacion`,`id_principal`,`timestamp`) values (1,'Empresa de Prueba',2,'2121212121',NULL,'2012-12-26 10:25:38');

/*Table structure for table `adm_ma_emp_users_r` */

DROP TABLE IF EXISTS `adm_ma_emp_users_r`;

CREATE TABLE `adm_ma_emp_users_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adm_ma_emp_users_r_1` (`id_empresa`),
  KEY `FK_adm_ma_emp_users_r_2` (`id_usuario`),
  CONSTRAINT `FK_adm_ma_emp_users_r_1` FOREIGN KEY (`id_empresa`) REFERENCES `adm_ma_emp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_adm_ma_emp_users_r_2` FOREIGN KEY (`id_usuario`) REFERENCES `adm_ma_users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_emp_users_r` */

/*Table structure for table `adm_ma_ident_t` */

DROP TABLE IF EXISTS `adm_ma_ident_t`;

CREATE TABLE `adm_ma_ident_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_ident_t` */

insert  into `adm_ma_ident_t`(`id`,`nombre`,`timestamp`) values (1,'Cédula','2012-12-24 18:15:22'),(2,'RUC y DV','2012-12-24 18:15:31'),(3,'Pasaporte','2012-12-24 18:15:35');

/*Table structure for table `adm_ma_items` */

DROP TABLE IF EXISTS `adm_ma_items`;

CREATE TABLE `adm_ma_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `costo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `precio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `id_impuesto` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adm_ma_items_1` (`id_tipo`),
  KEY `FK_adm_ma_items_2` (`id_impuesto`),
  CONSTRAINT `FK_adm_ma_items_1` FOREIGN KEY (`id_tipo`) REFERENCES `adm_ma_items_t` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_adm_ma_items_2` FOREIGN KEY (`id_impuesto`) REFERENCES `adm_ma_tax` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_items` */

insert  into `adm_ma_items`(`id`,`id_tipo`,`nombre`,`costo`,`precio`,`id_impuesto`,`timestamp`) values (1,1,'Producto de Prueba','0.00','10.00',1,'2012-12-24 18:14:22'),(2,1,'Producto 1','0.00','15.00',1,'2013-01-21 09:41:12'),(3,1,'Producto 2','0.00','15.00',2,'2013-01-21 09:41:27'),(4,1,'Producto 3','0.00','15.00',3,'2013-01-21 09:41:43'),(5,1,'Producto 4','0.00','15.00',4,'2013-01-21 09:41:56');

/*Table structure for table `adm_ma_items_t` */

DROP TABLE IF EXISTS `adm_ma_items_t`;

CREATE TABLE `adm_ma_items_t` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_items_t` */

insert  into `adm_ma_items_t`(`id`,`nombre`,`timestamp`) values (1,'Tipo Prueba','2012-12-26 10:39:43');

/*Table structure for table `adm_ma_tax` */

DROP TABLE IF EXISTS `adm_ma_tax`;

CREATE TABLE `adm_ma_tax` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(128) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `porcentaje` decimal(6,2) NOT NULL DEFAULT '0.00',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_tax` */

insert  into `adm_ma_tax`(`id`,`nombre`,`alias`,`porcentaje`,`timestamp`) values (1,'Exento','EXENTO','0.00','2012-12-24 17:40:36'),(2,'Impuesto Tributario de Bienes Muebles y Servicios (General) ','ITBMS 7%','7.00','2012-12-24 17:39:58'),(3,'Impuesto Tributario de Bienes Muebles y Servicios (Licor) ','ITBMS 10%','10.00','2012-12-24 17:39:56'),(4,'Impuesto Tributario de Bienes Muebles y Servicios (Cigarrillos) ','ITBMS 15%','15.00','2012-12-24 17:39:54');

/*Table structure for table `adm_ma_users` */

DROP TABLE IF EXISTS `adm_ma_users`;

CREATE TABLE `adm_ma_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_contacto` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adm_ma_users_1` (`id_contacto`),
  CONSTRAINT `FK_adm_ma_users_1` FOREIGN KEY (`id_contacto`) REFERENCES `adm_ma_contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `adm_ma_users` */

/*Table structure for table `adm_tr_docs` */

DROP TABLE IF EXISTS `adm_tr_docs`;

CREATE TABLE `adm_tr_docs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `numero_documento` varchar(128) DEFAULT NULL,
  `id_contacto` int(11) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `monto_exento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_gravado` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_impuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_descuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comentarios` text,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adm_tr_docs_1` (`id_tipo`),
  KEY `FK_adm_tr_docs_2` (`id_empresa`),
  KEY `FK_adm_tr_docs_3` (`id_contacto`),
  CONSTRAINT `FK_adm_tr_docs_1` FOREIGN KEY (`id_tipo`) REFERENCES `adm_ma_docs_t` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_adm_tr_docs_2` FOREIGN KEY (`id_empresa`) REFERENCES `adm_ma_emp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_adm_tr_docs_3` FOREIGN KEY (`id_contacto`) REFERENCES `adm_ma_contact` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

/*Data for the table `adm_tr_docs` */

insert  into `adm_tr_docs`(`id`,`id_empresa`,`id_tipo`,`numero_documento`,`id_contacto`,`fecha_emision`,`fecha_vencimiento`,`monto_exento`,`monto_gravado`,`monto_impuesto`,`monto_descuento`,`comentarios`,`timestamp`) values (1,1,1,NULL,1,'2012-12-20','2012-12-20','0.00','0.00','0.00','0.00','','2012-12-26 10:25:49'),(2,1,1,NULL,1,'2012-12-20','2012-12-20','0.00','0.00','0.00','0.00','','2012-12-26 10:25:50'),(3,1,1,NULL,1,'2012-12-20','2012-12-20','0.00','0.00','0.00','0.00','tatatatata','2012-12-26 10:25:51'),(4,1,1,'',1,'2013-01-22','2013-01-21','0.00','0.00','0.00','0.00','','2013-01-21 09:46:48'),(5,1,1,'',1,'2013-01-21','2013-01-21','0.00','0.00','0.00','0.00','','2013-01-21 09:50:35'),(6,1,1,'',1,'2013-01-21','2013-01-21','0.00','0.00','0.00','0.00','','2013-01-21 09:50:36'),(7,1,1,'',1,'2013-01-21','2013-01-15','0.00','0.00','0.00','0.00','','2013-01-21 11:09:04'),(8,1,1,'',1,'2013-01-21','2013-01-15','0.00','0.00','0.00','0.00','','2013-01-21 11:09:06'),(9,1,1,'00001',1,'2013-01-21','2013-01-21','0.00','0.00','0.00','0.00','','2013-01-21 11:46:51'),(10,1,1,'',1,'2013-01-21','2013-01-21','0.00','0.00','0.00','0.00','comentario de prueba','2013-01-21 13:00:23'),(11,1,1,'1',1,'2013-01-22','2013-01-07','0.00','155.00','4.80','0.00','','2013-01-30 08:49:18'),(12,1,1,'',1,'2013-01-16','2013-01-05','0.00','410.00','3.30','0.00','','2013-01-31 13:11:27');

/*Table structure for table `adm_tr_docs_detalle_r` */

DROP TABLE IF EXISTS `adm_tr_docs_detalle_r`;

CREATE TABLE `adm_tr_docs_detalle_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_documento` int(11) NOT NULL,
  `id_items` int(11) NOT NULL,
  `descripcion` varchar(256) NOT NULL,
  `cantidad` decimal(10,3) NOT NULL DEFAULT '0.000',
  `costo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `precio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_impuesto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `alias_impuesto` varchar(128) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adm_tr_docs_detalle_r_2` (`id_items`),
  KEY `FK_adm_tr_docs_detalle_r_1` (`id_documento`),
  CONSTRAINT `FK_adm_tr_docs_detalle_r_1` FOREIGN KEY (`id_documento`) REFERENCES `adm_tr_docs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `FK_adm_tr_docs_detalle_r_2` FOREIGN KEY (`id_items`) REFERENCES `adm_ma_items` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `adm_tr_docs_detalle_r` */

insert  into `adm_tr_docs_detalle_r`(`id`,`id_documento`,`id_items`,`descripcion`,`cantidad`,`costo`,`precio`,`monto_impuesto`,`alias_impuesto`,`timestamp`) values (1,3,1,'Descripcion de Prueba','10.000','0.00','0.50','0.00',NULL,'2012-12-20 18:11:42'),(2,3,1,'','0.000','0.00','0.00','0.00',NULL,'2012-12-20 18:11:42'),(3,4,1,'Producto de Prueba','1.000','10.00','10.00','10.00','EXENTO','2013-01-21 09:46:48'),(4,4,2,'Producto 1','1.000','15.00','15.00','15.00','EXENTO','2013-01-21 09:46:48'),(5,4,3,'Producto 2','1.000','15.00','15.00','15.00','ITBMS 7%','2013-01-21 09:46:48'),(6,4,4,'Producto 3','1.000','15.00','15.00','15.00','ITBMS 10%','2013-01-21 09:46:48'),(7,4,5,'Producto 4','1.000','15.00','15.00','15.00','ITBMS 15%','2013-01-21 09:46:48'),(8,5,3,'Producto 2','1.000','15.00','15.00','15.00','ITBMS 7%','2013-01-21 09:50:35'),(9,5,2,'Producto 1','1.000','15.00','15.00','15.00','EXENTO','2013-01-21 09:50:35'),(10,5,4,'Producto 3','1.000','15.00','15.00','15.00','ITBMS 10%','2013-01-21 09:50:35'),(11,6,3,'Producto 2','1.000','15.00','15.00','15.00','ITBMS 7%','2013-01-21 09:50:36'),(12,6,2,'Producto 1','1.000','15.00','15.00','15.00','EXENTO','2013-01-21 09:50:36'),(13,6,4,'Producto 3','1.000','15.00','15.00','15.00','ITBMS 10%','2013-01-21 09:50:36'),(14,7,2,'Producto 1','1.000','100.00','100.00','100.00','EXENTO','2013-01-21 11:09:04'),(15,7,3,'Producto 2','1.000','100.00','100.00','100.00','ITBMS 7%','2013-01-21 11:09:04'),(16,8,2,'Producto 1','1.000','100.00','100.00','100.00','EXENTO','2013-01-21 11:09:06'),(17,8,3,'Producto 2','1.000','100.00','100.00','100.00','ITBMS 7%','2013-01-21 11:09:06'),(18,9,1,'Producto de Prueba cambio de descripción','1.000','10.00','10.00','10.00','EXENTO','2013-01-21 11:46:51'),(19,10,3,'Producto 2','1.000','15.00','15.00','15.00','ITBMS 7%','2013-01-21 13:00:23'),(20,11,1,'Producto de Prueba','1.000','0.00','10.00','0.00','EXENTO','2013-01-30 08:43:58'),(21,11,1,'Producto de Prueba precio modificado','1.000','0.00','100.00','0.00','EXENTO','2013-01-30 08:43:58'),(22,11,3,'Producto 2','1.000','0.00','15.00','1.05','ITBMS 7%','2013-01-30 08:44:16'),(23,11,4,'Producto 3','1.000','0.00','15.00','1.50','ITBMS 10%','2013-01-30 08:44:16'),(24,11,5,'Producto 4','1.000','0.00','15.00','2.25','ITBMS 15%','2013-01-30 08:44:16'),(25,12,1,'Producto de Prueba','35.000','0.00','10.00','0.00','EXENTO','2013-01-31 12:29:06'),(26,12,2,'Producto 1','1.000','0.00','15.00','0.00','EXENTO','2013-01-31 12:28:49'),(27,12,2,'Producto 1','1.000','0.00','15.00','0.00','EXENTO','2013-01-31 12:28:49'),(28,12,3,'Producto 2','1.000','0.00','15.00','1.05','ITBMS 7%','2013-01-31 12:32:04'),(29,12,5,'Producto 4','1.000','0.00','15.00','2.25','ITBMS 15%','2013-01-31 13:11:27');

/*Table structure for table `adm_tr_docs_fiscal_r` */

DROP TABLE IF EXISTS `adm_tr_docs_fiscal_r`;

CREATE TABLE `adm_tr_docs_fiscal_r` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_documento` int(11) NOT NULL,
  `serial_equipo` varchar(128) NOT NULL,
  `reimpresion` tinyint(1) NOT NULL DEFAULT '0',
  `numero_comprobante` varchar(128) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_adm_tr_docs_fisc_r_1` (`id_documento`),
  CONSTRAINT `FK_adm_tr_docs_fisc_r_1` FOREIGN KEY (`id_documento`) REFERENCES `adm_tr_docs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `adm_tr_docs_fiscal_r` */

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
