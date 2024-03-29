-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-07-2023 a las 15:55:53
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
-- Base de datos: `gomper`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE `almacen` (
  `Id_Almacen` int(11) NOT NULL,
  `Id_Producto` int(11) DEFAULT NULL,
  `Id_Venta` int(11) DEFAULT NULL,
  `Nombre_Producto` varchar(255) DEFAULT NULL,
  `Cantidad_Producto` int(11) DEFAULT NULL,
  `Fecha_Ingreso` date DEFAULT NULL,
  `Fecha_Salida` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`Id_Almacen`, `Id_Producto`, `Id_Venta`, `Nombre_Producto`, `Cantidad_Producto`, `Fecha_Ingreso`, `Fecha_Salida`) VALUES
(45, 0, 0, 'axel', 500, '2023-06-22', '2023-07-01'),
(1234, 56890, 46667, 'bolsa', 90, '2023-06-07', '2023-07-08'),
(4587, 8765, 46667, 'bolsa', 500, '2023-06-08', '2023-07-07'),
(77777, 7777, 77777, 'bolsa', 500, '2023-06-14', '2023-06-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `Id_Cliente` int(11) DEFAULT NULL,
  `Nombre_Cliente` varchar(100) DEFAULT NULL,
  `Apellido_Cliente` varchar(100) DEFAULT NULL,
  `Telefono` varchar(20) DEFAULT NULL,
  `Correo_Electronico` varchar(100) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Celular` varchar(20) DEFAULT NULL,
  `C_P` varchar(10) DEFAULT NULL,
  `RFC` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`Id_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Telefono`, `Correo_Electronico`, `Direccion`, `Celular`, `C_P`, `RFC`) VALUES
(47654, 'Uriel', 'Alarcon', '5509876543', 'uri@hotmail.com', 'cdmx', 'CDMX', '65424', 'MD34753NC2CC'),
(234, 'nancy', 'Beltran', '5587758373', 'nancy@hotmail.com', 'CDMX', '55876544678', '7654367', 'DF566JHG54F3'),
(999, 'Ulises', 'Juan', '55876954', 'ulises@hotmail.com', 'cdmx', '87455734', '65424', 'MD34753NC2CC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destrucciones`
--

CREATE TABLE `destrucciones` (
  `id_devolucion` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_materiaP` int(11) NOT NULL,
  `Id_Destruccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `destrucciones`
--

INSERT INTO `destrucciones` (`id_devolucion`, `id_producto`, `id_materiaP`, `Id_Destruccion`) VALUES
(64, 8765, 0, 0),
(102, 8765, 0, 0),
(678, 8765, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devoluciones`
--

CREATE TABLE `devoluciones` (
  `id_devolucion` int(11) NOT NULL,
  `id_producto` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `id_venta` int(11) DEFAULT NULL,
  `fecha_devolucion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `devoluciones`
--

INSERT INTO `devoluciones` (`id_devolucion`, `id_producto`, `id_cliente`, `id_venta`, `fecha_devolucion`) VALUES
(64, 8765, 47654, 46667, '2023-06-06'),
(67, 7777, 0, 0, '2023-06-22'),
(67654, 8765, 0, 0, '2023-07-04'),
(6574840, 8765, 47654, 46667, '2023-06-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia_prima`
--

CREATE TABLE `materia_prima` (
  `id_materiaP` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `tipo_materia` varchar(100) NOT NULL,
  `Id_Destruccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `materia_prima`
--

INSERT INTO `materia_prima` (`id_materiaP`, `nombre`, `cantidad`, `tipo_materia`, `Id_Destruccion`) VALUES
(3, 'bolsa10x25', 800, 'plastico', 0),
(7, 'plasticoF', 300, 'Fluoresencia', 0),
(9, 'Colorante', 300, 'Colorante', 0),
(10, 'Colorante', 500, 'Azul', 0),
(11, 'Sulfato', 50, 'Acido', 0),
(14, 'botox', 50, 'Acido', 0),
(15, 'play3', 1200, 'Gamer', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos_quimicos`
--

CREATE TABLE `procesos_quimicos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `quimicos_utilizar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `procesos_quimicos`
--

INSERT INTO `procesos_quimicos` (`id`, `nombre`, `cantidad`, `quimicos_utilizar`) VALUES
(44, 'ulises', 500, '22'),
(45, 'uriel', 90, '22'),
(46, 'jose', 90, '13');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `produccion`
--

CREATE TABLE `produccion` (
  `Id_Producion` int(11) NOT NULL,
  `Id_MateriaP` int(11) DEFAULT NULL,
  `Producto` varchar(100) DEFAULT NULL,
  `Nombre` varchar(100) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `produccion`
--

INSERT INTO `produccion` (`Id_Producion`, `Id_MateriaP`, `Producto`, `Nombre`, `Cantidad`) VALUES
(1, 3, 'bolsa10x25', 'bolsa de mano', 500),
(2, 3, 'bolsa10x25', 'bolsa', 500),
(3, 3, 'bolsa10x25', 'bolsa', 500),
(8, 40, 'bolsa500x32', 'bolsa', 20),
(9, 300, 'polvo', 'Colorante', 56),
(10, 67, 'bolsa', 'mano', 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_Producto` int(11) DEFAULT NULL,
  `Nombre_producto` varchar(255) DEFAULT NULL,
  `Tipo` varchar(255) DEFAULT NULL,
  `Color` varchar(255) DEFAULT NULL,
  `Dimensiones` varchar(255) DEFAULT NULL,
  `Precio` decimal(10,2) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Fecha_Inicial` date DEFAULT NULL,
  `Almacen_Sucursal` varchar(255) DEFAULT NULL,
  `Id_produccion` int(11) NOT NULL,
  `Id_DetalleP` int(11) NOT NULL,
  `Id_Destruccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Nombre_producto`, `Tipo`, `Color`, `Dimensiones`, `Precio`, `Cantidad`, `Fecha_Inicial`, `Almacen_Sucursal`, `Id_produccion`, `Id_DetalleP`, `Id_Destruccion`) VALUES
(123, 'Producto 1', 'plastico', 'azul', 'latex', '3400.00', 500, '2023-07-31', 'Sucursal 1', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `Id_Proveedor` int(11) NOT NULL,
  `Nombre_proveedor` varchar(255) DEFAULT NULL,
  `Producto` varchar(255) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Precio_Compra` decimal(10,2) DEFAULT NULL,
  `Fecha_Ingreso` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`Id_Proveedor`, `Nombre_proveedor`, `Producto`, `Cantidad`, `Precio_Compra`, `Fecha_Ingreso`) VALUES
(1, 'juan', 'bolsa10x8cm', 500, '500.00', '2023-05-31'),
(4, 'ulises', 'bolsa10x8cm', 1200, '500.00', '2023-07-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `residuos_terminados`
--

CREATE TABLE `residuos_terminados` (
  `Id_RQ` int(11) DEFAULT NULL,
  `MateriaP` varchar(50) DEFAULT NULL,
  `Nombre` varchar(50) DEFAULT NULL,
  `Materia` varchar(50) DEFAULT NULL,
  `Cantidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `residuos_terminados`
--

INSERT INTO `residuos_terminados` (`Id_RQ`, `MateriaP`, `Nombre`, `Materia`, `Cantidad`) VALUES
(45, 'Platicpet', 'plasticoF2', 'Sintetico', 50),
(12, 'Platicpet', 'uriel', 'Sintetico', 500),
(78, 'Platicpet', 'ulises', 'Sintetico', 500),
(45, 'Platicpet', 'uriel', 'Sintetico', 500);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `correo`, `contrasena`) VALUES
(3, 'uriel', 'uri@hotmail.com', '1234'),
(4, 'nancy', 'nancy@hotmail.com', '1234'),
(6, 'Gustavo', '', '$2y$10$Zia7ffmgnNQXtimhOmGyIu5tcbain77o3stZvTqf5BANkKE1.egSW'),
(9, 'ulises', '', '$2y$10$0TGYllg5dR6oOS/96aoJ6uAqZaviOpUNK5d1TCv4TdzaUD/CWRwtm'),
(17, 'carla', '', '$2y$10$iMweELHX8.0am3bl6l3RqusNtqmb9lUFMCcE3P.KBlbs7j7R4QYrm'),
(18, 'uri', '', '$2y$10$zfBKiCEtugLRIYO0cWbmy.ZAYcREKbH2UaLPkgevYLLMbtdcrsbbC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `Id_Venta` int(11) DEFAULT NULL,
  `Id_Producto` int(11) DEFAULT NULL,
  `Id_Cliente` int(11) DEFAULT NULL,
  `Cantidad_Producto` int(11) DEFAULT NULL,
  `Costo_Producto` decimal(10,2) DEFAULT NULL,
  `Fecha_Venta` date DEFAULT NULL,
  `Total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`Id_Venta`, `Id_Producto`, `Id_Cliente`, `Cantidad_Producto`, `Costo_Producto`, `Fecha_Venta`, `Total`) VALUES
(46667, 8765, 47654, 100, '300.00', '2023-07-12', '3000.00'),
(98765, 8765, 234, 100, '300.00', '2023-07-11', '3000.00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacen`
--
ALTER TABLE `almacen`
  ADD PRIMARY KEY (`Id_Almacen`),
  ADD UNIQUE KEY `Id_Almacen` (`Id_Almacen`);

--
-- Indices de la tabla `destrucciones`
--
ALTER TABLE `destrucciones`
  ADD PRIMARY KEY (`id_devolucion`,`id_producto`);

--
-- Indices de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  ADD PRIMARY KEY (`id_devolucion`);

--
-- Indices de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  ADD PRIMARY KEY (`id_materiaP`),
  ADD UNIQUE KEY `nombre` (`nombre`,`cantidad`,`tipo_materia`),
  ADD UNIQUE KEY `nombre_2` (`nombre`,`cantidad`,`tipo_materia`),
  ADD UNIQUE KEY `id_materiaP` (`id_materiaP`),
  ADD UNIQUE KEY `id_materiaP_2` (`id_materiaP`),
  ADD KEY `id_materiaP_3` (`id_materiaP`);

--
-- Indices de la tabla `procesos_quimicos`
--
ALTER TABLE `procesos_quimicos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `produccion`
--
ALTER TABLE `produccion`
  ADD PRIMARY KEY (`Id_Producion`),
  ADD UNIQUE KEY `Id_Producion` (`Id_Producion`),
  ADD KEY `Id_MateriaP` (`Id_MateriaP`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`Id_Proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `destrucciones`
--
ALTER TABLE `destrucciones`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=679;

--
-- AUTO_INCREMENT de la tabla `devoluciones`
--
ALTER TABLE `devoluciones`
  MODIFY `id_devolucion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6574842;

--
-- AUTO_INCREMENT de la tabla `materia_prima`
--
ALTER TABLE `materia_prima`
  MODIFY `id_materiaP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `procesos_quimicos`
--
ALTER TABLE `procesos_quimicos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT de la tabla `produccion`
--
ALTER TABLE `produccion`
  MODIFY `Id_Producion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `Id_Proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
