--
-- Base de datos: `club_baloncesto`
--
CREATE DATABASE IF NOT EXISTS `club_baloncesto`;

USE `club_baloncesto`;

--
-- Estructura de tabla para la tabla `categorias`
--
DROP TABLE IF EXISTS `categorias`;
CREATE TABLE `categorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(255) NOT NULL,
  `entrenador` varchar(255) NOT NULL,
  `preparador_fisico` varchar(255) NOT NULL,
  `cantidad_jugadores` int(11) NOT NULL,
  `capitan_del_equipo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria`, `entrenador`, `preparador_fisico`, `cantidad_jugadores`, `capitan_del_equipo`) VALUES
('Sub-19', 'Juan Perez', 'Carlos Lopez', 12, 'Miguel Garcia'),
('Sub-17', 'Ana Gomez', 'Sofia Martinez', 11, 'David Rodriguez'),
('Primera División', 'Luis Fernandez', 'Pedro Sanchez', 15, 'Javier Hernandez');

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Estructura de tabla para la tabla `jugadores`
--
DROP TABLE IF EXISTS `jugadores`;
CREATE TABLE `jugadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) NOT NULL,
  `jugador` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `estado` enum('activo','suspendido','lesionado') NOT NULL,
  `rol` enum('titular','suplente','capitan') NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_categoria` (`id_categoria`),
  CONSTRAINT `jugadores_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Volcado de datos para la tabla `jugadores`
--

INSERT INTO `jugadores` (`id_categoria`, `jugador`, `numero`, `estado`, `rol`) VALUES
(1, 'Miguel Garcia', 7, 'activo', 'capitan'),
(1, 'Jorge Torres', 10, 'activo', 'titular'),
(1, 'Lucas Vazquez', 5, 'lesionado', 'titular'),
(2, 'David Rodriguez', 11, 'activo', 'capitan'),
(2, 'Marcos Rojo', 3, 'suspendido', 'titular'),
(3, 'Javier Hernandez', 9, 'activo', 'capitan'),
(3, 'Andres Iniesta', 8, 'activo', 'titular');

--
-- Indices de la tabla `jugadores`
--
ALTER TABLE `jugadores` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;