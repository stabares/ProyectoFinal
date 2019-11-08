-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-11-2019 a las 22:25:25
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clinicasf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `cc` int(10) NOT NULL,
  `contrasena` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`cc`, `contrasena`) VALUES
(1003928267, 'admin67'),
(1152698800, '9990');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL DEFAULT 'CITA',
  `paciente` int(10) NOT NULL,
  `medico` int(10) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(50) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho`
--

CREATE TABLE `despacho` (
  `id` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL DEFAULT 'DESPACHO',
  `paciente` int(10) NOT NULL,
  `producto` int(10) NOT NULL,
  `medico` int(10) NOT NULL,
  `inicio` date NOT NULL,
  `fin` date NOT NULL,
  `estado` varchar(50) NOT NULL DEFAULT 'CUMPLIDA'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medico`
--

CREATE TABLE `medico` (
  `cc` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `especialidad` varchar(10) NOT NULL,
  `contrasena` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medico`
--

INSERT INTO `medico` (`cc`, `nombre`, `apellido`, `direccion`, `telefono`, `especialidad`, `contrasena`) VALUES
(1123564400, 'Juan', 'Zapata', 'KR 67 # 56 C - 90', '3134567889', 'Cardiologí', 'Medico09'),
(1152698800, 'Paola', 'Perez', 'Cl 100 G # 56 - 89', '(04)471445', 'Pediatra', 'Medico00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paciente`
--

CREATE TABLE `paciente` (
  `cc` int(10) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `contrasena` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `paciente`
--

INSERT INTO `paciente` (`cc`, `nombre`, `apellido`, `direccion`, `telefono`, `contrasena`) VALUES
(1152325997, 'Juanito', 'Perez', 'Cl 100 G', '4740049', 'Paciente03'),
(1152698800, 'AAA', 'CORDOBA', 'CL 100G 83C- 26', '4678888', 'Prueba123'),
(1234567890, 'STEFANIA', 'TABARES', 'CL 10 83C- 28', '574046', 'Prueba123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `activo` int(11) NOT NULL,
  `precio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `tipo`, `cantidad`, `activo`, `precio`) VALUES
(1006, 'IBUPROFENO', 2, 20, 1, 345000),
(1007, 'VITAMINA C', 0, 200, 0, 150000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`cc`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paciente` (`paciente`,`medico`),
  ADD KEY `medico` (`medico`);

--
-- Indices de la tabla `despacho`
--
ALTER TABLE `despacho`
  ADD PRIMARY KEY (`id`),
  ADD KEY `medico` (`medico`),
  ADD KEY `producto` (`producto`),
  ADD KEY `paciente` (`paciente`) USING BTREE;

--
-- Indices de la tabla `medico`
--
ALTER TABLE `medico`
  ADD PRIMARY KEY (`cc`);

--
-- Indices de la tabla `paciente`
--
ALTER TABLE `paciente`
  ADD PRIMARY KEY (`cc`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`medico`) REFERENCES `medico` (`cc`),
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`paciente`) REFERENCES `paciente` (`cc`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
