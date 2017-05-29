<?php 
	
	require_once '../Model/DAO/ProductoDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$proyectoDAO = new ProductoDAO();
			$array_proyecto = $proyectoDAO->listarProductos();
			$html = "";
			if($array_proyecto != 0){

				foreach ($array_proyecto as $row) {
				$html .= '<tr>
				            <td id="idProducto">'.$row['idProducto'].' </td>
				            <td id="nombre">'.$row['nombreP'].'</td>
				            <td id="descripcion">'.$row['descripcion'].' </td>
				            <td id="cantidad">'.$row['cantidad'].' </td>			    
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarPrincipal'){
			$proyectoDAO = new ProductoDAO();
			$array_proyecto = $proyectoDAO->listarProductosCatalogo();
			if($array_proyecto != 0){
				$html = '<span class="titulo">Productos</span>
							<div class="row">';
				$contador = 0;
				foreach ($array_proyecto as $row) {
				$html .= '<div class="col m4">
                        <div class="caja">
                            <img id="'.$row['idProducto'].' - '.$row['FacturaCompra'].'" class="imagenProducto" src="../../Galeria/ImagenesProducto/'.$row['imagen'].'" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">'.$row['nombre'].'</p>
                                <p class="descripcionProducto">'.$row['descripcionP'].'</p>
                            </div>
                        </div>
                    </div>';
                    $contador++;
                    if($contador == 4 || $contador == 8 || $contador == 12 || $contador == 16 ){
                    	$html .= '</div><div class="row">';
                    }
				
				}

				$html .= '</div>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listaDetalles'){
			$proyectoDAO = new ProductoDAO();
			$producto = $_POST['idProductoSelected'];
			$facturacompra = $_POST['idFacturaCompraSelected'];
			$array_proyecto = $proyectoDAO->listarProductosCatalogoEspecifico($producto,$facturacompra);
			if($array_proyecto != 0){
				$html = '';
				$contador = 0;
				foreach ($array_proyecto as $row) {
				$html .= '<h4>'.$row['nombre'].'</h4>
					      <img class ="imgdetail" src="../../Galeria/ImagenesProducto/'.$row['imagen'].'" width="300px" height="300px">
					      <div class="detalles">
					          <p>Descripcion: '.$row['descripcionP'].'</p>
					          <p>Precio: $'.$row['valor'].'</p>
					          <p>Stock: '.$row['cantidadR'].'</p>
					          <a class="btn-floating btn-large waves-effect waves-light red right buyItem"><i id="'.$row['Producto'].' - '.$row['FacturaCompra'].' - '.$row['cantidadR'].'" class="material-icons">add_shopping_cart</i></a>
					      </div>';
				
				}

				$html .= '</div>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		

		if($_POST['tipo'] == 'agregar'){
			$proyectoDAO = new ProductoDAO();
			$nombreProducto = $_POST['nombreProducto'];
			$descripcionProducto = $_POST['descripcionProducto'];
			$cantidadProducto = $_POST['cantidadProducto'];
			$errores = $proyectoDAO->crearProducto($nombreProducto, $descripcionProducto, $cantidadProducto);
			if($errores == 0){
				echo 'Error';
			}

			$array_idProducto = $proyectoDAO->lastRecord();
			foreach ($array_idProducto as $row) {
				$lastIdProducto = $row['idProducto'];
			}

			$proyectoDAO->crearImagen($lastIdProducto);



		

		}

		if($_POST['tipo'] == 'eliminar'){
			$proyectoDAO = new ProductoDAO();
			$idProducto = $_POST['idProducto'];
			$errores = $proyectoDAO->borrarProducto($idProducto);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new ProductoDAO();
			$idProducto = $_POST['idProducto'];
			$nombreProducto = $_POST['nombreProducto'];
			$descripcionProducto = $_POST['descripcionProducto'];
			$cantidadProducto = $_POST['cantidadProducto'];
			$idProvedor = $_POST['idProvedor'];
			$errores = $provedorDAO->editarProducto($idProducto,$nombreProducto,$descripcionProducto,$cantidadProducto);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>