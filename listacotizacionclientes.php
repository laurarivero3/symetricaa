<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
    crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css">
  </head>
  <body>
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar bg">
                <div class="container-fluid">
                  <a class="navbar-brand" href="#">SYMETRICA</a>
                  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="prueba.html">Inicio</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="producto.html">Productos</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="nosotros.html">Nosotros</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="cotizacion.html">Cotización cliente</a>
                      </li>
                      <li class="nav-item">
                      <a class="nav-link" href="listapedidosDV1.php">Detalle de Venta</a>
                    </li>
                      <li class="nav-item">
                        <a class="nav-link" href="CotizarProductos.html">Cotización Prodcutos</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Administrador
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="listaregistrocliente.php">Listas de clientes</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="listacompraxmaypr.php">Lista de Compras Por Mayor</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="listarproveedores.php">Listas de Proveedores</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="listacotizacionclientes.php">Lista cotizacion</a></li>
                        </ul>
                  </div>
                </div>
              </nav>    
        </div>
    </header>
<body>
    <h2>Cotizacion De Cliente</h2>

    
<!-- inicio de tabla -->
<table class="table">
  <thead>
    <tr>
      <th scope="col">CodC</th>
      <th scope="col">Ancho</th>
      <th scope="col">Largo</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Producto</th>
      <th scope="col">Precio</th>
      <th scope="col">Cliente</th>
      <th scope="col">Empleado</th>
      <th scope="col">Acción</th>         
    </tr>
  </thead>
  <tbody>
    <?php
    require_once "conexion.php";
    $sql = "SELECT C.Coti, C.Ancho, C.Largo, C.Cantidad, P.productos AS Producto, P.precio AS Precio, CL.nombre AS Cliente, E.Nombre AS Empleado
    FROM Cotizacion C
    JOIN productos P ON C.COP = P.COP
    JOIN cliente CL ON C.CodC = CL.CodC
    JOIN empleados E ON C.CodEm = E.CodEm;";
    $rtabla = $conex->query($sql);
    $subtotal = 0;
    if ($rtabla->num_rows > 0) {
        while ($r = $rtabla->fetch_assoc()) {
            $cantidad = $r['Cantidad'];
            $precioUnitario = $r['Precio'];
            $total = $cantidad * $precioUnitario;
            $subtotal += $total;
    ?>
        <tr>
            <th scope="row"><?php echo $r['Coti']; ?></th>
            <td><?php echo $r['Ancho']; ?></td>
            <td><?php echo $r['Largo']; ?></td>
            <td><?php echo $cantidad; ?></td>
            <td><?php echo $r['Producto']; ?></td>
            <td><?php echo $precioUnitario; ?></td>
            <td><?php echo $r['Cliente']; ?></td>
            <td><?php echo $r['Empleado']; ?></td>
            <td><button class="btn btn-danger btn-borrar" data-coti="<?php echo $r['Coti']; ?>">Borrar</button></td>
        </tr>
    <?php
        }
    } else {
        echo "<tr><td colspan='9'>No hay resultados</td></tr>";
    }
    ?>
  </tbody>
</table>

<!-- Calculo del subtotal y total -->
<?php
$total = number_format($subtotal, 2);
?>

<!--<p>Total a pagar: Bs <?php echo $total; ?></p>-->
<button id="btn-finalizar" class="btn btn-primary">Enviar Cotizacion</button> 

<script>


  // Borrar datos al hacer clic en el botón "Borrar"
  const deleteButtons = document.querySelectorAll(".btn-borrar");
  deleteButtons.forEach(function(button) {
    button.addEventListener("click", function() {
      const coti = button.getAttribute("data-coti");

      /// Borrar datos al hacer clic en el botón "Borrar"
const deleteButtons = document.querySelectorAll(".btn-borrar");
deleteButtons.forEach(function(button) {
  button.addEventListener("click", function() {
    const coti = button.getAttribute("data-coti");

    // Realizar una solicitud AJAX al servidor para eliminar los datos de la cotización
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "eliminardatos.php", true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // La solicitud se completó y los datos se eliminaron correctamente
        // Aquí puedes realizar cualquier acción adicional, como actualizar la tabla o mostrar un mensaje al usuario
        location.reload(); // Recargar la página para mostrar los cambios actualizados
      }
    };
    xhr.send("coti=" + encodeURIComponent(coti));
  });
});
    });
  });
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
crossorigin="anonymous"></script>
</body>
</html>