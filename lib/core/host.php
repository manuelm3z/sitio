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

	/*function __construct(nombre, apellido, email, plan){
		$this->nombre=nombre;
		$this->apellido=apellido;
		$this->email=email;
		$this->plan=plan;
		$dia = date('d');//dia
		$mes = date('m');//mes
		$ano = date('Y');//año
		$fecha = $dia."/".$mes."/".$ano;
		$destinatario = $this->nombre." ".$this->apellido;
	}*/

	/*function enviarCorreo(fecha, destinatario, email){

		$asunto = "Comprobante de Solicitud"; 
		$cuerpo = ' 
<html> 
<head> 
   <title>Comprobante de Solicitud</title> 
</head> 
<body> 
<h1>Estimado(a) '.$destinatario.'</h1> 
<p>Para procesar su solicitud debe realizar un deposito o transferencia a las siguientes cuentas:<br>
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

Mensaje generado '.$dia.'/'.$mes.'/'.$ano.'
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
		mail($email,$asunto,$cuerpo,$headers);

	}*/
}
?>