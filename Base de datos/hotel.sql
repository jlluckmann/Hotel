-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-01-2020 a las 17:09:52
-- Versión del servidor: 10.1.40-MariaDB
-- Versión de PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hotel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `RutAdmin` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NombreAdmin` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ApPat` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ApMat` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`RutAdmin`, `NombreAdmin`, `ApPat`, `ApMat`) VALUES
('', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clienteregistrado`
--

CREATE TABLE `clienteregistrado` (
  `RutCliente` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NombreCliente` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ApPat` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ApMat` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `clienteregistrado`
--

INSERT INTO `clienteregistrado` (`RutCliente`, `NombreCliente`, `ApPat`, `ApMat`) VALUES
('10003596-1', 'Valeska', 'Labra', 'Olave'),
('10102542-0', 'Roberto', 'Velasquez', 'Urrutia'),
('13582693-5', 'Antonio', 'Montalba', 'Guzman'),
('13703089-6', 'Cecilia', 'Escobar', 'Palma'),
('14950003-6', 'Cristian', 'Salgado', 'Rodriguez'),
('16012197-1', 'Maria', 'Caamaño', 'Ruiz'),
('16423122-8', 'Sebastian', 'Figueroa', 'Lopez'),
('16853848-0', 'Thiara', 'Silva', 'Soto'),
('17796341-0', 'Alejandra', 'Gatica', 'Stuardo'),
('18234557-1', 'Cintia', 'Salfate', 'Rojas'),
('18410258-0', 'Estefania', 'Acuña', 'Burgos'),
('18413369-8', 'Jazmin', 'Flores', 'Saavedra'),
('19380586-8', 'Karen', 'Iglesias', 'Reyes'),
('20234512-1', 'Javiera', 'Palacios', 'Gonzalez'),
('20777452-3', 'Lupe', 'Berrios', 'Rivera'),
('6542323-2', 'Monica', 'Barra', 'Olmos'),
('8456123-5', 'Juan', 'Perez', 'Cruz'),
('8760065-1', 'Gabriel', 'Pasten', 'Arias'),
('8963852-8', 'Martin', 'Ruiz', 'Ruiz'),
('9265412-7', 'Aquiles', 'Valderrama', 'Grez'),
('9632203-6', 'Cristina', 'Aguilar', 'Campos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitacion`
--

CREATE TABLE `habitacion` (
  `NumHab` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `TipoHab` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `habitacion`
--

INSERT INTO `habitacion` (`NumHab`, `TipoHab`) VALUES
('100', 'simple'),
('101', 'simple'),
('102', 'simple'),
('103', 'doble'),
('104', 'doble'),
('105', 'simple'),
('106', 'simple'),
('201', 'matrimonial'),
('202', 'matrimonial'),
('203', 'simple'),
('204', 'doble'),
('205', 'doble'),
('206', 'simple'),
('301', 'matrimonial'),
('302', 'matrimonial'),
('303', 'doble'),
('304', 'doble'),
('305', 'matrimonial'),
('306', 'simple'),
('401', 'simple'),
('402', 'doble'),
('403', 'doble'),
('405', 'simple'),
('406', 'matrimonial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recepcionista`
--

CREATE TABLE `recepcionista` (
  `RutRecep` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NombreRecep` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ApPat` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ApMat` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `RutCliente` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NumHab` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `NombreCliente` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ApPat` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ApMat` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Telefono` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Correo` varchar(40) COLLATE utf8mb4_spanish_ci NOT NULL,
  `FechaReserva` date NOT NULL,
  `FechaSalida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`RutCliente`, `NumHab`, `NombreCliente`, `ApPat`, `ApMat`, `Telefono`, `Correo`, `FechaReserva`, `FechaSalida`) VALUES
('10003596-1', '202', 'Valeska', 'Labra', 'Olave', '77536032', 'valolave@gmail.com', '2020-02-12', '2020-02-16'),
('13582693-5', '101', 'Antonio', 'Montalba', 'Guzman', '96953220', 'antonio_montal@gmail.com', '2020-01-31', '2020-02-01'),
('14950003-6', '403', 'Cristian', 'Salgado', 'Rodriguez', '78546369', 'cris.salgadodo@gmail.com', '2020-02-14', '2020-02-22'),
('16423122-8', '100', 'Sebastian', 'Figueroa', 'Lopez', '35229111', 'seb_fig@gmail.com', '2020-01-18', '2020-01-19'),
('16423122-8', '202', 'Sebastian', 'Figueroa', 'Lopez', '35229111', 'seb_fig@gmail.com', '2020-01-20', '2020-01-22'),
('16853848-0', '201', 'Thiara', 'Silva', 'Soto', '45458010', 'thiara.ss@gmail.com', '2020-01-24', '2020-01-26'),
('17796341-0', '103', 'Alejandra', 'Gatica', 'Stuardo', '83777401', 'ale_gatica.s@gmail.com', '2020-01-20', '2020-01-24'),
('18410258-0', '306', 'Estefania', 'Acuña', 'Burgos', '75742121', 'stefa_acuña@gmail.com', '2020-01-20', '2020-01-24'),
('18413369-8', '406', 'Jazmin', 'Flores', 'Saavedra', '49946556', 'jaz.flrs@gmail.com', '2020-03-01', '2020-03-10'),
('20234512-1', '101', 'Javiera', 'Palacios', 'Gonzalez', '89674522', 'javipg@gmail.com', '2020-01-12', '2020-01-16'),
('8456123-5', '100', 'Juan', 'Perez', 'Cruz', '78784001', 'jonperez@gmail.com', '2020-02-05', '2020-02-08'),
('8760065-1', '301', 'Gabriel', 'Pasten', 'Arias', '83410259', 'gabi_parias@gmail.com', '2020-02-09', '2020-02-10'),
('9265412-7', '304', 'Aquiles', 'Valderrama', 'Grez', '54546785', 'aquilito_valde@gmail.com', '2020-03-02', '2020-03-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipodehabitacion`
--

CREATE TABLE `tipodehabitacion` (
  `TipoHab` varchar(12) COLLATE utf8mb4_spanish_ci NOT NULL,
  `Precio` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tipodehabitacion`
--

INSERT INTO `tipodehabitacion` (`TipoHab`, `Precio`) VALUES
('doble', 40000),
('matrimonial', 25000),
('simple', 20000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`RutAdmin`);

--
-- Indices de la tabla `clienteregistrado`
--
ALTER TABLE `clienteregistrado`
  ADD PRIMARY KEY (`RutCliente`);

--
-- Indices de la tabla `habitacion`
--
ALTER TABLE `habitacion`
  ADD PRIMARY KEY (`NumHab`);

--
-- Indices de la tabla `recepcionista`
--
ALTER TABLE `recepcionista`
  ADD PRIMARY KEY (`RutRecep`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`RutCliente`,`NumHab`,`FechaReserva`,`FechaSalida`),
  ADD KEY `reserva_ibfk_2` (`NumHab`);

--
-- Indices de la tabla `tipodehabitacion`
--
ALTER TABLE `tipodehabitacion`
  ADD PRIMARY KEY (`TipoHab`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
