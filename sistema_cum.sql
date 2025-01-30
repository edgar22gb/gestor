-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 18-09-2023 a las 20:19:24
-- Versión del servidor: 5.7.31
-- Versión de PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sistema_cum`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignar_notas`
--

DROP TABLE IF EXISTS `asignar_notas`;
CREATE TABLE IF NOT EXISTS `asignar_notas` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(11) NOT NULL,
  `id_profesor` int(20) NOT NULL,
  `id_materia` int(20) NOT NULL,
  `id_semestre` int(10) NOT NULL,
  `nota_materia` varchar(11) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `asigna-semestre` (`id_semestre`),
  KEY `id_materia` (`id_materia`),
  KEY `id_estudiante` (`id_estudiante`),
  KEY `id_profesor` (`id_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `asignar_notas`
--

INSERT INTO `asignar_notas` (`id`, `id_estudiante`, `id_profesor`, `id_materia`, `id_semestre`, `nota_materia`) VALUES
(1, 3, 1, 1, 1, '80');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asigna_materias`
--

DROP TABLE IF EXISTS `asigna_materias`;
CREATE TABLE IF NOT EXISTS `asigna_materias` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `id_estudiante` int(11) NOT NULL,
  `id_profesor` int(10) NOT NULL,
  `id_materia` int(20) NOT NULL,
  `id_semestre` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_materia` (`id_materia`),
  KEY `id_estudiante` (`id_estudiante`),
  KEY `id_profesor` (`id_profesor`),
  KEY `id_semestre` (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `asigna_materias`
--

INSERT INTO `asigna_materias` (`id`, `id_estudiante`, `id_profesor`, `id_materia`, `id_semestre`) VALUES
(1, 3, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiantes`
--

DROP TABLE IF EXISTS `estudiantes`;
CREATE TABLE IF NOT EXISTS `estudiantes` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `foto_estudiante` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `matricula_estudiante` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_paterno` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `apellido_materno` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_estudiante` varchar(255) CHARACTER SET latin1 NOT NULL,
  `edad` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `fecha_nacimiento` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `estado_civil` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `curp` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar_nacimiento` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `estado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `nacionalidad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `calle` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `numero_exterior` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `colonia` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `codigo_postal` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `municipio` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `ciudad` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_celular` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `licenciatura_procedente` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `universidad_procedente` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `maestria_solicitada` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `generacion` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `turno` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `grado` varchar(255) CHARACTER SET latin1 NOT NULL,
  `grupo` varchar(255) CHARACTER SET latin1 NOT NULL,
  `semestre` int(11) NOT NULL,
  `rol` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `semestre` (`semestre`),
  KEY `rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `estudiantes`
--

INSERT INTO `estudiantes` (`id`, `foto_estudiante`, `matricula_estudiante`, `apellido_paterno`, `apellido_materno`, `nombre_estudiante`, `edad`, `fecha_nacimiento`, `sexo`, `estado_civil`, `curp`, `lugar_nacimiento`, `estado`, `nacionalidad`, `calle`, `numero_exterior`, `colonia`, `codigo_postal`, `municipio`, `ciudad`, `telefono_celular`, `licenciatura_procedente`, `universidad_procedente`, `maestria_solicitada`, `generacion`, `turno`, `grado`, `grupo`, `semestre`, `rol`) VALUES
(1, '../img/27yG_900.jpg', 'GABECUMMCE3607', 'GARCIA', 'BASILIO', 'SAMBUEZA RODRIGUEZ', '34', '22-07-1988', 'Masculino', 'Casado(a)', 'GABE880722HGRRSD04', 'CD. ALTAMIRANO ', 'GUERRERO', 'MEXICANA', 'REY IREPAN', '1285', 'LAZARO CARDENAS', '40660', 'PUNGARABATO', 'CD. ALTAMIRANO', '7671003283', 'SISTEMAS COMPUTACIONALES', 'TECNOLOGICO SUPERIOR DE HUETAMO', 'CIENCIAS DE LA EDUCACIÃ“N', '2022-2024', 'MATUTINO', '1', 'A', 1, 2),
(2, '../img/foto2.jpg', 'GABECUMMCE8150', 'GARCIA', 'MARCELO', 'ANGELICA', '34', '22-07-1988', 'Femenino', 'Soltero(a)', 'GABE880722HGRRSD04', 'SAN JERONIMO', 'GUERRERO', 'MEXICANA', 'REY IREPAN', '1285', 'LAZARO CARDENAS', '40660', 'PUNGARABATO', 'CD. ALTAMIRANO', '4351008089', 'LICENCIATURA EN NUTRICIÃ“N', 'UNIVERSIDAD LAS AMERICAS A.C', 'MAESTRIA EN CIENCIAS DE LA EDUCACION', '2022-2024', 'MATUTINO', '1', 'A', 1, 2),
(3, '../img/alexandra.png', 'BAHICUMMCE7890', 'BASILIO', 'HERNANDEZ', 'ALEXANDRA', '34', '22-07-1988', 'Masculino', 'Casado(a)', 'CUMMCE2837', '-', '-', 'MEXICANA', '-', '-', '-', '-', '-', '-', '-', 'SISTEMAS COMPUTACIONALES', 'TECNOLOGICO SUPERIOR DE HUETAMO', 'CIENCIAS DE LA EDUCACIÃ“N', '2023-2025', 'MATUTINO', '1', 'A', 4, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

DROP TABLE IF EXISTS `materias`;
CREATE TABLE IF NOT EXISTS `materias` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `clave_materia` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_materia` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `numero_creditos` int(10) NOT NULL,
  `semestre` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `semestre` (`semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id`, `clave_materia`, `nombre_materia`, `numero_creditos`, `semestre`) VALUES
(1, 'MCE101', 'FILOSOFÃA Y EPISTEMOLOGÃA DE LA EDUCACIÃ“N', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `meses`
--

DROP TABLE IF EXISTS `meses`;
CREATE TABLE IF NOT EXISTS `meses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_mes` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `meses`
--

INSERT INTO `meses` (`id`, `nombre_mes`) VALUES
(1, 'ENERO'),
(2, 'FEBRERO'),
(3, 'MARZO'),
(4, 'ABRIL'),
(5, 'MAYO'),
(6, 'JUNIO'),
(7, 'JULIO'),
(8, 'AGOSTO'),
(9, 'SEPTIEMBRE'),
(10, 'OCTUBRE'),
(11, 'NOVIEMBRE'),
(12, 'DICIEMBRE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficios`
--

DROP TABLE IF EXISTS `oficios`;
CREATE TABLE IF NOT EXISTS `oficios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_folio` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `id_estudiante` int(20) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  `asunto` varchar(250) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estudiante` (`id_estudiante`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

DROP TABLE IF EXISTS `pagos`;
CREATE TABLE IF NOT EXISTS `pagos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_pago` date NOT NULL,
  `monto` int(10) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `mes_pago` int(11) NOT NULL,
  `id_estudiante` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estudiante` (`id_estudiante`),
  KEY `mes_pago` (`mes_pago`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `fecha_pago`, `monto`, `descripcion`, `mes_pago`, `id_estudiante`) VALUES
(1, '2023-09-18', 2500, 'PAGO DE INSCRIPCION ', 1, 3),
(2, '2023-09-18', 2300, 'PAGO DE COLEGIATURA DEL MES DE SEPTIEMBRE', 9, 3),
(3, '2023-09-18', 2500, 'PAGO DE COLEGIATURA ', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesores`
--

DROP TABLE IF EXISTS `profesores`;
CREATE TABLE IF NOT EXISTS `profesores` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `clave_profesor` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_profesor` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `curp` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  `telefono_celular` varchar(10) COLLATE utf8_spanish2_ci NOT NULL,
  `correo_electronico` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `profesores`
--

INSERT INTO `profesores` (`id`, `clave_profesor`, `nombre_profesor`, `curp`, `direccion`, `telefono_celular`, `correo_electronico`, `rol`) VALUES
(1, 'HEBECUMMCE5794', 'ELIBETH HERNANDEZ BRAVO', 'HEBE791012MGM', 'SAN JERONIMO MICHOACAN', '-', '-', 3),
(2, 'PIGOCUMMCE2561', 'ORBELIN PINEDA GUTIERREEZ', 'PIGO700123HGR', 'CONOCIDO', '-', '-', 3),
(3, 'GABECUMMCE5928', 'EDGAR GARCIA BASILIO', 'GABE880722HGR', '-', '-', '-', 3),
(4, 'NUPCCUMMCE13', 'CARLOS ALBERTO NUÃ‘EZ PÃ‰REZ', 'NUPC880723', '-', '-', '-', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `rol` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `rol`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'ALUMNO'),
(3, 'PROFESOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `semestres`
--

DROP TABLE IF EXISTS `semestres`;
CREATE TABLE IF NOT EXISTS `semestres` (
  `id_semestre` int(10) NOT NULL AUTO_INCREMENT,
  `nombre_semestre` varchar(20) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_semestre`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `semestres`
--

INSERT INTO `semestres` (`id_semestre`, `nombre_semestre`) VALUES
(1, 'PRIMERO'),
(2, 'SEGUNDO'),
(3, 'TERCER'),
(4, 'CUARTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `clave_usuario` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `nombre_usuario` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `rol` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rol` (`rol`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `clave_usuario`, `nombre_usuario`, `rol`) VALUES
(1, 'UADMIN', 'EDGAR GARCIA BASILIO', 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asignar_notas`
--
ALTER TABLE `asignar_notas`
  ADD CONSTRAINT `asigna-semestre` FOREIGN KEY (`id_semestre`) REFERENCES `semestres` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignar_notas_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignar_notas_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignar_notas_ibfk_3` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asigna_materias`
--
ALTER TABLE `asigna_materias`
  ADD CONSTRAINT `asigna_materias_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asigna_materias_ibfk_2` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asigna_materias_ibfk_3` FOREIGN KEY (`id_profesor`) REFERENCES `profesores` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asigna_materias_ibfk_4` FOREIGN KEY (`id_semestre`) REFERENCES `semestres` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estudiantes`
--
ALTER TABLE `estudiantes`
  ADD CONSTRAINT `estudiantes_ibfk_1` FOREIGN KEY (`semestre`) REFERENCES `semestres` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estudiantes_ibfk_2` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `materias`
--
ALTER TABLE `materias`
  ADD CONSTRAINT `materias_ibfk_1` FOREIGN KEY (`semestre`) REFERENCES `semestres` (`id_semestre`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `oficios`
--
ALTER TABLE `oficios`
  ADD CONSTRAINT `oficios_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pagos_ibfk_2` FOREIGN KEY (`mes_pago`) REFERENCES `meses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesores`
--
ALTER TABLE `profesores`
  ADD CONSTRAINT `profesores_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
