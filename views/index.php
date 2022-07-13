<?php
	//Inlcuir el CONFIG
	require_once("config/config.php");

	//Incluir el Controlador PADRE
	require_once("class/controlador.php");

	//Incluir el ruteador
	require_once("class/ruteador.php");

	//Instanciar la clase
	$ruteador = new Ruteador();	

?>