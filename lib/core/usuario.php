<?php
/************************************************
* Autor: @manuelm3z                             *
* Documentación: esta clase se encarga de crear *
* un objeto por usuario cada vez que tengan que *
* relizar alguna acción en el sitio.            *
************************************************/

class Usuario{
	public $id_usuario;
	public $log_usuario;
	private $clave_usuario;
	public $nombre_usuario;
	public $apellido_usuario;
	public $email_usuario;
	public $fecha_registro;

	function __construct($inId=null, $inLog=null, $inClave=null, $inNombre=null, $inApellido=null, $inEmail=null, $inFecha=null){
		//Verificar si las variables están vacias antes de asignarlas.
		if(!empty($inId)){
			$this->id_usuario = $inId;
		}
		if(!empty($inLog)){
			$this->log_usuario = $inLog;
		}
		if(!empty($inClave)){
			$this->clave_usuario = $inClave;
		}
		if(!empty($inNombre)){
			$this->nombre_usuario = $inNombre;
		}
		if(!empty($inApellido)){
			$this->apellido_usuario = $inApellido;
		}
		if(!empty($inEmail)){
			$this->email_usuario = $inEmail;
		}
		if(!empty($inFecha)){
			$dividoFecha = explode("-", $inFecha);
			$this->fecha_registro = $dividoFecha[2]."/".$dividoFecha[1]."/".$dividoFecha[0];
		}
		
	}
}
?>