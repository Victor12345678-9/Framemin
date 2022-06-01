-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2022 a las 03:00:43
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mvc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProduct` int(11) NOT NULL,
  `codeProduct` varchar(10) NOT NULL,
  `nameProduct` varchar(50) NOT NULL,
  `descProduct` varchar(60) NOT NULL,
  `price` varchar(10) NOT NULL,
  `stock` int(10) NOT NULL DEFAULT 0,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProduct`, `codeProduct`, `nameProduct`, `descProduct`, `price`, `stock`, `status`, `created_at`, `update_at`) VALUES
(1, '01C', 'Coca cola', 'Coca cola 500ml', '15', 0, 1, '2022-05-30 21:50:04', '2022-05-30 21:50:04'),
(2, '01C', 'Coca cola', 'Coca cola 100ml', '15', 0, 1, '2022-05-30 21:50:04', '2022-05-30 21:50:04'),
(3, '01C', 'Coca cola', 'Coca cola 500ml', '15', 0, 1, '2022-05-30 21:50:04', '2022-05-30 21:50:04'),
(4, '01C', 'xd', 'Coca cola 500ml', '15', 0, 1, '2022-05-30 21:50:04', '2022-05-30 21:50:04'),
(5, '01C', 'Coca cola', 'Coca cola 500ml', '15', 0, 1, '2022-05-30 21:50:04', '2022-05-30 21:50:04'),
(6, '01C', 'Coca cola', 'Coca cola 500ml', '15', 0, 1, '2022-05-30 21:50:04', '2022-05-30 21:50:04'),
(7, '01C', 'Coca cola', 'Coca cola 500ml', '15', 0, 1, '2022-05-30 21:50:04', '2022-05-30 21:50:04');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProduct`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
