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
                        <a class="nav-link dropdown-toggle" href="" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                          Administrador
                        </a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="listaregistrocliente.php">Listas de clientes</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="listacompraxmaypr.php">Lista de Compras Por Mayor</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="listarproveedores.php">Listas de Proveedores</a></li>
                          <li><hr class="dropdown-divider"></li>
                          <li><a class="dropdown-item" href="listacotizacionclientes.php">Listas de Detalle venta</a></li>
                        </ul>
                  </div>
                </div>
              </nav>    
        </div>
    </header>



    <section class="Contactos bg-info">
      <h2 class="text-center">Registrate </h2>
      <div class="container">
        <form action="registro.php" method="post">
          <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label"> Nombre: </label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name="nomper" id="Nombre" >
          </div>
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Telelfono: </label>
            <input type="text" class="form-control"  aria-describedby="emailHelp" name="apeper" id="telelfono">
          </div>
          <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"> Dirección: </label>
              <input type="text" class="form-control" aria-describedby="emailHelp" name="dirper" id="Direccion">          
            </div>


            <form method="post" action="">
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Asunto:</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" name="Asunto" id="Asunto">          
              </div>      
              <button type="submit" class="btn btn-outline-success">Enviar</button>
              <button type="reset" class="btn btn-outline-danger">Limpiar Datos</button>
            </form>
            <div class="wpcf7-response-output" role="alert" aria-hidden="true"></div>


        </form>
      </div>

    </section>



    

  <footer >
    <p>&copy ; 2024 Empresa de Vidrios </p>
  </footer>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
    crossorigin="anonymous"></script>
  </body>
</html>