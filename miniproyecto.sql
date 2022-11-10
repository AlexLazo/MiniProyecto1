-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-11-2022 a las 23:12:03
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `miniproyecto`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carro`
--

CREATE TABLE `carro` (
  `id_carro` int(11) NOT NULL,
  `Marca` varchar(100) NOT NULL,
  `Modelo` varchar(100) NOT NULL,
  `tipo_vehiculo` varchar(150) NOT NULL,
  `Color` varchar(100) NOT NULL,
  `Id_Distribuidor` int(11) NOT NULL,
  `Fecha_importacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carro`
--

INSERT INTO `carro` (`id_carro`, `Marca`, `Modelo`, `tipo_vehiculo`, `Color`, `Id_Distribuidor`, `Fecha_importacion`) VALUES
(1, 'Nissan ', 'Frontier', 'Pick up', 'Cafe', 1, '2021-11-10'),
(2, 'Toyota', 'Hilux', 'Pick up', 'Gris', 2, '2020-11-10'),
(3, 'Mitsubishi', 'L200 Sportero ', 'Pick up', 'Gris', 2, '2022-11-02'),
(4, 'Izuzu', 'D-MAX', 'Pick up', 'Rojo', 1, '2022-11-03'),
(5, 'Jeep', 'Wrangler', 'Todoterrenos ', 'Rojo', 1, '2021-11-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrinuidor`
--

CREATE TABLE `distrinuidor` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `distrinuidor`
--

INSERT INTO `distrinuidor` (`id`, `Nombre`) VALUES
(1, 'Grupo Q'),
(2, 'DIDEA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `passw` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `user`, `passw`) VALUES
(1, 'Carlos', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carro`
--
ALTER TABLE `carro`
  ADD PRIMARY KEY (`id_carro`),
  ADD KEY `Id_dIstriubidor` (`Id_Distribuidor`);

--
-- Indices de la tabla `distrinuidor`
--
ALTER TABLE `distrinuidor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carro`
--
ALTER TABLE `carro`
  MODIFY `id_carro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `distrinuidor`
--
ALTER TABLE `distrinuidor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carro`
--
ALTER TABLE `carro`
  ADD CONSTRAINT `fk_distri` FOREIGN KEY (`Id_Distribuidor`) REFERENCES `distrinuidor` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
