<?php
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $coti = $_POST["coti"];

  // Realizar la conexión a la base de datos
  $host = "127.0.0.1:3309";
  $usuario = "root";
  $password = "";
  $db = "bd_programaa";
  $conex = new mysqli($host, $usuario, $password, $db);

  // Verificar si hay errores en la conexión
  if ($conex->connect_error) {
    die("Error en la conexión: " . $conex->connect_error);
  }
  // Escapar el valor de $coti para evitar inyección SQL
  $coti = $conex->real_escape_string($coti);
  // Crear la consulta SQL DELETE
  $sql = "DELETE FROM Cotizacion WHERE Coti = '$coti'";
  // Ejecutar la consulta
  if ($conex->query($sql) === TRUE) {
    echo "Los datos se eliminaron correctamente";
  } else {
    echo "Error al eliminar los datos: " . $conex->error;
  }
  // Cerrar la conexión a la base de datos
  $conex->close();
}
?>