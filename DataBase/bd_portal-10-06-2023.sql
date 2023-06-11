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


-- Volcando estructura de base de datos para portal_mdesv
DROP DATABASE IF EXISTS `portal_mdesv`;
CREATE DATABASE IF NOT EXISTS `portal_mdesv` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `portal_mdesv`;

-- Volcando estructura para tabla portal_mdesv.bloqueo
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

-- Volcando datos para la tabla portal_mdesv.bloqueo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla portal_mdesv.detalle_rol_permiso
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
) ENGINE=InnoDB AUTO_INCREMENT=841 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla portal_mdesv.detalle_rol_permiso: ~5 rows (aproximadamente)
INSERT INTO `detalle_rol_permiso` (`drp_id`, `permiso_id`, `roles_id`, `drp_fechacreacion`, `drp_fechaupdate`) VALUES
	(834, 1, 1, '2023-06-11 01:56:01', '2023-06-11 01:56:01'),
	(835, 2, 1, '2023-06-11 01:56:01', '2023-06-11 01:56:01'),
	(836, 3, 1, '2023-06-11 01:56:01', '2023-06-11 01:56:01'),
	(837, 4, 1, '2023-06-11 01:56:01', '2023-06-11 01:56:01'),
	(838, 5, 1, '2023-06-11 01:56:01', '2023-06-11 01:56:01'),
	(839, 6, 1, '2023-06-11 01:56:01', '2023-06-11 01:56:01'),
	(840, 7, 1, '2023-06-11 01:56:01', '2023-06-11 01:56:01');

-- Volcando estructura para tabla portal_mdesv.detalle_rol_usuario
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
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla portal_mdesv.detalle_rol_usuario: ~1 rows (aproximadamente)
INSERT INTO `detalle_rol_usuario` (`dru_id`, `roles_id`, `usuarios_id`, `dru_fechacreacion`, `dru_fechaupdate`) VALUES
	(1, 1, 1, '2023-06-11 01:17:30', '2023-06-11 01:17:34');

-- Volcando estructura para tabla portal_mdesv.det_permiso_usuarios
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

-- Volcando datos para la tabla portal_mdesv.det_permiso_usuarios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla portal_mdesv.grupo_permiso
DROP TABLE IF EXISTS `grupo_permiso`;
CREATE TABLE IF NOT EXISTS `grupo_permiso` (
  `grupo_permiso_id` int NOT NULL AUTO_INCREMENT,
  `grupo_permiso_nombre` varchar(50) NOT NULL,
  `grupo_permiso_estado` tinyint NOT NULL DEFAULT '1',
  `grupo_permiso_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `grupo_permiso_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`grupo_permiso_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla portal_mdesv.grupo_permiso: ~4 rows (aproximadamente)
INSERT INTO `grupo_permiso` (`grupo_permiso_id`, `grupo_permiso_nombre`, `grupo_permiso_estado`, `grupo_permiso_fechacreacion`, `grupo_permiso_fechaupdate`) VALUES
	(1, 'Administrador del sistema', 1, '2022-08-25 14:13:38', '2022-09-02 20:52:58'),
	(2, 'Administrador', 1, '2022-08-25 14:13:48', '2022-09-02 20:52:51'),
	(3, 'publicador', 1, '2022-09-02 20:52:34', '2023-04-19 20:03:27'),
	(4, 'Invitado', 1, '2023-06-11 01:17:13', '2023-06-11 01:17:13');

-- Volcando estructura para tabla portal_mdesv.permiso
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

-- Volcando datos para la tabla portal_mdesv.permiso: ~8 rows (aproximadamente)
INSERT INTO `permiso` (`permiso_id`, `permiso_nombre`, `grupo_permiso_id`, `permiso_orden`, `permiso_estado`, `permiso_fechacreacion`, `permiso_fechaupdate`) VALUES
	(1, 'Ver roles y agregar', 1, 1, 1, '2022-08-25 14:15:53', '2022-10-17 21:30:44'),
	(2, 'Ver lista de usuarios', 1, 2, 1, '2022-08-25 14:19:43', '2022-10-17 21:31:57'),
	(3, 'Ver bloqueos', 1, 3, 1, '2022-08-25 14:20:40', '2023-06-11 01:14:53'),
	(4, 'Ver permisos personalizados', 1, 4, 1, '2022-08-25 14:21:03', '2023-06-11 01:15:06'),
	(5, 'Ver perfil', 1, 5, 1, '2022-08-25 14:21:21', '2023-06-11 01:15:08'),
	(6, 'Ver y editar accidentes', 1, 6, 1, '2023-06-11 01:45:59', '2023-06-11 01:52:05'),
	(7, 'Ver y editar actividades', 1, 7, 1, '2023-06-11 01:51:35', '2023-06-11 01:51:59'),
	(8, 'Ver y editar Cargos', 1, 8, 1, '2023-06-11 01:51:51', '2023-06-11 01:52:10');

-- Volcando estructura para tabla portal_mdesv.roles
DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `roles_id` int NOT NULL AUTO_INCREMENT,
  `roles_nombre` varchar(100) NOT NULL,
  `roles_descripcion` varchar(300) NOT NULL,
  `roles_estado` tinyint NOT NULL DEFAULT '1',
  `roles_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `roles_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`roles_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla portal_mdesv.roles: ~4 rows (aproximadamente)
INSERT INTO `roles` (`roles_id`, `roles_nombre`, `roles_descripcion`, `roles_estado`, `roles_fechacreacion`, `roles_fechaupdate`) VALUES
	(1, 'Administrador del sistema', 'Encargado del mantenimiento de todo el sistema', 1, '2022-08-24 18:17:28', '2022-09-22 17:24:21'),
	(2, 'Administrador', 'Encargado de manejar toda la gestion', 1, '2022-08-25 14:13:02', '2022-09-02 20:55:52'),
	(3, 'publicador', 'Encargado de publicar la informacion', 1, '2022-09-02 20:54:41', '2023-06-11 01:16:12'),
	(4, 'Invitado', 'Usuario invitado', 1, '2022-10-12 20:47:59', '2023-06-11 01:16:30');

-- Volcando estructura para tabla portal_mdesv.tipo_bloqueo
DROP TABLE IF EXISTS `tipo_bloqueo`;
CREATE TABLE IF NOT EXISTS `tipo_bloqueo` (
  `tipo_bloqueo_id` int NOT NULL AUTO_INCREMENT,
  `tipo_bloqueo_descripcion` varchar(200) NOT NULL,
  `tipo_bloqueo_estado` tinyint NOT NULL DEFAULT '1',
  `tipo_bloqueo_fechacreacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tipo_bloqueo_fechaupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`tipo_bloqueo_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla portal_mdesv.tipo_bloqueo: ~0 rows (aproximadamente)

-- Volcando estructura para tabla portal_mdesv.usuarios
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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Volcando datos para la tabla portal_mdesv.usuarios: ~1 rows (aproximadamente)
INSERT INTO `usuarios` (`usuarios_id`, `usuarios_login`, `usuarios_nombres`, `usuarios_paterno`, `usuarios_materno`, `usuarios_dni`, `usuarios_email`, `usuarios_password`, `usuarios_estado`, `usuarios_foto`, `usuarios_fechacreacion`, `usuarios_fechaupdate`, `usuarios_updatepassword`) VALUES
	(1, 'admin', 'Samuel', 'VELA', 'LLANOS', '71116734', 'svelallanos@gmail.com', '$2y$10$JE1vU8LzRdDqgNKpF8vwm.EZMcLinZ6NvkT7NNtKI1qVf7u.5Gpnq', 1, 'sin_foto.png', '2022-10-12 18:24:04', '2023-01-13 21:27:47', '2022-10-12 18:32:48');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
