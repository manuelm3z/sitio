<?php
/*
* Autor: @manuelm3z                             
* Documentación: esta clase se encarga de crear un objeto por usuario cada vez que inicie sesion un usuario,
* o se registre uno nuevo.
*/
include 'datos.php';
class Usuario{
	//Id del usuario.
	public $id;
	//Nombre de usuario.
	public $usuario;
	//Contraseña de usuario.
	private $clave;
	//Nombre real del usuario.
	public $nombre;
	//Apellido del usuario.
	public $apellido;
	//Correo electronico del usuario.
	public $email;
	//Fecha en que se registro.
	public $fecha_registro;
	//fecha de la ultima vez que inició session.
	public $ultima_conexion;
	//Este campo indica si el usuario está activo o no.
	public $estado;
	//Es una propieda donde se guarda un string despues de cada operación, principalmente es para el programador.
	public $mensaje;

	function __construct($inUsuario=null, $inClave=null){
		//Verificar si las variables están vacias antes de asignarlas.
		if(!empty($inUsuario) && !empty($inClave)){
			//realizo la verificación en base de datos que el registro exista.
			if($resultado = $this->buscarUsuario($inUsuario)){
				if($inClave == $resultado["clave"]){
					//verficar si el usuario está activo
					if($resultado["estado"] == 1){
						//Asigno los valores a las propiedades del objeto
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
						$this->mensaje = "Usuario Desactivado";
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
	/*
	* Este método se encarga de activar el usuario en base de datos.
	*/
	public function activarUsuario($inId){
		//Me aseguro de que no esté vacia la variable.
		if (!empty($inId)){
			if($consulta = mysql_query("UPDATE usuario SET estado=1 WHERE id=".$inId.";")){
				$this->mensaje = "Usuario activado con exito";
			}else{
				$this->mensaje = "No se pudo conectar con la base de datos";
			}
		}else{
			$this->mensaje = "No se recibio ningun id";
		}
	}
	/*
	* Este método se encarga de ejecutar la consulta de base de datos de busqueda de usuario por email.
	*/
	private function buscarEmail($inEmail){
		$consulta = mysql_query("SELECT * FROM usuario WHERE email='".$inEmail."';");
		$resultado = mysql_fetch_assoc($consulta);
		return $resultado;
	}
	/*
	* Este método se encarga de ejecutar la consulta de base de datos de busqueda de usuario por id.
	*/
	private function buscarId($inId){
		$consulta = mysql_query("SELECT * FROM usuario WHERE id='".$inId."';");
		$resultado = mysql_fetch_assoc($consulta);
		return $resultado;
	}
	/*
	* Este método se encarga de ejecutar la consulta de base de datos de busqueda de usuario por nombre de usuario.
	*/
	private function buscarUsuario($inUsuario){
		$consulta = mysql_query("SELECT * FROM usuario WHERE usuario='".$inUsuario."';");
		$resultado = mysql_fetch_assoc($consulta);
		return $resultado;
	}
	
	/*
	* Este método se encarga de enviar un correo electronico con el id del usuario para la activacion.
	*/
	private function enviarEmail($inEmail, $inId){
		//Asunto del correo electronico
		$asunto = "Activación de cuenta CodeAragua.com";
		//cuerpo del correo electronico
		$cuerpo = "
		<html lang='es-VE'>
		<head>
			<title>Gracias por registrarte</title>
		</head>
		<body>
			<h1>Gracias por registrarte en www.codearagua.com</h1>
			<p>Solo falta un paso más para el proceso de registro, debes hacer click <a href='http://www.codearagua.com/activar/?id=".$inId."'>Aqui</a>.
			Sino funciona el enlace copia la siguiente direccion en tu navegador http://www.codearagua.com/activar/?id=".$inId."</p> 
		</body>
		</html>
		";
		//para el envío en formato HTML 
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
		//dirección del remitente 
		$headers .= "From: Equipo CodeAragua <no-reply@codearagua.com>\r\n"; 
		if(mail($inEmail,$asunto,$cuerpo,$headers)){
			return True;
		}else{
			return False;
		}
	}
	/*
	* Este método se encarga de formatear la fecha y hora recibida de base de datos.
	*/
	private function fecha($inFecha){
		$reemplazo = str_replace("-", " ", $inFecha);
		$dividoFecha = explode(" ", $reemplazo);
		return $dividoFecha[2]."/".$dividoFecha[1]."/".$dividoFecha[0]." ".$dividoFecha[3];
	}
	/*
	* Este método se encarga de registrar un nuevo usuario en base de datos.
	*/
	public function nuevoUsuario($inUsuario=null, $inClave=null, $inEmail=null){
		//Verifico si las variables están vacias.
		if(!empty($inUsuario) && !empty($inClave) && !empty($inEmail)){
			if($resultado = $this->buscarUsuario($inUsuario)){
				$this->mensaje = "Usuario ya registrado";
			}elseif ($resultado = $this->buscarEmail($inEmail)){
				$this->mensaje = "Ya existe una cuenta con ese correo";
			}else{
				if($consulta = mysql_query("INSERT INTO usuario VALUES(0, '".$inUsuario."', '".$inClave."', '', '', '".$inEmail."', now(), now(), False);")){
					if($resultado = $this->buscarUsuario($inUsuario)){
						$this->mensaje = "Usuario Registrado";
						$this->enviarEmail($inEmail, $resultado['id']);
					}					
				}else{
					$this->mensaje = "No se pudo conectar con la base de datos";
				}
			}
		}else{
			$this->mensaje = "Debe llenar todos los campos";
		}
	}
	/*
	* Este método regresa un mensaje si la variable introducida está vacía.
	*/
	private function vacio($inValor){
		if(!$inValor){
			return "No esta registrado";
		}
	}
}
?>