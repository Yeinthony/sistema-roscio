-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-03-2023 a las 00:28:57
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_lucio`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `ID_personal` int(11) NOT NULL,
  `primer_nombre` varchar(20) DEFAULT NULL,
  `segundo_nombre` varchar(20) DEFAULT NULL,
  `primer_apellido` varchar(20) DEFAULT NULL,
  `segundo_apellido` varchar(20) DEFAULT NULL,
  `CI` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_tipos`
--

CREATE TABLE `personal_tipos` (
  `ID_personal_tipos` int(11) NOT NULL,
  `ID_personal` int(11) DEFAULT NULL,
  `ID_tipos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `ID_registro` int(11) NOT NULL,
  `Fecha` date DEFAULT NULL,
  `hora_entrada` time DEFAULT NULL,
  `hora_salida` time DEFAULT NULL,
  `observacion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_personal`
--

CREATE TABLE `registro_personal` (
  `ID_registro_personal` int(11) NOT NULL,
  `ID_personal` int(11) DEFAULT NULL,
  `ID_registro` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `ID_tipos` int(11) NOT NULL,
  `Tipo` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(12) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `contraseña` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `contraseña`) VALUES
(1, 'admin', 'Virtual_box24.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`ID_personal`);

--
-- Indices de la tabla `personal_tipos`
--
ALTER TABLE `personal_tipos`
  ADD PRIMARY KEY (`ID_personal_tipos`),
  ADD KEY `ID_personal` (`ID_personal`),
  ADD KEY `ID_tipos` (`ID_tipos`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`ID_registro`);

--
-- Indices de la tabla `registro_personal`
--
ALTER TABLE `registro_personal`
  ADD PRIMARY KEY (`ID_registro_personal`),
  ADD KEY `ID_personal` (`ID_personal`),
  ADD KEY `ID_registro` (`ID_registro`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`ID_tipos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `ID_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `personal_tipos`
--
ALTER TABLE `personal_tipos`
  MODIFY `ID_personal_tipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `ID_registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `registro_personal`
--
ALTER TABLE `registro_personal`
  MODIFY `ID_registro_personal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `ID_tipos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personal_tipos`
--
ALTER TABLE `personal_tipos`
  ADD CONSTRAINT `personal_tipos_ibfk_1` FOREIGN KEY (`ID_tipos`) REFERENCES `tipos` (`ID_tipos`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `personal_tipos_ibfk_2` FOREIGN KEY (`ID_personal`) REFERENCES `personal` (`ID_personal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `registro_personal`
--
ALTER TABLE `registro_personal`
  ADD CONSTRAINT `registro_personal_ibfk_2` FOREIGN KEY (`ID_registro`) REFERENCES `registro` (`ID_registro`),
  ADD CONSTRAINT `registro_personal_ibfk_3` FOREIGN KEY (`ID_personal`) REFERENCES `personal` (`ID_personal`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
