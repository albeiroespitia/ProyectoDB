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
      <li class="selected"><a href="Views/Ciudad/ciudad.php">Ciudad</a></li>
      <li><a href="#!">Cliente</a></li>
      <li><a href="#!">Detalle Factura</a></li>
      <li><a href="#!">Detalle Factura Compra</a></li>
      <li><a href="#!">Detalle Venta Servicio</a></li>
      <li><a href="#!">Factura</a></li>
      <li><a href="#!">Factura Compra</a></li>
      <li><a href="#!">Factura Servicio</a></li>
      <li><a href="#!">Forma Pago</a></li>
      <li><a href="#!">Imagen Producto</a></li>
      <li><a href="#!">Imagen Proyecto</a></li>
      <li><a href="#!">Producto</a></li>
      <li><a href="#!">Proovedor</a></li>
      <li><a href="#!">Proyecto</a></li>
      <li><a href="#!">Servicio</a></li>
      <li><a href="#!">Tipo Producto</a></li>
      <li><a href="#!">Tipo Servicio</a></li>
      <li><a href="#!">Tipo Usuario</a></li>
      <li><a href="#!">Usuario</a></li>
    </ul>
    </div>

    <div class="col s9">
      <h3>Ciudad</h3>
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