-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2024 a las 20:19:21
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
-- Base de datos: `jardin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Herramientas de jardinería', 'Herramientas utilizadas para labores de jardinería, como palas, rastrillos, tijeras de podar, entre otros.'),
(2, 'Sustratos', 'Materiales utilizados como base para el crecimiento de plantas, como tierra para macetas, turba, perlita, vermiculita, entre otros.'),
(3, 'Fertilizantes', 'Productos químicos o orgánicos que se añaden al suelo o agua para mejorar el crecimiento y desarrollo de las plantas.'),
(4, 'Accesorios', 'Productos complementarios para la jardinería, como guantes, regaderas, macetas, entre otros.'),
(5, 'Materiales de jardinería', 'Materiales diversos utilizados en proyectos de jardinería, como madera, piedras, plásticos, entre otros.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedido`
--

CREATE TABLE `detalles_pedido` (
  `id_detalle` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_producto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `estado` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripción` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripción`, `precio`, `imagen`, `id_categoria`) VALUES
(1, 'Pala de jardín', 'Pala resistente para cavar y trasplantar en el jardín.', 15.99, NULL, 1),
(2, 'Rastrillo de mano', 'Rastrillo pequeño para trabajar en áreas reducidas del jardín.', 9.99, NULL, 1),
(3, 'Tijeras de podar', 'Tijeras afiladas para podar ramas y arbustos.', 12.49, NULL, 1),
(4, 'Hacha de jardín', 'Herramienta para cortar ramas gruesas y leñosas.', 18.99, NULL, 1),
(5, 'Azada', 'Instrumento para cavar y remover la tierra en el jardín.', 11.99, NULL, 1),
(6, 'Corta ramas', 'Herramienta para cortar ramas de árboles y arbustos.', 14.99, NULL, 1),
(7, 'Cuchillo de jardín', 'Cuchillo multiusos para varias tareas de jardinería.', 8.49, NULL, 1),
(8, 'Pulverizador de mano', 'Pulverizador para aplicar líquidos como pesticidas y fertilizantes.', 16.99, NULL, 1),
(9, 'Guadaña', 'Herramienta para segar césped y hierba en áreas grandes.', 22.99, NULL, 1),
(10, 'Despuntadora\r\n', 'Máquina para cortar y despuntar la hierba en el jardín.', 89.99, NULL, 1),
(11, 'Tijeras de podar telescópicas', 'Tijeras ajustables para podar ramas altas y difíciles de alcanzar.', 24.99, NULL, 1),
(12, 'Cortasetos', 'Herramienta eléctrica para recortar setos y arbustos.', 54.99, NULL, 1),
(13, 'Pala de mano', 'Pala pequeña para trabajos de jardinería en macetas y pequeños espacios.', 7.99, NULL, 1),
(14, 'Pulverizador de mochila', 'Pulverizador con mochila para aplicar productos en grandes áreas.', 34.99, NULL, 1),
(15, 'Rastrillo de jardín', 'Rastrillo grande para rastrillar hojas y desechos del jardín.', 19.99, NULL, 1),
(16, 'Serrucho de poda', 'Serrucho pequeño y afilado para cortar ramas de árboles.', 10.99, NULL, 1),
(17, 'Tijeras de podar bypass', 'Tijeras de podar con corte bypass para ramas verdes y jóvenes.', 13.49, NULL, 1),
(18, 'Pico', 'Herramienta de mano con punta afilada para cavar y romper suelos duros.', 14.49, NULL, 1),
(19, 'Tijeras de podar de yunque', 'Tijeras de podar con corte de yunque para ramas secas y leñosas.', 11.99, NULL, 1),
(20, 'Espátula de jardinería', 'Espátula con borde dentado para trasplantar y cavar en macetas.', 9.49, NULL, 1),
(21, 'Tierra para macetas', 'Sustrato nutritivo para el cultivo de plantas en macetas.', 8.99, NULL, 2),
(22, 'Turba', 'Material orgánico para mejorar la retención de agua en el suelo.', 5.49, NULL, 2),
(23, 'Perlita', 'Sustrato ligero utilizado para mejorar la aireación del suelo.', 4.99, NULL, 2),
(24, 'Vermiculita', 'Sustrato mineral para mejorar la retención de agua y nutrientes.', 6.99, NULL, 2),
(25, 'Humus de lombriz', 'Abono orgánico rico en nutrientes y microorganismos beneficiosos.', 9.99, NULL, 2),
(26, 'Coco coir', 'Fibra de coco utilizada como sustrato para plantas de interior.', 7.49, NULL, 2),
(27, 'Arena de río', 'Arena lavada para mejorar el drenaje en sustratos de plantas.', 3.99, NULL, 2),
(28, 'Fibra de cáñamo', 'Sustrato ecológico hecho de fibras de cáñamo para plantas en macetas.', 11.49, NULL, 2),
(29, 'Tierra para jardín', 'Sustrato universal para el cultivo de plantas en el jardín.', 6.49, NULL, 2),
(30, 'Arena para cactus', 'Sustrato específico para el cultivo de cactus y suculentas.', 4.49, NULL, 2),
(31, 'Musgo sphagnum', 'Sustrato de musgo para el cultivo de orquídeas y plantas epífitas.', 12.99, NULL, 2),
(32, 'Perlite expandida', 'Sustrato ligero y estéril utilizado como agregado en mezclas de suelo.', 5.99, NULL, 2),
(33, 'Corteza de pino', 'Sustrato orgánico de corteza de pino para mejorar la retención de agua.', 8.49, NULL, 2),
(34, 'Lana de roca', 'Sustrato inerte y ligero hecho de roca volcánica para cultivos hidropónicos.', 13.99, NULL, 2),
(35, 'Carbón vegetal', 'Sustrato poroso y absorbente que mejora la aireación del suelo.', 10.49, NULL, 2),
(36, 'Arcilla expandida', 'Sustrato cerámico ligero utilizado como drenaje en macetas.', 7.99, NULL, 2),
(37, 'Compost', 'Sustrato orgánico hecho de materiales descompuestos para enriquecer el suelo.', 9.49, NULL, 2),
(38, 'Lombricompost', 'Sustrato orgánico producido por lombrices compostadoras.', 14.99, NULL, 2),
(39, 'Corteza de coco', 'Sustrato orgánico y renovable hecho de cáscaras de coco.', 8.99, NULL, 2),
(40, 'Tierra de diatomeas', 'Sustrato mineral y natural utilizado como insecticida y fungicida.', 11.99, NULL, 2),
(41, 'Fertilizante líquido universal', 'Fertilizante completo para todo tipo de plantas.', 12.99, NULL, 3),
(42, 'Abono orgánico', 'Abono natural rico en nutrientes para el crecimiento de las plantas.', 9.49, NULL, 3),
(43, 'Fertilizante de liberación lenta', 'Fertilizante que proporciona nutrientes gradualmente durante varios meses.', 14.99, NULL, 3),
(44, 'Fertilizante granulado para césped', 'Fertilizante específico para césped para un crecimiento saludable.', 16.49, NULL, 3),
(45, 'Fertilizante en polvo para flores', 'Fertilizante en polvo para promover una floración exuberante.', 11.99, NULL, 3),
(46, 'Fertilizante para tomates', 'Fertilizante específico para tomates para un mejor rendimiento.', 13.49, NULL, 3),
(47, 'Fertilizante para cítricos', 'Fertilizante especial para cítricos para frutas más dulces y jugosas.', 14.99, NULL, 3),
(48, 'Fertilizante líquido para orquídeas', 'Fertilizante equilibrado para el crecimiento de orquídeas.', 18.99, NULL, 3),
(49, 'Fertilizante de inicio para semillas', 'Fertilizante con nutrientes esenciales para el desarrollo inicial de semillas.', 10.99, NULL, 3),
(50, 'Fertilizante en spray para helechos', 'Fertilizante en spray para helechos de interior y exterior.', 8.99, NULL, 3),
(51, 'Fertilizante para suculentas', 'Fertilizante específico para suculentas para un crecimiento compacto.', 12.49, NULL, 3),
(52, 'Fertilizante para bonsáis', 'Fertilizante balanceado para el crecimiento de bonsáis saludables.', 15.99, NULL, 3),
(53, 'Fertilizante en sticks para plantas de acuario', 'Fertilizante en sticks para un crecimiento óptimo de las plantas de acuario.', 19.99, NULL, 3),
(54, 'Fertilizante en polvo para palmeras', 'Fertilizante en polvo para el crecimiento saludable de palmeras.', 13.99, NULL, 3),
(55, 'Fertilizante foliar', 'Fertilizante líquido para aplicar directamente a las hojas de las plantas.', 17.49, NULL, 3),
(56, 'Fertilizante para césped en otoño', 'Fertilizante específico para preparar el césped para el invierno.', 14.49, NULL, 3),
(57, 'Fertilizante líquido para helechos', 'Fertilizante concentrado para helechos de interior y exterior.', 16.99, NULL, 3),
(58, 'Fertilizante en gel para plantas de interior', 'Fertilizante en gel para una liberación lenta de nutrientes en plantas de interior.', 20.49, NULL, 3),
(59, 'Fertilizante para rosales', 'Fertilizante especial para rosales para una floración abundante.', 11.49, NULL, 3),
(60, 'Fertilizante en tabletas para plantas de estanque', 'Fertilizante en tabletas para promover un crecimiento exuberante en plantas de estanque.', 22.99, NULL, 3),
(61, 'Guantes de jardinería', 'Guantes resistentes y cómodos para proteger las manos durante la jardinería.', 7.99, NULL, 4),
(62, 'Regadera de plástico', 'Regadera ligera y duradera para el riego de plantas.', 11.49, NULL, 4),
(63, 'Maceta de terracota', 'Maceta de arcilla porosa ideal para el cultivo de plantas de interior.', 6.99, NULL, 4),
(64, 'Delantal de jardinería', 'Delantal resistente al agua y las manchas para trabajar en el jardín.', 9.99, NULL, 4),
(65, 'Rociador de mano', 'Rociador de mano para aplicar agua y fertilizantes de manera precisa.', 13.49, NULL, 4),
(66, 'Soporte para manguera', 'Soporte resistente para colgar y almacenar mangueras de jardín.', 18.99, NULL, 4),
(67, 'Rodilleras de jardinería', 'Almohadillas acolchadas para proteger las rodillas durante las tareas de jardinería.', 10.99, NULL, 4),
(68, 'Cubo de jardinería', 'Cubo resistente y multiusos para transportar agua y materiales de jardinería.', 8.49, NULL, 4),
(69, 'Cepillo para macetas', 'Cepillo de cerdas duras para limpiar macetas y recipientes de jardín.', 5.99, NULL, 4),
(70, 'Bolsa para herramientas de jardinería', 'Bolsa resistente con múltiples compartimentos para transportar herramientas de jardinería.', 16.99, NULL, 4),
(71, 'Espiral anti-aves', 'Espiral de plástico para proteger las plantas de las aves.', 7.49, NULL, 4),
(72, 'Etiquetas para plantas', 'Etiquetas de plástico reutilizables para identificar plantas en el jardín.', 3.99, NULL, 4),
(73, 'Soporte para plantas trepadoras', 'Soporte de metal para guiar el crecimiento de plantas trepadoras.', 14.49, NULL, 4),
(74, 'Red para proteger árboles frutales', 'Red de nylon para proteger los árboles frutales de pájaros y animales.', 19.99, NULL, 4),
(75, 'Estaca para plantas', 'Estaca de madera o metal para sostener plantas altas y frágiles.', 6.49, NULL, 4),
(76, 'Enrejado de jardín', 'Enrejado de madera o metal para decorar y soportar plantas trepadoras.', 22.99, NULL, 4),
(77, 'Soporte para regadera', 'Soporte resistente para colocar la regadera durante el riego de plantas.', 9.49, NULL, 4),
(78, 'Saco de yute para almacenamiento', 'Saco resistente y transpirable para almacenar bulbos y tubérculos.', 12.99, NULL, 4),
(79, 'Cepillo para musgo', 'Cepillo de cerdas suaves para limpiar musgo y líquenes de piedras y superficies.', 8.99, NULL, 4),
(80, 'Vara de soporte para plantas', 'Vara de metal o madera para sostener plantas altas y endebles.', 5.49, NULL, 4),
(81, 'Piedras decorativas', 'Piedras de colores para decorar senderos y áreas del jardín.', 14.99, NULL, 5),
(82, 'Madera tratada', 'Tablas de madera tratada para la construcción de bordes y estructuras en el jardín.', 19.99, NULL, 5),
(83, 'Plástico para mulching', 'Material plástico para cubrir el suelo y controlar malezas y humedad.', 8.49, NULL, 5),
(84, 'Borde de jardín de metal', 'Borde de metal para delinear áreas y contener el crecimiento de plantas.', 11.99, NULL, 5),
(85, 'Grava para jardinería', 'Grava de diferentes tamaños y colores para pavimentar y decorar el jardín.', 12.49, NULL, 5),
(86, 'Piedra de jardín', 'Piedras grandes para decorar jardines y crear elementos de agua.', 24.99, NULL, 5),
(87, 'Policarbonato para invernaderos', 'Placas de policarbonato para construir cubiertas de invernaderos.', 18.99, NULL, 5),
(88, 'Malla de sombreo', 'Malla de tela para proteger las plantas del sol directo y el calor excesivo.', 15.49, NULL, 5),
(89, 'Césped artificial', 'Rollo de césped artificial para crear áreas verdes de bajo mantenimiento.', 29.99, NULL, 5),
(90, 'Estacas de bambú', 'Estacas naturales de bambú para sostener plantas y guiar su crecimiento.', 7.99, NULL, 5),
(91, 'Rollo de alambre de jardinería', 'Rollo de alambre para construir cercas y estructuras en el jardín.', 13.49, NULL, 5),
(92, 'Macetero de madera', 'Macetero de madera resistente para plantas de interior y exterior.', 21.99, NULL, 5),
(93, 'Tierra para jardín', 'Bolsa de tierra orgánica para mejorar la calidad del suelo en el jardín.', 8.99, NULL, 5),
(94, 'Piedras de río', 'Piedras naturales para decorar arriates y bordes de jardín.', 10.99, NULL, 5),
(95, 'Césped en rollo', 'Rollo de césped natural para establecer áreas de césped de forma rápida.', 34.99, NULL, 5),
(96, 'Bolsa de musgo', 'Bolsa de musgo esfagno para la decoración y el cultivo de plantas de interior.', 6.49, NULL, 5),
(97, 'Carbón para barbacoa', 'Saco de carbón vegetal para usar como sustrato en macetas y jardineras.', 7.99, NULL, 5),
(98, 'Tela geotextil', 'Rollo de tela para controlar la erosión y mejorar la retención de agua en el suelo.', 16.49, NULL, 5),
(99, 'Corteza de árbol', 'Corteza de árbol triturada para cubrir el suelo y retener la humedad.', 9.99, NULL, 5),
(100, 'Panel de césped artificial', 'Panel modular de césped artificial para cubrir grandes áreas de forma uniforme.', 39.99, NULL, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `pass`, `direccion`, `poblacion`, `provincia`, `codigo_postal`) VALUES
(2, 'Juan', 'ejemplo@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '123 Calle Principal', 'Ciudad Ejemplo', 'Provincia Ejemplo', '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `ID_pedido` (`id_pedido`),
  ADD KEY `ID_producto` (`id_producto`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `ID_usuario` (`id_usuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `ID_categoria` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_pedido`
--
ALTER TABLE `detalles_pedido`
  ADD CONSTRAINT `detalles_pedido_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`),
  ADD CONSTRAINT `detalles_pedido_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
