<?php 
	
	require_once '../Model/DAO/ClienteDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$clienteDAO = new ClienteDAO();
			$array_clientes = $clienteDAO->listarClientes();
			$html = " ";
			if($array_clientes != 0){

				foreach ($array_clientes as $row) {
				$html .= '<tr>
				            <td id="idCliente">'.$row['idCliente'].' </td>
				            <td id="nombre">'.$row['nombreCliente'].'</td>
				            <td id="telefono">'.$row['telefono'].' </td>
				            <td id="email">'.$row['email'].' </td>
				            <td id="ciudad">'.$row['nombreCiudad'].' </td>
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCiudad'){
			$clienteDAO = new ClienteDAO();
			$array_clientes = $clienteDAO->listarCiudadCliente();
			$html = " ";
			if($array_clientes != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoC" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_clientes as $row){
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

		if($_POST['tipo'] == 'listarCiudadEditar'){
			$clienteDAO = new ClienteDAO();
			$array_clientes = $clienteDAO->listarCiudadCliente();
			$html = " ";
			if($array_clientes != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoCE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_clientes as $row){
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
			$clienteDAO = new ClienteDAO();
			$nombreCliente = $_POST['nombreCliente'];
			$telefonoCliente = $_POST['telefonoCliente'];
			$emailCliente = $_POST['emailCliente'];
			$ciudadCliente = $_POST['ciudadCliente'];
			$errores = $clienteDAO->crearCliente($nombreCliente,$telefonoCliente,$emailCliente,$ciudadCliente);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$clienteDAO = new ClienteDAO();
			$idCliente = $_POST['idCliente'];
			$errores = $clienteDAO->borrarCliente($idCliente);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$clienteDAO = new ClienteDAO();
			$idCliente = $_POST['idCliente'];
			$nombreCliente = $_POST['nuevoNombreCliente'];
			$telefonoCliente = $_POST['nuevoTelefonoCliente'];
			$emailCliente = $_POST['nuevoEmailCliente'];
			$nombreCiudad = $_POST['nuevaCiudadCliente'];
			$errores = $clienteDAO->editarCliente($idCliente,$nombreCliente,$telefonoCliente,$emailCliente,$nombreCiudad);

			echo $nombreCiudad;
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>