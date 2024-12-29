<?php
	/**
	 * 
	 */
	include_once('objeto_blog.php');
	
	class Manejo_objeto 
	{
		private $conexion;
		public function __construct($conexion)
		{
			// establece la conexion.
			$this->setConexion($conexion);
		}
		public function setConexion(PDO $conexion)
		{
			$this->conexion=$conexion;
		}
		public function getContenidoPorFecha()
		{
			$matriz=array();
			$contador=0;
			$contenido=$this->conexion->query("SELECT * FROM contenido ORDER BY fecha");
			while($registro=$contenido->fetch (PDO::FETCH_ASSOC))
			{
				$blog =new Objeto_blog();
				$blog->setId($registro['id']);
				$blog->setTitulo($registro['titulo']);
				$blog->setComentario($registro['comentario']);
				$blog->setFecha($registro['fecha']);
				$blog->setImagen($registro['imagen']);
				$matriz[$contador]=$blog;
				$contador ++;

			}
			return $matriz;


		}
		//el parametro Objeto_blog es el nombre la una clase de tipo  blog y la variable $blog, es un objeto
		public function setContenido(Objeto_blog $blog)
		{
			$sql="INSERT INTO contenido (titulo,comentario,fecha,imagen)VALUES('".$blog->getTitulo()."','".$blog->getComentario()."','".$blog->getFecha()."','".$blog->getImagen()."')";
			$this->conexion->exec($sql);
		}
	}
	
?>