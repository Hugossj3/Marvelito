-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2024 a las 14:45:37
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
(1, 'Capitan America', 'El Capitán América, cuyo nombre real es Steve Rogers, es un superhéroe ficticio de Marvel Comics. Es un símbolo de la libertad y la justicia en los Estados Unidos. Durante la Segunda Guerra Mundial, Rogers fue un joven delgado y débil que se convirtió en un super soldado mediante un suero experimental. Este suero le otorgó fuerza, resistencia, agilidad y velocidad sobrehumanas. Como Capitán América, luchó contra las fuerzas del eje, especialmente contra el Cráneo Rojo.\r\n\r\nDespués de la guerra, Rogers fue congelado en hielo y despertó en el presente. Se unió a los Vengadores, un equipo de superhéroes que protegen el mundo de amenazas globales. El Capitán América es conocido por su integridad, valentía y patriotismo. Es un líder inspirador que siempre está dispuesto a hacer lo correcto, incluso si eso significa sacrificar su propia seguridad. Su escudo vibranium es un símbolo de su determinación y su compromiso con la justicia.', 'img/personajes/capImage.jpg', 'SUPER'),
(2, 'Deadpool', 'Un mercenario con poderes curativos, es conocido por su humor negro, violencia extrema y cuarta pared. Su traje rojo y negro, junto a su máscara, lo convierten en un antihéroe icónico', 'img/personajes/deadpoolImage.webp', 'SUPER'),
(3, 'Flash', 'Flash es un superhéroe de DC Comics conocido por su rapidez sobrehumana. Puede correr más rápido que la luz, lo que le permite hacer cosas extraordinarias como viajar en el tiempo y tener reflejos sobrehumanos. El personaje más conocido como Flash es Barry Allen, pero también hay otros personajes que han tomado el manto de Flash, como Jay Garrick', 'img/personajes/flashImage.jpg', 'SUPER'),
(4, 'Saturo Gojo', 'Es un hechicero de jujutsu de 28 años de edad, nacido el 7 de diciembre de 1989. Es considerado el hechicero de jujutsu más fuerte del mundo, y es conocido por su poderoso ojo azul y su técnica de maldición ilimitada. Gojo es un maestro en la escuela de hechicería de Tokio, y es responsable de entrenar a los estudiantes de primer año. Es un personaje carismático y popular, conocido por su confianza y su humor sarcástico', 'img/personajes/gojoImage.png', 'ANIME'),
(5, 'Goku', 'Goku es el protagonista de la serie de manga y anime Dragon Ball. Fue creado por Akira Toriyama en 1984. Goku es un Saiyajin que nació en el planeta Vegeta, pero fue enviado a la Tierra cuando era bebé. Es un artista marcial con una fuerza sobrehumana y una gran determinación. Goku es conocido por su cabello negro y su traje naranja. Es un personaje optimista y amable, que siempre está dispuesto a ayudar a los demás.', 'img/personajes/gokuImage.jfif', 'ANIME'),
(6, 'Iron Man', 'Iron Man, también conocido como Tony Stark, es un superhéroe multimillonario del Universo Marvel. Es un inventor genio y un miembro fundador de los Vengadores. Tony Stark es conocido por su confianza y sus habilidades de vuelo como Iron Man. Es un filántropo y dirige la empresa de fabricación de armas Stark Industries.', 'img/personajes/ironManImage.webp', 'SUPER'),
(7, 'Kirito', 'Es un espadachín increíblemente talentoso y habilidoso, conocido por su velocidad, fuerza y ​​estrategia en los juegos de realidad virtual. Experto en combate con una o dos espadas. También es muy hábil en el uso de armas de fuego y tiene una gran capacidad para adaptarse a diferentes situaciones', 'img/personajes/kiritoImage.jpg', 'ANIME'),
(8, 'Uzumaki Naruto', 'Es el protagonista principal del manga y anime Naruto. Es un ninja de la Aldea Oculta de la Hoja con una gran cantidad de chakra y un gran potencial.\r\n Es capaz de usar el Rasengan, una técnica poderosa creada por su maestro Jiraiya. A lo largo de la serie, aprende a usar el Modo Sabio y a controlar al Zorro Demonio de Nueve Colas que habita en su interior', 'img/personajes/narutoImage.webp', 'ANIME'),
(9, 'Natsu Dragneel', 'Natsu es un mago de Fairy Tail con un gran corazón y una fuerza increíble. Es conocido por su pelo rosa en punta y su bufanda blanca de escamas de dragón, que heredó de su padre adoptivo, Igneel.\r\nNatsu es un chico impulsivo, extrovertido y muy apasionado. Siempre está dispuesto a luchar por sus amigos y nunca se rinde ante la adversidad. Es un gran comelón y tiene un apetito insaciable, especialmente por la carne.\r\nSu poder se basa en la magia de fuego, y es capaz de usar una variedad de hechizos, incluyendo el Rugido del Dragón de Fuego. También es un luchador muy hábil y tiene una gran resistencia física.', 'img/personajes/natsuImage.jfif', 'ANIME'),
(10, 'Rin Okumura', 'Es el protagonista de la serie de anime Blue Exorcist, también conocida como Ao no Exorcist. Es un chico de 15 años con cabello azul brillante y ojos azules. Es el hijo de Satán y una humana, Yuri Egin, y heredó las llamas azules de su padre.\r\nA pesar de ser el hijo de Satán, Rin se esfuerza por ser un exorcista y luchar contra las fuerzas del mal.', 'img/personajes/rinImage.jpg', 'ANIME'),
(11, 'Spiderman', 'Spider-Man es un superhéroe que se caracteriza por su fuerza, agilidad y su sentido arácnido. Es un científico, vigilante, profesor, fotógrafo y, por supuesto, un superhéroe. Su fuerza le permite levantar 10 toneladas o más, y su sentido arácnido le permite saber si hay peligro cerca. Además, es un gran lector, un poco retraído y no tiene mucha suerte en el amor. Su nombre real es Peter Parker, y es un joven con pelo castaño y ojos azules.', 'img/personajes/spidermanImage.jpg', 'SUPER'),
(12, 'Sukuna', 'Sukuna es un hombre alto y musculoso con cuatro brazos, cuatro ojos y una gran boca en el estómago. Tiene el pelo corto de color rosa-rojo y ojos rojos, siendo sus dos ojos derechos los más prominentes. Es un espíritu maldito de grado especial y se considera el espíritu maldito más poderoso del universo de Jujutsu Kaisen. Una vez fue conocido como el Rey de las Maldiciones y el mago más grande que jamás haya existido.', 'img/personajes/sukunaImage.webp', 'ANIME'),
(13, 'Superman', 'Superman, el último hijo de Krypton, es un superhéroe con habilidades extraordinarias como la fuerza sobrehumana, vuelo y visión láser. Bajo su identidad humana, Clark Kent, lucha por la justicia y la verdad como protector de la Tierra.', 'img/personajes/supermanImage.jpg', 'SUPER'),
(14, 'Tanjiro Kamado', 'Tanjiro Kamado es un joven bondadoso y valiente que se convierte en cazador de demonios tras la trágica muerte de su familia. Con una inquebrantable determinación y habilidades de respiración del agua, lucha para salvar a su hermana Nezuko y acabar con los demonios.', 'img/personajes/tanjiroImage.webp', 'ANIME'),
(15, 'Thanos', 'Es un poderoso titán obsesionado con el equilibrio del universo. Implacable y frío, busca reunir las seis Gemas del Infinito para borrar a la mitad de toda la vida. Su inmensa fuerza y astucia lo convierten en uno de los villanos más temidos del cosmos.', 'img/personajes/thanosImage.webp', 'SUPER'),
(16, 'Thor', 'Thor, el dios del trueno y príncipe de Asgard, es un poderoso guerrero con un martillo encantado, Mjolnir, que le otorga control sobre las tormentas y el relámpago. Valiente y noble, defiende tanto a Asgard como a la Tierra como uno de los Vengadores.', 'img/personajes/thorImage.jfif', 'SUPER'),
(17, 'Zoro', 'Roronoa Zoro es un espadachín experto y miembro de los Piratas de Sombrero de Paja en One Piece. Con su distintivo estilo de lucha de tres espadas, sueña con convertirse en el mejor espadachín del mundo. Leal, decidido y valiente, es el segundo al mando de Luffy.', 'img/personajes/zoroImage.jpg', 'ANIME'),
(18, 'Batman', 'Batman, el vigilante de Ciudad Gótica, es un superhéroe sin poderes que lucha contra el crimen con su inteligencia, tecnología y fuerza física. Su traje negro, su capa y sus gadgets le dan un aura de misterio y poder.', 'img/personajes/batmanImage.jpeg', 'SUPER'),
(19, 'Wolverine', 'Wolverine, un mutante con garras de adamantium, es un rudo y solitario superhéroe. Su factor de curación le permite soportar heridas mortales, y su temperamento salvaje lo convierte en un oponente formidable. A pesar de su apariencia feroz, Wolverine tiene un código moral estricto y un corazón noble.', 'img/personajes/wolverineImage.jpg', 'SUPER'),
(20, 'Luffy', 'Luffy, el capitán de los Piratas del Sombrero de Paja, es un joven pirata alegre y optimista que sueña con convertirse en el Rey de los Piratas. Su principal habilidad es la Gomu Gomu no Mi, que le permite estirar su cuerpo como goma. Luffy es un líder carismático y valiente, siempre dispuesto a luchar por sus amigos y sus ideales.', 'img/personajes/luffyImage.jpeg', 'ANIME'),
(21, 'Ichigo', 'Ichigo Kurosaki, un estudiante de secundaria que puede ver espíritus, se convierte en un Shinigami Sustituto después de heredar los poderes de Rukia Kuchiki. Su determinación y su fuerza lo convierten en un formidable guerrero, capaz de luchar contra Hollows, Arrancars y otros enemigos.', 'img/personajes/ichigoImage.jpg', 'ANIME'),
(22, 'Saitama', 'Saitama, un héroe calvo y de apariencia normal, posee una fuerza sobrehumana que lo convierte en el hombre más fuerte del mundo. Su aburrimiento por la facilidad con la que derrota a sus enemigos lo lleva a buscar desafíos más emocionantes.', 'img/personajes/saitamaImage.jpg', 'ANIME'),
(23, 'Eren', 'Eren Yeager, un joven impulsivo y determinado, busca venganza contra los Titanes que destruyeron su hogar y asesinaron a su madre. Su deseo de proteger a la humanidad lo lleva a unirse al ejército y a luchar contra la amenaza de los Titanes, aunque su determinación se ve desafiada por sus propios poderes y secretos.', 'img/personajes/erenImage.jpg', 'ANIME'),
(24, 'Edward Elric', 'Edward Elric, un alquimista prodigioso y ambicioso, busca desesperadamente recuperar el cuerpo de su hermano menor, Alphonse, tras un fallido intento de transmutación humana. Su viaje lo lleva a explorar el mundo de la alquimia, enfrentándose a peligros y descubriendo secretos que lo obligan a cuestionar sus propias creencias.', 'img/personajes/edward-elricImage.jpg', 'ANIME'),
(25, 'Hulk', 'Hulk, un ser verde y musculoso, es la transformación alterada de Bruce Banner, un científico que fue expuesto a radiación gamma. Su furia y poder se desatan cuando Banner pierde el control, convirtiéndolo en una fuerza imparable capaz de destruir todo a su paso.', 'img/personajes/hulkImage.jpg', 'SUPER'),
(26, 'Doctor Strange', 'Doctor Strange es un poderoso hechicero y miembro destacado de los Maestros de las Artes Místicas. Era un neurocirujano exitoso que, tras un accidente, se dedicó a la magia para recuperar el uso de sus manos. Ahora, como Hechicero Supremo, protege la Tierra de amenazas mágicas y místicas.', 'img/personajes/doctor-strangeImage.webp', 'SUPER'),
(27, 'Black Panther', 'Black Panther es el rey de Wakanda, una nación africana tecnológicamente avanzada y aislada del mundo. TChalla, el actual Black Panther, es un líder carismático y un guerrero formidable, equipado con un traje de vibranium que le otorga fuerza y resistencia sobrehumanas.', 'img/personajes/black-pantherImage.webp', 'SUPER');

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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `edad`, `correo`, `contra`) VALUES
(1, 'Hugo', 23, 'prueba@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(17, 'dana', 24, 'dana@gmail.com', '21cb4e4be93c09542ffa73b2b5cb95ea'),
(18, 'Paola', 21, 'paola@gmail.com', '72a86026abb289634ec64d7f3b544f0c'),
(19, 'Antonio', 20, 'antonio9@gmail.com', 'aefe34008e63f1eb205dc4c4b8322253'),
(20, 'hermenegildo', 94, 'hermenegildo@gmail.com', '2b4c3f7824a4de1216a63be9add078ff');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
