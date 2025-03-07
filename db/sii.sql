-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2025 a las 02:08:17
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sii`
--

CREATE DATABASE sii;
USE sii;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_acumulado_historico`
--

CREATE TABLE `t_acumulado_historico` (
  `id_acumulado_historico` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `estatus_periodo_alumno` varchar(50) DEFAULT NULL,
  `creditos_cursados` int(11) DEFAULT NULL,
  `creditos_aprobados` int(11) DEFAULT NULL,
  `promedio_ponderado` float DEFAULT NULL,
  `promedio_ponderado_acumulado` float DEFAULT NULL,
  `promedio_aritmetico` float DEFAULT NULL,
  `promedio_aritmetico_acumulado` float DEFAULT NULL,
  `promedio_certificado` float DEFAULT NULL,
  `materias_cursadas` int(11) DEFAULT NULL,
  `materias_reprobadas` int(11) DEFAULT NULL,
  `materia_examen_especial` int(11) DEFAULT NULL,
  `materia_especial_reprobada` int(11) DEFAULT NULL,
  `indice_reprobacion_semestre` float DEFAULT NULL,
  `creditos_autorizados` int(11) DEFAULT NULL,
  `indice_reprobacion_acumulado` float DEFAULT NULL,
  `fecha_actualizacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_acumulado_historico`
--

INSERT INTO `t_acumulado_historico` (`id_acumulado_historico`, `fk_periodo_escolar`, `fk_numero_control`, `estatus_periodo_alumno`, `creditos_cursados`, `creditos_aprobados`, `promedio_ponderado`, `promedio_ponderado_acumulado`, `promedio_aritmetico`, `promedio_aritmetico_acumulado`, `promedio_certificado`, `materias_cursadas`, `materias_reprobadas`, `materia_examen_especial`, `materia_especial_reprobada`, `indice_reprobacion_semestre`, `creditos_autorizados`, `indice_reprobacion_acumulado`, `fecha_actualizacion`) VALUES
(1, 30, 2, '1', 27, 27, 70, 70, 70, 70, 70, 6, 0, 0, 0, 0, 27, 0, '2023-04-26 12:37:32'),
(2, 30, 3, '1', 27, 27, 97, 97, 97, 97, 97, 6, 0, 0, 0, 0, 27, 0, '2023-04-26 12:37:32'),
(3, 30, 4, '1', 27, 27, 80, 80, 80, 80, 80, 6, 0, 0, 0, 0, 27, 0, '2023-04-26 12:37:32'),
(4, 30, 5, '1', 32, 26, 80, 80, 80, 80, 80, 7, 1, 1, 5, 5, 32, 5, '2023-04-26 12:37:32'),
(5, 30, 2, '1', 5, 5, 100, 100, 100, 100, 100, 1, 0, 0, 0, 0, 5, 0, '2023-04-26 12:37:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_adeudos`
--

CREATE TABLE `t_adeudos` (
  `id_adeudos` int(11) NOT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `observaciones` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_alumno`
--

CREATE TABLE `t_alumno` (
  `id_alumno` int(11) NOT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `fk_persona` int(11) DEFAULT NULL,
  `fk_cat_especialidad` int(11) DEFAULT NULL,
  `fk_cat_estatus` int(11) DEFAULT NULL,
  `fk_cat_carrera` int(11) DEFAULT NULL,
  `fk_cat_reticula` int(11) DEFAULT NULL,
  `fk_cat_tipo_ingreso` int(11) DEFAULT NULL,
  `fk_escolaridad` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `fk_periodo_ingreso` varchar(5) DEFAULT NULL,
  `periodos_revalidados` int(11) DEFAULT NULL,
  `promedio_aritmetico_acumulado` float DEFAULT 0,
  `creditos_aprobados` int(11) DEFAULT 0,
  `creditos_cursados` int(11) DEFAULT 0,
  `promedio_final_alcanzado` float DEFAULT 0,
  `fk_periodo_egresado` int(11) DEFAULT 0,
  `escuela_procedencia` varchar(255) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_alumno`
--

INSERT INTO `t_alumno` (`id_alumno`, `fk_numero_control`, `fk_persona`, `fk_cat_especialidad`, `fk_cat_estatus`, `fk_cat_carrera`, `fk_cat_reticula`, `fk_cat_tipo_ingreso`, `fk_escolaridad`, `semestre`, `fk_periodo_ingreso`, `periodos_revalidados`, `promedio_aritmetico_acumulado`, `creditos_aprobados`, `creditos_cursados`, `promedio_final_alcanzado`, `fk_periodo_egresado`, `escuela_procedencia`) VALUES
(1, 2, 19, 6, 1, 3, 3, 5, 2, 2, '30', 0, 0, 0, 0, 0, 0, 'Cetis 1'),
(2, 3, 20, 6, 1, 3, 3, 5, 2, 2, '30', 0, 0, 0, 0, 0, 0, 'cetis 1'),
(3, 4, 23, 1, 1, 1, 1, 1, 2, 2, '30', 0, 0, 0, 0, 0, 0, 'Cetis 1'),
(4, 5, 24, 5, 1, 2, 2, 2, 3, 2, '30', 0, 0, 0, 0, 0, 0, ''),
(5, 6, 25, 3, 1, 3, 3, 1, 2, 2, '30', 0, 0, 0, 0, 0, 0, ''),
(6, 52, 26, 1, 1, 1, 1, 1, 2, 1, '31', 0, 0, 0, 0, 0, 0, ''),
(7, 53, 27, 1, 1, 1, 1, 1, 2, 1, '31', 0, 0, 0, 0, 0, 0, ''),
(8, 54, 28, 2, 1, 2, 2, 1, 2, 1, '31', 0, 0, 0, 0, 0, 0, ''),
(9, 55, 29, 3, 1, 3, 3, 5, 2, 1, '31', 0, 0, 0, 0, 0, 0, ''),
(10, 56, 30, 3, 1, 3, 3, 1, 2, 1, '31', 0, 0, 0, 0, 0, 0, ''),
(11, 62, 34, 6, 1, 3, 3, 5, 2, 1, '31', 0, 0, 0, 0, 0, 0, ''),
(12, 63, 35, 6, 1, 3, 3, 5, 2, 1, '31', 0, 0, 0, 0, 0, 0, ''),
(13, 64, 36, 6, 1, 3, 3, 5, 2, 1, '31', 0, 0, 0, 0, 0, 0, ''),
(14, 57, 38, 1, 1, 1, 1, 2, 2, 1, '31', 0, 0, 0, 0, 0, 0, ''),
(15, 58, 39, 2, 1, 2, 2, 1, 2, 1, '31', 0, 0, 0, 0, 0, 0, 'Cetis 2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_alumnos_socioeconomicos`
--

CREATE TABLE `t_alumnos_socioeconomicos` (
  `id_alumnos_socioeconomicos` int(11) NOT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `nivel_estudios_padre` int(11) DEFAULT NULL,
  `nivel_estudios_madre` int(11) DEFAULT NULL,
  `con_quien_vives` int(11) DEFAULT NULL,
  `ingresos_padre` int(11) DEFAULT NULL,
  `ingresos_madre` int(11) DEFAULT NULL,
  `ingresos_hermanos` int(11) DEFAULT NULL,
  `ingresos_propios` int(11) DEFAULT NULL,
  `ingresos_otros` int(11) DEFAULT NULL,
  `total_ingresos` int(11) DEFAULT NULL,
  `ocupacion_padre` int(11) DEFAULT NULL,
  `ocupacion_madre` int(11) DEFAULT NULL,
  `de_quien_dependes` int(11) DEFAULT NULL,
  `casa_vives` int(11) DEFAULT NULL,
  `cuartos_casa` int(11) DEFAULT NULL,
  `personas_casa` int(11) DEFAULT NULL,
  `personas_dependen` int(11) DEFAULT NULL,
  `tipo_sangre` varchar(5) DEFAULT NULL,
  `comunicar_con` varchar(255) DEFAULT NULL,
  `calle_numero` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `coigo_postal` int(11) DEFAULT NULL,
  `municipio` varchar(255) DEFAULT NULL,
  `entidad_federativa` int(11) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `lugar_trabajo` varchar(255) DEFAULT NULL,
  `telefono_trabajo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_aplicacion_evaluacion`
--

CREATE TABLE `t_aplicacion_evaluacion` (
  `id_aplicacion_evaluacion` int(11) NOT NULL,
  `tipo_encuesta` int(11) DEFAULT 1,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT current_timestamp(),
  `fecha_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_aplicacion_evaluacion`
--

INSERT INTO `t_aplicacion_evaluacion` (`id_aplicacion_evaluacion`, `tipo_encuesta`, `fk_periodo_escolar`, `fecha_inicio`, `fecha_fin`) VALUES
(1, 1, 31, '2023-05-03', '2023-05-18'),
(3, 1, 32, '2023-06-15', '2023-06-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_aulas_aspirantes`
--

CREATE TABLE `t_aulas_aspirantes` (
  `id_aulas_aspirantes` int(11) NOT NULL,
  `fk_cat_aulas` int(11) DEFAULT NULL,
  `fk_cat_carrera` int(11) DEFAULT NULL,
  `disponibles` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_autorizaciones_inscripcion`
--

CREATE TABLE `t_autorizaciones_inscripcion` (
  `id_autorizaciones_inscripcion` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `fk_cat_tipo_autorizacion` int(11) DEFAULT NULL,
  `motivo_autorizacion` varchar(255) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `fecha_hora_autorizacion` datetime DEFAULT current_timestamp(),
  `materia_afectada` varchar(50) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_avisos_reinscripcion`
--

CREATE TABLE `t_avisos_reinscripcion` (
  `id_avisos_reinscripcion` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `recibo_pago` varchar(50) DEFAULT NULL,
  `fecha_hora` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_avisos_reinscripcion`
--

INSERT INTO `t_avisos_reinscripcion` (`id_avisos_reinscripcion`, `fk_periodo_escolar`, `fk_numero_control`, `fk_usuario`, `recibo_pago`, `fecha_hora`) VALUES
(1, 31, 2, 13, '1234', '2023-03-22 04:16:29'),
(2, 31, 3, 13, '1234', '2023-03-22 04:19:27'),
(3, 31, 6, 13, '12345', '2023-03-22 04:40:50'),
(7, 31, 5, 13, '1234', '2023-06-15 05:47:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_bitacora_alumno`
--

CREATE TABLE `t_bitacora_alumno` (
  `id_bitacora_alumno` int(11) NOT NULL,
  `periodo` int(11) DEFAULT NULL,
  `fk_numero_control` varchar(13) DEFAULT NULL,
  `usuario_modifico` varchar(45) DEFAULT NULL,
  `lugar_accion` varchar(45) DEFAULT NULL,
  `operacion` text DEFAULT NULL,
  `fecha_hora_modifico` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_calificacion_final_periodo`
--

CREATE TABLE `t_calificacion_final_periodo` (
  `id_calificacion_final_periodo` int(11) NOT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `fk_cat_tipo_evaluacion` int(11) DEFAULT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fk_grupo` int(11) DEFAULT NULL,
  `fk_persona` int(11) DEFAULT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `unidades` int(11) DEFAULT NULL,
  `calificacion_final` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_actividades_apoyo`
--

CREATE TABLE `t_cat_actividades_apoyo` (
  `id_cat_actividades_apoyo` int(11) NOT NULL,
  `actividad` varchar(5) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_actividades_apoyo`
--

INSERT INTO `t_cat_actividades_apoyo` (`id_cat_actividades_apoyo`, `actividad`, `descripcion`) VALUES
(1, 'AA01', 'REALIZACION DE ACTIVIDADES ADMINISTRATIVAS'),
(2, 'AP01', 'DISE?O, CONST. INST. OPE. Y CONS. DE EQUIPO Y DISP'),
(3, 'AP02', 'DISE?O, CONST. INST. OPE. Y CONS. DE SISTEMAS'),
(4, 'CA01', 'REV., ACT. Y  ELAB. DE PLANES Y PROG. DE ESTUDIO'),
(5, 'CA02', 'ELABORACION DE APUNTES, NOTAS Y TEXTOS DE ASESORIA'),
(6, 'CA03', 'ELABORACION DE MATERIAL DIDACTICO'),
(7, 'CA04', 'DIRECCION O ASESORIA DE TESIS'),
(8, 'CA05', 'ASESOR DE PRACTICAS O RESIDENCIAS PROFESIONALES'),
(9, 'CA06', 'COORDINACION DE SERVICIO SOCIAL'),
(10, 'CA07', 'ASISTENCIA A REUNIONES DE ACADEMIA'),
(11, 'CA08', 'ASISTENCIA A REUNIONES DE DEPARTAMENTO'),
(12, 'CA09', 'SINODALIA DE EXAMENES PROFESIONALES Y DE OPOSICION'),
(13, 'CA10', 'IMPARTICION DE CURSOS EXTRACURRICULARES'),
(14, 'CA11', 'IMPARTICION DE SEMINARIOS, CONFERENCIAS, ETC.'),
(15, 'CA12', 'REALIZACION DE SERVICIO EXTERNO Y DE APOYO A COM.'),
(16, 'CA13', 'SUPERVISION DE LA ENSE?ANZA'),
(17, 'DC01', 'DIFUSION DE LA CULTURA (ESPECIFICAR)'),
(18, 'DO01', 'PREPARACION DE CLASES'),
(19, 'DO02', 'PREPARACION DE PRACTICAS'),
(20, 'DO03', 'ATENCION DE ALUMNOS'),
(21, 'DO04', 'ELABORACION DE EXAMENES'),
(22, 'DO05', 'EVALUACION DE EXAMENES'),
(23, 'IN01', 'REALIZACION DE PROYECTOS DE INVESTIGACION'),
(24, 'OT01', 'OTRAS:'),
(25, 'OT02', 'PREPARACION, CONTROL Y EVALUACION DE MATERIAS'),
(26, 'SA01', 'REALIZACION DE ESTUDIOS DE ACTUALIZACION'),
(27, 'SA02', 'REALIZACION DE ESTUDIOS DE ESPECIALIZACION'),
(28, 'SA03', 'REALIZACION DE ESTUDIOS DE MAESTRIA'),
(29, 'SA04', 'REALIZACION DE ESTUDIOS DE DOCTORADO'),
(30, 'SA05', 'ASISTENCIA A EVENTOS ACADEMICOS'),
(31, 'SA06', 'REALIZACION DE CURSOS DE IDIOMAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_aulas`
--

CREATE TABLE `t_cat_aulas` (
  `id_cat_aulas` int(11) NOT NULL,
  `aula` varchar(255) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `estatus_aula` varchar(255) DEFAULT NULL,
  `observaciones` varchar(255) DEFAULT NULL,
  `permite_cruce` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `t_cat_aulas`
--

INSERT INTO `t_cat_aulas` (`id_cat_aulas`, `aula`, `capacidad`, `ubicacion`, `estatus_aula`, `observaciones`, `permite_cruce`) VALUES
(1, 'ED2', 20, 'EDI', 'A', '', NULL),
(2, 'ED3', 20, 'EDI', 'A', '', NULL),
(3, 'ED4', 20, 'EDI', 'A', '', NULL),
(4, 'ED5', 20, 'EDI', 'A', '', NULL),
(5, 'A1', 50, 'EDA', 'A', '', NULL),
(6, 'A2', 50, 'EDA', 'A', 'Sin observaciones', NULL),
(7, 'A3', 50, 'EDA', 'A', '', NULL),
(8, 'A4', 65, 'D4', 'A', 'Sin observaciones', NULL),
(9, 'A5', 60, '', 'A', '', NULL),
(10, 'ACG11', 23, 'EDI', 'A', '', NULL),
(11, 'ACG13', 25, 'EdificioCG', 'A', '', NULL),
(12, 'ACG14', 25, 'EdificioCG', 'A', '', NULL),
(13, 'ACG15', 25, 'EdificioCG', 'A', '', NULL),
(14, 'ACG16', 25, 'EdificioCG', 'A', '', NULL),
(15, 'ACGle', 25, 'EdificioCG', 'A', '', NULL),
(16, 'AP1', 20, 'POSGRADO', 'A', '', NULL),
(17, 'AP2', 20, 'POSGRADO', 'A', '', NULL),
(18, 'AP3', 20, 'POSGRADO', 'A', '', NULL),
(19, 'AP4', 20, 'posgrado', 'A', '', NULL),
(20, 'AP5', 20, 'POSGRADO', 'A', '', NULL),
(21, 'AP6', 20, 'POSGRADO', 'A', '', NULL),
(22, 'AUA', 25, 'pOSGRADO', 'A', '', NULL),
(23, 'AUB', 25, 'Posgrado', 'A', '', NULL),
(24, 'AUC', 25, 'Posgrado', 'A', '', NULL),
(25, 'AUD', 25, 'Posgrado', 'A', '', NULL),
(26, 'B0', 50, '', 'A', '', NULL),
(27, 'B01', 40, 'Edificio B', 'A', '', NULL),
(28, 'B02', 42, 'Edificio B', 'A', '', NULL),
(29, 'B1', 50, 'EDB', 'A', '', NULL),
(30, 'B11', 40, 'Edificio B', 'A', '', NULL),
(31, 'B12', 40, 'Edificio B', 'A', '', NULL),
(32, 'B13', 40, 'Edificio B', 'A', '', NULL),
(33, 'B14', 25, 'Edificio B', 'A', '', NULL),
(34, 'B15', 25, 'Edificio B', 'A', '', NULL),
(35, 'B16', 40, 'Edificio B', 'A', '', NULL),
(36, 'B17', 40, 'Edificio B', 'A', '', NULL),
(37, 'B18', 40, 'Edificio B', 'A', '', NULL),
(38, 'B2', 50, 'EDB', 'A', '', NULL),
(39, 'B21', 40, 'Edificio B', 'A', '', NULL),
(40, 'B22', 40, 'Edificio B', 'A', '', NULL),
(41, 'B23', 40, 'Edificio B', 'A', '', NULL),
(42, 'B24', 25, 'Edificio B', 'A', '', NULL),
(43, 'B25', 25, 'Edificio B', 'A', '', NULL),
(44, 'B26', 40, 'Edificio B', 'A', '', NULL),
(45, 'B27', 40, 'Edificio B', 'A', '', NULL),
(46, 'B28', 40, 'Edificio B', 'A', '', NULL),
(47, 'B29', 40, 'Edificio B', 'A', '', NULL),
(48, 'B3', 50, 'EDB', 'A', '', NULL),
(49, 'B30', 30, 'edif. B te', 'A', '', NULL),
(50, 'B31', 40, 'Edificio B', 'A', 'Sin observaciones', NULL),
(51, 'B32', 40, 'Edificio B', 'A', '', NULL),
(52, 'B33', 40, 'Edificio B', 'A', '', NULL),
(53, 'B34', 25, 'Edificio B', 'A', '', NULL),
(54, 'B35', 40, 'Edificio B', 'A', '', NULL),
(55, 'B36', 40, 'Edificio B', 'A', '', NULL),
(56, 'B37', 40, 'Edificio B', 'A', '', NULL),
(57, 'B38', 40, 'Edificio', 'A', '', NULL),
(58, 'B4', 35, '', 'A', '', NULL),
(59, 'B5', 10, '', 'A', '', NULL),
(60, 'B6', 50, '', 'A', '', NULL),
(61, 'BIBL', 50, 'EDB', 'A', '', NULL),
(62, 'C.C.3', 50, '', 'A', '', NULL),
(63, 'C.COM', 50, '', 'A', '', NULL),
(64, 'C.COM1', 50, '', 'A', '', NULL),
(65, 'C.COM2', 50, '', 'A', '', NULL),
(66, 'C01', 40, 'Edificio C', 'A', 'Laboratorio de Química Analítica y Química Ambiental', NULL),
(67, 'C1', 50, 'EDC', 'A', '', NULL),
(68, 'C11', 24, 'Edificio C', 'A', 'Laboratorio de Química Instrumental', NULL),
(69, 'C17', 40, 'Edificio C', 'A', '', NULL),
(70, 'C2', 50, 'EDC', 'A', '', NULL),
(71, 'C23', 24, 'Edificio C', 'A', 'Laboratorio de Química Orgánica', NULL),
(72, 'C25', 40, 'Edificio C', 'A', '', NULL),
(73, 'C26', 40, 'Lab. Qu. O', 'A', '', NULL),
(74, 'C3', 50, 'EDC', 'A', '', NULL),
(75, 'C31', 30, 'Edificio C', 'A', '', NULL),
(76, 'C32', 30, 'Edificio C', 'A', '', NULL),
(77, 'C35', 40, 'Edificio C', 'A', '', NULL),
(78, 'C36', 40, 'Edificio C', 'A', '', NULL),
(79, 'C37', 40, 'Edificio C', 'A', '', NULL),
(80, 'C4', 45, '', 'A', '', NULL),
(81, 'C5', 50, '', 'A', '', NULL),
(82, 'C6', 50, '', 'A', '', NULL),
(83, 'C7', 60, '', 'A', '', NULL),
(84, 'C8', 50, '', 'A', '', NULL),
(85, 'C9', 60, '', 'A', '', NULL),
(86, 'CBas', 5, 'Edif.R', 'A', 'Departamento de Ciencias Básicas de Ingeniería', NULL),
(87, 'CI1', 40, 'CENTRO DE', 'A', '', NULL),
(88, 'D1', 50, '', 'A', '', NULL),
(89, 'D11', 40, 'Edificio D', 'A', '', NULL),
(90, 'D12', 40, 'Edificio D', 'A', '', NULL),
(91, 'D13', 40, 'Edificio D', 'A', '', NULL),
(92, 'D14', 40, 'Edificio D', 'A', '', NULL),
(93, 'D2', 50, '', 'A', '', NULL),
(94, 'D21', 50, 'Edificio D', 'A', '', NULL),
(95, 'D22', 40, 'Edificio D', 'A', '', NULL),
(96, 'D23', 40, 'Edificio D', 'A', '', NULL),
(97, 'D24', 40, 'E$dificio', 'A', '', NULL),
(98, 'D3', 50, '', 'A', '', NULL),
(99, 'D5', 50, '', 'A', '', NULL),
(100, 'D6', 40, '3ER PISO', 'A', '', NULL),
(101, 'D7', 60, '', 'A', '', NULL),
(102, 'DES', 75, 'Des. Acad.', 'A', '', NULL),
(103, 'DII 1', 100, 'IND.', 'A', '', NULL),
(104, 'DII 2', 100, 'IND.', 'A', '', NULL),
(105, 'ED1', 40, 'LAB.COMPUT', 'A', 'AULA PARA EDUCACION A DISTANCIA', NULL),
(106, 'ED2', 30, 'ED', 'A', '', NULL),
(107, 'ED3', 20, 'INDUSTRIAL', 'A', '', NULL),
(108, 'ED4', 20, 'INDUSTRIAL', 'A', '', NULL),
(109, 'ED5', 20, 'INDUSTRIAL', 'A', '', NULL),
(110, 'FQ2', 40, 'Lab de F.', 'A', '', NULL),
(111, 'I07', 75, 'Ing. Ind.', 'A', '', NULL),
(112, 'IO1', 75, 'Ing. Ind.', 'A', '', NULL),
(113, 'IO2', 75, 'Ing. Ind.', 'A', '', NULL),
(114, 'JO2', 75, 'Edificio J', 'A', '', NULL),
(115, 'K11', 40, 'Edificio K', 'A', '', NULL),
(116, 'K23', 40, 'Edificio K', 'A', '', NULL),
(117, 'LAB.ID', 50, '', 'A', 'LABORATORIO DE IDIOMAS', NULL),
(118, 'LB1', 40, 'LAB. FISIC', 'A', '', NULL),
(119, 'LB2', 40, 'LAB.FISICA', 'A', '', NULL),
(120, 'LB3', 40, 'LAB.FISICA', 'A', '', NULL),
(121, 'LB4', 40, 'LAB. FISIC', 'A', '', NULL),
(122, 'LCE', 25, 'Lab. Digit', 'A', '', NULL),
(123, 'LCOM', 50, 'EDB', 'A', '', NULL),
(124, 'LCP', 40, 'POSGRADO', 'A', '', NULL),
(125, 'LD1', 40, 'Lab. Digit', 'A', '', NULL),
(126, 'LD2', 40, 'Lab. Digit', 'A', '', NULL),
(127, 'LD3', 40, 'Lab. Digit', 'A', '', NULL),
(128, 'LD4', 40, 'LAB DIG', 'A', '', NULL),
(129, 'LD5', 40, 'LAB DIG', 'A', '', NULL),
(130, 'LD6', 40, 'LAB DIG', 'A', '', NULL),
(131, 'LE1', 40, 'Lab. de El', 'A', '', NULL),
(132, 'LE10', 40, 'LAB ET', 'A', '', NULL),
(133, 'LE2', 40, 'Lab. de El', 'A', '', NULL),
(134, 'LE3', 40, 'Lab. de El', 'A', '', NULL),
(135, 'LE4', 40, 'LAB ET', 'A', '', NULL),
(136, 'LE5', 40, 'LAB ET', 'A', '', NULL),
(137, 'LE6', 40, 'LAB ET', 'A', '', NULL),
(138, 'LE7', 40, 'LAB ET', 'A', '', NULL),
(139, 'LE8', 40, 'LAB ET', 'A', '', NULL),
(140, 'LE9', 40, 'LAB ET', 'A', '', NULL),
(141, 'LF', 40, 'Lab. de Fi', 'A', '', NULL),
(142, 'LF1', 40, 'L. ING. MA', 'A', 'Taller de Fundición', NULL),
(143, 'LIC', 30, 'LAB ING DI', 'A', '', NULL),
(144, 'LIN', 40, 'Lab. de Ma', 'A', '', NULL),
(145, 'LIQ', 24, 'Laboratori', 'A', 'Laboratorio de Ingeniería Química', NULL),
(146, 'LL1', 40, 'Lab. de El', 'A', '', NULL),
(147, 'LL2', 40, 'Lab. de El', 'A', '', NULL),
(148, 'LL3', 40, 'Lab. de El', 'A', '', NULL),
(149, 'LL4', 40, 'Lab. de El', 'A', '', NULL),
(150, 'LL5', 40, 'Lab. de El', 'A', '', NULL),
(151, 'LL6', 40, 'Lab. de El', 'A', '', NULL),
(152, 'LL7', 40, 'Lab. de El', 'A', '', NULL),
(153, 'LL8', 40, 'LABORATORI', 'A', '', NULL),
(154, 'LLL', 40, 'LABORATORI', 'A', '', NULL),
(155, 'LM1', 30, 'Lab. de Me', 'A', '', NULL),
(156, 'LM2', 30, 'Lab. de Me', 'A', '', NULL),
(157, 'LM3', 30, 'Lab. de ME', 'A', '', NULL),
(158, 'LM4', 35, 'Lab. de Me', 'A', '', NULL),
(159, 'LM5', 30, 'Lab. de Me', 'A', '', NULL),
(160, 'LM6', 30, 'Lab. de Me', 'A', '', NULL),
(161, 'LM7', 30, 'Lab. de Me', 'A', '', NULL),
(162, 'LMA', 35, 'Lab. de Ma', 'A', '', NULL),
(163, 'LMK', 40, 'EDIFICIO C', 'A', 'LABORATORIO DE MERCADOTECNIA', NULL),
(164, 'LQ1', 20, 'Edificio L', 'A', '', NULL),
(165, 'LQ2', 35, 'lab. de Qu', 'A', '', NULL),
(166, 'LS1', 40, 'Lab. de El', 'A', '', NULL),
(167, 'LS2', 25, 'Lab. de El', 'A', '', NULL),
(168, 'LS4', 25, 'Lab. de El', 'A', '', NULL),
(169, 'LT1', 40, 'Lab de Mat', 'A', '', NULL),
(170, 'LT2', 40, 'lAB. DE mA', 'A', '', NULL),
(171, 'LT3', 40, 'Lab. de Ma', 'A', '', NULL),
(172, 'LT4', 40, 'Lab. de Ma', 'A', '', NULL),
(173, 'LT5', 40, 'LAB. DE MA', 'A', '', NULL),
(174, 'MA1', 30, 'Lab. de Ma', 'A', '', NULL),
(175, 'MA2', 30, 'Lab. de Ma', 'A', '', NULL),
(176, 'MA3', 40, 'Lab. de Ma', 'A', 'Aula ubicada en el laboratorio de Ingeniería en Materiales.', NULL),
(177, 'O11', 40, 'Edificio O', 'A', '', NULL),
(178, 'O12', 40, 'Edificio O', 'A', '', NULL),
(179, 'O13', 40, 'Edificio O', 'A', '', NULL),
(180, 'O14a', 35, 'Edificio O', 'A', '', NULL),
(181, 'O14b', 35, 'Edificio O', 'A', '', NULL),
(182, 'O15', 40, 'Edificio O', 'A', '', NULL),
(183, 'O21', 40, 'Edificio O', 'A', '', NULL),
(184, 'O22', 40, 'Edificio O', 'A', '', NULL),
(185, 'O23', 40, 'Edificio O', 'A', '', NULL),
(186, 'O24', 40, 'Edificio O', 'A', '', NULL),
(187, 'O25', 40, 'Edificio O', 'A', '', NULL),
(188, 'O26', 40, 'Edificio O', 'A', '', NULL),
(189, 'S11', 40, 'Edificio S', 'A', '', NULL),
(190, 'S12', 40, 'Edificio S', 'A', '', NULL),
(191, 'S13', 80, 'Edificio S', 'A', '', NULL),
(192, 'S21', 40, 'Edificio S', 'A', '', NULL),
(193, 'S22', 40, 'Edificio S', 'A', '', NULL),
(194, 'S23', 40, 'EDIFICIO S', 'A', '', NULL),
(195, 'S24', 40, 'Edificio S', 'A', '', NULL),
(196, 'S25', 30, 'Edificio S', 'A', '', NULL),
(197, 'SE1', 25, 'Lab. de El', 'A', '', NULL),
(198, 'SE2', 40, 'Lab. de El', 'A', '', NULL),
(199, 'SL1', 40, '', 'A', '', NULL),
(200, 'SL2', 30, 'LAB ING DI', 'A', '', NULL),
(201, 'SL3', 25, 'LAB ING EL', 'A', '', NULL),
(202, 'SL4', 30, 'LABING DIG', 'A', '', NULL),
(203, 'Sala 1', 32, 'Centro Com', 'A', '', NULL),
(204, 'Sala 2', 32, 'Centro Com', 'A', '', NULL),
(205, 'Sala 3', 26, 'Centro Com', 'A', '', NULL),
(206, 'Sala 4', 44, 'Centro Com', 'A', '', NULL),
(207, 'Sala 5', 28, 'Centro Com', 'A', '', NULL),
(208, 'Sala 6', 20, 'Centro Com', 'A', '', NULL),
(209, 'Sala 7', 30, 'Educ. Dist', 'A', '', NULL),
(210, 'Sala 8', 30, 'Educ. Dist', 'A', '', NULL),
(211, 'TM1', 30, 'Taller Mol', 'A', '', NULL),
(212, 'V11A', 30, 'Edificio V', 'A', '', NULL),
(213, 'V12', 30, 'Edificio V', 'A', '', NULL),
(214, 'V13', 30, 'Edificio V', 'A', '', NULL),
(215, 'V14', 30, 'Edificio V', 'A', '', NULL),
(216, 'V15', 25, 'Edificio V', 'A', '', NULL),
(217, 'W11', 40, 'Edificio W', 'A', '', NULL),
(218, 'W12', 40, 'Edificio W', 'A', 'Sin observaciones', NULL),
(219, 'W13', 40, 'Edificio W', 'A', '', NULL),
(220, 'W14', 40, 'Edificio W', 'A', '', NULL),
(221, 'W21', 40, 'Edificio W', 'A', '', NULL),
(222, 'W22', 40, 'Edificio W', 'A', '', NULL),
(223, 'W23', 40, 'Edificio W', 'A', '', NULL),
(224, 'W24', 40, 'Edificio W', 'A', '', NULL),
(225, 'labcom', 20, '', 'A', 'laboratorio de cómputo', NULL),
(226, 's/a', 40, 'Sin Aula', 'A', '', NULL),
(227, 'sc1', 25, 'centro de', 'A', '', NULL),
(228, 'PRUEBA', 30, 'B2', 'I', 'Prueba', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_calificacion_evaluacion`
--

CREATE TABLE `t_cat_calificacion_evaluacion` (
  `id_cat_calificacion_evaluacion` int(11) NOT NULL,
  `encuesta` varchar(255) DEFAULT NULL,
  `porcentaje_inicial` int(11) DEFAULT NULL,
  `porcentaje_final` int(11) DEFAULT NULL,
  `calificacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_calificacion_evaluacion`
--

INSERT INTO `t_cat_calificacion_evaluacion` (`id_cat_calificacion_evaluacion`, `encuesta`, `porcentaje_inicial`, `porcentaje_final`, `calificacion`) VALUES
(1, 'A', 1, 2, 'Aceptable'),
(2, 'A', 2, 3, 'Bien'),
(3, 'A', 0, 1, 'Deficiente'),
(4, 'A', 4, 5, 'Excelente'),
(5, 'A', 3, 4, 'Muy Bien'),
(6, 'D', 4, 4, 'BUENO'),
(7, 'D', 5, 5, 'EXCELENTE'),
(8, 'D', 1, 3, 'INSUFICIENTE'),
(9, 'D', 0, 0, 'NO EVALUADO'),
(10, 'D', 4, 5, 'NOTABLE'),
(11, 'D', 3, 4, 'SUFICIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_capitulos`
--

CREATE TABLE `t_cat_capitulos` (
  `id_cat_capitulos` int(11) NOT NULL,
  `capitulo` int(11) DEFAULT NULL,
  `nombre_capitulo` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `estado_capitulo` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_capitulos`
--

INSERT INTO `t_cat_capitulos` (`id_cat_capitulos`, `capitulo`, `nombre_capitulo`, `descripcion`, `estado_capitulo`) VALUES
(1, 1000, 'SERVICIOS PERSONALES', 'Agrupa las asignaciones destinadas al pago de remuneraciones al personal civil y militar que presta sus servicios en las dependencias y entidades. Incluye las prestaciones econ?micas, repercusiones por concepto de seguridad social y de seguros de vida, contribuciones y dem?s asignaciones derivadas de compromisos laborales, as? como las previsiones para cubrir las medidas de incremento en percepciones, prestaciones econ?micas, creaci?n de plazas, en su caso, y dem?s medidas salariales y econ?micas que se aprueben en el Presupuesto de Egresos.', 'A'),
(2, 2000, 'MATERIALES Y SUMINISTROS', 'Agrupa las asignaciones destinadas a cubrir el costo de adquisici?n de toda clase de insumos requeridos por las dependencias y entidades, para el desempe?o de las actividades administrativas y productivas, que se contraten con personas f?sicas y morales del sector privado y social o instituciones del propio sector p?blico. Incluye materiales y ?tiles de administraci?n y de ense?anza; productos alimenticios; herramientas, refacciones y accesorios; materiales para la producci?n y la construcci?n; materias primas, productos qu?micos, farmac?uticos y de laboratorio; combustibles, lubricantes y aditivos; vestuario, uniformes y blancos; prendas de protecci?n y, en general, todo tipo de bienes de consumo para la realizaci?n de los programas p?blicos que deban registrarse en el activo circulante de las dependencias y entidades. Incluye las asignaciones destinadas a la adquisici?n de mercanc?as diversas para su comercializaci?n en tiendas del Sector P?blico.', 'A'),
(3, 3000, 'SERVICIOS GENERALES', 'Agrupa las asignaciones destinadas a cubrir el costo de todo tipo de servicios que contraten las dependencias y entidades con personas f?sicas y morales del sector privado y social o instituciones del propio sector p?blico, tales como: servicio postal, telegr?fico, telef?nico convencional y de telefon?a celular, de energ?a el?ctrica, agua, de telecomunicaciones, y conducci?n de se?ales anal?gicas y digitales; arrendamientos; servicios de consultor?a, asesor?a, inform?ticos, capacitaci?n, estudios e investigaciones; servicios comercial y bancario; mantenimiento y conservaci?n de bienes muebles e inmuebles; y servicios de impresi?n, publicaci?n, difusi?n e informaci?n, subrogaciones, entre otros. En este cap?tulo se incluyen los gastos que realicen los servidores p?blicos por servicios oficiales y especiales para el desempe?o de actividades vinculadas con las funciones p?blicas, as? como las erogaciones por concepto de responsabilidades o p?rdidas del erario federal, conforme a las disposiciones aplicables en la materia.', 'A'),
(4, 4000, 'AYUDAS, SUBSIDIOS Y TRANSFERENCIAS', 'Agrupa las asignaciones que el Gobierno Federal destina en forma directa o indirecta, mediante el otorgamiento de subsidios aprobados en el Presupuesto de Egresos, a los sectores social y privado y a las entidades federativas como parte de la pol?tica econ?mica de acuerdo a las estrategias y prioridades del desarrollo nacional. Asimismo, agrupa las asignaciones de los recursos federales previstos en el Presupuesto de Egresos de las dependencias por concepto de transferencias, que reciben las entidades apoyadas y los ?rganos administrativos desconcentrados como ingresos destinados a cubrir parcial o totalmente los programas y actividades previstos en sus presupuestos.', 'A'),
(5, 5000, 'BIENES MUEBLES E INMUEBLES', 'Agrupa las asignaciones destinadas a cubrir el costo de adquisici?n de toda clase de bienes muebles e inmuebles que las dependencias y entidades contraten con personas f?sicas y morales del sector privado y social, o instituciones del propio sector p?blico, para el desempe?o de las actividades administrativas y productivas. Incluye el mobiliario y equipo propio para la administraci?n; maquinaria y equipo de producci?n; las refacciones, accesorios y herramientas indispensables para el funcionamiento de los bienes, maquinaria o equipos; la adquisici?n de animales de trabajo y reproducci?n, y la adquisici?n de inmuebles incluidos los contratados mediante las diversas modalidades de financiamiento. Los bienes muebles e inmuebles comprendidos en este cap?tulo, incluido en su caso el costo de su instalaci?n, deben formar parte de los activos fijos de las dependencias y entidades que los adquieran. Excluye las instalaciones previstas en la partida 6105 Instalaciones y obras de construcci?n especializada.', 'A'),
(6, 6000, 'OBRAS PUBLICAS', 'Agrupa las asignaciones destinadas a cubrir el costo de los servicios que las dependencias y entidades contraten con personas f?sicas o morales, necesarios para construir, instalar, ampliar, adecuar, remodelar, restaurar, conservar, mantener, modificar y demoler bienes inmuebles, as? como el costo derivado de la realizaci?n de obras p?blicas por administraci?n directa. Incluye todo tipo de adquisiciones de bienes y servicios relacionados con la obra p?blica, necesarios para su construcci?n, instalaci?n, ampliaci?n, rehabilitaci?n, entre otros, as? como las asignaciones para realizar estudios y proyectos de preinversi?n.', 'A'),
(7, 7000, 'INVERSION FINANCIERA Y OTRAS EROGACIONES', 'Agrupa las asignaciones destinadas a la realizaci?n de actividades financieras que las dependencias y entidades llevan a cabo con fines de fomento productivo o de regulaci?n crediticia y monetaria mediante la adquisici?n de toda clase de valores y la concesi?n de cr?ditos en general. Asimismo, agrupa el importe de las erogaciones comprendidas en la fracci?n IV del art?culo 74 Constitucional, y las erogaciones especiales que por su car?cter de imprevisibles no pueden ser identificadas conforme a las dimensiones funcional program?tica y econ?mica del gasto. Tambi?n agrupa las diversas erogaciones derivadas del cumplimiento de obligaciones del Estado para otorgar apoyos o ayudas extraordinarias a los sectores social y privado. Dentro de este cap?tulo se registrar?n las diversas erogaciones recuperables, por cuenta de terceros que en forma compensada realizan las entidades en sus flujos de efectivo, as? como el pago de utilidades en las empresas de participaci?n estatal. Comprende el registro de las asignaciones para el pago a pensionistas y jubilados, que cubren los institutos de seguridad social, conforme al r?gimen establecido por disposici?n legal. As? como, los pagos adicionales que por dichos conceptos realicen las entidades, conforme a compromisos contractuales o de ley, tales como: los pagos de sumas aseguradas y las prestaciones econ?micas distintas de pensiones y jubilaciones, entre otras.', 'A'),
(8, 8000, 'PARTICIPACION DE INGRESOS FEDERALES', 'Agrupa el importe de los recursos federales previstos en el Presupuesto de Egresos para cubrir las participaciones en ingresos federales a las entidades federativas y sus municipios conforme a la Ley de Coordinaci?n Fiscal, as? como las asignaciones destinadas a cubrir las aportaciones federales previstas en dicha ley a favor de las entidades federativas. Incluye las asignaciones destinadas a la ejecuci?n de programas federales a trav?s de las entidades federativas, mediante la reasignaci?n de responsabilidades y recursos presupuestarios, en los t?rminos de los convenios que celebre el Gobierno Federal con ?stas.', 'A'),
(9, 9000, 'DEUDA P?BLICA', 'Agrupa las asignaciones destinadas a cubrir obligaciones del Gobierno Federal por concepto de su deuda p?blica interna y externa, derivada de la contrataci?n de empr?stitos concertados a plazos, autorizados o ratificados por el Congreso de la Uni?n, as? como los derivados de coberturas, proyectos de infraestructura de largo plazo y arrendamientos financieros especiales. Incluye los adeudos de ejercicios fiscales anteriores o pasivo circulante de las dependencias y ?rganos administrativos desconcentrados, conforme a los reportes a que se refiere el art?culo 28 de la Ley de Presupuesto, Contabilidad y Gasto P?blico Federal. En este cap?tulo, las entidades deber?n incluir las previsiones para cubrir el costo financiero de sus pasivos. Incluye los apoyos financieros del Gobierno Federal, destinados al saneamiento del sistema financiero nacional, as? como a los ahorradores y deudores de la banca.', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_carrera`
--

CREATE TABLE `t_cat_carrera` (
  `id_cat_carrera` int(11) NOT NULL,
  `carrera` varchar(4) DEFAULT NULL,
  `nombre_carrera` varchar(255) DEFAULT NULL,
  `siglas` varchar(50) DEFAULT NULL,
  `clave_oficial` varchar(20) DEFAULT NULL,
  `nivel_escolar` varchar(255) DEFAULT 'LICENCIATURA',
  `carga_maxima` int(11) DEFAULT NULL,
  `carga_minima` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT current_timestamp(),
  `fecha_fin` date DEFAULT NULL,
  `creditos_totales` int(11) DEFAULT NULL,
  `estatus` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_carrera`
--

INSERT INTO `t_cat_carrera` (`id_cat_carrera`, `carrera`, `nombre_carrera`, `siglas`, `clave_oficial`, `nivel_escolar`, `carga_maxima`, `carga_minima`, `fecha_inicio`, `fecha_fin`, `creditos_totales`, `estatus`) VALUES
(1, 'GEM', 'INGENIERÍA EN GESTIÓN EMPRESARIAL', 'IGEM', 'IGEM-2009', 'L', 36, 22, '2010-10-25', '9999-01-01', 260, 1),
(2, 'IND', 'INGENIERÍA INDUSTRIAL', ' IIND', ' IINE- SCA- 2014-01', 'L', 36, 22, '2010-10-25', '9999-01-01', 260, 1),
(3, 'SIS', 'INGENIERÍA EN SISTEMAS COMPUTACIONALES', 'ISIC', 'ISIC-2004-224', 'L', 36, 22, '2010-10-25', '9999-01-01', 260, 1),
(6, 'pb', 'PRUEBA1', 'PBA1', 'PBI-002-1', 'L', 40, 30, '2022-11-28', '2022-12-29', 30, 0),
(7, 'PBBB', 'PRUEBA2', 'JBHB', 'JBHJBHBJHJBSS0', 'L', 45, 22, '2022-11-29', '2022-12-30', 31, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_categorias`
--

CREATE TABLE `t_cat_categorias` (
  `id_cat_categorias` int(11) NOT NULL,
  `categoria` varchar(10) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `horas_categorias` int(11) DEFAULT NULL,
  `horas_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_categorias`
--

INSERT INTO `t_cat_categorias` (`id_cat_categorias`, `categoria`, `descripcion`, `horas_categorias`, `horas_grupo`) VALUES
(1, 'A9001', 'SECRETARIA BILINGUE -A-', 0, 0),
(2, 'A9002', 'SECRETARIA BILINGUE -B-', 0, 0),
(3, 'A9003', 'SECRETARIA BILINGUE -C-', 0, 0),
(4, 'A9004', 'SECRETARIA FUNCION. -A-', 0, 0),
(5, 'A9005', 'SECRETARIA FUNCION. -B-', 0, 0),
(6, 'A9006', 'SECRETARIA FUNCION. -C-', 0, 0),
(7, 'A9007', 'SECRETARIA JEFE DEPTO. -A-', 0, 0),
(8, 'A9008', 'SECRETARIA JEFE DEPTO. -B-', 0, 0),
(9, 'A9009', 'SECRETARIA JEFE DEPTO. -C-', 0, 0),
(10, 'A9010', 'TAQUIMECANOGRAFA -A-', 0, 0),
(11, 'A9011', 'TAQUIMECANOGRAFA -B-', 0, 0),
(12, 'A9012', 'TAQUIMECANOGRAFA -C-', 0, 0),
(13, 'A9013', 'MECANOGRAFA -A-', 0, 0),
(14, 'A9014', 'MECANOGRAFA -B-', 0, 0),
(15, 'A9015', 'MECANOGRAFA -C-', 0, 0),
(16, 'A9101', 'OFI.ADMINIS.ESP. -A-', 0, 0),
(17, 'A9102', 'OFI.ADMINIS.ESP. -B-', 0, 0),
(18, 'A9103', 'OFI.ADMINIS.ESP. -C-', 0, 0),
(19, 'A9104', 'OFI.ADMINIS. -A-', 0, 0),
(20, 'A9105', 'OFI.ADMINIS. -B-', 0, 0),
(21, 'A9106', 'OFI.ADMINIS. -C-', 0, 0),
(22, 'A9107', 'AUX.ADMINIS -A-', 0, 0),
(23, 'A9108', 'AUX.ADMINIS. -B-', 0, 0),
(24, 'A9109', 'AUX.ADMINIS. -C-', 0, 0),
(25, 'E3501', 'PREINCORPORADO -A-', 0, 0),
(26, 'E3503', 'PREINCORPORADO -B-', 0, 0),
(27, 'E3505', 'TEC. DOC. (ES) -A-', 0, 0),
(28, 'E3507', 'TEC DOC. (ES) -B-', 0, 0),
(29, 'E3509', 'TEC DOC. (ES) -C', 0, 0),
(30, 'E3511', 'TEC. DOC. (EMS) -A-', 0, 0),
(31, 'E3513', 'TEC. DOC. (EMS) -B-', 0, 0),
(32, 'E3515', 'PROF. ASIG. (EMS) -A-', 0, 0),
(33, 'E3517', 'PROF. ASIG. (EMS) -B-', 0, 0),
(34, 'E3519', 'PROF. ASIG. (ES) -A-', 4, 4),
(35, 'E3521', 'PROF. ASIG. (ES) -B-', 1, 1),
(36, 'E3523', 'PROFESOR DE ASIGNATURA -C- (EMS)', 0, 0),
(37, 'E3525', 'PROFESOR DE ASIGNATURA -C- (ES)', 0, 0),
(38, 'E3601', 'PROF. AS. (ES) -A-', 0, 0),
(39, 'E3603', 'PROF. AS. (ES) -B-', 0, 0),
(40, 'E3605', 'PROF. A.S (ES) -C-', 0, 0),
(41, 'E3607', 'PROF. ASO (ES) -A-', 20, 12),
(42, 'E3609', 'PROF. ASO (ES) -B-', 20, 12),
(43, 'E3611', 'PROF. ASO (ES) -C-', 20, 12),
(44, 'E3613', 'PROF. TIT. (ES) -A-', 20, 12),
(45, 'E3615', 'PROF. TIT. (ES) -B-', 20, 12),
(46, 'E3617', 'PROF. TIT. (ES) -C-', 20, 12),
(47, 'E3619', 'PROF. AS. (EMS) -A-', 0, 0),
(48, 'E3621', 'PROF. AS. (EMS) -B-', 6, 6),
(49, 'E3623', 'PROF. ASO (EMS) -A-', 0, 0),
(50, 'E3625', 'PROF. ASO. (EMS) -B-', 0, 0),
(51, 'E3627', 'PROF. TIT. (EMS) -A-', 0, 0),
(52, 'E3629', 'PROF. TIT. (EMS) -B-', 0, 0),
(53, 'E3631', 'TEC. DOC. (ES) -A-', 0, 0),
(54, 'E3633', 'TEC. DOC. (ES) -B-', 0, 0),
(55, 'E3635', 'TEC. DOC. (ES) -C-', 0, 0),
(56, 'E3637', 'TEC. DOC. AS. -A-', 20, 18),
(57, 'E3639', 'TEC. DOC. AS. -B-', 20, 18),
(58, 'E3641', 'TEC. DOC. AS. -C-', 0, 0),
(59, 'E3643', 'T. TIT. (ES) -A-', 20, 18),
(60, 'E3645', 'T. TIT. (ES) -B-', 0, 0),
(61, 'E3647', 'TEC. DOC. AUX. -A-', 0, 0),
(62, 'E3649', 'TEC. DOC. AUX. -B-', 0, 0),
(63, 'E3651', 'TEC. DOC. AUX. -C-', 0, 0),
(64, 'E3653', 'TEC. DOC. ASO. -A-', 0, 0),
(65, 'E3655', 'TEC. DOC. ASO. -B-', 0, 0),
(66, 'E3657', 'TEC. DOC. ASO. -C-', 0, 0),
(67, 'E3659', 'PROF. TIT. -A-', 0, 0),
(68, 'E3661', 'PROF. TIT. -B-', 0, 0),
(69, 'E3663', 'PROF. TIT. -C-', 0, 0),
(70, 'E3667', 'PROFESOR ASOCIADO -C- (EMS)', 0, 0),
(71, 'E3669', 'PROFESOR TITULAR -C- (EMS)', 0, 0),
(72, 'E3675', 'TECNICO TITULAR -C- (ES)', 0, 0),
(73, 'E3701', 'PROF. ASI. -A-', 0, 0),
(74, 'E3703', 'PROF. ASI. -B-', 0, 0),
(75, 'E3705', 'PROF. ASI. -C-', 0, 0),
(76, 'E3707', 'PROF. ASO. -A-', 0, 0),
(77, 'E3709', 'PROF. ASO. -B-', 30, 18),
(78, 'E3711', 'PROF. ASO. -C-', 30, 18),
(79, 'E3713', 'PROF. TIT. -A-', 0, 0),
(80, 'E3715', 'PROF. TIT. -B-', 30, 16),
(81, 'E3717', 'PROF. TIT. -C-', 30, 16),
(82, 'E3719', 'PROF. ASI. (EMS) -A-', 0, 0),
(83, 'E3721', 'PROF. ASI. (EMS) -B-', 0, 0),
(84, 'E3723', 'PROF. ASO. (EMS) -A-', 0, 0),
(85, 'E3725', 'PROF. ASO. (EMS) -B-', 0, 0),
(86, 'E3727', 'PROF. TIT. (EMS) -A-', 0, 0),
(87, 'E3729', 'PROF. TIT. (EMS) -B-', 0, 0),
(88, 'E3731', 'TEC. DOC. AUX. -A-', 0, 0),
(89, 'E3733', 'TEC. DOC. AUX. -B-', 0, 0),
(90, 'E3735', 'TEC. DOC. AUX. -C-', 0, 0),
(91, 'E3737', 'TEC. DOC. ASOC. -A-', 30, 28),
(92, 'E3739', 'TEC. DOC. ASOC. -B-', 30, 28),
(93, 'E3741', 'TEC. DOC. ASOC. -C-', 0, 0),
(94, 'E3743', 'TEC. TIT. (ES) -A-', 30, 28),
(95, 'E3745', 'TEC. TIT. (ES) -B-', 0, 0),
(96, 'E3747', 'TEC. DOC. AUX. (EMS) -A-', 0, 0),
(97, 'E3749', 'TEC. DOC. AUX. (EMS) -B-', 0, 0),
(98, 'E3751', 'TEC. DOC. AUX. (EMS) -C-', 0, 0),
(99, 'E3753', 'TEC. DOC. ASO. (EMS) -A-', 0, 0),
(100, 'E3755', 'TEC. DOC. ASO. (EMS) -B-', 0, 0),
(101, 'E3757', 'TEC. DOC. ASO. (EMS) -C-', 0, 0),
(102, 'E3759', 'PROF. INV. (ES) -A-', 0, 0),
(103, 'E3761', 'PROF. INV. (ES) -B-', 0, 0),
(104, 'E3763', 'PROF. INV. (ES) -C-', 0, 0),
(105, 'E3775', 'TECNICO TITULAR -C- (ES)', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_cuartos_personas`
--

CREATE TABLE `t_cat_cuartos_personas` (
  `id_cat_cuartos_personas` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_cuartos_personas`
--

INSERT INTO `t_cat_cuartos_personas` (`id_cat_cuartos_personas`, `descripcion`) VALUES
(1, 'Uno'),
(2, 'Dos'),
(3, 'Tres'),
(4, 'Cuatro'),
(5, 'Cinco'),
(6, 'Seis'),
(7, 'Siete'),
(8, 'Ocho'),
(9, 'Nueve'),
(10, 'M?s de nueve');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_data_dir`
--

CREATE TABLE `t_cat_data_dir` (
  `id_cat_data_dir` int(11) NOT NULL,
  `codigo_postal` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `alcaldia` varchar(255) DEFAULT NULL,
  `entidad_federativa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_data_dir`
--

INSERT INTO `t_cat_data_dir` (`id_cat_data_dir`, `codigo_postal`, `colonia`, `alcaldia`, `entidad_federativa`) VALUES
(1, '01000', 'San Ángel', 'Álvaro Obregón', 'Ciudad de México'),
(2, '01010', 'Los Alpes', 'Álvaro Obregón', 'Ciudad de México'),
(3, '01020', 'Guadalupe Inn', 'Álvaro Obregón', 'Ciudad de México'),
(4, '01030', 'Axotla', 'Álvaro Obregón', 'Ciudad de México'),
(5, '01030', 'Florida', 'Álvaro Obregón', 'Ciudad de México'),
(6, '01040', 'Campestre', 'Álvaro Obregón', 'Ciudad de México'),
(7, '01049', 'Tlacopac', 'Álvaro Obregón', 'Ciudad de México'),
(8, '01050', 'Ex-Hacienda de Guadalupe Chimalistac', 'Álvaro Obregón', 'Ciudad de México'),
(9, '01060', 'Altavista', 'Álvaro Obregón', 'Ciudad de México'),
(10, '01060', 'San Ángel Inn', 'Álvaro Obregón', 'Ciudad de México'),
(11, '01070', 'Chimalistac', 'Álvaro Obregón', 'Ciudad de México'),
(12, '01080', 'Progreso Tizapan', 'Álvaro Obregón', 'Ciudad de México'),
(13, '01089', 'Ermita Tizapan', 'Álvaro Obregón', 'Ciudad de México'),
(14, '01090', 'La Otra Banda', 'Álvaro Obregón', 'Ciudad de México'),
(15, '01090', 'Loreto', 'Álvaro Obregón', 'Ciudad de México'),
(16, '01090', 'Tizapan', 'Álvaro Obregón', 'Ciudad de México'),
(17, '01100', 'Pólvora', 'Álvaro Obregón', 'Ciudad de México'),
(18, '01109', 'La Conchita', 'Álvaro Obregón', 'Ciudad de México'),
(19, '01110', 'Belém de las Flores', 'Álvaro Obregón', 'Ciudad de México'),
(20, '01110', 'El Capulín', 'Álvaro Obregón', 'Ciudad de México'),
(21, '01110', 'Ampliación El Capulín', 'Álvaro Obregón', 'Ciudad de México'),
(22, '01110', 'Liberales de 1857', 'Álvaro Obregón', 'Ciudad de México'),
(23, '01120', 'Acueducto', 'Álvaro Obregón', 'Ciudad de México'),
(24, '01120', 'Cove', 'Álvaro Obregón', 'Ciudad de México'),
(25, '01120', 'Hidalgo', 'Álvaro Obregón', 'Ciudad de México'),
(26, '01120', 'Las Américas', 'Álvaro Obregón', 'Ciudad de México'),
(27, '01125', 'Ampliación Acueducto', 'Álvaro Obregón', 'Ciudad de México'),
(28, '01130', 'Paraíso', 'Álvaro Obregón', 'Ciudad de México'),
(29, '01130', 'Molino de Santo Domingo', 'Álvaro Obregón', 'Ciudad de México'),
(30, '01130', 'Real del Monte', 'Álvaro Obregón', 'Ciudad de México'),
(31, '01139', 'Reacomodo Pino Suárez', 'Álvaro Obregón', 'Ciudad de México'),
(32, '01140', 'Bellavista', 'Álvaro Obregón', 'Ciudad de México'),
(33, '01140', 'José Maria Pino Suárez', 'Álvaro Obregón', 'Ciudad de México'),
(34, '01150', 'Cristo Rey', 'Álvaro Obregón', 'Ciudad de México'),
(35, '01150', 'Tolteca', 'Álvaro Obregón', 'Ciudad de México'),
(36, '01160', 'Bosque', 'Álvaro Obregón', 'Ciudad de México'),
(37, '01160', 'Isidro Fabela', 'Álvaro Obregón', 'Ciudad de México'),
(38, '01160', 'Maria G. de García Ruiz', 'Álvaro Obregón', 'Ciudad de México'),
(39, '01160', '1a Victoria', 'Álvaro Obregón', 'Ciudad de México'),
(40, '01170', 'Abraham M. González', 'Álvaro Obregón', 'Ciudad de México'),
(41, '01180', 'Carola', 'Álvaro Obregón', 'Ciudad de México'),
(42, '01180', '8 de Agosto', 'Álvaro Obregón', 'Ciudad de México'),
(43, '01180', 'San Pedro de los Pinos', 'Álvaro Obregón', 'Ciudad de México'),
(44, '01200', 'Arturo Martínez', 'Álvaro Obregón', 'Ciudad de México'),
(45, '01210', 'Santa Fe', 'Álvaro Obregón', 'Ciudad de México'),
(46, '01219', 'Lomas de Santa Fe', 'Álvaro Obregón', 'Ciudad de México'),
(47, '01220', 'Bonanza', 'Álvaro Obregón', 'Ciudad de México'),
(48, '01220', 'Cuevitas', 'Álvaro Obregón', 'Ciudad de México'),
(49, '01220', 'El Cuernito', 'Álvaro Obregón', 'Ciudad de México'),
(50, '01220', 'Mártires de Tacubaya', 'Álvaro Obregón', 'Ciudad de México'),
(51, '01220', 'Zenón Delgado', 'Álvaro Obregón', 'Ciudad de México'),
(52, '01220', 'La Estrella', 'Álvaro Obregón', 'Ciudad de México'),
(53, '01230', 'Campo de Tiro los Gamitos', 'Álvaro Obregón', 'Ciudad de México'),
(54, '01230', 'Los Gamitos', 'Álvaro Obregón', 'Ciudad de México'),
(55, '01230', 'Tlapechico', 'Álvaro Obregón', 'Ciudad de México'),
(56, '01230', 'El Piru Santa Fe', 'Álvaro Obregón', 'Ciudad de México'),
(57, '01230', 'El Piru 2a Ampliación', 'Álvaro Obregón', 'Ciudad de México'),
(58, '01239', 'La Huerta', 'Álvaro Obregón', 'Ciudad de México'),
(59, '01240', 'Pueblo Nuevo', 'Álvaro Obregón', 'Ciudad de México'),
(60, '01250', 'El Árbol', 'Álvaro Obregón', 'Ciudad de México'),
(61, '01250', 'Ladera', 'Álvaro Obregón', 'Ciudad de México'),
(62, '01250', 'Lomas de Nuevo México', 'Álvaro Obregón', 'Ciudad de México'),
(63, '01250', 'Margarita Maza de Juárez', 'Álvaro Obregón', 'Ciudad de México'),
(64, '01250', 'Tecolalco', 'Álvaro Obregón', 'Ciudad de México'),
(65, '01259', 'Ampliación La Cebada', 'Álvaro Obregón', 'Ciudad de México'),
(66, '01259', 'La Mexicana 2a Ampliación', 'Álvaro Obregón', 'Ciudad de México'),
(67, '01260', 'Calzada Jalalpa', 'Álvaro Obregón', 'Ciudad de México'),
(68, '01260', 'La Mexicana', 'Álvaro Obregón', 'Ciudad de México'),
(69, '01260', 'Ampliación La Mexicana', 'Álvaro Obregón', 'Ciudad de México'),
(70, '01260', 'La Palmita', 'Álvaro Obregón', 'Ciudad de México'),
(71, '01260', 'Liberación Proletaria', 'Álvaro Obregón', 'Ciudad de México'),
(72, '01269', '1a Sección Cañada', 'Álvaro Obregón', 'Ciudad de México'),
(73, '01269', '2a Sección Cañada', 'Álvaro Obregón', 'Ciudad de México'),
(74, '01270', 'El Tejocote', 'Álvaro Obregón', 'Ciudad de México'),
(75, '01270', 'La Presa', 'Álvaro Obregón', 'Ciudad de México'),
(76, '01270', 'Golondrinas', 'Álvaro Obregón', 'Ciudad de México'),
(77, '01270', 'Golondrinas 1a Sección', 'Álvaro Obregón', 'Ciudad de México'),
(78, '01270', 'Golondrinas 2a Sección', 'Álvaro Obregón', 'Ciudad de México'),
(79, '01270', 'Lomas de Capula', 'Álvaro Obregón', 'Ciudad de México'),
(80, '01275', 'Villa Solidaridad', 'Álvaro Obregón', 'Ciudad de México'),
(81, '01276', 'El Pirul', 'Álvaro Obregón', 'Ciudad de México'),
(82, '01278', 'Desarrollo Urbano', 'Álvaro Obregón', 'Ciudad de México'),
(83, '01279', 'Lomas de Becerra', 'Álvaro Obregón', 'Ciudad de México'),
(84, '01280', 'Arvide', 'Álvaro Obregón', 'Ciudad de México'),
(85, '01280', 'El Pocito', 'Álvaro Obregón', 'Ciudad de México'),
(86, '01280', 'Francisco Villa', 'Álvaro Obregón', 'Ciudad de México'),
(87, '01280', 'La Joya', 'Álvaro Obregón', 'Ciudad de México'),
(88, '01285', 'El Rodeo', 'Álvaro Obregón', 'Ciudad de México'),
(89, '01289', 'Reacomodo El Cuernito', 'Álvaro Obregón', 'Ciudad de México'),
(90, '01290', 'Piloto Adolfo López Mateos', 'Álvaro Obregón', 'Ciudad de México'),
(91, '01290', 'Presidentes', 'Álvaro Obregón', 'Ciudad de México'),
(92, '01296', 'Jalalpa Tepito 2a Ampliación', 'Álvaro Obregón', 'Ciudad de México'),
(93, '01296', 'Ampliación Jalalpa', 'Álvaro Obregón', 'Ciudad de México'),
(94, '01296', 'Jalalpa Tepito', 'Álvaro Obregón', 'Ciudad de México'),
(95, '01298', 'Ampliación Piloto Adolfo López Mateos', 'Álvaro Obregón', 'Ciudad de México'),
(96, '01299', '1a Ampliación Presidentes', 'Álvaro Obregón', 'Ciudad de México'),
(97, '01299', '2a Ampliación Presidentes', 'Álvaro Obregón', 'Ciudad de México'),
(98, '01310', 'San Gabriel', 'Álvaro Obregón', 'Ciudad de México'),
(99, '01320', 'Carlos A. Madrazo', 'Álvaro Obregón', 'Ciudad de México'),
(100, '01330', 'Paseo de las Lomas', 'Álvaro Obregón', 'Ciudad de México'),
(101, '01340', 'Bejero del Pueblo Santa Fe', 'Álvaro Obregón', 'Ciudad de México'),
(102, '01376', 'Santa Fe', 'Álvaro Obregón', 'Ciudad de México'),
(103, '01376', 'Santa Fe Peña Blanca', 'Álvaro Obregón', 'Ciudad de México'),
(104, '01376', 'Santa Fe La Loma', 'Álvaro Obregón', 'Ciudad de México'),
(105, '01376', 'Santa Fe Centro Ciudad', 'Álvaro Obregón', 'Ciudad de México'),
(106, '01377', 'Jalalpa El Grande', 'Álvaro Obregón', 'Ciudad de México'),
(107, '01389', 'Santa Fe Tlayapaca', 'Álvaro Obregón', 'Ciudad de México'),
(108, '01400', 'Olivar del Conde 1a Sección', 'Álvaro Obregón', 'Ciudad de México'),
(109, '01400', 'Preconcreto', 'Álvaro Obregón', 'Ciudad de México'),
(110, '01407', 'Galeana', 'Álvaro Obregón', 'Ciudad de México'),
(111, '01408', 'Olivar del Conde 2a Sección', 'Álvaro Obregón', 'Ciudad de México'),
(112, '01410', 'Barrio Norte', 'Álvaro Obregón', 'Ciudad de México'),
(113, '01410', 'Palmas', 'Álvaro Obregón', 'Ciudad de México'),
(114, '01419', 'Minas Cristo Rey', 'Álvaro Obregón', 'Ciudad de México'),
(115, '01420', 'Sacramento', 'Álvaro Obregón', 'Ciudad de México'),
(116, '01420', 'Santa María Nonoalco', 'Álvaro Obregón', 'Ciudad de México'),
(117, '01430', 'Colina del Sur', 'Álvaro Obregón', 'Ciudad de México'),
(118, '01450', 'Hogar y Redención', 'Álvaro Obregón', 'Ciudad de México'),
(119, '01460', 'Alfonso XIII', 'Álvaro Obregón', 'Ciudad de México'),
(120, '01470', 'Alfalfar', 'Álvaro Obregón', 'Ciudad de México'),
(121, '01470', 'Molino de Rosas', 'Álvaro Obregón', 'Ciudad de México'),
(122, '01480', 'Lomas de Plateros', 'Álvaro Obregón', 'Ciudad de México'),
(123, '01490', 'La Cascada', 'Álvaro Obregón', 'Ciudad de México'),
(124, '01500', 'Santa Lucía', 'Álvaro Obregón', 'Ciudad de México'),
(125, '01500', 'Miguel Gaona Armenta', 'Álvaro Obregón', 'Ciudad de México'),
(126, '01509', 'Santa Lucía Chantepec', 'Álvaro Obregón', 'Ciudad de México'),
(127, '01510', 'Garcimarrero', 'Álvaro Obregón', 'Ciudad de México'),
(128, '01510', 'La Araña', 'Álvaro Obregón', 'Ciudad de México'),
(129, '01510', 'Los Cedros', 'Álvaro Obregón', 'Ciudad de México'),
(130, '01520', 'Ampliación Los Pirules', 'Álvaro Obregón', 'Ciudad de México'),
(131, '01520', 'Estado de Hidalgo', 'Álvaro Obregón', 'Ciudad de México'),
(132, '01520', 'Ampliación Estado de Hidalgo', 'Álvaro Obregón', 'Ciudad de México'),
(133, '01520', 'Piru Santa Lucía', 'Álvaro Obregón', 'Ciudad de México'),
(134, '01520', 'El Politoco', 'Álvaro Obregón', 'Ciudad de México'),
(135, '01530', 'Corpus Christy', 'Álvaro Obregón', 'Ciudad de México'),
(136, '01538', 'Tepopotla', 'Álvaro Obregón', 'Ciudad de México'),
(137, '01539', 'Acuilotla', 'Álvaro Obregón', 'Ciudad de México'),
(138, '01539', 'Cooperativa Unión Olivos', 'Álvaro Obregón', 'Ciudad de México'),
(139, '01540', 'Balcones de Cehuayo', 'Álvaro Obregón', 'Ciudad de México'),
(140, '01540', 'Cehuaya', 'Álvaro Obregón', 'Ciudad de México'),
(141, '01540', 'Llano Redondo', 'Álvaro Obregón', 'Ciudad de México'),
(142, '01540', 'Punta de Cehuaya', 'Álvaro Obregón', 'Ciudad de México'),
(143, '01548', 'Villa Progresista', 'Álvaro Obregón', 'Ciudad de México'),
(144, '01549', 'Dos Ríos del Pueblo Santa Lucía', 'Álvaro Obregón', 'Ciudad de México'),
(145, '01550', 'Tepeaca', 'Álvaro Obregón', 'Ciudad de México'),
(146, '01550', 'Ampliación Tepeaca', 'Álvaro Obregón', 'Ciudad de México'),
(147, '01550', 'Rinconada Las Cuevitas', 'Álvaro Obregón', 'Ciudad de México'),
(148, '01560', 'Ave Real', 'Álvaro Obregón', 'Ciudad de México'),
(149, '01560', 'Canutillo', 'Álvaro Obregón', 'Ciudad de México'),
(150, '01560', 'Canutillo 3a Sección', 'Álvaro Obregón', 'Ciudad de México'),
(151, '01560', 'Canutillo 2a Sección', 'Álvaro Obregón', 'Ciudad de México'),
(152, '01566', 'Hueytlale', 'Álvaro Obregón', 'Ciudad de México'),
(153, '01569', 'Reacomodo Valentín Gómez Farías', 'Álvaro Obregón', 'Ciudad de México'),
(154, '01588', 'Tarango', 'Álvaro Obregón', 'Ciudad de México'),
(155, '01590', 'El Rincón', 'Álvaro Obregón', 'Ciudad de México'),
(156, '01600', 'Merced Gómez', 'Álvaro Obregón', 'Ciudad de México'),
(157, '01610', 'Colinas de Tarango', 'Álvaro Obregón', 'Ciudad de México'),
(158, '01610', 'Profesor J. Arturo López Martínez', 'Álvaro Obregón', 'Ciudad de México'),
(159, '01618', 'Arcos Centenario', 'Álvaro Obregón', 'Ciudad de México'),
(160, '01618', 'Ex-Hacienda de Tarango', 'Álvaro Obregón', 'Ciudad de México'),
(161, '01619', 'La Martinica', 'Álvaro Obregón', 'Ciudad de México'),
(162, '01619', 'Rinconada de Tarango', 'Álvaro Obregón', 'Ciudad de México'),
(163, '01620', 'Lomas de Tarango', 'Álvaro Obregón', 'Ciudad de México'),
(164, '01630', 'Lomas de Puerta Grande', 'Álvaro Obregón', 'Ciudad de México'),
(165, '01630', 'Puerta Grande', 'Álvaro Obregón', 'Ciudad de México'),
(166, '01630', 'Los Juristas', 'Álvaro Obregón', 'Ciudad de México'),
(167, '01640', 'Herón Proal', 'Álvaro Obregón', 'Ciudad de México'),
(168, '01645', 'Ponciano Arriaga', 'Álvaro Obregón', 'Ciudad de México'),
(169, '01650', 'La Milagrosa', 'Álvaro Obregón', 'Ciudad de México'),
(170, '01650', 'Palmas Axotitla', 'Álvaro Obregón', 'Ciudad de México'),
(171, '01650', 'Tlacuitlapa', 'Álvaro Obregón', 'Ciudad de México'),
(172, '01650', 'Ampliación Tlacuitlapa', 'Álvaro Obregón', 'Ciudad de México'),
(173, '01650', '2o Reacomodo Tlacuitlapa', 'Álvaro Obregón', 'Ciudad de México'),
(174, '01650', 'El Ruedo', 'Álvaro Obregón', 'Ciudad de México'),
(175, '01650', 'Santa Lucía Chantepec', 'Álvaro Obregón', 'Ciudad de México'),
(176, '01700', 'La Joyita del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(177, '01700', 'Ocotillos del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(178, '01700', 'San Agustín del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(179, '01700', '2a Del Moral del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(180, '01700', 'Tecalcapa del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(181, '01700', 'Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(182, '01708', 'El Encino del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(183, '01708', 'El Mirador del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(184, '01710', 'Las Águilas', 'Álvaro Obregón', 'Ciudad de México'),
(185, '01710', 'Ampliación Alpes', 'Álvaro Obregón', 'Ciudad de México'),
(186, '01720', 'Lomas de Guadalupe', 'Álvaro Obregón', 'Ciudad de México'),
(187, '01729', 'Alcantarilla', 'Álvaro Obregón', 'Ciudad de México'),
(188, '01730', 'Lomas de las Águilas', 'Álvaro Obregón', 'Ciudad de México'),
(189, '01730', 'Puente Colorado', 'Álvaro Obregón', 'Ciudad de México'),
(190, '01740', 'La Peñita del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(191, '01740', 'San Clemente Norte', 'Álvaro Obregón', 'Ciudad de México'),
(192, '01740', 'San Clemente Sur', 'Álvaro Obregón', 'Ciudad de México'),
(193, '01750', 'Las Águilas 1a Sección', 'Álvaro Obregón', 'Ciudad de México'),
(194, '01750', 'Las Águilas 2o Parque', 'Álvaro Obregón', 'Ciudad de México'),
(195, '01750', 'Las Águilas 3er Parque', 'Álvaro Obregón', 'Ciudad de México'),
(196, '01759', 'Ampliación Las Águilas', 'Álvaro Obregón', 'Ciudad de México'),
(197, '01760', 'Atlamaya', 'Álvaro Obregón', 'Ciudad de México'),
(198, '01760', 'Flor de María', 'Álvaro Obregón', 'Ciudad de México'),
(199, '01760', 'La Herradura del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(200, '01770', 'La Angostura', 'Álvaro Obregón', 'Ciudad de México'),
(201, '01770', 'San José del Olivar', 'Álvaro Obregón', 'Ciudad de México'),
(202, '01780', 'Olivar de los Padres', 'Álvaro Obregón', 'Ciudad de México'),
(203, '01780', 'Tizampampano del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(204, '01789', 'Miguel Hidalgo', 'Álvaro Obregón', 'Ciudad de México'),
(205, '01790', 'Lomas de los Ángeles del Pueblo Tetelpan', 'Álvaro Obregón', 'Ciudad de México'),
(206, '01790', 'Lomas de San Ángel Inn', 'Álvaro Obregón', 'Ciudad de México'),
(207, '01800', 'San Bartolo Ameyalco', 'Álvaro Obregón', 'Ciudad de México'),
(208, '01807', 'Rancho San Francisco Pueblo San Bartolo Ameyalco', 'Álvaro Obregón', 'Ciudad de México'),
(209, '01810', 'Villa Verdún', 'Álvaro Obregón', 'Ciudad de México'),
(210, '01820', 'Lomas Axomiatla', 'Álvaro Obregón', 'Ciudad de México'),
(211, '01820', 'Ejido San Mateo', 'Álvaro Obregón', 'Ciudad de México'),
(212, '01830', 'Santa Rosa Xochiac', 'Álvaro Obregón', 'Ciudad de México'),
(213, '01840', 'Torres de Potrero', 'Álvaro Obregón', 'Ciudad de México'),
(214, '01849', 'Rincón de la Bolsa', 'Álvaro Obregón', 'Ciudad de México'),
(215, '01849', 'Rancho del Carmen del Pueblo San Bartolo Ameyalco', 'Álvaro Obregón', 'Ciudad de México'),
(216, '01857', 'Lomas de Chamontoya', 'Álvaro Obregón', 'Ciudad de México'),
(217, '01859', 'Tlacoyaque', 'Álvaro Obregón', 'Ciudad de México'),
(218, '01860', 'Lomas de La Era', 'Álvaro Obregón', 'Ciudad de México'),
(219, '01863', 'Lomas del Capulín', 'Álvaro Obregón', 'Ciudad de México'),
(220, '01870', 'Lomas de los Cedros', 'Álvaro Obregón', 'Ciudad de México'),
(221, '01900', 'Jardines del Pedregal', 'Álvaro Obregón', 'Ciudad de México'),
(222, '01904', 'San Jerónimo Aculco', 'Álvaro Obregón', 'Ciudad de México'),
(223, '02000', 'Centro de Azcapotzalco', 'Azcapotzalco', 'Ciudad de México'),
(224, '02010', 'Los Reyes', 'Azcapotzalco', 'Ciudad de México'),
(225, '02010', 'San Rafael', 'Azcapotzalco', 'Ciudad de México'),
(226, '02010', 'Nuevo Barrio San Rafael', 'Azcapotzalco', 'Ciudad de México'),
(227, '02020', 'San Marcos', 'Azcapotzalco', 'Ciudad de México'),
(228, '02020', 'Santo Tomás', 'Azcapotzalco', 'Ciudad de México'),
(229, '02040', 'Del Maestro', 'Azcapotzalco', 'Ciudad de México'),
(230, '02040', 'San Sebastián', 'Azcapotzalco', 'Ciudad de México'),
(231, '02050', 'Libertad', 'Azcapotzalco', 'Ciudad de México'),
(232, '02050', 'Santa María Malinalco', 'Azcapotzalco', 'Ciudad de México'),
(233, '02060', 'Sindicato Mexicano de Electricistas', 'Azcapotzalco', 'Ciudad de México'),
(234, '02060', 'Un Hogar Para Cada Trabajador', 'Azcapotzalco', 'Ciudad de México'),
(235, '02070', 'Del Recreo', 'Azcapotzalco', 'Ciudad de México'),
(236, '02070', 'Nextengo', 'Azcapotzalco', 'Ciudad de México'),
(237, '02080', 'Clavería', 'Azcapotzalco', 'Ciudad de México'),
(238, '02080', 'Sector Naval', 'Azcapotzalco', 'Ciudad de México'),
(239, '02090', 'San Álvaro', 'Azcapotzalco', 'Ciudad de México'),
(240, '02099', 'Ángel Zimbrón', 'Azcapotzalco', 'Ciudad de México'),
(241, '02100', 'El Rosario', 'Azcapotzalco', 'Ciudad de México'),
(242, '02120', 'San Martín Xochinahuac', 'Azcapotzalco', 'Ciudad de México'),
(243, '02128', 'Nueva El Rosario', 'Azcapotzalco', 'Ciudad de México'),
(244, '02129', 'Nueva España', 'Azcapotzalco', 'Ciudad de México'),
(245, '02130', 'Tierra Nueva', 'Azcapotzalco', 'Ciudad de México'),
(246, '02140', 'Santa Inés', 'Azcapotzalco', 'Ciudad de México'),
(247, '02150', 'Pasteros', 'Azcapotzalco', 'Ciudad de México'),
(248, '02160', 'Santo Domingo', 'Azcapotzalco', 'Ciudad de México'),
(249, '02200', 'Reynosa Tamaulipas', 'Azcapotzalco', 'Ciudad de México'),
(250, '02230', 'Santa Bárbara', 'Azcapotzalco', 'Ciudad de México'),
(251, '02240', 'San Andrés', 'Azcapotzalco', 'Ciudad de México'),
(252, '02240', 'San Andrés', 'Azcapotzalco', 'Ciudad de México'),
(253, '02250', 'Santa Catarina', 'Azcapotzalco', 'Ciudad de México'),
(254, '02300', 'Industrial Vallejo', 'Azcapotzalco', 'Ciudad de México'),
(255, '02310', 'Ferrería', 'Azcapotzalco', 'Ciudad de México'),
(256, '02320', 'San Andrés de las Salinas', 'Azcapotzalco', 'Ciudad de México'),
(257, '02330', 'Huautla de las Salinas', 'Azcapotzalco', 'Ciudad de México'),
(258, '02340', 'Santa Cruz de las Salinas', 'Azcapotzalco', 'Ciudad de México'),
(259, '02360', 'Las Salinas', 'Azcapotzalco', 'Ciudad de México'),
(260, '02400', 'San Juan Tlihuaca', 'Azcapotzalco', 'Ciudad de México'),
(261, '02410', 'Prados del Rosario', 'Azcapotzalco', 'Ciudad de México'),
(262, '02420', 'Ex-Hacienda El Rosario', 'Azcapotzalco', 'Ciudad de México'),
(263, '02440', 'Providencia', 'Azcapotzalco', 'Ciudad de México'),
(264, '02459', 'Tezozomoc', 'Azcapotzalco', 'Ciudad de México'),
(265, '02460', 'La Preciosa', 'Azcapotzalco', 'Ciudad de México'),
(266, '02470', 'Ampliación Petrolera', 'Azcapotzalco', 'Ciudad de México'),
(267, '02480', 'Petrolera', 'Azcapotzalco', 'Ciudad de México'),
(268, '02490', 'San Mateo', 'Azcapotzalco', 'Ciudad de México'),
(269, '02500', 'Unidad Cuitláhuac', 'Azcapotzalco', 'Ciudad de México'),
(270, '02519', 'El Jagüey', 'Azcapotzalco', 'Ciudad de México'),
(271, '02520', 'Estación Pantaco', 'Azcapotzalco', 'Ciudad de México'),
(272, '02530', 'Jardín Azpeitia', 'Azcapotzalco', 'Ciudad de México'),
(273, '02600', 'Pro-Hogar', 'Azcapotzalco', 'Ciudad de México'),
(274, '02630', 'Coltongo', 'Azcapotzalco', 'Ciudad de México'),
(275, '02630', 'Coltongo', 'Azcapotzalco', 'Ciudad de México'),
(276, '02640', 'Monte Alto', 'Azcapotzalco', 'Ciudad de México'),
(277, '02650', 'Trabajadores de Hierro', 'Azcapotzalco', 'Ciudad de México'),
(278, '02660', 'Euzkadi', 'Azcapotzalco', 'Ciudad de México'),
(279, '02670', 'Cosmopolita', 'Azcapotzalco', 'Ciudad de México'),
(280, '02680', 'Potrero del Llano', 'Azcapotzalco', 'Ciudad de México'),
(281, '02700', 'San Miguel Amantla', 'Azcapotzalco', 'Ciudad de México'),
(282, '02710', 'San Pedro Xalpa', 'Azcapotzalco', 'Ciudad de México'),
(283, '02719', 'Ampliación San Pedro Xalpa', 'Azcapotzalco', 'Ciudad de México'),
(284, '02720', 'San Antonio', 'Azcapotzalco', 'Ciudad de México'),
(285, '02720', 'San Bartolo Cahualtongo', 'Azcapotzalco', 'Ciudad de México'),
(286, '02730', 'San Francisco Tetecala', 'Azcapotzalco', 'Ciudad de México'),
(287, '02750', 'Santiago Ahuizotla', 'Azcapotzalco', 'Ciudad de México'),
(288, '02760', 'Industrial San Antonio', 'Azcapotzalco', 'Ciudad de México'),
(289, '02760', 'Santa Lucía', 'Azcapotzalco', 'Ciudad de México'),
(290, '02770', 'Santa Cruz Acayucan', 'Azcapotzalco', 'Ciudad de México'),
(291, '02780', 'Plenitud', 'Azcapotzalco', 'Ciudad de México'),
(292, '02790', 'Santa Apolonia', 'Azcapotzalco', 'Ciudad de México'),
(293, '02800', 'Nueva Santa María', 'Azcapotzalco', 'Ciudad de México'),
(294, '02810', 'Ignacio Allende', 'Azcapotzalco', 'Ciudad de México'),
(295, '02810', 'Victoria de las Democracias', 'Azcapotzalco', 'Ciudad de México'),
(296, '02830', 'San Bernabé', 'Azcapotzalco', 'Ciudad de México'),
(297, '02840', 'Obrero Popular', 'Azcapotzalco', 'Ciudad de México'),
(298, '02860', 'Tlatilco', 'Azcapotzalco', 'Ciudad de México'),
(299, '02870', 'San Salvador Xochimanca', 'Azcapotzalco', 'Ciudad de México'),
(300, '02900', 'Aguilera', 'Azcapotzalco', 'Ciudad de México'),
(301, '02910', 'Aldana', 'Azcapotzalco', 'Ciudad de México'),
(302, '02920', 'Ampliación Cosmopolita', 'Azcapotzalco', 'Ciudad de México'),
(303, '02930', 'Liberación', 'Azcapotzalco', 'Ciudad de México'),
(304, '02940', 'Porvenir', 'Azcapotzalco', 'Ciudad de México'),
(305, '02950', 'Del Gas', 'Azcapotzalco', 'Ciudad de México'),
(306, '02960', 'San Francisco Xocotitla', 'Azcapotzalco', 'Ciudad de México'),
(307, '02970', 'Ampliación Del Gas', 'Azcapotzalco', 'Ciudad de México'),
(308, '02980', 'Arenal', 'Azcapotzalco', 'Ciudad de México'),
(309, '02980', 'Patrimonio Familiar', 'Azcapotzalco', 'Ciudad de México'),
(310, '02990', 'La Raza', 'Azcapotzalco', 'Ciudad de México'),
(311, '03000', 'Piedad Narvarte', 'Benito Juárez', 'Ciudad de México'),
(312, '03010', 'Atenor Salas', 'Benito Juárez', 'Ciudad de México'),
(313, '03020', 'Narvarte Poniente', 'Benito Juárez', 'Ciudad de México'),
(314, '03023', 'Narvarte Oriente', 'Benito Juárez', 'Ciudad de México'),
(315, '03100', 'Del Valle Centro', 'Benito Juárez', 'Ciudad de México'),
(316, '03100', 'Insurgentes San Borja', 'Benito Juárez', 'Ciudad de México'),
(317, '03103', 'Del Valle Norte', 'Benito Juárez', 'Ciudad de México'),
(318, '03104', 'Del Valle Sur', 'Benito Juárez', 'Ciudad de México'),
(319, '03200', 'Tlacoquemécatl', 'Benito Juárez', 'Ciudad de México'),
(320, '03230', 'Actipan', 'Benito Juárez', 'Ciudad de México'),
(321, '03240', 'Acacias', 'Benito Juárez', 'Ciudad de México'),
(322, '03300', 'Portales Sur', 'Benito Juárez', 'Ciudad de México'),
(323, '03303', 'Portales Norte', 'Benito Juárez', 'Ciudad de México'),
(324, '03310', 'Santa Cruz Atoyac', 'Benito Juárez', 'Ciudad de México'),
(325, '03320', 'Residencial Emperadores', 'Benito Juárez', 'Ciudad de México'),
(326, '03330', 'Xoco', 'Benito Juárez', 'Ciudad de México'),
(327, '03340', 'General Pedro María Anaya', 'Benito Juárez', 'Ciudad de México'),
(328, '03400', 'Álamos', 'Benito Juárez', 'Ciudad de México'),
(329, '03410', 'Postal', 'Benito Juárez', 'Ciudad de México'),
(330, '03420', 'Miguel Alemán', 'Benito Juárez', 'Ciudad de México'),
(331, '03430', 'Josefa Ortiz de Domínguez', 'Benito Juárez', 'Ciudad de México'),
(332, '03440', 'Niños Héroes', 'Benito Juárez', 'Ciudad de México'),
(333, '03500', 'Nativitas', 'Benito Juárez', 'Ciudad de México'),
(334, '03510', 'Moderna', 'Benito Juárez', 'Ciudad de México'),
(335, '03520', 'Iztaccihuatl', 'Benito Juárez', 'Ciudad de México'),
(336, '03530', 'Villa de Cortes', 'Benito Juárez', 'Ciudad de México'),
(337, '03540', 'Del Carmen', 'Benito Juárez', 'Ciudad de México'),
(338, '03550', 'Zacahuitzco', 'Benito Juárez', 'Ciudad de México'),
(339, '03560', 'Albert', 'Benito Juárez', 'Ciudad de México'),
(340, '03570', 'Portales Oriente', 'Benito Juárez', 'Ciudad de México'),
(341, '03580', 'Miravalle', 'Benito Juárez', 'Ciudad de México'),
(342, '03590', 'Ermita', 'Benito Juárez', 'Ciudad de México'),
(343, '03600', 'Vértiz Narvarte', 'Benito Juárez', 'Ciudad de México'),
(344, '03610', 'Américas Unidas', 'Benito Juárez', 'Ciudad de México'),
(345, '03620', 'Periodista', 'Benito Juárez', 'Ciudad de México'),
(346, '03630', 'Independencia', 'Benito Juárez', 'Ciudad de México'),
(347, '03640', 'Del Lago', 'Benito Juárez', 'Ciudad de México'),
(348, '03650', 'Letrán Valle', 'Benito Juárez', 'Ciudad de México'),
(349, '03660', 'San Simón Ticumac', 'Benito Juárez', 'Ciudad de México'),
(350, '03700', 'Santa María Nonoalco', 'Benito Juárez', 'Ciudad de México'),
(351, '03710', 'Ciudad de los Deportes', 'Benito Juárez', 'Ciudad de México'),
(352, '03720', 'Nochebuena', 'Benito Juárez', 'Ciudad de México'),
(353, '03730', 'San Juan', 'Benito Juárez', 'Ciudad de México'),
(354, '03740', 'Extremadura Insurgentes', 'Benito Juárez', 'Ciudad de México'),
(355, '03800', 'San Pedro de los Pinos', 'Benito Juárez', 'Ciudad de México'),
(356, '03810', 'Nápoles', 'Benito Juárez', 'Ciudad de México'),
(357, '03820', '8 de Agosto', 'Benito Juárez', 'Ciudad de México'),
(358, '03840', 'Ampliación Nápoles', 'Benito Juárez', 'Ciudad de México'),
(359, '03900', 'San José Insurgentes', 'Benito Juárez', 'Ciudad de México'),
(360, '03910', 'Mixcoac', 'Benito Juárez', 'Ciudad de México'),
(361, '03920', 'Insurgentes Mixcoac', 'Benito Juárez', 'Ciudad de México'),
(362, '03930', 'Merced Gómez', 'Benito Juárez', 'Ciudad de México'),
(363, '03940', 'Crédito Constructor', 'Benito Juárez', 'Ciudad de México'),
(364, '04000', 'Villa Coyoacán', 'Coyoacán', 'Ciudad de México'),
(365, '04010', 'Santa Catarina', 'Coyoacán', 'Ciudad de México'),
(366, '04020', 'La Concepción', 'Coyoacán', 'Ciudad de México'),
(367, '04030', 'San Lucas', 'Coyoacán', 'Ciudad de México'),
(368, '04040', 'Parque San Andrés', 'Coyoacán', 'Ciudad de México'),
(369, '04100', 'Del Carmen', 'Coyoacán', 'Ciudad de México'),
(370, '04120', 'San Diego Churubusco', 'Coyoacán', 'Ciudad de México'),
(371, '04120', 'San Mateo', 'Coyoacán', 'Ciudad de México'),
(372, '04200', 'Campestre Churubusco', 'Coyoacán', 'Ciudad de México'),
(373, '04210', 'Churubusco Country Club', 'Coyoacán', 'Ciudad de México'),
(374, '04230', 'Prado Churubusco', 'Coyoacán', 'Ciudad de México'),
(375, '04240', 'Hermosillo', 'Coyoacán', 'Ciudad de México'),
(376, '04250', 'Paseos de Taxqueña', 'Coyoacán', 'Ciudad de México'),
(377, '04260', 'San Francisco Culhuacán Barrio de San Francisco', 'Coyoacán', 'Ciudad de México'),
(378, '04260', 'San Francisco Culhuacán Barrio de La Magdalena', 'Coyoacán', 'Ciudad de México'),
(379, '04260', 'San Francisco Culhuacán Barrio de Santa Ana', 'Coyoacán', 'Ciudad de México'),
(380, '04260', 'San Francisco Culhuacán Barrio de San Juan', 'Coyoacán', 'Ciudad de México'),
(381, '04300', 'Ajusco', 'Coyoacán', 'Ciudad de México'),
(382, '04310', 'Romero de Terreros', 'Coyoacán', 'Ciudad de México'),
(383, '04318', 'Oxtopulco Universidad', 'Coyoacán', 'Ciudad de México'),
(384, '04320', 'Cuadrante de San Francisco', 'Coyoacán', 'Ciudad de México'),
(385, '04320', 'Pedregal de San Francisco', 'Coyoacán', 'Ciudad de México'),
(386, '04330', 'El Rosedal', 'Coyoacán', 'Ciudad de México'),
(387, '04330', 'Los Reyes', 'Coyoacán', 'Ciudad de México'),
(388, '04330', 'Del Niño Jesús', 'Coyoacán', 'Ciudad de México'),
(389, '04340', 'Copilco El Bajo', 'Coyoacán', 'Ciudad de México'),
(390, '04360', 'Copilco El Alto', 'Coyoacán', 'Ciudad de México'),
(391, '04360', 'Copilco Universidad', 'Coyoacán', 'Ciudad de México'),
(392, '04369', 'Pedregal de Santo Domingo', 'Coyoacán', 'Ciudad de México'),
(393, '04370', 'Atlántida', 'Coyoacán', 'Ciudad de México'),
(394, '04370', 'Ciudad Jardín', 'Coyoacán', 'Ciudad de México'),
(395, '04380', 'El Rosario', 'Coyoacán', 'Ciudad de México'),
(396, '04380', 'La Candelaria', 'Coyoacán', 'Ciudad de México'),
(397, '04390', 'Huayamilpas', 'Coyoacán', 'Ciudad de México'),
(398, '04390', 'Nueva Díaz Ordaz', 'Coyoacán', 'Ciudad de México'),
(399, '04400', 'Educación', 'Coyoacán', 'Ciudad de México'),
(400, '04410', 'Petrolera Taxqueña', 'Coyoacán', 'Ciudad de México'),
(401, '04420', 'Ex-Ejido de San Francisco Culhuacán', 'Coyoacán', 'Ciudad de México'),
(402, '04440', 'Culhuacán CTM Sección V', 'Coyoacán', 'Ciudad de México'),
(403, '04440', 'Culhuacán CTM Sección II', 'Coyoacán', 'Ciudad de México'),
(404, '04440', 'Culhuacán CTM Sección I', 'Coyoacán', 'Ciudad de México'),
(405, '04450', 'El Centinela', 'Coyoacán', 'Ciudad de México'),
(406, '04460', 'Avante', 'Coyoacán', 'Ciudad de México'),
(407, '04470', 'Presidentes Ejidales 1a Sección', 'Coyoacán', 'Ciudad de México'),
(408, '04470', 'Presidentes Ejidales 2a Sección', 'Coyoacán', 'Ciudad de México'),
(409, '04480', 'Culhuacán CTM Sección VI', 'Coyoacán', 'Ciudad de México'),
(410, '04480', 'Culhuacán CTM Sección III', 'Coyoacán', 'Ciudad de México'),
(411, '04480', 'Culhuacán CTM CROC', 'Coyoacán', 'Ciudad de México'),
(412, '04480', 'Culhuacán CTM Sección X-A', 'Coyoacán', 'Ciudad de México'),
(413, '04489', 'Culhuacán CTM Sección VII', 'Coyoacán', 'Ciudad de México'),
(414, '04490', 'Culhuacán CTM Sección Piloto', 'Coyoacán', 'Ciudad de México'),
(415, '04490', 'Culhuacán CTM Canal Nacional', 'Coyoacán', 'Ciudad de México'),
(416, '04500', 'Jardines del Pedregal de San Ángel', 'Coyoacán', 'Ciudad de México'),
(417, '04510', 'Universidad Nacional Autónoma de México', 'Coyoacán', 'Ciudad de México'),
(418, '04519', 'La Otra Banda', 'Coyoacán', 'Ciudad de México'),
(419, '04530', 'Insurgentes Cuicuilco', 'Coyoacán', 'Ciudad de México'),
(420, '04600', 'Pedregal de Santa Úrsula', 'Coyoacán', 'Ciudad de México'),
(421, '04610', 'Xotepingo', 'Coyoacán', 'Ciudad de México'),
(422, '04620', 'San Pablo Tepetlapa', 'Coyoacán', 'Ciudad de México'),
(423, '04630', 'Adolfo Ruiz Cortínes', 'Coyoacán', 'Ciudad de México'),
(424, '04640', 'El Reloj', 'Coyoacán', 'Ciudad de México'),
(425, '04650', 'Santa Úrsula Coapa', 'Coyoacán', 'Ciudad de México'),
(426, '04660', 'Joyas del Pedregal', 'Coyoacán', 'Ciudad de México'),
(427, '04700', 'Pedregal de Carrasco', 'Coyoacán', 'Ciudad de México'),
(428, '04710', 'Olímpica', 'Coyoacán', 'Ciudad de México'),
(429, '04730', 'Cantil del Pedregal', 'Coyoacán', 'Ciudad de México'),
(430, '04730', 'Bosques de Tetlameya', 'Coyoacán', 'Ciudad de México'),
(431, '04739', 'El Caracol', 'Coyoacán', 'Ciudad de México'),
(432, '04800', 'Alianza Popular Revolucionaria', 'Coyoacán', 'Ciudad de México'),
(433, '04800', 'Los Cedros', 'Coyoacán', 'Ciudad de México'),
(434, '04810', 'Prados de Coyoacán', 'Coyoacán', 'Ciudad de México'),
(435, '04815', 'Emiliano Zapata', 'Coyoacán', 'Ciudad de México'),
(436, '04830', 'Los Cipreses', 'Coyoacán', 'Ciudad de México'),
(437, '04840', 'Ex-Ejido de San Pablo Tepetlapa', 'Coyoacán', 'Ciudad de México'),
(438, '04870', 'Espartaco', 'Coyoacán', 'Ciudad de México'),
(439, '04890', 'Jardines de Coyoacán', 'Coyoacán', 'Ciudad de México'),
(440, '04890', 'Los Olivos', 'Coyoacán', 'Ciudad de México'),
(441, '04899', 'El Parque de Coyoacán', 'Coyoacán', 'Ciudad de México'),
(442, '04909', 'Culhuacán CTM Sección VIII', 'Coyoacán', 'Ciudad de México'),
(443, '04909', 'Culhuacán CTM Sección IX-A', 'Coyoacán', 'Ciudad de México'),
(444, '04909', 'Culhuacán CTM Sección IX-B', 'Coyoacán', 'Ciudad de México'),
(445, '04910', 'Carmen Serdán', 'Coyoacán', 'Ciudad de México'),
(446, '04918', 'Cafetales', 'Coyoacán', 'Ciudad de México'),
(447, '04919', 'Emiliano Zapata Fraccionamiento Popular', 'Coyoacán', 'Ciudad de México'),
(448, '04920', 'Los Girasoles', 'Coyoacán', 'Ciudad de México'),
(449, '04929', 'Las Campanas', 'Coyoacán', 'Ciudad de México'),
(450, '04930', 'Santa Cecilia', 'Coyoacán', 'Ciudad de México'),
(451, '04938', 'Campestre Coyoacán', 'Coyoacán', 'Ciudad de México'),
(452, '04939', 'Culhuacán CTM Sección X', 'Coyoacán', 'Ciudad de México'),
(453, '04940', 'Los Sauces', 'Coyoacán', 'Ciudad de México'),
(454, '04950', 'El Mirador', 'Coyoacán', 'Ciudad de México'),
(455, '04960', 'Villa Quietud', 'Coyoacán', 'Ciudad de México'),
(456, '04970', 'Haciendas de Coyoacán', 'Coyoacán', 'Ciudad de México'),
(457, '04980', 'Ex-Ejido de Santa Úrsula Coapa', 'Coyoacán', 'Ciudad de México'),
(458, '04980', 'Ex-Hacienda Coapa', 'Coyoacán', 'Ciudad de México'),
(459, '04980', 'Viejo Ejido de Santa Úrsula Coapa', 'Coyoacán', 'Ciudad de México'),
(460, '05000', 'Cuajimalpa', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(461, '05010', 'Zentlapatl', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(462, '05020', 'Loma del Padre', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(463, '05030', 'San Pedro', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(464, '05030', 'La Manzanita', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(465, '05050', 'San Pablo Chimalpa', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(466, '05100', 'Lomas de Vista Hermosa', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(467, '05110', 'Cooperativa Palo Alto', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(468, '05118', 'Granjas Palo Alto', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(469, '05119', 'Campestre Palo Alto', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(470, '05120', 'Bosques de las Lomas', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(471, '05129', 'Lomas del Chamizal', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(472, '05200', 'San José de los Cedros', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(473, '05219', 'Granjas Navidad', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(474, '05220', 'Tepetongo', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(475, '05230', 'El Ébano', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(476, '05240', 'El Molino', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(477, '05260', 'Jesús del Monte', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(478, '05269', 'Amado Nervo', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(479, '05270', 'Manzanastitla', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(480, '05280', 'Adolfo López Mateos', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(481, '05310', 'El Molinito', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(482, '05320', 'El Yaqui', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(483, '05330', 'Lomas de Memetla', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(484, '05330', 'Memetla', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(485, '05330', 'Ampliación Memetla', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(486, '05330', 'Ampliación el Yaqui', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(487, '05348', 'Santa Fe Cuajimalpa', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(488, '05360', 'Locaxco', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(489, '05370', 'Las Tinajas', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(490, '05379', 'Lomas de San Pedro', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(491, '05400', 'El Tianguillo', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(492, '05410', 'San Lorenzo Acopilco', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(493, '05410', '1° de Mayo', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(494, '05500', 'Contadero', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(495, '05520', 'La Venta', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(496, '05530', 'Abdías García Soto', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(497, '05600', 'San Mateo Tlaltenango', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(498, '05610', 'Santa Rosa Xochiac', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(499, '05700', 'Cruz Blanca', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(500, '05710', 'Las Maromas', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(501, '05730', 'Xalpa', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(502, '05750', 'La Pila', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(503, '05760', 'Las Lajas', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(504, '05780', 'Agua Bendita', 'Cuajimalpa de Morelos', 'Ciudad de México'),
(505, '06000', 'Centro (Área 1)', 'Cuauhtémoc', 'Ciudad de México'),
(506, '06010', 'Centro (Área 2)', 'Cuauhtémoc', 'Ciudad de México'),
(507, '06020', 'Centro (Área 3)', 'Cuauhtémoc', 'Ciudad de México'),
(508, '06030', 'Tabacalera', 'Cuauhtémoc', 'Ciudad de México'),
(509, '06040', 'Centro (Área 4)', 'Cuauhtémoc', 'Ciudad de México'),
(510, '06050', 'Centro (Área 5)', 'Cuauhtémoc', 'Ciudad de México'),
(511, '06060', 'Centro (Área 6)', 'Cuauhtémoc', 'Ciudad de México'),
(512, '06070', 'Centro (Área 7)', 'Cuauhtémoc', 'Ciudad de México'),
(513, '06080', 'Centro (Área 8)', 'Cuauhtémoc', 'Ciudad de México'),
(514, '06090', 'Centro (Área 9)', 'Cuauhtémoc', 'Ciudad de México'),
(515, '06100', 'Hipódromo', 'Cuauhtémoc', 'Ciudad de México'),
(516, '06140', 'Condesa', 'Cuauhtémoc', 'Ciudad de México'),
(517, '06170', 'Hipódromo Condesa', 'Cuauhtémoc', 'Ciudad de México'),
(518, '06200', 'Morelos', 'Cuauhtémoc', 'Ciudad de México'),
(519, '06220', 'Peralvillo', 'Cuauhtémoc', 'Ciudad de México'),
(520, '06240', 'Valle Gómez', 'Cuauhtémoc', 'Ciudad de México'),
(521, '06250', 'Ex-Hipódromo de Peralvillo', 'Cuauhtémoc', 'Ciudad de México'),
(522, '06270', 'Maza', 'Cuauhtémoc', 'Ciudad de México'),
(523, '06280', 'Felipe Pescador', 'Cuauhtémoc', 'Ciudad de México'),
(524, '06300', 'Guerrero', 'Cuauhtémoc', 'Ciudad de México'),
(525, '06350', 'Buenavista', 'Cuauhtémoc', 'Ciudad de México'),
(526, '06400', 'Santa María la Ribera', 'Cuauhtémoc', 'Ciudad de México'),
(527, '06430', 'Santa María Insurgentes', 'Cuauhtémoc', 'Ciudad de México'),
(528, '06450', 'Atlampa', 'Cuauhtémoc', 'Ciudad de México'),
(529, '06470', 'San Rafael', 'Cuauhtémoc', 'Ciudad de México'),
(530, '06500', 'Cuauhtémoc', 'Cuauhtémoc', 'Ciudad de México'),
(531, '06600', 'Juárez', 'Cuauhtémoc', 'Ciudad de México'),
(532, '06700', 'Roma Norte', 'Cuauhtémoc', 'Ciudad de México'),
(533, '06720', 'Doctores', 'Cuauhtémoc', 'Ciudad de México'),
(534, '06760', 'Roma Sur', 'Cuauhtémoc', 'Ciudad de México'),
(535, '06780', 'Buenos Aires', 'Cuauhtémoc', 'Ciudad de México'),
(536, '06800', 'Obrera', 'Cuauhtémoc', 'Ciudad de México'),
(537, '06820', 'Tránsito', 'Cuauhtémoc', 'Ciudad de México'),
(538, '06840', 'Esperanza', 'Cuauhtémoc', 'Ciudad de México'),
(539, '06850', 'Asturias', 'Cuauhtémoc', 'Ciudad de México'),
(540, '06860', 'Vista Alegre', 'Cuauhtémoc', 'Ciudad de México'),
(541, '06870', 'Paulino Navarro', 'Cuauhtémoc', 'Ciudad de México'),
(542, '06880', 'Algarin', 'Cuauhtémoc', 'Ciudad de México'),
(543, '06890', 'Ampliación Asturias', 'Cuauhtémoc', 'Ciudad de México'),
(544, '06900', 'Nonoalco Tlatelolco', 'Cuauhtémoc', 'Ciudad de México'),
(545, '06920', 'San Simón Tolnáhuac', 'Cuauhtémoc', 'Ciudad de México'),
(546, '07000', 'Aragón la Villa', 'Gustavo A. Madero', 'Ciudad de México'),
(547, '07010', 'Rosas del Tepeyac', 'Gustavo A. Madero', 'Ciudad de México'),
(548, '07010', 'Santa Isabel Tola', 'Gustavo A. Madero', 'Ciudad de México'),
(549, '07010', 'Tepetates', 'Gustavo A. Madero', 'Ciudad de México'),
(550, '07020', 'Tepeyac Insurgentes', 'Gustavo A. Madero', 'Ciudad de México'),
(551, '07040', 'Santiago Atzacoalco', 'Gustavo A. Madero', 'Ciudad de México'),
(552, '07050', 'Villa Gustavo A. Madero', 'Gustavo A. Madero', 'Ciudad de México'),
(553, '07058', '15 de Agosto', 'Gustavo A. Madero', 'Ciudad de México'),
(554, '07060', 'Estanzuela', 'Gustavo A. Madero', 'Ciudad de México'),
(555, '07069', 'Triunfo de La República', 'Gustavo A. Madero', 'Ciudad de México'),
(556, '07070', 'La Cruz', 'Gustavo A. Madero', 'Ciudad de México'),
(557, '07070', 'Dinamita', 'Gustavo A. Madero', 'Ciudad de México'),
(558, '07070', 'Martín Carrera', 'Gustavo A. Madero', 'Ciudad de México'),
(559, '07080', 'Gabriel Hernández', 'Gustavo A. Madero', 'Ciudad de México'),
(560, '07089', 'Ampliación Gabriel Hernández', 'Gustavo A. Madero', 'Ciudad de México'),
(561, '07090', 'C.T.M. Atzacoalco', 'Gustavo A. Madero', 'Ciudad de México'),
(562, '07090', 'C.T.M. El Risco', 'Gustavo A. Madero', 'Ciudad de México'),
(563, '07100', 'Cuautepec Barrio Alto', 'Gustavo A. Madero', 'Ciudad de México'),
(564, '07100', 'San Miguel', 'Gustavo A. Madero', 'Ciudad de México'),
(565, '07109', 'San Antonio', 'Gustavo A. Madero', 'Ciudad de México'),
(566, '07110', 'Lomas de Cuautepec', 'Gustavo A. Madero', 'Ciudad de México'),
(567, '07119', 'Malacates', 'Gustavo A. Madero', 'Ciudad de México'),
(568, '07119', 'Ampliación Malacates', 'Gustavo A. Madero', 'Ciudad de México'),
(569, '07130', 'Compositores Mexicanos', 'Gustavo A. Madero', 'Ciudad de México'),
(570, '07130', 'El Tepetatal', 'Gustavo A. Madero', 'Ciudad de México'),
(571, '07140', 'Arboledas', 'Gustavo A. Madero', 'Ciudad de México'),
(572, '07140', 'Ampliación Arboledas', 'Gustavo A. Madero', 'Ciudad de México'),
(573, '07140', 'Forestal', 'Gustavo A. Madero', 'Ciudad de México'),
(574, '07140', 'Forestal I', 'Gustavo A. Madero', 'Ciudad de México'),
(575, '07144', 'Forestal II', 'Gustavo A. Madero', 'Ciudad de México'),
(576, '07144', 'La Lengüeta', 'Gustavo A. Madero', 'Ciudad de México'),
(577, '07149', 'Parque Metropolitano', 'Gustavo A. Madero', 'Ciudad de México'),
(578, '07150', 'Juventino Rosas', 'Gustavo A. Madero', 'Ciudad de México'),
(579, '07150', 'La Casilda', 'Gustavo A. Madero', 'Ciudad de México'),
(580, '07160', 'Loma La Palma', 'Gustavo A. Madero', 'Ciudad de México'),
(581, '07164', 'Luis Donaldo Colosio', 'Gustavo A. Madero', 'Ciudad de México'),
(582, '07164', 'Tlacaélel', 'Gustavo A. Madero', 'Ciudad de México'),
(583, '07164', 'Graciano Sánchez', 'Gustavo A. Madero', 'Ciudad de México'),
(584, '07164', 'Prados de Cuautepec', 'Gustavo A. Madero', 'Ciudad de México'),
(585, '07170', 'Palmatitla', 'Gustavo A. Madero', 'Ciudad de México'),
(586, '07180', 'Cocoyotes', 'Gustavo A. Madero', 'Ciudad de México'),
(587, '07180', 'General Felipe Berriozabal', 'Gustavo A. Madero', 'Ciudad de México'),
(588, '07180', 'Ampliación Cocoyotes', 'Gustavo A. Madero', 'Ciudad de México'),
(589, '07183', '6 de Junio', 'Gustavo A. Madero', 'Ciudad de México'),
(590, '07187', 'Vista Hermosa', 'Gustavo A. Madero', 'Ciudad de México'),
(591, '07188', 'Tlalpexco', 'Gustavo A. Madero', 'Ciudad de México'),
(592, '07189', 'Ahuehuetes', 'Gustavo A. Madero', 'Ciudad de México'),
(593, '07190', 'Valle de Madero', 'Gustavo A. Madero', 'Ciudad de México'),
(594, '07199', 'Del Carmen', 'Gustavo A. Madero', 'Ciudad de México'),
(595, '07200', 'Cuautepec de Madero', 'Gustavo A. Madero', 'Ciudad de México'),
(596, '07207', 'Del Bosque', 'Gustavo A. Madero', 'Ciudad de México'),
(597, '07209', 'Guadalupe Victoria Cuautepec', 'Gustavo A. Madero', 'Ciudad de México'),
(598, '07210', 'Chalma de Guadalupe', 'Gustavo A. Madero', 'Ciudad de México'),
(599, '07214', 'Ampliación Chalma de Guadalupe', 'Gustavo A. Madero', 'Ciudad de México'),
(600, '07220', 'Castillo Chico', 'Gustavo A. Madero', 'Ciudad de México'),
(601, '07220', 'Castillo Grande', 'Gustavo A. Madero', 'Ciudad de México'),
(602, '07224', 'Ampliación Castillo Grande', 'Gustavo A. Madero', 'Ciudad de México'),
(603, '07230', 'Zona Escolar', 'Gustavo A. Madero', 'Ciudad de México'),
(604, '07239', 'Zona Escolar Oriente', 'Gustavo A. Madero', 'Ciudad de México'),
(605, '07240', 'El Arbolillo', 'Gustavo A. Madero', 'Ciudad de México'),
(606, '07250', 'Benito Juárez', 'Gustavo A. Madero', 'Ciudad de México'),
(607, '07259', 'Ampliación Benito Juárez', 'Gustavo A. Madero', 'Ciudad de México'),
(608, '07268', 'Solidaridad Nacional', 'Gustavo A. Madero', 'Ciudad de México'),
(609, '07270', 'Residencial Acueducto de Guadalupe', 'Gustavo A. Madero', 'Ciudad de México'),
(610, '07279', 'Acueducto de Guadalupe', 'Gustavo A. Madero', 'Ciudad de México'),
(611, '07280', 'Jorge Negrete', 'Gustavo A. Madero', 'Ciudad de México'),
(612, '07290', 'La Pastora', 'Gustavo A. Madero', 'Ciudad de México'),
(613, '07300', 'Lindavista Norte', 'Gustavo A. Madero', 'Ciudad de México'),
(614, '07300', 'Lindavista Sur', 'Gustavo A. Madero', 'Ciudad de México'),
(615, '07310', 'Candelaria Ticomán', 'Gustavo A. Madero', 'Ciudad de México'),
(616, '07320', 'La Purísima Ticomán', 'Gustavo A. Madero', 'Ciudad de México'),
(617, '07320', 'Residencial la Escalera', 'Gustavo A. Madero', 'Ciudad de México'),
(618, '07330', 'Santa María Ticomán', 'Gustavo A. Madero', 'Ciudad de México'),
(619, '07340', 'La Laguna Ticomán', 'Gustavo A. Madero', 'Ciudad de México'),
(620, '07340', 'San José Ticomán', 'Gustavo A. Madero', 'Ciudad de México'),
(621, '07350', 'Guadalupe Ticomán', 'Gustavo A. Madero', 'Ciudad de México'),
(622, '07350', 'San Juan y Guadalupe Ticomán', 'Gustavo A. Madero', 'Ciudad de México'),
(623, '07359', 'San Rafael Ticomán', 'Gustavo A. Madero', 'Ciudad de México'),
(624, '07360', 'San Pedro Zacatenco', 'Gustavo A. Madero', 'Ciudad de México'),
(625, '07369', 'Residencial Zacatenco', 'Gustavo A. Madero', 'Ciudad de México'),
(626, '07370', 'Capultitlan', 'Gustavo A. Madero', 'Ciudad de México'),
(627, '07380', 'Maximino Ávila Camacho', 'Gustavo A. Madero', 'Ciudad de México'),
(628, '07380', 'Tlacamaca', 'Gustavo A. Madero', 'Ciudad de México'),
(629, '07400', 'Salvador Díaz Mirón', 'Gustavo A. Madero', 'Ciudad de México'),
(630, '07410', 'Juan González Romero', 'Gustavo A. Madero', 'Ciudad de México'),
(631, '07410', 'Villa Hermosa', 'Gustavo A. Madero', 'Ciudad de México'),
(632, '07420', 'El Coyol', 'Gustavo A. Madero', 'Ciudad de México'),
(633, '07420', 'Nueva Atzacoalco', 'Gustavo A. Madero', 'Ciudad de México'),
(634, '07430', 'Del Obrero', 'Gustavo A. Madero', 'Ciudad de México'),
(635, '07440', 'Vasco de Quiroga', 'Gustavo A. Madero', 'Ciudad de México'),
(636, '07450', 'DM Nacional', 'Gustavo A. Madero', 'Ciudad de México'),
(637, '07455', 'Ferrocarrilera', 'Gustavo A. Madero', 'Ciudad de México'),
(638, '07456', 'LI Legislatura', 'Gustavo A. Madero', 'Ciudad de México'),
(639, '07460', 'Granjas Modernas', 'Gustavo A. Madero', 'Ciudad de México'),
(640, '07469', 'Constitución de la República', 'Gustavo A. Madero', 'Ciudad de México'),
(641, '07470', 'Ampliación San Juan de Aragón', 'Gustavo A. Madero', 'Ciudad de México'),
(642, '07480', 'San Pedro El Chico', 'Gustavo A. Madero', 'Ciudad de México'),
(643, '07500', 'La Pradera', 'Gustavo A. Madero', 'Ciudad de México'),
(644, '07509', 'Pradera II Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(645, '07510', 'San Felipe de Jesús', 'Gustavo A. Madero', 'Ciudad de México'),
(646, '07520', '25 de Julio', 'Gustavo A. Madero', 'Ciudad de México'),
(647, '07530', 'Campestre Aragón', 'Gustavo A. Madero', 'Ciudad de México'),
(648, '07540', 'La Esmeralda', 'Gustavo A. Madero', 'Ciudad de México'),
(649, '07550', 'Providencia', 'Gustavo A. Madero', 'Ciudad de México'),
(650, '07560', 'Ampliación Providencia', 'Gustavo A. Madero', 'Ciudad de México'),
(651, '07570', 'Villa de Aragón', 'Gustavo A. Madero', 'Ciudad de México'),
(652, '07580', 'Ampliación Casas Alemán', 'Gustavo A. Madero', 'Ciudad de México'),
(653, '07600', 'Progreso Nacional', 'Gustavo A. Madero', 'Ciudad de México'),
(654, '07620', 'Santa Rosa', 'Gustavo A. Madero', 'Ciudad de México'),
(655, '07630', 'San José de la Escalera', 'Gustavo A. Madero', 'Ciudad de México'),
(656, '07640', 'Santiago Atepetlac', 'Gustavo A. Madero', 'Ciudad de México'),
(657, '07650', 'Ampliación Progreso Nacional', 'Gustavo A. Madero', 'Ciudad de México'),
(658, '07670', 'Guadalupe Proletaria', 'Gustavo A. Madero', 'Ciudad de México'),
(659, '07680', 'Ampliación Guadalupe Proletaria', 'Gustavo A. Madero', 'Ciudad de México'),
(660, '07700', 'Nueva Industrial Vallejo', 'Gustavo A. Madero', 'Ciudad de México'),
(661, '07707', 'Siete Maravillas', 'Gustavo A. Madero', 'Ciudad de México'),
(662, '07708', 'Torres Lindavista', 'Gustavo A. Madero', 'Ciudad de México'),
(663, '07720', 'Lindavista Vallejo I Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(664, '07730', 'Churubusco Tepeyac', 'Gustavo A. Madero', 'Ciudad de México'),
(665, '07730', 'Montevideo', 'Gustavo A. Madero', 'Ciudad de México'),
(666, '07730', 'San Bartolo Atepehuacan', 'Gustavo A. Madero', 'Ciudad de México'),
(667, '07739', 'Planetario Lindavista', 'Gustavo A. Madero', 'Ciudad de México'),
(668, '07740', 'Valle del Tepeyac', 'Gustavo A. Madero', 'Ciudad de México'),
(669, '07750', 'Nueva Vallejo', 'Gustavo A. Madero', 'Ciudad de México'),
(670, '07754', 'Lindavista Vallejo III Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(671, '07755', 'Lindavista Vallejo II Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(672, '07760', 'Magdalena de las Salinas', 'Gustavo A. Madero', 'Ciudad de México'),
(673, '07770', 'Panamericana', 'Gustavo A. Madero', 'Ciudad de México'),
(674, '07770', 'Ampliación Panamericana', 'Gustavo A. Madero', 'Ciudad de México'),
(675, '07780', 'Defensores de La República', 'Gustavo A. Madero', 'Ciudad de México'),
(676, '07780', 'Héroe de Nacozari', 'Gustavo A. Madero', 'Ciudad de México'),
(677, '07790', 'Guadalupe Victoria', 'Gustavo A. Madero', 'Ciudad de México'),
(678, '07790', 'Vallejo Poniente', 'Gustavo A. Madero', 'Ciudad de México'),
(679, '07800', 'Industrial', 'Gustavo A. Madero', 'Ciudad de México'),
(680, '07810', 'Estrella', 'Gustavo A. Madero', 'Ciudad de México'),
(681, '07820', 'Aragón Inguarán', 'Gustavo A. Madero', 'Ciudad de México'),
(682, '07820', 'Tres Estrellas', 'Gustavo A. Madero', 'Ciudad de México'),
(683, '07830', 'Gertrudis Sánchez 1a Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(684, '07838', 'Gertrudis Sánchez 3a Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(685, '07839', 'Gertrudis Sánchez 2a Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(686, '07840', 'Guadalupe Tepeyac', 'Gustavo A. Madero', 'Ciudad de México'),
(687, '07840', '7 de Noviembre', 'Gustavo A. Madero', 'Ciudad de México'),
(688, '07850', 'Bondojito', 'Gustavo A. Madero', 'Ciudad de México'),
(689, '07850', 'Faja de Oro', 'Gustavo A. Madero', 'Ciudad de México'),
(690, '07858', 'Ampliación Emiliano Zapata', 'Gustavo A. Madero', 'Ciudad de México'),
(691, '07859', 'Ampliación Mártires de Río Blanco', 'Gustavo A. Madero', 'Ciudad de México'),
(692, '07860', 'La Joyita', 'Gustavo A. Madero', 'Ciudad de México'),
(693, '07860', 'Tablas de San Agustín', 'Gustavo A. Madero', 'Ciudad de México'),
(694, '07869', 'Belisario Domínguez', 'Gustavo A. Madero', 'Ciudad de México'),
(695, '07870', 'Guadalupe Insurgentes', 'Gustavo A. Madero', 'Ciudad de México'),
(696, '07870', 'Vallejo', 'Gustavo A. Madero', 'Ciudad de México');
INSERT INTO `t_cat_data_dir` (`id_cat_data_dir`, `codigo_postal`, `colonia`, `alcaldia`, `entidad_federativa`) VALUES
(697, '07880', 'Mártires de Río Blanco', 'Gustavo A. Madero', 'Ciudad de México'),
(698, '07889', 'Emiliano Zapata', 'Gustavo A. Madero', 'Ciudad de México'),
(699, '07890', 'Nueva Tenochtitlán', 'Gustavo A. Madero', 'Ciudad de México'),
(700, '07890', 'Cuchilla La Joya', 'Gustavo A. Madero', 'Ciudad de México'),
(701, '07890', 'La Joya', 'Gustavo A. Madero', 'Ciudad de México'),
(702, '07899', 'La Malinche', 'Gustavo A. Madero', 'Ciudad de México'),
(703, '07900', 'Cuchilla del Tesoro', 'Gustavo A. Madero', 'Ciudad de México'),
(704, '07910', 'San Juan de Aragón VII Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(705, '07918', 'San Juan de Aragón VI Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(706, '07919', 'Ex Ejido San Juan de Aragón Sector 32', 'Gustavo A. Madero', 'Ciudad de México'),
(707, '07920', 'El Olivo', 'Gustavo A. Madero', 'Ciudad de México'),
(708, '07920', 'San Juan de Aragón', 'Gustavo A. Madero', 'Ciudad de México'),
(709, '07930', 'Indeco', 'Gustavo A. Madero', 'Ciudad de México'),
(710, '07939', 'Héroes de Chapultepec', 'Gustavo A. Madero', 'Ciudad de México'),
(711, '07940', 'Ex Ejido San Juan de Aragón Sector 33', 'Gustavo A. Madero', 'Ciudad de México'),
(712, '07950', 'San Juan de Aragón', 'Gustavo A. Madero', 'Ciudad de México'),
(713, '07960', 'Héroes de Cerro Prieto', 'Gustavo A. Madero', 'Ciudad de México'),
(714, '07960', 'Ex Escuela de Tiro', 'Gustavo A. Madero', 'Ciudad de México'),
(715, '07960', 'Fernando Casas Alemán', 'Gustavo A. Madero', 'Ciudad de México'),
(716, '07969', 'San Juan de Aragón I Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(717, '07969', 'San Juan de Aragón II Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(718, '07970', 'San Juan de Aragón III Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(719, '07979', 'San Juan de Aragón IV Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(720, '07979', 'San Juan de Aragón V Sección', 'Gustavo A. Madero', 'Ciudad de México'),
(721, '07980', 'Narciso Bassols', 'Gustavo A. Madero', 'Ciudad de México'),
(722, '07990', 'C.T.M. Aragón', 'Gustavo A. Madero', 'Ciudad de México'),
(723, '08000', 'Gabriel Ramos Millán Sección Bramadero', 'Iztacalco', 'Ciudad de México'),
(724, '08010', 'Ex-Ejido de La Magdalena Mixiuhca', 'Iztacalco', 'Ciudad de México'),
(725, '08020', 'Ampliación Gabriel Ramos Millán', 'Iztacalco', 'Ciudad de México'),
(726, '08030', 'Gabriel Ramos Millán Sección Cuchilla', 'Iztacalco', 'Ciudad de México'),
(727, '08040', 'Carlos Zapata Vela', 'Iztacalco', 'Ciudad de México'),
(728, '08100', 'Agrícola Pantitlán', 'Iztacalco', 'Ciudad de México'),
(729, '08200', 'Viaducto Piedad', 'Iztacalco', 'Ciudad de México'),
(730, '08210', 'Nueva Santa Anita', 'Iztacalco', 'Ciudad de México'),
(731, '08220', 'San Pedro', 'Iztacalco', 'Ciudad de México'),
(732, '08230', 'San Francisco Xicaltongo', 'Iztacalco', 'Ciudad de México'),
(733, '08240', 'Santiago Norte', 'Iztacalco', 'Ciudad de México'),
(734, '08300', 'Santa Anita', 'Iztacalco', 'Ciudad de México'),
(735, '08310', 'La Cruz', 'Iztacalco', 'Ciudad de México'),
(736, '08320', 'Fraccionamiento Coyuya', 'Iztacalco', 'Ciudad de México'),
(737, '08400', 'Granjas México', 'Iztacalco', 'Ciudad de México'),
(738, '08420', 'Cuchilla Agrícola Oriental', 'Iztacalco', 'Ciudad de México'),
(739, '08500', 'Agrícola Oriental', 'Iztacalco', 'Ciudad de México'),
(740, '08510', 'El Rodeo', 'Iztacalco', 'Ciudad de México'),
(741, '08600', 'La Asunción', 'Iztacalco', 'Ciudad de México'),
(742, '08610', 'Zapotla', 'Iztacalco', 'Ciudad de México'),
(743, '08620', 'Los Reyes', 'Iztacalco', 'Ciudad de México'),
(744, '08650', 'San Miguel', 'Iztacalco', 'Ciudad de México'),
(745, '08700', 'Juventino Rosas', 'Iztacalco', 'Ciudad de México'),
(746, '08710', 'Tlazintla', 'Iztacalco', 'Ciudad de México'),
(747, '08720', 'Gabriel Ramos Millán Sección Tlacotal', 'Iztacalco', 'Ciudad de México'),
(748, '08730', 'Gabriel Ramos Millán', 'Iztacalco', 'Ciudad de México'),
(749, '08760', 'INPI Picos', 'Iztacalco', 'Ciudad de México'),
(750, '08760', 'Los Picos de Iztacalco Sección 2A', 'Iztacalco', 'Ciudad de México'),
(751, '08760', 'Los Picos de Iztacalco Sección 1B', 'Iztacalco', 'Ciudad de México'),
(752, '08770', 'Los Picos de Iztacalco Sección 1A', 'Iztacalco', 'Ciudad de México'),
(753, '08800', 'Santiago Sur', 'Iztacalco', 'Ciudad de México'),
(754, '08810', 'Reforma Iztaccíhuatl Norte', 'Iztacalco', 'Ciudad de México'),
(755, '08830', 'Militar Marte', 'Iztacalco', 'Ciudad de México'),
(756, '08840', 'Reforma Iztaccíhuatl Sur', 'Iztacalco', 'Ciudad de México'),
(757, '08900', 'INFONAVIT Iztacalco', 'Iztacalco', 'Ciudad de México'),
(758, '08910', 'Santa Cruz', 'Iztacalco', 'Ciudad de México'),
(759, '08920', 'Jardines Tecma', 'Iztacalco', 'Ciudad de México'),
(760, '08930', 'Campamento 2 de Octubre', 'Iztacalco', 'Ciudad de México'),
(761, '09000', 'La Asunción', 'Iztapalapa', 'Ciudad de México'),
(762, '09000', 'San Ignacio', 'Iztapalapa', 'Ciudad de México'),
(763, '09000', 'San José', 'Iztapalapa', 'Ciudad de México'),
(764, '09000', 'San Lucas', 'Iztapalapa', 'Ciudad de México'),
(765, '09000', 'San Pablo', 'Iztapalapa', 'Ciudad de México'),
(766, '09000', 'San Pedro', 'Iztapalapa', 'Ciudad de México'),
(767, '09000', 'Santa Bárbara', 'Iztapalapa', 'Ciudad de México'),
(768, '09010', 'Real del Moral', 'Iztapalapa', 'Ciudad de México'),
(769, '09020', 'Dr. Alfonso Ortiz Tirado', 'Iztapalapa', 'Ciudad de México'),
(770, '09030', 'Paseos de Churubusco', 'Iztapalapa', 'Ciudad de México'),
(771, '09040', 'Central de Abasto', 'Iztapalapa', 'Ciudad de México'),
(772, '09060', 'Escuadrón 201', 'Iztapalapa', 'Ciudad de México'),
(773, '09060', 'Sector Popular', 'Iztapalapa', 'Ciudad de México'),
(774, '09070', 'Granjas de San Antonio', 'Iztapalapa', 'Ciudad de México'),
(775, '09080', 'Cacama', 'Iztapalapa', 'Ciudad de México'),
(776, '09089', 'Unidad Modelo', 'Iztapalapa', 'Ciudad de México'),
(777, '09090', 'Héroes de Churubusco', 'Iztapalapa', 'Ciudad de México'),
(778, '09099', 'Mexicaltzingo', 'Iztapalapa', 'Ciudad de México'),
(779, '09100', 'Juan Escutia', 'Iztapalapa', 'Ciudad de México'),
(780, '09130', 'San Lorenzo Xicotencatl', 'Iztapalapa', 'Ciudad de México'),
(781, '09140', 'Santa Martha Acatitla Norte', 'Iztapalapa', 'Ciudad de México'),
(782, '09180', 'Ermita Zaragoza', 'Iztapalapa', 'Ciudad de México'),
(783, '09200', 'Unidad Vicente Guerrero', 'Iztapalapa', 'Ciudad de México'),
(784, '09208', 'Chinampac de Juárez', 'Iztapalapa', 'Ciudad de México'),
(785, '09209', 'Renovación', 'Iztapalapa', 'Ciudad de México'),
(786, '09210', 'Tepalcates', 'Iztapalapa', 'Ciudad de México'),
(787, '09220', 'Unidad Ejército Constitucionalista', 'Iztapalapa', 'Ciudad de México'),
(788, '09230', 'Álvaro Obregón', 'Iztapalapa', 'Ciudad de México'),
(789, '09230', 'Ejército de Oriente', 'Iztapalapa', 'Ciudad de México'),
(790, '09230', 'El Paraíso', 'Iztapalapa', 'Ciudad de México'),
(791, '09230', 'José María Morelos y Pavón', 'Iztapalapa', 'Ciudad de México'),
(792, '09239', 'Ejército de Oriente Zona Peñón', 'Iztapalapa', 'Ciudad de México'),
(793, '09240', 'Progresista', 'Iztapalapa', 'Ciudad de México'),
(794, '09250', 'La Regadera', 'Iztapalapa', 'Ciudad de México'),
(795, '09260', 'Constitución de 1917', 'Iztapalapa', 'Ciudad de México'),
(796, '09270', 'Colonial Iztapalapa', 'Iztapalapa', 'Ciudad de México'),
(797, '09280', 'Jacarandas', 'Iztapalapa', 'Ciudad de México'),
(798, '09290', 'Santa Cruz Meyehualco', 'Iztapalapa', 'Ciudad de México'),
(799, '09300', 'Guadalupe del Moral', 'Iztapalapa', 'Ciudad de México'),
(800, '09310', 'Leyes de Reforma 1a Sección', 'Iztapalapa', 'Ciudad de México'),
(801, '09310', 'Leyes de Reforma 2a Sección', 'Iztapalapa', 'Ciudad de México'),
(802, '09310', 'Leyes de Reforma 3a Sección', 'Iztapalapa', 'Ciudad de México'),
(803, '09319', 'Cuchilla del Moral', 'Iztapalapa', 'Ciudad de México'),
(804, '09320', 'Sideral', 'Iztapalapa', 'Ciudad de México'),
(805, '09350', 'Albarrada', 'Iztapalapa', 'Ciudad de México'),
(806, '09359', 'Eva Sámano de López Mateos', 'Iztapalapa', 'Ciudad de México'),
(807, '09360', 'San Miguel', 'Iztapalapa', 'Ciudad de México'),
(808, '09360', 'Ampliación San Miguel', 'Iztapalapa', 'Ciudad de México'),
(809, '09400', 'San Juanico Nextipac', 'Iztapalapa', 'Ciudad de México'),
(810, '09400', 'El Sifón', 'Iztapalapa', 'Ciudad de México'),
(811, '09410', 'Aculco', 'Iztapalapa', 'Ciudad de México'),
(812, '09410', 'Jardines de Churubusco', 'Iztapalapa', 'Ciudad de México'),
(813, '09410', 'Magdalena Atlazolpa', 'Iztapalapa', 'Ciudad de México'),
(814, '09410', 'San José Aculco', 'Iztapalapa', 'Ciudad de México'),
(815, '09420', 'Los Picos VI-B', 'Iztapalapa', 'Ciudad de México'),
(816, '09420', 'Nueva Rosita', 'Iztapalapa', 'Ciudad de México'),
(817, '09429', 'Purísima Atlazolpa', 'Iztapalapa', 'Ciudad de México'),
(818, '09430', 'Apatlaco', 'Iztapalapa', 'Ciudad de México'),
(819, '09430', 'El Triunfo', 'Iztapalapa', 'Ciudad de México'),
(820, '09438', 'Ampliación El Triunfo', 'Iztapalapa', 'Ciudad de México'),
(821, '09440', 'El Retoño', 'Iztapalapa', 'Ciudad de México'),
(822, '09440', 'San Andrés Tetepilco', 'Iztapalapa', 'Ciudad de México'),
(823, '09440', 'Zacahuitzco', 'Iztapalapa', 'Ciudad de México'),
(824, '09450', 'Banjidal', 'Iztapalapa', 'Ciudad de México'),
(825, '09460', 'Justo Sierra', 'Iztapalapa', 'Ciudad de México'),
(826, '09470', 'Sinatel', 'Iztapalapa', 'Ciudad de México'),
(827, '09479', 'Ampliación Sinatel', 'Iztapalapa', 'Ciudad de México'),
(828, '09480', 'El Prado', 'Iztapalapa', 'Ciudad de México'),
(829, '09500', 'Santa María Aztahuacán', 'Iztapalapa', 'Ciudad de México'),
(830, '09500', 'Santa María Aztahuacán Ampliación', 'Iztapalapa', 'Ciudad de México'),
(831, '09510', 'Santa Martha Acatitla', 'Iztapalapa', 'Ciudad de México'),
(832, '09520', 'El Edén', 'Iztapalapa', 'Ciudad de México'),
(833, '09520', 'San Sebastián Tecoloxtitla', 'Iztapalapa', 'Ciudad de México'),
(834, '09530', 'Santa Martha Acatitla Sur', 'Iztapalapa', 'Ciudad de México'),
(835, '09550', 'Monte Alban', 'Iztapalapa', 'Ciudad de México'),
(836, '09560', 'Paraje Zacatepec', 'Iztapalapa', 'Ciudad de México'),
(837, '09570', 'Santa María Aztahuacán', 'Iztapalapa', 'Ciudad de México'),
(838, '09578', 'Ejército de Agua Prieta', 'Iztapalapa', 'Ciudad de México'),
(839, '09600', 'Santiago Acahualtepec', 'Iztapalapa', 'Ciudad de México'),
(840, '09608', 'Santiago Acahualtepec 1ra. Ampliación', 'Iztapalapa', 'Ciudad de México'),
(841, '09609', 'Santiago Acahualtepec 2a. Ampliación', 'Iztapalapa', 'Ciudad de México'),
(842, '09620', 'Lomas de Zaragoza', 'Iztapalapa', 'Ciudad de México'),
(843, '09630', 'San Miguel Teotongo Sección Corrales', 'Iztapalapa', 'Ciudad de México'),
(844, '09630', 'San Miguel Teotongo Sección Acorralado', 'Iztapalapa', 'Ciudad de México'),
(845, '09630', 'San Miguel Teotongo Sección Avisadero', 'Iztapalapa', 'Ciudad de México'),
(846, '09630', 'San Miguel Teotongo Sección Capilla', 'Iztapalapa', 'Ciudad de México'),
(847, '09630', 'San Miguel Teotongo Sección Guadalupe', 'Iztapalapa', 'Ciudad de México'),
(848, '09630', 'San Miguel Teotongo Sección Iztlahuaca', 'Iztapalapa', 'Ciudad de México'),
(849, '09630', 'San Miguel Teotongo Sección Jardines', 'Iztapalapa', 'Ciudad de México'),
(850, '09630', 'San Miguel Teotongo Sección La Cruz', 'Iztapalapa', 'Ciudad de México'),
(851, '09630', 'San Miguel Teotongo Sección Loma Alta', 'Iztapalapa', 'Ciudad de México'),
(852, '09630', 'San Miguel Teotongo Sección Mercedes', 'Iztapalapa', 'Ciudad de México'),
(853, '09630', 'San Miguel Teotongo Sección Palmitas', 'Iztapalapa', 'Ciudad de México'),
(854, '09630', 'San Miguel Teotongo Sección Puente', 'Iztapalapa', 'Ciudad de México'),
(855, '09630', 'San Miguel Teotongo Sección Ranchito', 'Iztapalapa', 'Ciudad de México'),
(856, '09630', 'San Miguel Teotongo Sección Rancho Bajo', 'Iztapalapa', 'Ciudad de México'),
(857, '09630', 'San Miguel Teotongo Sección Torres', 'Iztapalapa', 'Ciudad de México'),
(858, '09637', 'Campestre Potrero', 'Iztapalapa', 'Ciudad de México'),
(859, '09638', 'Ampliación Emiliano Zapata', 'Iztapalapa', 'Ciudad de México'),
(860, '09640', 'Lomas de la Estancia', 'Iztapalapa', 'Ciudad de México'),
(861, '09640', 'Xalpa', 'Iztapalapa', 'Ciudad de México'),
(862, '09648', 'San Pablo', 'Iztapalapa', 'Ciudad de México'),
(863, '09660', 'Citlalli', 'Iztapalapa', 'Ciudad de México'),
(864, '09670', 'Palmitas', 'Iztapalapa', 'Ciudad de México'),
(865, '09680', 'Tenorios', 'Iztapalapa', 'Ciudad de México'),
(866, '09689', 'Barranca de Guadalupe', 'Iztapalapa', 'Ciudad de México'),
(867, '09690', 'Iztlahuacán', 'Iztapalapa', 'Ciudad de México'),
(868, '09696', 'Miravalles', 'Iztapalapa', 'Ciudad de México'),
(869, '09698', 'Miguel de La Madrid Hurtado', 'Iztapalapa', 'Ciudad de México'),
(870, '09700', 'Buenavista', 'Iztapalapa', 'Ciudad de México'),
(871, '09700', 'Carlos Hank Gonzalez', 'Iztapalapa', 'Ciudad de México'),
(872, '09700', 'Desarrollo Urbano Quetzalcoatl', 'Iztapalapa', 'Ciudad de México'),
(873, '09700', 'Santa Cruz Meyehualco', 'Iztapalapa', 'Ciudad de México'),
(874, '09704', 'Degollado', 'Iztapalapa', 'Ciudad de México'),
(875, '09705', 'Degollado - Mexicatlalli', 'Iztapalapa', 'Ciudad de México'),
(876, '09706', 'San José Buenavista', 'Iztapalapa', 'Ciudad de México'),
(877, '09708', 'Mixcoatl', 'Iztapalapa', 'Ciudad de México'),
(878, '09709', 'Lomas de Santa Cruz', 'Iztapalapa', 'Ciudad de México'),
(879, '09710', 'Los Ángeles Apanoaya', 'Iztapalapa', 'Ciudad de México'),
(880, '09720', 'Francisco Villa', 'Iztapalapa', 'Ciudad de México'),
(881, '09720', 'La Era', 'Iztapalapa', 'Ciudad de México'),
(882, '09730', 'Reforma Política', 'Iztapalapa', 'Ciudad de México'),
(883, '09740', 'Presidentes de México', 'Iztapalapa', 'Ciudad de México'),
(884, '09750', 'Insurgentes', 'Iztapalapa', 'Ciudad de México'),
(885, '09750', 'La Polvorilla', 'Iztapalapa', 'Ciudad de México'),
(886, '09750', 'Las Peñas', 'Iztapalapa', 'Ciudad de México'),
(887, '09760', 'Consejo Agrarista Mexicano', 'Iztapalapa', 'Ciudad de México'),
(888, '09769', 'El Triángulo', 'Iztapalapa', 'Ciudad de México'),
(889, '09770', 'Puente Blanco', 'Iztapalapa', 'Ciudad de México'),
(890, '09780', 'Año de Juárez', 'Iztapalapa', 'Ciudad de México'),
(891, '09780', 'Lomas de San Lorenzo', 'Iztapalapa', 'Ciudad de México'),
(892, '09790', 'San Lorenzo Tezonco', 'Iztapalapa', 'Ciudad de México'),
(893, '09800', 'Culhuacán', 'Iztapalapa', 'Ciudad de México'),
(894, '09800', 'El Mirador', 'Iztapalapa', 'Ciudad de México'),
(895, '09800', 'Estrella Culhuacán', 'Iztapalapa', 'Ciudad de México'),
(896, '09800', 'Fuego Nuevo', 'Iztapalapa', 'Ciudad de México'),
(897, '09800', 'San Antonio Culhuacán', 'Iztapalapa', 'Ciudad de México'),
(898, '09800', 'San Antonio Culhuacán', 'Iztapalapa', 'Ciudad de México'),
(899, '09800', 'San Simón Culhuacán', 'Iztapalapa', 'Ciudad de México'),
(900, '09800', 'Tula', 'Iztapalapa', 'Ciudad de México'),
(901, '09800', 'Valle de Luces', 'Iztapalapa', 'Ciudad de México'),
(902, '09810', 'Granjas Esmeralda', 'Iztapalapa', 'Ciudad de México'),
(903, '09810', 'Los Cipreses', 'Iztapalapa', 'Ciudad de México'),
(904, '09810', 'Minerva', 'Iztapalapa', 'Ciudad de México'),
(905, '09810', 'Progreso del Sur', 'Iztapalapa', 'Ciudad de México'),
(906, '09819', 'Valle del Sur', 'Iztapalapa', 'Ciudad de México'),
(907, '09820', 'El Santuario', 'Iztapalapa', 'Ciudad de México'),
(908, '09820', 'Estrella del Sur', 'Iztapalapa', 'Ciudad de México'),
(909, '09820', 'Ricardo Flores Magón', 'Iztapalapa', 'Ciudad de México'),
(910, '09820', 'Santa Isabel Industrial', 'Iztapalapa', 'Ciudad de México'),
(911, '09828', 'Ampliación Ricardo Flores Magón', 'Iztapalapa', 'Ciudad de México'),
(912, '09829', 'Ampliación El Santuario', 'Iztapalapa', 'Ciudad de México'),
(913, '09830', 'El Manto', 'Iztapalapa', 'Ciudad de México'),
(914, '09830', 'El Molino', 'Iztapalapa', 'Ciudad de México'),
(915, '09830', 'Lomas El Manto', 'Iztapalapa', 'Ciudad de México'),
(916, '09830', 'Los Ángeles', 'Iztapalapa', 'Ciudad de México'),
(917, '09830', 'Paraje San Juan', 'Iztapalapa', 'Ciudad de México'),
(918, '09837', 'San Miguel 8va. Ampliación', 'Iztapalapa', 'Ciudad de México'),
(919, '09838', 'Plan de Iguala', 'Iztapalapa', 'Ciudad de México'),
(920, '09839', 'Ampliación Paraje San Juan', 'Iztapalapa', 'Ciudad de México'),
(921, '09839', 'San Juan Joya', 'Iztapalapa', 'Ciudad de México'),
(922, '09840', 'Los Reyes Culhuacán', 'Iztapalapa', 'Ciudad de México'),
(923, '09849', 'Ampliación Los Reyes', 'Iztapalapa', 'Ciudad de México'),
(924, '09850', 'San Juan Xalpa', 'Iztapalapa', 'Ciudad de México'),
(925, '09850', 'San Nicolás Tolentino', 'Iztapalapa', 'Ciudad de México'),
(926, '09850', 'Santa María del Monte', 'Iztapalapa', 'Ciudad de México'),
(927, '09856', 'Estado de Veracruz', 'Iztapalapa', 'Ciudad de México'),
(928, '09856', 'Ampliación Veracruzana', 'Iztapalapa', 'Ciudad de México'),
(929, '09858', 'Paraje San Juan Cerro', 'Iztapalapa', 'Ciudad de México'),
(930, '09859', 'Benito Juárez', 'Iztapalapa', 'Ciudad de México'),
(931, '09860', 'Bellavista', 'Iztapalapa', 'Ciudad de México'),
(932, '09860', 'Ampliación Bellavista', 'Iztapalapa', 'Ciudad de México'),
(933, '09860', 'Casa Blanca', 'Iztapalapa', 'Ciudad de México'),
(934, '09860', 'Cerro de La Estrella', 'Iztapalapa', 'Ciudad de México'),
(935, '09860', 'Parque Nacional Cerro  de la Estrella', 'Iztapalapa', 'Ciudad de México'),
(936, '09860', 'El Rodeo', 'Iztapalapa', 'Ciudad de México'),
(937, '09868', 'San Juan Estrella', 'Iztapalapa', 'Ciudad de México'),
(938, '09870', '12 de Diciembre', 'Iztapalapa', 'Ciudad de México'),
(939, '09870', 'San Andrés Tomatlán', 'Iztapalapa', 'Ciudad de México'),
(940, '09870', 'San Andrés Tomatlán', 'Iztapalapa', 'Ciudad de México'),
(941, '09870', 'Santa María Tomatlán', 'Iztapalapa', 'Ciudad de México'),
(942, '09880', 'El Vergel', 'Iztapalapa', 'Ciudad de México'),
(943, '09880', 'Granjas Estrella', 'Iztapalapa', 'Ciudad de México'),
(944, '09890', 'Lomas Estrella', 'Iztapalapa', 'Ciudad de México'),
(945, '09897', 'Carlos Jonguitud Barrios', 'Iztapalapa', 'Ciudad de México'),
(946, '09900', 'Guadalupe', 'Iztapalapa', 'Ciudad de México'),
(947, '09900', 'San Antonio', 'Iztapalapa', 'Ciudad de México'),
(948, '09900', 'San Lorenzo', 'Iztapalapa', 'Ciudad de México'),
(949, '09910', 'La Esperanza', 'Iztapalapa', 'Ciudad de México'),
(950, '09920', 'José López Portillo', 'Iztapalapa', 'Ciudad de México'),
(951, '09930', 'El Rosario', 'Iztapalapa', 'Ciudad de México'),
(952, '09940', 'Jardines de San Lorenzo Tezonco', 'Iztapalapa', 'Ciudad de México'),
(953, '09960', 'Celoalliotli', 'Iztapalapa', 'Ciudad de México'),
(954, '09960', 'USCOVI', 'Iztapalapa', 'Ciudad de México'),
(955, '09960', 'El Molino Tezonco', 'Iztapalapa', 'Ciudad de México'),
(956, '09960', 'Allapetlalli', 'Iztapalapa', 'Ciudad de México'),
(957, '09960', 'La Planta', 'Iztapalapa', 'Ciudad de México'),
(958, '09969', 'Cananea', 'Iztapalapa', 'Ciudad de México'),
(959, '09970', 'Valle de San Lorenzo', 'Iztapalapa', 'Ciudad de México'),
(960, '10000', 'Lomas Quebradas', 'La Magdalena Contreras', 'Ciudad de México'),
(961, '10010', 'La Malinche', 'La Magdalena Contreras', 'Ciudad de México'),
(962, '10010', 'San Bartolo Ameyalco', 'La Magdalena Contreras', 'Ciudad de México'),
(963, '10020', 'Cuauhtémoc', 'La Magdalena Contreras', 'Ciudad de México'),
(964, '10130', 'El Maestro', 'La Magdalena Contreras', 'Ciudad de México'),
(965, '10200', 'San Jerónimo Lídice', 'La Magdalena Contreras', 'Ciudad de México'),
(966, '10300', 'San Bernabé Ocotepec', 'La Magdalena Contreras', 'Ciudad de México'),
(967, '10320', 'El Tanque', 'La Magdalena Contreras', 'Ciudad de México'),
(968, '10330', 'Las Cruces', 'La Magdalena Contreras', 'Ciudad de México'),
(969, '10340', 'Los Padres', 'La Magdalena Contreras', 'Ciudad de México'),
(970, '10350', 'Lomas de San Bernabé', 'La Magdalena Contreras', 'Ciudad de México'),
(971, '10360', 'Huayatla', 'La Magdalena Contreras', 'Ciudad de México'),
(972, '10368', 'Ampliación Potrerillo', 'La Magdalena Contreras', 'Ciudad de México'),
(973, '10369', 'Ampliación Lomas de San Bernabé', 'La Magdalena Contreras', 'Ciudad de México'),
(974, '10369', 'Tierra Unida', 'La Magdalena Contreras', 'Ciudad de México'),
(975, '10370', 'Palmas', 'La Magdalena Contreras', 'Ciudad de México'),
(976, '10378', 'Atacaxco', 'La Magdalena Contreras', 'Ciudad de México'),
(977, '10379', 'Vista Hermosa', 'La Magdalena Contreras', 'Ciudad de México'),
(978, '10380', 'Barros Sierra', 'La Magdalena Contreras', 'Ciudad de México'),
(979, '10400', 'San Jerónimo Aculco', 'La Magdalena Contreras', 'Ciudad de México'),
(980, '10500', 'Barrio San Francisco', 'La Magdalena Contreras', 'Ciudad de México'),
(981, '10580', 'Barranca Seca', 'La Magdalena Contreras', 'Ciudad de México'),
(982, '10600', 'El Rosal', 'La Magdalena Contreras', 'Ciudad de México'),
(983, '10610', 'El Toro', 'La Magdalena Contreras', 'Ciudad de México'),
(984, '10620', 'Potrerillo', 'La Magdalena Contreras', 'Ciudad de México'),
(985, '10630', 'El Ocotal', 'La Magdalena Contreras', 'Ciudad de México'),
(986, '10640', 'La Carbonera', 'La Magdalena Contreras', 'Ciudad de México'),
(987, '10640', 'Pueblo Nuevo Alto', 'La Magdalena Contreras', 'Ciudad de México'),
(988, '10640', 'Pueblo Nuevo Bajo', 'La Magdalena Contreras', 'Ciudad de México'),
(989, '10660', 'El Ermitaño', 'La Magdalena Contreras', 'Ciudad de México'),
(990, '10700', 'Héroes de Padierna', 'La Magdalena Contreras', 'Ciudad de México'),
(991, '10710', 'Santa Teresa', 'La Magdalena Contreras', 'Ciudad de México'),
(992, '10800', 'La Cruz', 'La Magdalena Contreras', 'Ciudad de México'),
(993, '10810', 'San Francisco', 'La Magdalena Contreras', 'Ciudad de México'),
(994, '10820', 'La Guadalupe', 'La Magdalena Contreras', 'Ciudad de México'),
(995, '10830', 'La Concepción', 'La Magdalena Contreras', 'Ciudad de México'),
(996, '10840', 'Las Calles', 'La Magdalena Contreras', 'Ciudad de México'),
(997, '10840', 'Plazuela del Pedregal', 'La Magdalena Contreras', 'Ciudad de México'),
(998, '10900', 'San Nicolás Totolapan', 'La Magdalena Contreras', 'Ciudad de México'),
(999, '10910', 'La Magdalena', 'La Magdalena Contreras', 'Ciudad de México'),
(1000, '10920', 'Las Huertas', 'La Magdalena Contreras', 'Ciudad de México'),
(1001, '10926', 'Tierra Colorada', 'La Magdalena Contreras', 'Ciudad de México'),
(1002, '11000', 'Lomas de Chapultepec I Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1003, '11000', 'Lomas de Chapultepec VIII Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1004, '11000', 'Lomas de Chapultepec II Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1005, '11000', 'Lomas de Chapultepec III Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1006, '11000', 'Lomas de Chapultepec IV Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1007, '11000', 'Lomas de Chapultepec V Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1008, '11000', 'Lomas de Chapultepec VI Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1009, '11000', 'Lomas de Chapultepec VII Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1010, '11040', 'Molino del Rey', 'Miguel Hidalgo', 'Ciudad de México'),
(1011, '11100', 'Bosque de Chapultepec II Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1012, '11100', 'Bosque de Chapultepec III Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1013, '11200', 'Lomas Hermosa', 'Miguel Hidalgo', 'Ciudad de México'),
(1014, '11200', 'Lomas de Sotelo', 'Miguel Hidalgo', 'Ciudad de México'),
(1015, '11210', 'San Lorenzo Tlaltenango', 'Miguel Hidalgo', 'Ciudad de México'),
(1016, '11220', 'Periodista', 'Miguel Hidalgo', 'Ciudad de México'),
(1017, '11230', 'Argentina Poniente', 'Miguel Hidalgo', 'Ciudad de México'),
(1018, '11240', 'Ignacio Manuel Altamirano', 'Miguel Hidalgo', 'Ciudad de México'),
(1019, '11250', '10 de Abril', 'Miguel Hidalgo', 'Ciudad de México'),
(1020, '11260', 'México Nuevo', 'Miguel Hidalgo', 'Ciudad de México'),
(1021, '11260', 'San Joaquín', 'Miguel Hidalgo', 'Ciudad de México'),
(1022, '11270', 'Argentina Antigua', 'Miguel Hidalgo', 'Ciudad de México'),
(1023, '11280', 'Torre Blanca', 'Miguel Hidalgo', 'Ciudad de México'),
(1024, '11289', 'Ampliación Torre Blanca', 'Miguel Hidalgo', 'Ciudad de México'),
(1025, '11290', 'Huíchapan', 'Miguel Hidalgo', 'Ciudad de México'),
(1026, '11290', 'San Diego Ocoyoacac', 'Miguel Hidalgo', 'Ciudad de México'),
(1027, '11300', 'Verónica Anzures', 'Miguel Hidalgo', 'Ciudad de México'),
(1028, '11310', 'Mariano Escobedo', 'Miguel Hidalgo', 'Ciudad de México'),
(1029, '11320', 'Anáhuac I Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1030, '11320', 'Anáhuac II Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1031, '11330', 'Un Hogar Para Nosotros', 'Miguel Hidalgo', 'Ciudad de México'),
(1032, '11340', 'Santo Tomas', 'Miguel Hidalgo', 'Ciudad de México'),
(1033, '11350', 'Plutarco Elías Calles', 'Miguel Hidalgo', 'Ciudad de México'),
(1034, '11360', 'Agricultura', 'Miguel Hidalgo', 'Ciudad de México'),
(1035, '11370', 'Tlaxpana', 'Miguel Hidalgo', 'Ciudad de México'),
(1036, '11400', 'Popotla', 'Miguel Hidalgo', 'Ciudad de México'),
(1037, '11410', 'Legaria', 'Miguel Hidalgo', 'Ciudad de México'),
(1038, '11410', 'Tacuba', 'Miguel Hidalgo', 'Ciudad de México'),
(1039, '11420', 'Nextitla', 'Miguel Hidalgo', 'Ciudad de México'),
(1040, '11430', 'Pensil Norte', 'Miguel Hidalgo', 'Ciudad de México'),
(1041, '11430', 'Ventura Pérez de Alva', 'Miguel Hidalgo', 'Ciudad de México'),
(1042, '11440', 'Reforma Pensil', 'Miguel Hidalgo', 'Ciudad de México'),
(1043, '11440', 'San Juanico', 'Miguel Hidalgo', 'Ciudad de México'),
(1044, '11450', 'Ahuehuetes Anáhuac', 'Miguel Hidalgo', 'Ciudad de México'),
(1045, '11450', 'Modelo Pensil', 'Miguel Hidalgo', 'Ciudad de México'),
(1046, '11450', 'Peralitos', 'Miguel Hidalgo', 'Ciudad de México'),
(1047, '11460', 'Dos Lagos', 'Miguel Hidalgo', 'Ciudad de México'),
(1048, '11460', 'Lago Norte', 'Miguel Hidalgo', 'Ciudad de México'),
(1049, '11460', 'Lago Sur', 'Miguel Hidalgo', 'Ciudad de México'),
(1050, '11460', 'Los Manzanos', 'Miguel Hidalgo', 'Ciudad de México'),
(1051, '11470', '5 de Mayo', 'Miguel Hidalgo', 'Ciudad de México'),
(1052, '11470', 'Deportivo Pensil', 'Miguel Hidalgo', 'Ciudad de México'),
(1053, '11480', 'Francisco I Madero', 'Miguel Hidalgo', 'Ciudad de México'),
(1054, '11480', 'Popo', 'Miguel Hidalgo', 'Ciudad de México'),
(1055, '11489', 'Ampliación Popo', 'Miguel Hidalgo', 'Ciudad de México'),
(1056, '11490', 'Cuauhtémoc Pensil', 'Miguel Hidalgo', 'Ciudad de México'),
(1057, '11490', 'Pensil Sur', 'Miguel Hidalgo', 'Ciudad de México'),
(1058, '11500', 'Irrigación', 'Miguel Hidalgo', 'Ciudad de México'),
(1059, '11510', 'Polanco I Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1060, '11520', 'Granada', 'Miguel Hidalgo', 'Ciudad de México'),
(1061, '11529', 'Ampliación Granada', 'Miguel Hidalgo', 'Ciudad de México'),
(1062, '11530', 'Polanco II Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1063, '11540', 'Polanco III Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1064, '11550', 'Polanco IV Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1065, '11560', 'Polanco V Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1066, '11580', 'Bosque de Chapultepec I Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1067, '11590', 'Anzures', 'Miguel Hidalgo', 'Ciudad de México'),
(1068, '11600', 'Residencial Militar', 'Miguel Hidalgo', 'Ciudad de México'),
(1069, '11610', 'Manuel Avila Camacho', 'Miguel Hidalgo', 'Ciudad de México'),
(1070, '11619', 'Campo Militar 1', 'Miguel Hidalgo', 'Ciudad de México'),
(1071, '11650', 'Reforma Social', 'Miguel Hidalgo', 'Ciudad de México'),
(1072, '11700', 'Bosque de las Lomas', 'Miguel Hidalgo', 'Ciudad de México'),
(1073, '11800', 'Escandón I Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1074, '11800', 'Escandón II Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1075, '11810', '16 de Septiembre', 'Miguel Hidalgo', 'Ciudad de México'),
(1076, '11820', 'América', 'Miguel Hidalgo', 'Ciudad de México'),
(1077, '11830', 'Daniel Garza', 'Miguel Hidalgo', 'Ciudad de México'),
(1078, '11840', 'Ampliación Daniel Garza', 'Miguel Hidalgo', 'Ciudad de México'),
(1079, '11850', 'San Miguel Chapultepec I Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1080, '11850', 'San Miguel Chapultepec II Sección', 'Miguel Hidalgo', 'Ciudad de México'),
(1081, '11860', 'Observatorio', 'Miguel Hidalgo', 'Ciudad de México'),
(1082, '11870', 'Tacubaya', 'Miguel Hidalgo', 'Ciudad de México'),
(1083, '11910', 'Lomas de Bezares', 'Miguel Hidalgo', 'Ciudad de México'),
(1084, '11920', 'Real de las Lomas', 'Miguel Hidalgo', 'Ciudad de México'),
(1085, '11930', 'Lomas de Reforma', 'Miguel Hidalgo', 'Ciudad de México'),
(1086, '11950', 'Lomas Altas', 'Miguel Hidalgo', 'Ciudad de México'),
(1087, '12000', 'La Concepción', 'Milpa Alta', 'Ciudad de México'),
(1088, '12000', 'La Luz', 'Milpa Alta', 'Ciudad de México'),
(1089, '12000', 'Los Ángeles', 'Milpa Alta', 'Ciudad de México'),
(1090, '12000', 'San Mateo', 'Milpa Alta', 'Ciudad de México'),
(1091, '12000', 'Santa Cruz', 'Milpa Alta', 'Ciudad de México'),
(1092, '12000', 'Santa Martha', 'Milpa Alta', 'Ciudad de México'),
(1093, '12000', 'Villa Milpa Alta Centro', 'Milpa Alta', 'Ciudad de México'),
(1094, '12070', 'San Agustin', 'Milpa Alta', 'Ciudad de México'),
(1095, '12080', 'San Agustin Ohtenco', 'Milpa Alta', 'Ciudad de México'),
(1096, '12100', 'Cruztitla', 'Milpa Alta', 'Ciudad de México'),
(1097, '12100', 'Tecaxtitla', 'Milpa Alta', 'Ciudad de México'),
(1098, '12100', 'Tenantitla', 'Milpa Alta', 'Ciudad de México'),
(1099, '12100', 'Xaltipac', 'Milpa Alta', 'Ciudad de México'),
(1100, '12100', 'Xochitepec', 'Milpa Alta', 'Ciudad de México'),
(1101, '12110', 'Emiliano Zapata', 'Milpa Alta', 'Ciudad de México'),
(1102, '12110', 'La Conchita', 'Milpa Alta', 'Ciudad de México'),
(1103, '12200', 'Nochtla', 'Milpa Alta', 'Ciudad de México'),
(1104, '12200', 'Ocotitla', 'Milpa Alta', 'Ciudad de México'),
(1105, '12200', 'Panchimalco', 'Milpa Alta', 'Ciudad de México'),
(1106, '12200', 'Tula', 'Milpa Alta', 'Ciudad de México'),
(1107, '12250', 'San Bartolomé Xicomulco', 'Milpa Alta', 'Ciudad de México'),
(1108, '12300', 'San Salvador Cuauhtenco', 'Milpa Alta', 'Ciudad de México'),
(1109, '12400', 'Centro', 'Milpa Alta', 'Ciudad de México'),
(1110, '12400', 'San Juan', 'Milpa Alta', 'Ciudad de México'),
(1111, '12400', 'San Miguel', 'Milpa Alta', 'Ciudad de México'),
(1112, '12410', 'Chalmita', 'Milpa Alta', 'Ciudad de México'),
(1113, '12500', 'San Lorenzo Tlacoyucan', 'Milpa Alta', 'Ciudad de México'),
(1114, '12600', 'San Jerónimo Miacatlán', 'Milpa Alta', 'Ciudad de México'),
(1115, '12700', 'San Francisco Tecoxpa', 'Milpa Alta', 'Ciudad de México'),
(1116, '12800', 'San Juan Tepenahuac', 'Milpa Alta', 'Ciudad de México'),
(1117, '12910', 'La Lupita Teticpac', 'Milpa Alta', 'Ciudad de México'),
(1118, '12920', 'San Marcos', 'Milpa Alta', 'Ciudad de México'),
(1119, '12930', 'San Miguel', 'Milpa Alta', 'Ciudad de México'),
(1120, '12940', 'San José', 'Milpa Alta', 'Ciudad de México'),
(1121, '12950', 'La Lupita Xolco', 'Milpa Alta', 'Ciudad de México'),
(1122, '13000', 'La Asunción', 'Tláhuac', 'Ciudad de México'),
(1123, '13010', 'Santa Cecilia', 'Tláhuac', 'Ciudad de México'),
(1124, '13020', 'San José', 'Tláhuac', 'Ciudad de México'),
(1125, '13030', 'San Juan', 'Tláhuac', 'Ciudad de México'),
(1126, '13040', 'San Mateo', 'Tláhuac', 'Ciudad de México'),
(1127, '13050', 'La Habana', 'Tláhuac', 'Ciudad de México'),
(1128, '13060', 'La Guadalupe', 'Tláhuac', 'Ciudad de México'),
(1129, '13060', 'Santa Ana', 'Tláhuac', 'Ciudad de México'),
(1130, '13070', 'La Magdalena', 'Tláhuac', 'Ciudad de México'),
(1131, '13070', 'San Miguel', 'Tláhuac', 'Ciudad de México'),
(1132, '13080', 'Los Reyes', 'Tláhuac', 'Ciudad de México'),
(1133, '13090', 'Quiahuatla', 'Tláhuac', 'Ciudad de México'),
(1134, '13093', 'San Sebastián', 'Tláhuac', 'Ciudad de México'),
(1135, '13094', 'San Isidro', 'Tláhuac', 'Ciudad de México'),
(1136, '13099', 'San Andrés', 'Tláhuac', 'Ciudad de México'),
(1137, '13100', 'La Guadalupe', 'Tláhuac', 'Ciudad de México'),
(1138, '13120', 'Ampliación Santa Catarina', 'Tláhuac', 'Ciudad de México'),
(1139, '13120', 'Santiago', 'Tláhuac', 'Ciudad de México'),
(1140, '13150', 'La Concepción', 'Tláhuac', 'Ciudad de México'),
(1141, '13180', 'San Miguel', 'Tláhuac', 'Ciudad de México'),
(1142, '13200', 'Miguel Hidalgo', 'Tláhuac', 'Ciudad de México'),
(1143, '13210', 'Los Olivos', 'Tláhuac', 'Ciudad de México'),
(1144, '13219', 'Las Arboledas', 'Tláhuac', 'Ciudad de México'),
(1145, '13219', 'Ampliación Los Olivos', 'Tláhuac', 'Ciudad de México'),
(1146, '13220', 'La Nopalera', 'Tláhuac', 'Ciudad de México'),
(1147, '13230', 'Granjas Cabrera', 'Tláhuac', 'Ciudad de México'),
(1148, '13250', 'La Turba', 'Tláhuac', 'Ciudad de México'),
(1149, '13270', 'Del Mar', 'Tláhuac', 'Ciudad de México'),
(1150, '13273', 'La Draga', 'Tláhuac', 'Ciudad de México'),
(1151, '13278', 'Villa Centroamericana', 'Tláhuac', 'Ciudad de México'),
(1152, '13280', 'Agrícola Metropolitana', 'Tláhuac', 'Ciudad de México'),
(1153, '13300', 'Santa Ana Centro', 'Tláhuac', 'Ciudad de México'),
(1154, '13300', 'Santiago Centro', 'Tláhuac', 'Ciudad de México'),
(1155, '13300', 'Santa Ana Poniente', 'Tláhuac', 'Ciudad de México'),
(1156, '13300', 'Santa Ana Norte', 'Tláhuac', 'Ciudad de México'),
(1157, '13300', 'Santiago Norte', 'Tláhuac', 'Ciudad de México'),
(1158, '13310', 'Zapotitla', 'Tláhuac', 'Ciudad de México'),
(1159, '13315', 'Ampliación Zapotitla', 'Tláhuac', 'Ciudad de México'),
(1160, '13319', 'La Estación', 'Tláhuac', 'Ciudad de México'),
(1161, '13360', 'La Conchita Zapotitlán', 'Tláhuac', 'Ciudad de México'),
(1162, '13360', 'Santa Ana Sur', 'Tláhuac', 'Ciudad de México'),
(1163, '13360', 'Santiago Sur', 'Tláhuac', 'Ciudad de México'),
(1164, '13400', 'San Francisco Tlaltenco', 'Tláhuac', 'Ciudad de México'),
(1165, '13410', 'López Portillo', 'Tláhuac', 'Ciudad de México'),
(1166, '13419', 'Ampliación José López Portillo', 'Tláhuac', 'Ciudad de México'),
(1167, '13420', 'Selene', 'Tláhuac', 'Ciudad de México'),
(1168, '13430', 'Ampliación Selene', 'Tláhuac', 'Ciudad de México'),
(1169, '13440', 'Zacatenco', 'Tláhuac', 'Ciudad de México'),
(1170, '13450', 'Guadalupe Tlaltenco', 'Tláhuac', 'Ciudad de México'),
(1171, '13450', 'Ojo de Agua', 'Tláhuac', 'Ciudad de México'),
(1172, '13460', 'El Triángulo', 'Tláhuac', 'Ciudad de México'),
(1173, '13508', 'San Agustín', 'Tláhuac', 'Ciudad de México'),
(1174, '13508', 'La Soledad', 'Tláhuac', 'Ciudad de México'),
(1175, '13509', 'La Concepción', 'Tláhuac', 'Ciudad de México'),
(1176, '13510', 'La Lupita', 'Tláhuac', 'Ciudad de México'),
(1177, '13520', 'Francisco Villa', 'Tláhuac', 'Ciudad de México'),
(1178, '13530', 'Jaime Torres Bodet', 'Tláhuac', 'Ciudad de México'),
(1179, '13530', 'La Asunción', 'Tláhuac', 'Ciudad de México'),
(1180, '13540', 'El Rosario', 'Tláhuac', 'Ciudad de México'),
(1181, '13540', 'Tierra Blanca', 'Tláhuac', 'Ciudad de México'),
(1182, '13545', 'Ampliación La Conchita', 'Tláhuac', 'Ciudad de México'),
(1183, '13549', 'Peña Alta', 'Tláhuac', 'Ciudad de México'),
(1184, '13550', 'Jardines del Llano', 'Tláhuac', 'Ciudad de México'),
(1185, '13550', 'Potrero del Llano', 'Tláhuac', 'Ciudad de México'),
(1186, '13600', 'San Bartolomé', 'Tláhuac', 'Ciudad de México'),
(1187, '13610', 'Los Reyes', 'Tláhuac', 'Ciudad de México'),
(1188, '13625', 'Santa Cruz', 'Tláhuac', 'Ciudad de México'),
(1189, '13630', 'San Agustín', 'Tláhuac', 'Ciudad de México'),
(1190, '13640', 'San Miguel', 'Tláhuac', 'Ciudad de México'),
(1191, '13700', 'San Nicolás Tetelco', 'Tláhuac', 'Ciudad de México'),
(1192, '13700', 'Tepantitlamilco', 'Tláhuac', 'Ciudad de México'),
(1193, '14000', 'Tlalpan Centro', 'Tlalpan', 'Ciudad de México'),
(1194, '14000', 'Tlalpan', 'Tlalpan', 'Ciudad de México'),
(1195, '14010', 'Parque del Pedregal', 'Tlalpan', 'Ciudad de México'),
(1196, '14020', 'Villa Olímpica', 'Tlalpan', 'Ciudad de México'),
(1197, '14030', 'Isidro Fabela', 'Tlalpan', 'Ciudad de México'),
(1198, '14039', 'Ampliación Isidro Fabela', 'Tlalpan', 'Ciudad de México'),
(1199, '14040', 'Cantera Puente de Piedra', 'Tlalpan', 'Ciudad de México'),
(1200, '14040', 'Pueblo Quieto', 'Tlalpan', 'Ciudad de México'),
(1201, '14049', 'Comuneros de Santa Úrsula', 'Tlalpan', 'Ciudad de México'),
(1202, '14050', 'Toriello Guerra', 'Tlalpan', 'Ciudad de México'),
(1203, '14060', 'Peña Pobre', 'Tlalpan', 'Ciudad de México'),
(1204, '14070', 'Rómulo Sánchez Mireles', 'Tlalpan', 'Ciudad de México'),
(1205, '14070', 'San Fernando', 'Tlalpan', 'Ciudad de México'),
(1206, '14070', 'San Pedro Apóstol', 'Tlalpan', 'Ciudad de México'),
(1207, '14080', 'Belisario Domínguez Sección XVI', 'Tlalpan', 'Ciudad de México'),
(1208, '14080', 'Del Niño Jesús', 'Tlalpan', 'Ciudad de México'),
(1209, '14090', 'La Joya', 'Tlalpan', 'Ciudad de México'),
(1210, '14100', 'Pedregal de San Nicolás 1A Sección', 'Tlalpan', 'Ciudad de México'),
(1211, '14100', 'Pedregal de San Nicolás 2A Sección', 'Tlalpan', 'Ciudad de México'),
(1212, '14100', 'Pedregal de San Nicolás 3A Sección', 'Tlalpan', 'Ciudad de México'),
(1213, '14100', 'Pedregal de San Nicolás 4A Sección', 'Tlalpan', 'Ciudad de México'),
(1214, '14100', 'Pedregal de San Nicolás 5ª Sección', 'Tlalpan', 'Ciudad de México'),
(1215, '14108', 'Chichicaspatl', 'Tlalpan', 'Ciudad de México'),
(1216, '14110', 'Ampliación Fuentes del Pedregal', 'Tlalpan', 'Ciudad de México'),
(1217, '14120', 'Rincón del Pedregal', 'Tlalpan', 'Ciudad de México'),
(1218, '14140', 'Fuentes del Pedregal', 'Tlalpan', 'Ciudad de México'),
(1219, '14150', 'Lomas del Pedregal Framboyanes', 'Tlalpan', 'Ciudad de México'),
(1220, '14160', 'Popular Santa Teresa', 'Tlalpan', 'Ciudad de México'),
(1221, '14200', 'Héroes de Padierna', 'Tlalpan', 'Ciudad de México'),
(1222, '14200', 'Jardines del Ajusco', 'Tlalpan', 'Ciudad de México'),
(1223, '14208', 'Colinas del Ajusco', 'Tlalpan', 'Ciudad de México'),
(1224, '14209', 'Torres de Padierna', 'Tlalpan', 'Ciudad de México'),
(1225, '14210', 'Jardines en la Montaña', 'Tlalpan', 'Ciudad de México'),
(1226, '14219', 'Six Flags (Reino Aventura)', 'Tlalpan', 'Ciudad de México'),
(1227, '14219', 'Parque Nacional Bosque del Pedregal', 'Tlalpan', 'Ciudad de México'),
(1228, '14220', 'Cuchilla de Padierna', 'Tlalpan', 'Ciudad de México'),
(1229, '14220', 'Lomas del Pedregal', 'Tlalpan', 'Ciudad de México'),
(1230, '14230', 'Cultura Maya', 'Tlalpan', 'Ciudad de México'),
(1231, '14239', 'Los Encinos', 'Tlalpan', 'Ciudad de México'),
(1232, '14240', 'Lomas de Padierna', 'Tlalpan', 'Ciudad de México'),
(1233, '14240', 'Lomas Hidalgo', 'Tlalpan', 'Ciudad de México'),
(1234, '14248', 'Cruz del Farol', 'Tlalpan', 'Ciudad de México'),
(1235, '14250', 'Miguel Hidalgo 2A Sección', 'Tlalpan', 'Ciudad de México'),
(1236, '14250', 'Miguel Hidalgo 3A Sección', 'Tlalpan', 'Ciudad de México'),
(1237, '14250', 'Miguel Hidalgo 4A Sección', 'Tlalpan', 'Ciudad de México'),
(1238, '14250', 'Miguel Hidalgo', 'Tlalpan', 'Ciudad de México'),
(1239, '14260', 'El Capulín', 'Tlalpan', 'Ciudad de México'),
(1240, '14260', 'Miguel Hidalgo 1A Sección', 'Tlalpan', 'Ciudad de México'),
(1241, '14266', 'Zacayucan Peña Pobre', 'Tlalpan', 'Ciudad de México'),
(1242, '14267', 'De Caramagüey', 'Tlalpan', 'Ciudad de México'),
(1243, '14268', 'La Lonja', 'Tlalpan', 'Ciudad de México'),
(1244, '14269', 'La Fama', 'Tlalpan', 'Ciudad de México'),
(1245, '14270', 'Primavera', 'Tlalpan', 'Ciudad de México'),
(1246, '14275', 'Paraje 38', 'Tlalpan', 'Ciudad de México'),
(1247, '14300', 'Nueva Oriental Coapa', 'Tlalpan', 'Ciudad de México'),
(1248, '14300', 'Residencial Acoxpa', 'Tlalpan', 'Ciudad de México'),
(1249, '14300', 'Residencial Miramontes', 'Tlalpan', 'Ciudad de México'),
(1250, '14308', 'Ex Hacienda Coapa', 'Tlalpan', 'Ciudad de México'),
(1251, '14310', 'Belisario Domínguez', 'Tlalpan', 'Ciudad de México'),
(1252, '14310', 'Floresta Coyoacán', 'Tlalpan', 'Ciudad de México'),
(1253, '14320', 'Vergel Coapa', 'Tlalpan', 'Ciudad de México'),
(1254, '14325', 'Rinconada Coapa 2A Sección', 'Tlalpan', 'Ciudad de México'),
(1255, '14326', 'Tenorios', 'Tlalpan', 'Ciudad de México'),
(1256, '14330', 'Granjas Coapa', 'Tlalpan', 'Ciudad de México'),
(1257, '14330', 'Rinconada Coapa 1A Sección', 'Tlalpan', 'Ciudad de México'),
(1258, '14340', 'Vergel de Coyoacán', 'Tlalpan', 'Ciudad de México'),
(1259, '14340', 'Vergel del Sur', 'Tlalpan', 'Ciudad de México'),
(1260, '14350', 'Prado Coapa 1A Sección', 'Tlalpan', 'Ciudad de México'),
(1261, '14357', 'Prado Coapa 2A Sección', 'Tlalpan', 'Ciudad de México'),
(1262, '14357', 'Prado Coapa 3A Sección', 'Tlalpan', 'Ciudad de México'),
(1263, '14360', 'Magisterial', 'Tlalpan', 'Ciudad de México'),
(1264, '14360', 'Magisterial Coapa', 'Tlalpan', 'Ciudad de México'),
(1265, '14370', 'Residencial Chimali', 'Tlalpan', 'Ciudad de México'),
(1266, '14370', 'San Lorenzo Huipulco', 'Tlalpan', 'Ciudad de México'),
(1267, '14370', 'Villa Lázaro Cárdenas', 'Tlalpan', 'Ciudad de México'),
(1268, '14376', 'Arboledas del Sur', 'Tlalpan', 'Ciudad de México'),
(1269, '14377', 'Hacienda San Juan', 'Tlalpan', 'Ciudad de México'),
(1270, '14380', 'A.M.S.A', 'Tlalpan', 'Ciudad de México'),
(1271, '14380', 'San Bartolo El Chico', 'Tlalpan', 'Ciudad de México'),
(1272, '14386', 'Rancho los Colorines', 'Tlalpan', 'Ciudad de México'),
(1273, '14387', 'Ex Hacienda San Juan de Dios', 'Tlalpan', 'Ciudad de México'),
(1274, '14388', 'Guadalupe', 'Tlalpan', 'Ciudad de México'),
(1275, '14389', 'Arenal de Guadalupe', 'Tlalpan', 'Ciudad de México'),
(1276, '14390', 'Rinconada Las Hadas', 'Tlalpan', 'Ciudad de México'),
(1277, '14390', 'Narciso Mendoza', 'Tlalpan', 'Ciudad de México'),
(1278, '14390', 'Residencial Villa Coapa', 'Tlalpan', 'Ciudad de México'),
(1279, '14390', 'Villa Coapa', 'Tlalpan', 'Ciudad de México'),
(1280, '14400', 'San Andrés Totoltepec', 'Tlalpan', 'Ciudad de México'),
(1281, '14406', 'Divisadero', 'Tlalpan', 'Ciudad de México'),
(1282, '14408', 'Nuevo Renacimiento de Axalco', 'Tlalpan', 'Ciudad de México'),
(1283, '14409', 'Tecorral', 'Tlalpan', 'Ciudad de México'),
(1284, '14410', 'Fuentes Brotantes', 'Tlalpan', 'Ciudad de México'),
(1285, '14420', 'Cumbres de Tepetongo', 'Tlalpan', 'Ciudad de México'),
(1286, '14420', 'Mesa de los Hornos', 'Tlalpan', 'Ciudad de México'),
(1287, '14420', 'Santa Úrsula Xitla', 'Tlalpan', 'Ciudad de México'),
(1288, '14426', 'Texcaltenco', 'Tlalpan', 'Ciudad de México'),
(1289, '14426', 'Tlaxcaltenco la Mesa', 'Tlalpan', 'Ciudad de México'),
(1290, '14427', 'San Juan Tepeximilpa', 'Tlalpan', 'Ciudad de México'),
(1291, '14427', 'Tepeximilpa la Paz', 'Tlalpan', 'Ciudad de México'),
(1292, '14429', 'Santísima Trinidad', 'Tlalpan', 'Ciudad de México'),
(1293, '14430', 'El Truenito', 'Tlalpan', 'Ciudad de México'),
(1294, '14430', 'Tlalcoligia', 'Tlalpan', 'Ciudad de México'),
(1295, '14438', 'Pedregal de Santa Úrsula Xitla', 'Tlalpan', 'Ciudad de México'),
(1296, '14439', 'Pedregal de las Águilas', 'Tlalpan', 'Ciudad de México'),
(1297, '14440', 'Los Volcanes', 'Tlalpan', 'Ciudad de México'),
(1298, '14449', 'El Mirador 1A Sección', 'Tlalpan', 'Ciudad de México'),
(1299, '14449', 'El Mirador 2A Sección', 'Tlalpan', 'Ciudad de México'),
(1300, '14449', 'El Mirador 3A Sección', 'Tlalpan', 'Ciudad de México'),
(1301, '14460', 'Tlalpuente', 'Tlalpan', 'Ciudad de México'),
(1302, '14470', 'Plan de Ayala', 'Tlalpan', 'Ciudad de México'),
(1303, '14476', 'La Palma', 'Tlalpan', 'Ciudad de México'),
(1304, '14479', 'Viveros Coatectlán', 'Tlalpan', 'Ciudad de México'),
(1305, '14480', 'La Magdalena Petlacalco', 'Tlalpan', 'Ciudad de México'),
(1306, '14490', 'San Miguel Xicalco', 'Tlalpan', 'Ciudad de México'),
(1307, '14500', 'San Miguel Topilejo', 'Tlalpan', 'Ciudad de México'),
(1308, '14600', 'Valle Escondido', 'Tlalpan', 'Ciudad de México'),
(1309, '14608', 'Colinas del Bosque', 'Tlalpan', 'Ciudad de México'),
(1310, '14609', 'Las Tórtolas', 'Tlalpan', 'Ciudad de México'),
(1311, '14610', 'Arenal Tepepan', 'Tlalpan', 'Ciudad de México'),
(1312, '14620', 'Club de Golf México', 'Tlalpan', 'Ciudad de México'),
(1313, '14629', 'San Buenaventura', 'Tlalpan', 'Ciudad de México'),
(1314, '14630', 'Chimalcoyoc', 'Tlalpan', 'Ciudad de México'),
(1315, '14630', 'Villa Tlalpan', 'Tlalpan', 'Ciudad de México'),
(1316, '14640', 'Ejidos de San Pedro Mártir', 'Tlalpan', 'Ciudad de México'),
(1317, '14643', 'Fuentes de Tepepan', 'Tlalpan', 'Ciudad de México'),
(1318, '14646', 'Valle de Tepepan', 'Tlalpan', 'Ciudad de México'),
(1319, '14647', 'Juventud Unida', 'Tlalpan', 'Ciudad de México'),
(1320, '14647', 'Movimiento Organizado de Tlalpan', 'Tlalpan', 'Ciudad de México'),
(1321, '14647', 'Rinconada El Mirador', 'Tlalpan', 'Ciudad de México'),
(1322, '14650', 'San Pedro Mártir', 'Tlalpan', 'Ciudad de México'),
(1323, '14653', 'Heróico Colegio Militar', 'Tlalpan', 'Ciudad de México'),
(1324, '14657', 'Tlalmille', 'Tlalpan', 'Ciudad de México'),
(1325, '14658', 'Mirador del Valle', 'Tlalpan', 'Ciudad de México'),
(1326, '14659', 'María Esther Zuno de Echeverría', 'Tlalpan', 'Ciudad de México'),
(1327, '14700', 'San Miguel Ajusco', 'Tlalpan', 'Ciudad de México'),
(1328, '14710', 'Santo Tomas Ajusco', 'Tlalpan', 'Ciudad de México'),
(1329, '14720', 'Belvedere Ajusco', 'Tlalpan', 'Ciudad de México'),
(1330, '14730', 'Lomas de Cuilotepec', 'Tlalpan', 'Ciudad de México'),
(1331, '14735', 'Lomas de Tepemecatl', 'Tlalpan', 'Ciudad de México'),
(1332, '14737', 'Vistas del Pedregal', 'Tlalpan', 'Ciudad de México'),
(1333, '14738', 'Bosques del Pedregal', 'Tlalpan', 'Ciudad de México'),
(1334, '14739', '2 de Octubre', 'Tlalpan', 'Ciudad de México'),
(1335, '14740', 'Lomas de Padierna Sur', 'Tlalpan', 'Ciudad de México'),
(1336, '14748', 'Mirador I', 'Tlalpan', 'Ciudad de México'),
(1337, '14748', 'Mirador II', 'Tlalpan', 'Ciudad de México'),
(1338, '14749', 'Chimilli', 'Tlalpan', 'Ciudad de México'),
(1339, '14760', 'Héroes de 1910', 'Tlalpan', 'Ciudad de México'),
(1340, '14900', 'Parres El Guarda', 'Tlalpan', 'Ciudad de México'),
(1341, '15000', 'General Ignacio Zaragoza', 'Venustiano Carranza', 'Ciudad de México'),
(1342, '15010', 'Valentín Gómez Farias', 'Venustiano Carranza', 'Ciudad de México'),
(1343, '15020', 'Puebla', 'Venustiano Carranza', 'Ciudad de México'),
(1344, '15100', 'Zona Centro', 'Venustiano Carranza', 'Ciudad de México'),
(1345, '15200', 'Janitzio', 'Venustiano Carranza', 'Ciudad de México'),
(1346, '15210', 'Valle Gómez', 'Venustiano Carranza', 'Ciudad de México'),
(1347, '15220', 'Nicolás Bravo', 'Venustiano Carranza', 'Ciudad de México'),
(1348, '15220', 'Popular Rastro', 'Venustiano Carranza', 'Ciudad de México'),
(1349, '15230', 'Emilio Carranza', 'Venustiano Carranza', 'Ciudad de México'),
(1350, '15240', 'Michoacana', 'Venustiano Carranza', 'Ciudad de México'),
(1351, '15250', 'Ampliación Michoacana', 'Venustiano Carranza', 'Ciudad de México'),
(1352, '15260', 'Ampliación 20 de Noviembre', 'Venustiano Carranza', 'Ciudad de México'),
(1353, '15270', 'Morelos', 'Venustiano Carranza', 'Ciudad de México'),
(1354, '15280', 'Penitenciaria', 'Venustiano Carranza', 'Ciudad de México'),
(1355, '15290', '10 de Mayo', 'Venustiano Carranza', 'Ciudad de México'),
(1356, '15300', '20 de Noviembre', 'Venustiano Carranza', 'Ciudad de México'),
(1357, '15309', '5o Tramo 20 de Noviembre', 'Venustiano Carranza', 'Ciudad de México'),
(1358, '15310', 'Felipe Ángeles', 'Venustiano Carranza', 'Ciudad de México'),
(1359, '15320', 'Azteca', 'Venustiano Carranza', 'Ciudad de México'),
(1360, '15330', 'Tres Mosqueteros', 'Venustiano Carranza', 'Ciudad de México'),
(1361, '15339', 'Ampliación Venustiano Carranza', 'Venustiano Carranza', 'Ciudad de México'),
(1362, '15340', 'Venustiano Carranza', 'Venustiano Carranza', 'Ciudad de México'),
(1363, '15350', 'Ampliación Penitenciaria', 'Venustiano Carranza', 'Ciudad de México'),
(1364, '15370', 'Progresista', 'Venustiano Carranza', 'Ciudad de México'),
(1365, '15380', 'Escuela de Tiro', 'Venustiano Carranza', 'Ciudad de México'),
(1366, '15390', '7 de Julio', 'Venustiano Carranza', 'Ciudad de México'),
(1367, '15400', 'Romero Rubio', 'Venustiano Carranza', 'Ciudad de México'),
(1368, '15410', 'Simón Bolívar', 'Venustiano Carranza', 'Ciudad de México'),
(1369, '15420', 'Ampliación Simón Bolívar', 'Venustiano Carranza', 'Ciudad de México'),
(1370, '15430', 'Aquiles Serdán', 'Venustiano Carranza', 'Ciudad de México'),
(1371, '15440', '1° de Mayo', 'Venustiano Carranza', 'Ciudad de México'),
(1372, '15450', 'Damián Carmona', 'Venustiano Carranza', 'Ciudad de México'),
(1373, '15460', 'Revolución', 'Venustiano Carranza', 'Ciudad de México'),
(1374, '15470', 'Miguel Hidalgo', 'Venustiano Carranza', 'Ciudad de México'),
(1375, '15500', 'Moctezuma 1a Sección', 'Venustiano Carranza', 'Ciudad de México'),
(1376, '15510', 'Pensador Mexicano', 'Venustiano Carranza', 'Ciudad de México'),
(1377, '15520', 'Peñón de los Baños', 'Venustiano Carranza', 'Ciudad de México'),
(1378, '15530', 'Moctezuma 2a Sección', 'Venustiano Carranza', 'Ciudad de México'),
(1379, '15540', 'Santa Cruz Aviación', 'Venustiano Carranza', 'Ciudad de México'),
(1380, '15600', 'Arenal 1a Sección', 'Venustiano Carranza', 'Ciudad de México'),
(1381, '15610', 'Cuchilla Pantitlán', 'Venustiano Carranza', 'Ciudad de México'),
(1382, '15620', 'México (Lic. Benito Juárez)', 'Venustiano Carranza', 'Ciudad de México'),
(1383, '15630', 'Caracol', 'Venustiano Carranza', 'Ciudad de México'),
(1384, '15640', 'Arenal 4a Sección', 'Venustiano Carranza', 'Ciudad de México'),
(1385, '15640', 'Arenal Puerto Aéreo', 'Venustiano Carranza', 'Ciudad de México'),
(1386, '15650', 'Ampliación Caracol', 'Venustiano Carranza', 'Ciudad de México'),
(1387, '15660', 'Arenal 3a Sección', 'Venustiano Carranza', 'Ciudad de México'),
(1388, '15670', 'Adolfo López Mateos', 'Venustiano Carranza', 'Ciudad de México'),
(1389, '15680', 'Arenal 2a Sección', 'Venustiano Carranza', 'Ciudad de México'),
(1390, '15700', 'Federal', 'Venustiano Carranza', 'Ciudad de México'),
(1391, '15710', 'Industrial Puerto Aéreo', 'Venustiano Carranza', 'Ciudad de México'),
(1392, '15730', '4 Árboles', 'Venustiano Carranza', 'Ciudad de México'),
(1393, '15740', 'Aviación Civil', 'Venustiano Carranza', 'Ciudad de México'),
(1394, '15750', 'Ampliación Aviación Civil', 'Venustiano Carranza', 'Ciudad de México'),
(1395, '15800', 'Jamaica', 'Venustiano Carranza', 'Ciudad de México'),
(1396, '15810', 'Merced Balbuena', 'Venustiano Carranza', 'Ciudad de México'),
(1397, '15820', 'Lorenzo Boturini', 'Venustiano Carranza', 'Ciudad de México'),
(1398, '15830', 'Artes Gráficas', 'Venustiano Carranza', 'Ciudad de México'),
(1399, '15840', 'Sevilla', 'Venustiano Carranza', 'Ciudad de México'),
(1400, '15850', 'Magdalena Mixiuhca', 'Venustiano Carranza', 'Ciudad de México'),
(1401, '15860', 'La Magdalena Mixiuhca', 'Venustiano Carranza', 'Ciudad de México'),
(1402, '15870', 'Aarón Sáenz', 'Venustiano Carranza', 'Ciudad de México');
INSERT INTO `t_cat_data_dir` (`id_cat_data_dir`, `codigo_postal`, `colonia`, `alcaldia`, `entidad_federativa`) VALUES
(1403, '15900', 'Jardín Balbuena', 'Venustiano Carranza', 'Ciudad de México'),
(1404, '15960', 'Del Parque', 'Venustiano Carranza', 'Ciudad de México'),
(1405, '15970', 'Aeronáutica Militar', 'Venustiano Carranza', 'Ciudad de México'),
(1406, '15980', '24 de Abril', 'Venustiano Carranza', 'Ciudad de México'),
(1407, '15990', 'Álvaro Obregón', 'Venustiano Carranza', 'Ciudad de México'),
(1408, '16000', 'La Concepción Tlacoapa', 'Xochimilco', 'Ciudad de México'),
(1409, '16000', 'San Antonio', 'Xochimilco', 'Ciudad de México'),
(1410, '16000', 'San Juan', 'Xochimilco', 'Ciudad de México'),
(1411, '16010', 'Bosque Residencial del Sur', 'Xochimilco', 'Ciudad de México'),
(1412, '16010', 'Las Peritas', 'Xochimilco', 'Ciudad de México'),
(1413, '16010', 'Paseos del Sur', 'Xochimilco', 'Ciudad de México'),
(1414, '16010', 'San Bartolo El Chico', 'Xochimilco', 'Ciudad de México'),
(1415, '16020', 'San Juan Tepepan', 'Xochimilco', 'Ciudad de México'),
(1416, '16020', 'Santa María Tepepan', 'Xochimilco', 'Ciudad de México'),
(1417, '16029', 'Ampliación Tepepan', 'Xochimilco', 'Ciudad de México'),
(1418, '16030', 'Huichapan', 'Xochimilco', 'Ciudad de México'),
(1419, '16030', 'La Noria', 'Xochimilco', 'Ciudad de México'),
(1420, '16030', 'Potrero de San Bernardino', 'Xochimilco', 'Ciudad de México'),
(1421, '16030', 'Ampliación La Noria', 'Xochimilco', 'Ciudad de México'),
(1422, '16034', '18', 'Xochimilco', 'Ciudad de México'),
(1423, '16035', 'San Lorenzo La Cebada', 'Xochimilco', 'Ciudad de México'),
(1424, '16035', 'Rinconada Coapa', 'Xochimilco', 'Ciudad de México'),
(1425, '16036', 'Mercado de Flores Plantas y Hortalizas', 'Xochimilco', 'Ciudad de México'),
(1426, '16038', 'Ampliación San Marcos Norte', 'Xochimilco', 'Ciudad de México'),
(1427, '16040', 'La Asunción', 'Xochimilco', 'Ciudad de México'),
(1428, '16040', 'San Lorenzo', 'Xochimilco', 'Ciudad de México'),
(1429, '16050', 'Jardines del Sur', 'Xochimilco', 'Ciudad de México'),
(1430, '16050', 'San Marcos', 'Xochimilco', 'Ciudad de México'),
(1431, '16050', 'Tierra Nueva', 'Xochimilco', 'Ciudad de México'),
(1432, '16059', 'Pblo. Stgo.Tepalcatlalpan, U. H. Rinconada del Sur', 'Xochimilco', 'Ciudad de México'),
(1433, '16060', 'El Mirador', 'Xochimilco', 'Ciudad de México'),
(1434, '16070', 'Belén', 'Xochimilco', 'Ciudad de México'),
(1435, '16070', 'El Rosario', 'Xochimilco', 'Ciudad de México'),
(1436, '16070', 'La Guadalupita', 'Xochimilco', 'Ciudad de México'),
(1437, '16070', 'Santa Crucita', 'Xochimilco', 'Ciudad de México'),
(1438, '16080', 'La Santísima', 'Xochimilco', 'Ciudad de México'),
(1439, '16080', 'San Cristóbal', 'Xochimilco', 'Ciudad de México'),
(1440, '16080', 'San Diego', 'Xochimilco', 'Ciudad de México'),
(1441, '16080', 'San Esteban', 'Xochimilco', 'Ciudad de México'),
(1442, '16090', 'San Pedro', 'Xochimilco', 'Ciudad de México'),
(1443, '16090', 'Tablas de San Lorenzo', 'Xochimilco', 'Ciudad de México'),
(1444, '16090', 'Xaltocan', 'Xochimilco', 'Ciudad de México'),
(1445, '16100', 'Santa Cruz Xochitepec', 'Xochimilco', 'Ciudad de México'),
(1446, '16200', 'Santiago Tepalcatlalpan', 'Xochimilco', 'Ciudad de México'),
(1447, '16210', 'La Concha', 'Xochimilco', 'Ciudad de México'),
(1448, '16300', 'San Lucas Xochimanca', 'Xochimilco', 'Ciudad de México'),
(1449, '16310', 'La Cañada', 'Xochimilco', 'Ciudad de México'),
(1450, '16320', 'San Lucas Oriente', 'Xochimilco', 'Ciudad de México'),
(1451, '16340', 'Texmic', 'Xochimilco', 'Ciudad de México'),
(1452, '16400', 'San Lorenzo Atemoaya', 'Xochimilco', 'Ciudad de México'),
(1453, '16410', 'Lomas de Tonalco', 'Xochimilco', 'Ciudad de México'),
(1454, '16420', 'San Jerónimo', 'Xochimilco', 'Ciudad de México'),
(1455, '16428', 'El Jazmín', 'Xochimilco', 'Ciudad de México'),
(1456, '16429', 'Rancho Tejomulco', 'Xochimilco', 'Ciudad de México'),
(1457, '16430', 'Xochipilli', 'Xochimilco', 'Ciudad de México'),
(1458, '16440', 'Año de Juárez', 'Xochimilco', 'Ciudad de México'),
(1459, '16443', 'Pocitos', 'Xochimilco', 'Ciudad de México'),
(1460, '16450', 'Santa María Nativitas', 'Xochimilco', 'Ciudad de México'),
(1461, '16457', 'Lomas de Nativitas', 'Xochimilco', 'Ciudad de México'),
(1462, '16459', 'Ampliación Nativitas', 'Xochimilco', 'Ciudad de México'),
(1463, '16500', 'Santa Cruz Acalpixca', 'Xochimilco', 'Ciudad de México'),
(1464, '16513', 'Apatlaco', 'Xochimilco', 'Ciudad de México'),
(1465, '16513', 'Del Puente', 'Xochimilco', 'Ciudad de México'),
(1466, '16514', 'La Gallera', 'Xochimilco', 'Ciudad de México'),
(1467, '16514', 'Tetitla', 'Xochimilco', 'Ciudad de México'),
(1468, '16514', 'Calpulco', 'Xochimilco', 'Ciudad de México'),
(1469, '16520', 'La Planta', 'Xochimilco', 'Ciudad de México'),
(1470, '16530', 'Las Cruces', 'Xochimilco', 'Ciudad de México'),
(1471, '16530', 'Las Flores', 'Xochimilco', 'Ciudad de México'),
(1472, '16533', 'Ahualapa', 'Xochimilco', 'Ciudad de México'),
(1473, '16550', 'Valle de Santa María', 'Xochimilco', 'Ciudad de México'),
(1474, '16600', 'San Gregorio Atlapulco', 'Xochimilco', 'Ciudad de México'),
(1475, '16604', 'San Andrés', 'Xochimilco', 'Ciudad de México'),
(1476, '16605', 'Los Reyes', 'Xochimilco', 'Ciudad de México'),
(1477, '16606', '3 de Mayo', 'Xochimilco', 'Ciudad de México'),
(1478, '16607', 'San Antonio', 'Xochimilco', 'Ciudad de México'),
(1479, '16609', 'La Candelaria', 'Xochimilco', 'Ciudad de México'),
(1480, '16610', 'San Luis Tlaxialtemalco', 'Xochimilco', 'Ciudad de México'),
(1481, '16614', 'Niños Héroes', 'Xochimilco', 'Ciudad de México'),
(1482, '16615', 'La Asunción', 'Xochimilco', 'Ciudad de México'),
(1483, '16616', 'Santa Cecilia', 'Xochimilco', 'Ciudad de México'),
(1484, '16617', 'San Sebastián', 'Xochimilco', 'Ciudad de México'),
(1485, '16620', 'San José', 'Xochimilco', 'Ciudad de México'),
(1486, '16629', 'La Guadalupana', 'Xochimilco', 'Ciudad de México'),
(1487, '16629', 'San Juan', 'Xochimilco', 'Ciudad de México'),
(1488, '16630', 'San Juan Moyotepec', 'Xochimilco', 'Ciudad de México'),
(1489, '16640', 'San Juan Minas', 'Xochimilco', 'Ciudad de México'),
(1490, '16710', 'Quirino Mendoza', 'Xochimilco', 'Ciudad de México'),
(1491, '16720', 'Del Carmen', 'Xochimilco', 'Ciudad de México'),
(1492, '16739', 'San Isidro', 'Xochimilco', 'Ciudad de México'),
(1493, '16740', 'Guadalupita', 'Xochimilco', 'Ciudad de México'),
(1494, '16749', 'Las Animas', 'Xochimilco', 'Ciudad de México'),
(1495, '16750', 'Calyequita', 'Xochimilco', 'Ciudad de México'),
(1496, '16770', 'San Felipe', 'Xochimilco', 'Ciudad de México'),
(1497, '16776', 'Santiaguito', 'Xochimilco', 'Ciudad de México'),
(1498, '16776', 'El Mirador', 'Xochimilco', 'Ciudad de México'),
(1499, '16780', 'Cerrillos Primera Sección', 'Xochimilco', 'Ciudad de México'),
(1500, '16780', 'El Sacrificio', 'Xochimilco', 'Ciudad de México'),
(1501, '16780', 'Cristo Rey', 'Xochimilco', 'Ciudad de México'),
(1502, '16780', 'Cerrillos Segunda Sección', 'Xochimilco', 'Ciudad de México'),
(1503, '16780', 'Cerrillos Tercera Sección', 'Xochimilco', 'Ciudad de México'),
(1504, '16797', 'Nativitas', 'Xochimilco', 'Ciudad de México'),
(1505, '16799', 'Las Mesitas', 'Xochimilco', 'Ciudad de México'),
(1506, '16800', 'San Mateo Xalpa', 'Xochimilco', 'Ciudad de México'),
(1507, '16810', 'San Andrés Ahuayucan', 'Xochimilco', 'Ciudad de México'),
(1508, '16810', 'Santa Inés', 'Xochimilco', 'Ciudad de México'),
(1509, '16810', 'Rosario Tlali', 'Xochimilco', 'Ciudad de México'),
(1510, '16813', 'El Calvario', 'Xochimilco', 'Ciudad de México'),
(1511, '16840', 'Santa Cruz Chavarrieta', 'Xochimilco', 'Ciudad de México'),
(1512, '16850', 'Chapultepec', 'Xochimilco', 'Ciudad de México'),
(1513, '16860', 'Santa Cruz de Guadalupe', 'Xochimilco', 'Ciudad de México'),
(1514, '16880', 'Santa Cecilia Tepetlapa', 'Xochimilco', 'Ciudad de México'),
(1515, '16900', 'San Francisco Tlalnepantla', 'Xochimilco', 'Ciudad de México'),
(1516, '', '', '', ''),
(1517, '', '', '', ''),
(1518, '', '', '', ''),
(1519, '', '', '', ''),
(1520, '', '', '', ''),
(1521, '', '', '', ''),
(1522, '', '', '', ''),
(1523, '', '', '', ''),
(1524, '', '', '', ''),
(1525, '', '', '', ''),
(1526, '', '', '', ''),
(1527, '', '', '', ''),
(1528, '', '', '', ''),
(1529, '', '', '', ''),
(1530, '', '', '', ''),
(1531, '', '', '', ''),
(1532, '', '', '', ''),
(1533, '', '', '', ''),
(1534, '', '', '', ''),
(1535, '', '', '', ''),
(1536, '', '', '', ''),
(1537, '', '', '', ''),
(1538, '', '', '', ''),
(1539, '', '', '', ''),
(1540, '', '', '', ''),
(1541, '', '', '', ''),
(1542, '', '', '', ''),
(1543, '', '', '', ''),
(1544, '', '', '', ''),
(1545, '', '', '', ''),
(1546, '', '', '', ''),
(1547, '', '', '', ''),
(1548, '', '', '', ''),
(1549, '', '', '', ''),
(1550, '', '', '', ''),
(1551, '', '', '', ''),
(1552, '', '', '', ''),
(1553, '', '', '', ''),
(1554, '', '', '', ''),
(1555, '', '', '', ''),
(1556, '', '', '', ''),
(1557, '', '', '', ''),
(1558, '', '', '', ''),
(1559, '', '', '', ''),
(1560, '', '', '', ''),
(1561, '', '', '', ''),
(1562, '', '', '', ''),
(1563, '', '', '', ''),
(1564, '', '', '', ''),
(1565, '', '', '', ''),
(1566, '', '', '', ''),
(1567, '', '', '', ''),
(1568, '', '', '', ''),
(1569, '', '', '', ''),
(1570, '', '', '', ''),
(1571, '', '', '', ''),
(1572, '', '', '', ''),
(1573, '', '', '', ''),
(1574, '', '', '', ''),
(1575, '', '', '', ''),
(1576, '', '', '', ''),
(1577, '', '', '', ''),
(1578, '', '', '', ''),
(1579, '', '', '', ''),
(1580, '', '', '', ''),
(1581, '', '', '', ''),
(1582, '', '', '', ''),
(1583, '', '', '', ''),
(1584, '', '', '', ''),
(1585, '', '', '', ''),
(1586, '', '', '', ''),
(1587, '', '', '', ''),
(1588, '', '', '', ''),
(1589, '', '', '', ''),
(1590, '', '', '', ''),
(1591, '', '', '', ''),
(1592, '', '', '', ''),
(1593, '', '', '', ''),
(1594, '', '', '', ''),
(1595, '', '', '', ''),
(1596, '', '', '', ''),
(1597, '', '', '', ''),
(1598, '', '', '', ''),
(1599, '', '', '', ''),
(1600, '', '', '', ''),
(1601, '', '', '', ''),
(1602, '', '', '', ''),
(1603, '', '', '', ''),
(1604, '', '', '', ''),
(1605, '', '', '', ''),
(1606, '', '', '', ''),
(1607, '', '', '', ''),
(1608, '', '', '', ''),
(1609, '', '', '', ''),
(1610, '', '', '', ''),
(1611, '', '', '', ''),
(1612, '', '', '', ''),
(1613, '', '', '', ''),
(1614, '', '', '', ''),
(1615, '', '', '', ''),
(1616, '', '', '', ''),
(1617, '', '', '', ''),
(1618, '', '', '', ''),
(1619, '', '', '', ''),
(1620, '', '', '', ''),
(1621, '', '', '', ''),
(1622, '', '', '', ''),
(1623, '', '', '', ''),
(1624, '', '', '', ''),
(1625, '', '', '', ''),
(1626, '', '', '', ''),
(1627, '', '', '', ''),
(1628, '', '', '', ''),
(1629, '', '', '', ''),
(1630, '', '', '', ''),
(1631, '', '', '', ''),
(1632, '', '', '', ''),
(1633, '', '', '', ''),
(1634, '', '', '', ''),
(1635, '', '', '', ''),
(1636, '', '', '', ''),
(1637, '', '', '', ''),
(1638, '', '', '', ''),
(1639, '', '', '', ''),
(1640, '', '', '', ''),
(1641, '', '', '', ''),
(1642, '', '', '', ''),
(1643, '', '', '', ''),
(1644, '', '', '', ''),
(1645, '', '', '', ''),
(1646, '', '', '', ''),
(1647, '', '', '', ''),
(1648, '', '', '', ''),
(1649, '', '', '', ''),
(1650, '', '', '', ''),
(1651, '', '', '', ''),
(1652, '', '', '', ''),
(1653, '', '', '', ''),
(1654, '', '', '', ''),
(1655, '', '', '', ''),
(1656, '', '', '', ''),
(1657, '', '', '', ''),
(1658, '', '', '', ''),
(1659, '', '', '', ''),
(1660, '', '', '', ''),
(1661, '', '', '', ''),
(1662, '', '', '', ''),
(1663, '', '', '', ''),
(1664, '', '', '', ''),
(1665, '', '', '', ''),
(1666, '', '', '', ''),
(1667, '', '', '', ''),
(1668, '', '', '', ''),
(1669, '', '', '', ''),
(1670, '', '', '', ''),
(1671, '', '', '', ''),
(1672, '', '', '', ''),
(1673, '', '', '', ''),
(1674, '', '', '', ''),
(1675, '', '', '', ''),
(1676, '', '', '', ''),
(1677, '', '', '', ''),
(1678, '', '', '', ''),
(1679, '', '', '', ''),
(1680, '', '', '', ''),
(1681, '', '', '', ''),
(1682, '', '', '', ''),
(1683, '', '', '', ''),
(1684, '', '', '', ''),
(1685, '', '', '', ''),
(1686, '', '', '', ''),
(1687, '', '', '', ''),
(1688, '', '', '', ''),
(1689, '', '', '', ''),
(1690, '', '', '', ''),
(1691, '', '', '', ''),
(1692, '', '', '', ''),
(1693, '', '', '', ''),
(1694, '', '', '', ''),
(1695, '', '', '', ''),
(1696, '', '', '', ''),
(1697, '', '', '', ''),
(1698, '', '', '', ''),
(1699, '', '', '', ''),
(1700, '', '', '', ''),
(1701, '', '', '', ''),
(1702, '', '', '', ''),
(1703, '', '', '', ''),
(1704, '', '', '', ''),
(1705, '', '', '', ''),
(1706, '', '', '', ''),
(1707, '', '', '', ''),
(1708, '', '', '', ''),
(1709, '', '', '', ''),
(1710, '', '', '', ''),
(1711, '', '', '', ''),
(1712, '', '', '', ''),
(1713, '', '', '', ''),
(1714, '', '', '', ''),
(1715, '', '', '', ''),
(1716, '', '', '', ''),
(1717, '', '', '', ''),
(1718, '', '', '', ''),
(1719, '', '', '', ''),
(1720, '', '', '', ''),
(1721, '', '', '', ''),
(1722, '', '', '', ''),
(1723, '', '', '', ''),
(1724, '', '', '', ''),
(1725, '', '', '', ''),
(1726, '', '', '', ''),
(1727, '', '', '', ''),
(1728, '', '', '', ''),
(1729, '', '', '', ''),
(1730, '', '', '', ''),
(1731, '', '', '', ''),
(1732, '', '', '', ''),
(1733, '', '', '', ''),
(1734, '', '', '', ''),
(1735, '', '', '', ''),
(1736, '', '', '', ''),
(1737, '', '', '', ''),
(1738, '', '', '', ''),
(1739, '', '', '', ''),
(1740, '', '', '', ''),
(1741, '55874', 'Lomas de Santa Catarina', 'Acolman', 'México'),
(1742, '55874', 'La Lagunilla', 'Acolman', 'México'),
(1743, '55875', 'Emiliano Zapata', 'Acolman', 'México'),
(1744, '55875', 'Santa Catarina', 'Acolman', 'México'),
(1745, '55875', 'La Gitana', 'Acolman', 'México'),
(1746, '55877', 'Besana de Santa Catarina y Tepango', 'Acolman', 'México'),
(1747, '55878', 'Santa María Acolman', 'Acolman', 'México'),
(1748, '55878', 'San Bartolo el Chico', 'Acolman', 'México'),
(1749, '55880', 'San Juanico', 'Acolman', 'México'),
(1750, '55880', 'San Bartolo', 'Acolman', 'México'),
(1751, '55880', 'San José', 'Acolman', 'México'),
(1752, '55880', 'Los Reyes', 'Acolman', 'México'),
(1753, '55882', 'Ampliación Lázaro Cárdenas', 'Acolman', 'México'),
(1754, '55882', 'Lázaro Cárdenas', 'Acolman', 'México'),
(1755, '55882', 'Los Ángeles', 'Acolman', 'México'),
(1756, '55882', 'Radiofaro Totolcingo', 'Acolman', 'México'),
(1757, '55882', 'Paraje el Faro', 'Acolman', 'México'),
(1758, '55883', 'Geovillas de Terranova 1a Sección', 'Acolman', 'México'),
(1759, '55883', 'Real del Valle 1a Seccion', 'Acolman', 'México'),
(1760, '55883', 'Las Brisas', 'Acolman', 'México'),
(1761, '55883', 'Laguna de Chiconautla', 'Acolman', 'México'),
(1762, '55883', 'Geovillas de Terranova 2a Sección', 'Acolman', 'México'),
(1763, '55883', 'Real del Valle 2a Sección', 'Acolman', 'México'),
(1764, '55884', 'Anáhuac 1a Secc', 'Acolman', 'México'),
(1765, '55884', 'Anáhuac 2a Secc', 'Acolman', 'México'),
(1766, '55884', 'El Potrero', 'Acolman', 'México'),
(1767, '55884', 'San Miguel Totolcingo', 'Acolman', 'México'),
(1768, '55884', 'Santa Cruz', 'Acolman', 'México'),
(1769, '55884', 'La Era', 'Acolman', 'México'),
(1770, '55884', 'Plan de Guadalupe', 'Acolman', 'México'),
(1771, '55884', 'El Olivo', 'Acolman', 'México'),
(1772, '55884', 'Las Cazuelas', 'Acolman', 'México'),
(1773, '55884', 'Totolzingo', 'Acolman', 'México'),
(1774, '55885', 'Tepexpan', 'Acolman', 'México'),
(1775, '55885', 'Chimalpa', 'Acolman', 'México'),
(1776, '55885', 'STUNAM', 'Acolman', 'México'),
(1777, '55885', 'La Lola', 'Acolman', 'México'),
(1778, '55885', 'San Martín (STUNAM)', 'Acolman', 'México'),
(1779, '55885', 'Los Reyes', 'Acolman', 'México'),
(1780, '55885', 'Misión San Agustín', 'Acolman', 'México'),
(1781, '55885', 'La Cazuela Tepexpan (Santa María Magdalena)', 'Acolman', 'México'),
(1782, '55885', 'Tepexpan (San Luis Grande)', 'Acolman', 'México'),
(1783, '55886', 'Benito Juárez', 'Acolman', 'México'),
(1784, '55886', 'Cuanalan', 'Acolman', 'México'),
(1785, '55886', 'Tetexcala', 'Acolman', 'México'),
(1786, '55886', 'Santa María de Guadalupe', 'Acolman', 'México'),
(1787, '55886', 'Loma Bonita', 'Acolman', 'México'),
(1788, '55887', 'Nueva Colonia el Calvario', 'Acolman', 'México'),
(1789, '55887', 'El Pastal (San Damián)', 'Acolman', 'México'),
(1790, '55887', 'Ejido de San Marcos Nepantla', 'Acolman', 'México'),
(1791, '55887', 'San Marcos Nepantla', 'Acolman', 'México'),
(1792, '55888', 'Pirules', 'Acolman', 'México'),
(1793, '55888', 'Guerrero', 'Acolman', 'México'),
(1794, '55888', 'Prados de San Juan', 'Acolman', 'México'),
(1795, '55890', 'San Marcos', 'Acolman', 'México'),
(1796, '55890', 'San Mateo Chipiltepec', 'Acolman', 'México'),
(1797, '55890', 'Loma Linda', 'Acolman', 'México'),
(1798, '55890', 'Pilares', 'Acolman', 'México'),
(1799, '55890', 'Ahuaxtla', 'Acolman', 'México'),
(1800, '55893', 'San Mateo (Pasando la Vía)', 'Acolman', 'México'),
(1801, '55894', 'San Pedro Tepetitlán', 'Acolman', 'México'),
(1802, '55894', 'El Ranchito', 'Acolman', 'México'),
(1803, '55895', 'San Lucas Tepango', 'Acolman', 'México'),
(1804, '55895', 'San Miguel Xometla', 'Acolman', 'México'),
(1805, '55895', 'La Concepción (Xometla)', 'Acolman', 'México'),
(1806, '55895', 'Quinta las Flores', 'Acolman', 'México'),
(1807, '55895', '1ro de Octubre', 'Acolman', 'México'),
(1808, '55896', 'El Calvario Acolman', 'Acolman', 'México'),
(1809, '55899', 'San Francisco Zacango', 'Acolman', 'México'),
(1810, '55900', 'Otumba de Gómez Farías', 'Otumba', 'México'),
(1811, '55913', 'Xamimilolpa (Xolpa)', 'Otumba', 'México'),
(1812, '55913', 'El Ranchito', 'Otumba', 'México'),
(1813, '55913', 'Estado de México', 'Otumba', 'México'),
(1814, '55913', 'INFONAVIT San Esteban', 'Otumba', 'México'),
(1815, '55913', 'La Trinidad', 'Otumba', 'México'),
(1816, '55913', 'La Estación', 'Otumba', 'México'),
(1817, '55913', 'Adolfo López Mateos', 'Otumba', 'México'),
(1818, '55914', 'El Rosario', 'Otumba', 'México'),
(1819, '55914', 'Magisterial', 'Otumba', 'México'),
(1820, '55914', 'San Cosme', 'Otumba', 'México'),
(1821, '55914', 'Puentes Cuates', 'Otumba', 'México'),
(1822, '55914', 'San Ignacio', 'Otumba', 'México'),
(1823, '55914', 'La Conchita', 'Otumba', 'México'),
(1824, '55916', 'El Chabacano', 'Otumba', 'México'),
(1825, '55920', 'Santiago Tolman', 'Otumba', 'México'),
(1826, '55920', 'La Cruz', 'Otumba', 'México'),
(1827, '55923', 'Coyotepec', 'Otumba', 'México'),
(1828, '55923', 'San Miguel Xolco', 'Otumba', 'México'),
(1829, '55924', 'Chacalco', 'Otumba', 'México'),
(1830, '55924', 'San Juan Tocuila (Tocuila)', 'Otumba', 'México'),
(1831, '55924', 'San Lorenzo', 'Otumba', 'México'),
(1832, '55924', 'Poyoxco', 'Otumba', 'México'),
(1833, '55924', 'Tlalmimilolpa', 'Otumba', 'México'),
(1834, '55924', 'Tlahuico', 'Otumba', 'México'),
(1835, '55924', 'Jacarandas', 'Otumba', 'México'),
(1836, '55924', 'Tepa Grande (Rancho Guadalupe Tepa)', 'Otumba', 'México'),
(1837, '55924', 'Centro de Readaptación Social Otumba', 'Otumba', 'México'),
(1838, '55925', 'San Francisco Tlaltica', 'Otumba', 'México'),
(1839, '55925', 'Oxtotipac', 'Otumba', 'México'),
(1840, '55926', 'Cuautlatcingo', 'Otumba', 'México'),
(1841, '55926', 'Rancho el Mayorazgo', 'Otumba', 'México'),
(1842, '55926', 'Nueva Colonia de Axalco', 'Otumba', 'México'),
(1843, '55926', 'San Miguel Axalco Chico', 'Otumba', 'México'),
(1844, '55926', 'El Potrero', 'Otumba', 'México'),
(1845, '55927', 'Belém', 'Otumba', 'México'),
(1846, '55927', 'Altica', 'Otumba', 'México'),
(1847, '55927', 'La Zumbona', 'Otumba', 'México'),
(1848, '55927', 'Tecalco', 'Otumba', 'México'),
(1849, '55927', 'ZR', 'Otumba', 'México'),
(1850, '55930', 'San Martín Ahuatepec', 'Otumba', 'México'),
(1851, '55930', 'Santa Brígida', 'Otumba', 'México'),
(1852, '55930', 'Los Capulines', 'Otumba', 'México'),
(1853, '55930', 'Liberacos Uno', 'Otumba', 'México'),
(1854, '55930', 'Los Conquianes', 'Otumba', 'México'),
(1855, '55930', 'La Providencia (Florencio Juárez)', 'Otumba', 'México'),
(1856, '55930', 'Rancho la Puente', 'Otumba', 'México'),
(1857, '55930', 'San Cosme', 'Otumba', 'México'),
(1858, '55934', 'Xochihuacán', 'Otumba', 'México'),
(1859, '55935', 'San Marcos (San Marcos Tlaxuchilco)', 'Otumba', 'México'),
(1860, '55936', 'Buenavista', 'Otumba', 'México'),
(1861, '55936', 'Las Papas (Rancho de Don Jorge Olvera)', 'Otumba', 'México'),
(1862, '55936', 'Rancho Colorado', 'Otumba', 'México'),
(1863, '55937', 'Santa Bárbara', 'Otumba', 'México'),
(1864, '55937', 'Santa Gertrudis', 'Otumba', 'México'),
(1865, '55937', 'San Telmo', 'Otumba', 'México'),
(1866, '55937', 'Coamilpa', 'Otumba', 'México'),
(1867, '55937', 'San José de las Presas (Cuautenco)', 'Otumba', 'México'),
(1868, '55937', 'San José Coamilpa (Ejido de Otumba)', 'Otumba', 'México'),
(1869, '55937', 'La Escondida', 'Otumba', 'México'),
(1870, '55940', 'Axapusco', 'Axapusco', 'México'),
(1871, '55940', 'Tlamapa', 'Axapusco', 'México'),
(1872, '55940', 'San Bartolo Alto', 'Axapusco', 'México'),
(1873, '55940', 'San Martín', 'Axapusco', 'México'),
(1874, '55940', 'Cuauhtémoc', 'Axapusco', 'México'),
(1875, '55940', 'San Antonio', 'Axapusco', 'México'),
(1876, '55943', 'Soapayuca', 'Axapusco', 'México'),
(1877, '55943', 'Tezoncalli', 'Axapusco', 'México'),
(1878, '55950', 'La Cañada', 'Axapusco', 'México'),
(1879, '55950', 'Guadalupe Relinas', 'Axapusco', 'México'),
(1880, '55950', 'San Felipe Zacatepec', 'Axapusco', 'México'),
(1881, '55950', 'San Antonio Coayuca', 'Axapusco', 'México'),
(1882, '55952', 'San Mateo', 'Axapusco', 'México'),
(1883, '55952', 'Santa María Actipac', 'Axapusco', 'México'),
(1884, '55952', 'Zacatepec', 'Axapusco', 'México'),
(1885, '55954', 'San Pablo Xuchitl', 'Axapusco', 'México'),
(1886, '55955', 'Santo Domingo Aztacameca', 'Axapusco', 'México'),
(1887, '55955', 'San Nicolás Tetepantla', 'Axapusco', 'México'),
(1888, '55956', 'Los Remedios', 'Axapusco', 'México'),
(1889, '55960', 'San Antonio Ometusco', 'Axapusco', 'México'),
(1890, '55963', 'San Miguel Ometusco', 'Axapusco', 'México'),
(1891, '55963', 'Xala', 'Axapusco', 'México'),
(1892, '55963', 'Santa Ana', 'Axapusco', 'México'),
(1893, '55965', 'Jaltepec', 'Axapusco', 'México'),
(1894, '55966', 'Atla (Tecuautitlán Atla)', 'Axapusco', 'México'),
(1895, '55970', 'Hidalgo A', 'Nopaltepec', 'México'),
(1896, '55970', 'Hidalgo B', 'Nopaltepec', 'México'),
(1897, '55970', 'Morelos A', 'Nopaltepec', 'México'),
(1898, '55970', 'Morelos B', 'Nopaltepec', 'México'),
(1899, '55970', 'Vicente Guerrero', 'Nopaltepec', 'México'),
(1900, '55973', 'La Puerta', 'Nopaltepec', 'México'),
(1901, '55975', 'San Felipe Teotitlán', 'Nopaltepec', 'México'),
(1902, '55975', 'Huilotongo', 'Nopaltepec', 'México'),
(1903, '55975', 'Tlaxixilo', 'Nopaltepec', 'México'),
(1904, '55975', 'Roma', 'Nopaltepec', 'México'),
(1905, '55975', 'Ex-Hacienda de Tepatepec', 'Nopaltepec', 'México'),
(1906, '55976', 'Tepetzingo', 'Nopaltepec', 'México'),
(1907, '55976', 'San Miguel Atepoxco', 'Nopaltepec', 'México'),
(1908, '55976', 'San Felipe (Moratepec)', 'Nopaltepec', 'México'),
(1909, '55977', 'Venta de Cruz', 'Nopaltepec', 'México'),
(1910, '55978', 'Las Ambrises', 'Nopaltepec', 'México'),
(1911, '55978', 'Santa Inés Amiltepec', 'Nopaltepec', 'México'),
(1912, '55980', 'San Bartolomé Actopan', 'Temascalapa', 'México'),
(1913, '55980', 'San Juan Teacalco', 'Temascalapa', 'México'),
(1914, '55980', 'San Miguel', 'Temascalapa', 'México'),
(1915, '55980', 'San Antonio', 'Temascalapa', 'México'),
(1916, '55980', 'De la Cruz', 'Temascalapa', 'México'),
(1917, '55980', 'De Dolores', 'Temascalapa', 'México'),
(1918, '55980', 'San José', 'Temascalapa', 'México'),
(1919, '55983', 'El Abrojal o Barranquillas', 'Temascalapa', 'México'),
(1920, '55983', 'El Chopo', 'Temascalapa', 'México'),
(1921, '55984', 'Belén', 'Temascalapa', 'México'),
(1922, '55984', 'Ocotitlán', 'Temascalapa', 'México'),
(1923, '55984', 'San Cipriano (Rancho el Piojo)', 'Temascalapa', 'México'),
(1924, '55984', 'San Ignacio', 'Temascalapa', 'México'),
(1925, '55985', 'Atempan', 'Temascalapa', 'México'),
(1926, '55985', 'Tepehuixco', 'Temascalapa', 'México'),
(1927, '55988', 'Las Pintas', 'Temascalapa', 'México'),
(1928, '55989', 'Presa del Rey', 'Temascalapa', 'México'),
(1929, '55990', 'Ixtlahuaca de Cuauhtémoc', 'Temascalapa', 'México'),
(1930, '55993', 'San Mateo Teopancala', 'Temascalapa', 'México'),
(1931, '55993', 'La Estrella', 'Temascalapa', 'México'),
(1932, '55993', 'Ex Hacienda de Paula', 'Temascalapa', 'México'),
(1933, '55994', 'Santa Ana Tlachihualpa', 'Temascalapa', 'México'),
(1934, '55994', 'Axalpa', 'Temascalapa', 'México'),
(1935, '55994', 'Tontiopa', 'Temascalapa', 'México'),
(1936, '55995', 'San Luis Tecuautitlán', 'Temascalapa', 'México'),
(1937, '55995', 'San Luis', 'Temascalapa', 'México'),
(1938, '55995', 'Mihuacán', 'Temascalapa', 'México'),
(1939, '55996', 'Santa María Maquixco (El Alto)', 'Temascalapa', 'México'),
(1940, '55996', 'Álvaro Obregón', 'Temascalapa', 'México'),
(1941, '55996', 'La Presa', 'Temascalapa', 'México'),
(1942, '55997', 'San Cristóbal Colhuacán', 'Temascalapa', 'México'),
(1943, '55998', 'San Miguel Atlamajac', 'Temascalapa', 'México'),
(1944, '55998', 'El Tejocote', 'Temascalapa', 'México'),
(1945, '56000', 'Tezoyuca', 'Tezoyuca', 'México'),
(1946, '56003', 'Buenos Aires', 'Tezoyuca', 'México'),
(1947, '56004', 'Ejido el Rosario', 'Tezoyuca', 'México'),
(1948, '56004', 'Resurrección', 'Tezoyuca', 'México'),
(1949, '56005', 'La Ascención', 'Tezoyuca', 'México'),
(1950, '56006', 'Santiago', 'Tezoyuca', 'México'),
(1951, '56006', 'El Oasis', 'Tezoyuca', 'México'),
(1952, '56007', 'Ejido de las Casas Viejas', 'Tezoyuca', 'México'),
(1953, '56007', 'El Ejido San Felipe (Calle de la Mina)', 'Tezoyuca', 'México'),
(1954, '56007', 'San Felipe', 'Tezoyuca', 'México'),
(1955, '56010', 'Ampliación Tezoyuca', 'Tezoyuca', 'México'),
(1956, '56020', 'Tequisistlán', 'Tezoyuca', 'México'),
(1957, '56023', 'Guadalupano (Ejido Tequisistlán)', 'Tezoyuca', 'México'),
(1958, '56024', 'De Tequisistlán Primero', 'Tezoyuca', 'México'),
(1959, '56030', 'San Andrés Chiautla Centro', 'Chiautla', 'México'),
(1960, '56030', 'San Sebastián', 'Chiautla', 'México'),
(1961, '56030', 'San Juan', 'Chiautla', 'México'),
(1962, '56030', 'Pueblo Nuevo', 'Chiautla', 'México'),
(1963, '56030', 'San Francisco', 'Chiautla', 'México'),
(1964, '56030', 'Huitznahuac', 'Chiautla', 'México'),
(1965, '56030', 'Santa Catarina', 'Chiautla', 'México'),
(1966, '56030', 'San Antonio', 'Chiautla', 'México'),
(1967, '56030', 'Residencial San Andrés', 'Chiautla', 'México'),
(1968, '56030', 'California', 'Chiautla', 'México'),
(1969, '56030', 'Residencial San Luis', 'Chiautla', 'México'),
(1970, '56033', 'Santiago Chimalpa (Chimalpa)', 'Chiautla', 'México'),
(1971, '56033', 'Ixquitlán', 'Chiautla', 'México'),
(1972, '56034', 'San Bartolo', 'Chiautla', 'México'),
(1973, '56035', 'La Concepción', 'Chiautla', 'México'),
(1974, '56035', 'Ocopulco', 'Chiautla', 'México'),
(1975, '56035', 'La Frontera', 'Chiautla', 'México'),
(1976, '56036', 'Atenguillo', 'Chiautla', 'México'),
(1977, '56036', 'Amajac', 'Chiautla', 'México'),
(1978, '56036', 'Residencial Los Pirules', 'Chiautla', 'México'),
(1979, '56037', 'San Alberto', 'Chiautla', 'México'),
(1980, '56037', 'Nonoalco', 'Chiautla', 'México'),
(1981, '56037', 'Arboledas', 'Chiautla', 'México'),
(1982, '56038', 'Chiautla (Colonia Guadalupe)', 'Chiautla', 'México'),
(1983, '56040', 'San Lucas Huitzilhuacán', 'Chiautla', 'México'),
(1984, '56040', 'Tepetitlán', 'Chiautla', 'México'),
(1985, '56040', 'Tlaltecahuacán', 'Chiautla', 'México'),
(1986, '56050', 'Papalotla', 'Papalotla', 'México'),
(1987, '56053', 'Belém', 'Papalotla', 'México'),
(1988, '56054', 'Chimalpa', 'Papalotla', 'México'),
(1989, '56055', 'Coxotla', 'Papalotla', 'México'),
(1990, '56056', 'Mazatla', 'Papalotla', 'México'),
(1991, '56057', 'Ixayoc', 'Papalotla', 'México'),
(1992, '56070', 'Huerta Padilla', 'Tepetlaoxtoc', 'México'),
(1993, '56070', 'Concepción Jolalpan Centro', 'Tepetlaoxtoc', 'México'),
(1994, '56070', 'San Pablo Jolalpan', 'Tepetlaoxtoc', 'México'),
(1995, '56070', 'Tepetlaoxtoc de Hidalgo', 'Tepetlaoxtoc', 'México'),
(1996, '56070', 'Los Reyes Nopala', 'Tepetlaoxtoc', 'México'),
(1997, '56070', 'San Francisco Jolalpan', 'Tepetlaoxtoc', 'México'),
(1998, '56074', 'El Tepetloxto (Colonia Lomas de San Gabriel)', 'Tepetlaoxtoc', 'México'),
(1999, '56075', 'La Loma (La Loma San Isidro)', 'Tepetlaoxtoc', 'México'),
(2000, '56077', 'Santiago', 'Tepetlaoxtoc', 'México'),
(2001, '56078', 'Tulteca Teopan', 'Tepetlaoxtoc', 'México'),
(2002, '56080', 'La Venta (La Loma)', 'Tepetlaoxtoc', 'México'),
(2003, '56080', 'San Juan Totolapan', 'Tepetlaoxtoc', 'México'),
(2004, '56080', 'Santo Tomás Apipilhuasco (Santo Tomás)', 'Tepetlaoxtoc', 'México'),
(2005, '56085', 'San Bernardo Tlalmimilolpan', 'Tepetlaoxtoc', 'México'),
(2006, '56086', 'San Andrés de las Peras', 'Tepetlaoxtoc', 'México'),
(2007, '56087', 'San Pedro Chiautzingo', 'Tepetlaoxtoc', 'México'),
(2008, '56087', 'La Trinidad', 'Tepetlaoxtoc', 'México'),
(2009, '56100', 'Texcoco de Mora Centro', 'Texcoco', 'México'),
(2010, '56103', 'El Retiro', 'Texcoco', 'México'),
(2011, '56103', 'San Juan de Dios', 'Texcoco', 'México'),
(2012, '56105', 'San Pedro', 'Texcoco', 'México'),
(2013, '56106', 'Las Salinas', 'Texcoco', 'México'),
(2014, '56110', 'Joyas de San Mateo', 'Texcoco', 'México'),
(2015, '56110', 'Zaragoza-San Pablo', 'Texcoco', 'México'),
(2016, '56120', 'San Juanito', 'Texcoco', 'México'),
(2017, '56120', 'Santa Cruz de Arriba', 'Texcoco', 'México'),
(2018, '56120', 'Valle de Santa Cruz', 'Texcoco', 'México'),
(2019, '56130', 'INFONAVIT', 'Texcoco', 'México'),
(2020, '56130', 'La Conchita', 'Texcoco', 'México'),
(2021, '56130', 'San Sebastián', 'Texcoco', 'México'),
(2022, '56130', 'La Paz', 'Texcoco', 'México'),
(2023, '56130', 'ISSEMYM', 'Texcoco', 'México'),
(2024, '56130', 'La Trinidad', 'Texcoco', 'México'),
(2025, '56130', 'Conjunto la Trinidad', 'Texcoco', 'México'),
(2026, '56130', 'Los Jilgueros', 'Texcoco', 'México'),
(2027, '56130', 'Condominios Maye', 'Texcoco', 'México'),
(2028, '56140', 'Ahuehuetes', 'Texcoco', 'México'),
(2029, '56140', 'San Lorenzo', 'Texcoco', 'México'),
(2030, '56140', 'San Martín', 'Texcoco', 'México'),
(2031, '56140', 'El Carmen', 'Texcoco', 'México'),
(2032, '56150', 'Las Vegas', 'Texcoco', 'México'),
(2033, '56150', 'Salitrería', 'Texcoco', 'México'),
(2034, '56150', 'Santa Úrsula', 'Texcoco', 'México'),
(2035, '56150', 'Embotelladores', 'Texcoco', 'México'),
(2036, '56150', 'San Antonio', 'Texcoco', 'México'),
(2037, '56160', 'Niños Héroes', 'Texcoco', 'México'),
(2038, '56160', 'San Pedro', 'Texcoco', 'México'),
(2039, '56160', 'Los Sauces', 'Texcoco', 'México'),
(2040, '56160', 'Tex Plus', 'Texcoco', 'México'),
(2041, '56170', 'San Mateo', 'Texcoco', 'México'),
(2042, '56170', 'Las Américas', 'Texcoco', 'México'),
(2043, '56170', 'Joyas de Santa Ana', 'Texcoco', 'México'),
(2044, '56170', 'El Xolache I', 'Texcoco', 'México'),
(2045, '56170', 'El Xolache II', 'Texcoco', 'México'),
(2046, '56200', 'Vicente Riva Palacio', 'Texcoco', 'México'),
(2047, '56203', 'La Magdalena Panoaya', 'Texcoco', 'México'),
(2048, '56204', 'Emiliano Zapata', 'Texcoco', 'México'),
(2049, '56205', 'San Felipe', 'Texcoco', 'México'),
(2050, '56205', 'Santa Cruz de Abajo', 'Texcoco', 'México'),
(2051, '56207', 'Lázaro Cárdenas', 'Texcoco', 'México'),
(2052, '56208', 'San Miguel Tocuila', 'Texcoco', 'México'),
(2053, '56210', 'San Simón', 'Texcoco', 'México'),
(2054, '56213', 'San José Texopa', 'Texcoco', 'México'),
(2055, '56214', 'Los Reyes San Salvador', 'Texcoco', 'México'),
(2056, '56215', 'Pentecostés', 'Texcoco', 'México'),
(2057, '56216', 'La Resurrección', 'Texcoco', 'México'),
(2058, '56217', 'Santiaguito', 'Texcoco', 'México'),
(2059, '56217', 'Santa María Tulantongo', 'Texcoco', 'México'),
(2060, '56217', 'Xala', 'Texcoco', 'México'),
(2061, '56220', 'San Luis Huexotla', 'Texcoco', 'México'),
(2062, '56223', 'Bellavista', 'Texcoco', 'México'),
(2063, '56224', 'Buenavista', 'Texcoco', 'México'),
(2064, '56225', 'Lomas de Cristo', 'Texcoco', 'México'),
(2065, '56225', 'Villas de Tolimpa', 'Texcoco', 'México'),
(2066, '56225', 'Leyes de Reforma', 'Texcoco', 'México'),
(2067, '56225', 'Fray Servando Teresa de Mier', 'Texcoco', 'México'),
(2068, '56225', 'Ampliación Leyes de Reforma', 'Texcoco', 'México'),
(2069, '56226', 'San Mateo Huexotla', 'Texcoco', 'México'),
(2070, '56226', 'Sector Popular', 'Texcoco', 'México'),
(2071, '56226', 'Las Bugambilias', 'Texcoco', 'México'),
(2072, '56226', 'La Cabaña', 'Texcoco', 'México'),
(2073, '56227', 'El Capulín Sur', 'Texcoco', 'México'),
(2074, '56227', 'Cooperativo', 'Texcoco', 'México'),
(2075, '56227', 'Emiliano Zapata-ISSSTE', 'Texcoco', 'México'),
(2076, '56227', 'Universidad Autónoma de Chapingo', 'Texcoco', 'México'),
(2077, '56227', 'Profesores', 'Texcoco', 'México'),
(2078, '56227', 'San Nicolás Huexotla', 'Texcoco', 'México'),
(2079, '56227', 'Tulipanes', 'Texcoco', 'México'),
(2080, '56230', 'San Diego', 'Texcoco', 'México'),
(2081, '56233', 'SUTEYN', 'Texcoco', 'México'),
(2082, '56235', 'El Molino de Flores', 'Texcoco', 'México'),
(2083, '56236', 'Xocotlán', 'Texcoco', 'México'),
(2084, '56237', 'El Batán', 'Texcoco', 'México'),
(2085, '56240', 'La Purificación Tepetitla', 'Texcoco', 'México'),
(2086, '56243', 'Ejido San Juan Tezontla', 'Texcoco', 'México'),
(2087, '56243', 'San Joaquín Coapango', 'Texcoco', 'México'),
(2088, '56243', 'San Juan Tezontla', 'Texcoco', 'México'),
(2089, '56243', 'Santa Inés', 'Texcoco', 'México'),
(2090, '56243', 'Santa Cruz Mexicapa', 'Texcoco', 'México'),
(2091, '56243', 'San Bartolo', 'Texcoco', 'México'),
(2092, '56243', 'Jardines de Santa Inés', 'Texcoco', 'México'),
(2093, '56244', 'San Agustín', 'Texcoco', 'México'),
(2094, '56244', 'San Jerónimo Amanalco', 'Texcoco', 'México'),
(2095, '56244', 'Santa María Tecuanulco', 'Texcoco', 'México'),
(2096, '56245', 'San Pablo Ixayoc', 'Texcoco', 'México'),
(2097, '56245', 'Santa Catarina del Monte', 'Texcoco', 'México'),
(2098, '56245', 'Guadalupe Amanalco', 'Texcoco', 'México'),
(2099, '56246', 'Santa María Nativitas', 'Texcoco', 'México'),
(2100, '56246', 'San Dieguito Xochimanca', 'Texcoco', 'México'),
(2101, '56246', 'Tequexquináhuac', 'Texcoco', 'México'),
(2102, '56247', 'San Nicolás Tlaminca', 'Texcoco', 'México'),
(2103, '56247', 'San Miguel Tlaixpan', 'Texcoco', 'México'),
(2104, '56250', 'San Miguel Coatlinchán', 'Texcoco', 'México'),
(2105, '56250', 'Guadalupe', 'Texcoco', 'México'),
(2106, '56253', 'Valle de Tláloc', 'Texcoco', 'México'),
(2107, '56253', 'San Juan', 'Texcoco', 'México'),
(2108, '56253', 'Praderas de Tecuac', 'Texcoco', 'México'),
(2109, '56254', 'Tepetitlán', 'Texcoco', 'México'),
(2110, '56254', 'San Juan Potreros', 'Texcoco', 'México'),
(2111, '56254', 'Paraíso 300', 'Texcoco', 'México'),
(2112, '56255', 'Quintas del Valle', 'Texcoco', 'México'),
(2113, '56255', 'Santiago Cuautlalpan', 'Texcoco', 'México'),
(2114, '56255', 'El Trabajo', 'Texcoco', 'México'),
(2115, '56255', 'El Arenal', 'Texcoco', 'México'),
(2116, '56255', 'San José (El Paraíso)', 'Texcoco', 'México'),
(2117, '56255', 'Villas de Santiago', 'Texcoco', 'México'),
(2118, '56255', 'San Pedro Cuautlanpan', 'Texcoco', 'México'),
(2119, '56256', 'Santa Lucía', 'Texcoco', 'México'),
(2120, '56256', 'San Felipe', 'Texcoco', 'México'),
(2121, '56257', 'Lomas de La Cruz', 'Texcoco', 'México'),
(2122, '56257', 'Lomas de San Esteban', 'Texcoco', 'México'),
(2123, '56257', 'Los Pinos', 'Texcoco', 'México'),
(2124, '56257', 'Las Tijeras', 'Texcoco', 'México'),
(2125, '56260', 'San Andrés (La Alcanforera)', 'Texcoco', 'México'),
(2126, '56260', 'San Bernardino', 'Texcoco', 'México'),
(2127, '56263', 'Santa Irene', 'Texcoco', 'México'),
(2128, '56263', 'La Concepción', 'Texcoco', 'México'),
(2129, '56263', 'Nezahualcóyotl (Boyeros)', 'Texcoco', 'México'),
(2130, '56263', 'San Olegario', 'Texcoco', 'México'),
(2131, '56264', 'Ejidos de Beltrán Cuautlalpan', 'Texcoco', 'México'),
(2132, '56264', 'Montecillo', 'Texcoco', 'México'),
(2133, '56264', 'Wenceslao Victoria', 'Texcoco', 'México'),
(2134, '56264', 'Colegio de Postgraduados', 'Texcoco', 'México'),
(2135, '56265', 'El Tejocote', 'Texcoco', 'México'),
(2136, '56265', 'Lázaro Cárdenas', 'Texcoco', 'México'),
(2137, '56266', 'Santa Martha', 'Texcoco', 'México'),
(2138, '56267', 'Guadalupe Victoria', 'Texcoco', 'México'),
(2139, '56268', 'Bordo Poniente', 'Texcoco', 'México'),
(2140, '56270', 'San Miguel', 'Chiconcuac', 'México'),
(2141, '56270', 'San Diego', 'Chiconcuac', 'México'),
(2142, '56270', 'Emiliano Zapata', 'Chiconcuac', 'México'),
(2143, '56270', 'San Pedro', 'Chiconcuac', 'México'),
(2144, '56270', 'Santa María', 'Chiconcuac', 'México'),
(2145, '56272', 'San Pablito Calmimilolco', 'Chiconcuac', 'México'),
(2146, '56273', 'Las Joyas', 'Chiconcuac', 'México'),
(2147, '56273', 'El Araujo', 'Chiconcuac', 'México'),
(2148, '56274', 'El Mamut', 'Chiconcuac', 'México'),
(2149, '56280', 'San Cristóbal', 'Chiconcuac', 'México'),
(2150, '56300', 'Ejidos de Cambray', 'Atenco', 'México'),
(2151, '56300', 'San Francisco Acuexcomac', 'Atenco', 'México'),
(2152, '56300', 'San Salvador Atenco', 'Atenco', 'México'),
(2153, '56300', 'Santa Gertrudis', 'Atenco', 'México'),
(2154, '56303', 'La Noria', 'Atenco', 'México'),
(2155, '56303', 'San Lazarito', 'Atenco', 'México'),
(2156, '56303', 'Ejidal San Salvador', 'Atenco', 'México'),
(2157, '56303', 'Hacienda la Grande Fracción Uno', 'Atenco', 'México'),
(2158, '56304', 'Zapotlán', 'Atenco', 'México'),
(2159, '56304', 'La Pastoría', 'Atenco', 'México'),
(2160, '56305', 'Francisco I Madero', 'Atenco', 'México'),
(2161, '56305', 'Ejido San Salvador Acuexcomac (Ejido la PurIsima)', 'Atenco', 'México'),
(2162, '56305', 'El Amanal', 'Atenco', 'México'),
(2163, '56305', 'Ejido la Magdalena Panoaya', 'Atenco', 'México'),
(2164, '56306', 'Ejido de San Cristóbal Nexquipayac', 'Atenco', 'México'),
(2165, '56306', 'Los Hornos (El Presidio)', 'Atenco', 'México'),
(2166, '56310', 'Nueva Santa Rosa', 'Atenco', 'México'),
(2167, '56310', 'Nueva Santa Rosa-Granjas el Arenal', 'Atenco', 'México'),
(2168, '56310', 'El Salado', 'Atenco', 'México'),
(2169, '56314', 'Santa Isabel Ixtapan', 'Atenco', 'México'),
(2170, '56314', 'Nezahualcoyotl - Ixtapan', 'Atenco', 'México'),
(2171, '56315', 'San Cristóbal Nexquipayac', 'Atenco', 'México'),
(2172, '56315', 'Granjas la Purísima', 'Atenco', 'México'),
(2173, '56315', 'Las Salinas', 'Atenco', 'México'),
(2174, '56315', 'Benito Quezada', 'Atenco', 'México'),
(2175, '56315', 'Chilileco', 'Atenco', 'México'),
(2176, '56315', 'La Purisima-La Purisima Norte', 'Atenco', 'México'),
(2177, '56330', 'Santa María Chimalhuacán', 'Chimalhuacán', 'México'),
(2178, '56334', 'El Molino', 'Chimalhuacán', 'México'),
(2179, '56334', 'San Pablo', 'Chimalhuacán', 'México'),
(2180, '56334', 'San Pedro', 'Chimalhuacán', 'México'),
(2181, '56334', 'Artesanos', 'Chimalhuacán', 'México'),
(2182, '56334', 'Canasteros', 'Chimalhuacán', 'México'),
(2183, '56334', 'Herreros', 'Chimalhuacán', 'México'),
(2184, '56334', 'Mineros', 'Chimalhuacán', 'México'),
(2185, '56334', 'Carpinteros', 'Chimalhuacán', 'México'),
(2186, '56334', 'Fundidores', 'Chimalhuacán', 'México'),
(2187, '56334', 'Pescadores', 'Chimalhuacán', 'México'),
(2188, '56334', 'Luis Córdoba Reyes', 'Chimalhuacán', 'México'),
(2189, '56334', 'San Pablo Parte Baja', 'Chimalhuacán', 'México'),
(2190, '56334', 'San Pedro Parte Baja', 'Chimalhuacán', 'México'),
(2191, '56334', 'Tepalcate', 'Chimalhuacán', 'México'),
(2192, '56334', 'Melchor Ocampo', 'Chimalhuacán', 'México'),
(2193, '56334', 'Marco Antonio Sosa', 'Chimalhuacán', 'México'),
(2194, '56335', 'José María Luis Mora', 'Chimalhuacán', 'México'),
(2195, '56335', 'Guadalupe', 'Chimalhuacán', 'México'),
(2196, '56335', 'San Miguel', 'Chimalhuacán', 'México'),
(2197, '56335', 'Santa María Nativitas', 'Chimalhuacán', 'México'),
(2198, '56335', 'Rancho de las Nieves', 'Chimalhuacán', 'México'),
(2199, '56335', 'Acuitlapilco Primera Sección', 'Chimalhuacán', 'México'),
(2200, '56335', 'Ciudad Alegre', 'Chimalhuacán', 'México'),
(2201, '56335', 'Acuitlapilco Segunda Sección', 'Chimalhuacán', 'México'),
(2202, '56335', 'Acuitlapilco Tercera Sección', 'Chimalhuacán', 'México'),
(2203, '56335', 'Jardines de Acuitlapilco', 'Chimalhuacán', 'México'),
(2204, '56335', 'Luis Donaldo Colosio', 'Chimalhuacán', 'México'),
(2205, '56335', 'Primavera', 'Chimalhuacán', 'México'),
(2206, '56335', 'Arboledas', 'Chimalhuacán', 'México'),
(2207, '56335', 'Corte Portezuelos', 'Chimalhuacán', 'México'),
(2208, '56335', 'Nueva Tepalcates', 'Chimalhuacán', 'México'),
(2209, '56335', 'Lomas de Santa María', 'Chimalhuacán', 'México'),
(2210, '56335', 'El Llano de Santa María', 'Chimalhuacán', 'México'),
(2211, '56335', 'Apapasco', 'Chimalhuacán', 'México'),
(2212, '56335', 'Unión Antorchista', 'Chimalhuacán', 'México'),
(2213, '56335', 'Cuatro de Febrero', 'Chimalhuacán', 'México'),
(2214, '56335', 'Constructores', 'Chimalhuacán', 'México'),
(2215, '56337', 'Zapotla', 'Chimalhuacán', 'México'),
(2216, '56337', 'San Isidro', 'Chimalhuacán', 'México'),
(2217, '56337', 'Lomas de Totolco Tlatelco', 'Chimalhuacán', 'México'),
(2218, '56337', 'Copalera', 'Chimalhuacán', 'México'),
(2219, '56337', 'San Andrés', 'Chimalhuacán', 'México'),
(2220, '56337', 'San Juan Zapotla', 'Chimalhuacán', 'México'),
(2221, '56337', 'El Capulín', 'Chimalhuacán', 'México'),
(2222, '56337', 'Tepenepantla', 'Chimalhuacán', 'México'),
(2223, '56337', 'Tlaixco', 'Chimalhuacán', 'México'),
(2224, '56337', 'Olmedo', 'Chimalhuacán', 'México'),
(2225, '56337', 'Cornejal', 'Chimalhuacán', 'México'),
(2226, '56337', 'Lomas de Chimalhuacán', 'Chimalhuacán', 'México'),
(2227, '56337', 'Ladera', 'Chimalhuacán', 'México'),
(2228, '56337', 'Santo Domingo', 'Chimalhuacán', 'México'),
(2229, '56337', 'Apelsa', 'Chimalhuacán', 'México'),
(2230, '56337', 'El Pocito', 'Chimalhuacán', 'México'),
(2231, '56337', 'Arenitas', 'Chimalhuacán', 'México'),
(2232, '56337', 'La Mina', 'Chimalhuacán', 'México'),
(2233, '56338', 'Corte el Pocito', 'Chimalhuacán', 'México'),
(2234, '56338', 'Corte Escalerillas', 'Chimalhuacán', 'México'),
(2235, '56338', 'Corte la Joya', 'Chimalhuacán', 'México'),
(2236, '56338', 'Corte la Palma Segunda Sección', 'Chimalhuacán', 'México'),
(2237, '56338', 'Corte Santa Cruz', 'Chimalhuacán', 'México'),
(2238, '56338', 'Corte Xolhuango', 'Chimalhuacán', 'México'),
(2239, '56338', 'Corte Lomas de Buenavista', 'Chimalhuacán', 'México'),
(2240, '56338', 'Corte la Palma Primera Sección', 'Chimalhuacán', 'México'),
(2241, '56338', 'Lomas de Chocolín', 'Chimalhuacán', 'México'),
(2242, '56338', 'Corte San Isidro', 'Chimalhuacán', 'México'),
(2243, '56338', 'Ampliación Lomas de San Pablo', 'Chimalhuacán', 'México'),
(2244, '56338', 'Lomas de San Pablo', 'Chimalhuacán', 'México'),
(2245, '56338', 'Corte San Pablo', 'Chimalhuacán', 'México'),
(2246, '56338', 'Corte Huatongo', 'Chimalhuacán', 'México'),
(2247, '56340', 'Cerro de Las Palomas', 'Chimalhuacán', 'México'),
(2248, '56340', 'San Lorenzo', 'Chimalhuacán', 'México'),
(2249, '56340', 'Ampliación San Lorenzo (Parte Alta)', 'Chimalhuacán', 'México'),
(2250, '56340', 'San Lorenzo Chimalco', 'Chimalhuacán', 'México'),
(2251, '56340', 'San Lorenzo Parte Alta', 'Chimalhuacán', 'México'),
(2252, '56343', 'SUTAUR Oriente', 'Chimalhuacán', 'México'),
(2253, '56343', 'San José Buenavista', 'Chimalhuacán', 'México'),
(2254, '56343', 'Villa San Agustín Atlapulco', 'Chimalhuacán', 'México'),
(2255, '56343', 'Jardines de San Agustín (La Isla, Sancho Ganadero)', 'Chimalhuacán', 'México'),
(2256, '56343', 'Miramar', 'Chimalhuacán', 'México'),
(2257, '56343', 'Tequesquinahuac', 'Chimalhuacán', 'México'),
(2258, '56343', 'Tierra Santa (Maravillas)', 'Chimalhuacán', 'México'),
(2259, '56343', 'Balcones de San Agustín', 'Chimalhuacán', 'México'),
(2260, '56343', 'Ampliación San Agustín', 'Chimalhuacán', 'México'),
(2261, '56343', 'Ampliación San Agustín Zona Poniente', 'Chimalhuacán', 'México'),
(2262, '56343', 'Zona Comunal San Agustín', 'Chimalhuacán', 'México'),
(2263, '56343', 'Diecisiete de Marzo', 'Chimalhuacán', 'México'),
(2264, '56343', 'Israel', 'Chimalhuacán', 'México'),
(2265, '56343', 'Los Olivos', 'Chimalhuacán', 'México'),
(2266, '56343', 'Buenos Aires', 'Chimalhuacán', 'México'),
(2267, '56343', 'Adolfo López Mateos', 'Chimalhuacán', 'México'),
(2268, '56343', 'Ampliación San Agustín Zona Oriente', 'Chimalhuacán', 'México'),
(2269, '56344', 'Ejido San Agustín Atlapulco', 'Chimalhuacán', 'México'),
(2270, '56344', 'Villa los Colorines', 'Chimalhuacán', 'México'),
(2271, '56346', 'Filiberto Gómez', 'Chimalhuacán', 'México'),
(2272, '56346', 'Progreso de Oriente', 'Chimalhuacán', 'México'),
(2273, '56346', 'Xaltipac', 'Chimalhuacán', 'México'),
(2274, '56350', 'Xochiaca', 'Chimalhuacán', 'México'),
(2275, '56350', 'Xochitenco 3a Sección', 'Chimalhuacán', 'México'),
(2276, '56350', 'Diecisiete de Septiembre', 'Chimalhuacán', 'México'),
(2277, '56350', 'Xochiaca 2a Sección', 'Chimalhuacán', 'México'),
(2278, '56350', 'Ampliación Xochiaca parte Alta', 'Chimalhuacán', 'México'),
(2279, '56350', 'Santa Cecilia Xochiaca', 'Chimalhuacán', 'México'),
(2280, '56350', 'La Joyita', 'Chimalhuacán', 'México'),
(2281, '56350', 'Xochitenco Parte Alta', 'Chimalhuacán', 'México'),
(2282, '56353', 'Saraperos', 'Chimalhuacán', 'México'),
(2283, '56353', 'Tlatelco', 'Chimalhuacán', 'México'),
(2284, '56353', 'Orfebres', 'Chimalhuacán', 'México'),
(2285, '56353', 'Arturo Montiel', 'Chimalhuacán', 'México'),
(2286, '56356', 'Tejedores', 'Chimalhuacán', 'México'),
(2287, '56356', 'Jugueteros', 'Chimalhuacán', 'México'),
(2288, '56356', 'Canteros', 'Chimalhuacán', 'México'),
(2289, '56356', 'Talabarteros', 'Chimalhuacán', 'México'),
(2290, '56356', 'Plateros', 'Chimalhuacán', 'México'),
(2291, '56356', 'Vidrieros', 'Chimalhuacán', 'México'),
(2292, '56356', 'Santa Cruz', 'Chimalhuacán', 'México'),
(2293, '56360', 'Xochitenco 1a Sección', 'Chimalhuacán', 'México'),
(2294, '56360', 'Xochitenco 2a Sección', 'Chimalhuacán', 'México'),
(2295, '56360', 'San Juan Xochitenco', 'Chimalhuacán', 'México'),
(2296, '56363', 'Alfareros', 'Chimalhuacán', 'México'),
(2297, '56363', 'Ebanistas', 'Chimalhuacán', 'México'),
(2298, '56363', 'La Rosita', 'Chimalhuacán', 'México'),
(2299, '56363', 'Transportistas', 'Chimalhuacán', 'México'),
(2300, '56363', 'Nueva Margarita', 'Chimalhuacán', 'México'),
(2301, '56366', 'Curtidores', 'Chimalhuacán', 'México'),
(2302, '56366', 'Hojalateros', 'Chimalhuacán', 'México'),
(2303, '56366', 'Talladores', 'Chimalhuacán', 'México'),
(2304, '56366', 'Cesteros', 'Chimalhuacán', 'México'),
(2305, '56366', 'Labradores', 'Chimalhuacán', 'México'),
(2306, '56366', 'Tlatel Xochitenco', 'Chimalhuacán', 'México'),
(2307, '56370', 'San Vicente Chicoloapan de Juárez Centro', 'Chicoloapan', 'México'),
(2308, '56373', 'El Encino', 'Chicoloapan', 'México'),
(2309, '56373', 'El Arenal', 'Chicoloapan', 'México'),
(2310, '56373', 'San Antonio', 'Chicoloapan', 'México'),
(2311, '56373', 'San Juan', 'Chicoloapan', 'México'),
(2312, '56373', 'Los Ángeles', 'Chicoloapan', 'México'),
(2313, '56373', 'Tejocote', 'Chicoloapan', 'México'),
(2314, '56373', 'Santa Cecilia', 'Chicoloapan', 'México'),
(2315, '56373', 'Bonito San Vicente', 'Chicoloapan', 'México'),
(2316, '56373', 'Bonito El Manzano', 'Chicoloapan', 'México'),
(2317, '56373', 'Hacienda Vista Real', 'Chicoloapan', 'México'),
(2318, '56375', 'Presidentes', 'Chicoloapan', 'México'),
(2319, '56375', 'El Vergel', 'Chicoloapan', 'México'),
(2320, '56375', 'Hacienda Piedras Negras', 'Chicoloapan', 'México'),
(2321, '56376', 'Santa Rosa', 'Chicoloapan', 'México'),
(2322, '56376', 'Auris II', 'Chicoloapan', 'México'),
(2323, '56376', 'Auris III', 'Chicoloapan', 'México'),
(2324, '56376', 'Ampliación Santa Rosa', 'Chicoloapan', 'México'),
(2325, '56377', 'San José', 'Chicoloapan', 'México'),
(2326, '56377', 'Venustiano Carranza', 'Chicoloapan', 'México'),
(2327, '56377', '2 de Marzo', 'Chicoloapan', 'México'),
(2328, '56377', 'Ampliación Presidentes', 'Chicoloapan', 'México'),
(2329, '56377', 'Auris I', 'Chicoloapan', 'México'),
(2330, '56377', 'Tlatel', 'Chicoloapan', 'México'),
(2331, '56377', 'México 86', 'Chicoloapan', 'México'),
(2332, '56377', 'San Miguel', 'Chicoloapan', 'México'),
(2333, '56377', 'Arboledas', 'Chicoloapan', 'México'),
(2334, '56377', 'Navidad', 'Chicoloapan', 'México'),
(2335, '56380', 'Real de San Vicente I', 'Chicoloapan', 'México'),
(2336, '56380', 'Lomas Chicoloapan', 'Chicoloapan', 'México'),
(2337, '56383', 'Lomas de Chicoloapan III', 'Chicoloapan', 'México'),
(2338, '56383', 'Real de San Vicente II', 'Chicoloapan', 'México'),
(2339, '56383', 'Ciudad Galaxia los Reyes', 'Chicoloapan', 'México'),
(2340, '56383', 'Hacienda los Reyes', 'Chicoloapan', 'México'),
(2341, '56384', 'Loma San Pedro', 'Chicoloapan', 'México'),
(2342, '56384', 'La Venta Cuautlalpan', 'Chicoloapan', 'México'),
(2343, '56386', 'Rancho San Miguel', 'Chicoloapan', 'México'),
(2344, '56386', 'Hacienda de Costitlán', 'Chicoloapan', 'México'),
(2345, '56386', 'Real de Costitlán I', 'Chicoloapan', 'México'),
(2346, '56386', 'Real de Costitlán II', 'Chicoloapan', 'México'),
(2347, '56386', 'Geovillas de Costitlán', 'Chicoloapan', 'México'),
(2348, '56386', 'La Copalera', 'Chicoloapan', 'México'),
(2349, '56386', 'San Patricio', 'Chicoloapan', 'México'),
(2350, '56387', 'La Noria', 'Chicoloapan', 'México'),
(2351, '56387', 'Loma de Guadalupe', 'Chicoloapan', 'México'),
(2352, '56390', 'Emiliano Zapata', 'Chicoloapan', 'México'),
(2353, '56390', 'Ejército del Trabajo', 'Chicoloapan', 'México'),
(2354, '56390', 'Francisco Villa', 'Chicoloapan', 'México'),
(2355, '56390', 'Revolución', 'Chicoloapan', 'México'),
(2356, '56395', 'Mirador Tezaluca', 'Chicoloapan', 'México'),
(2357, '56396', 'Pozo Número Uno (La Trinidad)', 'Chicoloapan', 'México'),
(2358, '56396', 'Pozo Número Cuatro (San Juan)', 'Chicoloapan', 'México'),
(2359, '56396', 'Centro Turístico Ejidal', 'Chicoloapan', 'México'),
(2360, '56396', 'Pozo Número Dos ,La Campana', 'Chicoloapan', 'México'),
(2361, '56396', 'Pozo Número Seis ,La Longaniza', 'Chicoloapan', 'México'),
(2362, '56400', 'Los Reyes Acaquilpan Centro', 'La Paz', 'México'),
(2363, '56400', 'Jardín de Los Reyes', 'La Paz', 'México'),
(2364, '56400', 'Ampliación Los Reyes', 'La Paz', 'México'),
(2365, '56410', 'Rincón de Los Reyes', 'La Paz', 'México'),
(2366, '56410', 'Ancón de los Reyes', 'La Paz', 'México'),
(2367, '56420', 'Floresta', 'La Paz', 'México'),
(2368, '56420', 'Valle de los Pinos', 'La Paz', 'México'),
(2369, '56428', 'Tepozanes', 'La Paz', 'México'),
(2370, '56429', 'Unidad Floresta', 'La Paz', 'México'),
(2371, '56430', 'Valle de los Reyes', 'La Paz', 'México'),
(2372, '56440', 'Coaxusco', 'La Paz', 'México'),
(2373, '56440', 'Magdalena de Los Reyes', 'La Paz', 'México'),
(2374, '56490', 'Las Torres III', 'La Paz', 'México'),
(2375, '56490', 'Emiliano Zapata', 'La Paz', 'México'),
(2376, '56495', 'Loma Encantada', 'La Paz', 'México'),
(2377, '56495', 'Villas del Sol', 'La Paz', 'México'),
(2378, '56500', 'San Salvador Tecamachalco', 'La Paz', 'México'),
(2379, '56500', 'Ampliación Tecamachalco', 'La Paz', 'México'),
(2380, '56505', '2 de Marzo', 'La Paz', 'México'),
(2381, '56507', 'El Pino', 'La Paz', 'México'),
(2382, '56508', 'La Joyita', 'La Paz', 'México'),
(2383, '56508', 'Bosques de la Magdalena', 'La Paz', 'México'),
(2384, '56509', 'Conjunto la Paz', 'La Paz', 'México'),
(2385, '56509', 'Jalpa', 'La Paz', 'México'),
(2386, '56509', 'Las Cruces', 'La Paz', 'México'),
(2387, '56509', 'Villas de la Paz', 'La Paz', 'México'),
(2388, '56509', 'Ferrocarril', 'La Paz', 'México'),
(2389, '56509', 'Parcelas', 'La Paz', 'México'),
(2390, '56510', 'Unidad Acaquilpan', 'La Paz', 'México');
INSERT INTO `t_cat_data_dir` (`id_cat_data_dir`, `codigo_postal`, `colonia`, `alcaldia`, `entidad_federativa`) VALUES
(2391, '56510', 'Profesor Carlos Hank González', 'La Paz', 'México'),
(2392, '56512', 'Los Pirules (El Potrero)', 'La Paz', 'México'),
(2393, '56512', 'San José las Palmas', 'La Paz', 'México'),
(2394, '56512', 'Lomas de San Sebastián', 'La Paz', 'México'),
(2395, '56512', 'Tepapatlalco', 'La Paz', 'México'),
(2396, '56513', 'Ampliación Dr. Jorge Jiménez Cantú', 'La Paz', 'México'),
(2397, '56514', 'Paso de Minas', 'La Paz', 'México'),
(2398, '56514', 'Techachaltitla', 'La Paz', 'México'),
(2399, '56514', 'Bosques de la Magdalena (U.P.R.E.Z.)', 'La Paz', 'México'),
(2400, '56514', 'Las Rosas', 'La Paz', 'México'),
(2401, '56514', 'Lomas de Altavista', 'La Paz', 'México'),
(2402, '56514', 'Tecontlapexco', 'La Paz', 'México'),
(2403, '56514', 'Ampliación Magdalena', 'La Paz', 'México'),
(2404, '56515', 'Dr. Jorge Jiménez Cantú', 'La Paz', 'México'),
(2405, '56516', 'Ríos de San Isidro', 'La Paz', 'México'),
(2406, '56516', 'Villas de San Isidro', 'La Paz', 'México'),
(2407, '56516', 'Ex Hacienda San Isidro', 'La Paz', 'México'),
(2408, '56516', 'San Isidro', 'La Paz', 'México'),
(2409, '56516', 'Mariel', 'La Paz', 'México'),
(2410, '56516', 'San Isidro (Casas Verdes)', 'La Paz', 'México'),
(2411, '56516', 'Ampliación Mariel', 'La Paz', 'México'),
(2412, '56516', '20 de Mayo', 'La Paz', 'México'),
(2413, '56516', 'Lomas de San Isidro El Pino', 'La Paz', 'México'),
(2414, '56516', 'Lomas de San Isidro 1ra Sección', 'La Paz', 'México'),
(2415, '56516', 'Lomas de San Isidro 2da Sección', 'La Paz', 'México'),
(2416, '56516', 'Primavera', 'La Paz', 'México'),
(2417, '56516', 'Libertad', 'La Paz', 'México'),
(2418, '56516', 'Tecomatlán', 'La Paz', 'México'),
(2419, '56516', 'Lomas de San Isidro 3ra Sección', 'La Paz', 'México'),
(2420, '56520', 'Salitrería', 'La Paz', 'México'),
(2421, '56520', 'Presidentes', 'La Paz', 'México'),
(2422, '56520', 'San Sebastián Chimalpa', 'La Paz', 'México'),
(2423, '56520', 'Ampliación San Sebastián', 'La Paz', 'México'),
(2424, '56524', 'C.E.A.S.', 'La Paz', 'México'),
(2425, '56524', 'El Salado', 'La Paz', 'México'),
(2426, '56524', 'Ricardo Flores Magón', 'La Paz', 'México'),
(2427, '56524', 'Cuchilla de la Ancón', 'La Paz', 'México'),
(2428, '56525', 'Magisterial', 'La Paz', 'México'),
(2429, '56525', 'La Magdalena Atlicpac', 'La Paz', 'México'),
(2430, '56526', 'Alamedas', 'La Paz', 'México'),
(2431, '56527', 'Anáhuac', 'La Paz', 'México'),
(2432, '56527', 'Arenal', 'La Paz', 'México'),
(2433, '56527', 'Ampliación Arenal', 'La Paz', 'México'),
(2434, '56528', 'Ahuaxtla', 'La Paz', 'México'),
(2435, '56528', 'Unidad Anáhuac Tepetates', 'La Paz', 'México'),
(2436, '56528', 'Adolfo López Mateos', 'La Paz', 'México'),
(2437, '56529', 'La Cerca', 'La Paz', 'México'),
(2438, '56529', 'Tlazala', 'La Paz', 'México'),
(2439, '56530', 'Capilla I', 'Ixtapaluca', 'México'),
(2440, '56530', 'Capilla III', 'Ixtapaluca', 'México'),
(2441, '56530', 'Ixtapaluca Centro', 'Ixtapaluca', 'México'),
(2442, '56530', 'Jacarandas I y II', 'Ixtapaluca', 'México'),
(2443, '56530', 'La Venta', 'Ixtapaluca', 'México'),
(2444, '56530', 'Zoquiapan', 'Ixtapaluca', 'México'),
(2445, '56530', 'La Era', 'Ixtapaluca', 'México'),
(2446, '56530', 'Geovillas San Jacinto', 'Ixtapaluca', 'México'),
(2447, '56530', 'Real del Campo', 'Ixtapaluca', 'México'),
(2448, '56535', 'El Jaral (El Capulín)', 'Ixtapaluca', 'México'),
(2449, '56535', 'Jardín Industrial Ixtapaluca', 'Ixtapaluca', 'México'),
(2450, '56535', 'Geovillas de Santa Bárbara', 'Ixtapaluca', 'México'),
(2451, '56535', 'El Capulín', 'Ixtapaluca', 'México'),
(2452, '56535', 'Hacienda las Palmas I y II', 'Ixtapaluca', 'México'),
(2453, '56535', 'Las Palmas Tercera Etapa', 'Ixtapaluca', 'México'),
(2454, '56536', 'San José de la Palma', 'Ixtapaluca', 'México'),
(2455, '56536', 'San Buenaventura', 'Ixtapaluca', 'México'),
(2456, '56537', 'Capilla II', 'Ixtapaluca', 'México'),
(2457, '56537', 'Capilla IV', 'Ixtapaluca', 'México'),
(2458, '56537', 'Acozac', 'Ixtapaluca', 'México'),
(2459, '56537', 'Tezontle-Zoquiapan', 'Ixtapaluca', 'México'),
(2460, '56538', 'Santa Bárbara', 'Ixtapaluca', 'México'),
(2461, '56539', 'La Magdalena', 'Ixtapaluca', 'México'),
(2462, '56539', 'La Huerta', 'Ixtapaluca', 'México'),
(2463, '56539', 'El Caracol', 'Ixtapaluca', 'México'),
(2464, '56540', 'Citlalmina', 'Ixtapaluca', 'México'),
(2465, '56540', 'Rancho el Carmen', 'Ixtapaluca', 'México'),
(2466, '56550', 'Emiliano Zapata', 'Ixtapaluca', 'México'),
(2467, '56550', 'Derramadero', 'Ixtapaluca', 'México'),
(2468, '56553', 'El Molino', 'Ixtapaluca', 'México'),
(2469, '56555', 'Residencial Ayotla', 'Ixtapaluca', 'México'),
(2470, '56556', 'José de la Mora', 'Ixtapaluca', 'México'),
(2471, '56556', 'Tlapacoya', 'Ixtapaluca', 'México'),
(2472, '56558', 'Ampliación Emiliano Zapata', 'Ixtapaluca', 'México'),
(2473, '56560', 'Ayotla', 'Ixtapaluca', 'México'),
(2474, '56560', 'El Calvario', 'Ixtapaluca', 'México'),
(2475, '56563', 'Loma Bonita', 'Ixtapaluca', 'México'),
(2476, '56564', 'El Mirador', 'Ixtapaluca', 'México'),
(2477, '56565', 'Linda Vista', 'Ixtapaluca', 'México'),
(2478, '56565', 'Santo Tomás', 'Ixtapaluca', 'México'),
(2479, '56565', 'Magisterial', 'Ixtapaluca', 'México'),
(2480, '56565', 'Lomas de Ayotla', 'Ixtapaluca', 'México'),
(2481, '56565', 'Ampliación Acozac', 'Ixtapaluca', 'México'),
(2482, '56565', 'Ampliación Santo Tomás', 'Ixtapaluca', 'México'),
(2483, '56566', 'Geovillas de Ayotla', 'Ixtapaluca', 'México'),
(2484, '56566', 'Izcalli', 'Ixtapaluca', 'México'),
(2485, '56566', 'Rancho Guadalupe', 'Ixtapaluca', 'México'),
(2486, '56566', 'Rigoberta Menchú', 'Ixtapaluca', 'México'),
(2487, '56566', 'Luis Donaldo Colosio', 'Ixtapaluca', 'México'),
(2488, '56566', 'La Retama', 'Ixtapaluca', 'México'),
(2489, '56566', 'Lavaderos', 'Ixtapaluca', 'México'),
(2490, '56566', 'Ilhuicamina', 'Ixtapaluca', 'México'),
(2491, '56566', 'Rancho San José', 'Ixtapaluca', 'México'),
(2492, '56566', 'Caserío', 'Ixtapaluca', 'México'),
(2493, '56566', 'Fermín Álvarez', 'Ixtapaluca', 'México'),
(2494, '56566', 'Vergel de Guadalupe', 'Ixtapaluca', 'México'),
(2495, '56566', 'Ampliación 6 de Junio', 'Ixtapaluca', 'México'),
(2496, '56566', '6 de Junio', 'Ixtapaluca', 'México'),
(2497, '56567', 'Melchor Ocampo I, II, III, IV y V', 'Ixtapaluca', 'México'),
(2498, '56567', 'Cerro del Tejolote', 'Ixtapaluca', 'México'),
(2499, '56567', 'Escalerillas', 'Ixtapaluca', 'México'),
(2500, '56567', 'Ampliación Escalerillas', 'Ixtapaluca', 'México'),
(2501, '56567', 'Morelos', 'Ixtapaluca', 'México'),
(2502, '56567', 'Wenceslao Victoria Soto', 'Ixtapaluca', 'México'),
(2503, '56567', 'Guadalupana', 'Ixtapaluca', 'México'),
(2504, '56567', 'Ricardo Calva Reyes', 'Ixtapaluca', 'México'),
(2505, '56567', 'Lomas de Ixtapaluca', 'Ixtapaluca', 'México'),
(2506, '56567', 'Buena Vista', 'Ixtapaluca', 'México'),
(2507, '56567', 'Contadero', 'Ixtapaluca', 'México'),
(2508, '56567', 'Ampliación Morelos', 'Ixtapaluca', 'México'),
(2509, '56567', 'Humberto Gutiérrez', 'Ixtapaluca', 'México'),
(2510, '56568', 'Unión Antorchista', 'Ixtapaluca', 'México'),
(2511, '56568', 'El Capulín', 'Ixtapaluca', 'México'),
(2512, '56568', 'Nueva Antorchista', 'Ixtapaluca', 'México'),
(2513, '56569', 'Rincón del Bosque', 'Ixtapaluca', 'México'),
(2514, '56569', 'San Miguel', 'Ixtapaluca', 'México'),
(2515, '56569', 'El Nopalito', 'Ixtapaluca', 'México'),
(2516, '56569', '1° de Mayo', 'Ixtapaluca', 'México'),
(2517, '56569', 'El Mirto', 'Ixtapaluca', 'México'),
(2518, '56570', 'Arbolada', 'Ixtapaluca', 'México'),
(2519, '56570', 'Geovillas Ixtapaluca 2000', 'Ixtapaluca', 'México'),
(2520, '56576', 'Estado de México', 'Ixtapaluca', 'México'),
(2521, '56576', 'San Juan Tlalpizahuac', 'Ixtapaluca', 'México'),
(2522, '56576', 'Tlalpizahuac', 'Ixtapaluca', 'México'),
(2523, '56576', 'San Antonio', 'Ixtapaluca', 'México'),
(2524, '56576', 'San Antonio', 'Ixtapaluca', 'México'),
(2525, '56576', 'Tlacaelel', 'Ixtapaluca', 'México'),
(2526, '56576', 'Aquiles Córdoba', 'Ixtapaluca', 'México'),
(2527, '56576', '18 de Agosto', 'Ixtapaluca', 'México'),
(2528, '56576', 'Residencial Park', 'Ixtapaluca', 'México'),
(2529, '56576', 'Luis Córdoba Reyes', 'Ixtapaluca', 'México'),
(2530, '56576', 'Rey Izcoatl', 'Ixtapaluca', 'México'),
(2531, '56577', 'Hornos Santa Bárbara', 'Ixtapaluca', 'México'),
(2532, '56577', 'Alfredo del Mazo', 'Ixtapaluca', 'México'),
(2533, '56577', 'Santa Cruz Tlalpizahuac', 'Ixtapaluca', 'México'),
(2534, '56577', 'Valle Verde', 'Ixtapaluca', 'México'),
(2535, '56577', 'Ampliación Santa Cruz Tlapacoya', 'Ixtapaluca', 'México'),
(2536, '56577', 'Santa Cruz Tlapacoya', 'Ixtapaluca', 'México'),
(2537, '56579', '20 de Noviembre', 'Ixtapaluca', 'México'),
(2538, '56580', 'Coatepec', 'Ixtapaluca', 'México'),
(2539, '56580', 'Rosa de Castilla', 'Ixtapaluca', 'México'),
(2540, '56580', 'San Juan', 'Ixtapaluca', 'México'),
(2541, '56580', 'Rancho Verde', 'Ixtapaluca', 'México'),
(2542, '56580', 'Independencia', 'Ixtapaluca', 'México'),
(2543, '56580', 'Lomas de Coatepec', 'Ixtapaluca', 'México'),
(2544, '56584', 'Pueblo Nuevo (San Isidro Labrador)', 'Ixtapaluca', 'México'),
(2545, '56584', 'Tetitla', 'Ixtapaluca', 'México'),
(2546, '56584', 'La Mesa', 'Ixtapaluca', 'México'),
(2547, '56584', 'La Pastoría', 'Ixtapaluca', 'México'),
(2548, '56585', 'Los Héroes', 'Ixtapaluca', 'México'),
(2549, '56585', 'Jesús María', 'Ixtapaluca', 'México'),
(2550, '56585', 'Plutarco Elias Calles', 'Ixtapaluca', 'México'),
(2551, '56585', 'La Esperanza', 'Ixtapaluca', 'México'),
(2552, '56585', 'El Rayo', 'Ixtapaluca', 'México'),
(2553, '56585', 'Ampliación Plutarco Elias Calles', 'Ixtapaluca', 'México'),
(2554, '56585', 'Rosa de San Francisco', 'Ixtapaluca', 'México'),
(2555, '56585', 'Elsa Córdova Morán', 'Ixtapaluca', 'México'),
(2556, '56585', 'Chililico', 'Ixtapaluca', 'México'),
(2557, '56586', 'Tlayehuale', 'Ixtapaluca', 'México'),
(2558, '56586', 'Geovillas Jesús María', 'Ixtapaluca', 'México'),
(2559, '56587', 'Santa Ana', 'Ixtapaluca', 'México'),
(2560, '56587', 'San Francisco Acuautla', 'Ixtapaluca', 'México'),
(2561, '56587', 'Mirador de San Francisco', 'Ixtapaluca', 'México'),
(2562, '56587', 'Ampliación San Francisco', 'Ixtapaluca', 'México'),
(2563, '56587', 'San Francisco (Las Joyas)', 'Ixtapaluca', 'México'),
(2564, '56587', 'Los Hornos', 'Ixtapaluca', 'México'),
(2565, '56587', 'Francisco Santillán (Atzizintla Tres)', 'Ixtapaluca', 'México'),
(2566, '56588', 'Tejalpa', 'Ixtapaluca', 'México'),
(2567, '56588', 'El Carmen', 'Ixtapaluca', 'México'),
(2568, '56588', 'Ejido la Virgen', 'Ixtapaluca', 'México'),
(2569, '56588', 'Juan Antonio Soberanes', 'Ixtapaluca', 'México'),
(2570, '56588', 'Ampliación Tejalpa', 'Ixtapaluca', 'México'),
(2571, '56588', 'Julio Chávez López (UPREZ)', 'Ixtapaluca', 'México'),
(2572, '56588', 'Xalpa (Camino de los Alcanfores)', 'Ixtapaluca', 'México'),
(2573, '56588', 'El Patronato del Maguey (Santa Rosa)', 'Ixtapaluca', 'México'),
(2574, '56588', 'El Pozo del Venado', 'Ixtapaluca', 'México'),
(2575, '56588', 'Linderos de Ixtapaluca (El Tablón)', 'Ixtapaluca', 'México'),
(2576, '56588', 'Puente del Tablón', 'Ixtapaluca', 'México'),
(2577, '56588', 'Puente el Mezquite', 'Ixtapaluca', 'México'),
(2578, '56589', 'Jorge Jiménez Cantú', 'Ixtapaluca', 'México'),
(2579, '56589', 'Cuatro Vientos', 'Ixtapaluca', 'México'),
(2580, '56589', 'La Cañada', 'Ixtapaluca', 'México'),
(2581, '56589', 'Hornos de Zoquiapan', 'Ixtapaluca', 'México'),
(2582, '56589', 'Margarita Moran', 'Ixtapaluca', 'México'),
(2583, '56589', 'San Jerónimo Cuatro Vientos', 'Ixtapaluca', 'México'),
(2584, '56589', 'Huertas de Canutillo', 'Ixtapaluca', 'México'),
(2585, '56589', 'Zoquiapan', 'Ixtapaluca', 'México'),
(2586, '56589', 'Camino a Mina Milagro (El Potrero)', 'Ixtapaluca', 'México'),
(2587, '56589', 'Camino Mina Rosita', 'Ixtapaluca', 'México'),
(2588, '56589', 'Teponaxtle', 'Ixtapaluca', 'México'),
(2589, '56589', 'Bezana Canutillo', 'Ixtapaluca', 'México'),
(2590, '56590', 'Río Frío de Juárez', 'Ixtapaluca', 'México'),
(2591, '56590', 'Llano Grande', 'Ixtapaluca', 'México'),
(2592, '56590', 'El Guarda', 'Ixtapaluca', 'México'),
(2593, '56599', 'Manuel Ávila Camacho', 'Ixtapaluca', 'México'),
(2594, '56599', 'El Campamento (Las Cocinas)', 'Ixtapaluca', 'México'),
(2595, '56599', 'El Corazón', 'Ixtapaluca', 'México'),
(2596, '56599', 'El Cuarenta', 'Ixtapaluca', 'México'),
(2597, '56599', 'El Treinta y Nueve (Dos Jagüeyes)', 'Ixtapaluca', 'México'),
(2598, '56599', 'El Treinta y Siete (Kilómetro 19)', 'Ixtapaluca', 'México'),
(2599, '56599', 'Los Cedros', 'Ixtapaluca', 'México'),
(2600, '56599', 'Loma Ancha', 'Ixtapaluca', 'México'),
(2601, '56599', 'San Isidro (La Lobera)', 'Ixtapaluca', 'México'),
(2602, '56600', 'Bosques de Chalco I', 'Chalco', 'México'),
(2603, '56600', 'Tlatel', 'Chalco', 'México'),
(2604, '56600', 'Campestre Santa Cruz', 'Chalco', 'México'),
(2605, '56600', 'Casco de San Juan', 'Chalco', 'México'),
(2606, '56600', 'Chalco de Díaz Covarrubias Centro', 'Chalco', 'México'),
(2607, '56600', 'La Bomba', 'Chalco', 'México'),
(2608, '56600', 'La Conchita', 'Chalco', 'México'),
(2609, '56600', 'San Antonio', 'Chalco', 'México'),
(2610, '56600', 'San Sebastián', 'Chalco', 'México'),
(2611, '56600', 'Los Cipreses', 'Chalco', 'México'),
(2612, '56600', 'Granjas Chalco', 'Chalco', 'México'),
(2613, '56600', 'Industrial Chalco', 'Chalco', 'México'),
(2614, '56600', 'Marco Antonio Sosa', 'Chalco', 'México'),
(2615, '56600', 'Los Volcanes', 'Chalco', 'México'),
(2616, '56600', 'Villas de Chalco', 'Chalco', 'México'),
(2617, '56600', 'Portal de Chalco', 'Chalco', 'México'),
(2618, '56600', 'San Francisco', 'Chalco', 'México'),
(2619, '56600', 'Paseos de Chalco', 'Chalco', 'México'),
(2620, '56600', 'Bosques de Chalco II', 'Chalco', 'México'),
(2621, '56600', 'Los Volcanes 2da. Sección', 'Chalco', 'México'),
(2622, '56600', 'Las Huertas', 'Chalco', 'México'),
(2623, '56600', 'Punto Chalco', 'Chalco', 'México'),
(2624, '56600', 'El Naranjo', 'Chalco', 'México'),
(2625, '56600', 'Gonzalo López Cid', 'Chalco', 'México'),
(2626, '56600', 'Margarita Córdoba Morán', 'Chalco', 'México'),
(2627, '56600', 'Rancho Amigo', 'Chalco', 'México'),
(2628, '56604', 'Ejidal', 'Chalco', 'México'),
(2629, '56604', 'Tres Marías', 'Chalco', 'México'),
(2630, '56604', 'Jacalones I', 'Chalco', 'México'),
(2631, '56604', 'Jacalones II', 'Chalco', 'México'),
(2632, '56604', 'Nueva San Miguel', 'Chalco', 'México'),
(2633, '56605', 'Nueva San Isidro', 'Chalco', 'México'),
(2634, '56605', 'Nueva San Antonio', 'Chalco', 'México'),
(2635, '56605', 'Agrarista', 'Chalco', 'México'),
(2636, '56605', 'Agrarista Sector Alcanfores', 'Chalco', 'México'),
(2637, '56605', 'El Paraíso', 'Chalco', 'México'),
(2638, '56605', 'Fraternidad Antorchista', 'Chalco', 'México'),
(2639, '56605', 'Clara Córdoba Morán', 'Chalco', 'México'),
(2640, '56605', 'Humberto Vidal Mendoza', 'Chalco', 'México'),
(2641, '56606', 'Unión de Guadalupe', 'Chalco', 'México'),
(2642, '56607', 'Covadonga', 'Chalco', 'México'),
(2643, '56607', 'Culturas de México', 'Chalco', 'México'),
(2644, '56607', 'Jardines de Chalco', 'Chalco', 'México'),
(2645, '56607', '21 de Marzo', 'Chalco', 'México'),
(2646, '56608', 'Emiliano Zapata', 'Chalco', 'México'),
(2647, '56608', 'Ampliación Emiliano Zapata', 'Chalco', 'México'),
(2648, '56608', 'San Cristóbal', 'Chalco', 'México'),
(2649, '56609', 'Santa Cruz Amalinalco', 'Chalco', 'México'),
(2650, '56610', 'Alfredo Baranda', 'Valle de Chalco Solidaridad', 'México'),
(2651, '56610', 'Américas', 'Valle de Chalco Solidaridad', 'México'),
(2652, '56610', 'Niños Héroes', 'Valle de Chalco Solidaridad', 'México'),
(2653, '56610', 'San Miguel las Tablas', 'Valle de Chalco Solidaridad', 'México'),
(2654, '56613', 'San Miguel Xico', 'Valle de Chalco Solidaridad', 'México'),
(2655, '56614', 'Poder Popular', 'Valle de Chalco Solidaridad', 'México'),
(2656, '56614', 'Cerro del Marques', 'Valle de Chalco Solidaridad', 'México'),
(2657, '56614', 'San Martín Xico La Laguna', 'Valle de Chalco Solidaridad', 'México'),
(2658, '56614', 'Real de San Martín', 'Valle de Chalco Solidaridad', 'México'),
(2659, '56614', 'Ex-hacienda Xico', 'Valle de Chalco Solidaridad', 'México'),
(2660, '56614', 'Central de Abasto', 'Valle de Chalco Solidaridad', 'México'),
(2661, '56614', 'Antorcha Valle de Chalco', 'Valle de Chalco Solidaridad', 'México'),
(2662, '56615', 'Concepción', 'Valle de Chalco Solidaridad', 'México'),
(2663, '56615', 'María Isabel', 'Valle de Chalco Solidaridad', 'México'),
(2664, '56615', 'Santiago', 'Valle de Chalco Solidaridad', 'México'),
(2665, '56615', 'El Agostadero', 'Valle de Chalco Solidaridad', 'México'),
(2666, '56616', 'Guadalupana', 'Valle de Chalco Solidaridad', 'México'),
(2667, '56616', 'Providencia', 'Valle de Chalco Solidaridad', 'México'),
(2668, '56617', 'El Triunfo', 'Valle de Chalco Solidaridad', 'México'),
(2669, '56617', 'Independencia', 'Valle de Chalco Solidaridad', 'México'),
(2670, '56617', 'Jardín', 'Valle de Chalco Solidaridad', 'México'),
(2671, '56617', 'San Isidro', 'Valle de Chalco Solidaridad', 'México'),
(2672, '56617', 'Santa Cruz', 'Valle de Chalco Solidaridad', 'México'),
(2673, '56618', 'Geovillas la Asunción', 'Valle de Chalco Solidaridad', 'México'),
(2674, '56618', 'Avándaro', 'Valle de Chalco Solidaridad', 'México'),
(2675, '56618', 'Darío Martínez II Sección', 'Valle de Chalco Solidaridad', 'México'),
(2676, '56618', 'Emiliano Zapata', 'Valle de Chalco Solidaridad', 'México'),
(2677, '56618', 'San Juan Tlalpizahuac', 'Valle de Chalco Solidaridad', 'México'),
(2678, '56618', 'Carlos Salinas de Gortari', 'Valle de Chalco Solidaridad', 'México'),
(2679, '56618', 'San Gregorio', 'Valle de Chalco Solidaridad', 'México'),
(2680, '56619', 'La Punta', 'Valle de Chalco Solidaridad', 'México'),
(2681, '56619', 'Alfredo del Mazo', 'Valle de Chalco Solidaridad', 'México'),
(2682, '56619', 'Darío Martínez I Sección', 'Valle de Chalco Solidaridad', 'México'),
(2683, '56619', 'Del Carmen', 'Valle de Chalco Solidaridad', 'México'),
(2684, '56619', 'Ampliación Santa Catarina', 'Valle de Chalco Solidaridad', 'México'),
(2685, '56619', 'Santa Catarina', 'Valle de Chalco Solidaridad', 'México'),
(2686, '56620', 'San José Axalco', 'Chalco', 'México'),
(2687, '56620', 'Capultitla', 'Chalco', 'México'),
(2688, '56620', 'Jazmín de las Flores', 'Chalco', 'México'),
(2689, '56620', 'Lomas de San Pablo', 'Chalco', 'México'),
(2690, '56620', 'San Pablo Atlazalpan', 'Chalco', 'México'),
(2691, '56620', 'Michoacana', 'Chalco', 'México'),
(2692, '56620', 'El Recodo de San José Axalco', 'Chalco', 'México'),
(2693, '56620', 'San José', 'Chalco', 'México'),
(2694, '56620', 'Independencia', 'Chalco', 'México'),
(2695, '56623', 'Rancho San Miguel', 'Chalco', 'México'),
(2696, '56623', 'Rancho Nuevo', 'Chalco', 'México'),
(2697, '56623', 'Rancho Nuevo San Miguel', 'Chalco', 'México'),
(2698, '56623', 'Camino al Monte', 'Chalco', 'México'),
(2699, '56623', 'Santa Catarina Ayotzingo', 'Chalco', 'México'),
(2700, '56624', 'Pedregal Tezompa', 'Chalco', 'México'),
(2701, '56624', 'San Juan Tezompa', 'Chalco', 'México'),
(2702, '56624', 'Caserío de Cortés', 'Chalco', 'México'),
(2703, '56624', 'Las Nieves', 'Chalco', 'México'),
(2704, '56625', 'Residencial Iztac', 'Chalco', 'México'),
(2705, '56625', 'Independencia Chimalpa', 'Chalco', 'México'),
(2706, '56625', 'San Lorenzo Chimalpa', 'Chalco', 'México'),
(2707, '56625', 'San Martín Xico Nuevo', 'Chalco', 'México'),
(2708, '56625', 'San Mateo Huitzilzingo', 'Chalco', 'México'),
(2709, '56625', 'Guadalupe', 'Chalco', 'México'),
(2710, '56640', 'San Gregorio Cuautzingo', 'Chalco', 'México'),
(2711, '56640', 'Los Álamos', 'Chalco', 'México'),
(2712, '56640', 'Santa Ana (Predio San Juan)', 'Chalco', 'México'),
(2713, '56641', 'Benito Juárez', 'Chalco', 'México'),
(2714, '56641', 'La Candelaria Tlapala', 'Chalco', 'México'),
(2715, '56641', 'Ex-hacienda de Guadalupe', 'Chalco', 'México'),
(2716, '56641', 'Llano del Moral', 'Chalco', 'México'),
(2717, '56642', 'San Lucas Amalinalco', 'Chalco', 'México'),
(2718, '56643', 'Ejido San Marcos', 'Chalco', 'México'),
(2719, '56643', 'Caja de Agua', 'Chalco', 'México'),
(2720, '56643', 'San Marcos Huixtoco', 'Chalco', 'México'),
(2721, '56643', 'Los Hornos', 'Chalco', 'México'),
(2722, '56643', 'San Buenaventura 7a Sección', 'Chalco', 'México'),
(2723, '56643', 'La Chimenea', 'Chalco', 'México'),
(2724, '56644', 'Los Héroes Chalco II', 'Chalco', 'México'),
(2725, '56644', 'Los Héroes Chalco III', 'Chalco', 'México'),
(2726, '56644', 'San Martín Cuautlalpan', 'Chalco', 'México'),
(2727, '56644', 'Villas de San Martín', 'Chalco', 'México'),
(2728, '56644', 'Los Héroes Chalco', 'Chalco', 'México'),
(2729, '56644', 'Pueblo Nuevo', 'Chalco', 'México'),
(2730, '56644', 'Hacienda San Juan', 'Chalco', 'México'),
(2731, '56646', 'Guadalupe de los Tepetates', 'Chalco', 'México'),
(2732, '56646', 'Huixtomatitla (Tepalcates)', 'Chalco', 'México'),
(2733, '56646', 'La Longaniza', 'Chalco', 'México'),
(2734, '56646', 'Santa María Huexoculco', 'Chalco', 'México'),
(2735, '56647', 'San Mateo Tezoquipan Miraflores', 'Chalco', 'México'),
(2736, '56647', 'Hacienda del Moral', 'Chalco', 'México'),
(2737, '56650', 'Temamatla', 'Temamatla', 'México'),
(2738, '56650', 'Xalpa', 'Temamatla', 'México'),
(2739, '56650', 'Cuautitla', 'Temamatla', 'México'),
(2740, '56650', 'Tepetitla', 'Temamatla', 'México'),
(2741, '56650', 'Predio de los Albertocos', 'Temamatla', 'México'),
(2742, '56650', 'Guadalupana', 'Temamatla', 'México'),
(2743, '56650', 'La Estación (La Caseta)', 'Temamatla', 'México'),
(2744, '56653', 'Santiago Zula', 'Temamatla', 'México'),
(2745, '56654', 'El Tejocote (Colonia Jesús Estudillo L.)', 'Temamatla', 'México'),
(2746, '56654', 'El Tejocote', 'Temamatla', 'México'),
(2747, '56654', 'Ampliación Potrero', 'Temamatla', 'México'),
(2748, '56655', 'Los Reyes Acatlixhuayan', 'Temamatla', 'México'),
(2749, '56656', 'Tepancal', 'Temamatla', 'México'),
(2750, '56656', 'San Judas Tadeo', 'Temamatla', 'México'),
(2751, '56657', 'Tenexcaltitla', 'Temamatla', 'México'),
(2752, '56657', 'El Cabi', 'Temamatla', 'México'),
(2753, '56680', 'Techichilco', 'Cocotitlán', 'México'),
(2754, '56680', 'Oyotepec', 'Cocotitlán', 'México'),
(2755, '56680', '20 de Noviembre', 'Cocotitlán', 'México'),
(2756, '56680', 'Tlapipinca', 'Cocotitlán', 'México'),
(2757, '56680', 'La Y (Atoyac)', 'Cocotitlán', 'México'),
(2758, '56680', 'La Vía', 'Cocotitlán', 'México'),
(2759, '56683', 'San Andrés Metla', 'Cocotitlán', 'México'),
(2760, '56684', 'Atoyac', 'Cocotitlán', 'México'),
(2761, '56700', 'Tlalmanalco de Velázquez', 'Tlalmanalco', 'México'),
(2762, '56700', 'Vista Bella', 'Tlalmanalco', 'México'),
(2763, '56700', 'San Diego', 'Tlalmanalco', 'México'),
(2764, '56700', 'Rumorosa', 'Tlalmanalco', 'México'),
(2765, '56700', 'Granjas San José', 'Tlalmanalco', 'México'),
(2766, '56700', 'Cerro de Cruz', 'Tlalmanalco', 'México'),
(2767, '56700', 'El Edén', 'Tlalmanalco', 'México'),
(2768, '56700', 'Magisterial', 'Tlalmanalco', 'México'),
(2769, '56700', 'El Centenario', 'Tlalmanalco', 'México'),
(2770, '56700', 'Jerusalén', 'Tlalmanalco', 'México'),
(2771, '56700', 'La esperanza', 'Tlalmanalco', 'México'),
(2772, '56700', 'De los Chincolos', 'Tlalmanalco', 'México'),
(2773, '56700', 'INFONAVIT Fidel Velazquez', 'Tlalmanalco', 'México'),
(2774, '56700', 'De Tula', 'Tlalmanalco', 'México'),
(2775, '56700', 'De la Comunidad', 'Tlalmanalco', 'México'),
(2776, '56700', 'San Pedro', 'Tlalmanalco', 'México'),
(2777, '56700', 'San Cristobal Tezopilo', 'Tlalmanalco', 'México'),
(2778, '56700', 'Cruz de Mayo 1', 'Tlalmanalco', 'México'),
(2779, '56700', 'Cruz de Mayo', 'Tlalmanalco', 'México'),
(2780, '56700', 'Hermanos Peña', 'Tlalmanalco', 'México'),
(2781, '56703', 'La Esperanza', 'Tlalmanalco', 'México'),
(2782, '56703', 'Vista Hermosa', 'Tlalmanalco', 'México'),
(2783, '56703', 'La Huerta', 'Tlalmanalco', 'México'),
(2784, '56703', 'Valle Plateado', 'Tlalmanalco', 'México'),
(2785, '56704', 'San Lorenzo Tlalmiminolpan', 'Tlalmanalco', 'México'),
(2786, '56710', 'Lomas del Pedregal', 'Tlalmanalco', 'México'),
(2787, '56713', 'Fernando de la Macorra', 'Tlalmanalco', 'México'),
(2788, '56713', 'Alfa y Omega', 'Tlalmanalco', 'México'),
(2789, '56713', 'Santa Rita', 'Tlalmanalco', 'México'),
(2790, '56714', 'Villa Rincón de las Montañas', 'Tlalmanalco', 'México'),
(2791, '56714', 'Gavillero (Rancho el Gavillero)', 'Tlalmanalco', 'México'),
(2792, '56714', 'La Mesa', 'Tlalmanalco', 'México'),
(2793, '56714', 'La Escondida', 'Tlalmanalco', 'México'),
(2794, '56714', 'Cuautenampa (La Quebradora)', 'Tlalmanalco', 'México'),
(2795, '56715', 'Salvador Angulo', 'Tlalmanalco', 'México'),
(2796, '56715', 'El Escribiente', 'Tlalmanalco', 'México'),
(2797, '56715', 'Chantico I', 'Tlalmanalco', 'México'),
(2798, '56715', 'Santa María', 'Tlalmanalco', 'México'),
(2799, '56715', 'La Encumbre', 'Tlalmanalco', 'México'),
(2800, '56715', 'Chantico II', 'Tlalmanalco', 'México'),
(2801, '56716', 'El Trapiche (Xacalco)', 'Tlalmanalco', 'México'),
(2802, '56716', 'Santiago [Kilómetro 58.5]', 'Tlalmanalco', 'México'),
(2803, '56716', 'El Magueyal Dos', 'Tlalmanalco', 'México'),
(2804, '56716', 'Vergel de la Sierra', 'Tlalmanalco', 'México'),
(2805, '56720', 'San Juan Atzacualoya', 'Tlalmanalco', 'México'),
(2806, '56720', '21 de Marzo', 'Tlalmanalco', 'México'),
(2807, '56720', 'Las Conchitas', 'Tlalmanalco', 'México'),
(2808, '56723', 'Pueblo Nuevo', 'Tlalmanalco', 'México'),
(2809, '56726', 'Santa Cruz', 'Tlalmanalco', 'México'),
(2810, '56730', 'Santo Tomás Atzingo', 'Tlalmanalco', 'México'),
(2811, '56730', 'Las Palomas', 'Tlalmanalco', 'México'),
(2812, '56731', 'San José Zavaleta', 'Tlalmanalco', 'México'),
(2813, '56731', 'La Ladrillera', 'Tlalmanalco', 'México'),
(2814, '56735', 'San Antonio Tlaltecahuacán', 'Tlalmanalco', 'México'),
(2815, '56740', 'San Rafael', 'Tlalmanalco', 'México'),
(2816, '56740', 'Ladrilleras las Margaritas', 'Tlalmanalco', 'México'),
(2817, '56743', 'Loma Linda', 'Tlalmanalco', 'México'),
(2818, '56743', 'Obrera', 'Tlalmanalco', 'México'),
(2819, '56743', 'Hidalgo', 'Tlalmanalco', 'México'),
(2820, '56744', 'Solidaridad', 'Tlalmanalco', 'México'),
(2821, '56744', 'El Faro', 'Tlalmanalco', 'México'),
(2822, '56744', 'De La Peña', 'Tlalmanalco', 'México'),
(2823, '56744', 'Los Cuartos', 'Tlalmanalco', 'México'),
(2824, '56744', 'El Encinal', 'Tlalmanalco', 'México'),
(2825, '56745', 'El Cedral', 'Tlalmanalco', 'México'),
(2826, '56745', 'La Cañada', 'Tlalmanalco', 'México'),
(2827, '56746', 'La Cuesta', 'Tlalmanalco', 'México'),
(2828, '56746', 'Anselmo Granados', 'Tlalmanalco', 'México'),
(2829, '56747', 'La Joya (La Rosa)', 'Tlalmanalco', 'México'),
(2830, '56747', 'Tepopotal', 'Tlalmanalco', 'México'),
(2831, '56760', 'La Capilla', 'Ayapango', 'México'),
(2832, '56760', 'La Soledad', 'Ayapango', 'México'),
(2833, '56760', 'Predio el Calvario', 'Ayapango', 'México'),
(2834, '56763', 'Tetepetla', 'Ayapango', 'México'),
(2835, '56763', 'San Miguel', 'Ayapango', 'México'),
(2836, '56765', 'San Diego Chalcatepehuacán', 'Ayapango', 'México'),
(2837, '56765', 'San Diego', 'Ayapango', 'México'),
(2838, '56765', 'El Arenal (Camino al Arenal)', 'Ayapango', 'México'),
(2839, '56765', 'Las Casitas (Tepexpan)', 'Ayapango', 'México'),
(2840, '56766', 'La Colonia', 'Ayapango', 'México'),
(2841, '56766', 'Poxtla', 'Ayapango', 'México'),
(2842, '56767', 'Tlamapa', 'Ayapango', 'México'),
(2843, '56770', 'San José', 'Ayapango', 'México'),
(2844, '56776', 'Mihuacán', 'Ayapango', 'México'),
(2845, '56776', 'Pahuacán', 'Ayapango', 'México'),
(2846, '56776', 'Cemoloc Grande', 'Ayapango', 'México'),
(2847, '56780', 'San Juan Coxtocan', 'Tenango del Aire', 'México'),
(2848, '56780', 'San Mateo Tepopula', 'Tenango del Aire', 'México'),
(2849, '56780', 'Santiago Tepopula', 'Tenango del Aire', 'México'),
(2850, '56780', 'La Palma Tenango', 'Tenango del Aire', 'México'),
(2851, '56780', 'San Miguel', 'Tenango del Aire', 'México'),
(2852, '56780', 'Amilco', 'Tenango del Aire', 'México'),
(2853, '56783', 'El Pedregal (Teotoxtipan)', 'Tenango del Aire', 'México'),
(2854, '56783', 'Tecuatitla (Colonia Nueva Tecuatitla)', 'Tenango del Aire', 'México'),
(2855, '56783', 'San Luis Aculco', 'Tenango del Aire', 'México'),
(2856, '56783', 'Aculco (El Paraíso)', 'Tenango del Aire', 'México'),
(2857, '56783', 'San Miguel (Las Espinas)', 'Tenango del Aire', 'México'),
(2858, '56783', 'Saturnino (Tepalcapa)', 'Tenango del Aire', 'México'),
(2859, '56783', 'San Isidro Labrador (El Piaje)', 'Tenango del Aire', 'México'),
(2860, '56784', 'El Mirador', 'Tenango del Aire', 'México'),
(2861, '56784', 'Tres Platos', 'Tenango del Aire', 'México'),
(2862, '56785', 'Chavarría (Paraje Puerta)', 'Tenango del Aire', 'México'),
(2863, '56800', 'De San Bartolo', 'Ozumba', 'México'),
(2864, '56800', 'Ozumba de Alzate', 'Ozumba', 'México'),
(2865, '56800', 'San Mateo Tecalco', 'Ozumba', 'México'),
(2866, '56800', 'Del Coyote', 'Ozumba', 'México'),
(2867, '56800', 'San Francisco', 'Ozumba', 'México'),
(2868, '56800', 'San Martín', 'Ozumba', 'México'),
(2869, '56800', 'Del Cocol', 'Ozumba', 'México'),
(2870, '56800', 'Santa Cruz', 'Ozumba', 'México'),
(2871, '56800', 'San Juan', 'Ozumba', 'México'),
(2872, '56800', 'San Pedro', 'Ozumba', 'México'),
(2873, '56803', 'Industrial', 'Ozumba', 'México'),
(2874, '56803', 'José Antonio Alzate', 'Ozumba', 'México'),
(2875, '56803', 'Santa Cecilia', 'Ozumba', 'México'),
(2876, '56803', 'Huamantla de Tizapa', 'Ozumba', 'México'),
(2877, '56804', 'Los Limones', 'Ozumba', 'México'),
(2878, '56805', 'Santiago', 'Ozumba', 'México'),
(2879, '56806', 'San Vicente Chimalhuacán', 'Ozumba', 'México'),
(2880, '56806', 'Loma Bonita', 'Ozumba', 'México'),
(2881, '56810', 'San José Tlacotitlán', 'Ozumba', 'México'),
(2882, '56810', 'Santiago Mamalhuazuca', 'Ozumba', 'México'),
(2883, '56813', 'San Mateo Cuatepulco (Zona Cuatepulco)', 'Ozumba', 'México'),
(2884, '56813', 'La Cantarilla', 'Ozumba', 'México'),
(2885, '56813', 'Quinta Santa Cecilia', 'Ozumba', 'México'),
(2886, '56814', 'San José (Rancho San José Tlacotitlán)', 'Ozumba', 'México'),
(2887, '56815', 'San Sebastián', 'Ozumba', 'México'),
(2888, '56815', 'Huejote (Rancho Huejote)', 'Ozumba', 'México'),
(2889, '56816', 'Guadalupe Hidalgo', 'Ozumba', 'México'),
(2890, '56816', 'San Lorenzo Tlaltecoyac', 'Ozumba', 'México'),
(2891, '56820', 'Actopan', 'Ozumba', 'México'),
(2892, '56860', 'La Loma', 'Juchitepec', 'México'),
(2893, '56860', 'La Garita', 'Juchitepec', 'México'),
(2894, '56860', 'Juchi', 'Juchitepec', 'México'),
(2895, '56860', 'Calayuco', 'Juchitepec', 'México'),
(2896, '56860', 'Cuautzozongo', 'Juchitepec', 'México'),
(2897, '56863', 'San Pedro', 'Juchitepec', 'México'),
(2898, '56864', 'El Tezontlal', 'Juchitepec', 'México'),
(2899, '56864', 'El Tititlal', 'Juchitepec', 'México'),
(2900, '56864', 'Camino a la Mina', 'Juchitepec', 'México'),
(2901, '56864', 'San Matías Cuijingo', 'Juchitepec', 'México'),
(2902, '56864', 'La Rosita', 'Juchitepec', 'México'),
(2903, '56866', 'El Madroño', 'Juchitepec', 'México'),
(2904, '56867', 'Santa Rosa de Lima', 'Juchitepec', 'México'),
(2905, '56870', 'Techachal', 'Juchitepec', 'México'),
(2906, '56880', 'Tepetlixpa', 'Tepetlixpa', 'México'),
(2907, '56880', 'Buenavista', 'Tepetlixpa', 'México'),
(2908, '56880', 'Xocotla', 'Tepetlixpa', 'México'),
(2909, '56880', 'Del Guapo', 'Tepetlixpa', 'México'),
(2910, '56880', 'Emiliano Zapata', 'Tepetlixpa', 'México'),
(2911, '56880', 'La Venta', 'Tepetlixpa', 'México'),
(2912, '56880', 'Del Rincón Brujo', 'Tepetlixpa', 'México'),
(2913, '56880', 'San Isidro', 'Tepetlixpa', 'México'),
(2914, '56880', 'Granera', 'Tepetlixpa', 'México'),
(2915, '56880', 'Texcalera', 'Tepetlixpa', 'México'),
(2916, '56884', 'Los Limones', 'Tepetlixpa', 'México'),
(2917, '56884', '2o. Agrupamiento de Seg. Púb. Est. Tepetlixpa', 'Tepetlixpa', 'México'),
(2918, '56884', 'El Cerro', 'Tepetlixpa', 'México'),
(2919, '56884', 'Granja Alborada', 'Tepetlixpa', 'México'),
(2920, '56884', 'Chimalaca', 'Tepetlixpa', 'México'),
(2921, '56884', 'Sofía', 'Tepetlixpa', 'México'),
(2922, '56885', 'San Esteban Cuecuecuautitla', 'Tepetlixpa', 'México'),
(2923, '56886', 'Tlaximulco (Rancho de la Cruz)', 'Tepetlixpa', 'México'),
(2924, '56886', 'Corregidora (Texcalera)', 'Tepetlixpa', 'México'),
(2925, '56890', 'Nepantla de Sor Juana Inés de la Cruz', 'Tepetlixpa', 'México'),
(2926, '56893', 'Las Cruces', 'Tepetlixpa', 'México'),
(2927, '56893', 'Casa Blanca (Km. Setenta y Seis)', 'Tepetlixpa', 'México'),
(2928, '56893', 'Santa Cruz', 'Tepetlixpa', 'México'),
(2929, '56893', 'Santa Rosa', 'Tepetlixpa', 'México'),
(2930, '56893', 'Granja Nepantla', 'Tepetlixpa', 'México'),
(2931, '56894', 'Texcalama (El Montoncito Texcalama)', 'Tepetlixpa', 'México'),
(2932, '56894', 'Alotepec', 'Tepetlixpa', 'México'),
(2933, '56895', 'Cuauhnextle', 'Tepetlixpa', 'México'),
(2934, '56895', 'Piñuelas (Guayabitos)', 'Tepetlixpa', 'México'),
(2935, '56900', 'Sector Sacromonte', 'Amecameca', 'México'),
(2936, '56903', 'Izta-Popo', 'Amecameca', 'México'),
(2937, '56903', 'Sor Juana Inés de la Cruz', 'Amecameca', 'México'),
(2938, '56903', 'Los Volcanes', 'Amecameca', 'México'),
(2939, '56903', 'Sector Iztaccihuatl', 'Amecameca', 'México'),
(2940, '56903', 'Sector Caltenco', 'Amecameca', 'México'),
(2941, '56903', 'San Miguel', 'Amecameca', 'México'),
(2942, '56903', 'Sector Panohaya', 'Amecameca', 'México'),
(2943, '56904', 'Del Rosario', 'Amecameca', 'México'),
(2944, '56904', 'Sector Atenco', 'Amecameca', 'México'),
(2945, '56905', 'San Juan', 'Amecameca', 'México'),
(2946, '56905', 'Tepollo', 'Amecameca', 'México'),
(2947, '56905', 'Nestor Soriano', 'Amecameca', 'México'),
(2948, '56905', 'Magisterial Sacromonte', 'Amecameca', 'México'),
(2949, '56905', 'Sector Popocatepetl', 'Amecameca', 'México'),
(2950, '56905', 'El Torito', 'Amecameca', 'México'),
(2951, '56913', 'El Castillo', 'Amecameca', 'México'),
(2952, '56913', 'Telcingo', 'Amecameca', 'México'),
(2953, '56914', 'Xaltepic', 'Amecameca', 'México'),
(2954, '56920', 'Camino al Salto (Coapexco)', 'Amecameca', 'México'),
(2955, '56920', 'Atlancatzi', 'Amecameca', 'México'),
(2956, '56920', 'Cuiloxotitla', 'Amecameca', 'México'),
(2957, '56923', 'Tetecla', 'Amecameca', 'México'),
(2958, '56923', 'Tepeyehual', 'Amecameca', 'México'),
(2959, '56924', 'Santa María Tomacoco', 'Amecameca', 'México'),
(2960, '56930', 'San Francisco Zentlalpan', 'Amecameca', 'México'),
(2961, '56930', 'Las Cartoneras', 'Amecameca', 'México'),
(2962, '56933', 'Aldea de los Reyes', 'Amecameca', 'México'),
(2963, '56933', 'Chupícuaro (Texquimeca)', 'Amecameca', 'México'),
(2964, '56933', 'Los Tepalcates', 'Amecameca', 'México'),
(2965, '56933', 'El Risco', 'Amecameca', 'México'),
(2966, '56933', 'Don Martín', 'Amecameca', 'México'),
(2967, '56935', 'Santa Isabel Chalma', 'Amecameca', 'México'),
(2968, '56940', 'Santiago Cuauhtenco', 'Amecameca', 'México'),
(2969, '56940', 'Agua Viva', 'Amecameca', 'México'),
(2970, '56945', 'Coapexco', 'Amecameca', 'México'),
(2971, '56950', 'San Antonio Zoyatzingo', 'Amecameca', 'México'),
(2972, '56953', 'San Diego Tlaxcatitla', 'Amecameca', 'México'),
(2973, '56954', 'Camino a Pahuacán (Colonia Néstor Soriano)', 'Amecameca', 'México'),
(2974, '56954', 'Las Palomas', 'Amecameca', 'México'),
(2975, '56954', 'San Rafael', 'Amecameca', 'México'),
(2976, '56954', 'Vetania', 'Amecameca', 'México'),
(2977, '56954', 'El Arenal', 'Amecameca', 'México'),
(2978, '56955', 'San Diego Huehuecalco', 'Amecameca', 'México'),
(2979, '56956', 'Ximoco', 'Amecameca', 'México'),
(2980, '56956', 'Tenexcaltitla', 'Amecameca', 'México'),
(2981, '56960', 'San Pedro Nexapa', 'Amecameca', 'México'),
(2982, '56963', 'El Ocotal', 'Amecameca', 'México'),
(2983, '56965', 'San Juan Grande', 'Amecameca', 'México'),
(2984, '56965', 'Nexatenco', 'Amecameca', 'México'),
(2985, '56965', 'El Tecorral', 'Amecameca', 'México'),
(2986, '56970', 'San Jacinto', 'Atlautla', 'México'),
(2987, '56973', 'Santo Domingo', 'Atlautla', 'México'),
(2988, '56973', 'San Lorenzo', 'Atlautla', 'México'),
(2989, '56973', 'San Pedro', 'Atlautla', 'México'),
(2990, '56973', 'La Natividad', 'Atlautla', 'México'),
(2991, '56974', 'Santiago', 'Atlautla', 'México'),
(2992, '56974', 'San Bartolo', 'Atlautla', 'México'),
(2993, '56974', 'San Martín', 'Atlautla', 'México'),
(2994, '56974', 'San Francisco', 'Atlautla', 'México'),
(2995, '56975', 'Quinta Loma Verde (Paraje Tepichilco)', 'Atlautla', 'México'),
(2996, '56975', 'San Juan', 'Atlautla', 'México'),
(2997, '56975', 'Ixtotempatl', 'Atlautla', 'México'),
(2998, '56975', 'San Felipe', 'Atlautla', 'México'),
(2999, '56975', 'San Martín', 'Atlautla', 'México'),
(3000, '56975', 'Asunción', 'Atlautla', 'México'),
(3001, '56976', 'San Andrés Tlalamac', 'Atlautla', 'México'),
(3002, '56980', 'San Juan Tehuixtitlán Centro', 'Atlautla', 'México'),
(3003, '56982', 'Las Delicias', 'Atlautla', 'México'),
(3004, '56983', 'Nexapa', 'Atlautla', 'México'),
(3005, '56983', 'Popo Park', 'Atlautla', 'México'),
(3006, '56983', 'Del Cornejal', 'Atlautla', 'México'),
(3007, '56984', 'Guadalupe', 'Atlautla', 'México'),
(3008, '56984', 'El Arenal', 'Atlautla', 'México'),
(3009, '56984', 'El mirador', 'Atlautla', 'México'),
(3010, '56990', 'Nexapa', 'Ecatzingo', 'México'),
(3011, '56990', 'San José', 'Ecatzingo', 'México'),
(3012, '56990', 'San Martín', 'Ecatzingo', 'México'),
(3013, '56990', 'Xolaltenco', 'Ecatzingo', 'México'),
(3014, '56990', 'Santa Catarina', 'Ecatzingo', 'México'),
(3015, '56990', 'Santa Gertrudis', 'Ecatzingo', 'México'),
(3016, '56993', 'San Marcos Tecomaxusco', 'Ecatzingo', 'México'),
(3017, '56993', 'Tepicila', 'Ecatzingo', 'México'),
(3018, '56993', 'Oxpanco', 'Ecatzingo', 'México'),
(3019, '56996', 'San Juan Tlacotompa (Tlacotompa)', 'Ecatzingo', 'México'),
(3020, '56996', 'Huexotitla', 'Ecatzingo', 'México'),
(3021, '56996', 'Ixtactepectípac (Rancho Ixtactepectípac)', 'Ecatzingo', 'México'),
(3022, '57000', 'Benito Juárez (La Aurora)', 'Nezahualcóyotl', 'México'),
(3023, '57100', 'Valle de Aragón', 'Nezahualcóyotl', 'México'),
(3024, '57103', 'Polígono del Bordo de Xochiaca', 'Nezahualcóyotl', 'México'),
(3025, '57120', 'Campestre Guadalupana', 'Nezahualcóyotl', 'México'),
(3026, '57129', 'Ampliación Campestre Guadalupana', 'Nezahualcóyotl', 'México'),
(3027, '57130', 'Las Antenas o Claustro de Sor Juana Inés de la C.', 'Nezahualcóyotl', 'México'),
(3028, '57130', 'Impulsora Popular Avícola', 'Nezahualcóyotl', 'México'),
(3029, '57138', 'Emiliano Zapata', 'Nezahualcóyotl', 'México'),
(3030, '57138', 'Canal de Sales', 'Nezahualcóyotl', 'México'),
(3031, '57138', 'Bosques de Viena', 'Nezahualcóyotl', 'México'),
(3032, '57139', 'Plazas de Aragón', 'Nezahualcóyotl', 'México'),
(3033, '57140', 'Jardines de Guadalupe', 'Nezahualcóyotl', 'México'),
(3034, '57150', 'Vergel de Guadalupe', 'Nezahualcóyotl', 'México'),
(3035, '57158', 'Joyas de Aragón', 'Nezahualcóyotl', 'México'),
(3036, '57170', 'Bosques de Aragón', 'Nezahualcóyotl', 'México'),
(3037, '57171', 'Escuela Nacional de Estudios Profesionales Aragón', 'Nezahualcóyotl', 'México'),
(3038, '57178', 'Las Armas', 'Nezahualcóyotl', 'México'),
(3039, '57179', 'Prados de Aragón', 'Nezahualcóyotl', 'México'),
(3040, '57180', 'Ciudad Lago', 'Nezahualcóyotl', 'México'),
(3041, '57185', 'Ampliación Ciudad Lago', 'Nezahualcóyotl', 'México'),
(3042, '57185', 'Ampliación Ciudad Lago El Triangulo', 'Nezahualcóyotl', 'México'),
(3043, '57185', 'Cuchilla del Tesoro', 'Nezahualcóyotl', 'México'),
(3044, '57188', 'Ampliación Ciudad Lago Asa (Antonio Alzate)', 'Nezahualcóyotl', 'México'),
(3045, '57189', 'Ampliación Ciudad Lago Comunicaciones', 'Nezahualcóyotl', 'México'),
(3046, '57200', 'El Sol', 'Nezahualcóyotl', 'México'),
(3047, '57205', 'Ciudad Jardín', 'Nezahualcóyotl', 'México'),
(3048, '57210', 'Estado de México', 'Nezahualcóyotl', 'México'),
(3049, '57300', 'Tamaulipas', 'Nezahualcóyotl', 'México'),
(3050, '57300', 'Tamaulipas Sección Virgencitas', 'Nezahualcóyotl', 'México'),
(3051, '57310', 'Tamaulipas Sección Las Flores', 'Nezahualcóyotl', 'México'),
(3052, '57310', 'Tamaulipas Sección Palmar', 'Nezahualcóyotl', 'México'),
(3053, '57400', 'El Barco Primera Sección', 'Nezahualcóyotl', 'México'),
(3054, '57400', 'El Barco Segunda Sección', 'Nezahualcóyotl', 'México'),
(3055, '57400', 'El Barco Tercera Sección', 'Nezahualcóyotl', 'México'),
(3056, '57410', 'Maravillas', 'Nezahualcóyotl', 'México'),
(3057, '57420', 'Nezahualcóyotl Primera Sección', 'Nezahualcóyotl', 'México'),
(3058, '57420', 'Nezahualcóyotl Segunda Sección', 'Nezahualcóyotl', 'México'),
(3059, '57420', 'Nezahualcóyotl Tercera Sección', 'Nezahualcóyotl', 'México'),
(3060, '57425', 'Perete', 'Nezahualcóyotl', 'México'),
(3061, '57430', 'Porvenir', 'Nezahualcóyotl', 'México'),
(3062, '57440', 'Las Palmas', 'Nezahualcóyotl', 'México'),
(3063, '57440', 'Martínez del Llano', 'Nezahualcóyotl', 'México'),
(3064, '57440', 'Xochitenco', 'Nezahualcóyotl', 'México'),
(3065, '57450', 'Ángel Veraza', 'Nezahualcóyotl', 'México'),
(3066, '57450', 'Volcanes', 'Nezahualcóyotl', 'México'),
(3067, '57460', 'Juárez Pantitlán', 'Nezahualcóyotl', 'México'),
(3068, '57465', 'Nueva Juárez Pantitlán Primera Sección', 'Nezahualcóyotl', 'México'),
(3069, '57465', 'San Mateito', 'Nezahualcóyotl', 'México'),
(3070, '57465', 'Aurorita', 'Nezahualcóyotl', 'México'),
(3071, '57465', 'Formando Hogar', 'Nezahualcóyotl', 'México'),
(3072, '57465', 'Joyita', 'Nezahualcóyotl', 'México'),
(3073, '57465', 'Amipant', 'Nezahualcóyotl', 'México'),
(3074, '57465', 'Mi Retiro', 'Nezahualcóyotl', 'México'),
(3075, '57465', 'Nueva Juárez Pantitlán Tercera Sección', 'Nezahualcóyotl', 'México'),
(3076, '57465', 'Nueva Juárez Pantitlán Segunda Sección', 'Nezahualcóyotl', 'México'),
(3077, '57500', 'Agua Azul Grupo C Súper 4 y Súper 23', 'Nezahualcóyotl', 'México'),
(3078, '57500', 'Agua Azul Grupo A Super 4', 'Nezahualcóyotl', 'México'),
(3079, '57500', 'Central', 'Nezahualcóyotl', 'México'),
(3080, '57500', 'Agua Azul Grupo B Super 4', 'Nezahualcóyotl', 'México'),
(3081, '57500', 'Agua Azul Grupo B Super 23', 'Nezahualcóyotl', 'México'),
(3082, '57510', 'Agua Azul Sección Pirules', 'Nezahualcóyotl', 'México'),
(3083, '57520', 'Porfirio Díaz', 'Nezahualcóyotl', 'México'),
(3084, '57530', 'Modelo', 'Nezahualcóyotl', 'México'),
(3085, '57600', 'Ampliación Romero Sección Las Fuentes', 'Nezahualcóyotl', 'México'),
(3086, '57610', 'Pavón Sección Silvia', 'Nezahualcóyotl', 'México'),
(3087, '57620', 'México Primera Sección', 'Nezahualcóyotl', 'México'),
(3088, '57620', 'México Segunda Sección', 'Nezahualcóyotl', 'México'),
(3089, '57630', 'Romero', 'Nezahualcóyotl', 'México'),
(3090, '57700', 'Evolución Súper 24', 'Nezahualcóyotl', 'México'),
(3091, '57700', 'Evolución Súper 22', 'Nezahualcóyotl', 'México'),
(3092, '57700', 'Evolución Súper 43', 'Nezahualcóyotl', 'México'),
(3093, '57700', 'Evolución', 'Nezahualcóyotl', 'México'),
(3094, '57708', 'Evolución Poniente', 'Nezahualcóyotl', 'México'),
(3095, '57709', 'Ampliación Evolución', 'Nezahualcóyotl', 'México'),
(3096, '57710', 'General José Vicente Villada', 'Nezahualcóyotl', 'México'),
(3097, '57718', 'Ampliación General José Vicente Villada Oriente', 'Nezahualcóyotl', 'México'),
(3098, '57718', 'Ampliación General José Vicente Villada Súper 44', 'Nezahualcóyotl', 'México'),
(3099, '57719', 'Ampliación General José Vicente Villada Poniente', 'Nezahualcóyotl', 'México'),
(3100, '57720', 'Atlacomulco', 'Nezahualcóyotl', 'México'),
(3101, '57730', 'Metropolitana Primera Sección', 'Nezahualcóyotl', 'México'),
(3102, '57739', 'San Lorenzo', 'Nezahualcóyotl', 'México'),
(3103, '57740', 'Metropolitana Segunda Sección', 'Nezahualcóyotl', 'México'),
(3104, '57750', 'Metropolitana Tercera Sección', 'Nezahualcóyotl', 'México'),
(3105, '57760', 'Ampliación General José Vicente Villada Súper 43', 'Nezahualcóyotl', 'México'),
(3106, '57800', 'Esperanza', 'Nezahualcóyotl', 'México'),
(3107, '57809', 'Rey Nezahualcóyotl', 'Nezahualcóyotl', 'México'),
(3108, '57810', 'Izcalli Nezahualcóyotl', 'Nezahualcóyotl', 'México'),
(3109, '57819', 'Parque Industrial Nezahualcóyotl', 'Nezahualcóyotl', 'México'),
(3110, '57820', 'La Perla', 'Nezahualcóyotl', 'México'),
(3111, '57830', 'Ampliación La Perla Reforma', 'Nezahualcóyotl', 'México'),
(3112, '57840', 'Reforma', 'Nezahualcóyotl', 'México'),
(3113, '57849', 'Reforma A Sección 1', 'Nezahualcóyotl', 'México'),
(3114, '57900', 'Las Águilas', 'Nezahualcóyotl', 'México'),
(3115, '57910', 'Constitución de 1857', 'Nezahualcóyotl', 'México'),
(3116, '57920', 'Santa Martha', 'Nezahualcóyotl', 'México'),
(3117, '57930', 'Manantiales', 'Nezahualcóyotl', 'México'),
(3118, '57940', 'Loma Bonita', 'Nezahualcóyotl', 'México'),
(3119, '57950', 'Ampliación Las Águilas', 'Nezahualcóyotl', 'México'),
(3120, '62000', 'Cuernavaca Centro', 'Cuernavaca', 'Morelos'),
(3121, '62009', 'Palacio de Gobierno del Estado de Morelos', 'Cuernavaca', 'Morelos'),
(3122, '62010', 'Altavista', 'Cuernavaca', 'Morelos'),
(3123, '62010', 'Las Piletas', 'Cuernavaca', 'Morelos'),
(3124, '62017', 'Margarita Maza de Juárez', 'Cuernavaca', 'Morelos'),
(3125, '62018', 'Altavista Barrancas', 'Cuernavaca', 'Morelos'),
(3126, '62019', 'Loma Hermosa', 'Cuernavaca', 'Morelos'),
(3127, '62019', 'Plan de Ayala Barrancas', 'Cuernavaca', 'Morelos'),
(3128, '62019', 'Provinciana', 'Cuernavaca', 'Morelos'),
(3129, '62019', 'Tepeyehualco', 'Cuernavaca', 'Morelos'),
(3130, '62020', 'Lomas de San Antón', 'Cuernavaca', 'Morelos'),
(3131, '62020', 'José López Portillo', 'Cuernavaca', 'Morelos'),
(3132, '62020', 'Sacatierra', 'Cuernavaca', 'Morelos'),
(3133, '62020', 'San Antón', 'Cuernavaca', 'Morelos'),
(3134, '62020', 'Las Terrazas', 'Cuernavaca', 'Morelos'),
(3135, '62020', 'Ampliación Sacatierra', 'Cuernavaca', 'Morelos'),
(3136, '62028', 'Loma de los Amates (Loma de la Lagunilla)', 'Cuernavaca', 'Morelos'),
(3137, '62028', 'Nueva Santa María', 'Cuernavaca', 'Morelos'),
(3138, '62028', 'Santa Fe', 'Cuernavaca', 'Morelos'),
(3139, '62029', 'Chulavista', 'Cuernavaca', 'Morelos'),
(3140, '62030', 'Club de Golf', 'Cuernavaca', 'Morelos'),
(3141, '62037', 'Jardines del Edén', 'Cuernavaca', 'Morelos'),
(3142, '62037', 'Benito Juárez (Lagunilla)', 'Cuernavaca', 'Morelos'),
(3143, '62037', 'La Unión', 'Cuernavaca', 'Morelos'),
(3144, '62038', 'Lagunillas Barrancas', 'Cuernavaca', 'Morelos'),
(3145, '62039', 'Lagunilla del Salto', 'Cuernavaca', 'Morelos'),
(3146, '62040', 'Miguel Hidalgo', 'Cuernavaca', 'Morelos'),
(3147, '62050', 'Benito Juárez (Centro)', 'Cuernavaca', 'Morelos'),
(3148, '62050', 'Las Palmas', 'Cuernavaca', 'Morelos'),
(3149, '62057', 'Pilares', 'Cuernavaca', 'Morelos'),
(3150, '62059', 'Bondies', 'Cuernavaca', 'Morelos'),
(3151, '62060', 'Quintana Roo', 'Cuernavaca', 'Morelos'),
(3152, '62070', 'Chipitlán', 'Cuernavaca', 'Morelos'),
(3153, '62070', 'Mina Cinco', 'Cuernavaca', 'Morelos'),
(3154, '62076', 'El Polvorín', 'Cuernavaca', 'Morelos'),
(3155, '62076', 'Adolfo López Mateos (Polvorín)', 'Cuernavaca', 'Morelos'),
(3156, '62076', 'Bosques de Palmira', 'Cuernavaca', 'Morelos'),
(3157, '62080', 'Lázaro Cárdenas', 'Cuernavaca', 'Morelos'),
(3158, '62080', 'Loma Bonita', 'Cuernavaca', 'Morelos'),
(3159, '62083', 'Lázaro Cárdenas 1ra. Ampliación', 'Cuernavaca', 'Morelos'),
(3160, '62083', 'Lázaro Cárdenas 2da. Ampliación', 'Cuernavaca', 'Morelos'),
(3161, '62084', 'La Parota', 'Cuernavaca', 'Morelos'),
(3162, '62100', 'Santa María Ahuacatitlán', 'Cuernavaca', 'Morelos'),
(3163, '62103', 'Santa Elena de La Cruz', 'Cuernavaca', 'Morelos'),
(3164, '62115', 'Independencia', 'Cuernavaca', 'Morelos'),
(3165, '62115', 'La Caminera', 'Cuernavaca', 'Morelos'),
(3166, '62115', 'Loma Bonita', 'Cuernavaca', 'Morelos'),
(3167, '62115', 'Adolfo López Mateos', 'Cuernavaca', 'Morelos'),
(3168, '62115', 'Ocotera', 'Cuernavaca', 'Morelos'),
(3169, '62116', 'Balcones de Tepuente', 'Cuernavaca', 'Morelos'),
(3170, '62116', 'Tepuente', 'Cuernavaca', 'Morelos'),
(3171, '62116', 'Valle Tepuente', 'Cuernavaca', 'Morelos'),
(3172, '62116', 'Cruz de La Misión', 'Cuernavaca', 'Morelos'),
(3173, '62116', 'Mirador Universidad', 'Cuernavaca', 'Morelos'),
(3174, '62116', 'Paraje de Tepuente', 'Cuernavaca', 'Morelos'),
(3175, '62117', 'Provincias de Jerusalén', 'Cuernavaca', 'Morelos'),
(3176, '62120', 'El Monasterio', 'Cuernavaca', 'Morelos'),
(3177, '62120', 'Rancho Cortes', 'Cuernavaca', 'Morelos'),
(3178, '62123', 'Ocotitla', 'Cuernavaca', 'Morelos'),
(3179, '62130', 'Buenavista', 'Cuernavaca', 'Morelos'),
(3180, '62130', 'Tetela del Monte', 'Cuernavaca', 'Morelos'),
(3181, '62130', 'Lomas de Ahuatlán', 'Cuernavaca', 'Morelos'),
(3182, '62130', 'Jardines de Ahuatlán', 'Cuernavaca', 'Morelos'),
(3183, '62130', 'Terrazas Ahuatlán', 'Cuernavaca', 'Morelos'),
(3184, '62130', 'Ahuatlán Tzompantle', 'Cuernavaca', 'Morelos'),
(3185, '62130', 'Real de Tetela', 'Cuernavaca', 'Morelos'),
(3186, '62133', 'Los Tepetates', 'Cuernavaca', 'Morelos'),
(3187, '62136', 'Jardín Tetela', 'Cuernavaca', 'Morelos'),
(3188, '62137', 'La Mojonera', 'Cuernavaca', 'Morelos'),
(3189, '62137', 'Lienzo El Charro', 'Cuernavaca', 'Morelos'),
(3190, '62139', 'Loma Linda', 'Cuernavaca', 'Morelos'),
(3191, '62140', 'Bellavista', 'Cuernavaca', 'Morelos'),
(3192, '62143', 'Zona Militar', 'Cuernavaca', 'Morelos'),
(3193, '62144', 'Condominios Bugambilias', 'Cuernavaca', 'Morelos'),
(3194, '62144', 'El Ángel', 'Cuernavaca', 'Morelos'),
(3195, '62144', 'Trevi I', 'Cuernavaca', 'Morelos'),
(3196, '62144', 'Trevi II', 'Cuernavaca', 'Morelos'),
(3197, '62144', 'Trevi III', 'Cuernavaca', 'Morelos'),
(3198, '62145', 'Lomas de La Selva Norte', 'Cuernavaca', 'Morelos'),
(3199, '62145', 'Conjunto Colorines', 'Cuernavaca', 'Morelos'),
(3200, '62150', 'Del Bosque', 'Cuernavaca', 'Morelos'),
(3201, '62153', 'Club Felicidad', 'Cuernavaca', 'Morelos'),
(3202, '62154', 'Lomas del Pinar', 'Cuernavaca', 'Morelos'),
(3203, '62156', 'Lomas de Tetela', 'Cuernavaca', 'Morelos'),
(3204, '62157', 'Lomas de Zompantle', 'Cuernavaca', 'Morelos'),
(3205, '62159', 'Adolfo Ruiz Cortines', 'Cuernavaca', 'Morelos'),
(3206, '62160', 'Hacienda Tetela', 'Cuernavaca', 'Morelos'),
(3207, '62160', 'Rancho Tetela', 'Cuernavaca', 'Morelos'),
(3208, '62160', 'La Cañada', 'Cuernavaca', 'Morelos'),
(3209, '62163', 'La Tranca', 'Cuernavaca', 'Morelos'),
(3210, '62163', 'Loma Sol', 'Cuernavaca', 'Morelos'),
(3211, '62164', 'Tzompantle Norte', 'Cuernavaca', 'Morelos'),
(3212, '62165', 'Lomas de Coyuca', 'Cuernavaca', 'Morelos'),
(3213, '62165', 'Tonintana', 'Cuernavaca', 'Morelos'),
(3214, '62166', 'Analco', 'Cuernavaca', 'Morelos'),
(3215, '62170', 'Jiquilpan', 'Cuernavaca', 'Morelos'),
(3216, '62170', 'La Pradera', 'Cuernavaca', 'Morelos'),
(3217, '62170', 'Tlaltenango', 'Cuernavaca', 'Morelos'),
(3218, '62173', 'Jardines de Tlaltenango', 'Cuernavaca', 'Morelos'),
(3219, '62175', 'Lomas de La Pradera', 'Cuernavaca', 'Morelos'),
(3220, '62179', 'San Jerónimo', 'Cuernavaca', 'Morelos'),
(3221, '62180', 'Lomas de Atzingo', 'Cuernavaca', 'Morelos'),
(3222, '62180', 'Plan de Ayala', 'Cuernavaca', 'Morelos'),
(3223, '62180', 'Minas de Atzingo', 'Cuernavaca', 'Morelos'),
(3224, '62180', 'El Tecolote', 'Cuernavaca', 'Morelos'),
(3225, '62190', 'La Carolina', 'Cuernavaca', 'Morelos'),
(3226, '62193', 'La Esperanza', 'Cuernavaca', 'Morelos'),
(3227, '62200', 'Insurgentes', 'Cuernavaca', 'Morelos'),
(3228, '62200', 'Cuauhtémoc', 'Cuernavaca', 'Morelos');
INSERT INTO `t_cat_data_dir` (`id_cat_data_dir`, `codigo_postal`, `colonia`, `alcaldia`, `entidad_federativa`) VALUES
(3229, '62203', 'El Ocote', 'Cuernavaca', 'Morelos'),
(3230, '62203', 'Salvador Elizarragaz', 'Cuernavaca', 'Morelos'),
(3231, '62203', 'Tehuiztitlán', 'Cuernavaca', 'Morelos'),
(3232, '62204', 'Tlahuica', 'Cuernavaca', 'Morelos'),
(3233, '62205', 'Los Ciruelos', 'Cuernavaca', 'Morelos'),
(3234, '62209', 'Universidad Autónoma del Estado de Morelos', 'Cuernavaca', 'Morelos'),
(3235, '62210', 'Chamilpa', 'Cuernavaca', 'Morelos'),
(3236, '62210', 'Los Aguacates', 'Cuernavaca', 'Morelos'),
(3237, '62210', 'Morelos', 'Cuernavaca', 'Morelos'),
(3238, '62214', 'Benito Juárez (Chamilpa)', 'Cuernavaca', 'Morelos'),
(3239, '62214', 'Brisas de Cuernavaca', 'Cuernavaca', 'Morelos'),
(3240, '62214', 'Buenaventura', 'Cuernavaca', 'Morelos'),
(3241, '62214', 'Ampliación Chamilpa', 'Cuernavaca', 'Morelos'),
(3242, '62214', 'Hermanos Rodríguez (Suterm)', 'Cuernavaca', 'Morelos'),
(3243, '62215', 'Blanca Universidad', 'Cuernavaca', 'Morelos'),
(3244, '62215', 'Río Balsas', 'Cuernavaca', 'Morelos'),
(3245, '62215', 'Blanca Universidad', 'Cuernavaca', 'Morelos'),
(3246, '62215', 'Universidad', 'Cuernavaca', 'Morelos'),
(3247, '62215', 'Veranda', 'Cuernavaca', 'Morelos'),
(3248, '62217', 'Lomas de Chamilpa 2a Secc.', 'Cuernavaca', 'Morelos'),
(3249, '62218', 'Lomas de Chamilpa', 'Cuernavaca', 'Morelos'),
(3250, '62219', 'Centro SCT Morelos', 'Cuernavaca', 'Morelos'),
(3251, '62220', 'Ocotepec', 'Cuernavaca', 'Morelos'),
(3252, '62226', 'Texcaltepec', 'Cuernavaca', 'Morelos'),
(3253, '62227', 'Ampliación Ocotepec', 'Cuernavaca', 'Morelos'),
(3254, '62228', 'Conjunto Aries', 'Cuernavaca', 'Morelos'),
(3255, '62228', 'Ampliación Emiliano Zapata', 'Cuernavaca', 'Morelos'),
(3256, '62229', 'Nogales', 'Cuernavaca', 'Morelos'),
(3257, '62230', 'Maravillas', 'Cuernavaca', 'Morelos'),
(3258, '62230', 'San Cristóbal', 'Cuernavaca', 'Morelos'),
(3259, '62233', 'Tlaltepexco', 'Cuernavaca', 'Morelos'),
(3260, '62233', 'La Paloma', 'Cuernavaca', 'Morelos'),
(3261, '62237', 'Los Faroles', 'Cuernavaca', 'Morelos'),
(3262, '62239', 'Prados de Cuernavaca', 'Cuernavaca', 'Morelos'),
(3263, '62240', 'Lomas de Cortes', 'Cuernavaca', 'Morelos'),
(3264, '62240', 'Rincón del Valle', 'Cuernavaca', 'Morelos'),
(3265, '62240', 'Versalles', 'Cuernavaca', 'Morelos'),
(3266, '62243', 'El Veladero', 'Cuernavaca', 'Morelos'),
(3267, '62243', 'San Salvador', 'Cuernavaca', 'Morelos'),
(3268, '62245', 'Recursos Hidráulicos', 'Cuernavaca', 'Morelos'),
(3269, '62247', 'Lomas de Cortes INFONAVIT', 'Cuernavaca', 'Morelos'),
(3270, '62248', 'Lomas del Conde', 'Cuernavaca', 'Morelos'),
(3271, '62248', 'Residencial las Flores', 'Cuernavaca', 'Morelos'),
(3272, '62248', 'Lomas de Cortes', 'Cuernavaca', 'Morelos'),
(3273, '62249', 'Tecomulco', 'Cuernavaca', 'Morelos'),
(3274, '62249', 'Ixtacpan (Zigapan)', 'Cuernavaca', 'Morelos'),
(3275, '62250', 'Base Tranquilidad', 'Cuernavaca', 'Morelos'),
(3276, '62250', 'Del Empleado', 'Cuernavaca', 'Morelos'),
(3277, '62250', 'Tezontepec', 'Cuernavaca', 'Morelos'),
(3278, '62253', 'Lomas de La Selva Oriente', 'Cuernavaca', 'Morelos'),
(3279, '62253', 'Pilancón', 'Cuernavaca', 'Morelos'),
(3280, '62260', 'Reforma', 'Cuernavaca', 'Morelos'),
(3281, '62269', 'Jardines de Reforma', 'Cuernavaca', 'Morelos'),
(3282, '62269', 'Valle Sol', 'Cuernavaca', 'Morelos'),
(3283, '62270', 'Lomas de La Selva', 'Cuernavaca', 'Morelos'),
(3284, '62270', 'Miraval', 'Cuernavaca', 'Morelos'),
(3285, '62270', 'Lomas de Miraval', 'Cuernavaca', 'Morelos'),
(3286, '62280', 'Gualupita', 'Cuernavaca', 'Morelos'),
(3287, '62283', 'La Estación', 'Cuernavaca', 'Morelos'),
(3288, '62284', 'Teopanzolco', 'Cuernavaca', 'Morelos'),
(3289, '62285', 'Patios de la Estación', 'Cuernavaca', 'Morelos'),
(3290, '62290', 'Vista Hermosa', 'Cuernavaca', 'Morelos'),
(3291, '62293', 'Lomas de Vista Hermosa', 'Cuernavaca', 'Morelos'),
(3292, '62293', 'La Fuente', 'Cuernavaca', 'Morelos'),
(3293, '62294', 'Ahuehuetitla', 'Cuernavaca', 'Morelos'),
(3294, '62294', 'Providencia', 'Cuernavaca', 'Morelos'),
(3295, '62294', 'Tlalquiltompan', 'Cuernavaca', 'Morelos'),
(3296, '62294', 'Federación', 'Cuernavaca', 'Morelos'),
(3297, '62295', 'Extensión Vista Hermosa', 'Cuernavaca', 'Morelos'),
(3298, '62296', 'Extensión Delicias', 'Cuernavaca', 'Morelos'),
(3299, '62300', 'Ahuatepec', 'Cuernavaca', 'Morelos'),
(3300, '62303', 'Lomas de La Herradura', 'Cuernavaca', 'Morelos'),
(3301, '62304', 'Gloria Almada de Bejarano', 'Cuernavaca', 'Morelos'),
(3302, '62304', 'El Mirador', 'Cuernavaca', 'Morelos'),
(3303, '62304', 'Los Limoneros', 'Cuernavaca', 'Morelos'),
(3304, '62304', 'San Isidro Loma Bonita', 'Cuernavaca', 'Morelos'),
(3305, '62305', 'Jardines de Ahuatepec', 'Cuernavaca', 'Morelos'),
(3306, '62305', 'Los Ramos', 'Cuernavaca', 'Morelos'),
(3307, '62305', 'Tepepan', 'Cuernavaca', 'Morelos'),
(3308, '62306', 'Villa Santiago', 'Cuernavaca', 'Morelos'),
(3309, '62306', 'Rodolfo López de Nava (Los Naranjos)', 'Cuernavaca', 'Morelos'),
(3310, '62306', 'La Herradura', 'Cuernavaca', 'Morelos'),
(3311, '62306', 'Cruz de la Curva', 'Cuernavaca', 'Morelos'),
(3312, '62306', 'Jubilados y Pencionados', 'Cuernavaca', 'Morelos'),
(3313, '62306', 'Residencial Vista Alta', 'Cuernavaca', 'Morelos'),
(3314, '62309', 'Paraje Alarcón', 'Cuernavaca', 'Morelos'),
(3315, '62320', 'Antonio Barona Centro', 'Cuernavaca', 'Morelos'),
(3316, '62323', 'Tierra Colorada', 'Cuernavaca', 'Morelos'),
(3317, '62323', 'México Lindo', 'Cuernavaca', 'Morelos'),
(3318, '62323', 'Papayos', 'Cuernavaca', 'Morelos'),
(3319, '62324', 'El Universo', 'Cuernavaca', 'Morelos'),
(3320, '62324', 'La Cañada', 'Cuernavaca', 'Morelos'),
(3321, '62324', 'Lomas de Ahuatepec', 'Cuernavaca', 'Morelos'),
(3322, '62324', 'Cerritos de García', 'Cuernavaca', 'Morelos'),
(3323, '62324', 'Las Flores', 'Cuernavaca', 'Morelos'),
(3324, '62324', 'Unidad Deportiva', 'Cuernavaca', 'Morelos'),
(3325, '62324', 'Vista Real Ahuatepec', 'Cuernavaca', 'Morelos'),
(3326, '62324', 'Ampliación la Cañada', 'Cuernavaca', 'Morelos'),
(3327, '62325', 'Rancho Alegre', 'Cuernavaca', 'Morelos'),
(3328, '62325', 'El Copalito', 'Cuernavaca', 'Morelos'),
(3329, '62325', 'Lomas Verdes de Ahuatepec', 'Cuernavaca', 'Morelos'),
(3330, '62325', 'Bosques de la Florida', 'Cuernavaca', 'Morelos'),
(3331, '62326', 'Paraíso Montessori', 'Cuernavaca', 'Morelos'),
(3332, '62326', 'Cerritos', 'Cuernavaca', 'Morelos'),
(3333, '62326', 'Paraíso', 'Cuernavaca', 'Morelos'),
(3334, '62326', 'San Antonio del Jagüey', 'Cuernavaca', 'Morelos'),
(3335, '62326', 'Jardines de Zoquipa', 'Cuernavaca', 'Morelos'),
(3336, '62326', 'Tlaltecuáhuitl', 'Cuernavaca', 'Morelos'),
(3337, '62326', 'Los Guayabos', 'Cuernavaca', 'Morelos'),
(3338, '62328', 'Antonio Barona 3a Secc.', 'Cuernavaca', 'Morelos'),
(3339, '62329', 'Antonio Barona 1a Secc.', 'Cuernavaca', 'Morelos'),
(3340, '62329', 'Antonio Barona 2a Secc.', 'Cuernavaca', 'Morelos'),
(3341, '62330', 'Delicias', 'Cuernavaca', 'Morelos'),
(3342, '62330', 'Conjunto Paraíso', 'Cuernavaca', 'Morelos'),
(3343, '62330', 'Residencial Primavera', 'Cuernavaca', 'Morelos'),
(3344, '62334', 'Amate Redondo', 'Cuernavaca', 'Morelos'),
(3345, '62335', 'Rinconada Vista Hermosa', 'Cuernavaca', 'Morelos'),
(3346, '62340', 'Bello Horizonte', 'Cuernavaca', 'Morelos'),
(3347, '62340', 'Lomas de Cortes Oriente', 'Cuernavaca', 'Morelos'),
(3348, '62340', 'Bosques de Cuernavaca', 'Cuernavaca', 'Morelos'),
(3349, '62340', 'Loma Bonita', 'Cuernavaca', 'Morelos'),
(3350, '62343', 'Jardines de Delicias', 'Cuernavaca', 'Morelos'),
(3351, '62343', 'Provincias del Canadá', 'Cuernavaca', 'Morelos'),
(3352, '62343', 'San Jerónimo Ahuatepec', 'Cuernavaca', 'Morelos'),
(3353, '62343', 'El Mascareño', 'Cuernavaca', 'Morelos'),
(3354, '62345', 'Rinconada Florida', 'Cuernavaca', 'Morelos'),
(3355, '62350', 'Los Volcanes', 'Cuernavaca', 'Morelos'),
(3356, '62350', 'Lomas del Mirador', 'Cuernavaca', 'Morelos'),
(3357, '62350', 'Teopanzolco', 'Cuernavaca', 'Morelos'),
(3358, '62360', 'Chapultepec', 'Cuernavaca', 'Morelos'),
(3359, '62360', 'Jardines de Cuernavaca', 'Cuernavaca', 'Morelos'),
(3360, '62363', 'Cuatro Estaciones', 'Cuernavaca', 'Morelos'),
(3361, '62363', 'La Estrella', 'Cuernavaca', 'Morelos'),
(3362, '62370', 'Ricardo Flores Magón', 'Cuernavaca', 'Morelos'),
(3363, '62373', 'Flores Magón 2a Fracción', 'Cuernavaca', 'Morelos'),
(3364, '62374', 'Villas Deportivas', 'Cuernavaca', 'Morelos'),
(3365, '62374', 'Villas del Lago', 'Cuernavaca', 'Morelos'),
(3366, '62375', 'Puerta del Sol', 'Cuernavaca', 'Morelos'),
(3367, '62376', 'Flores Magón 1a Fracción', 'Cuernavaca', 'Morelos'),
(3368, '62380', 'Zodiaco', 'Cuernavaca', 'Morelos'),
(3369, '62382', 'Joyas de los Jilgueros', 'Cuernavaca', 'Morelos'),
(3370, '62384', 'Mártires de Río Blanco', 'Cuernavaca', 'Morelos'),
(3371, '62384', 'Flores Magón 3a Fracción', 'Cuernavaca', 'Morelos'),
(3372, '62385', 'Ramón Hernandez Navarro', 'Cuernavaca', 'Morelos'),
(3373, '62385', 'Flores Magón 5a Fracción', 'Cuernavaca', 'Morelos'),
(3374, '62387', 'Santa Martha Ahuatepec', 'Cuernavaca', 'Morelos'),
(3375, '62387', 'Milpillas', 'Cuernavaca', 'Morelos'),
(3376, '62387', 'Ampliación Santa Martha', 'Cuernavaca', 'Morelos'),
(3377, '62388', 'Los Tulipanes', 'Cuernavaca', 'Morelos'),
(3378, '62389', 'Morelos', 'Cuernavaca', 'Morelos'),
(3379, '62390', 'Revolución', 'Cuernavaca', 'Morelos'),
(3380, '62398', 'Ciudad Chapultepec', 'Cuernavaca', 'Morelos'),
(3381, '62399', 'Ciudad Chapultepec', 'Cuernavaca', 'Morelos'),
(3382, '62400', 'El Vergel', 'Cuernavaca', 'Morelos'),
(3383, '62409', 'Santa Veracruz', 'Cuernavaca', 'Morelos'),
(3384, '62410', 'Amatitlán', 'Cuernavaca', 'Morelos'),
(3385, '62420', 'Jacarandas', 'Cuernavaca', 'Morelos'),
(3386, '62420', 'Quintas Martha', 'Cuernavaca', 'Morelos'),
(3387, '62428', 'Copa de Oro', 'Cuernavaca', 'Morelos'),
(3388, '62430', 'Condominios Cuauhnahuac', 'Cuernavaca', 'Morelos'),
(3389, '62430', 'Vicente Guerrero', 'Cuernavaca', 'Morelos'),
(3390, '62430', 'Conjunto Omeyoacan', 'Cuernavaca', 'Morelos'),
(3391, '62433', 'Bosques de Chapultepec', 'Cuernavaca', 'Morelos'),
(3392, '62440', 'Poblado Acapatzingo', 'Cuernavaca', 'Morelos'),
(3393, '62445', 'Los Cizos', 'Cuernavaca', 'Morelos'),
(3394, '62446', 'San Miguel Acapantzingo', 'Cuernavaca', 'Morelos'),
(3395, '62447', 'Jardines de Acapatzingo', 'Cuernavaca', 'Morelos'),
(3396, '62448', 'Cantarranas', 'Cuernavaca', 'Morelos'),
(3397, '62448', 'Primavera', 'Cuernavaca', 'Morelos'),
(3398, '62448', 'Cantarranas', 'Cuernavaca', 'Morelos'),
(3399, '62450', 'Las Quintas', 'Cuernavaca', 'Morelos'),
(3400, '62450', 'Chapultepec', 'Cuernavaca', 'Morelos'),
(3401, '62450', 'Manantiales', 'Cuernavaca', 'Morelos'),
(3402, '62460', 'El Laurel Residencial', 'Cuernavaca', 'Morelos'),
(3403, '62460', 'Las Granjas', 'Cuernavaca', 'Morelos'),
(3404, '62460', 'Satélite', 'Cuernavaca', 'Morelos'),
(3405, '62460', 'Vicente Estrada Cajigal', 'Cuernavaca', 'Morelos'),
(3406, '62460', 'Ampliación Satélite', 'Cuernavaca', 'Morelos'),
(3407, '62466', 'Emiliano Zapata', 'Cuernavaca', 'Morelos'),
(3408, '62469', 'Lotes Alegría', 'Cuernavaca', 'Morelos'),
(3409, '62470', 'Del Lago', 'Cuernavaca', 'Morelos'),
(3410, '62470', 'Las Águilas', 'Cuernavaca', 'Morelos'),
(3411, '62473', 'Lomas del Águila', 'Cuernavaca', 'Morelos'),
(3412, '62474', 'FOVISSSTE las Águilas', 'Cuernavaca', 'Morelos'),
(3413, '62474', 'Potrero Verde', 'Cuernavaca', 'Morelos'),
(3414, '62475', 'Chapultepec FOVISSSTE', 'Cuernavaca', 'Morelos'),
(3415, '62480', 'Ampliación Chapultepec', 'Cuernavaca', 'Morelos'),
(3416, '62490', 'Palmira Tinguindin', 'Cuernavaca', 'Morelos'),
(3417, '62493', 'Internado Palmira', 'Cuernavaca', 'Morelos'),
(3418, '62493', 'Acapatzingo', 'Cuernavaca', 'Morelos'),
(3419, '62494', 'El Salado', 'Cuernavaca', 'Morelos'),
(3420, '62494', 'Lomas de Acapatzingo', 'Cuernavaca', 'Morelos'),
(3421, '62496', 'El Palmar', 'Cuernavaca', 'Morelos'),
(3422, '62497', 'Rinconada Palmira', 'Cuernavaca', 'Morelos'),
(3423, '62498', 'Club de golf Tabachines', 'Cuernavaca', 'Morelos'),
(3424, '62499', 'Las Garzas', 'Cuernavaca', 'Morelos'),
(3425, '62507', 'Lázaro Cárdenas del Río', 'Cuernavaca', 'Morelos'),
(3426, '62507', 'Ampliación Lázaro Cárdenas del Río', 'Cuernavaca', 'Morelos'),
(3427, '62508', 'El Cebadal', 'Cuernavaca', 'Morelos'),
(3428, '62508', 'Buenavista del Monte', 'Cuernavaca', 'Morelos'),
(3429, '62510', 'Coajomulco', 'Huitzilac', 'Morelos'),
(3430, '62510', 'Huitzilac', 'Huitzilac', 'Morelos'),
(3431, '62510', 'San José de La Montaña', 'Huitzilac', 'Morelos'),
(3432, '62514', 'Fierro del Toro', 'Huitzilac', 'Morelos'),
(3433, '62514', 'Kilómetro 47 (Entrada al Capulín)', 'Huitzilac', 'Morelos'),
(3434, '62515', 'Tres Marías', 'Huitzilac', 'Morelos'),
(3435, '62517', 'Huertas de San Pedro', 'Huitzilac', 'Morelos'),
(3436, '62517', 'Monte Casino (Piamonte y Ensueño)', 'Huitzilac', 'Morelos'),
(3437, '62517', 'Guayacahuala', 'Huitzilac', 'Morelos'),
(3438, '62517', 'María Candelaria', 'Huitzilac', 'Morelos'),
(3439, '62520', 'Xilotepec', 'Tepoztlán', 'Morelos'),
(3440, '62520', 'Tepoztlán Centro', 'Tepoztlán', 'Morelos'),
(3441, '62520', 'Tierra Blanca', 'Tepoztlán', 'Morelos'),
(3442, '62520', 'San Pedro', 'Tepoztlán', 'Morelos'),
(3443, '62520', 'Los Reyes', 'Tepoztlán', 'Morelos'),
(3444, '62520', 'Santo Domingo', 'Tepoztlán', 'Morelos'),
(3445, '62520', 'La Santísima', 'Tepoztlán', 'Morelos'),
(3446, '62520', 'San Miguel', 'Tepoztlán', 'Morelos'),
(3447, '62520', 'San José', 'Tepoztlán', 'Morelos'),
(3448, '62520', 'San Sebastián', 'Tepoztlán', 'Morelos'),
(3449, '62520', 'Santa Cruz', 'Tepoztlán', 'Morelos'),
(3450, '62520', 'El Tesoro', 'Tepoztlán', 'Morelos'),
(3451, '62520', 'Los Ocotes', 'Tepoztlán', 'Morelos'),
(3452, '62523', 'San Juan Tlacotenco', 'Tepoztlán', 'Morelos'),
(3453, '62524', 'Santo Domingo Ocotitlán', 'Tepoztlán', 'Morelos'),
(3454, '62524', 'Del Carmen', 'Tepoztlán', 'Morelos'),
(3455, '62524', 'Achichipico', 'Tepoztlán', 'Morelos'),
(3456, '62525', 'Huilotepec', 'Tepoztlán', 'Morelos'),
(3457, '62525', 'Ixcatepec', 'Tepoztlán', 'Morelos'),
(3458, '62525', 'Amatlán de Quetzalcóatl', 'Tepoztlán', 'Morelos'),
(3459, '62525', 'Tecmilco', 'Tepoztlán', 'Morelos'),
(3460, '62525', 'El Pedregal', 'Tepoztlán', 'Morelos'),
(3461, '62525', 'Chichco (Chisco)', 'Tepoztlán', 'Morelos'),
(3462, '62526', 'San Andrés de la Cal', 'Tepoztlán', 'Morelos'),
(3463, '62526', 'Santiago Tepetlapa', 'Tepoztlán', 'Morelos'),
(3464, '62526', 'Tehuixcorral (Colonia San Martín Caballero)', 'Tepoztlán', 'Morelos'),
(3465, '62527', 'Santa Catarina', 'Tepoztlán', 'Morelos'),
(3466, '62527', 'Huachinantitla', 'Tepoztlán', 'Morelos'),
(3467, '62528', 'Ángel Bocanegra (Adolfo López Mateos)', 'Tepoztlán', 'Morelos'),
(3468, '62528', 'Obrera', 'Tepoztlán', 'Morelos'),
(3469, '62528', 'Benito Juárez', 'Tepoztlán', 'Morelos'),
(3470, '62529', 'Rinconada Acolapa', 'Tepoztlán', 'Morelos'),
(3471, '62529', 'Acolapan', 'Tepoztlán', 'Morelos'),
(3472, '62529', 'Loma Bonita', 'Tepoztlán', 'Morelos'),
(3473, '62529', 'Lomas del Pedregal', 'Tepoztlán', 'Morelos'),
(3474, '62529', 'Loma Esmeralda', 'Tepoztlán', 'Morelos'),
(3475, '62529', 'Tetecolala', 'Tepoztlán', 'Morelos'),
(3476, '62530', 'Centro Tlalnepantla', 'Tlalnepantla', 'Morelos'),
(3477, '62530', 'San Felipe', 'Tlalnepantla', 'Morelos'),
(3478, '62530', 'San Pedro', 'Tlalnepantla', 'Morelos'),
(3479, '62530', 'Santiago', 'Tlalnepantla', 'Morelos'),
(3480, '62530', 'San Bartolo', 'Tlalnepantla', 'Morelos'),
(3481, '62530', 'San Nicolás', 'Tlalnepantla', 'Morelos'),
(3482, '62534', 'El Pedregal', 'Tlalnepantla', 'Morelos'),
(3483, '62535', 'El Vigía (San Nicolás del Monte)', 'Tlalnepantla', 'Morelos'),
(3484, '62535', 'Colinas de San Nicolás', 'Tlalnepantla', 'Morelos'),
(3485, '62535', 'Los Robles', 'Tlalnepantla', 'Morelos'),
(3486, '62536', 'Felipe Neri (Cuatepec)', 'Tlalnepantla', 'Morelos'),
(3487, '62536', 'El Calmil', 'Tlalnepantla', 'Morelos'),
(3488, '62540', 'Tlayacapan', 'Tlayacapan', 'Morelos'),
(3489, '62543', 'Cuauhtempan (San Andrés Cuautempan)', 'Tlayacapan', 'Morelos'),
(3490, '62543', 'Tres de Mayo', 'Tlayacapan', 'Morelos'),
(3491, '62543', 'La Mixtepec', 'Tlayacapan', 'Morelos'),
(3492, '62543', 'Emiliano Zapata', 'Tlayacapan', 'Morelos'),
(3493, '62544', 'Pedregal Tlalli', 'Tlayacapan', 'Morelos'),
(3494, '62544', 'Las Calandrias', 'Tlayacapan', 'Morelos'),
(3495, '62544', 'Camino Real los Reyes', 'Tlayacapan', 'Morelos'),
(3496, '62544', 'Joyas del Astillero', 'Tlayacapan', 'Morelos'),
(3497, '62544', 'Jardines de Tlayacapan', 'Tlayacapan', 'Morelos'),
(3498, '62544', 'Valle de Oaxtepec', 'Tlayacapan', 'Morelos'),
(3499, '62544', 'Nacatongo', 'Tlayacapan', 'Morelos'),
(3500, '62544', 'Texalo (La Cerámica)', 'Tlayacapan', 'Morelos'),
(3501, '62544', 'Lázaro Cárdenas', 'Tlayacapan', 'Morelos'),
(3502, '62545', 'El Bebedero', 'Tlayacapan', 'Morelos'),
(3503, '62545', 'Puente Pantitlán', 'Tlayacapan', 'Morelos'),
(3504, '62545', 'Revolución XXI', 'Tlayacapan', 'Morelos'),
(3505, '62545', 'Ex-Hacienda Pantitlán', 'Tlayacapan', 'Morelos'),
(3506, '62545', 'El Partidor', 'Tlayacapan', 'Morelos'),
(3507, '62546', 'Las Vivianas', 'Tlayacapan', 'Morelos'),
(3508, '62546', 'El Golán', 'Tlayacapan', 'Morelos'),
(3509, '62546', 'El Ahuehuete', 'Tlayacapan', 'Morelos'),
(3510, '62547', 'Los Laureles (San José de los Laureles)', 'Tlayacapan', 'Morelos'),
(3511, '62547', 'Amatlipac (San Agustín Amatlipac)', 'Tlayacapan', 'Morelos'),
(3512, '62547', 'Los Ciruelos', 'Tlayacapan', 'Morelos'),
(3513, '62547', 'Cruz Blanca', 'Tlayacapan', 'Morelos'),
(3514, '62550', 'Centro Jiutepec', 'Jiutepec', 'Morelos'),
(3515, '62550', 'Roberto Osorio Sosa', 'Jiutepec', 'Morelos'),
(3516, '62550', 'Valle de las Fuentes', 'Jiutepec', 'Morelos'),
(3517, '62550', 'Los Almendros', 'Jiutepec', 'Morelos'),
(3518, '62550', 'El Zapote', 'Jiutepec', 'Morelos'),
(3519, '62553', 'Constitución', 'Jiutepec', 'Morelos'),
(3520, '62553', 'Residencial Campestre', 'Jiutepec', 'Morelos'),
(3521, '62553', 'Tlahuapan', 'Jiutepec', 'Morelos'),
(3522, '62553', 'Residencial La Palma', 'Jiutepec', 'Morelos'),
(3523, '62553', 'Moctezuma', 'Jiutepec', 'Morelos'),
(3524, '62553', 'Insurgentes', 'Jiutepec', 'Morelos'),
(3525, '62553', 'La Rosa', 'Jiutepec', 'Morelos'),
(3526, '62553', 'Lázaro Cárdenas', 'Jiutepec', 'Morelos'),
(3527, '62553', 'Rinconada las Palmas', 'Jiutepec', 'Morelos'),
(3528, '62553', 'El Arroyo', 'Jiutepec', 'Morelos'),
(3529, '62553', 'Lirios', 'Jiutepec', 'Morelos'),
(3530, '62553', 'Bambú', 'Jiutepec', 'Morelos'),
(3531, '62553', 'Residencial Country', 'Jiutepec', 'Morelos'),
(3532, '62553', 'Tlahua', 'Jiutepec', 'Morelos'),
(3533, '62553', 'Arcos de Jiutepec', 'Jiutepec', 'Morelos'),
(3534, '62553', 'Villa Real', 'Jiutepec', 'Morelos'),
(3535, '62553', 'Campestre', 'Jiutepec', 'Morelos'),
(3536, '62554', 'Villas del Descanso', 'Jiutepec', 'Morelos'),
(3537, '62554', 'Lomas de Tlahuapan', 'Jiutepec', 'Morelos'),
(3538, '62554', 'Pedregal de las Fuentes', 'Jiutepec', 'Morelos'),
(3539, '62554', 'El Pochotal', 'Jiutepec', 'Morelos'),
(3540, '62554', 'Los Bosques', 'Jiutepec', 'Morelos'),
(3541, '62554', 'La Cerillera', 'Jiutepec', 'Morelos'),
(3542, '62554', 'Valle Verde', 'Jiutepec', 'Morelos'),
(3543, '62554', 'Rancho Paraíso', 'Jiutepec', 'Morelos'),
(3544, '62554', 'La Alameda', 'Jiutepec', 'Morelos'),
(3545, '62554', 'Los Mangos', 'Jiutepec', 'Morelos'),
(3546, '62554', 'Cactus', 'Jiutepec', 'Morelos'),
(3547, '62554', 'Girasoles', 'Jiutepec', 'Morelos'),
(3548, '62554', 'Hacienda Jiutepec', 'Jiutepec', 'Morelos'),
(3549, '62554', 'Las Fuentes', 'Jiutepec', 'Morelos'),
(3550, '62554', 'Fuentes de Oriente', 'Jiutepec', 'Morelos'),
(3551, '62555', 'Cliserio Alanís (San Gaspar)', 'Jiutepec', 'Morelos'),
(3552, '62555', 'San Gaspar', 'Jiutepec', 'Morelos'),
(3553, '62555', 'Club de Golf Hacienda San Gaspar', 'Jiutepec', 'Morelos'),
(3554, '62555', 'Agua Fría', 'Jiutepec', 'Morelos'),
(3555, '62555', 'San Lucas', 'Jiutepec', 'Morelos'),
(3556, '62555', 'Maravillas', 'Jiutepec', 'Morelos'),
(3557, '62555', 'Calera Oriente', 'Jiutepec', 'Morelos'),
(3558, '62555', 'Llanos de las Fuentes', 'Jiutepec', 'Morelos'),
(3559, '62555', 'El Naranjo', 'Jiutepec', 'Morelos'),
(3560, '62555', 'Francisco Villa', 'Jiutepec', 'Morelos'),
(3561, '62555', 'Emiliano Zapata', 'Jiutepec', 'Morelos'),
(3562, '62555', 'Esmeralda', 'Jiutepec', 'Morelos'),
(3563, '62555', 'El Campanario', 'Jiutepec', 'Morelos'),
(3564, '62556', 'Calera Chica', 'Jiutepec', 'Morelos'),
(3565, '62556', 'Miguel Hidalgo', 'Jiutepec', 'Morelos'),
(3566, '62556', 'Vista Hermosa', 'Jiutepec', 'Morelos'),
(3567, '62556', '28 de Agosto', 'Jiutepec', 'Morelos'),
(3568, '62556', 'Ampliación 28 de Agosto', 'Jiutepec', 'Morelos'),
(3569, '62556', 'Calera Poniente', 'Jiutepec', 'Morelos'),
(3570, '62556', 'Ampliación Joyas de Agua', 'Jiutepec', 'Morelos'),
(3571, '62556', 'Joya del Agua', 'Jiutepec', 'Morelos'),
(3572, '62556', 'Huertas del Llano', 'Jiutepec', 'Morelos'),
(3573, '62556', 'Acalli', 'Jiutepec', 'Morelos'),
(3574, '62556', 'Villa Santiago', 'Jiutepec', 'Morelos'),
(3575, '62556', 'La Laja', 'Jiutepec', 'Morelos'),
(3576, '62556', 'La Huizachera', 'Jiutepec', 'Morelos'),
(3577, '62556', 'Las Moras I y II', 'Jiutepec', 'Morelos'),
(3578, '62560', 'Atlacomulco', 'Jiutepec', 'Morelos'),
(3579, '62560', 'Santa Anita', 'Jiutepec', 'Morelos'),
(3580, '62560', 'Los Viveros', 'Jiutepec', 'Morelos'),
(3581, '62560', 'Los Apantles', 'Jiutepec', 'Morelos'),
(3582, '62563', 'Real Hacienda de San José', 'Jiutepec', 'Morelos'),
(3583, '62563', 'Sumiya', 'Jiutepec', 'Morelos'),
(3584, '62563', 'Los Pinos Jiutepec', 'Jiutepec', 'Morelos'),
(3585, '62563', 'Kloster Sumiya', 'Jiutepec', 'Morelos'),
(3586, '62563', 'Los Soles', 'Jiutepec', 'Morelos'),
(3587, '62564', 'José G Parres', 'Jiutepec', 'Morelos'),
(3588, '62564', 'Las Mercedes', 'Jiutepec', 'Morelos'),
(3589, '62564', 'Los Electricistas', 'Jiutepec', 'Morelos'),
(3590, '62564', 'Residencial Sumiya', 'Jiutepec', 'Morelos'),
(3591, '62564', 'Jardines de La Hacienda II', 'Jiutepec', 'Morelos'),
(3592, '62564', 'Guadalupe', 'Jiutepec', 'Morelos'),
(3593, '62564', 'Jardines de La Hacienda I', 'Jiutepec', 'Morelos'),
(3594, '62564', 'El Paraíso', 'Jiutepec', 'Morelos'),
(3595, '62564', 'El Castillo', 'Jiutepec', 'Morelos'),
(3596, '62564', 'La Nopalera', 'Jiutepec', 'Morelos'),
(3597, '62564', 'San Cristóbal los Lirios', 'Jiutepec', 'Morelos'),
(3598, '62564', 'Villa Real los Colorines', 'Jiutepec', 'Morelos'),
(3599, '62565', 'Las Canteras', 'Jiutepec', 'Morelos'),
(3600, '62565', 'Las Fincas', 'Jiutepec', 'Morelos'),
(3601, '62565', 'La Joya', 'Jiutepec', 'Morelos'),
(3602, '62565', 'Zaragoza', 'Jiutepec', 'Morelos'),
(3603, '62565', 'Atuey', 'Jiutepec', 'Morelos'),
(3604, '62565', 'El Guayabal', 'Jiutepec', 'Morelos'),
(3605, '62565', 'Conjunto la Loma', 'Jiutepec', 'Morelos'),
(3606, '62565', 'Condominio Tepec', 'Jiutepec', 'Morelos'),
(3607, '62565', 'Xel-ha', 'Jiutepec', 'Morelos'),
(3608, '62566', 'Lomas de Jiutepec', 'Jiutepec', 'Morelos'),
(3609, '62566', 'Lomas de Palmira', 'Jiutepec', 'Morelos'),
(3610, '62566', 'Huertas del Jacal', 'Jiutepec', 'Morelos'),
(3611, '62566', 'Rinconada Palmira', 'Jiutepec', 'Morelos'),
(3612, '62566', 'Imuri', 'Jiutepec', 'Morelos'),
(3613, '62566', 'Residencial Lomas de Jiutepec', 'Jiutepec', 'Morelos'),
(3614, '62566', 'De los Casillas', 'Jiutepec', 'Morelos'),
(3615, '62566', 'Tezontepec', 'Jiutepec', 'Morelos'),
(3616, '62570', 'Pedregal de Tejalpa', 'Jiutepec', 'Morelos'),
(3617, '62570', 'Oriental', 'Jiutepec', 'Morelos'),
(3618, '62570', 'Tejalpa', 'Jiutepec', 'Morelos'),
(3619, '62570', 'Ampliación Tejalpa', 'Jiutepec', 'Morelos'),
(3620, '62570', 'Vicente Guerrero', 'Jiutepec', 'Morelos'),
(3621, '62570', 'Ampliación Vicente Guerrero', 'Jiutepec', 'Morelos'),
(3622, '62570', 'Atenatitlán', 'Jiutepec', 'Morelos'),
(3623, '62570', 'Cuauhtémoc Cárdenas', 'Jiutepec', 'Morelos'),
(3624, '62570', 'Los Pinos Tejalpa', 'Jiutepec', 'Morelos'),
(3625, '62570', 'San Isidro', 'Jiutepec', 'Morelos'),
(3626, '62570', 'Las Torres', 'Jiutepec', 'Morelos'),
(3627, '62570', 'Deportiva', 'Jiutepec', 'Morelos'),
(3628, '62570', 'Real el Cazahuate', 'Jiutepec', 'Morelos'),
(3629, '62570', 'El Capiri', 'Jiutepec', 'Morelos'),
(3630, '62570', 'Josefa Ortiz de Domínguez', 'Jiutepec', 'Morelos'),
(3631, '62570', 'Villas de Cortes', 'Jiutepec', 'Morelos'),
(3632, '62573', 'Apatlaco', 'Jiutepec', 'Morelos'),
(3633, '62573', 'El Paraíso', 'Jiutepec', 'Morelos'),
(3634, '62573', 'San Lucas', 'Jiutepec', 'Morelos'),
(3635, '62573', 'El Paraje Texcal', 'Jiutepec', 'Morelos'),
(3636, '62573', 'Hacienda de las Flores', 'Jiutepec', 'Morelos'),
(3637, '62573', 'San Francisco Texcalpa', 'Jiutepec', 'Morelos'),
(3638, '62573', 'Ojo de Agua', 'Jiutepec', 'Morelos'),
(3639, '62573', 'Campo Morado', 'Jiutepec', 'Morelos'),
(3640, '62573', 'Cuauchiles', 'Jiutepec', 'Morelos'),
(3641, '62573', 'Ampliación El Paraíso', 'Jiutepec', 'Morelos'),
(3642, '62574', 'Progreso', 'Jiutepec', 'Morelos'),
(3643, '62574', 'Tamoanchan', 'Jiutepec', 'Morelos'),
(3644, '62574', 'José López Portillo', 'Jiutepec', 'Morelos'),
(3645, '62574', 'San José', 'Jiutepec', 'Morelos'),
(3646, '62574', 'La Mesa', 'Jiutepec', 'Morelos'),
(3647, '62574', 'Lomas del Texcal', 'Jiutepec', 'Morelos'),
(3648, '62575', 'Independencia', 'Jiutepec', 'Morelos'),
(3649, '62575', 'Alfredo V Bonfil', 'Jiutepec', 'Morelos'),
(3650, '62575', 'Cerro de la Corona', 'Jiutepec', 'Morelos'),
(3651, '62575', 'Lomas de Chapultepec', 'Jiutepec', 'Morelos'),
(3652, '62575', 'Luis Donaldo Colosio', 'Jiutepec', 'Morelos'),
(3653, '62576', 'Ampliación Chapultepec', 'Jiutepec', 'Morelos'),
(3654, '62576', 'Jardín Juárez', 'Jiutepec', 'Morelos'),
(3655, '62576', 'San Francisco del Rincón', 'Jiutepec', 'Morelos'),
(3656, '62576', 'Loma Bonita', 'Jiutepec', 'Morelos'),
(3657, '62577', 'Otilio Montaño', 'Jiutepec', 'Morelos'),
(3658, '62577', 'Ampliación Otilio Montaño', 'Jiutepec', 'Morelos'),
(3659, '62577', 'El Porvenir', 'Jiutepec', 'Morelos'),
(3660, '62577', 'Tarianes', 'Jiutepec', 'Morelos'),
(3661, '62577', 'Ampliación Bugambilias', 'Jiutepec', 'Morelos'),
(3662, '62577', 'Bugambilias', 'Jiutepec', 'Morelos'),
(3663, '62577', 'Morelos', 'Jiutepec', 'Morelos'),
(3664, '62577', 'Puente Blanco', 'Jiutepec', 'Morelos'),
(3665, '62577', 'El Edén', 'Jiutepec', 'Morelos'),
(3666, '62578', 'CIVAC', 'Jiutepec', 'Morelos'),
(3667, '62578', 'Sección Kovas', 'Jiutepec', 'Morelos'),
(3668, '62578', 'Narciso Mendoza Terreno Uno', 'Jiutepec', 'Morelos'),
(3669, '62578', 'Narciso Mendoza Terreno Dos', 'Jiutepec', 'Morelos'),
(3670, '62578', 'CIVAC los Robles', 'Jiutepec', 'Morelos'),
(3671, '62578', 'CIVAC 2a Sección', 'Jiutepec', 'Morelos'),
(3672, '62578', 'CIVAC 1a Sección', 'Jiutepec', 'Morelos'),
(3673, '62580', 'Temixco Centro', 'Temixco', 'Morelos'),
(3674, '62583', 'Lomas de Guadalupe', 'Temixco', 'Morelos'),
(3675, '62583', 'Alta Palmira', 'Temixco', 'Morelos'),
(3676, '62583', 'Las Ánimas', 'Temixco', 'Morelos'),
(3677, '62583', 'Lomas del Carril', 'Temixco', 'Morelos'),
(3678, '62583', 'Los Presidentes', 'Temixco', 'Morelos'),
(3679, '62583', 'Rinconada los Sauces', 'Temixco', 'Morelos'),
(3680, '62583', 'Quetzal', 'Temixco', 'Morelos'),
(3681, '62584', 'Burgos', 'Temixco', 'Morelos'),
(3682, '62584', 'Lomas de Cuernavaca', 'Temixco', 'Morelos'),
(3683, '62584', 'Brisas', 'Temixco', 'Morelos'),
(3684, '62584', 'Junto al Río', 'Temixco', 'Morelos'),
(3685, '62584', 'Valle Verde', 'Temixco', 'Morelos'),
(3686, '62584', 'Burgos Bugambilias', 'Temixco', 'Morelos'),
(3687, '62584', 'Burgos Sección Ontario', 'Temixco', 'Morelos'),
(3688, '62584', 'Burgos Sección Casa Blanca', 'Temixco', 'Morelos'),
(3689, '62584', 'Los Sabinos', 'Temixco', 'Morelos'),
(3690, '62584', 'Rinconada del Río', 'Temixco', 'Morelos'),
(3691, '62585', 'Vergel Santa Cruz', 'Temixco', 'Morelos'),
(3692, '62585', 'Granjas Mérida', 'Temixco', 'Morelos'),
(3693, '62585', 'Miguel Hidalgo', 'Temixco', 'Morelos'),
(3694, '62585', 'Campo Sotelo', 'Temixco', 'Morelos'),
(3695, '62585', 'Geo Villas la Hacienda', 'Temixco', 'Morelos'),
(3696, '62585', 'Valparaíso', 'Temixco', 'Morelos'),
(3697, '62586', 'Acatlipa Centro', 'Temixco', 'Morelos'),
(3698, '62586', 'Río Apatlaco', 'Temixco', 'Morelos'),
(3699, '62586', 'Los Arcos', 'Temixco', 'Morelos'),
(3700, '62586', 'Las Rosas', 'Temixco', 'Morelos'),
(3701, '62586', 'Los Sabinos', 'Temixco', 'Morelos'),
(3702, '62586', 'Río Escondido', 'Temixco', 'Morelos'),
(3703, '62586', 'Lomas de Acatlipa', 'Temixco', 'Morelos'),
(3704, '62586', 'La Rivera', 'Temixco', 'Morelos'),
(3705, '62586', 'Emiliano Zapata', 'Temixco', 'Morelos'),
(3706, '62586', 'La Hacienda de Temixco', 'Temixco', 'Morelos'),
(3707, '62586', 'Río Apatlaco 2a Sección', 'Temixco', 'Morelos'),
(3708, '62586', 'La Islita', 'Temixco', 'Morelos'),
(3709, '62586', 'Ampliación Adolfo López Mateos', 'Temixco', 'Morelos'),
(3710, '62586', 'Real Santa Cruz', 'Temixco', 'Morelos'),
(3711, '62587', '10 de Abril', 'Temixco', 'Morelos'),
(3712, '62587', 'Rubén Jaramillo', 'Temixco', 'Morelos'),
(3713, '62587', 'Casa Blanca', 'Temixco', 'Morelos'),
(3714, '62587', 'El Estribo', 'Temixco', 'Morelos'),
(3715, '62587', 'Arboledas', 'Temixco', 'Morelos'),
(3716, '62587', 'Bugambilias', 'Temixco', 'Morelos'),
(3717, '62587', 'Campamento Medrano', 'Temixco', 'Morelos'),
(3718, '62587', 'La Nopalera', 'Temixco', 'Morelos'),
(3719, '62588', 'Conjunto Habitacional Campo Verde', 'Temixco', 'Morelos'),
(3720, '62588', 'Colinas de Altar', 'Temixco', 'Morelos'),
(3721, '62588', 'Pueblo Viejo', 'Temixco', 'Morelos'),
(3722, '62588', 'Morelos', 'Temixco', 'Morelos'),
(3723, '62588', 'Pilcaya', 'Temixco', 'Morelos'),
(3724, '62588', 'Azteca', 'Temixco', 'Morelos'),
(3725, '62588', 'Lauro Ortega', 'Temixco', 'Morelos'),
(3726, '62588', 'Conjunto Urbano Ayuntamiento 2000', 'Temixco', 'Morelos'),
(3727, '62588', 'El Deshuesadero', 'Temixco', 'Morelos'),
(3728, '62588', 'Loma Bonita', 'Temixco', 'Morelos'),
(3729, '62588', 'Lomas del Ajonjolinar', 'Temixco', 'Morelos'),
(3730, '62590', 'Aeropuerto', 'Temixco', 'Morelos'),
(3731, '62590', 'Laureles', 'Temixco', 'Morelos'),
(3732, '62590', 'Santa Mónica', 'Temixco', 'Morelos'),
(3733, '62593', 'Benito Juárez (La Monera)', 'Temixco', 'Morelos'),
(3734, '62594', 'San Agustín Tetlama', 'Temixco', 'Morelos'),
(3735, '62595', 'Santa Úrsula', 'Temixco', 'Morelos'),
(3736, '62595', 'Solidaridad', 'Temixco', 'Morelos'),
(3737, '62595', 'Eterna Primavera', 'Temixco', 'Morelos'),
(3738, '62595', 'La Parota', 'Temixco', 'Morelos'),
(3739, '62596', 'Cuentepec', 'Temixco', 'Morelos'),
(3740, '62599', 'Cuernavaca (Mariano Matamoros)', 'Temixco', 'Morelos'),
(3741, '62600', 'Miacatlán', 'Miacatlán', 'Morelos'),
(3742, '62600', 'Álvaro Obregón', 'Miacatlán', 'Morelos'),
(3743, '62600', 'Vista Hermosa', 'Miacatlán', 'Morelos'),
(3744, '62600', 'La Campesina (Colonia los Tulipanes)', 'Miacatlán', 'Morelos'),
(3745, '62605', 'Brisas de Miacatlán', 'Miacatlán', 'Morelos'),
(3746, '62605', 'La Toma', 'Miacatlán', 'Morelos'),
(3747, '62605', 'El Rodeo', 'Miacatlán', 'Morelos'),
(3748, '62605', 'Xochicalco (Cirenio Longares)', 'Miacatlán', 'Morelos'),
(3749, '62605', 'El Mirador', 'Miacatlán', 'Morelos'),
(3750, '62605', 'Emiliano Zapata', 'Miacatlán', 'Morelos'),
(3751, '62605', 'Los Linares', 'Miacatlán', 'Morelos'),
(3752, '62605', 'El Amate Amarillo', 'Miacatlán', 'Morelos'),
(3753, '62605', 'Mejapa (El Puente Colorado)', 'Miacatlán', 'Morelos'),
(3754, '62606', 'Coatetelco Centro', 'Coatetelco', 'Morelos'),
(3755, '62606', 'Campo Acatzingo', 'Coatetelco', 'Morelos'),
(3756, '62606', 'El Llano', 'Coatetelco', 'Morelos'),
(3757, '62606', 'El Muelle', 'Coatetelco', 'Morelos'),
(3758, '62606', 'General Pedro Saavedra', 'Coatetelco', 'Morelos'),
(3759, '62606', '3 de Mayo', 'Coatetelco', 'Morelos'),
(3760, '62606', 'Benito Juárez', 'Coatetelco', 'Morelos'),
(3761, '62606', 'Narvarte', 'Coatetelco', 'Morelos'),
(3762, '62607', 'El Terrero', 'Miacatlán', 'Morelos'),
(3763, '62607', 'El Tejón', 'Miacatlán', 'Morelos'),
(3764, '62607', 'Terrero Grande', 'Miacatlán', 'Morelos'),
(3765, '62607', 'La Lima (El Trapiche de Luna)', 'Miacatlán', 'Morelos'),
(3766, '62607', 'Atzompa', 'Miacatlán', 'Morelos'),
(3767, '62607', 'Huertos de Miacatlán', 'Miacatlán', 'Morelos'),
(3768, '62607', 'Atzompa', 'Miacatlán', 'Morelos'),
(3769, '62607', 'La Trilla', 'Miacatlán', 'Morelos'),
(3770, '62608', 'Palo Grande', 'Miacatlán', 'Morelos'),
(3771, '62608', 'Palpan de Baranda', 'Miacatlán', 'Morelos'),
(3772, '62608', 'Tlajotla', 'Miacatlán', 'Morelos'),
(3773, '62608', 'El Paredón', 'Miacatlán', 'Morelos'),
(3774, '62608', 'El Rincón', 'Miacatlán', 'Morelos'),
(3775, '62608', 'Rancho Viejo', 'Miacatlán', 'Morelos'),
(3776, '62610', 'Coatlán del Río', 'Coatlán del Río', 'Morelos'),
(3777, '62613', 'Buenavista de Aldama', 'Coatlán del Río', 'Morelos'),
(3778, '62613', 'San José', 'Coatlán del Río', 'Morelos'),
(3779, '62613', 'Tezoquipa', 'Coatlán del Río', 'Morelos'),
(3780, '62614', 'Apancingo', 'Coatlán del Río', 'Morelos'),
(3781, '62614', 'Chavarría', 'Coatlán del Río', 'Morelos'),
(3782, '62614', 'Michapa', 'Coatlán del Río', 'Morelos'),
(3783, '62614', 'Benito Juárez', 'Coatlán del Río', 'Morelos'),
(3784, '62614', 'Cuernavaquita', 'Coatlán del Río', 'Morelos'),
(3785, '62615', 'Tilancingo', 'Coatlán del Río', 'Morelos'),
(3786, '62615', 'Santa Márgara', 'Coatlán del Río', 'Morelos'),
(3787, '62615', 'San Antonio', 'Coatlán del Río', 'Morelos'),
(3788, '62615', 'El Vado', 'Coatlán del Río', 'Morelos'),
(3789, '62615', 'El Axixintle (El Treinta y Cinco)', 'Coatlán del Río', 'Morelos'),
(3790, '62616', 'Cuauhtémoc', 'Coatlán del Río', 'Morelos'),
(3791, '62616', 'Cocoyotla', 'Coatlán del Río', 'Morelos'),
(3792, '62616', 'Morelos', 'Coatlán del Río', 'Morelos'),
(3793, '62616', 'El Amate', 'Coatlán del Río', 'Morelos'),
(3794, '62616', 'El Cerrito', 'Coatlán del Río', 'Morelos'),
(3795, '62616', 'El Canelillo', 'Coatlán del Río', 'Morelos'),
(3796, '62616', 'Puente el Arenal (La Joya)', 'Coatlán del Río', 'Morelos'),
(3797, '62620', 'Tetecala', 'Tetecala', 'Morelos'),
(3798, '62623', 'El Cerrito (Cerrito de las Cruces)', 'Tetecala', 'Morelos'),
(3799, '62624', 'Sonora', 'Tetecala', 'Morelos'),
(3800, '62624', 'El Charco', 'Tetecala', 'Morelos'),
(3801, '62624', 'Actopan', 'Tetecala', 'Morelos'),
(3802, '62624', 'Llano Viejo', 'Tetecala', 'Morelos'),
(3803, '62625', 'Cuautlita', 'Tetecala', 'Morelos'),
(3804, '62625', 'Francisco Sarabia', 'Tetecala', 'Morelos'),
(3805, '62625', 'El Aguacate', 'Tetecala', 'Morelos'),
(3806, '62625', 'El Calicanto', 'Tetecala', 'Morelos'),
(3807, '62625', 'Mariano Matamoros', 'Tetecala', 'Morelos'),
(3808, '62625', 'Tonantzicalli', 'Tetecala', 'Morelos'),
(3809, '62626', 'Contlalco', 'Tetecala', 'Morelos'),
(3810, '62626', 'El Móvil', 'Tetecala', 'Morelos'),
(3811, '62626', 'Palos de Fierro', 'Tetecala', 'Morelos'),
(3812, '62630', 'Centro Mazatepec', 'Mazatepec', 'Morelos'),
(3813, '62633', 'Puentes de Fierro', 'Mazatepec', 'Morelos'),
(3814, '62633', 'El Florido', 'Mazatepec', 'Morelos'),
(3815, '62633', 'Valle Verde', 'Mazatepec', 'Morelos'),
(3816, '62634', 'Justo Sierra', 'Mazatepec', 'Morelos'),
(3817, '62634', 'Vista Hermosa', 'Mazatepec', 'Morelos'),
(3818, '62635', 'Cuauchichinola', 'Mazatepec', 'Morelos'),
(3819, '62635', 'La Vuelta', 'Mazatepec', 'Morelos'),
(3820, '62635', 'Carmelo Rivera', 'Mazatepec', 'Morelos'),
(3821, '62635', 'Ojos de Agua de Cuahuchichinola', 'Mazatepec', 'Morelos'),
(3822, '62636', 'Santa Cruz Vista Alegre', 'Mazatepec', 'Morelos'),
(3823, '62636', 'El Calvario', 'Mazatepec', 'Morelos'),
(3824, '62636', 'Lomas del Calvario', 'Mazatepec', 'Morelos'),
(3825, '62636', 'La Melena', 'Mazatepec', 'Morelos'),
(3826, '62636', 'Lomas de Mazatepec', 'Mazatepec', 'Morelos'),
(3827, '62636', 'Las Huertas', 'Mazatepec', 'Morelos'),
(3828, '62636', 'La Trilla', 'Mazatepec', 'Morelos'),
(3829, '62640', 'Amacuzac', 'Amacuzac', 'Morelos'),
(3830, '62643', 'Progreso', 'Amacuzac', 'Morelos'),
(3831, '62643', 'El Paraíso', 'Amacuzac', 'Morelos'),
(3832, '62643', 'Benito Juárez', 'Amacuzac', 'Morelos'),
(3833, '62643', 'Miguel Hidalgo', 'Amacuzac', 'Morelos'),
(3834, '62643', 'Barreal', 'Amacuzac', 'Morelos'),
(3835, '62644', 'El Balceadero', 'Amacuzac', 'Morelos'),
(3836, '62644', 'Bungalows', 'Amacuzac', 'Morelos'),
(3837, '62644', 'Los Ángeles', 'Amacuzac', 'Morelos'),
(3838, '62644', 'La Glorieta', 'Amacuzac', 'Morelos'),
(3839, '62645', 'Xoapa', 'Amacuzac', 'Morelos'),
(3840, '62646', 'San Gabriel las Palmas', 'Amacuzac', 'Morelos'),
(3841, '62646', 'Ocampo', 'Amacuzac', 'Morelos'),
(3842, '62646', 'Los Baños de Tula', 'Amacuzac', 'Morelos'),
(3843, '62646', 'La Cruz', 'Amacuzac', 'Morelos'),
(3844, '62646', 'Tula', 'Amacuzac', 'Morelos'),
(3845, '62646', 'Cuauhtémoc', 'Amacuzac', 'Morelos'),
(3846, '62646', 'Las Flores', 'Amacuzac', 'Morelos'),
(3847, '62646', 'El Mirador', 'Amacuzac', 'Morelos'),
(3848, '62647', 'Miahuatlán (El Cuiji)', 'Amacuzac', 'Morelos'),
(3849, '62647', 'El Paso de Miahuatlán', 'Amacuzac', 'Morelos'),
(3850, '62653', 'Coahuixtla', 'Amacuzac', 'Morelos'),
(3851, '62653', 'Cajones', 'Amacuzac', 'Morelos'),
(3852, '62653', 'Rancho Nuevo', 'Amacuzac', 'Morelos'),
(3853, '62653', 'El Rosal (El Alacrán)', 'Amacuzac', 'Morelos'),
(3854, '62653', 'Oriental', 'Amacuzac', 'Morelos'),
(3855, '62653', 'Campo Nuevo', 'Amacuzac', 'Morelos'),
(3856, '62653', 'Los Arcos', 'Amacuzac', 'Morelos'),
(3857, '62653', 'Zoquital', 'Amacuzac', 'Morelos'),
(3858, '62654', 'Casahuatlán', 'Amacuzac', 'Morelos'),
(3859, '62654', 'Ojo de Agua', 'Amacuzac', 'Morelos'),
(3860, '62654', 'El Campamento', 'Amacuzac', 'Morelos'),
(3861, '62654', 'Villa Verde', 'Amacuzac', 'Morelos'),
(3862, '62654', 'Benito Juárez', 'Amacuzac', 'Morelos'),
(3863, '62654', 'El Guamúchil', 'Amacuzac', 'Morelos'),
(3864, '62655', 'La Calera', 'Amacuzac', 'Morelos'),
(3865, '62655', 'Los Limones', 'Amacuzac', 'Morelos'),
(3866, '62655', 'Ejidal', 'Amacuzac', 'Morelos'),
(3867, '62655', 'La Playa', 'Amacuzac', 'Morelos'),
(3868, '62655', 'Huascuautla', 'Amacuzac', 'Morelos'),
(3869, '62656', 'Huajintlán', 'Amacuzac', 'Morelos'),
(3870, '62656', 'Teacalco', 'Amacuzac', 'Morelos'),
(3871, '62660', 'Puente de Ixtla Centro', 'Puente de Ixtla', 'Morelos'),
(3872, '62662', 'Guadalupe Victoria', 'Puente de Ixtla', 'Morelos'),
(3873, '62662', 'Ampliación Guadalupe Victoria', 'Puente de Ixtla', 'Morelos'),
(3874, '62662', 'Providencia', 'Puente de Ixtla', 'Morelos'),
(3875, '62662', 'Morelos', 'Puente de Ixtla', 'Morelos'),
(3876, '62662', 'Buenos Aires', 'Puente de Ixtla', 'Morelos'),
(3877, '62663', 'Tranca del Coco', 'Puente de Ixtla', 'Morelos'),
(3878, '62663', 'Cuauhtémoc', 'Puente de Ixtla', 'Morelos'),
(3879, '62663', 'Loma Linda', 'Puente de Ixtla', 'Morelos'),
(3880, '62663', 'Benito Juárez', 'Puente de Ixtla', 'Morelos'),
(3881, '62663', 'Jardines de La Herradura', 'Puente de Ixtla', 'Morelos'),
(3882, '62663', '10 de Mayo', 'Puente de Ixtla', 'Morelos'),
(3883, '62663', 'Gobernadores', 'Puente de Ixtla', 'Morelos'),
(3884, '62663', 'Ampliación Jardines de la Herradura', 'Puente de Ixtla', 'Morelos'),
(3885, '62663', 'Ampliación Benito Juárez', 'Puente de Ixtla', 'Morelos'),
(3886, '62663', 'Valle Dorado', 'Puente de Ixtla', 'Morelos'),
(3887, '62664', 'Emiliano Zapata', 'Puente de Ixtla', 'Morelos'),
(3888, '62664', 'Miguel Hidalgo', 'Puente de Ixtla', 'Morelos'),
(3889, '62665', 'Los Arcos', 'Puente de Ixtla', 'Morelos'),
(3890, '62665', 'San Mateo', 'Puente de Ixtla', 'Morelos'),
(3891, '62665', 'Norte', 'Puente de Ixtla', 'Morelos'),
(3892, '62665', 'INFONAVIT Casa Blanca', 'Puente de Ixtla', 'Morelos'),
(3893, '62665', '24 de Febrero', 'Puente de Ixtla', 'Morelos'),
(3894, '62665', 'Valle Bonito (Los Arcos Caídos)', 'Puente de Ixtla', 'Morelos'),
(3895, '62665', 'El Naranjo', 'Puente de Ixtla', 'Morelos'),
(3896, '62665', 'El Salado', 'Puente de Ixtla', 'Morelos'),
(3897, '62666', 'Ahuehuetzingo', 'Puente de Ixtla', 'Morelos'),
(3898, '62666', 'Agua Salada', 'Puente de Ixtla', 'Morelos'),
(3899, '62666', 'Kilómetro 107 (Loma Larga)', 'Puente de Ixtla', 'Morelos'),
(3900, '62668', 'El Coco', 'Puente de Ixtla', 'Morelos'),
(3901, '62670', 'San José Vista Hermosa', 'Puente de Ixtla', 'Morelos'),
(3902, '62670', 'Morelos', 'Puente de Ixtla', 'Morelos'),
(3903, '62670', 'Las Alas', 'Puente de Ixtla', 'Morelos'),
(3904, '62670', 'Miguel de la Madrid', 'Puente de Ixtla', 'Morelos'),
(3905, '62670', 'Aeródromo', 'Puente de Ixtla', 'Morelos'),
(3906, '62676', 'Lomas Altas', 'Puente de Ixtla', 'Morelos'),
(3907, '62680', 'Xoxocotla Centro', 'Xoxocotla', 'Morelos'),
(3908, '62680', 'Los Guajes', 'Xoxocotla', 'Morelos'),
(3909, '62680', 'Techichilco', 'Xoxocotla', 'Morelos'),
(3910, '62680', 'Prolongación Benito Juárez', 'Xoxocotla', 'Morelos'),
(3911, '62680', 'El Arco', 'Xoxocotla', 'Morelos'),
(3912, '62680', 'Campo Anenehuilco', 'Xoxocotla', 'Morelos'),
(3913, '62684', 'Hermosa', 'Xoxocotla', 'Morelos'),
(3914, '62685', 'Apozonalco', 'Xoxocotla', 'Morelos'),
(3915, '62686', 'Las Flores (la Xochitl)', 'Xoxocotla', 'Morelos'),
(3916, '62687', 'Tecomulco', 'Xoxocotla', 'Morelos'),
(3917, '62690', 'Tilzapotla', 'Puente de Ixtla', 'Morelos'),
(3918, '62693', 'Los Ídolos', 'Puente de Ixtla', 'Morelos'),
(3919, '62693', 'San Pedro', 'Puente de Ixtla', 'Morelos'),
(3920, '62693', 'Los Pinos', 'Puente de Ixtla', 'Morelos'),
(3921, '62693', 'Los Papayos', 'Puente de Ixtla', 'Morelos'),
(3922, '62694', 'Piedra Blanca', 'Puente de Ixtla', 'Morelos'),
(3923, '62695', 'El Zapote', 'Puente de Ixtla', 'Morelos'),
(3924, '62695', 'Los Amatitos', 'Puente de Ixtla', 'Morelos'),
(3925, '62695', 'El Salto', 'Puente de Ixtla', 'Morelos'),
(3926, '62696', 'La Tigra', 'Puente de Ixtla', 'Morelos'),
(3927, '62696', 'Las Albóndigas', 'Puente de Ixtla', 'Morelos'),
(3928, '62696', 'Los Tanques', 'Puente de Ixtla', 'Morelos'),
(3929, '62696', 'El Mango', 'Puente de Ixtla', 'Morelos'),
(3930, '62697', 'El Estudiante', 'Puente de Ixtla', 'Morelos'),
(3931, '62697', 'Loma Florida', 'Puente de Ixtla', 'Morelos'),
(3932, '62700', 'Ciudad Ayala', 'Ayala', 'Morelos'),
(3933, '62700', 'Puente Blanco', 'Ayala', 'Morelos'),
(3934, '62700', 'Buenavista', 'Ayala', 'Morelos'),
(3935, '62704', 'Ampliación Cruz Verde', 'Ayala', 'Morelos'),
(3936, '62704', 'Cruz Verde', 'Ayala', 'Morelos'),
(3937, '62710', 'Anenecuilco Centro', 'Ayala', 'Morelos'),
(3938, '62713', 'Olintepec', 'Ayala', 'Morelos'),
(3939, '62713', 'El Jagüey', 'Ayala', 'Morelos'),
(3940, '62713', 'Las Flores', 'Ayala', 'Morelos'),
(3941, '62713', 'La Joya Escondida', 'Ayala', 'Morelos'),
(3942, '62713', 'Marcelino Ortega', 'Ayala', 'Morelos'),
(3943, '62713', 'Campo San Miguel', 'Ayala', 'Morelos'),
(3944, '62713', 'Zona Sur Anenecuilco', 'Ayala', 'Morelos'),
(3945, '62714', 'Residencial La Cantera', 'Ayala', 'Morelos'),
(3946, '62714', 'Residencial Villa de los Arcos', 'Ayala', 'Morelos'),
(3947, '62714', 'San Pedro Apatlaco', 'Ayala', 'Morelos'),
(3948, '62714', 'Benito Juárez', 'Ayala', 'Morelos'),
(3949, '62714', 'Niños Héroes', 'Ayala', 'Morelos'),
(3950, '62714', 'Nuevo México ( Los Apaches )', 'Ayala', 'Morelos'),
(3951, '62714', 'La Doncella', 'Ayala', 'Morelos'),
(3952, '62714', 'Mirador', 'Ayala', 'Morelos'),
(3953, '62714', 'Cuahuixtla', 'Ayala', 'Morelos'),
(3954, '62714', 'La Joya', 'Ayala', 'Morelos'),
(3955, '62714', 'Las Arboledas', 'Ayala', 'Morelos'),
(3956, '62714', 'Rafael Merino (San Antonio)', 'Ayala', 'Morelos'),
(3957, '62714', 'Reforma', 'Ayala', 'Morelos'),
(3958, '62714', 'Campo la Escopeta', 'Ayala', 'Morelos'),
(3959, '62715', 'El Decreto', 'Ayala', 'Morelos'),
(3960, '62715', 'Residencial Los Sauces', 'Ayala', 'Morelos'),
(3961, '62715', 'Paseos de Ayala', 'Ayala', 'Morelos'),
(3962, '62715', 'Paseos de Ayala II', 'Ayala', 'Morelos'),
(3963, '62715', 'Tlayecac', 'Ayala', 'Morelos'),
(3964, '62715', '10 de Abril', 'Ayala', 'Morelos'),
(3965, '62715', 'Huertas de Cuautla', 'Ayala', 'Morelos'),
(3966, '62715', 'Mariano Matamoros', 'Ayala', 'Morelos'),
(3967, '62715', 'Prados del Sol', 'Ayala', 'Morelos'),
(3968, '62715', 'El Venadito', 'Ayala', 'Morelos'),
(3969, '62715', 'Isla de Cuautla', 'Ayala', 'Morelos'),
(3970, '62715', 'Citlalin', 'Ayala', 'Morelos'),
(3971, '62715', 'Paraíso Tlahuica', 'Ayala', 'Morelos'),
(3972, '62715', 'Las Llaves', 'Ayala', 'Morelos'),
(3973, '62715', 'Parque Industrial Cuautla', 'Ayala', 'Morelos'),
(3974, '62717', 'El Chivatero', 'Ayala', 'Morelos'),
(3975, '62717', 'General Emiliano Zapata (El Chivatero)', 'Ayala', 'Morelos'),
(3976, '62718', 'Moyotepec', 'Ayala', 'Morelos'),
(3977, '62718', 'Segunda Ampliación Moyotepec', 'Ayala', 'Morelos'),
(3978, '62720', 'Huacatlaco (Los Anonos)', 'Ayala', 'Morelos'),
(3979, '62720', 'Huitzililla', 'Ayala', 'Morelos'),
(3980, '62720', 'Jaloxtoc', 'Ayala', 'Morelos'),
(3981, '62720', 'El Sifón de la Cuera', 'Ayala', 'Morelos'),
(3982, '62720', 'Ojo de Agua', 'Ayala', 'Morelos'),
(3983, '62723', 'Chinameca', 'Ayala', 'Morelos'),
(3984, '62723', 'El Vergel', 'Ayala', 'Morelos'),
(3985, '62723', 'Palo Blanco', 'Ayala', 'Morelos'),
(3986, '62723', 'Tecomalco', 'Ayala', 'Morelos'),
(3987, '62723', 'La Cucaracha', 'Ayala', 'Morelos'),
(3988, '62723', 'Las Joyas', 'Ayala', 'Morelos'),
(3989, '62724', 'El Salitre', 'Ayala', 'Morelos'),
(3990, '62724', 'San Juan Ahuehueyo', 'Ayala', 'Morelos'),
(3991, '62724', 'San Vicente de Juárez (Las Piedras)', 'Ayala', 'Morelos'),
(3992, '62724', 'Loma Bonita', 'Ayala', 'Morelos'),
(3993, '62724', 'Buenavista', 'Ayala', 'Morelos'),
(3994, '62724', 'Valle de Morelos', 'Ayala', 'Morelos'),
(3995, '62725', 'Rafael Merino', 'Ayala', 'Morelos'),
(3996, '62725', 'Leopoldo Heredia', 'Ayala', 'Morelos'),
(3997, '62725', 'Tenextepango', 'Ayala', 'Morelos'),
(3998, '62725', 'Abelardo L. Rodríguez', 'Ayala', 'Morelos'),
(3999, '62725', 'La Libertad', 'Ayala', 'Morelos'),
(4000, '62725', 'Las Lumbreras', 'Ayala', 'Morelos'),
(4001, '62725', 'Constancio Farfán (La Pascuala)', 'Ayala', 'Morelos'),
(4002, '62725', 'Ampliación Tenextepango', 'Ayala', 'Morelos'),
(4003, '62730', 'Centro', 'Yautepec', 'Morelos'),
(4004, '62732', 'Oasis Yautepec II', 'Yautepec', 'Morelos'),
(4005, '62732', 'El Manantial', 'Yautepec', 'Morelos'),
(4006, '62732', 'Oasis', 'Yautepec', 'Morelos'),
(4007, '62732', 'Ixtlahuacan', 'Yautepec', 'Morelos'),
(4008, '62732', 'Felipe Neri', 'Yautepec', 'Morelos'),
(4009, '62732', 'Benito Juárez', 'Yautepec', 'Morelos'),
(4010, '62732', 'Santiago', 'Yautepec', 'Morelos'),
(4011, '62732', 'Jacarandas', 'Yautepec', 'Morelos'),
(4012, '62732', 'Vicente Estrada Cajigal', 'Yautepec', 'Morelos'),
(4013, '62732', 'Ignacio Manuel Altamirano', 'Yautepec', 'Morelos'),
(4014, '62732', '13 de Septiembre', 'Yautepec', 'Morelos'),
(4015, '62732', 'Ignacio Zaragoza', 'Yautepec', 'Morelos'),
(4016, '62732', 'Lomas del Potrero', 'Yautepec', 'Morelos'),
(4017, '62732', 'Apanquetzalco', 'Yautepec', 'Morelos'),
(4018, '62732', 'Tabachines', 'Yautepec', 'Morelos'),
(4019, '62732', 'Villas Jazmín', 'Yautepec', 'Morelos'),
(4020, '62732', 'Rincón de los Ciruelos', 'Yautepec', 'Morelos'),
(4021, '62732', 'Jacarandas', 'Yautepec', 'Morelos'),
(4022, '62732', 'Las Quintas', 'Yautepec', 'Morelos'),
(4023, '62732', 'Jacarandas', 'Yautepec', 'Morelos'),
(4024, '62732', 'Villareal', 'Yautepec', 'Morelos'),
(4025, '62732', 'Los Naranjos', 'Yautepec', 'Morelos'),
(4026, '62732', 'La Selva', 'Yautepec', 'Morelos'),
(4027, '62732', 'Los Mangos', 'Yautepec', 'Morelos'),
(4028, '62732', 'Viyautepec', 'Yautepec', 'Morelos'),
(4029, '62732', 'Conjunto Valle Verde', 'Yautepec', 'Morelos'),
(4030, '62732', 'Las Zamoras', 'Yautepec', 'Morelos'),
(4031, '62732', 'Tlacaelel', 'Yautepec', 'Morelos'),
(4032, '62732', 'Beit Mellat', 'Yautepec', 'Morelos'),
(4033, '62732', 'El Rocio', 'Yautepec', 'Morelos'),
(4034, '62732', 'La Gema', 'Yautepec', 'Morelos'),
(4035, '62732', 'La Morena', 'Yautepec', 'Morelos'),
(4036, '62732', 'La Antigua', 'Yautepec', 'Morelos'),
(4037, '62732', 'Conjunto Tepetlixpa', 'Yautepec', 'Morelos'),
(4038, '62732', 'Laureles', 'Yautepec', 'Morelos'),
(4039, '62732', 'Residencial Yautepec', 'Yautepec', 'Morelos'),
(4040, '62732', 'Amates', 'Yautepec', 'Morelos'),
(4041, '62732', 'Mi Pueblito', 'Yautepec', 'Morelos'),
(4042, '62733', 'Los Mangos', 'Yautepec', 'Morelos'),
(4043, '62733', 'Atlihuayan', 'Yautepec', 'Morelos'),
(4044, '62733', '5 de Mayo', 'Yautepec', 'Morelos'),
(4045, '62733', 'El Rocío', 'Yautepec', 'Morelos'),
(4046, '62733', 'Rancho Nuevo', 'Yautepec', 'Morelos'),
(4047, '62733', '24 de Febrero', 'Yautepec', 'Morelos'),
(4048, '62733', 'Luis Echeverría', 'Yautepec', 'Morelos'),
(4049, '62733', 'Buenavista', 'Yautepec', 'Morelos'),
(4050, '62733', 'Emiliano Zapata', 'Yautepec', 'Morelos'),
(4051, '62733', 'Alfredo Bonfil', 'Yautepec', 'Morelos'),
(4052, '62733', 'Otilio Montaño', 'Yautepec', 'Morelos'),
(4053, '62733', 'Paraíso', 'Yautepec', 'Morelos'),
(4054, '62733', 'San Juan', 'Yautepec', 'Morelos'),
(4055, '62733', 'Cuauhtémoc', 'Yautepec', 'Morelos'),
(4056, '62733', 'Huizachera', 'Yautepec', 'Morelos'),
(4057, '62733', 'Paracas', 'Yautepec', 'Morelos'),
(4058, '62733', 'San Juanito', 'Yautepec', 'Morelos'),
(4059, '62733', 'Lomas del Real', 'Yautepec', 'Morelos'),
(4060, '62733', 'Jovito Serrano', 'Yautepec', 'Morelos'),
(4061, '62733', 'Villas del Paraíso', 'Yautepec', 'Morelos'),
(4062, '62733', 'El Limón', 'Yautepec', 'Morelos'),
(4063, '62733', 'Residencial Cañaveral', 'Yautepec', 'Morelos'),
(4064, '62733', 'Residencial Llano Grande', 'Yautepec', 'Morelos'),
(4065, '62733', 'Residencial del Bosque', 'Yautepec', 'Morelos'),
(4066, '62733', 'Residencial Maravillas', 'Yautepec', 'Morelos'),
(4067, '62733', 'Villas Jazmín II', 'Yautepec', 'Morelos'),
(4068, '62733', 'Yautli', 'Yautepec', 'Morelos'),
(4069, '62733', 'La Ceiba', 'Yautepec', 'Morelos'),
(4070, '62733', 'El Rocío', 'Yautepec', 'Morelos'),
(4071, '62735', 'La Joya', 'Yautepec', 'Morelos'),
(4072, '62735', 'Amador Salazar', 'Yautepec', 'Morelos'),
(4073, '62735', 'Ampliación Tetillas', 'Yautepec', 'Morelos'),
(4074, '62735', 'Álvaro Leonel', 'Yautepec', 'Morelos'),
(4075, '62736', 'Cuachixolotera', 'Yautepec', 'Morelos'),
(4076, '62736', 'Hacienda Cocoyoc', 'Yautepec', 'Morelos'),
(4077, '62736', 'Villas de Cocoyoc', 'Yautepec', 'Morelos'),
(4078, '62736', 'Cuauhtémoc', 'Yautepec', 'Morelos'),
(4079, '62736', 'Cocoyoc', 'Yautepec', 'Morelos'),
(4080, '62736', 'Vicente Guerrero', 'Yautepec', 'Morelos'),
(4081, '62736', 'Francisco Villa', 'Yautepec', 'Morelos'),
(4082, '62736', 'Tehuixtlera', 'Yautepec', 'Morelos'),
(4083, '62736', 'Alejandra', 'Yautepec', 'Morelos'),
(4084, '62736', 'Viveros de Cocoyoc', 'Yautepec', 'Morelos'),
(4085, '62736', 'Lucio Moreno', 'Yautepec', 'Morelos'),
(4086, '62736', 'Ampliación Vicente Guerrero', 'Yautepec', 'Morelos'),
(4087, '62736', 'El Partidor', 'Yautepec', 'Morelos'),
(4088, '62736', 'La Coaxiolotera', 'Yautepec', 'Morelos'),
(4089, '62736', 'El Potrero', 'Yautepec', 'Morelos'),
(4090, '62737', 'Arco Antiguo', 'Yautepec', 'Morelos'),
(4091, '62737', '10 de Abril', 'Yautepec', 'Morelos'),
(4092, '62737', 'Itzamatitlán', 'Yautepec', 'Morelos'),
(4093, '62737', 'La Nopalera', 'Yautepec', 'Morelos'),
(4094, '62737', 'El Caracol (Campo Chiquito)', 'Yautepec', 'Morelos'),
(4095, '62737', 'Los Arcos', 'Yautepec', 'Morelos'),
(4096, '62737', 'Ignacio Bastida (Santa Catarina Tlayca)', 'Yautepec', 'Morelos'),
(4097, '62737', 'Lázaro Cárdenas (El Empalme)', 'Yautepec', 'Morelos');
INSERT INTO `t_cat_data_dir` (`id_cat_data_dir`, `codigo_postal`, `colonia`, `alcaldia`, `entidad_federativa`) VALUES
(4098, '62737', 'Oacalco', 'Yautepec', 'Morelos'),
(4099, '62737', 'San Carlos', 'Yautepec', 'Morelos'),
(4100, '62737', 'El Zarco', 'Yautepec', 'Morelos'),
(4101, '62737', 'Francisco I. Madero (La Nopalera)', 'Yautepec', 'Morelos'),
(4102, '62737', 'Santa Lucía (Ampliación Itzamatitlán)', 'Yautepec', 'Morelos'),
(4103, '62737', 'El Michate', 'Yautepec', 'Morelos'),
(4104, '62738', 'José Ortiz (San Martín)', 'Yautepec', 'Morelos'),
(4105, '62738', 'Oaxtepec Centro', 'Yautepec', 'Morelos'),
(4106, '62738', 'Santa Rosa', 'Yautepec', 'Morelos'),
(4107, '62738', 'Huertos de Oaxtepec', 'Yautepec', 'Morelos'),
(4108, '62738', 'Colinas de Oaxtepec', 'Yautepec', 'Morelos'),
(4109, '62738', 'Amates de Oaxtepec', 'Yautepec', 'Morelos'),
(4110, '62738', 'Pedregal de Oaxtepec', 'Yautepec', 'Morelos'),
(4111, '62738', 'Real de Oaxtepec', 'Yautepec', 'Morelos'),
(4112, '62738', 'Jacarandas', 'Yautepec', 'Morelos'),
(4113, '62738', 'El Capulín', 'Yautepec', 'Morelos'),
(4114, '62738', 'Vergeles de Oaxtepec', 'Yautepec', 'Morelos'),
(4115, '62738', 'Altos de Oaxtepec', 'Yautepec', 'Morelos'),
(4116, '62738', 'Centro Vacacional Oaxtepec', 'Yautepec', 'Morelos'),
(4117, '62738', 'Ampliación el Capulín', 'Yautepec', 'Morelos'),
(4118, '62738', 'Emiliano Zapata (Palo Mocho)', 'Yautepec', 'Morelos'),
(4119, '62738', 'Corral Grande', 'Yautepec', 'Morelos'),
(4120, '62738', 'Los Ojos de Ahuilican', 'Yautepec', 'Morelos'),
(4121, '62738', 'Ejidal Tezoquipa', 'Yautepec', 'Morelos'),
(4122, '62738', 'Curva Melón Zacate', 'Yautepec', 'Morelos'),
(4123, '62738', 'Emiliano Zapata (Casahuates)', 'Yautepec', 'Morelos'),
(4124, '62738', 'Campo los Limones', 'Yautepec', 'Morelos'),
(4125, '62739', 'Miguel Hidalgo (Los Cuartos)', 'Yautepec', 'Morelos'),
(4126, '62739', 'Diego Ruiz', 'Yautepec', 'Morelos'),
(4127, '62739', 'San Isidro', 'Yautepec', 'Morelos'),
(4128, '62739', 'El Caudillo del Sur', 'Yautepec', 'Morelos'),
(4129, '62739', 'Campo Joya de las Víboras', 'Yautepec', 'Morelos'),
(4130, '62739', 'Rincón del Río', 'Yautepec', 'Morelos'),
(4131, '62739', 'San Pablo', 'Yautepec', 'Morelos'),
(4132, '62739', 'Huertos el Mirador', 'Yautepec', 'Morelos'),
(4133, '62739', 'Valle Encantado', 'Yautepec', 'Morelos'),
(4134, '62740', 'Centro', 'Cuautla', 'Morelos'),
(4135, '62742', 'Casas del Río', 'Cuautla', 'Morelos'),
(4136, '62742', 'Gabriel Tepepa', 'Cuautla', 'Morelos'),
(4137, '62742', 'Pablo Torres Burgos', 'Cuautla', 'Morelos'),
(4138, '62742', 'Xochitengo', 'Cuautla', 'Morelos'),
(4139, '62742', 'Nueva San José', 'Cuautla', 'Morelos'),
(4140, '62742', 'Francisco I Madero', 'Cuautla', 'Morelos'),
(4141, '62742', 'Reforma', 'Cuautla', 'Morelos'),
(4142, '62742', 'Ampliación Gabriel Tepepa', 'Cuautla', 'Morelos'),
(4143, '62743', 'Hermenegildo Galeana', 'Cuautla', 'Morelos'),
(4144, '62743', 'Agua Hedionda', 'Cuautla', 'Morelos'),
(4145, '62743', '5 de Febrero', 'Cuautla', 'Morelos'),
(4146, '62743', 'Niño Artillero', 'Cuautla', 'Morelos'),
(4147, '62743', 'Plan de Ayala', 'Cuautla', 'Morelos'),
(4148, '62743', 'Ampliación Plan de Ayala', 'Cuautla', 'Morelos'),
(4149, '62743', 'Benito Juárez', 'Cuautla', 'Morelos'),
(4150, '62743', 'Iztaccihuatl', 'Cuautla', 'Morelos'),
(4151, '62743', 'Los Amates', 'Cuautla', 'Morelos'),
(4152, '62743', 'La Pedregosa', 'Cuautla', 'Morelos'),
(4153, '62743', 'La Biznaga', 'Cuautla', 'Morelos'),
(4154, '62743', 'Ampliación Hermenegildo Galeana', 'Cuautla', 'Morelos'),
(4155, '62743', 'Paraíso', 'Cuautla', 'Morelos'),
(4156, '62743', 'Trincheras', 'Cuautla', 'Morelos'),
(4157, '62743', 'Ampliación Biznaga Uno', 'Cuautla', 'Morelos'),
(4158, '62743', 'Campo Nuevo', 'Cuautla', 'Morelos'),
(4159, '62743', 'Villareal Lomas de Cuautla', 'Cuautla', 'Morelos'),
(4160, '62743', 'Ampliación 5 de Febrero', 'Cuautla', 'Morelos'),
(4161, '62744', '10 de Abril', 'Cuautla', 'Morelos'),
(4162, '62744', 'Emiliano Zapata', 'Cuautla', 'Morelos'),
(4163, '62744', 'Héroe de Nacozari', 'Cuautla', 'Morelos'),
(4164, '62744', 'Morelos', 'Cuautla', 'Morelos'),
(4165, '62744', 'Progreso', 'Cuautla', 'Morelos'),
(4166, '62744', 'Ampliación Emiliano Zapata', 'Cuautla', 'Morelos'),
(4167, '62744', 'Martínez Peña (Los Dos Puentes)', 'Cuautla', 'Morelos'),
(4168, '62746', '5 de Diciembre', 'Cuautla', 'Morelos'),
(4169, '62746', 'Guadalupe Victoria', 'Cuautla', 'Morelos'),
(4170, '62746', 'Flamingos', 'Cuautla', 'Morelos'),
(4171, '62746', 'Manantiales', 'Cuautla', 'Morelos'),
(4172, '62746', 'Otilio Montaño', 'Cuautla', 'Morelos'),
(4173, '62746', 'La Cerrillera', 'Cuautla', 'Morelos'),
(4174, '62746', 'Ampliación Tepeyac', 'Cuautla', 'Morelos'),
(4175, '62746', 'Tepeyac', 'Cuautla', 'Morelos'),
(4176, '62746', 'Agua Blanca', 'Cuautla', 'Morelos'),
(4177, '62747', 'Araucaria', 'Cuautla', 'Morelos'),
(4178, '62747', 'Los Sabinos', 'Cuautla', 'Morelos'),
(4179, '62747', 'Río Verde Infonavit', 'Cuautla', 'Morelos'),
(4180, '62747', 'Santa Cruz', 'Cuautla', 'Morelos'),
(4181, '62747', 'Valle del Sol', 'Cuautla', 'Morelos'),
(4182, '62747', 'Cuautlixco', 'Cuautla', 'Morelos'),
(4183, '62747', 'Estrella', 'Cuautla', 'Morelos'),
(4184, '62747', 'Ignacio Zaragoza', 'Cuautla', 'Morelos'),
(4185, '62747', 'ISSFAM', 'Cuautla', 'Morelos'),
(4186, '62747', 'Tierra y Libertad', 'Cuautla', 'Morelos'),
(4187, '62747', 'Santa Rosa', 'Cuautla', 'Morelos'),
(4188, '62747', '7 de Noviembre', 'Cuautla', 'Morelos'),
(4189, '62747', 'Residencial del Bosque', 'Cuautla', 'Morelos'),
(4190, '62747', 'Residencial los Arcos', 'Cuautla', 'Morelos'),
(4191, '62747', 'Los Cerritos', 'Cuautla', 'Morelos'),
(4192, '62747', 'Ampliación Santa Cruz', 'Cuautla', 'Morelos'),
(4193, '62747', 'Los Amates', 'Cuautla', 'Morelos'),
(4194, '62747', 'La Esperanza', 'Cuautla', 'Morelos'),
(4195, '62748', 'Año de Juárez', 'Cuautla', 'Morelos'),
(4196, '62748', 'Empleado Postal', 'Cuautla', 'Morelos'),
(4197, '62748', 'Miguel Hidalgo', 'Cuautla', 'Morelos'),
(4198, '62748', 'Revolución', 'Cuautla', 'Morelos'),
(4199, '62748', 'Casasano', 'Cuautla', 'Morelos'),
(4200, '62748', 'Eusebio Jauregui', 'Cuautla', 'Morelos'),
(4201, '62748', 'Benito Quezada', 'Cuautla', 'Morelos'),
(4202, '62748', 'Ampliación las Tazas', 'Cuautla', 'Morelos'),
(4203, '62748', 'La Ciénega', 'Cuautla', 'Morelos'),
(4204, '62748', 'Antigua del Bosque', 'Cuautla', 'Morelos'),
(4205, '62748', 'Centenario', 'Cuautla', 'Morelos'),
(4206, '62748', 'Vicente Guerrero', 'Cuautla', 'Morelos'),
(4207, '62748', 'Tabachines', 'Cuautla', 'Morelos'),
(4208, '62754', 'Empleado Municipal', 'Cuautla', 'Morelos'),
(4209, '62755', 'Puxtla', 'Cuautla', 'Morelos'),
(4210, '62755', 'Ampliación 10 de Abril', 'Cuautla', 'Morelos'),
(4211, '62755', 'La Angostura', 'Cuautla', 'Morelos'),
(4212, '62755', 'Santa Inés', 'Cuautla', 'Morelos'),
(4213, '62755', 'Jicamán (Colonia el Mirador)', 'Cuautla', 'Morelos'),
(4214, '62755', '3 de Mayo', 'Cuautla', 'Morelos'),
(4215, '62755', 'La Esperanza-El Hospital', 'Cuautla', 'Morelos'),
(4216, '62755', 'Rancho Gómez', 'Cuautla', 'Morelos'),
(4217, '62755', 'El Sifón', 'Cuautla', 'Morelos'),
(4218, '62756', 'Ampliación Narciso Mendoza', 'Cuautla', 'Morelos'),
(4219, '62756', 'Calderón', 'Cuautla', 'Morelos'),
(4220, '62756', 'Polvorín', 'Cuautla', 'Morelos'),
(4221, '62756', 'Peña Flores (Palo Verde)', 'Cuautla', 'Morelos'),
(4222, '62756', 'Narciso Mendoza', 'Cuautla', 'Morelos'),
(4223, '62756', '19 de Febrero de 1812', 'Cuautla', 'Morelos'),
(4224, '62756', 'Sitio del Sol', 'Cuautla', 'Morelos'),
(4225, '62757', '2 de Mayo', 'Cuautla', 'Morelos'),
(4226, '62757', 'Tetelcingo', 'Cuautla', 'Morelos'),
(4227, '62757', 'Lázaro Cárdenas', 'Cuautla', 'Morelos'),
(4228, '62757', 'Brisas de Cuautla', 'Cuautla', 'Morelos'),
(4229, '62757', 'Cuauhtémoc', 'Cuautla', 'Morelos'),
(4230, '62757', 'Santa Bárbara', 'Cuautla', 'Morelos'),
(4231, '62757', 'Volcanes de Cuautla', 'Cuautla', 'Morelos'),
(4232, '62757', 'Los Faroles', 'Cuautla', 'Morelos'),
(4233, '62757', 'Magisterial', 'Cuautla', 'Morelos'),
(4234, '62757', 'Trigo Verde', 'Cuautla', 'Morelos'),
(4235, '62757', 'Piedra Blanca', 'Cuautla', 'Morelos'),
(4236, '62757', 'Central de Abastos', 'Cuautla', 'Morelos'),
(4237, '62757', 'Plaza Solidaridad', 'Cuautla', 'Morelos'),
(4238, '62757', 'Tetelcingo', 'Cuautla', 'Morelos'),
(4239, '62757', 'Salvador Esquer', 'Cuautla', 'Morelos'),
(4240, '62757', 'Las Cruces', 'Cuautla', 'Morelos'),
(4241, '62757', 'Condominios del Bosque', 'Cuautla', 'Morelos'),
(4242, '62757', 'Tezahuapan', 'Cuautla', 'Morelos'),
(4243, '62757', 'Puerta de Hierro', 'Cuautla', 'Morelos'),
(4244, '62757', '12 de Diciembre', 'Cuautla', 'Morelos'),
(4245, '62757', 'Tierra Larga', 'Cuautla', 'Morelos'),
(4246, '62757', 'La Escondida', 'Cuautla', 'Morelos'),
(4247, '62760', 'Emiliano Zapata Centro', 'Emiliano Zapata', 'Morelos'),
(4248, '62760', 'El Zapote', 'Emiliano Zapata', 'Morelos'),
(4249, '62763', 'Tres de Mayo', 'Emiliano Zapata', 'Morelos'),
(4250, '62763', 'Lomas de Trujillo', 'Emiliano Zapata', 'Morelos'),
(4251, '62763', 'Lomas del Copal', 'Emiliano Zapata', 'Morelos'),
(4252, '62763', 'San José de las Cumbres', 'Emiliano Zapata', 'Morelos'),
(4253, '62763', 'Loma Sur', 'Emiliano Zapata', 'Morelos'),
(4254, '62763', '28 de Agosto', 'Emiliano Zapata', 'Morelos'),
(4255, '62764', 'Altavista', 'Emiliano Zapata', 'Morelos'),
(4256, '62764', '14 de Febrero', 'Emiliano Zapata', 'Morelos'),
(4257, '62764', 'El Capiri', 'Emiliano Zapata', 'Morelos'),
(4258, '62764', 'Calera Chica', 'Emiliano Zapata', 'Morelos'),
(4259, '62764', 'El Guante', 'Emiliano Zapata', 'Morelos'),
(4260, '62764', 'El Calvario', 'Emiliano Zapata', 'Morelos'),
(4261, '62764', 'El Aguaje', 'Emiliano Zapata', 'Morelos'),
(4262, '62764', 'San Francisco', 'Emiliano Zapata', 'Morelos'),
(4263, '62764', '24 de Abril', 'Emiliano Zapata', 'Morelos'),
(4264, '62764', 'Arboleda', 'Emiliano Zapata', 'Morelos'),
(4265, '62764', 'Gerardo Pérez', 'Emiliano Zapata', 'Morelos'),
(4266, '62764', 'Condominios Capiri', 'Emiliano Zapata', 'Morelos'),
(4267, '62764', 'Las Fuentes', 'Emiliano Zapata', 'Morelos'),
(4268, '62764', 'Rinconada la Misión', 'Emiliano Zapata', 'Morelos'),
(4269, '62764', 'Las Rocas', 'Emiliano Zapata', 'Morelos'),
(4270, '62764', 'Conjunto Urbano la Misión', 'Emiliano Zapata', 'Morelos'),
(4271, '62764', 'Rancho San Pedro', 'Emiliano Zapata', 'Morelos'),
(4272, '62765', 'Ojo de Agua II', 'Emiliano Zapata', 'Morelos'),
(4273, '62765', 'Prohogar', 'Emiliano Zapata', 'Morelos'),
(4274, '62765', 'Benito Juárez', 'Emiliano Zapata', 'Morelos'),
(4275, '62765', 'El Capulín', 'Emiliano Zapata', 'Morelos'),
(4276, '62765', 'Guadalupe de las Arenas', 'Emiliano Zapata', 'Morelos'),
(4277, '62765', 'El Mirador', 'Emiliano Zapata', 'Morelos'),
(4278, '62765', 'Ampliación Prohogar', 'Emiliano Zapata', 'Morelos'),
(4279, '62765', 'Ojo de Agua', 'Emiliano Zapata', 'Morelos'),
(4280, '62765', 'Manantiales', 'Emiliano Zapata', 'Morelos'),
(4281, '62765', 'Los Agaves', 'Emiliano Zapata', 'Morelos'),
(4282, '62765', 'Palo Escrito (Colonia Benito Juárez)', 'Emiliano Zapata', 'Morelos'),
(4283, '62766', 'Residencial Amarantto Habittat', 'Emiliano Zapata', 'Morelos'),
(4284, '62766', 'Estación', 'Emiliano Zapata', 'Morelos'),
(4285, '62766', 'El Amate', 'Emiliano Zapata', 'Morelos'),
(4286, '62766', 'El Vigilante', 'Emiliano Zapata', 'Morelos'),
(4287, '62766', 'Campo Nuevo', 'Emiliano Zapata', 'Morelos'),
(4288, '62766', 'Modesto Rangel', 'Emiliano Zapata', 'Morelos'),
(4289, '62766', 'El Órgano', 'Emiliano Zapata', 'Morelos'),
(4290, '62766', '1ra Sección Villa Morelos', 'Emiliano Zapata', 'Morelos'),
(4291, '62766', 'Villa Morelos', 'Emiliano Zapata', 'Morelos'),
(4292, '62766', 'El Tomatal', 'Emiliano Zapata', 'Morelos'),
(4293, '62766', 'Las Gaviotas', 'Emiliano Zapata', 'Morelos'),
(4294, '62766', 'Paseos del Río', 'Emiliano Zapata', 'Morelos'),
(4295, '62766', 'Paraíso Country Club', 'Emiliano Zapata', 'Morelos'),
(4296, '62766', 'Ampliación el Órgano', 'Emiliano Zapata', 'Morelos'),
(4297, '62766', 'Condominio el Ámate', 'Emiliano Zapata', 'Morelos'),
(4298, '62766', 'Campo Nuevo', 'Emiliano Zapata', 'Morelos'),
(4299, '62767', 'Residencial Rancho Tezoyuca', 'Emiliano Zapata', 'Morelos'),
(4300, '62767', 'Tezoyuca', 'Emiliano Zapata', 'Morelos'),
(4301, '62767', 'Loma Bonita', 'Emiliano Zapata', 'Morelos'),
(4302, '62767', 'Villas de Tezoyuca', 'Emiliano Zapata', 'Morelos'),
(4303, '62767', 'Cuauhtémoc', 'Emiliano Zapata', 'Morelos'),
(4304, '62767', 'Jardines de Tezoyuca', 'Emiliano Zapata', 'Morelos'),
(4305, '62767', 'La Mina', 'Emiliano Zapata', 'Morelos'),
(4306, '62767', 'Real de Tezoyuca', 'Emiliano Zapata', 'Morelos'),
(4307, '62767', 'Tezoyuca', 'Emiliano Zapata', 'Morelos'),
(4308, '62767', 'Capulín', 'Emiliano Zapata', 'Morelos'),
(4309, '62767', 'Amatitlán', 'Emiliano Zapata', 'Morelos'),
(4310, '62767', 'Villas del Seminario', 'Emiliano Zapata', 'Morelos'),
(4311, '62767', 'Villas del Portezuelo', 'Emiliano Zapata', 'Morelos'),
(4312, '62767', 'Geo Villas Colorines', 'Emiliano Zapata', 'Morelos'),
(4313, '62767', 'Rinconada de Tezoyuca', 'Emiliano Zapata', 'Morelos'),
(4314, '62767', 'Paseos de Tezoyuca', 'Emiliano Zapata', 'Morelos'),
(4315, '62767', 'Los Sabinos', 'Emiliano Zapata', 'Morelos'),
(4316, '62767', 'Las Flores', 'Emiliano Zapata', 'Morelos'),
(4317, '62767', 'Tesoros de Tezoyuca', 'Emiliano Zapata', 'Morelos'),
(4318, '62767', 'Las Garzas', 'Emiliano Zapata', 'Morelos'),
(4319, '62767', 'Cañaveral', 'Emiliano Zapata', 'Morelos'),
(4320, '62767', 'El Castillo', 'Emiliano Zapata', 'Morelos'),
(4321, '62768', 'La Campiña', 'Emiliano Zapata', 'Morelos'),
(4322, '62768', 'Tepetzingo', 'Emiliano Zapata', 'Morelos'),
(4323, '62768', 'Tetecalita', 'Emiliano Zapata', 'Morelos'),
(4324, '62770', 'Tlaltizapán Centro', 'Tlaltizapán de Zapata', 'Morelos'),
(4325, '62770', 'Carlos Pacheco', 'Tlaltizapán de Zapata', 'Morelos'),
(4326, '62772', 'Santa Rosa Treinta', 'Tlaltizapán de Zapata', 'Morelos'),
(4327, '62772', '10 de Mayo (La Matanza)', 'Tlaltizapán de Zapata', 'Morelos'),
(4328, '62772', 'Echeverría', 'Tlaltizapán de Zapata', 'Morelos'),
(4329, '62772', 'Ignacio Zaragoza', 'Tlaltizapán de Zapata', 'Morelos'),
(4330, '62772', 'El Cajoncito', 'Tlaltizapán de Zapata', 'Morelos'),
(4331, '62772', 'Emiliano Zapata', 'Tlaltizapán de Zapata', 'Morelos'),
(4332, '62772', 'Independencia', 'Tlaltizapán de Zapata', 'Morelos'),
(4333, '62773', 'Huepalo', 'Tlaltizapán de Zapata', 'Morelos'),
(4334, '62773', 'Barranca Honda', 'Tlaltizapán de Zapata', 'Morelos'),
(4335, '62773', 'Ticumán', 'Tlaltizapán de Zapata', 'Morelos'),
(4336, '62773', 'Morelos', 'Tlaltizapán de Zapata', 'Morelos'),
(4337, '62773', 'El Jagüey', 'Tlaltizapán de Zapata', 'Morelos'),
(4338, '62773', 'Ampliación Benito Juárez', 'Tlaltizapán de Zapata', 'Morelos'),
(4339, '62773', 'Guadalupe Victoria', 'Tlaltizapán de Zapata', 'Morelos'),
(4340, '62773', 'El Tecolote', 'Tlaltizapán de Zapata', 'Morelos'),
(4341, '62773', 'Ampliación El Tecolote', 'Tlaltizapán de Zapata', 'Morelos'),
(4342, '62773', 'Club Haciendas de Ticumán', 'Tlaltizapán de Zapata', 'Morelos'),
(4343, '62773', 'Huertos de Ticumán', 'Tlaltizapán de Zapata', 'Morelos'),
(4344, '62773', 'Benito Juárez', 'Tlaltizapán de Zapata', 'Morelos'),
(4345, '62773', 'Ticumán', 'Tlaltizapán de Zapata', 'Morelos'),
(4346, '62773', 'La Curva', 'Tlaltizapán de Zapata', 'Morelos'),
(4347, '62773', 'Pedregal', 'Tlaltizapán de Zapata', 'Morelos'),
(4348, '62774', 'Bonifacio García (Colonia Alejandra)', 'Tlaltizapán de Zapata', 'Morelos'),
(4349, '62774', 'Las Estacas', 'Tlaltizapán de Zapata', 'Morelos'),
(4350, '62774', 'Temilpa Viejo', 'Tlaltizapán de Zapata', 'Morelos'),
(4351, '62774', 'Temilpa Nuevo', 'Tlaltizapán de Zapata', 'Morelos'),
(4352, '62774', 'Palo Prieto (Chipitongo)', 'Tlaltizapán de Zapata', 'Morelos'),
(4353, '62774', 'La Piedra Rodada', 'Tlaltizapán de Zapata', 'Morelos'),
(4354, '62775', 'San Rafael Zaragoza', 'Tlaltizapán de Zapata', 'Morelos'),
(4355, '62775', 'San Pablo Hidalgo', 'Tlaltizapán de Zapata', 'Morelos'),
(4356, '62775', 'Plan de Ayala', 'Tlaltizapán de Zapata', 'Morelos'),
(4357, '62775', 'Las Juntas', 'Tlaltizapán de Zapata', 'Morelos'),
(4358, '62775', 'El Topil', 'Tlaltizapán de Zapata', 'Morelos'),
(4359, '62775', 'Huertas el Mirador', 'Tlaltizapán de Zapata', 'Morelos'),
(4360, '62775', 'El Mirador', 'Tlaltizapán de Zapata', 'Morelos'),
(4361, '62775', 'Palmillas', 'Tlaltizapán de Zapata', 'Morelos'),
(4362, '62775', 'Los Presidentes', 'Tlaltizapán de Zapata', 'Morelos'),
(4363, '62775', 'Las Galeras', 'Tlaltizapán de Zapata', 'Morelos'),
(4364, '62776', 'Ampliación El Mirador (Ampliación Bomba)', 'Tlaltizapán de Zapata', 'Morelos'),
(4365, '62776', 'Otilio Montaño', 'Tlaltizapán de Zapata', 'Morelos'),
(4366, '62776', 'Amador Salazar', 'Tlaltizapán de Zapata', 'Morelos'),
(4367, '62776', 'El Mirador', 'Tlaltizapán de Zapata', 'Morelos'),
(4368, '62776', 'San Miguel 30', 'Tlaltizapán de Zapata', 'Morelos'),
(4369, '62777', 'Huatecalco', 'Tlaltizapán de Zapata', 'Morelos'),
(4370, '62777', 'Casa Blanca', 'Tlaltizapán de Zapata', 'Morelos'),
(4371, '62777', 'El Pochote', 'Tlaltizapán de Zapata', 'Morelos'),
(4372, '62777', 'La Mina', 'Tlaltizapán de Zapata', 'Morelos'),
(4373, '62778', 'Acamilpa', 'Tlaltizapán de Zapata', 'Morelos'),
(4374, '62778', 'Temimilcingo', 'Tlaltizapán de Zapata', 'Morelos'),
(4375, '62778', 'Pueblo Nuevo', 'Tlaltizapán de Zapata', 'Morelos'),
(4376, '62778', '20 30', 'Tlaltizapán de Zapata', 'Morelos'),
(4377, '62778', 'Cuauhtémoc', 'Tlaltizapán de Zapata', 'Morelos'),
(4378, '62778', 'La Loma', 'Tlaltizapán de Zapata', 'Morelos'),
(4379, '62778', 'El Conquistador', 'Tlaltizapán de Zapata', 'Morelos'),
(4380, '62778', 'El Texcal', 'Tlaltizapán de Zapata', 'Morelos'),
(4381, '62778', 'Francisco Javier Mina', 'Tlaltizapán de Zapata', 'Morelos'),
(4382, '62778', 'El Marimon', 'Tlaltizapán de Zapata', 'Morelos'),
(4383, '62778', 'Tecoloapan (Aguas Vivas)', 'Tlaltizapán de Zapata', 'Morelos'),
(4384, '62778', 'Los Cajetes', 'Tlaltizapán de Zapata', 'Morelos'),
(4385, '62778', 'La Cima', 'Tlaltizapán de Zapata', 'Morelos'),
(4386, '62780', 'Tetelpa', 'Zacatepec', 'Morelos'),
(4387, '62780', 'Zacatepec de Hidalgo Centro', 'Zacatepec', 'Morelos'),
(4388, '62780', 'Benito Juárez', 'Zacatepec', 'Morelos'),
(4389, '62780', 'Lázaro Cárdenas', 'Zacatepec', 'Morelos'),
(4390, '62780', '20 de Noviembre', 'Zacatepec', 'Morelos'),
(4391, '62780', 'Miguel Alemán', 'Zacatepec', 'Morelos'),
(4392, '62780', 'Emiliano Zapata', 'Zacatepec', 'Morelos'),
(4393, '62780', 'Plutarco Elías Calles', 'Zacatepec', 'Morelos'),
(4394, '62780', 'Plan de Ayala', 'Zacatepec', 'Morelos'),
(4395, '62780', 'Independencia', 'Zacatepec', 'Morelos'),
(4396, '62785', 'Campo de la Presa', 'Zacatepec', 'Morelos'),
(4397, '62785', 'Galeana Centro', 'Zacatepec', 'Morelos'),
(4398, '62785', 'Vicente Guerrero', 'Zacatepec', 'Morelos'),
(4399, '62785', 'Josefa Ortiz de Domínguez', 'Zacatepec', 'Morelos'),
(4400, '62785', 'Arboledas', 'Zacatepec', 'Morelos'),
(4401, '62785', 'Valle Sol', 'Zacatepec', 'Morelos'),
(4402, '62785', 'Alianza', 'Zacatepec', 'Morelos'),
(4403, '62785', 'Guadalupe Victoria', 'Zacatepec', 'Morelos'),
(4404, '62785', 'Lázaro Cárdenas', 'Zacatepec', 'Morelos'),
(4405, '62785', 'Mártires del 10 de Abril', 'Zacatepec', 'Morelos'),
(4406, '62785', 'San Antonio Chiverías', 'Zacatepec', 'Morelos'),
(4407, '62790', 'El Crucero de Atlacholoaya', 'Xochitepec', 'Morelos'),
(4408, '62790', 'Campo San Rafael', 'Xochitepec', 'Morelos'),
(4409, '62790', 'La Guamuchilera', 'Xochitepec', 'Morelos'),
(4410, '62790', 'Rinconada de Xochitepec', 'Xochitepec', 'Morelos'),
(4411, '62790', 'Real del Puente', 'Xochitepec', 'Morelos'),
(4412, '62790', 'Xochitepec Centro', 'Xochitepec', 'Morelos'),
(4413, '62790', 'Benito Juárez', 'Xochitepec', 'Morelos'),
(4414, '62790', 'La Calera', 'Xochitepec', 'Morelos'),
(4415, '62790', 'San Miguel La Unión', 'Xochitepec', 'Morelos'),
(4416, '62790', 'San Pedro de los Pinos', 'Xochitepec', 'Morelos'),
(4417, '62790', 'Morelos 1ra Sección', 'Xochitepec', 'Morelos'),
(4418, '62790', 'Morelos 2da Sección', 'Xochitepec', 'Morelos'),
(4419, '62790', 'Morelos 3ra Sección', 'Xochitepec', 'Morelos'),
(4420, '62790', 'Las Flores', 'Xochitepec', 'Morelos'),
(4421, '62790', 'Loma Bonita', 'Xochitepec', 'Morelos'),
(4422, '62790', 'Obrera Popular', 'Xochitepec', 'Morelos'),
(4423, '62790', 'Nueva Morelos', 'Xochitepec', 'Morelos'),
(4424, '62790', 'Miguel Hidalgo', 'Xochitepec', 'Morelos'),
(4425, '62790', 'Ampliación Miguel Hidalgo', 'Xochitepec', 'Morelos'),
(4426, '62790', '3 de Mayo', 'Xochitepec', 'Morelos'),
(4427, '62790', 'San Francisco', 'Xochitepec', 'Morelos'),
(4428, '62790', 'Lázaro Cárdenas', 'Xochitepec', 'Morelos'),
(4429, '62790', 'El Pedregal', 'Xochitepec', 'Morelos'),
(4430, '62790', 'Jardines de Xochitepec', 'Xochitepec', 'Morelos'),
(4431, '62790', 'Villas de Xochitepec', 'Xochitepec', 'Morelos'),
(4432, '62790', 'La Cruz', 'Xochitepec', 'Morelos'),
(4433, '62790', 'Tierra Verde', 'Xochitepec', 'Morelos'),
(4434, '62790', 'Francisco Villa', 'Xochitepec', 'Morelos'),
(4435, '62790', 'La Esperanza', 'Xochitepec', 'Morelos'),
(4436, '62790', 'Campo Canela', 'Xochitepec', 'Morelos'),
(4437, '62790', 'Real del Puente', 'Xochitepec', 'Morelos'),
(4438, '62790', 'Las Rosas', 'Xochitepec', 'Morelos'),
(4439, '62790', 'Lomas del Manantial', 'Xochitepec', 'Morelos'),
(4440, '62793', 'Xalipa', 'Xochitepec', 'Morelos'),
(4441, '62793', 'Centro de Readaptación Social de Atlacholoaya', 'Xochitepec', 'Morelos'),
(4442, '62793', 'Solares', 'Xochitepec', 'Morelos'),
(4443, '62793', 'Los Laureles', 'Xochitepec', 'Morelos'),
(4444, '62793', 'Cumbres del Campestre', 'Xochitepec', 'Morelos'),
(4445, '62793', 'Atlacholoaya', 'Xochitepec', 'Morelos'),
(4446, '62793', 'Cazahuatera', 'Xochitepec', 'Morelos'),
(4447, '62793', 'El Calvario', 'Xochitepec', 'Morelos'),
(4448, '62794', 'Real Santa Fe', 'Xochitepec', 'Morelos'),
(4449, '62794', 'Vista Santa Fe', 'Xochitepec', 'Morelos'),
(4450, '62794', 'La Pintora', 'Xochitepec', 'Morelos'),
(4451, '62794', 'Club de Golf Santa Fe', 'Xochitepec', 'Morelos'),
(4452, '62794', 'Colinas de Santa Fe', 'Xochitepec', 'Morelos'),
(4453, '62795', 'Chiconcuac', 'Xochitepec', 'Morelos'),
(4454, '62796', 'Encanto', 'Xochitepec', 'Morelos'),
(4455, '62796', 'Dos Ríos', 'Xochitepec', 'Morelos'),
(4456, '62796', 'Villas del Sol', 'Xochitepec', 'Morelos'),
(4457, '62796', 'Paseos de Xochitepec', 'Xochitepec', 'Morelos'),
(4458, '62796', 'Arroyos Xochitepec', 'Xochitepec', 'Morelos'),
(4459, '62797', 'Coaxcomac', 'Xochitepec', 'Morelos'),
(4460, '62797', 'Humberto Gutiérrez Corona', 'Xochitepec', 'Morelos'),
(4461, '62797', 'Buenavista', 'Xochitepec', 'Morelos'),
(4462, '62797', 'Alpuyeca', 'Xochitepec', 'Morelos'),
(4463, '62797', 'Las Palmas', 'Xochitepec', 'Morelos'),
(4464, '62797', 'Ampliación 3 de Mayo', 'Xochitepec', 'Morelos'),
(4465, '62800', 'San Bartolo', 'Tetela del Volcán', 'Morelos'),
(4466, '62800', 'Santiago', 'Tetela del Volcán', 'Morelos'),
(4467, '62800', 'Tetela del Volcán', 'Tetela del Volcán', 'Morelos'),
(4468, '62800', 'Xochicalco', 'Tetela del Volcán', 'Morelos'),
(4469, '62800', 'El Malinal', 'Tetela del Volcán', 'Morelos'),
(4470, '62802', 'Tlalmimilulpan (San Pedro)', 'Tetela del Volcán', 'Morelos'),
(4471, '62803', 'Paluca', 'Tetela del Volcán', 'Morelos'),
(4472, '62803', 'Cacapola', 'Tetela del Volcán', 'Morelos'),
(4473, '62803', 'Tlalamayocan', 'Tetela del Volcán', 'Morelos'),
(4474, '62803', 'Zacapechpa (Zacapezuca)', 'Tetela del Volcán', 'Morelos'),
(4475, '62804', 'San Agustín', 'Tetela del Volcán', 'Morelos'),
(4476, '62804', 'San Jerónimo', 'Tetela del Volcán', 'Morelos'),
(4477, '62804', 'San Miguel', 'Tetela del Volcán', 'Morelos'),
(4478, '62804', 'El Encinal', 'Tetela del Volcán', 'Morelos'),
(4479, '62804', 'Tecla', 'Tetela del Volcán', 'Morelos'),
(4480, '62804', 'Lomas Lindas', 'Tetela del Volcán', 'Morelos'),
(4481, '62805', 'Cuaucorra', 'Tetela del Volcán', 'Morelos'),
(4482, '62806', 'El Capulín', 'Tetela del Volcán', 'Morelos'),
(4483, '62810', 'Hueyapan', 'Hueyapan', 'Morelos'),
(4484, '62812', 'Tzitzicastla (Rancho las Flores)', 'Hueyapan', 'Morelos'),
(4485, '62812', 'Yiganechxco', 'Hueyapan', 'Morelos'),
(4486, '62813', 'El Chilar Tepeyehualco', 'Hueyapan', 'Morelos'),
(4487, '62813', 'Olivar', 'Hueyapan', 'Morelos'),
(4488, '62814', 'Ahuazutlán', 'Hueyapan', 'Morelos'),
(4489, '62814', 'Amialtenco', 'Hueyapan', 'Morelos'),
(4490, '62814', 'El Chupamirto', 'Hueyapan', 'Morelos'),
(4491, '62814', 'Matlacotla', 'Hueyapan', 'Morelos'),
(4492, '62814', 'Tlalcomulco', 'Hueyapan', 'Morelos'),
(4493, '62815', 'Las Mesas', 'Hueyapan', 'Morelos'),
(4494, '62820', 'Yecapixtla', 'Yecapixtla', 'Morelos'),
(4495, '62823', 'Los Reyes', 'Yecapixtla', 'Morelos'),
(4496, '62823', 'Texcala', 'Yecapixtla', 'Morelos'),
(4497, '62823', 'Zahuatlán', 'Yecapixtla', 'Morelos'),
(4498, '62823', 'Achichipico', 'Yecapixtla', 'Morelos'),
(4499, '62823', 'Tezontetelco', 'Yecapixtla', 'Morelos'),
(4500, '62823', 'Aquiles Serdán', 'Yecapixtla', 'Morelos'),
(4501, '62823', 'Xochitlán', 'Yecapixtla', 'Morelos'),
(4502, '62823', 'El Matadero', 'Yecapixtla', 'Morelos'),
(4503, '62823', 'La Hacienda', 'Yecapixtla', 'Morelos'),
(4504, '62823', 'Los Capulines', 'Yecapixtla', 'Morelos'),
(4505, '62823', 'Zacahuacatla', 'Yecapixtla', 'Morelos'),
(4506, '62824', 'El Rosedal (Rancho el Talín)', 'Yecapixtla', 'Morelos'),
(4507, '62824', 'Paraíso las Flores', 'Yecapixtla', 'Morelos'),
(4508, '62824', 'Agua Zarca', 'Yecapixtla', 'Morelos'),
(4509, '62824', 'Los Amates', 'Yecapixtla', 'Morelos'),
(4510, '62824', 'El Izote', 'Yecapixtla', 'Morelos'),
(4511, '62825', 'Tecajec', 'Yecapixtla', 'Morelos'),
(4512, '62825', 'Huexca', 'Yecapixtla', 'Morelos'),
(4513, '62825', 'Los Limones', 'Yecapixtla', 'Morelos'),
(4514, '62826', 'Loma Bonita', 'Yecapixtla', 'Morelos'),
(4515, '62826', 'Juan Morales', 'Yecapixtla', 'Morelos'),
(4516, '62826', 'Mixtlalcingo', 'Yecapixtla', 'Morelos'),
(4517, '62826', 'Noche Buena', 'Yecapixtla', 'Morelos'),
(4518, '62827', 'Girasoles (Campo el Guaje)', 'Yecapixtla', 'Morelos'),
(4519, '62827', 'Residencial Los Tulipanes', 'Yecapixtla', 'Morelos'),
(4520, '62827', 'Mexquemeca', 'Yecapixtla', 'Morelos'),
(4521, '62827', 'Paraíso Escondido', 'Yecapixtla', 'Morelos'),
(4522, '62828', 'Pazulco', 'Yecapixtla', 'Morelos'),
(4523, '62828', 'Tlamomulco', 'Yecapixtla', 'Morelos'),
(4524, '62828', 'Yecapixteca', 'Yecapixtla', 'Morelos'),
(4525, '62828', 'Francisco I Madero', 'Yecapixtla', 'Morelos'),
(4526, '62828', 'Adolfo López Mateos', 'Yecapixtla', 'Morelos'),
(4527, '62828', 'Los Chichicastles', 'Yecapixtla', 'Morelos'),
(4528, '62828', 'Xalpa', 'Yecapixtla', 'Morelos'),
(4529, '62828', 'Marino Galicia', 'Yecapixtla', 'Morelos'),
(4530, '62830', 'Totolapan', 'Totolapan', 'Morelos'),
(4531, '62832', 'Villa Nicolás Zapata', 'Totolapan', 'Morelos'),
(4532, '62832', 'San Marcos', 'Totolapan', 'Morelos'),
(4533, '62833', 'Colinas del Paraíso', 'Totolapan', 'Morelos'),
(4534, '62833', 'El Jagüey de las Marzanas', 'Totolapan', 'Morelos'),
(4535, '62834', 'Ahuatlán (Asunción Ahuatlán)', 'Totolapan', 'Morelos'),
(4536, '62834', 'Tepetlixpita', 'Totolapan', 'Morelos'),
(4537, '62834', 'Palestina', 'Totolapan', 'Morelos'),
(4538, '62835', 'Nepopualco', 'Totolapan', 'Morelos'),
(4539, '62835', 'La Cañada (San Sebastián)', 'Totolapan', 'Morelos'),
(4540, '62835', 'El Fuerte (San Miguel)', 'Totolapan', 'Morelos'),
(4541, '62835', 'La Joya', 'Totolapan', 'Morelos'),
(4542, '62835', 'Zacatepec', 'Totolapan', 'Morelos'),
(4543, '62840', 'Atlatlahucan', 'Atlatlahucan', 'Morelos'),
(4544, '62840', 'Los Reyes', 'Atlatlahucan', 'Morelos'),
(4545, '62840', 'Santa Bárbara', 'Atlatlahucan', 'Morelos'),
(4546, '62840', 'San Mateo', 'Atlatlahucan', 'Morelos'),
(4547, '62840', 'La Asunción', 'Atlatlahucan', 'Morelos'),
(4548, '62840', 'San Sebastián', 'Atlatlahucan', 'Morelos'),
(4549, '62840', 'San Lucas', 'Atlatlahucan', 'Morelos'),
(4550, '62843', 'Ampliación San Antonio', 'Atlatlahucan', 'Morelos'),
(4551, '62843', 'Emiliano Zapata', 'Atlatlahucan', 'Morelos'),
(4552, '62843', 'San Antonio', 'Atlatlahucan', 'Morelos'),
(4553, '62843', 'Santo Tomás', 'Atlatlahucan', 'Morelos'),
(4554, '62843', 'El Mirador', 'Atlatlahucan', 'Morelos'),
(4555, '62844', 'Hacienda del Rey', 'Atlatlahucan', 'Morelos'),
(4556, '62844', 'San Marcos', 'Atlatlahucan', 'Morelos'),
(4557, '62844', 'La Guadalupana', 'Atlatlahucan', 'Morelos'),
(4558, '62844', 'San Andrés', 'Atlatlahucan', 'Morelos'),
(4559, '62844', 'Santa Ana', 'Atlatlahucan', 'Morelos'),
(4560, '62845', 'Tlaltetelco (San Miguel Tlaltetelco)', 'Atlatlahucan', 'Morelos'),
(4561, '62845', 'Santa Inés', 'Atlatlahucan', 'Morelos'),
(4562, '62845', 'San Diego Tepantongo', 'Atlatlahucan', 'Morelos'),
(4563, '62845', 'El Astillero', 'Atlatlahucan', 'Morelos'),
(4564, '62845', 'Centro Asturiano de México', 'Atlatlahucan', 'Morelos'),
(4565, '62845', 'Hacienda la Alborada', 'Atlatlahucan', 'Morelos'),
(4566, '62845', 'Pozo Mancera', 'Atlatlahucan', 'Morelos'),
(4567, '62845', 'Telchicayac (El Cabellito)', 'Atlatlahucan', 'Morelos'),
(4568, '62845', 'Rancho Santa Cruz', 'Atlatlahucan', 'Morelos'),
(4569, '62845', 'Malpaís', 'Atlatlahucan', 'Morelos'),
(4570, '62846', 'San Francisco', 'Atlatlahucan', 'Morelos'),
(4571, '62846', 'Kilómetro 88', 'Atlatlahucan', 'Morelos'),
(4572, '62846', 'Puntas de Malpaís (Malpaís)', 'Atlatlahucan', 'Morelos'),
(4573, '62846', 'La Tortuga', 'Atlatlahucan', 'Morelos'),
(4574, '62846', 'El Salto', 'Atlatlahucan', 'Morelos'),
(4575, '62846', 'Telminca', 'Atlatlahucan', 'Morelos'),
(4576, '62846', 'Framboyanes', 'Atlatlahucan', 'Morelos'),
(4577, '62846', 'Los Cerritos', 'Atlatlahucan', 'Morelos'),
(4578, '62846', 'El Jaral', 'Atlatlahucan', 'Morelos'),
(4579, '62847', 'San Juan Texcalpan', 'Atlatlahucan', 'Morelos'),
(4580, '62847', 'Lomas de Cocoyoc', 'Atlatlahucan', 'Morelos'),
(4581, '62847', 'Vicente Guerrero', 'Atlatlahucan', 'Morelos'),
(4582, '62847', 'Lomas de San Juan Texcalpan', 'Atlatlahucan', 'Morelos'),
(4583, '62847', 'El Puente', 'Atlatlahucan', 'Morelos'),
(4584, '62850', 'Ocuituco', 'Ocuituco', 'Morelos'),
(4585, '62850', 'Tecamachalco', 'Ocuituco', 'Morelos'),
(4586, '62850', 'Tepexi', 'Ocuituco', 'Morelos'),
(4587, '62853', 'San Nicolás', 'Ocuituco', 'Morelos'),
(4588, '62853', 'La Asunción', 'Ocuituco', 'Morelos'),
(4589, '62854', '5 de Mayo', 'Ocuituco', 'Morelos'),
(4590, '62855', 'Metepec', 'Ocuituco', 'Morelos'),
(4591, '62855', 'La Cebada', 'Ocuituco', 'Morelos'),
(4592, '62855', 'Huauscuautla', 'Ocuituco', 'Morelos'),
(4593, '62855', 'Zacamilpa', 'Ocuituco', 'Morelos'),
(4594, '62855', 'Los Espino', 'Ocuituco', 'Morelos'),
(4595, '62855', 'La Higuera', 'Ocuituco', 'Morelos'),
(4596, '62855', 'La Finca', 'Ocuituco', 'Morelos'),
(4597, '62855', 'Chignahuapan', 'Ocuituco', 'Morelos'),
(4598, '62855', 'La Rosita (Rancho el Paraíso)', 'Ocuituco', 'Morelos'),
(4599, '62855', 'La Ixtla', 'Ocuituco', 'Morelos'),
(4600, '62856', 'Mahoma', 'Ocuituco', 'Morelos'),
(4601, '62857', 'Cruz de Lima', 'Ocuituco', 'Morelos'),
(4602, '62857', 'Santa Mónica', 'Ocuituco', 'Morelos'),
(4603, '62857', 'La Ponderosa', 'Ocuituco', 'Morelos'),
(4604, '62857', 'Casahuatitla', 'Ocuituco', 'Morelos'),
(4605, '62857', 'Colinas del Sol', 'Ocuituco', 'Morelos'),
(4606, '62857', 'Santa Elena de la Cruz', 'Ocuituco', 'Morelos'),
(4607, '62857', 'Tlacuatzingo', 'Ocuituco', 'Morelos'),
(4608, '62857', 'Cerrito Colorado', 'Ocuituco', 'Morelos'),
(4609, '62857', 'Piedra Rajada', 'Ocuituco', 'Morelos'),
(4610, '62860', 'Jumiltepec', 'Ocuituco', 'Morelos'),
(4611, '62863', 'Atenco', 'Ocuituco', 'Morelos'),
(4612, '62863', 'El Cedral', 'Ocuituco', 'Morelos'),
(4613, '62864', 'Atataco', 'Ocuituco', 'Morelos'),
(4614, '62864', 'El Naranjo', 'Ocuituco', 'Morelos'),
(4615, '62865', 'Huepalcalco (San Miguel)', 'Ocuituco', 'Morelos'),
(4616, '62865', 'Ocoxaltepec', 'Ocuituco', 'Morelos'),
(4617, '62865', 'Huejotengo (San Marcos)', 'Ocuituco', 'Morelos'),
(4618, '62865', 'Ocotitla', 'Ocuituco', 'Morelos'),
(4619, '62865', 'Cuestepec', 'Ocuituco', 'Morelos'),
(4620, '62866', 'Tomayo', 'Ocuituco', 'Morelos'),
(4621, '62866', 'Temaxquiticla', 'Ocuituco', 'Morelos'),
(4622, '62867', 'Huecahuasco', 'Ocuituco', 'Morelos'),
(4623, '62870', 'Temoac', 'Temoac', 'Morelos'),
(4624, '62873', 'Popotlán ( Barrio de Santo Tomás )', 'Temoac', 'Morelos'),
(4625, '62873', 'Los Cuatecomates', 'Temoac', 'Morelos'),
(4626, '62880', 'Campo el Limón', 'Temoac', 'Morelos'),
(4627, '62880', 'Huazulco', 'Temoac', 'Morelos'),
(4628, '62885', 'Amilcingo', 'Temoac', 'Morelos'),
(4629, '62887', 'Escuela Normal Rural Amilcingo', 'Temoac', 'Morelos'),
(4630, '62887', 'El Puente Nuevo', 'Temoac', 'Morelos'),
(4631, '62890', 'Zacualpan de Amilpas', 'Zacualpan de Amilpas', 'Morelos'),
(4632, '62890', 'Guadalupe Victoria', 'Zacualpan de Amilpas', 'Morelos'),
(4633, '62890', 'Las Presas', 'Zacualpan de Amilpas', 'Morelos'),
(4634, '62893', 'Barranca Amatzinac', 'Zacualpan de Amilpas', 'Morelos'),
(4635, '62893', 'Curiel', 'Zacualpan de Amilpas', 'Morelos'),
(4636, '62895', 'Tlacotepec', 'Zacualpan de Amilpas', 'Morelos'),
(4637, '62895', 'La Compuerta', 'Zacualpan de Amilpas', 'Morelos'),
(4638, '62896', 'Toribio Rivera', 'Zacualpan de Amilpas', 'Morelos'),
(4639, '62897', 'La Presa (El Cerro de la Era)', 'Zacualpan de Amilpas', 'Morelos'),
(4640, '62900', 'Jojutla Centro', 'Jojutla', 'Morelos'),
(4641, '62900', 'Emiliano Zapata', 'Jojutla', 'Morelos'),
(4642, '62900', 'Reforma', 'Jojutla', 'Morelos'),
(4643, '62900', 'Cuauhtémoc', 'Jojutla', 'Morelos'),
(4644, '62900', 'Benito Juárez', 'Jojutla', 'Morelos'),
(4645, '62900', 'Las Calaveras', 'Jojutla', 'Morelos'),
(4646, '62900', 'Del Bosque', 'Jojutla', 'Morelos'),
(4647, '62900', 'El Higuerón', 'Jojutla', 'Morelos'),
(4648, '62900', 'El Pochote', 'Jojutla', 'Morelos'),
(4649, '62900', 'El Zapatito', 'Jojutla', 'Morelos'),
(4650, '62900', 'El Jagüey', 'Jojutla', 'Morelos'),
(4651, '62900', 'La Pastrana', 'Jojutla', 'Morelos'),
(4652, '62900', 'Los Arrozales', 'Jojutla', 'Morelos'),
(4653, '62900', 'San Jerónimo', 'Jojutla', 'Morelos'),
(4654, '62900', 'Las Cañas', 'Jojutla', 'Morelos'),
(4655, '62900', 'Panchimalco', 'Jojutla', 'Morelos'),
(4656, '62905', 'Álamos (La Frontera)', 'Jojutla', 'Morelos'),
(4657, '62905', 'Nexpa', 'Jojutla', 'Morelos'),
(4658, '62906', 'Higuerón', 'Jojutla', 'Morelos'),
(4659, '62906', 'Pedro Amaro', 'Jojutla', 'Morelos'),
(4660, '62906', 'Ampliación Lázaro Cárdenas (El Molino)', 'Jojutla', 'Morelos'),
(4661, '62907', 'Santa María', 'Jojutla', 'Morelos'),
(4662, '62907', 'Tlatenchi', 'Jojutla', 'Morelos'),
(4663, '62907', 'Vicente Guerrero', 'Jojutla', 'Morelos'),
(4664, '62907', 'Independencia', 'Jojutla', 'Morelos'),
(4665, '62907', 'Ricardo Soto', 'Jojutla', 'Morelos'),
(4666, '62908', 'Bonanza', 'Jojutla', 'Morelos'),
(4667, '62908', 'Buenos Aires', 'Jojutla', 'Morelos'),
(4668, '62908', 'Las Fincas de Tequesquitengo', 'Jojutla', 'Morelos'),
(4669, '62908', 'Ampliación Santa María', 'Jojutla', 'Morelos'),
(4670, '62909', 'Constitución del 57', 'Jojutla', 'Morelos'),
(4671, '62909', 'José María Morelos y Pavón', 'Jojutla', 'Morelos'),
(4672, '62909', 'Jicarero', 'Jojutla', 'Morelos'),
(4673, '62909', 'Nicolás Bravo', 'Jojutla', 'Morelos'),
(4674, '62909', 'Ampliación Nicolás Bravo', 'Jojutla', 'Morelos'),
(4675, '62909', 'Los Pilares', 'Jojutla', 'Morelos'),
(4676, '62910', 'Tehuixtla', 'Jojutla', 'Morelos'),
(4677, '62912', 'Campo San Pablo', 'Jojutla', 'Morelos'),
(4678, '62913', 'Loma Bonita (arenales)', 'Jojutla', 'Morelos'),
(4679, '62914', 'Guadalupe', 'Jojutla', 'Morelos'),
(4680, '62914', 'Azuchilera', 'Jojutla', 'Morelos'),
(4681, '62914', 'La Mesa de los Indios', 'Jojutla', 'Morelos'),
(4682, '62914', 'Emiliano Zapata', 'Jojutla', 'Morelos'),
(4683, '62915', 'Tequesquitengo', 'Jojutla', 'Morelos'),
(4684, '62916', 'Las Brasileras', 'Jojutla', 'Morelos'),
(4685, '62917', 'Chisco', 'Jojutla', 'Morelos'),
(4686, '62917', 'Vicente Aranda (San Rafael)', 'Jojutla', 'Morelos'),
(4687, '62917', 'Río Seco', 'Jojutla', 'Morelos'),
(4688, '62917', 'Tenerías', 'Jojutla', 'Morelos'),
(4689, '62917', 'Los Lagartos', 'Jojutla', 'Morelos'),
(4690, '62920', 'Tepalcingo', 'Tepalcingo', 'Morelos'),
(4691, '62920', 'San Francisco', 'Tepalcingo', 'Morelos'),
(4692, '62920', 'La Concepción', 'Tepalcingo', 'Morelos'),
(4693, '62920', 'Buenos Aires', 'Tepalcingo', 'Morelos'),
(4694, '62920', 'Palo Revuelto', 'Tepalcingo', 'Morelos'),
(4695, '62920', 'Guadalupe', 'Tepalcingo', 'Morelos'),
(4696, '62920', 'Los Reyes', 'Tepalcingo', 'Morelos'),
(4697, '62920', 'San Martín', 'Tepalcingo', 'Morelos'),
(4698, '62920', 'Santuario', 'Tepalcingo', 'Morelos'),
(4699, '62920', 'Emiliano Zapata', 'Tepalcingo', 'Morelos'),
(4700, '62923', 'Adolfo López Mateos', 'Tepalcingo', 'Morelos'),
(4701, '62923', 'Huitchila', 'Tepalcingo', 'Morelos'),
(4702, '62923', 'Cruz de Jaramalla ( Lauro Ortega )', 'Tepalcingo', 'Morelos'),
(4703, '62924', 'Ixtlilco El Chico', 'Tepalcingo', 'Morelos'),
(4704, '62924', 'El Bambú (La Presa)', 'Tepalcingo', 'Morelos'),
(4705, '62924', 'Mano Pintada', 'Tepalcingo', 'Morelos'),
(4706, '62925', 'Los Vergeles', 'Tepalcingo', 'Morelos'),
(4707, '62925', 'Atotonilco', 'Tepalcingo', 'Morelos'),
(4708, '62925', 'Los Tulipanes', 'Tepalcingo', 'Morelos'),
(4709, '62925', '20 de Noviembre', 'Tepalcingo', 'Morelos'),
(4710, '62925', 'La Vía', 'Tepalcingo', 'Morelos'),
(4711, '62926', 'Ixtlilco El Grande', 'Tepalcingo', 'Morelos'),
(4712, '62926', 'La Junta', 'Tepalcingo', 'Morelos'),
(4713, '62926', 'Las Joyas', 'Tepalcingo', 'Morelos'),
(4714, '62926', 'El Pozo', 'Tepalcingo', 'Morelos'),
(4715, '62926', 'La Joyita de Piedra Grande', 'Tepalcingo', 'Morelos'),
(4716, '62927', 'Pitzotlán', 'Tepalcingo', 'Morelos'),
(4717, '62927', 'Zacapalco', 'Tepalcingo', 'Morelos'),
(4718, '62927', 'El Tepehuaje', 'Tepalcingo', 'Morelos'),
(4719, '62927', 'Los Sauces', 'Tepalcingo', 'Morelos'),
(4720, '62927', 'El Limón de Cuahuchichinola', 'Tepalcingo', 'Morelos'),
(4721, '62927', 'Molotlál ( Mogotlán )', 'Tepalcingo', 'Morelos'),
(4722, '62927', 'Emiliano Zapata', 'Tepalcingo', 'Morelos'),
(4723, '62930', 'Jonacatepec de Leandro Valle Centro', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4724, '62933', 'López de Nava', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4725, '62933', 'Zull Ayot', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4726, '62933', 'La Capilla', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4727, '62934', 'Leandro Valle', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4728, '62935', 'Ex-Hacienda Montefalco', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4729, '62935', 'El Carrizal', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4730, '62936', 'La Divina Providencia', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4731, '62936', 'La Yesera', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4732, '62936', 'Santa Cruz', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4733, '62936', 'El Puente Angosto', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4734, '62936', 'Las Bugambilias', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4735, '62936', 'La Casa de Piedra', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4736, '62936', 'El Abrevadero (Campo Mata Redonda)', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4737, '62937', 'Amacuitlapilco', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4738, '62937', 'Tlayca', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4739, '62937', 'Emiliano Zapata', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4740, '62937', 'Juárez', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4741, '62940', 'Tetelilla', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4742, '62943', 'El Puente Colorado', 'Jonacatepec de Leandro Valle', 'Morelos'),
(4743, '62950', 'Axochiapan', 'Axochiapan', 'Morelos'),
(4744, '62950', 'La Luz', 'Axochiapan', 'Morelos'),
(4745, '62950', 'Otilio Montaño', 'Axochiapan', 'Morelos'),
(4746, '62952', 'Industrial', 'Axochiapan', 'Morelos'),
(4747, '62952', 'Vista Hermosa', 'Axochiapan', 'Morelos'),
(4748, '62952', 'Bugambilias', 'Axochiapan', 'Morelos'),
(4749, '62953', 'Del Carmen', 'Axochiapan', 'Morelos'),
(4750, '62953', 'Las Ardillas', 'Axochiapan', 'Morelos'),
(4751, '62953', 'Progreso', 'Axochiapan', 'Morelos'),
(4752, '62953', 'Las Palmas', 'Axochiapan', 'Morelos'),
(4753, '62954', 'Florida', 'Axochiapan', 'Morelos'),
(4754, '62954', 'Biznaga', 'Axochiapan', 'Morelos'),
(4755, '62954', 'Centenario', 'Axochiapan', 'Morelos'),
(4756, '62954', 'Emiliano Zapata', 'Axochiapan', 'Morelos'),
(4757, '62955', 'Tlalayo', 'Axochiapan', 'Morelos'),
(4758, '62955', 'Cuauhtémoc', 'Axochiapan', 'Morelos'),
(4759, '62955', 'Los Tres Reyes', 'Axochiapan', 'Morelos'),
(4760, '62955', 'El C.B.T.A.', 'Axochiapan', 'Morelos'),
(4761, '62955', 'Carrillo Olea (La Primavera)', 'Axochiapan', 'Morelos'),
(4762, '62955', 'El Mirador', 'Axochiapan', 'Morelos'),
(4763, '62955', 'Los Linderos (Fábrica de Yeso)', 'Axochiapan', 'Morelos'),
(4764, '62955', 'Rubén Carrillo', 'Axochiapan', 'Morelos'),
(4765, '62955', 'Los Gavilanes', 'Axochiapan', 'Morelos'),
(4766, '62955', 'La Estación', 'Axochiapan', 'Morelos'),
(4767, '62955', '5 de Mayo', 'Axochiapan', 'Morelos'),
(4768, '62956', 'Ahuaxtla', 'Axochiapan', 'Morelos'),
(4769, '62956', 'Benito Juárez', 'Axochiapan', 'Morelos'),
(4770, '62956', 'El Papagayo', 'Axochiapan', 'Morelos'),
(4771, '62956', 'Los Laureles', 'Axochiapan', 'Morelos'),
(4772, '62956', 'Cabrera', 'Axochiapan', 'Morelos'),
(4773, '62956', 'Palo Blanco', 'Axochiapan', 'Morelos'),
(4774, '62956', 'El Guamúchil', 'Axochiapan', 'Morelos'),
(4775, '62956', 'Los Límites', 'Axochiapan', 'Morelos'),
(4776, '62956', 'Juan Ortega Sánchez', 'Axochiapan', 'Morelos'),
(4777, '62956', 'La Piedra Colorada', 'Axochiapan', 'Morelos'),
(4778, '62957', 'Quebrantadero', 'Axochiapan', 'Morelos'),
(4779, '62957', 'Joaquín Camaño', 'Axochiapan', 'Morelos'),
(4780, '62957', 'Campo la Laguna', 'Axochiapan', 'Morelos'),
(4781, '62957', 'El Edén', 'Axochiapan', 'Morelos'),
(4782, '62957', 'Las Palmas (La Poza del Pajarito)', 'Axochiapan', 'Morelos'),
(4783, '62957', 'El Mezquital', 'Axochiapan', 'Morelos'),
(4784, '62957', 'Las Tinajas', 'Axochiapan', 'Morelos'),
(4785, '62962', 'Marcelino Rodríguez (San Ignacio)', 'Axochiapan', 'Morelos'),
(4786, '62962', 'Cayehuacán', 'Axochiapan', 'Morelos'),
(4787, '62962', 'La Nopalera', 'Axochiapan', 'Morelos'),
(4788, '62962', 'Nueva Esperanza', 'Axochiapan', 'Morelos'),
(4789, '62962', 'La Toma', 'Axochiapan', 'Morelos'),
(4790, '62962', 'Los Carros', 'Axochiapan', 'Morelos'),
(4791, '62963', 'Atlacahualoya', 'Axochiapan', 'Morelos'),
(4792, '62963', 'Coayuca de Morelos', 'Axochiapan', 'Morelos'),
(4793, '62963', 'La Huerta (La Bomba Dos)', 'Axochiapan', 'Morelos'),
(4794, '62963', 'Los Nacahuites', 'Axochiapan', 'Morelos'),
(4795, '62963', 'La Joya del Zompa', 'Axochiapan', 'Morelos'),
(4796, '62965', 'Campo Jicamal', 'Axochiapan', 'Morelos'),
(4797, '62965', 'Telixtac', 'Axochiapan', 'Morelos'),
(4798, '62966', '2000', 'Axochiapan', 'Morelos'),
(4799, '62970', 'Jantetelco Centro', 'Jantetelco', 'Morelos'),
(4800, '62970', 'Manuel Alarcón', 'Jantetelco', 'Morelos'),
(4801, '62970', 'Mariana Díaz', 'Jantetelco', 'Morelos'),
(4802, '62972', 'Amayuca', 'Jantetelco', 'Morelos'),
(4803, '62972', 'Gabriel Tepepa', 'Jantetelco', 'Morelos'),
(4804, '62973', 'Serafín Marcial Bonilla', 'Jantetelco', 'Morelos'),
(4805, '62974', 'Mariano Matamoros', 'Jantetelco', 'Morelos'),
(4806, '62974', 'Alondra', 'Jantetelco', 'Morelos'),
(4807, '62974', 'Cuatro Caminos', 'Jantetelco', 'Morelos'),
(4808, '62974', 'Nuevo Xochimilco', 'Jantetelco', 'Morelos'),
(4809, '62974', 'Santa Lucía', 'Jantetelco', 'Morelos'),
(4810, '62975', 'Los Bordos', 'Jantetelco', 'Morelos'),
(4811, '62975', 'La Y', 'Jantetelco', 'Morelos'),
(4812, '62975', 'La Renta', 'Jantetelco', 'Morelos'),
(4813, '62976', 'La Laja', 'Jantetelco', 'Morelos'),
(4814, '62977', 'Chalcatzingo', 'Jantetelco', 'Morelos'),
(4815, '62977', 'La Joya', 'Jantetelco', 'Morelos'),
(4816, '62978', 'San Antonio La Esperanza', 'Jantetelco', 'Morelos'),
(4817, '62978', 'Tenango (Santa Ana)', 'Jantetelco', 'Morelos'),
(4818, '62978', 'Emiliano Zapata (La Granja)', 'Jantetelco', 'Morelos'),
(4819, '62978', 'La Huerta', 'Jantetelco', 'Morelos'),
(4820, '62978', 'Peñón de los Baños', 'Jantetelco', 'Morelos'),
(4821, '62980', 'Tlaquiltenango', 'Tlaquiltenango', 'Morelos'),
(4822, '62980', 'Vista Alegre', 'Tlaquiltenango', 'Morelos'),
(4823, '62980', 'Gabriel Tepepa', 'Tlaquiltenango', 'Morelos'),
(4824, '62980', 'El Texcal', 'Tlaquiltenango', 'Morelos'),
(4825, '62980', 'Los Presidentes', 'Tlaquiltenango', 'Morelos'),
(4826, '62980', 'Alfredo V. Bonfil (Chacampalco)', 'Tlaquiltenango', 'Morelos'),
(4827, '62980', 'Cantora', 'Tlaquiltenango', 'Morelos'),
(4828, '62980', 'Plan de Ayala', 'Tlaquiltenango', 'Morelos'),
(4829, '62982', 'Villas de Jojutla', 'Tlaquiltenango', 'Morelos'),
(4830, '62983', 'Miguel Hidalgo', 'Tlaquiltenango', 'Morelos'),
(4831, '62983', '3 de Mayo (El Tepiolol)', 'Tlaquiltenango', 'Morelos'),
(4832, '62984', 'Celerino Manzanares', 'Tlaquiltenango', 'Morelos'),
(4833, '62984', 'Emiliano Zapata', 'Tlaquiltenango', 'Morelos'),
(4834, '62984', 'Palo Grande', 'Tlaquiltenango', 'Morelos'),
(4835, '62985', 'La Mezquitera (El Astillero)', 'Tlaquiltenango', 'Morelos'),
(4836, '62985', 'La Era (Calalpa)', 'Tlaquiltenango', 'Morelos'),
(4837, '62985', 'Las Carpas', 'Tlaquiltenango', 'Morelos'),
(4838, '62985', 'Las Bóvedas', 'Tlaquiltenango', 'Morelos'),
(4839, '62986', 'Chimalacatlán', 'Tlaquiltenango', 'Morelos'),
(4840, '62986', 'Lorenzo Vázquez (Santa Cruz)', 'Tlaquiltenango', 'Morelos'),
(4841, '62986', 'Quilamula', 'Tlaquiltenango', 'Morelos'),
(4842, '62986', 'San José de Pala', 'Tlaquiltenango', 'Morelos'),
(4843, '62986', 'Valle de Vázquez (Los Hornos)', 'Tlaquiltenango', 'Morelos'),
(4844, '62986', 'Los Dormidos', 'Tlaquiltenango', 'Morelos'),
(4845, '62987', 'Los Elotes (San Miguel de los Elotes)', 'Tlaquiltenango', 'Morelos'),
(4846, '62987', 'Pueblo Viejo', 'Tlaquiltenango', 'Morelos'),
(4847, '62987', 'Xicatlacotla', 'Tlaquiltenango', 'Morelos'),
(4848, '62987', 'Nexpa', 'Tlaquiltenango', 'Morelos'),
(4849, '62987', 'Paso de Palapa', 'Tlaquiltenango', 'Morelos'),
(4850, '62988', 'Huixastla', 'Tlaquiltenango', 'Morelos'),
(4851, '62988', 'Coaxitlán', 'Tlaquiltenango', 'Morelos'),
(4852, '62988', 'El Calabazal (Rancho la Ceiba)', 'Tlaquiltenango', 'Morelos'),
(4853, '62990', 'Huautla', 'Tlaquiltenango', 'Morelos'),
(4854, '62993', 'Ajuchitlán', 'Tlaquiltenango', 'Morelos'),
(4855, '62994', 'Rancho Viejo', 'Tlaquiltenango', 'Morelos'),
(4856, '62995', 'Huaxtla', 'Tlaquiltenango', 'Morelos'),
(4857, '62995', 'La Bomba', 'Tlaquiltenango', 'Morelos'),
(4858, '62996', 'Xochipala', 'Tlaquiltenango', 'Morelos'),
(4859, '62996', 'Santiopa', 'Tlaquiltenango', 'Morelos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_entidad_federativa`
--

CREATE TABLE `t_cat_entidad_federativa` (
  `id_cat_entidad_federativa` int(11) NOT NULL,
  `entidad_federativa` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_entidad_federativa`
--

INSERT INTO `t_cat_entidad_federativa` (`id_cat_entidad_federativa`, `entidad_federativa`) VALUES
(1, 'Aguascalientes'),
(2, 'Baja California Norte'),
(3, 'Baja California Sur'),
(4, 'Campeche'),
(5, 'Coahuila'),
(6, 'Colima'),
(7, 'Chiapas'),
(8, 'Chihuahua'),
(9, 'Distrito Federal'),
(10, 'Durango'),
(11, 'Guanajuato'),
(12, 'Guerrero'),
(13, 'Hidalgo'),
(14, 'Jalisco'),
(15, 'M?xico Estado de'),
(16, 'Michoac?n'),
(17, 'Morelos'),
(18, 'Nayarit'),
(19, 'Nuevo Le?n'),
(20, 'Oaxaca'),
(21, 'Puebla'),
(22, 'Quer?taro'),
(23, 'Quintana Roo'),
(24, 'San Luis Potos?'),
(25, 'Sinaloa'),
(26, 'Sonora'),
(27, 'Tabasco'),
(28, 'Tamaulipas'),
(29, 'Tlaxcala'),
(30, 'Veracruz'),
(31, 'Yucatan'),
(32, 'Zacatecas'),
(33, 'Extranjero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_escolaridad`
--

CREATE TABLE `t_cat_escolaridad` (
  `id_cat_escolaridad` int(11) NOT NULL,
  `escolaridad` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_escolaridad`
--

INSERT INTO `t_cat_escolaridad` (`id_cat_escolaridad`, `escolaridad`) VALUES
(1, 'Posgrado'),
(2, 'Bachillerato'),
(3, 'Licenciatura'),
(4, 'Bachillerato Técnico'),
(5, 'Bachillerato Profesional');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_escuela_procedencia`
--

CREATE TABLE `t_cat_escuela_procedencia` (
  `id_cat_escuela_procedencia` int(11) NOT NULL,
  `siglas` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_escuela_procedencia`
--

INSERT INTO `t_cat_escuela_procedencia` (`id_cat_escuela_procedencia`, `siglas`, `descripcion`) VALUES
(1, 'COLBACH', 'Colegios de Bachilleres'),
(2, 'PE', 'Preparatorias Estatales'),
(3, 'PP', 'Preparatorias Particulares'),
(4, 'CBTIS', 'Centros de Bach. Tec. Ind. y de Serv.'),
(5, 'CETIS', 'Centro de Est.  Tec. Ind. y de Serv.'),
(6, 'CETMAR', 'Centro de Est.  Tec. del Mar'),
(7, 'CETAC', 'Centro de Est.  Tec. de Aguas Cont.'),
(8, 'CBTA', 'Centro de Bach. Tec. Agropecuario'),
(9, 'CBTF', 'Centro de Bach. Tec. Forestal'),
(10, 'CCH', 'Colegio de Ciencias y Humanidades'),
(11, 'ENP', 'Escuela Nacional Preparatoria'),
(12, 'CECyTEQ', 'Colegio de Est. Cient. y Tecnol. del edo. de Qro.'),
(13, 'IPN', 'Centro de Estudios Cientif. y Tec.'),
(14, 'CETI', 'Centro de Ense?anza Tec. Ind.'),
(15, 'Otro', 'Otros'),
(16, 'CONALEP', 'Colegios Nacionales de Educacion Profesional'),
(17, 'VB', 'Video Bachilletaros'),
(18, 'EMSAD', 'Educaci?n Media Superior a Distancia '),
(19, 'CEDAR', 'Centro de Educación Artistica '),
(20, 'SEDEQ', 'Secretar?a de Educaci?n del Estado de Quer?taro'),
(21, 'UAQ', 'Universidad Aut?noma de Quer?taro (UAQ)'),
(22, 'DGETI', 'Direcci?n General de Educaci?n Tecnol?gica Industrial'),
(23, 'DGETA', 'Direcci?n Gral. de Educaci?n Tecnol?gica Agropecuaria '),
(24, 'SEP', 'Secretar?a de Educacion P?blica '),
(25, 'UNAM', 'Universidad Nacional Aut?noma de M?xico ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_especialidad`
--

CREATE TABLE `t_cat_especialidad` (
  `id_cat_especialidad` int(11) NOT NULL,
  `fk_cat_carrera` int(11) DEFAULT NULL,
  `especialidad` varchar(255) DEFAULT NULL,
  `fk_reticula` int(11) DEFAULT NULL,
  `periodo_inicio` date DEFAULT NULL,
  `periodo_fin` date DEFAULT NULL,
  `creditos_especialidad` int(11) DEFAULT NULL,
  `creditos_optativos` int(11) DEFAULT NULL,
  `estatus` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_especialidad`
--

INSERT INTO `t_cat_especialidad` (`id_cat_especialidad`, `fk_cat_carrera`, `especialidad`, `fk_reticula`, `periodo_inicio`, `periodo_fin`, `creditos_especialidad`, `creditos_optativos`, `estatus`) VALUES
(1, 1, 'GESTIÓN Y DESARROLLO DE EMPRESAS', 1, '2022-11-27', '2043-01-06', 24, 24, 1),
(2, 2, 'DISEÑO DE MANUFACTURA ASISTIDA POR COMPUTADORA', 2, '2022-11-28', '2042-12-30', 12, 34, 1),
(3, 3, 'DESARROLLO WEB FULL STACK', 3, '2022-12-06', '2042-12-29', 22, 22, 1),
(4, 1, 'Sin especialidad', 1, NULL, NULL, 0, 0, 1),
(5, 2, 'Sin especialidad', 1, NULL, NULL, 0, 0, 1),
(6, 3, 'Sin especialidad', 1, NULL, NULL, 0, 0, 1),
(8, 3, 'PRUEBA', 3, '2022-12-20', '2022-12-28', 21, 21, 0),
(9, 3, 'PRUEBA2', 3, '2022-12-13', '2022-12-14', 21, 21, 0),
(10, 1, 'PRUEBA3', 1, '2022-11-28', '2022-12-29', 33, 33, 0),
(11, 3, 'DESARROLLO DE SISTEMAS WEB', 3, '2022-12-06', '2042-12-29', 22, 22, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_estado_civil`
--

CREATE TABLE `t_cat_estado_civil` (
  `id_cat_estado_civil` int(11) NOT NULL,
  `estado_civil` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_estado_civil`
--

INSERT INTO `t_cat_estado_civil` (`id_cat_estado_civil`, `estado_civil`) VALUES
(1, 'Soltero'),
(2, 'Casado'),
(3, 'Divorciado'),
(4, 'Separación en proceso judicial'),
(5, 'Viudo'),
(6, 'Concubinato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_estatus`
--

CREATE TABLE `t_cat_estatus` (
  `id_cat_estatus` int(11) NOT NULL,
  `estatus` varchar(10) DEFAULT NULL,
  `descripcion_estatus` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_estatus`
--

INSERT INTO `t_cat_estatus` (`id_cat_estatus`, `estatus`, `descripcion_estatus`) VALUES
(1, 'ACT', 'Activo'),
(2, 'INS', 'Inscrito'),
(3, 'BT1', 'Baja temporal Voluntaria'),
(4, 'BT2', 'Baja temporal por adeudo de exámenes especiales'),
(5, 'BT3', 'Baja temporal por no inscripción'),
(6, 'BD1', 'Baja definitiva voluntaria'),
(7, 'BD2', 'Baja definitiva por reprobación en primer semestre'),
(8, 'BD3', 'Baja definitiva por examen especial reprobado'),
(9, 'BD4', 'Baja definitiva por alcanzar el número máximo semestres permitido'),
(10, 'BD5', 'Baja definitiva por no inscripción a segundo semestre'),
(11, 'BD6', 'Baja definitiva por no cumplir con requisito de inscripción'),
(12, 'EGR', 'Egresado'),
(13, 'TIT', 'Titulado'),
(14, 'BT4', 'Baja Temporal por Enfermedad'),
(15, 'BD7', 'Baja Definitiva por Enfermedad'),
(16, 'BD8', 'Baja Definitiva traslado S.A.'),
(17, 'BD9', 'Baja Definitiva traslado otro Tec'),
(18, 'BDA', 'Baja Definitiva 3 periodos fuera'),
(19, 'BDB', 'Baja Definitiva Fallecimiento'),
(20, 'BDC', 'Baja Definitiva Indisciplina'),
(21, 'BDD', 'Baja Definitiva de maestria por reprobacion de 2 asignaturas'),
(22, 'BDE', 'Baja Definitiva de maestria por reprobacion de la misma asignatura'),
(23, 'INT', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_estatus_seleccion`
--

CREATE TABLE `t_cat_estatus_seleccion` (
  `id_cat_estatus_seleccion` int(11) NOT NULL,
  `sigla` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_estudios_padres`
--

CREATE TABLE `t_cat_estudios_padres` (
  `id_cat_estudios_padres` int(11) NOT NULL,
  `nivel` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_genero`
--

CREATE TABLE `t_cat_genero` (
  `id_cat_genero` int(11) NOT NULL,
  `genero` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_genero`
--

INSERT INTO `t_cat_genero` (`id_cat_genero`, `genero`) VALUES
(1, 'Lesbiana'),
(2, 'Gay'),
(3, 'Bisexual'),
(4, 'Transgénero'),
(5, 'Transexual'),
(6, 'Travesti'),
(7, 'Queer'),
(8, 'Asexual');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_justificacion`
--

CREATE TABLE `t_cat_justificacion` (
  `id_cat_justificacion` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_justificacion`
--

INSERT INTO `t_cat_justificacion` (`id_cat_justificacion`, `descripcion`) VALUES
(1, 'DIRECTOR'),
(2, 'SUBDIRECTOR DE PLANEACION Y VINCULACION'),
(3, 'SUBDIRECTOR ACADEMICO'),
(4, 'SUBDIRECTOR DE SERVICIOS ADMINISTRATIVOS'),
(5, 'JEFE DE DEPARTAMENTO DE PLANEACION PROGR'),
(6, 'JEFE DE DEPARTAMENTO DE GESTION TECN. Y'),
(7, 'JEFE DE DEPARTAMENTO DE COMUNICACION Y D'),
(8, 'JEFE DE DEPARTAMENTO DE ACTIVIDADES EXTR'),
(9, 'JEFE DE CENTRO DE INFORMACION'),
(10, 'JEFE DE DEPARTAMENTO DE CIENCIAS BASICAS'),
(11, 'JEFE DE CENTRO DE COMPUTO'),
(12, 'JEFE DE DEPARTAMENTO DE METAL MECANICA'),
(13, 'JEFE DE DEPARTAMENTO DE ING. QUIMICA Y B'),
(14, 'JEFE DE DEPARTAMENTO DE ING. INDUSTRIAL'),
(15, 'JEFE DE DEPARTAMENTO DE ING.ELECTRICA Y'),
(16, 'JEFE DE DEPARTAMENTO DE CIENCIA ECONOMIC'),
(17, 'JEFE DE DEPARTAMENTO DE DESARROLLO ACADE'),
(18, 'JEFE DE DIVISION DE ESTUDIOS PROFESIONAL'),
(19, 'JEFE DE DIVISION DE ESTUDIOS DE POSGRADO'),
(20, 'JEFE DE DEPARTAMENTO DE RECURSOS HUMANOS'),
(21, 'JEFE DE DEPARTAMENTO DE RECURSOS FINANCI'),
(22, 'JEFE DE DEPARTAMENTO DE RECURSOS MATERIA'),
(23, 'JEFE DE DEPARTAMENTO DE MANTENIMIENTO DE'),
(24, 'JEFE DE OFICINA DE DESARROLLO INSTITUCIO'),
(25, 'JEFE DE OFICINA DE PROGRAMACION Y EVALUA'),
(26, 'JEFE DE OFICINA DE CONSTRUCCION Y EQUIPA'),
(27, 'JEFE DE OFICINA DE PRACTICAS Y PROMOSION'),
(28, 'JEFE DE OFICINA DE SERVICIO SOCIAL Y DES'),
(29, 'JEFE DE OFICINA DE SERVICIOS EXTERNOS'),
(30, 'JEFE DE OFICINA DE DIFUSION ESCRITA'),
(31, 'JEFE DE OFICINA DE DIFUSION AUDIOVISUAL'),
(32, 'JEFE DE OFICINA DE EDITORIAL'),
(33, 'JEFE DE OFICINA DE PROMOCION CULTURAL'),
(34, 'JEFE DE OFICINA DE PROMOCION DEPORTIVA'),
(35, 'JEFE DE OFICINA DE CONTROL ESCOLAR'),
(36, 'JEFE DE OFICINA DE SERVICIOS ESTUDIANTIL'),
(37, 'JEFE DE OFICINA DE ORGANIZACION BIBLIOGR'),
(38, 'JEFE DE OFICINA DE SERVICIO A USUARIOS'),
(39, 'JEFE DE OFICINA DE SERVICIOS ESPECIALIZA'),
(40, 'JEFE DE OFICINA DE REGISTROS Y CONTROLES'),
(41, 'JEFE DE OFICINA DE SERVICIO AL PERSONAL'),
(42, 'JEFE DE OFICINA DE TESORERIA'),
(43, 'JEFE DE OFICINA DE CONTABILIDAD Y PRESUP'),
(44, 'JEFE DE OFICINA DE CONTROL DE INGRESOS P'),
(45, 'JEFE DE OFICINA DE ADQUISICIONES'),
(46, 'JEFE DE OFICINA DE ALMACEN E INVENTARIOS'),
(47, 'JEFE DE OFICINA DE SERVICIOS GENERALES'),
(48, 'JEFE DE OFICINA DE MANTENIMIENTO PREVENT'),
(49, 'JEFE DE OFICINA DE MANTENIMIENTO CORRECT'),
(50, 'JEFE DE LABORATORIO'),
(51, 'JEFE DE PROYECTO DE VINCULACION'),
(52, 'JEFE DE PROYECTO DE DOCENCIA'),
(53, 'JEFE DE PROYECTO DE INVESTIGACION'),
(54, 'COORDINACION DE INVESTIGACION EDUCATIVA'),
(55, 'COORDINACION DE ACTUALIZACION DOCENTE'),
(56, 'COORDINACION DE ORIENTACION EDUCATIVA'),
(57, 'COORDINACION DE METODOS Y MEDIOS EDUCATI'),
(58, 'COORDINACION DE CARRERA DE ING. MECANICA'),
(59, 'COORDINACION DE CARRERA DE ING. ELECTROM'),
(60, 'COORDINACION DE CARRERA DE ING. ELECTRIC'),
(61, 'COORDINACION DE CARRERA DE ING. ELECTRON'),
(62, 'COORDINACION DE CARRERA DE ING. EN MATER'),
(63, 'COORDINACION DE CARRERA DE ING. QUIMICA'),
(64, 'COORDINACION DE CARRERA DE ING. INDUSTRI'),
(65, 'COORDINACION DE CARRERA DE LIC. EN ADMIN'),
(66, 'COORDINACION DE APOYO A LA TITULACION CO'),
(67, 'COORDINACION DE DESARROLLO DE SISTEMAS'),
(68, 'COORDINACION DE SERVICIOS DE COMPUTO'),
(69, 'ANIO SABATICO'),
(70, 'LICENCIA SINDICAL'),
(71, 'COMISION'),
(72, 'BECA COMISION'),
(73, 'INCAPACIDAD POR MOTIVO DE SALUD'),
(74, 'RD DE SGC'),
(75, 'AUXILIAR DE LABORATORIO'),
(76, 'SECRETARIO GENERAL DELEGACION DII3'),
(77, 'CONTROLADOR DE DOCUMENTOS DEL SGC'),
(78, 'DIRECTOR'),
(79, 'SUBDIRECTOR DE PLANEACION Y VINCULACION'),
(80, 'SUBDIRECTOR ACADEMICO'),
(81, 'SUBDIRECTOR DE SERVICIOS ADMINISTRATIVOS'),
(82, 'JEFE DE DEPARTAMENTO DE PLANEACION PROGR'),
(83, 'JEFE DE DEPARTAMENTO DE GESTION TECN. Y'),
(84, 'JEFE DE DEPARTAMENTO DE COMUNICACION Y D'),
(85, 'JEFE DE DEPARTAMENTO DE ACTIVIDADES EXTR'),
(86, 'JEFE DE CENTRO DE INFORMACION'),
(87, 'JEFE DE DEPARTAMENTO DE CIENCIAS BASICAS'),
(88, 'JEFE DE CENTRO DE COMPUTO'),
(89, 'JEFE DE DEPARTAMENTO DE METAL MECANICA'),
(90, 'JEFE DE DEPARTAMENTO DE ING. QUIMICA Y B'),
(91, 'JEFE DE DEPARTAMENTO DE ING. INDUSTRIAL'),
(92, 'JEFE DE DEPARTAMENTO DE ING.ELECTRICA Y'),
(93, 'JEFE DE DEPARTAMENTO DE CIENCIA ECONOMIC'),
(94, 'JEFE DE DEPARTAMENTO DE DESARROLLO ACADE'),
(95, 'JEFE DE DIVISION DE ESTUDIOS PROFESIONAL'),
(96, 'JEFE DE DIVISION DE ESTUDIOS DE POSGRADO'),
(97, 'JEFE DE DEPARTAMENTO DE RECURSOS HUMANOS'),
(98, 'JEFE DE DEPARTAMENTO DE RECURSOS FINANCI'),
(99, 'JEFE DE DEPARTAMENTO DE RECURSOS MATERIA'),
(100, 'JEFE DE DEPARTAMENTO DE MANTENIMIENTO DE'),
(101, 'JEFE DE OFICINA DE DESARROLLO INSTITUCIO'),
(102, 'JEFE DE OFICINA DE PROGRAMACION Y EVALUA'),
(103, 'JEFE DE OFICINA DE CONSTRUCCION Y EQUIPA'),
(104, 'JEFE DE OFICINA DE PRACTICAS Y PROMOSION'),
(105, 'JEFE DE OFICINA DE SERVICIO SOCIAL Y DES'),
(106, 'JEFE DE OFICINA DE SERVICIOS EXTERNOS'),
(107, 'JEFE DE OFICINA DE DIFUSION ESCRITA'),
(108, 'JEFE DE OFICINA DE DIFUSION AUDIOVISUAL'),
(109, 'JEFE DE OFICINA DE EDITORIAL'),
(110, 'JEFE DE OFICINA DE PROMOCION CULTURAL'),
(111, 'JEFE DE OFICINA DE PROMOCION DEPORTIVA'),
(112, 'JEFE DE OFICINA DE CONTROL ESCOLAR'),
(113, 'JEFE DE OFICINA DE SERVICIOS ESTUDIANTIL'),
(114, 'JEFE DE OFICINA DE ORGANIZACION BIBLIOGR'),
(115, 'JEFE DE OFICINA DE SERVICIO A USUARIOS'),
(116, 'JEFE DE OFICINA DE SERVICIOS ESPECIALIZA'),
(117, 'JEFE DE OFICINA DE REGISTROS Y CONTROLES'),
(118, 'JEFE DE OFICINA DE SERVICIO AL PERSONAL'),
(119, 'JEFE DE OFICINA DE TESORERIA'),
(120, 'JEFE DE OFICINA DE CONTABILIDAD Y PRESUP'),
(121, 'JEFE DE OFICINA DE CONTROL DE INGRESOS P'),
(122, 'JEFE DE OFICINA DE ADQUISICIONES'),
(123, 'JEFE DE OFICINA DE ALMACEN E INVENTARIOS'),
(124, 'JEFE DE OFICINA DE SERVICIOS GENERALES'),
(125, 'JEFE DE OFICINA DE MANTENIMIENTO PREVENT'),
(126, 'JEFE DE OFICINA DE MANTENIMIENTO CORRECT'),
(127, 'JEFE DE LABORATORIO'),
(128, 'JEFE DE PROYECTO DE VINCULACION'),
(129, 'JEFE DE PROYECTO DE DOCENCIA'),
(130, 'JEFE DE PROYECTO DE INVESTIGACION'),
(131, 'COORDINACION DE INVESTIGACION EDUCATIVA'),
(132, 'COORDINACION DE ACTUALIZACION DOCENTE'),
(133, 'COORDINACION DE ORIENTACION EDUCATIVA'),
(134, 'COORDINACION DE METODOS Y MEDIOS EDUCATI'),
(135, 'COORDINACION DE CARRERA DE ING. MECANICA'),
(136, 'COORDINACION DE CARRERA DE ING. ELECTROM'),
(137, 'COORDINACION DE CARRERA DE ING. ELECTRIC'),
(138, 'COORDINACION DE CARRERA DE ING. ELECTRON'),
(139, 'COORDINACION DE CARRERA DE ING. EN MATER'),
(140, 'COORDINACION DE CARRERA DE ING. QUIMICA'),
(141, 'COORDINACION DE CARRERA DE ING. INDUSTRI'),
(142, 'COORDINACION DE CARRERA DE LIC. EN ADMIN'),
(143, 'COORDINACION DE APOYO A LA TITULACION CO'),
(144, 'COORDINACION DE DESARROLLO DE SISTEMAS'),
(145, 'COORDINACION DE SERVICIOS DE COMPUTO'),
(146, 'ANIO SABATICO'),
(147, 'LICENCIA SINDICAL'),
(148, 'COMISION'),
(149, 'BECA COMISION'),
(150, 'INCAPACIDAD POR MOTIVO DE SALUD'),
(151, 'RD DE SGC'),
(152, 'AUXILIAR DE LABORATORIO'),
(153, 'SECRETARIO GENERAL DELEGACION DII3'),
(154, 'CONTROLADOR DE DOCUMENTOS DEL SGC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_materias`
--

CREATE TABLE `t_cat_materias` (
  `id_cat_materias` int(11) NOT NULL,
  `fk_cat_reticula` varchar(50) DEFAULT NULL,
  `fk_cat_organigrama` int(11) DEFAULT 0,
  `clave` varchar(225) DEFAULT NULL,
  `clave_oficial` varchar(50) DEFAULT NULL,
  `nombre_completo_materia` varchar(255) DEFAULT NULL,
  `nombre_abreviado_materia` varchar(255) DEFAULT NULL,
  `creditos_teorica` varchar(225) DEFAULT NULL,
  `creditos_practica` varchar(225) DEFAULT NULL,
  `creditos_totales` varchar(225) DEFAULT NULL,
  `semestre` varchar(50) DEFAULT NULL,
  `exclusivo_carrera` varchar(50) DEFAULT NULL,
  `razon_cambio_exclusivo` text DEFAULT NULL,
  `fk_cat_tipo_materia` varchar(50) DEFAULT NULL,
  `nivel_escolar` varchar(5) DEFAULT 'L',
  `orden_certificado` varchar(50) DEFAULT NULL,
  `semestre_reticula` varchar(50) DEFAULT '0',
  `creditos_prerequisitos` varchar(50) DEFAULT NULL,
  `fk_cat_especialidad` varchar(50) DEFAULT '0',
  `estatus_materias_carrera` varchar(5) DEFAULT NULL,
  `renglon` varchar(50) DEFAULT '0',
  `no_unidades` int(1) NOT NULL DEFAULT 4
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `t_cat_materias`
--

INSERT INTO `t_cat_materias` (`id_cat_materias`, `fk_cat_reticula`, `fk_cat_organigrama`, `clave`, `clave_oficial`, `nombre_completo_materia`, `nombre_abreviado_materia`, `creditos_teorica`, `creditos_practica`, `creditos_totales`, `semestre`, `exclusivo_carrera`, `razon_cambio_exclusivo`, `fk_cat_tipo_materia`, `nivel_escolar`, `orden_certificado`, `semestre_reticula`, `creditos_prerequisitos`, `fk_cat_especialidad`, `estatus_materias_carrera`, `renglon`, `no_unidades`) VALUES
(1, '3', 3, '07-03', 'ACA-0909', 'TALLER DE INVESTIGACIÓN I', 'TALLER DE INV. I', '0', '4', '4', '7', '0', '0', '1', 'L', '43', '7', '0', '0', 'A', '3', 4),
(2, '3', 55, '3S11', '3S11', 'ACTIVIDADES COMPLEMENTARIAS', 'AC-SIS', '0', '5', '5', '9', '3', '0', '3', 'L', '54', '9', '0', '0', 'A', '7', 4),
(3, '3', 3, '01-01', 'ACF-0901', 'CÁLCULO DIFERENCIAL', 'CAL. DIFERENCIAL', '3', '2', '5', '1', '0', '0', '1', 'L', '5', '1', '0', '0', 'A', '1', 4),
(4, '3', 3, '02-01', 'ACF-0902', 'CÁLCULO INTEGRAL', 'CAL. INTEGRAL', '3', '2', '5', '2', '0', '0', '1', 'L', '6', '2', '0', '0', 'A', '1', 4),
(5, '3', 3, '03-01', 'ACF-0904', 'CÁLCULO VECTORIAL', 'CAL. VECTORIAL', '3', '2', '5', '3', '0', '0', '1', 'L', '7', '3', '0', '0', 'A', '1', 4),
(6, '3', 3, '04-01', 'ACF-0905', 'ECUACIONES DIFERENCIALES', 'ECU. DIFERENCIALES', '3', '2', '5', '4', '3', '0', '3', 'L', '12', '4', '0', '0', 'A', '1', 4),
(7, '3', 3, '03-05', 'ACD-0908', 'DESARROLLO SUSTENTABLE', 'DESA. SUSTE.', '2', '3', '5', '3', '0', '0', '1', 'L', '11', '3', '0', '0', 'A', '5', 4),
(8, '3', 24, '06-01', 'SCD-1015', 'LENGUAJES Y AUTÓMATAS I', 'LEN. Y AUTO. I', '2', '3', '5', '6', '3', '0', '3', 'L', '26', '6', '0', '0', 'A', '1', 4),
(9, '3', 24, '07-01', 'SCD-1016', 'LENGUAJES Y AUTÓMATAS II', 'LEN. Y AUTO. II', '2', '3', '5', '7', '3', '0', '3', 'L', '27', '7', '0', '0', 'A', '1', 4),
(10, '3', 24, '08-01', 'SCC-1019', 'PROGRAMACIÓN LOGÍSTICA Y FUNCIONAL', 'PROG. LOGIS. Y FUN.', '2', '2', '4', '8', '3', '0', '3', 'L', '32', '8', '0', '0', 'A', '1', 4),
(11, '3', 24, '09-01', 'SCC-1012', 'INTELIGENCIA ARTIFICIAL', 'INTELIGENCIA ARTIFICIAL', '2', '2', '4', '9', '3', '0', '3', 'L', '23', '9', '0', '0', 'A', '1', 4),
(12, '3', 24, '02-02', 'SCD-1020', 'PROGRAMACIÓN ORIENTADA A OBJETOS', 'PROGRA. ORI. OBJ', '2', '3', '5', '2', '3', '0', '3', 'L', '33', '2', '0', '0', 'A', '2', 6),
(13, '3', 24, '01-02', 'SCD-1008', 'FUNDAMENTOS DE PROGRAMACIÓN', 'FUN. DE PROGRA', '2', '3', '5', '1', '3', '0', '3', 'L', '18', '1', '0', '0', 'A', '2', 4),
(14, '3', 24, '03-02', 'AED-1026', 'ESTRUCTURA DE DATOS', 'ESTRUC. DE DATOS', '2', '3', '5', '3', '3', '0', '3', 'L', '13', '3', '0', '0', 'A', '2', 4),
(15, '3', 24, '04-03', 'SCC-1017', 'MÉTODOS NUMÉRICOS', 'METODOS NUMERICOS', '2', '2', '4', '4', '3', '0', '3', 'L', '29', '4', '0', '0', 'A', '3', 4),
(16, '3', 24, '05-01', 'AEC-1034', 'FUNDAMENTOS DE TELECOMUNICACIONES', 'FUN. DE TELECOM.', '2', '2', '4', '5', '3', '0', '3', 'L', '19', '5', '0', '0', 'A', '1', 4),
(17, '3', 24, '07-04', 'SCD-1004', 'CONMUTACIÓN Y ENRUTAMIENTO DE REDES DE DATOS', 'CON. Y ENRU. DE REDES', '2', '3', '5', '7', '3', '0', '3', 'L', '8', '7', '0', '0', 'A', '4', 4),
(18, '3', 24, '06-04', 'SCD-1021', 'REDES DE COMPUTADORAS', 'REDES DE COMP.', '2', '3', '5', '6', '3', '0', '3', 'L', '36', '6', '0', '0', 'A', '4', 4),
(19, '3', 24, '08-04', 'SCA-1002', 'ADMINISTRACIÓN DE REDES', 'ADMIN. DE REDES', '0', '4', '4', '8', '3', '0', '3', 'L', '2', '8', '0', '0', 'A', '2', 4),
(20, '3', 24, 'BS9', 'SIB-1503', 'TECNOLOGÍAS EN GESTIÓN DE SERVIDORES', 'TECNO. EN GESTION DE SER', '1', '4', '5', '9', '3', '0', '3', 'L', '49', '9', '0', '0', 'I', '2', 4),
(21, '3', 3, '01-03', 'ACA-0907', 'TALLER DE ÉTICA', 'TALLER DE ETICA', '0', '4', '4', '1', '0', '0', '1', 'L', '42', '1', '0', '0', 'A', '3', 4),
(22, '3', 24, '03-06', 'AEC-1008', 'CONTABILIDAD FINANCIERA', 'CONTABILIDAD FIN.', '2', '2', '4', '3', '3', '0', '3', 'L', '9', '3', '0', '0', 'A', '6', 4),
(23, '3', 24, '04-07', 'SCC-1005', 'CULTURA EMPRESARIAL', 'CUL. EMPRESARIAL', '2', '2', '4', '4', '3', '0', '3', 'L', '10', '4', '0', '0', 'A', '7', 4),
(24, '3', 24, '04-02', 'SCD-1027', 'TÓPICOS AVANZADOS DE PROGRAMACIÓN', 'TOP. AVA. DE PROGRA', '2', '3', '5', '4', '3', '0', '3', 'L', '46', '4', '0', '0', 'A', '2', 4),
(25, '3', 24, '04-04', 'SCA-1025', 'TALLER DE BASE DE DATOS', 'TALLER DE BD', '0', '4', '4', '4', '3', '0', '3', 'L', '41', '4', '0', '0', 'A', '4', 4),
(26, '3', 24, '05-04', 'SCB-1001', 'ADMINISTRACIÓN DE BASES DE DATOS', 'ADMINISTRACIÓN DE BD', '1', '4', '5', '5', '3', '0', '3', 'L', '1', '5', '0', '0', 'A', '4', 4),
(27, '3', 3, '08-03', 'ACA-0910', 'TALLER DE INVESTIGACIÓN II', 'TALLER DE INVES. II', '0', '4', '4', '8', '0', '0', '1', 'L', '44', '8', '0', '0', 'A', '3', 4),
(28, '3', 24, 'CS9', 'SIB-1504', 'TECNOLOGIAS EN GESTION DE BASE DE DATOS Y APLICACIONES II', 'TECNO. EN GEST. DE BD Y APLI', '1', '4', '5', '9', '3', '0', '3', 'L', '50', '9', '0', '0', 'I', '3', 4),
(29, '3', 24, '01-04', 'AEF-1041', 'MATEMÁTICAS DISCRETAS', 'MATEMATICAS DISCRETAS', '3', '2', '5', '1', '3', '0', '3', 'L', '28', '1', '0', '0', 'A', '4', 4),
(30, '3', 24, 'DS11', 'SIB-1505', 'TECNOLOGÍAS EN GESTIÓN DE REDES', 'TECNO. EN GEST. DE REDES', '1', '4', '5', '9', '3', '0', '3', 'L', '51', '9', '0', '0', 'I', '4', 4),
(31, '3', 3, '02-04', 'AEC-1058', 'QUÍMICA', 'QUIMICA', '2', '2', '4', '2', '3', '0', '1', 'L', '35', '2', '0', '0', 'A', '4', 4),
(32, '3', 24, '03-03', 'SCC-1013', 'INVESTIGACIÓN DE OPERACIONES', 'INVES. DE OPERACIONES', '2', '2', '4', '3', '3', '0', '3', 'L', '24', '3', '0', '0', 'A', '3', 4),
(33, '3', 24, '03-04', 'AEF-1031', 'FUNDAMENTOS DE BASE DE DATOS', 'FUNDAMENTOS DE BD', '3', '2', '5', '3', '3', '0', '3', 'L', '15', '3', '0', '0', 'A', '4', 4),
(34, '3', 24, '05-05', 'SCD-1022', 'SIMULACIÓN', 'SIMULACION', '2', '3', '5', '5', '3', '0', '3', 'L', '37', '5', '0', '0', 'A', '5', 4),
(35, '3', 24, '02-03', 'SCC-1010', 'GRAFICACIÓN', 'GRAFICACION', '2', '2', '4', '6', '3', '0', '3', 'L', '21', '6', '0', '0', 'A', '3', 4),
(36, '3', 24, '05-02', 'AEB-1055', 'PROGRAMACIÓN WEB', 'PROGRA WEB', '1', '4', '5', '5', '3', '0', '3', 'L', '34', '5', '0', '0', 'A', '2', 4),
(37, '3', 24, '01-05', 'SCH-1024', 'TALLER DE ADMINISTRACIÓN', 'TALLER DE ADMIN.', '1', '3', '4', '1', '3', '0', '3', 'L', '40', '1', '0', '0', 'A', '5', 4),
(38, '3', 3, '02-05', 'ACF-0903', 'ALGEBRA LINEAL', 'ALGEBRA LINEAL', '3', '2', '5', '2', '0', '0', '1', 'L', '3', '2', '0', '0', 'A', '5', 4),
(39, '3', 24, '05-03', 'AEC-1061', 'SISTEMAS OPERATIVOS', 'SISTEMAS OP.', '2', '2', '4', '3', '3', '0', '3', 'L', '38', '3', '0', '0', 'A', '3', 4),
(40, '3', 24, '06-03', 'SCA-1026', 'TALLER DE SISTEMAS OPERATIVOS', 'TALLER DE SISTEMAS OP.', '0', '4', '4', '4', '3', '0', '3', 'L', '45', '4', '0', '0', 'A', '3', 4),
(41, '3', 24, '06-05', 'SCC-1007', 'FUNDAMENTOS DE INGENIERÍA DE SOFTWARE', 'FUND. DE ING. DE SOFTWARE', '2', '2', '4', '5', '3', '0', '3', 'L', '16', '5', '0', '0', 'A', '5', 4),
(42, '3', 24, '08-05', 'SCG-1009', 'GESTIÓN DE PROYECTOS DE SOFTWARE', 'GESTION DE PROY. DE SOFTWARE', '3', '3', '6', '7', '3', '0', '3', 'L', '20', '7', '0', '0', 'A', '5', 4),
(43, '3', 24, 'ES8', 'SIB-1501', 'TECNOLOGÍAS EN GESTIÓN DE BASE DE DATOS Y APLICACIONES I', 'TECNO. EN GESTION DE BD', '1', '4', '5', '8', '3', '0', '3', 'L', '47', '8', '0', '0', 'I', '5', 4),
(44, '3', 34, 'ES9', 'ES9', 'RESIDENCIAS PROFESIONALES', 'RESIDENCIA', '0', '10', '10', '9', '3', '0', '1', 'L', '52', '9', '250', '0', 'A', '5', 4),
(45, '3', 24, '07-05', 'SCD-1011', 'INGENIERÍA DE SOFTWARE', 'ING. DE SOFTWARE', '2', '3', '5', '6', '3', '0', '3', 'L', '22', '6', '5', '0', 'A', '5', 4),
(46, '3', 3, '01-06', 'ACC-0906', 'FUNDAMENTOS DE INVESTIGACIÓN', 'FUN. DE INV.', '2', '2', '4', '1', '0', '0', '1', 'L', '17', '1', '0', '0', 'A', '6', 4),
(47, '3', 24, '02-06', 'AEF-1052', 'PROBABILIDAD Y ESTADÍSTICA', 'PROBA. Y ESTAD.', '3', '2', '5', '2', '3', '0', '3', 'L', '31', '2', '0', '0', 'A', '6', 4),
(48, '3', 3, '04-05', 'SCF-1006', 'FÍSICA GENERAL', 'FISICA GENERAL', '3', '2', '5', '4', '3', '0', '3', 'L', '14', '4', '0', '0', 'A', '5', 4),
(49, '3', 24, '04-06', 'SCD-1018', 'PRINCIPIOS ELÉCTRICOS Y APLICACIONES DIGITALES', 'PRIN. ELEC. Y APLI.', '2', '3', '5', '4', '3', '0', '3', 'L', '30', '4', '0', '0', 'A', '6', 4),
(50, '3', 24, '05-06', 'SCD-1003', 'ARQUITECTURA DE COMPUTADORAS', 'ARQUI. DE COMPU.', '2', '3', '5', '5', '3', '0', '3', 'L', '4', '5', '0', '0', 'A', '6', 4),
(51, '3', 24, '07-06', 'SCC-1023', 'SISTEMAS PROGRAMABLES', 'SIS. PROGRA.', '2', '2', '4', '7', '3', '0', '3', 'L', '39', '7', '0', '0', 'A', '6', 4),
(52, '3', 24, 'FS8', 'SIB-1502', 'ECOSISTEMAS MÓVILES', 'ECOSISTEMAS MOV.', '1', '4', '5', '8', '3', '0', '3', 'L', '48', '8', '0', '0', 'I', '6', 4),
(53, '3', 55, 'FS9', 'FS9', 'SERVICIO SOCIAL', 'SERVICIO SOCIAL', '0', '10', '10', '9', '3', '0', '1', 'L', '53', '9', '182', '0', 'A', '6', 4),
(54, '3', 24, '06-06', 'SCC-1014', 'LENGUAJES DE INTERFAZ', 'LENG. DE INTERFAZ', '2', '2', '4', '6', '3', '0', '3', 'L', '25', '6', '4', '0', 'A', '6', 4),
(55, '2', 55, '09-03', '3I11', 'ACTIVIDADES COMPLEMENTARIAS', 'AC-IND', '0', '5', '5', '9', '2', '0', '3', 'L', '56', '9', '0', '0', 'A', '6', 4),
(56, '2', 3, '01-01', 'ACC-0906', 'FUNDAMENTOS DE INVESTIGACIÓN', 'FUN. DE INVESTIGACION', '2', '2', '4', '1', '0', '0', '1', 'L', '23', '1', '0', '0', 'A', '1', 4),
(57, '2', 12, '04-02', 'INC-1009', 'ELECTRICIDAD Y ELECTRÓNICA INDUSTRIAL', 'ELEC. Y ELECTRO. IND', '2', '2', '4', '4', '2', '0', '3', 'L', '15', '2', '0', '0', 'A', '2', 4),
(58, '2', 12, '02-03', 'AEC-1048', 'METROLOGÍA Y NORMALIZACIÓN', 'METRO. Y NORMA.', '2', '2', '4', '2', '2', '0', '3', 'L', '33', '3', '0', '0', 'A', '3', 4),
(59, '2', 12, '03-03', 'INC-1023', 'PROCESOS DE FABRICACIÓN', 'PROC. DE FAB.', '2', '2', '4', '3', '2', '0', '3', 'L', '37', '4', '0', '0', 'A', '3', 4),
(60, '2', 12, '05-01', 'INR-1003', 'ADMINISTRACIÓN DE PROYECTOS', 'ADMIN. DE PROYECTOS', '2', '1', '3', '5', '2', '0', '3', 'L', '3', '5', '0', '0', 'A', '1', 4),
(61, '2', 3, '06-01', 'ACA-0909', 'TALLER DE INVESTIGACIÓN I', 'TALLER DE INVES. I', '0', '4', '4', '6', '0', '0', '1', 'L', '45', '6', '0', '0', 'A', '1', 4),
(62, '2', 12, '08-01', 'AED-1030', 'FORMULACIÓN Y EVALUACIÓN DE PROYECTOS', 'FORMU. Y EVA. DE PROYECTOS', '2', '3', '5', '8', '2', '0', '3', 'L', '22', '8', '0', '0', 'A', '1', 4),
(63, '2', 34, '09-01', 'IND2010', 'RESIDENCIAS PROFESIONALES', 'RESIDENCIAS PROFESIONALES', '0', '10', '10', '9', '2', '0', '3', 'L', '54', '9', '250', '0', 'A', '1', 4),
(64, '2', 3, '01-06', 'ACA-0907', 'TALLER DE ÉTICA', 'TALLER DE ETICA', '0', '4', '4', '1', '0', '0', '1', 'L', '43', '1', '0', '0', 'A', '6', 4),
(65, '2', 12, '03-01', 'INC-1024', 'PROPIEDAD DE LOS MATERIALES', 'PRO. DE LOS MATERIALES', '2', '2', '4', '2', '2', '0', '3', 'L', '38', '2', '0', '0', 'A', '1', 4),
(66, '2', 3, '03-02', 'ACF-0903', 'ALGEBRA LINEAL', 'ALGEBRA LINEAL', '3', '2', '5', '3', '0', '0', '1', 'L', '5', '3', '0', '0', 'A', '2', 4),
(67, '2', 12, '02-01', 'INC-1013', 'FÍSICA', 'FISICA', '2', '2', '4', '4', '2', '0', '3', 'L', '21', '4', '0', '0', 'A', '1', 4),
(68, '2', 12, '05-02', 'INC-1014', 'GESTIÓN DE COSTOS', 'GESTION DE COSTOS', '2', '2', '4', '5', '2', '0', '3', 'L', '24', '5', '0', '0', 'A', '2', 4),
(69, '2', 12, '06-02', 'AEC-1037', 'INGENIERÍA ECONÓMICA', 'ING. ECONOMICA', '2', '2', '4', '6', '2', '0', '3', 'L', '28', '6', '0', '0', 'A', '2', 4),
(70, '2', 12, '07-02', 'INC-1021', 'PLANEACIÓN FINANCIERA', 'PLAN. FINAN.', '2', '2', '4', '7', '2', '0', '3', 'L', '34', '7', '0', '0', 'A', '2', 4),
(71, '2', 12, '08-02', 'INC-1026', 'RELACIONES INDUSTRIALES', 'RELACIONES INDUS.', '2', '2', '4', '8', '2', '0', '3', 'L', '40', '8', '0', '0', 'A', '2', 4),
(72, '2', 55, '09-02', 'BI9', 'SERVICIO SOCIAL', 'SERVICIO SOCIAL', '0', '10', '10', '9', '2', '0', '3', 'L', '55', '9', '182', '0', 'A', '2', 4),
(73, '2', 3, '01-02', 'ACF-0901', 'CÁLCULO DIFERENCIAL', 'CAL. DIFERENCIAL', '3', '2', '5', '1', '0', '0', '1', 'L', '8', '1', '0', '0', 'A', '2', 4),
(74, '2', 3, '02-02', 'ACF-0902', 'CÁLCULO INTEGRAL', 'CAL. INTEGRAL', '3', '2', '5', '2', '0', '0', '1', 'L', '9', '2', '0', '0', 'A', '2', 4),
(75, '2', 3, '04-01', 'ACF-0904', 'CÁLCULO VECTORIAL', 'CAL. VECTORIAL', '3', '2', '5', '3', '0', '0', '1', 'L', '10', '3', '0', '0', 'A', '1', 4),
(76, '2', 12, '04-03', 'INC-1005', 'ALGORITMOS Y LENGUAJES DE PROGRAMACIÓN', 'ALGO. Y LENG. DE PROG.', '2', '2', '4', '4', '2', '0', '3', 'L', '6', '4', '0', '0', 'A', '3', 4),
(77, '2', 12, '05-03', 'INC-1001', 'ADMINISTRACIÓN DE LAS OPERACIONES I', 'ADMIN DE LAS OPE. I', '2', '2', '4', '5', '2', '0', '3', 'L', '1', '5', '0', '0', 'A', '3', 4),
(78, '2', 12, '06-03', 'INC-1002', 'ADMINISTRACIÓN DE LAS OPERACIONES II', 'ADMIN DE LAS OPE. II', '2', '2', '4', '6', '2', '0', '3', 'L', '2', '6', '0', '0', 'A', '3', 4),
(79, '2', 12, '07-03', 'INC-1022', 'PLANEACIÓN Y DISEÑO DE INSTALACIONES', 'PLAN. Y DISEÑO DE INST.', '2', '2', '4', '7', '2', '0', '3', 'L', '35', '7', '0', '0', 'A', '3', 4),
(80, '2', 12, 'CI8', 'SCF-1404', 'ESTADÍSTICA EN CALIDAD INDUSTRIAL', 'ESTAD. EN CALIDAD IND.', '3', '2', '5', '8', '2', '0', '3', 'L', '48', '8', '0', '0', 'I', '3', 4),
(81, '2', 12, '03-04', 'AEC-1018', 'ECONOMÍA', 'ECONOMIA', '2', '2', '4', '3', '2', '0', '3', 'L', '14', '3', '0', '0', 'A', '4', 4),
(82, '2', 12, '01-04', 'INH-1029', 'TALLER DE HERRAMIENTAS INTELECTUALES', 'TALLER DE HERRA. INTELEC.', '1', '3', '4', '1', '2', '0', '3', 'L', '44', '1', '0', '0', 'A', '4', 4),
(83, '2', 12, '02-04', 'INR-1017', 'INGENIERÍA DE SISTEMAS', 'ING. DE SISTEMAS', '2', '1', '3', '2', '2', '0', '3', 'L', '27', '2', '0', '0', 'A', '4', 4),
(84, '2', 12, '04-04', 'INC-1018', 'INVESTIGACIÓN DE OPERACIONES I', 'INVES. DE OPE. I', '2', '2', '4', '4', '2', '0', '3', 'L', '29', '4', '0', '0', 'A', '4', 4),
(85, '2', 12, '05-04', 'INC-1019', 'INVESTIGACIÓN DE OPERACIONES II', 'INVES. DE OPE. II', '2', '2', '4', '5', '2', '0', '3', 'L', '30', '5', '0', '0', 'A', '4', 4),
(86, '2', 12, '06-04', 'INC-1027', 'SIMULACIÓN', 'SIMULACION', '2', '2', '4', '6', '2', '0', '3', 'L', '41', '6', '0', '0', 'A', '4', 4),
(87, '2', 12, '07-04', 'INF-1028', 'SISTEMAS DE MANUFACTURA', 'SIS. DE MANUFACTURA', '3', '2', '5', '7', '2', '0', '3', 'L', '42', '7', '0', '0', 'A', '4', 4),
(88, '2', 12, 'DI8', 'SCG-1401', 'ADMINISTRACIÓN DE LA CALIDAD', 'ADMIN. DE LA CALIDAD', '3', '3', '6', '8', '2', '0', '3', 'L', '49', '8', '0', '0', 'I', '4', 4),
(89, '2', 3, '07-01', 'ACA-0910', 'TALLER DE INVESTIGACIÓN II', 'TALLER DE INVES. II', '0', '4', '4', '7', '0', '0', '1', 'L', '46', '7', '0', '0', 'A', '1', 4),
(90, '2', 12, '01-03', 'INC-1025', 'QUÍMICA', 'QUIMICA', '2', '2', '4', '1', '2', '0', '3', 'L', '39', '1', '0', '0', 'A', '3', 4),
(91, '2', 3, '02-05', 'AEC-1053', 'PROBABILIDAD Y ESTADÍSTICA', 'PROBA. Y ESTAD.', '2', '2', '4', '2', '2', '0', '3', 'L', '36', '2', '0', '0', 'A', '5', 4),
(92, '2', 12, '03-05', 'AEF-1024', 'ESTADÍSTICA INFERENCIAL I', 'ESTAD. INFER. I', '3', '2', '5', '3', '2', '0', '3', 'L', '17', '3', '0', '0', 'A', '5', 4),
(93, '2', 12, '04-05', 'AEF-1025', 'ESTADÍSTICA INFERENCIAL II', 'ESTAD. INFER. II', '3', '2', '5', '4', '2', '0', '3', 'L', '18', '4', '0', '0', 'A', '5', 4),
(94, '2', 12, '05-05', 'INF-1007', 'CONTROL ESTADÍSTICO DE LA CALIDAD', 'CONTROL ESTAD. DE LA CALIDAD', '3', '2', '5', '5', '2', '0', '3', 'L', '11', '5', '0', '0', 'A', '5', 4),
(95, '2', 12, '06-05', 'INC-1004', 'ADMINISTRACIÓN DEL MANTENIMIENTO', 'ADMIN DEL MANTEN.', '2', '2', '4', '6', '2', '0', '3', 'L', '4', '6', '0', '0', 'A', '5', 4),
(96, '2', 12, '07-05', 'INH-1020', 'LOGÍSTICA  Y  CADENAS DE SUMINISTRO', 'LOG.  Y  CADENAS DE SUMIN.', '1', '3', '4', '7', '2', '0', '3', 'L', '31', '7', '0', '0', 'A', '5', 4),
(97, '2', 12, 'EI8', 'SCJ-1402', 'APLICACIÓN DE LOS SISTEMAS DE CALIDAD A LOS PROCESOS EMPRESARIALES', 'APLIC. DE LOS SIS. DE CAL. A L', '4', '2', '6', '8', '2', '0', '3', 'L', '50', '8', '0', '0', 'A', '5', 4),
(98, '2', 12, '01-05', 'INN-1008', 'DIBUJO INDUSTRIAL', 'DIBUJO INDUSTRIAL', '0', '6', '6', '1', '2', '0', '3', 'L', '13', '1', '0', '0', 'A', '5', 4),
(99, '2', 12, '02-06', 'INQ-1006', 'ANÁLISIS DE LA REALIDAD NACIONAL', 'ANA. DE LA REALIDAD NACION', '1', '2', '3', '2', '2', '0', '3', 'L', '7', '2', '0', '0', 'A', '6', 4),
(100, '2', 12, '03-06', 'INJ-1011', 'ESTUDIO DEL TRABAJO I', 'EST. DEL TRABAJO I', '4', '2', '6', '3', '2', '0', '3', 'L', '19', '3', '0', '0', 'A', '6', 4),
(101, '2', 12, '04-06', 'INJ-1012', 'ESTUDIO DEL TRABAJO II', 'EST. DEL TRABAJO II', '4', '2', '6', '4', '2', '0', '3', 'L', '20', '4', '0', '0', 'A', '6', 4),
(102, '2', 12, '05-06', 'INF-1010', 'ERGONOMÍA', 'ERGONOMIA', '3', '2', '5', '5', '2', '0', '3', 'L', '16', '5', '0', '0', 'A', '6', 4),
(103, '2', 12, '06-06', 'AED-1044', 'MERCADOTECNIA', 'MERCADOTECNIA', '2', '3', '5', '6', '2', '0', '3', 'L', '32', '6', '0', '0', 'A', '6', 4),
(104, '2', 12, '06-07', 'INC-1015', 'GESTIÓN DE LOS SISTEMAS DE CALIDAD', 'GESTION DE LOS SIS. DE CAL', '2', '2', '4', '7', '2', '0', '3', 'L', '25', '7', '0', '0', 'A', '7', 4),
(105, '2', 12, 'FI8', 'SCG-1403', 'AUDITORIA DE SISTEMAS DE CALIDAD', 'AUD. DE SIS. DE CALIDAD', '3', '3', '6', '8', '2', '0', '3', 'L', '51', '8', '0', '0', 'I', '6', 4),
(106, '2', 12, '02-07', 'INC-1030', 'TALLER DE LIDERAZGO', 'TALLER DE LIDERAZGO', '2', '2', '4', '2', '2', '0', '3', 'L', '47', '2', '0', '0', 'A', '7', 4),
(107, '2', 12, '04-07', 'INF-1016', 'HIGIENE Y SEGURIDAD INDUSTRIAL', 'HIG. Y SEG. INDUS.', '3', '2', '5', '4', '2', '0', '3', 'L', '26', '4', '0', '0', 'A', '7', 4),
(108, '2', 3, '05-07', 'ACD-0908', 'DESARROLLO SUSTENTABLE', 'DESA. SUST.', '2', '3', '5', '5', '2', '0', '3', 'L', '12', '5', '0', '0', 'A', '7', 4),
(109, '2', 12, 'GI8', 'SCF-1406', 'VALIDACIÓN Y BUENAS PRÁCTICAS PARA EL MEJORAMIENTO DE PRODUCCIÓN', 'VAL. Y B. PRÁC. MEJOR', '3', '2', '5', '8', '2', '0', '3', 'L', '52', '8', '0', '0', 'I', '7', 4),
(110, '2', 12, 'HI8', 'SCO-1405', 'TALLER DE CALIDAD PERSONAL Y DIRECTIVA ENFOCADA AL EMPLEO', 'TALLER CE CALIDAD PERS. Y DIR.', '0', '3', '3', '8', '2', '0', '3', 'L', '53', '8', '0', '0', 'I', '8', 4),
(111, '1', 3, '01-01', 'ACC-0906', 'FUNDAMENTOS DE INVESTIGACIÓN', 'FUND INV', '2', '2', '4', '1', '0', '0', '1', 'L', '21', '1', '0', '0', 'A', '1', 4),
(112, '1', 3, '01-02', 'ACF-0901', 'CÁLCULO DIFERENCIAL', 'CAL. DIFERENCIAL', '3', '2', '5', '1', '0', '0', '1', 'L', '4', '1', '0', '0', 'A', '2', 4),
(113, '1', 26, '01-03', 'GEC-0905', 'DESARROLLO HUMANO', 'DES. HUMANO', '2', '2', '4', '1', '1', '0', '3', 'L', '9', '1', '0', '0', 'A', '3', 4),
(114, '1', 26, '01-04', 'AEF-1074', 'FUNDAMENTOS DE GESTIÓN EMPRESARIAL', 'FUND. GES. EMP.', '3', '2', '5', '1', '1', '0', '3', 'L', '20', '1', '0', '0', 'A', '4', 4),
(115, '1', 26, '01-05', 'GEC-0909', 'FUNDAMENTOS DE FÍSICA', 'FUND. FIS.', '2', '2', '4', '1', '1', '0', '3', 'L', '19', '1', '0', '0', 'A', '5', 4),
(116, '1', 26, '01-06', 'GEF-0910', 'FUNDAMENTOS DE QUÍMICA', 'FUND. QUIM.', '3', '2', '5', '1', '1', '0', '3', 'L', '22', '1', '0', '0', 'A', '6', 4),
(117, '1', 26, '02-01', 'AEB-1082', 'SOFTWARE DE APLICACIÓN EJECUTIVO', 'SOFTWARE APL. EJEC.', '1', '4', '5', '2', '1', '0', '3', 'L', '40', '2', '0', '0', 'A', '1', 4),
(118, '1', 3, '02-02', 'ACF-0902', 'CÁLCULO INTEGRAL', 'CAL. INTEGRAL', '3', '2', '5', '2', '0', '0', '1', 'L', '5', '2', '0', '0', 'A', '2', 4),
(119, '1', 26, '02-03', 'GED-0903', 'CONTABILIDAD ORIENTADA A LOS NEGOCIOS', 'CONT. ORI. NEGOCIOS', '2', '3', '5', '2', '1', '0', '3', 'L', '7', '2', '0', '0', 'A', '3', 4),
(120, '1', 26, '02-04', 'AEC-1014', 'DINÁMICA SOCIAL', 'DINAM. SOCIAL', '2', '2', '4', '2', '1', '0', '3', 'L', '11', '2', '0', '0', 'A', '4', 4),
(121, '1', 3, '02-05', 'ACA-0907', 'TALLER DE ÉTICA', 'TALLER ETICA', '0', '4', '4', '2', '0', '0', '1', 'L', '41', '2', '0', '0', 'A', '5', 4),
(122, '1', 26, '02-06', 'GEE-0918', 'LEGISLACIÓN LABORAL', 'LEGIS. LABORAL', '3', '1', '4', '2', '1', '0', '3', 'L', '33', '2', '0', '0', 'A', '6', 4),
(123, '1', 26, '03-01', 'AEC-1078', 'MARCO LEGAL DE LAS ORGANIZACIONES', 'MARCO LEGAL ORG.', '2', '2', '4', '3', '1', '0', '3', 'L', '34', '3', '0', '0', 'A', '1', 4),
(124, '1', 26, '03-02', 'GED-0921', 'PROBABILIDAD Y ESTADÍSTICA DESCRIPTIVA', 'PROB. Y EST. DESC.', '2', '3', '5', '3', '1', '0', '3', 'L', '38', '3', '0', '0', 'A', '2', 4),
(125, '1', 26, '03-03', 'GED-0904', 'COSTOS EMPRESARIALES', 'COSTOS EMPRE.', '2', '3', '5', '3', '1', '0', '3', 'L', '8', '3', '0', '0', 'A', '3', 4),
(126, '1', 26, '03-04', 'GEC-0913', 'HABILIDADES DIRECTIVAS I', 'HABIL. DIREC. I', '2', '2', '4', '3', '1', '0', '3', 'L', '27', '3', '0', '0', 'A', '4', 4),
(127, '1', 26, '03-05', 'AEF-1071', 'ECONOMÍA EMPRESARIAL', 'ECO. EMPRE.', '3', '2', '5', '3', '1', '0', '3', 'L', '13', '3', '0', '0', 'A', '5', 4),
(128, '1', 26, '03-06', 'ACF-0903', 'ALGEBRA LINEAL', 'ALG. LINEAL', '3', '2', '5', '3', '0', '0', '1', 'L', '2', '3', '0', '0', 'A', '6', 4),
(129, '1', 26, '04-01', 'GEF-0916', 'INGENIERÍA ECONÓMICA', 'ING. ECONOMICA', '3', '2', '5', '4', '1', '0', '3', 'L', '29', '4', '0', '0', 'A', '1', 4),
(130, '1', 26, '04-02', 'GEG-0907', 'ESTADÍSTICA INFERENCIAL I', 'ESTAD. INFER. I', '3', '3', '6', '4', '1', '0', '3', 'L', '16', '4', '0', '0', 'A', '2', 4),
(131, '1', 26, '04-03', 'GED-0917', 'INSTRUMENTOS DE PRESUPUESTACIÓN EMPRESARIAL', 'INST. PRES. EMPRE.', '2', '3', '5', '4', '1', '0', '3', 'L', '31', '4', '0', '0', 'A', '3', 4),
(132, '1', 26, '04-04', 'GEC-0914', 'HABILIDADES DIRECTIVAS II', 'HABIL DIR. II', '2', '2', '4', '4', '1', '0', '3', 'L', '28', '4', '0', '0', 'A', '4', 4),
(133, '1', 26, '04-05', 'GEF-0906', 'ENTORNO MACROECONÓMICO', 'ENTORNO MACROECO.', '3', '2', '5', '4', '1', '0', '3', 'L', '15', '4', '0', '0', 'A', '5', 4),
(134, '1', 26, '04-06', 'AEF-1076', 'INVESTIGACIÓN DE OPERACIONES', 'INVES. OPE.', '3', '2', '5', '4', '1', '0', '3', 'L', '32', '4', '0', '0', 'A', '6', 4),
(135, '1', 26, '05-01', 'AEF-1073', 'FINANZAS EN LAS ORGANIZACIONES', 'FINAN. ORG.', '3', '2', '5', '5', '1', '0', '3', 'L', '18', '5', '0', '0', 'A', '1', 4),
(136, '1', 26, '05-02', 'GEG-0908', 'ESTADÍSTICA INFERENCIAL II', 'ESTAD. INFE. II', '3', '3', '6', '5', '1', '0', '3', 'L', '17', '5', '0', '0', 'A', '2', 4),
(137, '1', 26, '05-03', 'GEF-0915', 'INGENIERÍA DE PROCESOS', 'ING. DE PROCESOS', '3', '2', '5', '5', '1', '0', '3', 'L', '30', '5', '0', '0', 'A', '3', 4),
(138, '1', 26, '05-04', 'AEG-0909', 'GESTIÓN DEL CAPITAL HUMANO', 'GEST. CAP. HUMANO', '3', '3', '6', '5', '1', '0', '3', 'L', '25', '5', '0', '0', 'A', '4', 4),
(139, '1', 3, '05-05', 'ACA-0909', 'TALLER DE INVESTIGACIÓN I', 'TALLER DE INVES. I', '0', '4', '4', '5', '0', '0', '1', 'L', '42', '5', '0', '0', 'A', '5', 4),
(140, '1', 26, '05-06', 'GEF-0919', 'MERCADOTECNIA', 'MERCADOTECNIA', '3', '2', '5', '5', '1', '0', '3', 'L', '35', '5', '0', '0', 'A', '6', 4),
(141, '1', 26, '06-01', 'GEF-0901', 'ADMINISTRACIÓN DE LA SALUD Y SEGURIDAD OCUPACIONAL', 'ADMIN. SALUD Y SEG. OCUP.', '3', '2', '5', '6', '1', '0', '3', 'L', '1', '6', '0', '0', 'A', '1', 4),
(142, '1', 26, '05-07', 'AED-0972', 'EL EMPRENDEDOR Y LA INNOVACIÓN', 'EMPREN. Y LA INNO.', '2', '3', '5', '5', '1', '0', '3', 'L', '14', '5', '0', '0', 'A', '2', 4),
(143, '1', 26, '06-02', 'GEC-0911', 'GESTIÓN DE LA PRODUCCIÓN I', 'GEST. DE PROD.', '2', '2', '4', '6', '1', '0', '3', 'L', '23', '6', '0', '0', 'A', '3', 4),
(144, '1', 26, '06-03', 'AED-1015', 'DISEÑO ORGANIZACIONAL', 'DISEÑO ORG.', '2', '3', '5', '6', '1', '0', '3', 'L', '12', '6', '0', '0', 'A', '4', 4),
(145, '1', 26, '06-05', 'GED-0922', 'SISTEMAS DE INFORMACIÓN DE LA MERCADOTECNIA', 'SIS. DE INFO. MERCA.', '2', '3', '5', '6', '1', '0', '3', 'L', '39', '6', '0', '0', 'A', '6', 4),
(146, '1', 26, '07-01', 'AED-1069', 'CALIDAD APLICADA A LA GESTIÓN EMPRESARIAL', 'CAL. APLI. A GESTION EMPRE.', '2', '3', '5', '7', '1', '0', '3', 'L', '6', '7', '0', '0', 'A', '1', 4),
(147, '1', 26, '07-02', 'GED-0920', 'PLAN DE NEGOCIOS', 'PLAN DE NEG.', '2', '3', '5', '7', '1', '0', '3', 'L', '37', '7', '0', '0', 'A', '2', 4),
(148, '1', 26, '07-03', 'GEC-0912', 'GESTIÓN DE LA PRODUCCION II', 'GESTION PROD. II', '2', '2', '4', '7', '1', '0', '3', 'L', '24', '7', '0', '0', 'A', '3', 4),
(149, '1', 26, '07-04', 'AED-1035', 'GESTIÓN ESTRATEGICA', 'GESTION ESTRA.', '2', '3', '5', '7', '1', '0', '3', 'L', '26', '7', '0', '0', 'A', '4', 4),
(150, '1', 3, '07-05', 'ACD-0908', 'DESARROLLO SUSTENTABLE', 'DES. SUSTEN.', '2', '3', '5', '7', '0', '0', '1', 'L', '10', '7', '0', '0', 'A', '5', 4),
(151, '1', 26, '08-01', 'AEB-1045', 'MERCADOTECNIA ELECTRÓNICA', 'MERCADO ELECTRO.', '1', '4', '5', '7', '1', '0', '3', 'L', '36', '7', '0', '0', 'A', '6', 4),
(152, '1', 26, '08-04', 'GEF-0902', 'CADENA DE SUMINISTROS', 'CAD D SUMIN', '3', '2', '5', '8', '1', '0', '3', 'L', '3', '8', '0', '0', 'A', '3', 4),
(153, '1', 34, '09-01', '1G9', 'RESIDENCIA PROFESIONAL', 'RESIDENCIA', '0', '10', '10', '9', '1', '0', '3', 'L', '51', '9', '250', '0', 'A', '1', 4),
(154, '1', 55, '08-06', '2G9', 'SERVICIO SOCIAL', 'SERVIO SOCIAL', '0', '10', '10', '9', '1', '0', '3', 'L', '50', '9', '183', '0', 'A', '2', 4),
(155, '1', 55, '08-05', '3G11', 'ACTIVIDADES COMPLEMENTARIAS', 'AC-GEM', '0', '5', '5', '9', '1', '0', '3', 'L', '52', '9', '0', '0', 'A', '6', 4),
(156, '1', 26, '8GESP1', 'GFD-1401', 'ESTUDIO DE LA SUSTENTABILIDAD EN LA EMPRESA', 'ESTUDIO DE LA SUSTENTABILIDAD', '2', '3', '5', '8', '1', '0', '3', 'L', '44', '8', '0', '0', 'I', '1', 4),
(157, '1', 26, '8GESP2', 'GFD-1402', 'INTRODUCCCIÓN FISCAL Y ESTUDIO PRACTICO DE PERSONAS FISICAS', 'INTR. FISCAL Y ESTUDIO PRACT DE', '2', '3', '5', '8', '1', '0', '3', 'L', '45', '8', '0', '0', 'I', '2', 4),
(158, '1', 26, '8GESP3', 'GFG-1403', 'ESTUDIO PRACTICO DEL ISR DE PERSONAS MORALES', 'ESTUDIO PRACTICO DEL ISR DE PERS.', '3', '3', '6', '8', '1', '0', '3', 'L', '46', '8', '0', '0', 'I', '4', 4),
(159, '1', 26, '8GESP4', 'GFC-1404', 'TALLER DE IMAGEN PERSONAL Y DIRECTIVA DE CALIDAD EN EL EMPLEO', 'TALLER DE IMAGEN PERSONAL Y DI.', '2', '2', '4', '8', '1', '0', '3', 'L', '47', '8', '0', '0', 'I', '5', 4),
(160, '1', 26, '8GESP5', 'GDF-1405', 'FINANZAS CORPORATIVAS', 'FINANZAS CORPORATIVAS', '2', '3', '5', '8', '1', '0', '3', 'L', '48', '8', '0', '0', 'I', '6', 4),
(161, '1', 26, '8GESP6', 'GDF-1406', 'FINANZAS BURSATILES', 'FINANZAS BURSATILES', '2', '3', '5', '8', '1', '0', '3', 'L', '49', '8', '0', '0', 'I', '7', 4),
(162, '1', 3, '06-04', 'ACA-0910', 'TALLER DE INVESTIGACIÓN II', 'TALLER DE INVES. II', '0', '4', '4', '6', '0', '0', '1', 'L', '43', '6', '0', '0', 'A', '4', 4),
(163, '1', 26, 'EST-TEC', 'GEM-1704', 'ESTUDIO TECNICO', 'ESTUDIO TECNICO', '2', '4', '6', '8', '1', '0', '3', 'L', '47', '8', '0', '0', 'I', '2', 4),
(164, '1', 26, 'INNOGES', 'GEH-1701', 'INNOVACIÓN Y GESTIÓN', 'INNOVACIÓN Y GESTIÓN', '1', '3', '4', '7', '1', '0', '3', 'L', '44', '7', '0', '0', 'I', '7', 4),
(165, '1', 26, 'INV-MER', 'GED-1702', 'INVESTIGACIÓN DE MERCADOS', 'INVESTIGACIÓN DE MERCADOS', '2', '3', '5', '7', '1', '0', '3', 'L', '45', '7', '0', '0', 'I', '8', 4),
(166, '1', 26, 'TALESTR', 'GED-1703', 'TALLER DE ESTRUCTURA ORGANIZACIONAL Y ADMINISTRATIVA EN LA EMPRESA MODERNA', 'TALLER DE ESTR. ORG. Y ADMINIS', '2', '3', '5', '8', '1', '0', '3', 'L', '46', '8', '0', '0', 'I', '1', 4),
(167, '3', 24, '06-02', 'DWB-2205', 'INFRAESTRUCTURA DE PROYECTOS', 'INFRA. DE PROYECTOS', '1', '4', '5', '6', '3', '0', '3', 'L', '00', '6', '0', '3', 'A', '2', 4),
(168, '3', 24, '07-02', 'DWB-2201', 'SUITS DE DESARROLLO WEB', 'SUITS DESA. WEB', '1', '4', '5', '7', '3', '0', '3', 'L', '00', '7', '0', '3', 'A', '2', 4),
(169, '3', 24, '08-02', 'DWB-2203', 'DESARROLLO FRONT-END', 'DESA. FRONT-END', '1', '4', '5', '8', '3', '0', '3', 'L', '00', '8', '0', '3', 'A', '2', 4),
(170, '3', 24, '08-06', 'DWB-2204', 'DESARROLLO BACK-END', 'DESA. BACK-END', '1', '4', '5', '8', '3', '0', '3', 'L', '00', '8', '0', '3', 'A', '6', 4),
(171, '3', 24, '09-06', 'DWB-2202', 'DESARROLLO DE APLICACIONES CROSS-PLATAFORM', 'DESA. APLI. CROSS-PLATAFORM', '1', '4', '5', '9', '3', '0', '3', 'L', '00', '9', '0', '3', 'A', '6', 4),
(172, '2', 12, '07-06', 'DMD-1706', 'MANUFACTURA SUSTENTABLE', 'MANU. SUSTEN.', '2', '3', '5', '7', '2', '0', '3', 'L', '00', '7', '0', '2', 'A', '6', 4),
(173, '2', 12, '07-07', 'DMM-1701', 'DISEÑO ASISTIDO POR COMPUTADORA I', 'DISEÑO ASIS. COMPU. I', '2', '4', '6', '7', '2', '0', '3', 'L', '00', '7', '0', '2', 'A', '7', 4),
(174, '2', 12, '08-03', 'DMM-1703', 'DISEÑO ASISTIDO POR COMPUTADORA II', 'DISEÑO ASIS. COMPU. II', '2', '4', '6', '8', '2', '0', '3', 'L', '00', '8', '0', '2', 'A', '3', 4),
(175, '2', 12, '08-04', 'DMD-1702', 'TECNOLOGÍAS PARA EL DESARROLLO', 'TECNO. DESA.', '2', '4', '6', '8', '2', '0', '3', 'L', '00', '8', '0', '2', 'A', '4', 4),
(176, '2', 12, '08-05', 'DMD-1705', 'CONTROLADORES LÓGICOS PROGRAMABLES', 'CON. LOG. PROGRA.', '2', '3', '5', '8', '2', '0', '3', 'L', '00', '8', '0', '2', 'A', '5', 4),
(177, '2', 12, '08-06', 'DMD-1704', 'MANUFACTURA ESBELTA', 'MANU. ESBELTA', '2', '2', '4', '8', '2', '0', '3', 'L', '00', '8', '0', '2', 'A', '6', 4),
(178, '1', 26, '06-06', 'GDH-2001', 'ADMINISTRACIÓN DE LA MICRO, PEQUEÑA Y MEDIANA EMPRESA', 'ADMIN. MICRO. PEQ. MED.', '1', '3', '4', '6', '1', '0', '3', 'L', '00', '6', '0', '1', 'A', '6', 4),
(179, '1', 26, '06-07', 'GDC-2002', 'ANÁLISIS REGIONAL DEL ENTORNO DESDE UNA PERSPECTIVA DE NEGOCIO', 'ANAL. REGIO. DEL ENTOERNO', '2', '2', '4', '6', '1', '0', '3', 'L', '00', '6', '0', '1', 'A', '7', 4),
(180, '1', 26, '07-06', 'GDG-2003', 'ENTORNO LEGAL Y FÍSCAL DE LAS ORGANIZACIONES', 'ENTO. LEG. Y FISCAL', '3', '3', '6', '7', '1', '0', '3', 'L', '00', '7', '0', '1', 'A', '6', 4),
(181, '1', 26, '07-07', 'GDM-2004', 'MERCADOTECNIA 4.0 Y LA INNOVACIÓN', 'MERCADO. E INNOVA.', '2', '3', '5', '7', '1', '0', '3', 'L', '00', '7', '0', '1', 'A', '7', 4),
(182, '1', 26, '08-02', 'GDM-2005', 'TÓPICOS PARA LA GESTIÓN INTEGRAL DE LAS ORGANIZACIONES', 'TOP. GESTION. INT. ORG.', '2', '4', '6', '8', '1', '0', '3', 'L', '00', '8', '0', '1', 'A', '2', 4),
(183, '1', 26, '08-03', 'GDF-2006', 'LA INNOVACIÓN EMPRESARIAL Y LOS SISTEMAS DE CALIDAD', 'INNO. EMP. SIS. CALIDAD', '3', '2', '5', '8', '1', '0', '3', 'L', '00', '8', '0', '1', 'A', '3', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_motivos`
--

CREATE TABLE `t_cat_motivos` (
  `id_cat_motivos` int(11) NOT NULL,
  `clasificacion` varchar(2) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_motivos`
--

INSERT INTO `t_cat_motivos` (`id_cat_motivos`, `clasificacion`, `descripcion`) VALUES
(1, 'A', 'ALTA DEFINITIVA'),
(2, 'A', 'ALTA INTERINA LIMITADA'),
(3, 'A', 'ALTA EN GRAVIDEZ'),
(4, 'A', 'ALTA EN PENSION'),
(5, 'B', 'BAJA POR DEFUNCION'),
(6, 'B', 'BAJA POR RENUNCIA'),
(7, 'B', 'BAJA POR JUBILACION O PENSION'),
(8, 'B', 'BAJA POR ABANDONO DE EMPLEO'),
(9, 'B', 'BAJA POR TERMINO DE NOMBRAMIENTO'),
(10, 'B', 'BAJA POR DICTAMEN ESCALAFONARIO'),
(11, 'B', 'BAJA POR PASAR A OTRO EMPLEO'),
(12, 'B', 'BAJA POR INSUBSISTENCIA DE NOMBRAMIENTO'),
(13, 'B', 'BAJA POR REGULARIZACION DE PLANTILLA'),
(14, '', 'P.N.C.'),
(15, 'L', 'LIC.POR CRIANZA DE HIJOS MENORES DE 2 A.'),
(16, 'L', 'LIC.POR ASUNTOS PART. SIN GOCE DE SUELDO'),
(17, 'L', 'LIC. POR PASAR A OTRO EMPLEO'),
(18, 'L', 'LIC.COMISION SINDICAL O ELECCION POPULAR'),
(19, 'L', 'LICENCIA POR GRAVIDEZ'),
(20, 'L', 'LIC.POR INCAPACIDAD MED.CON MEDIO SUELDO'),
(21, 'L', 'LIC.INCAPACIDAD MED. SIN SUELDO'),
(22, 'L', 'LIC. POR BECA EN EL EXTRANJERO'),
(23, 'L', 'LICENCIA PREPENSIONARIA'),
(24, 'P', 'PRORROGA DE LICENCIA X CRIANZA DE HIJOS'),
(25, 'P', 'PRORROGA DE LIC.POR ASUNTOS PARTICULARES'),
(26, 'P', 'PRORROGA DE LICENCIA POR OTRO EMPLEO'),
(27, 'P', 'PRORROGA LIC.COMISION SIND.O ELECC.POPU.'),
(28, 'P', 'PRORROGA LIC.INC.MEDICA C/SUELDO,O 1/2 S'),
(29, 'P', 'PRORROGA LIC.INCAPACIDAD MED.SIN SUELDO'),
(30, 'P', 'PRORROGA LIC. POR BECA EN EL EXTRANJERO'),
(31, '', 'PLAZA C A N C E L A D A'),
(32, 'R', 'REANUDACION LIC.CRIANZA HIJOS MENORES 2A'),
(33, 'R', 'REANUDACION DE LIC.ASUNTOS PARTICULARES'),
(34, 'R', 'REANUDACION DE LICENCIA POR OTRO EMPLEO'),
(35, 'R', 'REANUDACION LIC.COM.SIND.O ELECC.POPULAR'),
(36, 'R', 'REANUDACION LIC. POR GRAVIDEZ'),
(37, 'R', 'REANUDACION LIC.INC.MED.CON MEDIO SUELDO'),
(38, 'R', 'REANUDACION LIC.INC. MEDICA SIN SUELDO'),
(39, 'R', 'REANUDACION LIC.POR BECA EN EXTRANJERO'),
(40, 'R', 'REANUDACION LIC. PREPENSIONARIA'),
(41, 'R', 'REANUDACION LIC.PLAZA CONG.POR TITULAR'),
(42, 'B', 'BAJA POR SENTENCIA JUDICIAL'),
(43, 'B', 'BAJA RESO.TRI.CONCILIACION Y ARBITRAJE'),
(44, 'B', 'BAJA POR INCAPACIDAD I.S.S.S.T.E.'),
(45, 'B', 'BAJA POR CAMBIO DE ADSCRIPCION'),
(46, '', 'CAMBIO DE ADSCRIPCION'),
(47, 'A', 'ALTA INICIAL'),
(48, 'A', 'ALTA PROVISIONAL'),
(49, 'A', 'ALTA DE CONFIANZA'),
(50, 'A', 'ALTA POR ...');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_necesidad`
--

CREATE TABLE `t_cat_necesidad` (
  `id_cat_necesidad` int(11) NOT NULL,
  `necesidad` varchar(5) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_necesidad`
--

INSERT INTO `t_cat_necesidad` (`id_cat_necesidad`, `necesidad`, `descripcion`) VALUES
(1, 'CN', 'CRECIMIENTO NATURAL'),
(2, 'AS', 'ANO SABATICO'),
(3, 'BC', 'BECA COMISION'),
(4, 'AND', 'APLICADA EN ACTIVIDADES NO DOCENTES'),
(5, 'PC', 'POR COMPACTACION'),
(6, 'IL', 'INTERINATO LIMITADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_nivel_areas`
--

CREATE TABLE `t_cat_nivel_areas` (
  `id_cat_nivel_areas` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_nivel_areas`
--

INSERT INTO `t_cat_nivel_areas` (`id_cat_nivel_areas`, `descripcion`) VALUES
(1, 'SIN AREA DEFINIDA'),
(2, 'DIRECCION'),
(3, 'STAFF'),
(4, 'SUBDIRECCION'),
(5, 'DEPARTAMENTO'),
(6, 'OFICINA / COORDINACION'),
(7, 'LABORATORIO'),
(8, 'SECCION / AREA'),
(9, 'SINDICATO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_nivel_escolar`
--

CREATE TABLE `t_cat_nivel_escolar` (
  `id_cat_nivel_escolar` int(11) NOT NULL,
  `nivel_escolar` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_nivel_escolar`
--

INSERT INTO `t_cat_nivel_escolar` (`id_cat_nivel_escolar`, `nivel_escolar`) VALUES
(1, 'SIN ESTUDIO'),
(2, 'PRIMARIA'),
(3, 'CARRERA COMERCIAL'),
(4, 'ESTUDIOS TECNICOS'),
(5, 'SECUNDARIA'),
(6, 'BACHILLERATO'),
(7, 'NORMAL'),
(8, 'NORMAL SUPERIOR'),
(9, 'PASANTE DE CARRERA PROF.'),
(10, 'PROFESIONAL'),
(11, 'POSTGRADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_nivel_puesto`
--

CREATE TABLE `t_cat_nivel_puesto` (
  `id_cat_nivel_puesto` int(11) NOT NULL,
  `descripcion_nivel_puesto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_nivel_puesto`
--

INSERT INTO `t_cat_nivel_puesto` (`id_cat_nivel_puesto`, `descripcion_nivel_puesto`) VALUES
(1, 'DIRECTOR'),
(2, 'SUBDIRECTOR'),
(3, 'JEFES DE DEPARTAMENTO'),
(4, 'JEFES DE AREA / COORDINADORES'),
(5, 'JEFES DE PROYECTO Y LABORATORIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_ocupacion_padres`
--

CREATE TABLE `t_cat_ocupacion_padres` (
  `id_cat_ocupacion_padres` int(11) NOT NULL,
  `ocupacion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_ocupacion_padres`
--

INSERT INTO `t_cat_ocupacion_padres` (`id_cat_ocupacion_padres`, `ocupacion`) VALUES
(1, 'No lo se'),
(2, 'Labores del Hogar'),
(3, 'Dueno de negocio, empresa, despacho o comercio estable'),
(4, 'Profesor , investigador'),
(5, 'Profesionista que ejerce por su cuenta'),
(6, 'Obrero'),
(7, 'Ganadero, agricultor o similar'),
(8, 'Campesino, jornalero, pescador o similar'),
(9, 'Jubilado o pensionado'),
(10, 'Funcionario o gerente de empresa privada'),
(11, 'Funcionario de empresa publica'),
(12, 'Empleado, oficinista o secretaria de empresa privada'),
(13, 'Burocrata, oficinista o secretaria de empresa publica'),
(14, 'Trabajador de oficio con personal a su cargo'),
(15, 'Vendedor en comercio o empresa'),
(16, 'Vendedor por su cuenta o ambulante'),
(17, 'Peon, ayudante, mozo o empleada domestica'),
(18, 'Miembro de las fuerzas armadas'),
(19, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_organigrama`
--

CREATE TABLE `t_cat_organigrama` (
  `id_cat_organigrama` int(11) NOT NULL,
  `clave_area` int(11) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `area_depende` int(11) DEFAULT NULL,
  `nivel` int(11) DEFAULT NULL,
  `tipo_area` varchar(2) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_organigrama`
--

INSERT INTO `t_cat_organigrama` (`id_cat_organigrama`, `clave_area`, `descripcion`, `area_depende`, `nivel`, `tipo_area`, `estado`) VALUES
(1, 100000, 'DIRECCION', 100000, 1, 'A', 1),
(2, 110000, 'SUBDIRECCION ACADEMICA', 100000, 3, 'A', 1),
(3, 110100, 'DEPARTAMENTO DE CIENCIAS BASICAS', 110000, 4, 'D', 1),
(4, 110101, 'COORDINACION DE CIENCIAS BASICAS', 110100, 5, 'D', 0),
(5, 110102, 'LABORATORIO DE QUIMICA', 110100, 6, 'D', 0),
(6, 110200, 'DEPARTAMENTO DE METAL MECANICA', 110000, 4, 'D', 0),
(7, 110201, 'COORDINACION DE INGENIERIA MECANICA', 110200, 5, 'D', 0),
(8, 110202, 'TALLER DE MAQUINAS Y HERRAMIENTAS', 110200, 6, 'D', 0),
(9, 110203, 'LABORATORIO DE INGENIERIA MECANICA', 110200, 6, 'D', 0),
(10, 110204, 'LABORATORIO DE VIBRACIONES MECANICAS', 110200, 6, 'D', 0),
(11, 110205, 'LABORATORIO DE ANALISIS DE ESFUERZOS', 110200, 6, 'D', 0),
(12, 110300, 'DEPTO. DE INGENIERIA INDUSTRIAL', 110000, 4, 'D', 1),
(13, 110301, 'COORDINACION DE INGENIERIA INDUSTRIAL', 110300, 5, 'D', 0),
(14, 110302, 'LABORATORIO DE PRODUCCION', 110300, 5, 'D', 0),
(15, 110400, 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA', 110000, 4, 'D', 0),
(16, 110401, 'COORDINACION DE ARQUITECTURA', 110400, 5, 'D', 0),
(17, 110402, 'LABORATORIO DE CONSTRUCCION', 110400, 6, 'D', 0),
(18, 110403, 'LABORATORIO DE ARQUITECTURA', 110400, 6, 'D', 0),
(19, 110500, 'DEPARTAMENTO DE INGENIERIA ELECTRICA Y ELECTRONICA', 110000, 4, 'D', 0),
(20, 110501, 'COORDINACION INGENIERIA ELECTRICA', 110500, 5, 'D', 0),
(21, 110502, 'COORDINACION INGENIERIA ELECTRONICA', 110500, 5, 'D', 0),
(22, 110503, 'LABORATORIO DE INGENIERIA ELECTRICA', 110500, 6, 'D', 0),
(23, 110504, 'LABORATORIO DE ELECTRONICA', 110500, 6, 'D', 0),
(24, 110600, 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION', 110000, 4, 'D', 1),
(25, 110601, 'COORDINACION DE ING. EN SISTEMAS COMPUTACIONALES', 110600, 5, 'D', 0),
(26, 110700, 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS', 110000, 4, 'D', 1),
(27, 110701, 'COORDINACION DE ADMINISTRACION', 110700, 5, 'D', 0),
(28, 110800, 'DEPARTAMENTO DE DESAROLLO ACADEMICO', 110000, 4, 'A', 1),
(29, 110801, 'OFICINA DE DESARROLLO CURRICULAR', 110800, 5, 'A', 0),
(30, 110802, 'OFICINA DE MEDIOS AUDIOVISUALES', 110800, 5, 'A', 0),
(31, 110803, 'OFICINA DE ORIENTACION EDUCATIVA', 110800, 5, 'A', 0),
(32, 110804, 'OFICINA DE DESARROLLO PROFESIONAL', 110800, 5, 'A', 0),
(33, 110805, 'OFICINA DE ADMISION DE ALUMNOS', 110800, 5, 'A', 0),
(34, 110900, 'DIVISION DE POSTGRADO E INVESTIGACION', 110000, 4, 'D', 0),
(35, 111000, 'DIVISION DE ESTUDIOS PROFESIONALES', 110000, 4, 'A', 1),
(36, 111100, 'DEPARTAMENTO DE ING. QUIMICA Y BIOQUIMICA', 110000, 4, 'D', 0),
(37, 111200, 'DEPARTAMENTO DE ING. MECATRONICA', 110000, 4, 'D', 0),
(38, 111201, 'COORDINACION DE CARRERA MECATRONICA', 111200, 5, 'D', 0),
(39, 111300, 'DEPARTAMENTO DE ARQUITECTURA', 110000, 4, 'D', 0),
(40, 120000, 'SUBDIRECCION DE PLANEACION', 100000, 3, 'P', 1),
(41, 120100, 'DEPARTAMENTO DE PLANEACION, PROGRAMACION Y PRESUPUESTO', 120000, 4, 'P', 1),
(42, 120101, 'OFICINA DESARROLLO INSTITUCIONAL', 120100, 5, 'P', 0),
(43, 120102, 'OFICINA PROGRAMACION Y EVALUACION PRESUPUESTAL', 120100, 5, 'P', 0),
(44, 120103, 'OFICINA CONSTRUCCION Y EQUIPAMIENTO', 120100, 5, 'P', 0),
(45, 120200, 'DEPARTAMENTO DE GESTION TECNOLOGICA Y VINCULACION', 120000, 4, 'P', 1),
(46, 120201, 'OFICINA DE GESTION', 120200, 5, 'P', 0),
(47, 120202, 'OFICINA DE VINCULACION CON EL SECTOR PRODUCTIVO', 120200, 5, 'P', 0),
(48, 120203, 'OFICINA DE SERVICIO SOCIAL', 120200, 5, 'P', 0),
(49, 120204, 'OFICINA DE SERVICIOS EXTERNOS', 120200, 5, 'P', 0),
(50, 120205, 'LABORATORIO DE IDIOMAS', 120200, 6, 'D', 0),
(51, 120300, 'DEPARTAMENTO DE COMUNICACION Y DIFUSION', 120000, 4, 'P', 1),
(52, 120301, 'OFICINA EDITORIAL', 120300, 5, 'P', 0),
(53, 120302, 'OFICINA DIFUSION ESCRITA Y AUDIOVISUAL', 120300, 5, 'P', 0),
(54, 120303, 'OFICINA DE RELACIONES PUBLICAS', 120300, 5, 'P', 0),
(55, 120400, 'DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES', 120000, 4, 'D', 1),
(56, 120401, 'OFICINA ACTIVIDADES CULTURALES', 120400, 5, 'D', 0),
(57, 120402, 'OFICINA DE ACTIVIDADES DEPORTIVAS', 120400, 5, 'D', 0),
(58, 120500, 'DEPARTAMENTO DE CENTRO DE INFORMACION', 120000, 4, 'P', 1),
(59, 120501, 'OFICINA DE ADQUISICIONES', 120500, 5, 'P', 0),
(60, 120502, 'OFICINA DE PROCESOS TECNICOS', 120500, 5, 'P', 0),
(61, 120503, 'OFICINA DE SERVICIOS AL PUBLICO', 120500, 5, 'P', 0),
(62, 120600, 'DEPARTAMENTO DE SERVICIOS ESCOLARES', 120000, 4, 'P', 1),
(63, 120601, 'OFICINA DE CONTROL ESCOLAR', 120600, 5, 'P', 0),
(64, 120602, 'OFICINA DE TITULACION', 120600, 5, 'P', 0),
(65, 120603, 'OFICINA DE SERVICIOS MEDICOS', 120600, 5, 'P', 0),
(66, 120604, 'OFICINA DE SERVICIOS ESTUDIANTILES', 120600, 5, 'P', 0),
(67, 130000, 'SUBDIRECCION DE SERVICIOS ADMINISTRATIVOS', 100000, 3, 'A', 1),
(68, 130100, 'DEPARTAMENTO DE CENTRO DE COMPUTO', 130000, 4, 'A', 1),
(69, 130101, 'OFICINA DISEÑO Y DESARROLLO DE SISTEMAS', 130100, 5, 'A', 0),
(70, 130102, 'OFICINA INTERNET E INTRANET', 130100, 5, 'A', 0),
(71, 130103, 'OFICINA CONECTIVIDAD Y REDES', 130100, 5, 'A', 0),
(72, 130104, 'OFICINA DE MANTENIMIENTO DE EQUIPO DE COMPUTO', 130100, 5, 'A', 0),
(73, 130105, 'OFICINA DE SOPORTE TECNICO', 130100, 5, 'A', 0),
(74, 130106, 'LABORATORIO DE COMPUTO', 130100, 6, 'D', 0),
(75, 130200, 'DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS', 130000, 4, 'A', 1),
(76, 130201, 'OFICINA DE CONSERVACION', 130200, 5, 'A', 0),
(77, 130300, 'DEPARTAMENTO DE RECURSOS HUMANOS', 130000, 4, 'A', 1),
(78, 130301, 'OFICINA DE ADMINISTRACION DE PERSONAL', 130300, 5, 'A', 0),
(79, 130400, 'DEPARTAMENTO DE RECURSOS FINANCIEROS', 130000, 4, 'A', 1),
(80, 130401, 'OFICINA DE CONTABILIDAD Y PRESUPUESTO', 130400, 5, 'A', 0),
(81, 130402, 'OFICINA DE ADQUISICIONES', 130400, 5, 'A', 0),
(82, 130403, 'OFICINA DE ALMACEN E INVENTARIO', 130400, 5, 'A', 0),
(83, 130600, 'DEPARTAMENTO DE MANTENIMIENTO', 130000, 4, 'A', 1),
(84, 140000, 'COMITE DE GESTION TECNOLOGICA Y VINCULACION', 100000, 2, 'A', 0),
(85, 150000, 'COMITE DE PLANEACION', 100000, 2, 'A', 0),
(86, 160000, 'CONSEJO EDITORIAL', 100000, 2, 'A', 0),
(87, 170000, 'COMITE ACADEMICO', 100000, 2, 'A', 0),
(88, 200000, 'SINDICATO', 100000, 8, 'A', 0),
(89, 999999, 'SIN AREA DE ADSCRIPCION', 100000, 8, 'A', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_permisos`
--

CREATE TABLE `t_cat_permisos` (
  `id_permisos` int(11) NOT NULL,
  `fk_usuario` int(11) DEFAULT NULL,
  `fk_cat_organigrama` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_permisos`
--

INSERT INTO `t_cat_permisos` (`id_permisos`, `fk_usuario`, `fk_cat_organigrama`) VALUES
(1, NULL, NULL),
(2, NULL, NULL),
(3, NULL, NULL),
(4, NULL, NULL),
(5, NULL, NULL),
(6, NULL, NULL),
(7, NULL, NULL),
(8, NULL, NULL),
(9, NULL, NULL),
(10, NULL, NULL),
(11, NULL, NULL),
(12, NULL, NULL),
(13, NULL, NULL),
(14, NULL, NULL),
(15, NULL, NULL),
(16, NULL, NULL),
(17, NULL, NULL),
(18, NULL, NULL),
(19, NULL, NULL),
(20, NULL, NULL),
(21, NULL, NULL),
(22, NULL, NULL),
(23, NULL, NULL),
(24, NULL, NULL),
(25, NULL, NULL),
(26, NULL, NULL),
(27, NULL, NULL),
(28, NULL, NULL),
(29, NULL, NULL),
(30, NULL, NULL),
(31, NULL, NULL),
(32, NULL, NULL),
(33, NULL, NULL),
(34, NULL, NULL),
(35, NULL, NULL),
(36, NULL, NULL),
(37, NULL, NULL),
(38, NULL, NULL),
(39, NULL, NULL),
(40, NULL, NULL),
(41, NULL, NULL),
(42, NULL, NULL),
(43, NULL, NULL),
(44, NULL, NULL),
(45, NULL, NULL),
(46, NULL, NULL),
(47, NULL, NULL),
(48, NULL, NULL),
(49, NULL, NULL),
(50, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_preguntas`
--

CREATE TABLE `t_cat_preguntas` (
  `id_cat_preguntas` int(11) NOT NULL,
  `tipo_encuesta` int(11) DEFAULT 1,
  `no_pregunta` int(11) DEFAULT NULL,
  `pregunta` varchar(255) DEFAULT NULL,
  `respuestas` varchar(255) DEFAULT NULL,
  `valor_respuesta` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_preguntas`
--

INSERT INTO `t_cat_preguntas` (`id_cat_preguntas`, `tipo_encuesta`, `no_pregunta`, `pregunta`, `respuestas`, `valor_respuesta`) VALUES
(1, 1, 1, 'Explica de manera clara los contenidos de la asignatura.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(2, 1, 2, 'Relaciona los contenidos de la asignatura con los contenidos de otras.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(3, 1, 3, 'Resuelve las dudas relacionadas con los contenidos de la asignatura.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(4, 1, 4, 'Propone ejemplos o ejercicios que vinculan la asignatura con la práctica profesional.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(5, 1, 5, 'Explica la utilidad de los contenidos teóricos y prácticos para la actividad profesional.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(6, 1, 6, 'Cumple con los acuerdos establecidos al inicio de la asignatura.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(7, 1, 7, 'Durante el curso establece las estrategias adecuadas necesarias para lograr el aprendizaje deseado.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(8, 1, 8, 'El programa presentado al principio de la asignatura se cubre totalmente.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(9, 1, 9, 'Incluye experiencias de aprendizaje en lugares diferentes al aula (talleres, laboratorios, empresa, comunidad, etc.).', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(10, 1, 10, 'Utiliza para el aprendizaje las herramientas de interacción de las tecnologías actuales de la información (correo electrónico, chats, plataformas, etc.).', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(11, 1, 11, 'Organiza actividades que me permiten ejercitar mi expresión oral y escrita.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(12, 1, 12, 'Relaciona los contenidos de la asignatura con la industria y la sociedad a nivel local, regional, nacional e internacional.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(13, 1, 13, 'Usa ejemplos y casos relacionados con la vida real', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(14, 1, 14, 'Adapta las actividades para atender los diferentes estilos de aprendizaje de los estudiantes.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(15, 1, 15, 'Promueve el autodidactismo y la investigación.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(16, 1, 16, 'Promueve actividades participativas que me permiten colaborar con mis compañeros con una actitud positiva.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(17, 1, 17, 'Estimula la reflexión sobre la manera en que aprendes.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(18, 1, 18, 'Se involucra en las actividades propuestas al grupo.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(19, 1, 19, 'Presenta y expone las clases de manera organizada y estructurada.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(20, 1, 20, 'Utiliza diversas estrategias, métodos, medios y materiales.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(21, 1, 21, 'Muestra compromiso y entusiasmo en sus actividades docentes.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(22, 1, 22, 'Toma en cuenta las necesidades, intereses y expectativas del grupo.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(23, 1, 23, 'Propicia el desarrollo de un ambiente de respeto y confianza.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(24, 1, 24, 'Propicia la curiosidad y el deseo de aprender.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(25, 1, 25, 'Reconoce los éxitos y logros en las actividades de aprendizaje.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(26, 1, 26, 'Existe la impresión de que se toman represalias con algunos estudiantes.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(27, 1, 27, 'Hace interesante la asignatura.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(28, 1, 28, 'Identifica los conocimientos y habilidades de los estudiantes al inicio de la asignatura o de cada unidad.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(29, 1, 29, 'Proporciona información para realizar adecuadamente las actividades de evaluación.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(30, 1, 30, 'Toma en cuenta las actividades realizadas y los productos como evidencias para la calificación y acreditación de la asignatura.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(31, 1, 31, 'Considera los resultados de la evaluación (asesorí­as, trabajos complementarios, búsqueda de información, etc.) para realizar mejoras en el aprendizaje.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(32, 1, 32, 'Da a conocer las calificaciones en el plazo establecido.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(33, 1, 33, 'Da oportunidad de mejorar los resultados de la evaluación del aprendizaje.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(34, 1, 34, 'Muestra apertura para la corrección de errores de apreciación y evaluación.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(35, 1, 35, 'Otorga calificaciones imparciales.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(36, 1, 36, 'Desarrolla la clase en un clima de apertura y entendimiento.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(37, 1, 37, 'Escucha y toma en cuenta las opiniones de los estudiantes.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(38, 1, 38, 'Muestra congruencia entre lo que dice y lo que hace.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(39, 1, 39, 'Asiste a clases regular y puntualmente.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(40, 1, 40, 'Fomenta la importancia de contribuir a la conservación del medio ambiente.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(41, 1, 41, 'Promueve mantener limpias y ordenadas las instalaciones.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(42, 1, 42, 'Es accesible y está dispuesto a brindarte ayuda académica.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(43, 1, 43, 'Emplea las tecnologí­as de la información y de la comunicación como un medio que facilite el aprendizaje de los estudiantes.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(44, 1, 44, 'Promueve el uso de diversas herramientas, particularmente las digitales, para gestionar (recabar, procesar, evaluar y usar) información.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(45, 1, 45, 'Promueve el uso seguro, legal y ético de la información digital.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(46, 1, 46, 'En general, pienso que es un buen docente', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(47, 1, 47, 'Estoy satisfecha o satisfecho por mi nivel de desempeño y aprendizaje logrado gracias a la labor del docente.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(48, 1, 48, 'Yo recomendaría a este docente a otros compañeros.', '5) Totalmente de acuerdo 4) De acuerdo 3) Indiferente 2) En desacuerdo 1) Altamente en desacuerdo', 5),
(49, 2, 1, 'Acredita un diplomado en formación docente  o profesional , o realiza una estadía técnica en su área de formación, y asiste a un evento (congreso, simposio, convención, entre otros),  y acredita cursos de formación docente y/o profesional y muestra eviden', '', 5),
(50, 2, 2, 'Cuenta con el título y la cédula de licenciatura y posgrado.', '', 5),
(51, 2, 3, 'Diseña un curso de actualización docente o profesional que considere: la guía de sesión, cronograma y los  materiales didácticos, y participa en la impartición de cursos  entregando el reporte final.', '', 5),
(52, 2, 4, 'Participa en la academia  y grupos de trabajo o comités de evaluación ypláticas de induccióno en exámenes de nuevo ingreso o promoción de las carreras del instituto y pertenece a asociaciones académicas o profesionales nacionales y/o internacionales.', '', 5),
(53, 2, 5, 'Realiza el avance programático de curso y/o  diseña la instrumentación didáctica en el seno de las academias por áreas del conocimiento (con docentes que dan la misma asignatura),  y los presenta en tiempo y forma, y da seguimiento a lo programado,y reali', '', 5),
(54, 2, 6, 'Entrega al Departamento Académico una relación de bibliografía básica y de consulta sugerida para mantener actualizado el acervo bibliográfico de su asignatura, y prepara presentaciones  electrónicas o antologías para sus clases, y propone el uso de tecno', '', 5),
(55, 2, 7, 'Asiste a / Participa en: -Eventos institucionales (honores a la bandera, ceremonia de inicio de cursos, graduaciones). -Pláticas o reuniones informativas convocadas por grupos de trabajo con el fin de mejorar la vida institucional. - Con su grupo a plátic', '', 5),
(56, 2, 8, 'Planea  y ejecuta actividades para el fortalecimiento del aprendizaje como reforzamiento al totalde sus asignaturas con representantes de los sectores empresarial, gubernamental y social (conferencias, visitas industriales, talleres, foros, seminarios, pa', '', 5),
(57, 2, 9, 'Desarrolla, administra, Concerta y asesora proyecto de  residencia profesional, de servicio social, de investigación, innovación o incubación de empresas que den respuesta a las necesidades planteadas por los diferentes sectores de la sociedad.', '', 5),
(58, 2, 10, 'Desarrolla y  realiza un curso de capacitación,  participa en el diseño de un diplomado,  realiza un proyecto, da  asesoría técnica, o realiza  actividades,   para los sectores empresarial, gubernamental y social.', '', 5),
(59, 2, 11, 'Presenta informe final de proyecto de investigación disciplinar o educativa, o tiene un proyecto terminado en el periodo anterior y presenta un nuevo protocolo de proyecto de investigación disciplinar o educativa.', '', 5),
(60, 2, 12, 'Participa en grupos o redes de investigación (área de conocimiento de su competencia o educativos).', '', 5),
(61, 2, 13, 'Difunde y divulga los resultados de sus proyectos de investigación disciplinar o educativa.', '', 5),
(62, 2, 14, 'Involucra y asesora al o los estudiante (s)  en el proyecto de investigación, avala bitácora de actividades realizadas y el estudiante genera producto(s) como resultado de las actividades realizadas en la investigación.', '', 5),
(63, 2, 15, 'Cuenta con un diplomado referente a la tutoría y cursos que apoyan la actividad tutorial.', '', 5),
(64, 2, 16, 'Elabora el Programa de Acción Tutorial considerando: el diagnóstico, la competencia general y específica,  los contenidos, el cronograma de actividades,  los recursos necesarios,las estrategias, y la  evaluación,  y  lo presenta en tiempo y forma.', '', 5),
(65, 2, 17, 'Realiza sesiones planeadas,  realiza diagnóstico y canaliza estudiantes en riesgo, y promueve programas de apoyo para la formación integral del tutorado  y aplica estrategias.', '', 5),
(66, 2, 18, 'Entrega un reporte con las actividades desarrolladas en el Programa de Acción Tutorial, presenta evidencias del seguimiento, hace contrastación entre lo planeado y lo realizado, identifica sus áreas de oportunidad  y elabora una propuesta de realimentació', '', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_puestos`
--

CREATE TABLE `t_cat_puestos` (
  `id_cat_puestos` int(11) NOT NULL,
  `descripcion_puesto` varchar(255) DEFAULT NULL,
  `clave_puesto` int(11) DEFAULT NULL,
  `fk_cat_nivel_puesto` varchar(11) DEFAULT NULL,
  `horas_asignadas` int(11) DEFAULT NULL,
  `fecha_ingreso_puesto` datetime DEFAULT current_timestamp(),
  `fecha_termino_puesto` date DEFAULT NULL,
  `fecha_ratificacion_puesto` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_puestos`
--

INSERT INTO `t_cat_puestos` (`id_cat_puestos`, `descripcion_puesto`, `clave_puesto`, `fk_cat_nivel_puesto`, `horas_asignadas`, `fecha_ingreso_puesto`, `fecha_termino_puesto`, `fecha_ratificacion_puesto`) VALUES
(2, 'JEFE DE DEPARTAMENTO', 10, '3', NULL, '2023-01-29 05:08:35', NULL, NULL),
(3, 'DOCENTE', 13, '', NULL, '2023-01-29 05:08:35', NULL, NULL),
(4, 'SUBDIRECTOR', 1000, '2', NULL, '2023-01-29 05:08:35', NULL, NULL),
(5, 'AUXILIAR DE MANTENIMIENTO', 1001, '0', NULL, '2023-01-29 05:08:35', NULL, NULL),
(6, 'AUXILIAR ADMINISTRATIVO', 1002, '0', NULL, '2023-01-29 05:08:35', NULL, NULL),
(7, 'AUXILIAR DE BIBLIOTECA', 1003, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(8, 'KARDISTA', 1004, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(9, 'SECRETARIA DE JEFE DE DEPARTAMENTO', 1005, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(10, 'JEFE DE LABORATORIO', 1006, '5', NULL, '2023-01-29 05:08:36', NULL, NULL),
(11, 'MEDICO', 1007, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(12, 'PROMOTOR CULTURAL', 1008, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(13, 'SECRETARIA DE JEFE DE DIVISION', 1009, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(14, 'CASETERO HERRAMENTISTA', 1010, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(15, 'JEFE DE TALLER', 1012, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(16, 'PROFESOR INVESTIGADOR', 1013, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(17, 'SECRETARIA DE SUBDIRECTOR', 1014, '0', NULL, '2023-01-29 05:08:36', NULL, NULL),
(18, 'CHOFER', 1015, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(19, 'OPERADOR DE LITOGRAFIA', 1016, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(20, 'JEFE DE CENTRO DE COMPUTO', 1017, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(21, 'OPERADOR DE CONMUTADOR', 1018, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(22, 'OPERADOR DE FOTOCOPIADOR', 1019, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(23, 'ALMACENISTA', 1020, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(24, 'ANALISTA DE SISTEMAS', 1021, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(25, 'SECRETARIA DE JEFE DE CENTRO DE COMPUTO', 1022, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(26, 'AUXILIAR DE TALLER', 1023, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(27, 'SUPERVISOR DE TIEMPO', 1024, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(28, 'ENCARGADA DE OFICINA', 1025, '0', NULL, '2023-01-29 05:08:37', NULL, NULL),
(29, 'AUXILIAR DEL CENTRO DE INFORMACION', 1026, '0', NULL, '2023-01-29 05:08:38', NULL, NULL),
(30, 'AUXILIAR DEL COMITE PROMOTOR DE DESARROLLO', 1027, '0', NULL, '2023-01-29 05:08:38', NULL, NULL),
(31, 'ENCARGADO DE DEPARTAMENTO', 1028, '0', NULL, '2023-01-29 05:08:38', NULL, NULL),
(32, 'AUXILIAR DE OFICINA', 1029, '0', NULL, '2023-01-29 05:08:38', NULL, NULL),
(33, 'AUXILIAR DE COORDINACION', 1030, '0', NULL, '2023-01-29 05:08:38', NULL, NULL),
(34, 'JEFE DEL CENTRO DE INFORMACION', 1031, '0', NULL, '2023-01-29 05:08:38', NULL, NULL),
(35, 'ASESOR Y JURADO DE TESIS', 1032, '0', NULL, '2023-01-29 05:08:38', NULL, NULL),
(36, 'MAESTRO DE TEATRO', 1033, '0', NULL, '2023-01-29 05:08:38', NULL, NULL),
(37, 'MAESTRO DE DANZA', 1034, '4', NULL, '2023-01-29 05:08:39', NULL, NULL),
(38, 'MEDICINA DEPORTIVA', 1035, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(39, 'SECRETARIA DEL COMITE PROMOTOR DE DESARROLLO', 1036, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(40, 'ENCARGADO DE LA COORDINACION', 1037, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(41, 'INSTRUCTOR DE PRACTICAS DE LABORATORIO', 1038, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(42, 'PROMOTOR DEPORTIVO DE NATACION', 1039, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(43, 'ENCARGADO DEL CENTRO REGIONAL MICROSEP', 1040, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(44, 'AUXILIAR DE CIRCULACION', 1041, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(45, 'COORDINADOR DE CARRERA', 1042, '4', NULL, '2023-01-29 05:08:39', NULL, NULL),
(46, 'ASISTENTE DE INFORMACION', 1043, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(47, 'PROMOTOR DEPORTIVO DE BASQUET-BALL', 1044, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(48, 'TECNICO EN ELECTRICIDAD', 1045, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(49, 'SECRETARIA', 1046, '0', NULL, '2023-01-29 05:08:39', NULL, NULL),
(50, 'AUXILIAR DE LABORATORIO DE ELECTRICIDAD', 1047, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(51, 'SECRETARIA CONTADOR PRIVADO', 1048, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(52, 'SUPERVISOR DE SERVICIOS', 1049, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(53, 'AUXILIAR DE LABORATORIO DE ELECTRONICA', 1050, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(54, 'JEFA DE LABORATORIO INGENIEROS DE SISTEM', 1051, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(55, 'JEFE LABORATORIO INGENIERIA QUIMICA', 1052, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(56, 'AUXILIAR LABORATORIO ANALISIS CUAL-CUANT', 1053, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(57, 'PROMOTOR DEPORTIVO BASE-BALL', 1054, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(58, 'PROMOTOR DEPORTIVO ATLETISMO', 1055, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(59, 'ENTRENADOR DEPORTIVO', 1056, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(60, 'JEFE LABORATORIO QUIMICA CUAL Y CUANT.', 1057, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(61, 'ENCARGADO DE PRACTICAS PROFESIONALES', 1058, '0', NULL, '2023-01-29 05:08:40', NULL, NULL),
(62, 'COORDINADOR CARRERA INGENIERIA ELECTRONI', 1059, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(63, 'TRABAJADORA SOCIAL', 1060, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(64, 'COORDINADOR DEPORTIVO', 1061, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(65, 'DEPARTAMENTO ADMINISTRACION DE RECURSOS', 1062, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(66, 'JEFE TALLER ELECTRICIDAD', 1063, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(67, 'INVESTIGADOR DE OPERACION', 1064, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(68, 'SECRETARIA DEL JEFE DIVISION DE EXTENCIO', 1065, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(69, 'COORDINADOR DE INVESTIGACION', 1066, '4', NULL, '2023-01-29 05:08:41', NULL, NULL),
(70, 'JARDINERO', 1067, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(71, 'AUXILIAR SALA ADJUNTA MICROSEP', 1068, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(72, 'DEPARTAMENTO ADMINISTRACION DEL PRESUPUE', 1069, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(73, 'DEPARTAMENTO TECNOLOGIA EDUCATIVA', 1070, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(74, 'COORDINADOR CULTURAL Y DEPORTIVO', 1071, '0', NULL, '2023-01-29 05:08:41', NULL, NULL),
(75, 'DEPARTAMENTO DE SERVICIOS GENERALES', 1072, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(76, 'CASETERO TALLER SOLDADURA', 1073, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(77, 'TECNICO EN MECANICA AUT.', 1074, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(78, 'TECNICO EN MAQUINAS Y HERRAMIENTAS', 1075, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(79, 'RESPONSABLE DE LABORATORIO IDIOMAS', 1076, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(80, 'PROFESOR ARTES Y CIENCIAS', 1077, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(81, 'AUXILIAR LABORATORIO ING. SIS. COMPUTACION', 1078, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(82, 'DEPARTAMENTO DE SERVICIOS EXTERNO', 1079, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(83, 'CASETERO TALLER MECANICO AUTOMOTRIZ', 1080, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(84, 'SUBDIRECTOR DE SERVICIOS ADMINISTRATIVOS', 1081, '2', NULL, '2023-01-29 05:08:42', NULL, NULL),
(85, 'AUXILIAR DE MEDIOS EDUCATIVOS', 1082, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(86, 'AUXILIAR DE INTENDENCIA', 1083, '0', NULL, '2023-01-29 05:08:42', NULL, NULL),
(87, 'DEPARTAMENTO DE PLANEACION', 1084, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(88, 'JEFE DE OFICINA DESARROLLO', 1085, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(89, 'JEFA DE LABORATORIO DE PRODUCCION', 1086, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(90, 'ENCARGADO DE SERVICIO SOCIAL', 1087, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(91, 'COORDINADOR DE CAPACITACION Y DESARROLLO', 1088, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(92, 'JEFE DE OFICINA CONSTRUCION Y EQUIPAMIENTO', 1089, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(93, 'JEFE DE OFICINA TITULACION', 1090, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(94, 'ENCARGADO DE ACTIVO FIJO', 1091, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(95, 'ENCARGADA DEL CONMUTADOR', 1092, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(96, 'SUPERVISOR DE INTENDENCIA', 1093, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(97, 'TECNICO EN MAQUINAS DE COMB. INTERNA', 1094, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(98, 'SECRETARIA BILINGUE', 1095, '0', NULL, '2023-01-29 05:08:43', NULL, NULL),
(99, 'AUXILIAR LABORATORIO ANALISIS CUALITATIVO', 1096, '0', NULL, '2023-01-29 05:08:44', NULL, NULL),
(100, 'OPERADOR', 1097, '0', NULL, '2023-01-29 05:08:44', NULL, NULL),
(101, 'AUXILIAR DE CONSULTA', 1098, '0', NULL, '2023-01-29 05:08:44', NULL, NULL),
(102, 'AUXILIAR LABORATORIO ANALISIS CUANTI.', 1099, '0', NULL, '2023-01-29 05:08:44', NULL, NULL),
(103, 'AUXILIAR LABORATORIO DE PRODUCCION', 1100, '0', NULL, '2023-01-29 05:08:44', NULL, NULL),
(104, 'JEFE OFICINA CONTROL DE PERSONAL', 1101, '0', NULL, '2023-01-29 05:08:44', NULL, NULL),
(105, 'JEFE TALLER MECANICO Y MANTENIMIENTO', 1102, '0', NULL, '2023-01-29 05:08:44', NULL, NULL),
(106, 'COORDINADOR DE DIFUSION', 1103, '0', NULL, '2023-01-29 05:08:44', NULL, NULL),
(107, 'AUXILIAR DE LABORATORIO DE PROPULSION', 1104, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(108, 'VIGILANTE', 1105, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(109, 'JEFE DEL DEPARTAMENTO DE COMUNICACION Y', 1106, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(110, 'PINTOR', 1107, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(111, 'ENCARGADO DE MANTENIMIENTO', 1108, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(112, 'CASETERA LAB. INGENIERIA ELECTRONICA', 1109, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(113, 'ASESOR CENTRO REGIONAL MICROSEP', 1110, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(114, 'JEFE LABORATORIO SISTEMAS DE COMPUTO', 1111, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(115, 'COORDINADOR AREA INGENIERO INDUSTRIAL', 1112, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(116, 'ENCARGADA SECCION CONTABILIDAD', 1113, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(117, 'JEFA SALA ADJUNTA MICROSEP', 1114, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(118, 'ASESOR LEGAL', 1115, '0', NULL, '2023-01-29 05:08:45', NULL, NULL),
(119, 'AUXILIAR DOCENTE', 1116, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(120, 'ASESOR CENTRO DE MATEMATICAS', 1117, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(121, 'COORDINADORA DEL SEMESTRE CERO', 1118, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(122, 'JEFE DE LA DIVISION', 1119, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(123, 'AUXILIAR DOCENTE TALLER SOLDADURA', 1120, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(124, 'JEFE LABORATORIO ALTA TENSION', 1121, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(125, 'JEFE OFICINA CONTROL ESCOLAR', 1122, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(126, 'JEFE DE MANTENIMIENTO', 1123, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(127, 'COORDINADOR DE MATERIAS BASICAS', 1124, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(128, 'JEFE MANTENIMIENTO ELECTRICO', 1125, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(129, 'AUXILIAR DEPORTIVO', 1126, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(130, 'JEFE OFICINA INFORMES Y SERVICIOS', 1127, '0', NULL, '2023-01-29 05:08:46', NULL, NULL),
(131, 'CATEDRATICO', 1128, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(132, 'ALBANIL', 1129, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(133, 'JEFE DEL DEPARTAMENTO DE SERVICIOS GENER', 1130, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(134, 'PRENSISTA', 1131, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(135, 'AUXILIAR DE METODOS EDUCATIVOS', 1132, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(136, 'ASESOR JURIDICO', 1133, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(137, 'PROMOTOR DEPORTIVO VOLEI-BALL', 1134, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(138, 'PROMOTOR CULTURAL MUSICA', 1135, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(139, 'ELECTRICISTA', 1136, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(140, 'CASETERO TALLER DE MECANICA', 1137, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(141, 'FONTANERO', 1138, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(142, 'COORDINADOR CARRERA INGENIERIA ELECTRICA', 1139, '0', NULL, '2023-01-29 05:08:47', NULL, NULL),
(143, 'JEFE OFICINA METODOS EDUCATIVOS', 1140, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(144, 'PROMOTOR CULTURAL TEATRO', 1141, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(145, 'JEFE OFICINA PROGRAMACION', 1142, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(146, 'JEFE OFICINA INFORMATICA', 1143, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(147, 'AUXILIAR DOCENTE MECANICA AUTOMOTIZ', 1144, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(148, 'COORDINADOR DE CAPACITACION', 1145, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(149, 'ENCARGADO DE VINCULACION', 1146, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(150, 'JEFE DE LABORATORIO INGENIERIRA ELECTRON', 1147, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(151, 'ENCARGADO DE CIRCULACION', 1148, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(152, 'ENFERMERA', 1149, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(153, 'JEFE DE TALLER MECANICO AUTOMOTRIZ', 1150, '0', NULL, '2023-01-29 05:08:48', NULL, NULL),
(154, 'JEFE TALLER INGENIERIA MECANICA', 1151, '5', NULL, '2023-01-29 05:08:48', NULL, NULL),
(155, 'JEFE DEL CENTRO DE GRADUADOS', 1152, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(156, 'JEFE LABORATORIO FISICOQUIMICA', 1153, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(157, 'COORDINADORA CARRERA ING. INDUSTRIAL EN', 1154, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(158, 'ENCARGADO DE SEGUIMIENTO', 1155, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(159, 'JEFE DE OFICINA DE PERSONAL DE RECURSOS', 1156, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(160, 'PROMOTOR DE DANZA', 1157, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(161, 'COORDINADOR CULTURAL', 1158, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(162, 'MAESTRO DE MUSICA', 1159, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(163, 'JEFA UNIDAD SERVICIOS MEDICOS', 1160, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(164, 'PROMOTOR DE ORATORIA Y DECLAMACION', 1161, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(165, 'COORDINADOR DE INGENIERIA INDUSTRIAL', 1162, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(166, 'JEFE DE OFICINA DE INFORMATICA', 1163, '0', NULL, '2023-01-29 05:08:49', NULL, NULL),
(167, 'JEFE DEL DEPARTAMENTO DE SERVICIOS ESCOLARES', 1164, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(168, 'JEFE DE OFICINA DE EDITORIAL', 1165, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(169, 'SECRETARIA SECCION INFORMACION Y SERVICI', 1166, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(170, 'COORDINADOR DE INGENIERIA ELECTROMECANICA', 1167, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(171, 'AUXILIAR OFICINA CONTROL ESCOLAR', 1168, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(172, 'JEFE TALLER ELECTRICIDAD Y MAGNETISMO', 1169, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(173, 'JEFE DEL LABORATORIO DE QUIMICA GENERAL', 1170, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(174, 'JEFE DEL LABORATORIO INGENIERIA ELECTRON', 1171, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(175, 'COORDINADOR DE INFORMATICA', 1172, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(176, 'JEFA DEL LABORATORIO FISICO-QUIMICA', 1173, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(177, 'PROMOTOR FUT-BALL SOCCER', 1174, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(178, 'AUXILIAR DE SERVICIO SOCIAL', 1175, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(179, 'AUXILIAR DE SERVICIO AL PUBLICO', 1176, '0', NULL, '2023-01-29 05:08:50', NULL, NULL),
(180, 'COORDINACION DE TITULACION', 1177, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(181, 'ORIENTACION VOCACIONAL', 1178, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(182, 'JEFE DEL CENTRO DE COMPUTO', 1179, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(183, 'AUXILIAR TALLER MECANICO', 1180, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(184, 'JEFE DIVISION ESTUDIOS SUPERIORES', 1181, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(185, 'JEFE DEL DEPARTAMENTO DE RECURSOS HUMANO', 1182, '3', NULL, '2023-01-29 05:08:51', NULL, NULL),
(186, 'ASESOR EDUCATIVO', 1183, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(187, 'JEFE DIVISION DE EXTENCION', 1184, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(188, 'COORDINADOR INGENIERIA ELECTRONICA', 1185, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(189, 'SECRETARIA DE LA DIRECCION', 1186, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(190, 'ENCARGADO DE COMPRAS', 1187, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(191, 'JEFE OFICINA MEDIOS EDUCATIVOS', 1188, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(192, 'SECRETARIA DE TECNOLOGIA EDUCATIVA', 1189, '0', NULL, '2023-01-29 05:08:51', NULL, NULL),
(193, 'DIBUJANTE', 1190, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(194, 'VINCULACION CON EL SECTOR PRODUCTIVO', 1191, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(195, 'CAJERO', 1192, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(196, 'JEFE SECCION PREFECTURA', 1193, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(197, 'COORDINADOR DE TITULACION', 1194, '4', NULL, '2023-01-29 05:08:52', NULL, NULL),
(198, 'SECRETARIA DE SERVICIOS GENERALES', 1195, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(199, 'COORDINADOR INTENDENCIA', 1196, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(200, 'SECRETARIA ADMINISTRACION DEL PRESUPUESTO', 1197, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(201, 'JEFE DE LA OFICINA DE CONTROL ESCOLAR', 1198, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(202, 'CASETERO LABORATORIO DE INGENIERIA ELECT', 1199, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(203, 'JEFE DEPARTAMENTO COMUNICACION Y DIFUSION', 1200, '0', NULL, '2023-01-29 05:08:52', NULL, NULL),
(204, 'SUBDIRECTOR ADMINISTRATIVO', 1201, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(205, 'PROMOTOR FUT-BALL AMERICANO', 1202, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(206, 'COORDINADOR VINCULACION CON EL SECTOR PR', 1203, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(207, 'JEFE DEL DEPARTAMENTO DE PLANEACION', 1204, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(208, 'JEFE DE LA COORDINACION DE INVESTIGACION', 1205, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(209, 'CASETERO LABORATORIO INGENIERIA ELECTROMECANICA', 1206, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(210, 'SECRETARIA DE LA COORDINACION DE INV. Y', 1207, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(211, 'CASETERO LABORATORIO INGENIERIA QUIMICA', 1208, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(212, 'CASETERO LABORATORIO INGENIERIA CIVIL', 1209, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(213, 'SECRETARIA PLANEACION', 1210, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(214, 'SECRETARIA DEL CENTRO DE INFORMACION', 1211, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(215, 'AUXILIAR CENTRO DE COMPUTO', 1212, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(216, 'JEFE DEL DEPARTAMENTO ADMINISTRACION DEL', 1213, '0', NULL, '2023-01-29 05:08:53', NULL, NULL),
(217, 'JEFE SERVICIOS GENERALES', 1214, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(218, 'SECRETARIA SERVICIOS ESCOLARES', 1215, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(219, 'JEFE DE OFICINA DESARROLLO PLANEACION', 1216, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(220, 'PREFECTO', 1217, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(221, 'PROMOTOR DE ATLETISMO', 1218, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(222, 'JEFE DEPARTAMENTO TECNOLOGIA EDUCATIVA', 1219, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(223, 'VELADOR', 1220, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(224, 'COORDINADORA TRONCO COMUN', 1221, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(225, 'SECRETARIA SERVICIO SOCIAL', 1222, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(226, 'COORDINADOR LICENCIADO EN INFORMATICA', 1223, '0', NULL, '2023-01-29 05:08:54', NULL, NULL),
(227, 'DIRECTOR DEL PLANTEL', 1224, '1', NULL, '2023-01-29 05:08:54', NULL, NULL),
(228, 'SUBDIRECTOR ACADEMICO', 1225, '2', NULL, '2023-01-29 05:08:54', NULL, NULL),
(229, 'JEFE DE PROYECTO DE INVESTIGACION', 1226, '5', NULL, '2023-01-29 05:08:55', NULL, NULL),
(230, 'JEFE DE PROYECTO DE DOCENCIA', 1227, '5', NULL, '2023-01-29 05:08:55', NULL, NULL),
(231, 'JEFE DE PROYECTO DE VINCULACION', 1228, '0', NULL, '2023-01-29 05:08:55', NULL, NULL),
(232, 'COORDINADOR', 1229, '4', NULL, '2023-01-29 05:08:55', NULL, NULL),
(233, 'JEFE DE OFICINA', 1230, '4', NULL, '2023-01-29 05:08:55', NULL, NULL),
(234, 'PENDIENTE', 1280, '0', NULL, '2023-01-29 05:08:55', NULL, NULL),
(235, 'JEFA DE SERVICIOS ESCOLARES', 1281, '3', NULL, '2023-01-29 05:08:55', NULL, NULL),
(236, 'JEFA DE DEPTO DE SERVICIOS ESCOLARES', 1282, '3', NULL, '2023-01-29 05:08:55', NULL, NULL),
(237, 'JEFA DE DEPTO DE SERVICIOS ESCOLARES', 1283, '3', NULL, '2023-01-29 05:08:55', NULL, NULL),
(238, 'SUBDIRECTOR DE PLANEACION Y VINCULACION', 1284, '2', NULL, '2023-01-29 05:08:55', NULL, NULL),
(239, 'JEFA DE DEPTO. DE CIENCIAS ECONOMICO-ADMINISTRATIVO', 1285, '3', NULL, '2023-01-29 05:08:55', NULL, NULL),
(240, 'PRUEBADANX', 1286, '2', NULL, '2023-01-30 04:35:13', NULL, NULL),
(241, 'PRUEBAJOSS', 1287, '5', NULL, '2023-01-30 04:35:47', NULL, NULL),
(242, 'PRUEBAYAKU', 1288, '5', NULL, '2023-01-30 04:36:41', NULL, NULL),
(243, 'ULTIMA', 1289, '5', NULL, '2023-01-30 04:39:08', NULL, NULL),
(244, 'ULTIMA DE A DEVIS', 1290, '1', NULL, '2023-01-30 04:40:00', NULL, NULL),
(245, 'ULTIMISISISISIMA', 1291, '5', NULL, '2023-01-30 04:42:45', NULL, NULL),
(246, 'HOLIS', 1292, '1', NULL, '2023-02-01 04:47:26', NULL, NULL),
(247, 'PRUEBAFINAL', 1293, '1', NULL, '2023-02-01 04:48:29', NULL, NULL),
(248, 'SIN PUESTO ASIGNADO', 1294, '3', NULL, '2023-02-17 08:01:58', NULL, NULL),
(249, 'JEFE DE OFICINA DE RH', 1295, '4', NULL, '2024-12-13 13:14:21', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_quien_dependes`
--

CREATE TABLE `t_cat_quien_dependes` (
  `id_cat_quien_dependes` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_quien_dependes`
--

INSERT INTO `t_cat_quien_dependes` (`id_cat_quien_dependes`, `descripcion`) VALUES
(1, 'Padre y Madre'),
(2, 'Padre, Madre y Yo mismo'),
(3, 'Padre'),
(4, 'Padre y Yo mismo'),
(5, 'Madre'),
(6, 'Madre y Yo mismo'),
(7, 'Hermanos'),
(8, 'Hermanos y Yo mismo'),
(9, 'Cónyuge o pareja'),
(10, 'Cónyuge, pareja y Yo mismo'),
(11, 'Otro familiar o amigo'),
(12, 'Yo mismo'),
(13, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_quien_vives`
--

CREATE TABLE `t_cat_quien_vives` (
  `id_cat_quien_vives` int(11) NOT NULL,
  `con_quien_vives` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_quien_vives`
--

INSERT INTO `t_cat_quien_vives` (`id_cat_quien_vives`, `con_quien_vives`) VALUES
(1, 'Padre y Madre'),
(2, 'Padre'),
(3, 'Madre'),
(4, 'Hermanos'),
(5, 'Cónyuge o pareja'),
(6, 'Otro familiar'),
(7, 'Amigo o amigos'),
(8, 'Sólo'),
(9, 'Hijos'),
(10, 'Otro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_reticula`
--

CREATE TABLE `t_cat_reticula` (
  `id_cat_reticula` int(11) NOT NULL,
  `clave_reticula` varchar(255) DEFAULT NULL,
  `fk_cat_carrera` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_reticula`
--

INSERT INTO `t_cat_reticula` (`id_cat_reticula`, `clave_reticula`, `fk_cat_carrera`) VALUES
(1, 'IGEM-2009-201', 1),
(2, 'IIND-2010-227', 2),
(3, 'ISIC-2004-224', 3),
(4, 'PBI-002-13', 6),
(5, 'JBJBHJB', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_rol`
--

CREATE TABLE `t_cat_rol` (
  `id_cat_rol` int(11) NOT NULL,
  `rol` varchar(10) DEFAULT NULL,
  `descripcion_rol` varchar(255) DEFAULT NULL,
  `fk_cat_organigrama` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_rol`
--

INSERT INTO `t_cat_rol` (`id_cat_rol`, `rol`, `descripcion_rol`, `fk_cat_organigrama`) VALUES
(1, 'DIR', 'Dirección', 1),
(2, 'ACAD', 'Subdirección Académica', 2),
(3, 'DCB', 'Departamento de Ciencias Básicas', 3),
(4, 'SE', 'Servicios Escolares', 62),
(5, 'DI', 'Departamento de Ingenierías', 0),
(6, 'DDA', 'Departamento de Desarrollo Académico', 28),
(7, 'DEP', 'División de Estudios Profesionales', 35),
(8, 'SPV', 'Subdirección de Planeación y Vinculación', 40),
(9, 'CI', 'Centro de Información', 0),
(10, 'DAE', 'Derpartamento de Actividades Extraescolares', 55),
(11, 'DGTV', 'Departamento de Gestión, Tecnología y Vinculación', 45),
(12, 'DPPP', 'Departamento de Planeación, Programación y Presupuestación', 41),
(13, 'DSE', 'Departamento de Servicios Escolares', 62),
(14, 'SSA', 'Subdirección de Servicios Administrativos', 67),
(15, 'RF', 'Departamento de Recursos Financieros', 79),
(16, 'RH', 'Departamento de Recursos Humanos', 77),
(17, 'DRMS', 'Departamento de Recursos Materiales y Servicios', 75),
(18, 'CC', 'Centro de Computo', 68),
(19, 'DOCENTE', 'Docente', 0),
(20, 'ALUMNO', 'Alumno', 0),
(21, 'ADMIN', 'Administrador del sistema', 0),
(22, 'CBAS', 'Ciencias Basicas', 3),
(27, 'SIS', 'Ing. En Sistemas Computacionales', 24),
(28, 'GES', 'Ing. En Gestión Empresarial', 26),
(29, 'IND', 'Ing. Industrial', 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_sexo`
--

CREATE TABLE `t_cat_sexo` (
  `id_cat_sexo` int(11) NOT NULL,
  `sexo` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_sexo`
--

INSERT INTO `t_cat_sexo` (`id_cat_sexo`, `sexo`) VALUES
(1, 'Hombre'),
(2, 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_sistema_aplicacion`
--

CREATE TABLE `t_cat_sistema_aplicacion` (
  `id_cat_sistema_aplicacion` int(11) NOT NULL,
  `aplicacion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_sistema_aplicacion`
--

INSERT INTO `t_cat_sistema_aplicacion` (`id_cat_sistema_aplicacion`, `aplicacion`) VALUES
(1, 'Administración del Sistema'),
(2, 'Servicios Escolares'),
(3, 'Division de Estudios Profesionales'),
(4, 'Departamentos Académicos'),
(5, 'Docentes'),
(6, 'Direccion'),
(7, 'Consultas'),
(8, 'Recursos Humanos'),
(9, 'Alumnos'),
(10, 'Cambio de contraseña'),
(11, 'Desarrollo Academico'),
(12, 'Comite'),
(13, 'SECRETARIAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_tipo_aspecto`
--

CREATE TABLE `t_cat_tipo_aspecto` (
  `id_cat_tipo_aspecto` int(11) NOT NULL,
  `tipo_aspecto` varchar(2) DEFAULT NULL,
  `fk_cat_tipo_encuesta` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_tipo_aspecto`
--

INSERT INTO `t_cat_tipo_aspecto` (`id_cat_tipo_aspecto`, `tipo_aspecto`, `fk_cat_tipo_encuesta`, `descripcion`) VALUES
(1, 'A', NULL, 'Planeación del curso'),
(2, 'A', NULL, 'Dominio de la asignatura'),
(3, 'A', NULL, 'Docencia'),
(4, 'A', NULL, 'Formación'),
(5, 'B', NULL, 'Aprendizaje significativo'),
(6, 'B', NULL, 'Planificación del curso'),
(7, 'B', NULL, 'Investigación'),
(8, 'B', NULL, 'Gestión'),
(9, 'C', NULL, 'Dominio de la materia'),
(10, 'C', NULL, 'Ambientes de aprendizaje'),
(11, 'C', NULL, 'Gestión'),
(12, 'C', NULL, 'Vinculación'),
(13, 'D', NULL, 'Ética y desarrollo sustentable'),
(14, 'D', NULL, 'Estrategias, métodos y técnicas'),
(15, 'D', NULL, 'Tutoría'),
(16, 'D', NULL, 'Investigación'),
(17, 'E', NULL, 'Evaluación'),
(18, 'E', NULL, 'Motivación'),
(19, 'E', NULL, 'Vinculación'),
(20, 'E', NULL, 'Tutoria'),
(21, 'F', NULL, 'Desempeño docente'),
(22, 'F', NULL, 'Evaluación'),
(23, 'F', NULL, 'Formación'),
(24, 'G', NULL, 'Comunicación'),
(25, 'G', NULL, 'Desempeño docente'),
(26, 'H', NULL, 'Gestión del curso'),
(27, 'H', NULL, 'Percepcion en Desempeño'),
(28, 'I', NULL, 'Tecnologías de la información y comunicación'),
(29, 'J', NULL, 'Satisfacción general');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_tipo_autorizacion`
--

CREATE TABLE `t_cat_tipo_autorizacion` (
  `id_cat_tipo_autorizacion` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_tipo_autorizacion`
--

INSERT INTO `t_cat_tipo_autorizacion` (`id_cat_tipo_autorizacion`, `descripcion`) VALUES
(1, 'Carga minima'),
(2, 'Cruce de materias'),
(3, 'Cursar materia requisitada'),
(4, 'Sobrecarga'),
(5, 'Mas de 12 semestres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_tipo_encuesta`
--

CREATE TABLE `t_cat_tipo_encuesta` (
  `id_cat_tipo_encuesta` int(11) NOT NULL,
  `encuestas` varchar(2) DEFAULT NULL,
  `tipo` varchar(5) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_tipo_evaluacion`
--

CREATE TABLE `t_cat_tipo_evaluacion` (
  `id_cat_tipo_evaluacion` int(11) NOT NULL,
  `siglas` varchar(5) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `descripcion_corto` varchar(50) DEFAULT NULL,
  `calif_min_aprobatoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_tipo_evaluacion`
--

INSERT INTO `t_cat_tipo_evaluacion` (`id_cat_tipo_evaluacion`, `siglas`, `descripcion`, `descripcion_corto`, `calif_min_aprobatoria`) VALUES
(1, 'EE', 'Evaluación Especial', 'Ev.Esp', 80),
(2, 'N1', 'Evaluación Nivelación Primera Vez', 'Ev.Niv.1ra', 80),
(3, 'N2', 'Evaluación Nivelación Segunda Vez', 'Ev.Niv.2da', 80),
(4, 'O1', 'Evaluación Ordinaria Primera Vez', 'Ev.Ord.1ra', 70),
(5, 'O2', 'Evaluación Ordinaria Segunda Vez', 'Ev.Ord.2da', 70),
(6, 'RC', 'Revalidación / Convalidación', 'Rev./Conv.', 60),
(7, 'E1', 'Evaluación Extraordinaria Primera Vez', 'Ev.Ext.1ra', 70),
(8, 'EA', 'Examen Especial Autodidacta', 'Ex.Esp.Au.', 70),
(12, 'R1', 'Evaluación Regularización Primera Vez', 'Ev.Reg.1ra', 70),
(13, 'R2', 'Evaluación Regularización Segunda Vez', 'Ev.Reg.2da', 70),
(15, 'RU', 'Equivalencia', 'Equivalen.', 60);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_tipo_ingreso`
--

CREATE TABLE `t_cat_tipo_ingreso` (
  `id_cat_tipo_ingreso` int(11) NOT NULL,
  `tipo_ingreso` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_cat_tipo_ingreso`
--

INSERT INTO `t_cat_tipo_ingreso` (`id_cat_tipo_ingreso`, `tipo_ingreso`) VALUES
(1, 'Ingreso por Prueba de Aptitud Academica'),
(2, 'Ingreso por reconocimiento y equiparacion de cursos'),
(3, 'Ingreso por equivalencia de cursos'),
(4, 'Cambio de sede a una misma carrera'),
(5, 'Ingreso por tronco comun'),
(6, 'Ingreso por convenio'),
(7, 'Cambios de Carrera o cursar a segunda carrera'),
(8, 'Reingresos'),
(9, 'Posgrados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_tipo_materia`
--

CREATE TABLE `t_cat_tipo_materia` (
  `id_cat_tipo_materia` int(11) NOT NULL,
  `siglas` varchar(255) DEFAULT NULL,
  `descripcion` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_tipo_materia`
--

INSERT INTO `t_cat_tipo_materia` (`id_cat_tipo_materia`, `siglas`, `descripcion`) VALUES
(1, 'MCB', 'Materia Curricular Base'),
(2, 'MCO', 'Materia Curricular Optativa'),
(3, 'MCE', 'Materia Curricular de Especialidad'),
(4, 'MEC', 'Materia Extra-Curricular');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_unidades`
--

CREATE TABLE `t_cat_unidades` (
  `id_unidades` int(11) NOT NULL,
  `unidad` int(11) DEFAULT NULL,
  `subunidad` int(11) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_unidades`
--

INSERT INTO `t_cat_unidades` (`id_unidades`, `unidad`, `subunidad`, `descripcion`) VALUES
(1, 12, 1, ''),
(2, 14, 1, ''),
(3, 14, 2, ''),
(4, 14, 3, ''),
(5, 14, 56, ''),
(6, 18, 2, ''),
(7, 68, 14, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cat_zona_economica`
--

CREATE TABLE `t_cat_zona_economica` (
  `id_cat_zona_economica` int(11) NOT NULL,
  `sigla` varchar(2) DEFAULT NULL,
  `salario_minimo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_cat_zona_economica`
--

INSERT INTO `t_cat_zona_economica` (`id_cat_zona_economica`, `sigla`, `salario_minimo`) VALUES
(1, 'A', 1),
(2, 'B', 2),
(3, 'C', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_centros_trabajos`
--

CREATE TABLE `t_centros_trabajos` (
  `id_centros_trabajo` int(11) NOT NULL,
  `clave_centro_seit` varchar(50) DEFAULT NULL,
  `fk_cat_zona_economica` int(11) DEFAULT NULL,
  `fk_cat_entidad_federativa` int(11) DEFAULT NULL,
  `centro_trabajo` int(11) DEFAULT NULL,
  `nombre_centro` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_control_calificaciones_parciales`
--

CREATE TABLE `t_control_calificaciones_parciales` (
  `id_control_calificaciones_parciales` int(11) NOT NULL,
  `no_unidad` int(11) DEFAULT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fk_grupo` int(11) DEFAULT NULL,
  `fk_personal` int(11) DEFAULT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `calificacion_unidad` varchar(3) DEFAULT '0',
  `fecha_captura` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_control_calificaciones_parciales`
--

INSERT INTO `t_control_calificaciones_parciales` (`id_control_calificaciones_parciales`, `no_unidad`, `fk_cat_materias`, `fk_periodo_escolar`, `fk_grupo`, `fk_personal`, `fk_numero_control`, `calificacion_unidad`, `fecha_captura`) VALUES
(31, 1, 12, 31, 27, 1, 3, '100', '2023-05-30'),
(32, 2, 12, 31, 27, 1, 3, '80', '2023-05-30'),
(33, 3, 12, 31, 27, 1, 3, '90', '2023-05-30'),
(34, 4, 12, 31, 27, 1, 3, '99', '2023-05-30'),
(35, 5, 12, 31, 27, 1, 3, '100', '2023-05-30'),
(36, 6, 12, 31, 27, 1, 3, '100', '2023-05-30'),
(37, 1, 4, 31, 26, 0, 2, '0', '2023-05-24'),
(38, 2, 4, 31, 26, 0, 2, '0', '2023-05-24'),
(39, 3, 4, 31, 26, 0, 2, '0', '2023-05-24'),
(40, 4, 4, 31, 26, 0, 2, '0', '2023-05-24'),
(41, 1, 12, 31, 27, 1, 2, '90', '2023-05-30'),
(42, 2, 12, 31, 27, 1, 2, '100', '2023-05-30'),
(43, 3, 12, 31, 27, 1, 2, '100', '2023-05-30'),
(44, 4, 12, 31, 27, 1, 2, '100', '2023-05-30'),
(45, 5, 12, 31, 27, 1, 2, '100', '2023-05-30'),
(46, 6, 12, 31, 27, 1, 2, '100', '2023-05-30'),
(47, 1, 31, 31, 29, 0, 2, '0', '2023-05-24'),
(48, 2, 31, 31, 29, 0, 2, '0', '2023-05-24'),
(49, 3, 31, 31, 29, 0, 2, '0', '2023-05-24'),
(50, 4, 31, 31, 29, 0, 2, '0', '2023-05-24'),
(51, 1, 47, 31, 31, 0, 2, '0', '2023-05-24'),
(52, 2, 47, 31, 31, 0, 2, '0', '2023-05-24'),
(53, 3, 47, 31, 31, 0, 2, '0', '2023-05-24'),
(54, 4, 47, 31, 31, 0, 2, '0', '2023-05-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_control_indices_reprobacion`
--

CREATE TABLE `t_control_indices_reprobacion` (
  `id_indicies_reprobacion` int(11) NOT NULL,
  `numero_unidad` int(11) DEFAULT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `fk_grupo` int(11) DEFAULT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `rfc` varchar(15) DEFAULT NULL,
  `indice_reprobacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_control_programa_oficial`
--

CREATE TABLE `t_control_programa_oficial` (
  `id_control_programa_oficial` int(11) NOT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `objetivo_materia` varchar(255) DEFAULT NULL,
  `numero_unidades` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_control_unidades_tematicas`
--

CREATE TABLE `t_control_unidades_tematicas` (
  `id_control_unidades_tematicas` int(11) NOT NULL,
  `numero_unidad` int(11) DEFAULT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `nombre_unidad` varchar(50) DEFAULT NULL,
  `objetivo_aprendizaje` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_direccion`
--

CREATE TABLE `t_direccion` (
  `id_direccion` int(11) NOT NULL,
  `codigo_postal` varchar(11) DEFAULT NULL,
  `entidad_federativa` varchar(255) DEFAULT NULL,
  `alcaldia` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `numero_interior` varchar(15) DEFAULT 'S/N',
  `numero_exterior` varchar(15) DEFAULT 'S/N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_direccion`
--

INSERT INTO `t_direccion` (`id_direccion`, `codigo_postal`, `entidad_federativa`, `alcaldia`, `colonia`, `calle`, `numero_interior`, `numero_exterior`) VALUES
(1, '11360', 'Ciudad de México', 'Miguel Hidalgo', 'Agricultura', 'no se', '1', '3'),
(2, '01110', 'Ciudad de México', 'Álvaro Obregón', 'Belém de las Flores', 'no se', 'S/N', 'S/N'),
(3, '02720', 'Ciudad de México', 'Azcapotzalco', 'San Antonio', 'maceta noche buena', '18', '260'),
(4, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Cerrada', 's/n', '13'),
(5, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Calle', 's/n', '34'),
(6, '13700', 'Ciudad de México', 'Tláhuac', 'San Nicolás Tetelco', 'Guadalajara', '4', '17'),
(7, '13700', 'Ciudad de México', 'Tláhuac', 'San Nicolás Tetelco', 'Guadalajatra', '4', '17'),
(8, '13700', 'Ciudad de México', 'Tláhuac', 'San Nicolás Tetelco', 'Guadalajara', '4', '17'),
(9, '12200', 'Ciudad de México', 'Milpa Alta', 'Panchimalco', 'Calle', 's/n', '2'),
(10, '12200', 'Ciudad de México', 'Milpa Alta', 'Panchimalco', 'Calle', 's/n', '2'),
(11, '12200', 'Ciudad de México', 'Milpa Alta', 'Panchimalco', 'Calle prueba', 's/n', '2'),
(12, '12100', 'Ciudad de México', 'Milpa Alta', 'Tenantitla', 'Prueba3', '23', '4'),
(13, '56624', 'México', 'Chalco', 'Pedregal Tezompa', 'Esquina ', 's/n', '1'),
(14, '13508', 'Ciudad de México', 'Tláhuac', 'San Agustín', '5ta cerrada de camino real', 's/n', '32'),
(15, '15680', 'Ciudad de México', 'Venustiano Carranza', 'Arenal 2a Sección', 'Cardenas Lazaro', 's/n', '555'),
(16, '13550', 'Ciudad de México', 'Tláhuac', 'Jardines del Llano', 'Estragos verdes ', 's/n', '55'),
(17, '12800', 'Ciudad de México', 'Milpa Alta', 'San Juan Tepenahuac', 'Prueba', 's/n', '23'),
(18, '01550', 'Ciudad de México', 'Álvaro Obregón', 'Tepeaca', 'Clallecapan Nueva', 's/n', '68'),
(19, '56624', 'México', 'Chalco', 'Pedregal Tezompa', 'Prolongacion', 's/n', '101'),
(20, '12110', 'Ciudad de México', 'Milpa Alta', 'Emiliano Zapata', 'Guadalajara', 's/n', '11'),
(21, '13508', 'Ciudad de México', 'Tláhuac', 'San Agustín', 'Guadalajara', 's/n', '10'),
(24, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Ddff', 's/n', '2'),
(25, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Prueba', 's/n', '12'),
(26, '12100', 'Ciudad de México', 'Milpa Alta', 'Tecaxtitla', 'Prueba23', '2', '3'),
(30, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Cerrada', 's/n', '122'),
(31, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Cerrada', 's/n', '122'),
(32, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Teste', 's/n', '100'),
(33, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Teste', 's/n', '100'),
(34, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Cerrar', 's/n', '100'),
(35, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Cerrar', 's/n', '100'),
(36, '12100', 'Ciudad de México', 'Milpa Alta', 'Cruztitla', 'Cedro', 's/n', '34'),
(37, '13600', 'Ciudad de México', 'Tláhuac', 'San Bartolomé', 'Canal del norte', 's/n', '51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_evaluacion_alumnos`
--

CREATE TABLE `t_evaluacion_alumnos` (
  `id_evaluacion_alumnos` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) NOT NULL,
  `fk_numero_control` int(11) NOT NULL,
  `fk_cat_materias` int(11) NOT NULL,
  `fk_personal` int(11) NOT NULL,
  `tipo_encuesta` int(11) NOT NULL DEFAULT 1,
  `respuestas` text NOT NULL,
  `fecha_evaluacion` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_evaluacion_alumnos`
--

INSERT INTO `t_evaluacion_alumnos` (`id_evaluacion_alumnos`, `fk_periodo_escolar`, `fk_numero_control`, `fk_cat_materias`, `fk_personal`, `tipo_encuesta`, `respuestas`, `fecha_evaluacion`) VALUES
(1, 31, 2, 4, 1, 1, '4,5,5,5,5,5,5,5,5,5,5,5,5,3,5,5,5,2,5,5,5,4,5,5,4,4,4,4,5,4,2,2,4,5,5,5,5,5,5,5,5,5,5,5,4,4,4,4,4,5,5,5,5,5,5,5,5,5,5,5,5,3,5,5,5,2,5,5,5,4,5,5,4,4,4,4,5,4,2,2,4,5,5,5,5,5,5,5,5,5,5,5,4,4,4,4,4,5,5,5,5,5,5,5,5,5,5,5,5,3,5,5,5,2,5,5,5,4,5,5,4,4,4,4,5,4,2,2,4,5,5,5,5,5,5,5,5,5,5,5,4,4,4,4,4,5,5,5,5,5,5,5,5,5,5,5,5,3,5,5,5,2,5,5,5,4,5,5,4,4,4,4,5,4,2,2,4,5,5,5,5,5,5,5,5,5,5,5,4,4,4,4,4,5,5,5,5,5,5,5,5,5,5,5,5,3,5,5,5,2,5,5,5,4,5,5,4,4,4,4,5,4,2,2,4,5,5,5,5,5,5,5,5,5,5,5,4,4,4,4,4,5,5,5,5,5,5,5,5,5,5,5,5,3,5,5,5,2,5,5,5,4,5,5,4,4,4,4,5,4,2,2,4,5,5,5,5,5,5,5,5,5,5,5,4,4,4,4,4,5,5,5,5,5,5,5,5,5,5,5,5,3,5,5,5,2,5,5,5,4,5,5,4,4,4,4,5,4,2,2,4,5,5,5,5,5,5,5,5,5,5,5,4,4,4,4,', '2023-05-04 02:56:01'),
(2, 31, 2, 12, 1, 1, '4,5,5,5,5,5,5,5,5,4,4,4,5,4,4,5,4,4,4,4,4,3,4,4,4,4,4,4,3,4,2,2,4,5,4,5,5,5,4,4,4,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,4,5,4,4,5,4,4,4,4,4,3,4,4,4,4,4,4,3,4,2,2,4,5,4,5,5,5,4,4,4,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,4,5,4,4,5,4,4,4,4,4,3,4,4,4,4,4,4,3,4,2,2,4,5,4,5,5,5,4,4,4,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,4,5,4,4,5,4,4,4,4,4,3,4,4,4,4,4,4,3,4,2,2,4,5,4,5,5,5,4,4,4,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,4,5,4,4,5,4,4,4,4,4,3,4,4,4,4,4,4,3,4,2,2,4,5,4,5,5,5,4,4,4,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,4,5,4,4,5,4,4,4,4,4,3,4,4,4,4,4,4,3,4,2,2,4,5,4,5,5,5,4,4,4,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,4,5,4,4,5,4,4,4,4,4,3,4,4,4,4,4,4,3,4,2,2,4,5,4,5,5,5,4,4,4,4,4,5,4,4,4,4,', '2023-05-04 02:56:01'),
(3, 31, 2, 31, 1, 1, '4,5,5,5,5,5,5,5,5,4,4,3,4,4,3,5,3,3,4,4,4,3,3,4,4,4,4,4,5,4,2,2,4,5,4,5,5,5,5,5,3,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,3,4,4,3,5,3,3,4,4,4,3,3,4,4,4,4,4,5,4,2,2,4,5,4,5,5,5,5,5,3,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,3,4,4,3,5,3,3,4,4,4,3,3,4,4,4,4,4,5,4,2,2,4,5,4,5,5,5,5,5,3,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,3,4,4,3,5,3,3,4,4,4,3,3,4,4,4,4,4,5,4,2,2,4,5,4,5,5,5,5,5,3,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,3,4,4,3,5,3,3,4,4,4,3,3,4,4,4,4,4,5,4,2,2,4,5,4,5,5,5,5,5,3,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,3,4,4,3,5,3,3,4,4,4,3,3,4,4,4,4,4,5,4,2,2,4,5,4,5,5,5,5,5,3,4,4,5,4,4,4,4,4,5,5,5,5,5,5,5,5,4,4,3,4,4,3,5,3,3,4,4,4,3,3,4,4,4,4,4,5,4,2,2,4,5,4,5,5,5,5,5,3,4,4,5,4,4,4,4,', '2023-05-04 02:56:01'),
(4, 31, 2, 47, 1, 1, '4,5,5,5,5,5,5,5,5,4,4,2,3,3,2,5,2,3,3,3,3,3,2,3,3,4,4,4,3,3,2,2,4,5,4,5,5,5,4,4,4,3,3,5,3,4,4,4,4,5,5,5,5,5,5,5,5,4,4,2,3,3,2,5,2,3,3,3,3,3,2,3,3,4,4,4,3,3,2,2,4,5,4,5,5,5,4,4,4,3,3,5,3,4,4,4,4,5,5,5,5,5,5,5,5,4,4,2,3,3,2,5,2,3,3,3,3,3,2,3,3,4,4,4,3,3,2,2,4,5,4,5,5,5,4,4,4,3,3,5,3,4,4,4,4,5,5,5,5,5,5,5,5,4,4,2,3,3,2,5,2,3,3,3,3,3,2,3,3,4,4,4,3,3,2,2,4,5,4,5,5,5,4,4,4,3,3,5,3,4,4,4,4,5,5,5,5,5,5,5,5,4,4,2,3,3,2,5,2,3,3,3,3,3,2,3,3,4,4,4,3,3,2,2,4,5,4,5,5,5,4,4,4,3,3,5,3,4,4,4,4,5,5,5,5,5,5,5,5,4,4,2,3,3,2,5,2,3,3,3,3,3,2,3,3,4,4,4,3,3,2,2,4,5,4,5,5,5,4,4,4,3,3,5,3,4,4,4,4,5,5,5,5,5,5,5,5,4,4,2,3,3,2,5,2,3,3,3,3,3,2,3,3,4,4,4,3,3,2,2,4,5,4,5,5,5,4,4,4,3,3,5,3,4,4,4,', '2023-05-04 02:56:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_evaluacion_departamento`
--

CREATE TABLE `t_evaluacion_departamento` (
  `id_evaluacion_departamento` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `rfc` int(11) DEFAULT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `fk_grupo` int(11) DEFAULT NULL,
  `fk_cat_organigrama` int(11) DEFAULT NULL,
  `fk_cat_tipo_encuesta` int(11) DEFAULT NULL,
  `respuestas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_ficha_aspirantes`
--

CREATE TABLE `t_ficha_aspirantes` (
  `id_ficha_aspirantes` int(11) NOT NULL,
  `numero_solicitud` int(11) DEFAULT NULL,
  `numero_recibo` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT current_timestamp(),
  `fk_cat_aulas` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp(),
  `aceptado` varchar(50) DEFAULT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_funciones_sistema`
--

CREATE TABLE `t_funciones_sistema` (
  `id_funciones_sistema` int(11) NOT NULL,
  `seccion` varchar(255) DEFAULT NULL,
  `funcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_grupo`
--

CREATE TABLE `t_grupo` (
  `id_grupo` int(11) NOT NULL,
  `fk_cat_carrera` int(11) DEFAULT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `fk_periodo` int(11) DEFAULT NULL,
  `semestre` int(11) DEFAULT NULL,
  `nombre_grupo` varchar(255) DEFAULT NULL,
  `fk_personal` int(11) DEFAULT 0,
  `capacidad` int(3) DEFAULT 0,
  `estatus_grupo` int(1) DEFAULT 0,
  `alumnos_inscritos` int(11) DEFAULT 0,
  `paralelo_de` varchar(50) NOT NULL DEFAULT 'NP',
  `fecha_hora_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_grupo`
--

INSERT INTO `t_grupo` (`id_grupo`, `fk_cat_carrera`, `fk_cat_materias`, `fk_periodo`, `semestre`, `nombre_grupo`, `fk_personal`, `capacidad`, `estatus_grupo`, `alumnos_inscritos`, `paralelo_de`, `fecha_hora_registro`) VALUES
(4, 2, 56, 30, 1, 'IND1', 3, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(5, 2, 73, 30, 1, 'IND1', 3, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(6, 2, 90, 30, 1, 'IND1', 3, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(7, 2, 82, 30, 1, 'IND1', 3, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(8, 2, 98, 30, 1, 'IND1', 3, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(9, 2, 64, 30, 1, 'IND1', 3, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(10, 1, 111, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(11, 1, 112, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(12, 1, 113, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(13, 1, 114, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(14, 1, 111, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(15, 1, 112, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(16, 1, 113, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(17, 1, 114, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(18, 1, 115, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(19, 1, 116, 30, 1, 'GES1', 2, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(20, 3, 3, 30, 1, 'SIS1', 1, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(21, 3, 13, 30, 1, 'SIS1', 1, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(22, 3, 21, 30, 1, 'SIS1', 1, 40, 1, 2, 'NP', '2023-03-23 00:55:08'),
(23, 3, 29, 30, 1, 'SIS1', 1, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(24, 3, 37, 30, 1, 'SIS1', 1, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(25, 3, 46, 30, 1, 'SIS1', 1, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(26, 3, 4, 31, 2, 'SIS2', 0, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(27, 3, 12, 31, 2, 'SIS2', 1, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(28, 3, 35, 31, 2, 'SIS2', 0, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(29, 3, 31, 31, 2, 'SIS2', 0, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(30, 3, 38, 31, 2, 'SIS2', 0, 60, 1, 4, 'NP', '2023-03-23 00:55:08'),
(31, 3, 47, 31, 2, 'SIS2', 0, 60, 1, 2, 'NP', '2023-03-23 00:55:08'),
(32, 1, 117, 31, 2, 'GES2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(33, 1, 118, 31, 2, 'GES2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(34, 1, 119, 31, 2, 'GES2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(35, 1, 120, 31, 2, 'GES2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(36, 1, 121, 31, 2, 'GES2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(37, 1, 122, 31, 2, 'GES2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(38, 2, 65, 31, 2, 'IND2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(39, 2, 66, 31, 2, 'IND2', 3, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(40, 2, 59, 31, 2, 'IND2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(41, 2, 81, 31, 2, 'IND2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(42, 2, 92, 31, 2, 'IND2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(43, 2, 99, 31, 2, 'IND2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(44, 2, 106, 31, 2, 'IND2', 0, 40, 1, 1, 'NP', '2023-03-23 00:55:08'),
(45, 1, 112, 31, 1, 'GES1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(46, 3, 29, 31, 1, 'SIS1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(47, 1, 114, 31, 1, 'GES1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(48, 1, 113, 31, 1, 'GES1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(49, 1, 111, 31, 1, 'GES1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(50, 1, 115, 31, 1, 'GES1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(51, 1, 116, 31, 1, 'GES1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(52, 3, 3, 31, 1, 'SIS1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(53, 3, 13, 31, 1, 'SIS1', 1, 40, 1, 2, 'NP', '2023-03-23 00:55:08'),
(54, 3, 21, 31, 1, 'SIS1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(55, 3, 37, 31, 1, 'SIS1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(56, 3, 46, 31, 1, 'SIS1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(57, 2, 64, 31, 1, 'IND1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(58, 2, 73, 31, 1, 'IND1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(59, 2, 98, 31, 1, 'IND1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(60, 2, 56, 31, 1, 'IND1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(61, 2, 90, 31, 1, 'IND1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(62, 2, 82, 31, 1, 'IND1', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(63, 3, 10, 31, 3, 'SIS3', 0, 40, 1, 0, 'NP', '2023-03-23 00:55:08'),
(68, 3, 38, 31, 6, 'SIS-6', 3, 40, 1, 1, 'IND2/ACF-0903', '2023-03-23 00:55:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_historia_alumno`
--

CREATE TABLE `t_historia_alumno` (
  `id_historia_alumno` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `calificacion` varchar(3) DEFAULT NULL,
  `fk_cat_tipo_evaluacion` int(11) DEFAULT NULL,
  `fecha_calificacion` date DEFAULT NULL,
  `estatus_materia` varchar(5) DEFAULT 'A',
  `presento` varchar(50) DEFAULT NULL,
  `fecha_actualizacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_historia_alumno`
--

INSERT INTO `t_historia_alumno` (`id_historia_alumno`, `fk_periodo_escolar`, `fk_numero_control`, `fk_cat_materias`, `calificacion`, `fk_cat_tipo_evaluacion`, `fecha_calificacion`, `estatus_materia`, `presento`, `fecha_actualizacion`) VALUES
(1, 30, 2, 3, '70', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(2, 30, 2, 13, '100', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(3, 30, 2, 21, '98', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(4, 30, 2, 29, '90', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(5, 30, 2, 37, '88', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(6, 30, 2, 46, '100', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(7, 30, 3, 3, '97', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(8, 30, 3, 13, '70', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(9, 30, 3, 21, '100', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(10, 30, 3, 29, '78', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(11, 30, 3, 37, '90', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(12, 30, 3, 46, '80', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(13, 30, 4, 112, '80', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(14, 30, 4, 111, '100', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(15, 30, 4, 113, '90', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(16, 30, 4, 115, '89', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(17, 30, 4, 114, '75', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(18, 30, 4, 116, '89', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(19, 30, 5, 56, '80', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(20, 30, 5, 73, '73', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(21, 30, 5, 90, '87', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(22, 30, 5, 82, '100', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(23, 30, 5, 98, 'NA', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(24, 30, 5, 64, '99', 4, '2023-02-16', 'A', '1', '2023-04-25 00:00:00'),
(25, 30, 5, 66, '80', 4, '2023-04-25', 'A', '1', '2023-04-25 00:00:00'),
(26, 30, 2, 5, '100', 4, '2023-04-25', 'A', '1', '2023-04-25 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_horario`
--

CREATE TABLE `t_horario` (
  `id_horario` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `tipo_horario` varchar(50) DEFAULT NULL,
  `dia` varchar(15) DEFAULT NULL,
  `hora_inicio` varchar(8) DEFAULT NULL,
  `hora_fin` varchar(8) DEFAULT NULL,
  `fk_cat_aulas` int(11) DEFAULT NULL,
  `fk_grupo` int(11) DEFAULT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `fecha_hora_registro` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_horario`
--

INSERT INTO `t_horario` (`id_horario`, `fk_periodo_escolar`, `tipo_horario`, `dia`, `hora_inicio`, `hora_fin`, `fk_cat_aulas`, `fk_grupo`, `fk_cat_materias`, `fecha_hora_registro`) VALUES
(9, 30, '', 'lunes', '07:00', '09:00', 5, 4, 56, '2023-03-23 00:53:37'),
(10, 30, '', 'miercoles', '07:00', '09:00', 5, 4, 56, '2023-03-23 00:53:37'),
(11, 30, '', 'martes', '07:00', '09:00', 5, 5, 73, '2023-03-23 00:53:37'),
(12, 30, '', 'jueves', '09:00', '12:00', 5, 5, 73, '2023-03-23 00:53:37'),
(13, 30, '', 'lunes', '09:00', '11:00', 5, 6, 90, '2023-03-23 00:53:37'),
(14, 30, '', 'martes', '09:00', '11:00', 5, 6, 90, '2023-03-23 00:53:37'),
(15, 30, '', 'jueves', '09:00', '11:00', 5, 7, 82, '2023-03-23 00:53:37'),
(16, 30, '', 'viernes', '08:00', '10:00', 5, 7, 82, '2023-03-23 00:53:37'),
(17, 30, '', 'miercoles', '09:00', '11:00', 5, 8, 98, '2023-03-23 00:53:37'),
(18, 30, '', 'jueves', '11:00', '14:00', 5, 8, 98, '2023-03-23 00:53:37'),
(19, 30, '', 'viernes', '07:00', '08:00', 5, 8, 98, '2023-03-23 00:53:37'),
(20, 30, '', 'lunes', '11:00', '13:00', 5, 9, 64, '2023-03-23 00:53:37'),
(21, 30, '', 'viernes', '12:00', '14:00', 5, 9, 64, '2023-03-23 00:53:37'),
(31, 30, '', 'lunes', '09:00', '11:00', 6, 14, 111, '2023-03-23 00:53:37'),
(32, 30, '', 'martes', '07:00', '09:00', 6, 14, 111, '2023-03-23 00:53:37'),
(33, 30, '', 'lunes', '07:00', '09:00', 6, 15, 112, '2023-03-23 00:53:37'),
(34, 30, '', 'miercoles', '07:00', '10:00', 6, 15, 112, '2023-03-23 00:53:37'),
(35, 30, '', 'martes', '09:00', '11:00', 6, 16, 113, '2023-03-23 00:53:37'),
(36, 30, '', 'jueves', '07:00', '09:00', 6, 16, 113, '2023-03-23 00:53:37'),
(37, 30, '', 'miercoles', '10:00', '11:00', 6, 17, 114, '2023-03-23 00:53:37'),
(38, 30, '', 'jueves', '09:00', '11:00', 6, 17, 114, '2023-03-23 00:53:37'),
(39, 30, '', 'viernes', '09:00', '11:00', 6, 17, 114, '2023-03-23 00:53:37'),
(40, 30, '', 'miercoles', '11:00', '13:00', 6, 18, 115, '2023-03-23 00:53:37'),
(41, 30, '', 'viernes', '07:00', '09:00', 6, 18, 115, '2023-03-23 00:53:37'),
(42, 30, '', 'lunes', '11:00', '12:00', 6, 19, 116, '2023-03-23 00:53:37'),
(43, 30, '', 'martes', '11:00', '13:00', 6, 19, 116, '2023-03-23 00:53:37'),
(44, 30, '', 'jueves', '11:00', '13:00', 6, 19, 116, '2023-03-23 00:53:37'),
(45, 30, '', 'lunes', '09:00', '11:00', 7, 20, 3, '2023-03-23 00:53:37'),
(46, 30, '', 'miercoles', '10:00', '11:00', 7, 20, 3, '2023-03-23 00:53:37'),
(47, 30, '', 'jueves', '07:00', '09:00', 7, 20, 3, '2023-03-23 00:53:37'),
(48, 30, '', 'martes', '07:00', '09:00', 7, 21, 13, '2023-03-23 00:53:37'),
(49, 30, '', 'miercoles', '11:00', '14:00', 7, 21, 13, '2023-03-23 00:53:37'),
(50, 30, '', 'martes', '09:00', '11:00', 7, 22, 21, '2023-03-23 00:53:37'),
(51, 30, '', 'jueves', '11:00', '13:00', 7, 22, 21, '2023-03-23 00:53:37'),
(52, 30, '', 'lunes', '07:00', '09:00', 7, 23, 29, '2023-03-23 00:53:37'),
(53, 30, '', 'viernes', '07:00', '10:00', 7, 23, 29, '2023-03-23 00:53:37'),
(54, 30, '', 'miercoles', '07:00', '09:00', 7, 24, 37, '2023-03-23 00:53:37'),
(55, 30, '', 'viernes', '10:00', '12:00', 7, 24, 37, '2023-03-23 00:53:37'),
(56, 30, '', 'lunes', '11:00', '13:00', 7, 25, 46, '2023-03-23 00:53:37'),
(57, 30, '', 'martes', '11:00', '13:00', 7, 25, 46, '2023-03-23 00:53:37'),
(58, 31, '', 'lunes', '09:00', '11:00', 7, 26, 4, '2023-03-23 00:53:37'),
(59, 31, '', 'miercoles', '07:00', '10:00', 7, 26, 4, '2023-03-23 00:53:37'),
(60, 31, '', 'lunes', '07:00', '09:00', 7, 27, 12, '2023-03-23 00:53:37'),
(61, 31, '', 'martes', '07:00', '08:00', 7, 27, 12, '2023-03-23 00:53:37'),
(62, 31, '', 'jueves', '09:00', '11:00', 7, 27, 12, '2023-03-23 00:53:37'),
(63, 31, '', 'martes', '08:00', '10:00', 7, 28, 35, '2023-03-23 00:53:37'),
(64, 31, '', 'miercoles', '10:00', '12:00', 7, 28, 35, '2023-03-23 00:53:37'),
(65, 31, '', 'jueves', '07:00', '09:00', 7, 29, 31, '2023-03-23 00:53:37'),
(66, 31, '', 'viernes', '07:00', '09:00', 7, 29, 31, '2023-03-23 00:53:37'),
(67, 31, '', 'martes', '10:00', '12:00', 7, 30, 38, '2023-03-23 00:53:37'),
(68, 31, '', 'miercoles', '12:00', '13:00', 7, 30, 38, '2023-03-23 00:53:37'),
(69, 31, '', 'viernes', '09:00', '11:00', 7, 30, 38, '2023-03-23 00:53:37'),
(70, 31, '', 'lunes', '11:00', '12:00', 7, 31, 47, '2023-03-23 00:53:37'),
(71, 31, '', 'jueves', '11:00', '13:00', 7, 31, 47, '2023-03-23 00:53:37'),
(72, 31, '', 'viernes', '11:00', '13:00', 7, 31, 47, '2023-03-23 00:53:37'),
(73, 31, '', 'lunes', '07:00', '09:00', 5, 32, 117, '2023-03-23 00:53:37'),
(74, 31, '', 'miercoles', '10:00', '13:00', 5, 32, 117, '2023-03-23 00:53:37'),
(75, 31, '', 'lunes', '11:00', '13:00', 5, 33, 118, '2023-03-23 00:53:37'),
(76, 31, '', 'martes', '07:00', '09:00', 5, 33, 118, '2023-03-23 00:53:37'),
(77, 31, '', 'jueves', '12:00', '13:00', 5, 33, 118, '2023-03-23 00:53:37'),
(78, 31, '', 'miercoles', '07:00', '10:00', 5, 34, 119, '2023-03-23 00:53:37'),
(79, 31, '', 'jueves', '07:00', '09:00', 5, 34, 119, '2023-03-23 00:53:37'),
(80, 31, '', 'jueves', '09:00', '11:00', 5, 35, 120, '2023-03-23 00:53:37'),
(81, 31, '', 'viernes', '09:00', '11:00', 5, 35, 120, '2023-03-23 00:53:37'),
(82, 31, '', 'martes', '09:00', '11:00', 5, 36, 121, '2023-03-23 00:53:37'),
(83, 31, '', 'viernes', '07:00', '09:00', 5, 36, 121, '2023-03-23 00:53:37'),
(84, 31, '', 'martes', '11:00', '13:00', 5, 37, 122, '2023-03-23 00:53:37'),
(85, 31, '', 'viernes', '11:00', '13:00', 5, 37, 122, '2023-03-23 00:53:37'),
(86, 31, '', 'martes', '07:00', '09:00', 6, 38, 65, '2023-03-23 00:53:37'),
(87, 31, '', 'viernes', '07:00', '09:00', 6, 38, 65, '2023-03-23 00:53:37'),
(88, 31, '', 'martes', '11:00', '12:00', 6, 39, 66, '2023-03-23 00:53:37'),
(89, 31, '', 'miercoles', '07:00', '09:00', 6, 39, 66, '2023-03-23 00:53:37'),
(90, 31, '', 'viernes', '11:00', '13:00', 6, 39, 66, '2023-03-23 00:53:37'),
(91, 31, '', 'lunes', '07:00', '09:00', 6, 40, 59, '2023-03-23 00:53:37'),
(92, 31, '', 'miercoles', '11:00', '13:00', 6, 40, 59, '2023-03-23 00:53:37'),
(93, 31, '', 'lunes', '09:00', '11:00', 6, 41, 81, '2023-03-23 00:53:37'),
(94, 31, '', 'jueves', '09:00', '11:00', 6, 41, 81, '2023-03-23 00:53:37'),
(95, 31, '', 'lunes', '11:00', '14:00', 6, 42, 92, '2023-03-23 00:53:37'),
(96, 31, '', 'jueves', '07:00', '09:00', 6, 42, 92, '2023-03-23 00:53:37'),
(97, 31, '', 'martes', '12:00', '13:00', 6, 43, 99, '2023-03-23 00:53:37'),
(98, 31, '', 'viernes', '09:00', '11:00', 6, 43, 99, '2023-03-23 00:53:37'),
(99, 31, '', 'miercoles', '09:00', '11:00', 6, 44, 106, '2023-03-23 00:53:37'),
(100, 31, '', 'jueves', '11:00', '13:00', 6, 44, 106, '2023-03-23 00:53:37'),
(101, 31, '', 'lunes', '07:00', '09:00', 29, 45, 112, '2023-03-23 00:53:37'),
(102, 31, '', 'miercoles', '11:00', '14:00', 29, 45, 112, '2023-03-23 00:53:37'),
(103, 31, '', 'martes', '07:00', '08:00', 8, 46, 29, '2023-03-23 00:53:37'),
(104, 31, '', 'jueves', '08:00', '11:00', 8, 46, 29, '2023-03-23 00:53:37'),
(105, 31, '', 'viernes', '10:00', '11:00', 8, 46, 29, '2023-03-23 00:53:37'),
(106, 31, '', 'lunes', '09:00', '11:00', 29, 47, 114, '2023-03-23 00:53:37'),
(107, 31, '', 'miercoles', '09:00', '11:00', 29, 47, 114, '2023-03-23 00:53:37'),
(108, 31, '', 'viernes', '07:00', '08:00', 29, 47, 114, '2023-03-23 00:53:37'),
(109, 31, '', 'martes', '07:00', '09:00', 29, 48, 113, '2023-03-23 00:53:37'),
(110, 31, '', 'jueves', '07:00', '09:00', 29, 48, 113, '2023-03-23 00:53:37'),
(111, 31, '', 'miercoles', '07:00', '09:00', 29, 49, 111, '2023-03-23 00:53:37'),
(112, 31, '', 'viernes', '08:00', '10:00', 29, 49, 111, '2023-03-23 00:53:37'),
(113, 31, '', 'lunes', '11:00', '13:00', 29, 50, 115, '2023-03-23 00:53:37'),
(114, 31, '', 'martes', '09:00', '11:00', 29, 50, 115, '2023-03-23 00:53:37'),
(115, 31, '', 'jueves', '09:00', '11:00', 29, 51, 116, '2023-03-23 00:53:37'),
(116, 31, '', 'viernes', '10:00', '13:00', 29, 51, 116, '2023-03-23 00:53:37'),
(117, 31, '', 'lunes', '07:00', '09:00', 8, 52, 3, '2023-03-23 00:53:37'),
(118, 31, '', 'miercoles', '07:00', '10:00', 8, 52, 3, '2023-03-23 00:53:37'),
(119, 31, '', 'lunes', '09:00', '11:00', 8, 53, 13, '2023-03-23 00:53:37'),
(120, 31, '', 'martes', '08:00', '10:00', 8, 53, 13, '2023-03-23 00:53:37'),
(121, 31, '', 'jueves', '07:00', '08:00', 8, 53, 13, '2023-03-23 00:53:37'),
(122, 31, '', 'miercoles', '10:00', '12:00', 8, 54, 21, '2023-03-23 00:53:37'),
(123, 31, '', 'jueves', '11:00', '13:00', 8, 54, 21, '2023-03-23 00:53:37'),
(124, 31, '', 'martes', '10:00', '12:00', 8, 55, 37, '2023-03-23 00:53:37'),
(125, 31, '', 'viernes', '07:00', '09:00', 8, 55, 37, '2023-03-23 00:53:37'),
(126, 31, '', 'lunes', '11:00', '13:00', 8, 56, 46, '2023-03-23 00:53:37'),
(127, 31, '', 'viernes', '11:00', '13:00', 8, 56, 46, '2023-03-23 00:53:37'),
(128, 31, '', 'lunes', '07:00', '09:00', 48, 57, 64, '2023-03-23 00:53:37'),
(129, 31, '', 'martes', '07:00', '09:00', 48, 57, 64, '2023-03-23 00:53:37'),
(130, 31, '', 'miercoles', '07:00', '10:00', 48, 58, 73, '2023-03-23 00:53:37'),
(131, 31, '', 'jueves', '07:00', '09:00', 48, 58, 73, '2023-03-23 00:53:37'),
(132, 31, '', 'lunes', '09:00', '11:00', 48, 59, 98, '2023-03-23 00:53:37'),
(133, 31, '', 'miercoles', '10:00', '12:00', 48, 59, 98, '2023-03-23 00:53:37'),
(134, 31, '', 'jueves', '09:00', '11:00', 48, 59, 98, '2023-03-23 00:53:37'),
(135, 31, '', 'martes', '09:00', '11:00', 48, 60, 56, '2023-03-23 00:53:37'),
(136, 31, '', 'viernes', '07:00', '09:00', 48, 60, 56, '2023-03-23 00:53:37'),
(137, 31, '', 'miercoles', '12:00', '14:00', 48, 61, 90, '2023-03-23 00:53:37'),
(138, 31, '', 'viernes', '09:00', '11:00', 48, 61, 90, '2023-03-23 00:53:37'),
(139, 31, '', 'lunes', '11:00', '13:00', 48, 62, 82, '2023-03-23 00:53:37'),
(140, 31, '', 'jueves', '11:00', '13:00', 48, 62, 82, '2023-03-23 00:53:37'),
(141, 31, '', 'martes', '08:00', '10:00', 9, 63, 10, '2023-03-23 00:53:37'),
(142, 31, '', 'jueves', '07:00', '09:00', 9, 63, 10, '2023-03-23 00:53:37'),
(148, 31, '', 'martes', '11:00', '12:00', 6, 68, 66, '2023-03-23 00:53:37'),
(149, 31, '', 'miercoles', '07:00', '09:00', 6, 68, 66, '2023-03-23 00:53:37'),
(150, 31, '', 'viernes', '11:00', '13:00', 6, 68, 66, '2023-03-23 00:53:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_horario_personal`
--

CREATE TABLE `t_horario_personal` (
  `id_horario_personal` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) NOT NULL,
  `dia` enum('lunes','martes','miercoles','jueves','viernes','sabado') NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `checador_id` int(11) NOT NULL,
  `fk_personal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_horario_personal`
--

INSERT INTO `t_horario_personal` (`id_horario_personal`, `fk_periodo_escolar`, `dia`, `hora_inicio`, `hora_fin`, `checador_id`, `fk_personal`) VALUES
(1, 31, 'lunes', '09:00:00', '18:00:00', 6, 1),
(3, 31, 'martes', '09:00:00', '18:00:00', 6, 1),
(6, 31, 'miercoles', '09:00:00', '18:00:00', 6, 1),
(8, 31, 'jueves', '09:00:00', '18:00:00', 6, 1),
(10, 31, 'viernes', '09:00:00', '17:00:00', 6, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_jefes`
--

CREATE TABLE `t_jefes` (
  `id_jefes` int(11) NOT NULL,
  `fk_cat_organigrama` int(11) DEFAULT NULL,
  `jefe_area` varchar(255) DEFAULT NULL,
  `rfc` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_materia_solicitada_especial`
--

CREATE TABLE `t_materia_solicitada_especial` (
  `id_materia_solicitada_especial` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `fk_cat_aulas` int(11) DEFAULT NULL,
  `fk_personal_presidente` int(11) DEFAULT NULL,
  `fk_personal_secretaria` int(11) DEFAULT NULL,
  `fk_personal_vocal` int(11) NOT NULL,
  `hora_inicio` varchar(10) DEFAULT current_timestamp(),
  `hora_fin` varchar(10) DEFAULT NULL,
  `fecha_examen` date DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_materia_solicitada_especial`
--

INSERT INTO `t_materia_solicitada_especial` (`id_materia_solicitada_especial`, `fk_periodo_escolar`, `fk_cat_materias`, `fk_cat_aulas`, `fk_personal_presidente`, `fk_personal_secretaria`, `fk_personal_vocal`, `hora_inicio`, `hora_fin`, `fecha_examen`) VALUES
(1, 31, 4, 2, 3, 4, 2, '09:00', '11:00', '2023-05-26'),
(4, 31, 6, 9, 2, 4, 3, '10:00', '12:00', '2023-05-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_notificaciones`
--

CREATE TABLE `t_notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `usuario_envio` varchar(45) DEFAULT NULL,
  `usuario_recibe` varchar(45) DEFAULT NULL,
  `estado` int(11) DEFAULT 1,
  `noti_emergente` int(11) DEFAULT 0,
  `fecha_notificacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_numero_control`
--

CREATE TABLE `t_numero_control` (
  `id_numero_control` int(11) NOT NULL,
  `numero_control` varchar(10) DEFAULT NULL,
  `autorizar` varchar(255) DEFAULT NULL,
  `estatus` varchar(255) DEFAULT NULL,
  `fecha_autorizacion` datetime DEFAULT current_timestamp(),
  `fk_periodo_escolar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_numero_control`
--

INSERT INTO `t_numero_control` (`id_numero_control`, `numero_control`, `autorizar`, `estatus`, `fecha_autorizacion`, `fk_periodo_escolar`) VALUES
(2, '221190001', 'autorizado', 'asignado', '2022-12-12 19:11:40', 30),
(3, '221190002', 'autorizado', 'asignado', '2022-12-12 19:11:40', 30),
(4, '221190003', 'autorizado', 'asignado', '2022-12-12 19:11:40', 30),
(5, '221190004', 'autorizado', 'asignado', '2022-12-12 19:11:40', 30),
(6, '221190005', 'autorizado', 'asignado', '2022-12-12 19:11:40', 30),
(7, '221190006', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(8, '221190007', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(9, '221190008', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(10, '221190009', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(11, '221190010', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(12, '221190011', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(13, '221190012', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(14, '221190013', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(15, '221190014', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(16, '221190015', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(17, '221190016', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(18, '221190017', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(19, '221190018', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(20, '221190019', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(21, '221190020', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(22, '221190021', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(23, '221190022', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(24, '221190023', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(25, '221190024', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(26, '221190025', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(27, '221190026', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(28, '221190027', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(29, '221190028', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(30, '221190029', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(31, '221190030', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(32, '221190031', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(33, '221190032', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(34, '221190033', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(35, '221190034', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(36, '221190035', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(37, '221190036', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(38, '221190037', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(39, '221190038', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(40, '221190039', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(41, '221190040', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(42, '221190041', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(43, '221190042', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(44, '221190043', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(45, '221190044', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(46, '221190045', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(47, '221190046', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(48, '221190047', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(49, '221190048', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(50, '221190049', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(51, '221190050', 'autorizado', 'disponible', '2022-12-12 19:11:40', 30),
(52, '231190001', 'autorizado', 'asignado', '2023-02-16 09:52:14', 31),
(53, '231190002', 'autorizado', 'asignado', '2023-02-16 09:52:14', 31),
(54, '231190003', 'autorizado', 'asignado', '2023-02-16 09:52:14', 31),
(55, '231190004', 'autorizado', 'asignado', '2023-02-16 09:52:14', 31),
(56, '231190005', 'autorizado', 'asignado', '2023-02-16 09:52:14', 31),
(57, '231190006', 'autorizado', 'asignado', '2023-02-16 09:52:14', 31),
(58, '231190007', 'autorizado', 'asignado', '2023-02-16 09:52:14', 31),
(59, '231190008', 'autorizado', 'disponible', '2023-02-16 09:52:14', 31),
(60, '231190009', 'autorizado', 'disponible', '2023-02-16 09:52:14', 31),
(61, '231190010', 'autorizado', 'disponible', '2023-02-16 09:52:14', 31),
(64, '171290087', 'autorizado', 'asignado', '2023-03-09 02:58:21', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_partidas_presupuestales`
--

CREATE TABLE `t_partidas_presupuestales` (
  `id_partidas_presupuestales` int(11) NOT NULL,
  `partida` int(11) DEFAULT NULL,
  `fk_cat_capitulos` int(11) DEFAULT NULL,
  `nombre_partida` varchar(50) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `estado_partida` varchar(2) DEFAULT NULL,
  `nivel_partida` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_periodo_escolar`
--

CREATE TABLE `t_periodo_escolar` (
  `id_periodo_escolar` int(11) NOT NULL,
  `periodo` int(11) DEFAULT NULL,
  `identificacion_larga` varchar(50) DEFAULT NULL,
  `identificacion_corta` varchar(50) DEFAULT NULL,
  `estado` int(11) DEFAULT 0,
  `fecha_inicio` date DEFAULT current_timestamp(),
  `fecha_termino` date DEFAULT current_timestamp(),
  `num_dias_clases` int(11) DEFAULT NULL,
  `inic_encuesta_estudiantil` date DEFAULT current_timestamp(),
  `fin_encuesta_estudiantil` date DEFAULT current_timestamp(),
  `inicio_vacacional` date DEFAULT current_timestamp(),
  `termino_vacacional` date DEFAULT current_timestamp(),
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_periodo_escolar`
--

INSERT INTO `t_periodo_escolar` (`id_periodo_escolar`, `periodo`, `identificacion_larga`, `identificacion_corta`, `estado`, `fecha_inicio`, `fecha_termino`, `num_dias_clases`, `inic_encuesta_estudiantil`, `fin_encuesta_estudiantil`, `inicio_vacacional`, `termino_vacacional`, `descripcion`) VALUES
(1, 20083, 'AGOSTO - DICIEMBRE 2008', 'AGO - DIC 2008', 0, '2008-08-18', '2008-12-20', 80, '2008-08-18', '2008-08-29', '2008-12-06', '2009-01-25', 'AGOSTO - DICIEMBRE 2008'),
(2, 20091, 'ENERO - JUNIO 2009', 'ENE - JUN 2009', 0, '2009-01-26', '2009-05-30', 80, '2009-02-02', '2009-02-16', '2009-06-01', '2009-08-16', 'ENERO - JUNIO 2009'),
(3, 20092, 'VERANO 2009', 'VERANO 2009', 0, '2009-06-22', '2009-08-01', 36, '2009-06-29', '2009-07-10', '2009-06-22', '2009-08-01', 'VERANO 2009'),
(4, 20093, 'AGOSTO - DICIEMBRE 2009', 'AGO - DIC 2009', 0, '2009-08-17', '2010-01-24', 80, '2009-08-24', '2009-09-04', '2009-12-21', '2010-01-31', 'AGOSTO - DICIEMBRE 2009'),
(5, 20101, 'ENERO - JUNIO 2010', 'ENE - JUN 2010', 0, '2010-02-01', '2010-06-19', 80, '2010-02-08', '2010-02-19', '2010-06-21', '2010-08-22', 'ENERO - JUNIO 2010'),
(6, 20103, 'AGOSTO - DICIEMBRE 2010', 'AGO - DIC 2010', 0, '2010-08-23', '2010-12-11', 80, '2010-09-06', '2010-09-17', '2010-12-20', '2011-01-02', 'AGOSTO - DICIEMBRE 2010'),
(7, 20111, 'ENERO - JUNIO 2011', 'ENE - JUN 2011', 0, '2011-01-31', '2011-06-10', 80, '2011-02-07', '2011-02-18', '2011-06-19', '2011-08-07', 'ENERO - JUNIO 2011'),
(8, 20113, 'AGOSTO - DICIEMBRE 2011', 'AGO - DIC 2011', 0, '2011-08-22', '2011-12-15', 80, '2011-08-29', '2011-09-09', '2011-12-17', '2012-01-05', 'AGOSTO - DICIEMBRE 2011'),
(9, 20121, 'ENERO - JUNIO 2012', 'ENE - JUN 2012', 0, '2012-01-30', '2012-06-08', 80, '2012-02-06', '2012-02-17', '2012-06-10', '2012-08-05', 'ENERO - JUNIO 2012'),
(10, 20123, 'AGOSTO - DICIEMBRE 2012', 'AGO - DIC 2012', 0, '2012-08-20', '2012-12-19', 80, '2012-08-27', '2012-09-07', '2012-12-20', '2013-01-06', 'AGOSTO - DICIEMBRE 2012'),
(11, 20131, 'ENERO - JUNIO 2013', 'ENE - JUN 2013', 0, '2013-01-28', '2013-06-07', 80, '2013-02-04', '2013-04-10', '2013-06-08', '2013-08-25', 'ENERO - JUNIO 2013'),
(12, 20133, 'AGOSTO - DICIEMBRE 2013', 'AGO - DIC 2013', 0, '2013-08-19', '2013-12-13', 80, '2013-11-17', '2014-01-20', '2013-12-16', '2014-01-06', 'AGOSTO - DICIEMBRE 2013'),
(13, 20141, 'ENERO - JUNIO 2014', 'ENE - JUN 2014', 0, '2014-01-27', '2014-07-15', 80, '2014-05-20', '2014-06-13', '2014-07-15', '2014-08-11', 'ENERO - JUNIO 2014'),
(14, 20143, 'AGOSTO - DICIEMBRE 2014', 'AGO - DIC 2014', 0, '2014-08-18', '2014-12-12', 80, '2014-11-03', '2014-11-07', '2014-12-22', '2015-01-06', 'AGOSTO - DICIEMBRE 2014'),
(15, 20151, 'ENERO - JUNIO 2015', 'ENE - JUN 2015', 0, '2015-01-26', '2015-06-12', 80, '2015-05-18', '2015-05-22', '2015-07-06', '2015-08-04', 'ENERO - JUNIO 2015'),
(16, 20153, 'AGOSTO - DICIEMBRE 2015', 'AGO - DIC 2015', 0, '2015-08-24', '2015-12-25', 80, '2015-11-16', '2015-11-27', '2015-12-14', '2016-01-07', 'AGOSTO - DICIEMBRE 2015'),
(17, 20161, 'ENERO - JUNIO 2016', 'ENE - JUN 2016', 0, '2016-01-25', '2016-05-27', 80, '2016-05-24', '2016-05-27', '2016-07-04', '2016-07-29', 'ENERO - JUNIO 2016'),
(18, 20163, 'AGOSTO - DICIEMBRE 2016', 'AGO - DIC 2016', 0, '2016-08-08', '2016-12-28', 80, '2016-11-07', '2016-11-18', '2016-12-28', '2017-01-09', 'AGOSTO - DICIEMBRE 2016'),
(19, 20171, 'ENERO - JUNIO 2017', 'ENE - JUN 2017', 0, '2017-01-10', '2017-06-22', 80, '2017-05-01', '2017-05-05', '2017-07-01', '2017-07-26', 'ENERO - JUNIO 2017'),
(20, 20173, 'AGOSTO - DICIEMBRE 2017', 'AGO - DIC 2017', 0, '2017-08-07', '2017-12-22', 80, '2017-08-14', '2017-09-01', '2017-12-25', '2018-01-08', 'AGOSTO - DICIEMBRE 2017'),
(21, 20181, 'ENERO - JUNIO 2018', 'ENE - JUN 2018', 0, '2018-01-15', '2018-06-22', 80, '2018-01-22', '2018-02-02', '2018-07-02', '2018-07-27', 'ENERO - JUNIO 2018'),
(22, 20183, 'AGOSTO - DICIEMBRE 2018', 'AGO - DIC 2018', 0, '2018-08-27', '2018-12-14', 80, '2018-09-03', '2018-09-14', '2018-12-17', '2019-02-01', 'AGOSTO - DICIEMBRE 2018'),
(23, 20191, 'ENERO - JUNIO 2019', 'ENE - JUN 2019', 0, '2019-01-21', '2019-06-14', 80, '2019-01-28', '2019-02-08', '2019-06-19', '2019-08-02', 'ENERO - JUNIO 2019'),
(24, 20193, 'AGOSTO - DICIEMBRE 2019', 'AGO - DIC 2019', 0, '2019-08-26', '2019-12-18', 80, '2019-09-02', '2019-09-13', '2019-12-20', '2020-01-10', 'AGOSTO - DICIEMBRE 2019'),
(25, 20201, 'ENERO - JUNIO 2020', 'ENE - JUN 2020', 0, '2020-01-27', '2020-06-19', 80, '2020-02-03', '2020-02-14', '2020-06-12', '2020-07-31', 'ENERO - JUNIO 2020'),
(26, 20203, 'AGOSTO - DICIEMBRE 2020', 'AGO - DIC 2020', 0, '2020-08-24', '2020-12-18', 80, '2020-08-31', '2020-09-11', '2020-12-18', '2021-01-22', 'AGOSTO - DICIEMBRE 2020'),
(27, 20211, 'ENERO - JUNIO 2021', 'ENE - JUN 2021', 0, '2021-01-11', '2021-06-18', 80, '2021-01-18', '2021-01-29', '2021-06-14', '2021-08-02', 'ENERO - JUNIO 2021'),
(28, 20213, 'AGOSTO - DICIEMBRE 2021', 'AGO - DIC 2021', 0, '2021-08-23', '2021-12-17', 80, '2021-08-30', '2021-09-10', '2021-12-13', '2022-01-07', 'AGOSTO - DICIEMBRE 2021'),
(29, 20221, 'ENERO - JUNIO 2022', 'ENE - JUN 2022', 0, '2022-01-17', '2022-07-31', 80, '2022-01-24', '2022-02-04', '2022-07-01', '2022-08-15', 'ENERO - JUNIO 2022'),
(30, 20223, 'AGOSTO - DICIEMBRE 2022', 'AGO - DIC 2022', 0, '2022-08-22', '2022-12-23', 80, '2022-08-29', '2022-09-09', '2022-12-16', '2023-01-30', 'AGOSTO - DICIEMBRE 2022'),
(31, 20231, 'ENERO - JUNIO 2023', 'ENE - JUN 2023', 1, '2023-01-31', '2023-06-16', 80, '2023-02-20', '2023-02-01', '2023-07-03', '2023-08-14', 'ENERO - JUNIO 2023'),
(32, 20233, 'AGOSTO - DICIEMBRE 2023', 'AGO - DIC 2023', 0, '2023-06-15', '2023-12-15', 80, '2023-06-15', '2023-06-25', '2023-07-20', '2023-07-30', 'AGOSTO - DICIEMBRE 2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_persona`
--

CREATE TABLE `t_persona` (
  `id_persona` int(11) NOT NULL,
  `fk_cat_sexo` int(11) DEFAULT NULL,
  `fk_cat_estado_civil` int(11) DEFAULT NULL,
  `fk_cat_escuela_procedencia` int(11) DEFAULT NULL,
  `fk_direccion` int(11) DEFAULT NULL,
  `nombre_persona` varchar(255) DEFAULT NULL,
  `apellido_paterno` varchar(255) DEFAULT NULL,
  `apellido_materno` varchar(255) DEFAULT NULL,
  `curp` varchar(255) DEFAULT NULL,
  `rfc` varchar(15) DEFAULT NULL,
  `telefono` varchar(10) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `lugar_nacimiento` varchar(255) NOT NULL,
  `nacionalidad` varchar(255) DEFAULT 'Mexicana',
  `insert_datos` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_persona`
--

INSERT INTO `t_persona` (`id_persona`, `fk_cat_sexo`, `fk_cat_estado_civil`, `fk_cat_escuela_procedencia`, `fk_direccion`, `nombre_persona`, `apellido_paterno`, `apellido_materno`, `curp`, `rfc`, `telefono`, `correo`, `fecha_nacimiento`, `lugar_nacimiento`, `nacionalidad`, `insert_datos`) VALUES
(1, 2, 2, 1, 1, 'Tonantzin', 'Ponce', 'Martínez', 'POMT790819MDFNRNE1', 'POMT790819TG7', '5581928391', 'tonanponce120@gmail.com', '1979-08-19', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(2, 1, 2, 4, 2, 'Omar Jesús', 'Peréz', 'Ramos', 'PERO720728HDFRMMU8', 'PERO720728PM8', '5571827389', 'omarperez_555@hotmail.com', '1972-07-28', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(3, 1, 3, 3, 3, 'Gabriel', 'Dominguez', 'Amacende', 'CAME840414HDFLRNP0', 'CAME840414WS3', '5573829182', 'enrique_calderas100@hotmail.com', '1984-04-14', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(4, 2, 2, 3, 4, 'Ivette', 'Medina', 'Medina', 'MEMI850716MDFDDVU4', 'MEMI850716AA1', '5628391029', 'ivettemedina88@outlook.com', '1985-07-16', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(5, 2, 2, 3, 5, 'Flor de María', 'Aguilar', 'Flores', 'AGFF791228MDFGLLT5', 'AGFF791228BN5', '5638291765', 'flor_af200@gmail.com', '1979-12-28', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(6, 2, 2, 3, 2, 'Regina', 'Cruz', 'Jiménez', 'CRJR790427MDFRMGW5', 'CRJR790427XR0', '5590989970', 'regina_cruz90@outlook.com', '1979-04-27', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(7, 2, 2, 1, 3, 'Ilse Irlanda', 'Nájera', 'Chávez', 'NACI841203MDFJHLB9', 'NACI841203FI9', '5676891122', 'ilsenajerachavez1@gmail.com', '1984-12-03', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(8, 1, 1, 5, 4, 'Sergio', 'Hernández', 'Maldonado', 'HEMS731106HDFRLRS2', 'HEMS731106RL6', '5564678990', 'sergio_hernan@hotmail.com', '1973-11-06', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(9, 1, 3, 4, 1, 'Marcos', 'Sánchez', 'Vigueras', 'SAVM550608HDFNGRJ7', 'SAVM550608PQ2', '5670708080', 'marcos_sv1955@yahoo.com', '1955-06-08', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(10, 2, 2, 3, 5, 'Xochitl Marcela', 'González', 'Medel', 'GOMX750429MDFNDCL3', 'GOMX750429UV4', '5564647880', 'xochitl_gonzalaz2@gmail.com', '1975-04-29', 'ESTADO DE MEXICO', 'Mexicana', '2022-04-12 22:46:49'),
(11, 1, 1, 6, 1, 'Jorge', 'Rivera', 'Olivos', 'RIOJ700211HDFVLRG6', 'RIOJ700211ZU7', '5589140026', 'jorgerivera200@gmail.com', '1970-02-11', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-05 00:15:20'),
(12, 1, 2, 9, 3, 'Gabriel', 'Domínguez', 'Amacende', 'DOAG670619HDFMMBO9', 'DOAG670619EF1', '5623330319', 'gabrieldominguez@outlook.com', '1967-06-19', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-05 00:12:40'),
(13, 2, 2, 7, 2, 'Elvia', 'Garcia', 'Romero', 'GARE750425MDFRMLH1', 'GARE750425DF3', '5600785516', 'elviagarcia_200@gmail.com', '1975-04-25', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-05 00:12:40'),
(14, 1, 1, 10, 5, 'Edgar', 'Padilla', 'Garcés', 'PAGE810328HDFDRDI3', 'PAGE810328XR5', '5510197246', 'edgar_pg81@yahoo.com', '1981-03-28', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-05 00:15:20'),
(15, 2, 2, 6, 4, 'Nelida', 'Ceñedo', 'Alvarado', 'CEAN780911MDFXLLY8', 'CEAN780911AZ0', '5550191102', 'neli_cenedo5@gmail.com', '1978-09-11', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-05 00:18:17'),
(16, 2, 2, 8, 4, 'Myrna', 'Linares', 'Altamirano', 'LIAM771205MDFNLYA4', 'LIAM771205FK4', '5522641423', 'myrna_linares40@hotmail.com', '1977-12-05', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-05 00:18:17'),
(17, 1, 2, 5, 3, 'Emmanuel', 'Salmerón', 'Catalán', 'SACE690517HDFLTMV5', 'SACE690517BB6', '5579952060', 'emma_salmeron777@hotmail.com', '1969-05-17', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-05 00:19:42'),
(18, 1, 1, 11, 2, 'Ariel', 'Barrientos', 'Segura', 'BASA830709HDFRGRK2', 'BASA830709QC1', '5699102255', 'arielbarrientos_443@hotmail.com', '1983-07-09', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-05 00:19:42'),
(19, 1, 1, 2, 4, 'Diego Alberto', 'Bollas', 'Paredes', 'BOPD971010HMCLRG01', 'BOPD971010PC1', '5517797884', 'diego@mail.com', '1997-10-10', 'ESTADO DE MEXICO', 'Mexicana', '2022-12-12 19:36:38'),
(20, 1, 1, 2, 5, 'Yakumo', 'Sahashi', 'Saito', 'SASY980110HMCHTK01', 'BOPD971010PC2', '4546845907', 'yakumo@mail.com', '1998-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2022-12-13 08:13:32'),
(21, 2, 2, 2, 9, 'Sakura', 'Uchiha', 'Haruno', 'UIHS900110MMCCRK01', '', '5517797884', 'sakura@mail.com', '1990-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-27 21:43:09'),
(22, 2, 2, 2, 10, 'Sakura', 'Uchiha', 'Haruno', 'UIHS900110MMCCRK01', '', '5517797884', 'sakura@mail.com', '1990-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2023-01-27 21:43:20'),
(23, 2, 2, 2, 11, 'Sakura', 'Uchiha', 'Haruno', 'UIHS970110MDFCRK02', '', '5517797884', 'sakura@mail.com', '1997-01-10', 'DISTRITO FEDERAL', 'Mexicana', '2023-01-27 21:49:50'),
(24, 2, 1, 3, 12, 'Haruka', 'Ozawa', 'Saito', 'OASH061213MDFZTR01', '', '7121132242', 'haruka@mail.com', '2006-12-13', 'DISTRITO FEDERAL', 'Mexicana', '2023-01-28 01:09:47'),
(25, 1, 1, 2, 13, 'Daniel ', 'Blancas', 'Aguilar', 'BAAD010222HDFLGN09', '', '5681724501', 'dany@gmail.com', '2001-02-22', 'DISTRITO FEDERAL', 'Mexicana', '2023-02-17 04:15:59'),
(26, 1, 1, 2, 14, 'Angel Eduardo', 'Cerezo ', 'Texocotitla ', 'CETA000722HMCRXNA4', '', '5581910457', 'angelcere@gmail.com', '2000-07-22', 'ESTADO DE MEXICO', 'Mexicana', '2023-02-17 04:27:53'),
(27, 1, 1, 2, 15, 'Fernando', 'Lujan', 'Hernandez', 'LUHF000218HDFJRRF9', '', '5698784721', 'lujantio@gmail.com', '2000-02-18', 'DISTRITO FEDERAL', 'Mexicana', '2023-02-17 04:37:37'),
(28, 1, 1, 2, 16, 'Jose Alberto', 'Velazquez', 'Nava', 'VEJA010618HMCLVS25', '', '5598987847', 'JoseQ@hotmail.com', '2001-06-18', 'ESTADO DE MEXICO', 'Mexicana', '2023-02-17 04:52:59'),
(29, 1, 1, 2, 17, 'Luis', 'Hernadez', 'Lopez', 'HELL011010HMCRPS01', '', '3534805648', 'dfngj@mai.com', '2001-10-10', 'ESTADO DE MEXICO', 'Mexicana', '2023-02-17 04:59:02'),
(30, 1, 1, 2, 18, 'Rodrigo', 'Sandoval', 'Esperanto', 'SAER000314HDFNSD02', '', '5539387421', 'Rodri@yahoo.com', '2000-03-14', 'DISTRITO FEDERAL', 'Mexicana', '2023-02-17 05:05:06'),
(31, 1, 1, 1, 19, 'Daniel', 'Blancas', 'Aguilar', 'BAAD010222HDFLGN09', 'BAAD010222KS1', '5546454831', 'dani@gmail.com', '2001-02-22', 'DISTRITO FEDERAL', 'Mexicana', '2023-02-17 07:32:37'),
(32, 1, 1, 3, 20, 'Jose alberto', 'Velazquez', 'Nava', 'VENA010416HMCLVLA9', 'VENA010416HW7', '1111111111', 'j@g.com', '2001-04-16', 'ESTADO DE MEXICO', 'Mexicana', '2023-02-17 07:55:23'),
(33, 1, 1, 1, 21, 'Angel Eduardo', 'Cerezo', 'Texocotitla', 'CETA000722HMCRXNA4', 'CETA000722JY5', '1111111111', 'a@gmail.com', '2000-07-22', 'ESTADO DE MEXICO', 'Mexicana', '2023-02-17 08:08:58'),
(36, 1, 1, 2, 24, 'Kazuto', 'Kirigaya', 'Yuki', 'KIYK061231HMCGKZ01', '', '3435743867', 'dsf@mail.com', '2006-12-31', 'ESTADO DE MEXICO', 'Mexicana', '2023-03-09 02:58:20'),
(37, 1, 1, 22, 1, 'asignado', 'Sin ', 'docente', 'CURP', 'RFC', '5555555555', 'email@mail.com', '2023-03-21', 'Estado de México', 'Mexicana', '2023-03-21 22:02:09'),
(38, 2, 1, 2, 25, 'Saeko', 'Busujima', 'Saito', 'BUSS990110MMCSTK01', NULL, '5678943578', 'sae@gmail.com', '1999-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2023-06-14 22:38:07'),
(39, 2, 1, 2, 26, 'Naomi', 'Susumiya', 'Saeko', 'SUSN991101MMCSKM01', NULL, '2345678765', 'nao@gmail.com', '1999-11-01', 'ESTADO DE MEXICO', 'Mexicana', '2023-06-14 22:45:40'),
(43, 1, 1, 3, 30, 'Diego', 'Bollas', 'Paredes', 'BOPD970110HMCLRG01', 'BOPD970110V75', '5656786867', 'dd@mail.com', '1997-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2024-12-08 16:53:16'),
(44, 1, 1, 3, 31, 'Diego', 'Bollas', 'Paredes', 'BOPD970110HMCLRG01', 'BOPD970110V75', '5656786867', 'dd@mail.com', '1997-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2024-12-08 16:55:57'),
(45, 1, 1, 3, 32, 'Diego', 'Bollas', 'Paredes', 'BOPD970110HMCLRG01', 'BOPD970110V75', '5567876978', 'dd@mail.com', '1997-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2024-12-08 17:01:26'),
(46, 1, 1, 3, 33, 'Diego', 'Bollas', 'Paredes', 'BOPD970110HMCLRG01', 'BOPD970110V75', '5567876978', 'dd@mail.com', '1997-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2024-12-08 17:04:09'),
(47, 1, 1, 4, 34, 'Diego', 'Test', 'Test', 'TETD970110HMCSSG01', 'TETD970110V56', '7565656756', 'd@mail.com', '1997-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2024-12-10 07:25:44'),
(48, 1, 1, 4, 35, 'Diego', 'Test', 'Test', 'TETD970110HMCSSG01', 'TETD970110V56', '7565656756', 'd@mail.com', '1997-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2024-12-10 07:29:24'),
(49, 1, 1, 3, 36, 'Alberto', 'Test', 'Test', 'TXTA970110HMCSSL01', 'TXTA970110V45', '5567568768', 'd@mail.com', '1997-01-10', 'ESTADO DE MEXICO', 'Mexicana', '2024-12-10 07:45:09'),
(50, 2, 1, 4, 37, 'Yolltol Ameyalli', 'Ponce', 'Martinez', 'POMY980205MDFNRL06', 'POMY980205MI5', '5581521260', 'ame@gmail.com', '1998-02-05', 'DISTRITO FEDERAL', 'Mexicana', '2024-12-13 13:09:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_personal`
--

CREATE TABLE `t_personal` (
  `id_personal` int(11) NOT NULL,
  `fk_cat_organigrama` int(11) DEFAULT NULL,
  `fk_persona` int(11) DEFAULT NULL,
  `tipo_trabajador` varchar(50) DEFAULT NULL,
  `nombramiento` varchar(2) DEFAULT NULL,
  `fk_cat_escolaridad` int(11) DEFAULT NULL,
  `grado_maximo_estudio` int(11) DEFAULT NULL,
  `fk_cat_estatus` int(11) DEFAULT NULL,
  `fk_cat_puestos` int(11) DEFAULT NULL,
  `estatus_eliminado` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_personal`
--

INSERT INTO `t_personal` (`id_personal`, `fk_cat_organigrama`, `fk_persona`, `tipo_trabajador`, `nombramiento`, `fk_cat_escolaridad`, `grado_maximo_estudio`, `fk_cat_estatus`, `fk_cat_puestos`, `estatus_eliminado`) VALUES
(0, 3, 37, 'Base', 'D', 1, 12, 1, 3, 0),
(1, 24, 3, 'Base', 'D', 5, 12, 1, 3, 0),
(2, 26, 4, 'Base', 'D', 5, 12, 1, 3, 0),
(3, 3, 2, 'Base', 'D', 5, 12, 1, 8, 0),
(4, 3, 31, 'Base', 'D', 1, 12, 1, 3, 1),
(5, 24, 32, 'Base', 'D', 3, 12, 1, 4, 0),
(6, 12, 33, 'Base', 'D', 1, 12, 1, 3, 0),
(9, 3, 43, 'Prof. Visit', 'D', 3, 12, 1, 248, 1),
(10, 3, 44, 'Base', 'D', 3, 12, 1, 248, 1),
(11, 5, 45, 'Prof. Visit', 'D', 3, 12, 1, 248, 1),
(12, 5, 46, 'Prof. Visit', 'D', 3, 12, 1, 248, 1),
(13, 4, 47, 'Base', 'D', 4, 12, 1, 248, 1),
(14, 4, 48, 'Base', 'D', 4, 12, 1, 248, 1),
(15, 3, 49, 'Prof. Visit', 'D', 3, 12, 1, 248, 1),
(16, 2, 50, 'Base', 'D', 4, NULL, 1, 248, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_plazas`
--

CREATE TABLE `t_plazas` (
  `id_plazas` int(11) NOT NULL,
  `fk_cat_unidades` int(11) DEFAULT NULL,
  `fk_cat_categorias` int(11) DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `diagonal` int(11) DEFAULT NULL,
  `partida` int(11) DEFAULT NULL,
  `estatus_plaza` varchar(2) DEFAULT NULL,
  `efectos_iniciales_plazas` int(11) DEFAULT NULL,
  `efectos_finales_plazas` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_plazas_personal`
--

CREATE TABLE `t_plazas_personal` (
  `id_plazas_personal` int(11) NOT NULL,
  `fk_persona` int(11) DEFAULT NULL,
  `fk_cat_unidades` int(11) DEFAULT NULL,
  `fk_cat_categorias` int(11) DEFAULT NULL,
  `horas` int(11) DEFAULT NULL,
  `diagonal` int(11) DEFAULT NULL,
  `estatus_plaza_empleado` varchar(2) DEFAULT NULL,
  `fk_motivos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_preparatorias_procedencia`
--

CREATE TABLE `t_preparatorias_procedencia` (
  `id_pretaratorias_procedencia` int(11) NOT NULL,
  `fk_clave_preparatoria` int(11) DEFAULT NULL,
  `nombre_preparatoria` varchar(50) DEFAULT NULL,
  `fk_cat_entidad_federativa` int(11) DEFAULT NULL,
  `municipio` varchar(50) DEFAULT NULL,
  `colonia` varchar(50) DEFAULT NULL,
  `servicio` varchar(50) DEFAULT NULL,
  `sostenimiento` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_prestamos_maestros`
--

CREATE TABLE `t_prestamos_maestros` (
  `id_prestamos_maestros` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fk_personal` int(11) DEFAULT NULL,
  `fk_cat_organigrama` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_prestamos_maestros`
--

INSERT INTO `t_prestamos_maestros` (`id_prestamos_maestros`, `fk_periodo_escolar`, `fk_personal`, `fk_cat_organigrama`) VALUES
(12, 31, 3, 12),
(13, 31, 5, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_registro_temp`
--

CREATE TABLE `t_registro_temp` (
  `id_registro_temp` int(11) NOT NULL,
  `checador_id` int(11) NOT NULL,
  `dia` enum('lunes','martes','miercoles','jueves','viernes','sabado') NOT NULL,
  `fecha` date NOT NULL,
  `entrada` time NOT NULL,
  `salida` time NOT NULL,
  `fk_periodo_escolar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_registro_temp`
--

INSERT INTO `t_registro_temp` (`id_registro_temp`, `checador_id`, `dia`, `fecha`, `entrada`, `salida`, `fk_periodo_escolar`) VALUES
(1, 6, 'miercoles', '2024-01-10', '09:08:00', '18:17:00', 31),
(2, 6, 'lunes', '2024-01-15', '08:44:00', '18:05:00', 31),
(3, 6, 'martes', '2024-01-16', '08:48:00', '18:03:00', 31),
(4, 6, 'miercoles', '2024-01-17', '08:54:00', '18:10:00', 31),
(5, 6, 'jueves', '2024-01-18', '08:58:00', '18:10:00', 31),
(6, 6, 'viernes', '2024-01-19', '08:57:00', '17:09:00', 31),
(7, 6, 'lunes', '2024-01-22', '08:57:00', '18:07:00', 31),
(8, 6, 'martes', '2024-01-23', '08:59:00', '18:06:00', 31),
(9, 6, 'miercoles', '2024-01-24', '08:59:00', '14:12:00', 31),
(10, 6, 'miercoles', '2024-01-24', '15:07:00', '18:06:00', 31),
(11, 6, 'jueves', '2024-01-25', '09:00:00', '18:06:00', 31),
(12, 6, 'viernes', '2024-01-26', '09:02:00', '17:47:00', 31),
(13, 6, 'lunes', '2024-01-29', '08:55:00', '18:05:00', 31),
(14, 6, 'martes', '2024-01-30', '08:59:00', '18:08:00', 31),
(15, 6, 'miercoles', '2024-01-31', '08:57:00', '18:06:00', 31),
(16, 6, 'jueves', '2024-02-01', '08:53:00', '18:07:00', 31),
(17, 6, 'viernes', '2024-02-02', '08:55:00', '17:04:00', 31),
(18, 6, 'martes', '2024-02-06', '08:59:00', '18:08:00', 31),
(19, 6, 'miercoles', '2024-02-07', '09:01:00', '18:16:00', 31),
(20, 6, 'jueves', '2024-02-08', '08:58:00', '18:04:00', 31),
(21, 6, 'viernes', '2024-02-09', '09:03:00', '17:01:00', 31),
(22, 6, 'lunes', '2024-02-12', '08:55:00', '18:10:00', 31),
(23, 6, 'martes', '2024-02-13', '08:52:00', '18:02:00', 31),
(24, 6, 'miercoles', '2024-02-14', '08:57:00', '18:03:00', 31),
(25, 6, 'jueves', '2024-02-15', '08:54:00', '18:06:00', 31),
(26, 6, 'viernes', '2024-02-16', '08:57:00', '17:28:00', 31),
(27, 6, 'miercoles', '2024-02-21', '08:59:00', '18:03:00', 31),
(28, 6, 'miercoles', '2024-02-21', '18:06:00', '00:00:00', 31),
(29, 6, 'jueves', '2024-02-22', '08:55:00', '18:05:00', 31),
(30, 6, 'viernes', '2024-02-23', '08:52:00', '17:00:00', 31),
(31, 6, 'lunes', '2024-02-26', '12:06:00', '18:09:00', 31),
(32, 6, 'martes', '2024-02-27', '09:05:00', '18:04:00', 31),
(33, 6, 'miercoles', '2024-02-28', '09:07:00', '18:21:00', 31),
(34, 6, 'jueves', '2024-02-29', '09:00:00', '18:10:00', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_seleccion_materias`
--

CREATE TABLE `t_seleccion_materias` (
  `id_seleccion_materias` int(11) NOT NULL,
  `fk_cat_periodo` int(11) DEFAULT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `fk_grupo` int(11) DEFAULT NULL,
  `calificacion` varchar(11) DEFAULT '0',
  `fk_tipo_evaluacion` int(11) DEFAULT NULL,
  `repeticion` varchar(2) DEFAULT 'N',
  `presento` varchar(2) DEFAULT '1',
  `fecha_hora_seleccion` datetime DEFAULT current_timestamp(),
  `fecha_hora_modificacion` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_seleccion_materias`
--

INSERT INTO `t_seleccion_materias` (`id_seleccion_materias`, `fk_cat_periodo`, `fk_numero_control`, `fk_grupo`, `calificacion`, `fk_tipo_evaluacion`, `repeticion`, `presento`, `fecha_hora_seleccion`, `fecha_hora_modificacion`) VALUES
(7, 31, 3, 26, '0', NULL, 'N', '1', '2023-02-16 11:03:15', '2023-02-16 11:03:15'),
(10, 31, 3, 29, '0', NULL, 'N', '1', '2023-02-16 11:03:55', '2023-02-16 11:03:55'),
(11, 31, 3, 30, '0', NULL, 'N', '1', '2023-02-16 11:05:02', '2023-02-16 11:05:02'),
(12, 31, 3, 31, '0', NULL, 'N', '1', '2023-02-16 11:05:02', '2023-02-16 11:05:02'),
(13, 31, 4, 32, '0', NULL, 'N', '1', '2023-02-16 11:06:46', '2023-02-16 11:06:46'),
(14, 31, 4, 33, '0', NULL, 'N', '1', '2023-02-16 11:06:46', '2023-02-16 11:06:46'),
(17, 31, 4, 34, '0', NULL, 'N', '1', '2023-02-16 11:07:40', '2023-02-16 11:07:40'),
(18, 31, 4, 35, '0', NULL, 'N', '1', '2023-02-16 11:07:40', '2023-02-16 11:07:40'),
(19, 31, 4, 36, '0', NULL, 'N', '1', '2023-02-16 11:08:29', '2023-02-16 11:08:29'),
(20, 31, 4, 37, '0', NULL, 'N', '1', '2023-02-16 11:08:29', '2023-02-16 11:08:29'),
(21, 31, 5, 38, '0', NULL, 'N', '1', '2023-02-16 11:09:18', '2023-02-16 11:09:18'),
(22, 31, 5, 39, '0', NULL, 'N', '1', '2023-02-16 11:09:18', '2023-02-16 11:09:18'),
(23, 31, 5, 40, '0', NULL, 'N', '1', '2023-02-16 11:11:30', '2023-02-16 11:11:30'),
(24, 31, 5, 41, '0', NULL, 'N', '1', '2023-02-16 11:11:30', '2023-02-16 11:11:30'),
(25, 31, 5, 42, '0', NULL, 'N', '1', '2023-02-16 11:11:30', '2023-02-16 11:11:30'),
(26, 31, 5, 43, '0', NULL, 'N', '1', '2023-02-16 11:11:30', '2023-02-16 11:11:30'),
(27, 31, 5, 44, '0', NULL, 'N', '1', '2023-02-16 11:11:30', '2023-02-16 11:11:30'),
(28, 30, 2, 20, '70', 4, 'N', '1', '2023-02-16 23:42:11', '2023-02-16 23:42:11'),
(29, 30, 2, 21, '100', 4, 'N', '1', '2023-02-16 23:42:11', '2023-02-16 23:42:11'),
(30, 30, 2, 22, '98', 4, 'N', '1', '2023-02-16 23:43:27', '2023-02-16 23:43:27'),
(31, 30, 2, 23, '90', 4, 'N', '1', '2023-02-16 23:43:27', '2023-02-16 23:43:27'),
(32, 30, 2, 24, '88', 4, 'N', '1', '2023-02-16 23:43:27', '2023-02-16 23:43:27'),
(33, 30, 2, 25, '100', 4, 'N', '1', '2023-02-16 23:43:27', '2023-02-16 23:43:27'),
(34, 30, 3, 20, '97', 4, 'N', '1', '2023-02-16 23:46:50', '2023-02-16 23:46:50'),
(35, 30, 3, 21, '70', 4, 'N', '1', '2023-02-16 23:46:50', '2023-02-16 23:46:50'),
(36, 30, 3, 22, '100', 4, 'N', '1', '2023-02-16 23:46:50', '2023-02-16 23:46:50'),
(37, 30, 3, 23, '78', 4, 'N', '1', '2023-02-16 23:46:50', '2023-02-16 23:46:50'),
(38, 30, 3, 24, '90', 4, 'N', '1', '2023-02-16 23:46:50', '2023-02-16 23:46:50'),
(39, 30, 3, 25, '80', 4, 'N', '1', '2023-02-16 23:46:50', '2023-02-16 23:46:50'),
(40, 30, 4, 11, '80', 4, 'N', '1', '2023-02-16 23:52:17', '2023-02-16 23:52:17'),
(41, 30, 4, 10, '100', 4, 'N', '1', '2023-02-16 23:52:17', '2023-02-16 23:52:17'),
(42, 30, 4, 12, '90', 4, 'N', '1', '2023-02-16 23:52:17', '2023-02-16 23:52:17'),
(43, 30, 4, 18, '89', 4, 'N', '1', '2023-02-16 23:52:17', '2023-02-16 23:52:17'),
(44, 30, 4, 13, '75', 4, 'N', '1', '2023-02-16 23:52:17', '2023-02-16 23:52:17'),
(45, 30, 4, 19, '89', 4, 'N', '1', '2023-02-16 23:52:17', '2023-02-16 23:52:17'),
(46, 30, 5, 4, '80', 4, 'N', '1', '2023-02-16 23:55:06', '2023-02-16 23:55:06'),
(47, 30, 5, 5, '73', 4, 'N', '1', '2023-02-16 23:55:06', '2023-02-16 23:55:06'),
(48, 30, 5, 6, '87', 4, 'N', '1', '2023-02-16 23:55:06', '2023-02-16 23:55:06'),
(49, 30, 5, 7, '100', 4, 'N', '1', '2023-02-16 23:55:06', '2023-02-16 23:55:06'),
(50, 30, 5, 8, 'NA', 4, 'N', '1', '2023-02-16 23:55:06', '2023-02-16 23:55:06'),
(51, 30, 5, 9, '99', 4, 'N', '1', '2023-02-16 23:55:06', '2023-02-16 23:55:06'),
(52, 31, 55, 46, '0', NULL, 'N', '1', '2023-02-17 08:28:32', '2023-02-17 08:28:32'),
(53, 31, 55, 52, '0', NULL, 'N', '1', '2023-02-17 08:28:32', '2023-02-17 08:28:32'),
(54, 31, 55, 53, '0', NULL, 'N', '1', '2023-02-17 08:31:21', '2023-02-17 08:31:21'),
(55, 31, 55, 54, '0', NULL, 'N', '1', '2023-02-17 08:31:21', '2023-02-17 08:31:21'),
(56, 31, 55, 55, '0', NULL, 'N', '1', '2023-02-17 08:31:21', '2023-02-17 08:31:21'),
(57, 31, 55, 56, '0', NULL, 'N', '1', '2023-02-17 08:31:21', '2023-02-17 08:31:21'),
(58, 31, 56, 46, '0', NULL, 'N', '1', '2023-02-17 08:32:49', '2023-02-17 08:32:49'),
(59, 31, 56, 52, '0', NULL, 'N', '1', '2023-02-17 08:32:49', '2023-02-17 08:32:49'),
(60, 31, 56, 53, '0', NULL, 'N', '1', '2023-02-17 08:32:49', '2023-02-17 08:32:49'),
(61, 31, 56, 54, '0', NULL, 'N', '1', '2023-02-17 08:32:49', '2023-02-17 08:32:49'),
(62, 31, 56, 55, '0', NULL, 'N', '1', '2023-02-17 08:32:49', '2023-02-17 08:32:49'),
(63, 31, 56, 56, '0', NULL, 'N', '1', '2023-02-17 08:32:49', '2023-02-17 08:32:49'),
(64, 31, 54, 57, '0', NULL, 'N', '1', '2023-02-17 08:40:24', '2023-02-17 08:40:24'),
(65, 31, 54, 58, '0', NULL, 'N', '1', '2023-02-17 08:40:24', '2023-02-17 08:40:24'),
(66, 31, 54, 59, '0', NULL, 'N', '1', '2023-02-17 08:40:24', '2023-02-17 08:40:24'),
(67, 31, 54, 60, '0', NULL, 'N', '1', '2023-02-17 08:40:24', '2023-02-17 08:40:24'),
(68, 31, 54, 61, '0', NULL, 'N', '1', '2023-02-17 08:40:24', '2023-02-17 08:40:24'),
(69, 31, 54, 62, '0', NULL, 'N', '1', '2023-02-17 08:40:24', '2023-02-17 08:40:24'),
(70, 31, 52, 45, '0', NULL, 'N', '1', '2023-02-17 08:42:20', '2023-02-17 08:42:20'),
(71, 31, 52, 47, '0', NULL, 'N', '1', '2023-02-17 08:42:20', '2023-02-17 08:42:20'),
(72, 31, 52, 48, '0', NULL, 'N', '1', '2023-02-17 08:42:20', '2023-02-17 08:42:20'),
(73, 31, 52, 49, '0', NULL, 'N', '1', '2023-02-17 08:42:20', '2023-02-17 08:42:20'),
(74, 31, 52, 50, '0', NULL, 'N', '1', '2023-02-17 08:42:20', '2023-02-17 08:42:20'),
(75, 31, 52, 51, '0', NULL, 'N', '1', '2023-02-17 08:42:20', '2023-02-17 08:42:20'),
(76, 31, 53, 45, '0', NULL, 'N', '1', '2023-02-17 08:42:48', '2023-02-17 08:42:48'),
(77, 31, 53, 47, '0', NULL, 'N', '1', '2023-02-17 08:42:48', '2023-02-17 08:42:48'),
(78, 31, 53, 48, '0', NULL, 'N', '1', '2023-02-17 08:42:48', '2023-02-17 08:42:48'),
(79, 31, 53, 49, '0', NULL, 'N', '1', '2023-02-17 08:42:48', '2023-02-17 08:42:48'),
(80, 31, 53, 50, '0', NULL, 'N', '1', '2023-02-17 08:42:48', '2023-02-17 08:42:48'),
(81, 31, 53, 51, '0', NULL, 'N', '1', '2023-02-17 08:42:48', '2023-02-17 08:42:48'),
(90, 31, 64, 52, '0', NULL, 'N', '1', '2023-03-21 22:59:28', '2023-03-21 22:59:28'),
(100, 31, 3, 27, 'NA', 4, 'N', '1', '2023-05-24 17:30:58', '2023-05-24 17:30:58'),
(101, 31, 2, 26, '0', NULL, 'N', '1', '2023-05-24 21:27:40', '2023-05-24 21:27:40'),
(102, 31, 2, 27, 'NA', 4, 'N', '1', '2023-05-24 21:27:50', '2023-05-24 21:27:50'),
(103, 31, 2, 29, '0', NULL, 'N', '1', '2023-05-24 21:36:43', '2023-05-24 21:36:43'),
(104, 31, 2, 31, '0', NULL, 'N', '1', '2023-05-24 21:37:01', '2023-05-24 21:37:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_solicitud`
--

CREATE TABLE `t_solicitud` (
  `id_solicitud` int(11) NOT NULL,
  `solicitud` varchar(255) DEFAULT NULL,
  `descripcion_solicitud` text DEFAULT NULL,
  `id_usuario_envio_solicitud` int(11) DEFAULT NULL,
  `id_usuario_recibio_solicitud` int(11) DEFAULT NULL,
  `estado_solicitud` int(11) DEFAULT 0,
  `estado_mensaje_emergente` int(11) DEFAULT 0,
  `fecha_realizo_solicitud` datetime DEFAULT current_timestamp(),
  `fecha_atencion_solicitud` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_solicitud`
--

INSERT INTO `t_solicitud` (`id_solicitud`, `solicitud`, `descripcion_solicitud`, `id_usuario_envio_solicitud`, `id_usuario_recibio_solicitud`, `estado_solicitud`, `estado_mensaje_emergente`, `fecha_realizo_solicitud`, `fecha_atencion_solicitud`) VALUES
(2, '50', 'Generación de números de control', 13, 3, 1, 0, '2022-12-12 19:10:06', '2022-12-12 19:11:40'),
(4, '10', 'Generación de números de control', 13, 2, 1, 0, '2023-02-16 09:43:59', '2023-02-16 03:52:13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_solicitudes_ex_especiales`
--

CREATE TABLE `t_solicitudes_ex_especiales` (
  `id_solicitudes_ex_especiales` int(11) NOT NULL,
  `fk_periodo_escolar` int(11) DEFAULT NULL,
  `fk_numero_control` int(11) DEFAULT NULL,
  `tipo_evaluacion` varchar(10) DEFAULT '1',
  `autorizacion` varchar(50) DEFAULT NULL,
  `fk_cat_materias` int(11) DEFAULT NULL,
  `calificacion_especial` varchar(3) NOT NULL DEFAULT '0',
  `fecha_especial` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `t_solicitudes_ex_especiales`
--

INSERT INTO `t_solicitudes_ex_especiales` (`id_solicitudes_ex_especiales`, `fk_periodo_escolar`, `fk_numero_control`, `tipo_evaluacion`, `autorizacion`, `fk_cat_materias`, `calificacion_especial`, `fecha_especial`) VALUES
(1, 30, 5, '1', '1234', 66, '80', '2023-03-24'),
(2, 31, 6, 'SI', '1234', 20, '0', '2023-03-24'),
(4, 30, 2, 'SI', '12334', 5, '100', '2023-03-24'),
(5, 31, 2, 'SI', '12334', 9, '0', '2023-05-02'),
(6, 31, 2, 'SI', '12334', 4, 'NA', '2023-05-29'),
(7, 31, 3, 'SI', '12334', 4, 'NA', '2023-05-29'),
(8, 31, 3, 'SI', '12334', 6, '0', '2023-05-05'),
(10, 31, 4, 'SI', '12334', 121, '0', '2023-05-06'),
(11, 31, 2, 'NO', '123', 1, '0', '2023-05-17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_solicitud_ficha`
--

CREATE TABLE `t_solicitud_ficha` (
  `id_solicitud_ficha` int(11) NOT NULL,
  `fk_cat_estudios_padre` int(11) DEFAULT NULL,
  `fk_cat_estudios_madre` int(11) DEFAULT NULL,
  `fk_cat_quien_vives` int(11) DEFAULT NULL,
  `ingresos_padre` int(11) DEFAULT NULL,
  `ingresos_madre` int(11) DEFAULT NULL,
  `igresos_hermanos` int(11) DEFAULT NULL,
  `ingresos_propios` int(11) DEFAULT NULL,
  `ingresos_otros` int(11) DEFAULT NULL,
  `total_ingresos` int(11) DEFAULT NULL,
  `fk_cat_ocupacion_padre` int(11) DEFAULT NULL,
  `fk_cat_ocupacion_madre` int(11) DEFAULT NULL,
  `fk_cat_quien_dependes` int(11) DEFAULT NULL,
  `casa_vives` varchar(2) DEFAULT NULL,
  `cuartos_casa` int(11) DEFAULT NULL,
  `fk_cat_cuartos_personas` int(11) DEFAULT NULL,
  `personas_dependen` int(11) DEFAULT NULL,
  `tipo_sangre` varchar(5) DEFAULT NULL,
  `comunicar_con` varchar(50) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `entidad_federativa` varchar(255) DEFAULT NULL,
  `alcadia` varchar(255) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `calle` varchar(255) DEFAULT NULL,
  `numero_interior` varchar(255) DEFAULT NULL,
  `numero_exterior` varchar(255) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `lugar_trabajo` varchar(50) DEFAULT NULL,
  `telefono_trabajo` int(11) DEFAULT NULL,
  `fecha_registro` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_solicitud_ficha_examen`
--

CREATE TABLE `t_solicitud_ficha_examen` (
  `id_solicitud_ficha_examen` int(11) NOT NULL,
  `numero_recibo` int(11) DEFAULT NULL,
  `fecha_pago` date DEFAULT current_timestamp(),
  `fecha_registro` date DEFAULT current_timestamp(),
  `instituto` varchar(50) DEFAULT 'Instituto Tecnologico de Milpa Alta II',
  `apellido_paterno` varchar(50) DEFAULT NULL,
  `apellido_materno` varchar(50) DEFAULT NULL,
  `nombre_aspirante` varchar(50) DEFAULT NULL,
  `nip` int(11) DEFAULT NULL,
  `fecha_nacimiento` date DEFAULT NULL,
  `fk_cat_sexo` int(11) DEFAULT NULL,
  `nacionalidad` varchar(50) DEFAULT 'Mexicana',
  `curp` varchar(20) DEFAULT NULL,
  `fk_cat_carrera_opcion_1` varchar(5) DEFAULT NULL,
  `fk_cat_carrera_opcion_2` varchar(5) DEFAULT NULL,
  `fk_cat_entidad_federativa_preparatoria` int(11) DEFAULT NULL,
  `clave_preparatoria` varchar(12) DEFAULT NULL,
  `anio_egreso` int(11) DEFAULT NULL,
  `promedio_general` float DEFAULT NULL,
  `calle` varchar(50) DEFAULT NULL,
  `numero_interior` varchar(255) DEFAULT NULL,
  `numero_exterior` varchar(255) DEFAULT NULL,
  `entidad_federativa` varchar(255) DEFAULT NULL,
  `alcadia` varchar(255) DEFAULT NULL,
  `codigo_postal` int(11) DEFAULT NULL,
  `colonia` varchar(255) DEFAULT NULL,
  `correo_electronico` varchar(50) DEFAULT NULL,
  `telefono` int(11) DEFAULT NULL,
  `fk_cat_estado_civil` int(11) DEFAULT NULL,
  `capacidad_diferente` varchar(2) DEFAULT NULL,
  `tienes_beca` varchar(2) DEFAULT NULL,
  `zona_procedencia` varchar(2) DEFAULT NULL,
  `programa_oportunidades` varchar(2) DEFAULT NULL,
  `fk_cat_reticula_opcion_1` int(11) DEFAULT NULL,
  `fk_cat_reticula_opcion_2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE `t_usuario` (
  `id_usuario` int(11) NOT NULL,
  `fk_persona` int(11) DEFAULT NULL,
  `fk_cat_rol` int(11) DEFAULT NULL,
  `estado` int(11) DEFAULT NULL,
  `correo_usuario` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `insert_datos` datetime DEFAULT current_timestamp(),
  `usuario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`id_usuario`, `fk_persona`, `fk_cat_rol`, `estado`, `correo_usuario`, `password`, `insert_datos`, `usuario`) VALUES
(1, 1, 1, 0, 'dir_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2022-11-24 15:20:41', 'direccion'),
(2, 2, 2, 0, 'acad_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2022-11-24 15:20:41', 'academica'),
(3, 3, 22, 0, 'cbas_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:31:38', 'basicas'),
(4, 4, 0, 2, 'cead_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:32:53', ''),
(5, 5, 0, 2, 'ing_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:34:19', ''),
(6, 6, 6, 2, 'dda_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2022-11-24 15:20:41', 'desarrollo'),
(7, 7, 7, 0, 'dep_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2022-11-24 15:20:41', 'division'),
(8, 8, 0, 2, 'plan_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:36:47', ''),
(9, 9, 0, 2, 'ci_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:39:07', 'informacion'),
(10, 10, 0, 2, 'ext_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:39:07', 'extra'),
(11, 11, 0, 2, 'vin_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:40:20', 'vinculacion'),
(12, 12, 0, 2, 'pl_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:40:20', 'planeacion'),
(13, 13, 4, 0, 'se_milpaalta2@tecnm.mx', '$2y$10$s/8.5JD0xYu.xMEJq/Vt4.aMDu.gWZU6rN8ySGKoplRUZWOxMEVI.', '2022-11-24 15:20:41', 'escolares'),
(14, 14, 21, 0, 'admin_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2022-11-24 15:20:41', 'administrador'),
(15, 15, 15, 2, 'rf_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2022-11-24 15:20:41', 'financieros'),
(16, 16, 16, 1, 'rh_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2022-11-24 15:20:41', 'humanos'),
(17, 17, 0, 2, 'rm_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:43:31', 'materiales'),
(18, 18, 0, 2, 'cc_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-01-05 01:43:31', 'computo'),
(20, 19, 20, 0, 'l221190001@milpaalta2.tecnm.mx', '$2y$10$2rAbjH3ZX0uXyZAVYi1CMOWBPnvnRY3kpRMSJaU0wgBZdKaJzwH9m', '2022-12-12 19:36:38', '221190001'),
(21, 20, 20, 0, 'l221190002@milpaalta2.tecnm.mx', '$2y$10$2rAbjH3ZX0uXyZAVYi1CMOWBPnvnRY3kpRMSJaU0wgBZdKaJzwH9m', '2022-12-13 08:13:32', '221190002'),
(22, 23, 20, 0, 'l221190003@milpaalta2.tecnm.mx', '$2y$10$XBR.JtUBfnu6CkuStq6MhOa2D3YjRgq5w6o0coBUWplUPCx2SjeEG', '2023-01-27 21:49:51', '221190003'),
(23, 24, 20, 0, 'l221190004@milpaalta2.tecnm.mx', '$2y$10$2rAbjH3ZX0uXyZAVYi1CMOWBPnvnRY3kpRMSJaU0wgBZdKaJzwH9m', '2023-01-28 01:09:48', '221190004'),
(24, 25, 20, 0, 'l221190005@milpaalta2.tecnm.mx', '$2y$10$2rAbjH3ZX0uXyZAVYi1CMOWBPnvnRY3kpRMSJaU0wgBZdKaJzwH9m', '2023-02-17 04:16:01', '221190005'),
(25, 26, 20, 0, 'l231190001@milpaalta2.tecnm.mx', '$2y$10$2rAbjH3ZX0uXyZAVYi1CMOWBPnvnRY3kpRMSJaU0wgBZdKaJzwH9m', '2023-02-17 04:27:55', '231190001'),
(26, 27, 20, 0, 'l231190002@milpaalta2.tecnm.mx', '$2y$10$2rAbjH3ZX0uXyZAVYi1CMOWBPnvnRY3kpRMSJaU0wgBZdKaJzwH9m', '2023-02-17 04:37:38', '231190002'),
(27, 28, 20, 0, 'l231190003@milpaalta2.tecnm.mx', '$2y$10$UjAYoepanIXxx/LjVNo2De9Pil9XICptbezXfdf8yIiQBR6Z8gi1m', '2023-02-17 04:53:01', '231190003'),
(28, 29, 20, 0, 'l231190004@milpaalta2.tecnm.mx', '$2y$10$aRa9A8N08bGf6pzj8frGOe3/g2e9w1nFwgFudVuO/zboswaNQfqHW', '2023-02-17 04:59:04', '231190004'),
(29, 30, 20, 0, 'l231190005@milpaalta2.tecnm.mx', '$2y$10$4.BDzQL4Z9zj6HAdfqCvJOKlgEi12tpIX07eAmjBDFN8t1BSfdtCe', '2023-02-17 05:05:07', '231190005'),
(32, 36, 20, 0, 'l171290087@milpaalta2.tecnm.mx', '$2y$10$dNXaDw5tcucfVF/hc9DqNusykb4neAjp0z0vHYwYE/oUsf2Uw2NlK', '2023-03-09 02:58:21', '171290087'),
(33, 3, 19, 1, 'CAME840414WS3@milpaalta2.tecnm.mx', '$2y$10$2rAbjH3ZX0uXyZAVYi1CMOWBPnvnRY3kpRMSJaU0wgBZdKaJzwH9m', '2023-05-15 17:31:52', 'CAME840414WS3'),
(34, 3, 27, 0, 'sistemas_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-05-20 21:10:27', 'sistemas'),
(35, 4, 28, 0, 'gestion_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-05-20 21:10:27', 'gestion'),
(36, 5, 29, 0, 'industrial_milpaalta2@tecnm.mx', '$2y$10$HOnh9gDtYLeKM7nB/Zpi8eSBvIJyy7CJYNotccQhmmyyibYQZNUN2', '2023-05-20 21:21:36', 'industrial'),
(45, 33, 4, 0, 'sistemas2_milpaalta2@tecnm.mx', '$2y$10$cn57i7Kav/QrFRcKWgxaDutP82IewScQaWRwS/uLk6HWioH7Yr52m', '2023-06-07 13:14:53', 'prueba3'),
(46, 38, 8, 0, 'l231190006@milpaalta2.tecnm.mx', '$2y$10$2VkaWT/QepIK1C3abrYI5OrI1G8uq2qQYF3DCP.WUl7ER6WH7a9LG', '2023-06-14 22:38:07', ''),
(47, 39, 8, 0, 'l231190007@milpaalta2.tecnm.mx', '$2y$10$GDsquPq3zfvSQ.XSs5LYJO.KKbPYm20Pw7ORUeQ5S7fP29mS123ua', '2023-06-14 22:45:40', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_acumulado_historico`
--
ALTER TABLE `t_acumulado_historico`
  ADD PRIMARY KEY (`id_acumulado_historico`);

--
-- Indices de la tabla `t_adeudos`
--
ALTER TABLE `t_adeudos`
  ADD PRIMARY KEY (`id_adeudos`);

--
-- Indices de la tabla `t_alumno`
--
ALTER TABLE `t_alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `t_alumnos_socioeconomicos`
--
ALTER TABLE `t_alumnos_socioeconomicos`
  ADD PRIMARY KEY (`id_alumnos_socioeconomicos`);

--
-- Indices de la tabla `t_aplicacion_evaluacion`
--
ALTER TABLE `t_aplicacion_evaluacion`
  ADD PRIMARY KEY (`id_aplicacion_evaluacion`);

--
-- Indices de la tabla `t_aulas_aspirantes`
--
ALTER TABLE `t_aulas_aspirantes`
  ADD PRIMARY KEY (`id_aulas_aspirantes`);

--
-- Indices de la tabla `t_autorizaciones_inscripcion`
--
ALTER TABLE `t_autorizaciones_inscripcion`
  ADD PRIMARY KEY (`id_autorizaciones_inscripcion`);

--
-- Indices de la tabla `t_avisos_reinscripcion`
--
ALTER TABLE `t_avisos_reinscripcion`
  ADD PRIMARY KEY (`id_avisos_reinscripcion`);

--
-- Indices de la tabla `t_bitacora_alumno`
--
ALTER TABLE `t_bitacora_alumno`
  ADD PRIMARY KEY (`id_bitacora_alumno`);

--
-- Indices de la tabla `t_calificacion_final_periodo`
--
ALTER TABLE `t_calificacion_final_periodo`
  ADD PRIMARY KEY (`id_calificacion_final_periodo`);

--
-- Indices de la tabla `t_cat_actividades_apoyo`
--
ALTER TABLE `t_cat_actividades_apoyo`
  ADD PRIMARY KEY (`id_cat_actividades_apoyo`);

--
-- Indices de la tabla `t_cat_aulas`
--
ALTER TABLE `t_cat_aulas`
  ADD PRIMARY KEY (`id_cat_aulas`);

--
-- Indices de la tabla `t_cat_calificacion_evaluacion`
--
ALTER TABLE `t_cat_calificacion_evaluacion`
  ADD PRIMARY KEY (`id_cat_calificacion_evaluacion`);

--
-- Indices de la tabla `t_cat_capitulos`
--
ALTER TABLE `t_cat_capitulos`
  ADD PRIMARY KEY (`id_cat_capitulos`);

--
-- Indices de la tabla `t_cat_carrera`
--
ALTER TABLE `t_cat_carrera`
  ADD PRIMARY KEY (`id_cat_carrera`);

--
-- Indices de la tabla `t_cat_categorias`
--
ALTER TABLE `t_cat_categorias`
  ADD PRIMARY KEY (`id_cat_categorias`);

--
-- Indices de la tabla `t_cat_cuartos_personas`
--
ALTER TABLE `t_cat_cuartos_personas`
  ADD PRIMARY KEY (`id_cat_cuartos_personas`);

--
-- Indices de la tabla `t_cat_data_dir`
--
ALTER TABLE `t_cat_data_dir`
  ADD PRIMARY KEY (`id_cat_data_dir`);

--
-- Indices de la tabla `t_cat_entidad_federativa`
--
ALTER TABLE `t_cat_entidad_federativa`
  ADD PRIMARY KEY (`id_cat_entidad_federativa`);

--
-- Indices de la tabla `t_cat_escolaridad`
--
ALTER TABLE `t_cat_escolaridad`
  ADD PRIMARY KEY (`id_cat_escolaridad`);

--
-- Indices de la tabla `t_cat_escuela_procedencia`
--
ALTER TABLE `t_cat_escuela_procedencia`
  ADD PRIMARY KEY (`id_cat_escuela_procedencia`);

--
-- Indices de la tabla `t_cat_especialidad`
--
ALTER TABLE `t_cat_especialidad`
  ADD PRIMARY KEY (`id_cat_especialidad`);

--
-- Indices de la tabla `t_cat_estado_civil`
--
ALTER TABLE `t_cat_estado_civil`
  ADD PRIMARY KEY (`id_cat_estado_civil`);

--
-- Indices de la tabla `t_cat_estatus`
--
ALTER TABLE `t_cat_estatus`
  ADD PRIMARY KEY (`id_cat_estatus`);

--
-- Indices de la tabla `t_cat_estatus_seleccion`
--
ALTER TABLE `t_cat_estatus_seleccion`
  ADD PRIMARY KEY (`id_cat_estatus_seleccion`);

--
-- Indices de la tabla `t_cat_estudios_padres`
--
ALTER TABLE `t_cat_estudios_padres`
  ADD PRIMARY KEY (`id_cat_estudios_padres`);

--
-- Indices de la tabla `t_cat_genero`
--
ALTER TABLE `t_cat_genero`
  ADD PRIMARY KEY (`id_cat_genero`);

--
-- Indices de la tabla `t_cat_justificacion`
--
ALTER TABLE `t_cat_justificacion`
  ADD PRIMARY KEY (`id_cat_justificacion`);

--
-- Indices de la tabla `t_cat_materias`
--
ALTER TABLE `t_cat_materias`
  ADD PRIMARY KEY (`id_cat_materias`);

--
-- Indices de la tabla `t_cat_motivos`
--
ALTER TABLE `t_cat_motivos`
  ADD PRIMARY KEY (`id_cat_motivos`);

--
-- Indices de la tabla `t_cat_necesidad`
--
ALTER TABLE `t_cat_necesidad`
  ADD PRIMARY KEY (`id_cat_necesidad`);

--
-- Indices de la tabla `t_cat_nivel_areas`
--
ALTER TABLE `t_cat_nivel_areas`
  ADD PRIMARY KEY (`id_cat_nivel_areas`);

--
-- Indices de la tabla `t_cat_nivel_escolar`
--
ALTER TABLE `t_cat_nivel_escolar`
  ADD PRIMARY KEY (`id_cat_nivel_escolar`);

--
-- Indices de la tabla `t_cat_nivel_puesto`
--
ALTER TABLE `t_cat_nivel_puesto`
  ADD PRIMARY KEY (`id_cat_nivel_puesto`);

--
-- Indices de la tabla `t_cat_ocupacion_padres`
--
ALTER TABLE `t_cat_ocupacion_padres`
  ADD PRIMARY KEY (`id_cat_ocupacion_padres`);

--
-- Indices de la tabla `t_cat_organigrama`
--
ALTER TABLE `t_cat_organigrama`
  ADD PRIMARY KEY (`id_cat_organigrama`);

--
-- Indices de la tabla `t_cat_permisos`
--
ALTER TABLE `t_cat_permisos`
  ADD PRIMARY KEY (`id_permisos`);

--
-- Indices de la tabla `t_cat_preguntas`
--
ALTER TABLE `t_cat_preguntas`
  ADD PRIMARY KEY (`id_cat_preguntas`);

--
-- Indices de la tabla `t_cat_puestos`
--
ALTER TABLE `t_cat_puestos`
  ADD PRIMARY KEY (`id_cat_puestos`);

--
-- Indices de la tabla `t_cat_quien_dependes`
--
ALTER TABLE `t_cat_quien_dependes`
  ADD PRIMARY KEY (`id_cat_quien_dependes`);

--
-- Indices de la tabla `t_cat_quien_vives`
--
ALTER TABLE `t_cat_quien_vives`
  ADD PRIMARY KEY (`id_cat_quien_vives`);

--
-- Indices de la tabla `t_cat_reticula`
--
ALTER TABLE `t_cat_reticula`
  ADD PRIMARY KEY (`id_cat_reticula`);

--
-- Indices de la tabla `t_cat_rol`
--
ALTER TABLE `t_cat_rol`
  ADD PRIMARY KEY (`id_cat_rol`);

--
-- Indices de la tabla `t_cat_sexo`
--
ALTER TABLE `t_cat_sexo`
  ADD PRIMARY KEY (`id_cat_sexo`);

--
-- Indices de la tabla `t_cat_sistema_aplicacion`
--
ALTER TABLE `t_cat_sistema_aplicacion`
  ADD PRIMARY KEY (`id_cat_sistema_aplicacion`);

--
-- Indices de la tabla `t_cat_tipo_aspecto`
--
ALTER TABLE `t_cat_tipo_aspecto`
  ADD PRIMARY KEY (`id_cat_tipo_aspecto`);

--
-- Indices de la tabla `t_cat_tipo_autorizacion`
--
ALTER TABLE `t_cat_tipo_autorizacion`
  ADD PRIMARY KEY (`id_cat_tipo_autorizacion`);

--
-- Indices de la tabla `t_cat_tipo_encuesta`
--
ALTER TABLE `t_cat_tipo_encuesta`
  ADD PRIMARY KEY (`id_cat_tipo_encuesta`);

--
-- Indices de la tabla `t_cat_tipo_evaluacion`
--
ALTER TABLE `t_cat_tipo_evaluacion`
  ADD PRIMARY KEY (`id_cat_tipo_evaluacion`);

--
-- Indices de la tabla `t_cat_tipo_ingreso`
--
ALTER TABLE `t_cat_tipo_ingreso`
  ADD PRIMARY KEY (`id_cat_tipo_ingreso`);

--
-- Indices de la tabla `t_cat_tipo_materia`
--
ALTER TABLE `t_cat_tipo_materia`
  ADD PRIMARY KEY (`id_cat_tipo_materia`);

--
-- Indices de la tabla `t_cat_unidades`
--
ALTER TABLE `t_cat_unidades`
  ADD PRIMARY KEY (`id_unidades`);

--
-- Indices de la tabla `t_cat_zona_economica`
--
ALTER TABLE `t_cat_zona_economica`
  ADD PRIMARY KEY (`id_cat_zona_economica`);

--
-- Indices de la tabla `t_centros_trabajos`
--
ALTER TABLE `t_centros_trabajos`
  ADD PRIMARY KEY (`id_centros_trabajo`);

--
-- Indices de la tabla `t_control_calificaciones_parciales`
--
ALTER TABLE `t_control_calificaciones_parciales`
  ADD PRIMARY KEY (`id_control_calificaciones_parciales`);

--
-- Indices de la tabla `t_control_indices_reprobacion`
--
ALTER TABLE `t_control_indices_reprobacion`
  ADD PRIMARY KEY (`id_indicies_reprobacion`);

--
-- Indices de la tabla `t_control_programa_oficial`
--
ALTER TABLE `t_control_programa_oficial`
  ADD PRIMARY KEY (`id_control_programa_oficial`);

--
-- Indices de la tabla `t_control_unidades_tematicas`
--
ALTER TABLE `t_control_unidades_tematicas`
  ADD PRIMARY KEY (`id_control_unidades_tematicas`);

--
-- Indices de la tabla `t_direccion`
--
ALTER TABLE `t_direccion`
  ADD PRIMARY KEY (`id_direccion`);

--
-- Indices de la tabla `t_evaluacion_alumnos`
--
ALTER TABLE `t_evaluacion_alumnos`
  ADD PRIMARY KEY (`id_evaluacion_alumnos`);

--
-- Indices de la tabla `t_evaluacion_departamento`
--
ALTER TABLE `t_evaluacion_departamento`
  ADD PRIMARY KEY (`id_evaluacion_departamento`);

--
-- Indices de la tabla `t_ficha_aspirantes`
--
ALTER TABLE `t_ficha_aspirantes`
  ADD PRIMARY KEY (`id_ficha_aspirantes`);

--
-- Indices de la tabla `t_funciones_sistema`
--
ALTER TABLE `t_funciones_sistema`
  ADD PRIMARY KEY (`id_funciones_sistema`);

--
-- Indices de la tabla `t_grupo`
--
ALTER TABLE `t_grupo`
  ADD PRIMARY KEY (`id_grupo`);

--
-- Indices de la tabla `t_historia_alumno`
--
ALTER TABLE `t_historia_alumno`
  ADD PRIMARY KEY (`id_historia_alumno`);

--
-- Indices de la tabla `t_horario`
--
ALTER TABLE `t_horario`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `t_horario_personal`
--
ALTER TABLE `t_horario_personal`
  ADD PRIMARY KEY (`id_horario_personal`);

--
-- Indices de la tabla `t_jefes`
--
ALTER TABLE `t_jefes`
  ADD PRIMARY KEY (`id_jefes`);

--
-- Indices de la tabla `t_materia_solicitada_especial`
--
ALTER TABLE `t_materia_solicitada_especial`
  ADD PRIMARY KEY (`id_materia_solicitada_especial`);

--
-- Indices de la tabla `t_notificaciones`
--
ALTER TABLE `t_notificaciones`
  ADD PRIMARY KEY (`id_notificacion`);

--
-- Indices de la tabla `t_numero_control`
--
ALTER TABLE `t_numero_control`
  ADD PRIMARY KEY (`id_numero_control`);

--
-- Indices de la tabla `t_partidas_presupuestales`
--
ALTER TABLE `t_partidas_presupuestales`
  ADD PRIMARY KEY (`id_partidas_presupuestales`);

--
-- Indices de la tabla `t_periodo_escolar`
--
ALTER TABLE `t_periodo_escolar`
  ADD PRIMARY KEY (`id_periodo_escolar`);

--
-- Indices de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indices de la tabla `t_personal`
--
ALTER TABLE `t_personal`
  ADD PRIMARY KEY (`id_personal`);

--
-- Indices de la tabla `t_plazas`
--
ALTER TABLE `t_plazas`
  ADD PRIMARY KEY (`id_plazas`);

--
-- Indices de la tabla `t_plazas_personal`
--
ALTER TABLE `t_plazas_personal`
  ADD PRIMARY KEY (`id_plazas_personal`);

--
-- Indices de la tabla `t_preparatorias_procedencia`
--
ALTER TABLE `t_preparatorias_procedencia`
  ADD PRIMARY KEY (`id_pretaratorias_procedencia`);

--
-- Indices de la tabla `t_prestamos_maestros`
--
ALTER TABLE `t_prestamos_maestros`
  ADD PRIMARY KEY (`id_prestamos_maestros`);

--
-- Indices de la tabla `t_registro_temp`
--
ALTER TABLE `t_registro_temp`
  ADD PRIMARY KEY (`id_registro_temp`);

--
-- Indices de la tabla `t_seleccion_materias`
--
ALTER TABLE `t_seleccion_materias`
  ADD PRIMARY KEY (`id_seleccion_materias`);

--
-- Indices de la tabla `t_solicitud`
--
ALTER TABLE `t_solicitud`
  ADD PRIMARY KEY (`id_solicitud`);

--
-- Indices de la tabla `t_solicitudes_ex_especiales`
--
ALTER TABLE `t_solicitudes_ex_especiales`
  ADD PRIMARY KEY (`id_solicitudes_ex_especiales`);

--
-- Indices de la tabla `t_solicitud_ficha`
--
ALTER TABLE `t_solicitud_ficha`
  ADD PRIMARY KEY (`id_solicitud_ficha`);

--
-- Indices de la tabla `t_solicitud_ficha_examen`
--
ALTER TABLE `t_solicitud_ficha_examen`
  ADD PRIMARY KEY (`id_solicitud_ficha_examen`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_acumulado_historico`
--
ALTER TABLE `t_acumulado_historico`
  MODIFY `id_acumulado_historico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_adeudos`
--
ALTER TABLE `t_adeudos`
  MODIFY `id_adeudos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `t_alumno`
--
ALTER TABLE `t_alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `t_alumnos_socioeconomicos`
--
ALTER TABLE `t_alumnos_socioeconomicos`
  MODIFY `id_alumnos_socioeconomicos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_aplicacion_evaluacion`
--
ALTER TABLE `t_aplicacion_evaluacion`
  MODIFY `id_aplicacion_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_aulas_aspirantes`
--
ALTER TABLE `t_aulas_aspirantes`
  MODIFY `id_aulas_aspirantes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_autorizaciones_inscripcion`
--
ALTER TABLE `t_autorizaciones_inscripcion`
  MODIFY `id_autorizaciones_inscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_avisos_reinscripcion`
--
ALTER TABLE `t_avisos_reinscripcion`
  MODIFY `id_avisos_reinscripcion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `t_bitacora_alumno`
--
ALTER TABLE `t_bitacora_alumno`
  MODIFY `id_bitacora_alumno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_calificacion_final_periodo`
--
ALTER TABLE `t_calificacion_final_periodo`
  MODIFY `id_calificacion_final_periodo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_cat_actividades_apoyo`
--
ALTER TABLE `t_cat_actividades_apoyo`
  MODIFY `id_cat_actividades_apoyo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `t_cat_aulas`
--
ALTER TABLE `t_cat_aulas`
  MODIFY `id_cat_aulas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=229;

--
-- AUTO_INCREMENT de la tabla `t_cat_calificacion_evaluacion`
--
ALTER TABLE `t_cat_calificacion_evaluacion`
  MODIFY `id_cat_calificacion_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `t_cat_capitulos`
--
ALTER TABLE `t_cat_capitulos`
  MODIFY `id_cat_capitulos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `t_cat_carrera`
--
ALTER TABLE `t_cat_carrera`
  MODIFY `id_cat_carrera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `t_cat_categorias`
--
ALTER TABLE `t_cat_categorias`
  MODIFY `id_cat_categorias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT de la tabla `t_cat_cuartos_personas`
--
ALTER TABLE `t_cat_cuartos_personas`
  MODIFY `id_cat_cuartos_personas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_cat_data_dir`
--
ALTER TABLE `t_cat_data_dir`
  MODIFY `id_cat_data_dir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4860;

--
-- AUTO_INCREMENT de la tabla `t_cat_entidad_federativa`
--
ALTER TABLE `t_cat_entidad_federativa`
  MODIFY `id_cat_entidad_federativa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `t_cat_escolaridad`
--
ALTER TABLE `t_cat_escolaridad`
  MODIFY `id_cat_escolaridad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_cat_escuela_procedencia`
--
ALTER TABLE `t_cat_escuela_procedencia`
  MODIFY `id_cat_escuela_procedencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `t_cat_especialidad`
--
ALTER TABLE `t_cat_especialidad`
  MODIFY `id_cat_especialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `t_cat_estado_civil`
--
ALTER TABLE `t_cat_estado_civil`
  MODIFY `id_cat_estado_civil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_cat_estatus`
--
ALTER TABLE `t_cat_estatus`
  MODIFY `id_cat_estatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `t_cat_estatus_seleccion`
--
ALTER TABLE `t_cat_estatus_seleccion`
  MODIFY `id_cat_estatus_seleccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_cat_estudios_padres`
--
ALTER TABLE `t_cat_estudios_padres`
  MODIFY `id_cat_estudios_padres` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_cat_genero`
--
ALTER TABLE `t_cat_genero`
  MODIFY `id_cat_genero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `t_cat_justificacion`
--
ALTER TABLE `t_cat_justificacion`
  MODIFY `id_cat_justificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT de la tabla `t_cat_materias`
--
ALTER TABLE `t_cat_materias`
  MODIFY `id_cat_materias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=186;

--
-- AUTO_INCREMENT de la tabla `t_cat_motivos`
--
ALTER TABLE `t_cat_motivos`
  MODIFY `id_cat_motivos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `t_cat_necesidad`
--
ALTER TABLE `t_cat_necesidad`
  MODIFY `id_cat_necesidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_cat_nivel_areas`
--
ALTER TABLE `t_cat_nivel_areas`
  MODIFY `id_cat_nivel_areas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `t_cat_nivel_escolar`
--
ALTER TABLE `t_cat_nivel_escolar`
  MODIFY `id_cat_nivel_escolar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `t_cat_nivel_puesto`
--
ALTER TABLE `t_cat_nivel_puesto`
  MODIFY `id_cat_nivel_puesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_cat_ocupacion_padres`
--
ALTER TABLE `t_cat_ocupacion_padres`
  MODIFY `id_cat_ocupacion_padres` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `t_cat_organigrama`
--
ALTER TABLE `t_cat_organigrama`
  MODIFY `id_cat_organigrama` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT de la tabla `t_cat_permisos`
--
ALTER TABLE `t_cat_permisos`
  MODIFY `id_permisos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `t_cat_preguntas`
--
ALTER TABLE `t_cat_preguntas`
  MODIFY `id_cat_preguntas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT de la tabla `t_cat_puestos`
--
ALTER TABLE `t_cat_puestos`
  MODIFY `id_cat_puestos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de la tabla `t_cat_quien_dependes`
--
ALTER TABLE `t_cat_quien_dependes`
  MODIFY `id_cat_quien_dependes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `t_cat_quien_vives`
--
ALTER TABLE `t_cat_quien_vives`
  MODIFY `id_cat_quien_vives` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `t_cat_reticula`
--
ALTER TABLE `t_cat_reticula`
  MODIFY `id_cat_reticula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `t_cat_rol`
--
ALTER TABLE `t_cat_rol`
  MODIFY `id_cat_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `t_cat_sexo`
--
ALTER TABLE `t_cat_sexo`
  MODIFY `id_cat_sexo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `t_cat_sistema_aplicacion`
--
ALTER TABLE `t_cat_sistema_aplicacion`
  MODIFY `id_cat_sistema_aplicacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `t_cat_tipo_aspecto`
--
ALTER TABLE `t_cat_tipo_aspecto`
  MODIFY `id_cat_tipo_aspecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `t_cat_tipo_autorizacion`
--
ALTER TABLE `t_cat_tipo_autorizacion`
  MODIFY `id_cat_tipo_autorizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `t_cat_tipo_encuesta`
--
ALTER TABLE `t_cat_tipo_encuesta`
  MODIFY `id_cat_tipo_encuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_cat_tipo_evaluacion`
--
ALTER TABLE `t_cat_tipo_evaluacion`
  MODIFY `id_cat_tipo_evaluacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `t_cat_tipo_ingreso`
--
ALTER TABLE `t_cat_tipo_ingreso`
  MODIFY `id_cat_tipo_ingreso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `t_cat_tipo_materia`
--
ALTER TABLE `t_cat_tipo_materia`
  MODIFY `id_cat_tipo_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_cat_unidades`
--
ALTER TABLE `t_cat_unidades`
  MODIFY `id_unidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `t_cat_zona_economica`
--
ALTER TABLE `t_cat_zona_economica`
  MODIFY `id_cat_zona_economica` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `t_centros_trabajos`
--
ALTER TABLE `t_centros_trabajos`
  MODIFY `id_centros_trabajo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_control_calificaciones_parciales`
--
ALTER TABLE `t_control_calificaciones_parciales`
  MODIFY `id_control_calificaciones_parciales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `t_control_indices_reprobacion`
--
ALTER TABLE `t_control_indices_reprobacion`
  MODIFY `id_indicies_reprobacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_control_programa_oficial`
--
ALTER TABLE `t_control_programa_oficial`
  MODIFY `id_control_programa_oficial` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_control_unidades_tematicas`
--
ALTER TABLE `t_control_unidades_tematicas`
  MODIFY `id_control_unidades_tematicas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_direccion`
--
ALTER TABLE `t_direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `t_evaluacion_alumnos`
--
ALTER TABLE `t_evaluacion_alumnos`
  MODIFY `id_evaluacion_alumnos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_evaluacion_departamento`
--
ALTER TABLE `t_evaluacion_departamento`
  MODIFY `id_evaluacion_departamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_ficha_aspirantes`
--
ALTER TABLE `t_ficha_aspirantes`
  MODIFY `id_ficha_aspirantes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_funciones_sistema`
--
ALTER TABLE `t_funciones_sistema`
  MODIFY `id_funciones_sistema` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_grupo`
--
ALTER TABLE `t_grupo`
  MODIFY `id_grupo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT de la tabla `t_historia_alumno`
--
ALTER TABLE `t_historia_alumno`
  MODIFY `id_historia_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `t_horario`
--
ALTER TABLE `t_horario`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=164;

--
-- AUTO_INCREMENT de la tabla `t_horario_personal`
--
ALTER TABLE `t_horario_personal`
  MODIFY `id_horario_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `t_jefes`
--
ALTER TABLE `t_jefes`
  MODIFY `id_jefes` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_materia_solicitada_especial`
--
ALTER TABLE `t_materia_solicitada_especial`
  MODIFY `id_materia_solicitada_especial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_notificaciones`
--
ALTER TABLE `t_notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_numero_control`
--
ALTER TABLE `t_numero_control`
  MODIFY `id_numero_control` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT de la tabla `t_partidas_presupuestales`
--
ALTER TABLE `t_partidas_presupuestales`
  MODIFY `id_partidas_presupuestales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_periodo_escolar`
--
ALTER TABLE `t_periodo_escolar`
  MODIFY `id_periodo_escolar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `t_persona`
--
ALTER TABLE `t_persona`
  MODIFY `id_persona` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `t_personal`
--
ALTER TABLE `t_personal`
  MODIFY `id_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `t_plazas`
--
ALTER TABLE `t_plazas`
  MODIFY `id_plazas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_plazas_personal`
--
ALTER TABLE `t_plazas_personal`
  MODIFY `id_plazas_personal` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_preparatorias_procedencia`
--
ALTER TABLE `t_preparatorias_procedencia`
  MODIFY `id_pretaratorias_procedencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_prestamos_maestros`
--
ALTER TABLE `t_prestamos_maestros`
  MODIFY `id_prestamos_maestros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `t_registro_temp`
--
ALTER TABLE `t_registro_temp`
  MODIFY `id_registro_temp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `t_seleccion_materias`
--
ALTER TABLE `t_seleccion_materias`
  MODIFY `id_seleccion_materias` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT de la tabla `t_solicitud`
--
ALTER TABLE `t_solicitud`
  MODIFY `id_solicitud` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `t_solicitudes_ex_especiales`
--
ALTER TABLE `t_solicitudes_ex_especiales`
  MODIFY `id_solicitudes_ex_especiales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `t_solicitud_ficha`
--
ALTER TABLE `t_solicitud_ficha`
  MODIFY `id_solicitud_ficha` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_solicitud_ficha_examen`
--
ALTER TABLE `t_solicitud_ficha_examen`
  MODIFY `id_solicitud_ficha_examen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
