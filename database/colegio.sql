-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2021 a las 02:50:08
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `colegio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `basico-cur`
--

CREATE TABLE `basico-cur` (
  `id_bascu` int(11) NOT NULL,
  `id_maestro` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL,
  `periodo` int(20) NOT NULL,
  `id_horario` int(30) NOT NULL,
  `id_dia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(11) NOT NULL,
  `paralelo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id_especia` int(11) NOT NULL,
  `nivel` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `jornada` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`id_curso`, `paralelo`, `id_especia`, `nivel`, `jornada`) VALUES
(1, 'A', 1, 'octavo', 'vespertino'),
(2, 'B', 1, 'octavo', 'vespertino'),
(3, 'c', 3, 'primero bachillerato', 'vespertino'),
(4, 'A', 1, 'octavo', 'matutino');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `id_dia` int(11) NOT NULL,
  `dia_semana` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`id_dia`, `dia_semana`) VALUES
(1, 'lunes'),
(2, 'martes'),
(3, 'miercoles'),
(4, 'jueves'),
(5, 'viernes'),
(6, 'sabado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especializacion`
--

CREATE TABLE `especializacion` (
  `id_especia` int(11) NOT NULL,
  `nom_especia` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion_especia` varchar(250) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `especializacion`
--

INSERT INTO `especializacion` (`id_especia`, `nom_especia`, `descripcion_especia`) VALUES
(1, 'General', 'preparacion de lo estudiantes previo al entrar al nivel tecnico que suelen ser tres años de estudio'),
(2, 'Quimica', 'se enseña en los años de bachillerato se especializan en las formulas quimicas etc.'),
(3, 'Informatica', 'Ayuda a los estudiantes a fomarse ene le area tecologia que es muy demandada en la actualidad'),
(6, 'agropecuaria', 'sirve para la comprension de la tirrra y se especializan en ello\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios`
--

CREATE TABLE `horarios` (
  `id_horario` int(11) NOT NULL,
  `hora` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `section` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `posicion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `horarios`
--

INSERT INTO `horarios` (`id_horario`, `hora`, `section`, `posicion`) VALUES
(2, '7:30-8:15', 'vespertino', 1),
(3, '8:15-9:00', 'vespertino', 2),
(4, '1:30-2:15', 'matutino', 1),
(5, '2:15-3:00', 'matutino', 2),
(6, '9:00-9:45', 'vespertino', 3),
(7, '9:45-10:15', 'vespertino', 4),
(8, '10:15-11:00', 'vespertino', 5),
(9, '11:00-11:45', 'vespertino', 6),
(10, '11:45-12:30', 'vespertino', 7),
(11, '3:00-3:45', 'matutino', 3),
(12, '3:45-4:15', 'matutino', 4),
(13, '4:15-5:00', 'matutino', 5),
(14, '5:00-5:45', 'matutino', 6),
(15, '5:45-6:30', 'matutino', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestros`
--

CREATE TABLE `maestros` (
  `id_maestro` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `cedula` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `Apellido` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `edad` int(11) NOT NULL,
  `direccion` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `ciudad` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `maestros`
--

INSERT INTO `maestros` (`id_maestro`, `id_materia`, `cedula`, `Nombre`, `Apellido`, `edad`, `direccion`, `sexo`, `ciudad`) VALUES
(4, 2, '1207207752', 'locls', 'marque', 25, '5 de junio y barreiro', 'mujer', 'babahoyo'),
(5, 1, '123545424', 'jonathan', 'kenny', 54, '5 de junio', 'masculino', 'babahoyo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `id_materia` int(11) NOT NULL,
  `nombre_materia` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`id_materia`, `nombre_materia`, `descripcion`) VALUES
(1, 'matematica', 'asdkajshfkljasfdkasd'),
(2, 'fisica', 'laskdaklsflksdflñkdfjñkdfjgd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `basico-cur`
--
ALTER TABLE `basico-cur`
  ADD PRIMARY KEY (`id_bascu`),
  ADD KEY `id_jornada` (`id_curso`),
  ADD KEY `id_horario` (`id_horario`),
  ADD KEY `id_maestro` (`id_maestro`),
  ADD KEY `id_dia` (`id_dia`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_especializacion` (`id_especia`) USING BTREE;

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`id_dia`);

--
-- Indices de la tabla `especializacion`
--
ALTER TABLE `especializacion`
  ADD PRIMARY KEY (`id_especia`);

--
-- Indices de la tabla `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id_horario`);

--
-- Indices de la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id_maestro`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`id_materia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `basico-cur`
--
ALTER TABLE `basico-cur`
  MODIFY `id_bascu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `id_dia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `especializacion`
--
ALTER TABLE `especializacion`
  MODIFY `id_especia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id_horario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id_maestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `id_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `basico-cur`
--
ALTER TABLE `basico-cur`
  ADD CONSTRAINT `basico-cur_ibfk_3` FOREIGN KEY (`id_horario`) REFERENCES `horarios` (`id_horario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basico-cur_ibfk_4` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basico-cur_ibfk_5` FOREIGN KEY (`id_maestro`) REFERENCES `maestros` (`id_maestro`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `basico-cur_ibfk_6` FOREIGN KEY (`id_dia`) REFERENCES `dias` (`id_dia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`id_especia`) REFERENCES `especializacion` (`id_especia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `maestros`
--
ALTER TABLE `maestros`
  ADD CONSTRAINT `maestros_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materia` (`id_materia`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
