<?php 
	
	require_once '../Model/DAO/CiudadDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$ciudadDAO = new CiudadDAO();
			$array_ciudades = $ciudadDAO->listarCiudades();
			$html = "";
			if($array_ciudades != 0){

				foreach ($array_ciudades as $row) {
				$html .= '<tr>
				            <td id="idCiudad">'.$row['idCiudad'].' </td>
				            <td id="nombre">'.$row['nombre'].'</td>
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
				}

				echo $html;
			}else{
				echo 'No hay datos';
			}
			

		}

		if($_POST['tipo'] == 'listarCiudadComprar'){
			$ProvedorDAO = new CiudadDAO();
			$array_provedores = $ProvedorDAO->listarCiudades();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">location_city</i>
					<select  id="tipoCP" required>
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
				echo 'No tiene productos';
			}
		}

		if($_POST['tipo'] == 'listarCiudadComprarPR'){
			$ProvedorDAO = new CiudadDAO();
			$array_provedores = $ProvedorDAO->listarCiudades();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">location_city</i>
					<select  id="tipoCPE" required>
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
				echo 'No tiene productos';
			}
		}

		if($_POST['tipo'] == 'listarCiudadComprarS'){
			$ProvedorDAO = new CiudadDAO();
			$array_provedores = $ProvedorDAO->listarCiudades();
			$html = " ";
			if($array_provedores != 0){

				$html = '<i class="material-icons prefix">location_city</i>
					<select  id="tipoCPES" required>
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
				echo 'No tiene productos';
			}
		}

		if($_POST['tipo'] == 'agregar'){
			$ciudadDAO = new CiudadDAO();
			$nombreCiudad = $_POST['nombreCiudad'];
			$errores = $ciudadDAO->crearCiudad($nombreCiudad);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'eliminar'){
			$ciudadDAO = new CiudadDAO();
			$idCiudad = $_POST['idCiudad'];
			$errores = $ciudadDAO->borrarCiudad($idCiudad);
			if($errores == 0){
				echo 'Error';
			}
		

		}

		if($_POST['tipo'] == 'editar'){
			$ciudadDAO = new CiudadDAO();
			$idCiudad = $_POST['idCiudad'];
			$nombreCiudad = $_POST['nombreCiudad'];
			$errores = $ciudadDAO->editarCiudad($idCiudad,$nombreCiudad);
			if($errores == 0){
				echo 'Error';
			}
		

		}



	}


 ?>