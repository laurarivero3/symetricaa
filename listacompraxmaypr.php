<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
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
                                <a class="nav-link" href="CotizarProductos.html">Cotización Productos</a>
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
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>

    <div class="container">
        <h2>Lista de compras por mayor</h2>



        
<!-- inicio de tabla -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">CXM</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha Pedido</th>
            <th scope="col">Nombre Empleado</th>
        </tr>
    </thead>
    <tbody>
        <?php
        require_once "conexion.php";
        $sql = "SELECT c.*, e.Nombre AS NombreEmpleado
                FROM compraxmayor c
                JOIN empleados e ON c.CodEm = e.CodEm;";

        $rtabla = $conex->query($sql);
        if ($rtabla->num_rows > 0) {
            while ($r = $rtabla->fetch_array()) {
                ?>
                <tr>
                    <th scope="row"><?php echo $r['CXM']; ?></th>
                    <td><?php echo $r['cantidad']; ?></td>
                    <td><?php echo $r['FechaPedido']; ?></td>
                    <td><?php echo $r['NombreEmpleado']; ?></td>
                </tr>
                <?php
            }
        } else {
            echo "<tr><td colspan='5'>No hay resultados</td></tr>";
        }
        ?>
    </tbody>
</table>

<!-- fin de tabla -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
  </body>
</html>