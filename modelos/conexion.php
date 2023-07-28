<?php

	class Conexion{

		public function conectar(){

			$link = new PDO("mysql:host=localhost;dbname=dbmovilidad-cet13","root","");

			$link -> exec("set names utf8");

			return $link;
		}

	}