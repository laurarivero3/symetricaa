<?php
require_once "conexion.php";

$cantidad = $_POST['cantidad'];
$fechaPedido = $_POST['fecha'];
$codEm = $_POST['empleado'];

$sql = "INSERT INTO compraxmayor (cantidad, FechaPedido, CodEm) VALUES ('$cantidad', '$fechaPedido', '$codEm')";

$conex->query($sql);
$conex->close();

header('Location: CotizarProductos.html');
exit;
?>