//funcion encargada de crear el objeto ajax
function conectar(){
  try{
    http = new XMLHttpRequest();
  }catch(error1){
    try{
      http = new ActiveXObject("Msxml2.XMLHTTP");
    }catch(error2){
      try{
        http = new ActiveXObject("Microsoft.XMLHTTP");
      }catch(error3){
        http = false;
      }
    }
  }
  return http;
}
var conexion = conectar();
var url;

/*funcion que se encarga de cambiar el contenido*/
function cambio(div){
  div=div.id;
  if(!div){
    url="contenido/inicio.php";
    }else{
      url="contenido/"+div+".php";
    }

  conexion.onreadystatechange=function(){
    if (conexion.readyState==4 && conexion.status==200){
      document.getElementById('contenido').innerHTML=conexion.responseText;
    }
  }
  conexion.open("POST",url,true);
  conexion.send();
}

//se encarga de verificar el navegador
function chrome(){
  is_chrome= navigator.userAgent.toLowerCase().indexOf('chrome') > -1;
  if(navigator.appName == "Microsoft Internet Explorer"){
    alert("Seras redireccionado a una pagina para descargar un navegador (Funcional)");
    location.href="https://www.google.com/chrome?hl=es";
  }else if(navigator.appName != "Microsoft Internet Explorer" && !is_chrome){
    alert("Para disfrutar mejor de nuestro sitio usa google chrome");
  }
}

//Encargada de transferir los datos por ajax
function registro(id){
  id=id.id;
  formulario=document.getElementById(id);
  
  nombre=formulario.nombre.value,apellido=formulario.apellido.value,email=formulario.email.value,plan=formulario.plan.value;

    conexion.onreadystatechange=function(){
      if (conexion.readyState==4 && conexion.status==200) {
        document.getElementById('contenido').innerHTML=conexion.responseText;
      }
    }
    conexion.open('POST','contenido/mail.php',true);
    conexion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    conexion.send('nombre='+nombre+'&apellido='+apellido+'&email='+email+'&plan='+plan);
  }

//logeo
function login(id){
  id=id.id;
  formulario=document.getElementById(id);
  var valores={"usuario":formulario.usuario.value,"clave":formulario.password.value,"formulario":formulario.id};
  usuario=formulario.usuario.value;
  clave=formulario.password.value;

    conexion.onreadystatechange=function(){
      if (conexion.readyState==4 && conexion.status==200) {
         if(conexion.responseText=="autorizado"){
          //document.getElementById('error').innerHTML="Autorizado";
          location.href='http://www.cristalab.com';
        }else{
          document.getElementById('error').innerHTML=conexion.responseText;
          }       
        }
      }
    conexion.open('POST','../lib/index.php',true);
    conexion.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    conexion.send('usuario='+usuario+'&clave='+clave+'&formulario='+formulario.id);
}

