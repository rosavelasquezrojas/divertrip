-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2015 a las 06:48:49
-- Versión del servidor: 5.6.21-log
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `divertrip`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `idAdministrador` int(11) NOT NULL,
  `last_access` datetime NOT NULL,
  `Login_user_name` varchar(10) NOT NULL,
  `Login_password` varchar(10) NOT NULL,
  PRIMARY KEY (`idAdministrador`),
  KEY `fk_Administrador_Login1_idx` (`Login_user_name`,`Login_password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
  `idDireccion` int(11) NOT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idDireccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `idEstado` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` int(11) NOT NULL,
  `name_event` varchar(45) DEFAULT NULL,
  `description_event` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `hour` time DEFAULT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  `Direccion_idDireccion` int(11) NOT NULL,
  `Patrocinador_idPatrocinador` int(11) NOT NULL,
  `image` text,
  PRIMARY KEY (`idEvento`),
  KEY `fk_Eventos_Categoria1_idx` (`Categoria_idCategoria`),
  KEY `fk_Eventos_Direccion1_idx` (`Direccion_idDireccion`),
  KEY `fk_Eventos_Patrocinador1_idx` (`Patrocinador_idPatrocinador`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `filtro_usuario`
--

CREATE TABLE IF NOT EXISTS `filtro_usuario` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Categoria_idCategoria` int(11) NOT NULL,
  PRIMARY KEY (`Categoria_idCategoria`,`Usuario_idUsuario`),
  KEY `fk_Filto_Usuario_Usuario1_idx` (`Usuario_idUsuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ha_logins`
--

CREATE TABLE IF NOT EXISTS `ha_logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userId` int(11) NOT NULL,
  `loginProvider` varchar(50) NOT NULL,
  `loginProviderIdentifier` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `loginProvider_2` (`loginProvider`,`loginProviderIdentifier`),
  KEY `loginProvider` (`loginProvider`),
  KEY `loginProviderIdentifier` (`loginProviderIdentifier`),
  KEY `userId` (`userId`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `user_name` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`user_name`,`password`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar_emblematico`
--

CREATE TABLE IF NOT EXISTS `lugar_emblematico` (
  `idLugar_Emblematico` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  `image` blob,
  `Direccion_idDireccion` int(11) NOT NULL,
  PRIMARY KEY (`idLugar_Emblematico`),
  KEY `fk_Lugar_Emblematico_Direccion1_idx` (`Direccion_idDireccion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinador`
--

CREATE TABLE IF NOT EXISTS `patrocinador` (
  `idPatrocinador` int(11) NOT NULL,
  `first_name` varchar(12) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `Login_user_name` varchar(10) NOT NULL,
  `Login_password` varchar(10) NOT NULL,
  `Estado_idEstado` int(11) NOT NULL,
  PRIMARY KEY (`idPatrocinador`,`Estado_idEstado`),
  KEY `fk_Patrocinador_Login_idx` (`Login_user_name`,`Login_password`),
  KEY `fk_Patrocinador_Estado1_idx` (`Estado_idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencia`
--

CREATE TABLE IF NOT EXISTS `preferencia` (
  `idPreferencia` int(11) NOT NULL,
  `language` varchar(45) DEFAULT NULL,
  `notification` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPreferencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL,
  `first_name` varchar(12) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `latitud` varchar(45) DEFAULT NULL,
  `longitud` varchar(45) DEFAULT NULL,
  `Login_user_name` varchar(10) NOT NULL,
  `Login_password` varchar(10) NOT NULL,
  `Preferencia_idPreferencia` int(11) NOT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `fk_Turista_Login1_idx` (`Login_user_name`,`Login_password`),
  KEY `fk_Turista_Preferencia1_idx` (`Preferencia_idPreferencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_busca_lugar`
--

CREATE TABLE IF NOT EXISTS `usuario_busca_lugar` (
  `Usuario_idUsuario` int(11) NOT NULL,
  `Lugar_Emblematico_idLugar_Emblematico` int(11) NOT NULL,
  KEY `fk_Usuario_busca_lugar_Usuario1_idx` (`Usuario_idUsuario`),
  KEY `fk_Usuario_busca_lugar_Lugar_Emblematico1_idx` (`Lugar_Emblematico_idLugar_Emblematico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `fk_Administrador_Login1` FOREIGN KEY (`Login_user_name`, `Login_password`) REFERENCES `login` (`user_name`, `password`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_Eventos_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Eventos_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Eventos_Patrocinador1` FOREIGN KEY (`Patrocinador_idPatrocinador`) REFERENCES `patrocinador` (`idPatrocinador`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `filtro_usuario`
--
ALTER TABLE `filtro_usuario`
  ADD CONSTRAINT `fk_Filto_Usuario_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Filto_Usuario_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `lugar_emblematico`
--
ALTER TABLE `lugar_emblematico`
  ADD CONSTRAINT `fk_Lugar_Emblematico_Direccion1` FOREIGN KEY (`Direccion_idDireccion`) REFERENCES `direccion` (`idDireccion`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `patrocinador`
--
ALTER TABLE `patrocinador`
  ADD CONSTRAINT `fk_Patrocinador_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Patrocinador_Login` FOREIGN KEY (`Login_user_name`, `Login_password`) REFERENCES `login` (`user_name`, `password`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Turista_Login1` FOREIGN KEY (`Login_user_name`, `Login_password`) REFERENCES `login` (`user_name`, `password`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Turista_Preferencia1` FOREIGN KEY (`Preferencia_idPreferencia`) REFERENCES `preferencia` (`idPreferencia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `usuario_busca_lugar`
--
ALTER TABLE `usuario_busca_lugar`
  ADD CONSTRAINT `fk_Usuario_busca_lugar_Lugar_Emblematico1` FOREIGN KEY (`Lugar_Emblematico_idLugar_Emblematico`) REFERENCES `lugar_emblematico` (`idLugar_Emblematico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Usuario_busca_lugar_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
