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

		

		if($_POST['tipo'] == 'agregar'){
			$proyectoDAO = new ProductoDAO ();
			$nombreProducto = $_POST['nombreProducto'];
			$descripcionProducto = $_POST['descripcionProducto'];
			$cantidadProducto = $_POST['cantidadProducto'];
			$idProvedor = $_POST['idProvedor'];
			$errores = $proyectoDAO->crearProducto($nombreProducto, $descripcionProducto, $cantidadProducto);
			if($errores == 0){
				echo 'Error';
			}
		

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