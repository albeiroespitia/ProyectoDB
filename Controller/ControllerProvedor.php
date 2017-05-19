<?php 
	
	require_once '../Model/DAO/ProvedorDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$provedorDAO = new ProvedorDAO();
			$array_provedores = $provedorDAO->listarProvedores();
			$html = "";
			if($array_provedores != 0){

				foreach ($array_provedores as $row) {
				$html .= '<tr>
				            <td id="idProovedor">'.$row['idProovedor'].' </td>
				            <td id="nombre">'.$row['nombreP'].'</td>
				            <td id="email">'.$row['email'].' </td>
				            <td id="telefono">'.$row['telefono'].'</td>
				            <td id="Ciudad">'.$row['nombreC'].' </td>
				            <td id="TipoProducto">'.$row['descripcionT'].'</td>
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCiudad'){
			$ProvedorDAO = new ProvedorDAO();
			$array_provedores = $ProvedorDAO->listarCiudadUsuario();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoC" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idCiudad'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Ciudad</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarTipoProducto'){
			$ProvedorDAO = new ProvedorDAO();
			$array_provedores = $ProvedorDAO->listarTipoProductoProovedor();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoT" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idTipoProducto'].'">'.$row['descripcion'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Tipo Producto</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}


		if($_POST['tipo'] == 'listarTipoProductoEditar'){
			$ProvedorDAO = new ProvedorDAO();
			$array_provedores = $ProvedorDAO->listarTipoProductoProovedor();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoTE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idTipoProducto'].'">'.$row['descripcion'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Tipo Producto</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCiudadEditar'){
			$ProvedorDAO = new ProvedorDAO();
			$array_provedores = $ProvedorDAO->listarCiudadUsuario();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoCE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idCiudad'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Ciudad</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'agregar'){
			$provedorDAO = new ProvedorDAO();
			$nombreProvedor = $_POST['nombreProvedor'];
			$emailProvedor = $_POST['emailProvedor'];
			$telefonoProvedor = $_POST['telefonoProvedor'];
			$ciudadProvedor = $_POST['ciudadProvedor'];
			$tipoProducto = $_POST['tipoProducto'];
			$errores = $provedorDAO->crearProvedor($nombreProvedor, $emailProvedor, $ciudadProvedor, $telefonoProvedor,$tipoProducto);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$provedorDAO = new ProvedorDAO();
			$idProovedor = $_POST['idProovedor'];
			$errores = $provedorDAO->borrarProveedor($idProovedor);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new ProvedorDAO();
			$idProovedor = $_POST['idProovedor'];
			$nombreProvedor = $_POST['nuevonombreProvedor'];
			$emailProvedor = $_POST['nuevoemailProvedor'];
			$telefonoProvedor = $_POST['nuevotelefonoProvedor'];
			$ciudadProvedor = $_POST['nuevociudadProvedor'];
			$tipoProducto = $_POST['nuevotipoProducto'];
			$errores = $provedorDAO->editarProvedor($idProovedor,$nombreProvedor, $emailProvedor, $telefonoProvedor, $ciudadProvedor,$tipoProducto);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>