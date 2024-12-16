-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-12-2024 a las 14:14:14
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

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
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `fecha_agregado` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre`, `descripcion`) VALUES
(1, 'Herramientas', 'Herramientas utilizadas para labores de jardinería, como palas, rastrillos, tijeras de podar, entre otros.'),
(2, 'Abonos', 'Materiales utilizados como base para el crecimiento de plantas, como tierra para macetas, turba, perlita, vermiculita, entre otros.'),
(4, 'Accesorios', 'Productos complementarios para la jardinería, como guantes, regaderas, macetas, entre otros.'),
(5, 'Materiales', 'Materiales diversos utilizados en proyectos de jardinería, como madera, piedras, plásticos, entre otros.');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `imagen`, `id_categoria`) VALUES
(1, 'Pala de jardín', 'Pala resistente para cavar y trasplantar en el jardín.', '26.99', '../img/pala_jardineria.png', 1),
(2, 'Rastrillo de mano', 'Rastrillo pequeño para trabajar en áreas reducidas del jardín.', '9.99', '../img/rastrillo_mano.png', 1),
(3, 'Tijeras de podar', 'Tijeras afiladas para podar ramas y arbustos.', '12.49', '../img/tijera_podar.png', 1),
(4, 'Hacha de jardín', 'Herramienta para cortar ramas gruesas y leñosas.', '18.99', '../img/hacha_jardineria.png', 1),
(5, 'Azada', 'Instrumento para cavar y remover la tierra en el jardín.', '11.99', '../img/azada_jardineria.png', 1),
(6, 'Corta ramas', 'Herramienta para cortar ramas de árboles y arbustos.', '14.99', '../img/corta_ramas.png', 1),
(7, 'Cuchillo de jardín', 'Cuchillo multiusos para varias tareas de jardinería.', '8.49', '../img/cuchillo_jardineria.png', 1),
(8, 'Pulverizador de mano', 'Pulverizador para aplicar líquidos como pesticidas y fertilizantes.', '16.99', '../img/pulverizador_jardin.png', 1),
(9, 'Guadaña', 'Herramienta para segar césped y hierba en áreas grandes.', '22.99', '../img/guadaña_jardineria.png', 1),
(10, 'Despuntadora\r\n', 'Máquina para cortar y despuntar la hierba en el jardín.', '89.99', '../img/despuntadora.png', 1),
(11, 'Tijeras de podar telescópicas', 'Tijeras ajustables para podar ramas altas y difíciles de alcanzar.', '24.99', '../img/tijeras_extensibles.png', 1),
(12, 'Cortasetos', 'Herramienta eléctrica para recortar setos y arbustos.', '54.99', '../img/cortasetos.png', 1),
(22, 'Turba', 'Material orgánico para mejorar la retención de agua en el suelo.', '5.49', '../img/abono.png', 2),
(23, 'Perlita', 'Sustrato ligero utilizado para mejorar la aireación del suelo.', '4.99', '../img/abono.png', 2),
(24, 'Vermiculita', 'Sustrato mineral para mejorar la retención de agua y nutrientes.', '6.99', '../img/abono.png', 2),
(26, 'Coco coir', 'Fibra de coco utilizada como sustrato para plantas de interior.', '7.49', '../img/abono.png', 2),
(29, 'Tierra para jardín', 'Sustrato universal para el cultivo de plantas en el jardín.', '6.49', '../img/abono.png', 2),
(30, 'Arena para cactus', 'Sustrato específico para el cultivo de cactus y suculentas.', '4.49', '../img/abono.png', 2),
(31, 'Musgo sphagnum', 'Sustrato de musgo para el cultivo de orquídeas y plantas epífitas.', '12.99', '../img/abono.png', 2),
(32, 'Perlite expandida', 'Sustrato ligero y estéril utilizado como agregado en mezclas de suelo.', '5.99', '../img/abono.png', 2),
(33, 'Corteza de pino', 'Sustrato orgánico de corteza de pino para mejorar la retención de agua.', '8.49', '../img/abono.png', 2),
(34, 'Lana de roca', 'Sustrato inerte y ligero hecho de roca volcánica para cultivos hidropónicos.', '13.99', '../img/abono.png', 2),
(35, 'Carbón vegetal', 'Sustrato poroso y absorbente que mejora la aireación del suelo.', '10.49', '../img/abono.png', 2),
(36, 'Arcilla expandida', 'Sustrato cerámico ligero utilizado como drenaje en macetas.', '7.99', '../img/abono.png', 2),
(37, 'Compost', 'Sustrato orgánico hecho de materiales descompuestos para enriquecer el suelo.', '9.49', '../img/abono.png', 2),
(38, 'Lombricompost', 'Sustrato orgánico producido por lombrices compostadoras.', '14.99', '../img/abono.png', 2),
(39, 'Corteza de coco', 'Sustrato orgánico y renovable hecho de cáscaras de coco.', '8.99', '../img/abono.png', 2),
(40, 'Tierra de diatomeas', 'Sustrato mineral y natural utilizado como insecticida y fungicida.', '11.99', '../img/abono.png', 2),
(41, 'Fertilizante líquido universal', 'Fertilizante completo para todo tipo de plantas.', '12.99', '../img/fertilizante.png', 2),
(42, 'Abono orgánico', 'Abono natural rico en nutrientes para el crecimiento de las plantas.', '9.49', '../img/fertilizante.png', 2),
(43, 'Fertilizante de liberación lenta', 'Fertilizante que proporciona nutrientes gradualmente durante varios meses.', '14.99', '../img/fertilizante.png', 2),
(44, 'Fertilizante granulado para césped', 'Fertilizante específico para césped para un crecimiento saludable.', '16.49', '../img/fertilizante.png', 2),
(45, 'Fertilizante en polvo para flores', 'Fertilizante en polvo para promover una floración exuberante.', '11.99', '../img/fertilizante.png', 2),
(46, 'Fertilizante para tomates', 'Fertilizante específico para tomates para un mejor rendimiento.', '13.49', '../img/fertilizante.png', 2),
(47, 'Fertilizante para cítricos', 'Fertilizante especial para cítricos para frutas más dulces y jugosas.', '14.99', '../img/fertilizante.png', 2),
(61, 'Guantes de jardinería', 'Guantes resistentes y cómodos para proteger las manos durante la jardinería.', '7.99', '../img/guantes_jardineria.jpg', 4),
(62, 'Regadera de plástico', 'Regadera ligera y duradera para el riego de plantas.', '11.49', '../img/regadera.png', 4),
(63, 'Maceta de terracota', 'Maceta de arcilla porosa ideal para el cultivo de plantas de interior.', '6.99', '../img/maceta_terracota.jpg', 4),
(64, 'Delantal de jardinería', 'Delantal resistente al agua y las manchas para trabajar en el jardín.', '9.99', '../img/delantal.png', 4),
(65, 'Rociador de mano', 'Rociador de mano para aplicar agua y fertilizantes de manera precisa.', '13.49', '../img/rociador.png', 4),
(66, 'Soporte para manguera', 'Soporte resistente para colgar y almacenar mangueras de jardín.', '18.99', '../img/soporte_manguera.png', 4),
(68, 'Cubo de jardinería', 'Cubo resistente y multiusos para transportar agua y materiales de jardinería.', '8.49', '../img/cubo_jardineria.png', 4),
(85, 'Grava para jardinería', 'Grava de diferentes tamaños y colores para pavimentar y decorar el jardín.', '12.49', '../img/grava_jardineria.png', 5),
(86, 'Piedra de jardín', 'Piedras grandes para decorar jardines y crear elementos de agua.', '24.99', '../img/piedra_jardineria.png', 5),
(87, 'Policarbonato para invernaderos', 'Placas de policarbonato para construir cubiertas de invernaderos.', '18.99', '../img/policarbonato.png', 5),
(89, 'Césped artificial', 'Rollo de césped artificial para crear áreas verdes de bajo mantenimiento.', '29.99', '../img/cesped_artificial.png', 5),
(90, 'Estacas de bambú', 'Estacas naturales de bambú para sostener plantas y guiar su crecimiento.', '7.99', '../img/estaca_bambu.png', 5),
(91, 'Rollo de alambre de jardinería', 'Rollo de alambre para construir cercas y estructuras en el jardín.', '13.49', '../img/alambre.png', 5),
(92, 'Macetero de madera', 'Macetero de madera resistente para plantas de interior y exterior.', '21.99', '../img/macetero.jpg', 5),
(93, 'Tierra para jardín', 'Bolsa de tierra orgánica para mejorar la calidad del suelo en el jardín.', '8.99', '../img/tierra_maceta.png', 5),
(94, 'Piedras de río', 'Piedras naturales para decorar arriates y bordes de jardín.', '10.99', '../img/piedras_rio.png', 5),
(96, 'Bolsa de musgo', 'Bolsa de musgo esfagno para la decoración y el cultivo de plantas de interior.', '6.49', '../img/musgo.png', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `dni` varchar(10) NOT NULL,
  `pass` varchar(100) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `poblacion` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(11) DEFAULT NULL,
  `rol` varchar(10) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `email`, `dni`, `pass`, `direccion`, `poblacion`, `provincia`, `codigo_postal`, `rol`) VALUES
(1, 'admin', 'admin@admin.com', '', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '123 Calle Principal', 'Ciudad Ejemplo', 'Provincia Ejemplo', '12345', 'admin'),
(2, 'Andrei44', 'correo@gmail.com', '12345678Z', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 'direccio11', 'poblacion', 'Burgos', '09400', 'user'),
(3, 'admin2@gmail.com', 'admin2@gmail.com', '12345678X', '60fe74406e7f353ed979f350f2fbb6a2e8690a5fa7d1b0c32983d1d8b3f95f67', 'C\\ Las Amapolas - nº10', 'Burgos', 'Burgos', '09400', 'admin'),
(4, 'Andrei2', 'andrei@gmail.com', '12345678Y', '8ed58d05dc90d42142f9fea7bf4cfcc964e51a9ad9ef85f831b0bdbba4a391c2', 'C\\ Las Amapolas - nº10', 'Burgos', 'Burgos', '09400', 'user');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD UNIQUE KEY `id_usuario` (`id_usuario`,`id_producto`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `idx_usuario_producto` (`id_usuario`,`id_producto`);

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
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

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
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE CASCADE;

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
