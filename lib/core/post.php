<?php
/************************************************
* Autor: @manuelm3z                             *
* Documentación: esta clase se encarga de       *
* administrar los objetos de los post para el   *
* blog del sitio.                               *
************************************************/
class Post{
	public $id_post;
	public $titulo_post;
	public $contenido_post;
	public $estado_post;
	public $autor;
	public $etiquetas;
	public $fecha_post;

	function __construct($inId=null, $inTitulo=null, $inContenido=null, $inEstado=null, $inIdAutor=null, $inEtiquetas=null, $inFecha=null){
		//Verificar si las variables están vacias antes de asignarlas.
		if(!empty($inId)){
			$this->id_post = $inId;
		}
		if(!empty($inTitulo)){
			$this->titulo_post = $inTitulo;
		}
		if(!empty($inContenido)){
			$this->contenido_post = $inContenido;
		}
		if(!empty($inEstado)){
			$this->estado_post = $inEstado;
		}
		if(!empty($inIdAutor)){
			$consulta = mysql_query("select nombre_usuario, apellido_usuario from usuario where id =".$inIdAutor);
			$fila = mysql_fetch_assoc($consulta);
			$this->autor = $fila["nombre_usuario"]." ".$fila["apellido_usuario"];
		}
		if(!empty($inEtiquetas)){
			$this->etiquetas = $inEtiquetas;
		}
		if(!empty($inFecha)){
			$dividoFecha = explode("-", $inFecha);
			$this->fecha_post = $dividoFecha[2]."/".$dividoFecha[1]."/".$dividoFecha[0];
		}
	}
}
?>