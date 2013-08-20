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

//Proceso que comprueba si el usuario existe o no en la DB
if(isset($_POST['accion']) and $_POST['accion']=="usuario_comp"){
	echo $usu_datos = $Usuarios->comp_usuario($_POST['usuario']);
}

//Proceso que compruebala si la catpcha es correcta
if(isset($_POST['accion']) and $_POST['accion']=="compr_catpcha"){
	if($_POST['catp_codigo']==$_SESSION['cod_captcha']){
		echo "true";
	}else{
		echo "false";
	}
}

//Proceso que compruebala si la catpcha es correcta
if(isset($_POST['accion']) and $_POST['accion']=="usuario_insert"){
	$ResultadoInsert = $Usuarios->Usuario_Insert($_POST['usuario'],$_POST['nombre'],$_POST['apell'],$_POST['fec_nac'],$_POST['email'],$_POST['passwd']);
	echo $ResultadoInsert;
}


//Proceso que sube los archivos a la base de datos
if(isset($_POST['codigo_usu']) and isset($_FILES["archivo_f"]["name"])){
	$archivup = $Usuarios->Archivo_Up($_POST['codigo_usu'],$_FILES["archivo_f"]);
	if($archivup=="true"){
		$_SESSION["usuario"]=$_POST['codigo_usu'];
		echo "<script>alert('Los datos fueron cargados correctamente'); 
		location.href='vista.php?usuario=".$_POST['codigo_usu']."';</script>";	
	}else{
		echo "<script>alert('Los datos fueron cargados correctamente, pero el archivo contenia un error, y no fue subido a la base de datos');
		location.href='vista.php?usuario=".$_POST['codigo_usu']."';</script>"; 
	}
}


?>