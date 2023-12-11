-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: mq_textil
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Aplicaciones`
--

DROP TABLE IF EXISTS `Aplicaciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Aplicaciones` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `dependencia` varchar(100) NOT NULL,
  `ciudad` varchar(200) NOT NULL,
  `urlConect` varchar(200) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Aplicaciones`
--

LOCK TABLES `Aplicaciones` WRITE;
/*!40000 ALTER TABLE `Aplicaciones` DISABLE KEYS */;
INSERT INTO `Aplicaciones` VALUES (1,'Operaciones','Fabrica Software','Bogotá','https://textilesymoda.com/atributo/nombre_generico/aplicaciones/'),(2,'Recursos Humanos','Dirección General.','Medellín.','https://www.linkcompresores.com.co/panorama-de-la-industria-textil-en-colombia-y-america-latina-para-2020/'),(3,'Administrativo','Oficina Sucursal Norte.','Bogotá','https://www.jowat.com/es-CO/aplicaciones/industria-textil/'),(4,'Sistema Contable','Dirección General.','Cali','https://www.escarre.com/es/los-tres-tipos-de-software-mas-utilizados-en-la-industria-textil/'),(5,'Retail Tienda Comercial ','Almacen Calle 13','Manizales','https://www.lafayettedigitex.com/impresion-textil-publicidad-aplicaciones/'),(6,'Inventarios Bodega Materiales','Fabrica de Partes','Sopó','http://localhost/TQ_Textil/https://www.colombiaproductiva.com/CMSPages/GetFile.aspx?guid=e99e1eba-8200-4d64-bc51-c46fdc381b3d'),(7,'Inventarios Bodega Partes','Fabrica de Partes','Villavicencio','https://www.sic.gov.co/boletines-tecnologicos/textiles-inteligentes'),(8,'Aplicación de Indicadores.','Dirección General','Bogotá','https://www.colombiaaprende.edu.co/sites/default/files/files_public/2021-12/caracterizacion-sector-moda.pdf'),(9,'Procesos de Ensamblaje','Taller Mecánico','Cartagena.','http://localhost/TQ_Textil/'),(10,'Escuela Virtual','Dirección General','Bogotá','http://localhost/TQ_Textil/'),(11,'Servicio al Cliente','Oficinas Administrativas','Medellín','http://localhost/TQ_Textil/'),(12,'Retail Tienda Comercial ','Almacen Calle 14','Bucaramanga','http://localhost/TQ_Textil/'),(13,'Retail Tienda Comercial ','Almacen Calle 15','San Andrés','http://localhost/TQ_Textil/'),(14,'Retail Tienda Comercial ','Almacen Calle 16','Nariño.','http://localhost/TQ_Textil/'),(15,'Retail Tienda Comercial ','Almacen Calle 17','Cucuta','http://localhost/TQ_Textil/'),(16,'Retail Tienda Comercial ','Almacen Calle 18','Casanare','http://localhost/TQ_Textil/'),(17,'Retail Tienda Comercial ','Almacen Calle 19','Arauca','http://localhost/TQ_Textil/'),(18,'Retail Tienda Comercial ','Almacen Calle 20','Leticia.','http://localhost/TQ_Textil/'),(19,'Servicio al Cliente','Oficinas Administrativas','Bogotá','http://localhost/TQ_Textil/');
/*!40000 ALTER TABLE `Aplicaciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Cliente`
--

DROP TABLE IF EXISTS `Cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Cliente` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `IdDependencia` int NOT NULL,
  `IdRol` int NOT NULL,
  `IdUser` int NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cliente`
--

LOCK TABLES `Cliente` WRITE;
/*!40000 ALTER TABLE `Cliente` DISABLE KEYS */;
INSERT INTO `Cliente` VALUES (1,'Jimmy Alexander Espinosa A.','jimmycoespinosa@gmail.com',1,1,1);
/*!40000 ALTER TABLE `Cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Usuario`
--

DROP TABLE IF EXISTS `Usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `Usuario` (
  `IdUser` int NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL,
  `pass` varchar(32) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `statusUser` int NOT NULL DEFAULT '0',
  `fechaRegistro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`IdUser`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Usuario`
--

LOCK TABLES `Usuario` WRITE;
/*!40000 ALTER TABLE `Usuario` DISABLE KEYS */;
INSERT INTO `Usuario` VALUES (1,'Jimmyco','MTZdHi3KzYbWEwsXUzaMHyr5S+CjCkG/','0',1,'2023-12-08 22:11:14');
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

-- Dump completed on 2023-12-11  0:58:44
