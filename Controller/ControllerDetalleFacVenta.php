<?php 
	
	require_once '../Model/DAO/DetalleFacServicioDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$detallefacCompraDAO = new DetalleFacServicioDAO();
			$array_provedores = $detallefacCompraDAO->listarDetalleFacVenta();
			$html = "";
			if($array_provedores != 0){

				foreach ($array_provedores as $row) {
				$html .= '<tr>
							<td id="Facturaservicio">'.$row['FacturaServicio'].'</td>
				            <td id="Servicio">'.$row['Servicio'].' </td>
				            <td id="Horas">'.$row['Horas'].'</td>
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}


		if($_POST['tipo'] == 'listarFacturaServicio'){
			$ProvedorDAO = new DetalleFacServicioDAO();
			$array_provedores = $ProvedorDAO->listarFacturaServicio();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoF" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFacturaServicio'].'">'.$row['idFacturaServicio'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Factura Servicio</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
		}

		if($_POST['tipo'] == 'generarReporte'){
			$provedorDAO = new DetalleFacServicioDAO();
			$Servicio = $_POST['Servicio'];
			$FacturaServicio = $_POST['FacturaServicio'];
			$errores = $provedorDAO->generarReporte($Servicio, $FacturaServicio);
			if($errores == 0){
				echo 'Error';
			}else{
				echo json_encode($errores);
			}
		

		}

			if($_POST['tipo'] == 'listarFacturaServicioEditar'){
			$ProvedorDAO = new DetalleFacServicioDAO();
			$array_provedores = $ProvedorDAO->listarFacturaServicio();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoFE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idFacturaServicio'].'">'.$row['idFacturaServicio'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Factura Servicio</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
		}

			if($_POST['tipo'] == 'listarServicios'){
				
			$ProvedorDAO = new DetalleFacServicioDAO();
			$array_provedores = $ProvedorDAO->listarServicios();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoS" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idServicio'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Servicio</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}
					if($_POST['tipo'] == 'listarServiciosEditar'){
				
			$ProvedorDAO = new DetalleFacServicioDAO();
			$array_provedores = $ProvedorDAO->listarServicios();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoSE" required>
						<option value="" disabled selected>Escoje una opcion</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idServicio'].'">'.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>Servicio</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}


		

		if($_POST['tipo'] == 'agregar'){
			$provedorDAO = new DetalleFacServicioDAO();
			$facturaServicio = $_POST['facturaServicio'];
			$Servicio = $_POST['servicio'];
			$horas = $_POST['horas'];
			$errores = $provedorDAO->crearDetalleFacServicio($facturaServicio, $Servicio, $horas);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$DetallefacCompraDAO = new DetalleFacServicioDAO();
			$FacturaServicio = $_POST['facturaServicio'];
			$Servicio = $_POST['servicio'];
			$errores = $DetallefacCompraDAO->borrarDetalleFacCompra($Servicio,$FacturaServicio);
			if($errores == 0){
				echo 'Error';
			}
		}


/*FALTA EDITAR ESTE*/
		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new DetalleFacServicioDAO();
			$facturaServicio = $_POST['facturaServicio'];
			$Servicio = $_POST['servicio'];
			$horas = $_POST['horas'];
			$idServicio = $_POST['idServicio'];
			$errores = $provedorDAO->editarDetallefacCompra($idServicio, $facturaServicio, $Servicio, $horas);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>