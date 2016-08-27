<?php namespace Controllers;
	//buscar clase para convertir imagen a 50x50
	use Models\Estudiante as Estudiante;
	use Models\Seccion as Seccion;
	use Models\ImageResize as ImageResize; 

	class estudiantesController
	{
		private $estudiante;
		private $seccion;
		public function __construct()
		{
			$this->estudiante = new Estudiante();
			$this->seccion = new Seccion();
		}
		public function index()
		{
			$datos = $this->estudiante->listar();
			return $datos;
		}

		public function agregar()
		{
			if (!$_POST)
			{
				$datos = $this->seccion->listar();
				return $datos;
			}
			else
			{
				$permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
				$limite = 700;

				if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024)
				{

					$nombre = date('i-s').$_FILES['imagen']['name'];

					$ruta = "Views". DS. "template".DS."imagenes".DS."avatars".DS.$nombre;

					move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta);

					ImageResize::smart_resize_image($ruta, "", 50, 50, false, $ruta, true, false, 100, false);
					$this->estudiante->set('nombre', $_POST['nombre']);
					$this->estudiante->set('edad', $_POST['edad']);
					$this->estudiante->set('promedio', $_POST['promedio']);
					$this->estudiante->set('imagen', $nombre);
					$this->estudiante->set('id_seccion', $_POST['id_seccion']);
					$this->estudiante->add();
					header("Location: ".URL."estudiantes");
																			
				}
			}
		}

		public function editar($id)
		{
			$this->estudiante->set("id", $id);
			if (!$_POST)
			{
				
				$datos = $this->estudiante->view();

				return $datos;
			}
			else
			{
				/*$permitidos = array("image/jpeg", "image/png", "image/gif", "image/jpg");
				$limite = 700;

				if (in_array($_FILES['imagen']['type'], $permitidos) && $_FILES['imagen']['size'] <= $limite * 1024)
				{

					$nombre = date('i-s').$_FILES['imagen']['name'];

					$ruta = "Views". DS. "template".DS."imagenes".DS."avatars".DS.$nombre;


					var_dump(move_uploaded_file($_FILES['imagen']['tmp_name'], $ruta));*/
				$this->estudiante->set('nombre', $_POST['nombre']);
				$this->estudiante->set('edad', $_POST['edad']);
				$this->estudiante->set('promedio', $_POST['promedio']);
				//$this->estudiante->set('imagen', $nombre);
				$this->estudiante->set('id_seccion', $_POST['id_seccion']);
				$this->estudiante->edit();

				header("Location: ".URL."estudiantes");
																			
				//}							

			}


		}


		public function ver($id)
		{
			if ($id)
			{
				//mostrar datos del $id

				$this->estudiante->set("id", $id);
				$datos = $this->estudiante->view();
				return $datos;
			}
			else
			{
				header("Location: ".URL."estudiantes");
			}
		}
		public function eliminar($id)
		{
			if ($id)
			{
				$this->estudiante->set("id", $id);
				$this->estudiante->delete();
			}

			header("Location: ".URL."estudiantes");
		}

		public function listarSecciones()
		{
			$datos = $this->seccion->listar();
			return $datos;
		}
	}

	$estudiantes = new estudiantesController();
 ?>