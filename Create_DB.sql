-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         5.5.39 - MySQL Community Server (GPL)
-- SO del servidor:              Win32
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para db_univer_mipc
CREATE DATABASE IF NOT EXISTS `db_univer_mipc` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `db_univer_mipc`;

-- Volcando estructura para tabla db_univer_mipc.cat_alumno
CREATE TABLE IF NOT EXISTS `cat_alumno` (
  `iCodigoAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `vchNombres` varchar(60) NOT NULL,
  `vchApellidos` varchar(50) NOT NULL,
  `dtFechaNac` datetime NOT NULL,
  PRIMARY KEY (`iCodigoAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_univer_mipc.cat_alumno: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cat_alumno` DISABLE KEYS */;
INSERT INTO `cat_alumno` (`iCodigoAlumno`, `vchNombres`, `vchApellidos`, `dtFechaNac`) VALUES
	(1, 'Juan', 'Perez Lopez', '2013-12-18 00:00:00'),
	(2, 'Manuel', 'Sanchez Lopez', '2013-11-07 00:00:00'),
	(3, 'Fernando', 'De La Cruz', '1992-02-05 00:00:00');
/*!40000 ALTER TABLE `cat_alumno` ENABLE KEYS */;

-- Volcando estructura para tabla db_univer_mipc.cat_materia
CREATE TABLE IF NOT EXISTS `cat_materia` (
  `vchCodigoMateria` varchar(5) NOT NULL,
  `vchMateria` varchar(30) NOT NULL,
  PRIMARY KEY (`vchCodigoMateria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_univer_mipc.cat_materia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cat_materia` DISABLE KEYS */;
INSERT INTO `cat_materia` (`vchCodigoMateria`, `vchMateria`) VALUES
	('6g34J', 'Español'),
	('l4XKT', 'Fisica'),
	('r9i5H', 'Ingles'),
	('WIRQb', 'Programación');
/*!40000 ALTER TABLE `cat_materia` ENABLE KEYS */;

-- Volcando estructura para tabla db_univer_mipc.cat_rel_alumno_materia
CREATE TABLE IF NOT EXISTS `cat_rel_alumno_materia` (
  `iCodigoAlumno` int(11) DEFAULT NULL,
  `vchCodigoMateria` varchar(45) DEFAULT NULL,
  `fCalificacion` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla db_univer_mipc.cat_rel_alumno_materia: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `cat_rel_alumno_materia` DISABLE KEYS */;
INSERT INTO `cat_rel_alumno_materia` (`iCodigoAlumno`, `vchCodigoMateria`, `fCalificacion`) VALUES
	(1, 'r9i5H', 100),
	(2, 'WIRQb', 10),
	(1, 'r9i5H', 100);
/*!40000 ALTER TABLE `cat_rel_alumno_materia` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
