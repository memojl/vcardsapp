-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 12-09-2020 a las 21:16:47
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
-- Estructura de tabla para la tabla `vcard_access`
--

CREATE TABLE `vcard_access` (
  `ID` int(9) UNSIGNED NOT NULL,
  `user` varchar(50) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `navegador` varchar(20) NOT NULL,
  `os` varchar(10) NOT NULL,
  `code` varchar(6) NOT NULL,
  `fecha` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_access`
--

INSERT INTO `vcard_access` (`ID`, `user`, `ip`, `navegador`, `os`, `code`, `fecha`) VALUES
(1, 'admin', '127.0.0.1', 'CHROME', 'WIN', '944950', '2019-06-06 03:35:27'),
(2, 'usuario', '127.0.0.1', 'CHROME', 'WIN', '234567', '2019-06-06 03:35:27'),
(4, 'demo', '127.0.0.1', 'CHROME', 'WIN', '234567', '2019-06-06 03:35:27'),
(5, 'ventas', '127.0.0.1', 'CHROME', 'WIN', '234567', '2019-06-06 03:35:27'),
(6, 'admin', '192.168.0.3', 'CHROME', 'ANDROID', '944950', '2020-06-19 19:43:41'),
(7, 'user', '127.0.0.1', 'CHROME', 'WIN', 'Q5xLeN', '2020-08-31 18:58:45'),
(8, 'usuario', '127.0.0.1', 'CHROME', 'WIN', '8FMTDd', '2020-08-31 20:34:34'),
(9, 'usuario', '127.0.0.1', 'CHROME', 'WIN', 'NgDgqi', '2020-08-31 20:43:50'),
(10, 'usuario', '127.0.0.1', 'CHROME', 'WIN', 'mY69u8', '2020-08-31 20:51:05'),
(11, 'usuario', '127.0.0.1', 'CHROME', 'WIN', 'lV7kW3', '2020-08-31 20:54:12'),
(12, 'usuario', '127.0.0.1', 'CHROME', 'WIN', 'dam9EP', '2020-08-31 20:59:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_api_version`
--

CREATE TABLE `vcard_api_version` (
  `ID` int(9) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `vence` varchar(20) NOT NULL,
  `ultimate` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `des_ver` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_api_version`
--

INSERT INTO `vcard_api_version` (`ID`, `nom`, `vence`, `ultimate`, `status`, `des_ver`) VALUES
(1, 'phponix2017', '31/08/2019', '01.2.3.5', 'obsoleta', ''),
(2, 'AdminLTE', '31/12/2019', '01.2.4.5', 'obsoleta', ''),
(3, 'AdminLTE CSS', '30/11/2019', '01.2.4.6', 'activa', ''),
(4, 'AdminLTE CSS2', '30/11/2021', '01.2.5.1', 'activa', ''),
(5, 'AdminLTE 7Ajax', '29/05/2024', '01.2.6.6', 'activa', ''),
(6, 'AdminLTE PHP7', '01/12/2026', '01.2.7.2', 'activa', ''),
(7, 'AdminLTE SE-X', '30/11/2027', '01.2.7.8', 'activa', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_blog`
--

CREATE TABLE `vcard_blog` (
  `ID` int(9) UNSIGNED NOT NULL,
  `cover` varchar(100) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `contenido` text NOT NULL,
  `tag` varchar(200) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `fmod` varchar(21) NOT NULL,
  `fecha` varchar(21) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_blog`
--

INSERT INTO `vcard_blog` (`ID`, `cover`, `titulo`, `descripcion`, `contenido`, `tag`, `autor`, `fmod`, `fecha`, `visible`) VALUES
(1, 'blog_FO_petrolera.jpg', 'Mi primer blog', 'Si vives con EPOC, tener una fuente de oxígeno confiable es importante para mantener...', '<p>Si vives con EPOC, tener una fuente de ox&iacute;geno confiable es importante para mantener tu calidad de vida. Sin embargo, existen tantos tipos diferentes de concentradores de ox&iacute;geno en el mercado hoy en d&iacute;a, que puede ser dif&iacute;cil elegir el que mejor se adapte a sus necesidades. A medida que esta tecnolog&iacute;a contin&uacute;a avanzando, aparecen caracter&iacute;sticas m&aacute;s nuevas y opciones m&aacute;s c&oacute;modas, &iexcl;y desea aprovecharlas al m&aacute;ximo!</p>\r\n<p>La buena noticia es que hay m&aacute;s opciones para la terapia de ox&iacute;geno disponibles para ti; a continuaci&oacute;n, hemos recopilado informaci&oacute;n excelente sobre los dos principales concentradores de oxigeno dom&eacute;sticos de Philips Respironics:</p>\r\n<table>\r\n<tbody>\r\n<tr>\r\n<td width=\"299\"><strong>EVERFLO</strong>\r\n<p>&nbsp;</p>\r\n<p>El concentrador de ox&iacute;geno EverFlo de 5 litros es una m&aacute;quina silenciosa, liviana y compacta que es menos llamativa que muchas otras.</p>\r\n<p>Los usuarios pueden comprar el modelo est&aacute;ndar, o el que tiene un indicador de porcentaje de ox&iacute;geno (OPI) y usa ultrasonido para medir el flujo de ox&iacute;geno.</p>\r\n<p>Los controles se encuentran en el lado delantero izquierdo de la m&aacute;quina y una perilla de rodillo controla el medidor de flujo de ox&iacute;geno empotrado en el centro. Una botella de humidificador se puede conectar a la parte posterior izquierda de la m&aacute;quina con velcro. &iexcl;El tubo se conecta f&aacute;cilmente a la c&aacute;nula de metal encima del interruptor de encendido, y tambi&eacute;n se pueden almacenar tubos adicionales en el interior.</p>\r\n<p>&iexcl;EverFlo 5L pesa 14 kgs y entrega ox&iacute;geno a .5-5 LPM con una concentraci&oacute;n de ox&iacute;geno de hasta 95% en todas las velocidades de flujo. La m&aacute;quina mide 58 cm de profundidad.</p>\r\n<p>El concentrador EverFlo de 5L viene con una garant&iacute;a est&aacute;ndar de 1 a&ntilde;o.</p>\r\n</td>\r\n<td width=\"299\"><strong>MILLENNIUM</strong>\r\n<p>&nbsp;</p>\r\n<p>El concentrador de ox&iacute;geno Millenium proporciona hasta 10 LPM de ox&iacute;geno, d&aacute;ndole las especificaciones de una unidad de &ldquo;alto flujo&rdquo;.</p>\r\n<p>El concentrador de ox&iacute;geno est&aacute; disponible en dos modelos: el modelo est&aacute;ndar y uno dise&ntilde;ado con un indicador de porcentaje de ox&iacute;geno (OPI), una funci&oacute;n que utiliza tecnolog&iacute;a de ultrasonido para medir el flujo de ox&iacute;geno.</p>\r\n<p>El dise&ntilde;o rectangular blanco es fuerte y resistente, y cuatro ruedas grandes (junto con un asa insertada en la parte superior) lo hacen bastante f&aacute;cil de mover.</p>\r\n<p>Este concentrador tiene una v&aacute;lvula SMC de &ldquo;ciclo seguro&rdquo;, dise&ntilde;ada espec&iacute;ficamente para manejar los mayores flujos de presi&oacute;n necesarios para una m&aacute;quina de 10 LPM. Millenium tambi&eacute;n est&aacute; dise&ntilde;ado con un compresor de doble cabezal equipado para impulsar m&aacute;s aire a trav&eacute;s de los lechos de tamices de la m&aacute;quina para eliminar el nitr&oacute;geno.</p>\r\n<p>Philips Respironics &ldquo;Millennium&rdquo; viene con una garant&iacute;a est&aacute;ndar de un a&ntilde;o.</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\" width=\"599\"><strong>Caracter&iacute;sticas y Beneficios</strong></td>\r\n</tr>\r\n<tr>\r\n<td width=\"299\">Silencioso y f&aacute;cil de usar\r\n<p>&nbsp;</p>\r\n<p>Controles claros y visibles</p>\r\n<p>Dise&ntilde;o ergon&oacute;mico: rueda f&aacute;cilmente</p>\r\n<p>Peso ligero de 14 kg</p>\r\n<p>Medidor de flujo empotrado para proteger contra la rotura</p>\r\n<p>Velcro asegura la botella del humidificador en la m&aacute;quina</p>\r\n<p>Proporciona ox&iacute;geno a .5-5 LPM con 95% de ox&iacute;geno</p>\r\n<p>Alarmas de seguridad por fallas</p>\r\n<p>Garant&iacute;a de producto de tres a&ntilde;os</p>\r\n</td>\r\n<td width=\"299\">F&aacute;cil de usar: los controles son claros y visibles\r\n<p>&nbsp;</p>\r\n<p>Pesa 24 kg</p>\r\n<p>Indicador de Porcentaje de Ox&iacute;geno (OPI) se puede agregar en</p>\r\n<p>Proporciona ox&iacute;geno a 1-10 LPM al 96% de ox&iacute;geno</p>\r\n<p>Alarmas de seguridad por fallas y bajo porcentaje de ox&iacute;geno</p>\r\n<p>Menos partes m&oacute;viles que otros concentradores</p>\r\n<p>Garant&iacute;a est&aacute;ndar de un a&ntilde;o</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\" width=\"599\"><strong>Pros</strong></td>\r\n</tr>\r\n<tr>\r\n<td width=\"299\">Funcionamiento silencioso y sonido silencioso cuando se inicia (45 db)\r\n<p>&nbsp;</p>\r\n<p>F&aacute;cil de usar</p>\r\n<p>Confiable y ligero</p>\r\n<p>Port&aacute;til y f&aacute;cil de mover</p>\r\n<p>Consumo de energ&iacute;a de 350 w</p>\r\n<p>&nbsp;</p>\r\n</td>\r\n<td width=\"299\">Bien hecho y f&aacute;cil de configurar\r\n<p>&nbsp;</p>\r\n<p>Robusto, confiable y de bajo mantenimiento</p>\r\n<p>Produce hasta 10 LPM de ox&iacute;geno</p>\r\n</td>\r\n</tr>\r\n<tr>\r\n<td colspan=\"2\" width=\"599\"><strong>Contras</strong></td>\r\n</tr>\r\n<tr>\r\n<td width=\"299\">Bip fuerte cuando se inicia\r\n<p>&nbsp;</p>\r\n<p>Baja altitud de trabajo</p>\r\n<p>Produce hasta 5 LPM de ox&iacute;geno</p>\r\n</td>\r\n<td width=\"299\">Demasiado ruidoso para algunos usuarios (50 db)\r\n<p>&nbsp;</p>\r\n<p>Pesa 24 kg</p>\r\n<p>Tiene m&aacute;s potencia de la que muchos usuarios necesitan</p>\r\n<p>Consumo de energ&iacute;a de 600 w</p>\r\n<p><strong>&nbsp;</strong></p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>La elecci&oacute;n de los dispositivos de administraci&oacute;n de ox&iacute;geno depende del requerimiento del paciente, la eficacia del dispositivo, la fiabilidad, la facilidad de aplicaci&oacute;n terap&eacute;utica y la aceptaci&oacute;n del paciente. <a href=\"http://samsung-healthcare.mx/contacto\"><span style=\"text-decoration: underline;\">Para m&aacute;s informaci&oacute;n sobre la elecci&oacute;n de su concentrador de ox&iacute;geno no dude en contactarnos.</span></a></p>', 'EPOC, Oxígeno', 'admin', '2018-09-24 22:23:34', '2017-01-18 14:05:23', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_blog_coment`
--

CREATE TABLE `vcard_blog_coment` (
  `ID` int(6) UNSIGNED NOT NULL,
  `ip` varchar(18) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comentario` varchar(500) NOT NULL,
  `id_b` int(3) NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_blog_coment`
--

INSERT INTO `vcard_blog_coment` (`ID`, `ip`, `nombre`, `email`, `comentario`, `id_b`, `fecha`, `visible`) VALUES
(1, '127.0.0.1', 'Miguel Hernadez', 'mherco@hotmail.com', 'Mensaje de prueba de un comentario.', 1, '2019-07-06 18:14:37', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_comp`
--

CREATE TABLE `vcard_comp` (
  `ID` int(1) UNSIGNED NOT NULL,
  `page` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_comp`
--

INSERT INTO `vcard_comp` (`ID`, `page`) VALUES
(1, 'usuarios/login.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_config`
--

CREATE TABLE `vcard_config` (
  `ID` int(1) UNSIGNED NOT NULL,
  `logo` varchar(100) NOT NULL,
  `page_name` varchar(100) NOT NULL,
  `title` varchar(150) NOT NULL,
  `dominio` varchar(100) NOT NULL,
  `path_root` varchar(150) NOT NULL,
  `page_url` varchar(100) NOT NULL,
  `keyword` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `metas` text NOT NULL,
  `g_analytics` text NOT NULL,
  `tel` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `wapp` varchar(20) NOT NULL,
  `webMail` varchar(100) NOT NULL,
  `contactMail` varchar(100) NOT NULL,
  `mode` varchar(50) NOT NULL,
  `chartset` varchar(30) NOT NULL,
  `dboard` varchar(50) NOT NULL,
  `dboard2` varchar(50) NOT NULL,
  `direc` varchar(250) NOT NULL,
  `CoR` varchar(100) NOT NULL,
  `CoE` varchar(100) NOT NULL,
  `BCC` varchar(100) NOT NULL,
  `CoP` varchar(100) NOT NULL,
  `fb` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `gp` varchar(100) NOT NULL,
  `lk` varchar(100) NOT NULL,
  `yt` varchar(100) NOT NULL,
  `ins` varchar(100) NOT NULL,
  `wv` varchar(100) NOT NULL,
  `licencia` varchar(300) NOT NULL,
  `version` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_config`
--

INSERT INTO `vcard_config` (`ID`, `logo`, `page_name`, `title`, `dominio`, `path_root`, `page_url`, `keyword`, `description`, `metas`, `g_analytics`, `tel`, `phone`, `wapp`, `webMail`, `contactMail`, `mode`, `chartset`, `dboard`, `dboard2`, `direc`, `CoR`, `CoE`, `BCC`, `CoP`, `fb`, `tw`, `gp`, `lk`, `yt`, `ins`, `wv`, `licencia`, `version`) VALUES
(1, 'logo_vcard.min.png', 'VCARDS-APP', 'VCARDS -  Tarjetas de Contacto Digital', 'http://localhost/', '/MisSitios/vcardsapp', 'http://localhost/MisSitios/vcardsapp/', 'cms,contenido,web,landingpage,p&aacute;gina web', 'PHP Onix es un CMS gestor de contenidos para tu web.', '<!--Responsive Meta-->\r\n<meta name=\"viewport\" content=\"width=device-width, initial-scale=1, maximum-scale=1\">\r\n<!-- META-TAGS generadas por http://metatags.miarroba.es -->\r\n<META NAME=\"DC.Language\" SCHEME=\"RFC1766\" CONTENT=\"Spanish\">\r\n<META NAME=\"AUTHOR\" CONTENT=\"Guillermo Jimenez\">\r\n<META NAME=\"REPLY-TO\" CONTENT=\"multiportal@outlook.com\">\r\n<LINK REV=\"made\" href=\"mailto:multiportal@outlook.com\">\r\n', '<!--Google Analytics-->', '(01)4426002842', '', '4426002842', 'multiportal@outlook.com', 'multiportal@outlook.com', 'page', 'iso-8859-1', 'usuarios', 'AdminLTE', 'Centro, Santiago de Querétaro, México', 'multiportal@outlook.com', 'phponix@webcindario.com', '', 'memojl08@gmail.com', 'https://facebook.com/', 'https://twitter.com/', '', '', '', '', '', 'cms-px31q2hponix31q2x.admx31q2in458x31q2x.202x31q24.05.x31q212.01x31q2.2.6.x31q26x31q2', '01.2.8.0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_contacto`
--

CREATE TABLE `vcard_contacto` (
  `ID` int(9) UNSIGNED NOT NULL,
  `ip` varchar(25) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `para` varchar(50) NOT NULL,
  `de` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `asunto` varchar(150) NOT NULL,
  `msj` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cat_list` varchar(50) NOT NULL,
  `seccion` varchar(50) NOT NULL,
  `tabla` varchar(50) NOT NULL,
  `adjuntos` text NOT NULL,
  `visto` tinyint(1) NOT NULL,
  `status` int(11) NOT NULL,
  `ID_login` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_contacto`
--

INSERT INTO `vcard_contacto` (`ID`, `ip`, `nombre`, `email`, `para`, `de`, `tel`, `titulo`, `asunto`, `msj`, `fecha`, `cat_list`, `seccion`, `tabla`, `adjuntos`, `visto`, `status`, `ID_login`, `ID_user`, `visible`) VALUES
(1, '127.0.0.1', 'Miguel Hernadez ', 'mherco@hotmail.com', '', '', '4421234567', '', 'Mensaje de Bienvenida- CENTRO DE CONTACTO', 'Hola estimado usuario, bienvenido a su plataforma \"PHPONIX CMS\" aqui se guardara un copia de respaldo de todos sus correos de contacto y registros de su página web.\r\n\r\nCualquier duda o comentario puede ponerse en contacto a través del correo a multiportal@outlook.com o en nuestra página https://phponix.webcindario.com \r\n\r\nATTE.\r\nEl equipo de PHPONIX & MULTIPORTAL ', '2019-11-24 03:19:14', 'inbox', 'contacto', '', '', 1, 0, 0, 0, 1),
(2, '192.168.0.3', 'admin', 'multiportal@outlook.com', 'multiportal@outlook.com', '', '', '', 'PHP ONIX - Sistema de Verificacion', 'Codigo de Seguridad: 944950', '2020-06-19 17:43:14', 'inbox', 'contacto', '', '', 1, 1, 1, 1, 1),
(3, '127.0.0.1', 'Usuario Vcard', 'mherco@hotmail.com', '', '', '', '', 'Nuevo Usuario Registrado - Web VCARDS-APP', '<html><body style=\"font-family:Verdana, Geneva, sans-serif; font-size: 13px;\"><table style=\"font-family:Verdana, Geneva, sans-serif; font-size:13px;\"><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><img src=\"http://localhost/MisSitios/vcardsapp/temas/default/images/logo.min.png\"></td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><p style=\"text-align:center\">Nuevo Usuario Registrado - Mensaje enviado a tr&aacute;ves de la p&aacute;gina web de VCARDS-APP.</p></td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Usuario:</td><td style=\"background-color: #eee;\">user</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Password:</td><td style=\"background-color: #fff;\">user2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nombre:</td><td style=\"background-color: #eee;\">Usuario Vcard</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Correo:</td><td style=\"background-color: #fff;\">mherco@hotmail.com</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nivel:</td><td style=\"background-color: #eee;\">5</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">C&oacute;digo de Activaci&oacute;n:</td><td style=\"background-color: #fff;\">user2020xuser2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Activo:</td><td style=\"background-color: #eee;\">0</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Alta:</td><td style=\"background-color: #fff;\">2020-08-31 18:58:45</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Codigo de Seguridad:</td><td style=\"background-color: #eee;\">Q5xLeNWmTLpMo3CHJ1SCcO8KZ8tZtCLC6qinC4jrrhTjNefXqKR</td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"></td></tr></table></body></html>', '2020-08-31 16:58:45', 'inbox', 'contacto', '', '', 1, 0, 0, 0, 1),
(4, '127.0.0.1', 'Memo Jimenez', 'memo@gmail.com', '', '', '', '', 'Nuevo Usuario Registrado - Web VCARDS-APP', '<html><body style=\"font-family:Verdana, Geneva, sans-serif; font-size: 13px;\"><table style=\"font-family:Verdana, Geneva, sans-serif; font-size:13px;\"><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><img src=\"http://localhost/MisSitios/vcardsapp/temas/default/images/logo.min.png\"></td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><p style=\"text-align:center\">Nuevo Usuario Registrado - Mensaje enviado a tr&aacute;ves de la p&aacute;gina web de VCARDS-APP.</p></td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Usuario:</td><td style=\"background-color: #eee;\">usuario</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Password:</td><td style=\"background-color: #fff;\">usuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nombre:</td><td style=\"background-color: #eee;\">Memo Jimenez</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Correo:</td><td style=\"background-color: #fff;\">memo@gmail.com</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nivel:</td><td style=\"background-color: #eee;\">5</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\"><strong>C&oacute;digo de Activaci&oacute;n:</strong></td><td style=\"background-color: #fff;\">usuario2020xusuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Activo:</td><td style=\"background-color: #eee;\">0</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Alta:</td><td style=\"background-color: #fff;\">2020-08-31 20:34:34</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Codigo de Seguridad:</td><td style=\"background-color: #eee;\">8FMTDd</td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"></td></tr></table></body></html>', '2020-08-31 18:34:34', 'inbox', 'contacto', '', '', 1, 0, 0, 0, 1),
(5, '127.0.0.1', 'Memo Jimenez', 'memo.jimenez@azell.co', '', '', '', '', 'Nuevo Usuario Registrado - Web VCARDS-APP', '<html><body style=\"font-family:Verdana, Geneva, sans-serif; font-size: 13px;\"><table style=\"font-family:Verdana, Geneva, sans-serif; font-size:13px;\"><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><img src=\"http://localhost/MisSitios/vcardsapp/temas/default/images/logo.min.png\"></td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><p style=\"text-align:center\">Nuevo Usuario Registrado - Mensaje enviado a tr&aacute;ves de la p&aacute;gina web de VCARDS-APP.</p></td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Usuario:</td><td style=\"background-color: #eee;\">usuario</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Password:</td><td style=\"background-color: #fff;\">usuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nombre:</td><td style=\"background-color: #eee;\">Memo Jimenez</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Correo:</td><td style=\"background-color: #fff;\">memo.jimenez@azell.co</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nivel:</td><td style=\"background-color: #eee;\">5</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\"><strong>C&oacute;digo de Activaci&oacute;n:</strong></td><td style=\"background-color: #fff;\">usuario2020xusuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Activo:</td><td style=\"background-color: #eee;\">0</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Alta:</td><td style=\"background-color: #fff;\">2020-08-31 20:43:50</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Codigo de Seguridad:</td><td style=\"background-color: #eee;\">NgDgqi</td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"></td></tr></table></body></html>', '2020-08-31 18:43:50', 'inbox', 'contacto', '', '', 1, 0, 0, 0, 1),
(6, '127.0.0.1', 'Memo Jimenez', 'memo.jimenez@azell.co', '', '', '', '', 'Nuevo Usuario Registrado - Web VCARDS-APP', '<html><body style=\"font-family:Verdana, Geneva, sans-serif; font-size: 13px;\"><table style=\"font-family:Verdana, Geneva, sans-serif; font-size:13px;\"><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><img src=\"http://localhost/MisSitios/vcardsapp/temas/default/images/logo.min.png\"></td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><p style=\"text-align:center\">Nuevo Usuario Registrado - Mensaje enviado a tr&aacute;ves de la p&aacute;gina web de VCARDS-APP.</p></td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Usuario:</td><td style=\"background-color: #eee;\">usuario</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Password:</td><td style=\"background-color: #fff;\">usuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nombre:</td><td style=\"background-color: #eee;\">Memo Jimenez</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Correo:</td><td style=\"background-color: #fff;\">memo.jimenez@azell.co</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nivel:</td><td style=\"background-color: #eee;\">5</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\"><strong>C&oacute;digo de Activaci&oacute;n:</strong></td><td style=\"background-color: #fff;\">usuario2020xusuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Activo:</td><td style=\"background-color: #eee;\">0</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Alta:</td><td style=\"background-color: #fff;\">2020-08-31 20:51:05</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Codigo de Seguridad:</td><td style=\"background-color: #eee;\">mY69u8</td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"></td></tr></table></body></html>', '2020-08-31 18:51:05', 'inbox', 'contacto', '', '', 1, 0, 0, 0, 1),
(7, '127.0.0.1', 'Memo Jimenez', 'memo.jimenez@azell.co', '', '', '', '', 'Nuevo Usuario Registrado - Web VCARDS-APP', '<html><body style=\"font-family:Verdana, Geneva, sans-serif; font-size: 13px;\"><table style=\"font-family:Verdana, Geneva, sans-serif; font-size:13px;\"><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><img src=\"http://localhost/MisSitios/vcardsapp/temas/default/images/logo.min.png\"></td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><p style=\"text-align:center\">Nuevo Usuario Registrado - Mensaje enviado a tr&aacute;ves de la p&aacute;gina web de VCARDS-APP.</p></td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Usuario:</td><td style=\"background-color: #eee;\">usuario</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Password:</td><td style=\"background-color: #fff;\">usuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nombre:</td><td style=\"background-color: #eee;\">Memo Jimenez</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Correo:</td><td style=\"background-color: #fff;\">memo.jimenez@azell.co</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nivel:</td><td style=\"background-color: #eee;\">5</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\"><strong>C&oacute;digo de Activaci&oacute;n:</strong></td><td style=\"background-color: #fff;\">usuario2020xusuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Activo:</td><td style=\"background-color: #eee;\">0</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Alta:</td><td style=\"background-color: #fff;\">2020-08-31 20:54:12</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Codigo de Seguridad:</td><td style=\"background-color: #eee;\">lV7kW3</td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"></td></tr></table></body></html>', '2020-08-31 18:54:12', 'inbox', 'contacto', '', '', 1, 0, 0, 0, 1),
(8, '127.0.0.1', 'Memo Jimenez', 'memo.jimenez@azell.co', '', '', '', '', 'Nuevo Usuario Registrado - Web VCARDS-APP', '<html><body style=\"font-family:Verdana, Geneva, sans-serif; font-size: 13px;\"><table style=\"font-family:Verdana, Geneva, sans-serif; font-size:13px;\"><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><img src=\"http://localhost/MisSitios/vcardsapp/temas/default/images/logo.min.png\"></td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"><p style=\"text-align:center\">Nuevo Usuario Registrado - Mensaje enviado a tr&aacute;ves de la p&aacute;gina web de VCARDS-APP.</p></td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Usuario:</td><td style=\"background-color: #eee;\">usuario</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Password:</td><td style=\"background-color: #fff;\">usuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nombre:</td><td style=\"background-color: #eee;\">Memo Jimenez</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Correo:</td><td style=\"background-color: #fff;\">memo.jimenez@azell.co</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Nivel:</td><td style=\"background-color: #eee;\">5</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\"><strong>C&oacute;digo de Activaci&oacute;n:</strong></td><td style=\"background-color: #fff;\">usuario2020xusuario2020</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Activo:</td><td style=\"background-color: #eee;\">0</td></tr><tr><td align=\"right\" style=\"background-color: #fff;\">Alta:</td><td style=\"background-color: #fff;\">2020-08-31 20:59:01</td></tr><tr><td align=\"right\" style=\"background-color: #eee;\">Codigo de Seguridad:</td><td style=\"background-color: #eee;\">dam9EP</td></tr><tr><td align=\"center\" style=\"background-color: #fff;\" colspan=\"2\"></td></tr></table></body></html>', '2020-08-31 18:59:01', 'inbox', 'contacto', '', '', 1, 0, 0, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_contacto_forms`
--

CREATE TABLE `vcard_contacto_forms` (
  `ID` int(6) UNSIGNED NOT NULL,
  `seccion` varchar(100) NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `bcc` varchar(200) NOT NULL,
  `CoE` varchar(100) NOT NULL,
  `CoP` varchar(100) NOT NULL,
  `usuario` varchar(300) NOT NULL,
  `url_m` varchar(500) NOT NULL,
  `fecha` varchar(22) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_contacto_forms`
--

INSERT INTO `vcard_contacto_forms` (`ID`, `seccion`, `modulo`, `email`, `bcc`, `CoE`, `CoP`, `usuario`, `url_m`, `fecha`, `activo`) VALUES
(1, 'Contacto', 'contacto', 'multiportal@outlook.com', 'memojl08@gmail.com', 'phponix@webcindario.com', 'memojl08@gmail.com', '', 'index.php?mod=contacto', '2018-09-28 18:31:45', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_countries`
--

CREATE TABLE `vcard_countries` (
  `id` int(5) NOT NULL,
  `countryCode` char(2) NOT NULL DEFAULT '',
  `countryName` varchar(45) NOT NULL DEFAULT '',
  `currencyCode` char(3) DEFAULT NULL,
  `capital` varchar(30) DEFAULT NULL,
  `continentName` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vcard_countries`
--

INSERT INTO `vcard_countries` (`id`, `countryCode`, `countryName`, `currencyCode`, `capital`, `continentName`) VALUES
(1, 'AD', 'Andorra', 'EUR', 'Andorra la Vella', 'Europe'),
(2, 'AE', 'United Arab Emirates', 'AED', 'Abu Dhabi', 'Asia'),
(3, 'AF', 'Afghanistan', 'AFN', 'Kabul', 'Asia'),
(4, 'AG', 'Antigua and Barbuda', 'XCD', 'St. John\'s', 'North America'),
(5, 'AI', 'Anguilla', 'XCD', 'The Valley', 'North America'),
(6, 'AL', 'Albania', 'ALL', 'Tirana', 'Europe'),
(7, 'AM', 'Armenia', 'AMD', 'Yerevan', 'Asia'),
(8, 'AO', 'Angola', 'AOA', 'Luanda', 'Africa'),
(9, 'AQ', 'Antarctica', '', '', 'Antarctica'),
(10, 'AR', 'Argentina', 'ARS', 'Buenos Aires', 'South America'),
(11, 'AS', 'American Samoa', 'USD', 'Pago Pago', 'Oceania'),
(12, 'AT', 'Austria', 'EUR', 'Vienna', 'Europe'),
(13, 'AU', 'Australia', 'AUD', 'Canberra', 'Oceania'),
(14, 'AW', 'Aruba', 'AWG', 'Oranjestad', 'North America'),
(15, 'AX', 'Åland', 'EUR', 'Mariehamn', 'Europe'),
(16, 'AZ', 'Azerbaijan', 'AZN', 'Baku', 'Asia'),
(17, 'BA', 'Bosnia and Herzegovina', 'BAM', 'Sarajevo', 'Europe'),
(18, 'BB', 'Barbados', 'BBD', 'Bridgetown', 'North America'),
(19, 'BD', 'Bangladesh', 'BDT', 'Dhaka', 'Asia'),
(20, 'BE', 'Belgium', 'EUR', 'Brussels', 'Europe'),
(21, 'BF', 'Burkina Faso', 'XOF', 'Ouagadougou', 'Africa'),
(22, 'BG', 'Bulgaria', 'BGN', 'Sofia', 'Europe'),
(23, 'BH', 'Bahrain', 'BHD', 'Manama', 'Asia'),
(24, 'BI', 'Burundi', 'BIF', 'Bujumbura', 'Africa'),
(25, 'BJ', 'Benin', 'XOF', 'Porto-Novo', 'Africa'),
(26, 'BL', 'Saint Barthélemy', 'EUR', 'Gustavia', 'North America'),
(27, 'BM', 'Bermuda', 'BMD', 'Hamilton', 'North America'),
(28, 'BN', 'Brunei', 'BND', 'Bandar Seri Begawan', 'Asia'),
(29, 'BO', 'Bolivia', 'BOB', 'Sucre', 'South America'),
(30, 'BQ', 'Bonaire', 'USD', '', 'North America'),
(31, 'BR', 'Brazil', 'BRL', 'Brasília', 'South America'),
(32, 'BS', 'Bahamas', 'BSD', 'Nassau', 'North America'),
(33, 'BT', 'Bhutan', 'BTN', 'Thimphu', 'Asia'),
(34, 'BV', 'Bouvet Island', 'NOK', '', 'Antarctica'),
(35, 'BW', 'Botswana', 'BWP', 'Gaborone', 'Africa'),
(36, 'BY', 'Belarus', 'BYR', 'Minsk', 'Europe'),
(37, 'BZ', 'Belize', 'BZD', 'Belmopan', 'North America'),
(38, 'CA', 'Canada', 'CAD', 'Ottawa', 'North America'),
(39, 'CC', 'Cocos [Keeling] Islands', 'AUD', 'West Island', 'Asia'),
(40, 'CD', 'Democratic Republic of the Congo', 'CDF', 'Kinshasa', 'Africa'),
(41, 'CF', 'Central African Republic', 'XAF', 'Bangui', 'Africa'),
(42, 'CG', 'Republic of the Congo', 'XAF', 'Brazzaville', 'Africa'),
(43, 'CH', 'Switzerland', 'CHF', 'Berne', 'Europe'),
(44, 'CI', 'Ivory Coast', 'XOF', 'Yamoussoukro', 'Africa'),
(45, 'CK', 'Cook Islands', 'NZD', 'Avarua', 'Oceania'),
(46, 'CL', 'Chile', 'CLP', 'Santiago', 'South America'),
(47, 'CM', 'Cameroon', 'XAF', 'Yaoundé', 'Africa'),
(48, 'CN', 'China', 'CNY', 'Beijing', 'Asia'),
(49, 'CO', 'Colombia', 'COP', 'Bogotá', 'South America'),
(50, 'CR', 'Costa Rica', 'CRC', 'San José', 'North America'),
(51, 'CU', 'Cuba', 'CUP', 'Havana', 'North America'),
(52, 'CV', 'Cape Verde', 'CVE', 'Praia', 'Africa'),
(53, 'CW', 'Curacao', 'ANG', 'Willemstad', 'North America'),
(54, 'CX', 'Christmas Island', 'AUD', 'The Settlement', 'Asia'),
(55, 'CY', 'Cyprus', 'EUR', 'Nicosia', 'Europe'),
(56, 'CZ', 'Czech Republic', 'CZK', 'Prague', 'Europe'),
(57, 'DE', 'Germany', 'EUR', 'Berlin', 'Europe'),
(58, 'DJ', 'Djibouti', 'DJF', 'Djibouti', 'Africa'),
(59, 'DK', 'Denmark', 'DKK', 'Copenhagen', 'Europe'),
(60, 'DM', 'Dominica', 'XCD', 'Roseau', 'North America'),
(61, 'DO', 'Dominican Republic', 'DOP', 'Santo Domingo', 'North America'),
(62, 'DZ', 'Algeria', 'DZD', 'Algiers', 'Africa'),
(63, 'EC', 'Ecuador', 'USD', 'Quito', 'South America'),
(64, 'EE', 'Estonia', 'EUR', 'Tallinn', 'Europe'),
(65, 'EG', 'Egypt', 'EGP', 'Cairo', 'Africa'),
(66, 'EH', 'Western Sahara', 'MAD', 'El Aaiún', 'Africa'),
(67, 'ER', 'Eritrea', 'ERN', 'Asmara', 'Africa'),
(68, 'ES', 'Spain', 'EUR', 'Madrid', 'Europe'),
(69, 'ET', 'Ethiopia', 'ETB', 'Addis Ababa', 'Africa'),
(70, 'FI', 'Finland', 'EUR', 'Helsinki', 'Europe'),
(71, 'FJ', 'Fiji', 'FJD', 'Suva', 'Oceania'),
(72, 'FK', 'Falkland Islands', 'FKP', 'Stanley', 'South America'),
(73, 'FM', 'Micronesia', 'USD', 'Palikir', 'Oceania'),
(74, 'FO', 'Faroe Islands', 'DKK', 'Tórshavn', 'Europe'),
(75, 'FR', 'France', 'EUR', 'Paris', 'Europe'),
(76, 'GA', 'Gabon', 'XAF', 'Libreville', 'Africa'),
(77, 'GB', 'United Kingdom', 'GBP', 'London', 'Europe'),
(78, 'GD', 'Grenada', 'XCD', 'St. George\'s', 'North America'),
(79, 'GE', 'Georgia', 'GEL', 'Tbilisi', 'Asia'),
(80, 'GF', 'French Guiana', 'EUR', 'Cayenne', 'South America'),
(81, 'GG', 'Guernsey', 'GBP', 'St Peter Port', 'Europe'),
(82, 'GH', 'Ghana', 'GHS', 'Accra', 'Africa'),
(83, 'GI', 'Gibraltar', 'GIP', 'Gibraltar', 'Europe'),
(84, 'GL', 'Greenland', 'DKK', 'Nuuk', 'North America'),
(85, 'GM', 'Gambia', 'GMD', 'Banjul', 'Africa'),
(86, 'GN', 'Guinea', 'GNF', 'Conakry', 'Africa'),
(87, 'GP', 'Guadeloupe', 'EUR', 'Basse-Terre', 'North America'),
(88, 'GQ', 'Equatorial Guinea', 'XAF', 'Malabo', 'Africa'),
(89, 'GR', 'Greece', 'EUR', 'Athens', 'Europe'),
(90, 'GS', 'South Georgia and the South Sandwich Islands', 'GBP', 'Grytviken', 'Antarctica'),
(91, 'GT', 'Guatemala', 'GTQ', 'Guatemala City', 'North America'),
(92, 'GU', 'Guam', 'USD', 'Hagåtña', 'Oceania'),
(93, 'GW', 'Guinea-Bissau', 'XOF', 'Bissau', 'Africa'),
(94, 'GY', 'Guyana', 'GYD', 'Georgetown', 'South America'),
(95, 'HK', 'Hong Kong', 'HKD', 'Hong Kong', 'Asia'),
(96, 'HM', 'Heard Island and McDonald Islands', 'AUD', '', 'Antarctica'),
(97, 'HN', 'Honduras', 'HNL', 'Tegucigalpa', 'North America'),
(98, 'HR', 'Croatia', 'HRK', 'Zagreb', 'Europe'),
(99, 'HT', 'Haiti', 'HTG', 'Port-au-Prince', 'North America'),
(100, 'HU', 'Hungary', 'HUF', 'Budapest', 'Europe'),
(101, 'ID', 'Indonesia', 'IDR', 'Jakarta', 'Asia'),
(102, 'IE', 'Ireland', 'EUR', 'Dublin', 'Europe'),
(103, 'IL', 'Israel', 'ILS', '', 'Asia'),
(104, 'IM', 'Isle of Man', 'GBP', 'Douglas', 'Europe'),
(105, 'IN', 'India', 'INR', 'New Delhi', 'Asia'),
(106, 'IO', 'British Indian Ocean Territory', 'USD', '', 'Asia'),
(107, 'IQ', 'Iraq', 'IQD', 'Baghdad', 'Asia'),
(108, 'IR', 'Iran', 'IRR', 'Tehran', 'Asia'),
(109, 'IS', 'Iceland', 'ISK', 'Reykjavik', 'Europe'),
(110, 'IT', 'Italy', 'EUR', 'Rome', 'Europe'),
(111, 'JE', 'Jersey', 'GBP', 'Saint Helier', 'Europe'),
(112, 'JM', 'Jamaica', 'JMD', 'Kingston', 'North America'),
(113, 'JO', 'Jordan', 'JOD', 'Amman', 'Asia'),
(114, 'JP', 'Japan', 'JPY', 'Tokyo', 'Asia'),
(115, 'KE', 'Kenya', 'KES', 'Nairobi', 'Africa'),
(116, 'KG', 'Kyrgyzstan', 'KGS', 'Bishkek', 'Asia'),
(117, 'KH', 'Cambodia', 'KHR', 'Phnom Penh', 'Asia'),
(118, 'KI', 'Kiribati', 'AUD', 'Tarawa', 'Oceania'),
(119, 'KM', 'Comoros', 'KMF', 'Moroni', 'Africa'),
(120, 'KN', 'Saint Kitts and Nevis', 'XCD', 'Basseterre', 'North America'),
(121, 'KP', 'North Korea', 'KPW', 'Pyongyang', 'Asia'),
(122, 'KR', 'South Korea', 'KRW', 'Seoul', 'Asia'),
(123, 'KW', 'Kuwait', 'KWD', 'Kuwait City', 'Asia'),
(124, 'KY', 'Cayman Islands', 'KYD', 'George Town', 'North America'),
(125, 'KZ', 'Kazakhstan', 'KZT', 'Astana', 'Asia'),
(126, 'LA', 'Laos', 'LAK', 'Vientiane', 'Asia'),
(127, 'LB', 'Lebanon', 'LBP', 'Beirut', 'Asia'),
(128, 'LC', 'Saint Lucia', 'XCD', 'Castries', 'North America'),
(129, 'LI', 'Liechtenstein', 'CHF', 'Vaduz', 'Europe'),
(130, 'LK', 'Sri Lanka', 'LKR', 'Colombo', 'Asia'),
(131, 'LR', 'Liberia', 'LRD', 'Monrovia', 'Africa'),
(132, 'LS', 'Lesotho', 'LSL', 'Maseru', 'Africa'),
(133, 'LT', 'Lithuania', 'LTL', 'Vilnius', 'Europe'),
(134, 'LU', 'Luxembourg', 'EUR', 'Luxembourg', 'Europe'),
(135, 'LV', 'Latvia', 'EUR', 'Riga', 'Europe'),
(136, 'LY', 'Libya', 'LYD', 'Tripoli', 'Africa'),
(137, 'MA', 'Morocco', 'MAD', 'Rabat', 'Africa'),
(138, 'MC', 'Monaco', 'EUR', 'Monaco', 'Europe'),
(139, 'MD', 'Moldova', 'MDL', 'Chişinău', 'Europe'),
(140, 'ME', 'Montenegro', 'EUR', 'Podgorica', 'Europe'),
(141, 'MF', 'Saint Martin', 'EUR', 'Marigot', 'North America'),
(142, 'MG', 'Madagascar', 'MGA', 'Antananarivo', 'Africa'),
(143, 'MH', 'Marshall Islands', 'USD', 'Majuro', 'Oceania'),
(144, 'MK', 'Macedonia', 'MKD', 'Skopje', 'Europe'),
(145, 'ML', 'Mali', 'XOF', 'Bamako', 'Africa'),
(146, 'MM', 'Myanmar [Burma]', 'MMK', 'Nay Pyi Taw', 'Asia'),
(147, 'MN', 'Mongolia', 'MNT', 'Ulan Bator', 'Asia'),
(148, 'MO', 'Macao', 'MOP', 'Macao', 'Asia'),
(149, 'MP', 'Northern Mariana Islands', 'USD', 'Saipan', 'Oceania'),
(150, 'MQ', 'Martinique', 'EUR', 'Fort-de-France', 'North America'),
(151, 'MR', 'Mauritania', 'MRO', 'Nouakchott', 'Africa'),
(152, 'MS', 'Montserrat', 'XCD', 'Plymouth', 'North America'),
(153, 'MT', 'Malta', 'EUR', 'Valletta', 'Europe'),
(154, 'MU', 'Mauritius', 'MUR', 'Port Louis', 'Africa'),
(155, 'MV', 'Maldives', 'MVR', 'Malé', 'Asia'),
(156, 'MW', 'Malawi', 'MWK', 'Lilongwe', 'Africa'),
(157, 'MX', 'Mexico', 'MXN', 'Mexico City', 'North America'),
(158, 'MY', 'Malaysia', 'MYR', 'Kuala Lumpur', 'Asia'),
(159, 'MZ', 'Mozambique', 'MZN', 'Maputo', 'Africa'),
(160, 'NA', 'Namibia', 'NAD', 'Windhoek', 'Africa'),
(161, 'NC', 'New Caledonia', 'XPF', 'Noumea', 'Oceania'),
(162, 'NE', 'Niger', 'XOF', 'Niamey', 'Africa'),
(163, 'NF', 'Norfolk Island', 'AUD', 'Kingston', 'Oceania'),
(164, 'NG', 'Nigeria', 'NGN', 'Abuja', 'Africa'),
(165, 'NI', 'Nicaragua', 'NIO', 'Managua', 'North America'),
(166, 'NL', 'Netherlands', 'EUR', 'Amsterdam', 'Europe'),
(167, 'NO', 'Norway', 'NOK', 'Oslo', 'Europe'),
(168, 'NP', 'Nepal', 'NPR', 'Kathmandu', 'Asia'),
(169, 'NR', 'Nauru', 'AUD', '', 'Oceania'),
(170, 'NU', 'Niue', 'NZD', 'Alofi', 'Oceania'),
(171, 'NZ', 'New Zealand', 'NZD', 'Wellington', 'Oceania'),
(172, 'OM', 'Oman', 'OMR', 'Muscat', 'Asia'),
(173, 'PA', 'Panama', 'PAB', 'Panama City', 'North America'),
(174, 'PE', 'Peru', 'PEN', 'Lima', 'South America'),
(175, 'PF', 'French Polynesia', 'XPF', 'Papeete', 'Oceania'),
(176, 'PG', 'Papua New Guinea', 'PGK', 'Port Moresby', 'Oceania'),
(177, 'PH', 'Philippines', 'PHP', 'Manila', 'Asia'),
(178, 'PK', 'Pakistan', 'PKR', 'Islamabad', 'Asia'),
(179, 'PL', 'Poland', 'PLN', 'Warsaw', 'Europe'),
(180, 'PM', 'Saint Pierre and Miquelon', 'EUR', 'Saint-Pierre', 'North America'),
(181, 'PN', 'Pitcairn Islands', 'NZD', 'Adamstown', 'Oceania'),
(182, 'PR', 'Puerto Rico', 'USD', 'San Juan', 'North America'),
(183, 'PS', 'Palestine', 'ILS', '', 'Asia'),
(184, 'PT', 'Portugal', 'EUR', 'Lisbon', 'Europe'),
(185, 'PW', 'Palau', 'USD', 'Melekeok - Palau State Capital', 'Oceania'),
(186, 'PY', 'Paraguay', 'PYG', 'Asunción', 'South America'),
(187, 'QA', 'Qatar', 'QAR', 'Doha', 'Asia'),
(188, 'RE', 'Réunion', 'EUR', 'Saint-Denis', 'Africa'),
(189, 'RO', 'Romania', 'RON', 'Bucharest', 'Europe'),
(190, 'RS', 'Serbia', 'RSD', 'Belgrade', 'Europe'),
(191, 'RU', 'Russia', 'RUB', 'Moscow', 'Europe'),
(192, 'RW', 'Rwanda', 'RWF', 'Kigali', 'Africa'),
(193, 'SA', 'Saudi Arabia', 'SAR', 'Riyadh', 'Asia'),
(194, 'SB', 'Solomon Islands', 'SBD', 'Honiara', 'Oceania'),
(195, 'SC', 'Seychelles', 'SCR', 'Victoria', 'Africa'),
(196, 'SD', 'Sudan', 'SDG', 'Khartoum', 'Africa'),
(197, 'SE', 'Sweden', 'SEK', 'Stockholm', 'Europe'),
(198, 'SG', 'Singapore', 'SGD', 'Singapore', 'Asia'),
(199, 'SH', 'Saint Helena', 'SHP', 'Jamestown', 'Africa'),
(200, 'SI', 'Slovenia', 'EUR', 'Ljubljana', 'Europe'),
(201, 'SJ', 'Svalbard and Jan Mayen', 'NOK', 'Longyearbyen', 'Europe'),
(202, 'SK', 'Slovakia', 'EUR', 'Bratislava', 'Europe'),
(203, 'SL', 'Sierra Leone', 'SLL', 'Freetown', 'Africa'),
(204, 'SM', 'San Marino', 'EUR', 'San Marino', 'Europe'),
(205, 'SN', 'Senegal', 'XOF', 'Dakar', 'Africa'),
(206, 'SO', 'Somalia', 'SOS', 'Mogadishu', 'Africa'),
(207, 'SR', 'Suriname', 'SRD', 'Paramaribo', 'South America'),
(208, 'SS', 'South Sudan', 'SSP', 'Juba', 'Africa'),
(209, 'ST', 'São Tomé and Príncipe', 'STD', 'São Tomé', 'Africa'),
(210, 'SV', 'El Salvador', 'USD', 'San Salvador', 'North America'),
(211, 'SX', 'Sint Maarten', 'ANG', 'Philipsburg', 'North America'),
(212, 'SY', 'Syria', 'SYP', 'Damascus', 'Asia'),
(213, 'SZ', 'Swaziland', 'SZL', 'Mbabane', 'Africa'),
(214, 'TC', 'Turks and Caicos Islands', 'USD', 'Cockburn Town', 'North America'),
(215, 'TD', 'Chad', 'XAF', 'N\'Djamena', 'Africa'),
(216, 'TF', 'French Southern Territories', 'EUR', 'Port-aux-Français', 'Antarctica'),
(217, 'TG', 'Togo', 'XOF', 'Lomé', 'Africa'),
(218, 'TH', 'Thailand', 'THB', 'Bangkok', 'Asia'),
(219, 'TJ', 'Tajikistan', 'TJS', 'Dushanbe', 'Asia'),
(220, 'TK', 'Tokelau', 'NZD', '', 'Oceania'),
(221, 'TL', 'East Timor', 'USD', 'Dili', 'Oceania'),
(222, 'TM', 'Turkmenistan', 'TMT', 'Ashgabat', 'Asia'),
(223, 'TN', 'Tunisia', 'TND', 'Tunis', 'Africa'),
(224, 'TO', 'Tonga', 'TOP', 'Nuku\'alofa', 'Oceania'),
(225, 'TR', 'Turkey', 'TRY', 'Ankara', 'Asia'),
(226, 'TT', 'Trinidad and Tobago', 'TTD', 'Port of Spain', 'North America'),
(227, 'TV', 'Tuvalu', 'AUD', 'Funafuti', 'Oceania'),
(228, 'TW', 'Taiwan', 'TWD', 'Taipei', 'Asia'),
(229, 'TZ', 'Tanzania', 'TZS', 'Dodoma', 'Africa'),
(230, 'UA', 'Ukraine', 'UAH', 'Kyiv', 'Europe'),
(231, 'UG', 'Uganda', 'UGX', 'Kampala', 'Africa'),
(232, 'UM', 'U.S. Minor Outlying Islands', 'USD', '', 'Oceania'),
(233, 'US', 'United States', 'USD', 'Washington', 'North America'),
(234, 'UY', 'Uruguay', 'UYU', 'Montevideo', 'South America'),
(235, 'UZ', 'Uzbekistan', 'UZS', 'Tashkent', 'Asia'),
(236, 'VA', 'Vatican City', 'EUR', 'Vatican', 'Europe'),
(237, 'VC', 'Saint Vincent and the Grenadines', 'XCD', 'Kingstown', 'North America'),
(238, 'VE', 'Venezuela', 'VEF', 'Caracas', 'South America'),
(239, 'VG', 'British Virgin Islands', 'USD', 'Road Town', 'North America'),
(240, 'VI', 'U.S. Virgin Islands', 'USD', 'Charlotte Amalie', 'North America'),
(241, 'VN', 'Vietnam', 'VND', 'Hanoi', 'Asia'),
(242, 'VU', 'Vanuatu', 'VUV', 'Port Vila', 'Oceania'),
(243, 'WF', 'Wallis and Futuna', 'XPF', 'Mata-Utu', 'Oceania'),
(244, 'WS', 'Samoa', 'WST', 'Apia', 'Oceania'),
(245, 'XK', 'Kosovo', 'EUR', 'Pristina', 'Europe'),
(246, 'YE', 'Yemen', 'YER', 'Sanaa', 'Asia'),
(247, 'YT', 'Mayotte', 'EUR', 'Mamoutzou', 'Africa'),
(248, 'ZA', 'South Africa', 'ZAR', 'Pretoria', 'Africa'),
(249, 'ZM', 'Zambia', 'ZMW', 'Lusaka', 'Africa'),
(250, 'ZW', 'Zimbabwe', 'ZWL', 'Harare', 'Africa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_css`
--

CREATE TABLE `vcard_css` (
  `ID` int(9) UNSIGNED NOT NULL,
  `tema` varchar(50) NOT NULL,
  `general` varchar(50) NOT NULL,
  `body` varchar(50) NOT NULL,
  `fuente` varchar(100) NOT NULL,
  `size` varchar(10) NOT NULL,
  `color` varchar(20) NOT NULL,
  `fondo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_css2`
--

CREATE TABLE `vcard_css2` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_depa`
--

CREATE TABLE `vcard_depa` (
  `ID` int(2) UNSIGNED NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `list_depa` varchar(100) NOT NULL,
  `puesto` varchar(100) NOT NULL,
  `nivel` int(1) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_depa`
--

INSERT INTO `vcard_depa` (`ID`, `nombre`, `list_depa`, `puesto`, `nivel`, `icono`, `visible`) VALUES
(1, 'Administrador', 'Administradores', 'Administrador', 1, '', 0),
(2, 'Edecan', 'Edecanes', 'Edecan', 2, '', 1),
(3, 'Modelo', 'Modelos', 'Modelo', 2, '', 0),
(4, 'Fotografo', 'Fotografos', 'Fotografo', 2, '', 1),
(5, 'Agencia', 'Agencias', 'Agencia', 2, '', 1),
(6, 'Escuela', 'Escuelas', 'Escuela', 2, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_histo_backupdb`
--

CREATE TABLE `vcard_histo_backupdb` (
  `ID` int(9) UNSIGNED NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `archivo` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_home_config`
--

CREATE TABLE `vcard_home_config` (
  `ID` int(1) UNSIGNED NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `contenido` text NOT NULL,
  `selc` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_home_config`
--

INSERT INTO `vcard_home_config` (`ID`, `titulo`, `contenido`, `selc`, `activo`) VALUES
(1, 'phponix backup', '<!--Contenido Generado MySql-->\r\n<div id=\"content1\">\r\n<div id=\"intro\">\r\n<div class=\"clear\">&nbsp;</div>\r\n<h2>PHP Onix el mejor CMS para crear y administrar tu sitio web.</h2>\r\n<div class=\"clear\">&nbsp;</div>\r\n<p style=\"font-size: 16px;\">Con <strong>PHPOnix</strong> podras instalar y crear tu sitio web en 5 minutos ademas con herramientas para gestionar, monitoriar y posicionar tu p&aacute;gina web. <strong>PHPOnix</strong> cuenta con multiples funcionalidades desde crear un p&aacute;gina <strong>web standar</strong>, <strong>landingpage</strong>, <strong>intranet</strong>, <strong>blog</strong>, <strong>catalogo</strong>, <strong>portafolio</strong>, incluso una tienda virtual*(<strong>ecommerce</strong>) para tu negocio o servicio tu elijes la funcionalidad.</p>\r\n<div class=\"clear\">&nbsp;</div>\r\n<div class=\"col-md-4 col-sm-6 col-xs-12\" style=\"text-align: center;\">\r\n<h3>Sitio Web</h3>\r\n<img src=\"./modulos/Home/img/web.png\" alt=\"\" width=\"80%\" /></div>\r\n<div class=\"col-md-4 col-sm-6 col-xs-12\" style=\"text-align: center;\">\r\n<h3>LandingPage</h3>\r\n<img src=\"./modulos/Home/img/intuitivo.png\" alt=\"\" width=\"80%\" /></div>\r\n<div class=\"col-md-4 col-sm-6 col-xs-12\" style=\"text-align: center;\">\r\n<h3>Ecommerce</h3>\r\n<img src=\"./modulos/Home/img/ecommerce.png\" alt=\"\" width=\"80%\" /></div>\r\n</div>\r\n</div>\r\n<div id=\"content2\">\r\n<div id=\"beneficios\">\r\n<div class=\"clear\">&nbsp;</div>\r\n<h2>Beneficios</h2>\r\n<div class=\"clear\">&nbsp;</div>\r\n<p>&nbsp;</p>\r\n<div class=\"clear\">&nbsp;</div>\r\n<div class=\"col-md-4 col-sm-6 col-xs-12\" style=\"text-align: center;\">\r\n<h3>Multi-Dispositivos</h3>\r\n<img src=\"./modulos/Home/img/multidispositivo.png\" alt=\"\" width=\"80%\" /></div>\r\n<div class=\"col-md-4 col-sm-6 col-xs-12\" style=\"text-align: center;\">\r\n<h3>Reporte de Estadisticas</h3>\r\n<img src=\"./modulos/Home/img/estadisticas.png\" alt=\"\" width=\"80%\" /></div>\r\n<div class=\"col-md-4 col-sm-6 col-xs-12\" style=\"text-align: center;\">\r\n<h3>Gestion de Contenido</h3>\r\n<img src=\"./modulos/Home/img/busqueda-sistema.png\" alt=\"\" width=\"80%\" /></div>\r\n</div>\r\n</div>', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_iconos`
--

CREATE TABLE `vcard_iconos` (
  `ID` int(6) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `fa_icon` varchar(100) NOT NULL,
  `icon` text NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_iconos`
--

INSERT INTO `vcard_iconos` (`ID`, `nom`, `fa_icon`, `icon`, `tipo`) VALUES
(1, 'Descarga', 'fa-download', '<i class=\"fa fa-download\"></i>', 'awesome'),
(2, 'Menu', 'fa-list', '<i class=\"fa fa-list\"></i>', 'awesome'),
(3, 'Configuracion', 'fa-gear', '<i class=\"fa fa-gear\"></i>', 'awesome'),
(4, 'Configuraciones', 'fa-gears', '<i class=\"fa fa-gear\"></i>', 'awesome'),
(5, 'Modulos', 'fa-cubes', '<i class=\"fa fa-cubes\"></i>', 'awesome'),
(6, 'Home', 'fa-home', '<i class=\"fa fa-home\"></i>', 'awesome'),
(7, 'Portafolio', 'fa-briefcase', '<i class=\"fa fa-briefcase\"></i>', 'awesome'),
(8, 'Blog', 'fa-comments', '<i class=\"fa fa-comments\"></i>', 'awesome'),
(9, 'BlockIP', 'fa-crosshairs', '<i class=\"fa fa-crosshairs\"></i>', 'awesome'),
(10, 'Estadisticas', 'fa-bar-chart', '<i class=\"fa fa-bar-chart\"></i>', 'awesome'),
(11, 'Moneda', 'fa-usd', '<i class=\"fa fa-usd\"></i>', 'awesome'),
(12, 'Dashboard', 'fa-dashboard', '<i class=\"fa fa-dashboard\"></i>', 'awesome'),
(13, 'Usuario', 'fa-user', '<i class=\"fa fa-user\"></i>', 'awesome'),
(14, 'Usuarios', 'fa-users', '<i class=\"fa fa-users\"></i>', 'awesome'),
(15, 'Global', 'fa-globe', '<i class=\"fa fa-globe\"></i>', 'awesome'),
(16, 'Ver', 'fa-eye', '<i class=\"fa fa-eye\"></i>', 'awesome'),
(17, 'Enviar', 'fa-send-o', '<i class=\"fa fa-send-o\"></i>', 'awesome'),
(18, 'Mail', 'fa-envelope', '<i class=\"fa  fa-envelope\"></i>', 'awesome'),
(19, 'Marca de Mapa', 'fa-map-marker', '<i class=\"fa  fa-map-marker\"></i>', 'awesome'),
(20, 'Formularios', 'fa-pencil-square-o', '<i class=\"fa  fa-pencil-square-o\"></i>', 'awesome'),
(21, 'Carrito', 'fa-shopping-cart', '<i class=\"fa fa-shopping-cart\"></i>', 'awesome'),
(22, 'Folder Open Blanco', 'fa-folder-open-o', '<i class=\"fa fa-folder-open-o\"></i>', 'awesome'),
(23, 'Folder Open', 'fa-folder-open', '<i class=\"fa fa-folder-open\"></i>', 'awesome'),
(24, 'Tesmoniales', 'fa-commenting', '<i class=\"fa fa-commenting\"></i>', 'awesome'),
(25, 'Clientes', 'fa-child', '<i class=\"fa fa-child\"></i>', 'awesome'),
(26, 'Mapa', 'fa-map', '<i class=\"fa fa-map\" aria-hidden=\"true\"></i>', 'awesome'),
(27, 'Sitemap', 'fa-sitemap', '<i class=\"fa fa-sitemap\"></i>', 'awesome'),
(28, 'Check Square', 'fa-check-square', '<i class=\"fa fa-check-square\"></i>', 'awesome'),
(29, 'Play', 'fa-caret-square-o-right', '<i class=\"fa fa-caret-square-o-right\"></i>', 'awesome'),
(30, 'Curso', 'fa-university', '<i class=\"fa fa-university\"></i>', 'awesome'),
(31, 'Paint-brush', 'fa-paint-brush', '<i class=\"fa fa-paint-brush\"></i>', 'awesome'),
(32, 'Vcard', 'fa-vcard', '<i class=\"fa fa-vcard\"></i>', 'awesome');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_ipbann`
--

CREATE TABLE `vcard_ipbann` (
  `ID` int(11) NOT NULL,
  `ip` varchar(256) NOT NULL DEFAULT '',
  `bloqueo` tinyint(1) NOT NULL,
  `alta` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_ipbann`
--

INSERT INTO `vcard_ipbann` (`ID`, `ip`, `bloqueo`, `alta`) VALUES
(1, '127.0.0.5', 0, '2017-10-17 11:55:47'),
(2, '174.128.181.67', 0, '2019-11-23 10:01:09'),
(3, '174.128.181.68', 0, '2019-11-23 10:01:56'),
(4, '78.0.3904.70', 0, '2019-11-23 10:02:19'),
(5, '189.166.7.220', 0, '2019-11-23 10:02:38'),
(6, '165.227.41.143', 0, '2019-11-23 10:02:54'),
(7, '159.203.34.197', 0, '2019-11-23 10:03:24'),
(8, '167.99.177.203', 0, '2019-11-24 08:55:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_landingpage_seccion`
--

CREATE TABLE `vcard_landingpage_seccion` (
  `ID` int(6) UNSIGNED NOT NULL,
  `seccion` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `tit` varchar(150) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `conte` varchar(254) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `visible` varchar(1) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_landingpage_seccion`
--

INSERT INTO `vcard_landingpage_seccion` (`ID`, `seccion`, `tit`, `conte`, `visible`) VALUES
(1, 'Nosotros', '', '', '1'),
(2, 'Equipo', '', '', '1'),
(3, 'Servicios', '', '', '1'),
(4, 'Portafolio', '', '', '1'),
(5, 'Clientes', '', '', '1'),
(6, 'Contacto', '', '', '1'),
(7, 'Testimoniales', '', '', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_map_config`
--

CREATE TABLE `vcard_map_config` (
  `ID` int(6) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `lat` varchar(20) NOT NULL,
  `lng` varchar(20) NOT NULL,
  `zoom` varchar(2) NOT NULL,
  `cover` varchar(50) NOT NULL,
  `on_costo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_map_config`
--

INSERT INTO `vcard_map_config` (`ID`, `nom`, `lat`, `lng`, `zoom`, `cover`, `on_costo`) VALUES
(1, 'Querétaro', '20.5931297', '-100.3920483', '12', 'g_intelmex.png', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_map_ubicacion`
--

CREATE TABLE `vcard_map_ubicacion` (
  `ID` int(9) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `adres` varchar(150) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `info` varchar(250) NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `tel` varchar(30) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `nivel` varchar(2) NOT NULL,
  `rol` varchar(2) NOT NULL,
  `lat` varchar(15) NOT NULL,
  `lng` varchar(15) NOT NULL,
  `alta` varchar(20) NOT NULL,
  `fmod` varchar(20) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_map_ubicacion`
--

INSERT INTO `vcard_map_ubicacion` (`ID`, `nom`, `adres`, `descripcion`, `info`, `precio`, `tel`, `cover`, `nivel`, `rol`, `lat`, `lng`, `alta`, `fmod`, `visible`, `activo`) VALUES
(1, 'Intelmex', 'Calle 1 303, Jurica, 76130 Santiago de Querétaro, Qro.', '', 'Reparación de telefonos', '0.00', '4421234567', 'nodisponible.jpg', '1', '3', '20.6500317', '-100.4290312', '2018-04-03 13:44:50', '2018-04-03 13:59:06', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_menu_admin`
--

CREATE TABLE `vcard_menu_admin` (
  `ID` int(6) UNSIGNED NOT NULL,
  `nom_menu` varchar(50) NOT NULL,
  `icono` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `nivel` int(1) NOT NULL,
  `ID_menu_adm` int(2) NOT NULL,
  `ID_mod` int(2) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_menu_admin`
--

INSERT INTO `vcard_menu_admin` (`ID`, `nom_menu`, `icono`, `link`, `nivel`, `ID_menu_adm`, `ID_mod`, `visible`) VALUES
(1, 'Config. Sistema', 'fa-gear', 'index.php?mod=sys&ext=admin/index', -1, 0, 9, 1),
(2, 'Modulos', 'fa-cubes', 'index.php?mod=sys&ext=modulos', -1, 0, 0, 1),
(3, 'Logs', 'fa-globe', 'index.php?mod=sys&ext=admin/index&opc=logs', -1, 0, 9, 1),
(4, 'Bloquear IP', 'fa-crosshairs', 'index.php?mod=sys&ext=admin/index&opc=bloquear', -1, 0, 9, 1),
(5, 'Temas', 'fa-sticky-note-o', 'index.php?mod=sys&ext=admin/index&opc=temas', -1, 0, 9, 1),
(6, 'Admin. Usuarios', 'fa-users', 'index.php?mod=usuarios&ext=admin/index', -1, 0, 4, 0),
(7, 'Menu Admin', 'fa-list', 'index.php?mod=sys&ext=menu_admin', -1, 0, 9, 1),
(8, 'Iconos', 'fa-smile-o', 'index.php?mod=sys&ext=admin/index&opc=iconos', -1, 0, 9, 1),
(9, 'Informe de Visitas', 'fa-download', 'index.php?mod=estadisticas&ext=admin/index', 1, 0, 10, 1),
(10, 'Backup DB', 'fa-download', 'index.php?mod=sys&ext=backup', -1, 0, 9, 1),
(11, 'Config. Mailbox', 'fa-gear', 'index.php?mod=mailbox&ext=admin/index', 1, 0, 12, 1),
(12, 'Mensajes', 'fa-envelope', 'index.php?mod=mailbox', 1, 0, 12, 1),
(13, 'Editar', 'fa-home', 'index.php?mod=Home&ext=admin/index', 1, 0, 3, 1),
(14, 'Menu Web', 'fa-list', 'index.php?mod=Home&ext=admin/index&opc=menu_web', 1, 0, 3, 1),
(15, 'Admin productos', 'fa-shopping-cart', 'index.php?mod=productos&ext=admin/index&opc=producto', 1, 0, 15, 1),
(16, 'Categoria de productos', 'fa-folder-open', 'index.php?mod=productos&ext=admin/index&opc=categoria', 1, 0, 15, 1),
(17, 'Subcategoria de productos', 'fa-folder-open-o', 'index.php?mod=productos&ext=admin/index&opc=subcategoria', 1, 0, 15, 1),
(18, 'Config. Gmaps', 'fa-gear', 'index.php?mod=gmaps&ext=admin/index', 1, 0, 16, 1),
(19, 'Ubicaciones', 'fa-map-marker', 'index.php?mod=gmaps&ext=admin/index&opc=ubicaciones', 1, 0, 16, 1),
(20, 'Config. Contacto', 'fa-gear', 'index.php?mod=contacto&ext=admin/index', 1, 0, 8, 1),
(21, 'Correos de Formulario', 'fa-pencil-square-o', 'index.php?mod=contacto&ext=admin/index&opc=forms', 1, 0, 8, 1),
(22, 'Generador Sitemap', 'fa-sitemap', 'index.php?mod=sys&ext=admin/index&opc=sitemap', 1, 0, 9, 1),
(23, 'Opciones', 'fa-gears', 'index.php?mod=sys&ext=opciones', 1, 0, 9, 1),
(24, 'Licencia', 'fa-eye', 'index.php?mod=sys&ext=licencia', -1, 0, 9, 1),
(25, 'Slider', 'fa-caret-square-o-right', 'index.php?mod=Home&ext=admin/index&opc=slider', 1, 0, 3, 1),
(26, 'Testimonios', 'fa-child', 'index.php?mod=Home&ext=admin/index&opc=testimonios', 1, 0, 3, 1),
(27, 'Tema', 'fa-paint-brush', 'index.php?mod=Home&ext=admin/index&opc=tema', 1, 0, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_menu_web`
--

CREATE TABLE `vcard_menu_web` (
  `ID` int(6) UNSIGNED NOT NULL,
  `menu` varchar(50) NOT NULL,
  `url` varchar(254) NOT NULL,
  `modulo` varchar(100) NOT NULL,
  `ext` varchar(50) NOT NULL,
  `ord` varchar(2) NOT NULL,
  `subm` varchar(3) NOT NULL,
  `ima_top` varchar(100) NOT NULL,
  `tit_sec` varchar(100) NOT NULL,
  `des_sec` text NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_menu_web`
--

INSERT INTO `vcard_menu_web` (`ID`, `menu`, `url`, `modulo`, `ext`, `ord`, `subm`, `ima_top`, `tit_sec`, `des_sec`, `visible`) VALUES
(1, 'Inicio', 'index.php', 'Home', '', '1', '', 'gris.png', '', '', 1),
(2, 'Nosotros', '#', 'nosotros', '', '2', '', 'gris.png', '', '', 0),
(3, 'Portafolio', 'portafolio/', 'portafolio', '', '3', '', 'gris.png', '', '', 0),
(4, 'Blog', 'blog/', 'blog', '', '4', '', 'gris.png', '', '', 0),
(5, 'Contacto', '#', 'contacto', '', '5', '', 'gris.png', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_mode_page`
--

CREATE TABLE `vcard_mode_page` (
  `ID` int(2) UNSIGNED NOT NULL,
  `page_mode` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_mode_page`
--

INSERT INTO `vcard_mode_page` (`ID`, `page_mode`) VALUES
(1, 'page'),
(2, 'landingpage'),
(3, 'extranet'),
(4, 'ecommerce'),
(5, 'CRM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_modulos`
--

CREATE TABLE `vcard_modulos` (
  `ID` int(6) NOT NULL,
  `nombre` varchar(25) NOT NULL DEFAULT '',
  `modulo` varchar(100) NOT NULL DEFAULT '',
  `description` varchar(250) NOT NULL,
  `dashboard` tinyint(1) NOT NULL,
  `nivel` tinyint(4) NOT NULL DEFAULT 0,
  `home` tinyint(4) NOT NULL DEFAULT 0,
  `visible` tinyint(4) NOT NULL DEFAULT 0,
  `activo` tinyint(4) NOT NULL DEFAULT 0,
  `sname` varchar(10) NOT NULL DEFAULT '',
  `icono` varchar(50) NOT NULL,
  `link` varchar(250) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_modulos`
--

INSERT INTO `vcard_modulos` (`ID`, `nombre`, `modulo`, `description`, `dashboard`, `nivel`, `home`, `visible`, `activo`, `sname`, `icono`, `link`) VALUES
(1, 'admin', 'admin', '', 0, 0, 0, 0, 0, 'false', '', ''),
(2, 'Dashboard', 'dashboard', '', 1, -1, 0, 0, 1, 'false', '', 'index.php?mod=dashboard'),
(3, 'Home', 'Home', 'Administración y gestión del Home.', 0, 0, 1, 1, 1, 'false', 'fa-home', 'index.php?mod=Home'),
(4, 'Usuarios', 'usuarios', 'Administación y gestión de usuarios.', 0, -1, 0, 1, 1, 'false', 'fa-users', 'index.php?mod=usuarios'),
(5, 'Nosotros', '', 'Administración del contenido del modulo de nosotros.', 0, 0, 0, 0, 0, 'false', 'fa-users', 'index.php?mod=nosotros'),
(6, 'Portafolio', 'portafolio', 'Administraci&oacute;n y gesti&oacute;n del portafolio.', 0, 0, 0, 0, 0, 'false', 'fa-briefcase', 'index.php?mod=portafolio'),
(7, 'Blog', 'blog', 'Administración del contenido del modulo de blog.', 0, 0, 0, 1, 1, 'false', 'fa-comments', 'index.php?mod=blog'),
(8, 'Contacto', 'contacto', 'Consultas del modulo de contacto.', 0, 0, 0, 1, 1, 'false', 'fa-map-marker', 'index.php?mod=contacto'),
(9, 'Sistema', 'sys', 'Configuración y administración del sistema.', 1, -1, 0, 1, 1, 'false', 'fa-gear', 'index.php?mod=sys'),
(10, 'Estadistica', 'estadisticas', 'Estadisticas de trafico. ', 0, -1, 0, 1, 1, 'false', 'fa-bar-chart', 'index.php?mod=estadisticas'),
(11, 'Formularios', 'forms', 'Administracion de Formularios para la web.', 1, 1, 0, 0, 0, 'false', 'fa-pencil-square-o', 'index.php?mod=forms'),
(12, 'Mailbox', 'mailbox', 'Mailbox de formularios', 1, 1, 0, 1, 1, 'false', ' fa-envelope', 'index.php?mod=mailbox'),
(13, 'Ecommerce', 'ecommerce', 'Administración y gestión del modulo ecommerce.', 0, 1, 0, 0, 0, 'false', 'fa-shopping-cart', 'index.php?mod=ecommerce'),
(14, 'Marketing', 'marketing', '', 0, 1, 0, 0, 0, 'false', 'fa-globe', 'index.php?mod=marketing'),
(15, 'Productos', '', 'Administración de productos', 0, 1, 0, 0, 0, 'false', 'fa-shopping-cart', 'index.php?mod=productos'),
(16, 'Gmaps', '', 'Mapas de Google', 0, 0, 0, 0, 0, 'false', 'fa-map', 'index.php?mod=gmaps'),
(17, 'Chat', 'chat', 'Administración del modulo chat.', 0, 1, 0, 0, 1, 'false', 'fa-commenting', 'index.php?mod=chat'),
(18, 'Directorio', 'directorio', 'Administrador del modulo de Directorio.', 0, 1, 0, 0, 0, 'false', 'fa-globe', 'index.php?mod=directorio'),
(19, 'descargas', 'descargas', 'Administrador del modulo descargas', 0, 1, 0, 0, 0, 'false', 'fa-download', 'index.php?mod=descargas'),
(20, 'Vcard', 'vcard', 'Administraci&oacute;n de tarjetas virtuales', 0, 1, 0, 1, 1, 'false', 'fa-vcard', 'index.php?mod=vcard'),
(21, 'Vcard2', 'vcard2', 'Administraci?n  de Tarjetas Digitales', 0, 1, 0, 1, 1, 'false', 'fa-vcard', 'index.php?mod=vcard2'),
(22, 'Login', 'login', '', 0, 0, 0, 0, 1, 'false', 'fa-users', 'index.php?mod=login');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_notificacion`
--

CREATE TABLE `vcard_notificacion` (
  `ID` int(11) UNSIGNED NOT NULL,
  `ID_user` int(11) NOT NULL,
  `ID_user2` int(11) NOT NULL,
  `nombre_envio` varchar(255) NOT NULL,
  `mensaje` text NOT NULL,
  `visto` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `fecha` varchar(22) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_notificacion`
--

INSERT INTO `vcard_notificacion` (`ID`, `ID_user`, `ID_user2`, `nombre_envio`, `mensaje`, `visto`, `activo`, `fecha`) VALUES
(1, 1, 1, 'admin', 'Su sistema PHPONIX ha sido actualizado.', 1, 1, '2019-06-27 23:09:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_opciones`
--

CREATE TABLE `vcard_opciones` (
  `ID` int(6) UNSIGNED NOT NULL,
  `nom` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `valor` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_opciones`
--

INSERT INTO `vcard_opciones` (`ID`, `nom`, `descripcion`, `valor`) VALUES
(1, 'google_analytics', '', '1'),
(2, 'form_registro', '', '1'),
(3, 'geo_loc_visitas', '', '0'),
(4, 'slide_active', '', '1'),
(5, 'API_facebook', '', '0'),
(6, 'API_google_maps', '', '0'),
(7, 'api_noti_chrome', '', '0'),
(8, 'link_var', '', '0'),
(9, 'link_productos', '', '0'),
(10, 'tiny_text_des', '', '0'),
(11, 'email_test', '', '1'),
(12, 'skin_AdminLTE', '', 'blue'),
(13, 'mini_bar_AdminLTE', '', '0'),
(14, 'wordpress', '', '0'),
(15, 'bar_login', '', '0'),
(16, 'bar_productos', '', '0'),
(17, 'toogle_nombre', '', '0'),
(18, 'mostrar_precio', '', '0'),
(19, 'mostrar_nombre', '', '0'),
(20, 'mostrar_des_corta', '', '0'),
(21, 'mostrar_des', '', '0'),
(22, 'mostrar_galeria', '', '0'),
(23, 'b_vista_rapida', '', '0'),
(24, 'b_ver_pro', '', '0'),
(25, 'b_cotizar', '', '0'),
(26, 'b_cart', '', '0'),
(27, 'b_paypal', '', '0'),
(28, 'blog_coment', '', '1'),
(29, 'noticias_coment', '', '0'),
(30, 'cursos_coment', '', '0'),
(31, 'productos_coment', '', '0'),
(32, 'all_productos', '', '0'),
(33, 'e_rates', '', '0'),
(34, 'footer_dir', '', '0'),
(35, 'validacion_json', '', '0'),
(36, 'url_var_json', '', '0'),
(37, 'VUE2', '', '0'),
(38, 'api_social_chat', 'Chat de redes sociales', '0'),
(39, 'AJAX', '', '1'),
(40, 'api_icon', '', '1'),
(41, 'web_style', '', '1'),
(42, 'api_WPA', '', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_pages`
--

CREATE TABLE `vcard_pages` (
  `ID` int(6) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `contenido` text NOT NULL,
  `modulo` varchar(50) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `ext` varchar(50) NOT NULL,
  `url` varchar(250) NOT NULL,
  `fmod` varchar(20) NOT NULL,
  `alta` varchar(20) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_pages`
--

INSERT INTO `vcard_pages` (`ID`, `titulo`, `contenido`, `modulo`, `tema`, `ext`, `url`, `fmod`, `alta`, `visible`, `activo`) VALUES
(1, 'Nosotros 1', '<p style=\"text-align: center;\"><span style=\"font-size: 16px;\"><strong><br /></strong></span></p>\r\n<p style=\"text-align: center;\"><span style=\"font-size: 16px;\"><strong>Nosotros</strong></span></p>', 'nosotros', '', '', '', '', '', 0, 1),
(2, 'Sin contenido', '', 'Home', 'vcard2', '', '', '', '', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_portafolio`
--

CREATE TABLE `vcard_portafolio` (
  `ID` int(6) UNSIGNED NOT NULL,
  `clave` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` decimal(6,2) NOT NULL,
  `cate` varchar(50) NOT NULL,
  `resena` varchar(500) NOT NULL,
  `url_page` varchar(150) NOT NULL,
  `imagen1` varchar(100) NOT NULL,
  `imagen2` varchar(100) NOT NULL,
  `imagen3` varchar(100) NOT NULL,
  `imagen4` varchar(100) NOT NULL,
  `imagen5` varchar(100) NOT NULL,
  `visible` tinyint(1) NOT NULL,
  `alta` varchar(21) NOT NULL,
  `fmod` varchar(21) NOT NULL,
  `user` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_portafolio`
--

INSERT INTO `vcard_portafolio` (`ID`, `clave`, `nombre`, `cover`, `foto`, `descripcion`, `precio`, `cate`, `resena`, `url_page`, `imagen1`, `imagen2`, `imagen3`, `imagen4`, `imagen5`, `visible`, `alta`, `fmod`, `user`) VALUES
(1, '', 'Betrec', '1-compressor.jpg', '', 'Descripcion', '0.00', 'Categoria', 'RESEÑA', '', 'be1.jpg', '', '', '', '', 1, '2018-01-07 21:10:52', '', 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_registros`
--

CREATE TABLE `vcard_registros` (
  `ID` int(9) UNSIGNED NOT NULL,
  `ip` varchar(25) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `para` varchar(50) NOT NULL,
  `de` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `asunto` varchar(150) NOT NULL,
  `msj` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cat_list` varchar(50) NOT NULL,
  `seccion` varchar(50) NOT NULL,
  `tabla` varchar(50) NOT NULL,
  `adjuntos` text NOT NULL,
  `visto` tinyint(1) NOT NULL,
  `status` int(11) NOT NULL,
  `ID_login` int(11) NOT NULL,
  `ID_user` int(11) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_signup`
--

CREATE TABLE `vcard_signup` (
  `ID` int(9) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `level` varchar(2) NOT NULL,
  `lastlogin` datetime NOT NULL,
  `tema` varchar(100) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apaterno` varchar(100) NOT NULL,
  `amaterno` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `cover` varchar(100) NOT NULL,
  `tel` varchar(100) NOT NULL,
  `ext` int(4) NOT NULL,
  `fnac` date NOT NULL,
  `fb` varchar(100) NOT NULL,
  `tw` varchar(100) NOT NULL,
  `puesto` varchar(100) NOT NULL,
  `ndepa` int(1) NOT NULL,
  `depa` varchar(100) NOT NULL,
  `empresa` varchar(100) NOT NULL,
  `adress` varchar(100) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `mpio` varchar(100) NOT NULL,
  `edo` varchar(100) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `genero` varchar(20) NOT NULL,
  `exp` varchar(1000) NOT NULL,
  `likes` int(6) NOT NULL,
  `filtro` varchar(50) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `alta` varchar(20) NOT NULL,
  `actualizacion` varchar(100) NOT NULL,
  `page` varchar(250) NOT NULL,
  `nivel_oper` int(2) NOT NULL,
  `rol` int(2) NOT NULL,
  `ID_plan` int(2) NOT NULL,
  `codigo` varchar(6) NOT NULL,
  `intentos` varchar(2) NOT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_signup`
--

INSERT INTO `vcard_signup` (`ID`, `username`, `password`, `email`, `level`, `lastlogin`, `tema`, `nombre`, `apaterno`, `amaterno`, `foto`, `cover`, `tel`, `ext`, `fnac`, `fb`, `tw`, `puesto`, `ndepa`, `depa`, `empresa`, `adress`, `direccion`, `mpio`, `edo`, `pais`, `genero`, `exp`, `likes`, `filtro`, `zona`, `alta`, `actualizacion`, `page`, `nivel_oper`, `rol`, `ID_plan`, `codigo`, `intentos`, `activo`) VALUES
(1, 'admin', 'c64f923f7f476f0b78716079452e7bdec4b2c016', 'multiportal@outlook.com', '-1', '2020-09-11 23:33:18', 'default', 'Guillermo', 'Jimenez', 'Lopez', 'sinfoto.png', '', '4421944950', 1, '0000-00-00', '', '', 'Programador', 0, '', 'Multiportal', '', '', '', '', '', 'M', '', 0, '0', '', '', 'admin2019xadmin79', '', 0, 0, 0, '944950', '0', 1),
(2, 'demo', '71cc541bd1ccb6670de3f8d40f425ffb7315fe7f', 'demo@gmail.com', '-1', '2020-08-23 20:19:10', 'default', 'Demo', 'Apaterno', 'Amaterno', 'sinfoto.png', 'sincover.jpg', '4421234567', 0, '0000-00-00', '', '', 'Director', 0, '', 'PHPONIX', '', '', '', '', '', 'M', '', 0, '0', '', '', 'demo2019xdemo2017', '', 0, 0, 0, '234567', '0', 1),
(10, 'usuario', 'c76ec709eb8ee62ba3181287dd95ae6f6deb856e', 'memo.jimenez@azell.co', '6', '2020-09-07 19:03:33', 'default', 'Memo Jimenez', '', '', 'sinfoto.png', 'sincover.jpg', '', 0, '0000-00-00', '', '', '', 0, '', '', '', '', '', '', '', '', '', 0, '0', '', '2020-08-31 20:59:01', 'usuario2020xusuario2020', '', 0, 0, 4, 'dam9EP', '0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_slider`
--

CREATE TABLE `vcard_slider` (
  `ID` int(6) UNSIGNED NOT NULL,
  `ima` varchar(100) NOT NULL,
  `tit1` varchar(200) NOT NULL,
  `tit2` varchar(200) NOT NULL,
  `btn_nom` varchar(50) NOT NULL,
  `url` varchar(300) NOT NULL,
  `tema_slider` varchar(50) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_slider`
--

INSERT INTO `vcard_slider` (`ID`, `ima`, `tit1`, `tit2`, `btn_nom`, `url`, `tema_slider`, `visible`) VALUES
(1, 'home.jpg', 'Slider1', '', 'Boton', '', 'default', 0),
(2, 'slide-1.jpg', 'La soluci&oacute;n', 'para llegar a m&aacute;s clientes', 'Registrate', 'https://vcardsapp.herokuapp.com/usuarios/registro/', 'vcard2', 1),
(3, 'slide-2.jpg', 'Mantente en', 'contacto con tus clientes', 'Registrate', 'https://vcardsapp.herokuapp.com/usuarios/registro/', 'vcard2', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_tareas`
--

CREATE TABLE `vcard_tareas` (
  `ID` int(11) UNSIGNED NOT NULL,
  `nom` varchar(100) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(250) CHARACTER SET latin1 NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vcard_tareas`
--

INSERT INTO `vcard_tareas` (`ID`, `nom`, `descripcion`, `visible`) VALUES
(1, 'Vcard', 'Nueva tarea', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_temas`
--

CREATE TABLE `vcard_temas` (
  `ID` int(3) UNSIGNED NOT NULL,
  `tema` varchar(100) NOT NULL,
  `subtema` varchar(100) NOT NULL,
  `selec` tinyint(1) NOT NULL,
  `nivel` varchar(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_temas`
--

INSERT INTO `vcard_temas` (`ID`, `tema`, `subtema`, `selec`, `nivel`) VALUES
(1, 'default', '', 0, '0'),
(5, 'vcard', '', 0, '0'),
(6, 'vcard2', '', 1, '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_testimonios`
--

CREATE TABLE `vcard_testimonios` (
  `ID` int(9) UNSIGNED NOT NULL,
  `cover` varchar(100) NOT NULL,
  `pro` varchar(100) NOT NULL,
  `comentario` text NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vcard_testimonios`
--

INSERT INTO `vcard_testimonios` (`ID`, `cover`, `pro`, `comentario`, `visible`) VALUES
(1, 'testimonial_person2.jpg', 'Ingeniera Civil', 'Super recomendado, la atenci&oacute;n es buenisima y te ayudan con cualquier duda', 1),
(2, 'testimonial_person1.jpg', 'Emprendedor', 'Su curso se me hizo f&aacute;cil y muy creativo, impartidos por excelentes maestros.', 1),
(3, 'testimonial_person3.jpg', 'Ingeniera Industrial', 'Super recomendado, la atenci&oacute;n es buenisima y te ayudan con cualquier duda.', 1),
(4, 'TESTIMONIO01.png', 'Emprendedor', 'Excelente curso introducci&oacute;n a los materiales compuestos, muchas gracias.', 1),
(5, 'testimonio02.png', 'Emprendedor', 'Excelente curso de Mesas Ep&oacute;xicas en Parota y Cristal Templado.  &iexcl;No dejen pasar la oportunidad de tomar este curso!', 1);

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
(3, 'foto_capital.png', 'dmiranda', '', 'Daniel Miranda Mejia', '', 'Manager', 'Capital', '', '', '442 104 6067', 'dmiranda@capitalsft.com', 'https://www.capitalsft.com', '', '', 'https://www.linkedin.com/company/13990038/admin/', '', '22/08/2020 21:28', '2020-09-12 08:36:15', 1, 1, 'admin', 1),
(4, 'foto_capital.png', 'pbetancourt', '', 'Ponciano Betancourt', '', 'Manager', 'Capital', '', '', '442 347 0504', 'pbetancourt@capitalsft.com', 'https://www.capitalsft.com', '', '', 'https://www.linkedin.com/company/13990038/admin/', '', '22/08/2020 21:39', '30/08/2020 13:17', 1, 1, 'usuario', 1),
(5, 'giganteh.jpg', 'memojl', '', 'Guillermo Jimenez Lopez', 'Desarrollo de Paginas Web y Marketing Digital', 'Desarrollador web', 'Multiportal', '', '', '4426002842', 'multiportal@outlook.com', 'http://multiportal.com.mx', 'https://facebook.com/multiportal', '', 'https://www.linkedin.com/', 'https://www.instagram.com/', '2020-09-11 22:11:58', '2020-09-12 08:35:15', 1, 1, 'admin', 1),
(6, 'n.jpg', 'memo1', '', 'Guillermo Jim&eacute;nez L&oacute;pez', 'Desarrollo Web', 'Programador', 'Multiportal', '', '', '4426002842', 'multiportal@outlook.com', 'http://multiportal.com.mx', '', '', '', '', '2020-09-11 23:23:07', '2020-09-12 09:04:33', 1, 1, 'admin', 1),
(7, 'mundos.jpg', 'nuevo', '', 'Ares de Marte', '', 'Manager', '', '', '', '442 104 6067', 'sb-comprador@gmail.com', 'http://multiportal.com.mx', '', '', '', '', '2020-09-12 09:04:03', '2020-09-12 12:12:02', 1, 1, 'admin', 0),
(8, '18-188718_scroll-to-see-more-iron-fist-dragon-logo.jpg', 'asusan1', '', 'Arturo Suz&aacute;n', '', 'Manager', 'Billnex', '', '', '442 104 6067', 'sb-comprador@gmail.com', 'https://www.thebillnex.com', '', '', '', '', '2020-09-12 11:01:10', '2020-09-12 11:02:48', 1, 1, 'admin', 1),
(9, 'nodisponible.jpg', 'memojl01', '', 'Guillermo Jimenez Lopez', '', 'Programador', 'Multiportal', '', '', '4426002842', 'multiportal@outlook.com', 'http://multiportal.com.mx', '', '', '', '', '2020-09-12 11:02:30', '2020-09-12 11:02:30', 1, 1, 'admin', 1),
(10, 'nodisponible.jpg', 'jparra1', '', 'Juan Parra', 'Smartphone', 'Manager', 'Capital', '', '', '446 102 2535', 'sb-comprador@gmail.com', 'https://www.capitalsft.com', '', '', '', '', '2020-09-12 12:16:34', '2020-09-12 12:16:34', 1, 1, 'admin', 1),
(11, 'foto_capital.png', 'memojl2', '', 'Memo Jimenez', 'Smartphone', 'Programador', 'Multiportal', '', '', '4426002842', 'multiportal@outlook.com', 'http://multiportal.com.mx', '', '', '', '', '2020-09-12 12:18:56', '2020-09-12 12:18:56', 1, 1, 'admin', 1);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vcard_visitas`
--

CREATE TABLE `vcard_visitas` (
  `ID` int(9) UNSIGNED NOT NULL,
  `IPv4` bigint(11) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `info_nave` varchar(300) NOT NULL,
  `navegador` varchar(50) NOT NULL,
  `version` varchar(100) NOT NULL,
  `os` varchar(50) NOT NULL,
  `pais` varchar(100) NOT NULL,
  `user` varchar(50) NOT NULL,
  `page` varchar(500) NOT NULL,
  `refer` varchar(500) NOT NULL,
  `vhref` varchar(500) NOT NULL,
  `modulo` varchar(50) NOT NULL,
  `ext` varchar(50) NOT NULL,
  `idp` varchar(50) NOT NULL,
  `salida_pag` datetime NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `vcard_access`
--
ALTER TABLE `vcard_access`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_api_version`
--
ALTER TABLE `vcard_api_version`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_blog`
--
ALTER TABLE `vcard_blog`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_blog_coment`
--
ALTER TABLE `vcard_blog_coment`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_comp`
--
ALTER TABLE `vcard_comp`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_config`
--
ALTER TABLE `vcard_config`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_contacto`
--
ALTER TABLE `vcard_contacto`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_contacto_forms`
--
ALTER TABLE `vcard_contacto_forms`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_countries`
--
ALTER TABLE `vcard_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vcard_css`
--
ALTER TABLE `vcard_css`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_css2`
--
ALTER TABLE `vcard_css2`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_depa`
--
ALTER TABLE `vcard_depa`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_histo_backupdb`
--
ALTER TABLE `vcard_histo_backupdb`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_home_config`
--
ALTER TABLE `vcard_home_config`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_iconos`
--
ALTER TABLE `vcard_iconos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_ipbann`
--
ALTER TABLE `vcard_ipbann`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_landingpage_seccion`
--
ALTER TABLE `vcard_landingpage_seccion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_map_config`
--
ALTER TABLE `vcard_map_config`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_map_ubicacion`
--
ALTER TABLE `vcard_map_ubicacion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_menu_admin`
--
ALTER TABLE `vcard_menu_admin`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_menu_web`
--
ALTER TABLE `vcard_menu_web`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_mode_page`
--
ALTER TABLE `vcard_mode_page`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_modulos`
--
ALTER TABLE `vcard_modulos`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_notificacion`
--
ALTER TABLE `vcard_notificacion`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_opciones`
--
ALTER TABLE `vcard_opciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_pages`
--
ALTER TABLE `vcard_pages`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_portafolio`
--
ALTER TABLE `vcard_portafolio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_registros`
--
ALTER TABLE `vcard_registros`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_signup`
--
ALTER TABLE `vcard_signup`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_slider`
--
ALTER TABLE `vcard_slider`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_tareas`
--
ALTER TABLE `vcard_tareas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_temas`
--
ALTER TABLE `vcard_temas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `vcard_testimonios`
--
ALTER TABLE `vcard_testimonios`
  ADD PRIMARY KEY (`ID`);

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
-- Indices de la tabla `vcard_visitas`
--
ALTER TABLE `vcard_visitas`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `vcard_access`
--
ALTER TABLE `vcard_access`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `vcard_api_version`
--
ALTER TABLE `vcard_api_version`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `vcard_blog`
--
ALTER TABLE `vcard_blog`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_blog_coment`
--
ALTER TABLE `vcard_blog_coment`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_comp`
--
ALTER TABLE `vcard_comp`
  MODIFY `ID` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_config`
--
ALTER TABLE `vcard_config`
  MODIFY `ID` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_contacto`
--
ALTER TABLE `vcard_contacto`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vcard_contacto_forms`
--
ALTER TABLE `vcard_contacto_forms`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_countries`
--
ALTER TABLE `vcard_countries`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=251;

--
-- AUTO_INCREMENT de la tabla `vcard_css`
--
ALTER TABLE `vcard_css`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vcard_css2`
--
ALTER TABLE `vcard_css2`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vcard_depa`
--
ALTER TABLE `vcard_depa`
  MODIFY `ID` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vcard_histo_backupdb`
--
ALTER TABLE `vcard_histo_backupdb`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vcard_home_config`
--
ALTER TABLE `vcard_home_config`
  MODIFY `ID` int(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_iconos`
--
ALTER TABLE `vcard_iconos`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `vcard_ipbann`
--
ALTER TABLE `vcard_ipbann`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `vcard_landingpage_seccion`
--
ALTER TABLE `vcard_landingpage_seccion`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `vcard_map_config`
--
ALTER TABLE `vcard_map_config`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vcard_map_ubicacion`
--
ALTER TABLE `vcard_map_ubicacion`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_menu_admin`
--
ALTER TABLE `vcard_menu_admin`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `vcard_menu_web`
--
ALTER TABLE `vcard_menu_web`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vcard_mode_page`
--
ALTER TABLE `vcard_mode_page`
  MODIFY `ID` int(2) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vcard_modulos`
--
ALTER TABLE `vcard_modulos`
  MODIFY `ID` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `vcard_notificacion`
--
ALTER TABLE `vcard_notificacion`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_opciones`
--
ALTER TABLE `vcard_opciones`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `vcard_pages`
--
ALTER TABLE `vcard_pages`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `vcard_portafolio`
--
ALTER TABLE `vcard_portafolio`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_registros`
--
ALTER TABLE `vcard_registros`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `vcard_signup`
--
ALTER TABLE `vcard_signup`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `vcard_slider`
--
ALTER TABLE `vcard_slider`
  MODIFY `ID` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `vcard_tareas`
--
ALTER TABLE `vcard_tareas`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vcard_temas`
--
ALTER TABLE `vcard_temas`
  MODIFY `ID` int(3) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vcard_testimonios`
--
ALTER TABLE `vcard_testimonios`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `vcard_vcard`
--
ALTER TABLE `vcard_vcard`
  MODIFY `ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

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

--
-- AUTO_INCREMENT de la tabla `vcard_visitas`
--
ALTER TABLE `vcard_visitas`
  MODIFY `ID` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
