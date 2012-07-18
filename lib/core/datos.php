<?php
/*
* Autor: @manuelm3z
* Documentación: esta clase se encarga de conectar con el 
* servidor de base de datos
*/
include '../settings.php';
/*
 * Clase para la conexion de base de datos.
 */
class Datos{
    public $conexion;
    public $baseDatos;
    public $mensaje;
        
    public function __construct(){
        $this->conexion=(@mysql_connect(server,user,pass));
        $this->baseDatos=(@mysql_select_db(bd,$this->conexion));

        if(!$this->conexion){
            $this->mensaje = "No se puede conectar al servidor";
        }elseif(!$this->baseDatos){
            $this->mensaje = "No se puede conectar a la base de datos";
        }else{
            $this->mensaje = "Conetado al servidor de base de datos";
        }
    }
}
?>