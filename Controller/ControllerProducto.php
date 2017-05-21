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
				            <td id="cc">'.$row['cc'].'</td>
				            <td id="nombre">'.$row['nombreU'].' </td>				    
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCc'){
			$proyectoDAO = new ProductoDAO();
			$array_proyecto = $proyectoDAO->listarCcUsuario();
			$html = " ";
			if($array_proyecto != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoC" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_proyecto as $row){
					$html .= '<option value="'.$row['cc'].'">'.$row['cc'].' - '.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Cedula - Usuario</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		

		if($_POST['tipo'] == 'listarCcEditar'){
			$proyectoDAO = new ProyectoDAO();
			$array_provedores = $proyectoDAO->listarCcUsuario();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoTE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['cc'].'">'.$row['cc'].' - '.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Cedula - Usuario</label>';

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
			$usuarioCc = $_POST['usuarioCc'];
			$errores = $proyectoDAO->crearProducto($nombreProducto, $descripcionProducto, $cantidadProducto, $usuarioCc);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$proyectoDAO = new ProyectoDAO();
			$idProyecto = $_POST['idProyecto'];
			$errores = $proyectoDAO->borrarProyecto($idProyecto);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new ProyectoDAO();
			$idProyecto = $_POST['idProyecto'];
			$descripcion = $_POST['descripcionProyecto'];
			$empresa = $_POST['empresaProyecto'];
			$usuarioCc = $_POST['tipoTE'];
			$errores = $provedorDAO->editarProyecto($idProyecto,$descripcion,$empresa, $usuarioCc);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>