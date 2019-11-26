-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-10-2019 a las 16:59:47
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `serviteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(200) NOT NULL,
  `nombresCliente` varchar(200) NOT NULL,
  `apellidosCliente` varchar(200) NOT NULL,
  `edadCliente` varchar(200) NOT NULL,
  `direccionCliente` varchar(200) NOT NULL,
  `telefonoCliente` varchar(200) NOT NULL,
  `generoCliente` varchar(200) NOT NULL,
  `correoCliente` varchar(200) NOT NULL,
  `documentoCliente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `idContacto` int(200) NOT NULL,
  `idVehiculo` int(200) NOT NULL,
  `nombreContacto` varchar(200) NOT NULL,
  `correoContacto` varchar(200) NOT NULL,
  `telefonoContacto` varchar(200) NOT NULL,
  `obervacionesContacto` varchar(200) NOT NULL,
  `placaVehiculo` varchar(200) NOT NULL,
  `tipoVehiculo` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion`
--

CREATE TABLE `cotizacion` (
  `idCotizacion` int(200) NOT NULL,
  `idContacto` int(200) NOT NULL,
  `placaVehiculo` varchar(200) NOT NULL,
  `tipoVehiculo` varchar(200) NOT NULL,
  `valorCotizacion` varchar(200) NOT NULL,
  `estadoCotizacion` varchar(200) NOT NULL,
  `cantidadCotizacion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallediagnostico`
--

CREATE TABLE `detallediagnostico` (
  `idDetalleDiagnostico` int(200) NOT NULL,
  `idDiagnostico` int(200) NOT NULL,
  `nombrePieza` varchar(200) NOT NULL,
  `estadoPieza` varchar(200) NOT NULL,
  `observacionPieza` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico`
--

CREATE TABLE `diagnostico` (
  `idDiagnostico` int(200) NOT NULL,
  `idVehiculo` int(200) NOT NULL,
  `idUsuario` varchar(200) NOT NULL,
  `placaVehiculo` varchar(200) NOT NULL,
  `tipoVehiculo` varchar(200) NOT NULL,
  `colorVehiculo` varchar(200) NOT NULL,
  `marcaVehiculo` varchar(200) NOT NULL,
  `nombresUsuario` varchar(200) NOT NULL,
  `apellidosUsuario` varchar(200) NOT NULL,
  `correoUsuario` varchar(200) NOT NULL,
  `horaEntradaDiagnostico` varchar(200) NOT NULL,
  `horaSalidaDiagnostico` varchar(200) NOT NULL,
  `resultadoDiagnostico` varchar(200) NOT NULL,
  `observacionDiagnostico` varchar(200) NOT NULL,
  `costoDiagnostico` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `idEmpleado` int(200) NOT NULL,
  `nombresEmpleado` varchar(200) NOT NULL,
  `apellidosEmpleado` varchar(200) NOT NULL,
  `nacimientoEmpleado` varchar(200) NOT NULL,
  `edadEmpleado` varchar(200) NOT NULL,
  `direccionEmpleado` varchar(200) NOT NULL,
  `telefonoEmpleado` varchar(200) NOT NULL,
  `generoEmpleado` varchar(200) NOT NULL,
  `cargoEmpleado` varchar(200) NOT NULL,
  `emailEmpleado` varchar(200) NOT NULL,
  `documentoEmpleado` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`idEmpleado`, `nombresEmpleado`, `apellidosEmpleado`, `nacimientoEmpleado`, `edadEmpleado`, `direccionEmpleado`, `telefonoEmpleado`, `generoEmpleado`, `cargoEmpleado`, `emailEmpleado`, `documentoEmpleado`) VALUES
(1, 'Brandon', 'CastaÃ±o ', '2000-07-21 ', '19 ', 'Barrio Nuevo ', '4204080', 'Masculino', 'Gerente', 'soadmetal5@gmail.com', '1007234374'),
(2, 'Brandon', 'CastaÃ±o', '2000-07-21', '19', 'Barrio Nuevo', '4204080', 'Masculino', 'Nule', 'soadmetal5@gmail.com', '1007234374'),
(3, 'Brandon', 'CastaÃ±o', '2000-07-21', '19', 'Barrio Nuevo', '4204080', 'Masculino', 'Nule', 'soadmetal5@gmail.com', '1007234374'),
(4, 'Brandon', 'CastaÃ±o', '2000-07-21', '19', 'Barrio Nuevo', '4204080', 'Masculino', 'Nule', 'soadmetal5@gmail.com', '1007234374');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `idEmpresa` int(200) NOT NULL,
  `nombreEmpresa` varchar(200) NOT NULL,
  `direccionEmpresa` varchar(200) NOT NULL,
  `telefonoEmpresa` varchar(200) NOT NULL,
  `entidadEmpresa` varchar(200) NOT NULL,
  `sloganEmpresa` varchar(200) NOT NULL,
  `logotipoEmpresa` varchar(200) NOT NULL,
  `nitEmpresa` varchar(200) NOT NULL,
  `regimenContributivoEmpresa` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`idEmpresa`, `nombreEmpresa`, `direccionEmpresa`, `telefonoEmpresa`, `entidadEmpresa`, `sloganEmpresa`, `logotipoEmpresa`, `nitEmpresa`, `regimenContributivoEmpresa`) VALUES
(1, 'Serviteca', 'Carrera 32    ', '4261421', 'Privada', '../vista/img/skyrim3.jpg', '../vista/img/', 'XX XXX XXX', 'Yes'),
(2, '', '', '', '', '../vista/img/', '../vista/img/', '', ''),
(3, '', '', '', '', '../vista/img/', '../vista/img/', '', ''),
(4, '', '', '', '', '../vista/img/', '../vista/img/', '', ''),
(5, '', '', '', '', '../vista/img/', '../vista/img/', '', ''),
(6, '', '', '', '', '../vista/img/', '../vista/img/', '', ''),
(7, '', '', '', '', '../vista/img/', '../vista/img/', '', ''),
(8, '', '', '', '', '../vista/img/', '../vista/img/', '', ''),
(9, '', '', '', '', '../vista/img/', '../vista/img/', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialdignostico`
--

CREATE TABLE `historialdignostico` (
  `idHistorialdDiagnostico` int(200) NOT NULL,
  `idDetalleDiagnostico` int(200) NOT NULL,
  `idDiagnostico` int(200) NOT NULL,
  `Nombrepieza` varchar(200) NOT NULL,
  `estadopieza` varchar(200) NOT NULL,
  `observacionpieza` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(200) NOT NULL,
  `idEmpleado` int(200) NOT NULL,
  `emailUsuario` varchar(200) NOT NULL,
  `passUsuario` varchar(200) NOT NULL,
  `imagenUsuario` varchar(200) NOT NULL,
  `permisosUsuario` varchar(200) NOT NULL,
  `fechaUsuario` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `idEmpleado`, `emailUsuario`, `passUsuario`, `imagenUsuario`, `permisosUsuario`, `fechaUsuario`) VALUES
(4, 2, 'danny123@gmail.com', '123', '../vista/img/Kerim.jpg', '2', '06/10/2019');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuarios` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL,
  `Correo` varchar(80) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuarios`, `Nombre`, `Correo`, `Usuario`, `Password`) VALUES
(1, 'Andres Mora', 'carlosmora055@gmail.com', 'Caliche', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220'),
(2, 'Oscar Figueroa', 'oscar@gmail.com', 'osquitar', '51eac6b471a284d3341d8c0c63d0f1a286262a18'),
(3, 'javier mascherano', 'javier@gmail.com', 'javier', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(4, 'Brandon CastaÃ±o', 'brandon@gmail.com', 'waflex', '40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
(5, 'Daniela Camacho', 'dani@gmail.com', 'daniela', '40bd001563085fc35165329ea1ff5c5ecbdbbeef');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idVehiculo` int(200) NOT NULL,
  `idCliente` int(200) NOT NULL,
  `placaVehiculo` varchar(200) NOT NULL,
  `tipoVehiculo` varchar(200) NOT NULL,
  `colorVehiculo` varchar(200) NOT NULL,
  `marcaVehiculo` varchar(200) NOT NULL,
  `nombreCliente` varchar(200) NOT NULL,
  `documentoCliente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idContacto`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`idEmpleado`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`idEmpresa`);

--
-- Indices de la tabla `historialdignostico`
--
ALTER TABLE `historialdignostico`
  ADD PRIMARY KEY (`idHistorialdDiagnostico`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuarios`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idVehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idContacto` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `idEmpleado` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `idEmpresa` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `historialdignostico`
--
ALTER TABLE `historialdignostico`
  MODIFY `idHistorialdDiagnostico` int(200) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idVehiculo` int(200) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
