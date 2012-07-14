<?php
include('settings.php');

class datos{
	public $conexion;
	public $selector;	
		
	public function __construct(){
		$this->conexion=(@mysql_connect(server,user,pass));
		$this->selector=(@mysql_select_db(bd,$this->conexion));

		if(!$this->conexion){
		echo 'No se puede conectar al servidor';
		}elseif(!$this->selector){
			echo 'No se puede conectar a la Base de Datos';
			}
	}
}



	public function talleres(){
		//echo "<p class='Grande'> Te Registraste con exito:".$this->Nombre." ".$this->Apellido.", </br> Nos vemos el sabado 28-04-2012 en la Aldea el Limon</p>";
		$this->consulta=(@mysql_query("SELECT * FROM talleres WHERE cedula=$this->Cedula;"));
		$this->resultado=(mysql_fetch_array($this->consulta, MYSQL_ASSOC));
		if (mysql_num_rows($this->consulta)>0){
			echo "<p class='Grande'> Ya estás registrado como: ".$this->resultado['nombre']." ".$this->resultado['apellido']."</p>";
		}else{
			$this->ADD_DATA=(@mysql_query("insert into talleres values(null, '$this->Nombre', '$this->Apellido', $this->Cedula, '$this->Twitter', '$this->Email', null, '$this->Formulario');"));
			if($this->ADD_DATA){
				echo "<p class='Grande'> Te Registraste con exito:".$this->Nombre." ".$this->Apellido.", </br> Nos vemos el sabado 28-04-2012 en la Aldea el Limon</p>";
			}else{
				echo "<p class='Grande'> DATOS NO CARGADOS, </br> Reportalo enviando un tweet a <a href='https://twitter.com/#!/codearagua'>@Codearagua</a></p>";
			}
		}
	}
}

class usuario{
	public $usuario;
	public $clave;
	public $consulta;
	public $resultado;

	public function __construct(){
		session_start();
		$datos=new datos();
		$this->usuario=($_POST['usuario']);
		$this->clave=($_POST['clave']);
	}

	public function __destruct(){
		session_destroy();
	}

	public function login_start_staff(){
		// obtiene los valores de la base de datos según usuario
		$this->consulta=(@mysql_query("select * from usuario where usuario='$this->usuario';"));
		if (mysql_num_rows($this->consulta)>0){
			// almacenar los resultados en la variable
			$this->resultado=(mysql_fetch_array($this->consulta, MYSQL_ASSOC));
			// comprobamos si el usuario esta autorizado para la zona administrativa
			if($this->clave == $this->resultado['clave']){
				if ($this->resultado['nivel']==2) {
					$_SESSION['nivel'] = $this->resultado['nivel'];
					$_SESSION['usuario'] = $this->usuario;
					$_SESSION['email'] = $this->resultado['email'];
					echo "autorizado";
				}else{
					echo "No tienes permisos para entrar";
					return false;
				}
			}else{
				echo "Verifique el Usuario y Password";
				return false;
			}
		}else{
			echo "Verifique el Usuario y Password";
			return false;
		}
	}
	
	public function verificar_login(){
		if(isset($_SESSION['nivel'])){
			if($_SESSION['nivel'] <= 3){
				header ("Location: http://".$_SERVER['SERVER_NAME']."/CodeAragua/0.3/staff/");
			}
		}else{
			header ("Location: http://".$_SERVER['SERVER_NAME']."/CodeAragua/0.3/staff/");
		}
	}	
	
}
?>