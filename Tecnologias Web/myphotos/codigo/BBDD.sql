
SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `myphotos`
--

-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` int(255) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(35) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `password` varchar(45) NOT NULL,
  `salt` varchar(8) NOT NULL,
  PRIMARY KEY (`idUsuario`,`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `usuarios` (`idUsuario`, `nombre`,`apellidos`,`usuario`,`password`,`salt`) VALUES
(1,'administrador','administrador','admin','e80718381aee11c1a91e4e4a5a5960ba04563660','jo0k3050'),
(2,'David','hernandez','david@hotmail.es','55ef3e6e2d9bf841c22efadd97d6f4cbdadf2bce','wsfxixrn'),
(3,'maria','jimenez','maria@gmail.com','4e6e9c9960c28539453484a972bc8fd2fc89f93f','obw7vlfp'),
(4,'pepe','bartolo','pepe@hotmail.com','1443f8963d5c7222d3ac8caf2f78c54e57f90a8e','6jpel4mt'),
(5,'ana','martin','ana@gmail.com','935f35da6dfa6b19eb5cadf786081b84c10e9f7d','mzymczbv');

--
-- Volcar la base de datos para la tabla `usuarios`
--


--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE IF NOT EXISTS `albumes` (
  `idAlbum` int(255) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `tituloAlbum` varchar(50) NOT NULL,
  `descripcion` tinytext NOT NULL,
  `fechaAlbum` date NOT NULL,
  PRIMARY KEY (`idAlbum`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `albumes` (`idAlbum`, `usuario`,`tituloAlbum`,`descripcion`,`fechaAlbum`) VALUES
(1,'ana@gmail.com','viaje','como mola',	'2013-07-10'),
(2,'david@hotmail.es','amigos','sadadfafd',	'2013-07-10'),
(3,'david@hotmail.es','david','adsafd',	'2013-07-10'),
(4,'pepe@hotmail.com','amigos','molaaaa','2013-07-10'),
(5,'pepe@hotmail.com','cole','mi cole',	'2013-07-10');

--
-- Volcar la base de datos para la tabla `albumes`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `album_foto`
--

CREATE TABLE IF NOT EXISTS `album_foto` (
  `idAlbum` int(255) NOT NULL,
  `idFoto` int(255) NOT NULL,
  PRIMARY KEY (`idAlbum`,`idFoto`),
  KEY `idFoto` (`idFoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `album_foto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amigos_usuario`
--

CREATE TABLE IF NOT EXISTS `amigos_usuario` (
  `idUsuario` int(255) NOT NULL,
  `idAmigo` int(255) NOT NULL,
  PRIMARY KEY (`idUsuario`,`idAmigo`),
  KEY `idAmigo` (`idAmigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `amigos_usuario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_album`
--

CREATE TABLE IF NOT EXISTS `autor_album` (
  `idAlbum` int(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `Fecha` date NOT NULL,
  PRIMARY KEY (`idAlbum`,`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `autor_album`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_comentario`
--

CREATE TABLE IF NOT EXISTS `autor_comentario` (
  `idComentario` int(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  PRIMARY KEY (`idComentario`,`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `autor_comentario`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_foto`
--

CREATE TABLE IF NOT EXISTS `autor_foto` (
  `idFoto` int(255) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idFoto`,`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `autor_foto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor_publicacion`
--

CREATE TABLE IF NOT EXISTS `autor_publicacion` (
  `idPublicacion` int(255) NOT NULL,
  `idAutor` int(255) NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`idPublicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `autor_publicacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE IF NOT EXISTS `comentarios` (
  `idComentario` int(255) NOT NULL AUTO_INCREMENT,
  `texto` text NOT NULL,
  `fechaPublicacion` date NOT NULL,
  PRIMARY KEY (`idComentario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `comentarios`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_foto`
--

CREATE TABLE IF NOT EXISTS `comentarios_foto` (
  `idComentario` int(255) NOT NULL,
  `idFoto` int(255) NOT NULL,
  PRIMARY KEY (`idComentario`,`idFoto`),
  KEY `idFoto` (`idFoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `comentarios_foto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenido_publicacion`
--

CREATE TABLE IF NOT EXISTS `contenido_publicacion` (
  `idPublicacion` int(255) NOT NULL,
  `idComentario` int(255) NOT NULL,
  `idFoto` int(100) NOT NULL,
  PRIMARY KEY (`idPublicacion`,`idComentario`,`idFoto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `contenido_publicacion`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `idFoto` int(255) NOT NULL AUTO_INCREMENT,
  `tituloFoto` varchar(50) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `tamanio` int(255) NOT NULL,
  PRIMARY KEY (`idFoto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

INSERT INTO `foto` (`idFoto`, `tituloFoto`,`nombre`,`tamanio`) VALUES
(1,'1','carretera delhi','301641'),
(2,'2','taj mahal','263391'),
(3,'3','mono','485091'),
(4,'4','mar cantabrico','318683'),
(5,'5','seleccion española','802926'),
(6,'6','seleccion','959585'),
(7,'7','acantilado','1229586'),
(8,'8','playa','986469'),
(9,'9','pueblo','1253788'),
(10,'10','linux','4463'),
(11,'11','seleccion bus','961221'),
(12,'12','españa','1038757'),
(13,'13','pueblo asturias','1368478');

--
-- Volcar la base de datos para la tabla `foto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

CREATE TABLE IF NOT EXISTS `publicaciones` (
  `idPublicacion` int(255) NOT NULL,
  `texo` text NOT NULL,
  PRIMARY KEY (`idPublicacion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcar la base de datos para la tabla `publicaciones`
--


-- --------------------------------------------------------


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
