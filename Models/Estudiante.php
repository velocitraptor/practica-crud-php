<?php namespace Models;
	class Estudiante
	{
		private $id;
		private $nombre;
		private $edad;
		private $promedio;
		private $imagen;
		private $id_seccion;
		private $fecha;
		private $con;

		public function __construct()
		{
			$this->con = new Conexion();
		}

		public function set($atributo, $contenido)
		{
			$this->$atributo = $contenido;

		}

		public function  get($atributo)
		{
			return $this->$atributo;
		}
		public function listar()
		{
			$sql = "SELECT t1.*, t2.nombre AS nombre_seccion FROM estudiantes t1 INNER JOIN secciones t2 ON t1.id_seccion = t2.id"; 
			$datos = $this->con->consultaRetorno($sql);

			return $datos;	
		}

		function add()
		{
			$sql = "INSERT INTO estudiantes (nombre, edad, promedio, imagen, id_seccion, fecha) VALUES ('$this->nombre', $this->edad, $this->promedio, '$this->imagen', $this->id_seccion, NOW());";
			$this->con->consultaSimple($sql);

		}

		function delete()
		{
			$sql = "DELETE FROM estudiantes WHERE id = $this->id";
			$this->con->consultaSimple($sql);
		}

		public function edit()
		{
			$sql = "UPDATE estudiantes SET nombre = '$this->nombre', edad = $this->edad, promedio = $this->promedio, id_seccion = $this->id_seccion WHERE id = $this->id;";
			$this->con->consultaSimple($sql);
		}

		public function view()
		{

			
			$sql = "SELECT t1.*, t2.nombre AS nombre_seccion FROM estudiantes t1 INNER JOIN secciones t2 ON t1.id_seccion = t2.id where t1.id = $this->id"; 
			$datos = $this->con->consultaRetorno($sql);

			//return $datos;	

			return mysqli_fetch_array($datos);
		}
	}
?>