-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 03-02-2023 a las 23:02:46
-- Versión del servidor: 10.1.48-MariaDB-0+deb9u2
-- Versión de PHP: 8.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `app-ades`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `ID_reservas` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora_ingreso` time NOT NULL,
  `hora_salida` time NOT NULL,
  `cant_horas` int(11) NOT NULL,
  `lugar` varchar(2) NOT NULL,
  `ocupado` varchar(2) NOT NULL,
  `ID_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`ID_reservas`, `fecha`, `hora_ingreso`, `hora_salida`, `cant_horas`, `lugar`, `ocupado`, `ID_usuario`) VALUES
(1, '2022-11-24', '16:28:00', '21:28:00', 5, 'B4', 'si', 2),
(2, '2022-11-18', '21:41:00', '24:41:00', 3, 'A4', 'si', 6),
(4, '2022-11-26', '21:46:00', '22:46:00', 1, 'B5', 'si', 7),
(5, '2022-11-28', '14:00:00', '23:00:00', 9, 'A4', 'si', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `email` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `test`
--

INSERT INTO `test` (`id`, `nombre`, `apellido`, `email`) VALUES
(1, 'duende', 'verde', 'duende@verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `ID_usuario` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fecha_nac` date NOT NULL,
  `email` varchar(30) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contrasena` text NOT NULL,
  `patente` varchar(10) NOT NULL,
  `confirmado` varchar(2) NOT NULL,
  `codigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID_usuario`, `nombre`, `apellido`, `fecha_nac`, `email`, `usuario`, `contrasena`, `patente`, `confirmado`, `codigo`) VALUES
(1, 'franco', 'fonceca', '2004-07-07', 'francofonceca15@gmail.com', 'frankito', 'frankito12', 'NA 123', 'no', 3634),
(2, 'jorge', 'fonceca', '2004-07-19', 'joaquinfonceca18@gmail.com', 'jorgito', '123456789', 'Mbw 345', 'si', 9276),
(3, 'Facundo', 'Montero', '1996-11-18', 'facumo.fm@gmail.com', 'facuar', '12345678', 'Hola', 'si', 4291),
(4, 'Facundo', 'Montero', '1996-11-18', 'facumo.fm@gmail.com', 'facuar', '12345678', 'Hola1', 'si', 6901),
(5, 'Facundo', 'Montero', '1996-11-18', 'facumo.fm@gmail.com', 'facuar', '12345678', 'Hola12', 'si', 2444),
(6, 'Melissa', 'Sosa', '1997-06-18', 'melissasosa004@gmail.com', 'Meli0406', 'Test1234!', 'ABC-123', 'si', 7103),
(7, 'Francisco ', 'Alvarado', '1996-06-05', 'fraaan.alvarado@gmail.com', 'falvarado', 'Mila1234', 'YWH245', 'si', 8769),
(8, 'Carolina ', 'López ', '1980-08-25', 'Cl3098599@gmail.com', '25801611', 'caro2580', 'AD981HZ ', 'si', 6599);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`ID_reservas`);

--
-- Indices de la tabla `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `ID_reservas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `ID_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
