<?php
#####################################################################################################
# Creador Frederick Guzman Santana																	#
# Email: xrakion@gmail.com																			#
# Script: Dynamic Register																			#
# VERSION 1.5.3																						#
# CREACION:					25/Julio/2012															#
#####################################################################################################
# Navegador testeado: Mozilla 5-9 100%	PHP5.3					 									#
# Para realizar los envios de correo electronicos, el servidor donde esta aplicacion este siendo	#
# corrida, debe tener activo los servicios SMTP correctamente configurados.							#
#####################################################################################################
# Configuracion de base de datos............. Archivo: conexion.class.php 							# 
#####################################################################################################
# Archivo de la DB............. Archivo: DB MySQL/pruebas.sql			 							# 
#####################################################################################################


session_start();
require_once("class/conexion.class.php");
require_once("class/usuarios.class.php");
$Usuarios = new Usuarios();
//Leyendo archivo html
$visual = file_get_contents("vista.html");

if(isset($_GET["usuario"])){
	//datos del usuario
	$dat = $Usuarios->detall_usuario($_GET["usuario"]);
	//seteamos la session para que muestre la imagen del usuario
	$_SESSION["usuario"]=$_GET["usuario"];
	while($datos = mysql_fetch_array($dat)){
		$visual = str_replace("{usucodigo}",$datos['usuario'],$visual);
		$visual = str_replace("{nombre}",$datos['nombre'],$visual);
		$visual = str_replace("{apell}",$datos['apellido'],$visual);
		$visual = str_replace("{fec_nac}",$datos['fec_nac'],$visual);
		$visual = str_replace("{email}",$datos['email'],$visual);
		$visual = str_replace("{foto}",$datos['nombre_arch'],$visual);
	}
//Impresion del archivo
echo $visual;
	
}

?>

