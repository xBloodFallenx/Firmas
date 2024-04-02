

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";





-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idcargo` int(11) NOT NULL,
  `Nombre_Cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idcargo`, `Nombre_Cargo`) VALUES
(1, 'Gerente'),
(2, 'Administrador'),
(3, 'Vendedor'),
(4, 'Gerente General de Mercadeo'),


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `idciudad` int(11) NOT NULL,
  `Nombre_Ciudad` varchar(45) NOT NULL,
  `Indicativo` varchar(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`idciudad`, `Nombre_Ciudad`, `Indicativo`) VALUES
(1, 'Bogotá', '601'),
(2, 'Cali', '602'),
(3, 'Medellin', '604'),
(4, 'Armenia', '606'),
(5, 'Manizales', '608');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Rol_code` int(11) NOT NULL,
  `Rol_Name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Rol_code`, `Rol_Name`) VALUES
(1, 'Usuario'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `Primer_Nombre` varchar(45) DEFAULT NULL,
  `Segundo_Nombre` varchar(45) DEFAULT NULL,
  `Primer_Apellido` varchar(45) DEFAULT NULL,
  `Segundo_Apellido` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `Usuario` varchar(45) NOT NULL,
  `Password` varchar(45) NOT NULL,
  `Ext` varchar(45) DEFAULT NULL,
  `Indicativo` int(3) DEFAULT NULL,
  `Celular` int(10) DEFAULT NULL,
  `Telefono` int(10) DEFAULT NULL,
  `idcargo` int(11) DEFAULT NULL,
  `idciudad` int(11) DEFAULT NULL,
  `Rol_code` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `Primer_Nombre`, `Segundo_Nombre`, `Primer_Apellido`, `Segundo_Apellido`, `direccion`, `Usuario`, `Password`, `Ext`, `Indicativo`, `Celular`, `Telefono`, `idcargo`, `idciudad`, `Rol_code`) VALUES
(10, '', '', '', '', '', 'admin', '789', '', NULL, 0, 0, NULL, NULL, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`idciudad`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Rol_code`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`),
  ADD KEY `restrict` (`Rol_code`),
  ADD KEY `restrict2` (`idcargo`),
  ADD KEY `restrict3` (`idciudad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `restrict` FOREIGN KEY (`Rol_code`) REFERENCES `rol` (`Rol_code`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restrict2` FOREIGN KEY (`idcargo`) REFERENCES `cargo` (`idcargo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `restrict3` FOREIGN KEY (`idciudad`) REFERENCES `ciudad` (`idciudad`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;


