-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-07-2026 a las 12:59:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sesion`
--
CREATE DATABASE IF NOT EXISTS `sesion` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sesion`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logueo`
--

CREATE TABLE `logueo` (
  `usu` varchar(50) NOT NULL,
  `pass` varchar(150) NOT NULL,
  `rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `logueo`
--

INSERT INTO `logueo` (`usu`, `pass`, `rol`) VALUES
('admin', '$2y$10$8r7OMVnBvMFWlx/ApMJtIOqo/pnxy9HnPM4mme/Y7c9QJEj8Yl28q', 'administrador'),
('mod', '$2y$10$wern5IIagiF/mdlVa3r57uJ2fZzUmKM8P6kKYs9reJO8b063XAizS', 'moderador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `logueo`
--
ALTER TABLE `logueo`
  ADD PRIMARY KEY (`usu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
