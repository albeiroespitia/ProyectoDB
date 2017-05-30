<?php 
	
	require_once '../Model/DAO/FormaPagoDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$formaPagoDAO = new FormaPagoDAO();
			$array_formapagos = $formaPagoDAO->listarFormaPago();
			$html = "";
			if($array_formapagos != 0){
				foreach ($array_formapagos as $row) {
					$html .= '<tr>
					            <td id="idFormaPago">'.$row['idFormaPago'].' </td>
					            <td id="descripcion">'.$row['descripcion'].'</td>
					            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
					          </tr>';
					
				}
				echo $html;
			}else{
				echo "No hay datos";
			}

		}

		if($_POST['tipo'] == 'listarFormaPagoComprar'){
			$ProvedorDAO = new FormaPagoDAO();
			$array_provedores = $ProvedorDAO->listarFormaPago();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">location_city</i>
					<select  id="tipoFS" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFormaPago'].'">'.$row['descripcion'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Forma de pago</label>';

				echo $html;
			}else{
				echo 'No tiene forma de pagos';
			}
		}

		if($_POST['tipo'] == 'listarFormaPagoComprarG'){
			$ProvedorDAO = new FormaPagoDAO();
			$array_provedores = $ProvedorDAO->listarFormaPago();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">location_city</i>
					<select  id="tipoFSG" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFormaPago'].'">'.$row['descripcion'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Forma de pago</label>';

				echo $html;
			}else{
				echo 'No tiene forma de pagos';
			}
		}

		if($_POST['tipo'] == 'listarFormaPagoComprarB'){
			$ProvedorDAO = new FormaPagoDAO();
			$array_provedores = $ProvedorDAO->listarFormaPago();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">location_city</i>
					<select  id="tipoFSB" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFormaPago'].'">'.$row['descripcion'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Forma de pago</label>';

				echo $html;
			}else{
				echo 'No tiene forma de pagos';
			}
		}

		if($_POST['tipo'] == 'agregar'){
			$formaPagoDAO = new FormaPagoDAO();
			$descripcionFormaPago = $_POST['descripcionFormaPago'];
			$errores = $formaPagoDAO->crearFormaPago($descripcionFormaPago);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$formaPagoDAO = new FormaPagoDAO();
			$idFormaPago = $_POST['idFormaPago'];
			$errores = $formaPagoDAO->borrarFormaPago($idFormaPago);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$formaPagoDAO = new FormaPagoDAO();
			$idFormaPago = $_POST['idFormaPago'];
			$descripcionFormaPago = $_POST['descripcionFormaPago'];
			$errores = $formaPagoDAO->editarFormaPago($idFormaPago,$descripcionFormaPago);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>