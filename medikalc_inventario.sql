-- phpMyAdmin SQL Dump
-- version 4.1.8
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 04-05-2014 a las 22:05:37
-- Versión del servidor: 5.5.32-cll-lve
-- Versión de PHP: 5.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `medikalc_inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bas_categorias`
--

CREATE TABLE IF NOT EXISTS `bas_categorias` (
  `ID` tinyint(4) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `bas_categorias`
--

INSERT INTO `bas_categorias` (`ID`, `Nombre`) VALUES
(1, 'CELULARES'),
(2, 'CARGADOR'),
(3, 'MATE'),
(4, 'PROTECTORES'),
(5, 'REPUESTOS'),
(6, 'CARCAZAS'),
(7, 'TABLET'),
(8, 'TECLADO TABLET'),
(9, 'DIADEMAS'),
(10, 'MEMORIAS'),
(11, 'CABLES'),
(12, 'ESTUCHES'),
(13, 'MANOS LIBRES'),
(14, 'varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bas_marcas`
--

CREATE TABLE IF NOT EXISTS `bas_marcas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `bas_marcas`
--

INSERT INTO `bas_marcas` (`ID`, `Nombre`) VALUES
(1, 'NOKIA'),
(2, 'SAMSUNG'),
(3, 'APPLE'),
(4, 'MOTOROLA'),
(5, 'BLACKBERRY'),
(6, 'ALCATEL'),
(7, 'ZTE'),
(8, 'IPHONE'),
(9, 'HUAWEI'),
(10, 'AVVIO'),
(11, 'ALCATEL'),
(12, 'LG'),
(13, 'SONY ERICCSON'),
(14, 'varios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bas_parametrossistema`
--

CREATE TABLE IF NOT EXISTS `bas_parametrossistema` (
  `ID` int(11) NOT NULL,
  `NombreEmpresa` varchar(200) NOT NULL,
  `Imagen` varchar(200) NOT NULL,
  `PieDePaginaCorreo` text NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bas_parametrossistema`
--

INSERT INTO `bas_parametrossistema` (`ID`, `NombreEmpresa`, `Imagen`, `PieDePaginaCorreo`) VALUES
(1, 'Telemovilcel Inventario', '22f2d-descarga.jpg', '<p>\n	<span style="font-size:16px;"><em><strong>Este es una texto de prueba de pie de pagina.</strong></em></span></p>\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bas_vitrinas`
--

CREATE TABLE IF NOT EXISTS `bas_vitrinas` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(200) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `bas_vitrinas`
--

INSERT INTO `bas_vitrinas` (`ID`, `Nombre`) VALUES
(1, 'VITRINA 1'),
(2, 'VITRINA 2'),
(3, 'VITRINA 3'),
(4, 'VITRINA 4');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `correspondencia_listar`
--
CREATE TABLE IF NOT EXISTS `correspondencia_listar` (
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `destinos`
--
CREATE TABLE IF NOT EXISTS `destinos` (
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mercancias`
--

CREATE TABLE IF NOT EXISTS `mercancias` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Nombre` varchar(200) NOT NULL,
  `Foto` varchar(200) NOT NULL,
  `Referencia` varchar(200) NOT NULL,
  `IDMarca` int(11) NOT NULL,
  `IDCategoria` int(11) NOT NULL,
  `IDVitrina` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `VentasUltimaSemana` int(11) NOT NULL,
  `FechaUltimoArqueo` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `mercancias`
--

INSERT INTO `mercancias` (`ID`, `Fecha`, `Nombre`, `Foto`, `Referencia`, `IDMarca`, `IDCategoria`, `IDVitrina`, `Cantidad`, `VentasUltimaSemana`, `FechaUltimoArqueo`) VALUES
(4, '2014-05-05 02:07:10', 'Ac', '2aeb6-1399228096198.jpg', 'v8', 5, 2, 1, 0, 1, '2014-05-05 02:07:10'),
(2, '2014-05-04 19:06:25', 'Ac', 'bf371-descarga-(1).jpg', '6101', 1, 2, 1, 12, 0, '2014-05-04 19:06:25'),
(3, '2014-05-04 19:05:45', 'Ac', 'a134c-1399230120542.jpg', 'f250', 2, 2, 1, 7, 0, '2014-05-04 19:05:45'),
(6, '2014-05-04 19:26:05', 'Ac', '49a16-1399231271391.jpg', 'w300', 13, 2, 1, 4, 0, NULL),
(7, '2014-05-04 19:54:05', 'Ac', '07fa9-1399232561159.jpg', 'MG 160', 12, 2, 1, 7, 0, NULL),
(8, '2014-05-04 19:58:59', 'Ac', 'ae623-1399233262591.jpg', '1100', 1, 2, 1, 4, 0, '2014-05-04 19:58:59'),
(9, '2014-05-04 20:06:23', 'Ac', '9f7aa-1399233690869.jpg', 'v3', 4, 2, 1, 3, 0, NULL),
(14, '2014-05-04 23:39:31', 'Ac ', '', 'pluying v8', 5, 2, 1, 5, 0, NULL),
(11, '2014-05-04 20:30:13', 'Ac', '53845-1399235184303.jpg', 'iphon 4', 8, 2, 1, 3, 0, NULL),
(12, '2014-05-04 21:48:37', 'Ac', '22fa6-1399239893590.jpg', 'iphon 5', 8, 2, 1, 1, 0, NULL),
(13, '2014-05-04 21:55:55', 'Ac', '7ba66-1399240350608.jpg', 'bahia', 14, 2, 1, 4, 0, NULL),
(16, '2014-05-05 02:09:50', 'Ac', '', 'tablet', 14, 2, 1, 3, 0, NULL),
(18, '2014-05-05 02:40:51', 'Ac', '', 'pluying', 5, 2, 0, 5, 0, NULL),
(19, '2014-05-05 02:53:16', 'Ac', '', 'v8 original', 5, 2, 0, 2, 0, NULL);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `origenes`
--
CREATE TABLE IF NOT EXISTS `origenes` (
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Documento` varchar(20) NOT NULL,
  `Nombre` varchar(200) NOT NULL,
  `Foto` varchar(200) NOT NULL DEFAULT 'nofoto.jpg',
  `Password` varchar(45) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `Documento_UNIQUE` (`Documento`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Documento`, `Nombre`, `Foto`, `Password`) VALUES
(1, '1069733998', 'FELIPE', '77e99-1525456_10201970835127201_593210437_n.jpg', 'jelipe'),
(7, '11259974', 'CRISTIAN CAMILO HERNANDEZ', '272d0-182403_10151442081277707_702164027_n.jpg', '11259974'),
(6, '1069733999', 'USUARIO DE PRUEBAS', '03098-descarga.jpg', '1069733999');

-- --------------------------------------------------------

--
-- Estructura para la vista `correspondencia_listar`
--
DROP TABLE IF EXISTS `correspondencia_listar`;

CREATE ALGORITHM=UNDEFINED DEFINER=`medikalc`@`localhost` SQL SECURITY DEFINER VIEW `correspondencia_listar` AS select `a`.`ID` AS `ID`,`a`.`Fecha` AS `Fecha`,`a`.`Asunto` AS `Asunto`,`a`.`Folios` AS `Folios`,`a`.`FolioDigital` AS `FolioDigital`,`b`.`FuncionariosID` AS `FuncionariosIDOrigen`,`b`.`FuncionariosDocumento` AS `FuncionariosDocumentoOrigen`,`b`.`FuncionariosNombre` AS `FuncionariosNombreOrigen`,`c`.`FuncionariosID` AS `FuncionariosIDDestino`,`c`.`FuncionariosDocumento` AS `FuncionariosDocumentoDestino`,`c`.`FuncionariosNombre` AS `FuncionariosNombreDestino`,`d`.`ID` AS `Bas_tiposcorrespondenciaID`,`d`.`Nombre` AS `Bas_tiposcorrespondenciaNombre`,`e`.`ID` AS `Bas_tiposdocumentoID`,`e`.`Nombre` AS `Bas_tiposdocumentoNombre` from ((((`correspondencias` `a` join `origenes` `b`) join `destinos` `c`) join `bas_tiposcorrespondencia` `d`) join `bas_tiposdocumentos` `e`) where ((`a`.`IDFuncionariosOrigen` = `b`.`FuncionariosID`) and (`a`.`IDFuncionariosDestino` = `c`.`FuncionariosID`) and (`a`.`IDBas_tiposcorrespondencia` = `d`.`ID`) and (`a`.`IDBAS_tiposdocumentos` = `e`.`ID`));

-- --------------------------------------------------------

--
-- Estructura para la vista `destinos`
--
DROP TABLE IF EXISTS `destinos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`medikalc`@`localhost` SQL SECURITY DEFINER VIEW `destinos` AS select `a`.`ID` AS `FuncionariosID`,`a`.`Documento` AS `FuncionariosDocumento`,`a`.`Nombre` AS `FuncionariosNombre`,`b`.`ID` AS `DependenciasID`,`b`.`Nombre` AS `DependenciasNombre`,concat(`a`.`Nombre`,'/',`b`.`Nombre`) AS `NombreMostrar` from (`funcionarios` `a` join `dependencias` `b`) where (`a`.`IDDependencias` = `b`.`ID`);

-- --------------------------------------------------------

--
-- Estructura para la vista `origenes`
--
DROP TABLE IF EXISTS `origenes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`medikalc`@`localhost` SQL SECURITY DEFINER VIEW `origenes` AS select `a`.`ID` AS `FuncionariosID`,`a`.`Documento` AS `FuncionariosDocumento`,`a`.`Nombre` AS `FuncionariosNombre`,`b`.`ID` AS `DependenciasID`,`b`.`Nombre` AS `DependenciasNombre`,concat(`a`.`Nombre`,'/',`b`.`Nombre`) AS `NombreMostrar` from (`funcionarios` `a` join `dependencias` `b`) where (`a`.`IDDependencias` = `b`.`ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
