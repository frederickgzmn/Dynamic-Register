<?php
#####################################################################################################
# Creador Frederick Guzman Santana																	#
# Email: xrakion@gmail.com																			#
# Script: Dynamic Register																			#
# VERSION 1.5.3																						#
# CREACION:					25/Julio/2012															#
#####################################################################################################

class Usuarios{
	//Metodo que comprueba los usuarios existentes
	function comp_usuario($usuario){
		$q = "select t.usuario from usuarios t where t.usuario='".$usuario."'";
		$query = mysql_query($q);
		$contador = mysql_num_rows($query);
		if($contador>0){
			return "true";
		}else{
			return "false";
		}
	}
	//Metodo que inserta los usuarios en la DB
	function Usuario_Insert($usuario,$nombre,$apellido,$fec_nac,$email,$passwd){
		//Convirtiendo Passwd en md5
		$passwd = md5($passwd);
		$q = "insert into usuarios (usuario,nombre,apellido,fec_nac,email,passwd) values ('".$usuario."','".$nombre."','".$apellido."','".$fec_nac."','".$email."','".$passwd."')";
		$query = mysql_query($q);
		//Enviamos el email con la funcion envio_email
		$this->envio_email($email);
		return "true";
	}

	//Metodo que sube los archivos a la base de datos
	function Archivo_Up($usuario,$array_file){
		$archivo = $array_file['tmp_name'];
		$q = "insert into fotos (usuario,cod_archivo,nombre_arch,extension) values ('".$usuario."','".mysql_escape_string(file_get_contents($archivo))."','".$array_file['name']."','".$array_file['type']."')";
		$query = mysql_query($q);
		return "true";
	}
	//Metodo utilizado para el envio de emails
	function envio_email($correo){
		// Mensaje
		$mensaje = "Te damos la bienvenida al sistema de registro. <br> PruebaIKEA";
		//Titulo del mensaje
		$titulo = 'Bienvenido al sistema';
		//Enviando mensaje
		mail($correo, $titulo, $mensaje);
	}
	
	//Metodo que muestra los datos del usuario
	function detall_usuario($usuario){
		$q = "select * from usuarios u
		left join fotos f on u.usuario=f.usuario where u.usuario = '".$usuario."'";
		$query = mysql_query($q);
		return $query;
	}
}
?>