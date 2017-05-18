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
     <button class="agregarButton"><a href="" class="agregar">Agregar</a></button>
     <table class="tablaDatos">
        <thead>
          <tr>
              <th>idCiudad</th>
              <th>Nombre</th>
          </tr>
        </thead>

        <tbody>
          <tr>
            <td>Alvin</td>
            <td>Eclair</td>
            <td><a href="" class="editar"><i class="material-icons">edit</i></a><a href="" class="borrar"><i class="material-icons">delete</i></a></td>
          </tr>
          <tr>
            <td>Alan</td>
            <td>Jellybean</td>
            <td><a href="" class="editar"><i class="material-icons">edit</i></a><a href="" class="borrar"><i class="material-icons">delete</i></a></td>
          </tr>
          <tr>
            <td>Jonathan</td>
            <td>Lollipop</td>
            <td><a href="" class="editar"><i class="material-icons">edit</i></a><a href="" class="borrar"><i class="material-icons">delete</i></a></td>
          </tr>
        </tbody>
      </table> 
    </div>

     

</div>



	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
</body>
</html>