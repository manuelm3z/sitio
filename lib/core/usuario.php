<?php
class Usuario{
	public $id_usuario;
	public $log_usuario;
	private $clave_usuario;
	public $nombre_usuario;
	public $apellido_usuario;
	public $email_usuario;
	public $fecha_registro;

	function __construct($inId=null, $inLog=null, $inClave=null, $inNombre=null, $inApellido=null, $inEmail=null, $inFecha=null){
		$this->id_usuario = $inId;
		$this->log_usuario = $inLog;
		$this->clave_usuario = $inClave;
		$this->nombre_usuario = $inNombre;
		$this->apellido_usuario = $inApellido;
		$this->email_usuario = $inEmail;
		$dividoFecha = explode("-", $inFecha);
		$this->fecha_registro = $dividoFecha[2]."/".$dividoFecha[1]."/".$dividoFecha[0];
	}
}
?>