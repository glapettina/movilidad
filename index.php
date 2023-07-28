<?php

	require_once "controladores/plantilla.controlador.php";
	require_once "controladores/usuarios.controlador.php";
	require_once "controladores/ciudades.controlador.php";
	require_once "controladores/movilidades.controlador.php";
	require_once "controladores/transportes.controlador.php";

	require_once "modelos/usuarios.modelo.php";
	require_once "modelos/ciudades.modelo.php";
	require_once "modelos/movilidades.modelo.php";
	require_once "modelos/transportes.modelo.php";

	$plantilla = new ControladorPlantilla();
	$plantilla -> ctrPlantilla();