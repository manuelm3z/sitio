<?php
/*
* Autor: @manuelm3z
* Documentación: esta clase se encarga de conectar con el 
* servidor de base de datos
*/
include '../settings.php';
class Datos{
	public $conexion;
	public $baseDatos;
	public $respuesta;	
		
	function __construct(){
		$this->conexion=(@mysql_connect(server,user,pass));
		$this->baseDatos=(@mysql_select_db(bd,$this->conexion));

		if(!$this->conexion){
			$this->respuesta = "No se puede conectar al servidor";
			return $this->respuesta;
		}elseif(!$this->baseDatos){
			$this->respuesta = "no se encuentra la base de datos, creando...";
			return $this->respuesta;
			$consulta = mysql_query("CREATE DATABASE ".bd);
			foreach($tablas as $ejecutar){
				$consulta = mysql_query($ejecutar);
				}
		}
	}

	/*
	* retornará true si la conexion está establecida
	*/
	public function comprobarConexion(){
		if($this->conexion && $this->baseDatos){
			return true;
		}
	}
}
?>