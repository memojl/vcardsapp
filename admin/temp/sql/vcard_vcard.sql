-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 27-08-2020 a las 22:16:00
-- Versión del servidor: 10.4.10-MariaDB
-- Versión de PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `vcardsapp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_vcard`
--

CREATE TABLE `vcard_vcard` (
  `ID` int(11) UNSIGNED NOT NULL,
  `cover` varchar(100) NOT NULL,
  `profile` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `puesto` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `tel` varchar(50) NOT NULL,
  `tel_ofi` varchar(50) NOT NULL,
  `cell` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `web` varchar(100) NOT NULL,
  `fb` varchar(150) NOT NULL,
  `tw` varchar(150) NOT NULL,
  `lk` varchar(150) NOT NULL,
  `ins` varchar(150) NOT NULL,
  `f_create` varchar(20) NOT NULL,
  `f_update` varchar(20) NOT NULL,
  `vcard` tinyint(1) NOT NULL,
  `user` varchar(50) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_vcard`
--

INSERT INTO `vcard_vcard` (`ID`, `cover`, `profile`, `logo`, `nombre`, `descripcion`, `puesto`, `empresa`, `tel`, `tel_ofi`, `cell`, `email`, `web`, `fb`, `tw`, `lk`, `ins`, `f_create`, `f_update`, `vcard`, `user`, `visible`) VALUES
(1, 'foto.png', 'rforesta', '', 'Rodrigo Foresta', '', 'Manager', 'Billnex', '', '', '+54 9 3534 19 6770', 'rodrigo.foresta@thebillnex.com', 'https://www.thebillnex.com', 'https://facebook.com/', 'https://twitter.com/', '#', 'https://www.instagram.com/billnex', '19/08/2020 10:38', '19/08/2020 10:38', 1, 'admin', 1),
(2, 'foto.png', 'jparra', '', 'Juan Parra', '', 'Manager', 'Billnex', '', '', '+1(754)210-0433', 'juan.parra@thebillnex.com', 'https://www.thebillnex.com', 'https://facebook.com/', 'https://twitter.com/', '#', 'https://www.instagram.com/billnex', '22/08/2020 17:04', '22/08/2020 17:04', 1, 'admin', 1),
(3, 'foto_capital.png', 'dmiranda', '', 'Daniel Miranda Mejia', '', 'Manager', 'Capital', '', '', '442 104 6067', 'dmiranda@capitalsft.com', 'https://www.capitalsft.com', '', '', 'https://www.linkedin.com/company/13990038/admin/', '', '22/08/2020 21:28', '22/08/2020 21:28', 1, 'admin', 1),
(4, 'foto_capital.png', 'pbetancourt', '', 'Ponciano Betancourt', '', 'Manager', 'Capital', '', '', '442 347 0504', 'pbetancourt@capitalsft.com', 'https://www.capitalsft.com', '', '', 'https://www.linkedin.com/company/13990038/admin/', '', '22/08/2020 21:39', '22/08/2020 21:39', 1, 'admin', 1),
(8, 'foto.png', 'memo1', '', 'Guillermo Jimenez Lopez', '', 'Programador', 'Multiportal', '', '4421234567', '4426002842', 'multiportal@outlook.com', 'http://multiportal.com.mx', 'https://facebook.com/', '', 'https://www.linkedin.com/company/13990038/admin/', 'https://www.instagram.com/', '2020-08-23 09:49:33', '2020-08-23 19:31:06', 1, 'admin', 1),
(6, 'foto_capital.png', 'memojl', '', 'Memo Jimenez', '', 'Programador', 'Multiportal', '', '4421234567', '4426002842', 'memotablet08@gmail.com', 'http://multiportal.com.mx', 'https://facebook.com/', '', 'https://www.linkedin.com/company/13990038/admin/', 'https://www.instagram.com/', '2020-08-22 23:21:25', '2020-08-22 23:21:25', 1, 'admin', 1),
(7, 'foto_capital.png', 'asusan', '', 'Arturo Suz&amp;amp;aacute;n', '', 'Manager', 'Multiportal', '', '4421234567', '442 104 6067', 'sb-comprador@gmail.com', 'http://multiportal.com.mx', 'https://facebook.com/', '', 'https://www.linkedin.com/company/13990038/admin/', 'https://www.instagram.com/', '2020-08-22 23:31:27', '2020-08-23 19:33:45', 1, 'demo', 1),
(9, 'nodisponible.jpg', 'memojl', '', 'Guillermo Jimenez Lopez', '', 'Manager', 'Multiportal', '', '', '4426002842', 'multiportal@outlook.com', 'http://multiportal.com.mx', 'https://facebook.com/', '', '', '', '2020-08-23 10:16:39', '2020-08-23 19:32:23', 1, 'demo', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vcard_vcard`
--
ALTER TABLE `vcard_vcard`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vcard_vcard`
--
ALTER TABLE `vcard_vcard`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
