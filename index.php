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
//Leyendo archivo html
$visual = file_get_contents("registro.html");


//Impresion del archivo
echo $visual;
?>