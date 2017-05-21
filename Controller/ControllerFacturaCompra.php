<?php 
	
	require_once '../Model/DAO/FacturaCompraDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$proyectoDAO = new FacturaCompraDAO();
			$array_proyecto = $proyectoDAO->listarFacturaCompra();
			$html = "";
			if($array_proyecto != 0){

				foreach ($array_proyecto as $row) {
				$html .= '<tr>
				            <td id="idFacturaCompra">'.$row['idFacturaCompra'].' </td>
				            <td id="fecha">'.$row['fecha'].'</td>
				            <td id="cc">'.$row['cc'].'</td>
				            <td id="nombreU">'.$row['nombreU'].' </td>
				            <td id="idProvedor">'.$row['idProovedor'].' </td>
				            <td id="nombreP">'.$row['nombreP'].' </td>				    
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCc'){
			$proyectoDAO = new FacturaCompraDAO();
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

		if($_POST['tipo'] == 'listarProvedores'){
			$proyectoDAO = new FacturaCompraDAO();
			$array_provedores = $proyectoDAO->listarProvedores();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoP" required>
						<option value="" disabled selected>Escoje un proovedor</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idProovedor'].'">'.$row['idProovedor'].' - '.$row['nombre'].'</option>';
					$contador++;
				}

				$html .= '</select>
						  <label>ID - Nombre</label>';

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarProvedoresEditar'){
			$proyectoDAO = new FacturaCompraDAO();
			$array_provedores = $proyectoDAO->listarProvedores();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">account_circle</i>
					<select  id="tipoPE" required>
						<option value="" disabled selected>Escoje un proovedor</option>';
				$contador = 1;
				foreach ($array_provedores as $row){
					$html .= '<option value="'.$row['idProovedor'].'">'.$row['idProovedor'].' - '.$row['nombre'].'</option>';
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
			$proyectoDAO = new FacturaCompraDAO();
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
			$proyectoDAO = new FacturaCompraDAO ();
			$fechaFacturaCompra = $_POST['fechaFacturaCompra'];
			$idUsuario = $_POST['idUsuario'];
			$idProvedor = $_POST['idProvedor'];
			$errores = $proyectoDAO->crearFacturaCompra($fechaFacturaCompra, $idUsuario, $idProvedor);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$proyectoDAO = new FacturaCompraDAO();
			$idFacturaCompra = $_POST['idFacturaCompra'];
			$errores = $proyectoDAO->borrarFacturaCompra($idFacturaCompra);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$provedorDAO = new FacturaCompraDAO();
			$idFacturaCompra = $_POST['idFacturaCompra'];
			$nuevaFecha = $_POST['nuevaFecha'];
			$idUsuario = $_POST['idUsuario'];
			$idProvedor = $_POST['idProvedor'];
			$errores = $provedorDAO->editarFacturaCompra($nuevaFecha,$idFacturaCompra,$idProvedor, $idUsuario);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>