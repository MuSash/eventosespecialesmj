<?php

require_once("controllers/errores.php");

class Ruteador
{
	
	function __construct()
	{
		$this->iniciar();
	}

	function iniciar()
	{
		//Recoger la variable URL enviado por GET
		//y darle FORMATO

		// condicion ? verdadero : falso
		$url = isset($_GET["url"]) ? $_GET["url"] : "main";
													//Controlador por defecto

		//Eliminar el "/" final
		$url = rtrim($url, "/");

		//Subdividir la URL
		$url = explode("/", $url);

		//Invocar a los CONTROLADORES

		$fileName = "controllers/" . $url[0] . ".php";

		if(file_exists($fileName))
		{
			//Incluir el archivo del controlador
			require_once($fileName);

			//Instanciar el CONTROLADOR
			$controlador = new $url[0];

			//Invocar al METODO
			if(isset($url[1])){
				//Ejecutar el metodo
				//obj->metodo()
				$controlador->{$url[1]}();
							//Colocar la variable entre llaves
							//para considerar el valor como variable
			}

			//Mostrar VISTA del CONTROLADOR
			$controlador->mostrarVista();

		}
		else
		{
			$controlador = new Errores();
			$controlador->mostrarVista();

		}
	}
}


?>