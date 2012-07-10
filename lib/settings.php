<?php
//contiene las configuraciones del sitio

// servidor de la base de datos
define("server", "localhost");
// usuario de la base de datos
define("user", "root");
// password de la base de datos
define("pass", "");
// base de dato donde se obtendran los valores
define("bd", "codearagua");

//Estas es la descripción de las tablas
$talleres = "create table talleres(
	id int(4) auto_increment primary key,
	nombre varchar(30) not null,
	apellido varchar(50) not null,
	cedula int(8) not null,
	twitter varchar(50),
	email varchar(50) not null,
	asistencia int(1) default 0,
	formulario varchar(20) not null
	);";

$medios = "";
$imagenes = "";
$usuario = "create table usuario(
	id int(4) auto_increment primary key,
	usuario varchar(30) not null,
	clave varchar(50) not null,
	nivel int(1) not null,
	nombre varchar(30),
	apellido varchar(50),
	email varchar(50) not null,
	fecha date not null default curdate()
	);";
$tutoriales = "";
$eventos = "";
?>