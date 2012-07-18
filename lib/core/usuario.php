<?php
/************************************************
* Autor: @manuelm3z                             *
* Documentación: esta clase se encarga de crear *
* un objeto por usuario cada vez que tengan que *
* relizar alguna acción en el sitio.            *
************************************************/
include 'datos.php';
class Usuario{
	public $id;
	public $usuario;
	private $clave;
	public $nombre;
	public $apellido;
	public $email;
	public $fecha_registro;
	public $ultima_conexion;
	public $estado;
	public $mensaje;

	function __construct($inLog=null, $inClave=null){
		//Verificar si las variables están vacias antes de asignarlas.
		if(!empty($inLog) && !empty($inClave)){
			if($consulta = mysql_query("SELECT * FROM usuario WHERE usuario='".$inLog."';")){
				$resultado = mysql_fetch_assoc($consulta);
				if($inClave == $resultado["clave"]){
					$this->id = $resultado["id"];
					$this->usuario = $resultado["usuario"];
					$this->clave = $resultado["clave"];
					$this->nombre = $this->vacio($resultado["nombre"]);
					$this->apellido = $this->vacio($resultado["apellido"]);
					$this->email = $resultado["email"];
					$this->fecha_registro = $this->fecha($resultado["fecha_registro"]);
					$this->ultima_conexion = $this->fecha($resultado["ultima_conexion"]);
					$this->estado = $resultado["estado"];
					if($_SESSION['usuario']=$this->usuario){
						$this->mensaje = "Sesion iniciada";
					}else{
						$this->mensaje = "No se pudo iniciar la sesion";
					}
				}else{
					$this->mensaje = "Contraseña incorrecta.";
				}
			}else{
				$this->mensaje = "Usuario o contraseña incorrecta.";
			}			
		}else{
			$this->mensaje = "Debe llenar todos los campos";
		}
	}

	private function fecha($fecha){
		$reemplazo = str_replace("-", " ", $fecha);
		$dividoFecha = explode(" ", $reemplazo);
		return $dividoFecha[2]."/".$dividoFecha[1]."/".$dividoFecha[0]." ".$dividoFecha[3];
	}

	private function vacio($valor){
		if(!$valor){
			return "No esta registrado";
		}
	}
}
?>