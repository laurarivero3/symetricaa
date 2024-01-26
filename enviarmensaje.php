<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $asunto = $_POST['Asunto'];
  
  // Dirección de correo del empleado
  $destinatario = 'laurarivero312@gmail.com';
  
  // Construir el mensaje del correo
  $mensaje = "Nuevo mensaje del cliente:\r\n";
  $mensaje .= "Asunto: " . $asunto . "\r\n";
  
  // Enviar el correo
  $resultado = mail($destinatario, "Nuevo mensaje del cliente", $mensaje);
  
  if ($resultado) {
    echo "El mensaje se ha enviado correctamente al empleado.";
  } else {
    echo "Ocurrió un error al enviar el mensaje.";
  }
}
?>