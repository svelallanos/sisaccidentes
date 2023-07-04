-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         8.0.30 - MySQL Community Server - GPL
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para bd_accidentes
DROP DATABASE IF EXISTS `bd_accidentes`;
CREATE DATABASE IF NOT EXISTS `bd_accidentes` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `bd_accidentes`;

-- Volcando estructura para tabla bd_accidentes.accidentes
DROP TABLE IF EXISTS `accidentes`;
CREATE TABLE IF NOT EXISTS `accidentes` (
  `accidentes_id` int NOT NULL AUTO_INCREMENT,
  `accidentes_nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `accidentes_descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `accidentes_estado` tinyint NOT NULL DEFAULT '1',
  `accidentes_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accidentes_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`accidentes_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.accidentes: ~1 rows (aproximadamente)
INSERT INTO `accidentes` (`accidentes_id`, `accidentes_nombre`, `accidentes_descripcion`, `accidentes_estado`, `accidentes_fechacreacion`, `accidentes_fechaupdate`) VALUES
	(6, 'sss', 'aaa', 1, '2023-06-29 14:25:52', '2023-07-04 19:28:56');

-- Volcando estructura para tabla bd_accidentes.actividades
DROP TABLE IF EXISTS `actividades`;
CREATE TABLE IF NOT EXISTS `actividades` (
  `actividades_id` int NOT NULL AUTO_INCREMENT,
  `cargo_id` int NOT NULL,
  `actividades_nombre` varchar(200) NOT NULL,
  `actividades_descripcion` text,
  `actividades_peso` tinyint NOT NULL,
  `actividades_estado` tinyint NOT NULL DEFAULT '1',
  `actividades_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `actividades_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`actividades_id`),
  KEY `FK_actividades_cargo` (`cargo_id`),
  CONSTRAINT `FK_actividades_cargo` FOREIGN KEY (`cargo_id`) REFERENCES `cargo` (`cargo_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.actividades: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.bloqueo
DROP TABLE IF EXISTS `bloqueo`;
CREATE TABLE IF NOT EXISTS `bloqueo` (
  `bloqueo_id` int NOT NULL AUTO_INCREMENT,
  `usuarios_id` int NOT NULL,
  `tipo_bloqueo_id` int NOT NULL,
  `bloqueo_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bloqueo_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`bloqueo_id`),
  UNIQUE KEY `UQ_usuario_tipo_bloqueo` (`usuarios_id`,`tipo_bloqueo_id`),
  KEY `FK_bloqueo_tipo_bloqueo` (`tipo_bloqueo_id`),
  KEY `FK_bloqueo_usuario` (`usuarios_id`),
  CONSTRAINT `FK_bloqueo_tipo_bloqueo` FOREIGN KEY (`tipo_bloqueo_id`) REFERENCES `tipo_bloqueo` (`tipo_bloqueo_id`),
  CONSTRAINT `FK_bloqueo_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`usuarios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.bloqueo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.capacitaciones
DROP TABLE IF EXISTS `capacitaciones`;
CREATE TABLE IF NOT EXISTS `capacitaciones` (
  `capacitaciones_id` int NOT NULL AUTO_INCREMENT,
  `capacitaciones_nombre` varchar(200) NOT NULL,
  `capacitaciones_descripcion` text,
  `capacitaciones_peso` tinyint NOT NULL,
  `capacitaciones_estado` tinyint NOT NULL DEFAULT '1',
  `capacitaciones_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `capacitaciones_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`capacitaciones_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.capacitaciones: ~1 rows (aproximadamente)
INSERT INTO `capacitaciones` (`capacitaciones_id`, `capacitaciones_nombre`, `capacitaciones_descripcion`, `capacitaciones_peso`, `capacitaciones_estado`, `capacitaciones_fechacreacion`, `capacitaciones_fechaupdate`) VALUES
	(2, 'sadfsad', 'sdfasd', 2, 1, '2023-07-04 21:15:30', '2023-07-04 21:15:30');

-- Volcando estructura para tabla bd_accidentes.cargo
DROP TABLE IF EXISTS `cargo`;
CREATE TABLE IF NOT EXISTS `cargo` (
  `cargo_id` int NOT NULL AUTO_INCREMENT,
  `cargo_nombre` varchar(200) NOT NULL,
  `cargo_descripcion` text,
  `cargo_estado` tinyint NOT NULL DEFAULT '1',
  `cargo_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cargo_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cargo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.cargo: ~1 rows (aproximadamente)
INSERT INTO `cargo` (`cargo_id`, `cargo_nombre`, `cargo_descripcion`, `cargo_estado`, `cargo_fechacreacion`, `cargo_fechaupdate`) VALUES
	(1, 'Arquitecto', NULL, 1, '2023-06-22 04:01:42', '2023-06-22 04:01:42');

-- Volcando estructura para tabla bd_accidentes.detalle_rol_permiso
DROP TABLE IF EXISTS `detalle_rol_permiso`;
CREATE TABLE IF NOT EXISTS `detalle_rol_permiso` (
  `drp_id` int NOT NULL AUTO_INCREMENT,
  `permiso_id` int NOT NULL,
  `roles_id` int NOT NULL,
  `drp_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `drp_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`drp_id`) USING BTREE,
  UNIQUE KEY `UQ_permiso_rol` (`permiso_id`,`roles_id`),
  KEY `FK_detalle_rol_permiso_roles` (`roles_id`),
  KEY `FK_detalle_rol_permiso_permiso` (`permiso_id`),
  CONSTRAINT `FK_detalle_rol_permiso_permiso` FOREIGN KEY (`permiso_id`) REFERENCES `permiso` (`permiso_id`),
  CONSTRAINT `FK_detalle_rol_permiso_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=921 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.detalle_rol_permiso: ~11 rows (aproximadamente)
INSERT INTO `detalle_rol_permiso` (`drp_id`, `permiso_id`, `roles_id`, `drp_fechacreacion`, `drp_fechaupdate`) VALUES
	(843, 9, 14, '2023-06-15 04:21:40', '2023-06-15 04:21:40'),
	(844, 10, 14, '2023-06-15 04:21:40', '2023-06-15 04:21:40'),
	(904, 1, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(905, 2, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(906, 3, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(907, 4, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(908, 5, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(909, 6, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(910, 7, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(911, 8, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(912, 11, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(913, 12, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(914, 13, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(915, 14, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(916, 15, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(917, 16, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(918, 17, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(919, 9, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38'),
	(920, 10, 1, '2023-07-04 22:07:38', '2023-07-04 22:07:38');

-- Volcando estructura para tabla bd_accidentes.detalle_rol_usuario
DROP TABLE IF EXISTS `detalle_rol_usuario`;
CREATE TABLE IF NOT EXISTS `detalle_rol_usuario` (
  `dru_id` int NOT NULL AUTO_INCREMENT,
  `roles_id` int NOT NULL,
  `usuarios_id` int NOT NULL,
  `dru_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dru_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dru_id`),
  UNIQUE KEY `roles_usuarios` (`roles_id`,`usuarios_id`) USING BTREE,
  KEY `FK_detalle_rol_usuario_roles` (`roles_id`),
  KEY `FK_detalle_rol_usuario_usuario` (`usuarios_id`),
  CONSTRAINT `FK_detalle_rol_usuario_roles` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`roles_id`),
  CONSTRAINT `FK_detalle_rol_usuario_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`usuarios_id`)
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.detalle_rol_usuario: ~2 rows (aproximadamente)
INSERT INTO `detalle_rol_usuario` (`dru_id`, `roles_id`, `usuarios_id`, `dru_fechacreacion`, `dru_fechaupdate`) VALUES
	(1, 1, 1, '2023-06-11 01:17:30', '2023-06-11 01:17:34'),
	(66, 14, 27, '2023-06-15 04:15:26', '2023-06-15 04:15:26');

-- Volcando estructura para tabla bd_accidentes.det_permiso_usuarios
DROP TABLE IF EXISTS `det_permiso_usuarios`;
CREATE TABLE IF NOT EXISTS `det_permiso_usuarios` (
  `dpu_id` int NOT NULL AUTO_INCREMENT,
  `usuarios_id` int NOT NULL,
  `permiso_id` int NOT NULL,
  `dpu_estado` tinyint NOT NULL DEFAULT '1',
  `dpu_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dpu_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`dpu_id`),
  UNIQUE KEY `usuarios_id` (`permiso_id`,`usuarios_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.det_permiso_usuarios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.epp
DROP TABLE IF EXISTS `epp`;
CREATE TABLE IF NOT EXISTS `epp` (
  `epp_id` int NOT NULL AUTO_INCREMENT,
  `talla_id` int NOT NULL,
  `epp_nombre` varchar(200) NOT NULL,
  `epp_descripcion` text,
  `epp_cantidad` int NOT NULL,
  `epp_peso` tinyint NOT NULL,
  `epp_estado` tinyint NOT NULL DEFAULT '1',
  `epp_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `epp_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`epp_id`),
  KEY `FK_epp_talla` (`talla_id`),
  CONSTRAINT `FK_epp_talla` FOREIGN KEY (`talla_id`) REFERENCES `talla` (`talla_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.epp: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.estado_animo
DROP TABLE IF EXISTS `estado_animo`;
CREATE TABLE IF NOT EXISTS `estado_animo` (
  `estadoan_id` int NOT NULL AUTO_INCREMENT,
  `estadoan_nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estadoan_descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estadoan_peso` tinyint NOT NULL,
  `estadoan_estado` tinyint NOT NULL DEFAULT '1',
  `estadoan_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estadoan_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`estadoan_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.estado_animo: ~0 rows (aproximadamente)
INSERT INTO `estado_animo` (`estadoan_id`, `estadoan_nombre`, `estadoan_descripcion`, `estadoan_peso`, `estadoan_estado`, `estadoan_fechacreacion`, `estadoan_fechaupdate`) VALUES
	(2, 'sdfasd', 'sadfas', 3, 1, '2023-07-04 19:39:04', '2023-07-04 19:39:04');

-- Volcando estructura para tabla bd_accidentes.estado_fisico
DROP TABLE IF EXISTS `estado_fisico`;
CREATE TABLE IF NOT EXISTS `estado_fisico` (
  `estadofs_id` int NOT NULL AUTO_INCREMENT,
  `estadofs_nombre` varchar(200) NOT NULL,
  `estadofs_decripcion` text,
  `estadofs_peso` tinyint NOT NULL,
  `estadofs_estado` tinyint NOT NULL DEFAULT '1',
  `estadofs_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estadofs_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`estadofs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.estado_fisico: ~0 rows (aproximadamente)
INSERT INTO `estado_fisico` (`estadofs_id`, `estadofs_nombre`, `estadofs_decripcion`, `estadofs_peso`, `estadofs_estado`, `estadofs_fechacreacion`, `estadofs_fechaupdate`) VALUES
	(1, 'sdf', 'sdfsadf', 2, 1, '2023-07-04 21:33:50', '2023-07-04 21:33:50');

-- Volcando estructura para tabla bd_accidentes.estado_psicologico
DROP TABLE IF EXISTS `estado_psicologico`;
CREATE TABLE IF NOT EXISTS `estado_psicologico` (
  `estadopsc_id` int NOT NULL AUTO_INCREMENT,
  `estadopsc_nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estadopsc_descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `estadopsc_peso` tinyint NOT NULL,
  `estadopsc_estado` tinyint NOT NULL DEFAULT '1',
  `estadopsc_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `estadopsc_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`estadopsc_id`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.estado_psicologico: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.genero
DROP TABLE IF EXISTS `genero`;
CREATE TABLE IF NOT EXISTS `genero` (
  `genero_id` int NOT NULL AUTO_INCREMENT,
  `genero_nombre` varchar(100) NOT NULL,
  `genero_peso` tinyint NOT NULL,
  `genero_estado` tinyint NOT NULL DEFAULT '1',
  `genero_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `genero_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`genero_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.genero: ~3 rows (aproximadamente)
INSERT INTO `genero` (`genero_id`, `genero_nombre`, `genero_peso`, `genero_estado`, `genero_fechacreacion`, `genero_fechaupdate`) VALUES
	(1, 'Masculino', 1, 1, '2023-07-04 21:49:19', '2023-07-04 21:49:19'),
	(2, 'Femenino', 1, 1, '2023-07-04 21:49:26', '2023-07-04 21:49:26'),
	(3, 'Prefiero no decirlo', 0, 1, '2023-07-04 21:49:34', '2023-07-04 21:49:34');

-- Volcando estructura para tabla bd_accidentes.grupo_permiso
DROP TABLE IF EXISTS `grupo_permiso`;
CREATE TABLE IF NOT EXISTS `grupo_permiso` (
  `grupo_permiso_id` int NOT NULL AUTO_INCREMENT,
  `grupo_permiso_nombre` varchar(50) NOT NULL,
  `grupo_permiso_estado` tinyint NOT NULL DEFAULT '1',
  `grupo_permiso_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grupo_permiso_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`grupo_permiso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.grupo_permiso: ~5 rows (aproximadamente)
INSERT INTO `grupo_permiso` (`grupo_permiso_id`, `grupo_permiso_nombre`, `grupo_permiso_estado`, `grupo_permiso_fechacreacion`, `grupo_permiso_fechaupdate`) VALUES
	(1, 'Administrador del sistema', 1, '2022-08-25 14:13:38', '2022-09-02 20:52:58'),
	(2, 'Administrador', 1, '2022-08-25 14:13:48', '2022-09-02 20:52:51'),
	(3, 'publicador', 1, '2022-09-02 20:52:34', '2023-04-19 20:03:27'),
	(4, 'Invitado', 1, '2023-06-11 01:17:13', '2023-06-11 01:17:13'),
	(5, 'Trabajador', 1, '2023-06-15 04:14:08', '2023-06-15 04:14:08');

-- Volcando estructura para tabla bd_accidentes.historial_actividades
DROP TABLE IF EXISTS `historial_actividades`;
CREATE TABLE IF NOT EXISTS `historial_actividades` (
  `hactividades_id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `actividades_id` int NOT NULL,
  `hactividases_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hactividades_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hactividades_id`),
  KEY `FK_historial_actividades_test` (`test_id`),
  KEY `FK_historial_actividades_actividades` (`actividades_id`),
  CONSTRAINT `FK_historial_actividades_actividades` FOREIGN KEY (`actividades_id`) REFERENCES `actividades` (`actividades_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_historial_actividades_test` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.historial_actividades: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.historial_capacitaciones
DROP TABLE IF EXISTS `historial_capacitaciones`;
CREATE TABLE IF NOT EXISTS `historial_capacitaciones` (
  `hcapacitaciones_id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `capacitaciones_id` int NOT NULL,
  `hcapacitaciones_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hcapacitaciones_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hcapacitaciones_id`),
  KEY `FK_historial_capacitaciones_test` (`test_id`),
  KEY `FK_historial_capacitaciones_capacitaciones` (`capacitaciones_id`),
  CONSTRAINT `FK_historial_capacitaciones_capacitaciones` FOREIGN KEY (`capacitaciones_id`) REFERENCES `capacitaciones` (`capacitaciones_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_historial_capacitaciones_test` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.historial_capacitaciones: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.historial_epp
DROP TABLE IF EXISTS `historial_epp`;
CREATE TABLE IF NOT EXISTS `historial_epp` (
  `hepp_id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `epp_id` int NOT NULL,
  `hepp_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hepp_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hepp_id`),
  KEY `FK_historial_epp_test` (`test_id`),
  KEY `FK_historial_epp_epp` (`epp_id`),
  CONSTRAINT `FK_historial_epp_epp` FOREIGN KEY (`epp_id`) REFERENCES `epp` (`epp_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_historial_epp_test` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.historial_epp: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.historial_fisico
DROP TABLE IF EXISTS `historial_fisico`;
CREATE TABLE IF NOT EXISTS `historial_fisico` (
  `hfisico_id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `estadofs_id` int NOT NULL,
  `hfisico_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hfisico_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hfisico_id`),
  KEY `FK_historial_fisico_test` (`test_id`),
  KEY `FK_historial_fisico_estado_fisico` (`estadofs_id`),
  CONSTRAINT `FK_historial_fisico_estado_fisico` FOREIGN KEY (`estadofs_id`) REFERENCES `estado_fisico` (`estadofs_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_historial_fisico_test` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.historial_fisico: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.historial_lesiones
DROP TABLE IF EXISTS `historial_lesiones`;
CREATE TABLE IF NOT EXISTS `historial_lesiones` (
  `hlesiones_id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `lesiones_id` int NOT NULL,
  `hlesiones_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hlesiones_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hlesiones_id`),
  KEY `FK_historial_lesiones_test` (`test_id`),
  KEY `FK_historial_lesiones_lesiones` (`lesiones_id`),
  CONSTRAINT `FK_historial_lesiones_lesiones` FOREIGN KEY (`lesiones_id`) REFERENCES `lesiones` (`lesiones_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_historial_lesiones_test` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.historial_lesiones: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.historial_psicologico
DROP TABLE IF EXISTS `historial_psicologico`;
CREATE TABLE IF NOT EXISTS `historial_psicologico` (
  `hpsicologico_id` int NOT NULL AUTO_INCREMENT,
  `test_id` int NOT NULL,
  `estadopsc_id` int NOT NULL,
  `hpsicologico_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `hpsicologico_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`hpsicologico_id`),
  KEY `FK_historial_psicologico_test` (`test_id`),
  KEY `FK_historial_psicologico_estado_psicologico` (`estadopsc_id`),
  CONSTRAINT `FK_historial_psicologico_estado_psicologico` FOREIGN KEY (`estadopsc_id`) REFERENCES `estado_psicologico` (`estadopsc_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_historial_psicologico_test` FOREIGN KEY (`test_id`) REFERENCES `test` (`test_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.historial_psicologico: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.lesiones
DROP TABLE IF EXISTS `lesiones`;
CREATE TABLE IF NOT EXISTS `lesiones` (
  `lesiones_id` int NOT NULL AUTO_INCREMENT,
  `accidentes_id` int NOT NULL,
  `lesiones_nombre` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lesiones_descripcion` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `lesiones_peso` tinyint NOT NULL,
  `lesiones_estado` tinyint NOT NULL DEFAULT '1',
  `lesiones_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `lesiones_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`lesiones_id`),
  KEY `FK_lesiones_accidentes` (`accidentes_id`),
  CONSTRAINT `FK_lesiones_accidentes` FOREIGN KEY (`accidentes_id`) REFERENCES `accidentes` (`accidentes_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.lesiones: ~2 rows (aproximadamente)
INSERT INTO `lesiones` (`lesiones_id`, `accidentes_id`, `lesiones_nombre`, `lesiones_descripcion`, `lesiones_peso`, `lesiones_estado`, `lesiones_fechacreacion`, `lesiones_fechaupdate`) VALUES
	(3, 6, 'fdf', 'fcsd', 1, 1, '2023-06-29 16:35:15', '2023-06-29 16:35:15'),
	(4, 6, 'fsdf', 'efwf', 23, 1, '2023-06-29 16:36:30', '2023-06-29 16:36:30');

-- Volcando estructura para tabla bd_accidentes.nivel_academico
DROP TABLE IF EXISTS `nivel_academico`;
CREATE TABLE IF NOT EXISTS `nivel_academico` (
  `nivel_id` int NOT NULL AUTO_INCREMENT,
  `nivel_nombre` varchar(200) NOT NULL,
  `nivel_descripcion` text,
  `nivel_peso` tinyint NOT NULL,
  `nivel_estado` tinyint NOT NULL DEFAULT '1',
  `nivel_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nivel_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`nivel_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.nivel_academico: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.permiso
DROP TABLE IF EXISTS `permiso`;
CREATE TABLE IF NOT EXISTS `permiso` (
  `permiso_id` int NOT NULL AUTO_INCREMENT,
  `permiso_nombre` varchar(200) NOT NULL,
  `grupo_permiso_id` int NOT NULL,
  `permiso_orden` int DEFAULT NULL,
  `permiso_estado` tinyint NOT NULL DEFAULT '1',
  `permiso_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `permiso_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`permiso_id`),
  KEY `FK_permiso_grupo_permiso` (`grupo_permiso_id`),
  CONSTRAINT `FK_permiso_grupo_permiso` FOREIGN KEY (`grupo_permiso_id`) REFERENCES `grupo_permiso` (`grupo_permiso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.permiso: ~17 rows (aproximadamente)
INSERT INTO `permiso` (`permiso_id`, `permiso_nombre`, `grupo_permiso_id`, `permiso_orden`, `permiso_estado`, `permiso_fechacreacion`, `permiso_fechaupdate`) VALUES
	(1, 'Ver roles y agregar', 1, 1, 1, '2022-08-25 14:15:53', '2022-10-17 21:30:44'),
	(2, 'Ver lista de usuarios', 1, 2, 1, '2022-08-25 14:19:43', '2022-10-17 21:31:57'),
	(3, 'Ver bloqueos', 1, 3, 1, '2022-08-25 14:20:40', '2023-06-11 01:14:53'),
	(4, 'Ver permisos personalizados', 1, 4, 1, '2022-08-25 14:21:03', '2023-06-11 01:15:06'),
	(5, 'Ver perfil', 1, 5, 1, '2022-08-25 14:21:21', '2023-06-11 01:15:08'),
	(6, 'Ver y editar accidentes', 1, 6, 1, '2023-06-11 01:45:59', '2023-06-11 01:52:05'),
	(7, 'Ver y editar lesiones', 1, 7, 1, '2023-06-11 01:51:35', '2023-07-04 21:32:09'),
	(8, 'Ver y editar Cargos', 1, 8, 1, '2023-06-11 01:51:51', '2023-06-11 01:52:10'),
	(9, 'Realizar test', 5, 9, 1, '2023-06-15 04:13:50', '2023-06-15 04:14:15'),
	(10, 'Historial de test', 5, 10, 1, '2023-06-15 04:14:34', '2023-06-15 04:14:34'),
	(11, 'Ver y editar estado de animo', 1, 11, 1, '2023-07-04 19:31:14', '2023-07-04 19:39:59'),
	(12, 'Ver y editar estado fisico', 1, 12, 1, '2023-07-04 21:27:25', '2023-07-04 21:28:30'),
	(13, 'Ver y editar estado psicologico', 1, 13, 1, '2023-07-04 21:27:53', '2023-07-04 21:28:28'),
	(14, 'Ver y editar nivel academico', 1, 14, 1, '2023-07-04 21:28:25', '2023-07-04 21:28:25'),
	(15, 'Ver y editar capacitaciones', 1, 15, 1, '2023-07-04 19:40:16', '2023-07-04 21:27:57'),
	(16, 'Ver y editar actividades', 1, 16, 1, '2023-07-04 21:53:36', '2023-07-04 21:53:36'),
	(17, 'Ver y editar epp', 1, 17, 1, '2023-07-04 22:02:49', '2023-07-04 22:02:49');

-- Volcando estructura para tabla bd_accidentes.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roles_id` int NOT NULL AUTO_INCREMENT,
  `roles_nombre` varchar(100) NOT NULL,
  `roles_descripcion` varchar(300) NOT NULL,
  `roles_estado` tinyint NOT NULL DEFAULT '1',
  `roles_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roles_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.roles: ~5 rows (aproximadamente)
INSERT INTO `roles` (`roles_id`, `roles_nombre`, `roles_descripcion`, `roles_estado`, `roles_fechacreacion`, `roles_fechaupdate`) VALUES
	(1, 'Administrador del sistema', 'Encargado del mantenimiento de todo el sistema', 1, '2022-08-24 18:17:28', '2022-09-22 17:24:21'),
	(2, 'Administrador', 'Encargado de manejar toda la gestion', 1, '2022-08-25 14:13:02', '2022-09-02 20:55:52'),
	(3, 'publicador', 'Encargado de publicar la informacion', 1, '2022-09-02 20:54:41', '2023-06-11 01:16:12'),
	(4, 'Invitado', 'Usuario invitado', 1, '2022-10-12 20:47:59', '2023-06-11 01:16:30'),
	(14, 'Trabajador', 'Rol creado para los usuarios que serán eliminados en algún momento', 1, '2023-06-15 04:12:59', '2023-06-15 04:15:50');

-- Volcando estructura para tabla bd_accidentes.talla
DROP TABLE IF EXISTS `talla`;
CREATE TABLE IF NOT EXISTS `talla` (
  `talla_id` int NOT NULL AUTO_INCREMENT,
  `talla_nombre` varchar(200) NOT NULL,
  `talla_descripcion` text,
  `talla_estado` tinyint NOT NULL DEFAULT '1',
  `talla_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `talla_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`talla_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.talla: ~6 rows (aproximadamente)
INSERT INTO `talla` (`talla_id`, `talla_nombre`, `talla_descripcion`, `talla_estado`, `talla_fechacreacion`, `talla_fechaupdate`) VALUES
	(1, 'S', 'Small', 1, '2023-07-04 21:47:29', '2023-07-04 21:47:29'),
	(2, 'P', 'Pequeña', 1, '2023-07-04 21:47:39', '2023-07-04 21:47:39'),
	(3, 'M', 'Mediano', 1, '2023-07-04 21:47:49', '2023-07-04 21:48:14'),
	(4, 'L', 'Grande', 1, '2023-07-04 21:47:59', '2023-07-04 21:48:11'),
	(5, 'XL', 'Extra Largo', 1, '2023-07-04 21:48:31', '2023-07-04 21:48:46'),
	(6, 'XG', 'Extra Grande', 1, '2023-07-04 21:48:56', '2023-07-04 21:48:56');

-- Volcando estructura para tabla bd_accidentes.test
DROP TABLE IF EXISTS `test`;
CREATE TABLE IF NOT EXISTS `test` (
  `test_id` int NOT NULL AUTO_INCREMENT,
  `usuarios_id` int NOT NULL,
  `genero_id` int NOT NULL,
  `test_userfechanacimiento` date NOT NULL,
  `estadoan_id` int NOT NULL,
  `nivel_id` int NOT NULL,
  `test_estado` tinyint NOT NULL DEFAULT '1',
  `test_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `test_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`test_id`),
  KEY `FK_test_usuarios` (`usuarios_id`),
  KEY `FK_test_genero` (`genero_id`),
  KEY `FK_test_estado_animo` (`estadoan_id`),
  KEY `FK_test_nivel_academico` (`nivel_id`),
  CONSTRAINT `FK_test_estado_animo` FOREIGN KEY (`estadoan_id`) REFERENCES `estado_animo` (`estadoan_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_test_genero` FOREIGN KEY (`genero_id`) REFERENCES `genero` (`genero_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_test_nivel_academico` FOREIGN KEY (`nivel_id`) REFERENCES `nivel_academico` (`nivel_id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `FK_test_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`usuarios_id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.test: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.tipo_bloqueo
DROP TABLE IF EXISTS `tipo_bloqueo`;
CREATE TABLE IF NOT EXISTS `tipo_bloqueo` (
  `tipo_bloqueo_id` int NOT NULL AUTO_INCREMENT,
  `tipo_bloqueo_descripcion` varchar(200) NOT NULL,
  `tipo_bloqueo_estado` tinyint NOT NULL DEFAULT '1',
  `tipo_bloqueo_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_bloqueo_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tipo_bloqueo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.tipo_bloqueo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla bd_accidentes.usuarios
DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarios_id` int NOT NULL AUTO_INCREMENT,
  `usuarios_login` varchar(20) NOT NULL,
  `usuarios_nombres` varchar(150) NOT NULL,
  `usuarios_paterno` varchar(150) NOT NULL,
  `usuarios_materno` varchar(100) NOT NULL,
  `usuarios_dni` varchar(12) NOT NULL,
  `usuarios_email` varchar(100) NOT NULL,
  `usuarios_password` varchar(100) NOT NULL,
  `usuarios_estado` tinyint NOT NULL DEFAULT '1',
  `usuarios_foto` varchar(100) NOT NULL,
  `usuarios_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuarios_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuarios_updatepassword` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`usuarios_id`),
  UNIQUE KEY `UQ_login_dni` (`usuarios_login`,`usuarios_dni`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla bd_accidentes.usuarios: ~2 rows (aproximadamente)
INSERT INTO `usuarios` (`usuarios_id`, `usuarios_login`, `usuarios_nombres`, `usuarios_paterno`, `usuarios_materno`, `usuarios_dni`, `usuarios_email`, `usuarios_password`, `usuarios_estado`, `usuarios_foto`, `usuarios_fechacreacion`, `usuarios_fechaupdate`, `usuarios_updatepassword`) VALUES
	(1, 'admin', 'Samuel', 'VELA', 'LLANOS', '71116734', 'svelallanos@gmail.com', '$2y$10$JE1vU8LzRdDqgNKpF8vwm.EZMcLinZ6NvkT7NNtKI1qVf7u.5Gpnq', 1, 'sin_foto.png', '2022-10-12 18:24:04', '2023-01-13 21:27:47', '2022-10-12 18:32:48'),
	(27, 'trabajador', 'Luzvina Adeli', 'ROJAS', 'COTRINA', '71257718', 'example@google.com', '$2y$10$xZRl5fCwTo.M0fWTzXU1y.wgH8pj0f3vrZdc.g54aHYdN0Sb4.oNK', 1, 'sin_foto.png', '2023-06-15 04:15:26', '2023-06-15 04:15:26', '2023-06-15 04:15:26');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
