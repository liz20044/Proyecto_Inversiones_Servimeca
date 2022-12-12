-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2022 a las 01:23:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `apsystem`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`) VALUES
(1, 'admin', '$2y$10$UrGSvHTWm8.ZK4BzPmo8iuqsK6XF5RfHay6ooC5D50y/nShon5wqe', 'Gabriel', 'Monsalve', 'avatar5.png', '2022-12-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `attendance`
--

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`) VALUES
(121, 27, '2022-12-06', '17:57:09', 0, '19:25:35', 3.95),
(122, 28, '2022-12-06', '19:25:44', 0, '19:25:48', 5.4166666666667);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepts`
--

CREATE TABLE `concepts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `concepts`
--

INSERT INTO `concepts` (`id`, `name`, `amount`, `type`) VALUES
(1, 'Sueldo', 2600, 2),
(2, 'Seguro Social', 250, 1),
(3, 'Transporte', 180, 2),
(4, 'Servicios funerarios', 150, 1),
(5, 'Servicio Familiar', 200, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `customer_id` varchar(15) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `document` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `first_name`, `last_name`, `address`, `phone`, `email`, `document`, `created_at`) VALUES
(1, 'TKZ870542619', 'Diego', 'Alberto', 'Santa ines, Estado Aragua - Maracay', '04144595322', 'alberto@email.com', '28249485', '2022-12-03 13:23:58'),
(2, 'SUM138604975', 'Carlos', 'Rodriguez', 'Santa ines, Estado Aragua', '04144595344', 'carlos@email.com', '28249485', '2022-12-03 13:47:31'),
(4, 'IYB362804517', 'Alberto', 'Rodriguez', 'Maracay plaza', '04144595322', 'alberto@gmail.com', '28249486', '2022-12-05 18:11:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `position_id` int(11) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `position_id`, `schedule_id`, `photo`, `created_on`) VALUES
(27, '29708486', 'Gabriel', 'Monsalve', 'ww', '2022-12-06', '0412555555', 'Male', 0, 5, 'avatar5.png', '2022-12-06'),
(28, '10361373', 'Sheila', 'Monsalve', 'ss', '2022-12-06', '0412758888', 'Female', 0, 5, 'avatar2.png', '2022-12-06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `employee_id`, `created_on`) VALUES
(7, 27, '2022-12-06 17:59:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_details`
--

CREATE TABLE `files_details` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `concept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `files_details`
--

INSERT INTO `files_details` (`id`, `file_id`, `concept_id`) VALUES
(20, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `payroll`
--

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL,
  `payroll_id` varchar(15) NOT NULL,
  `date_pay` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `payroll`
--

INSERT INTO `payroll` (`id`, `payroll_id`, `date_pay`, `employee_id`, `amount`) VALUES
(55, 'LBK239148057', '2022-12-06', 27, 2600);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `position`
--

CREATE TABLE `position` (
  `id` int(11) NOT NULL,
  `description` varchar(150) NOT NULL,
  `rate` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `position`
--

INSERT INTO `position` (`id`, `description`, `rate`) VALUES
(1, 'Programador', 100000),
(2, 'Escritor', 28000),
(3, 'Marketing ', 42000),
(4, 'DiseÃ±ador GrÃ¡fico', 35000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales`
--

CREATE TABLE `sales` (
  `id` int(11) NOT NULL,
  `sale_id` varchar(15) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `total_ve` float NOT NULL,
  `total_us` float NOT NULL,
  `status` int(11) NOT NULL,
  `pay_method` text NOT NULL,
  `pay_reference` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `sale_id`, `customer_id`, `vehicle_id`, `created_on`, `total_ve`, `total_us`, `status`, `pay_method`, `pay_reference`) VALUES
(1, 'BTF725936140', 1, 1, '2022-12-04 17:39:11', 351, 27, 1, 'Pago Movil', '8080'),
(2, 'TEJ549823607', 2, 2, '2022-12-04 18:10:45', 700, 70, 1, 'Pago Movil', '8081'),
(3, 'GQO127540639', 1, 1, '2022-12-04 20:23:27', 351, 27, 1, 'Pago Movil', '8082'),
(4, 'NAI459263187', 1, 1, '2022-12-06 18:00:57', 1051, 97, 1, 'pago movil', '2222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sales_details`
--

CREATE TABLE `sales_details` (
  `id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `total_ve` float NOT NULL,
  `total_us` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sales_details`
--

INSERT INTO `sales_details` (`id`, `service_id`, `sale_id`, `total_ve`, `total_us`) VALUES
(1, 1, 1, 351, 27),
(2, 2, 2, 400, 40),
(3, 3, 2, 300, 30),
(4, 1, 3, 351, 27),
(5, 1, 4, 351, 27),
(6, 2, 4, 400, 40),
(7, 3, 4, 300, 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(5, '07:00:00', '13:00:00'),
(6, '13:00:00', '18:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_id` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_ve` float NOT NULL,
  `price_us` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `service_id`, `name`, `price_ve`, `price_us`, `status`) VALUES
(1, 'GWN087429651', 'Carga de bateria', 35, 4, 1),
(2, 'BNQ145327986', 'Cambios de silenciador', 40, 4, 1),
(3, 'PDA874319526', 'Bajar y montar caja tipo A', 300, 30, 1),
(6, 'KYN789345126', 'Cambio de Aceite', 50, 4, 1),
(7, 'OTH238746915', 'Carga de Bateria', 30, 2, 1),
(8, 'BMK174328905', 'Cambio de Pastillas y Bandas de Freno', 100, 9, 1),
(9, 'JPT573640891', 'Cambio de Amortiguadores', 70, 6, 1),
(10, 'GFV452780613', 'Cambio de Pila de Gasolina', 120, 11, 1),
(11, 'QVL289054317', 'Limpieza de Inyectores', 90, 8, 1),
(12, 'CNF295381706', 'Reparación Electrónica', 150, 14, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `patent` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `chassis` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `patent`, `brand`, `model`, `color`, `engine`, `chassis`, `customer_id`, `status`) VALUES
(1, 'ABC-01D', 'Renault', 'Twingo', 'Amarillo', 'VR8-13', '123-CHS', 2, 1),
(2, 'AA7-2BB', 'Chevrolet', 'Aveo LT 2009', 'Gris', 'V8-404', '123-CHA', 1, 1),
(4, 'ABB-123', 'Ford', 'Super Carro Ford', 'Verde', 'b45-12', '123-CHF', 4, 1),
(5, '123-ABB', 'Jeep', 'Cherokee', 'Amarillo', 'V8-404', '123-CHD', 4, 1),
(6, 'DIE-12D', 'FIAT1', 'UNO', 'Negro', 'V8-401', '123-CHU', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `concepts`
--
ALTER TABLE `concepts`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `files_details`
--
ALTER TABLE `files_details`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `position`
--
ALTER TABLE `position`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT de la tabla `concepts`
--
ALTER TABLE `concepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `files_details`
--
ALTER TABLE `files_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT de la tabla `position`
--
ALTER TABLE `position`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
