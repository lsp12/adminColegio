-- MariaDB dump 10.18  Distrib 10.4.17-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: colegiosim3
-- ------------------------------------------------------
-- Server version	10.4.17-MariaDB

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
-- Table structure for table `basico_cur`
--

DROP TABLE IF EXISTS `basico_cur`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `basico_cur` (
  `id_bascu` int(11) NOT NULL AUTO_INCREMENT,
  `id_maestro` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `periodo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `id_horario` int(30) NOT NULL,
  `id_dia` int(11) NOT NULL,
  PRIMARY KEY (`id_bascu`),
  KEY `id_jornada` (`id_curso`),
  KEY `id_horario` (`id_horario`),
  KEY `id_maestro` (`id_maestro`),
  KEY `id_dia` (`id_dia`),
  CONSTRAINT `basico_cur_ibfk_3` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `basico_cur_ibfk_4` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `basico_cur_ibfk_5` FOREIGN KEY (`id_maestro`) REFERENCES `maestros` (`id_maestro`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `basico_cur_ibfk_6` FOREIGN KEY (`id_dia`) REFERENCES `dias` (`id_dia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `basico_cur`
--

LOCK TABLES `basico_cur` WRITE;
/*!40000 ALTER TABLE `basico_cur` DISABLE KEYS */;
INSERT INTO `basico_cur` VALUES (16,14,14,'noviembre-febrero_2021',2,1);
/*!40000 ALTER TABLE `basico_cur` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `curso`
--

DROP TABLE IF EXISTS `curso`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL AUTO_INCREMENT,
  `paralelo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_especia` int(11) NOT NULL,
  `nivel` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `jornada` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_curso`),
  KEY `id_especializacion` (`id_especia`) USING BTREE,
  CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`id_especia`) REFERENCES `especializacion` (`id_especia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `curso`
--

LOCK TABLES `curso` WRITE;
/*!40000 ALTER TABLE `curso` DISABLE KEYS */;
INSERT INTO `curso` VALUES (1,'A',1,'octavo','vespertino'),(2,'B',1,'octavo','vespertino'),(4,'A',1,'octavo','matutino'),(9,'C',1,'octavo','vespertino'),(10,'D',1,'octavo','vespertino'),(11,'B',1,'octavo','matutino'),(12,'C',1,'octavo','matutino'),(13,'D',1,'octavo','matutino'),(14,'A',1,'noveno','vespertino'),(15,'B',1,'noveno','vespertino'),(16,'C',1,'noveno','vespertino'),(17,'A',2,'Primero Bachiller','vespertino'),(26,'D',1,'noveno','vespertino');
/*!40000 ALTER TABLE `curso` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cursos_materias`
--

DROP TABLE IF EXISTS `cursos_materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cursos_materias` (
  `id_CM` int(11) NOT NULL AUTO_INCREMENT,
  `id_materiaCU` int(11) NOT NULL,
  `id_cursoMA` int(11) NOT NULL,
  PRIMARY KEY (`id_CM`),
  KEY `id_materia` (`id_materiaCU`),
  KEY `id_curso` (`id_cursoMA`),
  CONSTRAINT `cursos_materias_ibfk_1` FOREIGN KEY (`id_materiaCU`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `cursos_materias_ibfk_2` FOREIGN KEY (`id_cursoMA`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cursos_materias`
--

LOCK TABLES `cursos_materias` WRITE;
/*!40000 ALTER TABLE `cursos_materias` DISABLE KEYS */;
INSERT INTO `cursos_materias` VALUES (22,9,14),(23,9,15),(24,9,16),(33,10,14),(34,10,15),(35,10,16),(40,9,26),(41,10,26);
/*!40000 ALTER TABLE `cursos_materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dias`
--

DROP TABLE IF EXISTS `dias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL AUTO_INCREMENT,
  `dia_semana` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_dia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dias`
--

LOCK TABLES `dias` WRITE;
/*!40000 ALTER TABLE `dias` DISABLE KEYS */;
INSERT INTO `dias` VALUES (1,'lunes'),(2,'martes'),(3,'miercoles'),(4,'jueves'),(5,'viernes'),(6,'sabado');
/*!40000 ALTER TABLE `dias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `especializacion`
--

DROP TABLE IF EXISTS `especializacion`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `especializacion` (
  `id_especia` int(11) NOT NULL AUTO_INCREMENT,
  `nom_especia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_especia` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_especia`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `especializacion`
--

LOCK TABLES `especializacion` WRITE;
/*!40000 ALTER TABLE `especializacion` DISABLE KEYS */;
INSERT INTO `especializacion` VALUES (1,'General','preparacion de lo estudiantes previo al entrar al nivel tecnico que suelen ser tres años de estudio'),(2,'Quimica','se enseña en los años de bachillerato se especializan en las formulas quimicas etc.'),(3,'Informatica','Ayuda a los estudiantes a fomarse ene le area tecologia que es muy demandada en la actualidad'),(6,'agropecuaria','sirve para la comprension de la tirrra y se especializan en ello\r\n');
/*!40000 ALTER TABLE `especializacion` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `horarios`
--

DROP TABLE IF EXISTS `horarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL AUTO_INCREMENT,
  `hora` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `section` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `posicion` int(11) NOT NULL,
  PRIMARY KEY (`id_horario`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `horarios`
--

LOCK TABLES `horarios` WRITE;
/*!40000 ALTER TABLE `horarios` DISABLE KEYS */;
INSERT INTO `horarios` VALUES (2,'07:30-8:15','vespertino',1),(3,'08:15-9:00','vespertino',2),(4,'01:30-2:15','matutino',1),(5,'02:15-3:00','matutino',2),(6,'09:00-9:45','vespertino',3),(7,'09:45-10:15','vespertino',4),(8,'10:15-11:00','vespertino',5),(9,'11:00-11:45','vespertino',6),(10,'11:45-12:30','vespertino',7),(11,'03:00-3:45','matutino',3),(12,'03:45-4:15','matutino',4),(13,'04:15-5:00','matutino',5),(14,'05:00-5:45','matutino',6),(15,'05:45-6:30','matutino',7);
/*!40000 ALTER TABLE `horarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `login` (
  `id_loginadm` int(11) NOT NULL AUTO_INCREMENT,
  `correoadm` varchar(100) NOT NULL,
  `contraseñaadm` varchar(350) NOT NULL,
  PRIMARY KEY (`id_loginadm`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `login`
--

LOCK TABLES `login` WRITE;
/*!40000 ALTER TABLE `login` DISABLE KEYS */;
INSERT INTO `login` VALUES (3,'admin@das.com','$2y$10$ejGav11MEif3pI59ZOzgMuvyfKGliyCWzytXi1qqfP4CURI5sJgEy'),(4,'admin@gmail.com','$2y$10$Ue.PY94tLfuAUKEYFZrNuOpIfID8j1p8qvZGTyRWPP6ItxsaiavrW');
/*!40000 ALTER TABLE `login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maestros`
--

DROP TABLE IF EXISTS `maestros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maestros` (
  `id_maestro` int(11) NOT NULL AUTO_INCREMENT,
  `id_materia` int(11) NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `correoma` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `contraseñama` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_maestro`),
  KEY `id_materia` (`id_materia`),
  CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maestros`
--

LOCK TABLES `maestros` WRITE;
/*!40000 ALTER TABLE `maestros` DISABLE KEYS */;
INSERT INTO `maestros` VALUES (14,9,'1207207752','jonathan','vera',25,'5 de junio y barreiro','Masculino','babahoyo','lsp12@htmi.com','$2y$10$00BPr8O2UwvZGt6cHV0M3.sxC6YLrDIR.kQec6CoJPCY9cBmiVHrK');
/*!40000 ALTER TABLE `maestros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materia`
--

DROP TABLE IF EXISTS `materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL AUTO_INCREMENT,
  `id_cursoMa` int(11) DEFAULT NULL,
  `nombre_materia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`id_materia`),
  KEY `id_cursoMa` (`id_cursoMa`),
  CONSTRAINT `materia_ibfk_1` FOREIGN KEY (`id_cursoMa`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materia`
--

LOCK TABLES `materia` WRITE;
/*!40000 ALTER TABLE `materia` DISABLE KEYS */;
INSERT INTO `materia` VALUES (9,NULL,'fisica','sdasdas'),(10,NULL,'Matemáticas','matematicas para todos');
/*!40000 ALTER TABLE `materia` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-29 18:27:05
