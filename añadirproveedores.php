<?php
$host = "127.0.0.1:3309";
$usuario = "root";
$password = "";
$db = "bd_programaa";
$conex = new mysqli($host, $usuario, $password, $db);

// Verificar la conexión
if ($conex->connect_error) {
    die("Error de conexión a la base de datos: " . $conex->connect_error);
}

// Consulta para obtener los proveedores
$sql = "SELECT * FROM Proveedores";
$result = $conex->query($sql);

// Verificar si se encontraron resultados
$proveedores = array();
if ($result->num_rows > 0) {
    // Construir el array de proveedores
    while ($row = $result->fetch_assoc()) {
        $proveedores[] = $row;
    }
}

// Cerrsar la conexión a la base de datos
$conex->close();

// Enviar los datos de los proveedores en formato JSON
header('Content-Type: application/json');
echo json_encode($proveedores);
?>