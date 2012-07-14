<?php
/*
* Autor: @manuelm3z                             
* Documentación: esta clase se encarga de administrar los objetos
* de los post para el blog del sitio.
*/
class Blog{
	public $postArray;
	public $numTotalRegistros;
	public $numTotalPaginas;
	public $consulta;
	public $pagina;

	function __construct($inId=null, $inEtiquetas=null, $pagina=null){
		//verificando que la variable no esté vacía
		if(!empty($pagina)){
			//inicializo las variables
			$inicio = 0; 
			$this->pagina = 1;
		}else{
			$this->pagina = $pagina;
			$inicio = ($this->pagina - 1)*10;
		}
		if(!empty($inId)){
			$this->consulta = mysql_query("SELECT * FROM blog_post WHERE id = ".$inId." ORDER BY id DESC");
		}else if(!empty($inEtiquetas)){
			$this->consulta = mysql_query("SELECT blog_post.* FROM blog_post_etiquetas LEFT JOIN (blog_post) ON (blog_post_etiquetas.id_post = blog_post.id_post) WHERE blog_post_etiquetas.id_etiqueta =".$inEtiquetas." ORDER BY blog_post.id_post DESC LIMIT ".$inicio.", 10;");
		}else{
			$this->consulta = mysql_query("SELECT * FROM blog_post ORDER BY id_post DESC LIMIT ".$inicio.", 10;");
		}

    $this->postArray = array();
    while ($fila = mysql_fetch_assoc($consulta)){
    	$Post = new Post($fila["id_post"], $fila['titulo_post'], $fila['contenido_post'], $fila['estado_post'], $fila["id_usuario"], $fila['fecha_post']);
        array_push($postArray, $Post);
    }
    return $postArray;
	}
	//regresa el numero total de resulados por consulta
	public function getNumTotalRegistros(){
		$this->numTotalRegistros = mysql_num_rows($this->consulta);
		return $this->numTotalRegistros;
	}
	//regresa el numero total de paginas a mostrar
	public function getNumTotalPaginas(){
		$this->numTotalPaginas = $this->numTotalRegistros/10;
		return $this->numTotalPaginas;
	}
	//regresa el numero de pagina
	public function getNumPagina(){
		return $this->pagina;
	}
}
?>