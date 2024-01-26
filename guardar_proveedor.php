<?php
require_once "conexion.php";

$nombre = $_POST['nombre'];
$telefono = $_POST['telefono'];
$producto = $_POST['producto'];

$sql = "INSERT INTO Proveedores (Nombre, Telefono, COP) VALUES ('$nombre', '$telefono', '$producto')";

$conex->query($sql);
$conex->close();

header('Location: CotizarProductos.html');
exit;

?>



