<?php
/*
* Autor: @manuelm3z
* Documentación: esta clase se encarga de conectar con el 
* servidor de base de datos
*/
include '../settings.php';
/*
 * Clase hija de mysqli para la conexion de base de datos.
 */
class Datos extends mysqli {
	public $conexion;
    public function __construct() {
        parent::__construct(server, user, pass, bd);
        if (mysqli_connect_error()) {
            die('Error de Conexión (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
        }else{
        	$this->conexion = true;
        }
    }
}
/*class Datos{
	public $conexion;
	public $baseDatos;	
		
	public function __construct(){
		$this->conexion=(@mysql_connect(server,user,pass));
		$this->baseDatos=(@mysql_select_db(bd,$this->conexion));

		if(!$this->conexion){
		echo 'No se puede conectar al servidor';
		}elseif(!$this->baseDatos){
			echo 'No se puede conectar a la Base de Datos';
			}
	}
}*/
?>