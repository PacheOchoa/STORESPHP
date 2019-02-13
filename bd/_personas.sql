-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-02-2019 a las 02:54:46
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `_personas`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualizar_datos` (IN `NombreU` VARCHAR(40), IN `ApellidoPaternoU` VARCHAR(40), IN `ApellidoMaterno` VARCHAR(40), IN `EdadU` INT, IN `idPersona` INT)  UPDATE personas SET Nombre = NombreU, ApellidoPaterno = ApellidoPaternoU, ApellidoPaterno = ApellidoPaternoU, Edad = EdadU WHERE id = idPersona$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_eliminarPersona` (IN `idPersona` INT)  DELETE FROM personas WHERE id = idPersona$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insertar_datos` (IN `NombreI` VARCHAR(40), IN `ApellidoPaternoI` VARCHAR(40), IN `ApellidoMaternoI` VARCHAR(40), IN `EdadI` VARCHAR(40))  INSERT into personas(Nombre,ApellidoPaterno,ApellidoMaterno,Edad) VALUES(NombreI,ApellidoPaternoI, ApellidoMaternoI,EdadI)$$


CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_mostrar_datos` ()  SELECT id,Nombre,ApellidoPaterno,ApellidoMaterno,Edad from personas$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_obtener_datosPersona` (IN `idPersona` INT)  SELECT Nombre,ApellidoPaterno,ApellidoMaterno,Edad FROM personas WHERE id = idPersona$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoPaterno` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `ApellidoMaterno` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `Edad` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `Nombre`, `ApellidoPaterno`, `ApellidoMaterno`, `Edad`) VALUES
(1, 'Roberto', 'chavez', 'Zamora', 34),
(2, 'sergio', 'ramirez', 'gonzalez', 23),
(4, 'Rosa', 'Zamora', 'Mariscal', 43),
(5, 'Rosa', 'Zamora', 'Mariscal', 43),
(6, 'Sergio', 'Ochoa', 'muÃ±oz', 45),
(7, 'Brandon', 'Ochoa', 'Zamora', 19);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
