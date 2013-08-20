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
# Imagen catpcha																					#
#####################################################################################################
# Este archivo muestra las imagen de la catpcha														#
#####################################################################################################

session_start();
$CodCaptcha = md5(microtime()); 
$CodCaptcha = substr($CodCaptcha, 0, 7);
$_SESSION['cod_captcha'] = $CodCaptcha;

$imagencarga = imagecreatefrompng("javascript/css/ui-lightness/images/captcha.png"); 
$colores = imagecolorallocate($imagencarga, 255, 255, 255); 
imagestring($imagencarga, 5, 5, 5, $CodCaptcha, $colores); 
header("Content-type: image/png");
imagepng($imagencarga);

?>