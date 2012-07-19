<?php
include('main.php');
/*if (isset($_POST['formulario'])) {
  $usuario=$_POST['usuario'];
  $clave=$_POST['clave'];
  $Formulario=$_POST['formulario'];
  echo $usuario.$clave.$Formulario;
}*/
  
  

    
if (isset($_POST['formulario'])) {
  $forma=$_POST['formulario'];
  if($forma=='login'){
    $usuario=new usuario();
    $usuario->login_start_staff();
  }else{
    $usuarios=new usuarios();
    $usuarios->talleres();
  }
}

//instanciando clase

?>
