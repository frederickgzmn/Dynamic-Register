<?php
#####################################################################################################
# Creador Frederick Guzman Santana																	#
# Email: xrakion@gmail.com																			#
# Script: Dynamic Register																			#
# VERSION 1.5.3																						#
# CREACION:					25/Julio/2012															#												#
#---------------------------------------------------------------------------------------------------#
#####################################################################################################
# Navegador testeado: Mozilla 5-9 100%	PHP5.3					 									#
#####################################################################################################
# Muestra de imagenes																				#
#####################################################################################################
# Este archivo muestra las imagenes o fotos integradas en la base de datos							#
#####################################################################################################

session_start();
require_once("class/conexion.class.php");
require_once("class/usuarios.class.php");
$Usuarios = new Usuarios();

if(isset($_SESSION["usuario"])){
	$dat = $Usuarios->detall_usuario($_SESSION["usuario"]);

	while($datos = mysql_fetch_array($dat)){
		echo $datos['cod_archivo'];
		header("Content-type: ".$datos['extension']);
	}
}



?>