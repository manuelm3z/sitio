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
	public $etiquetas;
	public $fecha_post;

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
		if(!empty($_FILES["file"])){
			if (($_FILES["file"]["type"] == "image/gif") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/pjpeg") || ($_FILES["file"]["type"] == "image/png") && ($_FILES["file"]["size"] < 50000)){
				if ($_FILES["file"]["error"] > 0){
					$this->error_imagen = "Error devuelto: " . $_FILES["file"]["error"];
					}else{
						if(file_exists("upload/".$usuario->log_usuario."/".$_FILES["file"]["name"])){
							$this->error_imagen = "Error devuelto: ".$_FILES["file"]["name"]." ya existe.";
							}else{
								move_uploaded_file($_FILES["file"]["tmp_name"], "upload/".$usuario->log_usuario."/".$_FILES["file"]["name"]);
								$this->url_imagen = "upload/".$usuario->log_usuario."/".$_FILES["file"]["name"];
								}
							}
						}else{
							$this->error_imagen = "Error devuelto: Archivo invalido";
						}
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
	//retorna el titulo del post
	public function getId(){
		return $this->id_post;
	}
	//retorna el titulo del post
	public function getTitulo(){
		return $this->titulo_post;
	}
	//retorna el contenido del post
	public function getContenido(){
		return $this->contenido_post;
	}
	//retorna el estado del post
	public function getEstado(){
		return $this->estado_post;
	}
	//retorna el nombre del autor
	public function getAutor(){
		return $this->autor;
	}
	//retorna la fecha del post
	public function getFecha(){
		return $this->fecha_post;
	}
	
}
?>