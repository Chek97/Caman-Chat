-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-12-2021 a las 03:17:58
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `caman-chat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(50) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(50) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `last_name`, `user_id`) VALUES
(1, 'humera', 'lopez', 7),
(2, 'isa', 'nemo', 7),
(22, 'valen', 'caicedo', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conversation`
--

CREATE TABLE `conversation` (
  `id` int(11) NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `members` varchar(500) COLLATE utf8_bin NOT NULL,
  `last_message` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `messages_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `name` varchar(250) COLLATE utf8_bin NOT NULL,
  `created_at` date NOT NULL,
  `hour` time NOT NULL,
  `user_id` int(11) NOT NULL,
  `conversation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state`
--

CREATE TABLE `state` (
  `id` int(11) NOT NULL,
  `content` varchar(300) COLLATE utf8_bin NOT NULL,
  `created_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) COLLATE utf8_bin NOT NULL,
  `name` varchar(30) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(30) COLLATE utf8_bin NOT NULL,
  `status` varchar(100) COLLATE utf8_bin NOT NULL,
  `photo` varchar(255) COLLATE utf8_bin NOT NULL,
  `contacts` int(11) NOT NULL,
  `password` varchar(300) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `name`, `last_name`, `status`, `photo`, `contacts`, `password`) VALUES
(7, 'chek97', 'cristian', 'checa', '', '', 3, '$2y$10$bhhEXu0iZHpbkuQPE3wJve3Itu.bFA1NZcZyehgk/8eUkTMJcwyfq'),
(8, 'jhonnatan24', 'jhon23', 'garcia2', '', 'Plantilla-momo-se-tenia-que-decir-y-se-dijo.jpg', 1, '$2y$10$0/z4VjSGOgTi8C1xjRb9qOxptSQ6RRVFqu9s0tR.Taa.zZk4QJItu'),
(9, 'daniapra23', 'daniela', 'apraez', '', '', 0, '$2y$10$X16gBnPqefvjqcj3vlYWV.MjkXbvGPNMr/H9KqfGMvKvfvUtReLju'),
(10, 'valen2905', 'valentina', 'caicedo', '', '', 0, '$2y$10$Ty2rmyziWw2m.vpES/R2WuHgw.YxML2pfoOjkthfK8jHt7/CtjHfa'),
(11, 'isaOmen01', 'isabella', 'Omen', '', '', 0, '$2y$10$b17/QFqUhjhi6ggdAtgKNeHtZEAirj3CEfUsJmd45QG2f9SCAr9ju');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `conversation`
--
ALTER TABLE `conversation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `last_message` (`last_message`);

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `conversation_id` (`conversation_id`);

--
-- Indices de la tabla `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `conversation_id` (`conversation_id`);

--
-- Indices de la tabla `state`
--
ALTER TABLE `state`
  ADD KEY `user_id` (`user_id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `conversation`
--
ALTER TABLE `conversation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `members`
--
ALTER TABLE `members`
  ADD CONSTRAINT `members_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `members_ibfk_2` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`conversation_id`) REFERENCES `conversation` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `state`
--
ALTER TABLE `state`
  ADD CONSTRAINT `state_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
