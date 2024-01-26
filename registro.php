<?php
require_once "conexion.php";

$nombre = $_POST['nomper'];
$telefono = $_POST['apeper'];
$direccion = $_POST['dirper'];

$sql = "INSERT INTO cliente (nombre, telefono, direccion) VALUES ('$nombre', '$telefono', '$direccion')";

$conex->query($sql);
$conex->close();

header('Location: prueba.html');
exit;

?>