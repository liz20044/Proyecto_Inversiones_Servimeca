SET FOREIGN_KEY_CHECKS=0;

CREATE DATABASE IF NOT EXISTS apsystem;

USE apsystem;

DROP TABLE IF EXISTS attendance;

CREATE TABLE `attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_in` time NOT NULL,
  `status` int(1) NOT NULL,
  `time_out` time NOT NULL,
  `num_hr` double NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=215 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO attendance VALUES("123","29","2022-12-11","20:14:01","0","20:14:06","0");
INSERT INTO attendance VALUES("124","29","2023-01-18","21:52:48","0","21:53:03","0");
INSERT INTO attendance VALUES("126","29","2023-01-21","23:59:04","0","00:00:00","0");
INSERT INTO attendance VALUES("127","29","2023-01-23","11:56:59","0","00:00:00","0");
INSERT INTO attendance VALUES("130","29","2023-02-06","23:19:42","0","23:19:45","0");
INSERT INTO attendance VALUES("131","29","2023-02-06","23:19:42","0","00:00:00","0");
INSERT INTO attendance VALUES("132","29","2023-02-26","22:58:48","0","22:59:54","0");
INSERT INTO attendance VALUES("138","29","2023-02-27","20:57:09","0","20:58:40","2.95");
INSERT INTO attendance VALUES("139","29","2023-02-27","20:57:09","0","00:00:00","0");
INSERT INTO attendance VALUES("140","29","2023-02-28","00:44:53","1","00:44:57","11.25");
INSERT INTO attendance VALUES("141","29","2023-03-08","21:32:49","0","21:32:53","3.5333333333333");
INSERT INTO attendance VALUES("142","29","2023-03-20","20:48:24","0","00:00:00","0");
INSERT INTO attendance VALUES("143","29","2023-03-27","20:35:39","0","20:37:11","7.5833333333333");



DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ejecutor` varchar(20) NOT NULL,
  `actividad_realizada` varchar(50) NOT NULL,
  `informacion_actual` text DEFAULT NULL,
  `informacion_anterior` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO bitacora VALUES("0","21501236","2023-03-27 20:55:41","root@localhost","Creó un empleado","C.I: 21501236 Nombre: Sheilaa Apellido: Correa Telf.: 0412758888 Genero: Mujer","");
INSERT INTO bitacora VALUES("0","1036137455","2023-03-27 21:09:09","root@localhost","Eliminó un Empleado","C.I: 1036137455 Nombre: Gabriel Apellido: Monsalve Telf.: 0412555555 Genero: Male ","");
INSERT INTO bitacora VALUES("0","21501236","2023-03-27 21:09:33","root@localhost","Eliminó un Empleado","C.I: 21501236 Nombre: Sheilaa Apellido: Correa Telf.: 0412758888 Genero: Mujer ","");
INSERT INTO bitacora VALUES("0","29708486","2023-03-27 21:11:27","root@localhost","Creó un empleado","C.I: 29708486 Nombre: Gabriel Apellido: Monsalve Telf.: 04127588523 Genero: Hombre","");
INSERT INTO bitacora VALUES("0","14860651","2023-03-27 21:24:06","root@localhost","Creó un empleado","C.I: 14860651 Nombre: clemem Apellido: Monsalved Telf.: 0412758888 Genero: Mujer","");
INSERT INTO bitacora VALUES("0","14860651","2023-03-27 21:34:13","root@localhost","Eliminó un Empleado","C.I: 14860651 Nombre: clemem Apellido: Monsalved Telf.: 0412758888 Genero: Mujer ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:34:42","root@localhost","Asignó un Concepto","Asignó Conceptos a un Empleado","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:35:52","root@localhost","Eliminó Conceptos","Eliminó los Conceptos de un Empleado","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:01","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: 325 ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:02","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: -80 ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:02","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: 100 ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:02","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: -80 ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:02","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: 120 ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:02","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: 150 ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:02","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: 325 ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:02","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: -80 ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:02","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: 100 ","");
INSERT INTO bitacora VALUES("0","0","2023-03-27 21:36:02","root@localhost","Generó una Nómina","ID: BUO935286107 Cantidad: 120 ","");



DROP TABLE IF EXISTS concepts;

CREATE TABLE `concepts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO concepts VALUES("1","Sueldo","325","2");
INSERT INTO concepts VALUES("2","Seguro social","80","1");
INSERT INTO concepts VALUES("3","Transporte","100","2");
INSERT INTO concepts VALUES("4","Servicios funerarios","80","1");
INSERT INTO concepts VALUES("5","Servicio familiar","120","2");
INSERT INTO concepts VALUES("6","Bonos","150","2");



DROP TABLE IF EXISTS customers;

CREATE TABLE `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` varchar(15) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `document` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO customers VALUES("1","TKZ870542619","Diego","Alberto","Santa ines, Estado Aragua - Maracay","04144595322","alberto@email.com","28249485","2022-12-03 13:23:58");
INSERT INTO customers VALUES("2","SUM138604975","Carlos","Rodriguez","Santa ines, Estado Aragua","04144595344","carlos@email.com","25746631","2022-12-03 13:47:31");
INSERT INTO customers VALUES("4","IYB362804517","Alberto","Rodriguez","Maracay plaza","04144595322","alberto1@gmail.com","41012022","2022-12-05 18:11:48");



DROP TABLE IF EXISTS employees;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `address` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_id` (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO employees VALUES("29","30577902","Liz","Villegas","av12","2022-12-21","0412758888","Mujer","6","avatar3.png","2022-12-11");
INSERT INTO employees VALUES("43","29708486","Gabriel","Monsalve","Zuata","2023-03-21","04127588523","Hombre","6","avatar5.png","2023-03-27");



DROP TABLE IF EXISTS files;

CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO files VALUES("26","29","2023-03-27 20:31:56");
INSERT INTO files VALUES("27","43","2023-03-27 21:34:42");



DROP TABLE IF EXISTS files_details;

CREATE TABLE `files_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `concept_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `file_id` (`file_id`),
  KEY `concept_id` (`concept_id`),
  CONSTRAINT `files_details_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=95 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO files_details VALUES("85","26","1");
INSERT INTO files_details VALUES("86","26","2");
INSERT INTO files_details VALUES("87","26","3");
INSERT INTO files_details VALUES("88","26","4");
INSERT INTO files_details VALUES("89","26","5");
INSERT INTO files_details VALUES("90","26","6");
INSERT INTO files_details VALUES("91","27","1");
INSERT INTO files_details VALUES("92","27","2");
INSERT INTO files_details VALUES("93","27","3");
INSERT INTO files_details VALUES("94","27","5");



DROP TABLE IF EXISTS payroll;

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payroll_id` varchar(15) NOT NULL,
  `date_pay` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=297 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO payroll VALUES("267","OUW107539468","2023-03-13","27","325");
INSERT INTO payroll VALUES("268","OUW107539468","2023-03-13","27","-80");
INSERT INTO payroll VALUES("269","OUW107539468","2023-03-13","27","100");
INSERT INTO payroll VALUES("270","OUW107539468","2023-03-13","27","150");
INSERT INTO payroll VALUES("271","OUW107539468","2023-03-13","29","-80");
INSERT INTO payroll VALUES("272","OUW107539468","2023-03-13","29","-80");
INSERT INTO payroll VALUES("273","YOH582076431","2023-03-28","27","325");
INSERT INTO payroll VALUES("274","YOH582076431","2023-03-28","29","-80");
INSERT INTO payroll VALUES("275","MXS093651728","2023-03-28","27","325");
INSERT INTO payroll VALUES("276","MXS093651728","2023-03-28","27","100");
INSERT INTO payroll VALUES("277","MXS093651728","2023-03-28","27","-80");
INSERT INTO payroll VALUES("278","MXS093651728","2023-03-28","27","-80");
INSERT INTO payroll VALUES("279","MXS093651728","2023-03-28","27","120");
INSERT INTO payroll VALUES("280","MXS093651728","2023-03-28","27","150");
INSERT INTO payroll VALUES("281","MXS093651728","2023-03-28","29","325");
INSERT INTO payroll VALUES("282","MXS093651728","2023-03-28","29","-80");
INSERT INTO payroll VALUES("283","MXS093651728","2023-03-28","29","100");
INSERT INTO payroll VALUES("284","MXS093651728","2023-03-28","29","-80");
INSERT INTO payroll VALUES("285","MXS093651728","2023-03-28","29","120");
INSERT INTO payroll VALUES("286","MXS093651728","2023-03-28","29","150");
INSERT INTO payroll VALUES("287","BUO935286107","2023-03-28","29","325");
INSERT INTO payroll VALUES("288","BUO935286107","2023-03-28","29","-80");
INSERT INTO payroll VALUES("289","BUO935286107","2023-03-28","29","100");
INSERT INTO payroll VALUES("290","BUO935286107","2023-03-28","29","-80");
INSERT INTO payroll VALUES("291","BUO935286107","2023-03-28","29","120");
INSERT INTO payroll VALUES("292","BUO935286107","2023-03-28","29","150");
INSERT INTO payroll VALUES("293","BUO935286107","2023-03-28","43","325");
INSERT INTO payroll VALUES("294","BUO935286107","2023-03-28","43","-80");
INSERT INTO payroll VALUES("295","BUO935286107","2023-03-28","43","100");
INSERT INTO payroll VALUES("296","BUO935286107","2023-03-28","43","120");



DROP TABLE IF EXISTS sales;

CREATE TABLE `sales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sale_id` varchar(15) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `vehicle_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  `total_ve` float NOT NULL,
  `total_us` float NOT NULL,
  `status` int(11) NOT NULL,
  `pay_method` text NOT NULL,
  `pay_reference` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `vehicle_id` (`vehicle_id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `sales_ibfk_1` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicles` (`id`),
  CONSTRAINT `sales_ibfk_2` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO sales VALUES("1","BTF725936140","1","1","2022-12-04 17:39:11","3555","27","1","Pago Movil","8080");
INSERT INTO sales VALUES("2","TEJ549823607","2","2","2022-12-04 18:10:45","700","70","1","Pago Movil","8081");
INSERT INTO sales VALUES("3","GQO127540639","1","1","2022-12-04 20:23:27","351","27","1","Pago Movil","8082");



DROP TABLE IF EXISTS sales_details;

CREATE TABLE `sales_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `total_ve` float NOT NULL,
  `total_us` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `service_id` (`service_id`),
  KEY `sale_id` (`sale_id`),
  CONSTRAINT `sales_details_ibfk_1` FOREIGN KEY (`service_id`) REFERENCES `services` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `sales_details_ibfk_2` FOREIGN KEY (`sale_id`) REFERENCES `sales` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO sales_details VALUES("1","1","1","351","27");
INSERT INTO sales_details VALUES("2","2","2","400","40");
INSERT INTO sales_details VALUES("3","3","2","300","30");
INSERT INTO sales_details VALUES("4","1","3","351","27");



DROP TABLE IF EXISTS schedules;

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO schedules VALUES("6","06:00:00","12:00:00");



DROP TABLE IF EXISTS services;

CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_ve` float NOT NULL,
  `price_us` float NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO services VALUES("1","GWN087429651","Carga de bateria","35","4","1");
INSERT INTO services VALUES("2","BNQ145327986","Cambios de silenciador","40","4","1");
INSERT INTO services VALUES("3","PDA874319526","Bajar y montar caja tipo A","300","30","1");
INSERT INTO services VALUES("6","KYN789345126","Cambio de Aceite","50","4","1");
INSERT INTO services VALUES("7","OTH238746915","Carga de Bateria","30","2","1");
INSERT INTO services VALUES("8","BMK174328905","Cambio de Pastillas y Bandas de Freno","100","9","1");
INSERT INTO services VALUES("9","JPT573640891","Cambio de Amortiguadores","70","6","1");
INSERT INTO services VALUES("10","GFV452780613","Cambio de Pila de Gasolina","120","11","1");
INSERT INTO services VALUES("11","QVL289054317","Limpieza de Inyectores","90","8","1");
INSERT INTO services VALUES("12","CNF295381706","Reparación Electrónica","150","14","1");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_on` date NOT NULL,
  `tipo_users` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO users VALUES("1","admin","$2y$10$3P11ZV0ejIwMOvryLsHjFOzJ18GJQUusUcQQALWTpXw.MTCUe3EKm","Alexis","Correa","avatar5.png","2022-12-06","administrador");
INSERT INTO users VALUES("2","secretaria","$2y$10$3P11ZV0ejIwMOvryLsHjFOzJ18GJQUusUcQQALWTpXw.MTCUe3EKm","Liz","Villegas","avatar5.png","2023-03-22","secretaria");



DROP TABLE IF EXISTS vehicles;

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `patent` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `chassis` varchar(255) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  CONSTRAINT `vehicles_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO vehicles VALUES("1","ABC-01D","Renault","Twingo","Amarillo","VR8-13","123-CHS","2","1");
INSERT INTO vehicles VALUES("2","AA7-2BB","Chevrolet","Aveo LT 2009","Gris","V8-404","123-CHA","1","1");
INSERT INTO vehicles VALUES("4","ABB-123","Ford","Super Carro Ford","Verde","b45-12","123-CHF","4","1");
INSERT INTO vehicles VALUES("5","123-ABB","Jeep","Cherokee","Amarillo","V8-404","123-CHD","4","1");
INSERT INTO vehicles VALUES("6","DIE-12D","FIAT1","UNO","Negro","V8-401","123-CHU","1","1");



SET FOREIGN_KEY_CHECKS=1;