<?php
/*
* Autor: @manuelm3z
* Documentación: esta clase se encarga de procesar los datos y enviar un correo
*/
/**
* 
*/
class Host{
	public $nombre;
	public $apellido;
	public $email;
	public $plan;
	public $fecha;
	public $destinatario;
	private $monto;

	function __construct($nombre, $apellido, $email, $plan){
		$this->nombre=$nombre;
		$this->apellido=$apellido;
		$this->email=$email;
		$this->plan=$plan;
		$this->destinatario=$this->nombre." ".$this->apellido;
		$dia = date('d');//dia
		$mes = date('m');//mes
		$ano = date('Y');//año
		$this->fecha = $dia."/".$mes."/".$ano;
	
	}

	function enviarCorreo(){
		switch ($this->plan) {
			case 'Basico':
				$this->monto="30 Bs";
				break;
			case 'Intermedio':
				$this->monto="80 Bs";
				break;
			case 'Avanzado':
				$this->monto="130 Bs";
				break;
		}
		$asunto = "Comprobante de Solicitud"; 
		$cuerpo = ' 
<html> 
<head> 
   <title>Comprobante de Solicitud</title> 
</head> 
<body> 
<h1>Estimado(a) '.$this->destinatario.' ('.$this->email.')</h1> 
Haz seleccionado el plan '.$this->plan.'
<p>Para procesar su solicitud debe realizar un deposito o transferencia a las siguientes cuentas por un monto de '.$this->monto.':<br>
Banco: Banco Occidental de Descuento
Nombre: Augusto Lozada
Cuenta Ahorro: 0116-0203-73-0197391095<br><br>

Banco: Bancaribe
Nombre: Manuel Zambrano
Cuenta Ahorro: 0114-0201-18-2011298659<br><br>

Banco: Banesco Banco Universal
Nombre: Manuel Zambrano
Cuenta Ahorro: 0134-0142-02-1422163960<br><br>

Luego, enviar un correo electronico a ventas@codearagua.com, el comprobante de transferencia o deposito.<br><br>

Mensaje generado '.$this->fecha.'
</p> 
</body> 
</html> 
';
		//para el envío en formato HTML
		$headers = "MIME-Version: 1.0\r\n";
		$headers .= "Content-type: text/html; charset=utf-8\r\n";
		//dirección del remitente
		$headers .= "From: CodeAragua <ventas@codearagua.com>\r\n";
		//dirección de respuesta, si queremos que sea distinta que la del remitente
		$headers .= "Reply-To: ventas@codearagua.com\r\n";
		if(mail($this->email,$asunto,$cuerpo,$headers)){
			echo "<section id='retorno'>Envío de solicitud realizada, se le enviará un comprobante a su email</section>";
		}else{
			echo "<section id='retorno'>Oops!!! ocurrio un problema procesando tu solicitud, prueba mas tarde.</section>";
		}
		mail("ventas@codearagua.com",$asunto,$cuerpo,$headers);

	}
}
?>