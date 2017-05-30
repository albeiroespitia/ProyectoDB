<?php 
	
	require_once '../Model/DAO/ServicioDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listarPrincipal'){
			$proyectoDAO = new ServicioDAO();
			$array_proyecto = $proyectoDAO->listarServicio();
			if($array_proyecto != 0){
				$html = '<span class="titulo">Servicios</span>
							<div class="row">';
				$contador = 0;
				foreach ($array_proyecto as $row) {
				$html .= '<div class="col m4">
                        <div class="caja servicioBox">
                            <img id="'.$row['idServicio'].'" class="imagenProducto" src="../../Galeria/prueba.jpg" width="100%" height="75%">
                            <div class="descripcion">
                                <p class="tituloProducto">'.$row['nombre'].'</p>
                                <p class="descripcionProducto">'.$row['descripcionS'].'</p>
                       
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
			$proyectoDAO = new ServicioDAO();
			$idServicio = $_POST['idServicio'];
			$array_proyecto = $proyectoDAO->listarServiciosCatalogoEspecifico($idServicio);
			if($array_proyecto != 0){
				$html = '';
				$contador = 0;
				foreach ($array_proyecto as $row) {
				$html .= '<h4>'.$row['nombre'].'</h4>
					      <img class ="imgdetail" src="../../Galeria/prueba.jpg" width="300px" height="300px">
					      <div class="detalles">
					          <p>Descripcion: '.$row['descripcionS'].'</p>
					          <p class="precioProducto">Precio: '.$row['precio'].'</p>
                              <p class="tipoServicio">Tipo de producto : '.$row['descripcion'].'</p>
					          <a class="btn-floating btn-large waves-effect waves-light red right getService"><i id="'.$row['idServicio'].'" class="material-icons">add_shopping_cart</i></a>
					      </div>';
				
				}

				$html .= '</div>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}



	}


 ?>