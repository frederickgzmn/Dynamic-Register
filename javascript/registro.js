/*#####################################################################################################
# Creador Frederick Guzman Santana																	#
# Email: xrakion@gmail.com																			#
# Script: Dynamic Register																			#
# VERSION 1.5.3																						#
# CREACION:					25/Julio/2012															#
#####################################################################################################												
#---------------------------------------------------------------------------------------------------#
# Procesador jquery																					#
#####################################################################################################
# Archivo de comprobacion y validacion con php+mysql												#
#####################################################################################################
*/

//Metodo que comprueba el correo electronico introducido por el usuario
function validarEmail(valor) {
	if (/^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/.test(valor)){
		return true;
	}else {
		return false;
	}
}

$(document).ready(function(){
	$("#fec_nac").datepicker({ changeMonth: true, changeYear: true, maxDate: new Date(1990, 1 - 1, 30),dateFormat: "yy-mm-dd" });
	//Comprobando nombre
	$("#nombre").keyup(function(){
		if($(this).val()==""){
			$(this).css("background","red");
			$("#val_nomb").attr("title","incorrecto");
		}else{
			$("#val_nomb").attr("title","correcto");
			$(this).css("background","#00FF00");
		}
	});

	//Comprobando apellido
	$("#apell").keyup(function(){
		if($(this).val()==""){
			$(this).css("background","red");
			$("#val_apell").attr("title","incorrecto");
		}else{
			$("#val_apell").attr("title","correcto");
			$(this).css("background","#00FF00");
		}
	});

	//Comprobando passwd 1
	$("#passwd").keyup(function(){
		if($(this).val()==""){
			$(this).css("background","red");
			$("#val_pwd").attr("title","incorrecto");
		}else{
			$("#val_pwd").attr("title","correcto");
			$(this).css("background","#00FF00");
		}
	});	
	
	//Comprobando el correo electronico
	$("#email").keyup(function(){	
		if($(this).val()==""){
			$(this).css("background","red");
			$("#val_mail").attr("title","incorrecto");
		}else{
			if(validarEmail($(this).val())==true){
				$(this).css("background","#00FF00");
				$("#val_mail").attr("title","correcto");
			}else{
				$(this).css("background","red");
				$("#val_mail").attr("title","incorrecto");
			}
		}
	});	
	
	//Comprobando la password 2
	$("#passwd_again").keyup(function(){	
		if($(this).val()==""){
			$(this).css("background","red");
			$("#val_pwd").attr("title","incorrecto");
		}else{
			if($(this).val()==$("#passwd").val()){
				$("#passwd_again,#passwd").css("background","#00FF00");
				$("#val_pwd").attr("title","correcto");
			}else{
				$("#passwd_again,#passwd").css("background","red");
				$("#val_pwd").attr("title","incorrecto");
			}
		}
	});
	
	//Comprobando la captcha
	$("#captcha").keyup(function(){	
		$.post("procesos.php","accion=compr_catpcha&catp_codigo="+$(this).val(),
		function(data){
			if(data=="true"){
				$("#captcha").css("background","#00FF00");
				$("#val_catp").attr("title","correcto");
			}else{
				$("#captcha").css("background","red");
				$("#val_catp").attr("title","incorrecto");
			}
		});
	});	
	
	//Comprobando el usuario
	$("#codigo_usu").keyup(function(){
		$.post("procesos.php","accion=usuario_comp&usuario="+$(this).val(),
		function(data){
			if(data=="true"){
				$("#codigo_usu").css("background","red");
				$("#val_usu").attr("title","incorrecto");
			}else{
				if($("#codigo_usu").val()==""){
					$("#codigo_usu").css("background","red");
					$("#val_usu").attr("title","incorrecto");
				}else{
					$("#codigo_usu").css("background","#00FF00");
					$("#val_usu").attr("title","correcto");
				}
			}
		});
	});
	
	//Comprobando la fecha de nacimiento
	$("#fec_nac").click(function(){
		var objeto = this;
		$(".ui-state-default").click(function(){
			$(objeto).css("background","#00FF00");
			$("#val_fec").attr("title","correcto");
		});
	});

	//Comprobando los terminos y condiciones
	$("#condic").click(function(){
		if($(this).is(":checked")){
			$("#condictd").css("background","#00FF00");
			$("#condictd").attr("title","correcto");
		}else{
			$("#condictd").attr("title","incorrecto");
			$("#condictd").css("background","red");
		}
	});	
	
	//Enviando registro a ser insertado
	$("#volver").click(function(){
		location.href = "index.php";
	});

	//Enviando registro a ser insertado
	$("#registrar").click(function(){
		
		var validador = 0;
		$(".val").each(function(){
			if($(this).attr("title")=="incorrecto"){
				$(this).css("background","red");
				validador++;
			}else{
				$(this).css("background","");
			}
		});
		
		if(validador==0){
			//Enviando los datos a ser trabajados en php
			$.post("procesos.php","accion=usuario_insert&nombre="+$("#nombre").val()+"&apell="+$("#apell").val()+"&fec_nac="+$("#fec_nac").val()+"&email="+$("#email").val()+"&usuario="+$("#codigo_usu").val()+"&passwd="+$("#passwd").val(),
			function(data){
				if($("#archivo_f").attr("value")!=""){
					//Si el usuario decidio subir una foto, este proceso la subira la base de datos
					//$.setTimeout(function(){
						$('#formulario_registro').submit();
					//});
				}else{
					alert("Los datos fueron cargados correctamente");
					location.href="vista.php?usuario="+$("#codigo_usu").val();
				}
			});
		}else{
			alert("Existen "+validador+" campo(s) incorrecto(s)");
		}
	});
	
});