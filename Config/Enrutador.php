<?php namespace Config;
	class Enrutador
	{
		public static function run($request)
		{
			$controlador = $request->getControlador()."Controller";  
			$ruta = ROOT. "Controllers" . DS. $controlador.".php";
			
			$metodo = $request->getMetodo();
			$argumento = $request->getArgumento();

			if (is_readable($ruta))
			{
				require_once($ruta);

				$mostrar = "Controllers\\".$controlador;
				$controlador = new $mostrar;
				if (!isset($argumento))
				{
					$datos = call_user_func(array($controlador, $metodo));
				}
				else
				{
					$datos = call_user_func(array($controlador, $metodo), $argumento);
				}


			}

			//Cargar vista
			$ruta = ROOT . "Views" . DS .$request->getControlador(). DS. $request->getMetodo().".php" ;
		
			if (is_readable($ruta))
			{
				require_once($ruta);
			}
			else
			{
			}
		}
	}

?>