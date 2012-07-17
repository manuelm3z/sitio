<?php
/*
* Autor: @manuelm3z                             
* Documentación: esta clase se encarga de instanciar los post
* para el blog    
*/
class Post{
	public $id_post;
	public $titulo_post;
	public $url_imagen;
	public $error_imagen;
	public $contenido_post;
	public $estado_post;
	public $autor;
	public $id_autor;
	public $etiquetas;
	public $fecha_post;
	//Esta variable guarda los resultados de las consultas a base de datos.
	public $resultado;

	/*
	* se encarga de grabar los datos de un post.
	*/
	function __construct($inId=null, $inTitulo=null, $_FILES, $inContenido=null, $inEstado=null, $inIdAutor=null, $inEtiquetas=null, $inFecha=null){
		/*
		* Verificar si las variables están vacias antes de asignarlas.
		*/
		if(!empty($inId)){
			$this->id_post = $inId;
		}
		if(!empty($inTitulo)){
			$this->titulo_post = $inTitulo;
		}
		
		if(!empty($inContenido)){
			$this->contenido_post = $inContenido;
		}
		if(!empty($inEstado)){
			$this->estado_post = $inEstado;
		}
		if(!empty($inIdAutor)){
			$consulta = mysql_query("select nombre_usuario, apellido_usuario from usuario where id =".$inIdAutor);
			$fila = mysql_fetch_assoc($consulta);
			$this->autor = $fila["nombre_usuario"]." ".$fila["apellido_usuario"];
		}
		if(!empty($inId)){
			//selecciono las etiquetas que tengan relación con el post
			$consulta = mysql_query("select etiquetas_post.* from blog_post_etiquetas left join (etiquetas_post) on (blog_post_etiquetas.id_etiqueta = etiquetas_post.id_etiqueta) where blog_post_etiquetas.id_post =".$inId);
			$postEtiquetas = "Sin Etiquetas";
			$etiquetaArray = array();
			$idEtiquetaArray = array();
			while($fila = mysql_fetch_assoc($consulta)){
				array_push($etiquetaArray, $fila["etiqueta"]);
				array_push($idEtiquetaArray, $fila["id_etiqueta"]);
			}
			//verifico que el array tenga contenido
			if(sizeof($etiquetaArray) > 0){
				//para cada elemento del array
				foreach ($etiquetaArray as $etiqueta) {
					if($postEtiquetas == "Sin Etiquetas"){
						$postEtiquetas = $etiqueta;
					}else{
						$postEtiquetas = $postEtiquetas.", ".$etiqueta;
					}
				}
			}
			$this->etiquetas = $postEtiquetas;
		}
		if(!empty($inFecha)){
			$dividoFecha = explode('-', $inFecha);
			$this->fecha_post = $dividoFecha[2]."/".$dividoFecha[1]."/".$dividoFecha[0];
		}
	}
	/*
	* Éste método se encarga de guardar en base de datos la entrada.
	*/
	public function setPost($inTitulo=null, $_FILES, $inContenido=null, $inIdAutor=null, $inEtiquetas=null){
		//si el titulo no está vacío le coloco el titulo.
		if(!empty($inTitulo)){
			$this->titulo_post = $inTitulo;
		}
		//si tiene imagen la subo y guardo la url.
		if(!empty($_FILES["imagen"])){
			//asigno el tipo a la variable tipo.
			$tipo = $_FILES["imagen"]["type"];
			//asigno el tamaño a la variable size.
			$size = $_FILES["imagen"]["size"];
			//asigno el nombre a la variable nombre_imagen.
			$nombre_imagen = $_FILES["imagen"]["name"];
			//primero verifico el tipo de archivo que estoy subiendo.
			if (($tipo == "image/gif") || ($tipo == "image/jpeg") || ($tipo == "image/pjpeg") || ($tipo == "image/png") && ($size < 50000)){
				//verifico que no existan errores.
				if ($_FILES["imagen"]["error"] > 0){
					//asigno el error a la variable de clase error_imagen.
					$this->error_imagen = "Error devuelto: " . $_FILES["imagen"]["error"];
				}else{
					//verifico que no exista otra imagen con el mismo nombre.
					if(file_exists("upload/".$usuario->log_usuario."/".$nombre_imagen)){
						//asigno el error a la variable de clase error_imagen.
						$this->error_imagen = "Error devuelto: ".$nombre_imagen." ya existe.";
					}else{
						//muevo la imagen a la carperta con el nombre del usuario.
						move_uploaded_file($_FILES["imagen"]["tmp_name"], "upload/".$usuario->log_usuario."/".$nombre_imagen);
						$this->url_imagen = "upload/".$usuario->log_usuario."/".$nombre_imagen;
					}
				}
			}else{
				//asigno el error a la variable de clase error_imagen.
				$this->error_imagen = "Error devuelto: Archivo invalido";
			}
		}
		//Si el parametro no está vacío lo asigno a la variable.
		if(!empty($inContenido)){
			$this->contenido_post = $inContenido;
		}
		//Si el parametro no está vacío lo asigno a la variable.
		if(!empty($inIdAutor)){
			$this->id_autor = $inIdAutor;
		}

		$consulta = mysql_query("INSERT INTO blog_post VALUES(0,".$this->titulo_post.", ".$this->contenido_post.", 0, ".$this->id_autor.", curdate(), ".$this->url_imagen.";");
		if((mysql_affected_rows()) > 0){
			$this->resultado = True;
		}else{
			$this->resultado = False;
		}


		if(!empty($inEtiquetas)){
			
		}
	}
	
}
?>