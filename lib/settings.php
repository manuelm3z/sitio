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
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre varchar(30) NOT NULL,
	apellido varchar(50) NOT NULL,
	cedula int(8) NOT NULL,
	twitter varchar(50),
	email varchar(50) NOT NULL,
	asistencia tinyint(1) NOT NULL,
	formulario varchar(20) NOT NULL,
	INDEX(cedula),
	INDEX(formulario)
	);";

/*
* tabla creada para almacenar los datos de los usuarios.
*/
$usuario = "CREATE TABLE IF NOT EXISTS usuario(
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	usuario varchar(30) NOT NULL UNIQUE KEY,
	nombre varchar(30), apellido varchar(30),
	email varchar(50) NOT NULL,
	fecha_registro datetime NOT NULL,
	ultima_conexion datetime NOT NULL,
	estado tinyint(1) NOT NULL
	);";

/*
* tabla creada para almacenar los tipos de permisos admitidos.
*/
$permiso = "CREATE TABLE IF NOT EXISTS permiso(
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nombre text NOT NULL
	);";

/*
* tabla donde se almacenan las asociaciones de permisos a cada usuario.
*/
$usuarios_permisos = "CREATE TABLE IF NOT EXISTS usuarios_permisos(
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	usuario_id int(11) NOT NULL,
	permiso_id int(11) NOT NULL,
	INDEX(usuario_id),
	INDEX(permiso_id)
	);";

/*
* tabla que almacena los post del blog del sitio.
*/
$post = "CREATE TABLE IF NOT EXISTS post(
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	titulo varchar(255) NOT NULL UNIQUE KEY,
	url_imagen text NOT NULL,
	contenido longtext NOT NULL,
	estado tinyint(1) NOT NULL,
	fecha datetime NOT NULL,
	usuario_id int(11) NOT NULL,
	INDEX(usuario_id)
	);";

/*
*tabla que almacena las etiquetas de los post.
*/
$etiqueta = "CREATE TABLE IF NOT EXISTS etiqueta(
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	etiqueta varchar(20) NOT NULL UNIQUE KEY
	);";

/*
* tabla que almacena la relación de las etiquetas a los post.
*/
$post_etiqueta = "CREATE TABLE IF NOT EXISTS post_etiqueta(
	id int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	post_id int(11) NOT NULL,
	etiqueta_id int(11) NOT NULL,
	INDEX(post_id),
	INDEX(etiqueta_id)
	);";

/*
* Array que contiene la lista de tablas de la base de datos,
* agregar el nombre de las variables que guardan las tablas, para ser verificadas.
*/
$tablas = array('talleres' => $talleres,
	'usuario' => $usuario,
	'permiso' => $permiso,
	'usuarios_permisos' => $usuarios_permisos,
	'post' => $post,
	'etiqueta' => $etiqueta,
	'post_etiqueta' => $blog_post_etiquetas,
	);
?>