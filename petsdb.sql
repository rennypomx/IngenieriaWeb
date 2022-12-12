-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2022 a las 03:19:36
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `petsdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `edad` int(11) NOT NULL,
  `raza` varchar(30) NOT NULL,
  `postulaciones` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`id`, `nombre`, `edad`, `raza`, `postulaciones`) VALUES
(1, 'Firulais', 1, 'Pastor Alemán', 2),
(2, 'Oso', 2, 'Afgano', 2),
(3, 'Rambo', 1, 'Husky', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id` int(11) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `cedula` int(11) NOT NULL,
  `telefono` varchar(50) DEFAULT NULL,
  `direccion` varchar(150) NOT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `correo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id`, `nombres`, `apellidos`, `cedula`, `telefono`, `direccion`, `fechaNacimiento`, `correo`) VALUES
(1, 'Francisco Xavier', 'González Flores', 1751666577, NULL, 'Catamayo', NULL, 'fxgonzalez5@utpl.edu.ec'),
(2, 'Kevin', 'Cabrera', 2147483647, NULL, 'Loja', NULL, 'krcabrera@utpl.edu.ec'),
(3, 'Nixon', 'Vuele', 2147483647, NULL, 'Catamayo', NULL, 'njvuele@utpl.edu.ec');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postula`
--

CREATE TABLE `postula` (
  `id` int(11) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `mascota_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `postula`
--

INSERT INTO `postula` (`id`, `personal_id`, `mascota_id`) VALUES
(1, 1, 1),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2),
(5, 3, 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `postula`
--
ALTER TABLE `postula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_personal` (`personal_id`),
  ADD KEY `idx_mascota` (`mascota_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `postula`
--
ALTER TABLE `postula`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `postula`
--
ALTER TABLE `postula`
  ADD CONSTRAINT `postula_ibfk_1` FOREIGN KEY (`personal_id`) REFERENCES `personal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `postula_ibfk_2` FOREIGN KEY (`mascota_id`) REFERENCES `mascota` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
