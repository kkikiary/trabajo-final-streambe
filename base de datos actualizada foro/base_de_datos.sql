-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 06-10-2024 a las 00:42:20
-- Versión del servidor: 8.2.0
-- Versión de PHP: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `base_de_datos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre_categoria`, `descripcion`) VALUES
(1, 'Ansiedad', 'Este foro está dedicado a quienes experimentan ansiedad, ya sea en forma de ataques de pánico, preocupación constante, o síntomas físicos como taquicardia y sudoración. Un lugar para compartir estrategias de manejo, hablar sobre tus experiencias personales, y encontrar comunidad en quienes también lidian con los efectos de la ansiedad.'),
(2, 'Depresión', 'Un espacio para hablar abiertamente sobre la depresión, un trastorno que puede afectar profundamente el bienestar emocional y físico. Aquí puedes compartir tu experiencia con síntomas como tristeza persistente, fatiga, y pérdida de interés en actividades, y encontrar apoyo para sobrellevar este desafío. Discute sobre tratamientos, terapias, y consejos para manejar esta condición y avanzar hacia la recuperación.'),
(3, 'Estrés Postraumático (TEPT)', 'Espacio para compartir experiencias relacionadas con traumas pasados y su impacto emocional. Aquí podes hablar sobre el proceso de sanación, terapias útiles, y encontrar apoyo de personas que han vivido situaciones similares.'),
(4, 'Trastornos Alimentarios', 'Un lugar seguro para discutir temas como anorexia, bulimia y otros trastornos alimentarios. Comparte tus desafíos y conecta con otros en un camino hacia una relación más saludable con la comida y tu cuerpo.'),
(5, 'Autoestima y Confianza Personal', 'Conversaciones enfocadas en fortalecer la autoestima y la confianza. Aquí puedes discutir técnicas para mejorar la autoimagen, superar la inseguridad y aprender a valorarte.'),
(6, 'Relaciones Interpersonales', 'Comparte tus inquietudes sobre relaciones familiares, amistades, o pareja. Un lugar para encontrar consejo y apoyo en la construcción de relaciones saludables.'),
(7, 'Duelo y Pérdida', 'Un espacio para procesar la pérdida de seres queridos y compartir tu experiencia de duelo. Encuentra apoyo y recursos que te ayuden a sobrellevar la tristeza.'),
(8, 'Fobias y Miedos', 'Un foro dedicado a aquellos que viven con fobias o miedos intensos. Discute métodos para manejarlos, tratamientos y comparte tus experiencias con otros.'),
(9, 'Manejo del Estrés', 'Aquí puedes hablar sobre cómo manejar el estrés diario, desde el laboral hasta el personal. Comparte técnicas de relajación y estrategias para mantener la calma en situaciones difíciles.'),
(10, 'Salud Mental en el Trabajo', 'Discute los desafíos que enfrentamos en el ambiente laboral en relación a la salud mental. Estrategias para balancear la vida profesional y personal, y cómo manejar el agotamiento.'),
(11, 'Salud Mental en la Adolescencia', 'Un espacio dirigido a adolescentes para hablar de temas como la presión social, la autoaceptación, y las emociones intensas que suelen surgir en esta etapa.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciones`
--

DROP TABLE IF EXISTS `publicaciones`;
CREATE TABLE IF NOT EXISTS `publicaciones` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_categoria` int NOT NULL,
  `titulo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_usuario` int NOT NULL,
  `contenido` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `publicaciones_ibfk_1` (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `publicaciones`
--

INSERT INTO `publicaciones` (`id`, `id_categoria`, `titulo`, `id_usuario`, `contenido`, `fecha`) VALUES
(20, 1, '', 3, 'Últimamente he estado teniendo ataques de ansiedad en situaciones inesperadas, como en el trabajo o al salir con amigos. Quisiera saber qué técnicas usan para mantenerse calmados en estos momentos. He intentado la respiración profunda, pero a veces no es suficiente. ¿Alguien más ha pasado por esto?', '2024-01-10 12:30:00'),
(21, 2, '', 1, 'Me siento agotado todo el tiempo y no importa cuánto descanse, parece que nunca es suficiente. He perdido el interés en las actividades que antes disfrutaba y es difícil hablar con los demás sobre cómo me siento. ¿Alguien ha encontrado algo que le haya ayudado a sentirse mejor en momentos como este?', '2024-02-15 17:45:00'),
(22, 3, '', 4, 'Hace años viví una experiencia traumática que sigue afectándome. Hay días en los que los recuerdos regresan con mucha fuerza, y siento que pierdo el control. ¿Alguien ha encontrado formas efectivas de lidiar con estos momentos o terapias que hayan sido útiles para el TEPT?', '2024-03-28 14:15:00'),
(23, 4, '', 5, 'Siempre he tenido problemas con la comida y cómo veo mi cuerpo. Algunos días me siento bien, pero la mayoría de las veces es una batalla mental. Me encantaría escuchar experiencias de otros que hayan pasado por esto y qué estrategias han utilizado para mejorar su relación con la comida y su cuerpo.', '2024-04-05 22:00:00'),
(24, 5, '', 7, 'He estado trabajando en mejorar mi autoestima, pero a veces me siento insegura y dudo de mí misma. ¿Qué han hecho para mejorar su confianza personal y sentirse más seguros en su día a día?', '2024-05-20 19:20:00'),
(25, 6, '', 8, 'He estado teniendo dificultades para comunicarme con mi pareja y mi familia. A veces siento que no me entienden, o que yo no sé cómo expresar mis sentimientos correctamente. ¿Alguien más ha tenido problemas de comunicación en sus relaciones y cómo los han resuelto?', '2024-06-13 11:00:00'),
(26, 7, '', 9, 'Hace poco perdí a alguien muy cercano y me siento abrumado por el dolor. Cada día es una lucha, y aunque me dicen que el tiempo lo cura todo, no sé cómo seguir adelante. Me gustaría escuchar cómo otros han lidiado con el duelo y qué les ha ayudado a encontrar consuelo.', '2024-07-01 21:30:00'),
(27, 8, '', 10, 'He vivido con una fobia severa a los espacios cerrados (claustrofobia) durante mucho tiempo, y aunque intento evitar esas situaciones, a veces es inevitable. ¿Alguien tiene alguna técnica que les haya funcionado para superar o al menos manejar sus fobias?', '2024-08-22 18:50:00'),
(28, 9, '', 11, 'Últimamente siento que todo va mal, ya sea en el trabajo o en casa, y me está afectando más de lo que quisiera. He probado algunas técnicas de relajación, pero siento que no son suficientes. Me gustaría saber cómo otros manejan situaciones de estrés extremo y si han encontrado alguna rutina o hábito que realmente les ayude a mantener la calma cuando las cosas se ponen difíciles. ¡Cualquier consejo es bienvenido!', '2024-09-03 13:10:00'),
(29, 10, '', 12, 'Después de meses de trabajo continuo, siento que estoy al borde del agotamiento. Estoy teniendo problemas para balancear mi vida personal con mi vida profesional, y no sé cómo tomar un respiro sin sentir que estoy descuidando mi trabajo. ¿Cómo lo manejan ustedes?', '2024-09-28 16:25:00'),
(30, 11, '', 14, ' Estoy en mi último año de secundaria y el estrés es cada vez más fuerte. Entre los exámenes, las tareas y la presión de mis padres por obtener buenas notas, me siento abrumado. A eso se suma la presión social de mis amigos, y a veces siento que no puedo con todo. ¿Alguien más ha pasado por algo parecido? ¿Cómo hacen para manejar la presión de la escuela y las expectativas sin sentirse completamente agobiados? Agradecería mucho cualquier consejo.', '2024-09-28 23:25:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

DROP TABLE IF EXISTS `registro`;
CREATE TABLE IF NOT EXISTS `registro` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `contraseña`, `correo`) VALUES
(1, 'Andres', '$2y$10$i.sl2SIlZm8UY0u3RQfDGeVzc4ib/HmWv46b8EJSmgIoP9VM8Zbi2', 'Andres@gmail.com'),
(2, 'Marcos', '$2y$10$RtKAy/1F482z2ag8aRg6felsa396XIAmyUyHpr.RSdhjrnY9vZNM2', 'Marcos@gmail.com'),
(3, 'kiki', '$2y$10$fdTrYCso3t/m.ushegN.MOj6h3LOui8sjdOayaCrF/mzeGXHKsyGm', 'kiki@gmail.com'),
(4, 'kiara', '$2y$10$flPBuwkRfhne9L9lGluo7uNKo3RanIGvU0U5riPFgWOZrAA3gk67K', 'kiaraagustinaenci2006@gmail.com'),
(5, 'laura', '$2y$10$Jmnmx4ag3xiwz8xAx7oFAOn6uFDz1UCVAxiTTRNL5HEdjYikiukp2', ''),
(7, 'claudiaaa', '$2y$10$jCU7ZjOYmtQF7cw6hv.zL.OqKJdjvbGzX5XxW/eBXo11sb8oLfZYy', ''),
(8, 'hugo', '$2y$10$CbboEVgTgpTW8kWkLoyaSOMo6TTdT/fr5d6EsgShey/BsBe5FEjpm', ''),
(9, 'pepe', '678', '[value-4]'),
(10, 'lola', '345', ''),
(11, 'lili', 'njk', '[value-4]'),
(12, 'pancho', 'kiki', '[value-4]'),
(13, 'lujan', 'lllll', '[value-4]'),
(14, 'juan', 'lololo', '[value-4]');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

DROP TABLE IF EXISTS `respuestas`;
CREATE TABLE IF NOT EXISTS `respuestas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `id_publicacion` int NOT NULL,
  `id_categoria` int NOT NULL,
  `id_usuario` int NOT NULL,
  `contenido` text NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_publicacion` (`id_publicacion`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `publicaciones`
--
ALTER TABLE `publicaciones`
  ADD CONSTRAINT `publicaciones_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `publicaciones_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `registro` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Filtros para la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD CONSTRAINT `respuestas_ibfk_1` FOREIGN KEY (`id_publicacion`) REFERENCES `publicaciones` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `respuestas_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `registro` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
