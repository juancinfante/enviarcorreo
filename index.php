<?php 

$errores = '';
$enviado = '';

if(isset($_POST['submit'])){ // comprobamos si el usuario envio algo 
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];


   // COMPROBAMOS EL CORREO Y EL MENSAJE 

	if(!empty($nombre)) { // comprobamos si hay contenido			} COMPROBAMOS SI 
		$nombre = trim($nombre); // quita los espacios				} EL USUARIO 
		$nombre = filter_var($nombre, FILTER_SANITIZE_STRING); //   } PUSO BIEN EL NOMBRE
	}else{
		$errores .='Por favor ingresa un nombre <br/>'; // concatenamos el texto de 														$errores con este.
	}

	if (!empty($correo)) {
		$correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

		if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){	// valida si es correcto el 													correo, en caso de serlo, 													devuelve el correo. En casa de no 														serlo, devuelve false.
			$errores .= 'Por favor ingresa un correo valido <br/>';
			}
		}
		else{
			$errores .= 'Por favor ingresa un correo <br/>';
	}

	// COMPROBAMOS EL MENSAJE

	if (!empty($mensaje)) {
		
		$mensaje = htmlspecialchars($mensaje);
		$mensaje = trim($mensaje);
		$mensaje = stripcslashes($mensaje);
	
	}else{
		$errores .= 'Por favor ingresa el mensaje';
	}

	if(!$errores){ // preguntamos si no hay errores

		$enviar_a = 'juaninfantejj@outlok.com';
		$asunto = 'Correo enviado desde miPagina.com';
		$mensaje_preparado = "De: $nombre \n";
		$mensaje_preparado .= "Correo: $correo \n";
		$mensaje .= "Mensaje: $mensaje";

		mail($enviar_a, $asunto, $mensaje_preparado);
		$enviado = true;
	}

}

require 'index.view.php';


 ?>