-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-06-2023 a las 06:24:55
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `statdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exams`
--

CREATE TABLE `exams` (
  `idExam` varchar(36) NOT NULL DEFAULT uuid(),
  `year` int(11) DEFAULT NULL,
  `title` varchar(50) DEFAULT NULL,
  `subject` varchar(50) DEFAULT NULL,
  `professor` varchar(50) DEFAULT NULL,
  `pdf` varchar(50) DEFAULT NULL,
  `school` varchar(100) DEFAULT NULL,
  `idUser` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `exams`
--

INSERT INTO `exams` (`idExam`, `year`, `title`, `subject`, `professor`, `pdf`, `school`, `idUser`) VALUES
('4a6ec4e5-117d-11ee-9c16-346f24a6ec6c', 2023, 'Mi primer examen', 'Ingles', 'Fabian G', '64951d8f3a9f6.pdf', 'ESCOM', '15171435-117d-11ee-9c16-346f24a6ec6c');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUser` varchar(36) NOT NULL DEFAULT uuid(),
  `userName` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `role` bit(1) DEFAULT b'0',
  `active` bit(1) DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUser`, `userName`, `email`, `password`, `role`, `active`) VALUES
('15171435-117d-11ee-9c16-346f24a6ec6c', 'Vide', 'br.arizmendi.al@outlook.com', 'hola', b'0', b'1'),
('8bce91cf-117d-11ee-9c16-346f24a6ec6c', 'Prueba', 'prueba@gmail.com', 'hola', b'0', b'1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`idExam`),
  ADD KEY `idUser` (`idUser`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUser`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `users` (`idUser`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
