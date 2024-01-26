<?php
require_once "conexion.php";

$CodEm = $_POST['CodEm']; //este es el usuario
$Gmail = $_POST['fecha'];
$clave = $_POST['clave'];
$CodEm = $_POST['empleado'];

$sql = "insert into Usuarios (Usuario, Gmail, clave, CodEm)
value('$Usuario', '$Gmail', '$clave', '$codEm')";

$conex->query($sql);
$conex->close();

header('Location: loginregistrarusuario.html');
exit;
?>