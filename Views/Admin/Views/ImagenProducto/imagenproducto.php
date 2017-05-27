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
        <form action="../../../../Controller/ControllerImagenProducto.php" id="add-form" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
        <input type="hidden" name="idUser" value="<?=$_SESSION['idUsuario'];?>"></input>
        <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="descripcionI" class="validate" required>
                <label for="icon_prefix">Descripcion de la imagen</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 selectProducto">  
              </div>
            </div>
             <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input name="uploadFile" type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="inputImage" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</button>
        </div>
        </form>
      </div>

      <div id="modal2" class="modal">
        <form action="../../../../Controller/ControllerImagenProducto.php" id="edit-form" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
        <input type="hidden" name="idUser" value="<?=$_SESSION['idUsuario'];?>"></input>
        <input type="hidden" name="idProducto" value=""></input>
        <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="descripcionEditar" class="validate" required>
                <label for="icon_prefix"></label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 selectProductoEditar">  
              </div>
            </div>
             <div class="file-field input-field">
              <div class="btn">
                <span>File</span>
                <input name="uploadFile" type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" name="inputImageEditar" class="modal-action modal-close waves-effect waves-green btn-flat">Agree</button>
        </div>
        </form>
      </div>

<div class="row">

  <div class="col s3">
	<ul id="slide-out" class="side-nav fixed">
	  <li class="titulo">Tablas</li>
      <li ><a href="../../admin.php">Ciudad</a></li>
      <li><a href="../Cliente/cliente.php">Cliente</a></li>
      <li><a href="../DetalleFac/detallefac.php">Detalle Factura</a></li>
      <li><a href="../DetalleFacCompra/detallefaccompra.php">Detalle Factura Compra</a></li>
      <li><a href="../DetalleVentaServicio/detalleventaservicio.php">Detalle Venta Servicio</a></li>
      <li><a href="../Factura/factura.php">Factura</a></li>
      <li><a href="../FacturaCompra/facturacompra.php">Factura Compra</a></li>
      <li><a href="../FacturaServicio/facturaservicio.php">Factura Servicio</a></li>
      <li><a href="../FormaPago/formapago.php">Forma Pago</a></li>
      <li class="selected"><a href="../ImagenProducto/imagenproducto.php">Imagen Producto</a></li>
      <li><a href="../ImagenProyecto/imagenproyecto.php"">Imagen Proyecto</a></li>
      <li><a href="../Producto/producto.php">Producto</a></li>
      <li><a href="../Proovedor/proovedor.php">Proovedor</a></li>
      <li><a href="../Proyecto/proyecto.php">Proyecto</a></li>
      <li><a href="../Usuario/usuario.php">Usuario</a></li>
    </ul>
    </div>

    <div class="col s9">
      <h3>Imagen Producto</h3>
     <a class="waves-effect waves-light btn agregarButton" href="#modal1">Agregar</a>
     <table class="tablaDatos">
        <thead>
          <tr>
              <th>idImagenProducto</th>
              <th>Descripcion</th>
              <th>Imagen</th>
              <th>idProducto</th>
              <th>nombreProducto</th>
              
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