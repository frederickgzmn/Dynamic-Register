<?php
#####################################################################################################
# Creador Frederick Guzman Santana																	#
# Email: xrakion@gmail.com																			#
# Script: Dynamic Register																			#
# VERSION 1.5.3																						#
# CREACION:					25/Julio/2012															#
#####################################################################################################
$con = new Conexion();
class Conexion
	{
		var $enlace;
		var $servidor;
		var $usuario;
		var $clave;
		var $base_datos;
		
		function __construct()
		{
			$this->servidor = 'localhost';
			$this->usuario = 'root';
			$this->clave = '123';
			$this->base_datos = 'pruebas';
			$this->conectar();
		}
			
		function conectar()
		{
			//Conectando con la base de datos
			$conector = mysql_connect($this->servidor,$this->usuario,$this->clave);
			if(!$conector){
				die('Conexion fallida : ' . mysql_error());
			}else{
				mysql_select_db($this->base_datos,$conector);
				$this->enlace = $conector;
			}
		}

		function __destruct(){
			//Destruimos la conexion
			mysql_close($conector);
		}
	}



?>