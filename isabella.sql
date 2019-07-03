-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 01-07-2019 a las 05:45:46
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `isabella`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `allusers`
--

CREATE TABLE `allusers` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `avatar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `allusers`
--

INSERT INTO `allusers` (`id`, `user`, `name`, `country`, `email`, `password`, `avatar`) VALUES
(12, 'mati', 'mati gonzalez', 'ur', 'mati@gmail.com', '$2y$10$s6fl7roicaD5dYWeb1Sx9.lNvw7vmzC.B8NdZW578CsflQy8gRCyO', 'img_5d196ca4d1357.JPG'),
(13, 'luci', 'lucia la bella', 'pr', 'lucia@gmail.com', '$2y$10$vs0JZRh60HiI/p1aZB0iMu3ZwgPBV2407QLdk9RtGxh77U7qy.NQW', 'img_5d1970c93a7f9.JPG'),
(14, 'berta', 'bertita', 'br', 'berta@gmail.com', '$2y$10$9bbf0peLYbgktPtgYXYz1eimwRC1.VlsAtf3tll3HVxuI3OUmTv4K', 'img_5d1977f8c357e.JPG'),
(15, 'Atilio', 'atilio bebe', 'ar', 'atilio@hotmail.com', '$2y$10$n2hCW8yBDn7srjmowWZ7Z.GHFYs6DnL3ClMmhlYJY7FnNsEaBd6Rq', 'img_5d197a5b0bf66.JPG'),
(16, 'ale', 'ale gonza', 'ar', 'ale@gmail.com', '$2y$10$YjTh19s2lLTJ40DgW.8SluxSJTFAqH1rVDreEmFvlWYf.horaTXmu', 'img_5d197ab1aaeab.JPG'),
(20, 'mia', 'mia la bella', 'br', 'mia@gmail.com', '$2y$10$yWksuvwRHa2rcqHWdW3f3en.Z2vWF53UM48eGQW6dcpcMSMYheh5G', 'img_5d19800dc90b2.JPG'),
(21, 'tito', 'tito', 'ar', 'tito@gmail.com', '$2y$10$.84BFjeBYm2T.GR9HFK2wu00C79P442DNh8HhzWcmzo5K9IsI7t7W', 'img_5d1981b4d1536.JPG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `last_name` varchar(200) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `user_name`, `name`, `last_name`, `email`, `password`) VALUES
(7, 'mara', 'mara', 'mara', ',mara', 'maf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `allusers`
--
ALTER TABLE `allusers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `allusers`
--
ALTER TABLE `allusers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
