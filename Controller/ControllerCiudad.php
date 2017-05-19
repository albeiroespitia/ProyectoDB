<?php 
	
	require_once '../Model/DAO/CiudadDAO.php';

	if(isset($_POST['tipo'])){

		if($_POST['tipo'] == 'listar'){
			$ciudadDAO = new CiudadDAO();
			$array_ciudades = $ciudadDAO->listarCiudades();
			$html = "";
			foreach ($array_ciudades as $row) {
				$html .= '<tr>
				            <td id="idCiudad">'.$row['idCiudad'].' </td>
				            <td id="nombre">'.$row['nombre'].'</td>
				            <td><a class="editar" href="#modal2"><i class="material-icons">edit</i></a><a class="borrar"><i class="material-icons">delete</i></a></td>
				          </tr>';
				
			}

			echo $html;

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