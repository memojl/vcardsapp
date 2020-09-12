-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-09-2020 a las 05:59:51
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
  `ID_user` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_vcard`
--

INSERT INTO `vcard_vcard` (`ID`, `cover`, `profile`, `logo`, `nombre`, `descripcion`, `puesto`, `empresa`, `tel`, `tel_ofi`, `cell`, `email`, `web`, `fb`, `tw`, `lk`, `ins`, `f_create`, `f_update`, `vcard`, `ID_user`, `user`, `visible`) VALUES
(1, 'foto.png', 'rforesta', '', 'Rodrigo Foresta', '', 'Manager', 'Billnex', '', '', '+54 9 3534 19 6770', 'rodrigo.foresta@thebillnex.com', 'https://www.thebillnex.com', '', '', '#', 'https://www.instagram.com/billnex', '19/08/2020 10:38', '07/09/2020 19:13', 1, 1, 'admin', 1),
(2, 'foto.png', 'jparra', '', 'Juan Parra', '', 'Manager', 'Billnex', '', '', '+1(754)210-0433', 'juan.parra@thebillnex.com', 'https://www.thebillnex.com', '', '', '#', 'https://www.instagram.com/billnex', '22/08/2020 17:04', '11/09/2020 21:03', 1, 1, 'admin', 1),
(3, 'foto_capital.png', 'dmiranda', '', 'Daniel Miranda Mejia', '', 'Manager', 'Capital', '', '', '442 104 6067', 'dmiranda@capitalsft.com', 'https://www.capitalsft.com', '', '', 'https://www.linkedin.com/company/13990038/admin/', '', '22/08/2020 21:28', '30/08/2020 12:14', 1, 1, 'admin', 1),
(4, 'foto_capital.png', 'pbetancourt', '', 'Ponciano Betancourt', '', 'Manager', 'Capital', '', '', '442 347 0504', 'pbetancourt@capitalsft.com', 'https://www.capitalsft.com', '', '', 'https://www.linkedin.com/company/13990038/admin/', '', '22/08/2020 21:39', '30/08/2020 13:17', 1, 1, 'usuario', 1),
(5, 'giganteh.jpg', 'memojl', '', 'Guillermo Jimenez Lopez', 'Desarrollo de Paginas Web y Marketing Digital', 'Desarrollador web', 'Multiportal', '', '', '4426002842', 'multiportal@outlook.com', 'http://multiportal.com.mx', 'https://facebook.com/', '', 'https://www.linkedin.com/', 'https://www.instagram.com/', '2020-09-11 22:11:58', '2020-09-11 22:17:34', 1, 1, 'admin', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_vcard_empresas`
--

CREATE TABLE `vcard_vcard_empresas` (
  `ID` int(10) UNSIGNED NOT NULL,
  `cover` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `web` varchar(150) NOT NULL,
  `tel` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `ID_user` int(10) NOT NULL,
  `user` varchar(50) NOT NULL,
  `f_create` varchar(25) NOT NULL,
  `f_update` varchar(25) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vcard_vcard_empresas`
--

INSERT INTO `vcard_vcard_empresas` (`ID`, `cover`, `empresa`, `web`, `tel`, `email`, `ID_user`, `user`, `f_create`, `f_update`, `visible`) VALUES
(1, 'multiportal.jpg', 'Multiportal', 'http://multiportal.com.mx', '442602842', 'multiportal@outlook.com', 1, 'admin', '2020-09-05', '2020-09-05', 1),
(2, 'nodisponible.jpg', 'Billnex', 'https://thebillnex.com/', '4421234567', 'contacto@thebillnex.com', 1, 'admin', '2020-09-05', '2020-09-05', 1),
(3, 'nodisponible.jpg', 'Capital', 'https://api.capitalinvestment.mx/', '4421234567', 'contacto@capitalinvestment.mx', 1, 'admin', '2020-09-05', '2020-09-05', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_vcard_plan`
--

CREATE TABLE `vcard_vcard_plan` (
  `ID` int(6) UNSIGNED NOT NULL,
  `plan` varchar(100) NOT NULL,
  `price` decimal(6,2) NOT NULL,
  `lim_card` int(9) NOT NULL,
  `lim_emp` int(6) NOT NULL,
  `nivel` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vcard_vcard_plan`
--

INSERT INTO `vcard_vcard_plan` (`ID`, `plan`, `price`, `lim_card`, `lim_emp`, `nivel`) VALUES
(1, 'black', '3000.00', 0, 0, 0),
(2, 'oro', '1000.00', 1000, 5, 0),
(3, 'plata', '300.00', 100, 1, 0),
(4, 'bronce', '0.00', 1, 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vcard_vcard`
--
ALTER TABLE `vcard_vcard`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_vcard_empresas`
--
ALTER TABLE `vcard_vcard_empresas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_vcard_plan`
--
ALTER TABLE `vcard_vcard_plan`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vcard_vcard`
--
ALTER TABLE `vcard_vcard`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vcard_vcard_empresas`
--
ALTER TABLE `vcard_vcard_empresas`
  MODIFY `ID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vcard_vcard_plan`
--
ALTER TABLE `vcard_vcard_plan`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
