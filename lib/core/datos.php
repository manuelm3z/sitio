<?php
/************************************************
* Autor: @manuelm3z                             *
* Documentación: esta clase se encarga de       *
* conectar con el servidor de base de datos     *                             *
************************************************/
include '../settings.php';
class Datos{
	public $conexion;
	public $baseDatos;	
		
	function __construct(){
		$this->conexion=(@mysql_connect(server,user,pass));
		$this->baseDatos=(@mysql_select_db(bd,$this->conexion));

		if(!$this->conexion){
		echo 'No se puede conectar al servidor';
		}elseif(!$this->baseDatos){
			echo 'No se puede conectar a la Base de Datos';
			}
	}
	//retornará true si la conexion está establecida
	public function comprobarConexion(){
		if($this->conexion && $this->baseDatos){
			return true;
		}
	}
}
?>