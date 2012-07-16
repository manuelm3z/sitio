<?php
/*
* Autor: @manuelm3z
* Documentación: en este documento están las configuraciones 
* de base de datos.
*/

/*
* servidor de la base de datos
*/
define("server", "localhost");

/*
* usuario de la base de datos
*/
define("user", "root");

/*
* password de la base de datos
*/
define("pass", "naci21-09");

/*
* base de dato donde se obtendran los valores
*/
define("bd", "codearagua");

/*
* Estas es la descripción de las tablas
*/
$talleres = "CREATE TABLE IF NOT EXISTS talleres(
	id int(11) AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(30) NOT NULL,
	apellido varchar(50) NOT NULL,
	cedula int(8) NOT NULL,
	twitter varchar(50),
	email varchar(50) NOT NULL,
	asistencia int(1) DEFAULT 0,
	formulario varchar(20) NOT NULL
	);";

/*
* tabla creada para almacenar los datos de los usuarios.
*/
$usuario = "CREATE TABLE IF NOT EXISTS usuario(
	id_usuario int(11) AUTO_INCREMENT PRIMARY KEY,
	log_usuario varchar(30) NOT NULL,
	clave_usuario varchar(50) NOT NULL,
	nombre_usuario varchar(30),
	apellido_usuario varchar(50),
	email_usuario varchar(50) NOT NULL,
	fecha_registro date NOT NULL
	);";

/*
* tabla creada para almacenar los tipos de permisos admitidos.
*/
$permisos = "CREATE TABLE IF NOT EXISTS permisos(
	id_permiso int(11) auto_increment PRIMARY KEY,
	permiso text NOT NULL
	);";

/*
* tabla donde se almacenan las asociaciones de permisos a cada usuario.
*/
$permisos_usuarios = "CREATE TABLE IF NOT EXISTS permisos_usuarios(
	id int(11) auto_increment PRIMARY KEY,
	id_usuario int(4) NOT NULL,
	id_permiso int(4) NOT NULL
	);";

/*
* tabla que almacena los post del blog del sitio.
*/
$blog_post = "CREATE TABLE IF NOT EXISTS blog_post(
	id_post int(11) auto_increment PRIMARY KEY,
	titulo_post varchar(255) NOT NULL,
	contenido_post longtext NOT NULL,
	estado_post int(1) NOT NULL,
	id_usuario int(4) NOT NULL,
	fecha_post datetime NOT NULL
	);";

/*
*tabla que almacena las etiquetas de los post.
*/
$etiquetas_post = "CREATE TABLE IF NOT EXISTS etiquetas_post(
	id_etiqueta int(11) auto_increment PRIMARY KEY,
	etiqueta varchar(20)
	);";

/*
* tabla que almacena la relación de las etiquetas a los post.
*/
$blog_post_etiquetas = "CREATE TABLE IF NOT EXISTS blog_post_etiquetas(
	id int(11) auto_increment PRIMARY KEY,
	id_post int(4) NOT NULL,
	id_etiqueta int(4) NOT NULL
	);";

/*
* Array que contiene la lista de tablas de la base de datos,
* agregar el nombre de las variables que guardan las tablas, para ser verificadas.
*/
$tablas = array('talleres' => $talleres,
	'usuario' => $usuario,
	'permisos' => $permisos,
	'permisos_usuarios' => $permisos_usuarios,
	'blog_post' => $blog_post,
	'etiquetas_post' => $etiquetas_post,
	'blog_post_etiquetas' => $blog_post_etiquetas,
	);
?>