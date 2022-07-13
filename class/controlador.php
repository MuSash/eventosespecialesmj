<?php

class Controlador
{
	
	function __construct()
	{
		
	}

	function cargarModelo($nombre)
	{

		//Generar el nombre del archivo
		$fileName = "models/" . $nombre . ".php";

		//inlcuir el archivo
		require_once($fileName);

		//Instanciar el modelo
		$modelo = new $nombre();

		//Retornar el MODELO
		return $modelo;
	} 

	/*
	function mostrarVista($nombre)
	{
		//Codigo para mostrar la Vista
		//Generar el nombre de la vista: views/consulta/index.php
		$fileName = "views/" . $nombre . ".php";

		//Incluir el archivo (codigo) de la vista
		require_once("$fileName");

	}
	*/
}

?>