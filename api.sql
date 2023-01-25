-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 25-01-2023 a las 20:41:42
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `passwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `admins`
--

INSERT INTO `admins` (`id`, `nombre`, `mail`, `passwd`) VALUES
(1, '', 'me', '$2y$10$lk/dSB1fNlCmSNWC/a4BL..4.60w.hNeaShHmgMnj1alUjYv//oVm'),
(2, 'Messi', 'messi@mail.com', '$2y$10$6v.eNon8E8XtyoVq58LeNe5XwqTb1vcmilU3JYC51x78YmNJEO4WW'),
(3, 'Amalio', 'amalio@mail.com', '$2y$10$ZA6OwOYSeXERm90go2.vd.s2DUZ/fVOumM8tKe/6NYgFNEfX8bzg2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imgs`
--

CREATE TABLE `imgs` (
  `id` int(11) NOT NULL,
  `width` int(20) NOT NULL,
  `height` int(20) NOT NULL,
  `ext` varchar(30) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imgs`
--

INSERT INTO `imgs` (`id`, `width`, `height`, `ext`, `imagen`, `tipo`) VALUES
(1, 200, 200, 'svg', 'https://api.dicebear.com/5.x/avataaars/svg', 'gratis'),
(2, 200, 200, 'svg', 'https://api.dicebear.com/5.x/adventurer/svg', 'gratis'),
(3, 200, 200, 'svg', 'https://api.dicebear.com/5.x/adventurer-neutral/svg', 'gratis'),
(4, 200, 200, 'svg', 'https://api.dicebear.com/5.x/avataaars-neutral/svg', 'gratis'),
(5, 200, 200, 'svg', 'https://api.dicebear.com/5.x/big-ears/svg', 'gratis'),
(6, 200, 200, 'svg', 'https://api.dicebear.com/5.x/big-ears-neutral/svg', 'gratis'),
(7, 200, 200, 'svg', 'https://api.dicebear.com/5.x/big-smile/svg', 'gratis'),
(8, 200, 200, 'svg', 'https://api.dicebear.com/5.x/bottts/svg', 'gratis'),
(9, 200, 200, 'svg', 'https://api.dicebear.com/5.x/bottts-neutral/svg', 'gratis'),
(10, 200, 200, 'svg', 'https://api.dicebear.com/5.x/croodles/svg', 'gratis'),
(11, 200, 200, 'svg', 'https://api.dicebear.com/5.x/croodles-neutral/svg', 'gratis'),
(12, 200, 200, 'svg', 'https://api.dicebear.com/5.x/fun-emoji/svg', 'gratis');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `passwd` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellidos`, `mail`, `passwd`) VALUES
(4, 'Amalio', 'Osman', 'amalio@mail.com', '$2y$10$UqjZ9tVB2tA8oG60t0Z51.Us59bcN.0nA93CIWCwc60lUzGl9HKoi'),
(5, 'Amalio', 'Osman', 'amalio2@mail.com', '$2y$10$xzExkHulXq51o8NSvBbBMOBkrH7gudjPh4C0V0iurf9ov7hLfvKru'),
(6, 'Roy', 'Meca', 'raymond@mail.com', '$2y$10$xfUKSWaweUqmMg9whXfSuugjwdB2fEiZWkEvZJKKC1mxODHrKT8ry');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `imgs`
--
ALTER TABLE `imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mail` (`mail`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imgs`
--
ALTER TABLE `imgs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
