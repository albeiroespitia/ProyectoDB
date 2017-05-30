<?php 
  session_start();
  if(isset($_SESSION['tipoUsuario'])){
      if($_SESSION['tipoUsuario'] == 'ingeniero'){
        header("Location: ../EngineerView/engineer.php");
      }
  }
  
?>

<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="./css/styles.css">
    <title>Titulo</title>
</head>

<body>
   
   <ul class="floatingNav">
        <li class="ulItem1"><img src="./img/productoIcon.svg"></li>
        <li class="ulItem2"><img src="./img/serviceIcon.svg"></li>
        <li class="ulItem3"><img src="./img/projectIcon.svg"></li>  
   </ul>


   <div id="modal9" class="modal">
    <div class="modal-content serviceDetail">
      
    </div>
  </div>

  <div id="modal10" class="modal">
      <div class="modal-content">
        <h4>Ingrese sus datos</h4>
        <div class="row">
          <form id="ser-form" action="" method="POST" class="col s12">
            <input type="hidden" name="idServicioI" val="">
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="nombre_ser" class="validate" required>
                <label for="icon_prefix">Nombre</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="text" name="telefono_ser" class="validate" required>
                <label for="icon_prefix">Telefono</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="email" name="email_ser" class="validate" required>
                <label for="icon_prefix">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 selectCiudadS">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 formaPagoS">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="number" name="hour_ser" class="validate" required>
                <label for="icon_prefix">Cantidad de horas</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha_ser" class="validate" required>
                <label for="icon_prefix">Fecha</label>
              </div>
            </div>
            <div class="modal-footer">
              <h6 class="error-user"></h6>
              <button id="login" type="submit" class="modal-action waves-effect waves-green btn-flat"  name="login">Adquirir</button>
            </div>
          </form>
        </div>
      </div>
    </div>

   <div id="modal7" class="modal">
    <div class="modal-content projectDetail">
      
    </div>
  </div>

  <div id="modal8" class="modal">
      <div class="modal-content">
        <h4>Ingrese sus datos</h4>
        <div class="row">
          <form id="get-form" action="" method="POST" class="col s12">
            <input type="hidden" name="idProyectoI" val="">
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="nombre_get" class="validate" required>
                <label for="icon_prefix">Nombre</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="text" name="telefono_get" class="validate" required>
                <label for="icon_prefix">Telefono</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="email" name="email_get" class="validate" required>
                <label for="icon_prefix">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 selectCiudadP">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 formaPagoG">
              </div>
            </div>
            <div class="modal-footer">
              <h6 class="error-user"></h6>
              <button id="login" type="submit" class="modal-action waves-effect waves-green btn-flat"  name="login">Adquirir</button>
            </div>
          </form>
        </div>
      </div>
    </div>

   <div id="modal5" class="modal">
    <div class="modal-content productDetail">
      
    </div>
  </div>

  <div id="modalPDFProduct" method="POST" class="modal">
    <div class="modal-content">
      <h4>Desea generar un pdf con su factura?</h4>
      <p>Si no lo genera ahora no podra hacerlo mas adelante</p>
    </div>
    <div class="modal-footer">
      <form id="pdfProducto" method="POST" action="../../Controller/Action/generate_pdf.php">
        <input type="hidden" name="pdfContent" val="">
        <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Generar PDF</button>
      </form>
      
    </div>
  </div>

  <div id="modalPDFService" method="POST" class="modal">
    <div class="modal-content">
      <h4>Desea generar un pdf con su factura?</h4>
      <p>Si no lo genera ahora no podra hacerlo mas adelante</p>
    </div>
    <div class="modal-footer">
      <form id="pdfService" method="POST" action="../../Controller/Action/generate_pdf.php">
        <input type="hidden" name="pdfContent" val="">
        <button type="submit" class="modal-action modal-close waves-effect waves-green btn-flat">Generar PDF</button>
      </form>
      
    </div>
  </div>

  <div id="modal6" class="modal">
      <div class="modal-content">
        <h4>Ingrese sus datos</h4>
        <div class="row">
          <form id="buy-form" action="" method="POST" class="col s12">
            <input type="hidden" name="idProductoI" val="">
            <input type="hidden" name="FacturaCompraI" val="">
            <input type="hidden" name="cantidadI" val="">
            <input type="hidden" name="userSelected" val="">
            <input type="hidden" name="valorProduct" val="">
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="nombre_buy" class="validate" required>
                <label for="icon_prefix">Nombre</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="text" name="telefono_buy" class="validate" required>
                <label for="icon_prefix">Telefono</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="email" name="email_buy" class="validate" required>
                <label for="icon_prefix">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 selectCiudad">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 formaPagoB">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 selectCantidad"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="number" min="1" max="" name="stock_buy" class="validate" required>
                <label for="icon_prefix">Cantidad A Comprar</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" name="fecha_buy" class="validate" required>
                <label for="icon_prefix">Fecha</label>
              </div>
            </div>
            <div class="modal-footer">
              <h6 class="error-user"></h6>
              <button id="login" type="submit" class="modal-action waves-effect waves-green btn-flat"  name="login">Comprar</button>
            </div>
          </form>
        </div>
      </div>
    </div>


    <div id="modal1" class="modal">
      <div class="modal-content">
        <div class="row">
          <form id="login-form" action="../../Controller/Action/act_login.php" method="POST" class="col s12">
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="username" class="validate" required>
                <label for="icon_prefix">Usuario</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="password" name="password" class="validate" required>
                <label for="icon_prefix">Contraseña</label>
              </div>
            </div>
            <div class="modal-footer">
              <h6 class="error-user"></h6>
              <button id="login" type="submit" class="modal-action waves-effect waves-green btn-flat"  name="login">Registrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>



    <div id="modal2" class="modal">
      <div class="modal-content">
        <h4>Ingrese sus datos</h4>
        <div class="row">
          <form id="buy-form" action="" method="POST" class="col s12">
            <input type="hidden" name="idProductoI" val="">
            <input type="hidden" name="FacturaCompraI" val="">
            <input type="hidden" name="cantidadI" val="">
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">account_circle</i>
                <input id="icon_prefix" type="text" name="nombre_buy" class="validate" required>
                <label for="icon_prefix">Nombre</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="text" name="telefono_buy" class="validate" required>
                <label for="icon_prefix">Telefono</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="email" name="email_buy" class="validate" required>
                <label for="icon_prefix">Email</label>
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 selectCiudad">
              </div>
            </div>
            <div class="row">
              <div class="input-field col s12 selectCantidad"><i class="material-icons prefix">vpn_key</i>
                <input id="icon_prefix" type="number" min="1" max="" name="stock_buy" class="validate" required>
                <label for="icon_prefix">Cantidad A Comprar</label>
              </div>
            </div>
            <div class="modal-footer">
              <h6 class="error-user"></h6>
              <button id="login" type="submit" class="modal-action waves-effect waves-green btn-flat"  name="login">Comprar</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    

    <div class="firstlvl">
        <div class="header">
            <ul class="LeftUl">
                <li class="logo">Logo</li>
                <li><a href="#">Contacto</a></li>
            </ul>
            <ul class="RigthUl">
                <li><a href="#modal1">Iniciar Sesion</a></li>
            </ul>
        </div>
        <div class="centerName">
            <span class="pageName">ALDAJEDA<br></span>
            
        </div>
        <div class="arrow bounce">
            <img src="./img/ic_arrow_drop_down_black_48px.svg">
        </div>
    </div>
    <div class="invisible"></div>
    <section class="productSection">
        <div class="productos">
        </div>
    </section>
    <div class="separador"></div>
     <section class="projectsSection">
        <div class="proyectos">
        </div>
    </section>    
    <div class="separador"></div>
    <section class="serviceSection">
        <div class="servicios">
        </div>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    <script type="text/javascript" src="js/initialization.js"></script>
    <script type="text/javascript" src="js/scroll.js"></script>
    <script type="text/javascript" src="js/ajax.js"></script>
</body>

</html>
