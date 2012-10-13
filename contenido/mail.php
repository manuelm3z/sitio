<?php
include('../lib/core/host.php');
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$email = $_POST['email'];
$plan = $_POST['plan'];

$solicitud=new Host($nombre, $apellido, $email, $plan);
$solicitud->enviarCorreo();


?>