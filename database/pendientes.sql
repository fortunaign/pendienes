-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-09-2020 a las 04:25:02
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pendientes`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_coment` (IN `pes_id` INT(5), IN `pes_detalles` VARCHAR(50))  NO SQL
INSERT INTO `pes_coment`(`pes_id`, `pes_coment`, `pes_fecha`) VALUES (pes_id,pes_detalles,(SELECT LOCALTIME))$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `add_registro` (IN `area` INT(2), IN `titulo` VARCHAR(30), IN `detalles` VARCHAR(50), IN `estado` INT(2), IN `activo` BOOLEAN)  INSERT INTO pes_registro 
VALUES (NULL, area, titulo, detalles, (select LOCALTIME), estado, activo)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pes_areas`
--

CREATE TABLE `pes_areas` (
  `pes_id` int(2) NOT NULL,
  `pes_detalles` varchar(30) NOT NULL,
  `pes_activa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pes_areas`
--

INSERT INTO `pes_areas` (`pes_id`, `pes_detalles`, `pes_activa`) VALUES
(1, 'Operaciones', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pes_coment`
--

CREATE TABLE `pes_coment` (
  `pes_id` int(5) NOT NULL,
  `pes_coment` varchar(50) NOT NULL,
  `pes_fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pes_coment`
--

INSERT INTO `pes_coment` (`pes_id`, `pes_coment`, `pes_fecha`) VALUES
(1, 'Ya se consulto con ADVANSYS y se explico en operac', '2020-09-03'),
(2, 'Funciona.', '2020-09-03'),
(2, 'Se agregan bien los comentarios.', '2020-09-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pes_estado`
--

CREATE TABLE `pes_estado` (
  `pes_id` int(2) NOT NULL,
  `pes_detalles` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pes_estado`
--

INSERT INTO `pes_estado` (`pes_id`, `pes_detalles`) VALUES
(1, 'Proceso'),
(2, 'Solucionado'),
(3, 'Cerrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pes_registro`
--

CREATE TABLE `pes_registro` (
  `pes_id` int(5) NOT NULL,
  `pes_area` int(2) NOT NULL,
  `pes_titulo` varchar(30) NOT NULL,
  `pes_detalles` varchar(50) NOT NULL,
  `pes_fecha` date NOT NULL,
  `pes_estado` int(2) NOT NULL,
  `pes_activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pes_registro`
--

INSERT INTO `pes_registro` (`pes_id`, `pes_area`, `pes_titulo`, `pes_detalles`, `pes_fecha`, `pes_estado`, `pes_activo`) VALUES
(1, 1, 'Encaje legal', 'Explicar como se identifican los creditos con enca', '2020-09-02', 1, 1),
(2, 1, 'Hola mundo', 'Prueba de procedimiento', '2020-09-03', 1, 0),
(3, 1, 'Cambios en el manual', 'Hola mundo, prueba desde php.\r\nsaludos cordiales.', '2020-09-03', 1, 0),
(4, 1, 'Requerimiento de advansys', 'Buscar correo donde eduardo solicita cambio en el ', '2020-09-03', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pes_areas`
--
ALTER TABLE `pes_areas`
  ADD PRIMARY KEY (`pes_id`);

--
-- Indices de la tabla `pes_coment`
--
ALTER TABLE `pes_coment`
  ADD KEY `pes_id` (`pes_id`);

--
-- Indices de la tabla `pes_estado`
--
ALTER TABLE `pes_estado`
  ADD PRIMARY KEY (`pes_id`);

--
-- Indices de la tabla `pes_registro`
--
ALTER TABLE `pes_registro`
  ADD PRIMARY KEY (`pes_id`),
  ADD KEY `areas` (`pes_area`),
  ADD KEY `pes_estado` (`pes_estado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pes_areas`
--
ALTER TABLE `pes_areas`
  MODIFY `pes_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `pes_estado`
--
ALTER TABLE `pes_estado`
  MODIFY `pes_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pes_registro`
--
ALTER TABLE `pes_registro`
  MODIFY `pes_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pes_coment`
--
ALTER TABLE `pes_coment`
  ADD CONSTRAINT `pes_coment_ibfk_1` FOREIGN KEY (`pes_id`) REFERENCES `pes_registro` (`pes_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pes_registro`
--
ALTER TABLE `pes_registro`
  ADD CONSTRAINT `pes_registro_ibfk_1` FOREIGN KEY (`pes_area`) REFERENCES `pes_areas` (`pes_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pes_registro_ibfk_2` FOREIGN KEY (`pes_estado`) REFERENCES `pes_estado` (`pes_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
