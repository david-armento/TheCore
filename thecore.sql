-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-10-2014 a las 18:54:07
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `trabajaparamibd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(250) NOT NULL,
  `user` varchar(250) NOT NULL,
  `pass` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `nombre`, `user`, `pass`) VALUES
(1, 'Administrador', 'trabajapm', '2df0fa9eb4ff07c9e9244a123a5fba62');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int(50) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `contacto` varchar(250) NOT NULL,
  `imagen` varchar(250) NOT NULL,
  `preferencias` text NOT NULL,
  `lugar_residencia` varchar(250) NOT NULL,
  `especialidad` varchar(250) NOT NULL,
  `region` varchar(250) NOT NULL COMMENT '(provincia?)',
  `premium` date NOT NULL,
  `cuenta_activa` int(1) NOT NULL DEFAULT '1' COMMENT '(0=No|1=Si)',
  `fecha_creacion` date NOT NULL,
  `fecha_modificacion` date NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `password`, `fecha_nacimiento`, `contacto`, `imagen`, `preferencias`, `lugar_residencia`, `especialidad`, `region`, `premium`, `cuenta_activa`, `fecha_creacion`, `fecha_modificacion`) VALUES
(1, 'Fernando', 'Llopis Tárraga', 'f.llopis@grupoanelis.com', 'bfc8e6140cd4474ad6a9133847100ef6', '1989-02-16', '', '', '', '', '', '', '0000-00-00', 1, '0000-00-00', '0000-00-00'),
(2, 'David', 'Armento', 'd.armento@grupoanelis.com', 'bfc8e6140cd4474ad6a9133847100ef6', '0000-00-00', '', '', '', '', '', '', '0000-00-00', 1, '0000-00-00', '0000-00-00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
