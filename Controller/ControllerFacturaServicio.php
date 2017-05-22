<?php 
	
	require_once '../Model/DAO/FacturaServicioDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$array_provedores = $FacturaServicioDAO->listarFacturas();
			$html = "";
			if($array_provedores != 0){

				foreach ($array_provedores as $row) {
				$html .= '<tr>
				            <td id="idFacturaServicio">'.$row['idFacturaServicio'].' </td>
				            <td id="Cliente">'.$row['Cliente'].'</td>
				            <td id="cc">'.$row['Usuario_cc'].' </td>
				            <td id="FormaPago">'.$row['FormaPago'].'</td>
				            <td id="Fecha">'.$row['Fecha'].' </td>
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCliente'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$array_provedores = $FacturaServicioDAO->listarCliente();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoC" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idCliente'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Cliente</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarUsuario'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$array_provedores = $FacturaServicioDAO->listarUsuario();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoU" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['cc'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>UsuarioCC</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarFormaPago'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$array_provedores = $FacturaServicioDAO->listarFormaPago();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoF" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFormaPago'].'">'.$row['descripcion'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>FormaPago</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}


		if($_POST['tipo'] == 'listarClienteEditar'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$array_provedores = $FacturaServicioDAO->listarCliente();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoCE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idCliente'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Cliente</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarUsuarioEditar'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$array_provedores = $FacturaServicioDAO->listarUsuario();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoUE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['cc'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>UsuarioCC</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarFormaPagoEditar'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$array_provedores = $FacturaServicioDAO->listarFormaPago();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoFE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFormaPago'].'">'.$row['descripcion'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>UsuarioCC</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}
		if($_POST['tipo'] == 'agregar'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$cliente = $_POST['cliente'];
			$usuarioCC = $_POST['usuarioCC'];
			$formaPago = $_POST['formaPago'];
			$fecha = $_POST['fecha'];
			$errores = $FacturaServicioDAO->crearFactura($cliente, $usuarioCC, 
				$formaPago,$fecha);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$idFacturaServicio = $_POST['idFacturaServicio'];
			$errores = $FacturaServicioDAO->borrarFactura($idFacturaServicio);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$FacturaServicioDAO = new FacturaServicioDAO();
			$idFacturaServicio = $_POST['idFacturaServicio'];
			$cliente = $_POST['cliente'];
			$usuarioCC = $_POST['usuarioCC'];
			$formaPago = $_POST['formaPago'];
			$fecha = $_POST['fecha'];
			$errores = $FacturaServicioDAO->editarFactura($idFacturaServicio, $cliente, $usuarioCC, 
				$formaPago,$fecha);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>