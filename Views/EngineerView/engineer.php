<?php 
  session_start();
  if($_SESSION['tipoUsuario']  != 'ingeniero'){
    header("Location:../../index.php");
    die();
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
    <input type="hidden" name="idUser" value="<?=$_SESSION['idUsuario'];?>"></input>
   
   <ul class="floatingNav">
        <li class="ulItem1"><img src="./img/productoIcon.svg"></li>
        <li class="ulItem2"><img src="./img/serviceIcon.svg"></li>
        <li class="ulItem3"><img src="./img/projectIcon.svg"></li>  
   </ul>

   <div id="modal1" class="modal">
      <div class="modal-content">
        <div class="row">
          <form id="addCatalogoForm" action="" method="" class="col s12">
            <div class="row">
              <div class="input-field col s12 selectProducto">
              </div>
            </div>
            <div class="modal-footer">
              <h6 class="error-user"></h6>
              <button id="login" type="submit" class="modal-action waves-effect waves-green btn-flat"  name="login">Agregar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div id="modal2" class="modal">
      <div class="modal-content">
        <div class="row">
          <form id="deleteCatalogoForm" action="" method="" class="col s12">
            <div class="row">
              <div class="input-field col s12 selectProductoDelete">
              </div>
            </div>
            <div class="modal-footer">
              <h6 class="error-user"></h6>
              <button id="login" type="submit" class="modal-action waves-effect waves-green btn-flat"  name="login">Borrar</button>
            </div>
          </form>
        </div>
      </div>
    </div>

     <ul id="slide-out" class="side-nav">
        <li><div class="userView">
          <div class="background">
            <img src="img/products.jpg" width="100%" height="100%">
          </div>
          <span class="white-text name">Gestion de productos</span>
        </div></li>
        <li><a href="#modal1" id="addProduct"><i class="material-icons">add</i>Agregar al catalogo</a></li>
        <li><a href="#modal2" id="deleteProduct"><i class="material-icons">delete</i>Eliminar del catalogo</a></li>
        <li><div class="divider"></div></li>
      </ul>

      <ul id="slide-out2" class="side-nav">
        <li><div class="userView">
          <div class="background">
            <img src="img/service.jpg" width="100%" height="100%">
          </div>
          <span class="white-text name">Gestion de servicios</span>
        </div></li>
        <li><a href="#!"><i class="material-icons">add</i>Agregar Servicio</a></li>
        <li><a href="#!"><i class="material-icons">mode_edit</i>Editar Servicio</a></li>
        <li><a href="#!"><i class="material-icons">delete</i>Eliminar Servicio</a></li>
        <li><div class="divider"></div></li>
      </ul>

      <ul id="slide-out3" class="side-nav">
        <li><div class="userView">
          <div class="background">
            <img src="img/projects.jpg" width="100%" height="100%">
          </div>
          <span class="white-text name">Gestion de proyectos</span>
        </div></li>
        <li><a href="#!"><i class="material-icons">add</i>Agregar Proyecto</a></li>
        <li><a href="#!"><i class="material-icons">mode_edit</i>Editar Proyecto</a></li>
        <li><a href="#!"><i class="material-icons">delete</i>Eliminar Proyecto</a></li>
        <li><div class="divider"></div></li>
      </ul>

    <!-- Dropdown Structure -->
    <ul id="dropdown1" class="dropdown-content">
      <li><a href="#slide-out" data-activates="slide-out" class="button-collapse">Productos</a></li>
      <li><a href="#slide-out2" data-activates="slide-out2" class="button-collapse">Servicios</a></li>
      <li><a href="#slide-out3" data-activates="slide-out3" class="button-collapse">Proyectos</a></li>
    </ul>
    

    <div class="firstlvl">
        <div class="header">
            <ul class="LeftUl">
                <li class="logo">Logo</li>
                <li><a href="#">Contacto</a></li>
            </ul>
            <ul class="RigthUl">
                <li><a class="dropdown-button" href="#!" data-activates="dropdown1">Gestionar<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="../../Controller/Action/act_close.php" >Cerrar Sesion</a></li>
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
            <span class="titulo">Productos</span>
            <div class="row">
                <div class="catalogo">
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="catalogo">
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="pagination center-align">
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                </ul>
            </div>
        </div>
    </section>
    <div class="separador"></div>
     <section class="projectsSection">
        <div class="proyectos">
            <span class="titulo">Proyectos</span>
            <div class="row">
                <div class="catalogo">
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="catalogo">
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="pagination center-align">
                    <li class="active"><a href="#!">1</a></li>
                    <li class="waves-effect"><a href="#!">2</a></li>
                    <li class="waves-effect"><a href="#!">3</a></li>
                    <li class="waves-effect"><a href="#!">4</a></li>
                    <li class="waves-effect"><a href="#!">5</a></li>
                </ul>
            </div>
        </div>
    </section>    
    <div class="separador"></div>
    <section class="serviceSection">
        <div class="servicios">
            <span class="titulo">Servicios</span>
            <div class="row">
                <div class="catalogo">
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="catalogo">
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                    <div class="col m4">
                        <div class="caja">
                            <img class="imagenProducto" src="./img/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">Casa</p>
                                <p class="descripcionProducto">Best house Best house Best house Best house</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
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
