<?php
$host = '127.0.0.1:3309';
$usuario = 'root';
$password = '';
$db = 'bd_programaa';
$conex = new mysqli($host, $usuario, $password, $db);

if ($conex->connect_error) {
    die('Error al conectar a la base de datos: ' . $conex->connect_error);
}

if (!empty($_POST['btningresar'])) {
    if (empty($_POST['username']) || empty($_POST['password'])) {
        echo '<div>Los campos están vacíos</div>';
    } else {
        $Usuario = $_POST['username'];
        $Clave = $_POST['password'];
        $sql = "SELECT Usuario, Clave FROM Usuarios;";
        $result = $conex->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                if ($row['Usuario'] === $Usuario && $row['Clave'] === $Clave) {
                    echo 'Inicio de sesión exitoso';
                    header('Location: prueba.html');
                    break;
                }
            }
            echo 'Usuario o contraseña incorrectos';
        } else {
            echo 'No se encontraron usuarios registrados';
        }
    }
    $conex->close();
}
?>