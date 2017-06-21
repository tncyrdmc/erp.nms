-- MySQL dump 10.13  Distrib 5.7.12, for Win64 (x86_64)
--
-- Host: localhost    Database: erpmultinivel
-- ------------------------------------------------------
-- Server version	5.7.14

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
-- Table structure for table `afiliar`
--

DROP TABLE IF EXISTS `afiliar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `afiliar` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_red` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL,
  `debajo_de` int(11) NOT NULL,
  `directo` int(11) NOT NULL,
  `lado` varchar(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `afiliar`
--

LOCK TABLES `afiliar` WRITE;
/*!40000 ALTER TABLE `afiliar` DISABLE KEYS */;
INSERT INTO `afiliar` VALUES (2,1,2,1,1,'0');
/*!40000 ALTER TABLE `afiliar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `almacen`
--

DROP TABLE IF EXISTS `almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `almacen` (
  `id_almacen` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `descripcion` text,
  `ciudad` varchar(255) NOT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `web` tinyint(4) NOT NULL DEFAULT '0',
  `creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  PRIMARY KEY (`id_almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `almacen`
--

LOCK TABLES `almacen` WRITE;
/*!40000 ALTER TABLE `almacen` DISABLE KEYS */;
/*!40000 ALTER TABLE `almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivero`
--

DROP TABLE IF EXISTS `archivero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivero` (
  `id_archivero` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `extencion` varchar(10) NOT NULL,
  `nombre_completo` varchar(255) NOT NULL,
  `tamano` varchar(50) NOT NULL,
  `url` varchar(255) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_archivero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivero`
--

LOCK TABLES `archivero` WRITE;
/*!40000 ALTER TABLE `archivero` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivero_cedi`
--

DROP TABLE IF EXISTS `archivero_cedi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivero_cedi` (
  `id_archivero` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `extension` varchar(5) NOT NULL,
  `nombre_completo` varchar(105) NOT NULL,
  `tamano` varchar(10) NOT NULL,
  `url` varchar(150) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_archivero`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivero_cedi`
--

LOCK TABLES `archivero_cedi` WRITE;
/*!40000 ALTER TABLE `archivero_cedi` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivero_cedi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivo`
--

DROP TABLE IF EXISTS `archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion` text NOT NULL,
  `ruta` varchar(200) NOT NULL,
  `status` varchar(3) NOT NULL,
  `nombre_publico` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_archivo`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo`
--

LOCK TABLES `archivo` WRITE;
/*!40000 ALTER TABLE `archivo` DISABLE KEYS */;
INSERT INTO `archivo` VALUES (7,1,7,1,'2015-10-12 15:38:35','Biografía Steve Jobs','/media/ebooks/Biografia_Steve_jobs_Walter_Isaacson1.pdf','ACT','Biografía Steve Jobs'),(8,1,7,1,'2015-10-12 15:39:48','Como superar el fracaso y obtener el exito','/media/ebooks/Como_superar_el_fracaso_y_obtener_el_exito_-_Aut_Napolion_Hill.pdf','ACT','Como superar el fracaso y obtener el exito'),(9,1,7,1,'2015-10-12 15:41:31','El cuadrante del flujo del dinero','/media/ebooks/El_Cuadrante_Del_Flujo_De_Dinero_-_Aut_Robert_Kiyosaki.pdf','ACT','El cuadrante del flujo del dinero'),(10,1,7,1,'2015-10-12 15:42:53','El negocio del siglo 21','/media/ebooks/El_negocio_del_siglo_21_-_Aut_Robert_Kiyosaki1.pdf','ACT','El negocio del siglo 21'),(11,1,7,1,'2015-10-12 15:44:19','La presentación de 45 segundos que cambiara su vida','/media/ebooks/La_presentacion_de_45_segundos_que_cambiara_su_vida_-_Aut_Don_Falia.pdf','ACT',' La presentación de 45 segundos que cambiara su vida'),(12,1,7,1,'2015-10-12 15:45:41','Marketing multinivel y directo de red','/media/ebooks/Marketing_Multinivel_y_Directo_de_Red_-_Aut_Allen_Carmichael.pdf','ACT','Marketing multinivel y directo de red'),(13,1,7,1,'2015-10-12 15:48:58','Robert T Kiyosaki','/media/ebooks/Padre_Rico,_Padre_Pobre_-_Robert_T_Kiyosaki_(El_bueno).pdf','ACT',' Padre rico, padre pobre'),(14,1,7,1,'2015-10-12 15:51:41','Como ganar amigos e influir sobre las personas. Carnegie Dale','/media/ebooks/CarnegieDale-CmoGanarAmigoseInfluirsobrelasPersonas.pdf','ACT','Como ganar amigos e influir'),(15,1,7,1,'2015-10-12 15:52:41','Robert Kiyosaki','/media/ebooks/El_Network_Marketing_como_activo_-_Aut_Robert_Kiyosaki1.pdf','ACT','El network marketing como activo'),(16,1,7,1,'2015-10-12 15:53:39','Napoleon Hill','/media/ebooks/Piense_y_hagase_rico_-_Aut_Napoleon_Hill.pdf','ACT','Piense y hagase rico'),(17,1,7,1,'2015-10-12 15:57:20','Robert Kiyosaki','/media/ebooks/Escuela_de_Negocios_-_Aut._Robert_Kiyosaki_(1)_.pdf','ACT','Escuela de Negocios'),(18,1,7,1,'2015-10-12 15:58:09','T harv Eker','/media/ebooks/Los_secretos_de_la_mente_millonaria_-_Aut_T._Harv_Eker_2_.pdf','ACT','Los secretos de la mente millonaria'),(19,1,7,1,'2015-10-12 15:59:21','Entrevista por Mike Dillard','/media/ebooks/Mike_Dillard_entrevista_a_Robert_Kiyosaki_-_Entrevista_de_Mike_Dillard._1_.pdf','ACT','Entrevista a Robert Kiyosaki'),(20,1,7,1,'2015-10-12 16:00:13','Despertando al Giagante Interior','/media/ebooks/Despertandoalgiganteinterior_Anthony_Robbins.pdf','ACT','Despertando al Giagante Interior'),(21,1,2,21,'2015-10-12 16:01:33','Libertad Financiera - Apalancamiento','https://www.youtube.com/watch?v=0P9GbFfTafQ','ACT','Libertad Financiera - Apalancamiento'),(22,1,7,1,'2015-10-12 16:01:46','Despertando al Giagante Interior','/media/ebooks/El_Monje_que_vendio_su_Ferrari.pdf','ACT','El Monje Que Vendio su Ferrari'),(23,1,7,1,'2015-10-12 16:02:42','La actitud mental positiva','/media/ebooks/La_actitud_mental_positiva.pdf','ACT','La Actitud Mental Positiva'),(24,1,7,1,'2015-10-12 16:03:44','Los 4 Acuerdos, Miguel Ruiz','/media/ebooks/Los_4_Acuerdos_Miguel_Ruiz.pdf','ACT','Los 4 Acuerdos'),(25,1,2,21,'2015-10-12 16:04:15','El Negocio que esta haciendo Mas Millonarios en el Mundo','https://www.youtube.com/watch?t=2&v=Ill05TVFABg','ACT','El Negocio que esta haciendo Mas Millona'),(26,1,7,1,'2015-10-12 16:04:36','Los 7 habitos de la gente altamente efectiva','/media/ebooks/los-7-habitos-de-la-gente-altamente-efectiva.pdf','ACT','Los 7 habitos de la gente altamente efectiva'),(27,1,7,1,'2015-10-12 16:05:19','Pasos de gigante, Anthony Robbins','/media/ebooks/Pasos_de_Gigante_-_Anthony_Robbins.pdf','ACT','Pasos de Gigante'),(28,1,2,21,'2015-10-12 16:05:25','Explicación que es el Network Marketing o Multinivel','https://www.youtube.com/watch?v=t7o9vIbooLo','ACT','Network Marketing o Multinivel'),(29,1,7,1,'2015-10-12 16:06:10','Poder sin limites, Anthony Robbins','/media/ebooks/Poder-sin-Limites.pdf-Anthony-Robbins__.pdf','ACT','Poder Sin Limites'),(30,1,7,1,'2015-10-12 16:06:59','Tus Zonas Erroneas','/media/ebooks/Tus_zonas_erroneas.pdf','ACT','Tus Zonas Erroneas'),(31,1,4,21,'2015-10-12 16:07:38','Randy Pausch – Su historia de vida y gran mensaje','https://www.youtube.com/watch?v=e0ZwxhFUAOo','ACT','Randy Pausch – Su historia de vida y gra'),(32,1,4,21,'2015-10-12 16:08:39','Steve Jobs Discurso en Stanford','https://www.youtube.com/watch?v=HHkJEz_HdTg','ACT','Steve Jobs Discurso en Stanford'),(33,1,4,21,'2015-10-12 16:10:16','1997 (narrado por Steve Jobs)','https://www.youtube.com/watch?v=H8D7PjA3S7E','ACT','Comercial Piensa Diferente de Apple'),(39,1,5,21,'2015-10-12 16:21:29','Las 7 leyes espiritualies del exito. Deepak Chopra','https://www.youtube.com/watch?v=uHQSioACws0','ACT','Las 7 leyes espiritualies del exito.'),(40,1,5,21,'2015-10-12 16:22:16','El Vendedor Mas Grande del Mundo','https://www.youtube.com/watch?v=I1KjYstLfYw','ACT','El Vendedor Mas Grande del Mundo'),(41,1,3,21,'2015-10-12 16:23:58','Sesenta Minutos Para Volverse Rico Robert Kiyosaki','https://www.youtube.com/watch?v=IhK6NB7l4gw','ACT','Sesenta Minutos Para Volverse Rico Robert Kiyosaki'),(42,1,3,21,'2015-10-12 16:25:01','Importancia de la EDUCACIÓN FINANCIERA R en Lima – Perú','https://www.youtube.com/watch?v=xvZkTkGzrWc','ACT','Importancia de la EDUCACIÓN FINANCIERA R'),(43,1,3,21,'2015-10-12 16:31:12','EL NEGOCIO PERFECTO','https://www.youtube.com/watch?v=oaMDj4w-ERI','ACT','EL NEGOCIO PERFECTO'),(44,1,3,21,'2015-10-12 16:27:01','Robert kiyosaki y Donald trump hablan de las redes de mercadeo','https://www.youtube.com/watch?t=7&v=bOMzX6KX2gw','ACT','Robert kiyosaki y Donald trump hablan de');
/*!40000 ALTER TABLE `archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `archivo_soporte_tecnico`
--

DROP TABLE IF EXISTS `archivo_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `archivo_soporte_tecnico` (
  `id_archivo` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `descripcion` varchar(45) NOT NULL,
  `ruta` text NOT NULL,
  `status` varchar(45) NOT NULL,
  `nombre_publico` text,
  `id_red` int(11) NOT NULL,
  PRIMARY KEY (`id_archivo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `archivo_soporte_tecnico`
--

LOCK TABLES `archivo_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `archivo_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `archivo_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `autocompra`
--

DROP TABLE IF EXISTS `autocompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `autocompra` (
  `id_autocompra` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_autocompra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `autocompra`
--

LOCK TABLES `autocompra` WRITE;
/*!40000 ALTER TABLE `autocompra` DISABLE KEYS */;
/*!40000 ALTER TABLE `autocompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `banner`
--

DROP TABLE IF EXISTS `banner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `banner` (
  `id` int(11) NOT NULL DEFAULT '1',
  `titulo` varchar(200) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `nombre_banner` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `banner`
--

LOCK TABLES `banner` WRITE;
/*!40000 ALTER TABLE `banner` DISABLE KEYS */;
INSERT INTO `banner` VALUES (1,'Mi Empresa multinivel','La mejor empresa multinivel, lo acompañamos a que sea un comerciante exitoso.','empresa.png');
/*!40000 ALTER TABLE `banner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `billetera`
--

DROP TABLE IF EXISTS `billetera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `billetera` (
  `id_user` int(11) NOT NULL,
  `pswd` varchar(250) DEFAULT NULL,
  `estatus` varchar(3) NOT NULL,
  `activo` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `billetera`
--

LOCK TABLES `billetera` WRITE;
/*!40000 ALTER TABLE `billetera` DISABLE KEYS */;
/*!40000 ALTER TABLE `billetera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bono`
--

DROP TABLE IF EXISTS `bono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `inicio` varchar(45) NOT NULL,
  `fin` varchar(45) NOT NULL,
  `mes_desde_afiliacion` int(11) NOT NULL DEFAULT '0',
  `mes_desde_activacion` int(11) NOT NULL DEFAULT '0',
  `frecuencia` varchar(3) NOT NULL,
  `plan` varchar(2) NOT NULL DEFAULT 'NO',
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bono`
--

LOCK TABLES `bono` WRITE;
/*!40000 ALTER TABLE `bono` DISABLE KEYS */;
/*!40000 ALTER TABLE `bono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `canal`
--

DROP TABLE IF EXISTS `canal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `canal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `alias` varchar(15) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `estatus` varchar(3) DEFAULT 'ACT',
  `gastos` float DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `canal`
--

LOCK TABLES `canal` WRITE;
/*!40000 ALTER TABLE `canal` DISABLE KEYS */;
INSERT INTO `canal` VALUES (1,'carrito','Carrito de Compras','ACT',30),(2,'cedi','CEDI','ACT',0),(3,'vip','Web Personal','DES',0);
/*!40000 ALTER TABLE `canal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `carrito_temporal`
--

DROP TABLE IF EXISTS `carrito_temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `carrito_temporal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `carrito_temporal`
--

LOCK TABLES `carrito_temporal` WRITE;
/*!40000 ALTER TABLE `carrito_temporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito_temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_banco`
--

DROP TABLE IF EXISTS `cat_banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_banco` (
  `id_banco` int(11) NOT NULL AUTO_INCREMENT,
  `id_pais` varchar(3) NOT NULL DEFAULT 'COl',
  `cuenta` varchar(100) DEFAULT NULL,
  `descripcion` varchar(50) NOT NULL,
  `clave` varchar(20) NOT NULL,
  `swift` varchar(45) DEFAULT NULL,
  `otro` varchar(45) DEFAULT NULL,
  `dir_postal` varchar(100) DEFAULT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_banco`,`id_pais`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_banco`
--

LOCK TABLES `cat_banco` WRITE;
/*!40000 ALTER TABLE `cat_banco` DISABLE KEYS */;
INSERT INTO `cat_banco` VALUES (1,'COL','326342648','BBVA','','','NetworkSoft','','ACT');
/*!40000 ALTER TABLE `cat_banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_bono_condicion`
--

DROP TABLE IF EXISTS `cat_bono_condicion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_bono_condicion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bono` int(11) NOT NULL,
  `id_rango` int(11) NOT NULL,
  `id_tipo_rango` int(11) NOT NULL,
  `condicion_rango` int(11) NOT NULL,
  `id_red` int(11) NOT NULL,
  `condicion1` int(11) NOT NULL DEFAULT '0',
  `condicion2` int(11) NOT NULL DEFAULT '0',
  `calificado` varchar(3) NOT NULL DEFAULT 'DOS',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_bono_condicion`
--

LOCK TABLES `cat_bono_condicion` WRITE;
/*!40000 ALTER TABLE `cat_bono_condicion` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_bono_condicion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_bono_valor_nivel`
--

DROP TABLE IF EXISTS `cat_bono_valor_nivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_bono_valor_nivel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bono` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `valor` float NOT NULL,
  `condicion_red` varchar(8) NOT NULL DEFAULT 'DIRECTOS',
  `verticalidad` varchar(4) DEFAULT 'ASC',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_bono_valor_nivel`
--

LOCK TABLES `cat_bono_valor_nivel` WRITE;
/*!40000 ALTER TABLE `cat_bono_valor_nivel` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_bono_valor_nivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_color_evento`
--

DROP TABLE IF EXISTS `cat_color_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_color_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `color` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_color_evento`
--

LOCK TABLES `cat_color_evento` WRITE;
/*!40000 ALTER TABLE `cat_color_evento` DISABLE KEYS */;
INSERT INTO `cat_color_evento` VALUES (1,'negro'),(2,'azul'),(3,'amarillo'),(4,'rojo'),(5,'verde'),(6,'gris');
/*!40000 ALTER TABLE `cat_color_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_cuenta`
--

DROP TABLE IF EXISTS `cat_cuenta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_cuenta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `cuenta` varchar(15) DEFAULT NULL,
  `banco` varchar(100) DEFAULT NULL,
  `estatus` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_cuenta`
--

LOCK TABLES `cat_cuenta` WRITE;
/*!40000 ALTER TABLE `cat_cuenta` DISABLE KEYS */;
INSERT INTO `cat_cuenta` VALUES (1,1,'4353222444500','1','ACT');
/*!40000 ALTER TABLE `cat_cuenta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_distribuidor`
--

DROP TABLE IF EXISTS `cat_distribuidor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_distribuidor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `comision` decimal(7,4) NOT NULL,
  `impuesto` decimal(7,4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_distribuidor`
--

LOCK TABLES `cat_distribuidor` WRITE;
/*!40000 ALTER TABLE `cat_distribuidor` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_distribuidor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_edo_civil`
--

DROP TABLE IF EXISTS `cat_edo_civil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_edo_civil` (
  `id_edo_civil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_edo_civil`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_edo_civil`
--

LOCK TABLES `cat_edo_civil` WRITE;
/*!40000 ALTER TABLE `cat_edo_civil` DISABLE KEYS */;
INSERT INTO `cat_edo_civil` VALUES (1,'Soltero/a','ACT'),(2,'Casado/a','ACT'),(3,'Divorciado/a','ACT'),(4,'Viudo/a','ACT'),(5,'Union libre','ACT');
/*!40000 ALTER TABLE `cat_edo_civil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estado`
--

DROP TABLE IF EXISTS `cat_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estado` (
  `id_estado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estado`)
) ENGINE=MyISAM AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estado`
--

LOCK TABLES `cat_estado` WRITE;
/*!40000 ALTER TABLE `cat_estado` DISABLE KEYS */;
INSERT INTO `cat_estado` VALUES (1,'Aguascalientes','ACT'),(2,'Baja California','ACT'),(3,'Baja California Sur','ACT'),(4,'Campeche','ACT'),(5,'Coahuila de Zaragoza','ACT'),(6,'Colima','ACT'),(7,'Chiapas','ACT'),(8,'Chihuahua','ACT'),(9,'Distrito Federal','ACT'),(10,'Durango','ACT'),(11,'Guanajuato','ACT'),(12,'Guerrero','ACT'),(13,'Hidalgo','ACT'),(14,'Jalisco','ACT'),(15,'México','ACT'),(16,'Michoacán de Ocampo','ACT'),(17,'Morelos','ACT'),(18,'Nayarit','ACT'),(19,'Nuevo León','ACT'),(20,'Oaxaca','ACT'),(21,'Puebla','ACT'),(22,'Querétaro','ACT'),(23,'Quintana Roo','ACT'),(24,'San Luis Potosí','ACT'),(25,'Sinaloa','ACT'),(26,'Sonora','ACT'),(27,'Tabasco','ACT'),(28,'Tamaulipas','ACT'),(29,'Tlaxcala','ACT'),(30,'Veracruz de Ignacio de la Llave','ACT'),(31,'Yucatán','ACT'),(32,'Zacatecas','ACT');
/*!40000 ALTER TABLE `cat_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus`
--

DROP TABLE IF EXISTS `cat_estatus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus`
--

LOCK TABLES `cat_estatus` WRITE;
/*!40000 ALTER TABLE `cat_estatus` DISABLE KEYS */;
INSERT INTO `cat_estatus` VALUES (1,'Correcto','ACT'),(2,'Pagado','ACT'),(3,'Pendiente','ACT'),(4,'Activo','ACT'),(5,'Modificado','ACT'),(6,'Cancelado','ACT');
/*!40000 ALTER TABLE `cat_estatus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_afiliado`
--

DROP TABLE IF EXISTS `cat_estatus_afiliado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_afiliado` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_afiliado`
--

LOCK TABLES `cat_estatus_afiliado` WRITE;
/*!40000 ALTER TABLE `cat_estatus_afiliado` DISABLE KEYS */;
INSERT INTO `cat_estatus_afiliado` VALUES (1,'Activado','ACT'),(2,'Desactivado','ACT'),(3,'Pago pendiente','ACT'),(4,'Sin compra mínima','ACT');
/*!40000 ALTER TABLE `cat_estatus_afiliado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_embarque`
--

DROP TABLE IF EXISTS `cat_estatus_embarque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_embarque` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_embarque`
--

LOCK TABLES `cat_estatus_embarque` WRITE;
/*!40000 ALTER TABLE `cat_estatus_embarque` DISABLE KEYS */;
INSERT INTO `cat_estatus_embarque` VALUES (1,'Por embarcar','ACT'),(2,'Embarcado','ACT');
/*!40000 ALTER TABLE `cat_estatus_embarque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_movimiento`
--

DROP TABLE IF EXISTS `cat_estatus_movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_movimiento` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_movimiento`
--

LOCK TABLES `cat_estatus_movimiento` WRITE;
/*!40000 ALTER TABLE `cat_estatus_movimiento` DISABLE KEYS */;
INSERT INTO `cat_estatus_movimiento` VALUES (1,'Pendiente','ACT'),(2,'En proceso','ACT');
/*!40000 ALTER TABLE `cat_estatus_movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_msg`
--

DROP TABLE IF EXISTS `cat_estatus_msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_msg` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_msg`
--

LOCK TABLES `cat_estatus_msg` WRITE;
/*!40000 ALTER TABLE `cat_estatus_msg` DISABLE KEYS */;
INSERT INTO `cat_estatus_msg` VALUES (1,'Leído','ACT'),(2,'No leído',''),(3,'Borrado','ACT'),(4,'Inadecuado','ACT'),(5,'Spam','ACT');
/*!40000 ALTER TABLE `cat_estatus_msg` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estatus_surtido`
--

DROP TABLE IF EXISTS `cat_estatus_surtido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estatus_surtido` (
  `id_estatus` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estatus`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estatus_surtido`
--

LOCK TABLES `cat_estatus_surtido` WRITE;
/*!40000 ALTER TABLE `cat_estatus_surtido` DISABLE KEYS */;
INSERT INTO `cat_estatus_surtido` VALUES (1,'Pendiente','ACT'),(2,'Surtido','ACT');
/*!40000 ALTER TABLE `cat_estatus_surtido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_estudios`
--

DROP TABLE IF EXISTS `cat_estudios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_estudios` (
  `id_estudio` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_estudio`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_estudios`
--

LOCK TABLES `cat_estudios` WRITE;
/*!40000 ALTER TABLE `cat_estudios` DISABLE KEYS */;
INSERT INTO `cat_estudios` VALUES (1,'Primaria','ACT'),(2,'Secundaria','ACT'),(3,'Preparatoria','ACT'),(4,'Carrera trunca','ACT'),(5,'Licenciatura','ACT'),(6,'Maestría','ACT');
/*!40000 ALTER TABLE `cat_estudios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_grupo`
--

DROP TABLE IF EXISTS `cat_grupo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_grupo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) NOT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  `tipo` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_grupo`
--

LOCK TABLES `cat_grupo` WRITE;
/*!40000 ALTER TABLE `cat_grupo` DISABLE KEYS */;
INSERT INTO `cat_grupo` VALUES (2,'Multinivel','ACT','VID'),(3,'Robert Kiyosaki','ACT','VID'),(4,'Motivacionales','ACT','VID'),(5,'Audio Libros','ACT','VID'),(6,'Motivacion','ACT','PRE'),(7,'Inspiración','ACT','EBO'),(9,'Vídeos de interes','ACT','VID'),(10,'Descarga activas','ACT','DES');
/*!40000 ALTER TABLE `cat_grupo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_grupo_perfil`
--

DROP TABLE IF EXISTS `cat_grupo_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_grupo_perfil` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_grupo_perfil`
--

LOCK TABLES `cat_grupo_perfil` WRITE;
/*!40000 ALTER TABLE `cat_grupo_perfil` DISABLE KEYS */;
INSERT INTO `cat_grupo_perfil` VALUES (1,'Backoffice','ACT'),(2,'Oficina virtual','ACT');
/*!40000 ALTER TABLE `cat_grupo_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_grupo_producto`
--

DROP TABLE IF EXISTS `cat_grupo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_grupo_producto` (
  `id_grupo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_grupo`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_grupo_producto`
--

LOCK TABLES `cat_grupo_producto` WRITE;
/*!40000 ALTER TABLE `cat_grupo_producto` DISABLE KEYS */;
INSERT INTO `cat_grupo_producto` VALUES (1,'publicidad','ACT',1);
/*!40000 ALTER TABLE `cat_grupo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_grupo_soporte_tecnico`
--

DROP TABLE IF EXISTS `cat_grupo_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_grupo_soporte_tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) DEFAULT NULL,
  `estatus` varchar(45) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_grupo_soporte_tecnico`
--

LOCK TABLES `cat_grupo_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `cat_grupo_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_grupo_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_img`
--

DROP TABLE IF EXISTS `cat_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_img` (
  `id_img` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(250) NOT NULL,
  `nombre_completo` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `extencion` varchar(6) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=InnoDB AUTO_INCREMENT=647 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_img`
--

LOCK TABLES `cat_img` WRITE;
/*!40000 ALTER TABLE `cat_img` DISABLE KEYS */;
INSERT INTO `cat_img` VALUES (3,'/media/2/user.jpg','user.jpg','user','jpg','ACT'),(645,'/media/carrito/Membrete1.png','Membrete1.png','Membrete1','png','ACT'),(646,'/media/carrito/m3.jpg','m3.jpg','m3','jpg','ACT');
/*!40000 ALTER TABLE `cat_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_impuesto`
--

DROP TABLE IF EXISTS `cat_impuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_impuesto` (
  `id_impuesto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `id_pais` varchar(5) NOT NULL,
  PRIMARY KEY (`id_impuesto`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_impuesto`
--

LOCK TABLES `cat_impuesto` WRITE;
/*!40000 ALTER TABLE `cat_impuesto` DISABLE KEYS */;
INSERT INTO `cat_impuesto` VALUES (1,'IVA',0,'ACT','AAA'),(2,'IVA',16,'ACT','COL'),(3,'IVA',21,'ACT','ESP'),(4,'IVA',21,'ACT','ARG'),(5,'IVA',19,'ACT','CHL'),(6,'IVA',18,'ACT','PER'),(7,'IVA',18,'ACT','DOM'),(8,'IVA',17,'ACT','BRA'),(9,'IVA',16,'ACT','MEX'),(10,'IVA',15,'ACT','HND'),(11,'IVA',15,'ACT','NIC'),(12,'IVA',13,'ACT','BOL'),(13,'IVA',13,'ACT','CRI'),(14,'IVA',13,'ACT','SLV'),(15,'IVA',12,'ACT','ECU'),(16,'IVA',12,'ACT','GTM'),(17,'IVA',12,'ACT','VEN'),(18,'IVA',11,'ACT','PRI'),(19,'IVA',10,'ACT','PRY'),(20,'IVA',7,'ACT','PAN');
/*!40000 ALTER TABLE `cat_impuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_metodo_cobro`
--

DROP TABLE IF EXISTS `cat_metodo_cobro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_metodo_cobro` (
  `id_metodo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_metodo`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_metodo_cobro`
--

LOCK TABLES `cat_metodo_cobro` WRITE;
/*!40000 ALTER TABLE `cat_metodo_cobro` DISABLE KEYS */;
INSERT INTO `cat_metodo_cobro` VALUES (1,'Deposito','ACT'),(2,'Transferencia','ACT'),(3,'Cheque','ACT'),(4,'Paypal','ACT');
/*!40000 ALTER TABLE `cat_metodo_cobro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_metodo_pago`
--

DROP TABLE IF EXISTS `cat_metodo_pago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_metodo_pago` (
  `id_metodo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_metodo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_metodo_pago`
--

LOCK TABLES `cat_metodo_pago` WRITE;
/*!40000 ALTER TABLE `cat_metodo_pago` DISABLE KEYS */;
INSERT INTO `cat_metodo_pago` VALUES (2,'Tarjetas de Crédito','ACT'),(4,'pse-Transferencias bancarias','ACT'),(5,'Débitos ACH','ACT'),(6,'Tarjetas débito','ACT'),(7,'Pago en efectivo','ACT'),(8,'Pago Referenciado','ACT'),(10,'Pago en bancos','ACT'),(11,'Consignacion','ACT');
/*!40000 ALTER TABLE `cat_metodo_pago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_moneda`
--

DROP TABLE IF EXISTS `cat_moneda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_moneda` (
  `codigo_pais` varchar(2) NOT NULL,
  `codigo_moneda` varchar(3) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_moneda`
--

LOCK TABLES `cat_moneda` WRITE;
/*!40000 ALTER TABLE `cat_moneda` DISABLE KEYS */;
INSERT INTO `cat_moneda` VALUES ('AD','EUR','euro','ACT'),('AE','AED','Emiratí dirham','ACT'),('AF','USD','Afgani','ACT'),('AG','XCD','Dólar del Caribe Oriental','ACT'),('AI','XCD','Dólar del Caribe Oriental','ACT'),('AL','EUR','euro','ACT'),('AM','AMD','Dram armenio','ACT'),('AN','ANG','Dólar de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AN','ANG','Florín de Antillas Neerlandesas','ACT'),('AO','AOA','Kwanza angoleño','ACT'),('AR','SRA','Peso argentino','DES'),('AS','USD','Dólar estadounidense','ACT'),('AT','EUR','euro','ACT'),('AU','AUD','Dólar australiano','ACT'),('AW','AWG','Florín de Aruba','ACT'),('AZ','AZM','Manat azerí','ACT'),('BA','BAM','Marco bosnio convertible','ACT'),('BB','BBD','Dólar de Barbados','ACT'),('BD','BDT','Taka de Bangladesh','ACT'),('BE','EUR','euro','ACT'),('BF','XOF','Franco CFA, BCEAO','ACT'),('BG','EUR','euro','ACT'),('BH','BHD','Dinar bahriní','ACT'),('BI','BIF','Franco de Burundi','ACT'),('BJ','XOF','Franco CFA, BCEAO','ACT'),('BM','BMD','Dólar de Bermudas','ACT'),('BN','BND','Dólar de Brunei','ACT'),('BO','BOB','Boliviano de Bolivia','DES'),('BR','BRL','Real brasileño','DES'),('BS','BSD','Dólar de las Bahamas','ACT'),('BT','BTN','Ngultrum butanés','ACT'),('BW','BWP','Pula botsuanés','ACT'),('BY','BYR','Rublo bielorruso','ACT'),('BZ','BZD','Dólar de Belice','ACT'),('CA','CAD','Dólar canadiense','ACT'),('CD','CDF','Franco congoleño','ACT'),('CF','XAF','Franco CFA, BEAC','ACT'),('CG','XAF','Franco CFA, BEAC','ACT'),('CH','CHF','Franco suizo','ACT'),('CI','XOF','Franco CFA, BCEAO','ACT'),('CK','NZD','Dólar neozelandés','ACT'),('CL','CLP','Peso chileno','DES'),('CM','XAF','Franco CFA, BEAC','ACT'),('CN','RMB','Yuan renminbi','ACT'),('CO','COP','Peso colombiano','ACT'),('CR','CRC','Colón costarricense','DES'),('CV','CVE','Escudo de Cabo Verde','ACT'),('CY','EUR','euro','ACT'),('CZ','CZK','Corona checa','ACT'),('DE','EUR','euro','ACT'),('DJ','DJF','Franco de Djibouti','ACT'),('DK','DKK','Corona danesa','ACT'),('DM','XCD','Dólar del Caribe Oriental','ACT'),('DO','DOP','Peso dominicano','DES'),('DZ','DZD','Dinar argelino','ACT'),('EC','USD','Dólar estadounidense','DES'),('EE','EUR','euro','ACT'),('EE','USD','Dólar estadounidense','ACT'),('EG','EGP','Libra egipcia','ACT'),('EP','EUR','euro','ACT'),('ER','ERN','Nakfa eritreo','ACT'),('ES','EUR','euro','ACT'),('ES','EUR','euro','ACT'),('ET','ETB','Birr etíope','ACT'),('FI','EUR','euro','ACT'),('FJ','FJD','Dólar de Fiyi','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FM','USD','Dólar estadounidense','ACT'),('FO','DKK','Corona danesa','ACT'),('FR','EUR','euro','ACT'),('GA','XAF','Franco CFA, BEAC','ACT'),('GB','GBP','Libra esterlina','ACT'),('GB','GBP','Libra esterlina','ACT'),('GB','GBP','Libra esterlina','ACT'),('GB','GBP','Libra esterlina','ACT'),('GB','GBP','Libra esterlina','ACT'),('GD','XCD','Dólar del Caribe Oriental','ACT'),('GE','GEL','Lari georgiano','ACT'),('GF','EUR','euro','ACT'),('GG','GBP','Libra esterlina','ACT'),('GH','GHS','Cedi ghanés','ACT'),('GI','GIP','Libra de Gibraltar','ACT'),('GL','DKK','Corona danesa','ACT'),('GM','GMD','Dalasi gambiano','ACT'),('GN','GNF','Franco guineano','ACT'),('GP','EUR','euro','ACT'),('GP','EUR','euro','ACT'),('GP','EUR','euro','ACT'),('GQ','XAF','Franco CFA, BEAC','ACT'),('GR','EUR','euro','ACT'),('GT','GTQ','Quetzal guatemalteco','ACT'),('GU','USD','Dólar estadounidense','ACT'),('GW','XOF','Franco CFA, BCEAO','ACT'),('GY','GYD','Dólar guayanés','ACT'),('HK','HKD','Dólar de Hong Kong','ACT'),('HN','HNL','Lempira hondureño','DES'),('HR','EUR','euro','ACT'),('HT','HTG','Gourde haitiano','ACT'),('HU','HUF','Forint húngaro','ACT'),('ID','IDR','Rupia indonesia','ACT'),('IE','EUR','euro','ACT'),('IL','ILS','Nuevo shékel israelí','ACT'),('IN','INR','Rupia india','ACT'),('IQ','NID','Dinar iraquí','ACT'),('IS','ISK','Corona islandesa','ACT'),('IT','EUR','euro','ACT'),('JE','GBP','Libra esterlina','ACT'),('JM','JMD','Dólar de Jamaica','ACT'),('JO','JOD','Dinar jordano','ACT'),('JP','JPY','Yen japonés','ACT'),('KE','KES','Chelín keniano','ACT'),('KG','KGS','Som kirguizo','ACT'),('KH','KHR','Riel camboyano','ACT'),('KI','AUD','Dólar australiano','ACT'),('KM','USD','Franco comorano','ACT'),('KN','XCD','Dólar del Caribe Oriental','ACT'),('KN','XCD','Dólar del Caribe Oriental','ACT'),('KR','KRW','Won surcoreano','ACT'),('KW','KWD','Dinar kuwaití','ACT'),('KY','KYD','Dólar de las Islas Caimán','ACT'),('KZ','KZT','Tenge kazajo','ACT'),('LA','LAK','Kip laosiano','ACT'),('LB','LBP','Libra libanesa','ACT'),('LC','XCD','Dólar del Caribe Oriental','ACT'),('LI','CHF','Franco suizo','ACT'),('LK','LKR','Esrilanqués Lankan rupia','ACT'),('LR','LRD','Dólar liberiano','ACT'),('LS','LSL','Loti de Lesoto','ACT'),('LT','LTL','Litas lituano','ACT'),('LU','EUR','euro','ACT'),('LV','LVL','Lats letón','ACT'),('LY','LYD','Dinar libio','ACT'),('MA','MAD','Dirham marroquí','ACT'),('MC','EUR','euro','ACT'),('MD','MDL','Leu moldavo','ACT'),('ME','EUR','Dinar serbio','ACT'),('MG','MGA','Ariary','ACT'),('MH','USD','Dólar estadounidense','ACT'),('MK','EUR','euro','ACT'),('ML','XOF','Franco CFA, BCEAO','ACT'),('MN','MNT','Tugrik mongol','ACT'),('MO','MOP','Pataca de Macao','ACT'),('MP','USD','Dólar estadounidense','ACT'),('MP','USD','Dólar estadounidense','ACT'),('MP','USD','Dólar estadounidense','ACT'),('MP','USD','Dólar estadounidense','ACT'),('MQ','EUR','euro','ACT'),('MR','MRO','Ouguiya mauritano','ACT'),('MS','XCD','Dólar del Caribe Oriental','ACT'),('MT','EUR','euro','ACT'),('MU','MUR','Rupia mauriciana','ACT'),('MV','MVR','Rufiyaa de Maldivas','ACT'),('MW','MWK','Kwacha de Malaui','ACT'),('MX','MXN','Peso mexicano','DES'),('MY','MYR','Ringgit malasio','ACT'),('MZ','MZM','Metical mozambiqueño','ACT'),('NA','NAD','Dólar de Namibia','ACT'),('NC','XPF','Franco CFP','ACT'),('NE','XOF','Franco CFA, BCEAO','ACT'),('NF','AUD','Dólar australiano','ACT'),('NG','NGN','Naira nigeriano','ACT'),('NI','NIO','Córdoba de oro nicaragüense','DES'),('NL','EUR','euro','ACT'),('NL','EUR','euro','ACT'),('NO','NOK','Corona noruega','ACT'),('NP','NPR','Rupia nepalesa','ACT'),('NZ','NZD','Dólar neozelandés','ACT'),('OM','OMR','Rial omaní','ACT'),('PA','PAB','Balboa panameño','DES'),('PE','PEN','Nuevo sol peruano','DES'),('PF','XPF','Franco CFP','ACT'),('PF','XPF','Franco CFP','ACT'),('PG','PGK','Kina de Papúa-Nueva Guinea','ACT'),('PH','PHP','Peso filipino','ACT'),('PK','PKR','Rupia paquistaní','ACT'),('PL','PLN','Zloty polaco','ACT'),('PR','USD','Dólar estadounidense','DES'),('PT','EUR','euro','ACT'),('PT','EUR','euro','ACT'),('PT','EUR','euro','ACT'),('PW','USD','Dólar estadounidense','ACT'),('PY','PYG','Guaraní paraguayo','DES'),('QA','QAR','Riyal de Qatar','ACT'),('RE','EUR','euro','ACT'),('RO','ROL','Leu rumano','ACT'),('RS','EUR','Dinar serbio','ACT'),('RU','RUB','Rublo ruso','ACT'),('RW','RWF','Franco ruandés','ACT'),('SA','SAR','Riyal saudí','ACT'),('SB','SBD','Dólar de las Islas Salomón','ACT'),('SC','SCR','Rupia de las Seychelles','ACT'),('SE','SEK','Corona sueca','ACT'),('SG','SGD','Dólar singapurense','ACT'),('SI','EUR','euro','ACT'),('SK','EUR','euro','ACT'),('SL','SLL','Sierra Leona leone','ACT'),('SM','EUR','euro','ACT'),('SN','XOF','Franco CFA, BCEAO','ACT'),('SR','SRG','Surinamés guilder','ACT'),('SV','USD','Dólar estadounidense','DES'),('SZ','SZL','Suazilandia lilangeni','ACT'),('TC','USD','Dólar estadounidense','ACT'),('TD','XAF','Franco CFA, BEAC','ACT'),('TG','XOF','Franco CFA, BCEAO','ACT'),('TH','THB','Baht tailandés','ACT'),('TJ','TJS','Tayikistán somoni','ACT'),('TL','USD','Dólar estadounidense','ACT'),('TM','TMM','Turcomano manat','ACT'),('TN','TND','Dinar tunecino','ACT'),('TO','TOP','Tonga pa´anga','ACT'),('TR','TRQ','Lira turca','ACT'),('TT','TTD','Dólar de Trinidad y Tobago','ACT'),('TV','AUD','Dólar australiano','ACT'),('TW','TWD','Dólar de Taiwán','ACT'),('TZ','TZS','Chelín tanzano','ACT'),('UA','UAH','Ucraniano jrivnia','ACT'),('UG','UGX','Chelín ugandés','ACT'),('UY','UYU','Peso uruguayo','DES'),('UZ','UZS','Uzbeko som','ACT'),('VA','EUR','euro','ACT'),('VC','XCD','Dólar del Caribe Oriental','ACT'),('VC','XCD','Dólar del Caribe Oriental','ACT'),('VE','VEB','Bolívar venezolano','DES'),('VG','USD','Dólar estadounidense','ACT'),('VG','USD','Dólar estadounidense','ACT'),('VG','USD','Dólar estadounidense','ACT'),('VI','USD','Dólar estadounidense','ACT'),('VI','USD','Dólar estadounidense','ACT'),('VI','USD','Dólar estadounidense','ACT'),('VI','USD','Dólar estadounidense','ACT'),('VN','VND','Dong vietnamita','ACT'),('VU','VUV','Vanuatu vatu','ACT'),('WF','XPF','Franco CFP','ACT'),('WS','WST','Samoano tala','ACT'),('YE','YER','Yemení rial','ACT'),('YT','EUR','Franco','ACT'),('ZA','ZAR','Rand sudafricano','ACT'),('ZM','ZMK','Kwacha zambiano','ACT'),('ZW','ZWD','Zimbabuense dólar','ACT');
/*!40000 ALTER TABLE `cat_moneda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_movimiento`
--

DROP TABLE IF EXISTS `cat_movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_movimiento` (
  `id_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo_movimiento` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_movimiento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_movimiento`
--

LOCK TABLES `cat_movimiento` WRITE;
/*!40000 ALTER TABLE `cat_movimiento` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_municipio`
--

DROP TABLE IF EXISTS `cat_municipio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_municipio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2319 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_municipio`
--

LOCK TABLES `cat_municipio` WRITE;
/*!40000 ALTER TABLE `cat_municipio` DISABLE KEYS */;
INSERT INTO `cat_municipio` VALUES (1,'Aguascalientes','ACT'),(2,'San Francisco de los Romo','ACT'),(3,'El Llano','ACT'),(4,'Rincón de Romos','ACT'),(5,'Cosío','ACT'),(6,'San José de Gracia','ACT'),(7,'Tepezalá','ACT'),(8,'Pabellón de Arteaga','ACT'),(9,'Asientos','ACT'),(10,'Calvillo','ACT'),(11,'Jesús María','ACT'),(12,'Mexicali','ACT'),(13,'Tecate','ACT'),(14,'Tijuana','ACT'),(15,'Playas de Rosarito','ACT'),(16,'Ensenada','ACT'),(17,'La Paz','ACT'),(18,'Los Cabos','ACT'),(19,'Comondú','ACT'),(20,'Loreto','ACT'),(21,'Mulegé','ACT'),(22,'Campeche','ACT'),(23,'Carmen','ACT'),(24,'Palizada','ACT'),(25,'Candelaria','ACT'),(26,'Escárcega','ACT'),(27,'Champotón','ACT'),(28,'Hopelchén','ACT'),(29,'Calakmul','ACT'),(30,'Tenabo','ACT'),(31,'Hecelchakán','ACT'),(32,'Calkiní','ACT'),(33,'Saltillo','ACT'),(34,'Arteaga','ACT'),(35,'Juárez','ACT'),(36,'Progreso','ACT'),(37,'Escobedo','ACT'),(38,'San Buenaventura','ACT'),(39,'Abasolo','ACT'),(40,'Candela','ACT'),(41,'Frontera','ACT'),(42,'Monclova','ACT'),(43,'Castaños','ACT'),(44,'Ramos Arizpe','ACT'),(45,'General Cepeda','ACT'),(46,'Piedras Negras','ACT'),(47,'Nava','ACT'),(48,'Acuña','ACT'),(49,'Múzquiz','ACT'),(50,'Jiménez','ACT'),(51,'Zaragoza','ACT'),(52,'Morelos','ACT'),(53,'Allende','ACT'),(54,'Villa Unión','ACT'),(55,'Guerrero','ACT'),(56,'Hidalgo','ACT'),(57,'Sabinas','ACT'),(58,'San Juan de Sabinas','ACT'),(59,'Torreón','ACT'),(60,'Matamoros','ACT'),(61,'Viesca','ACT'),(62,'Ocampo','ACT'),(63,'Nadadores','ACT'),(64,'Sierra Mojada','ACT'),(65,'Cuatro Ciénegas','ACT'),(66,'Lamadrid','ACT'),(67,'Sacramento','ACT'),(68,'San Pedro','ACT'),(69,'Francisco I. Madero','ACT'),(70,'Parras','ACT'),(71,'Colima','ACT'),(72,'Tecomán','ACT'),(73,'Manzanillo','ACT'),(74,'Armería','ACT'),(75,'Coquimatlán','ACT'),(76,'Comala','ACT'),(77,'Cuauhtémoc','ACT'),(78,'Ixtlahuacán','ACT'),(79,'Minatitlán','ACT'),(80,'Villa de Álvarez','ACT'),(81,'Tuxtla Gutiérrez','ACT'),(82,'San Fernando','ACT'),(83,'Berriozábal','ACT'),(84,'Ocozocoautla de Espinosa','ACT'),(85,'Suchiapa','ACT'),(86,'Chiapa de Corzo','ACT'),(87,'Osumacinta','ACT'),(88,'San Cristóbal de las Casas','ACT'),(89,'Chamula','ACT'),(90,'Ixtapa','ACT'),(91,'Zinacantán','ACT'),(92,'Acala','ACT'),(93,'Chiapilla','ACT'),(94,'San Lucas','ACT'),(95,'Teopisca','ACT'),(96,'Amatenango del Valle','ACT'),(97,'Chanal','ACT'),(98,'Oxchuc','ACT'),(99,'Huixtán','ACT'),(100,'Tenejapa','ACT'),(101,'Mitontic','ACT'),(102,'Reforma','ACT'),(103,'Pichucalco','ACT'),(104,'Sunuapa','ACT'),(105,'Ostuacán','ACT'),(106,'Francisco León','ACT'),(107,'Ixtacomitán','ACT'),(108,'Solosuchiapa','ACT'),(109,'Ixtapangajoya','ACT'),(110,'Tecpatán','ACT'),(111,'Copainalá','ACT'),(112,'Chicoasén','ACT'),(113,'Coapilla','ACT'),(114,'Pantepec','ACT'),(115,'Tapalapa','ACT'),(116,'Ocotepec','ACT'),(117,'Chapultenango','ACT'),(118,'Amatán','ACT'),(119,'Huitiupán','ACT'),(120,'Ixhuatán','ACT'),(121,'Tapilula','ACT'),(122,'Rayón','ACT'),(123,'Pueblo Nuevo Solistahuacán','ACT'),(124,'Jitotol','ACT'),(125,'Bochil','ACT'),(126,'Soyaló','ACT'),(127,'San Juan Cancuc','ACT'),(128,'Sabanilla','ACT'),(129,'Simojovel','ACT'),(130,'San Andrés Duraznal','ACT'),(131,'El Bosque','ACT'),(132,'Chalchihuitán','ACT'),(133,'Larráinzar','ACT'),(134,'Santiago el Pinar','ACT'),(135,'Chenalhó','ACT'),(136,'Aldama','ACT'),(137,'Pantelhó','ACT'),(138,'Sitalá','ACT'),(139,'Salto de Agua','ACT'),(140,'Tila','ACT'),(141,'Tumbalá','ACT'),(142,'Yajalón','ACT'),(143,'Ocosingo','ACT'),(144,'Chilón','ACT'),(145,'Benemérito de las Américas','ACT'),(146,'Marqués de Comillas','ACT'),(147,'Palenque','ACT'),(148,'La Libertad','ACT'),(149,'Catazajá','ACT'),(150,'Comitán de Domínguez','ACT'),(151,'Tzimol','ACT'),(152,'Chicomuselo','ACT'),(153,'Bella Vista','ACT'),(154,'Frontera Comalapa','ACT'),(155,'La Trinitaria','ACT'),(156,'La Independencia','ACT'),(157,'Maravilla Tenejapa','ACT'),(158,'Las Margaritas','ACT'),(159,'Altamirano','ACT'),(160,'Venustiano Carranza','ACT'),(161,'Totolapa','ACT'),(162,'Nicolás Ruíz','ACT'),(163,'Las Rosas','ACT'),(164,'La Concordia','ACT'),(165,'Angel Albino Corzo','ACT'),(166,'Montecristo de Guerrero','ACT'),(167,'Socoltenango','ACT'),(168,'Cintalapa','ACT'),(169,'Jiquipilas','ACT'),(170,'Arriaga','ACT'),(171,'Villaflores','ACT'),(172,'Tonalá','ACT'),(173,'Villa Corzo','ACT'),(174,'Pijijiapan','ACT'),(175,'Mapastepec','ACT'),(176,'Acapetahua','ACT'),(177,'Acacoyagua','ACT'),(178,'Escuintla','ACT'),(179,'Villa Comaltitlán','ACT'),(180,'Huixtla','ACT'),(181,'Mazatán','ACT'),(182,'Huehuetán','ACT'),(183,'Tuzantán','ACT'),(184,'Tapachula','ACT'),(185,'Suchiate','ACT'),(186,'Frontera Hidalgo','ACT'),(187,'Metapa','ACT'),(188,'Tuxtla Chico','ACT'),(189,'Unión Juárez','ACT'),(190,'Cacahoatán','ACT'),(191,'Motozintla','ACT'),(192,'Mazapa de Madero','ACT'),(193,'Amatenango de la Frontera','ACT'),(194,'Bejucal de Ocampo','ACT'),(195,'La Grandeza','ACT'),(196,'El Porvenir','ACT'),(197,'Siltepec','ACT'),(198,'Chihuahua','ACT'),(199,'Riva Palacio','ACT'),(200,'Aquiles Serdán','ACT'),(201,'Bachíniva','ACT'),(202,'Nuevo Casas Grandes','ACT'),(203,'Ascensión','ACT'),(204,'Janos','ACT'),(205,'Casas Grandes','ACT'),(206,'Galeana','ACT'),(207,'Buenaventura','ACT'),(208,'Gómez Farías','ACT'),(209,'Ignacio Zaragoza','ACT'),(210,'Madera','ACT'),(211,'Namiquipa','ACT'),(212,'Temósachic','ACT'),(213,'Matachí','ACT'),(214,'Guadalupe','ACT'),(215,'Praxedis G. Guerrero','ACT'),(216,'Ahumada','ACT'),(217,'Coyame del Sotol','ACT'),(218,'Ojinaga','ACT'),(219,'Julimes','ACT'),(220,'Manuel Benavides','ACT'),(221,'Delicias','ACT'),(222,'Rosales','ACT'),(223,'Meoqui','ACT'),(224,'Dr. Belisario Domínguez','ACT'),(225,'Satevó','ACT'),(226,'San Francisco de Borja','ACT'),(227,'Nonoava','ACT'),(228,'Guachochi','ACT'),(229,'Bocoyna','ACT'),(230,'Cusihuiriachi','ACT'),(231,'Gran Morelos','ACT'),(232,'Santa Isabel','ACT'),(233,'Carichí','ACT'),(234,'Uruachi','ACT'),(235,'Moris','ACT'),(236,'Chínipas','ACT'),(237,'Maguarichi','ACT'),(238,'Guazapares','ACT'),(239,'Batopilas','ACT'),(240,'Urique','ACT'),(241,'Guadalupe y Calvo','ACT'),(242,'San Francisco del Oro','ACT'),(243,'Rosario','ACT'),(244,'Huejotitán','ACT'),(245,'El Tule','ACT'),(246,'Balleza','ACT'),(247,'Santa Bárbara','ACT'),(248,'Camargo','ACT'),(249,'Saucillo','ACT'),(250,'Valle de Zaragoza','ACT'),(251,'La Cruz','ACT'),(252,'San Francisco de Conchos','ACT'),(253,'Hidalgo del Parral','ACT'),(254,'López','ACT'),(255,'Coronado','ACT'),(256,'Álvaro Obregón','ACT'),(257,'Azcapotzalco','ACT'),(258,'Benito Juárez','ACT'),(259,'Coyoacán','ACT'),(260,'Cuajimalpa de Morelos','ACT'),(261,'Gustavo A. Madero','ACT'),(262,'Iztacalco','ACT'),(263,'Iztapalapa','ACT'),(264,'La Magdalena Contreras','ACT'),(265,'Miguel Hidalgo','ACT'),(266,'Milpa Alta','ACT'),(267,'Tláhuac','ACT'),(268,'Tlalpan','ACT'),(269,'Xochimilco','ACT'),(270,'Durango','ACT'),(271,'Canatlán','ACT'),(272,'Nuevo Ideal','ACT'),(273,'Coneto de Comonfort','ACT'),(274,'San Juan del Río','ACT'),(275,'Canelas','ACT'),(276,'Topia','ACT'),(277,'Tamazula','ACT'),(278,'Santiago Papasquiaro','ACT'),(279,'Otáez','ACT'),(280,'San Dimas','ACT'),(281,'Guadalupe Victoria','ACT'),(282,'Peñón Blanco','ACT'),(283,'Pánuco de Coronado','ACT'),(284,'Poanas','ACT'),(285,'Nombre de Dios','ACT'),(286,'Vicente Guerrero','ACT'),(287,'Súchil','ACT'),(288,'Pueblo Nuevo','ACT'),(289,'Mezquital','ACT'),(290,'Gómez Palacio','ACT'),(291,'Lerdo','ACT'),(292,'Mapimí','ACT'),(293,'Tlahualilo','ACT'),(294,'Guanaceví','ACT'),(295,'San Bernardo','ACT'),(296,'Indé','ACT'),(297,'San Pedro del Gallo','ACT'),(298,'Tepehuanes','ACT'),(299,'El Oro','ACT'),(300,'Nazas','ACT'),(301,'San Luis del Cordero','ACT'),(302,'Rodeo','ACT'),(303,'Cuencamé','ACT'),(304,'Santa Clara','ACT'),(305,'San Juan de Guadalupe','ACT'),(306,'General Simón Bolívar','ACT'),(307,'Guanajuato','ACT'),(308,'Silao de la Victoria','ACT'),(309,'Romita','ACT'),(310,'San Francisco del Rincón','ACT'),(311,'Purísima del Rincón','ACT'),(312,'Manuel Doblado','ACT'),(313,'Irapuato','ACT'),(314,'Salamanca','ACT'),(315,'Pénjamo','ACT'),(316,'Cuerámaro','ACT'),(317,'Huanímaro','ACT'),(318,'León','ACT'),(319,'San Felipe','ACT'),(320,'San Miguel de Allende','ACT'),(321,'Dolores Hidalgo Cuna de la Independencia Nacional','ACT'),(322,'San Diego de la Unión','ACT'),(323,'San Luis de la Paz','ACT'),(324,'Victoria','ACT'),(325,'Xichú','ACT'),(326,'Atarjea','ACT'),(327,'Santa Catarina','ACT'),(328,'Doctor Mora','ACT'),(329,'Tierra Blanca','ACT'),(330,'San José Iturbide','ACT'),(331,'Celaya','ACT'),(332,'Apaseo el Grande','ACT'),(333,'Comonfort','ACT'),(334,'Santa Cruz de Juventino Rosas','ACT'),(335,'Villagrán','ACT'),(336,'Cortazar','ACT'),(337,'Valle de Santiago','ACT'),(338,'Jaral del Progreso','ACT'),(339,'Apaseo el Alto','ACT'),(340,'Jerécuaro','ACT'),(341,'Coroneo','ACT'),(342,'Acámbaro','ACT'),(343,'Tarimoro','ACT'),(344,'Tarandacuao','ACT'),(345,'Moroleón','ACT'),(346,'Salvatierra','ACT'),(347,'Yuriria','ACT'),(348,'Santiago Maravatío','ACT'),(349,'Uriangato','ACT'),(350,'Chilpancingo de los Bravo','ACT'),(351,'General Heliodoro Castillo','ACT'),(352,'Leonardo Bravo','ACT'),(353,'Tixtla de Guerrero','ACT'),(354,'Ayutla de los Libres','ACT'),(355,'Mochitlán','ACT'),(356,'Quechultenango','ACT'),(357,'Tecoanapa','ACT'),(358,'Acapulco de Juárez','ACT'),(359,'Juan R. Escudero','ACT'),(360,'San Marcos','ACT'),(361,'Iguala de la Independencia','ACT'),(362,'Huitzuco de los Figueroa','ACT'),(363,'Tepecoacuilco de Trujano','ACT'),(364,'Eduardo Neri','ACT'),(365,'Taxco de Alarcón','ACT'),(366,'Buenavista de Cuéllar','ACT'),(367,'Tetipac','ACT'),(368,'Pilcaya','ACT'),(369,'Teloloapan','ACT'),(370,'Ixcateopan de Cuauhtémoc','ACT'),(371,'Pedro Ascencio Alquisiras','ACT'),(372,'General Canuto A. Neri','ACT'),(373,'Arcelia','ACT'),(374,'Apaxtla','ACT'),(375,'Cuetzala del Progreso','ACT'),(376,'Cocula','ACT'),(377,'Tlapehuala','ACT'),(378,'Cutzamala de Pinzón','ACT'),(379,'Pungarabato','ACT'),(380,'Tlalchapa','ACT'),(381,'Coyuca\n de Catalán','ACT'),(382,'Ajuchitlán del Progreso','ACT'),(383,'Zirándaro','ACT'),(384,'San Miguel Totolapan','ACT'),(385,'La Unión de Isidoro Montes de Oca','ACT'),(386,'Petatlán','ACT'),(387,'Coahuayutla de José María Izazaga','ACT'),(388,'Zihuatanejo de Azueta','ACT'),(389,'Técpan de Galeana','ACT'),(390,'Atoyac de Álvarez','ACT'),(391,'Coyuca de Benítez','ACT'),(392,'Olinalá','ACT'),(393,'Atenango del Río','ACT'),(394,'Copalillo','ACT'),(395,'Cualác','ACT'),(396,'Chilapa de Álvarez','ACT'),(397,'José Joaquín de Herrera','ACT'),(398,'Ahuacuotzingo','ACT'),(399,'Zitlala','ACT'),(400,'Mártir de Cuilapan','ACT'),(401,'Huamuxtitlán','ACT'),(402,'Xochihuehuetlán','ACT'),(403,'Alpoyeca','ACT'),(404,'Tlapa de Comonfort','ACT'),(405,'Tlalixtaquilla de Maldonado','ACT'),(406,'Xalpatláhuac','ACT'),(407,'Zapotitlán Tablas','ACT'),(408,'Acatepec','ACT'),(409,'Atlixtac','ACT'),(410,'Copanatoyac','ACT'),(411,'Malinaltepec','ACT'),(412,'Iliatenco','ACT'),(413,'Tlacoapa','ACT'),(414,'Atlamajalcingo del Monte','ACT'),(415,'San Luis Acatlán','ACT'),(416,'Metlatónoc','ACT'),(417,'Cochoapa el Grande','ACT'),(418,'Alcozauca de Guerrero','ACT'),(419,'Ometepec','ACT'),(420,'Tlacoachistlahuaca','ACT'),(421,'Xochistlahuaca','ACT'),(422,'Florencio Villarreal','ACT'),(423,'Cuautepec','ACT'),(424,'Copala','ACT'),(425,'Azoyú','ACT'),(426,'Juchitán','ACT'),(427,'Marquelia','ACT'),(428,'Cuajinicuilapa','ACT'),(429,'Igualapa','ACT'),(430,'Pachuca de Soto','ACT'),(431,'Mineral del Chico','ACT'),(432,'Mineral del Monte','ACT'),(433,'Ajacuba','ACT'),(434,'San Agustín Tlaxiaca','ACT'),(435,'Mineral de la Reforma','ACT'),(436,'Zapotlán de Juárez','ACT'),(437,'Jacala de Ledezma','ACT'),(438,'Pisaflores','ACT'),(439,'Pacula','ACT'),(440,'La Misión','ACT'),(441,'Chapulhuacán','ACT'),(442,'Ixmiquilpan','ACT'),(443,'Zimapán','ACT'),(444,'Nicolás Flores','ACT'),(445,'Cardonal','ACT'),(446,'Tasquillo','ACT'),(447,'Alfajayucan','ACT'),(448,'Huichapan','ACT'),(449,'Tecozautla','ACT'),(450,'Nopala de Villagrán','ACT'),(451,'Actopan','ACT'),(452,'Santiago de Anaya','ACT'),(453,'San Salvador','ACT'),(454,'El Arenal','ACT'),(455,'Mixquiahuala de Juárez','ACT'),(456,'Progreso de Obregón','ACT'),(457,'Chilcuautla','ACT'),(458,'Tezontepec de Aldama','ACT'),(459,'Tlahuelilpan','ACT'),(460,'Tula de Allende','ACT'),(461,'Tepeji del Río de Ocampo','ACT'),(462,'Chapantongo','ACT'),(463,'Tepetitlán','ACT'),(464,'Tetepango','ACT'),(465,'Tlaxcoapan','ACT'),(466,'Atitalaquia','ACT'),(467,'Atotonilco de Tula','ACT'),(468,'Huejutla de Reyes','ACT'),(469,'San Felipe Orizatlán','ACT'),(470,'Jaltocán','ACT'),(471,'Huautla','ACT'),(472,'Atlapexco','ACT'),(473,'Huazalingo','ACT'),(474,'Yahualica','ACT'),(475,'Xochiatipan','ACT'),(476,'Molango de Escamilla','ACT'),(477,'Tepehuacán de Guerrero','ACT'),(478,'Lolotla','ACT'),(479,'Tlanchinol','ACT'),(480,'Tlahuiltepa','ACT'),(481,'Juárez Hidalgo','ACT'),(482,'Zacualtipán de Ángeles','ACT'),(483,'Calnali','ACT'),(484,'Xochicoatlán','ACT'),(485,'Tianguistengo','ACT'),(486,'Atotonilco el Grande','ACT'),(487,'Eloxochitlán','ACT'),(488,'Metztitlán','ACT'),(489,'San Agustín Metzquititlán','ACT'),(490,'Metepec','ACT'),(491,'Huehuetla','ACT'),(492,'San Bartolo Tutotepec','ACT'),(493,'Agua Blanca de Iturbide','ACT'),(494,'Tenango de Doria','ACT'),(495,'Huasca de Ocampo','ACT'),(496,'Acatlán','ACT'),(497,'Omitlán de Juárez','ACT'),(498,'Epazoyucan','ACT'),(499,'Tulancingo de Bravo','ACT'),(500,'Acaxochitlán','ACT'),(501,'Cuautepec de Hinojosa','ACT'),(502,'Santiago Tulantepec de Lugo Guerrero','ACT'),(503,'Singuilucan','ACT'),(504,'Tizayuca','ACT'),(505,'Zempoala','ACT'),(506,'Tolcayuca','ACT'),(507,'Villa de Tezontepec','ACT'),(508,'Apan','ACT'),(509,'Tlanalapa','ACT'),(510,'Almoloya','ACT'),(511,'Emiliano Zapata','ACT'),(512,'Tepeapulco','ACT'),(513,'Guadalajara','ACT'),(514,'Zapopan','ACT'),(515,'San Cristóbal de la Barranca','ACT'),(516,'Ixtlahuacán del Río','ACT'),(517,'Tala','ACT'),(518,'Amatitán','ACT'),(519,'Zapotlanejo','ACT'),(520,'Acatic','ACT'),(521,'Cuquío','ACT'),(522,'San Pedro Tlaquepaque','ACT'),(523,'Tlajomulco de Zúñiga','ACT'),(524,'El Salto','ACT'),(525,'Acatlán de Juárez','ACT'),(526,'Villa Corona','ACT'),(527,'Zacoalco de Torres','ACT'),(528,'Atemajac de Brizuela','ACT'),(529,'Jocotepec','ACT'),(530,'Ixtlahuacán de los Membrillos','ACT'),(531,'Juanacatlán','ACT'),(532,'Chapala','ACT'),(533,'Poncitlán','ACT'),(534,'Zapotlán del Rey','ACT'),(535,'Huejuquilla el Alto','ACT'),(536,'Mezquitic','ACT'),(537,'Villa Guerrero','ACT'),(538,'Bolaños','ACT'),(539,'Totatiche','ACT'),(540,'Colotlán','ACT'),(541,'Santa María de los Ángeles','ACT'),(542,'Huejúcar','ACT'),(543,'Chimaltitán','ACT'),(544,'San Martín de Bolaños','ACT'),(545,'Tequila','ACT'),(546,'Hostotipaquillo','ACT'),(547,'Magdalena','ACT'),(548,'Etzatlán','ACT'),(549,'San Juanito de Escobedo','ACT'),(550,'Ameca','ACT'),(551,'Ahualulco de Mercado','ACT'),(552,'Teuchitlán','ACT'),(553,'San Martín Hidalgo','ACT'),(554,'Guachinango','ACT'),(555,'Mixtlán','ACT'),(556,'Mascota','ACT'),(557,'San Sebastián del Oeste','ACT'),(558,'San Juan de los Lagos','ACT'),(559,'Jalostotitlán','ACT'),(560,'San Miguel el Alto','ACT'),(561,'San Julián','ACT'),(562,'Arandas','ACT'),(563,'San Ignacio Cerro Gordo','ACT'),(564,'Teocaltiche','ACT'),(565,'Villa Hidalgo','ACT'),(566,'Encarnación de Díaz','ACT'),(567,'Yahualica de González Gallo','ACT'),(568,'Mexticacán','ACT'),(569,'Cañadas de Obregón','ACT'),(570,'Valle de Guadalupe','ACT'),(571,'Lagos de Moreno','ACT'),(572,'Ojuelos de Jalisco','ACT'),(573,'Unión de San Antonio','ACT'),(574,'San Diego de Alejandría','ACT'),(575,'Tepatitlán de Morelos','ACT'),(576,'Tototlán','ACT'),(577,'Atotonilco el Alto','ACT'),(578,'Ocotlán','ACT'),(579,'Jamay','ACT'),(580,'La Barca','ACT'),(581,'Ayotlán','ACT'),(582,'Degollado','ACT'),(583,'Unión de Tula','ACT'),(584,'Ayutla','ACT'),(585,'Atenguillo','ACT'),(586,'Cuautla','ACT'),(587,'Atengo','ACT'),(588,'Talpa de Allende','ACT'),(589,'Puerto Vallarta','ACT'),(590,'Cabo Corrientes','ACT'),(591,'Tomatlán','ACT'),(592,'Tecolotlán','ACT'),(593,'Tenamaxtlán','ACT'),(594,'Juchitlán','ACT'),(595,'Chiquilistlán','ACT'),(596,'Ejutla','ACT'),(597,'El Limón','ACT'),(598,'El Grullo','ACT'),(599,'Tonaya','ACT'),(600,'Tuxcacuesco','ACT'),(601,'Villa Purificación','ACT'),(602,'La Huerta','ACT'),(603,'Autlán de Navarro','ACT'),(604,'Casimiro Castillo','ACT'),(605,'Cuautitlán de García Barragán','ACT'),(606,'Cihuatlán','ACT'),(607,'Zapotlán el Grande','ACT'),(608,'Concepción de Buenos Aires','ACT'),(609,'Atoyac','ACT'),(610,'Techaluta de Montenegro','ACT'),(611,'Teocuitatlán de Corona','ACT'),(612,'Sayula','ACT'),(613,'Tapalpa','ACT'),(614,'Amacueca','ACT'),(615,'Tizapán el Alto','ACT'),(616,'Tuxcueca','ACT'),(617,'La Manzanilla de la Paz','ACT'),(618,'Mazamitla','ACT'),(619,'Valle de Juárez','ACT'),(620,'Quitupan','ACT'),(621,'Zapotiltic','ACT'),(622,'Tamazula de Gordiano','ACT'),(623,'San Gabriel','ACT'),(624,'Tolimán','ACT'),(625,'Zapotitlán de Vadillo','ACT'),(626,'Tuxpan','ACT'),(627,'Tonila','ACT'),(628,'Pihuamo','ACT'),(629,'Tecalitlán','ACT'),(630,'Jilotlán de los Dolores','ACT'),(631,'Santa María del Oro','ACT'),(632,'Toluca','ACT'),(633,'Acambay de Ruíz Castañeda','ACT'),(634,'Aculco','ACT'),(635,'Temascalcingo','ACT'),(636,'Atlacomulco','ACT'),(637,'Timilpan','ACT'),(638,'San Felipe del Progreso','ACT'),(639,'San José del Rincón','ACT'),(640,'Jocotitlán','ACT'),(641,'Ixtlahuaca','ACT'),(642,'Jiquipilco','ACT'),(643,'Temoaya','ACT'),(644,'Almoloya de Juárez','ACT'),(645,'Villa Victoria','ACT'),(646,'Villa de Allende','ACT'),(647,'Donato Guerra','ACT'),(648,'Ixtapan del Oro','ACT'),(649,'Santo Tomás','ACT'),(650,'Otzoloapan','ACT'),(651,'Zacazonapan','ACT'),(652,'Valle de Bravo','ACT'),(653,'Amanalco','ACT'),(654,'Temascaltepec','ACT'),(655,'Zinacantepec','ACT'),(656,'Tejupilco','ACT'),(657,'Luvianos','ACT'),(658,'San Simón de Guerrero','ACT'),(659,'Amatepec','ACT'),(660,'Tlatlaya','ACT'),(661,'Sultepec','ACT'),(662,'Texcaltitlán','ACT'),(663,'Coatepec Harinas','ACT'),(664,'Zacualpan','ACT'),(665,'Almoloya de Alquisiras','ACT'),(666,'Ixtapan de la Sal','ACT'),(667,'Tonatico','ACT'),(668,'Zumpahuacán','ACT'),(669,'Lerma','ACT'),(670,'Xonacatlán','ACT'),(671,'Otzolotepec','ACT'),(672,'San Mateo Atenco','ACT'),(673,'Mexicaltzingo','ACT'),(674,'Calimaya','ACT'),(675,'Chapultepec','ACT'),(676,'San Antonio la Isla','ACT'),(677,'Tenango del Valle','ACT'),(678,'Joquicingo','ACT'),(679,'Tenancingo','ACT'),(680,'Malinalco','ACT'),(681,'Ocuilan','ACT'),(682,'Atizapán','ACT'),(683,'Almoloya del Río','ACT'),(684,'Texcalyacac','ACT'),(685,'Tianguistenco','ACT'),(686,'Xalatlaco','ACT'),(687,'Capulhuac','ACT'),(688,'Ocoyoacac','ACT'),(689,'Huixquilucan','ACT'),(690,'Atizapán de Zaragoza','ACT'),(691,'Naucalpan de Juárez','ACT'),(692,'Tlalnepantla de Baz','ACT'),(693,'Polotitlán','ACT'),(694,'Jilotepec','ACT'),(695,'Soyaniquilpan de Juárez','ACT'),(696,'Villa del Carbón','ACT'),(697,'Chapa de Mota','ACT'),(698,'Nicolás Romero','ACT'),(699,'Isidro Fabela','ACT'),(700,'Jilotzingo','ACT'),(701,'Tepotzotlán','ACT'),(702,'Coyotepec','ACT'),(703,'Huehuetoca','ACT'),(704,'Cuautitlán Izcalli','ACT'),(705,'Teoloyucan','ACT'),(706,'Cuautitlán','ACT'),(707,'Melchor Ocampo','ACT'),(708,'Tultitlán','ACT'),(709,'Tultepec','ACT'),(710,'Ecatepec de Morelos','ACT'),(711,'Zumpango','ACT'),(712,'Tequixquiac','ACT'),(713,'Apaxco','ACT'),(714,'Hueypoxtla','ACT'),(715,'Coacalco de Berriozábal','ACT'),(716,'Tecámac','ACT'),(717,'Jaltenco','ACT'),(718,'Tonanitla','ACT'),(719,'Nextlalpan','ACT'),(720,'Teotihuacán','ACT'),(721,'San Martín de las Pirámides','ACT'),(722,'Acolman','ACT'),(723,'Otumba','ACT'),(724,'Axapusco','ACT'),(725,'Nopaltepec','ACT'),(726,'Temascalapa','ACT'),(727,'Tezoyuca','ACT'),(728,'Chiautla','ACT'),(729,'Papalotla','ACT'),(730,'Tepetlaoxtoc','ACT'),(731,'Texcoco','ACT'),(732,'Chiconcuac','ACT'),(733,'Atenco','ACT'),(734,'Chimalhuacán','ACT'),(735,'Chicoloapan','ACT'),(736,'Ixtapaluca','ACT'),(737,'Chalco','ACT'),(738,'Valle\n de Chalco Solidaridad','ACT'),(739,'Temamatla','ACT'),(740,'Cocotitlán','ACT'),(741,'Tlalmanalco','ACT'),(742,'Ayapango','ACT'),(743,'Tenango del Aire','ACT'),(744,'Ozumba','ACT'),(745,'Juchitepec','ACT'),(746,'Tepetlixpa','ACT'),(747,'Amecameca','ACT'),(748,'Atlautla','ACT'),(749,'Ecatzingo','ACT'),(750,'Nezahualcóyotl','ACT'),(751,'Morelia','ACT'),(752,'Huaniqueo','ACT'),(753,'Coeneo','ACT'),(754,'Quiroga','ACT'),(755,'Tzintzuntzan','ACT'),(756,'Lagunillas','ACT'),(757,'Acuitzio','ACT'),(758,'Madero','ACT'),(759,'Puruándiro','ACT'),(760,'José Sixto Verduzco','ACT'),(761,'Angamacutiro','ACT'),(762,'Panindícuaro','ACT'),(763,'Zacapu','ACT'),(764,'Tlazazalca','ACT'),(765,'Purépero','ACT'),(766,'Huandacareo','ACT'),(767,'Cuitzeo','ACT'),(768,'Chucándiro','ACT'),(769,'Copándaro','ACT'),(770,'Tarímbaro','ACT'),(771,'Santa Ana Maya','ACT'),(772,'Zinapécuaro','ACT'),(773,'Indaparapeo','ACT'),(774,'Queréndaro','ACT'),(775,'Sahuayo','ACT'),(776,'Briseñas','ACT'),(777,'Cojumatlán de Régules','ACT'),(778,'Pajacuarán','ACT'),(779,'Vista Hermosa','ACT'),(780,'Tanhuato','ACT'),(781,'Yurécuaro','ACT'),(782,'Ixtlán','ACT'),(783,'La Piedad','ACT'),(784,'Numarán','ACT'),(785,'Churintzio','ACT'),(786,'Zináparo','ACT'),(787,'Penjamillo','ACT'),(788,'Marcos Castellanos','ACT'),(789,'Jiquilpan','ACT'),(790,'Villamar','ACT'),(791,'Chavinda','ACT'),(792,'Zamora','ACT'),(793,'Ecuandureo','ACT'),(794,'Tangancícuaro','ACT'),(795,'Chilchota','ACT'),(796,'Jacona','ACT'),(797,'Tangamandapio','ACT'),(798,'Cotija','ACT'),(799,'Tocumbo','ACT'),(800,'Tingüindín','ACT'),(801,'Uruapan','ACT'),(802,'Charapan','ACT'),(803,'Paracho','ACT'),(804,'Cherán','ACT'),(805,'Nahuatzen','ACT'),(806,'Tingambato','ACT'),(807,'Los Reyes','ACT'),(808,'Peribán','ACT'),(809,'Tancítaro','ACT'),(810,'Nuevo Parangaricutiro','ACT'),(811,'Buenavista','ACT'),(812,'Tepalcatepec','ACT'),(813,'Aguililla','ACT'),(814,'Apatzingán','ACT'),(815,'Parácuaro','ACT'),(816,'Coahuayana','ACT'),(817,'Chinicuila','ACT'),(818,'Coalcomán de Vázquez Pallares','ACT'),(819,'Aquila','ACT'),(820,'Tumbiscatío','ACT'),(821,'Lázaro Cárdenas','ACT'),(822,'Epitacio Huerta','ACT'),(823,'Contepec','ACT'),(824,'Tlalpujahua','ACT'),(825,'Maravatío','ACT'),(826,'Irimbo','ACT'),(827,'Senguio','ACT'),(828,'Charo','ACT'),(829,'Tzitzio','ACT'),(830,'Tiquicheo de Nicolás Romero','ACT'),(831,'Aporo','ACT'),(832,'Angangueo','ACT'),(833,'Jungapeo','ACT'),(834,'Zitácuaro','ACT'),(835,'Tuzantla','ACT'),(836,'Susupuato','ACT'),(837,'Pátzcuaro','ACT'),(838,'Erongarícuaro','ACT'),(839,'Huiramba','ACT'),(840,'Tacámbaro','ACT'),(841,'Turicato','ACT'),(842,'Ziracuaretiro','ACT'),(843,'Taretan','ACT'),(844,'Gabriel Zamora','ACT'),(845,'Nuevo Urecho','ACT'),(846,'Múgica','ACT'),(847,'Salvador Escalante','ACT'),(848,'Ario','ACT'),(849,'La Huacana','ACT'),(850,'Churumuco','ACT'),(851,'Nocupétaro','ACT'),(852,'Carácuaro','ACT'),(853,'Huetamo','ACT'),(854,'Cuernavaca','ACT'),(855,'Huitzilac','ACT'),(856,'Tepoztlán','ACT'),(857,'Tlalnepantla','ACT'),(858,'Tlayacapan','ACT'),(859,'Jiutepec','ACT'),(860,'Temixco','ACT'),(861,'Miacatlán','ACT'),(862,'Coatlán del Río','ACT'),(863,'Tetecala','ACT'),(864,'Mazatepec','ACT'),(865,'Amacuzac','ACT'),(866,'Puente de Ixtla','ACT'),(867,'Ayala','ACT'),(868,'Yautepec','ACT'),(869,'Tlaltizapán de Zapata','ACT'),(870,'Zacatepec','ACT'),(871,'Xochitepec','ACT'),(872,'Tetela del Volcán','ACT'),(873,'Yecapixtla','ACT'),(874,'Totolapan','ACT'),(875,'Atlatlahucan','ACT'),(876,'Ocuituco','ACT'),(877,'Temoac','ACT'),(878,'Jojutla','ACT'),(879,'Tepalcingo','ACT'),(880,'Jonacatepec','ACT'),(881,'Axochiapan','ACT'),(882,'Jantetelco','ACT'),(883,'Tlaquiltenango','ACT'),(884,'Tepic','ACT'),(885,'Santiago Ixcuintla','ACT'),(886,'Acaponeta','ACT'),(887,'Tecuala','ACT'),(888,'Huajicori','ACT'),(889,'Del Nayar','ACT'),(890,'La Yesca','ACT'),(891,'Ruíz','ACT'),(892,'Rosamorada','ACT'),(893,'Compostela','ACT'),(894,'Bahía de Banderas','ACT'),(895,'San Blas','ACT'),(896,'Xalisco','ACT'),(897,'San Pedro Lagunillas','ACT'),(898,'Jala','ACT'),(899,'Ahuacatlán','ACT'),(900,'Ixtlán del Río','ACT'),(901,'Amatlán de Cañas','ACT'),(902,'Monterrey','ACT'),(903,'Anáhuac','ACT'),(904,'Lampazos de Naranjo','ACT'),(905,'Mina','ACT'),(906,'Bustamante','ACT'),(907,'Sabinas Hidalgo','ACT'),(908,'Villaldama','ACT'),(909,'Vallecillo','ACT'),(910,'Parás','ACT'),(911,'Salinas Victoria','ACT'),(912,'Ciénega de Flores','ACT'),(913,'Higueras','ACT'),(914,'General Zuazua','ACT'),(915,'Agualeguas','ACT'),(916,'General Treviño','ACT'),(917,'Cerralvo','ACT'),(918,'García','ACT'),(919,'General Escobedo','ACT'),(920,'San Pedro Garza García','ACT'),(921,'San Nicolás de los Garza','ACT'),(922,'El Carmen','ACT'),(923,'Apodaca','ACT'),(924,'Pesquería','ACT'),(925,'Marín','ACT'),(926,'Doctor González','ACT'),(927,'Los Ramones','ACT'),(928,'Los Herreras','ACT'),(929,'Los Aldamas','ACT'),(930,'Doctor Coss','ACT'),(931,'General Bravo','ACT'),(932,'China','ACT'),(933,'Santiago','ACT'),(934,'General Terán','ACT'),(935,'Cadereyta Jiménez','ACT'),(936,'Montemorelos','ACT'),(937,'Rayones','ACT'),(938,'Linares','ACT'),(939,'Iturbide','ACT'),(940,'Hualahuises','ACT'),(941,'Doctor Arroyo','ACT'),(942,'Aramberri','ACT'),(943,'General Zaragoza','ACT'),(944,'Mier y Noriega','ACT'),(945,'Oaxaca de Juárez','ACT'),(946,'Villa de Etla','ACT'),(947,'San Juan Bautista Atatlahuca','ACT'),(948,'San Jerónimo Sosola','ACT'),(949,'San Juan Bautista Jayacatlán','ACT'),(950,'San Francisco Telixtlahuaca','ACT'),(951,'Santiago Tenango','ACT'),(952,'San Pablo Huitzo','ACT'),(953,'San Juan del Estado','ACT'),(954,'Magdalena Apasco','ACT'),(955,'Santiago Suchilquitongo','ACT'),(956,'San Juan Bautista Guelache','ACT'),(957,'Reyes Etla','ACT'),(958,'Nazareno Etla','ACT'),(959,'San Andrés Zautla','ACT'),(960,'San Agustín Etla','ACT'),(961,'Soledad Etla','ACT'),(962,'Santo Tomás Mazaltepec','ACT'),(963,'Guadalupe Etla','ACT'),(964,'San Pablo Etla','ACT'),(965,'San Felipe Tejalápam','ACT'),(966,'San Lorenzo Cacaotepec','ACT'),(967,'Santa María Peñoles','ACT'),(968,'Santiago Tlazoyaltepec','ACT'),(969,'Tlalixtac de Cabrera','ACT'),(970,'San Jacinto Amilpas','ACT'),(971,'San Andrés Huayápam','ACT'),(972,'San Agustín Yatareni','ACT'),(973,'Santo Domingo Tomaltepec','ACT'),(974,'Santa María del Tule','ACT'),(975,'San Juan Bautista Tuxtepec','ACT'),(976,'Loma Bonita','ACT'),(977,'San José Independencia','ACT'),(978,'Cosolapa','ACT'),(979,'Acatlán de Pérez Figueroa','ACT'),(980,'San Miguel Soyaltepec','ACT'),(981,'Ayotzintepec','ACT'),(982,'San Pedro Ixcatlán','ACT'),(983,'San José Chiltepec','ACT'),(984,'San Felipe Jalapa de Díaz','ACT'),(985,'Santa María Jacatepec','ACT'),(986,'San Lucas Ojitlán','ACT'),(987,'San Juan Bautista Valle Nacional','ACT'),(988,'San Felipe Usila','ACT'),(989,'Huautla de Jiménez','ACT'),(990,'Santa María Chilchotla','ACT'),(991,'Santa Ana Ateixtlahuaca','ACT'),(992,'San Lorenzo Cuaunecuiltitla','ACT'),(993,'San Francisco Huehuetlán','ACT'),(994,'San Pedro Ocopetatillo','ACT'),(995,'Santa Cruz Acatepec','ACT'),(996,'Eloxochitlán de Flores Magón','ACT'),(997,'Santiago Texcalcingo','ACT'),(998,'Teotitlán de Flores Magón','ACT'),(999,'Santa María Teopoxco','ACT'),(1000,'San Martín Toxpalan','ACT'),(1001,'San Jerónimo Tecóatl','ACT'),(1002,'Santa María la Asunción','ACT'),(1003,'Huautepec','ACT'),(1004,'San Juan Coatzóspam','ACT'),(1005,'San Lucas Zoquiápam','ACT'),(1006,'San Antonio Nanahuatípam','ACT'),(1007,'San José Tenango','ACT'),(1008,'San Mateo Yoloxochitlán','ACT'),(1009,'San Bartolomé Ayautla','ACT'),(1010,'Mazatlán Villa de Flores','ACT'),(1011,'San Juan de los Cués','ACT'),(1012,'Santa María Tecomavaca','ACT'),(1013,'Santa María Ixcatlán','ACT'),(1014,'San Juan Bautista Cuicatlán','ACT'),(1015,'Cuyamecalco Villa de Zaragoza','ACT'),(1016,'Santa Ana Cuauhtémoc','ACT'),(1017,'Chiquihuitlán de Benito Juárez','ACT'),(1018,'San Pedro Teutila','ACT'),(1019,'San Miguel Santa Flor','ACT'),(1020,'Santa María Tlalixtac','ACT'),(1021,'San Andrés Teotilálpam','ACT'),(1022,'San Francisco Chapulapa','ACT'),(1023,'Concepción Pápalo','ACT'),(1024,'Santos Reyes Pápalo','ACT'),(1025,'San Juan Bautista Tlacoatzintepec','ACT'),(1026,'Santa María Pápalo','ACT'),(1027,'San Juan Tepeuxila','ACT'),(1028,'San Pedro Sochiápam','ACT'),(1029,'Valerio Trujano','ACT'),(1030,'San Pedro Jocotipac','ACT'),(1031,'Santa María Texcatitlán','ACT'),(1032,'San Pedro Jaltepetongo','ACT'),(1033,'Santiago Nacaltepec','ACT'),(1034,'Natividad','ACT'),(1035,'San Juan Quiotepec','ACT'),(1036,'San Pedro Yólox','ACT'),(1037,'Santiago Comaltepec','ACT'),(1038,'Abejones','ACT'),(1039,'San Pablo Macuiltianguis','ACT'),(1040,'Ixtlán de Juárez','ACT'),(1041,'San Juan Atepec','ACT'),(1042,'San Pedro Yaneri','ACT'),(1043,'San Miguel Aloápam','ACT'),(1044,'Teococuilco de Marcos Pérez','ACT'),(1045,'Santa Ana Yareni','ACT'),(1046,'San Juan Evangelista Analco','ACT'),(1047,'Santa María Jaltianguis','ACT'),(1048,'San Miguel del Río','ACT'),(1049,'San Juan Chicomezúchil','ACT'),(1050,'Capulálpam de Méndez','ACT'),(1051,'Nuevo Zoquiápam','ACT'),(1052,'Santiago Xiacuí','ACT'),(1053,'Guelatao de Juárez','ACT'),(1054,'Santa Catarina Ixtepeji','ACT'),(1055,'San Miguel Yotao','ACT'),(1056,'Santa Catarina Lachatao','ACT'),(1057,'San Miguel Amatlán','ACT'),(1058,'Santa María Yavesía','ACT'),(1059,'Santiago Laxopa','ACT'),(1060,'San Ildefonso Villa Alta','ACT'),(1061,'Santiago Camotlán','ACT'),(1062,'San Juan Yaeé','ACT'),(1063,'Santiago Lalopa','ACT'),(1064,'San Juan Yatzona','ACT'),(1065,'Villa Talea de Castro','ACT'),(1066,'Tanetze de Zaragoza','ACT'),(1067,'San Juan Juquila Vijanos','ACT'),(1068,'San Cristóbal Lachirioag','ACT'),(1069,'Santa María Temaxcalapa','ACT'),(1070,'Santo Domingo Roayaga','ACT'),(1071,'Santa María Yalina','ACT'),(1072,'San Andrés Solaga','ACT'),(1073,'San Juan Tabaá','ACT'),(1074,'San Melchor Betaza','ACT'),(1075,'San Andrés Yaá','ACT'),(1076,'San Bartolomé Zoogocho','ACT'),(1077,'San Baltazar\n Yatzachi el Bajo','ACT'),(1078,'Santiago Zoochila','ACT'),(1079,'San Francisco Cajonos','ACT'),(1080,'San Mateo Cajonos','ACT'),(1081,'San Pedro Cajonos','ACT'),(1082,'Santo Domingo Xagacía','ACT'),(1083,'San Pablo Yaganiza','ACT'),(1084,'Santiago Choápam','ACT'),(1085,'Santiago Jocotepec','ACT'),(1086,'San Juan Lalana','ACT'),(1087,'Santiago Yaveo','ACT'),(1088,'San Juan Petlapa','ACT'),(1089,'San Juan Comaltepec','ACT'),(1090,'Heroica Ciudad de Huajuapan de León','ACT'),(1091,'Santiago Chazumba','ACT'),(1092,'Cosoltepec','ACT'),(1093,'San Pedro y San Pablo Tequixtepec','ACT'),(1094,'San Juan Bautista Suchitepec','ACT'),(1095,'Santa Catarina Zapoquila','ACT'),(1096,'Santiago Miltepec','ACT'),(1097,'San Jerónimo Silacayoapilla','ACT'),(1098,'Zapotitlán Palmas','ACT'),(1099,'San Andrés Dinicuiti','ACT'),(1100,'Santiago Cacaloxtepec','ACT'),(1101,'Asunción Cuyotepeji','ACT'),(1102,'Santa María Camotlán','ACT'),(1103,'Santiago Huajolotitlán','ACT'),(1104,'Santiago Tamazola','ACT'),(1105,'San Juan Cieneguilla','ACT'),(1106,'Zapotitlán Lagunas','ACT'),(1107,'San Juan Ihualtepec','ACT'),(1108,'San Nicolás Hidalgo','ACT'),(1109,'Guadalupe de Ramírez','ACT'),(1110,'San Andrés Tepetlapa','ACT'),(1111,'San Miguel Ahuehuetitlán','ACT'),(1112,'San Mateo Nejápam','ACT'),(1113,'San Juan Bautista Tlachichilco','ACT'),(1114,'Tezoatlán de Segura y Luna','ACT'),(1115,'Fresnillo de Trujano','ACT'),(1116,'Santiago Ayuquililla','ACT'),(1117,'San José Ayuquila','ACT'),(1118,'San Martín Zacatepec','ACT'),(1119,'San Miguel Amatitlán','ACT'),(1120,'Mariscala de Juárez','ACT'),(1121,'Santa Cruz Tacache de Mina','ACT'),(1122,'San Simón Zahuatlán','ACT'),(1123,'San Marcos Arteaga','ACT'),(1124,'San Jorge Nuchita','ACT'),(1125,'Santos Reyes Yucuná','ACT'),(1126,'Santo Domingo Tonalá','ACT'),(1127,'Santo Domingo Yodohino','ACT'),(1128,'San Juan Bautista Coixtlahuaca','ACT'),(1129,'Tepelmeme Villa de Morelos','ACT'),(1130,'Concepción Buenavista','ACT'),(1131,'Santiago Ihuitlán Plumas','ACT'),(1132,'Tlacotepec Plumas','ACT'),(1133,'San Francisco Teopan','ACT'),(1134,'Santa Magdalena Jicotlán','ACT'),(1135,'San Mateo Tlapiltepec','ACT'),(1136,'San Miguel Tequixtepec','ACT'),(1137,'San Miguel Tulancingo','ACT'),(1138,'Santiago Tepetlapa','ACT'),(1139,'San Cristóbal Suchixtlahuaca','ACT'),(1140,'Santa María Nativitas','ACT'),(1141,'Silacayoápam','ACT'),(1142,'Santiago Yucuyachi','ACT'),(1143,'San Lorenzo Victoria','ACT'),(1144,'San Agustín Atenango','ACT'),(1145,'Calihualá','ACT'),(1146,'Santa Cruz de Bravo','ACT'),(1147,'Ixpantepec Nieves','ACT'),(1148,'San Francisco Tlapancingo','ACT'),(1149,'Santiago del Río','ACT'),(1150,'San Pedro y San Pablo Teposcolula','ACT'),(1151,'La Trinidad Vista Hermosa','ACT'),(1152,'Villa de Tamazulápam del Progreso','ACT'),(1153,'San Pedro Nopala','ACT'),(1154,'Teotongo','ACT'),(1155,'San Antonio Acutla','ACT'),(1156,'Villa Tejúpam de la Unión','ACT'),(1157,'Santo Domingo Tonaltepec','ACT'),(1158,'Villa de Chilapa de Díaz','ACT'),(1159,'San Antonino Monte Verde','ACT'),(1160,'San Andrés Lagunas','ACT'),(1161,'San Pedro Yucunama','ACT'),(1162,'San Juan Teposcolula','ACT'),(1163,'San Bartolo Soyaltepec','ACT'),(1164,'Santiago Yolomécatl','ACT'),(1165,'San Sebastián Nicananduta','ACT'),(1166,'Santo Domingo Tlatayápam','ACT'),(1167,'Santa María Nduayaco','ACT'),(1168,'San Vicente Nuñú','ACT'),(1169,'San Pedro Topiltepec','ACT'),(1170,'Santiago Nejapilla','ACT'),(1171,'Asunción Nochixtlán','ACT'),(1172,'San Miguel Huautla','ACT'),(1173,'San Miguel Chicahua','ACT'),(1174,'Santa María Apazco','ACT'),(1175,'Santiago Apoala','ACT'),(1176,'Santa María Chachoápam','ACT'),(1177,'San Pedro Coxcaltepec Cántaros','ACT'),(1178,'Santiago Huauclilla','ACT'),(1179,'Santo Domingo Yanhuitlán','ACT'),(1180,'San Andrés Sinaxtla','ACT'),(1181,'San Juan Yucuita','ACT'),(1182,'San Juan Sayultepec','ACT'),(1183,'Santiago Tillo','ACT'),(1184,'San Francisco Chindúa','ACT'),(1185,'San Mateo Etlatongo','ACT'),(1186,'Santa Inés de Zaragoza','ACT'),(1187,'Santiago Juxtlahuaca','ACT'),(1188,'San Miguel Tlacotepec','ACT'),(1189,'San Sebastián Tecomaxtlahuaca','ACT'),(1190,'Santos Reyes Tepejillo','ACT'),(1191,'San Juan Mixtepec -Dto. 08 -','ACT'),(1192,'San Martín Peras','ACT'),(1193,'Coicoyán de las Flores','ACT'),(1194,'Heroica Ciudad de Tlaxiaco','ACT'),(1195,'San Juan Ñumí','ACT'),(1196,'San Pedro Mártir Yucuxaco','ACT'),(1197,'San Martín Huamelúlpam','ACT'),(1198,'Santa Cruz Tayata','ACT'),(1199,'Santiago Nundiche','ACT'),(1200,'Santa María del Rosario','ACT'),(1201,'San Juan Achiutla','ACT'),(1202,'Santa Catarina Tayata','ACT'),(1203,'San Cristóbal Amoltepec','ACT'),(1204,'San Miguel Achiutla','ACT'),(1205,'San Martín Itunyoso','ACT'),(1206,'Magdalena Peñasco','ACT'),(1207,'San Bartolomé Yucuañe','ACT'),(1208,'Santa Cruz Nundaco','ACT'),(1209,'San Agustín Tlacotepec','ACT'),(1210,'Santo Tomás Ocotepec','ACT'),(1211,'San Antonio Sinicahua','ACT'),(1212,'San Mateo Peñasco','ACT'),(1213,'Santa María Tataltepec','ACT'),(1214,'San Pedro Molinos','ACT'),(1215,'Santa María Yosoyúa','ACT'),(1216,'San Juan Teita','ACT'),(1217,'Magdalena Jaltepec','ACT'),(1218,'Magdalena Yodocono de Porfirio Díaz','ACT'),(1219,'San Miguel Tecomatlán','ACT'),(1220,'Magdalena Zahuatlán','ACT'),(1221,'San Francisco Nuxaño','ACT'),(1222,'San Pedro Tidaá','ACT'),(1223,'San Francisco Jaltepetongo','ACT'),(1224,'Santiago Tilantongo','ACT'),(1225,'San Juan Diuxi','ACT'),(1226,'San Andrés Nuxiño','ACT'),(1227,'San Juan Tamazola','ACT'),(1228,'Santo Domingo Nuxaá','ACT'),(1229,'Yutanduchi de Guerrero','ACT'),(1230,'San Pedro Teozacoalco','ACT'),(1231,'San Miguel Piedras','ACT'),(1232,'San Mateo Sindihui','ACT'),(1233,'Heroica Ciudad de Juchitán de Zaragoza','ACT'),(1234,'Ciudad Ixtepec','ACT'),(1235,'El Espinal','ACT'),(1236,'Santo Domingo Ingenio','ACT'),(1237,'Santa María Xadani','ACT'),(1238,'Santiago Niltepec','ACT'),(1239,'San Dionisio del Mar','ACT'),(1240,'Asunción Ixtaltepec','ACT'),(1241,'San Francisco del Mar','ACT'),(1242,'Unión Hidalgo','ACT'),(1243,'San Miguel Chimalapa','ACT'),(1244,'Santo Domingo Zanatepec','ACT'),(1245,'Reforma de Pineda','ACT'),(1246,'San Francisco Ixhuatán','ACT'),(1247,'San Pedro Tapanatepec','ACT'),(1248,'Chahuites','ACT'),(1249,'Santiago Zacatepec','ACT'),(1250,'Santo Domingo Tepuxtepec','ACT'),(1251,'San Juan Cotzocón','ACT'),(1252,'San Juan Mazatlán','ACT'),(1253,'Totontepec Villa de Morelos','ACT'),(1254,'Mixistlán de la Reforma','ACT'),(1255,'Santa María Tlahuitoltepec','ACT'),(1256,'Santa María Alotepec','ACT'),(1257,'Santiago Atitlán','ACT'),(1258,'Tamazulápam del Espíritu Santo','ACT'),(1259,'San Pedro y San Pablo Ayutla','ACT'),(1260,'Santa María Tepantlali','ACT'),(1261,'San Miguel Quetzaltepec','ACT'),(1262,'Asunción Cacalotepec','ACT'),(1263,'San Pedro Ocotepec','ACT'),(1264,'San Lucas Camotlán','ACT'),(1265,'Santiago Ixcuintepec','ACT'),(1266,'Matías Romero Avendaño','ACT'),(1267,'San Juan Guichicovi','ACT'),(1268,'Santo Domingo Petapa','ACT'),(1269,'Santa María Chimalapa','ACT'),(1270,'Santa María Petapa','ACT'),(1271,'El Barrio de la Soledad','ACT'),(1272,'Tlacolula de Matamoros','ACT'),(1273,'San Sebastián Abasolo','ACT'),(1274,'Villa Díaz Ordaz','ACT'),(1275,'Santa María Guelacé','ACT'),(1276,'Teotitlán del Valle','ACT'),(1277,'San Francisco Lachigoló','ACT'),(1278,'San Sebastián Teitipac','ACT'),(1279,'Santa Ana del Valle','ACT'),(1280,'San Pablo Villa de Mitla','ACT'),(1281,'Santiago Matatlán','ACT'),(1282,'Santo Domingo Albarradas','ACT'),(1283,'Rojas de Cuauhtémoc','ACT'),(1284,'San Juan Teitipac','ACT'),(1285,'Santa Cruz Papalutla','ACT'),(1286,'Magdalena Teitipac','ACT'),(1287,'San Jerónimo Tlacochahuaya','ACT'),(1288,'San Juan Guelavía','ACT'),(1289,'San Lucas Quiaviní','ACT'),(1290,'San Bartolomé Quialana','ACT'),(1291,'San Lorenzo Albarradas','ACT'),(1292,'San Pedro Totolápam','ACT'),(1293,'San Pedro Quiatoni','ACT'),(1294,'Santa María Zoquitlán','ACT'),(1295,'San Dionisio Ocotepec','ACT'),(1296,'San Carlos Yautepec','ACT'),(1297,'San Juan Juquila Mixes','ACT'),(1298,'Nejapa de Madero','ACT'),(1299,'Santa Ana Tavela','ACT'),(1300,'San Juan Lajarcia','ACT'),(1301,'San Bartolo Yautepec','ACT'),(1302,'Santa María Ecatepec','ACT'),(1303,'Asunción Tlacolulita','ACT'),(1304,'San Pedro Mártir Quiechapa','ACT'),(1305,'Santa María Quiegolani','ACT'),(1306,'Santa Catarina Quioquitani','ACT'),(1307,'Santa Catalina Quierí','ACT'),(1308,'Salina Cruz','ACT'),(1309,'Santiago Lachiguiri','ACT'),(1310,'Santa María Jalapa del Marqués','ACT'),(1311,'Santa María Totolapilla','ACT'),(1312,'Santiago Laollaga','ACT'),(1313,'Guevea de Humboldt','ACT'),(1314,'Santo Domingo Chihuitán','ACT'),(1315,'Santa María Guienagati','ACT'),(1316,'Magdalena Tequisistlán','ACT'),(1317,'Magdalena Tlacotepec','ACT'),(1318,'San Pedro Comitancillo','ACT'),(1319,'Santa María Mixtequilla','ACT'),(1320,'Santo Domingo Tehuantepec','ACT'),(1321,'San Pedro Huamelula','ACT'),(1322,'San Pedro Huilotepec','ACT'),(1323,'San Mateo del Mar','ACT'),(1324,'San Blas Atempa','ACT'),(1325,'Santiago Astata','ACT'),(1326,'San Miguel Tenango','ACT'),(1327,'Miahuatlán de Porfirio Díaz','ACT'),(1328,'San Nicolás','ACT'),(1329,'San Simón Almolongas','ACT'),(1330,'San Luis Amatlán','ACT'),(1331,'San José Lachiguiri','ACT'),(1332,'Sitio de Xitlapehua','ACT'),(1333,'San Francisco Logueche','ACT'),(1334,'Santa Ana','ACT'),(1335,'Santa Cruz Xitla','ACT'),(1336,'Monjas','ACT'),(1337,'San Ildefonso Amatlán','ACT'),(1338,'Santa Catarina Cuixtla','ACT'),(1339,'San José del Peñasco','ACT'),(1340,'San Cristóbal Amatlán','ACT'),(1341,'San Juan Mixtepec -Dto. 26 -','ACT'),(1342,'San Pedro Mixtepec -Dto. 26 -','ACT'),(1343,'Santa Lucía Miahuatlán','ACT'),(1344,'San Jerónimo Coatlán','ACT'),(1345,'San Sebastián Coatlán','ACT'),(1346,'San Pablo Coatlán','ACT'),(1347,'San Mateo Río Hondo','ACT'),(1348,'Santo Tomás Tamazulapan','ACT'),(1349,'San Andrés Paxtlán','ACT'),(1350,'Santa María Ozolotepec','ACT'),(1351,'San\n Miguel Coatlán','ACT'),(1352,'San Sebastián Río Hondo','ACT'),(1353,'San Miguel Suchixtepec','ACT'),(1354,'Santo Domingo Ozolotepec','ACT'),(1355,'San Francisco Ozolotepec','ACT'),(1356,'Santiago Xanica','ACT'),(1357,'San Marcial Ozolotepec','ACT'),(1358,'San Juan Ozolotepec','ACT'),(1359,'San Pedro Pochutla','ACT'),(1360,'Santo Domingo de Morelos','ACT'),(1361,'Santa Catarina Loxicha','ACT'),(1362,'San Agustín Loxicha','ACT'),(1363,'San Baltazar Loxicha','ACT'),(1364,'Santa María Colotepec','ACT'),(1365,'San Bartolomé Loxicha','ACT'),(1366,'Santa María Tonameca','ACT'),(1367,'Candelaria Loxicha','ACT'),(1368,'Pluma Hidalgo','ACT'),(1369,'San Pedro el Alto','ACT'),(1370,'San Mateo Piñas','ACT'),(1371,'Santa María Huatulco','ACT'),(1372,'San Miguel del Puerto','ACT'),(1373,'Putla Villa de Guerrero','ACT'),(1374,'Constancia del Rosario','ACT'),(1375,'Mesones Hidalgo','ACT'),(1376,'Santa María Zacatepec','ACT'),(1377,'San Pedro Amuzgos','ACT'),(1378,'La Reforma','ACT'),(1379,'Santa María Ipalapa','ACT'),(1380,'Chalcatongo de Hidalgo','ACT'),(1381,'Santa María Yucuhiti','ACT'),(1382,'San Esteban Atatlahuca','ACT'),(1383,'Santa Catarina Ticuá','ACT'),(1384,'Santiago Nuyoó','ACT'),(1385,'Santa Catarina Yosonotú','ACT'),(1386,'San Miguel el Grande','ACT'),(1387,'Santo Domingo Ixcatlán','ACT'),(1388,'San Pablo Tijaltepec','ACT'),(1389,'Santa Cruz Tacahua','ACT'),(1390,'Santa Lucía Monteverde','ACT'),(1391,'San Andrés Cabecera Nueva','ACT'),(1392,'Santa María Yolotepec','ACT'),(1393,'Santiago Yosondúa','ACT'),(1394,'Santa Cruz Itundujia','ACT'),(1395,'Zimatlán de Álvarez','ACT'),(1396,'San Bernardo Mixtepec','ACT'),(1397,'Santa Cruz Mixtepec','ACT'),(1398,'San Miguel Mixtepec','ACT'),(1399,'Santa María Atzompa','ACT'),(1400,'San Andrés Ixtlahuaca','ACT'),(1401,'Santa Cruz Amilpas','ACT'),(1402,'Santa Cruz Xoxocotlán','ACT'),(1403,'Santa Lucía del Camino','ACT'),(1404,'San Pedro Ixtlahuaca','ACT'),(1405,'San Antonio de la Cal','ACT'),(1406,'San Agustín de las Juntas','ACT'),(1407,'San Pablo Huixtepec','ACT'),(1408,'Ánimas Trujano','ACT'),(1409,'San Jacinto Tlacotepec','ACT'),(1410,'San Raymundo Jalpan','ACT'),(1411,'Trinidad Zaachila','ACT'),(1412,'Santa María Coyotepec','ACT'),(1413,'San Bartolo Coyotepec','ACT'),(1414,'Santa Inés Yatzeche','ACT'),(1415,'Ciénega de Zimatlán','ACT'),(1416,'San Antonio Huitepec','ACT'),(1417,'Villa de Zaachila','ACT'),(1418,'San Sebastián Tutla','ACT'),(1419,'San Miguel Peras','ACT'),(1420,'San Pablo Cuatro Venados','ACT'),(1421,'Santa Inés del Monte','ACT'),(1422,'Santa Gertrudis','ACT'),(1423,'San Antonino el Alto','ACT'),(1424,'Magdalena Mixtepec','ACT'),(1425,'Santa Catarina Quiané','ACT'),(1426,'Ayoquezco de Aldama','ACT'),(1427,'Santa Ana Tlapacoyan','ACT'),(1428,'Santa Cruz Zenzontepec','ACT'),(1429,'San Francisco Cahuacuá','ACT'),(1430,'San Mateo Yucutindoo','ACT'),(1431,'Santiago Textitlán','ACT'),(1432,'Santiago Amoltepec','ACT'),(1433,'Santa María Zaniza','ACT'),(1434,'Santo Domingo Teojomulco','ACT'),(1435,'Cuilápam de Guerrero','ACT'),(1436,'Villa Sola de Vega','ACT'),(1437,'Santa María Lachixío','ACT'),(1438,'San Vicente Lachixío','ACT'),(1439,'San Lorenzo Texmelúcan','ACT'),(1440,'Santa María Sola','ACT'),(1441,'San Francisco Sola','ACT'),(1442,'San Ildefonso Sola','ACT'),(1443,'Santiago Minas','ACT'),(1444,'Heroica Ciudad de Ejutla de Crespo','ACT'),(1445,'San Martín Tilcajete','ACT'),(1446,'Santo Tomás Jalieza','ACT'),(1447,'San Juan Chilateca','ACT'),(1448,'Ocotlán de Morelos','ACT'),(1449,'Santa Ana Zegache','ACT'),(1450,'Santiago Apóstol','ACT'),(1451,'San Antonino Castillo Velasco','ACT'),(1452,'Asunción Ocotlán','ACT'),(1453,'San Pedro Mártir','ACT'),(1454,'San Dionisio Ocotlán','ACT'),(1455,'Magdalena Ocotlán','ACT'),(1456,'San Miguel Tilquiápam','ACT'),(1457,'Santa Catarina Minas','ACT'),(1458,'San Baltazar Chichicápam','ACT'),(1459,'San Pedro Apóstol','ACT'),(1460,'Santa Lucía Ocotlán','ACT'),(1461,'San Jerónimo Taviche','ACT'),(1462,'San Andrés Zabache','ACT'),(1463,'San José del Progreso','ACT'),(1464,'Yaxe','ACT'),(1465,'San Pedro Taviche','ACT'),(1466,'San Martín de los Cansecos','ACT'),(1467,'San Martín Lachilá','ACT'),(1468,'La Pe','ACT'),(1469,'La Compañía','ACT'),(1470,'Coatecas Altas','ACT'),(1471,'San Juan Lachigalla','ACT'),(1472,'San Agustín Amatengo','ACT'),(1473,'Taniche','ACT'),(1474,'San Miguel Ejutla','ACT'),(1475,'Yogana','ACT'),(1476,'San Vicente Coatlán','ACT'),(1477,'Santiago Pinotepa Nacional','ACT'),(1478,'San Juan Cacahuatepec','ACT'),(1479,'San Juan Bautista Lo de Soto','ACT'),(1480,'Mártires de Tacubaya','ACT'),(1481,'San Sebastián Ixcapa','ACT'),(1482,'San Antonio Tepetlapa','ACT'),(1483,'Santa María Cortijo','ACT'),(1484,'Santiago Llano Grande','ACT'),(1485,'San Miguel Tlacamama','ACT'),(1486,'Santiago Tapextla','ACT'),(1487,'San José Estancia Grande','ACT'),(1488,'Santo Domingo Armenta','ACT'),(1489,'Santiago Jamiltepec','ACT'),(1490,'San Pedro Atoyac','ACT'),(1491,'San Juan Colorado','ACT'),(1492,'Santiago Ixtayutla','ACT'),(1493,'San Pedro Jicayán','ACT'),(1494,'Pinotepa de Don Luis','ACT'),(1495,'San Lorenzo','ACT'),(1496,'San Agustín Chayuco','ACT'),(1497,'San Andrés Huaxpaltepec','ACT'),(1498,'Santa Catarina Mechoacán','ACT'),(1499,'Santiago Tetepec','ACT'),(1500,'Santa María Huazolotitlán','ACT'),(1501,'Villa de Tututepec de Melchor Ocampo','ACT'),(1502,'Tataltepec de Valdés','ACT'),(1503,'San Juan Quiahije','ACT'),(1504,'San Miguel Panixtlahuaca','ACT'),(1505,'Santa Catarina Juquila','ACT'),(1506,'San Pedro Juchatengo','ACT'),(1507,'Santiago Yaitepec','ACT'),(1508,'San Juan Lachao','ACT'),(1509,'Santa María Temaxcaltepec','ACT'),(1510,'Santos Reyes Nopala','ACT'),(1511,'San Gabriel Mixtepec','ACT'),(1512,'San Pedro Mixtepec -Dto. 22 -','ACT'),(1513,'Puebla','ACT'),(1514,'Tlaltenango','ACT'),(1515,'San Miguel Xoxtla','ACT'),(1516,'Juan C. Bonilla','ACT'),(1517,'Coronango','ACT'),(1518,'Cuautlancingo','ACT'),(1519,'San Pedro Cholula','ACT'),(1520,'San Andrés Cholula','ACT'),(1521,'Ocoyucan','ACT'),(1522,'Amozoc','ACT'),(1523,'Francisco Z. Mena','ACT'),(1524,'Jalpan','ACT'),(1525,'Tlaxco','ACT'),(1526,'Tlacuilotepec','ACT'),(1527,'Xicotepec','ACT'),(1528,'Pahuatlán','ACT'),(1529,'Honey','ACT'),(1530,'Naupan','ACT'),(1531,'Huauchinango','ACT'),(1532,'Ahuazotepec','ACT'),(1533,'Juan Galindo','ACT'),(1534,'Tlaola','ACT'),(1535,'Zihuateutla','ACT'),(1536,'Jopala','ACT'),(1537,'Tlapacoya','ACT'),(1538,'Chignahuapan','ACT'),(1539,'Zacatlán','ACT'),(1540,'Chiconcuautla','ACT'),(1541,'Tepetzintla','ACT'),(1542,'San Felipe Tepatlán','ACT'),(1543,'Amixtlán','ACT'),(1544,'Tepango de Rodríguez','ACT'),(1545,'Zongozotla','ACT'),(1546,'Hermenegildo Galeana','ACT'),(1547,'Olintla','ACT'),(1548,'Coatepec','ACT'),(1549,'Camocuautla','ACT'),(1550,'Hueytlalpan','ACT'),(1551,'Zapotitlán de Méndez','ACT'),(1552,'Huitzilan de Serdán','ACT'),(1553,'Xochitlán de Vicente Suárez','ACT'),(1554,'Ixtepec','ACT'),(1555,'Atlequizayan','ACT'),(1556,'Tenampulco','ACT'),(1557,'Tuzamapan de Galeana','ACT'),(1558,'Caxhuacan','ACT'),(1559,'Jonotla','ACT'),(1560,'Zoquiapan','ACT'),(1561,'Nauzontla','ACT'),(1562,'Cuetzalan del Progreso','ACT'),(1563,'Ayotoxco de Guerrero','ACT'),(1564,'Hueytamalco','ACT'),(1565,'Acateno','ACT'),(1566,'Cuautempan','ACT'),(1567,'Aquixtla','ACT'),(1568,'Tetela de Ocampo','ACT'),(1569,'Xochiapulco','ACT'),(1570,'Zacapoaxtla','ACT'),(1571,'Ixtacamaxtitlán','ACT'),(1572,'Zautla','ACT'),(1573,'Libres','ACT'),(1574,'Teziutlán','ACT'),(1575,'Tlatlauquitepec','ACT'),(1576,'Yaonáhuac','ACT'),(1577,'Hueyapan','ACT'),(1578,'Teteles de Avila Castillo','ACT'),(1579,'Atempan','ACT'),(1580,'Chignautla','ACT'),(1581,'Xiutetelco','ACT'),(1582,'Cuyoaco','ACT'),(1583,'Tepeyahualco','ACT'),(1584,'San Martín Texmelucan','ACT'),(1585,'Tlahuapan','ACT'),(1586,'San Matías Tlalancaleca','ACT'),(1587,'San Salvador el Verde','ACT'),(1588,'San Felipe Teotlalcingo','ACT'),(1589,'Chiautzingo','ACT'),(1590,'Huejotzingo','ACT'),(1591,'Domingo Arenas','ACT'),(1592,'Calpan','ACT'),(1593,'San Nicolás de los Ranchos','ACT'),(1594,'Atlixco','ACT'),(1595,'Nealtican','ACT'),(1596,'San Jerónimo Tecuanipan','ACT'),(1597,'San Gregorio Atzompa','ACT'),(1598,'Tochimilco','ACT'),(1599,'Tianguismanalco','ACT'),(1600,'Santa Isabel Cholula','ACT'),(1601,'Huaquechula','ACT'),(1602,'San Diego la Mesa Tochimiltzingo','ACT'),(1603,'Tepeojuma','ACT'),(1604,'Izúcar de Matamoros','ACT'),(1605,'Atzitzihuacán','ACT'),(1606,'Acteopan','ACT'),(1607,'Cohuecan','ACT'),(1608,'Tepemaxalco','ACT'),(1609,'Tlapanalá','ACT'),(1610,'Tepexco','ACT'),(1611,'Tilapa','ACT'),(1612,'Chietla','ACT'),(1613,'Atzala','ACT'),(1614,'Teopantlán','ACT'),(1615,'San Martín Totoltepec','ACT'),(1616,'Xochiltepec','ACT'),(1617,'Epatlán','ACT'),(1618,'Ahuatlán','ACT'),(1619,'Coatzingo','ACT'),(1620,'Santa Catarina Tlaltempan','ACT'),(1621,'Chigmecatitlán','ACT'),(1622,'Zacapala','ACT'),(1623,'Tepexi de Rodríguez','ACT'),(1624,'Teotlalco','ACT'),(1625,'Jolalpan','ACT'),(1626,'Huehuetlán el Chico','ACT'),(1627,'Cohetzala','ACT'),(1628,'Xicotlán','ACT'),(1629,'Chila de la Sal','ACT'),(1630,'Ixcamilpa de Guerrero','ACT'),(1631,'Albino Zertuche','ACT'),(1632,'Tulcingo','ACT'),(1633,'Tehuitzingo','ACT'),(1634,'Cuayuca de Andrade','ACT'),(1635,'Santa Inés Ahuatempan','ACT'),(1636,'Axutla','ACT'),(1637,'Chinantla','ACT'),(1638,'Ahuehuetitla','ACT'),(1639,'San Pablo Anicano','ACT'),(1640,'Tecomatlán','ACT'),(1641,'Piaxtla','ACT'),(1642,'Ixcaquixtla','ACT'),(1643,'Xayacatlán de Bravo','ACT'),(1644,'Totoltepec de Guerrero','ACT'),(1645,'San Jerónimo Xayacatlán','ACT'),(1646,'San Pedro Yeloixtlahuaca','ACT'),(1647,'Petlalcingo','ACT'),(1648,'San Miguel Ixitlán','ACT'),(1649,'Chila','ACT'),(1650,'Rafael Lara Grajales','ACT'),(1651,'San José Chiapa','ACT'),(1652,'Oriental','ACT'),(1653,'San Nicolás Buenos Aires','ACT'),(1654,'Tlachichuca','ACT'),(1655,'Lafragua','ACT'),(1656,'Chilchotla','ACT'),(1657,'Quimixtlán','ACT'),(1658,'Chichiquila','ACT'),(1659,'Tepatlaxco\n de Hidalgo','ACT'),(1660,'Acajete','ACT'),(1661,'Nopalucan','ACT'),(1662,'Mazapiltepec de Juárez','ACT'),(1663,'Soltepec','ACT'),(1664,'Acatzingo','ACT'),(1665,'San Salvador el Seco','ACT'),(1666,'General Felipe Ángeles','ACT'),(1667,'Aljojuca','ACT'),(1668,'San Juan Atenco','ACT'),(1669,'Tepeaca','ACT'),(1670,'Cuautinchán','ACT'),(1671,'Tecali de Herrera','ACT'),(1672,'Mixtla','ACT'),(1673,'Santo Tomás Hueyotlipan','ACT'),(1674,'Tzicatlacoyan','ACT'),(1675,'Huehuetlán el Grande','ACT'),(1676,'La Magdalena Tlatlauquitepec','ACT'),(1677,'San Juan Atzompa','ACT'),(1678,'Huatlatlauca','ACT'),(1679,'Los Reyes de Juárez','ACT'),(1680,'Cuapiaxtla de Madero','ACT'),(1681,'San Salvador Huixcolotla','ACT'),(1682,'Quecholac','ACT'),(1683,'Tecamachalco','ACT'),(1684,'Palmar de Bravo','ACT'),(1685,'Chalchicomula de Sesma','ACT'),(1686,'Atzitzintla','ACT'),(1687,'Esperanza','ACT'),(1688,'Cañada Morelos','ACT'),(1689,'Tlanepantla','ACT'),(1690,'Tochtepec','ACT'),(1691,'Atoyatempan','ACT'),(1692,'Tepeyahualco de Cuauhtémoc','ACT'),(1693,'Huitziltepec','ACT'),(1694,'Molcaxac','ACT'),(1695,'Xochitlán Todos Santos','ACT'),(1696,'Yehualtepec','ACT'),(1697,'Tlacotepec de Benito Juárez','ACT'),(1698,'Juan N. Méndez','ACT'),(1699,'Tehuacán','ACT'),(1700,'Tepanco de López','ACT'),(1701,'Chapulco','ACT'),(1702,'Santiago Miahuatlán','ACT'),(1703,'Nicolás Bravo','ACT'),(1704,'Atexcal','ACT'),(1705,'San Antonio Cañada','ACT'),(1706,'Zapotitlán','ACT'),(1707,'San Gabriel Chilac','ACT'),(1708,'Caltepec','ACT'),(1709,'Ajalpan','ACT'),(1710,'Zoquitlán','ACT'),(1711,'San Sebastián Tlacotepec','ACT'),(1712,'Altepexi','ACT'),(1713,'Zinacatepec','ACT'),(1714,'San José Miahuatlán','ACT'),(1715,'Coxcatlán','ACT'),(1716,'Coyomeapan','ACT'),(1717,'Querétaro','ACT'),(1718,'El Marqués','ACT'),(1719,'Colón','ACT'),(1720,'Pinal de Amoles','ACT'),(1721,'Jalpan de Serra','ACT'),(1722,'Landa de Matamoros','ACT'),(1723,'Arroyo Seco','ACT'),(1724,'Peñamiller','ACT'),(1725,'Cadereyta de Montes','ACT'),(1726,'San Joaquín','ACT'),(1727,'Ezequiel Montes','ACT'),(1728,'Pedro Escobedo','ACT'),(1729,'Tequisquiapan','ACT'),(1730,'Amealco de Bonfil','ACT'),(1731,'Corregidora','ACT'),(1732,'Huimilpan','ACT'),(1733,'Othón P. Blanco','ACT'),(1734,'Felipe Carrillo Puerto','ACT'),(1735,'Isla Mujeres','ACT'),(1736,'Cozumel','ACT'),(1737,'Solidaridad','ACT'),(1738,'Tulum','ACT'),(1739,'José María Morelos','ACT'),(1740,'Bacalar','ACT'),(1741,'San Luis Potosí','ACT'),(1742,'Soledad de Graciano Sánchez','ACT'),(1743,'Cerro de San Pedro','ACT'),(1744,'Ahualulco','ACT'),(1745,'Mexquitic de Carmona','ACT'),(1746,'Villa de Arriaga','ACT'),(1747,'Vanegas','ACT'),(1748,'Cedral','ACT'),(1749,'Catorce','ACT'),(1750,'Charcas','ACT'),(1751,'Salinas','ACT'),(1752,'Santo Domingo','ACT'),(1753,'Villa de Ramos','ACT'),(1754,'Matehuala','ACT'),(1755,'Villa de la Paz','ACT'),(1756,'Villa de Guadalupe','ACT'),(1757,'Guadalcázar','ACT'),(1758,'Moctezuma','ACT'),(1759,'Venado','ACT'),(1760,'Villa de Arista','ACT'),(1761,'Armadillo de los Infante','ACT'),(1762,'Ciudad Valles','ACT'),(1763,'Ebano','ACT'),(1764,'Tamuín','ACT'),(1765,'El Naranjo','ACT'),(1766,'Ciudad del Maíz','ACT'),(1767,'Alaquines','ACT'),(1768,'Cárdenas','ACT'),(1769,'Cerritos','ACT'),(1770,'Villa Juárez','ACT'),(1771,'San Nicolás Tolentino','ACT'),(1772,'Villa de Reyes','ACT'),(1773,'Santa María del Río','ACT'),(1774,'Tierra Nueva','ACT'),(1775,'Rioverde','ACT'),(1776,'Ciudad Fernández','ACT'),(1777,'San Ciro de Acosta','ACT'),(1778,'Tamasopo','ACT'),(1779,'Aquismón','ACT'),(1780,'Tancanhuitz','ACT'),(1781,'Tanlajás','ACT'),(1782,'San Vicente Tancuayalab','ACT'),(1783,'San Antonio','ACT'),(1784,'Tanquián de Escobedo','ACT'),(1785,'Tampamolón Corona','ACT'),(1786,'Huehuetlán','ACT'),(1787,'Xilitla','ACT'),(1788,'Axtla de Terrazas','ACT'),(1789,'Tampacán','ACT'),(1790,'San Martín Chalchicuautla','ACT'),(1791,'Tamazunchale','ACT'),(1792,'Matlapa','ACT'),(1793,'Culiacán','ACT'),(1794,'Navolato','ACT'),(1795,'Badiraguato','ACT'),(1796,'Cosalá','ACT'),(1797,'Mocorito','ACT'),(1798,'Guasave','ACT'),(1799,'Ahome','ACT'),(1800,'Salvador Alvarado','ACT'),(1801,'Angostura','ACT'),(1802,'Choix','ACT'),(1803,'El Fuerte','ACT'),(1804,'Sinaloa','ACT'),(1805,'Mazatlán','ACT'),(1806,'Escuinapa','ACT'),(1807,'Concordia','ACT'),(1808,'Elota','ACT'),(1809,'San Ignacio','ACT'),(1810,'Hermosillo','ACT'),(1811,'San Miguel de Horcasitas','ACT'),(1812,'Carbó','ACT'),(1813,'San Luis Río Colorado','ACT'),(1814,'Puerto Peñasco','ACT'),(1815,'General Plutarco Elías Calles','ACT'),(1816,'Caborca','ACT'),(1817,'Altar','ACT'),(1818,'Tubutama','ACT'),(1819,'Atil','ACT'),(1820,'Oquitoa','ACT'),(1821,'Sáric','ACT'),(1822,'Benjamín Hill','ACT'),(1823,'Trincheras','ACT'),(1824,'Pitiquito','ACT'),(1825,'Nogales','ACT'),(1826,'Imuris','ACT'),(1827,'Santa Cruz','ACT'),(1828,'Naco','ACT'),(1829,'Agua Prieta','ACT'),(1830,'Fronteras','ACT'),(1831,'Nacozari de García','ACT'),(1832,'Bavispe','ACT'),(1833,'Bacerac','ACT'),(1834,'Huachinera','ACT'),(1835,'Nácori Chico','ACT'),(1836,'Granados','ACT'),(1837,'Bacadéhuachi','ACT'),(1838,'Cumpas','ACT'),(1839,'Huásabas','ACT'),(1840,'Cananea','ACT'),(1841,'Arizpe','ACT'),(1842,'Cucurpe','ACT'),(1843,'Bacoachi','ACT'),(1844,'San Pedro de la Cueva','ACT'),(1845,'Divisaderos','ACT'),(1846,'Tepache','ACT'),(1847,'Villa Pesqueira','ACT'),(1848,'Opodepe','ACT'),(1849,'Huépac','ACT'),(1850,'Banámichi','ACT'),(1851,'Ures','ACT'),(1852,'Aconchi','ACT'),(1853,'Baviácora','ACT'),(1854,'San Felipe de Jesús','ACT'),(1855,'Cajeme','ACT'),(1856,'Navojoa','ACT'),(1857,'Huatabampo','ACT'),(1858,'Bácum','ACT'),(1859,'Etchojoa','ACT'),(1860,'Empalme','ACT'),(1861,'Guaymas','ACT'),(1862,'San Ignacio Río Muerto','ACT'),(1863,'La Colorada','ACT'),(1864,'Suaqui Grande','ACT'),(1865,'Sahuaripa','ACT'),(1866,'San Javier','ACT'),(1867,'Soyopa','ACT'),(1868,'Bacanora','ACT'),(1869,'Arivechi','ACT'),(1870,'Quiriego','ACT'),(1871,'Onavas','ACT'),(1872,'Alamos','ACT'),(1873,'Yécora','ACT'),(1874,'Centro','ACT'),(1875,'Jalpa de Méndez','ACT'),(1876,'Nacajuca','ACT'),(1877,'Comalcalco','ACT'),(1878,'Huimanguillo','ACT'),(1879,'Paraíso','ACT'),(1880,'Cunduacán','ACT'),(1881,'Macuspana','ACT'),(1882,'Centla','ACT'),(1883,'Jonuta','ACT'),(1884,'Teapa','ACT'),(1885,'Jalapa','ACT'),(1886,'Tacotalpa','ACT'),(1887,'Tenosique','ACT'),(1888,'Balancán','ACT'),(1889,'Llera','ACT'),(1890,'Güémez','ACT'),(1891,'Casas','ACT'),(1892,'Valle Hermoso','ACT'),(1893,'Cruillas','ACT'),(1894,'Soto la Marina','ACT'),(1895,'San Carlos','ACT'),(1896,'Padilla','ACT'),(1897,'Mainero','ACT'),(1898,'Tula','ACT'),(1899,'Jaumave','ACT'),(1900,'Miquihuana','ACT'),(1901,'Palmillas','ACT'),(1902,'Nuevo Laredo','ACT'),(1903,'Miguel Alemán','ACT'),(1904,'Mier','ACT'),(1905,'Gustavo Díaz Ordaz','ACT'),(1906,'Reynosa','ACT'),(1907,'Río Bravo','ACT'),(1908,'Méndez','ACT'),(1909,'Burgos','ACT'),(1910,'Tampico','ACT'),(1911,'Ciudad Madero','ACT'),(1912,'Altamira','ACT'),(1913,'González','ACT'),(1914,'Xicoténcatl','ACT'),(1915,'El Mante','ACT'),(1916,'Antiguo Morelos','ACT'),(1917,'Nuevo Morelos','ACT'),(1918,'Tlaxcala','ACT'),(1919,'Ixtacuixtla de Mariano Matamoros','ACT'),(1920,'Santa Ana Nopalucan','ACT'),(1921,'Panotla','ACT'),(1922,'Totolac','ACT'),(1923,'Tepeyanco','ACT'),(1924,'Santa Isabel Xiloxoxtla','ACT'),(1925,'San Juan Huactzinco','ACT'),(1926,'Calpulalpan','ACT'),(1927,'Sanctórum de Lázaro Cárdenas','ACT'),(1928,'Hueyotlipan','ACT'),(1929,'Nanacamilpa de Mariano Arista','ACT'),(1930,'Españita','ACT'),(1931,'Apizaco','ACT'),(1932,'Atlangatepec','ACT'),(1933,'Muñoz de Domingo Arenas','ACT'),(1934,'Tetla de la Solidaridad','ACT'),(1935,'Xaltocan','ACT'),(1936,'San Lucas Tecopilco','ACT'),(1937,'Yauhquemehcan','ACT'),(1938,'Xaloztoc','ACT'),(1939,'Tocatlán','ACT'),(1940,'Tzompantepec','ACT'),(1941,'San José Teacalco','ACT'),(1942,'Huamantla','ACT'),(1943,'Terrenate','ACT'),(1944,'Atltzayanca','ACT'),(1945,'Cuapiaxtla','ACT'),(1946,'El Carmen Tequexquitla','ACT'),(1947,'Ixtenco','ACT'),(1948,'Ziltlaltépec de Trinidad Sánchez Santos','ACT'),(1949,'Apetatitlán de Antonio Carvajal','ACT'),(1950,'Amaxac de Guerrero','ACT'),(1951,'Santa Cruz Tlaxcala','ACT'),(1952,'Cuaxomulco','ACT'),(1953,'Contla de Juan Cuamatzi','ACT'),(1954,'Tepetitla de Lardizábal','ACT'),(1955,'Natívitas','ACT'),(1956,'Santa Apolonia Teacalco','ACT'),(1957,'Tetlatlahuca','ACT'),(1958,'San Damián Texóloc','ACT'),(1959,'San Jerónimo Zacualpan','ACT'),(1960,'Zacatelco','ACT'),(1961,'San Lorenzo Axocomanitla','ACT'),(1962,'Santa Catarina Ayometla','ACT'),(1963,'Xicohtzinco','ACT'),(1964,'Papalotla de Xicohténcatl','ACT'),(1965,'Chiautempan','ACT'),(1966,'La Magdalena Tlaltelulco','ACT'),(1967,'San Francisco Tetlanohcan','ACT'),(1968,'Teolocholco','ACT'),(1969,'Acuamanala de Miguel Hidalgo','ACT'),(1970,'Santa Cruz Quilehtla','ACT'),(1971,'Mazatecochco de José María Morelos','ACT'),(1972,'San Pablo del Monte','ACT'),(1973,'Xalapa','ACT'),(1974,'Tlalnelhuayocan','ACT'),(1975,'Xico','ACT'),(1976,'Ixhuacán de los Reyes','ACT'),(1977,'Ayahualulco','ACT'),(1978,'Perote','ACT'),(1979,'Banderilla','ACT'),(1980,'Rafael Lucio','ACT'),(1981,'Las Vigas de Ramírez','ACT'),(1982,'Villa Aldama','ACT'),(1983,'Tlacolulan','ACT'),(1984,'Tonayán','ACT'),(1985,'Coacoatzintla','ACT'),(1986,'Naolinco','ACT'),(1987,'Miahuatlán','ACT'),(1988,'Tepetlán','ACT'),(1989,'Juchique de Ferrer','ACT'),(1990,'Alto Lucero de Gutiérrez Barrios','ACT'),(1991,'Teocelo','ACT'),(1992,'Cosautlán de Carvajal','ACT'),(1993,'Apazapan','ACT'),(1994,'Puente Nacional','ACT'),(1995,'Ursulo Galván','ACT'),(1996,'Paso de Ovejas','ACT'),(1997,'La Antigua','ACT'),(1998,'Veracruz','ACT'),(1999,'Pánuco','ACT'),(2000,'Pueblo Viejo','ACT'),(2001,'Tampico Alto','ACT'),(2002,'Tempoal','ACT'),(2003,'Ozuluama de Mascareñas','ACT'),(2004,'Tantoyuca','ACT'),(2005,'Platón Sánchez','ACT'),(2006,'Chiconamel','ACT'),(2007,'Chalma','ACT'),(2008,'Chontla','ACT'),(2009,'Citlaltépetl','ACT'),(2010,'Ixcatepec','ACT'),(2011,'Naranjos\n Amatlán','ACT'),(2012,'El Higo','ACT'),(2013,'Chinampa de Gorostiza','ACT'),(2014,'Tantima','ACT'),(2015,'Tamalín','ACT'),(2016,'Cerro Azul','ACT'),(2017,'Tancoco','ACT'),(2018,'Tamiahua','ACT'),(2019,'Huayacocotla','ACT'),(2020,'Ilamatlán','ACT'),(2021,'Zontecomatlán de López y Fuentes','ACT'),(2022,'Texcatepec','ACT'),(2023,'Tlachichilco','ACT'),(2024,'Ixhuatlán de Madero','ACT'),(2025,'Chicontepec','ACT'),(2026,'Álamo Temapache','ACT'),(2027,'Tihuatlán','ACT'),(2028,'Castillo de Teayo','ACT'),(2029,'Cazones de Herrera','ACT'),(2030,'Zozocolco de Hidalgo','ACT'),(2031,'Chumatlán','ACT'),(2032,'Coxquihui','ACT'),(2033,'Mecatlán','ACT'),(2034,'Filomeno Mata','ACT'),(2035,'Coahuitlán','ACT'),(2036,'Coyutla','ACT'),(2037,'Coatzintla','ACT'),(2038,'Espinal','ACT'),(2039,'Poza Rica de Hidalgo','ACT'),(2040,'Papantla','ACT'),(2041,'Gutiérrez Zamora','ACT'),(2042,'Tecolutla','ACT'),(2043,'Martínez de la Torre','ACT'),(2044,'San Rafael','ACT'),(2045,'Tlapacoyan','ACT'),(2046,'Jalacingo','ACT'),(2047,'Atzalan','ACT'),(2048,'Altotonga','ACT'),(2049,'Las Minas','ACT'),(2050,'Tatatila','ACT'),(2051,'Tenochtitlán','ACT'),(2052,'Nautla','ACT'),(2053,'Misantla','ACT'),(2054,'Landero y Coss','ACT'),(2055,'Chiconquiaco','ACT'),(2056,'Yecuatla','ACT'),(2057,'Colipa','ACT'),(2058,'Vega de Alatorre','ACT'),(2059,'Jalcomulco','ACT'),(2060,'Tlaltetela','ACT'),(2061,'Tenampa','ACT'),(2062,'Totutla','ACT'),(2063,'Sochiapa','ACT'),(2064,'Tlacotepec de Mejía','ACT'),(2065,'Huatusco','ACT'),(2066,'Calcahualco','ACT'),(2067,'Alpatláhuac','ACT'),(2068,'Coscomatepec','ACT'),(2069,'La Perla','ACT'),(2070,'Chocamán','ACT'),(2071,'Ixhuatlán del Café','ACT'),(2072,'Tepatlaxco','ACT'),(2073,'Comapa','ACT'),(2074,'Zentla','ACT'),(2075,'Camarón de Tejeda','ACT'),(2076,'Soledad de Doblado','ACT'),(2077,'Manlio Fabio Altamirano','ACT'),(2078,'Jamapa','ACT'),(2079,'Medellín','ACT'),(2080,'Boca del Río','ACT'),(2081,'Orizaba','ACT'),(2082,'Rafael Delgado','ACT'),(2083,'Mariano Escobedo','ACT'),(2084,'Ixhuatlancillo','ACT'),(2085,'Atzacan','ACT'),(2086,'Ixtaczoquitlán','ACT'),(2087,'Fortín','ACT'),(2088,'Córdoba','ACT'),(2089,'Maltrata','ACT'),(2090,'Río Blanco','ACT'),(2091,'Camerino Z. Mendoza','ACT'),(2092,'Acultzingo','ACT'),(2093,'Soledad Atzompa','ACT'),(2094,'Huiloapan de Cuauhtémoc','ACT'),(2095,'Tlaquilpa','ACT'),(2096,'Astacinga','ACT'),(2097,'Xoxocotla','ACT'),(2098,'Atlahuilco','ACT'),(2099,'San Andrés Tenejapan','ACT'),(2100,'Tlilapan','ACT'),(2101,'Naranjal','ACT'),(2102,'Coetzala','ACT'),(2103,'Omealca','ACT'),(2104,'Cuitláhuac','ACT'),(2105,'Cuichapa','ACT'),(2106,'Yanga','ACT'),(2107,'Amatlán de los Reyes','ACT'),(2108,'Paso del Macho','ACT'),(2109,'Carrillo Puerto','ACT'),(2110,'Cotaxtla','ACT'),(2111,'Zongolica','ACT'),(2112,'Tehuipango','ACT'),(2113,'Mixtla de Altamirano','ACT'),(2114,'Texhuacán','ACT'),(2115,'Tezonapa','ACT'),(2116,'Tlalixcoyan','ACT'),(2117,'Ignacio de la Llave','ACT'),(2118,'Alvarado','ACT'),(2119,'Lerdo de Tejada','ACT'),(2120,'Tres Valles','ACT'),(2121,'Carlos A. Carrillo','ACT'),(2122,'Cosamaloapan de Carpio','ACT'),(2123,'Ixmatlahuacan','ACT'),(2124,'Acula','ACT'),(2125,'Amatitlán','ACT'),(2126,'Tlacotalpan','ACT'),(2127,'Saltabarranca','ACT'),(2128,'Otatitlán','ACT'),(2129,'Tlacojalpan','ACT'),(2130,'Tuxtilla','ACT'),(2131,'Chacaltianguis','ACT'),(2132,'José Azueta','ACT'),(2133,'Playa Vicente','ACT'),(2134,'Santiago Sochiapan','ACT'),(2135,'Isla','ACT'),(2136,'Juan Rodríguez Clara','ACT'),(2137,'San Andrés Tuxtla','ACT'),(2138,'Santiago Tuxtla','ACT'),(2139,'Angel R. Cabada','ACT'),(2140,'Hueyapan de Ocampo','ACT'),(2141,'Catemaco','ACT'),(2142,'Soteapan','ACT'),(2143,'Mecayapan','ACT'),(2144,'Tatahuicapan de Juárez','ACT'),(2145,'Pajapan','ACT'),(2146,'Chinameca','ACT'),(2147,'Acayucan','ACT'),(2148,'San Juan Evangelista','ACT'),(2149,'Sayula de Alemán','ACT'),(2150,'Oluta','ACT'),(2151,'Soconusco','ACT'),(2152,'Texistepec','ACT'),(2153,'Jáltipan','ACT'),(2154,'Oteapan','ACT'),(2155,'Cosoleacaque','ACT'),(2156,'Nanchital de Lázaro Cárdenas del Río','ACT'),(2157,'Ixhuatlán del Sureste','ACT'),(2158,'Moloacán','ACT'),(2159,'Coatzacoalcos','ACT'),(2160,'Agua Dulce','ACT'),(2161,'Hidalgotitlán','ACT'),(2162,'Jesús Carranza','ACT'),(2163,'Las Choapas','ACT'),(2164,'Uxpanapa','ACT'),(2165,'Mérida','ACT'),(2166,'Chicxulub Pueblo','ACT'),(2167,'Ixil','ACT'),(2168,'Conkal','ACT'),(2169,'Yaxkukul','ACT'),(2170,'Hunucmá','ACT'),(2171,'Ucú','ACT'),(2172,'Kinchil','ACT'),(2173,'Tetiz','ACT'),(2174,'Celestún','ACT'),(2175,'Kanasín','ACT'),(2176,'Timucuy','ACT'),(2177,'Acanceh','ACT'),(2178,'Tixpéhual','ACT'),(2179,'Umán','ACT'),(2180,'Telchac Pueblo','ACT'),(2181,'Dzemul','ACT'),(2182,'Telchac Puerto','ACT'),(2183,'Cansahcab','ACT'),(2184,'Sinanché','ACT'),(2185,'Yobaín','ACT'),(2186,'Motul','ACT'),(2187,'Baca','ACT'),(2188,'Mocochá','ACT'),(2189,'Muxupip','ACT'),(2190,'Cacalchén','ACT'),(2191,'Bokobá','ACT'),(2192,'Tixkokob','ACT'),(2193,'Hoctún','ACT'),(2194,'Tahmek','ACT'),(2195,'Dzidzantún','ACT'),(2196,'Temax','ACT'),(2197,'Tekantó','ACT'),(2198,'Teya','ACT'),(2199,'Suma','ACT'),(2200,'Tepakán','ACT'),(2201,'Tekal de Venegas','ACT'),(2202,'Izamal','ACT'),(2203,'Hocabá','ACT'),(2204,'Xocchel','ACT'),(2205,'Seyé','ACT'),(2206,'Cuzamá','ACT'),(2207,'Homún','ACT'),(2208,'Sanahcat','ACT'),(2209,'Huhí','ACT'),(2210,'Dzilam González','ACT'),(2211,'Dzilam de Bravo','ACT'),(2212,'Panabá','ACT'),(2213,'Buctzotz','ACT'),(2214,'Sucilá','ACT'),(2215,'Cenotillo','ACT'),(2216,'Dzoncauich','ACT'),(2217,'Tunkás','ACT'),(2218,'Quintana Roo','ACT'),(2219,'Dzitás','ACT'),(2220,'Kantunil','ACT'),(2221,'Sudzal','ACT'),(2222,'Tekit','ACT'),(2223,'Sotuta','ACT'),(2224,'Tizimín','ACT'),(2225,'Río Lagartos','ACT'),(2226,'Espita','ACT'),(2227,'Temozón','ACT'),(2228,'Calotmul','ACT'),(2229,'Tinum','ACT'),(2230,'Chankom','ACT'),(2231,'Chichimilá','ACT'),(2232,'Tixcacalcupul','ACT'),(2233,'Kaua','ACT'),(2234,'Cuncunul','ACT'),(2235,'Tekom','ACT'),(2236,'Chemax','ACT'),(2237,'Valladolid','ACT'),(2238,'Uayma','ACT'),(2239,'Maxcanú','ACT'),(2240,'Samahil','ACT'),(2241,'Opichén','ACT'),(2242,'Chocholá','ACT'),(2243,'Kopomá','ACT'),(2244,'Tecoh','ACT'),(2245,'Abalá','ACT'),(2246,'Halachó','ACT'),(2247,'Muna','ACT'),(2248,'Sacalum','ACT'),(2249,'Maní','ACT'),(2250,'Dzán','ACT'),(2251,'Chapab','ACT'),(2252,'Ticul','ACT'),(2253,'Oxkutzcab','ACT'),(2254,'Santa Elena','ACT'),(2255,'Mama','ACT'),(2256,'Chumayel','ACT'),(2257,'Mayapán','ACT'),(2258,'Teabo','ACT'),(2259,'Cantamayec','ACT'),(2260,'Yaxcabá','ACT'),(2261,'Peto','ACT'),(2262,'Chikindzonot','ACT'),(2263,'Tahdziú','ACT'),(2264,'Tixmehuac','ACT'),(2265,'Chacsinkín','ACT'),(2266,'Tzucacab','ACT'),(2267,'Tekax','ACT'),(2268,'Akil','ACT'),(2269,'Zacatecas','ACT'),(2270,'Vetagrande','ACT'),(2271,'Concepción del Oro','ACT'),(2272,'Mazapil','ACT'),(2273,'El Salvador','ACT'),(2274,'Juan Aldama','ACT'),(2275,'Miguel Auza','ACT'),(2276,'General Francisco R. Murguía','ACT'),(2277,'Río Grande','ACT'),(2278,'Villa de Cos','ACT'),(2279,'Cañitas de Felipe Pescador','ACT'),(2280,'Calera','ACT'),(2281,'General Enrique Estrada','ACT'),(2282,'Trancoso','ACT'),(2283,'Genaro Codina','ACT'),(2284,'Ojocaliente','ACT'),(2285,'General Pánfilo Natera','ACT'),(2286,'Luis Moya','ACT'),(2287,'Villa González Ortega','ACT'),(2288,'Noria de Ángeles','ACT'),(2289,'Villa García','ACT'),(2290,'Pinos','ACT'),(2291,'Fresnillo','ACT'),(2292,'Sombrerete','ACT'),(2293,'Sain Alto','ACT'),(2294,'Valparaíso','ACT'),(2295,'Chalchihuites','ACT'),(2296,'Jiménez del Teul','ACT'),(2297,'Jerez','ACT'),(2298,'Monte Escobedo','ACT'),(2299,'Susticacán','ACT'),(2300,'Villanueva','ACT'),(2301,'Tepetongo','ACT'),(2302,'El Plateado de Joaquín Amaro','ACT'),(2303,'Jalpa','ACT'),(2304,'Tabasco','ACT'),(2305,'Huanusco','ACT'),(2306,'Tlaltenango de Sánchez Román','ACT'),(2307,'Momax','ACT'),(2308,'Atolinga','ACT'),(2309,'Tepechitlán','ACT'),(2310,'Teúl de González Ortega','ACT'),(2311,'Santa María de la Paz','ACT'),(2312,'Trinidad García de la Cadena','ACT'),(2313,'Mezquital del Oro','ACT'),(2314,'Nochistlán de Mejía','ACT'),(2315,'Apulco','ACT'),(2316,'Apozol','ACT'),(2317,'Juchipila','ACT'),(2318,'Moyahua de Estrada','ACT');
/*!40000 ALTER TABLE `cat_municipio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_ocupacion`
--

DROP TABLE IF EXISTS `cat_ocupacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_ocupacion` (
  `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_ocupacion`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_ocupacion`
--

LOCK TABLES `cat_ocupacion` WRITE;
/*!40000 ALTER TABLE `cat_ocupacion` DISABLE KEYS */;
INSERT INTO `cat_ocupacion` VALUES (1,'Estudiante','ACT'),(2,'Ama de casa','ACT'),(3,'Empleado','ACT'),(4,'Negocio propio','ACT');
/*!40000 ALTER TABLE `cat_ocupacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_paquete`
--

DROP TABLE IF EXISTS `cat_paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_paquete` (
  `id_paquete` int(11) NOT NULL AUTO_INCREMENT,
  `id_mercancia` int(11) NOT NULL,
  `estutus` varchar(3) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_paquete`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_paquete`
--

LOCK TABLES `cat_paquete` WRITE;
/*!40000 ALTER TABLE `cat_paquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_perfil_permiso`
--

DROP TABLE IF EXISTS `cat_perfil_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_perfil_permiso` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_perfil_permiso`
--

LOCK TABLES `cat_perfil_permiso` WRITE;
/*!40000 ALTER TABLE `cat_perfil_permiso` DISABLE KEYS */;
INSERT INTO `cat_perfil_permiso` VALUES (1,'Administrador total','ACT'),(2,'Afiliado total','ACT'),(3,'Afiliado nuevo','ACT');
/*!40000 ALTER TABLE `cat_perfil_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_permiso`
--

DROP TABLE IF EXISTS `cat_permiso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_permiso` (
  `id_permiso` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_permiso`
--

LOCK TABLES `cat_permiso` WRITE;
/*!40000 ALTER TABLE `cat_permiso` DISABLE KEYS */;
INSERT INTO `cat_permiso` VALUES (1,1,'altas','Altas','ACT'),(2,1,'comisiones','Comisiones','ACT'),(3,1,'oficina_virtual','Oficina virtual','ACT'),(4,1,'red','Red','ACT'),(5,1,'reportes','Reportes','ACT'),(6,2,'encuestas','Encuestas','ACT'),(7,2,'archivero','Archivero','ACT'),(8,2,'tablero','Tablero','ACT'),(9,2,'compartir','Compartir','ACT'),(10,2,'perfil','Perfil','ACT'),(11,2,'foto','Foto','ACT'),(12,2,'afiliar','Afiliar','ACT'),(13,2,'red','Red','ACT'),(14,2,'carrito','Carrito','ACT'),(15,2,'billetera','Billetera','ACT'),(16,2,'estadisticas','Estadisticas','ACT'),(17,2,'reportes','Reportes','ACT'),(18,2,'informacion','Información','ACT'),(19,2,'presentaciones','Presentaciones','ACT'),(20,2,'e_books','E-books','ACT'),(21,2,'videos','Vídeos','ACT'),(22,2,'descargas','descargas','ACT'),(23,2,'promociones','Promociones','ACT'),(24,2,'crm','CRM','ACT'),(25,2,'eventos','Eventos','ACT'),(26,2,'noticias','Noticias','ACT'),(27,2,'videollamadas','Vídeo-llamadas','ACT'),(28,2,'cupones','Cupones','ACT'),(29,2,'reconocimientos','Reconocimientos','ACT'),(30,2,'mensajes','Mensajes','ACT'),(31,2,'soporte_tecnico','Soporte_Tecnico','ACT'),(32,2,'chat','Chat','ACT'),(33,2,'e_mail','E-mail','ACT'),(34,2,'tickets','Tickets/Boletos','ACT'),(35,2,'social_network','Social network','ACT');
/*!40000 ALTER TABLE `cat_permiso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_promo`
--

DROP TABLE IF EXISTS `cat_promo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_promo` (
  `id_promo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_promo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_promo`
--

LOCK TABLES `cat_promo` WRITE;
/*!40000 ALTER TABLE `cat_promo` DISABLE KEYS */;
INSERT INTO `cat_promo` VALUES (1,'Paquete','ACT'),(2,'Regalo','ACT');
/*!40000 ALTER TABLE `cat_promo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_proveedor`
--

DROP TABLE IF EXISTS `cat_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_proveedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `comision` decimal(7,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_proveedor`
--

LOCK TABLES `cat_proveedor` WRITE;
/*!40000 ALTER TABLE `cat_proveedor` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_rango`
--

DROP TABLE IF EXISTS `cat_rango`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_rango` (
  `id_rango` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  `condicion_red_afilacion` varchar(4) NOT NULL,
  PRIMARY KEY (`id_rango`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_rango`
--

LOCK TABLES `cat_rango` WRITE;
/*!40000 ALTER TABLE `cat_rango` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_rango` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_regimen`
--

DROP TABLE IF EXISTS `cat_regimen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_regimen` (
  `id_regimen` int(11) NOT NULL AUTO_INCREMENT,
  `abreviatura` varchar(20) NOT NULL,
  `descripcion` varchar(60) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_regimen`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_regimen`
--

LOCK TABLES `cat_regimen` WRITE;
/*!40000 ALTER TABLE `cat_regimen` DISABLE KEYS */;
INSERT INTO `cat_regimen` VALUES (1,'S.A','Sociedad anonima','ACT'),(2,'S.R.L','Sociedad de responsabilidad limitada','ACT');
/*!40000 ALTER TABLE `cat_regimen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_retencion`
--

DROP TABLE IF EXISTS `cat_retencion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_retencion` (
  `id_retencion` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `porcentaje` int(11) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `duracion` varchar(3) NOT NULL,
  PRIMARY KEY (`id_retencion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_retencion`
--

LOCK TABLES `cat_retencion` WRITE;
/*!40000 ALTER TABLE `cat_retencion` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_retencion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_retenciones_historial`
--

DROP TABLE IF EXISTS `cat_retenciones_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_retenciones_historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(45) NOT NULL,
  `valor` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_retenciones_historial`
--

LOCK TABLES `cat_retenciones_historial` WRITE;
/*!40000 ALTER TABLE `cat_retenciones_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_retenciones_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_sexo`
--

DROP TABLE IF EXISTS `cat_sexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_sexo` (
  `id_sexo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_sexo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_sexo`
--

LOCK TABLES `cat_sexo` WRITE;
/*!40000 ALTER TABLE `cat_sexo` DISABLE KEYS */;
INSERT INTO `cat_sexo` VALUES (1,'Masculino','ACT'),(2,'Femenino','ACT');
/*!40000 ALTER TABLE `cat_sexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_social`
--

DROP TABLE IF EXISTS `cat_social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_social` (
  `id_social` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_social`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_social`
--

LOCK TABLES `cat_social` WRITE;
/*!40000 ALTER TABLE `cat_social` DISABLE KEYS */;
/*!40000 ALTER TABLE `cat_social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tiempo_dedicado`
--

DROP TABLE IF EXISTS `cat_tiempo_dedicado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tiempo_dedicado` (
  `id_tiempo_dedicado` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tiempo_dedicado`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tiempo_dedicado`
--

LOCK TABLES `cat_tiempo_dedicado` WRITE;
/*!40000 ALTER TABLE `cat_tiempo_dedicado` DISABLE KEYS */;
INSERT INTO `cat_tiempo_dedicado` VALUES (1,'Tiempo completo','ACT'),(2,'Medio tiempo','ACT');
/*!40000 ALTER TABLE `cat_tiempo_dedicado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_archivo`
--

DROP TABLE IF EXISTS `cat_tipo_archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_archivo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(20) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_archivo`
--

LOCK TABLES `cat_tipo_archivo` WRITE;
/*!40000 ALTER TABLE `cat_tipo_archivo` DISABLE KEYS */;
INSERT INTO `cat_tipo_archivo` VALUES (1,'pdf','ACT'),(2,'mp4','ACT'),(3,'ppt','ACT'),(4,'pptx','ACT'),(5,'png','ACT'),(6,'jpg','ACT'),(7,'gif','ACT'),(8,'odp','ACT'),(9,'sdd','ACT'),(10,'sxi','ACT'),(11,'pot','ACT'),(12,'pothtml','ACT'),(13,'ppa','ACT'),(14,'pps','ACT'),(15,'ppthtml','ACT'),(16,'qpx','ACT'),(17,'qtp','ACT'),(18,'qts','ACT'),(19,'qtx','ACT'),(20,'qup','ACT'),(21,'urlVideo','ACT'),(22,'urlPresentacion','ACT'),(23,'doc','ACT'),(24,'docx','ACT'),(25,'ods','ACT'),(26,'odt','ACT'),(27,'xls','ACT'),(28,'csv','ACT'),(29,'xlsx','ACT'),(30,'jpeg','ACT'),(31,'zip','ACT'),(32,'mpg','ACT'),(33,'rar','ACT'),(34,'wav','ACT'),(35,'bmp','ACT'),(36,'html','ACT'),(37,'htm','ACT'),(38,'tar','ACT'),(39,'tgz','ACT'),(40,'mid','ACT'),(41,'txt','ACT'),(42,'text','ACT'),(43,'cvs','ACT'),(44,'gz','ACT'),(45,'7z','ACT'),(46,'rtf','ACT'),(47,'xml','ACT');
/*!40000 ALTER TABLE `cat_tipo_archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_evento`
--

DROP TABLE IF EXISTS `cat_tipo_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_evento`
--

LOCK TABLES `cat_tipo_evento` WRITE;
/*!40000 ALTER TABLE `cat_tipo_evento` DISABLE KEYS */;
INSERT INTO `cat_tipo_evento` VALUES (1,'informativo'),(2,'privado'),(3,'urgente'),(4,'reunion'),(5,'libre'),(6,'rutina');
/*!40000 ALTER TABLE `cat_tipo_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_mercancia`
--

DROP TABLE IF EXISTS `cat_tipo_mercancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_mercancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_mercancia`
--

LOCK TABLES `cat_tipo_mercancia` WRITE;
/*!40000 ALTER TABLE `cat_tipo_mercancia` DISABLE KEYS */;
INSERT INTO `cat_tipo_mercancia` VALUES (1,'Producto','ACT'),(2,'Servicio','ACT'),(3,'Combinado','ACT'),(4,'Paquete de Inscripcion','ACT'),(5,'Membresia','ACT');
/*!40000 ALTER TABLE `cat_tipo_mercancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_paquete`
--

DROP TABLE IF EXISTS `cat_tipo_paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_paquete` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_paquete`
--

LOCK TABLES `cat_tipo_paquete` WRITE;
/*!40000 ALTER TABLE `cat_tipo_paquete` DISABLE KEYS */;
INSERT INTO `cat_tipo_paquete` VALUES (1,'Afiliacion','ACT'),(2,'Renovación','ACT'),(3,'Actualización','ACT');
/*!40000 ALTER TABLE `cat_tipo_paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_producto`
--

DROP TABLE IF EXISTS `cat_tipo_producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_producto` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_producto`
--

LOCK TABLES `cat_tipo_producto` WRITE;
/*!40000 ALTER TABLE `cat_tipo_producto` DISABLE KEYS */;
INSERT INTO `cat_tipo_producto` VALUES (1,'Insumo'),(2,'Individual'),(3,'Paquete');
/*!40000 ALTER TABLE `cat_tipo_producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_proveedor`
--

DROP TABLE IF EXISTS `cat_tipo_proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_proveedor` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_proveedor`
--

LOCK TABLES `cat_tipo_proveedor` WRITE;
/*!40000 ALTER TABLE `cat_tipo_proveedor` DISABLE KEYS */;
INSERT INTO `cat_tipo_proveedor` VALUES (1,'Producto','ACT'),(2,'Servicio','ACT'),(3,'Mensajería','DES');
/*!40000 ALTER TABLE `cat_tipo_proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_rango`
--

DROP TABLE IF EXISTS `cat_tipo_rango`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_rango` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `estatus` varchar(5) DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_rango`
--

LOCK TABLES `cat_tipo_rango` WRITE;
/*!40000 ALTER TABLE `cat_tipo_rango` DISABLE KEYS */;
INSERT INTO `cat_tipo_rango` VALUES (1,'Afiliados a la Red','ACT'),(2,'Ventas de la red','ACT'),(3,'Compras personales','ACT'),(4,'Puntos Comisionables','ACT'),(5,'Puntos de la Red','ACT');
/*!40000 ALTER TABLE `cat_tipo_rango` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_servicio`
--

DROP TABLE IF EXISTS `cat_tipo_servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_servicio` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_servicio`
--

LOCK TABLES `cat_tipo_servicio` WRITE;
/*!40000 ALTER TABLE `cat_tipo_servicio` DISABLE KEYS */;
INSERT INTO `cat_tipo_servicio` VALUES (1,'conferencia'),(2,'curso');
/*!40000 ALTER TABLE `cat_tipo_servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_tarjeta`
--

DROP TABLE IF EXISTS `cat_tipo_tarjeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_tarjeta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(10) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_tarjeta`
--

LOCK TABLES `cat_tipo_tarjeta` WRITE;
/*!40000 ALTER TABLE `cat_tipo_tarjeta` DISABLE KEYS */;
INSERT INTO `cat_tipo_tarjeta` VALUES (1,'credito','ACT'),(2,'debito','ACT');
/*!40000 ALTER TABLE `cat_tipo_tarjeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_tel`
--

DROP TABLE IF EXISTS `cat_tipo_tel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_tel` (
  `id_tipo_tel` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo_tel`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_tel`
--

LOCK TABLES `cat_tipo_tel` WRITE;
/*!40000 ALTER TABLE `cat_tipo_tel` DISABLE KEYS */;
INSERT INTO `cat_tipo_tel` VALUES (1,'Fijo','ACT'),(2,'Móvil','ACT');
/*!40000 ALTER TABLE `cat_tipo_tel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_tipo_usuario`
--

DROP TABLE IF EXISTS `cat_tipo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_tipo_usuario` (
  `id_tipo_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tipo_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_tipo_usuario`
--

LOCK TABLES `cat_tipo_usuario` WRITE;
/*!40000 ALTER TABLE `cat_tipo_usuario` DISABLE KEYS */;
INSERT INTO `cat_tipo_usuario` VALUES (1,'Direccion General','ACT'),(2,'Afiliado','ACT'),(3,'Soporte Tecnico','ACT'),(4,'Comercial','ACT'),(5,'Logistica','ACT'),(6,'Oficina Virtual','ACT'),(7,'Administracion y Contabilidad','ACT'),(8,'CEDI','ACT'),(9,'Almacen','ACT'),(10,'Cliente VIP','ACT');
/*!40000 ALTER TABLE `cat_tipo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_titulo`
--

DROP TABLE IF EXISTS `cat_titulo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_titulo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orden` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` text NOT NULL,
  `frecuencia` varchar(4) NOT NULL DEFAULT 'MES',
  `tipo` varchar(10) NOT NULL DEFAULT 'PUNTOSP',
  `condicion_red_afilacion` varchar(4) NOT NULL DEFAULT 'EQU',
  `porcentaje` float NOT NULL DEFAULT '0',
  `valor` float NOT NULL DEFAULT '0',
  `ganancia` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_titulo`
--

LOCK TABLES `cat_titulo` WRITE;
/*!40000 ALTER TABLE `cat_titulo` DISABLE KEYS */;
INSERT INTO `cat_titulo` VALUES (1,1,'ninguno','ninguno','MES','PUNTOSP','EQU',0,0,0);
/*!40000 ALTER TABLE `cat_titulo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_usuario_fiscal`
--

DROP TABLE IF EXISTS `cat_usuario_fiscal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_usuario_fiscal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_usuario_fiscal`
--

LOCK TABLES `cat_usuario_fiscal` WRITE;
/*!40000 ALTER TABLE `cat_usuario_fiscal` DISABLE KEYS */;
INSERT INTO `cat_usuario_fiscal` VALUES (1,'Fisica','ACT'),(2,'Moral','ACT');
/*!40000 ALTER TABLE `cat_usuario_fiscal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cat_zona`
--

DROP TABLE IF EXISTS `cat_zona`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cat_zona` (
  `id_zona` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(25) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_zona`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cat_zona`
--

LOCK TABLES `cat_zona` WRITE;
/*!40000 ALTER TABLE `cat_zona` DISABLE KEYS */;
INSERT INTO `cat_zona` VALUES (1,'Norte','ACT'),(2,'Sur','ACT'),(3,'Este','ACT'),(4,'Oeste','ACT');
/*!40000 ALTER TABLE `cat_zona` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cedi`
--

DROP TABLE IF EXISTS `cedi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cedi` (
  `id_cedi` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `codigo_postal` char(10) DEFAULT NULL,
  PRIMARY KEY (`id_cedi`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cedi`
--

LOCK TABLES `cedi` WRITE;
/*!40000 ALTER TABLE `cedi` DISABLE KEYS */;
INSERT INTO `cedi` VALUES (1,'tierra santa','tierra santa','9076','ebenezer','8676533','2016-09-28 16:14:42','ACT','A','252211'),(2,'supercundi','supercundi','9076','av. panamericana','8463643','2016-09-28 16:14:57','ACT','A','252211'),(3,'mercatodos','mercatodos','9076','calle 6','8458677','2016-09-28 16:09:19','ACT','C','252211'),(4,'melaos','sport','9076','camellon 8','8465454','2016-09-28 16:11:10','ACT','C','252211');
/*!40000 ALTER TABLE `cedi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `ip_address` varchar(16) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ci_sessions`
--

LOCK TABLES `ci_sessions` WRITE;
/*!40000 ALTER TABLE `ci_sessions` DISABLE KEYS */;
/*!40000 ALTER TABLE `ci_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coaplicante`
--

DROP TABLE IF EXISTS `coaplicante`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coaplicante` (
  `id_coaplicante` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `keyword` varchar(20) NOT NULL,
  PRIMARY KEY (`id_coaplicante`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coaplicante`
--

LOCK TABLES `coaplicante` WRITE;
/*!40000 ALTER TABLE `coaplicante` DISABLE KEYS */;
/*!40000 ALTER TABLE `coaplicante` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cobro`
--

DROP TABLE IF EXISTS `cobro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cobro` (
  `id_cobro` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_metodo` int(11) NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `monto` float NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_pago` date NOT NULL,
  `cuenta` int(20) NOT NULL,
  `titular` varchar(200) NOT NULL,
  `banco` varchar(100) NOT NULL,
  `clabe` int(11) NOT NULL,
  `swift` varchar(35) DEFAULT NULL,
  `pais` varchar(3) DEFAULT 'COL',
  `otro` varchar(35) DEFAULT NULL,
  `postal` int(11) DEFAULT '0',
  PRIMARY KEY (`id_cobro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cobro`
--

LOCK TABLES `cobro` WRITE;
/*!40000 ALTER TABLE `cobro` DISABLE KEYS */;
/*!40000 ALTER TABLE `cobro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `combinado`
--

DROP TABLE IF EXISTS `combinado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `combinado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `descuento` decimal(10,2) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `combinado`
--

LOCK TABLES `combinado` WRITE;
/*!40000 ALTER TABLE `combinado` DISABLE KEYS */;
/*!40000 ALTER TABLE `combinado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario`
--

DROP TABLE IF EXISTS `comentario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `autor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_video` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario`
--

LOCK TABLES `comentario` WRITE;
/*!40000 ALTER TABLE `comentario` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comentario_video_soporte_tecnico`
--

DROP TABLE IF EXISTS `comentario_video_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comentario_video_soporte_tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comentario` text NOT NULL,
  `autor` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_video` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comentario_video_soporte_tecnico`
--

LOCK TABLES `comentario_video_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `comentario_video_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `comentario_video_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comercializacion`
--

DROP TABLE IF EXISTS `comercializacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comercializacion` (
  `mercancia` int(11) NOT NULL,
  `canal` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comercializacion`
--

LOCK TABLES `comercializacion` WRITE;
/*!40000 ALTER TABLE `comercializacion` DISABLE KEYS */;
INSERT INTO `comercializacion` VALUES (1,1),(1,2),(2,1),(2,2);
/*!40000 ALTER TABLE `comercializacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat`
--

DROP TABLE IF EXISTS `cometchat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) unsigned NOT NULL DEFAULT '0',
  `read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `direction` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`),
  KEY `direction` (`direction`),
  KEY `read` (`read`),
  KEY `sent` (`sent`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat`
--

LOCK TABLES `cometchat` WRITE;
/*!40000 ALTER TABLE `cometchat` DISABLE KEYS */;
INSERT INTO `cometchat` VALUES (1,2,172,'oye mi perro',1436559719,1,0),(2,2,172,'donde anda',1436559743,1,0),(3,161,2,'donde anda',1436560069,1,0),(4,161,172,'brevas',1436560076,1,0),(5,2,172,'brevas',1436560102,1,0),(6,2,161,'que dice mi perro',1436560136,1,0),(7,161,2,'brevas',1436560285,1,0),(8,2,161,'que dice el tino',1436560305,1,0),(9,172,2,'entonces',1436560336,1,0),(10,172,161,'que dice el tino',1436560344,1,0),(11,161,172,'nada mi perro',1436560352,1,0),(12,161,2,'wqert',1436560360,1,0),(13,57,2,'q mas',1436562116,1,0),(14,2,57,'que dice mi perro',1436562126,1,0),(15,57,2,'no marica aqui jodiendo con un puto chat',1436562141,1,0),(16,2,57,'te ha enviado un archivo<br/><a href=\"//oficina.pekcellgold.com/cometchat/plugins/filetransfer/download.php?file=images.jpeg\" target=\"_blank\"><a class=\"imagemessage\" href=\"//oficina.pekcellgold.com/cometchat/plugins/filetransfer/download.php?file=images.jpeg\" onClick=\"javascript:jqcc(\'div.cometchat_other > a\')[0].click();return false;\" target=\"none\" imageheight=\"193\" imagewidth=\"261\"><img class=\"file_image\" type=\"image\" src=\"/cometchat/plugins/filetransfer/uploads/06bb5650953df8a4f0c15c4bbf19fdba\" style=\"height:70px;\"/></a></a>',1436562143,1,1),(17,2,57,'ha enviado un archivo con éxito<br/><a href=\"//oficina.pekcellgold.com/cometchat/plugins/filetransfer/download.php?file=images.jpeg\" target=\"_blank\"><a class=\"imagemessage\" href=\"//oficina.pekcellgold.com/cometchat/plugins/filetransfer/download.php?file=images.jpeg\" onClick=\"javascript:jqcc(\'div.cometchat_other > a\')[0].click();return false;\" target=\"none\"  imageheight=\"193\" imagewidth=\"261\"><img class=\"file_image\" type=\"image\" src=\"/cometchat/plugins/filetransfer/uploads/06bb5650953df8a4f0c15c4bbf19fdba\" style=\"height:70px;\"/></a></a>',1436562144,1,2),(18,2,57,'<img class=\"cometchat_smiley\" height=\"20\" width=\"20\" src=\"/cometchat/images/smileys/trollface.png\" title=\"Trollface\">',1436562248,1,0),(19,57,2,'te ha invitado a unirte a una sala de chat. <a href=\"javascript:jqcc.cometchat.joinChatroom(\'1\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\',\'U29wb3J0ZSBUZWNuaWNv\')\">Clic aquí para unirte</a>',1436562281,1,1),(20,57,7,'te ha invitado a unirte a una sala de chat. <a href=\"javascript:jqcc.cometchat.joinChatroom(\'1\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\',\'U29wb3J0ZSBUZWNuaWNv\')\">Clic aquí para unirte</a>',1436564047,0,1),(21,57,2,'te ha invitado a unirte a una sala de chat. <a href=\"javascript:jqcc.cometchat.joinChatroom(\'1\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\',\'U29wb3J0ZSBUZWNuaWNv\')\">Clic aquí para unirte</a>',1436564048,1,1),(22,57,172,'te ha invitado a unirte a una sala de chat. <a href=\"javascript:jqcc.cometchat.joinChatroom(\'1\',\'da39a3ee5e6b4b0d3255bfef95601890afd80709\',\'U29wb3J0ZSBUZWNuaWNv\')\">Clic aquí para unirte</a>',1436564048,0,1),(23,2,4,'hhh',1438439871,1,0),(24,4,2,'d',1438441856,1,0),(25,4,3,'KK',1438443845,1,0),(26,101,100,'oye mi perro',1452211457,1,0),(27,90,101,'que dice el viejo cristian',1452212550,1,0),(28,101,90,'Nada',1452212601,1,0),(29,100,101,'vientos o mareas',1452212843,1,0),(30,90,101,'brevas mi perro',1452212852,1,0),(31,101,100,'vientos y mareas',1452212865,1,0),(32,101,90,'jj',1452212878,1,0),(33,2,100,'entonces',1452212889,1,0),(34,2,101,'Que mas',1452272025,1,0),(35,101,2,'te ha enviado un archivo<br/><a href=\"//erp.multinivel/cometchat/plugins/filetransfer/download.php?file=stockvaultbancoimagenesgratis.jpg\" target=\"_blank\"><a class=\"imagemessage\" href=\"//erp.multinivel/cometchat/plugins/filetransfer/download.php?file=stockvaultbancoimagenesgratis.jpg\" onClick=\"javascript:jqcc(\'div.cometchat_other > a\')[0].click();return false;\" target=\"none\" imageheight=\"290\" imagewidth=\"759\"><img class=\"file_image\" type=\"image\" src=\"/cometchat/plugins/filetransfer/uploads/1afba3aa8f29c09761509420acc28f54\" style=\"height:70px;\"/></a></a>',1452285466,1,1),(36,101,2,'ha enviado un archivo con éxito<br/><a href=\"//erp.multinivel/cometchat/plugins/filetransfer/download.php?file=stockvaultbancoimagenesgratis.jpg\" target=\"_blank\"><a class=\"imagemessage\" href=\"//erp.multinivel/cometchat/plugins/filetransfer/download.php?file=stockvaultbancoimagenesgratis.jpg\" onClick=\"javascript:jqcc(\'div.cometchat_other > a\')[0].click();return false;\" target=\"none\"  imageheight=\"290\" imagewidth=\"759\"><img class=\"file_image\" type=\"image\" src=\"/cometchat/plugins/filetransfer/uploads/1afba3aa8f29c09761509420acc28f54\" style=\"height:70px;\"/></a></a>',1452285467,1,2),(37,102,2,'<img class=\"cometchat_smiley\" height=\"20\" width=\"20\" src=\"/cometchat/images/smileys/floppy_disk.png\" title=\"Floppy_disk\">',1452287126,1,0),(38,103,2,'giovanny',1452300262,1,0);
/*!40000 ALTER TABLE `cometchat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_announcements`
--

DROP TABLE IF EXISTS `cometchat_announcements`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_announcements` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `announcement` text NOT NULL,
  `time` int(10) unsigned NOT NULL,
  `to` int(10) NOT NULL,
  `recd` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `time` (`time`),
  KEY `to_id` (`to`,`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_announcements`
--

LOCK TABLES `cometchat_announcements` WRITE;
/*!40000 ALTER TABLE `cometchat_announcements` DISABLE KEYS */;
/*!40000 ALTER TABLE `cometchat_announcements` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_block`
--

DROP TABLE IF EXISTS `cometchat_block`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_block` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `fromid` int(10) unsigned NOT NULL,
  `toid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fromid` (`fromid`),
  KEY `toid` (`toid`),
  KEY `fromid_toid` (`fromid`,`toid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_block`
--

LOCK TABLES `cometchat_block` WRITE;
/*!40000 ALTER TABLE `cometchat_block` DISABLE KEYS */;
/*!40000 ALTER TABLE `cometchat_block` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_chatroommessages`
--

DROP TABLE IF EXISTS `cometchat_chatroommessages`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_chatroommessages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(10) unsigned NOT NULL,
  `chatroomid` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `userid` (`userid`),
  KEY `chatroomid` (`chatroomid`),
  KEY `sent` (`sent`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_chatroommessages`
--

LOCK TABLES `cometchat_chatroommessages` WRITE;
/*!40000 ALTER TABLE `cometchat_chatroommessages` DISABLE KEYS */;
INSERT INTO `cometchat_chatroommessages` VALUES (1,2,1,'entonces',1436562297),(2,57,1,'Aqui te dare ayuda con cualquier problema que encuentres',1436562322),(3,172,1,'entonces',1436562339),(4,57,1,'hola mi amor',1436562355),(5,2,1,'que falta de seriedad ome',1436562373),(6,57,1,'jajajajaja',1436562384),(7,161,1,'que falta de respeto',1436562410),(8,57,1,'ya me corompieron la sala de soporte',1436562445),(9,161,1,'<span style=\"color:#FFA000\">que ome</span>',1436562457),(10,18,2,'dwdawdawd',1443623572),(11,19,2,'ASASASAs',1443623581),(12,18,2,'sadsdasdasd',1443623597),(13,18,2,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'2\');\">Clic aquí para unirte a la conversación.</a> ',1443623600),(14,19,2,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'2\');\">Clic aquí para unirte a la conversación.</a> ',1443623621),(15,18,2,'NetSoft12345@NetSoft12345@',1443623676),(16,21,2,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'2\');\">Clic aquí para unirte a la conversación.</a> ',1443623685),(17,21,2,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'2\');\">Clic aquí para unirte a la conversación.</a> ',1443623771),(18,21,3,'hoa',1445702558),(19,2,3,'fdgdfg',1445702559),(20,2,3,'hkho',1445702593),(21,101,3,'123123',1452210735),(22,101,3,'ha iniciado una conversación en video. <a token =\'\' href=\'javascript:void(0);\' onclick=\"javascript:jqcc.ccavchat.join(\'3\');\">Clic aquí para unirte a la conversación.</a> ',1452210788),(23,2,3,'adjadj',1455767143);
/*!40000 ALTER TABLE `cometchat_chatroommessages` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_chatrooms`
--

DROP TABLE IF EXISTS `cometchat_chatrooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_chatrooms` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `lastactivity` int(10) unsigned NOT NULL,
  `createdby` int(10) unsigned NOT NULL,
  `password` varchar(255) NOT NULL,
  `type` tinyint(1) unsigned NOT NULL,
  `vidsession` varchar(512) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lastactivity` (`lastactivity`),
  KEY `createdby` (`createdby`),
  KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_chatrooms`
--

LOCK TABLES `cometchat_chatrooms` WRITE;
/*!40000 ALTER TABLE `cometchat_chatrooms` DISABLE KEYS */;
INSERT INTO `cometchat_chatrooms` VALUES (1,'Soporte Tecnico',1436562458,57,'',0,NULL),(2,'diego',1443623773,19,'',0,NULL),(3,'hh',1455767144,2,'',0,NULL);
/*!40000 ALTER TABLE `cometchat_chatrooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_chatrooms_users`
--

DROP TABLE IF EXISTS `cometchat_chatrooms_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_chatrooms_users` (
  `userid` int(10) unsigned NOT NULL,
  `chatroomid` int(10) unsigned NOT NULL,
  `lastactivity` int(10) unsigned NOT NULL,
  `isbanned` int(1) DEFAULT '0',
  PRIMARY KEY (`userid`,`chatroomid`) USING BTREE,
  KEY `chatroomid` (`chatroomid`),
  KEY `lastactivity` (`lastactivity`),
  KEY `userid` (`userid`),
  KEY `userid_chatroomid` (`chatroomid`,`userid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_chatrooms_users`
--

LOCK TABLES `cometchat_chatrooms_users` WRITE;
/*!40000 ALTER TABLE `cometchat_chatrooms_users` DISABLE KEYS */;
INSERT INTO `cometchat_chatrooms_users` VALUES (2,3,1455767149,0),(18,2,1443623853,0),(19,2,1443623854,0),(21,3,1445702584,0),(57,1,1436565902,0),(101,3,1452211528,0),(161,1,1436562659,0),(172,1,1436562800,0),(10000001,3,1452210691,0);
/*!40000 ALTER TABLE `cometchat_chatrooms_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_comethistory`
--

DROP TABLE IF EXISTS `cometchat_comethistory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_comethistory` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `channel` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `channel` (`channel`),
  KEY `sent` (`sent`),
  KEY `channel_sent` (`channel`,`sent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_comethistory`
--

LOCK TABLES `cometchat_comethistory` WRITE;
/*!40000 ALTER TABLE `cometchat_comethistory` DISABLE KEYS */;
/*!40000 ALTER TABLE `cometchat_comethistory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_guests`
--

DROP TABLE IF EXISTS `cometchat_guests`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_guests` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `lastactivity` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `lastactivity` (`lastactivity`)
) ENGINE=InnoDB AUTO_INCREMENT=10000002 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_guests`
--

LOCK TABLES `cometchat_guests` WRITE;
/*!40000 ALTER TABLE `cometchat_guests` DISABLE KEYS */;
INSERT INTO `cometchat_guests` VALUES (57,'Edix',2120),(10000000,'guest-10000000',0),(10000001,'50034',1452207926);
/*!40000 ALTER TABLE `cometchat_guests` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_messages_old`
--

DROP TABLE IF EXISTS `cometchat_messages_old`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_messages_old` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `from` int(10) unsigned NOT NULL,
  `to` int(10) unsigned NOT NULL,
  `message` text NOT NULL,
  `sent` int(10) unsigned NOT NULL DEFAULT '0',
  `read` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `direction` tinyint(1) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `to` (`to`),
  KEY `from` (`from`),
  KEY `direction` (`direction`),
  KEY `read` (`read`),
  KEY `sent` (`sent`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_messages_old`
--

LOCK TABLES `cometchat_messages_old` WRITE;
/*!40000 ALTER TABLE `cometchat_messages_old` DISABLE KEYS */;
/*!40000 ALTER TABLE `cometchat_messages_old` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cometchat_status`
--

DROP TABLE IF EXISTS `cometchat_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cometchat_status` (
  `userid` int(10) unsigned NOT NULL,
  `message` text,
  `status` enum('available','away','busy','invisible','offline') DEFAULT NULL,
  `typingto` int(10) unsigned DEFAULT NULL,
  `typingtime` int(10) unsigned DEFAULT NULL,
  `isdevice` int(1) unsigned NOT NULL DEFAULT '0',
  `lastactivity` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`userid`),
  KEY `typingto` (`typingto`),
  KEY `typingtime` (`typingtime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cometchat_status`
--

LOCK TABLES `cometchat_status` WRITE;
/*!40000 ALTER TABLE `cometchat_status` DISABLE KEYS */;
INSERT INTO `cometchat_status` VALUES (2,NULL,'available',NULL,NULL,1,1455855327),(3,NULL,'away',NULL,NULL,0,1438445135),(4,NULL,'away',NULL,NULL,0,1438445096),(7,NULL,'available',NULL,NULL,1,1422044968),(18,NULL,'away',NULL,NULL,0,1443624749),(19,NULL,'available',NULL,NULL,0,1443625663),(21,NULL,'away',NULL,NULL,0,1445708744),(23,NULL,NULL,NULL,NULL,0,1443625353),(51,NULL,NULL,NULL,NULL,0,1445702756),(57,NULL,'available',NULL,NULL,1,1436565888),(90,NULL,NULL,NULL,NULL,0,1452213027),(100,NULL,'away',NULL,NULL,0,1452213401),(101,NULL,'available',NULL,NULL,0,1452300230),(102,NULL,'available',NULL,NULL,0,1452288616),(103,NULL,'available',NULL,NULL,0,1452300811),(104,NULL,'available',NULL,NULL,0,1452300181),(109,NULL,NULL,NULL,NULL,0,1453306792),(161,NULL,'',NULL,NULL,1,1436562648),(172,NULL,'',NULL,NULL,1,1436562779);
/*!40000 ALTER TABLE `cometchat_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision`
--

DROP TABLE IF EXISTS `comision`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_venta` int(11) NOT NULL,
  `id_afiliado` varchar(45) NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `puntos` varchar(45) NOT NULL,
  `valor` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision`
--

LOCK TABLES `comision` WRITE;
/*!40000 ALTER TABLE `comision` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision_bono`
--

DROP TABLE IF EXISTS `comision_bono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision_bono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_bono` int(11) NOT NULL,
  `id_bono_historial` int(11) NOT NULL,
  `valor` float NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision_bono`
--

LOCK TABLES `comision_bono` WRITE;
/*!40000 ALTER TABLE `comision_bono` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision_bono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision_bono_historial`
--

DROP TABLE IF EXISTS `comision_bono_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision_bono_historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_bono` int(11) NOT NULL,
  `dia` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision_bono_historial`
--

LOCK TABLES `comision_bono_historial` WRITE;
/*!40000 ALTER TABLE `comision_bono_historial` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision_bono_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comision_web_personal`
--

DROP TABLE IF EXISTS `comision_web_personal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comision_web_personal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_afiliado` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_comprador` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comision_web_personal`
--

LOCK TABLES `comision_web_personal` WRITE;
/*!40000 ALTER TABLE `comision_web_personal` DISABLE KEYS */;
/*!40000 ALTER TABLE `comision_web_personal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compartir`
--

DROP TABLE IF EXISTS `compartir`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compartir` (
  `id_archivero` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compartir`
--

LOCK TABLES `compartir` WRITE;
/*!40000 ALTER TABLE `compartir` DISABLE KEYS */;
/*!40000 ALTER TABLE `compartir` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `comprador`
--

DROP TABLE IF EXISTS `comprador`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `comprador` (
  `dni` int(11) NOT NULL,
  `nombre` text,
  `apellido` text,
  `id_pais` varchar(3) DEFAULT NULL,
  `estado` text,
  `municipio` text,
  `colonia` text,
  `direccion` text,
  `email` text,
  `telefono` text,
  PRIMARY KEY (`dni`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `comprador`
--

LOCK TABLES `comprador` WRITE;
/*!40000 ALTER TABLE `comprador` DISABLE KEYS */;
/*!40000 ALTER TABLE `comprador` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compras_reportes`
--

DROP TABLE IF EXISTS `compras_reportes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compras_reportes` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado actual` tinyint(1) NOT NULL,
  `id_producto` int(11) NOT NULL AUTO_INCREMENT,
  `producto` varchar(30) NOT NULL,
  `fecha_venta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `precio` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id_producto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compras_reportes`
--

LOCK TABLES `compras_reportes` WRITE;
/*!40000 ALTER TABLE `compras_reportes` DISABLE KEYS */;
/*!40000 ALTER TABLE `compras_reportes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `compropago`
--

DROP TABLE IF EXISTS `compropago`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `compropago` (
  `email` varchar(100) NOT NULL DEFAULT 'you@domain.com',
  `pk_test` varchar(255) DEFAULT 'pk_test',
  `sk_test` varchar(255) DEFAULT 'sk_test',
  `pk_live` varchar(255) DEFAULT 'pk_live',
  `sk_live` varchar(255) DEFAULT 'sk_live',
  `moneda` varchar(45) NOT NULL DEFAULT 'MXN',
  `test` int(11) NOT NULL DEFAULT '1',
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `compropago`
--

LOCK TABLES `compropago` WRITE;
/*!40000 ALTER TABLE `compropago` DISABLE KEYS */;
INSERT INTO `compropago` VALUES ('dev@networksoft.mx','pk_test_86300652249404673b','sk_test_67a4702492064ed4b7','pk_live_445924905b8a4a0651','sk_live_928023cd8249248176','MXN',1,'ACT');
/*!40000 ALTER TABLE `compropago` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_autocompra_mercancia`
--

DROP TABLE IF EXISTS `cross_autocompra_mercancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_autocompra_mercancia` (
  `id_autocompra` int(11) NOT NULL,
  `id_mercancia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_autocompra_mercancia`
--

LOCK TABLES `cross_autocompra_mercancia` WRITE;
/*!40000 ALTER TABLE `cross_autocompra_mercancia` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_autocompra_mercancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_combinado`
--

DROP TABLE IF EXISTS `cross_combinado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_combinado` (
  `id_combinado` int(11) NOT NULL,
  `id_mercancia` int(11) DEFAULT NULL,
  `cantidad` varchar(3) DEFAULT '0',
  `id_red` int(11) DEFAULT '1',
  `id_tipo_mercancia` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_combinado`
--

LOCK TABLES `cross_combinado` WRITE;
/*!40000 ALTER TABLE `cross_combinado` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_combinado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_comprador_venta`
--

DROP TABLE IF EXISTS `cross_comprador_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_comprador_venta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_comprador` int(11) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `id_afiliado` int(11) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_comprador_venta`
--

LOCK TABLES `cross_comprador_venta` WRITE;
/*!40000 ALTER TABLE `cross_comprador_venta` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_comprador_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_cuenta_user`
--

DROP TABLE IF EXISTS `cross_cuenta_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_cuenta_user` (
  `id_user` int(11) NOT NULL,
  `cuenta` varchar(20) NOT NULL,
  `clabe` varchar(20) NOT NULL,
  `clave_banco` varchar(3) NOT NULL,
  `banco` varchar(250) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_cuenta_user`
--

LOCK TABLES `cross_cuenta_user` WRITE;
/*!40000 ALTER TABLE `cross_cuenta_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_cuenta_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_dir_emp`
--

DROP TABLE IF EXISTS `cross_dir_emp`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_dir_emp` (
  `id_empresa` int(11) NOT NULL,
  `cp` varchar(7) NOT NULL,
  `calle` varchar(100) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `numero_exterior` varchar(5) NOT NULL,
  `numero_interior` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_dir_emp`
--

LOCK TABLES `cross_dir_emp` WRITE;
/*!40000 ALTER TABLE `cross_dir_emp` DISABLE KEYS */;
INSERT INTO `cross_dir_emp` VALUES (1,'252211','manila','fusa','cundinamarca','COL','9','22');
/*!40000 ALTER TABLE `cross_dir_emp` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_dir_user`
--

DROP TABLE IF EXISTS `cross_dir_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_dir_user` (
  `id_user` int(11) NOT NULL DEFAULT '0',
  `cp` varchar(10) NOT NULL,
  `calle` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `colonia` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `municipio` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(250) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(3) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_dir_user`
--

LOCK TABLES `cross_dir_user` WRITE;
/*!40000 ALTER TABLE `cross_dir_user` DISABLE KEYS */;
INSERT INTO `cross_dir_user` VALUES (2,'sadasd','','','','','COL');
/*!40000 ALTER TABLE `cross_dir_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_grupo_perfil`
--

DROP TABLE IF EXISTS `cross_grupo_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_grupo_perfil` (
  `id_grupo` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_grupo_perfil`
--

LOCK TABLES `cross_grupo_perfil` WRITE;
/*!40000 ALTER TABLE `cross_grupo_perfil` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_grupo_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_img_archivo`
--

DROP TABLE IF EXISTS `cross_img_archivo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_img_archivo` (
  `id_archivo` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_img_archivo`
--

LOCK TABLES `cross_img_archivo` WRITE;
/*!40000 ALTER TABLE `cross_img_archivo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_img_archivo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_img_archivo_soporte_tecnico`
--

DROP TABLE IF EXISTS `cross_img_archivo_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_img_archivo_soporte_tecnico` (
  `id_archivo` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_img_archivo_soporte_tecnico`
--

LOCK TABLES `cross_img_archivo_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `cross_img_archivo_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_img_archivo_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_img_promo`
--

DROP TABLE IF EXISTS `cross_img_promo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_img_promo` (
  `id_promo` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_img_promo`
--

LOCK TABLES `cross_img_promo` WRITE;
/*!40000 ALTER TABLE `cross_img_promo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_img_promo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_img_user`
--

DROP TABLE IF EXISTS `cross_img_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_img_user` (
  `id_user` int(11) NOT NULL,
  `id_img` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_img_user`
--

LOCK TABLES `cross_img_user` WRITE;
/*!40000 ALTER TABLE `cross_img_user` DISABLE KEYS */;
INSERT INTO `cross_img_user` VALUES (2,3);
/*!40000 ALTER TABLE `cross_img_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_inventario_bloqueo`
--

DROP TABLE IF EXISTS `cross_inventario_bloqueo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_inventario_bloqueo` (
  `id_inventario` int(11) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_inventario_bloqueo`
--

LOCK TABLES `cross_inventario_bloqueo` WRITE;
/*!40000 ALTER TABLE `cross_inventario_bloqueo` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_inventario_bloqueo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_merc_dist`
--

DROP TABLE IF EXISTS `cross_merc_dist`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_merc_dist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mercancia` int(11) NOT NULL,
  `id_distribuidor` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_merc_dist`
--

LOCK TABLES `cross_merc_dist` WRITE;
/*!40000 ALTER TABLE `cross_merc_dist` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_merc_dist` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_merc_img`
--

DROP TABLE IF EXISTS `cross_merc_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_merc_img` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_mercancia` int(11) NOT NULL,
  `id_cat_imagen` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_merc_img`
--

LOCK TABLES `cross_merc_img` WRITE;
/*!40000 ALTER TABLE `cross_merc_img` DISABLE KEYS */;
INSERT INTO `cross_merc_img` VALUES (1,1,645),(2,2,646);
/*!40000 ALTER TABLE `cross_merc_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_merc_impuesto`
--

DROP TABLE IF EXISTS `cross_merc_impuesto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_merc_impuesto` (
  `id_mercancia` int(11) NOT NULL,
  `id_impuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_merc_impuesto`
--

LOCK TABLES `cross_merc_impuesto` WRITE;
/*!40000 ALTER TABLE `cross_merc_impuesto` DISABLE KEYS */;
INSERT INTO `cross_merc_impuesto` VALUES (1,2),(2,2);
/*!40000 ALTER TABLE `cross_merc_impuesto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_pack_merc`
--

DROP TABLE IF EXISTS `cross_pack_merc`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_pack_merc` (
  `id_paquete` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad_producto` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL,
  `cantidad_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_pack_merc`
--

LOCK TABLES `cross_pack_merc` WRITE;
/*!40000 ALTER TABLE `cross_pack_merc` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_pack_merc` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_paquete`
--

DROP TABLE IF EXISTS `cross_paquete`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_paquete` (
  `id_paquete` int(11) NOT NULL,
  `id_mercancia` int(11) DEFAULT NULL,
  `cantidad` varchar(3) DEFAULT '0',
  `id_red` int(11) DEFAULT '1',
  `id_tipo_mercancia` varchar(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_paquete`
--

LOCK TABLES `cross_paquete` WRITE;
/*!40000 ALTER TABLE `cross_paquete` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_paquete` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_perfil_usuario`
--

DROP TABLE IF EXISTS `cross_perfil_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_perfil_usuario` (
  `id_user` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_perfil_usuario`
--

LOCK TABLES `cross_perfil_usuario` WRITE;
/*!40000 ALTER TABLE `cross_perfil_usuario` DISABLE KEYS */;
INSERT INTO `cross_perfil_usuario` VALUES (1,1),(2,2);
/*!40000 ALTER TABLE `cross_perfil_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_permiso_perfil`
--

DROP TABLE IF EXISTS `cross_permiso_perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_permiso_perfil` (
  `id_permiso` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_permiso_perfil`
--

LOCK TABLES `cross_permiso_perfil` WRITE;
/*!40000 ALTER TABLE `cross_permiso_perfil` DISABLE KEYS */;
INSERT INTO `cross_permiso_perfil` VALUES (1,1),(2,1),(3,1),(4,1),(5,1),(6,2),(7,2),(8,2),(9,2),(10,2),(11,2),(12,2),(13,2),(14,2),(15,2),(16,2),(17,2),(18,2),(19,2),(20,2),(21,2),(22,2),(23,2),(24,2),(25,2),(26,2),(27,2),(28,2),(29,2),(30,2),(31,2),(32,2),(33,2),(34,2);
/*!40000 ALTER TABLE `cross_permiso_perfil` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_plan_bonos`
--

DROP TABLE IF EXISTS `cross_plan_bonos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_plan_bonos` (
  `id_plan` int(11) NOT NULL,
  `id_bono` int(11) NOT NULL,
  `order` int(11) DEFAULT '1',
  PRIMARY KEY (`id_plan`,`id_bono`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_plan_bonos`
--

LOCK TABLES `cross_plan_bonos` WRITE;
/*!40000 ALTER TABLE `cross_plan_bonos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_plan_bonos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_premio_usuario`
--

DROP TABLE IF EXISTS `cross_premio_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_premio_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_premio` int(11) NOT NULL,
  `id_afiliado` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(20) DEFAULT 'Pendiente',
  `fecha_entrega` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_premio_usuario`
--

LOCK TABLES `cross_premio_usuario` WRITE;
/*!40000 ALTER TABLE `cross_premio_usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_premio_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_rango_tipos`
--

DROP TABLE IF EXISTS `cross_rango_tipos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_rango_tipos` (
  `id_rango` int(11) NOT NULL,
  `id_tipo_rango` int(11) NOT NULL,
  `valor` int(11) NOT NULL DEFAULT '0',
  `condicion_red` varchar(10) NOT NULL DEFAULT 'DIRECTOS',
  `nivel_red` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_rango`,`id_tipo_rango`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_rango_tipos`
--

LOCK TABLES `cross_rango_tipos` WRITE;
/*!40000 ALTER TABLE `cross_rango_tipos` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_rango_tipos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_rango_user`
--

DROP TABLE IF EXISTS `cross_rango_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_rango_user` (
  `id_user` int(11) NOT NULL,
  `id_rango` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entregado` tinyint(1) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_rango_user`
--

LOCK TABLES `cross_rango_user` WRITE;
/*!40000 ALTER TABLE `cross_rango_user` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_rango_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_surtido_embarque`
--

DROP TABLE IF EXISTS `cross_surtido_embarque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_surtido_embarque` (
  `id_surtido` int(11) NOT NULL,
  `id_embarque` int(11) NOT NULL,
  PRIMARY KEY (`id_surtido`,`id_embarque`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_surtido_embarque`
--

LOCK TABLES `cross_surtido_embarque` WRITE;
/*!40000 ALTER TABLE `cross_surtido_embarque` DISABLE KEYS */;
INSERT INTO `cross_surtido_embarque` VALUES (1,1);
/*!40000 ALTER TABLE `cross_surtido_embarque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_tel_user`
--

DROP TABLE IF EXISTS `cross_tel_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_tel_user` (
  `id_user` int(11) NOT NULL,
  `id_tipo_tel` int(11) NOT NULL,
  `numero` varchar(22) NOT NULL,
  `estatus` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_tel_user`
--

LOCK TABLES `cross_tel_user` WRITE;
/*!40000 ALTER TABLE `cross_tel_user` DISABLE KEYS */;
INSERT INTO `cross_tel_user` VALUES (2,1,'','ACT'),(2,2,'','ACT');
/*!40000 ALTER TABLE `cross_tel_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_user_banco`
--

DROP TABLE IF EXISTS `cross_user_banco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_user_banco` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL DEFAULT '2',
  `cuenta` varchar(20) NOT NULL DEFAULT 'Your Card',
  `titular` varchar(200) NOT NULL DEFAULT 'You',
  `banco` varchar(100) NOT NULL DEFAULT 'Your Bank',
  `pais` varchar(3) NOT NULL DEFAULT 'COL',
  `swift` varchar(45) DEFAULT NULL,
  `otro` varchar(45) DEFAULT NULL,
  `clabe` int(11) DEFAULT NULL,
  `dir_postal` int(35) DEFAULT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_user_banco`
--

LOCK TABLES `cross_user_banco` WRITE;
/*!40000 ALTER TABLE `cross_user_banco` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_user_banco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_usuario_cupon`
--

DROP TABLE IF EXISTS `cross_usuario_cupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_usuario_cupon` (
  `id_usuario` int(11) NOT NULL,
  `id_cupon` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_usuario_cupon`
--

LOCK TABLES `cross_usuario_cupon` WRITE;
/*!40000 ALTER TABLE `cross_usuario_cupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_usuario_cupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_venta_envio`
--

DROP TABLE IF EXISTS `cross_venta_envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_venta_envio` (
  `id_venta` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `id_pais` varchar(3) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `proveedor_mensajeria` varchar(50) DEFAULT NULL,
  `info_ad` text,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_venta_envio`
--

LOCK TABLES `cross_venta_envio` WRITE;
/*!40000 ALTER TABLE `cross_venta_envio` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_venta_envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_venta_mercancia`
--

DROP TABLE IF EXISTS `cross_venta_mercancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_venta_mercancia` (
  `id_venta` int(11) NOT NULL,
  `id_mercancia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo_unidad` float NOT NULL,
  `impuesto_unidad` float NOT NULL DEFAULT '0',
  `costo_total` float NOT NULL,
  `nombreImpuesto` varchar(100) NOT NULL DEFAULT '',
  `id_` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_venta_mercancia`
--

LOCK TABLES `cross_venta_mercancia` WRITE;
/*!40000 ALTER TABLE `cross_venta_mercancia` DISABLE KEYS */;
INSERT INTO `cross_venta_mercancia` VALUES (1,1,1,100,16,116,'16% de IVA\n',1),(12,1,2,100,16,232,'16% de IVA\n',2),(12,2,1,120,19.2,139.2,'16% de IVA\n',3),(6,1,1,100,16,116,'16% de IVA\n',4);
/*!40000 ALTER TABLE `cross_venta_mercancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cross_video_img`
--

DROP TABLE IF EXISTS `cross_video_img`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cross_video_img` (
  `id_video` int(11) NOT NULL,
  `id_img` int(11) NOT NULL,
  `ruta_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cross_video_img`
--

LOCK TABLES `cross_video_img` WRITE;
/*!40000 ALTER TABLE `cross_video_img` DISABLE KEYS */;
/*!40000 ALTER TABLE `cross_video_img` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuenta_pagar_banco_historial`
--

DROP TABLE IF EXISTS `cuenta_pagar_banco_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cuenta_pagar_banco_historial` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_banco` varchar(45) DEFAULT NULL,
  `id_usuario` varchar(45) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `valor` varchar(45) DEFAULT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuenta_pagar_banco_historial`
--

LOCK TABLES `cuenta_pagar_banco_historial` WRITE;
/*!40000 ALTER TABLE `cuenta_pagar_banco_historial` DISABLE KEYS */;
INSERT INTO `cuenta_pagar_banco_historial` VALUES (1,'2016-09-28 23:03:04','1','2',1,'116','ACT'),(2,'2017-03-18 09:16:15',NULL,'2',12,'371.2','DES');
/*!40000 ALTER TABLE `cuenta_pagar_banco_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cupon`
--

DROP TABLE IF EXISTS `cupon`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cupon` (
  `id_cupon` int(11) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` varchar(3) NOT NULL,
  `fecha_adicion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cupon`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cupon`
--

LOCK TABLES `cupon` WRITE;
/*!40000 ALTER TABLE `cupon` DISABLE KEYS */;
/*!40000 ALTER TABLE `cupon` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `datos_generales_soporte_tecnico`
--

DROP TABLE IF EXISTS `datos_generales_soporte_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `datos_generales_soporte_tecnico` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `skype` text,
  `pekey` text,
  `pinkost` text,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `datos_generales_soporte_tecnico`
--

LOCK TABLES `datos_generales_soporte_tecnico` WRITE;
/*!40000 ALTER TABLE `datos_generales_soporte_tecnico` DISABLE KEYS */;
/*!40000 ALTER TABLE `datos_generales_soporte_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `distribucion`
--

DROP TABLE IF EXISTS `distribucion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `distribucion` (
  `canal` int(11) NOT NULL,
  `tipo_mercancia` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `distribucion`
--

LOCK TABLES `distribucion` WRITE;
/*!40000 ALTER TABLE `distribucion` DISABLE KEYS */;
INSERT INTO `distribucion` VALUES (1,1),(2,1);
/*!40000 ALTER TABLE `distribucion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `documento_inventario`
--

DROP TABLE IF EXISTS `documento_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `documento_inventario` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estatus` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `documento_inventario`
--

LOCK TABLES `documento_inventario` WRITE;
/*!40000 ALTER TABLE `documento_inventario` DISABLE KEYS */;
INSERT INTO `documento_inventario` VALUES (2,'Factura','ACT'),(3,'Remision','ACT'),(4,'Consignacion','ACT'),(5,'Traspaso interno','ACT'),(6,'Devoluvion','ACT'),(7,'Donacion','ACT'),(8,'Destruccion','ACT'),(9,'Traspaso externo','ACT');
/*!40000 ALTER TABLE `documento_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `emails_departamentos`
--

DROP TABLE IF EXISTS `emails_departamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `emails_departamentos` (
  `nombre` text,
  `email` text,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `emails_departamentos`
--

LOCK TABLES `emails_departamentos` WRITE;
/*!40000 ALTER TABLE `emails_departamentos` DISABLE KEYS */;
INSERT INTO `emails_departamentos` VALUES ('Pagos','pagos@miempresamultinivel.com',31),('Contacto','contacto@miempresamultinivel.com',32),('','',33),('','',34),('','',35),('','',36),('','',37),('','',38),('','',39),('','',40);
/*!40000 ALTER TABLE `emails_departamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `embarque`
--

DROP TABLE IF EXISTS `embarque`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `embarque` (
  `id_embarque` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_entrega` date NOT NULL,
  `id_estatus` int(11) NOT NULL,
  `n_guia` text,
  `id_mensajeria` int(11) DEFAULT '0',
  PRIMARY KEY (`id_embarque`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `embarque`
--

LOCK TABLES `embarque` WRITE;
/*!40000 ALTER TABLE `embarque` DISABLE KEYS */;
INSERT INTO `embarque` VALUES (1,'2016-09-30',2,'457457',34);
/*!40000 ALTER TABLE `embarque` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa`
--

DROP TABLE IF EXISTS `empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa` (
  `id_empresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `id_razon` varchar(30) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `site` varchar(255) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa`
--

LOCK TABLES `empresa` WRITE;
/*!40000 ALTER TABLE `empresa` DISABLE KEYS */;
INSERT INTO `empresa` VALUES (1,'fabrica','1','factory@networksoft.mx','http://networksoft.mx/');
/*!40000 ALTER TABLE `empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empresa_multinivel`
--

DROP TABLE IF EXISTS `empresa_multinivel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `empresa_multinivel` (
  `id_tributaria` varchar(15) NOT NULL DEFAULT '000000000-0',
  `nombre` varchar(65) NOT NULL DEFAULT 'NetworkSoft',
  `regimen` int(11) NOT NULL DEFAULT '1',
  `fijo` varchar(22) NOT NULL DEFAULT '000-00-00',
  `movil` varchar(22) NOT NULL DEFAULT '000-000-00-00',
  `direccion` varchar(65) NOT NULL DEFAULT 'Cll 0',
  `web` varchar(100) NOT NULL DEFAULT 'http://www.yourdomain.com',
  `pais` varchar(3) NOT NULL DEFAULT 'AAA',
  `postal` varchar(15) NOT NULL DEFAULT '000000',
  `ciudad` varchar(45) DEFAULT 'No Define',
  `provincia` varchar(45) DEFAULT 'No Define',
  `membresia` varchar(3) DEFAULT 'DES',
  `paquete` varchar(3) DEFAULT 'DES',
  `item` varchar(3) DEFAULT 'DES',
  `banner` int(11) DEFAULT '1',
  `resolucion` varchar(300) NOT NULL,
  `comentarios` varchar(300) NOT NULL,
  `afiliados_directos` int(11) NOT NULL DEFAULT '0',
  `puntos_personales` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tributaria`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empresa_multinivel`
--

LOCK TABLES `empresa_multinivel` WRITE;
/*!40000 ALTER TABLE `empresa_multinivel` DISABLE KEYS */;
INSERT INTO `empresa_multinivel` VALUES ('9278986546','Mi empresa',1,'0','0','No define','http://miempresamultinivel.com','COL','No define','No define','No define','DES','DES','DES',0,'','',0,0);
/*!40000 ALTER TABLE `empresa_multinivel` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta`
--

DROP TABLE IF EXISTS `encuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta` (
  `id_encuesta` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(140) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_encuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta`
--

LOCK TABLES `encuesta` WRITE;
/*!40000 ALTER TABLE `encuesta` DISABLE KEYS */;
INSERT INTO `encuesta` VALUES (1,'Primera encuesta','Esta encuesta es para conocer su opinion por el diseño de su oficina virtual',1,'2015-01-23 11:45:54','ACT'),(2,'Segunda Encuesta','Esta encuesta es para conocer su opnion respecto al carrito',1,'2015-01-28 09:28:10','ACT'),(4,'Tercera Encuesta','Esta encuesta es para conocer su opinion respecto a lagunas secciones de la oficia virtual',1,'2015-01-28 09:48:31','ACT');
/*!40000 ALTER TABLE `encuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta_contestada`
--

DROP TABLE IF EXISTS `encuesta_contestada`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta_contestada` (
  `id_encuesta_contestada` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_encuesta_contestada`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta_contestada`
--

LOCK TABLES `encuesta_contestada` WRITE;
/*!40000 ALTER TABLE `encuesta_contestada` DISABLE KEYS */;
INSERT INTO `encuesta_contestada` VALUES (1,1,2,'2015-01-23 11:47:13');
/*!40000 ALTER TABLE `encuesta_contestada` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta_pregunta`
--

DROP TABLE IF EXISTS `encuesta_pregunta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta_pregunta` (
  `id_pregunta` int(11) NOT NULL AUTO_INCREMENT,
  `id_encuesta` int(11) NOT NULL,
  `pregunta` varchar(140) NOT NULL,
  PRIMARY KEY (`id_pregunta`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta_pregunta`
--

LOCK TABLES `encuesta_pregunta` WRITE;
/*!40000 ALTER TABLE `encuesta_pregunta` DISABLE KEYS */;
INSERT INTO `encuesta_pregunta` VALUES (1,1,'¿Que tan satisfecho esta con el cambio de colores de su oficina?'),(2,1,'¿Que tan satisfecho esta con la distribucion de su oficina?'),(3,1,'¿Que tan satisfecho esta con el clima?'),(4,1,'¿Que tan satisfecho esta con el seguridad del sistema?'),(5,1,'¿Que tan satisfecho esta con el espacio de almacenamiento de su oficina?'),(6,2,'La distribucion de la información en el carrito de compras me parece...'),(7,2,'¿Como calificaria la velocidad con la que se procesa la informacion en el carrito?'),(8,2,'¿Que tan satisfecho esta con la apariencia el carrito?'),(9,2,'¿Se siente con confianza de usar el carrito?'),(10,2,'La forma en la que se procesan los pagos me parece...'),(16,4,'La forma en la que se muestran los videos en la seccion de videos me parece...'),(17,4,'La forma en la que se muestran las noticias en la seccion de noticias me parece...'),(18,4,'La forma en la que se muestran la informacion en la seccion de informacion me parece...'),(19,4,'La forma en la que se muestran los eventos en el calendario en la seccion de eventos me parece...'),(20,4,'La forma en la que se muestra las encuestas para contestarlas me parece...');
/*!40000 ALTER TABLE `encuesta_pregunta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta_respuesta`
--

DROP TABLE IF EXISTS `encuesta_respuesta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta_respuesta` (
  `id_respuesta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pregunta` int(11) NOT NULL,
  `respuesta` varchar(140) NOT NULL,
  PRIMARY KEY (`id_respuesta`)
) ENGINE=InnoDB AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta_respuesta`
--

LOCK TABLES `encuesta_respuesta` WRITE;
/*!40000 ALTER TABLE `encuesta_respuesta` DISABLE KEYS */;
INSERT INTO `encuesta_respuesta` VALUES (1,1,'Totalmente insatisfecho'),(2,1,'insatisfecho'),(3,1,'Satisfecho'),(4,1,'Totalmente satisfecho'),(5,1,'Encantado'),(6,2,'Totalmente insatisfecho'),(7,2,'insatisfecho'),(8,2,'Satisfecho'),(9,2,'Totalmente satisfecho'),(10,2,'Encantado'),(11,3,'Totalmente insatisfecho'),(12,3,'insatisfecho'),(13,3,'Satisfecho'),(14,3,'Totalmente satisfecho'),(15,3,'Encantado'),(16,4,'Totalmente insatisfecho'),(17,4,'insatisfecho'),(18,4,'Satisfecho'),(19,4,'Totalmente satisfecho'),(20,4,'Encantado'),(21,5,'Totalmente insatisfecho'),(22,5,'insatisfecho'),(23,5,'Satisfecho'),(24,5,'Totalmente satisfecho'),(25,5,'Encantado'),(26,6,'Muy buena'),(27,6,'Buena'),(28,6,'Regular'),(29,6,'Mala'),(30,6,'Muy mala'),(31,7,'Muy Rapida'),(32,7,'Rapida'),(33,7,'Normal'),(34,7,'Lenta'),(35,7,'Muy Lenta'),(36,8,'Encantado'),(37,8,'Satisfecho'),(38,8,'Ligeramente Satisfecho'),(39,8,'Insatisfecho'),(40,8,'Muy insatisfecho'),(41,9,'Muy confiado'),(42,9,'Confiado'),(43,9,'Ligeramente confiado'),(44,9,'Desconfiado'),(45,9,'Totalmente Desconfiado'),(46,10,'Muy buena'),(47,10,'Buena'),(48,10,'Regular'),(49,10,'Mala'),(50,10,'Muy Mala'),(76,16,'Muy buena'),(77,16,'Buena'),(78,16,'Regular'),(79,16,'Mala'),(80,16,'Muy Mala'),(81,17,'Muy Buena'),(82,17,'Buena'),(83,17,'Regular'),(84,17,'Mala'),(85,17,'Muy mala'),(86,18,'Muy buena'),(87,18,'Buena'),(88,18,'Regular'),(89,18,'Mala'),(90,18,'Muy Mala'),(91,19,'Muy Buena'),(92,19,'Buena'),(93,19,'Regular'),(94,19,'Mala'),(95,19,'Muy Mala'),(96,20,'Muy Buena'),(97,20,'Buena'),(98,20,'Regular'),(99,20,'Mala'),(100,20,'Muy Mala');
/*!40000 ALTER TABLE `encuesta_respuesta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `encuesta_resultado`
--

DROP TABLE IF EXISTS `encuesta_resultado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `encuesta_resultado` (
  `id_encuesta_contestada` int(11) NOT NULL,
  `id_pregunta` int(11) NOT NULL,
  `id_respuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `encuesta_resultado`
--

LOCK TABLES `encuesta_resultado` WRITE;
/*!40000 ALTER TABLE `encuesta_resultado` DISABLE KEYS */;
INSERT INTO `encuesta_resultado` VALUES (1,1,5),(1,2,10),(1,3,13),(1,4,16),(1,5,25);
/*!40000 ALTER TABLE `encuesta_resultado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estate`
--

DROP TABLE IF EXISTS `estate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(100) DEFAULT NULL,
  `id_pais` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1427 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estate`
--

LOCK TABLES `estate` WRITE;
/*!40000 ALTER TABLE `estate` DISABLE KEYS */;
INSERT INTO `estate` VALUES (10,'Abhasia [Aphazeti]','GEO'),(11,'Abidjan','CIV'),(12,'Abruzzit','ITA'),(13,'Abu Dhabi','ARE'),(14,'Aceh','IDN'),(15,'Acre','BRA'),(16,'Adana','TUR'),(17,'Addis Abeba','ETH'),(18,'Aden','YEM'),(19,'Adiyaman','TUR'),(20,'Adygea','RUS'),(21,'Adzaria [AtÅ¡ara]','GEO'),(22,'Afyon','TUR'),(23,'Aguascalientes','MEX'),(24,'Ahal','TKM'),(25,'Aichi','JPN'),(26,'Ajman','ARE'),(27,'Akershus','NOR'),(28,'Akita','JPN'),(29,'Aksaray','TUR'),(30,'al-Anbar','IRQ'),(31,'al-Asima','KWT'),(32,'al-Bahr al-Abyad','SDN'),(33,'al-Bahr al-Ahmar','SDN'),(34,'al-Batina','OMN'),(35,'al-Buhayra','EGY'),(36,'al-Daqahliya','EGY'),(37,'al-Faiyum','EGY'),(38,'al-Gharbiya','EGY'),(39,'al-Hasaka','SYR'),(40,'al-Jazira','SDN'),(41,'al-Khudud al-Samaliy','SAU'),(42,'al-Manama','BHR'),(43,'al-Minufiya','EGY'),(44,'al-Minya','EGY'),(45,'al-Najaf','IRQ'),(46,'al-Qadarif','SDN'),(47,'al-Qadisiya','IRQ'),(48,'al-Qalyubiya','EGY'),(49,'al-Qasim','SAU'),(50,'al-Raqqa','SYR'),(51,'al-Shamal','LBN'),(52,'al-Sharqiya','EGY'),(53,'al-Sharqiya','SAU'),(54,'al-Sulaymaniya','IRQ'),(55,'al-Tamim','IRQ'),(56,'al-Zarqa','JOR'),(57,'al-Zawiya','LBY'),(58,'Alabama','USA'),(59,'Alagoas','BRA'),(60,'Alaska','USA'),(61,'Alberta','CAN'),(62,'Aleksandria','EGY'),(63,'Aleppo','SYR'),(64,'Alger','DZA'),(65,'Almaty','KAZ'),(66,'Almaty Qalasy','KAZ'),(67,'Alsace','FRA'),(68,'Altai','RUS'),(69,'Alto ParanÃ¡','PRY'),(70,'AmapÃ¡','BRA'),(71,'Amazonas','BRA'),(72,'Amhara','ETH'),(73,'Amman','JOR'),(74,'Amur','RUS'),(75,'An Giang','VNM'),(76,'Anambra & Enugu & Eb','NGA'),(77,'Ancash','PER'),(78,'Andalusia','ESP'),(79,'Andhra Pradesh','IND'),(80,'Andijon','UZB'),(81,'Andorra la Vella','AND'),(82,'Anhalt Sachsen','DEU'),(83,'Anhui','CHN'),(84,'Ankara','TUR'),(85,'Annaba','DZA'),(86,'Antalya','TUR'),(87,'Antananarivo','MDG'),(88,'Antioquia','COL'),(89,'Antofagasta','CHL'),(90,'Antwerpen','BEL'),(91,'AnzoÃ¡tegui\n','VEN'),(92,'AnzoÃ¡tegui','VEN'),(93,'Aomori','JPN'),(94,'Apulia','ITA'),(95,'Apure','VEN'),(96,'AqtÃ¶be','KAZ'),(97,'Aqua Grande','STP'),(98,'Aquitaine','FRA'),(99,'Arad','ROM'),(100,'Aragonia','ESP'),(101,'Aragua','VEN'),(102,'Ardebil','IRN'),(103,'Arecibo','PRI'),(104,'Arequipa','PER'),(105,'Arges','ROM'),(106,'Ariana','TUN'),(107,'Arizona','USA'),(108,'Arkangeli','RUS'),(109,'Arkansas','USA'),(110,'ARMM','PHL'),(111,'Arusha','TZA'),(112,'Ashanti','GHA'),(113,'Asir','SAU'),(114,'Assam','IND'),(115,'Assuan','EGY'),(116,'Astana','KAZ'),(117,'Astrahan','RUS'),(118,'Asturia','ESP'),(119,'AsunciÃ³n','PRY'),(120,'Asyut','EGY'),(121,'Atacama','CHL'),(122,'Atacora','BEN'),(123,'Atlantique','BEN'),(124,'Atlantico','COL'),(125,'AtlÃ¡ntida','HND'),(126,'Attika','GRC'),(127,'Atyrau','KAZ'),(128,'Auckland','NZL'),(129,'Auvergne','FRA'),(130,'Ayacucho','PER'),(131,'Aydin','TUR'),(132,'Azuay','ECU'),(133,'â€“','ABW'),(134,'â€“','AIA'),(135,'â€“','CXR'),(136,'â€“','GBR'),(137,'â€“','GIB'),(138,'â€“','GUM'),(139,'â€“','MCO'),(140,'â€“','NCL'),(141,'â€“','NFK'),(142,'â€“','NIU'),(143,'â€“','NRU'),(144,'â€“','PCN'),(145,'â€“','SGP'),(146,'â€“','VAT'),(147,'Ã…rhus','DNK'),(148,'Ã‡orum','TUR'),(149,'ÃŽle-de-France','FRA'),(150,'Ã–rebros lÃ¤n','SWE'),(151,'Ba Ria-Vung Tau','VNM'),(152,'Babil','IRQ'),(153,'Bac Thai','VNM'),(154,'Bacau','ROM'),(155,'Baden-WÃ¼rttemberg','DEU'),(156,'Baghdad','IRQ'),(157,'Bahia','BRA'),(158,'Bahr al-Jabal','SDN'),(159,'Baijeri','DEU'),(160,'Baja California','MEX'),(161,'Baja California Sur','MEX'),(162,'Baki','AZE'),(163,'Balears','ESP'),(164,'Bali','IDN'),(165,'Balikesir','TUR'),(166,'Balkh','AFG'),(167,'Balti','MDA'),(168,'Baluchistan','PAK'),(169,'Bamako','MLI'),(170,'Banaadir','SOM'),(171,'Bandundu','COD'),(172,'Bangkok','THA'),(173,'Bangui','CAF'),(174,'Bani Suwayf','EGY'),(175,'Banjul','GMB'),(176,'Baranya','HUN'),(177,'Barinas','VEN'),(178,'Barisal','BGD'),(179,'Bas-ZaÃ¯re','COD'),(180,'Basel-Stadt','CHE'),(181,'Baskimaa','ESP'),(182,'Basra','IRQ'),(183,'Basse-Normandie','FRA'),(184,'Basse-Terre','GLP'),(185,'Batman','TUR'),(186,'Batna','DZA'),(187,'Battambang','KHM'),(188,'Bauchi & Gombe','NGA'),(189,'BayamÃ³n','PRI'),(190,'BaÅ¡kortostan','RUS'),(191,'BÃ¡cs-Kiskun','HUN'),(192,'BÃ©char','DZA'),(193,'BÃ©jaÃ¯a','DZA'),(194,'BÃ­obÃ­o','CHL'),(195,'Beirut','LBN'),(196,'Belgorod','RUS'),(197,'Belize City','BLZ'),(198,'Bender (TÃ®ghina)','MDA'),(199,'Bengasi','LBY'),(200,'Bengkulu','IDN'),(201,'Benguela','AGO'),(202,'Benue','NGA'),(203,'Berliini','DEU'),(204,'Bern','CHE'),(205,'Bicol','PHL'),(206,'Bihar','IND'),(207,'Bihor','ROM'),(208,'Binh Dinh','VNM'),(209,'Binh Thuan','VNM'),(210,'Bioko','GNQ'),(211,'Biserta','TUN'),(212,'Bishkek shaary','KGZ'),(213,'Biskra','DZA'),(214,'Bissau','GNB'),(215,'Blantyre','MWI'),(216,'Blida','DZA'),(217,'Bolivar','COL'),(218,'BolÃ­var','VEN'),(219,'Borgou','BEN'),(220,'Borno & Yobe','NGA'),(221,'Borsod-AbaÃºj-ZemplÃ','HUN'),(222,'Botosani','ROM'),(223,'BouakÃ©','CIV'),(224,'BoulkiemdÃ©','BFA'),(225,'Bourgogne','FRA'),(226,'Boyaca','COL'),(227,'Braga','PRT'),(228,'Braila','ROM'),(229,'Brandenburg','DEU'),(230,'Brasov','ROM'),(231,'Bratislava','SVK'),(232,'Brazzaville','COG'),(233,'Bremen','DEU'),(234,'Brest','BLR'),(235,'Bretagne','FRA'),(236,'British Colombia','CAN'),(237,'Brjansk','RUS'),(238,'Brunei and Muara','BRN'),(239,'Bryssel','BEL'),(240,'Budapest','HUN'),(241,'Buenos Aires','ARG'),(242,'Buhoro','UZB'),(243,'Bujumbura','BDI'),(244,'Bukarest','ROM'),(245,'Bulawayo','ZWE'),(246,'Burgas','BGR'),(247,'Burjatia','RUS'),(248,'Bursa','TUR'),(249,'Bushehr','IRN'),(250,'Buzau','ROM'),(251,'Cagayan Valley','PHL'),(252,'Caguas','PRI'),(253,'Cajamarca','PER'),(254,'Calabria','ITA'),(255,'Caldas','COL'),(256,'California','USA'),(257,'Callao','PER'),(258,'CamagÃ¼ey','CUB'),(259,'Campania','ITA'),(260,'Campeche','MEX'),(261,'Can Tho','VNM'),(262,'Canary Islands','ESP'),(263,'Cantabria','ESP'),(264,'Canterbury','NZL'),(265,'Cap-Vert','SEN'),(266,'Capital Region','AUS'),(267,'Caqueta','COL'),(268,'CAR','PHL'),(269,'Carabobo','VEN'),(270,'Caraga','PHL'),(271,'Caras-Severin','ROM'),(272,'Carolina','PRI'),(273,'Caroni','TTO'),(274,'Casablanca','MAR'),(275,'Castilla and LeÃ³n','ESP'),(276,'Castries','LCA'),(277,'Catamarca','ARG'),(278,'Cauca','COL'),(279,'Cayenne','GUF'),(280,'Cayo','BLZ'),(281,'CÃ³rdoba','ARG'),(282,'Cordoba','COL'),(283,'CearÃ¡','BRA'),(284,'Central','FJI'),(285,'Central','KEN'),(286,'Central','LKA'),(287,'Central','NPL'),(288,'Central','PRY'),(289,'Central','UGA'),(290,'Central','ZMB'),(291,'Central Java','IDN'),(292,'Central Luzon','PHL'),(293,'Central Macedonia','GRC'),(294,'Central Mindanao','PHL'),(295,'Central Serbia','YUG'),(296,'Central Visayas','PHL'),(297,'Centre','CMR'),(298,'Centre','FRA'),(299,'Cesar','COL'),(300,'Chaco','ARG'),(301,'Chagang','PRK'),(302,'Chaharmahal va Bakht','IRN'),(303,'Champagne-Ardenne','FRA'),(304,'Chandigarh','IND'),(305,'Changhwa','TWN'),(306,'Chaouia-Ouardigha','MAR'),(307,'Chari-Baguirmi','TCD'),(308,'Cheju','KOR'),(309,'Chhatisgarh','IND'),(310,'Chiang Mai','THA'),(311,'Chiapas','MEX'),(312,'Chiayi','TWN'),(313,'Chiba','JPN'),(314,'Chihuahua','MEX'),(315,'Chimborazo','ECU'),(316,'Chinandega','NIC'),(317,'Chisinau','MDA'),(318,'Chittagong','BGD'),(319,'Chlef','DZA'),(320,'Chollabuk','KOR'),(321,'Chollanam','KOR'),(322,'Chongqing','CHN'),(323,'Chubut','ARG'),(324,'Chungchongbuk','KOR'),(325,'Chungchongnam','KOR'),(326,'Chuquisaca','BOL'),(327,'Chuuk','FSM'),(328,'Ciego de Ãvila','CUB'),(329,'Cienfuegos','CUB'),(330,'Cizah','UZB'),(331,'Cluj','ROM'),(332,'Coahuila de Zaragoza','MEX'),(333,'Coast','KEN'),(334,'CoÃ­mbra','PRT'),(335,'Cochabamba','BOL'),(336,'Colima','MEX'),(337,'Colorado','USA'),(338,'Conakry','GIN'),(339,'Connecticut','USA'),(340,'Constanta','ROM'),(341,'Constantine','DZA'),(342,'Copperbelt','ZMB'),(343,'Coquimbo','CHL'),(344,'Corrientes','ARG'),(345,'CortÃ©s','HND'),(346,'Crete','GRC'),(347,'Cross River','NGA'),(348,'CsongrÃ¡d','HUN'),(349,'Cundinamarca','COL'),(350,'CuraÃ§ao','ANT'),(351,'Cusco','PER'),(352,'Dac Lac','VNM'),(353,'Dagestan','RUS'),(354,'Dakhlet NouÃ¢dhibou','MRT'),(355,'Daloa','CIV'),(356,'Damascus','SYR'),(357,'Damaskos','SYR'),(358,'Dar es Salaam','TZA'),(359,'Darfur al-Janubiya','SDN'),(360,'Darfur al-Shamaliya','SDN'),(361,'Dashhowuz','TKM'),(362,'Daugavpils','LVA'),(363,'Dayr al-Zawr','SYR'),(364,'DÃ¢mbovita','ROM'),(365,'Delhi','IND'),(366,'Denizli','TUR'),(367,'Dhaka','BGD'),(368,'DhiQar','IRQ'),(369,'Dili','TMP'),(370,'Diourbel','SEN'),(371,'Dire Dawa','ETH'),(372,'District of Columbia','USA'),(373,'Distrito Central','HND'),(374,'Distrito Federal','ARG'),(375,'Distrito Federal','BRA'),(376,'Distrito Federal','MEX'),(377,'Distrito Federal','VEN'),(378,'Distrito Nacional','DOM'),(379,'Diyala','IRQ'),(380,'Diyarbakir','TUR'),(381,'Djibouti','DJI'),(382,'Dnipropetrovsk','UKR'),(383,'Dnjestria','MDA'),(384,'Dodoma','TZA'),(385,'Doha','QAT'),(386,'Dolj','ROM'),(387,'Dolnoslaskie','POL'),(388,'Donetsk','UKR'),(389,'Dong Nai','VNM'),(390,'Doukkala-Abda','MAR'),(391,'Drenthe','NLD'),(392,'Duarte','DOM'),(393,'Dubai','ARE'),(394,'Dunedin','NZL'),(395,'Durango','MEX'),(396,'East Azerbaidzan','IRN'),(397,'East Falkland','FLK'),(398,'East Flanderi','BEL'),(399,'East GÃ¶tanmaan lÃ¤n','SWE'),(400,'East Java','IDN'),(401,'East Kasai','COD'),(402,'East Kazakstan','KAZ'),(403,'Eastern','KEN'),(404,'Eastern','NPL'),(405,'Eastern Cape','ZAF'),(406,'Eastern Visayas','PHL'),(407,'Edirne','TUR'),(408,'Edo & Delta','NGA'),(409,'Ehime','JPN'),(410,'El Oro','ECU'),(411,'El-AaiÃºn','ESH'),(412,'ElÃ¢zig','TUR'),(413,'Emilia-Romagna','ITA'),(414,'England','GBR'),(415,'Entre Rios','ARG'),(416,'Equateur','COD'),(417,'Erzincan','TUR'),(418,'Erzurum','TUR'),(419,'Esfahan','IRN'),(420,'Eskisehir','TUR'),(421,'Esmeraldas','ECU'),(422,'EspÃ­rito Santo','BRA'),(423,'Estuaire','GAB'),(424,'ExtrÃªme-Nord','CMR'),(425,'Extremadura','ESP'),(426,'Fakaofo','TKL'),(427,'FalcÃ³n','VEN'),(428,'Fargona','UZB'),(429,'Fars','IRN'),(430,'FÃ¨s-Boulemane','MAR'),(431,'Federaatio','BIH'),(432,'Federal Capital Dist','NGA'),(433,'FejÃ©r','HUN'),(434,'Fianarantsoa','MDG'),(435,'Flevoland','NLD'),(436,'Florida','USA'),(437,'Formosa','ARG'),(438,'Fort-de-France','MTQ'),(439,'Franche-ComtÃ©','FRA'),(440,'Francistown','BWA'),(441,'Frederiksberg','DNK'),(442,'Free State','ZAF'),(443,'Friuli-Venezia Giuli','ITA'),(444,'Fujian','CHN'),(445,'Fukui','JPN'),(446,'Fukuoka','JPN'),(447,'Fukushima','JPN'),(448,'Funafuti','TUV'),(449,'Fyn','DNK'),(450,'GabÃ¨s','TUN'),(451,'Gaborone','BWA'),(452,'Galati','ROM'),(453,'Galicia','ESP'),(454,'Gansu','CHN'),(455,'Gauteng','ZAF'),(456,'Gaza','MOZ'),(457,'Gaza','PSE'),(458,'Gaziantep','TUR'),(459,'GÃ¤ncÃ¤','AZE'),(460,'GÃ¤vleborgs lÃ¤n','SWE'),(461,'Gelderland','NLD'),(462,'Geneve','CHE'),(463,'Georgetown','GUY'),(464,'Georgia','USA'),(465,'Gharb-Chrarda-BÃ©ni','MAR'),(466,'GhardaÃ¯a','DZA'),(467,'Gifu','JPN'),(468,'Gilan','IRN'),(469,'Giza','EGY'),(470,'GoiÃ¡s','BRA'),(471,'Golestan','IRN'),(472,'Gomel','BLR'),(473,'Gorj','ROM'),(474,'Grad Sofija','BGR'),(475,'Grad Zagreb','HRV'),(476,'Grand Cayman','CYM'),(477,'Grand Turk','TCA'),(478,'Grande-Terre','GLP'),(479,'Granma','CUB'),(480,'Greater Accra','GHA'),(481,'Grodno','BLR'),(482,'Groningen','NLD'),(483,'Guanajuato','MEX'),(484,'Guangdong','CHN'),(485,'Guangxi','CHN'),(486,'GuantÃ¡namo','CUB'),(487,'Guatemala','GTM'),(488,'Guayas','ECU'),(489,'Guaynabo','PRI'),(490,'GuÃ¡rico','VEN'),(491,'Guerrero','MEX'),(492,'Guizhou','CHN'),(493,'Gujarat','IND'),(494,'Gumma','JPN'),(495,'GyÃ¶r-Moson-Sopron','HUN'),(496,'Ha Darom','ISR'),(497,'Ha Merkaz','ISR'),(498,'Habarovsk','RUS'),(499,'Hadramawt','YEM'),(500,'Haifa','ISR'),(501,'Hail','SAU'),(502,'Hainan','CHN'),(503,'Hainaut','BEL'),(504,'Haiphong','VNM'),(505,'HajdÃº-Bihar','HUN'),(506,'Hakassia','RUS'),(507,'Hama','SYR'),(508,'Hamadan','IRN'),(509,'Hamburg','DEU'),(510,'Hamgyong N','PRK'),(511,'Hamgyong P','PRK'),(512,'Hamilton','BMU'),(513,'Hamilton','NZL'),(514,'Hanoi','VNM'),(515,'Hanti-Mansia','RUS'),(516,'Harare','ZWE'),(517,'Harjumaa','EST'),(518,'Harkova','UKR'),(519,'Haryana','IND'),(520,'Haskovo','BGR'),(521,'Hatay','TUR'),(522,'Haute-Normandie','FRA'),(523,'Haute-ZaÃ¯re','COD'),(524,'Hawaii','USA'),(525,'Hawalli','KWT'),(526,'HÃ¶fuÃ°borgarsvÃ¦Ã°i','ISL'),(527,'Hebei','CHN'),(528,'Hebron','PSE'),(529,'Heilongjiang','CHN'),(530,'Henan','CHN'),(531,'Herat','AFG'),(532,'Herson','UKR'),(533,'Hessen','DEU'),(534,'Hhohho','SWZ'),(535,'Hidalgo','MEX'),(536,'Hims','SYR'),(537,'Hiroshima','JPN'),(538,'HlavnÃ­ mesto Praha','CZE'),(539,'Hmelnytskyi','UKR'),(540,'Ho Chi Minh City','VNM'),(541,'Hodeida','YEM'),(542,'Hokkaido','JPN'),(543,'HolguÃ­n','CUB'),(544,'Home Island','CCK'),(545,'Hongkong','HKG'),(546,'Honiara','SLB'),(547,'Horad Minsk','BLR'),(548,'Hordaland','NOR'),(549,'Hormozgan','IRN'),(550,'Houet','BFA'),(551,'Hsinchu','TWN'),(552,'Hualien','TWN'),(553,'Huambo','AGO'),(554,'Huanuco','PER'),(555,'Hubei','CHN'),(556,'Huila','COL'),(557,'Hunan','CHN'),(558,'Hwanghae N','PRK'),(559,'Hwanghae P','PRK'),(560,'Hyogo','JPN'),(561,'Iasi','ROM'),(562,'IÃ§el','TUR'),(563,'Ibaragi','JPN'),(564,'Ibb','YEM'),(565,'Ica','PER'),(566,'Idaho','USA'),(567,'Idlib','SYR'),(568,'Ilam','IRN'),(569,'Ilan','TWN'),(570,'Illinois','USA'),(571,'Ilocos','PHL'),(572,'Imbabura','ECU'),(573,'Imereti','GEO'),(574,'Imo & Abia','NGA'),(575,'Inchon','KOR'),(576,'Indiana','USA'),(577,'Inhambane','MOZ'),(578,'Inner Harbour','MLT'),(579,'Inner Mongolia','CHN'),(580,'Iowa','USA'),(581,'Irbid','JOR'),(582,'Irbil','IRQ'),(583,'Irkutsk','RUS'),(584,'Irrawaddy\n [Ayeyarwa','MMR'),(585,'Irrawaddy [Ayeyarwad','MMR'),(586,'Ishikawa','JPN'),(587,'Islamabad','PAK'),(588,'Ismailia','EGY'),(589,'Isparta','TUR'),(590,'Istanbul','TUR'),(591,'Ivano-Frankivsk','UKR'),(592,'Ivanovo','RUS'),(593,'Iwate','JPN'),(594,'Izmir','TUR'),(595,'Jakarta Raya','IDN'),(596,'Jalisco','MEX'),(597,'Jambi','IDN'),(598,'Jammu and Kashmir','IND'),(599,'Jaroslavl','RUS'),(600,'JÃ¶nkÃ¶pings lÃ¤n','SWE'),(601,'Jersey','GBR'),(602,'Jerusalem','ISR'),(603,'Jharkhand','IND'),(604,'Jiangsu','CHN'),(605,'Jiangxi','CHN'),(606,'Jilin','CHN'),(607,'JiznÃ­ Cechy','CZE'),(608,'JiznÃ­ Morava','CZE'),(609,'Johor','MYS'),(610,'Jubbada Hoose','SOM'),(611,'Jujuy','ARG'),(612,'JunÃ­n','PER'),(613,'Kabardi-Balkaria','RUS'),(614,'Kabol','AFG'),(615,'Kadiogo','BFA'),(616,'Kaduna','NGA'),(617,'Kaesong-si','PRK'),(618,'Kafr al-Shaykh','EGY'),(619,'Kagawa','JPN'),(620,'Kagoshima','JPN'),(621,'Kahramanmaras','TUR'),(622,'Kairo','EGY'),(623,'Kairouan','TUN'),(624,'Kalimantan Barat','IDN'),(625,'Kalimantan Selatan','IDN'),(626,'Kalimantan Tengah','IDN'),(627,'Kalimantan Timur','IDN'),(628,'Kaliningrad','RUS'),(629,'Kalmykia','RUS'),(630,'Kaluga','RUS'),(631,'KamtÅ¡atka','RUS'),(632,'Kanagawa','JPN'),(633,'Kang-won','KOR'),(634,'Kangwon','PRK'),(635,'Kano & Jigawa','NGA'),(636,'Kansas','USA'),(637,'Kaohsiung','TWN'),(638,'Kaolack','SEN'),(639,'KarabÃ¼k','TUR'),(640,'Karakalpakistan','UZB'),(641,'Karaman','TUR'),(642,'KaratÅ¡ai-TÅ¡erkessi','RUS'),(643,'Karbala','IRQ'),(644,'Karjala','RUS'),(645,'Karnataka','IND'),(646,'Karotegin','TJK'),(647,'Kars','TUR'),(648,'Kassala','SDN'),(649,'Kastilia-La Mancha','ESP'),(650,'Katalonia','ESP'),(651,'Katsina','NGA'),(652,'Kaunas','LTU'),(653,'Kayseri','TUR'),(654,'KÃ¤rnten','AUT'),(655,'KÃ¸benhavn','DNK'),(656,'KÃ¼tahya','TUR'),(657,'Kedah','MYS'),(658,'Keelung','TWN'),(659,'Kelantan','MYS'),(660,'Kemerovo','RUS'),(661,'Kentucky','USA'),(662,'Kerala','IND'),(663,'Kerman','IRN'),(664,'Kermanshah','IRN'),(665,'Khan Yunis','PSE'),(666,'Khanh Hoa','VNM'),(667,'Khartum','SDN'),(668,'Khomas','NAM'),(669,'Khon Kaen','THA'),(670,'Khorasan','IRN'),(671,'Khorazm','UZB'),(672,'Khujand','TJK'),(673,'Khulna','BGD'),(674,'Khuzestan','IRN'),(675,'Kien Giang','VNM'),(676,'Kigali','RWA'),(677,'Kilimanjaro','TZA'),(678,'Kilis','TUR'),(679,'Kinshasa','COD'),(680,'Kiova','UKR'),(681,'Kirikkale','TUR'),(682,'Kirov','RUS'),(683,'Kirovograd','UKR'),(684,'Kitaa','GRL'),(685,'Klaipeda','LTU'),(686,'Kocaeli','TUR'),(687,'Kochi','JPN'),(688,'Kombo St Mary','GMB'),(689,'Komi','RUS'),(690,'Konya','TUR'),(691,'Kordestan','IRN'),(692,'Korhogo','CIV'),(693,'Koror','PLW'),(694,'Kosovo and Metohija','YUG'),(695,'Kostroma','RUS'),(696,'Kouilou','COG'),(697,'Kowloon and New Kowl','HKG'),(698,'Krasnodar','RUS'),(699,'Krasnojarsk','RUS'),(700,'Krim','UKR'),(701,'Kujawsko-Pomorskie','POL'),(702,'Kumamoto','JPN'),(703,'Kurdufan al-Shamaliy','SDN'),(704,'Kurgan','RUS'),(705,'Kursk','RUS'),(706,'Kvemo Kartli','GEO'),(707,'Kwangju','KOR'),(708,'Kwara & Kogi','NGA'),(709,'KwaZulu-Natal','ZAF'),(710,'Kyonggi','KOR'),(711,'Kyongsangbuk','KOR'),(712,'Kyongsangnam','KOR'),(713,'Kyoto','JPN'),(714,'La AraucanÃ­a','CHL'),(715,'La Guajira','COL'),(716,'La Habana','CUB'),(717,'La Libertad','PER'),(718,'La Libertad','SLV'),(719,'La Paz','BOL'),(720,'La Rioja','ARG'),(721,'La Rioja','ESP'),(722,'La Romana','DOM'),(723,'Lagos','NGA'),(724,'Lam Dong','VNM'),(725,'Lambayeque','PER'),(726,'Lampung','IDN'),(727,'Languedoc-Roussillon','FRA'),(728,'Lara','VEN'),(729,'Las Tunas','CUB'),(730,'Latakia','SYR'),(731,'Latium','ITA'),(732,'LÃ¤nsimaa','SJM'),(733,'LeÃ³n','NIC'),(734,'Lebap','TKM'),(735,'Leinster','IRL'),(736,'Liaoning','CHN'),(737,'LiÃ¨ge','BEL'),(738,'Liepaja','LVA'),(739,'Liguria','ITA'),(740,'Lilongwe','MWI'),(741,'Lima','PER'),(742,'Limassol','CYP'),(743,'Limburg','NLD'),(744,'Limousin','FRA'),(745,'Lipetsk','RUS'),(746,'Lisboa','PRT'),(747,'Lisboa','SWE'),(748,'Littoral','CMR'),(749,'Lodzkie','POL'),(750,'Logone Occidental','TCD'),(751,'Loja','ECU'),(752,'Lombardia','ITA'),(753,'Lorestan','IRN'),(754,'Loreto','PER'),(755,'Lori','ARM'),(756,'Lorraine','FRA'),(757,'Los Lagos','CHL'),(758,'Los RÃ­os','ECU'),(759,'Louisiana','USA'),(760,'Lovec','BGR'),(761,'Luanda','AGO'),(762,'Lubelskie','POL'),(763,'Lubuskie','POL'),(764,'Lugansk','UKR'),(765,'Lusaka','ZMB'),(766,'Luxembourg','LUX'),(767,'Luxor','EGY'),(768,'Lviv','UKR'),(769,'Maale','MDV'),(770,'Macau','MAC'),(771,'Madhya\n Pradesh','IND'),(772,'Madhya Pradesh','IND'),(773,'Madrid','ESP'),(774,'Maekel','ERI'),(775,'Magadan','RUS'),(776,'Magallanes','CHL'),(777,'Magdalena','COL'),(778,'Magwe [Magway]','MMR'),(779,'Mahajanga','MDG'),(780,'Maharashtra','IND'),(781,'MahÃ©','SYC'),(782,'Majuro','MHL'),(783,'Malatya','TUR'),(784,'Malopolskie','POL'),(785,'Mamoutzou','MYT'),(786,'ManabÃ­','ECU'),(787,'Managua','NIC'),(788,'Mandalay','MMR'),(789,'Mangghystau','KAZ'),(790,'Manica','MOZ'),(791,'Manicaland','ZWE'),(792,'Manipur','IND'),(793,'Manisa','TUR'),(794,'Manitoba','CAN'),(795,'Maputo','MOZ'),(796,'Maradi','NER'),(797,'Maramures','ROM'),(798,'MaranhÃ£o','BRA'),(799,'Marche','ITA'),(800,'Mardin','TUR'),(801,'Marinmaa','RUS'),(802,'Maritime','TGO'),(803,'Markazi','IRN'),(804,'Marrakech-Tensift-Al','MAR'),(805,'Mary','TKM'),(806,'Maryland','USA'),(807,'Masaya','NIC'),(808,'Maseru','LSO'),(809,'Masqat','OMN'),(810,'Massachusetts','USA'),(811,'Matanzas','CUB'),(812,'Mato Grosso','BRA'),(813,'Mato Grosso do Sul','BRA'),(814,'Maule','CHL'),(815,'MayagÃ¼ez','PRI'),(816,'Maysan','IRQ'),(817,'Mazandaran','IRN'),(818,'Mazowieckie','POL'),(819,'MÃ©rida','VEN'),(820,'MÃ©xico','MEX'),(821,'Mbeya','TZA'),(822,'Mecklenburg-Vorpomme','DEU'),(823,'Medina','SAU'),(824,'Meghalaya','IND'),(825,'Mehedinti','ROM'),(826,'Mekka','SAU'),(827,'MeknÃ¨s-Tafilalet','MAR'),(828,'Mendoza','ARG'),(829,'Meta','COL'),(830,'Miaoli','TWN'),(831,'Michigan','USA'),(832,'MichoacÃ¡n de Ocampo','MEX'),(833,'Midi-PyrÃ©nÃ©es','FRA'),(834,'Midlands','ZWE'),(835,'Mie','JPN'),(836,'Minas Gerais','BRA'),(837,'MingÃ¤Ã§evir','AZE'),(838,'Minnesota','USA'),(839,'Minsk','BLR'),(840,'Miranda','VEN'),(841,'Misiones','ARG'),(842,'Misrata','LBY'),(843,'Mississippi','USA'),(844,'Missouri','USA'),(845,'Miyagi','JPN'),(846,'Miyazaki','JPN'),(847,'Mizoram','IND'),(848,'Mogiljov','BLR'),(849,'Molukit','IDN'),(850,'Mon','MMR'),(851,'Monagas','VEN'),(852,'Montana','USA'),(853,'Montenegro','YUG'),(854,'Montevideo','URY'),(855,'Montserrado','LBR'),(856,'Mordva','RUS'),(857,'Morelos','MEX'),(858,'Morogoro','TZA'),(859,'Moscow (City)','RUS'),(860,'Moskova','RUS'),(861,'Mostaganem','DZA'),(862,'Mpumalanga','ZAF'),(863,'Munster','IRL'),(864,'Murcia','ESP'),(865,'Mures','ROM'),(866,'Murmansk','RUS'),(867,'Mwanza','TZA'),(868,'Mykolajiv','UKR'),(869,'Nablus','PSE'),(870,'Nagano','JPN'),(871,'Nagasaki','JPN'),(872,'Nairobi','KEN'),(873,'Najran','SAU'),(874,'Nakhon Pathom','THA'),(875,'Nakhon Ratchasima','THA'),(876,'Nakhon Sawan','THA'),(877,'Nam Ha','VNM'),(878,'Namangan','UZB'),(879,'Namibe','AGO'),(880,'Nampo-si','PRK'),(881,'Nampula','MOZ'),(882,'Namur','BEL'),(883,'Nantou','TWN'),(884,'Nara','JPN'),(885,'Narino','COL'),(886,'National Capital Dis','PNG'),(887,'National Capital Reg','PHL'),(888,'Navarra','ESP'),(889,'Navoi','UZB'),(890,'Nayarit','MEX'),(891,'Neamt','ROM'),(892,'Nebraska','USA'),(893,'Negeri\n Sembilan','MYS'),(894,'NeuquÃ©n','ARG'),(895,'Nevada','USA'),(896,'New Hampshire','USA'),(897,'New Jersey','USA'),(898,'New Mexico','USA'),(899,'New Providence','BHS'),(900,'New South Wales','AUS'),(901,'New York','USA'),(902,'Newfoundland','CAN'),(903,'Newmaa','FIN'),(904,'Nghe An','VNM'),(905,'Niamey','NER'),(906,'Nicosia','CYP'),(907,'Niedersachsen','DEU'),(908,'Niger','NGA'),(909,'Niigata','JPN'),(910,'Ninawa','IRQ'),(911,'Ningxia','CHN'),(912,'Nizni Novgorod','RUS'),(913,'Njazidja','COM'),(914,'Nonthaburi','THA'),(915,'Noord-Brabant','NLD'),(916,'Noord-Holland','NLD'),(917,'Nord','CMR'),(918,'Nord','HTI'),(919,'Nord-Ouest','CMR'),(920,'Nord-Pas-de-Calais','FRA'),(921,'Nordjylland','DNK'),(922,'Nordrhein-Westfalen','DEU'),(923,'Norte de Santander','COL'),(924,'North\n Carolina','USA'),(925,'North Austria','AUT'),(926,'North Carolina','USA'),(927,'North Gaza','PSE'),(928,'North Ireland','GBR'),(929,'North Kazakstan','KAZ'),(930,'North Kivu','COD'),(931,'North Ossetia-Alania','RUS'),(932,'North West','ZAF'),(933,'Northern','GHA'),(934,'Northern','LKA'),(935,'Northern Cape','ZAF'),(936,'Northern Mindanao','PHL'),(937,'Nothwest Border Prov','PAK'),(938,'Nouakchott','MRT'),(939,'Nova Scotia','CAN'),(940,'Novgorod','RUS'),(941,'Novosibirsk','RUS'),(942,'Nuevo LeÃ³n','MEX'),(943,'Nusa Tenggara Barat','IDN'),(944,'Nusa Tenggara Timur','IDN'),(945,'Nyanza','KEN'),(946,'Oaxaca','MEX'),(947,'OÂ´Higgins','CHL'),(948,'Odesa','UKR'),(949,'Ogun','NGA'),(950,'Ohio','USA'),(951,'Oita','JPN'),(952,'Okayama','JPN'),(953,'Okinawa','JPN'),(954,'Oklahoma','USA'),(955,'Omsk','RUS'),(956,'Ondo & Ekiti','NGA'),(957,'Ontario','CAN'),(958,'Opolskie','POL'),(959,'Oran','DZA'),(960,'Ordu','TUR'),(961,'Oregon','USA'),(962,'Orenburg','RUS'),(963,'Oriental','MAR'),(964,'Orissa','IND'),(965,'Orjol','RUS'),(966,'Oromia','ETH'),(967,'Oruro','BOL'),(968,'Osaka','JPN'),(969,'Osh','KGZ'),(970,'Osijek-Baranja','HRV'),(971,'Oslo','NOR'),(972,'Osmaniye','TUR'),(973,'Osrednjeslovenska','SVN'),(974,'OuÃ©mÃ©','BEN'),(975,'Ouest','CMR'),(976,'Ouest','HTI'),(977,'Outer Harbour','MLT'),(978,'Overijssel','NLD'),(979,'Oyo & Osun','NGA'),(980,'Pahang','MYS'),(981,'PanamÃ¡','PAN'),(982,'Panevezys','LTU'),(983,'ParaÃ­ba','BRA'),(984,'Paramaribo','SUR'),(985,'ParanÃ¡','BRA'),(986,'ParÃ¡','BRA'),(987,'Pavlodar','KAZ'),(988,'Pays de la Loire','FRA'),(989,'PÃ¤ijÃ¤t-HÃ¤me','FIN'),(990,'Pegu [Bago]','MMR'),(991,'Peking','CHN'),(992,'Pennsylvania','USA'),(993,'Penza','RUS'),(994,'Perak','MYS'),(995,'Perm','RUS'),(996,'Pernambuco','BRA'),(997,'Phnom Penh','KHM'),(998,'PiauÃ­','BRA'),(999,'Picardie','FRA'),(1000,'Pichincha','ECU'),(1001,'Piemonte','ITA'),(1002,'Pietari','RUS'),(1003,'Pihkova','RUS'),(1004,'Pinar del RÃ­o','CUB'),(1005,'Pingtung','TWN'),(1006,'Pirkanmaa','FIN'),(1007,'Piura','PER'),(1008,'Plaines Wilhelms','MUS'),(1009,'Plateau & Nassarawa','NGA'),(1010,'Plovdiv','BGR'),(1011,'Plymouth','MSR'),(1012,'Podkarpackie','POL'),(1013,'Podlaskie','POL'),(1014,'Podravska','SVN'),(1015,'Pohjois-Pohjanmaa','FIN'),(1016,'Pohnpei','FSM'),(1017,'Pomorskie','POL'),(1018,'Ponce','PRI'),(1019,'Pondicherry','IND'),(1020,'Port Said','EGY'),(1021,'Port-Louis','MUS'),(1022,'Port-of-Spain','TTO'),(1023,'Porto','PRT'),(1024,'Portuguesa','VEN'),(1025,'PotosÃ­','BOL'),(1026,'Prahova','ROM'),(1027,'Primorje','RUS'),(1028,'Primorje-Gorski Kota','HRV'),(1029,'Provence-Alpes-CÃ´te','FRA'),(1030,'Puebla','MEX'),(1031,'Puerto Plata','DOM'),(1032,'Pulau Pinang','MYS'),(1033,'Pultava','UKR'),(1034,'Punjab','IND'),(1035,'Punjab','PAK'),(1036,'Puno','PER'),(1037,'Pusan','KOR'),(1038,'Pyongan N','PRK'),(1039,'Pyongan P','PRK'),(1040,'Pyongyang-si','PRK'),(1041,'Qandahar','AFG'),(1042,'Qaraghandy','KAZ'),(1043,'Qashqadaryo','UZB'),(1044,'Qasim','SAU'),(1045,'Qazvin','IRN'),(1046,'Qina','EGY'),(1047,'Qinghai','CHN'),(1048,'Qom','IRN'),(1049,'Qostanay','KAZ'),(1050,'Quang Binh','VNM'),(1051,'Quang Nam-Da Nang','VNM'),(1052,'Quang Ninh','VNM'),(1053,'QuÃ©bec','CAN'),(1054,'Queensland','AUS'),(1055,'QuerÃ©taro','MEX'),(1056,'QuerÃ©taro de Arteag','MEX'),(1057,'Quetzaltenango','GTM'),(1058,'Quindio','COL'),(1059,'Quintana Roo','MEX'),(1060,'Qyzylorda','KAZ'),(1061,'Rabat-SalÃ©-Zammour-','MAR'),(1062,'Rafah','PSE'),(1063,'Rajasthan','IND'),(1064,'Rajshahi','BGD'),(1065,'Rakhine','MMR'),(1066,'Rangoon [Yangon]','MMR'),(1067,'Rarotonga','COK'),(1068,'Republika Srpska','BIH'),(1069,'RhÃ´ne-Alpes','FRA'),(1070,'Rheinland-Pfalz','DEU'),(1071,'Rhode Island','USA'),(1072,'Riad','SAU'),(1073,'Riau','IDN'),(1074,'Rift Valley','KEN'),(1075,'Riika','LVA'),(1076,'Rio de Janeiro','BRA'),(1077,'Rio Grande do Norte','BRA'),(1078,'Rio Grande do Sul','BRA'),(1079,'Risaralda','COL'),(1080,'Rivers & Bayelsa','NGA'),(1081,'Rivne','UKR'),(1082,'Riyadh','SAU'),(1083,'Rjazan','RUS'),(1084,'Rogaland','NOR'),(1085,'RondÃ´nia','BRA'),(1086,'Roraima','BRA'),(1087,'Rostov-na-Donu','RUS'),(1088,'Ruse','BGR'),(1089,'Saarland','DEU'),(1090,'Sabah','MYS'),(1091,'Saga','JPN'),(1092,'Sagaing','MMR'),(1093,'Saha (Jakutia)','RUS'),(1094,'Sahalin','RUS'),(1095,'Saint GeorgeÂ´s','BMU'),(1096,'Saint Helena','SHN'),(1097,'Saint-Denis','REU'),(1098,'Saint-Louis','SEN'),(1099,'Saint-Pierre','SPM'),(1100,'Saipan','MNP'),(1101,'Saitama','JPN'),(1102,'Sakarya','TUR'),(1103,'Saksi','DEU'),(1104,'Salta','ARG'),(1105,'Salzburg','AUT'),(1106,'Samara','RUS'),(1107,'Samarkand','UZB'),(1108,'Samsun','TUR'),(1109,'San JosÃ©','CRI'),(1110,'San Juan','ARG'),(1111,'San Juan','PRI'),(1112,'San Luis','ARG'),(1113,'San Luis PotosÃ­','MEX'),(1114,'San Marino','SMR'),(1115,'San Miguel','SLV'),(1116,'San Miguelito','PAN'),(1117,'San Pedro de MacorÃ­','DOM'),(1118,'San Salvador','SLV'),(1119,'Sanaa','YEM'),(1120,'Sancti-SpÃ­ritus','CUB'),(1121,'Sanliurfa','TUR'),(1122,'Santa Ana','SLV'),(1123,'Santa Catarina','BRA'),(1124,'Santa Cruz','BOL'),(1125,'Santa FÃ©','ARG'),(1126,'Santafe de Bogota','COL'),(1127,'Santander','COL'),(1128,'Santiago','CHL'),(1129,'Santiago','DOM'),(1130,'Santiago de Cuba','CUB'),(1131,'Santiago del Estero','ARG'),(1132,'Saratov','RUS'),(1133,'Sarawak','MYS'),(1134,'Sardinia','ITA'),(1135,'Saskatchewan','CAN'),(1136,'Satu Mare','ROM'),(1137,'Savannakhet','LAO'),(1138,'Sawhaj','EGY'),(1139,'SÃ£o Paulo','BRA'),(1140,'SÃ£o Tiago','CPV'),(1141,'SÃ©tif','DZA'),(1142,'SÃ¸r-TrÃ¸ndelag','NOR'),(1143,'Schaan','LIE'),(1144,'Schleswig-Holstein','DEU'),(1145,'Scotland','GBR'),(1146,'Selangor','MYS'),(1147,'Semnan','IRN'),(1148,'Seoul','KOR'),(1149,'Sergipe','BRA'),(1150,'Serravalle/Dogano','SMR'),(1151,'SevernÃ­ Cechy','CZE'),(1152,'SevernÃ­ Morava','CZE'),(1153,'Sfax','TUN'),(1154,'Shaanxi','CHN'),(1155,'Shaba','COD'),(1156,'Shamal Sina','EGY'),(1157,'Shan','MMR'),(1158,'Shandong','CHN'),(1159,'Shanghai','CHN'),(1160,'Shanxi','CHN'),(1161,'Sharja','ARE'),(1162,'Shefa','VUT'),(1163,'Shiga','JPN'),(1164,'Shimane','JPN'),(1165,'Shizuoka','JPN'),(1166,'Sibiu','ROM'),(1167,'Sichuan','CHN'),(1168,'Sidi Bel AbbÃ¨s','DZA'),(1169,'Siem Reap','KHM'),(1170,'Siirt','TUR'),(1171,'Sinaloa','MEX'),(1172,'Sind','PAK'),(1173,'Sindh','PAK'),(1174,'Sisilia','ITA'),(1175,'Sistan va Baluchesta','IRN'),(1176,'Sivas','TUR'),(1177,'SkÃ¥ne lÃ¤n','SWE'),(1178,'Skikda','DZA'),(1179,'Skopje','MKD'),(1180,'Slaskie','POL'),(1181,'Smolensk','RUS'),(1182,'Sofala','MOZ'),(1183,'Sokoto & Kebbi & Zam','NGA'),(1184,'Songkhla','THA'),(1185,'Sonora','MEX'),(1186,'Souss Massa-DraÃ¢','MAR'),(1187,'Sousse','TUN'),(1188,'South Australia','AUS'),(1189,'South Carolina','USA'),(1190,'South Dakota','USA'),(1191,'South Kazakstan','KAZ'),(1192,'South Kivu','COD'),(1193,'South Tarawa','KIR'),(1194,'Southern Mindanao','PHL'),(1195,'Southern Tagalog','PHL'),(1196,'Split-Dalmatia','HRV'),(1197,'St George','DMA'),(1198,'St George','GRD'),(1199,'St George','VCT'),(1200,'St George Basseterre','KNA'),(1201,'St John','ATG'),(1202,'St Michael','BRB'),(1203,'St Thomas','VIR'),(1204,'St. Andrew','JAM'),(1205,'St. Catherine','JAM'),(1206,'Stavropol','RUS'),(1207,'Steiermark','AUT'),(1208,'Streymoyar','FRO'),(1209,'Suceava','ROM'),(1210,'Sucre','COL'),(1211,'Sucre','VEN'),(1212,'Suez','EGY'),(1213,'Sulawesi Selatan','IDN'),(1214,'Sulawesi Tengah','IDN'),(1215,'Sulawesi Tenggara','IDN'),(1216,'Sulawesi Utara','IDN'),(1217,'Sumatera Barat','IDN'),(1218,'Sumatera Selatan','IDN'),(1219,'Sumatera Utara','IDN'),(1220,'Sumqayit','AZE'),(1221,'Sumy','UKR'),(1222,'Surkhondaryo','UZB'),(1223,'Sverdlovsk','RUS'),(1224,'Swietokrzyskie','POL'),(1225,'Sylhet','BGD'),(1226,'Szabolcs-SzatmÃ¡r-Be','HUN'),(1227,'Tabasco','MEX'),(1228,'Tabora','TZA'),(1229,'Tabuk','SAU'),(1230,'Tacna','PER'),(1231,'Tadla-Azilal','MAR'),(1232,'Taegu','KOR'),(1233,'Taejon','KOR'),(1234,'Tahiti','PYF'),(1235,'Taichung','TWN'),(1236,'Tainan','TWN'),(1237,'Taipei','TWN'),(1238,'Taitung','TWN'),(1239,'Taizz','YEM'),(1240,'Taka-Karpatia','UKR'),(1241,'Tamaulipas','MEX'),(1242,'Tambov','RUS'),(1243,'Tamil\n Nadu','IND'),(1244,'Tamil Nadu','IND'),(1245,'Tanga','TZA'),(1246,'Tanger-TÃ©touan','MAR'),(1247,'Taoyuan','TWN'),(1248,'TarapacÃ¡','CHL'),(1249,'Taraz','KAZ'),(1250,'Tarija','BOL'),(1251,'Tartumaa','EST'),(1252,'Tasmania','AUS'),(1253,'Tatarstan','RUS'),(1254,'Taza-Al Hoceima-Taou','MAR'),(1255,'TÃ¡chira','VEN'),(1256,'TÃ©bessa','DZA'),(1257,'Tbilisi','GEO'),(1258,'Teheran','IRN'),(1259,'Tekirdag','TUR'),(1260,'Tel Aviv','ISR'),(1261,'Tenasserim [Tanintha','MMR'),(1262,'Tennessee','USA'),(1263,'Terengganu','MYS'),(1264,'Ternopil','UKR'),(1265,'Tete','MOZ'),(1266,'Texas','USA'),(1267,'ThÃ¼ringen','DEU'),(1268,'Thessalia','GRC'),(1269,'ThiÃ¨s','SEN'),(1270,'Thimphu','BTN'),(1271,'Thua Thien-Hue','VNM'),(1272,'Tianjin','CHN'),(1273,'Tiaret','DZA'),(1274,'Tibet','CHN'),(1275,'Tien Giang','VNM'),(1276,'Tigray','ETH'),(1277,'Timis','ROM'),(1278,'Tirana','ALB'),(1279,'Tiroli','AUT'),(1280,'Tjumen','RUS'),(1281,'Tlemcen','DZA'),(1282,'Toa Baja','PRI'),(1283,'Toamasina','MDG'),(1284,'Tocantins','BRA'),(1285,'Tochigi','JPN'),(1286,'Tokat','TUR'),(1287,'Tokushima','JPN'),(1288,'Tokyo-to','JPN'),(1289,'Tolima','COL'),(1290,'Tomsk','RUS'),(1291,'Tongatapu','TON'),(1292,'Tortola','VGB'),(1293,'Toscana','ITA'),(1294,'Toskent','UZB'),(1295,'Toskent Shahri','UZB'),(1296,'Tottori','JPN'),(1297,'Toyama','JPN'),(1298,'Trabzon','TUR'),(1299,'Trentino-Alto Adige','ITA'),(1300,'Tripoli','LBY'),(1301,'Tripura','IND'),(1302,'Trujillo','VEN'),(1303,'TucumÃ¡n','ARG'),(1304,'Tula','RUS'),(1305,'Tulcea','ROM'),(1306,'Tungurahua','ECU'),(1307,'Tunis','TUN'),(1308,'Tutuila','ASM'),(1309,'Tver','RUS'),(1310,'Tyva','RUS'),(1311,'TÅ¡eljabinsk','RUS'),(1312,'TÅ¡erkasy','UKR'),(1313,'TÅ¡ernigiv','UKR'),(1314,'TÅ¡ernivtsi','UKR'),(1315,'TÅ¡etÅ¡enia','RUS'),(1316,'TÅ¡ita','RUS'),(1317,'TÅ¡uvassia','RUS'),(1318,'Ubon Ratchathani','THA'),(1319,'Ucayali','PER'),(1320,'Udmurtia','RUS'),(1321,'Udon Thani','THA'),(1322,'Ulaanbaatar','MNG'),(1323,'Uljanovsk','RUS'),(1324,'Umbria','ITA'),(1325,'Upolu','WSM'),(1326,'Uppsala lÃ¤n','SWE'),(1327,'Usak','TUR'),(1328,'Utah','USA'),(1329,'Utrecht','NLD'),(1330,'Uttar Pradesh','IND'),(1331,'Uttaranchal','IND'),(1332,'Vaduz','LIE'),(1333,'Valencia','ESP'),(1334,'Valle','COL'),(1335,'ValparaÃ­so','CHL'),(1336,'Van','TUR'),(1337,'Varna','BGR'),(1338,'Varsinais-Suomi','FIN'),(1339,'Vaud','CHE'),(1340,'VÃ¢lcea','ROM'),(1341,'VÃ¤sterbottens lÃ¤n','SWE'),(1342,'VÃ¤sternorrlands lÃ¤','SWE'),(1343,'VÃ¤stmanlands lÃ¤n','SWE'),(1344,'VÃ½chodnÃ© Slovensko','SVK'),(1345,'VÃ½chodnÃ­ Cechy','CZE'),(1346,'Veneto','ITA'),(1347,'Veracruz','MEX'),(1348,'Veracruz-Llave','MEX'),(1349,'Viangchan','LAO'),(1350,'Victoria','AUS'),(1351,'Villa Clara','CUB'),(1352,'Vilna','LTU'),(1353,'Vinnytsja','UKR'),(1354,'Virginia','USA'),(1355,'Vitebsk','BLR'),(1356,'Vladimir','RUS'),(1357,'Vojvodina','YUG'),(1358,'Volgograd','RUS'),(1359,'Vologda','RUS'),(1360,'Volynia','UKR'),(1361,'Voronez','RUS'),(1362,'Vrancea','ROM'),(1363,'Wakayama','JPN'),(1364,'Wales','GBR'),(1365,'Wallis','WLF'),(1366,'Warminsko-Mazurskie','POL'),(1367,'Washington','USA'),(1368,'Wasit','IRQ'),(1369,'Wellington','NZL'),(1370,'West Australia','AUS'),(1371,'West Azerbaidzan','IRN'),(1372,'West Bengali','IND'),(1373,'West Flanderi','BEL'),(1374,'West GÃ¶tanmaan lÃ¤n','SWE'),(1375,'West Greece','GRC'),(1376,'West Irian','IDN'),(1377,'West Island','CCK'),(1378,'West Java','IDN'),(1379,'West Kasai','COD'),(1380,'West Kazakstan','KAZ'),(1381,'Western','GHA'),(1382,'Western','LKA'),(1383,'Western','NPL'),(1384,'Western','SLE'),(1385,'Western Cape','ZAF'),(1386,'Western Mindanao','PHL'),(1387,'Western Visayas','PHL'),(1388,'Wielkopolskie','POL'),(1389,'Wien','AUT'),(1390,'Wilayah Persekutuan','MYS'),(1391,'Wisconsin','USA'),(1392,'Woqooyi Galbeed','SOM'),(1393,'Xinxiang','CHN'),(1394,'Yamagata','JPN'),(1395,'Yamaguchi','JPN'),(1396,'Yamalin Nenetsia','RUS'),(1397,'Yamanashi','JPN'),(1398,'Yamoussoukro','CIV'),(1399,'Yanggang','PRK'),(1400,'Yaracuy','VEN'),(1401,'Yazd','IRN'),(1402,'YÃ¼nlin','TWN'),(1403,'Yerevan','ARM'),(1404,'Yogyakarta','IDN'),(1405,'YucatÃ¡n','MEX'),(1406,'Yunnan','CHN'),(1407,'Zacatecas','MEX'),(1408,'Zachodnio-Pomorskie','POL'),(1409,'ZambÃ©zia','MOZ'),(1410,'Zanjan','IRN'),(1411,'Zanzibar West','TZA'),(1412,'ZapadnÃ­ Cechy','CZE'),(1413,'Zaporizzja','UKR'),(1414,'ZÃ¼rich','CHE'),(1415,'Zhejiang','CHN'),(1416,'Ziguinchor','SEN'),(1417,'Zinder','NER'),(1418,'Zonguldak','TUR'),(1419,'Zufar','OMN'),(1420,'Zuid-Holland','NLD'),(1421,'Zulia','VEN'),(1422,'Zytomyr','UKR'),(1423,'Å iauliai','LTU'),(1424,'Å irak','ARM'),(1426,'N/A APLICA','AAA');
/*!40000 ALTER TABLE `estate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `estilo_usuario`
--

DROP TABLE IF EXISTS `estilo_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `estilo_usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `bg_color` varchar(100) NOT NULL,
  `btn_1_color` varchar(30) NOT NULL,
  `btn_2_color` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `estilo_usuario`
--

LOCK TABLES `estilo_usuario` WRITE;
/*!40000 ALTER TABLE `estilo_usuario` DISABLE KEYS */;
INSERT INTO `estilo_usuario` VALUES (1,1,'#03b4db','#7e7e7e','#2c3640'),(2,2,'#00b4dc','#16222d','#555555');
/*!40000 ALTER TABLE `estilo_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `evento`
--

DROP TABLE IF EXISTS `evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `evento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `id_color` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `inicio` datetime NOT NULL,
  `fin` datetime NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `costo` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `latitud` varchar(12) NOT NULL,
  `longitud` varchar(12) NOT NULL,
  `observaciones` varchar(200) NOT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  `url` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `evento`
--

LOCK TABLES `evento` WRITE;
/*!40000 ALTER TABLE `evento` DISABLE KEYS */;
/*!40000 ALTER TABLE `evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `factura`
--

DROP TABLE IF EXISTS `factura`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `factura` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_pais` varchar(3) NOT NULL,
  `cp` varchar(5) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `municipio` varchar(50) NOT NULL,
  `colonia` varchar(50) NOT NULL,
  `calle` varchar(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `rfc` varchar(50) NOT NULL,
  `compania` varchar(50) DEFAULT NULL,
  `celular` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `factura`
--

LOCK TABLES `factura` WRITE;
/*!40000 ALTER TABLE `factura` DISABLE KEYS */;
INSERT INTO `factura` VALUES (1,'COL','sadas','','','','','Administrador','Oficina Virtual','admin@miempresa.com','1069740663','','-Numero Fijo[]\n-Numero Móvil[]\n'),(6,'COL','sadas','','','','','Administrador','Oficina Virtual','admin@miempresa.com','1069740663','','-Numero Fijo[]\n-Numero Móvil[]\n'),(12,'COL','sadas','','','','','Administrador','Oficina Virtual','admin@miempresa.com','1069740663','','-Numero Fijo[]\n-Numero Móvil[]\n');
/*!40000 ALTER TABLE `factura` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informacion`
--

DROP TABLE IF EXISTS `informacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `informacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(1000) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `img` varchar(100) NOT NULL,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informacion`
--

LOCK TABLES `informacion` WRITE;
/*!40000 ALTER TABLE `informacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `informacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario`
--

DROP TABLE IF EXISTS `inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario` (
  `id_inventario` int(11) NOT NULL AUTO_INCREMENT,
  `id_almacen` int(11) NOT NULL,
  `id_mercancia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `bloqueados` int(11) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_inventario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario`
--

LOCK TABLES `inventario` WRITE;
/*!40000 ALTER TABLE `inventario` DISABLE KEYS */;
INSERT INTO `inventario` VALUES (1,1,1,100,0,'ACT'),(2,2,2,140,0,'ACT'),(3,1,2,120,0,'ACT'),(4,2,1,119,0,'ACT'),(5,3,1,109,0,'ACT'),(6,4,1,110,0,'ACT'),(7,3,2,130,0,'ACT'),(8,4,2,130,0,'ACT');
/*!40000 ALTER TABLE `inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inventario_historial`
--

DROP TABLE IF EXISTS `inventario_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inventario_historial` (
  `id_inventario_historial` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_origen` int(11) DEFAULT NULL,
  `otro_origen` text,
  `id_destino` int(11) DEFAULT NULL,
  `id_documento` int(11) DEFAULT NULL,
  `cantidad` varchar(45) DEFAULT NULL,
  `id_inventario` varchar(45) DEFAULT NULL,
  `id_mercancia` int(11) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `n_documento` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_inventario_historial`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inventario_historial`
--

LOCK TABLES `inventario_historial` WRITE;
/*!40000 ALTER TABLE `inventario_historial` DISABLE KEYS */;
INSERT INTO `inventario_historial` VALUES (1,'2016-09-28 20:49:12',1,'0',1,2,'100','1',1,'E','365786987'),(2,'2016-09-28 21:31:02',1,'0',2,2,'120','2',2,'E','68753645'),(3,'2016-09-28 23:13:07',2,'Administrador Oficina Virtual\nColombia    ',0,9,'1','4',1,'S','1V20160928');
/*!40000 ALTER TABLE `inventario_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `items`
--

DROP TABLE IF EXISTS `items`;
/*!50001 DROP VIEW IF EXISTS `items`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE VIEW `items` AS SELECT 
 1 AS `id`,
 1 AS `sku`,
 1 AS `puntos_comisionables`,
 1 AS `item`,
 1 AS `categoria`,
 1 AS `red`,
 1 AS `id_tipo_mercancia`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `login_attempts`
--

DROP TABLE IF EXISTS `login_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `login` varchar(50) COLLATE utf8_bin NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login_attempts`
--

LOCK TABLES `login_attempts` WRITE;
/*!40000 ALTER TABLE `login_attempts` DISABLE KEYS */;
/*!40000 ALTER TABLE `login_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mails`
--

DROP TABLE IF EXISTS `mails`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_emails` int(11) DEFAULT '1',
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mails`
--

LOCK TABLES `mails` WRITE;
/*!40000 ALTER TABLE `mails` DISABLE KEYS */;
INSERT INTO `mails` VALUES (1,2,'AFILIACION'),(2,2,'ACTIVACION'),(3,2,'CAMBIO EMAIL'),(4,1,'COBROS'),(5,1,'CUENTAS COBRAR'),(6,2,'RECUPERA CONTRASENA'),(7,2,'NUEVA CONTRASENA'),(8,2,'INVITACION'),(9,2,'AUTORESPONDER'),(10,1,'TRANSACCION EMPRESA');
/*!40000 ALTER TABLE `mails` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membresia`
--

DROP TABLE IF EXISTS `membresia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `membresia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `caducidad` varchar(3) NOT NULL,
  `descripcion` text NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membresia`
--

LOCK TABLES `membresia` WRITE;
/*!40000 ALTER TABLE `membresia` DISABLE KEYS */;
/*!40000 ALTER TABLE `membresia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mensaje`
--

DROP TABLE IF EXISTS `mensaje`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mensaje` (
  `id_mensaje` int(11) NOT NULL AUTO_INCREMENT,
  `enviado` int(11) NOT NULL,
  `id_estatus_msg` int(11) NOT NULL,
  `recibido` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_mensaje`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mensaje`
--

LOCK TABLES `mensaje` WRITE;
/*!40000 ALTER TABLE `mensaje` DISABLE KEYS */;
/*!40000 ALTER TABLE `mensaje` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mercancia`
--

DROP TABLE IF EXISTS `mercancia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mercancia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sku` int(11) NOT NULL,
  `sku_2` varchar(20) NOT NULL,
  `id_tipo_mercancia` int(11) NOT NULL,
  `pais` varchar(3) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `real` decimal(10,2) NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `costo_publico` decimal(10,2) NOT NULL,
  `entrega` varchar(3) NOT NULL,
  `puntos_comisionables` decimal(10,2) NOT NULL,
  `iva` varchar(3) NOT NULL DEFAULT 'CON',
  `descuento` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mercancia`
--

LOCK TABLES `mercancia` WRITE;
/*!40000 ALTER TABLE `mercancia` DISABLE KEYS */;
INSERT INTO `mercancia` VALUES (1,1,'ban11',1,'COL','2016-09-28 17:27:48','ACT',1,100.00,100.00,150.00,'1',10.00,'MAS',0.00),(2,2,'mem21',1,'COL','2016-09-28 17:31:35','ACT',1,120.00,120.00,170.00,'3',12.00,'MAS',0.00);
/*!40000 ALTER TABLE `mercancia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento`
--

DROP TABLE IF EXISTS `movimiento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento` (
  `id_movimiento` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `entrada` int(11) NOT NULL,
  `keyword` varchar(10) NOT NULL,
  `origen` varchar(100) NOT NULL,
  `destino` varchar(100) NOT NULL,
  `id_mercancia` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_impuesto` int(11) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `importe` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_estatus` int(11) NOT NULL,
  PRIMARY KEY (`id_movimiento`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento`
--

LOCK TABLES `movimiento` WRITE;
/*!40000 ALTER TABLE `movimiento` DISABLE KEYS */;
INSERT INTO `movimiento` VALUES (1,2,0,'1Vadm','supercundi','admin',1,1,1,0.00,0.00,0.00,'2016-09-28 23:03:03',1);
/*!40000 ALTER TABLE `movimiento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `movimiento_inventario`
--

DROP TABLE IF EXISTS `movimiento_inventario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `movimiento_inventario` (
  `id_doc` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `estatus` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id_doc`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `movimiento_inventario`
--

LOCK TABLES `movimiento_inventario` WRITE;
/*!40000 ALTER TABLE `movimiento_inventario` DISABLE KEYS */;
INSERT INTO `movimiento_inventario` VALUES (1,'Factura','ACT'),(2,'Remisión','ACT'),(3,'Consignación','ACT'),(4,'Traspaso Interno','ACT'),(5,'Traspaso Externo','ACT');
/*!40000 ALTER TABLE `movimiento_inventario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `noticia`
--

DROP TABLE IF EXISTS `noticia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `contenido` text NOT NULL,
  `imagen` varchar(1000) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(3) NOT NULL,
  `id_grupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `noticia`
--

LOCK TABLES `noticia` WRITE;
/*!40000 ALTER TABLE `noticia` DISABLE KEYS */;
/*!40000 ALTER TABLE `noticia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notificacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `nombre` varchar(45) NOT NULL DEFAULT 'AVISO GENERAL',
  `descripcion` varchar(255) NOT NULL DEFAULT 'Hola, Bienvenido',
  `link` varchar(255) DEFAULT '/',
  `estatus` varchar(3) DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notificacion`
--

LOCK TABLES `notificacion` WRITE;
/*!40000 ALTER TABLE `notificacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `notificacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_online_proceso`
--

DROP TABLE IF EXISTS `pago_online_proceso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_online_proceso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `contenido_carrito` text NOT NULL,
  `carrito` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_online_proceso`
--

LOCK TABLES `pago_online_proceso` WRITE;
/*!40000 ALTER TABLE `pago_online_proceso` DISABLE KEYS */;
INSERT INTO `pago_online_proceso` VALUES (1,2,'{\"compras\":[{\"imagen\":\"\\/media\\/carrito\\/Membrete1.png\",\"nombre\":\"banner\",\"puntos\":\"10.00\",\"descripcion\":\"\",\"costos\":[{\"id\":\"1\",\"costo\":\"100.00\",\"costo_publico\":\"150.00\",\"iva\":\"MAS\",\"tipoImpuesto\":\"IVA\",\"costoImpuesto\":\"16.000000\",\"pais\":\"COL\",\"nombreImpuesto\":\"16% de IVA\"}],\"cantidad\":\"1\"}],\"id\":\"ch_a4f5be96-aab6-4c23-9556-435c62cad2f9\"}','{\"cd1c55fc7a892ddb6595e556fa4eb297\":{\"rowid\":\"cd1c55fc7a892ddb6595e556fa4eb297\",\"id\":1,\"qty\":\"1\",\"price\":\"100.00\",\"name\":1,\"options\":{\"prom_id\":0,\"time\":1489898380},\"subtotal\":100}}');
/*!40000 ALTER TABLE `pago_online_proceso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pago_online_transaccion`
--

DROP TABLE IF EXISTS `pago_online_transaccion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pago_online_transaccion` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `transaction_id` varchar(45) NOT NULL,
  `fecha` date NOT NULL,
  `reference_sale` varchar(45) NOT NULL,
  `payment_method_id` varchar(45) NOT NULL,
  `payment_method_name` varchar(45) NOT NULL,
  `state_pol` varchar(45) NOT NULL,
  `response_code_pol` varchar(45) NOT NULL,
  `currency` varchar(45) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pago_online_transaccion`
--

LOCK TABLES `pago_online_transaccion` WRITE;
/*!40000 ALTER TABLE `pago_online_transaccion` DISABLE KEYS */;
/*!40000 ALTER TABLE `pago_online_transaccion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquete_inscripcion`
--

DROP TABLE IF EXISTS `paquete_inscripcion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paquete_inscripcion` (
  `id_paquete` int(11) NOT NULL AUTO_INCREMENT,
  `id_tipo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Descripcion` text,
  `precio` decimal(10,2) NOT NULL,
  `puntos` decimal(10,2) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  `tipo` char(2) DEFAULT NULL,
  `caducidad` varchar(3) DEFAULT '0',
  PRIMARY KEY (`id_paquete`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquete_inscripcion`
--

LOCK TABLES `paquete_inscripcion` WRITE;
/*!40000 ALTER TABLE `paquete_inscripcion` DISABLE KEYS */;
/*!40000 ALTER TABLE `paquete_inscripcion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paypal`
--

DROP TABLE IF EXISTS `paypal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `paypal` (
  `email` varchar(45) NOT NULL DEFAULT 'seonetworksoft-facilitator@gmail.com',
  `moneda` varchar(45) NOT NULL DEFAULT 'USD',
  `test` varchar(45) NOT NULL DEFAULT '1',
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paypal`
--

LOCK TABLES `paypal` WRITE;
/*!40000 ALTER TABLE `paypal` DISABLE KEYS */;
INSERT INTO `paypal` VALUES ('seonetworksoft-facilitator@gmail.com','USD','1','DES');
/*!40000 ALTER TABLE `paypal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payulatam`
--

DROP TABLE IF EXISTS `payulatam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `payulatam` (
  `apykey` varchar(100) NOT NULL DEFAULT '6u39nqhq8ftd0hlvnjfs66eh8c',
  `id_comercio` varchar(45) NOT NULL DEFAULT '500238',
  `id_cuenta` varchar(45) NOT NULL DEFAULT '509171',
  `moneda` varchar(45) NOT NULL DEFAULT 'USD',
  `test` int(11) NOT NULL DEFAULT '1',
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`apykey`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payulatam`
--

LOCK TABLES `payulatam` WRITE;
/*!40000 ALTER TABLE `payulatam` DISABLE KEYS */;
INSERT INTO `payulatam` VALUES ('6u39nqhq8ftd0hlvnjfs66eh8c','500238','509171','USD',1,'DES');
/*!40000 ALTER TABLE `payulatam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `plan`
--

DROP TABLE IF EXISTS `plan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `plan` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL DEFAULT 'Default',
  `descripcion` varchar(255) NOT NULL DEFAULT 'ejemplo',
  `estatus` varchar(3) DEFAULT 'ACT',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `plan`
--

LOCK TABLES `plan` WRITE;
/*!40000 ALTER TABLE `plan` DISABLE KEYS */;
/*!40000 ALTER TABLE `plan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_venta`
--

DROP TABLE IF EXISTS `pos_venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_venta` (
  `id_venta` int(11) NOT NULL DEFAULT '1',
  `id_user` int(11) NOT NULL DEFAULT '2',
  `costo` float NOT NULL DEFAULT '0',
  `descuento` float DEFAULT '0',
  `iva` float DEFAULT '0',
  `puntos` float DEFAULT '0',
  `estatus` varchar(3) DEFAULT 'ACT'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_venta`
--

LOCK TABLES `pos_venta` WRITE;
/*!40000 ALTER TABLE `pos_venta` DISABLE KEYS */;
INSERT INTO `pos_venta` VALUES (2,5,116,0,16,10,'ACT');
/*!40000 ALTER TABLE `pos_venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_venta_historial`
--

DROP TABLE IF EXISTS `pos_venta_historial`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_venta_historial` (
  `id_venta` int(11) NOT NULL DEFAULT '1',
  `id_user` int(11) NOT NULL DEFAULT '2',
  `cliente` int(11) NOT NULL DEFAULT '2',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `item` int(11) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `costo` varchar(5) NOT NULL DEFAULT 'DETAL',
  `puntos` float DEFAULT '0',
  `descuento` float NOT NULL DEFAULT '0',
  `tipo_descuento` varchar(1) NOT NULL DEFAULT '$',
  `total` float NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_venta_historial`
--

LOCK TABLES `pos_venta_historial` WRITE;
/*!40000 ALTER TABLE `pos_venta_historial` DISABLE KEYS */;
INSERT INTO `pos_venta_historial` VALUES (2,5,2,'2016-10-16 05:00:00',1,1,'MAYOR',10,0,'$',100);
/*!40000 ALTER TABLE `pos_venta_historial` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_venta_item`
--

DROP TABLE IF EXISTS `pos_venta_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_venta_item` (
  `id_venta` int(11) NOT NULL DEFAULT '1',
  `item` int(11) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `valor` float NOT NULL DEFAULT '0',
  `puntos` float DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_venta_item`
--

LOCK TABLES `pos_venta_item` WRITE;
/*!40000 ALTER TABLE `pos_venta_item` DISABLE KEYS */;
INSERT INTO `pos_venta_item` VALUES (2,1,1,100,10);
/*!40000 ALTER TABLE `pos_venta_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pos_venta_temporal`
--

DROP TABLE IF EXISTS `pos_venta_temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pos_venta_temporal` (
  `id_temporal` varchar(30) NOT NULL DEFAULT '1',
  `id_user` int(11) NOT NULL DEFAULT '2',
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `item` int(11) NOT NULL DEFAULT '1',
  `cantidad` int(11) NOT NULL DEFAULT '1',
  `costo` varchar(5) NOT NULL DEFAULT 'DETAL',
  `descuento` float NOT NULL DEFAULT '0',
  `tipo_descuento` varchar(1) NOT NULL DEFAULT '$',
  `estatus` varchar(3) DEFAULT 'ACT',
  `puntos` float DEFAULT '0',
  `cliente` int(11) NOT NULL DEFAULT '2'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pos_venta_temporal`
--

LOCK TABLES `pos_venta_temporal` WRITE;
/*!40000 ALTER TABLE `pos_venta_temporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `pos_venta_temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `premios`
--

DROP TABLE IF EXISTS `premios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `premios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text,
  `imagen` varchar(255) DEFAULT NULL,
  `nivel` varchar(10) NOT NULL,
  `num_afiliados` varchar(15) NOT NULL,
  `id_red` int(11) NOT NULL DEFAULT '1',
  `frecuencia` text NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `premios`
--

LOCK TABLES `premios` WRITE;
/*!40000 ALTER TABLE `premios` DISABLE KEYS */;
/*!40000 ALTER TABLE `premios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `preregistro`
--

DROP TABLE IF EXISTS `preregistro`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `preregistro` (
  `id_preregistro` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) DEFAULT NULL,
  `correo` varchar(120) NOT NULL,
  `celular` varchar(30) DEFAULT NULL,
  `invitado_por` varchar(100) DEFAULT NULL,
  `cedula` varchar(22) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_preregistro`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `preregistro`
--

LOCK TABLES `preregistro` WRITE;
/*!40000 ALTER TABLE `preregistro` DISABLE KEYS */;
/*!40000 ALTER TABLE `preregistro` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `producto`
--

DROP TABLE IF EXISTS `producto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_grupo` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `concepto` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `peso` decimal(6,2) DEFAULT NULL,
  `alto` decimal(6,2) DEFAULT NULL,
  `ancho` decimal(6,2) DEFAULT NULL,
  `profundidad` decimal(6,2) DEFAULT NULL,
  `diametro` decimal(6,2) DEFAULT NULL,
  `marca` varchar(45) NOT NULL,
  `codigo_barras` varchar(30) NOT NULL,
  `min_venta` varchar(3) NOT NULL,
  `max_venta` varchar(10) NOT NULL,
  `instalacion` tinyint(1) NOT NULL,
  `especificacion` tinyint(1) NOT NULL,
  `produccion` tinyint(1) NOT NULL,
  `importacion` tinyint(1) NOT NULL,
  `sobrepedido` tinyint(1) NOT NULL,
  `inventario` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `producto`
--

LOCK TABLES `producto` WRITE;
/*!40000 ALTER TABLE `producto` DISABLE KEYS */;
INSERT INTO `producto` VALUES (1,1,'banner','banner','',10.00,10.00,10.00,10.00,10.00,'NetworkSoft','86985433','1','10',1,1,1,1,1,100),(2,1,'membrete','membrete','',12.00,12.00,12.00,12.00,12.00,'NetworkSoft','746859670','1','12',1,1,1,1,1,120);
/*!40000 ALTER TABLE `producto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `promocion`
--

DROP TABLE IF EXISTS `promocion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `promocion` (
  `id_promocion` int(11) NOT NULL AUTO_INCREMENT,
  `id_mercancia` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `cantidad_mercancia` varchar(3) NOT NULL,
  `costo` decimal(10,2) DEFAULT NULL,
  `descripcion` text NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_promocion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `promocion`
--

LOCK TABLES `promocion` WRITE;
/*!40000 ALTER TABLE `promocion` DISABLE KEYS */;
/*!40000 ALTER TABLE `promocion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor`
--

DROP TABLE IF EXISTS `proveedor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,
  `id_empresa` int(11) DEFAULT NULL,
  `id_regimen` int(11) NOT NULL,
  `id_zona` int(11) NOT NULL,
  `mercancia` int(11) NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `curp` varchar(20) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `id_impuesto` int(11) NOT NULL,
  `condicion_pago` varchar(255) NOT NULL,
  `promedio_entrega` varchar(3) NOT NULL,
  `promedio_entrega_documentacion` varchar(3) NOT NULL,
  `plazo_pago` varchar(3) NOT NULL,
  `plazo_suspencion` varchar(3) NOT NULL,
  `plazo_suspencion_firma` varchar(3) NOT NULL,
  `interes_moratorio` varchar(3) NOT NULL,
  `dia_corte` varchar(3) NOT NULL,
  `dia_pago` varchar(3) NOT NULL,
  `credito_autorizado` tinyint(1) NOT NULL,
  `credito_suspendido` tinyint(1) NOT NULL,
  `estatus` varchar(3) NOT NULL DEFAULT 'ACT',
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor`
--

LOCK TABLES `proveedor` WRITE;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` VALUES (1,1,1,2,1,'NetworkSoft Factory','746346262','2665645646',2,'ninguno','3','2','7','5','5','3','7','7',1,0,'ACT');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_contacto`
--

DROP TABLE IF EXISTS `proveedor_contacto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_contacto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(11) DEFAULT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `apellido` varchar(100) DEFAULT NULL,
  `telefono_movil` text,
  `telefono_fijo` text,
  `mail` varchar(100) DEFAULT NULL,
  `puesto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_contacto`
--

LOCK TABLES `proveedor_contacto` WRITE;
/*!40000 ALTER TABLE `proveedor_contacto` DISABLE KEYS */;
INSERT INTO `proveedor_contacto` VALUES (38,34,'-----------------','-------------------','0000000000//','0000000000//','------@h.com','-----------');
/*!40000 ALTER TABLE `proveedor_contacto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_datos`
--

DROP TABLE IF EXISTS `proveedor_datos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_datos` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `pais` varchar(3) DEFAULT NULL,
  `provincia` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `comision` varchar(5) DEFAULT NULL,
  `email` varchar(60) DEFAULT NULL,
  `telefono` text,
  `direccion` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_datos`
--

LOCK TABLES `proveedor_datos` WRITE;
/*!40000 ALTER TABLE `proveedor_datos` DISABLE KEYS */;
INSERT INTO `proveedor_datos` VALUES (1,'Soy el','Fabricante','COL','cundinamarca','fusa','252211','0','proveedor@networksoft.mx',' - 3008797700 - 8748332','calle 22');
/*!40000 ALTER TABLE `proveedor_datos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `proveedor_mensajeria`
--

DROP TABLE IF EXISTS `proveedor_mensajeria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `proveedor_mensajeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `razon_social` varchar(255) DEFAULT NULL,
  `nombre_empresa` varchar(255) DEFAULT NULL,
  `idioma` varchar(100) DEFAULT NULL,
  `id_pais` varchar(3) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `colonia` varchar(100) DEFAULT NULL,
  `municipio` varchar(100) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `codigo_postal` varchar(10) DEFAULT NULL,
  `direccion_web` varchar(100) DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `proveedor_mensajeria`
--

LOCK TABLES `proveedor_mensajeria` WRITE;
/*!40000 ALTER TABLE `proveedor_mensajeria` DISABLE KEYS */;
INSERT INTO `proveedor_mensajeria` VALUES (34,'---------------','Ninguno','Español','ESP','------------------','-------------------','5270',78,'----------','-------------','2016-02-04 22:23:07','ACT');
/*!40000 ALTER TABLE `proveedor_mensajeria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `puntos_padre`
--

DROP TABLE IF EXISTS `puntos_padre`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `puntos_padre` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `puntos` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `puntos_padre`
--

LOCK TABLES `puntos_padre` WRITE;
/*!40000 ALTER TABLE `puntos_padre` DISABLE KEYS */;
/*!40000 ALTER TABLE `puntos_padre` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `red`
--

DROP TABLE IF EXISTS `red`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `red` (
  `id_red` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `profundidad` varchar(11) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  `premium` varchar(2) DEFAULT NULL,
  PRIMARY KEY (`id_red`,`id_usuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `red`
--

LOCK TABLES `red` WRITE;
/*!40000 ALTER TABLE `red` DISABLE KEYS */;
INSERT INTO `red` VALUES (1,2,'0','ACT','2');
/*!40000 ALTER TABLE `red` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sepomex`
--

DROP TABLE IF EXISTS `sepomex`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sepomex` (
  `id_sepomex` int(11) NOT NULL AUTO_INCREMENT,
  `cp` varchar(5) NOT NULL,
  `colonia` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `id_estado` int(2) NOT NULL,
  PRIMARY KEY (`id_sepomex`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sepomex`
--

LOCK TABLES `sepomex` WRITE;
/*!40000 ALTER TABLE `sepomex` DISABLE KEYS */;
/*!40000 ALTER TABLE `sepomex` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `concepto` varchar(30) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion` text NOT NULL,
  `id_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surtido`
--

DROP TABLE IF EXISTS `surtido`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `surtido` (
  `id_surtido` int(11) NOT NULL AUTO_INCREMENT,
  `id_almacen_origen` int(11) NOT NULL,
  `id_movimiento` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estatus` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  PRIMARY KEY (`id_surtido`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surtido`
--

LOCK TABLES `surtido` WRITE;
/*!40000 ALTER TABLE `surtido` DISABLE KEYS */;
INSERT INTO `surtido` VALUES (1,2,1,'2016-09-28 23:13:06',2,1);
/*!40000 ALTER TABLE `surtido` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tarjeta`
--

DROP TABLE IF EXISTS `tarjeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tarjeta` (
  `id_tarjeta` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_tarjeta` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `cuenta` varchar(50) NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `titular` varchar(50) NOT NULL,
  `codigo_seguridad` varchar(10) NOT NULL,
  `estatus` varchar(3) NOT NULL,
  PRIMARY KEY (`id_tarjeta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tarjeta`
--

LOCK TABLES `tarjeta` WRITE;
/*!40000 ALTER TABLE `tarjeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `tarjeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `temp_invitacion`
--

DROP TABLE IF EXISTS `temp_invitacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `temp_invitacion` (
  `token` varchar(255) NOT NULL,
  `email` varchar(65) DEFAULT NULL,
  `red` int(11) DEFAULT '1',
  `sponsor` int(11) DEFAULT '2',
  `padre` int(11) DEFAULT '2',
  `lado` int(11) DEFAULT '0',
  `estatus` varchar(3) DEFAULT 'ACT',
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `temp_invitacion`
--

LOCK TABLES `temp_invitacion` WRITE;
/*!40000 ALTER TABLE `temp_invitacion` DISABLE KEYS */;
/*!40000 ALTER TABLE `temp_invitacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tipo_red`
--

DROP TABLE IF EXISTS `tipo_red`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tipo_red` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `frontal` int(11) DEFAULT '1',
  `profundidad` int(11) DEFAULT '1',
  `valor_punto` int(11) NOT NULL DEFAULT '0',
  `estatus` varchar(3) DEFAULT 'ACT',
  `plan` varchar(3) DEFAULT 'MAT',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tipo_red`
--

LOCK TABLES `tipo_red` WRITE;
/*!40000 ALTER TABLE `tipo_red` DISABLE KEYS */;
INSERT INTO `tipo_red` VALUES (1,'publicistas','publicistas',0,0,1,'ACT','MAT');
/*!40000 ALTER TABLE `tipo_red` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transaccion_billetera`
--

DROP TABLE IF EXISTS `transaccion_billetera`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `transaccion_billetera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `id_user` int(11) NOT NULL DEFAULT '2',
  `tipo` varchar(3) NOT NULL DEFAULT 'ADD',
  `descripcion` varchar(225) NOT NULL DEFAULT 'Checkout',
  `monto` decimal(30,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transaccion_billetera`
--

LOCK TABLES `transaccion_billetera` WRITE;
/*!40000 ALTER TABLE `transaccion_billetera` DISABLE KEYS */;
/*!40000 ALTER TABLE `transaccion_billetera` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tucompra`
--

DROP TABLE IF EXISTS `tucompra`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tucompra` (
  `email` varchar(100) NOT NULL DEFAULT 'you@domain.com',
  `cuenta` varchar(45) DEFAULT 'you',
  `llave` varchar(255) DEFAULT 'your~key',
  `moneda` varchar(45) NOT NULL DEFAULT 'COP',
  `test` int(11) NOT NULL DEFAULT '1',
  `estatus` varchar(3) NOT NULL DEFAULT 'DES',
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tucompra`
--

LOCK TABLES `tucompra` WRITE;
/*!40000 ALTER TABLE `tucompra` DISABLE KEYS */;
INSERT INTO `tucompra` VALUES ('you@domain.com','you','your~key','COP',1,'DES');
/*!40000 ALTER TABLE `tucompra` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_autologin`
--

DROP TABLE IF EXISTS `user_autologin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_autologin` (
  `key_id` char(32) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '0',
  `user_agent` varchar(150) COLLATE utf8_bin NOT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`key_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_autologin`
--

LOCK TABLES `user_autologin` WRITE;
/*!40000 ALTER TABLE `user_autologin` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_autologin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_envio`
--

DROP TABLE IF EXISTS `user_envio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_envio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) DEFAULT NULL,
  `id_proveedor` int(11) DEFAULT NULL,
  `costo` varchar(45) DEFAULT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `id_pais` varchar(3) DEFAULT NULL,
  `estado` varchar(65) DEFAULT NULL,
  `municipio` varchar(65) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `cp` varchar(10) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telefono` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_envio`
--

LOCK TABLES `user_envio` WRITE;
/*!40000 ALTER TABLE `user_envio` DISABLE KEYS */;
INSERT INTO `user_envio` VALUES (1,2,1,'0','soy el','Fabricante','COL','cundinamarca','fusagasuga','centro','22','252211','dev@networksoft.mx','8730705');
/*!40000 ALTER TABLE `user_envio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_profiles`
--

DROP TABLE IF EXISTS `user_profiles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_profiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `id_sexo` int(11) NOT NULL DEFAULT '1',
  `id_edo_civil` int(11) NOT NULL DEFAULT '1',
  `id_tipo_usuario` int(11) NOT NULL,
  `id_estudio` int(11) NOT NULL DEFAULT '1',
  `id_ocupacion` int(11) NOT NULL DEFAULT '1',
  `id_tiempo_dedicado` int(11) NOT NULL DEFAULT '1',
  `id_estatus` int(11) NOT NULL DEFAULT '1',
  `id_fiscal` int(11) NOT NULL DEFAULT '1',
  `keyword` varchar(22) COLLATE utf8_bin NOT NULL DEFAULT '1',
  `paquete` int(11) DEFAULT NULL,
  `nombre` varchar(255) COLLATE utf8_bin NOT NULL,
  `apellido` varchar(40) COLLATE utf8_bin NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `ultima_sesion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estatus` varchar(3) COLLATE utf8_bin DEFAULT 'DES',
  `nivel_en_red` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_profiles`
--

LOCK TABLES `user_profiles` WRITE;
/*!40000 ALTER TABLE `user_profiles` DISABLE KEYS */;
INSERT INTO `user_profiles` VALUES (1,1,0,0,1,0,0,0,1,1,'1',1,'Admin','','0000-00-00','2017-03-18 10:23:16','ACT',3),(2,2,1,1,2,5,3,1,1,1,'1069740663',1,'Administrador','Oficina Virtual','1980-01-01','2016-10-17 22:10:49','ACT',1),(3,3,1,1,9,1,1,1,1,1,'1',NULL,'modista','santa','0000-00-00','2016-09-28 22:38:16','DES',NULL),(4,4,1,1,9,1,1,1,1,1,'1',NULL,'contratista','cundi','0000-00-00','2016-09-28 22:41:40','DES',NULL),(5,5,1,1,8,1,1,1,1,1,'1',NULL,'vendedor','todo','0000-00-00','2016-10-16 01:07:25','DES',NULL),(6,6,1,1,8,1,1,1,1,1,'1',NULL,'asistencia','sport','0000-00-00','2016-09-28 22:54:12','DES',NULL),(7,7,1,1,5,1,1,1,1,1,'1',NULL,'almacen','empresa','0000-00-00','2016-09-29 04:08:45','DES',NULL);
/*!40000 ALTER TABLE `user_profiles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_red_temporal`
--

DROP TABLE IF EXISTS `user_red_temporal`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_red_temporal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(10) DEFAULT NULL,
  `id_red_temporal` varchar(10) DEFAULT NULL,
  `id_red_a_red` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_red_temporal`
--

LOCK TABLES `user_red_temporal` WRITE;
/*!40000 ALTER TABLE `user_red_temporal` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_red_temporal` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_soporte`
--

DROP TABLE IF EXISTS `user_soporte`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_soporte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` varchar(10) DEFAULT NULL,
  `id_red_temporal` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_soporte`
--

LOCK TABLES `user_soporte` WRITE;
/*!40000 ALTER TABLE `user_soporte` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_soporte` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_webs_personales`
--

DROP TABLE IF EXISTS `user_webs_personales`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_webs_personales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `clave` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_webs_personales`
--

LOCK TABLES `user_webs_personales` WRITE;
/*!40000 ALTER TABLE `user_webs_personales` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_webs_personales` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_bin NOT NULL,
  `password` varchar(255) COLLATE utf8_bin NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '1',
  `banned` tinyint(1) NOT NULL DEFAULT '0',
  `ban_reason` varchar(255) COLLATE utf8_bin DEFAULT NULL,
  `new_password_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `new_password_requested` datetime DEFAULT NULL,
  `new_email` varchar(100) COLLATE utf8_bin DEFAULT NULL,
  `new_email_key` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `last_ip` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `recovery` varchar(65) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `created` (`created`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'1','$2a$08$n7GIrO4xJmW30zmr8./Wd.dhT93nUZj5FG1ctu/weBF3qxYnGrj6a','admin@admin.com',1,0,NULL,NULL,NULL,NULL,NULL,'::1','2017-03-18 05:23:16','2015-07-11 00:00:00','2017-03-18 05:23:16','admin1414'),(2,'admin','$2a$08$n7GIrO4xJmW30zmr8./Wd.dhT93nUZj5FG1ctu/weBF3qxYnGrj6a','admin@miempresa.com',1,0,NULL,NULL,NULL,NULL,NULL,'127.0.0.1','2017-03-19 04:35:55','2015-05-11 00:00:00','2017-03-19 04:35:55','admin1414'),(3,'modista','$2a$08$DLIB8Q8iEnGpB22SqR8RHuv3BUqV/6Rh6vXHGAEvFI.MlunWydymu','modista@gmail.com',1,0,NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,'2016-09-28 22:38:16','2016-09-28 22:38:16','toor'),(4,'contratista','$2a$08$46anSCM0coC42pDIxJfJUu8.SBaN7Coaqlil9N6bQoMJq4vrOtUHm','contratista@gmail.com',1,0,NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,'2016-09-28 22:41:39','2016-09-28 22:41:39','toor'),(5,'vendedor','$2a$08$xj1DC5ZvRvNZNWEZcEGCfOMthVhh8MFO/Vh2ep6B.FP/msih/l7S6','vendedor@gmail.com',1,0,NULL,NULL,NULL,NULL,NULL,'127.0.0.1','2016-10-17 21:13:41','2016-09-28 22:51:21','2016-10-17 21:13:41','toor'),(6,'asistencia','$2a$08$SF0aBwCuiFowlOfb3JDjN.rcjM99Tj7Duv0vftVeFOZfqq4aU7XYW','asistencia@gmail.com',1,0,NULL,NULL,NULL,NULL,NULL,'127.0.0.1',NULL,'2016-09-28 22:54:12','2016-09-28 22:54:12','toor'),(7,'almacen','$2a$08$lwpFRb356DX7FMDZqff1LOx1cd0p.s0SW5G9W31un3vtFuovJi1ZO','almacen@gmail.com',1,0,NULL,NULL,NULL,NULL,NULL,'127.0.0.1','2016-09-28 23:08:45','2016-09-28 22:58:33','2016-09-28 23:08:45','toor');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_almacen`
--

DROP TABLE IF EXISTS `users_almacen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_almacen` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_cedi` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `pais` varchar(3) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_almacen`
--

LOCK TABLES `users_almacen` WRITE;
/*!40000 ALTER TABLE `users_almacen` DISABLE KEYS */;
INSERT INTO `users_almacen` VALUES (1,1,2147483647,'modista','modista','santa','68574575','modista@gmail.com','COL','2016-09-28 22:38:16','ACT'),(2,2,2147483647,'contratista','contratista','cundi','5786586','contratista@gmail.com','COL','2016-09-28 22:41:41','ACT');
/*!40000 ALTER TABLE `users_almacen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_attempts`
--

DROP TABLE IF EXISTS `users_attempts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_attempts` (
  `ip` varchar(20) NOT NULL,
  `last_login` datetime NOT NULL,
  `attempts` int(1) NOT NULL DEFAULT '1',
  `blocked` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ip`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_attempts`
--

LOCK TABLES `users_attempts` WRITE;
/*!40000 ALTER TABLE `users_attempts` DISABLE KEYS */;
INSERT INTO `users_attempts` VALUES ('127.0.0.1','2016-10-16 00:59:39',1,0),('::1','2017-03-17 02:01:56',1,0);
/*!40000 ALTER TABLE `users_attempts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_cedi`
--

DROP TABLE IF EXISTS `users_cedi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_cedi` (
  `id_users_cedi` int(11) NOT NULL AUTO_INCREMENT,
  `id_cedi` int(11) NOT NULL,
  `dni` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `apellido_uno` varchar(45) NOT NULL,
  `apellido_dos` varchar(45) NOT NULL,
  `telefono_fijo` varchar(45) NOT NULL,
  `telefono_movil` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `ocupacion` varchar(45) NOT NULL,
  `id_pais` varchar(3) NOT NULL,
  `idioma` varchar(45) NOT NULL,
  `fecha_alta` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(3) NOT NULL,
  PRIMARY KEY (`id_users_cedi`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_cedi`
--

LOCK TABLES `users_cedi` WRITE;
/*!40000 ALTER TABLE `users_cedi` DISABLE KEYS */;
INSERT INTO `users_cedi` VALUES (1,3,2147483647,'vendedor','vendedor','todo','','3975945','','vendedor@gmail.com','','COL','COL','0000-00-00 00:00:00','ACT'),(2,4,2147483647,'asistencia','asistencia','sport','','9759655','','asistencia@gmail.com','','COL','COL','0000-00-00 00:00:00','ACT');
/*!40000 ALTER TABLE `users_cedi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valor_comisiones`
--

DROP TABLE IF EXISTS `valor_comisiones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `valor_comisiones` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `profundidad` int(11) NOT NULL,
  `id_red` int(11) NOT NULL,
  `valor` varchar(45) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valor_comisiones`
--

LOCK TABLES `valor_comisiones` WRITE;
/*!40000 ALTER TABLE `valor_comisiones` DISABLE KEYS */;
/*!40000 ALTER TABLE `valor_comisiones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `venta`
--

DROP TABLE IF EXISTS `venta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_estatus` varchar(3) NOT NULL DEFAULT 'DES',
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_metodo_pago` varchar(10) NOT NULL,
  PRIMARY KEY (`id_venta`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `venta`
--

LOCK TABLES `venta` WRITE;
/*!40000 ALTER TABLE `venta` DISABLE KEYS */;
INSERT INTO `venta` VALUES (1,2,'DES','2017-03-19 05:00:00','COMPROPAGO');
/*!40000 ALTER TABLE `venta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'erpmultinivel'
--
/*!50003 DROP PROCEDURE IF EXISTS `afiliar` */;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_unicode_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_AUTO_CREATE_USER,NO_ENGINE_SUBSTITUTION' */ ;
DELIMITER ;;
CREATE   PROCEDURE `afiliar`(	

								ID_afiliar int

								,in Perfil varchar(255),								

								in Afiliar varchar(255),

								in Estilo varchar(255),

								in Coaplicante varchar(255),

																in Dir varchar(255),

								in Billetera varchar(255),

								in Rango varchar(255),

								in Img varchar(255)						

							)
BEGIN



start transaction;



update users set activated = 1 where id = ID_afiliar;



SET @sql = CONCAT('insert into user_profiles 

	(user_id,id_sexo,id_edo_civil,id_tipo_usuario,id_estudio,

		id_ocupacion,id_tiempo_dedicado, id_estatus,id_fiscal,

		keyword,paquete,nombre,apellido,fecha_nacimiento)

values (', Perfil, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into cross_perfil_usuario

values (',ID_afiliar,',2)');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



  SET @sql = CONCAT('insert into afiliar

						(id_red,

						id_afiliado,

						debajo_de,

						directo,

						lado)

values (', Afiliar, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into estilo_usuario

					(id_usuario,

					bg_color,

					btn_1_color,

					btn_2_color)

values (', Estilo, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into coaplicante

						(id_user,

						nombre,

						apellido,

						keyword)

values (', Coaplicante, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into cross_dir_user

values (', Dir, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into billetera

						(id_user,

						estatus,

						activo)

values (', Billetera, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into cross_rango_user

						(id_user,

						id_rango,

						entregado,

						estatus)

values (', Rango, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SET @sql = CONCAT('insert into cat_img

							(url,

							nombre_completo,

							nombre,

							extencion,

							estatus)

values (', Img, ')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SELECT @A:=max(id_img) FROM cat_img;



SET @sql = CONCAT('insert into cross_img_user

values (',ID_afiliar,',',@A,')');

  PREPARE stmt FROM @sql;

  EXECUTE stmt;

	DEALLOCATE PREPARE stmt;



SELECT @Validar:=u.id FROM users u,user_profiles p,afiliar a 

						where a.id_afiliado = p.user_id and p.user_id = u.id

							and u.id = ID_afiliar;



if (@Validar=ID_afiliar) then 

	commit; 

else 

	rollback; 

	delete from cross_tel_user where id_user = ID_afiliar; 

	delete from users where id = ID_afiliar;

end if;



END ;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Final view structure for view `items`
--

/*!50001 DROP VIEW IF EXISTS `items`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */; 
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE VIEW `items` AS select `m`.`id` AS `id`,`m`.`sku` AS `sku`,`m`.`puntos_comisionables` AS `puntos_comisionables`,(case when (`m`.`id_tipo_mercancia` = 1) then (select `producto`.`nombre` from `producto` where (`producto`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 2) then (select `servicio`.`nombre` from `servicio` where (`servicio`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 3) then (select `combinado`.`nombre` from `combinado` where (`combinado`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 4) then (select `paquete_inscripcion`.`nombre` from `paquete_inscripcion` where (`paquete_inscripcion`.`id_paquete` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 5) then (select `membresia`.`nombre` from `membresia` where (`membresia`.`id` = `m`.`sku`)) else 'No define' end) AS `item`,(case when (`m`.`id_tipo_mercancia` = 1) then (select `producto`.`id_grupo` from `producto` where (`producto`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 2) then (select `servicio`.`id_red` from `servicio` where (`servicio`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 3) then (select `combinado`.`id_red` from `combinado` where (`combinado`.`id` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 4) then (select `paquete_inscripcion`.`id_red` from `paquete_inscripcion` where (`paquete_inscripcion`.`id_paquete` = `m`.`sku`)) when (`m`.`id_tipo_mercancia` = 5) then (select `membresia`.`id_red` from `membresia` where (`membresia`.`id` = `m`.`sku`)) else '' end) AS `categoria`,(case when (`m`.`id_tipo_mercancia` = 1) then (select `a`.`id_red` from (`producto` `p` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `p`.`id_grupo`) and (`p`.`id` = `m`.`sku`))) when (`m`.`id_tipo_mercancia` = 2) then (select `a`.`id_red` from (`servicio` `s` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `s`.`id_red`) and (`s`.`id` = `m`.`sku`))) when (`m`.`id_tipo_mercancia` = 3) then (select `a`.`id_red` from (`combinado` `o` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `o`.`id_red`) and (`o`.`id` = `m`.`sku`))) when (`m`.`id_tipo_mercancia` = 4) then (select `a`.`id_red` from (`paquete_inscripcion` `q` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `q`.`id_red`) and (`q`.`id_paquete` = `m`.`sku`))) when (`m`.`id_tipo_mercancia` = 5) then (select `a`.`id_red` from (`membresia` `b` join `cat_grupo_producto` `a`) where ((`a`.`id_grupo` = `b`.`id_red`) and (`b`.`id` = `m`.`sku`))) else '' end) AS `red`,`m`.`id_tipo_mercancia` AS `id_tipo_mercancia` from `mercancia` `m` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-03-19  0:15:05
