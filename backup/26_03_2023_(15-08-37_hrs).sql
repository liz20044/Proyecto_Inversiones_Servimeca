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
) ENGINE=InnoDB AUTO_INCREMENT=318 DEFAULT CHARSET=latin1;

INSERT INTO attendance VALUES("1","12345","2023-03-23","19:40:46","1","18:51:39","1");
INSERT INTO attendance VALUES("121","27","2022-12-06","17:57:09","0","19:25:35","0");
INSERT INTO attendance VALUES("123","29","2022-12-11","20:14:01","0","20:14:06","0");
INSERT INTO attendance VALUES("124","29","2023-01-18","21:52:48","0","21:53:03","0");
INSERT INTO attendance VALUES("125","27","2023-01-18","22:09:14","0","22:09:33","0");
INSERT INTO attendance VALUES("126","29","2023-01-21","23:59:04","0","00:00:00","0");
INSERT INTO attendance VALUES("127","29","2023-01-23","11:56:59","0","00:00:00","0");
INSERT INTO attendance VALUES("128","27","2023-01-24","17:51:54","0","17:52:02","0");
INSERT INTO attendance VALUES("129","27","2023-02-06","20:21:19","0","20:21:28","0");
INSERT INTO attendance VALUES("130","29","2023-02-06","23:19:42","0","23:19:45","0");
INSERT INTO attendance VALUES("131","29","2023-02-06","23:19:42","0","00:00:00","0");
INSERT INTO attendance VALUES("132","29","2023-02-26","22:58:48","0","22:59:54","0");
INSERT INTO attendance VALUES("134","27","2023-02-26","23:16:43","0","23:16:47","0");
INSERT INTO attendance VALUES("138","29","2023-02-27","20:57:09","0","20:58:40","2.95");
INSERT INTO attendance VALUES("139","29","2023-02-27","20:57:09","0","00:00:00","0");
INSERT INTO attendance VALUES("140","29","2023-02-28","00:44:53","1","00:44:57","11.25");
INSERT INTO attendance VALUES("141","29","2023-03-08","21:32:49","0","21:32:53","3.5333333333333");
INSERT INTO attendance VALUES("142","29","2023-03-20","20:48:24","0","00:00:00","0");
INSERT INTO attendance VALUES("143","29","2023-03-21","10:12:49","0","10:12:56","0");
INSERT INTO attendance VALUES("144","29","2023-03-22","10:34:28","0","00:00:00","0");
INSERT INTO attendance VALUES("145","38","2023-03-23","11:32:25","0","11:32:46","0");
INSERT INTO attendance VALUES("151","43","2023-03-23","13:07:51","0","00:00:00","0");
INSERT INTO attendance VALUES("195","29","2023-03-23","14:09:01","0","00:00:00","0");
INSERT INTO attendance VALUES("215","48","2023-03-23","15:06:06","0","00:00:00","0");
INSERT INTO attendance VALUES("216","47","2023-03-23","15:06:10","0","00:00:00","0");
INSERT INTO attendance VALUES("217","1234","2023-03-24","25:08:57","1","18:51:39","0");
INSERT INTO attendance VALUES("223","12345","2023-03-25","24:10:27","1","18:51:39","0");
INSERT INTO attendance VALUES("227","12345","2023-03-26","19:40:46","1","18:51:39","0");
INSERT INTO attendance VALUES("228","12345","2023-03-27","25:08:57","1","18:51:39","0");
INSERT INTO attendance VALUES("229","12345","2023-03-28","19:40:46","1","18:51:39","0");
INSERT INTO attendance VALUES("237","12345","2023-03-24","19:40:46","1","18:51:39","0");
INSERT INTO attendance VALUES("238","29708486","2023-03-24","19:40:46","1","18:51:39","0");
INSERT INTO attendance VALUES("240","12345","2023-03-27","19:40:46","1","18:51:39","0");
INSERT INTO attendance VALUES("253","30577902","2023-03-30","19:40:46","1","18:51:39","0");
INSERT INTO attendance VALUES("280","30577902","2023-03-30","19:40:46","1","18:51:39","0");
INSERT INTO attendance VALUES("308","12345678","2023-03-24","25:39:06","1","25:39:06","0");
INSERT INTO attendance VALUES("309","12345678","2023-03-25","25:39:06","1","25:39:06","0");
INSERT INTO attendance VALUES("317","12345678","2023-03-24","19:40:46","1","18:51:39","0");



DROP TABLE IF EXISTS bitacora;

CREATE TABLE `bitacora` (
  `id_bitacora` int(11) NOT NULL AUTO_INCREMENT,
  `id_persona` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `ejecutor` varchar(20) NOT NULL,
  `actividad_realizada` varchar(50) NOT NULL,
  `informacion_actual` text DEFAULT NULL,
  `informacion_anterior` text DEFAULT NULL,
  PRIMARY KEY (`id_bitacora`),
  KEY `id_persona` (`id_persona`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4;

INSERT INTO bitacora VALUES("97","29708486","2023-03-26 17:01:29","root@localhost","Actualizó una Persona","C.I: 29708486 Gabriel Monsalve www 2023-03-29 01451251656 Hombre 5 ","C.I: 29708486 Gabriel Monsalve www 2023-03-29 01451251656 Hombre 5 ");
INSERT INTO bitacora VALUES("98","29708486","2023-03-26 17:01:31","root@localhost","Actualizó una Persona","C.I: 29708486 Gabriel Monsalve www 2023-03-29 01451251656 Hombre 5 ","C.I: 29708486 Gabriel Monsalve www 2023-03-29 01451251656 Hombre 5 ");



DROP TABLE IF EXISTS concepts;

CREATE TABLE `concepts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `amount` float NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4;

INSERT INTO customers VALUES("1","TKZ870542619","Diego","Alberto","Santa ines, Estado Aragua - Maracay","04144595322","alberto@email.com","28249485","2022-12-03 13:23:58");
INSERT INTO customers VALUES("2","SUM138604975","Carlos","Rodriguez","Santa ines, Estado Aragua","04144595344","carlos@email.com","25746631","2022-12-03 13:47:31");
INSERT INTO customers VALUES("4","IYB362804517","Alberto","Rodriguez","Maracay plaza","04144595322","alberto1@gmail.com","41012022","2022-12-05 18:11:48");
INSERT INTO customers VALUES("6","PSH752468039","clemen","villegas","la victoria","0412-683-4093","lizen_22_@hotmail.com","14860651","2023-01-24 17:54:39");
INSERT INTO customers VALUES("7","XHN736582041","Estefani","García","Cagua","0412545842","hola@configuro.com","20777777","2023-01-31 21:51:19");



DROP TABLE IF EXISTS employees;

CREATE TABLE `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(15) CHARACTER SET utf8 NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8 NOT NULL,
  `address` text CHARACTER SET utf8 NOT NULL,
  `birthdate` date NOT NULL,
  `contact_info` varchar(100) CHARACTER SET utf8 NOT NULL,
  `gender` varchar(10) CHARACTER SET utf8 NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `created_on` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `schedule_id` (`schedule_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

INSERT INTO employees VALUES("27","10361373","Sheila","Monsalve","San Mateo","2022-12-06","123123333","Male","6","avatar5.png","2022-12-06");
INSERT INTO employees VALUES("29","30577902","Liz","Villegas","av12","2022-12-21","0412758888","Female","5","avatar3.png","2022-12-11");
INSERT INTO employees VALUES("38","29708486","Gabriel","Monsalve","www","2023-03-29","01451251656","Hombre","5","","2023-03-23");



DROP TABLE IF EXISTS files;

CREATE TABLE `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL,
  `created_on` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

INSERT INTO files VALUES("17","27","2023-02-08 23:42:12");
INSERT INTO files VALUES("19","29","2023-02-26 00:14:50");
INSERT INTO files VALUES("21","27","2023-03-21 10:14:03");
INSERT INTO files VALUES("23","38","2023-03-24 22:49:04");
INSERT INTO files VALUES("24","38","2023-03-25 16:36:22");



DROP TABLE IF EXISTS files_details;

CREATE TABLE `files_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_id` int(11) NOT NULL,
  `concept_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `file_id` (`file_id`),
  KEY `concept_id` (`concept_id`),
  CONSTRAINT `files_details_ibfk_1` FOREIGN KEY (`file_id`) REFERENCES `files` (`id`),
  CONSTRAINT `files_details_ibfk_2` FOREIGN KEY (`concept_id`) REFERENCES `concepts` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=78 DEFAULT CHARSET=utf8mb4;

INSERT INTO files_details VALUES("63","17","1");
INSERT INTO files_details VALUES("64","17","2");
INSERT INTO files_details VALUES("65","17","3");
INSERT INTO files_details VALUES("66","17","6");
INSERT INTO files_details VALUES("71","19","2");
INSERT INTO files_details VALUES("72","19","4");
INSERT INTO files_details VALUES("74","21","2");
INSERT INTO files_details VALUES("75","21","1");
INSERT INTO files_details VALUES("76","23","1");
INSERT INTO files_details VALUES("77","24","1");



DROP TABLE IF EXISTS payroll;

CREATE TABLE `payroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payroll_id` varchar(15) NOT NULL,
  `date_pay` date NOT NULL,
  `employee_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=301 DEFAULT CHARSET=utf8mb4;

INSERT INTO payroll VALUES("261","FIB152679834","2023-03-13","27","325");
INSERT INTO payroll VALUES("262","FIB152679834","2023-03-13","27","-80");
INSERT INTO payroll VALUES("263","FIB152679834","2023-03-13","27","100");
INSERT INTO payroll VALUES("264","FIB152679834","2023-03-13","27","150");
INSERT INTO payroll VALUES("265","FIB152679834","2023-03-13","29","-80");
INSERT INTO payroll VALUES("266","FIB152679834","2023-03-13","29","-80");
INSERT INTO payroll VALUES("267","OUW107539468","2023-03-13","27","325");
INSERT INTO payroll VALUES("268","OUW107539468","2023-03-13","27","-80");
INSERT INTO payroll VALUES("269","OUW107539468","2023-03-13","27","100");
INSERT INTO payroll VALUES("270","OUW107539468","2023-03-13","27","150");
INSERT INTO payroll VALUES("271","OUW107539468","2023-03-13","29","-80");
INSERT INTO payroll VALUES("272","OUW107539468","2023-03-13","29","-80");
INSERT INTO payroll VALUES("273","VPF502183976","2023-03-25","27","325");
INSERT INTO payroll VALUES("274","VPF502183976","2023-03-25","27","-80");
INSERT INTO payroll VALUES("275","VPF502183976","2023-03-25","27","100");
INSERT INTO payroll VALUES("276","VPF502183976","2023-03-25","27","150");
INSERT INTO payroll VALUES("277","VPF502183976","2023-03-25","29","-80");
INSERT INTO payroll VALUES("278","VPF502183976","2023-03-25","29","-80");
INSERT INTO payroll VALUES("279","VPF502183976","2023-03-25","27","-80");
INSERT INTO payroll VALUES("280","VPF502183976","2023-03-25","27","325");
INSERT INTO payroll VALUES("281","VPF502183976","2023-03-25","38","325");
INSERT INTO payroll VALUES("282","HUT489261750","2023-03-25","27","325");
INSERT INTO payroll VALUES("283","HUT489261750","2023-03-25","27","-80");
INSERT INTO payroll VALUES("284","HUT489261750","2023-03-25","27","100");
INSERT INTO payroll VALUES("285","HUT489261750","2023-03-25","27","150");
INSERT INTO payroll VALUES("286","HUT489261750","2023-03-25","29","-80");
INSERT INTO payroll VALUES("287","HUT489261750","2023-03-25","29","-80");
INSERT INTO payroll VALUES("288","HUT489261750","2023-03-25","27","-80");
INSERT INTO payroll VALUES("289","HUT489261750","2023-03-25","27","325");
INSERT INTO payroll VALUES("290","HUT489261750","2023-03-25","38","325");
INSERT INTO payroll VALUES("291","GMR401395786","2023-03-25","27","325");
INSERT INTO payroll VALUES("292","GMR401395786","2023-03-25","27","-80");
INSERT INTO payroll VALUES("293","GMR401395786","2023-03-25","27","100");
INSERT INTO payroll VALUES("294","GMR401395786","2023-03-25","27","150");
INSERT INTO payroll VALUES("295","GMR401395786","2023-03-25","29","-80");
INSERT INTO payroll VALUES("296","GMR401395786","2023-03-25","29","-80");
INSERT INTO payroll VALUES("297","GMR401395786","2023-03-25","27","-80");
INSERT INTO payroll VALUES("298","GMR401395786","2023-03-25","27","325");
INSERT INTO payroll VALUES("299","GMR401395786","2023-03-25","38","325");
INSERT INTO payroll VALUES("300","GMR401395786","2023-03-25","38","325");



DROP TABLE IF EXISTS roles;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO roles VALUES("1","Administrador");
INSERT INTO roles VALUES("2","Secretaria");



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
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4;

INSERT INTO sales VALUES("2","TEJ549823607","2","2","2022-12-04 18:10:45","700","70","1","Pago Movil","8081");
INSERT INTO sales VALUES("3","GQO127540639","1","1","2022-12-04 20:23:27","351","27","1","Pago Movil","8082");
INSERT INTO sales VALUES("23","CNV174682539","7","10","2023-01-31 21:52:06","40","4","1","Pago movil","001");
INSERT INTO sales VALUES("24","WHS012375896","6","9","2023-02-07 23:17:59","680","63","1","Dolares","00000");



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
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8mb4;

INSERT INTO sales_details VALUES("2","2","2","400","40");
INSERT INTO sales_details VALUES("3","3","2","300","30");
INSERT INTO sales_details VALUES("4","1","3","351","27");
INSERT INTO sales_details VALUES("36","2","23","40","4");
INSERT INTO sales_details VALUES("37","2","24","40","4");
INSERT INTO sales_details VALUES("38","3","24","300","30");
INSERT INTO sales_details VALUES("39","7","24","30","2");
INSERT INTO sales_details VALUES("40","6","24","50","4");
INSERT INTO sales_details VALUES("41","9","24","70","6");
INSERT INTO sales_details VALUES("43","11","24","90","8");



DROP TABLE IF EXISTS schedules;

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `time_in` time NOT NULL,
  `time_out` time NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

INSERT INTO schedules VALUES("6","13:00:00","01:00:00");



DROP TABLE IF EXISTS services;

CREATE TABLE `services` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_id` varchar(15) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price_ve` float NOT NULL,
  `price_us` float NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4;

INSERT INTO services VALUES("1","GWN087429651","Carga de bateria","35","4","1");
INSERT INTO services VALUES("2","BNQ145327986","Cambios de silenciador","40","4","1");
INSERT INTO services VALUES("3","PDA874319526","Bajar y montar caja tipo A","300","30","1");
INSERT INTO services VALUES("6","KYN789345126","Cambio de Aceite","50","4","1");
INSERT INTO services VALUES("7","OTH238746915","Carga de Bateria","30","2","1");
INSERT INTO services VALUES("9","JPT573640891","Cambio de Amortiguadores","70","6","1");
INSERT INTO services VALUES("10","GFV452780613","Cambio de Pila de Gasolina","120","11","1");
INSERT INTO services VALUES("11","QVL289054317","Limpieza de Inyectores","90","8","1");
INSERT INTO services VALUES("12","CNF295381706","Reparación Electrónica","150","14","1");
INSERT INTO services VALUES("26","1232","qwew","101","0","1");
INSERT INTO services VALUES("30","asd","asdasdas","100","200","2");
INSERT INTO services VALUES("31","CLU376428915","tetg","2","2","1");



DROP TABLE IF EXISTS tasa_us;

CREATE TABLE `tasa_us` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

INSERT INTO tasa_us VALUES("1","25","2023-03-25");



DROP TABLE IF EXISTS users;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
  `password` varchar(60) CHARACTER SET utf8mb4 NOT NULL,
  `firstname` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 NOT NULL,
  `photo` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `created_on` date NOT NULL,
  `rol_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `rol_id` (`rol_id`),
  CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO users VALUES("1","admin","$2y$10$3P11ZV0ejIwMOvryLsHjFOzJ18GJQUusUcQQALWTpXw.MTCUe3EKm","Alexis","Correa","avatar5.png","2022-12-06","1");
INSERT INTO users VALUES("2","secretaria","??n???H?PM??kb?","Liz","Villegas","","2023-03-15","2");



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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

INSERT INTO vehicles VALUES("1","ABC-01D","Renault","Twingo","Amarillo","VR8-13","123-CHS","2","1");
INSERT INTO vehicles VALUES("2","AA7-2BB","Chevrolet","Aveo LT 2009","Gris","V8-404","123-CHA","1","1");
INSERT INTO vehicles VALUES("4","ABB-123","Ford","Super Carro Ford","Verde","b45-12","123-CHF","4","1");
INSERT INTO vehicles VALUES("5","123-ABB","Jeep","Cherokee","Amarillo","V8-404","123-CHD","4","1");
INSERT INTO vehicles VALUES("6","DIE-12D","FIAT1","UNO","Negro","V8-401","123-CHU","1","1");
INSERT INTO vehicles VALUES("9","AJSK3432","Chevrolet","Corsa","beig","165","223AGA","6","1");
INSERT INTO vehicles VALUES("10","AJSK3432","Chevrolet","Corsa","beig","165","223AGA","7","1");



SET FOREIGN_KEY_CHECKS=1;