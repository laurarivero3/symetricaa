<?php
// Procesar y guardar los datos del formulario en la base de datos

// Realizar consulta para obtener todos los pedidos guardados
$consulta = "SELECT * FROM pedidos";
$resultado = mysqli_query($conexion, $consulta); // Reemplaza 'conexion' con tu variable de conexión a la base de datos

// Imprimir la tabla con los datos de los pedidos
echo "<table>";
echo "<tr><th>ID</th><th>Fecha de Pedido</th><th>Fecha de Entrega</th><th>Total</th><th>Código de Cliente</th><th>Código de Empleado</th></tr>";
while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>".$fila['id']."</td>";
    echo "<td>".$fila['fechaPedido']."</td>";
    echo "<td>".$fila['fechaEntrega']."</td>";
    echo "<td>".$fila['total']."</td>";
    echo "<td>".$fila['codCliente']."</td>";
    echo "<td>".$fila['codEmpleado']."</td>";
    echo "</tr>";
}
echo "</table>";

// Cerrar la conexión a la base de datos
mysqli_close($conexion);
?>