<?php

require_once "conexion.php";

$ancho = $_POST['ancho'];
$largo = $_POST['largo'];
$cantidad = $_POST['cantidad'];
$cop = $_POST['producto'];
$codC = $_POST['cliente'];
$codEm = $_POST['empleado'];

$sql = "INSERT INTO Cotizacion (Ancho, Largo, Cantidad, COP, CodC, CodEm) VALUES ('$ancho', '$largo', '$cantidad', $cop, $codC, $codEm)";
$conex->query($sql);
$conex->close();

header('Location: cotizacion.html');
exit;
?>