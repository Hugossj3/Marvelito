-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2024 a las 14:38:10
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `marvelito`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personaje`
--

CREATE TABLE `personaje` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `img` varchar(150) DEFAULT NULL,
  `tipoP` enum('ANIME','SUPER') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `personaje`
--

INSERT INTO `personaje` (`id`, `nombre`, `descripcion`, `img`, `tipoP`) VALUES
(1, 'Capitan America', 'El Capitán América, cuyo nombre real es Steve Rogers, es un superhéroe ficticio de Marvel Comics. Es un símbolo de la libertad y la justicia en los Estados Unidos. Durante la Segunda Guerra Mundial, Rogers fue un joven delgado y débil que se convirtió en un super soldado mediante un suero experimental. Este suero le otorgó fuerza, resistencia, agilidad y velocidad sobrehumanas. Como Capitán América, luchó contra las fuerzas del eje, especialmente contra el Cráneo Rojo.\r\n\r\nDespués de la guerra, Rogers fue congelado en hielo y despertó en el presente. Se unió a los Vengadores, un equipo de superhéroes que protegen el mundo de amenazas globales. El Capitán América es conocido por su integridad, valentía y patriotismo. Es un líder inspirador que siempre está dispuesto a hacer lo correcto, incluso si eso significa sacrificar su propia seguridad. Su escudo vibranium es un símbolo de su determinación y su compromiso con la justicia.', '/img/personajes/capImage.jpg', 'SUPER'),
(2, 'Deadpool', 'Superheroe con una gran habilidad regenerativa y con oscuro sentido del humor', '/img/personajes/deadpoolImage.jpg', 'SUPER'),
(3, 'Flash', 'Un superhéroe con la capacidad de correr a velocidades increíbles.', '/img/personajes/flashImage.jpg', 'SUPER'),
(4, 'Saturo Gojo', 'Un hechicero con ojos azules que le permiten manipular la energía maldita.', '/img/personajes/gojoImage.png', 'ANIME'),
(5, 'Goku', 'Un Sayayin con un corazón puro y una sed insaciable de luchar.', '/img/personajes/gokuImage.jfif', 'ANIME'),
(6, 'Iron Man', 'Un genio multimillonario que usa una armadura de alta tecnología para luchar contra el mal.', '/img/personajes/ironManImage.webp', 'SUPER'),
(7, 'Kirito', 'Un espadachín de élite que se aventura en el mundo virtual de Sword Art Online.', '/img/personajes/kiritoImage.jpg', 'ANIME'),
(8, 'Uzumaki Naruto', 'Un ninja que sueña con convertirse en Hokage y ser reconocido por su aldea.', '/img/personajes/narutoImage.webp', 'ANIME'),
(9, 'Natsu Dragneel', 'Un mago especailizado en la magia caza dragones que busca a su padre adoptivo, Igneel.', '/img/personajes/natsuImage.jfif', 'ANIME'),
(10, 'Rin Okumura', 'Un exorcista que lucha contra demonios con la ayuda de su espada de llamas azules.', '/img/personajes/deadpoolImage.jpg', 'SUPER'),
(11, 'Spiderman', 'Un superhéroe con habilidades arácnidas que lucha por proteger a los inocentes.', '/img/personajes/spidermanImage.jpg', 'SUPER'),
(12, 'Sukuna', 'Un rey de las maldiciones que busca recuperar su cuerpo completo.', '/img/personajes/sukunaImage.webp', 'ANIME'),
(13, 'Superman', 'Un extraterrestre con superpoderes que protege la Tierra de las amenazas.', '/img/personajes/supermanImage.jpg', 'SUPER'),
(14, 'Tanjiro Kamado', 'Un joven que se convierte en cazador de demonios para vengar a su familia.', '/img/personajes/tanjiroImage.webp', 'ANIME'),
(15, 'Thanos', 'Un titán que busca destruir el universo para restaurarlo.', '/img/personajes/thanosImage.webp', 'SUPER'),
(16, 'Thor', 'Un dios del trueno que lucha por Asgard y la Tierra.', '/img/personajes/thorImage.jfif', 'SUPER'),
(17, 'Zoro', 'Un espadachín de tres espadas que busca convertirse en el mejor espadachín del mundo.', '/img/personajes/zoroImage.jpg', 'ANIME');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `edad` int(11) DEFAULT NULL,
  `correo` varchar(50) NOT NULL,
  `contra` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personaje`
--
ALTER TABLE `personaje`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personaje`
--
ALTER TABLE `personaje`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
