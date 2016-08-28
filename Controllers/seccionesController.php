<?php namespace Controllers;
	use Models\Seccion as Seccion;
	class seccionesController
	{
		private $seccion;
		public function __construct()
		{
			$this->seccion = new Seccion();
		}
		public function index()
		{
			$datos = $this->seccion->listar();
			return $datos;
		}

		function agregar()
		{

			if ($_POST)
			{
				//sanitizar? 
				$this->seccion->set("nombre", $_POST['nombre']);
				$this->seccion->add();
				header("Location: ".URL."secciones");
			}
		}

		function editar($id)
		{
			if ($id)
			{


				$this->seccion->set("id", $id);
				if ($_POST)
				{
					$this->seccion->set("nombre", $_POST['nombre']);
					$this->seccion->edit();
					header("Location: ".URL."secciones");
				}
				else
				{
					$datos = $this->seccion->view();
					return $datos;
				}
			}
			else
			{
				header("Location: ".URL."secciones");
			}
		}

		function eliminar($id)
		{
			if ($id)
			{
				$this->seccion->set("id", $id);
				$this->seccion->delete();
			}

			header("Location: ".URL."secciones");
		}		
	}

	$secciones = new seccionesController();
 ?>