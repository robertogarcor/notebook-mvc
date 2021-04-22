-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-04-2021 a las 14:46:58
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `notebook`
--
CREATE DATABASE IF NOT EXISTS `notebook` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `notebook`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasks`
--

CREATE TABLE `tasks` (
  `id` int(11) NOT NULL,
  `name` varchar(512) COLLATE utf8_unicode_ci NOT NULL,
  `completed` tinyint(1) DEFAULT 0,
  `user_id` int(11) NOT NULL,
  `createat` datetime DEFAULT current_timestamp(),
  `updateat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `completed`, `user_id`, `createat`, `updateat`) VALUES
(1, 'Pintar a casa', 0, 1, '2021-04-22 14:46:14', '2021-04-22 14:46:14'),
(2, 'Anar a comprar', 1, 1, '2021-04-22 14:46:14', '2021-04-22 14:46:14'),
(3, 'Fer la feina de casa', 1, 2, '2021-04-22 14:46:14', '2021-04-22 14:46:14'),
(4, 'Trucar a Mark', 0, 1, '2021-04-22 14:46:14', '2021-04-22 14:46:14'),
(5, 'task 5', 1, 2, '2021-04-22 14:46:14', '2021-04-22 14:46:14'),
(6, 'task 6', 0, 2, '2021-04-22 14:46:14', '2021-04-22 14:46:14'),
(7, 'task 7', 1, 2, '2021-04-22 14:46:14', '2021-04-22 14:46:14'),
(8, 'task 8', 0, 1, '2021-04-22 14:46:14', '2021-04-22 14:46:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `surname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `createat` datetime DEFAULT current_timestamp(),
  `updateat` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
-- Encryted password 1234 -> hash 
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `firstname`, `surname`, `createat`, `updateat`) VALUES
(1, 'roberto', '$2y$12$uK6hAgnezcuKrvjOiEQM4ORV1F5CU7F4T5ORzgmScoYv0aj/um1Kq', 'roberto@email.com', 'Roberto', 'Garcia', '2021-04-22 14:46:13', '2021-04-22 14:46:13'),
(2, 'user2', '$2y$12$uK6hAgnezcuKrvjOiEQM4ORV1F5CU7F4T5ORzgmScoYv0aj/um1Kq', 'user2@email.com', 'User2', 'User2', '2021-04-22 14:46:13', '2021-04-22 14:46:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_userTask` (`user_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `FK_userTask` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
