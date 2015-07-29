-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-04-2015 a las 02:08:00
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `db_montero_puntuacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `di_calificacion`
--

CREATE TABLE IF NOT EXISTS `di_calificacion` (
  `idCalificacion` int(11) NOT NULL AUTO_INCREMENT,
  `valor` int(2) NOT NULL,
  `di_Empresa_idEmpresa` int(11) NOT NULL,
  PRIMARY KEY (`idCalificacion`),
  UNIQUE KEY `idCalificacion_UNIQUE` (`idCalificacion`),
  KEY `fk_di_Calificacion_di_Empresa_idx` (`di_Empresa_idEmpresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `di_calificacion`
--

INSERT INTO `di_calificacion` (`idCalificacion`, `valor`, `di_Empresa_idEmpresa`) VALUES
(1, 9, 5),
(2, 3, 6),
(3, 1, 7),
(4, 7, 5),
(5, 7, 5),
(6, 3, 8),
(7, 1, 5),
(8, 10, 5),
(9, 2, 5),
(10, 3, 5),
(11, 4, 5),
(12, 5, 5),
(13, 6, 5),
(14, 8, 5),
(15, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `di_categoria`
--

CREATE TABLE IF NOT EXISTS `di_categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(45) NOT NULL,
  PRIMARY KEY (`idCategoria`),
  UNIQUE KEY `tipo_UNIQUE` (`tipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=68 ;

--
-- Volcado de datos para la tabla `di_categoria`
--

INSERT INTO `di_categoria` (`idCategoria`, `tipo`) VALUES
(5, 'Agua'),
(6, 'Alimentos'),
(7, 'Arriendos'),
(1, 'Aseo'),
(4, 'Banco'),
(8, 'Carrier'),
(9, 'Casa Comercial'),
(10, 'Cementerios'),
(11, 'Cobranza'),
(2, 'Colegio'),
(17, 'Concesionaria'),
(13, 'Luz'),
(14, 'Salud'),
(39, 'Sanitario'),
(15, 'Seguros'),
(12, 'Telefonia'),
(16, 'Transporte'),
(3, 'Universidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `di_empresa`
--

CREATE TABLE IF NOT EXISTS `di_empresa` (
  `idEmpresa` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(45) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`idEmpresa`),
  UNIQUE KEY `idEmpresa_UNIQUE` (`idEmpresa`),
  KEY `fk_di_Empresa_Categoria1_idx` (`Categoria_idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Volcado de datos para la tabla `di_empresa`
--

INSERT INTO `di_empresa` (`idEmpresa`, `nombre_empresa`, `Categoria_idCategoria`) VALUES
(5, 'USS', 3),
(6, 'ASEOMAX', 1),
(7, 'COLEGIO ESTUDIOS BASICOS', 2),
(8, 'USARA', 1),
(36, 'GOOGLE', 7),
(37, 'GOOGLE', 9),
(38, 'COLEGIO PEDRO DE VALDIVIA', 2);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `di_calificacion`
--
ALTER TABLE `di_calificacion`
  ADD CONSTRAINT `fk_di_Calificacion_di_Empresa` FOREIGN KEY (`di_Empresa_idEmpresa`) REFERENCES `di_empresa` (`idEmpresa`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `di_empresa`
--
ALTER TABLE `di_empresa`
  ADD CONSTRAINT `fk_di_Empresa_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `di_categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
