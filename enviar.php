<?php  
if(!empty($_POST)){
	// Llamando a los campos
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$telefono = $_POST['telefono'];
	$mensaje = $_POST['mensaje'];
	$captcha = $_POST['g-recaptcha-response'];
		
		$secret = '6Lc8DKsUAAAAAM9YlD4YE_ZRt6iVBVP53Cuw-APi';
		
		if(!$captcha){

			echo "Por favor verifica el captcha";
			
			} else {
			
			$response = file_get_contents("https://www.google.com/recaptcha/api/siteverify");
			
			$arr = json_decode($response, TRUE);
			
			if($arr['success'])
			{
				echo '<h2>Gracias</h2>';
				} else {
				echo '<h3>Error al comprobar Captcha </h3>';
			}
		}
}
// Datos para el correo
$destinatario = "contacto@massin.cl";
$asunto = "Contacto desde nuestra web";

$carta = "De: $nombre \n";
$carta .= "Correo: $correo \n";
$carta .= "Telefono: $telefono \n";
$carta .= "Mensaje: $mensaje";

// Enviando Mensaje
mail($destinatario, $asunto, $carta);
header('Location:contacto.html');

?>


