-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2015 a las 11:59:03
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
  `idAdministrador` int(11) NOT NULL AUTO_INCREMENT,
  `last_access` datetime NOT NULL,
  `Login_user_name` varchar(10) NOT NULL,
  `Login_password` varchar(10) NOT NULL,
  PRIMARY KEY (`idAdministrador`),
  KEY `fk_Administrador_Login1_idx` (`Login_user_name`,`Login_password`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`idAdministrador`, `last_access`, `Login_user_name`, `Login_password`) VALUES
(1, '2015-11-28 00:00:00', 'admin', 'secret');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE IF NOT EXISTS `categoria` (
  `idCategoria` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idCategoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `name`, `description`) VALUES
(1, 'Arte', NULL),
(2, 'Musica', NULL),
(3, 'Charlas', NULL),
(4, 'Talleres', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE IF NOT EXISTS `estado` (
  `idEstado` int(11) NOT NULL,
  `description` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idEstado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`idEstado`, `description`) VALUES
(1, 'Activado'),
(2, 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE IF NOT EXISTS `evento` (
  `idEvento` int(11) NOT NULL AUTO_INCREMENT,
  `name_event` varchar(45) DEFAULT NULL,
  `description_event` varchar(45) DEFAULT NULL,
  `start_event` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Categoria_idCategoria` int(11) NOT NULL,
  `Patrocinador_idPatrocinador` int(11) NOT NULL,
  `image` text,
  `address` varchar(100) NOT NULL,
  `latitude` mediumtext NOT NULL,
  `longitude` mediumtext NOT NULL,
  PRIMARY KEY (`idEvento`),
  KEY `fk_Eventos_Categoria1_idx` (`Categoria_idCategoria`),
  KEY `fk_Eventos_Patrocinador1_idx` (`Patrocinador_idPatrocinador`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idEvento`, `name_event`, `description_event`, `start_event`, `Categoria_idCategoria`, `Patrocinador_idPatrocinador`, `image`, `address`, `latitude`, `longitude`) VALUES
(3, 'Miguel sin poto', 'como vivir sin poto en el ambiente laboral', '2015-11-20 16:50:41', 3, 1, NULL, 'Mar del Sur 79, Viña del Mar, Chile', '-33.0002351', '-71.4941655'),
(4, 'PRUEBA  1', 'AASDASJ', '2015-11-21 15:37:35', 1, 1, NULL, 'Las Condes, Chile', '-33.4087844', '-70.567069'),
(5, 'asd', 'sasd', '2015-11-21 17:50:03', 1, 1, 'nada', 'Valparaíso, Chile', '-33.047238', '-71.6126885'),
(6, '1', '1', '2015-11-21 18:08:02', 1, 1, NULL, 'Rodelillo, Valparaíso, Chile', '-33.0571386', '-71.5768301'),
(7, '1', '1', '2015-11-21 18:38:47', 1, 1, 'dasdas', 'Las Cañas, Valparaíso, Chile', '-33.0533945', '-71.6077676'),
(8, '1', '111', '2015-11-21 21:02:46', 1, 1, NULL, 'Santiago, Chile', '-33.4378305', '-70.6504492'),
(9, '1', '111', '2015-11-21 21:03:34', 1, 1, NULL, 'Santiago, Chile', '-33.4378305', '-70.6504492'),
(10, 'Miguelito', 'BOonito', '2015-01-01 03:04:00', 1, 1, 'tuki tuki', 'Las Vegas, Nevada, Estados Unidos', '36.1699412', '-115.1398296'),
(11, 'Miguel', 'bonito binito', '2015-01-01 10:10:00', 1, 1, 'dsadas', 'Mar del Sur 79, Viña del Mar, Chile', '-33.0002351', '-71.4941655'),
(13, 'Miguelito bonito', 'pequeño bebe', '2016-01-01 16:10:00', 1, 2, NULL, 'Nariz del Diablo - 40, Boquerón - Cundinamarca, Colombia', '4.2649273', '-74.5523697'),
(14, 'das', 'sa', '2015-01-01 03:01:00', 2, 2, 'dsad', 'Las Condes, Chile', '-33.4087844', '-70.567069'),
(15, 'RositaNegrita', 'as', '2015-01-01 03:02:00', 2, 2, NULL, 'DAS DA THEATER gGmbH, Liebigstraße, Aquisgrán, Alemania', '50.7899297', '6.1126945999999'),
(16, '1', 'sqa', '2016-02-01 03:01:00', 1, 2, NULL, 'Las Condes, Chile', '-33.4087844', '-70.567069'),
(17, '1', '1', '2015-01-01 03:01:00', 1, 2, NULL, 'Karnataka, India', '15.3172775', '75.7138884'),
(18, 'dasd', 'asddas', '2015-01-01 05:01:00', 1, 2, NULL, 'Las Vegas, Nevada, Estados Unidos', '36.1699412', '-115.1398296'),
(19, 'dsa', 'da', '2015-01-01 03:01:00', 1, 2, NULL, 'Las Condes, Chile', '-33.4087844', '-70.567069'),
(20, '1', '1', '2016-02-01 04:01:00', 2, 2, NULL, '15 Norte, Viña del Mar, Chile', '-33.0088948', '-71.5431199'),
(21, 'Jsjs', 'Jsjs', '2015-11-22 17:24:00', 2, 2, NULL, 'Vakko, Vitacura, Chile', '-33.401654', '-70.5951558'),
(22, 'rosa', 'das', '2015-01-01 04:01:00', 3, 2, NULL, 'Llasmary, Santiago, Chile', '-33.4483708', '-70.6682921'),
(23, 'dasdas', 'dsada', '2015-03-02 04:01:00', 2, 2, 'jjhdd', 'Las Condes, Chile', '-33.4087844', '-70.567069'),
(24, 'sdfsdaf', 'dsadas', '2015-11-23 00:49:14', 1, 2, 'dsadasd', 'Argentina', '-38.416097', '-63.616672'),
(25, 'dsadas', 'dsadsa', '2015-01-02 04:01:00', 3, 2, 'dasd', 'dsada - Rua Ângelo - Vila Nossa Senhora de Fatima, Estado de São Paulo, Brasil', '-23.4591401', '-46.5109651'),
(26, 'fsd', 'asfsd', '2017-01-01 04:00:00', 3, 2, 'fsdf', 'sdfsdfsdfdf, Yaramalliahna Hunasehalli, Karnataka, India', '13.4043304', '77.9495376'),
(27, 'lala', 'xD', '2015-11-21 10:52:00', 1, 2, NULL, 'Las Cabras, Chile', '-34.1574645', '-71.3349322'),
(28, 'dasdas', 'dasds', '2018-01-02 22:40:00', 3, 2, '', 'Las Condes, Chile', '-33.4087844', '-70.567069'),
(29, 'Prueba1', 'Prueba', '2015-11-24 07:37:00', 1, 2, 'No hay', 'Gran Bretaña, Valparaíso, Chile', '-33.0300633', '-71.6346352'),
(30, 'Prueba 2', 'Jjaj', '2015-11-24 12:40:00', 2, 2, 'No hay', 'Gran Bretaña, Valparaíso, Chile', '-33.0300633', '-71.6346352'),
(31, 'Tengo tuto', 'Sueñito', '2015-11-23 12:00:00', 3, 1, 'No hay', 'General Cruz, Valparaíso, Chile', '-33.0472164', '-71.6133746'),
(32, 'Prueba 1', 'prueba1', '2017-02-03 04:02:00', 1, 1, 'no hay', 'General Cruz, Valparaíso, Chile', '-33.0472164', '-71.6133746');

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

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`user_name`, `password`) VALUES
('admin', 'secret'),
('pat1', 'secret1'),
('pat2', 'secret1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugar_emblematico`
--

CREATE TABLE IF NOT EXISTS `lugar_emblematico` (
  `idLugar_Emblematico` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `description` varchar(1000) DEFAULT NULL,
  `latitude` mediumtext NOT NULL,
  `longitude` mediumtext NOT NULL,
  PRIMARY KEY (`idLugar_Emblematico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `lugar_emblematico`
--

INSERT INTO `lugar_emblematico` (`idLugar_Emblematico`, `nombre`, `description`, `latitude`, `longitude`) VALUES
(1, 'Monumento Prat', 'El Monumento a los Héroes de Iquique, llamado inicialmente Monumento a la Marina Nacional, está ubicado en el centro de la Plaza Sotomayor, entre el Muelle Prat y el edificio de la Comandancia en Jefe de la Armada, en la ciudad de Valparaíso, Chile. Este monumento fue erigido por colecta popular en memoria de los héroes navales que combatieron en los combates de Iquique y Punta Gruesa el 21 de mayo de 1879. Fue inaugurado el 21 de mayo de 1886.', '-33.038349', '-71.628402'),
(2, 'Museo Marítimo Nacional', 'El Museo Marítimo Nacional está ubicado en el edificio de la ex Escuela Naval, en el cerro Artillería de Valparaíso, Chile. Se considera el 30 de abril de 1915 como la fecha de su creación pues fue cuando se inició la actividad museística en la Armada. Está destinado a resguardar, conservar y difundir hacia la comunidad el patrimonio histórico naval y marítimo de Chile.', '-33.032127', '-71.631190'),
(3, 'Paseo Gervasoni', 'Ubicado en el Cerro Concepción, su acceso es desde Calle Papudo hasta Pasaje Templeman,  por Calle Prat, subiendo por  el ascensor Concepción. Emplazado  en lo que fueron durante la Colonia los terrenos del Fuerte Concepción, destinado a la defensa de la bahía contra las incursiones piratas, y del que nunca se disparó un sólo tiro.', '-33.041266', '-71.626679'),
(4, 'Paseo Atquinson', 'En el Cerro Concepción se encuentra este mirador.  Desde él es posible contemplar todo el borde costero, los cerros y el plan de la ciudad.  Una de sus características es encontrarse permanentemente con turistas y visitantes que llegan al lugar para apreciar la hermosa vista de Valparaíso junto a su movimiento Portuario.', '-33.042273', '-71.621219'),
(5, 'Museo de Historia Natural', 'Teléfono:  (32) 2544840|/|Horario: Martes a sábado 10:00 a 18:00 hrs | Domingo 10:00 a 14:00 hrs|/|Costo: Entrada liberada|/|Servicios: Visitas guiadas | Material didáctico | Biblioteca | Sala de lectura | Cafetería|/|Contacto: www.mhnv.cl''.', '-33.046370', '-71.621219'),
(6, 'Ascensor Artillería', 'Es el ascensor más panorámico de la ciudad. Su estación baja se ubica frente a la Plaza Wheelwright, a un costado del Edificio de la Aduana. Su estación superior se ubica en el Paseo 21 de Mayo, frente a la ex Escuela Naval, actualmente Museo Marítimo Nacional.', '-33.033863', '-71.630002'),
(7, 'Paseo Yugolasvo', 'Situado en el cerro Alegre, sobre calle Prat, es accesible por el ascensor El Peral o por calle Urriola. Se conecta con el cerro Concepción por medio de la calle Montealegre. En él está el Palacio Baburizza, actualmente destinado al Museo de Bellas Artes de Valparaíso. Es uno de los primeros lugares del cerro Alegre y del cerro Concepción que es convertido en mirador.  La calle Montealegre, por allá en 1840, es una de las primeras que empieza a recibir edificaciones de la época, todas de un piso.', '-33.040161', '-71.628824'),
(8, 'Ascensor Polanco', 'El Ascensor Polanco es uno de los más especiales ascensores de Valparaíso, Chile. Es el único ascensor de los 15 de la ciudad que se mueve verticalmente, mientras el resto son de tipo funicular, pero son conocidos popularmente como ascensores. Dentro de las particularidades de este ascensor, se tiene que su entrada baja es la boca de un túnel de 150 m de largo que conecta el único carro (originalmente eran dos carros) que asciende verticalmente 60 m, dentro del interior del cerro y luego por una torre que ofrece una vista espectacular de la ciudad. La torre se conecta con el cerro a través de un puente de 48 m de largo.', '-33.050917', '-71.600727'),
(9, 'Ascensor Reina Victoria', 'El ascensor Reina Victoria, ubicado en el cerro Alegre, es uno de los 16 que existen en la ciudad de Valparaíso, Chile Se construyó en 1902 y se inauguró en 1903. Fue declarado Monumento Histórico, del 1 de septiembre de 1998.', '-33.0441033', '-71.6263453'),
(10, 'Ascensor Barón', 'El Ascensor Barón posee un gran valor urbano al relacionar el plan con uno de los paseos miradores de mayor interés turístico en el sector oriente del anfiteatro. Este mirador históricamente formaba parte del primitivo camino a Quillota, que unía a Valparaíso con la Hacienda de las Siete Hermanas. Se ubica entre los 5 y los 35 metros sobre el nivel del mar. Tiene un largo de rieles de 75 m y un trayecto de 35 segundos.', '-33.04283', '-71.60403'),
(11, 'Ascensor Van Buren', 'El ascensor Van Buren fue inaugurado en el año 1929, con el objetivo de trasladar pacientes y funcionarios dentro del hospital Este funicular reemplazó a uno anterior, que se destruyó con el terremoto de Valparaíso de 1906.', '-33.051472', '-71.610185'),
(12, 'Ascensor Concepción', 'El ascensor fue inaugurado el 1 de septiembre de 1883, siendo controlado por la Compañía de Ascensores Mecánicos de Valparaíso.  Este es uno de los ascensores que sigue en permanente funcionamiento, ya que conecta la calle Prat con el sector del paseo Gervasoni, que es uno de los principales miradores a la bahía de Valparaíso. En 1998, el Consejo de Monumentos Nacionales declaró al ascensor como monumento nacional.', '-33.040868', '-71.626371'),
(13, 'Ascensor El Peral', 'Fue inaugurado el 7 de diciembre de 1901, siendo sus iniciadores y ejecutores principales Fernando Edwards y Juan Naylor. El primer propietario del ascensor fue la Sociedad Ascensor Cerro Alegre, pasando años después definitivamente a manos de la Municipalidad de Valparaíso. Este ascensor fue el primero de la ciudad en contar con un motor a vapor.', '-33.0398397', '-71.6302477'),
(14, 'Ascensor San Agustín', 'El ascensor fue inaugurado en el año 1913 como un complemento al servicio que prestaba el ascensor Cordillera en el muy poblado Cerro Cordillera. Estaba programado que las obras de restauración de este ascensor culminaran en marzo de 2012, pero tras anunciar que se entregarían en junio del mismo año,5 finalmente se terminaron en septiembre. El 23 de septiembre de 2012 se reinauguró el ascensor San Agustín con la presencia de Sebastián Piñera, Presidente de Chile.', '-33.0405977', '-71.6320762'),
(15, 'Paseo 21 de Mayo', 'Ubicado en el Cerro Playa Ancha, su acceso es a través del Ascensor Artillería y Plazuela Aduana, pero también se puede llegar por las Calles Carampangue o Taqueadero. Fue construido a comienzos de siglo, convirtiéndose en un centro de la vida social del Cerro de Playa Ancha.', '-33.0322883', '-71.6308042'),
(16, 'Casita Miguel', 'bonito', '-33.0002205', '-71.4963397');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `patrocinador`
--

CREATE TABLE IF NOT EXISTS `patrocinador` (
  `idPatrocinador` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(12) DEFAULT NULL,
  `last_name` varchar(45) DEFAULT NULL,
  `Login_user_name` varchar(10) NOT NULL,
  `Login_password` varchar(10) NOT NULL,
  `Estado_idEstado` int(11) NOT NULL,
  PRIMARY KEY (`idPatrocinador`,`Estado_idEstado`),
  KEY `fk_Patrocinador_Login_idx` (`Login_user_name`,`Login_password`),
  KEY `fk_Patrocinador_Estado1_idx` (`Estado_idEstado`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `patrocinador`
--

INSERT INTO `patrocinador` (`idPatrocinador`, `first_name`, `last_name`, `Login_user_name`, `Login_password`, `Estado_idEstado`) VALUES
(1, 'Patrocinador', 'pat1', 'admin', 'secret', 2),
(2, 'Pat 2', NULL, 'pat1', 'secret1', 1),
(3, 'Pat 2', NULL, 'pat1', 'secret1', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preferencia`
--

CREATE TABLE IF NOT EXISTS `preferencia` (
  `idPreferencia` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(45) DEFAULT NULL,
  `notification` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`idPreferencia`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  ADD CONSTRAINT `fk_Administrador_Login1` FOREIGN KEY (`Login_user_name`, `Login_password`) REFERENCES `login` (`user_name`, `password`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_Eventos_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Eventos_Patrocinador1` FOREIGN KEY (`Patrocinador_idPatrocinador`) REFERENCES `patrocinador` (`idPatrocinador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `filtro_usuario`
--
ALTER TABLE `filtro_usuario`
  ADD CONSTRAINT `fk_Filto_Usuario_Categoria1` FOREIGN KEY (`Categoria_idCategoria`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Filto_Usuario_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `patrocinador`
--
ALTER TABLE `patrocinador`
  ADD CONSTRAINT `fk_Patrocinador_Estado1` FOREIGN KEY (`Estado_idEstado`) REFERENCES `estado` (`idEstado`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Patrocinador_Login` FOREIGN KEY (`Login_user_name`, `Login_password`) REFERENCES `login` (`user_name`, `password`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Turista_Login1` FOREIGN KEY (`Login_user_name`, `Login_password`) REFERENCES `login` (`user_name`, `password`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Turista_Preferencia1` FOREIGN KEY (`Preferencia_idPreferencia`) REFERENCES `preferencia` (`idPreferencia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario_busca_lugar`
--
ALTER TABLE `usuario_busca_lugar`
  ADD CONSTRAINT `fk_Usuario_busca_lugar_Lugar_Emblematico1` FOREIGN KEY (`Lugar_Emblematico_idLugar_Emblematico`) REFERENCES `lugar_emblematico` (`idLugar_Emblematico`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_Usuario_busca_lugar_Usuario1` FOREIGN KEY (`Usuario_idUsuario`) REFERENCES `usuario` (`idUsuario`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
