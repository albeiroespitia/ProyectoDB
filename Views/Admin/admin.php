<?php 
  session_start();
  if($_SESSION['tipoUsuario']  != 'administrador'){
    header("Location:../../index.php");
    die();
  } 
?>
<!DOCTYPE html>
<html>
<head>
  	<!-- Compiled and minified CSS -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<title>Admin</title>
</head>
<body>

  <div id="modal1" class="modal">
      <div class="modal-content">
        <div class="row">
          <form id="add-form" action="" method="POST" class="col s12">
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="nombreCiudad" class="validate" required>
                <label for="icon_prefix">Nombre de la ciudad</label>
              </div>
            </div>
            <div class="modal-footer">
              <h6 class="error-create"></h6>
              <button id="addButon" type="submit" class="modal-action waves-effect waves-green btn-flat"  name="addButon">Registrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

      <div id="modal2" class="modal">
      <div class="modal-content">
        <div class="row">
          <form id="edit-form" action="" method="" class="col s12">
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix active">account_circle</i>
                <input id="icon_prefix " type="text" name="nuevoNombreCiudad" class="validate" required>
                <label for="icon_prefix" class="active"></label>
              </div>
            </div>
            <div class="modal-footer">
              <h6 class="error-create"></h6>
              <button id="editButton" type="submit" class="modal-action waves-effect waves-green btn-flat"  name="editButon">Editar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

<div class="row">

  <div class="col s3">
	<ul id="slide-out" class="side-nav fixed">
	  <li class="titulo">Tablas</li>
      <li class="selected"><a>Ciudad</a></li>
      <li><a href="Views/Cliente/cliente.php">Cliente</a></li>
      <li><a href="Views/DetalleFac/detallefac.php">Detalle Factura</a></li>
      <li><a href="Views/DetalleFacCompra/detallefaccompra.php">Detalle Factura Compra</a></li>
      <li><a href="Views/DetalleVentaServicio/detalleventaservicio.php">Detalle Venta Servicio</a></li>
      <li><a href="Views/Factura/factura.php">Factura</a></li>
      <li><a href="Views/FacturaCompra/facturacompra.php">Factura Compra</a></li>
      <li><a href="Views/FacturaServicio/facturaservicio.php">Factura Servicio</a></li>
      <li><a href="Views/FormaPago/formapago.php">Forma Pago</a></li>
      <li><a href="Views/ImagenProducto/imagenproducto.php">Imagen Producto</a></li>
      <li><a href="Views/ImagenProyecto/imagenproyecto.php">Imagen Proyecto</a></li>
      <li><a href="Views/Producto/producto.php">Producto</a></li>
      <li><a href="Views/Proovedor/proovedor.php">Proovedor</a></li>
      <li><a href="Views/Proyecto/proyecto.php">Proyecto</a></li>
      <li><a href="Views/Usuario/usuario.php">Usuario</a></li>
    </ul>
    </div>

    <div class="col s9">
      <h3>Ciudad</h3>
      <a href="../../Controller/Action/act_close.php" class="cerrar-sesion">Cerrar Sesion</a>
     <a class="waves-effect waves-light btn agregarButton" href="#modal1">Agregar</a>
     <table class="tablaDatos">
        <thead>
          <tr>
              <th>idCiudad</th>
              <th>Nombre</th>
          </tr>
        </thead>
        <tbody class="cuerpoTabla">
          
        </tbody>
      </table> 
    </div>

     

</div>



	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
    <script type="text/javascript" src="js/initialization.js"></script>
</body>
</html>