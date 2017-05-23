<?php

		
	require_once '../Model/DAO/FacturaDAO.php';

	
	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$proyectoDAO = new FacturaCompraDAO();
			$array_proyecto = $proyectoDAO->listarFacturaCompra();
			$html = "";
			if($array_proyecto != 0){

				foreach ($array_proyecto as $row) {
				$html .= '<tr>
				            <td id="idFactura">'.$row['idFactura'].' </td>
				            <td id="fecha">'.$row['fecha'].'</td>
				            <td id="cc">'.$row['cc'].'</td>
				            <td id="nombreU">'.$row['nombreU'].' </td>
				            <td id="nombreP">'.$row['nombreP'].' </td>
				            <td id="idCliente">'.$row['idCliente'].' </td>
				            <td id="nombreC">'.$row['nombreC'].' </td>	
				            <td id="descripcionF">'.$row['descripcionF'].' </td>			    
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}


			if($_POST['tipo'] == 'listarCc'){
			$proyectoDAO = new FacturaDAO();
			$array_proyecto = $proyectoDAO->listarCcUsuario();
			$html = " ";
			if($array_proyecto != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoC" required>
						<option value="" disabled selected>Escoje un usuario</option>';
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


		if($_POST['tipo'] == 'listarClientes'){
			$proyectoDAO = new FacturaCDAO();
			$array_provedores = $proyectoDAO->listarClientes();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoP" required>
						<option value="" disabled selected>Escoje un cliente</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idCliente'].'">'.$row['idCliente'].' - '.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>ID - Nombre</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}



			if($_POST['tipo'] == 'listarFormaPago'){
			$proyectoDAO = new FacturaDAO();
			$array_provedores = $proyectoDAO->listarFormaPago();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoF" required>
						<option value="" disabled selected>Escoje una forma de pago</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFormaPago'].'">'.$row['descripcion'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Forma de Pago</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarFormaPagoEditar'){
			$proyectoDAO = new FacturaDAO();
			$array_provedores = $proyectoDAO->listarFormaPago();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoFE" required>
						<option value="" disabled selected>Escoje una forma de pago</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFormaPago'].'">'.$row['descripcion'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Forma de pago </label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}



		if($_POST['tipo'] == 'listarClientesEditar'){
			$proyectoDAO = new FacturaDAO();
			$array_provedores = $proyectoDAO->listarProvedores();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoPE" required>
						<option value="" disabled selected>Escoje un cliente</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idCliente'].'">'.$row['idCliente'].' - '.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>ID - Nombre</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCcEditar'){
			$proyectoDAO = new FacturaDAO();
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
			$proyectoDAO = new FacturaDAO ();
			$fechaFactura = $_POST['fechaFactura'];
			$idUsuario = $_POST['idUsuario'];
			$idCliente = $_POST['idCliente'];
			$idFormaPago = $_POST['idFormaPago'];
			$errores = $proyectoDAO->crearFactura($fechaFactura, $idUsuario, $idCliente,$idFormaPago);
			if($errores == 0){
				echo 'Error';
			}
		

		}


		if($_POST['tipo'] == 'eliminar'){
			$proyectoDAO = new FacturaDAO();
			$idFactura = $_POST['idFactura'];
			$errores = $proyectoDAO->borrarFactura($idFactura);
			if($errores == 0){
				echo 'Error';
			}
		

		}


		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new FacturaDAO();
			$idFactura = $_POST['idFactura'];
			$nuevaFecha = $_POST['nuevaFecha'];
			$idUsuario = $_POST['idUsuario'];
			$idCliente = $_POST['idCliente'];
			$idFormaPago = $_POST['idFormaPago'];
			$errores = $provedorDAO->editarFactura($nuevaFecha,$idFactura,$idCliente,$idUsuario,$idFormaPago);
			if($errores == 0){
				echo 'Error';
			}
		

		}


			
  ?>