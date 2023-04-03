-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2023 a las 17:49:11
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

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

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `obtener_ejecutor` (`id` INT) RETURNS VARCHAR(20) CHARSET utf8mb4 COLLATE utf8mb4_general_ci  BEGIN
    DECLARE nombre VARCHAR(20);
    
	 SET nombre = (SELECT CONCAT(employees.firstname, ' ', employees.lastname) AS nombre from employees where employees.employee_id=id);	 
    RETURN nombre;
END$$

DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `attendance`
--

INSERT INTO `attendance` (`id`, `employee_id`, `date`, `time_in`, `status`, `time_out`, `num_hr`) VALUES
(121, 27, '2022-12-06', '17:57:09', 0, '19:25:35', 0),
(123, 29, '2022-12-11', '20:14:01', 0, '20:14:06', 0),
(124, 29, '2023-01-18', '21:52:48', 0, '21:53:03', 0),
(125, 27, '2023-01-18', '22:09:14', 0, '22:09:33', 0),
(126, 29, '2023-01-21', '23:59:04', 0, '00:00:00', 0),
(127, 29, '2023-01-23', '11:56:59', 0, '00:00:00', 0),
(128, 27, '2023-01-24', '17:51:54', 0, '17:52:02', 0),
(129, 27, '2023-02-06', '20:21:19', 0, '20:21:28', 0),
(130, 29, '2023-02-06', '23:19:42', 0, '23:19:45', 0),
(131, 29, '2023-02-06', '23:19:42', 0, '00:00:00', 0),
(132, 29, '2023-02-26', '22:58:48', 0, '22:59:54', 0),
(134, 27, '2023-02-26', '23:16:43', 0, '23:16:47', 0),
(138, 29, '2023-02-27', '20:57:09', 0, '20:58:40', 2.95),
(139, 29, '2023-02-27', '20:57:09', 0, '00:00:00', 0),
(140, 29, '2023-02-28', '00:44:53', 1, '00:44:57', 11.25),
(141, 29, '2023-03-08', '21:32:49', 0, '21:32:53', 3.5333333333333),
(142, 29, '2023-03-20', '20:48:24', 0, '00:00:00', 0),
(155, 27, '2023-03-27', '22:33:53', 0, '22:34:09', 0),
(156, 29, '2023-03-27', '22:34:22', 0, '22:34:31', 0);

--
-- Disparadores `attendance`
--
DELIMITER $$
CREATE TRIGGER `attendanceinsert` AFTER INSERT ON `attendance` FOR EACH ROW BEGIN

	DECLARE nombre varchar(20);
	
	
	SET nombre = (SELECT  obtener_ejecutor(NEW.employee_id));

	INSERT INTO bitacora(id_bitacora, id_persona, ejecutor, actividad_realizada, informacion_actual, informacion_anterior)

				VALUES (NULL, new.employee_id, user(), 'Insertó una asistencia', '','');

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ejecutor` varchar(20) NOT NULL,
  `actividad_realizada` varchar(50) NOT NULL,
  `informacion_actual` text DEFAULT NULL,
  `informacion_anterior` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id_bitacora`, `id_persona`, `fecha`, `ejecutor`, `actividad_realizada`, `informacion_actual`, `informacion_anterior`) VALUES
(100, 2222, '2023-03-27 18:58:02', 'root@localhost', 'Insertó una asistencia', '', ''),
(102, 30577902, '2023-03-27 19:08:14', 'root@localhost', 'Insertó una asistencia', 'Liz Villegas', ' '),
(108, 0, '2023-03-27 19:52:14', 'root@localhost', 'Creó un Servicio', 'ID: asd asdsa Precio BS.:  50 Precio US.: 0 ', NULL),
(109, 0, '2023-03-27 19:53:59', 'root@localhost', 'Creó un Servicio', 'ID: asd ZXX Precio BS.:  50 Precio US.: 3 ', NULL),
(110, 0, '2023-03-27 19:56:20', 'root@localhost', 'Creó un Servicio', 'ID: asd sdsa Precio BS.:  50 Precio US.: 0 ', NULL),
(114, 38, '2023-03-28 02:29:05', 'root@localhost', 'Insertó una asistencia', '', ''),
(115, 1234, '2023-03-28 02:29:51', 'root@localhost', 'Creó un empleado', 'C.I: 1234 Nombre: asd Apellido: rara Telf.: 04125555 Genero: Hombre', NULL),
(116, 39, '2023-03-28 02:29:56', 'root@localhost', 'Insertó una asistencia', '', ''),
(117, 123, '2023-03-28 02:30:12', 'root@localhost', 'Eliminó un Empleado', 'C.I: 123 Nombre: sdad Apellido: asdas Telf.: 04125555 Genero: Mujer ', NULL),
(118, 1234, '2023-03-28 02:30:13', 'root@localhost', 'Eliminó un Empleado', 'C.I: 1234 Nombre: asd Apellido: rara Telf.: 04125555 Genero: Hombre ', NULL),
(119, 27, '2023-03-28 02:33:53', 'root@localhost', 'Insertó una asistencia', '', ''),
(120, 29, '2023-03-28 02:34:22', 'root@localhost', 'Insertó una asistencia', '', ''),
(121, 29708486, '2023-03-28 02:39:18', 'root@localhost', 'Actualizó una Persona', 'C.I: 29708486 Nombre: Gabriel Apellido: Monsalve Telf.: 0412555555 Genero: Male', 'C.I: 29708486 Nombre: Gabriel Apellido: Monsalve Telf.: 0412555555 Genero: Male '),
(122, 30577902, '2023-03-28 02:39:22', 'root@localhost', 'Actualizó una Persona', 'C.I: 30577902 Nombre: Liz Apellido: Villegas Telf.: 0412758888 Genero: Female', 'C.I: 30577902 Nombre: Liz Apellido: Villegas Telf.: 0412758888 Genero: Female '),
(123, 0, '2023-04-03 15:46:28', 'root@localhost', 'Creó un Servicio', 'ID: FNY047562189 Clemencia Mejias Flores Precio BS.:  35 ', NULL),
(124, 0, '2023-04-03 15:46:35', 'root@localhost', 'Eliminó un Servicio', 'ID: FNY047562189 Clemencia Mejias Flores Precio BS.:  35 ', NULL),
(125, 0, '2023-04-03 15:46:54', 'root@localhost', 'Creó un Servicio', 'ID: VRS578036419 dffggd Precio BS.:  35212200 ', NULL),
(126, 0, '2023-04-03 15:47:07', 'root@localhost', 'Eliminó un Servicio', 'ID: KYN789345126 Cambio de Aceite Precio BS.:  50 ', NULL),
(127, 0, '2023-04-03 15:47:10', 'root@localhost', 'Eliminó un Servicio', 'ID: VRS578036419 dffggd Precio BS.:  35212200 ', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepts`
--

CREATE TABLE `concepts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `concepts`
--

INSERT INTO `concepts` (`id`, `name`, `amount`, `type`) VALUES
(1, 'Sueldo', 325, 2),
(2, 'Seguro social', 80, 1),
(3, 'Transporte', 100, 2),
(4, 'Servicios funerarios', 80, 1),
(5, 'Servicio familiar', 120, 2),
(6, 'Bonos', 150, 2);

--
-- Disparadores `concepts`
--
DELIMITER $$
CREATE TRIGGER `conceptdelete` AFTER DELETE ON `concepts` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Eliminó un Concepto', concat('Nombre:',' ',OLD.name,' ', 'Cantidad:',OLD.amount));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `conceptinsert` AFTER INSERT ON `concepts` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Creó un Concepto', concat('Nombre:',' ',new.name,' ', 'Cantidad:',' ',new.amount));

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `conceptupdate` AFTER UPDATE ON `concepts` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_anterior,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Actualizó una Concepto', concat('Nombre:',' ',OLD.name,' ', 'Cantidad:',OLD.amount),concat('Nombre:',' ',new.name,' ', 'Cantidad:',' ',new.amount));
END
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `customer_id`, `first_name`, `last_name`, `address`, `phone`, `email`, `document`, `created_at`) VALUES
(1, 'TKZ870542619', 'Diego', 'Alberto', 'Santa ines, Estado Aragua - Maracay', '04144595322', 'alberto@email.com', '28249485', '2022-12-03 13:23:58'),
(2, 'SUM138604975', 'Carlos', 'Rodriguez', 'Santa ines, Estado Aragua', '04144595344', 'carlos@email.com', '25746631', '2022-12-03 13:47:31'),
(4, 'IYB362804517', 'Alberto', 'Rodriguez', 'Maracay plaza', '04144595322', 'alberto1@gmail.com', '41012022', '2022-12-05 18:11:48'),
(7, 'XHN736582041', 'Lucia', 'García', 'Cagua', '0412545842', 'hola@configuro.com', '22537775', '2023-01-31 21:51:19');

--
-- Disparadores `customers`
--
DELIMITER $$
CREATE TRIGGER `customersDelete` BEFORE DELETE ON `customers` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(OLD.last_name,CURRENT_USER, 'Eliminó un Cliente', concat('C.I:',' ',OLD.document,' ', 'Nombre:',' ',OLD.first_name, ' ', 'Apellido:',' ',OLD.last_name, ' ', 'Dirección:',' ',OLD.address, 'Telf.:',' ',OLD.phone, ' ', 'Correo:',' ',OLD.email, ' '));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `customersInsert` BEFORE INSERT ON `customers` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(NEW.first_name,CURRENT_USER, 'Creó un empleado', concat('C.I:',' ',NEW.document,' ', 'Nombre:',' ',NEW.first_name, ' ', 'Apellido:',' ',NEW.last_name, ' ', 'Dirección:',' ',NEW.address, 'Telf.:',' ',NEW.phone, ' ', 'Correo:',' ',NEW.email, ' '));

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `customersUpdate` AFTER UPDATE ON `customers` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_anterior,informacion_actual) VALUES(NEW.first_name,CURRENT_USER, 'Actualizó una Cliente', concat('C.I:',' ',OLD.document,' ', 'Nombre:',' ',OLD.first_name, ' ', 'Apellido:',' ',OLD.last_name, ' ', 'Dirección:',' ',OLD.address, 'Telf.:',' ',OLD.phone, ' ', 'Correo:',' ',OLD.email, ' '),concat('C.I:',' ',NEW.document,' ', 'Nombre:',' ',NEW.first_name, ' ', 'Apellido:',' ',NEW.last_name, ' ', 'Dirección:',' ',NEW.address, 'Telf.:',' ',NEW.phone, ' ', 'Correo:',' ',NEW.email, ' '));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `id` int(11) NOT NULL,
  `employee_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`id`, `employee_id`, `firstname`, `lastname`, `address`, `birthdate`, `contact_info`, `gender`, `schedule_id`, `photo`, `created_on`) VALUES
(27, '29708486', 'Gabriel', 'Monsalve', 'ww', '2022-12-06', '0412555555', 'Male', 6, 'avatar5.png', '2022-12-06'),
(29, '30577902', 'Liz', 'Villegas', 'av12', '2022-12-21', '0412758888', 'Female', 6, 'avatar3.png', '2022-12-11');

--
-- Disparadores `employees`
--
DELIMITER $$
CREATE TRIGGER `employeedelete` AFTER DELETE ON `employees` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(OLD.employee_id,CURRENT_USER, 'Eliminó un Empleado', concat('C.I:',' ',OLD.employee_id,' ', 'Nombre:',' ',OLD.firstname, ' ','Apellido:',' ', OLD.lastname, ' ','Telf.:',' ',OLD.contact_info,' ', 'Genero:',' ',OLD.gender,' '));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `employeeinsert` AFTER INSERT ON `employees` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(NEW.employee_id,CURRENT_USER, 'Creó un empleado', concat('C.I:',' ',new.employee_id,' ', 'Nombre:',' ',new.firstname, ' ','Apellido:',' ', new.lastname, ' ','Telf.:',' ',new.contact_info,' ', 'Genero:',' ',new.gender ));

END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `employeeupdate` AFTER UPDATE ON `employees` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_anterior,informacion_actual) VALUES(NEW.employee_id,CURRENT_USER, 'Actualizó una Persona', concat('C.I:',' ',OLD.employee_id,' ', 'Nombre:',' ',OLD.firstname, ' ','Apellido:',' ', OLD.lastname, ' ','Telf.:',' ',OLD.contact_info,' ', 'Genero:',' ',OLD.gender,' '),concat('C.I:',' ',new.employee_id,' ', 'Nombre:',' ',new.firstname, ' ','Apellido:',' ', new.lastname, ' ','Telf.:',' ',new.contact_info,' ', 'Genero:',' ',new.gender ));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files`
--

CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `files`
--

INSERT INTO `files` (`id`, `employee_id`, `created_on`) VALUES
(17, 27, '2023-02-08 23:42:12'),
(19, 29, '2023-02-26 00:14:50');

--
-- Disparadores `files`
--
DELIMITER $$
CREATE TRIGGER `filesDelete` BEFORE DELETE ON `files` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Eliminó Conceptos', concat('Eliminó los Conceptos de un Empleado'));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `filesInsert` AFTER INSERT ON `files` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Asignó un Concepto', concat('Asignó Conceptos a un Empleado'));

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `files_details`
--

CREATE TABLE `files_details` (
  `id` int(11) NOT NULL,
  `file_id` int(11) NOT NULL,
  `concept_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `files_details`
--

INSERT INTO `files_details` (`id`, `file_id`, `concept_id`) VALUES
(63, 17, 1),
(71, 19, 2);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `payroll`
--

INSERT INTO `payroll` (`id`, `payroll_id`, `date_pay`, `employee_id`, `amount`) VALUES
(261, 'FIB152679834', '2023-03-13', 27, 325),
(262, 'FIB152679834', '2023-03-13', 27, -80),
(263, 'FIB152679834', '2023-03-13', 27, 100),
(264, 'FIB152679834', '2023-03-13', 27, 150),
(265, 'FIB152679834', '2023-03-13', 29, -80),
(266, 'FIB152679834', '2023-03-13', 29, -80),
(267, 'OUW107539468', '2023-03-13', 27, 325),
(268, 'OUW107539468', '2023-03-13', 27, -80),
(269, 'OUW107539468', '2023-03-13', 27, 100),
(270, 'OUW107539468', '2023-03-13', 27, 150),
(271, 'OUW107539468', '2023-03-13', 29, -80),
(272, 'OUW107539468', '2023-03-13', 29, -80),
(273, 'GVB872450391', '2023-03-28', 27, 325),
(274, 'GVB872450391', '2023-03-28', 29, -80);

--
-- Disparadores `payroll`
--
DELIMITER $$
CREATE TRIGGER `payrollInsert` AFTER INSERT ON `payroll` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Generó una Nómina', concat('ID:',' ',NEW.payroll_id,' ', 'Cantidad:', ' ',NEW.amount, ' '));

END
$$
DELIMITER ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sales`
--

INSERT INTO `sales` (`id`, `sale_id`, `customer_id`, `vehicle_id`, `created_on`, `total_ve`, `total_us`, `status`, `pay_method`, `pay_reference`) VALUES
(1, 'BTF725936140', 1, 1, '2022-12-04 17:39:11', 351, 27, 1, 'Pago Movil', '8080'),
(2, 'TEJ549823607', 2, 2, '2022-12-04 18:10:45', 700, 70, 1, 'Pago Movil', '8081'),
(23, 'CNV174682539', 7, 10, '2023-01-31 21:52:06', 40, 4, 1, 'Pago movil', '001'),
(30, 'IDF476905812', 4, 4, '2023-03-31 21:55:02', 70, 2.85, 1, 'Pago movil', '00'),
(35, 'EIB013698547', 4, 5, '2023-04-03 11:13:54', 40, 1.63, 1, 'Transferencia', '001'),
(40, 'FTM718964250', 4, 4, '2023-04-03 11:36:06', 40, 1.63, 1, 'Pago movil o Transferencia', '001'),
(41, 'QFL501479632', 4, 4, '2023-04-03 11:36:47', 35, 1.43, 1, 'Bolívares Efectivo', '');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sales_details`
--

INSERT INTO `sales_details` (`id`, `service_id`, `sale_id`, `total_ve`, `total_us`) VALUES
(1, 1, 1, 351, 27),
(2, 2, 2, 400, 40),
(3, 3, 2, 300, 30),
(36, 2, 23, 40, 4),
(58, 2, 30, 40, 0),
(59, 7, 30, 30, 0),
(64, 2, 35, 40, 0),
(69, 2, 40, 40, 0),
(70, 1, 41, 35, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `time_in`, `time_out`) VALUES
(6, '06:00:00', '12:00:00');

--
-- Disparadores `schedules`
--
DELIMITER $$
CREATE TRIGGER `scheduleUpdate` AFTER UPDATE ON `schedules` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_anterior,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Actualizó un Horario', concat('Entrada:',' ',OLD.time_in,' ', 'Salida:',' ', old.time_out, ' '),concat('Entrada:',' ',NEW.time_in,' ','Salida:',' ', NEW.time_out, ' '));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `scheduledelete` AFTER DELETE ON `schedules` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Eliminó un Horario', concat('Entrada:',' ',OLD.time_in,' ','Salida:',' ', OLD.time_out, ' '));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `scheduleinsert` BEFORE INSERT ON `schedules` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Creó un Horario', concat('Entrada:',' ',new.time_in,' ','Salida:',' ', new.time_out, ' '));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `service_id` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_ve` float NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `services`
--

INSERT INTO `services` (`id`, `service_id`, `name`, `price_ve`, `status`) VALUES
(1, 'GWN087429651', 'Carga de bateria', 35, 1),
(2, 'BNQ145327986', 'Cambios de silenciador', 40, 1),
(3, 'PDA874319526', 'Bajar y montar caja tipo A', 300, 1),
(7, 'OTH238746915', 'Carga de Bateria', 30, 1),
(8, 'BMK174328905', 'Cambio de Pastillas y Bandas de Freno', 100, 1),
(9, 'JPT573640891', 'Cambio de Amortiguadores', 70, 1),
(10, 'GFV452780613', 'Cambio de Pila de Gasolina', 120, 1),
(11, 'QVL289054317', 'Limpieza de Inyectores', 90, 1),
(12, 'CNF295381706', 'Reparación Electrónica', 150, 1);

--
-- Disparadores `services`
--
DELIMITER $$
CREATE TRIGGER `servicesDelete` AFTER DELETE ON `services` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Eliminó un Servicio', concat('ID:',' ',OLD.service_id,' ', OLD.name, ' ','Precio BS.:', '  ',OLD.price_ve, ' '));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `servicesInsert` AFTER INSERT ON `services` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Creó un Servicio', concat('ID:',' ',NEW.service_id,' ', NEW.name, ' ','Precio BS.:', '  ',NEW.price_ve, ' '));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` date NOT NULL,
  `tipo_users` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `lastname`, `photo`, `created_on`, `tipo_users`) VALUES
(1, 'admin', '$2y$10$3P11ZV0ejIwMOvryLsHjFOzJ18GJQUusUcQQALWTpXw.MTCUe3EKm', 'Alexis', 'Correa', 'avatar5.png', '2022-12-06', 'administrador'),
(2, 'secretaria', '$2y$10$3P11ZV0ejIwMOvryLsHjFOzJ18GJQUusUcQQALWTpXw.MTCUe3EKm', 'Liz', 'Villegas', 'avatar5.png', '2023-03-22', 'secretaria');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehicles`
--

INSERT INTO `vehicles` (`id`, `patent`, `brand`, `model`, `color`, `engine`, `chassis`, `customer_id`, `status`) VALUES
(1, 'ABC-01D', 'Renault', 'Twingo', 'Amarillo', 'VR8-13', '123-CHS', 2, 1),
(2, 'AA7-2BB', 'Chevrolet', 'Aveo LT 2009', 'Gris', 'V8-404', '123-CHA', 1, 1),
(4, 'ABB-123', 'Ford', 'Super Carro Ford', 'Verde', 'b45-12', '123-CHF', 4, 1),
(5, '123-ABB', 'Jeep', 'Cherokee', 'Amarillo', 'V8-404', '123-CHD', 4, 1),
(6, 'DIE-12D', 'FIAT1', 'UNO', 'Negro', 'V8-401', '123-CHU', 1, 1),
(10, 'AJSK3432', 'Chevrolet', 'Corsa', 'beig', '165', '223AGA', 7, 1);

--
-- Disparadores `vehicles`
--
DELIMITER $$
CREATE TRIGGER `vehiclesDelete` AFTER DELETE ON `vehicles` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Eliminó un Servicio', concat('Matricula:',' ',OLD.patent,' ','Marca:',' ', OLD.brand, ' ','Modelo:', '  ', OLD.model, ' ','Color:', '  ', OLD.color, ' ','Engine:', '  ', OLD.engine, ' ','Chasis:', '  ', OLD.chassis, ' '));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `vehiclesUpdate` AFTER UPDATE ON `vehicles` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_anterior,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Actualizó un Vehiculo', concat('Matricula:',' ',OLD.patent,' ','Marca:',' ', OLD.brand, ' ','Modelo:', '  ', OLD.model, ' ','Color:', '  ', OLD.color, ' ','Engine:', '  ', OLD.engine, ' ','Chasis:', '  ', OLD.chassis, ' '),concat('Matricula:',' ',new.patent,' ','Marca:',' ', new.brand, ' ','Modelo:', '  ', new.model, ' ','Color:', '  ', new.color, ' ','Engine:', '  ', new.engine, ' ','Chasis:', '  ', new.chassis, ' '));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `vehiculesInsert` AFTER INSERT ON `vehicles` FOR EACH ROW BEGIN

INSERT INTO bitacora(id_persona,ejecutor,actividad_realizada,informacion_actual) VALUES(CURRENT_USER,CURRENT_USER, 'Agregó un Vehículo', concat('Matricula:',' ',new.patent,' ','Marca:',' ', new.brand, ' ','Modelo:', '  ', new.model, ' ','Color:', '  ', new.color, ' ','Engine:', '  ', new.engine, ' ','Chasis:', '  ', new.chassis, ' '));
END
$$
DELIMITER ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id_bitacora`),
  ADD KEY `id_persona` (`id_persona`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `schedule_id` (`schedule_id`);

--
-- Indices de la tabla `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indices de la tabla `files_details`
--
ALTER TABLE `files_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `file_id` (`file_id`),
  ADD KEY `concept_id` (`concept_id`);

--
-- Indices de la tabla `payroll`
--
ALTER TABLE `payroll`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- Indices de la tabla `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `vehicle_id` (`vehicle_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indices de la tabla `sales_details`
--
ALTER TABLE `sales_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `service_id` (`service_id`),
  ADD KEY `sale_id` (`sale_id`);

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
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=157;

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `concepts`
--
ALTER TABLE `concepts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `files`
--
ALTER TABLE `files`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `files_details`
--
ALTER TABLE `files_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `payroll`
--
ALTER TABLE `payroll`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=275;

--
-- AUTO_INCREMENT de la tabla `sales`
--
ALTER TABLE `sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `sales_details`
--
ALTER TABLE `sales_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `files_details`
--
ALTER TABLE `files_details`
  ADD CONSTRAINT `files_details_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  ADD CONSTRAINT `files_details_ibfk_2` FOREIGN KEY (`concept_id`) REFERENCES `concepts` (`id`);

--
-- Filtros para la tabla `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sales_details`
--
ALTER TABLE `sales_details`
  ADD CONSTRAINT `sales_details_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sales_details_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `vehicles`
--
ALTER TABLE `vehicles`
  ADD CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
