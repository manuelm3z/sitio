<?php
/************************************************
* Autor: @manuelm3z                             *
* Documentación: en este documento están las    *
* configuraciones de base de datos.             *
************************************************/

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
	id int(11) auto_increment primary key,
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
//tabla creada para almacenar los datos de los usuarios.
$usuario = "create table usuario(
	id_usuario int(11) auto_increment primary key,
	log_usuario varchar(30) not null,
	clave_usuario varchar(50) not null,
	nombre_usuario varchar(30),
	apellido_usuario varchar(50),
	email_usuario varchar(50) not null,
	fecha_registro date not null
	);";

//tabla creada para almacenar los tipos de permisos admitidos.
$permisos = "create table permisos(
	id_permiso int(11) auto_increment primary key,
	permiso text not null
	);";

//tabla donde se almacenan las asociaciones de permisos a cada usuario.
$permisos_usuarios = "create table permisos_usuarios(
	id int(11) auto_increment primary key,
	id_usuario int(4) not null,
	id_permiso int(4) not null
	);";

//tabla que almacena los post del blog del sitio.
$blog_post = "create table blog_post(
id_post int(11) auto_increment primary key,
titulo_post varchar(255) not null,
contenido_post longtext not null,
estado_post int(1) not null,
id_usuario int(4) not null,
fecha_post datetime not null
);";

//tabla que almacena las etiquetas de los post.
$etiquetas_post = "create table etiquetas_post(
	id_etiqueta int(11) auto_increment primary key,
	etiqueta varchar(20)
	);";

//tabla que almacena la relación de las etiquetas a los post.
$blog_post_etiquetas = "create table blog_post_etiquetas(
	id int(11) auto_increment primary key,
	id_post int(4) not null,
	id_etiqueta int(4) not null
	);";
?>